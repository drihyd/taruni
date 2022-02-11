-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2021 at 08:16 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `attr_name` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attr_name`, `slug`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'fabric', 'fabric', 1, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(2, 'color', 'color', 2, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(3, 'cut', 'cut', 3, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(4, 'work', 'work', 4, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(5, 'bottom', 'bottom', 5, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(6, 'dupatta', 'dupatta', 6, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(7, 'sleeve', 'sleeve', 7, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(8, 'zip', 'zip', 8, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(9, 'sleeves', 'sleeves', 9, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(10, 'border', 'border', 10, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(11, 'design', 'design', 11, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(12, 'dress length', 'dress-length', 12, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(14, 'color title', 'color-title', 14, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(15, 'skirt length', 'skirt-length', 13, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(16, 'can can', 'can-can', 0, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(17, 'collection', 'collection', 15, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(18, 'length', 'length', 16, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(19, 'width', 'width', 17, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(20, 'size', 'size', 0, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(21, 'chest pads', 'chest-pads', 0, '2021-08-27 11:49:49', '2021-08-27 11:49:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
