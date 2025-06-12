-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2025 at 09:03 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `registration_token` char(40) COLLATE utf8_unicode_ci NOT NULL,
  `registration_expires` datetime DEFAULT NULL,
  `active` smallint(1) NOT NULL DEFAULT 0,
  `forgotten_password_token` char(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `forgotten_password_expires` datetime DEFAULT NULL,
  `is_banned` smallint(1) NOT NULL DEFAULT 0,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `firstname`, `lastname`, `registration_token`, `registration_expires`, `active`, `forgotten_password_token`, `forgotten_password_expires`, `is_banned`, `date_time`) VALUES
(1, 'admin@vts.su.ac.rs', '$2y$10$p1GeQ01kwzCehfnQuEFbB.8TLsW9KxXxDgVfAWn5o8Nc.538PzC9e', 'Test', 'Test', '', NULL, 1, '', NULL, 0, '2025-05-24 20:54:55'),
(2, 'test2@gmail.com', '$2y$10$S3Arm6itE5owkY46gTBbv.KABgT5d1TkJEzSYWTupqeGEg54JGJAu', 'Test2', 'Test2', '', NULL, 1, '', NULL, 0, '2025-05-24 20:54:58'),
(4, 'test3@gmail.com', '$2y$10$aOykBY8t8dAoJ67mfpUlz.aQkJ9PuqM02fPHAh97wq/kjNY5D6hYK', 'Test3', 'Test3', '', NULL, 1, '', NULL, 0, '2025-05-24 20:55:00'),
(5, 'test4@gmail.com', '$2y$10$QxDyM.C6xgO4Ie1amKoIsOKTjGSl.aYDGQuA7qBIj5shuD.LQ/7Pu', 'test4', 'test4', '', NULL, 1, '', NULL, 0, '2025-05-24 20:55:04'),
(6, 'test5@gmail.com', '$2y$10$GT2zD7FTbdp/NV4/FIvw6O9GZamOHBAKh/SgPdp3OKm5YFpkf74vO', 'test5', 'test5', '097bdca168248a2f32a9acebfaa6f710684f23c9', '2025-05-25 20:55:38', 0, NULL, NULL, 0, '2025-05-24 20:55:38'),
(7, 'test6@gmail.com', '$2y$10$oPCsU9p7a/MzaK2rbYLFOeWoUejj4VUzgxZM.WqOqKslm2jXHzhem', 'test6', 'test6', '185834bd11e37a7d98475b89194eca51b80d8491', '2025-05-25 20:57:00', 0, NULL, NULL, 0, '2025-05-24 20:57:00'),
(8, 'test7@gmail.com', '$2y$10$knktLA5R9AXsezgCRPj6FeF8NXDdsTuVs92LgycLfM/46ACamSQY2', 'test7', 'test7', '1b1b0494735d3618d3e10dd5516be81159d70275', '2025-05-25 20:59:06', 0, NULL, NULL, 0, '2025-05-24 20:59:06'),
(9, 'test8@gmail.com', '$2y$10$SNMFouji0wivLPZcT.JW2ev.x5wh6ukCqQnxys1.YHyFTqr4htTmq', 'test8', 'test8', '', NULL, 1, NULL, NULL, 0, '2025-05-24 21:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_email_failures`
--

CREATE TABLE `user_email_failures` (
  `id_user_email_failure` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_time_added` datetime NOT NULL,
  `date_time_tried` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_email_failures`
--

INSERT INTO `user_email_failures` (`id_user_email_failure`, `id_user`, `message`, `date_time_added`, `date_time_tried`) VALUES
(2, 6, 'Message could not be sent. Mailer Error: Invalid address:  (From): ', '2025-05-24 20:55:38', NULL),
(3, 7, 'Message could not be sent. Mailer Error: Invalid address:  (From): ', '2025-05-24 20:57:00', NULL),
(4, 8, 'Message could not be sent  (test7@gmail.com). Mailer Error: Invalid address:  (From):  ', '2025-05-24 20:59:06', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_email_failures`
--
ALTER TABLE `user_email_failures`
  ADD PRIMARY KEY (`id_user_email_failure`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_email_failures`
--
ALTER TABLE `user_email_failures`
  MODIFY `id_user_email_failure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_email_failures`
--
ALTER TABLE `user_email_failures`
  ADD CONSTRAINT `user_email_failures_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
