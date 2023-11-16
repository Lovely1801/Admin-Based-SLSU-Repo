-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2023 at 06:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slsu_repo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `id_num` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phoneNumber` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `id_num`, `name`, `phoneNumber`, `email`, `status`, `password`, `date`) VALUES
(18, '20-11', 'Naruto Uzumaki', '0888338811', 'uzumakiNaruto@hiddenLeaf.com', 'user', '123', '2023-10-25 18:13:05'),
(20, '11-11', 'Sasuke Uchiha', '99811433', 'uchihasasuke@gmail.com', 'user', '123', '2023-10-26 06:28:03'),
(21, '21-11002', 'Sponge Bob', '992299111', 'sponge@patrick.star', 'user', 'sponge', '2023-10-26 21:57:08'),
(22, 'admin', 'Administrator', '99122', 'admin@gmail.com', 'admin', 'admin', '2023-10-27 06:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `liked` int(11) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `file_id`, `liked`, `rate`, `date`) VALUES
(19, 20, 8, 1, '4', '2023-11-10 08:46:21'),
(20, 20, 2, 0, '0', '2023-11-10 08:46:24'),
(21, 20, 4, 1, '0', '2023-11-10 08:48:52'),
(22, 21, 8, 0, '5', '2023-11-10 08:49:13'),
(23, 21, 1, 1, '3', '2023-11-10 08:50:41'),
(24, 21, 2, 1, '0', '2023-11-10 08:50:51'),
(25, 21, 4, 0, '0', '2023-11-10 08:50:56'),
(26, 20, 1, 1, '5', '2023-11-10 12:49:26'),
(27, 18, 8, 1, '5', '2023-11-10 12:56:09'),
(28, 18, 1, 1, '3', '2023-11-10 12:56:20');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `download_count` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `file_name`, `file_type`, `file_path`, `download_count`, `date`) VALUES
(1, 'Target Company.docx', 'docx', 'Target Company.docx', 3, '2023-11-09 06:29:59'),
(2, 'project_UI.pdf', 'pdf', 'project_UI.pdf', 2, '2023-11-09 06:41:06'),
(4, 'Student-Portfolio.pdf', 'pdf', '1699538160_Student-Portfolio.pdf', 3, '2023-11-09 21:56:18'),
(8, 'SYSTEM VISION DOCUMENT.docx', 'docx', '1699539660_SYSTEM VISION DOCUMENT.docx', 14, '2023-11-09 22:21:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_uploaded_files` (`file_id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_uploaded_files` FOREIGN KEY (`file_id`) REFERENCES `uploaded_files` (`id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
