<?php
class Makeup extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Backend/Makeup_Model', 'makeupModel');
  }

  public function index()
  {
    $data['makeup'] = $this->makeupModel->getAll();
    $this->view_backend('admin/makeup/makeup', $data);
  }

  public function makeup_tambah()
  {
    $this->makeupModel->save($_POST);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data MakeUp Berhasil DiTambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('admin/makeup');
  }

  public function makeup_edit($id)
  {

    $data['makeup'] = $this->makeupModel->getById($id);
    $this->view_backend('admin/makeup/makeup_edit', $data);
  }

  public function makeup_edit_aksi()
  {
    $id = $this->input->post('id');
    $this->makeupModel->update($_POST, $id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data MakeUp Berhasil DiEdit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('admin/makeup');
  }

  public function makeup_hapus_aksi($id)
  {
    $this->makeupModel->delete($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data MakeUp Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('admin/makeup');
  }
}
