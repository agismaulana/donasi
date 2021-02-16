<div class="row">
	<div class="col-lg-3 col-6">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<h3>Jumlah Program</h3>
			</div>
			<div class="card-body">
				<h2><?= $count['jumlahProgram'];?></h2>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<h3>Jumlah Donasi</h3>
			</div>
			<div class="card-body">
				<h2>Rp.<?= number_format($count['jumlahDonasi']['nominal'], 2, ',','.');?></h2>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<h3>Jumlah Donatur</h3>
			</div>
			<div class="card-body">
				<h2><?= $count['jumlahDonatur'];?></h2>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<h3>Program Sukses</h3>
			</div>
			<div class="card-body">
				<h2><?= $count['programSukses'];?></h2>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12 my-5 p-2" id="chart"></div>
</div>

<script type="text/javascript">
	console.log(JSON.parse('<?= $count['chartDonasi']?>'))
	//setting timeZone
      const timezone = new Date().getTimezoneOffset();

      Highcharts.setOptions({
        global: {
          timezoneOffset: timezone,
        }
      })

      //Grafik Antrian
      var chart = Highcharts.stockChart('chart', {
			    rangeSelector: {
			    	buttons: [{
		                type: 'day',
		                count: 3,
		                text: '3d'
		            }, {
		                type: 'week',
		                count: 1,
		                text: '1w'
		            }, {
		                type: 'month',
		                count: 1,
		                text: '1m'
		            }, {
		                type: 'month',
		                count: 6,
		                text: '6m'
		            }, {
		                type: 'year',
		                count: 1,
		                text: '1y'
		            }, {
		                type: 'all',
		                text: 'All'
		            }],
            selected: 1
			    },

			    yAxis: [{
            title: {
              text: 'Jumlah Donasi'
            }
          }],

			    title: {
			        text: 'Data Donasi'
			    },

			    series: [{
			        name: 'Jumlah Donasi',
			        data: JSON.parse('<?= $count['chartDonasi'];?>'),
			    }]
			});
</script>