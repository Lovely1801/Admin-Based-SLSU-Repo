-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 17, 2023 at 06:01 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

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
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `logs` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `logs`, `user_id`, `date`) VALUES
(1, 'Sasuke Uchiha is logging in', 20, '2023-11-12 10:20:09'),
(2, 'Sasuke Uchiha is logging out', 20, '2023-11-12 10:20:36'),
(3, 'Sponge Bob is logging in', 21, '2023-11-12 10:22:27'),
(8, 'Sponge Bob is logging in', 21, '2023-11-12 15:31:27'),
(9, 'Sponge Bob unliked the file project_UI.pdf', 21, '2023-11-12 15:31:31'),
(10, 'Sponge Bob liked the file project_UI.pdf', 21, '2023-11-12 15:32:07'),
(11, 'Sponge Bob is logging out', 21, '2023-11-12 15:35:20'),
(12, 'Sponge Bob is logging in', 21, '2023-11-12 15:35:35'),
(13, 'Sponge Bob is logging out', 21, '2023-11-12 15:38:38'),
(14, 'Naruto Uzumaki is logging in', 18, '2023-11-12 15:38:47'),
(15, 'Naruto Uzumaki liked the file Student-Portfolio.pdf', 18, '2023-11-12 15:38:52'),
(16, 'Naruto Uzumaki liked the file project_UI.pdf', 18, '2023-11-12 15:39:02'),
(17, 'Naruto Uzumaki unliked the file project_UI.pdf', 18, '2023-11-12 15:39:09'),
(18, 'Naruto Uzumaki unliked the file Student-Portfolio.pdf', 18, '2023-11-12 15:39:10'),
(22, 'Naruto Uzumaki liked the file Student-Portfolio.pdf', 18, '2023-11-12 15:53:58'),
(23, 'Naruto Uzumaki unliked the file SYSTEM VISION DOCUMENT.docx', 18, '2023-11-12 16:10:45'),
(24, 'Naruto Uzumaki unliked the file Student-Portfolio.pdf', 18, '2023-11-12 16:11:39'),
(25, 'Naruto Uzumaki liked the file Student-Portfolio.pdf', 18, '2023-11-12 16:11:48'),
(26, 'Naruto Uzumaki is logging out', 18, '2023-11-12 16:12:31'),
(27, 'Sasuke Uchiha is logging in', 20, '2023-11-12 16:12:46'),
(28, 'Sasuke Uchiha unliked the file Student-Portfolio.pdf', 20, '2023-11-12 16:12:57'),
(30, 'Sasuke Uchiha is updating the rating to 2 of the file SYSTEM VISION DOCUMENT.docx', 20, '2023-11-12 16:13:30'),
(31, 'Sasuke Uchiha is rating 4 of the file Student-Portfolio.pdf', 20, '2023-11-12 16:15:01'),
(32, 'Sasuke Uchiha is logging in', 20, '2023-11-12 16:34:01'),
(33, 'Administrator is logging in', 22, '2023-11-12 16:47:14'),
(34, 'Sasuke Uchiha is downloading Target Company.docx', 20, '2023-11-12 17:06:55'),
(44, 'Administrator is updating the user Kim Sabaw', 22, '2023-11-13 05:15:11'),
(45, 'Administrator is deleting Holy Moly', 22, '2023-11-13 05:15:45'),
(46, 'Administrator is logging in', 22, '2023-11-14 07:58:39'),
(47, 'Sasuke Uchiha is logging in', 20, '2023-11-14 17:28:01'),
(48, 'Sasuke Uchiha liked the file Student-Portfolio.pdf', 20, '2023-11-14 17:28:59'),
(49, 'Sasuke Uchiha unliked the file Student-Portfolio.pdf', 20, '2023-11-14 17:29:21'),
(50, 'Sasuke Uchiha liked the file Student-Portfolio.pdf', 20, '2023-11-14 17:29:32'),
(96, 'Administrator liked the file Target Company.docx', 22, '2023-11-14 21:14:10'),
(97, 'Administrator unliked the file Target Company.docx', 22, '2023-11-14 21:16:06'),
(98, 'Administrator liked the file Target Company.docx', 22, '2023-11-14 21:17:04'),
(99, 'Administrator liked the file Student-Portfolio.pdf', 22, '2023-11-14 21:17:14'),
(100, 'Administrator unliked the file Student-Portfolio.pdf', 22, '2023-11-14 21:17:16'),
(101, 'Administrator liked the file Student-Portfolio.pdf', 22, '2023-11-14 21:17:20'),
(102, 'Administrator unliked the file Target Company.docx', 22, '2023-11-14 21:22:06'),
(103, 'Administrator liked the file Target Company.docx', 22, '2023-11-14 21:22:09'),
(104, 'Administrator unliked the file Target Company.docx', 22, '2023-11-14 21:22:13'),
(105, 'Administrator liked the file Target Company.docx', 22, '2023-11-14 21:22:16'),
(106, 'Administrator unliked the file Student-Portfolio.pdf', 22, '2023-11-14 21:22:21'),
(107, 'Administrator liked the file Student-Portfolio.pdf', 22, '2023-11-14 21:22:23'),
(108, 'Administrator liked the file project_UI.pdf', 22, '2023-11-14 21:22:25'),
(109, 'Administrator unliked the file project_UI.pdf', 22, '2023-11-14 21:22:27'),
(110, 'Administrator liked the file project_UI.pdf', 22, '2023-11-14 21:22:29'),
(111, 'Administrator unliked the file project_UI.pdf', 22, '2023-11-14 21:22:31'),
(112, 'Administrator liked the file project_UI.pdf', 22, '2023-11-14 21:22:33'),
(113, 'Administrator unliked the file project_UI.pdf', 22, '2023-11-14 21:22:34'),
(114, 'Administrator is logging out', 22, '2023-11-14 21:49:43'),
(115, 'Administrator is logging in', 22, '2023-11-14 21:49:47'),
(116, 'Administrator unliked the file Target Company.docx', 22, '2023-11-14 22:02:34'),
(117, 'Administrator liked the file Target Company.docx', 22, '2023-11-14 22:02:37'),
(118, 'Administrator liked the file SYSTEM VISION DOCUMENT.docx', 22, '2023-11-14 22:02:57'),
(119, 'Administrator unliked the file SYSTEM VISION DOCUMENT.docx', 22, '2023-11-14 22:02:59'),
(120, 'Administrator is adding new user', 22, '2023-11-14 22:54:36'),
(121, 'Administrator is deleting user sfdddkkk', 22, '2023-11-14 22:55:09'),
(122, 'Administrator is downloading project_UI.pdf', 22, '2023-11-14 22:58:27'),
(126, 'Administrator is downloading project_UI.pdf', 22, '2023-11-14 22:58:40'),
(127, 'Administrator is downloading Target Company.docx', 22, '2023-11-14 23:08:00'),
(128, 'Administrator is downloading SYSTEM VISION DOCUMENT.docx', 22, '2023-11-14 23:09:14'),
(129, 'Administrator is deleting project_UI.pdf', 22, '2023-11-15 21:53:38'),
(130, 'Administrator is downloading Student-Portfolio.pdf', 22, '2023-11-15 22:40:13'),
(131, 'Administrator is downloading Student-Portfolio.pdf', 22, '2023-11-15 22:42:55'),
(132, 'Administrator unliked the file Student-Portfolio.pdf', 22, '2023-11-15 22:45:06'),
(133, 'Administrator liked the file SYSTEM VISION DOCUMENT.docx', 22, '2023-11-15 22:45:10'),
(134, 'Administrator is logging in', 22, '2023-11-16 08:12:47'),
(135, 'Sasuke Uchiha is logging in', 20, '2023-11-16 10:45:46'),
(136, 'Sasuke Uchiha is logging out', 20, '2023-11-16 10:45:57'),
(137, 'Sasuke Uchiha is logging in', 20, '2023-11-16 10:46:06'),
(138, 'Administrator is logging in', 22, '2023-11-16 10:48:55'),
(139, 'Administrator is logging in', 22, '2023-11-17 05:58:52');

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
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
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
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `file_id`, `liked`, `date`) VALUES
(19, 20, 8, 1, '2023-11-10 08:46:21'),
(21, 20, 4, 1, '2023-11-10 08:48:52'),
(22, 21, 8, 0, '2023-11-10 08:49:13'),
(23, 21, 1, 1, '2023-11-10 08:50:41'),
(25, 21, 4, 0, '2023-11-10 08:50:56'),
(26, 20, 1, 1, '2023-11-10 12:49:26'),
(27, 18, 8, 0, '2023-11-10 12:56:09'),
(28, 18, 1, 1, '2023-11-10 12:56:20'),
(29, 18, 4, 1, '2023-11-12 15:38:52'),
(31, 22, 1, 1, '2023-11-14 07:58:57'),
(33, 22, 4, 0, '2023-11-14 21:17:14'),
(34, 22, 8, 1, '2023-11-14 22:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `user_id`, `file_id`, `rate`, `date`) VALUES
(1, 18, 8, '5.00', '2023-11-12 15:43:38'),
(2, 20, 8, '2.00', '2023-11-12 16:13:15'),
(3, 20, 4, '4.00', '2023-11-12 16:15:01');

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
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `file_name`, `file_type`, `file_path`, `download_count`, `date`) VALUES
(1, 'Target Company.docx', 'docx', 'Target Company.docx', 7, '2023-11-09 06:29:59'),
(4, 'Student-Portfolio.pdf', 'pdf', '1699538160_Student-Portfolio.pdf', 7, '2023-11-09 21:56:18'),
(8, 'SYSTEM VISION DOCUMENT.docx', 'docx', '1699539660_SYSTEM VISION DOCUMENT.docx', 15, '2023-11-09 22:21:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id` (`user_id`);

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
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_file_id` (`file_id`),
  ADD KEY `rate_user_id` (`user_id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_file_id` FOREIGN KEY (`file_id`) REFERENCES `uploaded_files` (`id`),
  ADD CONSTRAINT `rate_user_id` FOREIGN KEY (`user_id`) REFERENCES `info` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
