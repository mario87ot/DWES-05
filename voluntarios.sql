-- Tarea 3 DWES 2017-18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `voluntarios3`
--
CREATE DATABASE IF NOT EXISTS `voluntarios3` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `voluntarios3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anunciantes`
--

DROP TABLE IF EXISTS `anunciantes`;
CREATE TABLE IF NOT EXISTS `anunciantes` (
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `bloqueado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anunciantes`
--

INSERT INTO `anunciantes` (`login`, `password`, `email`, `bloqueado`) VALUES
('usu1', '$1$Dg5.QS0.$jn69c/DGOL4.I7wNr1QqI0', 'usuario1@gmail.com', 0),
('usu2', '$1$1.2..i3.$t88.rn7imzbSr/3sQ8e.x/', 'usuario2@gmail.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

DROP TABLE IF EXISTS `anuncios`;
CREATE TABLE IF NOT EXISTS `anuncios` (
`id_anuncio` int(11) NOT NULL,
  `autor` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `contenido` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `privado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- RELACIONES PARA LA TABLA `anuncios`:
--   `autor`
--       `anunciantes` -> `login`
--

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anunciantes`
--
ALTER TABLE `anunciantes`
 ADD PRIMARY KEY (`login`);

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
 ADD PRIMARY KEY (`id_anuncio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios`
--
ALTER TABLE `anuncios`
MODIFY `id_anuncio` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;