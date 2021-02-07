<?php 

class M_Catalog extends CI_Model {

	public function tambah($data) {
		$this->db->insert('catalog', $data);
	}

	public function resultCatalog() {
		return $this->db->get('catalog')->result_array();
	}

	public function getWhereCatalog($id) {
		return $this->db->get_where('catalog', ['id_catalog' => $id])->row_array();
	}

	public function update($data, $id) {
		$this->db->where('id_catalog', $id);
		$this->db->update('catalog', $data);
	}

	public function hapus($id) {
		$this->db->where('id_catalog', $id);
		$this->db->delete('catalog');
	}

}