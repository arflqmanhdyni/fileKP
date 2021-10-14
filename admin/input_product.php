<?php include "layout/header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Data Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Input Data Produk</li>
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
            <h3 class="card-title">Isikan Form data Produk</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">

                    <?php

                            $query = mysqli_query($config, "SELECT max(product_id) AS kodeTerbesar FROM product");
                            $data = mysqli_fetch_array($query);
                            $kodeproduk = $data['kodeTerbesar'];
                            $urutan = (int) substr($kodeproduk, 2, 2 );
                            $urutan++;
                            $huruf = "55";
                            $kodeproduk = $huruf . sprintf("%02s", $urutan); ?>


                    <form action="aksi_product.php" method="POST" enctype="multipart/form-data"  class="form-horizontal style-form">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                        <label >ID Produk</label>
                                        <input name="id" type="number"  class="form-control select2bs4" value="<?php echo $kodeproduk ?>"  autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                <div class="form-group">
                                    <label >Kategori Produk</label>
                                    <select name="kategori" required="required" class="form-control select2bs4">
                                        <option value="">~~Menu Pilihan Kategori Produk~~</option>
                                        <?php
                                        include '../config.php';
                                        $data = mysqli_query($config,"SELECT * FROM kategori");
                                        while($dt = mysqli_fetch_array($data)){
                                            ?>
                                    <option value="<?php echo $dt['kategori_id']; ?>"><?php echo $dt['kategori_nama']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label > Nama Produk</label>
                                        <input name="nama_produk" type="text"   class="form-control select2bs4" autocomplete="off" placeholder="Nama Produk" autocomplete="off" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label >Harga Produk</label>
                                    <input name="harga_produk" type="number"  class="form-control select2bs4" autocomplete="off" placeholder="Harga Produk" autocomplete="off" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label >Jumlah Produk</label>
                                    <input name="jumlah_produk" type="number"  class="form-control select2bs4" autocomplete="off" placeholder="Stok Produk" autocomplete="off" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label >Keterangan Produk</label>
                                    <textarea  name="keterangan_produk" class="form-control ckeditor" required="required" style="resize: none" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label >Bobot Produk</label>
                                    <input name="bobot_produk" type="number"  class="form-control select2bs4" autocomplete="off" placeholder="Bobot Produk" autocomplete="off" required />
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label >foto slide 1</label>
                                    <input name="foto1" type="file" class="form-control select2bs4" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label >foto slide 2</label>
                                    <input name="foto2" type="file" class="form-control select2bs4" required />
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label >foto slide 3</label>
                                    <input name="foto3" type="file" class="form-control select2bs4" required />
                                </div>
                            </div>

                            <div class="form-group">
                            <input type="submit" name="input"  class="btn btn-primary bg-gradient-primary" value="Simpan"></input>
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
