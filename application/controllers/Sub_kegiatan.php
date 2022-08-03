<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
class Sub_kegiatan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'pimpinan' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'sub_kegiatan';
		$this->load->model('M_sub_kegiatan', 'm_sub_kegiatan');
		$this->load->helper('fungsi');
	}

	public function index()
	{
		$this->data['title'] = 'Data Sub Kegiatan';
		$this->data['all_sub_kegiatan'] = $this->m_sub_kegiatan->lihat();
		$this->data['no'] = 1;
		$this->load->view('sub_kegiatan/v_lihat', $this->data);
	}

	public function tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}
		$this->data['title'] = 'Tambah sub_kegiatan';
		$this->load->view('sub_kegiatan/v_tambah', $this->data);
	}

	public function proses_tambah(){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Tambah data hanya untuk admin!');
			redirect('dashboard');
		}
		$data = [
			'sub_kegiatan' => $this->input->post('nama_sub_kegiatan')
		];
		if($this->m_sub_kegiatan->tambah($data)){
			$this->session->set_flashdata('success', 'Data sub_kegiatan <strong>Berhasil</strong> Ditambahkan!');
			redirect('sub_kegiatan');
		} else {
			$this->session->set_flashdata('error', 'Data sub_kegiatan <strong>Gagal</strong> Ditambahkan!');
			redirect('sub_kegiatan');
		}
	}

	public function ubah($id){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}
		$this->data['title'] = 'Ubah sub_kegiatan';
		$this->data['sub_kegiatan'] = $this->m_sub_kegiatan->lihat_id($id);
		$this->load->view('sub_kegiatan/v_ubah', $this->data);
	}

	public function proses_ubah($id){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}
		$data = [
			'sub_kegiatan' => $this->input->post('nama')
		];
		if($this->m_sub_kegiatan->ubah($data, $id)){
			$this->session->set_flashdata('success', 'Data sub_kegiatan <strong>Berhasil</strong> Diubah!');
			redirect('sub_kegiatan');
		} else {
			$this->session->set_flashdata('error', 'Data Sub Kegiatan <strong>Gagal</strong> Diubah!');
			redirect('sub_kegiatan');
		}
	}

	public function hapus($id){
		if ($this->session->login['role'] == 'petugas'){
			$this->session->set_flashdata('error', 'Ubah data hanya untuk admin!');
			redirect('dashboard');
		}
		if($this->m_sub_kegiatan->hapus($id)){
			$this->session->set_flashdata('success', 'Data Sub Kegiatan <strong>Berhasil</strong> Dihapus!');
			redirect('sub_kegiatan');
		} else {
			$this->session->set_flashdata('error', 'Data Sub Kegiatan <strong>Gagal</strong> Dihapus!');
			redirect('sub_kegiatan');
		}
	}

	public function export(){
		$dompdf = new Dompdf();
		$this->data['all_sub_kegiatan'] = $this->m_sub_kegiatan->lihat();
		$this->data['title'] = 'Laporan Data Sub Kegiatan';
		$this->data['no'] = 1;
		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('sub_kegiatan/v_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data Sub Kegiatan Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}

/* End of file sub_kegiatan.php */
/* Location: ./application/controllers/sub_kegiatan.php */