<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class Skpd extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->login['role'] != 'pimpinan' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'skpd';
		$this->load->model('M_skpd', 'm_skpd');
		$this->load->helper('fungsi');
	}

	public function index()
	{
		$this->data['title'] = 'Data SKPD';
		$this->data['all_skpd'] = $this->m_skpd->lihat();
		$this->data['no'] = 1;
		$this->load->view('skpd/v_lihat', $this->data);
	}

	public function tambah()
	{

		$this->data['title'] = 'Tambah SKPD';
		$this->load->view('skpd/v_tambah', $this->data);
	}

	public function proses_tambah()
	{

		$data = [
			'id_skpd' => $this->input->post('nomor_skpd'),
			'nama_skpd' => $this->input->post('nama_skpd'),
			'alamat_skpd' => $this->input->post('alamat_skpd'),
			'no_telpon' => $this->input->post('no_telpon'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		];

		if ($this->m_skpd->tambah($data)) {
			$this->session->set_flashdata('success', 'Data skpd <strong>Berhasil</strong> Ditambahkan!');
			redirect('skpd');
		} else {
			$this->session->set_flashdata('error', 'Data skpd <strong>Gagal</strong> Ditambahkan!');
			redirect('skpd');
		}
	}

	public function ubah($id)
	{

		$this->data['title'] = 'Ubah skpd';
		$this->data['skpd'] = $this->m_skpd->lihat_id($id);
		$this->load->view('skpd/v_ubah', $this->data);
	}

	public function proses_ubah($id)
	{


		$data = [
			'id_skpd' => $this->input->post('nomor_skpd'),
			'nama_skpd' => $this->input->post('nama_skpd'),
			'alamat_skpd' => $this->input->post('alamat_skpd'),
			'no_telpon' => $this->input->post('no_telpon'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
		];

		if ($this->m_skpd->ubah($data, $id)) {
			$this->session->set_flashdata('success', 'Data skpd <strong>Berhasil</strong> Diubah!');
			redirect('skpd');
		} else {
			$this->session->set_flashdata('error', 'Data skpd <strong>Gagal</strong> Diubah!');
			redirect('skpd');
		}
	}

	public function hapus($id)
	{

		if ($this->m_skpd->hapus($id)) {
			$this->session->set_flashdata('success', 'Data skpd <strong>Berhasil</strong> Dihapus!');
			redirect('skpd');
		} else {
			$this->session->set_flashdata('error', 'Data skpd <strong>Gagal</strong> Dihapus!');
			redirect('skpd');
		}
	}

	public function export()
	{
		$dompdf = new Dompdf();
		$this->data['all_skpd'] = $this->m_skpd->lihat();
		$this->data['title'] = 'Laporan Data skpd';
		$this->data['no'] = 1;
		$dompdf->setPaper('A4', 'Potrait');
		$html = $this->load->view('skpd/v_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data skpd Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}

/* End of file skpd.php */
/* Location: ./application/controllers/skpd.php */