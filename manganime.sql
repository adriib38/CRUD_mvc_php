-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2022 a las 09:03:49
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `manganime`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manganime`
--

CREATE TABLE `manganime` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `creador` varchar(255) NOT NULL,
  `genero` varchar(255) NOT NULL,
  `demografia` enum('Kodomo','Shōnen','Shōjo','Seinien','Josei') NOT NULL,
  `estreno` date DEFAULT NULL,
  `fin` date DEFAULT NULL,
  `tomos` int(11) DEFAULT NULL,
  `capitulos` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `manganime`
--

INSERT INTO `manganime` (`id`, `nombre`, `creador`, `genero`, `demografia`, `estreno`, `fin`, `tomos`, `capitulos`, `imagen`) VALUES
(1, 'Dragon Ball', 'Akira Toriyama', 'Acción, aventuras, fantasía', 'Shōnen', '1984-11-20', '1995-06-05', 42, 153, 'dragonball.jpg'),
(2, 'Naruto', 'Masashi Kishimoto', 'Acción, aventura, comedia, fantasía, Artes marciales', 'Shōnen', '1999-09-21', '2014-11-10', 72, 220, 'naruto.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personajes`
--

CREATE TABLE `personajes` (
  `id` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(80) NOT NULL,
  `edad` int(10) NOT NULL,
  `manganime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personajes`
--

INSERT INTO `personajes` (`id`, `nombre`, `descripcion`, `edad`, `manganime`) VALUES
(1, 'Vegeta', 'Vegeta, también conocido como Príncipe Vegeta o alternativamente con el estilo V', 49, 1),
(2, 'Itachi Uchiha', 'Itachi Uchiha es un personaje ficticio de los mangas y animes Naruto y Naruto: S', 18, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `manganime`
--
ALTER TABLE `manganime`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manganime` (`manganime`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `manganime`
--
ALTER TABLE `manganime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personajes`
--
ALTER TABLE `personajes`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personajes`
--
ALTER TABLE `personajes`
  ADD CONSTRAINT `personajes_ibfk_1` FOREIGN KEY (`manganime`) REFERENCES `manganime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
