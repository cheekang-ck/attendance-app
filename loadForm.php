<?php
// -------------------
// 1. IP Validation
// -------------------
function getClientIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]);
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$client_ip = getClientIP();
$allowed_ip_pattern = "/^211\.25\.195\./";  // ✅ Your school subnet

if (!preg_match($allowed_ip_pattern, $client_ip)) {
    header("Content-Type: text/html; charset=UTF-8");
    echo "<h2>❌ Access Denied</h2>";
    echo "Your IP (<b>" . htmlspecialchars($client_ip) . "</b>) is not in the allowed range.";
    exit;
}

// -------------------
// 2. Proxy Microsoft Form
// -------------------
$form_url = "https://forms.office.com/r/5apKxvaVMi";

// Initialize cURL
$ch = curl_init($form_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$response = curl_exec($ch);
curl_close($ch);

// Output the form HTML directly
header("Content-Type: text/html; charset=UTF-8");
echo $response;
?>
