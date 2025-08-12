-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 06, 2024 at 07:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrotools`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `catname`, `created_at`) VALUES
(54, 'Fresh Fruits', '2024-07-06 06:07:00'),
(55, 'AGRO TOOLS', '2024-07-06 06:07:06');

-- --------------------------------------------------------

--
-- Table structure for table `lendings`
--

CREATE TABLE `lendings` (
  `id` int(11) NOT NULL,
  `lending_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `amount` varchar(50) NOT NULL,
  `booking_status` varchar(50) NOT NULL DEFAULT 'Pending',
  `txnid` varchar(50) NOT NULL,
  `payment_id` varchar(50) DEFAULT NULL,
  `payment_mode` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_date` varchar(50) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lendings`
--

INSERT INTO `lendings` (`id`, `lending_id`, `user_id`, `product_id`, `start_date`, `end_date`, `amount`, `booking_status`, `txnid`, `payment_id`, `payment_mode`, `payment_status`, `payment_date`, `booking_date`) VALUES
(1, 'BK67021c3f6ae85', 1, 5, '2024-10-06 00:00:00', '2024-10-07 00:00:00', '200.00', 'Booked', 'Txn993604', NULL, 'online', 'success', '2024-10-06 10:42:31', '2024-10-06 05:12:31'),
(2, 'BK67021d9353305', 1, 6, '2024-10-06 00:00:00', '2024-10-07 00:00:00', '200.00', 'Booked', 'Txn67981809', NULL, 'online', 'success', '2024-10-06 10:48:11', '2024-10-06 05:18:11'),
(3, 'BK67021f8b8c84c', 1, 11, '2024-10-06 00:00:00', '2024-10-07 00:00:00', '200.00', 'Booked', 'Txn19220969', NULL, 'online', 'success', '2024-10-06 10:56:35', '2024-10-06 05:26:35');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `is_lend` int(11) NOT NULL DEFAULT 0,
  `brand` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `image1`, `image2`, `image3`, `quantity`, `regular_price`, `sell_price`, `product_size`, `product_color`, `category`, `subcategory`, `status`, `is_lend`, `brand`, `created_at`) VALUES
