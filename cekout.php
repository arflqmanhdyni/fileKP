    <?php include "header.php"; ?>
    <div id="page-content" class="page-content">
            <div class="banner">
                <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/baner4.jpg');">
                    <div class="container">
                        <h1 class="pt-5">
                            Halaman Chekout
                        </h1>
                        <p class="lead">
                            Informasi Terkait Pemesanan dan Pembelian Produk.
                        </p>
                    </div>
                </div>
            </div>

            <section id="checkout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-7">
                          <?php
                       $karakter = 'MARS123456789131324143515';
                       $shuffle  = substr(str_shuffle($karakter), 5, 15);?>
                        
                <?php              
                    $query = mysqli_query($config, "SELECT max(faktur_id) as kodeTerbesar FROM faktur");
                    $data = mysqli_fetch_array($query);
                    $kodeTRS = $data['kodeTerbesar'];
                    $urutan = (int) substr($kodeTRS, 4, 4);
                    $urutan++;
                    $huruf = "95";
                    $kodeTRS = $huruf . sprintf("%05s", $urutan); ?>
                            <h5 class="mb-3">Form Pengisian Data Pengiriman</h5>
                            <!-- Bill Detail of the Page -->
                            <form method="post" action="akses_cekout.php" class="bill-detail">
                                <fieldset>
                                <div class="form-group">
                                    <label><strong class="title">No Nota :</strong></label>
                                    <input name="id" type="text" class="form-control input-square" value="<?php echo $kodeTRS ?>" readonly autocomplete="off"/>
                                </div>
                                    <div class="form-group">
                                    <label><strong class="title">Nama Lengkap Pemesan :</strong></label>
                                           <input class="form-control" name="nama" required="required" placeholder="Nama Lengkap Pemesan" type="text">
                                    </div>
                                    <div class="form-group">
                                    <label><strong class="title">Alamat Lengkap :</strong></label>
                                        <textarea class="form-control" name="alamat" required="required" placeholder="Alamat Penerima"></textarea>
                                    </div>
                                    <div class="form-group">
                                    <label><strong class="title">No HP :</strong></label>
                                        <input class="form-control" name="hp" required="required" placeholder="Nomor WhatsApp/Telepon" type="number">
                                    </div>
                                    <?php


                                          $curl = curl_init();

                                          curl_setopt_array($curl, array(
                                              CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
                                              CURLOPT_RETURNTRANSFER => true,
                                              CURLOPT_ENCODING => "",
                                              CURLOPT_MAXREDIRS => 10,
                                              CURLOPT_TIMEOUT => 30,
                                              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                              CURLOPT_CUSTOMREQUEST => "GET",
                                              CURLOPT_HTTPHEADER => array(
                                                "key: 8f22875183c8c65879ef1ed0615d3371"
                                              ),
                                          ));

                                          $response = curl_exec($curl);
                                          $err = curl_error($curl);
                                          $data_provinsi = json_decode($response, true);
                                          ?>
                                  <div class="form-group">
                                  <label><strong class="title">Pilih Provinsi & Kabupaten:</strong></label>
                                  <select name='provinsi' id='provinsi' class="form-control" required="required">
                                      <option>Pilih Provinsi </option>
                                      <?php
                                      for ($i=0; $i < count($data_provinsi['rajaongkir']['results']); $i++) {
                                          echo "<option value='".$data_provinsi['rajaongkir']['results'][$i]['province_id']."'>".$data_provinsi['rajaongkir']['results'][$i]['province']."</option>";
                                      }
                                      ?>
                                  </select>
                                  </div>
                                  <div class="form-group">                             
                                      <select id="kabupaten" name="kabupaten" class="form-control" required="required"></select>
                                      
                                  </div>

                                  <input name="kurir" id="kurir" value="" required="required" type="hidden">
                                  <input name="ongkos_kirim" id="ongkos_kirim" value="" required="required" type="hidden">
                                  <input name="service" id="service" value="" required="required" type="hidden">

                                  <input name="wilayah_provinsi" id="wilayah_provinsi" value="" required="required" type="hidden">
                                  <input name="wilayah_kabupaten" id="wilayah_kabupaten" value="" required="required" type="hidden">

                                  <div id="ongkir"></div>

                              </fieldset>

                          <!-- Bill Detail of the Page end -->
                      </div>
                      <div class="col-xs-12 col-sm-5">
                      <?php
                          if(isset($_SESSION['cart'])){

                              $jumlah_isi_cart = count($_SESSION['cart']);

                              if($jumlah_isi_cart != 0){

                      ?>
                          <div class="holder">
                              <h5 class="mb-3 text-center">Rincian Tagihan</h5>
                              <div class="table-responsive">
                                  <table class="table table-bordered">
                                      <thead>
                                          <tr>
                                              <th>Produk</th>
                                              <th class="text-right">Subtotal</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                      <?php
                                              // memeriksa apakah produk sudah di dalam keranjang
                                                  $jumlah_total = 0;
                                                  $total = 0;
                                                  for($a = 0; $a < $jumlah_isi_cart; $a++){
                                                      $id_product = $_SESSION['cart'][$a]['product'];
                                                      $jml = $_SESSION['cart'][$a]['jumlah'];

                                                      $contents = mysqli_query($config,"select * from product where product_id='$id_product'");
                                                      $i = mysqli_fetch_assoc($contents);

                                                      $total += $i['product_harga']*$jml;
                                                      $jumlah_total += $total;
                                          ?>
                                          <tr>
                                              <td>
                                              <a href="detail_produk.php?id=<?php echo $i['product_id'] ?>"><?php echo $i['product_nama'] ?></a>
                                                   (<?php echo $_SESSION['cart'][$a]['jumlah']; ?> Item)
                                              </td>
                                              <td class="text-right">
                                              <strong id="total_<?php echo $i['product_id'] ?>"><?php echo "Rp. ".number_format($total) . " ,-"; ?></strong>
                                              </td>
                                          </tr>
                                          <?php
                                              $total = 0;

                                           }

                                          ?>


                                      </tbody>
                                      <tfooter>
                                          <tr>
                                              <td>
                                                  <strong>Biaya Pengiriman</strong>
                                              </td>
                                              <td class="text-right">
                                              <strong id="detail_ongkir"><?php echo "Rp. 0 ,-"; ?></strong>
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <strong>Informasi Berat Produk</strong>
                                              </td>
                                              <td class="text-right">
                                                   <?php echo $total_berat; ?> / Item
                                              </td>
                                          </tr>
                                          <tr>
                                              <td>
                                                  <strong>ORDER TOTAL</strong>
                                              </td>
                                              <td class="text-right">
                                                  <strong><span id="detail_total"><?php echo "Rp. ".number_format($jumlah_total) . " ,-"; ?></strong>
                                              </td>

                                          </tr>

                                      </tfooter>
                                  </table>
                                  	<input name="berat" id="berat2" value="<?php echo $total_berat ?>" type="hidden">
									                  <input type="hidden" name="total_bayar" id="total_bayar" value="<?php echo $jumlah_total; ?>">
                                    <strong><input name="noresi" type="hidden"  class="form-control input-square" value="<?php echo $shuffle ?>"  autocomplete="off" placeholder="Auto Number Tidak perlu di isi" readonly="readonly"/></strong>

                                      <?php
                        									}else{

                        										echo "<br><br><br><h5><center>anda belum menambahkan produk kedalam keranjang  <a href='shop.php'>(Shop Now !)</a></center></h5><br><br><br>";
                        									}


                        								}else{
                        									echo "<br><br><br><h5><center>anda belum menambahkan produk kedalam keranjang  <a href='shop.php'>(Shop Now !)</a></center></h5><br><br><br>";
                        								}
                        								?>
                                </div>
                              </br>
                              <?php 
                              if($jumlah_isi_cart == 0){
                                  
                                echo "<br><br><br><h5><center></center></h5><br><br><br>";
                            }else{
                                echo "<input type='submit' class='btn btn-info float-right' value='Buat Pesanan'>";
                               
                            }
                            ?>
                                </form>

                            </div>


                            <div class="clearfix">
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include "footer.php"?>
