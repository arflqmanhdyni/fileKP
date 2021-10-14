<?php 
include 'config.php';
session_start();

$id_product = $_GET['id'];
$redirect = $_GET['redirect'];

if(isset($_SESSION['cart'])){


	for($a=0;$a<count($_SESSION['cart']);$a++){
		if($_SESSION['cart'][$a]['product'] == $id_product){
			unset($_SESSION['cart'][$a]);

			// urutkan kembali
			sort($_SESSION['cart']);
		}
	}

	
}

if($redirect == "index"){
	$rd = "cust.php";
}elseif($redirect == "detail"){
	$rd = "detail_produk.php?id=".$id_product;
}elseif($redirect == "cart"){
	$rd = "cart.php";
}

print_r($_SESSION['cart']);
header("location:".$rd);
?>