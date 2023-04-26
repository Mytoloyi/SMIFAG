-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 12:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finca_ganadera`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividades`
--

CREATE TABLE `actividades` (
  `idAct` int(11) NOT NULL,
  `nombreActividad` varchar(40) NOT NULL,
  `descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actividades`
--

INSERT INTO `actividades` (`idAct`, `nombreActividad`, `descripcion`) VALUES
(19, 'Vacunación', 'Vacunar lote 4'),
(20, 'Control del ganado', 'revision de ganado potrero 4'),
(22, 'Mantenimietno', 'Rozar potrero 3 y sanearlo'),
(23, '....', ''),
(25, 'Rosar potreros', 'rosar potreros 1 y 2'),
(26, 'Vigilancia', 'Realizar patrullaje y conteo de reses');

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `idAdmin` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrador`
--

INSERT INTO `administrador` (`idAdmin`, `usuario`, `password`) VALUES
(1, 'ADMINjaime', 'HwnctaM=');

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `idActividad` int(11) NOT NULL,
  `idAct` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idEmpledo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`idActividad`, `idAct`, `fecha`, `idEmpledo`) VALUES
(53, 26, '2023-04-15', 177);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `idCargo` int(11) NOT NULL,
  `cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`idCargo`, `cargo`) VALUES
(1, 'Obrero'),
(2, 'Concinero(a)'),
(3, 'Veterinario'),
(4, 'Vigilante');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `idEmpledo` int(11) NOT NULL,
  `nombreEmpleado` varchar(50) NOT NULL,
  `apellidoEmpleado` varchar(50) NOT NULL,
  `documentoEmpleado` int(50) NOT NULL,
  `telefonoEmpleado` varchar(50) NOT NULL,
  `tipodeContrato` varchar(50) NOT NULL,
  `nomina` varchar(12) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `tipoDocumento` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`idEmpledo`, `nombreEmpleado`, `apellidoEmpleado`, `documentoEmpleado`, `telefonoEmpleado`, `tipodeContrato`, `nomina`, `idCargo`, `tipoDocumento`) VALUES
(172, 'Jaime', 'Hanharry', 1002314269, '3207899876', 'Definido', '1000000000', 1, 'CC'),
(173, 'Juanin', 'Hanharry', 1002314269, '3207899876', 'Indefinido', '1000000000', 1, 'CC'),
(174, 'Hernán ', 'López', 1002314041, '3207899876', 'Definido', '1000000000', 1, 'CC'),
(175, 'Hernán ', 'Holguín Peña', 1002314269, '3207899876', 'Definido', '1000000000', 1, 'CC'),
(177, 'Astrid Briyecd', 'Holguín', 1002314041, '3207899876', 'Indefinido', '1000000000', 1, 'CC'),
(178, 'Dennis Jessenia', 'Morato Quintero', 1002679326, '31232622253', 'Definido', '1300000', 3, 'CC'),
(179, 'Ananias', 'Hanharry', 1002314897, '3207899876', 'Definido', '1000000000', 2, 'CC'),
(180, 'Elias', 'Hanharry', 1002314269, '3207899876', 'Definido', '1000000000', 2, 'CC'),
(181, 'Dylan ', 'Amaya', 1002314269, '3207899876', 'Definido', '1000000000', 1, 'CC');

-- --------------------------------------------------------

--
-- Table structure for table `ganado`
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
-- Dumping data for table `ganado`
--

