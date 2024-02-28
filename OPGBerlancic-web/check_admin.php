<?php
session_start();

if(isset($_SESSION['admin_name'])){
    echo 'admin'; // If admin is logged in, return 'admin'
} else {
    echo 'not_admin'; // If not logged in as admin, return 'not_admin'
}
?>
