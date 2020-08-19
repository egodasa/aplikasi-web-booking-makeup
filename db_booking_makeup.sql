-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tb_booking`;
CREATE TABLE `tb_booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengguna` int(11) NOT NULL,
  `tgl_booking` datetime NOT NULL,
  `tgl_makeup` datetime NOT NULL,
  `nama_booking` varchar(100) NOT NULL,
  `alamat_booking` varchar(255) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `status` enum('Belum Bayar DP','Sudah Bayar DP','Sudah Lunas','Dibatalkan') NOT NULL,
  `keterangan` text NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `sudah_bayar` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_bukti_bayar`;
CREATE TABLE `tb_bukti_bayar` (
  `id_bukti` int(11) NOT NULL AUTO_INCREMENT,
  `id_booking` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_rekening` varchar(100) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `status` enum('Belum Bayar DP','Sudah Bayar DP','Sudah Lunas','Pembayaran Ditolak') NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_bukti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_fitur_paket`;
CREATE TABLE `tb_fitur_paket` (
  `id_fitur` int(11) NOT NULL AUTO_INCREMENT,
  `id_paket` int(11) NOT NULL,
  `nm_fitur` varchar(255) NOT NULL,
  PRIMARY KEY (`id_fitur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_makeup`;
CREATE TABLE `tb_makeup` (
  `id_makeup` int(11) NOT NULL AUTO_INCREMENT,
  `nm_makeup` varchar(100) NOT NULL,
  PRIMARY KEY (`id_makeup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_paket_makeup`;
CREATE TABLE `tb_paket_makeup` (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `nm_paket` varchar(100) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `deskripsi` text,
  `batas_booking_per_hari` int(11) NOT NULL,
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `level` enum('Admin','Klien') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(100) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2020-08-19 03:58:20
