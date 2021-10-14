<?php 
// menghubungkan koneski PHP dengan Database //
include 'config.php';

// menampung data yang dikirimkan dari form login customer//
$email = $_POST['email'];
$password = md5($_POST['password']);

$login = mysqli_query($config, "SELECT * FROM user_customer WHERE cust_email='$email' AND cust_password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	session_start();
	$data = mysqli_fetch_assoc($login);

	// membatasi session administrator, agar user level admin tidak bisa mengakses halaman customer
	unset($_SESSION['id']);
	unset($_SESSION['nama']);
	unset($_SESSION['username']);
	unset($_SESSION['status']);

	// membuat session user level customer
	$_SESSION['cust_id'] = $data['cust_id'];
	$_SESSION['cust_status'] = "login";
	header("location:index.php");
}else{
	header("location:login_cust.php?alert=gagal");
}
