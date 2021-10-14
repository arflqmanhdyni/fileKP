<?php include "layout/header.php"?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Produk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">DataTables Produk .</li>
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
                    <h3 class="card-title">DataTables Tampil Data Produk-produk</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <a href="input_product.php" class="btn btn-primary bg-gradient-primary btn-round ml-auto" >
                        <i class="fa fa-plus"></i>
                        Insert Data
				</a>
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-left" width="5%">No</th>
                            <th class="text-center" width="20%">Nama</th>
                            <th class="text-center" width="5%">Kategori</th>
                            <th class="text-center" width="15%">Harga</th>
                            <th class="text-center" width="15%">Stok <br> Produk</th>
                            <th class="text-center" >Gambar Produk</th>
                            <th class="text-center" >Action</th>

                        </tr>
                    </thead>

                        <tbody>
                        <?php
                            include '../config.php';
                            $no=1;
                            $data = mysqli_query($config,"SELECT * FROM product,kategori where kategori_id=product_kategori order by product_id desc");
                            while($dt = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td><?php echo $dt['product_nama']; ?></td>
                                <td class="text-center"><?php echo $dt['kategori_nama']; ?></td>
                                <td class="text-center"><?php echo "Rp. ".number_format($dt['product_harga']).",-"; ?></td>
                                <td class="text-center"><?php echo $dt['product_jumlah']; ?></td>

                                <td>
                                <center>
                                    <?php if($dt['product_foto1'] == ""){ ?>
                                        <img src="../fotoo/produk/fotoku.jpg" style="width: 100px;height: 100px">
                                    <?php }else{ ?>
                                        <img src="../fotoo/produk/<?php echo $dt['product_foto1'] ?>" style="width: 100px;height: 100">
                                    <?php } ?>
                                </center>
                                <br>
                                <center>
                                    <?php if($dt['product_foto2'] == ""){ ?>
                                        <img src="../fotoo/produk/fotoku.jpg" style="width: 100px;height: 100px">
                                    <?php }else{ ?>
                                        <img src="../fotoo/produk/<?php echo $dt['product_foto2'] ?>" style="width: 100px;height: 100">
                                    <?php } ?>
                                </center>
                                <br>
                                <center>
                                    <?php if($dt['product_foto3'] == ""){ ?>
                                        <img src="../fotoo/produk/fotoku.jpg" style="width: 100px;height: 100px">
                                    <?php }else{ ?>
                                        <img src="../fotoo/produk/<?php echo $dt['product_foto3'] ?>" style="width: 100px;height: 100">
                                    <?php } ?>
                                </center>
                                </td>

                                <td  class="text-center">
                                    <div class="form-button-action">
                                        <a type="button" data-toggle="tooltip" title="Ubah Data" class="btn btn-sm btn-primary bg-gradient-primary btn-lg" href="ubah_product.php?id=<?php echo $dt['product_id'] ?>"><i class="fa fa-edit" ></i>
                                        </a>

                                        <a type="button" data-toggle="tooltip"  onclick="return confirm ('Yakin hapus <?php echo $dt['product_nama'];?>.?');"  title="Hapus Data Produk" class="btn btn-sm btn-danger bg-gradient-danger" data-original-title="Hapus Data" href="delPro.php?hal=hapus&product_id=<?php echo $dt['product_id'];?>" >
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
