-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2020 at 12:41 PM
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
(72, 16, 4, '2020-09-22 18:09:32', '2020-10-31 00:00:00', 'Ratih Wahyuni Islami', 'Jorong Rawang Nagri sulit Air Kec X koto di atas Kab Solok Sumatra Barat', 9, 'Sudah Lunas', 'waktu akad belum pasti kak nanti di konfirmasi lewat wa', 500000, 500000, 0),
(73, 16, 19, '2020-09-22 18:13:19', '2020-09-30 00:00:00', 'Ratih Wahyuni Islami', 'jorong rawang nagari sulit air kab solok sumatra barat', 13, 'Belum Bayar DP', 'lokasi nanti dikonfirmasi foto di wa kak', 390000, 400000, 0),
(74, 17, 6, '2020-09-22 18:16:48', '2020-10-30 00:00:00', 'Rasmi Saputri', 'Jorong linawan rt 24 payahkumbuah sumatra barat', 9, 'Sudah Lunas', 'untuk tanggal akad dan respsi sama \r\nwaaktu akad  pagi resepsi sore ', 1250000, 500000, 0),
(76, 18, 4, '2020-09-22 19:09:31', '2020-10-25 00:00:00', 'Prima Tri Dewi', 'jrong kapiang rt24 pariaman ', 11, 'Sudah Lunas', 'waktu akad jam 10 siang kak', 500000, 500000, 0),
(80, 19, 7, '2020-09-22 22:11:26', '2020-10-24 00:00:00', 'Hasnah', 'belimbing kuranji rt 24 kota padang', 10, 'Sudah Lunas', 'tanggal \r\nakad 27-10-2020', 2310000, 500000, 0),
(81, 19, 19, '2020-09-22 22:14:18', '2020-11-30 00:00:00', 'Aghesa Qonita', 'jln koto tuo nagari sulit air solok', 13, 'Sudah Lunas', 'untuk foto preweding di puncak cinangkiak solok kak', 390000, 400000, 0),
(82, 20, 15, '2020-09-22 22:17:27', '2020-09-23 00:00:00', 'Vina Novalia', 'kota paang sumatra barat', 7, 'Sudah Lunas', 'wisuda UNP', 150000, 150000, 0),
(84, 20, 17, '2020-09-22 22:23:27', '2020-09-30 00:00:00', 'Hanifah', 'padang', 7, 'Menunggu Konfirmasi', 'wisuda unand', 150000, 100000, 0),
(85, 21, 18, '2020-09-22 22:31:29', '2020-09-30 00:00:00', 'Sndra Anggraini', 'kuranji kota padang sumatra barat ', 7, 'Menunggu Konfirmasi', 'makeup Perpisahan SMAMuhammadiyah Simpang haru', 100000, 100000, 0),
(86, 16, 18, '2020-09-23 17:27:38', '2020-09-26 00:00:00', 'Azkiya', 'kota padang', 7, 'Belum Bayar DP', 'perpisahan smk 5 padang', 100000, 100000, 0),
(87, 16, 18, '2020-09-23 19:19:38', '2020-09-24 00:00:00', 'Kinara', 'kota ', 7, 'Menunggu Konfirmasi', 'makeup perpisahaan SMA 5 padang', 100000, 100000, 0),
(88, 23, 4, '2020-09-24 17:27:42', '2020-09-30 00:00:00', 'Rasmi Saputri', 'jorong rawang', 13, 'Sudah Lunas', 'waktu akad jam 10 pagi', 540000, 500000, 0),
(89, 16, 4, '2020-09-24 17:56:21', '2020-09-30 00:00:00', 'Ratih Wahyuni Islami', 'jorong rawang nagari sulit air kab solok sumatra barat', 13, 'Sudah Lunas', 'waktu akad jam 10 pagi', 540000, 500000, 0),
(90, 0, 4, '2020-09-29 22:38:53', '2020-10-29 00:00:00', 'Laras', 'solok', 10, 'Belum Bayar DP', 'akad jam 10', 350000, 400000, 0),
(91, 16, 4, '2020-09-29 22:40:50', '2020-11-29 00:00:00', 'Laras', 'jorong koto tuo sulit iar solok', 13, 'Menunggu Konfirmasi', 'jam akad jam 10', 390000, 400000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bukti_bayar`
--

CREATE TABLE `tb_bukti_bayar` (
  `id_bukti` int(11) NOT NULL,
  `id_booking` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `status_bukti` enum('Pembayaran Diterima','Pembayaran Ditolak','Menunggu Konfirmasi') DEFAULT 'Menunggu Konfirmasi',
  `bukti_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bukti_bayar`
--

INSERT INTO `tb_bukti_bayar` (`id_bukti`, `id_booking`, `nama`, `bank`, `status_bukti`, `bukti_foto`) VALUES
(6, 52, 'Rasmi Saputri', 'BRI', 'Pembayaran Diterima', '111bbi.JPG'),
(7, 53, 'Rasmi Saputri', 'BRI', 'Pembayaran Diterima', '1.JPG'),
(8, 54, 'prima', 'BRI', 'Pembayaran Diterima', '1.png'),
(9, 55, 'aziya salsabillah', 'BRI', 'Pembayaran Diterima', '04_2.JPG'),
(10, 56, 'Aghesa', 'BRI', 'Pembayaran Diterima', '04_1.JPG'),
(11, 59, 'hanifah', 'BRI', 'Pembayaran Diterima', '11.JPG'),
(12, 62, 'rina', 'BNI', 'Pembayaran Diterima', '11.png'),
(13, 63, 'Rasmi Saputri', 'BNI', 'Menunggu Konfirmasi', '12.JPG'),
(14, 64, 'Nana', 'BNI', 'Pembayaran Diterima', ''),
(15, 65, 'Aqhesa', 'BNI', 'Pembayaran Diterima', '13.JPG'),
(16, 67, 'nnnn', 'BNI', 'Pembayaran Diterima', '3.JPG'),
(17, 70, 'Rasmi Saputri', 'BNI', 'Menunggu Konfirmasi', '14.JPG'),
(18, 72, 'Ratih Wahyuni Islami', 'BRI', 'Pembayaran Diterima', '12.png'),
(19, 74, 'Rasmi Saputri', 'BNI', 'Pembayaran Diterima', '13.png'),
(20, 75, 'prima', 'BRI', 'Pembayaran Ditolak', '15.JPG'),
(21, 75, 'prima', 'BRI', 'Pembayaran Ditolak', '16.JPG'),
(22, 76, 'prima', 'BNI', 'Pembayaran Diterima', '17.JPG'),
(23, 78, 'prima', 'BNI', 'Menunggu Konfirmasi', '15.png'),
(24, 79, 'prima', 'BNI', 'Menunggu Konfirmasi', '04_11.JPG'),
(25, 80, 'hasnah', 'BRI', 'Pembayaran Diterima', '04_12.JPG'),
(26, 81, 'aqhesa qonita', 'BRI', 'Pembayaran Diterima', '141.JPG'),
(27, 82, 'vina', 'BNI', 'Pembayaran Diterima', '04_13.JPG'),
(28, 83, 'sandra', 'BNI', 'Menunggu Konfirmasi', '04_14.JPG'),
(29, 83, 'sandra', 'BNI', 'Menunggu Konfirmasi', '04_15.JPG'),
(30, 84, 'naifah', 'BNI', 'Menunggu Konfirmasi', '111.JPG'),
(31, 85, 'sandra', 'BNI', 'Menunggu Konfirmasi', '31.JPG'),
(32, 87, 'Rasmi Saputri', 'BRI', 'Menunggu Konfirmasi', '19.JPG'),
(33, 88, 'ratih', 'BRI', 'Pembayaran Diterima', '110.JPG'),
(34, 89, 'Ratih Wahyuni Islami', 'BRI', 'Pembayaran Diterima', '112.JPG'),
(35, 91, 'laras', 'BRI', 'Menunggu Konfirmasi', 'bukti_tf.JPG');

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
(24, 'perpisahan', '', 'perpisahaan_12.jpeg', 10),
(25, 'wisuda', '', 'wisuda_23.jpeg', 9),
(26, 'wedding', '', 'wedding_4.jpeg', 4),
(28, 'wedding', '', 'wedding_6.jpeg', 4),
(29, 'wisuda', '', 'wisuda_4.jpeg', 9),
(30, 'wisuda', '', 'wisuda_5.jpeg', 9),
(31, 'wedding', '', 'wedding_31.jpeg', 4),
(32, 'wedding', '', 'wedding_12.jpeg', 4),
(33, 'prawedding', 'Makeup Prewedding \r\n- mengikuti Kemana pelanggan melakukan foto prewedding sesuai kesepakatan ', 'prawedding_2.jpeg', 8),
(35, 'prawedding', '', 'prawedding_4.jpeg', 8),
(36, 'perpisahan', '', 'perpishan_2.jpeg', 10),
(37, 'wedding', '', 'prawedding8.jpeg', 8);

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
(7, 'Studio Ratih MUA', 0),
(10, 'Padang', 0),
(11, 'Pariaman', 50000),
(12, 'Alahan Panjang', 40000),
(13, 'Solok', 60000),
(14, 'Bukit Tinggi', 70000),
(18, 'payahkumbuh', 60000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_makeup`
--

CREATE TABLE `tb_makeup` (
  `id_makeup` int(11) NOT NULL,
  `nm_makeup` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `lokasi_makeup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_makeup`
--

INSERT INTO `tb_makeup` (`id_makeup`, `nm_makeup`, `deskripsi`, `lokasi_makeup`) VALUES
(4, 'Wedding', 'Makeup Wedding \r\n- Makeup Akad\r\n- Makeup Resepsi', 'Langsung'),
(8, 'Prawedding', 'Makeup Prewedding \r\n- mengikuti Kemana pelanggan melakukan foto prewedding sesuai kesepakatan ', 'Langsung'),
(9, 'Wisuda', 'Makeup Wisuda\r\n- Sistem Makeup Wisuda Antri ( yang duluan datang itu yang di makeup duluan )', 'Studio'),
(10, 'Perpisahan', 'Makeup Wisuda\r\n- Sistem Perpisahan Wisuda Antri ( yang duluan datang itu yang di makeup duluan )', 'Studio');

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
(4, 4, 'Paket 1', 750000, '1 KALI MAKEUP AKAD<br>DIPINJAMKAN AKSESORIS HIJAB ATAU SANGGUL', 1, 400000, 'wedding_1.jpeg', 5),
(6, 4, 'Paket 2', 1000000, '1 KALI MAKEUP RESEPSI <br>DIPASANGKAN SUNTING ATAU YANG LAINNYA<br>DAN 2 ORANG MAKEUP KELUARGA', 1, 500000, 'MAKEUP_20190826180828_save.jpg', 5),
(7, 4, 'Paket 3', 1200000, 'MAKEUP AKAD DAN RESEPSI JIKA TANGGAL SAMA <br>DIPINJAMKAN AKSESORIS HIJAB ATAU SANGGUL <br>2 ORANG MAKEUP KELUARGA <br>TACAP MAKEUP RESEPSI (ganti listip,bulmat,dan tacap bedak)', 1, 500000, 'wedding_3.jpeg', 5),
(15, 9, 'Paket 1', 300000, 'FREE SOFLENT DAN PASANG HIJAB<br>(sistem makeup wisuda antri yang duluan datang yang di makeup)', 4, 150000, 'wisuda_21.jpeg', 1),
(17, 9, 'Paket 2', 250000, 'MAKEUP SAJA<br>(sistem makeup wisuda antri yang duluan datang yang di makeup)', 4, 100000, 'Wisuda_11.jpeg', 1),
(18, 10, 'Perpisahan ', 200000, 'MAKEUP SAJA<br>', 4, 100000, 'perpisahaan_11.jpeg', 1),
(19, 8, 'Prawedding', 750000, 'DIPASANGKAN HIJAB ATAU SANGGUL <br>(mengikuti ke mana pelanggan foto prawedding sesuai keinginan pelanggan)<br>', 1, 400000, 'prawedding7.jpeg', 1);

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
(16, 'Ratih Wahyuni Islami', 'ratih', 'Klien', 'Perempuan', 'rwahyuniislami@gamil.com', '082390156897'),
(17, 'Rasmi Saputri ', 'rasmi', 'Klien', 'Perempuan', 'rasmisaputri16@gmail.com', '082390485968'),
(18, 'prima', 'prima', 'Klien', 'Perempuan', 'primatridewi@gmail.com', '08232387848938'),
(19, 'Hasnah', 'hasnah', 'Klien', 'Perempuan', 'hasnah@gmail.com', '082390887645'),
(20, 'Vina', 'vina', 'Klien', 'Laki-laki', 'vinanovalia@gmail.com', '082390887632'),
(21, 'Sandra', 'sandra', 'Klien', 'Laki-laki', 'rinayxiipa1@gmail.com', '08239088795'),
(22, 'nana', 'nannaadmin', 'Klien', 'Laki-laki', 'rwahyuniislami@gamil.com', '0823908876'),
(23, 'rasmi', 'rasmi', 'Klien', 'Perempuan', 'rwahyuniislami@gamil.com', '0823908879'),
(24, 'ratih wahyuni islami', 'ratih', 'Klien', 'Perempuan', 'rwahyuniislami@gamil.com', '0823908876'),
(25, 'ratih wahyuni islami', 'ratih', 'Klien', 'Perempuan', 'rwahyuniislami@gamil.com', '0823908876'),
(26, 'ratih wahyuni islami', 'ratih', 'Klien', 'Perempuan', 'rwahyuniislami@gamil.com', '0823908876');

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_booking`
--
ALTER TABLE `tb_booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tb_bukti_bayar`
--
ALTER TABLE `tb_bukti_bayar`
  MODIFY `id_bukti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_hasil_karya`
--
ALTER TABLE `tb_hasil_karya`
  MODIFY `id_karya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_makeup`
--
ALTER TABLE `tb_makeup`
  MODIFY `id_makeup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_paket_makeup`
--
ALTER TABLE `tb_paket_makeup`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
