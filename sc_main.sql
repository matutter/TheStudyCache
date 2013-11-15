-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 15, 2013 at 05:08 AM
-- Server version: 5.6.14
-- PHP Version: 5.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sc_main`
--

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `uid` varchar(40) NOT NULL,
  `pid` int(11) NOT NULL,
  `up` int(11) NOT NULL DEFAULT '1',
  `down` int(11) NOT NULL DEFAULT '1',
  `uidUP` longtext,
  `uidDOWN` longtext,
  UNIQUE KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`uid`, `pid`, `up`, `down`, `uidUP`, `uidDOWN`) VALUES
('mat', 25, 5, 6, '.', '.mat.'),
('mat', 26, 4, 3, '.mat.', '.');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `title` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `instructor` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `username` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `path` (`path`,`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`title`, `subject`, `type`, `instructor`, `class`, `description`, `path`, `id`, `date`, `username`) VALUES
('test', 'test', 'test', 'test', 'test', '1', 'uploads\\3908class calendar.PNG', 25, '2013-11-14', 'mat'),
('test', 'test', 'test', 'test', 'test', 'asd', 'uploads\\4884Picture1.png', 26, '2013-11-14', 'mat');

--
-- Triggers `upload`
--
DROP TRIGGER IF EXISTS `copy_pid`;
DELIMITER //
CREATE TRIGGER `copy_pid` AFTER INSERT ON `upload`
 FOR EACH ROW BEGIN

INSERT INTO sc_main.rating (uid, pid, uidUP, uidDOWN) VALUES (NEW.username, NEW.id, ".", ".");

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, '1', '1', '1'),
(40, '40', '40', '454'),
(42, 'mat', '4a258d930b7d3409982d727ddbb4ba88', 'mat@mat.com'),
(43, 'matt', 'ce86d7d02a229acfaca4b63f01a1171b', 'matt@matt.com'),
(44, 'asdf', '912ec803b2ce49e4a541068d495ab570', 'asdf@asdf.asdf'),
(45, 'asdff', '277f255555a1e4ff124bdacc528b815d', 'asdff@asdff.asdff'),
(46, 'greg', '149603e6c03516362a8da23f624db945', 'old@grag.com'),
(47, 'mart', '1722a28089f91b73fff8708c26800a5e', 'mart@mart.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
