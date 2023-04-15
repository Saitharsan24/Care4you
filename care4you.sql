-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2023 at 09:41 AM
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
-- Table structure for table `tbl_addlabapp`
--

CREATE TABLE `tbl_addlabapp` (
  `unregappid` int(10) UNSIGNED NOT NULL,
  `patientname` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactnumber` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `appdate` varchar(50) NOT NULL,
  `apptime` varchar(10) NOT NULL,
  `tests` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_addlabapp`
--

INSERT INTO `tbl_addlabapp` (`unregappid`, `patientname`, `age`, `address`, `contactnumber`, `email`, `appdate`, `apptime`, `tests`) VALUES
(2, 'Mrs.Perera', 35, '123,Kalutara', 766725896, 'perera@gmail.com', '2022-12-20', '16:00', 'Electrolyte test'),
(3, 'Mrs.Silva', 56, '563,Colombo', 766725896, 'silva@gmail.com', '2022-12-22', '09:05', 'Blood test'),
(4, 'mrs.dewmini', 21, '123,colombo', 766725896, 'perera@gmail.com', '2022-12-29', '01:46', 'blood');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addmedicine`
--

CREATE TABLE `tbl_addmedicine` (
  `orderid` int(20) UNSIGNED NOT NULL,
  `drugname` varchar(255) NOT NULL,
  `strength` varchar(25) NOT NULL,
  `unitprice` decimal(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_addmedicine`
--

INSERT INTO `tbl_addmedicine` (`orderid`, `drugname`, `strength`, `unitprice`, `quantity`, `total`) VALUES
(1, 'CLARITHROMYCIN', '500mg', '174.99', 7, '1224.93'),
(1, 'PARACETAMOL', '500mg', '4.16', 7, '29.12'),
(2, 'ALBENDAZOLE', '400mg', '70.94', 5, '354.70'),
(5, 'ASPIRIN 75mg', '75mg', '7.08', 10, '70.80'),
(5, 'DILTIAZEM', '30mg', '6.40', 10, '64.00'),
(5, 'IBUPROFEN', '200mg', '2.60', 10, '26.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_labtec`
--

CREATE TABLE `tbl_labtec` (
  `labtec_id` int(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `contact_number` int(10) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_labtec`
--

INSERT INTO `tbl_labtec` (`labtec_id`, `full_name`, `username`, `email`, `nic`, `contact_number`, `password`) VALUES
(1, 'Devindya De Silva', 'devindya', 'devindya@gmail.com', '200085942561', 753788524, '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `medicine_id` int(20) NOT NULL,
  `med_name` varchar(255) NOT NULL,
  `strength` varchar(25) NOT NULL,
  `quantity` int(20) NOT NULL,
  `unit_price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`medicine_id`, `med_name`, `strength`, `quantity`, `unit_price`) VALUES
(1, 'ALBENDAZOLE', '400mg', 155, 75.00),
(2, 'CLARITHROMYCIN', '500mg', 98, 174.99),
(3, 'DOXYCYCLIN', '100mg', 300, 23.90),
(4, 'DILTIAZEM', '30mg', 68, 6.40),
(5, 'LOSARTAN', '62.5mg', 200, 45.98),
(6, 'ASPIRIN 75mg', '75mg', 23, 7.08),
(7, 'ASPIRIN 100mg', '100mg', 270, 12.53),
(8, 'METFORMIN', '850mg', 295, 17.50),
(9, 'IBUPROFEN', '200mg', 190, 2.60),
(11, 'FLUOXETINE', '20mg', 200, 26.01);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_neworder`
--

CREATE TABLE `tbl_neworder` (
  `order_id` int(20) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `contactnumber` int(10) NOT NULL,
  `prescription_name` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `orderdate` varchar(10) NOT NULL,
  `ordertime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_neworder`
--

INSERT INTO `tbl_neworder` (`order_id`, `pname`, `paddress`, `contactnumber`, `prescription_name`, `remarks`, `orderdate`, `ordertime`) VALUES
(3, 'Dinethi Hansika', '12, Queens Road, Colombo06', 723788524, 'Order_06_02_23_12_25_58_AM.pdf', 'Corex-D Cough Syrup 100ml', '06/02/2023', '12:25:58AM'),
(4, 'Ishini Ekanayake', '603C, 2nd Cross Street, Colombo06', 712563987, 'Order_06_02_23_08_43_42_PM.txt', '', '06/02/2023', '08:43:42PM'),
(6, 'Daweendri Thilakarathne', '123, Mendis Road, Dehiwala', 776596123, 'Order_06_02_23_09_19_40_PM.jpg', 'Add 02 Panadol Cards', '06/02/2023', '09:19:40PM'),
(7, 'Sewmithi Maya', '99A , Vihara Road, Maharagama', 714525855, 'Order_07_02_23_07_26_10_PM.png', 'Add 02 gastritis tablet cards', '07/02/2023', '07:26:10PM'),
(8, 'Hiruni Sinhabahu', '123, Galle Road, Colombo03', 751236981, 'Order_07_02_23_07_27_56_PM.jpg', '', '07/02/2023', '07:27:56PM'),
(9, 'Madhushi Saumya', '25, Lily Road, Colombo06', 778963125, 'Order_07_02_23_07_36_32_PM.pdf', '', '07/02/2023', '07:36:32PM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmacist`
--

CREATE TABLE `tbl_pharmacist` (
  `pharmacist_id` int(20) UNSIGNED NOT NULL,
  `emp_id` varchar(10) NOT NULL,
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

INSERT INTO `tbl_pharmacist` (`pharmacist_id`, `emp_id`, `fullname`, `username`, `email`, `nic`, `contact_number`, `password`) VALUES
(1, 'p_001', 'Chanya Perera', 'chanya', 'chanyaperera77@gmail.com', '200085942561', 753788524, '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'p_002', 'Saumya Silva', 'saumya', 'saumyasilva8@gmail.com', '991960879V', 753788524, '6562c5c1f33db6e05a082a88cddab5ea');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_respondedorders`
--

CREATE TABLE `tbl_respondedorders` (
  `order_id` int(20) NOT NULL,
  `pname` varchar(255) NOT NULL,
  `paddress` varchar(255) NOT NULL,
  `contactnumber` int(10) NOT NULL,
  `prescription_name` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `orderdate` varchar(20) NOT NULL,
  `ordertime` varchar(20) NOT NULL,
  `unavailablemedicines` varchar(255) NOT NULL,
  `responddate` varchar(20) NOT NULL,
  `respondtime` varchar(20) NOT NULL,
  `nettotal` decimal(20,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_respondedorders`
--

INSERT INTO `tbl_respondedorders` (`order_id`, `pname`, `paddress`, `contactnumber`, `prescription_name`, `remarks`, `orderdate`, `ordertime`, `unavailablemedicines`, `responddate`, `respondtime`, `nettotal`) VALUES
(1, 'Dewmini Devindya', '120B, Havelock Road, Colombo05', 766725896, 'Order_05_02_23_09_46_10_PM.jpg', '01 Panadol Card', '05/02/2023', '09:46:10PM', 'Mucinex  50mg', '07/02/2023', '07:20:00PM', '1254.05'),
(2, 'Amal Perera', '75, Flower Road, Colombo05', 752596333, 'Order_05_02_23_10_03_16_PM.jpg', '', '05/02/2023', '10:03:16PM', 'Mucinex  50mg', '08/02/2023', '08:26:22PM', '354.70'),
(5, 'Nayomi Karunarathne', '11, Lily Garden Road, Colombo04', 759631485, 'Order_06_02_23_08_56_41_PM.jpeg', '', '06/02/2023', '08:56:41PM', '', '07/02/2023', '07:23:03PM', '160.80');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sysusers`
--

CREATE TABLE `tbl_sysusers` (
  `userid` int(10) NOT NULL,
  `actorid` int(10) NOT NULL,
  `actortype` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sysusers`
--

INSERT INTO `tbl_sysusers` (`userid`, `actorid`, `actortype`, `username`, `password`) VALUES
(1, 1, 'doctor', 'doctor1', '$2y$10$yDcgJP0dLWxpF.ytWpx/2ug0LDzra0xnlReByzV04Ab28s5ZXqNpm'),
(2, 1, 'pharmacist', 'chanya', '$2y$10$CLgJszD7RgLMt9xsYtoZN.hDgeLwQUkhuYBAUSIar9pYQ5TstyXXW'),
(3, 2, 'pharmacist', 'saumya', '$2y$10$CLgJszD7RgLMt9xsYtoZN.hDgeLwQUkhuYBAUSIar9pYQ5TstyXXW'),
(4, 1, 'labtec', 'devindya', '$2y$10$CLgJszD7RgLMt9xsYtoZN.hDgeLwQUkhuYBAUSIar9pYQ5TstyXXW'),
(5, 1, 'patient', 'saitharsan', '$2y$10$yDcgJP0dLWxpF.ytWpx/2ug0LDzra0xnlReByzV04Ab28s5ZXqNpm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addlabapp`
--
ALTER TABLE `tbl_addlabapp`
  ADD PRIMARY KEY (`unregappid`);

--
-- Indexes for table `tbl_addmedicine`
--
ALTER TABLE `tbl_addmedicine`
  ADD PRIMARY KEY (`orderid`,`drugname`);

--
-- Indexes for table `tbl_labtec`
--
ALTER TABLE `tbl_labtec`
  ADD PRIMARY KEY (`labtec_id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`medicine_id`) USING BTREE;

--
-- Indexes for table `tbl_neworder`
--
ALTER TABLE `tbl_neworder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_pharmacist`
--
ALTER TABLE `tbl_pharmacist`
  ADD PRIMARY KEY (`pharmacist_id`);

--
-- Indexes for table `tbl_respondedorders`
--
ALTER TABLE `tbl_respondedorders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_sysusers`
--
ALTER TABLE `tbl_sysusers`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_addlabapp`
--
ALTER TABLE `tbl_addlabapp`
  MODIFY `unregappid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `medicine_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_neworder`
--
ALTER TABLE `tbl_neworder`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_sysusers`
--
ALTER TABLE `tbl_sysusers`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
