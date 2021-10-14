<?php include 'header.php'?>
<div id="page-content" class="page-content">
        <div class="banner">
        <div class="jumbotron jumbotron-video text-center bg-dark mb-0 rounded-0">
                <video width="100%" preload="auto" loop autoplay muted>
                    <source src='assets/media/laptop1.mp4' type='video/mp4' />
                    <source src='assets/media/laptop1.webm' type='video/webm' />
                </video>
                <div class="container">
                    <h3 class="pt-5">
                        Halaman Login
                    </h3>

                   

                    <p class="lead">
                       untuk Kemudahan dalam berbelanja <br>silahkan login dengan akun anda terlebih dahulu.
                    </p>

                    <?php 
					if(isset($_GET['alert'])){
						if($_GET['alert'] == "terdaftar"){
							echo "<div class='alert alert-success text-center'>Akun Anda berhasil didaftarkan, silahkan login.</div>";
						}elseif($_GET['alert'] == "gagal"){
							echo "<div class='alert alert-danger text-center'>Email atau Password tidak sesuai,Silahkan coba lagi.</div>";
						}elseif($_GET['alert'] == "login-dulu"){
							echo "<div class='alert alert-warning text-center'>Silahkan login terlebih dulu untuk membuat pesanan.</div>";
						}
					}
					?>
                    <div class="card card-login mb-5">
                        <div class="card-body">
                            <form class="form-horizontal" action="akses_cust.php" method="post">
                                <div class="form-group row mt-3">
                                    <div class="col-md-12">
                                        <input class="form-control" name="email" type="text" required="" placeholder="Isikakn Username menggunakan Email Anda*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input class="form-control" name="password" type="password" required="" placeholder="Isikan Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                                     
                                        <a href="register.php" class="text-light"><i class="fa fa-info"></i> Belum Mempunyai Akun ?</a>
                                    </div>
                                </div>
                                <div class="form-group row text-center mt-4">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block text-uppercase" value="Login">Log In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'?>