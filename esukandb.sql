-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 04:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `booking_id` varchar(10) NOT NULL,
  `booking_type` varchar(10) DEFAULT NULL,
  `booking_date` varchar(10) DEFAULT NULL,
  `booking_time` varchar(10) DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `date_return` varchar(10) DEFAULT NULL,
  `date_borrow` varchar(10) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `adminid` varchar(10) DEFAULT NULL,
  `dependant_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bookingdata`
--

CREATE TABLE `bookingdata` (
  `bookingid` varchar(10) DEFAULT NULL,
  `equipmentid` varchar(10) DEFAULT NULL,
  `qty` varchar(10) DEFAULT NULL,
  `note` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `equipmentid` varchar(10) NOT NULL,
  `equipmentname` varchar(10) DEFAULT NULL,
  `equipmentstock` varchar(10) DEFAULT NULL,
  `equipmentdesc` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `name` varchar(50) NOT NULL,
  `gender` int(2) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `level_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `gender`, `address`, `telephone`, `email`, `picture`, `level_id`) VALUES
(1, 'admin', 'a', 'Siti Nur', 2, 'No1, Jalan Bujang 12, Taman Lembah Bujang,  08400 Merbok, Sungai Petani, Kedah', '0195710562', 'sitinurbayaismail151@gmail.com', 'siti.PNG', 1),
(2, 'ahmad', 'ahmad', 'Fatih Ayman', 1, 'No 7, Pulau Pinang', '0115454545', 'ahamd@yahoo.com', 'fatihayman.png', 2),
(3, 'fitry', 'fitry', 'Fitry Hamid', 1, 'No 9, Taman Harum, Perlis', '0178989895', '', 'fitryhamid.jpg', 2),
(4, 'nadrah', 'nadrah', 'Nadrah Nazri', 2, 'No23, Jalan Selasih 3,\r\nTaman Bunga,\r\n81131 Johor Bahru, Johor', '0127897892', '', 'nadrah.png', 2),
(5, 'tina', 'tina', 'Tina Sofea', 2, '12 Jalan Bahagia, Taman Sejahtera, Sungai Petani, Kedah', '0123456788', 'tina@gmail.com', 'tinasofea.png', 2),
(6, 'azra', 'a', 'Azra', 2, 'No 4, Jalan Lagenda 11, Lagenda Heights, 08000 Sungai Petani, Kedah', '0111234567', 'azra@gmail.com', 'azra.PNG', 2),
(7, '', '2', '', 0, 'azra', '', '', '', 0);

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
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
