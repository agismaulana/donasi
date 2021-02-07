<?php 

/**
 * 
 */
class User extends CI_Controller {

	public function __construct() {
		parent::__construct();
		is_logged_in();
		$this->load->model('M_User');
		$this->data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}

	public function index() {
		$data = [
			'title' => 'Data User',
			'isi' => 'dashboard/v_wrapper',
			'detail' => 'user/v_index',
			'users' => $this->M_User->getUsers(),
			'user' => $this->data['user'],
		];

		$this->load->view('layout/v_wrapper', $data);
	}

	public function detailUser($id) {
		$data = [
			'title' => 'Detail User',
			'isi' => 'dashboard/v_wrapper',
			'detail' => 'user/v_detail',
			'users' => $this->M_User->getWhereUser($id),
			'user' => $this->data['user'],
		];

		$this->load->view('layout/v_wrapper', $data);
	}

	public function detail() {
		$id = $this->input->post('idUser');
		$user = $this->M_User->getWhereUser($id);
		echo json_encode($user);

	}

	public function hapusUser() {
		$id = $this->input->post('idUser');
		$this->M_User->hapusUser($id);
		redirect('catalog');
	}
}