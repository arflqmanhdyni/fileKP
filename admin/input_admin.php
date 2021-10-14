<?php include "layout/header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input User Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Input User Admin</li>
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
            <h3 class="card-title">Isikan Form data diri untuk terdaftar sebagai pegawai</h3>  
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <?php
                    
                    $query = mysqli_query($config, "SELECT max(user_id) as kodeTerbesar FROM user_admin WHERE role='pegawai'");
                    $data = mysqli_fetch_array($query);
                    $kodeAdmin = $data['kodeTerbesar'];
                    $urutan = (int) substr($kodeAdmin, 3, 3);
                    $urutan++;
                    $huruf = "10";
                    $kodeAdmin = $huruf . sprintf("%02s", $urutan); ?>
        

               <form action="aksi_admin.php" method="POST" enctype="multipart/form-data"  class="form-horizontal style-form">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                        <label for="squareInput">ID User</label>
                                        <input name="id" type="text"  class="form-control input-square" value="<?php echo $kodeAdmin ?>"  autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/>
                                    </div>
                                </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form Nama</label>
                                        <input name="nama" type="text"   class="form-control input-square" autocomplete="off" placeholder="Nama lengkap" autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form Username</label>
                                    <input name="username" type="email"  class="form-control input-square" autocomplete="off" placeholder="Username" autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form Password</label>
                                    <input name="password" type="text"  class="form-control input-square" autocomplete="off" placeholder="Password" autocomplete="off" required />
                                 </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form Alamat</label>
                                    <input name="alamat" type="text"  class="form-control input-square" autocomplete="off" placeholder="Input Form Alamat" autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form Nomor Hp</label>
                                    <input name="hp" type="number"  class="form-control input-square" autocomplete="off" placeholder="Input Form Nomor HP" autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Foto</label>
                                    <input name="foto" type="file" class="form-control input-square" required />
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
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>
        </div>
        <!-- /.card -->
        <?php include "layout/footer.php"?>