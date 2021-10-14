<?php include "layout/header.php"?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Barang Keluar</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data Tabel Barang Keluar .</li>
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
                  <div class="alert alert-warning text-center">
                    <strong>Untuk melihat atau mendownload daftar Tabel Produk Keluar lakukan pengisian tanggal berdasarkan kebutuhan.</strong>
                  </div>

                </div>
                <!-- /.card-header -->
      <div class="card-body">
      <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Isian Form Tanggal</h3>
              </div>
              <div class="card-body">
                  <form method="get" action="">
                <!-- Date -->
                <div class="form-group">
                  <label>Dari Tanggal:</label>
                <input type="text"  name="awal_mulai"  class="form-control datepickerDouble"  value="<?php if(isset($_GET['awal_mulai'])){echo $_GET['awal_mulai'];}else{echo "";} ?>" name="awal_mulai" required/>

                </div>
                <div class="form-group">
                  <label>Sampai Tanggal:</label>
                  <input type="text"  name="akhir_sampe"  class="form-control datepickerDouble"  value="<?php if(isset($_GET['akhir_sampe'])){echo $_GET['akhir_sampe'];}else{echo "";} ?>" name="akhir_sampe" required/>

                </div>
                <div class="form-group">
                    <!-- /.input group -->
                          <input type="submit" value="Lihat Data" class="btn btn-primary btn-round ml-auto">
                      </div>
                  </div>
                  <!-- /.form group -->
                </div>
              </div>
              <!-- /.card-body -->
              </form>
            </div>
            <!-- /.card -->
            </div>
             <!-- /.row -->
            </div>
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Tabel</h3>
              </div>
              <!-- /.card-header -->
            <div class="card-body">
              <?php
              if(isset($_GET['akhir_sampe']) && isset($_GET['awal_mulai'])){
                $tgl_mulai = $_GET['awal_mulai'];
                $tgl_sampe = $_GET['akhir_sampe'];
                ?>

                <div class="row">
                  <div class="col-lg-6">
                    <table class="table table-borderles">
                      <tr>
                        <th>Keterangan </th>
                        <th> : </th>
                        <th> Laporan Produk Terjual / Produk Keluar </th>
                      </tr>
                      <tr>
                        <th width="25%">Dari Tanggal</th>
                        <th width="1%">:</th>
                        <td><?php echo $tgl_mulai; ?></td>
                      </tr>
                      <tr>
                        <th>Sampai Tanggal</th>
                        <th>:</th>
                        <td><?php echo $tgl_sampe; ?></td>
                      </tr>
                    </table>

                  </div>
                </div>

                <a href="file_pdf_terjual.php?awal_mulai=<?php echo $tgl_mulai ?>&akhir_sampe=<?php echo $tgl_sampe ?>" target="_blank" class="btn btn-sm btn-success"><i class="fas fa-file-pdf"></i> &nbsp Downlod Laporan PDF</a>

                <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Harga Satuan Produk</th>
                            <th class="text-center" width="10%">Nama Produk</th>
                            <th class="text-center" width="5%">Jumlah Barang <br> Keluar </th>
                        </tr>
                    </thead>

                        <tbody>
                        <?php
                            include '../config.php';
                            $no=1;
                            $data = mysqli_query($config,"SELECT * FROM product INNER JOIN transaksi ON product_id=transaksi.trans_produk INNER JOIN faktur WHERE faktur_id=transaksi.trans_faktur and date(faktur_tanggal) >= '$tgl_mulai' AND date(faktur_tanggal) <= '$tgl_sampe' order by trans_jumlah desc");
                            while($dt = mysqli_fetch_array($data)){
                                ?>
                                <tr class="text-center">
                                <td><?php echo $no++; ?></td>
                               
                                <td><?php echo date('Y-m-d', strtotime($dt['faktur_tanggal'])); ?></td>
                                <td><?php echo "Rp. ".number_format ($dt['trans_harga']).",-" ?></td>
                                <td><?php echo $dt['product_nama']; ?></td>
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
                      <td></td>
                    
                      <td >
                      <?php 
                        $jumlah_barang1 = 0;
                        $data_produk=mysqli_query($config,"SELECT * FROM transaksi WHERE trans_jumlah and date(trans_tgl) >= '$tgl_mulai' AND date(trans_tgl) <= '$tgl_sampe'");
                        while ($data    =mysqli_fetch_array($data_produk)){

                        // looping atribut jumlah dan harga
                        $jumlah1[]  =$data['trans_jumlah'];
                        $jumlah_barang1    =array_sum($jumlah1);
                        }
                        //total
                        if($data['trans_jumlah'] >= 0){
                          //Tampilkan
                          echo "Total <br>  $jumlah_barang1";
                        }   
                      ?> </td>
                    
                    </tr>
                    </tfoot>
                    </table>
                </div>
                <?php
                }
                ?>
            </div>
          </div>


            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php include "layout/footer.php"?>
