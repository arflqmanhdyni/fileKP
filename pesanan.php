    <?php include "header.php"?>

    <div id="page-content" class="page-content">
            <div class="banner">
                <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/baner4.jpg');">
                    <div class="container">
                        <h1 class="pt-5">
                            Data Pesanan
                        </h1>
                        <p class="lead">
                            Riwayat Pesanan Anda.
                        </p>
                    </div>
                </div>
            </div>

  <section id="cart">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead>
                              <tr>
                                  <th width="5%" class="text-center">No</th>
                                  <th width="15%" class="text-center">Invoice</th>
                                  <th width="10%" class="text-center">Tanggal Pesan</th>
                                  <th width="10%" class="text-center">Tanggal Diterima</th>
                                  <th width="20%" class="text-center" >Alamat Penerima</th>
                                  <th width="12%" class="text-center">Total</th>
                                  <th width="15%" class="text-center">Status</th>
                                  <th width="15%" class="text-center">Opsi Status Penerimaan</th>
                                  <th class="text-center">Action</th>
                                  <th class="text-center"> Service Center</th>

                              </tr>
                          </thead>
                          <tbody>

                          <?php
                    	      $no=1;
                            $id = $_SESSION['cust_id'];
                            $faktur = mysqli_query($config,"select * from faktur where faktur_cust='$id' order by faktur_id desc");
                            while($f = mysqli_fetch_array($faktur)){
                          ?>

                              <tr class="text-center">
                                  <td><?php echo $no++; ?></td>
                                  <td>
                                     <?php echo $f['faktur_id'] ?>
                                  </td>
                                  <td>
                                      <?php echo $f['faktur_tanggal'] ?>
                                  </td>
                                  <td>
                                      <?php  
                                      if($f['faktur_status'] == 5){
                                        echo $f['tgl_terima'];
                                      }else{
                                        echo "Belum Diterima";}
                                    ?>
                                        
                                  </td>
                                  <td>
                                      <strong>Penerima : <?php echo $f['faktur_nama'] ?></strong> <?php echo $f['faktur_alamat'] ?> <?php echo $f['faktur_kabupaten'] ?> <?php echo $f['faktur_provinsi'] ?> <strong>No Resi : <?php echo $f['no_resi'] ?></strong>
                                  </td>
                                  <td>
                                  <?php echo "Rp. ".number_format($f['faktur_jumlah_bayar'])." ,-" ?>
                                  </td>
                                  <td class="text-center">
                                  <?php
                                              if($f['faktur_status'] == 0){
                                                  echo "<span class='btn btn-warning'>Belum </br> Melakukan Pembayaran</span>";
                                              }elseif($f['faktur_status'] == 1){
                                                  echo "<span class='btn btn-info'>Menunggu <br>Konfirmasi Admin</span>";
                                              }elseif($f['faktur_status'] == 2){
                                                  echo "<span class='btn btn-default'>Dikonfirmasi & </br> Pengemasan Produk</span>";
                                              }elseif($f['faktur_status'] == 3){
                                                  echo "<span class='btn btn-danger'>Sedang Dikirim</span>";
                                              }elseif($f['faktur_status'] == 4){
                                                  echo "<span class='btn btn-primary'>Terkirim</span>";
                                              }elseif($f['faktur_status'] == 5){
                                                echo "<span class='btn btn-success'>Sudah Diterima</span>";
                                              }
                                              ?>
                                              

                        
                                  </td>
                                  <td>
                                  <form action="admin/status_transaksi_cust.php" method="post">
                                <input type="hidden" value="<?php echo $f['faktur_id'] ?>" name="faktur">
                                <?php
                                    if($f['faktur_status'] == 5){
                                        echo "<select name='status_fk' id='' class='form-control' onchange='form.submit()' disabled value='5'><option>Sudah Diterima</option></select>";
                                    }elseif($f['faktur_status'] == 0){
                                        echo "<select name='status_fk' id='' class='form-control' onchange='form.submit()' disabled value='0'><option>Belum Diterima</option>";
                                    }elseif($f['faktur_status'] == 1){
                                        echo "<select name='status_fk' id='' class='form-control' onchange='form.submit()' disabled value='1'><option>Belum Diterima</option>";
                                    }elseif($f['faktur_status'] == 2){
                                        echo "<select name='status_fk' id='' class='form-control' onchange='form.submit()' disabled value='2'><option>Belum Diterima</option>";
                                    }elseif($f['faktur_status'] == 3){
                                        echo "<select name='status_fk' id='' class='form-control' onchange='form.submit()' disabled value='3'><option>Belum Diterima</option>";
                                    }elseif($f['faktur_status'] == 4){
                                        echo "<select name='status_fk' id='' class='form-control' onchange='form.submit()' value='4'>";
                                    ?>
                                    ?>
                                    
                                   <option>Belum Diterima</option>
                                    <option <?php if($f['faktur_status'] == "5"){echo "selected='selected'";} ?> value="5" >Sudah Diterima</option>
                                    
                                </select>
                                <?php } ?>
                                </form>
                                  </td>
                                  <td>

                                    <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-succses btn-lg" data-original-title="Konfirmasi Pembayaran"  href="upload_bayar.php?id=<?php echo $f['faktur_id']; ?>"><i class="fa fa-check" ></i></a>

                                    <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-succses btn-lg" data-original-title="Cetak Nota"  href="cetak_invoice.php?id=<?php echo $f['faktur_id']; ?>"><i class="fa fa-print" ></i></a>

                                    <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-succses btn-lg" data-original-title="Lihat Bukti Bayar"  href="lihat_bayar.php?id=<?php echo $f['faktur_id']; ?>"><i class="fa fa-eye" ></i></a>
                                  </td>
                                  
                                  <td>
                                  <a type="button" data-toggle="tooltip" title="" class="btn btn-link btn-succses btn-lg" data-original-title="Data Tabel Service Center"  href="garansi.php?id"><i class="fa fa-barcode" ></i></a>
                            
                                </td>
                              </tr>
                              <?php
                                  }
                              ?>
                          </tbody>
                      </table>
                      
                  </div>


              </div>
          </div>
      </div>
  </section>


        </div>

    <?php include "footer.php"?>
