<div class="card p-3 mt-3">
	<div class="d-flex justify-content-between">
		<h4>Data Program</h4>
		<button class="btn btn-sm" data-target="#tambahProgram" data-toggle="modal" style="background: #148F77;color: white;">Tambah Program</button>
	</div>

	<div class="mt-3">
		<table class="table table-striped" id="dataTables">
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">Nama Program</th>
					<th scope="col">Catalog</th>
					<th scope="col">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach($programs as $program) : ?>
					<tr>
						<td><?= $no++;?></td>
						<td><?= $program['nama_program'];?></td>
						<td><?= $program['nama_catalog'];?></td>
						<td>
							<button class="btn btn-primary btn-sm" onclick="detail(<?= $program['id_program'];?>)"> 
								<i class="fa fa-info-circle"></i> 
							</button>
							<button class="btn btn-success btn-sm" onclick="edit(<?= $program['id_program'];?>)">
								<i class="fa fa-edit"></i>
							</button>
							<button class="btn btn-danger btn-sm" onclick="hapus(<?= $program['id_program'];?>)">
								<i class="fa fa-trash"></i>
							</button>
						</td>
					</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahProgram" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Tambah Program</h5>
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
        	<form action="<?= base_url('program/tambahProgram')?>" method="post" enctype="multipart/form-data">
		      	<div class="modal-body">
	        		<div class="form-group">
			        	<input type="text" name="nama" class="form-control" placeholder="Nama Program....">
			        </div>
			        <div class="form-group">
			        	<div class="custom-file">
						    <input type="file" class="custom-file-input" id="inputImage" name="imageProgram">
						    <label class="custom-file-label" for="inputImage">Choose file</label>
					  	</div>
			        </div>
			        <div class="form-group">
			        	<input type="text" name="target" class="form-control" placeholder="Target Nominal...">
			        </div>
			        <div class="form-group">
			        	<select class="custom-select" name="catalog">
			        		<option selected>Pilih Catalog</option>
			        		<?php foreach($catalogs as $catalog) : ?>
			        		<option value="<?= $catalog['slug_catalog']?>"><?= $catalog['nama_catalog'];?></option>
			        		<?php endforeach;?>
			        	</select>
			        </div>
			        <div class="form-group">
			        	<input type="date" name="tanggal" class="form-control">
			        </div>
			        <div class="form-group">
			        	<textarea class="form-control" name="deskripsi"></textarea>
			        </div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        	<button type="submit" class="btn btn-primary">Simpan</button>
		      	</div>
        	</form>
	    </div>
	</div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="detailProgram" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Detail Program</h5>
	        	<button type="button" class="close closeDetail" data-dismiss="modal" aria-label="Close" id="closeDetail">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
        		<div class="row">
        			<div class="col-7">
        				<h5 class="namaDetail"></h5>
        				<p class="catalogDetail"></p>
        				<p class="targetDetail"></p>
        				<p class="tanggalDetail"></p>
        				<p class="deskripsiDetail"></p>
        			</div>
        			<div class="col-5">
        				<img src="" class="imageDetail" style="width: 100%;">
        			</div>
        		</div>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-secondary closeDetail" data-dismiss="modal">Close</button>
	      	</div>
	    </div>
	</div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editProgram" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="exampleModalLabel">Edit Program</h5>
	        	<button type="button" class="close closeEdit" data-dismiss="modal" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<form action="<?= base_url('program/updateProgram');?>" method="post" enctype="multipart/form-data">
		      	<div class="modal-body">
		      		<div class="form-group">
		      			<input type="hidden" name="idProgram" class="idEdit">
		      		</div>
	        		<div class="form-group">
			        	<input type="text" name="nama" class="form-control namaEdit" placeholder="Nama Program....">
			        </div>
			        <div class="form-group">
			        	<div class="custom-file">
						    <input type="file" class="custom-file-input imageEdit" id="inputGroupFile01" name="imageEdit">
						    <label class="custom-file-label imageEditLabel" for="inputGroupFile01">Choose file</label>
					  	</div>
			        </div>
			        <div class="form-group">
			        	<input type="text" name="target" class="form-control targetEdit" placeholder="Target Nominal...">
			        </div>
			        <div class="form-group">
			        	<select class="custom-select catalogEdit" name="catalog">
			        		<option selected>Pilih Catalog</option>
			        		<?php foreach($catalogs as $catalog) : ?>
			        		<option value="<?= $catalog['slug_catalog']?>"><?= $catalog['nama_catalog'];?></option>
			        		<?php endforeach;?>
			        	</select>
			        </div>
			        <div class="form-group">
			        	<input type="date" name="tanggal" class="form-control tanggalEdit">
			        </div>
			        <div class="form-group">
			        	<textarea class="form-control deskripsiEdit" name="deskripsi"></textarea>
			        </div>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-secondary closeEdit" data-dismiss="modal">Close</button>
		        	<button type="submit" class="btn btn-primary">Simpan</button>
		      	</div>
	      	</form>
	    </div>
	</div>
