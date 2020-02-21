-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: proj-mysql.uopnet.plymouth.ac.uk
-- Generation Time: Feb 15, 2020 at 06:21 PM
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

DELIMITER $$
--
-- Procedures
--

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `add_sleep` (IN `add_User_ID` INT, IN `add_Sleep_Notes` VARCHAR(255), IN `add_Sleep_Start` DATETIME, IN `add_Sleep_End` DATETIME)  NO SQL
INSERT INTO user_sleep (User_ID, Sleep_Start, Sleep_End, Sleep_Notes)
VALUES (add_User_ID, add_Sleep_Start, add_Sleep_End, add_Sleep_Notes)$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `add_user` (IN `add_Email` VARCHAR(64), IN `add_Username` VARCHAR(32), IN `add_Password` VARCHAR(32), IN `add_Country` VARCHAR(56), IN `add_Age` INT(122), IN `add_Gender` VARCHAR(15), IN `add_Security_Q` VARCHAR(150), IN `add_Security_A` VARCHAR(50))  NO SQL
INSERT INTO user_info (Email, Username, Password, Country, Age, Gender, Security_Question, Security_Answer)
VALUES (add_Email, add_Username, add_Password, add_Country, add_Age, add_Gender, add_Security_Q, add_Security_A)$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `create_view_sleeps` ()  NO SQL
CREATE VIEW view_sleep AS
SELECT * FROM user_sleep
END$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `create_view_users` ()  NO SQL
CREATE VIEW view_users AS
SELECT * FROM user_info
END$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `update_sleep` (IN `edit_ID` INT, IN `edit_User_ID` INT, IN `Hours_Slept` FLOAT, IN `edit_Sleep_Notes` VARCHAR(255))  NO SQL
UPDATE user_sleep
SET
User_ID = edit_User_ID,
Sleep_Start = DATE_SUB(NOW(), INTERVAL Hours_Slept HOUR),
Sleep_End = NOW(),
Sleep_Notes = edit_Sleep_Notes
WHERE Sleep_ID = edit_ID$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `update_user` (IN `edit_ID` INT, IN `edit_Email` VARCHAR(64), IN `edit_Username` VARCHAR(32), IN `edit_Password` VARCHAR(32), IN `edit_Country` VARCHAR(56), IN `edit_Age` INT, IN `edit_Gender` VARCHAR(15), IN `edit_SecurityQ` VARCHAR(150), IN `edit_SecurityA` VARCHAR(50))  NO SQL
UPDATE user_info
SET 
Email = edit_Email, 
Username = edit_Username, 
Password = edit_Password, 
Country = edit_Country, 
Age = edit_Age, 
Gender = edit_Gender, 
Security_Question = edit_SecurityQ, 
Security_Answer = edit_SecurityA
WHERE User_ID = edit_ID$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `view_time_slept` ()  NO SQL
SELECT Sleep_ID, User_ID, Sleep_Start, Sleep_End, TIMEDIFF(Sleep_End, Sleep_Start) 
FROM user_sleep$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `view_user_sleep` (IN `Search_ID` INT)  NO SQL
SELECT user_info.User_ID, user_sleep.Sleep_ID, Username, Email, user_sleep.Sleep_Start, user_sleep.Sleep_End, user_sleep.Sleep_Notes
FROM user_info
JOIN user_sleep ON user_sleep.User_ID = user_info.User_ID
WHERE user_info.User_ID = Search_ID$$

DELIMITER ;

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
(1, 'T1Admin', 'test1'),
(2, 'T2Admin', 'test2');

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
(3, 2, '2020-02-15 01:05:32', '2020-02-15 15:05:32', 'Huge sleep.');

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
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sleep`
--
ALTER TABLE `user_sleep`
  MODIFY `Sleep_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
