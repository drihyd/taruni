-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 11:16 AM
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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `menu_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `child_id` int(11) DEFAULT NULL,
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_sorting` int(11) DEFAULT NULL,
  `menu_sub_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_heading` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `menu_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_column_grid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_column_grid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `open_new_tab` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_category`, `parent_id`, `child_id`, `menu_name`, `menu_sorting`, `menu_sub_name`, `is_heading`, `menu_slug`, `menu_url`, `menu_column_grid`, `child_column_grid`, `is_active`, `open_new_tab`, `created_at`, `updated_at`) VALUES
(1, 'header-menu', 0, 0, 'WOMEN', NULL, NULL, 'No', NULL, '', '', '', 'Yes', 'No', '2021-10-05 10:48:04', '2021-10-05 10:48:04'),
(2, 'header-menu', 1, 0, 'Ready to Wear', NULL, NULL, 'No', NULL, '', '', '', 'Yes', 'No', '2021-10-05 10:46:05', '2021-10-05 10:46:05'),
(3, 'header-menu', 1, 0, 'Lehengas', NULL, NULL, 'No', NULL, '', '', '', 'Yes', 'No', '2021-10-05 10:46:21', '2021-10-05 10:46:21'),
(4, 'header-menu', 1, 0, 'Kurtis', NULL, NULL, 'No', NULL, '', '', '', 'Yes', 'No', '2021-10-05 10:46:35', '2021-10-05 10:46:35'),
(5, 'header-menu', 1, 0, 'Dress Material', NULL, NULL, 'No', NULL, '', '', '', 'Yes', 'No', '2021-10-05 10:46:46', '2021-10-05 10:46:46'),
(6, 'header-menu', 1, 0, 'Bottoms', NULL, NULL, 'No', NULL, '', '', '', 'Yes', 'No', '2021-10-05 10:46:55', '2021-10-05 10:46:55'),
(7, 'header-menu', 0, 0, 'KIDS', NULL, NULL, 'No', NULL, '', '', '', 'Yes', 'No', '2021-10-05 10:48:15', '2021-10-05 10:48:15'),
(8, 'header-menu', 0, 0, 'ACCESSORIES', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 10:47:38', '2021-10-05 10:47:38'),
(9, 'header-menu', 0, 0, 'SALE', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 10:48:35', '2021-10-05 10:48:35'),
(10, 'header-menu', 1, 0, 'New Arrivals', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 10:49:41', '2021-10-05 10:49:41'),
(11, 'header-menu', 1, 0, 'Dupattas', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 10:50:03', '2021-10-05 10:50:03'),
(12, 'header-menu', 1, 2, 'Anarkalis123', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 11:31:47', '2021-10-05 11:31:47'),
(13, 'header-menu', 1, 2, 'Gowns', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 10:52:14', '2021-10-05 10:52:14'),
(14, 'header-menu', 1, 2, 'Shararas/Ghararas', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 10:52:34', '2021-10-05 10:52:34'),
(15, 'header-menu', 1, 2, 'Straight Cut Suits', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 10:53:02', '2021-10-05 10:53:02'),
(16, 'header-menu', 1, 2, 'Fusion/Indo-Western', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 10:53:25', '2021-10-05 10:53:25'),
(17, 'header-menu', 1, 3, 'Bridal', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 10:53:57', '2021-10-05 10:53:57'),
(18, 'header-menu', 1, 3, 'Above 10k', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 11:00:10', '2021-10-05 11:00:10'),
(19, 'header-menu', 1, 3, 'Below 10k', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 11:00:32', '2021-10-05 11:00:32'),
(20, 'header-menu', 1, 4, 'Kurtis', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 11:00:54', '2021-10-05 11:00:54'),
(21, 'header-menu', 1, 4, 'Kurti Sets', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 11:01:15', '2021-10-05 11:01:15'),
(22, 'header-menu', 1, 6, 'Leggings', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 11:01:34', '2021-10-05 11:01:34'),
(23, 'header-menu', 1, 6, 'Pants', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 11:01:54', '2021-10-05 11:01:54'),
(26, 'header-menu', 7, 0, 'Anarkalis', NULL, NULL, 'No', NULL, '', NULL, NULL, 'Yes', 'No', '2021-10-05 11:28:20', '2021-10-05 11:28:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
