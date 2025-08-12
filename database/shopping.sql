-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 01:30 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(256) NOT NULL,
  `name` varchar(150) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'admin',
  `email` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `role`, `email`, `created_at`) VALUES
(1, 'admin', '$2y$10$YJjQMwYLBWkEPgJu0xS8quNHFU5uCmBkFJsvsX5cF4U2gp1SsmNGe', 'john doe', 'admin', 'injamul@email.com', '2020-05-23 05:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `available_pincodes`
--

CREATE TABLE `available_pincodes` (
  `id` int(11) NOT NULL,
  `pincode` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_pincodes`
--

INSERT INTO `available_pincodes` (`id`, `pincode`) VALUES
(1, '781380');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `catname` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catname`, `created_at`) VALUES
(54, 'Fresh Fruits', '2024-07-06 06:07:00'),
(55, 'Fresh Vegetables', '2024-07-06 06:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `order_status` int(11) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `mihpayid` varchar(20) DEFAULT NULL,
  `payu_status` varchar(10) DEFAULT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `address`, `city`, `pincode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `txnid`, `mihpayid`, `payu_status`, `added_on`) VALUES
(1, 1, 'Vill - Kacharua, P.O- Puthimari, P.S - Kamalpur, Dist-Kamrup', 'Guwahati', 781380, 'payu', 2000, 'success', 1, 'b21189a9f3f96d055e68', '403993715531906549', NULL, '2024-07-10 06:39:35'),
(2, 1, 'Vill - Kacharua', 'Guwahati', 781380, 'payu', 1500, 'success', 1, '4542ed04028c21f904a9', '403993715531906561', NULL, '2024-07-10 06:49:25'),
(3, 1, 'Kacharua, Kendukona', 'Guwahati', 781380, 'payu', 1500, 'success', 1, 'd2909554c22076c937b9', '403993715531906595', NULL, '2024-07-10 07:07:44'),
(4, 1, 'Vill - Kacharua', 'Guwahati', 781380, 'payu', 500, 'success', 1, 'b872878fe2e3fafe3176', '403993715531906597', NULL, '2024-07-10 07:11:19'),
(5, 1, 'Kacharua, Kendukona', 'Guwahati', 781380, 'payu', 800, 'success', 1, 'd5a3e5529d4ebf5b75e3', '403993715531906603', NULL, '2024-07-10 07:14:35'),
(6, 1, 'Demo address', 'Demo', 781380, 'payu', 2000, 'pending', 1, 'df208bceaf5539f03b8d', NULL, NULL, '2024-07-11 05:35:10'),
(7, 1, 'Demo address', 'Demo', 781380, 'payu', 2000, 'success', 3, 'aaa50edf5a858e6b43c0', '403993715531914565', NULL, '2024-07-11 05:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 1, 13, 2, 1000),
(2, 2, 6, 1, 1500),
(3, 3, 6, 1, 1500),
(4, 4, 10, 1, 500),
(5, 5, 5, 1, 800),
(6, 6, 13, 2, 1000),
(7, 7, 13, 2, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL,
  `image1` varchar(150) NOT NULL,
  `image2` varchar(150) NOT NULL,
  `image3` varchar(150) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `regular_price` varchar(20) NOT NULL,
  `sell_price` varchar(20) NOT NULL,
  `product_size` varchar(20) NOT NULL,
  `product_color` varchar(20) NOT NULL,
  `category` varchar(20) NOT NULL,
  `subcategory` varchar(20) DEFAULT NULL,
  `status` varchar(30) NOT NULL DEFAULT '0',
  `brand` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `image1`, `image2`, `image3`, `quantity`, `regular_price`, `sell_price`, `product_size`, `product_color`, `category`, `subcategory`, `status`, `brand`, `created_at`) VALUES
(3, 'Apple', 'demo desc\r\n                        ', '../../uploaded-files/product/537ce069689ccaf4253d9d14b25b1eb1.jpeg', '../../uploaded-files/product/fe1698decf2dbc8b7cdf4ae08dbf5759.jpeg', '../../uploaded-files/product/0b34fbb614ab6d987f2501702c712a16.jpeg', '1', '200', '100', 's', 'Red', '54', NULL, '1', 'Kashmiri', '2024-09-22 12:56:08'),
(4, 'Potato', '\r\n                        demo', '../../uploaded-files/product/c2522129d9ac2b52a3494c8b7d05b370.webp', '../../uploaded-files/product/c5ef48dd01e14a588021d6171d59671b.jpeg', '../../uploaded-files/product/c8b601a3ce820036f286a4f5df32a5ef.jpeg', '2', '100', '50', 'L', 'white', '55', NULL, '1', 'Blaze', '2024-09-22 12:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `category`, `created_at`) VALUES
(1, 'Jacket', '53', '2024-07-07 04:48:13'),
(2, 'Jeans', '53', '2024-07-07 04:48:30'),
(3, 'Salwar', '54', '2024-07-07 04:49:07'),
(4, 'Jeans', '55', '2024-07-07 04:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `verification_code` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `verification_code`, `created_at`) VALUES
(1, 'john doe', 'injamul.haque6@gmail.com', '8822677188', 'password123', '', '2024-07-10 16:27:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `available_pincodes`
--
ALTER TABLE `available_pincodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available_pincodes`
--
ALTER TABLE `available_pincodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
