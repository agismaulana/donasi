<?php 

class Admin extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('M_Admin');
		is_logged_in();
		is_admin();
	}

	public function index() {

		$jumlahProgram 	= $this->M_Admin->jumlahProgram();
		$jumlahDonatur 	= $this->M_Admin->jumlahDonatur();
		$jumlahDonasi 	= $this->M_Admin->jumlahDonasi();
		$programSukses 	= $this->M_Admin->ProgramSukses();
		$chartDonasi 	= $this->M_Admin->chartDonasi();

		$arrayChart = array();
		foreach ($chartDonasi as $chart) {
			$strtotime = strtotime($chart['date']." 00:00:00")*1000;
			$arrayChart[] = array((int)($strtotime), (int)$chart['total']);
		}

		$count = [
			'jumlahProgram' => $jumlahProgram,
			'jumlahDonatur' => $jumlahDonatur,
			'jumlahDonasi'	=> $jumlahDonasi,
			'programSukses' => $programSukses,
			'chartDonasi'	=> json_encode($arrayChart),
		];

		$data = [
			'title' => 'Admin',
			'isi' 	=> 'dashboard/v_wrapper',
			'detail'=> 'admin/v_index',
			'user'	=> $this->data['user'],
			'count' => $count,
		];

		$this->load->view('layout/v_wrapper', $data);
	}
}