<?php include "layout/header.php"?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data URL Service Center</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">DataTables Url Service Center .</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
            
                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">DataTables Tampil Data Url Service Center</h3>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <a href="input_service_center.php" class="btn btn-primary btn-round ml-auto" >
                        <i class="fa fa-plus"></i>
                        Insert Data
				    </a>
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr >
                            <th class="text-center" width="5%">No</th>                            
                            <th width="10%">Merk</th>
                            <th width="10%">URL</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    
                    
                        <tbody>
                        <?php 
                            include '../config.php';
                            $no=1;
                            $data = mysqli_query($config,"SELECT * FROM service_center");
                            while($dt = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td class="text-center" ><?php echo $dt['merk']; ?></td>
                                <td class="text-center"><?php echo $dt['url']; ?></td>
                                <td class="text-center">
                                    <div class="form-button-action">
                                        <a type="button" data-toggle="tooltip" title="" class="btn btn-sm btn-primary btn-lg" data-original-title="Ubah Data" href="ubah_service_center.php?id=<?php echo $dt['id'] ?>"><i class="fa fa-edit" ></i>
                                        </a>
                                        
                                        <a type="button" data-toggle="tooltip"  onclick="return confirm ('Yakin hapus <?php echo $dt['merk'];?>.?');"  title="Hapus Data" class="btn btn-sm btn-danger" data-original-title="Hapus Data" href="delSRC.php?hal=hapus&id=<?php echo $dt['id'];?>" >
                                            <i class="fa fa-times"></i>
                                            
                                        </a>
                                    </div>
                                </td>
                                
                                </tr>
                                <?php 
                            }
                            ?>
                    </tbody>
                    
                    </table>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include "layout/footer.php"?>