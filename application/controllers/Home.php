<?php 

use PHPMailer\PHPMailer\PHPMailer;
require FCPATH.'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require FCPATH.'vendor/phpmailer/phpmailer/src/SMTP.php';
require FCPATH.'vendor/phpmailer/phpmailer/src/Exception.php';

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

	public function checkout($id) {
		$id = $id;

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
		];

		$this->load->view('layout/v_wrapper', $data);
	}

	public function feedback() {
		$nama = $this->input->post('nama');
		$email = $this->input->post('email');
		$feedback = $this->input->post('feedback');

		$mail = New PHPMailer(true);
        //server settings                      
        $mail->isSMTP();
        $mail->SMTPAuth     = true;                                            
        $mail->Host         = 'tls://smtp.gmail.com';
        $mail->Username     = 'Agismaulana112@gmail.com';
        $mail->Password     = 'resti123';                                                   
        $mail->SMTPSecure   = 'ssl';         
        $mail->Port         = 587;  

        //recipients
        $mail->setFrom($email, $nama);
        $mail->addReplyTo('Agismaulana112@gmail.com', 'Sender');
        $mail->addAddress('Agismaulana112@gmail.com');

        //content 
        $mail->isHTML(true);
        $mail->Subject      = 'Feedback';
        $mail->Body         = $this->emailTemplate($feedback);
        $mail->AltBody      = '';

        if($mail->send()) {
        	redirect('home');
        } else {
        	redirect('home');
        }
	}

	public function emailTemplate($feedback) {
		$html = '<!DOCTYPE html>
					<html>
					<head>
						<title>Feedback</title>
					</head>
					<body>

						<style type="text/css">
							* {
								margin: 0;
								padding: 0;	
							}

							body {
								background: linear-gradient(to right, #148F77, #145F77);
								overflow: hidden;
							}

							.box-feedback {
								padding: 20px;
								margin: 50px auto;
								width: 50%;
								height: 60vh;
								background: white;
							}

							.box-feedback p {
								background: #fff;
								box-shadow: inset 5px 5px 6px #d2d2d2,
								            inset -5px -5px 6px #d2d2d2;
								padding: 20px;
								height: 50%;
								font-weight: 800;
								font-size: 18px;
								color: black;
								border-radius: 5px;
							} .message {
								font-weight: 600;
								margin: 50px 0;
							}

						</style>

						<div class="box-feedback">
							<header>
								<h1 style="text-align: center;"><b>SAPA</b> <b style="color: #148F77;">TASIKMALAYA</b></h1>
							</header>

							<h2>Your Feedback : </h2>
							<p>'.$feedback.'</p>

							<div class="message">
								<h4>Thank about Your Feedback</h4>
							</div>
						</div>

					</body>
					</html>';
		return $html;
	}
}