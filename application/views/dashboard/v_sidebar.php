<div class="sidebar">
	<div class="sidebar-profile">
		<img src="<?= base_url('asset/image/imageProfil/profile.png')?>">
	</div>
	<div class="sidebar-box">
		<div class="sidebar-item">
			<a href="<?= base_url("admin")?>" class="sidebar-link <?= $this->uri->segment(1) == "admin" ? "active" : "";?>">
				<i class="fa fa-home"></i>
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('catalog')?>" class="sidebar-link <?= $this->uri->segment(1) == "catalog" ? "active" : "";?>">
				<i class="fa fa-bookmark"></i>
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('program')?>" class="sidebar-link <?= $this->uri->segment(1) == "program" ? "active" : "";?>">
				<i class="fa fa-clipboard"></i>
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('transaksi')?>" class="sidebar-link <?= $this->uri->segment(1) == "transaksi" ? "active" : "";?>">
				<i class="fa fa-donate"></i>
			</a>
		</div>
		<div class="sidebar-item">
			<a href="<?= base_url('logout');?>" class="sidebar-link">
				<i class="fa fa-power-off"></i>
			</a>
		</div>
	</div>
</div>