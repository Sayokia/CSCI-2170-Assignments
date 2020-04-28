-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 20, 2020 at 03:45 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `2170`
--
CREATE DATABASE IF NOT EXISTS `2170` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `2170`;

-- --------------------------------------------------------

--
-- Table structure for table `alllists`
--

DROP TABLE IF EXISTS `alllists`;
CREATE TABLE IF NOT EXISTS `alllists` (
  `list_id` int(11) NOT NULL AUTO_INCREMENT,
  `list_name` varchar(254) NOT NULL,
  `list_archived` int(11) NOT NULL COMMENT '0 or 1, just like done/not done in the list.',
  `list_user_id` int(11) NOT NULL COMMENT 'Link the list to the user. This is new. If you have trouble creating the foreign key, maintain reference to the user ID.',
  PRIMARY KEY (`list_id`),
  KEY `fk_list_user` (`list_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_user_id` int(11) NOT NULL,
  `login_uname` varchar(64) NOT NULL,
  `login_pswd` varchar(254) NOT NULL,
  PRIMARY KEY (`login_id`),
  KEY `login_user_id` (`login_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_user_id`, `login_uname`, `login_pswd`) VALUES
(1, 1, 'admin', '$2y$10$M6qxadhH6vj8kxkFl6d5COkiHQSoLYl1GNkZ6qIdwePXvThrJ8fla'),
(2, 2, 'rey', 'r3y');

-- --------------------------------------------------------

--
-- Table structure for table `mylist`
--

DROP TABLE IF EXISTS `mylist`;
CREATE TABLE IF NOT EXISTS `mylist` (
  `l_id` int(16) NOT NULL AUTO_INCREMENT,
  `l_item` varchar(254) NOT NULL,
  `l_done` int(16) NOT NULL,
  `l_list_id` int(11) NOT NULL COMMENT 'This maintains an ID to the list in which this item is saved. This will help delete the list items in case a list is deleted.',
  PRIMARY KEY (`l_id`),
  KEY `fk_list_listitem` (`l_list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `users_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_fname` varchar(254) NOT NULL,
  `users_lname` varchar(254) NOT NULL,
  `users_phone` varchar(32) NOT NULL,
  `users_email` varchar(254) NOT NULL,
  `users_type` int(11) NOT NULL COMMENT '0 or 1, 0 for admin and 1 for others',
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_fname`, `users_lname`, `users_phone`, `users_email`, `users_type`) VALUES
(1, 'admin', 'admin', '9021234567', 'admin@admin.com', 0),
(2, 'rey', 'kenobi', '', 'rey@force.org', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alllists`
--
ALTER TABLE `alllists`
  ADD CONSTRAINT `fk_list_user` FOREIGN KEY (`list_user_id`) REFERENCES `users` (`users_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_usersandlogin` FOREIGN KEY (`login_user_id`) REFERENCES `users` (`users_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `mylist`
--
ALTER TABLE `mylist`
  ADD CONSTRAINT `fk_list_listitem` FOREIGN KEY (`l_list_id`) REFERENCES `alllists` (`list_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
