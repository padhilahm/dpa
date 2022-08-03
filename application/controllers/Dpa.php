<?php

use Dompdf\Dompdf;

class Dpa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'petugas' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'dpa';
		$this->load->model('M_dpa', 'm_dpa');
		$this->load->model('M_skpd', 'm_skpd');

		$this->load->model('M_sub_dpa', 'm_sub_dpa');
		$this->load->model('M_sub_kegiatan', 'm_sub_kegiatan');
		$this->load->helper('fungsi');
	}

	public function index()
	{
		$this->data['title'] = 'Dokumen Pelaksanaan Anggaran';
		$this->data['all_dpa'] = $this->m_dpa->lihat_by_organisasi();
		$this->data['no'] = 1;
		// $this->data['all_gudang'] = $this->m_gudang->lihat();
		$this->load->view('dpa/v_lihat', $this->data);
	}

	public function sub_dpa()
	{
		$this->data['aktif'] = 'sub_dpa';
		$this->data['title'] = 'Sub Kegiatan DPA';
		$this->data['all_sub_dpa'] = $this->m_sub_dpa->lihat_by_organisasi();
		$this->data['no'] = 1;
		$this->load->view('sub_dpa/v_lihat', $this->data);
	}

	public function tambah()
	{
		$this->data['title'] = 'Tambah DPA';
		$this->data['all_skpd'] = $this->m_skpd->lihat();
		$this->load->view('dpa/v_tambah', $this->data);
	}

	public function tambah_sub()
	{

		$this->data['aktif'] = 'sub_dpa';
		$this->data['title'] = 'Tambah Sub Kegiatan DPA';
		$this->data['all_dpa'] = $this->m_dpa->lihat();
		$this->data['all_sub_kegiatan'] = $this->m_sub_kegiatan->lihat();

		$this->load->view('sub_dpa/v_tambah', $this->data);
	}


	public function proses_tambah()
	{
		$data = [
			'nomor_dpa' => $this->input->post('nomor_dpa'),
			'urusan_pemerintahan' => $this->input->post('urusan'),
			'bidang_urusan' => $this->input->post('bidang'),
			'kegiatan' => $this->input->post('kegiatan'),
			'organisasi' => $this->input->post('organisasi'),
			'unit' => $this->input->post('unit'),
			'tanggal' => date('Y-m-d'),
			'jabatan_pimpinan' => $this->input->post('jabatan'),
			'nama_pimpinan' => $this->input->post('pimpinan'),
			'nip_pimpinan' => $this->input->post('nip'),
			'tahun' => $this->input->post('tahun')
		];

		if ($this->m_dpa->tambah($data)) {
			$this->session->set_flashdata('success', 'Data DPA <strong>Berhasil</strong> Ditambahkan!');
			redirect('dpa');
		} else {
			$this->session->set_flashdata('error', 'Data DPA <strong>Gagal</strong> Ditambahkan!');
			redirect('dpa');
		}
	}

	public function sub_proses_tambah()
	{
		$data = [
			'sumber_dana' => $this->input->post('sumber_dana'),
			'lokasi_dpa_sub' => $this->input->post('lokasi'),
			'waktu_pelaksanaan' => $this->input->post('waktu'),
			'indikator_keluaran' => $this->input->post('indikator'),
			'target_keluaran' => $this->input->post('target'),
			'waktu_pelaksanaan' =>  $this->input->post('waktu'),
			'id_dpa' => $this->input->post('id_dpa'),
			'id_sub_kegiatan' => $this->input->post('sub_kegiatan')
		];

		if ($this->m_sub_dpa->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Sub Kegiatan DPA <strong>Berhasil</strong> Ditambahkan!');
			redirect('dpa/sub_dpa');
		} else {
			$this->session->set_flashdata('error', 'Data Sub Kegiatan DPA <strong>Gagal</strong> Ditambahkan!');
			redirect('dpa/sub_dpa');
		}
	}

	public function ubah($id_dpa)
	{
		$this->data['aktif'] = 'sub_dpa';
		$this->data['title'] = 'Edit DPA';
		$this->data['all_skpd'] = $this->m_skpd->lihat();
		$this->data['dpa'] = $this->m_dpa->lihat_id($id_dpa);
		$this->data['all_dpa'] = $this->m_dpa->lihat();
		$this->load->view('dpa/v_ubah', $this->data);
	}

	public function sub_ubah($id_dpa_sub)
	{
		$this->data['aktif'] = 'sub_dpa';
		$this->data['title'] = 'Edit DPA';
		$this->data['all_sub_kegiatan'] = $this->m_sub_kegiatan->lihat();
		$this->data['sub_dpa'] = $this->m_sub_dpa->lihat_id($id_dpa_sub);
		$this->data['all_dpa'] = $this->m_dpa->lihat();
		$this->load->view('sub_dpa/v_ubah', $this->data);
	}

	public function proses_ubah($id_dpa)
	{

		$data = [
			'nomor_dpa' => $this->input->post('nomor_dpa'),
			'urusan_pemerintahan' => $this->input->post('urusan'),
			'bidang_urusan' => $this->input->post('bidang'),
			'kegiatan' => $this->input->post('kegiatan'),
			'organisasi' => $this->input->post('organisasi'),
			'unit' => $this->input->post('unit'),
			'tanggal' => date('Y-m-d'),
			'jabatan_pimpinan' => $this->input->post('jabatan'),
			'nama_pimpinan' => $this->input->post('pimpinan'),
			'nip_pimpinan' => $this->input->post('nip'),
			'tahun' => $this->input->post('tahun')
		];

		if ($this->m_dpa->ubah($data, $id_dpa)) {
			$this->session->set_flashdata('success', 'Data DPA <strong>Berhasil</strong> Diubah!');
			redirect('dpa');
		} else {
			$this->session->set_flashdata('error', 'Data DPA <strong>Gagal</strong> Diubah!');
			redirect('dpa');
		}
	}

	public function sub_proses_ubah($id_dpa_sub)
	{
		$data = [
			'sumber_dana' => $this->input->post('sumber_dana'),
			'lokasi_dpa_sub' => $this->input->post('lokasi'),
			'waktu_pelaksanaan' => $this->input->post('waktu'),
			'indikator_keluaran' => $this->input->post('indikator'),
			'target_keluaran' => $this->input->post('target'),
			'waktu_pelaksanaan' =>  $this->input->post('waktu'),
			'id_dpa' => $this->input->post('id_dpa'),
			'id_sub_kegiatan' => $this->input->post('sub_kegiatan')
		];

		if ($this->m_sub_dpa->ubah($data, $id_dpa_sub)) {
			$this->session->set_flashdata('success', 'Data Sub Kegiatan DPA <strong>Berhasil</strong> Diubah!');
			redirect('dpa/sub_dpa');
		} else {
			$this->session->set_flashdata('error', 'Data Sub Kegiatan DPA<strong>Gagal</strong> Diubah!');
			redirect('dpa/sub_dpa');
		}
	}

	public function hapus($id_dpa)
	{
		if ($this->m_dpa->hapus($id_dpa)) {
			$this->session->set_flashdata('success', 'Data DPA <strong>Berhasil</strong> Dihapus!');
			redirect('dpa');
		} else {
			$this->session->set_flashdata('error', 'Data DPA <strong>Gagal</strong> Dihapus!');
			redirect('dpa');
		}
	}

	public function sub_hapus($id_dpa_sub)
	{
		if ($this->session->login['role'] == 'petugas') {
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}
		if ($this->m_sub_dpa->hapus($id_dpa_sub)) {
			$this->session->set_flashdata('success', 'Data Sub Kegiatan DPA <strong>Berhasil</strong> Dihapus!');
			redirect('dpa/sub_dpa');
		} else {
			$this->session->set_flashdata('error', 'Data Sub Kegiatan DPA <strong>Gagal</strong> Dihapus!');
			redirect('dpa_sub_dpa');
		}
	}

	public function export()
	{
		$dompdf = new Dompdf();
		$id_gudang = $this->input->post('gudang');
		$gudang = explode("-", $id_gudang);

		if ($gudang[0] == 'all') {
			$this->data['all_dpa'] = $this->m_dpa->lihat();
		} else {
			$this->data['all_dpa'] = $this->m_dpa->export_dpa($gudang[0]);
		}
		// $this->data['all_dpa'] = $this->m_dpa->export_dpa($id_gudang);
		$this->data['title'] = "Laporan Data dpa di " . $gudang[1];
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('dpa/v_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data dpa Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}