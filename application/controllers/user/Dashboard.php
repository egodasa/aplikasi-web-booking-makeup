<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('user/templateFrontend/header');
        $this->load->view('user/templateFrontend/navbar');
        $this->load->view('user/dashboard');
        $this->load->view('user/templateFrontend/footer');
    }
}
