<?php 

include 'config.php';

session_start();

unset($_SESSION['cust_id']);
unset($_SESSION['cust_status']);

header("location:index.php");
?>