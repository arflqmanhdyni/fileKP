<?php include "header.php"?>

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/baner4.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Detail Produk
                    </h1>
                   
                </div>
            </div>
        </div>
        <div class="product-detail">
            <div class="container">
                <div class="row">
                <?php 
                          $produk_id = $_GET['id'];
                          $data = mysqli_query($config,"select * from product,kategori where kategori_id=product_kategori and product_id='$produk_id'");
                          while($dt=mysqli_fetch_array($data)){
                ?>
                    <div class="col-md-6">
                        <div class="slider-zoom">
                            <a href="fotoo/produk/<?php echo $dt['product_foto2']?>"  class="cloud-zoom" rel="transparentImage: 'data:image/gif;base64,R0lGODlhAQABAID/AMDAwAAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==', useWrapper: false, showTitle: false, zoomWidth:'500', zoomHeight:'500', adjustY:0, adjustX:10" id="cloudZoom">
                                <img alt="Detail Zoom thumbs image"src="fotoo/produk/<?php echo $dt['product_foto1']?>" style="width: 100%;">
                            </a>

                        </div>

                      
                        <div class="slider-thumbnail">
                            <ul class="d-flex flex-wrap p-0 list-unstyled">
                                <li>
                                <?php if($dt['product_foto1'] == ""){ ?>
                                    <img itemprop="image" src="assets/img/foto.jpg" style="width:120px;">
                                    <?php }else{ ?>
                                        <a href="fotoo/produk/<?php echo $dt['product_foto1']?>" rel="gallerySwitchOnMouseOver: true, popupWin:'fotoo/produk/<?php echo $dt['product_foto1']?>', useZoom: 'cloudZoom', smallImage: 'fotoo/produk/<?php echo $dt['product_foto1']?>'" class="cloud-zoom-gallery">
                                            <img itemprop="image" src="fotoo/produk/<?php echo $dt['product_foto1']?>" style="width:120px;">
                                         </a>
                                    <?php } ?>
                                </li>

                                <li>
                                <?php if($dt['product_foto2'] == ""){ ?>
                                    <img itemprop="image" src="assets/img/foto.jpg" style="width:120px;">
                                    <?php }else{ ?>
                                        <a href="fotoo/produk/<?php echo $dt['product_foto2']?>" rel="gallerySwitchOnMouseOver: true, popupWin:'fotoo/produk/<?php echo $dt['product_foto2']?>', useZoom: 'cloudZoom', smallImage: 'fotoo/produk/<?php echo $dt['product_foto2']?>'" class="cloud-zoom-gallery">
                                            <img itemprop="image" src="fotoo/produk/<?php echo $dt['product_foto2']?>" style="width:120px;">
                                         </a>
                                    <?php } ?>
                                </li>
                                
                                <li>
                                <?php if($dt['product_foto3'] == ""){ ?>
                                    <img itemprop="image" src="assets/img/foto.jpg" style="width:120px;">
                                    <?php }else{ ?>
                                        <a href="fotoo/produk/<?php echo $dt['product_foto3']?>" rel="gallerySwitchOnMouseOver: true, popupWin:'fotoo/produk/<?php echo $dt['product_foto3']?>', useZoom: 'cloudZoom', smallImage: 'fotoo/produk/<?php echo $dt['product_foto3']?>'" class="cloud-zoom-gallery">
                                            <img itemprop="image" src="fotoo/produk/<?php echo $dt['product_foto3']?>" style="width:120px;">
                                         </a>
                                    <?php } ?>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <p>
                            <h4 class="stock available"><center><?php echo $dt['product_nama']; ?></center></h4>
                         </p>
                        <p>
                            <?php echo $dt['product_ket']; ?>
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                
                                    <strong>Stock : </strong>
                                    <strong class="price"><?php echo $dt['product_jumlah']; ?></strong>
                            </div>
                            <div class="col-md-6">

                                    <strong >Harga :</strong>
                                    <strong class="price"><?php echo "Rp. ".number_format($dt['product_harga']).",-"; ?> <?php if($dt['product_jumlah'] == 0){?> <del class="old-price">Kosong</del><?php } ?></strong>
                              
                            </div>
                           
                        </div>
                        
                        <div class="row">
                     
                            <div class="col-md-6 mt-3 ">
                            
                            <a class="btn btn-secondary" href="input_cart.php?id=<?php echo $dt['product_id']; ?>&redirect=index"><i class="fa fa-shopping-basket"></i> Simpan Keranjang</a> 
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>

          

            <?php } ?>
        </div>
    </br>

    

<?php include "footer.php"?>