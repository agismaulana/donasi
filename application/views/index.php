	<?php if(base_url('') && base_url('index')):?>
		<style type="text/css">
			body {
				overflow: hidden;
			}
		</style>
	<?php endif;?>


	<!--loader-->
	<div class="bg-loader" id="loader">
		<div class="loader"></div>
	</div>

	<!--header-->
	<div class="medsos">
		<div class="container" style="display: flex;justify-content: space-between;">
			<ul>
				<li><p class="text-white">Ikuti Kami di </p></li>
				<li><a href="https://wa.me/qr/5TKBIULEE43GE1"><i class="fab fa-whatsapp"></i></a></li>
				<li><a href="#"><i class="fab fa-facebook"></i></a></li>
				<li><a href="#"><i class="fab fa-youtube"></i></a></li>
				<li><a href="https://twitter.com/NidaJuliana1"><i class="fab fa-twitter"></i></a></li>
				<li><a href="https://www.instagram.com/nidjul_?=nametag"><i class="fab fa-instagram"></i></a></li>
			</ul>
		</div>
	</div>
	<header>
		<div class="container">
			<div class="row row-header">
				<h1><a href="<?= base_url();?>"><sup>Sapa</sup>Tasikmalaya</a></h1>
				<form action="" method="POST">
					<div class="search">
						<input type="text" name="search" class="form-control" placeholder="Cari Program" style="width:80%;margin: 10px 5px;">
						<button class="btn btn-cari" style="margin: 10px 5px;">Cari</button>
					</div>
				</form>
				<ul>
					<li><a href="<?= base_url()?>" onclick="gantiMenu('home')" class="active">HOME</a></li>
					<li><a href="#catalog" onclick="gantiMenu('catalog')">CATALOG</a></li>
					<li><a href="#about">ABOUT</a></li>
					<li><a href="#service">SERVICE</a></li>
					<li><a href="#contact">CONTACT</a></li>
				</ul>
			</div>
		</div>
	</header>

	<!-- Home Page -->
	<!--banner-->
	<section class="banner" id="home">
		<div class="container" style="display: flex;justify-content: space-between;">
			<div class="text">
				<h2 class="quotes">Mari Sisihkan Uang Sakumu.<br>Sebagai Kepedulian Dirimu </h2>
				<p class="sub-quotes">"Berikanlah sedekah! Karena sedekah itu ibarat sungai yang mengalir. Kamu hanya akan terus memperoleh manfaat dari air bersihnya"</p>
				<button class="btn btn-donasi">Donasi Sekarang</button>
			</div>
			<img src="<?= base_url('asset/image/ilustrasi/4.png')?>" style="width: 50%;height: 75%;">
		</div>
	</section>

	<!-- Catalog Page -->

	<section id="catalog" class="container" style="display: none; padding: 10px;">
		<div class="card card-box">
			<a href="#" class="box">Pembangunan Masjid</a>
			<a href="#" class="box">yayasan Panti Asuhan</a>
			<a href="#" class="box">Anak yatim Piatu</a>
		</div>
		<div class="catalog">
			<div class="card card-catalog">
				<h3>Penggalangan Dana Mendesak</h3>
				<div class="card-scroll">
					<div class="donasi">
						<div class="card card-donasi">
							<img src="" class="img-donasi">
							<p>Pembangunan Masjid Di Sukarame</p>
						</div>
						<div class="card card-donasi">
							<img src="" class="img-donasi">
							<p>Pembangunan Masjid Di Sukarame</p>
						</div>
						<div class="card card-donasi">
							<img src="" class="img-donasi">
							<p>Pembangunan Masjid Di Sukarame</p>
						</div>
						<div class="card card-donasi">
							<img src="" class="img-donasi">
							<p>Pembangunan Masjid Di Sukarame</p>
						</div>
					</div>
				</div>
			</div>
			<div class="card card-catalog">
				<h3>Program Donasi Lain</h3>
				<div class="card-scroll">
					<div class="donasi">
						<a href="#" class="card card-donasi">
							<img src="<?= base_url('asset/image/program/bantuan.jpg')?>" class="img-donasi">
							<div class="info">
								<p>Pembangunan Masjid Di Sukarame</p>
								<div class="progressbar">
									<div class="bar" style="width: 50%;"></div>
								</div>
								<div class="desc" style="display: flex; justify-content: space-between;">
									<p>Rp.1.400.000</p>
									<p>14 hari lagi</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div style="display: flex;justify-content: center">
			<a href="#" class="btn btn-all">Lihat Semua Donasi &rarr;</a>
		</div>
	</section>

	<!--footer-->
	<footer>
		<div class="container">
			<small>Copyright &copy; 2021 - SAPA-TASIKMALAYA. All Rights Reserved.</small>
		</div>
	</footer>


	