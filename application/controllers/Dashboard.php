<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'pimpinan' && $this->session->login['role'] != 'admin') redirect();

		$this->load->model('M_pengguna', 'm_pengguna');
		$this->load->model('M_dashboard', 'm_dashboard');
		$this->load->helper('fungsi');
	}


	public function index()
	{
		$this->data['aktif'] = 'dashboard';
		$this->data['title'] = 'Halaman Dashboard';

		// $this->data['pengeluaran'] = $this->m_dashboard->tampil_pengeluaran(date('Y-m-d')) + $this->m_dashboard->tampil_uang_keluar(date('Y-m-d'));

		// $this->data['omzet'] = $this->m_dashboard->tampil_omzet(date('Y-m-d'));

		// $this->data['profit'] = $this->data['omzet'] - $this->data['pengeluaran'];

		// $this->data['barang_masuk'] = $this->m_dashboard->tampil_barang_masuk(date('Y-m-d'));

		// $this->data['jumlah_karyawan'] = $this->m_dashboard->jumlah_karyawan();
		// $this->data['transaksi_keluar'] = $this->m_dashboard->tampil_jumlah_transaksi_keluar(date('Y-m-d'));
		$this->load->view('v_dashboard_bos', $this->data);
	}
}