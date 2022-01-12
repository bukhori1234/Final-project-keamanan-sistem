-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 09:25 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rarp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `admin_name` varchar(25) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_telp` varchar(25) NOT NULL,
  `admin_addres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_addres`) VALUES
(1, 'Admin Fashion House', 'adminFH', '$2y$15$y3DJx8je9pT5TZ7Jio5vH.HV/oOhTKSlZKlQiFPSCQYvBtq06dwrm', '083492742932', 'Jl. Nangka No.31');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Baju'),
(2, 'Hoodie'),
(5, 'Topi'),
(6, 'Celana');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(5) NOT NULL,
  `category_id` int(5) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` int(15) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_desc`, `product_image`, `product_status`, `date_created`) VALUES
(3, 1, 'Baju Lets Play', 100000, ' Jual aja nih Lagi BU', 'produk1623081923.png', 1, '2021-06-07 16:05:23'),
(4, 1, 'Baju stay cool', 100000, ' beli dong BU nih', 'produk1623081992.png', 1, '2021-06-07 16:06:32'),
(7, 2, 'Hooodie Hitam Polos', 150000, ' ntap', 'produk1623113563.jpg', 1, '2021-06-08 00:52:43'),
(8, 2, 'Hoodie Kuning', 150000, ' keren', 'produk1623113619.jpg', 1, '2021-06-08 00:53:39'),
(9, 2, 'Hoodie Polos Abu', 150000, ' beli nih', 'produk1623113687.jpg', 1, '2021-06-08 00:54:47'),
(10, 2, 'Hoodie Putih Polos', 150000, ' keren', 'produk1623113717.jpg', 1, '2021-06-08 00:55:18'),
(11, 5, 'Topi Hitam Polos', 50000, ' yuk beli', 'produk1623113766.jpg', 1, '2021-06-08 00:56:06'),
(12, 5, 'Topi Putih NY', 50000, ' nih dari New York Aseli', 'produk1623113809.jpg', 1, '2021-06-08 00:56:49'),
(13, 5, 'Topi Hitam Jepang', 50000, ' Ini dari jepun', 'produk1623113842.jpg', 1, '2021-06-08 00:57:22'),
(15, 1, 'Baju Forest', 1000000, 'import dari iceland', 'produk1623113968.png', 1, '2021-06-08 00:59:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
