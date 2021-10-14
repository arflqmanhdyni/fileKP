<?php 
include '../config.php';
$id    = $_POST['id'];
$nama  = $_POST['nama'];
$nama_pemilik = $_POST['nama_pemilik'];
$no_rekening = $_POST['no_rekening'];

mysqli_query($config, "insert into bank values ('$id','$nama', '$nama_pemilik', '$no_rekening')");
header("location:rekening.php");