<?php
class Admin extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Backend/Admin_Model', 'adminModel');
	}

	public function index()
	{
		$data['admin'] = $this->adminModel->getAll();
		$this->view_backend('admin/admin/v_admin', $data);
	}

	public function admin_tambah()
	{
		$this->adminModel->save($_POST);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Admin Berhasil DiTambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
		redirect('admin/data');
	}

	public function admin_edit($id)
	{

		$data['admin'] = $this->adminModel->getById($id);
		$this->view_backend('admin/admin/v_admin_edit', $data);
	}

	public function admin_edit_aksi()
	{
		$id = $this->input->post('id');
		$this->adminModel->update($_POST, $id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Admin Berhasil DiEdit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
		redirect('admin/data');
	}

	public function admin_hapus_aksi($id)
	{
		$this->adminModel->delete($id);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Admin Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
		redirect('admin/admin');
	}
}
