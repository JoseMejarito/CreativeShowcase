-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 11, 2024 at 08:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creative_showcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `artist_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `department_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `main_media` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`artist_id`, `name`, `bio`, `department_id`, `created_at`, `updated_at`, `main_media`) VALUES
(5, 'Elizabeth Marie G. Cristobal', '4th Year BS Psych', 2, '2024-12-11 01:41:41', '2024-12-11 01:41:41', 'public/6758edd56b532-blank-profile-picture.png'),
(6, 'Charlene Anne B. Dimaano', 'Pioneer member of APDC and PTC', 2, '2024-12-11 01:42:32', '2024-12-11 02:07:44', 'public/6758ee088b15c-blank-profile-picture.png'),
(7, 'John Kenneth S. Martinez', '3rd Year BS SE/Filipino', 4, '2024-12-11 01:43:27', '2024-12-11 01:43:27', 'public/6758ee3ff2209-blank-profile-picture.png'),
(8, 'Kathleen Jane T. Valenzuela', '4th Year BS PSYCH', 2, '2024-12-11 01:44:25', '2024-12-11 01:44:25', 'public/6758ee7926190-blank-profile-picture.png'),
(9, 'Mark Aeron A. Faller', '2nd Year BPE', 4, '2024-12-11 01:46:44', '2024-12-11 01:46:44', 'public/6758ef042054d-blank-profile-picture.png'),
(10, 'Lynette Gian P. Feliciano', '2nd Year BS BA/HRM', 7, '2024-12-11 01:48:37', '2024-12-11 01:48:37', 'public/6758ef7574e9c-6758edd56b532-blank-profile-picture.png'),
(11, 'Jean Maica V. Gabarda	', 'Grade 12 HUMSS', 1, '2024-12-11 01:50:08', '2024-12-11 01:50:08', 'public/6758efd062dd2-6758edd56b532-blank-profile-picture.png'),
(12, 'Alexandra Beatrice G. Pancho', 'I am a 2-year Agos Perpetual Dance Company member (since 2023), and was part of events such as Tagsibol (the group’s first dance concert), Biñan Folk Dance Competition 2024 (the group’s first outside competition),  and many more. Moreover, I am the current Secretary of the group.', 1, '2024-12-11 01:51:20', '2024-12-11 02:09:09', 'public/6758f44594f64-IMG_4675 - Alexandra Beatrice G. Pancho.jpeg'),
(13, 'Cherrybelle G. Zara', 'Grade 12 TVL HE', 1, '2024-12-11 01:52:30', '2024-12-11 01:52:30', 'public/6758f05ecd2b4-6758ee3ff2209-blank-profile-picture.png');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `collection_id` int(11) UNSIGNED NOT NULL,
  `collection_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `main_media` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`collection_id`, `collection_name`, `description`, `created_at`, `updated_at`, `main_media`) VALUES
(1, 'Dance', 'Explore breathtaking performances and movements captured through dance.', '2024-12-09 16:17:12', '2024-12-09 16:32:56', 'public/6757180887571_collection-dance.jpg'),
(3, 'Music', 'Musical compositions and performances that highlight artistic talents and skills.', '2024-12-09 16:35:41', '2024-12-09 16:35:41', 'public/67571c5d8430a_67571c06edb51_collection-music.JPG'),
(4, 'Theater', 'A look into performances that bring stories to life.', '2024-12-09 16:36:19', '2024-12-09 16:36:19', 'public/67571c835595f_collection-acting.jpg'),
(5, 'Production', 'An engaging showcase of behind-the-scenes creativity, bringing together the collaborative efforts and technical artistry that brings performances and projects to life.', '2024-12-10 17:58:24', '2024-12-10 17:58:24', 'public/6758814020d73_Copy of IMG_9753.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(1, 'Basic Education'),
(2, 'College of Arts and Sciences'),
(3, 'College of Computer Studies'),
(4, 'College of Education'),
(5, 'College of Criminology'),
(6, 'College of Maritime Education'),
(7, 'College of Business and Accountancy'),
(8, 'College of Engineering and Aviation'),
(9, 'College of International Hospitality Management'),
(10, 'College of Law');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `main_media` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_collections`
--

