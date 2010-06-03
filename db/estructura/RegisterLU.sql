-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-05-2010 a las 00:57:03
-- Versión del servidor: 5.1.37
-- Versión de PHP: 5.2.10-2ubuntu6.4

--
-- Estructura de la Base de Datos
--
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `__RegisteLU`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asistencia`
--
-- Creación: 04-05-2010 a las 00:06:08
--

CREATE TABLE IF NOT EXISTS `Asistencia` (
  `IdAsistencia` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Campo Clave de la Tabla',
  `HoraEntrada` time NOT NULL,
  `HoraSalida` time NOT NULL,
  `Fecha` date NOT NULL,
  `Cedula` int(8) NOT NULL COMMENT 'Clave Foreana',
  PRIMARY KEY (`IdAsistencia`),
  KEY `Cedula` (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Persona`
--
-- Creación: 03-05-2010 a las 23:51:15
--

CREATE TABLE IF NOT EXISTS `Persona` (
  `Nombre` varchar(30) NOT NULL COMMENT 'Contiene los 2 Nombres de los Usuarios',
  `Apellido` varchar(30) NOT NULL COMMENT 'Contiene los 2 Apellidos de los Usuarios',
  `Nacionalidad` varchar(1) NOT NULL COMMENT 'En conjunto con la cedula sera el DNI del Usuario',
  `Cedula` int(8) NOT NULL,
  `NivelUsuario` int(1) unsigned zerofill NOT NULL COMMENT 'Tendra los Valores 2 para Admin y 1 para Usuario Normal',
  `Password` int(4) unsigned zerofill NOT NULL COMMENT 'Contraseña del Usuario',
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Reporte`
--
-- Creación: 04-05-2010 a las 00:05:43
--

CREATE TABLE IF NOT EXISTS `Reporte` (
  `IdRegistro` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Campo Clave de la Tabla',
  `FechaRegistro` date NOT NULL COMMENT 'Fecha en que se realiza el Reporte',
  `Cedula` int(8) NOT NULL COMMENT 'Clave Foreana',
  PRIMARY KEY (`IdRegistro`),
  KEY `Cedula` (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `Asistencia`
--
ALTER TABLE `Asistencia`
  ADD CONSTRAINT `Asistencia_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `Persona` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `Reporte`
--
ALTER TABLE `Reporte`
  ADD CONSTRAINT `Reporte_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `Persona` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE;
