<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli("localhost", "webuser", "123456", "webdemo");
if ($conn->connect_error) {
die("Connection failed");
}
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST["username"];
$password = $_POST["password"];
$sql = "SELECT * FROM users
WHERE username= '$username'
AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
header("Location: index.html");
exit();
} else {
$message = "Sai tai khoan hoac mat khau!";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>
<h1>Register</h1>
<form method="POST">
<input type="text"
name ="username"
placeholder="Username">
<br><br>
<input type="password"
name="password"
placeholder="Password">
<br><br>
<button type="submit">Register</button>
</form>
</body>
</html>
