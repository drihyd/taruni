-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 05:07 AM
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
-- Table structure for table `project_photos`
--

CREATE TABLE `project_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` smallint(6) NOT NULL,
  `prop_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `udf1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_type` enum('exterior','interior','construction_updates','none','schools','colleges','malls','public_places','hospitals','infra_cover_image') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `type` enum('amenities','gallery','banner','location_map','brochure','none','faq','social_infra','manhatton','masterplan','banner_manhatton','card_banner_manhatton','manhattan_condos','social_infra_image','specifications','custom_section','forms') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `thumb_images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_image_description` blob DEFAULT NULL,
  `sorting` smallint(6) NOT NULL DEFAULT 1,
  `image_category` enum('fullwidth','mediumwidth','smallwidth','none') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `video_url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_photos`
--

INSERT INTO `project_photos` (`id`, `project_id`, `prop_slug`, `image`, `name`, `description`, `created_at`, `updated_at`, `udf1`, `sub_type`, `type`, `thumb_images`, `thumb_image_description`, `sorting`, `image_category`, `video_url`, `banner_url`) VALUES
(4, 0, '', '1626924079.png', NULL, NULL, NULL, NULL, NULL, 'none', 'gallery', NULL, NULL, 1, 'none', NULL, NULL),
(5, 0, '', '1626924101.png', NULL, NULL, NULL, NULL, NULL, 'none', 'gallery', NULL, NULL, 1, 'none', NULL, NULL),
(6, 0, '', '1626924186.png', NULL, NULL, NULL, NULL, NULL, 'none', 'gallery', NULL, NULL, 1, 'none', NULL, NULL),
(7, 0, '', '1626924233.png', NULL, NULL, NULL, NULL, NULL, 'none', 'gallery', NULL, NULL, 1, 'none', NULL, NULL),
(8, 0, '', '1626927336.png', NULL, NULL, NULL, NULL, NULL, 'none', 'gallery', NULL, NULL, 1, 'none', NULL, NULL),
(10, 1, 'dwaraka-elite', '1627006636.png', NULL, NULL, NULL, NULL, NULL, 'none', 'gallery', NULL, NULL, 1, 'none', NULL, NULL),
(11, 1, 'dwaraka-elite', '1627006654.png', NULL, NULL, NULL, NULL, NULL, 'none', 'gallery', NULL, NULL, 1, 'none', NULL, NULL),
(12, 1, 'dwaraka-elite', '1627006671.png', NULL, NULL, NULL, NULL, NULL, 'none', 'gallery', NULL, NULL, 1, 'none', NULL, NULL),
(13, 1, 'dwaraka-elite', '1627006694.png', NULL, NULL, NULL, NULL, NULL, 'none', 'gallery', NULL, NULL, 1, 'none', NULL, NULL),
(15, 1, 'dwaraka-elite', '1627007553.png', NULL, NULL, NULL, NULL, NULL, 'none', 'gallery', NULL, NULL, 1, 'none', NULL, NULL),
(16, 0, NULL, '1628557279.jpg', NULL, NULL, NULL, NULL, NULL, 'none', 'banner', NULL, NULL, 1, 'none', NULL, NULL),
(17, 0, NULL, '1628557333.jpg', NULL, NULL, NULL, NULL, NULL, 'none', 'banner', NULL, NULL, 1, 'none', NULL, NULL),
(19, 0, NULL, '1628557379.jpg', NULL, NULL, NULL, NULL, NULL, 'none', 'banner', NULL, NULL, 1, 'none', NULL, NULL),
(20, 0, NULL, '1628557390.jpg', NULL, NULL, NULL, NULL, NULL, 'none', 'banner', NULL, NULL, 1, 'none', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_photos`
--
ALTER TABLE `project_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_colums` (`project_id`,`sub_type`,`type`,`sorting`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_photos`
--
ALTER TABLE `project_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
