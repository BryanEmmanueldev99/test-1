-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2024 a las 23:16:29
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
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_almacen`
--

INSERT INTO `tb_almacen` (`id_producto`, `codigo`, `nombre`, `descripcion`, `id_categoria`, `id_usuario`, `stock`, `stock_minimo`, `stock_maximo`, `precio_compra`, `precio_venta`, `fecha_ingreso`, `imagen`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(17, '0101', 'E pura de 2 mL', 'Agua Simple', 10, 8, 2220, 200, 0, '$44', '$50', '2024-06-19', '2024-06-19-02-47-38__epura.webp', '2024-06-19 02:47:38', '0000-00-00 00:00:00'),
(18, '00041010', 'Shampoo Perl Manzana', 'Shampoo verde marca Perl', 24, 8, 230, 200, 2500, '$70', '$100', '2024-06-20', '2024-06-20-02-11-17__shampoo perl.png', '2024-06-20 02:11:17', '0000-00-00 00:00:00'),
(19, '010130303', 'Agua Bonafon Sabor Jamaica', 'algo...', 10, 8, 650, 100, 1200, '$25', '$35', '2024-06-14', '2024-06-20-02-13-39__agua_bonafon.jpg', '2024-06-20 02:13:39', '2024-06-20 02:14:24'),
(20, '7501059225350', 'Leche Nido Kinder 800 G', '', 1, 8, 400, 300, 0, '$240', '$287', '2024-01-29', '2024-06-20-02-17-08__0002134_leche-nestle-nido-kinder-800-grs.jpg', '2024-06-20 02:17:08', '0000-00-00 00:00:00');

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
(10, 'Hidratantes', '2024-06-05 11:09:46', '2024-06-05 12:36:18'),
(11, 'Medicamento Patente', '2024-06-05 11:11:11', '0000-00-00 00:00:00'),
(12, 'Dolor y malestar', '2024-06-05 12:30:30', '2024-06-05 12:35:26'),
(24, 'Cuidado personal', '2024-06-06 06:30:18', '2024-06-07 01:33:30'),
(25, 'Jarabes', '2024-06-06 06:31:59', '0000-00-00 00:00:00'),
(26, 'Curitas', '2024-06-11 06:21:53', '0000-00-00 00:00:00'),
(27, 'Abarrotes', '2024-06-11 06:22:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compras`
--

CREATE TABLE `tb_compras` (
  `id_compra` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `nro_compra` int(11) NOT NULL,
  `fecha_compra` datetime NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `comprobante` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `precio_compra` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fyh_creacion` datetime NOT NULL,
  `fyh_actualizacion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tb_compras`
--

INSERT INTO `tb_compras` (`id_compra`, `id_producto`, `nro_compra`, `fecha_compra`, `id_proveedor`, `comprobante`, `id_usuario`, `precio_compra`, `cantidad`, `fyh_creacion`, `fyh_actualizacion`) VALUES
(5, 17, 1, '2024-06-20 00:00:00', 11, 'Factura CFDI', 8, '$600', 800, '2024-06-20 02:06:10', '0000-00-00 00:00:00'),
(6, 20, 2, '2024-06-19 00:00:00', 9, 'Factura CFDI', 8, '$440.60', 399, '2024-06-20 02:18:38', '0000-00-00 00:00:00');

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
(9, 'Fernan Laboratorios chopo', '33188415', '5454', 'Laboratorios chopo', 'desarrolloweb@yahoo.com', 'Metro Guelatao \r\nEjército de Oriente  Issste, CDMX', '2024-06-12 01:41:41', '2024-06-20 11:53:16'),
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
(15, 'Almacén', '2024-06-19 10:17:13', '0000-00-00 00:00:00');

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
(8, 'Lalo', 'almacen@gmail.com.mx', '$2y$10$NGejnTlt7Cx9dn7YAfbHhOeKeXcqPvWOkd.1nsACo8XAWqXm8xy2q', '', 15, '2024-06-19 10:17:58', '0000-00-00 00:00:00');

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
-- Indices de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id_categoria`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_almacen`
--
ALTER TABLE `tb_almacen`
  ADD CONSTRAINT `tb_almacen_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `tb_categoria` (`id_categoria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_almacen_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
