-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 07:35 AM
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
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `country_name` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'US', 'United States', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(2, 'CA', 'Canada', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(3, 'AF', 'Afghanistan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(4, 'AL', 'Albania', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(5, 'DZ', 'Algeria', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(6, 'DS', 'American Samoa', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(7, 'AD', 'Andorra', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(8, 'AO', 'Angola', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(9, 'AI', 'Anguilla', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(10, 'AQ', 'Antarctica', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(11, 'AG', 'Antigua and/or Barbuda', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(12, 'AR', 'Argentina', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(13, 'AM', 'Armenia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(14, 'AW', 'Aruba', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(15, 'AU', 'Australia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(16, 'AT', 'Austria', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(17, 'AZ', 'Azerbaijan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(18, 'BS', 'Bahamas', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(19, 'BH', 'Bahrain', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(20, 'BD', 'Bangladesh', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(21, 'BB', 'Barbados', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(22, 'BY', 'Belarus', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(23, 'BE', 'Belgium', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(24, 'BZ', 'Belize', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(25, 'BJ', 'Benin', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(26, 'BM', 'Bermuda', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(27, 'BT', 'Bhutan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(28, 'BO', 'Bolivia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(29, 'BA', 'Bosnia and Herzegovina', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(30, 'BW', 'Botswana', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(31, 'BV', 'Bouvet Island', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(32, 'BR', 'Brazil', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(33, 'IO', 'British lndian Ocean Territory', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(34, 'BN', 'Brunei Darussalam', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(35, 'BG', 'Bulgaria', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(36, 'BF', 'Burkina Faso', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(37, 'BI', 'Burundi', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(38, 'KH', 'Cambodia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(39, 'CM', 'Cameroon', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(40, 'CV', 'Cape Verde', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(41, 'KY', 'Cayman Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(42, 'CF', 'Central African Republic', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(43, 'TD', 'Chad', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(44, 'CL', 'Chile', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(45, 'CN', 'China', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(46, 'CX', 'Christmas Island', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(47, 'CC', 'Cocos (Keeling) Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(48, 'CO', 'Colombia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(49, 'KM', 'Comoros', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(50, 'CG', 'Congo', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(51, 'CK', 'Cook Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(52, 'CR', 'Costa Rica', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(53, 'HR', 'Croatia (Hrvatska)', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(54, 'CU', 'Cuba', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(55, 'CY', 'Cyprus', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(56, 'CZ', 'Czech Republic', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(57, 'DK', 'Denmark', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(58, 'DJ', 'Djibouti', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(59, 'DM', 'Dominica', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(60, 'DO', 'Dominican Republic', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(61, 'TP', 'East Timor', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(62, 'EC', 'Ecuador', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(63, 'EG', 'Egypt', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(64, 'SV', 'El Salvador', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(65, 'GQ', 'Equatorial Guinea', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(66, 'ER', 'Eritrea', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(67, 'EE', 'Estonia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(68, 'ET', 'Ethiopia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(69, 'FK', 'Falkland Islands (Malvinas)', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(70, 'FO', 'Faroe Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(71, 'FJ', 'Fiji', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(72, 'FI', 'Finland', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(73, 'FR', 'France', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(74, 'FX', 'France, Metropolitan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(75, 'GF', 'French Guiana', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(76, 'PF', 'French Polynesia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(77, 'TF', 'French Southern Territories', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(78, 'GA', 'Gabon', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(79, 'GM', 'Gambia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(80, 'GE', 'Georgia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(81, 'DE', 'Germany', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(82, 'GH', 'Ghana', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(83, 'GI', 'Gibraltar', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(84, 'GR', 'Greece', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(85, 'GL', 'Greenland', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(86, 'GD', 'Grenada', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(87, 'GP', 'Guadeloupe', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(88, 'GU', 'Guam', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(89, 'GT', 'Guatemala', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(90, 'GN', 'Guinea', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(91, 'GW', 'Guinea-Bissau', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(92, 'GY', 'Guyana', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(93, 'HT', 'Haiti', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(94, 'HM', 'Heard and Mc Donald Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(95, 'HN', 'Honduras', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(96, 'HK', 'Hong Kong', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(97, 'HU', 'Hungary', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(98, 'IS', 'Iceland', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(99, 'IN', 'India', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(100, 'ID', 'Indonesia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(101, 'IR', 'Iran (Islamic Republic of)', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(102, 'IQ', 'Iraq', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(103, 'IE', 'Ireland', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(104, 'IL', 'Israel', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(105, 'IT', 'Italy', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(106, 'CI', 'Ivory Coast', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(107, 'JM', 'Jamaica', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(108, 'JP', 'Japan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(109, 'JO', 'Jordan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(110, 'KZ', 'Kazakhstan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(111, 'KE', 'Kenya', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(112, 'KI', 'Kiribati', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(113, 'KP', 'Korea, Democratic People\'s Republic of', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(114, 'KR', 'Korea, Republic of', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(115, 'XK', 'Kosovo', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(116, 'KW', 'Kuwait', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(117, 'KG', 'Kyrgyzstan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(118, 'LA', 'Lao People\'s Democratic Republic', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(119, 'LV', 'Latvia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(120, 'LB', 'Lebanon', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(121, 'LS', 'Lesotho', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(122, 'LR', 'Liberia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(123, 'LY', 'Libyan Arab Jamahiriya', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(124, 'LI', 'Liechtenstein', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(125, 'LT', 'Lithuania', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(126, 'LU', 'Luxembourg', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(127, 'MO', 'Macau', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(128, 'MK', 'Macedonia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(129, 'MG', 'Madagascar', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(130, 'MW', 'Malawi', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(131, 'MY', 'Malaysia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(132, 'MV', 'Maldives', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(133, 'ML', 'Mali', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(134, 'MT', 'Malta', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(135, 'MH', 'Marshall Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(136, 'MQ', 'Martinique', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(137, 'MR', 'Mauritania', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(138, 'MU', 'Mauritius', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(139, 'TY', 'Mayotte', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(140, 'MX', 'Mexico', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(141, 'FM', 'Micronesia, Federated States of', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(142, 'MD', 'Moldova, Republic of', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(143, 'MC', 'Monaco', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(144, 'MN', 'Mongolia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(145, 'ME', 'Montenegro', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(146, 'MS', 'Montserrat', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(147, 'MA', 'Morocco', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(148, 'MZ', 'Mozambique', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(149, 'MM', 'Myanmar', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(150, 'NA', 'Namibia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(151, 'NR', 'Nauru', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(152, 'NP', 'Nepal', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(153, 'NL', 'Netherlands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(154, 'AN', 'Netherlands Antilles', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(155, 'NC', 'New Caledonia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(156, 'NZ', 'New Zealand', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(157, 'NI', 'Nicaragua', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(158, 'NE', 'Niger', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(159, 'NG', 'Nigeria', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(160, 'NU', 'Niue', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(161, 'NF', 'Norfork Island', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(162, 'MP', 'Northern Mariana Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(163, 'NO', 'Norway', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(164, 'OM', 'Oman', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(165, 'PK', 'Pakistan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(166, 'PW', 'Palau', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(167, 'PA', 'Panama', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(168, 'PG', 'Papua New Guinea', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(169, 'PY', 'Paraguay', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(170, 'PE', 'Peru', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(171, 'PH', 'Philippines', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(172, 'PN', 'Pitcairn', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(173, 'PL', 'Poland', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(174, 'PT', 'Portugal', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(175, 'PR', 'Puerto Rico', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(176, 'QA', 'Qatar', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(177, 'RE', 'Reunion', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(178, 'RO', 'Romania', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(179, 'RU', 'Russian Federation', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(180, 'RW', 'Rwanda', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(181, 'KN', 'Saint Kitts and Nevis', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(182, 'LC', 'Saint Lucia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(183, 'VC', 'Saint Vincent and the Grenadines', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(184, 'WS', 'Samoa', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(185, 'SM', 'San Marino', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(186, 'ST', 'Sao Tome and Principe', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(187, 'SA', 'Saudi Arabia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(188, 'SN', 'Senegal', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(189, 'RS', 'Serbia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(190, 'SC', 'Seychelles', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(191, 'SL', 'Sierra Leone', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(192, 'SG', 'Singapore', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(193, 'SK', 'Slovakia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(194, 'SI', 'Slovenia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(195, 'SB', 'Solomon Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(196, 'SO', 'Somalia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(197, 'ZA', 'South Africa', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(198, 'GS', 'South Georgia South Sandwich Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(199, 'ES', 'Spain', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(200, 'LK', 'Sri Lanka', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(201, 'SH', 'St. Helena', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(202, 'PM', 'St. Pierre and Miquelon', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(203, 'SD', 'Sudan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(204, 'SR', 'Suriname', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(205, 'SJ', 'Svalbarn and Jan Mayen Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(206, 'SZ', 'Swaziland', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(207, 'SE', 'Sweden', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(208, 'CH', 'Switzerland', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(209, 'SY', 'Syrian Arab Republic', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(210, 'TW', 'Taiwan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(211, 'TJ', 'Tajikistan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(212, 'TZ', 'Tanzania, United Republic of', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(213, 'TH', 'Thailand', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(214, 'TG', 'Togo', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(215, 'TK', 'Tokelau', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(216, 'TO', 'Tonga', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(217, 'TT', 'Trinidad and Tobago', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(218, 'TN', 'Tunisia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(219, 'TR', 'Turkey', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(220, 'TM', 'Turkmenistan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(221, 'TC', 'Turks and Caicos Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(222, 'TV', 'Tuvalu', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(223, 'UG', 'Uganda', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(224, 'UA', 'Ukraine', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(225, 'AE', 'United Arab Emirates', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(226, 'GB', 'United Kingdom', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(227, 'UM', 'United States minor outlying islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(228, 'UY', 'Uruguay', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(229, 'UZ', 'Uzbekistan', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(230, 'VU', 'Vanuatu', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(231, 'VA', 'Vatican City State', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(232, 'VE', 'Venezuela', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(233, 'VN', 'Vietnam', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(234, 'VG', 'Virgin Islands (British)', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(235, 'VI', 'Virgin Islands (U.S.)', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(236, 'WF', 'Wallis and Futuna Islands', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(237, 'EH', 'Western Sahara', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(238, 'YE', 'Yemen', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(239, 'YU', 'Yugoslavia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(240, 'ZR', 'Zaire', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(241, 'ZM', 'Zambia', '2021-10-01 05:27:18', '2021-10-01 05:27:18'),
(242, 'ZW', 'Zimbabwe', '2021-10-01 05:27:18', '2021-10-01 05:27:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=243;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
