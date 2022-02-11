-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2021 at 09:21 PM
-- Server version: 5.7.23-23
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
-- Database: `tarunipo_ta4ru4ni1`
--

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `shipping_rate_id` int(11) NOT NULL,
  `shipping_time_id` int(11) NOT NULL,
  `tax_percentage` float NOT NULL,
  `cod_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `country_id`, `shipping_rate_id`, `shipping_time_id`, `tax_percentage`, `cod_available`) VALUES
(1, 'andaman and nicobar islands', 99, 2, 3, 0, 0),
(2, 'andhra pradesh', 99, 2, 3, 0, 0),
(3, 'arunachal pradesh', 99, 2, 3, 0, 0),
(4, 'assam', 99, 2, 3, 0, 0),
(5, 'bihar', 99, 2, 3, 0, 0),
(6, 'chandigarh', 99, 2, 3, 0, 0),
(7, 'chhattisgarh', 99, 2, 3, 0, 0),
(8, 'dadra and nagar haveli', 99, 2, 3, 0, 0),
(9, 'delhi', 99, 2, 3, 0, 0),
(10, 'goa', 99, 2, 3, 0, 0),
(11, 'gujarat', 99, 2, 3, 0, 0),
(12, 'haryana', 99, 2, 3, 0, 0),
(13, 'himachal pradesh', 99, 2, 3, 0, 0),
(14, 'jammu and kashmir', 99, 2, 3, 0, 0),
(15, 'jharkhand', 99, 2, 3, 0, 0),
(16, 'karnataka', 99, 2, 3, 0, 0),
(17, 'kerala', 99, 2, 3, 0, 0),
(18, 'madhya pradesh', 99, 2, 3, 0, 0),
(19, 'maharashtra', 99, 2, 3, 0, 0),
(20, 'manipur', 99, 2, 3, 0, 0),
(21, 'meghalaya', 99, 2, 3, 0, 0),
(22, 'mizoram', 99, 2, 3, 0, 0),
(23, 'nagaland', 99, 2, 3, 0, 0),
(24, 'odisha', 99, 2, 3, 0, 0),
(25, 'puducherry', 99, 2, 3, 0, 0),
(26, 'punjab', 99, 2, 3, 0, 0),
(27, 'rajasthan', 99, 2, 3, 0, 0),
(28, 'tamil nadu', 99, 2, 3, 0, 0),
(29, 'telangana', 99, 2, 3, 0, 0),
(30, 'tripura', 99, 2, 3, 0, 0),
(31, 'uttar pradesh', 99, 2, 3, 0, 0),
(32, 'uttarakhand', 99, 2, 3, 0, 0),
(33, 'west bengal', 99, 2, 3, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
