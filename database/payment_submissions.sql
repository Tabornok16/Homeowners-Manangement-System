-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 11:34 AM
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
-- Table structure for table `payment_submissions`
--

CREATE TABLE `payment_submissions` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `payment_for` varchar(255) DEFAULT NULL,
  `ref_no` varchar(255) DEFAULT NULL,
  `proof_of_payment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_submissions`
--

INSERT INTO `payment_submissions` (`id`, `amount`, `payment_for`, `ref_no`, `proof_of_payment`) VALUES
(1, 33330, 'AS', '124', NULL),
(2, 33330, '', '124', NULL),
(3, 0, NULL, '124124', NULL),
(4, 33330, 'EA100004', '124214', NULL),
(5, 33330, 'EA100004', '12421', 'uploads/qweqwe.png'),
(6, 33330, 'EA100004', '12412', '../uploads/qweqwe.png'),
(11, 33330, 'EA100004', '33330', '../uploads/qweqwe.png'),
(12, 33330, 'EA100004', '33330', '../uploads/qweqwe.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment_submissions`
--
ALTER TABLE `payment_submissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment_submissions`
--
ALTER TABLE `payment_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
