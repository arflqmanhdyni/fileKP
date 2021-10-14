    <?php include 'header.php'?>

    <div id="page-content" class="page-content">
            <div class="banner">
                <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/baner4.jpg');">
                    <div class="container">
                        <h1 class="pt-5">
                           Halaman Produk
                        </h1>
                        <p class="lead">
                           Menyediakan berbagai pilihan produk : Laptop, PC, Printer, Aksesoris, Networking, Sparepart.
                        </p>
                            <!-- Another variation with a button -->
                            <form action="" method="get">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control text-center" name="cari" placeholder="CARI PRODUK....">
                                <div class="input-group-append">
                                <button class="btn btn-secondary">
                                    <i class="fa fa-search"></i>
                                </button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


    <br>


    <div class="shell">
    <div class="container text-center">
        <h4 class="title"><u>Galeri Produk</u></h4>
    </div>
    <div class="container">
      <!-- option urutan -->
            <form action="" method="get">
              <div class="col-md-3">
                    <select class="input form-control" name="sequence" onchange="this.form.submit()">
                      <option <?php if(isset($_GET['sequence']) && $_GET['sequence'] == "terbaru"){echo "selected='selected'";} ?> value="terbaru">Urutkan Produk Terbaru</option>
                      <option <?php if(isset($_GET['sequence']) && $_GET['sequence'] == "price"){echo "selected='selected'";} ?> value="price">Urutkan Produk Harga Termurah</option>
                      <option <?php if(isset($_GET['sequence']) && $_GET['sequence'] == "price1"){echo "selected='selected'";} ?> value="price1">Urutkan Produk Harga Termahal</option>
                      <option <?php if(isset($_GET['sequence']) && $_GET['sequence'] == "lama"){echo "selected='selected'";} ?> value="lama">Urutkan Produk Terlama</option>
                    </select>
              </div>
            </form>
            <!-- /option urutan -->
        <div class="row">
        <!-- Start SQL Produk -->
        <?php
						$hal = 9;
						$page = isset($_GET["hal"]) ? (int)$_GET["hal"] : 1;
						$start = ($page>1) ? ($page * $hal) - $hal : 0;
						$result = mysqli_query($config, "SELECT * FROM product");
						$total = mysqli_num_rows($result);
						$pages = ceil($total/$hal);
						if(isset($_GET['sequence']) && $_GET['sequence'] == "price"){
							if(isset($_GET['cari'])){
								$search = $_GET['cari'];
								$data = mysqli_query($config,"select * from product,kategori where kategori_id=product_kategori and product_nama like '%$search%' order by product_harga asc LIMIT $start, $hal");
							}else{
								$data = mysqli_query($config,"select * from product,kategori where kategori_id=product_kategori order by product_harga asc LIMIT $start, $hal");
							}
						}elseif(isset($_GET['sequence']) && $_GET['sequence'] == "price1"){
							if(isset($_GET['cari'])){
								$search = $_GET['cari'];
								$data = mysqli_query($config,"select * from product,kategori where kategori_id=product_kategori and product_nama like '%$search%' order by product_harga desc LIMIT $start, $hal");
							}else{
								$data = mysqli_query($config,"select * from product,kategori where kategori_id=product_kategori order by product_harga desc LIMIT $start, $hal");
							}
						}elseif(isset($_GET['sequence']) && $_GET['sequence'] == "lama"){
							if(isset($_GET['cari'])){
								$search = $_GET['cari'];
								$data = mysqli_query($config,"select * from product,kategori where kategori_id=product_kategori and product_nama like '%$search%' order by tanggal asc LIMIT $start, $hal");
							}else{
								$data = mysqli_query($config,"select * from product,kategori where kategori_id=product_kategori order by tanggal asc LIMIT $start, $hal");
							}
                        }elseif(isset($_GET['sequence']) && $_GET['sequence'] == "terbaru"){
							if(isset($_GET['cari'])){
								$search = $_GET['cari'];
								$data = mysqli_query($config,"select * from product,kategori where kategori_id=product_kategori and product_nama like '%$search%' order by tanggal desc LIMIT $start, $hal");
							}else{
								$data = mysqli_query($config,"select * from product,kategori where kategori_id=product_kategori order by tanggal desc LIMIT $start, $hal");
							}
						}else{

							if(isset($_GET['cari'])){
								$search = $_GET['cari'];
								$data = mysqli_query($config,"select * from product,kategori where kategori_id=product_kategori and product_nama like '%$search%' order by product_id desc LIMIT $start, $hal");
							}else{
								$data = mysqli_query($config,"select * from product,kategori where kategori_id=product_kategori order by product_id desc LIMIT $start, $hal");
							}

						}
						$no =$start+1;

						while($dt = mysqli_fetch_array($data)){
		?>
        <!-- End SQL Produk -->


       <!-- start card product -->
        <div class="col-md-4 ">
            <div class="wsk-cp-product">
            <div class="wsk-cp-img">
            <?php if($dt['product_foto1'] == ""){ ?>
                <img src="fotoo/produk/produk.png" alt="Product" style="height: 420px" class="img-responsive" />
            <?php }else{ ?>
                <img src="fotoo/produk/<?php echo $dt['product_foto1'] ?>" alt="Product" style="height: 420px" class="img-responsive" />
            <?php } ?>

            </div>
            <div class="wsk-cp-text">
                <div class="category">
                <span><a href="#"><?php echo $dt['kategori_nama'] ?></a></span>
                </div>
                <div class="title-product">
                    <h6><a href="detail_produk.php?id=<?php echo $dt['product_id']?>"><?php echo $dt['product_nama'] ?></a></h6>
                </div>
                <div class="description-prod">
                    <p><strong>Status Produk:</strong>
								<?php
								if($dt['product_jumlah'] == 0){
									echo "Stok Habis";
								}else{
									echo "Produk Tersedia";
								}
								?> </p>
                </div>
                <div class="card-footer">
                <div class="wcf-left"><span class="price"><?php echo "Rp. ".number_format($dt['product_harga']).",-"; ?></span></div>
                <script>
							function habisFunction() {
								return alert ('Stok Habis, Tidak Bisa Menambahkan Produk Kedalam Keranjang');
							}
						</script>
                <?php
                $id = $dt['product_id'];
                if($dt['product_jumlah'] == 0){
                    echo "<div class='wcf-right'> <a href='#' class='buy-btn' onclick='return habisFunction()'><i class='fa fa-shopping-basket'></i></a> </div>";
                }else{
                    echo "<div class='wcf-right'> <a href='input_cart.php?id=$id&redirect=cart' class='buy-btn'><i class='fa fa-shopping-basket'></i></a> </div>";
                                
                 }
                ?> 
                </div>
            </div>
            </div>
        </div>
        <?php }
        ?>
        <!-- end card product -->


        </div>
          <!-- start pagination -->
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="shop.php">Back</a></li>

                <?php for ($i=1; $i<=$pages ; $i++){ ?>
                <?php if($page==$i){ ?>
                    <li class="page-item"><a class="page-link"><?php echo $i; ?></a></li>
                <?php }else{ ?>

                    <?php
                    if(isset($_GET['cari'])){
                        $search = $_GET['cari'];
                        $dt = "&cari=".$search;
                    }
                    if(isset($_GET['sequence']) && $_GET['sequence'] == "terbaru"){
                        ?>
                <li class="page-item"><a class="page-link"  href="?hal=<?php echo $i; ?>&sequence=terbaru<?php echo $dt ?>"><?php echo $i;?></a></li>
            <?php
            }else{
                ?>
                <li class="page-item"><a class="page-link" href="?hal=<?php echo $i; ?>&sequence=terlama<?php echo $dt ?>"><?php echo $i; ?></a></li>
            <?php
                }
            ?>

            <?php } ?>
    <?php } ?>
        </ul>
    </nav>
    <!-- end pagination -->
</div>

</div>

<?php include 'footer.php'?>
