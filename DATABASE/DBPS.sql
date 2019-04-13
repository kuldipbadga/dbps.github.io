-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2019 at 02:30 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalbuspass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email_id` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email_id`, `Password`) VALUES
('digitalbuspass@gmail.com', 'buspass@KB');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `con_id` int(10) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `mo_no` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `msg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`con_id`, `first_name`, `last_name`, `mo_no`, `email`, `msg`) VALUES
(1, 'KB', 'KB', 132132, 'AAD@ma.com', '12klsdnasdnkljdnkljan'),
(2, 'ad', 'asd', 0, 'AAD@ma.com', 'dasasd'),
(3, 'adsads', 'ads', 0, 'asdasd', 'ads'),
(4, 'kuldip', 'makvana', 132132, 'AAD@ma.com', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `distance`
--

CREATE TABLE `distance` (
  `Dis_id` int(10) NOT NULL,
  `From_village` varchar(20) NOT NULL,
  `To_village` varchar(20) NOT NULL,
  `Km` int(10) NOT NULL,
  `Pass_type` varchar(10) NOT NULL,
  `Duration` varchar(15) NOT NULL,
  `Amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distance`
--

INSERT INTO `distance` (`Dis_id`, `From_village`, `To_village`, `Km`, `Pass_type`, `Duration`, `Amount`) VALUES
(1, 'Mundra', 'Bhuj', 53, 'local', '6 month', 2600),
(11, 'mundra', 'pragpar', 8, 'local', '6 month', 500),
(12, 'mundra', 'pragpar', 8, 'express', '6 month', 800),
(13, 'mundra', 'kera', 37, 'local', '6 month', 1800),
(14, 'mundra', 'kera', 37, 'express', '6 month', 2000),
(15, 'mundra', 'baladia', 41, 'local', '6 month', 2000),
(16, 'mundra', 'baladia', 41, 'express', '6 month', 2300),
(17, 'mundra', 'bhuj', 53, 'express', '6 month', 3000),
(18, 'bhuj', 'mundra', 53, 'local', '6 month', 2600),
(19, 'bhuj', 'mundra', 53, 'express', '6 month', 3000),
(20, 'baladia', 'mundra', 41, 'local', '6 month', 2300),
(21, 'baladia', 'mundra', 41, 'express', '6 month', 2000),
(22, 'kera', 'mundra', 37, 'local', '6 month', 1800),
(23, 'kera', 'mundra', 37, 'express', '6 month', 2000),
(24, 'pragpar', 'mundra', 8, 'local', '6 month', 500),
(25, 'pragpar', 'mundra', 8, 'express', '6 month', 800),
(26, 'kera', 'baladia', 3, 'local', '6 month', 200),
(27, 'kera', 'baladia', 3, 'express', '6 month', 500),
(28, 'baladia', 'kera', 3, 'local', '6 month', 200),
(29, 'baladia', 'kera', 3, 'express', '6 month', 500),
(30, 'baladia', 'bhuj', 18, 'local', '6 month', 950),
(31, 'baladia', 'bhuj', 18, 'express', '6 month', 1300),
(32, 'bharapar', 'bhuj', 14, 'local', '6 month', 700),
(33, 'bharapar', 'bhuj', 14, 'express', '6 month', 900),
(34, 'sedata', 'bhuj', 10, 'local', '6 month', 600),
(35, 'sedata', 'bhuj', 10, 'express', '6 month', 900),
(36, 'bhuj', 'anjar', 42, 'local', '6 month', 2050),
(37, 'bhuj', 'anjar', 42, 'express', '6 month', 2300),
(38, 'anjar', 'bhuj', 42, 'local', '6 month', 2050),
(39, 'anjar', 'bhuj', 42, 'express', '6 month', 2300),
(40, 'bhuj', 'adipur', 53, 'local', '6 month', 2600),
(41, 'bhuj', 'adipur', 53, 'express', '6 month', 3000),
(42, 'adipur', 'bhuj', 53, 'local', '6 month', 2600),
(43, 'adipur', 'bhuj', 53, 'express', '6 month', 3000),
(44, 'gandhidham', 'bhuj', 57, 'local', '6 month', 2800),
(45, 'gandhidham', 'bhuj', 57, 'express', '6 month', 3100),
(46, 'bhuj', 'gandhidham', 57, 'local', '6 month', 2800),
(47, 'bhuj', 'gandhidham', 57, 'express', '6 month', 3100),
(48, 'bhujodi', 'bhuj', 9, 'local', '6 month', 550),
(49, 'bhujodi', 'bhujodi', 9, 'express', '6 month', 850),
(50, 'madhapar', 'bhuj', 7, 'local', '6 month', 450),
(51, 'madhapar', 'bhuj', 7, 'express', '6 month', 750),
(52, 'kukma', 'bhuj', 13, 'local', '6 month', 1200),
(53, 'kukma', 'bhuj', 13, 'express', '6 month', 1500),
(54, 'ratnal', 'bhuj', 26, 'local', '6 month', 1500),
(55, 'ratnal', 'bhuj', 26, 'express', '6 month', 1800),
(58, 'bhuj', 'kera', 20, 'local', '6 month', 2200);

-- --------------------------------------------------------

--
-- Table structure for table `institute`
--

CREATE TABLE `institute` (
  `Insti_id` int(10) NOT NULL,
  `Reg_id` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Insti_code` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institute`
--

INSERT INTO `institute` (`Insti_id`, `Reg_id`, `Name`, `Address`, `Insti_code`) VALUES
(23, 1, 'Government Polytechnic Bhuj', 'BHUJ', 657),
(26, 3, 'GPBhuj', 'Bhuj', 654),
(27, 4, 'GPB', 'bhuj', 657),
(28, 2, 'GPB', 'Bhuj', 657),
(29, 5, 'HJD', 'kera', 123),
(30, 6, 'GPB', 'bhuj', 657);

-- --------------------------------------------------------

--
-- Table structure for table `new_pass`
--

CREATE TABLE `new_pass` (
  `stu_id` int(10) NOT NULL,
  `Reg_id` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `gender` varchar(5) NOT NULL,
  `age` varchar(5) NOT NULL,
  `course` varchar(10) NOT NULL,
  `sem` int(5) NOT NULL,
  `Sem_start_date` date NOT NULL,
  `Sem_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_pass`
--

INSERT INTO `new_pass` (`stu_id`, `Reg_id`, `birth_date`, `gender`, `age`, `course`, `sem`, `Sem_start_date`, `Sem_end_date`) VALUES
(13, 1, '2001-01-09', 'Male', '19', 'computer', 1, '2019-01-03', '2019-01-25'),
(16, 3, '2007-01-02', 'Femal', '12', 'computer', 1, '2019-02-01', '2019-02-28'),
(17, 4, '2017-01-01', 'Male', '2', 'computer', 1, '2019-02-01', '2019-02-28'),
(18, 2, '2001-01-01', 'Male', '18', 'computer', 2, '2019-02-01', '2019-02-28'),
(19, 5, '2008-01-01', 'Femal', '11', 'computer', 6, '2019-04-01', '2019-04-02'),
(20, 6, '2014-01-01', 'Male', '5', 'Civil', 4, '2019-04-01', '2019-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `new_student_doc`
--

CREATE TABLE `new_student_doc` (
  `id` int(10) NOT NULL,
  `reg_id` int(10) NOT NULL,
  `photo` varchar(80) NOT NULL,
  `icard` varchar(80) NOT NULL,
  `add_fee_re` varchar(80) NOT NULL,
  `add_slip` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_student_doc`
