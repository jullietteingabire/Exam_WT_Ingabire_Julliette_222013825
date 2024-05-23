-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 10:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `application_date` varchar(122) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL,
  `payment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `application_date`, `candidate_id`, `payment`) VALUES
(1, '2023-04-04', 1, '8888888'),
(2, '2018-10-11', 2, '22222'),
(3, '30-12-2023', 1, '3456'),
(4, '23-01-2021', 1, '4567'),
(5, '04-02-2019', 2, '567'),
(6, '2014-10-27', 2, '34567'),
(7, '2018-10-27', 2, '4567'),
(8, '2018-10-27', 2, '7777'),
(9, '2024-05-15', 1, '88'),
(10, '2024-05-29', 2, '999'),
(11, '2024-05-15', 2, '666'),
(12, '2024-05-24', 1, '789'),
(13, '2024-05-25', 2, '99999'),
(14, '2024-05-31', 2, '778888'),
(15, '2024-05-23', 2, '999'),
(16, '2024-05-09', 2, '33333');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(150) DEFAULT NULL,
  `phone` varchar(120) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `first_name`, `last_name`, `phone`, `email`) VALUES
(3, 'Kubwimana', 'Angelique', '072456789', 'ang@gmail.com'),
(1, 'muneza ', 'joseph', '07845678', 'ff@gmail.com'),
(4, 'kubwimana', 'eric', '073345678', 'eri@gmail.com'),
(5, 'niyigaba', 'cederic', '072234567', 'cedro@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `industry` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `founded_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `name`, `industry`, `location`, `founded_date`) VALUES
(1, 'MTN Rwanda', 'IT services', 'huye', '2001-10-20'),
(2, 'Bank of Kigali', 'financiol', 'nyanza', '2024-05-15'),
(3, 'MTN Rwanda', 'network infrastracture', 'Kigali', '1962-01-01'),
(4, 'MTN Rwanda', 'internet service', 'Rwamagana', '2011-01-01'),
(5, 'Bralirwa', 'beleverage', 'Rubavu', '2015-05-14'),
(6, 'Inyange', 'manufacturing', 'Masaka', '2024-05-08'),
(8, 'Inyange', 'finaciol services', 'Masaka', '2024-05-01'),
(10, 'MTN Rwanda', 'networking', 'nyagatare', '2024-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(111) DEFAULT NULL,
  `graduation_date` varchar(231) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `field_of_study` varchar(100) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `start_date`, `end_date`, `graduation_date`, `degree`, `field_of_study`, `candidate_id`) VALUES
(1, '2005-23-02', '2010-25-12', '2011-01-01', 'masters', 'information technology', 1),
(2, '2021-03-09', '2023-04-05', '2023-12-12', 'Bacherors', 'education', 2),
(5, '2024-05-01', '2024-05-09', '2024-05-10', 'Bachelor of arts', 'junalism', 1),
(6, '2024-05-15', '2024-06-01', '2024-12-12', 'Doctoral(ph.D)', 'communication', 2),
(7, '2024-05-09', '2024-05-23', '2024-05-18', 'communicationnn', 'communication', 2),
(9, '2024-05-02', '2024-05-09', '2024-05-23', 'communicationnn', 'communication', 2);

-- --------------------------------------------------------

--
-- Table structure for table `employers`
--

CREATE TABLE `employers` (
  `employer_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `industry` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employers`
--

INSERT INTO `employers` (`employer_id`, `name`, `email`, `industry`) VALUES
(1, 'Kamana Serge', 'kama@gmail.com', 'technology'),
(2, 'Keza Anitaa', 'keza@gmail.com', 'financiol services'),
(3, 'Titi Brownn', 'tit@gmail.com', 'finance'),
(4, 'ineza', 'fab@gmqil.com', 'beverage'),
(5, 'Rukundo Charles', 'charl@gmail.com', 'manufacturing'),
(6, 'mutesi peninah', 'tesi@gmail.com', 'networking'),
(7, 'honolei', 'honti@gmail.com', 'financiol');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `experience_id` int(11) NOT NULL,
  `company` varchar(100) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`experience_id`, `company`, `position`, `start_date`, `end_date`, `candidate_id`) VALUES
