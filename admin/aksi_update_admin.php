<?php 
include '../config.php';
$id  = $_POST['id'];
$nama  = $_POST['nama'];
$username = $_POST['username'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$pwd = $_POST['password'];
$password = md5($_POST['password']);

// cek gambar
$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if($pwd=="" && $filename==""){
	mysqli_query($config, "update user_admin set user_nama='$nama', user_username='$username', user_alamat='$alamat', user_nohp='$hp' where user_id='$id'");
	header("location:admin.php");
}elseif($pwd==""){
	if(!in_array($ext,$allowed) ) {
		header("location:admin.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../fotoo/user/'.$rand.'_'.$filename);
		$ext = $rand.'_'.$filename;
		mysqli_query($config, "update user_admin set user_nama='$nama', user_username='$username', user_alamat='$alamat', user_nohp='$hp' user_foto='$ext' where user_id='$id'");		
		header("location:admin.php?alert=berhasil");
	}
}elseif($filename==""){
	mysqli_query($config, "update user_admin set user_nama='$nama', user_username='$username', user_password='$password' where user_id='$id'");
	header("location:admin.php");
}

