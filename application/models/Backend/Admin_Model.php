<?php defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{

	private $_table = "tb_admin";

	// KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
	// public $product_id;
	public $primaryKey = "id_admin"; // primary key
	public $username; // kolom tabel
	public $password; // kolom tabel
	public $nama_admin; // kolom tabel

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
		$data['username'] = $post["username"];
		$data['password'] = $post["password"];
		$data['nama_admin'] = $post["nama_admin"];
		return $this->db->insert($this->_table, $data);
	}

	public function update($post, $id)
	{
		$data = [];
		$data['username'] = $post["username"];
		$data['password'] = $post["password"];
		$data['nama_admin'] = $post["nama_admin"];
		return $this->db->update($this->_table, $data,  array($this->primaryKey => $id));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array($this->primaryKey => $id));
	}
}
