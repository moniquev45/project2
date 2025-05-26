-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2025 at 02:55 PM
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
-- Database: `project_two`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `team_member_id` int(3) NOT NULL,
  `member_name` text NOT NULL,
  `member_student_id` varchar(9) NOT NULL,
  `member_degree` text NOT NULL,
  `member_contribution` text NOT NULL,
  `member_experience` text NOT NULL,
  `member_hobby` text NOT NULL,
  `member_favourite` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`team_member_id`, `member_name`, `member_student_id`, `member_degree`, `member_contribution`, `member_experience`, `member_hobby`, `member_favourite`) VALUES
(1, 'Monique', '105910625', 'Bachelors of Engineering (Honours)/Bachelors of Computer Science', 'Created the GitHub repositories for p1 and p2.*Formatted header and footer on all webpages.*Chose colour palette.*Choose fonts.*Developed the Job page.*Develop the Job Listing page.*Styled the relevant CSS.*Assisted in the creation of Jira epics.*Assisted in delegating tasks to each member in p1 and p2.*Changed files to php.*Updated the job page with PHP.*Created and developed the job database table.*Assisted with creation of incorparted nav, footer and header.*Created and styled the manager icon.', 'Units 1/2 Applied Computing*Units 3/4 Software Development.*Creating a Ticket Management Application for Musical Theatre*Programming and designing a doormat that notifies you if you have a package', 'Knitting*Drawing*Singing*Musical Theatre*Programming*Crocheting*Video games', 'Colour: Pink*Food: Persimmons*Drink: Tea*Animal: Dolphins*Band: Heather the Musical*Film: She\'s the man'),
(2, 'Riley', '105925988', 'Bachelors of Engineering (Honours)/Bachelors of Computer Sceince', 'Set and chose colour palette*Created company graphics*Developed the Home Page*Assisted with the development of Jira stories*Developed the manager_login.php and login/logout features', 'Units 1/2 Applied Computing*Units 3/4 Software Development*Units 3/4 Algorithmics*Work experience with a Siemen\'s contractor*Created an app to calculate your due income tax', 'Programming*Video Games*Reading*Listening to music*Watching Musicals*Learning trivia*Cats', 'Colour: Blue*Food: Butter Chicken*Drink: Ginger Beer*Animal: Domestic cat*Band Heaven Pierce Her*Film: SCP:Overlord'),
(3, 'Stacey', '105904848', 'Bachelor of Games & Interactivity / Bachelor of Computer Science', 'Created Jira epics*Developed the Apply and Contact pages*Styled the relevant CSS for these pages*Outline and delegated tasks needed to be complete for both p1 and p2*Developed the PHP header, footer and nav .inc files*Developed the EOI process*Developed the receipt system', 'No prior experience', 'Reading*Sculpting*Painting*Video Games*But mainly reading', 'Colour: Gem colours*Food: Pasta*Drink: Chai Latte*Animal: Frog*Band: Epic the Musical*Film: No films, Taskmaster series all the way'),
(4, 'Vic', '105864492', 'Bachelor of Computer Science', 'Created Jira stories*Developed the about page*Styled the relevant CSS*Created the team photo*Developed the PHP team member data base*Altered the about page to print the database*Developed the lock out system if incorrect password is entered', 'Created small HTML webpages*Intro to Programming*Object Oriented Programming', 'Reading*Video games*Hiking*Four wheel driving*Baking', 'Colour: Pink*Food: Chicken nuggets*Drink: Monster Peach*Animal: Cats!!*Band: Fall Out Boy*Film: The Dressmaker');

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

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(5) NOT NULL,
  `job_title` text NOT NULL,
  `job_company` text NOT NULL,
  `job_location` varchar(100) NOT NULL,
  `job_department` text NOT NULL,
  `job_employment_type` text NOT NULL,
  `job_logo` text NOT NULL,
  `job_logo_link` text NOT NULL,
  `job_salary_min` float NOT NULL,
  `job_salary_max` float NOT NULL,
  `job_information` text NOT NULL,
  `job_manager` text NOT NULL,
  `job_manager_email` text NOT NULL,
  `job_hero_image` text NOT NULL,
  `job_summary` text NOT NULL,
  `job_full_qualifications_or_skills` text NOT NULL,
  `job_essential_or_preferred` text NOT NULL,
  `job_benifits` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `job_company`, `job_location`, `job_department`, `job_employment_type`, `job_logo`, `job_logo_link`, `job_salary_min`, `job_salary_max`, `job_information`, `job_manager`, `job_manager_email`, `job_hero_image`, `job_summary`, `job_full_qualifications_or_skills`, `job_essential_or_preferred`, `job_benifits`) VALUES
