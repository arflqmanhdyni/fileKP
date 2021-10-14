<?php
include "../config.php";
$id_bank = $_GET['id_bank'];

$query = mysqli_query($config, "DELETE FROM bank WHERE id_bank='$id_bank'");
if ($query){
	echo "<script>alert('Data bank Berhasil dihapus..'); window.location = 'rekening.php'</script>";	
} else {
	echo "<script>alert('Gagal Menghapus Data bank..'); window.location = 'rekening.php'</script>";	
}
?>