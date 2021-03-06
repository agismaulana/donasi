function message(icon, title) {
	var message = Swal.fire({
		position: 'top-end',
		icon: icon,
		title: title,
		showConfirmButton: false,
		timer: 1500,
	})
}


function loadContent(url, baseURL){
	let load = $.ajax({
		url: url,
		method: 'POST',
		dataType: "json",
		success: function(data){
			var html = '';
			$.each(data, function(key, value){
				let today = new Date().getTime();
				let targetTime = new Date(value.waktu_berakhir).getTime();

				let time = Math.ceil(parseInt((targetTime - today) / 86400) / 1000);

				if(time > 0) {
					time = time;
				} else {
					time = 0;
				}

				let persenProgress = (value.jumlahDonasi/value.target) * 100;

				html += `<div class="card-program">
							<img src='${baseURL}/asset/image/imageProgram/${value.image_program}'>
							<div class="card-body">
								<h5 class="text-dark">
									${value.nama_program.substr(0,20)+['...']}
								</h5>
								<div class="progress">
									<div class="progress-bar" style="width: ${persenProgress}%;background: #148F77;"></div>
								</div>
								<div class="d-flex justify-content-between text-dark mt-2">
									<p>Rp. ${value.target}</p>
									<p>
										 ${time} Hari Lagi
									</p>
								</div>
							</div>
							<div class="card-footer">
								<a href="${baseURL}home-donasi/${value.slug_program}" class="btn-green btn-block">Donasi Sekarang</a>
							</div>
						</div>`
			});
			
			$('#program-home').html(html);

			//pagination 
			pagination();
		}
	});

	return load;
}

function ajaxCatalog(slugCatalog, url, baseURL) {
	let catalog = $.ajax({
		url: url,
		method: 'POST',
		data: {'slugCatalog': slugCatalog},
		dataType: 'json',
		success: function(data){
			var html = '';
			$.each(data, function(key, value){
				let today = new Date().getTime();
				let targetTime = new Date(value.waktu_berakhir).getTime();

				let time = Math.ceil(parseInt((targetTime - today) / 86400) / 1000);

				if(time > 0) {
					time = time;
				} else {
					time = 0;
				}

				let persenProgress = (value.jumlahDonasi/value.target) * 100;

				html += `<div class="card-program">
							<img src='${baseURL}/asset/image/imageProgram/${value.image_program}'>
							<div class="card-body">
								<h5 class="text-dark">
									${value.nama_program.substr(0,20)+['...']}
								</h5>
								<div class="progress">
									<div class="progress-bar" style="width: ${persenProgress}%;background: #148F77;"></div>
								</div>
								<div class="d-flex justify-content-between text-dark mt-2">
									<p>Rp. ${value.target}</p>
									<p>
										 ${time} Hari Lagi
									</p>
								</div>
							</div>
							<div class="card-footer">
								<a href="${baseURL}home-donasi/${value.slug_program}" class="btn-green btn-block">Donasi Sekarang</a>
							</div>
						</div>`
			});
			$('#program-home').html(html);
			// pagination
			pagination();
		}
	});

	return catalog;
}

function search(url,baseURL) {
	let key = $('.search-input').val();

	$.ajax({
		url: url,
		method: 'POST',
		data: {'keyword': key},
		dataType: 'json',
		success: function(data) {
			var html = '';
			$.each(data, function(key, value){
				let today = new Date().getTime();
				let targetTime = new Date(value.waktu_berakhir).getTime();

				let time = Math.ceil(parseInt((targetTime - today) / 86400) / 1000);

				if(time > 0) {
					time = time;
				} else {
					time = 0;
				}

				let persenProgress = (value.jumlahDonasi/value.target) * 100;

				html += `<div class="card-program">
							<img src='${baseURL}/asset/image/imageProgram/${value.image_program}'>
							<div class="card-body">
								<h5 class="text-dark">
									${value.nama_program.substr(0,20)+['...']}
								</h5>
								<div class="progress">
									<div class="progress-bar" style="width: ${persenProgress}%;background: #148F77;"></div>
								</div>
								<div class="d-flex justify-content-between text-dark mt-2">
									<p>Rp. ${value.target}</p>
									<p>
										 ${time} Hari Lagi
									</p>
								</div>
							</div>
							<div class="card-footer">
								<a href="${baseURL}home-donasi/${value.slug_program}" class="btn-green btn-block">Donasi Sekarang</a>
							</div>
						</div>`
			});
			$('#program-home').html(html);	
			// pagination
			pagination();
		}
	});
}


function days_passed(dt) {
  var current = new Date(dt.getTime());
  var previous = new Date(dt.getFullYear(), 0, 1);

  return Math.ceil((current - previous + 1) / 86400000);
}

function pagination() {
	let items = $('.card-program');
	let numItems = items.length;
	let perPage = 6;

	items.slice(perPage).hide();

	if(numItems != 0) {
		$('#pagination-container').pagination({
			items: numItems,
			itemsOnPage: perPage,
			prevText: '<',
			nextText: '>',
			onPageClick: function(pageNumber) {
				var showFrom = perPage * (pageNumber - 1);
				var showTo = showFrom + perPage;
				items.hide().slice(showFrom, showTo).show(); 
			}
		})	
	}
}