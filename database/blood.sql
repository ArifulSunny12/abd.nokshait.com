-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2021 at 10:45 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood`
--

-- --------------------------------------------------------

--
-- Table structure for table `donateinfo`
--

CREATE TABLE `donateinfo` (
  `id` int(10) NOT NULL,
  `personId` int(10) NOT NULL,
  `lastDonate` date NOT NULL,
  `place` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donateinfo`
--

INSERT INTO `donateinfo` (`id`, `personId`, `lastDonate`, `place`) VALUES
(1, 9, '2021-01-30', 'matuail'),
(2, 12, '2021-01-13', 'dhaka'),
(3, 11, '2020-12-23', 'mirpur'),
(4, 9, '2021-01-19', 'mirpur'),
(5, 9, '2021-01-01', 'borishal'),
(6, 9, '2022-06-07', 'london'),
(8, 9, '2021-02-04', 'coxbazar'),
(9, 9, '2021-02-14', 'matuail'),
(10, 9, '2021-02-15', 'canada'),
(11, 10, '2021-02-08', 'uk');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(5) NOT NULL,
  `name` varchar(25) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `blood_group` varchar(4) NOT NULL,
  `img` varchar(100) NOT NULL,
  `village` varchar(20) NOT NULL,
  `police_station` varchar(20) NOT NULL,
  `District` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `name`, `mobile`, `dob`, `gender`, `blood_group`, `img`, `village`, `police_station`, `District`, `password`) VALUES
(9, 'Ariful Sunny', '01681091969', '1995-11-17', 'Male', 'B+', 'Ariful Sunny_6028b511630ee8.77161318.jpg', 'adorsho nagar', 'fatulla', 'narayangonj', '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'Rasehd gazi', '01683940737', '1997-03-04', 'Male', 'B+', 'Rasehd gazi_6010fd797c1dd4.60862380.jpg', 'adorsho nagar', 'fatulla', 'narayangonj', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, 'Nuru islam', '01408007649', '1996-11-01', 'Male', 'O+', 'Nuru islam_60112045aeaeb6.23353056.jpg', 'adorshonagar', 'jatrabari', 'dhaka', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'Gazi Rifat', '01980091868', '2021-01-13', 'Female', 'O-', 'Gazi Rifat_60129a30ba2471.47719567.jpg', 'dhaka', 'fatulla', 'dhaka', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donateinfo`
--
ALTER TABLE `donateinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donateinfo`
--
ALTER TABLE `donateinfo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
