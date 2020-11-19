-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 10-11-2020 a las 18:12:50
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tatakua`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidas`
--

DROP TABLE IF EXISTS `bebidas`;
CREATE TABLE IF NOT EXISTS `bebidas` (
  `id_bebida` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `precio` int(5) NOT NULL,
  `cant_actual` int(3) DEFAULT NULL,
  `cant_minima` int(3) DEFAULT NULL,
  `id_marca` int(3) NOT NULL,
  `id_capacidad` int(2) NOT NULL,
  PRIMARY KEY (`id_bebida`),
  KEY `marcas_bebidas_fk` (`id_marca`),
  KEY `capacidad_bebidas_fk` (`id_capacidad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacidad`
--

DROP TABLE IF EXISTS `capacidad`;
CREATE TABLE IF NOT EXISTS `capacidad` (
  `id_capacidad` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_capacidad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `ruc` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ubicacion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tipo_cliente` int(1) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `tipo_cliente_clientes_fk` (`id_tipo_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

DROP TABLE IF EXISTS `empleados`;
CREATE TABLE IF NOT EXISTS `empleados` (
  `cedula_emp` int(3) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `id_sexo` int(1) NOT NULL,
  PRIMARY KEY (`cedula_emp`),
  KEY `sexo_empleados_fk` (`id_sexo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

DROP TABLE IF EXISTS `marcas`;
CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` int(3) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_cabecera`
--

DROP TABLE IF EXISTS `pedidos_cabecera`;
CREATE TABLE IF NOT EXISTS `pedidos_cabecera` (
  `id_pedido_cab` int(5) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `precio_total` int(6) NOT NULL,
  `iva_5` int(6) NOT NULL,
  `iva_10` int(6) NOT NULL,
  `iva_total` int(6) NOT NULL,
  `precio_escrito` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_cliente` int(5) NOT NULL,
  `id_pedido_det` int(5) NOT NULL,
  `id_producto` int(4) NOT NULL,
  PRIMARY KEY (`id_pedido_cab`),
  KEY `clientes_pedidos_cabecera_fk` (`id_cliente`),
  KEY `pedidos_detalle_pedidos_cabecera_fk` (`id_pedido_det`,`id_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_detalle`
--

DROP TABLE IF EXISTS `pedidos_detalle`;
CREATE TABLE IF NOT EXISTS `pedidos_detalle` (
  `id_pedido_det` int(5) NOT NULL AUTO_INCREMENT,
  `id_producto` int(4) NOT NULL,
  `cantidad_prod` int(2) NOT NULL,
  PRIMARY KEY (`id_pedido_det`,`id_producto`),
  KEY `productos_pedidos_detalle_fk` (`id_producto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(4) NOT NULL AUTO_INCREMENT,
  `id_producto_prin` int(4) NOT NULL DEFAULT '0',
  `id_torta` int(2) NOT NULL DEFAULT '0',
  `id_bebida` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_producto`),
  KEY `bebidas_productos_fk` (`id_bebida`),
  KEY `tortas_productos_fk` (`id_torta`),
  KEY `productos_principales_productos_fk` (`id_producto_prin`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_principales`
--

DROP TABLE IF EXISTS `productos_principales`;
CREATE TABLE IF NOT EXISTS `productos_principales` (
  `id_producto_prin` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precio_normal` int(4) NOT NULL,
  `precio_especial` int(4) DEFAULT NULL,
  `cant_minima` int(4) DEFAULT NULL,
  `cant_minima_1` int(4) DEFAULT NULL,
  `receta` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tipo_prod` int(2) NOT NULL,
  PRIMARY KEY (`id_producto_prin`),
  KEY `tipo_producto_productos_principales_fk` (`id_tipo_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `id_marca` int(3) NOT NULL,
  PRIMARY KEY (`id_proveedor`),
  KEY `marcas_proveedores_fk` (`id_marca`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

DROP TABLE IF EXISTS `sexo`;
CREATE TABLE IF NOT EXISTS `sexo` (
  `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES
(1, 'Hombre'),
(2, 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

DROP TABLE IF EXISTS `tipo_cliente`;
CREATE TABLE IF NOT EXISTS `tipo_cliente` (
  `id_tipo_cliente` int(1) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_cliente`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

DROP TABLE IF EXISTS `tipo_producto`;
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `id_tipo_prod` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_prod`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipo_prod`, `descripcion`) VALUES
(2, 'Bocadito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `descripcion`) VALUES
(1, 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tortas`
--

DROP TABLE IF EXISTS `tortas`;
CREATE TABLE IF NOT EXISTS `tortas` (
  `id_torta` int(2) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `precio_kg` int(5) NOT NULL,
  `receta` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_torta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `correo` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_sexo` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  PRIMARY KEY (`correo`),
  KEY `id_sexo` (`id_sexo`),
  KEY `id_tipo_usuario` (`id_tipo_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `pass`, `nombre`, `id_sexo`, `id_tipo_usuario`) VALUES
('abc', '1', 'Daniel', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
