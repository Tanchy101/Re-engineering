-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 06:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siaproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_name` varchar(100) NOT NULL,
  `admin_uname` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_id` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `profileImage` varchar(255) NOT NULL,
  `usertype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_name`, `admin_uname`, `admin_password`, `admin_email`, `admin_id`, `bio`, `profileImage`, `usertype`) VALUES
('test', '', 'test!!', 'test@mail.com', '7', 'Innovate || Create hakgod', '', 'user'),
('Tanchy', '', 'elecpass1', 'angelo.tancioco@gmail.com', 'BFRTAK-237805', '', '0919eade-a68c-45fa-8229-5cc3fd636148.jpg', 'admin'),
('test10', '', 'test', 'test10@mail.com', 'CYAGJN-302185', '', '', 'user'),
('test2', '', 'test', 'test3@mail.com', 'DQWZPE-805792', 'hellllllllo', 'favicon-32x32.png', 'user'),
('test4', '', 'test', 'test4@mail.com', 'LYRVTX-739564', 'hello', '', 'user'),
('testme', '', 'test', 'testme@mail.com', 'RJPQXC-498126', 'Hello', 'HRDW-017-007.jpg', 'user'),
('test2', '', 'test!', 'test2@mail.com', 'RMSADF-153269', '', '', 'user'),
('TAEMO', '', 'taetaepass', 'jackspidicey02@gmail.com', 'URDTGP-603729', '', '', 'user'),
('test5', '', 'test', 'test5@mail.com', 'ZMCHJB-458097', '', '', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `id` int(11) NOT NULL,
  `parent_comment` varchar(500) NOT NULL,
  `student` varchar(1000) NOT NULL,
  `post` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`id`, `parent_comment`, `student`, `post`, `date`) VALUES
