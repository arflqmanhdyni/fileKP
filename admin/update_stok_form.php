<?php include "layout/header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Tambah Data Stok Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Tambah Data Stok Produk</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Silahkan Isikan Stok Data Produk</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <form action="update_stok.php" method="post" enctype="multipart/form-data" class="form-horizontal style-form" >
            
                <div class="col-sm-12">
                    <div class="form-group">
                            <label >Nama Produk</label>
                            <select name="product_nama" id="product_nama" required="required" class="selectpicker form-control input-square" data-live-search="true">
                            <option value="">Cari Produk</option>
                                <?php

                                include '../config.php';
                                $produkk = mysqli_query($config,"SELECT * FROM product");
                                while($pt = mysqli_fetch_array($produkk)){
                                ?>

                                <option value="<?php echo $pt['product_id'] .' - '. $pt['product_nama'];?>"><?php echo $pt['product_id'] .' - '. $pt['product_nama'];?></option>
                                
                                <?php
                                }
                                ?>
                            </select>

                            
                            
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="form-group">
                            <label >Ubah Jumlah Produk</label>
                            <input type="number" name="jumlah_produk" value="<?php echo $dt['product_jumlah'] ?>" class="form-control input-square" required="required" >
                    </div>
                </div>

              
             
                <div class="form-group">
                    <input type="submit"  class="btn btn-primary bg-gradient-primary" value="Simpan"></input>
                    <input type="reset" class="btn btn-danger bg-gradient-danger"></input>
                </div>
                
                </div>
                </form>

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">

          </div>
        </div>
        <!-- /.card -->
        <?php include "layout/footer.php"?>
