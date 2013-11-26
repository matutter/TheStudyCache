-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2013 at 01:25 PM
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
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `uid` varchar(45) NOT NULL,
  `comment` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `pid`, `uid`, `comment`, `time`) VALUES
(3, 44, 'mat', 'rtfgopujhk', '2013-11-24 14:28:41'),
(4, 35, 'mat', 'lklk\n', '2013-11-24 15:15:15'),
(5, 35, 'mat', 'lklk\n;;', '2013-11-24 15:15:22'),
(6, 35, 'mat', 'iguigig', '2013-11-24 15:32:15'),
(7, 35, 'mat', 'asdasd', '2013-11-24 15:34:35'),
(8, 35, 'mat', 'fsdzluikjbaweriolugasdfioluagweriougaoiwufffuckyouadam\n', '2013-11-24 15:38:34'),
(9, 35, 'mat', 'rerer', '2013-11-24 15:46:55'),
(10, 43, 'mat', 'omg you so smart!', '2013-11-24 16:07:37'),
(11, 43, 'mat', 'dsdfs\n', '2013-11-24 16:10:03'),
(12, 43, 'mat', 'dfgdfg\n', '2013-11-24 16:10:54'),
(13, 43, 'mat', 'dfgdfg\n\n', '2013-11-24 16:10:58'),
(14, 43, 'mat', 'dfgdfg\n\n', '2013-11-24 16:10:59'),
(15, 43, 'mat', 'dfgdfg\n\n\n', '2013-11-24 16:11:00'),
(16, 43, 'mat', 'ghjghjghj\n', '2013-11-24 16:12:14'),
(17, 43, 'mat', 'kljkljkl\n', '2013-11-24 16:13:07'),
(18, 43, 'mat', 'kljkljkl\n\n', '2013-11-24 16:13:28'),
(19, 43, 'mat', 'kljkljkl\n\n\n', '2013-11-24 16:13:31'),
(20, 43, 'mat', 'kljkljkl\n\n\n\n', '2013-11-24 16:13:31'),
(21, 43, 'mat', 'ghjghj\n', '2013-11-24 16:14:24'),
(22, 43, 'mat', 'rertret\n', '2013-11-24 16:15:19'),
(23, 43, 'mat', 'hjk\n', '2013-11-24 16:23:57'),
(33, 44, 'matt', 'dfgdfg', '2013-11-24 16:44:00'),
(34, 44, 'greg2', 'fgh', '2013-11-24 17:50:57'),
(35, 44, 'greg2', 'hjhj\n', '2013-11-24 17:51:18'),
(36, 47, 'greg2', 'sup', '2013-11-24 18:05:01'),
(37, 47, 'greg2', 'ui', '2013-11-24 18:05:54'),
(38, 47, 'greg2', 'fgrt', '2013-11-24 18:06:52'),
(39, 47, 'greg2', 'yu', '2013-11-24 18:18:25'),
(40, 47, 'greg2', 'tyur', '2013-11-24 18:18:30'),
(41, 47, 'greg2', 'ty', '2013-11-24 18:18:33'),
(42, 47, 'greg2', 'io', '2013-11-24 18:32:53'),
(43, 47, 'greg2', 'uoiuio', '2013-11-24 18:32:57'),
(44, 47, 'greg2', 'we', '2013-11-24 18:34:38'),
(45, 47, 'greg2', 'we', '2013-11-24 18:34:48'),
(46, 47, 'greg2', 'last', '2013-11-24 18:36:17'),
(47, 47, 'greg2', 'weqwe', '2013-11-24 18:36:35'),
(48, 47, 'greg2', 'erwer', '2013-11-24 18:36:56'),
(49, 47, 'greg2', 'rtert', '2013-11-24 18:44:00'),
(50, 47, 'greg2', 'we', '2013-11-24 18:45:53'),
(51, 47, 'greg2', 'we', '2013-11-24 18:46:10'),
(52, 48, 'greg2', 'weqwe', '2013-11-24 19:20:54'),
(53, 48, 'greg2', 'erer', '2013-11-24 19:21:08'),
(54, 48, 'greg2', 'wer', '2013-11-24 19:24:40'),
(55, 47, 'greg2', 'fgdfg', '2013-11-24 20:06:23'),
(56, 30, 'greg2', 'ertert', '2013-11-24 21:27:32'),
(57, 30, 'greg2', 'ertert', '2013-11-24 21:27:36'),
(58, 50, 'mat', 'sfsdf', '2013-11-25 01:02:50'),
(59, 49, 'mat', 'asdasd', '2013-11-25 01:09:17'),
(60, 36, 'mat', 'qwewqe', '2013-11-25 01:09:28'),
(66, 50, 'mat', 'adasd', '2013-11-25 01:49:46'),
(67, 50, 'mat', 'asdasd', '2013-11-25 01:49:50'),
(68, 50, 'mat', 'asdasd', '2013-11-25 01:49:52'),
(71, 44, 'mat', 'fghfgh', '2013-11-25 01:52:01'),
(73, 44, 'mat', 'ad', '2013-11-25 01:56:23'),
(74, 30, 'mat', 'wow awesome slides!', '2013-11-25 01:57:06');

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
('mat', 25, 6, 6, '.matt.', '.mat.'),
('mat', 26, 5, 3, '.mat.matt.', '.'),
('mat', 27, 2, 2, '.matt.', '.mat.'),
('matt', 28, 1, 1, '.', '.'),
('matt', 29, 2, 2, '.mat.', '.'),
('matt', 30, 3, 2, '.mat.', '.'),
('matt', 31, 1, 1, '.', '.'),
('matt', 32, 3, 3, '.', '.mat.'),
('matt', 33, 1, 1, '.', '.'),
('mat', 34, 3, 3, '.', '.mat.'),
('mat', 35, 3, 4, '.', '.mat.'),
('mat', 36, 4, 4, '.', '.mat.'),
('mat', 37, 1, 1, '.', '.'),
('mat', 38, 1, 1, '.', '.'),
('mat', 39, 1, 1, '.', '.'),
('mat', 40, 1, 1, '.', '.'),
('mat', 41, 1, 1, '.', '.'),
('mat', 42, 1, 2, '.', '.mat.'),
('mat', 43, 1, 2, '.', '.mat.'),
('mat', 44, 1, 2, '.', '.mat.'),
('mat', 45, 1, 1, '.', '.'),
('mat', 46, 1, 2, '.', '.mat.'),
('greg2', 47, 1, 1, '.', '.'),
('greg2', 48, 1, 2, '.', '.mat.'),
('greg2', 49, 1, 2, '.', '.mat.'),
('mat', 50, 1, 2, '.', '.mat.'),
('mat', 51, 1, 1, '.', '.');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=52 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`title`, `subject`, `type`, `instructor`, `class`, `description`, `path`, `id`, `date`, `username`) VALUES
('test', 'test', 'test', 'test', 'test', '1', 'uploads\\3908class calendar.PNG', 25, '2013-11-14', 'mat'),
('test', 'test', 'test', 'test', 'test', 'asd', 'uploads\\4884Picture1.png', 26, '2013-11-14', 'mat'),
('anti virus 101', 'NCS', 'walkthrough', 'none', 'none', 'a walkthrough on using MSSE', 'uploads\\3773anti virus cropeed.png', 29, '2013-11-17', 'matt'),
('MVPP', 'Computer Science', 'pdf', 'Amos', 'Software Engineering', 'Some pdf from this class', 'uploads\\266601_MVPP_CAP.pdf', 30, '2013-11-17', 'matt'),
('test', 'test', 'test', 'test', 'test', 'dfgdfg', 'uploads\\239A wallpaper reddit will love Abstract Bacon - Imgur.jpg', 32, '2013-11-18', 'matt'),
('test', 'test', 'test', 'test', 'test', 'sdf', 'uploads\\3594void_sector_by_kuldarleement-d6lhcdc.jpg', 35, '2013-11-18', 'mat'),
('test', 'test', 'test', 'test', 'test', 'fghfghfgh', 'uploads\\2393stellar_collision_by_kuldarleement-d6kvnyd.jpg', 36, '2013-11-18', 'mat'),
('test', 'test', 'test', 'test', 'test', 'yu', 'uploads\\360oneColLiqCtrHdr.css', 42, '2013-11-21', 'mat'),
('test', 'test', 'test', 'test', 'test', 'ty', 'uploads\\2659ghp1_strctr.h', 43, '2013-11-21', 'mat'),
('test', 'test', 'test', 'test', 'test', 'asd', 'uploads\\3717tinybannerw.jpg', 44, '2013-11-23', 'mat'),
('test', 'test', 'test', 'test', 'test', 'df', 'uploads\\1869slide-01.jpg', 45, '2013-11-24', 'mat'),
('test', 'test', 'test', 'test', 'test', 'sd', 'uploads\\193tinybannerw.jpg', 46, '2013-11-24', 'mat'),
('test', 'test', 'test', 'test', 'test', 'dsfgg', 'uploads\\1099studylogo.png', 47, '2013-11-24', 'greg2'),
('test', 'test', 'test', 'test', 'test', 'we', 'uploads\\3456www.w3schools.com.txt', 48, '2013-11-24', 'greg2'),
('test', 'test', 'test', 'test', 'test', 'qweqwe', 'uploads\\277t1Spring2013.docx', 49, '2013-11-25', 'greg2'),
('test', 'test', 'test', 'test', 'test', 'morning star\r\n', 'uploads\\3490the_morning_star_2560x1440.jpg', 50, '2013-11-25', 'mat'),
('www.w3schools.com', 'schools', 'www', 'internet', 'none', 'adasdasdsadwerwer', 'uploads\\714www.w3schools.com.txt', 51, '2013-11-25', 'mat');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=167 ;

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
(47, 'mart', '1722a28089f91b73fff8708c26800a5e', 'mart@mart.com'),
(48, 'mattt', '39a18d28cc35066115fb102752c5033c', 'mattt@mat.com'),
(49, 'mak', '9c3280cc9557712aa6900443e4b92e57', 'mak@mak.com'),
(51, '111111', 'e3ceb5881a0a1fdaad01296d7554868d', 'email'),
(55, 'asd', '7815696ecbf1c96e6894b779456d330e', 'asd'),
(59, 'asdasd', '7815696ecbf1c96e6894b779456d330e', 'asd'),
(62, '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(67, 's', '03c7c0ace395d80182db07ae2c30f034', 's'),
(68, 'd', '03c7c0ace395d80182db07ae2c30f034', 'a'),
(73, 'dasdasd', '196b0f14eba66e10fba74dbf9e99c22f', 'sad'),
(94, 'asdasdasdasd', '7815696ecbf1c96e6894b779456d330e', 'asd'),
(95, 'sadfasdf', '6a204bd89f3c8348afd5c77c717a097a', 'asdfasdf'),
(104, 'sadfasdff', '6a204bd89f3c8348afd5c77c717a097a', 'asdfasdfffff'),
(109, 'asdfdddd', '912ec803b2ce49e4a541068d495ab570', 'asdf'),
(111, 'daa', '912ec803b2ce49e4a541068d495ab570', 'asdf'),
(112, 'xxx', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 'xxx'),
(114, 'xxxxxx', 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 'xxxxxx'),
(115, 'xxxxxxwe', 'd935041ac7aed71ffa082e0efeb90bf9', 'xxxxxxwe'),
(116, 'xxxxxxwewe', 'd935041ac7aed71ffa082e0efeb90bf9', 'xxxxxxwew'),
(117, 'q', '7694f4a66316e53c8cdd9d9954bd611d', 'q'),
(118, 'qw', '7694f4a66316e53c8cdd9d9954bd611d', 'qw'),
(119, 'qweqwe', 'efe6398127928f1b2e9ef3207fb82663', 'eqwe'),
(120, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'qweqwe'),
(122, 'qwewwww', '76d80224611fc919a5d54f0ff9fba446', 'qwewwww'),
(123, 'qwewwwwddd', '76d80224611fc919a5d54f0ff9fba446', 'qwewwwwddd'),
(124, 'ww', '099b3b060154898840f0ebdfb46ec78f', 'ww'),
(125, 'weqweqwe', '28df1b2400f9f8a78c66b527bd54b254', 'qweqwe'),
(127, 'qweqwewwww', 'efe6398127928f1b2e9ef3207fb82663', 'qweqwewww'),
(128, 'ghghhgf', '3f8a4e2c502645140fafaea1b323b398', 'hfhh'),
(133, 'a', 'd41d8cd98f00b204e9800998ecf8427e', 's'),
(138, 'wqewqeweqqwe', 'ff95eeeb75449af069cb44a96a0cd8de', 'eqwweqweqweq'),
(146, 'wqewqeweqqwewee', 'ff95eeeb75449af069cb44a96a0cd8de', 'eqwweqweqweq'),
(147, 'qqqqwwweee', '2b9d4a5c5d9db174420824455c283260', 'qqqqwwweeee'),
(148, 'adsasd', '5858d286d1ebfa8a13a0676fd4ec0a89', 'dsaasd'),
(159, 'asdasdsasadsda', 'a8f5f167f44f4964e6c998dee827110c', 'asdasdasdasdasd'),
(160, 'dfasdf', '7914a2c0f48a09d25086f06de41cc12f', ''),
(162, 'aaa', '050641dae3041cdbbd37cc508e98e6ef', 'emaddd@ads.c'),
(164, 'fgsdsgfdfgd', 'e9ec7a76d28196257bcdeb27c9872cf6', 'sdgfdgf@sdffd.dfgfgd'),
(166, 'greg2', 'ea26b0075d29530c636d6791bb5d73f4', 'greg2@old.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
