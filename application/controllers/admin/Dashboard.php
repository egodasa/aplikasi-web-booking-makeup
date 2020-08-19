<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/templateBackend/header');
        $this->load->view('admin/templateBackend/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/templateBackend/footer');
    }
}
