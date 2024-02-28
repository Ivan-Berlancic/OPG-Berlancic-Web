<?php
session_start();

$loggedIn = isset($_SESSION['user_name']) || isset($_SESSION['admin_name']);

$isAdmin = isset($_SESSION['admin_name']);

echo json_encode(array('loggedIn' => $loggedIn, 'isAdmin' => $isAdmin));
?>
