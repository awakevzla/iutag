-- phpMyAdmin SQL Dump
-- version 4.2.12deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 31-03-2016 a las 10:07:57
-- Versión del servidor: 5.5.44-0+deb8u1-log
-- Versión de PHP: 5.6.7-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `iutag`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion`
--

CREATE TABLE IF NOT EXISTS `asignacion` (
  `cod_asignacion` int(11) NOT NULL,
  `hora_entrada` time NOT NULL,
  `horas` int(11) NOT NULL,
  `hora_salida` time NOT NULL,
  `cod_carga` int(11) NOT NULL,
  `cod_aula` int(11) DEFAULT NULL,
  `dia_semana` enum('lunes','martes','miercoles','jueves','viernes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignacion`
--

INSERT INTO `asignacion` (`cod_asignacion`, `hora_entrada`, `horas`, `hora_salida`, `cod_carga`, `cod_aula`, `dia_semana`) VALUES
(1, '07:00:00', 2, '08:30:00', 1, 1, 'lunes'),
(2, '08:35:00', 2, '10:05:00', 1, 2, 'miercoles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria_sesion`
--

CREATE TABLE IF NOT EXISTS `auditoria_sesion` (
`id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `evento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ip` varchar(15) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1 COMMENT='Tabla que guarda la auditorÃ­a de sesion';

--
-- Volcado de datos para la tabla `auditoria_sesion`
--

INSERT INTO `auditoria_sesion` (`id`, `id_usuario`, `fecha`, `evento`, `ip`) VALUES
(1, 2, '2016-03-15 20:17:31', 'SALIDA', '::1'),
(2, 2, '2016-03-15 20:22:57', 'INGRESO', '::1'),
(3, 2, '2016-03-15 20:23:32', 'INGRESO', '::1'),
(4, 2, '2016-03-15 20:23:44', 'SALIDA', '::1'),
(5, 2, '2016-03-15 20:23:56', 'INGRESO', '::1'),
(6, 2, '2016-03-15 20:23:57', 'SALIDA', '::1'),
(7, 2, '2016-03-15 20:33:39', 'INGRESO', '::1'),
(8, 2, '2016-03-17 18:44:23', 'INGRESO', '::1'),
(9, 2, '2016-03-17 19:09:19', 'INGRESO', '::1'),
(10, 2, '2016-03-17 21:08:26', 'INGRESO', '::1'),
(11, 2, '2016-03-17 21:09:03', 'SALIDA', '::1'),
(12, 2, '2016-03-17 21:09:12', 'INGRESO', '::1'),
(13, 2, '2016-03-17 21:09:24', 'SALIDA', '::1'),
(14, 2, '2016-03-30 17:10:11', 'INGRESO', '::1'),
(15, 2, '2016-03-30 18:01:39', 'INGRESO', '::1'),
(16, 2, '2016-03-30 18:45:55', 'INGRESO', '::1'),
(17, 2, '2016-03-30 21:06:47', 'INGRESO', '::1'),
(18, 2, '2016-03-30 21:21:22', 'SALIDA', '::1'),
(19, 2, '2016-03-31 12:07:03', 'INGRESO', '::1'),
(20, 2, '2016-03-31 13:08:02', 'INGRESO', '::1'),
(21, 2, '2016-03-31 13:33:48', 'SALIDA', '::1'),
(22, 2, '2016-03-31 13:34:22', 'INGRESO', '::1'),
(23, 2, '2016-03-31 13:54:28', 'INGRESO', '::1'),
(24, 2, '2016-03-31 13:57:49', 'SALIDA', '::1'),
(25, 2, '2016-03-31 14:01:15', 'SALIDA', '::1'),
(26, 2, '2016-03-31 14:10:34', 'INGRESO', '::1'),
(27, 2, '2016-03-31 14:16:04', 'SALIDA', '::1'),
(28, 2, '2016-03-31 14:16:27', 'INGRESO', '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE IF NOT EXISTS `aula` (
  `cod_aula` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `tipo` enum('laboratorio','aula') DEFAULT 'aula'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`cod_aula`, `nombre`, `capacidad`, `tipo`) VALUES
(1, 'A101', 45, 'aula'),
(2, 'A103', 35, 'aula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE IF NOT EXISTS `carga` (
  `cod_carga` int(11) NOT NULL,
  `cod_seccion` int(11) NOT NULL,
  `cod_uc` int(11) NOT NULL,
  `cod_docente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carga`
--

INSERT INTO `carga` (`cod_carga`, `cod_seccion`, `cod_uc`, `cod_docente`) VALUES
(1, 1, 1, 1),
(2, 1, 3, NULL),
(4, 2, 1, NULL),
(5, 2, 3, NULL),
(7, 3, 1, NULL),
(8, 3, 3, NULL),
(10, 4, 1, NULL),
(11, 4, 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `cod_docente` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `categoria` enum('instructor','asistente','agregado','asociado','titular') NOT NULL,
  `condicion` enum('contratado','fijo') NOT NULL,
  `dedicacion` enum('completo','exclusiva','convencional','medio') NOT NULL,
  `observaciones` varchar(500) DEFAULT NULL,
  `cubiculo` varchar(10) DEFAULT NULL,
  `nacionalidad` enum('V','E','P') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`cod_docente`, `nombre`, `apellido`, `cedula`, `categoria`, `condicion`, `dedicacion`, `observaciones`, `cubiculo`, `nacionalidad`) VALUES
(1, 'Yanelly', 'RamÃ­rez', '11804078', 'instructor', 'contratado', 'completo', 'Coordinadora de la Unidad Curricular Proyecto I', NULL, 'V'),
(2, 'Karime', 'Abdul', '9511907', 'agregado', 'fijo', 'completo', 'Coordinadora de las Lineas de InvestigaciÃ³n del PNFA. Coordinadora de la Unidad Curricular Habilidades Directivas I.', NULL, 'V'),
(3, 'Denny', 'Alvarez', '12184827', 'instructor', 'contratado', 'convencional', NULL, NULL, 'V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE IF NOT EXISTS `periodo` (
  `cod_periodo` int(11) NOT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_culminacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`cod_periodo`, `fecha_inicio`, `fecha_culminacion`) VALUES
(1, '2015-07-13', '2016-04-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE IF NOT EXISTS `seccion` (
  `cod_seccion` int(11) NOT NULL,
  `nro` int(11) DEFAULT NULL,
  `cod_trimestre` int(11) NOT NULL,
  `cod_periodo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`cod_seccion`, `nro`, `cod_trimestre`, `cod_periodo`) VALUES
(1, 11, 3, 1),
(2, 12, 3, 1),
(3, 13, 3, 1),
(4, 14, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trayecto`
--

CREATE TABLE IF NOT EXISTS `trayecto` (
  `cod_trayecto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trayecto`
--

INSERT INTO `trayecto` (`cod_trayecto`, `nombre`) VALUES
(1, 'Inicial'),
(2, '1'),
(3, '2'),
(4, '3'),
(5, '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trimestre`
--

CREATE TABLE IF NOT EXISTS `trimestre` (
  `cod_trimestre` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cod_trayecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `trimestre`
--

INSERT INTO `trimestre` (`cod_trimestre`, `nombre`, `cod_trayecto`) VALUES
(1, 'Unico', 1),
(2, 'I', 2),
(3, 'II', 2),
(4, 'III', 2),
(5, 'I', 3),
(6, 'II', 3),
(7, 'III', 3),
(8, 'I', 4),
(9, 'II', 4),
(10, 'III', 4),
(11, 'I', 5),
(12, 'II', 5),
(13, 'III', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uc`
--

CREATE TABLE IF NOT EXISTS `uc` (
  `cod_uc` int(11) NOT NULL,
  `nombre_uc` varchar(100) NOT NULL,
  `nro_semanas` int(11) NOT NULL,
  `cod_trimestre` int(11) NOT NULL,
  `horas_semanales` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `uc`
--

INSERT INTO `uc` (`cod_uc`, `nombre_uc`, `nro_semanas`, `cod_trimestre`, `horas_semanales`) VALUES
(1, 'Fundamentos de Administracion', 24, 3, 4),
(2, 'Fundamentos de Administracion', 24, 4, 4),
(3, 'Estadistica I', 12, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`cod_usuario` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `direccion` varchar(250) DEFAULT NULL,
  `correo` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `tipo` enum('administrador','operador') DEFAULT 'operador',
  `intentos` int(11) NOT NULL,
  `baneado` tinyint(1) NOT NULL,
  `pregunta_id` int(11) NOT NULL DEFAULT '0',
  `respuesta` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nombre`, `apellido`, `cedula`, `direccion`, `correo`, `telefono`, `usuario`, `clave`, `tipo`, `intentos`, `baneado`, `pregunta_id`, `respuesta`) VALUES
(1, 'Yajaira', 'Ramirez', '9924171', 'Calle Josefa Camejo NÂ° 16', 'ybra69@gmail.com', '04126659267', 'yajaira', '123', 'administrador', 0, 0, 1, 'Zolimar'),
(2, 'Pedro', 'Lugo', '20296572', 'Urb. El CardÃ³n', 'robertty55@gmail.com', '04167588004', 'plugo', '*S3l3ct#*', 'administrador', 0, 0, 4, 'Apuree'),
(4, 'Maria', 'Diaz', '11111111', 'qwewqeewq', 'maria@gmail.com', '044411155555', 'maria', '123', 'operador', 0, 0, 1, 'Zolimar'),
(6, 'alex', 'ruiz', '2111441', 'asdasdasdsad', 'dasdasdsdasd@gmail.com', '4444444', 'alexis', '123', 'operador', 0, 0, 1, 'Zolimar'),
(7, 'orlando', 'chirino', '123132132132', 'punto fijo', 'orlando.chino.a@gmail.com', '321321231321', 'chirinoso', '123', 'operador', 0, 0, 1, 'Zolimar'),
(8, 'Eduardo', 'PiÃ±a', '15097985', 'Urb El Cardon Calle 3 # j-30', 'ee.pina03@gmail.com', '04127926552', 'eduardo', '123', 'operador', 0, 0, 1, 'Zolimar'),
(9, 'Monica', 'OrtuÃ±ez', '13901901', 'los orumos', 'monichi2012@gmail.com', '04126492030', 'monica', '123', 'operador', 0, 0, 1, 'Zolimar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion`
--
ALTER TABLE `asignacion`
 ADD PRIMARY KEY (`cod_asignacion`), ADD KEY `cod_carga` (`cod_carga`), ADD KEY `cod_aula` (`cod_aula`);

--
-- Indices de la tabla `auditoria_sesion`
--
ALTER TABLE `auditoria_sesion`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
 ADD PRIMARY KEY (`cod_aula`), ADD UNIQUE KEY `UQ_aula_1` (`nombre`);

--
-- Indices de la tabla `carga`
--
ALTER TABLE `carga`
 ADD PRIMARY KEY (`cod_carga`), ADD KEY `cod_seccion` (`cod_seccion`), ADD KEY `cod_uc` (`cod_uc`), ADD KEY `cod_docente` (`cod_docente`);

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
 ADD PRIMARY KEY (`cod_docente`), ADD UNIQUE KEY `UQ_docente_1` (`nombre`,`apellido`,`cedula`,`nacionalidad`), ADD UNIQUE KEY `UQ_docente_2` (`cedula`,`nacionalidad`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
 ADD PRIMARY KEY (`cod_periodo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `auditoria_sesion`
--
ALTER TABLE `auditoria_sesion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;