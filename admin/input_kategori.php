<?php include "layout/header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Kategori Produk</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Input Kategori Produk</li>
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
            <h3 class="card-title">Isikan Form Kategori Produk</h3>  
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <?php
								
                    $query = mysqli_query($config, "SELECT max(kategori_id) as kodeTerbesar FROM kategori");
                    $data = mysqli_fetch_array($query);
                    $kodeCat = $data['kodeTerbesar'];
                    $urutan = (int) substr($kodeCat, 3, 3);
                    $urutan++;
                    $huruf = "21";
                    $kodeCat = $huruf . sprintf("%02s", $urutan); ?>
					
		
					<form action="aksi_kategori_produk.php" method="POST" class="form-horizontal style-form">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                    <label>ID Kategori</label>
                                    <input name="id" type="text" class="form-control input-square" value="<?php echo $kodeCat ?>"  autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/>
                                </div>
                            </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Form Nama Kategori</label>
                                    <input name="nama" type="text"  class="form-control input-square" autocomplete="off" placeholder="Nama Kategori" autocomplete="off" required />
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Simpan"></input>
                        <input type="reset" class="btn btn-danger"></input>
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