-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2022 at 07:18 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shinimark`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`id`, `username`, `email`, `password`) VALUES
(1, 'ShiniGami2004', 'hindsbhk@gmail.com', '$2y$10$wz1l0GwbwqyU1Bn3.rxQ9eu7Q9Q4FATGrqADHqEuXT6AC5vmN8rJu');

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE `bookmarks` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL DEFAULT 1,
  `current` varchar(225) NOT NULL DEFAULT '0',
  `latest` varchar(225) NOT NULL DEFAULT '1',
  `status_id` int(11) NOT NULL DEFAULT 1,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(225) NOT NULL,
  `restriction` int(11) NOT NULL DEFAULT 0,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `restriction`, `create_time`, `update_time`) VALUES
(1, 'Manga', 0, '2022-10-24 23:14:03', '2022-10-24 23:14:03'),
(2, 'Manhwa', 0, '2022-10-24 23:14:21', '2022-10-24 23:14:21'),
(3, 'Manhua', 0, '2022-10-24 23:14:32', '2022-10-24 23:14:32'),
(4, 'Hentai', 1, '2022-10-24 23:14:42', '2022-10-24 23:14:42'),
(5, 'Pornhwa', 1, '2022-10-24 23:14:57', '2022-10-24 23:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  `description` varchar(225) DEFAULT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`, `description`, `create_time`) VALUES
(1, 'Ongoing', 'Ongoing Titles', '2022-10-24 23:15:49'),
(2, 'Completed', 'Completed Titles', '2022-10-24 23:16:11'),
(3, 'Season End', 'Waiting for the next season', '2022-10-24 23:16:38'),
(4, 'Axed', 'Axed or Canceled Titles', '2022-10-24 23:17:01');

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `url` varchar(225) NOT NULL,
  `restriction` int(11) NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `update_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `USER` (`username`),
  ADD UNIQUE KEY `EMAIL` (`email`);

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_constraint` (`category_id`),
  ADD KEY `status_constraint` (`status_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `CATEGORY` (`category`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `WEBSITE` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD CONSTRAINT `category_constraint` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `status_constraint` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
