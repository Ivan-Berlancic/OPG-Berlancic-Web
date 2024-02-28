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

function addReview($userName, $content, $connection)
{
    $stmt = $connection->prepare("INSERT INTO reviews (user_name, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $userName, $content);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

$user = $_SESSION['user_name'] ?? null;
$admin = $_SESSION['admin_name'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($user || $admin)) {
    $reviewContent = $_POST['reviewContent'];

    addReview(($admin ? $admin : $user), $reviewContent, $connection);

    // Return a JSON response
    echo json_encode(['success' => true]);
    exit;
}

$connection->close();
?>
