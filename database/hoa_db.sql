-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 10:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hoa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Construction'),
(2, 'RFID'),
(3, 'Car sticker'),
(4, 'Reservation');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `refno` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Triggers `notifications`
--
DELIMITER $$
CREATE TRIGGER `transaction_particulars` AFTER INSERT ON `notifications` FOR EACH ROW BEGIN
    INSERT INTO notifications (type, amount, refno) 
    VALUES (tx_no, amount, particular); -- Adjust column names as per your tables
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_submissions`
--

CREATE TABLE `payment_submissions` (
  `id` int(11) NOT NULL,
  `tx_no` varchar(255) DEFAULT NULL,
  `homeowner` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `payment_for` varchar(255) DEFAULT NULL,
  `ref_no` varchar(255) DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_submissions`
--

INSERT INTO `payment_submissions` (`id`, `tx_no`, `homeowner`, `amount`, `payment_for`, `ref_no`, `proof_of_payment`) VALUES
(14, 'TX0001', NULL, 33330, 'EA100004', '33330', '../uploads/qweqwe.png'),
(15, 'TX003', NULL, 33330, 'EA100004', '33330', '../uploads/qweqwe.png'),
(16, 'inquiry', NULL, 5000, 'paymentfor', '4214', '../uploads/qweqwe.png'),
(17, 'Miscellaneous', NULL, 5000, '<br /><b>Warning</b>:  Undefined variable $Subcategory in <b>C:\\xampp\\htdocs\\Homeowners-Manangement-System\\homeowner\\make_payment.php</b> on line <b>110</b><br />', '12412', '../uploads/qweqwe.png'),
(18, 'Miscellaneous', NULL, 5000, 'construction', '124', '../uploads/qweqwe.png'),
(19, 'TX003', 5, 33330, 'EA100004', '124', '../uploads/qweqwe.png'),
(20, NULL, 5, 5000, 'construction', '5000', '../uploads/qweqwe.png'),
(21, NULL, 5, 100000, 'construction', '125215', '../uploads/qweqwe.png'),
(22, 'Miscellaneous', 5, 100000, 'construction', '12421', '../uploads/qweqwe.png'),
(23, 'Miscellaneous', 5, 100000, 'construction', '124214214', '../uploads/qweqwe.png'),
(24, 'Miscellaneous', 5, 100000, 'construction', '124214214', '../uploads/qweqwe.png'),
(25, 'Miscellaneous', 5, 100000, 'construction', '124214214', '../uploads/qweqwe.png'),
(26, 'Miscellaneous', 5, 100000, 'construction', '124214214', '../uploads/qweqwe.png'),
(27, 'Miscellaneous', 5, 100000, 'construction', '124214214', '../uploads/qweqwe.png'),
(28, 'Miscellaneous', 5, 100000, 'construction', '124214214', '../uploads/qweqwe.png'),
(29, 'Miscellaneous', 5, 100000, 'construction', '124214214', '../uploads/qweqwe.png'),
(30, 'Miscellaneous', 5, 100000, 'construction', '124214214', '../uploads/qweqwe.png'),
(31, 'Miscellaneous', 5, 100000, 'construction', '124214214', '../uploads/qweqwe.png'),
(32, 'Miscellaneous', 5, 100000, 'construction', '124214214', '../uploads/qweqwe.png'),
(33, 'Miscellaneous', 5, 100000, 'construction', '124214214', '../uploads/qweqwe.png'),
(34, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(35, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(36, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(37, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(38, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(39, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(40, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(41, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(42, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(43, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(44, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(45, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(46, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(47, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(48, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(49, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(50, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(51, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(52, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png'),
(53, 'Miscellaneous', 5, 100000, 'construction', '214214', '../uploads/qweqwe.png');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `prop_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `homeowner` varchar(255) NOT NULL,
  `monthly_dues` int(255) NOT NULL,
  `lotArea` float NOT NULL,
  `jeastAdd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `prop_id`, `user_id`, `homeowner`, `monthly_dues`, `lotArea`, `jeastAdd`) VALUES
(25, 'EA100004', 5, 'Ramon Ang', 33330, 5555, 'test'),
(27, 'EA0000000003', 6, 'Jhoane Luna', 12744, 2124, 'test'),
(28, 'EZADsaDASD', 6, 'Jhoane Luna', 127926, 21321, 'test'),
(30, 'qweqwe', 3, 'john paul', 738, 123, 'test'),
(32, 'EA100003', 3, 'john paul', 73926, 12321, '51235');

-- --------------------------------------------------------

--
-- Table structure for table `setprice`
--

CREATE TABLE `setprice` (
  `tx_id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `category` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `subtype` varchar(255) NOT NULL,
  `unitStakeholder` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `action` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setprice`
--

INSERT INTO `setprice` (`tx_id`, `date`, `category`, `subcategory`, `type`, `subtype`, `unitStakeholder`, `price`, `action`) VALUES
(2, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'processing-fee', 'house-fence', 'owner', '30000', ''),
(3, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'processing-fee', 'minor-renovation', 'owner', '5000', ''),
(4, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'bond', 'house-fence', 'owner', '200000', ''),
(5, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'bond', 'fence-renovation-extension', 'owner', '50000', ''),
(6, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'bond', 'house-fence', 'contractor', '100000', ''),
(7, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'bond', 'fence-renovation-extension', 'contractor', '25000', ''),
(8, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'delivery-fee', 'house-fence', 'unli-entries', '5000', ''),
(9, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'delivery-fee', 'fence-renovation-extension', 'unli-entries', '3000', ''),
(10, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'delivery-fee', 'fence-construction', 'unli-entries', '3000', ''),
(11, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'delivery-fee', 'minor-renovation', 'unli-entries', '500', ''),
(12, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'delivery-fee', 'minor-renovation', 'single-entry', '200', ''),
(13, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'delivery-fee', 'ten-wheeler-above', 'per-entry', '1500', ''),
(14, '2024-03-29 16:00:00', 'Miscellaneous', 'construction', 'workerid', 'N/A', 'contractor', '200', ''),
(15, '2024-03-29 16:00:00', 'Miscellaneous', 'rfid', 'N/A', 'N/A', 'owner', '200', ''),
(16, '2024-03-29 16:00:00', 'Miscellaneous', 'carsticker', 'N/A', 'N/A', 'owner', '200', ''),
(17, '2024-03-29 16:00:00', 'Miscellaneous', 'reservation', 'function', 'N/A', 'owner', '4500', ''),
(18, '2024-03-29 16:00:00', 'Miscellaneous', 'reservation', 'swimpool', 'N/A', 'per-entry', '75', ''),
(19, '2024-03-29 16:00:00', 'Miscellaneous', 'reservation', 'clubhouse', 'N/A', 'owner', '5000', ''),
(20, '2024-03-29 16:00:00', 'Miscellaneous', 'reservation', 'tennis', 'N/A', 'N/A', '150', ''),
(21, '2024-03-29 16:00:00', 'Miscellaneous', 'reservation', 'bball', 'N/A', 'uncategorized', '150', ''),
(22, '2024-03-29 16:00:00', 'HOA Dues', 'NA', 'NA', 'NA', 'SQM', '6', ''),
(23, '2024-04-02 08:58:37', '1', '2', 'test', 'test', '5', '555', NULL),
(24, '2024-04-02 09:00:03', 'Construction', 'Construction', '123', '123', 'Owner', '555', NULL),
(25, '2024-04-02 09:01:02', 'Construction', 'RFID', 'qwe', 'qwe', 'Square per meter', '222', NULL),
(26, '2024-04-02 09:01:59', 'Construction', 'Reservation', 'ads', 'asd', 'Square per meter', '123', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stakeholder`
--

CREATE TABLE `stakeholder` (
  `id` int(11) NOT NULL,
  `stakeholder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stakeholder`
--

INSERT INTO `stakeholder` (`id`, `stakeholder`) VALUES
(1, 'qwe'),
(2, 'test'),
(3, 'Square per meter'),
(4, 'Owner'),
(5, 'Contractor'),
(6, 'Unlimited Entries');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tx_id` int(11) NOT NULL,
  `tx_no` varchar(255) NOT NULL,
  `homeowner` varchar(255) NOT NULL,
  `tx_date` datetime DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `verification` int(11) NOT NULL DEFAULT 1 COMMENT '1 = unpaid\r\n2 = paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tx_id`, `tx_no`, `homeowner`, `tx_date`, `amount`, `verification`) VALUES
(45, 'TX001', '5', '2024-04-20 00:00:00', 33330, 1),
(46, 'TX002', '5', '2024-04-20 00:00:00', 33330, 1),
(47, 'TX003', '5', '2024-04-20 00:00:00', 33330, 2),
(48, 'TX003', '5', '2024-04-20 00:00:00', 33330, 2),
(49, '', '5', '2024-04-20 00:00:00', 33330, 1),
(50, 'TX001', '5', '2024-04-20 00:00:00', 33330, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_particulars`
--

CREATE TABLE `transaction_particulars` (
  `id` int(11) NOT NULL,
  `tx_id` varchar(255) NOT NULL,
  `tx_no` varchar(255) NOT NULL,
  `homeowner` int(11) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `fromDate` varchar(255) NOT NULL,
  `toDate` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `verification` int(11) NOT NULL DEFAULT 1 COMMENT '1 = unpaid\r\n2 = paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction_particulars`
--

INSERT INTO `transaction_particulars` (`id`, `tx_id`, `tx_no`, `homeowner`, `particular`, `fromDate`, `toDate`, `amount`, `verification`) VALUES
(45, '47', 'TX003', 5, 'EA100004', '2024-04', '2024-04', 33330, 2),
(46, '48', 'TX003', 5, 'EA100004', '2024-04', '2024-04', 33330, 2),
(47, '49', '', 5, 'EA100004', '2024-04', '2024-04', 33330, 2),
(48, '50', 'TX001', 5, 'EA100004', '2024-04', '2024-04', 33330, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `userType` int(11) NOT NULL COMMENT '1= admin, 2=staff, 3=homeowner\r\n',
  `gender` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `madd` varchar(255) NOT NULL,
  `postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `firstname`, `lastname`, `password`, `userType`, `gender`, `status`, `birthday`, `email`, `phone`, `madd`, `postal`) VALUES
(1, 'admin', 'Jay', 'Velandres', '11111', 1, 'Male', '', '0000-00-00', 'j@gmail.com', 217965291, 'Santa Rosa Laguna', 4026),
(3, 'john', 'john', 'paul', '12345', 3, 'male', '', '1986-04-16', 'john@gmail.com', 217965291, 'Calamba Laguna', 4024),
(4, 'joyce', 'Joyce', 'Wendy', '12345', 2, 'female', '', '2001-03-16', 'joyce@gmail.com', 197999999, 'Santa Rosa Laguna', 4026),
(5, 'Ramon', 'Ramon', 'Ang', '12345', 3, 'male', '', '2002-03-19', 'ramon@gmail.com', 279999999, 'Cavinti Laguna', 4023),
(6, 'Jhoane', 'Jhoane', 'Luna', '12345', 2, 'female', '', '1983-07-23', 'jhoane@gmail.com', 1979655555, 'Binan Laguna', 4025),
(14, 'Raymond', 'Raymond', 'Ibanez', '12345', 3, 'male', '', '2001-01-01', 'raymond@gmail.com', 2147483647, 'Santa Rosa Laguna', 4026);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_submissions`
--
ALTER TABLE `payment_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setprice`
--
ALTER TABLE `setprice`
  ADD PRIMARY KEY (`tx_id`);

--
-- Indexes for table `stakeholder`
--
ALTER TABLE `stakeholder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tx_id`);

--
-- Indexes for table `transaction_particulars`
--
ALTER TABLE `transaction_particulars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_submissions`
--
ALTER TABLE `payment_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `setprice`
--
ALTER TABLE `setprice`
  MODIFY `tx_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `stakeholder`
--
ALTER TABLE `stakeholder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tx_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `transaction_particulars`
--
ALTER TABLE `transaction_particulars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
