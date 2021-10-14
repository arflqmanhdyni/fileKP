<?php 
include '../config.php';
$faktur  = $_POST['faktur'];
$status_fk  = $_POST['status_fk'];
$tanggal = date('Y-m-d');

mysqli_query($config, "update faktur set faktur_status='$status_fk', tgl_terima='$tanggal' where faktur_id='$faktur'");

header("location:transaksi.php");
?>