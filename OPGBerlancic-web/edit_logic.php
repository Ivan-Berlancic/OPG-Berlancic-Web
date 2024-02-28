<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "productdb";

$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$product_name = "";
$product_price = "";
$product_image = "";
$product_description = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(!isset($_GET["id"])){
        header("location: admin_page.html");
        exit;
    }
    $id = $_GET["id"];
    $sql = "SELECT * FROM producttb WHERE id=$id";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
        header("location: admin_page.html");
        exit;
    }

    $product_name = $row["product_name"];
    $product_price = $row["product_price"];
    $product_image = $row["product_image"];
    $product_description = $row["product_description"];


}else{
    
    $id = $_POST["id"];
    $product_name = $_POST["product_name"];
    $product_price = $_POST["product_price"];
    $product_image = $_POST["product_image"];
    $product_description = $_POST["product_description"];

    do{
        if(empty($id) || empty($product_name) || empty($product_price) || empty($product_image) || empty($product_description) ) {
            $errorMessage = "Sva polja su obavezna";
            break;
        }
        $sql = "UPDATE producttb " .
        "SET product_name = '$product_name', product_price = '$product_price', product_image = '$product_image', product_description = '$product_description' " .
        "WHERE id = $id";

        $result = $connection->query($sql);

        if (!$result) {
            $errorMessage = "Invalid query: " . $connection->error;

            break;
        }

        $successMessage = "Uspješno izmijenjen proizvod";

        header("location: admin_page.html");
        exit;

    }while(false);
}

?>