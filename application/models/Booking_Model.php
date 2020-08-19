<?php defined('BASEPATH') or exit('No direct script access allowed');

class Makeup_Model extends CI_Model
{
    private $_table = "tb_booking";

    // KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
    // public $product_id;
    public $primaryKey = "id_booking"; // primary key
    public $id_pengguna; // kolom tabel
    public $tgl_booking; // kolom tabel
    public $tgl_makeup; // kolom tabel
    public $nama_booking; // kolom tabel
    public $alamat_booking; // kolom tabel
    public $id_kota; // kolom tabel
    public $status; // kolom tabel
    public $keterangan; // kolom tabel
    public $total_bayar; // kolom tabel
    public $sudah_bayar; // kolom tabel

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
        $data['id_pengguna'] = $post["id_pengguna"];
        $data['tgl_booking'] = $post["tgl_booking"];
        $data['tgl_makeup'] = $post["tgl_makeup"];
        $data['nama_booking'] = $post["nama_booking"];
        $data['alamat_booking'] = $post["alamat_booking"];
        $data['id_kota'] = $post["id_kota"];
        $data['status'] = $post["status"];
        $data['keterangan'] = $post["keterangan"];
        $data['total_bayar'] = $post["total_bayar"];
        $data['sudah_bayar'] = $post["sudah_bayar"];
        return $this->db->insert($this->_table, $data);
    }

    public function update($post, $id)
    {
        $data = [];
        $data['id_pengguna'] = $post["id_pengguna"];
        $data['tgl_booking'] = $post["tgl_booking"];
        $data['tgl_makeup'] = $post["tgl_makeup"];
        $data['nama_booking'] = $post["nama_booking"];
        $data['alamat_booking'] = $post["alamat_booking"];
        $data['id_kota'] = $post["id_kota"];
        $data['status'] = $post["status"];
        $data['keterangan'] = $post["keterangan"];
        $data['total_bayar'] = $post["total_bayar"];
        $data['sudah_bayar'] = $post["sudah_bayar"];
        return $this->db->update($this->_table, $data, array($this->primaryKey => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array($this->primaryKey => $id));
    }
}
