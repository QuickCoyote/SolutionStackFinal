-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2019 at 09:25 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bluwub`
--

-- --------------------------------------------------------

--
-- Table structure for table `bluwubs`
--

DROP TABLE IF EXISTS `bluwubs`;
CREATE TABLE IF NOT EXISTS `bluwubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerId` int(11) DEFAULT NULL,
  `maxHealth` int(11) NOT NULL,
  `currentHealth` int(11) NOT NULL,
  `healthUpdateTime` datetime NOT NULL,
  `blob` int(11) NOT NULL,
  `part1` int(11) DEFAULT NULL,
  `part2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  KEY `blob` (`blob`),
  KEY `part1` (`part1`),
  KEY `part2` (`part2`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bluwubs`
--

INSERT INTO `bluwubs` (`id`, `ownerId`, `maxHealth`, `currentHealth`, `healthUpdateTime`, `blob`, `part1`, `part2`) VALUES
(1, 1, 500, 500, '2019-12-02 21:20:55', 1, NULL, NULL),
(29, NULL, 477, 477, '2019-12-02 17:08:20', 3, NULL, NULL),
(30, 40, 434, 434, '2019-12-02 21:19:54', 6, NULL, NULL),
(31, NULL, 327, 327, '2019-12-02 17:08:20', 1, NULL, NULL),
(32, 40, 412, 412, '2019-12-02 21:19:54', 1, NULL, NULL),
(33, NULL, 214, 214, '2019-12-02 17:08:20', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

DROP TABLE IF EXISTS `parts`;
CREATE TABLE IF NOT EXISTS `parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `image` varchar(128) NOT NULL,
  `damage` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `regen` int(11) NOT NULL,
  `attackSpeed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `type`, `name`, `image`, `damage`, `defense`, `regen`, `attackSpeed`) VALUES
(1, 'blob', 'blob', 'ff0000', 50, 50, 100, 20),
(2, 'blob', 'blob', '29b417', 98, 22, 1, 17),
(3, 'blob', 'blob', '81e3a4', 19, 20, 2, 12),
(4, 'blob', 'blob', '7ed170', 98, 4, 4, 18),
(5, 'blob', 'blob', '748e67', 16, 77, 4, 14),
(6, 'blob', 'blob', '104465', 28, 45, 8, 8),
(111, 'part', 'cool boots', 'cool boots.png', 36, 66, 1, 32),
(112, 'part', 'amulet', 'amulet.png', 69, 31, 6, 12),
(113, 'part', 'shield', 'shield.png', 24, 30, 2, 17),
(114, 'part', 'amulet', 'amulet.png', 79, 14, 10, 15),
(115, 'part', 'shield', 'shield.png', 72, 28, 2, 9),
(116, 'part', 'amulet', 'amulet.png', 97, 28, 0, 5),
(117, 'part', 'cool boots', 'cool boots.png', 42, 86, 1, 26),
(118, 'part', 'armor', 'armor.png', 27, 62, 5, 19),
(119, 'part', 'amulet', 'amulet.png', 59, 6, 4, 14),
(120, 'part', 'claws', 'claws.png', 48, 59, 9, 7),
(121, 'part', 'amulet', 'amulet.png', 81, 29, 10, 7),
(122, 'part', 'shield', 'shield.png', 44, 14, 4, 18),
(123, 'part', 'cool boots', 'cool boots.png', 49, 8, 1, 14),
(124, 'part', 'amulet', 'amulet.png', 54, 1, 20, 13),
(125, 'part', 'armor', 'armor.png', 43, 24, 2, 10),
(126, 'part', 'amulet', 'amulet.png', 81, 48, 4, 16),
(127, 'part', 'shield', 'shield.png', 10, 64, 1, 15),
(128, 'part', 'cool boots', 'cool boots.png', 24, 16, 4, 34),
(129, 'part', 'amulet', 'amulet.png', 100, 40, 18, 13),
(130, 'part', 'cool boots', 'cool boots.png', 39, 76, 0, 20),
(131, 'part', 'shield', 'shield.png', 44, 182, 4, 13),
(132, 'part', 'jaws', 'jaws.png', 70, 40, 4, 5),
(133, 'part', 'claws', 'claws.png', 36, 47, 1, 9),
(134, 'part', 'jaws', 'jaws.png', 194, 77, 1, 5),
(135, 'part', 'shield', 'shield.png', 91, 12, 3, 5),
(136, 'part', 'shield', 'shield.png', 48, 54, 4, 17),
(137, 'part', 'claws', 'claws.png', 62, 57, 2, 4),
(138, 'part', 'claws', 'claws.png', 154, 81, 2, 7),
(139, 'part', 'shield', 'shield.png', 24, 114, 5, 5),
(140, 'part', 'amulet', 'amulet.png', 22, 37, 20, 20),
(141, 'part', 'armor', 'armor.png', 68, 10, 1, 5),
(142, 'part', 'armor', 'armor.png', 51, 20, 2, 11),
(143, 'part', 'cool boots', 'cool boots.png', 11, 76, 10, 20),
(144, 'part', 'cool boots', 'cool boots.png', 45, 47, 9, 12),
(145, 'part', 'cool boots', 'cool boots.png', 13, 27, 0, 26),
(146, 'part', 'cool boots', 'cool boots.png', 32, 70, 6, 22),
(147, 'part', 'amulet', 'amulet.png', 92, 7, 16, 12),
(148, 'part', 'cool boots', 'cool boots.png', 20, 73, 10, 10),
(149, 'part', 'amulet', 'amulet.png', 89, 18, 8, 20),
(150, 'part', 'cool boots', 'cool boots.png', 16, 21, 9, 24),
(151, 'part', 'claws', 'claws.png', 148, 79, 8, 10),
(152, 'part', 'jaws', 'jaws.png', 92, 68, 0, 9),
(153, 'part', 'amulet', 'amulet.png', 29, 25, 16, 18),
(154, 'part', 'amulet', 'amulet.png', 60, 15, 12, 10),
(155, 'part', 'armor', 'armor.png', 46, 80, 2, 11),
(156, 'part', 'amulet', 'amulet.png', 57, 5, 18, 10),
(157, 'part', 'armor', 'armor.png', 15, 68, 1, 12),
(158, 'part', 'shield', 'shield.png', 84, 200, 2, 16),
(159, 'part', 'shield', 'shield.png', 41, 138, 2, 19),
(160, 'part', 'cool boots', 'cool boots.png', 24, 69, 1, 22),
(161, 'part', 'jaws', 'jaws.png', 182, 40, 5, 5),
(162, 'part', 'armor', 'armor.png', 15, 184, 2, 5),
(163, 'part', 'cool boots', 'cool boots.png', 11, 69, 10, 24),
(164, 'part', 'claws', 'claws.png', 74, 62, 3, 8),
(165, 'part', 'claws', 'claws.png', 128, 53, 4, 5),
(166, 'part', 'armor', 'armor.png', 18, 120, 4, 13),
(167, 'part', 'amulet', 'amulet.png', 50, 40, 14, 6),
(168, 'part', 'armor', 'armor.png', 87, 134, 3, 5),
(169, 'part', 'shield', 'shield.png', 44, 72, 4, 7),
(170, 'part', 'jaws', 'jaws.png', 30, 29, 5, 5),
(171, 'part', 'cool boots', 'cool boots.png', 11, 64, 8, 12),
(172, 'part', 'amulet', 'amulet.png', 69, 17, 14, 7),
(173, 'part', 'cool boots', 'cool boots.png', 30, 89, 7, 18),
(174, 'part', 'shield', 'shield.png', 72, 16, 3, 12),
(175, 'part', 'armor', 'armor.png', 67, 168, 0, 17),
(176, 'part', 'amulet', 'amulet.png', 99, 22, 8, 12),
(177, 'part', 'cool boots', 'cool boots.png', 32, 70, 9, 40),
(178, 'part', 'cool boots', 'cool boots.png', 37, 23, 2, 12),
(179, 'part', 'cool boots', 'cool boots.png', 45, 34, 5, 28),
(180, 'part', 'amulet', 'amulet.png', 91, 49, 14, 19),
(181, 'part', 'shield', 'shield.png', 25, 44, 3, 12),
(182, 'part', 'amulet', 'amulet.png', 40, 1, 8, 20),
(183, 'part', 'shield', 'shield.png', 30, 56, 0, 14),
(184, 'part', 'shield', 'shield.png', 99, 150, 4, 6),
(185, 'part', 'jaws', 'jaws.png', 120, 66, 10, 9),
(186, 'part', 'jaws', 'jaws.png', 28, 87, 4, 3),
(187, 'part', 'cool boots', 'cool boots.png', 38, 11, 8, 38),
(188, 'part', 'jaws', 'jaws.png', 152, 27, 2, 7),
(189, 'part', 'jaws', 'jaws.png', 78, 56, 5, 10),
(190, 'part', 'amulet', 'amulet.png', 75, 32, 0, 6),
(191, 'part', 'cool boots', 'cool boots.png', 9, 45, 3, 16),
(192, 'part', 'jaws', 'jaws.png', 154, 61, 0, 3),
(193, 'part', 'cool boots', 'cool boots.png', 8, 25, 7, 40),
(194, 'part', 'claws', 'claws.png', 200, 5, 5, 10),
(195, 'part', 'jaws', 'jaws.png', 188, 95, 3, 8),
(196, 'part', 'amulet', 'amulet.png', 88, 44, 20, 8),
(197, 'part', 'claws', 'claws.png', 54, 71, 2, 4),
(198, 'part', 'amulet', 'amulet.png', 50, 11, 10, 20),
(199, 'part', 'armor', 'armor.png', 12, 128, 1, 10),
(200, 'part', 'cool boots', 'cool boots.png', 19, 99, 4, 18),
(201, 'part', 'amulet', 'amulet.png', 38, 25, 2, 5),
(202, 'part', 'amulet', 'amulet.png', 56, 3, 10, 17),
(203, 'part', 'claws', 'claws.png', 108, 16, 8, 8),
(204, 'part', 'jaws', 'jaws.png', 78, 60, 9, 4),
(205, 'part', 'amulet', 'amulet.png', 45, 31, 4, 6),
(206, 'part', 'cool boots', 'cool boots.png', 44, 97, 4, 28),
(207, 'part', 'cool boots', 'cool boots.png', 27, 57, 1, 32),
(208, 'part', 'jaws', 'jaws.png', 48, 61, 1, 7),
(209, 'part', 'amulet', 'amulet.png', 84, 35, 2, 17),
(210, 'part', 'shield', 'shield.png', 65, 72, 1, 8),
(241, 'blob', 'blob', 'dbba2c', 12, 76, 7, 13),
(242, 'blob', 'blob', '489674', 84, 31, 1, 12),
(243, 'blob', 'blob', 'e8e934', 44, 45, 3, 18),
(244, 'blob', 'blob', '7f0405', 40, 76, 2, 19),
(245, 'blob', 'blob', '8ed968', 94, 93, 5, 18),
(246, 'blob', 'blob', '794b3f', 79, 8, 3, 6),
(247, 'blob', 'blob', '609d3e', 53, 85, 2, 17),
(248, 'blob', 'blob', 'bce1c3', 90, 77, 10, 6),
(249, 'blob', 'blob', '1cf8ba', 74, 76, 2, 12),
(250, 'blob', 'blob', '20b5ac', 77, 43, 5, 5),
(251, 'blob', 'blob', '1e677d', 105, 89, 7, 9),
(252, 'blob', 'blob', 'b7c543', 40, 91, 8, 15),
(253, 'blob', 'blob', '0ca6f1', 63, 39, 6, 10),
(254, 'blob', 'blob', 'd5c5be', 46, 12, 7, 9),
(255, 'blob', 'blob', '3e5e38', 82, 25, 4, 11),
(256, 'blob', 'blob', 'ea0a87', 26, 66, 3, 11),
(257, 'blob', 'blob', '6d5207', 94, 33, 6, 7),
(258, 'blob', 'blob', 'cababb', 45, 8, 4, 15),
(259, 'blob', 'blob', 'fe5174', 89, 102, 7, 19),
(260, 'blob', 'blob', '09e9bd', 69, 5, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `uwuserparts`
--

DROP TABLE IF EXISTS `uwuserparts`;
CREATE TABLE IF NOT EXISTS `uwuserparts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ownerId` int(11) NOT NULL,
  `partId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  KEY `partId` (`partId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uwusers`
--

DROP TABLE IF EXISTS `uwusers`;
CREATE TABLE IF NOT EXISTS `uwusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uwuserName` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `bluwub1` int(11) NOT NULL,
  `bluwub2` int(11) DEFAULT NULL,
  `bluwub3` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uwuserName` (`uwuserName`),
  UNIQUE KEY `bluwub1` (`bluwub1`),
  UNIQUE KEY `bluwub2` (`bluwub2`),
  UNIQUE KEY `bluwub3` (`bluwub3`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uwusers`
--

INSERT INTO `uwusers` (`id`, `uwuserName`, `password`, `bluwub1`, `bluwub2`, `bluwub3`) VALUES
(1, 'Kali', 'Linux', 1, NULL, NULL),
(40, 'Dev', 'Testing', 32, 30, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bluwubs`
--
ALTER TABLE `bluwubs`
  ADD CONSTRAINT `bluwubs_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `uwusers` (`id`),
  ADD CONSTRAINT `bluwubs_ibfk_4` FOREIGN KEY (`blob`) REFERENCES `parts` (`id`),
  ADD CONSTRAINT `bluwubs_ibfk_5` FOREIGN KEY (`part2`) REFERENCES `parts` (`id`),
  ADD CONSTRAINT `bluwubs_ibfk_6` FOREIGN KEY (`part1`) REFERENCES `parts` (`id`);

--
-- Constraints for table `uwuserparts`
--
ALTER TABLE `uwuserparts`
  ADD CONSTRAINT `uwuserparts_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `uwusers` (`id`),
  ADD CONSTRAINT `uwuserparts_ibfk_2` FOREIGN KEY (`partId`) REFERENCES `parts` (`id`);

--
-- Constraints for table `uwusers`
--
ALTER TABLE `uwusers`
  ADD CONSTRAINT `uwusers_ibfk_1` FOREIGN KEY (`bluwub1`) REFERENCES `bluwubs` (`id`),
  ADD CONSTRAINT `uwusers_ibfk_2` FOREIGN KEY (`bluwub2`) REFERENCES `bluwubs` (`id`),
  ADD CONSTRAINT `uwusers_ibfk_3` FOREIGN KEY (`bluwub3`) REFERENCES `bluwubs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
