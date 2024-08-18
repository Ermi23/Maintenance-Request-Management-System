-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 05:26 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin_tb`
--

CREATE TABLE `adminlogin_tb` (
  `a_login_id` int(11) NOT NULL,
  `a_name` varchar(60) NOT NULL,
  `a_email` varchar(60) NOT NULL,
  `a_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin_tb`
--

INSERT INTO `adminlogin_tb` (`a_login_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'Ermias Tadesse', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `assets_tb`
--

CREATE TABLE `assets_tb` (
  `SMEmail` varchar(55) NOT NULL,
  `pid` int(11) NOT NULL,
  `pname` varchar(60) NOT NULL,
  `pdop` date NOT NULL,
  `pava` int(11) NOT NULL,
  `ptotal` int(11) NOT NULL,
  `poriginalcost` int(11) NOT NULL,
  `psellingcost` int(11) NOT NULL,
  `Reason` varchar(200) NOT NULL DEFAULT 'None'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assets_tb`
--

INSERT INTO `assets_tb` (`SMEmail`, `pid`, `pname`, `pdop`, `pava`, `ptotal`, `poriginalcost`, `psellingcost`, `Reason`) VALUES
('admin@gmail.com', 1, 'Keyboard', '2023-10-03', 7, 10, 1000, 402, 'new keyboards are purchased'),
('mezi@gmail.com', 3, 'Mouse', '2022-10-02', 18, 30, 500, 600, 'None'),
('dese@gmail.com', 5, 'bulb', '2022-06-18', 25, 100, 20, 21, 'None'),
('belay@gmail.com', 6, 'mirror', '2022-06-18', 80, 100, 100, 110, 'None'),
('aman@gmail.com', 7, 'flourecent', '2022-07-01', 200, 200, 2000, 230, 'None'),
('aman@gmail.com', 8, 'motor', '2023-04-11', 3, 5, 10000, 604, 'None'),
('aman@gmail.com', 10, 'white board', '2023-04-12', 3, 5, 12500, 132, 'new whiteboard are purchased');

-- --------------------------------------------------------

--
-- Table structure for table `assignwork_tb`
--

CREATE TABLE `assignwork_tb` (
  `rno` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `request_info` text NOT NULL,
  `request_desc` text NOT NULL,
  `requester_name` varchar(60) NOT NULL,
  `requester_add1` text NOT NULL,
  `requester_add2` text NOT NULL,
  `requester_block` varchar(60) NOT NULL,
  `requester_campus` varchar(60) NOT NULL,
  `requester_email` varchar(60) NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `assign_tech` varchar(50) NOT NULL,
  `assign_date` date NOT NULL,
  `expertemail` varchar(67) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork_tb`
--

INSERT INTO `assignwork_tb` (`rno`, `request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_block`, `requester_campus`, `requester_email`, `requester_mobile`, `assign_tech`, `assign_date`, `expertemail`) VALUES
(5, 15, 'Desk problem', 'shortage of desk', 'Abc', '3', '56', 'class room', 'Gerji', 'abc@gmail.com', 918475685, 'Dawit', '2023-04-11', 'dave@gmail.com'),
(6, 17, 'White Board', 'crack', 'Abc', '3', '21', 'class room', 'Gerji', 'abc@gmail.com', 43541256, 'Dawit', '2023-04-11', 'dave@gmail.com'),
(7, 21, 'Desk problem', 'desks are broken', ' abc', '3', '21', 'Class room', 'Gerji', 'abc@gmail.com', 34567890, 'Dawit', '2023-06-19', 'dave@gmail.com'),
(8, 18, 'window problem', 'crack', 'Abc', '5', '5', 'Class Room', 'Gerji', 'abc@gmail.com', 23474859, 'nahom', '2023-06-19', 'nahom@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `experthead`
--

CREATE TABLE `experthead` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) NOT NULL,
  `r_email` varchar(60) NOT NULL,
  `r_password` varchar(60) NOT NULL,
  `r_address` varchar(40) NOT NULL,
  `regdate` date NOT NULL,
  `r_phone` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `experthead`
--

INSERT INTO `experthead` (`r_login_id`, `r_name`, `r_email`, `r_password`, `r_address`, `regdate`, `r_phone`) VALUES
(5, 'bisrat', 'bisre@gmail.com', 'cc3298e7d5c52eef7be37a0ed64b1ae3', 'gondar', '2022-07-25', 9889988),
(6, 'daniel', 'dani@gmail.com', '7f274f272ffad43d15117df4ac469a5f', 'gondar', '2022-07-26', 90987685),
(7, 'habtamu', 'habte@gmail.com', 'a6185657f76bc9ec8fad66e86760774c', 'Addis Abeba', '2023-04-12', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `experts`
--

CREATE TABLE `experts` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) NOT NULL,
  `r_email` varchar(60) NOT NULL,
  `r_password` varchar(60) NOT NULL,
  `Mobile` bigint(13) NOT NULL,
  `techaddress` varchar(50) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `sex` varchar(15) NOT NULL,
  `regdate` date NOT NULL,
  `profession` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `experts`
--

INSERT INTO `experts` (`r_login_id`, `r_name`, `r_email`, `r_password`, `Mobile`, `techaddress`, `status`, `sex`, `regdate`, `profession`) VALUES
(10, 'dawit', 'dave@gmail.com', '70b9f55c5b2ab6ab9e5a3fed086f1ce7', 946647343, 'Addis Ababa', 0, 'male', '2022-07-25', 'carpenter'),
(13, 'Nahom', 'nahom@gmail.com', '3ba84542ff8a77e0cae9cd2810ac0325', 918475685, 'Addis Ababa', 0, 'Male', '2023-06-19', 'Back end developer');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Phone` bigint(13) NOT NULL,
  `fedLocation` varchar(50) NOT NULL,
  `fedDate` date NOT NULL,
  `fedMessage` varchar(400) NOT NULL,
  `Position` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `FullName`, `Email`, `Phone`, `fedLocation`, `fedDate`, `fedMessage`, `Position`) VALUES
(4, 'dawit', 'dave@gmail.com', 9674567, 'block-34  Room-213', '2023-02-27', 'well done', 'electric technician'),
(5, 'daniel', 'dani@gmail.com', 9456788, 'block-33  Room-100', '2023-03-27', 'well done', 'proctor'),
(6, 'dawit', 'dave@gmail.com', 946647, 'block 5', '2023-03-27', 'well done', 'electrician'),
(10, 'Dawit ', 'dave@gmail.com', 7654327, '3 and 21', '2023-04-12', 'job is done well.', 'expert'),
(11, 'Abc', 'abc@gmail.com', 987654, '3 and 21', '2023-04-11', 'the expert did the job well.', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `report_tb`
--

CREATE TABLE `report_tb` (
  `report_id` int(15) NOT NULL,
  `pdf` varchar(400) NOT NULL,
  `Email` varchar(55) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `position` varchar(40) NOT NULL,
  `descr` varchar(40) NOT NULL,
  `datee` date NOT NULL,
  `seen` varchar(45) NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `report_tb`
--

INSERT INTO `report_tb` (`report_id`, `pdf`, `Email`, `fname`, `position`, `descr`, `datee`, `seen`) VALUES
(9, 'Work Report1.pdf', 'habte@gmail.com', 'habtamu', 'expert head', 'report ', '2023-05-28', 'unseen');

-- --------------------------------------------------------

--
-- Table structure for table `requesterlogin_tb`
--

CREATE TABLE `requesterlogin_tb` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) NOT NULL,
  `r_email` varchar(60) NOT NULL,
  `r_password` varchar(60) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `r_address` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `phone` int(15) NOT NULL,
  `r_date` date NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `requesterlogin_tb`
--

INSERT INTO `requesterlogin_tb` (`r_login_id`, `r_name`, `r_email`, `r_password`, `l_name`, `r_address`, `position`, `sex`, `phone`, `r_date`, `regdate`) VALUES
(32, 'abc', 'abc@gmail.com', 'e99a18c428cb38d5f260853678922e03', 'cde', 'gondar', 'janitor', 'male', 56777, '2019-07-25', '2022-07-25'),
(33, ' Ahmed Jemal', 'ahm@gmail.com', 'cef70e61e5ed9983fe89f4a36e1f58b1', 'yismaw', 'gondar', 'janitor', 'male', 946121230, '2021-07-25', '2022-07-25'),
(34, 'fasil', 'fasil@gmail.com', '00a54aac3129e4dfc09477a47dcb81f0', 'alemu', 'bahirdar', 'library head', 'male', 918049216, '2021-07-25', '2022-07-25'),
(37, 'Meron', 'Meri@gmail.com', '322dbe9a7d762afec9244a68d5802f11', 'kebede', 'gojjam', 'janitor', 'female', 906704030, '2021-07-26', '2022-07-26');

-- --------------------------------------------------------

--
-- Table structure for table `storemanager`
--

CREATE TABLE `storemanager` (
  `r_login_id` int(11) NOT NULL,
  `r_name` varchar(60) NOT NULL,
  `r_email` varchar(60) NOT NULL,
  `r_password` varchar(60) NOT NULL,
  `s_address` varchar(20) NOT NULL,
  `s_phone` int(15) NOT NULL,
  `s_sex` varchar(15) NOT NULL,
  `regdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `storemanager`
--

INSERT INTO `storemanager` (`r_login_id`, `r_name`, `r_email`, `r_password`, `s_address`, `s_phone`, `s_sex`, `regdate`) VALUES
(8, 'Amanuel Zebre', 'aman@gmail.com', '8276bff3d2bbd1f7c4c3c3b6981d0658', 'Addis Abeba', 54323456, 'Male', '2023-04-11');

-- --------------------------------------------------------

--
-- Table structure for table `submitrequest_tb`
--

CREATE TABLE `submitrequest_tb` (
  `request_id` int(11) NOT NULL,
  `request_info` text NOT NULL,
  `request_desc` text NOT NULL,
  `requester_name` varchar(60) NOT NULL,
  `requester_add1` text NOT NULL,
  `requester_add2` text NOT NULL,
  `requester_block` varchar(60) NOT NULL,
  `requester_campus` varchar(60) NOT NULL,
  `requester_email` varchar(60) NOT NULL,
  `requester_mobile` bigint(11) NOT NULL,
  `request_date` date NOT NULL,
  `Approval` varchar(60) NOT NULL DEFAULT 'Not_Approved',
  `Assigned` varchar(56) NOT NULL DEFAULT 'Not_Assigned',
  `trash` varchar(20) NOT NULL DEFAULT 'unseen',
  `storeview` varchar(20) NOT NULL DEFAULT 'unseen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `submitrequest_tb`
--

INSERT INTO `submitrequest_tb` (`request_id`, `request_info`, `request_desc`, `requester_name`, `requester_add1`, `requester_add2`, `requester_block`, `requester_campus`, `requester_email`, `requester_mobile`, `request_date`, `Approval`, `Assigned`, `trash`, `storeview`) VALUES
(1, 'bulb problem', 'the student light bulb is not working well', 'daniel yismaw', 'block 34', 'room 3', 'class room', 'Gerji', 'dani@gmail.com', 946121230, '2022-07-26', 'Approved', 'assigned', 'unseen', 'unseen'),
(15, 'Desk problem', 'shortage of desk', 'Abc', 'block 3', '56', 'class room', 'Gerji', 'abc@gmail.com', 918475685, '2023-04-11', 'Approved', 'assigned', 'seen', 'unseen'),
(16, 'Desk problem', 'crack', 'Abc', '3', '56', 'Lab', 'Gerji', 'abc@gmail.com', 918475685, '2023-04-11', 'rejected', 'Not_Assigned', 'seen', 'unseen'),
(17, 'White Board', 'crack', 'Abc', '3', '21', 'class room', 'Gerji', 'abc@gmail.com', 43541256, '2023-04-11', 'Approved', 'assigned', 'unseen', 'unseen'),
(18, 'window problem', 'crack', 'Abc', '5', '5', 'Class Room', 'Gerji', 'abc@gmail.com', 23474859, '2023-04-11', 'Approved', 'assigned', 'unseen', 'unseen'),
(21, 'Desk problem', 'desks are broken', ' abc', '3', '21', 'Class room', 'Gerji', 'abc@gmail.com', 34567890, '2023-06-19', 'Approved', 'assigned', 'unseen', 'unseen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  ADD PRIMARY KEY (`a_login_id`);

--
-- Indexes for table `assets_tb`
--
ALTER TABLE `assets_tb`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  ADD PRIMARY KEY (`rno`);

--
-- Indexes for table `experthead`
--
ALTER TABLE `experthead`
  ADD PRIMARY KEY (`r_login_id`),
  ADD UNIQUE KEY `r_email` (`r_email`);

--
-- Indexes for table `experts`
--
ALTER TABLE `experts`
  ADD PRIMARY KEY (`r_login_id`),
  ADD UNIQUE KEY `r_email` (`r_email`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- Indexes for table `report_tb`
--
ALTER TABLE `report_tb`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  ADD PRIMARY KEY (`r_login_id`),
  ADD UNIQUE KEY `r_email` (`r_email`);

--
-- Indexes for table `storemanager`
--
ALTER TABLE `storemanager`
  ADD PRIMARY KEY (`r_login_id`),
  ADD UNIQUE KEY `r_email` (`r_email`);

--
-- Indexes for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin_tb`
--
ALTER TABLE `adminlogin_tb`
  MODIFY `a_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets_tb`
--
ALTER TABLE `assets_tb`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `assignwork_tb`
--
ALTER TABLE `assignwork_tb`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `experthead`
--
ALTER TABLE `experthead`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `experts`
--
ALTER TABLE `experts`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `report_tb`
--
ALTER TABLE `report_tb`
  MODIFY `report_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requesterlogin_tb`
--
ALTER TABLE `requesterlogin_tb`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `storemanager`
--
ALTER TABLE `storemanager`
  MODIFY `r_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `submitrequest_tb`
--
ALTER TABLE `submitrequest_tb`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
