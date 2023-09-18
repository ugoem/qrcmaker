-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 05:42 AM
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
-- Database: `qrcodes_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `description`) VALUES
('Administrator', 'Has all permission'),
('Client', 'Has Individual User Permission'),
('Guest', 'Has Guest level Permission'),
('Manager', 'Has Document Management Permission');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dynamic_code`
--

CREATE TABLE `tb_dynamic_code` (
  `ID` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `qrc_name` varchar(50) DEFAULT NULL,
  `options` varchar(25) DEFAULT NULL,
  `file_name` varchar(100) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `scan_count` int(11) DEFAULT NULL,
  `qrc_status` varchar(20) DEFAULT NULL,
  `gen_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_dynamic_code`
--

INSERT INTO `tb_dynamic_code` (`ID`, `type`, `qrc_name`, `options`, `file_name`, `user_id`, `scan_count`, `qrc_status`, `gen_date`, `scan_date`) VALUES
(1, 'Static', 'Developer Info', 'Text', '6505df99691eb.png', 1, NULL, 'Active', '2023-09-17 23:24:04', NULL),
(2, 'Static', 'Download Test', 'Text', '6505ead9206ad.png', 1, NULL, 'Active', '2023-09-17 23:24:04', NULL),
(3, 'Static', 'Screenshot', 'Text', '6505e295cb088.png', 1, NULL, 'Active', '2023-09-17 23:27:05', NULL),
(4, 'Static', 'QRCM URL', 'Text', '65059ba884cde.png', 1, NULL, 'Active', '2023-09-17 23:31:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phone` varchar(50) NOT NULL,
  `account_type` varchar(25) DEFAULT NULL,
  `account_status` int(11) DEFAULT NULL,
  `activation_code` varchar(25) DEFAULT NULL,
  `activation_date` varchar(20) DEFAULT NULL,
  `sent_email` int(11) DEFAULT NULL,
  `password` char(32) NOT NULL,
  `profile_picture` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `firstname`, `lastname`, `phone`, `account_type`, `account_status`, `activation_code`, `activation_date`, `sent_email`, `password`, `profile_picture`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'ue.anionovo@unizik.edu.ng', 'Ugochukwu', 'Edebeani', '07038908180', NULL, 1, NULL, '2023-09-17 21:01:20', NULL, '3a9d5b96a842807ba15d712ad7ba9a53', '7f75aa9610a6d84d6c4833a42213f73c.jpg', '2023-09-17 21:00:26', NULL),
(15, NULL, 'smartegor@abol.com', '', NULL, '91190448776', NULL, 1, '5209895', '2023-09-18 01:13:17', NULL, '3a9d5b96a842807ba15d712ad7ba9a53', NULL, '2023-09-18 00:09:28', NULL),
(16, NULL, 'ea.anazia@unizik.edu.ng', '', NULL, '08033228442', NULL, 1, '4717344', '2023-09-18 01:16:27', NULL, '3e36e1f854abbe8a57a3576a1758c2d2', NULL, '2023-09-18 00:15:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `userid` int(10) UNSIGNED NOT NULL,
  `roleid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`userid`, `roleid`) VALUES
(1, 'Administrator'),
(2, 'Manager'),
(3, 'Administrator'),
(5, 'Administrator'),
(7, 'Administrator'),
(9, 'Administrator'),
(10, 'Administrator'),
(12, 'Administrator'),
(13, 'Administrator'),
(15, 'Administrator'),
(16, 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_dynamic_code`
--
ALTER TABLE `tb_dynamic_code`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`userid`,`roleid`) USING BTREE,
  ADD UNIQUE KEY `userid` (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dynamic_code`
--
ALTER TABLE `tb_dynamic_code`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `userid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
