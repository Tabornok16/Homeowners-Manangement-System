-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 04:11 AM
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
-- Table structure for table `emailform`
--

CREATE TABLE `emailform` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emailform`
--

INSERT INTO `emailform` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'Jay', 'jay@gmail.com', 'Test', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `prop_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `monthly_dues` int(255) NOT NULL,
  `lotArea` float NOT NULL,
  `jeastAdd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `prop_id`, `user_id`, `monthly_dues`, `lotArea`, `jeastAdd`) VALUES
(12, 'EA22412412', 'Jay Velandres', 1, 25, 'qweqweqw'),
(13, 'EA213213', 'Jay Velandres', 213, 213, 'qweqwe'),
(14, 'EA55555', 'Joyce Wendy', 213, 213, 'qweqwe'),
(15, 'EA017010', 'Jhoane Luna', 0, 270, 'BLOCK 17 LOT 10'),
(16, 'Test12', 'Jhoane Luna', 1128, 188, 'Test');

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
(1, '2024-03-29 16:00:00', 'HOA Dues', 'N/A', 'N/A', 'N/A', 'sqm', '6', ''),
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
(22, '2024-03-29 16:00:00', 'HOA Dues', 'NA', 'NA', 'NA', 'SQM', '7', ''),
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
  `tx_date` datetime DEFAULT NULL,
  `particular` varchar(255) NOT NULL,
  `period` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `verification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `postal` int(11) NOT NULL,
  `verification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `firstname`, `lastname`, `password`, `userType`, `gender`, `status`, `birthday`, `email`, `phone`, `madd`, `postal`, `verification`) VALUES
(1, 'admin', 'Jay', 'Velandres', '11111', 1, 'Male', '', '0000-00-00', 'j@gmail.com', 217965291, 'Santa Rosa Laguna', 4026, ''),
(3, 'john', 'john', 'paul', '12345', 3, 'male', '', '1986-04-16', 'john@gmail.com', 217965291, 'Calamba Laguna', 4024, ''),
(4, 'joyce', 'Joyce', 'Wendy', '12345', 2, 'female', '', '2001-03-16', 'joyce@gmail.com', 197999999, 'Santa Rosa Laguna', 4026, ''),
(5, 'Ramon', 'Ramon', 'Ang', '12345', 3, 'male', '', '2002-03-19', 'ramon@gmail.com', 279999999, 'Cavinti Laguna', 4023, ''),
(6, 'Jhoane', 'Jhoane', 'Luna', '12345', 2, 'female', '', '1983-07-23', 'jhoane@gmail.com', 1979655555, 'Binan Laguna', 4025, ''),
(14, 'Raymond', 'Raymond', 'Ibanez', '12345', 3, 'male', '', '2001-01-01', 'raymond@gmail.com', 2147483647, 'Santa Rosa Laguna', 4026, ''),
(26, '', '', '', '$2y$10$5hXULaSiWMr5jg6BZKMMie4.MJZ0Yvry1cnyim/S2e51d1p.ghZR2', 0, '', '', '0000-00-00', '', 0, '', 0, ''),
(27, '', '', '', '$2y$10$VapWUguGnHvt3vE95UdoqeFUjvh4vES3Z6kuTrAsdy6zHp/IV1vty', 0, '', '', '0000-00-00', '', 0, '', 0, ''),
(28, '', '', '', '$2y$10$7peNY88HwlXLoIht6YAJYuwGF/F1uMhAogBw4/dtXeWxfix6MKPmu', 0, '', '', '0000-00-00', '', 0, '', 0, ''),
(29, '', '', '', '$2y$10$KhJ4vdr5gK8vKWPPJQv3y.oVyDUuvPI3NeMu61FlG4CBS/ZuRmJtO', 0, '', '', '0000-00-00', '', 0, '', 0, ''),
(30, 'Shiela', 'Shiela', 'Bisnar', '$2y$10$y99q4lqqLEv77Q85WZHFJu3WbI6Ls5LadFnaBN49kzDgJrkngApvS', 3, 'Female', '', '2000-01-01', 'SHIELA@GMAIL.COM', 0, 'Cabuyao Laguna', 4025, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emailform`
--
ALTER TABLE `emailform`
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
-- AUTO_INCREMENT for table `emailform`
--
ALTER TABLE `emailform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `tx_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
