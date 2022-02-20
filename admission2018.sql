-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2021 at 06:58 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";




--
-- Database: `admission2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isActive` INT(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `isActive`) VALUES
(1, 'admin', 'admin@admin.com', 'admin', NULL, NULL, NULL),
(2, 'admin2', 'admin2@admin2.com', 'admin2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 'admin3', 'admin3@admin3.com', 'admin3', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `ID` int(2) NOT NULL,
  `coursename` varchar(200) DEFAULT NULL,
  `isActive` INT(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `coursename`, `isActive`) VALUES
(27, 'A', NULL),
(29, 'B', NULL),
(30, 'C', NULL),
(31, 'D', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education_information`
--

CREATE TABLE `education_information` (
  `E_ID` int(3) NOT NULL,
  `ID` int(9) NOT NULL,
  `ssc_board` varchar(700) NOT NULL,
  `ssc_per` varchar(300) NOT NULL,
  `ssc_year` varchar(500) NOT NULL,
  `hsc_board` varchar(700) NOT NULL,
  `hsc_per` varchar(300) NOT NULL,
  `hsc_year` varchar(500) NOT NULL,
  `isActive` INT(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
--

--
-

--


--
-- Table structure for table `selected_courses`
--

CREATE TABLE `selected_courses` (
  `S_ID` int(2) NOT NULL,
  `ID` int(30) NOT NULL,
  `coursename` varchar(200) NOT NULL,
  `isAvailable` INT(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `selected_courses`
--

INSERT INTO `selected_courses` (`S_ID`, `ID`, `coursename`, `isAvailable`) VALUES
(1, 2, 'A', 1),
(2, 0, 'B', 1),
(3, 0, 'C', 1),
(4, 0, 'D', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `ID` int(3) NOT NULL,
  `FULLNAME` varchar(70) DEFAULT NULL,
  `GENDER` varchar(8) DEFAULT NULL,
  `PNUMBER` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(60) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL,
  `register_date` date DEFAULT NULL,
  `profile_image` varchar(100) DEFAULT NULL,
  `isActive` INT(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Indexes for dumped tables

-- Indexes for table `admins`

ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `coursename` (`coursename`);

--
-- Indexes for table `education_information`
--
ALTER TABLE `education_information`
  ADD PRIMARY KEY (`E_ID`);

--
-- Indexes for table `education_information_be`
--
ALTER TABLE `education_information_be`
  ADD PRIMARY KEY (`BE_ID`);

--
-- Indexes for table `selected_courses`
--
ALTER TABLE `selected_courses`
  ADD PRIMARY KEY (`S_ID`),
  ADD KEY `bba_index_coursename` (`coursename`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EMAIL` (`EMAIL`),
  ADD KEY `stud_name_index` (`FULLNAME`),
  ADD KEY `gender_stud` (`GENDER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `education_information`
--
ALTER TABLE `education_information`
  MODIFY `E_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education_information_be`
--
ALTER TABLE `education_information_be`
  MODIFY `BE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `selected_courses`
--
ALTER TABLE `selected_courses`
  MODIFY `S_ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
