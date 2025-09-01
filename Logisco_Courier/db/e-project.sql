-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2024 at 11:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-project`
--

-- --------------------------------------------------------
-- Table structure for table `agents`
-- --------------------------------------------------------

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `account` enum('pending','approve') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `agents` (`id`, `f_name`, `l_name`, `name`, `phone`, `email`, `password`, `address`, `account`) VALUES
(1, 'Ali', 'Khan', 'AliK', '03001234567', 'ali@example.com', '12345', 'Karachi, Pakistan', 'approve');

-- --------------------------------------------------------
-- Table structure for table `cities`
-- --------------------------------------------------------

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `City` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `cities` (`id`, `City`) VALUES
(1, 'Islamabad'),
(2, 'Karachi'),
(3, 'Lahore');

-- --------------------------------------------------------
-- Table structure for table `contact_form`
-- --------------------------------------------------------

CREATE TABLE `contact_form` (
  `ID` int(11) NOT NULL,
  `User_id` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `is_read` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `contact_form` (`ID`, `User_id`, `Name`, `Email`, `Message`, `is_read`) VALUES
(1, 'U1', 'Ahmad', 'ahmad@example.com', 'Need info about delivery', '0');

-- --------------------------------------------------------
-- Table structure for table `logistics_form`
-- --------------------------------------------------------

CREATE TABLE `logistics_form` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `receiver_phone` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `pickup_address` varchar(255) NOT NULL,
  `pickup_city` varchar(255) NOT NULL,
  `drop_off_address` varchar(255) NOT NULL,
  `delivery_type` enum('Standard','Express') NOT NULL,
  `quantity` int(11) NOT NULL,
  `weight` float NOT NULL,
  `width` float NOT NULL,
  `height` float NOT NULL,
  `Total_charges` varchar(255) NOT NULL,
  `trace_id` varchar(50) NOT NULL,
  `status` enum('Pending','In Transit','Out for Delivery','Delivered','Cancelled','Returned','Picked Up') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `logistics_form` (`id`, `full_name`, `receiver_name`, `receiver_phone`, `email`, `phone_number`, `pickup_address`, `pickup_city`, `drop_off_address`, `delivery_type`, `quantity`, `weight`, `width`, `height`, `Total_charges`, `trace_id`, `status`) VALUES
(1, 'Bilal Khan', 'Zeeshan', '03123456789', 'bilal@example.com', '03001112222', 'Street 12, Islamabad', 'Islamabad', 'Street 45, Lahore', 'Standard', 2, 5.5, 10.0, 15.0, '1500', 'TR123456', 'Pending');

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `F_NAME` varchar(256) DEFAULT NULL,
  `L_NAME` varchar(256) DEFAULT NULL,
  `NAME` varchar(256) DEFAULT NULL,
  `EMAIL` varchar(256) DEFAULT NULL,
  `PASSWORD` varchar(256) DEFAULT NULL,
  `PHONE` varchar(256) DEFAULT NULL,
  `ROLE` enum('USERS','ADMIN','AGENT') DEFAULT NULL,
  `City` varchar(255) NOT NULL,
  `account` enum('pending','approve') NOT NULL,
  `ADDRESS` varchar(255) DEFAULT NULL,
  `COMPANY_DETAIL_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`ID`, `F_NAME`, `L_NAME`, `NAME`, `EMAIL`, `PASSWORD`, `PHONE`, `ROLE`, `City`, `account`, `ADDRESS`, `COMPANY_DETAIL_ID`) VALUES
(1, 'Amir', NULL, NULL, 'amir@gmail.com', '123', '03249210632', 'USERS', 'Islamabad', 'approve', NULL, NULL),
(2, 'Admin', 'User', NULL, 'admin@example.com', 'admin123', '03009998888', 'ADMIN', 'Karachi', 'approve', 'Admin Office', NULL);

-- --------------------------------------------------------
-- Indexes
-- --------------------------------------------------------

ALTER TABLE `agents` ADD PRIMARY KEY (`id`);
ALTER TABLE `cities` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `City` (`City`);
ALTER TABLE `contact_form` ADD PRIMARY KEY (`ID`);
ALTER TABLE `logistics_form` ADD PRIMARY KEY (`id`);
ALTER TABLE `users` ADD PRIMARY KEY (`ID`);

-- --------------------------------------------------------
-- AUTO_INCREMENT
-- --------------------------------------------------------

ALTER TABLE `agents` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `cities` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `contact_form` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `logistics_form` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `users` MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
