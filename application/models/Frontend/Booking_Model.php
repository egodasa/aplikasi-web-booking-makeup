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
        tb_booking.tgl_booking,
        tb_booking.tgl_makeup,
        tb_booking.status,
        tb_paket_makeup.nm_paket,
        tb_paket_makeup.harga_paket,
        tb_pengguna.id_pengguna,
		tb_kota.tarif,
		(tb_booking.status = 'Belum Bayar DP' AND timestampdiff(HOUR, tb_booking.tgl_booking, NOW()) > 12) AS hangus
    From
        tb_booking Join
        tb_paket_makeup On tb_booking.id_paket =
        tb_paket_makeup.id_paket Join
        tb_kota On tb_booking.id_kota = tb_kota.id_kota Join
        tb_pengguna On tb_booking.id_pengguna =
        tb_pengguna.id_pengguna Where tb_booking.id_pengguna='$id'")->result();
	}

	public function tampilPemesanan()
	{
		return $this->db->query("Select
        tb_paket_makeup.id_paket,
		tb_paket_makeup.nm_paket,
		tb_booking.status
    From
        tb_booking Join
        tb_paket_makeup On tb_booking.id_paket =
	    tb_paket_makeup.id_paket Join WHERE tb_booking.status = 'Sudah Lunas'");
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
        tb_booking.tgl_makeup,
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
        tb_booking.tgl_makeup,
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
			tb_booking.tgl_makeup,
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
			tb_booking.tgl_makeup,
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

	public function apakahBisaBookingPaket($id_paket, $tanggal)
	{
		$booking = $this->db->query("Select Count(tb_booking.id_booking) As banyak_booking,
				tb_paket_makeup.batas_booking_per_hari 
				 From 
				tb_paket_makeup Inner Join 
				tb_makeup On tb_makeup.id_makeup = tb_paket_makeup.id_makeup Inner Join
				 tb_booking On tb_booking.id_paket = tb_paket_makeup.id_paket 
				WHERE (tb_booking.status = 'Belum Bayar DP' AND timestampdiff(HOUR, tb_booking.tgl_booking, NOW()) < 12 AND DATE(tb_booking.tgl_makeup) = '$tanggal' AND tb_paket_makeup.id_paket = $id_paket) 
				OR (tb_booking.status IN ('Sudah Bayar DP', 'Sudah Lunas') AND DATE(tb_booking.tgl_makeup) = '$tanggal' AND tb_paket_makeup.id_paket = $id_paket)")->row();
		return $booking->banyak_booking + 1 <= $booking->batas_booking_per_hari;
	}

	public function tanggalSudahBooking($id_paket, $maksimal_pekerja)
	{
		$booking = $this->db->query("Select DATE(tb_booking.tgl_makeup) AS tgl_makeup, Count(tb_booking.id_booking) As banyak_booking,
				tb_paket_makeup.batas_booking_per_hari, SUM(tb_paket_makeup.jumlah_orang) AS jumlah_orang  
				 From 
				tb_paket_makeup Inner Join 
				tb_makeup On tb_makeup.id_makeup = tb_paket_makeup.id_makeup Inner Join
				 tb_booking On tb_booking.id_paket = tb_paket_makeup.id_paket 
				WHERE (tb_booking.status = 'Belum Bayar DP' AND timestampdiff(HOUR, tb_booking.tgl_booking, NOW()) < 12) 
				OR (tb_booking.status IN ('Sudah Bayar DP', 'Sudah Lunas')) GROUP BY tb_booking.tgl_makeup")->result();

		$list_tanggal = array();
		foreach ($booking as $value) {
			if ($value->jumlah_orang + $maksimal_pekerja >= 5) {
				$list_tanggal[] = $value->tgl_makeup;
			}
		}
		return $list_tanggal;
	}
}
