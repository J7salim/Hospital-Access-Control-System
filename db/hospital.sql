-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2013 at 05:52 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `userid` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `staff` tinyint(4) NOT NULL DEFAULT '0',
  `doctor` tinyint(4) NOT NULL DEFAULT '0',
  `admission` tinyint(4) NOT NULL DEFAULT '0',
  `medical` tinyint(4) NOT NULL DEFAULT '0',
  `stocks` tinyint(4) NOT NULL DEFAULT '0',
  `bill` tinyint(4) NOT NULL DEFAULT '0',
  `patient` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`userid`, `admin`, `staff`, `doctor`, `admission`, `medical`, `stocks`, `bill`, `patient`) VALUES
(3, 1, 0, 0, 1, 1, 1, 1, 1),
(4, 0, 1, 0, 1, 0, 1, 0, 0),
(5, 0, 0, 1, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `emergency`
--

CREATE TABLE IF NOT EXISTS `emergency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientNumber` int(11) NOT NULL,
  `patientFirst` varchar(50) NOT NULL,
  `patientLast` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthDate` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `emergencyRoom` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `emergency`
--

INSERT INTO `emergency` (`id`, `patientNumber`, `patientFirst`, `patientLast`, `gender`, `birthDate`, `description`, `emergencyRoom`) VALUES
(1, 27750, 'R2hhcmlidQ==', 'V2FsZQ==', 'RmVtYWxl', 'MTEvMTIvMjAxMA==', 'VGVzdGluZyB1cGRhdGU=', 'Um9vbSAy');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `patientNumber` varchar(100) NOT NULL,
  `doctorCharge` varchar(100) NOT NULL,
  `admissionCharge` varchar(100) NOT NULL,
  `specialCare` varchar(100) NOT NULL,
  `treatmentCategory` varchar(100) NOT NULL,
  `serviceCharge` varchar(100) NOT NULL,
  `governmentTax` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`patientNumber`, `doctorCharge`, `admissionCharge`, `specialCare`, `treatmentCategory`, `serviceCharge`, `governmentTax`, `date`) VALUES
('27750', 'MjA=', 'NTA=', 'MzA=', 'NTA=', 'MjA=', 'NQ==', '2013-10-16 01:41:44'),
('828', 'NDA=', 'ODA=', 'NTA=', 'NzA=', 'NQ==', 'MA==', '2013-10-16 01:45:20'),
('8677', 'MTAw', 'MjAw', 'MTAw', 'MzA=', 'MjA=', 'NQ==', '2013-10-16 01:47:37'),
('13309', 'MjA=', 'NTA=', 'MzA=', 'NTA=', 'MjA=', 'NQ==', '2013-10-16 01:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE IF NOT EXISTS `medication` (
  `patientNumber` varchar(100) NOT NULL,
  `symptoms` text NOT NULL,
  `sickness` text NOT NULL,
  `condition` varchar(255) NOT NULL,
  `admit` varchar(100) NOT NULL,
  `specialcare` varchar(100) NOT NULL,
  `treated` text NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`patientNumber`, `symptoms`, `sickness`, `condition`, `admit`, `specialcare`, `treated`, `doctor`, `date`) VALUES
('27750', 'SGFlbGV3ZWtp', 'TWFsYXJpYQ==', 'Tm9ybWFs', 'WUVT', 'WUVT', 'SW5qZWN0aW9u', 'SnVtYWE=', '0000-00-00 00:00:00'),
('27750', 'VG9ubw==', 'UG9saW8=', 'QWJub3JtYWw=', 'Tk8=', 'Tk8=', 'UGFuYWRvbA==', 'V2FsYQ==', '0000-00-00 00:00:00'),
('27750', 'QW1la3VsYQ==', 'TWFsYXJpYQ==', 'RGVsaWNhdGU=', 'WUVT', 'WUVT', 'Tm90IHlldA==', 'QXdlYQ==', '0000-00-00 00:00:00'),
('27750', 'QWdhaW4=', 'UG9saW8=', 'Tm9ybWFs', 'Tk8=', 'Tk8=', 'UGFyYWNldGFtb2w=', 'SnVtYWE=', '0000-00-00 00:00:00'),
('27750', 'TXdpc2hv', 'VGVz', 'Tm9ybWFs', 'Tk8=', 'Tk8=', 'YXNhc2E=', 'V2FsYQ==', '0000-00-00 00:00:00'),
('27750', 'SGF0YQ==', 'SGF0YQ==', 'RGVsaWNhdGU=', 'Tk8=', 'Tk8=', 'SGF0YQ==', 'SnVtYWE=', '2013-10-15 20:25:40'),
('828', 'U3VyZ2ljYWw=', 'U3VyZ2ljYWw=', 'Tm9ybWFs', 'Tk8=', 'Tk8=', 'U3VyZ2ljYWw=', 'SnVtYWE=', '2013-10-15 21:03:39'),
('8677', 'TGF0aXBoYQ==', 'TGF0aXBoYQ==', 'QWJub3JtYWw=', 'WUVT', 'WUVT', 'TGF0aXBoYQ==', 'TGF0aXBoYQ==', '2013-10-15 21:09:22'),
('13309', 'VW5rbm93biBwYXRpZW50', 'TWFsYXJpYQ==', 'Tm9ybWFs', 'WUVT', 'WUVT', 'Tm9ybWFs', 'SnVtYWE=', '2013-10-15 21:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `observation`
--

CREATE TABLE IF NOT EXISTS `observation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientNumber` int(11) NOT NULL,
  `patientFirst` varchar(50) NOT NULL,
  `patientLast` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthDate` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `observationRoom` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `observation`
--

INSERT INTO `observation` (`id`, `patientNumber`, `patientFirst`, `patientLast`, `gender`, `birthDate`, `description`, `observationRoom`) VALUES
(1, 8677, 'SnVtYWE=', 'U2FsaW0=', 'TWFsZQ==', 'MTEvMTIvMjAxMA==', 'VXBkYXRpbmcgdGVzdGluZw==', 'Um9vbSAy');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `batchid` varchar(100) NOT NULL,
  `drugname` varchar(100) NOT NULL,
  `drugtype` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `expired` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `batchid`, `drugname`, `drugtype`, `quantity`, `expired`, `price`) VALUES
