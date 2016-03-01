-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 29, 2016 at 05:28 AM
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
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `regNo` varchar(10) NOT NULL,
  `stuFirstName` text NOT NULL,
  `stuLastName` text NOT NULL,
  `college` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `subject` varchar(10) NOT NULL,
  `oddMidMarks` varchar(2) NOT NULL,
  `oddEndMarks` varchar(2) NOT NULL,
  `evenMidMarks` varchar(2) NOT NULL,
  `evenEndMarks` varchar(2) NOT NULL,
  PRIMARY KEY (`regNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`regNo`, `stuFirstName`, `stuLastName`, `college`, `branch`, `subject`, `oddMidMarks`, `oddEndMarks`, `evenMidMarks`, `evenEndMarks`) VALUES
('12ics008', 'Anupam', 'Mishra', 'SOICT', 'CS', 'MA 202', '21', '65', '20', '60'),
('12ics039', 'Shubham', 'Shukla', 'SOICT', 'CS', 'MA202', '20', '70', '18', '75');

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
('12ics039@gbu.ac.in', '123456', 'Shubham', 'Shukla', 'soe', 'pro', 'Il20', 'female', '2016-02-28 13:57:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
