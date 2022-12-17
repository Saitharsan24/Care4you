-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 06:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `care4you`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `patient_firstname` varchar(100) NOT NULL,
  `patient_lastname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dateofbirth` date NOT NULL,
  `nic_no` varchar(20) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `address_line1` varchar(100) NOT NULL,
  `address_line2` varchar(100) NOT NULL,
  `address_line3` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass_word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_firstname`, `patient_lastname`, `gender`, `dateofbirth`, `nic_no`, `phone_no`, `address_line1`, `address_line2`, `address_line3`, `email`, `username`, `pass_word`) VALUES
(1, 'Saitharsan', 'Nanthakumaran', 'Male', '2000-06-24', '200017602719', 766800929, '14,3/2, pereira lane,', 'colombo 06', '', 'saitharsan@gmail.com', 'sai24', '1234'),
(3, 'Saitharsan', 'Nanthakumaran', 'Male', '2000-06-24', '200017602719', 766800929, '14,3/2, pereira lane,', 'colombo 06', '', 'saitharsan@gmail.com', 'sai24', 'sai'),
(6, '', '', '', '0000-00-00', '', 0, '', '', '', '', '', ''),
(7, '', '', '', '0000-00-00', '', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addmedicine`
--

CREATE TABLE `tbl_addmedicine` (
  `orderid` int(20) UNSIGNED NOT NULL,
  `drugname` varchar(255) NOT NULL,
  `unitprice` decimal(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_addmedicine`
--

INSERT INTO `tbl_addmedicine` (`orderid`, `drugname`, `unitprice`, `quantity`, `total`) VALUES
(1, 'Amoxicillin', '5.00', 10, '50.00'),
(1, 'cocaine', '100.00', 4, '400.00'),
(1, 'Mefenamic Acid', '13.50', 12, '162.00'),
(1, 'Panadol', '2.50', 12, '30.00'),
(1, 'Paracetamol ', '5.00', 10, '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmacist`
--

CREATE TABLE `tbl_pharmacist` (
  `pharmacist_id` int(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `contact_number` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pharmacist`
--

INSERT INTO `tbl_pharmacist` (`pharmacist_id`, `fullname`, `username`, `email`, `nic`, `contact_number`, `password`) VALUES
(1, 'Rose Anderson', 'rose01', 'roseanderson@gmail.com', '200085942561', 753788524, '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `users_login`
--

CREATE TABLE `users_login` (
  `user_id` int(11) NOT NULL,
  `id` varchar(20) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_login`
--

INSERT INTO `users_login` (`user_id`, `id`, `user_role`, `username`, `password`) VALUES
(2, '234', 'admin', 'sai', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `tbl_addmedicine`
--
ALTER TABLE `tbl_addmedicine`
  ADD PRIMARY KEY (`orderid`,`drugname`);

--
-- Indexes for table `tbl_pharmacist`
--
ALTER TABLE `tbl_pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users_login`
--
ALTER TABLE `users_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
