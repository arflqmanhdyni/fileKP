<?php 
include 'config.php';

$id_product = $_GET['id'];
$redirect = $_GET['redirect'];

$data = mysqli_query($config,"select * from product, kategori where kategori_id=product_kategori and product_id='$id_product'");
$dt = mysqli_fetch_assoc($data);

session_start();

// session_destroy();

if(isset($_SESSION['cart'])){
	$jumlah_isi_cart = count($_SESSION['cart']);

	$sudah_terisi = 0;
	for($a = 0;$a < $jumlah_isi_cart; $a++){

		// mengecek apakah product sudah ada dalam keranjang
		if($_SESSION['cart'][$a]['product'] == $id_product){

			$sudah_terisi = 1;
			
		}
	}

	if($sudah_terisi == 0){
		$_SESSION['cart'][$jumlah_isi_cart] = array(
			'product' => $id_product,
			'jumlah' => 1
		);

	}

}else{


	$_SESSION['cart'][0] = array(
		'product' => $id_product,
		'jumlah' => 1
	);
}


if($redirect == "index"){
	$rd = "shop.php";
}elseif($redirect == "detail"){
	$rd = "detail_produk.php?id=".$id_product;
}elseif($redirect == "cart"){
	$rd = "cart.php";
}

header("location:".$rd);
?>