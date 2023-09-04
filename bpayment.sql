-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2023 at 03:19 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpayment`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `business_name` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `period` varchar(350) NOT NULL,
  `status` varchar(56) NOT NULL,
  `Amount` float NOT NULL,
  `business_type` varchar(110) NOT NULL,
  `payment_method` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `business_name`, `date`, `period`, `status`, `Amount`, `business_type`, `payment_method`) VALUES
(1, 'County Gov', '2023-08-11 21:00:00', '2023/2024', 'Pending Approval', 450, '', 'Mpesa'),
(2, 'County Gov\'t Admin Account', '2023-03-11 21:00:00', '2023/2024', 'Pending Approval', 780, 'N/A', 'Mpesa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_names` varchar(250) NOT NULL,
  `username` varchar(280) NOT NULL,
  `password` varchar(350) NOT NULL,
  `tel` varchar(200) NOT NULL,
  `business_name` varchar(230) NOT NULL,
  `type_of_business` varchar(200) NOT NULL,
  `addresses` varchar(230) NOT NULL,
  `role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_names`, `username`, `password`, `tel`, `business_name`, `type_of_business`, `addresses`, `role`) VALUES
(1, 'county admin', 'admin@county.kenya', 'admin@county.kenya', '0111808341', 'County Gov\'t Admin Account', 'N/A', 'Nairobi', 'admin'),
(2, 'Kelvin Magochi', 'client@county.kenya', 'client@county.kenya', '0111808341', 'York university', 'York university', 'Nairobi', 'client');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
