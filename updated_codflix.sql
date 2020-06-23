-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 23, 2020 at 07:13 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction');

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
(0, NULL, 'http://localhost:8888/ec-code-2020-codflix-php-master/index.php?action=signup', '2020-06-23 18:59:28', '{\"updated_on\":\"2020-06-23 18:59:28\"}', NULL, 'user', NULL, 'user', 16, '{\"updated_on\":null}', 'update', '::1');

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
(12, 'coding@gmail.com', '$2y$10$xmTvrmfCaSDQLizoxlWo/uP0ULJ0h7RAgReROC0MqfxDLwyxftd5.', 'florian', 'gustin', 'dev', 'member', '', 'enabled');

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);
