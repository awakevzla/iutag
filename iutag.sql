-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generaciÃ³n: 15-03-2016 a las 04:27:02
-- VersiÃ³n del servidor: 5.5.39
-- VersiÃ³n de PHP: 5.4.31

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabla que guarda la auditorÃ­a de sesion' AUTO_INCREMENT=95 ;

--
-- Volcado de datos para la tabla `auditoria_sesion`
--

INSERT INTO `auditoria_sesion` (`id`, `id_usuario`, `fecha`, `evento`, `ip`) VALUES
(1, 0, '2015-09-08 14:34:13', '', NULL),
(2, 2, '2015-09-08 14:50:36', 'entrada', '1'),
(3, 2, '2015-09-08 14:55:30', 'entrada', '1'),
(4, 2, '2015-09-08 15:09:40', 'entrada', '1'),
(5, 2, '2015-09-08 16:25:59', 'entrada', '1'),
(6, 3, '2015-09-08 16:26:20', 'entrada', '1'),
(7, 2, '2015-09-09 15:18:50', 'entrada', '1'),
(8, 2, '2015-09-09 15:30:11', 'entrada', '1'),
(9, 2, '2015-09-09 15:39:06', 'entrada', '1'),
(10, 2, '2015-09-09 20:58:51', 'entrada', '1'),
(11, 2, '2015-10-27 12:32:36', 'entrada', '1'),
(12, 2, '2015-10-27 13:50:00', 'entrada', '1'),
(13, 3, '2015-10-27 13:50:47', 'entrada', '1'),
(14, 2, '2015-10-27 13:56:59', 'entrada', '1'),
(15, 2, '2015-10-27 14:35:16', 'entrada', '1'),
(16, 2, '2015-10-27 15:34:41', 'entrada', '1'),
(17, 2, '2015-11-03 21:03:50', 'entrada', '1'),
(18, 2, '2015-11-03 21:04:13', 'entrada', '1'),
(19, 2, '2015-11-08 22:19:51', 'INGRESO', '::1'),
(20, 2, '2015-11-08 22:20:21', 'SALIDA', '::1'),
(21, 2, '2015-11-08 22:37:56', 'INGRESO', '::1'),
(22, 2, '2015-11-08 22:42:20', 'SALIDA', '::1'),
(23, 2, '2015-11-08 22:57:41', 'INGRESO', '::1'),
(24, 2, '2015-11-08 22:58:04', 'SALIDA', '::1'),
(25, 2, '2015-11-08 23:00:21', 'INGRESO', '::1'),
(26, 2, '2015-11-09 21:23:31', 'INGRESO', 'unknown'),
(27, 2, '2015-11-09 21:23:45', 'SALIDA', 'unknown'),
(28, 2, '2015-11-09 21:25:08', 'INGRESO', 'unknown'),
(29, 2, '2015-11-09 21:25:16', 'SALIDA', 'unknown'),
(30, 2, '2015-11-10 12:57:29', 'INGRESO', 'unknown'),
(31, 2, '2015-11-10 13:07:39', 'SALIDA', 'unknown'),
(32, 2, '2015-11-10 13:08:42', 'INGRESO', 'unknown'),
(33, 2, '2015-11-10 13:21:06', 'SALIDA', 'unknown'),
(34, 2, '2015-11-10 23:53:09', 'INGRESO', '190.207.233.200'),
(35, 2, '2015-11-10 23:55:35', 'SALIDA', '190.207.233.200'),
(36, 5, '2015-11-10 23:56:31', 'INGRESO', '190.207.233.200'),
(37, 2, '2015-11-10 23:59:45', 'INGRESO', '186.88.68.62'),
(38, 2, '2015-11-11 00:02:09', 'SALIDA', '186.88.68.62'),
(39, 2, '2015-11-11 00:04:10', 'INGRESO', '186.88.68.62'),
(40, 1, '2016-02-27 21:11:46', 'INGRESO', '::1'),
(41, 1, '2016-02-27 21:15:33', 'SALIDA', '::1'),
(42, 1, '2016-02-27 21:17:47', 'INGRESO', '::1'),
(43, 1, '2016-02-27 21:22:20', 'SALIDA', '::1'),
(44, 1, '2016-02-27 21:26:00', 'INGRESO', '::1'),
(45, 1, '2016-02-27 21:38:34', 'SALIDA', '::1'),
(46, 2, '2016-03-02 22:55:10', 'INGRESO', '201.209.200.175'),
(47, 2, '2016-03-02 22:55:39', 'SALIDA', '201.209.200.175'),
(48, 2, '2016-03-02 22:56:48', 'INGRESO', '190.78.148.213'),
(49, 2, '2016-03-02 22:57:00', 'SALIDA', '190.78.148.213'),
(50, 2, '2016-03-02 23:24:03', 'INGRESO', '::1'),
(51, 2, '2016-03-02 23:24:04', 'SALIDA', '::1'),
(52, 2, '2016-03-02 23:24:47', 'INGRESO', '190.78.148.213'),
(53, 2, '2016-03-02 23:25:08', 'SALIDA', '190.78.148.213'),
(54, 1, '2016-03-02 23:30:02', 'INGRESO', '186.167.243.232'),
(55, 1, '2016-03-02 23:30:52', 'SALIDA', '186.167.243.232'),
(56, 1, '2016-03-03 01:13:30', 'INGRESO', '186.93.10.250'),
(57, 1, '2016-03-03 01:15:09', 'SALIDA', '186.93.10.250'),
(58, 1, '2016-03-03 01:17:05', 'INGRESO', '186.93.10.250'),
(59, 1, '2016-03-03 01:17:50', 'SALIDA', '186.93.10.250'),
(60, 6, '2016-03-03 01:18:03', 'INGRESO', '186.93.10.250'),
(61, 2, '2016-03-03 14:21:06', 'INGRESO', '200.11.240.77'),
(62, 2, '2016-03-03 14:21:24', 'INGRESO', '200.11.240.77'),
(63, 2, '2016-03-03 14:23:28', 'SALIDA', '200.11.240.77'),
(64, 1, '2016-03-04 15:38:41', 'INGRESO', '186.93.12.237'),
(65, 1, '2016-03-04 15:41:53', 'INGRESO', '186.91.33.5'),
(66, 2, '2016-03-04 18:54:30', 'INGRESO', '200.11.240.77'),
(67, 2, '2016-03-04 18:55:43', 'SALIDA', '200.11.240.77'),
(68, 1, '2016-03-09 22:47:29', 'INGRESO', '186.93.186.236'),
(69, 1, '2016-03-09 22:49:19', 'SALIDA', '186.93.186.236'),
(70, 1, '2016-03-09 22:55:58', 'INGRESO', '186.93.186.236'),
(71, 1, '2016-03-09 22:57:49', 'SALIDA', '186.93.186.236'),
(72, 8, '2016-03-09 22:58:53', 'INGRESO', '186.93.186.236'),
(73, 8, '2016-03-09 22:59:08', 'SALIDA', '186.93.186.236'),
(74, 1, '2016-03-09 22:59:33', 'INGRESO', '186.93.186.236'),
(75, 1, '2016-03-09 23:01:04', 'SALIDA', '186.93.186.236'),
(76, 8, '2016-03-09 23:02:13', 'INGRESO', '186.93.186.236'),
(77, 8, '2016-03-09 23:05:14', 'SALIDA', '186.93.186.236'),
(78, 1, '2016-03-09 23:06:09', 'INGRESO', '186.93.186.236'),
(79, 1, '2016-03-09 23:20:24', 'INGRESO', '186.93.186.236'),
(80, 1, '2016-03-09 23:30:54', 'SALIDA', '186.93.186.236'),
(81, 8, '2016-03-09 23:31:15', 'INGRESO', '186.93.186.236'),
(82, 8, '2016-03-09 23:59:43', 'SALIDA', '186.93.186.236'),
(83, 1, '2016-03-10 00:02:03', 'INGRESO', '186.93.186.236'),
(84, 1, '2016-03-10 00:02:07', 'SALIDA', '186.93.186.236'),
(85, 1, '2016-03-10 00:03:31', 'INGRESO', '186.93.186.236'),
(86, 1, '2016-03-10 00:03:38', 'SALIDA', '186.93.186.236'),
(87, 1, '2016-03-10 00:04:41', 'INGRESO', '186.93.186.236'),
(88, 1, '2016-03-10 00:10:12', 'SALIDA', '186.93.186.236'),
(89, 2, '2016-03-15 00:45:51', 'INGRESO', '127.0.0.1'),
(90, 2, '2016-03-15 00:48:11', 'SALIDA', '127.0.0.1'),
(91, 2, '2016-03-15 00:49:46', 'INGRESO', '127.0.0.1'),
(92, 2, '2016-03-15 02:21:55', 'SALIDA', '127.0.0.1'),
(93, 2, '2016-03-15 03:12:41', 'INGRESO', '127.0.0.1'),
(94, 2, '2016-03-15 03:23:01', 'SALIDA', '127.0.0.1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE IF NOT EXISTS `aula` (
`cod_aula` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `tipo` enum('laboratorio','aula') DEFAULT 'aula'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_usuario`, `nombre`, `apellido`, `cedula`, `direccion`, `correo`, `telefono`, `usuario`, `clave`, `tipo`, `intentos`, `baneado`, `pregunta_id`, `respuesta`) VALUES
(1, 'Yajaira', 'Ramirez', '9924171', 'Calle Josefa Camejo NÂ° 16', 'ybra69@gmail.com', '04126659267', 'yajaira', '9924171', 'administrador', 0, 0, 0, ''),
(2, 'Pedro', 'Lugo', '20296572', 'Urb. El CardÃ³n', 'robertty55@gmail.com', '04167588004', 'plugo', '123123', 'administrador', 0, 0, 4, 'Apure'),
(3, 'operador', 'operador', '123123', '22321321', 'qweqwe@sdqwe.com', '04165554447', 'operador', '123123', 'operador', 0, 0, 0, ''),
(4, 'Maria', 'Diaz', '11111111', 'qwewqeewq', 'maria@gmail.com', '044411155555', 'maria', '123123', 'operador', 0, 0, 0, ''),
(5, 'Alexis', 'Ruiz', '25444657', 'urbn chavez candanga con maduro chupalo', 'chavezcandanga@gmail.com', '0412456897', 'katanarz', '5281146', 'operador', 4, 1, 0, ''),
(6, 'alex', 'ruiz', '2111441', 'asdasdasdsad', 'dasdasdsdasd@gmail.com', '4444444', 'alexis', 'ruiz', 'operador', 0, 0, 0, ''),
(7, 'orlando', 'chirino', '123132132132', 'punto fijo', 'orlando.chino.a@gmail.com', '321321231321', 'chirinoso', '123456', 'operador', 0, 0, 0, ''),
(8, 'Eduardo', 'PiÃ±a', '15097985', 'Urb El Cardon Calle 3 # j-30', 'ee.pina03@gmail.com', '04127926552', 'eduardo', '123456', 'operador', 4, 1, 0, ''),
(9, 'Monica', 'OrtuÃ±ez', '13901901', 'los orumos', 'monichi2012@gmail.com', '04126492030', 'monica', '1234', 'operador', 0, 0, 0, ''),
(10, 'Magdeivis', 'Riera', '20388812', 'Barrio Bolivar Acarigua - Portuguesa', 'magdeivis16@gmail.com', '04263898975', 'magdeivis', '123123', 'operador', 0, 0, 1, 'merys');

--
-- Ãndices para tablas volcadas
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
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
 ADD PRIMARY KEY (`cod_seccion`), ADD KEY `cod_trimestre` (`cod_trimestre`), ADD KEY `cod_periodo` (`cod_periodo`);

--
-- Indices de la tabla `trayecto`
--
ALTER TABLE `trayecto`
 ADD PRIMARY KEY (`cod_trayecto`);

--
-- Indices de la tabla `trimestre`
--
ALTER TABLE `trimestre`
 ADD PRIMARY KEY (`cod_trimestre`), ADD KEY `cod_trayecto` (`cod_trayecto`);

--
-- Indices de la tabla `uc`
--
ALTER TABLE `uc`
 ADD PRIMARY KEY (`cod_uc`), ADD KEY `cod_trimestre` (`cod_trimestre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`cod_usuario`), ADD UNIQUE KEY `UQ_usuario_1` (`nombre`,`apellido`,`cedula`), ADD UNIQUE KEY `UQ_usuario_2` (`usuario`), ADD UNIQUE KEY `UQ_usuario_3` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignacion`
--
ALTER TABLE `asignacion`
MODIFY `cod_asignacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `auditoria_sesion`
--
ALTER TABLE `auditoria_sesion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
MODIFY `cod_aula` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `carga`
--
ALTER TABLE `carga`
MODIFY `cod_carga` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
MODIFY `cod_docente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
MODIFY `cod_periodo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
MODIFY `cod_seccion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `trayecto`
--
ALTER TABLE `trayecto`
MODIFY `cod_trayecto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `trimestre`
--
ALTER TABLE `trimestre`
MODIFY `cod_trimestre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `uc`
--
ALTER TABLE `uc`
MODIFY `cod_uc` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignacion`
--
ALTER TABLE `asignacion`
ADD CONSTRAINT `FK_asignacion_1` FOREIGN KEY (`cod_carga`) REFERENCES `carga` (`cod_carga`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_asignacion_2` FOREIGN KEY (`cod_aula`) REFERENCES `aula` (`cod_aula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `carga`
--
ALTER TABLE `carga`
ADD CONSTRAINT `FK_carga_1` FOREIGN KEY (`cod_seccion`) REFERENCES `seccion` (`cod_seccion`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_carga_2` FOREIGN KEY (`cod_uc`) REFERENCES `uc` (`cod_uc`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `FK_carga_3` FOREIGN KEY (`cod_docente`) REFERENCES `docente` (`cod_docente`) ON DELETE SET NULL;

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
ADD CONSTRAINT `FK_seccion_1` FOREIGN KEY (`cod_trimestre`) REFERENCES `trimestre` (`cod_trimestre`),
ADD CONSTRAINT `FK_seccion_2` FOREIGN KEY (`cod_periodo`) REFERENCES `periodo` (`cod_periodo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trimestre`
--
ALTER TABLE `trimestre`
ADD CONSTRAINT `FK_cod_trimestre_1` FOREIGN KEY (`cod_trayecto`) REFERENCES `trayecto` (`cod_trayecto`);

--
-- Filtros para la tabla `uc`
--
ALTER TABLE `uc`
ADD CONSTRAINT `FK_uc_1` FOREIGN KEY (`cod_trimestre`) REFERENCES `trimestre` (`cod_trimestre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;