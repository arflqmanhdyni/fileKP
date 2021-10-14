<?php 
// menyambungkan koneksi ke databse
include 'config.php';

// menampung data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);

$login = mysqli_query($config, "SELECT * FROM user_admin WHERE user_username='$username' AND user_password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);
	$_SESSION['id'] = $data['user_id'];
	$_SESSION['nama'] = $data['user_nama'];
	$_SESSION['username'] = $data['user_username'];
	$_SESSION['alamat'] = $data['user_alamat'];
	$_SESSION['level'] = $data['role'];
	$_SESSION['foto'] = $data['user_foto'];
	$_SESSION['status'] = "login";

	header("location:admin/");
}else{
	header("location:login.php?alert=gagal");
}
