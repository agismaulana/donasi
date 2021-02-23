<?php 

class M_Home extends CI_Model {
	public function resultProgram() {
		$query = '
			select * from program left join(select sum(nominal) as jumlahDonasi, program_id from transaksi GROUP by program_id) a on program.id_program = a.program_id
		ORDER BY rand()';
		return $this->db->query($query)->result_array();
	}

	public function getWhereProgram($id) {
		$this->db->join('catalog', 'catalog.slug_catalog = program.slug_catalog');
		$this->db->join('user', 'user.id_user = program.user_id');
		return $this->db->get_where('program', ['slug_program' => $id])->row_array();
	}

	public function jumlahProgram($id) {
		if($id != '') {
			return count($this->db->get_where('program', ['slug_catalog' => $id])->result_array());
		} else {
			return count($this->db->get('program')->result_array());
		}
	}

	public function resultCatalog() {
		return $this->db->get('catalog')->result_array();
	}

	public function getSearchProgram($key) {
		$this->db->like('nama_program', $key);
		$this->db->or_like('slug_catalog', $key);
		$this->db->or_like('target', $key);

		$query = "select * from program left join(select sum(nominal) as jumlahDonasi, program_id from transaksi GROUP by program_id) a on program.id_program = a.program_id where nama_program like '%".$key."%' or slug_catalog like '%".$key."%' or target like '%".$key."%'";
		return $this->db->query($query)->result_array();
	}

	public function whereProgramCatalog($slug) {
		$query = "
			select * from program left join(select sum(nominal) as jumlahDonasi, program_id from transaksi GROUP by program_id) a on program.id_program = a.program_id where slug_catalog = '".$slug."'
		";
		return $this->db->query($query)->result_array();
	}

	public function whereTransaksi($idProgram) {
		$this->db->join('detail', 'detail.id_detail = transaksi.detail_id');
		$this->db->order_by('detail.transaction_time', 'DESC');
		return $this->db->get_where('transaksi', ['program_id' => $idProgram, 'status_code' => 200])->result_array();
	}

	public function jumlahNominal($idProgram) {
		$this->db->select_sum('nominal');
		$this->db->join('detail','detail.id_detail = transaksi.detail_id');
		return $this->db->get_where('transaksi', ['program_id' => $idProgram, 'status_code' => 200])->row_array();
	}

}