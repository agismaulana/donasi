
<div class="nav-menu-mobile d-none">
	<div class="d-flex justify-content-between">
		<button type="button" class="btn-green close-nav-mobile" id="close-nav-mobile">
			&times;
		</button>
		<h2><b>SAPA</b> <b style="color: #148F77;">TASIKMALAYA</b></h2>
	</div>
	<ul class="mt-5">
		<li class="">
    		<a href="<?= base_url()?>">Home</a>
    	</li>
    	<li class="">
    		<a href="<?= base_url('home-about')?>">About</a>
    	</li>
    	<li class="">
    		<a href="<?= base_url('home-contact')?>" class="">Contact</a>
    	</li>

    	<?php if(!$this->session->userdata('email')) : ?>
		<a href="<?= base_url('login')?>" class="btn-green btn-block">Login</a>
		<?php else : ?>
		<a href="<?= base_url('profile/'.$user['id_user'])?>" class="btn-green btn-block"><?= $user['nama'];?></a>
		<?php endif;?>
	</ul>		
</div>

<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url()?>">
			<b>SAPA</b> <b style="color: #148F77;">TASIKMALAYA</b>
		</a>
	    
		<button class="nav-mobile btn-green">
			<i class="fa fa-bars"></i>
		</button>

	    <ul class="nav navbar-nav">
	    	<li class="nav-item">
	    		<a href="" class="nav-link">Home</a>
	    	</li>
	    	<li class="nav-item">
	    		<a href="" class="nav-link">About</a>
	    	</li>
	    	<li class="nav-item">
	    		<a href="" class="nav-link">Contact</a>
	    	</li>

	    	<?php if(!$this->session->userdata('email')) : ?>
			<div class="d-flex nav-link">
				<a href="<?= base_url('login')?>" class="btn-green">Login</a>
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
		$('.nav-menu-mobile').addClass('d-none');
	})

	$('.nav-mobile').on('click', function() {
		$('.nav-menu-mobile').removeClass('d-none')
	})
</script>