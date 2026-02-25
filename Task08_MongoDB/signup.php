<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require __DIR__ . '/config/db.php';

// Get inputs safely
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

//Check empty fields
if (empty($email) || empty($password)) {
    die("Email and password are required.");
}

//Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

//Email length validation
if (strlen($email) > 254) {
    die("Email is too long.");
}

//Password length validation
if (strlen($password) < 6) {
    die("Password must be at least 6 characters.");
}

if (strlen($password) > 20) {
    die("Password must not exceed 20 characters.");
}

//Password strength (at least one letter + one number)
if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d).+$/', $password)) {
    die("Password must contain at least one letter and one number.");
}

//Check duplicate email
$existingUser = $users->findOne(['email' => $email]);

if ($existingUser) {
    die("User already exists. <a href='index.html'>Go back</a>");
}

//Hash password securely
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

//Insert into MongoDB
$users->insertOne([
    'email' => $email,
    'password' => $hashedPassword,
    'createdAt' => date('Y-m-d H:i:s')
]);

echo "Signup successful! <a href='index.html'>Go to Login</a>";