-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 02, 2019 at 06:53 PM
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
(1, 1, 500, 500, '2019-12-02 18:24:08', 1, NULL, NULL),
(29, NULL, 477, 477, '2019-12-02 17:08:20', 3, NULL, NULL),
(30, 40, 434, 434, '2019-12-02 18:48:22', 6, NULL, NULL),
(31, NULL, 327, 327, '2019-12-02 17:08:20', 1, NULL, NULL),
(32, 40, 412, 412, '2019-12-02 18:48:22', 1, NULL, NULL),
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parts`
--

INSERT INTO `parts` (`id`, `type`, `name`, `image`, `damage`, `defense`, `regen`, `attackSpeed`) VALUES
(1, 'blob', 'blob', 'ff0000', 50, 50, 50, 20),
(2, 'blob', 'blob', '29b417', 98, 22, 1, 17),
(3, 'blob', 'blob', '81e3a4', 19, 20, 2, 12),
(4, 'blob', 'blob', '7ed170', 98, 4, 4, 18),
(5, 'blob', 'blob', '748e67', 16, 77, 4, 14),
(6, 'blob', 'blob', '104465', 28, 45, 8, 8);

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