</div>

<script type="text/javascript">
	$('.custom-file-input').on('change', function() {
		let filename = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').html(filename);
	})

	function detail(id) {
		var ajax = $.ajax({
			url: '<?= base_url('program/detailProgram')?>',
			method: 'POST',
			data: {'idProgram': id},
			type: JSON,
			success: function(data) {
				var data = JSON.parse(data);
				var waktu = data.waktu_berakhir;
				// Show Data
				$('.namaDetail').html(data.nama_program);
				$('.catalogDetail').html(data.nama_catalog);
				var split = waktu.split('-');
				$('.tanggalDetail').html(split[2]+'-'+split[1]+'-'+split[0]);
				$('.imageDetail').attr('src','<?= base_url('asset/image/imageProgram/')?>'+data.image_program);
				$('.targetDetail').html('Rp. '+Number(data.target).toLocaleString('id'));
				$('.deskripsiDetail').html(data.deskripsi);
				// Show Modal
				$('#detailProgram').attr('aria-modal','true');
				$('#detailProgram').removeAttr('aria-hidden');
				$('#detailProgram').attr('style', 'display:block');
				$('#detailProgram').addClass('show');
			}
		})

		return ajax;
	}

	$('.closeDetail').on('click',function(){
		$('#detailProgram').hide();
	})

	function edit(id) {
		var swal = Swal.fire({
			icon:'warning',
			title: 'Apakah Anda Yakin?',
			text: 'Untuk Mengubah Data Ini?',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			cancelButtonText: 'Tidak',
		}).then((result) => {
			if(result.isConfirmed){
				$.ajax({
					url: '<?= base_url('program/detailProgram')?>',
					method: 'POST',
					data: {'idProgram': id},
					type: JSON,
					success: function(data){
						var data = JSON.parse(data);
						var waktu = data.waktu_berakhir;
						// Show Data
						$('.idEdit').val(data.id_program);
						$('.namaEdit').val(data.nama_program);
						$('.catalogEdit option')
							.removeAttr('selected')
							.filter(`[value='${data.slug_catalog}']`)
							.attr('selected',true);
						$('.tanggalEdit').val(waktu);
						$('.imageEditLabel').html(data.image_program);
						$('.targetEdit').val(data.target);
						$('.deskripsiEdit').html(data.deskripsi);
						// Show Modal
						$('#editProgram').attr('aria-modal','true');
						$('#editProgram').removeAttr('aria-hidden');
						$('#editProgram').attr('style', 'display:block');
						$('#editProgram').addClass('show');
					}
				})
			}
		});
		$('.closeEdit').on('click', function(){
			$('#editProgram').hide();
		});
	}

	function hapus(id) {
		var swal = Swal.fire({
			icon:'warning',
			title: 'Apakah Anda Yakin?',
			text: 'Untuk Mengubah Data Ini?',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya',
			cancelButtonText: 'Tidak',
		}).then((result) => {
			if(result.isConfirmed){
				$.ajax({
					url: '<?= base_url('program/deleteProgram')?>',
					method:'POST',
					data: {'idProgram':id},
					type: JSON,
					success: function(data){
						Swal.fire({
							position: 'top-end',
							icon: 'success',
							title: 'Berhasil Menghapus Data',
							showConfirmButton: false,
							timer: 1500,
						})
						document.location.reload();
					}
				})
			}
		});
	}
</script>