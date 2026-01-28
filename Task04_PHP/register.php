<?php

$conn = new mysqli("localhost", "root", "", "userdb");

if ($conn->connect_error) {
    die("Connection failed");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $gender   = $_POST['gender'];
    $course   = $_POST['course'];

    $sql = "INSERT INTO users (username, password, gender, course)
            VALUES ('$username', '$password', '$gender', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
    } else {
        echo "Error";
    }
}

$conn->close();
?>
