<?php include 'header.php'?>

<div id="page-content" class="page-content">
        <div class="banner">
            <div class="jumbotron jumbotron-bg text-center rounded-0" style="background-image: url('assets/img/baner3.jpg');">
                <div class="container">
                    <h1 class="pt-5">
                        Lihat Bukti Upload Pembayaran
                    </h1>
                    
                </div>
            </div>
        </div>

        <section id="checkout">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                    <table class="table table-borderles">
                                                
							</table>
                            </br>
                            <table class="table table-bordered">
                           
                             <thead>
                             <tr class="text-center">
									<th>Bukti Upload Pembayaran </th>
                                  
								</tr>
                                </thead>
                                <tbody>
                            
                             <tr >
                                     <td class="text-center">
                                     <?php 
                                        $id_faktur = $_GET['id'];
                                        $data = mysqli_query($config,"select * from faktur where faktur_id='$id_faktur' order by faktur_id desc");
                                        while($dt = mysqli_fetch_array($data)){
                                    ?>
                             
                       
                                    <?php
                                    if($dt['faktur_bukti'] == ""){
                                        echo "Belum melakukan upload tanda bukti pembayaran.";
                                    }else{
                                        ?>
                                        <img src="fotoo/bukti_bayar/<?php echo $dt['faktur_bukti']; ?>" alt="" style="width: 20%">
                                        <?php
                                    }
                                    ?>
                       

                                   
                                </td>
							</tr>
                           
								
                                <?php }
                                ?>
                               </tr>
                                   </tbody>  
                                   </table>
                                  
                        <!-- Bill Detail of the Page end -->
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include 'footer.php'?>