-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2015 at 03:03 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pc_way`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `answer` varchar(100) DEFAULT NULL,
  `determine` varchar(15) NOT NULL,
  `q_id` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `determine`, `q_id`) VALUES
(1, 'Maximum Graphics And Maximum Performance ', 'high', 1),
(2, 'Mix Between Good Graphics And Performance', 'medium', 1),
(3, 'Just Performance And Any Visual Quality', 'low', 1),
(4, 'AMD', 'Amd', 2),
(5, 'Intel', 'intel', 2),
(7, 'Low Price', 'p_2', 3),
(8, 'I Donot Care Just Get Me The Most Powerful Components', 'p_1', 3),
(9, 'Max perfomance Level', 'high', 4),
(10, 'Adjusted Performance Level', 'medium', 4),
(11, 'Accepted Perfomance Level', 'low', 4),
(12, 'AMD', 'Amd', 5),
(13, 'Intel', 'intel', 5),
(14, 'Low Price', 'p_2', 6),
(15, 'I Donot Care Just Get Me The Most Powerful Components', 'p_1', 6),
(16, 'Max perfomance Level', 'high', 10),
(17, 'Adjusted Performance Level', 'medium', 10),
(18, 'Accepted Perfomance Level', 'low', 10),
(19, 'AMD', 'AMD', 11),
(20, 'Intel', 'intel', 11),
(21, 'Low Price', 'p_2', 12),
(22, 'I Donot Care Just Get Me The Most Powerful Components', 'p_1', 12),
(23, 'Maximum Graphics And Maximum Performance ', 'high', 13),
(24, 'Mix Between Good Graphics And Performance', 'medium', 13),
(25, 'Just Performance And Any Visual Quality', 'low', 13),
(26, 'AMD', 'AMD', 14),
(27, 'Intel', 'intel', 14),
(28, 'Low Price', 'p_2', 15),
(29, 'I Donot Care Just Get Me The Most Powerful Components', 'p_1', 15);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'GRAPHIC PROCESSING UNITS'),
(2, ' RANDOM ACCESS MEMORY'),
(3, 'CENTRAL PROCCESING UNITS'),
(4, 'POWER SUPPLY UNITS'),
(5, 'MOTHER - BOARDS'),
(6, 'MONITROS'),
(7, 'HARD DRIVES'),
(8, 'CASES');

-- --------------------------------------------------------

--
-- Table structure for table `customization_details`
--

CREATE TABLE IF NOT EXISTS `customization_details` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `part_id` int(15) DEFAULT NULL,
  `quantity` int(15) DEFAULT NULL,
  `u_c_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE IF NOT EXISTS `dealers` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) DEFAULT NULL,
  `password` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `user_name`, `password`) VALUES
