-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 22, 2017 at 05:24 PM
-- Server version: 5.6.28-0ubuntu0.15.04.1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mis`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`booking_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `check_in` varchar(100) DEFAULT NULL,
  `check_out` varchar(100) NOT NULL,
  `total_price` int(10) NOT NULL,
  `remaining_price` int(10) NOT NULL,
  `payment_status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_id`, `room_id`, `booking_date`, `check_in`, `check_out`, `total_price`, `remaining_price`, `payment_status`) VALUES
(1, 1, 2, '2017-10-14 10:52:08', '1508018400', '', 7500, 1500, 0),
(2, 2, 1, '2017-10-14 10:54:34', '1508104800', '1508364000', 4000, 2000, 0),
(3, 3, 5, '2017-10-14 10:59:09', '1508018400', '', 5000, 0, 0),
(4, 4, 4, '2017-10-14 11:02:31', '1508104800', '', 15000, 0, 0),
(5, 5, 3, '2017-10-14 11:07:04', '1508018400', '', 8000, 0, 0),
(6, 6, 0, '2017-10-21 06:53:29', '', '', 0, 0, 0),
(7, 7, 6, '2017-10-21 06:59:19', '', '', 4500, 0, 0),
(8, 8, 11, '2017-10-21 19:07:01', '', '', 7500, 0, 0),
(9, 9, 9, '2017-10-22 10:04:04', '', '', 6000, 0, 0),
(10, 10, 10, '2017-10-22 11:03:14', '', '', 6000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(10) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_card_type_id` int(10) NOT NULL,
  `id_card_no` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `contact_no`, `email`, `id_card_type_id`, `id_card_no`, `address`) VALUES
(1, 'Prem Chand Saini', 9887554425, 'premchandsaini779@gmail.com', 1, 422510099122, 'Ahmedabad'),
(2, 'Ajit Kumar Jain', 9876543234, 'shivaayclass@gmail.com', 1, 422510099122, 'Ahmedanad'),
(3, 'Vishal Kumar Raman', 9876541234, 'premchandsaini81@gmail.com', 2, 0, 'Ahmedabad'),
(4, 'Lalit Kumar', 98766655445, 'pcsaini@gmail.com', 2, 0, 'Ahmedabad'),
(5, 'Ajit Kumar Jain', 9876543211, 'ajit@gmail.com', 2, 0, 'Ahmedabad'),
(6, 'vishal raman', 7567775852, 'visraman26@gmail.com', 1, 12345678, 'wqrewr'),
(7, 'aaaaa a', 134, 'ani@gmail.com', 2, 0, 'a'),
(8, 'AAAA NNNN', 23456789, 'a.@gmail.com', 1, 234567890456789, 'jhgcgjf,jhcfvjhcv'),
(9, 'qwertyui wertyl', 123456, 'hjhjh@g.c', 2, 45, 'yu'),
(10, 'checkicustomer checkicustomer', 1234, 'checkicustomer@gm.c', 2, 12, 'checkicustomer');

-- --------------------------------------------------------

--
-- Table structure for table `id_card_type`
--

CREATE TABLE IF NOT EXISTS `id_card_type` (
`id_card_type_id` int(10) NOT NULL,
  `id_card_type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `id_card_type`
--

INSERT INTO `id_card_type` (`id_card_type_id`, `id_card_type`) VALUES
(1, 'Aadhar Card'),
(2, 'Voter Id Card'),
(3, 'Pan Card'),
(4, 'Driving License');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`room_id` int(10) NOT NULL,
  `room_type_id` int(10) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `check_in_status` tinyint(1) NOT NULL,
  `check_out_status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type_id`, `room_no`, `status`, `check_in_status`, `check_out_status`) VALUES
