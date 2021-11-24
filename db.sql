-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2018 at 07:44 AM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wowah`
--
CREATE DATABASE IF NOT EXISTS `wowah` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wowah`;

-- --------------------------------------------------------

--
-- Table structure for table `auctions`
--

CREATE TABLE `auctions` (
  `auc` int(15) NOT NULL,
  `item` int(15) DEFAULT NULL,
  `owner` varchar(22) CHARACTER SET utf8 COLLATE utf8_hungarian_ci DEFAULT NULL,
  `buyout` int(15) DEFAULT NULL,
  `quantity` int(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blood`
--

CREATE TABLE `blood` (
  `id` int(12) NOT NULL,
  `item` int(20) NOT NULL,
  `marketvalue` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `quantity` int(50) NOT NULL,
  `bloodprice` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historical`
--

CREATE TABLE `historical` (
  `id` int(12) NOT NULL,
  `item` int(12) NOT NULL,
  `marketvalue` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `date` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(255) NOT NULL,
  `item` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `marketvalue`
--

CREATE TABLE `marketvalue` (
  `id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `marketvalue` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `quantity` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `realms`
--

CREATE TABLE `realms` (
  `id` int(11) NOT NULL,
  `region` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `realm` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `locale` varchar(50) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `realm` varchar(21) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auctions`
--
ALTER TABLE `auctions`
  ADD KEY `item` (`item`);

--
-- Indexes for table `blood`
--
ALTER TABLE `blood`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item`),
  ADD KEY `marketvalue` (`marketvalue`),
  ADD KEY `bloodprice` (`bloodprice`);

--
-- Indexes for table `historical`
--
ALTER TABLE `historical`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `marketvalue`
--
ALTER TABLE `marketvalue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item` (`item`);

--
-- Indexes for table `realms`
--
ALTER TABLE `realms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood`
--
ALTER TABLE `blood`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `historical`
--
ALTER TABLE `historical`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162149075;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19730;
--
-- AUTO_INCREMENT for table `marketvalue`
--
ALTER TABLE `marketvalue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12509;
--
-- AUTO_INCREMENT for table `realms`
--
ALTER TABLE `realms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1313;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16642;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
