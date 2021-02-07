<?php 


class Program extends CI_Controller {

	public function __construct(){
		parent::__construct();
		is_logged_in();
		$this->data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$this->load->model('M_Program');
	}

	public function index() {
		$data = [
			'title' => 'Galang',
			'isi' => 'dashboard/v_wrapper',
			'detail' => 'program/v_index',
			'user' => $this->data['user'],
			'programs' => $this->M_Program->result(),
			'catalogs' => $this->M_Program->resultCatalog(),
		];

		$this->load->view('layout/v_wrapper', $data);
	}

	public function tambahProgram() {
		$config['upload_path']          = FCPATH.'asset/image/imageProgram';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name']			= date('Ymd').uniqid();

        $this->load->library('upload',$config);

		$nama = $this->input->post('nama');
		$image = $_FILES['imageProgram'];
		$catalogId = $this->input->post('catalog');
		$tanggal = $this->input->post('tanggal');
		$target = $this->input->post('target');
		$user = $this->data['user']['id_user'];
		$deskripsi = $this->input->post('deskripsi');
		$arrayImage = explode('.',$image['name']);
		$typeImage = end($arrayImage);

		if($image['name'] != ""){
			$imageName = $config['file_name'].'.'.$typeImage;

			$this->upload->do_upload('imageProgram');
			$this->upload->data();
		} else {
			$imageName = '';
		}

		$data = [
			'nama_program' => $nama,
			'slug_program' => str_replace(' ', '-', $nama),
			'image_program' => $imageName,
			'slug_catalog' => $catalogId,
			'waktu_berakhir' => $tanggal,
			'target' => $target,
			'user_id' => $user,
			'deskripsi' => $deskripsi,
		];

		$this->M_Program->tambahProgram($data);
		$this->session->set_flashdata('message','message("success","Berhasil Menambahkan Data")');
		redirect('program');
	}

	public function detailProgram() {
		$id = $this->input->post('idProgram');
		$programs = $this->M_Program->getWhereProgram($id);
		echo json_encode($programs);
	}

	public function updateProgram() {
		$config['upload_path']          = FCPATH.'asset/image/imageProgram';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['file_name']			= date('Ymd').uniqid();

        $this->load->library('upload',$config);

        $id = $this->input->post('idProgram');
		$nama = $this->input->post('nama');
		$image = $_FILES['imageEdit'];
		$catalogId = $this->input->post('catalog');
		$tanggal = $this->input->post('tanggal');
		$target = $this->input->post('target');
		$user = $this->data['user']['id_user'];
		$deskripsi = $this->input->post('deskripsi');
		$arrayImage = explode('.',$image['name']);
		$typeImage = end($arrayImage);

		$program = $this->db->get_where('program',['id_program' => $id])->row_array();

		if($image['name'] != ""){
			unlink(FCPATH.'asset/image/imageProgram/'.$program['image_program']);
			$imageName = $config['file_name'].'.'.$typeImage;
			$this->upload->do_upload('imageEdit');
			$this->upload->data();
		} else {
			$imageName = $program['image_program'];
		}

		$data = [
			'nama_program' => $nama,
			'image_program' => $imageName,
			'slug_catalog' => $catalogId,
			'waktu_berakhir' => $tanggal,
			'target' => $target,
			'user_id' => $user,
			'deskripsi' => $deskripsi,
		];

		$this->M_Program->updateProgram($id,$data);
		$this->session->set_flashdata('message','message("success","Berhasil Merubah Data")');
		redirect('program');
	}

	public function deleteProgram() {
		$id = $this->input->post('idProgram');
		$this->M_Program->deleteProgram($id);
		redirect('program');
	}
}