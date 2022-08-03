<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model {

	function tampil_pengeluaran($tanggal = '')
	{
		$query = $this->db->query("SELECT SUM(harga_masuk * jumlah_masuk) AS omzet
			FROM tbl_detail_masuk JOIN tbl_masuk ON tbl_detail_masuk.`no_masuk` = tbl_masuk.`no_masuk` 
			WHERE tbl_masuk.`tgl_masuk` LIKE '%$tanggal%'");
		return $query->row()->omzet;
	}

	function tampil_uang_keluar($tanggal = '')
	{
		$query = $this->db->query("SELECT SUM(uang_keluar) AS uang_keluar FROM tbl_uang_keluar WHERE tgl_uang_keluar LIKE '%$tanggal%'");
		return $query->row()->uang_keluar;
	}

	function tampil_omzet($tanggal = '')
	{
		$query = $this->db->query("SELECT sum(harga_keluar * jumlah_keluar) as pengeluaran
			from tbl_detail_keluar join tbl_keluar on tbl_detail_keluar.`no_keluar` = tbl_keluar.`no_keluar` 
			where tbl_keluar.`tgl_keluar` LIKE '%$tanggal%'");
		return $query->row()->pengeluaran;
	}
	function tampil_barang_masuk($tanggal = '')
	{
		$query = $this->db->query("SELECT SUM(jumlah_masuk) AS barang_masuk FROM tbl_detail_masuk JOIN tbl_masuk ON tbl_detail_masuk.`no_masuk` = tbl_masuk.`no_masuk` 
			WHERE tbl_masuk.`tgl_masuk` LIKE '%$tanggal%'");
		return $query->row()->barang_masuk;
	}

	function tampil_jumlah_transaksi_keluar($tanggal = '')
	{
		$query = $this->db->query("SELECT count(tbl_keluar.no_keluar) as total_keluar
			from tbl_keluar
			where tbl_keluar.`tgl_keluar` LIKE '%$tanggal%'");
		return $query->row()->total_keluar;
	}

	public function jumlah_karyawan(){
		$jumlah = $this->db->get_where('tbl_toko', ['id_toko' => 2])->row();
		return $jumlah->jumlah_karyawan;
	}

}

/* End of file m_dashboard.php */
/* Location: ./application/models/m_dashboard.php */