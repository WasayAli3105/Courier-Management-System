-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 11:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courier_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'fasahatadmin', 'adminfasahat@gmail.com', 'admin57');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL,
  `agent_name` varchar(255) DEFAULT NULL,
  `agent_email` varchar(255) DEFAULT NULL,
  `agent_password` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `agent_name`, `agent_email`, `agent_password`, `branch_id`) VALUES
(1, 'Ahmed Zia', 'ahmedagent@gmail.com', 'agent407', 2),
(2, 'Mudabbir Ali', 'mudabbiragent@gmail.com', 'agent18', 3),
(3, 'Ashraf', 'ashrafagent@gmail.com', 'agent9', 6),
(4, 'Abdul Wasey', 'waseyagent@gmail.com', 'agent58', 5);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES
(1, 'Malir Cantt'),
(2, 'Defence'),
(3, 'Shahrah e Faisal'),
(4, 'Clifton '),
(5, 'FB Area'),
(6, 'Karsaz'),
(7, 'PECHS'),
(8, 'Nazimabad'),
(9, 'Saddar'),
(10, 'Bahria Town');

-- --------------------------------------------------------

--
-- Table structure for table `courier`
--

CREATE TABLE `courier` (
  `courier_id` int(11) NOT NULL,
  `sender_name` varchar(255) DEFAULT NULL,
  `sender_email` varchar(255) DEFAULT NULL,
  `sender_contact` int(15) DEFAULT NULL,
  `sender_address` varchar(255) DEFAULT NULL,
  `courier_type` varchar(255) DEFAULT NULL,
  `receiver_name` varchar(255) DEFAULT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `receiver_contact` int(15) NOT NULL,
  `receiver_address` varchar(255) DEFAULT NULL,
  `parcel_weight` varchar(100) DEFAULT NULL,
  `price` int(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) DEFAULT 'Pending',
  `tracking_no` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courier`
--

INSERT INTO `courier` (`courier_id`, `sender_name`, `sender_email`, `sender_contact`, `sender_address`, `courier_type`, `receiver_name`, `receiver_email`, `receiver_contact`, `receiver_address`, `parcel_weight`, `price`, `date`, `status`, `tracking_no`, `branch_id`) VALUES
(1, 'Ahmed Hussain', 'ah1482006@gmail.com', 2147483647, '3/2 D Street Khy Badar , DHA', 'Normal', 'Muhammad Suleman', 'muhammadsuleman0759@gmail.com', 301456789, 'D Block Near Park Street , Clifton', '5kg', 5500, '2025-02-26 19:48:36', 'Pending', '1136766', 1),
(2, 'Muhammed Suleman', 'muhammadsuleman0759@gmail.com', 2147483647, 'D Block Near Park Street , Clifton', 'Fast', 'Abdul Wasey', 'abdulwasey@gmail.com', 2147483647, 'Avenue 12, Near Green Valley Park, Gulshan', '5kg', 1950, '2025-02-26 21:53:38', '', '1786356', 4),
(3, 'Mudabbir', 'mudabbirbhai@gmail.com', 2147483647, 'Sector 5, Behind City Mall, Downtown', 'Normal', 'Muhammad Ahmed', 'ah1482006@gmail.com', 2147483647, '13 D Block Street 9 , Nazaimabad', '10kg', 11000, '2025-02-26 20:42:18', 'processing', '1501620', 3),
(4, 'Zain', 'zain345@gmail.com', 2147483647, 'Park Lane, Adjacent to Skyline Towers, Bahria Town', 'Normal', 'Ahmed', 'ah1482006@gmail.com', 2147483647, 'Avenue 12, Near Green Valley Park, Gulshan', '9kg', 9900, '2025-02-26 21:56:43', '', '1850047', 10),
(5, 'Muhammed', 'muhammadsuleman0759@gmail.com', 2147483647, 'Hilltop Road, Near Community Center, Defence View', 'Fast', 'Sami', 'ah1482006@gmail.com', 2147483647, 'Street 22, Next to Rose Garden, Johar Town', '4.4kg', 5140, '2025-02-26 21:12:01', 'Pending', '1591931', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_id` int(11) NOT NULL,
  `C_name` varchar(50) NOT NULL,
  `C_email` varchar(255) NOT NULL,
  `C_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_id`, `C_name`, `C_email`, `C_password`) VALUES
(1, 'Ahmed', 'ahmed@gmail.com', '123'),
(2, 'Ahmed', 'ahmed@gmail.com', '123'),
(3, 'Sami', 'sami@gmail.com', '123'),
(5, 'Adil', 'adil@gmail.com', 'A'),
(6, 'Ahmed', 'ahmed@gmail.com', 'Abc123'),
(7, 'Fasahat', 'fasahat@gmail.com', '12345'),
(8, 'Adil Noman', 'adil@gmail.com', 'adil12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`),
  ADD UNIQUE KEY `agent_email` (`agent_email`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `courier`
--
ALTER TABLE `courier`
  ADD PRIMARY KEY (`courier_id`),
  ADD KEY `branch_id` (`branch_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courier`
--
ALTER TABLE `courier`
  MODIFY `courier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
  ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);

--
-- Constraints for table `courier`
--
ALTER TABLE `courier`
  ADD CONSTRAINT `courier_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `branch` (`branch_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
