-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 08, 2018 at 12:27 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `visitormnt`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'gool', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(10) NOT NULL,
  `class_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`) VALUES
(13, '1st'),
(14, '2nd'),
(15, '3rd'),
(16, '4th'),
(17, '5th'),
(18, '6th'),
(19, '7th'),
(20, '8th'),
(21, '9th'),
(22, '10th'),
(23, '11th'),
(24, '12th');

-- --------------------------------------------------------

--
-- Table structure for table `class_sub`
--

CREATE TABLE `class_sub` (
  `id` int(20) NOT NULL,
  `class_name` varchar(40) NOT NULL,
  `sub_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_sub`
--

INSERT INTO `class_sub` (`id`, `class_name`, `sub_name`) VALUES
(1, '1st', 'hindi,english,maths,science'),
(2, '2nd', 'hindi,english,maths,science'),
(3, '3rd', 'hindi,english,maths,science'),
(4, '4th', 'hindi,english,maths,science'),
(5, '5th', 'hindi,english,maths,science'),
(6, '6th', 'hindi,english,maths,science'),
(7, '7th', 'hindi,english,maths,science'),
(8, '8th', 'hindi,english,maths,science'),
(9, '9th', 'hindi,english,maths,science'),
(10, '10th', 'hindi,english,maths,science,physics'),
(11, '11th', 'hindi,english,maths,science,biology,chemistry,physics'),
(12, '12th', 'hindi,english,maths,science,biology,chemistry,physics');

-- --------------------------------------------------------

--
-- Table structure for table `dailydairy`
--

CREATE TABLE `dailydairy` (
  `id` int(20) NOT NULL,
  `class_name` varchar(20) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `title` varchar(200) NOT NULL,
  `curr_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dailydairy`
--

INSERT INTO `dailydairy` (`id`, `class_name`, `sub_name`, `title`, `curr_date`) VALUES
(1, '1st', 'hindi', 'ansadjkasjkdas', '2018-03-29'),
(2, '1st', 'english', 'art and craft', '2018-03-30'),
(3, '3rd', 'english', 'essay', '2018-04-11'),
(4, '1st', 'hindi', 'test', '2018-04-18'),
(5, '1st', 'hindi', 'chapter 1', '2018-04-25'),
(6, '1st', 'english', 'chapter 2', '2018-04-25'),
(7, '1st', 'hindi', 'chapter 1', '2018-04-18'),
(8, '1st', 'english', 'chapter 2', '2018-04-18'),
(9, '1st', 'hindi', 'chapter 1', '2018-04-18'),
(10, '1st', 'english', 'chapter 2', '2018-04-18'),
(11, '1st', 'hindi', 'chapter 1', '2018-04-17'),
(12, '1st', 'english', 'chapter 2', '2018-04-17'),
(13, '1st', 'hindi', 'chapter 1', '2018-04-16'),
(14, '1st', 'english', 'chapter 2', '2018-04-16'),
(15, '1st', 'english', 'chapter 2', '2018-04-15'),
(16, '1st', 'hindi', 'chapter 2', '2018-04-16'),
(17, '2nd', 'english', 'chapter 3', '2018-04-25'),
(18, '2nd', 'english', 'chapter 3', '2018-04-25'),
(19, '2nd', 'english', 'chapter 3', '2018-04-25'),
(20, '1st', 'maths', 'chapter 2', '2018-04-25'),
(21, '1st', 'maths', 'chapter 2', '2018-04-25'),
(22, '1st', 'economics', 'chapter 1', '2018-04-24'),
(23, '1st', 'science', 'chapter 1', '2018-04-25'),
(24, '1st', 'science', 'chapter 1', '2018-04-25'),
(27, '1st', 'science', 'chapter 1', '2018-04-25'),
(28, '1st', 'physics', 'chapter 3', '2018-04-25'),
(29, '4th', 'maths', 'kllal', '2018-04-25'),
(30, '4th', 'chemistry', 'klll', '2018-04-25'),
(31, '1st', 'hindi', 'chap 3', '2018-05-02'),
(32, '1st', 'hindi', 'chap 1', '2018-05-08'),
(33, '1st', 'hindi', 'chap 1', '2018-05-08'),
(34, '1st', 'hindi', 'afafna', '2018-05-08'),
(35, '2nd', 'english', 'operation', '2018-05-08'),
(36, '1st', 'english', 'spartan van fly', '2018-05-09'),
(37, '1st', 'maths', 'algebra', '2018-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `class_name` varchar(20) NOT NULL,
  `fees` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `class_name`, `fees`) VALUES
(4, '2nd', '10000'),
(5, '1st', '8000');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(200) NOT NULL,
  `title` varchar(300) NOT NULL,
  `date` date NOT NULL,
  `descr` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `title`, `date`, `descr`) VALUES
(3, 'ghandhi jyanti', '2017-10-02', 'ghandhi birthday');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(2, 'lala@gmail.ccom', 'd03896db5aaf0dbfe6f9ddf4687b495a');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `reg_id` varchar(100) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `phone_no` varchar(10) NOT NULL,
  `address` varchar(30) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `first_name`, `last_name`, `reg_id`, `gender`, `phone_no`, `address`, `email`, `password`) VALUES
