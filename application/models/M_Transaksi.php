<?php 

class M_Transaksi extends CI_Model {
	public function resultTransaksi() {
		$this->db->join('program', 'program.id_program = transaksi.program_id');
		return $this->db->get('transaksi')->result_array();
	}

	public function whereJoinDetail($idTransaksi) {
		$this->db->join('program', 'program.id_program = transaksi.program_id');
		$this->db->join('detail', 'detail.id_detail = transaksi.detail_id');
		return $this->db->get_where('transaksi', ['id_transaksi' => $idTransaksi])->row_array();
	}
}