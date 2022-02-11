-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 17, 2021 at 05:43 AM
-- Server version: 10.3.31-MariaDB
-- PHP Version: 7.3.30

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
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `cat_id`, `product_id`, `thumbnail`, `image`, `created_at`, `updated_at`) VALUES
(38, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 20:57:51', '2021-09-16 20:57:51'),
(37, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 20:56:37', '2021-09-16 20:56:37'),
(36, NULL, NULL, 'thumbnails/A10342_1.jpg', 'large/A10342_1.jpg', '2021-09-16 20:47:57', '2021-09-16 20:47:57'),
(35, NULL, NULL, 'thumbnails/A10342_1.jpg', 'large/A10342_1.jpg', '2021-09-16 20:47:25', '2021-09-16 20:47:25'),
(34, NULL, NULL, 'thumbnails/A10342_1.jpg', 'large/A10342_1.jpg', '2021-09-16 20:46:23', '2021-09-16 20:46:23'),
(33, NULL, NULL, 'thumbnails/A10342_1.jpg', 'large/A10342_1.jpg', '2021-09-16 20:35:17', '2021-09-16 20:35:17'),
(32, NULL, NULL, 'thumbnails/A10342_1.jpg', 'large/A10342_1.jpg', '2021-09-16 20:34:27', '2021-09-16 20:34:27'),
(31, NULL, NULL, 'thumbnails/A10342_1.jpg', 'large/A10342_1.jpg', '2021-09-16 20:33:08', '2021-09-16 20:33:08'),
(30, NULL, NULL, 'thumbnails/TWAK152_1.jpg.jpg', 'large/TWAK152_1.jpg.jpg', '2021-09-16 20:31:37', '2021-09-16 20:31:37'),
(29, NULL, NULL, 'thumbnails/1631804425.jpg', 'large/1631804425.jpg', '2021-09-16 20:30:25', '2021-09-16 20:30:25'),
(28, NULL, NULL, 'thumbnails/1631804393.jpg', 'large/1631804393.jpg', '2021-09-16 20:29:53', '2021-09-16 20:29:53'),
(27, NULL, NULL, 'thumbnails/1631804297.jpg', 'large/1631804297.jpg', '2021-09-16 20:28:17', '2021-09-16 20:28:17'),
(26, NULL, NULL, 'thumbnails/1631804260.jpg', 'large/1631804260.jpg', '2021-09-16 20:27:40', '2021-09-16 20:27:40'),
(25, NULL, NULL, 'thumbnails/1631804077.jpg', 'large/1631804077.jpg', '2021-09-16 20:24:37', '2021-09-16 20:24:37'),
(24, NULL, NULL, 'thumbnails/1631803988.jpg', 'large/1631803988.jpg', '2021-09-16 20:23:09', '2021-09-16 20:23:09'),
(23, NULL, NULL, 'thumbnails/1631803892.jpg', 'large/1631803892.jpg', '2021-09-16 20:21:32', '2021-09-16 20:21:32'),
(22, NULL, NULL, 'thumbnails/1631803741.jpg', 'large/1631803741.jpg', '2021-09-16 20:19:01', '2021-09-16 20:19:01'),
(39, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 20:58:40', '2021-09-16 20:58:40'),
(40, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 20:59:46', '2021-09-16 20:59:46'),
(41, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:02:23', '2021-09-16 21:02:23'),
(42, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:05:06', '2021-09-16 21:05:06'),
(43, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:07:26', '2021-09-16 21:07:26'),
(44, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:08:41', '2021-09-16 21:08:41'),
(45, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:15:28', '2021-09-16 21:15:28'),
(46, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:24:54', '2021-09-16 21:24:54'),
(47, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:26:12', '2021-09-16 21:26:12'),
(48, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:26:43', '2021-09-16 21:26:43'),
(49, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:39:22', '2021-09-16 21:39:22'),
(50, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:40:48', '2021-09-16 21:40:48'),
(51, NULL, NULL, 'thumbnails/A10342_1.jpg', 'large/A10342_1.jpg', '2021-09-16 21:43:48', '2021-09-16 21:43:48'),
(52, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:43:51', '2021-09-16 21:43:51'),
(53, NULL, NULL, 'thumbnails/A10342_1.jpg', 'large/A10342_1.jpg', '2021-09-16 21:45:01', '2021-09-16 21:45:01'),
(54, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:45:04', '2021-09-16 21:45:04'),
(55, NULL, NULL, 'thumbnails/A10342_1.jpg', 'large/A10342_1.jpg', '2021-09-16 21:45:37', '2021-09-16 21:45:37'),
(56, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:45:39', '2021-09-16 21:45:39'),
(57, NULL, NULL, 'thumbnails/A10342_1.jpg', 'large/A10342_1.jpg', '2021-09-16 21:47:17', '2021-09-16 21:47:17'),
(58, NULL, NULL, 'thumbnails/eden_group_(1).jpg', 'large/eden_group_(1).jpg', '2021-09-16 21:47:19', '2021-09-16 21:47:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