(11, 'aman', 'singh', '1001', 'm', '9050805203', 'House No - 1332, Sector - 22-A', 'aman@gmail.com', 'ccda1683d8c97f8f2dff2ea7d649b42c'),
(14, 'jenifer', 'lopez', '1005', '', '9888882229', '15 lasangra', 'jenifer@gmail.com', '2e342c6eba58ce5f8a87aca4de7f8e74');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `reg_id` varchar(100) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `class_name` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `pemail` varchar(200) NOT NULL,
  `tfees` varchar(200) NOT NULL,
  `bfees` varchar(200) NOT NULL,
  `stu_img` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `first_name`, `last_name`, `reg_id`, `gender`, `class_name`, `dob`, `pemail`, `tfees`, `bfees`, `stu_img`) VALUES
(15, 'jasdeep', 'singh', '1001', 'm', '1st', '2018-04-25', 'aman@gmail.com', '8000', '6000', 0x2e2e2f75706c6f61642f313030312e6a7067),
(16, 'jennifer', 'lopez', '1002', 'm', '1st', '2018-04-02', 'aman@gmail.com', '8000', '6000', 0x2e2e2f75706c6f61642f313030322e6a7067),
(17, 'gagan', 'deep', '1005', 'm', '2nd', '2018-04-15', 'johar@gmail.com', '10000', '10000', 0x2e2e2f75706c6f61642f313030352e6a7067),
(26, 'robo', 'cop', '1010', 'm', '2nd', '2018-05-06', 'robo@gmail.com', '10000', '10000', 0x2e2e2f75706c6f61642f313031302e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `stu_attendence`
--

CREATE TABLE `stu_attendence` (
  `id` int(100) NOT NULL,
  `reg_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_attendence`
--

INSERT INTO `stu_attendence` (`id`, `reg_id`, `date`, `status`) VALUES
(38, '1001', '2018-05-12', 'p'),
(39, '1002', '2018-05-12', 'a'),
(40, '1005', '2018-05-12', 'l'),
(41, '1008', '2018-05-12', 'p');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(10) NOT NULL,
  `sub_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `sub_name`) VALUES
(1, 'hindi'),
(2, 'english'),
(3, 'maths'),
(4, 'science'),
(5, 'biology'),
(6, 'chemistry'),
(7, 'physics');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) NOT NULL,
  `reg_id` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `gender` varchar(1) DEFAULT NULL,
  `pno` varchar(20) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `class_name` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `photo` longblob NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `reg_id`, `first_name`, `last_name`, `gender`, `pno`, `sub_name`, `class_name`, `email`, `photo`, `password`) VALUES
(17, '2001', 'kamal', 'hasan', 'm', '635412354', 'biology', '1st,2nd', 'kamal@gmail.com', 0x2e2e2f75706c6f61642f2e6a7067, 'aa63b0d5d950361c05012235ab520512'),
(18, '2002', 'kamla', 'devi', 'f', '635412354', 'chemistry', '1st,3rd', 'kamla@gmail.com', 0x2e2e2f75706c6f61642f323030322e6a7067, 'edba6f3230922f75eae09423ecaba49b');

-- --------------------------------------------------------

--
-- Table structure for table `tea_attendence`
--

CREATE TABLE `tea_attendence` (
  `id` int(100) NOT NULL,
  `reg_id` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `rating` int(1) NOT NULL,
  `desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `first_name`, `rating`, `desc`) VALUES
(1, 'jassi', 3, 'this is the best school ever'),
(2, 'sam', 2, 'bst school ever and ever'),
(3, 'justin', 2, 'cool cool cool'),
(4, 'jasdeep', 2, 'jio jee bhar ke'),
(5, 'kalu', 3, 'AWESOME');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_sub`
--
ALTER TABLE `class_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dailydairy`
--
ALTER TABLE `dailydairy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stu_attendence`
--
ALTER TABLE `stu_attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tea_attendence`
--
ALTER TABLE `tea_attendence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `class_sub`
--
ALTER TABLE `class_sub`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dailydairy`
--
ALTER TABLE `dailydairy`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `stu_attendence`
--
ALTER TABLE `stu_attendence`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tea_attendence`
--
ALTER TABLE `tea_attendence`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
