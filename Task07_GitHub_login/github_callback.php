<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$client_id = $_ENV['GITHUB_CLIENT_ID'];
$client_secret = $_ENV['GITHUB_CLIENT_SECRET'];
$redirect_uri = $_ENV['GITHUB_REDIRECT_URI'];

if (!isset($_GET['code'])) {
    // Step 1: Redirect to GitHub login
    $auth_url = "https://github.com/login/oauth/authorize"
        . "?client_id=$client_id"
        . "&redirect_uri=$redirect_uri"
        . "&scope=user:email";

    header("Location: $auth_url");
    exit;
} else {
    // Step 2: Exchange code for access token
    $code = $_GET['code'];

    $token_url = "https://github.com/login/oauth/access_token";

    $data = [
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'code' => $code,
        'redirect_uri' => $redirect_uri
    ];

    $options = [
        'http' => [
            'header'  => "Content-type: application/x-www-form-urlencoded\r\nAccept: application/json\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context  = stream_context_create($options);
    $response = file_get_contents($token_url, false, $context);
    $token_data = json_decode($response, true);

    $access_token = $token_data['access_token'];

    // Step 3: Get user info
    $user_context = stream_context_create([
        'http' => [
            'header' => "User-Agent: PHP\r\nAuthorization: token $access_token"
        ]
    ]);

    $user_json = file_get_contents("https://api.github.com/user", false, $user_context);
    $user = json_decode($user_json, true);

    echo "<h2>GitHub User Info</h2>";
    echo "Name: " . $user['name'] . "<br>";
    echo "Username: " . $user['login'] . "<br>";
}
?>
