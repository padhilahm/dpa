<?php

class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('M_pengguna', 'm_pengguna');
	}

	public function index(){
		$this->load->view('v_profil');
	}

	public function login(){
		$this->load->view('v_login');
	}


	public function proses_login()
	{
		$user = $this->input->post('username');
		$pass = md5($this->input->post('password'));

		$get_petugas = $this->m_pengguna->lihat_username($user, $pass);

		if ($get_petugas) {
			$session = [
				'kode' => $get_petugas->id_pengguna,
				'nama' => $get_petugas->nama_pengguna,
				'username' => $get_petugas->username,
				'role' => $get_petugas->role
			];

			$this->session->set_userdata('login',$session);

			if ($get_petugas->role == 'admin') {
				redirect('dashboard');
			}
			else if ($get_petugas->role == 'pimpinan') {
				redirect('dashboard');
			}else{
				redirect('dashboard');
			}

		}
		else{
			$this->session->set_flashdata('error', 'Username atau Password Salah!');
			redirect('login/login','refresh');
		}

	}


}