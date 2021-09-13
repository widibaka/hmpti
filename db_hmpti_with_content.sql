-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_carousel: ~3 rows (approximately)
DELETE FROM `h_carousel`;
/*!40000 ALTER TABLE `h_carousel` DISABLE KEYS */;
INSERT INTO `h_carousel` (`id_carousel`, `include_logo`, `judul`, `paragraf`, `image`, `posisi`) VALUES
	(18, 1, 'HMPTI UDB', 'Himpunan Mahasiswa Prodi Teknik Informatika Universitas Duta Bangsa Surakarta', '1631488054.jpg', 'middle'),
	(19, 1, 'HMPTI UDB', 'Bergerak untuk memajukan sumber daya manusia indonesia dalam mengasah skill di bidang teknologi.', '1631487954.jpg', 'middle'),
	(20, 1, 'HMPTI UDB', 'Menjadi wadah mahasiswa Teknik Informatika Universitas Duta Bangsa untuk berkarya serta ikut andil dalam menggelar acara-acara bertemakan teknologi.', '1631487739.jpg', 'start');
/*!40000 ALTER TABLE `h_carousel` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_detail_organisasi
DROP TABLE IF EXISTS `h_detail_organisasi`;
CREATE TABLE IF NOT EXISTS `h_detail_organisasi` (
  `id` int(11) NOT NULL,
  `nama_organisasi` varchar(150) DEFAULT '',
  `tentang_kami` text NOT NULL DEFAULT '0',
  `visi` text NOT NULL DEFAULT '0',
  `misi` text NOT NULL DEFAULT '0',
  `navbar_bg` varchar(50) NOT NULL DEFAULT '0',
  `navbar_text` varchar(50) NOT NULL DEFAULT '0',
  `image` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_detail_organisasi: ~0 rows (approximately)
DELETE FROM `h_detail_organisasi`;
/*!40000 ALTER TABLE `h_detail_organisasi` DISABLE KEYS */;
INSERT INTO `h_detail_organisasi` (`id`, `nama_organisasi`, `tentang_kami`, `visi`, `misi`, `navbar_bg`, `navbar_text`, `image`) VALUES
	(1, 'HMPTI UDB', 'Himpunan Mahasiswa Prodi Teknik Informatika (HMPTI) Fakultas Ilmu Komputer Universitas Duta Bangsa Surakarta yang bertempat di Kota Surakarta Provinsi Jawa Tengah.', 'Menjadikan Himpunan Mahasiswa Program Studi Teknik Informatika (HMPTI) sebagai himpunan mahasiswa yang berkualitas, unggul, serta aktif berperan meningkatkan kualitas pendidikan mahasiswa Teknik Informatika dengan menyalurkan potensi mahasiswa Teknik Informatika dalam bidang akademik.', '1. Meningkatkan semangat dan kualitas kinerja pengurus HMPTI sesuai program kerja yang ada. \r\n2. Menjalankan kegiatan sesuai dengan program kerja yang ada untuk menyalurkan aspirasi mahasiswa serta menampung kreativitas mahasiswa/i dalam bidang teknologi informatika.\r\n3. Memberi wadah bagi mahasiswa/i Teknik Informatika yang memiliki potensi dalam suatu bidang.\r\n4. Mengembangkan kemampuan mahasiswa Teknik Informatika untuk memiliki jiwa wirausaha dengan memanfaatkan teknologi yang ada.\r\n5. Menjalin komunikasi yang baik dantara pengurus agar tercipta suasana kekeluargaan yang harmonis.\r\n6. Memepererat relasi mahasiswa Teknik Informatika baik relasi internal antara mahasiswa/i Teknik Informatika maupun relasi eksternal dengan program studi lain.', '#FFFFFF', '#3F3C3C', 'logo.png?1624943673');
