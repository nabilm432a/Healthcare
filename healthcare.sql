-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2023 at 05:58 PM
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
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `degree` varchar(30) NOT NULL,
  `specialization` varchar(30) NOT NULL,
  `contact` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `age`, `degree`, `specialization`, `contact`) VALUES
(00001, 'Gary', 45, 'Medical Sciences', '', '02919964000'),
(00002, 'Lee', 48, 'PhD', '', '01733568870');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `bloodgroup` varchar(3) NOT NULL,
  `contact` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `age`, `gender`, `bloodgroup`, `contact`) VALUES
(00009, 'Nabil', 22, 'Male', 'O+', '01820056000'),
(00010, 'Carol', 21, 'Female', 'A+', '03522454796'),
(00011, 'Laura', 25, 'Female', 'B+', '01436244321'),
(00012, 'Beret', 30, 'Male', 'B-', '01243653221'),
(00013, 'Logan', 19, 'Male', 'A-', '01231245506'),
(00014, 'Lisa', 24, 'Female', 'A+', '01732411680'),
(00015, 'Nora', 30, 'Female', 'B-', '01835628889'),
(00016, 'Astarion', 32, 'Male', 'AB+', '01436378289'),
(00017, 'Wyll', 37, 'Male', 'O-', '01277489950'),
(00018, 'Shadowheart', 23, 'Female', 'B+', '01266378889'),
(00019, 'Ray', 12, 'Male', 'AB-', '01778988765'),
(00020, 'Lex', 27, 'Male', 'O+', '01222334567');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
