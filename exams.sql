-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2018 at 06:30 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exams`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'jannat1ruma@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `que_id` int(10) NOT NULL,
  `sub_id` int(10) DEFAULT NULL,
  `que` varchar(200) DEFAULT NULL,
  `op1` varchar(100) DEFAULT NULL,
  `op2` varchar(100) DEFAULT NULL,
  `op3` varchar(100) DEFAULT NULL,
  `op4` varchar(100) DEFAULT NULL,
  `ans` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`que_id`, `sub_id`, `que`, `op1`, `op2`, `op3`, `op4`, `ans`) VALUES
(1, 1, 'HTML Means?', 'Hyper Text Manage Line', 'Hyper Text Markup Language', 'Hyper Text Manage Language', 'Hyper Text Markup Line', 2),
(2, 1, 'Who is making the Web standards?', 'Google', 'Microsoft', 'The World Wide Web Consortium', 'Mozilla', 3),
(3, 1, 'Choose the correct HTML element for the largest heading:', 'a', 'b', 'c', 'd', 1),
(4, 2, 'Which of the following type of variables are whole numbers, without a decimal point, like 4195?', 'Integers', 'Doubles', 'Booleans', 'Strings', 1),
(5, 2, 'Which of the following is correct about PHP?', 'PHP can access cookies variables and set cookies.', 'Using PHP, you can restrict users to access some pages of your website.', 'It can encrypt data.', 'All of the above.', 4),
(6, 2, 'Which of the following array represents an array with strings as index?', 'Numeric Array', 'Associative Array', 'Multidimentional Array', 'None of the above.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `email` varchar(50) DEFAULT NULL,
  `sub_id` int(5) DEFAULT NULL,
  `test_date` timestamp NULL DEFAULT NULL,
  `tot_que` int(5) DEFAULT NULL,
  `score` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`email`, `sub_id`, `test_date`, `tot_que`, `score`) VALUES
('sk@yahoo.com', 1, '2017-03-20 05:49:04', 3, 2),
('sm@gmail.com', 1, '2017-03-20 05:49:49', 3, 3),
('sm@gmail.com', 1, '2017-03-20 05:55:42', 3, 2),
('sk@yahoo.com', 1, '2017-03-20 15:38:15', 3, 2),
('', 1, '2018-04-16 18:09:45', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(5) NOT NULL,
  `sub_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`) VALUES
(1, 'HTML'),
(2, 'PHP'),
(3, 'Javascript'),
(4, 'CSS'),
(5, 'Python');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `institution`, `phone`) VALUES
(1, 'Jannat', 'jannat1ruma@gmail.com', '12345', 'EWU', '01731683427'),
(2, 'sk', 'sk@yahoo.com', '1234', 'PLSCR', '01731683427'),
(3, 'dipu', 'sh@gmail.com', '1234', 'EWU', '01731683427'),
(4, 'sw', 'Dfcf@dc.com', '1234', 'x', 'xwx'),
(5, 'zxcv', 'zxcv@gmai.com', '1234', 'nm', '123'),
(6, 'abc', 'abc@gmail.com', '1234', 'nsu', '001233456779'),
(7, 'asd', 'asd@gmail.com', '123', 'aiub', '148526963147'),
(8, 'mno', 'mno@gmail.com', '123', '', ''),
(9, 'qwe', 'qwe@gmail.com', '123', 'iub', ''),
(10, 'pqr', 'pqr@gmail.com', '1234', 'diu', '232435436457'),
(11, 'pqrs', 'qw@gmail.com', '1234', 'uiu', '4567ui8o0987654'),
(12, 'd,mcd,', 'ds@gmail.com', '1472', 'kljl', '2135464');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `que_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
