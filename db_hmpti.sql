-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table db_hmpti.h_carousel
DROP TABLE IF EXISTS `h_carousel`;
CREATE TABLE IF NOT EXISTS `h_carousel` (
  `id_carousel` int(11) NOT NULL AUTO_INCREMENT,
  `include_logo` int(1) NOT NULL DEFAULT 0,
  `judul` varchar(100) NOT NULL DEFAULT '0',
  `paragraf` varchar(500) NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT '',
  `posisi` varchar(50) DEFAULT '',
  PRIMARY KEY (`id_carousel`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_carousel: ~2 rows (approximately)
DELETE FROM `h_carousel`;
/*!40000 ALTER TABLE `h_carousel` DISABLE KEYS */;
INSERT INTO `h_carousel` (`id_carousel`, `include_logo`, `judul`, `paragraf`, `image`, `posisi`) VALUES
	(11, 1, 'Lungman Petrol', 'Arknight, saya gak main. Cuman sekedar tahu aja.', '1613749647.jpg', 'middle'),
	(12, 0, 'Tentacle Aliens', 'Aquarium', '1613749696.jpg', 'start'),
	(13, 1, 'Jokowi &amp; Putin', 'Kerja sama pembangunan tambang minyak di Tuban, Jawa Timur dengan menggandeng perusahaan petrol asal Russia.', '1613795130.JPG', 'start'),
	(14, 1, 'Car Crash', '', '1613863081.jpg', 'end');
/*!40000 ALTER TABLE `h_carousel` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_detail_organisasi
DROP TABLE IF EXISTS `h_detail_organisasi`;
CREATE TABLE IF NOT EXISTS `h_detail_organisasi` (
  `id` int(11) NOT NULL,
  `tentang_kami` text NOT NULL DEFAULT '0',
  `visi` text NOT NULL DEFAULT '0',
  `misi` text NOT NULL DEFAULT '0',
  `navbar_bg` varchar(50) NOT NULL DEFAULT '0',
  `navbar_text` varchar(50) NOT NULL DEFAULT '0',
  `image` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_detail_organisasi: ~1 rows (approximately)
DELETE FROM `h_detail_organisasi`;
/*!40000 ALTER TABLE `h_detail_organisasi` DISABLE KEYS */;
INSERT INTO `h_detail_organisasi` (`id`, `tentang_kami`, `visi`, `misi`, `navbar_bg`, `navbar_text`, `image`) VALUES
	(1, 'HMP TI adalah satu organisasi yang Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'Visi HMP TI adalah Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'Mengemban misi yaitu Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', '#2A2A2A', '#EFE9E9', 'logo.png?1613450304');
/*!40000 ALTER TABLE `h_detail_organisasi` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_divisi
DROP TABLE IF EXISTS `h_divisi`;
CREATE TABLE IF NOT EXISTS `h_divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) NOT NULL DEFAULT '',
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id_divisi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_hmpti.h_divisi: ~6 rows (approximately)
DELETE FROM `h_divisi`;
/*!40000 ALTER TABLE `h_divisi` DISABLE KEYS */;
INSERT INTO `h_divisi` (`id_divisi`, `nama_divisi`, `deskripsi`) VALUES
	(1, 'Ketua &amp; Wakil Ketua', 'Ketua Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.'),
	(2, 'Sekretaris', 'Sekretaris Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.'),
	(3, 'Bendahara', 'Bendahara Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.'),
	(4, 'Bendahara 1', 'Divisi Riset dan Informasi adalah divisi yang mengurusi '),
	(5, 'Divisi Media dan Informasi', 'Divisi 2 Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.'),
	(7, 'Divisi Riset dan Informasi', 'Kisetsu o chott hippari dashite mitanda. Kisetsu o chott hippari dashite mitanda. Kisetsu o chott hippari dashite mitanda.'),
	(8, 'Divisi Minat Bakat', 'X x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x x');
/*!40000 ALTER TABLE `h_divisi` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_events
DROP TABLE IF EXISTS `h_events`;
CREATE TABLE IF NOT EXISTS `h_events` (
  `id_event` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) DEFAULT '',
  `jadwal` int(20) NOT NULL DEFAULT 0,
  `last_update` int(20) NOT NULL DEFAULT 0,
  `link_daftar` varchar(500) NOT NULL DEFAULT '',
  `thumbnail` varchar(200) NOT NULL DEFAULT '',
  `poster` varchar(200) NOT NULL DEFAULT '',
  `deskripsi` text NOT NULL DEFAULT '',
  `publish` int(1) DEFAULT 0,
  `author` varchar(500) DEFAULT '',
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_events: ~2 rows (approximately)
DELETE FROM `h_events`;
/*!40000 ALTER TABLE `h_events` DISABLE KEYS */;
INSERT INTO `h_events` (`id_event`, `judul`, `jadwal`, `last_update`, `link_daftar`, `thumbnail`, `poster`, `deskripsi`, `publish`, `author`) VALUES
	(1, 'Webinar Evangelion 4.0', 1613808865, 1613204083, 'http://google.com', 'thumb-1613204083.jpg', 'poster1.jpg', '<p>Halo, di sini adalah keterangan untuk contoh event di HMP TI.&nbsp;</p><p>Honkai Impact 4.1 sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.Honkai Impact 4.1 sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.Honkai Impact 4.1 sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.</p><p>Syarat dan Ketentuan:<br><span style="font-size: 1rem;">1. Bla bla bla<br></span><span style="font-size: 1rem;">2. Bla bla bla<br></span>3. Bla bla bla<br>4. Bla bla bla<br>5. Bla bla bla<br>6. Bla bla bla</p><p>Selamat bergabung, dan selamat belajar :D</p>', 1, '0'),
	(2, 'Webinar Evangelion 3.0', 1613108865, 1613204083, 'http://google.com', 'thumb-1613204083.jpg', 'poster-1613204083.jpg', 'Honkai Impact 4.1 sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.', 1, '0');
/*!40000 ALTER TABLE `h_events` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_jabatan
DROP TABLE IF EXISTS `h_jabatan`;
CREATE TABLE IF NOT EXISTS `h_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) NOT NULL DEFAULT '',
  `id_divisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_jabatan: ~9 rows (approximately)
DELETE FROM `h_jabatan`;
/*!40000 ALTER TABLE `h_jabatan` DISABLE KEYS */;
INSERT INTO `h_jabatan` (`id_jabatan`, `nama_jabatan`, `id_divisi`) VALUES
	(1, 'Ketua', 1),
	(2, 'Wakil Ketua', 1),
	(3, 'Sekretaris 1', 2),
	(4, 'Bendahara 1', 3),
	(5, 'Bendahara 2', 3),
	(6, 'Koordinator', 7),
	(7, 'Staf', 5),
	(8, 'Staf', 7),
	(9, 'Koordinator', 5);
/*!40000 ALTER TABLE `h_jabatan` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_member
DROP TABLE IF EXISTS `h_member`;
CREATE TABLE IF NOT EXISTS `h_member` (
  `nim` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT '',
  `nama` varchar(250) NOT NULL DEFAULT '0',
  `id_jabatan` int(11) NOT NULL DEFAULT 0,
  `kontak` varchar(500) DEFAULT '',
  `deskripsi` text DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `aktif` int(1) DEFAULT 1,
  PRIMARY KEY (`nim`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=190103157 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_member: ~9 rows (approximately)
DELETE FROM `h_member`;
/*!40000 ALTER TABLE `h_member` DISABLE KEYS */;
INSERT INTO `h_member` (`nim`, `email`, `nama`, `id_jabatan`, `kontak`, `deskripsi`, `image`, `aktif`) VALUES
	(121212122, 'widi@ggvvvvvvvvvvvvvvv', 'Dummy', 8, '', 'a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a a ', '', 0),
	(180103065, ' andreas_abi@fikom.udb.ac.id', 'Andreas Abi Permana', 1, 'Email: andreas_abi@fikom.udb.ac.id, Whatsapp: 088888888', 'Ketua Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.', '180103065.jpeg?1613381510', 1),
	(180103066, 'f', 'Matin', 2, 'Email: matin@gmail.com', 'Ketua Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.', '180103066.jpg?1613380182', 1),
	(180103067, 'e', 'Mbak Jami', 3, '', 'Sekretaris Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.', '180103067.jpg?1613381569', 1),
	(180103068, 'd', 'Lupa', 0, '', 'Bendahara Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.', '180103068.jpeg?1613381587', 0),
	(180103069, 'c', 'Mas Tomi', 5, '', 'Bendahara Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.', '180103069.jpg?1613381628', 0),
	(180103123, 'b', 'Yulidar', 9, '', 'Yulidar adalah seorang manusia. Manusia yang bernama Yulidar.', '180103123.png?1613404722', 1),
	(180103159, 'widi_dwi@fikom.udb.ac.id', 'Widi Dwi', 6, 'Email: hmpti@gmail.com, Whatsapp: 08XXXXXXXX', 'Aku seorang pelaut. Aku suka memancing ikan cupang.', '180103159.jpg?1613384185', 1),
	(190103155, 'a', 'Yahya', 8, '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '190103155.jpg?1613384119', 1);
/*!40000 ALTER TABLE `h_member` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_member_login_log
DROP TABLE IF EXISTS `h_member_login_log`;
CREATE TABLE IF NOT EXISTS `h_member_login_log` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '0',
  `time` int(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_member_login_log: ~1 rows (approximately)
DELETE FROM `h_member_login_log`;
/*!40000 ALTER TABLE `h_member_login_log` DISABLE KEYS */;
INSERT INTO `h_member_login_log` (`id`, `email`, `time`) VALUES
	(1, 'widi_dwi@fikom.udb.ac.id', 1613883589),
	(2, 'widi_dwi@fikom.udb.ac.id', 1613889760);
/*!40000 ALTER TABLE `h_member_login_log` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_panitia
DROP TABLE IF EXISTS `h_panitia`;
CREATE TABLE IF NOT EXISTS `h_panitia` (
  `id_panitia` int(11) NOT NULL AUTO_INCREMENT,
  `nim` int(12) NOT NULL DEFAULT 0,
  `id_event` int(12) NOT NULL DEFAULT 0,
  `peran` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_panitia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_panitia: ~0 rows (approximately)
DELETE FROM `h_panitia`;
/*!40000 ALTER TABLE `h_panitia` DISABLE KEYS */;
/*!40000 ALTER TABLE `h_panitia` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_pendaftar
DROP TABLE IF EXISTS `h_pendaftar`;
CREATE TABLE IF NOT EXISTS `h_pendaftar` (
  `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) DEFAULT '',
  `id_event` int(12) NOT NULL DEFAULT 0,
  `bintang` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_pendaftar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_pendaftar: ~0 rows (approximately)
DELETE FROM `h_pendaftar`;
/*!40000 ALTER TABLE `h_pendaftar` DISABLE KEYS */;
/*!40000 ALTER TABLE `h_pendaftar` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_proker
DROP TABLE IF EXISTS `h_proker`;
CREATE TABLE IF NOT EXISTS `h_proker` (
  `id_proker` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) DEFAULT '',
  `waktu` varchar(50) DEFAULT '',
  `deskripsi` text DEFAULT '',
  `id_divisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_proker`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_proker: ~2 rows (approximately)
DELETE FROM `h_proker`;
/*!40000 ALTER TABLE `h_proker` DISABLE KEYS */;
INSERT INTO `h_proker` (`id_proker`, `judul`, `waktu`, `deskripsi`, `id_divisi`) VALUES
	(2, 'Makrabs', 'Februari 2021', 'MakrabLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 1),
	(4, 'Choku City', 'Desembar 2022', 'Membuat sesuatu menjadi sesuatu sehingga sesuatu maka sesuatu ini menjadi sesuatu.', 1);
/*!40000 ALTER TABLE `h_proker` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
