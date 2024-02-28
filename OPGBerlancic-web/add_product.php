<?php
@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.html');
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "productdb";

$connection = new mysqli($servername, $username, $password, $database);

$product_name = "";
$product_price = "";
$product_image = "";
$product_description = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_image = $_POST["product_image"];
    $product_description = $_POST["product_description"];

    do {
        if (empty($product_name) || empty($product_price) || empty($product_image) || empty($product_description)) {
            $errorMessage = "Sva polja su obavezna";
            break;
        }

        $sql = "INSERT INTO producttb (product_name, product_price, product_image, product_description) " .
            "VALUES ('$product_name',  '$product_price', '$product_image', '$product_description')";
        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;
            break;
        }

        $product_name = "";
        $product_price = "";
        $product_image = "";
        $product_description = "";

        $successMessage = "Proizvod je uspješno dodan";
        header("location: admin_page.html");
        exit;
    } while (false);
}
?>