(151, '150', 'test2', 'yeyeye', '2023-07-18 13:02:52'),
(150, '0', 'test2', 'sdad', '2023-07-18 12:57:30'),
(152, '0', 'test', 'heyy', '2023-07-24 04:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `discussion1`
--

CREATE TABLE `discussion1` (
  `id` int(255) NOT NULL,
  `parent_comment` text NOT NULL,
  `student` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussion1`
--

INSERT INTO `discussion1` (`id`, `parent_comment`, `student`, `post`, `date`) VALUES
(5, '0', 'test2', 'sup', '2023-07-18 13:32:08'),
(6, '5', 'test', 'adsf', '2023-07-18 13:36:22');

-- --------------------------------------------------------

--
-- Table structure for table `discussion2`
--

CREATE TABLE `discussion2` (
  `id` int(255) NOT NULL,
  `parent_comment` text NOT NULL,
  `student` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussion2`
--

INSERT INTO `discussion2` (`id`, `parent_comment`, `student`, `post`, `date`) VALUES
(1, '0', 'admin', 'Prod ', '2023-07-09 08:05:21'),
(2, '1', 'admin', 'Adhasj', '2023-07-09 08:05:40'),
(3, '0', 'test', 'gmsakfd', '2023-07-16 10:43:09'),
(4, '1', 'test', 'lfdasofdl', '2023-08-02 18:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `discussion3`
--

CREATE TABLE `discussion3` (
  `id` int(255) NOT NULL,
  `parent_comment` int(11) NOT NULL,
  `student` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussion3`
--

INSERT INTO `discussion3` (`id`, `parent_comment`, `student`, `post`, `date`) VALUES
(1, 0, 'admin', 'ISP Sample', '2023-07-09 08:05:49'),
(2, 1, 'admin', 'Tjsadkas', '2023-07-09 08:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `discussion4`
--

CREATE TABLE `discussion4` (
  `id` int(255) NOT NULL,
  `parent_comment` text NOT NULL,
  `student` varchar(255) NOT NULL,
  `post` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussion4`
--

INSERT INTO `discussion4` (`id`, `parent_comment`, `student`, `post`, `date`) VALUES
(1, '0', 'admin', 'Osdatsd', '2023-07-09 08:06:09'),
(2, '1', 'admin', 'LSdask', '2023-07-09 08:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `netlayout`
--

CREATE TABLE `netlayout` (
  `net_layout_id` int(200) NOT NULL,
  `net_layout_area` varchar(200) NOT NULL,
  `net_institution` varchar(200) NOT NULL,
  `net_ergo` varchar(3) NOT NULL,
  `net_image` varchar(200) NOT NULL,
  `net_length` varchar(200) NOT NULL,
  `net_width` varchar(200) NOT NULL,
  `no_pcs` varchar(200) NOT NULL,
  `switch_model` varchar(255) NOT NULL,
  `low_total_price` varchar(255) NOT NULL,
  `ave_total_price` varchar(255) NOT NULL,
  `high_total_price` varchar(255) NOT NULL,
  `no_standard_table` varchar(200) NOT NULL,
  `no_Lshape` varchar(200) NOT NULL,
  `no_Ushape` varchar(200) NOT NULL,
  `no_standard_school` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `netlayout`
--

INSERT INTO `netlayout` (`net_layout_id`, `net_layout_area`, `net_institution`, `net_ergo`, `net_image`, `net_length`, `net_width`, `no_pcs`, `switch_model`, `low_total_price`, `ave_total_price`, `high_total_price`, `no_standard_table`, `no_Lshape`, `no_Ushape`, `no_standard_school`) VALUES
(3, '25', 'Office', 'No', '5x5_office.png', '5', '5', '12', '16', '240276', '309000', '1198188', '12', '0', '0', '0'),
(4, '25', 'Office', 'No', '5x5_office2.png', '5', '5', '12', '16', '240276', '309000', '1198188', '12', '0', '0', '0'),
(6, '25', 'Office', 'No', '5x5_office4.jpg', '5', '5', '8', '8', '166920.17', '212736.17', '805528.17', '7', '1', '0', '0'),
(7, '25', 'Office', 'No', '5x5_office5.jpg', '5', '5', '5', '5', '130340', '158975', '529470', '1', '4', '0', '0'),
(9, '30', 'Office', 'No', '5x6_office.png', '6', '5', '12', '16', '240276', '309000', '1198188', '12', '0', '0', '0'),
(10, '30', 'Office ', 'No', '5x6_office2.png', '6', '5', '16', '16', '318488', '318488', '410120', '16', '0', '0', '0'),
(12, '30', 'Office', 'No', '5x6_office4.jpg', '6', '5', '15', '16', '298935', '384840', '1496325', '15', '0', '0', '0'),
(13, '30', 'Office', 'No', '5x6_office5.jpg', '6', '5', '8', '8', '126199.17', '172015.17', '764807.17', '4', '4', '0', '0'),
(14, '35', 'Office', 'No', '5x7_office.png', '7', '5', '15', '16', '298935', '384840', '1496325', '15', '0', '0', '0'),
(15, '35', 'Office', 'No', '5x7_office2.png', '7', '5', '20', '24', '398376.4', '512916.4', '1994896.4', '20', '0', '0', '0'),
(16, '35', 'Office', 'No', '5x7_office3.jpg', '7', '5', '14', '16', '282249.4', '385335.4', '1719117.4', '14', '0', '0', '0'),
(17, '35', 'Office', 'No', '5x7_office4.png', '7', '5', '12', '16', '189595', '258319', '1147507', '8', '4', '0', '0'),
(18, '40', 'Office', 'No', '5x8_office.png', '8', '5', '18', '24', '359270.4', '462356.4', '1796138.4', '18', '0', '0', '0'),
(19, '40', 'Office', 'No', '5x8_office2.png', '8', '5', '18', '24', '359270.4', '462356.4', '1796138.4', '18', '0', '0', '0'),
(20, '40', 'Office', 'Yes', '5x8_office3.jpg', '8', '5', '22', '24', '126199.17', '172015.17', '764807.17', '22', '0', '0', '0'),
(21, '40', 'Office', 'No', '5x8_office4.jpg', '8', '5', '22', '24', '398376.4', '512916.4', '1994896.4', '22', '0', '0', '0'),
(22, '54', 'School', 'No', '9x6_school.png', '9', '6', '31', '48', '516752.88', '694289.88', '2619358.88', '0', '0', '0', '31'),
(23, '54', 'School', 'No', '9x6_school1.png', '9', '6', '21', '24', '346365.15', '466632.15', '1770711.15', '0', '0', '0', '21'),
(24, '72', 'School', 'No', '9x8_school.png', '9', '8', '45', '48', '743885.38', '1001600.38', '3796055.38', '0', '0', '0', '45'),
(25, '72', 'School', 'No', '9x8_school2.png', '9', '8', '31', '48', '695214.13', '935748.13', '3543906.13', '0', '0', '0', '31'),
(28, '90', 'School', 'No', '9x10_school1.png', '10', '9', '41', '48', '678990.38', '913797.38', '3459856.38', '0', '0', '0', '41'),
(30, '60', 'School', 'No', '10x6_school.png', '10', '6', '35', '48', '581647.88', '782092.88', '2955557.88', '0', '0', '0', '35'),
(31, '60', 'School', 'No', '10x6_school1.png', '10', '6', '25', '28', '453641.25', '608270.25', '2284943.25', '0', '0', '0', '25'),
(34, '80', 'School', 'No', '10x8_school.png', '10', '8', '51', '48+5', '841752.88', '1133829.88', '4300878.88', '0', '0', '0', '51'),
(35, '80', 'School', 'No', '10x8_school1.png', '10', '8', '37', '48', '614095.38', '825994.38', '3123657.38', '0', '0', '0', '37'),
(36, '100', 'School ', 'No', '10x10_school1.png', '10', '10', '49', '48 + 5', '809305.38', '1089928.38', '4132779.38', '0', '0', '0', '49'),
(37, '66', 'School', 'No', '11x6_school.png', '11', '6', '39', '48', '646542.88', '869895.88', '3291756.88', '0', '0', '0', '39'),
(38, '66', 'School', 'No', '11x6_school1.png', '11', '6', '29', '24', '484305.38', '650388.38', '2451259.38', '0', '0', '0', '29'),
(39, '88', 'School', 'No', '11x8_school.png', '11', '8', '57', '48+10', '942560.38', '1268999.38', '4808642.38', '0', '0', '0', '57'),
(40, '88', 'School', 'No', '11x8_school1.png', '11', '8', '43', '48', '711437.88', '957698.88', '3627955.88', '0', '0', '0', '43'),
(41, '110', 'School', 'No', '11x10_school1.png', '11', '10', '57', '48+10', '942560.38', '1268999.38', '4808642.38', '0', '0', '0', '57'),
(42, '25', 'Office', 'Yes', '5x5_office6.png', '5', '5', '4', '5', '110787', '133695', '430091', '0', '4', '0', '0'),
(43, '40', 'Office', 'Yes', '5x8_office3.png', '8', '5', '8', '8', '220120.17', '265936.17', '858728.17', '0', '8', '0', '0'),
(44, '55', 'Office', 'Yes', '5x11_office.png', '11', '5', '10', '16', '277170', '334440', '1075430', '0', '10', '0', '0'),
(45, '30', 'Office', 'Yes', '5x6_office4.png', '6', '5', '6', '8', '165814.17', '200176.17', '644770.17', '0', '6', '0', '0'),
(46, '60', 'Office', 'Yes', '6x10_office3.png', '10', '6', '10', '16', '277170', '334440', '1075430', '0', '10', '0', '0'),
(48, '35', 'Office', 'Yes', '7x5_office2.png', '7', '5', '5', '5', '142330', '170965', '541460', '0', '5', '0', '0'),
(49, '35', 'Office', 'Yes', '7x5_office.png', '7', '5', '6', '8', '165814.17', '200176.17', '644770.17', '0', '6', '0', '0'),
(50, '45', 'Office', 'No', '5x9_office.png', '9', '5', '21', '24', '417929.4', '538196.4', '2094275.4', '21', '0', '0', '0'),
(51, '45', 'Office', 'No', '5x9_office2.png', '9', '5', '24', '24', '476588.4', '614036.4', '2392412.4', '24', '0', '0', '0'),
(52, '45', 'Office', 'Yes', '5x9_office3.jpg', '9', '5', '15', '16', '359735', '445640', '1557125', '7', '8', '0', '0'),
(53, '45', 'Office', 'No', '5x9_office4.jpg', '9', '5', '18', '24', '359270.4', '462356.4', '1796138.4', '18', '0', '0', '0'),
(54, '50', 'Office', 'No', '5x10_office.png', '10', '5', '24', '24', '476588.4', '614036.4', '2392412.4', '24', '0', '0', '0'),
(55, '50', 'Office', 'No', '5x10_office2.png', '10', '5', '28', '28', '564734', '725090', '2799862', '28', '0', '0', '0'),
(56, '50', 'Office', 'No', '5x10_office3.jpg', '10', '5', '17', '24', '423317.4', '520676.4', '1780359.4', '6', '11', '0', '0'),
(57, '50', 'Office', 'No', '5x10_office4.jpg', '10', '5', '13', '16', '275029', '349480', '1312767', '11', '2', '0', '0'),
(58, '55', 'Office', 'Yes', '5x11_office.png', '11', '5', '10', '16', '277170', '334440', '1075430', '0', '10', '0', '0'),
(59, '36', 'Office', 'No', '6x6_office.png', '6', '6', '16', '16', '318488', '410120', '1595704', '16', '0', '0', '0'),
(60, '36', 'Office', 'No', '6x6_office2.png', '6', '6', '16', '16', '318488', '410120', '1595704', '16', '0', '0', '0'),
(61, '36', 'Office', 'No', '6x6_office3.jpg', '6', '6', '14', '16', '294582', '374760', '1412146', '12', '2', '0', '0'),
(62, '36', 'Office', 'Yes', '6x6_office4.png', '6', '6', '5', '5', '137940', '166575', '537070', '0', '5', '0', '0'),
(63, '36', 'Office', 'No', '6x6_office5.jpg', '6', '6', '12', '16', '312216', '380940', '1270128', '6', '6', '0', '0'),
(64, '42', 'Office', 'No', '6x7_office.png', '7', '6', '20', '24', '398376.4', '512916.4', '1994896.4', '20', '0', '0', '0'),
(65, '42', 'Office', 'No', '6x7_office2.png', '7', '6', '20', '24', '398376.4', '512916.4', '1994896.4', '20', '0', '0', '0'),
(66, '42', 'Office', 'No', '6x7_office3.jpg', '7', '6', '16', '16', '318488', '410120', '1595704', '16', '0', '0', '0'),
(67, '42', 'Office', 'No', '6x7_office4.jpg', '7', '6', '22', '24', '437482.4', '563476.4', '2193676.4', '22', '0', '0', '0'),
(68, '48', 'Office', 'Yes', '6x8_office.png', '8', '6', '8', '8', '220120.17', '265936.17', '858728.17', '0', '8', '0', '0'),
(69, '48', 'Office', 'No', '6x8_office2.jpg', '8', '6', '12', '16', '384156', '452880', '1342068', '3', '9', '0', '0'),
(71, '48', 'Office', 'No', '6x8_office4.jpg', '8', '6', '19', '24', '378823.4', '487636.4', '1895517.4', '19', '0', '0', '0'),
(72, '54', 'Office', 'No', '6x9_office.png', '9', '6', '28', '28', '564734', '725090', '2799862', '28', '0', '0', '0'),
(73, '54', 'Office', 'No', '6x9_office2.png', '9', '6', '24', '24', '476588.4', '614036.4', '2392412.4', '24', '0', '0', '0'),
(74, '54', 'Office', 'Yes', '6x9_office3.jpg', '9', '6', '18', '24', '575090', '678176', '2011976', '9', '9', '0', '0'),
(75, '54', 'Office', 'No', '6x9_office4.jpg', '9', '6', '28', '28', '564734', '725090', '2799862', '28', '0', '0', '0'),
(76, '60', 'Office', 'No', '6x10_office.png', '10', '6', '32', '48', '641162.63', '824426.63', '3195594.63', '32', '0', '0', '0'),
(77, '60', 'Office', 'No', '6x10_office2.png', '10', '6', '28', '28', '564734', '725090', '2799862', '28', '0', '0', '0'),
(78, '60', 'Office', 'No', '6x10_office3.jpg', '10', '6', '34', '48', '680268.63', '874986.63', '3394352.63', '34', '0', '0', '0'),
(79, '66', 'Office', 'Yes', '6x11_office.png', '11', '6', '10', '10', '277170', '334440', '1075430', '0', '10', '0', '0'),
(80, '60', 'Office', 'No', '6x10_office4.jpg', '10', '6', '16', '16', '440088', '531720', '1717304', '0', '16', '0', '0'),
(81, '35', 'Office', 'Yes', '7x5_office.png', '7', '5', '6', '8', '165814.17', '200176.17', '644770.17', '0', '6', '0', '0'),
(82, '35', 'Office', 'Yes', '7x5_office2.png', '7', '5', '5', '5', '137940', '166575', '537070', '0', '5', '0', '0'),
(83, '49', 'Office ', 'No', '7x7_office.png', '7', '7', '25', '28', '506075', '649250', '2501725', '25', '0', '0', '0'),
(84, '49', 'Office', 'No', '7x7_office2.png', '7', '7', '25', '28', '506075', '649250', '2501725', '25', '0', '0', '0'),
(85, '79', 'Office', 'No', '7x7_office3.jpg', '7', '7', '19', '24', '378823.4', '487636.4', '1895517.4', '19', '0', '0', '0'),
(86, '56', 'Office', 'No', '7x8 ergo office.png', '8', '7', '13', '16', '286629', '361080', '1324367', '10', '3', '0', '0'),
(87, '56', 'Office', 'No', '7x8_office.png', '8', '7', '30', '48', '602056.63', '773866.63', '2996896.63', '30', '0', '0', '0'),
(88, '56', 'Office', 'No', '7x8_office2.png', '8', '7', '30', '48', '602056.63', '773866.63', '2996836.63', '30', '0', '0', '0'),
(89, '56', 'Office', 'No', '7x8_office3.jpg', '8', '7', '16', '16', '392128', '483760', '1669344', '4', '12', '0', '0'),
(90, '56', 'Office', 'No', '7x8_office4.png', '8', '7', '20', '24', '455042.4', '581036.4', '2211214.4', '20', '0', '0', '0'),
(91, '56', 'Office', 'Yes', '7x8_office5.png', '8', '7', '9', '10', '250017', '301560', '968451', '0', '9', '0', '0'),
(92, '63', 'Office', 'No', '7x9_office.png', '9', '7', '35', '48', '699821.63', '900266.63', '3493731.63', '35', '0', '0', '0'),
(93, '63', 'Office', 'No', '7x9_office2.png', '9', '7', '35', '48', '699821.63', '900266.63', '3493731.63', '35', '0', '0', '0'),
(94, '63', 'Office', 'No', '7x9_office3.jpg', '9', '7', '16', '16', '440088', '531720', '1717304', '0', '16', '0', '0'),
(95, '70', 'Office', 'No', '7x10_office.png', '10', '7', '40', '48', '797586.63', '1026666.63', '3990626.63', '40', '0', '0', '0'),
(96, '70', 'Office', 'No', '7x10_office2.png', '10', '7', '35', '48', '699821.63', '900266.63', '3493731.63', '35', '0', '0', '0'),
(97, '70', 'Office', 'No', '7x10_office3.jpg', '10', '7', '21', '24', '577529.4', '697796.4', '2253875.4', '0', '21', '0', '0'),
(98, '77', 'Office', 'Yes', '7x11_office.png', '11', '7', '13', '16', '358629', '433080', '1396367', '0', '13', '0', '0'),
(99, '40', 'Office', 'Yes', '8x5_office.png', '8', '5', '8', '8', '220120.17', '265936.17', '858728.17', '0', '8', '0', '0'),
(100, '64', 'Office', 'No', '8x8_office.png', '8', '8', '30', '48', '602056.63', '773866.63', '2996836.63', '30', '0', '0', '0'),
(101, '64', 'Office', 'No', '8x8_office2.png', '8', '8', '36', '48', '719374.63', '925546.63', '3593110.63', '36', '0', '0', '0'),
(102, '64', 'Office', 'No', '8x8_office3.jpg', '8', '8', '23', '24', '517835.4', '649556.4', '2353833.4', '15', '8', '0', '0'),
(103, '64', 'Office', 'Yes', '8x8_office3.png', '8', '8', '12', '16', '331476', '400200', '1289388', '2', '10', '0', '0'),
(104, '64', 'Office', 'No', '8x8_office4.jpg', '8', '8', '26', '28', '586428', '735330', '2661904', '18', '8', '0', '0'),
(105, '72', 'Office', 'No', '8x9_office.png', '9', '8', '42', '48', '836692.63', '1077226.63', '4189384.63', '42', '0', '0', '0'),
(106, '72', 'Office', 'No', '8x9_office2.png', '9', '8', '42', '48', '836692.63', '1077226.63', '4189384.63', '42', '0', '0', '0'),
(107, '80', 'Office', 'No', '8x10_office.png', '10', '8', '48', '48', '954010.63', '1228906.63', '4785658.63', '48', '0', '0', '0'),
(108, '80', 'Office', 'No', '8x10_office2.png', '10', '8', '42', '48', '836692.63', '1077226.63', '4189384.63', '42', '0', '0', '0'),
(109, '88', 'Office', 'Yes', '8x11_office.png', '11', '8', '14', '16', '385782', '465960', '1503346', '0', '14', '0', '0'),
(110, '45', 'Office', 'Yes', '9x5_office.png', '9', '5', '8', '8', '220120.17', '265936.17', '858728.17', '0', '8', '0', '0'),
(111, '72', 'Office', 'Yes', '9x8_office.png', '9', '8', '12', '16', '331476', '400200', '1289388', '0', '12', '0', '0'),
(112, '81', 'Office', 'No', '9x9_office2.png', '9', '9', '49', '53', '974088.63', '1254711.63', '4885562.63', '49', '0', '0', '0'),
(113, '81', 'Office', 'No', '9x9_office3.jpg', '9', '9', '16', '16', '440088', '531720', '1717304', '0', '16', '0', '0'),
(114, '81', 'Office', 'No', '9x9_office4.jpg', '9', '9', '36', '48', '719374.63', '925546.63', '3593110.63', '36', '0', '0', '0'),
(115, '81', 'Office', 'No', '9x9office.png', '9', '9', '42', '48', '836692.63', '1077226.63', '4189384.63', '42', '0', '0', '0'),
(116, '90', 'Office', 'No', '9x10_office.png', '10', '9', '48', '48', '954010.63', '1228906.63', '4785658.63', '48', '0', '0', '0'),
(117, '90', 'Office', 'No', '9x10_office2.png', '10', '9', '42', '48', '836692.63', '1077226.63', '4189384.63', '42', '0', '0', '0'),
(118, '99', 'Office', 'Yes', '9x11_office.png', '11', '9', '16', '16', '440088', '531720', '1717304', '0', '16', '0', '0'),
(119, '25', 'Office', 'Yes', 'u5x5_office.png', '5', '5', '4', '5', '103167', '126075', '422471', '2', '0', '2', '0'),
(120, '40', 'Office', 'Yes', 'u5x8_office2.png', '8', '5', '5', '5', '77990', '106625', '477120', '0', '0', '5', '0'),
(121, '55', 'Office', 'Yes', 'u5x11_office2.png', '11', '5', '8', '8', '250440.17', '296256.17', '889048.17', '0', '0', '8', '0'),
(122, '30', 'Office', 'Yes', 'u6x5_office2.png', '6', '5', '4', '5', '125947', '148855', '445251', '0', '0', '4', '0'),
(123, '48', 'Office', 'Yes', 'u6x8_amiel_design2.png', '8', '6', '6', '8', '188554.17', '222916.17', '667510.17', '0', '0', '6', '0'),
(124, '66', 'Office', 'Yes', 'u6x11_amiel_design2.png', '11', '6', '8', '8', '250440.17', '296256.17', '889048.17', '0', '0', '8', '0'),
(125, '35', 'Office', 'Yes', 'u7x5_amiel_design2.png', '7', '5', '4', '5', '125947', '148855', '445251', '0', '0', '4', '0'),
(126, '56', 'Office', 'Yes', 'u7x8_amiel_design2.png', '8', '7', '6', '8', '188554.17', '222916.17', '667510.17', '0', '0', '6', '0'),
(127, '77', 'Office', 'Yes', 'u7x11_amiel_design2.png', '11', '7', '9', '10', '284127', '335670', '1002561', '0', '0', '9', '0'),
(128, '40', 'Office', 'Yes', 'u8x5_amiel_design2.png', '8', '5', '5', '5', '156890', '185525', '556020', '0', '0', '5', '0'),
(129, '64', 'Office', 'Yes', 'u8x8_amiel_design2.png', '8', '8', '8', '8', '250440.17', '296256.17', '889048.17', '0', '0', '8', '0'),
(130, '88', 'Office', 'Yes', 'u8x11_amiel_design2.png', '11', '8', '10', '10', '315070', '372340', '1113330', '0', '0', '10', '0'),
(131, '45', 'Office', 'Yes', 'u9x5_amiel_design2.png', '9', '5', '6', '8', '188554.17', '222916.17', '667510.17', '0', '0', '6', '0'),
(132, '72', 'Office', 'Yes', 'u9x8_amiel_design2.png', '9', '8', '10', '10', '315070', '372340', '1113330', '0', '0', '10', '0'),
(133, '99', 'Office', 'Yes', 'u9x11_amiel_design2.png', '11', '9', '13', '16', '385119', '459570', '1422857', '2', '0', '11', '0');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `order_username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_status`, `total`, `order_username`) VALUES
(4, 'Pending', 15270, ''),
(5, 'To Ship', 5995, 'Tanchy'),
(6, 'To Receive', 10575, 'Tanchy');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `price`, `name`, `quantity`, `order_id`, `image`) VALUES
(6, 5995, 'Intel Core i5-9400 Desktop Processor 6 Cores 2. 90 GHz', 1, 4, ''),
(7, 4695, 'Intel Core I3 10100F 4C/8T 6mb UHD630 65W LGA1200\n\n', 1, 4, ''),
(8, 4580, 'Intel Core I3 10105F', 1, 4, ''),
(9, 5995, 'Intel Core i5-9400 Desktop Processor 6 Cores 2. 90 GHz', 1, 5, ''),
(10, 5995, 'Intel Core i5-9400 Desktop Processor 6 Cores 2. 90 GHz', 1, 6, '1135940.jpg'),
(11, 4580, 'Intel Core I3 10105F', 1, 6, '1143106.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(225) NOT NULL,
  `prod_category` varchar(50) NOT NULL,
  `prod_type` varchar(50) NOT NULL,
  `prod_name` varchar(225) NOT NULL,
  `prod_img` varchar(225) NOT NULL,
  `prod_desc` longtext NOT NULL,
  `prod_price` varchar(200) NOT NULL,
  `prod_url` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_category`, `prod_type`, `prod_name`, `prod_img`, `prod_desc`, `prod_price`, `prod_url`, `created_at`) VALUES
(1, 'Desktop', 'CPU', 'Intel Core i5-9400 Desktop Processor 6 Cores 2. 90 GHz', '1135940.jpg', '', '5995\r\n', 'https://pchubonline.com/product/1135940', '2023-05-19 16:24:41'),
(2, 'Desktop', 'CPU', 'Intel Core I3 10100F 4C/8T 6mb UHD630 65W LGA1200\r\n\r\n', '1143101.jpg', '', '4695\r\n', 'https://pchubonline.com/product/1143101', '2023-05-19 16:31:28'),
(3, 'Desktop', 'CPU', 'Intel Core I3 10105F', '1143106.jpg', '', '4580', 'https://pchubonline.com/product/1143106', '2023-05-19 15:32:11'),
(4, 'Desktop', 'CPU', 'Intel Core I3 13100F', '1163101.jpg', '', '7225\r\n', 'https://pchubonline.com/product/1163101', '2023-05-19 15:32:11'),
(5, 'Desktop', 'CPU', 'Intel Core I5 13400F', '1163401.jpg', '', '12650', 'https://pchubonline.com/product/1163401', '2023-05-19 15:36:18'),
(6, 'Desktop', 'CPU', 'AMD Ryzen 5 4600G', '1594600.jpg', '', '5995', 'https://pchubonline.com/product/1594600', '2023-05-19 15:36:18'),
(7, 'Desktop', 'CPU', 'AMD Ryzen 5 5600G', '1595607.jpg', '', '8500', 'https://pchubonline.com/product/1595607', '2023-05-19 15:40:49'),
(8, 'Desktop', 'CPU', 'AMD Ryzen 7 5700G', '1595705.jpg', '', '11995', 'https://pchubonline.com/product/1595705', '2023-05-19 15:40:49'),
(9, 'Desktop', 'CPU', 'AMD Ryzen 5 4500', '1594501.jpg', '', '4995\r\n', 'https://pchubonline.com/product/1594501', '2023-05-19 15:47:28'),
(10, 'Desktop', 'CPU', 'AMD Ryzen 5 5600X 6C/12T 35mb 65W AM4', '1595601.jpg', '', '9995', 'https://pchubonline.com/product/1595601', '2023-05-19 16:30:40'),
(11, 'Desktop', 'SSD', 'Kingston SSDNow A400 240GB SATA 2.5', 'kingston-a400-240gb-solid-state-drive-ssd.jpg\r\n', '', '969\r\n', 'https://easypc.com.ph/products/kingston-ssdnow-a400-solid-state-drive-240gb-sata-2-5', '2023-05-19 17:01:57'),
(12, 'Desktop', 'SSD', 'Crucial MX500 250GB 3D NAND SATA 2.5-inch SSD', '17f974777cee9b394b7f56d61c121a1f.jpg', '', '1653', 'https://easypc.com.ph/products/crucial-mx500-250gb-3d-nand-sata-2-5-inch-ssd', '2023-05-19 17:02:36'),
(13, 'Desktop', 'SSD', 'Samsung 500GB 860 EVO (MZ-76E500BW) Solid State Drive', 'samsung-860-evo-500gb-2-5.jpg', '', '3200', 'https://pcx.com.ph/shop/samsung-500gb-860-evo-mz-76e500bw-solid-state-drive/', '2023-05-19 16:49:21'),
(14, 'Desktop', 'SSD', 'Samsung SSD 870 EVO SATA III 2.5 inch - 500GB', 'SAMSUNG-SSD-870-EVO-500GB-2.5-1.jpg', '', '3795', 'https://gameone.ph/samsung-ssd-870-evo-sata-iii-2-5-inch-500gb.html', '2023-05-19 16:49:21'),
(15, 'Desktop', 'SSD', 'Western Digital 500GB WD Blue 3D NAND Internal PC SSD - SATA III 6 Gb/s, 2.5\"/7mm, Up to 560 MB/s', '81abNRpINlL._AC_SL1500_.jpg', '', '4218', 'https://www.ubuy.com.ph/product/2GWQERA-western-digital-1tb-wd-blue-3d-nand-internal-pc-ssd-sata-iii-6-gb-s-2-5-7mm-up-to-560-mb-s-wds100t2b', '2023-05-19 17:01:08'),
(16, 'Desktop', 'SSD', 'Adata 240GB Ultimate SU650 M.2 2280 SSD', '713Iu2a8tZL._AC_SL1500_.jpg', '', '2499', 'https://villman.com/Product-Detail/adata_su650_240', '2023-05-19 17:13:17'),
(17, 'Desktop', 'SSD', 'SanDisk Ultra 3D NAND 500GB Internal SSD - SATA III ', 'SDSSDH3-500G-G25-800x800.jpg', '', '4775', 'https://www.expansys.ph/sandisk-ultra-3d-ssd-25-inches-ssd-internal-hard-drive-500gb-560mb-s-read-530mb-s-write-373987/', '2023-05-19 17:13:26'),
(18, 'Desktop', 'SSD', 'Plextor PX-128S3C S3 128GB 2.5-in SATA TLC Internal Solid-State Drive', 'plextor.jpg', '', '2488', 'Plextor PX-128S3C S3 128GB 2.5-in SATA TLC Internal Solid-State Drive', '2023-05-19 17:18:09'),
(20, 'Desktop', 'SSD', 'TRANSCEND 128GB 2.5 SATA (230S) SSD', 'Transcend-230S-128GB-2-5-SATA-III-SSD-1024x1024.jpg', '', '1799', 'https://elnstore.com/products/transcend-128gb-230s-ssd', '2023-05-19 17:25:23'),
(21, 'Desktop', 'Monitor', 'Nvision N190HD 19 Inch LED Monitor', '9fea1121fe51c6570989141ef3a4bce5.jpg', '', '1999', 'https://easypc.com.ph/products/nvision-n190hd-19-inch-led-monitor', '2023-05-19 17:29:29'),
(22, 'Desktop', 'Monitor', 'Nvision N2255-B 21.5\" 75HZ IPS Monitor', 'nvision22.jpg', '', '3495', 'https://easypc.com.ph/products/nvision-n2255-b-21-5-75hz-ips-monitor?variant=42327921459371', '2023-05-20 05:22:11'),
(23, 'Desktop', 'Monitor', 'Nvision N2455 75Hz IPS Panel 23.8\" Monitor Black', 'Nvision N2455 75Hz IPS Panel 23.8 Monitor Black.jpg', '', '4295', 'https://easypc.com.ph/collections/display/products/nvision-n2455-75hz-va-panel-23-8-monitor-black-or-white?variant=42126031683755', '2023-05-20 05:22:11'),
(24, 'Desktop', 'Monitor', 'Viewplus MH-24HI 23.8 IPS 75hz Monitor', 'ViewplusMH24HI23.8IPS75hz.jpg', '', '4320', 'https://easypc.com.ph/collections/display/products/viewplus-mh-24hi-23-8-ips-75hz-monitor', '2023-05-20 05:27:04'),
(25, 'Desktop', 'Monitor', 'Acer K202HQL bi 19.5\" 60Hz LED Monitor', 'AcerK202HQLbi19.560HzLEDMonitor.jpg', '', '2895', 'https://easypc.com.ph/collections/display/products/acer-k202hql-bi-19-5-60hz-led-monitor?variant=42471773896875', '2023-05-20 05:27:04'),
(26, 'Desktop', 'Monitor', 'Orion L-G1901 19\" Plug & Play, Analog Video Signal, LED Monitor', 'd73823edf93bb913b0e7e25e4169320f.jpg', '', '3195', 'https://easypc.com.ph/products/orion-l-g1901-19-led-monitor?variant=40568113463467', '2023-05-20 05:34:00'),
(27, 'Desktop', 'Monitor', 'Orion L-CG1903 19 LED Monitor', 'OrionL-CG190319LEDMonitor.jpg', '', '3410', 'https://easypc.com.ph/collections/display/products/orion-l-cg1903-19-led-monitor', '2023-05-20 05:34:00'),
(28, 'Desktop', 'Monitor', 'BenQ GW2283 21.5\" IPS Monitor', 'BenQGW2283.jpg', '', '5495', 'https://easypc.com.ph/products/benq-gw2283-21-5-ips-monitor', '2023-05-20 05:39:37'),
(29, 'Desktop', 'Monitor', 'SpecterPro G24SL 24\" IPS 75Hz Freesync Gaming Monitor V-Stand', 'SpecterProG24SL.jpg', '', '4995', 'https://easypc.com.ph/products/specterpro-g24sl-24-ips-75hz-freesync-gaming-monitor', '2023-05-20 05:39:37'),
(30, 'Desktop', 'Monitor', 'Migen E2019 19 inch HDMI, VGA ready, 60Hz Refresh Rate Display LCD TN LED Panel Type Monitor', 'MigenE2019.jpg', '', '3240', 'https://easypc.com.ph/collections/display/products/migen-e2019-19-lcd-monitor?variant=40388626874539', '2023-05-20 06:13:37'),
(32, 'Network Devices', 'Switch', 'TP-LINK TL-SG1016D 16Port Steel Case Gigabit Switch', 'TL-SG1016D_UN_7.0_04_1499779584744l.jpg', '', '3200', 'https://pcx.com.ph/shop/tp-link-tl-sg1016d-16port-gigabit-switch-steel-case/', '2023-05-20 06:33:51'),
(33, 'Network Devices', 'Switch', 'Cisco SG95 16-Port Gigabit Desktop Switch (SG95-16-AS)', 'Cisco SG95 16-Port Gigabit Desktop Switch (SG95-16-AS).jpeg', '', '10288', 'https://villman.com/Product-Detail/Cisco_SG95-16-AS', '2023-05-20 06:33:51'),
(34, 'Network Devices', 'Switch', 'DLINK DGS-1016C 16 PORT GIGABIT SWITCH', 'DGS-1016D.jpg', '', '2700', 'https://pcx.com.ph/shop/dlink-dgs-1016c-16-port-gigabit-switch/', '2023-05-20 06:48:07'),
(35, 'Network Devices', 'Switch', 'TOTOLINK SG16-16-Port Gigabit Unmanaged Switch', 'totolinksg16.jpg', '', '3990', 'https://villman.com/Product-Detail/totolink_sg16', '2023-05-20 06:48:07'),
(36, 'Network Devices', 'Switch', 'Cisco SF95D-16 16-Port 10/100 Desktop Switch', 'ciscosf95d.jpg', '', '3488', 'https://villman.com/Product-Detail/Cisco_SF95D-16-AS', '2023-05-20 07:03:30'),
(37, 'Network Devices', 'Switch', 'D-Link DES-1016D Desktop Switch', 'dlinkdes1016d.jpg', '', '1800', 'https://villman.com/Product-Detail/Dlink_DES-1016D', '2023-05-20 07:03:30'),
(38, 'Network Devices', 'Switch', 'D-Link DGS-1100 Series Smart Managed 16-Port Gigabit Switch (DGS-1100-06)', 'DGS-1100-16.jpg', '', '8900', 'https://villman.com/Product-Detail/D-Link_DGS-1100-16', '2023-05-20 07:14:28'),
(39, 'Network Devices', 'Switch', 'Netgear JGS516, Unmanaged 16 Port Ethernet Switch', 'JGS516_Productcarousel_1_tcm148-100405.jpg', '', '12175', 'https://ph.rs-online.com/web/p/network-switches/8200277', '2023-05-20 07:26:06'),
(40, 'Network Devices', 'Switch', 'Cisco SG110-16HP 16-Port PoE Gigabit Switch', 'goc_1589721107.jpg', '', '10900', 'https://villman.com/Product-Detail/cisco_sg110-16hp-16-port-poe-gigabit-switch', '2023-05-20 07:29:25'),
(41, 'Network Devices', 'Switch', 'Cisco SG110-24, Unmanaged 24 Port Gigabit Switch With PoE', 'Cisco SG110-24, Unmanaged 24 Port Gigabit Switch With PoE.jpeg', '', '23943', 'https://ph.rs-online.com/web/p/network-switches/1613719', '2023-05-20 08:26:09'),
(42, 'Network Devices', 'Switch', 'TPLink TL SG1024DE 24 Port Gigabit Smart Switch Hub', 'TL-SG1024DE 24-Port Gigabit Easy Smart Switch.jpeg', '', '5890', 'https://easypc.com.ph/products/tplink-tl-sg1024de-24-port-gigabit-smart-switch-hub?variant=42679551918251', '2023-05-20 08:26:09'),
(43, 'Network Devices', 'Switch', 'Cisco SF90-24-AS SF90D-24 24-Port 10/100 Switch', 'Cisco-24-Port-01.jpg', '', '4799', 'https://villman.com/Product-Detail/Cisco_SF90-24-AS', '2023-05-20 09:30:41'),
(44, 'Network Devices', 'Switch', 'Cisco CBS350-24T-4G-EU MANAGED 24PORT GE', 'cbs350-24t-4g-eu-4.jpg', '', '31998\r\n', 'https://villman.com/Product-Detail/cisco_cbs350-24t-4g-eu-managed-24port-ge-', '2023-05-20 09:47:05'),
(45, 'Network Devices', 'Switch', 'Cisco SG92-24- Gigabit 24-port Compact Un-manage Switch', 'SG92-24-GIGA_25.jpg', '', '13999', 'https://villman.com/Product-Detail/Cisco_SG92-24', '2023-05-20 09:47:05'),
(46, 'Network Devices', 'Switch', 'D-Link DES-1024D/E - 24Port UTP 10/100Mbps StandAlone Switch', 'DES1024DG1Image LFront.png', '', '2270', 'https://villman.com/Product-Detail/d-link_des-1024de---24port-utp-', '2023-05-20 09:47:05'),
(47, 'Network Devices', 'Switch', 'D-Link DES-1024D 24-Port 10/100 Rackmountable Switch', 'DES-1024D-Front.png', '', '2470', 'https://villman.com/Product-Detail/Dlink_DES-1024D', '2023-05-20 09:47:05'),
(48, 'Network Devices', 'Switch', 'D-Link DES-1026G 24-Port 10/100 + 2 Gigabit 1000BASE-TX Switch', '269_des-1026g_front.png', '', '7398', 'https://villman.com/Product-Detail/Dlink_DES-1026G', '2023-05-20 09:47:05'),
(49, 'Network Devices', 'Switch', 'Linksys LGS124-AP Unmanaged 24-Port Gigabit Switch', 'Linksys24portlgs124.png', '', '11488', 'https://villman.com/Product-Detail/Linksys_LGS124-AP', '2023-05-20 10:18:21'),
(50, 'Network Devices', 'Switch', 'TOTOLINK SG24-24-Port Gigabit Unmanaged Switch', '66cfb59b79c0721853ee0ea9f7d585f3.jpg', '', '5990', 'https://villman.com/Product-Detail/totolink_sg24', '2023-05-20 10:18:21'),
(51, 'Network Devices', 'Switch', 'Dlink DGS 1210 28P, 28 Port, Gigabit, 24 X POE + 2 Uplink Ports, Sfp Combo, Switch Hub', '7882316.jpg', '', '26995', 'https://pchubonline.com/product/7882316', '2023-05-20 13:57:53'),
(52, 'Network Devices', 'Switch', 'TPLink TL SG1428PE, 28 Port, Gigabit, 24x PoE + 2x SFP Slot', '7882351.jpg', '', '13280', 'https://pchubonline.com/product/7882351', '2023-05-20 13:57:53'),
(53, 'Network Devices', 'Switch', 'Cisco SG-300-28 28-Port Gigabit Managed Switch', 'switches-sg300-28-28-port-gigabit-managed-switch.jpg', '', '19950', 'https://titinda.com/network-devices/switchs/layer-3-switchs/cisco-sg300-28-28-port-gigabit-managed-switch.html', '2023-05-20 14:05:41'),
(54, 'Network Devices', 'Switch', 'TP-LINK TL-SG2428P 28-PORT GIGABIT SMART SWITCH 24 PORT POE', 'TP-Link-TL-SG3428MP-28-port.jpg', '', '17990', 'https://dynaquestpc.com/products/tplink-tl-sg2428p-28-port-gigabit-smart-switch-24-port-poe?_pos=1&_sid=4b3136d08&_ss=r', '2023-05-20 14:05:41'),
(61, 'Desktop', 'HDD', 'Seagate Barracuda ST1000DM010 1tb 7200RPM 64MB Cache Sata Hard disk Drive', 'seagate1tb.jpg', '', '2201', 'https://easypc.com.ph/collections/hard-disk/products/seagate-1tb-st1000dm010-harddisk-drive', '2023-05-20 15:46:48'),
(62, 'Desktop', 'HDD', 'Western Digital 1tb Harddisk Drive Blue', 'westerndigital.jpg', '', '2259', 'https://easypc.com.ph/collections/hard-disk/products/western-digital-1tb-harddisk-drive-blue', '2023-05-20 15:46:48'),
(63, 'Network Devices', 'HDD', 'Western Digital 1tb Harddisk Drive Black', 'WDBlack.jpg', '', '5290', 'https://easypc.com.ph/collections/hard-disk/products/western-digital-1tb-harddisk-drive-black?variant=39922560401579', '2023-05-20 15:46:48'),
(64, 'Network Devices', 'HDD', 'HITACHI 500GB SATA DESKTOP HARD DRIVE', '81pfekZhldL.jpg', '', '1950', 'https://dynaquestpc.com/collections/desktop-3-5/products/hitachi-500gb-sata-desktop-hard-drive', '2023-05-20 15:46:48'),
(65, 'Network Devices', 'HDD', 'WESTERN DIGITAL WD CAVIAR BLUE 500GB SATA3', 'dfa0229e8e8454358f8782a256032086.jpg', '', '2070', 'https://dynaquestpc.com/collections/desktop-3-5/products/western-digital-wd-caviar-blue-500gb-sata3', '2023-05-20 15:46:48'),
(66, 'Network Devices', 'HDD', 'Seagate BarraCuda 2TB 3.5-inch Hard Drive (ST2000DM008)', '6ae825ea9dc3e6ad4bbe0302840bf9b9.jpg', '', '3000', 'https://pcx.com.ph/shop/seagate-barracuda-2-tb-3-5-inch-hard-drive-st2000dm008/', '2023-05-20 15:46:48'),
(67, 'Network Devices', 'HDD', 'Samsung Spinpoint F1 1TB (HD103UJ/SJ)', '22-152-102-04.jpg', '', '2499', 'https://villman.com/Product-Detail/Samsung_1TB_HD103UJ', '2023-05-20 15:46:48'),
(68, 'Network Devices', 'HDD', 'Samsung EcoGreen F2 1.5TB (HD154UI/UJ)', 's-l300.jpg', '', '2999', 'https://villman.com/Product-Detail/Samsung_1.5TB_HD154UI', '2023-05-20 15:46:48'),
(69, 'Network Devices', 'HDD', 'Samsung EcoGreen F3 1.5TB (HD153WI)', '99ba8ed6bec713ea1f632dd286a6fe39.jpeg', '', '2999', 'https://villman.com/Product-Detail/Samsung_1.5TB_HD153WI', '2023-05-20 15:46:48'),
(70, 'Network Devices', 'HDD', 'Seagate ST1000VX005 SkyHawk 1TB Surveillance Hard Drive', 'seagate-skyhawk-hdd-1-tb.jpg', '', '2988', 'https://villman.com/Product-Detail/Seagate_ST1000VX005', '2023-05-20 15:46:48'),
(71, 'Peripherals', 'UPS', 'APC Back-Ups BVX650I-PH', '7350_6476.jpg', '', '2420', 'https://easypc.com.ph/collections/ups-avr/products/apc-back-ups-bvx650i-ph-360-watts-650va-with-avr-universal-sockets-ups', '2023-05-20 16:30:27'),
(72, 'Peripherals', 'UPS', 'APC Back-Ups BVX700LUI-MS', '6477.jpg', '', '2795', 'https://easypc.com.ph/collections/ups-avr/products/apc-back-ups-bvx700lui-ms-360-watts-700va-with-avr-8hrs-of-recharge-time-1-2m-cord-length-sleek-design-cold-start-capable-universal-sockets-ups?variant=41183083790507', '2023-05-20 16:30:27'),
(73, 'Peripherals', 'UPS', 'SECURE 2000VA UPS', 'SECURE-2000VA-UPS-BLACK-3.jpg', '', '4550', 'https://pcx.com.ph/shop/secure-2000va-ups-black/', '2023-05-20 16:30:27'),
(74, 'Peripherals', 'UPS', 'SECURE 4000VA UPS', 'secure-4000va.jpg', '', '6750', 'https://pcx.com.ph/shop/secure-4000va-ups-black/', '2023-05-20 16:30:27'),
(75, 'Peripherals', 'UPS', 'Alpha Pro Ups 1200va', 'alpha-pro-ups.jpg', '', '3350', 'https://easypc.com.ph/collections/ups-avr/products/alpha-pro-ups-1200va?variant=39923955499179', '2023-05-20 16:30:27'),
(76, 'Peripherals', 'UPS', 'Ablerex GR650 650va 360 watts with AVR 4 Sockets', 'ablerexgr650va.jpg', '', '1990', 'https://easypc.com.ph/collections/ups-avr/products/ablerex-gr650-650va-360-watts-with-avr-4-sockets-ups?variant=42568952610987', '2023-05-20 16:30:27'),
(77, 'Peripherals', 'UPS', 'AWP WISE AID1000 1000VA / 600W UPS', 'sg-11134201-22120-7kaw663zkwkvd4.jpg', '', '2200', 'https://dynaquestpc.com/products/awp-wise-aid1000-1000va-600w-ups?_pos=6&_sid=3d34a4f9e&_ss=r', '2023-05-20 16:30:27'),
(78, 'Peripherals', 'UPS', 'INTEX IT-1500VA UPS', 'IT-1500VA-1.jpg', '', '3200', 'https://dynaquestpc.com/products/intex-it-1500va?_pos=4&_sid=3d34a4f9e&_ss=r', '2023-05-20 16:30:27'),
(79, 'Peripherals', 'UPS', 'Prolink 850va UPS, AVR, Pn: PRO851SFCU', '61iV7UAeKiS._AC_UF1000,1000_QL80_.jpg', '', '3425', 'https://pchubonline.com/product/7711101', '2023-05-20 16:30:27'),
(80, 'Peripherals', 'UPS', 'CyberPower 600va | 360w, UPS, Pn: BU600E', '1PE-C000116-01G_FT_01_WS_B.png', '', '1575', 'https://pchubonline.com/product/7711142', '2023-05-20 16:30:27'),
(81, 'Peripherals', 'Case', 'Keytech Honeycomb Micro ATX', 'honeycombmicroatx.jpg', '', '522', 'https://easypc.com.ph/collections/pc-case/products/keytech-honeycomb-micro-atx-pc-case', '2023-05-20 16:54:21'),
(82, 'Peripherals', 'Case', 'FORTRESS CARBIDE CASING WITH 700W PSU MICRO ATX', 'fortresscarbide700w.jpg', '', '1130', 'https://dynaquestpc.com/collections/chassis-mid-tower/products/fortress-carbide-casing-with-700w-psu-atx-microatx', '2023-05-20 16:54:21'),
(83, 'Peripherals', 'Case', 'POWERLOGIC M173-3BB MATX CASING WITH 700W PSU', 'sg-11134201-22100-cykulcw7z6iv92.jpg', '', '1580', 'https://dynaquestpc.com/collections/chassis-mid-tower/products/powerlogic-m173-3bb-casing-with-700w-psu', '2023-05-20 16:54:21'),
(84, 'Peripherals', 'Case', 'Neutron 2815 Mini Atx Case Red', 'neutron2815.jpg', '', '1025', 'https://easypc.com.ph/collections/pc-case/products/neutron-2815-mini-atx-case-red-with-powersupply-2x-usb-2-0-ear-and-headphone-jack-2x-ssd-pc-case-mini-atx-case?variant=38077988241579', '2023-05-20 16:54:21'),
(85, 'Peripherals', 'Case', 'Trigon TBA-MO2 Micro Atx PC Case', 'trigon700.jpg', '', '969', 'https://easypc.com.ph/collections/pc-case/products/trigon-tba-mo2-micro-atx-pc-case-with-700watts-psu?variant=33038948007999', '2023-05-20 16:54:21'),
(86, 'Peripherals', 'Case', 'Deep Cool DC Wave V2, Black, MATX', '7258572.jpg', '', '1380', 'https://pchubonline.com/product/7258572', '2023-05-20 16:54:21'),
(87, 'Peripherals', 'Case', 'Deep Cool DC Smarter, Black, MATX', '7258571.jpg', '', '1475', 'https://pchubonline.com/product/7258571', '2023-05-20 16:54:21'),
(88, 'Peripherals', 'Case', 'Frontier Trendsonic Ceres CE27M 700W Entry Micro ATX', 'frontierceres.jpg\r\n', '', '1199', 'https://villman.com/Product-Detail/frontier_trendsonic-ceres-ce27m-700w-entry-micro-atx', '2023-05-20 16:54:21'),
(89, 'Peripherals', 'Case', 'Frontier Trendsonic FC-F52AS with 700W Power Supply Mesh Type Mid Tower ATX', 'frontierfc.jpg', '', '1499', 'https://villman.com/Product-Detail/frontier_fc_f52as', '2023-05-20 16:54:21'),
(90, 'Peripherals', 'Case', 'InPlay Meteor 01 Mid Tower Tempered Glass', 'inplaymeteor.jpg', '', '894', 'https://easypc.com.ph/products/inplay-meteor-01-mid-tower-gaming-case-black?variant=33055077072959', '2023-05-20 16:54:21'),
(91, 'Furniture', 'Chair', 'Fantech OC-A258 Office Chair Black', 'fantech.jpg', '', '4488', 'https://easypc.com.ph/collections/chair/products/fantech-oc-a258-office-chair-black', '2023-05-20 17:08:11'),
(92, 'Furniture', 'Chair', 'OFFICE MESH CHAIR RSN-158-CB', '158cb.jpg', '', '2700', 'https://dynaquestpc.com/collections/office-furniture/products/office-mesh-chair-rsn-158-cb', '2023-05-20 17:08:11'),
(93, 'Furniture', 'Chair', 'OFFICE MESH CHAIR RSN-198-CB', '198cbs.jpg', '', '3300', 'https://dynaquestpc.com/collections/office-furniture/products/office-mesh-chair-rsn-198-cb', '2023-05-20 17:21:54'),
(94, 'Furniture', 'Chair', 'Octagon Jgy 020G Office Chair', '', '', '2895', 'https://www.allhome.com.ph/octagon-jgy-020g-office-chair-clerical-chair.html', '2023-05-20 17:21:54'),
(95, 'Furniture', 'Chair', 'Oraville Ec 2122 Office Chair', '', '', '3095', 'https://www.allhome.com.ph/oraville-ec-2122-office-chair.html', '2023-05-20 17:21:54'),
(96, 'Furniture', 'Chair', 'Our Home Acer Office Chair', 'acerofficechair.jpg', '', '2447', 'https://www.ourhome.ph/collections/desk-chairs/products/our-home-acer-office-chair#', '2023-05-20 17:21:54'),
(97, 'Furniture', 'Chair', '3058 Office Chair', '3058-OFFICE-CHAIR.jpg', '', '1500', 'https://www.furnituremanila.com.ph/product/3058-office-chair/', '2023-05-20 17:21:54'),
(98, 'Furniture', 'Chair', 'EC10 Office Chair', 'JIT-FC30.jpg', '', '1999', 'https://www.furnituremanila.com.ph/product/fc30-office-chair/', '2023-05-20 17:21:54'),
(99, 'Furniture', 'Chair', 'FC30 Office Chair', '', '', '', '', '2023-05-20 17:21:54'),
(100, 'Furniture', 'Chair', 'DC20 Office Chair', 'JIT-EC20-gray.jpg', '', '1899', 'https://www.furnituremanila.com.ph/product/fc30-office-chair/', '2023-05-20 17:21:54'),
(101, 'Furniture', 'Table', 'TOFF-012 Office Table with Drawers', 'PhotoGrid_Plus_1623123435362-510x510.jpg', '', '5400', 'https://trishtine.com.ph/product/toff-012-office-table-with-drawers/', '2023-05-21 01:23:27'),
(102, 'Furniture', 'Table', 'TOFF-004 Office Table with Drawers', 'PhotoGrid_Plus_1623123263107-510x510.jpg', '', '2400', 'https://trishtine.com.ph/product/toff-004-office-table-with-drawers/', '2023-05-21 01:23:27'),
(103, 'Furniture', 'Table', 'TOFF-005 Office Table with Drawers', 'PhotoGrid_Plus_1623123290454-510x510.jpg', '', '3300', 'https://trishtine.com.ph/product/toff-005-office-table-with-drawers/', '2023-05-21 01:23:27'),
(104, 'Furniture', 'Table', 'TOFF-002 Office Table with Drawers\r\n', 'PhotoGrid_Plus_1623123183190-510x510.jpg', '', '5100', 'https://trishtine.com.ph/product/toff-002-office-table-with-drawers/', '2023-05-21 01:23:27'),
(105, 'Furniture', 'Table', 'TOFF-014 Office Table with Drawers\r\n', 'PhotoGrid_Plus_1623123472727-510x510.jpg', '', '19850', 'https://trishtine.com.ph/product/toff-014-office-table-with-drawers/', '2023-05-21 01:23:27'),
(106, 'Furniture', 'Table', 'TOFF-028 Office Table with Drawers', 'PhotoGrid_Plus_1623227726831-510x510.jpg', '', '10200', 'https://trishtine.com.ph/product/toff-028-office-table-with-drawers/', '2023-05-21 01:23:27'),
(107, 'Furniture', 'Table', 'TOFF-019 Office Table with Drawers', 'PhotoGrid_Plus_1623227491844-510x510.jpg', '', '8800', 'https://trishtine.com.ph/product/toff-019-office-table-with-drawers/', '2023-05-21 01:23:27'),
(108, 'Furniture', 'Table', 'TOFF-013 Office Table with Drawers\r\n', 'PhotoGrid_Plus_1623123454694-510x510.jpg', '', '14200', 'https://trishtine.com.ph/product/toff-013-office-table-with-drawers/', '2023-05-21 01:23:27'),
(109, 'Furniture', 'Table', 'TOFF-003 Office Table with Drawers', 'PhotoGrid_Plus_1623123227838-510x510.jpg', '', '5650', 'https://trishtine.com.ph/product/toff-003-office-table-with-drawers/', '2023-05-21 01:23:27'),
(110, 'Furniture', 'Table', 'TOFF-007 Office Table with Drawers', 'PhotoGrid_Plus_1623123360524-510x510.jpg', '', '4500', 'https://trishtine.com.ph/product/toff-007-office-table-with-drawers/', '2023-05-21 01:23:27'),
(111, 'Furniture', 'Table', 'T93 Working Desk', 'lshape1.jpg', '', '3850', 'https://www.furnituremanila.com.ph/product/t93-working-desk/', '2023-05-21 01:45:29'),
(112, 'Furniture', 'Table', '2091 Office Table', '2091.jpg', '', '3500', 'https://www.furnituremanila.com.ph/product/2091-office-table/', '2023-05-21 01:45:29'),
(113, 'Furniture', 'Table', '4120 L-Shape Office Table', '4120.jpg', '', '8750', 'https://www.furnituremanila.com.ph/product/4120-l-shape-office-table/', '2023-05-21 01:45:29'),
(114, 'Furniture', 'Table', '41-45 Working Desk', 'ME4145-OFFICE-TABLE-WHITE-1-1.jpg', '', '8950', 'https://www.furnituremanila.com.ph/product/41-45-working-desk/', '2023-05-21 01:45:29'),
(115, 'Furniture', 'Table', 'NT2005 Table', 'n145.jpg', '', '7700', 'https://www.furnituremanila.com.ph/product/nt2005-table/', '2023-05-21 01:45:29'),
(116, 'Furniture', 'Table', 'San Francisco L-Shaped Table', 'sanfrancisco.jpg', '', '8950', 'https://www.furnituremanila.com.ph/product/san-francisco-l-shape-table/', '2023-05-21 01:45:29'),
(117, 'Furniture', 'Table', '1908B Table', '1908B.jpg', '', '5500', 'https://www.furnituremanila.com.ph/product/1908b-table/', '2023-05-21 01:45:29'),
(118, 'Furniture', 'Table', 'RM09 Desk', 'RM09DESK.jpg', '', '5200', 'https://www.furnituremanila.com.ph/product/rm09-desk/', '2023-05-21 01:45:29'),
(119, 'Furniture', 'Table', 'TXT-004 Steel L-shape Executive Table\r\n', 'PhotoGrid_Plus_1622776611102.jpg', '', '18800', 'https://trishtine.com.ph/product/txt-004-steel-l-shape-executive-table/', '2023-05-21 01:45:29'),
(120, 'Furniture', 'Table', 'TXT-016 Basic L-type Executive Table', 'txt016.jpg', '', '8400', 'https://trishtine.com.ph/product/txt-016-basic-l-type-executive-table/', '2023-05-21 01:45:29'),
(121, 'Peripherals', 'Mouse and Keyboard', 'A4Tech KRS-8572 Usb Keyboard and Mouse Black', 'a4techkrs8572.jpg', '', '490', 'https://easypc.com.ph/collections/keyboard-and-mouse/products/a4tech-krs-8572-usb-keyboard-and-mouse', '2023-05-21 02:11:54'),
(122, 'Peripherals', 'Mouse and Keyboard', 'Rapoo NX1600 Wired Optical Keyboard & Mouse', 'rapoo_nx1600-4.jpg', '', '495', 'https://villman.com/Product-Detail/rapoo_nx1600-wired-optical-keyboard--mouse', '2023-05-21 02:11:54'),
(123, 'Peripherals', 'Mouse and Keyboard', 'Logitech MK120 Wired Mouse and Keyboard', 'mk120-gallery.png', '', '795', 'https://villman.com/Product-Detail/Logitech_MK120', '2023-05-21 02:11:54'),
(124, 'Peripherals', 'Mouse and Keyboard', 'Lenovo 300 USB Combo Keyboard & Mouse (GX30M39606)', '51FE2zAf23L._AC_SY450_.jpg', '', '995', 'https://villman.com/Product-Detail/lenovo_gx30m39606', '2023-05-21 02:11:54'),
(125, 'Peripherals', 'Mouse and Keyboard', 'Rapoo X120 PRO Wired Optical Keyboard & Mouse', 'rapoo-x120-pro-keyboard-combo-_nk1800_n200_-black-1.jpeg', '', '495', 'https://villman.com/Product-Detail/rapoo_x120-pro-wired-optical-keyboard--mouse-', '2023-05-21 02:11:54'),
(126, 'Peripherals', 'Mouse and Keyboard', 'HP KM100 USB Keyboard and Mouse', '61Hl8qO5UpL.jpg', '', '388', 'https://easypc.com.ph/collections/keyboard-and-mouse/products/hp-km100-usb-keyboard-and-mouse', '2023-05-21 02:11:54'),
(127, 'Peripherals', 'Mouse and Keyboard', 'Rapoo X1800 Wireless Keyboard and Mouse Combo (Black)', 'dLQAwhb.jpg', '', '895', 'https://villman.com/Product-Detail/Rapoo_X1800', '2023-05-21 02:11:54'),
(128, 'Peripherals', 'Mouse and Keyboard', '[Km Combo] A4tech Styler FG1112, Black, Compact Wireless Desktop, Keyboard + Mouse', '7443230.jpg', '', '775', 'https://pchubonline.com/product/7443230', '2023-05-21 02:11:54'),
(129, 'Peripherals', 'Mouse and Keyboard', 'LOGITECH MK200 COMBO KEYBOARD + OPTICAL MOUSE 920-002693', '41764cXrOxL.jpg', '', '750', 'https://dynaquestpc.com/collections/mouse-keyboard-combo/products/logitech-mk200-combo-keyboard-optical-mouse', '2023-05-21 02:11:54'),
(130, 'Peripherals', 'Mouse and Keyboard', 'LOGITECH MK120 CORDED USB DESKTOP COMBO 920-002586', '106121.jpg', '', '620', 'https://dynaquestpc.com/collections/mouse-keyboard-combo/products/logitech-mk120-corded-desktop-combo', '2023-05-21 02:11:54'),
(131, 'Desktop', 'Bundle', 'DESKTOP | Minimum', 'honeycombmicroatx.jpg', '', '20005', '', '2023-05-24 07:57:35'),
(132, 'Desktop', 'Bundle', 'DESKTOP | Average', 'honeycombmicroatx.jpg', '', '31129', '', '2023-05-24 07:59:55'),
(133, 'Desktop', 'Bundle', 'DESKTOP | High - End', 'imac-mini.jpg', '', '79990', '', '2023-05-24 05:35:03'),
(134, 'Desktop', 'Monitor', '24\" LG Ultragear 24GN60R-B LED IPS 144hz FreeSync 1080p HDMI DP, Vesa', 'LG Ultragear 24GN60R-B.jpg', '', '10625', 'https://pchubonline.com/product/6011015', '2023-05-24 08:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_brand` varchar(50) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `product_category` varchar(25) NOT NULL,
  `product_type` varchar(40) NOT NULL,
  `product_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_code`, `product_name`, `product_brand`, `product_price`, `product_img`, `product_category`, `product_type`, `product_url`) VALUES
(1, 'PRFE', 'Standard Table (100x60x75)', 'Homemallph', 'Php 3,700.00', '', 'PC Furniture', 'Table', 'https://www.facebook.com/homemallph/photos/5921240877958544'),
(2, 'PFRE', 'Ofix 250-OF (120x60) Desk (Maple)', 'Ofix', 'Php 6,999.00', '', 'PC Furniture', 'Table', 'https://www.facebook.com/ofix.phofficial/photos/1256930348566988'),
(3, 'PRFE', 'Korean-120H High Back Chair (BLACK)', 'Ofix', 'Php 2,999.00', '', 'PC Furniture', 'Chair', 'https://www.facebook.com/ofix.phofficial/photos/1279238033002886'),
(4, 'PRFE', 'XTM Premium A99 XL Ergonomic Office Chair (4D Armrest) (Black, Grey, Red) (2 Years Warranty)', 'Ofix', 'Php 14,999.00', '', 'PC Furniture', 'Chair', 'https://www.facebook.com/ofix.phofficial/photos/1291229801803709'),
(6, 'DKTP', 'Mac mini', 'Apple', 'Php 38,990.00', '', 'Desktop', 'CPU', 'https://www.apple.com/ph/shop/buy-mac/mac-mini/apple-m2-chip-with-8-core-cpu-and-10-core-gpu-256gb'),
(7, 'DKTP', '24Ã¢â‚¬â€˜inch iMac with Apple M1 chip', 'Apple', 'Php 79,990.00\r\n', '', 'Desktop (Bundle)', 'Computer', 'https://www.apple.com/ph/shop/buy-mac/imac/blue-24-inch-8-core-cpu-7-core-gpu-8gb-memory-256gb'),
(8, 'NDVS', 'LS1005G 5-Port 10/100/1000Mbps Desktop Switch', 'tp-link', 'Php 525.00', '', 'Network Devices', 'Network Switch', 'https://www.tp-link.com/ph/home-networking/soho-switch/ls1005g/'),
(9, 'NDVS', 'Tl-SG108 8-Port 10/100/1000Mbps Desktop Switch', 'tp-link', 'Php 1,246.17', '', 'Network Devices', 'Network Switch', 'https://www.tp-link.com/us/home-networking/8-port-switch/tl-sg108/'),
(10, 'NDVS', 'TP-Link TL-SG1210P 10-Port Gigabit Desktop Switch with 8-Port PoE+', 'tp-link', 'Php 3,990.00', '', 'Network Devices', 'Network Switch', 'https://shopee.ph/product/6562415/9183907719?is_from_login=true'),
(11, 'NDVS', 'TL-SG1016D\r\n16-Port Gigabit Desktop/Rackmount Switch', 'tp-link', 'Php 3,990.00', '', 'Network Devices', 'Network Switch', 'https://www.tp-link.com/ph/home-networking/soho-switch/tl-sg1016d/'),
(12, 'NDVS', 'TL-SG1024DE 24-Port Gigabit Easy Smart Switch', 'tp-link', 'Php 5,666.40', '', 'Network Devices', 'Network Switch', 'https://www.amazon.com/TP-LINK-TL-SG1024DE-24-Port-Gigabit-Switch/dp/B00CUG8ESM'),
(13, 'NDVS', 'TL-SG1428PE 28-Port Gigabit Easy Smart Switch with 24-Port PoE+', 'tp-link', 'Php 15,600.00', '', 'Network Devices', 'Network Switch', 'https://shopee.ph/TP-Link-TL-SG1428PE-28-Port-Gigabit-Easy-Smart-Switch-with-24-Port-PoE--i.117867014.21432164411?sp_atk=31a0c8d4-e612-466d-a7ad-a6509914350a&xptdk=31a0c8d4-e612-466d-a7ad-a6509914350a'),
(14, 'NDVS', 'TL-SG1048 48-Port Gigabit Rackmount Switch', 'tp-link', 'Php 13,816.63', '', 'Network Devices', 'Network Switch', 'https://www.tp-link.com/us/business-networking/unmanaged-switch/tl-sg1048/'),
(15, 'NDVS', 'Cisco SG110D-05, Unmanaged 5 Port Gigabit Switch', 'Cisco', 'Php 5,581.29', '', 'Network Devices', 'Network Switch', 'https://ph.rs-online.com/web/p/network-switches/1613722'),
(16, 'NDVS', 'Cisco SG110D-8, Unmanaged 8 Port Gigabit Switch', 'Cisco', 'Php 5,970.49', '', 'Network Devices', 'Network Switch', 'https://ph.rs-online.com/web/p/network-switches/1613726'),
(17, 'NDVS', 'Cisco SG95 16-Port Gigabit Desktop Switch (SG95-16-AS)', 'Cisco', 'Php 7,750.00', '', 'Network Devices', 'Network Switch', 'https://shop.ibahn.net.ph/products/cisco-sg95-16-port-gigabit-desktop-switch-sg95-16-as?variant=41486698086598&currency=PHP'),
(18, 'NDVS', 'Cisco SG110-24, Unmanaged 24 Port Gigabit Switch With PoE\r\n', 'Cisco', 'Php 23,943.90', '', 'Network Devices', 'Network Switch', 'https://ph.rs-online.com/web/p/network-switches/1613719'),
(19, 'NDVS', 'Cisco SG350-28SFP 28-Port', 'Cisco', 'Php 49,420.49 ', '', 'Network Devices', 'Network Switch', 'https://www.tradeinn.com/techinn/en/cisco-sg350-28sfp-28-port/137819090/p?id_producte=11860304&country=ph&srsltid=AR57-fAvn20ww1SrksQS9cjPNkbBU4iRgghDBlsMhZzBXMj_3Bx4Vm9T_PI');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_number` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_number`, `user_name`, `user_email`, `user_password`) VALUES
(3, 'AOCD-4920', 'Lems', 'lems@mail.com', 'adcd7048512e64b48da55b027577886ee5a36350');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion1`
--
ALTER TABLE `discussion1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion2`
--
ALTER TABLE `discussion2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion3`
--
ALTER TABLE `discussion3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discussion4`
--
ALTER TABLE `discussion4`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `netlayout`
--
ALTER TABLE `netlayout`
  ADD PRIMARY KEY (`net_layout_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `discussion1`
--
ALTER TABLE `discussion1`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `discussion2`
--
ALTER TABLE `discussion2`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discussion3`
--
ALTER TABLE `discussion3`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `discussion4`
--
ALTER TABLE `discussion4`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `netlayout`
--
ALTER TABLE `netlayout`
  MODIFY `net_layout_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
