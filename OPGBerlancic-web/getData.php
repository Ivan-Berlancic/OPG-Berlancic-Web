<?php

include 'php\CreateDb.php'; 

$database = new CreateDb("Productdb", "Producttb");

$productsData = $database->getProductsData();

header('Content-Type: application/json');
echo json_encode($productsData);

?>