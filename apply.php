<?php
header('Content-Type: application/json; charset=utf-8');

// TEMP (change in production)
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

require_once __DIR__ . '/db.php';

// Handle OPTIONS
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

/* ================= BASE UPLOAD PATH ================= */
$BASE_UPLOAD_PATH = $_SERVER['DOCUMENT_ROOT'] . '/intucate_orchid/public/uploads';

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
try {
    $passportPath = uploadFile(
        $_FILES['passport_file'] ?? null,
        ['pdf', 'jpg', 'jpeg', 'png'],
        5 * 1024 * 1024,
        $BASE_UPLOAD_PATH . '/passports',
        'uploads/passports'
    );

    $cvPath = uploadFile(
        $_FILES['cv_file'] ?? null,
        ['pdf', 'doc', 'docx'],
        2 * 1024 * 1024,
        $BASE_UPLOAD_PATH . '/cvs',
        'uploads/cvs'
    );
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
    'mobile_number',
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

/* ================= INSERT ================= */
try {
    $stmt = $pdo->prepare("
        INSERT INTO candidate_applied (
            job_id,
            job_title,
            company_name,
            full_name,
            gender,
            date_of_birth,
            mobile_number,
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
            ?,?,?,?,?,?
        )
    ");

    $stmt->execute([
        $_POST['job_id'] ?? null,
        $_POST['job_title'] ?? null,
        $_POST['company_name'] ?? null,

        trim($_POST['full_name']),
        $_POST['gender'] ?? '',
        $_POST['date_of_birth'] ?: null,
        trim($_POST['mobile_number']),
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
        'application_id' => $pdo->lastInsertId()
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
