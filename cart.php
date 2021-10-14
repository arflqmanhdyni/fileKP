<?php include "header.php"?>

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/baner4.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                         Keranjang
                    </h1>
                    <p class="lead">
                        Daftar Belanja Anda.
                    </p>
                </div>
            </div>
        </div>

        <section id="cart">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <form method="post" action="update_cart.php">
                    <?php 
						if(isset($_GET['alert'])){
							if($_GET['alert'] == "Belum ada pesanan di Keranjang"){
								echo "<div class='alert alert-danger text-center'> Belum ada daftar produk di keranjang sehingga tidak bisa melakukan chekout product. <br/> Silahkan belanja dahulu.</div>";
							}
						}
						?>
                        <?php 
						if(isset($_SESSION['cart'])){

							$jumlah_isi_cart = count($_SESSION['cart']);

							if($jumlah_isi_cart != 0){

								?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%"></th>
                                        <th>Daftar Produk</th>
                                        <th>Stok Produk</th>
                                        <th width="15%">Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total Harga</th>
                                        <th>Menu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
									// memeriksa product jika sudah ada di dalam keranjang
										$jumlah_total = 0;
										$total = 0;
										for($a = 0; $a < $jumlah_isi_cart; $a++){
											$id_product = $_SESSION['cart'][$a]['product'];
											$jl = $_SESSION['cart'][$a]['jumlah'];

											$contents = mysqli_query($config,"select * from product where product_id='$id_product'");
											$i = mysqli_fetch_assoc($contents);

											$total += $i['product_harga']*$jl;
											$jumlah_total += $total;
											?>
                                    <tr>
                                        <td>
                                            <?php if($i['product_foto1'] == ""){ ?>
                                                <img src="fotoo/produk/produk1.png">
                                            <?php }else{ ?>
                                                <img src="fotoo/produk/<?php echo $i['product_foto1'] ?>" width="60">
                                            <?php } ?>
                                            
                                        </td>
                                        <td>
                                            <a href="detail_produk.php?id=<?php echo $i['product_id'] ?>"><?php echo $i['product_nama'] ?></a><br>
                                                (<?php echo $_SESSION['cart'][$a]['jumlah']; ?> Item)
                                       </td>
                                        <td class="text-center">
                                            <?php echo $i['product_jumlah'] ?><br>
                                        </td>
                                        <td>    
                                               
                                               <input class="harga" type="hidden" id="harga_<?php echo $i['product_id'] ?>" value="<?php echo $i['product_harga']; ?>">
                                               <input name="product[]" value="<?php echo $i['product_id'] ?>" type="hidden">
                                               <input class="vertical-spin" name="jumlah[]" id="jumlah_<?php echo $i['product_id'] ?>" nomor="<?php echo $i['product_id'] ?>" type="number" min="1" max="<?php echo $i['product_jumlah']?>" data-bts-button-down-class="btn btn-primary" data-bts-button-up-class="btn btn-primary" value="<?php echo $_SESSION['cart'][$a]['jumlah']; ?>" min="1">        
                                               
                                      </td>
                                        <td>
                                            <strong><?php echo "Rp. ".number_format($i['product_harga']) . " ,-"; ?></strong>
                                        </td>
                                       
                                        <td>
                                             <strong class="primary-color total_harga" id="total_<?php echo $i['product_id'] ?>"><?php echo "Rp. ".number_format($total) . " ,-"; ?></strong>
                                        </td>
                                        <td>
                                            <a href="cart_del.php?id=<?php echo $i['product_id']; ?>&redirect=cart" class="text-danger"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    <?php
										$total = 0;

									}

									?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                  
                    <div class="col text-right">
                     
                        <div class="clearfix"></div>
                        <input type="submit" class="btn btn-lg btn-primary" value="Submit">
                            <a href="cekout.php" class="btn btn-lg btn-primary">Checkout <i class="fa fa-check"></i></a>
                        
                   
                    </div>
                    <?php
						}else{

							echo "<br><br><br><h5><center>anda belum menambahkan produk kedalam keranjang  <a href='shop.php'>(Belanja Dulu!...)</a></center></h5><br><br><br>";
						}


					}else{
						echo "<br><br><br><h5><center>anda belum menambahkan produk kedalam keranjang  <a href='shop.php'>(Belanja Dulu!...)</a></center></h5><br><br><br>";
					}
					?>
                </form>
            </div>
        </section>
    </div>

<?php include "footer.php"?>