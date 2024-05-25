# Delivery-INGSOFTWARE

Proyecto para ingenieria de Software basado en un carrito de compras, utilizando PHP, MYSQL y Boostrap 5

Es necesario tener instalado xampp: https://www.apachefriends.org/es/index.html

Creditos a: https://www.configuroweb.com/carrito-de-compras-en-php-y-mysql/

# Como acceder a la base de datos:

1. Crear una base en phpmyadmin de nombre **"carrito"**
2. Copiar el siguiente Query dentro de la base de datos

```
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2022 a las 21:10:23
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `name`, `email`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(1, 'ConfiguroWeb', 'hola@configuroweb.com', '3022589741', 'Cali', '2022-02-17 08:21:25', '2018-02-17 08:21:25', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mis_productos`
--

CREATE TABLE `mis_productos` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mis_productos`
--

INSERT INTO `mis_productos` (`id`, `name`, `description`, `price`, `created`, `modified`, `status`) VALUES
(1, 'Teléfono Za1b', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 15000.00, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1'),
(2, 'Camiseta Pedro Catarín', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 25300.00, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1'),
(3, 'Perfume Zantorín', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 17000.00, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1'),
(4, 'Jarabe Joala', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.', 21500.00, '2016-08-17 08:21:25', '2016-08-17 08:21:25', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id`, `customer_id`, `total_price`, `created`, `modified`, `status`) VALUES
(6, 1, 25.00, '2022-06-12 12:46:58', '2022-06-12 12:46:58', '1'),
(7, 1, 40.00, '2022-06-12 13:08:08', '2022-06-12 13:08:08', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_articulos`
--

CREATE TABLE `orden_articulos` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `orden_articulos`
--

INSERT INTO `orden_articulos` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 6, 2, 1),
(2, 7, 3, 1),
(3, 7, 4, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mis_productos`
--
ALTER TABLE `mis_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mis_productos`
--
ALTER TABLE `mis_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `orden_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orden_articulos`
--
ALTER TABLE `orden_articulos`
  ADD CONSTRAINT `orden_articulos_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orden` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```
# Tabla mis_productos
```
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-05-2024 a las 21:07:47
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mis_productos`
--

DROP TABLE IF EXISTS `mis_productos`;
CREATE TABLE IF NOT EXISTS `mis_productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image_path` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `name` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `delivery_time` int DEFAULT NULL,
  `price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `mis_productos`
--

INSERT INTO `mis_productos` (`id`, `image_path`, `name`, `description`, `delivery_time`, `price`, `created`, `modified`, `status`) VALUES
(1, 'https://assets.unileversolutions.com/recipes-v2/218401.jpg', 'Hamburguesa Clásica', 'Jugosa hamburguesa con queso cheddar, lechuga, tomate y cebolla.', 43, 8.99, '2024-05-25 13:05:44', '2024-05-25 13:05:44', '1'),
(2, 'https://content-cocina.lecturas.com/medio/2018/07/19/sushi-variado-tradicional_91be2c41_800x800.jpg', 'Sushi Variado', 'Plato de sushi con una selección de nigiri, maki y sashimi.', 45, 18.50, '2024-05-25 13:05:44', '2024-05-25 13:05:44', '1'),
(3, 'https://www.comedera.com/wp-content/uploads/2023/10/shutterstock_1087243763.jpg', 'Ensalada César', 'Ensalada fresca con pollo a la parrilla, crutones y aderezo César.', 34, 10.50, '2024-05-25 13:05:44', '2024-05-25 13:05:44', '1'),
(4, 'https://d2uqlwridla7kt.cloudfront.net/recipe-media/recipe-8ldv9otd7/19lsq78ldva66wy/20200823-133344-2-jpg', 'Tacos de Carne Asada', 'Tacos de carne asada con guacamole, salsa y cebolla.', 37, 12.99, '2024-05-25 13:05:45', '2024-05-25 13:05:45', '1'),
(5, 'https://milano.com/cdn/shop/products/866-710533A2_Camisa_Casual_Lisa_Manga_Corta_.Caballero_Milano_A_800x.jpg?v=1627434094', 'Camisa Casual', 'Camisa de algodón de manga larga, perfecta para el día a día.', 21, 29.99, '2024-05-25 13:02:18', '2024-05-25 13:02:18', '1'),
(6, 'https://m.media-amazon.com/images/I/71Y0BH5cFXL._AC_UF894,1000_QL80_.jpg', 'Zapatos Deportivos', 'Zapatos deportivos cómodos y duraderos para correr.', 55, 59.99, '2024-05-25 13:02:18', '2024-05-25 13:02:18', '1'),
(7, 'https://tooys.mx/media/wysiwyg/Hatsune-Miku-Hatsune-Miku-Trick-Or-Miku-estatua-por-estream-12.png', 'Paquete de Hatsune Miku Trick Or Miku', 'Entrega de figura Hatsuna Miku', 33, 100.00, '2024-05-25 13:02:18', '2024-05-25 13:02:18', '1'),
(8, 'https://imag.bonviveur.com/pizza-margarita.jpg', 'Pizza Margherita', 'Deliciosa pizza con salsa de tomate, queso mozzarella y albahaca fresca.', 57, 12.50, '2024-05-25 13:02:18', '2024-05-25 13:02:18', '1'),
(9, 'https://cdn1.coppel.com/images/catalog/pm/2388493-1.jpg', 'Smartphone Samsung Galaxy S24 Ultra 256 GB', 'Último modelo con pantalla de alta resolución y cámara avanzada.', 6, 230.00, '2024-05-25 13:02:18', '2024-05-25 13:02:18', '1'),
(10, 'https://www.grupobillingham.com/blog/wp-content/uploads/2022/08/Gafas-de-sol.jpg', 'Gafas de Sol', 'Gafas de sol polarizadas, ideales para proteger tus ojos del sol.', 38, 19.99, '2024-05-25 13:02:18', '2024-05-25 13:02:18', '1'),
(11, 'https://tosepan.org.mx/103-large_default/cafe-organico-certificado-tosepan-450grs.jpg', 'Café Orgánico', 'Café en grano orgánico, de comercio justo y sabor intenso.', 51, 15.99, '2024-05-25 13:02:18', '2024-05-25 13:02:18', '1'),
(12, 'https://laroussecocina.mx/wp-content/uploads/2022/12/Libros_portada.jpg', 'Libro de Cocina', 'Libro con recetas internacionales fáciles de seguir.', 23, 25.00, '2024-05-25 13:02:18', '2024-05-25 13:02:18', '1'),
(13, 'https://131392984.cdn6.editmysite.com/uploads/1/3/1/3/131392984/s106602750655736358_p189_i1_w700.jpeg', 'Elotes el Mike', 'Ricos elotes el Mike preparados con todo, elote entero. ?', 19, 150.00, '2024-05-25 13:02:18', '2024-05-25 13:02:18', '1'),
(14, 'https://i5.walmartimages.com.mx/mg/gm/3pp/asr/3d5d787e-a909-4fe0-a3ec-48947965a99b.08bfd6372952b662b2197d208d0ba56d.jpeg?odnHeight=612&odnWidth=612&odnBg=FFFFFF', 'Bolso de Cuero', 'Bolso de cuero genuino, elegante y espacioso para todas tus necesidades.', 26, 79.99, '2024-05-25 13:02:18', '2024-05-25 13:02:18', '1'),
(15, 'https://mobomx.vtexassets.com/arquivos/ids/206914-800-auto?v=638266835145030000&width=800&height=auto&aspect=true', 'Auriculares Bluetooth', 'Auriculares inalámbricos con cancelación de ruido y larga duración de batería.', 12, 49.99, '2024-05-25 13:02:18', '2024-05-25 13:02:18', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```
# Tabla clientes
```
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-05-2024 a las 21:08:24
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carrito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `name`, `email`, `phone`, `address`, `created`, `modified`, `status`) VALUES
(1, 'Alejandro Soto ', 'alex@gmail.com', '3022589741', 'Jardines de Oriente', '2022-02-17 08:21:25', '2018-02-17 08:21:25', '1'),
(2, 'Azul Siret', 'Azul@gmail.com', '614576978', 'Camino Shit', '2024-05-25 20:36:47', '2024-05-25 20:36:47', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
```

