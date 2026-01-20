<?php
header('Content-Type: application/json');

// ================= DATABASE CONFIG =================
$host     = 'localhost';
$dbname   = 'intucate_orchid_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed'
    ]);
    exit;
}

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
$mobile     = trim($_POST['mobile_number'] ?? '');

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
    (full_name, email, password, mobile_number)
    VALUES (?, ?, ?, ?)
");

$stmt->execute([
    $full_name,
    $email,
    $hashedPassword,
    $mobile
]);

echo json_encode([
    'success' => true,
    'message' => 'Signup successful'
]);
exit;
