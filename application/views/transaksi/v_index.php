<div class="row">
	<div class="card col-lg-12 my-3">
		<div class="card-body">
			<table class="table table-striped" id="dataTables">
				<thead>
					<tr>
						<th scope="col">ID Transaksi</th>
						<th scope="col">Nama Program</th>
						<th scope="col">Donatur</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($transaksis as $transaksi) : ?>
						<tr>
							<td><?= $transaksi['id_transaksi']?></td>
							<td><?= $transaksi['nama_program']?></td>
							<td><?= $transaksi['nama_donatur']?></td>
							<td>
								<button class="btn btn-primary btn-sm" onclick="detail('<?= $transaksi['id_transaksi']?>')">
									<i class="fa fa-info-circle"></i>
								</button>
							</td>
						</tr>
					<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<!-- MODAL DETAIL -->

<!-- Modal Detail -->
<div class="modal fade" id="detailTransaksi" tabindex="-1" role="dialog" aria-labelledby="modalTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<h5 class="modal-title" id="modalTransaksiLabel">Detail Transaksi</h5>
	        	<button type="button" class="close closeDetail" data-dismiss="modal" aria-label="Close" id="closeDetail">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	      	</div>
	      	<div class="modal-body">
				<div class="row">
					<div class="container">
						<div class="d-flex justify-content-between">
							<h5 id="idTransaksi"></h5>
							<div class="status"></div>
						</div>
						<ul class="nav nav-tabs">
						  	<li class="nav-item">
						    	<a class="nav-link active" id="btnprogram" aria-current="page" href="#program">Program</a>
						  	</li>
						  	<li class="nav-item">
						    	<a class="nav-link" id="btndonatur" href="#donatur">Donatur</a>
						  	</li>
						  	<li class="nav-item">
						    	<a class="nav-link" id="btndetail" href="#detail">Detail</a>
						  	</li>
						</ul>

						<div id="program" class="tab-pane d-block">
							<h3 class="nama-program mt-2 text-center"></h3>
							<div class="img-detail">
								<img src="" class="img-program">
							</div>
							<p class="deskripsi-program"></p>
						</div>

						<div id="donatur" class="tab-pane d-none">
							<h3 class="nama-donatur"></h3>
							<p class="email-donatur"></p>
							<p class="no-telepon"></p>
							<p class="nominal"></p>
							<p class="catatan"></p>
						</div>

						<div id="detail" class="tab-pane d-none">
							<h3 class="va-number"></h3>
							<p class="payment-type"></p>
							<p class="bank"></p>
							<p class="status"></p>
						</div>
					</div>
				</div>

	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-secondary closeDetail" data-dismiss="modal">Close</button>
	      	</div>
	    </div>
	</div>
</div>

<script type="text/javascript">

	$('#btnprogram').on('click', function() {
		// Remove Class
		$('#program').removeClass('d-none');
		$('#donatur').removeClass('d-block');
		$('#detail').removeClass('d-block');
		// Add Class
		$('#program').addClass('d-block');
		$('#donatur').addClass('d-none');
		$('#detail').addClass('d-none');
	})

	$('#btndonatur').on('click', function() {
		// Remove Class
		$('#donatur').removeClass('d-none');
		$('#program').removeClass('d-block');
		$('#detail').removeClass('d-block');
		// Add Class
		$('#donatur').addClass('d-block');
		$('#program').addClass('d-none');		
		$('#detail').addClass('d-none');
	})

	$('#btndetail').on('click', function() {
		// Remove Class
		$('#detail').removeClass('d-none');
		$('#donatur').removeClass('d-block');
		$('#program').removeClass('d-block');
		// Add Class
		$('#detail').addClass('d-block');	
		$('#donatur').addClass('d-none');
		$('#program').addClass('d-none');		
	})

	function detail(idDetail) {
		let ajax = $.ajax({
			url: `<?= base_url();?>/transaksi/detail`,
			method: 'POST',
			data: {'idDetail': idDetail},
			dataType: 'JSON',
			success: function(data) {
				// Transaksi
				$('#idTransaksi').html('ID : '+data.id_transaksi);
				if(data.status_code == 201) {
					$('.status').html('<p class="badge badge-warning p-2">Pending</p>');
				} else if(data.status_code == 200) {
					$('.status').html('<p class="badge badge-success p-2">Success</p>');
				}

				// program
				$('.img-program').attr('src','<?= base_url('asset/image/imageProgram/')?>'+data.image_program);
				$('.nama-program').html(data.nama_program);
				$('.deskripsi-program').html(data.deskripsi);
				// Donatur
				$('.nama-donatur').html(data.nama_donatur);
				$('.email-donatur').html(data.email_donatur);
				$('.no-telepon').html('No Handphone/Telepon : ' + data.no_telepon);
				let nf = Intl.NumberFormat('de-DE');
				let nominal = data.nominal;
				$('.nominal').html('Nominal : ' + `Rp.${nf.format(nominal)}`);
				$('.catatan').html('Catatan : ' + data.catatan_donatur);
				// Detail
				$('.va-number').html(data.va_number);
				$('.payment-type').html('Type : ' + data.payment_type);
				$('.bank').html('Bank : ' + data.bank);


				$('#detailTransaksi').attr('aria-modal','true');
				$('#detailTransaksi').removeAttr('aria-hidden');
				$('#detailTransaksi').attr('style', 'display:block');
				$('#detailTransaksi').addClass('show');
			}
		});

		return ajax;
	}

	$('.closeDetail').on('click',function(){
		$('#detailTransaksi').hide();
	})
</script>