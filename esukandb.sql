-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220709.4e08d2933b
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2022 at 04:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esukandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(10) NOT NULL,
  `booking_type` int(10) DEFAULT NULL,
  `booking_date` datetime(6) DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `date_return` datetime(6) DEFAULT NULL,
  `date_borrow` datetime(6) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `decline_reason` varchar(255) NOT NULL,
  `adminid` int(10) DEFAULT NULL,
  `dependant_id` int(10) DEFAULT NULL,
  `quantity` int(10) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `equipment_id` int(11) DEFAULT NULL,
  `user_retrieve` int(10) NOT NULL DEFAULT 0,
  `return_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_type`, `booking_date`, `user_id`, `date_return`, `date_borrow`, `status`, `decline_reason`, `adminid`, `dependant_id`, `quantity`, `note`, `equipment_id`, `user_retrieve`, `return_status`) VALUES
(19, 1, '2022-07-11 11:57:00.000000', '3', NULL, NULL, 1, '', NULL, 2, 1, 'absdiasdbjsabdsa', 1, 1, 1),
(20, 2, NULL, '2', '2022-07-30 12:02:00.000000', '2022-07-11 12:02:00.000000', 2, 'tak suka dia dia buat stai', 1, 3, 3, 'asda', 1, 1, 1),
(21, 1, '2022-07-11 12:05:00.000000', '2', NULL, NULL, 1, '', NULL, 2, 1, 'x', 3, 1, 1),
(22, 1, '2022-07-11 23:20:00.000000', '2', NULL, NULL, 1, '', NULL, 2, 1, 'xxxx', 1, 1, 1),
(23, 1, '2022-07-11 23:26:00.000000', '2', NULL, NULL, 1, '', NULL, 2, 1, 'sd', 1, 1, 1),
(24, 1, '2022-07-11 23:29:00.000000', '2', NULL, NULL, 1, '', NULL, 3, 1, 'x', 1, 1, 1),
(25, 1, '2022-07-11 23:31:00.000000', '2', NULL, NULL, 1, '', NULL, 3, 1, 'asd', 3, 1, 1),
(26, 1, '2022-07-11 23:34:00.000000', '2', NULL, NULL, 1, '', NULL, 3, 1, 'asdad', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dependant`
--

CREATE TABLE `dependant` (
  `dependant_id` varchar(10) NOT NULL,
  `penalty` varchar(20) DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `userid` varchar(10) DEFAULT NULL,
  `bookingid` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipmentid` int(10) NOT NULL,
  `equipmentname` varchar(255) DEFAULT NULL,
  `equipmentstock` int(10) DEFAULT NULL,
  `equipmentdesc` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentid`, `equipmentname`, `equipmentstock`, `equipmentdesc`) VALUES
(1, 'football', 10, 'a round ball sized 5, used for playing football at the field'),
(3, 'badminton racket', 25, 'for playing badminton'),
(5, 'rugby ball', 12, 'a egg shape ball to play rugby'),
(13, 'body guard', 10, 'a vest guard used in combat sport to protect the upper body'),
(15, 'tennis balls', 1, 'sd'),
(16, 'ababab', 1, '1123123');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(10) NOT NULL,
  `level_des` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_des`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(1, 'Admin'),
(2, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `gender` int(2) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `gender`, `address`, `telephone`, `email`, `level_id`) VALUES
(1, 'admin', 'a', 2, 'No12, Jalan Bujang 12, Taman Lembah Bujang,  08400 Merbok, Sungai Petani, Kedah', '0195710562', 'sitinurbayaismail151@gmail.com', 1),
(2, 'ahmad', 'ahmad', 1, 'No 7, Pulau Pinang', '0115454545', 'ahamd@yahoo.com', 2),
(3, 'fitry', 'fitry', 1, 'No 9, Taman Harum, Perlis', '0178989895', '', 2),
(4, 'nadrah', 'nadrah', 2, 'No23, Jalan Selasih 3,\r\nTaman Bunga,\r\n81131 Johor Bahru, Johor', '0127897892', '', 2),
(5, 'tina', 'tina', 2, '12 Jalan Bahagia, Taman Sejahtera, Sungai Petani, Kedah', '0123456788', 'tina@gmail.com', 2),
(6, 'azra', 'a', 2, 'No 4, Jalan Lagenda 11, Lagenda Heights, 08000 Sungai Petani, Kedah', '0111234567', 'azra@gmail.com', 2),
(17, 'ammar', '123', 1, 'Masria', '12345', 'blabla@gmail.com', 2),
(18, 'loli', '123', 1, 'malinja', '0123456789', 'afif@yahoo.com', 2),
(20, 'buggy', '123', 1, 'b011,malinja,wipi', '0123456789', 'afif@yahoo.com', 2),
(24, 'afifuddin', '123', 2, 'taman suria 2,06000,jitra,kedah', '0195898902', 'afifuddin@gamil.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `dependant`
--
ALTER TABLE `dependant`
  ADD PRIMARY KEY (`dependant_id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipmentid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipmentid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



