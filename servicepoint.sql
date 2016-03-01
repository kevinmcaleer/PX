-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 02, 2016 at 12:19 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servicepoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` bigint(20) unsigned NOT NULL,
  `title` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `gender` char(1) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `title`, `firstname`, `middlename`, `surname`, `dob`, `gender`, `level`) VALUES
(1, 'Mr', 'Kevin', '', 'McAleer', '1975-05-21', 'm', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `fortune`
--

CREATE TABLE IF NOT EXISTS `fortune` (
  `id` bigint(20) unsigned NOT NULL,
  `fortune` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fortune`
--

INSERT INTO `fortune` (`id`, `fortune`) VALUES
(1, 'Windows 10 is Awesome\r\n'),
(2, 'I''m an idiot'),
(3, 'I smell something burning');

-- --------------------------------------------------------

--
-- Table structure for table `motd`
--

CREATE TABLE IF NOT EXISTS `motd` (
  `id` bigint(20) unsigned NOT NULL,
  `message` varchar(250) NOT NULL,
  `expiry` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `motd`
--

INSERT INTO `motd` (`id`, `message`, `expiry`) VALUES
(1, 'Welcome to ServicePoint', '2016-03-31'),
(2, 'iPhones rock', '2016-03-31'),
(3, 'Apple is Awesome', '2016-03-31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `fortune`
--
ALTER TABLE `fortune`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `motd`
--
ALTER TABLE `motd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fortune`
--
ALTER TABLE `fortune`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `motd`
--
ALTER TABLE `motd`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
