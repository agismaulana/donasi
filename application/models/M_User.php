<?php 

class M_User extends CI_Model {

	public function getUsers() {
		$this->db->join('role', 'role.id_role = user.role_id');
		$this->db->where('role_id !=', '1');
		return $this->db->get('user')->result_array();
	}

	public function getWhereUser($id) {
		$this->db->join('role', 'role.id_role = user.role_id');
		return $this->db->get_where('user', ['id_user' => $id])->row_array();
	}

	public function editUser($data){
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}

	public function hapusUser($id){
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}
}