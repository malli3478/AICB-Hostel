-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2015 at 02:51 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hostel`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `userID` varchar(10) NOT NULL,
  `pswd` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `userID` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`userID`, `pswd`, `email`, `name`) VALUES
('123pi123', 'fuck', '123@gmail.com', 'jj'),
('1PI12IS002', 'abhi123', 'abhi4pesit@gmail.com', 'Abhishek'),
('1PI12IS005', 'akarsh123', 'akarsh@mail.com', 'Akarsh'),
('akg', '1234567890', 'akg@user.com', 'Abhishek Kumar Gupta'),
('1PI12IS010', 'akshay123', 'akshay@mail.com', 'Akshay'),
('PB002', 'emp2123', 'demo2', 'Emp2'),
('demo1', 'demopass1', 'demoid', 'Demo 1'),
('1PI12IS051', '12345', 'malli3478@gmail.com', 'Mallikarjun'),
('1PI12IS058', 'mdg123', 'mdg@gmail.com', 'Ghazanfar'),
('1PI12EE066', 'malik@love', 'Mohit.msr93@yahoo.in', 'Mohit Raj'),
('1PI12IS070', 'pakku123', 'pakshal@mail.com', 'Pakshal'),
('1PI12CS114', '123456', 'pavan@gmail.com', 'Pavan'),
('1PI14EC418', 'santu', 'santu.chavan111@gmail.com', 'Santosh'),
('1PI12IS122', '123456', 'vaibhav@gmail.com', 'Vaibhav'),
('1PI12IS123', 'vijay123', 'vijay@mail.com', 'Vijay');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usn` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `complaint` varchar(2048) NOT NULL,
  `type` varchar(30) NOT NULL,
  `block` varchar(20) NOT NULL,
  `room` int(5) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `usn`, `name`, `complaint`, `type`, `block`, `room`, `date`) VALUES
(1, '1PI12IS051', 'Mallikarjun', 'Fan not working', 'Electrical complaint', 'Mess block', 404, '2015-04-22 00:00:00'),
(5, '1PI14EC418', 'Santosh', '1st bath room - latch broken.', 'Plumber', 'MM Block', 505, '2015-04-23 11:28:57'),
(7, '1PI14EC418', 'Santosh', 'Fan is so fast wenter session so could plz check fan motor ', 'Electrical', 'MM Block', 505, '2015-04-23 12:39:23'),
(16, '1PI12IS002', 'Abhishek', 'Hhdtuhxx', 'Carpenter', 'New Block', 10, '2015-04-25 01:29:38');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
