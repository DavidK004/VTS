-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2025 at 11:33 AM
-- Server version: 12.0.2-MariaDB
-- PHP Version: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `text_transform`
--

CREATE TABLE `text_transform` (
  `id` int(11) NOT NULL,
  `original_text` text NOT NULL,
  `modified_text` text NOT NULL,
  `length` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `text_transform`
--

INSERT INTO `text_transform` (`id`, `original_text`, `modified_text`, `length`, `created_at`) VALUES
(1, 'test tast tist omga', 'Test T@st Tist Omg@', 19, '2025-11-04 11:17:14'),
(2, 'axis is the best cult yaaa', '@xis Is The Best Cult Y@@@', 26, '2025-11-04 11:17:38'),
(3, 'axis is the best cult yaaa', '@xis Is The Best Cult Y@@@', 26, '2025-11-04 11:19:47'),
(4, 'text', 'Text', 4, '2025-11-04 11:24:01'),
(5, 'text', 'Text', 4, '2025-11-04 11:25:31'),
(6, 'text', 'Text', 4, '2025-11-04 11:30:05'),
(7, 'omgajgkaslhgl', 'Omg@jgk@slhgl', 13, '2025-11-04 11:30:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `text_transform`
--
ALTER TABLE `text_transform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `text_transform`
--
ALTER TABLE `text_transform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
