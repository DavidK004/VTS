-- phpMyAdmin SQL Dump
-- version 5.2.3-1.fc42
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2025 at 05:37 PM
-- Server version: 8.0.42
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
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `worker_id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `company` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`worker_id`, `name`, `surname`, `company`, `position`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Ellie', 'Prohaska', 'Hettinger, Kovacek and Ward', 'Agricultural Technician', 'brandy23@example.net', '225.412.1456', '2025-11-21 17:21:26', '2025-11-21 17:21:26'),
(2, 'Abel', 'Prohaska', 'Nader, Halvorson and O\'Keefe', 'Spotters', 'josh24@example.org', '+1 (856) 685-6889', '2025-11-21 17:21:26', '2025-11-21 17:21:26'),
(3, 'Raleigh', 'Witting', 'Cole, Reinger and Vandervort', 'Securities Sales Agent', 'ghartmann@example.net', '681.736.1031', '2025-11-21 17:21:26', '2025-11-21 17:21:26'),
(4, 'Kianna', 'Powlowski', 'Shields-Bogan', 'Soldering Machine Setter', 'vince12@example.net', '+1.706.229.0055', '2025-11-21 17:21:26', '2025-11-21 17:21:26'),
(5, 'Jonathan', 'Lakin', 'Price and Sons', 'Welding Machine Tender', 'astokes@example.org', '(276) 669-9491', '2025-11-21 17:21:26', '2025-11-21 17:21:26'),
(6, 'Brody', 'Medhurst', 'O\'Kon, Farrell and Huel', 'Grips', 'smitham.manley@example.org', '1-629-679-8650', '2025-11-21 17:21:26', '2025-11-21 17:21:26'),
(7, 'Gerardo', 'Block', 'Medhurst LLC', 'Supervisor of Customer Service', 'freddie83@example.net', '+1-720-520-3414', '2025-11-21 17:21:26', '2025-11-21 17:21:26'),
(8, 'Marielle', 'Walker', 'Wyman, Crist and Abernathy', 'Heat Treating Equipment Operator', 'zterry@example.net', '501.492.9422', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(9, 'Fay', 'Casper', 'Dickinson Ltd', 'Recreational Vehicle Service Technician', 'helena62@example.com', '1-551-220-2986', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(10, 'Alana', 'Schuppe', 'Reichert Inc', 'Pipelayer', 'geovanny67@example.com', '1-775-283-1334', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(11, 'Savanna', 'Lubowitz', 'Eichmann, Schowalter and Prosacco', 'Caption Writer', 'cemard@example.net', '854.681.3649', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(12, 'Casandra', 'Denesik', 'Erdman, Senger and Vandervort', 'Model Maker', 'diamond.brakus@example.net', '+1-806-229-5770', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(13, 'Derek', 'Luettgen', 'Kunde LLC', 'Outdoor Power Equipment Mechanic', 'julien35@example.net', '+1-757-828-5269', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(14, 'Kallie', 'Greenholt', 'Kub and Sons', 'Calibration Technician OR Instrumentation Technician', 'raphael.reinger@example.com', '+1 (458) 262-6153', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(15, 'Faye', 'Stokes', 'Douglas Ltd', 'Real Estate Association Manager', 'doris01@example.com', '1-510-439-2296', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(16, 'Kaya', 'Langworth', 'Considine Group', 'Composer', 'flarkin@example.net', '+14325783274', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(17, 'Leonie', 'Langosh', 'Streich Group', 'Pump Operators', 'mccullough.ubaldo@example.net', '(501) 434-1379', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(18, 'Porter', 'Trantow', 'Waters-Leffler', 'Power Generating Plant Operator', 'nora.corwin@example.org', '(276) 344-5436', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(19, 'Carroll', 'Hirthe', 'Stracke, Upton and Denesik', 'Molding Machine Operator', 'crona.lamar@example.com', '(423) 583-8225', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(20, 'Frances', 'Brown', 'Walker-Metz', 'First-Line Supervisor-Manager of Landscaping, Lawn Service, and Groundskeeping Worker', 'xfahey@example.com', '534-482-6109', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(21, 'Aylin', 'Howell', 'Wisoky, Zboncak and Bruen', 'Radiologic Technologist and Technician', 'sanford.donnelly@example.net', '848-870-8008', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(22, 'Kevin', 'Borer', 'Volkman and Sons', 'Personal Financial Advisor', 'kautzer.jonathan@example.org', '520.221.9425', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(23, 'Kylie', 'Bednar', 'Nolan, Hane and Romaguera', 'Cutting Machine Operator', 'electa97@example.net', '+1-763-573-0893', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(24, 'Marlen', 'Marvin', 'Beer and Sons', 'Sports Book Writer', 'stefan.bahringer@example.com', '341-802-6626', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(25, 'Carli', 'Emard', 'Green and Sons', 'Concierge', 'orie60@example.com', '727-219-4775', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(26, 'Madeline', 'Lesch', 'Rowe PLC', 'Heaters', 'eleanora04@example.net', '+1 (272) 397-6464', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(27, 'Reggie', 'Kutch', 'Morissette-Dickinson', 'Public Relations Manager', 'uweimann@example.org', '+1-857-788-1384', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(28, 'Elisa', 'Bauch', 'Ullrich, Schuster and Bruen', 'Art Teacher', 'sebastian.mertz@example.com', '984-550-9057', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(29, 'Troy', 'Feeney', 'Romaguera, Rosenbaum and Adams', 'Lay-Out Worker', 'legros.hope@example.com', '321.895.4323', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(30, 'Rusty', 'Flatley', 'Satterfield, Maggio and Gleason', 'Computer Programmer', 'mitchell.brooke@example.org', '+1-828-586-2310', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(31, 'Hank', 'Crona', 'Romaguera, Bradtke and Windler', 'Clinical Psychologist', 'polly96@example.org', '980.868.5991', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(32, 'June', 'Harris', 'Funk-Cronin', 'Postal Clerk', 'zrosenbaum@example.org', '+1.816.962.0947', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(33, 'Woodrow', 'Renner', 'Greenfelder Ltd', 'Bulldozer Operator', 'jaclyn26@example.net', '+1-805-312-3199', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(34, 'Carmen', 'Reichel', 'Hessel, Brekke and Davis', 'Lodging Manager', 'wjaskolski@example.net', '+1.731.204.2268', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(35, 'Baylee', 'DuBuque', 'Treutel, Kuhic and Sanford', 'Paving Equipment Operator', 'orland.steuber@example.com', '+1-989-617-4897', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(36, 'Ike', 'Collier', 'Treutel, Boehm and Gleason', 'Arbitrator', 'marcel85@example.org', '1-252-840-3484', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(37, 'Boyd', 'Hahn', 'West PLC', 'Military Officer', 'creola59@example.net', '1-703-322-1799', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(38, 'Oren', 'Johns', 'Hegmann, Kuvalis and Runolfsdottir', 'Database Manager', 'frami.nathan@example.com', '(919) 913-3876', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(39, 'Mathilde', 'Farrell', 'McDermott-Heidenreich', 'Sales and Related Workers', 'qsatterfield@example.org', '+1-864-974-7339', '2025-11-21 17:21:27', '2025-11-21 17:21:27'),
(40, 'Desiree', 'Abbott', 'Kihn Inc', 'Marine Architect', 'tremblay.terence@example.org', '+1 (320) 831-5827', '2025-11-21 17:21:27', '2025-11-21 17:21:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`worker_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `worker_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
