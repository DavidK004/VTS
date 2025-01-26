SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `it`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `image` char(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(5,2) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `name`, `image`, `description`, `price`) VALUES
(1, 'Test 123', '1.jpg', 'Very good product', 123.67),
(2, 'Test 25', '2.jpg', 'very good product FOR every day use.', 23.00),
(4, 'Product 4', '4.jpg', 'very good product for everyday use.', 456.00),
(5, 'Product 5', '5.jpg', 'very good product for everyday use.very good product for everyday use.very good product for everyday', 443.50),
(6, 'Product 345', '3.jpg', 'good stuff', 344.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
