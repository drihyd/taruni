-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 04:03 AM
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
-- Table structure for table `orders_statuses`
--

CREATE TABLE `orders_statuses` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `order_status` enum('placed','hold','confirmed','dispatched','processing','cancelled','delivered','cancelled-refund-pending','cancelled-refunded') DEFAULT NULL,
  `shipped_by` varchar(255) DEFAULT NULL,
  `shipped_traking_no` varchar(255) DEFAULT NULL,
  `shipping_to_date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `cancelled_date` date DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `action_by` varchar(255) DEFAULT NULL,
  `action_name` varchar(255) DEFAULT NULL,
  `action_ip_address` varchar(100) DEFAULT NULL,
  `action_date` timestamp NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders_statuses`
--
ALTER TABLE `orders_statuses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders_statuses`
--
ALTER TABLE `orders_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
