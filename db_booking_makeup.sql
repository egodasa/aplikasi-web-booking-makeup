-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(2,	'admin',	'admin',	'admin');

DROP TABLE IF EXISTS `tb_booking`;
CREATE TABLE `tb_booking` (
  `id_booking` int(11) NOT NULL AUTO_INCREMENT,
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
  `sudah_bayar` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_booking`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_booking` (`id_booking`, `id_pengguna`, `id_paket`, `tgl_booking`, `tgl_makeup`, `nama_booking`, `alamat_booking`, `id_kota`, `status`, `keterangan`, `total_bayar`, `dp`, `sudah_bayar`) VALUES
(34,	0,	4,	'2020-09-07 15:38:04',	'0000-00-00 00:00:00',	'ajja',	'ddd',	2,	'Belum Bayar DP',	'ddd',	1760000,	500000,	0),
(35,	0,	4,	'2020-09-07 15:38:32',	'0000-00-00 00:00:00',	'ratih',	'ddddddd',	2,	'Belum Bayar DP',	'ccc',	1760000,	500000,	0),
(36,	0,	6,	'2020-09-07 18:04:53',	'0000-00-00 00:00:00',	'ajja',	'jjjjj',	2,	'Belum Bayar DP',	'mmmm',	2910000,	500000,	0),
(37,	0,	6,	'2020-09-07 18:05:31',	'0000-00-00 00:00:00',	'nnnnn',	'   mmmmmm',	2,	'Belum Bayar DP',	'mmmmmm',	2910000,	500000,	0),
(38,	0,	6,	'2020-09-07 20:28:24',	'2020-09-09 00:00:00',	'zzzzz',	'xxx',	2,	'Belum Bayar DP',	'mmzm',	2910000,	500000,	0),
(39,	0,	4,	'2020-09-07 20:32:33',	'2020-09-10 00:00:00',	'bunga',	'mamma',	2,	'Belum Bayar DP',	'amma',	1760000,	500000,	0),
(40,	0,	4,	'2020-09-07 20:44:49',	'2020-09-09 00:00:00',	'ajja',	'xx',	2,	'Belum Bayar DP',	'zzz',	1760000,	500000,	0),
(41,	0,	6,	'2020-09-07 21:03:45',	'2020-09-11 00:00:00',	'nnna',	'nznz',	2,	'Belum Bayar DP',	'zm',	2910000,	500000,	0),
(42,	4,	4,	'2020-09-07 21:30:09',	'2020-09-12 00:00:00',	'aa',	'mmxmx',	2,	'Sudah Lunas',	'xx',	1760000,	500000,	0),
(43,	4,	4,	'2020-09-07 21:40:11',	'2020-09-08 00:00:00',	'ajja',	'nn',	2,	'Sudah Lunas',	'mm',	1760000,	500000,	0),
(44,	4,	4,	'2020-09-07 21:40:37',	'2020-09-11 00:00:00',	'nmm',	'mmm',	2,	'Belum Bayar DP',	'hhh',	1760000,	500000,	0),
(45,	3,	4,	'2020-09-08 15:07:16',	'2020-09-10 00:00:00',	'Booking 1',	'Alamat 1',	2,	'Belum Bayar DP',	'Keterangan 1',	1760000,	500000,	0),
(46,	3,	10,	'2020-09-08 15:08:31',	'2020-09-09 00:00:00',	'booking 1',	'alamat 1',	2,	'Belum Bayar DP',	'keterangan 1',	310000,	0,	0),
(47,	3,	11,	'2020-09-08 15:08:55',	'2020-09-09 00:00:00',	'Booking 2',	'alamat 2',	2,	'Belum Bayar DP',	'Keterangan 2',	260000,	0,	0),
(48,	3,	6,	'2020-09-08 15:14:58',	'2020-09-23 00:00:00',	'Syahrul',	'Simpang Batipuh',	2,	'Belum Bayar DP',	'Makeup syahrul',	2910000,	500000,	0),
(49,	3,	13,	'2020-09-08 15:16:01',	'2020-09-25 00:00:00',	'Putri',	'Kuranji',	2,	'Belum Bayar DP',	'Makeup perpisahan',	210000,	0,	0);

DROP TABLE IF EXISTS `tb_bukti_bayar`;
CREATE TABLE `tb_bukti_bayar` (
  `id_bukti` int(11) NOT NULL AUTO_INCREMENT,
  `id_booking` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_rekening` varchar(25) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `status_bukti` enum('Pembayaran Diterima','Pembayaran Ditolak','Menunggu Konfirmasi') DEFAULT 'Menunggu Konfirmasi',
  `bukti_foto` text NOT NULL,
  PRIMARY KEY (`id_bukti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_bukti_bayar` (`id_bukti`, `id_booking`, `nama`, `no_rekening`, `bank`, `status_bukti`, `bukti_foto`) VALUES
(3,	10,	'Aditya Agusta',	'7874',	'BRI',	'Pembayaran Diterima',	'transaksi.png'),
(4,	42,	'kkdk',	'msmmsm',	'BNI',	'Pembayaran Diterima',	'1.JPG'),
(5,	43,	'mm',	'  h',	'BNI',	'Pembayaran Diterima',	'1.png');

DROP TABLE IF EXISTS `tb_hasil_karya`;
CREATE TABLE `tb_hasil_karya` (
  `id_karya` int(11) NOT NULL AUTO_INCREMENT,
  `nm_karya` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL,
  `id_makeup` int(11) NOT NULL,
  PRIMARY KEY (`id_karya`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_hasil_karya` (`id_karya`, `nm_karya`, `deskripsi`, `foto`, `id_makeup`) VALUES
(15,	'Wedding',	'-',	'akad_dea.jpeg',	4),
(16,	'wisuda',	'shhsh',	'wisuda_21.jpeg',	5);

DROP TABLE IF EXISTS `tb_kota`;
CREATE TABLE `tb_kota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_kota` (`id_kota`, `nm_kota`, `tarif`) VALUES
(2,	'Solok',	10000);

DROP TABLE IF EXISTS `tb_makeup`;
CREATE TABLE `tb_makeup` (
  `id_makeup` int(11) NOT NULL AUTO_INCREMENT,
  `nm_makeup` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`id_makeup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_makeup` (`id_makeup`, `nm_makeup`, `deskripsi`) VALUES
(4,	'Wedding',	'-'),
(5,	'Wisuda',	'-'),
(6,	'Perpisahan',	'-');

DROP TABLE IF EXISTS `tb_paket_makeup`;
CREATE TABLE `tb_paket_makeup` (
  `id_paket` int(11) NOT NULL AUTO_INCREMENT,
  `id_makeup` int(11) NOT NULL,
  `nm_paket` varchar(100) NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `deskripsi` text,
  `batas_booking_per_hari` int(11) NOT NULL,
  `biaya_dp` int(11) NOT NULL,
  `foto` text NOT NULL,
  `jumlah_orang` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_paket_makeup` (`id_paket`, `id_makeup`, `nm_paket`, `harga_paket`, `deskripsi`, `batas_booking_per_hari`, `biaya_dp`, `foto`, `jumlah_orang`) VALUES
(4,	4,	'Paket 1',	1250000,	'Hanya 1 Kali makeup pengantin, misalkan makeup Akad atau resepsi',	1,	500000,	'wedding_1.jpeg',	5),
(6,	4,	'Paket 2',	2400000,	'Makeup akad dan resepsi  untuk tanggal akad dan resepsi meyesuaikan',	1,	500000,	'MAKEUP_20190826180828_save.jpg',	5),
(7,	4,	'Paket 3',	3000000,	'2 kali makeup akad dan resepsi <br><br>1 baju pengantin bebas pilih sesuai stock yang tersedia <br><br>Makeup orang tua atau keluarga free 2 orang di makeup <br><br>Dapat soflent ',	1,	500000,	'wedding_3.jpeg',	5),
(8,	4,	'Paket 4',	750000,	'Free pasang hijau atau sanggul dan mengikuti ke mana klient foto prawedding sesuai keinginan klient',	4,	0,	'prawedding.jpeg',	5),
(10,	5,	'Paket 1',	300000,	'Free softlens',	4,	0,	'wisuda_2.jpeg',	1),
(11,	5,	'Paket 2',	250000,	'Makeup saja',	4,	0,	'Wisuda_1.jpeg',	1),
(12,	5,	'Paket tambah',	150000,	'Makeup orang tua atau keluarga lainnya ( khusus hanya untuk orang tua atau keluarga client )',	4,	0,	'MAKEUP_20190603223717_save.jpg',	1),
(13,	6,	'Paket 1',	200000,	'Hanya makeup saja',	4,	0,	'perpisahaan_1.jpeg',	1);

DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `level` enum('Admin','Klien') NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pengguna`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_pengguna` (`id_pengguna`, `username`, `password`, `level`, `jenis_kelamin`, `email`, `nohp`) VALUES
(1,	'user',	'user',	'Klien',	'Laki-laki',	'user@gmail.com',	'085266353628'),
(2,	'adit',	'adit',	'Klien',	'Laki-laki',	'bityni',	'byjek'),
(3,	'egodasa',	'12345',	'Klien',	'Laki-laki',	'egodasa@gmail.com',	'123456789'),
(4,	'prima',	'prima',	'Klien',	'Laki-laki',	'rwahyuniislami@gamil.com',	'082390156897'),
(5,	'prima',	'prima',	'Klien',	'Laki-laki',	'rwahyuniislami@gamil.com',	'082390156897'),
(6,	'rasmi',	'rasmi',	'Klien',	'Perempuan',	'rasmi',	'ammam'),
(7,	'user',	'kunin141116',	'Klien',	'Perempuan',	'rwahyuniislami@gamil.com',	'0823908876'),
(8,	'dayat',	'dayat',	'Klien',	'Perempuan',	'dayat@gmail.com',	'08237898736373'),
(9,	'egodasa',	'12345',	'Klien',	'Laki-laki',	'egodasa@gmail.com',	'081266838995');

-- 2020-09-08 08:25:52
