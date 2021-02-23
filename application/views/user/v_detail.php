<div class="row">
	<div class="card col-lg-12 py-3">
		<div class="row">
			<div class="col-lg-4">
				<img src="<?= base_url('asset/image/imageProfil/'.$users['image'])?>">
				<div class="d-flex justify-content-center">
					<p class="badge badge-primary p-2">
						<?= $users['is_active'] == 1 ? 'Activated' : 'Not Activated';?>
					</p>
					<p class="badge badge-success p-2">
						<?= $users['is_online'] == 1 ? 'Online' : 'Offline';?>
					</p>
				</div>
			</div>
			<div class="col-lg-8">
				<form action="<?= base_url('user/change/')?>" method="POST">
					<input type="hidden" name="id" value="<?= $users['id_user'];?>">
					<div class="form-group">
						<label>Nama</label>
						<input type="text" name="nama" class="form-control" value="<?= $users['nama']?>">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="email" class="form-control" value="<?= $users['email']?>">
					</div>
					<div class="form-group">
						<label>No Telepon</label>
						<input type="number" name="telepon" class="form-control" value="<?= $users['no_telepon']?>">
					</div>
					<div class="form-group">
						<label>Ganti Password</label>
						<input type="password" name="password" class="form-control" value="<?= $users['password']?>">
					</div>
					<button class="btn-green">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>