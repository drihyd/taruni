-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 04:49 AM
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
-- Database: `anaya_jewellery`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_master`
--

CREATE TABLE `address_master` (
  `AddressID` int(11) NOT NULL,
  `UserID` int(12) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Address1` varchar(150) NOT NULL,
  `Address2` varchar(150) NOT NULL,
  `LandMark` varchar(100) NOT NULL,
  `Addedon` timestamp NOT NULL DEFAULT current_timestamp(),
  `City` varchar(50) NOT NULL,
  `Pincode` varchar(20) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Mobile` char(20) NOT NULL,
  `addtype` char(20) NOT NULL,
  `billing_same_as_shipping` char(5) NOT NULL,
  `is_default` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address_master`
--

INSERT INTO `address_master` (`AddressID`, `UserID`, `Fullname`, `Address1`, `Address2`, `LandMark`, `Addedon`, `City`, `Pincode`, `State`, `Country`, `Mobile`, `addtype`, `billing_same_as_shipping`, `is_default`) VALUES
(1, 10, 'Harish Babu Gorantla', 'Fno 602, Block-3, Sri sairam gardens', 'Madhuranagar, Yousufguda', '', '2021-03-17 16:01:17', 'Hyderabad', '500038', 'Telangana', 'India', '9032555564', 'shipping', '', 1),
(2, 10, 'Harish Babu Gorantla', 'Fno 602, Block-3, Sri sairam gardens', 'Madhuranagar, Yousufguda', '', '2021-03-17 16:01:17', 'Hyderabad', '500038', 'Telangana', 'India', '9032555564', 'billing', 'on', 1),
(3, 12, 'Ranjith', 'FLAT 401, BOPPANA ENCLAVE', 'C-38, MADHURA NAGAR', '', '2021-04-09 10:54:25', 'Hyderabad', '500038', 'Telangana', 'India', '9885047096', 'shipping', '', 1),
(4, 12, 'Ranjith', 'FLAT 401, BOPPANA ENCLAVE', 'C-38, MADHURA NAGAR', '', '2021-04-09 10:54:25', 'Hyderabad', '500038', 'Telangana', 'India', '9885047096', 'billing', 'on', 1),
(5, 3, 'jayaraju', 'vijayawada', '', '', '2021-04-09 11:38:21', 'vijayawada', '520004', 'AP', 'Ind', '7207589349', 'shipping', '', 1),
(6, 3, 'jayaraju', 'vijayawada', '', '', '2021-04-09 11:38:21', 'vijayawada', '520004', 'AP', 'Ind', '7207589349', 'billing', 'on', 1),
(7, 4, 'Venkat', 'Teting', '', '', '2021-04-09 12:05:37', 'Hyderabad', '500032', 'TG', 'India', '9052691535', 'shipping', '', 1),
(8, 4, 'Venkat', 'Teting', '', '', '2021-04-09 12:05:37', 'Hyderabad', '500032', 'TG', 'India', '9052691535', 'billing', 'on', 1),
(9, 13, 'Test Ranjith', 'Street 1', 'Madhapur', '', '2021-04-12 15:07:26', 'Hyderabad', '500038', 'Telangana', 'India', '9885047096', 'shipping', '', 1),
(10, 13, 'Test Ranjith', 'Street 1', 'Madhapur', '', '2021-04-12 15:07:26', 'Hyderabad', '500038', 'Telangana', 'India', '9885047096', 'billing', 'on', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_master`
--
ALTER TABLE `address_master`
  ADD PRIMARY KEY (`AddressID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address_master`
--
ALTER TABLE `address_master`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
