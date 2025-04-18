SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `it`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `id_product`, `firstname`, `lastname`, `email`, `amount`, `date_time`) VALUES
(1, 1, 'rer', 'ere', 'rere@ff.com', 1, '2025-02-07 21:35:19'),
(2, 6, 'jkjk', 'jk', 'hjh@jj.com', 1, '2025-02-07 21:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` text NOT NULL,
  `gender` varchar(12) NOT NULL,
  `image` varchar(64) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `description`, `gender`, `image`, `price`) VALUES
(1, 'Jeans 1', 'Cool jeans 1', 'female', 'jeans1.jpg', 567),
(2, 'Jeans 2', 'Cool jeans 2', 'male', 'jeans2.jpg', 47),
(3, 'Jeans 3', 'Cool jeans 3', 'female', 'jeans3.jpg', 57),
(4, 'Jeans 4', 'Cool jeans 4', 'female', 'jeans4.jpg', 27),
(5, 'Jeans 5', 'Cool jeans 5', 'female', 'jeans5.jpg', 32),
(6, 'Jeans 6', 'Cool jeans 6', 'male', 'jeans6.jpg', 52),
(7, 'Jeans 7', 'Cool jeans 7', 'female', 'jeans7.jpg', 41),
(8, 'Jeans 8', 'Cool jeans 8', 'male', 'jeans8.jpg', 64),
(9, 'Jeans 9', 'Cool jeans 9', 'male', 'jeans9.jpg', 19),
(10, 'Jeans 10', 'Cool jeans 10', 'male', 'jeans10.jpg', 29),
(11, 'Jeans 11', 'Cool jeans 11', 'female', 'jeans11.jpg', 36),
(12, 'Jeans 12', 'Cool jeans 12', 'male', 'jeans12.jpg', 46),
(13, 'Jeans 13', 'Cool jeans 13', 'male', 'jeans13.jpg', 51),
(14, 'Jeans 14', 'Cool jeans 14', 'female', 'jeans14.jpg', 44),
(15, 'Jeans 15', 'Cool jeans 15', 'male', 'jeans15.jpg', 47),
(16, 'Jeans 16', 'Cool jeans 16', 'female', 'jeans16.jpg', 29);

-- --------------------------------------------------------

--
-- Table structure for table `workers`
--

CREATE TABLE `workers` (
  `id_worker` int(11) NOT NULL,
  `name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `job` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `salary` float NOT NULL,
  `password` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `internet` set('adsl','dialup','cabel') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `workers`
--

INSERT INTO `workers` (`id_worker`, `name`, `job`, `salary`, `password`, `date`, `internet`) VALUES
(1, 'vts1', 'programmer', 1300, '', '2025-01-06', 'adsl,dialup,cabel'),
(2, 'vts2', 'webmaster', 450, '', '2025-01-07', 'cabel'),
(5, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(6, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(8, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(9, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(10, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(11, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(12, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(13, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(14, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(15, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(16, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(17, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(18, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(19, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(20, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(21, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(22, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(23, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(24, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(25, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(26, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(27, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(28, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(29, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(30, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(31, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(32, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(33, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(34, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(35, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(36, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(37, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(38, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(39, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(40, '', '', 0, '', '0000-00-00', ''),
(41, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(43, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(45, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(46, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(47, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(48, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(49, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(50, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(51, 'VTS', 'VTS', 123, '', '2025-12-26', 'adsl'),
(52, '232', '2323', 2323, '$2y$10$I8Azy/t8bwnQf4LzpNrmae9APUkhzVjpc6JlbFkd8L5Ige5WgiMEK', '2025-12-26', 'adsl'),
(53, '232', '2323', 2323, '$2y$10$jCRMQo9F/Lsur/cJPlREOu2ztNDm4GQO4FmbqG45HlEJRslTawoyG', '2025-12-26', 'adsl'),
(54, '232', '2323', 2323, '$2y$10$fqn1LDDq8AuPZp1upT1FyeeaNUcTQ4T65/lH3CR4VTpY9kWw9/RCG', '2025-12-26', 'adsl'),
(55, 'we', 'we', 12, '$2y$10$1J/fJzjZc10TW9l4miyjBuIe4GPUQaPhIDEDjRRgESKn0LVmm94LW', '2025-12-26', 'adsl'),
(56, 'we', 'we', 12, '$2y$10$Qpen4urm754a5qajj9qHo.yYFeBmhc1n4Ut9kVE.dNTb5khs4wKTq', '2023-12-25', 'adsl');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `workers`
--
ALTER TABLE `workers`
  ADD PRIMARY KEY (`id_worker`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `workers`
--
ALTER TABLE `workers`
  MODIFY `id_worker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
