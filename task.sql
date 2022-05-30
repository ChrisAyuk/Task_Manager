-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2016 at 09:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventdata`
--

CREATE TABLE `eventdata` (
  `TaskID` int(10) NOT NULL,
  `Task` varchar(55) NOT NULL,
  `DateAdded` date NOT NULL,
  `TimeStart` time(6) NOT NULL,
  `TimeEnd` time(6) NOT NULL,
  `Details` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventdata`
--

INSERT INTO `eventdata` (`TaskID`, `Task`, `DateAdded`, `TimeStart`, `TimeEnd`, `Details`, `user_id`) VALUES
(1, 'sleep', '2016-09-21', '01:00:00.000000', '02:58:00.000000', 'sleeping', 0),
(2, 'eat', '2016-09-07', '01:59:00.000000', '01:56:00.000000', 'eating', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(15) NOT NULL,
  `user_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `user_type` enum('1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_email`, `user_password`, `user_status`, `user_type`) VALUES
(1, 'admin', 'admin@hotmail.com', '123', 'active', '2'),
(2, 'user', 'user@hotmail.com', '123', 'active', '1'),
(3, 'tester', 'tester@hotmail.com', '123 ', 'inactive', '1'),
(4, 'orange', 'orange@hotmail.com', '123', 'active', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventdata`
--
ALTER TABLE `eventdata`
  ADD PRIMARY KEY (`TaskID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
