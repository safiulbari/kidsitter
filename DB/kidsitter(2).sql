-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 04:02 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kidsitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `phone_nmbr` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone_nmbr` varchar(11) DEFAULT NULL,
  `division` varchar(11) DEFAULT NULL,
  `district` varchar(11) DEFAULT NULL,
  `DOB` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `user_id`, `name`, `address`, `phone_nmbr`, `division`, `district`, `DOB`) VALUES
(1, 2, 'Abdus Fahim', 'Gulshan-2, Dhaka', '01987626565', NULL, NULL, '1993-05-05'),
(2, 4, 'Nishita Kabir', 'Badda, Dhaka', '01762834768', NULL, NULL, '1990-03-23'),
(3, 5, 'Azad Masud', 'Dhannmodi 27, Dhaka', '01762283473', NULL, NULL, '1993-05-05'),
(4, 8, 'Ruksana Kabir', 'Savar, Dhaka', '01987363647', NULL, NULL, '1990-03-23');

-- --------------------------------------------------------

--
-- Table structure for table `interviews`
--

CREATE TABLE `interviews` (
  `interview_no` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `sitter_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `link` varchar(40) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `interviews`
--

INSERT INTO `interviews` (`interview_no`, `job_id`, `sitter_id`, `client_id`, `date`, `time`, `link`, `status`) VALUES
(1, 1, 1, 2, '22-05-22', '05:30 pm', 'https://meet.google.com/wyk-pbnk-tcf', 1),
(2, 1, 2, 2, '22-05-22', '07:30 pm', 'https://meet.google.com/wyk-pbnk-tcf', NULL),
(3, 1, 3, 2, '22-05-22', '4:30 pm', 'https://meet.google.com/wyk-pbnk-tcf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jobpayment`
--

CREATE TABLE `jobpayment` (
  `payment_number` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobpayment`
--

INSERT INTO `jobpayment` (`payment_number`, `job_id`, `amount`) VALUES
(1, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  `job_day` varchar(20) DEFAULT NULL,
  `title` varchar(40) DEFAULT NULL,
  `details` longtext DEFAULT NULL,
  `R_with_client` varchar(40) DEFAULT NULL,
  `kid_age` int(11) DEFAULT NULL,
  `salary_range` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `completed` varchar(20) DEFAULT NULL,
  `SelectSitter_id` int(11) DEFAULT NULL,
  `payment_status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `client_id`, `job_day`, `title`, `details`, `R_with_client`, `kid_age`, `salary_range`, `address`, `completed`, `SelectSitter_id`, `payment_status`) VALUES
(22, 2, '6', 'Looking for baby fruit', ' Looking for baby sitter', 'Father', 12, '4000-6000', 'badda', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `sitter`
--

CREATE TABLE `sitter` (
  `sitter_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `approve` varchar(20) DEFAULT NULL,
  `license_nmbr` varchar(100) DEFAULT NULL,
  `phone_nmbr` varchar(11) DEFAULT NULL,
  `experience` varchar(100) DEFAULT NULL,
  `expertise` longtext DEFAULT NULL,
  `sitter_name` varchar(20) DEFAULT NULL,
  `sitter_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sitter`
--

INSERT INTO `sitter` (`sitter_id`, `user_id`, `approve`, `license_nmbr`, `phone_nmbr`, `experience`, `expertise`, `sitter_name`, `sitter_address`) VALUES
(1, 6, NULL, '1233', '01786223412', '2', 'medic, carer, amazing mother, child expert', 'Mst. Mahera Khatun', 'Khilgoan, Taltola, Dhaka'),
(2, NULL, NULL, '1276', '01989787872', '5', 'Farming, Baby Care', 'fiona begum', 'Notunbazar, Gulshan, Dhaka'),
(3, NULL, NULL, '6767', '09876767963', '3', 'Healthcare, Home Tutor', 'Razia Sultana', 'Dhanmondi 27, Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `username` varchar(90) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `role` varchar(20) DEFAULT NULL CHECK (`role` in ('admin','sitter','client')),
  `passwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `fk3` (`user_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `fkac` (`client_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`),
  ADD KEY `fk2` (`user_id`);

--
-- Indexes for table `interviews`
--
ALTER TABLE `interviews`
  ADD PRIMARY KEY (`interview_no`),
  ADD KEY `fkjb` (`job_id`),
  ADD KEY `fkNR` (`sitter_id`);

--
-- Indexes for table `jobpayment`
--
ALTER TABLE `jobpayment`
  ADD PRIMARY KEY (`payment_number`),
  ADD KEY `fkjp` (`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `fkj` (`client_id`);

--
-- Indexes for table `sitter`
--
ALTER TABLE `sitter`
  ADD PRIMARY KEY (`sitter_id`),
  ADD KEY `fk1` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `interviews`
--
ALTER TABLE `interviews`
  MODIFY `interview_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobpayment`
--
ALTER TABLE `jobpayment`
  MODIFY `payment_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sitter`
--
ALTER TABLE `sitter`
  MODIFY `sitter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