(4, 'MTg0MDM=', 'UGFuYWRvbA==', 'Tm9ybWFs', 'NDM=', 'MTEvMTIvMjAxMA==', 'Uk0gMjU='),
(5, 'MTIz', 'UGFyYWNldGFtb2xvbG8=', 'QW50aS1CaW90aWM=', 'MQ==', 'MTEvMTIvMjAxMA==', 'Uk0gMQ=='),
(6, 'ODM0NQ==', 'VGVzdGluZw==', 'Tm9ybWFs', 'Mg==', 'MTEvMTIvMjAxMA==', 'Uk0gNQ==');

-- --------------------------------------------------------

--
-- Table structure for table `surgical`
--

CREATE TABLE IF NOT EXISTS `surgical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientNumber` int(11) NOT NULL,
  `patientFirst` varchar(50) NOT NULL,
  `patientLast` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthDate` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `surgicalRoom` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `surgical`
--

INSERT INTO `surgical` (`id`, `patientNumber`, `patientFirst`, `patientLast`, `gender`, `birthDate`, `description`, `surgicalRoom`) VALUES
(1, 303, 'TWltaQ==', 'V2V3ZQ==', 'RmVtYWxl', 'MTEvMTIvMjAxMA==', 'VGhlIHdvdW5kIGlzIGluIGJhZCBzaGFwZQ==', ''),
(2, 828, 'VXBkYXRl', 'VXBkYXRl', 'TWFsZQ==', 'MTEvMTIvMjAxMA==', 'VGVzdGluZyBVcGRhdGU=', '');

-- --------------------------------------------------------

--
-- Table structure for table `unknownpatient`
--

CREATE TABLE IF NOT EXISTS `unknownpatient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patientNumber` int(11) NOT NULL,
  `patientFirst` varchar(50) NOT NULL,
  `patientLast` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthDate` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `Room` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `unknownpatient`
--

INSERT INTO `unknownpatient` (`id`, `patientNumber`, `patientFirst`, `patientLast`, `gender`, `birthDate`, `description`, `Room`) VALUES
(1, 13309, 'a2FtYQ==', 'a2FtYQ==', 'RmVtYWxl', 'MTEvMTIvMjAxMA==', 'YXNhcw==', 'Um9vbSAy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `signup_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `surname`, `email`, `signup_date`) VALUES
(3, 'SnVtYWE=', 'SnVtYWE=', 'V2FmYQ==', 'SnVtYWE=', 'd2FmYUB3YWZhLmNvbQ==', '2013-10-12 19:34:44'),
(4, 'VGVzdGluZw==', 'VGVzdGluZw==', 'VGVzdGluZw==', 'VGVzdGluZw==', 'VGVzdGluZ0BUZXN0aW5nLmNvbQ==', '2013-10-13 03:29:39'),
(5, 'UmFtYQ==', 'UmFtYQ==', 'UmFtYQ==', 'UmFtYQ==', 'UmFtYUBSYW1hLmNvbQ==', '2013-10-15 16:35:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
