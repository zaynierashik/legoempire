-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 08:18 PM
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
-- Database: `legoempire`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_data`
--

CREATE TABLE `admin_data` (
  `adminId` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_data`
--

INSERT INTO `admin_data` (`adminId`, `name`, `phone`, `email`, `password`) VALUES
(1, 'Admin', 9800000000, 'admin@gmail.com', '$2y$10$fsjrjrmYGS6pF4BNFpX/Guz5CZADJ.dDGwxfFr/9Pj0S64Gir5IC2');

-- --------------------------------------------------------

--
-- Table structure for table `article_data`
--

CREATE TABLE `article_data` (
  `articleId` int(11) NOT NULL,
  `title` text NOT NULL,
  `subtext` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `article_data`
--

INSERT INTO `article_data` (`articleId`, `title`, `subtext`, `description`) VALUES
(1, 'Vikings return! Why the new LEGO® Ideas Viking Village was worth the wait', 'Step into a world of Nordic legends and myths with our latest LEGO® Ideas set. Our LEGO designers tell you everything you need to know...', 'Pop culture and movies catapulted stories of Nordic adventures into the mainstream, and unbeknownst to some, this popularity of the Vikings crossed over in the LEGO® brick world too.\r\n\r\nIn fact, it wasn’t that long ago that these ocean-going Scandinavian explorers had their own range of LEGO sets. The LEGO Vikings line, released in the mid-2000s, featured a range of Vikings defending their fortresses and ships from terrifying creatures inspired by the elaborate and rich world of Nordic mythology. Ever since that line ended, there has been a distinctly Viking-shaped hole in the hearts of many LEGO fans and designers worldwide.\r\n\r\nWell, now the Vikings are back, bigger and better than ever, and to celebrate, we met the design team behind the Nordic-inspired new set.');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `userId` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`userId`, `name`, `phone`, `email`, `password`) VALUES
(1, 'User', 9800000000, 'user@gmail.com', '$2y$10$SH0GMRM7ivufmHwjytuIPe5arsqXX89T.UaT01WYZmB0J4QrMsn/C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_data`
--
ALTER TABLE `admin_data`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `article_data`
--
ALTER TABLE `article_data`
  ADD PRIMARY KEY (`articleId`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_data`
--
ALTER TABLE `admin_data`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `article_data`
--
ALTER TABLE `article_data`
  MODIFY `articleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
