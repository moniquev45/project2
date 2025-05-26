-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2025 at 05:19 AM
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
