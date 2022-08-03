<?php
class M_laporan extends CI_Model
{
	protected $_table = 'tbl_rincian';

	public function lihat()
	{
		$query = $this->db->get($this->_table);
		return $query->result();
	}
	public function lihat_dpa($tahun, $organisasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_dpa AS a JOIN tbl_dpa_sub AS b ON a.id_dpa=b.id_dpa JOIN tbl_skpd AS c ON a.organisasi=c.id_skpd WHERE a.tahun='$tahun' AND a.organisasi='$organisasi'");
		return $query->row();
	}
	public function lihat_sub($id_dpa)
	{
		$query = $this->db->query("SELECT * FROM tbl_dpa_sub a JOIN tbl_dpa AS b ON a.id_dpa=b.id_dpa JOIN tbl_sub_kegiatan AS c ON a.id_sub_kegiatan=c.id_sub_kegiatan WHERE a.id_dpa='$id_dpa'");
		return $query->result();
	}

	public function lihat_sub_rin($tahun)
	{
		$query = $this->db->query("SELECT * FROM tbl_dpa AS a JOIN tbl_dpa_sub AS b ON a.id_dpa=b.id_dpa JOIN tbl_sub_kegiatan AS c ON b.id_sub_kegiatan=b.id_sub_kegiatan WHERE a.tahun='$tahun' GROUP BY a.tahun");
		return $query->result();
	}

	public function lihat_tertinggi($tahun)
	{
		$query = $this->db->query("SELECT nama_skpd, SUM(harga_rincian*koefisien) AS total_dana, sub_kegiatan FROM `tbl_rincian` a JOIN tbl_dpa_sub b ON a.id_dpa_sub=b.id_dpa_sub JOIN tbl_dpa c ON b.id_dpa=c.id_dpa JOIN tbl_skpd d ON c.organisasi=d.id_skpd JOIN tbl_sub_kegiatan e ON b.id_sub_kegiatan=e.id_sub_kegiatan WHERE c.tahun='$tahun' GROUP BY d.nama_skpd ORDER BY total_dana DESC LIMIT 3");
		return $query->result();
	}

	public function lihat_terkecil($tahun)
	{
		$query = $this->db->query("SELECT nama_skpd, SUM(harga_rincian*koefisien) AS total_dana, sub_kegiatan FROM `tbl_rincian` a JOIN tbl_dpa_sub b ON a.id_dpa_sub=b.id_dpa_sub JOIN tbl_dpa c ON b.id_dpa=c.id_dpa JOIN tbl_skpd d ON c.organisasi=d.id_skpd JOIN tbl_sub_kegiatan e ON b.id_sub_kegiatan=e.id_sub_kegiatan WHERE c.tahun='$tahun' GROUP BY d.nama_skpd ORDER BY total_dana ASC LIMIT 3");
		return $query->result();
	}

	public function rekap_skpd($tahun)
	{
		$query = $this->db->query("SELECT nama_skpd FROM tbl_dpa a JOIN tbl_skpd b ON a.organisasi=b.id_skpd WHERE a.tahun='$tahun' ORDER BY b.nama_skpd");
		return $query->result();
	}

	public function lihat_sub_rinci($id)
	{
		$query = $this->db->query("SELECT * FROM tbl_dpa_sub AS a JOIN tbl_sub_kegiatan AS b ON a.id_sub_kegiatan=b.id_sub_kegiatan WHERE a.id_dpa_sub='$id'");
		return $query->row();
	}

	public function lihat_rinci()
	{
		$query = $this->db->query("SELECT * FROM tbl_rincian AS a JOIN tbl_uraian AS b ON a.id_uraian=b.id_uraian");
		return $query->result();
	}

	public function lihat_tarik($id_dpa)
	{
		$query = $this->db->query("SELECT * FROM tbl_penarikan_dana a JOIN tbl_dpa b on a.id_dpa=b.id_dpa WHERE b.id_dpa='$id_dpa'");
		return $query->result();
	}

	public function lihat_tarik_row($tahun, $organisasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_penarikan_dana a JOIN tbl_dpa b on a.id_dpa=b.id_dpa WHERE b.tahun='$tahun' AND b.organisasi='$organisasi'");
		return $query->row();
	}

	public function lihat_terbesar()
	{
		$query = $this->db->query("SELECT sum(jumlah_penarikan) total, b.tahun FROM tbl_penarikan_dana a JOIN tbl_dpa b on a.id_dpa=b.id_dpa GROUP BY b.tahun ORDER BY total DESC");
		return $query->result();
	}

	public function lihat_tarik_bulan($bulan, $tahun, $organisasi)
	{
		$query = $this->db->query("SELECT * FROM tbl_penarikan_dana a join tbl_dpa b on a.id_dpa=b.id_dpa WHERE a.bulan_penarikan='$bulan' AND b.tahun='$tahun' AND b.organisasi='$organisasi'");
		return $query->result();
	}

	public function jumlah()
	{
		$query = $this->db->get($this->_table);
		return $query->num_rows();
	}

	public function lihat_id($id)
	{
		$query = $this->db->get_where($this->_table, ['id_rincian' => $id]);
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