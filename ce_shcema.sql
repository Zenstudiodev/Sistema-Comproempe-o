-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-07-2018 a las 23:36:48
-- Versión del servidor: 5.6.32-78.1
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comproem_sistema`
--
CREATE DATABASE IF NOT EXISTS `comproem_sistema` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `comproem_sistema`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `padre_id` int(255) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre`
--

CREATE TABLE `cierre` (
  `cierre_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total_ingreso` float NOT NULL,
  `total_egreso` float NOT NULL,
  `deposito` float NOT NULL,
  `visanet` float NOT NULL,
  `saldo_caja` float NOT NULL,
  `tienda_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(100) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dpi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nit` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `celular` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_cliente` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ciudad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `zona` int(100) NOT NULL,
  `colonia` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `publicidad` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tienda_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `contrato_id` int(55) NOT NULL,
  `cliente_id` int(55) NOT NULL,
  `fecha` date NOT NULL,
  `numero_de_productos` int(255) NOT NULL,
  `tototal_liquidado` float NOT NULL,
  `total_mutuo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total_avaluo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `almacenaje` int(11) NOT NULL,
  `plazo` int(11) NOT NULL,
  `tasa_interes` int(11) NOT NULL,
  `pago_interes` float NOT NULL,
  `costo_almacenaje` float NOT NULL,
  `pago_iva` float NOT NULL,
  `referendo` float NOT NULL,
  `desempeno` float NOT NULL,
  `fecha_pago` date NOT NULL,
  `fecha_pago_anterior` date NOT NULL,
  `dias_gracia` date NOT NULL,
  `dias_gracia_anterior` date NOT NULL,
  `tipo` enum('Empeno','Venta','Compra','') COLLATE utf8_unicode_ci NOT NULL,
  `estado` enum('vigente','gracia','perdido','refrendado','desempenado','anulado','liquidado_parcial','liquidado') COLLATE utf8_unicode_ci NOT NULL,
  `estado_anterior` enum('vigente','gracia','perdido','refrendado') COLLATE utf8_unicode_ci NOT NULL,
  `cotitular` varchar(255) COLLATE utf8_unicode_ci DEFAULT ' ',
  `tienda_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato_tienda_2`
--

CREATE TABLE `contrato_tienda_2` (
  `contrato_id` int(55) NOT NULL,
  `cliente_id` int(55) NOT NULL,
  `fecha` date NOT NULL,
  `numero_de_productos` int(255) NOT NULL,
  `tototal_liquidado` float NOT NULL,
  `total_mutuo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `total_avaluo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `almacenaje` int(11) NOT NULL,
  `plazo` int(11) NOT NULL,
  `tasa_interes` int(11) NOT NULL,
  `pago_interes` float NOT NULL,
  `costo_almacenaje` float NOT NULL,
  `pago_iva` float NOT NULL,
  `referendo` float NOT NULL,
  `desempeno` float NOT NULL,
  `fecha_pago` date NOT NULL,
  `fecha_pago_anterior` date NOT NULL,
  `dias_gracia` date NOT NULL,
  `dias_gracia_anterior` date NOT NULL,
  `tipo` enum('Empeno','Venta','Compra','') COLLATE utf8_unicode_ci NOT NULL,
  `estado` enum('vigente','gracia','perdido','refrendado','desempenado','anulado','liquidado_parcial','liquidado') COLLATE utf8_unicode_ci NOT NULL,
  `estado_anterior` enum('vigente','gracia','perdido','refrendado') COLLATE utf8_unicode_ci NOT NULL,
  `cotitular` varchar(255) COLLATE utf8_unicode_ci DEFAULT ' ',
  `tienda_id` int(11) NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_facturas`
--

CREATE TABLE `control_facturas` (
  `id` int(50) NOT NULL,
  `correlativo_del` int(50) NOT NULL,
  `correlativo_al` int(50) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `usadas` int(50) NOT NULL,
  `serie` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inactivo',
  `tienda_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `depositos`
--

CREATE TABLE `depositos` (
  `id_deposito` int(11) NOT NULL,
  `no_boleta` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `monto` float NOT NULL,
  `banco` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('cliente','interno') COLLATE utf8_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `tienda_id` int(11) NOT NULL,
  `documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dinero`
--

CREATE TABLE `dinero` (
  `dinero_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `b_200` int(11) NOT NULL,
  `b_100` int(11) NOT NULL,
  `b_50` int(11) NOT NULL,
  `b_20` int(11) NOT NULL,
  `b_10` int(11) NOT NULL,
  `b_5` int(11) NOT NULL,
  `b_1` int(11) NOT NULL,
  `m_1` int(11) NOT NULL,
  `m_50` int(11) NOT NULL,
  `m_25` int(11) NOT NULL,
  `m_10` int(11) NOT NULL,
  `m_5` int(11) NOT NULL,
  `cierre_id` int(11) NOT NULL,
  `tienda_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `egresos`
--

CREATE TABLE `egresos` (
  `egreso_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` enum('contrato','compra','otros_gastos') COLLATE utf8_unicode_ci NOT NULL,
  `contrato_id` int(11) NOT NULL,
  `intereses` int(11) NOT NULL,
  `dias` int(11) NOT NULL,
  `monto` float NOT NULL,
  `monto_refrendo` float NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci NOT NULL,
  `cierre_id` int(11) NOT NULL,
  `tienda_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `factura_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `contrato_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci NOT NULL,
  `cargo_extra` float NOT NULL,
  `intereses` float NOT NULL,
  `almacenaje` float NOT NULL,
  `mora` float DEFAULT NULL,
  `recuperacion` float DEFAULT NULL,
  `subtotal` float NOT NULL,
  `descuento` float NOT NULL,
  `total` float NOT NULL,
  `tipo` enum('desenmpeno','refrendo','venta') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'refrendo',
  `estado` enum('activa','anulada') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activa',
  `serie` enum('A','B','R') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_r`
--

CREATE TABLE `facturas_r` (
  `factura_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `contrato_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci NOT NULL,
  `cargo_extra` float NOT NULL,
  `intereses` float NOT NULL,
  `almacenaje` float NOT NULL,
  `mora` float DEFAULT NULL,
  `recuperacion` float DEFAULT NULL,
  `subtotal` float NOT NULL,
  `descuento` float NOT NULL,
  `total` float NOT NULL,
  `tipo` enum('desenmpeno','refrendo','venta') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'refrendo',
  `estado` enum('activa','anulada') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activa',
  `serie` enum('A','B','R') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_tienda_2`
--

CREATE TABLE `facturas_tienda_2` (
  `factura_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `contrato_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci NOT NULL,
  `cargo_extra` float NOT NULL,
  `intereses` float NOT NULL,
  `almacenaje` float NOT NULL,
  `mora` float DEFAULT NULL,
  `recuperacion` float DEFAULT NULL,
  `subtotal` float NOT NULL,
  `descuento` float NOT NULL,
  `total` float NOT NULL,
  `tipo` enum('desenmpeno','refrendo','venta') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'refrendo',
  `estado` enum('activa','anulada') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activa',
  `serie` enum('A','B','R') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_tienda_2_r`
--

CREATE TABLE `facturas_tienda_2_r` (
  `factura_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `contrato_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `detalle` text COLLATE utf8_unicode_ci NOT NULL,
  `cargo_extra` float NOT NULL,
  `intereses` float NOT NULL,
  `almacenaje` float NOT NULL,
  `mora` float DEFAULT NULL,
  `recuperacion` float DEFAULT NULL,
  `subtotal` float NOT NULL,
  `descuento` float NOT NULL,
  `total` float NOT NULL,
  `tipo` enum('desenmpeno','refrendo','venta') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'refrendo',
  `estado` enum('activa','anulada') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'activa',
  `serie` enum('A','B','R','RE') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_recibo`
--

CREATE TABLE `factura_recibo` (
  `id` int(250) NOT NULL,
  `factura_id` int(255) NOT NULL,
  `recibo_id` int(255) NOT NULL,
  `fecha` date NOT NULL,
  `tienda_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fondos_a_caja`
--

CREATE TABLE `fondos_a_caja` (
  `id_fc` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `monto` float NOT NULL,
  `banco` enum('gyt','bi') COLLATE utf8_unicode_ci NOT NULL,
  `no_cheque` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tienda_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `ingreso_id` int(11) NOT NULL,
  `ingreso_fecha` date NOT NULL,
  `tipo` enum('venta','apartado','abono','desempeño','intereses_refrendo','intereses_desempeno') COLLATE utf8_unicode_ci NOT NULL,
  `monto` float NOT NULL,
  `saldo` float DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_contrato` int(11) DEFAULT NULL,
  `factura_id` int(11) DEFAULT NULL,
  `recibo_id` int(11) DEFAULT NULL,
  `mutuo` float DEFAULT NULL,
  `nombre_producto` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cierre_id` int(11) NOT NULL DEFAULT '0',
  `tienda_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion_factura_producto`
--

CREATE TABLE `liquidacion_factura_producto` (
  `id_lfp` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_contratos`
--

CREATE TABLE `log_contratos` (
  `id_log` int(255) NOT NULL,
  `fecha_log` date NOT NULL,
  `accion_log` enum('desenmpeno','refrendo','abono') COLLATE utf8_unicode_ci NOT NULL,
  `contrato_id` int(255) NOT NULL,
  `cliente_id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tienda_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `producto_id` int(55) NOT NULL,
  `cliente_id` int(55) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `existencias` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `categoria` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_producto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_serie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha_avaluo` date NOT NULL,
  `avaluo_comercial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avaluo_ce` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mutuo` float NOT NULL,
  `precio_venta` float NOT NULL,
  `precio_compra` float NOT NULL,
  `contrato_id` int(11) NOT NULL,
  `id_prorateo` int(11) NOT NULL,
  `tipo` enum('vigente','vendido','compra','venta','apartado') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'vigente',
  `tienda_id` int(11) NOT NULL DEFAULT '1',
  `tienda_actual` int(11) NOT NULL,
  `apartado` float NOT NULL,
  `cliente_apartado` int(11) NOT NULL,
  `vencimiento_apartado` date NOT NULL,
  `recibo_apartado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prorateos`
--

CREATE TABLE `prorateos` (
  `id_prorateo` int(90) NOT NULL,
  `p_proveedor_id` int(255) NOT NULL,
  `p_no_factura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_serie_factura` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_fecha_factura` date NOT NULL,
  `p_factura_tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_fecha` date NOT NULL,
  `p_no_productos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_flete_sin_iva_local` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_gasto_no_deducible_local` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_total_cargo_extra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_cargo_extra_por_producto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_total_productos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_total_precio_sin_iva` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_total_iva` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_total_costo_neto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_total_precio_venta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_total_total_producto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tienda_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `proveedor_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nit` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos`
--

CREATE TABLE `recibos` (
  `recibo_id` int(100) NOT NULL,
  `cliente_id` int(100) NOT NULL,
  `contrato_id` int(100) NOT NULL,
  `fecha_recibo` date NOT NULL,
  `monto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto_en_letras` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('desempeno','venta','abono','liquidacion','apartado','abono_apartado') COLLATE utf8_unicode_ci NOT NULL,
  `detalle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` enum('activo','anulada') COLLATE utf8_unicode_ci NOT NULL,
  `serie` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tienda_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibos_tienda_2`
--

CREATE TABLE `recibos_tienda_2` (
  `recibo_id` int(100) NOT NULL,
  `cliente_id` int(100) NOT NULL,
  `contrato_id` int(100) NOT NULL,
  `fecha_recibo` date NOT NULL,
  `monto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monto_en_letras` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` enum('desempeno','venta','abono','liquidacion','apartado','abono_apartado') COLLATE utf8_unicode_ci NOT NULL,
  `detalle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` enum('activo','anulada') COLLATE utf8_unicode_ci NOT NULL,
  `serie` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tienda_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `seguimiento_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `contrato_id` int(11) NOT NULL,
  `fecha_seguimiento` date NOT NULL,
  `accion` enum('llamada','mensaje','correo') COLLATE utf8_unicode_ci NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE `tiendas` (
  `tienda_id` int(11) NOT NULL,
  `nombre_tienda` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gc_key` text COLLATE utf8_unicode_ci NOT NULL,
  `tienda_id` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vales`
--

CREATE TABLE `vales` (
  `vale_id` int(11) NOT NULL,
  `fecha_creado` date NOT NULL,
  `estado` enum('activo','cobrado') COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `detalle` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `monto` int(11) NOT NULL,
  `fecha_cobrado` date NOT NULL,
  `tienda_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visanet`
--

CREATE TABLE `visanet` (
  `id_visanet` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `factura_id` int(11) NOT NULL,
  `recibo_id` int(11) NOT NULL,
  `monto` float NOT NULL,
  `tienda_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cierre`
--
ALTER TABLE `cierre`
  ADD PRIMARY KEY (`cierre_id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`contrato_id`);

--
-- Indices de la tabla `contrato_tienda_2`
--
ALTER TABLE `contrato_tienda_2`
  ADD PRIMARY KEY (`contrato_id`);

--
-- Indices de la tabla `control_facturas`
--
ALTER TABLE `control_facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `depositos`
--
ALTER TABLE `depositos`
  ADD PRIMARY KEY (`id_deposito`);

--
-- Indices de la tabla `dinero`
--
ALTER TABLE `dinero`
  ADD PRIMARY KEY (`dinero_id`);

--
-- Indices de la tabla `egresos`
--
ALTER TABLE `egresos`
  ADD PRIMARY KEY (`egreso_id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`factura_id`);

--
-- Indices de la tabla `facturas_r`
--
ALTER TABLE `facturas_r`
  ADD PRIMARY KEY (`factura_id`);

--
-- Indices de la tabla `facturas_tienda_2`
--
ALTER TABLE `facturas_tienda_2`
  ADD PRIMARY KEY (`factura_id`);

--
-- Indices de la tabla `facturas_tienda_2_r`
--
ALTER TABLE `facturas_tienda_2_r`
  ADD PRIMARY KEY (`factura_id`);

--
-- Indices de la tabla `factura_recibo`
--
ALTER TABLE `factura_recibo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`ingreso_id`);

--
-- Indices de la tabla `liquidacion_factura_producto`
--
ALTER TABLE `liquidacion_factura_producto`
  ADD PRIMARY KEY (`id_lfp`);

--
-- Indices de la tabla `log_contratos`
--
ALTER TABLE `log_contratos`
  ADD PRIMARY KEY (`id_log`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`);

--
-- Indices de la tabla `prorateos`
--
ALTER TABLE `prorateos`
  ADD PRIMARY KEY (`id_prorateo`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`proveedor_id`);

--
-- Indices de la tabla `recibos`
--
ALTER TABLE `recibos`
  ADD PRIMARY KEY (`recibo_id`);

--
-- Indices de la tabla `recibos_tienda_2`
--
ALTER TABLE `recibos_tienda_2`
  ADD PRIMARY KEY (`recibo_id`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`seguimiento_id`);

--
-- Indices de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  ADD PRIMARY KEY (`tienda_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vales`
--
ALTER TABLE `vales`
  ADD PRIMARY KEY (`vale_id`);

--
-- Indices de la tabla `visanet`
--
ALTER TABLE `visanet`
  ADD PRIMARY KEY (`id_visanet`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cierre`
--
ALTER TABLE `cierre`
  MODIFY `cierre_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `contrato_id` int(55) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contrato_tienda_2`
--
ALTER TABLE `contrato_tienda_2`
  MODIFY `contrato_id` int(55) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `control_facturas`
--
ALTER TABLE `control_facturas`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `depositos`
--
ALTER TABLE `depositos`
  MODIFY `id_deposito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dinero`
--
ALTER TABLE `dinero`
  MODIFY `dinero_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `egresos`
--
ALTER TABLE `egresos`
  MODIFY `egreso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `factura_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas_r`
--
ALTER TABLE `facturas_r`
  MODIFY `factura_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas_tienda_2`
--
ALTER TABLE `facturas_tienda_2`
  MODIFY `factura_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `facturas_tienda_2_r`
--
ALTER TABLE `facturas_tienda_2_r`
  MODIFY `factura_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_recibo`
--
ALTER TABLE `factura_recibo`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `ingreso_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `liquidacion_factura_producto`
--
ALTER TABLE `liquidacion_factura_producto`
  MODIFY `id_lfp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log_contratos`
--
ALTER TABLE `log_contratos`
  MODIFY `id_log` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(55) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prorateos`
--
ALTER TABLE `prorateos`
  MODIFY `id_prorateo` int(90) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `proveedor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibos`
--
ALTER TABLE `recibos`
  MODIFY `recibo_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recibos_tienda_2`
--
ALTER TABLE `recibos_tienda_2`
  MODIFY `recibo_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  MODIFY `seguimiento_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiendas`
--
ALTER TABLE `tiendas`
  MODIFY `tienda_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vales`
--
ALTER TABLE `vales`
  MODIFY `vale_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visanet`
--
ALTER TABLE `visanet`
  MODIFY `id_visanet` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
