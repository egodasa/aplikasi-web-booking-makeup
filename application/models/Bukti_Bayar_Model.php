<?php defined('BASEPATH') or exit('No direct script access allowed');

class Makeup_Model extends CI_Model
{
    private $_table = "tb_bukti_bayar";

    // KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
    // public $product_id;
    public $primaryKey = "id_bukti"; // primary key
    public $id_booking; // kolom tabel
    public $nama; // kolom tabel
    public $no_rekening; // kolom tabel
    public $bank; // kolom tabel
    public $status = "Belum Dibayar"; // kolom tabel
    public $keterangan; // kolom tabel

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
        $data['id_booking'] = $post["id_booking"];
        $data['nama'] = $post["nama"];
        $data['no_rekening'] = $post["no_rekening"];
        $data['bank'] = $post["bank"];
        $data['status'] = $post["status"];
        $data['keterangan'] = $post["keterangan"];
        return $this->db->insert($this->_table, $data);
    }

    public function update($post, $id)
    {
        $data = [];
        $data['id_booking'] = $post["id_booking"];
        $data['nama'] = $post["nama"];
        $data['no_rekening'] = $post["no_rekening"];
        $data['bank'] = $post["bank"];
        $data['status'] = $post["status"];
        $data['keterangan'] = $post["keterangan"];
        return $this->db->update($this->_table, $data, array($this->primaryKey => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array($this->primaryKey => $id));
    }
}
