-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 26, 2021 at 05:03 AM
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
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
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
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`CouponID`, `Coupon_title`, `CouponCode`, `CouponAddedon`, `CouponExpiryDate`, `Description`, `DiscountType`, `Discount_value`, `Cartamount`, `Couponamount`, `Is_Active`, `Is_public`) VALUES
(7, 'Rs.500 off', 'WLCM10', '2020-09-29 01:45:51', '2021-09-30', 'Get Rs.500 off on your first order', 'PCTG', 10, 0, 0, 1, 1),
(8, 'Rs.1000 off', 'FXD1000', '2020-09-29 01:45:51', '2021-09-30', 'Get Rs.1000 off on your first order', 'FXD', 1000, 0, 0, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`CouponID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `CouponID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
