-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2014 at 02:22 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `workshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `start_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `topics` text NOT NULL,
  `venue` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `brochure` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `objective` text NOT NULL,
  `who_attend` text NOT NULL,
  `tools` text NOT NULL,
  `registration` text NOT NULL,
  `metakey` text NOT NULL,
  `metadescription` text NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `start_date`, `end_date`, `topics`, `venue`, `image`, `brochure`, `description`, `objective`, `who_attend`, `tools`, `registration`, `metakey`, `metadescription`, `status`) VALUES
(1, 'Changed Trial to Not Trial', '20/01/2014', '25/01/2014', '<p>10:00 AM</p>', '<p>Park Street Pune</p>', '', '', '<p>This is trial description about event &amp; seminar.</p>\r\n<ul>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n</ul>', '<h3>Objectives</h3>\r\n<ul>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n</ul>', '<h3>Who Should Attend</h3>\r\n<ul>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n</ul>', '<h3>Module Name: One</h3>\r\n<ul>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n</ul>\r\n<h3>Module Name: Two</h3>\r\n<ul>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n</ul>\r\n<h3>Module Name: Three</h3>\r\n<ul>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n</ul>', '', 'This is updated meta key', 'this is description', '1'),
(2, 'trial event name', '20/01/2014', '25/01/2014', '10:00 AM', 'Park Street Pune', '/images/logo.png', '/images/brochure.pdf', 'This is trial description about event & seminar.\r\n<ul>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n</ul>\r\n', '<h3>Objectives</h3>\r\n<ul>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n</ul>\r\n', '<h3>Who Should Attend</h3>\r\n<ul>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n</ul>\r\n', '<h3>Module Name: One</h3>\r\n<ul>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n</ul>\r\n<h3>Module Name: Two</h3>\r\n<ul>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n</ul>\r\n<h3>Module Name: Three</h3>\r\n<ul>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n</ul>\r\n', '', '', '', '1'),
(3, 'trial event name', '20/01/2014', '25/01/2014', '10:00 AM', 'Park Street Pune', '/images/logo.png', '/images/brochure.pdf', 'This is trial description about event & seminar.\r\n<ul>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n</ul>\r\n', '<h3>Objectives</h3>\r\n<ul>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n</ul>\r\n', '<h3>Who Should Attend</h3>\r\n<ul>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n<li>Event</li>\r\n</ul>\r\n', '<h3>Module Name: One</h3>\r\n<ul>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n</ul>\r\n<h3>Module Name: Two</h3>\r\n<ul>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n</ul>\r\n<h3>Module Name: Three</h3>\r\n<ul>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n<li>Modul name</li>\r\n</ul>\r\n', '', '', '', '1'),
(4, 'This is seminar title', '06-02-2014', '06-02-2014', '<p>This is topics</p>\r\n<ul>\r\n<li>one</li>\r\n<li>two</li>\r\n<li>three</li>\r\n</ul>', '<p>IFLBM, Park Street</p>\r\n<p>Pune</p>', '', '', '<p>This general Description.</p>', '<p>objectives </p>\r\n<ul>\r\n<li><span style="line-height: 1.3em;">jlfksdj;fsdf</span></li>\r\n<li><span style="line-height: 1.3em;">fsdf</span></li>\r\n</ul>', '<p>Who should attend?</p>\r\n<p>Any can attend</p>', '<p>Tools &amp; Methods</p>\r\n<ul>\r\n<li>tool 1</li>\r\n<li>tool 2</li>\r\n<li>tool 3</li>\r\n</ul>', '<p><strong>Register: </strong>www.iflbm.com</p>\r\n<p><strong>Fee : </strong>5000/-</p>', '', '', '1'),
(5, 'This is seminar title', '06-02-2014', '', '<p>This is topics</p>\r\n<ul>\r\n<li>one</li>\r\n<li>two</li>\r\n<li>three</li>\r\n</ul>', '<p>tHIS IS VENUE DETAILS</p>', '', '', '<p>tHIS IS Description DETAILS</p>', '<p>objectives </p>\r\n<p>jlfksdj;fsdf</p>\r\n<p>fsdf</p>', '', '<p>Tools &amp; Methods</p>\r\n<ul>\r\n<li>tool 1</li>\r\n<li>tool 2</li>\r\n<li>tool 3</li>\r\n</ul>', '', '', '', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
