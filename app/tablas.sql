-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-02-2013 a las 15:08:21
-- Versión del servidor: 5.1.66-0+squeeze1
-- Versión de PHP: 5.3.3-7+squeeze14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `pintureria`
--
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE IF NOT EXISTS `especialidad` (
  `id_especialidad` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id_especialidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;


--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id_especialidad`, `nombre`, `created`, `modified`) VALUES
(1, 'Pintura sobre maderas', '2012-12-26 00:00:00', '2012-12-27 00:00:00'),
(2, 'Pintura de Piletas', '2012-12-27 18:47:10', '2012-12-27 18:47:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id_grupo`, `nombre`) VALUES
(1, 'SuperAdministradores'),
(2, 'Administradoresa'),
(3, 'Publicadores'),
(4, 'Pintores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `url` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  `logo` tinytext COLLATE utf8_spanish_ci,
  `simulador` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre`, `url`, `created`, `modified`, `publicado`, `logo`, `simulador`) VALUES
(1, 'COLORIN', 'http://www.colorin.com/home/', '2012-12-26 20:13:05', '2013-01-10 13:40:00', 1, '/img/logos/descargas.png', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE IF NOT EXISTS `materiales` (
  `id_material` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `introduccion` text COLLATE utf8_spanish_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id_material`, `nombre`, `introduccion`, `created`, `modified`, `publicado`) VALUES
