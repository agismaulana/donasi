<nav class="navbar navbar-expand-lg navbar-light custom-navbar">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url()?>">
			SAPA<b style="color: #148F77;">TASIKMALAYA</b>
		</a>
	    
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