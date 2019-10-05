-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2019 a las 02:29:26
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bibliotecario`
--

CREATE TABLE `bibliotecario` (
  `id_bibliotecario` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `Contrasena` varchar(45) NOT NULL,
  `estado_civil_id_estado` int(11) NOT NULL,
  `tipo_documento_id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bibliotecario`
--

INSERT INTO `bibliotecario` (`id_bibliotecario`, `nombre`, `apellido`, `numero_documento`, `Contrasena`, `estado_civil_id_estado`, `tipo_documento_id_tipo`) VALUES
(1, 'Sebastian', 'Ariza', 1006291486, 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(2, 'Daniel', 'Agudelo', 1112776996, 'e10adc3949ba59abbe56e057f20f883e', 5, 1),
(3, 'Cotecnova', 'Cotecnova', 1111111111, 'e10adc3949ba59abbe56e057f20f883e', 9, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_civil`
--

CREATE TABLE `estado_civil` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_civil`
--

INSERT INTO `estado_civil` (`id_estado`, `estado`) VALUES
(1, 'Solter@'),
(2, 'Casad@'),
(3, 'Unión Libre'),
(4, 'Comprometid@'),
(5, 'En Relación '),
(6, 'Separado '),
(7, 'Divorciado'),
(8, 'Viud@'),
(9, 'Noviazgo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(10) NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `tipo_documento_id_tipo` int(11) NOT NULL,
  `estado_civil_id_estado` int(11) NOT NULL,
  `programa_id_programa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `numero_documento`, `nombre`, `apellido`, `contrasena`, `tipo_documento_id_tipo`, `estado_civil_id_estado`, `programa_id_programa`) VALUES
(1, 1006291396, 'Juan', 'Hoyos', 'e10adc3949ba59abbe56e057f20f883e', 1, 1, 1),
(2, 1006292065, 'Samuel', 'Fernandez', 'e10adc3949ba59abbe56e057f20f883e', 2, 1, 1),
(3, 1111111111, 'Cotecnova', 'Cotecnova', 'e10adc3949ba59abbe56e057f20f883e', 1, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo_libro` varchar(45) NOT NULL,
  `editorial` varchar(45) NOT NULL,
  `autor` varchar(45) NOT NULL,
  `fecha_publicacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo_libro`, `editorial`, `autor`, `fecha_publicacion`) VALUES
(1, '100 Años de Soledad', 'Planeta', 'Gabriel Garcia Marquez', '1997-10-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id_prestamo` int(11) NOT NULL,
  `fecha_prestamo` datetime NOT NULL,
  `bibliotecario_id_bibliotecario` int(11) NOT NULL,
  `estudiantes_id_estudiante` int(10) NOT NULL,
  `libros_id_libro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id_prestamo`, `fecha_prestamo`, `bibliotecario_id_bibliotecario`, `estudiantes_id_estudiante`, `libros_id_libro`) VALUES
(1, '0000-00-00 00:00:00', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE `programa` (
  `id_programa` int(11) NOT NULL,
  `programa` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programa`
--

INSERT INTO `programa` (`id_programa`, `programa`) VALUES
(1, 'Ingeniería de Sistemas'),
(2, 'Agropecuaria '),
(3, 'Administración de Empresas'),
(4, 'Contabilidad '),
(5, 'Mercadeo y Ventas'),
(6, 'Gestión Empresarial '),
(7, 'Administración y Negocios Internacionales'),
(8, 'Administración Turística'),
(9, 'Turismo y Hoteleria '),
(10, 'Administración Agro industrial'),
(11, 'Administración de Servicios de Salud'),
(12, 'Regencia en Farmacia '),
(13, 'Diseño y Confección '),
(14, 'Licenciatura en Pedagogía Infantil'),
(15, 'Cursos de Ingles y Trances'),
(16, 'Licenciatura en Ingles '),
(17, 'Licenciatura en Francés ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id_tipo`, `tipo`) VALUES
(1, 'Cédula'),
(2, 'Tarjeta de Identidad');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bibliotecario`
--
ALTER TABLE `bibliotecario`
  ADD PRIMARY KEY (`id_bibliotecario`,`estado_civil_id_estado`,`tipo_documento_id_tipo`),
  ADD KEY `fk_bibliotecario_estado_civil1_idx` (`estado_civil_id_estado`),
  ADD KEY `fk_bibliotecario_tipo_documento1_idx` (`tipo_documento_id_tipo`);

--
-- Indices de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`,`tipo_documento_id_tipo`,`estado_civil_id_estado`,`programa_id_programa`),
  ADD KEY `fk_estudiantes_tipo_documento_idx` (`tipo_documento_id_tipo`),
  ADD KEY `fk_estudiantes_estado_civil1_idx` (`estado_civil_id_estado`),
  ADD KEY `fk_estudiantes_programa1_idx` (`programa_id_programa`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id_prestamo`,`bibliotecario_id_bibliotecario`,`estudiantes_id_estudiante`,`libros_id_libro`),
  ADD KEY `fk_prestamos_bibliotecario1_idx` (`bibliotecario_id_bibliotecario`),
  ADD KEY `fk_prestamos_estudiantes1_idx` (`estudiantes_id_estudiante`),
  ADD KEY `fk_prestamos_libros1_idx` (`libros_id_libro`);

--
-- Indices de la tabla `programa`
--
ALTER TABLE `programa`
  ADD PRIMARY KEY (`id_programa`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bibliotecario`
--
ALTER TABLE `bibliotecario`
  MODIFY `id_bibliotecario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_civil`
--
ALTER TABLE `estado_civil`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `programa`
--
ALTER TABLE `programa`
  MODIFY `id_programa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bibliotecario`
--
ALTER TABLE `bibliotecario`
  ADD CONSTRAINT `fk_bibliotecario_estado_civil1` FOREIGN KEY (`estado_civil_id_estado`) REFERENCES `estado_civil` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bibliotecario_tipo_documento1` FOREIGN KEY (`tipo_documento_id_tipo`) REFERENCES `tipo_documento` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `fk_estudiantes_estado_civil1` FOREIGN KEY (`estado_civil_id_estado`) REFERENCES `estado_civil` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiantes_programa1` FOREIGN KEY (`programa_id_programa`) REFERENCES `programa` (`id_programa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_estudiantes_tipo_documento` FOREIGN KEY (`tipo_documento_id_tipo`) REFERENCES `tipo_documento` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_prestamos_bibliotecario1` FOREIGN KEY (`bibliotecario_id_bibliotecario`) REFERENCES `bibliotecario` (`id_bibliotecario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamos_estudiantes1` FOREIGN KEY (`estudiantes_id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamos_libros1` FOREIGN KEY (`libros_id_libro`) REFERENCES `libros` (`id_libro`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
