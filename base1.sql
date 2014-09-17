-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 17, 2014 at 10:34 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `base1`
--

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `Nombre` varchar(50) NOT NULL,
  `Sistema` tinyint(1) NOT NULL,
  `Perfiles` tinyint(1) NOT NULL,
  `Productos` tinyint(1) NOT NULL,
  `Inventario` tinyint(1) NOT NULL,
  `Facturacion` tinyint(1) NOT NULL,
  `Reportes` tinyint(1) NOT NULL,
  PRIMARY KEY (`Nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`Nombre`, `Sistema`, `Perfiles`, `Productos`, `Inventario`, `Facturacion`, `Reportes`) VALUES
('Cosito', 0, 0, 0, 0, 1, 1),
('root', 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `Documento` int(15) NOT NULL,
  `Nombres` varchar(30) NOT NULL,
  `Apellidos` varchar(30) NOT NULL,
  `Usuario` varchar(8) NOT NULL,
  `Password` varchar(8) NOT NULL,
  `Pregunta` varchar(150) NOT NULL,
  `Respuesta` varchar(150) NOT NULL,
  `Tipo_Documento` varchar(5) NOT NULL,
  `Ciudad` varchar(30) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Edad` int(3) NOT NULL,
  `Foto` varchar(200) NOT NULL,
  `Telefono` int(10) NOT NULL,
  `Correo_Electronico` varchar(30) NOT NULL,
  `Genero` varchar(1) NOT NULL,
  `perfiles_Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`Documento`),
  KEY `perfiles_Nombre` (`perfiles_Nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`Documento`, `Nombres`, `Apellidos`, `Usuario`, `Password`, `Pregunta`, `Respuesta`, `Tipo_Documento`, `Ciudad`, `Direccion`, `Edad`, `Foto`, `Telefono`, `Correo_Electronico`, `Genero`, `perfiles_Nombre`) VALUES
(1111111113, 'Rootencio', 'Adminez', 'roott', '123456', 'asdfasdfa?', 'batman', 'CC', 'Tulua', 'Calle 11 #1-1 - Barrio', 20, 'http://1.bp.blogspot.com/-VuCZ5URwvL4/UOwmLOZMGqI/AAAAAAAAAHE/0tuJa1FKU9A/s1600/tumblr_m0sykzhXsU1r4', 2147483647, 'asdf@root.com', 'M', 'root'),
(1116264489, 'Andres', 'Vasquez', 'andress', '1234', 'Primer amigo de la infancia?', 'jhon', 'CC', 'Tulua', 'Calle 44 #44-44 - Barrio', 20, 'https://sp.yimg.com/ib/th?id=HN.608055352352440543&pid=15.1&P=0', 2147483647, 'andresvasquez12345@gmail.com', 'M', 'Cosito'),
(1116266234, 'Jhon', 'Valencia', 'jhon', 'j12', 'Segundo nombre?', 'edinson', 'CC', 'Tulua', 'Calle 33 #333-33 - Barrio', 20, '', 2147483647, 'jevalenciac@gmail.com', 'M', 'Cosito'),
(1116268101, 'Yair', 'Mondragon ', 'yair', 'mondra', 'Primera Mascota?', 'perrito', 'CC', 'Tulua', 'Calle 22 #22-2 - Barrio', 20, 'https://scontent-b-dfw.xx.fbcdn.net/hphotos-xfa1/v/t1.0-9/12058_288531341277248_255174317_n.jpg?oh=4ce2e3746e3e1592bbdf726faa9a5549&oe=54849F93', 2307004, 'blackandwhite654@gmail.com', 'M', 'Cosito'),
(1116488415, 'Stiven', 'Flores', 'stiven', '1234', 'Comida favorita?', 'rapida', 'CC', 'Tulua', 'Carrera 44 #44-44 - Barrio', 20, '', 2147483647, 'stiven123@gmail.com', 'M', 'Cosito');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
