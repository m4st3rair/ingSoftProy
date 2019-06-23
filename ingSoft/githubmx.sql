-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2019 a las 06:37:54
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `githubmx`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `idARCH` int(10) NOT NULL,
  `id_propietario` int(10) NOT NULL,
  `fechaInicioARCH` datetime NOT NULL,
  `textoARCH` text COLLATE utf8_spanish_ci NOT NULL,
  `tituloARCH` text COLLATE utf8_spanish_ci NOT NULL,
  `tipoARCH` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descARCH` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`idARCH`, `id_propietario`, `fechaInicioARCH`, `textoARCH`, `tituloARCH`, `tipoARCH`, `descARCH`) VALUES
(19, 8, '2019-06-22 21:22:34', 'Disco de Oro Es nuestro tercer Ã¡lbum de estudio, con el que cerramos una gran aventura y damos comienzo a Los AÃ±os Maravillosos. Once tracks que ya existÃ­an, sÃ³lo los descubrimos.', 'Little Jesus, Girl Ultra - Fuera de Lugar', 'LOCAL', 'una cancion (letra)'),
(20, 8, '2019-06-22 21:27:58', 'Hace aÃ±os fui por primera vez a un concierto de DivisiÃ³n con una amiga ese dia fue magico esa amiga se convirtiÃ³ en el amor de mi vida hasta el dia de hoy', 'DivisiÃ³n MinÃºscula - Sognare (En Vivo)', 'LOCAL', 'Cansion (letra)'),
(21, 8, '2019-06-22 21:29:34', 'Ese trabajo te va a matar,\r\nNo se como lo puedes aguantar.\r\nAbre los ojos para verlo:\r\nCrees que estÃ¡s lejos pero sigues igual.', 'comentarios 1', 'COMPARTIDO', 'Comentarios random de videos'),
(22, 8, '2019-06-22 21:31:14', 'La gente de Saltillo tuvimos la oportunidad de escucharlos el dÃ­a de ayer y la verdad es que traen un ruido espectacular! Lo decepcionante fue que pidieron que cantÃ¡ramos con ellos y alcance a escuchar que uno dijo: Â¡A chinga si se la saben! jajajajaja! Se mamo', 'comentarios random 2', 'COMPARTIDO', 'comentarios aun mas random'),
(23, 9, '2019-06-22 21:35:52', 'Recordar mis dias de juventud cuando me sentia rebelde hahaha ahora a los 25 solo chidos recuerdos con estas rolas.', 'DivisiÃ³n minÃºscula - Las luces de esta ciudad', 'LOCAL', 'letra'),
(24, 9, '2019-06-22 21:36:54', 'Cuando vi este video por primera vez me negaba a pensar que era el fin de pepe problemas, pero despuÃ©s del Ãºltimo video regresÃ© a escuchar esta canciÃ³n y la neta ahora si llorÃ©, el fin del mejor canal en mi opiniÃ³n, hasta siempre #PepeProblemas', 'MUDANZA', 'LOCAL', 'COMENTARIOS'),
(25, 9, '2019-06-22 21:38:16', 'Me duele aceptarlo pero Pepe se va y no hay nada que podamos hacer........ lo Ãºnico que nos queda es recordar los lunes y jueves de desvergue y lo sÃ¡bados de pelÃ­culas ....... !!! Que viva el tren del mame !!!', 'mas de MUDANZA', 'COMPARTIDO', 'mas comentarios'),
(26, 10, '2019-06-22 21:57:22', 'La imagen del vÃ­deo me recordÃ³ a Ahri de League of Legends xD\r\nPor cierto, mola mogollÃ³n la mÃºsica :)', 'REVOLUTION | MOST POWERFUL VOCAL MUSIC | 1 Hour Female Vocal Mix', 'LOCAL', 'comentarios del video'),
(27, 10, '2019-06-22 21:58:13', 'This music is very nice! I am crazy about she! I listening this music every day! I love it!', 'comentarios', 'COMPARTIDO', 'comentarios de videos random');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaboradores`
--