(1, 'Madera', 'Madera', '2013-01-04 16:01:11', '2013-01-04 16:01:11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `organismos`
--

CREATE TABLE IF NOT EXISTS `organismos` (
  `id_organismo` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `horarios` text COLLATE utf8_spanish_ci NOT NULL,
  `telefonos` text COLLATE utf8_spanish_ci NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_organismo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `organismos`
--

INSERT INTO `organismos` (`id_organismo`, `nombre`, `direccion`, `email`, `horarios`, `telefonos`, `logo`) VALUES
(1, 'Organismo1', 'Direccion1', 'email@organismo1.com', '12 a 20', '0394820', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contra` text COLLATE utf8_spanish_ci NOT NULL,
  `grupo_id` int(11) NOT NULL,
  `facebook_id` int(20) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  FOREIGN KEY (`grupo_id`) REFERENCES `grupos`(`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `nombre`, `apellido`, `telefono`, `celular`, `contra`, `grupo_id`, `facebook_id`) VALUES
(1, 'tranfuga25s@gmail.com', 'Esteban Javier', 'Zeller', '0342154293430', '0342154293436', '3d574694a29881b7f86bfce3821c3fa9d3e11b25', 1, 0),
(3, 'pintor@pintor.com', 'Pintor', 'Pintoresco', '0394093428', '9348230498342', 'c5e8fdec1040e95bc7b3e3ad22deba881ad195f7', 4, 0);

-- ------------------------------------------------------
--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_categoria`),
  FOREIGN KEY (`parent_id`) REFERENCES `categorias`(`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `parent_id`, `lft`, `rght`, `publicado`, `created`, `modified`, `descripcion`) VALUES
(1, 'Padre', NULL, 1, 6, 1, '2013-01-30 00:00:00', '2013-01-29 20:55:50', 'Categoría para ingresar las demás categorías'),
(3, 'Latex', 1, 2, 3, 1, '2013-01-29 20:38:05', '2013-01-30 17:46:16', 'Todos los tipos de latex'),
(4, 'Acrilico', 1, 4, 5, 1, '2013-01-29 20:55:38', '2013-01-29 20:55:38', 'Todas las pinturas acrilicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `convenio`
--

CREATE TABLE IF NOT EXISTS `convenio` (
  `id_convenio` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL,
  `documentacion` text COLLATE utf8_spanish_ci NOT NULL,
  `forma_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `descuento` double NOT NULL,
  `organismo_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id_convenio`),
  FOREIGN KEY (`organismo_id`) REFERENCES `organismos`(`id_organismo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `convenio`
--

INSERT INTO `convenio` (`id_convenio`, `fecha_inicio`, `fecha_fin`, `documentacion`, `forma_pago`, `descuento`, `organismo_id`) VALUES
(1, '2013-01-03 00:00:00', '2013-10-03 00:00:00', 'Ddlñasdkñlsadklsadklñsdaklñasdklñ', 'asdsakñladslñasdñlk', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pintor`
--

CREATE TABLE IF NOT EXISTS `pintor` (
  `id_pintor` bigint(20) NOT NULL AUTO_INCREMENT,
  `usuario_id` bigint(20) NOT NULL,
  `orden` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `horario` tinytext COLLATE utf8_spanish_ci,
  `habilitado` tinyint(1) NOT NULL,
  `puntos` int(11) NOT NULL,
  `referencias` text COLLATE utf8_spanish_ci,
  `tipo_doc` tinytext CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `num_doc` tinytext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_pintor`),
  FOREIGN KEY (`usuario_id`) REFERENCES `usuarios`(`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pintor`
--

INSERT INTO `pintor` (`id_pintor`, `usuario_id`, `orden`, `created`, `modified`, `horario`, `habilitado`, `puntos`, `referencias`, `tipo_doc`, `num_doc`) VALUES
(1, 3, 0, '2012-12-28 19:45:04', '2013-02-03 13:03:27', '12 a 14 hs', 1, 6, '', 'dni', '30998304');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obra`
--

CREATE TABLE IF NOT EXISTS `obra` (
  `id_obra` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `pintor_id` bigint(20) NOT NULL,
  PRIMARY KEY (`id_obra`),
  FOREIGN KEY (`pintor_id`) REFERENCES `pintor`(`id_pintor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `obra`
--

INSERT INTO `obra` (`id_obra`, `fecha`, `descripcion`, `created`, `modified`, `pintor_id`) VALUES
(2, '2013-01-01', 'testetst', '2013-01-04 01:11:26', '2013-01-04 01:11:26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_obra`
--

CREATE TABLE IF NOT EXISTS `fotos_obra` (
  `id_foto_obra` bigint(20) NOT NULL AUTO_INCREMENT,
  `obra_id` bigint(20) NOT NULL,
  `titulo` tinytext COLLATE utf8_spanish_ci,
  `descripcion` tinytext COLLATE utf8_spanish_ci,
  `path` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id_foto_obra`),
  FOREIGN KEY (`obra_id`) REFERENCES `obra`(`id_obra`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `fotos_obra`
--

INSERT INTO `fotos_obra` (`id_foto_obra`, `obra_id`, `titulo`, `descripcion`, `path`, `created`, `modified`) VALUES
(2, 2, 'Titulo', 'Descripcion', 'obras/2/portada.jpg', '2013-01-31 18:15:37', '2013-01-31 18:15:37');




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pintor_especialidad`
--

CREATE TABLE IF NOT EXISTS `pintor_especialidad` (
  `pintor_id` bigint(20) NOT NULL,
  `especialidad_id` bigint(20) NOT NULL,
  PRIMARY KEY (`pintor_id`,`especialidad_id`),
  FOREIGN KEY (`pintor_id`) REFERENCES `pintor`(`id_pintor`),
  FOREIGN KEY (`especialidad_id`) REFERENCES `especialidad`(`id_especialidad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pintor_especialidad`
--

INSERT INTO `pintor_especialidad` (`pintor_id`, `especialidad_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `marca_id` bigint(20) NOT NULL,
  `categoria_id` bigint(11) NOT NULL,
  `presentacion` text COLLATE utf8_spanish_ci NOT NULL,
  `rendimiento` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `colores` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_producto`),
  FOREIGN KEY (`marca_id`) REFERENCES `marcas`(`id_marca`),
  FOREIGN KEY (`categoria_id`) REFERENCES `categorias`(`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `marca_id`, `categoria_id`, `presentacion`, `rendimiento`, `colores`, `created`, `modified`, `publicado`) VALUES
(1, 'Test1', 1, 4, '1 lts', '10 mts2/lts/mano', 'rojo', '2013-01-30 18:05:08', '2013-01-30 18:22:37', 1);


