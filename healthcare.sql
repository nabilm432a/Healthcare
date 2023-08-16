-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 09:04 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `age`, `degree`, `specialization`, `contact`, `slot`, `start_time`, `end_time`, `password`) VALUES
(00003, 'Tanny', 22, 'Medical Sciences', '', '01566457881', 0, '00:00:00', '00:00:00', ''),
(00005, 'abcbas', 22, 'asdhlsa', 'ksahdfj', '127497471', 2, '-00:00:02', '00:00:00', ''),
(00006, 'Avishek', 22, 'Computer Science', '', '01248492950', 0, '00:00:00', '00:00:00', 'dsafasdgsadg'),
(00007, 'absjlbsa', 23, 'sadfsf', '', '01248492950', 0, '00:00:00', '00:00:00', 'bvmfghkghk');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_works_at`
--

CREATE TABLE `doctor_works_at` (
  `doctor_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `hospital_name` varchar(40) NOT NULL,
  `hospital_address` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `Name` varchar(40) NOT NULL,
  `Address` varchar(60) NOT NULL,
  `Contact` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_test`
--

CREATE TABLE `hospital_test` (
  `hospital_name` varchar(40) NOT NULL,
  `hospital_address` varchar(60) NOT NULL,
  `test_name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `age`, `gender`, `bloodgroup`, `contact`, `password`) VALUES
(00009, 'Nabil', 22, 'Male', 'O+', '01820056000', ''),
(00010, 'Carol', 21, 'Female', 'A+', '03522454796', ''),
(00011, 'Laura', 25, 'Female', 'B+', '01436244321', ''),
(00012, 'Beret', 30, 'Male', 'B-', '01243653221', ''),
(00013, 'Logan', 19, 'Male', 'A-', '01231245506', ''),
(00014, 'Lisa', 24, 'Female', 'A+', '01732411680', ''),
(00015, 'Nora', 30, 'Female', 'B-', '01835628889', ''),
(00016, 'Astarion', 32, 'Male', 'AB+', '01436378289', ''),
(00017, 'Wyll', 37, 'Male', 'O-', '01277489950', ''),
(00018, 'Shadowheart', 23, 'Female', 'B+', '01266378889', ''),
(00019, 'Ray', 12, 'Male', 'AB-', '01778988765', ''),
(00020, 'Lex', 27, 'Male', 'O+', '01222334567', ''),
(00021, 'hello', 22, 'Male', 'A+', '01248492950', ''),
(00022, 'hhh', 44, 'Male', 'A+', '01248492950', ''),
(00023, 'uuuuu', 111, 'Female', 'A+', '01248492950', '');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `Name` varchar(40) NOT NULL,
  `Fee` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

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