(1, 'maximum_hardware', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(2, 'Compu_fast', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(3, 'High_end', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(4, 'badr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(6, 'it_house', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `dealers_profile`
--

CREATE TABLE IF NOT EXISTS `dealers_profile` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `logo` varchar(90) NOT NULL,
  `address` varchar(180) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `land_line` varchar(80) DEFAULT NULL,
  `time` varchar(90) NOT NULL,
  `about` text NOT NULL,
  `dealers_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `dealers_profile`
--

INSERT INTO `dealers_profile` (`id`, `name`, `email`, `logo`, `address`, `mobile`, `land_line`, `time`, `about`, `dealers_id`) VALUES
(1, 'maximum hadrwar', 'maximum_hardware@hotmail.co', 'images/dealers/maximum.jpeg', 'sok el aser khalifa mamon masr el gedidaa', '0100903061', '24156375', '11 Am To PM Except Sunday', 'bta3 koloo', 1),
(2, 'Compu Fast', '', 'images/dealers/comp_fast.jpeg', 'sok el aser khalifa mamon masr el gedida', '01009030615', '24156375', '10Am - 11Pm everyday except sunday', '', 2),
(3, 'High End', '', 'images/dealers/high_end.jpeg', 'sok el aser khalifa mamon masr el gedida', '01009030615', '24156375', '10Am - 11Pm everyday except sunday', '', 3),
(4, 'EL Badr', '', 'images/dealers/badr.jpeg', 'sok el aser khalifa mamon masr el gedida', '01009030615', '24156375', '10am - 12 am every day', '', 4),
(5, 'Technology_house', 'Technology_house@hotmail.com', 'images/dealers/th.jpg', 'sok el aser khalifa mamon masr el gedidaa', '0113588380', '24156375', '11 Am To PM Except Sunday', 'ssa3ar koisa 7agat 7elwa', 6);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `name`) VALUES
(1, 'high'),
(2, 'medium'),
(3, 'low');

-- --------------------------------------------------------

--
-- Table structure for table `manfecturer`
--

CREATE TABLE IF NOT EXISTS `manfecturer` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `image` varchar(190) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `manfecturer`
--

INSERT INTO `manfecturer` (`id`, `name`, `image`) VALUES
(1, 'Arctic_Cooling', NULL),
(2, 'Asus', NULL),
(3, 'Cooler_Master', NULL),
(4, 'MSI', NULL),
(5, 'Dell', NULL),
(6, 'Seagate', NULL),
(7, 'Toshiba', NULL),
(8, 'Western_Digital', NULL),
(9, 'Acer', NULL),
(10, 'BenQ', NULL),
(11, 'compaq', NULL),
(12, 'hp', NULL),
(13, 'LG', NULL),
(14, 'ViewSonic', NULL),
(15, 'Gigabyte', NULL),
(16, 'IBM', NULL),
(17, 'intel', NULL),
(19, 'Powercolor', NULL),
(20, 'Sapphire', NULL),
(21, 'Adata', NULL),
(22, 'Antec', NULL),
(23, 'Cooler_Master', NULL),
(24, 'Corsair', NULL),
(25, 'Foxconn', NULL),
(26, 'Amd', NULL),
(27, 'kingston', NULL),
(28, 'samsung', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

CREATE TABLE IF NOT EXISTS `parts` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `part_name` varchar(80) DEFAULT NULL,
  `image` varchar(190) NOT NULL,
  `cat_id` int(15) NOT NULL,
  `man_id` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `part_name`, `image`, `cat_id`, `man_id`) VALUES
(82, 'geforce gtx 980 3gb', 'images/parts/vga/high.jpg', 1, 17),
(83, 'AMD RX 290', 'images/parts/vga/high_1.jpg', 1, 26),
(84, 'gtx 750', 'images/parts/vga/medium_1.jpg', 1, 17),
(85, 'AMD R7 2GB', 'images/parts/vga/medium_1.png', 1, 26),
(86, 'Gtx 550 1GB', 'images/parts/vga/low.jpg', 1, 17),
(87, 'AMD 7570', 'images/parts/vga/low_1.png', 1, 26),
(88, 'Kingstone 16GB DDR3', 'images/parts/ram/high.jpg', 2, 27),
(89, 'Kingstone 8GB DDR3', 'images/parts/ram/medium.jpg', 2, 27),
(90, 'Kingstone 4GB DDR3', 'images/parts/ram/low.jpg', 2, 27),
(91, 'Corsaire 16GB DDR3', 'images/parts/ram/high_1.jpg', 2, 24),
(92, 'Corsaire 8GB DDR3', 'images/parts/ram/medium_1.jpg', 2, 24),
(93, 'Corsaire 4GB DDR3', 'images/parts/ram/low_1.jpg', 2, 24),
(94, 'Intel Core i7', 'images/parts/processors/high.jpg', 3, 17),
(95, 'Intel Core i5', 'images/parts/processors/medium.jpg', 3, 17),
(96, 'Intel pentium 4', 'images/parts/processors/low.jpg', 3, 17),
(97, 'AMD FX 8500 ', 'images/parts/processors/high_2.jpg', 3, 26),
(98, 'AMD Phenom 4x', 'images/parts/processors/medium_2.jpg', 3, 26),
(99, 'AMD athlon x2', 'images/parts/processors/low_2.jpg', 3, 26),
(100, 'Adata 900wat ', 'images/parts/power-supply/high.jpg', 4, 21),
(101, 'Adata 500wat ', 'images/parts/power-supply/medium.jpg', 4, 21),
(102, 'Adata 400wat ', 'images/parts/power-supply/low.png', 4, 21),
(103, 'Cooler master 1200 Wat', 'images/parts/power-supply/high_1.jpg', 4, 23),
(104, 'Cooler master 1000 Wat', 'images/parts/power-supply/medium_2.jpg', 4, 23),
(105, 'Cooler master 900 Wat', 'images/parts/power-supply/low_2.jpg', 4, 23),
(106, 'Asus', 'images/parts/mother_board/high.jpg', 5, 2),
(107, 'Asus p22m', 'images/parts/mother_board/medium.jpg', 5, 2),
(108, 'Asus p112', 'images/parts/mother_board/low.jpg', 5, 2),
(109, 'Gigabyte gamer edition', 'images/parts/mother_board/high_1.jpg', 5, 26),
(110, 'Gigabyte m235 ', 'images/parts/mother_board/medium_1.jpg', 5, 15),
(111, 'Gigabyte g135 ', 'images/parts/mother_board/low_1.jpg', 5, 15),
(112, 'Acer gamer 24 inch', 'images/parts/monitor/high.jpg', 6, 9),
(113, 'Acer 19 inch HD', 'images/parts/monitor/medium.jpg', 6, 9),
(114, 'Acer 19 inch ', 'images/parts/monitor/low.jpg', 6, 9),
(115, 'Benq gamer edition 24 ', 'images/parts/monitor/high_1.jpg', 6, 10),
(116, 'Benq 19 inch hd', 'images/parts/monitor/medium_1.jpg', 6, 10),
(117, 'Wetern digital 1 tera', 'images/parts/hard_drives/high_1.jpg', 7, 8),
(118, 'Western digital 750 GB', 'images/parts/hard_drives/medium_1.jpg', 7, 8),
(119, 'Western digital 80 GB', 'images/parts/hard_drives/low_1.jpg', 7, 8),
(120, 'Segate 1 tera', 'images/parts/hard_drives/high.jpg', 7, 6),
(121, 'Segate 500 Gb', 'images/parts/hard_drives/medium.jpg', 7, 6),
(122, 'Segate 120 Gb', 'images/parts/hard_drives/low.jpg', 7, 6),
(123, 'Cooler master gamer', 'images/parts/cases/high_1.jpg', 8, 3),
(124, 'Cooler master t5x', 'images/parts/cases/medium_1.jpg', 8, 3),
(125, 'Cooler master starter edition', 'images/parts/cases/low_1.jpg', 8, 3),
(126, 'Arctic Cooling gamer', 'images/parts/cases/high.jpg', 8, 1),
(127, 'Arctic Cooling ma50', 'images/parts/cases/medium.jpg', 8, 1),
(128, 'Arctic Cooling BL30', 'images/parts/cases/low_end.jpg', 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `parts_dealers`
--

CREATE TABLE IF NOT EXISTS `parts_dealers` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `part_id` int(15) DEFAULT NULL,
  `cat_id` int(15) NOT NULL,
  `level_id` int(15) NOT NULL,
  `level_s` int(15) NOT NULL,
  `man_id` int(15) NOT NULL,
  `dealer_id` int(15) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=113 ;

--
-- Dumping data for table `parts_dealers`
--

INSERT INTO `parts_dealers` (`id`, `part_id`, `cat_id`, `level_id`, `level_s`, `man_id`, `dealer_id`, `price`) VALUES
(66, 82, 1, 1, 0, 17, 1, 2850),
(67, 83, 1, 1, 0, 26, 1, 2850),
(68, 84, 1, 2, 1, 17, 1, 2300),
(69, 85, 1, 2, 1, 26, 1, 2300),
(70, 86, 1, 3, 2, 17, 1, 1950),
(71, 87, 1, 3, 2, 26, 1, 1900),
(72, 88, 2, 1, 0, 27, 1, 700),
(73, 89, 2, 2, 1, 27, 1, 500),
(74, 90, 2, 3, 2, 27, 1, 350),
(75, 91, 2, 1, 0, 24, 1, 650),
(76, 92, 2, 2, 1, 24, 1, 450),
(77, 93, 2, 3, 2, 24, 1, 250),
(78, 94, 3, 1, 0, 17, 1, 1000),
(79, 95, 3, 2, 1, 17, 1, 850),
(80, 96, 3, 3, 2, 17, 1, 300),
(81, 97, 3, 1, 0, 26, 1, 950),
(82, 98, 3, 2, 1, 26, 1, 500),
(83, 99, 3, 3, 2, 26, 1, 250),
(84, 100, 4, 1, 0, 21, 1, 800),
(85, 101, 4, 2, 1, 21, 1, 700),
(86, 102, 4, 3, 2, 21, 1, 400),
(87, 103, 4, 1, 0, 23, 1, 1100),
(88, 104, 4, 2, 1, 23, 1, 1000),
(89, 105, 4, 3, 2, 23, 1, 980),
(90, 106, 5, 1, 0, 2, 1, 900),
(91, 107, 5, 2, 1, 2, 1, 700),
(92, 108, 5, 3, 2, 2, 1, 500),
(93, 109, 5, 1, 0, 26, 1, 1100),
(94, 110, 5, 2, 1, 15, 1, 950),
(95, 111, 5, 3, 2, 15, 1, 700),
(96, 112, 6, 1, 0, 9, 1, 2000),
(97, 113, 6, 2, 1, 9, 1, 1200),
(98, 114, 6, 3, 2, 9, 1, 900),
(99, 115, 6, 1, 0, 10, 1, 1600),
(100, 116, 6, 2, 1, 10, 1, 1100),
(101, 117, 7, 1, 0, 8, 1, 980),
(102, 118, 7, 2, 1, 8, 1, 700),
(103, 119, 7, 3, 2, 8, 1, 260),
(104, 120, 7, 1, 0, 6, 1, 900),
(105, 121, 7, 2, 1, 6, 1, 600),
(106, 122, 7, 3, 2, 6, 1, 230),
(107, 123, 8, 1, 0, 3, 1, 900),
(108, 124, 8, 2, 1, 3, 1, 700),
(109, 125, 8, 3, 2, 3, 1, 500),
(110, 126, 8, 1, 0, 1, 1, 800),
(111, 127, 8, 2, 1, 1, 1, 600),
(112, 128, 8, 3, 2, 1, 1, 200);

-- --------------------------------------------------------

--
-- Table structure for table `part_properties`
--

CREATE TABLE IF NOT EXISTS `part_properties` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `part_id` int(15) DEFAULT NULL,
  `category_id` int(15) DEFAULT NULL,
  `level_id` int(15) DEFAULT NULL,
  `level_s` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `part_properties`
--

INSERT INTO `part_properties` (`id`, `part_id`, `category_id`, `level_id`, `level_s`) VALUES
(25, 82, 1, 1, 0),
(26, 83, 1, 1, 0),
(27, 84, 1, 2, 1),
(28, 85, 1, 2, 1),
(29, 86, 1, 3, 2),
(30, 87, 1, 3, 2),
(31, 88, 2, 1, 0),
(32, 89, 2, 2, 1),
(33, 90, 2, 3, 2),
(34, 91, 2, 1, 0),
(35, 92, 2, 2, 1),
(36, 93, 2, 3, 2),
(37, 94, 3, 1, 0),
(38, 95, 3, 2, 1),
(39, 96, 3, 3, 2),
(40, 97, 3, 1, 0),
(41, 98, 3, 2, 1),
(42, 99, 3, 3, 2),
(43, 100, 4, 1, 0),
(44, 101, 4, 2, 1),
(45, 102, 4, 3, 2),
(46, 103, 4, 1, 0),
(47, 104, 4, 2, 1),
(48, 105, 4, 3, 2),
(49, 106, 5, 1, 0),
(50, 107, 5, 2, 1),
(51, 108, 5, 3, 2),
(52, 109, 5, 1, 0),
(53, 110, 5, 2, 1),
(54, 111, 5, 3, 2),
(55, 112, 6, 1, 0),
(56, 113, 6, 2, 1),
(57, 114, 6, 3, 2),
(58, 115, 6, 1, 0),
(59, 116, 6, 2, 1),
(60, 117, 7, 1, 0),
(61, 118, 7, 2, 1),
(62, 119, 7, 3, 2),
(63, 120, 7, 1, 0),
(64, 121, 7, 2, 1),
(65, 122, 7, 3, 2),
(66, 123, 8, 1, 0),
(67, 124, 8, 2, 1),
(68, 125, 8, 3, 2),
(69, 126, 8, 1, 0),
(70, 127, 8, 2, 1),
(71, 128, 8, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `part_usage`
--

CREATE TABLE IF NOT EXISTS `part_usage` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `part_id` int(15) DEFAULT NULL,
  `usage_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=152 ;

--
-- Dumping data for table `part_usage`
--

INSERT INTO `part_usage` (`id`, `part_id`, `usage_id`) VALUES
(74, 82, 1),
(75, 83, 1),
(76, 84, 1),
(77, 84, 2),
(78, 85, 1),
(79, 85, 2),
(80, 86, 1),
(81, 86, 2),
(82, 87, 1),
(83, 87, 2),
(84, 88, 1),
(85, 89, 1),
(86, 89, 2),
(87, 90, 1),
(88, 90, 2),
(89, 91, 1),
(90, 92, 1),
(91, 92, 2),
(92, 93, 1),
(93, 93, 2),
(94, 94, 1),
(95, 95, 1),
(96, 95, 2),
(97, 96, 2),
(98, 96, 1),
(99, 97, 1),
(100, 98, 1),
(101, 98, 2),
(102, 99, 1),
(103, 99, 2),
(104, 100, 1),
(105, 101, 1),
(106, 101, 2),
(107, 102, 1),
(108, 102, 2),
(109, 103, 1),
(110, 104, 1),
(111, 104, 2),
(112, 105, 1),
(113, 105, 2),
(114, 106, 1),
(115, 107, 1),
(116, 107, 2),
(117, 108, 1),
(118, 108, 2),
(119, 109, 1),
(120, 110, 1),
(121, 110, 2),
(122, 111, 1),
(123, 111, 2),
(124, 112, 1),
(125, 113, 1),
(126, 113, 2),
(127, 114, 1),
(128, 114, 2),
(129, 115, 1),
(130, 116, 1),
(131, 116, 2),
(132, 117, 1),
(133, 118, 1),
(134, 118, 2),
(135, 119, 1),
(136, 119, 2),
(137, 120, 1),
(138, 121, 1),
(139, 121, 2),
(140, 122, 1),
(141, 122, 2),
(142, 123, 1),
(143, 124, 1),
(144, 124, 2),
(145, 125, 1),
(146, 125, 2),
(147, 126, 1),
(148, 127, 1),
(149, 127, 2),
(150, 128, 1),
(151, 128, 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `question` varchar(90) DEFAULT NULL,
  `group` varchar(50) NOT NULL,
  `usage_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `group`, `usage_id`) VALUES
(1, 'How Do You Like To Play Games ?', 'level', 1),
(2, 'Do You Prefer AMD or Intel ?', 'man', 1),
(3, 'Do you Mainly Concern About Price ?', 'price', 1),
(4, 'Select PC Performance Type ', 'level', 2),
(5, 'Do You Prefer AMD or Intel ?', 'man', 2),
(6, 'Are You Concerning More about price ?', 'price', 2),
(10, 'Select your desired company PC Performance Type ', 'level', 3),
(11, 'Do You Prefer AMD or Intel ?', 'man', 3),
(12, 'Are You Concerning More about price ?', 'price', 3),
(13, 'How would you like Your Graphical & performance Experience ?', 'level', 4),
(14, 'Do You Prefer AMD or Intel ?', 'man', 4),
(15, 'Do you Mainly Concern About Price ?', 'price', 4);

-- --------------------------------------------------------

--
-- Table structure for table `usagee`
--

CREATE TABLE IF NOT EXISTS `usagee` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `usagee`
--

INSERT INTO `usagee` (`id`, `name`) VALUES
(1, 'Gaming'),
(2, 'Student Use'),
(3, 'Company Use'),
(4, 'Graphic And Multimedia Use');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(90) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(3, 'sabry', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(4, 'alaa', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Table structure for table `users_profile`
--

CREATE TABLE IF NOT EXISTS `users_profile` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `land_line` varchar(50) NOT NULL,
  `address` varchar(60) DEFAULT NULL,
  `about` varchar(600) NOT NULL,
  `age` varchar(80) NOT NULL,
  `users_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`id`, `name`, `email`, `mobile`, `land_line`, `address`, `about`, `age`, `users_id`) VALUES
(1, 'mohamed hesham sabryy', 'mohamed_h_sabryy@hotmail.co', '0100903061', '2415637', ' yacoub artin street heliopolis , cairo egypt', ' From BIS Currently working as a senior web debeloper @ elite advertising solutions', '18 - 25', 3),
(2, 'alaa abdelall', 'mohamed_h_sabryy@hotail.comm', '01009030615', '24156375', '11 ain shams street', 'alaaaa', '18 - 25', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_customization`
--

CREATE TABLE IF NOT EXISTS `user_customization` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `users_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
