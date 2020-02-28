-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: proj-mysql.uopnet.plymouth.ac.uk
-- Generation Time: Feb 27, 2020 at 09:01 PM
-- Server version: 8.0.16
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prco204_c`
--
CREATE DATABASE IF NOT EXISTS `prco204_c` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `prco204_c`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `Admin_ID` int(11) NOT NULL,
  `Username` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`Admin_ID`, `Username`, `Password`) VALUES
(1, 'Hicks', '1234'),
(2, 'Hirst', '4321'),
(3, 'Skillman', '3579');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `User_ID` int(11) NOT NULL,
  `Email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `Username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `Country` varchar(56) COLLATE utf8_unicode_ci NOT NULL,
  `Age` int(122) DEFAULT NULL,
  `Gender` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Security_Question` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Security_Answer` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`User_ID`, `Email`, `Username`, `Password`, `Country`, `Age`, `Gender`, `Security_Question`, `Security_Answer`) VALUES
(1, 'Student.Test1@Uni.ac.uk', 'T1Student', 'test1', 'United Kingdom', 20, 'Male', 'Which University did you go to?', 'Plymouth University'),
(2, 'Student.Test2@Uni.co.uk', 'T2Student', 'test2', 'United Kingdom', 21, 'Female', 'Which University did you go to?', 'Plymouth University'),
(3, 'Student.Test3@Uni.co.uk', 'T3StudentEditTest', 'test3', 'United Kingdom', 22, 'Other', 'Your favourite coding language?', 'SQL.');

-- --------------------------------------------------------

--
-- Table structure for table `user_sleep`
--

CREATE TABLE `user_sleep` (
  `Sleep_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Sleep_Start` datetime NOT NULL,
  `Sleep_End` datetime NOT NULL,
  `Sleep_Notes` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_sleep`
--

INSERT INTO `user_sleep` (`Sleep_ID`, `User_ID`, `Sleep_Start`, `Sleep_End`, `Sleep_Notes`) VALUES
(1, 2, '2020-02-15 13:39:34', '2020-02-15 13:39:34', 'A nanosecond nap.'),
(2, 1, '2020-02-15 04:02:56', '2020-02-15 15:02:56', '11 Hours!'),
(3, 2, '2020-02-15 01:05:32', '2020-02-15 15:05:32', 'Huge sleep.'),
(32, 1, '2020-02-21 09:30:00', '2020-02-21 19:30:00', ''),
(34, 1, '2018-06-12 19:30:00', '2018-06-12 21:30:00', ''),
(35, 1, '2018-06-12 19:30:00', '2018-06-12 21:30:00', ''),
(36, 2, '2018-06-13 19:30:00', '2018-06-15 21:30:00', 'Sleep was good'),
(37, 2, '2018-06-12 11:30:00', '2018-06-12 21:30:00', '');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sleep`
-- (See below for the actual view)
--
CREATE TABLE `view_sleep` (
`Sleep_ID` int(11)
,`User_ID` int(11)
,`Sleep_Start` datetime
,`Sleep_End` datetime
,`Sleep_Notes` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_users`
-- (See below for the actual view)
--
CREATE TABLE `view_users` (
`User_ID` int(11)
,`Email` varchar(64)
,`Username` varchar(32)
,`Password` varchar(32)
,`Country` varchar(56)
,`Age` int(122)
,`Gender` varchar(15)
,`Security_Question` varchar(150)
,`Security_Answer` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_sleep`
--
DROP TABLE IF EXISTS `view_sleep`;

CREATE ALGORITHM=UNDEFINED DEFINER=`PRCO204_C`@`%` SQL SECURITY DEFINER VIEW `view_sleep`  AS  select `end`.`Sleep_ID` AS `Sleep_ID`,`end`.`User_ID` AS `User_ID`,`end`.`Sleep_Start` AS `Sleep_Start`,`end`.`Sleep_End` AS `Sleep_End`,`end`.`Sleep_Notes` AS `Sleep_Notes` from `user_sleep` `end` ;

-- --------------------------------------------------------

--
-- Structure for view `view_users`
--
DROP TABLE IF EXISTS `view_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`PRCO204_C`@`%` SQL SECURITY DEFINER VIEW `view_users`  AS  select `end`.`User_ID` AS `User_ID`,`end`.`Email` AS `Email`,`end`.`Username` AS `Username`,`end`.`Password` AS `Password`,`end`.`Country` AS `Country`,`end`.`Age` AS `Age`,`end`.`Gender` AS `Gender`,`end`.`Security_Question` AS `Security_Question`,`end`.`Security_Answer` AS `Security_Answer` from `user_info` `end` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `user_sleep`
--
ALTER TABLE `user_sleep`
  ADD PRIMARY KEY (`Sleep_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sleep`
--
ALTER TABLE `user_sleep`
  MODIFY `Sleep_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_sleep`
--
ALTER TABLE `user_sleep`
  ADD CONSTRAINT `user_sleep_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user_info` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
