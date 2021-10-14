<!DOCTYPE html>
<html>
<head>
  <title>Laporan Update Stok || Mars Computer</title>
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



  <div  style="margin-left: 19px">
    <center>

      <img src="assets/dist/img/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" width="60px" height="60px"
            style="float: left">

    </center>
    <div style="font-size: 19px">Laporan Update Stok</div>
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
        <table class="table table-bordered">
          <tr>
            <th>Keterangan </th>
            <th> : </th>
            <th >Laporan Stok Update Mars Computer Per Tanggal </th>
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
            <tr>
                <th >No</th>
                <th >Nama Produk</th>
                <th >Tanggal</th>
                <th > Stok Update</th>
            </tr>
        </thead>

            <tbody>
            <?php
                include '../config.php';
                $no=1;
                $data = mysqli_query($config,"SELECT * FROM stok_masukk" );
                while($dt = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $dt['product_nama']; ?></td>
                    <td><?php echo $dt['tanggal']; ?></td>
                    <td><?php echo $dt['stok_masuk']; ?></td>
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
$dompdf->stream("LaporanStokUpdate.pdf");
?>
</html>
