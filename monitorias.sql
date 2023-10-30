-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2023 a las 02:35:32
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `monitorias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consulta`
--

CREATE TABLE `consulta` (
  `id` int(11) NOT NULL,
  `monitor` int(11) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_novedades`
--

CREATE TABLE `registro_novedades` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `descripcion_novedad` text COLLATE utf8_spanish_ci NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `valor_hora_id` int(11) NOT NULL,
  `fecha_monitoria` date NOT NULL,
  `dependencia` text COLLATE utf8_spanish_ci NOT NULL,
  `revisor` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro_novedades`
--

INSERT INTO `registro_novedades` (`id`, `codigo`, `descripcion_novedad`, `hora_inicio`, `hora_fin`, `valor_hora_id`, `fecha_monitoria`, `dependencia`, `revisor`) VALUES
(2, 1088345483, 'Monitiria 70', '19:30:00', '21:00:00', 1, '2023-10-05', 'Biblioteca', 'Yo'),
(3, 1088345483, 'Monitiria 70', '19:30:00', '20:30:00', 1, '2023-10-05', 'Biblioteca', 'Yo'),
(4, 1088345483, 'Monitiria 70', '19:30:00', '20:30:00', 1, '2023-10-05', 'Biblioteca', 'Yo'),
(5, 1088345483, 'Monitiria 70', '19:30:00', '20:30:00', 1, '2023-10-05', 'Biblioteca', 'Yo'),
(6, 1088345483, 'Nada', '19:34:00', '20:34:00', 2, '2023-10-26', 'Biblioteca', 'Yo'),
(7, 1088345483, 'Nada', '19:34:00', '20:34:00', 2, '2023-10-26', 'Biblioteca', 'Yo'),
(8, 10888, 'Prueba', '19:48:00', '20:48:00', 1, '2023-10-26', 'Biblioteca', 'Yo'),
(9, 10888, 'Prueba', '19:48:00', '20:48:00', 1, '2023-10-26', 'Biblioteca', 'Yo'),
(10, 423456343, 'Prueba absoluta', '20:02:00', '20:06:00', 2, '2023-10-26', 'Biblioteca', 'Alguien'),
(11, 423456343, 'Prueba absoluta', '20:02:00', '20:06:00', 2, '2023-10-26', 'Biblioteca', 'Alguien'),
(12, 56747563, 'Prueba para monitores', '23:01:00', '20:06:00', 1, '2023-10-26', 'Biblioteca', 'Alguien'),
(13, 56747563, 'Prueba para monitores', '23:01:00', '20:06:00', 1, '2023-10-26', 'Biblioteca', 'Alguien'),
(14, 56747563, 'Monitiria 70', '20:06:00', '20:09:00', 4, '2023-10-29', 'Biblioteca', 'Alguien'),
(15, 56747563, 'Monitiria 70', '20:06:00', '20:09:00', 4, '2023-10-29', 'Biblioteca', 'Alguien'),
(16, 56747563, 'Nada', '20:07:00', '20:10:00', 4, '2023-10-26', 'Biblioteca', 'Alguien'),
(17, 56747563, 'Nada', '20:07:00', '20:10:00', 4, '2023-10-26', 'Biblioteca', 'Alguien'),
(18, 423456343, 'Monitiria 70', '20:07:00', '20:10:00', 2, '2023-10-28', 'Biblioteca', 'Yo'),
(19, 423456343, 'Monitiria 70', '20:07:00', '20:10:00', 2, '2023-10-28', 'Biblioteca', 'Yo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/191.jpg', 1, '2023-10-26 21:47:25', '2023-10-27 02:47:25'),
(60, 'Jonathan Orrego Montoya', 'jona', '$2a$07$asxx54ahjppf45sd87a5auDlZGHetl5hGNYWO.FnnspVBPIrEDLrq', 'Super-Administrador', '', 1, '2023-10-29 14:47:05', '2023-10-29 19:47:05'),
(62, 'Monitor', 'monitor', '$2a$07$asxx54ahjppf45sd87a5au478crS1R86nQkJ7FKd0.u062SaD6gMK', 'Monitor-Practicante', '', 1, '2023-10-26 21:52:18', '2023-10-27 02:52:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_monitores`
--

CREATE TABLE `usuarios_monitores` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `ciudad` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) NOT NULL,
  `programa` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios_monitores`
--

INSERT INTO `usuarios_monitores` (`id`, `nombre`, `documento`, `ciudad`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `edad`, `programa`, `tipo`) VALUES
(6, 'Luis', 423456343, 'Armenia', 'luis@ucp.edu.co', '42342345', 'Manzana 41', '2023-10-04', 29, 'TDS', 'Practicante'),
(7, 'Julian', 56747563, 'Pereira', 'julian.bernal@ucp.edu.co', '42342345', 'Manzana 43', '2023-10-16', 90, 'IST', 'Monitor'),
(8, 'Jonathan', 2121324234, 'Pereira', 'jonathan.orrego@ucp.edu.co', '3005507198', 'Manzana 41', '2023-10-16', 90, 'IST', 'Monitor'),
(9, 'Jonathan', 2121324234, 'Pereira', 'jonathan.orrego@ucp.edu.co', '3005507198', 'Manzana 41', '2023-10-16', 90, 'IST', 'Monitor'),
(11, 'Jonathan Orrego ', 1088, 'Pere', 'jonathan.orrego@ucp.edu.co', '300550', 'Manzana 40', '2023-10-25', 2, 'IS', 'Mon');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_monitoria`
--

CREATE TABLE `valor_monitoria` (
  `id` int(11) NOT NULL,
  `valor_hora` decimal(10,0) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `valor_monitoria`
--

INSERT INTO `valor_monitoria` (`id`, `valor_hora`, `tipo`, `fecha`, `estado`) VALUES
(1, '5100', 'Monitor', '2023-10-27 00:45:42', 1),
(2, '6000', 'Practicante', '2023-10-27 00:45:56', 1),
(4, '7900', 'Estudiante ', '2023-10-29 21:38:49', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_monitor` (`monitor`);

--
-- Indices de la tabla `registro_novedades`
--
ALTER TABLE `registro_novedades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_valor_hora` (`valor_hora_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios_monitores`
--
ALTER TABLE `usuarios_monitores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valor_monitoria`
--
ALTER TABLE `valor_monitoria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consulta`
--
ALTER TABLE `consulta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `registro_novedades`
--
ALTER TABLE `registro_novedades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT de la tabla `usuarios_monitores`
--
ALTER TABLE `usuarios_monitores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `valor_monitoria`
--
ALTER TABLE `valor_monitoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `idx_monitor` FOREIGN KEY (`monitor`) REFERENCES `usuarios_monitores` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_novedades`
--
ALTER TABLE `registro_novedades`
  ADD CONSTRAINT `idx_valor_hora` FOREIGN KEY (`valor_hora_id`) REFERENCES `valor_monitoria` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
