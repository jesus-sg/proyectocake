-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2020 a las 00:47:01
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectocake`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `em_id` int(11) NOT NULL,
  `em_nit` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `em_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `em_direccion` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `em_ciudad` int(11) NOT NULL,
  `em_pais` int(11) NOT NULL,
  `em_telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `em_correo` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `em_fechacrea` datetime NOT NULL,
  `em_fechamod` datetime NOT NULL,
  `em_usuariocrea` datetime NOT NULL,
  `em_usuariomod` datetime NOT NULL,
  `em_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`em_id`, `em_nit`, `em_nombre`, `em_direccion`, `em_ciudad`, `em_pais`, `em_telefono`, `em_correo`, `em_fechacrea`, `em_fechamod`, `em_usuariocrea`, `em_usuariomod`, `em_estado`) VALUES
(1, '123456', 'prueba1', '', 0, 0, '', '', '0000-00-00 00:00:00', '2020-06-18 05:37:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, '654321', 'salcedos asociados', 'cl 30', 2, 1, '301', 'salcedo@gmail.com', '2020-06-18 04:33:39', '2020-06-19 05:10:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `ti_id` int(11) NOT NULL,
  `ti_nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`ti_id`, `ti_nombre`) VALUES
(1, 'SUPER U'),
(2, 'ADMINISTRATIVO'),
(3, 'USUARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `us_id` int(11) NOT NULL,
  `us_nitempresa` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `us_usuario` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `us_nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `us_password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `us_tipo` int(11) NOT NULL,
  `us_telefono` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `us_direccion` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `us_ciudad` int(11) NOT NULL,
  `us_pais` int(11) NOT NULL,
  `us_correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `us_fechacrea` datetime NOT NULL,
  `us_fechamod` datetime NOT NULL,
  `us_usuariocrea` int(11) NOT NULL,
  `us_usuariomod` int(11) NOT NULL,
  `us_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`us_id`, `us_nitempresa`, `us_usuario`, `us_nombre`, `us_password`, `us_tipo`, `us_telefono`, `us_direccion`, `us_ciudad`, `us_pais`, `us_correo`, `us_fechacrea`, `us_fechamod`, `us_usuariocrea`, `us_usuariomod`, `us_estado`) VALUES
(1, '123456', 'crhis', 'crhistian torres', '202cb962ac59075b964b07152d234b70', 1, '', '', 0, 0, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 1),
(2, '654321', 'luis27', 'luis jose', '2704dfe06d48a2c2316dff464f5b7920', 2, 'undefined', 'cl 333', 2, 1, 'luis@gamil.com', '2020-06-19 04:40:11', '2020-06-19 04:40:11', 1, 1, 1),
(3, '123456', 'crhis27', 'crhitofer p', '7746333f40133ceef6ee5f875e171557', 3, '3302', 'cl 36', 1, 1, 'laverga@gmail.com', '2020-06-19 04:41:29', '2020-06-19 05:03:11', 1, 1, 1),
(4, '654321', 'jose97', 'jose', '69f84ebe10951c721d165ccf1499ae15', 2, 'undefined', 'cl', 1, 1, 'jose@hotmail.com', '2020-06-19 04:43:29', '2020-06-19 04:43:29', 1, 1, 1),
(5, '654321', 'juan26', 'juan carlos', '700a6c7459e78d0b0ecbaaead4f91318', 3, '30051025', '', 1, 1, '', '2020-06-19 04:45:01', '2020-06-19 05:13:54', 1, 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`em_id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`ti_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `em_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `ti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
