<div class="card col-lg-12 p-2">
	<div class="container">
		<h4>Users</h4>
	</div>
</div>

<div class="d-flex justify-content-between mt-3">
	<div class="card col-lg-12 p-2">
		<div class="container">
			<div class="d-flex justify-content-between">
				<h4>Data Users</h4>
			</div>

			<div class="mt-3 col-lg-12 col-md-12 col-sm-12">
				<table class="table table-striped mt-2" id="dataTables">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach($users as $user) : ?>
							<tr>
								<td><?= $no++;?></td>
								<td><?= $user['nama'];?></td>
								<td>
									<button class="btn btn-primary btn-sm" type="button" onclick="detail(<?= $user['id_user'];?>)"> 
										<i class="fa fa-info-circle"></i>
									</button>
									<button type="button" class="btn btn-danger btn-sm" onclick="hapus(<?= $user['id_user'];?>)"> 
										<i class="fa fa-trash"></i>
									</button>
								</td>
							</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalDetail" tabindex="-1" role="dialog" aria-labelledly="titleModalDetail" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="titleModalDetail">User Detail</h5>
				<button type="button" class="closeModal btn btn-secondary" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h4 id="namaUser"></h4>
				<p id="emailUser"></p>
				<p id="roleUser"></p>
				<div class="d-flex">
					<div id="activeUser"></div>
					<div class="ml-2" id="onlineUser"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function hapus(id) {
		var swal = Swal.fire({
		  title: 'Apakah Anda Yakin?',
		  text: "Untuk Menghapus Data Ini",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ya',
		  cancelButtonText: 'Tidak',
		}).then((result) => {
			if(result.isConfirmed) {
				$.ajax({
					url: '<?= base_url('catalog/hapusUser')?>',
					method: 'POST',
					data: {'idUser': id},
					type: JSON,
					success: function(data){
						Swal.fire({
							icon: 'success', 
							title: 'Data Berhasil Dihapus',
							showCancelButton: true,
							timer: 1500,
						});
						document.location.reload(true);
					}
				})
			}
		})
	}

	function detail(id) {
		var ajax = $.ajax({
			url: `<?= base_url('user/detail/')?>`,
			method: 'POST',
			data: {'idUser': id},
			type: JSON,
			success: function(data){
				var json = JSON.parse(data);
				// Show Modal
				$('#modalDetail').removeAttr('aria-hidden');
				$('#modalDetail').attr('aria-modal', 'true');
				$('#modalDetail').addClass('show');
				$('#modalDetail').attr('style','display:block;')
				// Show Detail User
				$('#namaUser').html(json.nama);
				$('#emailUser').html(json.email);
				$('#roleUser').html(json.nama_role);
				if(json.is_active == 1) {
					$('#activeUser').html('<p class="badge badge-success">Active</p>');
				} else {
					$('#activeUser').html('<p class="badge badge-danger">Not Active</p>');
				}
				if(json.is_online == 1) {
					$('#onlineUser').html('<p class="badge badge-success">Online</p>');
				} else {
					$('#onlineUser').html('<p class="badge badge-danger">Offline</p>')
				}
			}
		})

		$('.closeModal').on('click', function() {
			$('#modalDetail').removeAttr('aria-modal');
			$('#modalDetail').attr('aria-hidden', 'true');
			$('#modalDetail').removeClass('show');
			$('#modalDetail').attr('style','display:none;');
		})
		return ajax;
	}
</script>