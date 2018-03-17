-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2018 a las 00:26:09
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `panel`
--

CREATE TABLE `panel` (
  `idpanel` int(50) NOT NULL,
  `monedas` text NOT NULL,
  `cod_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `panel`
--

INSERT INTO `panel` (`idpanel`, `monedas`, `cod_usuario`) VALUES
(1, 'Bitcoin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `identificacion` int(11) DEFAULT NULL,
  `tarjeta` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `Pais` varchar(50) DEFAULT NULL,
  `nombre_Pais` varchar(100) DEFAULT NULL,
  `nombre_moneda` varchar(50) DEFAULT NULL,
  `codigo_moneda` varchar(45) DEFAULT NULL,
  `code_tel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `correo`, `telefono`, `identificacion`, `tarjeta`, `password`, `Pais`, `nombre_Pais`, `nombre_moneda`, `codigo_moneda`, `code_tel`) VALUES
(1, '1242', '123', '123@123.com', 1234567, 12345, '12345678', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'co', 'Colombia', 'Peso', 'COP', 57),
(2, '1242', '123', '123@123.com', 1234567, 12345, '12345678', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'co', 'Colombia', 'Peso', 'COP', 57),
(3, '1242', '123', '1232@123.com', 1234567, 12345, '12345678', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'co', 'Colombia', 'Peso', 'COP', 57),
(4, '1242', '123', '1232@123.com', 1234567, 12345, '12345678', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'co', 'Colombia', 'Peso', 'COP', 57),
(5, '1242', '123', '123222@123.com', 1234567, 12345, '12345678', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'co', 'Colombia', 'Peso', 'COP', 57),
(6, '1242', '123', '123@123.com', 1234567, 12345, '12345678', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'co', 'Colombia', 'Peso', 'COP', 57),
(7, '1242', '123', '12376@123.com', 1234567, 12345, '12345678', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'co', 'Colombia', 'Peso', 'COP', 57),
(9, '32433', '234234df', '12323@334324.com', 1234567, 12345677, '12345656', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'co', 'Colombia', 'Peso', 'COP', 57),
(10, '32433', '234234df', '12323@3324324.com', 1234567, 12345677, '12345656', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'co', 'Colombia', 'Peso', 'COP', 57);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`idpanel`),
  ADD KEY `fk_panel_usuario_idx` (`cod_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `panel`
--
ALTER TABLE `panel`
  MODIFY `idpanel` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `panel`
--
ALTER TABLE `panel`
  ADD CONSTRAINT `fk_panel_usuario` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
