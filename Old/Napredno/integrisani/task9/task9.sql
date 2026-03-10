-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 17, 2025 at 09:48 AM
-- Server version: 12.1.2-MariaDB
-- PHP Version: 8.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task9`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_category`, `name`, `date_added`) VALUES
(1, 'Electronics', '2025-12-17 08:41:07'),
(2, 'Books', '2025-12-17 08:41:07'),
(3, 'Clothing', '2025-12-17 08:41:07'),
(4, 'Toys', '2025-12-17 08:41:07'),
(5, 'Groceries', '2025-12-17 08:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` int(11) NOT NULL,
  `date_added` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `id_category`, `name`, `price`, `amount`, `date_added`) VALUES
(1, 1, 'Smartphone', 699.99, 10, '2025-12-17 08:41:23'),
(2, 1, 'Laptop', 1200.00, 5, '2025-12-17 08:41:23'),
(3, 2, 'Novel', 19.99, 50, '2025-12-17 08:41:23'),
(4, 2, 'Comic', 9.99, 100, '2025-12-17 08:41:23'),
(5, 3, 'T-Shirt', 14.99, 30, '2025-12-17 08:41:23'),
(6, 3, 'Jeans', 49.99, 20, '2025-12-17 08:41:23'),
(7, 4, 'Action Figure', 24.99, 15, '2025-12-17 08:41:23'),
(8, 4, 'Puzzle', 12.99, 25, '2025-12-17 08:41:23'),
(9, 5, 'Apple', 0.99, 200, '2025-12-17 08:41:23'),
(10, 5, 'Milk', 1.49, 100, '2025-12-17 08:41:23'),
(12, 1, 'New Product', 12.99, 5, '2025-12-17 10:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id_token` int(11) NOT NULL,
  `token` char(64) NOT NULL,
  `restriction_number` int(11) NOT NULL,
  `date_expire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id_token`, `token`, `restriction_number`, `date_expire`) VALUES
