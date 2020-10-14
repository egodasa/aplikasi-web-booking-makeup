<?php
class Dashboard extends MY_Controller
{
	public function index()
	{
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', 'Anda Harus Login.');
			redirect('admin/login');
		} else {
			// $this->load->view('admin/login');
			$this->view_backend('admin/dashboard');
		}
	}
}
