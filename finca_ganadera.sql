-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-03-2023 a las 01:29:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `finca_ganadera`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `idAct` int(11) NOT NULL,
  `nombreActividad` varchar(40) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`idAct`, `nombreActividad`, `descripcion`) VALUES
(19, 'Vacunación', 'Vacunar lote 4'),
(20, 'Control del ganado', 'revision de ganado potrero 4'),
(22, 'Mantenimietno', 'Rozar potrero 3 y sanearlo'),
(23, '....', ''),
(24, 'kkk', 'fghjkl');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `idAdmin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `usuario`, `password`) VALUES
(1, 'ADMINjaime', 'HwnctaM=');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agenda`
--

CREATE TABLE `agenda` (
  `idActividad` int(11) NOT NULL,
  `idAct` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idEmpledo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `agenda`
--

INSERT INTO `agenda` (`idActividad`, `idAct`, `fecha`, `idEmpledo`) VALUES
(39, 20, '2022-11-18', 16),
(47, 19, '2022-11-11', 27),
(50, 22, '2022-11-25', 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpledo` int(11) NOT NULL,
  `nombreEmpleado` varchar(50) NOT NULL,
  `apellidoEmpleado` varchar(50) NOT NULL,
  `documentoEmpleado` int(50) NOT NULL,
  `telefonoEmpleado` varchar(50) NOT NULL,
  `rangoEmpleado` varchar(50) NOT NULL,
  `tipodeContrato` varchar(50) NOT NULL,
  `nomina` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`idEmpledo`, `nombreEmpleado`, `apellidoEmpleado`, `documentoEmpleado`, `telefonoEmpleado`, `rangoEmpleado`, `tipodeContrato`, `nomina`) VALUES
(16, 'Juanin', 'Hanharry', 123456789, '3209876543', 'Obrero', 'Jornal', ''),
(23, 'Astrid', 'Leon', 7540987, '3207890123', 'Cocinera', 'Indet', '300000'),
(27, 'Juan', 'Holguín', 100657980, '3298768907', 'Obrero', 'Jornal', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ganado`
--

CREATE TABLE `ganado` (
  `idRes` int(11) NOT NULL,
  `raza` varchar(50) NOT NULL,
  `colorRes` varchar(40) NOT NULL,
  `categoriaEdad` varchar(50) NOT NULL,
  `tipoNegocio` varchar(50) NOT NULL,
  `idSocio` int(11) NOT NULL,
  `marcaChapeta` varchar(40) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `precioinicial` varchar(40) NOT NULL,
  `precioFinal` varchar(40) NOT NULL,
  `idPotrero` int(11) NOT NULL,
  `pesoInicial` varchar(40) NOT NULL,
  `pesoActual` varchar(40) NOT NULL,
  `pesoFinal` varchar(40) NOT NULL,
  `vacunaAftosa` date NOT NULL,
  `vecesAplicada` varchar(10) NOT NULL,
  `tratamiento` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ganado`
--

INSERT INTO `ganado` (`idRes`, `raza`, `colorRes`, `categoriaEdad`, `tipoNegocio`, `idSocio`, `marcaChapeta`, `estado`, `precioinicial`, `precioFinal`, `idPotrero`, `pesoInicial`, `pesoActual`, `pesoFinal`, `vacunaAftosa`, `vecesAplicada`, `tratamiento`) VALUES
(10, 'Cebú', 'Amarillo', 'Novillo', 'Sí', 19, 'No tiene', 'Criando', '12345678', '0', 17, '500 kg', '700 kg', '0', '2022-11-10', '1', 'tratamiento/Char&Laura.jpg'),
(12, 'Barcino', 'Gris', 'Cebón', 'Sí', 20, 'No tiene', 'Criando', '500000', '0', 16, '500 kg', '800 kg', '00', '2022-11-12', '3', 'tratamiento/Char&Laura.jpg'),
(15, 'Cebú', 'Marrón', 'Ternero', 'Sí', 19, '5677', 'Criando', '500000', '0000', 15, '', '', '', '0000-00-00', '', ''),
(18, '', '', '...', '...', 26, '', '...', '', '', 22, '', '', '', '0000-00-00', '', ''),
(19, 'Normando', 'Blanco', 'Novillo', 'No', 26, 'O09I1234', 'Vendido', '500000', '0', 22, '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `idHerramienta` int(11) NOT NULL,
  `nombreHerramienta` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`idHerramienta`, `nombreHerramienta`, `cantidad`) VALUES
(9, 'Palas', 14),
(11, 'Guadañas', 6),
(12, 'Peinillas', 12),
(14, 'Barras', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumos`
--

CREATE TABLE `insumos` (
  `idInsumo` int(11) NOT NULL,
  `nombreInsumo` varchar(50) NOT NULL,
  `cantidadInsumo` int(50) NOT NULL,
  `fechavencimiento` date NOT NULL,
  `valorUnidad` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insumos`
--

INSERT INTO `insumos` (`idInsumo`, `nombreInsumo`, `cantidadInsumo`, `fechavencimiento`, `valorUnidad`) VALUES
(7, 'Vacunas Aftosa', 20, '2022-11-25', 10000),
(8, 'Concentrado', 21, '2022-11-19', 13000),
(11, 'Silo', 3, '2022-11-19', 20000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `potrero`
--

CREATE TABLE `potrero` (
  `idPotrero` int(11) NOT NULL,
  `nombrePotrero` varchar(50) NOT NULL,
  `estadoPotrero` varchar(50) NOT NULL,
  `medida` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `potrero`
--

INSERT INTO `potrero` (`idPotrero`, `nombrePotrero`, `estadoPotrero`, `medida`) VALUES
(15, 'Potrero #1', 'Disponible', '100 m^2'),
(16, 'Potrero #2', 'Disponible', '100 m^2'),
(17, 'Potrero #3', 'Disponible', '100 m^2'),
(21, 'Potrero #4', 'Mantenimiento', '50 m^2'),
(22, '...', 'Disponible', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `idSocio` int(11) NOT NULL,
  `nombreSocio` varchar(50) NOT NULL,
  `apellidoSocio` varchar(50) NOT NULL,
  `documentoSocio` int(50) NOT NULL,
  `telefonoSocio` varchar(50) NOT NULL,
  `marca` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`idSocio`, `nombreSocio`, `apellidoSocio`, `documentoSocio`, `telefonoSocio`, `marca`) VALUES
(19, 'José', 'López', 7658907, '3457891087', 'A1Y3'),
(20, 'Yesid', 'Ramirez', 987500000, '3457891087', 'B5U7'),
(25, 'Brayam', 'Morales', 198707856, '', 'BM25'),
(26, '', '', 0, '', '...');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idAct`),
  ADD UNIQUE KEY `nombreActividad` (`nombreActividad`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indices de la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idActividad`),
  ADD KEY `nombreEmpleado` (`idEmpledo`),
  ADD KEY `nombreActividad` (`idAct`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpledo`),
  ADD UNIQUE KEY `nombreEmpleado` (`nombreEmpleado`);

--
-- Indices de la tabla `ganado`
--
ALTER TABLE `ganado`
  ADD PRIMARY KEY (`idRes`),
  ADD KEY `marca` (`idSocio`),
  ADD KEY `nombrePotrero` (`idPotrero`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`idHerramienta`);

--
-- Indices de la tabla `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`idInsumo`);

--
-- Indices de la tabla `potrero`
--
ALTER TABLE `potrero`
  ADD PRIMARY KEY (`idPotrero`),
  ADD UNIQUE KEY `nombrePotrero` (`nombrePotrero`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`idSocio`),
  ADD UNIQUE KEY `marca` (`marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idAct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpledo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `ganado`
--
ALTER TABLE `ganado`
  MODIFY `idRes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `idHerramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `insumos`
--
ALTER TABLE `insumos`
  MODIFY `idInsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `potrero`
--
ALTER TABLE `potrero`
  MODIFY `idPotrero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `idSocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_3` FOREIGN KEY (`idEmpledo`) REFERENCES `empleados` (`idEmpledo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `agenda_ibfk_4` FOREIGN KEY (`idAct`) REFERENCES `actividades` (`idAct`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ganado`
--
ALTER TABLE `ganado`
  ADD CONSTRAINT `ganado_ibfk_1` FOREIGN KEY (`idSocio`) REFERENCES `socios` (`idSocio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ganado_ibfk_2` FOREIGN KEY (`idPotrero`) REFERENCES `potrero` (`idPotrero`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
