<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
	<button class="btn-green back" style="border-radius: 50%;height: 30px;">
		<p style="font-size: 20px;line-height: 10px;">&larr;</p>
	</button>
</nav> -->

<!-- <div class="container mt-3">
	<form action="<?= base_url('home/checkout')?>" method="POST">
		<div class="card col-lg-6 mx-auto" id="">
			<div class="card-body">
				<div class="row">
					<h3 class="mx-auto">Masukkan Nominal Donasi</h3>
					<div class="col-lg-12">
						<div class="d-block my-3">
							<button type="button" class="btn-green btn-block nominal" data-nominal="10000">Rp.10.000</button>
							<button type="button" class="btn-green btn-block nominal" data-nominal="20000">Rp.20.000</button>
							<button type="button" class="btn-green btn-block nominal" data-nominal="50000">Rp.50.000</button>
							<button type="button" class="btn-green btn-block nominal" data-nominal="100000">Rp.100.000</button>
						</div>
					</div>
					<div class="card col-lg-12 p-3">
						<h4>Nominal Donasi Lainnya</h4>
						<div class="card-body">
							<input type="hidden" name="program_id" value="<?= $programDetail['id_program'];?>">
							<input type="number" name="nominal" value="10000" class="form-control valueNominal">
							<button type="submit" class="btn-green btn-block mt-2 lanjutkan">Lanjutkan Pembayaran</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div> -->

<div class="box-nominal">
	<h1 class="text-center text-white">Nominal Donasi</h1>
	<div class="row list-nominal">
		<div class="col-lg-3">
			<button class="card-nominal bg-gradient-green p-4 nominal" data-nominal="10000">
				<div class="card-body">
					<h1>Rp. 10.000</h1>
				</div>
			</button>
		</div>
		<div class="col-lg-3">
			<button class="card-nominal bg-gradient-green p-4 nominal" data-nominal="20000">
				<div class="card-body">
					<h1>Rp. 20.000</h1>
				</div>
			</button>
		</div>
		<div class="col-lg-3">
			<button class="card-nominal bg-gradient-green p-4 nominal" data-nominal="50000">
				<div class="card-body">
					<h1>Rp.50.000</h1>
				</div>
			</button>
		</div>
		<div class="col-lg-3">
			<button class="card-nominal bg-gradient-green p-4 nominal" data-nominal="100000">
				<div class="card-body">
					<h1>Rp. 100.000</h1>
				</div>
			</button>
		</div>

		<div class="box-nominal-lainnya col-lg-12">
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url('home/checkout')?>" method="POST">
						<h4>Nominasi Lainnya</h4>
						<input type="hidden" name="program_id" value="<?= $programDetail['id_program'];?>">
						<input type="number" name="nominal" class="form-control valueNominal" placeholder="Rp. 0,00" readonly>
						<button type="submit" class="btn-green mt-2 lanjutkan" type="submit">Lanjutkan Pembayaran</button>
						<button class="btn-green back mt-2 back">Kembali</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$('.nominal').on('click', function() {
		var nominal = $(this).data('nominal');
		console.log(nominal)
		$('.valueNominal').val(nominal);
	});

	$('.back').on('click', function(){
		document.location.href = '<?= base_url('home-donasi/'.$this->uri->segment(3));?>';
	})
</script>