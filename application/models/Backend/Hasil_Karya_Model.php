<?php defined('BASEPATH') or exit('No direct script access allowed');
class Hasil_Karya_Model extends CI_Model
{

    // update tb_hasil_karya join tb_makeup ON tb_hasil_karya.nm_karya = tb_makeup.nm_makeup 
    // SET tb_hasil_karya.id_makeup = tb_makeup.id_makeup

    private $_table = "tb_hasil_karya";

    // KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
    // public $product_id;
    public $primaryKey = "id_karya"; // primary key
    public $id_makeup; // kolom tabel
    public $nm_karya; // kolom tabel
    public $deskripsi; // kolom tabel
    public $foto; // kolom tabel

    public function getAll()
    {
        return $this->db->query("Select
        *
    From
        tb_hasil_karya Inner Join
        tb_makeup On tb_hasil_karya.id_makeup = tb_makeup.id_makeup")->result();
    }

    public function getMakeup()
    {
        return $this->db->query("SELECT * FROM tb_makeup")->result();
    }

    public function getById($id)
    {
        return $this->db->query("Select
        *
    From
        tb_hasil_karya Inner Join
        tb_makeup On tb_hasil_karya.id_makeup = tb_makeup.id_makeup where id_karya='$id'")->result();
    }

    public function save($post, $file)
    {
        $data = [];
        $data['id_makeup'] = $post["id_makeup"];
        $data['nm_karya'] = $post["nm_karya"];
        $data['deskripsi'] = $post["deskripsi"];
        $data['foto'] = $file["foto"]["name"];
        if ($data['foto'] != '') {
            $config['upload_path'] = './assets/upload';
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $data['foto'] = $this->upload->data('file_name');
            } else {
                echo "Foto Gagal DiUpload";
            }
        }
        return $this->db->insert($this->_table, $data);
    }

    public function update($post, $id, $foto_lama, $file)
    {
        $data = [];
        $data['id_makeup'] = $post["id_makeup"];
        $data['nm_karya'] = $post["nm_karya"];
        $data['deskripsi'] = $post["deskripsi"];
        $data['foto'] = $file["foto"]['name'];
        if ($data['foto'] != '') {
            $config['upload_path'] = './assets/upload';
            $config['allowed_types'] = '*';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $data['foto'] = $this->upload->data('file_name');
            }
        } else {
            $data['foto'] = $foto_lama;
        }
        return $this->db->update($this->_table, $data,  array($this->primaryKey => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array($this->primaryKey => $id));
    }
}
