-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2017 at 08:42 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taller_erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `almacen`
--

CREATE TABLE `almacen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ultimo_costo` decimal(10,0) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `almacen`
--

INSERT INTO `almacen` (`id`, `nombre`, `ultimo_costo`, `cantidad`) VALUES
(1, 'Luminaria', '33', 7),
(2, 'Martillos 2', '120', 22),
(3, 'Cinta Electrica', '0', 0),
(4, 'Motores JM100. EjecuciÃ³n JM.', '33', 22),
(5, 'Aisladores.', '130', 24),
(8, 'Motores JM100. EjecuciÃ³n JM.', '20', 399),
(9, 'Pilas ', '200', 25),
(10, 'Tornillos', '440', 28);

-- --------------------------------------------------------

--
-- Table structure for table `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contrasena` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `direccion`, `correo`, `usuario`, `contrasena`) VALUES
(2, 'David Alexis', 'Vazquez Ayora', 'c.137 x44 y 46 # 224 Sanic del sur', 'rayman_1095@hotmail.com', 'rayman_1095@hot', '123'),
(3, 'Carlos', 'Lopez', 'c.137 x44 y 46 # 224 Sanic del sur', 'fdf@hotmail.com', 'fdf@hotmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `trabajador_id` int(11) NOT NULL,
  `cancelado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id`, `fecha`, `proveedor_id`, `trabajador_id`, `cancelado`) VALUES
