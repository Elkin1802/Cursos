-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2023 a las 02:30:18
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarAdministrador` (IN `identificacion` INT, IN `nombres` VARCHAR(50), IN `apellidos` VARCHAR(50), IN `pais` VARCHAR(50), IN `telefono` VARCHAR(50), IN `email` VARCHAR(50), IN `clave` VARCHAR(50))   BEGIN

DECLARE c1,c2,c3,c4,c5,c6,c7 varchar(50);

SET c1 = identificacion;
SET c2 = nombres;
set c3 = apellidos;
set c4 = pais;
set c5 = telefono;
set c6 = email;
set c7 = clave;

INSERT INTO administrador VALUES (c1,c2,c3,c4,c5,c6,c7);

SELECT * FROM administrador;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarCursos` (IN `id_curso` INT, IN `nombre_curso` VARCHAR(50), IN `tipo_curso` VARCHAR(50), IN `precio` VARCHAR(50), IN `fecha_inicio` VARCHAR(50), IN `fecha_fin` VARCHAR(50), IN `administrador_id_administrador` INT)   BEGIN

DECLARE c1,c2,c3,c4,c5,c6,c7 varchar(50);

SET c1 = identificacion; 
SET c2 = nombre_curso;
SET c3 = tipo_curso;
SET c4 = precio;
SET c5 = fecha_inicio;
SET c6 = fecha_fin;
SET c7 = administrador_id_administrador;

INSERT INTO administrador VALUES (c1,c2,c3,c4,c5,c6,c7);

SELECT * FROM administrador;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarMetodo` (IN `id_metodo` INT, IN `metodo_pago` INT)   BEGIN

DECLARE c1,c2 varchar(50);

SET c1 = id_curso;
SET c2 = metodo_pago;

INSERT INTO metodo_pago VALUES (c1,c2);

SELECT * FROM metodo_pago;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarPago` (IN `id_pago` INT, IN `cantidad_pago` VARCHAR(50), IN `Metodo_pago_id_metodp` INT, IN `Usuario_id_usuario` INT)   BEGIN

DECLARE c1,c2,c3,c4 varchar(50);

SET c1 = id_Pago;
SET c2 = cantidad_pago;
SET c3 = Metodo_pago_id_metodp;
SET c4 = Usuario_id_usuario;

INSERT INTO pago VALUES (c1,c2,c3,c4);

SELECT * FROM pago;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertarProfesor` (IN `identificacion` INT, IN `nombres` VARCHAR(50), IN `apellidos` VARCHAR(50), IN `pais` VARCHAR(50), IN `telefono` VARCHAR(50), IN `email` VARCHAR(50), IN `clave` VARCHAR(50))   BEGIN

DECLARE c1,c2,c3,c4,c5,c6,c7 varchar(50);

SET c1 = identificacion;
SET c2 = nombres;
SET c3 = apellidos;
SET c4 = pais;
SET c5 = telefono;
SET c6 = email;
SET c7 = clave;

INSERT INTO profesor VALUES (c1,c2,c3,c4,c5,c6,c7);

SELECT * FROM profesor;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario` (IN `identificacion` INT, IN `nombres` VARCHAR(50), IN `apellidos` VARCHAR(50), IN `pais` VARCHAR(50), IN `telefono` VARCHAR(50), IN `email` VARCHAR(50), IN `clave` VARCHAR(50))   BEGIN

DECLARE c1,c2,c3,c4,c5,c6,c7 varchar(50);

SET c1 = identificacion;
SET c2 = nombres;
SET c3 = apellidos;
set c4 = pais;
SET c5 = telefono;
SET c6 = email;
SET c7 = clave;

INSERT INTO usuario VALUES (c1,c2,c3,c4,c5,c6,c7);
SELECT * FROM usuario;

END$$

DELIMITER ;

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
(67021921, 'Sandra Marcela', 'Chaparro Palomino', 'Colombia', '3158764252', 'admin@gmail.com', '1234');

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
  `administrador_id_administrador` int(11) NOT NULL
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
(52429849, 'Ninsa', 'Oyola Moreno', 'Colombia', '3205784578', 'profesor@gmail.com', '1234');

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
  `clave` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
