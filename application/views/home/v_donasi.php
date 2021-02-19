<header class="header">
	<?php require 'layout/v_navbar.php';?>
</header>

<div class="content">
	<div class="content-image">
		<img src="<?= base_url('asset/image/imageProgram/'.$programDetail['image_program'])?>">
	</div>
	<div class="container">
		<div class="card-programDesc">
			<div class="card-content">
				<h1><?= $programDetail['nama_program'];?></h1>
				<div class="content-p">
					<div class="text-center">
						<p><?= $programDetail['slug_catalog'];?></p>
					</div>
					<div class="text-center">
						<p>Rp.<?= number_format($programDetail['target'], 2, ',', '.');?></p>
					</div>
					<div class="text-center">
						<p><?= $countDonatur;?> Donatur</p>
					</div>
					<div class="text-center">
						<p>Rp.<?= number_format($jumlahNominal['nominal'], 2, ',', '.');?></p>
					</div>
				</div>
				<div class="progress">
					<div class="progress-bar" style="width: <?= $progress;?>%;background: #148F77;"></div>
				</div>
				<a href="<?= base_url('home/checkout/'.$programDetail['id_program'])?>" class="btn-green btn-block">Donasi Sekarang</a>
			</div>
			<div class="card-penggalang">
				<h5>Penggalang Dana</h5>
				<div class="d-flex">
					<img src="<?= base_url('asset/image/imageProfil/'.$programDetail['image'])?>">
					<div class="desc-penggalang">
						<h3><?= $programDetail['nama'];?></h3>
						<p>Indetitas Terverifikasi</p>
					</div>
				</div>
			</div>
		</div>
		<div class="content-deskripsi">
			<h3>Deskripsi</h3>
			<p><?= $programDetail['deskripsi']?></p>
		</div>
		<div class="card-catatan">
			<h4>Donatur</h4>
			<?php foreach($donaturs as $donatur) : ?>
			<div class="content-catatan d-flex">
				<img src="<?= base_url('asset/image/imageProfil/profile.png')?>">
				<div class="desc-donatur">
					<h3><?= $donatur['nama_donatur'];?></h3>
					<hr>
					<h4>Rp. <?= number_format($donatur['nominal'], 2, ',', '.');?></h4>
					<p><?= $donatur['catatan_donatur'];?></p>
				</div>
			</div>
			<?php endforeach;?>
		</div>
	</div>
</div>

<?php require 'layout/v_footer.php';?>