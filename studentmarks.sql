-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2016 at 07:48 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentmarks`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `semester` int(3) NOT NULL,
  `credits` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `semester`, `credits`, `username`) VALUES
('CS101', 'C Programming', 1, 3, 'demo@gbu.ac.in'),
('DM123', 'Chutiyapanti', 8, 4, '12ics039@gbu.ac.in'),
('MA201', 'Maths 3', 3, 4, 'demo@gbu.ac.in'),
('MA402', 'Simulation and Modelling', 8, 4, 'demo@gbu.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `course_code` varchar(10) NOT NULL,
  `regNo` varchar(10) NOT NULL,
  `midMarks` int(3) NOT NULL,
  `internalMarks` int(3) NOT NULL,
  `endMarks` int(3) NOT NULL,
  PRIMARY KEY (`course_code`,`regNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`course_code`, `regNo`, `midMarks`, `internalMarks`, `endMarks`) VALUES
('CS101', '12ics008', 25, 25, 50),
('CS101', '12ics039', 18, 20, 50),
('MA201', '12ics008', 20, 20, 42),
('MA201', '12ics039', 25, 18, 33);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `regNo` varchar(10) NOT NULL,
  `stuFirstName` text NOT NULL,
  `stuLastName` text NOT NULL,
  `college` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `semester` int(3) NOT NULL,
  PRIMARY KEY (`regNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`regNo`, `stuFirstName`, `stuLastName`, `college`, `branch`, `semester`) VALUES
('12ics008', 'Anupam', 'Mishra', 'SOICT', 'CS', 8),
('12ics039', 'Shubham', 'Shukla', 'SOICT', 'CS', 8);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(55) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` text NOT NULL,
  `lastName` text NOT NULL,
  `school` varchar(5) NOT NULL,
  `designation` varchar(5) NOT NULL,
  `officeNumber` varchar(12) NOT NULL,
  `gender` text NOT NULL,
  `timeReg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `firstName`, `lastName`, `school`, `designation`, `officeNumber`, `gender`, `timeReg`) VALUES
('12ics039@gbu.ac.in', '123456', 'Shubham', 'Shukla', 'soe', 'pro', 'Il20', 'female', '2016-02-28 13:57:16'),
('anupam@gbu.ac.in', 'password', 'Anupam', 'Mishra', 'sict', 'pro', 'IL 202', 'male', '2016-03-03 02:17:01'),
('demo@gbu.ac.in', 'demo123', 'Demo', 'Demo', 'sict', 'rfa', 'IL 202', 'female', '2016-02-29 10:04:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
