<?php
class Booking extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Frontend/Bukti_Model', 'buktiModel');
	}

	public function index()
	{
		$data['booking'] = $this->buktiModel->getAll();
		$this->view_backend('admin/booking/booking', $data);
	}

	public function konfirmasi()
	{
		$id = $this->input->post('id_booking');


		$this->buktiModel->konfirmasiPembayaran($id, $_POST);
		// $this->buktiModel->save($_POST);
		// $this->session->set_flashdata('pesan', 'Pembayaran Berhasil dilakukan.');
		redirect('admin/booking');
	}
}
