-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2020 at 02:19 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `php_appointment`
--
CREATE DATABASE IF NOT EXISTS `php_appointment` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `php_appointment`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `userid` varchar(100) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `pwd`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(200) NOT NULL,
  `cdt` date NOT NULL,
  `special` varchar(100) NOT NULL,
  `doctorid` int(11) NOT NULL,
  `fees` int(11) NOT NULL,
  `appntdt` date NOT NULL,
  `appnttime` varchar(50) NOT NULL,
  `accept` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`doctorid`,`appntdt`,`appnttime`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `userid`, `cdt`, `special`, `doctorid`, `fees`, `appntdt`, `appnttime`, `accept`) VALUES
(1, 'ram@gmail.com', '2020-02-05', 'neuro', 1, 1500, '2020-02-05', '08:00 AM', 'pending'),
(2, 'ram@gmail.com', '2020-02-05', 'neuro', 1, 1500, '2020-02-06', '08:00 AM', 'accept');

-- --------------------------------------------------------

--
-- Table structure for table `newdoctor`
--

CREATE TABLE IF NOT EXISTS `newdoctor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `addr` varchar(1000) NOT NULL,
  `city` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `qual` varchar(200) NOT NULL,
  `special` varchar(100) NOT NULL,
  `certno` varchar(50) NOT NULL,
  `expr` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `fees` int(11) NOT NULL,
  `accept` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`userid`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `newdoctor`
--

INSERT INTO `newdoctor` (`id`, `name`, `gender`, `addr`, `city`, `mobile`, `userid`, `pwd`, `qual`, `special`, `certno`, `expr`, `dob`, `fees`, `accept`) VALUES
(1, 'Ganesh', 'Male', '33,North Car Street,\r\nKK Nagar.', 'Madurai', '9805959595', 'ganesh@gmail.com', 'ganesh', 'MS', 'neuro', 'MS384384378', '5', '1970-02-04', 1500, 'pending'),
(2, 'Hariharan', 'Male', '343,RS Nagar,', 'Madurai', '8956522440', 'hari@gmail.com', 'hari', 'MS', 'ortho', 'MS384384370', '8', '1970-05-01', 2500, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `newpatient`
--

CREATE TABLE IF NOT EXISTS `newpatient` (
  `fname` varchar(200) NOT NULL,
  `lname` varchar(200) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `occ` varchar(50) NOT NULL,
  `addr` varchar(300) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `userid` varchar(200) NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `iname` varchar(1000) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newpatient`
--

INSERT INTO `newpatient` (`fname`, `lname`, `gender`, `occ`, `addr`, `city`, `state`, `dob`, `mobile`, `userid`, `pwd`, `iname`) VALUES
('Ram', 'Kumar', 'Male', 'business', '343,North Car Street,', 'Madurai', 'Tamilnadu', '1990-05-01', '8856875057', 'ram@gmail.com', 'ram', 'uploads/1580714814LectureIcon1.jpg'),
('Samuel', 'David', 'Male', 'business', '3,Church Road', 'Madurai', 'Tamilnadu', '1990-02-04', '8556985783', 'sam@gmail.com', 'sam', 'uploads/1580794254[006395].jpg');

-- --------------------------------------------------------

--
-- Table structure for table `specialisation`
--

CREATE TABLE IF NOT EXISTS `specialisation` (
  `sname` varchar(200) NOT NULL,
  PRIMARY KEY (`sname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specialisation`
--

INSERT INTO `specialisation` (`sname`) VALUES
('neuro'),
('ortho');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
