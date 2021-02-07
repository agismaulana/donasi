<div class="main-wrap">
	<?php 
		require 'v_sidebar.php';
	?>
	<div class="content-admin">
		<div class="bg-white p-3">
			<a href="<?= base_url()?>" class="brand">SAPA TASIKMALAYA</a>
		</div>
		<div class="container my-3">
			<h2><?= $title;?></h2>
			<?php 
				if($detail) {
					$this->load->view($detail);
				}
			?>
		</div>
		<?php require 'v_footer.php';?>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#dataTables').DataTable();
	})

	<?php if($this->session->flashdata('message')) : ?>
		<?= $this->session->flashdata('message');?>;
		setInterval(function(){
			<?= $this->session->unset_userdata('message')?>
		}, 3000);
	<?php endif;?>

	function message(icon, title) {
		var message = Swal.fire({
			position: 'top-end',
			icon: icon,
			title: title,
			showConfirmButton: false,
			timer:1500,
		});

		return message
	}
</script>