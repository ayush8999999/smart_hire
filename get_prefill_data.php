<?php
header('Content-Type: application/json; charset=utf-8');

require_once __DIR__ . '/session.php';
require_once __DIR__ . '/db.php';

if (!isLoggedIn()) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$userId = $_SESSION['user_id'];

/* ================= TRY candidate_applied (latest) ================= */
$stmt = $pdo->prepare("
    SELECT
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
        has_job_offer,
        job_offer_details,
        additional_information,
        passport_file,
        cv_file
    FROM candidate_applied
    WHERE user_id = ?
    ORDER BY applied_at DESC
    LIMIT 1
");

$stmt->execute([$userId]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($data) {
    echo json_encode([
        'success' => true,
        'source' => 'candidate_applied',
        'data' => $data
    ]);
    exit;
}

/* ================= FALLBACK: easyhire_users ================= */
$stmt = $pdo->prepare("
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
    LIMIT 1
");

$stmt->execute([$userId]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    echo json_encode([
        'success' => true,
        'source' => 'easyhire_users',
        'data' => $user
    ]);
    exit;
}

echo json_encode(['success' => false]);