(5, 'Farm-Hand-Tools-Chemical-Agriculture-Material', 'Hand-Operated-Manual-Agricultural-Knapsack-Sprayer', '../../uploaded-files/product/7a9967d938b1d7e7874ebd566edd37f7.webp', '../../uploaded-files/product/2df45747e94fe33b2291a4510afcaf49.webp', '../../uploaded-files/product/3d67bf72908bd15951f4c41058728d73.jpg', '10', '550', '450', 'small,large, medium', 'pale red colour', '55', NULL, '1', 0, 'agro', '2024-10-02 06:15:46'),
(6, 'BUY A2 AGRO AGRICULTURAL SPRAYER ', 'BUY A2 AGRO AGRICULTURAL SPRAYER PRO DUAL 222 (BATTERY OPERATED) | BEST PRICE IN INDIA |\r\n                        ', '../../uploaded-files/product/366bca92962ff35701a5e2eb8e53a208.webp', '../../uploaded-files/product/6c8d495cc042e8438ed809c882b3f416.webp', '../../uploaded-files/product/7367fbbc3aa4c31c18ff7c9f0f7a732e.webp', '15 items', '2500', '2350', 'small,large, medium', 'Browny ', '55', NULL, '1', 1, 'agro', '2024-10-03 06:36:02'),
(7, 'Shambhu Agro - Tractor Mounted Boom Sprayer ', '300 L Tank Capacity with 2 Set Stainless Steel Pipe\r\n                        ', '../../uploaded-files/product/9152b32d1898edde385bd03f315acdf5.webp', '../../uploaded-files/product/179a287499c3cd58a5c82c2ef8917024.webp', '../../uploaded-files/product/d7e51a87cc984e97a5f6b87893e983d4.webp', '15 items', '1000', '950', 'small,large, medium', 'blue', '55', NULL, '1', 0, 'agro', '2024-10-03 06:44:39'),
(8, 'Tractor cultivator', ' duck foot heavy duty rigid farm\r\n                        ', '../../uploaded-files/product/b44cfcef7cf1b6c0478bcb7bb92b492c.jpeg', '../../uploaded-files/product/306798e430c3d0a9dac2056f2bdf7405.jpeg', '../../uploaded-files/product/7ac0beb5fbb0d16fdf34b3da686a271e.jpeg', '15 items', '1000', '950', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 06:48:10'),
(9, 'Cultivator Mini Spring Loaded', 'Cultivator Mini Spring Loaded        ', '../../uploaded-files/product/3bc3b83930ec68bbdcfaa38691b99f7d.jpg', '../../uploaded-files/product/15467dd51f57f3029980a0bd1da9f9c5.jpg', '../../uploaded-files/product/6bab9184c046bcf979eaead51d1c75f0.jpg', '15 items', '550', '450', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 06:49:59'),
(10, 'Manual Hand Operated Seed Drill', 'Buy the Best Seed Drill for Sale - \r\n                        ', '../../uploaded-files/product/dea906a6b58b9e7b8cf4a4ccc7d2119d.webp', '../../uploaded-files/product/997fdb628fb816c9e2b0c64940ecd4c4.webp', '../../uploaded-files/product/a375e26328c3157431f5162588697759.webp', '15 items', '550', '450', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 06:51:30'),
(11, 'Mild Steel Seed Drill Cultivator,', 'Mild Steel Seed Drill Cultivator,\r\n                        ', '../../uploaded-files/product/04a104cec621f4b1bf365fdf47500778.jpg', '../../uploaded-files/product/44a3cfd88a5255da438bbed45ee05a37.jpg', '../../uploaded-files/product/e8f7ebc1a6de4e24cceb3b8749ce03d7.jpg', '15 items', '1000', '950', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 1, 'agro', '2024-10-03 06:53:41'),
(12, 'Hydraulic Dump Silo Corn Harvesting Equipment Small Combined Harvest Tractor', 'Hydraulic Dump Silo Corn Harvesting Equipment Small Combined Harvest Tractor            ', '../../uploaded-files/product/58f2eac415d51c2ac39db985ecb2d75b.webp', '../../uploaded-files/product/3c2cefc58e9808ea65e6c2b064e44b0a.webp', '../../uploaded-files/product/b3c35cb1aa90dd84174dd9348818cbcc.webp', '15 items', '1000', '950', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 06:56:53'),
(13, ' HEXACOPTER-DRONE', ' HEXACOPTER\r\n                        ', '../../uploaded-files/product/cb2ffd63ae4fba9c7c6d326f00ed9a67.jpg', '../../uploaded-files/product/fd03532db29c53bbddfa8d9155f28963.jpg', '../../uploaded-files/product/d08b1be16d7b4b6b0d626a6cd2f9189b.jpg', '15 items', '2500', '2350', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:10:00'),
(14, 'Multi-function and High-output Organic Fertilizer Compost Turner', 'Multi-function and High-output Organic Fertilizer Compost Turner\r\n                        ', '../../uploaded-files/product/b69f02d9cec31454ac2e369741003d97.jpg', '../../uploaded-files/product/eeeeba89910264c2ff73523a94b60d64.jpg', '../../uploaded-files/product/cc5ea171f876f164da3465b92a2b7d46.jpg', '15 items', '1000', '950', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:14:16'),
(15, 'Powerful Electric Post Hole Digger', 'Powerful Electric Post Hole Digger\r\n                        ', '../../uploaded-files/product/b4b349aa14c72cd13bfab170ef4c1cf5.webp', '../../uploaded-files/product/3847d6c0a8093dc32e75fbadea9483c9.webp', '../../uploaded-files/product/d290bdcd65a2f4423a139a586cfade8a.webp', '10', '1000', '950', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:16:23'),
(16, 'Soil Testing Kits for Agriculture and Amenity', 'Soil Testing Kits for Agriculture and Amenity\r\n                        ', '../../uploaded-files/product/eaadcdd0f3bec1ae46d30b9612b7b200.jpeg', '../../uploaded-files/product/8c7ec1ff500e3f60385685f9925d22f4.jpeg', '../../uploaded-files/product/7ea923b46008e8541ecd6ef720b7cdc4.jpeg', '15 items', '1000', '950', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:19:04'),
(17, 'Rapid Soil Testing Kit', 'Rapid Soil Testing Kit\r\n                        ', '../../uploaded-files/product/815c50b914121ee6b4294c199150d642.jpeg', '../../uploaded-files/product/f5b69d6b981056ba5895e266be042a37.jpeg', '../../uploaded-files/product/e43df5e3768db326ef5f596e52155248.jpeg', '15 items', '1000', '950', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:22:09'),
(18, ' Hand-Held Gardening Rotary Tiller', 'Tiller handled\r\n                        ', '../../uploaded-files/product/9ad979ce4937fcd4bb436d00fc1d68d9.jpg', '../../uploaded-files/product/cebde1e620c84c4d834413b447c2a26e.jpg', '../../uploaded-files/product/b4808ecc01565fd5027485757c41c7ee.jpg', '15 items', '1000', '950', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:27:11'),
(19, 'Seed Driller', 'Seed Driller\r\n                        ', '../../uploaded-files/product/50a2d518c5db27227fc5dfaca924132a.webp', '../../uploaded-files/product/9d72ffa6644fc852d0f703715d82c75e.webp', '../../uploaded-files/product/1d7fb0ed460bfbc4c9ed35599ad989fd.webp', '10', '550', '450', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:30:40'),
(20, 'Pruning Shears', 'Pruning Shears\r\n                        ', '../../uploaded-files/product/c21146ce1621dac5559a018129d82912.webp', '../../uploaded-files/product/37f19a14ad22d6b36d2d9cd2fdbf0bdd.webp', '../../uploaded-files/product/b1492a519c9f2d9f19b36e3c78eaf460.webp', '15 items', '1000', '950', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:35:11'),
(21, 'Glitzhome Portable Aluminum Garden Hose Reel Cart ', 'Glitzhome Portable Aluminum Garden Hose Reel Cart \r\n                        ', '../../uploaded-files/product/ff97a0f10d5cca553a6b2d03b7854497.webp', '../../uploaded-files/product/ac957899c5639ac71041c16afdbcb170.webp', '../../uploaded-files/product/32c8aa03f537b0ab7a78e2fc578596b0.webp', '15 items', '1000', '950', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:38:56'),
(22, 'Gardening Fork', 'Gardening Fork\r\n                        ', '../../uploaded-files/product/043fce4ea623e42e5a869c16e434d250.webp', '../../uploaded-files/product/205567683f94bfdb4ef7f31f6f74437a.webp', '../../uploaded-files/product/8a097ae631630cf3e13bc06d869ed1b9.webp', '15 items', '550', '450', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:40:33'),
(23, 'TAPAS HAND WEEDER', 'TAPAS HAND WEEDER\r\n                        ', '../../uploaded-files/product/fd195218fec8df5fbf23818121bd8f6f.jpg', '../../uploaded-files/product/68dd7764063b7fae3e22051af3e15b4e.jpg', '../../uploaded-files/product/b3523816b41f0a31acfb248aa86615ab.jpg', '10', '550', '450', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:42:29'),
(24, 'Stainless Steel Agriculture Hand Sickle, Size: 2 Feet ', 'Stainless Steel Agriculture Hand Sickle, Size: 2 Feet \r\n                        ', '../../uploaded-files/product/81ebfd9019044eef4a7c8fc4abe8cff5.jpg', '../../uploaded-files/product/a6eaa227af7a5ed83438327925f12cbe.jpg', '../../uploaded-files/product/04ef2a38db4861573970d5adede9ea70.jpg', '15 items', '250', '200', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:44:34'),
(25, 'Soil Moisture Meter', 'Soil Moisture Meter\r\n                        ', '../../uploaded-files/product/01fc897b779be96e30fcc392ab16ce1c.webp', '../../uploaded-files/product/a9cae13fa947285f96ea53e58fb8c1cb.webp', '../../uploaded-files/product/147b31e518eba53f22b32f1825dd9568.webp', '15 items', '250', '200', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:47:56'),
(26, 'Crop Cover', 'Crop Cover\r\n                        ', '../../uploaded-files/product/996a05bad3a2770dc99cd6630e233518.jpg', '../../uploaded-files/product/f476e83d9bb56362b85f149e63790a6a.jpg', '../../uploaded-files/product/2766a4fa5ab03fbab9d09c71ea86f255.jpg', '10', '250', '200', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:50:12'),
(27, 'Lesco High Wheel Fertilizer Spreader with Manual Deflector', 'Lesco High Wheel Fertilizer Spreader with Manual Deflector                ', '../../uploaded-files/product/80c9e54167985c3e40f1102c961022c7.jpg', '../../uploaded-files/product/9eeaeec7015b8bf038e1b9c9d32f9750.jpg', '../../uploaded-files/product/9e57ac36af421fe3de83d70a627c65bc.jpg', '15 items', '550', '450', 'small,large, medium', 'violet,green,white', '55', NULL, '1', 0, 'agro', '2024-10-03 07:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `name`, `email`, `rating`, `review`, `created_at`) VALUES
(1, 26, 'demo', 'demo@email.com', 3, 'demo', '2024-10-04 17:47:15'),
(2, 26, 're', 'demo@email.co', 5, 'er', '2024-10-04 17:53:06'),
(3, 5, 'er', 'example@email.com', 4, 'er', '2024-10-04 17:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `lendings`
--
ALTER TABLE `lendings`
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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
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
-- AUTO_INCREMENT for table `lendings`
--
ALTER TABLE `lendings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
