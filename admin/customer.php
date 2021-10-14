    <?php include "layout/header.php"?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users Customer</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">DataTables User .</li>
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
                    <h3 class="card-title">DataTables User Pelanggan / Customer Mars Computer</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                   <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="1%">No</th>
                            <th width="5%"> ID </th>
                            <th> Nama</th>
                            <th> Email</th>
                            <th> Alamat</th>
                            <th> No HP</th>
                            <th> Foto</th>                          
                        </tr>
                    </thead>
                    
                        <tbody>
                        <?php 
                            include '../config.php';
                            $no=1;
                            $data = mysqli_query($config,"SELECT * FROM user_customer" );
                            while($dt = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $dt['cust_id']; ?></td>
                                <td><?php echo $dt['cust_nama']; ?></td>
                                <td><?php echo $dt['cust_email']; ?></td>
                                <td><?php echo $dt['cust_alamat']; ?></td>
                                <td><?php echo $dt['cust_hp']; ?></td>
                                <td><center>
                                    <?php if($dt['cust_foto'] == ""){ ?>
                                        <img src="../fotoo/user/" style="width: 100px;height: 100px">
                                    <?php }else{ ?>
                                        <img src="../fotoo/user/<?php echo $dt['cust_foto'] ?>" style="width: 100px;height: 100px">
                                    <?php } ?>
                                </center>
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