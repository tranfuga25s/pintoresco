-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audits`
--

CREATE TABLE IF NOT EXISTS `audits` (
  `id` varchar(36) NOT NULL,
  `event` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `entity_id` varchar(36) NOT NULL,
  `json_object` text NOT NULL,
  `description` text,
  `source_id` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audit_deltas`
--

CREATE TABLE IF NOT EXISTS `audit_deltas` (
  `id` varchar(36) NOT NULL,
  `audit_id` varchar(36) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `old_value` text,
  `new_value` text,
  PRIMARY KEY (`id`),
  KEY `audit_id` (`audit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

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
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=5 ;

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
  `publicado` tinyint(1) NOT NULL,
  `titulo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `destino` tinytext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_convenio`),
  KEY `organismo_id` (`organismo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;


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

CREATE TABLE IF NOT EXISTS `fotos_obra` (
  `id_foto_obra` bigint(20) NOT NULL AUTO_INCREMENT,
  `obra_id` bigint(20) NOT NULL,
  `titulo` tinytext COLLATE utf8_spanish_ci,
  `descripcion` tinytext COLLATE utf8_spanish_ci,
  `path` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `dir` tinytext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_foto_obra`),
  KEY `obra_id` (`obra_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

INSERT INTO `fotos_obra` (`id_foto_obra`, `obra_id`, `titulo`, `descripcion`, `path`, `created`, `modified`, `dir`) VALUES
(4, 2, 'Test', 'testeos', '111845-LyricsJoycom.png', '2013-08-11 20:23:41', '2013-08-12 17:27:16', '4');

CREATE TABLE IF NOT EXISTS `grupos` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=5 ;

CREATE TABLE IF NOT EXISTS `ideas` (
  `id_idea` bigint(20) NOT NULL,
  `titulo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `contenido` longtext COLLATE utf8_spanish_ci NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id_idea`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` bigint(11) NOT NULL AUTO_INCREMENT,
  `nombre` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `url` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  `logo` tinytext COLLATE utf8_spanish_ci,
  `simulador` text COLLATE utf8_spanish_ci,
  `codigo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `dir` tinytext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_marca`),
  UNIQUE KEY `codigo_unico` (`codigo`(10))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=137 ;

CREATE TABLE IF NOT EXISTS `materiales` (
  `id_material` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `introduccion` text COLLATE utf8_spanish_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  `codigo_g` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `imagen` tinytext COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=93 ;

CREATE TABLE IF NOT EXISTS `obra` (
  `id_obra` bigint(20) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `pintor_id` bigint(20) NOT NULL,
  `publicado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_obra`),
  KEY `pintor_id` (`pintor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

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
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

CREATE TABLE IF NOT EXISTS `pintor_especialidad` (
  `pintor_id` bigint(20) NOT NULL,
  `especialidad_id` bigint(20) NOT NULL,
  PRIMARY KEY (`pintor_id`,`especialidad_id`),
  KEY `especialidad_id` (`especialidad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `tipo_id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `codigo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `imagen` tinytext COLLATE utf8_spanish_ci,
  `dir` tinytext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_producto`),
  UNIQUE KEY `codigo_unico` (`codigo`(10))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1061 ;

CREATE TABLE IF NOT EXISTS `productos_materiales` (
  `producto_id` bigint(20) NOT NULL,
  `material_id` bigint(20) NOT NULL,
  PRIMARY KEY (`producto_id`,`material_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `productos_superficies` (
  `producto_id` int(11) NOT NULL,
  `superficie_id` int(11) NOT NULL,
  PRIMARY KEY (`producto_id`,`superficie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE IF NOT EXISTS `promocion` (
  `id_promocion` bigint(20) NOT NULL AUTO_INCREMENT,
  `titulo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `valido_desde` date DEFAULT NULL,
  `valido_hasta` date NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  `dir` tinytext COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id_promocion`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

CREATE TABLE IF NOT EXISTS `superficie` (
  `id_superficie` bigint(20) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `nombre` tinytext NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `publicado` tinyint(1) NOT NULL,
  `imagen` tinytext,
  `dir` tinytext,
  `descripcion` longtext NOT NULL,
  PRIMARY KEY (`id_superficie`),
  UNIQUE KEY `codigo_unico` (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

CREATE TABLE IF NOT EXISTS `tipos` (
  `id_tipo` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` tinytext COLLATE utf8_spanish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `codigo` tinytext COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo`),
  UNIQUE KEY `codigo_unico` (`codigo`(100))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=193 ;

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
  KEY `grupo_id` (`grupo_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `convenio`
--
ALTER TABLE `convenio`
  ADD CONSTRAINT `convenio_ibfk_1` FOREIGN KEY (`organismo_id`) REFERENCES `organismos` (`id_organismo`);

--
-- Filtros para la tabla `fotos_obra`
--
ALTER TABLE `fotos_obra`
  ADD CONSTRAINT `fotos_obra_ibfk_1` FOREIGN KEY (`obra_id`) REFERENCES `obra` (`id_obra`);

--
-- Filtros para la tabla `obra`
--
ALTER TABLE `obra`
  ADD CONSTRAINT `obra_ibfk_1` FOREIGN KEY (`pintor_id`) REFERENCES `pintor` (`id_pintor`);

--
-- Filtros para la tabla `pintor`
--
ALTER TABLE `pintor`
  ADD CONSTRAINT `pintor_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `pintor_especialidad`
--
ALTER TABLE `pintor_especialidad`
  ADD CONSTRAINT `pintor_especialidad_ibfk_1` FOREIGN KEY (`pintor_id`) REFERENCES `pintor` (`id_pintor`),
  ADD CONSTRAINT `pintor_especialidad_ibfk_2` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidad` (`id_especialidad`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id_grupo`);
