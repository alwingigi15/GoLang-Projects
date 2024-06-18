-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 27, 2021 at 12:51 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `area_id` int(10) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(20) NOT NULL,
  `area_img` varchar(50) NOT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `area_name`, `area_img`) VALUES
(11, 'Chalakkudy', '273cdb8a11ed7ed8f784e4e3588fa8b2_6aa0d37f590.jpg'),
(10, 'Angamaly', 'e79a27fea0ad7f6851d181503e1f8e03_0f7f5d37dff.jpg'),
(14, 'Aluva', 'b0b3cfebfc7f2db995800a5403aa8ae5_022bee397f9d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `book_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(5) NOT NULL,
  `cust_id` int(5) NOT NULL,
  `book_date` date NOT NULL,
  `prblm_desc` varchar(20) NOT NULL,
  `requester_name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `area_id` int(10) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `days` int(10) NOT NULL,
  `book_status` varchar(20) NOT NULL,
  `b_status` varchar(20) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `emp_id`, `cust_id`, `book_date`, `prblm_desc`, `requester_name`, `address`, `city`, `area_id`, `contact_no`, `from_date`, `to_date`, `cust_email`, `days`, `book_status`, `b_status`) VALUES
(7, 52, 13, '2021-04-15', 'bad work', 'don devassy', 'Thekkinedath', 'Kurumassery', 12, '8798765678', '2021-04-16', '2021-04-19', 'jismonsojan7025@gmail.com', 3, 'cancel', 'pending'),
(8, 55, 13, '2021-04-15', 'not working', 'josemon', 'mavely house', 'Edakkunu', 12, '9878987675', '2021-04-19', '2021-04-27', 'jismonsojan7025@gmail.com', 8, 'booked', 'complete'),
(9, 57, 13, '2021-04-16', 'not work', 'mary', 'vadakkumchery', 'Aluva', 10, '9801234567', '2021-04-19', '2021-04-21', 'jismonsojan7025@gmail.com', 2, 'booked', 'complete'),
(10, 52, 13, '2021-04-23', 'not working', 'anjaly', 'chittanappilly house', 'meladoor', 11, '0987654345', '2021-04-24', '2021-04-26', 'jismonsojan7025@gmail.com', 2, 'booked', 'complete'),
(11, 54, 13, '2021-04-26', 'bad', 'jismon', 'parabeth house', 'moozhikkulam', 10, '98656876875', '2021-04-27', '2021-04-30', 'jismonsojan7025@gmail.com', 3, 'booked', 'accept'),
(13, 58, 18, '2021-05-10', 'not work', 'martin', 'puthanveettil', 'kalady', 12, '9876780996', '2021-05-11', '2021-05-14', 'martin@gmail.com', 3, 'booked', 'reject'),
(14, 52, 13, '2021-05-11', 'slow work', 'Annmary', 'iriban house', 'poovthussery', 11, '9876543456', '2021-05-12', '2021-05-13', 'jismonsojan7025@gmail.com', 1, 'booked', 'pending'),
(15, 54, 13, '2021-05-26', 'not working', 'sojan devassy', 'kottekkaly', 'Annamanda', 10, '9876543888', '2021-05-27', '2021-05-29', 'jismonsojan7025@gmail.com', 2, 'booked', 'pending'),
(16, 52, 13, '2021-08-10', 'does not work', 'jismon', 'Thekkinedath', 'annamanada', 11, '9876557777', '2021-08-11', '2021-08-13', 'jismonsojan7025@gmail.com', 2, 'booked', 'accept'),
(17, 67, 13, '2021-09-26', 'not work', 'Alphin', 'thettikkad', 'chiragara', 11, '9876543212', '2021-09-27', '2021-09-30', 'jismonsojan7025@gmail.com', 3, 'booked', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `cancel`
--

DROP TABLE IF EXISTS `cancel`;
CREATE TABLE IF NOT EXISTS `cancel` (
  `cancel_id` int(10) NOT NULL AUTO_INCREMENT,
  `book_id` int(10) NOT NULL,
  `cancel_date` date NOT NULL,
  PRIMARY KEY (`cancel_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cancel`
--

INSERT INTO `cancel` (`cancel_id`, `book_id`, `cancel_date`) VALUES
(1, 10, '2021-04-23'),
(2, 7, '2021-05-09'),
(3, 13, '2021-05-11');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `catid` int(4) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(20) NOT NULL,
  `cat_desc` varchar(100) NOT NULL,
  `cat_image` varchar(300) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `categoryname`, `cat_desc`, `cat_image`) VALUES
(118, 'plumber', 'fits and repairs the pipes, fitting', 'ee97b814471da9413cb20a86a6ebc1b9_682f09c1a5ad39d277bd.jpg'),
(119, 'carmechanic', 'a skilled worker who repairs and maintains vehicle engines and other machinery', '7b1bd929d741e016ef8e45b468b5f375_2934bdcd0a.jpg'),
(120, 'painter', 'a person whose job is painting buildings.', 'cfed9514442c0efdec84a266106cd070_65e05150e9315769fe.jpg'),
(121, 'welder', 'a person who welds metal.', 'b0570f423dd1c848bae90e97956c6a8d_f285243c473.jpg'),
(122, 'Electrician', 'a person who installs and maintains electrical equipment.', '95478991d7dbc2a2f8412b9da2706e28_580a4469a074.jpg'),
(123, 'carpenter', 'a person who makes and repairs wooden objects and structures.', 'f1e2d37951dfabc0cf07997e8ba1f312_8c69022b0bd859.jpg'),
(124, 'cleaner', 'xcxzcsc', 'ed7360bf5ad8eb09b9c8ae1ca85f91d5_4626eb32be5bf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `complaint_id` int(10) NOT NULL AUTO_INCREMENT,
  `cust_id` int(10) NOT NULL,
  `emp_id` int(10) NOT NULL,
  `complaint_desc` varchar(50) NOT NULL,
  `complaint_date` date NOT NULL,
  `replay` varchar(100) NOT NULL,
  `complaint_status` varchar(20) NOT NULL,
  `book_id` int(10) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`complaint_id`, `cust_id`, `emp_id`, `complaint_desc`, `complaint_date`, `replay`, `complaint_status`, `book_id`) VALUES
(1, 13, 57, 'bad behaviour', '2021-05-04', 'xaasdas', 'reply', 9),
(2, 13, 57, 'work fee is high', '2021-05-05', 'sorry for this', 'reply', 9),
(3, 13, 57, 'bad work', '2021-05-05', 'we will take an action of this', 'reply', 9),
(4, 13, 57, 'bad work', '2021-05-05', 'ok we solve it', 'reply', 9),
(5, 13, 57, 'lazy worker', '2021-05-05', 'ok we solve it', 'reply', 9),
(6, 13, 57, 'bad behaviour', '2021-05-16', '', 'apply', 9);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(5) NOT NULL AUTO_INCREMENT,
  `cust_firstname` varchar(20) NOT NULL,
  `cust_lastname` varchar(20) NOT NULL,
  `cust_gender` char(1) NOT NULL,
  `cust_age` varchar(10) NOT NULL,
  `cust_address` varchar(50) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `mobileno` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `area_id` int(10) NOT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `cust_email` (`cust_email`),
  UNIQUE KEY `mobileno` (`mobileno`),
  UNIQUE KEY `password` (`password`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_firstname`, `cust_lastname`, `cust_gender`, `cust_age`, `cust_address`, `cust_email`, `mobileno`, `password`, `area_id`) VALUES
