<?php 
include '../config.php';
$faktur  = $_POST['faktur'];
$status_fk  = $_POST['status_fk'];
$tanggal = date('Y-m-d H:i:sa');

$status_trx=mysqli_query($config, "update faktur set faktur_status='$status_fk', tgl_terima='$tanggal' where faktur_id='$faktur'");

if ($status_trx){
	echo "<script>alert('Data Berhasil'); window.location = '../pesanan.php'</script>";
}else{
	echo "<script>alert('Data  Gagal'); window.location = '../pesanan.php'</script>";
}
?>