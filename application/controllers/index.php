<?php

class Index extends CI_Controller {
	public function index(){

		$data = [
			'isi' => 'index'
		];

		$this->load->view('layout/v_wrapper', $data);
	}
}

?>