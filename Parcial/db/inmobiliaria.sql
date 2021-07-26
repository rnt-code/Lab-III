-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2021 a las 22:23:23
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inmobiliaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprador`
--

CREATE TABLE `comprador` (
  `id_cliente` int(11) NOT NULL,
  `nombreyapellido` text COLLATE utf8_spanish_ci NOT NULL,
  `nrodoc` int(11) NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comprador`
--

INSERT INTO `comprador` (`id_cliente`, `nombreyapellido`, `nrodoc`, `direccion`, `telefono`) VALUES
(1, 'Yamila Aguila', 11111111, 'Islas Malvinas 11', 15511111),
(2, 'Matias Albornoz', 11111112, 'Islas Malvinas 12', 15511112),
(3, 'Miguel Leiva', 11111111, 'Islas Malvinas 13', 15511113),
(4, 'Valentina Maria', 11111114, 'Islas Malvinas 14', 15511114),
(5, 'Juan Estay', 11111115, 'Islas Malvinas 15', 15511115),
(6, 'Santiago Fernandez', 11111116, 'Islas Malvinas 16', 15511116),
(7, 'Leandro Maslov', 11111117, 'Islas Malvinas 17', 15511117),
(8, 'Jose Suarez', 11111118, 'Islas Malvinas 18', 15511118);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `id_inmueble` int(11) NOT NULL,
  `suptotal` int(11) NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `supconstruida` int(11) NOT NULL,
  `empadministradora` text COLLATE utf8_spanish_ci NOT NULL,
  `serv_luz` int(11) NOT NULL,
  `serv_gas` int(11) NOT NULL,
  `serv_agua` int(11) NOT NULL,
  `serv_cloaca` int(11) NOT NULL,
  `fecha_registro` date NOT NULL,
  `id_propietario` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`id_inmueble`, `suptotal`, `tipo`, `supconstruida`, `empadministradora`, `serv_luz`, `serv_gas`, `serv_agua`, `serv_cloaca`, `fecha_registro`, `id_propietario`, `precio`) VALUES
(1, 100, 'casa', 80, '', 0, 0, 0, 0, '2021-04-01', 1, '100000'),
(2, 80, 'casa', 10, '', 0, 0, 0, 0, '2021-04-01', 1, '80000'),
(3, 80, 'casa', 15, '', 0, 0, 0, 0, '2021-04-01', 2, '90000'),
(4, 110, 'casa', 30, '', 0, 0, 0, 0, '2021-04-01', 3, '110000'),
(5, 110, 'casa', 100, '', 0, 0, 0, 0, '2021-04-01', 3, '110000'),
(6, 80, 'departamento', 80, 'T.S.P.', 0, 0, 0, 0, '2021-04-01', 1, '90000'),
(7, 80, 'departamento', 75, 'T.S.P.', 0, 0, 0, 0, '2021-04-01', 2, '100000'),
(8, 95, 'departamento', 90, 'T.S.P.', 0, 0, 0, 0, '2021-04-01', 3, '100000'),
(9, 100, 'terreno', 0, '', 1, 1, 1, 1, '2021-04-01', 1, '50000'),
(10, 100, 'terreno', 0, '', 1, 1, 1, 0, '2021-04-01', 2, '55000'),
(11, 80, 'terreno', 0, '', 1, 1, 0, 0, '2021-04-01', 3, '45000'),
(12, 80, 'terreno', 0, '', 1, 1, 0, 0, '2021-04-01', 5, '46000'),
(13, 85, 'terreno', 0, '', 1, 0, 0, 0, '2021-04-01', 4, '0'),
(14, 95, 'terreno', 0, '', 1, 0, 0, 0, '2021-04-01', 6, '50000'),
(15, 110, 'terreno', 0, '', 0, 0, 0, 0, '2021-04-01', 4, '55000'),
(16, 105, 'terreno', 0, '', 0, 0, 0, 0, '2021-04-01', 6, '65000'),
(17, 120, 'terreno', 0, '', 0, 0, 0, 0, '2021-04-01', 1, '55000'),
(18, 100, 'terreno', 0, '', 0, 0, 0, 0, '2021-04-01', 1, '46000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id_propietario` int(11) NOT NULL,
  `nombreyapellido` text COLLATE utf8_spanish_ci NOT NULL,
  `nrodoc` int(11) NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id_propietario`, `nombreyapellido`, `nrodoc`, `direccion`, `telefono`) VALUES
(1, 'Estanislao, Torres', 22222222, 'Perito Moreno 10', 15522222),
(2, 'Emanuel Vitola', 22222223, 'Perito Moreno 11', 15522223),
(3, 'Carlos Ahumada', 22222224, 'Perito Moreno 12', 15522224),
(4, 'Fatima Albornoz', 22222225, 'Perito Moreno 13', 15522225),
(5, 'Brian Dip', 22222227, 'Perito Moreno 14', 15522226),
(6, 'Maria Fariaz', 22222228, 'Perito Moreno 15', 15522227);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `id_inmueble` int(11) NOT NULL,
  `precioventa` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `comision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comprador`
--
ALTER TABLE `comprador`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id_inmueble`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id_propietario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comprador`
--
ALTER TABLE `comprador`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id_inmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id_propietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
