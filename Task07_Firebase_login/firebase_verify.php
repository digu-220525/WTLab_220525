<?php
$data = json_decode(file_get_contents("php://input"), true);
$token = $data['token'] ?? null;

if (!$token) {
    echo "No token received.";
    exit;
}

// For assignment demo
echo "Backend received Firebase token successfully.<br>";
echo "Token length: " . strlen($token);
?>
