-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3307
-- Temps de generació: 12-12-2022 a les 14:01:26
-- Versió del servidor: 10.4.25-MariaDB
-- Versió de PHP: 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `manganime`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `manganime`
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
-- Bolcament de dades per a la taula `manganime`
--

INSERT INTO `manganime` (`id`, `nombre`, `creador`, `genero`, `demografia`, `estreno`, `fin`, `tomos`, `capitulos`, `imagen`) VALUES
(1, 'Dragon Ball', 'Akira Toriyama', 'Acción, aventuras, fantasía', 'Shōnen', '1984-11-20', '1995-06-05', 42, 153, 'dragonball.jpg'),
(4, 'Naruto', 'Masashi Kishimoto', 'Acción, aventura, comedia, fantasía, Artes marciales', 'Josei', '1999-09-21', '2014-11-10', 72, 220, 'naruto.jpg');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `manganime`
--
ALTER TABLE `manganime`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `manganime`
--
ALTER TABLE `manganime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
