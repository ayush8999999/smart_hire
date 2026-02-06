<?php
header('Content-Type: application/json; charset=utf-8');

// TEMP (change in production)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
require_once __DIR__ . '/session.php';
require_once __DIR__ . '/db.php';

if (!isLoggedIn()) {
    http_response_code(401);
    echo json_encode([
        'success' => false,
        'message' => 'Please login to apply for this job.'
    ]);
    exit;
}

$userId = $_SESSION['user_id'] ?? null;

if (!$userId) {
    http_response_code(401);
    echo json_encode([
        'success' => false,
        'message' => 'Session expired. Please login again.'
    ]);
    exit;
}

// Handle OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

/* ================= BASE UPLOAD PATH ================= */
$BASE_UPLOAD_PATH = '../easyhire_admin/storage/app/public/uploads';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Only POST allowed']);
    exit;
}


/* ================= FILE UPLOAD HELPER ================= */
function uploadFile($file, $allowedExt, $maxSize, $absoluteFolder, $relativeFolder)
{
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    if ($file['size'] > $maxSize) {
        throw new Exception("File size exceeded");
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExt)) {
        throw new Exception("Invalid file type");
    }

    if (!is_dir($absoluteFolder)) {
        mkdir($absoluteFolder, 0755, true);
    }

    $filename = uniqid('file_', true) . '.' . $ext;
    $absolutePath = $absoluteFolder . '/' . $filename;

    if (!move_uploaded_file($file['tmp_name'], $absolutePath)) {
        throw new Exception("File upload failed");
    }

    // Store RELATIVE path in DB
    return $relativeFolder . '/' . $filename;
}

/* ================= FILE HANDLING ================= */
$passportPath = null;
$cvPath = null;

try {
    // PASSPORT
    if (!empty($_FILES['passport_file']['name'])) {
        $passportPath = uploadFile(
            $_FILES['passport_file'],
            ['pdf', 'jpg', 'jpeg', 'png'],
            5 * 1024 * 1024,
            $BASE_UPLOAD_PATH . '/passports',
            'uploads/passports'
        );
    } else {
        // keep old
        $passportPath = $_POST['existing_passport_file'] ?? null;
    }

    // CV
    if (!empty($_FILES['cv_file']['name'])) {
        $cvPath = uploadFile(
            $_FILES['cv_file'],
            ['pdf', 'doc', 'docx'],
            2 * 1024 * 1024,
            $BASE_UPLOAD_PATH . '/cvs',
            'uploads/cvs'
        );
    } else {
        // keep old
        $cvPath = $_POST['existing_cv_file'] ?? null;
    }

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
    exit;
}

/* ================= REQUIRED FIELDS ================= */
$required = [
    'full_name',
    'mobile_code',
    'mobile_national',
    'country_iso2',
    'email',
    'current_address',
    'city_state'
];

foreach ($required as $field) {
    if (empty(trim($_POST[$field] ?? ''))) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => "The field '$field' is required."
        ]);
        exit;
    }
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Invalid email address'
    ]);
    exit;
}

