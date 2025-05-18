-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2025 a las 08:03:04
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
-- Base de datos: `congresos_ltda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `articulo_ID` int(15) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `fecha_envio` datetime NOT NULL,
  `resumen` varchar(150) NOT NULL,
  `contacto_autor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_autor`
--

CREATE TABLE `articulo_autor` (
  `articulo_ID` int(11) NOT NULL,
  `autor_rut` varchar(15) NOT NULL,
  `esContacto` bit(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_especialidad`
--

CREATE TABLE `articulo_especialidad` (
  `articulo_ID` int(15) NOT NULL,
  `especialidad_ID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `especialidad_ID` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_articulo`
--

CREATE TABLE `revision_articulo` (
  `articulo_ID` int(30) NOT NULL,
  `rut_revisor` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisor_especialidad`
--

CREATE TABLE `revisor_especialidad` (
  `rut_revisor` varchar(15) NOT NULL,
  `especialidad_ID` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Rut_usuario` varchar(15) NOT NULL,
  `Nombre_usuario` varchar(100) NOT NULL,
  `Email_usuario` varchar(100) NOT NULL,
  `Rol_usuario` enum('Autor','Revisor','Jefe') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`articulo_ID`);

--
-- Indices de la tabla `articulo_autor`
--
ALTER TABLE `articulo_autor`
  ADD PRIMARY KEY (`articulo_ID`,`autor_rut`),
  ADD KEY `articulo_ID` (`articulo_ID`),
  ADD KEY `autor_rut` (`autor_rut`);

--
-- Indices de la tabla `articulo_especialidad`
--
ALTER TABLE `articulo_especialidad`
  ADD PRIMARY KEY (`articulo_ID`,`especialidad_ID`),
  ADD KEY `articulo_ID` (`articulo_ID`,`especialidad_ID`),
  ADD KEY `especialidad_ID` (`especialidad_ID`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`especialidad_ID`);

--
-- Indices de la tabla `revision_articulo`
--
ALTER TABLE `revision_articulo`
  ADD PRIMARY KEY (`articulo_ID`,`rut_revisor`),
  ADD KEY `rut_revisor` (`rut_revisor`),
  ADD KEY `articulo_ID` (`articulo_ID`);

--
-- Indices de la tabla `revisor_especialidad`
--
ALTER TABLE `revisor_especialidad`
  ADD PRIMARY KEY (`rut_revisor`,`especialidad_ID`),
  ADD KEY `rut_revisor` (`rut_revisor`),
  ADD KEY `especialidad_ID` (`especialidad_ID`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Rut_usuario`),
  ADD UNIQUE KEY `Email_usuario` (`Email_usuario`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo_autor`
--
ALTER TABLE `articulo_autor`
  ADD CONSTRAINT `articulo_autor_ibfk_1` FOREIGN KEY (`autor_rut`) REFERENCES `usuario` (`Rut_usuario`),
  ADD CONSTRAINT `articulo_autor_ibfk_2` FOREIGN KEY (`articulo_ID`) REFERENCES `articulo` (`articulo_ID`);

--
-- Filtros para la tabla `articulo_especialidad`
--
ALTER TABLE `articulo_especialidad`
  ADD CONSTRAINT `articulo_especialidad_ibfk_1` FOREIGN KEY (`articulo_ID`) REFERENCES `articulo` (`articulo_ID`),
  ADD CONSTRAINT `articulo_especialidad_ibfk_2` FOREIGN KEY (`especialidad_ID`) REFERENCES `especialidad` (`especialidad_ID`);

--
-- Filtros para la tabla `revision_articulo`
--
ALTER TABLE `revision_articulo`
  ADD CONSTRAINT `revision_articulo_ibfk_1` FOREIGN KEY (`articulo_ID`) REFERENCES `articulo` (`articulo_ID`),
  ADD CONSTRAINT `revision_articulo_ibfk_2` FOREIGN KEY (`rut_revisor`) REFERENCES `usuario` (`Rut_usuario`);

--
-- Filtros para la tabla `revisor_especialidad`
--
ALTER TABLE `revisor_especialidad`
  ADD CONSTRAINT `revisor_especialidad_ibfk_1` FOREIGN KEY (`rut_revisor`) REFERENCES `usuario` (`Rut_usuario`),
  ADD CONSTRAINT `revisor_especialidad_ibfk_2` FOREIGN KEY (`especialidad_ID`) REFERENCES `especialidad` (`especialidad_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- Agregar la columna "Contrasena_usuario" a la tabla "usuario"
ALTER TABLE `usuario`
ADD COLUMN `Contrasena_usuario` VARCHAR(255) NOT NULL;
ALTER TABLE articulo
MODIFY COLUMN contacto_autor VARCHAR(100) NOT NULL;