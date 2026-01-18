<?php
header('Content-Type: application/json');
session_start();

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
$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    echo json_encode([
        'success' => false,
        'message' => 'Email and password are required'
    ]);
    exit;
}

// ================= CHECK USER =================
$stmt = $pdo->prepare("
    SELECT id, email, password 
    FROM easyhire_users 
    WHERE email = ?
");
$stmt->execute([$email]);
$user = $stmt->fetch();

if (!$user || !password_verify($password, $user['password'])) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid email or password'
    ]);
    exit;
}

// ================= LOGIN SUCCESS =================
$_SESSION['user_id'] = $user['id'];
$_SESSION['user_email'] = $user['email'];

echo json_encode([
    'success' => true,
    'message' => 'Login successful'
]);
exit;
