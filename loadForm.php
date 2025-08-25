<?php
// Function to safely get the real client IP
function getClientIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Can contain multiple IPs (comma-separated) → take the first one
        return trim(explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0]);
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

$client_ip = getClientIP();

// For debugging - see what IP PHP detects
echo "Detected IP: " . htmlspecialchars($client_ip) . "<br>";

// Define allowed IP range (your school’s subnet)
$allowed_ip_pattern = "/^211\.25\.195\./";  // Matches 211.25.195.*

if (preg_match($allowed_ip_pattern, $client_ip)) {
    
    // Embed your Microsoft Form here (replace FORM_LINK)
    header("Location: https://forms.office.com/r/QwiADPVya9");
    exit;

} else {
    echo "❌ Access denied: You must be in school to clock in.";
}
?>
