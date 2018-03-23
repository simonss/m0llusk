-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2018 at 11:12 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id5068207_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `password`) VALUES
(1, 'kroon@lh.s', 'qwerty'),
(3, 'm@h.l', 'asdfg');

-- --------------------------------------------------------

--
-- Table structure for table `toidud`
--

DROP TABLE IF EXISTS `toidud`;
CREATE TABLE IF NOT EXISTS `toidud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toidunimi` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `hind` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `toidukoht` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `lisainfo` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `hinnang` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `toidud`
--

INSERT INTO `toidud` (`id`, `toidunimi`, `hind`, `toidukoht`, `lisainfo`, `hinnang`) VALUES
(1, 'kook', '12', 'eitea', 'midafakki', '69'),
(2, 'praad', '123', 'kooli pagar test', 'see on test', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
