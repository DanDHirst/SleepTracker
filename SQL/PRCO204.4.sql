-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: proj-mysql.uopnet.plymouth.ac.uk
-- Generation Time: Mar 27, 2020 at 03:53 PM
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
CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `add_admin` (IN `add_name` VARCHAR(255), IN `add_pass` VARCHAR(255))  NO SQL
INSERT INTO admins(name, password)
VALUES (add_name, add_pass)$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `add_event` (IN `add_user_id` INT, IN `add_title` VARCHAR(255), IN `add_description` VARCHAR(255), IN `add_start` DATETIME, IN `add_end` DATETIME)  NO SQL
INSERT INTO events (user_id, title, description, start_time, end_time)
VALUES (add_user_id, add_title, add_description, add_start, add_end)$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `add_sleep` (IN `add_user_id` INT, IN `add_notes` VARCHAR(255), IN `add_start` DATETIME, IN `add_end` DATETIME)  NO SQL
INSERT INTO user_sleep (User_ID, Sleep_Start, Sleep_End, Sleep_Notes)
VALUES (add_user_id, add_start, add_end, add_notes)$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `create_view_events` ()  NO SQL
CREATE VIEW view_events AS
SELECT * FROM events
END$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `create_view_sleeps` ()  NO SQL
CREATE VIEW view_sleep AS
SELECT * FROM user_sleep
END$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `create_view_users` ()  NO SQL
CREATE VIEW view_users AS
SELECT id, name, email, password, country, age, gender FROM users
END$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `drop_admin` (IN `drop_id` INT(10))  NO SQL
DELETE FROM admins
WHERE id = drop_id$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `drop_event` (IN `drop_id` INT(10))  NO SQL
DELETE FROM events
WHERE id = drop_id$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `drop_sleeps` (IN `drop_id` INT(10))  NO SQL
DELETE FROM user_sleep
WHERE Sleep_ID = drop_id$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `drop_user` (IN `drop_id` INT(10))  NO SQL
DELETE FROM users
WHERE id = drop_id$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `drop_user_sleeps` (IN `search_id` INT(10))  NO SQL
DELETE FROM user_sleep
WHERE User_ID = search_id$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `group_previous` (IN `search_id` INT(10), IN `amount` INT)  NO SQL
SELECT users.id, 
Sleep_ID, 
Sleep_Start,
Sleep_End,
Sleep_Notes,
HOUR(TIMEDIFF(Sleep_End, Sleep_Start)) AS 'Difference'
FROM user_sleep
JOIN users ON users.id = user_sleep.User_ID
WHERE users.id = search_id
ORDER BY Sleep_Start DESC
LIMIT amount$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `update_admin` (IN `edit_id` INT(10), IN `edit_name` VARCHAR(255), IN `edit_pass` VARCHAR(255))  NO SQL
UPDATE admins
SET 
name = edit_name, 
pass = edit_pass 
WHERE id = edit_id$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `update_event` (IN `edit_id` INT(10), IN `edit_title` VARCHAR(255), IN `edit_desc` VARCHAR(255), IN `edit_start` DATETIME, IN `edit_end` DATETIME)  NO SQL
UPDATE events
SET
title = edit_title,
description = edit_description,
start_time = edit_start,
end_time = edit_end
WHERE id = edit_id$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `update_sleep` (IN `edit_id` INT(10), IN `edit_notes` VARCHAR(255), IN `edit_start` DATETIME, IN `edit_end` DATETIME)  NO SQL
UPDATE user_sleep
SET
Sleep_Start = edit_start,
Sleep_End = edit_end,
Sleep_Notes = edit_notes
WHERE Sleep_ID = edit_id$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `update_user` (IN `edit_id` INT(10), IN `edit_name` VARCHAR(255), IN `edit_email` VARCHAR(255), IN `edit_country` VARCHAR(255), IN `edit_age` INT(11), IN `edit_gender` VARCHAR(255))  NO SQL
UPDATE users
SET 
email = edit_email, 
name = edit_name, 
country = edit_country, 
age = edit_age, 
gender = edit_gender
WHERE id = edit_id$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `view_all_events` (IN `search_id` INT(10))  NO SQL
SELECT * FROM events
WHERE user_id = search_id
ORDER BY start_time DESC$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `view_sleep_diffs` ()  NO SQL
SELECT Sleep_ID, 
User_ID, 
Sleep_Start, 
Sleep_End, 
HOUR(TIMEDIFF(Sleep_End, Sleep_Start)) AS 'Difference (Hrs)'
FROM user_sleep
ORDER BY Sleep_Start DESC$$

