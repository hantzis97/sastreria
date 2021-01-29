-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 29-01-2021 a las 03:30:25
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sastreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idcargo`, `nombre`) VALUES
(1, 'sastre'),
(2, 'vendedor'),
(3, 'operario'),
(4, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `nombre`, `apellido`) VALUES
(12, 'hgerer', 'rrgefef'),
(13, 'ADAfe', 'rrgefef'),
(14, 'HTHTT', 'EGEGEG'),
(15, 'dqwdqwd', 'wdqdqd'),
(16, 'LUIS', 'RICCE'),
(17, 'PEDRO', 'FERNANDEZ'),
(18, 'LUIS', 'RICCE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `idcontrol` int(11) NOT NULL,
  `idusuario` varchar(50) NOT NULL,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `prenda` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `color` varchar(25) DEFAULT NULL,
  `fondo` varchar(25) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`idcontrol`, `idusuario`, `inicio`, `fin`, `prenda`, `color`, `fondo`, `estado`) VALUES
(18, 'Juan Romina', '2021-01-01 15:00:00', '2021-01-01 16:30:00', 'Pantalon', '#ffffff', '#d73737', 2),
(19, 'Juan Romina', '2021-01-09 03:15:00', '2021-01-09 08:55:00', 'Pantalon', '#ffffff', '#d73737', 2),
(21, 'Juan Romina', '2021-01-28 06:15:00', '2021-01-28 16:15:00', 'Pantalon', '#ffffff', '#d73737', 2),
(22, 'Juan Romina', '2021-01-03 01:00:00', '2021-01-03 08:00:00', 'Pantalon', '#ffffff', '#d73737', 2),
(23, 'Juan Romina', '2021-01-02 03:00:00', '2021-01-02 09:00:00', 'Pantalon', '#ffffff', '#d73737', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `idmateria` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(25) NOT NULL,
  `color` varchar(25) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `diseño` varchar(30) NOT NULL,
  `tamaño` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`idmateria`, `nombre`, `marca`, `color`, `tipo`, `diseño`, `tamaño`) VALUES
(1, 'Pantalon', 'DAWW', '3243fd', '', 'Bordado', 'Medianos'),
(5, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `medidas` varchar(250) NOT NULL,
  `detalles` varchar(500) DEFAULT NULL,
  `idcliente` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idpedido`, `nombre`, `medidas`, `detalles`, `idcliente`, `estado`, `fecha`) VALUES
(13, 'Pantalon', '25-15-45-85-45', 'Detalles nada más', 18, 1, '2021-01-16'),
(14, 'Pantalon', '25-15-45-85-45-122', 'Saco pequeño', 12, 1, '2021-01-17'),
(18, 'wefwef', '25-15-45-85-45', 'gergege', 13, 1, '2021-01-21'),
(19, 'egeg', 'erer', 'erer', 15, 1, '2021-01-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `talla` varchar(15) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `marca` varchar(25) NOT NULL,
  `color` varchar(30) NOT NULL,
  `detalle` varchar(150) NOT NULL,
  `stock` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `nombre`, `talla`, `tipo`, `marca`, `color`, `detalle`, `stock`) VALUES
(1, 'Pantalon', 'S', 'WE', 'DAWW', 'verdea', 'AQUÍ VAN LOS DETALLES', 13),
(5, 'ABA', 'BABA', 'BAAB', 'ABAB', 'ABBA', 'BBAAA', 13),
(6, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', 109),
(7, 'Pantalon', 'S', 'BCA', 'SE', '345FGG', 'AQUÍ VAN LOS DETALLES adsq', 144),
(8, 'Camisa', 'X', 'ABE', 'EQ', 'FWE', 'AQUÍ VAN LOS DETALLES adsq', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_descuento`
--

CREATE TABLE `registro_descuento` (
  `idregistro` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registro_descuento`
--

INSERT INTO `registro_descuento` (`idregistro`, `idproducto`, `cantidad`, `fecha`) VALUES
(2, 1, 12, '2021-01-16'),
(3, 1, 12, '2021-01-17'),
(4, 1, 5, '2021-01-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellido` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `idcargo` int(11) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `nombre`, `apellido`, `idcargo`, `telefono`, `direccion`, `estado`) VALUES
(5, 'abc', '123', 'Camila', 'Perez Diaz', 4, '4444444454', 'Avenidas Cairos 23134', 1),
(9, 'def', '123', 'Juan', 'Romina', 3, '74859585', 'Direccion de prueba numero 3', 1),
(10, 'abcd', '123', 'qwe', 'qwe', 2, '54845256', 'asdasdasd', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`idcontrol`);

--
-- Indices de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`idmateria`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `registro_descuento`
--
ALTER TABLE `registro_descuento`
  ADD PRIMARY KEY (`idregistro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `idcontrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  MODIFY `idmateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `registro_descuento`
--
ALTER TABLE `registro_descuento`
  MODIFY `idregistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
