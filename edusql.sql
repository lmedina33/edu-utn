-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-0ubuntu0.12.04.1 - (Ubuntu)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-09-21 20:07:56
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping database structure for edu
CREATE DATABASE IF NOT EXISTS `edu` /*!40100 DEFAULT CHARACTER SET latin1 */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.alumno: ~3 rows (approximately)
DELETE FROM `alumno`;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` (`id`, `fechaIngreso`, `fechaEngreso`, `fechaSalida`, `persona`) VALUES
	(1, '2012-07-17', NULL, NULL, 4),
	(2, '2012-07-17', NULL, NULL, 5),
	(3, '2012-07-17', NULL, NULL, 6);
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
DELETE FROM `cargo`;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;


-- Dumping structure for table edu.comunicaciones
DROP TABLE IF EXISTS `comunicaciones`;
CREATE TABLE IF NOT EXISTS `comunicaciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fechaAlta` date DEFAULT NULL,
  `fechaBaja` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.comunicaciones: ~0 rows (approximately)
DELETE FROM `comunicaciones`;
/*!40000 ALTER TABLE `comunicaciones` DISABLE KEYS */;
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
DELETE FROM `contenido`;
/*!40000 ALTER TABLE `contenido` DISABLE KEYS */;
INSERT INTO `contenido` (`id`, `nombre`, `descripcion`, `materia`) VALUES
	(3, 'Contenido 1 Mat', '<p>Contenido de Matemática</p>', 3);
/*!40000 ALTER TABLE `contenido` ENABLE KEYS */;


-- Dumping structure for table edu.cursado
DROP TABLE IF EXISTS `cursado`;
CREATE TABLE IF NOT EXISTS `cursado` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fechaAlta` date DEFAULT NULL,
  `fechaBaja` date DEFAULT NULL,
  `descripcion` longtext CHARACTER SET latin1,
  `materia` bigint(20) unsigned NOT NULL,
  `division` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia` (`materia`),
  KEY `division` (`division`),
  CONSTRAINT `division` FOREIGN KEY (`division`) REFERENCES `division` (`id`),
  CONSTRAINT `materia` FOREIGN KEY (`materia`) REFERENCES `materia` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.cursado: ~0 rows (approximately)
DELETE FROM `cursado`;
/*!40000 ALTER TABLE `cursado` DISABLE KEYS */;
/*!40000 ALTER TABLE `cursado` ENABLE KEYS */;


-- Dumping structure for table edu.departamento
DROP TABLE IF EXISTS `departamento`;
CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Dumping data for table edu.departamento: ~18 rows (approximately)
DELETE FROM `departamento`;
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
DELETE FROM `detallecontenido`;
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
DELETE FROM `detallecuaderno`;
/*!40000 ALTER TABLE `detallecuaderno` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallecuaderno` ENABLE KEYS */;


-- Dumping structure for table edu.dictadoprofesor
DROP TABLE IF EXISTS `dictadoprofesor`;
CREATE TABLE IF NOT EXISTS `dictadoprofesor` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fechaAlta` date DEFAULT NULL,
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
DELETE FROM `dictadoprofesor`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.directivo: ~1 rows (approximately)
DELETE FROM `directivo`;
/*!40000 ALTER TABLE `directivo` DISABLE KEYS */;
INSERT INTO `directivo` (`id`, `persona`) VALUES
	(1, 8);
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.division: ~10 rows (approximately)
DELETE FROM `division`;
/*!40000 ALTER TABLE `division` DISABLE KEYS */;
INSERT INTO `division` (`id`, `nombre`, `fechaAlta`, `fechaBaja`, `descripcion`, `numero`, `anio`, `escuela`, `planestudio`, `turno`) VALUES
	(2, 'B', '2012-09-19 19:26:57', NULL, NULL, NULL, '1', 1, 2, 1),
	(3, 'A', '2012-09-19 19:38:48', NULL, NULL, NULL, '2', 1, 2, 1),
	(4, 'A', '2012-09-19 19:39:04', NULL, NULL, NULL, '3', 1, 2, 1),
	(5, 'B', '2012-09-19 19:39:20', NULL, NULL, NULL, '1', 1, 2, 1),
	(6, 'B', '2012-09-19 19:39:43', NULL, NULL, NULL, '3', 1, 2, 1),
	(7, 'A', '2012-09-19 19:41:18', NULL, NULL, NULL, '1', 1, 2, 1),
	(8, 'A', '2012-09-21 19:20:20', NULL, NULL, NULL, '1', 2, 3, 1),
	(9, 'B', '2012-09-21 19:20:31', NULL, NULL, NULL, '1', 2, 3, 2),
	(10, 'A', '2012-09-21 19:20:43', NULL, NULL, NULL, '2', 2, 3, 1),
	(11, 'B', '2012-09-21 19:20:58', NULL, NULL, NULL, '2', 2, 3, 2);
/*!40000 ALTER TABLE `division` ENABLE KEYS */;


-- Dumping structure for table edu.docente
DROP TABLE IF EXISTS `docente`;
CREATE TABLE IF NOT EXISTS `docente` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `persona` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FKD_persona` (`persona`),
  CONSTRAINT `FKD_persona` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.docente: ~1 rows (approximately)
