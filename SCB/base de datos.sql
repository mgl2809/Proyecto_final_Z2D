-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 08-06-2015 a las 09:10:21
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `bdscb`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `administrador`
-- 

CREATE TABLE `administrador` (
  `id_administrador` int(10) unsigned NOT NULL auto_increment,
  `nombre_administrador` varchar(50) default NULL,
  `usuario` varchar(25) default NULL,
  `contrasenia` varchar(12) default NULL,
  PRIMARY KEY  (`id_administrador`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `administrador`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `anio_fiscal`
-- 

CREATE TABLE `anio_fiscal` (
  `idanio_fiscal` int(10) unsigned NOT NULL auto_increment,
  `programa_id_programa` int(10) unsigned NOT NULL,
  `fecha_inicio` date default NULL,
  `fecha_fin` date default NULL,
  `nombre` varchar(50) default NULL,
  PRIMARY KEY  (`idanio_fiscal`,`programa_id_programa`),
  KEY `anio_fiscal_FKIndex1` (`programa_id_programa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `anio_fiscal`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `beneficiario`
-- 

CREATE TABLE `beneficiario` (
  `id_beneficiario` int(10) unsigned NOT NULL auto_increment,
  `direccion_id_direccion` int(10) unsigned NOT NULL,
  `nombre_completo` varchar(50) default NULL,
  `rfc` varchar(13) default NULL,
  `curp` varchar(18) default NULL,
  `usuario` varchar(25) default NULL,
  `contrasenia` varchar(12) default NULL,
  `estado` varchar(15) default NULL,
  `profesion` varchar(50) default NULL,
  `estatus` int(10) unsigned default NULL,
  PRIMARY KEY  (`id_beneficiario`),
  KEY `beneficiario_FKIndex1` (`direccion_id_direccion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `beneficiario`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `dependencia`
-- 

CREATE TABLE `dependencia` (
  `id_dependencia` int(10) unsigned NOT NULL auto_increment,
  `enc_dependencia_idenc_dependencia` int(10) unsigned NOT NULL,
  `nombre` varchar(100) default NULL,
  `ubicacion` text,
  `responsable` varchar(50) default NULL,
  PRIMARY KEY  (`id_dependencia`),
  KEY `dependencia_FKIndex1` (`enc_dependencia_idenc_dependencia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `dependencia`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `direccion`
-- 

CREATE TABLE `direccion` (
  `id_direccion` int(10) unsigned NOT NULL auto_increment,
  `dependencia_id_dependencia` int(10) unsigned NOT NULL,
  `nombre` varchar(50) default NULL,
  `director` varchar(50) default NULL,
  `ubicacion` varchar(100) default NULL,
  PRIMARY KEY  (`id_direccion`),
  KEY `direccion_FKIndex1` (`dependencia_id_dependencia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `direccion`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `enc_dependencia`
-- 

CREATE TABLE `enc_dependencia` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `nombre_completo` varchar(50) default NULL,
  `usuario` varchar(25) default NULL,
  `contrasenia` varchar(15) default NULL,
  `puesto` varchar(50) default NULL,
  `num_empleado` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `enc_dependencia`
-- 

INSERT INTO `enc_dependencia` VALUES (1, 'Manuel Garcia', 'MAGA', '123456', 'Jefe', 30215);
INSERT INTO `enc_dependencia` VALUES (2, 'Horacio Garcia', 'HGOR', 'fgerjjs', 'Desarrollador', 23);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `organizacion`
-- 

CREATE TABLE `organizacion` (
  `id_organizacion` int(10) unsigned NOT NULL auto_increment,
  `direccion_id_direccion` int(10) unsigned NOT NULL,
  `nombre` varchar(50) default NULL,
  `giro` text,
  `ubicacion` text,
  `rfc` varchar(13) default NULL,
  PRIMARY KEY  (`id_organizacion`),
  KEY `organizacion_FKIndex1` (`direccion_id_direccion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `organizacion`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `programa`
-- 

CREATE TABLE `programa` (
  `id_programa` int(10) unsigned NOT NULL auto_increment,
  `dependencia_id_dependencia` int(10) unsigned NOT NULL,
  `beneficiario_id_beneficiario` int(10) unsigned NOT NULL,
  `nombre_programa` varchar(50) default NULL,
  `descripcion` varchar(50) default NULL,
  `caracteristicas` text,
  `categoria` varchar(100) default NULL,
  `monto` double default NULL,
  `estatus` int(10) unsigned default NULL,
  `convocatoria` varchar(50) default NULL,
  PRIMARY KEY  (`id_programa`),
  KEY `Programa_FKIndex1` (`beneficiario_id_beneficiario`),
  KEY `programa_FKIndex2` (`dependencia_id_dependencia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- 
-- Volcar la base de datos para la tabla `programa`
-- 

