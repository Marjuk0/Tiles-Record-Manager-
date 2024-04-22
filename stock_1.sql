-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2022 at 08:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'marju', '$2y$08$75/Ps355EY733BTjRvaIPud80Nm3QR6seVRZCrL819MxfX6yoRDoa');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `date` date NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `m_in` text NOT NULL,
  `q_in` varchar(1000) NOT NULL,
  `m_out` text NOT NULL,
  `q_out` varchar(1000) NOT NULL,
  `remarks` text NOT NULL,
  `id` int(100) NOT NULL,
  `product_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`date`, `product_id`, `m_in`, `q_in`, `m_out`, `q_out`, `remarks`, `id`, `product_name`) VALUES
('0045-09-08', '27', '', '1515', '', '', '', 46, '\r\n              \r\n                        XM.(8-12)2328\r\n                                      '),
('2022-02-04', '27', '', '', '', '251', '', 47, '\r\n              \r\n                        XM.(8-12)2328\r\n                                      '),
('2022-01-25', '28', '', '', '', '200', '', 49, '\r\n              \r\n                        xm2302(8-12)\r\n                                      '),
('2022-01-25', '28', '', '', '', '100', '', 50, '\r\n              \r\n                        xm2302(8-12)\r\n                                      '),
('2022-01-26', '28', '', '', '', '500', '', 51, '\r\n              \r\n                        xm2302(8-12)\r\n                                      '),
('2022-01-26', '29', '', '1000', '', '', '', 52, '\r\n              \r\n                        15603\r\n                                      '),
('2022-01-26', '28', '', '', '', '10', '', 53, '\r\n              \r\n                        xm2302(8-12)\r\n                                      '),
('2022-01-26', '28', '', '', '', '1200', '', 54, '\r\n              \r\n                        xm2302(8-12)\r\n                                      '),
('2022-01-26', '28', '', '3000', '', '', '', 55, '\r\n              \r\n                        xm2302(8-12)\r\n                                      '),
('2022-01-26', '28', '', '10', '', '', '', 56, '\r\n              \r\n                        xm2302(8-12)\r\n                                      ');

-- --------------------------------------------------------

--
-- Table structure for table `stock_category`
--

CREATE TABLE `stock_category` (
  `category` text NOT NULL,
  `id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_category`
--

INSERT INTO `stock_category` (`category`, `id`) VALUES
('8-12', 20),
('10-16', 21),
('12-18', 22),
('12-24', 23),
('16-16', 24),
('12-12', 25),
('24-24', 26),
('32-32', 27),
('6-24', 28);

-- --------------------------------------------------------

--
-- Table structure for table `stock_product`
--

CREATE TABLE `stock_product` (
  `product_name` text NOT NULL,
  `category_id` int(100) NOT NULL,
  `id` int(11) NOT NULL,
  `cp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_product`
--

INSERT INTO `stock_product` (`product_name`, `category_id`, `id`, `cp`) VALUES
('X-524(8-12)', 9, 16, 0),
('av', 11, 20, 0),
('a', 9, 21, 0),
('x-2343(12-20)', 18, 23, 0),
('Humogenious', 13, 24, 0),
('av', 10, 25, 0),
('424', 10, 26, 0),
('xm2302(8-12)', 20, 28, 10),
('15603', 28, 29, 0),
('x-2343(12-20)', 20, 30, 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_category`
--
ALTER TABLE `stock_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_product`
--
ALTER TABLE `stock_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `stock_category`
--
ALTER TABLE `stock_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `stock_product`
--
ALTER TABLE `stock_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
