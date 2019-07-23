-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2015 at 03:19 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `customization_details`
--

INSERT INTO `customization_details` (`id`, `part_id`, `quantity`, `u_c_id`) VALUES
(9, 73, 1, 2),
(10, 65, 1, 2),
(14, 72, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE IF NOT EXISTS `dealers` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) DEFAULT NULL,
  `password` varchar(180) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dealers`
--

INSERT INTO `dealers` (`id`, `user_name`, `password`) VALUES
(1, 'maximum_hardware', '123456789'),
(2, 'Compu_fast', '132465'),
(3, 'High_end', '2312131'),
(4, 'badr', '5465');

-- --------------------------------------------------------

--
-- Table structure for table `dealers_profile`
--

CREATE TABLE IF NOT EXISTS `dealers_profile` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(90) DEFAULT NULL,
  `logo` varchar(90) NOT NULL,
  `address` varchar(180) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `land_line` varchar(80) DEFAULT NULL,
  `time` varchar(90) NOT NULL,
  `dealers_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `dealers_profile`
--

INSERT INTO `dealers_profile` (`id`, `name`, `logo`, `address`, `mobile`, `land_line`, `time`, `dealers_id`) VALUES
(1, 'maximum hadrware', 'images/dealers/maximum.jpeg', 'sok el aser khalifa mamon masr el gedida', '01009030615', '24156375', '10Am - 11Pm everyday except sunday', 1),
(2, 'Compu Fast', 'images/dealers/comp_fast.jpeg', 'sok el aser khalifa mamon masr el gedida', '01009030615', '24156375', '10Am - 11Pm everyday except sunday', 2),
(3, 'High End', 'images/dealers/high_end.jpeg', 'sok el aser khalifa mamon masr el gedida', '01009030615', '24156375', '10Am - 11Pm everyday except sunday', 3),
(4, 'EL Badr', 'images/dealers/badr.jpeg', 'sok el aser khalifa mamon masr el gedida', '01009030615', '24156375', '10am - 12 am every day', 4);

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
(28, 'samsung', NULL),
(29, 'gtx', NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `part_name`, `image`, `cat_id`, `man_id`) VALUES
(1, 'Arctic Cooling case hg456', 'images/parts/cases/Arctic_Cooling/low_end.jpg', 8, 1),
(2, 'Arctic Cooling case xgg56', 'images/parts/cases/Arctic_Cooling/medium.jpg', 8, 1),
(3, 'Arctic Cooling case zfg56', 'images/parts/cases/Arctic_Cooling/high.jpg', 8, 1),
(4, 'ASUS_TA-221', 'images/parts/cases/Asus/low.jpg', 8, 2),
(5, 'ASUS_TA-441', 'images/parts/cases/Asus/medium.jpg', 8, 2),
(6, 'ASUS_TA-8881', 'images/parts/cases/Asus/high.jpg', 8, 2),
(7, 'cooler master z456', 'images/parts/Cooler_Master/low.jpg', 8, 3),
(8, 'cooler master z656', 'images/parts/Cooler_Master/medium.jpg', 8, 3),
(9, 'cooler master z856', 'images/parts/Cooler_Master/high.jpg', 8, 3),
(10, 'Dell hard drive 320', 'images/parts/hard_drives/Dell/low.jpg', 7, 5),
(11, 'Dell hard drive 720', 'images/parts/hard_drives/Dell/medium.jpg', 7, 5),
(12, 'Dell hard drive 1TB', 'images/parts/hard_drives/Dell/high.jpg', 7, 5),
(13, 'Seagate 320', 'images/parts/hard_drives/Seagate/low.jpg', 7, 6),
(14, 'Seagate 720', 'images/parts/hard_drives/Seagate/medium.jpg', 7, 6),
(15, 'Seagate 1TB', 'images/parts/hard_drives/Seagate/high.jpg', 7, 6),
(16, 'Western Digital 320', 'images/parts/hard_drives/Western_Digital/low.jpg', 7, 8),
(17, 'Western Digital 720', 'images/parts/hard_drives/Western_Digital/medium.jpg', 7, 8),
(18, 'Western Digital 1TB', 'images/parts/hard_drives/Western_Digital/high.jpg', 7, 8),
(19, 'Acer 19 inch 251mz', 'images/parts/monitor/Acer/low.jpg', 6, 9),
(20, 'Acer 24 inch 651mz', 'images/parts/monitor/Acer/medium.jpg', 6, 9),
(21, 'Acer 27  inch 651mz 3d', 'images/parts/monitor/Acer/high.jpg', 6, 9),
(22, 'BenQ 24 hd 4569z', 'images/parts/monitor/BenQ /medium.jpg', 6, 10),
(23, 'BenQ 27 hd 3D 8569z', 'images/parts/monitor/BenQ /high.jpg', 6, 10),
(24, 'Dell 19 d423', 'images/parts/monitor/dell /low.jpg', 6, 5),
(25, 'Dell 24 z423', 'images/parts/monitor/dell /medium.jpg', 6, 5),
(26, 'Dell 29 z423', 'images/parts/monitor/dell /high.jpg', 6, 5),
(27, 'HP ml 19 inch', 'images/parts/monitor/hp/low.jpg', 6, 12),
(28, 'HP ml 24inch', 'images/parts/monitor/hp/medium.jpg', 6, 12),
(29, 'HP ml 29inch', 'images/parts/monitor/hp/high.jpg', 6, 12),
(30, 'LG mzo 19 inch', 'images/parts/monitor/LG/low.jpg', 6, 13),
(31, 'LG mzo 24 inch', 'images/parts/monitor/LG/medium.jpg', 6, 13),
(32, 'LG mzo 24 inch', 'images/parts/monitor/LG/high.jpg', 6, 13),
(33, 'Asus p8zz7m', 'images/parts/mother_board/Asus/low.jpg', 5, 2),
(34, 'Asus p9zz7m', 'images/parts/mother_board/Asus/medium.jpg', 5, 2),
(35, 'Asus p10zz7m', 'images/parts/mother_board/Asus/high.jpg', 5, 2),
(36, 'Gigabyte zhlm', 'images/parts/mother_board/Gigabyte/low.jpg', 5, 15),
(37, 'Gigabyte zhlm2', 'images/parts/mother_board/Gigabyte/medium.jpg', 5, 15),
(38, 'Gigabyte zhlm3', 'images/parts/mother_board/Gigabyte/high.jpg', 5, 15),
(39, 'intel mo123', 'images/parts/mother_board/intel/low.jpg', 5, 17),
(40, 'intel mo124', 'images/parts/mother_board/intel/medium.jpg', 5, 17),
(41, 'intel mo125', 'images/parts/mother_board/intel/high.jpg', 5, 17),
(42, 'msi m234', 'images/parts/mother_board/msi /high_1.jpg', 5, 4),
(43, 'msi m235', 'images/parts/mother_board/msi /high_2.jpg', 5, 4),
(44, 'msi m235', 'images/parts/mother_board/msi /high_3.jpg', 5, 4),
(45, 'Adata psu 650wat', 'images/parts/power-supply/Adata/low.jpg', 4, 21),
(46, 'Adata psu 1000wat', 'images/parts/power-supply/Adata/medium.jpg', 4, 21),
(47, 'Adata psu 1200wat', 'images/parts/power-supply/Adata/high.jpg', 4, 21),
(48, 'Cooler Master cl 650 wat', 'images/parts/power-supply/Cooler_Master/low.jpg', 4, 23),
(49, 'Cooler Master cl 12000 wat', 'images/parts/power-supply/Cooler_Master/medium.jpg', 4, 23),
(50, 'Cooler Master cl 15000 wat', 'images/parts/power-supply/Cooler_Master/high.jpg', 4, 23),
(51, 'Corsair 650 wat psu', 'images/parts/power-supply/Corsair/low.jpg', 4, 24),
(52, 'Corsair 850 wat psu', 'images/parts/power-supply/Corsair/medium.jpg', 4, 24),
(53, 'Corsair 1200 wat psu', 'images/parts/power-supply/Corsair/high.png', 4, 24),
(54, 'Amd athlon 64 dual core', 'images/parts/processors/amd/low.jpg', 3, 26),
(55, 'Amd phenom x3 quad core', 'images/parts/processors/amd/medium.jpg', 3, 26),
(56, 'Amd a series x6 cores', 'images/parts/processors/amd/high_1.jpg', 3, 26),
(57, 'Amd  FX 8 cores', 'images/parts/processors/amd/high_2.jpg', 3, 26),
(58, 'intel pentium 4', 'images/parts/processors/intel/low.jpg', 3, 17),
(59, 'intel cor2du', 'images/parts/processors/intel/low_2.jpg', 3, 17),
(60, 'intel cor2quad', 'images/parts/processors/intel/medium_1.jpg', 3, 17),
(61, 'intel core i5', 'images/parts/processors/intel/medium_2.jpg', 3, 17),
(62, 'intel core i7', 'images/parts/processors/intel/high.jpg', 3, 17),
(63, 'Crosair 2gb Ram ddr2', 'images/parts/ram/corsaire/low.jpg', 2, 24),
(64, 'Crosair 8gb Ram ddr3', 'images/parts/ram/corsaire/medium.jpg', 2, 24),
(65, 'Crosair 16gb Ram ddr3', 'images/parts/ram/corsaire/high.jpg', 2, 24),
(66, 'kingston 2gb ddr2', 'images/parts/ram/kingston/low.jpg', 2, 27),
(67, 'kingston 8gb ddr3', 'images/parts/ram/kingston/medium.jpg', 2, 27),
(68, 'kingston 16gb ddr3', 'images/parts/ram/kingston/high.jpg', 2, 27),
(69, 'AMD R7 Series 2gb', 'images/parts/vga/amd/medium.jpg', 1, 26),
(70, 'AMD R9 Series 3gb', 'images/parts/vga/amd/high.jpg', 1, 26),
(71, 'geforce gtx 960 1gb', 'images/parts/vga/gtx/medium_1.jpg', 1, 17),
(72, 'geforce gtx 970 2gb', 'images/parts/vga/gtx/medium_2.jpg', 1, 17),
(73, 'geforce gtx 980 3gb', 'images/parts/vga/gtx/high.jpg', 1, 17);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `parts_dealers`
--

