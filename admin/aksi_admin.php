<?php 
include '../config.php';
$id    = $_POST['id'];
$nama  = $_POST['nama'];
$username = $_POST['username'];
$alamat = $_POST['alamat'];
$hp = $_POST['hp'];
$password = md5($_POST['password']);
$role ='karyawan';

$rand = rand();
$allowed =  array('gif','png','jpg','jpeg');
$filename = $_FILES['foto']['name'];

if($filename == ""){
	mysqli_query($config, "insert into user_admin values ('$id',$nama','$username','$password','$alamat','$hp','$role','')");
	header("location:admin.php");
}else{
	$ex = pathinfo($filename, PATHINFO_EXTENSION);

	if(!in_array($ex,$allowed) ) {
		header("location:admin.php?alert=gagal");
	}else{
		move_uploaded_file($_FILES['foto']['tmp_name'], '../fotoo/user/'.$rand.'_'.$filename);
		$file_foto = $rand.'_'.$filename;
		mysqli_query($config, "insert into user_admin values ('$id','$nama','$username','$password','$alamat','$hp','$role','$file_foto')");
		header("location:admin.php");
	}
}

