<?php include "layout/header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Ubah Data Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Update Product</li>
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
            <h3 class="card-title">Ubahlah Data Produk yang diperlukan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <form action="aksi_update_product.php" method="post" enctype="multipart/form-data" class="form-horizontal style-form" >

            <?php
                $id = $_GET['id'];
                $data = mysqli_query($config,"select * from product where product_id='$id'");
                while($dt = mysqli_fetch_array($data)){
                ?>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label >ID Product</label>
                        <input type="text" class="form-control input-square" name="id" value="<?php echo $dt['product_id'] ?>" required="required" readonly>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="form-group">
                            <label >Ubah Nama Produk</label>
                            <input type="text" name="nama_produk" value="<?php echo $dt['product_nama'] ?>" class="form-control input-square" required="required" >
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                            <label >Ubah Nama Produk</label>
                            <select name="kategori" required="required" class="form-control input-square">
                                <option value="">- Menu Pilihan Data Kategori Produk -</option>
                                <?php
                                include '../config.php';
                                $kategori = mysqli_query($config,"SELECT * FROM kategori");
                                while($kt = mysqli_fetch_array($kategori)){
                                ?>
                                <option <?php if($kt['kategori_id'] == $dt['product_kategori']){echo "selected='selected'";} ?> value="<?php echo $kt['kategori_id']; ?>"><?php echo $kt['kategori_nama']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                    </div>
                </div>



                <div class="col-sm-12">
                    <div class="form-group">
                            <label >Ubah Keterangan Produk</label>
                            <textarea name="keterangan_produk" class="form-control ckeditor" required="required" style="resize: none" rows="12"><?php echo $dt['product_ket']; ?></textarea>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                           
                            <input type="hidden" name="jumlah_produk" value="<?php echo $dt['product_jumlah'] ?>" class="form-control input-square" required="required" >
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                            <label >Ubah Bobot Produk</label>
                            <input type="number" name="bobot_produk" value="<?php echo $dt['product_kg'] ?>" class="form-control input-square" required="required" >
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                            <label >Ubah Harga Produk</label>
                            <input type="number" name="harga_produk" value="<?php echo $dt['product_harga'] ?>" class="form-control input-square" required="required" >
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="form-group">
                    <label>Slide Foto 1</label>
                        <input type="file" name="foto1">

                        <?php if($dt['product_foto1'] == ""){ ?>
                            <img src="../fotoo/produk/1192884602_ASUS-TUF.jpg" style="width: 120px;height: auto">
                        <?php }else{ ?>
                            <img src="../fotoo/produk/<?php echo $dt['product_foto1'] ?>" style="width: 120px;height: auto">
                        <?php } ?>

                        <br/>
                        <span class="text-muted">Abaikan Jika Tidak Ingin Merubah Gambar Produk</span>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                    <label>Slide Foto 2</label>
                        <input type="file" name="foto2">

                        <?php if($dt['product_foto2'] == ""){ ?>
                            <img src="../fotoo/produk/1192884602_ASUS-TUF.jpg" style="width: 120px;height: auto">
                        <?php }else{ ?>
                            <img src="../fotoo/produk/<?php echo $dt['product_foto2'] ?>" style="width: 120px;height: auto">
                        <?php } ?>

                        <br/>
                        <span class="text-muted">Abaikan Jika Tidak Ingin Merubah Gambar Produk</span>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                    <label>Slide Foto 3</label>
                        <input type="file" name="foto3">

                        <?php if($dt['product_foto3'] == ""){ ?>
                            <img src="../fotoo/produk/1192884602_ASUS-TUF.jpg" style="width: 120px;height: auto">
                        <?php }else{ ?>
                            <img src="../fotoo/produk/<?php echo $dt['product_foto3'] ?>" style="width: 120px;height: auto">
                        <?php } ?>

                        <br/>
                        <span class="text-muted">Abaikan Jika Tidak Ingin Merubah Gambar Produk</span>
                    </div>
                </div>


                <div class="form-group">
                    <input type="submit"  class="btn btn-primary bg-gradient-primary" value="Simpan"></input>
                    <input type="reset" class="btn btn-danger bg-gradient-danger"></input>
                </div>
                        <?php
                            }
                        ?>
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
