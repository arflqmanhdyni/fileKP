<?php include "layout/header.php";?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Panel Dashboard</h1>
            </div><!-- /.col -->
           
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

<!-- Main content -->
  <section class="content">
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-gradient-info elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content"  >
                  <strong class="info-box-text"><a href="admin.php" class="text-uppercase">Admin</a></strong>
                  <span class="info-box-number">
                  <?php $tampil=mysqli_query($config, "select * from user_admin order by user_id desc");
																$total=mysqli_num_rows($tampil);
															?>Jumlah : <?php echo "$total"; ?>
                    
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-barcode"></i></span>

                <div class="info-box-content">
                  <strong class="info-box-text"><a href="product.php" class="text-uppercase">Produk</a></strong>
                  <span class="info-box-number"> <?php $tampil=mysqli_query($config, "select * from product order by product_id desc");
																$total=mysqli_num_rows($tampil);
															?>Jumlah : <?php echo "$total"; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <strong class="info-box-text"><a href="transaksi.php" class="text-uppercase">Transaksi</a></strong>
                  <span class="info-box-number"> <?php $tampil=mysqli_query($config, "select * from transaksi order by trans_id desc");
																$total=mysqli_num_rows($tampil);
															?>Jumlah : <?php echo "$total"; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <strong class="info-box-text"><a href="customer.php" class="text-uppercase">Customer</a></strong>
                  <span class="info-box-number"> <?php $tampil=mysqli_query($config, "select * from user_customer order by cust_id desc");
																$total=mysqli_num_rows($tampil);
															?>Jumlah : <?php echo "$total"; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h5 class="card-title">Selamat Datang, <br>Login Sebagai :	<span><?php echo $_SESSION['nama']; ?></span> (User Level : <span class="user-level"><?php echo $_SESSION['level']; ?></span>)</h5>
                  </div>
                </div>
                <!-- /.card-header -->
    <?php include "layout/footer.php";?>