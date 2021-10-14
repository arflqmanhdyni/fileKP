<?php
include 'config.php';

session_start();

$id  = $_SESSION['cust_id'];
$nama  = $_POST['nama'];
$username = $_POST['username'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$tanggall = date('Y-m-d');
$pwd = $_POST['password'];
$password = md5($_POST['password']);



$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($config, "update user_customer set cust_nama='$nama', cust_email='$username' , cust_alamat='$alamat',  cust_hp='$hp', tgl_daftar='$tanggall' where cust_id='$id'");
	header("location:display_cust.php");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:display_cust.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], 'fotoo/user/'.$rand.'_'.$filename);
		$ext = $rand.'_'.$filename;
		mysqli_query($config, "update user_customer set cust_nama='$nama', cust_email='$username', cust_foto='$ext' where cust_id='$id'");
		header("location:display_cust.php?alert=berhasil");
	}
}elseif($filename==""){
	mysqli_query($config, "update user_customer set cust_password='$password' ,cust_nama='$nama', cust_email='$username'  where cust_id='$id'");
	header("location:display_cust.php?alert=berhasil");
}
