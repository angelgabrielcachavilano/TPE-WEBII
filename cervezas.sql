-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2020 a las 06:05:25
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cervezas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Blondie', 'Dentro de las rubias existen muchos tipos diferentes, con distintas formas de elaboracion. Para ser claros, el termino de cerveza rubia no hace referencia a ningun tipo de estilo o variedad concreta, sino que se refiere a muchisimas cervezas que tienen algo en comun: y es su elaboracion con maltas palidas o claras.'),
(3, 'Red Lagger', 'Esta cerveza, este color, se origino en Escocia, y esta pelirroja se encuentra desde hace siglos entre nosotros.\r\nEn su elaboracion predominan la malta de cebada y su color rubi, y a diferencia de la cerveza negra, por ejemplo, casi no incluye lupulo. Se suele distinguir por sus aromas frutales.'),
(4, 'Ipa', '\0En esencia, dos son los caracteres significativos de este tipo de cerveza: la graduacion alcoholica y la presencia de lupulo.\r\nY todo ello, como vimos al tratar la historia y origen de este tipo de cerveza, porque para que pudiera ser transportada en largos viajes, el alcohol proporcionaba un ambiente hostil para los microbios, y porque el lupulo ? conservante natural ? previene el crecimiento de las bacterias que causan la acidez.\r\nEste era el origen del termino India en la denominacion (cerveza elaborada para ser llevada a las colonias britanicas), quedando asi aclarado que el termino en la denominacion de la cerveza no refiere su pais de origen'),
(5, 'Negra', '\0Para conseguir una cerveza negra y lograr esa oscuridad final hay que tener en cuenta que lo principal para estas es la utilizacion de maltas tostadas, oscuras. Algunas de las maltas utilizadas para estas cervezas son: Roasted Barley, Chocolate, o Black Patent.'),
(6, 'TEST', 'CLAYMORE ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cerveza`
--

CREATE TABLE `cerveza` (
  `id_cerveza` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `precio` int(11) NOT NULL,
  `ibu` int(2) NOT NULL,
  `alcohol` float NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cerveza`
--

INSERT INTO `cerveza` (`id_cerveza`, `nombre`, `descripcion`, `imagen`, `precio`, `ibu`, `alcohol`, `id_categoria`) VALUES
(1, 'Porter', 'Maltas oscuras. Sabor y aroma penetrante y nocturno. Chocolate, azucar negro y cafe. La Porter es la cerveza tributo de beerHouse a la cultura de los primeros pubs en el puerto de Londres. Cheers.', 'images/porter.png', 175, 22, 7, 5),
(2, 'Honey', 'Babilonia antigua. Tras la boda, el padre de la novia convida al futuro yerno con cerveza de miel a lo largo de un mes. Asi lo dicta la tradicion. Nuestra Honey Beer recoge la historia que dio origen a la luna de miel y lo celebra con notas mento-ladas ', 'images/Honey.png', 180, 22, 7.5, 1),
(3, 'Imperial Stout', 'Catalina la Grande amaba las emociones fuertes. Por eso, la Imperial Stout, negra y tostada, empapada de alcohol y pasas, amarga y ahumada, era su cerveza favorita. Esencia inglesa de exportacion. Timidos, abstenerse.', 'images/Stout.png', 170, 49, 8.5, 5),
(4, 'Barley Wine', 'El roble tiene una larga historia acompaniando las bebidas. Cerveza, vino, whisky y otros destilados fueron guardados en barricas de Roble hasta la llegada del acero inoxidable. Pero como en la cerveza artesanal todo vuelve, una vez mas en Antares corremo', 'images/Barley.png', 170, 24, 14, 3),
(5, 'Scotch', 'Escocia es tierra de cebada y la Scotch Ale lleva ese paisaje impregnado en su codigo genetico. Rubi intenso. Seis grados de alcohol. Dulce y maltosa. La cerveza mas servida en nuestro Brewpub. Una formula a prueba del paso del tiempo.', 'images/Scotch.png', 170, 18, 6, 1),
(6, 'IPA', 'La India Pale Ale es una cerveza fuerte de color Ambar con un aroma intenso floral y frutal, de lupulos seleccionados en su elaboracion. Su amargor es elevado y se encuentra en balance con el dulzor aportado por las maltas.', 'images/ipa.png', 190, 51, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_cerveza` int(11) NOT NULL,
  `contenido` varchar(120) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `id_cerveza`, `contenido`, `puntuacion`, `fecha`, `id_usuario`) VALUES
(1, 1, 'TEST', 5, '2020-11-10', 5),
(2, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(3, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(4, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(5, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(6, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(7, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(8, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(9, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(10, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(11, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(14, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(15, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2),
(16, 1, 'TESssssssssssssssssT', 5, '2020-11-10', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `email`, `password`, `admin`) VALUES
(1, 'admin@gmail.com', '$2y$10$oSA0ucJiPHZ.7WwBFIcbjOntwBk6y1osJG5cGHMGLpUQY/Of3A8KS', 1),
(2, 'usuario@gmail.com', '$2y$10$LbKB8nK0oip4l695Va8dfu7vwirKozm8n8koNdJ4c1YLRSxW.uFKO', 0),
(3, 'random@gmail.com', '$2y$10$jdwtGTQ/UEKkl6YGsrwVfe.d8gUpR.8HjGt/L2QRNOwdnh/mkp8Z.', 0),
(4, 'adasdadadas@gmail.com', '$2y$10$6S9Z0RzmiedIQLUiTjeFb.kpFUeb95w8sFdngCPxpa9HE1sXOoDUS', 0),
(5, 'asdf@fasdfa.com', '$2y$10$w66ElddY.vnfGfZFWFbLWO1HOokh2V1GGXwgTRMV2lofMkcmlEUqO', 0),
(6, 'asdfadsf@gmail.com', '$2y$10$V7TFHjLbvfTuyWzQm2btiuErvRpCs.1wjOsieWwkmiUflz1KBaHIe', 0),
(7, 'asfasdfasdf@gmail.com', '$2y$10$af0F9JhPNuYuF90T0BxcYOMUqvjH/NFb4jTRYMMal/WIIuZkMh7da', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `cerveza`
--
ALTER TABLE `cerveza`
  ADD PRIMARY KEY (`id_cerveza`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_cerveza` (`id_cerveza`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `cerveza`
--
ALTER TABLE `cerveza`
  MODIFY `id_cerveza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cerveza`
--
ALTER TABLE `cerveza`
  ADD CONSTRAINT `cerveza_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_cerveza`) REFERENCES `cerveza` (`id_cerveza`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
