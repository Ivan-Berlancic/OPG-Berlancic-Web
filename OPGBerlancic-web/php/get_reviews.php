<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "productdb";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$reviews = [];
$result = $connection->query("SELECT * FROM reviews ORDER BY id = 29 DESC, created_at DESC");

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $reviews[] = [
            'user' => $row['user_name'],
            'content' => $row['content'],
            'created_at' => $row['created_at'],
        ];
    }
}

$connection->close();

// Return JSON response
header('Content-Type: application/json');
echo json_encode($reviews);
?>
