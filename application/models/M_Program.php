<?php 

class M_Program extends CI_Model {
	public function result($userId, $role) {
		$this->db->join('catalog', 'catalog.slug_catalog = program.slug_catalog');
		if($role == 1) {
			return $this->db->get_where('program')->result_array();
		} else {
			return $this->db->get_where('program', ['user_id' => $userId])->result_array();
		}
	}

	public function resultCatalog() {
		return $this->db->get('catalog')->result_array();
	}

	public function getWhereProgram($id) {
		$this->db->join('catalog', 'catalog.slug_catalog = program.slug_catalog');
		$this->db->join('user', 'user.id_user = program.user_id');
		return $this->db->get_where('program', ['id_program' => $id])->row_array();
	}

	public function tambahProgram($data) {
		$this->db->insert('program', $data);
	}

	public function updateProgram($id, $data) {
		$this->db->where('id_program', $id);
		$this->db->update('program',$data);
	}

	public function deleteProgram($id) {
		$this->db->delete('program',['id_program' => $id]);
	}
}