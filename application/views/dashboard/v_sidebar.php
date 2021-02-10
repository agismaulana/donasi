<div class="sidebar">
	<div class="sidebar-profile">
		<p>SAPA <b>TASIKMALAYA</b></p>
	</div>
	<div class="sidebar-box">
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
		<div class="sidebar-item">
			<a href="<?= base_url('logout');?>" class="sidebar-link">
				<i class="fa fa-power-off"></i>
				Log Out
			</a>
		</div>
	</div>
</div>