INSERT INTO `ganado` (`idRes`, `raza`, `colorRes`, `categoriaEdad`, `tipoNegocio`, `idSocio`, `marcaChapeta`, `estado`, `precioinicial`, `precioFinal`, `idPotrero`, `pesoInicial`, `pesoActual`, `pesoFinal`, `vacunaAftosa`, `vecesAplicada`, `tratamiento`) VALUES
(49, 'Cebú', 'Amarillo', 'Ternero', 'No', 83, '1234 AS45', 'Criando', '500000', '0000', 15, '', '', '', '0000-00-00', '', ''),
(50, 'Cebú', 'Amarillo', 'Ternero', 'Sí', 83, '', 'Criando', '1234567', '999', 15, '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `herramientas`
--

CREATE TABLE `herramientas` (
  `idHerramienta` int(11) NOT NULL,
  `nombreHerramienta` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `novedades` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `herramientas`
--

INSERT INTO `herramientas` (`idHerramienta`, `nombreHerramienta`, `cantidad`, `novedades`) VALUES
(17, 'Pica', 17, 'En buen estado'),
(18, 'Palas', 6, 'Sin novedades');

-- --------------------------------------------------------

--
-- Table structure for table `insumos`
--

CREATE TABLE `insumos` (
  `idInsumo` int(11) NOT NULL,
  `nombreInsumo` varchar(50) NOT NULL,
  `cantidadInsumo` int(50) NOT NULL,
  `fechavencimiento` date NOT NULL,
  `valorUnidad` int(50) NOT NULL,
  `novedades` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `insumos`
--

INSERT INTO `insumos` (`idInsumo`, `nombreInsumo`, `cantidadInsumo`, `fechavencimiento`, `valorUnidad`, `novedades`) VALUES
(23, 'Concentrado', 13, '2023-04-12', 12900, 'Fecha proxima a caducar');

-- --------------------------------------------------------

--
-- Table structure for table `potrero`
--

CREATE TABLE `potrero` (
  `idPotrero` int(11) NOT NULL,
  `nombrePotrero` varchar(50) NOT NULL,
  `estadoPotrero` varchar(50) NOT NULL,
  `medida` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potrero`
--

INSERT INTO `potrero` (`idPotrero`, `nombrePotrero`, `estadoPotrero`, `medida`) VALUES
(15, 'Potrero #1', 'Disponible', '100 m^2'),
(38, 'Potrero #2', 'Disponible', '100 m2');

-- --------------------------------------------------------

--
-- Table structure for table `socios`
--

CREATE TABLE `socios` (
  `idSocio` int(11) NOT NULL,
  `nombreSocio` varchar(50) NOT NULL,
  `apellidoSocio` varchar(50) NOT NULL,
  `documentoSocio` int(50) NOT NULL,
  `telefonoSocio` varchar(50) NOT NULL,
  `marca` varchar(11) NOT NULL,
  `tipoDocumento` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `socios`
--

INSERT INTO `socios` (`idSocio`, `nombreSocio`, `apellidoSocio`, `documentoSocio`, `telefonoSocio`, `marca`, `tipoDocumento`) VALUES
(83, '', '', 0, '', 'No', 'CC'),
(92, 'Gustavo', 'Cerati', 7658907, '3457890987', 'BE83', 'CC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`idAct`),
  ADD UNIQUE KEY `nombreActividad` (`nombreActividad`);

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`idActividad`),
  ADD KEY `nombreEmpleado` (`idEmpledo`),
  ADD KEY `nombreActividad` (`idAct`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpledo`),
  ADD KEY `idCargo` (`idCargo`);

--
-- Indexes for table `ganado`
--
ALTER TABLE `ganado`
  ADD PRIMARY KEY (`idRes`),
  ADD KEY `marca` (`idSocio`),
  ADD KEY `nombrePotrero` (`idPotrero`);

--
-- Indexes for table `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`idHerramienta`);

--
-- Indexes for table `insumos`
--
ALTER TABLE `insumos`
  ADD PRIMARY KEY (`idInsumo`);

--
-- Indexes for table `potrero`
--
ALTER TABLE `potrero`
  ADD PRIMARY KEY (`idPotrero`),
  ADD UNIQUE KEY `nombrePotrero` (`nombrePotrero`);

--
-- Indexes for table `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`idSocio`),
  ADD UNIQUE KEY `marca` (`marca`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividades`
--
ALTER TABLE `actividades`
  MODIFY `idAct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `idActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpledo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `ganado`
--
ALTER TABLE `ganado`
  MODIFY `idRes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `idHerramienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `insumos`
--
ALTER TABLE `insumos`
  MODIFY `idInsumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `potrero`
--
ALTER TABLE `potrero`
  MODIFY `idPotrero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `socios`
--
ALTER TABLE `socios`
  MODIFY `idSocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_3` FOREIGN KEY (`idEmpledo`) REFERENCES `empleados` (`idEmpledo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `agenda_ibfk_4` FOREIGN KEY (`idAct`) REFERENCES `actividades` (`idAct`) ON UPDATE CASCADE;

--
-- Constraints for table `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `car` (`idCargo`) ON UPDATE CASCADE;

--
-- Constraints for table `ganado`
--
ALTER TABLE `ganado`
  ADD CONSTRAINT `ganado_ibfk_1` FOREIGN KEY (`idSocio`) REFERENCES `socios` (`idSocio`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ganado_ibfk_2` FOREIGN KEY (`idPotrero`) REFERENCES `potrero` (`idPotrero`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
