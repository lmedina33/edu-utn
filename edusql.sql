-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.47-community - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4151
-- Date/time:                    2012-09-28 14:29:18
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for edu
CREATE DATABASE IF NOT EXISTS `edu` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `edu`;


-- Dumping structure for table edu.alumno
DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fechaIngreso` date DEFAULT NULL,
  `fechaEngreso` date DEFAULT NULL,
  `fechaSalida` date DEFAULT NULL,
  `persona` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `persona` (`persona`),
  CONSTRAINT `persona` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.alumno: ~21 rows (approximately)
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` (`id`, `fechaIngreso`, `fechaEngreso`, `fechaSalida`, `persona`) VALUES
	(1, '2012-07-17', NULL, NULL, 4),
	(2, '2012-07-17', NULL, NULL, 5),
	(3, '2012-07-17', NULL, NULL, 6),
	(4, '2012-09-22', NULL, NULL, 10),
	(5, '2012-09-22', NULL, NULL, 11),
	(6, '2012-09-22', NULL, NULL, 12),
	(7, '2012-09-22', NULL, NULL, 13),
	(8, '2012-09-22', NULL, NULL, 14),
	(9, '2012-09-22', NULL, NULL, 15),
	(10, '2012-09-22', NULL, NULL, 16),
	(11, '2012-09-22', NULL, NULL, 17),
	(12, '2012-09-22', NULL, NULL, 18),
	(13, '2012-09-22', NULL, NULL, 19),
	(14, '2012-09-22', NULL, NULL, 20),
	(15, '2012-09-22', NULL, NULL, 21),
	(16, '2012-09-22', NULL, NULL, 22),
	(17, '2012-09-22', NULL, NULL, 23),
	(18, '2012-09-22', NULL, NULL, 24),
	(19, '2012-09-23', NULL, NULL, 25),
	(20, '2012-09-24', NULL, NULL, 26),
	(21, '2012-09-24', NULL, NULL, 27);
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;


-- Dumping structure for table edu.cargo
DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.cargo: ~0 rows (approximately)
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;


