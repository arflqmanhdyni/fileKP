	<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<h5>About</h5>
						<p>Mars Computer menyediakan berbagai peralatan komputer untuk menunjang aktifitas anda .</p>
					</div>
					<div class="col-md-3">
						<h5>Link</h5>
						<ul>
					
							<li>
								<a href="shop.php"> Produk</a>
							</li>
							<li>
								<a href="cart.php">Keranjang</a>
							</li>
							<li>
								<a href="cekout.php">Chekout</a>
							</li>
						
						</ul>
					</div>
					<div class="col-md-6">
						<h5>Contact</h5>
						<ul>
							<li>
								<a href="tel:+6285642797008"><i class="fa fa-phone"></i> 085642797008</a>
							</li>
							<li>
								<a href="mailto:marscomputer@gmail.com"><i class="fa fa-envelope"></i> MarsComputer@gmail.com</a>
							</li>
							<li>
								<a href="#" ><i class="fa fa-map"></i> Jl. Raya Mayjen Sungkono, Dusun 2, Blater, Kec. Kalimanah, Kabupaten Purbalingga, Jawa Tengah 53371</a>
							</li>
						</ul>

					
					
					</div>
					
				</div>
			</div>
			<p class="copyright">&copy; 2021 MarsComputer | Computers Store. All rights reserved.</p>
		</footer>

		<script type="text/javascript" src="assets/js/jquery.js"></script>
		<script type="text/javascript" src="assets/js/jquery-migrate.js"></script>
		<script type="text/javascript" src="assets/packages/bootstrap/libraries/popper.js"></script>
		<script type="text/javascript" src="assets/packages/bootstrap/bootstrap.js"></script>
		<script type="text/javascript" src="assets/packages/o2system-ui/o2system-ui.js"></script>
		<script type="text/javascript" src="assets/packages/owl-carousel/owl-carousel.js"></script>
		<script type="text/javascript" src="assets/packages/cloudzoom/cloudzoom.js"></script>
		<script type="text/javascript" src="assets/packages/thumbelina/thumbelina.js"></script>
		<script type="text/javascript" src="assets/packages/bootstrap-touchspin/bootstrap-touchspin.js"></script>
		
		<script type="text/javascript" src="assets/js/theme.js"></script>
	

		
	<script>

	$(document).ready(function(){

		function numberWithCommas(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}

		$('.jumlahnya').on("keyup",function(){
			var no = $(this).attr('no');

			var jumlahnya = $(this).val();

			var harga = $("#harga_"+no).val();

			var total = jumlahnya*harga;

			var to = numberWithCommas(total);

			$("#total_"+no).text("Rp. "+to+" ,-");
		});
	});








	$(document).ready(function(){
		$('#provinsi').change(function(){
			var prov = $('#provinsi').val();


			var provinsi = $("#provinsi :selected").text();

			$.ajax({
				type : 'GET',
				url : 'api_ongkir/pilih_kabupaten.php',
				data :  'prov_id=' + prov,
				success: function (data) {
					$("#kabupaten").html(data);
					$("#wilayah_provinsi").val(provinsi);
				}
			});
		});

		$(document).on("change","#kabupaten",function(){

			var asal = 375;
			var kab = $('#kabupaten').val();
			var kurir = "a";
			var berat = $('#berat2').val();

			var kabupaten = $("#kabupaten :selected").text();

			$.ajax({
				type : 'POST',
				url : 'api_ongkir/pilih_ongkir.php',
				data :  {'kab_id' : kab, 'kurir' : kurir, 'asal' : asal, 'berat' : berat},
				success: function (data) {
					$("#ongkir").html(data);
								
					$("#wilayah_kabupaten").val(kabupaten);

				}
			});
		});

		function format_angka(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
		}

		$(document).on("change", '.pilih-kurir', function(event) { 
			// alert("new link clicked!");
			var kurir = $(this).attr("kurir");
			var service = $(this).attr("service");
			var ongkir = $(this).attr("harga");
			var total_bayar = $("#total_bayar").val();

			$("#kurir").val(kurir);
			$("#service").val(service);
			$("#ongkos_kirim").val(ongkir);
			var total = parseInt(total_bayar) + parseInt(ongkir);
			$("#detail_ongkir").text("Rp. "+ format_angka(ongkir) +" ,-");
			$("#detail_total").text("Rp. "+ format_angka(total) +" ,-");
		});



	});
	</script>
	</body>

	</html>