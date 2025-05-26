-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 06:52 AM
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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `enquiry_number` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `reason` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `enquiry` varchar(500) NOT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`enquiry_number`, `status`, `reason`, `name`, `email`, `enquiry`, `submission_time`) VALUES
(1, 'New', 'technical_', 'Hippo', 'hippo@swin.edu', 'Work now pls', '2025-05-23 01:08:21'),
(2, 'New', 'technical_', 'Hippo', 'hippo@swin.edu', 'Work now pls', '2025-05-23 01:10:17'),
(3, 'New', 'technical_', 'Hippo', 'hippo@swin.edu', 'Work now pls', '2025-05-23 01:13:30'),
(4, 'New', 'technical_', 'Hippo', 'hippo@swin.edu', 'Work now pls', '2025-05-23 02:16:37'),
(5, 'New', 'partnershi', 'Cat', 'cats@swin.ecu', 'food pls', '2025-05-23 02:16:56'),
(6, 'New', 'careers_in', 'dlphin', 'asdf@swe.com', 'testing data', '2025-05-23 02:30:50'),
(7, 'New', 'careers_in', 'Peanut', 'sdfg@asdfg.com', 'testing data', '2025-05-23 02:31:03'),
(8, 'New', 'careers_in', 'Geese', 'tippr@sw.ed', 'testing data', '2025-05-23 02:32:49'),
(9, 'New', 'technical_', 'sad', 'asd@asdf.com', 'testing data', '2025-05-23 02:35:40'),
(10, 'New', 'technical_', 'pls', 'pls@sw.com', 'testing data', '2025-05-23 02:37:24'),
(11, 'New', 'careers_in', 'asdf', 'asdf@asdf.com', 'testing data', '2025-05-23 02:38:12'),
(12, 'New', 'partnershi', 'adfs', 'sdfg@asdfg.com', 'testing data', '2025-05-23 02:42:45'),
(13, 'New', 'technical_', 'sdfg', 'tippr@sw.ed', 'testing data', '2025-05-23 02:44:07'),
(14, 'New', 'general', 'harry', 'potter@swin.edu', 'testing data', '2025-05-25 01:16:48'),
(15, 'New', 'technical_', 'harry', 'potter@swin.edu', 'testing data', '2025-05-25 02:12:45'),
(16, 'New', 'general', 'Hillary', 'ocean@waves.com.au', 'testing data', '2025-05-25 09:32:45'),
(17, 'New', 'partnershi', 'Andrea', 'hill@people.com', 'testing data.', '2025-05-26 00:13:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`enquiry_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `enquiry_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
