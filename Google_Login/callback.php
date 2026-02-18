<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php'; // if using composer

use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);
// $dotenv->load();
$dotenv->safeLoad();

// var_dump(
//     $_ENV['GOOGLE_CLIENT_ID'],#false if not loaded 
//     $_ENV['GOOGLE_CLIENT_SECRET'],
//     $_ENV['GOOGLE_REDIRECT_URI']
// );
// exit;


$client = new Google_Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);

$client->addScope("email");
$client->addScope("profile");

if (!isset($_GET['code'])) {
    $auth_url = $client->createAuthUrl();
    header('Location: ' . $auth_url);
    exit;
} else {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token);

    $oauth = new Google_Service_Oauth2($client);
    $user = $oauth->userinfo->get();

    echo "<h2>User Info</h2>";
    echo "Name: " . $user->name . "<br>";
    echo "Email: " . $user->email . "<br>";
}
?>