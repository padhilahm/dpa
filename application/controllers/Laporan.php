<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'pimpinan' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'laporan';
		$this->load->model('M_laporan', 'm_laporan');
		$this->load->helper('fungsi');
	}

	public function index()
	{
		$this->load->model('M_skpd', 'm_skpd');
		$this->data['aktif'] = 'lap_dpa';

		$this->data['all_skpd'] = $this->m_skpd->lihat();
		$this->data['title'] = 'Data Laporan DPA';
		$this->load->view('laporan/v_lihat', $this->data);
	}

	public function lihat_ringkasan()
	{
		$this->load->model('M_skpd', 'm_skpd');
		$this->data['aktif'] = 'lap_ringkasan';
		$this->data['all_skpd'] = $this->m_skpd->lihat();
		$this->data['title'] = 'Data Laporan Ringkasan DPA';
		$this->load->view('laporan/v_lihat_ringkasan', $this->data);
	}

	public function lihat_tarik()
	{
		$this->load->model('M_skpd', 'm_skpd');
		$this->data['title'] = 'Laporan Data Penarikan Dana';
		$this->data['aktif'] = 'lap_tarik';
		$this->data['all_skpd'] = $this->m_skpd->lihat();
		$this->load->view('laporan/v_lihat_tarik', $this->data);
	}

	public function lihat_skpd()
	{
		$this->data['title'] = 'Laporan SKPD yang Terdaftar Pertahun';
		$this->data['aktif'] = 'lap_skpd';
		$this->load->view('laporan/v_lihat_skpd', $this->data);
	}

	public function lihat_tarik_bulan()
	{
		$this->load->model('M_skpd', 'm_skpd');
		$this->data['title'] = 'Laporan Data Penarikan Dana';
		$this->data['aktif'] = 'lap_tarik_bulan';
		$this->data['all_skpd'] = $this->m_skpd->lihat();
		$this->load->view('laporan/v_lihat_tarik_bulan', $this->data);
	}

	public function lihat_dana_terbesar()
	{
		$this->load->model('M_skpd', 'm_skpd');
		$this->data['title'] = 'Laporan Dana DPA Terbesar';
		$this->data['aktif'] = 'dana_terbesar';
		$this->data['all_skpd'] = $this->m_skpd->lihat();
		$this->load->view('laporan/v_lihat_dana_terbesar', $this->data);
	}

	public function lihat_dana_terkecil()
	{
		$this->load->model('M_skpd', 'm_skpd');
		$this->data['title'] = 'Laporan Dana DPA Terkecil';
		$this->data['aktif'] = 'dana_terkecil';
		$this->data['all_skpd'] = $this->m_skpd->lihat();
		$this->load->view('laporan/v_lihat_dana_terkecil', $this->data);
	}

	public function cetak_tarik()
	{
		$this->data['title'] = 'Laporan Data Penarikan Dana';
		$this->data['tahun'] = $this->input->get('tahun');
		$tahun = $this->input->get('tahun');
		$organisasi = $this->input->get('organisasi');
		$this->data['dpa'] = $this->m_laporan->lihat_tarik_row($tahun, $organisasi);
		$id_dpa = $this->data['dpa']->id_dpa;
		$this->data['dpa_sub'] = $this->m_laporan->lihat_tarik($id_dpa);
		$this->load->view('laporan/v_report_tarik', $this->data);
	}

	public function cetak_tarik_bulan()
	{
		$this->data['title'] = 'Laporan Data Penarikan Dana';
		$this->data['tahun'] = $this->input->get('tahun');
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');
		$organisasi = $this->input->get('organisasi');
		$this->data['dpa_sub'] = $this->m_laporan->lihat_tarik_bulan($bulan, $tahun, $organisasi);
		$this->load->view('laporan/v_report_tarik_bulan', $this->data);
	}

	public function cetak_dpa()
	{
		$tahun = $this->input->get('tahun');
		$organisasi = $this->input->get('organisasi');
		$this->data['dpa_tahun'] = $this->m_laporan->lihat_dpa($tahun, $organisasi);
		$id_dpa = $this->data['dpa_tahun']->id_dpa;

		$this->data['title'] = 'Laporan Data DPA Pertahun';
		$this->data['dpa_sub'] = $this->m_laporan->lihat_sub($id_dpa);
		$this->data['id_sub'] = $this->data['dpa_tahun']->id_dpa_sub;
		$this->load->view('laporan/v_report_dpa', $this->data);
	}

	public function cetak_ringkasan()
	{
		$tahun = $this->input->get('tahun');
		$organisasi = $this->input->get('organisasi');
		$this->data['dpa_tahun'] = $this->m_laporan->lihat_dpa($tahun, $organisasi);
		$id_dpa = $this->data['dpa_tahun']->id_dpa;

		$this->data['title'] = 'Laporan Data DPA Pertahun';
		$this->data['dpa_sub'] = $this->m_laporan->lihat_sub($id_dpa);
		$this->data['id_sub'] = $this->data['dpa_tahun']->id_dpa_sub;
		$this->load->view('laporan/v_report_ringkasan', $this->data);
	}



	public function cetak_terbesar()
	{
		$this->data['aktif'] = 'cetak_terbesar';
		$this->data['tarik_terbesar'] = $this->m_laporan->lihat_terbesar();
		$this->data['title'] = 'Laporan Data Penarikan Terbesar';
		$this->load->view('laporan/v_report_tarik_terbesar', $this->data);
	}
	public function cetak_dana_terbesar()
	{
		$tahun = $this->input->get('tahun');
		$this->data['dpa_tertinggi'] = $this->m_laporan->lihat_tertinggi($tahun);
		$this->data['title'] = 'Laporan Data DPA Pertahun';
		$this->load->view('laporan/v_report_dana_terbesar', $this->data);
	}

	public function cetak_dana_terkecil()
	{
		$tahun = $this->input->get('tahun');
		$this->data['dpa_terkecil'] = $this->m_laporan->lihat_terkecil($tahun);
		$this->data['title'] = 'Laporan Data DPA Pertahun';
		$this->load->view('laporan/v_report_dana_terkecil', $this->data);
	}

	public function cetak_skpd()
	{
		$this->data['tahun'] = $this->input->get('tahun');
		$this->data['dpa_skpd'] = $this->m_laporan->rekap_skpd($this->data['tahun']);
		$this->data['title'] = 'Laporan Data SKPD yang Terdaftar Pertahun';
		$this->load->view('laporan/v_report_skpd', $this->data);
	}
}