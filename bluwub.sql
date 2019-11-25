-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2019 at 05:28 PM
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
  `healthUpdateTime` date NOT NULL,
  `blob` int(11) NOT NULL,
  `part1` int(11) DEFAULT NULL,
  `part2` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ownerId` (`ownerId`),
  KEY `blob` (`blob`),
  KEY `part1` (`part1`),
  KEY `part2` (`part2`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parts`
--

DROP TABLE IF EXISTS `parts`;
CREATE TABLE IF NOT EXISTS `parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `damage` int(11) NOT NULL,
  `defense` int(11) NOT NULL,
  `regen` int(11) NOT NULL,
  `attackSpeed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
