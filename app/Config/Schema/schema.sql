DROP TABLE IF EXISTS `pintureria`.`usuarios`;
DROP TABLE IF EXISTS `pintureria`.`grupos`;
DROP TABLE IF EXISTS `pintureria`.`convenios`;
CREATE TABLE `pintureria`.`usuarios` (
	`id_usuario` int(20) NOT NULL AUTO_INCREMENT,
	`email` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`apellido` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`telefono` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`celular` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`contra` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
	`grupo_id` int(11) NOT NULL,
	`facebook_id` int(20) NOT NULL,	PRIMARY KEY  (`id_usuario`)) 	DEFAULT CHARSET=utf8,
	COLLATE=utf8_spanish_ci,
	ENGINE=InnoDB;
CREATE TABLE `pintureria`.`grupos` (
	`id_grupo` int(11) NOT NULL AUTO_INCREMENT,
	`nombre` text CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,	
        PRIMARY KEY  (`id_grupo`)
) DEFAULT CHARSET=utf8, COLLATE=utf8_spanish2_ci, ENGINE=InnoDB;

CREATE TABLE `pintureria`.`convenio` (
	`id_convenio` int(11) NOT NULL AUTO_INCREMENT,
	`fecha_inicio` datetime NOT NULL,
        `fecha_fin` datetime NOT NULL,
        `documentacion` TEXT NOT NULL,
        `forma_pago` TEXT NOT NULL,
        `descuento` DOUBLE(20,5) NOT NULL DEFAULT 0,
        `organismo_id` int(20) NOT NULL,
        PRIMARY KEY  (`id_convenio`)
) DEFAULT CHARSET=utf8, COLLATE=utf8_spanish2_ci, ENGINE=InnoDB;
