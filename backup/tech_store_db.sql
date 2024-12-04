-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2024 a las 19:08:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tech_store_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Smartphones', 'Dispositivos móviles, teléfonos inteligentes de varias marcas'),
(2, 'Laptops', 'Computadoras portátiles de diferentes gamas y marcas'),
(3, 'Tablets', 'Dispositivos portátiles con pantallas táctiles y sistema operativo móvil'),
(4, 'Audio & Auriculares', 'Altavoces, auriculares, y audífonos de alta calidad'),
(5, 'Accesorios', 'Accesorios tecnológicos como cargadores, cables, fundas y más'),
(6, 'Cámaras', 'Cámaras digitales y de video para fotografía y grabación profesional'),
(7, 'Electrodomésticos', 'Electrodomésticos como televisores, microondas, etc.'),
(8, 'Gaming', 'Consolas de videojuegos, accesorios y productos para gamers');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `stock` int(11) NOT NULL DEFAULT 0,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `stock`, `category_id`) VALUES
(1, 'iPhone 14', 999.99, 50, 1),
(2, 'Samsung Galaxy S23', 899.99, 40, 1),
(3, 'Xiaomi Redmi Note 12', 199.99, 100, 1),
(4, 'Google Pixel 8', 749.99, 30, 1),
(5, 'OnePlus 11', 799.99, 55, 1),
(6, 'Samsung Galaxy Z Flip 5', 999.99, 45, 1),
(7, 'Motorola Edge 40', 499.99, 70, 1),
(8, 'Realme 11 Pro', 289.99, 80, 1),
(9, 'Huawei P60', 899.99, 35, 1),
(10, 'Xiaomi Mi 13', 749.99, 60, 1),
(11, 'MacBook Pro 14\"', 1799.99, 25, 2),
(12, 'Dell XPS 13', 1299.99, 35, 2),
(13, 'HP Spectre x360', 999.99, 45, 2),
(14, 'Lenovo ThinkPad X1', 1399.99, 20, 2),
(15, 'Acer Aspire 5', 649.99, 80, 2),
(16, 'Asus ROG Zephyrus G14', 1699.99, 30, 2),
(17, 'Microsoft Surface Laptop 5', 1299.99, 50, 2),
(18, 'Razer Blade 15', 2199.99, 10, 2),
(19, 'Samsung Galaxy Book3', 999.99, 60, 2),
(20, 'HP Envy x360', 899.99, 40, 2),
(21, 'iPad Pro 11\"', 799.99, 60, 3),
(22, 'Samsung Galaxy Tab S8', 649.99, 55, 3),
(23, 'Microsoft Surface Pro 9', 899.99, 40, 3),
(24, 'Amazon Fire HD 10', 149.99, 150, 3),
(25, 'Huawei MatePad 11', 499.99, 80, 3),
(26, 'Lenovo Tab P11', 299.99, 100, 3),
(27, 'Xiaomi Pad 5', 349.99, 120, 3),
(28, 'Samsung Galaxy Tab A7', 229.99, 200, 3),
(29, 'Amazon Fire 7', 59.99, 250, 3),
(30, 'Samsung Galaxy Tab S7', 649.99, 90, 3),
(31, 'Sony WH-1000XM5', 349.99, 70, 4),
(32, 'Bose QuietComfort 45', 329.99, 60, 4),
(33, 'JBL Flip 6', 129.99, 100, 4),
(34, 'AirPods Pro 2', 249.99, 80, 4),
(35, 'Sony WF-1000XM4', 279.99, 55, 4),
(36, 'Beats Studio3 Wireless', 349.99, 40, 4),
(37, 'Sennheiser Momentum 3', 399.99, 50, 4),
(38, 'JBL Charge 5', 179.99, 75, 4),
(39, 'Sony SRS-XB23', 99.99, 120, 4),
(40, 'Bang & Olufsen Beoplay H95', 800.00, 15, 4),
(41, 'Cargador Inalámbrico Qi', 25.99, 120, 5),
(42, 'Funda para iPhone 14', 19.99, 150, 5),
(43, 'Cable USB-C', 9.99, 200, 5),
(44, 'Adaptador HDMI', 15.99, 180, 5),
(45, 'Soporte para teléfono', 12.99, 150, 5),
(46, 'Auricular Bluetooth', 39.99, 100, 5),
(47, 'Teclado inalámbrico', 29.99, 130, 5),
(48, 'Ratón ergonómico', 24.99, 140, 5),
(49, 'Estuche para laptop', 19.99, 90, 5),
(50, 'Funda para tablet', 14.99, 110, 5),
(51, 'Canon EOS Rebel T7', 499.99, 25, 6),
(52, 'Nikon D3500', 449.99, 30, 6),
(53, 'GoPro HERO 11', 349.99, 50, 6),
(54, 'Sony Alpha 7 III', 1799.99, 15, 6),
(55, 'Fujifilm X-T4', 1699.99, 20, 6),
(56, 'Panasonic Lumix GH5', 1299.99, 25, 6),
(57, 'Olympus OM-D E-M10 Mark IV', 699.99, 40, 6),
(58, 'Leica Q2', 4999.99, 5, 6),
(59, 'Sony ZV-1', 749.99, 30, 6),
(60, 'Nikon Z50', 849.99, 20, 6),
(61, 'Samsung QLED 4K', 799.99, 40, 7),
(62, 'LG 55\" OLED TV', 1499.99, 20, 7),
(63, 'Philips Airfryer', 119.99, 60, 7),
(64, 'Dyson V11 Cordless Vacuum', 599.99, 25, 7),
(65, 'Bose Home Speaker 500', 399.99, 30, 7),
(66, 'Dyson Supersonic Hair Dryer', 399.99, 15, 7),
(67, 'Samsung Refrigerator', 1299.99, 10, 7),
(68, 'iRobot Roomba i7+', 799.99, 50, 7),
(69, 'Ninja Blender', 129.99, 100, 7),
(70, 'Philips Sonicare Toothbrush', 89.99, 120, 7),
(71, 'PlayStation 5', 499.99, 30, 8),
(72, 'Xbox Series X', 499.99, 40, 8),
(73, 'Nintendo Switch OLED', 349.99, 60, 8),
(74, 'Razer Kraken Headset', 99.99, 80, 8),
(75, 'Logitech G502 Hero Mouse', 49.99, 120, 8),
(76, 'Corsair K95 RGB Keyboard', 179.99, 50, 8),
(77, 'SteelSeries Arctis 7 Headset', 149.99, 60, 8),
(78, 'Elgato Stream Deck', 149.99, 30, 8),
(79, 'Astro A50 Wireless Headset', 299.99, 40, 8),
(80, 'Oculus Quest 2', 299.99, 50, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
