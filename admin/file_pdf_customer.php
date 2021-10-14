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



  <div  style="margin-left: 19px">
    <center>

      <img src="assets/dist/img/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" width="60px" height="60px"
            style="float: left">

    </center>
    <div style="font-size: 19px">Laporan Data Customer</div>
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
            <th >Laporan Data Mars Computer Per Tanggal </th>
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
                <th >ID</th>
                <th >Nama</th>
                <th >Tanggal</th>
                <th >Email</th>
                <th >Alamat</th>
                <th  width="10%">No Hp</th>
             
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
                    <td><?php echo $dt['tgl_daftar']; ?></td>
                    <td><?php echo $dt['cust_email']; ?></td>
                    <td><?php echo $dt['cust_alamat']; ?></td>
                    <td><?php echo $dt['cust_hp']; ?></td>
                  </tr>
                    <?php 
                }
                ?>
        </tbody>        
        
        </table>
    </div>
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
$dompdf->stream("LaporanDataCustomerMarsComputer.pdf");
?>
</html>
