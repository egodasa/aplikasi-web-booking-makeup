<?php defined('BASEPATH') or exit('No direct script access allowed');

class Bukti_Model extends CI_Model
{
	private $_table = "tb_bukti_bayar";

	// KITA TIDAK PAKAI PRODUCT ID KARENA SEMUA ID MENGGUNAKAN AUTO INCREMENT
	// public $product_id;
	public $primaryKey = "id_bukti"; // primary key
	public $id_booking; // kolom tabel
	public $nama; // kolom tabel
	public $no_rekening; // kolom tabel
	public $bank; // kolom tabel
	public $butki_foto; // kolom tabel

	public function getAll()
	{
		return $this->db->query("Select
		*
	From
		tb_bukti_bayar Join
		tb_booking On tb_bukti_bayar.id_booking =
				tb_booking.id_booking Join
		tb_paket_makeup On tb_booking.id_paket =
				tb_paket_makeup.id_paket Join
		tb_kota On tb_booking.id_kota = tb_kota.id_kota")->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, [$this->primaryKey => $id])->row();
	}

	public function save($post, $file)
	{
		$data = [];
		$data['id_booking'] = $post["id_booking"];
		$data['nama'] = $post["nama"];
		$data['no_rekening'] = $post["no_rekening"];
		$data['bank'] = $post["bank"];
		$data['bukti_foto'] = $file["bukti_foto"]["name"];
		if ($data['bukti_foto'] != '') {
			$config['upload_path'] = './assets/upload';
			$config['allowed_types'] = '*';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('bukti_foto')) {
				$data['bukti_foto'] = $this->upload->data('file_name');
			} else {
				echo "Foto Gagal DiUpload";
			}
		}

		return $this->db->insert($this->_table, $data);
	}

	public function konfirmasiPembayaran($id, $data)
	{
		// $this->db->where($this->primaryKey, $id);
		// return $this->db->update($this->_table, $data);
		// var_dump($data);
		// exit;
		// echo "UPDATE tb_bukti_bayar SET status_bukti = 'Pembayaran Ditolak' WHERE id_bukti = '$id'";
		// exit;
		if ($_POST['status_bukti'] == "Pembayaran Diterima") {
			$this->db->query("UPDATE tb_booking SET status = 'Sudah Lunas' WHERE id_booking = '$id'");
		} else {
			$this->db->query("UPDATE tb_booking SET status = 'Dibatalkan' WHERE id_booking = '$id'");
		}
		return $this->db->query("UPDATE tb_bukti_bayar SET status_bukti = '$_POST[status_bukti]' WHERE id_booking = '$id'");
	}

	public function delete($id)
	{
		return $this->db->delete($this->_table, array($this->primaryKey => $id));
	}
}
