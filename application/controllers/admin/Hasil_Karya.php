<?php
class Hasil_Karya extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Backend/Hasil_Karya_Model', 'hasilkaryaModel');
  }

  public function index()
  {
    $data['hasil_karya'] = $this->hasilkaryaModel->getAll();
    $data['makeup'] = $this->hasilkaryaModel->getMakeup();
    $this->view_backend('admin/hasil_karya/hasil_karya', $data);
  }

  public function karya_tambah()
  {
    $this->hasilkaryaModel->save($_POST, $_FILES);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Hasil Karya Berhasil DiTambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('admin/karya');
  }

  public function karya_edit($id)
  {

    $data['hasil_karya'] = $this->hasilkaryaModel->getById($id);
    $data['makeup'] = $this->hasilkaryaModel->getMakeup();
    $this->view_backend('admin/hasil_karya/hasil_karya_edit', $data);
  }

  public function karya_edit_aksi()
  {
    $id = $this->input->post('id');
    $foto_lama = $this->input->post('foto_lama');
    $this->hasilkaryaModel->update($_POST, $id, $foto_lama, $_FILES);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Hasil Karya Berhasil DiEdit
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('admin/karya');
  }

  public function karya_hapus_aksi($id)
  {
    $this->hasilkaryaModel->delete($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Hasil Karya Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
    redirect('admin/karya');
  }
}
