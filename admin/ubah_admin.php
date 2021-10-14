<?php include "layout/header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Ubah Data User Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Ubah Data User Admin</li>
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
            <h3 class="card-title">Isikan Form Data Diri Untuk Mengubah Data Karyawan</h3>  
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
              <form action="aksi_update_admin.php" method="post" enctype="multipart/form-data" class="form-horizontal style-form" >
					
					<?php 
							$id = $_GET['id'];
							$data = mysqli_query($config,"select * from user_admin where user_id='$id'");
							while($dt = mysqli_fetch_array($data)){
							?>	
                            <div class="col-sm-12">
								<div class="form-group">
									<label for="squareInput">Id</label>
									<input type="text"  class="form-control input-square" name="id" value="<?php echo $dt['user_id'] ?>" required="required" readonly>
								</div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form Nama</label>
                                    <input type="text" name="nama" value="<?php echo $dt['user_nama'] ?>"  class="form-control input-square" required="required" >
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form Username</label>
                                    <input type="text" name="username" value="<?php echo $dt['user_username'] ?>"  class="form-control input-square" required="required" >
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form Alamat</label>
                                    <input type="text" name="alamat" value="<?php echo $dt['user_alamat'] ?>"  class="form-control input-square" required="required" >
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form Nomor Hp</label>
                                    <input type="text" name="hp" value="<?php echo $dt['user_nohp'] ?>"  class="form-control input-square" required="required" >
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form Password</label>
                                    <input type="text" name="password"  class="form-control input-square"  placeholder="abaikan jika tidak dirubah">
                                </div>
                            </div>
                        
                            <div class="col-sm-12">
                                <div class="form-group">
                                <small class="text-muted">Upload Ukuran foto minimal 700px*</small>
                                    <label for="squareInput">Foto </label>                                              
                                    <input type="file" name="foto"><img src="../fotoo/user/<?php echo $dt['user_foto'] ?>" style="max-width:140px" alt="..." class="avatar-img rounded-square"></input>
                        
                                </div>
                            </div>
                            <div class="form-group">
                            <input type="submit"  class="btn btn-primary" value="Simpan"></input>
                            
                            <input type="reset" value="Batal" class="btn btn-danger"></input>
                            </div>
                            <?php }?>
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