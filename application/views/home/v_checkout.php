<header class="header">
	<?php require 'layout/v_navbar.php';?>
</header>

<script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="SB-Mid-client-IGI_YTocwwS4gb4Y"></script>

<div class="container mt-2 pb-3">
	<div class="card col-lg-6 mx-auto">
		<div class="card-body">
			<?php if(!$this->session->userdata('email')) : ?>
			<div class="alert text-white" style="background:#148F77;">
				Lengkapi Data Berikut Atau
				<a href="<?= base_url('login')?>" style="text-decoration:none;color:#ddd;opacity:.8;">
				    Login
				</a>
			</div>
			<?php endif;?>

			<form>
				<input type="hidden" name="program_id" value="<?= $programId;?>" id="program_id">
				<?php if(!$this->session->userdata('email')) : ?>
					<div class="form-group">
						<label for="nama">Nama Lengkap <b class="text-danger">*</b></label>
						<input type="text" name="nama_donatur" class="form-control" id="nama_donatur">
					</div>
					<div class="form-group">
						<label for="no">Nomor HP <b class="text-danger">*</b></label>
						<input type="number" name="no_telepon" class="form-control" id="no_telepon">
					</div>
					<div class="form-group">
						<label for="email">E-Mail <b class="text-danger">*</b></label>
						<input type="text" name="email_donatur" class="form-control" id="email_donatur">
					</div>
				<?php else : ?>
					<div class="form-group">
						<label for="nama">Nama Lengkap <b class="text-danger">*</b></label>
						<input type="text" name="nama_donatur" class="form-control" id="nama_donatur" value="<?= $user['nama'];?>" readonly >
					</div>
					<div class="form-group">
						<label for="no">Nomor HP <b class="text-danger">*</b></label>
						<input type="number" name="no_telepon" class="form-control" id="no_telepon" value="<?= $user['no_telepon']?>" readonly>
					</div>
					<div class="form-group">
						<label for="email">E-Mail <b class="text-danger">*</b></label>
						<input type="text" name="email_donatur" class="form-control" id="email_donatur" value="<?= $user['email'];?>" readonly>
					</div>
				<?php endif;?>
				<div class="form-group">
					<label for="catatan">Tulis Pesan atau Do'a</label>
					<textarea class="form-control" name="catatan_donatur" placeholder="Tulis Pesan Atau Do'a Untuk Program Ini" id="catatan_donatur"></textarea>
				</div>
				<div class="form-group">
					<input type="checkbox" name="gantiNama" class="gantiNama" id="gantiNama"> Sembunyikan Nama Saya?(Hamba Allah)
				</div>

				<div class="d-flex justify-content-between">
					<div class="form-group">
						<input type="radio" name="pressnominal" class="nominal" value="10000">Rp.10.000
					</div>
					<div class="form-group">
						<input type="radio" name="pressnominal" class="nominal" value="20000">Rp.20.000
					</div>
					<div class="form-group">
						<input type="radio" name="pressnominal" class="nominal" value="50000">Rp.50.000
					</div>
					<div class="form-group">
						<input type="radio" name="pressnominal" class="nominal" value="100000">Rp.100.000
					</div>
				</div>

				<div class="form-group">
					<label for="nominal">Nominal Donasi</label>
					<input type="text" name="nominal" class="form-control" id="nominal" value="0000" style="font-weight: 600;font-size: 20px;" readonly>
				</div>
				<div class="bg-white mx-auto">
					<button type="button" id="pay-button" class="btn-green btn-block">Lanjutkan Pembayaran</button>
				</div>
			</form>

			<form id="payment-form" method="post" action="<?= base_url()?>/snap/finish">
		      <input type="hidden" name="result_type" id="result-type" value=""></div>
		      <input type="hidden" name="result_data" id="result-data" value=""></div>
		    </form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.gantiNama').on('click',function() {
		$('.gantiNama').attr('class','checked');
	})

	$('.checked').on('click', function() {
		$('.gantiNama').attr('class','gantiNama');
	})

	$('.nominal').on('change', function(){
		$('#nominal').val($(this).val());
	});

	$('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");

      var program_id = $('#program_id').val();
      var nama_donatur = $('#nama_donatur').val();
      var no_telepon = $('#no_telepon').val();
      var email_donatur = $('#email_donatur').val();
      var catatan_donatur = $('#catatan_donatur').val();
      var nominal = $('#nominal').val();
      if($('input[class="checked"]') == 'on') {
	    var ganti_nama = 'on';
      } else {
      	var ganti_nama = 'off';
      }

      $.ajax({
      	type: 'POST',
        url: '<?= base_url()?>snap/token',
        data: {
        	'program_id': program_id,
        	'nama_donatur': nama_donatur, 
        	'no_telepon': no_telepon,
        	'email_donatur': email_donatur,
        	'catatan_donatur': catatan_donatur,
        	'nominal': nominal,
        	'ganti_nama': ganti_nama
        },
        cache: false,

        success: function(data) {
          //location = data;

          console.log('token = '+data);
          
          var resultType = document.getElementById('result-type');
          var resultData = document.getElementById('result-data');

          function changeResult(type,data){
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            

            //resultType.innerHTML = type;
            //resultData.innerHTML = JSON.stringify(data);
          }

          snap.pay(data, {
            
            onSuccess: function(result){
              changeResult('success', result);
              console.log(result.status_message);
              console.log(result);
              $("#payment-form").submit();
            },
            onPending: function(result){
              changeResult('pending', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            },
            onError: function(result){
              changeResult('error', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            }
          });
        }
      });
    });
</script>