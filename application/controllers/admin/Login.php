<?php
class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Backend/Login_Model', 'loginadminModel');
	}

	public function login_admin()
	{
		if (!empty($this->session->userdata('username'))) {
			redirect('admin');
		} else {
			$this->load->view('admin/login');
		}
	}

	public function login_aksi()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$cek = $this->loginadminModel->cek_login_admin($username, $password);
		$this->session->set_userdata('id_admin', $cek->id_admin);

		if ($cek == FALSE) {
			$this->session->set_flashdata('error', 'Username / Password Salah');
			redirect('admin/login');
		} else {
			$this->session->set_userdata('username', $cek->username);
			$this->session->set_userdata('nama_admin', $cek->nama_admin);
			// var_dump($t);
			// var_dump($e);
			// exit;
			$this->session->set_flashdata('pesan', 'Anda Berhasil Masuk');
			redirect('admin/dashboard');
		}
	}

	public function logout_aksi()
	{
		$this->session->unset_userdata(array('id_admin', 'username', 'nama_admin'));
		$this->session->set_flashdata('pesan', 'Anda Telah Logout.');
		redirect('admin/login');
	}
}
