<?php
//include()
// include('header.html');

// echo "hello welcomr to index page ";
// include('footer.html');
//$_SESSION[],session_start()

session_start();//used to create or resume session
//session - super global variable used to store information on a user 
//to be used across multiple pages
//A user is assigjed a session-id
//ex. login credintials

// if (isset($_POST["login"])) {

    // if(!empty($_POST["username"]) && 
    //    !empty($_POST["username"])){

    // $_SESSION["username"] = $_POST["username"];
    // $_SESSION["password"] = $_POST["password"];
    // header("Location: home.php");
    //    }

    // else{
    //     echo"missing username/password";
    // }

// }
//(or)
$_SESSION["username"] = "anchor__name";
$_SESSION["password"] = 123457;

?>

<form method="post">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <!-- <input type="submit" name="login" value="Login"> -->
     <a href="home.php">this goes to home page</a>
</form>