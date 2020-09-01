<?php
class User extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Backend/User_Model', 'userModel');
	}

	public function index()
	{
		$data['user'] = $this->userModel->getAll();
		$this->view_backend('admin/user/user', $data);
	}

	public function user_hapus($id)
	{
		$this->userModel->delete($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data User Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
		redirect('admin/user');
	}
}
