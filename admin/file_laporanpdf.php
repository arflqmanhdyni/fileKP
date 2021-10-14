<!DOCTYPE html>
<html>
<head>
  <title>Laporan Transaksi || Mars Computer</title>
</head>

<body>

  <style type="text/css">
    body{
      font-family: Times, Times New Roman, Georgia, serif;
    }

    .table{
      width: 100%;
    }

    th,td{
    }
    .table, .table th, .table td {
      padding: 5px;
      border: 1px solid black;
      border-collapse: collapse;
    }
   
  </style>



  <div class="text-center" style="margin-left: 19px">
    <center>

      <img src="assets/dist/img/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" width="60px" height="60px"
            style="float: left">

    </center>
    <div style="font-size: 19px">Laporan Transaksi</div>
    <div style="font-size: 20px">Toko Mars Computer Purbalingga</div>
    <div style="font-size: 13px">Jl. Raya Mayjen Sungkono, Dusun 2, Blater, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371</div>
  </div>
</br>
  <?php
  include '../config.php';
  if(isset($_GET['akhir_sampe']) && isset($_GET['awal_mulai'])){
    $tgl_mulai = $_GET['awal_mulai'];
    $tgl_sampe = $_GET['akhir_sampe'];
    ?>

    <div class="row">
      <div class="col-lg-6">
        <table class="table table-borderles table-striped">
          <tr>
            <th>Keterangan </th>
            <th> : </th>
            <th >Laporan Penjualan Mars Computer </th>
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

    <br/>

    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <tr class="text-center">
          <th width="1%">No</th>
          <th>Invoice</th>
          <th>Tanggal Pesan</th>
          <th>Customer</th>
          <th>Total Bayar</th>
          <th>Alamat Penerima</th>
          <th>Kurir</th>
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
            <td><?php echo $dt['cust_nama'] ?></td>
            <td><?php echo "Rp. ".number_format ($dt['faktur_jumlah_bayar']).",-" ?></td>
            <td> Penerima : <?php echo $dt['faktur_nama'] ?> <?php echo $dt['faktur_alamat']?> <?php echo $dt['faktur_provinsi']?>  No Resi : <?php echo $dt['no_resi']?></td>
            <td><?php echo $dt['faktur_kurir']?></td>
          </tr>
          <?php
        }
        ?>
      </tbody>
    </table>
    <?php
  }
  ?>
</body>


<?php
use Dompdf\Dompdf;
require_once 'assets/dompdf/autoload.inc.php';
$dompdf = new Dompdf();
$dompdf->load_html(ob_get_clean());
$dompdf->set_paper('a4', 'landscape');
$dompdf->render();
$dompdf->stream("LaporanPenjualan.pdf");
?>
</html>
