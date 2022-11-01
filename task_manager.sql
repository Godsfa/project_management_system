-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 01:50 PM
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
-- Database: `task_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `employee_id` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `login_id` int(5) NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`employee_id`, `username`, `fullname`, `email`, `password`, `gender`, `login_id`, `photo`) VALUES
(1, 'Administrator', 'Godsfavour B', 'admin@gmail.com', 'administration', 'Male', 1, ''),
(4, 'Bobby ', 'Bobby corn J', 'corn@gmail.com', 'bobbycorn', 'Male', 2, ''),
(5, 'Bobby ', 'Gasp Bobby ', 'bobby@gmail.com', 'bobbycorn', 'Male', 2, ''),
(7, 'Mary', 'Mary Mazda ', 'mary@gmail.com', 'bobbycorn', 'Female', 2, ''),
(10, 'favour', 'favour', 'abc@gmail.com', 'bobbycorn', 'Female', 2, ''),
(11, 'Ehimen', 'Ehimen Judo', 'abc@gmail.com', 'Ehimen', 'Male', 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tasks`
--

CREATE TABLE `tbl_tasks` (
  `task_id` int(20) UNSIGNED NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `task_description` varchar(255) NOT NULL,
  `priority` varchar(225) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 =Started, 1 =Ongoing, 2 =Finished, 3=Cancelled',
  `employee_id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tasks`
--

INSERT INTO `tbl_tasks` (`task_id`, `task_name`, `task_description`, `priority`, `start_time`, `end_time`, `status`, `employee_id`, `login_id`) VALUES
(1, 'cloning ', 'clothing ', 'high', '2022-11-03 15:23:00', '2022-11-08 15:23:00', 0, 5, 2),
(2, 'front end', 'html css js', 'medium', '2022-10-26 15:23:00', '2022-11-09 15:23:00', 2, 4, 2),
(3, 'back end', 'php java', 'low', '2022-10-17 15:26:00', '2022-10-05 15:25:00', 0, 7, 2),
(4, 'networking ', 'marking ', 'high', '2022-10-26 15:26:00', '2022-11-02 15:26:00', 0, 10, 2),
(8, 'Build software', 'Hello', 'medium', '2022-11-01 11:13:00', '2022-11-03 11:17:00', 0, 7, 2),
(9, 'icon', 'hello', 'high', '2022-11-01 13:39:00', '2022-11-08 13:33:00', 0, 5, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `employee_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_tasks`
--
ALTER TABLE `tbl_tasks`
  MODIFY `task_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
