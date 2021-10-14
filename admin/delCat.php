<?php
include "../config.php";
$kategori_id = $_GET['kategori_id'];

$query = mysqli_query($config, "DELETE FROM kategori WHERE kategori_id='$kategori_id'");
if ($query){
	echo "<script>alert('Data category Berhasil dihapus..'); window.location = 'kategori_product.php'</script>";	
} else {
	echo "<script>alert('Gagal Menghapus Data category..'); window.location = 'kategori_product.php'</script>";	
}
?>