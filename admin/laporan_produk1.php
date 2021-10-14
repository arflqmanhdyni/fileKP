<?php include "layout/header.php"?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Tabel Barang Keluar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">DataTables Inventory .</li>
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
                    <h3 class="card-title">DataTables Tampil Data Tabel Barang Keluar</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal</th>     
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Jumlah Barang <br> Keluar </th>
                        </tr>
                    </thead>

                        <tbody>
                        <?php
                            include '../config.php';
                            $no=1;
                            $data = mysqli_query($config,"SELECT * FROM product INNER JOIN transaksi ON product_id=transaksi.trans_produk INNER JOIN faktur WHERE faktur_id=transaksi.trans_faktur order by trans_id desc");
                            while($dt = mysqli_fetch_array($data)){
                                ?>
                                <tr class="text-center">
                                <td><?php echo $no++; ?></td>
                                <td><?php echo date('d-m-Y', strtotime($dt['faktur_tanggal'])); ?></td>                                                               <td><?php echo $dt['product_nama']; ?></td>
                                <td><?php echo $dt['trans_jumlah']; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                    </tbody>
                    <tfoot>

                      <tr class="text-center">
                      <td></td>
                      <td></td>
                      <td></td>
               
                     
                      <td >
                      <?php $data_produk=mysqli_query($config,"SELECT * FROM transaksi WHERE trans_jumlah");
                      while ($data    =mysqli_fetch_array($data_produk)){
                      // looping atribut jumlah dan harga
                      $jumlah1[]    =$data['trans_jumlah'];

                      }
                      //total
                      $jumlah_barang1    =array_sum($jumlah1);


                      //Tampilkan
                      echo "<br>Total : $jumlah_barang1";

                      ?></td>
                    
                    </tr>
                    </tfoot>
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
