<?php

use Dompdf\Dompdf;

class Rincian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'pimpinan' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'rincian';
		$this->load->model('M_rincian', 'm_rincian');
		$this->load->model('M_uraian', 'm_uraian');
		$this->load->model('M_satuan', 'm_satuan');
		$this->load->model('M_sub_kegiatan', 'm_sub_kegiatan');
		$this->load->helper('fungsi');
	}

	public function index()
	{
		$this->data['title'] = 'Rincian DPA';
		$this->data['all_rincian'] = $this->m_rincian->lihat_rinci();
		$this->data['no'] = 1;
		$this->load->view('rincian/v_lihat', $this->data);
	}

	public function tambah()
	{
		$this->data['aktif'] = 'rincian';
		$this->data['title'] = 'Tambah Rincian DPA';
		$this->data['all_sub'] = $this->m_sub_kegiatan->lihat();
		$this->data['all_uraian'] = $this->m_uraian->lihat();
		$this->data['all_satuan'] = $this->m_satuan->lihat();
		$this->load->view('rincian/v_tambah', $this->data);
	}

	public function proses_tambah()
	{
		$data = [
			'koefisien' => $this->input->post('koefisien'),
			'harga_rincian' => preg_replace('/\D/', '', $this->input->post('harga')),
			'ppn' => $this->input->post('ppn'),
			'id_dpa_sub' => $this->input->post('sub'),
			'id_uraian' => $this->input->post('uraian'),
			'id_satuan' => $this->input->post('satuan')
		];
		if ($this->m_rincian->tambah($data)) {
			$this->session->set_flashdata('success', 'Data Rincian <strong>Berhasil</strong> Ditambahkan!');
			redirect('rincian');
		} else {
			$this->session->set_flashdata('error', 'Data Rincian <strong>Gagal</strong> Ditambahkan!');
			redirect('rincian');
		}
	}

	public function ubah($id)
	{
		$this->data['aktif'] = 'rincian';
		$this->data['title'] = 'Edit Rincian DPA';
		$this->data['rincian'] = $this->m_rincian->lihat_id($id);
		$this->data['all_sub'] = $this->m_sub_kegiatan->lihat();
		$this->data['all_uraian'] = $this->m_uraian->lihat();
		$this->data['all_satuan'] = $this->m_satuan->lihat();
		$this->load->view('rincian/v_ubah', $this->data);
	}

	public function proses_ubah($id_rincian)
	{
		$data = [
			'koefisien' => $this->input->post('koefisien'),
			'harga_rincian' => $this->input->post('harga'),
			'ppn' => $this->input->post('ppn'),
			'id_dpa_sub' => $this->input->post('sub'),
			'id_uraian' => $this->input->post('uraian'),
			'id_satuan' => $this->input->post('satuan')
		];
		if ($this->m_rincian->ubah($data, $id_rincian)) {
			$this->session->set_flashdata('success', 'Data Rincian DPA <strong>Berhasil</strong> Diubah!');
			redirect('rincian');
		} else {
			$this->session->set_flashdata('error', 'Data Rincian DPA <strong>Gagal</strong> Diubah!');
			redirect('rincian');
		}
	}

	public function hapus($id_rincian)
	{
		if ($this->m_rincian->hapus($id_rincian)) {
			$this->session->set_flashdata('success', 'Data DPA <strong>Berhasil</strong> Dihapus!');
			redirect('rincian');
		} else {
			$this->session->set_flashdata('error', 'Data DPA <strong>Gagal</strong> Dihapus!');
			redirect('rincian');
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
		$this->data['title'] = "Laporan Data dpa di " . $gudang[1];
		$this->data['no'] = 1;
		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('dpa/v_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data dpa Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}