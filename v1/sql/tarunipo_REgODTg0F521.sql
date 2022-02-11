-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2021 at 02:28 AM
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
-- Database: `tarunipo_REgODTg0F521`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `landmark` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `phone` char(20) DEFAULT NULL,
  `addtype` char(20) DEFAULT NULL,
  `billing_same_as_shipping` char(5) DEFAULT NULL,
  `is_default` enum('Yes','No') DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Addedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `City` varchar(50) NOT NULL,
  `Pincode` varchar(20) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Country` varchar(20) NOT NULL,
  `Mobile` char(20) NOT NULL,
  `addtype` char(20) NOT NULL,
  `billing_same_as_shipping` char(5) NOT NULL,
  `is_default` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isverified` int(11) NOT NULL,
  `user_ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verification_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verification_mail_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_status` enum('1','0') COLLATE utf8mb4_unicode_ci DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `profile_photo_path`, `created_at`, `updated_at`, `last_name`, `mobile`, `isverified`, `user_ip`, `email_verification_code`, `email_verification_mail_status`, `active_status`) VALUES
(1, '1', 'Taruni', 'admin@taruni.com', NULL, '$2y$10$ZIWD8AwI8VTt/anNsXZOeOKRxRz/NP1hAwMQR9iK49bi4tfZn7ymW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1'),
(1, '1', 'Taruni', 'admin@taruni.com', NULL, '$2y$10$ZIWD8AwI8VTt/anNsXZOeOKRxRz/NP1hAwMQR9iK49bi4tfZn7ymW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1'),
(1, '1', 'Taruni', 'admin@taruni.com', NULL, '$2y$10$ZIWD8AwI8VTt/anNsXZOeOKRxRz/NP1hAwMQR9iK49bi4tfZn7ymW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `attr_name` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `display_order` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `attr_name`, `slug`, `display_order`, `created_at`, `updated_at`) VALUES
(1, 'fabric', 'fabric', 1, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(2, 'color', 'color', 2, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(3, 'cut', 'cut', 3, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(4, 'work', 'work', 4, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(5, 'bottom', 'bottom', 5, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(6, 'dupatta', 'dupatta', 6, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(7, 'sleeve', 'sleeve', 7, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(8, 'zip', 'zip', 8, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(9, 'sleeves', 'sleeves', 9, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(10, 'border', 'border', 10, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(11, 'design', 'design', 11, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(12, 'dress length', 'dress_length', 12, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(14, 'color title', 'color_title', 14, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(15, 'skirt length', 'skirt_length', 13, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(16, 'can can', 'can_can', 0, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(17, 'collection', 'collection', 15, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(18, 'length', 'length', 16, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(19, 'width', 'width', 17, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(20, 'size', 'size', 0, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(21, 'chest pads', 'chest_pads', 0, '2021-08-27 11:49:49', '2021-08-27 11:49:49'),
(24, 'un stitched', 'un_stitched', NULL, '2021-09-07 12:35:19', '2021-09-07 12:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_id` varchar(100) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `checked_out` int(11) DEFAULT NULL,
  `discount_coupon` float NOT NULL DEFAULT '0',
  `total_amount` float DEFAULT NULL,
  `total_items` char(20) DEFAULT '0',
  `total_shipping_weight` float DEFAULT NULL,
  `total_shipping_fee` float DEFAULT '0',
  `cod_fee` float DEFAULT NULL,
  `grand_total` float DEFAULT NULL,
  `currency` varchar(50) DEFAULT 'inr',
  `bill_to_name` varchar(255) DEFAULT NULL,
  `bill_to_email` varchar(255) DEFAULT NULL,
  `bill_to_phone` varchar(255) DEFAULT NULL,
  `bill_to_address` text,
  `bill_to_city` text,
  `bill_to_state` text,
  `bill_to_country` text,
  `bill_to_postalcode` varchar(255) DEFAULT NULL,
  `ship_to_name` varchar(255) DEFAULT NULL,
  `ship_to_email` varchar(255) DEFAULT NULL,
  `ship_to_phone` varchar(255) DEFAULT NULL,
  `ship_to_alt_phone` varchar(100) DEFAULT NULL,
  `ship_to_address` text,
  `ship_to_city` text,
  `ship_to_state` text,
  `ship_to_country` text,
  `ship_to_country_id` int(11) DEFAULT NULL,
  `ship_to_state_id` int(11) DEFAULT NULL,
  `ship_to_city_id` int(11) DEFAULT NULL,
  `ship_to_postalcode` char(20) DEFAULT NULL,
  `payment_mode` text,
  `gateway_name` varchar(100) DEFAULT NULL,
  `tax_percentage` float DEFAULT NULL,
  `shipping_rate` int(11) DEFAULT NULL,
  `shipping_base_price` float DEFAULT NULL,
  `shipping_cost` float DEFAULT NULL,
  `shipping_time` text,
  `shipping_time_id` int(11) DEFAULT NULL,
  `shipping_rate_id` int(11) DEFAULT NULL,
  `our_hash` text,
  `clicked_paypal` int(11) DEFAULT NULL,
  `v_ip` text,
  `v_user_agent` text,
  `v_platform` varchar(255) DEFAULT NULL,
  `v_browser` varchar(100) DEFAULT NULL,
  `v_is_mobile` int(11) DEFAULT NULL,
  `v_mobile_type` varchar(100) DEFAULT NULL,
  `v_is_bot` int(11) DEFAULT NULL,
  `v_source_url` text,
  `v_landed_on` text,
  `utm_source` text,
  `utm_medium` text,
  `utm_campaign` text,
  `utm_term` text,
  `utm_content` text,
  `v_failed_campaigns` text,
  `guest_checkout` enum('yes','no') DEFAULT 'no',
  `went_to_gateway` int(11) DEFAULT NULL,
  `returned_from_gateway` char(10) DEFAULT NULL,
  `payment_status` text,
  `razor_payorderid` char(40) DEFAULT NULL,
  `order_status` enum('hold','placed','confirmed','processing','delivered') DEFAULT 'hold',
  `schedule_discount` datetime DEFAULT NULL,
  `abandoned_coupon_id` int(11) DEFAULT NULL,
  `last_discount_mailer` datetime DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `user_id`, `order_id`, `order_number`, `checked_out`, `discount_coupon`, `total_amount`, `total_items`, `total_shipping_weight`, `total_shipping_fee`, `cod_fee`, `grand_total`, `currency`, `bill_to_name`, `bill_to_email`, `bill_to_phone`, `bill_to_address`, `bill_to_city`, `bill_to_state`, `bill_to_country`, `bill_to_postalcode`, `ship_to_name`, `ship_to_email`, `ship_to_phone`, `ship_to_alt_phone`, `ship_to_address`, `ship_to_city`, `ship_to_state`, `ship_to_country`, `ship_to_country_id`, `ship_to_state_id`, `ship_to_city_id`, `ship_to_postalcode`, `payment_mode`, `gateway_name`, `tax_percentage`, `shipping_rate`, `shipping_base_price`, `shipping_cost`, `shipping_time`, `shipping_time_id`, `shipping_rate_id`, `our_hash`, `clicked_paypal`, `v_ip`, `v_user_agent`, `v_platform`, `v_browser`, `v_is_mobile`, `v_mobile_type`, `v_is_bot`, `v_source_url`, `v_landed_on`, `utm_source`, `utm_medium`, `utm_campaign`, `utm_term`, `utm_content`, `v_failed_campaigns`, `guest_checkout`, `went_to_gateway`, `returned_from_gateway`, `payment_status`, `razor_payorderid`, `order_status`, `schedule_discount`, `abandoned_coupon_id`, `last_discount_mailer`, `verified`, `created_at`, `updated_at`) VALUES
(1, '21', 21, NULL, 1, NULL, 0, 6290, '1', 0, 0, 0, 6290, 'INR', 'jayaraju vangapandu', 'jayarajuv5@gmail.com', '9700334319', 'Vijayawada', 'Vijayawada', 'AP', 'india', '520004', 'jayaraju vangapandu', 'jayarajuv5@gmail.com', '9700334319', NULL, 'Vijayawada', 'Vijayawada', 'AP', 'india', NULL, NULL, NULL, '520004', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-22 08:14:58', '2021-09-22 08:17:07'),
(2, '11', 11, NULL, 2, NULL, 0, 6290, '1', 0, 0, 0, 6290, 'INR', 'Venkat Yadav', 'admin@taruni.in', '9052691535', 'Banjara hills, road no 12 hyd', 'Hyderabad', 'TG', 'india', '500034', 'Venkat Yadav', 'admin@taruni.in', '9052691535', NULL, 'Banjara hills, road no 12 hyd', 'Hyderabad', 'TG', 'india', NULL, NULL, NULL, '500034', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-22 10:10:46', '2021-09-22 10:12:45'),
(3, '22', 22, NULL, 3, NULL, 0, 6290, '1', 0, 0, 0, 6290, 'INR', 'Venkat Yadav K', 'venkat@deepredink.com', '9052691535', 'NA', 'Hyd', 'TS', 'india', '500034', 'Venkat Yadav K', 'venkat@deepredink.com', '9052691535', NULL, 'NA', 'Hyd', 'TS', 'india', NULL, NULL, NULL, '500034', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-22 10:14:53', '2021-09-22 10:28:38'),
(4, '11', 11, NULL, NULL, NULL, 0, 6290, '1', 0, 0, 0, 6290, 'INR', 'Venkat Yadav', 'admin@taruni.in', '9052691535', 'Banjara hills, road no 12 hyd', 'Hyderabad', 'TG', 'india', '500034', 'Venkat Yadav', 'admin@taruni.in', '9052691535', NULL, 'Banjara hills, road no 12 hyd', 'Hyderabad', 'TG', 'india', NULL, NULL, NULL, '500034', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, NULL, NULL, NULL, 'hold', NULL, NULL, NULL, NULL, '2021-09-22 10:32:14', '2021-09-22 10:32:41'),
(5, '21', 21, NULL, NULL, NULL, 0, 6290, '1', 0, 0, 0, 6290, 'INR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, NULL, NULL, NULL, 'hold', NULL, NULL, NULL, NULL, '2021-09-22 10:34:45', '2021-09-22 10:34:46'),
(6, '11', 11, NULL, NULL, NULL, 0, 6290, '1', 0, 0, 0, 6290, 'INR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, NULL, NULL, NULL, 'hold', NULL, NULL, NULL, NULL, '2021-09-22 18:01:07', '2021-09-22 18:01:08'),
(7, '11', 11, NULL, NULL, NULL, 0, 3890, '1', 0, 0, 0, 3890, 'INR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, NULL, NULL, NULL, 'hold', NULL, NULL, NULL, NULL, '2021-09-23 11:13:45', '2021-09-23 11:13:49'),
(8, '23', 23, NULL, 4, NULL, 0, 10180, '2', 0, 0, 0, 10180, 'INR', 'Sri Lakshmi Priya Valluri', 'priya@deepredink.com', '8978850982', '', 'Ramachandrapuram', 'Andhra Pradesh', 'india', '533255', 'Sri Lakshmi Priya Valluri', 'priya@deepredink.com', '8978850982', NULL, '', 'Ramachandrapuram', 'Andhra Pradesh', 'india', NULL, NULL, NULL, '533255', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-23 11:15:05', '2021-09-23 11:31:32'),
(9, '24', 24, NULL, 5, NULL, 0, 15960, '1', 0, 0, 0, 15960, 'INR', 'Harish Babu', 'harish.gorantla123@gmail.com', '99 1234567', 'Vijaya Durga, B-block, Nagarjuna Homes, Nizampet road, Kukatpally', 'Hyderabad', 'Telangana', 'india', 'hgkhgj', 'Harish Babu', 'harish.gorantla123@gmail.com', '99 1234567', NULL, 'Vijaya Durga, B-block, Nagarjuna Homes, Nizampet road, Kukatpally', 'Hyderabad', 'Telangana', 'india', NULL, NULL, NULL, 'hgkhgj', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-23 12:01:29', '2021-09-23 12:02:59'),
(10, '25', 25, NULL, 6, NULL, 389, 4180, '1', 0, 0, 0, 3791, 'INR', 'shubhang yadav s', 'imshubhang@gmail.com', '8000000404004040', '', 'hyderabad99', 'Telangana09', 'india', 'hi009', 'shubhang yadav s', 'imshubhang@gmail.com', '8000000404004040', NULL, '', 'hyderabad99', 'Telangana09', 'india', NULL, NULL, NULL, 'hi009', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-23 12:01:38', '2021-09-23 12:37:14'),
(11, '24', 24, NULL, 7, NULL, 0, 6290, '1', 0, 0, 0, 6290, 'INR', 'Harish G', 'harish.babu@deepredink.com', '88   884569', 'Vijaya Durga, B-block, Nagarjuna Homes, Nizampet road, Kukatpally', 'Hyderabad', 'Telangana', 'india', 'hgkhgj', 'Harish G', 'harish.babu@deepredink.com', '88   884569', NULL, 'Vijaya Durga, B-block, Nagarjuna Homes, Nizampet road, Kukatpally', 'Hyderabad', 'Telangana', 'india', NULL, NULL, NULL, 'hgkhgj', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-23 12:47:14', '2021-09-23 12:51:39'),
(12, '25', 25, NULL, NULL, NULL, 1000, 580, '1', 0, 0, 0, -420, 'INR', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, NULL, NULL, NULL, 'hold', NULL, NULL, NULL, NULL, '2021-09-23 12:48:27', '2021-09-23 12:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `order_number` int(11) DEFAULT NULL,
  `item_status` enum('hold','placed','confirmed','processing','delivered') DEFAULT 'hold',
  `sku_id` int(11) NOT NULL,
  `fit_profile_id` int(11) DEFAULT NULL,
  `qty` int(30) DEFAULT NULL,
  `custom` int(11) DEFAULT NULL,
  `custom_standard` int(11) DEFAULT NULL,
  `unstitched` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `gst` float DEFAULT NULL,
  `discount_percentage` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `currency` varchar(50) DEFAULT 'inr',
  `item_size` char(20) DEFAULT NULL,
  `alterations` text,
  `alter_sleeves` char(3) DEFAULT NULL,
  `alter_dress` char(3) DEFAULT NULL,
  `sleeve_json` text,
  `dress_json` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `cart_id`, `order_number`, `item_status`, `sku_id`, `fit_profile_id`, `qty`, `custom`, `custom_standard`, `unstitched`, `unit_price`, `gst`, `discount_percentage`, `price`, `currency`, `item_size`, `alterations`, `alter_sleeves`, `alter_dress`, `sleeve_json`, `dress_json`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'placed', 14, NULL, 1, NULL, NULL, NULL, 6290, NULL, NULL, 6290, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-22 08:14:58', '2021-09-22 08:14:58'),
(2, 2, 2, 'placed', 9, NULL, 1, NULL, NULL, NULL, 6290, NULL, NULL, 6290, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-22 10:10:46', '2021-09-22 10:10:46'),
(3, 3, 3, 'placed', 9, NULL, 1, NULL, NULL, NULL, 6290, NULL, NULL, 6290, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-22 10:14:53', '2021-09-22 10:14:53'),
(5, 5, NULL, 'hold', 9, NULL, 1, NULL, NULL, NULL, 6290, NULL, NULL, 6290, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-22 10:34:45', '2021-09-22 10:34:45'),
(7, 7, NULL, 'hold', 3, NULL, 1, NULL, NULL, NULL, 3890, NULL, NULL, 3890, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-23 11:13:45', '2021-09-23 11:13:45'),
(8, 8, 4, 'placed', 9, NULL, 1, NULL, NULL, NULL, 6290, NULL, NULL, 6290, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-23 11:15:05', '2021-09-23 11:15:05'),
(9, 8, 4, 'placed', 3, NULL, 1, NULL, NULL, NULL, 3890, NULL, NULL, 3890, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-23 11:15:39', '2021-09-23 11:15:39'),
(10, 9, 5, 'placed', 6, NULL, 4, NULL, NULL, NULL, 3990, NULL, NULL, 15960, 'INR', 'XL', NULL, 'no', 'no', NULL, NULL, '2021-09-23 12:01:29', '2021-09-23 12:01:34'),
(12, 10, 6, 'placed', 13, NULL, 2, NULL, NULL, NULL, 2090, NULL, NULL, 4180, 'INR', 'M', '{\"chest\":\"32\",\"waist\":\"34\",\"hip\":\"28\",\"dressLength\":\"22\"}', 'no', 'yes', '{\"sleeveLength\":\"23\",\"sleeveArmhole\":\"199\",\"sleeveCircumference\":\"133\"}', NULL, '2021-09-23 12:28:09', '2021-09-23 12:30:17'),
(13, 11, 7, 'placed', 9, NULL, 1, NULL, NULL, NULL, 6290, NULL, NULL, 6290, 'INR', 'M', '{\"chest\":\"24\",\"waist\":\"25\",\"hip\":\"26\",\"dressLength\":\"27\"}', 'yes', 'yes', '{\"sleeveLength\":\"20\",\"sleeveArmhole\":\"30\",\"sleeveCircumference\":\"30\"}', NULL, '2021-09-23 12:47:14', '2021-09-23 12:48:07'),
(15, 12, NULL, 'hold', 114, NULL, 1, NULL, NULL, NULL, 580, NULL, NULL, 580, 'INR', 'XL', NULL, 'no', 'no', NULL, NULL, '2021-09-23 12:52:54', '2021-09-23 12:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `cat_image` varchar(255) DEFAULT NULL,
  `desc` text,
  `position_score` int(11) DEFAULT NULL COMMENT 'between 0 to 1000',
  `slug` varchar(255) NOT NULL,
  `shipping_weight` float DEFAULT NULL,
  `applicable_attributes` text,
  `seo_title` text,
  `seo_desc` text,
  `seo_keywords` text,
  `product_upload_path` varchar(255) DEFAULT NULL,
  `size_chart` varchar(255) DEFAULT NULL,
  `measurement_chart` varchar(255) DEFAULT NULL,
  `sku_prefix` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `cat_image`, `desc`, `position_score`, `slug`, `shipping_weight`, `applicable_attributes`, `seo_title`, `seo_desc`, `seo_keywords`, `product_upload_path`, `size_chart`, `measurement_chart`, `sku_prefix`, `created_at`, `updated_at`) VALUES
(1, 'Anarkali', 0, '', 'Choose from a wide range of ready to wear and party wear anarkalis. Exclusive designs, trendy colours and contemporary styles for the #BeautifulYou', 2, 'anarkali', 1.5, '[\"collection\",\"color\",\"color_title\",\"dress_length\",\"fabric\",\"skirt_length\",\"sleeve\",\"un_stitched\",\"zip\"]', 'Buy Ready To Wear Online - for Indian women', 'Buy Kurtis online - Indian ethnic designer Kurtis, Lehengas, Anarkali suits, Salwar suits and Ready To Wear for all occasions. Kurtis for women and Kurtas for girls with international shipping. Ready To Wear for Indian Women', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Ready To Wear, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, buy Ready To Wear dresses online', 'anarkali', NULL, NULL, 'ANRK', NULL, NULL),
(4, 'party wear anarkali', 1, '', 'Shop for all types of occasions. You can find anarkalis in silk, satin, net, georgette  in a wide range of colours and latest styles.\n', 0, 'party-wear', 1.5, '', 'Buy Party Wear Online - for Indian women', 'Buy Kurtis online - Indian ethnic designer Kurtis, Lehengas, Anarkali suits, Salwar suits and Party Wear for all occasions. Kurtis for women and Kurtas for girls with international shipping. Party Wear for Indian Women', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Party Wear, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, buy Party Wear dresses online', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'regular wear anarkali', 1, '', 'Shop for stylish, ethnic everyday wear. Cotton, silk, georgette, net, satin anarkalis suitable for daily wear.\n', 0, 'regular-wear', 1.5, '', 'Buy Regular Wear Online - for Indian women', 'Buy Kurtis online - Indian ethnic designer Kurtis, Lehengas, Anarkali suits, Salwar suits and Regular Wear for all occasions. Kurtis for women and Kurtas for girls with international shipping. Regular Wear for Indian Women', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Regular Wear, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, buy Regular Wear dresses online', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'kurtis', 0, '', 'Choose from a large collection of kurtas and kurtis for daily wear and special occasions. Cotton, georgette, silk kurtas in different patterns, colours and designs.', 1, 'kurtis', 0.5, '[\"chest_pads\",\"collection\",\"color\",\"color_title\",\"cut\",\"dress_length\",\"fabric\",\"sleeves\"]', 'Buy Kurtis Online - for Indian women', 'Buy Kurtis online - Indian ethnic designer Kurtis, Lehengas, Anarkali suits, Salwar suits and Kurtis for all occasions. Kurtis for women and Kurtas for girls with international shipping. Kurtis for Indian Women', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Kurtis, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, buy Kurtis dresses online', 'kurtis', NULL, NULL, 'K', NULL, NULL),
(8, 'Dress Material', 0, '', 'Dress Material', 1, 'dress-material', 1, '[\"chest_pads\",\"collection\",\"color\",\"color_title\",\"cut\",\"dress_length\",\"dupatta\",\"fabric\",\"sleeve\",\"zip\"]', 'Buy Dress Material Online - for Indian women', 'Buy Kurtis online - Indian ethnic designer Kurtis, Lehengas, Anarkali suits, Salwar suits and Dress Material for all occasions. Kurtis for women and Kurtas for girls with international shipping. Dress Material for Indian Women', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Dress Material, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, buy Dress Material dresses online', NULL, NULL, NULL, 'DM', NULL, NULL),
(9, 'Offers', 0, '', '', 0, 'offers', 1.5, '', 'Avail Amazing Discounts While Shopping Online', 'Shop online for designer kurtis, chanderi silk anarkali, party wears, lehengas and other Indian outfits and avail fabulous discounts ', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Offers, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, amazing Offers on dresses online', NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'mix and match', 0, '', '', 9, 'mix-and-match', 0, '', 'Buy Mix And Match Online - for Indian women', 'Buy Kurtis online - Indian ethnic designer Kurtis, Lehengas, Anarkali suits, Salwar suits and Mix And Match for all occasions. Kurtis for women and Kurtas for girls with international shipping. Mix And Match for Indian Women', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Mix And Match, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, buy Mix And Match dresses online', NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'leggings', 0, '', 'Pick the perfect colour of leggings from the wide palette we offer. Mix and match them with the kurtas/kurtis and anarkalis.', 0, 'leggings', 0.2, '[\"collection\",\"color\",\"color_title\",\"cut\",\"dress_length\"]', 'Buy Leggings Online - for Indian women', 'Buy Kurtis online - Indian ethnic designer Kurtis, Lehengas, Anarkali suits, Salwar suits and Leggings for all occasions. Kurtis for women and Kurtas for girls with international shipping. Leggings for Indian Women', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Leggings, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, buy Leggings dresses online', 'leggings', NULL, NULL, 'LG', NULL, NULL),
(14, 'catalogue collections', 1, '', '', 0, 'catalogue-collections', 1.5, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'lehengas', 0, '', 'lehengas', 3, 'lehengas', 2.5, '[\"bottom\",\"can_can\",\"chest_pads\",\"collection\",\"color\",\"color_title\",\"fabric\",\"skirt_length\",\"sleeves\",\"zip\"]', 'Buy Lehengas Online - for Indian women', 'Buy Kurtis online - Indian ethnic designer Kurtis, Lehengas, Anarkali suits, Salwar suits and Lehengas for all occasions. Kurtis for women and Kurtas for girls with international shipping. Lehengas for Indian Women', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Lehengas, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, buy Lehengas dresses online', 'lehengas', NULL, NULL, 'LE', NULL, NULL),
(16, 'straight cuts', 17, '', 'Browse through our straight cuts, a classic ethnic wear design, is simple and made for everyday wear. Available in a wide range of colours, designs and styles.\n', 0, 'straight-cuts', 1, '', 'Buy Straight Cuts Online - for Indian women', 'Buy Kurtis online - Indian ethnic designer Kurtis, Lehengas, Anarkali suits, Salwar suits and Straight Cuts for all occasions. Kurtis for women and Kurtas for girls with international shipping. Straight Cuts for Indian Women', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Straight Cuts, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, buy Straight Cuts dresses online', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'Suit set', 0, '', 'Choose from exquisite designs, attractive colors and modern cuts. ', 0, 'suit-set', 1, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'Silk Kurtis', 6, '', 'Shop for silk kurtis/kurtas that you can wear for parties as well as for everyday occasions. Chanderi, raw silk and many more to choose from.\n', 0, 'silk-kurtis', 0.5, '', 'Buy Silk Kurtis Online - for Indian women', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'Cotton kurtis', 6, '', 'Shop from a wide range of cotton kurtis/kurtas if you like to wear something comfortable yet stylish. Available in different colours, designs and cuts.\n', 0, 'cotton-kurtis', 0.5, '', 'Buy Cotton Kurtis Online - for Indian women', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'Georgette Kurtis', 6, '', 'Shop for georgette kurtis/kurtas in  different patterns, colors and designs, fit for all occasions. \n', 0, 'georgette-kurtis', 0.5, '', 'Buy Georgette Kurtis Online - for Indian women', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'Crop Tops', 15, '', '', 0, 'crop-tops', 1.5, '', 'Buy Crop Tops Online - for Indian women', 'Buy Crop Tops online - Indian ethnic designer Kurtis, Lehengas, Anarkali suits, Salwar suits and Lehengas for all occasions. Kurtis for women and Kurtas for girls with international shipping. Crop Tops for Indian Women', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Lehengas, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, buy Crop Tops online', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Straight cut suits', 0, '', 'Shop for all types of occasions. You can find anarkalis in silk, satin, net, georgette  in a wide range of colours and latest styles.', 0, 'straight-cut-suits', 1, '', 'Straight Cut Suits', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'kurti sets', 6, '', 'Choose from a large collection of kurtas and kurtis for daily wear and special occasions. Cotton, georgette, silk kurtas in different patterns, colours and designs.', 0, 'kurti-sets', 0.5, '', 'Buy Kurtis Online - for Indian women', 'Buy Kurtis online - Indian ethnic designer Kurtis, Lehengas, Anarkali suits, Salwar suits and Kurtis for all occasions. Kurtis for women and Kurtas for girls with international shipping. Kurtis for Indian Women', 'Kurti, Kurta, Lehengas, Anarkali suits, Salwar suits, Women, Kurtis, designer, buy online, Buy Kurti online, Buy Kurta online, Chanderi, Silk, Cotton, Dresses, Dress Material, International shipping, buy anarkali suits online, buy Kurtis dresses online', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'Shararas/Ghararas', 0, '', '', 0, 'ghararas', 1.5, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'Kids Wear', 0, '', 'Kids Wear', 1, 'kids-wear', 1, '[\"bottom\",\"collection\",\"color\",\"dress_length\",\"fabric\",\"skirt_length\",\"sleeve\",\"zip\"]', 'Buy Taruni Kids Clothes Online | Online Shopping for Kids Wear - Taruni.in', 'Buy Kids Clothes Online at Taruni. in. Shop for a stylish girl clothes online available from our huge collections, exciting design and color with different Sizes.', NULL, 'kids_wear', NULL, NULL, 'KID', NULL, NULL),
(27, 'Accessories', 0, '', '', 0, 'accessories', 0, '', 'Accessories: Buy Fashion Jewellery for Women Online | Ethnic Fashion Jewelry Online', 'Buy latest fashion Jewellery for women online. We offer a huge collection of artificial, imitation, traditional & designer Jewellery. Shop for latest fashion Jewelry Designs at Taruni.in.', '', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'Dupattas', 0, '', 'dupattas', 0, 'dupattas', 0, '[\"collection\",\"color\",\"fabric\",\"length\",\"width\",\"work\"]', NULL, NULL, NULL, NULL, NULL, NULL, 'DU', NULL, NULL),
(29, 'Bags', 0, '', '', 0, 'bags', 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(30, 'Pants', 31, '', '', 0, 'pants', 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(31, 'Palazzos & Pants', 0, '', '', 0, 'palazzos-pants', 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'Palazzos', 31, '', '', 0, 'palazzos', 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(33, 'Juttis', 0, '', '', 0, 'juttis', 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(34, 'Bangles', 0, '', '', 100, 'bangles', 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(35, 'Sandals', 0, '', 'Sandals', 0, 'sandals', 0, '[\"color\",\"design\",\"fabric\"]', NULL, NULL, NULL, 'sandals', NULL, NULL, 'SAN', NULL, NULL),
(36, 'Discounts', 0, '', '', 0, 'discounts', 0, '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Earrings', 0, '', '', 0, 'earrings', 0, '[\"certificate_number\",\"screw_type\"]', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `message` text,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `content_pages`
--

CREATE TABLE `content_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `CouponID` int(11) NOT NULL,
  `Coupon_title` varchar(100) NOT NULL,
  `CouponCode` varchar(20) NOT NULL,
  `CouponAddedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CouponExpiryDate` date NOT NULL,
  `Description` varchar(100) NOT NULL,
  `DiscountType` char(10) NOT NULL,
  `Discount_value` float NOT NULL,
  `Cartamount` float NOT NULL,
  `Couponamount` float NOT NULL,
  `Is_Active` tinyint(1) NOT NULL DEFAULT '1',
  `Is_public` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`CouponID`, `Coupon_title`, `CouponCode`, `CouponAddedon`, `CouponExpiryDate`, `Description`, `DiscountType`, `Discount_value`, `Cartamount`, `Couponamount`, `Is_Active`, `Is_public`) VALUES
(7, 'Rs.500 off', 'WLCM10', '2020-09-29 01:45:51', '2021-09-30', 'Get Rs.500 off on your first order', 'PCTG', 10, 0, 0, 1, 1),
(8, 'Rs.1000 off', 'FXD1000', '2020-09-29 01:45:51', '2021-09-30', 'Get Rs.1000 off on your first order', 'FXD', 1000, 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `f_a_qs`
--

CREATE TABLE `f_a_qs` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `page_content` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `f_a_qs`
--

INSERT INTO `f_a_qs` (`id`, `page_title`, `slug`, `page_content`, `created_at`, `updated_at`) VALUES
(1, 'PRODUCTS RELATED', 'products-related', '<p>PRODUCTS RELATED</p>', '2021-08-24 12:06:03', '2021-08-24 12:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `help_tickets`
--

CREATE TABLE `help_tickets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `issue` varchar(255) DEFAULT NULL,
  `message` text,
  `status` enum('pending','closed') NOT NULL DEFAULT 'pending',
  `status_remarks` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `linked_social_accounts`
--

CREATE TABLE `linked_social_accounts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider_name` varchar(100) DEFAULT NULL,
  `provider_id` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `linked_social_accounts`
--

INSERT INTO `linked_social_accounts` (`id`, `user_id`, `provider_name`, `provider_id`, `created_at`, `updated_at`) VALUES
(1, 22, 'google', '104963560419470644470', '2021-09-22 09:49:19', '2021-09-22 09:49:19'),
(2, 23, 'google', '107328699387254293589', '2021-09-23 11:16:15', '2021-09-23 11:16:15'),
(3, 24, 'google', '111354371796061267630', '2021-09-23 11:53:52', '2021-09-23 11:53:52'),
(4, 25, 'google', '106411114446161022054', '2021-09-23 12:01:58', '2021-09-23 12:01:58');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `plot_no` varchar(150) DEFAULT NULL,
  `street` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `state` varchar(70) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `pincode` varchar(15) DEFAULT NULL,
  `primary_phone` varchar(20) DEFAULT NULL,
  `secondary_phone` varchar(20) DEFAULT NULL,
  `map_iframe` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `plot_no`, `street`, `city`, `state`, `country`, `pincode`, `primary_phone`, `secondary_phone`, `map_iframe`, `created_at`, `updated_at`) VALUES
(1, 'Ameerpet', '8-3-945/1', 'Ground Floor, Vishnu Classic, Ameerpet', 'Hyderabad', 'Telangana', 'India', '500086', '040-23736937', '040-40136132', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3806.596961676061!2d78.44573671424185!3d17.431119206131882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb90cbe6edde75%3A0xff686d2243b2b9e8!2sTaruni!5e0!3m2!1sen!2sin!4v1536323849265\" width=\"200\" height=\"200\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '2021-08-13 18:04:18', '2021-08-13 18:04:18');

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
(2, 'header-menu', 'KIDS', 2, NULL, 'Yes', NULL, 'https://taruni.in/v2/category/kids-wear', 'col-2', 'Yes', 'No', '2021-08-09 09:06:22', '2021-08-10 08:50:05'),
(3, 'header-menu', 'ACCESSORIES', 3, NULL, 'Yes', NULL, '', 'col-3', 'Yes', 'No', '2021-08-09 09:06:47', '2021-08-09 09:06:47'),
(5, 'header-menu', 'Anarkali', 1, NULL, 'No', NULL, 'https://taruni.in/v2/category/anarkali', 'col-1', 'Yes', 'No', '2021-08-09 09:23:36', '2021-08-09 09:23:36'),
(9, 'header-menu', 'Kurtis', 5, NULL, 'No', NULL, 'https://taruni.in/v2/category/kurtis', 'col-1', 'Yes', 'No', '2021-08-09 09:27:57', '2021-08-10 08:48:58'),
(10, 'header-menu', 'Leggings', 6, NULL, 'No', NULL, 'https://taruni.in/v2/category/leggings', 'col-1', 'Yes', 'No', '2021-08-09 09:28:26', '2021-08-10 08:49:14'),
(11, 'header-menu', 'Lehengas', 7, NULL, 'No', NULL, 'https://taruni.in/v2/category/lehengas', 'col-1', 'Yes', 'No', '2021-08-09 09:28:57', '2021-08-10 08:49:27'),
(16, 'header-menu', 'Sandals', 4, NULL, 'No', NULL, 'https://taruni.in/v2/category/sandals', 'col-3', 'Yes', 'No', '2021-08-09 09:31:46', '2021-09-22 07:08:49'),
(17, 'footer-widget-1', 'CATEGORIES', 1, NULL, 'Yes', NULL, '', 'col-1', 'Yes', 'No', '2021-08-09 09:42:15', '2021-08-09 09:42:32'),
(20, 'footer-widget-1', 'Anarkali', 1, NULL, 'No', NULL, 'https://taruni.in/v2/category/anarkali', 'col-1', 'Yes', 'No', '2021-08-09 10:36:52', '2021-09-22 07:09:13'),
(22, 'footer-widget-1', 'Lehengas', 3, NULL, 'No', NULL, 'https://taruni.in/v2/category/lehengas', 'col-1', 'Yes', 'No', '2021-08-10 17:33:26', '2021-09-22 07:09:44'),
(23, 'footer-widget-1', 'Lehengas', 3, NULL, 'No', NULL, 'https://taruni.in/v2/category/lehengas', 'col-1', 'Yes', 'No', '2021-08-26 10:37:52', '2021-09-22 13:15:03'),
(24, 'footer-widget-1', 'Kurtis', 5, NULL, 'No', NULL, 'https://taruni.in/v2/category/kurtis', 'col-1', 'Yes', 'No', '2021-08-26 10:39:13', '2021-09-22 07:10:58'),
(25, 'footer-widget-1', 'Collections', 2, NULL, 'Yes', NULL, '', 'col-2', 'Yes', 'No', '2021-08-26 10:39:55', '2021-08-26 10:39:55'),
(30, 'footer-widget-1', 'Sandals', 4, NULL, 'No', NULL, 'https://taruni.in/v2/category/sandals', 'col-2', 'Yes', 'No', '2021-08-26 10:55:14', '2021-09-22 07:11:50'),
(38, 'footer-widget-1', 'Look Books', 1, NULL, 'Yes', NULL, '', 'col-3', 'Yes', 'No', '2021-08-26 15:25:14', '2021-08-26 15:25:14'),
(39, 'footer-widget-1', 'Look Books', 1, NULL, 'No', NULL, '', 'col-3', 'Yes', 'No', '2021-08-26 15:25:48', '2021-08-26 15:25:48'),
(40, 'footer-widget-1', 'Help', 1, NULL, 'Yes', NULL, '', 'col-4', 'Yes', 'No', '2021-08-26 15:26:18', '2021-08-26 15:26:18'),
(41, 'footer-widget-1', 'Blog', 1, NULL, 'No', NULL, '', 'col-4', 'Yes', 'No', '2021-08-26 15:26:50', '2021-08-26 15:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_06_21_041053_create_categories_table', 2),
(10, '2021_06_21_045011_create_products_table', 3),
(11, '2021_06_21_161855_create_content_pages_table', 3),
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_06_21_041053_create_categories_table', 2),
(10, '2021_06_21_045011_create_products_table', 3),
(11, '2021_06_21_161855_create_content_pages_table', 3),
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2021_06_21_041053_create_categories_table', 2),
(10, '2021_06_21_045011_create_products_table', 3),
(11, '2021_06_21_161855_create_content_pages_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `my_coupons`
--

CREATE TABLE `my_coupons` (
  `CouponID` int(11) NOT NULL,
  `Coupon_title` varchar(100) NOT NULL,
  `CouponCode` varchar(20) NOT NULL,
  `CouponAddedon` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CouponExpiryDate` date NOT NULL,
  `Description` varchar(100) NOT NULL,
  `DiscountType` char(10) NOT NULL,
  `Discount_value` float NOT NULL,
  `Cartamount` float NOT NULL,
  `Couponamount` float NOT NULL,
  `Is_Active` tinyint(1) NOT NULL DEFAULT '1',
  `Is_public` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_coupons`
--

INSERT INTO `my_coupons` (`CouponID`, `Coupon_title`, `CouponCode`, `CouponAddedon`, `CouponExpiryDate`, `Description`, `DiscountType`, `Discount_value`, `Cartamount`, `Couponamount`, `Is_Active`, `Is_public`) VALUES
(7, 'Rs.500 off', 'FIRST', '2020-09-29 01:45:51', '2021-09-30', 'Get Rs.500 off on your first order', 'fixed', 500, 0, 0, 1, 1);

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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_fit_profile`
--

INSERT INTO `my_fit_profile` (`id`, `profile_name`, `attach_sleeves`, `sleeve_length`, `armhole`, `sleeve_circumference`, `chest`, `waist`, `hips`, `top_length`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'jayaraju', 'yes', '35', '35', '46', '45', '25', 'standard', '60', 17, '2021-08-26 12:48:17', '2021-08-26 12:48:17'),
(4, 'jayaraju', 'no', '25', '45', '42', '45', '58', '47', '4521', 18, '2021-08-30 12:04:30', '2021-08-30 12:04:30'),
(5, 'jayaraju', 'no', '44', '51', '42', '42', '45', '41', '52', 12, '2021-08-31 04:48:47', '2021-08-31 04:48:47');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Taruni Personal Access Client', 'woiDI5LhY6C54ii5xlB2NoqH41fHbkRf5BmEjCGI', NULL, 'http://localhost', 1, 0, 0, '2021-08-31 02:29:56', '2021-08-31 02:29:56'),
(2, NULL, 'Taruni Password Grant Client', 'BAFJtyIjvnrBDJQamUQMQYO0rNOXaxCCDmbXyaDZ', 'users', 'http://localhost', 0, 1, 0, '2021-08-31 02:29:56', '2021-08-31 02:29:56'),
(1, NULL, 'Taruni Personal Access Client', 'woiDI5LhY6C54ii5xlB2NoqH41fHbkRf5BmEjCGI', NULL, 'http://localhost', 1, 0, 0, '2021-08-31 02:29:56', '2021-08-31 02:29:56'),
(2, NULL, 'Taruni Password Grant Client', 'BAFJtyIjvnrBDJQamUQMQYO0rNOXaxCCDmbXyaDZ', 'users', 'http://localhost', 0, 1, 0, '2021-08-31 02:29:56', '2021-08-31 02:29:56'),
(1, NULL, 'Taruni Personal Access Client', 'woiDI5LhY6C54ii5xlB2NoqH41fHbkRf5BmEjCGI', NULL, 'http://localhost', 1, 0, 0, '2021-08-31 02:29:56', '2021-08-31 02:29:56'),
(2, NULL, 'Taruni Password Grant Client', 'BAFJtyIjvnrBDJQamUQMQYO0rNOXaxCCDmbXyaDZ', 'users', 'http://localhost', 0, 1, 0, '2021-08-31 02:29:56', '2021-08-31 02:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-08-31 02:29:56', '2021-08-31 02:29:56'),
(1, 1, '2021-08-31 02:29:56', '2021-08-31 02:29:56'),
(1, 1, '2021-08-31 02:29:56', '2021-08-31 02:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT '0',
  `order_id` varchar(100) DEFAULT NULL,
  `order_number` int(11) DEFAULT '0',
  `checked_out` int(11) DEFAULT NULL,
  `discount_coupon` float DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `total_items` char(20) DEFAULT '0',
  `total_shipping_weight` float DEFAULT NULL,
  `total_shipping_fee` float DEFAULT '0',
  `cod_fee` float DEFAULT NULL,
  `grand_total` float DEFAULT NULL,
  `currency` varchar(50) DEFAULT 'inr',
  `bill_to_name` varchar(255) DEFAULT NULL,
  `bill_to_email` varchar(255) DEFAULT NULL,
  `bill_to_phone` varchar(255) DEFAULT NULL,
  `bill_to_address` text,
  `bill_to_city` text,
  `bill_to_state` text,
  `bill_to_country` text,
  `bill_to_postalcode` varchar(255) DEFAULT NULL,
  `ship_to_name` varchar(255) DEFAULT NULL,
  `ship_to_email` varchar(255) DEFAULT NULL,
  `ship_to_phone` varchar(255) DEFAULT NULL,
  `ship_to_alt_phone` varchar(100) DEFAULT NULL,
  `ship_to_address` text,
  `ship_to_city` text,
  `ship_to_state` text,
  `ship_to_country` text,
  `ship_to_country_id` int(11) DEFAULT NULL,
  `ship_to_state_id` int(11) DEFAULT NULL,
  `ship_to_city_id` int(11) DEFAULT NULL,
  `ship_to_postalcode` char(20) DEFAULT NULL,
  `payment_mode` text,
  `gateway_name` varchar(100) DEFAULT NULL,
  `tax_percentage` float DEFAULT NULL,
  `shipping_rate` int(11) DEFAULT NULL,
  `shipping_base_price` float DEFAULT NULL,
  `shipping_cost` float DEFAULT NULL,
  `shipping_time` text,
  `shipping_time_id` int(11) DEFAULT NULL,
  `shipping_rate_id` int(11) DEFAULT NULL,
  `our_hash` text,
  `clicked_paypal` int(11) DEFAULT NULL,
  `v_ip` text,
  `v_user_agent` text,
  `v_platform` varchar(255) DEFAULT NULL,
  `v_browser` varchar(100) DEFAULT NULL,
  `v_is_mobile` int(11) DEFAULT NULL,
  `v_mobile_type` varchar(100) DEFAULT NULL,
  `v_is_bot` int(11) DEFAULT NULL,
  `v_source_url` text,
  `v_landed_on` text,
  `utm_source` text,
  `utm_medium` text,
  `utm_campaign` text,
  `utm_term` text,
  `utm_content` text,
  `v_failed_campaigns` text,
  `guest_checkout` enum('yes','no') DEFAULT 'no',
  `went_to_gateway` int(11) DEFAULT NULL,
  `returned_from_gateway` char(10) DEFAULT NULL,
  `payment_status` text,
  `razor_payorderid` char(40) DEFAULT NULL,
  `order_status` enum('hold','placed','confirmed','processing','delivered') DEFAULT 'hold',
  `schedule_discount` datetime DEFAULT NULL,
  `abandoned_coupon_id` int(11) DEFAULT NULL,
  `last_discount_mailer` datetime DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `user_id`, `cart_id`, `order_id`, `order_number`, `checked_out`, `discount_coupon`, `total_amount`, `total_items`, `total_shipping_weight`, `total_shipping_fee`, `cod_fee`, `grand_total`, `currency`, `bill_to_name`, `bill_to_email`, `bill_to_phone`, `bill_to_address`, `bill_to_city`, `bill_to_state`, `bill_to_country`, `bill_to_postalcode`, `ship_to_name`, `ship_to_email`, `ship_to_phone`, `ship_to_alt_phone`, `ship_to_address`, `ship_to_city`, `ship_to_state`, `ship_to_country`, `ship_to_country_id`, `ship_to_state_id`, `ship_to_city_id`, `ship_to_postalcode`, `payment_mode`, `gateway_name`, `tax_percentage`, `shipping_rate`, `shipping_base_price`, `shipping_cost`, `shipping_time`, `shipping_time_id`, `shipping_rate_id`, `our_hash`, `clicked_paypal`, `v_ip`, `v_user_agent`, `v_platform`, `v_browser`, `v_is_mobile`, `v_mobile_type`, `v_is_bot`, `v_source_url`, `v_landed_on`, `utm_source`, `utm_medium`, `utm_campaign`, `utm_term`, `utm_content`, `v_failed_campaigns`, `guest_checkout`, `went_to_gateway`, `returned_from_gateway`, `payment_status`, `razor_payorderid`, `order_status`, `schedule_discount`, `abandoned_coupon_id`, `last_discount_mailer`, `verified`, `created_at`, `updated_at`) VALUES
(1, '21', 21, 1, NULL, 1, NULL, 0, 6290, '1', 0, 0, 0, 6290, 'INR', 'jayaraju vangapandu', 'jayarajuv5@gmail.com', '9700334319', 'Vijayawada', 'Vijayawada', 'AP', 'india', '520004', 'jayaraju vangapandu', 'jayarajuv5@gmail.com', '9700334319', NULL, 'Vijayawada', 'Vijayawada', 'AP', 'india', NULL, NULL, NULL, '520004', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, 'yes', 'paid', NULL, 'processing', NULL, NULL, NULL, NULL, '2021-09-22 08:17:07', '2021-09-22 11:49:26'),
(2, '11', 11, 2, NULL, 2, NULL, 0, 6290, '1', 0, 0, 0, 6290, 'INR', 'Venkat Yadav', 'admin@taruni.in', '9052691535', 'Banjara hills, road no 12 hyd', 'Hyderabad', 'TG', 'india', '500034', 'Venkat Yadav', 'admin@taruni.in', '9052691535', NULL, 'Banjara hills, road no 12 hyd', 'Hyderabad', 'TG', 'india', NULL, NULL, NULL, '500034', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-22 10:12:45', '2021-09-22 10:12:45'),
(3, '22', 22, 3, NULL, 3, NULL, 0, 6290, '1', 0, 0, 0, 6290, 'INR', 'Venkat Yadav K', 'venkat@deepredink.com', '9052691535', 'NA', 'Hyd', 'TS', 'india', '500034', 'Venkat Yadav K', 'venkat@deepredink.com', '9052691535', NULL, 'NA', 'Hyd', 'TS', 'india', NULL, NULL, NULL, '500034', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-22 10:28:38', '2021-09-22 10:28:38'),
(4, '23', 23, 8, NULL, 4, NULL, 0, 10180, '2', 0, 0, 0, 10180, 'INR', 'Sri Lakshmi Priya Valluri', 'priya@deepredink.com', '8978850982', '', 'Ramachandrapuram', 'Andhra Pradesh', 'india', '533255', 'Sri Lakshmi Priya Valluri', 'priya@deepredink.com', '8978850982', NULL, '', 'Ramachandrapuram', 'Andhra Pradesh', 'india', NULL, NULL, NULL, '533255', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'yes', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-23 11:31:32', '2021-09-23 11:31:32'),
(5, '24', 24, 9, NULL, 5, NULL, 0, 15960, '1', 0, 0, 0, 15960, 'INR', 'Harish Babu', 'harish.gorantla123@gmail.com', '99 1234567', 'Vijaya Durga, B-block, Nagarjuna Homes, Nizampet road, Kukatpally', 'Hyderabad', 'Telangana', 'india', 'hgkhgj', 'Harish Babu', 'harish.gorantla123@gmail.com', '99 1234567', NULL, 'Vijaya Durga, B-block, Nagarjuna Homes, Nizampet road, Kukatpally', 'Hyderabad', 'Telangana', 'india', NULL, NULL, NULL, 'hgkhgj', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-23 12:02:59', '2021-09-23 12:02:59'),
(6, '25', 25, 10, NULL, 6, NULL, 389, 4180, '1', 0, 0, 0, 3791, 'INR', 'shubhang yadav s', 'imshubhang@gmail.com', '8000000404004040', '', 'hyderabad99', 'Telangana09', 'india', 'hi009', 'shubhang yadav s', 'imshubhang@gmail.com', '8000000404004040', NULL, '', 'hyderabad99', 'Telangana09', 'india', NULL, NULL, NULL, 'hi009', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-23 12:37:14', '2021-09-23 12:37:14'),
(7, '24', 24, 11, NULL, 7, NULL, 0, 6290, '1', 0, 0, 0, 6290, 'INR', 'Harish G', 'harish.babu@deepredink.com', '88   884569', 'Vijaya Durga, B-block, Nagarjuna Homes, Nizampet road, Kukatpally', 'Hyderabad', 'Telangana', 'india', 'hgkhgj', 'Harish G', 'harish.babu@deepredink.com', '88   884569', NULL, 'Vijaya Durga, B-block, Nagarjuna Homes, Nizampet road, Kukatpally', 'Hyderabad', 'Telangana', 'india', NULL, NULL, NULL, 'hgkhgj', 'online', 'razorpay', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'no', NULL, 'yes', 'paid', NULL, 'placed', NULL, NULL, NULL, NULL, '2021-09-23 12:51:38', '2021-09-23 12:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `order_number` int(11) DEFAULT '0',
  `item_status` enum('hold','placed','confirmed','processing','delivered') DEFAULT 'hold',
  `sku_id` int(11) NOT NULL,
  `fit_profile_id` int(11) DEFAULT NULL,
  `qty` int(30) DEFAULT NULL,
  `custom` int(11) DEFAULT NULL,
  `custom_standard` int(11) DEFAULT NULL,
  `unstitched` int(11) DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `gst` float DEFAULT NULL,
  `discount_percentage` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `currency` varchar(50) DEFAULT 'inr',
  `item_size` char(20) DEFAULT NULL,
  `alterations` text,
  `alter_sleeves` char(3) DEFAULT NULL,
  `alter_dress` char(3) DEFAULT NULL,
  `sleeve_json` text,
  `dress_json` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `cart_id`, `order_number`, `item_status`, `sku_id`, `fit_profile_id`, `qty`, `custom`, `custom_standard`, `unstitched`, `unit_price`, `gst`, `discount_percentage`, `price`, `currency`, `item_size`, `alterations`, `alter_sleeves`, `alter_dress`, `sleeve_json`, `dress_json`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'placed', 14, NULL, 1, NULL, NULL, NULL, 6290, NULL, NULL, 6290, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-22 08:17:07', '2021-09-22 08:17:07'),
(2, 2, 2, 'placed', 9, NULL, 1, NULL, NULL, NULL, 6290, NULL, NULL, 6290, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-22 10:12:45', '2021-09-22 10:12:45'),
(3, 3, 3, 'placed', 9, NULL, 1, NULL, NULL, NULL, 6290, NULL, NULL, 6290, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-22 10:28:38', '2021-09-22 10:28:38'),
(4, 8, 4, 'placed', 9, NULL, 1, NULL, NULL, NULL, 6290, NULL, NULL, 6290, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-23 11:31:32', '2021-09-23 11:31:32'),
(5, 8, 4, 'placed', 3, NULL, 1, NULL, NULL, NULL, 3890, NULL, NULL, 3890, 'INR', 'M', NULL, 'no', 'no', NULL, NULL, '2021-09-23 11:31:32', '2021-09-23 11:31:32'),
(6, 9, 5, 'placed', 6, NULL, 4, NULL, NULL, NULL, 3990, NULL, NULL, 15960, 'INR', 'XL', NULL, 'no', 'no', NULL, NULL, '2021-09-23 12:02:59', '2021-09-23 12:02:59'),
(7, 10, 6, 'placed', 13, NULL, 2, NULL, NULL, NULL, 2090, NULL, NULL, 4180, 'INR', 'M', '{\"chest\":\"32\",\"waist\":\"34\",\"hip\":\"28\",\"dressLength\":\"22\"}', 'no', 'yes', '{\"sleeveLength\":\"23\",\"sleeveArmhole\":\"199\",\"sleeveCircumference\":\"133\"}', NULL, '2021-09-23 12:37:14', '2021-09-23 12:37:14'),
(8, 11, 7, 'placed', 9, NULL, 1, NULL, NULL, NULL, 6290, NULL, NULL, 6290, 'INR', 'M', '{\"chest\":\"24\",\"waist\":\"25\",\"hip\":\"26\",\"dressLength\":\"27\"}', 'yes', 'yes', '{\"sleeveLength\":\"20\",\"sleeveArmhole\":\"30\",\"sleeveCircumference\":\"30\"}', NULL, '2021-09-23 12:51:38', '2021-09-23 12:51:38');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` blob,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` text COLLATE utf8mb4_unicode_ci,
  `seo_keywords` text COLLATE utf8mb4_unicode_ci,
  `location_map_url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `description`, `short_description`, `created_at`, `updated_at`, `published_date`, `image`, `seo_title`, `seo_description`, `seo_keywords`, `location_map_url`) VALUES
(1, 'Terms & Conditions', 'terms-conditions', 0x3c68333e3c7374726f6e673e496e74726f64756374696f6e3a3c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e556e64657220746869732063617465676f72792c2077652061696d20746f2070726f7669646520696e666f726d6174696f6e20636f6e7461696e6564206f6e207468652077656273697465206f7220616e79206f662074686520706167657320636f6d70726973696e672074686520776562736974652d283c6120687265663d22687474703a2f2f7777772e746172756e692e696e2f223e7777772e746172756e692e696e3c2f613e29205b3c656d3e63756d756c61746976656c7920726566657272656420746f20266c6471756f3b5765627369746526726471756f3b206f7220266c6471756f3b57656273697465204f776e657226726471756f3b206f7220266c6471756f3b776526726471756f3b206f7220266c6471756f3b757326726471756f3b206f7220266c6471756f3b6f757226726471756f3b3c2f656d3e5d20746f2076697369746f72732028266c6471756f3b76697369746f727326726471756f3b29205b3c656d3e63756d756c61746976656c7920726566657272656420746f20617320266c6471756f3b796f7526726471756f3b206f7220266c6471756f3b796f757226726471756f3b2068657265696e61667465723c2f656d3e5d207375626a65637420746f20746865207072697661637920706f6c69637920616e6420616e79206f746865722072656c6576616e7420706f6c696369657320616e64206e6f7469636573207768696368206d6179206265206170706c696361626c6520746f20612073706563696669632073656374696f6e206f72206d6f64756c65206f662074686520776562736974652f76697369746f722e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e5465726d732026616d703b20436f6e646974696f6e733c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e57656c636f6d6520746f206f75722077656273697465283c6120687265663d22687474703a2f2f7777772e746172756e692e696e2f223e7777772e746172756e692e696e3c2f613e29202e20496620796f7520636f6e74696e756520746f2062726f77736520616e64207573652074686973207765627369746520796f7520617265206167726565696e6720746f20636f6d706c79207769746820616e6420626520626f756e642062792074686520666f6c6c6f77696e67207465726d7320616e6420636f6e646974696f6e73206f66207573652c20776869636820746f6765746865722077697468206f7572207072697661637920706f6c69637920676f7665726e20546172756e6920436c6f7468696e67205076742e4c74642e2072656c6174696f6e73686970207769746820796f7520696e2072656c6174696f6e20746f207468697320776562736974652e3c2f703e0d0a0d0a3c703e546865207465726d20262333393b546172756e69262333393b206f7220262333393b7573262333393b206f7220262333393b7765262333393b2062656c6f6e677320746f20746865206f776e6572206f662074686520776562736974652077686f73652072656769737465726564206f666669636573206973206c6f636174656420696e20536563756e646572616261642c20416d6565727065742c204b756b617470616c6c792c204a7562696c65652048696c6c732c205361726f6f72204e616761722c204543494c2c20566973616b68617061746e616d2c2048616e756d616b6f6e64612c2056696a617961776164612e204f757220636f6d70616e7920726567697374726174696f6e206e756d626572206973205531373132314150323030385054433035373837362e20546865207465726d20262333393b796f75262333393b2072656665727320746f207468652075736572206f7220766965776572206f66206f757220776562736974652e3c2f703e0d0a0d0a3c703e54686520757365206f6620746869732077656273697465206973207375626a65637420746f2074686520666f6c6c6f77696e67207465726d73206f66207573653a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e457665727920736869706d656e7420636f6d65732077697468206120546172756e692062696c6c2077697468696e207468652070617263656c2c20706c656173652072656d656d62657220746f207265616420746865207465726d7320616e6420636f6e646974696f6e73207072696e746564206f6e20746865206261636b206f66207468652062696c6c2e3c2f6c693e0d0a093c6c693e54686520636f6e74656e74206f6620746865207061676573206f662074686973207765627369746520697320666f7220796f75722067656e6572616c20696e666f726d6174696f6e20616e6420757365206f6e6c792e204974206973207375626a65637420746f206368616e676520776974686f7574206e6f746963652e3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c756c3e0d0a093c6c693e4e656974686572207765206e6f7220616e7920746869726420706172746965732070726f7669646520616e792077617272616e7479206f722067756172616e74656520617320746f207468652061636375726163792c2074696d656c696e6573732c20706572666f726d616e63652c20636f6d706c6574656e657373206f7220737569746162696c697479206f662074686520696e666f726d6174696f6e20616e64206d6174657269616c7320666f756e64206f72206f666665726564206f6e2074686973207765627369746520666f7220616e7920706172746963756c617220707572706f73652e20596f752061636b6e6f776c656467652074686174207375636820696e666f726d6174696f6e20616e64206d6174657269616c73206d617920636f6e7461696e20696e61636375726163696573206f72206572726f727320616e6420776520657870726573736c79206578636c756465206c696162696c69747920666f7220616e79207375636820696e61636375726163696573206f72206572726f727320746f207468652066756c6c65737420657874656e74207065726d6974746564206279206c61772e3c2f6c693e0d0a093c6c693e596f757220757365206f6620616e7920696e666f726d6174696f6e206f72206d6174657269616c73206f6e2074686973207765627369746520697320656e746972656c7920617420796f7572206f776e207269736b2c20666f72207768696368207765207368616c6c206e6f74206265206c6961626c652e204974207368616c6c20626520796f7572206f776e20726573706f6e736962696c69747920746f20656e73757265207468617420616e792070726f64756374732c207365727669636573206f7220696e666f726d6174696f6e20617661696c61626c65207468726f75676820746869732077656273697465206d65657420796f757220737065636966696320726571756972656d656e74732e3c2f6c693e0d0a093c6c693e54686973207765627369746520636f6e7461696e73206d6174657269616c207768696368206973206f776e6564206279206f72206c6963656e73656420746f2075732e2054686973206d6174657269616c20696e636c756465732c20627574206973206e6f74206c696d6974656420746f2c207468652064657369676e2c206c61796f75742c206c6f6f6b2c20617070656172616e636520616e642067726170686963732e20526570726f64756374696f6e2069732070726f68696269746564206f74686572207468616e20696e206163636f7264616e636520776974682074686520636f70797269676874206e6f746963652c20776869636820666f726d732070617274206f66207468657365207465726d7320616e6420636f6e646974696f6e732e3c2f6c693e0d0a093c6c693e416c6c2074726164656d61726b7320726570726f647563656420696e2074686973207765627369746520776869636820617265206e6f74207468652070726f7065727479206f662c206f72206c6963656e73656420746f2c20746865206f70657261746f72206172652061636b6e6f776c6564676564206f6e2074686520776562736974652e3c2f6c693e0d0a093c6c693e556e617574686f726973656420757365206f6620746869732077656273697465206d61792067697665207269736520746f206120636c61696d20666f722064616d6167657320616e642f6f722062652061206372696d696e616c206f6666656e63652e3c2f6c693e0d0a093c6c693e46726f6d2074696d6520746f2074696d6520746869732077656273697465206d617920616c736f20696e636c756465206c696e6b7320746f206f746865722077656273697465732e205468657365206c696e6b73206172652070726f766964656420666f7220796f757220636f6e76656e69656e636520746f2070726f76696465206675727468657220696e666f726d6174696f6e2e205468657920646f206e6f74207369676e696679207468617420776520656e646f7273652074686520776562736974652873292e2057652068617665206e6f20726573706f6e736962696c69747920666f722074686520636f6e74656e74206f6620746865206c696e6b656420776562736974652873292e3c2f6c693e0d0a093c6c693e596f75206d6179206e6f74206372656174652061206c696e6b20746f207468697320776562736974652066726f6d20616e6f746865722077656273697465206f7220646f63756d656e7420776974686f757420546172756e69262333393b73207072696f72207772697474656e20636f6e73656e742e3c2f6c693e0d0a093c6c693e596f757220757365206f662074686973207765627369746520616e6420616e7920646973707574652061726973696e67206f7574206f66207375636820757365206f66207468652077656273697465206973207375626a65637420746f20746865206c617773206f6620496e646961206f72206f7468657220726567756c61746f727920617574686f726974792e3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c68333e3c7374726f6e673e436f75706f6e20526564656d7074696f6e205465726d733c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e436f75706f6e20726564656d7074696f6e20697320707572656c79207375626a656374656420746f20737065636966696564207465726d7320616e6420636f6e646974696f6e73206f6e20746172756e692e696e2e20546172756e692e696e20646f6573206e6f74206861766520616e206578697374696e6720706172746e657273686970207769746820616e792065636f6d6d657263652077656273697465732026616d703b20616666696c69617465206164766572746973696e67206167656e636965732e20546172756e692e696e2077696c6c206e6f742061636365707420616e7920636f75706f6e73206c6973746564206f6e2074686972642070617274792077656273697465732e20436f75706f6e732f566f7563686572732063616e6e6f7420626520706f73746564206f722073686172656420627920726563697069656e7473206f6e20736f6369616c206f72207075626c696320666f72756d732061732074686573652061726520706572736f6e616c20636f75706f6e732e3c2f703e, NULL, '2021-08-09 11:32:33', '2021-08-09 11:38:50', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Disclaimer', 'disclaimer', 0x3c68333e3c7374726f6e673e546172756e692e696e20446973636c61696d657220706f6c6963793c2f7374726f6e673e266e6273703b266e6273703b3c2f68333e0d0a0d0a3c703e457665727920736869706d656e7420636f6d65732077697468206120546172756e692062696c6c2077697468696e207468652070617263656c2c20706c656173652072656d656d62657220746f207265616420746865207465726d7320616e6420636f6e646974696f6e73207072696e746564206f6e20746865206261636b206f66207468652062696c6c2e3c2f703e0d0a0d0a3c703e54686520696e666f726d6174696f6e20636f6e7461696e656420696e2074686973207765627369746520697320666f722067656e6572616c20696e666f726d6174696f6e20707572706f736573206f6e6c792e2054686520696e666f726d6174696f6e2069732070726f766964656420627920546172756e6920436c6f7468696e67205076742e4c74642e20616e64207768696c6520776520656e646561766f7220746f206b6565702074686520696e666f726d6174696f6e20757020746f206461746520616e6420636f72726563742c207765206d616b65206e6f20726570726573656e746174696f6e73206f722077617272616e74696573206f6620616e79206b696e642c2065787072657373206f7220696d706c6965642c2061626f75742074686520636f6d706c6574656e6573732c2061636375726163792c2072656c696162696c6974792c20737569746162696c697479206f7220617661696c6162696c6974792077697468207265737065637420746f207468652077656273697465206f722074686520696e666f726d6174696f6e2c2070726f64756374732c2073657276696365732c206f722072656c6174656420677261706869637320636f6e7461696e6564206f6e20746865207765627369746520666f7220616e7920707572706f73652e20416e792072656c69616e636520796f7520706c616365206f6e207375636820696e666f726d6174696f6e206973207468657265666f7265207374726963746c7920617420796f7572206f776e207269736b2e3c2f703e0d0a0d0a3c703e496e206e6f206576656e742077696c6c207765206265206c6961626c6520666f7220616e79206c6f7373206f722064616d61676520696e636c7564696e6720776974686f7574206c696d69746174696f6e2c20696e646972656374206f7220636f6e73657175656e7469616c206c6f7373206f722064616d6167652c206f7220616e79206c6f7373206f722064616d6167652077686174736f657665722061726973696e672066726f6d206c6f7373206f662064617461206f722070726f666974732061726973696e67206f7574206f662c206f7220696e20636f6e6e656374696f6e20776974682c2074686520757365206f66207468697320776562736974652e3c2f703e0d0a0d0a3c703e5468726f7567682074686973207765627369746520796f75206172652061626c6520746f206c696e6b20746f206f7468657220776562736974657320776869636820617265206e6f7420756e6465722074686520636f6e74726f6c206f6620546172756e692e2057652068617665206e6f20636f6e74726f6c206f76657220746865206e61747572652c20636f6e74656e7420616e6420617661696c6162696c697479206f662074686f73652073697465732e2054686520696e636c7573696f6e206f6620616e79206c696e6b7320646f6573206e6f74206e65636573736172696c7920696d706c792061207265636f6d6d656e646174696f6e206f7220656e646f72736520746865207669657773206578707265737365642077697468696e207468656d2e3c2f703e0d0a0d0a3c703e4576657279206566666f7274206973206d61646520746f206b65657020746865207765627369746520757020616e642072756e6e696e6720736d6f6f74686c792e20486f77657665722c20546172756e692074616b6573206e6f20726573706f6e736962696c69747920666f722c20616e642077696c6c206e6f74206265206c6961626c6520666f722c207468652077656273697465206265696e672074656d706f726172696c7920756e617661696c61626c652064756520746f20746563686e6963616c20697373756573206265796f6e64206f757220636f6e74726f6c2e3c2f703e0d0a0d0a3c703e416c6c206f726465727320617265207375626a65637420746f20437573746f6d206475747920616e6420637573746f6d657273206d61792f6d6179206e6f7420626520636861726765642062792074686520676f7665726e6d656e742f6465706172746d656e74206f6620637573746f6d73206f6620746865207265737065637469766520636f756e74727920746f2077686963682070617263656c206973206265696e672064656c6976657265642e2074686573652064757469657320646f206e6f7420636f6d6520756e64657220746865206a7572697364696374696f6e206f6620546172756e692e696e20616e642077696c6c20626520626f726e652f706169642062792074686520637573746f6d65722e3c2f703e, NULL, '2021-08-09 11:33:23', '2021-08-09 11:33:23', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Privacy Policy', 'privacy-policy', 0x3c68333e3c7374726f6e673e5765627369746520707269766163793c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e54686973207072697661637920706f6c6963792073657473206f757420686f7720546172756e69207573657320616e642070726f746563747320616e7920696e666f726d6174696f6e207468617420796f75206769766520546172756e69207768656e20796f7520757365207468697320776562736974652e3c2f703e0d0a0d0a3c703e546172756e6920697320636f6d6d697474656420746f20656e737572696e67207468617420796f757220707269766163792069732070726f7465637465642e2053686f756c642077652061736b20796f7520746f2070726f76696465206365727461696e20696e666f726d6174696f6e20627920776869636820796f752063616e206265206964656e746966696564207768656e207573696e67207468697320776562736974652c207468656e20796f752063616e206265206173737572656420746861742069742077696c6c206f6e6c79206265207573656420696e206163636f7264616e63652077697468207468697320707269766163792073746174656d656e742e3c2f703e0d0a0d0a3c703e546172756e69206d6179206368616e6765207468697320706f6c6963792066726f6d2074696d6520746f2074696d65206279207570646174696e67207468697320706167652e20596f752073686f756c6420636865636b207468697320706167652066726f6d2074696d6520746f2074696d6520746f20656e73757265207468617420796f7520617265206861707079207769746820616e79206368616e6765732e205468697320706f6c696379206973206566666563746976652066726f6d20417072696c2031352c20323031352e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e5768617420776520636f6c6c6563743c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e5765206d617920636f6c6c6563742074686520666f6c6c6f77696e6720696e666f726d6174696f6e3a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e6e616d6520616e64206a6f62207469746c653c2f6c693e0d0a093c6c693e636f6e7461637420696e666f726d6174696f6e20696e636c7564696e6720656d61696c20616464726573733c2f6c693e0d0a093c6c693e64656d6f6772617068696320696e666f726d6174696f6e207375636820617320706f7374636f64652c20707265666572656e63657320616e6420696e746572657374733c2f6c693e0d0a093c6c693e6f7468657220696e666f726d6174696f6e2072656c6576616e7420746f20637573746f6d6572207375727665797320616e642f6f72206f66666572733c2f6c693e0d0a3c2f756c3e0d0a0d0a3c68333e3c7374726f6e673e5768617420776520646f20776974682074686520696e666f726d6174696f6e207765206761746865723c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e57652072657175697265207468697320696e666f726d6174696f6e20746f20756e6465727374616e6420796f7572206e6565647320616e642070726f7669646520796f75207769746820612062657474657220736572766963652c20616e6420696e20706172746963756c617220666f722074686520666f6c6c6f77696e6720726561736f6e733a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e496e7465726e616c207265636f7264206b656570696e672e3c2f6c693e0d0a093c6c693e5765206d6179207573652074686520696e666f726d6174696f6e20746f20696d70726f7665206f75722070726f647563747320616e642073657276696365732e3c2f6c693e0d0a093c6c693e5765206d617920706572696f646963616c6c792073656e642070726f6d6f74696f6e616c20656d61696c732061626f7574206e65772070726f64756374732c207370656369616c206f6666657273206f72206f7468657220696e666f726d6174696f6e207768696368207765207468696e6b20796f75206d61792066696e6420696e746572657374696e67207573696e672074686520656d61696c206164647265737320776869636820796f7520686176652070726f76696465642e3c2f6c693e0d0a093c6c693e46726f6d2074696d6520746f2074696d652c207765206d617920616c736f2075736520796f757220696e666f726d6174696f6e20746f20636f6e7461637420796f7520666f72206d61726b657420726573656172636820707572706f7365732e205765206d617920636f6e7461637420796f7520627920656d61696c2c20534d532c2070686f6e652c20666178206f72206d61696c2e205765206d6179207573652074686520696e666f726d6174696f6e20746f20637573746f6d697365207468652077656273697465206163636f7264696e6720746f20796f757220696e746572657374732e3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c68333e3c7374726f6e673e53656375726974793c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e57652061726520636f6d6d697474656420746f20656e737572696e67207468617420796f757220696e666f726d6174696f6e206973207365637572652e20496e206f7264657220746f2070726576656e7420756e617574686f726973656420616363657373206f7220646973636c6f7375726520776520686176652070757420696e20706c616365207375697461626c6520706879736963616c2c20656c656374726f6e696320616e64206d616e6167657269616c2070726f6365647572657320746f2073616665677561726420616e64207365637572652074686520696e666f726d6174696f6e20776520636f6c6c656374206f6e6c696e652e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e486f772077652075736520636f6f6b6965733c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e4120636f6f6b6965206973206120736d616c6c2066696c652077686963682061736b73207065726d697373696f6e20746f20626520706c61636564206f6e20796f757220636f6d7075746572262333393b7320686172642064726976652e204f6e636520796f752061677265652c207468652066696c6520697320616464656420616e642074686520636f6f6b69652068656c707320616e616c797365207765622074726166666963206f72206c65747320796f75206b6e6f77207768656e20796f75207669736974206120706172746963756c617220736974652e20436f6f6b69657320616c6c6f7720776562206170706c69636174696f6e7320746f20726573706f6e6420746f20796f7520617320616e20696e646976696475616c2e2054686520776562206170706c69636174696f6e2063616e207461696c6f7220697473206f7065726174696f6e7320746f20796f7572206e656564732c206c696b657320616e64206469736c696b657320627920676174686572696e6720616e642072656d656d626572696e6720696e666f726d6174696f6e2061626f757420796f757220707265666572656e6365732e3c2f703e0d0a0d0a3c703e5765207573652074726166666963206c6f6720636f6f6b69657320746f206964656e7469667920776869636820706167657320617265206265696e6720757365642e20546869732068656c707320757320616e616c79736520646174612061626f75742077656270616765207472616666696320616e6420696d70726f7665206f7572207765627369746520696e206f7264657220746f207461696c6f7220697420746f20637573746f6d6572206e656564732e205765206f6e6c7920757365207468697320696e666f726d6174696f6e20666f7220737461746973746963616c20616e616c7973697320707572706f73657320616e64207468656e2074686520646174612069732072656d6f7665642066726f6d207468652073797374656d2e3c2f703e0d0a0d0a3c703e4f766572616c6c2c20636f6f6b6965732068656c702075732070726f7669646520796f75207769746820612062657474657220776562736974652c20627920656e61626c696e6720757320746f206d6f6e69746f7220776869636820706167657320796f752066696e642075736566756c20616e6420776869636820796f7520646f206e6f742e204120636f6f6b696520696e206e6f207761792067697665732075732061636365737320746f20796f757220636f6d7075746572206f7220616e7920696e666f726d6174696f6e2061626f757420796f752c206f74686572207468616e20746865206461746120796f752063686f6f736520746f20736861726520776974682075732e3c2f703e0d0a0d0a3c703e596f752063616e2063686f6f736520746f20616363657074206f72206465636c696e6520636f6f6b6965732e204d6f7374207765622062726f7773657273206175746f6d61746963616c6c792061636365707420636f6f6b6965732c2062757420796f752063616e20757375616c6c79206d6f6469667920796f75722062726f777365722073657474696e6720746f206465636c696e6520636f6f6b69657320696620796f75207072656665722e2054686973206d61792070726576656e7420796f752066726f6d2074616b696e672066756c6c20616476616e74616765206f662074686520776562736974652e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e4c696e6b7320746f206f746865722077656273697465733c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e4f75722077656273697465206d617920636f6e7461696e206c696e6b7320746f206f74686572207765627369746573206f6620696e7465726573742e20486f77657665722c206f6e636520796f7520686176652075736564207468657365206c696e6b7320746f206c65617665206f757220736974652c20796f752073686f756c64206e6f7465207468617420776520646f206e6f74206861766520616e7920636f6e74726f6c206f7665722074686174206f7468657220776562736974652e205468657265666f72652c2077652063616e6e6f7420626520726573706f6e7369626c6520666f72207468652070726f74656374696f6e20616e642070726976616379206f6620616e7920696e666f726d6174696f6e20776869636820796f752070726f76696465207768696c7374207669736974696e67207375636820736974657320616e64207375636820736974657320617265206e6f7420676f7665726e6564206279207468697320707269766163792073746174656d656e742e20596f752073686f756c642065786572636973652063617574696f6e20616e64206c6f6f6b2061742074686520707269766163792073746174656d656e74206170706c696361626c6520746f20746865207765627369746520696e207175657374696f6e2e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e436f6e74726f6c6c696e6720796f757220706572736f6e616c20696e666f726d6174696f6e3c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e596f75206d61792063686f6f736520746f2072657374726963742074686520636f6c6c656374696f6e206f7220757365206f6620796f757220706572736f6e616c20696e666f726d6174696f6e20696e2074686520666f6c6c6f77696e6720776179733a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e7768656e6576657220796f75206172652061736b656420746f2066696c6c20696e206120666f726d206f6e2074686520776562736974652c206c6f6f6b20666f722074686520626f78207468617420796f752063616e20636c69636b20746f20696e646963617465207468617420796f7520646f206e6f742077616e742074686520696e666f726d6174696f6e20746f206265207573656420627920616e79626f647920666f7220646972656374206d61726b6574696e6720707572706f7365733c2f6c693e0d0a093c6c693e696620796f7520686176652070726576696f75736c792061677265656420746f207573207573696e6720796f757220706572736f6e616c20696e666f726d6174696f6e20666f7220646972656374206d61726b6574696e6720707572706f7365732c20796f75206d6179206368616e676520796f7572206d696e6420617420616e792074696d652062792077726974696e6720746f206f7220656d61696c696e67207573206174205b656d61696c20616464726573735d3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c703e57652077696c6c206e6f742073656c6c2c2064697374726962757465206f72206c6561736520796f757220706572736f6e616c20696e666f726d6174696f6e20746f207468697264207061727469657320756e6c657373207765206861766520796f7572207065726d697373696f6e206f7220617265207265717569726564206279206c617720746f20646f20736f2e3c2f703e0d0a0d0a3c703e596f75206d617920726571756573742064657461696c73206f6620706572736f6e616c20696e666f726d6174696f6e20776869636820776520686f6c642061626f757420796f7520756e6465722074686520446174612050726f74656374696f6e2041637420313939382e204120736d616c6c206665652077696c6c2062652070617961626c652e20496620796f7520776f756c64206c696b65206120636f7079206f662074686520696e666f726d6174696f6e2068656c64206f6e20796f7520706c6561736520777269746520746f205b616464726573735d2e3c2f703e0d0a0d0a3c703e496620796f752062656c69657665207468617420616e7920696e666f726d6174696f6e2077652061726520686f6c64696e67206f6e20796f7520697320696e636f7272656374206f7220696e636f6d706c6574652c20706c6561736520777269746520746f206f7220656d61696c20757320617320736f6f6e20617320706f737369626c652c206174207468652061626f766520616464726573732e2057652077696c6c2070726f6d70746c7920636f727265637420616e7920696e666f726d6174696f6e20666f756e6420746f20626520696e636f72726563742e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e436f6e74616374696e672055733c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e49662074686572652061726520616e79207175657374696f6e7320726567617264696e672074686973207072697661637920706f6c69637920796f75206d617920636f6e74616374207573207573696e672074686520696e666f726d6174696f6e2062656c6f773a3c2f703e0d0a0d0a3c703e436f6d70616e79204e616d653a20546172756e6920436c6f7468696e672050726976617465204c696d697465643c2f703e0d0a0d0a3c703e416464726573733a204d616c616e6920457863656c2c2031302d332d3135302026616d703b203135312c2034746820466c6f6f722c2053742e204a6f686e262333393b7320526f61642c20426573696465205261746e61646565702053757065726d61726b65742c2045617374204d617272656470616c6c792c20536563756e646572616261642c2054656c616e67616e612c20496e646961202d203530303032363c2f703e0d0a0d0a3c703e54656c6570686f6e65204e6f202d202b393120393439323032313830353c2f703e0d0a0d0a3c703e452d4d61696c204944202d266e6273703b3c6120687265663d226d61696c746f3a6e63686172792e746172756e6940676d61696c2e636f6d223e6e63686172792e746172756e6940676d61696c2e636f6d3c2f613e3c2f703e, NULL, '2021-08-09 11:34:43', '2021-08-09 11:34:43', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Cancellation & Refund Policy', 'cancellation-refund-policy', 0x3c703e546172756e692062656c696576657320696e2068656c70696e672069747320637573746f6d6572732061732066617220617320706f737369626c652c20616e6420686173207468657265666f72652061206c69626572616c2063616e63656c6c6174696f6e20706f6c6963792e20556e646572207468697320706f6c6963793c2f703e0d0a0d0a3c756c3e0d0a093c6c693e43616e63656c6c6174696f6e732077696c6c20626520636f6e73696465726564206f6e6c79206966207468652072657175657374206973206d6164652077697468696e203336266e6273703b686f757273206f6620706c6163696e6720616e206f72646572202861667465722077686963682074686520266c7371756f3b63616e63656c26727371756f3b20627574746f6e2077696c6c2062652064697361626c65642920486f77657665722c207468652063616e63656c6c6174696f6e20726571756573742077696c6c206e6f7420626520656e7465727461696e656420696620746865206f72646572732068617665206265656e20636f6d6d756e69636174656420746f207468652076656e646f72732f6d65726368616e747320616e642074686579206861766520696e69746961746564207468652070726f63657373206f66207368697070696e67207468656d2e3c2f6c693e0d0a093c6c693e5468657265206973206e6f2063616e63656c6c6174696f6e206f66206f726465727320706c6163656420756e646572207468652053616d65204461792044656c69766572792063617465676f72792e3c2f6c693e0d0a093c6c693e4e6f2063616e63656c6c6174696f6e732061726520656e7465727461696e656420666f722074686f73652070726f6475637473207468617420746865266e6273703b3c7374726f6e673e546172756e693c2f7374726f6e673e266e6273703b6d61726b6574696e67207465616d20686173206f627461696e6564206f6e207370656369616c206f63636173696f6e73206c696b6520506f6e67616c2c20446977616c692c2056616c656e74696e6526727371756f3b7320446179206574632e20546865736520617265206c696d69746564206f63636173696f6e206f666665727320616e64207468657265666f72652063616e63656c6c6174696f6e7320617265206e6f7420706f737369626c652e3c2f6c693e0d0a093c6c693e496e2063617365206f662072656365697074206f662064616d61676564206f72206465666563746976652c20706c65617365207265706f7274207468652073616d6520746f206f757220437573746f6d6572205365727669636520452d6d61696c2049442e2054686520726571756573742077696c6c2c20686f77657665722c20626520656e7465727461696e6564206f6e636520746865206d65726368616e742068617320636865636b656420616e642064657465726d696e6564207468652073616d6520617420686973206f776e20656e642e20546869732073686f756c64206265207265706f727465642077697468696e20332064617973206f662072656365697074206f66207468652070726f64756374732e3c2f6c693e0d0a093c6c693e496e206361736520796f75206665656c2074686174207468652070726f64756374207265636569766564206973206e6f742061732073686f776e206f6e207468652073697465206f722061732070657220796f7572206578706563746174696f6e732c20796f75206d757374206272696e6720697420746f20746865206e6f74696365206f66206f757220637573746f6d657220736572766963652077697468696e20323420686f757273206f6620726563656976696e67207468652070726f647563742e2054686520437573746f6d65722053657276696365205465616d206166746572206c6f6f6b696e6720696e746f20796f757220636f6d706c61696e742077696c6c2074616b6520616e20617070726f707269617465206465636973696f6e2e3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68333e3c7374726f6e673e45786368616e676520506f6c6963793c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e57652077696c6c206163636570742065786368616e676573266e6273703b3c7374726f6e673e28627574206e6f20726566756e647329266e6273703b3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e54686520637573746f6d65722077696c6c2072657175697265207468652062696c6c20616e64207468652070726f6475637420746f2062652072657475726e656420616c6f6e67207769746820746865207072696365207461672e266e6273703b3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e45786368616e67652077696c6c20626520636f6e73696465726564206f6e6c7920666f7220616e7920706879736963616c2064616d6167657320647572696e67207368697070696e672e3c2f6c693e0d0a093c6c693e596f75206d757374206d616b6520796f75722072657475726e2077697468696e20332064617973206f66207468652064656c69766572792064617465206966207468652064656c697665727920686173206265656e206d61646520746f20496e646961202f2031342064617973206966207468652064656c697665727920686173206265656e206d61646520656c736577686572652e3c2f6c693e0d0a093c6c693e5368697070696e67206368617267657320617265206e6f7420726566756e6461626c652e3c2f6c693e0d0a093c6c693e556e6c6573732064656c69766572656420676f6f6473206172652064616d616765642c20637573746f6d6572732061726520726571756972656420746f20626561722074776f20776179207368697070696e6720636f73747320666f722065786368616e6765206f6620636c6f746865732e3c2f6c693e0d0a093c6c693e57652077696c6c206e6f7420616363657074206d65726368616e64697365207468617420686173206265656e20776f726e2c20616c74657265642c206f72207761736865642e3c2f6c693e0d0a093c6c693e54686520637573746f6d65722077696c6c20626520726571756972656420746f2070726f64756365207468652062696c6c20616e64207468652070726f6475637420746f2062652072657475726e656420616c6f6e67207769746820746865207072696365207461672e3c2f6c693e0d0a093c6c693e55706f6e2072656365697074206f662072657475726e65642070726f64756374732c20776520726573657276652074686520726967687420746f2064656e79206120726566756e6420696620746865206d65726368616e6469736520646f6573206e6f74206d6565742072657475726e20706f6c69637920726571756972656d656e74732e3c2f6c693e0d0a093c6c693e506c65617365206e6f74652074686174207768696c652077652077616e7420796f7520746f206265206861707079207769746820796f7572207075726368617365732c20616e20657863657373697665206e756d626572206f662072657475726e7320696e2061207477656c76652d6d6f6e746820706572696f64206d617920636175736520757320746f2072656a65637420667574757265206f72646572732066726f6d20796f752e3c2f6c693e0d0a093c6c693e50726f6475637473206f6e636520616c74657265642063616e6e6f742062652065786368616e6765642e3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c703e5468652070726f6475637473206d7573742062652072657475726e656420746f2074686520666f6c6c6f77696e6720616464726573733a3c2f703e0d0a0d0a3c703e546172756e6920436c6f7468696e67205076742e204c74642e3c2f703e0d0a0d0a3c703e416464726573733a204d616c616e6920457863656c2c2031302d332d3135302026616d703b203135312c2034746820466c6f6f722c2053742e204a6f686e262333393b7320526f61642c20426573696465205261746e61646565702053757065726d61726b65742c2045617374204d617272656470616c6c792c20536563756e646572616261642c2054656c616e67616e612c20496e646961202d203530303032363c2f703e0d0a0d0a3c703e50683a266e6273703b2b393120393439323032313830353c2f703e, NULL, '2021-08-09 11:35:20', '2021-08-09 11:35:20', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Shipping & Delivery Policy', 'shipping-delivery-policy', 0x3c703e546172756e692e696e20666f6c6c6f777320612064656c69766572792074696d65206672616d6520666f72206e6174696f6e616c20616e6420696e7465726e6174696f6e616c206f726465727320616e642074616b657320696e746f20636f6e73696465726174696f6e7320616e79207265737472696374696f6e73207468617420636f756c6420626520696d706f736564206f6e2064656c69766572696e672074686573652070726f64756374732e204f757220706f6c69637920656e7461696c7320696e666f726d6174696f6e20666f72207468652070726f647563747320616e64207365727669636573207765206f666665722e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e5368697070696e672026616d703b2044656c697665727920506f6c696379202850726f6475637473293c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e417420746172756e692e696e2c207368697070696e672077696c6c20626520646f6e65206f6e2077656967687420616e64206e6f74206f6e207065722070696563652062617369732e28436f7374202f2057656967687420506f6c696379293c6272202f3e0d0a57652077696c6c206265206368617267696e6720313530302f6b67206f6e20736869706d656e74732e20576569676874732077696c6c206265207374616e6461726420666f72206561636820766572746963616c3a20526561647920746f2077656172202d20312e354b67732c204b7572746973202d20302e354b672c204c656767696e67732d206e6f206368617267652c204c6568656e676173202d20322e354b672c204472657373204d6174657269616c73202d20314b672e3c2f703e0d0a0d0a3c703e466f7220646f6d6573746963206275796572732c206f7264657273206172652073686970706564207468726f756768207265676973746572656420646f6d657374696320636f757269657220636f6d70616e6965732f20737065656420706f737420616e642f6f7220546172756e6926727371756f3b73206f776e2064656c69766572792073797374656d2e3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e5368697070696e67206672656520696e20496e6469612028322d33204461797320666f72204d6574726f732c20372064617973293c2f6c693e0d0a3c2f756c3e0d0a0d0a3c703e466f7220496e7465726e6174696f6e616c206275796572732c206f726465727320617265207368697070656420616e642064656c697665726564207468726f756768207265676973746572656420696e7465726e6174696f6e616c20636f757269657220636f6d70616e69657320616e642f6f7220496e7465726e6174696f6e616c20737065656420706f7374206f6e6c792e20285368697070696e6720496e7465726e6174696f6e616c6c79202d2052732e20313530302f6b6720696e637265617365732077697468206e756d626572206f662070726f647563747320616e642074686520776569676874293c2f703e0d0a0d0a3c703e546172756e69206973206e6f74206c6961626c6520666f7220616e792064656c617920696e2064656c69766572792062792074686520636f757269657220636f6d70616e79202f20706f7374616c20617574686f72697469657320616e64206f6e6c792067756172616e7465657320746f2068616e64206f7665722074686520636f6e7369676e6d656e7420746f2074686520636f757269657220636f6d70616e79206f7220706f7374616c20617574686f7269746965732077697468696e20313520776f726b696e6720646179732066726f6d207468652064617465206f6620746865206f7264657220616e64207061796d656e74206f7220617320706572207468652064656c6976657279206461746520616772656564206174207468652074696d65206f66206f7264657220636f6e6669726d6174696f6e2e2044656c6976657279206f6620616c6c206f72646572732077696c6c20626520746f20726567697374657265642061646472657373206f66207468652062757965722061732070657220746865206372656469742f64656269742063617264206f6e6c7920617420616c6c2074696d657328556e6c65737320737065636966696564206174207468652074696d65206f66204f72646572292e20546172756e6920266e6273703b697320696e206e6f2077617920726573706f6e7369626c6520666f7220616e792064616d61676520746f20746865206f72646572207768696c6520696e207472616e73697420746f207468652062757965722e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e5061796d656e74733c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e546172756e692069732070726f756420746f20757365206372656469626c65207061796d656e7420676174657761797320666f7220666173742c206561737920616e6420656666696369656e7420736563757265207061796d656e74732e20416c6c206d616a6f7220637265646974206361726473206172652061636365707465642e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e5368697070696e6720616e642044656c697665727920506f6c69637920287365727669636573293c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e44656c6976657279206f66206f75722073657276696365732077696c6c20626520636f6e6669726d6564206f6e20796f7572206d61696c2049442061732073706563696669656420647572696e6720726567697374726174696f6e2e20466f7220616e792069737375657320696e207574696c697a696e67206f757220736572766963657320796f75206d617920636f6e74616374206f75722068656c706465736b206f6e202b393120393439323032313830352e3c2f703e0d0a0d0a3c703e556e6c6573732064656c69766572656420676f6f6473206172652064616d616765642c20637573746f6d6572732061726520726571756972656420746f20626561722074776f20776179207368697070696e6720636f73747320666f722065786368616e6765206f6620636c6f746865732e3c2f703e0d0a0d0a3c703e416c6c206f726465727320617265207375626a65637420746f20437573746f6d206475747920616e6420637573746f6d657273206d61792f6d6179206e6f7420626520636861726765642062792074686520676f7665726e6d656e742f6465706172746d656e74206f6620637573746f6d73206f6620746865207265737065637469766520636f756e74727920746f2077686963682070617263656c206973206265696e672064656c6976657265642e2074686573652064757469657320646f206e6f7420636f6d6520756e64657220746865206a7572697364696374696f6e206f6620546172756e692e696e20616e642077696c6c20626520626f726e652f706169642062792074686520637573746f6d65722e3c2f703e, NULL, '2021-08-09 11:36:03', '2021-08-09 11:36:03', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'How it works', 'how-it-works', 0x3c68333e3c7374726f6e673e4e617669676174696f6e3a3c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e416c6c207468652070726f647563742043617465676f7269657320616e64205375622d63617465676f72696573206173206c697374656420696e2074686520686561646572206f6e20746f702e2043686f6f7365266e6273703b7468652043617465676f72696573206f7220746865207375622d63617465676f7269657320627920636c69636b696e67206f6e207468656d20616e6420616c6c207468652070726f6475637473206c697374656420756e6465722074686f73652063617465676f726965732077696c6c2062652073686f776e2e3c2f703e0d0a0d0a3c703e54686520746f706d6f7374206e617669676174696f6e206261722073686f777320746865206e756d626572206f662070726f647563747320696e20796f757220436172742c20616c6f6e67207769746820576973686c69737420616e64204c6f67696e206c696e6b732e3c2f703e0d0a0d0a3c703e436c69636b206f6e20746865204c6f67696e20627574746f6e20746f206c6f67696e206f72207265676973746572206f6e206f757220776562736974652e204166746572206c6f67696e672d696e2c207468652073616d6520627574746f6e20686f6c647320746865206c696e6b7320746f20796f7572204163636f756e7420616e64204f72646572732e20557365207468657365206c696e6b7320746f207669657720616e642075706461746520796f7572206163636f756e742064657461696c732c206368616e67652070617373776f72642c20747261636b2f63616e63656c206f7264657273206574632e266e6273703b266e6273703b3c2f703e0d0a0d0a3c703e596f752063616e2072657475726e20746f2074686520686f6d657061676520616e7974696d652074686520636c69636b696e67206f6e20746865202671756f743b546172756e69204c6f676f2671756f743b20696e2074686520686561646572206f7220627920636c69636b696e67206f6e20746865202671756f743b686f6d652671756f743b206c696e6b2e3c2f703e0d0a0d0a3c703e41206c6f74206f662075736566756c206c696e6b73206861766520616c736f206265656e2070726f766964656420696e2074686520666f6f7465722c20696e636c7564696e67206f75722068656c706c696e65206e756d62657220616e6420656d61696c2e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68333e3c7374726f6e673e4578706c6f72696e672050726f64756374733a3c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e436c69636b206f6e20796f7572266e6273703b7072656665727265642063617465676f72792f7375622d63617465676f7279206c696e6b20696e207468652068656164657220746f20766965772070726f6475637473206c697374656420756e646572207468656d2e20596f752063616e20616c736f20636c69636b206f6e20746865202671756f743b436f6c6c656374696f6e732671756f743b206c696e6b20696e207468652068656164657220746f206578706c6f7265207468652073746f726520616e64206c6f6f6b206174206c6174657374206465616c7320616e64206e65772d6172726976616c732e3c2f703e0d0a0d0a3c703e436c69636b696e67206f6e20696e646976696475616c2070726f647563742077696c6c2074616b6520796f7520746f207468652070726f6475637420706167652c20776865726520796f752063616e2067657420616c6c2074686520696e666f726d6174696f6e2061626f7574207468652070726f647563742c206c696b65206974732070726963652c20646973636f756e742c206465736372697074696f6e2c20617474726962757465732c2070686f746f677261706873206574632e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68333e3c7374726f6e673e416464696e672050726f647563747320746f20796f757220436172743a3c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e5768696c65206f6e207468652070726f6475637420706167652c2063686f6f7365206f6e65206f662074686520617661696c61626c652073697a657328732c6d2c6c2c786c2c78786c2920616e64207468652064657369726564207175616e7469747920616e6420636c69636b206f6e20746865202671756f743b41646420746f20436172742671756f743b20627574746f6e20746f2061646420746861742070726f64756374266e6273703b746f20796f7572207669727475616c20636172742e3c2f703e0d0a0d0a3c703e41266e6273703b6e6f74696669636174696f6e20626f782077696c6c20666c6173682c266e6273703b636f6e6669726d696e6720796f7572266e6273703b70726f6475637420686173206265656e20616464656420746f20796f7572206361727420616e6420746865206e756d626572206f662070726f647563747320696e20796f757220636172742077696c6c2067657420757064617465642c2077686963682063616e206265206e6f746963656420696e20746865206865616465722e3c2f703e0d0a0d0a3c703e596f752063616e2072657669657720746865206974656d7320696e20796f7572206361727420616e7974696d652c20627920636c69636b696e67206f6e2074686520636172742073796d626f6c20696e2074686520746f702d6d6f73742070617274206f6620746865206865616465722e20546865206361727420706167652077696c6c2073686f7720796f7520746865206c697374206f662070726f647563747320696e20796f7572206361727420616e6420746865697220636f737420696e666f726d6174696f6e2e3c2f703e0d0a0d0a3c703e496620796f75207769736820746f20696e637265617365206f722064657363726561736520746865207175616e74697479206f6620612070726f6475637420696e20796f757220636172742c2073696d706c79206564697420746865206e756d62657220696e2074686520636f6c756d6e20616761696e737420746861742070726f6475637420616e6420796f757220636172742077696c6c2062652075706461746564266e6273703b6175746f6d61746963616c6c792e3c2f703e0d0a0d0a3c703e596f752063616e2072656d6f766520612070726f647563742066726f6d20796f757220636172742c2062792073696d706c7920636c69636b696e672074686520582073796d626f6c20696e20746865206c61737420636f6c756d6e20616761696e737420746861742070726f6475637420616e642069742077696c6c2062652072656d6f7665642066726f6d20796f757220636172742e3c2f703e0d0a0d0a3c703e266e6273703b3c2f703e0d0a0d0a3c68333e3c7374726f6e673e576973686c6973743a3c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e596f752063616e20616c736f20636c69636b206f6e20746865202671756f743b41646420746f20776973686c6973742671756f743b20627574746f6e20696e7374656164206f66202671756f743b41646420746f20636172742671756f743b2c20696620796f752064656369646520746f206d616b65207468652070757263686173652061742061206c6174657220646174652e20596f757220776973686c6973742077696c6c20626520736176656420696e206f75722073797374656d20616e6420796f752063616e2061636365737320746865206c69737420616e7974696d6520627920636c69636b696e67206f6e20746865202671756f743b68656172742671756f743b2073796d626f6c20696e20746865206865616465722e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e4f6e6c696e65205061796d656e742050726f636573733a3c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e4f6e6c696e65207061796d656e74266e6273703b6f7074696f6e73206c696b65206372656469742d636172642c2064656269742d636172642c20564953412c204e657462616e6b696e67206574632e2061726520617661696c61626c6520696e206f7572207061796d656e7420676174657761792e3c2f703e0d0a0d0a3c703e50617950616c206f7074696f6e20697320617661696c61626c6520666f7220696e7465726e6174696f6e616c207061796d656e74732e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e43617368206f6e2044656c69766572793a3c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e496e2073656c656374206369746965732c207765206f6666657220746865206f7074696f6e206f6620706179696e672043617368206f6e2044656c69766572792e2053696d706c792063686f6f736520746865202671756f743b43617368206f6e2044656c69766572792671756f743b206f7074696f6e206173266e6273703b796f7572266e6273703b7061796d656e74206d6f646528696620697420697320617661696c61626c6520696e266e6273703b796f75722063697479292c20616e64207375626d697420796f7572206f7264657220616e6420796f752063616e2070617920666f7220796f7572206f72646572206f6e6c79206166746572266e6273703b6974206172726976657320617420796f757220646f6f72737465702e3c2f703e0d0a0d0a3c68333e3c7374726f6e673e547261636b696e6720596f7572204f72646572733a3c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e4f6e636520796f7572206f7264657220697320646973706174636865642c20796f752063616e206c6f67696e20746f20796f75206163636f756e7420616e64266e6273703b747261636b20796f7572207061636b616765262333393b73266e6273703b6c6f636174696f6e20616e642074686520657374696d617465642074696d65206f66206172726976616c2c266e6273703b616c6d6f737420696e266e6273703b7265616c74696d652e266e6273703b3c2f703e0d0a0d0a3c68333e3c7374726f6e673e4772696576616e63657320616e6420466565646261636b3a3c2f7374726f6e673e3c2f68333e0d0a0d0a3c703e596f752063616e20656d61696c20757320796f757220636f6e6365726e732c20636f6d706c61696e747320616e64206772696576616e63657320746f3a266e6273703b3c6120687265663d226d61696c746f3a6e63686172792e746172756e6940676d61696c2e636f6d223e6e63686172792e746172756e6940676d61696c2e636f6d3c2f613e266e6273703b6f722043616c6c2075732061743a266e6273703b3c7374726f6e673e2b3931266e6273703b393439323032313830353c2f7374726f6e673e3c2f703e, NULL, '2021-08-09 11:37:02', '2021-08-09 11:37:02', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `pages` (`id`, `name`, `slug`, `description`, `short_description`, `created_at`, `updated_at`, `published_date`, `image`, `seo_title`, `seo_description`, `seo_keywords`, `location_map_url`) VALUES
(7, 'FAQs', 'faqs', 0x3c68343e47656e6572616c3c2f68343e0d0a0d0a3c703e3c7374726f6e673e512e20486f772077696c6c2049206b6e6f77206d792073697a653f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a204f6e2065766572792070726f6475637420706167652c20746865726520697320612073656374696f6e207468617420736179732073697a652e20436c69636b206f6e207468652028692920626573696465207468652073697a6520636861727420746f20636865636b20796f7572206d6561737572656d656e74732e3c2f703e0d0a0d0a3c703e3c7374726f6e673e512e2049732074686572652061206c696d6974206f6e207175616e74697479207468617420492063616e206f726465723f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a204e6f7420617420616c6c2120596f752063616e206f72646572206173206d616e7920706965636573206f6620636c6f7468696e6720617320796f75206c696b652e3c2f703e0d0a0d0a3c703e3c7374726f6e673e512e20446f20796f752074616b65206f7264657273206f766572207468652070686f6e653f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a20417420746869732074696d6520776520646f206e6f742074616b65206f7264657273206f766572207468652070686f6e652e3c2f703e0d0a0d0a3c68343e5061796d656e74733c2f68343e0d0a0d0a3c703e3c7374726f6e673e512e20486f772063616e20492070617920666f72206d79206f726465723f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a2054686520666f6c6c6f77696e67207061796d656e74206f7074696f6e732061726520666f722062757965727320696e20496e6469613a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e446562697420636172642f63726564697420636172643c2f6c693e0d0a093c6c693e4e657462616e6b696e673c2f6c693e0d0a093c6c693e50617970616c3c2f6c693e0d0a093c6c693e43617368206f6e2064656c69766572792028434f44293c2f6c693e0d0a3c2f756c3e0d0a0d0a3c703e3c7374726f6e673e512e20576861742061726520746865207368697070696e6720636861726765733f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a205368697070696e6720746f20616e79776865726520696e20496e64696120697320667265652e3c2f703e0d0a0d0a3c703e466f7220696e7465726e6174696f6e616c206f72646572732c207368697070696e6720636f7374732061726520617320666f6c6c6f77733a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e4f7264657220416d6f756e743c2f6c693e0d0a093c6c693e5368697070696e6720416d6f756e743c2f6c693e0d0a093c6c693e42656c6f77205553202437353c2f6c693e0d0a093c6c693e5553202432303c2f6c693e0d0a093c6c693e42656c6f7720555320243137353c2f6c693e0d0a093c6c693e5553202431303c2f6c693e0d0a093c6c693e41626f766520555320243137353c2f6c693e0d0a093c6c693e467265653c2f6c693e0d0a3c2f756c3e0d0a0d0a3c703e3c7374726f6e673e512e20576861742073686f756c64204920646f206966206d79206f6e6c696e65207061796d656e74206661696c733f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a20496620796f7572207061796d656e74206661696c732c20706c6561736520726574727920746865207472616e73616374696f6e20616674657220636865636b696e67207468617420616c6c2074686520696e666f726d6174696f6e20796f75206861766520656e746572656420697320636f72726563742e20496620796f7572207061796d656e74207374696c6c206661696c732c20796f75206d61792073656c656374207468652063617368206f6e2064656c69766572792028434f4429206f7074696f6e20746f2070617920666f7220796f7572206f726465722e3c2f703e0d0a0d0a3c703e49662061667465722061207061796d656e74206661696c7572652c20796f7572207061796d656e7420697320646562697465642066726f6d20796f7572206163636f756e742c2069742077696c6c2062652072652d63726564697465642077697468696e20372d313020646179732c206166746572207765207265636569766520636f6e6669726d6174696f6e2066726f6d20796f75722062616e6b2e3c2f703e0d0a0d0a3c68343e5368697070696e672026616d703b2044656c69766572793c2f68343e0d0a0d0a3c703e3c7374726f6e673e512e20486f772077696c6c2049206b6e6f77207768656e206d79206f726465722068617320736869707065643f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a204f6e636520796f7572206f726465722068617320736869707065642c20796f752077696c6c2072656365697665206120636f6e6669726d6174696f6e20656d61696c206f6e2074686520656d61696c2061646472657373207468617420796f7520656e746572656420617420636865636b6f75742e205468697320656d61696c2077696c6c20616c736f20696e636c75646520616e7920747261636b696e6720696e666f726d6174696f6e207468617420697320617661696c61626c652e3c2f703e0d0a0d0a3c703e3c7374726f6e673e512e20446f20796f75207368697020696e7465726e6174696f6e616c6c793f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a205965732c207765207368697020776f726c6477696465213c2f703e0d0a0d0a3c68343e43616e63656c6c6174696f6e2026616d703b204d6f64696669636174696f6e733c2f68343e0d0a0d0a3c703e3c7374726f6e673e512e205768617420697320796f75722063616e63656c6c6174696f6e20706f6c6963793f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a205965732c20796f75206d61792063616e63656c20616e206f726465722077697468696e20333620686f7572732066726f6d207468652074696d65206f6620706c6163696e6720746865206f726465722e3c2f703e0d0a0d0a3c703e3c7374726f6e673e416e206f726465722063616e6e6f742062652063616e63656c6c65642069663a3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e49742068617320616c7265616479206265656e2073686970706564206f75742e3c2f703e0d0a0d0a3c703e497420686173206265656e20706c6163656420756e6465722073616d65206461792064656c69766572792063617465676f72792e3c2f703e0d0a0d0a3c703e50726f64756374732068617665206265656e2070757263686173656420756e646572206c696d69746564206f63636173696f6e206f6666657273207375636820617320647572696e6720506f6e67616c2c20446977616c692c2056616c656e74696e6526727371756f3b73204461792c206574632e3c2f703e0d0a0d0a3c703e596f75206d6179206569746865722063616c6c207573206174202b39312d39343932303231383035206f722073656e6420757320616e20656d61696c206174266e6273703b3c7374726f6e673e6e63686172792e746172756e6940676d61696c2e636f6d3c2f7374726f6e673e2e20416e7920616d6f756e7420796f75206861766520706169642077696c6c20626520637265646974656420746f207468652073616d65207061796d656e74206d6f646520627920776869636820796f7572207061796d656e7420776173206d6164652e3c2f703e0d0a0d0a3c703e3c7374726f6e673e512e2043616e2049206d6f646966792f6368616e676520746865207368697070696e672061646472657373206f66206d79206f726465723f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a205965732c20796f752063616e206d6f6469667920746865207368697070696e672061646472657373206f6620796f7572206f72646572206265666f72652077652068617665207061636b65642069742e20596f75206d6179206569746865722063616c6c207573206174202b39312d39343932303231383035206f722073656e6420757320616e20656d61696c206174266e6273703b3c7374726f6e673e6e63686172792e746172756e6940676d61696c2e636f6d3c2f7374726f6e673e2e3c2f703e0d0a0d0a3c68343e52657475726e732026616d703b2045786368616e67653c2f68343e0d0a0d0a3c703e3c7374726f6e673e512e205768617420697320546172756e6926727371756f3b732072657475726e20706f6c6963793f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a205765206f6e6c79206163636570742072657475726e7320696e206361736520796f752072656365697665206120706879736963616c6c792064616d616765642f6465666563746976652070726f647563742873292e20496e206361736520796f75206665656c206c696b6520796f75206861766520726563656976656420612070726f647563742074686174206973206e6f742061732069742069732073686f776e206f6e2074686520736974652c206f72206973206e6f7420746f20796f7572206578706563746174696f6e732c20706c65617365206c6574207573206b6e6f772077697468696e20323420686f75727320616e64206f757220637573746f6d65722073657276696365207465616d2077696c6c206c6f6f6b20696e746f20796f757220636f6d706c61696e742e3c2f703e0d0a0d0a3c703e496620796f752061726520756e6861707079207769746820612070726f6475637420796f752068617665207075726368617365642c20796f75206d61792065786368616e67652069742e204e6f20726566756e642077696c6c20626520676976656e2e3c2f703e0d0a0d0a3c703e3c7374726f6e673e512e205768617420697320546172756e6926727371756f3b732065786368616e676520706f6c6963793f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a205765206f6e6c7920616c6c6f772065786368616e676573206f6620612070726f6475637428732920746861742061726520706879736963616c6c792064616d616765642f6465666563746976652e20596f75206d7573742073686970207468652070726f64756374206261636b20746f2075732077697468696e20332064617973206f66207468652064656c697665727920646174652069662064656c697665727920686173206265656e206d61646520696e20496e6469612c206f722077697468696e20313420646179732069662064656c697665727920686173206265656e206d61646520656c736577686572652e3c2f703e0d0a0d0a3c703e5368697070696e67206368617267657320617265206e6f6e2d726566756e6461626c6520756e6c657373207468652070726f647563742873292064656c69766572656420746f20796f752061726520706879736963616c6c792064616d616765642f6465666563746976652e3c2f703e0d0a0d0a3c703e576520726573657276652074686520726967687420746f2072656a6563742070726f647563742065786368616e67657320696620746865206d65726368616e6469736520646f6573206e6f74206d656574206f75722072657475726e20706f6c69637920726571756972656d656e74732c206f722074686520666f6c6c6f77696e673a3c2f703e0d0a0d0a3c756c3e0d0a093c6c693e436c6f7468657320746861742068617665206265656e20776f726e2c20616c7465726564206f72207761736865642e3c2f6c693e0d0a093c6c693e436c6f7468657320776974686f757420746865207072696365207461672e3c2f6c693e0d0a3c2f756c3e0d0a0d0a3c703e576520726573657276652074686520726967687420746f2072656a65637420667574757265206f72646572732066726f6d20636c69656e74732077686f2072657475726e20616e20657863657373697665206e756d626572206f66206f72646572732077697468696e20612031322d6d6f6e746820706572696f642e3c2f703e0d0a0d0a3c703e3c7374726f6e673e512e20486f7720646f20492063726561746520612072657475726e2f65786368616e676520726571756573743f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a20506c656173652063616c6c207573206174202b39312d39343932303231383035206f722064726f7020757320616e20656d61696c206174266e6273703b3c7374726f6e673e6e63686172792e746172756e6940676d61696c2e636f6d3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e3c7374726f6e673e512e20486f772063616e204920747261636b206d792072657475726e2f65786368616e6765206f726465723f3c2f7374726f6e673e3c2f703e0d0a0d0a3c703e413a204f6e636520796f75722072657475726e2f65786368616e6765206f726465722068617320736869707065642c20796f752077696c6c2072656365697665206120636f6e6669726d6174696f6e20656d61696c206f6e2074686520656d61696c2061646472657373207468617420796f7520656e746572656420617420636865636b6f75742e205468697320656d61696c2077696c6c20616c736f20696e636c75646520616e7920747261636b696e6720696e666f726d6174696f6e207468617420697320617661696c61626c652e3c2f703e, NULL, '2021-08-09 11:38:11', '2021-08-09 11:38:11', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parent_attributes`
--

CREATE TABLE `parent_attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `position` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent_attributes`
--

INSERT INTO `parent_attributes` (`id`, `name`, `slug`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Product Name', 'product_name', 0, '2021-09-07 16:34:37', '2021-09-07 16:34:37'),
(2, 'Product code', 'product_code', 1, '2021-09-07 16:34:58', '2021-09-07 16:34:58'),
(3, 'Category', 'category', 2, '2021-09-07 16:35:15', '2021-09-07 16:35:15'),
(4, 'Product Description', 'product_description', 3, '2021-09-07 16:35:30', '2021-09-07 16:35:30'),
(5, 'Variant', 'variant', 4, '2021-09-07 16:35:46', '2021-09-07 16:35:46'),
(6, 'Variant Name', 'variant_name', 5, '2021-09-07 16:36:09', '2021-09-07 16:36:09'),
(7, 'Combination Variant Name', 'combination_variant_name', 7, '2021-09-07 16:36:26', '2021-09-07 16:36:26'),
(8, 'Picture', 'picture', 8, '2021-09-07 16:36:42', '2021-09-07 16:36:42'),
(9, 'Weight', 'weight', 9, '2021-09-07 16:36:57', '2021-09-07 16:36:57'),
(10, 'Product Available', 'product_available', 10, '2021-09-07 16:37:13', '2021-09-07 16:37:13'),
(11, 'SKU', 'sku', 11, '2021-09-07 16:37:30', '2021-09-07 16:37:30'),
(12, 'Stock Total', 'stock_total', 12, '2021-09-07 16:37:48', '2021-09-07 16:37:48'),
(13, 'Buy Price', 'buy_price', 13, '2021-09-07 16:38:06', '2021-09-07 16:38:06'),
(14, 'Buy Price USD', 'buy_price_usd', 14, '2021-09-07 16:38:25', '2021-09-07 16:38:25'),
(15, 'On Sale Price', 'on_sale_price', 16, '2021-09-07 16:38:45', '2021-09-07 16:38:45'),
(16, 'On Sale Price USD', 'on_sale_price_usd', 17, '2021-09-07 16:39:06', '2021-09-07 16:39:06'),
(17, 'Child Variant', 'child_variant', 6, '2021-09-07 16:40:23', '2021-09-07 16:40:23'),
(18, 'On sale', 'on_sale', 15, '2021-09-08 02:20:37', '2021-09-08 02:20:37');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(17, 'admin@taruni.in', 'UbCGyJMaGvNZv4xpV5GhD0nsWPDgGuKBgRjuuYXRrLro9C4CqU6oppFYyhxW8KPw', '2021-09-19 16:24:44', '2021-09-19 16:24:44');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `order_number` int(11) DEFAULT NULL,
  `response_code` int(11) DEFAULT NULL,
  `response_message` text,
  `date_created` datetime DEFAULT NULL,
  `payment_id` varchar(150) DEFAULT '0',
  `merchant_ref_no` bigint(20) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `mode` varchar(255) DEFAULT NULL,
  `billing_name` varchar(255) DEFAULT NULL,
  `billing_address` text,
  `billing_city` text,
  `billing_state` text,
  `billing_postal_code` varchar(255) DEFAULT NULL,
  `billing_country` varchar(50) DEFAULT NULL,
  `billing_phone` varchar(255) DEFAULT NULL,
  `billing_email` varchar(255) DEFAULT NULL,
  `delivery_name` varchar(255) DEFAULT NULL,
  `delivery_address` text,
  `delivery_city` text,
  `delivery_state` text,
  `delivery_postal_code` varchar(255) DEFAULT NULL,
  `delivery_country` varchar(10) DEFAULT NULL,
  `delivery_phone` varchar(255) DEFAULT NULL,
  `description` text,
  `is_flagged` text,
  `transaction_id` text,
  `payment_method` int(11) DEFAULT NULL,
  `paypal_payment` int(11) DEFAULT NULL,
  `paypal_payer_id` text,
  `paypal_payer_email` text,
  `paypal_receiver_email` text,
  `paypal_payment_status` text,
  `paypal_currency_type` text,
  `return_response` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `cart_id`, `order_number`, `response_code`, `response_message`, `date_created`, `payment_id`, `merchant_ref_no`, `amount`, `mode`, `billing_name`, `billing_address`, `billing_city`, `billing_state`, `billing_postal_code`, `billing_country`, `billing_phone`, `billing_email`, `delivery_name`, `delivery_address`, `delivery_city`, `delivery_state`, `delivery_postal_code`, `delivery_country`, `delivery_phone`, `description`, `is_flagged`, `transaction_id`, `payment_method`, `paypal_payment`, `paypal_payer_id`, `paypal_payer_email`, `paypal_receiver_email`, `paypal_payment_status`, `paypal_currency_type`, `return_response`, `created_at`, `updated_at`) VALUES
(1, 21, 1, 1, NULL, NULL, NULL, 'pay_I0LXpdF37uexZu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"_token\":\"QOGRReNdJiTts6I5P26w2NXRivEoLpIiGE37s4I6\",\"razorpay_payment_id\":\"pay_I0LXpdF37uexZu\",\"org_logo\":null,\"org_name\":\"Razorpay Software Private Ltd\",\"checkout_logo\":\"https:\\/\\/cdn.razorpay.com\\/logo.png\",\"custom_branding\":\"false\",\"coupon_code\":null}', '2021-09-22 08:00:42', '2021-09-22 08:00:42'),
(2, 21, 1, 1, NULL, NULL, NULL, 'pay_I0LpAvPRmfFQdi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"_token\":\"QOGRReNdJiTts6I5P26w2NXRivEoLpIiGE37s4I6\",\"razorpay_payment_id\":\"pay_I0LpAvPRmfFQdi\",\"org_logo\":null,\"org_name\":\"Razorpay Software Private Ltd\",\"checkout_logo\":\"https:\\/\\/cdn.razorpay.com\\/logo.png\",\"custom_branding\":\"false\",\"coupon_code\":null}', '2021-09-22 08:17:07', '2021-09-22 08:17:07'),
(3, 11, 2, 2, NULL, NULL, NULL, 'pay_I0NnKWhUSOC2Mn', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"_token\":\"QOGRReNdJiTts6I5P26w2NXRivEoLpIiGE37s4I6\",\"razorpay_payment_id\":\"pay_I0NnKWhUSOC2Mn\",\"org_logo\":null,\"org_name\":\"Razorpay Software Private Ltd\",\"checkout_logo\":\"https:\\/\\/cdn.razorpay.com\\/logo.png\",\"custom_branding\":\"false\",\"coupon_code\":null}', '2021-09-22 10:12:45', '2021-09-22 10:12:45'),
(4, 22, 3, 3, NULL, NULL, NULL, 'pay_I0O47QtcCycxhM', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"_token\":\"dhi5wdlXcynsXE3BTzcErsNBttjfmml3gy9zIfVW\",\"razorpay_payment_id\":\"pay_I0O47QtcCycxhM\",\"org_logo\":null,\"org_name\":\"Razorpay Software Private Ltd\",\"checkout_logo\":\"https:\\/\\/cdn.razorpay.com\\/logo.png\",\"custom_branding\":\"false\",\"coupon_code\":null}', '2021-09-22 10:28:38', '2021-09-22 10:28:38'),
(5, 23, 8, 4, NULL, NULL, NULL, 'pay_I0nfXJXowm58Ln', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"_token\":\"kMtmRpX62G1T8yEj3txW9Qod1Qvy6370MXqCrBwJ\",\"razorpay_payment_id\":\"pay_I0nfXJXowm58Ln\",\"org_logo\":null,\"org_name\":\"Razorpay Software Private Ltd\",\"checkout_logo\":\"https:\\/\\/cdn.razorpay.com\\/logo.png\",\"custom_branding\":\"false\",\"coupon_code\":null}', '2021-09-23 11:31:32', '2021-09-23 11:31:32'),
(6, 24, 9, 5, NULL, NULL, NULL, 'pay_I0oCsvco7p7IQP', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"_token\":\"22Jbxa8hABjsg3DWlL6aFLoyO5jZU5rEQLsRlWPo\",\"razorpay_payment_id\":\"pay_I0oCsvco7p7IQP\",\"org_logo\":null,\"org_name\":\"Razorpay Software Private Ltd\",\"checkout_logo\":\"https:\\/\\/cdn.razorpay.com\\/logo.png\",\"custom_branding\":\"false\",\"coupon_code\":null}', '2021-09-23 12:02:59', '2021-09-23 12:02:59'),
(7, 25, 10, 6, NULL, NULL, NULL, 'pay_I0omxLWMDrKjVr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"_token\":\"qS8TeAbFsJJqb0X2d733eRKhBty2X8y8Ems9xgJi\",\"razorpay_payment_id\":\"pay_I0omxLWMDrKjVr\",\"org_logo\":null,\"org_name\":\"Razorpay Software Private Ltd\",\"checkout_logo\":\"https:\\/\\/cdn.razorpay.com\\/logo.png\",\"custom_branding\":\"false\",\"coupon_code\":null}', '2021-09-23 12:37:14', '2021-09-23 12:37:14'),
(8, 24, 11, 7, NULL, NULL, NULL, 'pay_I0p2HTOivjPsoW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '{\"_token\":\"22Jbxa8hABjsg3DWlL6aFLoyO5jZU5rEQLsRlWPo\",\"razorpay_payment_id\":\"pay_I0p2HTOivjPsoW\",\"org_logo\":null,\"org_name\":\"Razorpay Software Private Ltd\",\"checkout_logo\":\"https:\\/\\/cdn.razorpay.com\\/logo.png\",\"custom_branding\":\"false\",\"coupon_code\":null}', '2021-09-23 12:51:39', '2021-09-23 12:51:39');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `desc` text,
  `unstitched` int(11) DEFAULT NULL,
  `newarrival` char(10) DEFAULT 'no',
  `price_inr` float DEFAULT '0',
  `price_usd` float DEFAULT '0',
  `discount_price_inr` float DEFAULT '0',
  `discount_price_usd` float DEFAULT '0',
  `slug` varchar(255) DEFAULT NULL,
  `position_score` int(11) DEFAULT NULL COMMENT 'between 0 to 1000',
  `seo_title` text,
  `seo_desc` text,
  `seo_keywords` text,
  `recommended` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `cat_id`, `desc`, `unstitched`, `newarrival`, `price_inr`, `price_usd`, `discount_price_inr`, `discount_price_usd`, `slug`, `position_score`, `seo_title`, `seo_desc`, `seo_keywords`, `recommended`, `created_at`, `updated_at`) VALUES
(1, 'Anarkali', 'A1054499', 1, 'Magenta pink georgette anarkali with resham, sequins & zardosi work, matching leggings and chiffon dupatta', NULL, 'yes', 0, 0, 0, 0, 'a1054499anarkali', NULL, NULL, NULL, NULL, 0, '2021-09-22 08:30:54', '2021-09-22 08:30:54'),
(2, 'Anarkali', 'A1051559', 1, 'Onion pink printed chanderi anarkali with mirror & stone work, matching leggings and dupatta', NULL, 'yes', 0, 0, 0, 0, 'a1051559anarkali', NULL, NULL, NULL, NULL, 0, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(3, 'Anarkali', 'A1053450', 1, 'Black chanderi anarkali with zari, zardosi & stone work, matching leggings and contrast ikkat silk dupatta', NULL, 'yes', 0, 0, 0, 0, 'a1053450anarkali', NULL, NULL, NULL, NULL, 0, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(4, 'Anarkali', 'A1051562', 1, 'Pastel peach printed chanderi anarkali with mirror & stone work, matching leggings and dupatta', NULL, 'yes', 0, 0, 0, 0, 'a1051562anarkali', NULL, NULL, NULL, NULL, 0, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(5, 'Anarkali', 'A1043137', 1, 'Pinkesh Red printed Chiffon georgette jumpsuit with cutdana & pearl and embroidered belt', NULL, 'yes', 0, 0, 0, 0, 'a1043137anarkali', NULL, NULL, NULL, NULL, 0, '2021-09-22 08:30:55', '2021-09-22 08:30:55'),
(6, 'Anarkali', 'A1043138', 1, 'Aqua green printed Chiffon  georgette jumpsuit with cutdana & pearl and embroidered belt', NULL, 'yes', 0, 0, 0, 0, 'a1043138anarkali', NULL, NULL, NULL, NULL, 0, '2021-09-22 08:30:55', '2021-09-22 08:30:55'),
(7, 'Kurti', 'A1027274', 6, 'Pink & orange printed bandhini Chiffon georgette gown with attached mirror work belt', NULL, 'yes', 0, 0, 0, 0, 'a1027274kurti', NULL, NULL, NULL, NULL, 0, '2021-09-22 09:19:36', '2021-09-22 09:19:36'),
(8, 'Kurti', 'A1031304', 6, 'Yellow printed muslin A-line kurti ', NULL, 'yes', 0, 0, 0, 0, 'a1031304kurti', NULL, NULL, NULL, NULL, 0, '2021-09-22 09:19:36', '2021-09-22 09:19:36'),
(9, 'Kurti', 'A1013736', 6, 'Pink & orange printed georgette full length kurti with beads & cutdana', NULL, 'yes', 0, 0, 0, 0, 'a1013736kurti', NULL, NULL, NULL, NULL, 0, '2021-09-22 09:19:36', '2021-09-22 09:19:36'),
(10, 'kids wear', 'A1050247', 26, 'Peach net gown with heavy handwork on waist and multi colour resham work layer', NULL, 'yes', 0, 0, 0, 0, 'a1050247kids-wear', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(11, 'kids wear', 'A1050205', 26, 'Rani Pink silk crop top with intricate handwork neckline, navy blue benaras silk lehenga with contrast heavy benaras border and matching net dupatta', NULL, 'yes', 0, 0, 0, 0, 'a1050205kids-wear', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(12, 'kids wear', 'A1050239', 26, 'Sky blue silk anarkali with intricate hand work on shoulders & neckline and net embroidered attached jacket', NULL, 'yes', 0, 0, 0, 0, 'a1050239kids-wear', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(13, 'kids wear', 'A1050180', 26, 'Baby Pink raw silk crop top with heavy handwork neckline, grey net lehenga with all over heavy embroidery and matching net dupatta', NULL, 'yes', 0, 0, 0, 0, 'a1050180kids-wear', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(14, 'kids wear', 'A1050263', 26, 'Teal Blue Chinnon layered gown with handwork neckline and jacket with all over embroidery', NULL, 'yes', 0, 0, 0, 0, 'a1050263kids-wear', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(15, 'Sandals', 'A1027671', 35, 'Gold & beige wedge sandals with embroidery', NULL, 'yes', 0, 0, 0, 0, 'a1027671sandals', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(16, 'Sandals', 'A1027649', 35, 'Rose gold wedges with mirror & pearl work', NULL, 'yes', 0, 0, 0, 0, 'a1027649sandals', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(17, 'Sandals', 'A1027664', 35, 'Gold & beige wedge sandals with embroidery', NULL, 'yes', 0, 0, 0, 0, 'a1027664sandals', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(18, 'Sandals', 'A1027682', 35, 'Gold & beige wedge with embroidery', NULL, 'yes', 0, 0, 0, 0, 'a1027682sandals', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(19, 'Sandals', 'A1027652', 35, 'Gold wedges with mirror & pearl work', NULL, 'yes', 0, 0, 0, 0, 'a1027652sandals', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(20, 'Sandals', 'A1027639', 35, 'Rose gold thong wedges with stone work', NULL, 'yes', 0, 0, 0, 0, 'a1027639sandals', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(21, 'Sandals', 'A1027642', 35, 'Gold thong wedges with stone work', NULL, 'yes', 0, 0, 0, 0, 'a1027642sandals', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(22, 'Sandals', 'A1027677', 35, 'Rose gold wedges with embroidery', NULL, 'yes', 0, 0, 0, 0, 'a1027677sandals', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(23, 'Bottoms', 'A977535', 13, 'Black lycra leggings', NULL, 'yes', 0, 0, 0, 0, 'a977535bottoms', NULL, NULL, NULL, NULL, 0, '2021-09-22 09:37:06', '2021-09-22 09:37:06'),
(24, 'Bottoms', 'A855850', 13, 'Off-white lycra leggings', NULL, 'yes', 0, 0, 0, 0, 'a855850bottoms', NULL, NULL, NULL, NULL, 0, '2021-09-22 09:37:06', '2021-09-22 09:37:06'),
(25, 'Bottoms', 'A879569', 13, 'Fawn lycra leggings', NULL, 'yes', 0, 0, 0, 0, 'a879569bottoms', NULL, NULL, NULL, NULL, 0, '2021-09-22 09:37:06', '2021-09-22 09:37:06'),
(26, 'Bottoms', 'A880653', 13, 'Rama green lycra leggings', NULL, 'yes', 0, 0, 0, 0, 'a880653bottoms', NULL, NULL, NULL, NULL, 0, '2021-09-22 09:37:06', '2021-09-22 09:37:06'),
(27, 'Bottoms', 'A928538', 13, 'Reddish maroon lycra leggings', NULL, 'yes', 0, 0, 0, 0, 'a928538bottoms', NULL, NULL, NULL, NULL, 0, '2021-09-22 09:37:06', '2021-09-22 09:37:06'),
(28, 'Bottoms', 'A908594', 13, 'Dark brown lycra leggings', NULL, 'yes', 0, 0, 0, 0, 'a908594bottoms', NULL, NULL, NULL, NULL, 0, '2021-09-22 04:07:07', '2021-09-22 09:37:07'),
(29, 'Lehengas', 'A1055054', 15, 'Crimson red georgette blouse with french knot embroidery, cutdana, stones, zari, sequins & mirror work, matching lehenga and net dupatta', NULL, 'yes', 0, 0, 0, 0, 'a1055054lehengas', NULL, NULL, NULL, NULL, 0, '2021-09-22 09:40:46', '2021-09-22 09:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `variant_name` varchar(50) DEFAULT NULL,
  `varinat_value` varchar(100) DEFAULT NULL,
  `extra_value_1` varchar(50) DEFAULT NULL,
  `extra_value_2` varchar(50) DEFAULT NULL,
  `extra_value_3` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `product_code`, `category_id`, `variant_name`, `varinat_value`, `extra_value_1`, `extra_value_2`, `extra_value_3`, `created_at`, `updated_at`) VALUES
(1, 1, 'A1054499', 1, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(2, 1, 'A1054499', 1, 'color', 'Magenta', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(3, 1, 'A1054499', 1, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(4, 1, 'A1054499', 1, 'dress_length', '60 Inches', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(5, 1, 'A1054499', 1, 'fabric', 'georgette', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(6, 1, 'A1054499', 1, 'skirt_length', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(7, 1, 'A1054499', 1, 'sleeve', 'Attahced  (Full  Sleeves - 21 inches only)', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(8, 1, 'A1054499', 1, 'un_stitched', 'No', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(9, 1, 'A1054499', 1, 'zip', 'Side Zip', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(10, 2, 'A1051559', 1, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(11, 2, 'A1051559', 1, 'color', 'Onion Pink', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(12, 2, 'A1051559', 1, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(13, 2, 'A1051559', 1, 'dress_length', '57 Inches', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(14, 2, 'A1051559', 1, 'fabric', 'Chanderi', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(15, 2, 'A1051559', 1, 'skirt_length', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(16, 2, 'A1051559', 1, 'sleeve', 'Chenderi (Full  Sleeves - 17 inches only)', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(17, 2, 'A1051559', 1, 'un_stitched', 'No', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(18, 2, 'A1051559', 1, 'zip', 'Side Zip', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(19, 3, 'A1053450', 1, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(20, 3, 'A1053450', 1, 'color', 'Black', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(21, 3, 'A1053450', 1, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(22, 3, 'A1053450', 1, 'dress_length', '57 Inches', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(23, 3, 'A1053450', 1, 'fabric', 'Chanderi', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(24, 3, 'A1053450', 1, 'skirt_length', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(25, 3, 'A1053450', 1, 'sleeve', 'Chenderi (Full  Sleeves - 17 inches only)', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(26, 3, 'A1053450', 1, 'un_stitched', 'No', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(27, 3, 'A1053450', 1, 'zip', 'Side Zip', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(28, 4, 'A1051562', 1, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(29, 4, 'A1051562', 1, 'color', 'Pastel Peach', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(30, 4, 'A1051562', 1, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(31, 4, 'A1051562', 1, 'dress_length', '57 Inches', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(32, 4, 'A1051562', 1, 'fabric', 'Chanderi', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(33, 4, 'A1051562', 1, 'skirt_length', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(34, 4, 'A1051562', 1, 'sleeve', 'Chenderi (Full  Sleeves - 17 inches only)', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(35, 4, 'A1051562', 1, 'un_stitched', 'No', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(36, 4, 'A1051562', 1, 'zip', 'Side Zip', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(37, 5, 'A1043137', 1, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(38, 5, 'A1043137', 1, 'color', 'Pinkesh Red', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(39, 5, 'A1043137', 1, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(40, 5, 'A1043137', 1, 'dress_length', '56 Inches', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(41, 5, 'A1043137', 1, 'fabric', 'Chiffon  georgette ', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(42, 5, 'A1043137', 1, 'skirt_length', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(43, 5, 'A1043137', 1, 'sleeve', 'Attahced  (Full  Sleeves - 19 inches only)', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(44, 5, 'A1043137', 1, 'un_stitched', 'No', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(45, 5, 'A1043137', 1, 'zip', 'Back Zip', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(46, 6, 'A1043138', 1, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(47, 6, 'A1043138', 1, 'color', 'Aqua Green', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(48, 6, 'A1043138', 1, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(49, 6, 'A1043138', 1, 'dress_length', '56 Inches', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(50, 6, 'A1043138', 1, 'fabric', 'Chiffon  georgette ', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(51, 6, 'A1043138', 1, 'skirt_length', NULL, NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(52, 6, 'A1043138', 1, 'sleeve', 'Attahced  (Full  Sleeves - 19 inches only)', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(53, 6, 'A1043138', 1, 'un_stitched', 'No', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(54, 6, 'A1043138', 1, 'zip', 'Back Zip', NULL, NULL, NULL, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(55, 7, 'A1027274', 6, 'chest_pads', 'No', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(56, 7, 'A1027274', 6, 'collection', 'catalogue', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(57, 7, 'A1027274', 6, 'color', 'Pink, Orange', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(58, 7, 'A1027274', 6, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(59, 7, 'A1027274', 6, 'cut', NULL, NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(60, 7, 'A1027274', 6, 'dress_length', '59 Inches', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(61, 7, 'A1027274', 6, 'fabric', 'Chiffon georgette', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(62, 7, 'A1027274', 6, 'sleeves', NULL, NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(63, 8, 'A1031304', 6, 'chest_pads', 'No', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(64, 8, 'A1031304', 6, 'collection', 'catalogue', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(65, 8, 'A1031304', 6, 'color', 'Yellow', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(66, 8, 'A1031304', 6, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(67, 8, 'A1031304', 6, 'cut', NULL, NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(68, 8, 'A1031304', 6, 'dress_length', '46 Inches', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(69, 8, 'A1031304', 6, 'fabric', 'Muslin', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(70, 8, 'A1031304', 6, 'sleeves', NULL, NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(71, 9, 'A1013736', 6, 'chest_pads', 'Yes', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(72, 9, 'A1013736', 6, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(73, 9, 'A1013736', 6, 'color', 'Pink', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(74, 9, 'A1013736', 6, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(75, 9, 'A1013736', 6, 'cut', NULL, NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(76, 9, 'A1013736', 6, 'dress_length', '57 Inches', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(77, 9, 'A1013736', 6, 'fabric', 'Georgette', NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(78, 9, 'A1013736', 6, 'sleeves', NULL, NULL, NULL, NULL, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(79, 10, 'A1050247', 26, 'bottom', 'No Bottom', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(80, 10, 'A1050247', 26, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(81, 10, 'A1050247', 26, 'color', 'Peach   ', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(82, 10, 'A1050247', 26, 'dress_length', 'Standard', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(83, 10, 'A1050247', 26, 'fabric', 'netted', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(84, 10, 'A1050247', 26, 'skirt_length', NULL, NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(85, 10, 'A1050247', 26, 'sleeve', 'Netted (Short Sleeves  4 inhces Only)', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(86, 10, 'A1050247', 26, 'zip', 'Back Zip', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(87, 11, 'A1050205', 26, 'bottom', 'Skirt', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(88, 11, 'A1050205', 26, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(89, 11, 'A1050205', 26, 'color', 'Rani Pink, Navy Blue', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(90, 11, 'A1050205', 26, 'dress_length', 'Standard', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(91, 11, 'A1050205', 26, 'fabric', 'Silk, Benaras', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(92, 11, 'A1050205', 26, 'skirt_length', NULL, NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(93, 11, 'A1050205', 26, 'sleeve', 'Silk (Short Sleeves  4 inhces Only)', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(94, 11, 'A1050205', 26, 'zip', 'Back Zip', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(95, 12, 'A1050239', 26, 'bottom', 'No Bottom', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(96, 12, 'A1050239', 26, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(97, 12, 'A1050239', 26, 'color', 'Sea Green', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(98, 12, 'A1050239', 26, 'dress_length', 'Standard', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(99, 12, 'A1050239', 26, 'fabric', 'Silk, netted', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(100, 12, 'A1050239', 26, 'skirt_length', NULL, NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(101, 12, 'A1050239', 26, 'sleeve', 'Silk, Netted (Short Sleeves  4 inhces Only)', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(102, 12, 'A1050239', 26, 'zip', 'Back Zip', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(103, 13, 'A1050180', 26, 'bottom', 'Skirt', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(104, 13, 'A1050180', 26, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(105, 13, 'A1050180', 26, 'color', 'baby Pink, Grey', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(106, 13, 'A1050180', 26, 'dress_length', 'Standard', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(107, 13, 'A1050180', 26, 'fabric', 'Silk, netted', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(108, 13, 'A1050180', 26, 'skirt_length', NULL, NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(109, 13, 'A1050180', 26, 'sleeve', 'Silk (Short Sleeves  4 inhces Only)', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(110, 13, 'A1050180', 26, 'zip', 'Back Zip', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(111, 14, 'A1050263', 26, 'bottom', 'No Bottom', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(112, 14, 'A1050263', 26, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(113, 14, 'A1050263', 26, 'color', 'Teal Blue', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(114, 14, 'A1050263', 26, 'dress_length', 'Standard', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(115, 14, 'A1050263', 26, 'fabric', 'Chinnon, Netted', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(116, 14, 'A1050263', 26, 'skirt_length', NULL, NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(117, 14, 'A1050263', 26, 'sleeve', 'Attached (3/4 th Bell Sleeves-15 inches only)', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(118, 14, 'A1050263', 26, 'zip', 'Back Zip', NULL, NULL, NULL, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(119, 15, 'A1027671', 35, 'fabric', 'wedge sandals with embroidery', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(120, 15, 'A1027671', 35, 'color', 'Gold', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(121, 15, 'A1027671', 35, 'design', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(122, 16, 'A1027649', 35, 'fabric', 'wedges with mirror & pearl work', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(123, 16, 'A1027649', 35, 'color', 'Rose Gold', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(124, 16, 'A1027649', 35, 'design', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(125, 17, 'A1027664', 35, 'fabric', 'wedge sandals with embroidery', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(126, 17, 'A1027664', 35, 'color', 'Gold', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(127, 17, 'A1027664', 35, 'design', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(128, 18, 'A1027682', 35, 'fabric', 'wedge with embroidery', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(129, 18, 'A1027682', 35, 'color', 'Gold', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(130, 18, 'A1027682', 35, 'design', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(131, 19, 'A1027652', 35, 'fabric', 'wedges with mirror & pearl work', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(132, 19, 'A1027652', 35, 'color', 'Gold', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(133, 19, 'A1027652', 35, 'design', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(134, 20, 'A1027639', 35, 'fabric', 'thong wedges with stone work', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(135, 20, 'A1027639', 35, 'color', 'Rose Gold', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(136, 20, 'A1027639', 35, 'design', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(137, 21, 'A1027642', 35, 'fabric', 'thong wedges with stone work', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(138, 21, 'A1027642', 35, 'color', 'Gold', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(139, 21, 'A1027642', 35, 'design', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(140, 22, 'A1027677', 35, 'fabric', 'wedges with embroidery', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(141, 22, 'A1027677', 35, 'color', 'Rose Gold', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(142, 22, 'A1027677', 35, 'design', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(143, 23, 'A977535', 13, 'collection', NULL, NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(144, 23, 'A977535', 13, 'color', 'Black ', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(145, 23, 'A977535', 13, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(146, 23, 'A977535', 13, 'cut', 'Chiddi', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(147, 23, 'A977535', 13, 'dress_length', 'Full', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(148, 24, 'A855850', 13, 'collection', NULL, NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(149, 24, 'A855850', 13, 'color', 'Off-white ', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(150, 24, 'A855850', 13, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(151, 24, 'A855850', 13, 'cut', 'Chiddi', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(152, 24, 'A855850', 13, 'dress_length', 'Full', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(153, 25, 'A879569', 13, 'collection', NULL, NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(154, 25, 'A879569', 13, 'color', 'Fawn ', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(155, 25, 'A879569', 13, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(156, 25, 'A879569', 13, 'cut', 'Chiddi', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(157, 25, 'A879569', 13, 'dress_length', 'Full', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(158, 26, 'A880653', 13, 'collection', NULL, NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(159, 26, 'A880653', 13, 'color', 'Rama green ', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(160, 26, 'A880653', 13, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(161, 26, 'A880653', 13, 'cut', 'Chiddi', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(162, 26, 'A880653', 13, 'dress_length', 'Full', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(163, 27, 'A928538', 13, 'collection', NULL, NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(164, 27, 'A928538', 13, 'color', 'Reddish maroon ', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(165, 27, 'A928538', 13, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(166, 27, 'A928538', 13, 'cut', 'Chiddi', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(167, 27, 'A928538', 13, 'dress_length', 'Full', NULL, NULL, NULL, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(168, 28, 'A908594', 13, 'collection', NULL, NULL, NULL, NULL, '2021-09-22 04:07:07', '2021-09-22 09:37:07'),
(169, 28, 'A908594', 13, 'color', 'Dark brown ', NULL, NULL, NULL, '2021-09-22 04:07:07', '2021-09-22 09:37:07'),
(170, 28, 'A908594', 13, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 04:07:07', '2021-09-22 09:37:07'),
(171, 28, 'A908594', 13, 'cut', 'Chiddi', NULL, NULL, NULL, '2021-09-22 04:07:07', '2021-09-22 09:37:07'),
(172, 28, 'A908594', 13, 'dress_length', 'Full', NULL, NULL, NULL, '2021-09-22 04:07:07', '2021-09-22 09:37:07'),
(173, 29, 'A1055054', 15, 'bottom', 'Skirt', NULL, NULL, NULL, '2021-09-22 04:10:46', '2021-09-22 09:40:46'),
(174, 29, 'A1055054', 15, 'can_can', 'Yes', NULL, NULL, NULL, '2021-09-22 04:10:46', '2021-09-22 09:40:46'),
(175, 29, 'A1055054', 15, 'chest_pads', 'Yes', NULL, NULL, NULL, '2021-09-22 04:10:46', '2021-09-22 09:40:46'),
(176, 29, 'A1055054', 15, 'collection', 'Catalogue', NULL, NULL, NULL, '2021-09-22 04:10:46', '2021-09-22 09:40:46'),
(177, 29, 'A1055054', 15, 'color', 'Crimson Red', NULL, NULL, NULL, '2021-09-22 04:10:46', '2021-09-22 09:40:46'),
(178, 29, 'A1055054', 15, 'color_title', NULL, NULL, NULL, NULL, '2021-09-22 04:10:46', '2021-09-22 09:40:46'),
(179, 29, 'A1055054', 15, 'fabric', 'Georgette', NULL, NULL, NULL, '2021-09-22 04:10:46', '2021-09-22 09:40:46'),
(180, 29, 'A1055054', 15, 'skirt_length', 'Skirt Length-42', NULL, NULL, NULL, '2021-09-22 04:10:46', '2021-09-22 09:40:46'),
(181, 29, 'A1055054', 15, 'sleeves', 'No Sleeves', NULL, NULL, NULL, '2021-09-22 04:10:46', '2021-09-22 09:40:46'),
(182, 29, 'A1055054', 15, 'zip', 'Size Zip', NULL, NULL, NULL, '2021-09-22 04:10:46', '2021-09-22 09:40:46');

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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `cat_id`, `product_id`, `thumbnail`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'anarkali/thumbnails/A1043137_1.jpg', 'anarkali/large/A1043137_1.jpg', '2021-09-22 08:49:26', '2021-09-22 08:49:26'),
(2, 1, NULL, 'anarkali/thumbnails/A1043137_2.jpg', 'anarkali/large/A1043137_2.jpg', '2021-09-22 08:49:27', '2021-09-22 08:49:27'),
(3, 1, NULL, 'anarkali/thumbnails/A1043137_4.jpg', 'anarkali/large/A1043137_4.jpg', '2021-09-22 08:59:10', '2021-09-22 08:59:10'),
(10, 35, NULL, 'sandals/thumbnails/A1027677_1.jpg', 'sandals/large/A1027677_1.jpg', '2021-09-22 12:48:52', '2021-09-22 12:48:52'),
(9, 26, NULL, 'kids_wear/thumbnails/A1050263_2.jpg', 'kids_wear/large/A1050263_2.jpg', '2021-09-22 12:44:14', '2021-09-22 12:44:14'),
(8, 26, NULL, 'kids_wear/thumbnails/A1050263_1.jpg', 'kids_wear/large/A1050263_1.jpg', '2021-09-22 12:44:13', '2021-09-22 12:44:13'),
(11, 6, NULL, 'kurtis/thumbnails/A1013736_1.jpg', 'kurtis/large/A1013736_1.jpg', '2021-09-22 12:51:50', '2021-09-22 12:51:50'),
(12, 13, NULL, 'leggings/thumbnails/A908594_1.jpg', 'leggings/large/A908594_1.jpg', '2021-09-22 12:57:08', '2021-09-22 12:57:08'),
(13, 1, NULL, 'anarkali/thumbnails/A1043138_1.jpg', 'anarkali/large/A1043138_1.jpg', '2021-09-23 09:01:00', '2021-09-23 09:01:00'),
(14, 1, NULL, 'anarkali/thumbnails/A1051562_1.jpg', 'anarkali/large/A1051562_1.jpg', '2021-09-23 09:02:11', '2021-09-23 09:02:11'),
(15, 1, NULL, 'anarkali/thumbnails/A1053450_1.jpg', 'anarkali/large/A1053450_1.jpg', '2021-09-23 09:03:07', '2021-09-23 09:03:07'),
(16, 1, NULL, 'anarkali/thumbnails/A1051559_1.jpg', 'anarkali/large/A1051559_1.jpg', '2021-09-23 09:05:22', '2021-09-23 09:05:22'),
(17, 1, NULL, 'anarkali/thumbnails/A1054499_1.jpg', 'anarkali/large/A1054499_1.jpg', '2021-09-23 09:06:37', '2021-09-23 09:06:37'),
(18, 15, NULL, 'lehengas/thumbnails/A1055054_1.jpg', 'lehengas/large/A1055054_1.jpg', '2021-09-23 09:52:23', '2021-09-23 09:52:23'),
(19, 6, NULL, 'kurtis/thumbnails/A1031304_1.jpg', 'kurtis/large/A1031304_1.jpg', '2021-09-23 11:23:50', '2021-09-23 11:23:50'),
(20, 6, NULL, 'kurtis/thumbnails/A1027274_1.jpg', 'kurtis/large/A1027274_1.jpg', '2021-09-23 11:23:52', '2021-09-23 11:23:52'),
(21, 13, NULL, 'leggings/thumbnails/A928538_1.jpg', 'leggings/large/A928538_1.jpg', '2021-09-23 11:26:34', '2021-09-23 11:26:34'),
(22, 13, NULL, 'leggings/thumbnails/A880653_1.jpg', 'leggings/large/A880653_1.jpg', '2021-09-23 11:27:41', '2021-09-23 11:27:41'),
(23, 13, NULL, 'leggings/thumbnails/A879569_1.jpg', 'leggings/large/A879569_1.jpg', '2021-09-23 11:29:48', '2021-09-23 11:29:48'),
(24, 13, NULL, 'leggings/thumbnails/A855850_1.jpg', 'leggings/large/A855850_1.jpg', '2021-09-23 11:30:44', '2021-09-23 11:30:44'),
(25, 13, NULL, 'leggings/thumbnails/A977535_1.jpg', 'leggings/large/A977535_1.jpg', '2021-09-23 11:31:35', '2021-09-23 11:31:35'),
(26, 26, NULL, 'kids_wear/thumbnails/A1050180_1.jpg', 'kids_wear/large/A1050180_1.jpg', '2021-09-23 11:33:49', '2021-09-23 11:33:49'),
(27, 26, NULL, 'kids_wear/thumbnails/A1050239_1.jpg', 'kids_wear/large/A1050239_1.jpg', '2021-09-23 11:35:38', '2021-09-23 11:35:38'),
(28, 26, NULL, 'kids_wear/thumbnails/A1050205_1.jpg', 'kids_wear/large/A1050205_1.jpg', '2021-09-23 11:36:27', '2021-09-23 11:36:27'),
(29, 26, NULL, 'kids_wear/thumbnails/A1050247_1.jpg', 'kids_wear/large/A1050247_1.jpg', '2021-09-23 11:38:02', '2021-09-23 11:38:02'),
(30, 35, NULL, 'sandals/thumbnails/A1027652_1.jpg', 'sandals/large/A1027652_1.jpg', '2021-09-23 11:47:51', '2021-09-23 11:47:51'),
(31, 35, NULL, 'sandals/thumbnails/A1027682_1.jpg', 'sandals/large/A1027682_1.jpg', '2021-09-23 11:47:53', '2021-09-23 11:47:53'),
(32, 35, NULL, 'sandals/thumbnails/A1027664_1.jpg', 'sandals/large/A1027664_1.jpg', '2021-09-23 11:48:16', '2021-09-23 11:48:16'),
(33, 35, NULL, 'sandals/thumbnails/A1027649_1.jpg', 'sandals/large/A1027649_1.jpg', '2021-09-23 11:48:19', '2021-09-23 11:48:19'),
(34, 35, NULL, 'sandals/thumbnails/A1027671_1.jpg', 'sandals/large/A1027671_1.jpg', '2021-09-23 11:48:28', '2021-09-23 11:48:28'),
(35, 35, NULL, 'sandals/thumbnails/A1027639_1.jpg', 'sandals/large/A1027639_1.jpg', '2021-09-23 11:50:10', '2021-09-23 11:50:10'),
(36, 35, NULL, 'sandals/thumbnails/A1027642_1.jpg', 'sandals/large/A1027642_1.jpg', '2021-09-23 11:50:22', '2021-09-23 11:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `project_photos`
--

CREATE TABLE `project_photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` smallint(6) NOT NULL,
  `prop_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `udf1` text COLLATE utf8mb4_unicode_ci,
  `sub_type` enum('exterior','interior','construction_updates','none','schools','colleges','malls','public_places','hospitals','infra_cover_image') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `type` enum('amenities','gallery','banner','location_map','brochure','none','faq','social_infra','manhatton','masterplan','banner_manhatton','card_banner_manhatton','manhattan_condos','social_infra_image','specifications','custom_section','forms') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `thumb_images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumb_image_description` blob,
  `sorting` smallint(6) NOT NULL DEFAULT '1',
  `image_category` enum('fullwidth','mediumwidth','smallwidth','none') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `video_url` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_show` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_photos`
--

INSERT INTO `project_photos` (`id`, `project_id`, `prop_slug`, `image`, `name`, `description`, `created_at`, `updated_at`, `udf1`, `sub_type`, `type`, `thumb_images`, `thumb_image_description`, `sorting`, `image_category`, `video_url`, `banner_url`, `is_show`) VALUES
(16, 0, NULL, '1628557279.jpg', NULL, NULL, NULL, NULL, NULL, 'none', 'banner', NULL, NULL, 1, 'none', NULL, 'https://taruni.in/v2/category/anarkali', 'yes'),
(17, 0, NULL, '1628557333.jpg', NULL, NULL, NULL, NULL, NULL, 'none', 'banner', NULL, NULL, 1, 'none', NULL, 'https://taruni.in/v2/category/anarkali', 'yes'),
(20, 0, NULL, '1628557390.jpg', NULL, NULL, NULL, NULL, NULL, 'none', 'banner', NULL, NULL, 1, 'none', NULL, 'https://taruni.in/v2/category/anarkali', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `skus`
--

CREATE TABLE `skus` (
  `id` int(11) NOT NULL,
  `sku_code` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_code` varchar(100) DEFAULT NULL,
  `cat_id` int(11) NOT NULL,
  `size` char(30) DEFAULT NULL,
  `variant` varchar(50) DEFAULT NULL,
  `variant_value` varchar(50) DEFAULT NULL,
  `child_variant_value` varchar(50) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `variant_available` varchar(100) DEFAULT NULL,
  `color_combo_variant_name` varchar(150) DEFAULT NULL,
  `price_inr` float NOT NULL DEFAULT '0',
  `price_usd` float NOT NULL DEFAULT '0',
  `on_sale` char(10) DEFAULT 'no',
  `on_sale_price_inr` float DEFAULT '0',
  `on_sale_price_usd` float DEFAULT '0',
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skus`
--

INSERT INTO `skus` (`id`, `sku_code`, `product_id`, `product_code`, `cat_id`, `size`, `variant`, `variant_value`, `child_variant_value`, `picture`, `weight`, `variant_available`, `color_combo_variant_name`, `price_inr`, `price_usd`, `on_sale`, `on_sale_price_inr`, `on_sale_price_usd`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'ANRK-A1054499-1', 1, 'A1054499', 1, NULL, 'Size', 'M', 'S', NULL, NULL, NULL, NULL, 10490, 142, 'No', NULL, NULL, 3, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(2, 'ANRK-A1051559-1', 2, 'A1051559', 1, NULL, 'Size', 'M', 'S', NULL, NULL, NULL, NULL, 3950, 55, 'No', NULL, NULL, 5, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(3, 'ANRK-A1053450-1', 3, 'A1053450', 1, NULL, 'Size', 'M', 'S', NULL, NULL, NULL, NULL, 3890, 54, 'No', NULL, NULL, 4, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(4, 'ANRK-A1051562-1', 4, 'A1051562', 1, NULL, 'Size', 'M', 'S', NULL, NULL, NULL, NULL, 3950, 55, 'No', NULL, NULL, 5, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(5, 'ANRK-A1054499-2', 1, 'A1054499', 1, NULL, 'Size', 'XL', 'M OR L', NULL, NULL, NULL, NULL, 10590, 144, 'No', NULL, NULL, 2, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(6, 'ANRK-A1051559-2', 2, 'A1051559', 1, NULL, 'Size', 'XL', 'M OR L', NULL, NULL, NULL, NULL, 3990, 56, 'No', NULL, NULL, 3, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(7, 'ANRK-A1053450-2', 3, 'A1053450', 1, NULL, 'Size', 'XL', 'M OR L', NULL, NULL, NULL, NULL, 3950, 55, 'No', NULL, NULL, 3, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(8, 'ANRK-A1051562-2', 4, 'A1051562', 1, NULL, 'Size', 'XL', 'M OR L', NULL, NULL, NULL, NULL, 3990, 56, 'No', NULL, NULL, 3, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(9, 'ANRK-A1043137-1', 5, 'A1043137', 1, NULL, 'Size', 'M', 'S', NULL, NULL, NULL, NULL, 6290, 86, 'No', NULL, NULL, 3, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(10, 'ANRK-A1043138-1', 6, 'A1043138', 1, NULL, 'Size', 'M', 'S', NULL, NULL, NULL, NULL, 6290, 86, 'No', NULL, NULL, 3, '2021-09-22 03:00:55', '2021-09-22 08:30:55'),
(11, 'K-A1027274-1', 7, 'A1027274', 6, NULL, 'Size', 'M', 'XS OR S', NULL, NULL, NULL, NULL, 2490, 33, 'No', NULL, NULL, 5, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(12, 'K-A1031304-1', 8, 'A1031304', 6, NULL, 'Size', 'M', 'XS OR S', NULL, NULL, NULL, NULL, 3399, 46.5, 'No', NULL, NULL, 2, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(13, 'K-A1013736-1', 9, 'A1013736', 6, NULL, 'Size', 'M', 'XS OR S', NULL, NULL, NULL, NULL, 2090, 29, 'No', NULL, NULL, 6, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(14, 'K-A1027274-2', 7, 'A1027274', 6, NULL, 'Size', 'L', 'XS, S, M', NULL, NULL, NULL, NULL, 2490, 33, 'No', NULL, NULL, 5, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(15, 'K-A1031304-2', 8, 'A1031304', 6, NULL, 'Size', 'L', 'XS, S, M', NULL, NULL, NULL, NULL, 3399, 46.5, 'No', NULL, NULL, 2, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(16, 'K-A1013736-2', 9, 'A1013736', 6, NULL, 'Size', 'L', 'XS, S, M', NULL, NULL, NULL, NULL, 2090, 29, 'No', NULL, NULL, 4, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(17, 'K-A1027274-3', 7, 'A1027274', 6, NULL, 'Size', 'XL', ' S, M,L', NULL, NULL, NULL, NULL, 2490, 33, 'No', NULL, NULL, 5, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(18, 'K-A1031304-3', 8, 'A1031304', 6, NULL, 'Size', 'XL', ' S, M,L', NULL, NULL, NULL, NULL, 3399, 46.5, 'No', NULL, NULL, 2, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(19, 'K-A1013736-3', 9, 'A1013736', 6, NULL, 'Size', 'XL', ' S, M,L', NULL, NULL, NULL, NULL, 2090, 29, 'No', NULL, NULL, 3, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(20, 'K-A1027274-4', 7, 'A1027274', 6, NULL, 'Size', 'XXL', 'M,L, XL', NULL, NULL, NULL, NULL, 2490, 33, 'No', NULL, NULL, 5, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(21, 'K-A1031304-4', 8, 'A1031304', 6, NULL, 'Size', 'XXL', 'M,L, XL', NULL, NULL, NULL, NULL, 3399, 46.5, 'No', NULL, NULL, 2, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(22, 'K-A1013736-4', 9, 'A1013736', 6, NULL, 'Size', 'XXL', 'M,L, XL', NULL, NULL, NULL, NULL, 2090, 29, 'No', NULL, NULL, 4, '2021-09-22 03:49:36', '2021-09-22 09:19:36'),
(23, 'KID-A1050247-1', 10, 'A1050247', 26, NULL, 'Size', '24', '22', NULL, NULL, NULL, NULL, 2290, 31, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(24, 'KID-A1050205-1', 11, 'A1050205', 26, NULL, 'Size', '24', '22', NULL, NULL, NULL, NULL, 3090, 42, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(25, 'KID-A1050239-1', 12, 'A1050239', 26, NULL, 'Size', '24', '22', NULL, NULL, NULL, NULL, 2990, 41, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(26, 'KID-A1050180-1', 13, 'A1050180', 26, NULL, 'Size', '24', '22', NULL, NULL, NULL, NULL, 3190, 43.5, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(27, 'KID-A1050263-1', 14, 'A1050263', 26, NULL, 'Size', '24', '22', NULL, NULL, NULL, NULL, 3290, 45, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(28, 'KID-A1050247-2', 10, 'A1050247', 26, NULL, 'Size', '26', '22,24', NULL, NULL, NULL, NULL, 2390, 33, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(29, 'KID-A1050205-2', 11, 'A1050205', 26, NULL, 'Size', '26', '22,24', NULL, NULL, NULL, NULL, 3190, 43.5, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(30, 'KID-A1050239-2', 12, 'A1050239', 26, NULL, 'Size', '26', '22,24', NULL, NULL, NULL, NULL, 3090, 42, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(31, 'KID-A1050180-2', 13, 'A1050180', 26, NULL, 'Size', '26', '22,24', NULL, NULL, NULL, NULL, 3290, 45, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(32, 'KID-A1050263-2', 14, 'A1050263', 26, NULL, 'Size', '26', '22,24', NULL, NULL, NULL, NULL, 3390, 46, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(33, 'KID-A1050247-3', 10, 'A1050247', 26, NULL, 'Size', '28', '24,26', NULL, NULL, NULL, NULL, 2490, 34, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(34, 'KID-A1050205-3', 11, 'A1050205', 26, NULL, 'Size', '28', '24,26', NULL, NULL, NULL, NULL, 3290, 44.5, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(35, 'KID-A1050239-3', 12, 'A1050239', 26, NULL, 'Size', '28', '24,26', NULL, NULL, NULL, NULL, 3190, 44, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(36, 'KID-A1050180-3', 13, 'A1050180', 26, NULL, 'Size', '28', '24,26', NULL, NULL, NULL, NULL, 3390, 46, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(37, 'KID-A1050263-3', 14, 'A1050263', 26, NULL, 'Size', '28', '24,26', NULL, NULL, NULL, NULL, 3490, 47, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(38, 'KID-A1050247-4', 10, 'A1050247', 26, NULL, 'Size', '30', '26,28', NULL, NULL, NULL, NULL, 2590, 35, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(39, 'KID-A1050205-4', 11, 'A1050205', 26, NULL, 'Size', '30', '26,28', NULL, NULL, NULL, NULL, 3390, 46, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(40, 'KID-A1050239-4', 12, 'A1050239', 26, NULL, 'Size', '30', '26,28', NULL, NULL, NULL, NULL, 3290, 45, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(41, 'KID-A1050180-4', 13, 'A1050180', 26, NULL, 'Size', '30', '26,28', NULL, NULL, NULL, NULL, 3490, 48, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(42, 'KID-A1050263-4', 14, 'A1050263', 26, NULL, 'Size', '30', '26,28', NULL, NULL, NULL, NULL, 3590, 49, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(43, 'KID-A1050247-5', 10, 'A1050247', 26, NULL, 'Size', '32', '28,30', NULL, NULL, NULL, NULL, 2590, 35, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(44, 'KID-A1050205-5', 11, 'A1050205', 26, NULL, 'Size', '32', '28,30', NULL, NULL, NULL, NULL, 3390, 46, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(45, 'KID-A1050239-5', 12, 'A1050239', 26, NULL, 'Size', '32', '28,30', NULL, NULL, NULL, NULL, 3290, 45, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(46, 'KID-A1050180-5', 13, 'A1050180', 26, NULL, 'Size', '32', '28,30', NULL, NULL, NULL, NULL, 3490, 48, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(47, 'KID-A1050263-5', 14, 'A1050263', 26, NULL, 'Size', '32', '28,30', NULL, NULL, NULL, NULL, 3590, 49, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(48, 'KID-A1050247-6', 10, 'A1050247', 26, NULL, 'Size', '34', '30,32', NULL, NULL, NULL, NULL, 2790, 38, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(49, 'KID-A1050205-6', 11, 'A1050205', 26, NULL, 'Size', '34', '30,32', NULL, NULL, NULL, NULL, 3590, 49, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(50, 'KID-A1050239-6', 12, 'A1050239', 26, NULL, 'Size', '34', '30,32', NULL, NULL, NULL, NULL, 3490, 48, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(51, 'KID-A1050180-6', 13, 'A1050180', 26, NULL, 'Size', '34', '30,32', NULL, NULL, NULL, NULL, 3690, 50, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(52, 'KID-A1050263-6', 14, 'A1050263', 26, NULL, 'Size', '34', '30,32', NULL, NULL, NULL, NULL, 3790, 52, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(53, 'KID-A1050247-7', 10, 'A1050247', 26, NULL, 'Size', '36', '32,34', NULL, NULL, NULL, NULL, 2990, 41, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(54, 'KID-A1050205-7', 11, 'A1050205', 26, NULL, 'Size', '36', '32,34', NULL, NULL, NULL, NULL, 3790, 52, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(55, 'KID-A1050239-7', 12, 'A1050239', 26, NULL, 'Size', '36', '32,34', NULL, NULL, NULL, NULL, 3690, 50, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(56, 'KID-A1050180-7', 13, 'A1050180', 26, NULL, 'Size', '36', '32,34', NULL, NULL, NULL, NULL, 3890, 53, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(57, 'KID-A1050263-7', 14, 'A1050263', 26, NULL, 'Size', '36', '32,34', NULL, NULL, NULL, NULL, 3990, 54, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(58, 'KID-A1050247-8', 10, 'A1050247', 26, NULL, 'Size', '38', '34,36', NULL, NULL, NULL, NULL, 3190, 44, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(59, 'KID-A1050205-8', 11, 'A1050205', 26, NULL, 'Size', '38', '34,36', NULL, NULL, NULL, NULL, 3990, 54, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(60, 'KID-A1050239-8', 12, 'A1050239', 26, NULL, 'Size', '38', '34,36', NULL, NULL, NULL, NULL, 3890, 53, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(61, 'KID-A1050180-8', 13, 'A1050180', 26, NULL, 'Size', '38', '34,36', NULL, NULL, NULL, NULL, 4090, 56, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(62, 'KID-A1050263-8', 14, 'A1050263', 26, NULL, 'Size', '38', '34,36', NULL, NULL, NULL, NULL, 4090, 56, 'No', NULL, NULL, 1, '2021-09-22 04:02:14', '2021-09-22 09:32:14'),
(63, 'SAN-A1027671-1', 15, 'A1027671', 35, NULL, 'Size', '36', 'NO', NULL, NULL, NULL, NULL, 1490, 21, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(64, 'SAN-A1027649-1', 16, 'A1027649', 35, NULL, 'Size', '36', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(65, 'SAN-A1027664-1', 17, 'A1027664', 35, NULL, 'Size', '36', 'NO', NULL, NULL, NULL, NULL, 1490, 21, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(66, 'SAN-A1027682-1', 18, 'A1027682', 35, NULL, 'Size', '36', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(67, 'SAN-A1027652-1', 19, 'A1027652', 35, NULL, 'Size', '36', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(68, 'SAN-A1027639-1', 20, 'A1027639', 35, NULL, 'Size', '36', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(69, 'SAN-A1027642-1', 21, 'A1027642', 35, NULL, 'Size', '36', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(70, 'SAN-A1027677-1', 22, 'A1027677', 35, NULL, 'Size', '36', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(71, 'SAN-A1027671-2', 15, 'A1027671', 35, NULL, 'Size', '37', 'NO', NULL, NULL, NULL, NULL, 1490, 21, 'No', NULL, NULL, 2, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(72, 'SAN-A1027649-2', 16, 'A1027649', 35, NULL, 'Size', '37', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(73, 'SAN-A1027664-2', 17, 'A1027664', 35, NULL, 'Size', '37', 'NO', NULL, NULL, NULL, NULL, 1490, 21, 'No', NULL, NULL, 2, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(74, 'SAN-A1027682-2', 18, 'A1027682', 35, NULL, 'Size', '37', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(75, 'SAN-A1027652-2', 19, 'A1027652', 35, NULL, 'Size', '37', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(76, 'SAN-A1027639-2', 20, 'A1027639', 35, NULL, 'Size', '37', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(77, 'SAN-A1027642-2', 21, 'A1027642', 35, NULL, 'Size', '37', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(78, 'SAN-A1027677-2', 22, 'A1027677', 35, NULL, 'Size', '37', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 2, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(79, 'SAN-A1027671-3', 15, 'A1027671', 35, NULL, 'Size', '38', 'NO', NULL, NULL, NULL, NULL, 1490, 21, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(80, 'SAN-A1027649-3', 16, 'A1027649', 35, NULL, 'Size', '38', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 2, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(81, 'SAN-A1027664-3', 17, 'A1027664', 35, NULL, 'Size', '38', 'NO', NULL, NULL, NULL, NULL, 1490, 21, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(82, 'SAN-A1027682-3', 18, 'A1027682', 35, NULL, 'Size', '38', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(83, 'SAN-A1027652-3', 19, 'A1027652', 35, NULL, 'Size', '38', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 2, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(84, 'SAN-A1027639-3', 20, 'A1027639', 35, NULL, 'Size', '38', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 2, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(85, 'SAN-A1027642-3', 21, 'A1027642', 35, NULL, 'Size', '38', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(86, 'SAN-A1027677-3', 22, 'A1027677', 35, NULL, 'Size', '38', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(87, 'SAN-A1027671-4', 15, 'A1027671', 35, NULL, 'Size', '39', 'NO', NULL, NULL, NULL, NULL, 1490, 21, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(88, 'SAN-A1027649-4', 16, 'A1027649', 35, NULL, 'Size', '39', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(89, 'SAN-A1027664-4', 17, 'A1027664', 35, NULL, 'Size', '39', 'NO', NULL, NULL, NULL, NULL, 1490, 21, 'No', NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(90, 'SAN-A1027682-4', 18, 'A1027682', 35, NULL, 'Size', '39', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(91, 'SAN-A1027652-4', 19, 'A1027652', 35, NULL, 'Size', '39', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(92, 'SAN-A1027639-4', 20, 'A1027639', 35, NULL, 'Size', '39', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(93, 'SAN-A1027642-4', 21, 'A1027642', 35, NULL, 'Size', '39', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(94, 'SAN-A1027677-4', 22, 'A1027677', 35, NULL, 'Size', '39', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(95, 'SAN-A1027671-5', 15, 'A1027671', 35, NULL, 'Size', '40', 'NO', NULL, NULL, NULL, NULL, 1490, 21, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(96, 'SAN-A1027649-5', 16, 'A1027649', 35, NULL, 'Size', '40', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(97, 'SAN-A1027664-5', 17, 'A1027664', 35, NULL, 'Size', '40', 'NO', NULL, NULL, NULL, NULL, 1490, 21, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(98, 'SAN-A1027682-5', 18, 'A1027682', 35, NULL, 'Size', '40', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(99, 'SAN-A1027652-5', 19, 'A1027652', 35, NULL, 'Size', '40', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(100, 'SAN-A1027639-5', 20, 'A1027639', 35, NULL, 'Size', '40', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 0, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(101, 'SAN-A1027642-5', 21, 'A1027642', 35, NULL, 'Size', '40', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(102, 'SAN-A1027677-5', 22, 'A1027677', 35, NULL, 'Size', '40', 'NO', NULL, NULL, NULL, NULL, 1390, 20, 'No', NULL, NULL, 1, '2021-09-22 04:03:08', '2021-09-22 09:33:08'),
(103, 'LG-A977535-1', 23, 'A977535', 13, NULL, 'Size', 'M', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(104, 'LG-A855850-1', 24, 'A855850', 13, NULL, 'Size', 'M', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(105, 'LG-A879569-1', 25, 'A879569', 13, NULL, 'Size', 'M', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(106, 'LG-A880653-1', 26, 'A880653', 13, NULL, 'Size', 'M', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(107, 'LG-A928538-1', 27, 'A928538', 13, NULL, 'Size', 'M', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(108, 'LG-A908594-1', 28, 'A908594', 13, NULL, 'Size', 'M', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:07', '2021-09-22 09:37:07'),
(109, 'LG-A977535-2', 23, 'A977535', 13, NULL, 'Size', 'XL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(110, 'LG-A855850-2', 24, 'A855850', 13, NULL, 'Size', 'XL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(111, 'LG-A879569-2', 25, 'A879569', 13, NULL, 'Size', 'XL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(112, 'LG-A880653-2', 26, 'A880653', 13, NULL, 'Size', 'XL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(113, 'LG-A928538-2', 27, 'A928538', 13, NULL, 'Size', 'XL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(114, 'LG-A908594-2', 28, 'A908594', 13, NULL, 'Size', 'XL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:07', '2021-09-22 09:37:07'),
(115, 'LG-A977535-3', 23, 'A977535', 13, NULL, 'Size', 'XXL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(116, 'LG-A855850-3', 24, 'A855850', 13, NULL, 'Size', 'XXL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(117, 'LG-A879569-3', 25, 'A879569', 13, NULL, 'Size', 'XXL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(118, 'LG-A880653-3', 26, 'A880653', 13, NULL, 'Size', 'XXL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(119, 'LG-A928538-3', 27, 'A928538', 13, NULL, 'Size', 'XXL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:06', '2021-09-22 09:37:06'),
(120, 'LG-A908594-3', 28, 'A908594', 13, NULL, 'Size', 'XXL', 'NO', NULL, NULL, NULL, NULL, 580, 8.5, 'No', NULL, NULL, 30, '2021-09-22 04:07:07', '2021-09-22 09:37:07'),
(121, 'LE-A1055054-1', 29, 'A1055054', 15, NULL, 'Size', 'M', 'S', NULL, NULL, NULL, NULL, 11290, 154, 'No', NULL, NULL, 1, '2021-09-22 04:10:46', '2021-09-22 09:40:46');

-- --------------------------------------------------------

--
-- Table structure for table `temp_products`
--

CREATE TABLE `temp_products` (
  `id` int(11) NOT NULL,
  `is_error` text,
  `product_name` varchar(250) DEFAULT NULL,
  `product_slug` varchar(255) DEFAULT NULL,
  `code` char(30) DEFAULT NULL,
  `category_id` int(11) DEFAULT '0',
  `description` varchar(250) DEFAULT NULL,
  `variant` varchar(50) DEFAULT NULL,
  `variant_name` varchar(100) DEFAULT NULL,
  `child_variant` varchar(50) DEFAULT NULL,
  `combination_variant_name` varchar(200) DEFAULT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `weight` varchar(50) DEFAULT NULL,
  `product_available` char(20) DEFAULT NULL,
  `sku_code` char(50) DEFAULT NULL,
  `stock_total` float DEFAULT '0',
  `price_inr` float DEFAULT '0',
  `price_usd` float DEFAULT '0',
  `on_sale` char(10) DEFAULT 'No',
  `on_sale_price` float DEFAULT '0',
  `on_sale_price_usd` float DEFAULT '0',
  `attribute_1` text,
  `unstitched` varchar(50) DEFAULT NULL,
  `fabric` varchar(100) DEFAULT NULL,
  `bottom` varchar(100) DEFAULT NULL,
  `sleeve` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `dress_length` varchar(100) DEFAULT NULL,
  `color_title` varchar(100) DEFAULT NULL,
  `skirt_length` varchar(100) DEFAULT NULL,
  `can_can` varchar(100) DEFAULT NULL,
  `collection` varchar(100) DEFAULT NULL,
  `chest_pads` varchar(100) DEFAULT NULL,
  `desigin` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_products`
--

INSERT INTO `temp_products` (`id`, `is_error`, `product_name`, `product_slug`, `code`, `category_id`, `description`, `variant`, `variant_name`, `child_variant`, `combination_variant_name`, `picture`, `weight`, `product_available`, `sku_code`, `stock_total`, `price_inr`, `price_usd`, `on_sale`, `on_sale_price`, `on_sale_price_usd`, `attribute_1`, `unstitched`, `fabric`, `bottom`, `sleeve`, `zip`, `dress_length`, `color_title`, `skirt_length`, `can_can`, `collection`, `chest_pads`, `desigin`, `created_at`, `updated_at`) VALUES
(112, '<ul><li>Product code is not valid.</li><li>Price is not valid.[INR]</li><li>Price is not valid.[USD]</li></ul>', NULL, '', NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LG--1', NULL, NULL, NULL, 'No', NULL, NULL, '{\"collection\":null,\"color\":null,\"color_title\":null,\"cut\":null,\"dress_length\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-22 04:06:58', '2021-09-22 04:06:58'),
(113, '<ul><li>Product code is not valid.</li><li>Price is not valid.[INR]</li><li>Price is not valid.[USD]</li></ul>', NULL, '', NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LG--2', NULL, NULL, NULL, 'No', NULL, NULL, '{\"collection\":null,\"color\":null,\"color_title\":null,\"cut\":null,\"dress_length\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-22 04:06:58', '2021-09-22 04:06:58'),
(114, '<ul><li>Product code is not valid.</li><li>Price is not valid.[INR]</li><li>Price is not valid.[USD]</li></ul>', NULL, '', NULL, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'LG--3', NULL, NULL, NULL, 'No', NULL, NULL, '{\"collection\":null,\"color\":null,\"color_title\":null,\"cut\":null,\"dress_length\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-09-22 04:06:58', '2021-09-22 04:06:58');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `image`, `video_url`, `company`, `designation`, `created_at`, `updated_at`) VALUES
(25, 'Shruti Nair', 'The products are so good!', '1628559767.png', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `themeoptions`
--

CREATE TABLE `themeoptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_address` text COLLATE utf8mb4_unicode_ci,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy_cta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `terms_conditions_cta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `themeoptions`
--

INSERT INTO `themeoptions` (`id`, `header_logo`, `footer_logo`, `favicon`, `footer_address`, `facebook_url`, `twitter_url`, `linkedin_url`, `instagram_url`, `pinterest_url`, `youtube_url`, `copyright`, `mobile`, `email`, `privacy_cta`, `terms_conditions_cta`, `created_at`, `updated_at`) VALUES
(1, '61457ebfa52e6_1631944383.png', NULL, '614afcdb2e971_1632304347.ico', NULL, 'https://www.facebook.com/taruni.in', 'https://twitter.com/TaruniOfficial', NULL, 'https://www.instagram.com/taruni.in/', 'https://in.pinterest.com/taruniOfficial/', 'https://www.youtube.com/channel/UCecFAgCOVpGA5g0ZnlJvvvQ', '© Copyright Taruni 2021', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `used_coupons`
--

CREATE TABLE `used_coupons` (
  `id` int(11) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `used_coupons`
--

INSERT INTO `used_coupons` (`id`, `user_id`, `cart_id`, `coupon_id`, `coupon_code`, `created_at`, `updated_at`) VALUES
(1, '11', 1, 8, 'FXD1000', '2021-09-08 11:23:04', '2021-09-08 11:23:04'),
(2, '11', 2, 7, 'WLCM10', '2021-09-15 15:46:27', '2021-09-15 21:16:27'),
(3, '25', 10, 7, 'WLCM10', '2021-09-23 06:31:58', '2021-09-23 12:01:58'),
(4, '25', 12, 8, 'FXD1000', '2021-09-23 12:48:58', '2021-09-23 12:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) DEFAULT '0',
  `email` varchar(255) DEFAULT NULL,
  `password` text,
  `phone` varchar(20) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` text,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `pincode` char(10) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `donot_send_newsletter` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `is_guest` int(11) DEFAULT NULL,
  `guest_email` text,
  `sent_email` int(11) DEFAULT NULL,
  `social_media` text,
  `identifier` text,
  `ip` text,
  `is_active_status` enum('0','1') NOT NULL DEFAULT '1',
  `remember_token` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `email`, `password`, `phone`, `country`, `state`, `city`, `address`, `firstname`, `lastname`, `age`, `pincode`, `gender`, `profile`, `profile_pic`, `user_type`, `donot_send_newsletter`, `date`, `is_guest`, `guest_email`, `sent_email`, `social_media`, `identifier`, `ip`, `is_active_status`, `remember_token`, `created_at`, `updated_at`) VALUES
(11, 1, 'admin@taruni.in', '$2y$10$H.R0Twsi4oFv2wPs5NOQ0OGYdI1dyGtlbLhBmsVfMN2het3KmpU0y', '9052691535', 'india', 'TG', 'Hyderabad', 'Banjara hills, road no 12 hyd', 'Venkat', 'Yadav', NULL, '500034', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '6KCdkaSP9PK0xg04P5M6u4ZYArHKwmheoAXlzytASVKDoP6OR4c4czp9zfSN', '2021-07-02 01:33:40', '2021-07-02 01:34:53'),
(21, 0, 'jayarajuv5@gmail.com', '$2y$10$Po0p4pMUgjAoC9A/CUPmGOcSpx59d/PR8j0sjwHD.y78/ymA/vRXq', '9700334319', 'india', 'AP', 'Vijayawada', 'Vijayawada', 'jayaraju', 'vangapandu', NULL, '520004', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2021-09-22 07:55:08', '2021-09-22 07:57:06'),
(22, 0, 'venkat@deepredink.com', '$2y$10$CbK6C8Bvn1QHcJNf6NlmWegqNxvV7o91WaJtoeGIeu1i0GXfONsfC', NULL, 'india', 'TS', 'Hyd', 'NA', 'Venkat Yadav', NULL, NULL, '500034', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'MKW1KZigU43ZJu5WJ8xfEnpL01irgEEeMB4TalciFUGqcUOPc6vK4xleeSHb', '2021-09-22 09:49:19', '2021-09-23 10:16:27'),
(23, 0, 'priya@deepredink.com', NULL, NULL, 'india', 'Andhra Pradesh', 'Ramachandrapuram', '', 'Sri Lakshmi Priya Valluri', NULL, NULL, '533255', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'tF6D2VAq6NRGBKMjbX1JCCKwdYk9EmJObPVYjFVOY7GUQAcklxSQL0UxEi6m', '2021-09-23 11:16:15', '2021-09-23 11:17:28'),
(24, 0, 'harish.babu@deepredink.com', NULL, NULL, 'india', 'Telangana', 'Hyderabad', 'Vijaya Durga, B-block, Nagarjuna Homes, Nizampet road, Kukatpally', 'Harish', NULL, NULL, 'hgkhgj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'U3so4jYnW4Qmr6RXv2rMBxfnL2TcZ2MVBqC30jP4uVIdjsvEezBTH9Ov9J3R', '2021-09-23 11:53:52', '2021-09-23 12:02:18'),
(25, 0, 'imshubhang@gmail.com', NULL, NULL, 'india', 'Telangana09', 'hyderabad99', '', 'shubhang yadav', NULL, NULL, 'hi009', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'NY42fdQuEENdejWgV3lJPDtcHj4GVouzm2GWSbZU6NckHtsq9wA39A6mdPmz', '2021-09-23 12:01:58', '2021-09-23 12:02:45'),
(27, 0, 'harish.gorantla123@gmail.com', '$2y$10$zXbZPxa8DbL7XMqg4pYQq.YRnqtjpmtoz.Bx80abMVELOQYCMRUR2', '09032555564', '', '', '', '', 'Harish', 'Gorantla', NULL, '000000', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, '2021-09-23 12:31:55', '2021-09-23 12:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 21, 5, '2021-09-22 10:50:34', '2021-09-22 10:50:34'),
(3, 11, 5, '2021-09-22 18:00:46', '2021-09-22 18:00:46'),
(4, 24, 6, '2021-09-23 11:54:09', '2021-09-23 11:54:09'),
(5, 27, 6, '2021-09-23 12:34:14', '2021-09-23 12:34:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `address_master`
--
ALTER TABLE `address_master`
  ADD PRIMARY KEY (`AddressID`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `sku_id` (`sku_id`),
  ADD KEY `fit_profile_id` (`fit_profile_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`CouponID`);

--
-- Indexes for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_tickets`
--
ALTER TABLE `help_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `linked_social_accounts`
--
ALTER TABLE `linked_social_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_coupons`
--
ALTER TABLE `my_coupons`
  ADD PRIMARY KEY (`CouponID`);

--
-- Indexes for table `my_fit_profile`
--
ALTER TABLE `my_fit_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `sku_id` (`sku_id`),
  ADD KEY `fit_profile_id` (`fit_profile_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_attributes`
--
ALTER TABLE `parent_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_photos`
--
ALTER TABLE `project_photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_colums` (`project_id`,`sub_type`,`type`,`sorting`);

--
-- Indexes for table `skus`
--
ALTER TABLE `skus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `fk_cat_id` (`cat_id`);

--
-- Indexes for table `temp_products`
--
ALTER TABLE `temp_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themeoptions`
--
ALTER TABLE `themeoptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `used_coupons`
--
ALTER TABLE `used_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `wishlists_ibfk_2` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `address_master`
--
ALTER TABLE `address_master`
  MODIFY `AddressID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `CouponID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `help_tickets`
--
ALTER TABLE `help_tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `linked_social_accounts`
--
ALTER TABLE `linked_social_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `my_coupons`
--
ALTER TABLE `my_coupons`
  MODIFY `CouponID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `my_fit_profile`
--
ALTER TABLE `my_fit_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parent_attributes`
--
ALTER TABLE `parent_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `project_photos`
--
ALTER TABLE `project_photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `skus`
--
ALTER TABLE `skus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `temp_products`
--
ALTER TABLE `temp_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `themeoptions`
--
ALTER TABLE `themeoptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `used_coupons`
--
ALTER TABLE `used_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `skus`
--
ALTER TABLE `skus`
  ADD CONSTRAINT `skus_ibfk_2` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `skus_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
