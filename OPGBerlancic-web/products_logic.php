<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "productdb";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$sql = "SELECT * FROM producttb";
$result = $connection->query($sql);

if (!$result) {
    die("Invalid query: " . $connection->error);
}

$output = "";

while ($row = $result->fetch_assoc()) {
    $output .= "
        <tr>
            <td>{$row['id']}</td>
            <td>{$row['product_name']}</td>
            <td>{$row['product_price']}</td>
            <td>{$row['product_image']}</td>
            <td>{$row['product_description']}</td>
            <td>
                <a class='btn btn-primary btn-sm' href='edit.php?id={$row['id']}'>Edit</a>
                <a class='btn btn-danger btn-sm' href='delete.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>
    ";
}

echo $output;

$connection->close();
?>
