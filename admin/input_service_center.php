<?php include "layout/header.php"?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Service Center</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Input Service Center</li>
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
            <h3 class="card-title">Isikan Form Data Service Center</h3>  
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
          	
              <?php
                
                $query = mysqli_query($config, "SELECT max(id) as kodeTerbesar FROM service_center");
                $data = mysqli_fetch_array($query);
                $kodeSRC = $data['kodeTerbesar'];
                $urutan = (int) substr($kodeSRC, 2, 2);
                $urutan++;
                $huruf = "99";
                $kodeSRC = $huruf . sprintf("%02s", $urutan); ?>
		
					<form action="aksi_service_center.php" method="POST" class="form-horizontal style-form">
                        <div class="row">
                        <div class="col-sm-12">
                                <div class="form-group">
                                        <label for="squareInput">ID Rekening</label>
                                        <input name="id" type="int" class="form-control input-square" value="<?php echo $kodeSRC ?>"  autocomplete="off" readonly="readonly"/>
                                    </div>
                                </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form Merk</label>
                                        <input name="merk" type="text"  class="form-control input-square" autocomplete="off" placeholder="Isikan Merk" autocomplete="off" required />
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="squareInput">Form URL</label>
                                        <input name="url" type="text"  class="form-control input-square" autocomplete="off" placeholder="Isikan URL" autocomplete="off" required />
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