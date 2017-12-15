-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2017 at 09:11 AM
-- Server version: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cochesapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `coche`
--

CREATE TABLE `coche` (
  `id` int(11) NOT NULL,
  `imagen` text,
  `imagen2` text,
  `nombre` text NOT NULL,
  `tipo` text NOT NULL,
  `potencia` int(11) NOT NULL,
  `cilindros` int(11) NOT NULL,
  `aceleracion` int(11) NOT NULL,
  `parmaxima` int(11) NOT NULL,
  `velocidadmaxima` int(11) NOT NULL,
  `turbo` text NOT NULL,
  `traccion` text NOT NULL,
  `marca` text NOT NULL,
  `year` date DEFAULT NULL,
  `precio` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coche`
--

INSERT INTO `coche` (`id`, `imagen`, `imagen2`, `nombre`, `tipo`, `potencia`, `cilindros`, `aceleracion`, `parmaxima`, `velocidadmaxima`, `turbo`, `traccion`, `marca`, `year`, `precio`, `created_at`, `updated_at`) VALUES
(3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/f5/Audi_TT_Coup%C3%A9_2.0_TFSI_quattro_S-line_%288S%29_%E2%80%93_Frontansicht%2C_3._April_2015%2C_D%C3%BCsseldorf.jpg/1200px-Audi_TT_Coup%C3%A9_2.0_TFSI_quattro_S-line_%288S%29_%E2%80%93_Frontansicht%2C_3._April_2015%2C_D%C3%BCsseldorf.jpg', 'https://i.ytimg.com/vi/ElQfP63XHTI/maxresdefault.jpg', 'audi tt', 'coupe', 180, 6, 11, 210, 230, 'si', 'trasera', 'coupe', '2017-11-08', 30000, '0000-00-00 00:00:00', '2017-12-12 22:27:02'),
(4, 'http://media.citroen.es/image/72/4/1500x646-citroen-c5-design-statutaire.74724.70.jpg', 'http://media.citroen.es/image/86/6/750x423-citroen-c5-habitacle-raffine.74866.jpg', 'citroen c5', 'coupe', 100, 4, 11, 150, 170, 'si', 'delantera', 'sedan', '2017-11-05', 10000, '0000-00-00 00:00:00', '2017-12-10 19:21:12'),
(5, 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/31/Citro%C3%ABn_Xsara_%28Facelift%29_%E2%80%93_Frontansicht%2C_17._M%C3%A4rz_2011%2C_W%C3%BClfrath.jpg/1200px-Citro%C3%ABn_Xsara_%28Facelift%29_%E2%80%93_Frontansicht%2C_17._M%C3%A4rz_2011%2C_W%C3%BClfrath.jpg', 'http://www.cochesyconcesionarios.com/uploads/Citroen/Xsara/1/HA/citroen-xsara-22-19ec99e410a695c4217b102e383fc25dac91e52a.jpeg', 'Citroen xsara', 'sedan', 80, 4, 10, 120, 150, 'no', 'delantera', 'sedan', '0000-00-00', 30000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'https://t1-cms-4.images.toyota-europe.com/toyotaone/eses/toyota-stories-2014-the-celica-story-article-06_tcm-1014-282175.jpg', 'http://oi59.tinypic.com/k4jrzs.jpg', 'toyota celica 6 gen', 'sedan', 120, 4, 10, 150, 160, 'si', 'delantera', 'coupe', '2017-11-06', 30000, '0000-00-00 00:00:00', '2017-12-12 22:28:37'),
(8, 'https://i.blogs.es/039536/toyota-supra-bmw-2018-3-/450_1000.jpg', 'http://www.automotiveaddicts.com/wp-content/uploads/2015/04/furious-7-1998-toyota-supra-trd-dashboard-interior.jpg', 'Toyota Supra', 'coupe', 1000, 6, 4, 1400, 380, 'si', 'trasera', 'coupe', '2017-11-07', 100000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'https://buyersguide.caranddriver.com/media/assets/submodel/8244.jpg', 'https://cars.usnews.com/static/images/Auto/izmo/i11849244/2017_alfa_romeo_guilia_dashboard.jpg', 'alfa romeo julieta', 'sedan', 110, 4, 10, 120, 230, 'si', 'trasera', 'alfa romeo', '2017-12-15', 30000, '2017-12-12 20:32:08', '2017-12-12 20:32:08'),
(10, 'https://www.diariomotor.com/imagenes/2017/09/04_CHIRON_ZERO-400-ZERO_dynamic_crop.jpg', 'https://assets.bugatti.com/fileadmin/user_upload/Web/Pages/Chiron_2017/images/bugatti-chiron-leather.jpg', 'Bugatti Chiron', 'sedan', 560, 12, 10, 600, 450, 'si', 'trasera', 'bugatti', '2009-06-10', 300000, '2017-12-13 09:05:28', '2017-12-13 09:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `coche_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `coche_id`, `user`, `email`, `ip`, `text`, `approved`, `created_at`, `updated_at`) VALUES
(1, 8, 'AntonioMoyaSanchez', 'dreykerv7@gmail.com', '127.0.0.1', 'Tony es especial', 1, '2017-12-10 19:52:14', '2017-12-10 19:52:14'),
(2, 3, 'manolitogafotas', 'manolo@gmail.com', '127.0.0.1', 'ererererer', 1, '2017-12-12 21:49:15', '2017-12-12 21:49:15'),
(3, 9, 'manoloo', 'manolo@gmail.com', '127.0.0.1', 'Me a gustado el coche aunque podria ser un poquito mas rapido', 1, '2017-12-13 08:26:26', '2017-12-13 08:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombrecontacto` text NOT NULL,
  `emailcontacto` text NOT NULL,
  `telefonocontacto` int(11) DEFAULT NULL,
  `mensajecontacto` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacto`
--

INSERT INTO `contacto` (`id`, `nombrecontacto`, `emailcontacto`, `telefonocontacto`, `mensajecontacto`, `created_at`, `updated_at`) VALUES
(4, 'antonio', 'pene@gmail.com', 0, '9eijfijfirjfirjifjriforjfijrifjr', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Olivia', 'olivia2@gmail.com', 0, 'me gustaria que fuera mas amplio la zona de lista de coches', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'manolo', 'rayzzerv7@gmail.com', 0, 'vaia vaia la caballa', '2017-12-12 20:28:17', '2017-12-12 20:28:17'),
(7, 'erer', 'erer@gmail.com', 0, 'dhewohdiowh', '2017-12-12 20:30:19', '2017-12-12 20:30:19'),
(8, 'prueba', 'prueba@gmail.com', 0, 'manoloooooo', '2017-12-12 21:01:56', '2017-12-12 21:01:56'),
(9, 'manoloooo', 'manol1o@gmail.com', 0, 'nehruehreuirh', '2017-12-12 21:02:24', '2017-12-12 21:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'rayzzerv7', 'rayzzerv7@gmail.com', '$2y$10$caQD7k3RGMY2q1dv5B5uZOKNLeMi/rIB7vMCzdNmxypUdo8d/9.3C', '2017-12-10 18:49:26', '2017-12-10 18:49:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coche`
--
ALTER TABLE `coche`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coche`
--
ALTER TABLE `coche`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
