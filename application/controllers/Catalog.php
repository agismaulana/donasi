<?php 

class Catalog extends CI_Controller {
	public function __construct() {
		parent::__construct();
		is_logged_in();
		is_admin();
		$this->load->model('M_Catalog');
		$this->data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
	}

	public function index() {
		$data = [
			'title' => 'catalog',
			'isi'	=> 'dashboard/v_wrapper',
			'detail' => 'catalog/v_index',
			'catalogs' => $this->M_Catalog->resultCatalog(),
			'user' => $this->data['user'],
		];

		$this->load->view('layout/v_wrapper', $data);
	}

	public function tambahCatalog() {
		$nama = $this->input->post('nama');
		$icon = $this->input->post('icon');
		$data = [
					'nama_catalog' => $nama,
					'icon' => $icon,
					'slug_catalog' => str_replace(' ', '-', $nama),
				];
		$this->M_Catalog->tambah($data);
		$this->session->set_flashdata('message', 'message("success", "Data Berhasil Ditambahkan")');
		redirect('catalog');
	}

	public function editCatalog() {
		$id = $this->input->post('idCatalog');		
		$catalog = $this->M_Catalog->getWhereCatalog($id);
		echo json_encode($catalog);
	}

	public function updateCatalog() {
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$icon = $this->input->post('icon');

		$data = [
					'nama_catalog' => $nama,
					'icon' => $icon,
					'slug_catalog' => str_replace(' ', '-', $nama),
				];

		$this->M_Catalog->update($data, $id);
		$this->session->set_flashdata('message', 'message("success", "Data Berhasil Diedit")');
		redirect('catalog');
	}

	public function hapusCatalog() {
		$id = $this->input->post('idCatalog');
		$this->M_Catalog->hapus($id);
		$this->session->set_flashdata('message', 'message("success", "Data Berhasil Dihapus")');
		redirect('catalog');
	}
}