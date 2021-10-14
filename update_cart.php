<?php 
include 'config.php';

$product = $_POST['product'];
$jumlah = $_POST['jumlah'];

session_start();
$jumlah_isi_cart = count($_SESSION['cart']);



for($a = 0;$a < $jumlah_isi_cart; $a++){
	
	$_SESSION['cart'][$a] = array(
		'product' => $product[$a],
		'jumlah' => $jumlah[$a]
	);

}

header("location:cart.php");
?>

	