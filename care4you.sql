-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2023 at 07:15 PM
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
-- Table structure for table `tbl_addlabtest`
--

CREATE TABLE `tbl_addlabtest` (
  `labapt_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `test_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_addlabtest`
--

INSERT INTO `tbl_addlabtest` (`labapt_id`, `test_id`, `test_name`) VALUES
(1, 4, ''),
(1, 5, ''),
(1, 6, ''),
(1, 8, ''),
(1, 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_addmedicine`
--

CREATE TABLE `tbl_addmedicine` (
  `order_id` int(20) UNSIGNED NOT NULL,
  `drugname` varchar(255) NOT NULL,
  `unitprice` decimal(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_addmedicine`
--

INSERT INTO `tbl_addmedicine` (`order_id`, `drugname`, `unitprice`, `quantity`, `unit`, `total`) VALUES
(1, 'ALBENDAZOLE', '75.00', 4, 'pill', '300.00'),
(2, 'ASPIRIN 100mg', '12.53', 1, 'pill', '12.53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminid` int(20) NOT NULL,
  `userid` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `contact_number` int(10) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminid`, `userid`, `fullname`, `nic`, `contact_number`, `profile_picture`) VALUES
(1, 1, 'Laxshan Panchavarnan', '199927512347', 712545865, 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assistant`
--

CREATE TABLE `tbl_assistant` (
  `assistant_id` int(10) NOT NULL,
  `name` text NOT NULL,
  `phoneno` int(20) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assistant`
--

INSERT INTO `tbl_assistant` (`assistant_id`, `name`, `phoneno`, `nic`, `userid`, `profile_picture`) VALUES
(1, 'Dinethi Hansika', 776567987, '9918437889V', '3', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contactus`
--

CREATE TABLE `tbl_contactus` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactnumber` int(10) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_docappointment`
--

CREATE TABLE `tbl_docappointment` (
  `docapt_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `docapt_time` varchar(100) NOT NULL,
  `docapt_no` int(11) NOT NULL,
  `docapt_status` int(11) NOT NULL,
  `pat_name` varchar(200) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `pat_nic` varchar(20) NOT NULL,
  `pat_contact` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `my_other` varchar(10) NOT NULL,
  `net_total` varchar(10) NOT NULL,
  `docapt_flag` int(11) NOT NULL,
  `prescription_name` varchar(255) NOT NULL,
  `other_remark` varchar(255) NOT NULL,
  `record_access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_docappointment`
--

INSERT INTO `tbl_docappointment` (`docapt_id`, `session_id`, `docapt_time`, `docapt_no`, `docapt_status`, `pat_name`, `relationship`, `pat_nic`, `pat_contact`, `created_by`, `created_at`, `my_other`, `net_total`, `docapt_flag`, `prescription_name`, `other_remark`, `record_access`) VALUES
(133, 2, '02:00 PM', 1, 1, '', '', '', '', 6, '2023-05-11 06:47:59', '0', '3000', 0, '', 'Im Sai', 1),
(134, 3, '12:00 PM', 1, 1, '', '', '', '', 6, '2023-05-11 06:48:46', '0', '3000', 0, '', 'hiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_docsession`
--

CREATE TABLE `tbl_docsession` (
  `session_id` int(11) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `date` date NOT NULL,
  `time_slot` varchar(100) NOT NULL,
  `room_no` varchar(100) NOT NULL,
  `assistant_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `no_of_appointment` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_docsession`
--

INSERT INTO `tbl_docsession` (`session_id`, `doctor_id`, `date`, `time_slot`, `room_no`, `assistant_id`, `created_at`, `no_of_appointment`, `status`) VALUES
(2, 1, '2023-05-14', '3', 'No 4', 1, '2023-05-05 08:22:14', 1, 1),
(3, 1, '2023-05-29', '2', 'No 3', 1, '2023-05-09 05:19:51', 1, 1),
(4, 1, '2023-06-30', '5', 'No 3', 1, '2023-05-09 05:20:16', 0, 1),
(5, 2, '2023-05-25', '0', 'No 3', 1, '2023-05-09 05:24:34', 0, 0),
(6, 2, '2023-05-24', '1', 'No 3', 1, '2023-05-12 09:21:02', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `doctor_id` int(100) NOT NULL,
  `doc_name` text NOT NULL,
  `contact_number` int(100) NOT NULL,
  `SLMC_number` varchar(50) NOT NULL,
  `charge` varchar(100) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `userid` varchar(10) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_id`, `doc_name`, `contact_number`, `SLMC_number`, `charge`, `specialization`, `userid`, `nic`, `profile_picture`) VALUES
(1, 'Dr. Sepalika Mendis', 710506264, 'SLMC - CARD07', '2500', 'Cardiologist', '2', '721305280V', 'user.png'),
(2, 'Dr. Nuwan Fonseka', 76800929, 'SLMC-DN08', '4000', 'Dental Anesthesiologist', '8', '200017602619', 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_labappointment`
--

CREATE TABLE `tbl_labappointment` (
  `labapt_id` int(100) NOT NULL,
  `labapt_date` varchar(20) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `labapt_status` int(1) NOT NULL DEFAULT 0,
  `created_by` int(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `responded_by` varchar(20) NOT NULL,
  `responded_at` varchar(20) NOT NULL,
  `nettotal` int(150) NOT NULL,
  `prescription_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_labappointment`
--

INSERT INTO `tbl_labappointment` (`labapt_id`, `labapt_date`, `contact`, `labapt_status`, `created_by`, `created_at`, `responded_by`, `responded_at`, `nettotal`, `prescription_name`) VALUES
(1, '2023-05-25', '0766800929', 0, 6, '2023-05-13 00:09:56', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_labtec`
--

CREATE TABLE `tbl_labtec` (
  `labtec_id` int(20) UNSIGNED NOT NULL,
  `userid` varchar(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `contact_number` int(10) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_labtec`
--

INSERT INTO `tbl_labtec` (`labtec_id`, `userid`, `fullname`, `nic`, `contact_number`, `profile_picture`) VALUES
(1, '5', 'Dewmini Devindya', '200058232154', 712585963, 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_labtests`
--

CREATE TABLE `tbl_labtests` (
  `test_id` int(11) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `charge` int(11) NOT NULL DEFAULT 0,
  `prescription` int(11) NOT NULL,
  `prerequirement` varchar(500) NOT NULL,
  `NumberOfTestsPerDay` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_labtests`
--

INSERT INTO `tbl_labtests` (`test_id`, `test_name`, `duration`, `charge`, `prescription`, `prerequirement`, `NumberOfTestsPerDay`) VALUES
(1, 'Alanine Aminotransferase (ALT) Test', 30, 950, 1, 'Fasting for at least 8 hours', 0),
(2, 'ACTH Stimulation Test', 25, 1000, 1, 'No food or drink for 10-12 hours before test', 0),
(3, 'Bilirubin Test', 15, 800, 1, 'None', 0),
(4, 'Blood Culture Test', 10, 2000, 0, 'Blood sample collected under sterile conditions', 0),
(5, 'Blood Urea Nitrogen (BUN) Test', 10, 1200, 0, 'Fast for 8-12 hours before the test', 0),
(6, 'C-Reactive Protein (CRP) Test', 20, 850, 0, 'None', 0),
(7, 'Calcium Test', 5, 900, 1, 'Fasting for 8-12 hours before the test', 0),
(8, 'Cholesterol Test', 25, 1100, 0, 'Fasting for 9-12 hours before the test', 0),
(9, 'Complete Blood Count (CBC) Test', 15, 1000, 0, 'None', 0),
(10, 'Comprehensive Metabolic Panel (CMP) Test', 45, 1500, 1, 'Fasting for 10-12 hours before the test', 0),
(11, 'Creatine Kinase (CK) Test', 20, 950, 0, 'No strenuous exercise for 24 hours before the test', 0),
(12, 'Creatinine Test', 15, 800, 0, 'No special preparation required', 0),
(13, 'Electrolyte Panel Test', 20, 1200, 1, 'Fasting for 12 hours before the test', 0),
(14, 'Erythrocyte Sedimentation Rate (ESR) Test', 30, 850, 1, 'None', 0),
(15, 'Fecal Occult Blood Test (FOBT) Test', 5, 1000, 1, 'No special preparation required', 0),
(16, 'Ferritin Test', 20, 1100, 1, 'No special preparation required', 0),
(17, 'Glucose Test', 10, 800, 0, 'Fasting for 8-12 hours before the test', 0),
(18, 'Glucose Tolerance Test (GTT)', 10, 1250, 0, 'Fasting for 8-12 hours before the test', 0),
(19, 'Hematocrit Test', 15, 900, 1, 'No strenuous exercise for 24 hours before the test', 0),
(20, 'Hemoglobin A1c (HbA1c) Test', 60, 1000, 1, 'No special preparation required', 0),
(21, 'Hepatitis B Test', 30, 1200, 1, 'None', 0),
(22, 'Hepatitis C Test', 30, 1250, 1, 'None', 0),
(23, 'Iron Test', 10, 850, 1, 'Fasting for 8-12 hours before the test', 0),
(24, 'Kidney Function Tests', 60, 1300, 1, 'No special preparation required', 0),
(25, 'Lactate Dehydrogenase (LDH) Test', 20, 950, 1, 'No special preparation required', 0),
(26, 'Lipid Panel Test', 25, 1000, 1, 'Fasting for 9-12 hours before the test', 0),
(27, 'Liver Function Tests (LFT)', 30, 1100, 1, 'None', 0),
(28, 'Magnesium Test', 5, 900, 1, 'No special preparation required', 0),
(29, 'Microalbumin Test', 10, 1200, 1, 'Fasting for 8-12 hours before the test', 0),
(30, 'Pap Smear Test', 40, 800, 1, 'No strenuous exercise for 24 hours before the test', 0),
(31, 'pH Test', 5, 850, 1, 'No special preparation required', 0),
(32, 'Phosphorus Test', 10, 1000, 1, 'Fasting for 8-12 hours before the test', 0),
(33, 'Potassium Test', 5, 900, 1, 'Fasting for 8-12 hours before the test', 0),
(34, 'Prostate-Specific Antigen (PSA) Test', 20, 1400, 0, 'No special preparation required', 0),
(35, 'Prothrombin Time (PT) Test', 15, 800, 1, 'None', 0),
(36, 'Renal Function Tests', 60, 1250, 1, 'No special preparation required', 0),
(37, 'Rheumatoid Factor (RF) Test', 20, 950, 1, 'No special preparation required', 0),
(38, 'Sodium Test', 5, 900, 1, 'None', 0),
(39, 'Stool Culture Test', 25, 1200, 1, 'None', 0),
(40, 'Thyroid Function Tests (TFT)', 30, 1100, 1, 'Blood sample collected under sterile conditions', 0),
(41, 'Total Protein Test', 15, 800, 1, 'No special preparation required', 0),
(42, 'Triglycerides Test', 20, 1000, 1, 'Blood sample collected under sterile conditions', 0),
(43, 'Troponin Test', 45, 1500, 1, 'No special preparation required', 0),
(44, 'Urinalysis (UA) Test', 10, 900, 0, 'No strenuous exercise for 24 hours before the test', 0),
(45, 'Urine Culture Test', 15, 1200, 0, 'No special preparation required', 0),
(46, 'Vitamin B12 Test', 10, 1000, 1, 'Blood sample collected under sterile conditions', 0),
(47, 'Vitamin D Test', 15, 1100, 1, 'No special preparation required', 0),
(48, 'White Blood Cell (WBC) Count Test', 5, 800, 0, 'None', 0),
(49, 'Zinc Test', 10, 850, 1, 'Blood sample collected under sterile conditions', 0),
(50, 'Zygosity Test', 30, 1000, 1, 'No special preparation required', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medicine`
--

CREATE TABLE `tbl_medicine` (
  `medicine_id` int(20) NOT NULL,
  `med_name` varchar(255) NOT NULL,
  `quantity` int(20) NOT NULL,
  `unit` varchar(30) NOT NULL,
  `unit_price` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_medicine`
--

INSERT INTO `tbl_medicine` (`medicine_id`, `med_name`, `quantity`, `unit`, `unit_price`) VALUES
(1, 'ALBENDAZOLE', 150, 'pill', 75.00),
(2, 'CLARITHROMYCIN', 95, 'pill', 174.99),
(3, 'DOXYCYCLIN', 300, 'pill', 23.90),
(5, 'LOSARTAN', 200, 'pill', 45.98),
(6, 'ASPIRIN 75mg', 16, 'pill', 7.08),
(7, 'ASPIRIN 100mg', 256, 'pill', 12.53),
(8, 'METFORMIN', 295, 'pill', 17.50);

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
  `ordertime` varchar(20) NOT NULL,
  `userid` int(200) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 0,
  `nic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_neworder`
--

INSERT INTO `tbl_neworder` (`order_id`, `pname`, `paddress`, `contactnumber`, `prescription_name`, `remarks`, `orderdate`, `ordertime`, `userid`, `order_status`, `nic`) VALUES
(6, 'Saitharsan Nanthakumaran', '14 wellawatte', 766800929, 'Order_12_05_23_01_33_55_AM.png', 'Axe oil 1 bottle', '12/05/2023', '01:33:55AM', 6, 0, '200017602619'),
(7, 'Saitharsan Nanthakumaran', '14 wellawatte', 766800929, 'Order_12_05_23_01_34_55_AM.png', 'Axe oil 1 bottle', '12/05/2023', '01:34:55AM', 6, 0, '200017602619'),
(8, 'Saitharsan Nanthakumaran', '14, 3/2, wellwatte', 766800929, 'Order_12_05_23_01_58_51_PM.png', 'Axe oil', '12/05/2023', '01:58:51PM', 6, 0, '200017602619');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_reset`
--

CREATE TABLE `tbl_password_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `created_at` int(20) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_password_reset`
--

INSERT INTO `tbl_password_reset` (`id`, `email`, `otp`, `created_at`, `used`) VALUES
(1, 'saitharsan@gmail.com', '786186', 1683518763, 0),
(2, 'saitharsan@gmail.com', '574785', 1683881402, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `p_id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `nic` varchar(20) NOT NULL,
  `contact` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'user.png',
  `acc_createdate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`p_id`, `userid`, `first_name`, `last_name`, `gender`, `dob`, `nic`, `contact`, `address`, `profile_picture`, `acc_createdate`) VALUES
(1, 6, 'Saitharsan', 'Nanthakumaran', 'male', '2000-06-28', '200017602619', 766800929, '14, Pereira Lane, Colombo 06.', 'user.png', '17/04/2023');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmacist`
--

CREATE TABLE `tbl_pharmacist` (
  `pharmacist_id` int(20) UNSIGNED NOT NULL,
  `userid` varchar(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `contact_number` int(10) DEFAULT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pharmacist`
--

INSERT INTO `tbl_pharmacist` (`pharmacist_id`, `userid`, `fullname`, `nic`, `contact_number`, `profile_picture`) VALUES
(1, '4', 'Chanya Perera', '200059632154', 782563147, 'user.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_recordaccess`
--

CREATE TABLE `tbl_recordaccess` (
  `p_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `access` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nettotal` decimal(20,2) NOT NULL,
  `order_status` int(11) NOT NULL DEFAULT 1,
  `nic` varchar(200) NOT NULL,
  `userid` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_respondedorders`
--

INSERT INTO `tbl_respondedorders` (`order_id`, `pname`, `paddress`, `contactnumber`, `prescription_name`, `remarks`, `orderdate`, `ordertime`, `unavailablemedicines`, `responddate`, `respondtime`, `nettotal`, `order_status`, `nic`, `userid`) VALUES
(1, 'Saitharsan', '14,3/2,pereira lane, Colombo - 06.', 766800929, 'Order_05_05_23_03_19_48_PM.pdf', 'Panadol Cards - 2', '05/05/2023', '03:19:48PM', '', '06/05/2023', '03:26:31PM', '300.00', 2, '200017602619', 6),
(2, 'Saitharsan', '14, Galle road, Dehiwla.', 776880088, 'Order_06_05_23_04_01_43_PM.png', '', '06/05/2023', '04:01:43PM', '', '06/05/2023', '10:20:03PM', '87.53', 1, '200017602619', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specializations`
--

CREATE TABLE `tbl_specializations` (
  `specialization_id` int(11) NOT NULL,
  `specializations` varchar(250) NOT NULL,
  `no_of_doctors` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_specializations`
--

INSERT INTO `tbl_specializations` (`specialization_id`, `specializations`, `no_of_doctors`) VALUES
(1, 'Addiction Psychiatrist', 0),
(2, 'Anesthesiologist', 0),
(3, 'Bariatric Surgeon', 0),
(4, 'Breast Surgeon', 0),
(5, 'Cardiologist', 0),
(6, 'Child Psychiatrist', 0),
(7, 'Dental Anesthesiologist', 0),
(8, 'Developmental-Behavioral Pediatrician', 0),
(9, 'Dermatologist', 0),
(10, 'Emergency Medical Technician (EMT)', 0),
(11, 'Endocrinologist', 0),
(12, 'Epileptologist', 0),
(13, 'Female Pelvic Medicine and Reconstructive Surgeon', 0),
(14, 'Forensic Psychiatrist', 0),
(15, 'Gastroenterologist', 0),
(16, 'Gynecologic Oncologist', 0),
(17, 'Hand Surgeon', 0),
(18, 'Hematologist', 0),
(19, 'Immunologist', 0),
(20, 'Infectious Disease Specialist', 0),
(21, 'Japanese Acupuncturist', 0),
(22, 'Juvenile Rheumatologist', 0),
(23, 'Kinesiologist', 0),
(24, 'Kinesiotherapist', 0),
(25, 'Lactation Consultant', 0),
(26, 'Laparoscopic Surgeon', 0),
(27, 'Mastectomy Surgeon', 0),
(28, 'Medical Geneticist', 0),
(29, 'Nephrologist', 0),
(30, 'Occupational Therapist', 0),
(31, 'Ophthalmologist', 0),
(32, 'Orthopedist', 0),
(33, 'Pediatrician', 0),
(34, 'Physical Therapist', 0),
(35, 'Plastic Surgeon', 0),
(36, 'Reproductive Endocrinologist', 0),
(37, 'Rheumatologist', 0),
(38, 'S.T.D', 0),
(39, 'Sleep Medicine Specialist', 0),
(40, 'Sports Medicine Specialist', 0),
(41, 'Thoracic Surgeon', 0),
(42, 'Transplant Surgeon', 0),
(43, 'Ultrasound Technologist', 0),
(44, 'Urologist', 0),
(45, 'Venereologist', 0),
(46, 'Vascular Surgeon', 0),
(47, 'Wound Consultation', 0),
(48, 'X-ray Technologist', 0),
(49, 'Yoga Therapist', 0),
(50, 'Zygomatic Implant Surgeon', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sysusers`
--

CREATE TABLE `tbl_sysusers` (
  `userid` int(10) NOT NULL,
  `actortype` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_sysusers`
--

INSERT INTO `tbl_sysusers` (`userid`, `actortype`, `username`, `password`, `status`, `email`) VALUES
(1, 'admin', 'admin1', '$2y$10$yDcgJP0dLWxpF.ytWpx/2ug0LDzra0xnlReByzV04Ab28s5ZXqNpm', 1, 'laxshan1906@gmail.com'),
(2, 'doctor', 'sepalika', '$2y$10$yDcgJP0dLWxpF.ytWpx/2ug0LDzra0xnlReByzV04Ab28s5ZXqNpm', 1, 'sepalikamendis@gmail.com'),
(3, 'assistant', 'dinethi', '$2y$10$yDcgJP0dLWxpF.ytWpx/2ug0LDzra0xnlReByzV04Ab28s5ZXqNpm', 1, 'dinethihansika@gmail.com'),
(4, 'pharmacist', 'chanya', '$2y$10$yDcgJP0dLWxpF.ytWpx/2ug0LDzra0xnlReByzV04Ab28s5ZXqNpm', 1, 'duniiidew@gmail.com'),
(5, 'labtec', 'devindya', '$2y$10$yDcgJP0dLWxpF.ytWpx/2ug0LDzra0xnlReByzV04Ab28s5ZXqNpm', 1, 'devindyadewmini@gmail.com'),
(6, 'patient', 'saitharsan', '$2y$10$yDcgJP0dLWxpF.ytWpx/2ug0LDzra0xnlReByzV04Ab28s5ZXqNpm', 1, 'saitharsan@gmail.com'),
(7, 'doctor', 'kumarswamy22', '$2y$10$QPo3Q1XW5ubvINZ9OiCe7uFloTR.GTQ0/IuIjqBjSlgGOrY5o5Vpq', 1, 'kumar234@gmail.com'),
(8, 'doctor', 'fonseka12', '$2y$10$mMAMn3ozFFWgtdU.02xpie7LgJ3LaDOE4vMlqNffft8u6OnwaDmaW', 1, 'fonseka_24@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_addmedicine`
--
ALTER TABLE `tbl_addmedicine`
  ADD PRIMARY KEY (`order_id`,`drugname`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `tbl_assistant`
--
ALTER TABLE `tbl_assistant`
  ADD PRIMARY KEY (`assistant_id`),
  ADD KEY `UserID` (`assistant_id`);

--
-- Indexes for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_docappointment`
--
ALTER TABLE `tbl_docappointment`
  ADD PRIMARY KEY (`docapt_id`),
  ADD KEY `fk_session_id` (`session_id`),
  ADD KEY `fk_sysuser` (`created_by`);

--
-- Indexes for table `tbl_docsession`
--
ALTER TABLE `tbl_docsession`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `fk_doc_id` (`doctor_id`),
  ADD KEY `fk_assistant` (`assistant_id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `tbl_labappointment`
--
ALTER TABLE `tbl_labappointment`
  ADD PRIMARY KEY (`labapt_id`);

--
-- Indexes for table `tbl_labtec`
--
ALTER TABLE `tbl_labtec`
  ADD PRIMARY KEY (`labtec_id`);

--
-- Indexes for table `tbl_labtests`
--
ALTER TABLE `tbl_labtests`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  ADD PRIMARY KEY (`medicine_id`) USING BTREE;

--
-- Indexes for table `tbl_neworder`
--
ALTER TABLE `tbl_neworder`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_pharmorder` (`userid`);

--
-- Indexes for table `tbl_password_reset`
--
ALTER TABLE `tbl_password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `fk_user_id` (`userid`);

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
-- Indexes for table `tbl_specializations`
--
ALTER TABLE `tbl_specializations`
  ADD PRIMARY KEY (`specialization_id`);

--
-- Indexes for table `tbl_sysusers`
--
ALTER TABLE `tbl_sysusers`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_assistant`
--
ALTER TABLE `tbl_assistant`
  MODIFY `assistant_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contactus`
--
ALTER TABLE `tbl_contactus`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_docappointment`
--
ALTER TABLE `tbl_docappointment`
  MODIFY `docapt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `tbl_docsession`
--
ALTER TABLE `tbl_docsession`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `doctor_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_labappointment`
--
ALTER TABLE `tbl_labappointment`
  MODIFY `labapt_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_labtec`
--
ALTER TABLE `tbl_labtec`
  MODIFY `labtec_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_labtests`
--
ALTER TABLE `tbl_labtests`
  MODIFY `test_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_medicine`
--
ALTER TABLE `tbl_medicine`
  MODIFY `medicine_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_neworder`
--
ALTER TABLE `tbl_neworder`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_password_reset`
--
ALTER TABLE `tbl_password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_pharmacist`
--
ALTER TABLE `tbl_pharmacist`
  MODIFY `pharmacist_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_specializations`
--
ALTER TABLE `tbl_specializations`
  MODIFY `specialization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_sysusers`
--
ALTER TABLE `tbl_sysusers`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_docappointment`
--
ALTER TABLE `tbl_docappointment`
  ADD CONSTRAINT `fk_session_id` FOREIGN KEY (`session_id`) REFERENCES `tbl_docsession` (`session_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sysuser` FOREIGN KEY (`created_by`) REFERENCES `tbl_sysusers` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_docsession`
--
ALTER TABLE `tbl_docsession`
  ADD CONSTRAINT `fk_assistant` FOREIGN KEY (`assistant_id`) REFERENCES `tbl_assistant` (`assistant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_doc_id` FOREIGN KEY (`doctor_id`) REFERENCES `tbl_doctor` (`doctor_id`);

--
-- Constraints for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`userid`) REFERENCES `tbl_sysusers` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
