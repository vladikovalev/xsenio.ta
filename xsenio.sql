-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 05, 2019 at 05:15 PM
-- Server version: 5.5.50
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xsenio`
--
CREATE DATABASE IF NOT EXISTS `xsenio` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `xsenio`;

-- --------------------------------------------------------

--
-- Table structure for table `n54_users`
--

CREATE TABLE IF NOT EXISTS `n54_users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `authKey` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `n54_users`
--

INSERT INTO `n54_users` (`id`, `name`, `email`, `password`, `authKey`) VALUES
(1, 'vladikovalev', 'vladikovalev@gmail.com', 'test', 'hMWDE4zdrDVGQ24wvtptM1oDuAuB0Nkq'),
(2, 'ichfreumich', 'ichfreumich@mail.ru', 'test2', 'QOZJMI72TaNP2HA4jfcafO_zeF6L4YTi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `n54_users`
--
ALTER TABLE `n54_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `n54_users`
--
ALTER TABLE `n54_users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