INSERT INTO `parts_dealers` (`id`, `part_id`, `cat_id`, `level_id`, `level_s`, `man_id`, `dealer_id`, `price`) VALUES
(1, 73, 1, 1, 0, 17, 1, 2100),
(2, 73, 1, 1, 0, 17, 2, 2000),
(3, 73, 1, 1, 0, 17, 3, 2250),
(4, 65, 2, 1, 0, 0, 1, 900),
(5, 65, 2, 1, 0, 0, 2, 820),
(6, 65, 2, 1, 0, 0, 3, 830),
(7, 72, 1, 1, 0, 17, 1, 600),
(8, 72, 1, 1, 0, 17, 2, 650),
(9, 72, 1, 1, 0, 17, 3, 700),
(14, 73, 1, 1, 0, 17, 4, 3000),
(15, 72, 1, 1, 0, 17, 4, 2100),
(18, 65, 2, 0, 0, 0, 4, 780),
(19, 70, 1, 1, 0, 26, 1, 400),
(20, 70, 1, 1, 0, 26, 2, 500),
(21, 70, 1, 1, 0, 26, 3, 800),
(22, 71, 1, 2, 1, 17, 1, 400),
(23, 71, 1, 2, 1, 17, 2, 600),
(24, 71, 1, 2, 1, 17, 3, 700),
(28, 66, 2, 3, 2, 0, 1, 100),
(29, 66, 2, 3, 2, 0, 2, 150),
(30, 66, 2, 3, 2, 0, 3, 160),
(31, 66, 2, 3, 2, 0, 4, 165),
(32, 67, 2, 2, 1, 0, 1, 300),
(33, 67, 2, 2, 1, 0, 2, 320),
(34, 67, 2, 2, 1, 0, 3, 330),
(35, 67, 2, 2, 1, 0, 4, 340),
(36, 62, 3, 1, 0, 17, 1, 1100),
(37, 62, 3, 1, 0, 17, 2, 1000),
(38, 62, 3, 1, 0, 17, 3, 1150),
(39, 61, 3, 2, 1, 17, 1, 650),
(40, 61, 3, 2, 1, 17, 2, 700),
(41, 61, 3, 2, 1, 17, 3, 750),
(42, 60, 3, 3, 2, 17, 1, 250),
(43, 60, 3, 3, 2, 17, 2, 300),
(44, 60, 3, 3, 2, 17, 3, 350),
(45, 57, 3, 1, 0, 26, 1, 950),
(46, 57, 3, 1, 0, 26, 2, 850),
(47, 56, 3, 2, 1, 26, 1, 500),
(48, 56, 3, 2, 1, 26, 2, 550),
(49, 55, 3, 3, 2, 26, 1, 300),
(50, 55, 3, 3, 2, 26, 2, 310),
(51, 50, 4, 1, 0, 0, 1, 500),
(52, 50, 4, 1, 0, 0, 2, 490),
(53, 52, 4, 2, 1, 0, 1, 350),
(54, 52, 4, 2, 1, 0, 2, 400),
(55, 51, 4, 3, 2, 0, 1, 200),
(56, 51, 4, 3, 2, 0, 2, 210);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `part_properties`
--

