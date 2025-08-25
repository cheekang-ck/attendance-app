<?php
// Change this to your own teacher/admin email
$to = "minen.chan@xmu.edu.my";

// Collect form data
$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'Unknown';
$task = isset($_POST['task']) ? htmlspecialchars($_POST['task']) : 'No task';
$time = date("Y-m-d H:i:s");
$ip   = $_SERVER['REMOTE_ADDR'];

// Email subject & body
$subject = "Attendance Record from $name";
$body = "📌 Attendance Record\n\n".
        "👤 Student: $name\n".
        "📝 Task: $task\n".
        "⏰ Time: $time\n".
        "🌐 IP: $ip\n";

// Email headers
$headers = "From: attendance@yourdomain.com\r\n";
$headers .= "Reply-To: no-reply@yourdomain.com\r\n";

// Send email
if(mail($to, $subject, $body, $headers)){
    echo "<h3>✅ Attendance submitted successfully!</h3>";
    echo "<p>Thank you, $name. Your record has been sent.</p>";
} else {
    echo "<h3>❌ Error sending attendance. Please try again later.</h3>";
}
?>
