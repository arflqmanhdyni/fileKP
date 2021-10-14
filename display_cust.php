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
									echo "<div class='alert alert-success'>Password atau Foto Profil anda berhasil di perbaharui</div>";
								}
							}
							?>

                        <h5 class="mb-3">Profile Customer</h5>
                        <!-- Bill Detail of the Page -->
                        <table class="display table table-striped table-hover">
                            <tbody>
                            <?php 
                                       $id = $_SESSION['cust_id'];
                                       $kustomer = mysqli_query($config,"select * from user_customer where cust_id='$id'");
                                       while($dt = mysqli_fetch_array($kustomer)){
							?>	
                                         <tr>
											<th width="20%">Nama</th>	
											<td><?php echo $dt['cust_nama'] ?></td>
										</tr>
										<tr>
											<th width="20%">Email</th>	
											<td><?php echo $dt['cust_email'] ?></td>
										</tr>
										<tr>
											<th>HP</th>	
											<td><?php echo $dt['cust_hp'] ?></td>
										</tr>
										<tr>
											<th>Alamat</th>	
											<td><?php echo $dt['cust_alamat'] ?></td>
										</tr>
                                        <tr>
											<th>Password</th>	
											<td><?php echo $dt['cust_password'] ?></td>
										</tr>
                                        <tr>
											<th>Foto Profile</th>	
											<td><img src="fotoo/user/<?php echo $dt['cust_foto'] ?>" style="max-width:140px" alt="..." class="avatar-img rounded-square"></td>
										</tr>
										<?php 
									}
									?>
								</tbody>
							</table>
                        <!-- Bill Detail of the Page end -->
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include 'footer.php'?>