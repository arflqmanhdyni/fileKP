<?php
include 'config.php';

session_start();

$id_cust = $_SESSION['cust_id'];
$id    = $_POST['id'];
$tanggal = date('Y-m-d');

$nama = $_POST['nama'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];

$provinsi = $_POST['wilayah_provinsi'];
$kabupaten = $_POST['wilayah_kabupaten'];

$kurir = $_POST['kurir'] ." - ". $_POST['service'];
$berat = $_POST['berat'];

$ongkir = $_POST['ongkos_kirim'];

$total_bayar = $_POST['total_bayar']+$ongkir;
$noresi = $_POST['noresi'];

$tanggal_ter = date('Y-m-d H:i:sa');

mysqli_query($config,"insert into faktur values('$id','$tanggal','$id_cust','$nama','$hp','$alamat','$provinsi','$kabupaten','$kurir','$berat','$noresi','$ongkir','$total_bayar','','','$tanggal_ter')")or die(mysqli_error($config));

//$last_id = mysqli_insert_id($config);


// aksi transaksi
//$faktur = $last_id;


$jumlah_isi_cart = count($_SESSION['cart']);

for($a = 0; $a < $jumlah_isi_cart; $a++){
	$id_product = $_SESSION['cart'][$a]['product'];
	$jml = $_SESSION['cart'][$a]['jumlah'];

	$contents = mysqli_query($config,"select * from product where product_id='$id_product'");
	$f = mysqli_fetch_assoc($contents);


	$product = $f['product_id'];
	$jumlah = $_SESSION['cart'][$a]['jumlah'];
	$harga = $f['product_harga'];
	$tgl_trans = date('Y-m-d');

	mysqli_query($config,"insert into transaksi values(NULL,'$id','$product','$jumlah','$harga','$tgl_trans')");

	unset($_SESSION['cart'][$a]);

	mysqli_query($config, "UPDATE product SET product_jumlah=product_jumlah-$jml WHERE product_id='$id_product'");
}


header("location:pesanan.php?alert=sukses");
