<?php
include '../config.php';

$id        = $_POST['id'];
$nama_produk  = $_POST['nama_produk'];
$kategori = $_POST['kategori'];
$keterangan_produk = $_POST['keterangan_produk'];
$jumlah_produk = $_POST['jumlah_produk'];
$bobot_produk = $_POST['bobot_produk'];
$harga_produk = $_POST['harga_produk'];
$tanggal = date('Y-m-d');

 


$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');

$filename1 = $_FILES['foto1']['name'];
$filename2 = $_FILES['foto2']['name'];
$filename3 = $_FILES['foto3']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

mysqli_query($config, "update product set product_nama='$nama_produk', product_kategori='$kategori',product_ket='$keterangan_produk',product_jumlah='$jumlah_produk', product_kg='$bobot_produk',product_harga='$harga_produk', tanggal='$tanggal' where product_id='$id'");





$insert_last_id = mysqli_insert_id($config);


if($filename1 != ""){
	$ext = pathinfo($filename1, PATHINFO_EXTENSION);

	if(in_array($ext,$allowed) ) {
		move_uploaded_file($_FILES['foto1']['tmp_name'], '../fotoo/produk/'.$rand.'_'.$filename1);
		$file_gambar = $rand.'_'.$filename1;

		mysqli_query($config,"update product set product_foto1='$file_gambar' where product_id='$id'");
	}
}

if($filename2 != ""){
	$ext = pathinfo($filename2, PATHINFO_EXTENSION);

	if(in_array($ext,$allowed) ) {
		move_uploaded_file($_FILES['foto2']['tmp_name'], '../fotoo/produk/'.$rand.'_'.$filename2);
		$file_gambar = $rand.'_'.$filename2;

		mysqli_query($config,"update product set product_foto2='$file_gambar' where product_id='$id'");
	}
}

if($filename3 != ""){
	$ext = pathinfo($filename3, PATHINFO_EXTENSION);

	if(in_array($ext,$allowed) ) {
		move_uploaded_file($_FILES['foto3']['tmp_name'], '../fotoo/produk/'.$rand.'_'.$filename3);
		$file_gambar = $rand.'_'.$filename3;

		mysqli_query($config,"update product set product_foto3='$file_gambar' where product_id='$id'");
	}
}

header("location:product.php");