(1, 2, '23456', 1, 1, 0),
(2, 2, 'A-002', 1, 0, 0),
(3, 3, 'A-003', 1, 0, 0),
(4, 4, 'A-004', 1, 0, 0),
(5, 1, 'A-101', 1, 0, 0),
(6, 2, 'A-102', 1, 0, 0),
(7, 2, 'A-806', 1, 1, 0),
(8, 1, 'A-807', NULL, 0, 0),
(9, 3, 'S-101', 1, 0, 0),
(10, 1, 'B-111', 1, 0, 0),
(11, 2, 'B', 1, 0, 0),
(12, 3, '1111112334', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE IF NOT EXISTS `room_type` (
`room_type_id` int(10) NOT NULL,
  `room_type` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `max_person` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`room_type_id`, `room_type`, `price`, `max_person`) VALUES
(1, 'Single', 1000, 1),
(2, 'Double', 1500, 2),
(3, 'Triple', 2000, 3),
(4, 'Family', 3000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
`shift_id` int(10) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `shift_timing` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shift`
--

INSERT INTO `shift` (`shift_id`, `shift`, `shift_timing`) VALUES
(1, 'Morning', '4:00 AM - 10:00 AM'),
(2, 'Day', '10:00 AM - 4:00PM'),
(3, 'Evening', '4:00 PM - 10:00 PM'),
(4, 'Night', '10:00PM - 4:00AM');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`emp_id` int(10) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `staff_type_id` int(10) NOT NULL,
  `shift_id` int(10) NOT NULL,
  `id_card_type` int(10) NOT NULL,
  `id_card_no` bigint(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` bigint(10) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salary` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`emp_id`, `emp_name`, `staff_type_id`, `shift_id`, `id_card_type`, `id_card_no`, `address`, `contact_no`, `joining_date`, `salary`) VALUES
(3, 'Deepak Goyal', 1, 4, 1, 201452058, '806 room', 88888888, '0000-00-00 00:00:00', 320000),
(4, 'ajit jainjain1', 2, 1, 4, 1234512345, 'pdpuhstl', 99999, '0000-00-00 00:00:00', 400000000),
(5, 'ajit jain new', 1, 4, 2, 12345, 'pdpu', 0, '0000-00-00 00:00:00', 4000),
(6, 'sharadsharad patelpatel', 2, 3, 3, 666, 'pdpu', 0, '0000-00-00 00:00:00', 123),
(8, 'deepak..goyal', 1, 2, 4, 123, 'gec', 0, '0000-00-00 00:00:00', 2000),
(11, 'lalit. .kuamr', 1, 2, 3, 12345678, 'askjash', 0, '0000-00-00 00:00:00', 1234),
(13, 'sdfghjk   fghj', 2, 3, 1, 99, 'kjk', 0, '0000-00-00 00:00:00', 99999),
(14, 'sdfghjk   fghj', 2, 3, 1, 99, 'kjk', 0, '0000-00-00 00:00:00', 99999),
(15, 'andrew Ng', 1, 1, 1, 321654981, 'Gandhinagar', 989898989, '0000-00-00 00:00:00', 5000),
(17, 'Anjali   Kumari', 1, 2, 1, 123456789, 'jgfasdghacfskgj', 123456789, '0000-00-00 00:00:00', 123456);

-- --------------------------------------------------------

--
-- Table structure for table `staff_type`
--

CREATE TABLE IF NOT EXISTS `staff_type` (
`staff_type_id` int(10) NOT NULL,
  `staff_type` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_type`
--

INSERT INTO `staff_type` (`staff_type_id`, `staff_type`) VALUES
(1, 'Manager'),
(2, 'Cleaning'),
(3, 'Reception'),
(4, 'Cook');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`booking_id`), ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`customer_id`), ADD KEY `customer_id_type` (`id_card_type_id`);

--
-- Indexes for table `id_card_type`
--
ALTER TABLE `id_card_type`
 ADD PRIMARY KEY (`id_card_type_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`room_id`), ADD KEY `room_type_id` (`room_type_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
 ADD PRIMARY KEY (`room_type_id`);

--
-- Indexes for table `shift`
--
ALTER TABLE `shift`
 ADD PRIMARY KEY (`shift_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`emp_id`), ADD KEY `identity_card_type` (`id_card_type`), ADD KEY `shift_id` (`shift_id`), ADD KEY `staff_type_id` (`staff_type_id`);

--
-- Indexes for table `staff_type`
--
ALTER TABLE `staff_type`
 ADD PRIMARY KEY (`staff_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `id_card_type`
--
ALTER TABLE `id_card_type`
MODIFY `id_card_type_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `room_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
MODIFY `room_type_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `shift`
--
ALTER TABLE `shift`
MODIFY `shift_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `staff_type`
--
ALTER TABLE `staff_type`
MODIFY `staff_type_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`id_card_type_id`) REFERENCES `id_card_type` (`id_card_type_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_type_id`) REFERENCES `room_type` (`room_type_id`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`id_card_type`) REFERENCES `id_card_type` (`id_card_type_id`),
ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`shift_id`),
ADD CONSTRAINT `staff_ibfk_3` FOREIGN KEY (`staff_type_id`) REFERENCES `staff_type` (`staff_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
