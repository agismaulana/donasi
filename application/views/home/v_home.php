<div class="container">
	<div class="d-flex justify-content-between mx-5">
		<div class="catalog col-lg-8">
			<div class="box-scroll">
				<div class="scroll">
					<button class="btn-green btn-scroll m-2" onclick="loadContent('<?= base_url('home/program')?>', '<?= base_url()?>')">
						<i class=""></i> All
					</button>
					<?php foreach($catalogs as $catalog) : ?>
						<button class="btn-green btn-scroll m-2" onclick="ajaxCatalog(
							'<?= $catalog['slug_catalog'];?>',
							'<?= base_url('home-catalog')?>',
							'<?= base_url()?>'
						)">
							<i class="fa fa-<?= $catalog['icon']?>"></i> <?= $catalog['nama_catalog']?>	
						</button>
					<?php endforeach;?>
				</div>
			</div>
		</div>
		<div class="search-box mt-3">
			<input type="text" name="search" oninput="search('<?= base_url('home/search')?>', '<?= base_url()?>')" class="search-input" placeholder="Cari Program......">
			<button type="button" class="search-icon btn">
				<i class="fa fa-search"></i>
			</button>
		</div>
	</div>

	<div class="row justify-content-center">
		<div class="row justify-content-center" id="program"></div>	
	</div>

	<div class="text-center mb-3">
		<nav id="page" class="Page Navigation">
			<ul id="pagination" class="pagination"></ul>
		</nav>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		loadContent('<?= base_url('home/program')?>', '<?= base_url()?>');
	})
</script>