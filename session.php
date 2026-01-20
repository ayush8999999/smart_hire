<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function userInitials() {
    if (!isset($_SESSION['user_email'])) return '';
    $email = $_SESSION['user_email'];
    return strtoupper(substr($email, 0, 2));
}
