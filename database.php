<?php
$connection->query("
CREATE TABLE IF NOT EXISTS `autor` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;
");
$connection->query("
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
");
$connection->query("
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
");
$connection->query("
INSERT INTO `detallespedido` (`iddetalle`, `codigol`, `idpedido`, `cantidad`, `precio`) VALUES
(52, '100006', 29, 1, 8),
(53, '22232', 29, 1, 11.5),
(54, '100006', 30, 1, 8),
(55, '22233', 30, 1, 28);
");
$connection->query("
CREATE TABLE IF NOT EXISTS `editorial` (
  `codigoedi` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`codigoedi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11121 ;
");
$connection->query("
INSERT INTO `editorial` (`codigoedi`, `nombre`) VALUES
(11111, 'Dutton Perguin'),
(11113, 'PLAZA & JANES EDITORES'),
(11114, 'PUNTO DE LECTURA'),
(11115, 'ALSARI'),
(11116, 'DEBOLSILLO'),
(11117, ' PLANETA'),
(11119, 'VERBUM'),
(11120, 'YA LO DIJO CASIMIRO PARKER');
");
$connection->query("
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
");
$connection->query("
INSERT INTO `libro` (`codigol`, `titulo`, `isbn`, `codigoedi`, `genero`, `precio`, `cantidad`, `Autor`) VALUES
(22232, 'EL NOMBRE DEL VIENTO', '9788401352347', 11111, 'NOVELA', 11.5, 117, 13),
(22233, 'LUNA NUEVA', '9788479628765', 11119, 'NOVELA', 28, 16, 16),
(22234, 'EL ANIMAL', '9788494123238', 11120, 'POESIA CONTEMPORANEA', 18, 29, 4),
(22235, 'SIEMPRE DONDE QUIERAS', '9788497592208', 11116, 'NARRATIVA IBEROAMERICANA', 8.7, 396, 5),
(22236, 'IT', '9788497593793', 11119, 'TERROR', 19, 28, 24),
(22237, 'EL DOCTOR', '9788401354809', 11113, 'TERROR', 12, 54, 24),
(22240, 'LA SANGRE DE LOS INOCENTES', '9788401336379', 11115, 'NARRATIVA HISTORICA', 12, 120, 7),
(99999, 'EL INVIERNO DEL MUNDO', '10101', 11111, 'NARRATIVA EXTRANJERA', 18, 49, 1),
(100005, 'EL SILMARILLION', '9788479628760', 11116, 'TERROR', 7, 20, 2),
(100006, 'EL SANADOR DE CABALLOS', '9788479628722', 11111, 'NOVELA', 8, 197, 3);
");
$connection->query("
CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedido` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `codigou` int(11) NOT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `pedidos_ibfk_1` (`codigou`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;
");
$connection->query("
INSERT INTO `pedidos` (`idpedido`, `fecha`, `codigou`) VALUES
(29, '2016-11-06', 124),
(30, '2016-11-06', 123);
");
$connection->query("
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
");
$connection->query("
INSERT INTO `usuario` (`codigou`, `nombre`, `password`, `apellidos`, `email`, `categoria`, `nick`) VALUES
(2, 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 'adminiin', 'admin@web.com', 'ADMINISTRADOR', 'Admin'),
(123, 'santi', '827ccb0eea8a706c4c34a16891f84e7b', 'fg', 'santi@gmali.com', 'NORMAL', 'santi'),
(124, 'pepe', '827ccb0eea8a706c4c34a16891f84e7b', 'rodriguez', 'pepe@pepe.com', 'NORMAL', 'pepe');
");
$connection->query("
ALTER TABLE `detallespedido`
ADD CONSTRAINT `FACT_FK_idp` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE;
");
?>





