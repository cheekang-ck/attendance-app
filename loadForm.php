<?php
// Check GPS step
if (!isset($_GET['gpsok'])) {
    die("❌ You must verify GPS first.");
}

// Wi-Fi / IP check
$user_ip = $_SERVER['REMOTE_ADDR'];

// 🎯 Change this to your school’s Wi-Fi IP range
$allowed_ip_pattern = "/^211\.25\.195\./"; 

if (!preg_match($allowed_ip_pattern, $user_ip)) {
    die("❌ You must be on school Wi-Fi. Your IP: $user_ip");
}

// ✅ Redirect to Microsoft Form
header("https://forms.office.com/r/QwiADPVya9"); 
exit();
?>
