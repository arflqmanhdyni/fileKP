<?php include "layout/header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Ubah Data Rekening</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Ubah Data Rekening/li>
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
            <h3 class="card-title">Ubahlah Data Rekening jika diperlukan.</h3>  
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
           			
              <form action="aksi_update_rekening.php" method="post" class="form-horizontal style-form" >
					
          <?php 
                $id = $_GET['id'];
                $data = mysqli_query($config,"select * from bank where id_bank='$id'");
                while($dt = mysqli_fetch_array($data)){
                ?>	
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">ID Rekening</label>
                                    <input type="text" class="form-control input-square" name="id" value="<?php echo $dt['id_bank'] ?>" required="required" readonly>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Ubah Nama Bank</label>
                                    <input type="text" name="nama" value="<?php echo $dt['nama_bank'] ?>"  class="form-control input-square" required="required" >
                                </div>
                            </div>
                        
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Ubah Nama Pemilik Rekening</label>
                                    <input type="text" name="nama_pemilik" value="<?php echo $dt['pemilik'] ?>"  class="form-control input-square" required="required" >
                                </div>
                            </div>
                        
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Ubah Nomor Rekening</label>
                                    <input type="text" name="no_rekening" value="<?php echo $dt['no_rek'] ?>"  class="form-control input-square" required="required" >
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