-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 05:53 AM
-- Server version: 5.1.52-community
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sowpassignmentnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `Admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`Admin_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `User_ID`) VALUES
(1, 4),
(2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `Booking_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Subjects` varchar(255) NOT NULL,
  `Booking_Date` datetime NOT NULL,
  `Booked_Date` datetime NOT NULL,
  `Maximum_Hourly_Rate` decimal(10,0) NOT NULL,
  `Start_Time` time NOT NULL,
  `Duration` decimal(10,0) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `Day` varchar(255) NOT NULL,
  PRIMARY KEY (`Booking_ID`),
  KEY `CustomerID` (`CustomerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Booking_ID`, `Subjects`, `Booking_Date`, `Booked_Date`, `Maximum_Hourly_Rate`, `Start_Time`, `Duration`, `CustomerID`, `Day`) VALUES
(1, 'Chemistry', '2016-10-07 10:00:00', '2016-09-27 08:17:21', '788', '08:00:00', '3', 1, 'Tuesday'),
(2, 'Chemistry', '2016-10-08 09:30:00', '2016-10-18 00:00:00', '150', '11:00:00', '2', 2, 'Tuesday'),
(3, 'Chemistry', '2016-10-09 09:47:00', '2016-10-22 00:00:00', '200', '18:00:00', '1', 1, 'Saturday'),
(7, 'Western Music', '2016-10-17 07:19:00', '2016-10-27 00:00:00', '300', '12:00:00', '4', 1, 'Thursday'),
(8, 'Biology', '2016-10-19 00:00:00', '2016-10-26 00:00:00', '200', '09:00:00', '3', 2, 'Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `Category` varchar(255) NOT NULL,
  PRIMARY KEY (`Category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category`) VALUES
('A/L'),
('Aesthetics'),
('Arts'),
('Commerce'),
('Management'),
('O/L'),
('Other'),
('Primary'),
('Technical Subjects');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `Customer_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(11) NOT NULL,
  PRIMARY KEY (`Customer_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `User_ID`) VALUES
(1, 2),
(2, 3),
(3, 9),
(4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
  `Instructor_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_ID` int(255) NOT NULL,
  `Hourly_Rate` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Instructor_ID`),
  KEY `User_ID` (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`Instructor_ID`, `User_ID`, `Hourly_Rate`) VALUES
(1, 1, '2000'),
(2, 5, '2000'),
(3, 6, '300'),
(4, 7, '200'),
(5, 8, '200');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_available_days`
--

CREATE TABLE IF NOT EXISTS `instructor_available_days` (
  `Instructor_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Available_Days` varchar(255) NOT NULL,
  PRIMARY KEY (`Instructor_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `instructor_available_days`
--

INSERT INTO `instructor_available_days` (`Instructor_ID`, `Available_Days`) VALUES
(1, 'Tuesday,Wednesday'),
(2, 'Tuesday'),
(3, 'Thursday'),
(4, 'Wednesday'),
(5, 'Wednesday');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `Invoice_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_ID` int(11) NOT NULL,
  `Month` varchar(255) NOT NULL,
  `Payment_Value` decimal(10,0) NOT NULL,
  `Payment_Status` varchar(100) NOT NULL,
  PRIMARY KEY (`Invoice_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`Invoice_ID`, `Customer_ID`, `Month`, `Payment_Value`, `Payment_Status`) VALUES
(1, 1, 'August', '1000', 'Paid'),
(2, 2, 'August', '2000', 'Paid'),
(3, 1, 'September', '1250', 'Not Paid');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `Invoice_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Hourly_Rate` double NOT NULL,
  `Duration` double NOT NULL,
  `Total` double NOT NULL,
  `Payment_Status` varchar(50) NOT NULL,
  PRIMARY KEY (`Invoice_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`Invoice_ID`, `Hourly_Rate`, `Duration`, `Total`, `Payment_Status`) VALUES
(1, 200, 3, 600, 'Not Paid'),
(2, 200, 3, 600, 'Not Paid'),
(3, 200, 3, 600, 'Not Paid'),
(4, 200, 3, 600, 'Not Paid'),
(5, 200, 3, 600, 'Not Paid'),
(6, 200, 3, 600, 'Not Paid'),
(7, 200, 3, 600, 'Not Paid'),
(8, 200, 3, 600, 'Not Paid'),
(9, 200, 3, 600, 'Not Paid'),
(10, 200, 3, 600, 'Not Paid');

-- --------------------------------------------------------

--
-- Table structure for table `lessonmanager`
--

CREATE TABLE IF NOT EXISTS `lessonmanager` (
  `Log_ID` int(11) NOT NULL,
  `Start_Time` varchar(200) NOT NULL,
  `Duration` varchar(200) NOT NULL,
  `Notes` varchar(255) NOT NULL,
  `Instructor_ID` varchar(255) NOT NULL,
  PRIMARY KEY (`Log_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lessonmanager`
--

INSERT INTO `lessonmanager` (`Log_ID`, `Start_Time`, `Duration`, `Notes`, `Instructor_ID`) VALUES
(1, '4', '1', 'Conducted Successfully', '1'),
(2, '3', '2', 'Conducted Successfully', '2'),
(3, '7', '11', 'Conducted', '3'),
(4, '3', '3', 'Success', '1'),
(8, '5', '2', 'Not good', '5'),
(9, '3', '1', 'Successfull', '1'),
(10, '7', '2', 'Successfull lecture', '1'),
(11, '6', '1', 'null', '3'),
(12, '6', '1', 'Good', '2'),
(13, '4', '1', 'Good', '2'),
(14, '4', '1', 'Good', '5'),
(15, '5', '60', 'Success', '2');

-- --------------------------------------------------------

--
-- Table structure for table `lessonmanagerapp`
--

CREATE TABLE IF NOT EXISTS `lessonmanagerapp` (
  `Log_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Booking_ID` int(11) NOT NULL DEFAULT '0',
  `Start_Time` time NOT NULL DEFAULT '00:00:00',
  `Duration` decimal(10,0) NOT NULL DEFAULT '0',
  `Day` varchar(100) NOT NULL DEFAULT '0',
  `Subject` varchar(100) NOT NULL DEFAULT '0',
  `Instructor_ID` int(11) NOT NULL DEFAULT '0',
  `Note` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Log_ID`),
  KEY `Booking_ID` (`Booking_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `lessonmanagerapp`
--

INSERT INTO `lessonmanagerapp` (`Log_ID`, `Booking_ID`, `Start_Time`, `Duration`, `Day`, `Subject`, `Instructor_ID`, `Note`) VALUES
(1, 0, '00:00:00', '0', '0', '0', 2, '0'),
(2, 0, '00:00:00', '0', '0', '0', 3, '0'),
(4, 1, '08:00:00', '3', 'Tuesday', 'Chemistry', 0, '0'),
(5, 2, '11:00:00', '2', 'Tuesday', 'Chemistry', 0, '0'),
(6, 3, '18:00:00', '1', 'Saturday', 'Chemistry', 0, '0'),
(7, 7, '12:00:00', '4', 'Thursday', 'Western Music', 0, '0'),
(8, 0, '00:00:00', '0', '0', '0', 2, '0'),
(9, 0, '00:00:00', '0', '0', '0', 3, '0'),
(10, 0, '00:00:00', '0', '0', '0', 4, '0'),
(11, 0, '00:00:00', '0', '0', '0', 5, '0'),
(15, 1, '08:00:00', '3', 'Tuesday', 'Chemistry', 0, '0'),
(16, 2, '11:00:00', '2', 'Tuesday', 'Chemistry', 0, '0'),
(17, 3, '18:00:00', '1', 'Saturday', 'Chemistry', 0, '0'),
(18, 7, '12:00:00', '4', 'Thursday', 'Western Music', 0, '0'),
(19, 8, '09:00:00', '3', 'Wednesday', 'Biology', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `Schedule_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Booking_ID` int(11) NOT NULL,
  `Instructor_ID` int(11) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Booked_Date` datetime NOT NULL,
  `Start_Time` time NOT NULL,
  `Duration` decimal(10,0) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Day` varchar(255) NOT NULL,
  PRIMARY KEY (`Schedule_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subjectcategory`
--

CREATE TABLE IF NOT EXISTS `subjectcategory` (
  `Subjects` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  PRIMARY KEY (`Subjects`,`Category`),
  KEY `Subjects` (`Subjects`),
  KEY `Category` (`Category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectcategory`
--

INSERT INTO `subjectcategory` (`Subjects`, `Category`) VALUES
('BC', 'Arts'),
('Biology', 'A/L'),
('Buddhist Culture', 'Arts'),
('Business Studies', 'Management'),
('Chemistry', 'A/L'),
('Combined Maths', 'A/L'),
('Eastern Music', 'Aesthetics'),
('Scolarship', 'Primary'),
('Sinhala', 'Arts'),
('Western Music', 'Aesthetics');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `Subjects` varchar(255) NOT NULL,
  `Instructor_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Category` varchar(255) NOT NULL,
  PRIMARY KEY (`Subjects`,`Instructor_ID`),
  KEY `Instructor_ID` (`Instructor_ID`,`Category`),
  KEY `Category` (`Category`),
  KEY `Instructor_ID_2` (`Instructor_ID`),
  KEY `Subjects` (`Subjects`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`Subjects`, `Instructor_ID`, `Category`) VALUES
('Biology', 5, 'A/L'),
('Chemistry', 2, 'A/L'),
('Eastern Music,Western Music', 1, 'Aesthetics'),
('Western Music', 3, 'Aesthetics'),
('BC', 4, 'Arts');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `User_Type` varchar(100) NOT NULL,
  `First_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Date_Of_Birth` date NOT NULL,
  `TP_No` varchar(100) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Name`, `Password`, `User_Type`, `First_Name`, `Last_Name`, `Address`, `Gender`, `Date_Of_Birth`, `TP_No`) VALUES
(1, 'chathurangijks@gmail.com', 'sc', 'Instructor', 'Chathurangi', 'Shyalika', 'No,57, Madelgamuwa, Gampaha', 'Female', '1998-02-02', '0772150269'),
(2, 'chamanijks2@gmail.com', 'cd', 'Customer', 'Chamani', 'Shiranthika', 'No56, Silva Rd, Moratuwa', 'Female', '1008-02-02', '0111234561'),
(3, 'jayakodydw@gmail.com', 's', 'Customer', 'Jaya', 'Sampath', 'No56,289Road', 'Male', '9988-02-09', '0774567891'),
(4, 'dwjayakody@gmail.com', 'd', 'Administrator', 'Dayawansa', 'Jayakody', 'No56, Silva Rd, Moratuwa', 'Male', '1980-12-02', '0779886575'),
(5, 'd@gmail.com', 'da', 'Instructor', 'Damith', 'Sumathipala', 'No 45, Nedagamuwa, Gampaha', 'Male', '1978-02-11', '0774567891'),
(6, 'pradeepa@yahoo.com', 'mw', 'Instructor', 'Pradeepa', 'Satharasinghe', 'No.45, Asgiriya, Gampaha', 'Female', '2015-12-10', '0332230981'),
(7, 'sagara@gmail.com', 'pw', 'Instructor', 'Sagara', 'Palansuriya', 'No.5, Kandy Rd', 'Female', '2016-10-18', '0772150260'),
(8, 'dil@gmail.com', 'k', 'Instructor', 'Dilruwan', 'Senadeera', 'No.56, Palama Rd, Asgiriya', 'Female', '2016-10-11', '0772150234'),
(9, 'gimi@yahoo.com', 'gm', 'Customer', 'Gimhani', 'Hangawaththa', 'No.23 Samagi Mw, Piliyandala', 'Female', '2016-10-10', '0725037410'),
(10, 'sri@gmail.com', 's', 'Customer', 'Srimali', 'Manchanayaka', 'No 89, Ihala Imbulgoda', 'Female', '2016-10-05', '0725048961'),
(11, 'kamal@hotmail.com', 'km', 'Administrator', 'Kamal', 'Jayakody', 'No. 23/A, Panadura', 'Male', '2016-10-10', '0779883572');

-- --------------------------------------------------------

--
-- Table structure for table `user_tp`
--

CREATE TABLE IF NOT EXISTS `user_tp` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TP_No` varchar(100) NOT NULL,
  PRIMARY KEY (`User_ID`,`TP_No`),
  KEY `TP_No` (`TP_No`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

--
-- Constraints for table `instructor_available_days`
--
ALTER TABLE `instructor_available_days`
  ADD CONSTRAINT `instructor_available_days_ibfk_1` FOREIGN KEY (`Instructor_ID`) REFERENCES `instructor` (`Instructor_ID`);

--
-- Constraints for table `subjectcategory`
--
ALTER TABLE `subjectcategory`
  ADD CONSTRAINT `subjectcategory_ibfk_1` FOREIGN KEY (`Category`) REFERENCES `category` (`Category`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`Instructor_ID`) REFERENCES `instructor` (`Instructor_ID`),
  ADD CONSTRAINT `subjects_ibfk_2` FOREIGN KEY (`Category`) REFERENCES `category` (`Category`);

--
-- Constraints for table `user_tp`
--
ALTER TABLE `user_tp`
  ADD CONSTRAINT `user_tp_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
