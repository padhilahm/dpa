<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Satuan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'pimpinan' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'satuan';
		$this->load->model('M_satuan', 'm_satuan');
		$this->load->helper('fungsi');
	}

	public function index()
	{
		$this->data['title'] = 'Data Satuan';
		$this->data['all_satuan'] = $this->m_satuan->lihat();
		$this->data['no'] = 1;
		$this->load->view('satuan/v_lihat', $this->data);
	}

	public function tambah(){
		$this->data['title'] = 'Tambah Satuan';
		$this->load->view('satuan/v_tambah', $this->data);
	}

	public function proses_tambah(){
		$data = [
			'satuan' => $this->input->post('nama_satuan'),
		];
		if($this->m_satuan->tambah($data)){
			$this->session->set_flashdata('success', 'Data Satuan <strong>Berhasil</strong> Ditambahkan!');
			redirect('satuan');
		} else {
			$this->session->set_flashdata('error', 'Data Satuan <strong>Gagal</strong> Ditambahkan!');
			redirect('satuan');
		}
	}

	public function ubah($id){
		$this->data['title'] = 'Ubah Satuan';
		$this->data['satuan'] = $this->m_satuan->lihat_id($id);
		$this->load->view('satuan/v_ubah', $this->data);
	}

	public function proses_ubah($id){
		$data = [
			'satuan' => $this->input->post('nama'),
		];
		if($this->m_satuan->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data Satuan <strong>Berhasil</strong> Diubah!');
			redirect('satuan');
		} else {
			$this->session->set_flashdata('error', 'Data Satuan <strong>Gagal</strong> Diubah!');
			redirect('satuan');
		}
	}

	public function hapus($id){
		if($this->m_satuan->hapus($id)){
			$this->session->set_flashdata('success', 'Data Satuan <strong>Berhasil</strong> Dihapus!');
			redirect('satuan');
		} else {
			$this->session->set_flashdata('error', 'Data Satuan <strong>Gagal</strong> Dihapus!');
			redirect('satuan');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_satuan'] = $this->m_satuan->lihat();
		$this->data['title'] = 'Laporan Data Satuan';
		$this->data['no'] = 1;
		$dompdf->setPaper('A4', 'Potrait');
		$html = $this->load->view('satuan/v_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Satuan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}

/* End of file Satuan.php */
/* Location: ./application/controllers/Satuan.php */