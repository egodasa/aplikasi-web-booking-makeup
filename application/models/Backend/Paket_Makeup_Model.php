<?php defined('BASEPATH') or exit('No direct script access allowed');

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
	public $jumlah_orang; // kolom tabel

	public function getAll()
	{
		return $this->db->query("Select
        tb_paket_makeup.id_paket,
        tb_paket_makeup.id_makeup,
        tb_paket_makeup.nm_paket,
        tb_makeup.nm_makeup,
        tb_makeup.lokasi_makeup,
        tb_paket_makeup.harga_paket,
        tb_paket_makeup.deskripsi,
        tb_paket_makeup.biaya_dp,
        tb_paket_makeup.foto,
        tb_paket_makeup.batas_booking_per_hari,
        tb_paket_makeup.jumlah_orang,
        tb_makeup.nm_makeup
    From
        tb_paket_makeup Left Join
        tb_makeup On tb_paket_makeup.id_makeup = tb_makeup.id_makeup")->result();
	}

	public function getByMakeup($id_makeup)
	{
		return $this->db->query("Select * FROM tb_paket_makeup WHERE id_makeup = " . $id_makeup)->result();
	}

	public function getMakeUp()
	{
		return $this->db->query("Select * From tb_makeup")->result();
	}

	public function getById($id)
	{
		// return $this->db->get_where($this->_table, ["id_paket" => $id])->result();
		return $this->db->query("Select
        tb_paket_makeup.id_paket,
        tb_paket_makeup.id_makeup,
        tb_paket_makeup.nm_paket,
        tb_makeup.nm_makeup,
        tb_makeup.lokasi_makeup,
        tb_paket_makeup.harga_paket,
        tb_paket_makeup.deskripsi,
        tb_paket_makeup.biaya_dp,
        tb_paket_makeup.foto,
        tb_paket_makeup.batas_booking_per_hari,
        tb_paket_makeup.jumlah_orang,
        tb_makeup.nm_makeup
    From
        tb_paket_makeup Join
        tb_makeup On tb_paket_makeup.id_makeup = tb_makeup.id_makeup Where tb_paket_makeup.id_paket='$id'")->result();
	}

	public function getKota()
	{
		return $this->db->query("select * from tb_kota")->result();
	}

	public function save($post, $file)
	{
		$data = [];
		$data['nm_paket'] = $post["nm_paket"];
		$data['harga_paket'] = $post["harga_paket"];
		$data['id_makeup'] = $post["id_makeup"];
		$data['deskripsi'] = str_replace(PHP_EOL, "<br>", $post["deskripsi"]);
		$data['batas_booking_per_hari'] = $post["batas_booking_per_hari"];
		$data['jumlah_orang'] = 1;
		$data['biaya_dp'] = $post["biaya_dp"];
		$data['foto'] = $file['foto']['name'];

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

	public function update($post, $id, $file, $foto_lama)
	{

		$data = [];
		$data['nm_paket'] = $post["nm_paket"];
		$data['harga_paket'] = $post["harga_paket"];
		$data['id_makeup'] = $post["id_makeup"];
		$data['deskripsi'] = str_replace(PHP_EOL, "<br>", $post["deskripsi"]);
		$data['batas_booking_per_hari'] = $post["batas_booking_per_hari"];
		// $data['jumlah_orang'] = 1;
		$data['biaya_dp'] = $post["biaya_dp"];
		$data['foto'] = $file["foto"]["name"];

		if ($data['foto'] != '') {
			$config['upload_path'] = './assets/upload';
			$config['allowed_types'] = '*';
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$data['foto'] = $this->upload->data('file_name');
				// $this->db->set('foto', $data['foto']);
			}
		} else {
			$data['foto'] = $foto_lama;
		}
		return $this->db->update($this->_table, $data, array($this->primaryKey => $id));
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array($this->primaryKey => $id));
	}
}