CREATE DEFINER=`PRCO204_C`@`%` PROCEDURE `view_user_sleep` (IN `Search_ID` INT)  NO SQL
SELECT users.id, 
user_sleep.Sleep_ID, 
name, 
email, 
user_sleep.Sleep_Start, 
user_sleep.Sleep_End, 
user_sleep.Sleep_Notes
FROM users
JOIN user_sleep ON user_sleep.User_ID = users.id
WHERE users.id = Search_ID
ORDER BY Sleep_Start DESC$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'Hicks', '1234'),
(2, 'Hirst', '4321'),
(3, 'Skillman', '3579');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `title`, `description`, `start_time`, `end_time`) VALUES
(2, 1, 'birthday', 'bday', '2020-03-11 00:00:00', '2020-03-12 00:00:00'),
(5, 1, 'wednesday ma dude', 'nice', '2020-03-11 10:00:00', '2020-03-11 20:00:00'),
(6, 6, 'Test event.', 'This event is merely a test.', '2020-05-15 13:00:00', '2020-05-15 17:00:00'),
(8, 9, 'dasdassdsa', 'sadasds', '2020-03-20 10:30:00', '2020-03-22 20:20:00'),
(9, 1, 'Test', 'test', '2020-03-27 10:00:00', '2020-03-28 22:02:00');

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

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('danielskillman357@yahoo.co.uk', '$2y$10$e.cyxzBvoMqSDEm.Z1rBSuoUS8sECzqITOVcTcUVhi460W/r99JXy', '2020-03-06 12:42:56'),
('danhirst123@gmail.com', '$2y$10$jLwd477WrWw.oQh4uUBIn.bXS8S6e13zpGgHV.VUWrhKzzsHW9zoC', '2020-03-06 13:53:02');

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
(1, 'Dan', 'danhirst123@gmail.com', NULL, '$2y$10$YOWSNLiIqL/94XhyK/UvruUQ1vnBaJF/TRio.n2uUcqVl5YPxyPMC', 'UK', 20, 'Male', 'RWCzqP6UdDaymep8OWuegNZXxEMKyV6CDvT1Kpeqncc2vDv1PW64qO6vV87x', '2020-03-02 10:22:36', '2020-03-02 10:22:36'),
(3, 'Daniel', 'dan@danhirst.co.uk', NULL, '$2y$10$VSbDCjyZZ6vzShu03VgPGe1U5mhWynZdgm1MLAbmMfFwoe7IdkmDK', 'Other', 21, 'Male', NULL, '2020-03-03 20:27:17', '2020-03-03 20:27:17'),
(4, 'Dan', 'daniel@danhirst.co.uk', NULL, '$2y$10$T6Qf1gjXKsWBqxw8KTF25.FQWp3VOh4TgZe6gp2WfAVlWVA310nZS', 'England', 21, 'Other', NULL, '2020-03-03 20:32:10', '2020-03-03 20:32:10'),
(5, 'Tony', 'tony@gmail.com', NULL, '$2y$10$fghI8ImQkKaXJo5tylZVmuxMXWx.oZU15IDJCVZODa7Udx4vbWXpu', 'Other', 509, 'Other', NULL, '2020-03-05 12:22:56', '2020-03-05 12:22:56'),
(6, 'user-dan', 'user@test.com', NULL, '$2y$10$INukjlsZXh.8vLLdy9EJLu77CNO4169Rb6ehW2j1fVAArllsGP.zi', 'Other', 22, 'Other', '6HdVwf5CmlhOtrWgwyrhaL4McV9IkKlTZNbVQZbm98RBrA0q7SWypIabdAts', '2020-03-07 13:41:20', '2020-03-07 13:41:20'),
(8, 'UserTest', 'Test@Plymouth.ac.uk', NULL, '$2y$10$w27kupaHZbG6YLuO23nvhuRWfewzEM7CigyJk71iEk1Fq7.JWqSBq', 'Other', 21, 'Other', NULL, '2020-03-13 12:52:44', '2020-03-13 12:52:44'),
(9, 'daniels', 'dan@test.co.uk', NULL, '$2y$10$c3zGeb.ibz.MJnhJevkp0OsXiFhhwPOBRTJlKhui6NzNYGa2yvi7G', 'England', 20, 'Male', '9xupx6AV6dVLiM3M1kfG2DBTH1M1AKHfM9fAI4jjKyX28hkcVYY0H4EkMLxt', '2020-03-18 15:12:23', '2020-03-18 15:12:23'),
(10, 'test', 'test@example.com', NULL, '$2y$10$bPm/thE6.bsjA7Y8kHLe/uGl7v7zldLlv9Uh5ESmFKJx3KQhoZZJy', 'England', 23, 'Other', 'g5RpcsB6E6htzKFO1ASpUJ9DIpTyc6e241ER43DWxEVsqxaiAiV2MF1VAh1C', '2020-03-20 12:20:38', '2020-03-20 12:20:38');

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
(3, 1, '2020-03-01 23:00:00', '2020-03-02 10:00:00', 'Last night'),
(15, 6, '2020-04-03 22:30:00', '2020-04-04 07:30:00', 'Nothing interesting'),
(37, 1, '2020-03-13 23:00:00', '2020-03-14 08:00:00', 'sleep'),
(39, 1, '2020-03-15 10:55:00', '2020-03-16 20:00:00', ''),
(41, 1, '2020-03-18 20:00:00', '2020-03-19 07:00:00', ''),
(42, 1, '2020-03-13 21:00:00', '2020-03-14 05:00:00', ''),
(43, 6, '2020-03-12 23:30:00', '2020-03-13 07:30:00', 'Test sleep.'),
(44, 6, '2020-03-12 22:30:00', '2020-03-13 07:30:00', 'Fair sleep.'),
(45, 9, '2020-03-13 22:30:00', '2020-03-14 10:00:00', ''),
(46, 9, '2020-03-14 22:00:00', '2020-03-15 10:00:00', 'AAAAAAAAAAAAAAAA'),
(47, 9, '2020-03-14 23:59:00', '2020-03-15 06:00:00', 'No sleep'),
(48, 1, '2020-03-27 22:00:00', '2020-03-28 08:00:00', ''),
(51, 10, '2020-03-26 00:00:00', '2020-03-27 08:30:00', 'Slept well.');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_events`
-- (See below for the actual view)
--
CREATE TABLE `view_events` (
`description` varchar(255)
,`end_time` datetime
,`id` int(10)
,`start_time` datetime
,`title` varchar(255)
,`user_id` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sleep`
-- (See below for the actual view)
--
CREATE TABLE `view_sleep` (
`Sleep_End` datetime
,`Sleep_ID` int(11)
,`Sleep_Notes` varchar(255)
,`Sleep_Start` datetime
,`User_ID` int(10) unsigned
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sleep_api`
-- (See below for the actual view)
--
CREATE TABLE `view_sleep_api` (
`Sleep_End` datetime
,`Sleep_Start` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_users`
-- (See below for the actual view)
--
CREATE TABLE `view_users` (
`age` int(11)
,`country` varchar(255)
,`email` varchar(255)
,`gender` varchar(255)
,`id` int(10) unsigned
,`name` varchar(255)
,`password` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_events`
--
DROP TABLE IF EXISTS `view_events`;

CREATE ALGORITHM=UNDEFINED DEFINER=`PRCO204_C`@`%` SQL SECURITY DEFINER VIEW `view_events`  AS  select `end`.`id` AS `id`,`end`.`user_id` AS `user_id`,`end`.`title` AS `title`,`end`.`description` AS `description`,`end`.`start_time` AS `start_time`,`end`.`end_time` AS `end_time` from `events` `end` ;

-- --------------------------------------------------------

--
-- Structure for view `view_sleep`
--
DROP TABLE IF EXISTS `view_sleep`;

CREATE ALGORITHM=UNDEFINED DEFINER=`PRCO204_C`@`%` SQL SECURITY DEFINER VIEW `view_sleep`  AS  select `end`.`Sleep_ID` AS `Sleep_ID`,`end`.`User_ID` AS `User_ID`,`end`.`Sleep_Start` AS `Sleep_Start`,`end`.`Sleep_End` AS `Sleep_End`,`end`.`Sleep_Notes` AS `Sleep_Notes` from `user_sleep` `end` ;

-- --------------------------------------------------------

--
-- Structure for view `view_sleep_api`
--
DROP TABLE IF EXISTS `view_sleep_api`;

CREATE ALGORITHM=UNDEFINED DEFINER=`PRCO204_C`@`%` SQL SECURITY DEFINER VIEW `view_sleep_api`  AS  select `user_sleep`.`Sleep_Start` AS `Sleep_Start`,`user_sleep`.`Sleep_End` AS `Sleep_End` from `user_sleep` ;

-- --------------------------------------------------------

--
-- Structure for view `view_users`
--
DROP TABLE IF EXISTS `view_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`PRCO204_C`@`%` SQL SECURITY DEFINER VIEW `view_users`  AS  select `end`.`id` AS `id`,`end`.`name` AS `name`,`end`.`email` AS `email`,`end`.`password` AS `password`,`end`.`country` AS `country`,`end`.`age` AS `age`,`end`.`gender` AS `gender` from `users` `end` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_sleep`
--
ALTER TABLE `user_sleep`
  MODIFY `Sleep_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_sleep`
--
ALTER TABLE `user_sleep`
  ADD CONSTRAINT `user_sleep_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_sleep_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