(1, 'Data Analyst', 'Pear', 'Sunshine, VIC, Australia, 3020', 'IT', 'Full Time', 'images/Pear_Logo.png', 'https://icarly.fandom.com/wiki/Pear_Company', 90000, 110000, 'Leverage advanced analytical techniques to extract, transform, and interpret complex data sets from diverse sources, ensuring data integrity and reliability.*Design and develop dynamic dashboards, visualizations, and executive-level reports that communicate insights and support strategic decision-making.*Collaborate cross-functionally with stakeholders to understand business objectives and translate them into impactful data-driven solutions.*Monitor key business metrics, proactively flag anomalies, and provide actionable recommendations based on data insights.*Champion best practices in data governance, documentation, and analytical methodology to drive consistency and scalability across the organization.*Contribute to the evolution of data infrastructure by partnering with data engineering and IT teams to enhance data accessibility and usability.', 'Manager Billy Bob', 'thebestbigbraingroup@gmail.com', 'styles/images/Office_People.jpg', 'We are seeking a detail-oriented and analytical Data Analyst to join our team. In this role, you will be responsible for collecting, analysing, and interpreting large datasets to help the company make informed business decisions. You will work closely with various departments, leveraging your analytical skills to provide actionable insights and recommendations that drive business growth.', 'Bachelor\'s degree in Data Science, Statistics, Mathematics, Computer Science, Economics, or a related quantitative field.*2 years of professional experience in a data analyst or similar analytical role.*Advanced proficiency in SQL, including complex joins, subqueries, CTEs, and performance optimization.*Strong proficiency in Python or R for data analysis, automation, and scripting tasks.*\r\nStrong analytical and problem-solving skills with attention to detail.*Excellent communication skills, with the ability to present data insights clearly to non-technical stakeholders.*Experience with cloud-based data platforms (e.g., AWS, Google Cloud, Azure).*Familiarity with big data tools and environments (e.g., Hadoop, Spark).*Experience in the IT sector.*Experience working in an Agile environment or with cross-functional teams.*Exposure to A/B testing, forecasting, or predictive modelling techniques.', 'Essential*Essential*Essential*Essential*Essential*Essential*Preferred*Preferred*Preferred*Preferred*Preferred', 'Fully covered Private Health Insurance.*2 months of annual leave per year.*Flexible Working.*Flexible Start.'),
(2, 'Junior Software Developer', 'Google', 'Melbourne, VIC, Australia, 3000', 'IT', 'Full Time', 'images/Google_Logo.png', 'https://about.google/', 80000, 90000, 'Contribute to the design and development of robust, scalable software solutions under the mentorship of senior engineers.*Write clean, maintainable, and well-documented code aligned with industry best practices and internal standards.*Participate in peer code reviews, embracing feedback as an opportunity for continuous learning and improvement.*Assist in diagnosing and resolving technical issues, ensuring optimal performance and user experience.*Collaborate effectively with cross-functional teams to deliver high-quality features that align with project goals and timelines.*Engage in ongoing professional development by staying informed of emerging technologies and modern development methodologies.', 'Senior Software Developer Sally Sue', 'thebestbigbraingroup@gmail.com', 'styles/images/Office_People_2.jpg', 'At Google, we’re looking for passionate, innovative, and growth-minded junior software developers to join our world-class engineering team. As a Junior Software Developer, you’ll work alongside experienced engineers to design, develop, test, and maintain scalable software solutions that impact millions of users around the world. This is an excellent opportunity for recent graduates or early-career developers who are eager to learn, grow, and contribute to real-world projects at a global tech leader.', 'Bachelors degree in Computer Science, Information Technology, Statistics or Business Analytics.*Minimum of 2 years of Industry Experience.*Proficiency in at least one programming language (e.g. Swift, Python, Java, C++, JavaScript).*A keen eye for detail, problem-solving skills, and the ability to optimise data processes.Excellent communication skills to translate data insights into business value.*Internship or personal project experience involving software development.*Familiarity with cloud platforms (e.g., Google Cloud Platform, AWS, or Azure).*Exposure to web or mobile application development.*Passion for technology and innovation.', 'Essential*Essential*Essential*Essential*Essential*Preferred*Preferred*Preferred*Preferred', 'Fully covered Private Health Insurance.*2 months of annual leave per year.*Flexible Working.*Flexable Start.');

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`, `username`, `password_hash`, `created_at`) VALUES
(3, 'admin', '$2y$10$tvuoSiihntfCbBWeEiwm3.gIjQBvedYDpwGSl4tBRhxgGrvw.7m3y', '2025-05-23 13:15:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`enquiry_number`);

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`eoi_number`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `enquiry_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `eoi_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
