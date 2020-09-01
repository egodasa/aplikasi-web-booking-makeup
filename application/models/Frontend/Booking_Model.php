<?php defined('BASEPATH') or exit('No direct script access allowed');

class Booking_Model extends CI_Model
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
		$id = $this->session->userdata('id_pengguna');
		return $this->db->query("Select
        tb_booking.id_booking,
        tb_booking.nama_booking,
        tb_booking.alamat_booking,
        tb_booking.status,
        tb_paket_makeup.nm_paket,
        tb_paket_makeup.harga_paket,
        tb_paket_makeup.harga_paket,
        tb_pengguna.id_pengguna,
        tb_kota.tarif
    From
        tb_booking Join
        tb_paket_makeup On tb_booking.id_paket =
        tb_paket_makeup.id_paket Join
        tb_kota On tb_booking.id_kota = tb_kota.id_kota Join
        tb_pengguna On tb_booking.id_pengguna =
        tb_pengguna.id_pengguna Where tb_booking.id_pengguna='$id'")->result();
	}

	public function getById($id)
	{
		return $this->db->get_where($this->_table, [$this->primaryKey => $id])->row();
	}

	public function save($post)
	{
		$data = [];
		$data['id_pengguna'] = $post["id_pengguna"];
		$data['id_paket'] = $post["id_paket"];
		$data['tgl_booking'] = date("Y-m-d H:i:s");
		$data['tgl_makeup'] = $post["tgl_makeup"];
		$data['nama_booking'] = $post["nama_booking"];
		$data['alamat_booking'] = $post["alamat_booking"];
		$data['id_kota'] = $post["id_kota"];
		$data['keterangan'] = $post["keterangan"];
		$data['total_bayar'] = $post["total_bayar"];
		$data['dp'] = $post["dp"];
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

	public function dataLaporan()
	{
		return $this->db->query("Select
        tb_booking.id_booking,
        tb_booking.nama_booking,
        tb_booking.alamat_booking,
        tb_booking.tgl_booking,
        tb_booking.status,
        tb_paket_makeup.nm_paket,
        tb_paket_makeup.harga_paket,
        tb_pengguna.id_pengguna,
        tb_kota.tarif
    From
        tb_booking Join
        tb_paket_makeup On tb_booking.id_paket =
        tb_paket_makeup.id_paket Join
        tb_kota On tb_booking.id_kota = tb_kota.id_kota Join
        tb_pengguna On tb_booking.id_pengguna =
        tb_pengguna.id_pengguna where tb_booking.status='Sudah Lunas'")->result();
	}

	public function cetakLaporan($dari, $sampai)
	{
		return $this->db->query("Select
        tb_booking.id_booking,
        tb_booking.nama_booking,
        tb_booking.alamat_booking,
        tb_booking.tgl_booking,
        tb_booking.status,
        tb_paket_makeup.nm_paket,
        tb_paket_makeup.harga_paket,
        tb_pengguna.id_pengguna,
        tb_kota.tarif
    From
        tb_booking Join
        tb_paket_makeup On tb_booking.id_paket =
        tb_paket_makeup.id_paket Join
        tb_kota On tb_booking.id_kota = tb_kota.id_kota Join
        tb_pengguna On tb_booking.id_pengguna =
        tb_pengguna.id_pengguna where tb_booking.status='Sudah Lunas' AND tb_booking.tgl_booking BETWEEN '$dari' AND '$sampai'")->result();
	}

	public function updateStatusSesudahBayar($id)
	{
		// $data['status'] = "Menunggu Konfirmasi";
		// return $this->db->update($this->_table, $data, array($this->primaryKey => $id));

		$data = array(
			'status' => 'Menunggu Konfirmasi'
		);

		$this->db->where($this->primaryKey, $id);
		return $this->db->update($this->_table, $data);
	}
	public function delete($id)
	{
		return $this->db->delete($this->_table, array($this->primaryKey => $id));
	}

	public function filterLaporan($get)
	{
		$dari = $get["dari"];
		$sampai = $get["sampai"];

		if (!empty($dari) and !empty($sampai)) {
			return $this->db->query("SELECT
			tb_booking.id_booking,
			tb_booking.nama_booking,
			tb_booking.alamat_booking,
			tb_booking.tgl_booking,
			tb_booking.status,
			tb_paket_makeup.nm_paket,
			tb_paket_makeup.harga_paket,
			tb_pengguna.id_pengguna,
			tb_kota.tarif
		From
			tb_booking Join
			tb_paket_makeup On tb_booking.id_paket =
			tb_paket_makeup.id_paket Join
			tb_kota On tb_booking.id_kota = tb_kota.id_kota Join
			tb_pengguna On tb_booking.id_pengguna =
			tb_pengguna.id_pengguna where tb_booking.status='Sudah Lunas'
			AND tb_booking.tgl_booking BETWEEN '$dari' AND '$sampai' 
			")->result();
		} else {
			return $this->db->query("SELECT
			tb_booking.id_booking,
			tb_booking.nama_booking,
			tb_booking.alamat_booking,
			tb_booking.tgl_booking,
			tb_booking.status,
			tb_paket_makeup.nm_paket,
			tb_paket_makeup.harga_paket,
			tb_pengguna.id_pengguna,
			tb_kota.tarif
		From
			tb_booking Join
			tb_paket_makeup On tb_booking.id_paket =
			tb_paket_makeup.id_paket Join
			tb_kota On tb_booking.id_kota = tb_kota.id_kota Join
			tb_pengguna On tb_booking.id_pengguna =
			tb_pengguna.id_pengguna where tb_booking.status='Sudah Lunas'")->result();
		}
	}
	
	public function apakahBisaBookingPaket($id_paket, $tanggal)
	{
		$booking = $this->db->query("Select
					    Count(tb_booking.id_booking) As banyak_booking, 
					tb_paket_makeup.batas_booking_per_hari 
					From
					    tb_paket_makeup Inner Join
					    tb_makeup On tb_makeup.id_makeup = tb_paket_makeup.id_makeup Inner Join
					    tb_booking On tb_booking.id_paket = tb_paket_makeup.id_paket 
					WHERE tb_paket_makeup.id_paket = $id_paket 
					AND DATE(tb_booking.tgl_makeup) = '$tanggal' 
					and ((tb_booking.status = 'Belum Bayar DP' OR tb_booking.status) 
					AND timestampdiff(HOUR, tb_booking.tgl_booking, NOW()) < 1) OR tb_booking.status IN ('Sudah Bayar DP', 'Sudah Lunas')")->row();
		return $booking->batas_booking_per_hari > $booking->banyak_booking; 
	}
}
