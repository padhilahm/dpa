<?php

use Dompdf\Dompdf;

class Penarikan extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->login['role'] != 'pimpinan' && $this->session->login['role'] != 'admin') redirect();
		$this->data['aktif'] = 'penarikan';
        $this->load->model('M_penarikan', 'm_penarikan');
		$this->load->model('M_dpa','m_dpa');
		$this->load->helper('fungsi');
	}

	public function index(){
		$this->data['title'] = 'Penarikan Dana';
		$this->data['all_penarikan'] = $this->m_penarikan->lihat_tarik();
		$this->data['no'] = 1;
		$this->load->view('penarikan/v_lihat', $this->data);
	}

	public function tambah(){
		$this->data['aktif'] = 'tarik';
		$this->data['title'] = 'Tambah Penarikan DPA';		
		$this->data['all_dpa'] = $this->m_dpa->lihat();
		$this->load->view('penarikan/v_tambah', $this->data);
	}

	public function proses_tambah(){
		$data = [
            'bulan_penarikan' => $this->input->post('bulan'),
			'jumlah_penarikan' => preg_replace('/\D/','',$this->input->post('jumlah')),
			'id_dpa' => $this->input->post('dpa')
		];

		if($this->m_penarikan->tambah($data)){
			$this->session->set_flashdata('success', 'Data penarikan <strong>Berhasil</strong> Ditambahkan!');
			redirect('penarikan');
		} else {
			$this->session->set_flashdata('error', 'Data penarikan <strong>Gagal</strong> Ditambahkan!');
			redirect('penarikan');
		}
	}



	public function ubah($id){
		$this->data['aktif'] = 'tarik';
		$this->data['title'] = 'Edit penarikan DPA';
		$this->data['penarikan'] = $this->m_penarikan->lihat_id($id);	
		$this->data['all_dpa'] = $this->m_dpa->lihat();
		$this->load->view('penarikan/v_ubah', $this->data);
	}

	
	public function proses_ubah($id_penarikan){

		$data = [
            'bulan_penarikan' => $this->input->post('bulan'),
			'jumlah_penarikan' => $this->input->post('jumlah'),
			'id_dpa' => $this->input->post('dpa')
		];
		
		if($this->m_penarikan->ubah($data, $id_penarikan)){
			$this->session->set_flashdata('success', 'Data Penarikan Dana <strong>Berhasil</strong> Diubah!');
			redirect('penarikan');
		} else {
			$this->session->set_flashdata('error', 'Data Penarikan Dana <strong>Gagal</strong> Diubah!');
			redirect('penarikan');
		}
	}

	

	public function hapus($id_penarikan){
		if($this->m_penarikan->hapus($id_penarikan)){
			$this->session->set_flashdata('success', 'Data DPA <strong>Berhasil</strong> Dihapus!');
			redirect('penarikan');
		} else {
			$this->session->set_flashdata('error', 'Data DPA <strong>Gagal</strong> Dihapus!');
			redirect('penarikan');
		}
	}

	
	public function export(){
		$dompdf = new Dompdf();
		$id_gudang = $this->input->post('gudang');
		$gudang=explode("-", $id_gudang);

		if ($gudang[0] == 'all') {
			$this->data['all_dpa'] = $this->m_dpa->lihat();
		}else{
			$this->data['all_dpa'] = $this->m_dpa->export_dpa($gudang[0]);
		}
		// $this->data['all_dpa'] = $this->m_dpa->export_dpa($id_gudang);
		$this->data['title'] = "Laporan Data dpa di ".$gudang[1];
		$this->data['no'] = 1;

		$dompdf->setPaper('A4', 'Landscape');
		$html = $this->load->view('dpa/v_report', $this->data, true);
		$dompdf->load_html($html);
		$dompdf->render();
		$dompdf->stream('Laporan Data dpa Tanggal ' . date('d F Y'), array("Attachment" => false));
	}
}