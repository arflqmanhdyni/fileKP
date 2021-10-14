<?php 
include '../config.php';
$id  = $_POST['id'];
$merk  = $_POST['merk'];
$url  = $_POST['url'];
mysqli_query($config, "UPDATE service_center SET merk='$merk', url='$url' WHERE id='$id'");
header("location:service_center.php");