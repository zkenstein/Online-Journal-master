-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2014 at 04:03 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  `username` varchar(65) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(65) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `color` int(11) NOT NULL DEFAULT '1',
  `lparameter` tinyint(1) NOT NULL,
  `profile` varchar(65) NOT NULL DEFAULT 'notup.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `username`, `password`, `email`, `phoneno`, `color`, `lparameter`, `profile`) VALUES
(41, 'Suman sahu', 'ak47', '1533c67e5e70ae7439a9aa993d6a3393', 'sumansahu95@gmail.com', '9583364972', 1, 1, 'ea9109507cacd8e2f2aefc'),
(46, 'Ashish', 'ash.vtol', '71125d3722747995897578ea2fc62d4a', 'ash.vtol@gmail.com', '9434982041', 1, 1, 'DSCN1093.JPG'),
(47, 'Pritish', 'prish', '25d7ffd1557b565b27450d9c5b78735b', 'priish1994@gmail.com', '9583422219', 2, 1, '56d3d6fa748ab6d9af3fd7'),
(48, 'Chinmaya', 'cd', 'd0c17ae1f6fae5ae0fd85e3ec60a7777', 'chinmaydehury@gmail.com', '9090876421', 1, 1, 'notup.jpg'),
(49, 'Aman Mishra', 'am94', 'ccda1683d8c97f8f2dff2ea7d649b42c', 'amanmishra94@gmail.com', '9438859687', 1, 1, 'ded88f18ecee47145a72c0'),
(51, 'Siddhartha', 'sid', 'b8c1a3069167247e3503f0daba6c5723', 'siddarthamajhi.54@gmail.com', '8280020291', 1, 1, 'notup.jpg'),
(53, 'Sidhanta Choudhury', 'nilusilu95', '947ef4b375fdc9f699bed09b1e9cf28a', 'nilusilu95@gmail.com', '9439590041', 1, 1, '1452380_697766240233413_1776015901_n.jpg'),
(54, 'SACHIDANANDA MAHARANA', 'bond', 'e10adc3949ba59abbe56e057f20f883e', 'sachi.maharana@gmail.com', '9437772480', 2, 1, 'notup.jpg'),
(55, 'SACHIN ', 'sachu', '7e02367989e70a37b2214478c41c4d75', 'sachurocks96@gmail.comch', '8260919217', 3, 1, 'b90ce0268229151c9bde11');

-- --------------------------------------------------------

--
-- Table structure for table `querytable`
--

CREATE TABLE IF NOT EXISTS `querytable` (
  `name` varchar(40) NOT NULL DEFAULT 'Unknown',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `querytable`
--

INSERT INTO `querytable` (`name`, `query`) VALUES
('sachin', 'this a query from sachin sahu\r\n\r\nthis is a fucking query \r\n\r\n\r\nbeleive it or not'),
('SACHIN', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE IF NOT EXISTS `user_data` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(30) NOT NULL,
  `title` text NOT NULL,
  `data` longblob NOT NULL,
  PRIMARY KEY (`article_id`),
  UNIQUE KEY `article_id` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `article_id`, `date`, `title`, `data`) VALUES
(48, 10, '16 March, 2014', 'test 16', 0x3c703e67687364676b3c2f703e0d0a),
(41, 11, '11 March, 2014', 'party with CD', 0x3c703e486164206120776f6e64657266756c2070617274792077697468206368696e6d617961206465687572792e2e2e2e3c2f703e0d0a0d0a3c703e4974207761732061206e696365206f6e652e2e2e3c2f703e0d0a),
(41, 13, '24 March, 2014', 'hello', 0x3c703e68696e676c676e666a6e6266646f626e6664626e64666f73627375626f626e6f66736462626e736f6664623c2f703e0d0a);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
