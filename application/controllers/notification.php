<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Notification extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'your_server_key', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		
    }

	public function index()
	{
		echo 'test notification handler';
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result,"true");

		$id_detail = $result['transaction_id'];

		if($result['status_code'] == 200) {
			$this->db->where('id_detail', $id_detail);
			$this->db->update('detail', ['status_code' => $result['status_code']]);
		}

		error_log(print_r($result,TRUE));
	}

	public function finish() {
		
	}
}
