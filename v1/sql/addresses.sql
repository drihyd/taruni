-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 09:49 AM
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
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `landmark` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `addtype` char(20) DEFAULT NULL,
  `billing_same_as_shipping` char(5) DEFAULT NULL,
  `is_default` enum('Yes','No') DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `name`, `email`, `address`, `landmark`, `city`, `pincode`, `state`, `country`, `phone`, `addtype`, `billing_same_as_shipping`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 17, 'Jayaraju vangapandu', 'jayaraju@deepredink.com', 'Ameerepet,Hyderabad', NULL, 'Hyderabad', '500086', 'Telanagana', 'India', '9700334319', 'shipping', NULL, 'Yes', '2021-08-17 10:46:34', '2021-08-17 10:46:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
