-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 12:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_comment`
--

DROP TABLE IF EXISTS `user_comment`;
CREATE TABLE `user_comment` (
  `id` int(255) NOT NULL,
  `f_id` int(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_comment`
--

INSERT INTO `user_comment` (`id`, `f_id`, `comment`, `fname`) VALUES
(5, 18, 're12', '1655337762'),
(9, 23, 're12', '1655337762'),
(11, 18, 'adfaasdfdfa', '1655337904'),
(12, 23, 're12', '1655337762'),
(14, 23, 're12', '1655337762'),
(15, 23, 're12', '1655337762'),
(16, 18, 're12', '1655337762'),
(17, 18, 're12', '1655337762'),
(18, 18, 're12', '1655337762'),
(19, 26, 're12', '1655337762'),
(20, 18, 're12', '1655337762'),
(21, 18, 'vbnv', 'SCHEDULE.docx'),
(22, 18, 'afsdfas', 'E&P Doc-Presentation template.docx'),
(23, 18, '<script>alert(\"hello\")</script>', 'SCHEDULE1.pdf'),
(24, 18, '<script>alert(\"hellow\")</script>', 'book.docx');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

DROP TABLE IF EXISTS `user_form`;
CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `status` int(255) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`, `status`) VALUES
(18, 'Yonatan', 'yonatanawoke@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'user', 0),
(19, 'kevin', 'kevin@gmail.com', '1e48c4420b7073bc11916c6c1de226bb', 'admin', 0),
(23, 'eyob', 'eyob@gmail.com', '502e4a16930e414107ee22b6198c578f', 'user', 1),
(26, 'bruck', 'biruk@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_comment`
--
ALTER TABLE `user_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `f_id` (`f_id`) USING BTREE;

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_comment`
--
ALTER TABLE `user_comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_comment`
--
ALTER TABLE `user_comment`
  ADD CONSTRAINT `f_id` FOREIGN KEY (`f_id`) REFERENCES `user_form` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
