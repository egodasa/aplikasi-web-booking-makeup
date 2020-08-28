<?php defined('BASEPATH') or exit('No direct script access allowed');

class Makeup_Model extends CI_Model
{

    private $_table = "tb_makeup";

    // KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
    // public $product_id;
    public $primaryKey = "id_makeup"; // primary key
    public $nm_makeup; // kolom tabel
    public $deskripsi; // kolom tabel

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, [$this->primaryKey => $id])->result();
    }

    public function save($post)
    {
        $data = [];
        $data['nm_makeup'] = $post["nm_makeup"];
        $data['deskripsi'] = $post["deskripsi"];
        return $this->db->insert($this->_table, $data);
    }

    public function update($post, $id)
    {
        $data = [];
        $data['nm_makeup'] = $post["nm_makeup"];
        $data['deskripsi'] = $post["deskripsi"];
        return $this->db->update($this->_table, $data,  array($this->primaryKey => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array($this->primaryKey => $id));
    }
}
