-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 20, 2021 at 09:19 PM
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
-- Database: `tarunipo_ta4ru4ni1`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `country_name` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `shipping_rate_id` int(11) NOT NULL,
  `shipping_time_id` int(11) NOT NULL,
  `tax_percentage` float NOT NULL,
  `cod_available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `shipping_rate_id`, `shipping_time_id`, `tax_percentage`, `cod_available`) VALUES
(1, 'US', 'United States', 1, 1, 0, 0),
(2, 'CA', 'Canada', 1, 1, 0, 0),
(3, 'AF', 'Afghanistan', 1, 1, 0, 0),
(4, 'AL', 'Albania', 1, 1, 0, 0),
(5, 'DZ', 'Algeria', 1, 1, 0, 0),
(6, 'DS', 'American Samoa', 1, 1, 0, 0),
(7, 'AD', 'Andorra', 1, 1, 0, 0),
(8, 'AO', 'Angola', 1, 1, 0, 0),
(9, 'AI', 'Anguilla', 1, 1, 0, 0),
(10, 'AQ', 'Antarctica', 1, 1, 0, 0),
(11, 'AG', 'Antigua and/or Barbuda', 1, 1, 0, 0),
(12, 'AR', 'Argentina', 1, 1, 0, 0),
(13, 'AM', 'Armenia', 1, 1, 0, 0),
(14, 'AW', 'Aruba', 1, 1, 0, 0),
(15, 'AU', 'Australia', 1, 1, 0, 0),
(16, 'AT', 'Austria', 1, 1, 0, 0),
(17, 'AZ', 'Azerbaijan', 1, 1, 0, 0),
(18, 'BS', 'Bahamas', 1, 1, 0, 0),
(19, 'BH', 'Bahrain', 1, 1, 0, 0),
(20, 'BD', 'Bangladesh', 1, 1, 0, 0),
(21, 'BB', 'Barbados', 1, 1, 0, 0),
(22, 'BY', 'Belarus', 1, 1, 0, 0),
(23, 'BE', 'Belgium', 1, 1, 0, 0),
(24, 'BZ', 'Belize', 1, 1, 0, 0),
(25, 'BJ', 'Benin', 1, 1, 0, 0),
(26, 'BM', 'Bermuda', 1, 1, 0, 0),
(27, 'BT', 'Bhutan', 1, 1, 0, 0),
(28, 'BO', 'Bolivia', 1, 1, 0, 0),
(29, 'BA', 'Bosnia and Herzegovina', 1, 1, 0, 0),
(30, 'BW', 'Botswana', 1, 1, 0, 0),
(31, 'BV', 'Bouvet Island', 1, 1, 0, 0),
(32, 'BR', 'Brazil', 1, 1, 0, 0),
(33, 'IO', 'British lndian Ocean Territory', 1, 1, 0, 0),
(34, 'BN', 'Brunei Darussalam', 1, 1, 0, 0),
(35, 'BG', 'Bulgaria', 1, 1, 0, 0),
(36, 'BF', 'Burkina Faso', 1, 1, 0, 0),
(37, 'BI', 'Burundi', 1, 1, 0, 0),
(38, 'KH', 'Cambodia', 1, 1, 0, 0),
(39, 'CM', 'Cameroon', 1, 1, 0, 0),
(40, 'CV', 'Cape Verde', 1, 1, 0, 0),
(41, 'KY', 'Cayman Islands', 1, 1, 0, 0),
(42, 'CF', 'Central African Republic', 1, 1, 0, 0),
(43, 'TD', 'Chad', 1, 1, 0, 0),
(44, 'CL', 'Chile', 1, 1, 0, 0),
(45, 'CN', 'China', 1, 1, 0, 0),
(46, 'CX', 'Christmas Island', 1, 1, 0, 0),
(47, 'CC', 'Cocos (Keeling) Islands', 1, 1, 0, 0),
(48, 'CO', 'Colombia', 1, 1, 0, 0),
(49, 'KM', 'Comoros', 1, 1, 0, 0),
(50, 'CG', 'Congo', 1, 1, 0, 0),
(51, 'CK', 'Cook Islands', 1, 1, 0, 0),
(52, 'CR', 'Costa Rica', 1, 1, 0, 0),
(53, 'HR', 'Croatia (Hrvatska)', 1, 1, 0, 0),
(54, 'CU', 'Cuba', 1, 1, 0, 0),
(55, 'CY', 'Cyprus', 1, 1, 0, 0),
(56, 'CZ', 'Czech Republic', 1, 1, 0, 0),
(57, 'DK', 'Denmark', 1, 1, 0, 0),
(58, 'DJ', 'Djibouti', 1, 1, 0, 0),
(59, 'DM', 'Dominica', 1, 1, 0, 0),
(60, 'DO', 'Dominican Republic', 1, 1, 0, 0),
(61, 'TP', 'East Timor', 1, 1, 0, 0),
(62, 'EC', 'Ecuador', 1, 1, 0, 0),
(63, 'EG', 'Egypt', 1, 1, 0, 0),
(64, 'SV', 'El Salvador', 1, 1, 0, 0),
(65, 'GQ', 'Equatorial Guinea', 1, 1, 0, 0),
(66, 'ER', 'Eritrea', 1, 1, 0, 0),
(67, 'EE', 'Estonia', 1, 1, 0, 0),
(68, 'ET', 'Ethiopia', 1, 1, 0, 0),
(69, 'FK', 'Falkland Islands (Malvinas)', 1, 1, 0, 0),
(70, 'FO', 'Faroe Islands', 1, 1, 0, 0),
(71, 'FJ', 'Fiji', 1, 1, 0, 0),
(72, 'FI', 'Finland', 1, 1, 0, 0),
(73, 'FR', 'France', 1, 1, 0, 0),
(74, 'FX', 'France, Metropolitan', 1, 1, 0, 0),
(75, 'GF', 'French Guiana', 1, 1, 0, 0),
(76, 'PF', 'French Polynesia', 1, 1, 0, 0),
(77, 'TF', 'French Southern Territories', 1, 1, 0, 0),
(78, 'GA', 'Gabon', 1, 1, 0, 0),
(79, 'GM', 'Gambia', 1, 1, 0, 0),
(80, 'GE', 'Georgia', 1, 1, 0, 0),
(81, 'DE', 'Germany', 1, 1, 0, 0),
(82, 'GH', 'Ghana', 1, 1, 0, 0),
(83, 'GI', 'Gibraltar', 1, 1, 0, 0),
(84, 'GR', 'Greece', 1, 1, 0, 0),
(85, 'GL', 'Greenland', 1, 1, 0, 0),
(86, 'GD', 'Grenada', 1, 1, 0, 0),
(87, 'GP', 'Guadeloupe', 1, 1, 0, 0),
(88, 'GU', 'Guam', 1, 1, 0, 0),
(89, 'GT', 'Guatemala', 1, 1, 0, 0),
(90, 'GN', 'Guinea', 1, 1, 0, 0),
(91, 'GW', 'Guinea-Bissau', 1, 1, 0, 0),
(92, 'GY', 'Guyana', 1, 1, 0, 0),
(93, 'HT', 'Haiti', 1, 1, 0, 0),
(94, 'HM', 'Heard and Mc Donald Islands', 1, 1, 0, 0),
(95, 'HN', 'Honduras', 1, 1, 0, 0),
(96, 'HK', 'Hong Kong', 1, 1, 0, 0),
(97, 'HU', 'Hungary', 1, 1, 0, 0),
(98, 'IS', 'Iceland', 1, 1, 0, 0),
(99, 'IN', 'India', 1, 3, 0, 0),
(100, 'ID', 'Indonesia', 1, 1, 0, 0),
(101, 'IR', 'Iran (Islamic Republic of)', 1, 1, 0, 0),
(102, 'IQ', 'Iraq', 1, 1, 0, 0),
(103, 'IE', 'Ireland', 1, 1, 0, 0),
(104, 'IL', 'Israel', 1, 1, 0, 0),
(105, 'IT', 'Italy', 1, 1, 0, 0),
(106, 'CI', 'Ivory Coast', 1, 1, 0, 0),
(107, 'JM', 'Jamaica', 1, 1, 0, 0),
(108, 'JP', 'Japan', 1, 1, 0, 0),
(109, 'JO', 'Jordan', 1, 1, 0, 0),
(110, 'KZ', 'Kazakhstan', 1, 1, 0, 0),
(111, 'KE', 'Kenya', 1, 1, 0, 0),
(112, 'KI', 'Kiribati', 1, 1, 0, 0),
(113, 'KP', 'Korea, Democratic People\'s Republic of', 1, 1, 0, 0),
(114, 'KR', 'Korea, Republic of', 1, 1, 0, 0),
(115, 'XK', 'Kosovo', 1, 1, 0, 0),
(116, 'KW', 'Kuwait', 1, 1, 0, 0),
(117, 'KG', 'Kyrgyzstan', 1, 1, 0, 0),
(118, 'LA', 'Lao People\'s Democratic Republic', 1, 1, 0, 0),
(119, 'LV', 'Latvia', 1, 1, 0, 0),
(120, 'LB', 'Lebanon', 1, 1, 0, 0),
(121, 'LS', 'Lesotho', 1, 1, 0, 0),
(122, 'LR', 'Liberia', 1, 1, 0, 0),
(123, 'LY', 'Libyan Arab Jamahiriya', 1, 1, 0, 0),
(124, 'LI', 'Liechtenstein', 1, 1, 0, 0),
(125, 'LT', 'Lithuania', 1, 1, 0, 0),
(126, 'LU', 'Luxembourg', 1, 1, 0, 0),
(127, 'MO', 'Macau', 1, 1, 0, 0),
(128, 'MK', 'Macedonia', 1, 1, 0, 0),
(129, 'MG', 'Madagascar', 1, 1, 0, 0),
(130, 'MW', 'Malawi', 1, 1, 0, 0),
(131, 'MY', 'Malaysia', 1, 1, 0, 0),
(132, 'MV', 'Maldives', 1, 1, 0, 0),
(133, 'ML', 'Mali', 1, 1, 0, 0),
(134, 'MT', 'Malta', 1, 1, 0, 0),
(135, 'MH', 'Marshall Islands', 1, 1, 0, 0),
(136, 'MQ', 'Martinique', 1, 1, 0, 0),
(137, 'MR', 'Mauritania', 1, 1, 0, 0),
(138, 'MU', 'Mauritius', 1, 1, 0, 0),
(139, 'TY', 'Mayotte', 1, 1, 0, 0),
(140, 'MX', 'Mexico', 1, 1, 0, 0),
(141, 'FM', 'Micronesia, Federated States of', 1, 1, 0, 0),
(142, 'MD', 'Moldova, Republic of', 1, 1, 0, 0),
(143, 'MC', 'Monaco', 1, 1, 0, 0),
(144, 'MN', 'Mongolia', 1, 1, 0, 0),
(145, 'ME', 'Montenegro', 1, 1, 0, 0),
(146, 'MS', 'Montserrat', 1, 1, 0, 0),
(147, 'MA', 'Morocco', 1, 1, 0, 0),
(148, 'MZ', 'Mozambique', 1, 1, 0, 0),
(149, 'MM', 'Myanmar', 1, 1, 0, 0),
(150, 'NA', 'Namibia', 1, 1, 0, 0),
(151, 'NR', 'Nauru', 1, 1, 0, 0),
(152, 'NP', 'Nepal', 1, 1, 0, 0),
(153, 'NL', 'Netherlands', 1, 1, 0, 0),
(154, 'AN', 'Netherlands Antilles', 1, 1, 0, 0),
(155, 'NC', 'New Caledonia', 1, 1, 0, 0),
(156, 'NZ', 'New Zealand', 1, 1, 0, 0),
(157, 'NI', 'Nicaragua', 1, 1, 0, 0),
(158, 'NE', 'Niger', 1, 1, 0, 0),
(159, 'NG', 'Nigeria', 1, 1, 0, 0),
(160, 'NU', 'Niue', 1, 1, 0, 0),
(161, 'NF', 'Norfork Island', 1, 1, 0, 0),
(162, 'MP', 'Northern Mariana Islands', 1, 1, 0, 0),
(163, 'NO', 'Norway', 1, 1, 0, 0),
(164, 'OM', 'Oman', 1, 1, 0, 0),
(165, 'PK', 'Pakistan', 1, 1, 0, 0),
(166, 'PW', 'Palau', 1, 1, 0, 0),
(167, 'PA', 'Panama', 1, 1, 0, 0),
(168, 'PG', 'Papua New Guinea', 1, 1, 0, 0),
(169, 'PY', 'Paraguay', 1, 1, 0, 0),
(170, 'PE', 'Peru', 1, 1, 0, 0),
(171, 'PH', 'Philippines', 1, 1, 0, 0),
(172, 'PN', 'Pitcairn', 1, 1, 0, 0),
(173, 'PL', 'Poland', 1, 1, 0, 0),
(174, 'PT', 'Portugal', 1, 1, 0, 0),
(175, 'PR', 'Puerto Rico', 1, 1, 0, 0),
(176, 'QA', 'Qatar', 1, 1, 0, 0),
(177, 'RE', 'Reunion', 1, 1, 0, 0),
(178, 'RO', 'Romania', 1, 1, 0, 0),
(179, 'RU', 'Russian Federation', 1, 1, 0, 0),
(180, 'RW', 'Rwanda', 1, 1, 0, 0),
(181, 'KN', 'Saint Kitts and Nevis', 1, 1, 0, 0),
(182, 'LC', 'Saint Lucia', 1, 1, 0, 0),
(183, 'VC', 'Saint Vincent and the Grenadines', 1, 1, 0, 0),
(184, 'WS', 'Samoa', 1, 1, 0, 0),
(185, 'SM', 'San Marino', 1, 1, 0, 0),
(186, 'ST', 'Sao Tome and Principe', 1, 1, 0, 0),
(187, 'SA', 'Saudi Arabia', 1, 1, 0, 0),
(188, 'SN', 'Senegal', 1, 1, 0, 0),
(189, 'RS', 'Serbia', 1, 1, 0, 0),
(190, 'SC', 'Seychelles', 1, 1, 0, 0),
(191, 'SL', 'Sierra Leone', 1, 1, 0, 0),
(192, 'SG', 'Singapore', 1, 1, 0, 0),
(193, 'SK', 'Slovakia', 1, 1, 0, 0),
(194, 'SI', 'Slovenia', 1, 1, 0, 0),
(195, 'SB', 'Solomon Islands', 1, 1, 0, 0),
(196, 'SO', 'Somalia', 1, 1, 0, 0),
(197, 'ZA', 'South Africa', 1, 1, 0, 0),
(198, 'GS', 'South Georgia South Sandwich Islands', 1, 1, 0, 0),
(199, 'ES', 'Spain', 1, 1, 0, 0),
(200, 'LK', 'Sri Lanka', 1, 1, 0, 0),
(201, 'SH', 'St. Helena', 1, 1, 0, 0),
(202, 'PM', 'St. Pierre and Miquelon', 1, 1, 0, 0),
(203, 'SD', 'Sudan', 1, 1, 0, 0),
(204, 'SR', 'Suriname', 1, 1, 0, 0),
(205, 'SJ', 'Svalbarn and Jan Mayen Islands', 1, 1, 0, 0),
(206, 'SZ', 'Swaziland', 1, 1, 0, 0),
(207, 'SE', 'Sweden', 1, 1, 0, 0),
(208, 'CH', 'Switzerland', 1, 1, 0, 0),
(209, 'SY', 'Syrian Arab Republic', 1, 1, 0, 0),
(210, 'TW', 'Taiwan', 1, 1, 0, 0),
(211, 'TJ', 'Tajikistan', 1, 1, 0, 0),
(212, 'TZ', 'Tanzania, United Republic of', 1, 1, 0, 0),
(213, 'TH', 'Thailand', 1, 1, 0, 0),
(214, 'TG', 'Togo', 1, 1, 0, 0),
(215, 'TK', 'Tokelau', 1, 1, 0, 0),
(216, 'TO', 'Tonga', 1, 1, 0, 0),
(217, 'TT', 'Trinidad and Tobago', 1, 1, 0, 0),
(218, 'TN', 'Tunisia', 1, 1, 0, 0),
(219, 'TR', 'Turkey', 1, 1, 0, 0),
(220, 'TM', 'Turkmenistan', 1, 1, 0, 0),
(221, 'TC', 'Turks and Caicos Islands', 1, 1, 0, 0),
(222, 'TV', 'Tuvalu', 1, 1, 0, 0),
(223, 'UG', 'Uganda', 1, 1, 0, 0),
(224, 'UA', 'Ukraine', 1, 1, 0, 0),
(225, 'AE', 'United Arab Emirates', 1, 1, 0, 0),
(226, 'GB', 'United Kingdom', 1, 1, 0, 0),
(227, 'UM', 'United States minor outlying islands', 1, 1, 0, 0),
(228, 'UY', 'Uruguay', 1, 1, 0, 0),
(229, 'UZ', 'Uzbekistan', 1, 1, 0, 0),
(230, 'VU', 'Vanuatu', 1, 1, 0, 0),
(231, 'VA', 'Vatican City State', 1, 1, 0, 0),
(232, 'VE', 'Venezuela', 1, 1, 0, 0),
(233, 'VN', 'Vietnam', 1, 1, 0, 0),
(234, 'VG', 'Virgin Islands (British)', 1, 1, 0, 0),
(235, 'VI', 'Virgin Islands (U.S.)', 1, 1, 0, 0),
(236, 'WF', 'Wallis and Futuna Islands', 1, 1, 0, 0),
(237, 'EH', 'Western Sahara', 1, 1, 0, 0),
(238, 'YE', 'Yemen', 1, 1, 0, 0),
(239, 'YU', 'Yugoslavia', 1, 1, 0, 0),
(240, 'ZR', 'Zaire', 1, 1, 0, 0),
(241, 'ZM', 'Zambia', 1, 1, 0, 0),
(242, 'ZW', 'Zimbabwe', 1, 1, 0, 0);

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
