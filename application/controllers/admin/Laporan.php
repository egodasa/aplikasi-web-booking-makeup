<?php
class Laporan extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Frontend/Booking_Model', 'bookingModel');
		$this->load->model('Backend/Paket_Makeup_Model', 'paketMakeupModel');
	}

	public function index()
	{
		$data = array();
		$data['dari'] = date("Y-m-01");
		$data['sampai'] = date("Y-m-t");
		$data['paket'] = "";

		if (!empty($_GET['dari'])) {
			$data['dari'] = $_GET['dari'];
		}

		if (!empty($_GET['sampai'])) {
			$data['sampai'] = $_GET['sampai'];
		}

		if (!empty($_GET['paket'])) {
			$data['paket'] = $_GET['paket'];
		}

		$data['laporan'] = $this->bookingModel->cetakLaporan($data['dari'], $data['sampai'], $data['paket']);
		$data['daftar_paket'] = $this->paketMakeupModel->getAll();
		$this->view_backend('admin/laporan/laporan', $data);
	}

	public function printLaporan()
	{

		$data['dari'] = date("Y-m-01");
		$data['sampai'] = date("Y-m-t");
		$data['paket'] = "";


		if (!empty($_GET['dari'])) {
			$data['dari'] = $_GET['dari'];
		}

		if (!empty($_GET['sampai'])) {
			$data['sampai'] = $_GET['sampai'];
		}

		if (!empty($_GET['paket'])) {
			$data['paket'] = $_GET['paket'];
		}

		$data['laporan'] = $this->bookingModel->cetakLaporan($data['dari'], $data['sampai'], $data['paket']);
		$this->load->view('admin/laporan/print_laporan', $data);
	}
}
