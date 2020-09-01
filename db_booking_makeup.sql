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
(2,	'admin',	'admin',	'admin'),
(3,	'ratihmua',	'ratihmua',	'Ratih Wahyuni Islami');

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
(10,	2,	4,	'2020-09-01 17:19:03',	'2020-09-01 16:33:17',	'Aditya',	'Padang',	2,	'Sudah Lunas',	'Keterangan',	0,	0,	0),
(11,	3,	4,	'2020-09-01 17:19:03',	'2020-09-01 16:33:17',	'sad',	'ads',	2,	'Belum Bayar DP',	'sadsda',	1760000,	500000,	0),
(12,	3,	4,	'2020-09-01 17:19:03',	'2020-09-01 16:33:17',	'pembeli 1',	'alamat 1',	2,	'Belum Bayar DP',	'alamat 1',	1760000,	500000,	0),
(13,	3,	4,	'2020-09-01 17:19:03',	'2020-09-01 16:33:17',	'pembeli 2',	'dsdsflfsdmmeemfleflfeff',	2,	'Belum Bayar DP',	'dskjffdslljds',	1760000,	500000,	0),
(14,	3,	4,	'2020-09-01 17:19:03',	'2020-09-01 16:33:17',	'sfdsf',	'dsfdsf',	2,	'Belum Bayar DP',	'effe',	1760000,	500000,	0),
(15,	3,	4,	'2020-09-01 17:19:03',	'2020-09-01 16:33:17',	'ergf',	'fdfgfddfresrg',	2,	'Belum Bayar DP',	'ddfdf',	1760000,	500000,	0),
(16,	3,	4,	'2020-09-01 17:19:03',	'2020-09-01 16:33:17',	'werwfsd',	'dsfdsfdsfds',	2,	'Belum Bayar DP',	'sdffdsfdsfdsdfs',	1760000,	500000,	0),
(17,	3,	4,	'2020-09-01 17:19:03',	'2020-09-01 16:33:17',	'sadf',	'sefdsffsdsfd',	2,	'Belum Bayar DP',	'adsfdsfef',	1760000,	500000,	0),
(18,	3,	4,	'2020-09-01 17:19:03',	'2020-09-01 16:33:17',	'dafsdf',	'dsdsfsdfdfsdfdssd',	2,	'Belum Bayar DP',	'sddsfsdfdf',	1760000,	500000,	0),
(19,	3,	4,	'2020-09-01 14:21:33',	'2020-09-03 00:00:00',	'',	'',	2,	'Sudah Lunas',	'',	1760000,	500000,	0),
(20,	3,	4,	'2020-09-01 14:21:33',	'2020-09-03 00:00:00',	'ccssc',	'scss',	2,	'Sudah Lunas',	'xzzcxzc',	1760000,	500000,	0),
(21,	3,	4,	'2020-09-01 14:21:33',	'2020-09-03 00:00:00',	'dzcdzc',	'zdccdcd',	2,	'Sudah Lunas',	'sdsds',	1760000,	500000,	0),
(22,	3,	4,	'2020-09-01 14:21:33',	'2020-09-03 00:00:00',	'effefede',	'aedededed',	2,	'Sudah Lunas',	'sddsfsaeesfae',	1760000,	500000,	0),
(23,	3,	4,	'2020-09-01 14:21:33',	'2020-09-04 00:00:00',	'dscddc',	'zddcdc',	2,	'Sudah Lunas',	'csszcszxs',	1760000,	500000,	0),
(24,	3,	4,	'2020-09-01 14:21:33',	'2020-09-04 00:00:00',	'sddfsdsf',	'asdfdsfdsf',	2,	'Sudah Lunas',	'sddsffds',	1760000,	500000,	0),
(25,	3,	4,	'2020-09-01 14:21:33',	'2020-09-04 00:00:00',	'sdffds',	'fasdeaae',	2,	'Sudah Lunas',	'sdffsdfds',	1760000,	500000,	0),
(26,	3,	4,	'2020-09-01 14:21:33',	'2020-09-04 00:00:00',	'sdfsdf',	'sdffdssfd',	2,	'Sudah Lunas',	'sdffds',	1760000,	500000,	0);

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
(3,	10,	'Aditya Agusta',	'7874',	'BRI',	'Pembayaran Diterima',	'transaksi.png');

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
(15,	'Wedding',	'-',	'akad_dea.jpeg',	4);

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
  PRIMARY KEY (`id_paket`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tb_paket_makeup` (`id_paket`, `id_makeup`, `nm_paket`, `harga_paket`, `deskripsi`, `batas_booking_per_hari`, `biaya_dp`, `foto`) VALUES
(4,	4,	'Paket 1',	1250000,	'Hanya 1 Kali makeup pengantin, misalkan makeup Akad atau resepsi',	4,	500000,	'wedding_1.jpeg'),
(6,	4,	'Paket 2',	2400000,	'Makeup akad dan resepsi  untuk tanggal akad dan resepsi meyesuaikan',	4,	500000,	'MAKEUP_20190826180828_save.jpg'),
(7,	4,	'Paket 3',	3000000,	'2 kali makeup akad dan resepsi <br>\r\n1 baju pengantin bebas pilih sesuai stock yang tersedia <br>\r\nMakeup orang tua atau keluarga free 2 orang di makeup <br>\r\nDapat soflent ',	4,	500000,	'wedding_3.jpeg'),
(8,	4,	'Paket 4',	750000,	'Free pasang hijau atau sanggul dan mengikuti ke mana klient foto prawedding sesuai keinginan klient',	4,	0,	'prawedding.jpeg'),
(9,	4,	'Paket tambah',	150000,	'Khusus  tambah makeup keluarga hitungan per orang',	4,	0,	'paket_+.jpeg'),
(10,	5,	'Paket 1',	300000,	'Free softlens',	4,	0,	'wisuda_2.jpeg'),
(11,	5,	'Paket 2',	250000,	'Makeup saja',	4,	0,	'Wisuda_1.jpeg'),
(12,	5,	'Paket tambah',	150000,	'Makeup orang tua atau keluarga lainnya ( khusus hanya untuk orang tua atau keluarga client )',	4,	0,	'MAKEUP_20190603223717_save.jpg'),
(13,	6,	'Paket 1',	200000,	'Hanya makeup saja',	4,	0,	'perpisahaan_1.jpeg');

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
(3,	'egodasa',	'12345',	'Klien',	'Laki-laki',	'egodasa@gmail.com',	'123456789');

-- 2020-09-01 11:57:12
