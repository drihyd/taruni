-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2021 at 09:26 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

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
-- Table structure for table `temp_products`
--

CREATE TABLE `temp_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) DEFAULT NULL,
  `product_slug` varchar(255) DEFAULT NULL,
  `code` char(30) DEFAULT NULL,
  `category_id` int(11) DEFAULT 0,
  `description` varchar(250) DEFAULT NULL,
  `variant` varchar(50) DEFAULT NULL,
  `variant_name` varchar(100) DEFAULT NULL,
  `combination_variant_name` varchar(200) DEFAULT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `product_available` char(20) DEFAULT NULL,
  `sku_code` char(50) DEFAULT NULL,
  `stock_total` float DEFAULT 0,
  `price_inr` float DEFAULT 0,
  `price_usd` float DEFAULT 0,
  `on_sale` char(10) DEFAULT NULL,
  `on_sale_price` float DEFAULT 0,
  `on_sale_price_usd` float DEFAULT 0,
  `unstitched` varchar(50) DEFAULT NULL,
  `fabric` varchar(100) DEFAULT NULL,
  `bottom` varchar(100) DEFAULT NULL,
  `sleeve` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `dress_length` varchar(100) DEFAULT NULL,
  `color_title` varchar(100) DEFAULT NULL,
  `skirt_length` varchar(100) DEFAULT NULL,
  `can_can` varchar(100) DEFAULT NULL,
  `collection` varchar(100) DEFAULT NULL,
  `chest_pads` varchar(100) DEFAULT NULL,
  `desigin` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temp_products`
--
ALTER TABLE `temp_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temp_products`
--
ALTER TABLE `temp_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
