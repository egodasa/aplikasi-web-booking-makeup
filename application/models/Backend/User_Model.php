<?php defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{

	private $_table = "tb_pengguna";

	// KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
	// public $product_id;
	public $primaryKey = "id_pengguna"; // primary key
	public $username; // kolom tabel
	public $password; // kolom tabel
	public $level; // kolom tabel
	public $jenis_kelamin; // kolom tabel
	public $email; // kolom tabel
	public $nohp; // kolom tabel

	public function getAll()
	{
		return $this->db->get($this->_table)->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, [$this->primaryKey => $id])->result();
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array($this->primaryKey => $id));
	}
}
