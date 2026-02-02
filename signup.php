<?php
header('Content-Type: application/json');

require_once __DIR__ . '/db.php';
require 'register_success_email.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request'
    ]);
    exit;
}

// ================= INPUTS =================
$full_name  = trim($_POST['full_name'] ?? '');
$email      = trim($_POST['email'] ?? '');
$password   = $_POST['password'] ?? '';
$confirmPwd = $_POST['confirm_password'] ?? '';
$mobile_code    = trim($_POST['mobile_code'] ?? '');
$country_iso2   = strtoupper(trim($_POST['country_iso2'] ?? ''));
$mobile_number  = trim($_POST['mobile_national'] ?? '');

// ================= VALIDATION =================
if (!$full_name || !$email || !$password) {
    echo json_encode(['success' => false, 'message' => 'Required fields are missing']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

if ($password !== $confirmPwd) {
    echo json_encode(['success' => false, 'message' => 'Passwords do not match']);
    exit;
}

if (strlen($password) < 6) {
    echo json_encode(['success' => false, 'message' => 'Password must be at least 6 characters']);
    exit;
}

if (!preg_match('/^\+\d{1,4}$/', $mobile_code)) {
    echo json_encode(['success' => false, 'message' => 'Invalid country code']);
    exit;
}

if (!preg_match('/^\d{6,15}$/', $mobile_number)) {
    echo json_encode(['success' => false, 'message' => 'Invalid mobile number']);
    exit;
}

if (!preg_match('/^[A-Z]{2}$/', $country_iso2)) {
    echo json_encode(['success' => false, 'message' => 'Invalid country']);
    exit;
}

// ================= DUPLICATE EMAIL =================
$check = $pdo->prepare("SELECT id FROM easyhire_users WHERE email = ?");
$check->execute([$email]);

if ($check->rowCount() > 0) {
    echo json_encode(['success' => false, 'message' => 'Email already registered']);
    exit;
}

// ================= INSERT =================
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $pdo->prepare("
    INSERT INTO easyhire_users
    (full_name, email, password, mobile_code, mobile_number, country_iso2, user_role)
    VALUES (?, ?, ?, ?, ?, ?)
");

$stmt->execute([
    $full_name,
    $email,
    $hashedPassword,
    $mobile_code,
    $mobile_number,
    $country_iso2,
    "candidate"
]);
sendWelcomeMail($full_name, $email);

echo json_encode([
    'success' => true,
    'message' => 'Signup successful! Please check your email.'
]);
exit;
