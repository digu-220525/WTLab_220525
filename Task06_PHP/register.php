<?php

$conn = new mysqli("localhost", "root", "", "userdb");

if ($conn->connect_error) {
    die("Connection failed");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $max_length =20;
    $min_length =3;
    $max_password_length =8;
    // $must_char_in_password = ['']
    if(strlen($_POST['username'])==$max_length){
        die("Username length is excededing the max length $max_length");

    }
    if($_POST['password']==$max_password_length){
        die("passworr should have max length of $max_password_length");
    }
    if($_POST['password']==$max_password_length){
        die("passworr should have max length of $max_password_length");
    }
    if(strlen($_POST['username'])<3 ){
        die("username should have atleat length $min_length ");
    }
    //string validation
    $l = strtolower($_POST['username']);
    $t = trim($l);
    $_POST['username'] = $t;
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
    foreach($_POST as $key=>$value){
        echo "<br>$key=>$value";//if radio option not choose it won't store the key and value both in associative array $_POST
    }
    
    

}

$conn->close();
?>
