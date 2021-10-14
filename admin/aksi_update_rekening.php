<?php 
include '../config.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$nama_pemilik  = $_POST['nama_pemilik'];
$no_rekening = $_POST['no_rekening'];
mysqli_query($config, "update bank set nama_bank='$nama', pemilik='$nama_pemilik', no_rek='$no_rekening' where id_bank='$id'");
header("location:rekening.php");