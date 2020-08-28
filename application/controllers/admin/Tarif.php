<?php
class Tarif extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Backend/Tarif_Model', 'tarifModel');
    }

    public function index()
    {
        $data['tarif'] = $this->tarifModel->getAll();
        $this->view_backend('admin/tarif/tarif', $data);
    }

    public function tambah_tarif()
    {
        $this->tarifModel->save($_POST);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Tarif DiTambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/tarif');
    }

    public function hapus_tarif($id)
    {
        $this->tarifModel->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Tarif Berhasil DiHapus
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>');
        redirect('admin/tarif');
    }
}
