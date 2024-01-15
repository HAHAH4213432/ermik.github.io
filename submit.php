<?php

// Verify the access key
$expectedKey = '1234'; // Replace with your actual access key
$accessKey = isset($_POST['key']) ? $_POST['key'] : '';

if ($accessKey !== $expectedKey) {
    header('HTTP/1.1 401 Unauthorized');
    exit();
}

// Get Discord username and user's IP address from the form
$discordUsername = isset($_POST['username']) ? $_POST['username'] : '';
$userIP = $_SERVER['REMOTE_ADDR'];

// Replace this with your Discord webhook URL
$webhookUrl = 'https://discord.com/api/webhooks/1196482551204814848/PQotR_GE7GsYF-nNIargP_FduXaW9E_erKNR0Ht7qPoBKTlzkBC6QkTpsp5inAoAc5to';

// Data to be sent to Discord
$data = [
    'content' => "New user: $discordUsername\nIP Address: $userIP",
];

// Use cURL to send data to Discord webhook
$ch = curl_init($webhookUrl);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

// Check for errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    echo 'Data sent to Discord successfully!';
}

curl_close($ch);

?>
