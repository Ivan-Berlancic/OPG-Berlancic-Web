<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "productdb";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM user_form";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

$output = "";

while ($row = $result->fetch_assoc()) {
    $output .= "
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['password']}</td>
            <td>{$row['user_type']}</td>
            <td>
                <a class='btn btn-danger btn-sm' href='delete_user.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>
    ";
}

echo $output;

$connection->close();
?>
