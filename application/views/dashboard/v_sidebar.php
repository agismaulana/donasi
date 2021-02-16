<button class="btn-sidebar-mobile btn-green">
	<i class="fa fa-bars"></i>
</button>

<div class="sidebar-mobile">
	<button class="btn-green close-sidebar my-2">
		<i class="">
			&times;
		</i>
	</button>
	<div class="sidebar-profile">
		<p>SAPA <b>TASIKMALAYA</b></p>
	</div>
	<div class="sidebar-box">
		<?php if($user['role_id'] != 1) : ?>
		<div class="sidebar-item">
			<a href="<?= base_url('profile/'.$user['id_user']);?>" class="sidebar-link <?= $this->uri->segment(1) == "profile" ? "active" : "";?>">
				<i class="fa fa-user"></i>
				<?= $user['nama']?>
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('program')?>" class="sidebar-link <?= $this->uri->segment(1) == "program" ? "active" : "";?>">
				<i class="fa fa-clipboard"></i>
				Program
			</a>
		</div>
		<?php else : ?>
		<div class="sidebar-item">
			<a href="<?= base_url('profile/'.$user['id_user']);?>" class="sidebar-link <?= $this->uri->segment(1) == "profile" ? "active" : "";?>">
				<i class="fa fa-user"></i>
				<?= $user['nama']?>
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url("admin")?>" class="sidebar-link <?= $this->uri->segment(1) == "admin" ? "active" : "";?>">
				<i class="fa fa-tachometer-alt"></i>
				Home
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('catalog')?>" class="sidebar-link <?= $this->uri->segment(1) == "catalog" ? "active" : "";?>">
				<i class="fa fa-bookmark"></i>
				Catalog
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('program')?>" class="sidebar-link <?= $this->uri->segment(1) == "program" ? "active" : "";?>">
				<i class="fa fa-clipboard"></i>
				Program
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('transaksi')?>" class="sidebar-link <?= $this->uri->segment(1) == "transaksi" ? "active" : "";?>">
				<i class="fa fa-donate"></i>
				Transaksi
			</a>
		</div>
		<?php endif;?>
		<div class="sidebar-item">
			<a href="<?= base_url('logout');?>" class="sidebar-link">
				<i class="fa fa-power-off"></i>
				Log Out
			</a>
		</div>
	</div>
</div>

<div class="sidebar">
	<button class="btn-green close-sidebar my-2">
		<i class="">
			&times;
		</i>
	</button>
	<div class="sidebar-profile">
		<p>SAPA <b>TASIKMALAYA</b></p>
	</div>
	<div class="sidebar-box">
		<?php if($user['role_id'] != 1) : ?>
		<div class="sidebar-item">
			<a href="<?= base_url('profile/'.$user['id_user']);?>" class="sidebar-link <?= $this->uri->segment(1) == "profile" ? "active" : "";?>">
				<i class="fa fa-user"></i>
				<?= $user['nama']?>
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('program')?>" class="sidebar-link <?= $this->uri->segment(1) == "program" ? "active" : "";?>">
				<i class="fa fa-clipboard"></i>
				Program
			</a>
		</div>
		<?php else : ?>
		<div class="sidebar-item">
			<a href="<?= base_url('profile/'.$user['id_user']);?>" class="sidebar-link <?= $this->uri->segment(1) == "profile" ? "active" : "";?>">
				<i class="fa fa-user"></i>
				<?= $user['nama']?>
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url("admin")?>" class="sidebar-link <?= $this->uri->segment(1) == "admin" ? "active" : "";?>">
				<i class="fa fa-tachometer-alt"></i>
				Home
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('catalog')?>" class="sidebar-link <?= $this->uri->segment(1) == "catalog" ? "active" : "";?>">
				<i class="fa fa-bookmark"></i>
				Catalog
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('program')?>" class="sidebar-link <?= $this->uri->segment(1) == "program" ? "active" : "";?>">
				<i class="fa fa-clipboard"></i>
				Program
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('transaksi')?>" class="sidebar-link <?= $this->uri->segment(1) == "transaksi" ? "active" : "";?>">
				<i class="fa fa-donate"></i>
				Transaksi
			</a>
		</div>
		<?php endif;?>
		<div class="sidebar-item">
			<a href="<?= base_url('logout');?>" class="sidebar-link">
				<i class="fa fa-power-off"></i>
				Log Out
			</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.close-sidebar').on('click', function() {
		$('.sidebar-mobile').animate({left:'100%', transitionDuration:'2s'})
	})

	$('.btn-sidebar-mobile').on('click', function() {
		$('.sidebar-mobile').animate({left:'56%', transitionDuration:'2s'})
	})	
</script>
