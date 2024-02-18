-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 11:59 AM
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
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` text NOT NULL,
  `meta_title` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(21, 'Laptop', 'Laptop', 's', 1, 0, 'laptop.jpg', 'Hi', 'x', 'x', '2023-11-14 04:47:11'),
(22, 'Cricket', 'Cricket', 'q', 1, 0, 'cricket.jpeg', 'Hi', 's', 'x', '2023-11-14 04:50:25'),
(23, 'Mobile', 'Mobile', 'q', 1, 0, 'mobile1.jpg', 'Hi', 's', 's', '2023-11-14 04:51:04'),
(24, 'Book', 'Book', '1', 0, 0, 'book.jpg', 'Hi', 'q', 'q', '2023-11-14 04:51:48'),
(25, 'Football', 'catering', '1', 1, 1, 'football.jpg', 'Hi', 'a', 'z', '2023-11-14 04:52:26'),
(28, 'cbcb', 'dgdg', 'dfdfd', 1, 1, 'play.jpeg', 'djdh', 'dtjedtj', 'fhjfj', '2023-12-15 05:56:48');

-- --------------------------------------------------------

--
-- Table structure for table `product1998`
--

CREATE TABLE `product1998` (
  `pid` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `long_description` longtext NOT NULL,
  `price` varchar(191) NOT NULL,
  `qty` varchar(191) NOT NULL,
  `trending` tinyint(4) NOT NULL DEFAULT 0,
  `selling_price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product1998`
--

INSERT INTO `product1998` (`pid`, `category_id`, `name`, `small_description`, `long_description`, `price`, `qty`, `trending`, `selling_price`, `status`, `created_at`, `image`, `slug`) VALUES
(8, 21, 'Asus vivobook16X', 'ASUS Vivobook 16X Ryzen 5 Hexa Core R5-5600H - (16 GB/512 GB SSD/Windows 11 Home) M1603QA-MB511WS Laptop  (16 inch, Quiet Blue, 1.8 kg, With MS Office)', 'General\r\nSales Package\r\nLaptop, Adaptor & Manual\r\nModel Number\r\nM1603QA-MB511WS\r\nPart Number\r\n90NB0Y81-M002D0\r\nModel Name\r\nM1603QA-MB511WS\r\nSeries\r\nVivobook 16X\r\nColor\r\nQuiet Blue\r\nType\r\nLaptop\r\nSuitable For\r\nProcessing & Multitasking, Everyday Use, Entertainment, Performance\r\nBattery Backup\r\nUpto 6 Hrs.\r\nBattery Cell\r\n3 cell\r\nMS Office Provided\r\nYes', '49000', '991', 1, 52000, 1, '2023-10-31 09:47:29', 'asus 2.jpg', 'Laptop'),
(9, 21, 'laptop 1', 'laptop', 'laptop', '60000', '9989', 0, 0, 0, '2023-10-31 12:40:49', 'laptop.jpg', 'Laptop'),
(10, 21, 'ThinkPad E15 Gen 4 (15, Intel)', 'High-performance, fuss-free, durable 39.6cms (15.6) business laptop\r\nPowered by up to 12th Gen Intel® Core™ processors & optional discrete graphics', 'Processor\r\n12th Generation Intel® Core™ i3-1215U Processor (E-cores up to 3.30 GHz P-cores up to 4.40 GHz)\r\n\r\nOperating System\r\nWindows 11 Home Single Language 64 (English)\r\n\r\nDisplay Type\r\n39.62cms (15.6) FHD (1920 x 1080), TN, Anti-Glare, Non-Touch, 250 Nits\r\n\r\nMemory\r\n8 GB Soldered DDR4 3200MHz\r\n\r\nHard Drive\r\n512 GB SSD M.2 2242 PCIe Gen4\r\n\r\nOptical Drive\r\nNone\r\n\r\nWarranty\r\n3 Year Premier', '48490', '91', 0, 50000, 1, '2023-11-03 05:41:46', 'thinkpad.jpg', 'Laptop'),
(13, 22, 'Bat and Ball', 'a', 's', '234', '200', 0, 200, 1, '2023-11-22 08:10:30', 'cricket.jpeg', 'Cricket');

-- --------------------------------------------------------

--
-- Table structure for table `product_quantity`
--

CREATE TABLE `product_quantity` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `username` varchar(191) NOT NULL,
  `price` varchar(191) NOT NULL,
  `prod_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `pin_code` varchar(10) NOT NULL,
  `address` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_quantity`
--

INSERT INTO `product_quantity` (`id`, `user_id`, `product_id`, `product_qty`, `created_at`, `username`, `price`, `prod_name`, `email`, `phone`, `pin_code`, `address`, `status`) VALUES
(37, 9, 10, 9, '2023-11-03 09:08:41', 'Mohit Soni', '48490', 'ThinkPad E15 Gen 4 (15, Intel)', '27mohitsoni@gmail.com', '2345', '45678', 'Raipur', 2),
(39, 9, 5, 4, '2023-11-13 14:11:00', 'Kamlesh Patel', '123', 'Cricket', 'kamleshp52170@gmail.com', '1234', '12345', 'asdf', 0),
(40, 6, 8, 3, '2023-11-14 10:10:21', 'Kamlesh Patel', '49000', 'Asus vivobook16X', 'kamleshp52170@gmail.com', '1234', '1122', 'a', 1),
(41, 6, 9, 2, '2023-11-14 10:43:14', 'Mohit Soni', '60000', 'laptop 1', '27mohitsoni@gmail.com', '1234', '122', 'ww', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `cid` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_as` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`cid`, `name`, `email`, `phone`, `password`, `created_at`, `role_as`) VALUES
(6, 'user 2', 'user@example.com', '1234567890', 'qwertyui', '2023-10-28 12:06:34', 0),
(7, 'yogendra', 'ykp1221@gmail.com', '2345', 'asdfghjk', '2023-10-28 12:07:57', 1),
(8, 'Kamlesh Patel', 'kamleshp52170@gmail.com', '8319277348', '12345678', '2023-10-28 12:09:33', 1),
(16, 'kamlesh', 'example@gmail.com', '2345123456', '1', '2023-11-24 17:52:02', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product1998`
--
ALTER TABLE `product1998`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_quantity`
--
ALTER TABLE `product_quantity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product1998`
--
ALTER TABLE `product1998`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_quantity`
--
ALTER TABLE `product_quantity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product1998`
--
ALTER TABLE `product1998`
  ADD CONSTRAINT `product1998_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
