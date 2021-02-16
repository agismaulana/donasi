<?php 

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if($this->session->userdata('email')) {
			$this->data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		}

		$this->load->model('M_Home');
	}

	public function index() {
		
		if($this->session->userdata('email')){
			$user = $this->data['user'];
		} else {
			$user = '';
		}

		$data = [
			'title' => 'Home',
			'isi' => 'home/v_index',
			'detail' => 'home/v_home',
			'user' => $user,
			// 'programsCepat' => $this->M_Home->resultProgramCepat(),
			'catalogs' => $this->M_Home->resultCatalog(),
		];

		$this->load->view('layout/v_wrapper.php', $data);
	}

	public function program() {
		$program = $this->M_Home->resultProgram();
		echo json_encode($program);
	}

	public function catalog() {
		$slug = $this->input->post('slugCatalog');
		$program = $this->M_Home->whereProgramCatalog($slug);
		echo json_encode($program);
	}

	public function search() {
		$key = $this->input->post('keyword');
		$program = $this->M_Home->getSearchProgram($key);
		echo json_encode($program);
	}

	public function donasi($id) {
		
		if($this->session->userdata('email')) {
			$user = $this->data['user'];
		} else {
			$user = '';
		}

		$detailProgram = $this->M_Home->getWhereProgram($id);

		$donatur = $this->M_Home->whereTransaksi($detailProgram['id_program']);
	
		$jumlahNominal = $this->M_Home->jumlahNominal($detailProgram['id_program']);

		$data = [
			'title' 		=> 'Detail Donasi',
			'isi' 			=> 'home/v_donasi',
			'user' 			=> $user,
			'programDetail' => $detailProgram,
			'donaturs' 		=> $donatur,
			'countDonatur' 	=> count($donatur),
			'jumlahNominal' => $jumlahNominal,
			'progress'		=> ($jumlahNominal['nominal'] / $detailProgram['target']) * 100,
		];

		$this->load->view('layout/v_wrapper', $data);
	}

	public function transaksi($id) {
		if($this->session->userdata('email')) {
			$user = $this->data['user'];
		} else {
			$user = '';
		}

		$data = [
			'title' => 'Transaksi Donasi',
			'isi' => 'home/v_transaksi',
			'user' => $user,
			'programDetail' => $this->M_Home->getWhereProgram($id), 
		];

		$this->load->view('layout/v_wrapper', $data);
	}

	public function checkout() {
		$id = $this->input->post('program_id');
		$nominal = $this->input->post('nominal');	

		if($this->session->userdata('email')) {
			$user = $this->data['user'];
		} else {
			$user = '';
		}

		if($id == null && $nominal == null) {
			redirect('home');
		}

		$data = [
			'title' => 'Transaksi Donasi',
			'isi' => 'home/v_checkout',
			'user' => $user,
			'programId' => $id,
			'nominal' => $nominal,
		];

		$this->load->view('layout/v_wrapper', $data);
	}
}