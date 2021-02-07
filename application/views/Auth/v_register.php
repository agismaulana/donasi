<div class="container">
	<h1 class="text-center text-title mt-3">SAPA Tasikmalaya</h1>
	<div class="row mt-3">
		<div class="card col-lg-5">
		  <h5 class="m-3" style="color: #148F77;">Register Page</h5>
		  <div class="card-body">
		  	<form action="<?= base_url('auth/daftar')?>" method="POST">
		  		<div class="form-group">
		  			<label for="Nama">Nama</label>
		  			<input type="text" name="nama" class="form-control" placeholder="e.g John Doe" required>
		  		</div>
			    <div class="form-group">
			    	<label for="Email">Username Atau E-mail</label>
			    	<input type="text" name="username" class="form-control" placeholder="@example.com" required>
			    </div>
			    <div class="form-group">
			    	<label for="telepon">No. Telepon</label>
			    	<input type="number" name="telepon" class="form-control" maxlength="13" placeholder="0812XXXXXXXX">
			    </div>
			    <div class="d-flex justify-content-between">
			    	<div class="form-group">
				    	<label for="Password">Password</label>
				    	<input type="password" name="password" class="form-control" placeholder="*********" required>
				    </div>
				    <div class="form-group">
				    	<label for="Password">Konfirmasi</label>
				    	<input type="password" name="konfirmasi" class="form-control" placeholder="*********" required>
				    </div>
			    </div>
			    <button class="btn btn-block" style="background: #148F77;color: white;">Register</button>
		  	</form>
		  	<div class="d-flex justify-content-between mt-4">
			  	<a href="<?= base_url();?>" class="btn btn-secondary">Kembali Ke Sapa Tasikmalaya</a>
			  	<a href="<?= base_url('login');?>" class="btn btn-secondary">Login</a>
		  	</div>
		  </div>
		</div>
		<div class="col-lg-6">
			<img src="<?= base_url('asset/image/ilustrasi/auth.png');?>" class="img-ilustrasi" style="width: 100%;">
		</div>
	</div>
</div>

<script type="text/javascript">
	<?php if($this->session->flashdata('message')) : ?>
		<?= $this->session->flashdata('message')?>;
		setInterval(function(){
			<?= $this->session->unset_userdata('message')?>
		}, 3000);
	<?php endif;?>
</script>