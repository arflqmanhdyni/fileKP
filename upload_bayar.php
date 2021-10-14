<?php include 'header.php'?>

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/baner3.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Konfirmasi Pembayaran
                    </h1>
                    <p class="lead">
                       Halaman Upload Bukti Pembyaran guna memproses pengemasan dan pengiriman produk. 
                    </p>
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                    <table class="table table-borderles">
                            
                            <?php 
									$id_faktur = $_GET['id'];
									$faktur = mysqli_query($config,"select * from faktur where faktur_id='$id_faktur' order by faktur_id desc");
									while($f = mysqli_fetch_array($faktur)){
						    ?>
                            
                            <thead>       
                            <tr class="text-center">       
                                <th><h5 class="mb-3">Silahkan Lakukan Pembayaran Tagihan Produk Ke Rekening yang tertera Dibawah ini</h5> </br>  <strong>Total Tagihan : <?php echo "Rp. ".number_format($f['faktur_jumlah_bayar'])." ,-" ?></strong> </th>               
                           </tr>
                           </thead>                                                     
                            <?php 
                                    }
                            ?>
							
							</table>
                            </br>
                            <table class="table table-bordered">
                           
                             <thead>
                             <tr class="text-center">
									<th width="30%">Nomor Rekening</th>
                                    <th >Atas Nama</th>
                                    <th width="30%">Nama Bank</th>	
								</tr>
                                </thead>
                                <tbody>
                            <?php 
								$data = mysqli_query($config,"SELECT * FROM Bank");
                                while($bk = mysqli_fetch_array($data)){
                            ?>
                             <tr class="text-center">
                                    <td> <?php echo $bk['no_rek'] ?></td>
									<td> <?php echo $bk['pemilik'] ?></td>						
									<td> <?php echo $bk['nama_bank'] ?></td>
							</tr>
                           
								
                                <?php }
                                ?>
                               </tr>
                                   </tbody>  
                                   </table>
                                   <table class="table table-bordered">
                                   <thead>
                                    <tr class="text-center">
									    <th><h5>Upload Bukti Pembayaran</h5></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <form action="aksi_upload_bayar.php" method="post" enctype="multipart/form-data">
                                       <td>                                        
                                       
                                            
                                             <div class="form-group">
                                               <input type="hidden" name="id" value="<?php echo $id_faktur; ?>">
                                               <input type="file" name="tanda_bukti" required="required"> </br>                                               
                                               <label>Upload Tanda Bukti Pembayaran Produk</label>
                                               <small class="text-muted">Keterangan* Upload bukti pembayaran dalam format file gambar png, jpg, jpeg. </br> <strong>(Barang yang sudah dibeli tidak dapat ditukar atau dikembalikan)</strong></small>
                                           </div>
                                           <div class="form-group">
                                                 <input type="submit" value="Simpan" class="btn btn-success">
                                            </div>                                        
                                       </form>
                                          
                                       
                                       </td>
                                                                             
                                       
                                   </tr>
                                   </tbody>  
                                   </table>
                        <!-- Bill Detail of the Page end -->
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include 'footer.php'?>