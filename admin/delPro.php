<?php
include "../config.php";
$product_id = $_GET['product_id'];

$query = mysqli_query($config, "DELETE FROM product WHERE product_id='$product_id'");
if ($query){
	echo "<script>alert('Data Produk Berhasil dihapus..'); window.location = 'product.php'</script>";	
} else {
	echo "<script>alert('Gagal Menghapus Data Produk..'); window.location = 'product.php'</script>";	
}
?>