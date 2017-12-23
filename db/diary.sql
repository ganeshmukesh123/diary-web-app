-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2017 at 06:25 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diary`
--
CREATE DATABASE IF NOT EXISTS `diary` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `diary`;

-- --------------------------------------------------------

--
-- Table structure for table `diary_users`
--

CREATE TABLE `diary_users` (
  `user_id` int(3) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `content` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diary_users`
--

INSERT INTO `diary_users` (`user_id`, `username`, `email`, `content`, `password`) VALUES
(1, 'user4', 'user4@user4.com', 'Good morning', '711fc6ab6caaefcbd25c87304ff6df33'),
(2, 'user', 'user@user.com', 'qwertygoodmorning', '4a2ebb6db727f66763a0df08b00d671d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diary_users`
--
ALTER TABLE `diary_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diary_users`
--
ALTER TABLE `diary_users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