CREATE TABLE `colaboradores` (
  `idCOLAB` int(10) NOT NULL,
  `idSolicitante` int(10) NOT NULL,
  `idARCH` int(10) NOT NULL,
  `estadoCOLAB` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `colaboradores`
--

INSERT INTO `colaboradores` (`idCOLAB`, `idSolicitante`, `idARCH`, `estadoCOLAB`) VALUES
(1, 9, 22, 'ESPERA'),
(2, 10, 22, 'ESPERA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idHIST` int(10) NOT NULL,
  `id_COMP` int(10) NOT NULL,
  `txtModifHIST` text COLLATE utf8_spanish_ci NOT NULL,
  `estadoHIST` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fechaHIST` datetime NOT NULL,
  `id_Archivo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`idHIST`, `id_COMP`, `txtModifHIST`, `estadoHIST`, `fechaHIST`, `id_Archivo`) VALUES
(10, 8, 'Disco de Oro Es nuestro tercer Ã¡lbum de estudio, con el que cerramos una gran aventura y damos comienzo a Los AÃ±os Maravillosos. Once tracks que ya existÃ­an, sÃ³lo los descubrimos.', 'ACEPTADO', '2019-06-22 21:22:34', 19),
(11, 8, 'Hace aÃ±os fui por primera vez a un concierto de DivisiÃ³n con una amiga ese dia fue magico esa amiga se convirtiÃ³ en el amor de mi vida hasta el dia de hoy', 'ACEPTADO', '2019-06-22 21:27:58', 20),
(12, 8, 'Ese trabajo te va a matar,\r\nNo se como lo puedes aguantar.\r\nAbre los ojos para verlo:\r\nCrees que estÃ¡s lejos pero sigues igual.', 'ACEPTADO', '2019-06-22 21:29:34', 21),
(13, 8, 'La gente de Saltillo tuvimos la oportunidad de escucharlos el dÃ­a de ayer y la verdad es que traen un ruido espectacular! Lo decepcionante fue que pidieron que cantÃ¡ramos con ellos y alcance a escuchar que uno dijo: Â¡A chinga si se la saben! jajajajaja! Se mamo', 'ACEPTADO', '2019-06-22 21:31:14', 22),
(14, 9, 'Recordar mis dias de juventud cuando me sentia rebelde hahaha ahora a los 25 solo chidos recuerdos con estas rolas.', 'ACEPTADO', '2019-06-22 21:35:52', 23),
(15, 9, 'Cuando vi este video por primera vez me negaba a pensar que era el fin de pepe problemas, pero despuÃ©s del Ãºltimo video regresÃ© a escuchar esta canciÃ³n y la neta ahora si llorÃ©, el fin del mejor canal en mi opiniÃ³n, hasta siempre #PepeProblemas', 'ACEPTADO', '2019-06-22 21:36:54', 24),
(16, 9, 'Me duele aceptarlo pero Pepe se va y no hay nada que podamos hacer........ lo Ãºnico que nos queda es recordar los lunes y jueves de desvergue y lo sÃ¡bados de pelÃ­culas ....... !!! Que viva el tren del mame !!!', 'ACEPTADO', '2019-06-22 21:38:16', 25),
(17, 10, 'La imagen del vÃ­deo me recordÃ³ a Ahri de League of Legends xD\r\nPor cierto, mola mogollÃ³n la mÃºsica :)', 'ACEPTADO', '2019-06-22 21:57:22', 26),
(18, 10, 'This music is very nice! I am crazy about she! I listening this music every day! I love it!', 'ACEPTADO', '2019-06-22 21:58:13', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUSR` int(10) NOT NULL,
  `nombreUSR` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `passUSR` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `correoUSR` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUSR`, `nombreUSR`, `passUSR`, `correoUSR`) VALUES
(8, 'Antonio islas', '12345', 'a@gmail.com'),
(9, 'Sergio Martinez', '12345', 'b@gmail.com'),
(10, 'un Hipopotamos Anomino', '12345', 'c@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`idARCH`),
  ADD KEY `id_propietario` (`id_propietario`);

--
-- Indices de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`idCOLAB`),
  ADD KEY `idSolicitante` (`idSolicitante`),
  ADD KEY `idARCH` (`idARCH`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idHIST`),
  ADD KEY `id_COMP` (`id_COMP`),
  ADD KEY `id_Archivo` (`id_Archivo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUSR`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `idARCH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `idCOLAB` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idHIST` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUSR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `archivo_ibfk_1` FOREIGN KEY (`id_propietario`) REFERENCES `usuarios` (`idUSR`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD CONSTRAINT `colaboradores_ibfk_1` FOREIGN KEY (`idSolicitante`) REFERENCES `usuarios` (`idUSR`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `colaboradores_ibfk_2` FOREIGN KEY (`idARCH`) REFERENCES `archivo` (`idARCH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `historial_ibfk_1` FOREIGN KEY (`id_COMP`) REFERENCES `usuarios` (`idUSR`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historial_ibfk_2` FOREIGN KEY (`id_Archivo`) REFERENCES `archivo` (`idARCH`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
