-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 06:53 AM
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
-- Database: `project_two`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `eoi_number` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `job_reference` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `family_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `suburb` varchar(50) NOT NULL,
  `state` varchar(3) NOT NULL,
  `postcode` char(4) NOT NULL,
  `email_apply` varchar(50) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `skills` text NOT NULL,
  `skills_other` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `salary_scale` tinyint(4) DEFAULT NULL,
  `hours_start` time DEFAULT NULL,
  `hours_end` time DEFAULT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`eoi_number`, `status`, `job_reference`, `first_name`, `family_name`, `dob`, `gender`, `street_address`, `suburb`, `state`, `postcode`, `email_apply`, `mobile`, `skills`, `skills_other`, `requirements`, `salary_scale`, `hours_start`, `hours_end`, `submission_time`) VALUES
(1, 'New', '#00001', 'Cindy', 'Lauper', '2015-05-01', 'female', '12 lane rd', 'Mooroolbark', 'VIC', '3138', 'look@data.com', '0455666888', 'Experience', NULL, NULL, NULL, NULL, NULL, '2025-05-25 06:46:56'),
(18, 'New', '#00001', 'Apple', 'Cider', '1970-01-01', 'female', '13 Happy Lane', 'Peanuts', 'SA', '0200', 'tommy@swein.edu', '0411226668', 'Bachelor,\nExperience,\nTech Proficiency,\nCommunication,\nProblem Solving,\nOther Skills', 'I can play the French Horn.', 'Need to work from home.', 5, '06:37:00', '21:37:00', '2025-05-25 06:37:07'),
(19, 'New', '#00001', 'Cindy', 'Lauper', '2015-05-01', 'female', '12 lane rd', 'Mooroolbark', 'VIC', '3138', 'look@data.com', '0455666888', 'Experience', NULL, NULL, NULL, NULL, NULL, '2025-05-25 06:47:15'),
(20, 'New', '#00001', 'Alice', 'Wren', '1990-05-10', 'female', '123 Elm St', 'Melbourne', 'VIC', '3000', 'alice@example.com', '0400123456', 'Communication', NULL, 'Available immediately', 3, '09:00:00', '17:00:00', '2025-05-25 06:48:42'),
(21, 'New', '#00001', 'Bob', 'Stone', '1988-11-21', 'male', '456 Oak Rd', 'Sydney', 'NSW', '2000', 'bob@example.com', '0411123456', 'Communication', 'Public Speaking', NULL, 4, '08:30:00', '16:30:00', '2025-05-25 06:48:42'),
(22, 'New', '#00001', 'Cara', 'Nguyen', '1995-03-03', 'female', '789 Pine Ln', 'Brisbane', 'QLD', '4000', 'cara@example.com', '0422123456', 'Bachelor', NULL, 'Needs flexible hours', 2, '10:00:00', '18:00:00', '2025-05-25 06:48:42'),
(23, 'New', '#00002', 'Apple', 'Peanut', '1987-12-09', 'male', '12 Main St', 'Hello', 'TAS', '0200', 'swim@swin.edu', '0411555622', 'Bachelor,\nOther Skills', 'Unparalleled juggling skills', 'Work from home only.', 10, '09:54:00', '23:54:00', '2025-05-25 08:54:36'),
(24, 'New', '#00001', 'Amy', 'Peanut', '1987-12-09', 'male', '12 Main St', 'Hello', 'TAS', '0200', 'swim@swin.edu', '0411555622', 'Bachelor,\nOther Skills', 'Unparallelled juggling skills', 'Work from home only.', 6, '07:23:00', '12:23:00', '2025-05-25 09:23:52'),
(25, 'New', '#00002', 'Scarlet', 'Peanut', '1987-12-09', 'male', '12 Main St', 'Hello', 'TAS', '0200', 'swim@swin.edu', '0411555622', 'Bachelor,\nExperience,\nTech Proficiency,\nCommunication,\nProblem Solving,\nOther Skills', 'Unparallelled juggling skills', 'Work from home only.', 6, '10:25:00', '00:00:00', '2025-05-25 09:25:43'),
(26, 'New', '#00001', 'Amy', 'Peanut', '1987-12-09', 'female', '12 Main St', 'Hello', 'NT', '0200', 'swim@swin.edu', '0411555622', 'Bachelor,\nTech Proficiency', '', 'Work from home only.', 6, '00:00:00', '00:00:00', '2025-05-26 00:12:24'),
(27, 'New', '#00002', 'Maple', 'Syrup', '2007-12-04', 'male', '1 Help Lane', 'Timbukto', 'QLD', '3195', 'oval@swin.edu.au', '0455666999', 'Bachelor,\nExperience,\nTech Proficiency,\nCommunication,\nProblem Solving,\nOther Skills', 'I am an impressive juggler', '', 6, '11:16:00', '15:16:00', '2025-05-26 00:17:04'),
(28, 'New', '#00001', 'Cinnamon', 'Bun', '1970-01-01', 'female', '13 Depression Lane', 'Cintanom', 'NSW', '0200', 'example@fakeperson.com', '0400 222 3', 'Bachelor,\nExperience,\nTech Proficiency,\nCommunication,\nProblem Solving,\nOther Skills', 'I am very impressive with a paint brush', 'I need to work from home please.', 6, '00:00:00', '00:00:00', '2025-05-26 00:20:21'),
(29, 'New', '#00001', 'Scarlet', 'Peanut', '1987-12-09', 'NA', '12 Main St', 'Hello', 'NSW', '0200', 'swim@swin.edu', '0411555622', 'Bachelor,\nExperience,\nTech Proficiency,\nCommunication,\nProblem Solving,\nOther Skills', 'Brilliant Micromanaging skills', 'WFH', 9, '11:06:00', '23:06:00', '2025-05-26 01:07:00'),
(30, 'New', '#00002', 'Alexandra', 'Misha', '2004-03-05', 'female', '17 Happy Rd', 'Michigan', 'SA', '3137', 'example@fakeperson.com.au', '0455 666 7', 'Bachelor,\nExperience,\nTech Proficiency,\nCommunication,\nProblem Solving,\nOther Skills', 'Can make a very mean beverage.', 'I will be working nights only.', 11, '14:00:00', '05:00:00', '2025-05-26 04:03:39'),
(31, 'New', '#00002', 'Sunshine', 'Malibu', '1970-01-01', 'male', '12 Depression Avenue', 'Topia', 'VIC', '3138', 'fake@exampleperson.com', '0455 666 7', 'Bachelor,\nExperience,\nTech Proficiency,\nCommunication,\nProblem Solving,\nOther Skills', 'Make a mean beverage.', 'WFH at night only.', 15, '21:00:00', '05:00:00', '2025-05-26 04:08:51'),
(32, 'New', '#00002', 'Lilo', 'Stitch', '1970-01-01', 'female', '12 Fantasy Lane', 'Mooroolbark', 'VIC', '3138', 'exampleperson@student.swin.edu.au', '0411 225 5', 'Bachelor,\nExperience,\nTech Proficiency,\nCommunication,\nProblem Solving,\nOther Skills', 'Fantastic with beverages.', 'WFH at night only.', 15, '17:00:00', '10:00:00', '2025-05-26 04:13:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`eoi_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `eoi_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
