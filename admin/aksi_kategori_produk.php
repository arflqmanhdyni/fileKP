<?php 
include '../config.php';
$id    = $_POST['id'];
$nama  = $_POST['nama'];

mysqli_query($config, "insert into kategori values ('$id','$nama')");
header("location:kategori_product.php");