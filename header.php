<!DOCTYPE html>
<html>

<head>
    <title>Mars Computer | Purbalingga</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/logo/logo1.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css">
    <link href="assets/fonts/sb-bistro/sb-bistro.css" rel="stylesheet" type="text/css">
    <link href="assets/fonts/font-awesome/font-awesome.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" media="all" href="assets/packages/bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="all" href="assets/packages/o2system-ui/o2system-ui.css">
    <link rel="stylesheet" type="text/css" media="all" href="assets/packages/owl-carousel/owl-carousel.css">
    <link rel="stylesheet" type="text/css" media="all" href="assets/packages/cloudzoom/cloudzoom.css">
    <link rel="stylesheet" type="text/css" media="all" href="assets/packages/thumbelina/thumbelina.css">
    <link rel="stylesheet" type="text/css" media="all" href="assets/packages/bootstrap-touchspin/bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" media="all" href="assets/css/theme.css">

</head>

<?php
include 'config.php';

session_start();

$file = basename($_SERVER['PHP_SELF']);

if(!isset($_SESSION['cust_status'])){

	// membatasi hak akses ke halaman customer jika customer belum melakukan sesi login
	$proteksi = array('cust.php','logout_cust.php','profil_cust.php','display_cust.php','cekout.php','pesanan.php');

	// mengalihkan customer jika mengakses halaman diatas ke dalam halaman login customer
	if(in_array($file, $proteksi)){
		header("location:login_cust.php");
	}

	if($file == "checkout_prod.php"){
		header("location:akses_cust.php?alert=login-dulu");
	}

}else{

	// membatasi user customer jika sudah melakukan sesi login dan tidak bisa mengakses halaman yang tidak ditentukan
	$proteksi = array('login_cust.php','register.php');

	// jika pada saat sesi benar maka customer akan dialihkan ke halaman cust.php
	if(in_array($file, $proteksi)){
		header("location:cust.php");
	}

}
?>
<body>
<div class="page-header">
        <!-- Mulai Navbar-->
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-transparent" id="page-navigation">
            <div class="container">
                <!-- Navbar Brand -->
                <a href="index.php" class="navbar-brand">
                    <img src="assets/img/logo/logo1.png" width="100" height="100" alt="">
                </a>

                <!-- Toggle Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarcollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarcollapse">
                    <!-- Navbar Menu -->
                    <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <strong class="text-uppercase"><a href="index.php" class="nav-link">Home</a></strong>
                    </li>
                    <li class="nav-item">
                        <strong class="text-uppercase"><a href="shop.php" class="nav-link">Shop</a></strong>
                    </li>


                        <?php
						if(isset($_SESSION['cust_status'])){
							$id_cust = $_SESSION['cust_id'];
							$kustomer = mysqli_query($config,"select * from user_customer where cust_id='$id_cust'");
							$dt = mysqli_fetch_assoc($kustomer);
							?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <strong class="text-uppercase"><?php echo $dt['cust_nama']; ?></strong>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="pesanan.php">Riwayat Pesanan</a>
                                <a class="dropdown-item" href="logout_cust.php">Logout</a>
                                <a class="dropdown-item" href="profil_cust.php?id=<?php echo $dt['cust_id'] ?>">Profil</a>
                            </div>

                            <?php
						}else{
							?>

                            <a href="login_cust.php" class="nav-link"><strong class="text-uppercase">Login</strong></a>

                        </li>
                        <li class="nav-item">
                            <a href="register.php" class="nav-link" ><strong class="text-uppercase">Register</strong></a>
                        </li>
                        <?php
						}
						?>
                        <li class="nav-item dropdown">
                             <!-- Step 1 -->
                                <?php
                                if(isset($_SESSION['cart'])){
                                    $jumlah_isi_cart = count($_SESSION['cart']);
                                }else{
                                    $jumlah_isi_cart = 0;
                                }
                                
							?>
                            <!--end Step 1 Keranjang -->
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-shopping-basket"></i> <span class="badge badge-primary"><?php echo $jumlah_isi_cart; ?></span>
                            </a>
                            <div class="dropdown-menu shopping-cart">

                                <ul>

                                    <li>
                                        <div class="drop-title">Keranjang Saya</div>
                                    </li>

                                    <li>
                                        <div class="shopping-cart-list">

                                        <?php
										$total_berat = 0;
										if(isset($_SESSION['cart'])){

											$jumlah_isi_cart = count($_SESSION['cart']);

											if($jumlah_isi_cart != 0){
												// cek apakah produk sudah ada dalam cart
												for($a = 0; $a < $jumlah_isi_cart; $a++){
													$id_product = $_SESSION['cart'][$a]['product'];
													$contents = mysqli_query($config,"select * from product where product_id='$id_product'");
													$i = mysqli_fetch_assoc($contents);

													$total_berat += $i['product_kg'];
													?>


                                            <div class="media">


                                                <?php if($i['product_foto1'] == ""){ ?>
												    <img class="d-flex mr-3"  src="fotoo/produk/produk.png"  width="60">
											    <?php }else{ ?>
													<img class="d-flex mr-3"  src="fotoo/produk/<?php echo $i['product_foto1'] ?>"  width="60">
												<?php } ?>

                                                <div class="media-body">
                                                    <h5><a href="cart.php?id=<?php echo $i['product_id'] ?>"><?php echo $i['product_nama'] ?></h5>
                                                    <p class="price">
                                                        <span><?php echo "Rp. ".number_format($i['product_harga']) . " ,-"; ?></span>
                                                        <a class="cancel-btn" href="cart_del.php?id=<?php echo $i['product_id']; ?>&redirect=cart"><i class="fa fa-trash"></i></a>
                                                    </p>
                                                    (<?php echo $_SESSION['cart'][$a]['jumlah']; ?> Item)


                                                </div>


                                            </div>
                                            <?php

                                            }
                                            }else{
                                                echo "<center>Belum ada pesanan.</center>";
                                            }


                                            }else{
                                                echo "<center>Belum ada pesanan.</center>";
                                            }
                                            ?>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="drop-title d-flex justify-content-between ">

                                            <span>Total: </span>
                                            <?php
                                                $total = 0;
                                                if(isset($_SESSION['cart'])){
                                                    $jumlah_isi_cart = count($_SESSION['cart']);
                                                    for($a = 0; $a < $jumlah_isi_cart; $a++){
                                                        $id_product = $_SESSION['cart'][$a]['product'];
                                                        $contents = mysqli_query($config,"select * from product where product_id='$id_product'");
                                                        $i = mysqli_fetch_assoc($contents);
                                                        $total += $i['product_harga'];
                                                    }
                                                }
                                            ?>
								                <span class="text-primary"><?php echo "Rp. ".number_format($total)." ,-"; ?></span>

                                        </div>
                                    </li>

                                    <li class="d-flex justify-content-between pl-3 pr-3 pt-3">
                                        <a href="cart.php" class="btn btn-secondary">Keranjang</a>
                                        <a href="cekout.php" class="btn btn-primary">Checkout</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </div>
