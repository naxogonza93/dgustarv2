-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2017 a las 15:52:08
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dgustar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `rut_cliente` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`rut_cliente`, `nombre`, `apellido`, `telefono`, `email`) VALUES
('18199294-8', 'Pedro', 'Contreras', '+56993982206', 'pc.jssk@gmail.com'),
('18620433-6', 'Samuel', 'Gonzalez', '+56961240373', 'samgonza@alumnos.ubiobio.cl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cliente` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_compra`, `fecha`, `cliente`) VALUES
(10, '2017-12-12', '18199294-8'),
(11, '2017-12-12', '18620433-6'),
(12, '2017-12-12', '18620433-6'),
(13, '2017-12-12', '18199294-8'),
(14, '2017-12-12', '18199294-8'),
(15, '2017-12-12', '18620433-6'),
(16, '2017-12-12', '18199294-8'),
(17, '2017-12-18', '18620433-6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `id_detalle` int(11) NOT NULL,
  `id_de_compra` int(11) NOT NULL,
  `id_de_producto` int(11) NOT NULL,
  `precio_final` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detallecompra`
--

INSERT INTO `detallecompra` (`id_detalle`, `id_de_compra`, `id_de_producto`, `precio_final`, `cantidad`) VALUES
(4, 10, 10, 0, 3),
(5, 11, 9, 0, 5),
(6, 12, 16, 0, 4),
(7, 12, 10, 0, 2),
(8, 14, 11, 0, 6),
(9, 15, 13, 0, 4),
(10, 15, 12, 0, 4),
(11, 16, 9, 0, 2),
(12, 16, 12, 0, 1),
(13, 17, 12, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `stock`, `precio`) VALUES
(8, 'Barros luco', 100, 2000),
(9, 'Churrasco italiano', 100, 2000),
(10, 'Colacion', 100, 1800),
(11, 'Completo ', 100, 1000),
(12, 'Papas fritas', 100, 1000),
(13, 'Bebidas express', 100, 300),
(14, 'Cafe', 100, 300),
(15, 'Salchipapas', 100, 1200),
(16, 'Huevo Frito', 100, 700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `systemuser`
--

CREATE TABLE `systemuser` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(250) NOT NULL,
  `authKey` varchar(250) NOT NULL,
  `userLevel` enum('Admin','SuperAdmin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `systemuser`
--

INSERT INTO `systemuser` (`id`, `first_name`, `last_name`, `phone_number`, `username`, `email`, `password`, `authKey`, `userLevel`) VALUES
(1, 'samuel', 'gonzalez', '961240373', 'samgonza', 'samgonza@ubiobio.cl', 'lamisma1993', '', 'SuperAdmin'),
(2, 'pedro', 'contreras', '2423423', 'pedrin', 'pecontr@ubiobio.cl', 'pedrin2611', '', 'Admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`rut_cliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `cliente` (`cliente`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_de_compra` (`id_de_compra`),
  ADD KEY `id_de_producto` (`id_de_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `systemuser`
--
ALTER TABLE `systemuser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `systemuser`
--
ALTER TABLE `systemuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`rut_cliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `detallecompra_ibfk_1` FOREIGN KEY (`id_de_compra`) REFERENCES `compra` (`id_compra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detallecompra_ibfk_2` FOREIGN KEY (`id_de_producto`) REFERENCES `producto` (`id_producto`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
