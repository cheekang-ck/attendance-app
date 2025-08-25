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
$allowed_ip_pattern = "/^(211\.25\.195\.|218\.208\.8\.)/";  // ✅ Your school subnet

if (!preg_match($allowed_ip_pattern, $client_ip)) {
    header("Content-Type: text/html; charset=UTF-8");
    echo "<h2>❌ Access Denied</h2>";
    echo "Your IP (<b>" . htmlspecialchars($client_ip) . "</b>) is not in the allowed range.";
    exit;
}

// -------------------
// 2. Attendance Form
// -------------------
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Attendance Form</title>
</head>
<body>
  <h2>✅ Student Attendance Form</h2>
  <p>Welcome! Your IP <b><?php echo htmlspecialchars($client_ip); ?></b> is verified.</p>

  <form action="submitAttendance.php" method="post">
    <label for="name">Student Name:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label for="task">Task / Work Description:</label><br>
    <textarea id="task" name="task" required></textarea><br><br>

    <button type="submit">Check In</button>
  </form>
</body>
</html>
