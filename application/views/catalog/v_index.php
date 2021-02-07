<div class="d-flex justify-content-between mt-3">
	<div class="card col-lg-12 p-2">
		<div class="container">
			<div class="d-flex justify-content-between mt-2">
				<h4>Data Catalog</h4>

				<button type="button" class="btn" data-toggle="modal" data-target="#tambahCatalog" style="background: #148F77;color: white;">
					Tambah Data Catalog
				</button>
			</div>

			<div class="mt-3">
				<table class="table table-striped" id="dataTables">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Catalog</th>
							<th>Icon</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach($catalogs as $catalog) : ?>
						<tr>
							<td><?= $no++;?></td>
							<td><?= $catalog['nama_catalog'];?></td>
							<td><?= $catalog['icon'];?></td>
							<td>
								<button type="button" class="btn btn-success btn-sm" onclick="edit(<?= $catalog['id_catalog']?>)">
									<i class="far fa-edit"></i>
								</button>
								<button type="button" class="btn btn-danger btn-sm" onclick="hapus(<?= $catalog['id_catalog']?>)">
									<i class="fa fa-trash"></i>
								</button>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>

				<p class="text-danger">*referensi Icon ada di <a href="https://fontawesome.com">Font awesome</a></p>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="tambahCatalog" tabindex="-1" role="dialog" aria-labelledly="isiTambahCatalog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="isiTambahCatalog">Tambah Catalog</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('catalog/tambahCatalog');?>" method="POST">
				<div class="modal-body">
					<div class="form-group">
						<input type="text" name="nama" class="form-control" placeholder="Nama Catalog">
					</div>
					<div class="form-group">
						<input type="text" name="icon" class="form-control" placeholder="Icon Catalog">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button class="btn btn-primary">Simpan</button>	
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="editCatalog" tabindex="-1" role="dialog" aria-labelledly="isiTambahCatalog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="isiTambahCatalog">Edit Catalog</h5>
				<button type="button" class="btn btn-secondary btn-small closeEdit" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('catalog/updateCatalog');?>" method="POST">
				<div class="modal-body">
					<input type="hidden" name="id" class="idEdit">
					<div class="form-group">
						<input type="text" name="nama" class="form-control namaEdit" placeholder="Nama Catalog">
					</div>
					<div class="form-group">
						<input type="text" name="icon" class="form-control iconEdit" placeholder="Icon Catalog">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary closeEdit" data-dismiss="modal">Close</button>
					<button class="btn btn-primary">Simpan</button>	
				</div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	function edit(id) {
		var swal = Swal.fire({
		  title: 'Apakah Anda Yakin?',
		  text: "Untuk Mengedit Data Ini",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Ya',
		  cancelButtonText: 'Tidak',
		}).then((result) => {
			if(result.isConfirmed){	
			  $.ajax({
			  	url: '<?= base_url('catalog/editCatalog');?>',
			  	method: 'POST',
			  	data: {'idCatalog':id},
			  	type: JSON,
			  	success: function(data){
			  		var data = JSON.parse(data);
			  		$('.idEdit').val(data.id_catalog);
			  		$('.namaEdit').val(data.nama_catalog);
			  		$('.iconEdit').val(data.icon);


				  	$('#editCatalog').attr('style', 'display:block;');
				  	$('#editCatalog').attr('aria-hidden', 'false');
				  	$('#editCatalog').attr('aria-modal', 'true');
				  	$('#editCatalog').addClass('show');
			  	}
			  })
			}
		})

		return swal;
	}

	$('.closeEdit').on('click', function() {
	  $('#editCatalog').attr('style', 'display:none;');
	  $('#editCatalog').attr('aria-hidden', 'true');
	  $('#editCatalog').attr('aria-modal', 'false');
	  $('#editCatalog').removeClass('show');
	})

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
					url: '<?= base_url('catalog/hapusCatalog')?>',
					method: 'POST',
					data: {'idCatalog': id},
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
</script>