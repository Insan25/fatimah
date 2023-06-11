-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for fatimah
DROP DATABASE IF EXISTS `fatimah`;
CREATE DATABASE IF NOT EXISTS `fatimah` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `fatimah`;

-- Dumping structure for table fatimah.barang
DROP TABLE IF EXISTS `barang`;
CREATE TABLE IF NOT EXISTS `barang` (
  `kd_barang` varchar(50) NOT NULL,
  `nm_barang` varchar(50) DEFAULT NULL,
  `harga_beli` double DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_barang`),
  KEY `FK_barang_kategori` (`id_kategori`),
  CONSTRAINT `FK_barang_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table fatimah.itempembelian
DROP TABLE IF EXISTS `itempembelian`;
CREATE TABLE IF NOT EXISTS `itempembelian` (
  `id_barang` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  KEY `FK_itempembelian_barang` (`id_barang`),
  KEY `FK_itempembelian_pembelian` (`id_pembelian`),
  CONSTRAINT `FK_itempembelian_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`kd_barang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_itempembelian_pembelian` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table fatimah.itempenjualan
DROP TABLE IF EXISTS `itempenjualan`;
CREATE TABLE IF NOT EXISTS `itempenjualan` (
  `kode_barang` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga_jual` double DEFAULT NULL,
  `id_penjualan` int(11) DEFAULT NULL,
  KEY `FK_itempenjualan_barang` (`kode_barang`),
  KEY `FK_itempenjualan_penjualan` (`id_penjualan`),
  CONSTRAINT `FK_itempenjualan_barang` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kd_barang`) ON UPDATE CASCADE,
  CONSTRAINT `FK_itempenjualan_penjualan` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualan` (`id_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table fatimah.karyawan
DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nm_karyawan` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table fatimah.kategori
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nm_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table fatimah.pembelian
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` int(11) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_pembelian`),
  KEY `FK_pembelian_karyawan` (`id_karyawan`),
  CONSTRAINT `FK_pembelian_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

-- Dumping structure for table fatimah.penjualan
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` int(11) DEFAULT NULL,
  `id_karyawan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_penjualan`),
  KEY `FK_penjualan_karyawan` (`id_karyawan`),
  CONSTRAINT `FK_penjualan_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
