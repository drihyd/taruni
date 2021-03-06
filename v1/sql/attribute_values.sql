-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 27, 2021 at 01:05 AM
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
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `attr_value` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attr_id`, `attr_value`) VALUES
(1, 1, 'cotton'),
(2, 1, 'printed cotton'),
(3, 1, 'net'),
(4, 1, 'printed net'),
(5, 1, 'chanderi cotton'),
(6, 2, 'black'),
(7, 2, 'white'),
(8, 2, 'off-white'),
(9, 2, 'beige'),
(10, 2, 'chikoo color'),
(11, 2, 'mint green'),
(12, 2, 'bottle green'),
(13, 2, 'parrot green'),
(14, 2, 'neon green'),
(15, 2, 'light yellow'),
(16, 2, 'mustard'),
(17, 2, 'yellow'),
(18, 2, 'blood red'),
(19, 2, 'maroon'),
(20, 2, 'red'),
(21, 2, 'sky blue'),
(22, 2, 'navy blue'),
(23, 2, 'ink blue'),
(24, 2, 'rama blue'),
(25, 2, 'lavender purple'),
(26, 2, 'deep purple'),
(27, 2, 'baby pink'),
(28, 2, 'pink'),
(29, 2, 'gajery pink'),
(30, 2, 'peach'),
(31, 2, 'metal grey'),
(32, 2, 'light grey'),
(33, 2, 'orange'),
(34, 3, 'anarkali'),
(35, 3, 'straight cut salwar'),
(36, 3, 'uneven cut'),
(37, 3, 'drapes'),
(38, 3, 'tail cut'),
(39, 3, 'kotti style'),
(40, 3, 'lachcha'),
(41, 3, 'gowns (evening wear)'),
(42, 3, 'half saree'),
(43, 3, 'ghagra'),
(44, 4, 'bust/neckline work'),
(45, 4, 'daaman work'),
(46, 4, 'stone work'),
(47, 4, 'hand embroidery'),
(48, 4, 'handwork'),
(49, 4, 'aari work'),
(50, 4, 'zardozi work'),
(51, 4, 'sequence'),
(52, 4, 'mirror work'),
(53, 4, 'badla work'),
(54, 4, 'lace'),
(55, 4, 'swarovski stones'),
(56, 4, 'chicken work'),
(57, 4, 'zari'),
(58, 5, 'patiala'),
(59, 5, 'dhoti style'),
(60, 5, 'palazzo/sharara'),
(61, 5, 'pencil pants'),
(62, 5, 'leggings'),
(63, 5, 'chudidar'),
(64, 5, 'cotton'),
(65, 5, 'printed cotton'),
(66, 5, 'net'),
(67, 5, 'printed net'),
(68, 5, 'chanderi cotton'),
(71, 5, 'kotta'),
(74, 5, 'chiffon'),
(75, 5, 'jaquard'),
(76, 5, 'brasso'),
(77, 5, 'velvet'),
(97, 6, 'single border'),
(98, 6, 'double side border'),
(99, 6, 'all side border'),
(100, 6, 'double dyed border'),
(101, 6, 'dual tone border'),
(102, 6, 'heavy dupatta'),
(103, 6, 'cotton'),
(104, 6, 'printed cotton'),
(105, 6, 'net'),
(106, 6, 'printed net'),
(107, 6, 'chanderi cotton'),
(110, 6, 'kotta'),
(112, 6, 'chiffon'),
(113, 6, 'jaquard'),
(114, 6, 'velvet'),
(115, 7, 'no sleeve'),
(116, 7, 'half sleeve'),
(117, 7, 'three-fourths'),
(118, 8, 'no zip'),
(119, 8, 'back zip'),
(120, 8, 'side zip'),
(121, 1, 'testing'),
(122, 8, 'front-zip'),
(124, 2, 'Purple'),
(125, 5, 'Chudi'),
(126, 9, 'Long Sleeves'),
(127, 2, 'Cream'),
(128, 9, 'Short Sleeves'),
(129, 2, 'Green'),
(130, 5, 'Leggin'),
(131, 2, 'Blue'),
(132, 9, 'Short & Long Sleeves'),
(133, 8, 'Back'),
(134, 2, 'Royal Blue'),
(135, 2, 'Green&Orange'),
(136, 5, 'Black Contrast Chudidar'),
(137, 6, 'Self Red Dupatta'),
(138, 5, 'Black self Chudidar'),
(139, 6, 'Pink Contrast Dupatta'),
(140, 5, ' Brown Self Chudidar'),
(141, 6, 'Rama Blue Contrast Dupatta'),
(142, 5, 'Yellow Contrast Chudidar'),
(143, 6, 'Yellow dupatta'),
(144, 5, 'Blue Self Chudidar'),
(145, 5, 'Navy Blue Chudidar'),
(146, 6, 'Self Shaded Dupatta'),
(147, 5, ' Peach self Chudidar'),
(148, 6, 'Pink and peach shaded dupatta'),
(149, 5, 'Green self Chudidar'),
(150, 6, 'Contrast maroon Dupatta'),
(151, 5, 'Black Chudidar'),
(152, 6, 'Maroon contrast Dupatta'),
(153, 8, 'side-zip'),
(154, 8, 'back-zip'),
(155, 8, 'no-zip'),
(156, 4, 'None'),
(157, 2, 'Black and Pink'),
(158, 2, 'Brown '),
(159, 2, 'White and Lemon Yellow '),
(160, 2, 'Navy Blue and Pink '),
(161, 2, 'Peach and Pink'),
(162, 2, 'Mehendi Green'),
(163, 2, 'Black and Red'),
(164, 2, 'Green and Rama Blue '),
(165, 7, 'short and  long'),
(166, 5, 'Legging'),
(167, 7, 'short'),
(168, 7, 'Long/Short'),
(169, 10, 'single border'),
(170, 1, 'chanderi'),
(171, 1, 'chiken'),
(172, 2, 'pink and blue'),
(173, 2, 'mustard yellow'),
(174, 1, 'satin'),
(175, 2, 'grey'),
(176, 2, 'rama green'),
(177, 2, 'Rama '),
(178, 3, 'Bottoms'),
(179, 2, 'Rust '),
(180, 2, 'Grape'),
(181, 2, 'Dark Blue'),
(182, 2, 'sea green'),
(183, 2, 'liril'),
(184, 2, 'pink and orange'),
(185, 2, 'pista'),
(186, 2, 'white and pink'),
(187, 2, 'red and black'),
(188, 2, 'white and pista'),
(189, 1, 'lycra'),
(190, 2, 'rama and brown'),
(191, 2, 'multicolor'),
(192, 2, 'neon'),
(193, 2, 'black and white'),
(194, 6, 'Four sides border self'),
(195, 7, 'Long and Short'),
(196, 2, 'pista green'),
(197, 6, 'Heavy Four sides border contrast'),
(198, 1, 'shimmer georgette'),
(199, 2, 'gold'),
(200, 6, 'Four sides border contrast'),
(201, 6, 'Shaded Four sides contrast chiffon'),
(202, 7, 'Cap Sleeves'),
(203, 3, 'semi kalli'),
(204, 2, 'red and pink'),
(205, 3, 'kalli'),
(206, 2, 'light blue'),
(207, 7, 'short and long'),
(208, 2, 'Neon Pink'),
(209, 7, 'Short only'),
(210, 2, 'Peachish Pink'),
(211, 2, 'Redish Pink'),
(212, 2, 'greyish brown'),
(213, 2, 'black and cream'),
(214, 2, 'White & Black'),
(215, 2, 'White & Black with Orange'),
(216, 3, 'Straight Cut'),
(217, 3, 'Semi-Kalli'),
(218, 2, 'Red and Orange'),
(219, 2, 'Olive Green'),
(220, 2, 'Maroon Black'),
(221, 2, 'Pink/Black'),
(222, 2, 'Tomato Red'),
(223, 7, '3/4th sleeves'),
(224, 7, 'Long'),
(225, 2, 'Orange/Pink'),
(226, 2, 'Tomao Red'),
(227, 9, 'Long & Short'),
(228, 8, 'Backzip'),
(229, 2, 'Maroon/Brown'),
(230, 9, 'Three/4'),
(231, 1, 'Linen'),
(232, 2, 'White with pink and Blue'),
(233, 2, 'Pink with Neck work'),
(234, 1, 'Linin'),
(235, 2, 'Pink with off white Neck work'),
(236, 2, 'Grey & Orange'),
(237, 2, 'Green Printed'),
(238, 2, 'Red & Gold'),
(239, 2, 'White & Green'),
(240, 2, 'Purple Printed'),
(241, 2, 'Pink Printed'),
(242, 2, 'Green with Indigo'),
(243, 2, 'Blue Printed'),
(244, 2, 'Pink & Black'),
(245, 1, 'Lenin Crape'),
(246, 5, 'No bottom'),
(247, 7, 'Green & Blue'),
(248, 11, 'Printed'),
(249, 7, 'Green & Pink'),
(250, 7, 'Beige & Black'),
(251, 2, 'Side Zip & Back Zip'),
(252, 1, 'Silk Cotton'),
(253, 9, '3/4 Length'),
(254, 1, 'Cotton Chanderi'),
(255, 3, 'Straight'),
(256, 2, 'Blue & Green'),
(257, 2, 'Chikoo'),
(258, 2, 'Rama Black, White'),
(259, 9, '3/4th'),
(260, 2, 'Black & white'),
(261, 2, 'Black & yellow'),
(262, 2, 'Black & Gajeri'),
(263, 2, 'Gajeri'),
(264, 2, 'Wine'),
(265, 1, 'Lenin Cotton'),
(266, 1, 'Jacquard Cotton'),
(267, 3, 'Multi Colour'),
(268, 3, 'Blue, Green'),
(269, 1, 'Jute'),
(270, 3, 'Beige & Blue'),
(271, 1, 'Crape'),
(272, 2, 'White, Blue'),
(273, 6, 'Orange & Pink Kotta'),
(274, 2, 'Handloom Cotton'),
(275, 6, 'White & Black chiffon'),
(276, 6, 'Beige Threadwork Chiffon'),
(277, 6, 'Black Chiffon Dupatta Border'),
(278, 6, 'White printed Chiffon Pink Border'),
(279, 2, 'Soft Cotton'),
(280, 6, 'Pink Threadwork Chiffon'),
(281, 6, 'Red Heavy threadwork Chiffon'),
(282, 6, 'Self Tie-Dye Chiffon'),
(283, 6, 'Green Printed Chiffon'),
(284, 6, 'Red heavy Chiffon'),
(285, 3, 'Tomato red net Dupatta'),
(286, 3, 'Black Net Dupatta'),
(287, 3, 'Contrast Pink Georgette Dupatta'),
(288, 3, 'Yellow Net Dupatta'),
(289, 3, 'Cream Contrast Net Dupatta'),
(290, 2, 'Orange, Cream'),
(291, 3, 'Orange Georgette Dupatta'),
(292, 2, 'White, Yellow'),
(293, 3, 'Yellow Georgette Dupatta'),
(294, 3, 'Peach Net Dupatta'),
(295, 2, 'Grey, Blue'),
(296, 6, 'Dark Grey Net Dupatta'),
(297, 2, 'White, Pink'),
(298, 6, 'No Dupatta'),
(299, 8, 'Side & Back Zip'),
(301, 2, 'Silver Printed'),
(302, 6, 'Off White Heavy Dupatta'),
(303, 7, 'No Sleeves'),
(304, 8, 'Front Hooks'),
(306, 2, 'Light Green'),
(307, 1, 'Jute Cotton'),
(308, 2, 'Cream with Red & Black Print'),
(309, 2, 'Gajri'),
(310, 1, 'Cotton Jackard'),
(311, 2, 'Multi Colour Floral Print'),
(312, 2, 'Beige with Hand Work'),
(313, 2, 'Black with Marron piping'),
(314, 9, '3/4 th'),
(315, 2, 'Brown, Green'),
(316, 2, 'Pink, Cream'),
(317, 2, 'red & white'),
(318, 2, 'green pink'),
(319, 2, 'Red White'),
(320, 2, 'Light Orange'),
(321, 2, 'Pink Green'),
(322, 2, 'Black White'),
(323, 2, 'Ornge'),
(324, 2, 'Parriot Green'),
(325, 2, 'Blackred'),
(326, 2, 'Candy Apple Red'),
(327, 1, 'Smoot Cotton'),
(328, 2, 'Choclate'),
(329, 2, 'Red Green'),
(330, 2, 'PinkMaroon'),
(331, 2, 'Blue Green'),
(332, 2, 'Blue Grape'),
(333, 2, 'Mahendi Green'),
(334, 2, 'White n Yellow'),
(335, 2, 'White and Green'),
(336, 2, 'Black n Maroon'),
(337, 1, 'Netted'),
(338, 2, 'Musterd Yellow'),
(339, 1, 'Smooth Cotton'),
(340, 2, 'Brinjal'),
(341, 2, 'Red n Yellow'),
(342, 2, 'Multi color'),
(343, 2, 'Yellow n Black'),
(344, 2, 'Dark Cream'),
(345, 2, 'Light Pink'),
(346, 2, 'Light Cream'),
(347, 1, 'chanderii'),
(348, 2, 'Black with maroon piping'),
(349, 2, 'Chocolate'),
(350, 2, 'Pink maroon'),
(351, 1, 'Cotton Silk'),
(352, 2, 'Ceam '),
(353, 2, 'Dark Pink'),
(354, 2, 'Beige with Maroon '),
(355, 2, 'Blue with Patch Work'),
(356, 2, 'Gray'),
(357, 2, 'Gray and Green'),
(358, 2, 'White and peach'),
(359, 2, 'Blue and Red'),
(360, 2, 'Peach and Cream'),
(361, 2, 'Cream and Gold'),
(362, 2, 'White and Silver'),
(363, 2, 'Blue and Green'),
(364, 2, 'Black and Maroon'),
(365, 2, 'Cream with green'),
(366, 2, 'Cream with Yellow'),
(367, 2, 'Cream with red'),
(368, 2, 'Violet'),
(369, 2, 'Light Multi color'),
(370, 7, '3/4 th Sleeves'),
(371, 2, 'Black and Peach'),
(372, 2, 'Ligjht Pink'),
(373, 2, 'Mehendi'),
(374, 2, 'Cream with Blue'),
(375, 2, 'Balck with blue'),
(376, 2, 'Peach with gold'),
(377, 2, 'Dark Green'),
(378, 2, 'Dark peach'),
(379, 2, 'Red with print'),
(380, 2, 'Dark Rama green'),
(381, 2, 'Blue with cream'),
(382, 2, 'cream with print'),
(383, 2, 'Peach with blue'),
(384, 2, 'Paarot green '),
(385, 2, 'Cream with marron '),
(386, 2, 'Cream with light blue '),
(387, 2, 'Darkblue '),
(388, 2, 'Lemon Yellw'),
(389, 2, 'Light Mehendi '),
(390, 2, 'Beige with Light Blue'),
(391, 2, 'Black Printed'),
(392, 1, 'Lenin'),
(393, 2, 'Orange Printed'),
(394, 2, 'Cream with Black'),
(395, 2, 'White and Yellow'),
(396, 2, 'green and Blue'),
(397, 2, 'Light marron'),
(398, 2, 'Lemon Yellow'),
(399, 2, 'White with Green '),
(400, 2, 'Dark Orange'),
(401, 2, 'Light Red'),
(402, 2, 'Aash '),
(403, 1, 'Georgeete'),
(404, 2, 'Royal'),
(405, 2, 'Cream & Blue'),
(406, 2, 'RedOrange'),
(407, 2, 'Light Blue Green'),
(408, 2, 'Ice Blue'),
(409, 2, 'Peach & Cream'),
(410, 2, 'Cream & RedOrange'),
(411, 2, 'Aqua Blue'),
(412, 2, 'Ultramarine'),
(413, 2, 'Turquoise'),
(414, 2, 'Orange with Pink'),
(415, 2, 'Foan'),
(416, 2, 'Light Peach'),
(417, 2, 'Dark Purple'),
(418, 2, 'White with Peach'),
(419, 2, 'Grey Shibori'),
(420, 2, 'Rin Blue'),
(421, 2, 'Fawn'),
(422, 2, 'Fawn Resham'),
(423, 2, 'parriot green with Blue'),
(424, 2, 'Fawn with Rama Blue'),
(425, 2, 'Pink With Peach'),
(426, 2, 'Rose Pink'),
(427, 2, 'Bottile green'),
(428, 2, 'Red with Orange'),
(429, 5, 'Salwar'),
(430, 2, 'Blue with Brown'),
(431, 2, 'Parrot with Peach'),
(432, 2, 'White With Black'),
(433, 2, 'Liril Grren'),
(434, 2, 'Light Aqua'),
(435, 2, 'Pale Green'),
(436, 1, 'Net & Georgette'),
(437, 2, 'Mist Green'),
(438, 1, 'Satten Crape'),
(439, 2, 'Tomato red with Cream'),
(440, 2, 'Bisque'),
(441, 2, 'Aquamarine'),
(442, 2, 'Olive'),
(443, 2, 'Yellow with Multi color Printed'),
(444, 5, 'Plazo pant'),
(445, 2, 'Mustered Yellow'),
(446, 2, 'Light Beige'),
(447, 2, 'Light Rama Grren'),
(448, 2, 'Beige and Blue'),
(449, 2, 'Beige with rama Green'),
(450, 2, 'Peach with beige'),
(451, 2, 'Navy Blue with orange'),
(452, 2, 'White and Gray'),
(453, 2, 'Navy blue and Sky blue'),
(454, 2, 'Aqua marine'),
(455, 1, 'Riyan Cotton'),
(456, 2, 'Peach and White'),
(457, 2, 'Brown and Beige'),
(458, 2, 'Green and Red'),
(459, 2, 'Desert Blue'),
(460, 2, 'Black and Banana yellow'),
(461, 2, 'Cream and Choclate'),
(462, 2, 'Red with Blue'),
(463, 2, 'Black Cheetha'),
(464, 2, 'Peach and Black'),
(465, 2, 'RedOrange Printed'),
(466, 2, 'Dark Red'),
(467, 2, 'Black and Ash'),
(468, 2, 'Deep Navy Blue'),
(469, 2, 'Aqua'),
(470, 2, 'Navy Blue Printed'),
(471, 2, 'Ruby'),
(472, 2, 'Cyan'),
(473, 1, 'Rayon Cotton'),
(474, 1, 'Rayon'),
(475, 2, 'Navy Blue with White'),
(476, 2, 'Black with Beige'),
(477, 2, 'Sandybrown'),
(478, 2, 'White with Blue'),
(479, 2, 'Yellow with Brown'),
(480, 1, 'linen Cotton'),
(481, 2, 'Yellow with Red'),
(482, 2, 'Mint Blue'),
(483, 2, 'Crimson Red'),
(484, 2, 'Rani Pink'),
(485, 2, 'Light Brown'),
(486, 2, 'Cream and Black'),
(487, 2, 'Green with Multicolor'),
(488, 2, 'Orange with Red'),
(489, 2, 'Cream with Printed'),
(490, 2, 'Wihite with Green'),
(491, 2, 'Cream with Gold'),
(492, 5, 'Narrow Pant'),
(493, 2, 'mahendi '),
(494, 2, 'Marron and Beige'),
(495, 1, 'Banaras Viving'),
(496, 2, 'Cream with BabyPink'),
(497, 2, 'Blue with Parrot green'),
(498, 2, 'Cream with GreenYellow'),
(499, 2, 'Cream with Lightgreen'),
(500, 2, 'Seagreen'),
(501, 2, 'DeepPink'),
(502, 2, 'Cream and Beige'),
(503, 2, 'Ornage and Multicolor'),
(504, 2, 'White and Blue'),
(505, 2, 'White and Multicolor'),
(506, 2, 'White and Navy Blue'),
(507, 2, 'DustyRose'),
(508, 2, 'NavyBlue and White'),
(509, 2, 'Black and beige '),
(510, 2, 'Cream With Orange'),
(511, 2, 'Choclate Brown'),
(512, 2, 'Black and Blue'),
(513, 2, 'Black and Mustard Yellow'),
(514, 2, 'White and Black'),
(515, 2, 'Blue and Black'),
(516, 2, 'Green with Navy Blue'),
(517, 2, 'Gajri Printed'),
(518, 2, 'Sea Blue'),
(519, 2, 'Pink and Ash'),
(520, 2, 'Black Digital Print'),
(521, 2, 'Satin Pink'),
(522, 2, 'Mirchi  Red'),
(523, 1, 'Silk Taffeta'),
(524, 2, 'Gajri Pink'),
(525, 2, 'Gajri with Brown'),
(526, 2, 'RedViolet'),
(527, 1, 'Satin Crepe'),
(528, 2, 'Spring Green'),
(529, 1, 'Printed Satin'),
(530, 2, 'Beige Printed'),
(531, 2, 'Old Rose'),
(532, 2, 'Pink and Yellow'),
(533, 2, 'Beige and Green'),
(534, 2, 'Yellow Green'),
(535, 2, 'Mango Yellow'),
(536, 8, 'Back & Side Zip'),
(537, 2, 'PaleGreen'),
(538, 2, 'Cream and Green'),
(539, 2, 'Cream and Red'),
(540, 2, 'Peach and Beige'),
(541, 2, 'RamaGreen'),
(542, 1, 'RawSilk'),
(543, 2, 'White and Skyblue'),
(544, 2, 'White and Orange'),
(545, 2, 'Grape and Navy Blue'),
(546, 1, 'georgette'),
(547, 1, 'raw silk'),
(548, 2, 'Mirchi Red'),
(549, 1, 'khadi'),
(550, 2, 'Half White'),
(551, 1, 'Zoot'),
(552, 2, 'Indigo Blue'),
(553, 5, 'Plazo'),
(554, 5, 'Shibori Plazo'),
(555, 1, 'Viving Zoot'),
(556, 2, 'Blue Floral'),
(557, 2, 'Tomoto red'),
(558, 2, 'Gajari with Blue'),
(559, 1, 'Silk'),
(560, 1, 'taffeta Silk'),
(561, 2, 'Magenta Pink'),
(562, 2, 'Gray with Peach'),
(563, 2, 'Dull Maroon'),
(564, 2, 'Gajari'),
(565, 2, 'Beige and Black'),
(566, 1, 'Net & Cotton'),
(567, 2, 'Ink Light blue '),
(568, 2, 'Pale Denim Blue'),
(569, 2, 'Beige and Rust '),
(570, 2, 'Yeloow with Green '),
(571, 2, 'Beige and Royal Blue'),
(572, 2, 'Orange and Maroon '),
(573, 2, 'Light Beige and Black '),
(574, 2, 'Cream Printed Brown '),
(575, 2, 'Green and Pink '),
(576, 2, 'Gajari and Black '),
(577, 2, 'Pink and Beige '),
(578, 2, 'Blue and Gold '),
(579, 2, 'Rust and Green '),
(580, 2, 'Blue and Pink '),
(581, 2, 'Pink and green '),
(582, 2, 'Black with Gajri'),
(583, 2, 'Black with Gray Print'),
(584, 2, 'Light Purple'),
(585, 2, 'Light Rust'),
(586, 2, 'Cream with Chocalate'),
(587, 2, 'Yellow with Orange'),
(588, 2, 'Black with white'),
(589, 2, 'Gray with White'),
(590, 2, 'Half white with Brown'),
(591, 2, 'Cream with Parrot Green'),
(592, 2, 'Navy blue with Print'),
(593, 2, 'Half white with Gray Print'),
(594, 2, 'Red with Beige'),
(595, 2, 'Beige with red'),
(596, 2, 'Mustard Yellow With blue'),
(597, 2, 'Half white With Black'),
(598, 2, 'Maroon with Gold'),
(599, 1, 'Cota'),
(600, 2, 'Pista Green with Rani Pink '),
(601, 2, 'Brown with Beige'),
(602, 2, 'Beige Printed Rama Green'),
(603, 2, 'Beige and Green Printed'),
(604, 2, 'Beige and Maroon'),
(605, 2, 'Orange and Green Printed'),
(606, 2, 'Shibori'),
(607, 1, 'Dupion Silk'),
(608, 1, 'Kota Cotton'),
(609, 2, 'Chico with Black'),
(610, 2, 'Gajri with Green'),
(611, 1, 'Chanderi Silk'),
(612, 2, 'Navy Blue with Red Embroidery'),
(613, 2, 'half white With Gajri'),
(614, 2, 'Chico with Bottle Green'),
(615, 2, 'Blue with Mustard Embroidery'),
(616, 2, 'Rama Green With Red'),
(617, 2, 'Navy Blue Silver Work'),
(618, 2, 'Blue with Gray'),
(619, 2, 'Gray with Black '),
(620, 5, 'Trouser Pant'),
(621, 7, 'short & Long'),
(622, 1, 'Paper Silk'),
(623, 2, 'Peacock with Wine '),
(624, 2, 'Navy blue with Rama Green'),
(625, 2, 'Maroon and Gold '),
(626, 2, 'Blue with Red'),
(627, 2, 'White & Black with blue '),
(628, 2, 'Indigo Blue with Pink'),
(629, 2, 'Navy blue with Red '),
(630, 2, 'White with Multi Print'),
(631, 2, 'White with Maroon '),
(632, 1, 'Peach with Multi color'),
(633, 2, 'Chocolate brown '),
(634, 2, 'Light Peach with Multi color'),
(635, 2, 'Dark Peach with Multi color'),
(636, 2, 'Biscuit with Wine'),
(637, 2, 'Seablue with Pink'),
(638, 2, 'Cream with Pista'),
(639, 2, 'Pink with Multicolor Embroidery'),
(640, 2, 'Multi Black'),
(641, 2, 'Double tone Orange'),
(642, 2, 'Double tone Purple');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_attr_id` (`attr_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=643;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_ibfk_1` FOREIGN KEY (`attr_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
