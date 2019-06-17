-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2019 a las 15:38:03
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
(6, 6, '2019-06-16 16:59:14', 'El contenido de este programa es para fines distintos a los establecidos', 'Archivo de Prueba', 'LOCAL', 'Pues Nomas es de prueba para ver si funciona'),
(7, 6, '2019-06-16 16:59:41', 'El contenido de este programa es para fines distintos a los establecidos', 'Archivo de Prueba', 'LOCAL', 'Pues Nomas es de prueba para ver si funciona'),
(8, 6, '2019-06-16 17:01:40', 'kajhfkjhasdjkhakjshdkjahs dkjhaksjdh kahs dkah skjdh aksdjkh', 'Archivo de prueba', 'LOCAL', 'uno mas'),
(9, 6, '2019-06-16 17:02:04', 'kajhfkjhasdjkhakjshdkjahs dkjhaksjdh kahs dkah skjdh aksdjkh', 'Archivo de prueba', 'LOCAL', 'uno mas'),
(10, 6, '2019-06-16 17:02:05', 'kajhfkjhasdjkhakjshdkjahs dkjhaksjdh kahs dkah skjdh aksdjkh', 'Archivo de prueba', 'LOCAL', 'uno mas'),
(11, 6, '2019-06-16 17:02:06', 'kajhfkjhasdjkhakjshdkjahs dkjhaksjdh kahs dkah skjdh aksdjkh', 'Archivo de prueba', 'LOCAL', 'uno mas'),
(12, 6, '2019-06-16 17:02:06', 'kajhfkjhasdjkhakjshdkjahs dkjhaksjdh kahs dkah skjdh aksdjkh', 'Archivo de prueba', 'LOCAL', 'uno mas'),
(13, 6, '2019-06-16 17:02:06', 'kajhfkjhasdjkhakjshdkjahs dkjhaksjdh kahs dkah skjdh aksdjkh', 'Archivo de prueba', 'LOCAL', 'uno mas'),
(14, 6, '2019-06-16 17:07:34', 'malditos puntos y comas', 'jdhaksjhdkjhKJHSKDJHA', 'LOCAL', 'KJHASKDHAKJSDHKJAHSKDJH');

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
(1, 6, 'SKJDHFKGJHSUFUVBISNKHV SJFHK NSCIVUSHRKJNZFVKN ASIHF KJH', 'ACEPTADO', '2019-06-16 00:00:00', 14),
(2, 6, 'malditos puntos y comas', 'ACEPTADO', '2019-06-16 17:21:37', 14);

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
(1, 'Antonio', '12345', 'antonio.islas@gmail.com'),
(2, 'sergio', 'pasodelgigante', 'corre@hotmail.es'),
(3, 'Antonio', '12345', 'antonio.islas@gmail.com'),
(4, 'sergio', 'pasodelgigante', 'corre@hotmail.es'),
(6, 'Antonio Islas', '12345', 'tonito_971@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`idARCH`);

--
-- Indices de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`idCOLAB`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idHIST`);

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
  MODIFY `idARCH` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `idCOLAB` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `idHIST` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUSR` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
