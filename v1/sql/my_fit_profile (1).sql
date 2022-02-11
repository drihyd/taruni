-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 01:22 PM
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
-- Table structure for table `my_fit_profile`
--

CREATE TABLE `my_fit_profile` (
  `id` int(11) NOT NULL,
  `profile_name` varchar(255) DEFAULT NULL,
  `attach_sleeves` enum('yes','no') DEFAULT 'no',
  `sleeve_length` varchar(50) DEFAULT NULL,
  `armhole` varchar(50) DEFAULT NULL,
  `sleeve_circumference` varchar(50) DEFAULT NULL,
  `chest` varchar(50) DEFAULT NULL,
  `waist` varchar(50) DEFAULT NULL,
  `hips` varchar(50) DEFAULT NULL,
  `top_length` varchar(50) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_fit_profile`
--

INSERT INTO `my_fit_profile` (`id`, `profile_name`, `attach_sleeves`, `sleeve_length`, `armhole`, `sleeve_circumference`, `chest`, `waist`, `hips`, `top_length`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'jayaraju', 'yes', '35', '35', '46', '45', '25', 'standard', '60', 17, '2021-08-26 12:48:17', '2021-08-26 12:48:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `my_fit_profile`
--
ALTER TABLE `my_fit_profile`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `my_fit_profile`
--
ALTER TABLE `my_fit_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
