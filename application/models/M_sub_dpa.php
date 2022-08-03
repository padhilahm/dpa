<?php

class M_sub_dpa extends CI_Model{
	protected $_table = 'tbl_dpa_sub';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function lihat_by_organisasi(){
		$query = $this->db->select('*');
		$query =$this->db->from($this->_table);
		$this->db->join('tbl_dpa', 'tbl_dpa.id_dpa = tbl_dpa_sub.id_dpa');
		$this->db->join('tbl_skpd', 'tbl_skpd.id_skpd = tbl_dpa.organisasi');
		$query = $this->db->get();
		return $query->result();
	}	

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($id){
		$query = $this->db->get_where($this->_table, ['id_dpa_sub' => $id]);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $id){
		$query = $this->db->set($data);
		$query = $this->db->where(['id_dpa_sub' => $id]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($id){
		return $this->db->delete($this->_table, ['id_dpa_sub' => $id]);
	}
}