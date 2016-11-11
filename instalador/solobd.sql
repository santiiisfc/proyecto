-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.6.70.130:3306
-- Tiempo de generación: 06-11-2016 a las 16:51:54
-- Versión del servidor: 5.5.52
-- Versión de PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `autor`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallespedido`
--

CREATE TABLE IF NOT EXISTS `detallespedido` (
  `iddetalle` int(11) NOT NULL AUTO_INCREMENT,
  `codigol` char(6) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`iddetalle`),
  KEY `detallespedido_ibfk_1` (`codigol`),
  KEY `detallespedido_ibfk_2` (`idpedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `detallespedido`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `codigoedi` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codigoedi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11121 ;

--
-- Volcado de datos para la tabla `editorial`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `codigol` int(5) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `isbn` varchar(20) NOT NULL,
  `codigoedi` int(5) DEFAULT NULL,
  `genero` varchar(40) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT '20',
  `Autor` int(11) NOT NULL,
  PRIMARY KEY (`codigol`),
  KEY `codigoedi` (`codigoedi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100007 ;

--
-- Volcado de datos para la tabla `libro`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `codigou` int(11) NOT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `pedidos_ibfk_1` (`codigou`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `pedidos`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigou` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `password` char(64) NOT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `categoria` set('NORMAL','ADMINISTRADOR','','') DEFAULT 'NORMAL',
  `nick` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codigou`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigou`, `nombre`, `password`, `apellidos`, `email`, `categoria`, `nick`) VALUES
(2, 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 'adminiin', 'admin@web.com', 'ADMINISTRADOR', 'Admin'),
(123, 'santi', '827ccb0eea8a706c4c34a16891f84e7b', 'fg', 'santi@gmali.com', 'NORMAL', 'santi'),
(124, 'pepe', '827ccb0eea8a706c4c34a16891f84e7b', 'rodriguez', 'pepe@pepe.com', 'NORMAL', 'pepe');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD CONSTRAINT `FACT_FK_idp` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
