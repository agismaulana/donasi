<?php 

class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		is_logged_in();
		is_admin();
		$this->data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function index() {
		$data = [
			'title' => 'Admin',
			'isi' => 'dashboard/v_wrapper',
			'detail' => 'admin/v_index',
			'user'	=> $this->data['user'],
		];

		$this->load->view('layout/v_wrapper', $data);
	}
}