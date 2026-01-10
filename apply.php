<?php
header('Content-Type: application/json; charset=utf-8');

// IMPORTANT: Change this in production!
header('Access-Control-Allow-Origin: *');           // ← TEMPORARY for local/dev only
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$host     = 'localhost';
$dbname   = 'intucate_orchid_db';
$username = 'root';
$password = '';   // ← NEVER commit this to git with real password!

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    http_response_code(500);
    // In production: log error, don't show to user
    echo json_encode([
        'success' => false,
        'message' => 'Cannot connect to database. Please try again later.'
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Only POST method allowed']);
    exit;
}

$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

if (json_last_error() !== JSON_ERROR_NONE || !is_array($data)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON format']);
    exit;
}

// Required fields
$required = [
    'full_name', 'mobile_number', 'email',
    'current_address', 'city_state',
    'declaration_signed', 'declaration_date'
];

foreach ($required as $field) {
    if (empty(trim($data[$field] ?? ''))) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => "The field '$field' is required."
        ]);
        exit;
    }
}

// Very basic email format check
if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Please enter a valid email address'
    ]);
    exit;
}

try {
   $stmt = $pdo->prepare("
    INSERT INTO candidate_applied (job_id,job_title,company_name,full_name,gender,date_of_birth,mobile_number,email,current_address,city_state,nationality,willing_to_relocate,highest_qualification,specialization,college_university,year_of_passing,experience_level,current_job_title,previous_company,experience_duration,key_skills_responsibilities,preferred_job_roles,preferred_industry,preferred_job_locations,work_mode_preference,shift_preference,current_salary,expected_salary,notice_period,resume_submitted,linkedin_profile,portfolio_link,has_job_offer,job_offer_details,additional_information,declaration_signed,declaration_date,ip_address
    ) VALUES (?, ?, ?,?, ?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?, ?,?, ?, ?, ?, ?,?, ?, ?,?, ?, ?,?, ?, ?,?, ?,?)");


$success = $stmt->execute([
    /* Job details */
    $data['job_id']                 ?? null,
    $data['job_title']              ?? null,
    $data['company_name']           ?? null,

    /* Personal details */
    trim($data['full_name'] ?? ''),
    $data['gender']                 ?? null,
    $data['date_of_birth']          ?: null,
    trim($data['mobile_number'] ?? ''),
    trim($data['email'] ?? ''),

    trim($data['current_address'] ?? ''),
    trim($data['city_state'] ?? ''),
    $data['nationality']            ?? 'Indian',
    $data['willing_to_relocate']    ?? null,

    /* Education */
    $data['highest_qualification']  ?? null,
    $data['specialization']         ?? null,
    $data['college_university']     ?? null,
    $data['year_of_passing']        ?? null,

    /* Work experience */
    $data['experience_level']       ?? null,
    $data['current_job_title']      ?? null,
    $data['previous_company']       ?? null,
    $data['experience_duration']    ?? null,
    $data['key_skills_responsibilities'] ?? null,

    /* Job preferences */
    $data['preferred_job_roles']        ?? null,
    $data['preferred_industry']         ?? null,
    $data['preferred_job_locations']    ?? null,
    $data['work_mode_preference']       ?? null,
    $data['shift_preference']           ?? null,

    /* Salary & availability */
    $data['current_salary']         ?? null,
    $data['expected_salary']        ?? null,
    $data['notice_period']          ?? null,

    /* Documents & links */
    $data['resume_submitted']       ?? null,
    $data['linkedin_profile']       ?? null,
    $data['portfolio_link']         ?? null,

    /* Additional information */
    $data['has_job_offer']          ?? null,
    $data['job_offer_details']      ?? null,
    $data['additional_information'] ?? null,

    /* Declaration */
    trim($data['declaration_signed'] ?? ''),
    $data['declaration_date']       ?? null,

    /* Metadata */
    $_SERVER['REMOTE_ADDR']         ?? 'unknown'
]);


    if ($success) {
        http_response_code(201);
        echo json_encode([
            'success' => true,
            'message' => 'Application submitted successfully!',
            'application_id' => $pdo->lastInsertId()
        ]);
    } else {
        throw new Exception("Insert failed");
    }

} catch (PDOException $e) {
    // 1062 = duplicate entry
    if ($e->getCode() == 23000 || $e->getCode() == 1062) {
        http_response_code(409);
        echo json_encode([
            'success' => false,
            'message' => 'You have already applied for this position with this email.'
        ]);
    } else {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'message' => 'Sorry, something went wrong. Please try again later.'
        ]);
    }
    // In production: error_log($e->getMessage());
}