-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 07, 2025 at 10:52 AM
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
-- Database: `iws`
--

-- --------------------------------------------------------

--
-- Table structure for table `random_data`
--

CREATE TABLE `random_data` (
  `id` int(11) NOT NULL,
  `random_name` varchar(100) NOT NULL,
  `random_number` int(11) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `random_data`
--

INSERT INTO `random_data` (`id`, `random_name`, `random_number`, `date_time`) VALUES
(1, 'Marc', 70118, '2025-11-07 11:50:20'),
(2, 'John', 20252, '2025-11-07 11:52:08'),
(3, 'Joel', 8136, '2025-11-07 11:52:24'),
(4, 'Marc', 10248, '2025-11-07 11:52:26'),
(5, 'Jack', 41931, '2025-11-07 11:52:27'),
(6, 'Rick', 64414, '2025-11-07 11:52:27'),
(7, 'Eve', 27533, '2025-11-07 11:52:27'),
(8, 'Will', 15691, '2025-11-07 11:52:28'),
(9, 'Sasha', 58367, '2025-11-07 11:52:28'),
(10, 'Eagle', 45294, '2025-11-07 11:52:28'),
(11, 'Jack', 93359, '2025-11-07 11:52:29'),
(12, 'Romeo', 6597, '2025-11-07 11:52:29'),
(13, 'Joel', 2245, '2025-11-07 11:52:29'),
(14, 'Lucy', 82883, '2025-11-07 11:52:30'),
(15, 'Lucy', 26415, '2025-11-07 11:52:30'),
(16, 'Suzy', 40848, '2025-11-07 11:52:30'),
(17, 'Romeo', 32277, '2025-11-07 11:52:30'),
(18, 'Sasha', 94647, '2025-11-07 11:52:30'),
(19, 'Nick', 18055, '2025-11-07 11:52:30'),
(20, 'Nick', 70975, '2025-11-07 11:52:30'),
(21, 'Jack', 54486, '2025-11-07 11:52:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `random_data`
--
ALTER TABLE `random_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `random_data`
--
ALTER TABLE `random_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
