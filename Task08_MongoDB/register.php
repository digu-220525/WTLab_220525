<?php

$conn = new mysqli("localhost", "root", "", "userdb");

if ($conn->connect_error) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $max_length = 50;        //max email length
    $min_length = 5;         //min email length
    $max_password_length = 8;

    // Email validation
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    if (strlen($_POST['email']) > $max_length) {
        die("Email length is exceeding the max length $max_length");
    }

    if (strlen($_POST['email']) < $min_length) {
        die("Email should have at least length $min_length");
    }

    // Password validation
    if (strlen($_POST['password']) > $max_password_length) {
        die("Password should have max length of $max_password_length");
    }

    // String cleaning
    $l = strtolower($_POST['email']);
    $t = trim($l);
    $_POST['email'] = $t;

    $email    = $_POST['email'];
    $password = $_POST['password'];
    $gender   = $_POST['gender'];
    $course   = $_POST['course'];

    $sql = "INSERT INTO users (email, password, gender, course)
            VALUES ('$email', '$password', '$gender', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error";
    }

    foreach($_POST as $key => $value){
        echo "<br>$key => $value";
    }
}

$conn->close();
?>