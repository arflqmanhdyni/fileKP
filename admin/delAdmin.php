<?php
include "../config.php";
$user_id = $_GET['user_id'];

$query = mysqli_query($config, "DELETE FROM user_admin WHERE user_id='$user_id'");
if ($query){
	echo "<script>alert('Data Admin Berhasil dihapus..'); window.location = 'admin.php'</script>";	
} else {
	echo "<script>alert('Gagal Menghapus Data Admin..'); window.location = 'admin.php'</script>";	
}
?>