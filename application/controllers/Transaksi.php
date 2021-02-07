<?php 


class Transaksi extends CI_Controller {
	public function __construct() {
		parent::__construct();
		is_logged_in();
		is_admin();
		$this->load->model('M_Transaksi');
	}


	public function index() {
		$data = [
			'title' 		=> 'Transaksi',
			'isi' 			=> 'dashboard/v_wrapper',
			'detail'		=> 'transaksi/v_index',
			'transaksis' 	=> $this->M_Transaksi->resultTransaksi(),  
		];

		$this->load->view('layout/v_wrapper', $data);
	}

	public function detail() {
		$idTransaksi = $this->input->post('idDetail');
		$detail = $this->M_Transaksi->whereJoinDetail($idTransaksi);
		echo json_encode($detail);
	}
}