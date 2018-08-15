-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.30-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sijembatan
CREATE DATABASE IF NOT EXISTS `sijembatan` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sijembatan`;

-- Dumping structure for table sijembatan.config
CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` longtext,
  `description` longtext,
  `icon` longtext,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `logo` longtext,
  `meta_deskripsi` text NOT NULL,
  `basic` int(11) DEFAULT NULL,
  `meta_keyword` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table sijembatan.config: ~1 rows (approximately)
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` (`id`, `name`, `email`, `phone`, `address`, `description`, `icon`, `instagram`, `facebook`, `logo`, `meta_deskripsi`, `basic`, `meta_keyword`) VALUES
	(1, 'Sistem Informasi Jalan', '', '801217596251', 'Lamongan', 'Lamongan', 'icon1.png', '', '', 'logo4.png', '																																																																								\r\n											\r\n											\r\n											\r\n											\r\n											\r\n											', 5, '																																																																								\r\n											\r\n											\r\n											\r\n											\r\n											\r\n											');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;

-- Dumping structure for table sijembatan.jembatan
CREATE TABLE IF NOT EXISTS `jembatan` (
  `jembatan_id` int(11) NOT NULL AUTO_INCREMENT,
  `jembatan_no_ruas` int(11) NOT NULL,
  `jembatan_nama_ruas` text NOT NULL,
  `jembatan_nama` text,
  `jembatan_lokasikm` double DEFAULT NULL,
  `jembatan_lat` double DEFAULT NULL,
  `jembatan_lng` double DEFAULT NULL,
  `jembatan_jml_bentang` int(11) DEFAULT NULL,
  `jembatan_dimensiP` double DEFAULT NULL,
  `jembatan_dimensiL` double DEFAULT NULL,
  `jembatan_dimensiT` double DEFAULT NULL,
  `jembatan_bang_atas_jenis` text,
  `jembatan_bang_atas_kondisi` text,
  `jembatan_bang_bawah_jenis` text,
  `jembatan_bang_bawah_kondisi` text,
  PRIMARY KEY (`jembatan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table sijembatan.jembatan: ~1 rows (approximately)
/*!40000 ALTER TABLE `jembatan` DISABLE KEYS */;
INSERT INTO `jembatan` (`jembatan_id`, `jembatan_no_ruas`, `jembatan_nama_ruas`, `jembatan_nama`, `jembatan_lokasikm`, `jembatan_lat`, `jembatan_lng`, `jembatan_jml_bentang`, `jembatan_dimensiP`, `jembatan_dimensiL`, `jembatan_dimensiT`, `jembatan_bang_atas_jenis`, `jembatan_bang_atas_kondisi`, `jembatan_bang_bawah_jenis`, `jembatan_bang_bawah_kondisi`) VALUES
	(1, 123, 'ruas', 'nama jem', 134, 222, 333, 12, 12, 12, 12, 'atas', 'atas2', 'bawah2', NULL);
/*!40000 ALTER TABLE `jembatan` ENABLE KEYS */;

-- Dumping structure for table sijembatan.user_auth
CREATE TABLE IF NOT EXISTS `user_auth` (
  `user_auth_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `user_auth_name` varchar(20) NOT NULL,
  `user_auth_pass` varchar(20) NOT NULL,
  `user_auth_level` char(3) NOT NULL DEFAULT 'USR',
  `user_auth_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_auth_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table sijembatan.user_auth: 2 rows
/*!40000 ALTER TABLE `user_auth` DISABLE KEYS */;
INSERT INTO `user_auth` (`user_auth_id`, `user_auth_name`, `user_auth_pass`, `user_auth_level`, `user_auth_update`) VALUES
	(1, 'admin', 'admin', 'ADM', '2017-04-14 17:04:27'),
	(2, 'tubagus', 'lancarjaya', 'USR', '2017-07-20 09:28:55');
/*!40000 ALTER TABLE `user_auth` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
