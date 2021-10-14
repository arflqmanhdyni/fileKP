<?php include 'header.php'?>

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/baner3.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Garansi Produk
                    </h1>
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                    <table class="table table-bordered">                          
                              
                        <h5 class="mb-3 text-center">Daftar Alamat Service Center</h5>               
                                                                         
                           <thead>
                        <tr class="text-center">
                            <th class="text-center" width="5%">No</th>                            
                            <th width="10%">Merk</th>
                            <th width="10%">URL</th>
                         
                        </tr>
                    </thead>
                    
                    
                        <tbody>
                        <?php 
                            include 'config.php';
                            $no=1;
                            $data = mysqli_query($config,"SELECT * FROM service_center");
                            while($dt = mysqli_fetch_array($data)){
                                ?>
                                <tr>
                                <td class="text-center"><?php echo $no++; ?></td>
                                <td class="text-center" ><?php echo $dt['merk']; ?></td>
                                <td class="text-center"><?php echo $dt['url']; ?></td>
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