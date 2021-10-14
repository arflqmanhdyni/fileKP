<?php
include '../config.php';
date_default_timezone_set('Asia/Jakarta');
$jumlah_produk = $_POST['jumlah_produk'];
$tanggall = date('Y-m-d H:i:sa');

$ambil					= isset($_POST['product_nama']) ? $_POST['product_nama'] : "";
$terbelah				= explode ("-", $ambil);
$id						= $terbelah[0];
$produk					= $terbelah[1];

$stokk_update = (int)$jumlah_produk;

$tambah_query = mysqli_query($config, "insert into stok_masukk(product_nama,tanggal,product_id,stok_masuk) values ('$produk','$tanggall','$id','$jumlah_produk')");

$update_query = mysqli_query($config, "update product set product_jumlah=(product_jumlah + $stokk_update) where product_id='$id'");


if ($tambah_query&&$update_query){
	echo "<script>alert('Data Berhasil ditambahkan'); window.location = 'Laporan_produk_masuk.php'</script>";
}else{
	echo "<script>alert('Data  Gagal ditambahkan'); window.location = 'Laporan_produk_masuk.php'</script>";
}


$insert_last_id = mysqli_insert_id($config);



//header("location:laporan_produk_masuk.php");
