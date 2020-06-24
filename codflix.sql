-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 24, 2020 at 09:35 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `codflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(28, 'Action'),
(12, 'Aventure'),
(16, 'Animation'),
(35, 'Comédie'),
(80, 'Crime'),
(99, 'Documentaire'),
(18, 'Drame'),
(10751, 'Familial'),
(14, 'Fantastique'),
(36, 'Histoire'),
(27, 'Horreur'),
(10402, 'Musique'),
(9648, 'Mystère'),
(10749, 'Romance'),
(878, 'Science-Fiction'),
(10770, 'Téléfilm'),
(53, 'Thriller'),
(10752, 'Guerre'),
(37, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `url` text,
  `logdate` datetime DEFAULT NULL,
  `post_data` text,
  `get_data` text,
  `category` tinytext,
  `page` tinytext,
  `table_ref` tinytext,
  `id_ref` int(10) UNSIGNED DEFAULT NULL,
  `data_deleted` text,
  `action` tinytext,
  `ip` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `id_users`, `url`, `logdate`, `post_data`, `get_data`, `category`, `page`, `table_ref`, `id_ref`, `data_deleted`, `action`, `ip`) VALUES
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=signup', '2020-06-23 18:48:50', '{\"FIRST_ROW\":0,\"MAX_ROWS\":200,\"order_by\":\"\",\"id\":\"14\",\"email\":\"florian.gustin.barriera@gmail.com\",\"password\":\"$2y$10$faSJCTVn8ycuerE9nEUiEuHzAd1J0Nwq4uOIdtKg0aUtWyA7CpCAq\",\"firstname\":\"sqdfsqdf\",\"lastname\":\"sdfqsf\",\"username\":\"sqfsqdf\",\"type\":\"member\",\"token_confirmation\":\"5R.SqjWyCB\",\"status\":\"disabled\",\"created_on\":\"2020-06-23 18:48:50\",\"updated_on\":null,\"updated_by\":null}', NULL, 'user', NULL, 'user', 14, NULL, 'insert', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=signup', '2020-06-23 18:52:08', '{\"FIRST_ROW\":0,\"MAX_ROWS\":200,\"order_by\":\"\",\"id\":\"15\",\"email\":\"florian.gustin.barriera@gmail.com\",\"password\":\"$2y$10$RRGZCObk8oh23deX49f6UeUiz8ykpl.Um48Stk1egeXZlWZIChh3O\",\"firstname\":\"sdfdsf\",\"lastname\":\"sdfdsfs\",\"username\":\"fsdfdsf\",\"type\":\"member\",\"token_confirmation\":\"E6R2KTgOeC\",\"status\":\"disabled\",\"created_on\":\"2020-06-23 18:52:08\",\"updated_on\":null,\"updated_by\":null}', NULL, 'user', NULL, 'user', 15, NULL, 'insert', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=checking&email=florian.gustin.barriera@gmail.com', '2020-06-23 18:54:52', '{\"updated_on\":\"2020-06-23 18:54:52\"}', NULL, 'user', NULL, 'user', 15, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=checking&email=florian.gustin.barriera@gmail.com', '2020-06-23 18:55:08', '{\"updated_on\":\"2020-06-23 18:55:08\"}', NULL, 'user', NULL, 'user', 15, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=signup', '2020-06-23 18:57:43', '{\"FIRST_ROW\":0,\"MAX_ROWS\":200,\"order_by\":\"\",\"id\":\"16\",\"email\":\"florian.gustin.barriera@gmail.com\",\"password\":\"$2y$10$BixNTjKKhu7HJisZzP4.U.ZHkGNJ2nRVoP2vxE7JkDUvFJqIb65Ue\",\"firstname\":\"sqdfqdsfqsfs\",\"lastname\":\"qdfqsfds\",\"username\":\"ff\",\"type\":\"member\",\"token_confirmation\":\"gekjRSCdRg\",\"status\":\"disabled\",\"created_on\":\"2020-06-23 18:57:43\",\"updated_on\":null,\"updated_by\":null}', NULL, 'user', NULL, 'user', 16, NULL, 'insert', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=signup', '2020-06-23 18:59:28', '{\"updated_on\":\"2020-06-23 18:59:28\"}', NULL, 'user', NULL, 'user', 16, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=signup', '2020-06-23 19:14:18', '{\"FIRST_ROW\":0,\"MAX_ROWS\":200,\"order_by\":\"\",\"id\":\"17\",\"email\":\"florian.gustin.barriera@gmail.com\",\"password\":\"$2y$10$bnQfJvrbUp77Ieo4DtYVceB3n0qfy2vRnF9UlR3unxCj4g0O8r3ey\",\"firstname\":\"dfgdsg\",\"lastname\":\"dfgdsg\",\"username\":\"dfhdsh\",\"type\":\"member\",\"token_confirmation\":\"h630pk\\/aOV\",\"status\":\"disabled\",\"created_on\":\"2020-06-23 19:14:18\",\"updated_on\":null,\"updated_by\":null}', NULL, 'user', NULL, 'user', 17, NULL, 'insert', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=signup', '2020-06-23 19:15:21', '{\"updated_on\":\"2020-06-23 19:15:21\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 21:35:15', '{\"FIRST_ROW\":0,\"MAX_ROWS\":200,\"order_by\":\"\",\"id\":\"18\",\"email\":\"coding@gmail.com\",\"password\":\"$2y$10$xKfcRsYOtsVNWnM1walJA.m\\/Mrl8ltA84RRtMVP18HqGkdlslkcka\",\"firstname\":\"florian\",\"lastname\":\"gustin\",\"username\":\"dev\",\"type\":\"member\",\"token_confirmation\":\"\",\"status\":\"disabled\",\"created_on\":\"2020-06-23 21:35:15\",\"updated_on\":null,\"updated_by\":null}', NULL, 'user', NULL, 'user', 18, NULL, 'insert', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 21:38:21', '{\"updated_on\":\"2020-06-23 21:38:21\"}', NULL, 'user', NULL, 'user', 12, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 21:43:05', '{\"updated_on\":\"2020-06-23 21:43:05\"}', NULL, 'user', NULL, 'user', 12, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 21:43:40', '{\"updated_on\":\"2020-06-23 21:43:40\"}', NULL, 'user', NULL, 'user', 12, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 21:44:15', '{\"updated_on\":\"2020-06-23 21:44:15\"}', NULL, 'user', NULL, 'user', 12, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=checking&email=coding@gmail.com', '2020-06-23 21:54:37', '{\"updated_on\":\"2020-06-23 21:54:37\"}', NULL, 'user', NULL, 'user', 12, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:04:36', '{\"updated_on\":\"2020-06-23 22:04:36\"}', NULL, 'user', NULL, 'user', 12, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:04:40', '{\"updated_on\":\"2020-06-23 22:04:40\"}', NULL, 'user', NULL, 'user', 12, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:04:43', '{\"updated_on\":\"2020-06-23 22:04:43\"}', NULL, 'user', NULL, 'user', 12, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:04:47', '{\"updated_on\":\"2020-06-23 22:04:47\"}', NULL, 'user', NULL, 'user', 12, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:04:57', '{\"updated_on\":\"2020-06-23 22:04:57\"}', NULL, 'user', NULL, 'user', 12, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:05:19', '{\"updated_on\":\"2020-06-23 22:05:19\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:05:28', '{\"updated_on\":\"2020-06-23 22:05:28\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:05:50', '{\"updated_on\":\"2020-06-23 22:05:50\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:07:02', '{\"updated_on\":\"2020-06-23 22:07:02\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:07:45', '{\"updated_on\":\"2020-06-23 22:07:45\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:08:45', '{\"updated_on\":\"2020-06-23 22:08:45\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:09:12', '{\"updated_on\":\"2020-06-23 22:09:12\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:12:17', '{\"updated_on\":\"2020-06-23 22:12:17\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:12:29', '{\"updated_on\":\"2020-06-23 22:12:29\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:12:32', '{\"updated_on\":\"2020-06-23 22:12:32\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:14:11', '{\"updated_on\":\"2020-06-23 22:14:11\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:14:16', '{\"updated_on\":\"2020-06-23 22:14:16\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:16:44', '{\"updated_on\":\"2020-06-23 22:16:44\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:18:13', '{\"updated_on\":\"2020-06-23 22:18:13\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:18:23', '{\"updated_on\":\"2020-06-23 22:18:23\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:19:23', '{\"updated_on\":\"2020-06-23 22:19:23\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:19:29', '{\"updated_on\":\"2020-06-23 22:19:29\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:19:36', '{\"updated_on\":\"2020-06-23 22:19:36\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:20:10', '{\"updated_on\":\"2020-06-23 22:20:10\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:20:13', '{\"updated_on\":\"2020-06-23 22:20:13\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:22:49', '{\"updated_on\":\"2020-06-23 22:22:49\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:22:51', '{\"updated_on\":\"2020-06-23 22:22:51\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:22:56', '{\"updated_on\":\"2020-06-23 22:22:56\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:23:27', '{\"updated_on\":\"2020-06-23 22:23:27\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:23:47', '{\"updated_on\":\"2020-06-23 22:23:47\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:23:50', '{\"updated_on\":\"2020-06-23 22:23:50\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:24:19', '{\"updated_on\":\"2020-06-23 22:24:19\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:24:21', '{\"updated_on\":\"2020-06-23 22:24:21\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:25:13', '{\"updated_on\":\"2020-06-23 22:25:13\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:25:18', '{\"updated_on\":\"2020-06-23 22:25:18\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:25:33', '{\"updated_on\":\"2020-06-23 22:25:33\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:25:52', '{\"updated_on\":\"2020-06-23 22:25:52\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:30:48', '{\"updated_on\":\"2020-06-23 22:30:48\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:31:08', '{\"updated_on\":\"2020-06-23 22:31:08\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:31:10', '{\"updated_on\":\"2020-06-23 22:31:10\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:31:11', '{\"updated_on\":\"2020-06-23 22:31:11\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:31:12', '{\"updated_on\":\"2020-06-23 22:31:12\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:31:13', '{\"updated_on\":\"2020-06-23 22:31:13\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:31:14', '{\"updated_on\":\"2020-06-23 22:31:14\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:31:15', '{\"updated_on\":\"2020-06-23 22:31:15\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:32:53', '{\"updated_on\":\"2020-06-23 22:32:53\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:32:58', '{\"updated_on\":\"2020-06-23 22:32:58\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:33:11', '{\"updated_on\":\"2020-06-23 22:33:11\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:33:14', '{\"updated_on\":\"2020-06-23 22:33:14\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:33:48', '{\"updated_on\":\"2020-06-23 22:33:48\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:36:31', '{\"updated_on\":\"2020-06-23 22:36:31\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:37:16', '{\"updated_on\":\"2020-06-23 22:37:16\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:38:25', '{\"updated_on\":\"2020-06-23 22:38:25\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:38:49', '{\"updated_on\":\"2020-06-23 22:38:49\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:38:51', '{\"updated_on\":\"2020-06-23 22:38:51\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:38:55', '{\"updated_on\":\"2020-06-23 22:38:55\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:39:21', '{\"updated_on\":\"2020-06-23 22:39:21\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:40:05', '{\"updated_on\":\"2020-06-23 22:40:05\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:40:18', '{\"updated_on\":\"2020-06-23 22:40:18\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:40:20', '{\"updated_on\":\"2020-06-23 22:40:20\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:40:24', '{\"updated_on\":\"2020-06-23 22:40:24\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:48:50', '{\"updated_on\":\"2020-06-23 22:48:50\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:48:58', '{\"updated_on\":\"2020-06-23 22:48:58\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:49:01', '{\"updated_on\":\"2020-06-23 22:49:01\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:49:05', '{\"updated_on\":\"2020-06-23 22:49:05\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:49:12', '{\"updated_on\":\"2020-06-23 22:49:12\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:49:50', '{\"updated_on\":\"2020-06-23 22:49:50\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:49:52', '{\"updated_on\":\"2020-06-23 22:49:52\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:49:56', '{\"updated_on\":\"2020-06-23 22:49:56\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:50:26', '{\"updated_on\":\"2020-06-23 22:50:26\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:50:28', '{\"updated_on\":\"2020-06-23 22:50:28\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:50:30', '{\"updated_on\":\"2020-06-23 22:50:30\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:50:44', '{\"updated_on\":\"2020-06-23 22:50:44\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:51:56', '{\"updated_on\":\"2020-06-23 22:51:56\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=checking&email=florian.gustin.business@gmail.com', '2020-06-23 22:53:41', '{\"updated_on\":\"2020-06-23 22:53:41\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:56:34', '{\"updated_on\":\"2020-06-23 22:56:34\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:57:04', '{\"updated_on\":\"2020-06-23 22:57:04\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:57:16', '{\"updated_on\":\"2020-06-23 22:57:16\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:59:26', '{\"updated_on\":\"2020-06-23 22:59:26\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:59:50', '{\"updated_on\":\"2020-06-23 22:59:50\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 22:59:59', '{\"updated_on\":\"2020-06-23 22:59:59\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:01:11', '{\"updated_on\":\"2020-06-23 23:01:11\"}', NULL, 'user', NULL, 'user', 17, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=signup', '2020-06-23 23:01:40', '{\"FIRST_ROW\":0,\"MAX_ROWS\":200,\"order_by\":\"\",\"id\":\"19\",\"email\":\"florian.gustin.barriera@gmail.com\",\"password\":\"$2y$10$D.xCQajC2pb3g69NGtVxWenvtmdgcyan\\/NkYcjKsG4XbIz0GmlXge\",\"firstname\":\"Florian\",\"lastname\":\"Gustin\",\"username\":\"dsfdsfsd\",\"type\":\"member\",\"token_confirmation\":\"FcSqv0drVv\",\"status\":\"disabled\",\"created_on\":\"2020-06-23 23:01:40\",\"updated_on\":null,\"updated_by\":null}', NULL, 'user', NULL, 'user', 19, NULL, 'insert', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=signup', '2020-06-23 23:02:19', '{\"updated_on\":\"2020-06-23 23:02:19\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:02:39', '{\"updated_on\":\"2020-06-23 23:02:39\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:03:00', '{\"updated_on\":\"2020-06-23 23:03:00\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:07:16', '{\"updated_on\":\"2020-06-23 23:07:16\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:07:23', '{\"updated_on\":\"2020-06-23 23:07:23\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:07:41', '{\"updated_on\":\"2020-06-23 23:07:41\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:08:18', '{\"updated_on\":\"2020-06-23 23:08:18\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:08:57', '{\"updated_on\":\"2020-06-23 23:08:57\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:09:52', '{\"updated_on\":\"2020-06-23 23:09:52\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:09:55', '{\"updated_on\":\"2020-06-23 23:09:55\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:09:59', '{\"updated_on\":\"2020-06-23 23:09:59\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:10:15', '{\"updated_on\":\"2020-06-23 23:10:15\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:10:41', '{\"updated_on\":\"2020-06-23 23:10:41\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:15:13', '{\"updated_on\":\"2020-06-23 23:15:13\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:16:25', '{\"updated_on\":\"2020-06-23 23:16:25\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:17:16', '{\"updated_on\":\"2020-06-23 23:17:16\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:20:08', '{\"updated_on\":\"2020-06-23 23:20:08\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:20:49', '{\"updated_on\":\"2020-06-23 23:20:49\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:21:57', '{\"updated_on\":\"2020-06-23 23:21:57\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:22:04', '{\"updated_on\":\"2020-06-23 23:22:04\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:25:11', '{\"updated_on\":\"2020-06-23 23:25:11\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:25:18', '{\"updated_on\":\"2020-06-23 23:25:18\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:25:34', '{\"updated_on\":\"2020-06-23 23:25:34\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:25:35', '{\"updated_on\":\"2020-06-23 23:25:35\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:25:37', '{\"updated_on\":\"2020-06-23 23:25:37\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:25:37', '{\"updated_on\":\"2020-06-23 23:25:37\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:25:57', '{\"updated_on\":\"2020-06-23 23:25:57\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:26:04', '{\"updated_on\":\"2020-06-23 23:26:04\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:27:22', '{\"updated_on\":\"2020-06-23 23:27:22\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:27:30', '{\"updated_on\":\"2020-06-23 23:27:30\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:28:16', '{\"updated_on\":\"2020-06-23 23:28:16\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:28:22', '{\"updated_on\":\"2020-06-23 23:28:22\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:28:28', '{\"updated_on\":\"2020-06-23 23:28:28\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:28:35', '{\"updated_on\":\"2020-06-23 23:28:35\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1'),
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=profile', '2020-06-23 23:29:08', '{\"updated_on\":\"2020-06-23 23:29:08\"}', NULL, 'user', NULL, 'user', 19, '{\"updated_on\":null}', 'update', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `duration` time DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `trailer_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `type` set('member','moderator','admin') NOT NULL,
  `token_confirmation` varchar(255) DEFAULT NULL,
  `status` set('enabled','disabled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `firstname`, `lastname`, `username`, `type`, `token_confirmation`, `status`) VALUES
(12, 'coding@gmail.com', '$2y$10$DhZeb7qazw25tSe3/hP.MOxfxjdi5PrIlIt1LkMIiS4bLR3t5WiWG', 'floriani', 'gustina', 'devo', 'member', NULL, 'enabled'),
(19, 'florian.gustin.barriera@gmail.com', '$2y$10$zXV2XmpY1Od9epc5mjbexeooVuDziY9ZQ9D4nBeZjwKwwRJRfk5cK', 'Floriandsfds', 'Gustingdfg', 'dsfdsfsd', 'member', NULL, 'enabled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD KEY `id` (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD KEY `id_users` (`id_users`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`);

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_ibfk_1` FOREIGN KEY (`id_users`) REFERENCES `user` (`id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);
