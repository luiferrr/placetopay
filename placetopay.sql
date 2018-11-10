-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2018 a las 20:34:17
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `placetopay`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` int(255) NOT NULL,
  `ref` int(255) DEFAULT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `deudor` varchar(255) DEFAULT NULL,
  `docdeudor` varchar(255) DEFAULT NULL,
  `refalt` int(255) DEFAULT NULL,
  `consecutivo` int(255) DEFAULT NULL,
  `iva` int(255) DEFAULT NULL,
  `subtotal` int(255) DEFAULT NULL,
  `valor` int(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `fechacrea` date DEFAULT NULL,
  `sinrec` date DEFAULT NULL,
  `pagado` date DEFAULT NULL,
  `id_user` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `ref`, `desc`, `deudor`, `docdeudor`, `refalt`, `consecutivo`, `iva`, `subtotal`, `valor`, `estado`, `fechacrea`, `sinrec`, `pagado`, `id_user`) VALUES
(1, 555, 'prueba prueba', 'prueba', '123123123', 222, 1, 0, 100000, 100000, 'Aprobado', '2018-11-10', '2018-11-12', '2018-11-30', 1),
(2, 222, 'prueba prueba', 'prueba', '123123123', 333, 2, 0, 200000, 200000, 'Aprobado', '2018-11-10', '2018-11-12', '2018-11-30', 1),
(3, 444, 'prueba prueba prueba', 'prueba', '123123123', 555, 3, 0, 400000, 500000, 'Rechazado', '2018-11-01', '2018-11-02', '2018-11-03', 1),
(4, 123, 'prueba prueba prueba', 'prueba', '123123123', 555, 4, 0, 500000, 500000, 'Activo', '2018-11-01', '2018-11-02', '2018-11-03', 1),
(5, 777, 'prueba', 'prueba', '123123123', 99, 5, 0, 700000, 700000, 'Activo', '2018-11-02', '2018-11-30', '2018-12-31', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(255) NOT NULL,
  `documento` int(255) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `documento`, `nombre`, `email`) VALUES
(1, 123123123, 'Luis fernando Reyes Giraldo', 'luifer2003@gmail.com'),
(2, 1098656122, 'Jhon Santos Santamaria', 'j.s@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
