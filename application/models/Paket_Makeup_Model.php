<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Paket_Makeup_Model extends CI_Model
{
    private $_table = "tb_paket_makeup";

    // KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
    // public $product_id;
    public $primaryKey = "id_paket"; // primary key
    public $nm_paket; // kolom tabel
    public $harga_paket; // kolom tabel
    public $deskripsi; // kolom tabel
    public $batas_booking_per_hari; // kolom tabel

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function save($post)
    {
        $data = [];
        $data['nm_paket'] = $post["nm_paket"];
        $data['harga_paket'] = $post["harga_paket"];
        $data['deskripsi'] = $post["deskripsi"];
        $data['batas_booking_per_hari'] = $post["batas_booking_per_hari"];
        return $this->db->insert($this->_table, $data);
    }

    public function update($post, $id)
    {
        $data = [];
        $data['nm_paket'] = $post["nm_paket"];
        $data['harga_paket'] = $post["harga_paket"];
        $data['deskripsi'] = $post["deskripsi"];
        $data['batas_booking_per_hari'] = $post["batas_booking_per_hari"];
        return $this->db->update($this->_table, $data, array($this->primaryKey => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array($this->primaryKey => $id));
    }
}