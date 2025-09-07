-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2025 a las 05:57:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `4667961_universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_persona`
--

CREATE TABLE `registro_persona` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_persona` enum('empleado','visitante','invitado') NOT NULL,
  `movimiento` enum('entrada','salida') NOT NULL,
  `evento` varchar(150) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_persona`
--

INSERT INTO `registro_persona` (`id`, `nombre`, `tipo_persona`, `movimiento`, `evento`, `fecha_registro`) VALUES
(5, 'chuchema', 'visitante', 'salida', 'rara', '2025-09-06 05:46:01'),
(7, 'chuchemasalida', 'visitante', 'entrada', 'rara', '2025-09-06 05:51:46'),
(14, 'sadyyyyyyyyyyyyy', 'visitante', 'entrada', 'dsdddddddddd', '2025-09-06 06:07:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro_persona`
--
ALTER TABLE `registro_persona`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_persona`
--
ALTER TABLE `registro_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
