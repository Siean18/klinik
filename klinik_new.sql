-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.25-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table klinik.pasien
CREATE TABLE IF NOT EXISTS `pasien` (
  `id_pasien` int(255) NOT NULL AUTO_INCREMENT,
  `tipe_pasien` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text DEFAULT NULL,
  `nik` bigint(20) DEFAULT NULL,
  `nomor_rm` bigint(20) DEFAULT NULL,
  `nomor_jkn` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_pasien`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table klinik.pasien: ~6 rows (approximately)
INSERT INTO `pasien` (`id_pasien`, `tipe_pasien`, `nama`, `jenis_kelamin`, `tempat`, `tanggal_lahir`, `alamat`, `nik`, `nomor_rm`, `nomor_jkn`) VALUES
	(9, 'b', 'Siean', 'L', 'Bogor', '2023-02-14', 'asdasdasd', 1234567890123456, 192381298310239821, 19239839829),
	(10, 'b', 'Acel', 'L', 'Papua', '2023-02-16', 'Adokawok', 7236726371236, 87127361872362739, 98239831723873),
	(13, 'b', 'Siiis ', 'P', 'BNbo', '2023-02-05', 'asdasd', 1234567890123456, 1231231312323, 9283893923),
	(14, 'b', 'Rayhan Rizky Nurfadila', 'L', 'Bogor', '2023-02-21', 'asdadasd', 7236726371236, 87127361872362739, 876876869897987),
	(15, 'u', 'Rayhan Rizky asd', 'L', 'Bogor', '2023-02-21', 'asdadasd', 313444, 9223372036854775807, 0),
	(16, 'b', 'WWWW', 'L', 'BOOO', '1999-01-19', 'asdasdas', 1234567890123456, 123231312, 29393939);

-- Dumping structure for table klinik.users
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table klinik.users: ~1 rows (approximately)
INSERT INTO `users` (`username`, `password`) VALUES
	('admin', 'admin');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
