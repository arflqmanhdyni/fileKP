<?php include "layout/header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Ubah Data Service Center</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Ubah Data Service Center</li>
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
            <h3 class="card-title">Ubahlah Data Service Center jika diperlukan.</h3>  
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
           			
              <form action="aksi_update_sc.php" method="post" class="form-horizontal style-form" >
					
          <?php 
                $id = $_GET['id'];
                $data = mysqli_query($config,"select * from service_center where id='$id'");
                while($dt = mysqli_fetch_array($data)){
                ?>	
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">ID</label>
                                    <input type="text" class="form-control input-square" name="id" value="<?php echo $dt['id'] ?>" required="required" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Ubah Merk</label>
                                    <input type="text" name="merk" value="<?php echo $dt['merk'] ?>"  class="form-control input-square" required="required" >
                                </div>
                            </div>
                        
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Ubah URL</label>
                                    <input type="text" name="url" value="<?php echo $dt['url'] ?>"  class="form-control input-square" required="required" >
                                </div>
                            </div>
                        
                                                                                      
                            
                            <div class="form-group">
                            <input type="submit"  class="btn btn-primary" value="Simpan"></input>
                            
                            <input type="reset" class="btn btn-danger"></input>
                            </div>
                            <?php

                            }?>
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