-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 07, 2021 at 04:51 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `Project`
--
CREATE DATABASE IF NOT EXISTS `Project` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `Project`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `ID` int(11) NOT NULL,
  `nID` int(11) NOT NULL,
  `pID` int(11) NOT NULL,
  `vName` varchar(30) NOT NULL,
  `timeSlot` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nrecords`
--

CREATE TABLE `nrecords` (
  `nID` int(11) NOT NULL,
  `timeSlotID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(11) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `MI` varchar(1) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `phoneNum` bigint(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `FName`, `LName`, `MI`, `address`, `age`, `gender`, `phoneNum`, `username`, `password`) VALUES
(1, 'Jill', 'Smith', 'H', 'Something Road', 50, 'female', 1274929094, 'jSmith', 'nurse'),
(4, 'Susan', 'Stoneman', 'C', '555 Chicago Av.', 40, 'female', 1274929184, 'sStoneman', 'nurse'),
(5, 'John', 'Rockman', 'P', '1321 whatever drive', 31, 'male', 1274929182, 'jRockman', 'nurse'),
(6, 'Kelly', 'Porter', 'A', '1321 whatever drive', 21, 'female', 1274929184, 'kPorter', 'nurse'),
(7, 'George', 'Barker', 'V', '1321 whatever drive', 18, 'male', 1274925184, 'gBarker', 'nurse'),
(8, 'Sal', 'Klink', 'Z', '1321 whatever drive', 26, 'female', 1274239184, 'sKlink', 'nurse'),
(10, 'Michael', 'Ventro', 'Q', '1321 whatever drive', 27, 'male', 1274929184, 'mVentro', 'nurse'),
(14, 'Bill', 'Batty', 'b', '99 Some Address Ct.', 30, 'M', 7082155555, 'billyboi', 'nursy'),
(17, 'nurseTest', 'nurseTest', 'N', 'Nurse address', 999, 'female', 1234567890, 'nurse', 'nurse');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `SSN` int(9) NOT NULL,
  `FName` varchar(30) NOT NULL,
  `LName` varchar(30) NOT NULL,
  `MI` varchar(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `phoneNum` bigint(11) NOT NULL,
  `address` varchar(30) NOT NULL,
  `medicalHistory` varchar(100) NOT NULL,
  `race` varchar(30) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `elgibility` int(1) DEFAULT NULL,
  `vTaken` varchar(30) DEFAULT NULL,
  `currDose` int(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `SSN`, `FName`, `LName`, `MI`, `username`, `password`, `age`, `gender`, `phoneNum`, `address`, `medicalHistory`, `race`, `occupation`, `elgibility`, `vTaken`, `currDose`) VALUES
(1, 124993353, 'Jack', 'Johnson', 'P', 'jJohnson', 'patient', 31, 'male', 10292994, '773 happy lane', 'Healthy', 'Black', 'Lawyer', 1, NULL, 0),
(2, 714632383, 'Jessica', 'Tyson', 'P', 'jJohnson', 'patient', 23, 'female', 69985994, '111 test drive', 'Healthy', 'Black', 'Engineer', 1, NULL, 0),
(3, 3333, 'Terrence', 'Rice', 'E', 'tRice', 'patient', 47, 'male', 96359167, '533 temp lane', 'Cancer', 'Black', 'Doctor', 1, NULL, 0),
(4, 875392423, 'Rachel', 'Air', 'R', 'rAir', 'patient', 28, 'female', 813475, '324 acres road', 'Healthy', 'Black', 'Athlete', 1, NULL, 0),
(5, 944567923, 'Tyler', 'Blink', 'J', 'tBlink', 'patient', 55, 'male', 92852346, '773 happy lane', 'Healthy', 'Black', 'Accountant', 0, NULL, 0),
(6, 666341555, 'Test', 'Patient', 't', 'patient', 'patient', 15, 'male', 9993332222, '232 W East st.', 'Cancer', 'White', 'Builder', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `precords`
--

CREATE TABLE `precords` (
  `pID` int(11) NOT NULL,
  `timeSlotID` int(11) NOT NULL,
  `vID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

CREATE TABLE `records` (
  `ID` int(11) NOT NULL,
  `timeSlot` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(11) NOT NULL,
  `VName` varchar(30) NOT NULL,
  `CompName` varchar(30) NOT NULL,
  `Description` varchar(100) DEFAULT NULL,
  `NumDoses` int(11) NOT NULL,
  `Availability` int(10) NOT NULL,
  `OnHold` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `VName`, `CompName`, `Description`, `NumDoses`, `Availability`, `OnHold`) VALUES
(1, 'BNT162b2', 'Pfizer', NULL, 1500, 1500, 0),
(2, 'mRNA-1273', 'ModernaTX', NULL, 2000, 2000, 0),
(3, 'JNJ-78436735', 'Johnson & Johnson', NULL, 1000, 1000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nrecords`
--
ALTER TABLE `nrecords`
  ADD KEY `fk_nrecords_records` (`timeSlotID`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `SSN` (`SSN`),
  ADD UNIQUE KEY `SSN_2` (`SSN`),
  ADD KEY `vTaken` (`vTaken`);

--
-- Indexes for table `precords`
--
ALTER TABLE `precords`
  ADD KEY `fk_precords_records` (`timeSlotID`);

--
-- Indexes for table `records`
--
ALTER TABLE `records`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `timeSlot` (`timeSlot`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `records`
--
ALTER TABLE `records`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nrecords`
--
ALTER TABLE `nrecords`
  ADD CONSTRAINT `fk_nrecords_records` FOREIGN KEY (`timeSlotID`) REFERENCES `records` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `precords`
--
ALTER TABLE `precords`
  ADD CONSTRAINT `fk_precords_records` FOREIGN KEY (`timeSlotID`) REFERENCES `records` (`ID`) ON DELETE CASCADE ON UPDATE NO ACTION;
