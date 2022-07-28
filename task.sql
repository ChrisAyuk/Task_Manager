-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 28, 2022 at 09:16 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Table structure for table `assign`
--

DROP TABLE IF EXISTS `assign`;
CREATE TABLE IF NOT EXISTS `assign` (
  `assign_id` int(10) NOT NULL AUTO_INCREMENT,
  `task_id` int(10) NOT NULL,
  `supervisor_id` int(10) NOT NULL,
  `int_id` int(10) DEFAULT NULL,
  `team_id` int(3) NOT NULL,
  PRIMARY KEY (`assign_id`),
  KEY `task_id` (`task_id`,`supervisor_id`,`int_id`,`team_id`),
  KEY `supervisor_id` (`supervisor_id`),
  KEY `int_id` (`int_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign`
--

INSERT INTO `assign` (`assign_id`, `task_id`, `supervisor_id`, `int_id`, `team_id`) VALUES
(1, 1, 11, NULL, 2),
(2, 2, 10, NULL, 3),
(3, 6, 11, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `eventdata`
--

DROP TABLE IF EXISTS `eventdata`;
CREATE TABLE IF NOT EXISTS `eventdata` (
  `TaskID` int(10) NOT NULL AUTO_INCREMENT,
  `Task` varchar(55) NOT NULL,
  `DateAdded` date NOT NULL,
  `due_date` datetime NOT NULL,
  `Details` varchar(255) NOT NULL,
  `status` enum('NOT DONE','DONE') NOT NULL DEFAULT 'NOT DONE',
  PRIMARY KEY (`TaskID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventdata`
--

INSERT INTO `eventdata` (`TaskID`, `Task`, `DateAdded`, `due_date`, `Details`, `status`) VALUES
(1, 'Code in c', '2022-05-30', '2022-06-05 23:59:00', 'Learn coding in c', 'DONE'),
(2, 'eat2', '2016-09-07', '2022-06-01 08:22:00', 'eatingwdgfsddfds', 'NOT DONE'),
(3, 'Python Script Prime numbers', '2022-06-10', '2022-06-15 23:59:00', 'Write a simple python code to display prime numbers from 1-100.\r\nLate submission will be deducted 10%.', 'NOT DONE'),
(5, 'Learnspring', '2022-06-10', '2022-06-18 16:43:00', 'Learn on how to use spring\r\n', 'NOT DONE'),
(6, 'Create Spring API', '2022-06-28', '2022-07-08 14:36:00', 'Create a Spring API using with junit library to work on a linux base system', 'NOT DONE'),
(16, 'NodeJS', '2022-07-02', '2022-07-03 16:22:00', 'Write your first hello world program with Node JS', 'NOT DONE'),
(17, 'NodeJS', '2022-07-02', '2022-07-03 16:22:00', 'Write your first hello world program with Node JS', 'NOT DONE');

-- --------------------------------------------------------

--
-- Table structure for table `grouping`
--

DROP TABLE IF EXISTS `grouping`;
CREATE TABLE IF NOT EXISTS `grouping` (
  `memship_id` int(3) NOT NULL AUTO_INCREMENT,
  `team_id` int(3) NOT NULL,
  `intern_id` int(10) NOT NULL,
  PRIMARY KEY (`memship_id`),
  KEY `team_id` (`team_id`),
  KEY `user_id` (`intern_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grouping`
--

INSERT INTO `grouping` (`memship_id`, `team_id`, `intern_id`) VALUES
(2, 1, 1),
(3, 1, 3),
(4, 1, 7),
(5, 2, 9),
(6, 3, 10),
(7, 2, 8),
(8, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `intern`
--

DROP TABLE IF EXISTS `intern`;
CREATE TABLE IF NOT EXISTS `intern` (
  `intern_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `int_email` varchar(20) NOT NULL,
  `int_pass` varchar(20) NOT NULL,
  `team_id` int(3) DEFAULT NULL,
  PRIMARY KEY (`intern_id`),
  KEY `team_id` (`team_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`intern_id`, `username`, `int_email`, `int_pass`, `team_id`) VALUES
(1, 'Larry', 'larry@gmail.com', 'arrey', 1),
(3, 'Terry', 'terry@gmail.com', 'obale', 1),
(5, 'David', 'david@hotmail.com', 'english', 3),
(7, 'Bryce', 'bryce@gmail.com', 'nembo', 1),
(8, 'Beverly', 'kendra@gmail.com', 'kendy', 2),
(9, 'Ashley', 'eyong@gmail.com', 'briey', 2),
(10, 'Prinel', 'prine@gmail.com', 'kingue', 3),
(26, 'George', 'george@gmail.com', 'iwomi', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supervision`
--

DROP TABLE IF EXISTS `supervision`;
CREATE TABLE IF NOT EXISTS `supervision` (
  `superviseId` int(10) NOT NULL AUTO_INCREMENT,
  `super_id` int(10) NOT NULL,
  `intern_id` int(10) NOT NULL,
  PRIMARY KEY (`superviseId`),
  KEY `super_id` (`super_id`),
  KEY `intern_id` (`intern_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervision`
--

INSERT INTO `supervision` (`superviseId`, `super_id`, `intern_id`) VALUES
(1, 9, 1),
(4, 9, 3),
(5, 9, 7),
(6, 10, 5),
(7, 10, 10),
(8, 11, 8),
(9, 11, 9),
(12, 11, 26);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
CREATE TABLE IF NOT EXISTS `supervisor` (
  `sup_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `sup_email` varchar(30) NOT NULL,
  `sup_pass` varchar(15) NOT NULL,
  PRIMARY KEY (`sup_id`),
  KEY `sup_email` (`sup_email`),
  KEY `sup_pass` (`sup_pass`),
  KEY `username` (`username`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`sup_id`, `username`, `sup_email`, `sup_pass`) VALUES
(9, 'Ryan', 'ryan@gmail.com', 'ry237'),
(10, 'Manyi', 'ebot@gmail.com', 'jesus'),
(11, 'William', 'will@gmail.com', 'will237'),
(12, 'Chris', 'chris@hotmail.com', 'ay237');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

DROP TABLE IF EXISTS `team`;
CREATE TABLE IF NOT EXISTS `team` (
  `team_id` int(3) NOT NULL AUTO_INCREMENT,
  `teamName` varchar(20) NOT NULL,
  `capacity` int(2) NOT NULL,
  `supervisor` varchar(30) NOT NULL,
  PRIMARY KEY (`team_id`),
  KEY `team_id` (`team_id`),
  KEY `supervisor` (`supervisor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `teamName`, `capacity`, `supervisor`) VALUES
(1, 'Web Dev', 3, 'Ryan'),
(2, 'Java Gurus', 5, 'William'),
(3, 'Marvis Beacon', 2, 'Manyi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `type_id` int(10) NOT NULL,
  `user_type` enum('1','2') NOT NULL DEFAULT '2',
  PRIMARY KEY (`user_id`),
  KEY `type_id` (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `assign_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `eventdata` (`TaskID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_ibfk_2` FOREIGN KEY (`supervisor_id`) REFERENCES `supervisor` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_ibfk_3` FOREIGN KEY (`int_id`) REFERENCES `intern` (`intern_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assign_ibfk_4` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grouping`
--
ALTER TABLE `grouping`
  ADD CONSTRAINT `grouping_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grouping_ibfk_2` FOREIGN KEY (`intern_id`) REFERENCES `intern` (`intern_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `intern`
--
ALTER TABLE `intern`
  ADD CONSTRAINT `intern_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `team` (`team_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervision`
--
ALTER TABLE `supervision`
  ADD CONSTRAINT `supervision_ibfk_1` FOREIGN KEY (`super_id`) REFERENCES `supervisor` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supervision_ibfk_2` FOREIGN KEY (`intern_id`) REFERENCES `intern` (`intern_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `team`
--
ALTER TABLE `team`
  ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`supervisor`) REFERENCES `supervisor` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `intern` (`intern_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `supervisor` (`sup_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
