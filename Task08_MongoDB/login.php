<?php

$conn = mysqli_connect("localhost", "root", "", "userdb");
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

    $username = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT password FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $dbPassword = $row['password'];

        if (strcmp($dbPassword,$password)==0) {
            echo "Login successful";
        } else {
            echo "Invalid password";
        }
    } else {
        header("Location: error.php");
        exit();

    }


?>
