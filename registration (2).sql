-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2014 at 08:45 AM
-- Server version: 5.5.35-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iflbmc_iflbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `program_name` varchar(255) NOT NULL,
  `program_date` date NOT NULL,
  `venue` text NOT NULL,
  `participant_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `organization` varchar(255) NOT NULL,
  `organization_address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `office_number` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `resident_no` varchar(20) NOT NULL,
  `resposibility` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Id`, `program_name`, `program_date`, `venue`, `participant_name`, `designation`, `organization`, `organization_address`, `phone`, `office_number`, `email`, `resident_no`, `resposibility`, `event_id`) VALUES
(1, 'Financial & Analytical Tools for Decision Making & Problem Solving', '0000-00-00', '<p>Mumbai</p>', 'jlkj', 'jkljl', 'Web Touch', 'dc', '9798327498237', '', 'vilas@wtouch.in', '', 'Production,Marketing,HRD', 1),
(2, 'FINANCE FOR DECISION MAKING (For Non Finance Managers)', '0000-00-00', '<p>PUNE</p>\r\n<p>JAKARTA</p>\r\n<p>DUBAI</p>', 'vilas', 'web developer', 'Web Touch', 'ljldkjlk', '34343', '4343', 'vilas@wtouch.in', 'fd', 'Production,Marketing,HRD', 2),
(3, 'Financial Analysis for Non-financial Managers', '0000-00-00', '<div style="display: inline;">Pune at VITS HOTEL, </div>\r\n<div style="display: inline;">Balewadi, Bangalore Pune-Highway, Pune – 411045</div>', 'vilas', 'web developer', 'Cybage', 'Wadagaon Shery', '9049508514', '6', 'vilasshetkar@gmail.c', '-', 'Production', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