/*!40000 ALTER TABLE `h_detail_organisasi` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_divisi
DROP TABLE IF EXISTS `h_divisi`;
CREATE TABLE IF NOT EXISTS `h_divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(255) NOT NULL DEFAULT '',
  `deskripsi` text DEFAULT NULL,
  PRIMARY KEY (`id_divisi`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Dumping data for table db_hmpti.h_divisi: ~5 rows (approximately)
DELETE FROM `h_divisi`;
/*!40000 ALTER TABLE `h_divisi` DISABLE KEYS */;
INSERT INTO `h_divisi` (`id_divisi`, `nama_divisi`, `deskripsi`) VALUES
	(10, 'Ketua & Wakil Ketua', 'Ketua berperan mengoordinasikan seluruh kegiatan, menyusun rencana kegiatan, menyusun laporan pelaksanaan kegiatan, dan memimpin rapat. Wakil Ketua berperan membantu pelaksanaan tugas Ketua dan menjalankan peran Ketua saat Ketua berhalangan.'),
	(11, 'Divisi Riset dan Teknologi', 'Divisi yang berperan dalam memunculkan inovasi-inovasi dengan melakukan riset dan pengembangan.'),
	(12, 'Divisi Media dan Informasi', 'Media dan Informasi adalah divisi yang bergerak dalam bidang multimedia dan berfungsi sebagai media penyebaran informasi di lingkup HMTI serta media sosial.'),
	(13, 'Divisi Minat dan Bakat', 'Minat dan Bakat adalah divisi yang berfungsi sebagai wadah yang menaungi minat dan bakat para mahasiswa aktif Teknik Informatika Universitas Duta Bangsa, terutama di bidang teknologi.'),
	(14, 'Bendahara', 'Bendahara sebagai penanggung jawab (pemegang) atau pengurus keuangan.'),
	(15, 'Sekretaris', 'Sekretaris adalah anggota (pengurus) yang mengemban tugas tulis-menulis, atau surat-menyurat.');
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
  `apakah_berbayar` int(1) DEFAULT 0,
  `wajib_bukti_kehadiran` int(1) DEFAULT 0,
  `sertifikat` varchar(50) DEFAULT '',
  `data_tambahan` varchar(500) DEFAULT '',
  PRIMARY KEY (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_events: ~5 rows (approximately)
DELETE FROM `h_events`;
/*!40000 ALTER TABLE `h_events` DISABLE KEYS */;
INSERT INTO `h_events` (`id_event`, `thumbnail`, `judul`, `jadwal`, `poster`, `deskripsi`, `publish`, `author`, `last_update`, `limit_pendaftar`, `apakah_berbayar`, `wajib_bukti_kehadiran`, `sertifikat`, `data_tambahan`) VALUES
	(0, 'thumb-1624963579.jpg?1624964280', 'SIBARMATI - Sinau CRUD Bareng', 1622291400, 'poster-1624963579.jpg?1624963838', '<p>Belajar bareng tentang CRUD memakai bahasa pemrograman PHP.</p>', 1, 'WIDI DWI NURCAHYO', 1624965403, 0, 0, 0, '', ''),
	(1624963850, 'thumb-1624963850.jpg?1624964180', 'SIBARMATI - Sinau Deployment Bareng', 1630933200, 'poster-1624963850.jpg?1624964180', '<p>Sinau bareng cara set up deploy website berbasis PHP secara otomatis memakai GITLAB CI</p><p><a href="http://google.com" target="_blank">whatsapp</a></p>', 1, 'Widi Dwi Nurcahyo', 1631003296, 1, 0, 1, 'sertifikat-1624963850.jpeg?1631023720', ''),
	(1624965855, 'thumb-1624965855.jpg?1624966103', 'WEBINAR ANDROID FUNDAMENTAL', 1617429600, 'poster-1624965855.jpg?1624965983', '<p>Kegiatan ini dilaksanakan oleh Divisi Minat dan\r\nBakat Himpunan Mahasiswa Prodi Teknik Informatika Fakultas Ilmu Komputer Universitas\r\nDuta Bangsa Surakarta, yang di ikuti oleh Mahasiswa Fakultas Ilmu Komputer\r\nUniversitas Duta Bangsa Surakarta dan umum, kuota perserta yaitu 450 orang dengan\r\npendaftar sejumlah mendaftar 339, konfirmasi 295 yang hadir<br></p>', 1, 'WIDI DWI NURCAHYO', 1624966103, 0, 0, 0, '', ''),
	(1631028424, 'thumb-1631028424.jpg?1631028489', 'SIBARMATI X', 1631032020, 'poster-1631028424.jpg?1631028489', '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quasi quisquam assumenda esse, magni omnis nulla sunt natus necessitatibus distinctio tempora magnam perspiciatis ipsam eos! Maxime placeat nisi quisquam quos?<br></p>', 1, 'WIDI DWI NURCAHYO', 1631484290, 0, 0, 1, '', '');
/*!40000 ALTER TABLE `h_events` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_jabatan
DROP TABLE IF EXISTS `h_jabatan`;
CREATE TABLE IF NOT EXISTS `h_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) NOT NULL DEFAULT '',
  `id_divisi` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_jabatan: ~8 rows (approximately)
DELETE FROM `h_jabatan`;
/*!40000 ALTER TABLE `h_jabatan` DISABLE KEYS */;
INSERT INTO `h_jabatan` (`id_jabatan`, `nama_jabatan`, `id_divisi`) VALUES
	(11, 'Ketua', 10),
	(12, 'Koordinator', 11),
	(13, 'Anggota', 11),
	(14, 'Wakil Ketua', 10),
	(15, 'Koordinator', 12),
	(16, 'Anggota', 12),
	(17, 'Koordinator', 13),
	(18, 'Anggota', 13),
	(19, 'Sekretaris', 15),
	(20, 'Bendahara', 14);
/*!40000 ALTER TABLE `h_jabatan` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_member
DROP TABLE IF EXISTS `h_member`;
CREATE TABLE IF NOT EXISTS `h_member` (
  `nim` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT '',
  `nama` varchar(250) NOT NULL DEFAULT '0',
  `kelas` varchar(50) DEFAULT '',
  `id_jabatan` int(11) NOT NULL DEFAULT 0,
  `kontak` varchar(500) DEFAULT '',
  `deskripsi` text DEFAULT '',
  `image` varchar(255) DEFAULT '',
  `aktif` int(1) DEFAULT 1,
  PRIMARY KEY (`nim`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=200103197 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_member: ~15 rows (approximately)
DELETE FROM `h_member`;
/*!40000 ALTER TABLE `h_member` DISABLE KEYS */;
INSERT INTO `h_member` (`nim`, `email`, `nama`, `kelas`, `id_jabatan`, `kontak`, `deskripsi`, `image`, `aktif`) VALUES
	(170103158, 'jemyka@jemyka', 'Jemyka Phalupi', '17TIA3', 0, '', 'Ketua HMPTI Tahun 2019 Ketua HMPTI Tahun 2019 Ketua HMPTI Tahun 2019', '', 0),
	(180103023, 'andreas_abi@fikom.udb.ac.id', 'ANDREAS ABI PERMANA', '18TIA2', 11, '', 'Andreas Abi Permana. Menjabat sebagai Ketua HMP TI UDB periode 2021.', '', 1),
	(180103029, 'arif_eko@fikom.udb.ac.id', 'Arif Eko Fitrianto', '18TIA1', 18, '', 'Arif Eko Fitrianto. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(180103088, 'matin_muhith@fikom.udb.ac.id', 'Matin Muhith', '18TIA2', 14, '', 'Matin Muhith. Menjabat sebagai wakil ketua HMP TI UDB periode 2021.', '', 1),
	(180103106, 'rizki_febriansyah@fikom.udb.ac.id', 'Muhammad Rizki Febriansyah', '18TIA3', 18, '', 'Muhammad Rizki Febriansyah. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(180103121, 'pipin_yulanda@fikom.udb.ac.id', 'Pipin Yulanda', '18TIA2', 20, '', 'Pipin Yulanda. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(180103133, 'rifqi_firdausi@fikom.udb.ac.id', 'Rifqi Firdausi Arafadh', '18TIA4', 17, '', 'Rifqi Firdausi Arafadh. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(180103159, 'widi_dwi@fikom.udb.ac.id', 'Widi Dwi Nurcahyo', '18TIA3', 12, 'Whatsapp: 081226203761, Email: widibaka55@gmail.com, Github: https://github.com/widibaka', 'Saya Widi Dwi Nurcahyo. Makanan kesukaan saya adalah ice cream.', '180103159.jpg?1624956871', 1),
	(180103167, 'yulidar_maulana@fikom.udb.ac.id', 'Yulidar Maulana Ivan Saputra', '18TIA1', 15, '', 'Yulidar Maulana Ivan Saputra. Menjabat sebagai anggota HMP TI UDB periode 2021.', '180103167.jpg?1631024866', 1),
	(190103028, '190103028@fikom.udb.ac.id', 'Very Fitri Anto', '19TIA1', 18, '', 'Very Fitri Anto. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(190103117, '190103117@fikom.udb.ac.id', 'Risma Adisty Nilasari', '19TIA4', 13, '', 'Risma Adisty Nilasari. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(190103161, '190103161@fikom.udb.ac.id', 'Ikhsan Nur Afif', '19TIA4', 18, '', 'Ikhsan Nur Afif. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(190103168, '190103168@fikom.udb.ac.id', 'Rio Suryo Laksono', '19TIA6', 18, '', 'Rio Suryo Laksono. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(200103026, '202030334@mhs.udb.ac.id', 'Yahya Aliya Rohim', '20TIA1', 13, '', 'Yahya Aliya Rohim. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(200103058, '202020270@mhs.udb.ac.id', 'Ahmad Alif Apriyanto', '20TIA3', 16, '', 'Ahmad Alif Apriyanto. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(200103091, '202030275@mhs.udb.ac.id', 'Dika Adi Pratama', '20TIA4', 16, '', 'Dika Adi Pratama. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(200103097, '202020685@mhs.udb.ac.id', 'Fitroh Ahmad Abdul Aziz', '20TIA4', 18, '', 'Fitroh Ahmad Abdul Aziz. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1),
	(200103196, '202030335@mhs.udb.ac.id', 'Jamilatun Safitri', '20TIA3', 19, '', 'Jamilatun Safitri. Menjabat sebagai anggota HMP TI UDB periode 2021.', '', 1);
/*!40000 ALTER TABLE `h_member` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_member_login_log
DROP TABLE IF EXISTS `h_member_login_log`;
CREATE TABLE IF NOT EXISTS `h_member_login_log` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL DEFAULT '0',
  `time` int(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_member_login_log: ~15 rows (approximately)
DELETE FROM `h_member_login_log`;
/*!40000 ALTER TABLE `h_member_login_log` DISABLE KEYS */;
INSERT INTO `h_member_login_log` (`id`, `nama`, `time`) VALUES
	(35, 'widi_dwi@fikom.udb.ac.id', 1624935872),
	(36, 'widi_dwi@fikom.udb.ac.id', 1624951614),
	(37, 'WIDI DWI NURCAHYO', 1624963561),
	(38, 'Widi Dwi Nurcahyo', 1624969658),
	(39, 'Widi Dwi Nurcahyo', 1624969954),
	(40, 'Widi Dwi Nurcahyo', 1624970151),
	(41, 'Widi Dwi Nurcahyo', 1624970168),
	(42, 'Widi Dwi Nurcahyo', 1624970281),
	(43, 'Widi Dwi Nurcahyo', 1624970292),
	(44, 'Widi Dwi Nurcahyo', 1624970450),
	(45, 'Widi Dwi Nurcahyo', 1624970483),
	(46, 'Widi Dwi Nurcahyo', 1624970699),
	(47, 'Widi Dwi Nurcahyo', 1624970885),
	(48, 'Widi Dwi Nurcahyo', 1624970913),
	(49, 'Widi Dwi Nurcahyo', 1625581003),
	(50, 'Widi Dwi Nurcahyo', 1630575992),
	(51, 'Widi Dwi Nurcahyo', 1630997676),
	(52, 'Widi Dwi Nurcahyo', 1631027864),
	(53, 'Widi Dwi Nurcahyo', 1631119713),
	(54, 'Widi Dwi Nurcahyo', 1631340953),
	(55, 'Widi Dwi Nurcahyo', 1631363538),
	(56, 'WIDI DWI NURCAHYO', 1631480447);
/*!40000 ALTER TABLE `h_member_login_log` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_panitia
DROP TABLE IF EXISTS `h_panitia`;
CREATE TABLE IF NOT EXISTS `h_panitia` (
  `id_panitia` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL DEFAULT '',
  `id_event` int(12) NOT NULL DEFAULT 0,
  `peran` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_panitia`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_panitia: ~18 rows (approximately)
DELETE FROM `h_panitia`;
/*!40000 ALTER TABLE `h_panitia` DISABLE KEYS */;
INSERT INTO `h_panitia` (`id_panitia`, `email`, `id_event`, `peran`) VALUES
	(17, '190103168@fikom.udb.ac.id', 1624963579, 'Ketua Panitia'),
	(18, '202030335@mhs.udb.ac.id', 1624963579, 'Sekretaris'),
	(19, '190103028@fikom.udb.ac.id', 1624963579, 'Humas'),
	(20, '190103117@fikom.udb.ac.id', 1624963579, 'Sie Acara 1'),
	(21, 'andreas_abi@fikom.udb.ac.id', 1624963579, 'Sie Acara 2'),
	(22, '190103161@fikom.udb.ac.id', 1624963579, 'Moderator'),
	(23, '202030334@mhs.udb.ac.id', 1624963579, 'Sie PDD'),
	(24, '202030275@mhs.udb.ac.id', 1624963579, 'Sie PDD 2'),
	(25, '190103161@fikom.udb.ac.id', 1624963850, 'Ketua Panitia'),
	(26, '202030335@mhs.udb.ac.id', 1624963850, 'Sekretaris'),
	(27, '190103117@fikom.udb.ac.id', 1624963850, 'Sie Acara 1'),
	(28, '190103168@fikom.udb.ac.id', 1624963850, 'Sie Acara 2'),
	(29, 'yulidar_maulana@fikom.udb.ac.id', 1624963850, 'Sie Acara 3'),
	(30, '190103028@fikom.udb.ac.id', 1624963850, 'Sie Humas 1'),
	(31, 'arif_eko@fikom.udb.ac.id', 1624963850, 'Sie Humas 2'),
	(32, '202030275@mhs.udb.ac.id', 1624963850, 'Sie PDD 1'),
	(33, '202020270@mhs.udb.ac.id', 1624963850, 'Sie PDD 2'),
	(34, '202030334@mhs.udb.ac.id', 1624963850, 'Sie PDD 3'),
	(35, 'matin_muhith@fikom.udb.ac.id', 1624963850, 'Moderator'),
	(36, 'arif_eko@fikom.udb.ac.id', 1631028893, 'Ketua Panitia'),
	(37, '190103117@fikom.udb.ac.id', 1631028893, 'Sie Acara 1'),
	(38, 'rifqi_firdausi@fikom.udb.ac.id', 1631028424, 'Sie PDD 2');
/*!40000 ALTER TABLE `h_panitia` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_pendaftar
DROP TABLE IF EXISTS `h_pendaftar`;
CREATE TABLE IF NOT EXISTS `h_pendaftar` (
  `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) DEFAULT '',
  `nama` varchar(500) DEFAULT '',
  `id_event` int(12) NOT NULL DEFAULT 0,
  `data_tambahan` text DEFAULT '',
  `kehadiran` varchar(50) DEFAULT '',
  `pembayaran` varchar(50) DEFAULT '',
  `bintang` tinyint(1) NOT NULL DEFAULT 0,
  `saran` varchar(500) DEFAULT '',
  `status` char(16) DEFAULT 'Unset',
  PRIMARY KEY (`id_pendaftar`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_pendaftar: ~2 rows (approximately)
DELETE FROM `h_pendaftar`;
/*!40000 ALTER TABLE `h_pendaftar` DISABLE KEYS */;
INSERT INTO `h_pendaftar` (`id_pendaftar`, `email`, `nama`, `id_event`, `data_tambahan`, `kehadiran`, `pembayaran`, `bintang`, `saran`, `status`) VALUES
	(16, 'widi_dwi@fikom.udb.ac.id', 'Widi Dwi Nurcahyo', 1624963850, '', 'kehadiran-16-1624963850.jpg?1631001655', '', 5, 'kk', 'Valid'),
	(22, 'widi_dwi@fikom.udb.ac.id', 'Widi Dwi Nurcahyo1', 1631028893, '{"Asal_instansi":"udb","Alamat":"xxx"}', '', '', 0, '', 'Valid'),
	(24, 'widi_dwi@fikom.udb.ac.id', 'Widi Dwi Nurcahyo', 1631341784, '{"Asal_instansi":"7","Alamat":"8"}', 'kehadiran-24-1631341784.jpg?1631343921', 'pembayaran-2835985744-1631341784.jpg?1631343627', 4, 'uuuuuuuuuuuuuu', 'Invalid');
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_proker: ~22 rows (approximately)
DELETE FROM `h_proker`;
/*!40000 ALTER TABLE `h_proker` DISABLE KEYS */;
INSERT INTO `h_proker` (`id_proker`, `judul`, `waktu`, `deskripsi`, `id_divisi`) VALUES
	(6, 'Rapat Bulanan Pengurus HMP TI', 'Hari Sabtu Minggu Ke - 4', 'Menjalin kordinasi sesama anggota HMP agar\r\nterbentuknya chemistry sesama anggota. Rapat dilakukan setiap sabtu minggu ke-4 dipimpin\r\nlangsung ketua HMP, evaluasi bulanan, planning bulan\r\nselanjutnya, penyampaian pendapat anggota.', 10),
	(7, 'Rapat Kerja HMP TI 2021', 'Sabtu, 23 Januari 2021', 'Merencanakan strategi pelaksaanan organisasi dalam\r\nwaktu satu tahun kedepan sehingga terwujudnya visi dan\r\nmisi dari organisasi. Rapat kerja dilaksanakan secara daring melalui platform\r\ngoogle meet, dimana setiap peserta wajib menyalakan\r\nkamera. Setiap peserta dilarang meninggalkan tempat\r\ntanpa ijin.', 10),
	(8, 'Arisan Keluarga HMP TI', 'Bersamaan rapat bulanan', 'Memepererat rasa kekeluargaan sesame anggota HMP TI. Setiap anggota membayar sejumlah uang melalui platform\r\ne-money(sesuai kesepakatan) kemudian arisan akan\r\ndimulai sesudah rapat bulanan selesai.', 10),
	(9, 'MUBES awal periode', 'Awal Periode Menjabat', 'Membahas AD/ART HMPTI, Membahas GBHO BEM, Ketua dan Wakil ketua HMPTI Membacakan AD/ART. Peserta MUBES berdiskusi GBHO dan Lainnya. Bila ada yang keberakatan anggota boleh mengusulkan\r\npendapatnya. MUBES Awal Tahun dihadiri minimal 2/3 dari\r\npengurus HMPTI. Hasil disahkan oleh Presidium. Sidang Pleno Awal Periode diatur dalam peraturan\r\ntersendiri.', 10),
	(10, 'MUBES Akhir periode', 'Akhir periode', 'membahas evaluasi kinerja HMPTI dalam 1 periode, membahas laporan pertanggungjawaban setiap\r\npengurus, setiap pengurus\r\nmenyampaikan laporan\r\npertanggungjawaban selama satu periode, setiap pengurus mengevaluasi kinerja dari pengurus lain', 10),
	(11, 'MAKRAB', 'Menyusul', 'Mengakrabkan antar pengurus,\r\nMeningkatkan rasa persatuan dan kebersamaan antar\r\npengurus,\r\nMembangun kesadaran berorganisasi', 10),
	(12, 'Pengeluaran Nomor Administrasi', 'Selama masa kepengurusan', 'Mengeluarkan\r\nnomor\r\nsurat,\r\nproposal,\r\ndan\r\nLaporan\r\nPertanggungjawab\r\nan sebagai bentuk\r\nketeraturan dan\r\nkerapihan\r\nadministrasi\r\ndalam\r\nKesekretariatan\r\nHMPTI.', 15),
	(13, 'Pengarsipan Surat Masuk dan Surat Keluar', 'Di akhir bulan, Setiap tanggal 28', 'Sebagai dokumen\r\nterhadap\r\nsurat\r\nmasuk dan keluar\r\ndalam\r\nkesekretariatan\r\nsehingga\r\nterciptanya\r\nketeraturan dan\r\nkerapian dalam\r\nadministrasi\r\nkepengurusan.', 15),
	(14, 'Membuat Struktur Kepengurusan HMPTI', '23 Januari 2021', 'Sebagai bentuk\r\npengenalan dan\r\nmenciptakan\r\nketeraturan\r\norganigram dalam kepengurusan', 15),
	(15, 'Pendataan Inventaris Kesekretariatan', 'Di akhir periode masa kepengurusan', 'Sebagai bentuk\r\nmenjaga barang-\r\nbarang yang ada\r\ndi\r\ndalam\r\nkesekretariatan\r\nagar\r\nterdata,\r\nterjaga dan tertata\r\nrapi.', 15),
	(16, 'Pembuatan Notulensi setelah rapat', 'Setiap melakukan rapat', 'Sebagai\r\nbukti\r\nterlaksananya\r\nrapat\r\nrutin\r\nHMPTI,\r\ndan\r\nmencatat\r\nhasil\r\nrapat.', 15),
	(17, 'Daftar Kehadiran Pengurus pada Kegiatan Rapat', 'Setiap melakukan rapat', 'Sebagai\r\npengontrol\r\nkehadiran setiap\r\nanggota HMPTI\r\nketika rapat', 15),
	(18, 'Kas Bulanan', 'Minggu ke-2 dalam 1 bulan', 'Kas bulanan bertujuan untuk menambah dana tambahan\r\nuntuk keperluan dalam HMP TI', 14),
	(19, 'Membuat laporan keuangan', '1x dalam 3 bulan', '1. Mengetahui nominal dana keseluruhan secara detail \r\n2. Tercipta nya tertib administrasi keuangan', 14),
	(20, 'Kaleidoskop', '1 periode', 'Penjadwalan hari-hari besar nasional, universitas dan\r\ndokumentasi setiap kegiatan HMPTI. Bertujuan untuk setiap kegiatan dan segala bentuk\r\ninformasi terkait HMPTI dapat dapat tersampaikan dan\r\nterdokumentasi secara teratur.', 12),
	(21, 'Konten Kreatif', '1 Periode', 'Pembuatan konten microblog pada sosial media, Merupakan program kerja yang berfungsi melancarkan\r\naliran informasi bagi seluruh lingkup keluarga teknik\r\ninformatika dalam bentuk konten kreatif yang akan\r\ndisebarluaskan melalui social media HMPTI.', 12),
	(22, 'Web HMPTI', '1 Periode', 'Pembuatan dan maintenance website HMPTI. pembuatan situs web bertujuan tujuan untuk\r\nmempromosikan HMPTI. seperti visi dan misi, program\r\nkerja dari setiap divisi', 12),
	(23, 'Webinar Android', 'Maret', 'Belajar Fundamental Pemrograman Android. Memperkenalkan lebih dekat kepada mahasiswa fakultas\r\nIlmu Komputer tentang pemrograman android', 13),
	(24, 'Mobile Legend E-Sport Tournament', 'Juni', 'Tournament Mobile Legend. Mencari dan mengembangkan esport di universitas duta\r\nbangsa.', 13),
	(25, 'Membuat Website HMP TI', 'Februari', 'Membuat website untuk mempublikasikan organisasi:\r\ndeskripsi organisasi, struktur organisasi, divisi-divisi dan\r\nprogram kerjanya, profil anggota HMP TI, dan halaman\r\nyang menampung aspirasi mahasiswa TI.', 11),
	(26, 'UDB Expo', 'April (Pembuatan), Mei (Pelaksanaan)', 'Lomba dan Pameran Karya. Membuat sistem pameran karya untuk memetakan talenta-\r\ntalenta di Surakarta dan sekitar. Lomba karya berhadiah dengan kategori: desktop app, web app, mobile app, animasi, kewirausahaan, media informasi.\r\nTargetnya siswa SMK / sederajat dan mahasiswa.\r\nMenggunakan sistem like terbanyak yang menang.', 11),
	(27, 'LPJ Online', 'Juni', 'Laporan Pertanggungjawaban online.  Membuat modul / fitur tambahan untuk website HMPTI\r\nlaporan pertanggungjawaban program kerja secara online\r\nsehingga kegiatan organisasi menjadi lebih transparan.', 11),
	(28, 'Webinar Jaringan', 'Mei', 'Belajar Fundamental Pemrograman Android. Memperkenalkan lebih dekat kepada mahasiswa fakultas\r\nIlmu Komputer tentang Network Security', 13),
	(29, 'Webinar Artifical Intelegence', 'Juli', 'Kecerdasan Buatan Untuk Masa Depan. Memperkenalkan lebih dekat kepada mahasiswa fakultas\r\nIlmu Komputer tentang Kecerdasan Buatan.', 13),
	(30, 'SIBARMATI', 'Maret', 'SIBAR MATI (Sinau Bareng Mahasiswa TI). Mempererat hubungan antar mahasiswa dan menambah\r\nilmu', 13);
/*!40000 ALTER TABLE `h_proker` ENABLE KEYS */;

-- Dumping structure for table db_hmpti.h_sertifikat
DROP TABLE IF EXISTS `h_sertifikat`;
CREATE TABLE IF NOT EXISTS `h_sertifikat` (
  `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` varchar(50) NOT NULL DEFAULT '0',
  `posisi_x` varchar(5) NOT NULL DEFAULT '0',
  `posisi_y` varchar(5) NOT NULL DEFAULT '0',
  `tinggi_image` varchar(10) NOT NULL DEFAULT '0',
  `lebar_image` varchar(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sertifikat`),
  UNIQUE KEY `id_event` (`id_event`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_hmpti.h_sertifikat: ~2 rows (approximately)
DELETE FROM `h_sertifikat`;
/*!40000 ALTER TABLE `h_sertifikat` DISABLE KEYS */;
INSERT INTO `h_sertifikat` (`id_sertifikat`, `id_event`, `posisi_x`, `posisi_y`, `tinggi_image`, `lebar_image`) VALUES
	(1, '1624963850', '281', '125.0', '1590', '2248'),
	(3, '1631028893', '278.0', '122.4', '1590', '2248');
/*!40000 ALTER TABLE `h_sertifikat` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