DELETE FROM `docente`;
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT INTO `docente` (`id`, `persona`) VALUES
	(1, 7);
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
  `fechaCreacion` date DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.escuela: ~2 rows (approximately)
DELETE FROM `escuela`;
/*!40000 ALTER TABLE `escuela` DISABLE KEYS */;
INSERT INTO `escuela` (`id`, `cue`, `nombre`, `direccion`, `numero`, `telefono`, `fechaResolucion`, `fechaCreacion`, `fechaCierre`, `nivel`, `especialidad`, `departamento`, `localidad`) VALUES
	(1, 50023, 'Jorge N Lencinas', 'Algún lugar', 4125, '4302562', '2007-07-05', NULL, NULL, 3, 1, 4, 41),
	(2, 50021, 'Benito Lamas', 'Algun Lugar', 4256, NULL, '2012-07-03', NULL, NULL, 1, 4, 2, 1);
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

-- Dumping data for table edu.escuelapersona: ~2 rows (approximately)
DELETE FROM `escuelapersona`;
/*!40000 ALTER TABLE `escuelapersona` DISABLE KEYS */;
INSERT INTO `escuelapersona` (`escuela`, `persona`, `tiporelacion_esc`) VALUES
	(1, 8, 1),
	(2, 8, 1);
/*!40000 ALTER TABLE `escuelapersona` ENABLE KEYS */;


-- Dumping structure for table edu.especialidad
DROP TABLE IF EXISTS `especialidad`;
CREATE TABLE IF NOT EXISTS `especialidad` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1,
  `resolucion` int(11) DEFAULT NULL,
  `fechaAlta` date DEFAULT NULL,
  `fechaBaja` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.especialidad: ~4 rows (approximately)
DELETE FROM `especialidad`;
/*!40000 ALTER TABLE `especialidad` DISABLE KEYS */;
INSERT INTO `especialidad` (`id`, `nombre`, `descripcion`, `resolucion`, `fechaAlta`, `fechaBaja`) VALUES
	(1, 'Perito Mercantil', '<p>Especialidad Perito Mercantil</p>', 1234, NULL, NULL),
	(2, 'Quimica', '<p>Especilidad Quimica</p>', 16, NULL, NULL),
	(3, 'Técnico Mecánico', '<p>Especialidad Escuelas Técnicas</p>', 2568, NULL, NULL),
	(4, 'Ninguna', '<p>\n	Ninguna especialidad</p>\n', 123456, NULL, NULL);
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
DELETE FROM `estadoexamen`;
/*!40000 ALTER TABLE `estadoexamen` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadoexamen` ENABLE KEYS */;


-- Dumping structure for table edu.estadoinscripcion
DROP TABLE IF EXISTS `estadoinscripcion`;
CREATE TABLE IF NOT EXISTS `estadoinscripcion` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.estadoinscripcion: ~0 rows (approximately)
DELETE FROM `estadoinscripcion`;
/*!40000 ALTER TABLE `estadoinscripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadoinscripcion` ENABLE KEYS */;


