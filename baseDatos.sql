-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2015 a las 09:04:55
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desarrollo_web_proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE IF NOT EXISTS `archivo` (
  `idArchivo` int(11) NOT NULL,
  `NombreArchivo` varchar(40) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `tipoIMagen` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`idArchivo`, `NombreArchivo`, `idUsuario`, `tipoIMagen`) VALUES
(24, 'EUAWWaipIFuSmMi1gE.jpeg', 17, 'image'),
(25, 'cXDiag87WaP7dLo40.mp4', 17, 'video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `idComentario` int(11) NOT NULL,
  `Comentario` varchar(40) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idImegen` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `Comentario`, `idUsuario`, `idImegen`) VALUES
(1, '', 0, 0),
(2, '', 12, 12),
(3, 'que bonito', 17, 12),
(4, 'que bonito', 17, 12),
(5, 'Si funciona el php', 17, 12),
(6, 'qqq', 17, 24),
(7, '', 17, 24),
(8, '', 17, 24),
(9, '', 17, 24),
(10, 'QQQ', 17, 24),
(11, 'q', 17, 25),
(12, 'q', 17, 24),
(13, 'video Comentario', 17, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombreUsuario` varchar(45) DEFAULT NULL,
  `passwordUsuario` varchar(45) DEFAULT NULL,
  `usernameUsuario` varchar(40) NOT NULL,
  `emailUsuario` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombreUsuario`, `passwordUsuario`, `usernameUsuario`, `emailUsuario`) VALUES
(17, 'user', '5cc32e366c87c4cb49e4309b75f57d64', 'user', 'user@user.com'),
(19, 'q', '099b3b060154898840f0ebdfb46ec78f', 'q', 'q'),
(23, 'qq', '3bad6af0fa4b8b330d162e19938ee981', 'qq', 'qq'),
(24, 'qqq', '343b1c4a3ea721b2d640fc8700db0f36', 'qqq', 'qqq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`idArchivo`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `nombreUsuario_UNIQUE` (`nombreUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `idArchivo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
