<?php include "layout/header.php"?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h4>Laporan Transaksi Customer Mars Computer</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Laporan .</li>
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
                    <strong>Untuk mendownload laporan Lakukan pengisian tanggal berdasarkan kebutuhan.</strong>
                  </div>

                </div>
                <!-- /.card-header -->
      <div class="card-body">
      <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Isian Tanggal</h3>
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
                <h3 class="card-title">Tabel Laporan</h3>
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
                        <th> Laporan Transaksi Customer Mars Computer </th>
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

                <a href="file_laporanpdf.php?awal_mulai=<?php echo $tgl_mulai ?>&akhir_sampe=<?php echo $tgl_sampe ?>" target="_blank" class="btn btn-sm btn-success"><i class="fas fa-file-pdf"></i> &nbsp Downlod Laporan PDF</a>

                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped" width="100%">
                    <thead>
                      <tr class="text-center">
                        <th width="1%">No</th>
                        <th>Invoice</th>
                        <th width="10%">Tanggal</br>Pesan </th>
                        <th>Total Bayar</th>
                        <th>Alamat</th>
                        <th>Nama Penerima</th>
                        <th>Kurir</th>
                        <th>Status <br> Pembayaran</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $data = mysqli_query($config,"SELECT * FROM faktur,user_customer WHERE faktur_cust=cust_id and date(faktur_tanggal) >= '$tgl_mulai' AND date(faktur_tanggal) <= '$tgl_sampe'");
                      while($dt = mysqli_fetch_array($data)){
                        ?>
                        <tr>
                          <td><?php echo $no++ ?></td>
                          <td> MC-<?php echo $dt['faktur_tanggal'] ?>-<?php echo $dt['faktur_id'] ?></td>
                          <td><?php echo date('d-m-Y', strtotime($dt['faktur_tanggal'])); ?></td>
                          <td><?php echo "Rp. ".number_format ($dt['faktur_jumlah_bayar']).",-" ?></td>
                          <td><?php echo $dt['faktur_alamat']?> <?php echo $dt['faktur_provinsi']?> No Resi : <?php echo $dt['no_resi'] ?></td>
                          <td><?php echo $dt['faktur_nama']?> </td>
                          <td><?php echo $dt['faktur_kurir']?> </td>
                          <td>
                                  <?php
                                              if($dt['faktur_status'] == 0){
                                                  echo "<span class='btn btn-info bg-gradient-info'>Belum Bayar</span>";
                                              }elseif($dt['faktur_status'] == 1){
                                                  echo "<span class='btn btn-default bg-gradient-default'>Menunggu Konfirmasi Pembayaran</span>";
                                              }elseif($dt['faktur_status'] == 2){
                                                  echo "<span class='btn btn-primary bg-gradient-primary'>Dikonfirmasi & Pengemasan Produk</span>";
                                              }elseif($dt['faktur_status'] == 3){
                                                  echo "<span class='btn btn-warning bg-gradient-warning'>Sedang Dikirim</span>";
                                              }elseif($dt['faktur_status'] == 4){
                                                  echo "<span class='btn btn-success bg-gradient-success'>Sudah Diterima</span>";
                                              }
                                              ?>
                                  </td>
                                  
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

                <?php
              }else{
                ?>



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
