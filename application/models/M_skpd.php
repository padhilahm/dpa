<?php

class M_skpd extends CI_Model
{
	protected $_table = 'tbl_skpd';

	public function lihat()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function lihat_username($user, $pass)
	{
		$this->db->from($this->_table)
			->where('username', $user)
			->where('password', $pass);
		$query = $this->db->get();
		return $query->row();
	}

	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($id)
	{
		$query = $this->db->get_where($this->_table, ['id_skpd' => $id]);
		return $query->row();
	}

	public function tambah($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $id)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['id_skpd' => $id]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($id)
	{
		return $this->db->delete($this->_table, ['id_skpd' => $id]);
	}
}
