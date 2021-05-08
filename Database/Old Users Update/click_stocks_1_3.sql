-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2019 at 02:08 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clickstock`
--

-- --------------------------------------------------------

--
-- Table structure for table `adsettings`
--

CREATE TABLE `adsettings` (
  `id` int(10) UNSIGNED NOT NULL,
  `Embedd_code` varchar(191) NOT NULL,
  `image_flag` tinyint(1) NOT NULL,
  `catagory_flag` tinyint(1) NOT NULL,
  `home_flag` tinyint(1) NOT NULL,
  `search_flag` tinyint(1) NOT NULL,
  `issearch` tinyint(1) NOT NULL,
  `iscat` tinyint(1) NOT NULL,
  `ishome` tinyint(1) NOT NULL,
  `isimage` tinyint(1) NOT NULL,
  `adhomecode` mediumtext NOT NULL,
  `adimage` mediumtext NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_At` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(500) NOT NULL,
  `video` varchar(500) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `stick` tinyint(1) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `details` mediumtext NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adsettings`
--
ALTER TABLE `adsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adsettings`
--
ALTER TABLE `adsettings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
