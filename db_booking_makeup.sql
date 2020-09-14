-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2020 at 02:34 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(2, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_booking`
--

CREATE TABLE `tb_booking` (
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
  `dp` int(11) NOT NULL,
  `sudah_bayar` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_booking`
--

INSERT INTO `tb_booking` (`id_booking`, `id_pengguna`, `id_paket`, `tgl_booking`, `tgl_makeup`, `nama_booking`, `alamat_booking`, `id_kota`, `status`, `keterangan`, `total_bayar`, `dp`, `sudah_bayar`) VALUES
(52, 4, 4, '2020-09-08 18:02:21', '2020-10-01 00:00:00', 'Rasmi Saputri', 'Jorong Rawang Nagari Sulit Kab Solok Kec X koto Diatas Kab Solok', 3, 'Sudah Lunas', 'hanya makeup akad saja', 1540000, 500000, 0),
(53, 4, 14, '2020-09-08 18:08:52', '2020-09-26 00:00:00', 'Rasmi Saputri', 'Jorong Rawang Nagari Sulit Air Kab Solok kec X koto Di atas ', 3, 'Sudah Lunas', 'makeup untuk foto prawedding', 1190000, 400000, 0),
(54, 6, 6, '2020-09-08 18:19:52', '2020-09-30 00:00:00', 'Prima Tri Dewi', 'Balimbing Padang', 3, 'Sudah Lunas', 'makeup akad dan resepsi sama', 2290000, 500000, 0),
(55, 6, 15, '2020-09-08 19:29:24', '2020-09-09 00:00:00', 'Azqiya salsabillah', 'alamat payahkumbuah jln imam bojol rt 24', 3, 'Sudah Lunas', 'makeup wisuda politeknik ', 490000, 150000, 0),
(56, 6, 15, '2020-09-08 19:30:25', '2020-09-09 00:00:00', 'Aghesa Qonita', 'jln kubung solok jorong kasang ', 3, 'Sudah Lunas', 'makeup wisuda', 490000, 150000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bukti_bayar`
--

CREATE TABLE `tb_bukti_bayar` (
  `id_bukti` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `status_bukti` enum('Pembayaran Diterima','Pembayaran Ditolak','Menunggu Konfirmasi') DEFAULT 'Menunggu Konfirmasi',
  `bukti_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bukti_bayar`
--

INSERT INTO `tb_bukti_bayar` (`id_bukti`, `id_booking`, `nama`, `no_rekening`, `bank`, `status_bukti`, `bukti_foto`) VALUES
(6, 52, 'Rasmi Saputri', '7241 01 010614  53 8', 'BRI', 'Pembayaran Diterima', '111bbi.JPG'),
(7, 53, 'Rasmi Saputri', '7241 01 010614  53 8', 'BRI', 'Pembayaran Diterima', '1.JPG'),
(8, 54, 'prima', '7241 01 010614  53 8', 'BRI', 'Pembayaran Diterima', '1.png'),
(9, 55, 'aziya salsabillah', '7241 01 010614  53 8', 'BRI', 'Pembayaran Diterima', '04_2.JPG'),
(10, 56, 'Aghesa', 'msmmsm', 'BRI', 'Pembayaran Diterima', '04_1.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hasil_karya`
--

CREATE TABLE `tb_hasil_karya` (
  `id_karya` int(11) NOT NULL,
  `nm_karya` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL,
  `id_makeup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hasil_karya`
--

INSERT INTO `tb_hasil_karya` (`id_karya`, `nm_karya`, `deskripsi`, `foto`, `id_makeup`) VALUES
(15, 'Wedding', '-', 'akad_dea.jpeg', 4),
(16, 'wisuda', 'shhsh', 'wisuda_21.jpeg', 5),
(17, 'prawedding', '', 'prawedding1.jpeg', 7),
(20, 'wedding', '', 'wedding_11.jpeg', 4),
(21, 'wisuda', '-', 'Wisuda_12.jpeg', 9),
(23, 'prawedding', '-', 'prawedding5.jpeg', 8),
(24, 'perpisahan', '', 'perpisahaan_12.jpeg', 10),
(25, 'wisuda', '', 'wisuda_23.jpeg', 9),
(26, 'wedding', '', 'wedding_4.jpeg', 4),
(28, 'wedding', '', 'wedding_6.jpeg', 4),
(29, 'wisuda', '', 'wisuda_4.jpeg', 9),
(30, 'wisuda', '', 'wisuda_5.jpeg', 9),
(31, 'wedding', '', 'wedding_31.jpeg', 4),
(32, 'wedding', '', 'wedding_12.jpeg', 4),
(33, 'prawedding', '', 'prawedding_2.jpeg', 8),
(34, 'prawedding', '', 'prawedding_21.jpeg', 8),
(35, 'prawedding', '', 'prawedding_4.jpeg', 8),
(36, 'perpisahan', '', 'perpishan_2.jpeg', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kota`
--

CREATE TABLE `tb_kota` (
  `id_kota` int(11) NOT NULL,
  `nm_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kota`
--

INSERT INTO `tb_kota` (`id_kota`, `nm_kota`, `tarif`) VALUES
(3, 'Solok', 40000),
(4, 'Payahkumbuah', 50000),
(5, 'Padang', 30000),
(6, 'Pariaman', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_makeup`
--

CREATE TABLE `tb_makeup` (
  `id_makeup` int(11) NOT NULL,
  `nm_makeup` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_makeup`
--

INSERT INTO `tb_makeup` (`id_makeup`, `nm_makeup`, `deskripsi`) VALUES
(4, 'Wedding', ''),
(8, 'Prawedding', '-'),
(9, 'Wisuda', '-'),
(10, 'Perpisahan', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket_makeup`
--

CREATE TABLE `tb_paket_makeup` (
  `id_paket` int(11) NOT NULL,
  `id_makeup` int(11) NOT NULL,
  `nm_paket` varchar(100) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `batas_booking_per_hari` int(11) NOT NULL,
  `biaya_dp` int(11) NOT NULL,
  `foto` text NOT NULL,
  `jumlah_orang` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket_makeup`
--

INSERT INTO `tb_paket_makeup` (`id_paket`, `id_makeup`, `nm_paket`, `harga_paket`, `deskripsi`, `batas_booking_per_hari`, `biaya_dp`, `foto`, `jumlah_orang`) VALUES
(4, 4, 'Paket 1', 1000000, 'Hanya 1 Kali makeup pengantin, misalkan makeup Akad atau resepsi<br>', 1, 500000, 'wedding_1.jpeg', 5),
(6, 4, 'Paket 2', 1750000, 'Makeup akad dan resepsi  untuk tanggal akad dan resepsi meyesuaikan<br><br>isi di keterangan ketika pemesanan <br><br>pilih salah satu tanggal akad dan di keterangan tgl resepsi', 1, 500000, 'MAKEUP_20190826180828_save.jpg', 5),
(7, 4, 'Paket 3', 2750000, '2 kali makeup akad dan resepsi <br><br>1 baju pengantin bebas pilih sesuai stock yang tersedia <br><br>Makeup orang tua atau keluarga free 2 orang di makeup <br><br>Dapat soflent ', 1, 500000, 'wedding_3.jpeg', 5),
(14, 8, 'Paket 1', 750000, 'free pasang hijau atau sanggul dan mengikuti ke mana pelanggan foto prawedding sesuai keinginan pelanggan<br><br>', 1, 400000, 'prawedding4.jpeg', 1),
(15, 9, 'Paket 1', 300000, 'free  soflent dan pasang hijab', 4, 150000, 'wisuda_21.jpeg', 1),
(17, 9, 'Paket 2', 250000, 'Makeup saja', 4, 150000, 'Wisuda_11.jpeg', 1),
(18, 10, 'Paket 1', 200000, 'makeup saja ', 4, 100000, 'perpisahaan_11.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `level` enum('Admin','Klien') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `level`, `jenis_kelamin`, `email`, `nohp`) VALUES
(1, 'user', 'user', 'Klien', 'Laki-laki', 'user@gmail.com', '085266353628'),
(2, 'adit', 'adit', 'Klien', 'Laki-laki', 'bityni', 'byjek'),
(3, 'egodasa', '12345', 'Klien', 'Laki-laki', 'egodasa@gmail.com', '123456789'),
(4, 'prima', 'prima', 'Klien', 'Laki-laki', 'rwahyuniislami@gamil.com', '082390156897'),
(5, 'prima', 'prima', 'Klien', 'Laki-laki', 'rwahyuniislami@gamil.com', '082390156897'),
(6, 'rasmi', 'rasmi', 'Klien', 'Perempuan', 'rasmi', 'ammam'),
(7, 'user', 'kunin141116', 'Klien', 'Perempuan', 'rwahyuniislami@gamil.com', '0823908876'),
(8, 'dayat', 'dayat', 'Klien', 'Perempuan', 'dayat@gmail.com', '08237898736373'),
(9, 'egodasa', '12345', 'Klien', 'Laki-laki', 'egodasa@gmail.com', '081266838995'),
(10, 'prima', 'PRIMA', 'Klien', 'Laki-laki', 'rwahyuniislami@gamil.com', '0823908876'),
(11, 'rasmi', 'rasmi', 'Klien', 'Perempuan', 'rwahyuniislami@gamil.com', '0823908876'),
(12, 'rasmi', 'rasmi', 'Klien', 'Perempuan', 'rwahyuniislami@gamil.com', '0823908876');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_hasil_karya`
--
ALTER TABLE `tb_hasil_karya`
  MODIFY `id_karya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_makeup`
--
ALTER TABLE `tb_makeup`
  MODIFY `id_makeup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_paket_makeup`
--
ALTER TABLE `tb_paket_makeup`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
