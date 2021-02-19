<?php 

class M_Admin extends CI_Model {
	
	public function jumlahProgram() {
		return count($this->db->get('program')->result_array());
	}

	public function jumlahDonatur() {
		$this->db->join('detail', 'detail.id_detail = transaksi.detail_id');
		return count($this->db->get_where('transaksi', ['status_code' => 200])->result_array());
	}

	public function jumlahDonasi() {
		$this->db->select_sum('nominal');
		$this->db->join('detail', 'detail.id_detail = transaksi.detail_id');
		return $this->db->get_where('transaksi',['status_code' => 200])->row_array();
	}

	public function ProgramSukses() {
		$query = $this->db->query('select nama_program,(target - jumlahDonasi) as total from program join (select sum(nominal) as jumlahDonasi, program_id, detail_id from transaksi join detail on detail.id_detail = transaksi.detail_id where status_code = 200 GROUP BY program_id) b on b.program_id = program.id_program where (target - jumlahDonasi) = 0')->result_array();
		return count($query);
	}

	public function chartDonasi() {
		$query = $this->db->query('select CAST(transaction_time AS date) date, count(id_detail) as total from detail WHERE status_code = 200 GROUP BY date')->result_array();
		return $query;
	}

}