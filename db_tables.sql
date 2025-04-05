-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2025 at 04:50 PM
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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(3, 'admin', '$2y$10$iB9DLZ6BSwult7GNVGzInOv04n1XpZ9tSjNQNlpDoPL3JgPvJpltC', '2025-04-05 14:30:47', '2025-04-05 14:42:08');

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
(6, 'Charlene Anne B. Dimaano', 'Pioneer member of APDC and PTC', 2, '2024-12-11 01:42:32', '2024-12-13 17:28:09', 'public/675c6ea964cfa-IMG_5991 - Charlene Anne B. Dimaano.jpeg'),
(7, 'John Kenneth S. Martinez', '3rd Year BS SE/Filipino', 4, '2024-12-11 01:43:27', '2024-12-11 01:43:27', 'public/6758ee3ff2209-blank-profile-picture.png'),
(8, 'Kathleen Jane T. Valenzuela', '4th Year BS PSYCH', 2, '2024-12-11 01:44:25', '2024-12-13 17:37:08', 'public/675c70c4e82d2-448700830_2281895708811506_2496382842054825125_n.jpg'),
(9, 'Mark Aeron A. Faller', '2nd Year BPE', 4, '2024-12-11 01:46:44', '2024-12-13 17:38:07', 'public/675c70ff3de75-460310854_537914288747060_6053160113842328583_n.jpg'),
(10, 'Lynette Gian P. Feliciano', '2nd Year BS BA/HRM', 7, '2024-12-11 01:48:37', '2024-12-13 17:39:09', 'public/675c713db9400-466428083_1726991014528004_8110333696284097457_n.jpg'),
(11, 'Jean Maica V. Gabarda	', 'Grade 12 HUMSS', 1, '2024-12-11 01:50:08', '2024-12-11 01:50:08', 'public/6758efd062dd2-6758edd56b532-blank-profile-picture.png'),
(12, 'Alexandra Beatrice G. Pancho', 'I am a 2-year Agos Perpetual Dance Company member (since 2023), and was part of events such as Tagsibol (the group’s first dance concert), Biñan Folk Dance Competition 2024 (the group’s first outside competition),  and many more. Moreover, I am the current Secretary of the group.', 1, '2024-12-11 01:51:20', '2024-12-11 02:09:09', 'public/6758f44594f64-IMG_4675 - Alexandra Beatrice G. Pancho.jpeg'),
(13, 'Cherrybelle G. Zara', 'Grade 12 TVL HE', 1, '2024-12-11 01:52:30', '2024-12-11 01:52:30', 'public/6758f05ecd2b4-6758ee3ff2209-blank-profile-picture.png'),
(14, 'Lady Gwyneth P. Feliciano', '3rd Year BS PSYCH', 2, '2024-12-13 13:51:35', '2024-12-13 13:51:35', 'public/675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(15, 'Jasmine Mikyla C. Espina', '1st Year BS CE', 8, '2024-12-13 13:55:45', '2024-12-13 13:55:45', 'public/675c3ce194f64-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(16, 'Harold Kent C. Jose', '2nd Year BS OT', 12, '2024-12-13 14:13:57', '2024-12-13 14:13:57', 'public/675c41250f7b5-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(17, 'Jorell Vincent Mangahas', 'Grade 12 STEM', 1, '2024-12-13 14:15:02', '2024-12-13 14:15:02', 'public/675c4166911b6-675c41250f7b5-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(18, 'Jerome Nicollai C. Mojica', '2nd Year BA COMM', 2, '2024-12-13 14:16:27', '2024-12-13 14:16:27', 'public/675c41bb6a056-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(19, 'Greg M. Ricamara', '2nd Year BA COMM', 2, '2024-12-13 14:17:38', '2024-12-13 14:18:26', 'public/675c420201934-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(20, 'Chrishena Marie P. Rico', 'Grade 12 ABM', 1, '2024-12-13 14:19:21', '2024-12-13 14:19:21', 'public/675c426988526-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(21, 'Wilchard R. Supelana Jr.', '3rd Year BS BA/Mktg Mgt', 7, '2024-12-13 14:22:29', '2024-12-13 14:22:29', 'public/675c432589f1f-IMG_1242 - Wilchard Jr. R. Supelana.jpeg'),
(22, 'Rainier Anthon A. Veloso', '2nd Year BA COMM', 2, '2024-12-13 14:23:51', '2024-12-13 14:23:51', 'public/675c437744896-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(23, 'Nathan Ieze Joachim Z. Ambas', '1st Year BA COMM', 2, '2024-12-13 14:56:21', '2024-12-13 14:56:21', 'public/675c4b159d3ed-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(24, 'Zandro D. Habana', '2nd Year BA COMM', 2, '2024-12-13 14:57:26', '2024-12-13 14:57:26', 'public/675c4b5652696-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(25, 'Sherwin P. Limosnero', '2nd Year BS IT', 3, '2024-12-13 14:58:20', '2024-12-13 14:58:20', 'public/675c4b8c4a239-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(26, 'Alweyn Joshua V. Palomares', '1st Year BA COMM', 2, '2024-12-13 14:59:13', '2024-12-13 14:59:13', 'public/675c4bc117893-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(27, 'Patricia Mae Aquino', '2nd Year BS CE', 8, '2024-12-13 15:00:28', '2024-12-13 15:00:28', 'public/675c4c0c1af53-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(28, 'Jomaicha M. Ferrer', 'Grade 12 STEM', 1, '2024-12-13 15:01:19', '2024-12-13 15:01:19', 'public/675c4c3f4e8e5-675c437744896-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(29, 'Maya Eleysse O. Oliveros', '2nd Year BS CE', 8, '2024-12-13 15:02:06', '2024-12-13 15:02:06', 'public/675c4c6ee4642-675c437744896-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(30, 'Yliza Devon A. Gragasin', 'Grade 12 TVL ICT', 1, '2024-12-13 15:04:44', '2024-12-13 15:04:44', 'public/675c4d0c399e0-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(31, 'Leslhey Anne Q. Aguilar', '4th Year BA COMM', 2, '2024-12-13 17:45:15', '2024-12-13 17:45:15', 'public/675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(32, 'Sydney Ray Almarinez', 'Grade 12 HUMSS', 1, '2024-12-13 17:46:03', '2024-12-13 17:46:03', 'public/675c72db64154-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(33, 'Louie James P. Layola', '2nd Year BA COMM', 2, '2024-12-13 17:47:30', '2024-12-13 17:47:30', 'public/675c7332a9f76-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(34, 'Margarette Johnne S. Llanto', 'Grade 11 STEM', 1, '2024-12-13 17:48:20', '2024-12-13 17:48:20', 'public/675c73642bbe4-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(35, 'Carl Vincent J. Magistrado', '3rd Year BA COMM', 2, '2024-12-13 17:49:02', '2024-12-13 17:49:02', 'public/675c738e17283-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(36, 'Maria Angelica P. Salvador', '4th Year BA COMM', 2, '2024-12-13 17:49:47', '2024-12-13 17:49:47', 'public/675c73bb28663-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(37, 'Patricia Alexis R. Rosal', '4th Year BA PSYCH', 2, '2024-12-13 18:00:02', '2024-12-13 18:00:02', 'public/675c762282ee8-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(38, 'Ma. Elijah F. Santiago', 'Grade 12 HUMSS', 1, '2024-12-13 18:00:51', '2024-12-13 18:00:51', 'public/675c765332478-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(39, 'Ram Cedric J. Santiago', 'Grade 12 Arts and Design', 1, '2024-12-13 18:01:39', '2024-12-13 18:01:39', 'public/675c768377e9b-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(40, 'Jeune Cathleen N. De Jesus', '1st Year BS BA/Mktg Mgt', 7, '2024-12-13 18:02:42', '2024-12-13 18:02:42', 'public/675c76c2e5645-675c765332478-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(41, 'Bernice S. Segura', 'Grade 12 STEM', 1, '2024-12-13 18:03:31', '2024-12-13 18:03:31', 'public/675c76f3a55a8-675c765332478-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(42, 'Jhai Klairo S. Timan', 'Grade 12 Arts and Design', 1, '2024-12-13 18:04:21', '2024-12-13 18:04:21', 'public/675c7725a8a78-675c768377e9b-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(43, 'Maxine Gione S. Bautista', 'Grade 11 STEM', 1, '2024-12-13 18:07:29', '2024-12-13 18:07:29', 'public/675c77e142dd8-675c768377e9b-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(44, 'Icar Danil B. De Leon', 'Grade 12 STEM', 1, '2024-12-13 18:08:10', '2024-12-13 18:08:10', 'public/675c780aca043-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(45, 'Zurie A. Galicia', 'Grade 12 Arts and Design', 1, '2024-12-13 18:08:53', '2024-12-13 18:08:53', 'public/675c7835cc6d0-675c765332478-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(46, 'Andrei Nathaniel G. Juan', 'Grade 12 ABM', 1, '2024-12-13 18:09:35', '2024-12-13 18:09:35', 'public/675c785fc7fc3-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(47, 'Zhamira Zen E. Magdaong', 'Grade 12 ABM', 1, '2024-12-13 18:10:17', '2024-12-13 18:10:17', 'public/675c788973bbc-675c7332a9f76-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(48, 'Louise Amiel B. Navarro', 'Grade 11 STEM', 1, '2024-12-13 18:11:04', '2024-12-13 18:11:04', 'public/675c78b808e87-675c7725a8a78-675c768377e9b-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(49, 'Rafael Guillien I. Pangilinan', 'Grade 12 STEM', 1, '2024-12-13 18:11:44', '2024-12-13 18:11:44', 'public/675c78e0792ba-675c780aca043-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(50, 'Rhion T. Pardiñas', 'Grade 12 STEM', 1, '2024-12-13 18:12:21', '2024-12-13 18:12:21', 'public/675c790523a68-675c780aca043-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png'),
(51, 'Dominique C. Zapata', 'Grade 12 STEM', 1, '2024-12-13 18:13:01', '2024-12-13 18:13:01', 'public/675c792d8d859-675c785fc7fc3-675c72ab8602b-675c3be7c3c8a-6758edd56b532-blank-profile-picture.png');

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
(8, 'College of Engineering and Architecture'),
(9, 'College of International Hospitality Management'),
(10, 'College of Law'),
(11, 'College of Aviation'),
(12, 'Occupational Therapy');

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

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `description`, `date_start`, `date_end`, `location`, `created_at`, `updated_at`, `main_media`) VALUES
(5, 'MGA SULAT: Mga Pag-ibig at Pumapag-ibig An SPR-PSC Collab Concert', 'Rondalla Concerto\r\n&\r\nChorale Concert', '2025-01-23', '2025-01-24', 'TBA', '2024-12-12 15:10:34', '2024-12-12 15:10:34', '1734016234_Copy of 4.png'),
(6, 'MULA SA LIMANG BUWAN: Mga Kwento ng Tsina Perpetual Theater Collective’s Children’s Theater', 'One-Act Children’s Theater Play', '2025-03-10', '2025-03-11', 'TBA', '2024-12-12 15:18:02', '2024-12-12 15:18:02', '1734016682_Copy of IMG_4998.jpg'),
(7, 'MARGIE CON YEAR 2: Providing a Space for Perpetualite Artists', 'Art Festival /\r\nArts Fair', '2025-04-22', '2025-04-23', 'TBA', '2024-12-12 15:22:49', '2024-12-12 15:22:49', '1734016969_Copy of IMG_9753 (1).JPG'),
(8, 'Season Closing /  Festival of Performances', 'Season Closing / \r\nFestival of Performances\r\n', '2025-05-02', '2025-05-02', 'TBA', '2024-12-12 15:36:00', '2024-12-12 15:36:00', '1734017760_Copy of _DSC1467.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `event_collections`
--

CREATE TABLE `event_collections` (
  `event_id` int(11) UNSIGNED NOT NULL,
  `collection_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_collections`
--

INSERT INTO `event_collections` (`event_id`, `collection_id`) VALUES
(5, 3),
(5, 5),
(6, 4),
(6, 5),
(7, 5),
(8, 1),
(8, 3),
(8, 4),
(8, 5);

-- --------------------------------------------------------

--
-- Table structure for table `event_groups`
--

CREATE TABLE `event_groups` (
  `event_id` int(11) UNSIGNED NOT NULL,
  `group_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_groups`
--

INSERT INTO `event_groups` (`event_id`, `group_id`) VALUES
(5, 3),
(5, 4),
(5, 7),
(6, 5),
(6, 7),
(7, 7),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(8, 7);

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
(2, 'Agos Perpetual Dance Company', 'Inspired by free-flowing, fluidity, non-conforming versatility, the university dance ensemble of the University of Perpetual Help System Laguna, is intended to preserve and promote traditional and folk dances, and with integrations of contemporary dance, jazz, and modern dance. The artist-members consist of males and females across levels from Junior High, Senior High, and College, trained and mentored by Mr. Mark Joseph Montiano. The Agos Perpetual Dance Company is under the management of the UPHSL Center for Culture and Arts, headed by the Director for Culture and Arts, Mr. Bryan Neil B. Ladim, LPT MAEd.', '6758f11d687aa_Copy of APDC for Binan Folk Dance Festival.jpg', 1),
(3, 'Perpetual Symphonic Chorus', 'The university chorale of the University of Perpetual Help System Laguna. A harmonious arrangement of sound, valuing both original Filipino music and foreign songs alike, with explorations of classic and modern compositions. The ensemble consists of males and females across levels from Senior High School and College, with their Trainer, Mr. Richard Lisano. The Perpetual Symphony Chorus is under the management of the UPHSL Center for Culture and Arts, headed by the Director for Culture and Arts, Mr. Bryan Neil B. Ladim, LPT MAEd.\r\n', '675ad58cb0d1f_Copy of IMG_4117.jpg', 3),
(4, 'SERENADA PERPETUAL RONDALLA', 'The university rondalla of the University of Perpetual Help System Laguna. An ensemble of guitar players of bandurria, octavina, guitara, and bajo de arco, venturing on a serenade of traditional folk music and classic popular songs, and modern pop songs with different tone and flavor. With only limited schools around Biñan Laguna who have their in-house rondalla group, the university takes pride in being one of those few schools. The artist-members consist of males and females across levels from Senior High and College; trained and mentored by Maestro Alfred Augustine Arciaga. The Serenada Perpetual Rondalla is under the management of the UPHSL Center for Culture and Arts, headed by Mr. Bryan Neil B. Ladim, LPT MAEd.', '675ad64e0c085_Copy of IMG_3403.JPG', 3),
(5, 'PERPETUAL THEATER COLLECTIVE', 'The university theater ensemble of the University of Perpetual Help System Laguna, focusing on theatrical performances of plays, dramas, and musicals; celebrating classical literatures presented in a modern perspective, and threading to experiment collaborative works and interdisciplinary approaches. The members  consist of males and females across levels from Junior High, Senior High, and College. Trained and mentored by Mr. Bryan Neil B. Ladim, LPT MAEd, the Director for Culture and Arts. The Perpetual Theater Collective is under the management of the UPHSL Center for Culture and Arts.', '675ad6f07daf3_Copy of IMG_4998.jpg', 4),
(6, 'PERPETUAL BRASS BAND', 'The marching band of the University of Perpetual Help System Laguna. The band features players of brass horns, wood wind, and percussion, with majorettes. The band is intended to marry classic music and modern songs, breathing fresh, contemporary sound into the pieces. The artist-members consist of players of trombone, trumpet, clarinet, flute, saxophone, percussion, and tuba, of males and females from Senior High and College. The Perpetual Brass Band is under the management of UPHSL Center for Culture and Arts, headed by Mr. Bryan Neil B. Ladim, LPT MAEd.', '675ad7d803b29_Copy of _MG_7933.JPG', 3),
(7, 'UGNAYANG PERPETUAL PROJECT MANAGEMENT TEAM', 'The specially designed university group of the University of Perpetual Help System Laguna, backboning the various art events and projects of the different in-house groups. The ensemble will cover production management work of correspondences, coordination, budgeting, creatives, media promotion, and sponsorship; stage management of lights boarding, sound engineering, cueing, design work and execution. The group was formulated as a response to the need to support and assist every project and event–the truest nature of arts servanthood. The artist-members consist of males and females from across levels from Senior High and College, trained and mentored by Mr. Bryan Neil Ladim, LPT MAEd, the Director for Culture and Arts. The Ugnayang Perpetual Project Management Team is under the management of the UPHSL Center for Culture and Arts.', '675ad838ec189_Copy of IMG_9753 (1).JPG', 5);

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
(2, 13),
(3, 14),
(3, 15),
(3, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(5, 6),
(5, 31),
(5, 32),
(5, 33),
(5, 34),
(5, 35),
(5, 36),
(7, 33),
(7, 37),
(7, 38),
(7, 39),
(7, 40),
(7, 41),
(7, 42),
(7, 43),
(7, 44),
(7, 45),
(7, 46),
(7, 47),
(7, 48),
(7, 49),
(7, 50),
(7, 51);

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
(5, 'Gabi Ng Parangal', 'Center For Culture and Arts', 'ＣＯＮＧＲＡＴＵＬＡＴＩＯＮＳ| 𝐏𝐞𝐫𝐩𝐞𝐭𝐮𝐚𝐥 𝐓𝐡𝐞𝐚𝐭𝐞𝐫 𝐂𝐨𝐥𝐥𝐞𝐜𝐭𝐢𝐯𝐞\r\n𝑮𝒂𝒃𝒊 𝒏𝒈 𝑷𝒂𝒓𝒂𝒏𝒈𝒂𝒍\r\n6𝘵𝘩 𝘋𝘶𝘭𝘢𝘮𝘣𝘢𝘺𝘢𝘯: 𝘋𝘶𝘭𝘢𝘢𝘯 𝘯𝘨 𝘉𝘢𝘺𝘢𝘯\r\n𝘉𝘪ñ𝘢𝘯 𝘛𝘩𝘦𝘢𝘵𝘦𝘳 𝘈𝘳𝘵𝘴 𝘍𝘦𝘴𝘵𝘪𝘷𝘢𝘭\r\n𝐌𝐚𝐫𝐜𝐡 𝟖, 𝟐𝟎𝟐𝟓. 𝐏𝐥𝐚𝐳𝐚 𝐑𝐢𝐳𝐚𝐥, 𝐁𝐢ñ𝐚𝐧. Congratulations to our university theater ensemble, 𝑷𝒆𝒓𝒑𝒆𝒕𝒖𝒂𝒍 𝑻𝒉𝒆𝒂𝒕𝒆𝒓 𝑪𝒐𝒍𝒍𝒆𝒄𝒕𝒊𝒗𝒆, for winning (𝟱) 𝗮𝘄𝗮𝗿𝗱𝘀 during the Gabi ng Parangal, for the 6th Dulambayan: Dulaan ng Bayan, Biñan Theater Arts Festival.\r\n𝐁𝐄𝐒𝐓 𝐏𝐑𝐎𝐃𝐔𝐂𝐓𝐈𝐎𝐍\r\n𝘚𝘪𝘴𝘪𝘥𝘭𝘢𝘯, 𝘗𝘦𝘳𝘱𝘦𝘵𝘶𝘢𝘭 𝘛𝘩𝘦𝘢𝘵𝘦𝘳 𝘊𝘰𝘭𝘭𝘦𝘤𝘵𝘪𝘷𝘦\r\n𝐁𝐄𝐒𝐓 𝐃𝐈𝐑𝐄𝐂𝐓𝐎𝐑\r\n𝘋𝘪𝘳𝘦𝘬 𝘉𝘳𝘺𝘢𝘯 𝘕𝘦𝘪𝘭 𝘓𝘢𝘥𝘪𝘮\r\n𝐁𝐄𝐒𝐓 𝐀𝐂𝐓𝐑𝐄𝐒𝐒\r\n𝘔𝘢𝘳𝘪𝘢 𝘈𝘯𝘨𝘦𝘭𝘪𝘤𝘢 𝘚𝘢𝘭𝘷𝘢𝘥𝘰𝘳\r\n𝐁𝐄𝐒𝐓 𝐓𝐄𝐂𝐇𝐍𝐈𝐂𝐀𝐋\r\n𝘚𝘪𝘴𝘪𝘥𝘭𝘢𝘯, 𝘗𝘦𝘳𝘱𝘦𝘵𝘶𝘢𝘭 𝘛𝘩𝘦𝘢𝘵𝘦𝘳 𝘊𝘰𝘭𝘭𝘦𝘤𝘵𝘪𝘷𝘦\r\n𝐁𝐄𝐒𝐓 𝐏𝐑𝐎𝐃𝐔𝐂𝐓𝐈𝐎𝐍 𝐃𝐄𝐒𝐈𝐆𝐍\r\n𝘚𝘪𝘴𝘪𝘥𝘭𝘢𝘯, 𝘗𝘦𝘳𝘱𝘦𝘵𝘶𝘢𝘭 𝘛𝘩𝘦𝘢𝘵𝘦𝘳 𝘊𝘰𝘭𝘭𝘦𝘤𝘵𝘪𝘷𝘦\r\n𝐒𝐈𝐒𝐈𝐃𝐋𝐀𝐍\r\nHango mula sa 𝘕𝘪𝘨𝘦𝘳𝘪𝘢𝘯 𝘗𝘭𝘢𝘺 na, 𝘛𝘩𝘦 𝘚𝘵𝘳𝘰𝘯𝘨 𝘉𝘳𝘦𝘦𝘥, ni Wole Soyinka\r\nSalin, Adaptasyon, at Direksyon ni Direk Bryan Neil Ladim\r\nAng Official Entry ng Perpetual Theater Collective\r\nPara sa 6th Dulambayan: Dulaan ng Bayan\r\nBiñan Theater Arts Festival\r\n𝐔𝐏𝐇𝐒𝐋 𝐂𝐞𝐧𝐭𝐞𝐫 𝐟𝐨𝐫 𝐂𝐮𝐥𝐭𝐮𝐫𝐞 𝐚𝐧𝐝 𝐀𝐫𝐭𝐬\r\n&quot;𝑻𝒉𝒆 𝑯𝒐𝒎𝒆 𝒐𝒇 𝑪𝒖𝒍𝒕𝒖𝒓𝒂𝒍 𝑬𝒙𝒄𝒆𝒍𝒍𝒆𝒏𝒄𝒆\r\n𝑻𝒉𝒆 𝑪𝒐𝒓𝒆 𝒐𝒇 𝑨𝒓𝒕𝒔 𝑺𝒆𝒓𝒗𝒂𝒏𝒕𝒉𝒐𝒐𝒅&quot;\r\n#UPHSLCCA #CenterforCultureandArts\r\n#SISIDLAN #PerpetualTheaterCollective\r\n#6thDulambayan #Dulambayan2025\r\n#GabiNgParangal', '2024-12-07 11:51:45', 'public/67e65d5062f67-482220982_1077157147782318_8059769067233051546_n.jpg', 'public/675436d113170-cca-cover.png', NULL, NULL),
(6, 'PTC XP: Pagsubok | Perpetual Theater Collective', 'Center For Culture and Arts', '𝐏𝐓𝐂 𝐗𝐏: 𝐏𝐚𝐠𝐬𝐮𝐛𝐨𝐤 | 𝐏𝐞𝐫𝐩𝐞𝐭𝐮𝐚𝐥 𝐓𝐡𝐞𝐚𝐭𝐞𝐫 𝐂𝐨𝐥𝐥𝐞𝐜𝐭𝐢𝐯𝐞 \r\nSamahan niyo kaming tunghayan ang apat na dulang handog ng Perpetual Theater Collective sa paparating na 𝗔𝗽𝗿𝗶𝗹 𝟮𝟮 &amp;amp; 𝟮𝟯, 𝟮𝟬𝟮𝟱.\r\n“𝐇𝐎𝐘 𝐒𝐍𝐀𝐓𝐂𝐇!”\r\nAkda at Direksyon ni\r\n𝘊𝘢𝘳𝘭 𝘝𝘪𝘯𝘤𝘦𝘯𝘵 𝘔𝘢𝘨𝘪𝘴𝘵𝘳𝘢𝘥𝘰\r\n“𝐊𝐀𝐋𝐀𝐒”\r\nAkda at Direksyon ni\r\n𝘚𝘺𝘥𝘯𝘦𝘺 𝘙𝘢𝘺 𝘈𝘭𝘮𝘢𝘳𝘪𝘯𝘦𝘻\r\n“𝐄𝐑𝐎𝐏𝐋𝐀𝐍𝐎: 𝐋𝐀𝐍𝐆𝐈𝐓-𝐋𝐔𝐏𝐀”\r\nAkda at Direksyon ni\r\n𝘓𝘰𝘶𝘪𝘦 𝘑𝘢𝘮𝘦𝘴 𝘓𝘢𝘺𝘰𝘭𝘢\r\n“𝐇𝐈𝐃𝐄 𝐚𝐧𝐝 𝐒𝐄𝐄𝐊”\r\nAkda at Direksyon ni\r\n𝘈𝘢𝘳𝘩𝘰𝘯 𝘕𝘰𝘷𝘪𝘭𝘭𝘢\r\nAng mga dulang ito ay bahagi ng 𝗣𝗧𝗖 𝗫𝗣: 𝗣𝗮𝗴𝘀𝘂𝗯𝗼𝗸, ang bagong experimental at laboratory theater ng university theater ensemble, Perpetual Theater Collective.\r\n𝐀𝐩𝐫𝐢𝐥 𝟐𝟐 &amp;amp; 𝟐𝟑, 𝟐𝟎𝟐𝟓\r\n𝟏:𝟎𝟎𝐏𝐌 𝐚𝐭 𝟔:𝟎𝟎𝐏𝐌\r\n𝐔𝐏𝐇𝐒𝐋 𝐂𝐞𝐧𝐭𝐞𝐫 𝐟𝐨𝐫 𝐂𝐮𝐥𝐭𝐮𝐫𝐞 𝐚𝐧𝐝 𝐀𝐫𝐭𝐬\r\n&amp;quot;𝑻𝒉𝒆 𝑯𝒐𝒎𝒆 𝒐𝒇 𝑪𝒖𝒍𝒕𝒖𝒓𝒂𝒍 𝑬𝒙𝒄𝒆𝒍𝒍𝒆𝒏𝒄𝒆\r\n𝑻𝒉𝒆 𝑪𝒐𝒓𝒆 𝒐𝒇 𝑨𝒓𝒕𝒔 𝑺𝒆𝒓𝒗𝒂𝒏𝒕𝒉𝒐𝒐𝒅&amp;quot;\r\n#UPHSLCCA #CenterforCultureandArts\r\n#PerpetualTheaterCollective\r\n#PTCXP #Pagsubok', '2024-12-07 11:52:34', 'public/67e65cc1cb1b9-485413765_530253566761645_7076196964653477887_n.jpg', 'public/67543702143ad-cca-cover.png', NULL, NULL),
(7, 'CALL FOR AUDITIONS', 'Center For Culture and Arts', '𝐂𝐀𝐋𝐋 𝐅𝐎𝐑 𝐀𝐔𝐃𝐈𝐓𝐈𝐎𝐍𝐒\r\n𝟐𝐧𝐝 𝐒𝐞𝐦𝐞𝐬𝐭𝐞𝐫, 𝐀.𝐘. 𝟐𝟎𝟐𝟒 - 𝟐𝟎𝟐𝟓\r\nThe UPHSL Center for Culture and Arts, the home of official university performing arts groups, is opening its doors again for 𝐀𝐮𝐝𝐢𝐭𝐢𝐨𝐧𝐬 for 𝟐𝐧𝐝 𝐒𝐞𝐦𝐞𝐬𝐭𝐞𝐫 𝐨𝐟 𝐀𝐜𝐚𝐝𝐞𝐦𝐢𝐜 𝐘𝐞𝐚𝐫 𝟐𝟎𝟐𝟒 - 𝟐𝟎𝟐𝟓.\r\n𝘈𝘨𝘰𝘴 𝘗𝘦𝘳𝘱𝘦𝘵𝘶𝘢𝘭 𝘋𝘢𝘯𝘤𝘦 𝘊𝘰𝘮𝘱𝘢𝘯𝘺\r\n𝘗𝘦𝘳𝘱𝘦𝘵𝘶𝘢𝘭 𝘚𝘺𝘮𝘱𝘩𝘰𝘯𝘪𝘤 𝘊𝘩𝘰𝘳𝘶𝘴\r\n𝘚𝘦𝘳𝘦𝘯𝘢𝘥𝘢 𝘗𝘦𝘳𝘱𝘦𝘵𝘶𝘢𝘭 𝘙𝘰𝘯𝘥𝘢𝘭𝘭𝘢\r\n𝘗𝘦𝘳𝘱𝘦𝘵𝘶𝘢𝘭 𝘛𝘩𝘦𝘢𝘵𝘦𝘳 𝘊𝘰𝘭𝘭𝘦𝘤𝘵𝘪𝘷𝘦\r\n𝘜𝘨𝘯𝘢𝘺𝘢𝘯𝘨 𝘗𝘦𝘳𝘱𝘦𝘵𝘶𝘢𝘭 𝘗𝘳𝘰𝘫𝘦𝘤𝘵 𝘔𝘢𝘯𝘢𝘨𝘦𝘮𝘦𝘯𝘵 𝘛𝘦𝘢𝘮\r\n𝘗𝘦𝘳𝘱𝘦𝘵𝘶𝘢𝘭 𝘚𝘵𝘳𝘪𝘯𝘨𝘴 𝘘𝘶𝘢𝘳𝘵𝘦𝘵\r\n𝘗𝘦𝘳𝘱𝘦𝘵𝘶𝘢𝘭 𝘉𝘳𝘢𝘴𝘴 𝘉𝘢𝘯𝘥\r\nBe a 𝐔𝐧𝐢𝐯𝐞𝐫𝐬𝐢𝐭𝐲 𝐀𝐫𝐭𝐢𝐬𝐭 𝐒𝐜𝐡𝐨𝐥𝐚𝐫, and get a chance to earn your 𝐒𝐜𝐡𝐨𝐥𝐚𝐫𝐬𝐡𝐢𝐩 𝐆𝐫𝐚𝐧𝐭!\r\nMessage our Facebook Page to schedule an appointment for your auditions.\r\n𝐁𝐞𝐠𝐢𝐧𝐧𝐢𝐧𝐠 𝐉𝐚𝐧𝐮𝐚𝐫𝐲 𝟔, 𝟐𝟎𝟐𝟓\r\n𝟗:𝟎𝟎 𝐀𝐌 - 𝟒:𝟎𝟎 𝐏𝐌\r\n𝐂𝐂𝐀 𝐎𝐟𝐟𝐢𝐜𝐞, 𝐑𝐨𝐨𝐦 𝟏𝟏𝟑 𝐂𝐨𝐥𝐥𝐞𝐠𝐞 𝐁𝐮𝐢𝐥𝐝𝐢𝐧𝐠\r\n𝑨𝒖𝒅𝒊𝒕𝒊𝒐𝒏 𝑵𝑶𝑾, 𝒂𝒏𝒅 𝒃𝒆 𝒂 𝒑𝒂𝒓𝒕 𝒐𝒇 𝒕𝒉𝒆 𝒈𝒓𝒐𝒘𝒊𝒏𝒈 𝒇𝒂𝒎𝒊𝒍𝒚 𝒐𝒇 94 𝒖𝒏𝒊𝒗𝒆𝒓𝒔𝒊𝒕𝒚 𝒂𝒓𝒕𝒊𝒔𝒕𝒔!\r\n𝐔𝐏𝐇𝐒𝐋 𝐂𝐞𝐧𝐭𝐞𝐫 𝐟𝐨𝐫 𝐂𝐮𝐥𝐭𝐮𝐫𝐞 𝐚𝐧𝐝 𝐀𝐫𝐭𝐬\r\n&amp;quot;𝑻𝒉𝒆 𝑯𝒐𝒎𝒆 𝒐𝒇 𝑪𝒖𝒍𝒕𝒖𝒓𝒂𝒍 𝑬𝒙𝒄𝒆𝒍𝒍𝒆𝒏𝒄𝒆,\r\n𝑻𝒉𝒆 𝑪𝒐𝒓𝒆 𝒐𝒇 𝑨𝒓𝒕𝒔 𝑺𝒆𝒓𝒗𝒂𝒏𝒕𝒉𝒐𝒐𝒅.&amp;quot;\r\n#UPHSLCCA\r\n#CenterforCultureandArts \r\n#Auditions', '2024-12-07 11:53:51', 'public/67e65be13ecd6-479897019_504932479293754_6798571470838127305_n.jpg', 'public/6754374f7c1b8-cca-cover.png', NULL, NULL);

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
  MODIFY `admin_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `artist_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `collection_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
