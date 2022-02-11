-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 02:48 PM
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
  `menu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_sorting` int(11) DEFAULT NULL,
  `menu_sub_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_heading` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `menu_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_column_grid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Yes',
  `open_new_tab` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_category`, `menu_name`, `menu_sorting`, `menu_sub_name`, `is_heading`, `menu_slug`, `menu_url`, `menu_column_grid`, `is_active`, `open_new_tab`, `created_at`, `updated_at`) VALUES
(1, 'header-menu', 'Women', 1, NULL, 'Yes', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 09:00:20', '2021-08-09 09:00:20'),
(2, 'header-menu', 'KIDS', 2, NULL, 'Yes', NULL, '', 'col-2', 'Yes', 'No', '2021-08-09 09:06:22', '2021-08-09 09:06:22'),
(3, 'header-menu', 'ACCESSORIES', 3, NULL, 'Yes', NULL, '', 'col-3', 'Yes', 'No', '2021-08-09 09:06:47', '2021-08-09 09:06:47'),
(4, 'header-menu', 'COLLECTIONS', 4, NULL, 'Yes', NULL, '', 'col-4', 'Yes', 'No', '2021-08-09 09:07:11', '2021-08-09 09:07:11'),
(5, 'header-menu', 'Anarkali', 1, NULL, 'No', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 09:23:36', '2021-08-09 09:23:36'),
(6, 'header-menu', 'Dress Material', 2, NULL, 'No', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 09:24:07', '2021-08-09 09:24:07'),
(7, 'header-menu', 'Dupattas', 3, NULL, 'No', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 09:26:44', '2021-08-09 09:26:44'),
(8, 'header-menu', 'Juttis', 4, NULL, 'No', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 09:27:14', '2021-08-09 09:27:14'),
(9, 'header-menu', 'Kurtis', 5, NULL, 'No', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 09:27:57', '2021-08-09 09:27:57'),
(10, 'header-menu', 'Leggings', 6, NULL, 'No', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 09:28:26', '2021-08-09 09:28:26'),
(11, 'header-menu', 'Lehengas', 7, NULL, 'No', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 09:28:57', '2021-08-09 09:28:57'),
(12, 'header-menu', 'Palazzos & Pants', 8, NULL, 'No', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 09:29:29', '2021-08-09 09:29:29'),
(13, 'header-menu', 'Jewellery', 1, NULL, 'No', NULL, '', 'col-3', 'Yes', 'No', '2021-08-09 09:30:32', '2021-08-09 09:30:32'),
(14, 'header-menu', 'Bags', 2, NULL, 'No', NULL, '', 'col-3', 'Yes', 'No', '2021-08-09 09:30:58', '2021-08-09 09:30:58'),
(15, 'header-menu', 'Bangles', 3, NULL, 'No', NULL, '', 'col-3', 'Yes', 'No', '2021-08-09 09:31:20', '2021-08-09 09:31:20'),
(16, 'header-menu', 'Sandals', 4, NULL, 'No', NULL, '', 'col-3', 'Yes', 'No', '2021-08-09 09:31:46', '2021-08-09 09:31:46'),
(17, 'footer-widget-1', 'CATEGORIES', 1, NULL, 'Yes', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 09:42:15', '2021-08-09 09:42:32'),
(18, 'footer-widget-1', 'COLLECTIONS', 2, NULL, 'Yes', NULL, '', 'col-2', 'Yes', 'No', '2021-08-09 09:43:06', '2021-08-09 09:43:06'),
(19, 'footer-widget-1', 'Help', 3, NULL, 'Yes', NULL, '', 'col-3', 'Yes', 'No', '2021-08-09 09:43:30', '2021-08-09 09:43:30'),
(20, 'footer-widget-1', 'Anarkali', 1, NULL, 'No', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 10:36:52', '2021-08-09 10:36:52');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
