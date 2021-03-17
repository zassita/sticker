-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for sticker
DROP DATABASE IF EXISTS `sticker`;
CREATE DATABASE IF NOT EXISTS `sticker` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sticker`;

-- Dumping structure for table sticker.admin
DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sticker.request_info
DROP TABLE IF EXISTS `request_info`;
CREATE TABLE IF NOT EXISTS `request_info` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `matric_number` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT '1',
  `remark` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`request_id`),
  KEY `FK_request_info_student_info` (`matric_number`),
  KEY `FK_request_info_vehicle_info` (`vehicle_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sticker.status
DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sticker.sticker_info
DROP TABLE IF EXISTS `sticker_info`;
CREATE TABLE IF NOT EXISTS `sticker_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) DEFAULT NULL,
  `matric_number` varchar(50) DEFAULT NULL,
  `date_approved` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `request_id` (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sticker.student_info
DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric_number` varchar(50) DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `address` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `program` varchar(50) NOT NULL,
  `fakulti` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sticker.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric_number` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

-- Dumping structure for table sticker.vehicle_info
DROP TABLE IF EXISTS `vehicle_info`;
CREATE TABLE IF NOT EXISTS `vehicle_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric_number` varchar(50) DEFAULT NULL,
  `licence_class` varchar(50) NOT NULL,
  `roadtax` varchar(50) NOT NULL,
  `vehicle_brand` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `cc_power` varchar(50) NOT NULL,
  `no_plat` varchar(50) NOT NULL,
  `licence_expired` date NOT NULL,
  `file_matric` varchar(50) NOT NULL,
  `file_vehiclegrant` varchar(50) NOT NULL,
  `file_licence` varchar(50) NOT NULL,
  `file_permisionletter` varchar(50) DEFAULT NULL,
  `file_supportletter` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `matric` (`matric_number`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
