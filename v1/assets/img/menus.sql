-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 10:43 AM
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
-- Database: `dwaraka_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(1, 'footer-widget-1', 'Useful links', 1, NULL, 'Yes', NULL, '', 'col-1', 'Yes', 'No', '2021-03-24 06:03:02', '2021-07-21 08:10:44'),
(2, 'footer-widget-1', 'Locations', 1, NULL, 'Yes', NULL, '', 'col-2', 'Yes', 'No', '2021-03-24 06:03:47', '2021-07-21 08:13:39'),
(5, 'footer-widget-1', 'Office Spaces', 1, NULL, 'Yes', NULL, 'https://www.urbanrise.in/#', 'col-4', 'Yes', 'No', '2021-03-24 07:27:59', '2021-07-21 09:06:24'),
(6, 'footer-widget-1', 'About', 1, NULL, 'No', NULL, 'https://www.urbanrise.in/about-us#our-vision-mission', 'col-1', 'Yes', 'No', '2021-03-24 07:31:45', '2021-07-21 08:11:33'),
(7, 'footer-widget-1', 'Blog', 2, NULL, 'No', NULL, '', 'col-1', 'Yes', 'No', '2021-03-24 07:33:49', '2021-07-21 08:11:57'),
(8, 'footer-widget-1', 'Offices in Kavuri Hills', 1, NULL, 'No', NULL, '', 'col-2', 'Yes', 'No', '2021-03-24 07:55:26', '2021-07-21 08:14:29'),
(9, 'footer-widget-1', 'Offices in Hi-Tech City', 2, NULL, 'No', NULL, '', 'col-2', 'Yes', 'No', '2021-03-24 07:58:46', '2021-07-21 08:14:53'),
(12, 'footer-widget-1', 'Warm-shell Office Spaces', 1, NULL, 'No', NULL, '', 'col-4', 'Yes', 'No', '2021-03-24 08:01:03', '2021-07-21 09:10:44'),
(13, 'footer-widget-1', 'Managed office spaces', 2, NULL, 'No', NULL, '', 'col-4', 'Yes', 'No', '2021-03-24 08:01:31', '2021-07-21 09:15:08'),
(17, 'footer-widget-1', 'Private office spaces', 4, NULL, 'No', NULL, '', 'col-4', 'Yes', 'No', '2021-03-25 00:51:08', '2021-07-21 09:16:06'),
(18, 'header-menu', 'Home', 1, NULL, 'Yes', NULL, '', 'col-1', 'Yes', 'No', '2021-03-25 01:11:53', '2021-07-21 06:16:38'),
(19, 'header-menu', 'About', 2, NULL, 'Yes', NULL, 'https://localhost/dwaraka/aboutus', 'col-2', 'Yes', 'No', '2021-03-25 01:14:06', '2021-08-02 01:18:16'),
(21, 'header-menu', 'Office Spaces', 3, NULL, 'Yes', NULL, '', 'col-3', 'Yes', 'No', '2021-03-25 02:29:45', '2021-08-02 01:18:30'),
(22, 'header-menu', 'Locations', 4, NULL, 'Yes', NULL, '', 'col-4', 'Yes', 'No', '2021-03-25 02:30:50', '2021-08-02 01:18:52'),
(23, 'header-menu', 'Contact', 5, NULL, 'Yes', NULL, '', 'col-5', 'Yes', 'No', '2021-03-25 02:31:52', '2021-08-02 01:20:13'),
(24, 'footer-widget-1', 'Co-working office spaces', 3, NULL, 'No', NULL, '', 'col-4', 'Yes', 'No', '2021-03-25 10:54:41', '2021-07-21 09:16:42'),
(36, 'footer-widget-1', 'Contact', 3, NULL, 'No', NULL, '', 'col-1', 'Yes', 'No', '2021-07-21 08:12:50', '2021-07-21 08:13:10'),
(37, 'footer-widget-1', 'Offices in Madhapur', 3, NULL, 'No', NULL, '', 'col-2', 'Yes', 'No', '2021-07-21 08:16:05', '2021-07-21 08:16:21'),
(38, 'footer-widget-1', 'offices in Gachibowli', 4, NULL, 'No', NULL, '', 'col-2', 'Yes', 'No', '2021-07-21 08:17:51', '2021-07-21 08:17:51'),
(39, 'footer-widget-1', 'Offices in Kondapur', 5, NULL, 'No', NULL, '', 'col-2', 'Yes', 'No', '2021-07-21 08:18:38', '2021-07-21 08:18:38'),
(40, 'footer-widget-1', 'Office space for lease', 4, NULL, 'No', NULL, '', 'col-4', 'Yes', 'No', '2021-07-21 09:17:06', '2021-07-21 09:17:06'),
(43, 'header-menu', 'offices in Madhapur', 1, NULL, 'No', NULL, '', 'col-3', 'Yes', 'No', '2021-08-02 01:20:47', '2021-08-02 01:20:47'),
(44, 'header-menu', 'offices in madhapur', 1, NULL, 'No', NULL, '', 'col-3', 'Yes', 'No', '2021-08-02 02:43:38', '2021-08-02 02:43:58'),
(45, 'header-menu', 'offices in kavuri hills', 3, NULL, 'No', NULL, '', 'col-3', 'Yes', 'No', NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
