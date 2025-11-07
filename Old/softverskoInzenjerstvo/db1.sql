-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 27, 2021 at 11:24 AM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `university`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
`StudentID` int NOT NULL AUTO_INCREMENT,
`FirstName` varchar(50) NOT NULL,
`LastName` varchar(50) NOT NULL,
`Gender` varchar(10) NOT NULL,
`Age` int NOT NULL,
`Address` varchar(50) NOT NULL,
PRIMARY KEY (`StudentID`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`StudentID`, `FirstName`, `LastName`, `Gender`, `Age`, `Address`) VALUES
(1, 'Edward', 'Lyons', 'Male', 17, 'Spencer Street'),
(2, 'Jimmie', 'Vargas', 'Male', 18, 'Blue Bay Avenue'),
(3, 'Monica', 'Ward', 'Female', 16, 'Mapple Street'),
(4, 'Joann', 'Jordan', 'Female', 17, 'Spencer Street'),
(5, 'Cheryl', 'Swanson', 'Female', 17, 'Wacky Street'),
(6, 'Clara', 'Webb', 'Female', 18, 'Spooner Street'),
(7, 'Zack', 'Norris', 'Male', 19, 'Blue Bay Avenue'),
(8, 'Randall', 'May', 'Male', 18, 'Golden Street'),
(9, 'Jessica', 'Cole', 'Female', 17, 'Mapple Street'),
(10, 'Oscar', 'Manning', 'Male', 18, 'Mapple Street');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
