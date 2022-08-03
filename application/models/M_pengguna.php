<?php

class M_pengguna extends CI_Model{
	protected $_table = 'tbl_pengguna';


	public function lihat_username($user, $pass){
		$query = $this->db->query("SELECT * FROM tbl_pengguna WHERE username = '$user' AND password = '$pass'");
		return $query->row();
	}

	public function cek_username($user){
		$query = $this->db->query("SELECT * FROM tbl_pengguna WHERE username = '$user'");
		return $query->row();
	}


	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function jumlah(){
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($id){
		$query = $this->db->get_where($this->_table, ['id_pengguna' => $id]);
		return $query->row();
	}


	public function tambah($data){
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $id){
		$query = $this->db->set($data);
		$query = $this->db->where(['id_pengguna' => $id]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($id){
		return $this->db->delete($this->_table, ['id_pengguna' => $id]);
	}
}