<div class="container">
	<h1 class="text-center text-title mt-5"><b>SAPA</b> <b style="color: #148F77;">TASIKMALAYA</b></h1>
	<div class="row mt-5">
		<div class="card col-lg-5">
		  <h5 class="m-3" style="color: #148F77;">Login Page</h5>
		  <div class="card-body">
		  	<form action="<?= base_url('auth/login')?>" method="POST">
			    <div class="form-group">
			    	<label for="Email">E-mail</label>
			    	<input type="text" name="email" class="form-control" placeholder="@example.com">
			    </div>
			    <div class="form-group">
			    	<label for="Password">Password</label>
			    	<input type="password" name="password" class="form-control" placeholder="*********">
			    </div>
			    <button class="btn btn-block btn-app" style="background: #148F77;color: white;">Login</button>
		  	</form>
		  	<div class="d-flex justify-content-between mt-4">
			  	<a href="<?= base_url();?>" class="btn btn-secondary">Kembali Ke Sapa Tasikmalaya</a>
			  	<a href="<?= base_url('register');?>" class="btn btn-secondary">Register</a>
		  	</div>
		  </div>
		</div>
		<div class="col-lg-6">
			<img src="<?= base_url('asset/image/ilustrasi/Authentication_Two Color.svg');?>" class="img-ilustrasi">
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