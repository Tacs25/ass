-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2022 at 06:25 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `access`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Email`, `Pass`) VALUES
(1, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `ID` int(11) NOT NULL,
  `sched` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `ID` int(11) NOT NULL,
  `Booking_ID` int(11) DEFAULT NULL,
  `Appointment_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `sched` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`ID`, `Booking_ID`, `Appointment_ID`, `User_ID`, `sched`, `start_time`, `end_time`, `status`) VALUES
(1, 22, 23, 1, '2022-02-15', '10:30:00', '11:30:00', 'canceled'),
(2, 21, 22, 1, '2022-02-15', '13:30:00', '14:10:00', 'canceled'),
(3, 18, 18, 1, '2022-02-15', '12:30:00', '13:35:00', 'canceled'),
(4, 20, 21, 1, '2022-02-15', '12:30:00', '13:01:00', 'canceled'),
(5, 19, 19, 1, '2022-02-15', '12:59:00', '10:59:00', 'canceled'),
(6, 17, 17, 1, '2022-02-15', '08:30:00', '08:40:00', 'canceled'),
(7, 16, 16, 1, '2022-02-16', '12:30:00', '13:40:00', 'canceled'),
(8, 15, 15, 1, '2022-02-16', '12:51:00', '12:40:00', 'canceled'),
(9, 13, 13, 1, '2022-02-15', '10:43:00', '11:40:00', 'canceled'),
(10, 14, 14, 1, '2022-02-15', '10:30:00', '12:30:00', 'canceled'),
(11, 12, 12, 1, '2022-02-15', '13:30:00', '12:30:00', 'canceled'),
(12, 11, 9, 1, '2022-02-15', '11:30:00', '12:30:00', 'canceled'),
(13, 10, 11, 1, '2022-02-15', '12:30:00', '13:40:00', 'canceled'),
(14, 9, 10, 1, '2022-02-15', '12:40:00', '13:40:00', 'canceled'),
(15, 9, 10, 1, '2022-02-15', '12:40:00', '13:40:00', 'canceled'),
(16, 8, 6, 1, '2022-02-15', '10:25:00', '10:30:00', 'canceled'),
(17, 7, 7, 1, '2022-02-15', '11:30:00', '11:40:00', 'canceled'),
(18, 5, 4, 1, '2022-02-15', '10:30:00', '11:30:00', 'canceled'),
(19, 6, 8, 1, '2022-02-15', '12:30:00', '12:40:00', 'canceled'),
(20, 4, 5, 1, '2022-02-15', '11:30:00', '12:30:00', 'canceled'),
(21, 3, 3, 1, '2022-02-16', '01:15:00', '10:30:00', 'canceled'),
(22, 2, 2, 1, '2022-02-15', '12:30:00', '12:40:00', 'canceled'),
(23, 1, 1, 1, '2022-02-15', '11:30:00', '11:40:00', 'canceled'),
(24, 23, 24, 1, '2022-02-15', '09:30:00', '10:30:00', 'canceled'),
(25, NULL, 20, NULL, '0000-00-00', '08:30:00', '16:25:00', 'unbooked'),
(26, NULL, 25, NULL, '0000-00-00', '10:15:00', '10:40:00', 'unbooked'),
(27, NULL, 26, NULL, '2022-02-15', '09:32:00', '09:32:00', 'unbooked'),
(28, NULL, 27, NULL, '2022-02-15', '11:30:00', '13:35:00', 'unbooked'),
(29, NULL, 30, NULL, '0000-00-00', '12:30:00', '12:30:00', 'unbooked'),
(32, 24, 37, 15, '2022-02-17', '13:15:00', '16:15:00', 'canceled');

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `ID` int(11) NOT NULL,
  `Appointment_ID` int(11) DEFAULT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `sched` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `ID` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Pass` varchar(255) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Contact` varchar(120) NOT NULL,
  `Home` varchar(100) NOT NULL,
  `vkey` varchar(255) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `createdate` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`ID`, `Email`, `Pass`, `First_Name`, `Last_Name`, `Gender`, `Contact`, `Home`, `vkey`, `verified`, `createdate`) VALUES
(15, 'adriantacdol2@gmail.com', '$2y$10$wSlPcIx5BKQ2mbNcw.1gwunAijLZLNhvrFqsWZURv9Vebhl6oDcRq', 'Adrian', 'Tacdol', 'Male', '0912-4567-891', 'QC', 'be7de0c4fcabe2593b9bac3656dbfefa', 1, '2022-02-16 04:05:21.981456'),
(16, 'micahganda08@gmail.com', '$2y$10$w5HWuL/Bmj5pcDdvYbF68uY65/8lu5dhAnv1gLOrwJm4JnNRoT9VS', 'Micah', 'Ganda', 'Female', '0912-4567-891', 'QC', '7435d05a77fdd4d7cb644e31265945cd', 1, '2022-02-16 04:14:32.673261');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
