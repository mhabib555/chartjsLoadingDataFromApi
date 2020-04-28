-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2020 at 07:33 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test3`
--

-- --------------------------------------------------------

--
-- Table structure for table `crimedata`
--

DROP TABLE IF EXISTS `crimedata`;
CREATE TABLE IF NOT EXISTS `crimedata` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crime` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `crimedata`
--

INSERT INTO `crimedata` (`id`, `crime`, `year`, `location`) VALUES
(1, 'Murder', '2001', 'New York'),
(2, 'Rape', '2002', 'New York'),
(3, 'Murder', '2002', 'London'),
(4, 'Rape', '2001', 'London'),
(5, 'Murder', '2003', 'New York'),
(6, 'Murder', '2002', 'London'),
(7, 'Kidnapping', '2002', 'New Yor'),
(8, 'Kidnapping', '2003', 'London');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