(1, '761cf35e528257244f90a7d59fae2112e97ac15abdf739cd9d16baee1a9b6366', 187, '2025-12-18 04:34:45'),
(2, 'e6141922bbf86401ca0ef11f3cfcc77c74732c2f01155be24b808100635b1322', 79, '2025-12-18 01:06:43'),
(3, 'be3a8d44122cc4208360938bc938780a7c929464cdb44ed9f5556034e3eb064e', 78, '2025-12-18 08:25:59'),
(4, '85f7082cf8db1488de46f657dc9b798a527ebb8dd25c3505d380a2f38a83a3ae', 59, '2025-12-17 15:51:32'),
(5, '6bbf2318cd4475cc72b37fb0e2224cce380736d5ad9d89a1143146ae1a68105b', 103, '2025-12-18 02:18:32'),
(6, 'd131cb3eda097ebdc5bd54a792e94dd3ef8f3ad226487680ede4d67028daec8b', 149, '2025-12-17 14:37:32'),
(7, 'bd151958ffdc3ca03aeae3a429689606846cebba6ff1b9bc0c60dd8e56967c71', 177, '2025-12-17 19:12:59'),
(8, '3dcb8ecbbff8f41b8cd9591e3c52b8a2c60b4a3cf8fc234026496435da9daed9', 177, '2025-12-17 14:24:07'),
(9, '66bcd529eef83aa9ed4cfbd22bf5ef3f7f34de7ae14d94c54ce4319aaea863e5', 111, '2025-12-17 17:33:46'),
(10, 'afc689788abd5bc12c30c0eea48422e5f7f5e37f6600f1c5c81c1963992cf0e8', 168, '2025-12-18 00:24:53'),
(11, '559a6d08b4144c821ec30696f9c39fad5b0998cb8cc63705bd29cff1f872a079', 123, '2025-12-17 20:36:20'),
(12, 'a610b4c2c829095829458ac6fbbfa224bc60f6ae8a83d3657d2e5a7ba6056a8a', 109, '2025-12-18 03:34:18'),
(13, '100f050e692cc31fc25ecb23ad8111ce3ebbdeae6f0e2e4c856654f89ef6b8df', 94, '2025-12-17 15:42:12'),
(14, '4925e46db4b71e8a172eefda46f3f9710e2b97f56a472368e1fce8cf94a95ad7', 177, '2025-12-17 10:12:34'),
(15, '21103be1780ec37b21b3f0dd0d5c2333a0eb0895e190d8a243081c23842764e2', 95, '2025-12-17 15:01:32'),
(16, 'ed7c6c7f79633f714d5c68142a809aff3ed85da1f02f9d052fa762448276ccaf', 165, '2025-12-17 10:15:26'),
(17, 'c9d8e8b0e4def0aa7ecedda54f54196da1038f86344c1341699b4edee1061358', 124, '2025-12-17 16:36:12'),
(18, '8bd11e0a9596563dfe273a8fb99d14975baffeecb9c247d471640b86f49e37e0', 133, '2025-12-17 11:45:41'),
(19, 'afd5138a5e1e3e919b732a5a0ba279cc2bebc2e3e4afe2054245266b4b7d53d9', 156, '2025-12-17 11:17:26'),
(20, 'a71138be4bde37610845458f55b219548007cf5c7073191a56bf409e67da6690', 91, '2025-12-17 11:37:35'),
(21, '83d9c9452ccc07e9b85de60b2471442dcfe9eabe17d8a7f840a41f933f7f7f02', 182, '2025-12-17 16:11:39'),
(22, 'ac9ca61a9830af61c3531b7fd703505fd6d81cbf5b79b6c76fb4f03a77e84b00', 54, '2025-12-17 23:35:59'),
(23, 'ffc4e60c2cc47bb06cb1d41d2186bb7e78d3359f7d44cec191dd4d17ddc47cc7', 99, '2025-12-17 18:52:54'),
(24, '40cc0746357647dca5e38cf7ace446a4abb0b922e785405ab469bbcd22a06a29', 149, '2025-12-18 08:53:44'),
(25, 'ebffe9d613b0df71f5b3ed35ed67f46f349e373ad3c8bd1d652a660d3a50bd62', 194, '2025-12-17 19:50:39'),
(26, '2e1623065df0a3c920c75ffe26d54ea657cc27be3cd7f31eb9e007f054ed046f', 172, '2025-12-18 03:43:50'),
(27, 'a7a4df93c7225cd779151f7bc71e67963a68c5ca05597f3b14d4b7b5ce656059', 160, '2025-12-18 02:42:15'),
(28, '350ae2f3508d1b62b06b4f2998be5954372085d6e6aaae4b791bc5cebaac0571', 125, '2025-12-17 11:30:08'),
(29, 'db015deee2ee01be6067305421ff06279c1bc09b55d846edb9e0a37144a3cb11', 51, '2025-12-17 16:35:01'),
(30, '55d7cb2228f9fba55bbc3137cd498ab868aee21003ff0189296d6ac5374d0b45', 195, '2025-12-17 21:50:16'),
(31, '9d76b9f173b2701713ff73a4b201eaeb19ee2c1df6cb540f1486741fc1e95605', 85, '2025-12-17 20:45:28'),
(32, '1e4dd08b1f1e24adcb14d00e84c8718c48e95a58031dac22012d6b566c51c9cf', 57, '2025-12-17 17:22:36'),
(33, '36ed5941ae3b62221cfa755f2ae1d5ad60323b437c4687996530192b4c83561c', 128, '2025-12-17 23:37:02'),
(34, '048d2ca38b876f272e02e090ee9230f2a18d81032dd694174d20a38b86a2a655', 154, '2025-12-17 16:51:38'),
(35, '3122e4e1f1e10169c7ffe26c86912c9546e7611b68d5f4bd288722759b1dcf7c', 179, '2025-12-18 01:24:48'),
(36, '966ea9bfdc0e052de1bc4362904e0c477707b2fa0ba31dadb977c3ed8fa26bc8', 127, '2025-12-17 15:44:09'),
(37, '7ec2c7d0c0896cfe827c7ce1fc878649515546f1d45373d99925269162650514', 195, '2025-12-18 08:38:10'),
(38, 'df1d771ed6e89a67743305504dd91acb3c19a7fb777cf3ae7c07fea583134406', 149, '2025-12-17 20:14:30'),
(39, 'a082964ba3a162af1b5e63c30d7860a5e310217e2b360663b3f50ca4e5774999', 118, '2025-12-17 12:50:41'),
(40, 'de48860b1bfcf529b095abecb0d8f7a5dca3fad1c61e8e83691214febccb4f0b', 185, '2025-12-17 22:03:50'),
(41, 'a364b961e2ad775f9acf30beb711bdc0f2305ec9c50e735748c2073e618bddc6', 95, '2025-12-18 07:20:59'),
(42, '9ed71ac6797928e4886a18a3d93bee727373c84aff40b1396f64fc32bc59704a', 54, '2025-12-17 23:19:50'),
(43, '4722e263266e4e2e45fcdaf99c565618c474b84a3b346958e9025c1dade0bfcf', 121, '2025-12-17 14:04:02'),
(44, 'f8432149963c48751cbcd27943fa035050d41b99cc39b2f6c6c32b3a2cfb8862', 51, '2025-12-18 08:40:36'),
(45, 'f1c4795e3adc909a868c03d3894eedfc649152f24468fada47916d15b7bb1144', 84, '2025-12-17 15:51:03'),
(46, '87b86e4d9ffa05494656a358669d04fc785e403adbe5da4499d3ecc47833602b', 130, '2025-12-18 03:29:04'),
(47, '957b76f0b3f57f505a479853f88db963a58060206ef7a225de58ff4257bd04af', 82, '2025-12-18 04:49:38'),
(48, 'b3a756f8de09c5b8386d3d211ded16b243d10ea32f5123c88f080c41787dfc50', 199, '2025-12-17 21:31:59'),
(49, '102f64182e7307f3f18023e0c96af551719c1ed30d581f3c1292cd6eefe642a9', 174, '2025-12-18 00:49:52'),
(50, 'd43851ad150d1a0439d728aa2bcaceacb4d0d57cb746ec4155acb79ce4bd6dfc', 85, '2025-12-17 17:53:48');