(13, 'jismon', 'sojan', 'm', '21', 'vadakkumchery', 'jismonsojan7025@gmail.com', '8362518921', 'jismonsoja', 1),
(15, 'jismon', 'vj', 'm', '21', 'parabeth house', 'jismonsojan702@gmail.com', '9876543421', 'sojajismon', 2),
(16, 'mary', 'devassy', 'm', '21', 'kozhipatt house', 'maryd@gmail.com', '7035647362', 'zaqxswcdev', 1),
(17, 'ashwin', 'ashok', 'm', '21', 'painaadath house', 'ashwinashok@gmail.com', '7898765434', 'mkonjibhuy', 3),
(18, 'martin', 'luois', 'm', '22', 'thekkinedath house', 'martin@gmail.com', '7087654352', 'vfrbgtnhyu', 2),
(19, 'kochappan', 'devassy', 'm', '45', 'pallipaadan house', 'kochappan@gmail.com', '4567546545', 'rfvtgbyhnj', 1),
(20, 'ebi', 'baby', 'm', '24', 'parabeth house', 'ebin@gmail.com', '4444444444', 'lkjhgfdsaq', 1),
(21, 'jibin', 'sebastian', 'm', '23', 'vadakkuchery house ', 'jibin@gmail.com', '9876432145', '1234567890', 10),
(22, 'Aloshi', 'noby', 'm', '19', 'chittanappilly', 'aloshi@gmail.com', '9809879876', 'aloshi1234', 14);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(5) NOT NULL AUTO_INCREMENT,
  `emp_firstname` varchar(20) DEFAULT NULL,
  `emp_lastname` varchar(20) DEFAULT NULL,
  `emp_address` varchar(100) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `Age` int(5) DEFAULT NULL,
  `area_id` int(10) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `phn_no` varchar(30) DEFAULT NULL,
  `emp_img` varchar(300) DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `emp_email` varchar(50) DEFAULT NULL,
  `emp_password` varchar(30) DEFAULT NULL,
  `catid` int(4) DEFAULT NULL,
  `qualifi` varchar(30) DEFAULT NULL,
  `emp_exp` int(10) DEFAULT NULL,
  `emp_desc` varchar(30) DEFAULT NULL,
  `emp_avail` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_firstname`, `emp_lastname`, `emp_address`, `gender`, `dob`, `Age`, `area_id`, `city`, `phn_no`, `emp_img`, `doj`, `emp_email`, `emp_password`, `catid`, `qualifi`, `emp_exp`, `emp_desc`, `emp_avail`, `status`) VALUES
(52, 'ebin', 'baby', 'kottekkaly house', 'm', '1999-03-16', 22, 11, 'poovthussery', '7898786544', '81a75d2f3b47e3ed007552fb490f0f29_c72b3256a2546bf3.jpg', NULL, 'ebinbaby@gmail.com', 'ebin123', 118, NULL, 1, 'fast work less time', 'available', 'Approved'),
(53, 'rojin', 'paulson', 'vadakkumchery house', 'm', '2000-03-09', 20, 12, 'Athani', '7898786756', '873ab6a9f0045611d8c916d584cfcb89_d3bac53761aa2.jpg', NULL, 'Rojin@gmail.com', 'rojin', 119, NULL, 1, 'I am good at works', 'available', 'A'),
(54, 'hithesh', 'bimal', 'puthussery house', 'm', '1999-03-02', 21, 10, 'chegamanad', '7987236578', '63c03d7da8d46275073173b6d5cba02e_00184a0523.jpg', NULL, 'hithesh@gmail.com', 'hithesh', 121, NULL, 1, 'efficient work mentality', 'available', 'Approved'),
(55, 'mariya', 'babu', 'Tharayil house', 'm', '2021-03-16', 21, 11, 'poovthussery', '8976897687', '6fb4439ab8ce9a8c80889fb21eeea908_d2d81212b393.jpg', NULL, 'mariya@gmail.com', 'mariya', 120, NULL, 1, 'I am good at works', 'available', 'Approved'),
(56, 'dominic', 'joseph', 'kalaparabeth house', 'm', '1999-04-06', 22, 12, 'kochi', '9897865765', 'c1d67b404f437dde4ef1bf697534a15b_67f42059924.jpg', NULL, 'dominic@gmail.com', 'dominic', 122, NULL, 1, 'i can easly work', 'available', 'Approved'),
(57, 'nevin', 'martin', 'Thekkinadath house\r\nAngamaly', 'm', '1999-04-12', 22, 10, 'karayamparab', '9809123465', '230c1139ac633f9ce5fe2e6de6be7ba5_dd83c9b5135299a9b.jpg', NULL, 'nevin@gmail.com', 'nevin123', 122, NULL, 1, 'I am good at works', 'available', 'Approved'),
(58, 'raju', 'thomas', 'Thaliyath house\r\nAthani', 'm', '2000-06-05', 21, 12, 'kariyad', '8797456754', '0e0122e429c8d28d93a3e0c22a8390cd_8b7d2ffd395da1a8.jpg', NULL, 'raju@gmail.com', 'raju123', 123, NULL, 1, 'I am good at works', 'available', 'Approved'),
(67, 'alpin', 'devassy', 'chittedath house', 'm', '2000-09-05', 21, 10, 'chiragara', '9878765654', '4cfaa5f6cea61d04fb05a93f5a8aa92b_f31e6ba7859224545f.jpg', NULL, 'alphindevassy@gmail.com', 'alphin', 122, NULL, 5, 'good at work', 'available', 'Approved'),
(68, 'annmary', 'sojan', 'vadakkedath house', 'f', '2000-08-01', 21, 10, 'karayamparab', '9876543212', '4c9745ede1c1354a302204e544109442_ccb288f4d84.jpg', '2021-09-27', 'annmary@gmail.com', 'annmary', 124, NULL, 2, 'good cleaner', 'available', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

DROP TABLE IF EXISTS `leaves`;
CREATE TABLE IF NOT EXISTS `leaves` (
  `leave_id` int(10) NOT NULL AUTO_INCREMENT,
  `emp_id` int(5) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `reason` varchar(20) NOT NULL,
  `leave_status` varchar(20) NOT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`leave_id`, `emp_id`, `leave_from`, `leave_to`, `reason`, `leave_status`) VALUES
(1, 55, '2021-05-11', '2021-05-15', 'fever', 'cancel'),
(2, 55, '2021-05-04', '2021-05-07', 'family program', 'cancel'),
(3, 55, '2021-05-07', '2021-05-10', 'marriage', 'approve'),
(4, 55, '2021-09-25', '2021-09-30', 'fever', 'cancel'),
(5, 55, '2021-09-23', '2021-09-24', 'fever', 'cancel'),
(6, 55, '2021-09-24', '2021-09-25', 'viral infection', 'cancel');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `review_id` int(10) NOT NULL AUTO_INCREMENT,
  `cust_id` int(10) NOT NULL,
  `emp_id` int(5) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `rate_1` int(5) NOT NULL,
  `rate_2` int(5) NOT NULL,
  `re_date` date NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `cust_id`, `emp_id`, `comment`, `rate_1`, `rate_2`, `re_date`) VALUES
(9, 13, 57, 'aaaa', 4, 5, '2021-09-22');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
