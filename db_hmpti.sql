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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_carousel: ~3 rows (approximately)
DELETE FROM `h_carousel`;
/*!40000 ALTER TABLE `h_carousel` DISABLE KEYS */;
INSERT INTO `h_carousel` (`id_carousel`, `include_logo`, `judul`, `paragraf`, `image`, `posisi`) VALUES
	(1, 1, 'Judul Carousel 1', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'e.jpg', 'start'),
	(2, 0, 'Judul 2', 'Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.', 'a.jpg', 'end'),
	(3, 0, 'Tertawa Bersama', 'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'b.jpg', 'middle');
/*!40000 ALTER TABLE `h_carousel` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_detail_organisasi
DROP TABLE IF EXISTS `h_detail_organisasi`;
CREATE TABLE IF NOT EXISTS `h_detail_organisasi` (
  `id` int(11) NOT NULL,
  `tentang_kami` text NOT NULL DEFAULT '0',
  `visi` text NOT NULL DEFAULT '0',
  `misi` text NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_detail_organisasi: ~1 rows (approximately)
DELETE FROM `h_detail_organisasi`;
/*!40000 ALTER TABLE `h_detail_organisasi` DISABLE KEYS */;
INSERT INTO `h_detail_organisasi` (`id`, `tentang_kami`, `visi`, `misi`) VALUES
	(1, 'HMP TI adalah organisasi yang Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'Visi HMP TI adalah Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'Mengemban misi yaitu Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.');
/*!40000 ALTER TABLE `h_detail_organisasi` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_divisi
DROP TABLE IF EXISTS `h_divisi`;
CREATE TABLE IF NOT EXISTS `h_divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_divisi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_hmpti.h_divisi: ~5 rows (approximately)
DELETE FROM `h_divisi`;
/*!40000 ALTER TABLE `h_divisi` DISABLE KEYS */;
INSERT INTO `h_divisi` (`id_divisi`, `nama_divisi`) VALUES
	(1, 'Ketua & Wakil Ketua'),
	(2, 'Sekretaris'),
	(3, 'Bendahara'),
	(4, 'Divisi 1'),
	(5, 'Divisi 2');
/*!40000 ALTER TABLE `h_divisi` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_jabatan
DROP TABLE IF EXISTS `h_jabatan`;
CREATE TABLE IF NOT EXISTS `h_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) NOT NULL DEFAULT '',
  `id_divisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_jabatan: ~4 rows (approximately)
DELETE FROM `h_jabatan`;
/*!40000 ALTER TABLE `h_jabatan` DISABLE KEYS */;
INSERT INTO `h_jabatan` (`id_jabatan`, `nama_jabatan`, `id_divisi`) VALUES
	(1, 'Ketua', 1),
	(2, 'Wakil Ketua', 1),
	(3, 'Sekretaris 1', 2),
	(4, 'Bendahara 1', 3),
	(5, 'Bendahara 2', 3);
/*!40000 ALTER TABLE `h_jabatan` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_member
DROP TABLE IF EXISTS `h_member`;
CREATE TABLE IF NOT EXISTS `h_member` (
  `nim` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) NOT NULL DEFAULT '0',
  `id_jabatan` int(11) NOT NULL DEFAULT 0,
  `kontak` varchar(500) DEFAULT '',
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB AUTO_INCREMENT=180103070 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_member: ~2 rows (approximately)
DELETE FROM `h_member`;
/*!40000 ALTER TABLE `h_member` DISABLE KEYS */;
INSERT INTO `h_member` (`nim`, `nama`, `id_jabatan`, `kontak`) VALUES
	(180103065, 'Andreas Abi Permana', 1, 'Email: andreas_abi@fikom.udb.ac.id[pisah]Whatsapp:088888888'),
	(180103066, 'Matin', 2, ''),
	(180103067, 'Mbak Jum', 3, ''),
	(180103068, 'Lupa', 4, ''),
	(180103069, 'Mas Tomi', 5, '');
/*!40000 ALTER TABLE `h_member` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
