<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "productdb";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM reviews";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

$output = "";

while ($row = $result->fetch_assoc()) {
    $output .= "
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['user_name']}</td>
            <td>{$row['content']}</td>
            <td>{$row['created_at']}</td>
            <td>
                <a class='btn btn-danger btn-sm' href='delete_review.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>
    ";
}

echo $output;

$connection->close();
?>
