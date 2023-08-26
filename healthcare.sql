-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2023 at 03:19 PM
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
  `payment_status` enum('Yes','No') NOT NULL,
  `hospital_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`patient_id`, `doctor_id`, `test_name`, `total_charge`, `time`, `payment_status`, `hospital_name`) VALUES
(00033, 00023, 'Consultancy', 10, '20:00:00', 'No', 'Dhaka Hospital'),
(00033, 00024, 'Blood Test', 20, '10:00:00', 'No', 'Evercare Hospital Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `degree` varchar(60) NOT NULL,
  `specialization` varchar(60) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `slot` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `age`, `degree`, `specialization`, `contact`, `slot`, `start_time`, `end_time`, `password`) VALUES
(00023, 'Lisa', 45, 'Doctor of Medicine', 'Neurology', '01254778438', 2, '21:30:00', '23:00:00', '1234'),
(00024, 'Ian', 50, 'Biomedical Engineering', 'Dermatology', '01243334666', 1, '10:30:00', '12:00:00', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_works_at`
--

CREATE TABLE `doctor_works_at` (
  `doctor_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `hospital_name` varchar(40) NOT NULL,
  `hospital_address` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_works_at`
--

INSERT INTO `doctor_works_at` (`doctor_id`, `hospital_name`, `hospital_address`) VALUES
(00023, 'Dhaka Hospital', '17 D.C RAY Rd'),
(00023, 'Evercare Hospital Dhaka', 'Plot 81, Block-E, Bashundhara Rd'),
(00024, 'Dhaka Hospital', '17 D.C RAY Rd'),
(00024, 'Evercare Hospital Dhaka', 'Plot 81, Block-E, Bashundhara Rd');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Name` varchar(40) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Contact` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`Name`, `Address`, `Contact`) VALUES
('Dhaka Hospital', '17 D.C RAY Rd', '1943839939'),
('Evercare Hospital Dhaka', 'Plot 81, Block-E, Bashundhara Rd', '1274838847'),
('United Hospital Limited', 'Plot 15 Rd No 71', '1248959959');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_test`
--

CREATE TABLE `hospital_test` (
  `hospital_name` varchar(40) NOT NULL,
  `hospital_address` varchar(60) NOT NULL,
  `test_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital_test`
--

INSERT INTO `hospital_test` (`hospital_name`, `hospital_address`, `test_name`) VALUES
('Dhaka Hospital', '17 D.C RAY Rd', 'Blood Test'),
('Dhaka Hospital', '17 D.C RAY Rd', 'Cardiology'),
('Dhaka Hospital', '17 D.C RAY Rd', 'Consultancy'),
('Dhaka Hospital', '17 D.C RAY Rd', 'Surgery'),
('Evercare Hospital Dhaka', 'Plot 81, Block-E, Bashundhara Rd', 'Blood Test'),
('Evercare Hospital Dhaka', 'Plot 81, Block-E, Bashundhara Rd', 'Pathology'),
('Evercare Hospital Dhaka', 'Plot 81, Block-E, Bashundhara Rd', 'Physical Therapy');

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

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `age`, `gender`, `bloodgroup`, `contact`, `password`) VALUES
(00033, 'Lara', 22, 'Female', 'B+', '04942883888', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `Name` varchar(40) NOT NULL,
  `Fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`Name`, `Fee`) VALUES
('Blood Test', 20),
('Cardiology', 2000),
('Consultancy', 10),
('Pathology', 1500),
('Physical Therapy', 150),
('Radiology', 1000),
('Surgery', 4000);

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
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
