-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 03:31 PM
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
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `patient_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `doctor_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `test_name` varchar(40) NOT NULL,
  `total_charge` float NOT NULL,
  `time` time NOT NULL,
  `payment_status` enum('Yes','No') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `degree` varchar(30) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `slot` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_works_at`
--

CREATE TABLE `doctor_works_at` (
  `doctor_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `hospital_name` varchar(40) NOT NULL,
  `hospital_address` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Name` varchar(40) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Contact` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_test`
--

CREATE TABLE `hospital_test` (
  `hospital_name` varchar(40) NOT NULL,
  `hospital_address` varchar(60) NOT NULL,
  `test_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `bloodgroup` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') NOT NULL,
  `contact` varchar(11) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `Name` varchar(40) NOT NULL,
  `Fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`patient_id`,`doctor_id`,`test_name`),
  ADD KEY `fk_docid` (`doctor_id`),
  ADD KEY `fk_test` (`test_name`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_works_at`
--
ALTER TABLE `doctor_works_at`
  ADD PRIMARY KEY (`doctor_id`,`hospital_name`,`hospital_address`),
  ADD KEY `fk_hospitalname_addr` (`hospital_name`,`hospital_address`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`Name`,`Address`);

--
-- Indexes for table `hospital_test`
--
ALTER TABLE `hospital_test`
  ADD PRIMARY KEY (`hospital_name`,`hospital_address`,`test_name`),
  ADD KEY `fk_hospitaltest` (`test_name`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_docid` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_patid` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_test` FOREIGN KEY (`test_name`) REFERENCES `test` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_works_at`
--
ALTER TABLE `doctor_works_at`
  ADD CONSTRAINT `fk_hospitalname_addr` FOREIGN KEY (`hospital_name`,`hospital_address`) REFERENCES `hospital` (`Name`, `Address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_workdocid` FOREIGN KEY (`doctor_id`) REFERENCES `doctor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hospital_test`
--
ALTER TABLE `hospital_test`
  ADD CONSTRAINT `fk_hospitaln_a` FOREIGN KEY (`hospital_name`,`hospital_address`) REFERENCES `hospital` (`Name`, `Address`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_hospitaltest` FOREIGN KEY (`test_name`) REFERENCES `test` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
