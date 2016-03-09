-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 09, 2016 at 12:47 AM
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
  `level` char(1) NOT NULL,
  `email` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `title`, `firstname`, `middlename`, `surname`, `dob`, `gender`, `level`, `email`, `pass`) VALUES
(1, 'Mr', 'Kevin', '', 'McAleer', '1975-05-21', 'm', 'A', 'kevinmcaleer@me.com', 'password');

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
-- Table structure for table `information`
--

CREATE TABLE IF NOT EXISTS `information` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `filepath` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `type` char(1) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `itcontacts`
--

CREATE TABLE IF NOT EXISTS `itcontacts` (
  `id` bigint(20) unsigned NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `site` varchar(250) NOT NULL,
  `area` varchar(250) NOT NULL,
  `building` varchar(250) NOT NULL,
  `business_group` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itcontacts`
--

INSERT INTO `itcontacts` (`id`, `firstname`, `lastname`, `phone`, `site`, `area`, `building`, `business_group`) VALUES
(1, 'Damien', 'Ginty', '01204', 'Bolton', 'IT', 'Main Building', 'IT'),
(2, 'Jenny', 'Ginty', '', '', '', '', '');

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

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE IF NOT EXISTS `request` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `service_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE IF NOT EXISTS `service` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `responsibilities` varchar(250) NOT NULL,
  `restrictions` varchar(250) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `name`, `description`, `responsibilities`, `restrictions`, `parent`, `image`) VALUES
(1, 'Email', 'Microsoft Outlook / Exchange', 'none', '9-5pm availability', NULL, 'img/ServicePoint.png'),
(2, 'Email', 'Microsoft Outlook / Exchange', 'none', '9-5pm availability', 0, 'img/CardUI.png'),
(3, 'File Server', 'File Sharing Service', '24/7 availability, backed up', 'file permission folder structure', 0, ''),
(4, 'Microsoft Office 2016', 'Office Productivity Software for Windows 10 and Mac OS X.', '', '', NULL, 'img/CardUI.png');

-- --------------------------------------------------------

--
-- Table structure for table `service_tag_link`
--

CREATE TABLE IF NOT EXISTS `service_tag_link` (
  `id` bigint(20) unsigned NOT NULL,
  `service_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_tag_link`
--

INSERT INTO `service_tag_link` (`id`, `service_id`, `tag_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE IF NOT EXISTS `tag` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(250) NOT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `name`, `parent`) VALUES
(1, 'File Sharing', 0),
(2, 'File Sharing', 0),
(3, 'email', 0),
(4, 'Email', NULL);

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
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `itcontacts`
--
ALTER TABLE `itcontacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `motd`
--
ALTER TABLE `motd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `service_tag_link`
--
ALTER TABLE `service_tag_link`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
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
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `itcontacts`
--
ALTER TABLE `itcontacts`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `motd`
--
ALTER TABLE `motd`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `service_tag_link`
--
ALTER TABLE `service_tag_link`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
