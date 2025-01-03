-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2020 a las 08:01:14
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaarchivos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `idRegistro` int(11) NOT NULL,
  `proceso` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `archivo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`idRegistro`, `proceso`, `descripcion`, `fecha`, `archivo`, `estado`, `idUsuario`) VALUES
(8, 'Incio del manual', 'Solo contiene una portada', '2020-10-27', '../Archivos/Estructura de la pagina de proyecto.pdf', 1, 1),
(9, 'Tabla de contenido', 'contiene en orden todas las abreviaturas ', '2020-10-27', '../Archivos/Reto hackathon 2020 - SenaSoft.pdf', 1, 6),
(10, 'Introduccion', 'Estoy en el proceso de la introduccion', '2020-10-27', '../Archivos/G13_TECNOLOGIA_LUCY_10.pdf', 0, 6),
(11, 'Diagramas', 'todos los diagramas ya estan realizados', '2020-10-27', '../Archivos/AutorizaciónUsodeImagen.pdf', 1, 1),
(12, 'Normativas y Resticciones', 'estoy trabajando en ello', '2020-10-27', '../Archivos/CertificadoDeFinalizacion_GitHub para programadores.pdf', 0, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(60) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `celular` bigint(20) NOT NULL,
  `usuario` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `correo`, `celular`, `usuario`, `password`) VALUES
(1, 'Juan Silva', 'juancho29silva@gmail.com', 3112119638, 'Juan29silva', '$argon2i$v=19$m=65536,t=4,p=1$RkdWNG5hYUNXaWxWNFNlTg$X7W88Trjl9vOxeb4QAdINPkUWSY/2er/WwHNNBn3XlY'),
(5, 'Jesus Ariel', 'Jesus@areil.com', 3054256031, 'JesusAriel', '$argon2i$v=19$m=65536,t=4,p=1$d25qRnM2akZGUk5tL0o1Vw$2m7xu13SwP9n3kTDybWgkaNEW+6XmvWW0PVU0p4ePHo'),
(6, 'Maria Liseth', 'maria@liseth.com', 3214312022, 'Maria29', '$argon2i$v=19$m=65536,t=4,p=1$cTZKa01CNVlVSXpRYnlNdg$AsxnvcQeNWdcNWxZfSDryxjm2bKT9mD6iaRIdY0qk8o');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`idRegistro`),
  ADD UNIQUE KEY `archivo` (`archivo`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `idRegistro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registros`
--
ALTER TABLE `registros`
  ADD CONSTRAINT `registros_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
