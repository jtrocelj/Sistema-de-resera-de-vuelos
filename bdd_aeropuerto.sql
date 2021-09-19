-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2021 a las 19:15:11
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdd_aeropuerto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `id` int(11) NOT NULL,
  `origen` varchar(50) NOT NULL,
  `destino` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`id`, `origen`, `destino`) VALUES
(1, 'La Paz', 'La Paz'),
(2, 'Oruro', 'Oruro'),
(3, 'Potosi', 'Potosi'),
(4, 'Cochabamba', 'Cochabamba'),
(5, 'Chuquisaca', 'Chuquisaca'),
(6, 'Tarija', 'Tarija'),
(7, 'Pando', 'Pando'),
(8, 'Beni', 'Beni'),
(9, 'Santa Cruz', 'Santa Cruz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `apellidos` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `origen` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `asiento` varchar(20) NOT NULL,
  `equipaje` varchar(100) NOT NULL,
  `peso_equipaje` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`apellidos`, `nombres`, `telefono`, `email`, `origen`, `destino`, `fecha`, `hora`, `asiento`, `equipaje`, `peso_equipaje`) VALUES
('Camacho', 'Carlos', 4567124, 'carlos.gmail.com', 'La Paz', 'Potosi', '2021-07-10', '10:00:00', '14A', '3 Maletas', '45 kg'),
('chavez', 'Americo', 7812344, 'americo@gmail.com', 'La Paz', 'Potosi', '2021-05-31', '04:00:00', '18B', '4 maletas', '40 kg'),
('humeres', 'Dana', 6783413, 'lucia@gmail.com', 'La Paz', 'Oruro', '2021-07-09', '20:52:00', '122', '1 maleta', '13 kg'),
('justiniano', 'Bruno', 606781, 'bruno@gmail.com', 'La Paz', 'Tarija', '2021-07-11', '20:00:00', '20C', '1 maleta', '20kg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrocli`
--

CREATE TABLE `registrocli` (
  `numero_documento` varchar(11) NOT NULL,
  `tipo_documento` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registrocli`
--

INSERT INTO `registrocli` (`numero_documento`, `tipo_documento`, `nombres`, `apellidos`, `telefono`, `email`, `fecha_nacimiento`, `nacionalidad`, `estado_civil`, `genero`, `foto`) VALUES
('1.234.567.8', 'Cedula de Identidad', 'Maria Daniela', 'Martinez Garcia', 65498752, 'martinez444@gmail.com', '1988-08-21', 'Colombiana', 'Solter@', 'Femenino', 'imagenes/MM1.234.567.890.jpg'),
('1796399', 'Cedula de Identidad', 'Fernando', 'Castellon', 72548489, 'castellon222@gmail.com', '1955-02-12', 'Boliviano', 'Divorciad@', 'masculino', 'imagenes/FC1796399.jpg'),
('4822012', 'Cedula de Identidad', 'Sylvana Isabel', 'Gutierrez Aguilar', 71530302, 'Gutierrez666@gmail.com', '1970-11-17', 'Boliviana', 'Casad@', 'femenino', 'imagenes/SG4822012.jpg'),
('5245787', 'Pasaporte', 'Freddy Jose', 'Montoya Herrera', 77212177, 'montoya333@gmail.com', '1982-09-04', 'Boliviano', 'Casad@', 'masculino', 'imagenes/FM5245787.jpg'),
('6389202', 'Pasaporte', 'Wilma', 'Avila Vargas', 72945566, 'avila777@gmail.com', '1989-11-19', 'Boliviana', 'Solter@', 'femenino', 'imagenes/WA6389202.jpg'),
('8093192', 'Cedula de Identidad', 'Enrique', 'Cuevas', 71544544, 'cuevas111@gmail.com', '1966-07-06', 'Boliviano', 'Casad@', 'masculino', 'imagenes/EC8093192.jpg'),
('9.999.999-9', 'Cedula de Identidad', 'Daniela', 'Suarez Muslera', 65431112, 'suarez555@gmail.com', '1961-10-28', 'Uruguaya', 'Casad@', 'femenino', 'imagenes/DS9.999.999-9.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `paterno` varchar(100) NOT NULL,
  `materno` varchar(100) NOT NULL,
  `ci` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `clave` text NOT NULL,
  `estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nombre`, `paterno`, `materno`, `ci`, `usuario`, `clave`, `estado`) VALUES
(1, 'usuario', 'admin', 'vargas', 87654321, 'uadmin', '$2y$10$ZSd.DVgZX.G.X4ijKugmx.mkVHFntt8eFY/5iVq6W14rRGjc.58jS', b'1'),
(2, 'valeria', 'vargas', 'zurita', 45614, 'vvargas', '$2y$10$J8Bs3UJvt5Pb5A..BTraR.1.BFE/uUy53YvtnfeJDc4juk7mY58zu', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`apellidos`);

--
-- Indices de la tabla `registrocli`
--
ALTER TABLE `registrocli`
  ADD PRIMARY KEY (`numero_documento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
