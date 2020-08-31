<?php defined('BASEPATH') or exit('No direct script access allowed');

class Tarif_Model extends CI_Model
{
    private $_table = "tb_kota";

    // KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
    // public $product_id;
    public $primaryKey = "id_kota"; // primary key
    public $id_kota; // kolom tabel
    public $nm_kota; // kolom tabel
    public $tarif; // kolom tabel

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, [$this->primaryKey => $id])->row();
    }

    public function save($post)
    {
        $data = [];
        $data['id_kota'] = $post["id_kota"];
        $data['nm_kota'] = $post["nm_kota"];
        $data['tarif'] = $post["tarif"];
        return $this->db->insert($this->_table, $data);
    }

    public function update($post, $id)
    {
        $data = [];
        $data['nm_kota'] = $post["nm_kota"];
        $data['tarif'] = $post["tarif"];
        return $this->db->update($this->_table, $data, array($this->primaryKey => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array($this->primaryKey => $id));
    }
}
