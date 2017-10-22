-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1build0.15.04.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 21, 2017 at 05:12 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`emp_id`, `emp_name`, `staff_type_id`, `shift_id`, `id_card_type`, `id_card_no`, `address`, `contact_no`, `joining_date`, `salary`) VALUES
(3, 'qwq qw', 1, 1, 1, 0, 'qw', 0, '0000-00-00 00:00:00', 1234),
(4, 'ajit jainjain', 2, 1, 4, 1234512345, 'pdpuhstl', 99999, '0000-00-00 00:00:00', 400000000),
(5, 'ajit jain new', 1, 4, 2, 12345, 'pdpu', 0, '0000-00-00 00:00:00', 4000),
(6, 'sharadsharad patelpatel', 2, 3, 3, 666, 'pdpu', 0, '0000-00-00 00:00:00', 123),
(7, 'sharad..patel', 2, 3, 3, 0, 'pdpu', 0, '0000-00-00 00:00:00', 50000),
(8, 'deepak..goyal', 1, 2, 4, 123, 'gec', 0, '0000-00-00 00:00:00', 2000),
(9, 'w.de', 1, 1, 2, 0, '4567', 0, '0000-00-00 00:00:00', 56),
(10, 'lalit. .kuamr', 1, 2, 3, 12345678, 'askjash', 0, '0000-00-00 00:00:00', 1234),
(11, 'lalit. .kuamr', 1, 2, 3, 12345678, 'askjash', 0, '0000-00-00 00:00:00', 1234),
(12, '112 +  +32', 1, 2, 1, 23, 'we', 0, '0000-00-00 00:00:00', 23),
(13, 'sdfghjk   fghj', 2, 3, 1, 99, 'kjk', 0, '0000-00-00 00:00:00', 99999),
(14, 'sdfghjk   fghj', 2, 3, 1, 99, 'kjk', 0, '0000-00-00 00:00:00', 99999),
(15, 'qwq.qw   qwq.qw', 1, 1, 1, 0, 'qw', 0, '0000-00-00 00:00:00', 1234);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`emp_id`), ADD KEY `identity_card_type` (`id_card_type`), ADD KEY `shift_id` (`shift_id`), ADD KEY `staff_type_id` (`staff_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `emp_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

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
