-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 03, 2021 at 03:45 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `group30_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `booking_number` int(20) NOT NULL,
  `confirmed` tinyint(1) DEFAULT NULL,
  `booking_time` datetime NOT NULL,
  `num_guests` int(2) NOT NULL,
  `house_ID` int(4) DEFAULT NULL,
  `Customer_ID` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `customer_ID` int(4) NOT NULL,
  `first_name` varchar(8) NOT NULL,
  `last_name` varchar(8) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `ABN` varchar(10) DEFAULT NULL,
  `level` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`customer_ID`, `first_name`, `last_name`, `email`, `phone`, `password`, `address`, `city`, `ABN`, `level`) VALUES
(43, 'Da', 'T', 'sa@yahoo.com', '97982', '43ba6a5de7262e714a32a9a2204d248d', '45 St', '', '', 3),
(44, 'My', 'Host', 'host@hit.com', '823748', '43ba6a5de7262e714a32a9a2204d248d', '762 St', 'Launceston', '4723984', 2),
(45, 'Test', 'Tor', 'test1@yahoo.com', '972948', '43ba6a5de7262e714a32a9a2204d248d', '67 ASdaf', '', '', 3),
(46, 'Gues', 'Gest', 'guest@yahoo.com', '7293847', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '1 Admin', '', '', 3),
(47, 'Admin', 'Admin', 'manager@utas.com', '123456', 'e64b78fc3bc91bcbc7dc232ba8ec59e0', '123 Admin', 'Hobart', '3798237498', 1);

-- --------------------------------------------------------

--
-- Table structure for table `House`
--

CREATE TABLE `House` (
  `House_ID` int(4) NOT NULL,
  `title` varchar(225) NOT NULL,
  `address` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `max` int(4) NOT NULL,
  `num_room` int(2) NOT NULL,
  `num_bathroom` int(2) NOT NULL,
  `available` datetime NOT NULL,
  `garage` int(2) DEFAULT NULL,
  `image` varchar(255) DEFAULT 'img/house3.jpg',
  `smoking` tinyint(1) NOT NULL DEFAULT '0',
  `internet` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `House`
--

INSERT INTO `House` (`House_ID`, `title`, `address`, `city`, `price`, `max`, `num_room`, `num_bathroom`, `available`, `garage`, `image`, `smoking`, `internet`) VALUES
(1, 'House2', '78 Queenstreet Mall,', 'Hobart 7000', '550.00', 8, 4, 2, '2021-04-26 17:04:27', 4, 'img/house2.jpg', 0, 0),
(2, 'House1', '114 Elizabeth St', 'Launceston 7250', '450.00', 6, 3, 2, '2021-04-26 17:04:27', 3, 'img/house1.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `InboxList`
--

CREATE TABLE `InboxList` (
  `inbox_ID` int(4) NOT NULL,
  `reason_rejected` varchar(225) NOT NULL,
  `Client_messages` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Level`
--

CREATE TABLE `Level` (
  `Level_ID` int(1) NOT NULL,
  `LevelDescription` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Level`
--

INSERT INTO `Level` (`Level_ID`, `LevelDescription`) VALUES
(1, 'Admin'),
(2, 'Host'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `Booking_number` int(4) NOT NULL,
  `cardNumber` varchar(20) NOT NULL,
  `Expiry` date DEFAULT NULL,
  `VerifyCode` varchar(3) DEFAULT NULL,
  `reviewLevel` varchar(1) DEFAULT NULL,
  `review` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`booking_number`),
  ADD KEY `house_ID` (`house_ID`),
  ADD KEY `Customer_ID` (`Customer_ID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`customer_ID`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `House`
--
ALTER TABLE `House`
  ADD PRIMARY KEY (`House_ID`);

--
-- Indexes for table `InboxList`
--
ALTER TABLE `InboxList`
  ADD PRIMARY KEY (`inbox_ID`);

--
-- Indexes for table `Level`
--
ALTER TABLE `Level`
  ADD PRIMARY KEY (`Level_ID`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD KEY `Booking_number` (`Booking_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `booking_number` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `customer_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `House`
--
ALTER TABLE `House`
  MODIFY `House_ID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `InboxList`
--
ALTER TABLE `InboxList`
  MODIFY `inbox_ID` int(4) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`house_ID`) REFERENCES `House` (`House_ID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`Customer_ID`) REFERENCES `Customer` (`customer_ID`);

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`level`) REFERENCES `Level` (`Level_ID`);

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`Booking_number`) REFERENCES `Booking` (`booking_number`);