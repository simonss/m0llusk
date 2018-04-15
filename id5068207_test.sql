-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 13, 2018 at 01:55 PM
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

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `googlelogin_insert`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `googlelogin_insert` (IN `name` VARCHAR(255), IN `usertype` VARCHAR(255), IN `googleid` VARCHAR(255))  INSERT INTO googlelogin (email, googleid, usertype)
VALUES (name, googleid, usertype)$$

DROP PROCEDURE IF EXISTS `login_insert_business`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `login_insert_business` (IN `name` VARCHAR(255), IN `password` VARCHAR(255), IN `usertype` VARCHAR(255), IN `businessname` ENUM('tavakasutaja','arikasutaja'), IN `placename` VARCHAR(255), IN `regcode` VARCHAR(255))  INSERT INTO login (name, password, usertype, businessname, placename, regcode) 
VALUES (name, password, usertype, businessname, placename, regcode)$$

DROP PROCEDURE IF EXISTS `login_insert_normal`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `login_insert_normal` (IN `name` VARCHAR(255), IN `password` VARCHAR(255), IN `usertype` ENUM('tavakasutaja','arikasutaja'))  INSERT INTO login (name, password, usertype)
VALUES (name, password, usertype)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `googlelogin`
--

DROP TABLE IF EXISTS `googlelogin`;
CREATE TABLE IF NOT EXISTS `googlelogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `googleid` varchar(255) NOT NULL,
  `usertype` enum('tavakasutaja','arikasutaja') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `googlelogin`
--

INSERT INTO `googlelogin` (`id`, `email`, `googleid`, `usertype`) VALUES
(2, 'kroonrenee9@gmail.com', '101585104705562313308', 'tavakasutaja');

-- --------------------------------------------------------

--
-- Stand-in structure for view `googlelogin_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `googlelogin_view`;
CREATE TABLE IF NOT EXISTS `googlelogin_view` (
`id` int(11)
,`email` varchar(255)
,`googleid` varchar(255)
,`usertype` enum('tavakasutaja','arikasutaja')
);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `usertype` enum('tavakasutaja','arikasutaja') COLLATE utf8_estonian_ci NOT NULL,
  `businessname` varchar(255) COLLATE utf8_estonian_ci DEFAULT NULL,
  `placename` varchar(255) COLLATE utf8_estonian_ci DEFAULT NULL,
  `regcode` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `password`, `usertype`, `businessname`, `placename`, `regcode`) VALUES
(1, 'k@k.k', 'kkkkkk', 'tavakasutaja', NULL, NULL, NULL),
(2, 'test@kek.com', 'peeter', 'arikasutaja', 'kek', 'test', 696969),
(3, 'm@h.l', 'asdfgh', 'tavakasutaja', NULL, NULL, NULL),
(4, 'a@b.c', '123456', 'arikasutaja', 'def', 'abc', 456),
(5, 'f@f.f', '1234567', 'arikasutaja', 'test', 'mees', 251815),
(6, 'r@k.l', '789456', 'arikasutaja', 'def', 'abc', 123),
(7, 'kroonrenee9@gmail.com', '123456', 'tavakasutaja', NULL, NULL, NULL),
(8, 'protseduuritest', 'hmm', 'tavakasutaja', NULL, NULL, NULL),
(9, 'a@b.hh', '123456', 'tavakasutaja', NULL, NULL, NULL),
(10, 'seitse@kuus.viis', '7777777', 'arikasutaja', '', 'toidukoht7', 7);

-- --------------------------------------------------------

--
-- Stand-in structure for view `login_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `login_view`;
CREATE TABLE IF NOT EXISTS `login_view` (
`id` int(11)
,`name` varchar(255)
,`password` varchar(255)
,`usertype` enum('tavakasutaja','arikasutaja')
,`businessname` varchar(255)
,`placename` varchar(255)
,`regcode` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `toidud_tallinn`
--

DROP TABLE IF EXISTS `toidud_tallinn`;
CREATE TABLE IF NOT EXISTS `toidud_tallinn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toidunimi` varchar(255) NOT NULL,
  `hind` varchar(255) NOT NULL,
  `toidukoht` varchar(255) NOT NULL,
  `lisainfo` varchar(255) NOT NULL,
  `hinnang` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toidud_tallinn`
