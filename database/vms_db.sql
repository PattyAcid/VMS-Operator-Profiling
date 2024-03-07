-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2024 at 03:05 AM
-- Server version: 5.1.32
-- PHP Version: 5.2.9-1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `vms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `list_records`
--

CREATE TABLE IF NOT EXISTS `list_records` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name_id` bigint(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(100) NOT NULL,
  `civil_status` varchar(100) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `tribe` varchar(100) NOT NULL,
  `current_address` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `date_of_hired` date NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `job_designation` varchar(100) NOT NULL,
  `job_description` varchar(100) NOT NULL,
  `job_area` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `list_records`
--

INSERT INTO `list_records` (`id`, `name_id`, `name`, `gender`, `date_of_birth`, `place_of_birth`, `civil_status`, `religion`, `tribe`, `current_address`, `degree`, `date_of_hired`, `contact_number`, `job_designation`, `job_description`, `job_area`) VALUES
(1, 9898837, 'sample sample', 'lgbtq++', '2024-02-12', 'Seoul, Korea', 'Single', 'Out of this world', 'Alien', 'Recodo, Zamboanga City', 'Bachelor of Science in Information Technology', '2020-01-31', 9284567332, 'vms operator', 'operating and monitoring of VMS', 'sangali, zamboanga city');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT '0',
  `account_status` enum('Active','Disabled','Banned') DEFAULT 'Active',
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login_date` datetime DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `biography` text,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--