--

INSERT INTO `new_student_doc` (`id`, `reg_id`, `photo`, `icard`, `add_fee_re`, `add_slip`) VALUES
(3, 1, 'kuldip.jpg', 'HoneyComb.png', 'eclair.png', 'froyo.png'),
(6, 4, 'PicsArt_02-22-07.43.16.jpg', 'PicsArt_02-22-08.25.33.jpg', 'PicsArt_02-22-08.42.37.jpg', 'PicsArt_02-22-12.02.19.jpg'),
(7, 3, 'donut.png', 'eclair.png', 'HoneyComb.png', 'froyo.png');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(10) NOT NULL,
  `description` text NOT NULL,
  `link` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `description`, `link`) VALUES
(2, 'New website created...', 'http://localhost/DIGITAL%20BUS%20PASS'),
(3, 'There are updated roots', 'show.com');

-- --------------------------------------------------------

--
-- Table structure for table `not_verified_stu`
--

CREATE TABLE `not_verified_stu` (
  `Reg_id` int(11) NOT NULL,
  `name` tinyint(1) NOT NULL,
  `email` tinyint(1) NOT NULL,
  `no` tinyint(1) NOT NULL,
  `dob` tinyint(1) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `age` tinyint(1) NOT NULL,
  `cource` tinyint(1) NOT NULL,
  `sem` tinyint(1) NOT NULL,
  `sem_start_date` tinyint(1) NOT NULL,
  `sem_end_date` tinyint(1) NOT NULL,
  `village_name` tinyint(1) NOT NULL,
  `pincode` tinyint(1) NOT NULL,
  `district` tinyint(1) NOT NULL,
  `depot` tinyint(1) NOT NULL,
  `insti_name` tinyint(1) NOT NULL,
  `insti_add` tinyint(1) NOT NULL,
  `insti_code` tinyint(1) NOT NULL,
  `photo` tinyint(1) NOT NULL,
  `icard` tinyint(1) NOT NULL,
  `add_fee_re` tinyint(1) NOT NULL,
  `add_slip` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `old_student_doc`
--

CREATE TABLE `old_student_doc` (
  `id` int(10) NOT NULL,
  `reg_id` int(10) NOT NULL,
  `photo` varchar(40) NOT NULL,
  `icard` varchar(30) NOT NULL,
  `fee_re` varchar(30) NOT NULL,
  `hall_ticket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `old_student_doc`
--

INSERT INTO `old_student_doc` (`id`, `reg_id`, `photo`, `icard`, `fee_re`, `hall_ticket`) VALUES
(1, 2, 'Screenshot (2).jpg', 'Screenshot (5).png', 'Screenshot (6).png', 'Screenshot (7).png'),
(2, 5, 'imgcache0.4170806.jpg', 'imgcache0.4359625.jpg', 'imgcache0.4889043.jpg', 'imgcache0.4245371.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `Reg_id` int(10) NOT NULL,
  `F_name` varchar(10) NOT NULL,
  `M_name` varchar(10) NOT NULL,
  `S_name` varchar(10) NOT NULL,
  `Email_id` text NOT NULL,
  `Contact_no` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`Reg_id`, `F_name`, `M_name`, `S_name`, `Email_id`, `Contact_no`, `Password`) VALUES
(1, 'Kuldip', 'Laxman', 'Makwana', 'makvanakuldip05@gmail.com', '9638624818', 'Kuldip@123'),
(2, 'HitenKumar', 'Devjji', 'Makwana', 'hitenmakwana4@gmail.com', '2147483647', '1234'),
(3, 'Madhu', 'Rajesh', 'Puhal', 'madhupuhal@gmail.com', '1234509876', '12345'),
(4, 'Parth', 'abc', 'Maru', 'parthmaru@gmail.com', '1234567890', 'Parth@123'),
(5, 'Dipali', 'Laxman', 'Makwana', 'dipali@gmail.com', '1234567890', 'Dipali@123'),
(6, 'Rohit', 'Kanji', 'Badga', 'rohit@gmail.com', '1234567890', 'Rohit@123');

-- --------------------------------------------------------

--
-- Table structure for table `renew`
--

CREATE TABLE `renew` (
  `id` int(10) NOT NULL,
  `reg_id` int(10) NOT NULL,
  `sdate` date NOT NULL,
  `edate` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `old_pass` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `renew`
--

INSERT INTO `renew` (`id`, `reg_id`, `sdate`, `edate`, `type`, `old_pass`, `status`) VALUES
(1, 1, '2019-04-01', '2019-04-30', 'Local', ' Context Digram (1).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_add`
--

CREATE TABLE `student_add` (
  `add_id` int(11) NOT NULL,
  `Reg_id` int(11) NOT NULL,
  `village` varchar(20) NOT NULL,
  `pincode` int(10) NOT NULL,
  `district` varchar(10) NOT NULL,
  `depot` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_add`
--

INSERT INTO `student_add` (`add_id`, `Reg_id`, `village`, `pincode`, `district`, `depot`) VALUES
(15, 1, 'baladia', 370427, 'kutch', 'bhuj'),
(18, 3, 'Bhuj', 370001, 'kutch', 'bhuj'),
(19, 4, 'Naranpar', 370427, 'kutch', 'bhuj'),
(20, 2, 'baladia', 370427, 'kutch', 'bhuj'),
(21, 5, 'baladia', 370427, 'kutch', 'bhuj'),
(22, 6, 'baladia', 370427, 'kutch', 'bhuj');

-- --------------------------------------------------------

--
-- Table structure for table `student_pass`
--

CREATE TABLE `student_pass` (
  `pass_id` int(11) NOT NULL,
  `Reg_id` int(10) NOT NULL,
  `fvillage` varchar(20) NOT NULL,
  `tvillage` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_pass`
--

INSERT INTO `student_pass` (`pass_id`, `Reg_id`, `fvillage`, `tvillage`, `type`, `charge`) VALUES
(383, 1, 'Mundra', 'Bhuj', 'local', 2000),
(386, 3, 'Mundra', 'Bhuj', 'local', 2000),
(388, 4, 'mundra', 'bhuj', 'local', 2000),
(390, 2, 'mundra', 'BHUJ', 'local', 2000),
(391, 5, 'baladia', 'kera', 'local', 200),
(392, 6, 'baladia', 'bhuj', 'local', 950);

-- --------------------------------------------------------

--
-- Table structure for table `verified_stu`
--

CREATE TABLE `verified_stu` (
  `Reg_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `verifier`
--

CREATE TABLE `verifier` (
  `ver_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `insti_name` varchar(20) NOT NULL,
  `no` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `insti_card` varchar(50) NOT NULL,
  `validity` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `verifier`
--

INSERT INTO `verifier` (`ver_id`, `name`, `insti_name`, `no`, `email`, `password`, `insti_card`, `validity`) VALUES
(3, 'xyz', 'HJD', '1231231230', 'xyz@gmail.com', 'Xyz@12345', 'xyz.png', 0),
(4, 'abc', 'GPB', '1234567980', 'abc@gmail.com', 'abc@123', 'donut.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `distance`
--
ALTER TABLE `distance`
  ADD PRIMARY KEY (`Dis_id`);

--
-- Indexes for table `institute`
--
ALTER TABLE `institute`
  ADD PRIMARY KEY (`Insti_id`),
  ADD KEY `Reg_id` (`Reg_id`);

--
-- Indexes for table `new_pass`
--
ALTER TABLE `new_pass`
  ADD PRIMARY KEY (`stu_id`),
  ADD KEY `Reg_id` (`Reg_id`);

--
-- Indexes for table `new_student_doc`
--
ALTER TABLE `new_student_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `not_verified_stu`
--
ALTER TABLE `not_verified_stu`
  ADD KEY `Reg_id` (`Reg_id`);

--
-- Indexes for table `old_student_doc`
--
ALTER TABLE `old_student_doc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`Reg_id`);

--
-- Indexes for table `renew`
--
ALTER TABLE `renew`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_add`
--
ALTER TABLE `student_add`
  ADD PRIMARY KEY (`add_id`),
  ADD KEY `Reg_id` (`Reg_id`);

--
-- Indexes for table `student_pass`
--
ALTER TABLE `student_pass`
  ADD PRIMARY KEY (`pass_id`);

--
-- Indexes for table `verifier`
--
ALTER TABLE `verifier`
  ADD PRIMARY KEY (`ver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `con_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `distance`
--
ALTER TABLE `distance`
  MODIFY `Dis_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `institute`
--
ALTER TABLE `institute`
  MODIFY `Insti_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `new_pass`
--
ALTER TABLE `new_pass`
  MODIFY `stu_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `new_student_doc`
--
ALTER TABLE `new_student_doc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `old_student_doc`
--
ALTER TABLE `old_student_doc`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `Reg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `renew`
--
ALTER TABLE `renew`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_add`
--
ALTER TABLE `student_add`
  MODIFY `add_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_pass`
--
ALTER TABLE `student_pass`
  MODIFY `pass_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT for table `verifier`
--
ALTER TABLE `verifier`
  MODIFY `ver_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `institute`
--
ALTER TABLE `institute`
  ADD CONSTRAINT `institute_ibfk_1` FOREIGN KEY (`Reg_id`) REFERENCES `registration` (`Reg_id`);

--
-- Constraints for table `new_pass`
--
ALTER TABLE `new_pass`
  ADD CONSTRAINT `new_pass_ibfk_1` FOREIGN KEY (`Reg_id`) REFERENCES `registration` (`Reg_id`);

--
-- Constraints for table `not_verified_stu`
--
ALTER TABLE `not_verified_stu`
  ADD CONSTRAINT `not_verified_stu_ibfk_1` FOREIGN KEY (`Reg_id`) REFERENCES `registration` (`Reg_id`);

--
-- Constraints for table `student_add`
--
ALTER TABLE `student_add`
  ADD CONSTRAINT `student_add_ibfk_1` FOREIGN KEY (`Reg_id`) REFERENCES `registration` (`Reg_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
