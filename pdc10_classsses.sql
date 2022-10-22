-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2022 at 10:02 PM
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
-- Database: `pdc10_classsses`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `class_code` varchar(255) NOT NULL,
  `teacher_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `description`, `class_code`, `teacher_id`) VALUES
(6, 'Advanced Information Management', 'This course includes discussion on database models and database management.', 'AIM10', '00-1112-123');

-- --------------------------------------------------------

--
-- Table structure for table `class_rosters`
--

CREATE TABLE `class_rosters` (
  `id` int(11) NOT NULL,
  `class_code` varchar(255) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `enrolled_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class_rosters`
--

INSERT INTO `class_rosters` (`id`, `class_code`, `student_number`, `enrolled_at`) VALUES
(1, 'AIM10', '14-2068-321', '2022-10-22 12:08:43'),
(5, 'AIM10', '14-2068-321', '0000-00-00 00:00:00'),
(6, 'AIM10', '20-1068-143', '2022-10-22 19:30:13');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `program` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `student_number`, `email`, `contact_number`, `program`) VALUES
(1, 'Karylle', 'Lopez', '20-1068-435', 'lopez.karylle@auf.edu.ph', '093561285434', 'BSITK'),
(5, 'David', 'Aaron', '20-1067-436', 'david.aaron@auf.edu.ph', '09356185641', 'BSIT'),
(6, 'Micoh Jomarie', 'Yabut', '14-1068-123', 'yabut.micoh@auf.edu.ph', '09354321789', 'BSCS'),
(7, 'Russelle', 'Bangsil', '14-2068-321', 'bangsil.russelle@auf.edu.ph', '09123784561', 'BMMA'),
(9, 'Bobby', 'Bot', '20-1068-143', 'bobbybot@auf.edu.ph', '09356128143', 'BSIT'),
(10, 'Arnold', 'Lim', '20-1068-246', 'arnold.lim@gmail.com', '09351234567', 'BMMA'),
(11, 'Kane', 'Castillano', '18-2068-123', 'kane.erryl@auf.edu.ph', '09351237423', 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `employee_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `email`, `contact_number`, `employee_number`) VALUES
(4, 'Adriane', 'Brent', 'adriane.brent@auf.edu.ph', '09456789541', '00-1112-123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`class_code`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `class_rosters`
--
ALTER TABLE `class_rosters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_code` (`class_code`),
  ADD KEY `student_number` (`student_number`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `student_number` (`student_number`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `employee_number` (`employee_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_rosters`
--
ALTER TABLE `class_rosters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `classes_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`employee_number`);

--
-- Constraints for table `class_rosters`
--
ALTER TABLE `class_rosters`
  ADD CONSTRAINT `class_rosters_ibfk_1` FOREIGN KEY (`student_number`) REFERENCES `students` (`student_number`),
  ADD CONSTRAINT `class_rosters_ibfk_2` FOREIGN KEY (`class_code`) REFERENCES `classes` (`class_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
