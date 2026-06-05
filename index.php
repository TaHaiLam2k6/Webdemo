<?php

header("Content-Type: application/json");

$conn = new mysqli(
    getenv("DB_HOST"),
    getenv("DB_USER"),
    getenv("DB_PASS"),
    getenv("DB_NAME"),
    getenv("DB_PORT")
);

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

$sql = "SELECT * FROM users
        WHERE username='$username'
        AND password='$password'";

$result = $conn->query($sql);

echo json_encode([
    "success" => $result->num_rows > 0
]);
