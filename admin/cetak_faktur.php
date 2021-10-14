<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
	session_start();
	include '../config.php';
	?>

  <style>
      body{
          font-family: sans-serif;
      }

      .table{
          border-collapse: collapse;
      }
      .table th,
      .table td{
          padding: 5px 10px;
          border: 1px solid blue;
      }
  </style>


	<div>
		<?php
		$id_faktur = $_GET['id'];
		$faktur = mysqli_query($config,"select * from faktur where faktur_id='$id_faktur' order by faktur_id desc");
		while($content = mysqli_fetch_array($faktur)){
			?>


        <div>

            <center>
                <h3>Mars Computer</h3>
            </center>

            <h4>No Nota :<?php echo $content['faktur_id'] ?></h4>
            <h4>Tanggal :<?php echo $content['faktur_tanggal'] ?></h4>

            <h5>STATUS :
            <?php
                if($content['faktur_status'] == 0){
                    echo "<span class='btn btn-warning'>Belum Melakukan Pembayaran</span>";
                }elseif($content['faktur_status'] == 1){
                    echo "<span class='btn btn-default'>Menunggu Konfirmasi Pembayaran</span>";
                }elseif($content['faktur_status'] == 2){
                    echo "<span class='btn btn-primary'>Dikonfirmasi & Pengemasan Produk</span>";
                }elseif($content['faktur_status'] == 3){
                    echo "<span class='btn btn-warning'>Sedang Dikirim</span>";
                }elseif($content['faktur_status'] == 4){
                    echo "<span class='btn btn-success'>Sudah Diterima</span>";
                }
            ?></h5>
            <br/>
            Nama Penerima       :<?php echo $content['faktur_nama']; ?><br/>
            Alamat Penerima     :<?php echo $content['faktur_alamat']; ?><br/>
            Kabupaten           : <?php echo $content['faktur_kabupaten']; ?><br/>
            Provinsi            :<?php echo $content['faktur_provinsi']; ?><br/>
            No. Hp              : <?php echo $content['faktur_hp']; ?><br/>
            <br/>

            <table class="table">
                <thead>
                    <tr>
                        <th class="text-center" width="1%">NO</th>
                        <th class="text-center">Foto</th>
                        <th class="text-center">Produk</th>
                        <th class="text-center" width="25%">Harga</th>
                        <th class="text-center">Jumlah</th>
                        <th class="text-center" width="25%">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $total = 0;
                    $transaksi = mysqli_query($config,"select * from transaksi,product where trans_produk=product_id and trans_faktur='$id_faktur'");
                    while($dt=mysqli_fetch_array($transaksi)){
                        $total += $dt['trans_harga'];
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++; ?></td>
                            <td>
                                <center>
                                    <?php if($dt['product_foto1'] == ""){ ?>
                                        <img src="../fotoo/produk/product.png" style="width: 50px;height: auto">
                                    <?php }else{ ?>
                                        <img src="../fotoo/produk/<?php echo $dt['product_foto1'] ?>" style="width: 50px;height: auto">
                                    <?php } ?>
                                </center>
                            </td>
                            <td><?php echo $dt['product_nama']; ?></td>
                            <td class="text-center"><?php echo "Rp. ".number_format($dt['trans_harga']).",-"; ?></td>
                            <td class="text-center" width="25%"><?php echo number_format($dt['trans_jumlah']); ?>  Item Produk</td>
                            <td class="text-center"><?php echo "Rp. ".number_format($dt['trans_jumlah'] * $dt['trans_harga'])." ,-"; ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" >Berat</th>
                        <td colspan="4"  class="text-center"><?php echo number_format($content['faktur_kg']); ?> gram</td>
                    </tr>

                    <tr>
                        <th colspan="4" >Ongkir (<?php echo $content['faktur_kurir'] ?>)</th>
                        <td colspan="4"  class="text-center"><?php echo "Rp. ".number_format($content['faktur_ongkir'])." ,-"; ?></td>
                    </tr>

                    <tr>
                        <th colspan="4">Total Harga</th>
                        <td colspan="4"  class="text-center"><?php echo "Rp. ".number_format($total)." ,-"; ?></td>
                    </tr>

                    <tr><th colspan="4" >Total Bayar</th>
                        <td colspan="4" class="text-center"><?php echo "Rp. ".number_format($content['faktur_jumlah_bayar'])." ,-"; ?></td>
                    </tr>
                </tfoot>
            </table>




        </div>


        <?php
    }
    ?>
	</div>


	<script>
		window.print();
	</script>
</body>
</html>
