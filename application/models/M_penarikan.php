<?php

class M_penarikan extends CI_Model{
	protected $_table = 'tbl_penarikan_dana';

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function lihat_tarik(){
		$query = $this->db->query("SELECT * FROM tbl_penarikan_dana AS a JOIN tbl_dpa AS b ON a.id_dpa=b.id_dpa");
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($id){
		$query = $this->db->get_where($this->_table, ['id_penarikan' => $id]);
		return $query->row();
	}

	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $id){
		$query = $this->db->set($data);
		$query = $this->db->where(['id_penarikan' => $id]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($id){
		return $this->db->delete($this->_table, ['id_penarikan' => $id]);
	}
}