-- --------------------------------------------------------

--
-- Table structure for table `token_usages`
--

CREATE TABLE `token_usages` (
  `id_usage` int(11) NOT NULL,
  `id_token` int(11) NOT NULL,
  `request_url` varchar(255) NOT NULL,
  `date_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `token_usages`
--

INSERT INTO `token_usages` (`id_usage`, `id_token`, `request_url`, `date_time`) VALUES
(1, 1, '/integrisani/task9/api/products/2', '2025-12-17 10:20:35'),
(2, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:21:47'),
(3, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(4, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(5, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(6, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(7, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(8, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(9, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(10, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(11, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(12, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(13, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(14, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(15, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(16, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(17, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(18, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(19, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(20, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(21, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(22, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(23, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(24, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(25, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(26, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(27, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(28, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(29, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(30, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(31, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(32, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(33, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(34, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(35, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(36, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(37, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(38, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(39, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(40, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(41, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(42, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(43, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(44, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(45, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(46, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(47, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(48, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(49, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(50, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(51, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(52, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(53, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(54, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(55, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(56, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(57, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(58, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(59, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(60, 4, '/integrisani/task9/api/products/2', '2025-12-17 10:23:05'),
(61, 2, '/integrisani/task9/api/products/2', '2025-12-17 10:34:06'),
(62, 2, '/integrisani/task9/api/products/2', '2025-12-17 10:35:36'),
(63, 2, '/integrisani/task9/api/products/', '2025-12-17 10:36:01'),
(64, 2, '/integrisani/task9/api/categories/', '2025-12-17 10:36:15'),
(65, 2, '/integrisani/task9/api/categories/2/products', '2025-12-17 10:36:26'),
(66, 2, '/integrisani/task9/api/products', '2025-12-17 10:39:32'),
(67, 2, '/integrisani/task9/api/categories/', '2025-12-17 10:40:54'),
(68, 2, '/integrisani/task9/api/categories/2', '2025-12-17 10:41:06'),
(69, 2, '/integrisani/task9/api/products/', '2025-12-17 10:41:13'),
(70, 2, '/integrisani/task9/api/products/3', '2025-12-17 10:41:22'),
(71, 2, '/integrisani/task9/api/products/11', '2025-12-17 10:42:45'),
(72, 2, '/integrisani/task9/api/products/', '2025-12-17 10:44:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_category` (`id_category`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id_token`);

--
-- Indexes for table `token_usages`
--
ALTER TABLE `token_usages`
  ADD PRIMARY KEY (`id_usage`),
  ADD KEY `id_token` (`id_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `token_usages`
--
ALTER TABLE `token_usages`
  MODIFY `id_usage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`) ON DELETE SET NULL;

--
-- Constraints for table `token_usages`
--
ALTER TABLE `token_usages`
  ADD CONSTRAINT `1` FOREIGN KEY (`id_token`) REFERENCES `tokens` (`id_token`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