INSERT INTO `part_properties` (`id`, `part_id`, `category_id`, `level_id`, `level_s`) VALUES
(1, 73, 1, 1, 0),
(2, 72, 1, 1, 0),
(3, 70, 1, 1, 0),
(4, 71, 1, 2, 1),
(5, 65, 2, 1, 0),
(6, 66, 2, 3, 2),
(7, 67, 2, 2, 1),
(8, 62, 3, 1, 0),
(9, 61, 3, 2, 1),
(10, 60, 3, 3, 2),
(11, 57, 3, 1, 0),
(12, 56, 3, 2, 1),
(13, 55, 3, 3, 2),
(14, 50, 4, 1, 0),
(15, 52, 4, 2, 1),
(16, 51, 4, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `part_usage`
--

CREATE TABLE IF NOT EXISTS `part_usage` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `part_id` int(15) DEFAULT NULL,
  `usage_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `part_usage`
--

INSERT INTO `part_usage` (`id`, `part_id`, `usage_id`) VALUES
(1, 70, 1),
(2, 71, 1),
(3, 72, 1),
(4, 73, 1),
(5, 65, 1),
(6, 67, 1),
(7, 66, 1),
(8, 55, 1),
(9, 56, 1),
(10, 57, 1),
(11, 60, 1),
(12, 61, 1),
(13, 62, 1),
(14, 50, 1),
(51, 1, NULL),
(52, 52, 1),
(53, 71, 2),
(54, 66, 2),
(55, 67, 2),
(56, 61, 2),
(57, 60, 2),
(58, 56, 2),
(59, 55, 2),
(60, 52, 2),
(61, 51, 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(3, 'sabry', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users_profile`
--

INSERT INTO `users_profile` (`id`, `name`, `email`, `mobile`, `land_line`, `address`, `about`, `age`, `users_id`) VALUES
(1, 'mohamed hesham sabryy', 'mohamed_h_sabryy@hotmail.co', '0100903061', '$2415637', ' yacoub artin street heliopolis , cairo egypt', ' From BIS Currently working as a senior web debeloper @ elite advertising solutions', '18 - 25', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_customization`
--

CREATE TABLE IF NOT EXISTS `user_customization` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `type` int(15) DEFAULT NULL,
  `users_id` int(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_customization`
--

INSERT INTO `user_customization` (`id`, `type`, `users_id`) VALUES
(2, 1, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