-- Dumping structure for table edu.eventomateria
DROP TABLE IF EXISTS `eventomateria`;
CREATE TABLE IF NOT EXISTS `eventomateria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  `inicio` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `cursado` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_eventomateria_cursado_1` (`cursado`),
  CONSTRAINT `fk_eventomateria_cursado_1` FOREIGN KEY (`cursado`) REFERENCES `cursado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.eventomateria: ~0 rows (approximately)
DELETE FROM `eventomateria`;
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
DELETE FROM `examen`;
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;


-- Dumping structure for table edu.inscripcionalumno
DROP TABLE IF EXISTS `inscripcionalumno`;
CREATE TABLE IF NOT EXISTS `inscripcionalumno` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fechaAlta` date DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.inscripcionalumno: ~0 rows (approximately)
DELETE FROM `inscripcionalumno`;
/*!40000 ALTER TABLE `inscripcionalumno` DISABLE KEYS */;
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
DELETE FROM `localidad`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='utf8_spanish_ci';

-- Dumping data for table edu.materia: ~1 rows (approximately)
DELETE FROM `materia`;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` (`id`, `nombre`, `descripcion`, `resolucion`, `year`, `fechaAlta`, `fechaBaja`) VALUES
	(3, 'Matematica', '<p>1Ma</p>', '123', '1', '2012-07-26 22:04:51', NULL);
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
DELETE FROM `nivel`;
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
DELETE FROM `nota`;
/*!40000 ALTER TABLE `nota` DISABLE KEYS */;
/*!40000 ALTER TABLE `nota` ENABLE KEYS */;


-- Dumping structure for table edu.novedadmateria
DROP TABLE IF EXISTS `novedadmateria`;
CREATE TABLE IF NOT EXISTS `novedadmateria` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` tinytext CHARACTER SET latin1,
  `fechaAlta` datetime DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  `titulo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `cursado` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_novedadmateria_cursado_1` (`cursado`),
  CONSTRAINT `fk_novedadmateria_cursado_1` FOREIGN KEY (`cursado`) REFERENCES `cursado` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.novedadmateria: ~0 rows (approximately)
DELETE FROM `novedadmateria`;
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
DELETE FROM `opcion`;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.padre: ~1 rows (approximately)
DELETE FROM `padre`;
/*!40000 ALTER TABLE `padre` DISABLE KEYS */;
INSERT INTO `padre` (`id`, `persona`) VALUES
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
DELETE FROM `permisorol`;
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
  `legajo` int(11) DEFAULT NULL,
  `dni` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `apellido` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `sexo` enum('F','M') COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.persona: ~8 rows (approximately)
DELETE FROM `persona`;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` (`id`, `legajo`, `dni`, `nombre`, `apellido`, `sexo`, `email`, `telefono`, `celular`, `direccion`, `codPostal`, `departamento`, `localidad`, `provincia`, `pais`, `nacimiento`, `fechaAlta`, `fechaBaja`, `estado`) VALUES
	(2, NULL, '33704888', 'Gonzalo', 'Siman', 'M', 'gonzasiman@mendoza.edu.ar', NULL, NULL, 'Bº Nueva Ciudad', 5519, 4, 191, NULL, NULL, '1988-06-03', '2012-07-17 12:54:18', NULL, NULL),
	(3, NULL, '1234', 'Alicia', 'Esmera', 'F', NULL, NULL, NULL, 'a', NULL, 2, 2, NULL, NULL, '2012-07-16', '2012-07-17 13:46:15', NULL, NULL),
	(4, NULL, '12345678', 'Javier', 'Reza', 'M', NULL, NULL, NULL, 'bº ', NULL, 2, 1, NULL, NULL, '2012-07-04', '2012-07-17 13:49:54', NULL, NULL),
	(5, NULL, '22546879', 'Ernesto', 'Sabato', 'M', NULL, NULL, NULL, 'Algun Lugar', NULL, 2, 171, NULL, NULL, '2012-07-03', '2012-07-17 14:01:02', NULL, NULL),
	(6, NULL, '12345678', 'Mercedes', 'Real', 'F', NULL, NULL, NULL, 'a', NULL, 3, 165, NULL, NULL, '2012-07-11', '2012-07-17 14:02:08', NULL, NULL),
	(7, NULL, '12345678', 'Eugenia', 'Bustos', 'F', NULL, NULL, NULL, 'a', NULL, 2, 1, NULL, NULL, '2012-07-04', '2012-07-17 14:02:56', NULL, NULL),
	(8, NULL, '12456789', 'Miguel', 'Calud', 'M', NULL, NULL, NULL, 'a', NULL, 2, 1, NULL, NULL, '2012-07-04', '2012-07-17 14:03:36', NULL, NULL),
	(9, NULL, '12321456', 'Raul', 'Reza', 'M', NULL, NULL, NULL, 'A', NULL, 2, 1, NULL, NULL, '2012-07-12', '2012-07-17 14:05:14', NULL, NULL);
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
DELETE FROM `persona_dictado`;
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
  `fechaAlta` date DEFAULT NULL,
  `fechaBaja` date DEFAULT NULL,
  `nivel` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_plandeestudio_nivel` (`nivel`),
  CONSTRAINT `FK_plandeestudio_nivel` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='utf8_spanish_ci';

