<?php

class M_rincian extends CI_Model
{
	protected $_table = 'tbl_rincian';


	public function lihat()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}

	public function lihat_rinci()
	{

		$query = $this->db->select('*');
		$query = $this->db->from($this->_table);
		$this->db->join('tbl_dpa_sub', 'tbl_rincian.id_dpa_sub = tbl_dpa_sub.id_dpa_sub');
		$this->db->join('tbl_sub_kegiatan', 'tbl_dpa_sub.id_sub_kegiatan = tbl_sub_kegiatan.id_sub_kegiatan');
		$this->db->join('tbl_uraian', 'tbl_rincian.id_uraian = tbl_uraian.id_uraian');
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
		$query = $this->db->select('*');
		$query = $this->db->from($this->_table);
		$this->db->join('tbl_dpa_sub', 'tbl_rincian.id_dpa_sub = tbl_dpa_sub.id_dpa_sub');
		$this->db->join('tbl_sub_kegiatan', 'tbl_dpa_sub.id_sub_kegiatan = tbl_sub_kegiatan.id_sub_kegiatan');
		$this->db->where(['id_rincian' => $id]);
		$query = $this->db->get();
		return $query->row();
	}

	public function tambah($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function ubah($data, $id)
	{
		$query = $this->db->set($data);
		$query = $this->db->where(['id_rincian' => $id]);
		$query = $this->db->update($this->_table);
		return $query;
	}

	public function hapus($id)
	{
		return $this->db->delete($this->_table, ['id_rincian' => $id]);
	}
}