$userStmt = $pdo->prepare("
    SELECT 
        full_name,
        email,
        mobile_code,
        mobile_number,
        country_iso2,
        gender,
        date_of_birth
    FROM easyhire_users
    WHERE id = ?
");
$userStmt->execute([$userId]);
$currentUser = $userStmt->fetch(PDO::FETCH_ASSOC);

$updateFields = [];
$updateValues = [];

// helper function
function shouldUpdate($current, $new) {
    return (
        (empty($current) && !empty($new)) ||
        (!empty($new) && $current !== $new)
    );
}

if (shouldUpdate($currentUser['full_name'], $_POST['full_name'])) {
    $updateFields[] = 'full_name = ?';
    $updateValues[] = trim($_POST['full_name']);
}

if (shouldUpdate($currentUser['email'], $_POST['email'])) {
    $updateFields[] = 'email = ?';
    $updateValues[] = trim($_POST['email']);
}

if (shouldUpdate($currentUser['mobile_code'], $_POST['mobile_code'])) {
    $updateFields[] = 'mobile_code = ?';
    $updateValues[] = trim($_POST['mobile_code']);
}

if (shouldUpdate($currentUser['mobile_number'], $_POST['mobile_national'])) {
    $updateFields[] = 'mobile_number = ?';
    $updateValues[] = trim($_POST['mobile_national']);
}

if (shouldUpdate($currentUser['country_iso2'], $_POST['country_iso2'])) {
    $updateFields[] = 'country_iso2 = ?';
    $updateValues[] = strtoupper(trim($_POST['country_iso2']));
}

if (shouldUpdate($currentUser['gender'], $_POST['gender'] ?? null)) {
    $updateFields[] = 'gender = ?';
    $updateValues[] = $_POST['gender'] ?? null;
}

if (shouldUpdate($currentUser['date_of_birth'], $_POST['date_of_birth'] ?? null)) {
    $updateFields[] = 'date_of_birth = ?';
    $updateValues[] = $_POST['date_of_birth'] ?: null;
}

if (!empty($updateFields)) {
    $updateValues[] = $userId;

    $updateSql = "
        UPDATE easyhire_users
        SET " . implode(', ', $updateFields) . "
        WHERE id = ?
    ";

    $updateStmt = $pdo->prepare($updateSql);
    $updateStmt->execute($updateValues);
}

/* ================= INSERT ================= */
try {
    $stmt = $pdo->prepare("
        INSERT INTO candidate_applied (
            user_id,
            job_id,
            job_title,
            company_name,
            full_name,
            gender,
            date_of_birth,
            mobile_code,
            mobile_number,
            country_iso2,
            email,
            current_address,
            city_state,
            nationality,
            willing_to_relocate,
            highest_qualification,
            specialization,
            college_university,
            year_of_passing,
            experience_level,
            current_job_title,
            previous_company,
            experience_duration,
            key_skills_responsibilities,
            preferred_job_roles,
            preferred_industry,
            preferred_job_locations,
            work_mode_preference,
            shift_preference,
            current_salary,
            expected_salary,
            notice_period,
            resume_submitted,
            has_job_offer,
            job_offer_details,
            additional_information,
            passport_file,
            cv_file,
            ip_address
        ) VALUES (
            ?,?,?,?,?,?,?,?,?,?,
            ?,?,?,?,?,?,?,?,?,?,
            ?,?,?,?,?,?,?,?,?,?,
            ?,?,?,?,?,?,?,?,?
        )
    ");

    $stmt->execute([
        $userId,
        $_POST['job_id'] ?? null,
        $_POST['job_title'] ?? null,
        $_POST['company_name'] ?? null,

        trim($_POST['full_name']),
        $_POST['gender'] ?? '',
        $_POST['date_of_birth'] ?: null,

        trim($_POST['mobile_code'] ?? ''),
        trim($_POST['mobile_national']),
        strtoupper(trim($_POST['country_iso2'] ?? '')),
        trim($_POST['email']),

        trim($_POST['current_address']),
        trim($_POST['city_state']),
        $_POST['nationality'] ?? 'Indian',
        $_POST['willing_to_relocate'] ?? '',

        $_POST['highest_qualification'] ?? null,
        $_POST['specialization'] ?? null,
        $_POST['college_university'] ?? null,
        $_POST['year_of_passing'] ?? null,

        $_POST['experience_level'] ?? '',
        $_POST['current_job_title'] ?? null,
        $_POST['previous_company'] ?? null,
        $_POST['experience_duration'] ?? null,
        $_POST['key_skills_responsibilities'] ?? null,

        $_POST['preferred_job_roles'] ?? null,
        $_POST['preferred_industry'] ?? null,
        $_POST['preferred_job_locations'] ?? null,
        $_POST['work_mode_preference'] ?? '',
        $_POST['shift_preference'] ?? '',

        $_POST['current_salary'] ?? null,
        $_POST['expected_salary'] ?? null,
        $_POST['notice_period'] ?? '',

        $cvPath ? 'Yes' : 'No',

        $_POST['has_job_offer'] ?? '',
        $_POST['job_offer_details'] ?? null,
        $_POST['additional_information'] ?? null,

        $passportPath,
        $cvPath,

        $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ]);

    http_response_code(201);
    echo json_encode([
        'success' => true,
        'message' => 'Application submitted successfully!',
        'application_id' => $pdo->lastInsertId(),
        'path' => $BASE_UPLOAD_PATH
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
