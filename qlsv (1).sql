-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 03:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlsv`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `file` mediumtext DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `name`, `file`, `question_id`, `username`, `date`) VALUES
(1, 'test2', '20. CIR.pdf', 2, 'student1', '0000-00-00'),
(2, 'ttttt', 'kaa.txt', 1, 'student2', '0000-00-00'),
(3, 'vmbnd', '20. CIR (2).pdf', 4, 'student1', '2023-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `content` varchar(250) DEFAULT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `content`, `date`, `from`, `to`) VALUES
(1, 'lalalal', '0000-00-00', 'teacher1', 'student1'),
(2, 'kakaka2222', '0000-00-00', 'teacher2', 'student1');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `file` mediumtext NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `name`, `file`, `username`, `date`) VALUES
(2, 'test', '20. CIR.pdf', 'teacher1', '2023-08-19'),
(4, 'test', '20. CIR.pdf', 'teacher1', '2023-08-19'),
(7, 'test', '19. Content.pdf', '', '2023-08-19'),
(8, 'tesst', 'Screenshot (1).png', '', '2023-08-20'),
(9, '1234', 'Screenshot (1).png', '', '2023-08-20'),
(10, '1qa', 'photo_6264982891490555489_y.jpg', 'teacher1', '2023-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `fullname`, `email`, `phone`) VALUES
(1, 'teacher1', 'c030437f6e8e94d244bc602606df5235', 0, 'Nguyen Van A', 'a21@viettel.com.vn', '0972181178'),
(2, 'teacher2', 'c030437f6e8e94d244bc602606df5235', 0, 'Nguyen Van b', 'b39@viettel.com.vn', '0972119178'),
(3, 'student1', 'c030437f6e8e94d244bc602606df5235', 1, 'Hoang Van C', 'c21@viettel.com.vn', '0978291178'),
(14, '$username', 'f42bbb6f9da9d2e50172c69f149e4b6e', 1, '$fullname', 'test@gmail.com', '$phone');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
