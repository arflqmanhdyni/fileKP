<!DOCTYPE html>
<html>
<head>
  <title>Laporan Stok Keluar || Mars Computer</title>
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
    .text-center {
      text-align: center;
    }
    div {
      text-align: center;
    }
   
  </style>



  <div style="margin-left: 19px">
  

      <img src="assets/dist/img/logo1.png" class="brand-image img-circle elevation-3" width="60px" height="60px"
            style="float: center">

    
    <div style="font-size: 19px">Laporan Stok Keluar</div>
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
   
    <table class="table table-brodered">
    <thead>
      <tr>
      <th>No</th>      
      <th>Tanggal</th>
      <th>Harga Satuan</th>
      <th>Produk</th>
      <th>Stok </br> Out</th>
    </tr>
    </thead>

    <tbody>
    <?php
      include '../config.php';
      $no=1;
      $data = mysqli_query($config,"SELECT * FROM product INNER JOIN transaksi ON product_id=transaksi.trans_produk INNER JOIN faktur WHERE faktur_id=transaksi.trans_faktur and date(faktur_tanggal) >= '$tgl_mulai' AND date(faktur_tanggal) <= '$tgl_sampe' order by trans_id desc");
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
    </br>
    <table>
          <tr>
            <th>Keterangan </th>
            <th> : </th>
            <th >Laporan Stok Out Mars Computer Per Tanggal </th>
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
$dompdf->stream("LaporanStokOut.pdf");
?>
</html>
