<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mars Computer | Log in User Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">    
    <?php 
					if(isset($_GET['alert'])){
				    if($_GET['alert'] == "gagal"){
							echo "<div class='alert alert-success bg-gradient-success text-center'>Email atau Password tidak sesuai,Silahkan coba lagi.</div>";
						}
					}
					?>
      <a href="#" class="h1"><b>Mars</b>Computer </br><center><img src="admin/assets/img/usericon.png" alt="navbar brand" class="navbar-brand"></center></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan login menggunakan email dan password</p>
       <form class="login-form" method="post" action="cek_login.php">
        <div class="input-group mb-3">
        <input id="username" name="username" type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
		<input id="password" name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
		  <div class="show-password">
							<i class="flaticon-interface"></i>
			</div>
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
       
          <div class="col-4">
            <button type="submit" value="login admin" class="btn btn-primary btn-block bg-gradient-primary">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="admin/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/assets/dist/js/adminlte.min.js"></script>
</body>
</html>
