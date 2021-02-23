<div class="header">
	<?php 
		require 'layout/v_navbar.php';		
		if($this->uri->segment(2) == 'home' || $this->uri->segment(2) == '') : 
	?>
	<div class="container content-header">
		<div class="text">
			<h1>Donasikan Sedikit Rezekimu Sebagai Tanda Ketulusan Mu Terhadap Mereka</h1>
		</div>
		<div class="img">
			<img src="<?= base_url('asset/image/ilustrasi/photo-collage.png')?>" class="img-ilustrasi">
		</div>
	</div>
	<div class="bg-header"></div>
	<?php endif;?>
</div>


<div class="banner">
	<div class="container">
		<div class="row">
			<?php if($detail){$this->load->view($detail);}?>
		</div>
	</div>
</div>

<div class="feedback my-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="card" style="box-shadow: 5px 5px 5px rgba(0,0,0,0.3)">
					<div class="card-header" style="background: #148F77;">
						<h5 class="text-white">Send Us Some Feedback!</h5>
						<p class="text-white">Menemukan Bug? Memiliki Saran? Isi Formulir Di Bawah ini dan Perhatikan baik-baik</p>
					</div>
					<div class="card-body">
						<form action="<?= base_url('home/feedback')?>" method="post">
							<div class="form-group">
								<input type="text" name="nama" class="form-control" placeholder="Nama Anda">
							</div>
							<div class="form-group">
								<input type="text" name="email" class="form-control" placeholder="Example@email.com">
							</div>
							<div class="form-group">
								<textarea class="form-control" name="feedback" rows="6" placeholder="Isi Feedback Disini"></textarea>
							</div>
							<div>
								<button type="submit" class="btn-green">Send Feedback!</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="d-flex justify-content-between mt-5">
					<div class="col-lg-7">
						<h4 class="text-center">YAYASAN INSAN BUMI INSTITUT SOSIAL KEMANUSIAAN</h4>
						<p>Perum Graha Tresna Blok D No.7 Mulyasari Tamansari Tasikmalaya Jawa Barat</p>
					</div>
					<div class="col-lg-5">
						<h4>Fanspage Kami</h4>
						<ul>
							<li>
								<a href="#">
									<i class="fab fa-youtube text-danger"></i> Yayasan Insan Bumi Institut Sosial Kemanusiaan
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fab fa-whatsapp text-success"></i> +6283234720190
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fab fa-google text-danger"></i> Google
								</a>
							</li>
							<li>
								<a href="#">
									<i class="fab fa-facebook"></i> Facebook
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php require 'layout/v_footer.php';?>