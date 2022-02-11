-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 01:29 PM
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
-- Table structure for table `my_coupons`
--

CREATE TABLE `my_coupons` (
  `CouponID` int(11) NOT NULL,
  `Coupon_title` varchar(100) NOT NULL,
  `CouponCode` varchar(20) NOT NULL,
  `CouponAddedon` timestamp NOT NULL DEFAULT current_timestamp(),
  `CouponExpiryDate` date NOT NULL,
  `Description` varchar(100) NOT NULL,
  `DiscountType` char(10) NOT NULL,
  `Discount_value` float NOT NULL,
  `Cartamount` float NOT NULL,
  `Couponamount` float NOT NULL,
  `Is_Active` tinyint(1) NOT NULL DEFAULT 1,
  `Is_public` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_coupons`
--

INSERT INTO `my_coupons` (`CouponID`, `Coupon_title`, `CouponCode`, `CouponAddedon`, `CouponExpiryDate`, `Description`, `DiscountType`, `Discount_value`, `Cartamount`, `Couponamount`, `Is_Active`, `Is_public`) VALUES
(7, 'Rs.500 off', 'FIRST', '2020-09-29 01:45:51', '2021-09-30', 'Get Rs.500 off on your first order', 'fixed', 500, 0, 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_coupons`
--
ALTER TABLE `my_coupons`
  ADD PRIMARY KEY (`CouponID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_coupons`
--
ALTER TABLE `my_coupons`
  MODIFY `CouponID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
