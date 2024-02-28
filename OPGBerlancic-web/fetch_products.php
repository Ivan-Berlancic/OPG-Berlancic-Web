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

while ($row = $result->fetch_assoc()) {
    // Call the component function to generate HTML for each product card
    component($row['product_name'], $row['product_price'], $row['product_image'], $row['product_description'], $row['id']);
}

$connection->close();

// Define the component function
function component($productname, $productprice, $productimg, $productdesc, $productid){
    $element = "
    <div class='col-md-6 col-sm-12 my-3 my-md-0'>
        <div class='card shadow mb-4'>
            <div>
                <img src='$productimg' alt='Image1' class='img-fluid card-img-top w-75'>
            </div>
            <div class='card-body'>
                <h5 class='card-title'>$productname</h5>
                <p class='card-text'>$productdesc</p>
                <h5><span class='price'>$productprice €</span></h5>
            </div>
        </div>
    </div>
    ";
    echo $element;
}
?>
