<?php 
include '../config.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];

mysqli_query($config, "update kategori set kategori_nama='$nama' where kategori_id='$id'");
header("location:kategori_product.php");