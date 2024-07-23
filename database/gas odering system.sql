-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2024 at 10:30 AM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id22282323_gasoderingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_data` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_data`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, ''),
(9, ''),
(10, ''),
(11, ''),
(12, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `message` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `location`, `message`, `status`, `customer_id`, `supplier_id`) VALUES
(1, 'Paradise', 'Please contact me, I need cylinder!!', 'Available', NULL, NULL),
(2, 'Changarawe', 'Please contact me, I need cylinder!!', 'Available', 3, NULL),
(3, 'Paradise', 'Please contact me, I need cylinder!!', 'Available', 3, NULL),
(4, 'Paradise', 'Please contact me, I need cylinder!!', 'Available', 3, NULL),
(5, 'Paradise', 'Please contact me, I need cylinder!!', 'Available', 3, NULL),
(6, 'Paradise', 'Please contact me, I need cylinder!!', 'Available', 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `cylinder` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `contact` int(25) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `price` int(5) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `cylinder`, `name`, `contact`, `location`, `status`, `price`, `supplier_id`) VALUES
(1, 'MANJIS GAS', 'Supplier Supplier', 32, 'Kanisani', 'Available', 23, 2),
(2, 'MANJIS GAS', 'ales mahanga', 622059049, 'kigoma', 'Available', 3434, 8),
(3, 'ORYX GAS', 'Supplier Supplier', 758564018, 'kanisani', 'Available', 34, 2);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(200) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `choice` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstname`, `lastname`, `email`, `address`, `phonenumber`, `choice`, `password`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'admin', 758564018, 'Admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'supplier', 'supplier', 'supplier@gmail.com', 'supplier', 758564018, 'Supplier', '99b0e8da24e29e4ccb5d7d76e677c2ac'),
(3, 'customer', 'customer', 'customer@gmail.com', 'customer', 758564018, 'Customer', '91ec1f9324753048c0096d036a694f86'),
(4, 'Samweli', 'Mnyone', 'samweli@gmail.com', 'paradise', 758564018, '[Supplier]', '6991296281b2eaa5c33887b710f7af88'),
(5, 'sarah', 'andea', 'sarah@gmail.com', 'sarah', 758564018, 'Supplier', '9e9d7a08e048e9d604b79460b54969c3'),
(6, 'Baraka', 'Mashimbe', 'baraka@gmail.com', 'paradise', 758564018, 'Customer', '481ef83f3145fe37a5f40268bb87ca6b'),
(7, 'admin2', 'admin2', 'admin2@gmail.com', 'admin2', 758564018, 'Admin', 'c84258e9c39059a89ab77d846ddab909'),
(8, 'ales', 'mahanga', 'ales@gmail.com', 'kigoma', 622059049, 'Supplier', '4a687405196c9260c1fbd06c867c8a66'),
(9, 'ales', 'mahanga', 'admin3@gmail.com', 'kigoma', 622059049, 'Admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
