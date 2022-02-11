-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2021 at 09:27 AM
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
-- Table structure for table `used_coupons`
--

CREATE TABLE `used_coupons` (
  `id` int(11) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `used_coupons`
--

INSERT INTO `used_coupons` (`id`, `user_id`, `cart_id`, `coupon_id`, `coupon_code`, `created_at`, `updated_at`) VALUES
(14, 'f2651fff-6c8c-4c97-9262-1a26cfb00365', 1, 8, 'FXD1000', '2021-08-26 08:22:19', '2021-08-26 08:22:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `used_coupons`
--
ALTER TABLE `used_coupons`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `used_coupons`
--
ALTER TABLE `used_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
