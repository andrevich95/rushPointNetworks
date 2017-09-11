-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2017 at 01:17 PM
-- Server version: 5.7.18-0ubuntu0.17.04.1
-- PHP Version: 7.0.15-1ubuntu4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `networks`
--

-- --------------------------------------------------------

--
-- Table structure for table `cable`
--

CREATE TABLE `cable` (
  `id` int(11) NOT NULL,
  `point_in_id` int(11) NOT NULL,
  `point_out_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `description` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cable`
--

INSERT INTO `cable` (`id`, `point_in_id`, `point_out_id`, `type`, `description`) VALUES
(1, 1, 2, 2, 'Кабель между двумя точками'),
(2, 2, 3, 1, NULL),
(3, 3, 4, 1, NULL),
(4, 4, 5, 1, NULL),
(5, 5, 6, 1, NULL),
(6, 6, 7, 1, NULL),
(7, 7, 8, 1, NULL),
(8, 8, 9, 1, NULL),
(9, 9, 10, 1, NULL),
(10, 10, 11, 1, NULL),
(11, 11, 12, 1, NULL),
(12, 12, 13, 1, NULL),
(13, 13, 14, 1, NULL),
(14, 14, 15, 1, NULL),
(15, 15, 16, 1, NULL),
(16, 17, 18, 1, NULL),
(17, 18, 19, 1, NULL),
(18, 19, 20, 1, NULL),
(19, 20, 21, 1, NULL),
(20, 21, 22, 1, NULL),
(21, 22, 23, 1, NULL),
(22, 23, 24, 1, NULL),
(23, 24, 25, 1, NULL),
(24, 25, 26, 1, NULL),
(25, 26, 27, 1, NULL),
(26, 27, 28, 1, NULL),
(27, 28, 29, 1, NULL),
(28, 29, 30, 1, NULL),
(29, 30, 31, 1, NULL),
(30, 31, 32, 1, NULL),
(31, 32, 33, 1, NULL),
(32, 33, 34, 1, NULL),
(33, 35, 36, 1, NULL),
(34, 36, 37, 1, NULL),
(35, 37, 38, 1, NULL),
(36, 38, 39, 1, NULL),
(37, 39, 40, 1, NULL),
(38, 40, 41, 1, NULL),
(39, 41, 42, 1, NULL),
(40, 42, 43, 1, NULL),
(41, 43, 44, 1, NULL),
(42, 44, 45, 1, NULL),
(43, 45, 46, 1, NULL),
(44, 46, 47, 1, NULL),
(45, 47, 48, 1, NULL),
(46, 48, 49, 1, NULL),
(47, 49, 50, 1, NULL),
(48, 50, 51, 1, NULL),
(49, 51, 52, 1, NULL),
(50, 52, 53, 1, NULL),
(51, 53, 54, 1, NULL),
(52, 54, 55, 1, NULL),
(53, 55, 56, 1, NULL),
(54, 56, 57, 1, NULL),
(55, 57, 58, 1, NULL),
(56, 58, 59, 1, NULL),
(57, 59, 60, 1, NULL),
(58, 60, 61, 1, NULL),
(59, 61, 62, 1, NULL),
(60, 62, 63, 1, NULL),
(61, 63, 64, 1, NULL),
(62, 64, 65, 1, NULL),
(63, 65, 66, 1, NULL),
(64, 67, 68, 1, NULL),
(65, 68, 69, 1, NULL),
(66, 69, 70, 1, NULL),
(67, 70, 71, 1, NULL),
(68, 71, 72, 1, NULL),
(69, 72, 73, 1, NULL),
(70, 73, 74, 1, NULL),
(71, 74, 75, 1, NULL),
(72, 75, 76, 1, NULL),
(73, 76, 77, 1, NULL),
(74, 77, 78, 1, NULL),
(75, 78, 79, 1, NULL),
(76, 79, 80, 1, NULL),
(77, 80, 81, 1, NULL),
(78, 81, 82, 1, NULL),
(79, 82, 83, 1, NULL),
(80, 83, 84, 1, NULL),
(81, 84, 85, 1, NULL),
(82, 85, 86, 1, NULL),
(83, 87, 88, 1, NULL),
(84, 88, 89, 1, NULL),
(85, 89, 90, 1, NULL),
(86, 90, 91, 1, NULL),
(87, 91, 92, 1, NULL),
(88, 92, 93, 1, NULL),
(89, 93, 94, 1, NULL),
(90, 94, 95, 1, NULL),
(91, 95, 96, 1, NULL),
(92, 96, 97, 1, NULL),
(93, 97, 98, 1, NULL),
(94, 98, 99, 1, NULL),
(95, 99, 100, 1, NULL),
(96, 100, 101, 1, NULL),
(97, 101, 102, 1, NULL),
(98, 102, 103, 1, NULL),
(99, 103, 104, 1, NULL),
(100, 104, 105, 1, NULL),
(101, 105, 106, 1, NULL),
(102, 106, 107, 1, NULL),
(103, 107, 108, 1, NULL),
(104, 108, 109, 1, NULL),
(105, 109, 110, 1, NULL),
(106, 110, 111, 1, NULL),
(107, 111, 112, 1, NULL),
(108, 112, 113, 1, NULL),
(109, 113, 114, 1, NULL),
(110, 114, 115, 1, NULL),
(111, 115, 116, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cable_type`
--

CREATE TABLE `cable_type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `characteristics` text CHARACTER SET utf8 COLLATE utf8_bin,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cable_type`
--

INSERT INTO `cable_type` (`id`, `name`, `characteristics`, `description`) VALUES
(1, 'Коаксиальный кабель', NULL, NULL),
(2, 'Витая пара', NULL, NULL),
(3, 'Оптоволокно', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

CREATE TABLE `conductor` (
  `id` int(11) NOT NULL,
  `cable_id` int(11) NOT NULL,
  `color` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `conductor_in_id` int(11) NOT NULL,
  `conductor_out_id` int(11) NOT NULL,
  `module_color` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `cable_id` int(11) NOT NULL,
  `color` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `point`
--

CREATE TABLE `point` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '1',
  `atitude` float NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `coordinate_x` float NOT NULL,
  `coordinate_y` float NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `point`
--

INSERT INTO `point` (`id`, `position`, `route_id`, `type`, `atitude`, `latitude`, `longitude`, `coordinate_x`, `coordinate_y`, `description`) VALUES
(1, 0, 1, 2, 0, 48.0169, 37.8418, 5321040, 7413600, 'Первая точка маршрута'),
(2, 1, 1, 1, 0, 48.0168, 37.8413, 5321040, 7413560, NULL),
(3, 2, 1, 1, 0, 48.0165, 37.8413, 5321000, 7413560, NULL),
(4, 3, 1, 1, 0, 48.0164, 37.8444, 5321000, 7413790, NULL),
(5, 4, 1, 1, 0, 48.0165, 37.845, 5321000, 7413830, NULL),
(6, 5, 1, 1, 0, 48.0163, 37.845, 5320980, 7413830, NULL),
(7, 6, 1, 1, 0, 48.0163, 37.8456, 5320980, 7413880, NULL),
(8, 7, 1, 1, 0, 48.0164, 37.8499, 5320980, 7414200, NULL),
(9, 8, 1, 1, 0, 48.0165, 37.8519, 5320990, 7414350, NULL),
(10, 9, 1, 1, 0, 48.0165, 37.8537, 5321000, 7414490, NULL),
(11, 10, 1, 1, 0, 48.0163, 37.854, 5320970, 7414510, NULL),
(12, 11, 1, 1, 0, 48.0164, 37.8548, 5320980, 7414560, NULL),
(13, 12, 1, 1, 0, 48.0167, 37.8549, 5321010, 7414570, NULL),
(14, 13, 1, 1, 0, 48.0168, 37.8588, 5321020, 7414860, NULL),
(15, 14, 1, 1, 0, 48.0168, 37.8613, 5321020, 7415050, NULL),
(16, 15, 1, 1, 0, 48.0171, 37.8613, 5321050, 7415050, NULL),
(17, 0, 2, 1, 0, 48.017, 37.8613, 5321040, 7415050, NULL),
(18, 1, 2, 1, 0, 48.0168, 37.8613, 5321020, 7415050, NULL),
(19, 2, 2, 1, 0, 48.0169, 37.8653, 5321020, 7415350, NULL),
(20, 3, 2, 1, 0, 48.0188, 37.8651, 5321230, 7415340, NULL),
(21, 4, 2, 1, 0, 48.0221, 37.8647, 5321600, 7415320, NULL),
(22, 5, 2, 1, 0, 48.0244, 37.8645, 5321860, 7415300, NULL),
(23, 6, 2, 1, 0, 48.0288, 37.864, 5322350, 7415270, NULL),
(24, 7, 2, 1, 0, 48.0304, 37.8638, 5322530, 7415260, NULL),
(25, 8, 2, 1, 0, 48.0351, 37.8632, 5323050, 7415230, NULL),
(26, 9, 2, 1, 0, 48.0359, 37.8638, 5323140, 7415270, NULL),
(27, 10, 2, 1, 0, 48.0361, 37.8637, 5323160, 7415260, NULL),
(28, 11, 2, 1, 0, 48.0371, 37.8645, 5323270, 7415320, NULL),
(29, 12, 2, 1, 0, 48.0379, 37.8651, 5323350, 7415370, NULL),
(30, 13, 2, 1, 0, 48.0389, 37.8658, 5323470, 7415430, NULL),
(31, 14, 2, 1, 0, 48.0392, 37.8661, 5323510, 7415450, NULL),
(32, 15, 2, 1, 0, 48.0399, 37.8666, 5323580, 7415480, NULL),
(33, 16, 2, 1, 0, 48.0401, 37.866, 5323600, 7415440, NULL),
(34, 17, 2, 1, 0, 48.0397, 37.8656, 5323560, 7415410, NULL),
(35, 0, 3, 1, 0, 47.9946, 37.8057, 5318610, 7410860, NULL),
(36, 1, 3, 1, 0, 47.9946, 37.8059, 5318610, 7410880, NULL),
(37, 2, 3, 1, 0, 47.9957, 37.8059, 5318730, 7410880, NULL),
(38, 3, 3, 1, 0, 47.9957, 37.8083, 5318730, 7411060, NULL),
(39, 4, 3, 1, 0, 47.9999, 37.8083, 5319190, 7411070, NULL),
(40, 5, 3, 1, 0, 48.0019, 37.8083, 5319420, 7411070, NULL),
(41, 6, 3, 1, 0, 48.0019, 37.812, 5319420, 7411350, NULL),
(42, 7, 3, 1, 0, 48.0041, 37.812, 5319660, 7411350, NULL),
(43, 8, 3, 1, 0, 48.0087, 37.812, 5320170, 7411360, NULL),
(44, 9, 3, 1, 0, 48.0089, 37.8183, 5320180, 7411830, NULL),
(45, 10, 3, 1, 0, 48.009, 37.8197, 5320200, 7411930, NULL),
(46, 11, 3, 1, 0, 48.009, 37.8228, 5320190, 7412160, NULL),
(47, 12, 3, 1, 0, 48.0088, 37.8244, 5320170, 7412290, NULL),
(48, 13, 3, 1, 0, 48.0089, 37.8265, 5320180, 7412440, NULL),
(49, 14, 3, 1, 0, 48.0081, 37.8265, 5320080, 7412440, NULL),
(50, 15, 3, 1, 0, 48.0081, 37.827, 5320080, 7412470, NULL),
(51, 16, 3, 1, 0, 48.0068, 37.8271, 5319950, 7412480, NULL),
(52, 17, 3, 1, 0, 48.0068, 37.8296, 5319940, 7412670, NULL),
(53, 18, 3, 1, 0, 48.0069, 37.832, 5319950, 7412850, NULL),
(54, 19, 3, 1, 0, 48.007, 37.8349, 5319950, 7413060, NULL),
(55, 20, 3, 1, 0, 48.007, 37.8406, 5319950, 7413490, NULL),
(56, 21, 3, 1, 0, 48.0072, 37.8405, 5319970, 7413480, NULL),
(57, 22, 3, 1, 0, 48.0072, 37.8408, 5319970, 7413500, NULL),
(58, 23, 3, 1, 0, 48.0092, 37.8406, 5320190, 7413490, NULL),
(59, 24, 3, 1, 0, 48.011, 37.8405, 5320400, 7413490, NULL),
(60, 25, 3, 1, 0, 48.0111, 37.8402, 5320400, 7413470, NULL),
(61, 26, 3, 1, 0, 48.0136, 37.8401, 5320690, 7413460, NULL),
(62, 27, 3, 1, 0, 48.0159, 37.8399, 5320940, 7413460, NULL),
(63, 28, 3, 1, 0, 48.0165, 37.8398, 5321000, 7413450, NULL),
(64, 29, 3, 1, 0, 48.0165, 37.8413, 5321000, 7413560, NULL),
(65, 30, 3, 1, 0, 48.0168, 37.8413, 5321040, 7413560, NULL),
(66, 31, 3, 1, 0, 48.0169, 37.8418, 5321040, 7413600, NULL),
(67, 0, 4, 1, 0, 48.0169, 37.8653, 5321020, 7415350, NULL),
(68, 1, 4, 1, 0, 48.0137, 37.8655, 5320670, 7415360, NULL),
(69, 2, 4, 1, 0, 48.01, 37.8657, 5320250, 7415360, NULL),
(70, 3, 4, 1, 0, 48.0099, 37.8634, 5320250, 7415190, NULL),
(71, 4, 4, 1, 0, 48.0099, 37.8601, 5320250, 7414950, NULL),
(72, 5, 4, 1, 0, 48.0078, 37.8602, 5320020, 7414960, NULL),
(73, 6, 4, 1, 0, 48.0076, 37.8599, 5320000, 7414930, NULL),
(74, 7, 4, 1, 0, 48.0031, 37.8601, 5319490, 7414940, NULL),
(75, 8, 4, 1, 0, 48.0029, 37.8587, 5319470, 7414830, NULL),
(76, 9, 4, 1, 0, 48.0025, 37.8587, 5319430, 7414840, NULL),
(77, 10, 4, 1, 0, 48.0024, 37.8542, 5319430, 7414500, NULL),
(78, 11, 4, 1, 0, 48.0024, 37.8508, 5319420, 7414250, NULL),
(79, 12, 4, 1, 0, 48.0023, 37.8482, 5319420, 7414050, NULL),
(80, 13, 4, 1, 0, 48.0023, 37.8454, 5319420, 7413840, NULL),
(81, 14, 4, 1, 0, 48.0022, 37.8416, 5319410, 7413560, NULL),
(82, 15, 4, 1, 0, 48.0023, 37.8413, 5319430, 7413530, NULL),
(83, 16, 4, 1, 0, 48.0023, 37.8407, 5319420, 7413490, NULL),
(84, 17, 4, 1, 0, 48.0022, 37.8402, 5319410, 7413450, NULL),
(85, 18, 4, 1, 0, 48.0016, 37.8402, 5319350, 7413450, NULL),
(86, 19, 4, 1, 0, 48.0016, 37.841, 5319350, 7413510, NULL),
(87, 0, 5, 1, 0, 48.0016, 37.841, 5319350, 7413510, NULL),
(88, 1, 5, 1, 0, 48.0016, 37.8403, 5319350, 7413460, NULL),
(89, 2, 5, 1, 0, 48.0016, 37.8395, 5319350, 7413400, NULL),
(90, 3, 5, 1, 0, 47.9989, 37.8396, 5319050, 7413400, NULL),
(91, 4, 5, 1, 0, 47.9984, 37.8403, 5318990, 7413460, NULL),
(92, 5, 5, 1, 0, 47.9981, 37.8402, 5318960, 7413450, NULL),
(93, 6, 5, 1, 0, 47.9975, 37.8399, 5318890, 7413420, NULL),
(94, 7, 5, 1, 0, 47.9961, 37.8381, 5318740, 7413290, NULL),
(95, 8, 5, 1, 0, 47.9947, 37.8361, 5318590, 7413140, NULL),
(96, 9, 5, 1, 0, 47.9948, 37.8345, 5318600, 7413010, NULL),
(97, 10, 5, 1, 0, 47.9948, 37.8332, 5318600, 7412920, NULL),
(98, 11, 5, 1, 0, 47.9939, 37.8332, 5318500, 7412910, NULL),
(99, 12, 5, 1, 0, 47.9939, 37.8318, 5318500, 7412810, NULL),
(100, 13, 5, 1, 0, 47.9939, 37.8299, 5318500, 7412670, NULL),
(101, 14, 5, 1, 0, 47.9938, 37.8268, 5318500, 7412440, NULL),
(102, 15, 5, 1, 0, 47.9938, 37.8248, 5318500, 7412290, NULL),
(103, 16, 5, 1, 0, 47.9935, 37.8247, 5318470, 7412280, NULL),
(104, 17, 5, 1, 0, 47.9917, 37.8248, 5318270, 7412280, NULL),
(105, 18, 5, 1, 0, 47.9913, 37.8247, 5318230, 7412280, NULL),
(106, 19, 5, 1, 0, 47.9912, 37.8207, 5318220, 7411980, NULL),
(107, 20, 5, 1, 0, 47.9913, 37.8179, 5318230, 7411770, NULL),
(108, 21, 5, 1, 0, 47.9912, 37.8146, 5318220, 7411520, NULL),
(109, 22, 5, 1, 0, 47.9913, 37.8121, 5318240, 7411330, NULL),
(110, 23, 5, 1, 0, 47.9938, 37.812, 5318520, 7411330, NULL),
(111, 24, 5, 1, 0, 47.9939, 37.813, 5318520, 7411410, NULL),
(112, 25, 5, 1, 0, 47.9957, 37.813, 5318730, 7411410, NULL),
(113, 26, 5, 1, 0, 47.9957, 37.8082, 5318730, 7411050, NULL),
(114, 27, 5, 1, 0, 47.9956, 37.8059, 5318730, 7410880, NULL),
(115, 28, 5, 1, 0, 47.9946, 37.8059, 5318610, 7410880, NULL),
(116, 29, 5, 1, 0, 47.9946, 37.8057, 5318610, 7410860, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `description`) VALUES
(1, 'Atlant', 'Проект номер 1');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `project_id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `name`, `project_id`, `description`) VALUES
(1, 'M44-U', 1, 'Трасса проложена между Донецком и Запорожьем'),
(2, 'U-G1', 1, NULL),
(3, 'P60-M44', 1, NULL),
(4, 'IL89-M34', 1, NULL),
(5, 'P60-I89', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_point`
--

CREATE TABLE `type_point` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `characteristics` text CHARACTER SET utf8 COLLATE utf8_bin,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_point`
--

INSERT INTO `type_point` (`id`, `name`, `characteristics`, `description`) VALUES
(1, 'Обычная точка', NULL, NULL),
(2, 'Муфта', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cable`
--
ALTER TABLE `cable`
  ADD PRIMARY KEY (`id`),
  ADD KEY `point_in_id` (`point_in_id`),
  ADD KEY `point_out_id` (`point_out_id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `cable_type`
--
ALTER TABLE `cable_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cable_id` (`cable_id`),
  ADD KEY `conductor_in_id` (`conductor_in_id`),
  ADD KEY `conductor_out_id` (`conductor_out_id`),
  ADD KEY `module_color` (`module_color`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`,`cable_id`),
  ADD KEY `cable_id` (`cable_id`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id`,`position`),
  ADD KEY `type` (`type`),
  ADD KEY `route_id` (`route_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `type_point`
--
ALTER TABLE `type_point`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cable`
--
ALTER TABLE `cable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `cable_type`
--
ALTER TABLE `cable_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `conductor`
--
ALTER TABLE `conductor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `point`
--
ALTER TABLE `point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `type_point`
--
ALTER TABLE `type_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cable`
--
ALTER TABLE `cable`
  ADD CONSTRAINT `cable_ibfk_1` FOREIGN KEY (`point_in_id`) REFERENCES `point` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cable_ibfk_2` FOREIGN KEY (`point_out_id`) REFERENCES `point` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cable_ibfk_3` FOREIGN KEY (`type`) REFERENCES `cable_type` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `conductor`
--
ALTER TABLE `conductor`
  ADD CONSTRAINT `conductor_ibfk_1` FOREIGN KEY (`cable_id`) REFERENCES `cable` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `conductor_ibfk_2` FOREIGN KEY (`conductor_in_id`) REFERENCES `conductor` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `conductor_ibfk_3` FOREIGN KEY (`conductor_out_id`) REFERENCES `conductor` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `conductor_ibfk_4` FOREIGN KEY (`module_color`) REFERENCES `module` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`cable_id`) REFERENCES `cable` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `point`
--
ALTER TABLE `point`
  ADD CONSTRAINT `point_ibfk_1` FOREIGN KEY (`type`) REFERENCES `type_point` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `point_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `route` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `route`
--
ALTER TABLE `route`
  ADD CONSTRAINT `route_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `project` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
