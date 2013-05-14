-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-05-2013 a las 18:10:39
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gasolinazos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasolinera`
--

CREATE TABLE IF NOT EXISTS `gasolinera` (
  `idgasolinera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `estacion` varchar(10) DEFAULT NULL,
  `idpemex` int(11) DEFAULT NULL,
  `ciudad_idciudad` int(11) NOT NULL,
  `zona_idzona` int(11) DEFAULT NULL,
  `grupo_idgrupo` int(11) DEFAULT NULL,
  `promedio` float DEFAULT NULL,
  `votos` int(11) DEFAULT NULL,
  `colonia` varchar(45) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `vpm` tinyint(1) DEFAULT NULL,
  `cualli` tinyint(1) DEFAULT NULL,
  `tar` varchar(80) DEFAULT NULL,
  `tipo_contrato` varchar(25) DEFAULT NULL,
  `numero_contrato` varchar(45) DEFAULT NULL,
  `fecha_contrato` date DEFAULT NULL,
  `vencimiento_contrato` date DEFAULT NULL,
  `tipo_convenio` varchar(30) DEFAULT NULL,
  `numero_convenio` varchar(45) DEFAULT NULL,
  `fecha_convenio` date DEFAULT NULL,
  `vencimiento_convenio` date DEFAULT NULL,
  `latitud` varchar(45) DEFAULT NULL,
  `longitud` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgasolinera`),
  KEY `fk_gasolinera_ciudad1_idx` (`ciudad_idciudad`),
  KEY `fk_gasolinera_zona1_idx` (`zona_idzona`),
  KEY `fk_gasolinera_grupo1_idx` (`grupo_idgrupo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gasolinera`
--
ALTER TABLE `gasolinera`
  ADD CONSTRAINT `fk_gasolinera_ciudad1` FOREIGN KEY (`ciudad_idciudad`) REFERENCES `ciudad` (`idciudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gasolinera_zona1` FOREIGN KEY (`zona_idzona`) REFERENCES `zona` (`idzona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gasolinera_grupo1` FOREIGN KEY (`grupo_idgrupo`) REFERENCES `grupo` (`idgrupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
