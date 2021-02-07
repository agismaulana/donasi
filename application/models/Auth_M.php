<?php 

class Auth_M extends CI_Model {

	public function user($username) {
		return $this->db->get_where('user', ['email' => $username])->row_array();
	}

}

?>