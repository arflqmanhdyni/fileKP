<?php include 'header.php'?>

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/baner3.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Profile
                    </h1>
                    <p class="lead">
                       Edit Akun
                    </p>
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xs-12 col-sm-6">
                    <?php
							if(isset($_GET['alert'])){
								if($_GET['alert'] == "berhasil"){
									echo "<div class='alert alert-success'>Password anda berhasil di perbaharui</div>";
								}
							}
							?>

                        <h5 class="mb-3">Profile Customer</h5>
                        <!-- Bill Detail of the Page -->
                        <form action="updet_cust.php" method="post" enctype="multipart/form-data" class="bill-detail">
                            <fieldset>
                            <?php
                                $id = $_GET['id'];
            										$data = mysqli_query($config,"select * from user_customer where cust_id='$id'");
            										while($dt = mysqli_fetch_array($data)){
							?>

                                <div class="form-group">
                                     <input class="form-control" name="id" value="<?php echo $dt['cust_id'] ?>"  placeholder="ID Customer" readonly type="text">
                                </div>

                                <div class="form-group">
                                    <input class="form-control" name="nama" value="<?php echo $dt['cust_nama'] ?>" placeholder="Nama Lengkap"  type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="username" value="<?php echo $dt['cust_email'] ?>" placeholder="Username"  type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="password" placeholder="Ubah Password Akun" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="alamat" value="<?php echo $dt['cust_alamat'] ?>" placeholder="Alamat"  type="text"></input>
                                </div>
                                <div class="form-group">
                                    <input class="form-control"  name="hp" value="<?php echo $dt['cust_hp'] ?>" placeholder="Nomor WhatsApp / Telepon" readonly type="phone">
                                </div>
                              
                                <br>
                                <div class="form-group">
                                <span class="text-muted"> <img src="fotoo/user/<?php echo $dt['cust_foto'] ?>" style="max-width:140px" alt="..." class="avatar-img rounded-square"> Upload Ukuran foto minimal 700px*</span>
                                </div>

                                <div class="form-group">
                                <input type="file" class="form-control" name="foto"></input>
                                </div>


                                <div class="form-group text-right">

										<input type="submit"  class="btn btn-primary" value="Simpan"></input>

                                <div class="clearfix">
                                </div>
                            </fieldset>
                            <?php

                            }?>
                        </form>
                        <!-- Bill Detail of the Page end -->
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include 'footer.php'?>
