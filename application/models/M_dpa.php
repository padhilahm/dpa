<?php

class M_dpa extends CI_Model
{
	protected $_table = 'tbl_dpa';

	public function lihat()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function lihat_by_organisasi()
	{
		$this->db->select('*');
		$this->db->from($this->_table);
		$this->db->join('tbl_skpd', 'tbl_skpd.id_skpd = tbl_dpa.organisasi');
		if ($this->session->login['role'] == 'skpd') {
			$organisasi = $this->session->login['kode'];
			$this->db->where('tbl_dpa.organisasi', $organisasi);
		}
		$query = $this->db->get();
		return $query->result();
	}

	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($id)
	{
		$query = $this->db->get_where($this->_table, ['id_dpa' => $id]);
		return $query->row();
	}

	public function tambah($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $id)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['id_dpa' => $id]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($id)
	{
		return $this->db->delete($this->_table, ['id_dpa' => $id]);
	}
}
