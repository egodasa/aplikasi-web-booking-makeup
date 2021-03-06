<?php
class Dashboard extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Backend/Makeup_Model', 'makeupModel');
		$this->load->model('Backend/Paket_Makeup_Model', 'paketMakeupModel');
		$this->load->model('Backend/Hasil_Karya_Model', 'karya');
		$this->load->model('Frontend/Register_Model', 'registerModel');
		$this->load->model('Frontend/Booking_Model', 'bookingModel');
		$this->load->model('Frontend/Bukti_Model', 'buktiModel');
	}
	public function index()
	{
		$data['makeup'] = $this->makeupModel->getAll();
		$data_makeup = $this->makeupModel->getAll();
		foreach ($data_makeup as $no => $makeup) {
			$data['makeup'][$no]->paket = new stdClass();
			$data['makeup'][$no]->paket = $this->paketMakeupModel->getByMakeup($makeup->id_makeup);
		}
		$this->view_frontend('user/dashboard', $data);
	}

	public function karya()
	{
		$data['makeup'] = $this->makeupModel->getAll();
		$data_makeup = $this->makeupModel->getAll();
		foreach ($data_makeup as $no => $makeup) {
			$data['makeup'][$no]->paket = new stdClass();
			$data['makeup'][$no]->paket = $this->paketMakeupModel->getByMakeup($makeup->id_makeup);
		}
		$data['karya'] = $this->karya->getAll();
		$this->view_frontend('user/karya', $data);
	}

	public function register()
	{
		$this->view_frontend('user/register');
	}

	public function booking($id)
	{
		$data['tombol'] = false;
		$data['tanggal'] = null;
		if (!empty($_GET['tanggal'])) {
			$data['tanggal'] = $_GET['tanggal'];
			if ($this->bookingModel->apakahBisaBookingPaket($_GET['id_paket'], $_GET['tanggal'])) {
				$data['tombol'] = true;
			} else {
				$this->session->set_flashdata('error', 'Tanggal makeup yang Anda pilih sudah penuh! Silahkan pilih tanggal lain');
			}
		}
		$data['id'] = $id;
		$data['paket'] = $this->paketMakeupModel->getById($id);
		$data['tarif'] = $this->paketMakeupModel->getKota();
		$data['tanggal_sudah_booking'] = $this->bookingModel->tanggalSudahBooking($id, $data['paket'][0]->jumlah_orang);
		$this->view_frontend('user/booking', $data);
	}

	public function booking_tambah()
	{
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', 'Anda Harus Login Terlebih Dahulu.');
			redirect('register');
		} else {
			if ($this->bookingModel->apakahBisaBookingPaket($_POST['id_paket'], $_POST['tgl_makeup'])) {
				$this->bookingModel->save($_POST);
				$this->session->set_flashdata('pesan', 'Booking Berhasil dilakukan.');
				redirect('user/index');
			} else {
				$this->session->set_flashdata('pesan', 'Tanggal Booking sudah penuh. Silahkan pilih tanggal lain!');
				$this->booking($_POST['id_paket']);
			}
		}
	}

	public function riwayat()
	{
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('error', 'Anda Harus Login Terlebih Dahulu.');
			redirect('register');
		} else {
			$data['booking'] = $this->bookingModel->getAll();
			$this->view_frontend('user/riwayat', $data);
		}
	}

	public function pembayaran()
	{
		// var_dump($this->input->post());
		// exit;

		$id = $this->input->post('id_booking');
		// $nama = $this->input->post('nama');
		// $no_rekening = $this->input->post('no_rekening');
		// $bank = $this->input->post('bank');

		$this->bookingModel->updateStatusSesudahBayar($id);
		$this->buktiModel->save($_POST, $_FILES);
		// $this->session->set_flashdata('pesan', 'Pembayaran Berhasil dilakukan.');
		redirect('riwayat');
	}

	public function register_tambah()
	{
		// if ($this->registerModel->usernameTersedia($_POST['username'])) {
		// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		//         Username sudah pernah digunakan. Silahkan gunakan username lain...
		//         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		//           <span aria-hidden="true">&times;</span>
		//         </button>
		//       </div>');
		// 	$this->register();
		// }

		// if ($this->registerModel->emailTersedia($_POST['email'])) {
		// 	$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		//         Email sudah pernah digunakan. Silahkan gunakan email lain...
		//         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		//           <span aria-hidden="true">&times;</span>
		//         </button>
		//       </div>');
		// 	$this->register();
		// }
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->register();
		} else {
			$this->registerModel->save($_POST);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Berhasil Melakukan Register
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
			$this->register();
		}
	}

	public function biodata()
	{
		$this->view_frontend('user/biodata');
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_pengguna.username]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_pengguna.email]');
	}
}