(1, 'Bank of kigali', 'human resource', '2021-01-01', '2024-01-09', 2),
(2, 'CIMERWA', ' financiol manager', '2012-03-09', '2015-05-04', 4),
(3, 'inyange', 'sales and marketing manager', '2023-12-01', '2024-10-12', 3),
(4, 'CIMERWA', 'maintainance engineer', '2024-05-22', '2024-05-31', 2),
(5, 'Bank of kigali', 'financiol manager', '2024-05-16', '2024-05-31', 3);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(25) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `description`, `location`, `company_id`) VALUES
(1, 'bland  manager', '  implement bland starate', 'Rubavu', 5),
(2, 'investment advisor', 'provide advice to investo', 'kigali', 2),
(3, 'loan officer', 'help to provide loan', 'kigali', 2),
(4, 'network engneer', 'help to stallation networ', 'Kamonyi', 3),
(5, 'marketing coordinator', 'promote company product', 'Rubavu', 5),
(11, NULL, 'gyu', 'ftyu', 1),
(13, 'rrrrrrrrrrrrrrrrrrrrrrrrr', 'yyy', 'rety', 1),
(14, 'kjjkk', 'gggggg', 'Masaka', 2),
(15, 'rtyuio', 'vbn', 'vbn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `resume_id` int(11) NOT NULL,
  `skills` varchar(333) DEFAULT NULL,
  `reference` varchar(222) DEFAULT NULL,
  `langauges` varchar(111) DEFAULT NULL,
  `experience_years` int(11) DEFAULT NULL,
  `education_level` varchar(50) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`resume_id`, `skills`, `reference`, `langauges`, `experience_years`, `education_level`, `candidate_id`) VALUES
(1, 'time manager', 'Dr Mizero\r\ngg@mail.com', 'kinyarwanda and english', 4, 'Bachelors degree', 1),
(2, 'leadership', 'Host: nobleman nob@gamil.com', 'kinyarwanda and english', 3, 'high school diploma', -2),
(3, 'crtical thinking', 'Dr Habiyambere John\r\njohn@gmail.com\r\n', 'chines and english', 10, 'doctorate', 3),
(4, 'creativity', 'host Ikuzwe Steine\r\nsteine@gmail.com', 'kinyarwanda and kiswahil', 3, 'high school diploma', 2);

-- --------------------------------------------------------

--
-- Table structure for table `salaryranges`
--

CREATE TABLE `salaryranges` (
  `salary_range_id` int(11) NOT NULL,
  `minimum_salary` decimal(10,2) DEFAULT NULL,
  `maximum_salary` decimal(10,2) DEFAULT NULL,
  `currency` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salaryranges`
--

INSERT INTO `salaryranges` (`salary_range_id`, `minimum_salary`, `maximum_salary`, `currency`) VALUES
(1, 2344.00, 10000.00, 'USD'),
(2, 200000.00, 50000.00, 'EUR'),
(3, 345.00, 34567.00, 'EUR'),
(4, 3456.00, 67889.00, 'INP(indian rupee)'),
(5, 56789.00, 8900678.00, 'USD'),
(6, 5678.00, 67898.00, 'USD'),
(7, 456789.00, 67856789.00, 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `skill_name` varchar(50) DEFAULT NULL,
  `certification` varchar(20) DEFAULT NULL,
  `years_of_experience` varchar(222) DEFAULT NULL,
  `candidate_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `skill_name`, `certification`, `years_of_experience`, `candidate_id`) VALUES
(1, 'problem solving', 'Critical Thinking an', '3', 1),
(2, 'communication', 'public speaking cert', '4', 2),
(3, 'leadership', 'Leadership Developme', '5', 3),
(4, 'teamwork', 'collaboratively with', '5', 1),
(6, 'time management', 'time management cert', '2020-01-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `gender`, `email`, `telephone`, `DoB`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(6, 'cle', 'muk', 'cle', 'male', 'cle@gmail.com', '0780495290', '2024-04-30', '$2y$10$a7kUDLhmwhSsQ66MO4LMS.GOBabFRZuXc7CyIgONkR5xs35oLv/3G', '2024-05-21 20:21:07', '1', 0),
(7, 'juju', 'gag', 'mm', 'female', 'juli@gmail.com', '0784567', '2024-05-08', '$2y$10$wdVhCOMTFQ9OCbhshcyWt.ZhHwR.7LcqZ8eXMAhJOwNTLLeT6cVyy', '2024-05-21 20:22:12', '11', 0),
(8, 'julliette', 'tiya', 'll', 'female', 'gaga@gmal.com', '0780495290', '2024-05-01', '$2y$10$hEtLCcugE8Av58AwvXo3Sea/KGxaiH47EQ.pmKiU0yDj5JjBag9y2', '2024-05-21 20:25:16', '22', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `employers`
--
ALTER TABLE `employers`
  ADD PRIMARY KEY (`employer_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`experience_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`resume_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `salaryranges`
--
ALTER TABLE `salaryranges`
  ADD PRIMARY KEY (`salary_range_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`skill_id`),
  ADD KEY `candidate_id` (`candidate_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employers`
--
ALTER TABLE `employers`
  MODIFY `employer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `resume_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `salaryranges`
--
ALTER TABLE `salaryranges`
  MODIFY `salary_range_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
