<?php 

class M_Auth extends CI_Model {
	public function register($data) {
		$this->db->insert('user', $data);
	}

	public function user($email) {
		return $this->db->get_where('user', ['email' => $email])->row_array();
	}
}