-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2024 a las 03:00:30
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadeventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_almacen`
--

CREATE TABLE `tb_almacen` (
  `id_producto` int(11) NOT NULL,
  `codigo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_minimo` int(11) DEFAULT NULL,
  `stock_maximo` int(11) DEFAULT NULL,
  `precio_compra` varchar(255) NOT NULL,
  `precio_venta` varchar(255) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `imagen` text DEFAULT NULL,
  `promocion` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_almacen`
--

INSERT INTO `tb_almacen` (`id_producto`, `codigo`, `nombre`, `descripcion`, `id_categoria`, `id_usuario`, `stock`, `stock_minimo`, `stock_maximo`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `promocion`, `descuento`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(36, '001', 'Shampoo Perl Manzana', '', 24, 2, 100, 200, 1000, '70', '100', '2024-07-12', '2024-07-12-04-01-14__shampoo perl.png', NULL, NULL, '2024-07-12 04:01:14', '0000-00-00 00:00:00'),
(37, '0002', 'producto 2', '', 1, 2, 1000, 100, 400, '300', '500', '2024-07-12', '2024-07-12-04-03-34__20231002_1002073.webp', NULL, NULL, '2024-07-12 04:03:34', '0000-00-00 00:00:00'),
(38, '0003', 'bbtips', '', 1, 2, 197, 400, 600, '500', '600', '2024-07-12', '2024-07-12-04-04-32__20230816_1034927.webp', NULL, NULL, '2024-07-12 04:04:32', '0000-00-00 00:00:00'),
(39, '005', 'Nido', '', 1, 2, 2998, 400, 1000, '200', '450', '2024-07-12', '2024-07-12-04-05-19__20230314_1045843.webp', NULL, NULL, '2024-07-12 04:05:19', '0000-00-00 00:00:00'),
(40, '0006', 'Nido 2', '', 1, 2, 400, 500, 2000, '200', '340', '2024-07-12', '2024-07-12-04-07-55__leche_nido_800g.jpg', NULL, NULL, '2024-07-12 04:07:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_carrito`
--

CREATE TABLE `tb_carrito` (
  `id_carrito` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `status_event_carrito` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_carrito`
--

INSERT INTO `tb_carrito` (`id_carrito`, `nro_venta`, `id_producto`, `cantidad`, `status_event_carrito`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(9, 1, 38, 3, 'activo', '2024-07-12 04:58:31', '0000-00-00 00:00:00'),
(10, 1, 39, 2, 'activo', '2024-07-12 04:58:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_categoria`
--

INSERT INTO `tb_categoria` (`id_categoria`, `nombre_categoria`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'Perfumería', '2024-06-05 01:18:01', '2024-06-05 01:18:01'),
(2, 'Antibióticos', '2024-06-05 10:59:21', '2024-06-05 05:41:31'),
(3, 'Medicamento OTC', '2024-06-05 11:01:40', '0000-00-00 00:00:00'),
(9, 'Jugueteria', '2024-06-05 11:03:54', '2024-06-05 12:36:05'),
(10, 'Hidratantes', '2024-06-05 11:09:46', '2024-07-08 12:37:58'),
(11, 'Patentes', '2024-06-05 11:11:11', '2024-07-08 12:32:11'),
(12, 'Dolor y malestar', '2024-06-05 12:30:30', '2024-06-05 12:35:26'),
(24, 'Cuidado personal', '2024-06-06 06:30:18', '2024-06-07 01:33:30'),
(25, 'Jarabes para la tos', '2024-06-06 06:31:59', '2024-07-08 12:31:51'),
(26, 'Curitas', '2024-06-11 06:21:53', '0000-00-00 00:00:00'),
(27, 'Abarrotes', '2024-06-11 06:22:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(255) NOT NULL,
  `nit_ci_cliente` varchar(255) NOT NULL,
  `celular_cliente` varchar(50) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `status_event_cliente` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nombre_cliente`, `nit_ci_cliente`, `celular_cliente`, `email_cliente`, `status_event_cliente`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(7, 'Juanito Navajas', '70709956', '5654554040', 'jual@gmail.com', 'activo', '2024-07-11 12:56:37', '0000-00-00 00:00:00'),
(8, 'Karen Castillo', '1234567', '5654553881', 'kari@hotmal.com', NULL, '2024-07-11 03:45:19', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compras`
--

CREATE TABLE `tb_compras` (
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nro_compra` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `comprobante` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio_de_compra` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_proveedores`
--

CREATE TABLE `tb_proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(255) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `empresa` varchar(255) NOT NULL,
  `email_proveedor` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_proveedores`
--

INSERT INTO `tb_proveedores` (`id_proveedor`, `nombre_proveedor`, `celular`, `telefono`, `empresa`, `email_proveedor`, `direccion`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(9, 'Fernan Laboratorios chopo', '33188415', '5454', 'Laboratorios chopo', 'db@yahoo.com', 'Metro Guelatao \r\nEjército de Oriente  Issste, CDMX', '2024-06-12 01:41:41', '2024-06-20 11:53:16'),
(11, 'Gabriel ', '5638767624', '12345678910', 'Tiendas 3B', 'wc@gmail.com', 'Colonia del Valle, #130 CDMX', '2024-06-20 11:54:48', '2024-06-20 11:55:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 'WC Adminstrador', '2024-05-23 00:16:50', '2024-06-04 04:17:57'),
(12, 'Staff de ventas', '2024-05-23 11:46:39', '2024-05-23 01:16:44'),
(13, 'Marketing', '2024-05-23 02:08:44', '0000-00-00 00:00:00'),
(14, 'Contaduría', '2024-05-23 05:26:17', '0000-00-00 00:00:00'),
(15, 'Almacén', '2024-06-19 10:17:13', '2024-07-02 02:01:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_user` text NOT NULL,
  `token` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nombres`, `email`, `password_user`, `token`, `id_rol`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(2, 'Bryan Emmanuel', 'bryan@gmail.com', '$2y$10$E2.lu.5lgrfFOhbPttAIPOSm0Wd1juqkJJqf6VV.VvZIPRiK0gQZi', '', 1, '2024-06-04 05:14:13', '2024-06-04 05:14:25'),
(5, 'Manuel Ramos', 'manuel@yahoo.com', '$2y$10$/BSGEkE4QcQEbd8CVbyVI.sfhvo/ze6f0WU6VFw1vpy7aeHbSuZMS', '', 14, '2024-06-12 01:50:28', '2024-06-12 01:50:39'),
(6, 'Alondra', 'alo@colbach.mx', '$2y$10$3qiNWkSk1fdx4Dro4Gf3Q.Hs8HTmty4df2ogxrf41seLPMA3KAcHa', '', 12, '2024-06-13 02:14:31', '0000-00-00 00:00:00'),
(8, 'Lalo', 'almacen@gmail.com.mx', '$2y$10$OlCmS4C77LLsTC6eEIMsyuMAiX8LPe86yDW1g1G8HeV7RuAUz7IDO', '', 15, '2024-06-19 10:17:58', '2024-06-26 06:15:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ventas`
--

CREATE TABLE `tb_ventas` (
  `id_venta` int(11) NOT NULL,
  `nro_venta` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cambio` int(11) DEFAULT NULL,
  `total_pagado` int(11) NOT NULL,
  `folio` varchar(255) DEFAULT NULL,
  `status_event_ventas` varchar(255) DEFAULT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_ventas`
--

INSERT INTO `tb_ventas` (`id_venta`, `nro_venta`, `id_cliente`, `cambio`, `total_pagado`, `folio`, `status_event_ventas`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(1, 1, 7, 0, 1400, '302993', 'inactivo', '2024-07-11 01:43:30', '0000-00-00 00:00:00'),
(2, 2, 7, 60, 440, '00033838', 'inactivo', '2024-07-11 01:46:37', '0000-00-00 00:00:00'),
(3, 3, 8, 10, 210, '7383949', 'inactivo', '2024-07-11 03:45:44', '0000-00-00 00:00:00'),
(4, 1, 8, 30, 370, '838574', 'inactivo', '2024-07-12 02:43:05', '0000-00-00 00:00:00'),
(5, 2, 7, 0, 700, '', 'inactivo', '2024-07-12 02:48:34', '0000-00-00 00:00:00'),
(6, 2, 7, 0, 700, '', 'inactivo', '2024-07-12 02:54:55', '0000-00-00 00:00:00'),
(7, 1, 8, 100, 2700, '78939', 'activo', '2024-07-12 04:58:52', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_venta` (`nro_venta`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto_2` (`id_producto`);

--
-- Indices de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `nro_venta` (`nro_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_proveedores`
--
ALTER TABLE `tb_proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD CONSTRAINT `tb_almacen_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_almacen_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_carrito`
--
ALTER TABLE `tb_carrito`
  ADD CONSTRAINT `tb_carrito_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD CONSTRAINT `tb_compras_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `tb_proveedores` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_compras_ibfk_4` FOREIGN KEY (`id_producto`) REFERENCES `tb_almacen` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `tb_roles` (`id_rol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb_ventas`
--
ALTER TABLE `tb_ventas`
  ADD CONSTRAINT `tb_ventas_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `tb_clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
