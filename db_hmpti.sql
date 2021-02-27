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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_carousel: ~0 rows (approximately)
DELETE FROM `h_carousel`;
/*!40000 ALTER TABLE `h_carousel` DISABLE KEYS */;
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
	(1, 'HMP TI adalah satu organisasi yang Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'Visi HMP TI adalah Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', 'Mengemban misi yaitu Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.', '#333333', '#EDEDED', 'logo.png?1614386160');
/*!40000 ALTER TABLE `h_detail_organisasi` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_divisi
DROP TABLE IF EXISTS `h_divisi`;
CREATE TABLE IF NOT EXISTS `h_divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) NOT NULL DEFAULT '',
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id_divisi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_hmpti.h_divisi: ~2 rows (approximately)
DELETE FROM `h_divisi`;
/*!40000 ALTER TABLE `h_divisi` DISABLE KEYS */;
INSERT INTO `h_divisi` (`id_divisi`, `nama_divisi`, `deskripsi`) VALUES
	(10, 'Ketua & Wakil Ketua', 'Ketua berperan mengoordinasikan seluruh kegiatan, menyusun rencana kegiatan, menyusun laporan pelaksanaan kegiatan, dan memimpin rapat. Wakil Ketua berperan membantu pelaksanaan tugas Ketua dan menjalankan peran Ketua saat Ketua berhalangan.'),
	(11, 'Divisi Riset dan Informasi', 'Divisi yang berada di garda terdepan dalam memunculkan inovasi-inovasi di bidang riset dan informatika.');
/*!40000 ALTER TABLE `h_divisi` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_events
DROP TABLE IF EXISTS `h_events`;
CREATE TABLE IF NOT EXISTS `h_events` (
  `id_event` int(25) NOT NULL DEFAULT 0,
  `thumbnail` varchar(200) NOT NULL DEFAULT '',
  `judul` varchar(150) DEFAULT '',
  `jadwal` int(20) NOT NULL DEFAULT 0,
  `poster` varchar(200) NOT NULL DEFAULT '',
  `deskripsi` text NOT NULL DEFAULT '',
  `publish` int(1) DEFAULT 0,
  `author` varchar(500) DEFAULT '',
  `last_update` int(20) NOT NULL DEFAULT 0,
  `limit_pendaftar` int(4) DEFAULT 0,
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_events: ~0 rows (approximately)
DELETE FROM `h_events`;
/*!40000 ALTER TABLE `h_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `h_events` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_jabatan
DROP TABLE IF EXISTS `h_jabatan`;
CREATE TABLE IF NOT EXISTS `h_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) NOT NULL DEFAULT '',
  `id_divisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_jabatan: ~2 rows (approximately)
DELETE FROM `h_jabatan`;
/*!40000 ALTER TABLE `h_jabatan` DISABLE KEYS */;
INSERT INTO `h_jabatan` (`id_jabatan`, `nama_jabatan`, `id_divisi`) VALUES
	(11, 'Ketua', 10),
	(12, 'Koordinator', 11);
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
) ENGINE=InnoDB AUTO_INCREMENT=190103158 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_member: ~2 rows (approximately)
DELETE FROM `h_member`;
/*!40000 ALTER TABLE `h_member` DISABLE KEYS */;
INSERT INTO `h_member` (`nim`, `email`, `nama`, `id_jabatan`, `kontak`, `deskripsi`, `image`, `aktif`) VALUES
	(180103065, 'andreas_abi@fikom.udb.ac.id', 'ANDREAS ABI PERMANA', 11, '', '', '', 1),
	(180103123, 'widi_dwi@fikom.udb.ac.id', 'WIDI DWI NURCAHYO', 12, '', '', '', 1);
/*!40000 ALTER TABLE `h_member` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_member_login_log
DROP TABLE IF EXISTS `h_member_login_log`;
CREATE TABLE IF NOT EXISTS `h_member_login_log` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '0',
  `time` int(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_member_login_log: ~1 rows (approximately)
DELETE FROM `h_member_login_log`;
/*!40000 ALTER TABLE `h_member_login_log` DISABLE KEYS */;
INSERT INTO `h_member_login_log` (`id`, `email`, `time`) VALUES
	(28, 'widi_dwi@fikom.udb.ac.id', 1614385460);
/*!40000 ALTER TABLE `h_member_login_log` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_panitia
DROP TABLE IF EXISTS `h_panitia`;
CREATE TABLE IF NOT EXISTS `h_panitia` (
  `id_panitia` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `id_event` int(12) NOT NULL DEFAULT 0,
  `peran` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_panitia`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_panitia: ~0 rows (approximately)
DELETE FROM `h_panitia`;
/*!40000 ALTER TABLE `h_panitia` DISABLE KEYS */;
/*!40000 ALTER TABLE `h_panitia` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_pendaftar
DROP TABLE IF EXISTS `h_pendaftar`;
CREATE TABLE IF NOT EXISTS `h_pendaftar` (
  `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) DEFAULT '',
  `nama` varchar(500) DEFAULT '',
  `hp` varchar(20) DEFAULT '',
  `id_event` int(12) NOT NULL DEFAULT 0,
  `kehadiran` varchar(50) DEFAULT '',
  `pembayaran` varchar(50) DEFAULT '',
  `bintang` tinyint(1) NOT NULL DEFAULT 0,
  `saran` varchar(500) DEFAULT '',
  `status` char(16) DEFAULT 'Unset',
  PRIMARY KEY (`id_pendaftar`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_proker: ~0 rows (approximately)
DELETE FROM `h_proker`;
/*!40000 ALTER TABLE `h_proker` DISABLE KEYS */;
/*!40000 ALTER TABLE `h_proker` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
