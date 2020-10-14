<?php
class Paket_Makeup extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Backend/Paket_Makeup_Model', 'paketMakeupModel');
    $this->load->model('Backend/Makeup_Model', 'makeupModel');
  }

  public function index()
  {
    $data['paket_makeup'] = $this->paketMakeupModel->getAll();
    $data['makeup'] = $this->makeupModel->getAll();
    $this->view_backend('admin/paket_makeup/paket_makeup', $data);
  }

  public function paket_tambah()
  {
    $this->paketMakeupModel->save($_POST, $_FILES);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Paket MakeUp Berhasil DiTambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('admin/paket');
  }

  public function paket_edit($id)
  {
    $data['paket_makeup'] = $this->paketMakeupModel->getById($id);
    $data['makeup'] = $this->makeupModel->getAll();
    $this->view_backend('admin/paket_makeup/paket_edit', $data);
  }

  public function paket_edit_aksi()
  {
    $id = $this->input->post('id');
    $foto_lama = $this->input->post('foto_lama');
    $this->paketMakeupModel->update($_POST, $id, $_FILES, $foto_lama);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Paket MakeUp Berhasil DiEdit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('admin/paket');
  }

  public function paket_hapus_aksi($id)
  {
    $this->paketMakeupModel->delete($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Paket MakeUp Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('admin/paket');
  }
}
