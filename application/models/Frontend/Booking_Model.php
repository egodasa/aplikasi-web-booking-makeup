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
		$data['tgl_booking'] = $post["tgl_booking"];
		$data['tgl_makeup'] = $post["tgl_makeup"];
		$data['nama_booking'] = $post["nama_booking"];
		$data['alamat_booking'] = $post["alamat_booking"];
		$data['id_kota'] = $post["id_kota"];
		// $data['status'] = $post["status"];
		$data['keterangan'] = $post["keterangan"];
		// $data['total_bayar'] = $post["total_bayar"];
		// $data['sudah_bayar'] = $post["sudah_bayar"];
		return $this->db->insert($this->_table, $data);
	}

	public function update($post, $id)
	{
		$data             = [];
		$data['id_pengguna']    = $post["id_pengguna"];
		$data['tgl_booking']    = $post["tgl_booking"];
		$data['tgl_makeup']     = $post["tgl_makeup"];
		$data['nama_booking']   = $post["nama_booking"];
		$data['alamat_booking'] = $post["alamat_booking"];
		$data['id_kota']        = $post["id_kota"];
		$data['status']         = $post["status"];
		$data['keterangan']     = $post["keterangan"];
		$data['total_bayar']    = $post["total_bayar"];
		$data['sudah_bayar']    = $post["sudah_bayar"];
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
        tb_makeup.nm_makeup,
        tb_pengguna.id_pengguna,
        tb_kota.tarif
    From
        tb_booking Join
        tb_paket_makeup On tb_booking.id_paket = tb_paket_makeup.id_paket Join
        tb_kota On tb_booking.id_kota = tb_kota.id_kota Join
		tb_pengguna On tb_booking.id_pengguna =tb_pengguna.id_pengguna Join
		tb_makeup On tb_paket_makeup.id_makeup =tb_makeup.id_makeup  
		where tb_booking.status='Sudah Lunas'")->result();
	}

	public function cetakLaporan($dari, $sampai, $paket)
	{
		$kondisi_tambahan = "";
		if (!empty($paket)) {
			$kondisi_tambahan .= " AND tb_paket_makeup.id_paket = " . $paket;
		}
		return $this->db->query("Select
        tb_booking.id_booking,
        tb_booking.nama_booking,
        tb_booking.alamat_booking,
        tb_booking.tgl_booking,
        tb_booking.status,
        tb_paket_makeup.nm_paket,
        tb_paket_makeup.harga_paket,
        tb_pengguna.id_pengguna,
		tb_kota.tarif,
		tb_makeup.nm_makeup 
    From
        tb_booking Join
        tb_paket_makeup On tb_booking.id_paket =
        tb_paket_makeup.id_paket Join
        tb_kota On tb_booking.id_kota = tb_kota.id_kota Join
        tb_pengguna On tb_booking.id_pengguna =
		tb_pengguna.id_pengguna JOIN 
		tb_makeup On tb_paket_makeup.id_makeup = tb_makeup.id_makeup where tb_booking.status='Sudah Lunas' AND tb_booking.tgl_booking BETWEEN '$dari' AND '$sampai' " . $kondisi_tambahan)->result();
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
		$paket = $get["paket"];

		if (!empty($dari) and !empty($sampai)) {
			return $this->db->query("SELECT
			tb_booking.id_booking,
			tb_booking.nama_booking,
			tb_booking.alamat_booking,
			tb_booking.tgl_booking,
			tb_booking.status,
			tb_paket_makeup.nm_paket,
			tb_paket_makeup.id_paket,
			tb_makeup.nm_makeup,
			tb_paket_makeup.harga_paket,
			tb_pengguna.id_pengguna,
			tb_kota.tarif
		From
			tb_booking Join
			tb_paket_makeup On tb_booking.id_paket = tb_paket_makeup.id_paket Join
			tb_kota On tb_booking.id_kota = tb_kota.id_kota Join
			tb_pengguna On tb_booking.id_pengguna = tb_pengguna.id_pengguna Join
			tb_makeup On tb_paket_makeup.id_makeup =tb_makeup.id_makeup
			where tb_booking.status='Sudah Lunas'
			AND tb_booking.tgl_booking BETWEEN '$dari' AND '$sampai'
			AND tb_paket_makeup.id_paket = '$paket'
			")->result();
		} else {
			return $this->db->query("SELECT
			tb_booking.id_booking,
			tb_booking.nama_booking,
			tb_booking.alamat_booking,
			tb_booking.tgl_booking,
			tb_booking.status,
			tb_paket_makeup.nm_paket,
			tb_paket_makeup.id_paket,
			tb_makeup.nm_makeup,
			tb_paket_makeup.harga_paket,
			tb_pengguna.id_pengguna,
			tb_kota.tarif
		From
			tb_booking Join
			tb_paket_makeup On tb_booking.id_paket = tb_paket_makeup.id_paket Join
			tb_kota On tb_booking.id_kota = tb_kota.id_kota Join
			tb_pengguna On tb_booking.id_pengguna = tb_pengguna.id_pengguna Join
			tb_makeup On tb_paket_makeup.id_makeup =tb_makeup.id_makeup
			where tb_booking.status='Sudah Lunas'")->result();
		}
	}
}
