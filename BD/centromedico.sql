-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.6.26


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema centromedico
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ centromedico;
USE centromedico;

--
-- Table structure for table `centromedico`.`citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE `citas` (
  `idcita` int(11) NOT NULL,
  `citfecha` date NOT NULL,
  `cithora` time NOT NULL,
  `citPaciente` int(11) NOT NULL,
  `citMedico` int(11) NOT NULL,
  `citConsultorio` int(11) NOT NULL,
  `citestado` enum('Asignado','atendido') COLLATE utf8_spanish_ci NOT NULL,
  `citobservaciones` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idcita`),
  KEY `cithora` (`cithora`),
  KEY `idPaciente` (`citPaciente`),
  KEY `idMedico` (`citMedico`),
  KEY `idConsultorio` (`citConsultorio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `centromedico`.`citas`
--

/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;


--
-- Table structure for table `centromedico`.`consultorios`
--

DROP TABLE IF EXISTS `consultorios`;
CREATE TABLE `consultorios` (
  `idConsultorio` int(11) NOT NULL AUTO_INCREMENT,
  `conNombre` char(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idConsultorio`),
  UNIQUE KEY `conNombre` (`conNombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `centromedico`.`consultorios`
--

/*!40000 ALTER TABLE `consultorios` DISABLE KEYS */;
/*!40000 ALTER TABLE `consultorios` ENABLE KEYS */;


--
-- Table structure for table `centromedico`.`especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE `especialidades` (
  `idespecialidad` int(11) NOT NULL AUTO_INCREMENT,
  `espNombre` char(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idespecialidad`),
  UNIQUE KEY `espNombre` (`espNombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `centromedico`.`especialidades`
--

/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;


--
-- Table structure for table `centromedico`.`medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE `medicos` (
  `idMedico` int(11) NOT NULL AUTO_INCREMENT,
  `medidentificacion` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `mednombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `medapellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `medEspecialidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `medtelefono` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `medcorreo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idMedico`),
  UNIQUE KEY `medidentificacion` (`medidentificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `centromedico`.`medicos`
--

/*!40000 ALTER TABLE `medicos` DISABLE KEYS */;
INSERT INTO `medicos` (`idMedico`,`medidentificacion`,`mednombres`,`medapellidos`,`medEspecialidad`,`medtelefono`,`medcorreo`) VALUES 
 (1,'1015','victor manuel','Cantillo','cirugia','31042281464','yolo@correo.co'),
 (2,'10154','alonso brito','cantillo 45','pediatra','31042281464','yolo@correo.co');
/*!40000 ALTER TABLE `medicos` ENABLE KEYS */;


--
-- Table structure for table `centromedico`.`pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `idPaciente` int(11) NOT NULL AUTO_INCREMENT,
  `pacIdentificacion` char(15) COLLATE utf8_spanish_ci NOT NULL,
  `pacNombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pacApellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pacFechaNacimiento` date NOT NULL,
  `pacSexo` enum('Femenino','Masculino') COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idPaciente`),
  UNIQUE KEY `pacIdentificacion` (`pacIdentificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `centromedico`.`pacientes`
--

/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;


--
-- Table structure for table `centromedico`.`usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Roll` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `centromedico`.`usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`,`usuario`,`pass`,`nombres`,`apellidos`,`Roll`) VALUES 
 (1,'admin','d404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db','Victor','Cantillo','admin');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
