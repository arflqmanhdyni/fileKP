<?php
  include '../config.php';
  session_start();
  if($_SESSION['status'] != "login"){
    header("location:../login.php?alert=belum_login");
  }
  
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mars Computer | Dashboard </title>

  <!-- Search Select -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/css/bootstrap-select.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
   <!-- DataTables -->
   <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- Select2 -->

    <link rel="stylesheet" href="assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- daterangepicker -->
  <link rel="stylesheet" href="assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="assets/bootstrap-daterangepicker/daterangepicker.css">
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">



    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">




      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="assets/dist/img/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
          style="opacity: .8">
        <h4 class="brand-text font-weight-light"><b>MarsComputer</b></h4>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
          <?php
								$id = $_SESSION['id'];
								$profile = mysqli_query($config,"select * from user_admin where user_id='$id'");
								$dt = mysqli_fetch_assoc($profile);
								if($dt['user_foto'] == ""){
								?>
								<img src="../fotoo/user/fotoku.jpg" alt="..." class="img-circle elevation-2" alt="User Image">
								<?php }else{ ?>
								<img src="../fotoo/user/<?php echo $dt['user_foto'] ?>" alt="..." class="avatar-img rounded-circle">
								<?php } ?>

          </div>

          <div class="info">
            <span class="text-uppercase"><?php echo $_SESSION['nama']; ?></span>
          </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
               <a href="admin_profil.php?id=<?php echo $dt['user_id'] ?>" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  My Profile
                  <span class="right badge badge-danger bg-gradient-danger text-uppercase">USER : <?php echo $_SESSION['level']; ?></span>
                </p>
              </a>
            </li>
               <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                  <span class="right badge badge-info bg-gradient-info">HOME</span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Users
                  <i class="fas fa-angle-left right"></i>

                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="admin.php" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Daftar Admin</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="customer.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Customer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="laporan_customer.php" class="nav-link">
                    <i class="fas fa-print nav-icon"></i>
                    <p>Laporan Data Customer</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-barcode"></i>
                <p>
                  Data Produk
                  <i class="fas fa-angle-left right"></i>
                 

                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="product.php" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Daftar Produk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="kategori_product.php" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Kategori Produk</p>
                  </a>
                </li>
              </ul>
            </li>

             <li class="nav-item">
             <a href="#" class="nav-link">
                <i class="nav-icon fas fa-file-invoice-dollar"></i>
                <p>
                  Data Transaksi
                  <i class="fas fa-angle-left right"></i>

                </p>
              </a>
              <ul class="nav nav-treeview">

                <li class="nav-item">
                  <a href="transaksi.php" class="nav-link">
                    <i class="fas fa-circle nav-icon"></i>
                    <p>Daftar Transaksi </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="laporan_transaksi.php" class="nav-link">
                    <i class="fa fa-print nav-icon"></i>
                    <p>Cetak Laporan Transaksi </p>
                  </a>
                </li>

              </ul>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
               <i class="nav-icon fas fa-chart-bar"></i>
               <p>
                 Data Stok Produk
                 <i class="fas fa-angle-left right"></i>

               </p>
             </a>
             <ul class="nav nav-treeview">

               <li class="nav-item">
                 <a href="laporan_produk_masuk.php" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Update Stok</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="laporan_produk1.php" class="nav-link">
                   <i class="fas fa-circle nav-icon"></i>
                   <p>Stok Out</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="laporan_stok_update.php" class="nav-link">
                   <i class="fa fa-print nav-icon"></i>
                   <p>Cetak Stok Update </p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="laporan_produk.php" class="nav-link">
                   <i class="fa fa-print nav-icon"></i>
                   <p>Cetak Stok Out </p>
                 </a>
               </li>

             </ul>
           </li>
            <li class="nav-item">
              <a href="rekening.php" class="nav-link">
                <i class="nav-icon fas fa-credit-card"></i>
                <p>
                  Rekening

                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="service_center.php" class="nav-link">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                  Data Service Center

                </p>
              </a>
            </li>
            <li class="nav-item">
            <script>
                  function logoutFunction() {
                    return confirm ('Apakah Anda Akan Logout .?');
                  }
					  </script>
              <a href="../logout.php" class="nav-link" onclick='return logoutFunction()'>
                <i class="nav-icon fas fa-sign-out-alt"></i>

                <p>
                  Log Out

                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