(2, 2017, 6, 1, 0),
(3, 2017, 6, 1, 0),
(4, 2017, 6, 1, 0),
(5, 2017, 6, 1, 0),
(6, 2017, 6, 1, 0),
(7, 2017, 6, 1, 0),
(8, 2017, 6, 1, 0),
(9, 2017, 6, 1, 0),
(10, 2017, 6, 1, 0),
(11, 2017, 6, 1, 0),
(12, 2017, 7, 1, 0),
(13, 2017, 8, 1, 0),
(14, 2017, 8, 1, 0),
(15, 2017, 6, 1, 0),
(16, 2017, 8, 1, 0),
(17, 2017, 6, 1, 0),
(18, 2017, 6, 1, 0),
(19, 2017, 6, 1, 0),
(20, 2017, 7, 1, 0),
(21, 2017, 7, 1, 0),
(22, 2017, 6, 1, 0),
(23, 2017, 8, 1, 0),
(24, 2017, 7, 1, 0),
(25, 2017, 6, 1, 0),
(26, 2017, 8, 1, 0),
(27, 2017, 8, 1, 0),
(28, 2017, 8, 1, 0),
(29, 2017, 8, 1, 0),
(30, 2017, 7, 1, 0),
(31, 2017, 6, 1, 0),
(32, 2017, 6, 1, 0),
(33, 2017, 8, 1, 0),
(34, 2017, 7, 1, 0),
(35, 2017, 6, 1, 0),
(36, 2017, 8, 1, 0),
(37, 2017, 7, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `compras_productos`
--

CREATE TABLE `compras_productos` (
  `id` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `compras_productos`
--

INSERT INTO `compras_productos` (`id`, `compra_id`, `producto_id`, `cantidad`, `precio`) VALUES
(1, 8, 1, 2, '2'),
(2, 8, 2, 2, '2'),
(3, 10, 1, 2, '33'),
(4, 10, 1, 2, '33'),
(5, 11, 1, 1, '1'),
(6, 11, 1, 1, '1'),
(7, 14, 2, 10, '33'),
(8, 15, 3, 10, '20'),
(9, 16, 4, 10, '2'),
(10, 17, 1, 1, '2'),
(11, 18, 5, 10, '20'),
(12, 19, 1, 1, '2'),
(13, 20, 4, 20, '299'),
(14, 22, 4, 20, '399'),
(15, 23, 4, 10, '30'),
(16, 26, 4, 11, '11'),
(17, 27, 4, 11, '11'),
(18, 28, 1, 11, '12'),
(19, 29, 1, 11, '12'),
(20, 30, 4, 22, '33'),
(21, 31, 2, 10, '100'),
(22, 32, 2, 12, '120'),
(23, 33, 5, 12, '47'),
(24, 34, 9, 10, '200'),
(25, 34, 5, 12, '130'),
(26, 35, 9, 5, '220'),
(27, 36, 9, 10, '200'),
(28, 36, 10, 10, '200'),
(29, 37, 10, 20, '220');

-- --------------------------------------------------------

--
-- Table structure for table `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `empresa` varchar(40) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proveedor`
--

INSERT INTO `proveedor` (`id`, `empresa`, `nombre`, `direccion`, `correo`, `telefono`) VALUES
(6, 'DIFASA', 'Carlos Perez', 'KANASIN', 'difasa9821@hotmail.com', '9991345676'),
(7, 'Boxito', 'David Alexis Vazquez Ayora', 'c.137 x44 y 46 # 224 Sanic del sur', 'rayman_1095@hotmail.com', '9996564332'),
(8, 'Surtek', 'David Alexis Vazquez Ayora', 'c.137 x44 y 46 # 224 Sanic del sur', 'rayman_1095@hotmail.com', '9991548816');

-- --------------------------------------------------------

--
-- Table structure for table `reporte`
--

CREATE TABLE `reporte` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `trabajador_id` int(11) NOT NULL,
  `accion` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reporte`
--

INSERT INTO `reporte` (`id`, `fecha`, `trabajador_id`, `accion`) VALUES
(1, '2017-10-02', 1, 'EdiciÃ³n del cliente: 2'),
(2, '2017-10-20', 1, 'CreaciÃ³n del proveedor: 1'),
(3, '2017-10-20', 1, 'Eliminacion del proveedor 1'),
(4, '2017-10-20', 1, 'CreaciÃ³n del proveedor: 2'),
(5, '2017-10-20', 1, 'Eliminacion del proveedor 2'),
(6, '2017-10-20', 1, 'CreaciÃ³n del proveedor: 3'),
(7, '2017-10-20', 1, 'Eliminacion del proveedor 3'),
(8, '2017-10-20', 1, 'CreaciÃ³n del proveedor: 4'),
(9, '2017-10-20', 1, 'Eliminacion del proveedor 4'),
(10, '2017-10-20', 1, 'CreaciÃ³n del proveedor: 5'),
(11, '2017-10-20', 1, 'Eliminacion del proveedor 5'),
(12, '2017-10-20', 1, 'CreaciÃ³n del proveedor: 6'),
(13, '2017-10-20', 1, 'CreaciÃ³n del proveedor: 7'),
(14, '2017-10-20', 1, 'CreaciÃ³n del proveedor: 8'),
(15, '2017-10-20', 1, 'Edicion del proveedor: 7'),
(16, '2017-10-20', 1, 'Edicion del proveedor: 7'),
(17, '2017-10-20', 1, 'Edicion del proveedor: 7'),
(18, '2017-10-20', 1, 'Edicion del proveedor: 6'),
(19, '2017-10-20', 1, 'CreaciÃ³n del producto: 2'),
(20, '2017-10-20', 1, 'EdiciÃ³n del cliente: 2'),
(21, '2017-10-20', 1, 'EdiciÃ³n del cliente: 1'),
(22, '2017-10-20', 1, 'EdiciÃ³n del producto: 2'),
(23, '2017-10-20', 1, 'EdiciÃ³n del producto: 1'),
(24, '2017-10-20', 1, 'EdiciÃ³n del producto: 1'),
(25, '2017-10-20', 1, 'CreaciÃ³n de la compra: 1'),
(26, '2017-10-20', 1, 'CreaciÃ³n de la compra: 2'),
(27, '2017-10-20', 1, 'CreaciÃ³n de la compra: 3'),
(28, '2017-10-20', 1, 'CreaciÃ³n de la compra: 4'),
(29, '2017-10-20', 1, 'CreaciÃ³n de la compra: 5'),
(30, '2017-10-20', 1, 'CreaciÃ³n de la compra: 6'),
(31, '2017-10-20', 1, 'CreaciÃ³n de la compra: 7'),
(32, '2017-10-20', 1, 'CreaciÃ³n de la compra: 8'),
(33, '2017-10-20', 1, 'CreaciÃ³n de producto: 1 de la compra: 8'),
(34, '2017-10-20', 1, 'CreaciÃ³n de producto: 2 de la compra: 8'),
(35, '2017-10-20', 1, 'CreaciÃ³n del producto: 3'),
(36, '2017-10-20', 1, 'CreaciÃ³n del producto: 4'),
(37, '2017-10-20', 1, 'CreaciÃ³n del producto: 5'),
(38, '2017-10-20', 1, 'CreaciÃ³n de la compra: 9'),
(39, '2017-10-20', 1, 'CreaciÃ³n de la compra: 10'),
(40, '2017-10-20', 1, 'Producto comprado: 3'),
(41, '2017-10-20', 1, 'CreaciÃ³n de producto: 4 de la compra: 1'),
(42, '2017-10-20', 1, 'CreaciÃ³n de la compra: 11'),
(43, '2017-10-20', 1, 'Producto comprado: 5'),
(44, '2017-10-20', 1, 'CreaciÃ³n de producto: 6 de la compra: 1'),
(45, '2017-10-20', 1, 'CreaciÃ³n de la compra: 12'),
(46, '2017-10-20', 1, 'CreaciÃ³n de la compra: 13'),
(47, '2017-10-20', 1, 'CreaciÃ³n de la compra: 14'),
(48, '2017-10-20', 6, 'CreaciÃ³n de producto: 7 de la compra: 1'),
(49, '2017-10-20', 1, 'CreaciÃ³n de la compra: 15'),
(50, '2017-10-20', 1, 'CreaciÃ³n de producto: 8 de la compra: 1'),
(51, '2017-10-20', 1, 'CreaciÃ³n de la compra: 16'),
(52, '2017-10-20', 1, 'CreaciÃ³n de producto: 9 de la compra: 1'),
(53, '2017-10-20', 1, 'CreaciÃ³n de la compra: 17'),
(54, '2017-10-20', 1, 'CreaciÃ³n de producto: 10 de la compra: '),
(55, '2017-10-20', 1, 'CreaciÃ³n de la compra: 18'),
(56, '2017-10-20', 1, 'CreaciÃ³n de producto: 11 de la compra: '),
(57, '2017-10-20', 1, 'CreaciÃ³n de la compra: 19'),
(58, '2017-10-20', 1, 'CreaciÃ³n de producto: 12 de la compra: '),
(59, '2017-10-20', 1, 'CreaciÃ³n de la compra: 20'),
(60, '2017-10-20', 7, 'CreaciÃ³n de producto: 13 de la compra: '),
(61, '2017-10-20', 1, 'CreaciÃ³n de la compra: 21'),
(62, '2017-10-20', 1, 'CreaciÃ³n de la compra: 22'),
(63, '2017-10-20', 8, 'CreaciÃ³n de producto: 14 de la compra: '),
(64, '2017-10-20', 1, 'CreaciÃ³n de la compra: 23'),
(65, '2017-10-20', 1, 'CreaciÃ³n de producto: 15 de la compra: '),
(66, '2017-10-20', 1, 'CreaciÃ³n de la compra: 24'),
(67, '2017-10-20', 1, 'CreaciÃ³n de la compra: 25'),
(68, '2017-10-20', 1, 'CreaciÃ³n de la compra: 26'),
(69, '2017-10-20', 1, 'CreaciÃ³n de producto: 16 de la compra: '),
(70, '2017-10-20', 1, 'CreaciÃ³n de la compra: 27'),
(71, '2017-10-20', 0, 'CreaciÃ³n de producto: 17 de la compra: '),
(72, '2017-10-20', 1, 'CreaciÃ³n de la compra: 28'),
(73, '2017-10-20', 0, 'CreaciÃ³n de producto: 18 de la compra: '),
(74, '2017-10-20', 1, 'CreaciÃ³n de la compra: 29'),
(75, '2017-10-20', 0, 'CreaciÃ³n de producto: 19 de la compra: '),
(76, '2017-10-20', 1, 'CreaciÃ³n de la compra: 30'),
(77, '2017-10-20', 0, 'CreaciÃ³n de producto: 20 de la compra: '),
(78, '2017-10-20', 1, 'CreaciÃ³n de la compra: 31'),
(79, '2017-10-20', 0, 'CreaciÃ³n de producto: 21 de la compra: '),
(80, '2017-10-20', 1, 'CreaciÃ³n de la compra: 32'),
(81, '2017-10-20', 0, 'CreaciÃ³n de producto: 22 de la compra: '),
(82, '2017-10-20', 1, 'CreaciÃ³n de la compra: 33'),
(83, '2017-10-20', 0, 'CreaciÃ³n de producto: 23 de la compra: '),
(84, '2017-10-20', 1, 'CreaciÃ³n del producto: 9'),
(85, '2017-10-20', 1, 'CreaciÃ³n de la compra: 34'),
(86, '2017-10-20', 0, 'CreaciÃ³n de producto: 24 de la compra: '),
(87, '2017-10-20', 0, 'CreaciÃ³n de producto: 25 de la compra: '),
(88, '2017-10-20', 1, 'CreaciÃ³n de la compra: 35'),
(89, '2017-10-20', 0, 'CreaciÃ³n de producto: 26 de la compra: '),
(90, '2017-10-20', 1, 'CreaciÃ³n del producto: 10'),
(91, '2017-10-20', 1, 'Edicion del proveedor: 8'),
(92, '2017-10-20', 1, 'CreaciÃ³n de la compra: 36'),
(93, '2017-10-20', 0, 'CreaciÃ³n de producto: 27 de la compra: '),
(94, '2017-10-20', 0, 'CreaciÃ³n de producto: 28 de la compra: '),
(95, '2017-10-20', 1, 'CreaciÃ³n de la compra: 37'),
(96, '2017-10-20', 0, 'CreaciÃ³n de producto: 29 de la compra: '),
(97, '2017-10-24', 2, 'CreaciÃ³n de la venta: 1'),
(98, '2017-10-24', 0, 'CreaciÃ³n de producto: 1 de la venta: \n	'),
(99, '2017-10-24', 2, 'CreaciÃ³n de la venta: 2'),
(100, '2017-10-24', 0, 'CreaciÃ³n de producto: 2 de la venta: \n	'),
(101, '2017-10-24', 2, 'CreaciÃ³n de la venta: 3'),
(102, '2017-10-24', 0, 'CreaciÃ³n de producto: 3 de la venta: \n	'),
(103, '2017-10-24', 0, 'CreaciÃ³n de producto: 4 de la venta: \n	'),
(104, '2017-10-24', 2, 'CreaciÃ³n de la venta: 4'),
(105, '2017-10-24', 0, 'CreaciÃ³n de producto: 5 de la venta: \n	'),
(106, '2017-10-24', 0, 'CreaciÃ³n de producto: 6 de la venta: \n	'),
(107, '2017-10-26', 2, 'Creacion del trabajador: ');

-- --------------------------------------------------------

--
-- Table structure for table `trabajador`
--

CREATE TABLE `trabajador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `admin` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trabajador`
--

INSERT INTO `trabajador` (`id`, `nombre`, `apellido`, `usuario`, `contrasena`, `admin`) VALUES
(1, 'David Alexis', 'Vazquez Ayora', 'david', 'david', 1),
(2, 'Jose', 'Martinez', 'jose', '123', 1),
(3, 'Joaquin', 'Lopez', 'jLopez', '123', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `trabajador_id` int(11) NOT NULL,
  `cancelado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `cliente_id`, `trabajador_id`, `cancelado`) VALUES
(1, '2017-10-23', 2, 2, 0),
(2, '2017-10-23', 2, 2, 0),
(3, '2017-10-23', 3, 2, 0),
(4, '2017-10-23', 3, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ventas_productos`
--

CREATE TABLE `ventas_productos` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `ventas_productos`
--

INSERT INTO `ventas_productos` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio`) VALUES
(1, 1, 1, 1, '11'),
(2, 2, 1, 5, '0'),
(3, 3, 1, 2, '11'),
(4, 3, 10, 10, '220'),
(5, 4, 1, 3, '33'),
(6, 4, 10, 2, '440');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trabajador_id` (`trabajador_id`),
  ADD KEY `proveedor_id` (`proveedor_id`);

--
-- Indexes for table `compras_productos`
--
ALTER TABLE `compras_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compra_id` (`compra_id`,`producto_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indexes for table `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`,`trabajador_id`),
  ADD KEY `trabajador_id` (`trabajador_id`);

--
-- Indexes for table `ventas_productos`
--
ALTER TABLE `ventas_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_id` (`venta_id`,`producto_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `almacen`
--
ALTER TABLE `almacen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `compras_productos`
--
ALTER TABLE `compras_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `reporte`
--
ALTER TABLE `reporte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ventas_productos`
--
ALTER TABLE `ventas_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedor` (`id`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`trabajador_id`) REFERENCES `trabajador` (`id`);

--
-- Constraints for table `compras_productos`
--
ALTER TABLE `compras_productos`
  ADD CONSTRAINT `compras_productos_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`),
  ADD CONSTRAINT `compras_productos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `almacen` (`id`);

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`trabajador_id`) REFERENCES `trabajador` (`id`);

--
-- Constraints for table `ventas_productos`
--
ALTER TABLE `ventas_productos`
  ADD CONSTRAINT `ventas_productos_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `ventas_productos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `almacen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
