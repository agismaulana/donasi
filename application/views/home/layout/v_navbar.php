
<div class="nav-menu-mobile">
	<div class="row justify-content-between container pt-2">
		<div class="col-3">
			<button type="button" class="btn-green close-nav-mobile" id="close-nav-mobile">
				&times;
			</button>
		</div>
		<div class="col-7">
			<h2><b>SAPA</b> <b style="color: #148F77;">TASIKMALAYA</b></h2>
		</div>
	</div>
	<ul class="container">
		<li>
    		<a href="<?= base_url()?>">Home</a>
    	</li>
    	<li>
    		<a href="<?= base_url('home-about')?>">Tentang Kami</a>
    	</li>
    	<li>
    		<a href="<?= base_url('home-contact')?>" class="">Kontak </a>
    	</li>

    	<?php if(!$this->session->userdata('email')) : ?>
		<a href="<?= base_url('login')?>" class="btn-green">Masuk</a>
		<a href="<?= base_url('register')?>" class="btn-green">Daftar</a>
		<?php else : ?>
		<a href="<?= base_url('profile/'.$user['id_user'])?>" class="btn-green"><?= $user['nama'];?></a>
		<?php endif;?>
	</ul>		
</div>

<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url()?>">
			<b>SAPA</b> <b style="color: #148F77;">TASIKMALAYA</b>
		</a>
	    
		<button class="nav-mobile btn-green" id="nav-mobile">
			<i class="fa fa-bars"></i>
		</button>

	    <ul class="nav navbar-nav">
	    	<li class="nav-item">
	    		<a href="<?= base_url();?>" class="nav-link">Home</a>
	    	</li>
	    	<li class="nav-item">
	    		<a href="<?= base_url('home-about')?>" class="nav-link">Tentang Kami</a>
	    	</li>
	    	<li class="nav-item">
	    		<a href="<?= base_url('home-contact')?>" class="nav-link">Kontak</a>
	    	</li>

	    	<?php if(!$this->session->userdata('email')) : ?>
			<div class="d-flex nav-link">
				<a href="<?= base_url('login')?>" class="btn-green">Masuk</a>
			</div>
			<?php else : ?>
			<div class="d-flex nav-link">
				<a href="<?= base_url('profile/'.$user['id_user'])?>" class="btn-green"><?= $user['nama'];?></a>
			</div>
			<?php endif;?>
	    </ul>
	</div>
</nav>


<script type="text/javascript">
	$('#close-nav-mobile').on('click', function() {
		$('.nav-menu-mobile').animate({left:'100%', transitionDuration:'1.5s'})
	})

	$('#nav-mobile').on('click', function() {
		$('.nav-menu-mobile').animate({left:'20%', transitionDuration:'1.5s'})
	})
</script>