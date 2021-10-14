<?php include 'header.php';?>

<div id="page-content" class="page-content">
        <div class="banner">
        <div class="jumbotron jumbotron-video text-center bg-dark mb-0 rounded-0">
                <video width="100%" preload="auto" loop autoplay muted>
                    <source src='assets/media/laptop1.mp4' type='video/mp4' />
                    <source src='assets/media/laptop1.webm' type='video/webm' />
                </video>
                <div class="container">
                    <h3 class="pt-1">
                        Register 
                    </h3>
                   
                    <div class="card card-login mb-4">
                        <div class="card-body">
                        <?php
								
								$query = mysqli_query($config, "SELECT max(cust_id) as kodeTerbesar FROM user_customer");
								$data = mysqli_fetch_array($query);
								$kodeCust = $data['kodeTerbesar'];
								$urutan = (int) substr($kodeCust, 3, 3);
								$urutan++;
								$huruf = "20";
								$kodeCust = $huruf . sprintf("%02s", $urutan); ?>
                            <form class="form-horizontal" action="aksi_daftar.php" method="post" enctype="multipart/form-data" >
                            <div class="form-group row mt-2">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="id"  minlength="3" required="required" value="<?php echo $kodeCust ?>"  placeholder="Id Customer" readonly="readonly"/>
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="nama"  minlength="3" required="required" placeholder="Nama Lengkap">
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <div class="col-md-12">
                                        <input class="form-control" type="email"  name="username" minlength="3" required="required" placeholder="Isikan Username berdasarkan email">
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="alamat" minlength="3" required="required" placeholder="alamat">
                                    </div>
                                </div>
                                <div class="form-group row mt-2">
                                    <div class="col-md-12">
                                        <input class="form-control" type="phone" name="hp"  minlength="3" required="required" placeholder="No Telephone">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" name="password" minlength="3" required="required" placeholder="Password">
                                    </div>
                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                         <input class="form-control" name="foto" type="file"  required="required">
                                    </div>
                                </div>
                     
                                <div class="form-group row text-center mt-2">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary btn-block text-uppercase">Daftar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include 'footer.php';?>