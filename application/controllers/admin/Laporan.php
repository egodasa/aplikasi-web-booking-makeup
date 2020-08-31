<?php
class Laporan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Frontend/Booking_Model', 'bookingModel');
	}

	public function index()
	{
		$data['laporan'] = $this->bookingModel->dataLaporan();
		$this->view_backend('admin/laporan/laporan', $data);
	}

	public function printLaporan()
	{
		$dari = $_POST['dari1'];
		$sampai = $_POST['sampai1'];

		$data['laporan'] = $this->bookingModel->cetakLaporan($dari, $sampai);
		$this->load->view('admin/laporan/print_laporan', $data);
	}

	public function filterLaporan()
	{
		// var_dump($_POST);
		$data['laporan'] = $this->bookingModel->filterLaporan($_GET);

		// var_dump($data);
		$this->view_backend('admin/laporan/laporan', $data);
		// $this->db->where('DATE(tgl_booking) >=', $dari);
		// $this->db->where('DATE(tgl_booking) <=', $sampai);
		// $this->load->view('admin/laporan/print_laporan');

		// $this->db->where("tgl_booking BETWEEN $dari AND $sampai");
		// return $this->db->get('tb_booking');
	}
}