CREATE TABLE `event_collections` (
  `event_id` int(11) UNSIGNED NOT NULL,
  `collection_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_groups`
--

CREATE TABLE `event_groups` (
  `event_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `main_media` varchar(255) NOT NULL,
  `collection_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `description`, `main_media`, `collection_id`) VALUES
(2, 'Agos Perpetual Dance Company', 'Inspired by free-flowing, fluidity, non-conforming versatility, the university dance ensemble of the University of Perpetual Help System Laguna, is intended to preserve and promote traditional and folk dances, and with integrations of contemporary dance, jazz, and modern dance. The artist-members consist of males and females across levels from Junior High, Senior High, and College, trained and mentored by Mr. Mark Joseph Montiano. The Agos Perpetual Dance Company is under the management of the UPHSL Center for Culture and Arts, headed by the Director for Culture and Arts, Mr. Bryan Neil B. Ladim, LPT MAEd.', '6758f11d687aa_Copy of APDC for Binan Folk Dance Festival.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_artists`
--

CREATE TABLE `group_artists` (
  `group_id` int(11) UNSIGNED NOT NULL,
  `artist_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_artists`
--

INSERT INTO `group_artists` (`group_id`, `artist_id`) VALUES
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  `main_media` varchar(255) NOT NULL,
  `sub_media1` varchar(255) NOT NULL,
  `sub_media2` varchar(255) DEFAULT NULL,
  `sub_media3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `title`, `author`, `content`, `date_posted`, `main_media`, `sub_media1`, `sub_media2`, `sub_media3`) VALUES
(5, 'Test News 1', 'John Doe', 'Brief description of the news 1', '2024-12-07 11:51:45', 'public/675436d112359-news1.jpg', 'public/675436d113170-cca-cover.png', NULL, NULL),
(6, 'Test News 2', 'John Doe', 'Brief description of the news', '2024-12-07 11:52:34', 'public/6754370213f9e-news2.jpg', 'public/67543702143ad-cca-cover.png', NULL, NULL),
(7, 'Test News 3', 'John Doe', 'Brief Description of News 3', '2024-12-07 11:53:51', 'public/6754374f7be9a-news3.jpg', 'public/6754374f7c1b8-cca-cover.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `work_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `main_media` varchar(255) NOT NULL,
  `sub_media1` varchar(255) NOT NULL,
  `sub_media2` varchar(255) DEFAULT NULL,
  `sub_media3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`work_id`, `title`, `description`, `created_at`, `updated_at`, `main_media`, `sub_media1`, `sub_media2`, `sub_media3`) VALUES
(1, '𝗞𝗮𝗮𝗹𝗮𝗺𝗮𝗻𝗴 𝗣𝗮𝗻𝗴𝗸𝘂𝗹𝘁𝘂𝗿𝗮!', '𝙎𝙪𝙢𝙖𝙮𝙖𝙬 𝙨𝙖 𝙢𝙖𝙨𝙞𝙜𝙡𝙖𝙣𝙜 𝙢𝙪𝙣𝙙𝙤 𝙣𝙜 𝙢𝙜𝙖 𝙠𝙖𝙩𝙪𝙩𝙪𝙗𝙤𝙣𝙜 𝙨𝙖𝙮𝙖𝙬 𝙨𝙖 𝙋𝙞𝙡𝙞𝙥𝙞𝙣𝙖𝙨!  🌊\r\nAlam niyo ba…\r\nNa pwedeng ipakita sa pamamagitan ng Sayaw ang ating kultura, tradisyon, at ang mga kwento ng ating mga ninuno! \r\nHalina&amp;amp;#039;t makiisa sa 𝘼𝙜𝙤𝙨 𝙋𝙚𝙧𝙥𝙚𝙩𝙪𝙖𝙡 𝘿𝙖𝙣𝙘𝙚 𝘾𝙤𝙢𝙥𝙖𝙣𝙮 sa pagkilala ng ating yaman at pagkakaiba-iba! Tunghayan ang Isang paglalakbay na puno ng saya at paggalang sa ating makulay na sining at kultura!\r\n𝐔𝐏𝐇𝐒𝐋 𝐂𝐞𝐧𝐭𝐞𝐫 𝐟𝐨𝐫 𝐂𝐮𝐥𝐭𝐮𝐫𝐞 𝐚𝐧𝐝 𝐀𝐫𝐭𝐬\r\n&amp;amp;quot;𝑻𝒉𝒆 𝑯𝒐𝒎𝒆 𝒐𝒇 𝑪𝒖𝒍𝒕𝒖𝒓𝒂𝒍 𝑬𝒙𝒄𝒆𝒍𝒍𝒆𝒏𝒄𝒆,\r\n𝑻𝒉𝒆 𝑪𝒐𝒓𝒆 𝒐𝒇 𝑨𝒓𝒕𝒔 𝑺𝒆𝒓𝒗𝒂𝒏𝒕𝒉𝒐𝒐𝒅&amp;amp;quot;', '2024-12-11 05:13:43', '2024-12-11 05:28:56', 'public/67591f878f26a-464001440_422255447561458_7675050023524009056_n.jpg', 'public/67591f878f89f-463836365_422255550894781_8774288515444647786_n.jpg', 'public/67591f878fca1-463895528_422255620894774_1159525774887308144_n.jpg', 'public/67591f879008f-463865855_422255744228095_1019131971269167205_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `works_collections`
--

CREATE TABLE `works_collections` (
  `work_id` int(11) UNSIGNED NOT NULL,
  `collection_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `works_collections`
--

INSERT INTO `works_collections` (`work_id`, `collection_id`) VALUES
(1, 1),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `work_groups`
--

CREATE TABLE `work_groups` (
  `work_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_groups`
--

INSERT INTO `work_groups` (`work_id`, `group_id`) VALUES
(1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`artist_id`),
  ADD KEY `fk_artists_department` (`department_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`collection_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_collections`
--
ALTER TABLE `event_collections`
  ADD PRIMARY KEY (`event_id`,`collection_id`),
  ADD KEY `fk_event_collections_collection` (`collection_id`);

--
-- Indexes for table `event_groups`
--
ALTER TABLE `event_groups`
  ADD PRIMARY KEY (`event_id`,`group_id`),
  ADD KEY `fk_event_groups_group` (`group_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `fk_groups_collection` (`collection_id`);

--
-- Indexes for table `group_artists`
--
ALTER TABLE `group_artists`
  ADD PRIMARY KEY (`group_id`,`artist_id`),
  ADD KEY `artist_id` (`artist_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`work_id`);

--
-- Indexes for table `works_collections`
--
ALTER TABLE `works_collections`
  ADD PRIMARY KEY (`work_id`,`collection_id`),
  ADD KEY `fk_work_id` (`work_id`),
  ADD KEY `fk_collection_id` (`collection_id`);

--
-- Indexes for table `work_groups`
--
ALTER TABLE `work_groups`
  ADD PRIMARY KEY (`work_id`,`group_id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `collection_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `work_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artists`
--
ALTER TABLE `artists`
  ADD CONSTRAINT `fk_artists_department` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE SET NULL;

--
-- Constraints for table `event_collections`
--
ALTER TABLE `event_collections`
  ADD CONSTRAINT `fk_event_collections_collection` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`collection_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_event_collections_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE;

--
-- Constraints for table `event_groups`
--
ALTER TABLE `event_groups`
  ADD CONSTRAINT `fk_event_groups_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_event_groups_group` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `fk_groups_collection` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`collection_id`) ON DELETE SET NULL;

--
-- Constraints for table `group_artists`
--
ALTER TABLE `group_artists`
  ADD CONSTRAINT `group_artists_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_artists_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`artist_id`) ON DELETE CASCADE;

--
-- Constraints for table `works_collections`
--
ALTER TABLE `works_collections`
  ADD CONSTRAINT `fk_works_collections_collection` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`collection_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_works_collections_work` FOREIGN KEY (`work_id`) REFERENCES `works` (`work_id`) ON DELETE CASCADE;

--
-- Constraints for table `work_groups`
--
ALTER TABLE `work_groups`
  ADD CONSTRAINT `work_groups_ibfk_1` FOREIGN KEY (`work_id`) REFERENCES `works` (`work_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_groups_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
