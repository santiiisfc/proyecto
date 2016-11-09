-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2016 a las 18:52:04
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`codigo`, `nombre`, `apellidos`) VALUES
(1, 'KEN', 'FOLLET'),
(2, 'J.R.R', 'TOLKIEN'),
(3, 'GONZALO', 'GINER'),
(4, 'RICHARD', 'CASTLE'),
(5, 'DIEGO', 'OJEDA'),
(7, 'JULIA', 'NAVARRO'),
(11, 'PAULO', 'COHELO'),
(13, 'PATRICK', 'ROTHFUSS'),
(16, 'STEPHENIE', 'MEYER'),
(18, 'JULIO', 'PARDO'),
(24, 'STEPHEN', 'KING');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallespedido`
--

CREATE TABLE IF NOT EXISTS `detallespedido` (
  `iddetalle` int(11) NOT NULL,
  `codigol` char(6) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallespedido`
--

INSERT INTO `detallespedido` (`iddetalle`, `codigol`, `idpedido`, `cantidad`, `precio`) VALUES
(47, '100004', 26, 1, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editorial`
--

CREATE TABLE IF NOT EXISTS `editorial` (
  `codigoedi` int(5) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11126 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `editorial`
--

INSERT INTO `editorial` (`codigoedi`, `nombre`) VALUES
(11111, 'Dutton Perguin'),
(11113, 'PLAZA & JANES EDITORES'),
(11114, 'PUNTO DE LECTURA'),
(11115, 'ALSARI'),
(11116, 'DEBOLSILLO'),
(11117, ' PLANETA'),
(11119, 'VERBUM'),
(11120, 'YA LO DIJO CASIMIRO PARKER');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `codigol` int(5) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `isbn` varchar(20) NOT NULL,
  `codigoedi` char(8) DEFAULT NULL,
  `genero` varchar(40) DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT '20',
  `Autor` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=100011 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`codigol`, `titulo`, `isbn`, `codigoedi`, `genero`, `precio`, `cantidad`, `Autor`) VALUES
(22232, 'EL NOMBRE DEL VIENTO', '9788401352347', '11111', 'NOVELA', 11.5, 119, 13),
(22233, 'LUNA NUEVA', '9788479628765', '11119', 'NOVELA', 28, 19, 16),
(22234, 'EL ANIMAL', '9788494123238', '11120', 'POESIA CONTEMPORANEA', 18, 32, 18),
(22235, 'SIEMPRE DONDE QUIERAS', '9788497592208', '11116', 'NARRATIVA IBEROAMERICANA', 8.7, 396, 5),
(22236, 'IT', '9788497593793', '11119', 'TERROR', 19, 29, 24),
(22237, 'EL DOCTOR', '9788401354809', '11113', 'TERROR', 12, 55, 24),
(22240, 'LA SANGRE DE LOS INOCENTES', '9788401336379', '11115', 'NARRATIVA HISTORICA', 12, 121, 7),
(99999, 'EL INVIERNO DEL MUNDO', '10101', '11111', 'NARRATIVA EXTRANJERA', 18, 50, 1),
(100005, 'EL SILMARILLION', '9788479628760', '11116', 'TERROR', 7, 20, 2),
(100006, 'EL SANADOR DE CABALLOS', '9788479628722', '11111', 'NOVELA', 8, 200, 3),
(100010, 'prueba', '12', '11111', 'TERROR', 10, 10, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedido` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `codigou` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedido`, `fecha`, `codigou`) VALUES
(26, '2016-05-12', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `codigou` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `password` char(64) NOT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `categoria` set('NORMAL','ADMINISTRADOR','','') DEFAULT 'NORMAL',
  `nick` varchar(30) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codigou`, `nombre`, `password`, `apellidos`, `email`, `categoria`, `nick`) VALUES
(2, 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 'adminiin', 'admin@web.com', 'ADMINISTRADOR', 'Admin'),
(123, 'santi', '827ccb0eea8a706c4c34a16891f84e7b', 'fg', 'santi@gmali.com', 'NORMAL', 'santi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD PRIMARY KEY (`iddetalle`),
  ADD KEY `detallespedido_ibfk_1` (`codigol`),
  ADD KEY `detallespedido_ibfk_2` (`idpedido`);

--
-- Indices de la tabla `editorial`
--
ALTER TABLE `editorial`
  ADD PRIMARY KEY (`codigoedi`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`codigol`),
  ADD KEY `codigoedi` (`codigoedi`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `pedidos_ibfk_1` (`codigou`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codigou`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `editorial`
--
ALTER TABLE `editorial`
  MODIFY `codigoedi` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11126;
--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `codigol` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=100011;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codigou` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=126;
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

