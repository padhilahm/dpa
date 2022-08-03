<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;

class Uraian extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'pimpinan' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'uraian';
		$this->load->model('M_uraian', 'm_uraian');
		$this->load->helper('fungsi');
	}

	public function index()
	{
		$this->data['title'] = 'Data Uraian';
		$this->data['all_uraian'] = $this->m_uraian->lihat();
		$this->data['no'] = 1;
		$this->load->view('uraian/v_lihat', $this->data);
	}

	public function tambah(){

		$this->data['title'] = 'Tambah uraian';
		$this->load->view('uraian/v_tambah', $this->data);
	}

	public function proses_tambah(){
		$data = [
            'kode_rekening' => $this->input->post('kode_rekening'),
			'uraian' => $this->input->post('uraian')
		];

		if($this->m_uraian->tambah($data)){
			$this->session->set_flashdata('success', 'Data uraian <strong>Berhasil</strong> Ditambahkan!');
			redirect('uraian');
		} else {
			$this->session->set_flashdata('error', 'Data uraian <strong>Gagal</strong> Ditambahkan!');
			redirect('uraian');
		}
	}

	public function ubah($id){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}
		$this->data['title'] = 'Ubah uraian';
		$this->data['uraian'] = $this->m_uraian->lihat_id($id);
		$this->load->view('uraian/v_ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}
		$data = [
            'kode_rekening' => $this->input->post('kode_rekening'),
			'uraian' => $this->input->post('uraian')
			
		];
		
		if($this->m_uraian->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data uraian <strong>Berhasil</strong> Diubah!');
			redirect('uraian');
		} else {
			$this->session->set_flashdata('error', 'Data uraian <strong>Gagal</strong> Diubah!');
			redirect('uraian');
		}
	}

	public function hapus($id){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}
		if($this->m_uraian->hapus($id)){
			$this->session->set_flashdata('success', 'Data uraian <strong>Berhasil</strong> Dihapus!');
			redirect('uraian');
		} else {
			$this->session->set_flashdata('error', 'Data uraian <strong>Gagal</strong> Dihapus!');
			redirect('uraian');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_uraian'] = $this->m_uraian->lihat();
		$this->data['title'] = 'Laporan Data Uraian';
		$this->data['no'] = 1;
		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('uraian/v_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Uraian Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}

/* End of file uraian.php */
/* Location: ./application/controllers/uraian.php */