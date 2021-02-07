<?php

function is_logged_in() {
	$ci = get_instance();

	if(!$ci->session->userdata('email')) {
		$ci->session->set_flashdata('message', 'message("error", "Anda Belum Login")');
		redirect('login');
	}
}

function is_admin() {
	$ci = get_instance();

	if($ci->session->userdata('role_id') != 1) {
		$ci->session->set_flashdata('message', 'message("error", "Anda Bukan Admin")');
		redirect('home');
	}
}