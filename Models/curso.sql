-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-05-2023 a las 01:41:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `curso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `identificacion` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`identificacion`, `nombres`, `apellidos`, `pais`, `telefono`, `email`, `clave`) VALUES
(12345, 'Prueba', 'Prueba', 'Mexico', '01234456789', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_has_curso`
--

CREATE TABLE `cliente_has_curso` (
  `Usuario_id_usuario` int(11) NOT NULL,
  `Curso_id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `nombre_curso` varchar(45) NOT NULL,
  `tipo_curso` varchar(45) NOT NULL,
  `precio` varchar(45) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `administrador_id_administrador` int(11) NOT NULL,
  `foto` longblob NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `id_metodo` int(11) NOT NULL,
  `metodo_pago` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `id_pago` int(11) NOT NULL,
  `cantidad_pago` varchar(50) NOT NULL,
  `Metodo_pago_id_metodp` int(11) NOT NULL,
  `Usuario_id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `identificacion` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`identificacion`, `nombres`, `apellidos`, `pais`, `telefono`, `email`, `clave`) VALUES
(71142005, 'Elkin', 'Blandon', 'Colombia', '3505277807', 'elkinbla@hotmail.com', '1452');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_has_curso`
--

CREATE TABLE `profesor_has_curso` (
  `Profesor_id_profesor` int(11) NOT NULL,
  `Curso_id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `identificacion` int(11) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`identificacion`, `nombres`, `apellidos`, `pais`, `telefono`, `email`, `clave`, `estado`) VALUES
(123456789, 'Usuario', 'Prueba', 'Mexico', '01234456789', 'usuario@gmail.com', '12345', 'Evaluando');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `cliente_has_curso`
--
ALTER TABLE `cliente_has_curso`
  ADD PRIMARY KEY (`Usuario_id_usuario`,`Curso_id_curso`),
  ADD KEY `fk_Cliente_has_Curso_Curso1_idx` (`Curso_id_curso`),
  ADD KEY `fk_Cliente_has_Curso_Cliente1_idx` (`Usuario_id_usuario`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `fk_curso_administrador1_idx` (`administrador_id_administrador`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`id_metodo`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id_pago`,`Metodo_pago_id_metodp`,`Usuario_id_usuario`),
  ADD KEY `fk_Pago_Metodo_pago_idx` (`Metodo_pago_id_metodp`),
  ADD KEY `fk_Pago_Cliente1_idx` (`Usuario_id_usuario`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `profesor_has_curso`
--
ALTER TABLE `profesor_has_curso`
  ADD PRIMARY KEY (`Profesor_id_profesor`,`Curso_id_curso`),
  ADD KEY `fk_Profesor_has_Curso_Curso1_idx` (`Curso_id_curso`),
  ADD KEY `fk_Profesor_has_Curso_Profesor1_idx` (`Profesor_id_profesor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`identificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `id_metodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente_has_curso`
--
ALTER TABLE `cliente_has_curso`
  ADD CONSTRAINT `fk_Cliente_has_Curso_Cliente1` FOREIGN KEY (`Usuario_id_usuario`) REFERENCES `usuario` (`identificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cliente_has_Curso_Curso1` FOREIGN KEY (`Curso_id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_administrador1` FOREIGN KEY (`administrador_id_administrador`) REFERENCES `administrador` (`identificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_Pago_Cliente1` FOREIGN KEY (`Usuario_id_usuario`) REFERENCES `usuario` (`identificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pago_Metodo_pago` FOREIGN KEY (`Metodo_pago_id_metodp`) REFERENCES `metodo_pago` (`id_metodo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `profesor_has_curso`
--
ALTER TABLE `profesor_has_curso`
  ADD CONSTRAINT `fk_Profesor_has_Curso_Curso1` FOREIGN KEY (`Curso_id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Profesor_has_Curso_Profesor1` FOREIGN KEY (`Profesor_id_profesor`) REFERENCES `profesor` (`identificacion`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