-- Dumping structure for table edu.ci_sessions
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Dumping data for table edu.ci_sessions: ~4 rows (approximately)
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
	('dc0cd4a1c741a4520dcdc0e5ce88b938', '127.0.0.1', 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.4 (KHTML, like Gecko) Chrome/22.0.1229.79 Safari/537.4', 1348853121, 'a:3:{s:9:"user_data";s:0:"";s:9:"logged_in";a:3:{s:2:"id";s:1:"7";s:9:"ussername";s:6:"gsiman";s:7:"persona";s:2:"28";}s:3:"rol";a:2:{s:3:"rol";s:1:"2";s:7:"escuela";s:1:"3";}}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;


-- Dumping structure for table edu.comunicaciones
DROP TABLE IF EXISTS `comunicaciones`;
CREATE TABLE IF NOT EXISTS `comunicaciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fechaAlta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.comunicaciones: ~149 rows (approximately)
/*!40000 ALTER TABLE `comunicaciones` DISABLE KEYS */;
INSERT INTO `comunicaciones` (`id`, `fechaAlta`, `fechaBaja`) VALUES
	(1, '2012-09-21 23:53:23', '0000-00-00'),
	(2, '2012-09-21 23:53:44', '0000-00-00'),
	(3, '2012-09-21 23:53:44', '0000-00-00'),
	(4, '2012-09-21 23:53:44', '0000-00-00'),
	(5, '2012-09-22 00:03:04', '0000-00-00'),
	(6, '2012-09-22 00:03:04', '0000-00-00'),
	(7, '2012-09-22 00:03:04', '0000-00-00'),
	(8, '2012-09-22 00:04:16', '0000-00-00'),
	(9, '2012-09-22 00:04:16', '0000-00-00'),
	(10, '2012-09-22 00:04:16', '0000-00-00'),
	(11, '2012-09-22 00:31:03', '0000-00-00'),
	(12, '2012-09-22 00:31:03', '0000-00-00'),
	(13, '2012-09-22 00:31:03', '0000-00-00'),
	(14, '2012-09-22 01:49:36', '0000-00-00'),
	(15, '2012-09-22 01:49:36', '0000-00-00'),
	(16, '2012-09-22 01:49:36', '0000-00-00'),
	(17, '2012-09-22 01:52:53', '0000-00-00'),
	(18, '2012-09-22 01:52:53', '0000-00-00'),
	(19, '2012-09-22 01:52:53', '0000-00-00'),
	(20, '2012-09-23 23:13:35', '0000-00-00'),
	(21, '2012-09-23 23:13:35', '0000-00-00'),
	(22, '2012-09-23 23:13:35', '0000-00-00'),
	(23, '2012-09-23 23:30:15', '0000-00-00'),
	(24, '2012-09-23 23:30:15', '0000-00-00'),
	(25, '2012-09-23 23:30:15', '0000-00-00'),
	(26, '2012-09-24 22:09:10', '0000-00-00'),
	(27, '2012-09-24 22:09:10', '0000-00-00'),
	(28, '2012-09-24 22:09:10', '0000-00-00'),
	(29, '2012-09-26 11:34:52', '0000-00-00'),
	(30, '2012-09-26 11:34:52', '0000-00-00'),
	(31, '2012-09-26 11:34:52', '0000-00-00'),
	(32, '2012-09-26 11:44:30', '0000-00-00'),
	(33, '2012-09-26 11:44:30', '0000-00-00'),
	(34, '2012-09-26 11:44:30', '0000-00-00'),
	(35, '2012-09-26 11:44:36', '0000-00-00'),
	(36, '2012-09-26 11:44:36', '0000-00-00'),
	(37, '2012-09-26 11:44:36', '0000-00-00'),
	(38, '2012-09-26 11:44:39', '0000-00-00'),
	(39, '2012-09-26 11:44:39', '0000-00-00'),
	(40, '2012-09-26 11:44:39', '0000-00-00'),
	(41, '2012-09-26 11:44:43', '0000-00-00'),
	(42, '2012-09-26 11:44:43', '0000-00-00'),
	(43, '2012-09-26 11:44:43', '0000-00-00'),
	(44, '2012-09-26 11:44:46', '0000-00-00'),
	(45, '2012-09-26 11:44:46', '0000-00-00'),
	(46, '2012-09-26 11:44:46', '0000-00-00'),
	(47, '2012-09-26 11:44:50', '0000-00-00'),
	(48, '2012-09-26 11:44:50', '0000-00-00'),
	(49, '2012-09-26 11:44:50', '0000-00-00'),
	(50, '2012-09-26 11:44:54', '0000-00-00'),
	(51, '2012-09-26 11:44:54', '0000-00-00'),
	(52, '2012-09-26 11:44:54', '0000-00-00'),
	(53, '2012-09-26 11:44:59', '0000-00-00'),
	(54, '2012-09-26 11:44:59', '0000-00-00'),
	(55, '2012-09-26 11:44:59', '0000-00-00'),
	(56, '2012-09-26 11:45:02', '0000-00-00'),
	(57, '2012-09-26 11:45:02', '0000-00-00'),
	(58, '2012-09-26 11:45:02', '0000-00-00'),
	(59, '2012-09-26 11:45:05', '0000-00-00'),
	(60, '2012-09-26 11:45:05', '0000-00-00'),
	(61, '2012-09-26 11:45:05', '0000-00-00'),
	(62, '2012-09-26 13:52:38', '0000-00-00'),
	(63, '2012-09-26 13:52:38', '0000-00-00'),
	(64, '2012-09-26 13:52:38', '0000-00-00'),
	(65, '2012-09-26 13:52:38', '0000-00-00'),
	(66, '2012-09-26 13:52:38', '0000-00-00'),
	(67, '2012-09-26 13:52:38', '0000-00-00'),
	(68, '2012-09-26 13:52:39', '0000-00-00'),
	(69, '2012-09-26 13:52:39', '0000-00-00'),
	(70, '2012-09-26 13:52:39', '0000-00-00'),
	(71, '2012-09-26 13:52:39', '0000-00-00'),
	(72, '2012-09-26 13:59:46', '0000-00-00'),
	(73, '2012-09-26 13:59:46', '0000-00-00'),
	(74, '2012-09-26 13:59:46', '0000-00-00'),
	(75, '2012-09-26 14:04:21', '0000-00-00'),
	(76, '2012-09-26 14:04:21', '0000-00-00'),
	(77, '2012-09-26 14:04:21', '0000-00-00'),
	(78, '2012-09-26 14:04:34', '0000-00-00'),
	(79, '2012-09-26 14:04:34', '0000-00-00'),
	(80, '2012-09-26 14:04:34', '0000-00-00'),
	(81, '2012-09-26 14:05:21', '0000-00-00'),
	(82, '2012-09-26 14:05:21', '0000-00-00'),
	(83, '2012-09-26 14:05:21', '0000-00-00'),
	(84, '2012-09-26 14:07:10', '0000-00-00'),
	(85, '2012-09-26 14:07:10', '0000-00-00'),
	(86, '2012-09-26 14:07:10', '0000-00-00'),
	(87, '2012-09-26 14:07:10', '0000-00-00'),
	(88, '2012-09-26 14:07:10', '0000-00-00'),
	(89, '2012-09-26 14:07:10', '0000-00-00'),
	(90, '2012-09-26 14:07:10', '0000-00-00'),
	(91, '2012-09-26 14:07:10', '0000-00-00'),
	(92, '2012-09-26 14:07:10', '0000-00-00'),
	(93, '2012-09-26 14:07:10', '0000-00-00'),
	(94, '2012-09-26 14:07:10', '0000-00-00'),
	(95, '2012-09-26 14:07:10', '0000-00-00'),
	(96, '2012-09-26 14:07:10', '0000-00-00'),
	(97, '2012-09-26 14:07:10', '0000-00-00'),
	(98, '2012-09-26 14:07:10', '0000-00-00'),
	(99, '2012-09-26 14:17:28', '0000-00-00'),
	(100, '2012-09-26 14:17:28', '0000-00-00'),
	(101, '2012-09-26 14:17:28', '0000-00-00'),
	(102, '2012-09-26 14:17:30', '0000-00-00'),
	(103, '2012-09-26 14:17:30', '0000-00-00'),
	(104, '2012-09-26 14:17:30', '0000-00-00'),
	(105, '2012-09-26 14:17:38', '0000-00-00'),
	(106, '2012-09-26 14:17:38', '0000-00-00'),
	(107, '2012-09-26 14:17:38', '0000-00-00'),
	(108, '2012-09-26 14:17:41', '0000-00-00'),
	(109, '2012-09-26 14:17:41', '0000-00-00'),
	(110, '2012-09-26 14:17:41', '0000-00-00'),
	(111, '2012-09-26 14:17:44', '0000-00-00'),
	(112, '2012-09-26 14:17:44', '0000-00-00'),
	(113, '2012-09-26 14:17:44', '0000-00-00'),
	(114, '2012-09-26 14:17:47', '0000-00-00'),
	(115, '2012-09-26 14:17:47', '0000-00-00'),
	(116, '2012-09-26 14:17:47', '0000-00-00'),
	(117, '2012-09-26 14:17:50', '0000-00-00'),
	(118, '2012-09-26 14:17:50', '0000-00-00'),
	(119, '2012-09-26 14:17:51', '0000-00-00'),
	(120, '2012-09-26 14:17:55', '0000-00-00'),
	(121, '2012-09-26 14:17:55', '0000-00-00'),
	(122, '2012-09-26 14:17:55', '0000-00-00'),
	(123, '2012-09-26 14:18:04', '0000-00-00'),
	(124, '2012-09-26 14:18:04', '0000-00-00'),
	(125, '2012-09-26 14:18:04', '0000-00-00'),
	(126, '2012-09-26 14:18:36', '0000-00-00'),
	(127, '2012-09-26 14:18:36', '0000-00-00'),
	(128, '2012-09-26 14:18:36', '0000-00-00'),
	(129, '2012-09-26 14:18:36', '0000-00-00'),
	(130, '2012-09-26 14:18:36', '0000-00-00'),
	(131, '2012-09-26 14:18:36', '0000-00-00'),
	(132, '2012-09-26 14:18:36', '0000-00-00'),
	(133, '2012-09-26 14:18:36', '0000-00-00'),
	(134, '2012-09-26 14:18:36', '0000-00-00'),
	(135, '2012-09-26 14:18:36', '0000-00-00'),
	(136, '2012-09-26 14:18:36', '0000-00-00'),
	(137, '2012-09-26 14:18:36', '0000-00-00'),
	(138, '2012-09-26 14:18:36', '0000-00-00'),
	(139, '2012-09-26 14:18:36', '0000-00-00'),
	(140, '2012-09-26 14:18:36', '0000-00-00'),
	(141, '2012-09-26 14:18:36', '0000-00-00'),
	(142, '2012-09-26 14:18:36', '0000-00-00'),
	(143, '2012-09-26 14:18:36', '0000-00-00'),
	(144, '2012-09-26 14:18:36', '0000-00-00'),
	(145, '2012-09-26 14:18:36', '0000-00-00'),
	(146, '2012-09-26 14:18:37', '0000-00-00'),
	(147, '2012-09-26 14:18:37', '0000-00-00'),
	(148, '2012-09-26 14:18:37', '0000-00-00'),
	(149, '2012-09-26 14:18:37', '0000-00-00'),
	(150, '2012-09-27 11:33:06', NULL),
	(151, '2012-09-27 11:34:48', NULL),
	(152, '2012-09-27 11:34:48', NULL),
	(153, '2012-09-27 11:34:48', NULL),
	(154, '2012-09-27 14:10:08', NULL),
	(155, '2012-09-27 14:12:22', NULL),
	(156, '2012-09-27 14:12:22', NULL),
	(157, '2012-09-27 14:12:22', NULL),
	(158, '2012-09-27 14:12:22', NULL),
	(159, '2012-09-27 14:12:23', NULL),
	(160, '2012-09-27 14:12:23', NULL),
	(161, '2012-09-27 14:12:23', NULL),
	(162, '2012-09-27 14:12:23', NULL),
	(163, '2012-09-27 14:12:23', NULL),
	(164, '2012-09-27 14:12:23', NULL),
	(165, '2012-09-27 14:12:23', NULL),
	(166, '2012-09-27 14:12:23', NULL),
	(167, '2012-09-27 14:12:23', NULL),
	(168, '2012-09-27 14:12:23', NULL),
	(169, '2012-09-27 14:12:23', NULL),
	(170, '2012-09-27 14:13:56', NULL),
	(171, '2012-09-27 14:13:56', NULL),
	(172, '2012-09-27 14:13:56', NULL),
	(173, '2012-09-27 14:13:57', NULL),
	(174, '2012-09-27 14:13:57', NULL),
	(175, '2012-09-27 14:13:57', NULL),
	(176, '2012-09-28 11:37:09', NULL),
	(177, '2012-09-28 11:37:09', NULL),
	(178, '2012-09-28 11:37:09', NULL),
	(179, '2012-09-28 11:37:16', NULL),
	(180, '2012-09-28 11:37:16', NULL),
	(181, '2012-09-28 11:37:16', NULL),
	(182, '2012-09-28 11:37:20', NULL),
	(183, '2012-09-28 11:37:20', NULL),
	(184, '2012-09-28 11:37:20', NULL),
	(185, '2012-09-28 11:37:23', NULL),
	(186, '2012-09-28 11:37:23', NULL),
	(187, '2012-09-28 11:37:23', NULL);
/*!40000 ALTER TABLE `comunicaciones` ENABLE KEYS */;


-- Dumping structure for table edu.contenido
DROP TABLE IF EXISTS `contenido`;
CREATE TABLE IF NOT EXISTS `contenido` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `materia` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contenido_materia_1` (`materia`),
  CONSTRAINT `fk_contenido_materia_1` FOREIGN KEY (`materia`) REFERENCES `materia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='utf8_spanish_ci';

-- Dumping data for table edu.contenido: ~1 rows (approximately)
/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
INSERT INTO `contenido` (`id`, `nombre`, `descripcion`, `materia`) VALUES
	(3, 'Contenido 1 Mat', '<p>Contenido de Matemática</p>', 3);
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;


-- Dumping structure for table edu.cursado
DROP TABLE IF EXISTS `cursado`;
CREATE TABLE IF NOT EXISTS `cursado` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` date DEFAULT NULL,
  `materia` bigint(20) unsigned NOT NULL,
  `division` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia` (`materia`),
  KEY `division` (`division`),
  CONSTRAINT `division` FOREIGN KEY (`division`) REFERENCES `division` (`id`),
  CONSTRAINT `materia` FOREIGN KEY (`materia`) REFERENCES `materia` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.cursado: ~21 rows (approximately)
/*!40000 ALTER TABLE `cursado` DISABLE KEYS */;
INSERT INTO `cursado` (`id`, `fechaAlta`, `fechaBaja`, `materia`, `division`) VALUES
	(5, '2012-09-21 23:17:12', NULL, 4, 15),
	(6, '2012-09-21 23:17:12', NULL, 5, 15),
	(7, '2012-09-21 23:17:12', NULL, 6, 15),
	(8, '2012-09-22 01:49:21', NULL, 4, 16),
	(9, '2012-09-22 01:49:21', NULL, 5, 16),
	(10, '2012-09-22 01:49:21', NULL, 6, 16),
	(11, '2012-09-23 23:33:13', NULL, 4, 17),
	(12, '2012-09-23 23:33:13', NULL, 5, 17),
	(13, '2012-09-23 23:33:13', NULL, 6, 17),
	(14, '2012-09-26 11:28:44', NULL, 4, 18),
	(15, '2012-09-26 11:28:44', NULL, 5, 18),
	(16, '2012-09-26 11:28:44', NULL, 6, 18),
	(17, '2012-09-26 11:28:53', '2012-09-28', 4, 19),
	(18, '2012-09-26 11:28:53', '2012-09-28', 5, 19),
	(19, '2012-09-26 11:28:54', '2012-09-28', 6, 19),
	(20, '2012-09-26 12:44:56', '2012-09-28', 4, 20),
	(21, '2012-09-26 12:44:56', '2012-09-28', 5, 20),
	(22, '2012-09-26 12:44:56', '2012-09-28', 6, 20),
	(23, '2012-09-26 12:47:53', NULL, 4, 21),
	(24, '2012-09-26 12:47:53', NULL, 5, 21),
	(25, '2012-09-26 12:47:53', NULL, 6, 21),
	(26, '2012-09-27 14:23:49', '2012-09-28', 4, 19),
	(27, '2012-09-27 14:23:55', '2012-09-28', 5, 19),
	(28, '2012-09-27 14:24:01', '2012-09-28', 6, 19);
/*!40000 ALTER TABLE `cursado` ENABLE KEYS */;


-- Dumping structure for table edu.departamento
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table edu.departamento: ~18 rows (approximately)
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` (`id`, `nombre`) VALUES
	(1, 'Capital'),
	(2, 'General Alvear'),
	(3, 'Godoy Cruz'),
	(4, 'Guaymallén'),
	(5, 'Junín'),
	(6, 'La Paz'),
	(7, 'Las Heras'),
	(8, 'Lavalle'),
	(9, 'Luján de Cuyo'),
	(10, 'Maipú'),
	(11, 'Malargüe'),
	(12, 'Rivadavia'),
	(13, 'San Carlos'),
	(14, 'San Martín'),
	(15, 'San Rafael'),
	(16, 'Santa Rosa'),
	(17, 'Tunuyán'),
	(18, 'Tupungato');
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;


-- Dumping structure for table edu.detallecontenido
DROP TABLE IF EXISTS `detallecontenido`;
CREATE TABLE IF NOT EXISTS `detallecontenido` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  `contenido` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detallecontenido_contenido_1` (`contenido`),
  CONSTRAINT `fk_detallecontenido_contenido_1` FOREIGN KEY (`contenido`) REFERENCES `contenido` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.detallecontenido: ~0 rows (approximately)
/*!40000 ALTER TABLE `detallecontenido` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallecontenido` ENABLE KEYS */;


-- Dumping structure for table edu.detallecuaderno
DROP TABLE IF EXISTS `detallecuaderno`;
CREATE TABLE IF NOT EXISTS `detallecuaderno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` tinytext CHARACTER SET latin1,
  `fecha` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `comunicaciones` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_detallecuaderno_comunicaciones_1` (`comunicaciones`),
  CONSTRAINT `fk_detallecuaderno_comunicaciones_1` FOREIGN KEY (`comunicaciones`) REFERENCES `comunicaciones` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.detallecuaderno: ~0 rows (approximately)
/*!40000 ALTER TABLE `detallecuaderno` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallecuaderno` ENABLE KEYS */;


-- Dumping structure for table edu.dictadoprofesor
DROP TABLE IF EXISTS `dictadoprofesor`;
CREATE TABLE IF NOT EXISTS `dictadoprofesor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fechaAlta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` date DEFAULT NULL,
  `obser` tinytext CHARACTER SET latin1,
  `cargo` bigint(20) unsigned NOT NULL,
  `cursado` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cargo` (`cargo`),
  KEY `fk_dictadoprofesor_cursado_1` (`cursado`),
  CONSTRAINT `cargo` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`id`),
  CONSTRAINT `fk_dictadoprofesor_cursado_1` FOREIGN KEY (`cursado`) REFERENCES `cursado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.dictadoprofesor: ~0 rows (approximately)
/*!40000 ALTER TABLE `dictadoprofesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `dictadoprofesor` ENABLE KEYS */;


-- Dumping structure for table edu.directivo
DROP TABLE IF EXISTS `directivo`;
CREATE TABLE IF NOT EXISTS `directivo` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `persona` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_persona` (`persona`),
  CONSTRAINT `FK_persona` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.directivo: ~4 rows (approximately)
/*!40000 ALTER TABLE `directivo` DISABLE KEYS */;
INSERT INTO `directivo` (`id`, `persona`) VALUES
	(4, 7),
	(1, 8),
	(2, 9),
	(5, 28);
/*!40000 ALTER TABLE `directivo` ENABLE KEYS */;


-- Dumping structure for table edu.division
DROP TABLE IF EXISTS `division`;
CREATE TABLE IF NOT EXISTS `division` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` date DEFAULT NULL,
  `descripcion` tinytext COLLATE utf8_spanish_ci,
  `numero` int(11) DEFAULT NULL,
  `anio` enum('1','2','3','4','5','6','7','8','9') COLLATE utf8_spanish_ci NOT NULL,
  `escuela` bigint(20) unsigned NOT NULL,
  `planestudio` bigint(20) unsigned NOT NULL,
  `turno` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `planestudio` (`planestudio`),
  KEY `turno` (`turno`),
  KEY `escuela` (`escuela`),
  CONSTRAINT `escuela` FOREIGN KEY (`escuela`) REFERENCES `escuela` (`id`),
  CONSTRAINT `planestudio` FOREIGN KEY (`planestudio`) REFERENCES `plandeestudio` (`id`),
  CONSTRAINT `turno` FOREIGN KEY (`turno`) REFERENCES `turno` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.division: ~13 rows (approximately)
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
INSERT INTO `division` (`id`, `nombre`, `fechaAlta`, `fechaBaja`, `descripcion`, `numero`, `anio`, `escuela`, `planestudio`, `turno`) VALUES
	(2, 'B', '2012-09-19 19:26:57', NULL, NULL, NULL, '1', 1, 2, 1),
	(3, 'A', '2012-09-19 19:38:48', NULL, NULL, NULL, '2', 1, 2, 1),
	(4, 'A', '2012-09-19 19:39:04', NULL, NULL, NULL, '3', 1, 2, 1),
	(5, 'B', '2012-09-19 19:39:20', NULL, NULL, NULL, '1', 1, 2, 1),
	(6, 'B', '2012-09-19 19:39:43', NULL, NULL, NULL, '3', 1, 2, 1),
	(7, 'A', '2012-09-19 19:41:18', NULL, NULL, NULL, '1', 1, 2, 1),
	(15, 'A', '2012-09-21 23:17:12', NULL, NULL, NULL, '1', 2, 3, 1),
	(16, 'A', '2012-09-22 01:49:21', NULL, NULL, NULL, '2', 2, 3, 1),
	(17, 'A', '2012-09-23 23:33:13', NULL, NULL, NULL, '3', 2, 3, 1),
	(18, 'A', '2012-09-26 11:28:44', NULL, NULL, NULL, '1', 3, 3, 1),
	(19, 'A', '2012-09-26 11:28:53', NULL, NULL, NULL, '2', 3, 3, 1),
	(20, 'A', '2012-09-26 12:44:56', NULL, NULL, NULL, '3', 3, 3, 1),
	(21, 'B', '2012-09-26 12:47:53', NULL, NULL, NULL, '2', 3, 3, 1);
/*!40000 ALTER TABLE `division` ENABLE KEYS */;


-- Dumping structure for table edu.docente
DROP TABLE IF EXISTS `docente`;
CREATE TABLE IF NOT EXISTS `docente` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `persona` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKD_persona` (`persona`),
  CONSTRAINT `FKD_persona` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.docente: ~2 rows (approximately)
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT INTO `docente` (`id`, `persona`) VALUES
	(1, 7),
	(2, 8);
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;


-- Dumping structure for table edu.escuela
DROP TABLE IF EXISTS `escuela`;
CREATE TABLE IF NOT EXISTS `escuela` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `cue` int(11) DEFAULT NULL,
  `nombre` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `direccion` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `telefono` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `fechaResolucion` date DEFAULT NULL,
  `fechaCreacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaCierre` date DEFAULT NULL,
  `nivel` bigint(20) unsigned NOT NULL,
  `especialidad` bigint(20) unsigned NOT NULL,
  `departamento` int(10) NOT NULL,
  `localidad` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `especialidad` (`especialidad`),
  KEY `nivel` (`nivel`),
  KEY `departamento` (`departamento`),
  KEY `localidad` (`localidad`),
  CONSTRAINT `departamento` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`),
  CONSTRAINT `especialidad` FOREIGN KEY (`especialidad`) REFERENCES `especialidad` (`id`),
  CONSTRAINT `localidad` FOREIGN KEY (`localidad`) REFERENCES `localidad` (`id`),
  CONSTRAINT `nivel` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.escuela: ~3 rows (approximately)
