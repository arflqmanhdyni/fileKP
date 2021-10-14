<?php 
include 'config.php';

$id = $_POST['id'];
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['tanda_bukti']['name'];

$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(in_array($ext,$allowed) ) {

	$file_gambar = $rand.'.'.$ext;

	move_uploaded_file($_FILES['tanda_bukti']['tmp_name'], 'fotoo/bukti_bayar/'.$file_gambar);

	//Menghapus Gambar Terdahulu
	$dulu = mysqli_query($config, "select * from faktur where faktur_id='$id'");
	$dl = mysqli_fetch_assoc($dulu);

	$foto = $dl['faktur_bukti'];

	unlink("fotoo/bukti_bayar/$foto");

	mysqli_query($config,"update faktur set faktur_bukti='$file_gambar', faktur_status='1' where faktur_id='$id'")or die(mysqli_error($config));
	header("location:pesanan.php?alert=upload");
}else{
	header("location:pesanan.php?alert=gagal");
}