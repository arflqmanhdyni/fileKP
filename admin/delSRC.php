<?php
include "../config.php";
$id = $_GET['id'];

$query = mysqli_query($config, "DELETE FROM service_center WHERE id='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus..'); window.location = 'service_center.php'</script>";	
} else {
	echo "<script>alert('Gagal Menghapus Data..'); window.location = 'service_center.php'</script>";	
}
?>