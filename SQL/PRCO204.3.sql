-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: proj-mysql.uopnet.plymouth.ac.uk
-- Generation Time: Mar 02, 2020 at 04:19 PM
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
CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `add_admin` (IN `add_Username` VARCHAR(32), IN `add_Password` VARCHAR(32))  NO SQL
INSERT INTO admin_info(Username, Password)
VALUES (add_Username, add_Password)$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `add_sleep` (IN `add_User_ID` INT, IN `add_Sleep_Notes` VARCHAR(255), IN `add_Sleep_Start` DATETIME, IN `add_Sleep_End` DATETIME)  NO SQL
INSERT INTO user_sleep (User_ID, Sleep_Start, Sleep_End, Sleep_Notes)
VALUES (add_User_ID, add_Sleep_Start, add_Sleep_End, add_Sleep_Notes)$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `create_view_sleeps` ()  NO SQL
CREATE VIEW view_sleep AS
SELECT * FROM user_sleep
END$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `create_view_users` ()  NO SQL
CREATE VIEW view_users AS
SELECT * FROM users
END$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `drop_admin` (IN `drop_ID` INT)  NO SQL
DELETE FROM admin_info
WHERE Admin_ID = drop_ID$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `drop_sleeps` (IN `drop_ID` INT)  NO SQL
DELETE FROM user_sleep
WHERE Sleep_ID = drop_ID$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `drop_user` (IN `drop_ID` INT)  NO SQL
DELETE FROM users
WHERE id = drop_ID$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `drop_user_sleeps` (IN `search_ID` INT(10))  NO SQL
DELETE FROM user_sleep
WHERE User_ID = search_ID$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `update_admin` (IN `edit_ID` INT, IN `edit_Username` VARCHAR(32), IN `edit_Password` VARCHAR(32))  NO SQL
UPDATE admin_info
SET 
Username = edit_Username, 
Password = edit_Password 
WHERE Admin_ID = edit_ID$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `update_sleep` (IN `edit_ID` INT, IN `edit_Notes` VARCHAR(255), IN `edit_Start` DATETIME, IN `edit_End` DATETIME)  NO SQL
UPDATE user_sleep
SET
Sleep_Start = edit_Start,
Sleep_End = edit_End,
Sleep_Notes = edit_Notes
WHERE Sleep_ID = edit_ID$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `update_user` (IN `edit_ID` INT(10), IN `edit_Name` VARCHAR(255), IN `edit_Email` VARCHAR(255), IN `edit_Country` VARCHAR(255), IN `edit_Age` INT(11), IN `edit_Gender` VARCHAR(255))  NO SQL
UPDATE users
SET 
email = edit_Email, 
name = edit_Name, 
country = edit_Country, 
age = edit_Age, 
gender = edit_Gender
WHERE id = edit_ID$$

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
(1, 'Hicks', '1234'),
(2, 'Hirst', '4321'),
(3, 'Skillman', '3579');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `country`, `age`, `gender`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dan', 'danhirst123@gmail.com', NULL, '$2y$10$YOWSNLiIqL/94XhyK/UvruUQ1vnBaJF/TRio.n2uUcqVl5YPxyPMC', 'UK', 20, 'Male', NULL, '2020-03-02 10:22:36', '2020-03-02 10:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_sleep`
--

CREATE TABLE `user_sleep` (
  `Sleep_ID` int(11) NOT NULL,
  `User_ID` int(10) UNSIGNED NOT NULL,
  `Sleep_Start` datetime NOT NULL,
  `Sleep_End` datetime NOT NULL,
  `Sleep_Notes` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_sleep`
--

INSERT INTO `user_sleep` (`Sleep_ID`, `User_ID`, `Sleep_Start`, `Sleep_End`, `Sleep_Notes`) VALUES
(3, 1, '2020-03-01 23:00:00', '2020-03-02 10:00:00', 'Last night');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sleep`
-- (See below for the actual view)
--
CREATE TABLE `view_sleep` (
`Sleep_ID` int(11)
,`User_ID` int(10) unsigned
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
`id` int(10) unsigned
,`name` varchar(255)
,`email` varchar(255)
,`email_verified_at` timestamp
,`password` varchar(255)
,`country` varchar(255)
,`age` int(11)
,`gender` varchar(255)
,`remember_token` varchar(100)
,`created_at` timestamp
,`updated_at` timestamp
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

CREATE ALGORITHM=UNDEFINED DEFINER=`PRCO204_C`@`%` SQL SECURITY DEFINER VIEW `view_users`  AS  select `end`.`id` AS `id`,`end`.`name` AS `name`,`end`.`email` AS `email`,`end`.`email_verified_at` AS `email_verified_at`,`end`.`password` AS `password`,`end`.`country` AS `country`,`end`.`age` AS `age`,`end`.`gender` AS `gender`,`end`.`remember_token` AS `remember_token`,`end`.`created_at` AS `created_at`,`end`.`updated_at` AS `updated_at` from `users` `end` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_sleep`
--
ALTER TABLE `user_sleep`
  MODIFY `Sleep_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_sleep`
--
ALTER TABLE `user_sleep`
  ADD CONSTRAINT `user_sleep_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
