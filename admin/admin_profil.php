 <?php include "layout/header.php";?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="text-uppercase"> My Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                      src="../fotoo/user/<?php echo $dt['user_foto'] ?>"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center"><?php echo $dt['user_nama'] ?></h3>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b class="text-uppercase">Level : <?php echo $dt['role'] ?></b>
                  </li>
                
                </ul>

                <a href="#" class="btn btn-primary btn-block"><b>MarsComp</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
           
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" name="activity">
                      <div>
                       
                      </div>
                      <!-- END timeline item -->
                     
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" name="settings">
                   
                    <form action="aksi_update_profile.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <?php   
                           
                            $data = mysqli_query($config, "select * from user_admin where user_id='$id'");
                            while($dt = mysqli_fetch_array($data)){
                    ?>
                     <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ID Users Admin</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="id" disabled value="<?php echo $dt['user_id']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Name Lengkap</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="nama" placeholder="Ubah Nama" value="<?php echo $dt['user_nama']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Email / Username</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="username" placeholder="Ubah Username / Email " value="<?php echo $dt['user_username']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="alamat" placeholder="Ubah Alamat" value="<?php echo $dt['user_alamat']; ?>">
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="hp" placeholder="Ubah NO Telepon" value="<?php echo $dt['user_nohp']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Ubah Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="password" placeholder="Ubah Password Jika diperlukan">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">Ubah Foto</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="foto" >
                          <small class="text-muted">Upload Ukuran foto minimal 700px*</small>
                        </div>
                      </div>
                     
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <?php } ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 <?php include "layout/footer.php";?>