/*!40000 ALTER TABLE `escuela` DISABLE KEYS */;
INSERT INTO `escuela` (`id`, `cue`, `nombre`, `direccion`, `numero`, `telefono`, `fechaResolucion`, `fechaCreacion`, `fechaCierre`, `nivel`, `especialidad`, `departamento`, `localidad`) VALUES
	(1, 50023, 'Jorge N Lencinas', 'Algún lugar', 4125, '4302562', '2007-07-05', NULL, NULL, 3, 1, 4, 41),
	(2, 50021, 'Benito Lamas', 'Algun Lugar', 4256, '0261548796', '2012-07-03', NULL, NULL, 1, 4, 2, 1),
	(3, 50013, 'Escuela 1234', 'por ahi', 1234, NULL, '2012-09-26', '2012-09-26 11:27:52', NULL, 1, 1, 4, 165);
/*!40000 ALTER TABLE `escuela` ENABLE KEYS */;


-- Dumping structure for table edu.escuelapersona
DROP TABLE IF EXISTS `escuelapersona`;
CREATE TABLE IF NOT EXISTS `escuelapersona` (
  `escuela` bigint(20) unsigned NOT NULL,
  `persona` bigint(20) unsigned NOT NULL,
  `tiporelacion_esc` int(11) NOT NULL,
  PRIMARY KEY (`escuela`,`persona`),
  KEY `persona_id` (`persona`),
  KEY `FK_escuelapersona_tiporelacion_esc` (`tiporelacion_esc`),
  CONSTRAINT `escuela_id` FOREIGN KEY (`escuela`) REFERENCES `escuela` (`id`),
  CONSTRAINT `FK_escuelapersona_tiporelacion_esc` FOREIGN KEY (`tiporelacion_esc`) REFERENCES `tiporelacion_esc` (`id`),
  CONSTRAINT `persona_id` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.escuelapersona: ~5 rows (approximately)
/*!40000 ALTER TABLE `escuelapersona` DISABLE KEYS */;
INSERT INTO `escuelapersona` (`escuela`, `persona`, `tiporelacion_esc`) VALUES
	(1, 8, 1),
	(1, 28, 1),
	(2, 7, 1),
	(2, 8, 1),
	(3, 28, 1);
/*!40000 ALTER TABLE `escuelapersona` ENABLE KEYS */;


-- Dumping structure for table edu.especialidad
DROP TABLE IF EXISTS `especialidad`;
CREATE TABLE IF NOT EXISTS `especialidad` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1,
  `resolucion` int(11) DEFAULT NULL,
  `fechaAlta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.especialidad: ~4 rows (approximately)
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` (`id`, `nombre`, `descripcion`, `resolucion`, `fechaAlta`, `fechaBaja`) VALUES
	(1, 'Perito Mercantil', '<p>Especialidad Perito Mercantil</p>', 1234, NULL, NULL),
	(2, 'Quimica', '<p>Especilidad Quimica</p>', 16, NULL, NULL),
	(3, 'Técnico Mecánico', '<p>Especialidad Escuelas Técnicas</p>', 2568, NULL, NULL),
	(4, 'Ninguna', '<p>\r\n Ninguna especialidad</p>\r\n', 123456, NULL, NULL);
/*!40000 ALTER TABLE `especialidad` ENABLE KEYS */;


-- Dumping structure for table edu.estadoexamen
DROP TABLE IF EXISTS `estadoexamen`;
CREATE TABLE IF NOT EXISTS `estadoexamen` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `estado` longblob,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.estadoexamen: ~0 rows (approximately)
/*!40000 ALTER TABLE `estadoexamen` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadoexamen` ENABLE KEYS */;


-- Dumping structure for table edu.estadoinscripcion
DROP TABLE IF EXISTS `estadoinscripcion`;
CREATE TABLE IF NOT EXISTS `estadoinscripcion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.estadoinscripcion: ~8 rows (approximately)
/*!40000 ALTER TABLE `estadoinscripcion` DISABLE KEYS */;
INSERT INTO `estadoinscripcion` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'Cursando', 'El Alumno se encuentra cursando'),
	(2, 'Abandono', 'Abandono del cursado'),
	(3, 'Pase', 'Pase de colegio'),
	(4, 'Cambio', 'Cambio de curso'),
	(5, 'Promocion', 'Promoción de curso'),
	(6, 'Libre', 'Condición de libre'),
	(7, 'Repetidor', 'Repetidor de curso'),
	(8, 'Egreso', 'Egreso del colegio');
/*!40000 ALTER TABLE `estadoinscripcion` ENABLE KEYS */;


-- Dumping structure for table edu.eventomateria
DROP TABLE IF EXISTS `eventomateria`;
CREATE TABLE IF NOT EXISTS `eventomateria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` longtext CHARACTER SET latin1,
  `inicio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fin` datetime DEFAULT NULL,
  `cursado` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eventomateria_cursado_1` (`cursado`),
  CONSTRAINT `fk_eventomateria_cursado_1` FOREIGN KEY (`cursado`) REFERENCES `cursado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.eventomateria: ~0 rows (approximately)
/*!40000 ALTER TABLE `eventomateria` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventomateria` ENABLE KEYS */;


-- Dumping structure for table edu.examen
DROP TABLE IF EXISTS `examen`;
CREATE TABLE IF NOT EXISTS `examen` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  `fechaAlta` datetime DEFAULT NULL,
  `inicio` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fin` datetime DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  `inscripcion` bigint(20) unsigned NOT NULL,
  `estado` bigint(20) unsigned NOT NULL,
  `tema` text CHARACTER SET latin1,
  PRIMARY KEY (`id`),
  KEY `fk_examen_estadoexamen_1` (`estado`),
  KEY `fk_examen_inscripcionalumno_1` (`inscripcion`),
  CONSTRAINT `fk_examen_estadoexamen_1` FOREIGN KEY (`estado`) REFERENCES `estadoexamen` (`id`),
  CONSTRAINT `fk_examen_inscripcionalumno_1` FOREIGN KEY (`inscripcion`) REFERENCES `inscripcionalumno` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.examen: ~0 rows (approximately)
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;


-- Dumping structure for table edu.inscripcionalumno
DROP TABLE IF EXISTS `inscripcionalumno`;
CREATE TABLE IF NOT EXISTS `inscripcionalumno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` date DEFAULT NULL,
  `alumno` bigint(20) unsigned NOT NULL,
  `comunicaciones` bigint(20) unsigned NOT NULL,
  `estado` bigint(20) unsigned NOT NULL,
  `cursado` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Alumno_1` (`alumno`),
  KEY `fk_comunicaciones_1` (`comunicaciones`),
  KEY `fk_cursado_1` (`cursado`),
  KEY `fk_estadoinscripcion_1` (`estado`),
  CONSTRAINT `fk_Alumno_1` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id`),
  CONSTRAINT `fk_comunicaciones_1` FOREIGN KEY (`comunicaciones`) REFERENCES `comunicaciones` (`id`),
  CONSTRAINT `fk_cursado_1` FOREIGN KEY (`cursado`) REFERENCES `cursado` (`id`),
  CONSTRAINT `fk_estadoinscripcion_1` FOREIGN KEY (`estado`) REFERENCES `estadoinscripcion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.inscripcionalumno: ~141 rows (approximately)
/*!40000 ALTER TABLE `inscripcionalumno` DISABLE KEYS */;
INSERT INTO `inscripcionalumno` (`id`, `fechaAlta`, `fechaBaja`, `alumno`, `comunicaciones`, `estado`, `cursado`) VALUES
	(1, '2012-09-21 23:53:44', '2012-09-24', 2, 2, 3, 5),
	(2, '2012-09-21 23:53:44', '2012-09-24', 2, 3, 3, 6),
	(3, '2012-09-21 23:53:44', '2012-09-24', 2, 4, 3, 7),
	(7, '2012-09-22 00:04:16', '2012-09-24', 1, 8, 3, 5),
	(8, '2012-09-22 00:04:16', '2012-09-24', 1, 9, 3, 6),
	(9, '2012-09-22 00:04:16', '2012-09-24', 1, 10, 3, 7),
	(10, '2012-09-22 00:31:03', '2012-09-24', 3, 11, 5, 5),
	(11, '2012-09-22 00:31:03', '2012-09-24', 3, 12, 5, 6),
	(12, '2012-09-22 00:31:03', '2012-09-24', 3, 13, 5, 7),
	(16, '2012-09-22 01:52:53', '2012-09-24', 4, 17, 5, 8),
	(17, '2012-09-22 01:52:53', '2012-09-24', 4, 18, 5, 9),
	(18, '2012-09-22 01:52:53', '2012-09-24', 4, 19, 5, 10),
	(19, '2012-09-23 23:13:35', '2012-09-24', 19, 20, 5, 8),
	(20, '2012-09-23 23:13:35', '2012-09-24', 19, 21, 5, 9),
	(21, '2012-09-23 23:13:35', '2012-09-24', 19, 22, 5, 10),
	(22, '2012-09-23 23:30:15', '2012-09-24', 5, 23, 5, 8),
	(23, '2012-09-23 23:30:15', '2012-09-24', 5, 24, 5, 9),
	(24, '2012-09-23 23:30:15', '2012-09-24', 5, 25, 5, 10),
	(25, '2012-09-24 22:09:10', '2012-09-26', 19, 26, 3, 5),
	(26, '2012-09-24 22:09:10', '2012-09-26', 19, 27, 3, 6),
	(27, '2012-09-24 22:09:10', '2012-09-26', 19, 28, 3, 7),
	(28, '2012-09-26 11:34:52', '2012-09-26', 7, 29, 3, 8),
	(29, '2012-09-26 11:34:52', '2012-09-26', 7, 30, 3, 9),
	(30, '2012-09-26 11:34:52', '2012-09-26', 7, 31, 3, 10),
	(31, '2012-09-26 11:44:30', '2012-09-26', 5, 32, 5, 14),
	(32, '2012-09-26 11:44:30', '2012-09-26', 5, 33, 5, 15),
	(33, '2012-09-26 11:44:30', '2012-09-26', 5, 34, 5, 16),
	(34, '2012-09-26 11:44:36', '2012-09-26', 9, 35, 5, 14),
	(35, '2012-09-26 11:44:36', '2012-09-26', 9, 36, 5, 15),
	(36, '2012-09-26 11:44:36', '2012-09-26', 9, 37, 5, 16),
	(37, '2012-09-26 11:44:39', '2012-09-26', 2, 38, 5, 14),
	(38, '2012-09-26 11:44:39', '2012-09-26', 2, 39, 5, 15),
	(39, '2012-09-26 11:44:39', '2012-09-26', 2, 40, 5, 16),
	(40, '2012-09-26 11:44:43', '2012-09-26', 1, 41, 5, 14),
	(41, '2012-09-26 11:44:43', '2012-09-26', 1, 42, 5, 15),
	(42, '2012-09-26 11:44:43', '2012-09-26', 1, 43, 5, 16),
	(43, '2012-09-26 11:44:46', '2012-09-26', 3, 44, 5, 14),
	(44, '2012-09-26 11:44:46', '2012-09-26', 3, 45, 5, 15),
	(45, '2012-09-26 11:44:46', '2012-09-26', 3, 46, 5, 16),
	(46, '2012-09-26 11:44:50', '2012-09-26', 6, 47, 5, 14),
	(47, '2012-09-26 11:44:50', '2012-09-26', 6, 48, 5, 15),
	(48, '2012-09-26 11:44:50', '2012-09-26', 6, 49, 5, 16),
	(49, '2012-09-26 11:44:54', '2012-09-26', 10, 50, 5, 14),
	(50, '2012-09-26 11:44:54', '2012-09-26', 10, 51, 5, 15),
	(51, '2012-09-26 11:44:54', '2012-09-26', 10, 52, 5, 16),
	(52, '2012-09-26 11:44:59', '2012-09-26', 17, 53, 5, 14),
	(53, '2012-09-26 11:44:59', '2012-09-26', 17, 54, 5, 15),
	(54, '2012-09-26 11:44:59', '2012-09-26', 17, 55, 5, 16),
	(55, '2012-09-26 11:45:02', '2012-09-26', 20, 56, 5, 14),
	(56, '2012-09-26 11:45:02', '2012-09-26', 20, 57, 5, 15),
	(57, '2012-09-26 11:45:02', '2012-09-26', 20, 58, 5, 16),
	(58, '2012-09-26 11:45:05', '2012-09-26', 21, 59, 5, 14),
	(59, '2012-09-26 11:45:05', '2012-09-26', 21, 60, 5, 15),
	(60, '2012-09-26 11:45:05', '2012-09-26', 21, 61, 5, 16),
	(61, '2012-09-26 13:52:38', '2012-09-26', 6, 62, 2, 17),
	(62, '2012-09-26 13:52:38', '2012-09-26', 6, 63, 2, 18),
	(63, '2012-09-26 13:52:38', '2012-09-26', 6, 64, 2, 19),
	(64, '2012-09-26 13:52:38', '2012-09-26', 12, 65, 2, 17),
	(65, '2012-09-26 13:52:38', '2012-09-26', 12, 66, 2, 18),
	(66, '2012-09-26 13:52:38', '2012-09-26', 12, 67, 2, 19),
	(67, '2012-09-26 13:52:39', '2012-09-26', 16, 68, 5, 17),
	(68, '2012-09-26 13:52:39', '2012-09-26', 16, 69, 5, 18),
	(69, '2012-09-26 13:52:39', '2012-09-26', 16, 70, 5, 19),
	(71, '2012-09-26 13:59:46', '2012-09-26', 3, 72, 5, 17),
	(72, '2012-09-26 13:59:46', '2012-09-26', 3, 73, 5, 18),
	(73, '2012-09-26 13:59:46', '2012-09-26', 3, 74, 5, 19),
	(74, '2012-09-26 14:04:21', '2012-09-26', 7, 75, 5, 17),
	(75, '2012-09-26 14:04:21', '2012-09-26', 7, 76, 5, 18),
	(76, '2012-09-26 14:04:21', '2012-09-26', 7, 77, 5, 19),
	(77, '2012-09-26 14:04:34', '2012-09-26', 20, 78, 5, 17),
	(78, '2012-09-26 14:04:34', '2012-09-26', 20, 79, 5, 18),
	(79, '2012-09-26 14:04:34', '2012-09-26', 20, 80, 5, 19),
	(80, '2012-09-26 14:05:21', '2012-09-26', 21, 81, 5, 17),
	(81, '2012-09-26 14:05:21', '2012-09-26', 21, 82, 5, 18),
	(82, '2012-09-26 14:05:21', '2012-09-26', 21, 83, 5, 19),
	(83, '2012-09-26 14:07:10', '2012-09-26', 16, 84, 8, 20),
	(84, '2012-09-26 14:07:10', '2012-09-26', 16, 85, 8, 21),
	(85, '2012-09-26 14:07:10', '2012-09-26', 16, 86, 8, 22),
	(86, '2012-09-26 14:07:10', '2012-09-26', 3, 87, 8, 20),
	(87, '2012-09-26 14:07:10', '2012-09-26', 3, 88, 8, 21),
	(88, '2012-09-26 14:07:10', '2012-09-26', 3, 89, 8, 22),
	(89, '2012-09-26 14:07:10', '2012-09-26', 7, 90, 8, 20),
	(90, '2012-09-26 14:07:10', '2012-09-26', 7, 91, 8, 21),
	(91, '2012-09-26 14:07:10', '2012-09-26', 7, 92, 8, 22),
	(92, '2012-09-26 14:07:10', '2012-09-26', 20, 93, 8, 20),
	(93, '2012-09-26 14:07:10', '2012-09-26', 20, 94, 8, 21),
	(94, '2012-09-26 14:07:10', '2012-09-26', 20, 95, 8, 22),
	(95, '2012-09-26 14:07:10', '2012-09-26', 21, 96, 8, 20),
	(96, '2012-09-26 14:07:10', '2012-09-26', 21, 97, 8, 21),
	(97, '2012-09-26 14:07:10', '2012-09-26', 21, 98, 8, 22),
	(98, '2012-09-26 14:17:28', NULL, 4, 99, 1, 14),
	(99, '2012-09-26 14:17:28', NULL, 4, 100, 1, 15),
	(100, '2012-09-26 14:17:28', NULL, 4, 101, 1, 16),
	(101, '2012-09-26 14:17:30', '2012-09-26', 11, 102, 5, 14),
	(102, '2012-09-26 14:17:30', '2012-09-26', 11, 103, 5, 15),
	(103, '2012-09-26 14:17:30', '2012-09-26', 11, 104, 5, 16),
	(104, '2012-09-26 14:17:38', '2012-09-26', 1, 105, 5, 14),
	(105, '2012-09-26 14:17:38', '2012-09-26', 1, 106, 5, 15),
	(106, '2012-09-26 14:17:38', '2012-09-26', 1, 107, 5, 16),
	(107, '2012-09-26 14:17:41', '2012-09-26', 2, 108, 5, 14),
	(108, '2012-09-26 14:17:41', '2012-09-26', 2, 109, 5, 15),
	(109, '2012-09-26 14:17:41', '2012-09-26', 2, 110, 5, 16),
	(110, '2012-09-26 14:17:44', '2012-09-26', 3, 111, 5, 14),
	(111, '2012-09-26 14:17:44', '2012-09-26', 3, 112, 5, 15),
	(112, '2012-09-26 14:17:44', '2012-09-26', 3, 113, 5, 16),
	(113, '2012-09-26 14:17:47', '2012-09-26', 12, 114, 5, 14),
	(114, '2012-09-26 14:17:47', '2012-09-26', 12, 115, 5, 15),
	(115, '2012-09-26 14:17:47', '2012-09-26', 12, 116, 5, 16),
	(116, '2012-09-26 14:17:50', '2012-09-26', 15, 117, 5, 14),
	(117, '2012-09-26 14:17:51', '2012-09-26', 15, 118, 5, 15),
	(118, '2012-09-26 14:17:51', '2012-09-26', 15, 119, 5, 16),
	(119, '2012-09-26 14:17:55', '2012-09-26', 20, 120, 5, 14),
	(120, '2012-09-26 14:17:55', '2012-09-26', 20, 121, 5, 15),
	(121, '2012-09-26 14:17:55', '2012-09-26', 20, 122, 5, 16),
	(122, '2012-09-26 14:18:04', '2012-09-26', 19, 123, 5, 14),
	(123, '2012-09-26 14:18:04', '2012-09-26', 19, 124, 5, 15),
	(124, '2012-09-26 14:18:04', '2012-09-26', 19, 125, 5, 16),
	(125, '2012-09-26 14:18:36', '2012-09-27', 11, 126, 5, 17),
	(126, '2012-09-26 14:18:36', '2012-09-27', 11, 127, 5, 18),
	(127, '2012-09-26 14:18:36', '2012-09-27', 11, 128, 5, 19),
	(128, '2012-09-26 14:18:36', '2012-09-27', 1, 129, 5, 17),
	(129, '2012-09-26 14:18:36', '2012-09-27', 1, 130, 5, 18),
	(130, '2012-09-26 14:18:36', '2012-09-27', 1, 131, 5, 19),
	(131, '2012-09-26 14:18:36', '2012-09-27', 2, 132, 5, 17),
	(132, '2012-09-26 14:18:36', '2012-09-27', 2, 133, 5, 18),
	(133, '2012-09-26 14:18:36', '2012-09-27', 2, 134, 5, 19),
	(134, '2012-09-26 14:18:36', '2012-09-27', 3, 135, 5, 17),
	(135, '2012-09-26 14:18:36', '2012-09-27', 3, 136, 5, 18),
	(136, '2012-09-26 14:18:36', '2012-09-27', 3, 137, 5, 19),
	(137, '2012-09-26 14:18:36', '2012-09-27', 12, 138, 5, 17),
	(138, '2012-09-26 14:18:36', '2012-09-27', 12, 139, 5, 18),
	(139, '2012-09-26 14:18:36', '2012-09-27', 12, 140, 5, 19),
	(140, '2012-09-26 14:18:36', '2012-09-27', 15, 141, 5, 17),
	(141, '2012-09-26 14:18:36', '2012-09-27', 15, 142, 5, 18),
	(142, '2012-09-26 14:18:36', '2012-09-27', 15, 143, 5, 19),
	(143, '2012-09-26 14:18:36', '2012-09-27', 20, 144, 5, 17),
	(144, '2012-09-26 14:18:36', '2012-09-27', 20, 145, 5, 18),
	(145, '2012-09-26 14:18:37', '2012-09-27', 20, 146, 5, 19),
	(146, '2012-09-26 14:18:37', '2012-09-27', 19, 147, 5, 17),
	(147, '2012-09-26 14:18:37', '2012-09-27', 19, 148, 5, 18),
	(148, '2012-09-26 14:18:37', '2012-09-27', 19, 149, 5, 19),
	(149, '2012-09-27 11:34:48', NULL, 5, 151, 1, 5),
	(150, '2012-09-27 11:34:48', NULL, 5, 152, 1, 6),
	(151, '2012-09-27 11:34:48', NULL, 5, 153, 1, 7),
	(152, '2012-09-27 14:12:22', '2012-09-28', 3, 155, 8, 20),
	(153, '2012-09-27 14:12:22', '2012-09-28', 3, 156, 8, 21),
	(154, '2012-09-27 14:12:22', '2012-09-28', 3, 157, 8, 22),
	(155, '2012-09-27 14:12:23', '2012-09-28', 12, 158, 8, 20),
	(156, '2012-09-27 14:12:23', '2012-09-28', 12, 159, 8, 21),
	(157, '2012-09-27 14:12:23', '2012-09-28', 12, 160, 8, 22),
	(158, '2012-09-27 14:12:23', '2012-09-28', 15, 161, 8, 20),
	(159, '2012-09-27 14:12:23', '2012-09-28', 15, 162, 8, 21),
	(160, '2012-09-27 14:12:23', '2012-09-28', 15, 163, 8, 22),
	(161, '2012-09-27 14:12:23', '2012-09-28', 20, 164, 8, 20),
	(162, '2012-09-27 14:12:23', '2012-09-28', 20, 165, 8, 21),
	(163, '2012-09-27 14:12:23', '2012-09-28', 20, 166, 8, 22),
	(164, '2012-09-27 14:12:23', '2012-09-28', 19, 167, 8, 20),
	(165, '2012-09-27 14:12:23', '2012-09-28', 19, 168, 8, 21),
	(166, '2012-09-27 14:12:23', '2012-09-28', 19, 169, 8, 22),
	(167, '2012-09-27 14:13:56', '2012-09-28', 1, 170, 8, 20),
	(168, '2012-09-27 14:13:56', '2012-09-28', 1, 171, 8, 21),
	(169, '2012-09-27 14:13:56', '2012-09-28', 1, 172, 8, 22),
	(170, '2012-09-27 14:13:57', '2012-09-28', 2, 173, 8, 20),
	(171, '2012-09-27 14:13:57', '2012-09-28', 2, 174, 8, 21),
	(172, '2012-09-27 14:13:57', '2012-09-28', 2, 175, 8, 22),
	(173, '2012-09-28 11:37:09', '2012-09-28', 1, 176, 5, 26),
	(174, '2012-09-28 11:37:09', '2012-09-28', 1, 177, 5, 27),
	(175, '2012-09-28 11:37:09', '2012-09-28', 1, 178, 5, 28),
	(176, '2012-09-28 11:37:16', '2012-09-28', 2, 179, 7, 26),
	(177, '2012-09-28 11:37:16', '2012-09-28', 2, 180, 7, 27),
	(178, '2012-09-28 11:37:16', '2012-09-28', 2, 181, 7, 28),
	(179, '2012-09-28 11:37:20', '2012-09-28', 3, 182, 5, 26),
	(180, '2012-09-28 11:37:20', '2012-09-28', 3, 183, 5, 27),
	(181, '2012-09-28 11:37:20', '2012-09-28', 3, 184, 5, 28),
	(182, '2012-09-28 11:37:23', '2012-09-28', 12, 185, 5, 26),
	(183, '2012-09-28 11:37:23', '2012-09-28', 12, 186, 5, 27),
	(184, '2012-09-28 11:37:23', '2012-09-28', 12, 187, 5, 28);
/*!40000 ALTER TABLE `inscripcionalumno` ENABLE KEYS */;


-- Dumping structure for table edu.localidad
DROP TABLE IF EXISTS `localidad`;
CREATE TABLE IF NOT EXISTS `localidad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `departamento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=196 DEFAULT CHARSET=latin1;

-- Dumping data for table edu.localidad: ~195 rows (approximately)
/*!40000 ALTER TABLE `localidad` DISABLE KEYS */;
INSERT INTO `localidad` (`id`, `nombre`, `departamento`) VALUES
	(1, '1ª Seccionl', 1),
	(2, '2ª Seccion', 1),
	(3, '3ª Seccion', 1),
	(4, '4ª Sección', 1),
	(5, '4ª Este', 1),
	(6, '4ª Oeste', 1),
	(7, '5ª Seccion', 1),
	(8, '6ª Seccion', 1),
	(9, 'Zona Oeste', 1),
	(10, 'Residencial Parque', 1),
	(11, 'Aeroparque', 1),
	(12, 'Parque Gral. San Martín', 1),
	(13, 'Los Cerros', 1),
	(14, 'San Agustín', 1),
	(15, 'Piedemonte', 1),
	(16, 'Bowen', 2),
	(17, 'Ciudad de General Alvear', 2),
	(18, 'San Pedro del Atuel', 2),
	(19, 'Gobernador Benegas', 3),
	(20, 'Ciudad de Godoy Cruz', 3),
	(21, 'Las Tortugas', 3),
	(22, 'Presidente Sarmiento', 3),
	(23, 'San Francisco del Monte', 3),
	(24, 'Bermejo', 4),
	(25, 'Buena Nueva', 4),
	(26, 'Capilla del Rosario', 4),
	(27, 'Colonia Segovia', 4),
	(28, 'Dorrego', 4),
	(29, 'El Sauce', 4),
	(30, 'Gral. Belgrano', 4),
	(31, 'Jesus Nazareno', 4),
	(32, 'Kilómetro 8', 4),
	(33, 'Kilómetro 11', 4),
	(34, 'La Primavera', 4),
	(35, 'Las Cañas', 4),
	(36, 'Los Corralitos', 4),
	(37, 'Pedro Molina', 4),
	(38, 'Rodeo de la Cruz', 4),
	(39, 'San Francisco del Monte', 4),
	(40, 'San José', 4),
	(41, 'Villa Nueva', 4),
	(42, 'Nueva Ciudad', 4),
	(43, 'Puente de Hierro', 4),
	(44, 'Algarrobo Grande', 5),
	(45, 'Alto Verde', 5),
	(46, 'Ciudad de Junín', 5),
	(47, 'La Colonia', 5),
	(48, 'Los Barriales', 5),
	(49, 'Medrano', 5),
	(50, 'Mundo Nuevo', 5),
	(51, 'Phillips', 5),
	(52, 'Rodriguez Peña', 5),
	(53, 'Desaguadero', 6),
	(54, 'Villa Nueva', 6),
	(55, 'Las Chacritas', 6),
	(56, 'Villa Antigua', 6),
	(57, 'La Menta', 6),
	(58, 'Capdevila', 7),
	(59, 'El Algarrobal', 7),
	(60, 'El Borbollón', 7),
	(61, 'El Challao', 7),
	(62, 'El Pastal', 7),
	(63, 'El Plumerillo', 7),
	(64, 'El Resguardo', 7),
	(65, 'El Zapallar', 7),
	(66, 'La Cieneguita', 7),
	(67, 'Las Cuevas', 7),
	(68, 'Ciudad de Las Heras', 7),
	(69, 'Panquehua', 7),
	(70, 'Uspallata', 7),
	(71, 'Jocolí', 8),
	(72, 'Costa de Araujo', 8),
	(73, 'El Carmen', 8),
	(74, 'El Chilcal', 8),
	(75, 'El Plumero', 8),
	(76, 'El Vergel', 8),
	(77, 'Ing. Gustavo André', 8),
	(78, 'Jocolí Viejo', 8),
	(79, 'La Asunción', 8),
	(80, 'La Holanda', 8),
	(81, 'La Pega', 8),
	(82, 'Lagunas del Rosario', 8),
	(83, 'Villa Tulumaya', 8),
	(84, 'Las Violetas', 8),
	(85, 'San José', 8),
	(86, 'San Miguel', 8),
	(87, 'Tres de Mayo', 8),
	(88, 'El Paramillo', 8),
	(89, 'La Palmera', 8),
	(90, 'San Francisco', 8),
	(91, 'Agrelo', 9),
	(92, 'Carrodilla', 9),
	(93, 'Chacras de Coria', 9),
	(94, 'El Carrizal', 9),
	(95, 'La Puntilla', 9),
	(96, 'Las Compuertas', 9),
	(97, 'Ciudad de Luján de Cuyo', 9),
	(98, 'Mayor Drumond', 9),
	(99, 'Perdriel', 9),
	(100, 'Potrerillos', 9),
	(101, 'Ugarteche', 9),
	(102, 'Vistalba', 9),
	(103, 'Coquimbito', 10),
	(104, 'Cruz de Piedra', 10),
	(105, 'Fray Luis Beltrán', 10),
	(106, 'Gral. Gutierrez', 10),
	(107, 'Gral. Ortega', 10),
	(108, 'Las Barrancas', 10),
	(109, 'Lunlunta', 10),
	(110, 'Ciudad de Maipú', 10),
	(111, 'Rodeo del Medio', 10),
	(112, 'Russell', 10),
	(113, 'San Roque', 10),
	(114, 'Luzuriaga', 10),
	(115, 'Río Barrancas', 11),
	(116, 'Agua Escondida', 11),
	(117, 'Ciudad de Malargüe', 11),
	(118, 'Río Grande', 11),
	(119, 'Andrade', 12),
	(120, 'Los Campamentos', 12),
	(121, 'El Mirador', 12),
	(122, 'La Central', 12),
	(123, 'La Libertad', 12),
	(124, 'Los Arboles', 12),
	(125, 'Medrano', 12),
	(126, 'Mundo Nuevo', 12),
	(127, 'Reducción', 12),
	(128, 'Ciudad de Rivadavia', 12),
	(129, 'Santa María de Oro', 12),
	(130, 'Eugenio Bustos', 13),
	(131, 'Chilecito', 13),
	(132, 'La Consulta', 13),
	(133, 'Pareditas', 13),
	(134, 'Ciudad de San Carlos', 13),
	(135, 'Alto Salvador', 14),
	(136, 'Alto Verde', 14),
	(137, 'Buen Orden', 14),
	(138, 'Chapanay', 14),
	(139, 'Las Chimbas', 14),
	(140, 'Chivilcoy', 14),
	(141, 'El Divisadero', 14),
	(142, 'El Central', 14),
	(143, 'El Espino', 14),
	(144, 'Montecaseros', 14),
	(145, 'Nueva California', 14),
	(146, 'Palmira', 14),
	(147, 'El Ramblón', 14),
	(148, 'Ciudad de San Martín', 14),
	(149, 'Tres Porteñas', 14),
	(150, 'Cañada Seca', 15),
	(151, 'Cuadro Benegas', 15),
	(152, 'Cuadro Nacional', 15),
	(153, 'El Cerrito', 15),
	(154, 'El Nihuil', 15),
	(155, 'Goudge', 15),
	(156, 'Jaime Prats', 15),
	(157, 'La Llave', 15),
	(158, 'Las Malvinas', 15),
	(159, 'Las Paredes', 15),
	(160, 'Monte Comán', 15),
	(161, 'Punta de Agua', 15),
	(162, 'Rama Caída', 15),
	(163, 'Real del Padre', 15),
	(164, 'Ciudad de San Rafael', 15),
	(165, '25 de Mayo', 15),
	(166, 'Villa Atuel', 15),
	(167, 'La Dormida', 16),
	(168, 'Las Catitas', 16),
	(169, 'Ciudad de Santa Rosa', 16),
	(170, 'Ñancuñán', 16),
	(171, '12 de Octubre', 16),
	(172, 'Campo de los Andes', 17),
	(173, 'Colonia Las Rosas', 17),
	(174, 'El Algarrobo', 17),
	(175, 'El Totoral', 17),
	(176, 'La Primavera', 17),
	(177, 'Los Arboles', 17),
	(178, 'Los Chacales', 17),
	(179, 'Ciudad de Tunuyán', 17),
	(180, 'Villa Seca', 17),
	(181, 'Vista Flores', 17),
	(182, 'Los Sauces', 17),
	(183, 'Las Pintadas', 17),
	(184, 'Anchoris', 18),
	(185, 'Cordón del Plata', 18),
	(186, 'El Peral', 18),
	(187, 'El Zampal', 18),
	(188, 'Gualtallary', 18),
	(189, 'La Arboleda', 18),
	(190, 'La Carrera', 18),
	(191, 'San José', 18),
	(192, 'Santa Clara', 18),
	(193, 'Ciudad de Tupungato', 18),
	(194, 'Villa Bastías', 18),
	(195, 'Ciudad de Mendoza', 1);
/*!40000 ALTER TABLE `localidad` ENABLE KEYS */;


-- Dumping structure for table edu.materia
DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `resolucion` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `year` enum('1','2','3','4','5','6','7','8','9') COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='utf8_spanish_ci';

-- Dumping data for table edu.materia: ~4 rows (approximately)
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` (`id`, `nombre`, `descripcion`, `resolucion`, `year`, `fechaAlta`, `fechaBaja`) VALUES
	(3, 'Matematica', '<p>1Ma</p>', '123', '1', '2012-07-26 22:04:51', NULL),
	(4, 'Lengua', '<p>\n	Lengua</p>\n', '123456', '1', '2012-09-21 23:13:25', NULL),
	(5, 'Matematica', '<p>\n	Matematica</p>\n', '123456', '1', '2012-09-21 23:13:43', NULL),
	(6, 'Ciencias Sociales', '<p>\n	cs cs</p>\n', '654', '1', '2012-09-21 23:14:15', NULL);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;


-- Dumping structure for table edu.nivel
DROP TABLE IF EXISTS `nivel`;
CREATE TABLE IF NOT EXISTS `nivel` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1,
  `direccionLinea` text CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.nivel: ~3 rows (approximately)
/*!40000 ALTER TABLE `nivel` DISABLE KEYS */;
INSERT INTO `nivel` (`id`, `nombre`, `descripcion`, `direccionLinea`) VALUES
	(1, 'Primario', '<p>Nivel Primario</p>', '<p>Sur</p>'),
	(2, 'Jardin', '<p>Jardines</p>', '<p>Sur</p>'),
	(3, 'Polimodal', '<p>Polimodales</p>', '<p>Secundario</p>');
/*!40000 ALTER TABLE `nivel` ENABLE KEYS */;


-- Dumping structure for table edu.nota
DROP TABLE IF EXISTS `nota`;
CREATE TABLE IF NOT EXISTS `nota` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `observ` tinytext CHARACTER SET latin1,
  `tipo` bigint(20) unsigned NOT NULL,
  `inscripcionAlu` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nota_inscripcionalumno_1` (`inscripcionAlu`),
  KEY `fk_nota_tiponota_1` (`tipo`),
  CONSTRAINT `fk_nota_inscripcionalumno_1` FOREIGN KEY (`inscripcionAlu`) REFERENCES `inscripcionalumno` (`id`),
  CONSTRAINT `fk_nota_tiponota_1` FOREIGN KEY (`tipo`) REFERENCES `tiponota` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.nota: ~0 rows (approximately)
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;


-- Dumping structure for table edu.novedadmateria
DROP TABLE IF EXISTS `novedadmateria`;
CREATE TABLE IF NOT EXISTS `novedadmateria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` longtext CHARACTER SET latin1,
  `fechaAlta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` datetime DEFAULT NULL,
  `titulo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `cursado` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_novedadmateria_cursado_1` (`cursado`),
  CONSTRAINT `fk_novedadmateria_cursado_1` FOREIGN KEY (`cursado`) REFERENCES `cursado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.novedadmateria: ~0 rows (approximately)
/*!40000 ALTER TABLE `novedadmateria` DISABLE KEYS */;
/*!40000 ALTER TABLE `novedadmateria` ENABLE KEYS */;


-- Dumping structure for table edu.opcion
DROP TABLE IF EXISTS `opcion`;
CREATE TABLE IF NOT EXISTS `opcion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `numero` int(11) DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  `seleccionada` longblob,
  `correcta` longblob,
  `pregunta` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_opcion_pregunta_1` (`pregunta`),
  CONSTRAINT `fk_opcion_pregunta_1` FOREIGN KEY (`pregunta`) REFERENCES `pregunta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.opcion: ~0 rows (approximately)
/*!40000 ALTER TABLE `opcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `opcion` ENABLE KEYS */;


-- Dumping structure for table edu.padre
DROP TABLE IF EXISTS `padre`;
CREATE TABLE IF NOT EXISTS `padre` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `persona` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKP_persona` (`persona`),
  CONSTRAINT `FKP_persona` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.padre: ~3 rows (approximately)
/*!40000 ALTER TABLE `padre` DISABLE KEYS */;
INSERT INTO `padre` (`id`, `persona`) VALUES
	(3, 7),
	(2, 8),
	(1, 9);
/*!40000 ALTER TABLE `padre` ENABLE KEYS */;


-- Dumping structure for table edu.permisorol
DROP TABLE IF EXISTS `permisorol`;
CREATE TABLE IF NOT EXISTS `permisorol` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `funcion` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.permisorol: ~8 rows (approximately)
/*!40000 ALTER TABLE `permisorol` DISABLE KEYS */;
INSERT INTO `permisorol` (`id`, `nombre`, `funcion`) VALUES
	(1, 'escuela', 'abm'),
	(2, 'plan_estudio', 'abm'),
	(3, 'materia', 'abm'),
	(4, 'contenido', 'abm'),
	(5, 'especialidad', 'abm'),
	(6, 'persona', 'abm'),
	(7, 'usuarios', 'abm'),
	(8, 'roles', 'abm');
/*!40000 ALTER TABLE `permisorol` ENABLE KEYS */;


-- Dumping structure for table edu.persona
DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `apellido` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `sexo` enum('F','M') COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `telefono` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `celular` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `codPostal` int(11) DEFAULT NULL,
  `departamento` int(11) NOT NULL,
  `localidad` int(11) NOT NULL,
  `provincia` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `pais` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `fechaAlta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` datetime DEFAULT NULL,
  `estado` longblob,
  PRIMARY KEY (`id`),
  KEY `FK_persona_localidad` (`localidad`),
  KEY `FK_persona_departamento` (`departamento`),
  CONSTRAINT `FK_persona_departamento` FOREIGN KEY (`departamento`) REFERENCES `departamento` (`id`),
  CONSTRAINT `FK_persona_localidad` FOREIGN KEY (`localidad`) REFERENCES `localidad` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.persona: ~26 rows (approximately)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`id`, `dni`, `nombre`, `apellido`, `sexo`, `email`, `telefono`, `celular`, `direccion`, `codPostal`, `departamento`, `localidad`, `provincia`, `pais`, `nacimiento`, `fechaAlta`, `fechaBaja`, `estado`) VALUES
	(3, '1234', 'Alicia', 'Esmera', 'F', '', NULL, NULL, 'a', NULL, 2, 2, NULL, NULL, '2012-07-16', '2012-07-17 13:46:15', NULL, NULL),
	(4, '12345678', 'Javier', 'Reza', 'M', NULL, NULL, NULL, 'bº ', NULL, 2, 1, NULL, NULL, '2012-07-04', '2012-07-17 13:49:54', NULL, NULL),
	(5, '22546879', 'Ernesto', 'Sabato', 'M', NULL, NULL, NULL, 'Algun Lugar', NULL, 2, 171, NULL, NULL, '2012-07-03', '2012-07-17 14:01:02', NULL, NULL),
	(6, '12345678', 'Mercedes', 'Real', 'F', NULL, NULL, NULL, 'a', NULL, 3, 165, NULL, NULL, '2012-07-11', '2012-07-17 14:02:08', NULL, NULL),
	(7, '12345678', 'Eugenia', 'Bustos', 'F', NULL, NULL, NULL, 'a', NULL, 2, 1, NULL, NULL, '2012-07-04', '2012-07-17 14:02:56', NULL, NULL),
	(8, '12456789', 'Miguel Angel', 'Calud', 'M', NULL, NULL, NULL, 'por ahi vivo yo', NULL, 2, 1, NULL, NULL, '2012-07-04', '2012-07-17 14:03:36', NULL, NULL),
	(9, '12321456', 'Raul', 'Reza', 'M', NULL, NULL, NULL, 'A', NULL, 2, 1, NULL, NULL, '2012-07-12', '2012-07-17 14:05:14', NULL, NULL),
	(10, '45321458', 'Mariano', 'Eligazetta', 'M', NULL, NULL, NULL, 'Algun lugar', NULL, 2, 165, NULL, NULL, '2002-09-06', '2012-09-22 01:12:31', NULL, NULL),
	(11, '45547895', 'Micaela', 'Trujillo', 'F', NULL, NULL, NULL, 'Por ahi 123', NULL, 2, 165, NULL, NULL, '1992-06-02', '2012-09-22 01:56:13', NULL, NULL),
	(12, '31245789', 'Gregorio', 'Ubendu', 'M', NULL, NULL, NULL, 'Por ahi 123', NULL, 3, 2, NULL, NULL, '1985-07-05', '2012-09-22 01:56:55', NULL, NULL),
	(13, '35457895', 'Dionisio', 'Frasquito', 'M', NULL, NULL, NULL, 'Por ahi 123', NULL, 5, 165, NULL, NULL, '1991-05-21', '2012-09-22 01:57:31', NULL, NULL),
	(14, '37548987', 'Adriana', 'Tirso', 'F', NULL, NULL, NULL, 'Por ahi 123', NULL, 3, 165, NULL, NULL, '1995-10-26', '2012-09-22 01:58:57', NULL, NULL),
	(15, '33547897', 'Miguel', 'Tajo', 'M', NULL, NULL, NULL, 'Por ahi 123', NULL, 2, 5, NULL, NULL, '1988-08-06', '2012-09-22 01:59:31', NULL, NULL),
	(16, '39458654', 'Rosio', 'Marengo', 'F', NULL, NULL, NULL, 'Avenida siempre viva 123', NULL, 3, 1, NULL, NULL, '1993-01-21', '2012-09-22 02:01:21', NULL, NULL),
	(17, '12456789', 'Eduardo', 'Galeano', 'M', NULL, NULL, NULL, 'Avenida siempre viva 123', NULL, 1, 171, NULL, NULL, '1954-03-05', '2012-09-22 02:03:01', NULL, NULL),
	(18, '21456789', 'Oliverio', 'Girondo', 'M', NULL, NULL, NULL, 'Avenida siempre viva 123', NULL, 1, 171, NULL, NULL, '1975-04-05', '2012-09-22 02:04:21', NULL, NULL),
	(19, '10123456', 'Paco', 'Urondo', 'M', NULL, NULL, NULL, 'Avenida siempre viva 123', NULL, 3, 165, NULL, NULL, '1968-07-09', '2012-09-22 02:06:14', NULL, NULL),
	(20, '10245678', 'Mario R.', 'Santucho', 'M', NULL, NULL, NULL, 'Avenida siempre viva 123', NULL, 2, 1, NULL, NULL, '1970-02-02', '2012-09-22 02:09:09', NULL, NULL),
	(21, '10213456', 'Severino', 'Di Giovanni', 'M', NULL, NULL, NULL, 'Avenida siempre viva 123', NULL, 3, 1, NULL, NULL, '1956-02-01', '2012-09-22 02:09:51', NULL, NULL),
	(22, '10547895', 'Liborio', 'Justo', 'M', NULL, NULL, NULL, 'Avenida siempre viva 123', NULL, 5, 1, NULL, NULL, '1943-07-03', '2012-09-22 02:10:24', NULL, NULL),
	(23, '07856123', 'Nahuel ', 'Moreno', 'M', NULL, NULL, NULL, 'Avenida siempre viva 123', NULL, 4, 171, NULL, NULL, '1943-04-06', '2012-09-22 02:10:52', NULL, NULL),
	(24, '10257456', 'Victorio', 'Codovilla', 'M', NULL, NULL, NULL, 'Avenida siempre viva 123', NULL, 1, 171, NULL, NULL, '1945-06-01', '2012-09-22 02:11:27', NULL, NULL),
	(25, '08954123', 'Leopoldo', 'Luque', 'M', NULL, NULL, NULL, 'Algun lugar siempre cerca', NULL, 4, 85, NULL, NULL, '2012-09-01', '2012-09-23 23:13:22', NULL, NULL),
	(26, '35621475', 'Jerónimo', 'Reza', 'M', NULL, NULL, NULL, 'por ahi', NULL, 1, 171, NULL, NULL, '1989-06-05', '2012-09-24 19:31:29', NULL, NULL),
	(27, '35654789', 'Marcelo', 'Reza', 'M', NULL, NULL, NULL, 'por ahi', NULL, 1, 171, NULL, NULL, '1990-09-04', '2012-09-24 19:33:41', NULL, NULL),
	(28, '33704888', 'Gonzalo', 'Siman', 'M', NULL, NULL, NULL, 'barrio', NULL, 4, 42, NULL, NULL, '1988-06-03', '2012-09-26 11:22:45', NULL, NULL);
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;


-- Dumping structure for table edu.persona_dictado
DROP TABLE IF EXISTS `persona_dictado`;
CREATE TABLE IF NOT EXISTS `persona_dictado` (
  `persona` bigint(20) unsigned NOT NULL,
  `dictado` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`persona`,`dictado`),
  KEY `fk_persona_dictado_dictadoprofesor_1` (`dictado`),
  CONSTRAINT `fk_persona_dictado_dictadoprofesor_1` FOREIGN KEY (`dictado`) REFERENCES `dictadoprofesor` (`id`),
  CONSTRAINT `fk_persona_dictado_persona_1` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.persona_dictado: ~0 rows (approximately)
/*!40000 ALTER TABLE `persona_dictado` DISABLE KEYS */;
/*!40000 ALTER TABLE `persona_dictado` ENABLE KEYS */;


-- Dumping structure for table edu.plandeestudio
DROP TABLE IF EXISTS `plandeestudio`;
CREATE TABLE IF NOT EXISTS `plandeestudio` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `resolucion` int(11) DEFAULT NULL,
  `cantAños` int(11) DEFAULT NULL,
  `fechaAlta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` date DEFAULT NULL,
  `nivel` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plandeestudio_nivel` (`nivel`),
  CONSTRAINT `FK_plandeestudio_nivel` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='utf8_spanish_ci';

-- Dumping data for table edu.plandeestudio: ~2 rows (approximately)
/*!40000 ALTER TABLE `plandeestudio` DISABLE KEYS */;
INSERT INTO `plandeestudio` (`id`, `nombre`, `descripcion`, `resolucion`, `cantAños`, `fechaAlta`, `fechaBaja`, `nivel`) VALUES
	(2, 'Economía y Gestión de las Organizaciones', '<p>\n	Algo</p>\n', 123, NULL, '2012-07-03 00:00:00', NULL, 3),
	(3, 'Bellas Artes', '<p>\n	Bellas Artes</p>\n', 4521, NULL, '2012-09-15 00:00:00', NULL, 1);
/*!40000 ALTER TABLE `plandeestudio` ENABLE KEYS */;


-- Dumping structure for table edu.planestudio_materia
DROP TABLE IF EXISTS `planestudio_materia`;
CREATE TABLE IF NOT EXISTS `planestudio_materia` (
  `planestudio` bigint(20) unsigned NOT NULL,
  `materia` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`planestudio`,`materia`),
  KEY `materia_id` (`materia`),
  CONSTRAINT `materia_id` FOREIGN KEY (`materia`) REFERENCES `materia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `planestudio_id` FOREIGN KEY (`planestudio`) REFERENCES `plandeestudio` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.planestudio_materia: ~3 rows (approximately)
/*!40000 ALTER TABLE `planestudio_materia` DISABLE KEYS */;
INSERT INTO `planestudio_materia` (`planestudio`, `materia`) VALUES
	(3, 4),
	(3, 5),
	(3, 6);
/*!40000 ALTER TABLE `planestudio_materia` ENABLE KEYS */;


-- Dumping structure for table edu.pregunta
DROP TABLE IF EXISTS `pregunta`;
CREATE TABLE IF NOT EXISTS `pregunta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  `numero` int(11) DEFAULT NULL,
  `examen` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pregunta_examen_1` (`examen`),
  CONSTRAINT `fk_pregunta_examen_1` FOREIGN KEY (`examen`) REFERENCES `examen` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.pregunta: ~0 rows (approximately)
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;


-- Dumping structure for table edu.publicmateria
DROP TABLE IF EXISTS `publicmateria`;
CREATE TABLE IF NOT EXISTS `publicmateria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` longtext CHARACTER SET latin1,
  `fechaAlta` datetime DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  `titulo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `cursado` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_publicmateria_cursado_1` (`cursado`),
  CONSTRAINT `fk_publicmateria_cursado_1` FOREIGN KEY (`cursado`) REFERENCES `cursado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.publicmateria: ~0 rows (approximately)
/*!40000 ALTER TABLE `publicmateria` DISABLE KEYS */;
/*!40000 ALTER TABLE `publicmateria` ENABLE KEYS */;


-- Dumping structure for table edu.recurso
DROP TABLE IF EXISTS `recurso`;
CREATE TABLE IF NOT EXISTS `recurso` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  `fechaAlta` datetime DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  `url` text CHARACTER SET latin1,
  `cursado` bigint(20) unsigned NOT NULL,
  `tipoRecurso` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recurso_cursado_1` (`cursado`),
  KEY `fk_recurso_tiporecurso_1` (`tipoRecurso`),
  CONSTRAINT `fk_recurso_cursado_1` FOREIGN KEY (`cursado`) REFERENCES `cursado` (`id`),
  CONSTRAINT `fk_recurso_tiporecurso_1` FOREIGN KEY (`tipoRecurso`) REFERENCES `tiporecurso` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.recurso: ~0 rows (approximately)
/*!40000 ALTER TABLE `recurso` DISABLE KEYS */;
/*!40000 ALTER TABLE `recurso` ENABLE KEYS */;


-- Dumping structure for table edu.relacion
DROP TABLE IF EXISTS `relacion`;
CREATE TABLE IF NOT EXISTS `relacion` (
  `idprimera` bigint(20) unsigned NOT NULL,
  `idsegunda` bigint(20) unsigned NOT NULL,
  `tipoRelacion` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`idprimera`,`idsegunda`),
  KEY `fk_relacion_tiporelacion_1` (`tipoRelacion`),
  KEY `fk_relacion_persona_2` (`idsegunda`),
  CONSTRAINT `fk_relacion_persona_1` FOREIGN KEY (`idprimera`) REFERENCES `persona` (`id`),
  CONSTRAINT `fk_relacion_persona_2` FOREIGN KEY (`idsegunda`) REFERENCES `persona` (`id`),
  CONSTRAINT `fk_relacion_tiporelacion_1` FOREIGN KEY (`tipoRelacion`) REFERENCES `tiporelacion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.relacion: ~12 rows (approximately)
/*!40000 ALTER TABLE `relacion` DISABLE KEYS */;
INSERT INTO `relacion` (`idprimera`, `idsegunda`, `tipoRelacion`) VALUES
	(5, 8, 1),
	(26, 9, 1),
	(27, 9, 1),
	(5, 7, 2),
	(26, 7, 2),
	(27, 7, 2),
	(4, 26, 3),
	(4, 27, 3),
	(26, 4, 3),
	(26, 27, 3),
	(27, 4, 3),
	(27, 26, 3);
/*!40000 ALTER TABLE `relacion` ENABLE KEYS */;


-- Dumping structure for table edu.rol
DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  `fechaAlta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.rol: ~5 rows (approximately)
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` (`id`, `nombre`, `descripcion`, `fechaAlta`, `fechaBaja`) VALUES
	(1, 'administrador', NULL, NULL, NULL),
	(2, 'directivo', NULL, NULL, NULL),
	(3, 'docente', NULL, NULL, NULL),
	(4, 'alumno', NULL, NULL, NULL),
	(5, 'padre', NULL, NULL, NULL);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;


-- Dumping structure for table edu.rol_permiso
DROP TABLE IF EXISTS `rol_permiso`;
CREATE TABLE IF NOT EXISTS `rol_permiso` (
  `rol` bigint(20) unsigned NOT NULL,
  `permiso` bigint(20) unsigned NOT NULL,
  `valor` int(10) DEFAULT NULL,
  PRIMARY KEY (`rol`,`permiso`),
  KEY `fk_rol_permiso_permisorol_1` (`permiso`),
  CONSTRAINT `fk_rol_permiso_permisorol_1` FOREIGN KEY (`permiso`) REFERENCES `permisorol` (`id`),
  CONSTRAINT `fk_rol_permiso_rol_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.rol_permiso: ~14 rows (approximately)
/*!40000 ALTER TABLE `rol_permiso` DISABLE KEYS */;
INSERT INTO `rol_permiso` (`rol`, `permiso`, `valor`) VALUES
	(1, 1, 7),
	(1, 2, 7),
	(1, 3, 7),
	(1, 4, 7),
	(1, 5, 7),
	(1, 6, 7),
	(1, 7, 7),
	(1, 8, 7),
	(2, 1, 5),
	(2, 2, 3),
	(2, 3, 3),
	(2, 5, 3),
	(2, 6, 5),
	(2, 7, 5);
/*!40000 ALTER TABLE `rol_permiso` ENABLE KEYS */;


-- Dumping structure for table edu.tiponota
DROP TABLE IF EXISTS `tiponota`;
CREATE TABLE IF NOT EXISTS `tiponota` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.tiponota: ~0 rows (approximately)
/*!40000 ALTER TABLE `tiponota` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiponota` ENABLE KEYS */;


-- Dumping structure for table edu.tiporecurso
DROP TABLE IF EXISTS `tiporecurso`;
CREATE TABLE IF NOT EXISTS `tiporecurso` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.tiporecurso: ~0 rows (approximately)
/*!40000 ALTER TABLE `tiporecurso` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiporecurso` ENABLE KEYS */;


-- Dumping structure for table edu.tiporelacion
DROP TABLE IF EXISTS `tiporelacion`;
CREATE TABLE IF NOT EXISTS `tiporelacion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.tiporelacion: ~3 rows (approximately)
/*!40000 ALTER TABLE `tiporelacion` DISABLE KEYS */;
INSERT INTO `tiporelacion` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'Padre', 'Padre - Hijo'),
	(2, 'Madre', 'Madre - Hijo'),
	(3, 'Hermano', 'Hermano - Hermano');
/*!40000 ALTER TABLE `tiporelacion` ENABLE KEYS */;


-- Dumping structure for table edu.tiporelacion_esc
DROP TABLE IF EXISTS `tiporelacion_esc`;
CREATE TABLE IF NOT EXISTS `tiporelacion_esc` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '0',
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table edu.tiporelacion_esc: ~1 rows (approximately)
/*!40000 ALTER TABLE `tiporelacion_esc` DISABLE KEYS */;
INSERT INTO `tiporelacion_esc` (`id`, `nombre`, `descripcion`) VALUES
	(1, 'Director', 'Director de la Institucion');
/*!40000 ALTER TABLE `tiporelacion_esc` ENABLE KEYS */;


-- Dumping structure for table edu.turno
DROP TABLE IF EXISTS `turno`;
CREATE TABLE IF NOT EXISTS `turno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `inicio` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fin` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.turno: ~3 rows (approximately)
/*!40000 ALTER TABLE `turno` DISABLE KEYS */;
INSERT INTO `turno` (`id`, `nombre`, `inicio`, `fin`) VALUES
	(1, 'Mañana', '08:00', '13:00'),
	(2, 'Tarde', NULL, NULL),
	(3, 'Noche', NULL, NULL);
/*!40000 ALTER TABLE `turno` ENABLE KEYS */;


-- Dumping structure for table edu.usuario
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `persona` bigint(20) unsigned DEFAULT NULL,
  `ussername` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `fechaAlta` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaBaja` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usuario_persona` (`persona`),
  CONSTRAINT `FK_usuario_persona` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.usuario: ~5 rows (approximately)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `persona`, `ussername`, `password`, `fechaAlta`, `fechaBaja`) VALUES
	(1, 8, 'gonza', '25f9e794323b453885f5181f1b624d0b', NULL, NULL),
	(2, 3, 'mcalud', '25f9e794323b453885f5181f1b624d0b', NULL, NULL),
	(5, 21, 'sgiovanni', '25f9e794323b453885f5181f1b624d0b', NULL, NULL),
	(6, 21, 'dgiovanni', '25f9e794323b453885f5181f1b624d0b', '2012-09-26 11:22:04', NULL),
	(7, 28, 'gsiman', '25f9e794323b453885f5181f1b624d0b', '2012-09-26 11:26:34', NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;


-- Dumping structure for table edu.usuario_rol
DROP TABLE IF EXISTS `usuario_rol`;
CREATE TABLE IF NOT EXISTS `usuario_rol` (
  `usuario` bigint(20) unsigned NOT NULL,
  `rol` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`usuario`,`rol`),
  KEY `fk_usario_rol_rol_1` (`rol`),
  CONSTRAINT `fk_usario_rol_rol_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`),
  CONSTRAINT `fk_usario_rol_usuario_1` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.usuario_rol: ~8 rows (approximately)
/*!40000 ALTER TABLE `usuario_rol` DISABLE KEYS */;
INSERT INTO `usuario_rol` (`usuario`, `rol`) VALUES
	(1, 1),
	(6, 1),
	(7, 1),
	(1, 2),
	(2, 2),
	(6, 2),
	(7, 2),
	(5, 3);
/*!40000 ALTER TABLE `usuario_rol` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
