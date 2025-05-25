-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 25, 2025 at 02:31 AM
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
  `job_qualifications_or_skills` text NOT NULL,
  `job_full_qualifications_or_skills` text NOT NULL,
  `job_essential_or_preferred` text NOT NULL,
  `job_benifits` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `job_company`, `job_location`, `job_department`, `job_employment_type`, `job_logo`, `job_logo_link`, `job_salary_min`, `job_salary_max`, `job_information`, `job_manager`, `job_manager_email`, `job_hero_image`, `job_summary`, `job_qualifications_or_skills`, `job_full_qualifications_or_skills`, `job_essential_or_preferred`, `job_benifits`) VALUES
(1, 'Data Analyst', 'Pear', 'Sunshine, VIC, Australia, 3020', 'IT', 'Full Time', 'images/Pear_Logo.png', 'https://icarly.fandom.com/wiki/Pear_Company', 90000, 110000, 'Leverage advanced analytical techniques to extract, transform, and interpret complex data sets from diverse sources, ensuring data integrity and reliability.*Design and develop dynamic dashboards, visualizations, and executive-level reports that communicate insights and support strategic decision-making.*Collaborate cross-functionally with stakeholders to understand business objectives and translate them into impactful data-driven solutions.*Monitor key business metrics, proactively flag anomalies, and provide actionable recommendations based on data insights.*Champion best practices in data governance, documentation, and analytical methodology to drive consistency and scalability across the organization.*Contribute to the evolution of data infrastructure by partnering with data engineering and IT teams to enhance data accessibility and usability.', 'Manager Billy Bob', 'thebestbigbraingroup@gmail.com', 'styles/images/Office_People.jpg', 'We are seeking a detail-oriented and analytical Data Analyst to join our team. In this role, you will be responsible for collecting, analysing, and interpreting large datasets to help the company make informed business decisions. You will work closely with various departments, leveraging your analytical skills to provide actionable insights and recommendations that drive business growth.', 'Bachelors degree in Computer Science, Information Technology, Statistics or Business Analytics.*Minimum of 2 years of Industry Experience.*Proficiency in SQL, BigQuery, Tableau, Power Query, and Excel.*A keen eye for detail, problem-solving skills, and the ability to optimise data processes.*Excellent communication skills to translate data insights into business value.', 'Bachelor\'s degree in Data Science, Statistics, Mathematics, Computer Science, Economics, or a related quantitative field.*2 years of professional experience in a data analyst or similar analytical role.*Advanced proficiency in SQL, including complex joins, subqueries, CTEs, and performance optimization.*Strong proficiency in Python or R for data analysis, automation, and scripting tasks.*\r\nStrong analytical and problem-solving skills with attention to detail.*Excellent communication skills, with the ability to present data insights clearly to non-technical stakeholders.*Experience with cloud-based data platforms (e.g., AWS, Google Cloud, Azure).*Familiarity with big data tools and environments (e.g., Hadoop, Spark).*Experience in the IT sector.*Experience working in an Agile environment or with cross-functional teams.*Exposure to A/B testing, forecasting, or predictive modelling techniques.', 'Essential*Essential*Essential*Essential*Essential*Essential*Preferred*Preferred*Preferred*Preferred*Preferred', 'Fully covered Private Health Insurance.*2 months of annual leave per year.*Flexible Working.*Flexible Start.'),
(2, 'Junior Software Developer', 'Google', 'Melbourne, VIC, Australia, 3000', 'IT', 'Full Time', 'images/Google_Logo.png', 'https://about.google/', 80000, 90000, 'Contribute to the design and development of robust, scalable software solutions under the mentorship of senior engineers.*Write clean, maintainable, and well-documented code aligned with industry best practices and internal standards.*Participate in peer code reviews, embracing feedback as an opportunity for continuous learning and improvement.*Assist in diagnosing and resolving technical issues, ensuring optimal performance and user experience.*Collaborate effectively with cross-functional teams to deliver high-quality features that align with project goals and timelines.*Engage in ongoing professional development by staying informed of emerging technologies and modern development methodologies.', 'Senior Software Developer Sally Sue', 'thebestbigbraingroup@gmail.com', 'styles/images/Office_People.jpg', 'At Google, we’re looking for passionate, innovative, and growth-minded junior software developers to join our world-class engineering team. As a Junior Software Developer, you’ll work alongside experienced engineers to design, develop, test, and maintain scalable software solutions that impact millions of users around the world. This is an excellent opportunity for recent graduates or early-career developers who are eager to learn, grow, and contribute to real-world projects at a global tech leader.', 'Bachelor\'s degree in Computer Science, Information Technology, Statistics or Business Analytics.*Minimum of 2 years of Industry Experience.*Proficiency in at least one programming language (e.g. Swift, Python, Java, C++, JavaScript).*A keen eye for detail, problem-solving skills, and the ability to optimise data processes.*Excellent communication skills to translate data insights into business value.', 'Bachelors degree in Computer Science, Information Technology, Statistics or Business Analytics.*Minimum of 2 years of Industry Experience.*Proficiency in at least one programming language (e.g. Swift, Python, Java, C++, JavaScript).*A keen eye for detail, problem-solving skills, and the ability to optimise data processes.Excellent communication skills to translate data insights into business value.*Internship or personal project experience involving software development.*Familiarity with cloud platforms (e.g., Google Cloud Platform, AWS, or Azure).*Exposure to web or mobile application development.*Passion for technology and innovation.', 'Essential*Essential*Essential*Essential*Essential*Preferred*Preferred*Preferred*Preferred', 'Fully covered Private Health Insurance.*2 months of annual leave per year.*Flexible Working.*Flexable Start.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
