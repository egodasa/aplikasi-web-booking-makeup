<?php
class MY_Controller extends CI_Controller
{
	public function view_backend($view, $data = null)
	{
		$this->load->view('admin/templateBackend/header');
		$this->load->view('admin/templateBackend/sidebar');
		$this->load->view($view, $data);
		$this->load->view('admin/templateBackend/footer');
	}

	public function view_frontend($view, $data = null)
	{
		$this->load->view('user/templateFrontend/header');
		$this->load->view('user/templateFrontend/navbar');
		$this->load->view($view, $data);
		$this->load->view('user/templateFrontend/footer');
	}
}
