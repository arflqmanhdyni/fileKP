<?php include "layout/header.php"?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Rekening</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">DataTables Rekening Produk .</li>
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
                    <h3 class="card-title">DataTables Tampil Data Rekening</h3>
                  
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <a href="input_rekening.php" class="btn btn-primary btn-round ml-auto" >
                        <i class="fa fa-plus"></i>
                        Insert Data
				    </a>
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr >
                            <th class="text-center" width="5%">No</th>                            
                            <th width="10%">Nama Bank</th>
                            <th width="10%">Nama Pemilik</th>
                            <th width="10%">No Rekening</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    
                    
                        <tbody>
                        <?php 
                            include '../config.php';
                            $no=1;
                            $data = mysqli_query($config,"SELECT * FROM Bank");
                            while($dt = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td class="text-center" ><?php echo $dt['nama_bank']; ?></td>
                                <td class="text-center"><?php echo $dt['pemilik']; ?></td>
                                <td class="text-center"><?php echo $dt['no_rek']; ?></td>
                                <td class="text-center">
                                    <div class="form-button-action">
                                        <a type="button" data-toggle="tooltip" title="" class="btn btn-sm btn-primary btn-lg" data-original-title="Ubah Data" href="ubah_rekening.php?id=<?php echo $dt['id_bank'] ?>"><i class="fa fa-edit" ></i>
                                        </a>
                                        
                                        <a type="button" data-toggle="tooltip"  onclick="return confirm ('Yakin hapus <?php echo $dt['nama_bank'];?>.?');"  title="Hapus Bank" class="btn btn-sm btn-danger" data-original-title="Hapus Data" href="delRek.php?hal=hapus&id_bank=<?php echo $dt['id_bank'];?>" >
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