-- Dumping data for table edu.plandeestudio: ~2 rows (approximately)
DELETE FROM `plandeestudio`;
/*!40000 ALTER TABLE `plandeestudio` DISABLE KEYS */;
INSERT INTO `plandeestudio` (`id`, `nombre`, `descripcion`, `resolucion`, `cantAños`, `fechaAlta`, `fechaBaja`, `nivel`) VALUES
	(2, 'Economía y Gestión de las Organizaciones', '<p>\n	Algo</p>\n', 123, NULL, '2012-07-03', NULL, 3),
	(3, 'Bellas Artes', '<p>\n	Bellas Artes</p>\n', 4521, NULL, '2012-09-15', NULL, 1);
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

-- Dumping data for table edu.planestudio_materia: ~0 rows (approximately)
DELETE FROM `planestudio_materia`;
/*!40000 ALTER TABLE `planestudio_materia` DISABLE KEYS */;
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
DELETE FROM `pregunta`;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;


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
DELETE FROM `recurso`;
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

-- Dumping data for table edu.relacion: ~3 rows (approximately)
DELETE FROM `relacion`;
/*!40000 ALTER TABLE `relacion` DISABLE KEYS */;
INSERT INTO `relacion` (`idprimera`, `idsegunda`, `tipoRelacion`) VALUES
	(5, 8, 1),
	(5, 7, 2),
	(4, 6, 3);
/*!40000 ALTER TABLE `relacion` ENABLE KEYS */;


-- Dumping structure for table edu.rol
DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` tinytext CHARACTER SET latin1,
  `fechaAlta` date DEFAULT NULL,
  `fechaBaja` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.rol: ~5 rows (approximately)
DELETE FROM `rol`;
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
DELETE FROM `rol_permiso`;
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
DELETE FROM `tiponota`;
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
DELETE FROM `tiporecurso`;
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
DELETE FROM `tiporelacion`;
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
DELETE FROM `tiporelacion_esc`;
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
DELETE FROM `turno`;
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
  `fechaAlta` datetime DEFAULT NULL,
  `fechaBaja` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_usuario_persona` (`persona`),
  CONSTRAINT `FK_usuario_persona` FOREIGN KEY (`persona`) REFERENCES `persona` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Dumping data for table edu.usuario: ~2 rows (approximately)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `persona`, `ussername`, `password`, `fechaAlta`, `fechaBaja`) VALUES
	(1, 8, 'gonza', 'c390230d013b917281314197e363dc5c', NULL, NULL),
	(2, 3, 'mcalud', NULL, NULL, NULL);
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

-- Dumping data for table edu.usuario_rol: ~3 rows (approximately)
DELETE FROM `usuario_rol`;
/*!40000 ALTER TABLE `usuario_rol` DISABLE KEYS */;
INSERT INTO `usuario_rol` (`usuario`, `rol`) VALUES
	(1, 1),
	(1, 2),
	(2, 2);
/*!40000 ALTER TABLE `usuario_rol` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
