-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2016 at 11:44 PM
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
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `branch_name` varchar(50) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `school` varchar(5) NOT NULL,
  PRIMARY KEY (`branch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_name`, `branch`, `school`) VALUES
('Architecture', 'AR', 'SOE\r'),
('B.A LL.B', 'BALLB', 'SLGJ\r'),
('Bachelor of Business Management', 'BBM', 'SOM\r'),
('B.A Buddhist Studies and Civilization', 'BBSC', 'SBSC\r'),
('Biotechnology', 'BT', 'SOBT\r'),
('Civil Engineering', 'CE', 'SOE\r'),
('Computer Science', 'CS', 'SOICT'),
('Electronics and Communication', 'EC', 'SOICT'),
('Electrical Engineering', 'EE', 'SOE\r'),
('Food Processing and Technology', 'FPT', 'SVSAS'),
('M.Sc Applied Chemistry', 'MAC', 'SVSAS'),
('M.A Economics Planning and Development', 'MAEPD', 'SOHSS'),
('M.A Hindi', 'MAH', 'SOHSS'),
('M.Sc Applied Mathematics', 'MAM', 'SVSAS'),
('M.A M.Sc Applied Psychology', 'MAP', 'SOHSS'),
('M.Sc Applied Physics', 'MAPH', 'SVSAS'),
('Master of Business Administration', 'MBA', 'SOM\r'),
('M.A Buddhist Studies and Civilization', 'MBSC', 'SBSC\r'),
('M.Phil Clinical Psychology', 'MCP', 'SOHSS'),
('Mechanical Engineering', 'ME', 'SOE\r'),
('M.Tech Food Processing and Technology', 'MFPT', 'SVSAS'),
('M.Sc Food Science', 'MFS', 'SVSAS'),
('Msters in Urban and Regional Planning', 'MPLAN', 'SOE\r'),
('M.A Political Science and Iternational Relations', 'MPSIR', 'SOHSS'),
('Master in Social Work', 'MSW', 'SOHSS'),
('M.Tech Computer Science', 'MTCS', 'SOICT'),
('M.Tech Design Engineering', 'MTDE', 'SOE\r'),
('M.Tech Environment Engineering', 'MTEE', 'SOE\r'),
('M.Tech Embedded System', 'MTES', 'SOICT'),
('M.Tech Instrumentation and Control', 'MTIC', 'SOE\r'),
('M.Tech Intelligent System and Robotics', 'MTISR', 'SOICT'),
('M.Tech Manufacturing Engineering', 'MTME', 'SOE\r'),
('M.Tech Power Electronics and Drives', 'MTPED', 'SOE\r'),
('M.Tech Power System Engineering', 'MTPSE', 'SOE\r'),
('M.Tech Software Engineering', 'MTSE', 'SOICT'),
('M.Tech Structural Engineering', 'MTSTE', 'SOE\r'),
('M.Tech VLSI Design', 'MTVLSI', 'SOICT'),
('M.Tech Wireless Communication and Network', 'MTWCN', 'SOICT');

-- --------------------------------------------------------

--
-- Table structure for table `cgpa`
--

CREATE TABLE IF NOT EXISTS `cgpa` (
  `regNo` varchar(15) NOT NULL,
  `cgpa` float NOT NULL,
  PRIMARY KEY (`regNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgpa`
--

INSERT INTO `cgpa` (`regNo`, `cgpa`) VALUES
('12ics004', 8),
('12ics008', 10),
('12ics033', 8.28571),
('12ics039', 8),
('15ics055', 6);

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
  PRIMARY KEY (`course_code`,`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `semester`, `credits`, `username`) VALUES
('CS102', 'Java Programming', 2, 3, 'demo@gbu.ac.in'),
('MA202', 'Numerical Analysis', 4, 4, 'demo@gbu.ac.in'),
('MA402', 'Simulation and Modelling', 8, 4, 'demo@gbu.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE IF NOT EXISTS `date` (
  `name` varchar(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `date`
--

INSERT INTO `date` (`name`, `date`) VALUES
('date_last', '2016-05-31');

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
('CS102', '12ics033', 20, 20, 20),
('CS102', '15ics055', 21, 20, 22),
('MA202', '14ics045', 20, 20, 33),
('MA402', '12ics004', 20, 15, 40),
('MA402', '12ics008', 25, 25, 49),
('MA402', '12ics033', 25, 25, 50),
('MA402', '12ics039', 20, 20, 35);

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
  `semester` int(2) NOT NULL,
  PRIMARY KEY (`regNo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`regNo`, `stuFirstName`, `stuLastName`, `college`, `branch`, `semester`) VALUES
('12ics004', 'Rishabh', 'Bhati', 'SOICT', 'CS', 8),
('12ics008', 'Anupam', 'Mishra', 'SOICT', 'CS', 8),
('12ics033', 'Piyush', 'Yadav', 'SOICT', 'CS', 8),
('12ics039', 'Shubham ', 'Shukla', 'SOICT', 'CS', 8),
('14ics045', 'Sanchi', 'Srivastava', 'SOICT', 'CS', 4),
('15ibt008', 'Atri', 'Roy', 'SOBT', 'BT', 2),
('15ics055', 'Surbhi ', 'Malik', 'SOICT', 'CS', 2);

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
('demo@gbu.ac.in', 'demo123', 'Demo', 'Demo', 'soict', 'rfa', 'IL 202', 'female', '2016-02-29 10:04:57');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
