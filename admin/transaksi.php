<?php include "layout/header.php"?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Daftar Transaksi Penjualan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">DataTables Transaksi .</li>
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
                    <h3 class="card-title">DataTables Tampil Data Transaksi Customer</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr >
                            <th class="text-center">No</th>
                            <th  class="text-center">Invoice</th>
                            <th  class="text-center">Tanggal</th>
                            <th class="text-center" width="15%">Total <br> Bayar</th>
                            <th  class="text-center">Customer</th>
                            <th class="text-center" width="20%">Status <br>Notifikasi</th>
                            <th  class="text-center" width="10%">Action</th>
                        </tr>
                    </thead>

                        <tbody>
                        <?php
                            include '../config.php';
                            $no=1;
                            $data = mysqli_query($config,"SELECT * FROM faktur INNER JOIN user_customer where cust_id=faktur_cust order by faktur_id desc");
                            while($dt = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                <td><?php echo $no++; ?></td>
                                <td> <?php echo $dt['faktur_id'] ?></td>
                                <td><?php echo date('d-m-Y', strtotime($dt['faktur_tanggal'])); ?></td>
                                <td><?php echo "Rp. ".number_format($dt['faktur_jumlah_bayar'])." ,-" ?></td>
                                <td>Akun : <?php echo $dt['cust_nama']; ?>. </br><strong> Penerima : <?php echo $dt['faktur_nama']; ?> <?php echo $dt['faktur_alamat']; ?> <?php echo $dt['faktur_kabupaten']; ?><?php echo $dt['faktur_provinsi']; ?></strong></td>
                                <td>

                                <form action="status_transaksi.php" method="post">
                                <input type="hidden" value="<?php echo $dt['faktur_id'] ?>" name="faktur">
                                <?php
                                    if($dt['faktur_status'] == 5){
                                        echo "<select name='status_fk' id='' class='form-control' onchange='form.submit()' disabled value='5'><option>Sudah Diterima</option></select>";
                                    }else{
                                        echo "<select name='status_fk' id='' class='form-control' onchange='form.submit()'>";
                                    ?>
                                    <option <?php if($dt['faktur_status'] == "0"){echo "selected='selected'";} ?> value="0">Belum Melakukan Pembayaran</option>
                                    <option <?php if($dt['faktur_status'] == "1"){echo "selected='selected'";} ?> value="1">Menunggu Konfirmasi Admin</option>
                                    <option <?php if($dt['faktur_status'] == "2"){echo "selected='selected'";} ?> value="2">Dikonfirmasi & Pengemasan Produk</option>
                                    <option <?php if($dt['faktur_status'] == "3"){echo "selected='selected'";} ?> value="3">Sedang Dikirim</option>
                                    <option <?php if($dt['faktur_status'] == "4"){echo "selected='selected'";} ?> value="4" >Terkirim</option>
                                    <option <?php if($dt['faktur_status'] == "5"){echo "selected='selected'";} ?> value="5" >Sudah Diterima</option>

                                </select>
                                <?php } ?>
                                </form>

                                </td>

                                <td>
                                    <div class="form-button-action">
                                        <a type="button" data-toggle="tooltip" title="Cetak Data" class="btn btn-sm btn-primary btn-lg"  href="cetak_faktur.php?id=<?php echo $dt['faktur_id'] ?>"><i class="fa fa-print" ></i>
                                        </a>

                                        <a type="button" class="btn btn-sm btn-warning btn-lg" data-toggle="modal" data-target="#TandaBukti_<?php echo $dt['faktur_id']; ?>">
                                        <i class="fa fa-image"></i> </a>
                                        <div class="modal fade" id="TandaBukti_<?php echo $dt['faktur_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel"></h4>
                                    </div>
                                <div class="modal-body">
                                <center>
                                    <?php
                                    if($dt['faktur_bukti'] == ""){
                                        echo "Customer belum melakukan transaksi pembayaran / belum melakukan upload tanda bukti pembayaran.";
                                    }else{
                                        ?>
                                        <img src="../fotoo/bukti_bayar/<?php echo $dt['faktur_bukti']; ?>" alt="" style="width: 100%">
                                        <?php
                                    }
                                    ?>
                                </center>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Back</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                                </div>
                                </td>

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
<td><?php 
  $jumlah_barang= 0;
  $data_produk=mysqli_query($config,"SELECT * FROM faktur WHERE faktur_jumlah_bayar");
  while ($data = mysqli_fetch_array($data_produk)){

  // looping atribut jumlah dan harga
  
  $jumlah[] = $data['faktur_jumlah_bayar'];
  $jumlah_barang = array_sum($jumlah);

}
 
  
  //total
  if($data['faktur_jumlah_bayar'] >= 0 ){
   # code...            
   
    //Tampilkan
    echo "Total <br> Rp. ".number_format($jumlah_barang).",-";
    //  echo "Total : $jumlah_barang Produk Terjual<br>";
               
  }?></td>
<td></td>
<td></td>
<td></td>



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
