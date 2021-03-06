-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2020 at 08:15 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_booking_makeup`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(2, 'admin', 'admin', 'admin'),
(3, 'ratihmua', 'ratihmua', 'Ratih Wahyuni Islami');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE IF NOT EXISTS `tb_booking` (
  `id_booking` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `tgl_booking` datetime NOT NULL,
  `tgl_makeup` datetime NOT NULL,
  `nama_booking` varchar(50) NOT NULL,
  `alamat_booking` text NOT NULL,
  `id_kota` int(11) NOT NULL,
  `status` enum('Belum Bayar DP','Sudah Bayar DP','Sudah Lunas','Dibatalkan','Menunggu Konfirmasi') NOT NULL DEFAULT 'Belum Bayar DP',
  `keterangan` text NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `sudah_bayar` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`id_booking`, `id_pengguna`, `id_paket`, `tgl_booking`, `tgl_makeup`, `nama_booking`, `alamat_booking`, `id_kota`, `status`, `keterangan`, `total_bayar`, `sudah_bayar`) VALUES
(10, 2, 4, '2020-08-01 00:00:00', '2020-08-11 00:00:00', 'Aditya', 'Padang', 2, 'Sudah Lunas', 'Keterangan', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bukti_bayar`
--

CREATE TABLE IF NOT EXISTS `tb_bukti_bayar` (
  `id_bukti` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `status_bukti` enum('Pembayaran Diterima','Pembayaran Ditolak','Menunggu Konfirmasi') DEFAULT 'Menunggu Konfirmasi',
  `bukti_foto` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bukti_bayar`
--

INSERT INTO `tb_bukti_bayar` (`id_bukti`, `id_booking`, `nama`, `no_rekening`, `bank`, `status_bukti`, `bukti_foto`) VALUES
(3, 10, 'Aditya Agusta', '7874', 'BRI', 'Pembayaran Diterima', 'transaksi.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_karya`
--

CREATE TABLE IF NOT EXISTS `tb_hasil_karya` (
  `id_karya` int(11) NOT NULL,
  `nm_karya` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL,
  `id_makeup` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil_karya`
--

INSERT INTO `tb_hasil_karya` (`id_karya`, `nm_karya`, `deskripsi`, `foto`, `id_makeup`) VALUES
(15, 'Wedding', '-', 'akad_dea.jpeg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kota`
--

CREATE TABLE IF NOT EXISTS `tb_kota` (
  `id_kota` int(11) NOT NULL,
  `nm_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kota`
--

INSERT INTO `tb_kota` (`id_kota`, `nm_kota`, `tarif`) VALUES
(2, 'Solok', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_makeup`
--

CREATE TABLE IF NOT EXISTS `tb_makeup` (
  `id_makeup` int(11) NOT NULL,
  `nm_makeup` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_makeup`
--

INSERT INTO `tb_makeup` (`id_makeup`, `nm_makeup`, `deskripsi`) VALUES
(4, 'Wedding', '-'),
(5, 'Wisuda', '-'),
(6, 'Perpisahan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket_makeup`
--

CREATE TABLE IF NOT EXISTS `tb_paket_makeup` (
  `id_paket` int(11) NOT NULL,
  `id_makeup` int(11) NOT NULL,
  `nm_paket` varchar(100) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `deskripsi` text,
  `batas_booking_per_hari` int(11) NOT NULL,
  `biaya_dp` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket_makeup`
--

INSERT INTO `tb_paket_makeup` (`id_paket`, `id_makeup`, `nm_paket`, `harga_paket`, `deskripsi`, `batas_booking_per_hari`, `biaya_dp`, `foto`) VALUES
(4, 4, 'Paket 1', 1250000, 'Hanya 1 Kali makeup pengantin, misalkan makeup Akad atau resepsi', 0, 500000, 'wedding_1.jpeg'),
(6, 4, 'Paket 2', 2400000, 'Makeup akad dan resepsi  untuk tanggal akad dan resepsi meyesuaikan', 0, 500000, 'MAKEUP_20190826180828_save.jpg'),
(7, 4, 'Paket 3', 3000000, '2 kali makeup akad dan resepsi <br>\r\n1 baju pengantin bebas pilih sesuai stock yang tersedia <br>\r\nMakeup orang tua atau keluarga free 2 orang di makeup <br>\r\nDapat soflent ', 0, 500000, 'wedding_3.jpeg'),
(8, 4, 'Paket 4', 750000, 'Free pasang hijau atau sanggul dan mengikuti ke mana klient foto prawedding sesuai keinginan klient', 0, 0, 'prawedding.jpeg'),
(9, 4, 'Paket tambah', 150000, 'Khusus  tambah makeup keluarga hitungan per orang', 0, 0, 'paket_+.jpeg'),
(10, 5, 'Paket 1', 300000, 'Free softlens', 0, 0, 'wisuda_2.jpeg'),
(11, 5, 'Paket 2', 250000, 'Makeup saja', 0, 0, 'Wisuda_1.jpeg'),
(12, 5, 'Paket tambah', 150000, 'Makeup orang tua atau keluarga lainnya ( khusus hanya untuk orang tua atau keluarga client )', 0, 0, 'MAKEUP_20190603223717_save.jpg'),
(13, 6, 'Paket 1', 200000, 'Hanya makeup saja', 0, 0, 'perpisahaan_1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE IF NOT EXISTS `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `level` enum('Admin','Klien') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `level`, `jenis_kelamin`, `email`, `nohp`) VALUES
(1, 'user', 'user', 'Klien', 'Laki-laki', 'user@gmail.com', '085266353628'),
(2, 'adit', 'adit', 'Klien', 'Laki-laki', 'bityni', 'byjek');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_booking`
--
ALTER TABLE `tb_booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
  ADD PRIMARY KEY (`id_bukti`);

--
-- Indexes for table `tb_hasil_karya`
--
ALTER TABLE `tb_hasil_karya`
  ADD PRIMARY KEY (`id_karya`);

--
-- Indexes for table `tb_kota`
--
ALTER TABLE `tb_kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `tb_makeup`
--
ALTER TABLE `tb_makeup`
  ADD PRIMARY KEY (`id_makeup`);

--
-- Indexes for table `tb_paket_makeup`
--
ALTER TABLE `tb_paket_makeup`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_hasil_karya`
--
ALTER TABLE `tb_hasil_karya`
  MODIFY `id_karya` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_makeup`
--
ALTER TABLE `tb_makeup`
  MODIFY `id_makeup` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_paket_makeup`
--
ALTER TABLE `tb_paket_makeup`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
