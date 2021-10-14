<?php 
include '../config.php';
$id    = $_POST['id'];
$merk  = $_POST['merk'];
$url = $_POST['url'];

mysqli_query($config, "insert into service_center values ('$id','$merk','$url')");
header("location:service_center.php");