--

INSERT INTO `toidud_tallinn` (`id`, `toidunimi`, `hind`, `toidukoht`, `lisainfo`, `hinnang`) VALUES
(1, 'toit1', '1.2', 'koht 1', 'pole infot', '123'),
(2, 'toit2', '2.5', 'koht 2', 'on info', '456');

-- --------------------------------------------------------

--
-- Stand-in structure for view `toidud_tallinn_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `toidud_tallinn_view`;
CREATE TABLE IF NOT EXISTS `toidud_tallinn_view` (
`toidunimi` varchar(255)
,`toidukoht` varchar(255)
,`hind` varchar(255)
,`lisainfo` varchar(255)
,`hinnang` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `toidud_tartu`
--

DROP TABLE IF EXISTS `toidud_tartu`;
CREATE TABLE IF NOT EXISTS `toidud_tartu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `toidunimi` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `hind` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `toidukoht` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `lisainfo` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  `hinnang` varchar(255) COLLATE utf8_estonian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

--
-- Dumping data for table `toidud_tartu`
--

INSERT INTO `toidud_tartu` (`id`, `toidunimi`, `hind`, `toidukoht`, `lisainfo`, `hinnang`) VALUES
(1, 'kook', '12', 'eitea', 'midafakki', '69'),
(2, 'praad', '123', 'kooli pagar test', 'see on test', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `toidud_tartu_view`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `toidud_tartu_view`;
CREATE TABLE IF NOT EXISTS `toidud_tartu_view` (
`toidunimi` varchar(255)
,`toidukoht` varchar(255)
,`hind` varchar(255)
,`lisainfo` varchar(255)
,`hinnang` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `googlelogin_view`
--
DROP TABLE IF EXISTS `googlelogin_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `googlelogin_view`  AS  select `googlelogin`.`id` AS `id`,`googlelogin`.`email` AS `email`,`googlelogin`.`googleid` AS `googleid`,`googlelogin`.`usertype` AS `usertype` from `googlelogin` ;

-- --------------------------------------------------------

--
-- Structure for view `login_view`
--
DROP TABLE IF EXISTS `login_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `login_view`  AS  select `login`.`id` AS `id`,`login`.`name` AS `name`,`login`.`password` AS `password`,`login`.`usertype` AS `usertype`,`login`.`businessname` AS `businessname`,`login`.`placename` AS `placename`,`login`.`regcode` AS `regcode` from `login` ;

-- --------------------------------------------------------

--
-- Structure for view `toidud_tallinn_view`
--
DROP TABLE IF EXISTS `toidud_tallinn_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `toidud_tallinn_view`  AS  select `toidud_tallinn`.`toidunimi` AS `toidunimi`,`toidud_tallinn`.`toidukoht` AS `toidukoht`,`toidud_tallinn`.`hind` AS `hind`,`toidud_tallinn`.`lisainfo` AS `lisainfo`,`toidud_tallinn`.`hinnang` AS `hinnang` from `toidud_tallinn` ;

-- --------------------------------------------------------

--
-- Structure for view `toidud_tartu_view`
--
DROP TABLE IF EXISTS `toidud_tartu_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `toidud_tartu_view`  AS  select `toidud_tartu`.`toidunimi` AS `toidunimi`,`toidud_tartu`.`toidukoht` AS `toidukoht`,`toidud_tartu`.`hind` AS `hind`,`toidud_tartu`.`lisainfo` AS `lisainfo`,`toidud_tartu`.`hinnang` AS `hinnang` from `toidud_tartu` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
