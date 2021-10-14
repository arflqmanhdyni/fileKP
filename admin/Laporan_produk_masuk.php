<?php include "layout/header.php"?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Stok Update</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">DataTables Stok Masuk .</li>
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
                    <h3 class="card-title">DataTables Tampil Data Inventaris Stok Produk Masuk</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <a href="update_stok_form.php" class="btn btn-primary bg-gradient-primary btn-round ml-auto" >
                        <i class="fa fa-plus"></i>
                        Tambah Stok
				</a>
                    <table id="example1" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Tanggal Upload</th>
                            <th class="text-center">Stok</th>                          
                        </tr>
                    </thead>

                        <tbody>
                        <?php
                            include '../config.php';
                            $no=1;
                            $data = mysqli_query($config,"SELECT * FROM stok_masukk, user_admin where user_id='$id' order by id desc");
                            while($dt = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                               
                                <td class="text-center"><?php echo $dt['product_nama']; ?></td>
                                <td class="text-center"><?php echo $dt['tanggal']; ?></td>
                                <td class="text-center"><?php echo $dt['stok_masuk']; ?></td>
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
