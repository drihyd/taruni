-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2021 at 05:19 AM
-- Server version: 10.3.31-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deepredink_taruniv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `variant_name` varchar(50) DEFAULT NULL,
  `varinat_value` varchar(100) DEFAULT NULL,
  `extra_value_1` varchar(50) DEFAULT NULL,
  `extra_value_2` varchar(50) DEFAULT NULL,
  `extra_value_3` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `category_id`, `variant_name`, `varinat_value`, `extra_value_1`, `extra_value_2`, `extra_value_3`, `created_at`, `updated_at`) VALUES
(1, 4, 39, 'certificate_number', '30J329161910', NULL, NULL, NULL, '2021-09-07 03:21:14', '2021-09-07 03:21:14'),
(2, 4, 39, 'screw_type', 'Bombay Screw', NULL, NULL, NULL, '2021-09-07 03:21:18', '2021-09-07 03:21:18'),
(3, 4, 39, 'extra_metal', 'diamond', NULL, NULL, NULL, '2021-09-07 03:21:18', '2021-09-07 03:21:18'),
(4, 4, 39, 'extra_metal', 'gemstone', NULL, NULL, NULL, '2021-09-07 03:21:18', '2021-09-07 03:21:18'),
(5, 4, 39, 'extra_metal', 'pearls', NULL, NULL, NULL, '2021-09-07 03:21:18', '2021-09-07 03:21:18'),
(6, 4, 39, 'extra_metal', 'polki', NULL, NULL, NULL, '2021-09-07 03:21:18', '2021-09-07 03:21:18'),
(7, 4, 39, 'extra_metal', 'beads', NULL, NULL, NULL, '2021-09-07 03:21:18', '2021-09-07 03:21:18'),
(8, 4, 39, 'extra_metal', 'other', NULL, NULL, NULL, '2021-09-07 03:21:18', '2021-09-07 03:21:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
