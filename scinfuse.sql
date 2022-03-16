-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2022 at 03:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scinfuse`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_group`
--

CREATE TABLE `chat_group` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `code` varchar(250) NOT NULL,
  `leader` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_group`
--

INSERT INTO `chat_group` (`id`, `name`, `status`, `code`, `leader`, `created_at`) VALUES
(3, 'Sample', 'public', 'BkC-o52d-EhB', 10, '2022-03-15 01:33:25');

-- --------------------------------------------------------

--
-- Table structure for table `chat_group_member`
--

CREATE TABLE `chat_group_member` (
  `id` int(11) NOT NULL,
  `chat_group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `position` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_group_member`
--

INSERT INTO `chat_group_member` (`id`, `chat_group_id`, `member_id`, `position`, `created_at`) VALUES
(18, 3, 11, 'member', '2022-03-15 05:56:13');

-- --------------------------------------------------------

--
-- Table structure for table `chat_group_message`
--

CREATE TABLE `chat_group_message` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_group_message`
--

INSERT INTO `chat_group_message` (`id`, `group_id`, `member_id`, `message`) VALUES
(1, 3, 10, 'sample'),
(2, 3, 11, 'HELLO');

-- --------------------------------------------------------

--
-- Table structure for table `chat_individual`
--

CREATE TABLE `chat_individual` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `message` varchar(250) NOT NULL,
  `to_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_individual`
--

INSERT INTO `chat_individual` (`id`, `from_id`, `message`, `to_id`, `created_at`) VALUES
(1, 10, 'hi', 11, '2022-03-14 03:54:04'),
(2, 10, 'happy', 11, '2022-03-14 05:14:21'),
(3, 11, 'hi din', 10, '2022-03-14 05:29:18'),
(4, 11, 'kamuzta', 10, '2022-03-14 05:29:23'),
(5, 10, 'ayus lang naman', 11, '2022-03-14 05:29:33'),
(6, 13, 'Hello my friend', 11, '2022-03-14 22:53:48'),
(7, 13, 'hi, kamuzta?', 10, '2022-03-14 22:54:01'),
(8, 10, 'ayus lang naman', 13, '2022-03-14 22:54:11'),
(9, 10, 'Sample', 3, '2022-03-15 02:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `created_at`) VALUES
(10, 'Ersel Metz', 'Magbanua', 'magbanuaersel@gmail.com', '$2y$10$jwpc07RvtebE2dPSnjeZ3eaNJ3quxYnPdNCb1zs.uJ12q6TTTPyYO', '2022-03-14 00:46:22'),
(11, 'Ace', 'Mhy', 'mhyace6@gmail.com', '$2y$10$MmnVAx/AC2LtvLs6wZjCQecIB4BREIg/ImT24fh8yze1eT2TAB.j6', '2022-03-14 00:47:28'),
(13, 'Dummy', 'Acc', 'dummy@gmail.com', '$2y$10$5cbsU6cIIrPkPW1ltcjEzuxO5getzu3irRmW83OGiFb5m2/rD2lSq', '2022-03-14 22:53:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_group`
--
ALTER TABLE `chat_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_group_member`
--
ALTER TABLE `chat_group_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_group_message`
--
ALTER TABLE `chat_group_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_individual`
--
ALTER TABLE `chat_individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_group`
--
ALTER TABLE `chat_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `chat_group_member`
--
ALTER TABLE `chat_group_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chat_group_message`
--
ALTER TABLE `chat_group_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat_individual`
--
ALTER TABLE `chat_individual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
