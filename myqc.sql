-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2021 at 02:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myqc`
--

-- --------------------------------------------------------

--
-- Table structure for table `b_material`
--

CREATE TABLE `b_material` (
  `material_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `b_material`
--

INSERT INTO `b_material` (`material_id`, `name`, `supplier_id`, `created`, `updated`) VALUES
(2, 'Material ASS Diameter 5mm', 1, '2021-07-31 22:29:15', '2021-07-31 17:41:07'),
(4, 'Material ASS Diameter 6mm', 1, '2021-08-17 12:46:29', NULL),
(5, 'Material ASS Diameter 7mm', 1, '2021-08-17 12:47:05', NULL),
(6, 'Material ASS Diameter 8mm', 1, '2021-08-17 12:47:14', NULL),
(7, 'Material ASS Diameter 4mm', 4, '2021-08-17 12:48:38', NULL),
(8, 'Material ASS Diameter 5mm', 2, '2021-08-17 12:49:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cacat_gudang`
--

CREATE TABLE `cacat_gudang` (
  `gudang_cacat_id` int(11) NOT NULL,
  `t_gudang_id` varchar(11) NOT NULL,
  `cacat_id` varchar(20) NOT NULL,
  `jumlah_cacat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cacat_gudang`
--

INSERT INTO `cacat_gudang` (`gudang_cacat_id`, `t_gudang_id`, `cacat_id`, `jumlah_cacat`) VALUES
(1, 'GDC002', 'RJ001', 3),
(2, 'GDC002', 'RJ002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cacat_masuk`
--

CREATE TABLE `cacat_masuk` (
  `material_reject_id` int(11) NOT NULL,
  `t_material_id` varchar(11) NOT NULL,
  `cacat_id` varchar(20) NOT NULL,
  `jumlah_reject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cacat_masuk`
--

INSERT INTO `cacat_masuk` (`material_reject_id`, `t_material_id`, `cacat_id`, `jumlah_reject`) VALUES
(1, 'MM007', 'RJ001', 30),
(2, 'MM007', 'RJ002', 20),
(3, 'MM007', 'RJ005', 25),
(4, 'MM007', 'RJ004', 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'PT TS Tech Indonesia', '0264350560', 'Cikarang Selatan, Bekasi', '2021-07-14 16:38:05', '2021-07-28 18:11:05'),
(2, 'PT Metindo Era Sakti', '(021)8250418', 'Bantargebang, Bekasi', '2021-07-14 16:38:05', NULL),
(3, 'PT Rachmat Perdana Adhimetal', '(021)4603441', 'Cakung, Jakarta Timur', '2021-07-27 16:02:51', NULL),
(4, 'PT Intipolymetal', '(021)4615908', 'Cakung, Jakarta Timur', '2021-08-17 12:43:30', NULL),
(5, 'PT Mada Wikri ', '(021)8973483', 'Cikarang Selatan, Bekasi', '2021-08-17 12:44:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cacat`
--

CREATE TABLE `jenis_cacat` (
  `cacat_id` varchar(20) NOT NULL,
  `jenis_cacat` varchar(100) NOT NULL,
  `penyebab` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_cacat`
--

INSERT INTO `jenis_cacat` (`cacat_id`, `jenis_cacat`, `penyebab`, `created`, `updated`) VALUES
('RJ001', 'Rusty', 'Terkena Air', '2021-07-31 21:54:21', '2021-08-19 16:24:29'),
('RJ002', 'Deform', 'Cara Penyimpanan Salah', '2021-08-01 11:04:31', '2021-08-19 16:25:49'),
('RJ003', 'Burry', 'Kesalahan Cutting', '2021-08-01 00:26:26', '2021-08-19 16:26:17'),
('RJ004', 'Scratch', 'Terkena Goresan Saat Memindahkan Bahan Baku', '2021-08-19 21:30:24', '2021-08-19 16:56:28'),
('RJ005', 'Panjang Tidak Sesuai', 'Panjang Tidak Sesuai Pesanan', '2021-08-19 21:30:56', NULL),
('RJ006', 'Diameter Tidak Sesuai', 'Diameter Tidak Sesuai Pesanan', '2021-08-19 21:31:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'PT Mount Zugspitze', '(021)89117845', 'Cikarang Selatan, Bekasi', '2021-07-14 16:18:09', '2021-07-28 18:09:23'),
(2, 'PT Camellia Metal Indonesia', '(021)29612091', 'Cikarang Pusat, Bekasi', '2021-07-14 16:18:09', NULL),
(4, 'PT Yang Mandiri Utama Sukses', '(021)8673075', 'Bogor, Jawa Barat', '2021-08-17 12:41:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_gudang`
--

CREATE TABLE `t_gudang` (
  `t_gudang_id` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `no_lot` varchar(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `jumlah_masalah` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_gudang`
--

INSERT INTO `t_gudang` (`t_gudang_id`, `date`, `no_lot`, `material_id`, `jumlah_masalah`, `status`, `created`, `updated`) VALUES
('GDC001', '2021-08-21', '02.09.2020', 2, 7, 1, '2021-08-21 09:54:20', '2021-08-21 05:04:06'),
('GDC002', '2021-08-22', '12.10.2020', 4, 4, 0, '2021-08-22 14:28:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_material`
--

CREATE TABLE `t_material` (
  `t_material_id` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `material_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `panjang` varchar(100) NOT NULL,
  `diameter` int(1) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ok` int(11) DEFAULT NULL,
  `reject` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_material`
--

INSERT INTO `t_material` (`t_material_id`, `date`, `material_id`, `supplier_id`, `panjang`, `diameter`, `jumlah`, `ok`, `reject`, `status`, `image`, `created`, `updated`) VALUES
('MM001', '2020-08-27', 2, 1, '3000mm', 1, 1578, 1578, 0, 1, 't_material-210817-7ec08c9d48.jpg', '2021-08-17 12:54:05', '2021-08-20 23:47:30'),
('MM0012', '2021-09-09', 6, 2, '3000mm', 1, 500, 0, 0, 1, NULL, '2021-09-09 11:48:19', NULL),
('MM002', '2020-08-27', 4, 1, '3000mm', 1, 1630, 1630, 0, 1, 't_material-210817-17aabf08f4.jpg', '2021-08-17 12:54:54', '2021-08-20 23:47:19'),
('MM003', '2020-08-27', 6, 1, '3000mm', 1, 834, 834, 0, 1, 't_material-210817-c16a61c403.jpg', '2021-08-17 12:55:45', '2021-08-20 23:47:09'),
('MM004', '2020-10-06', 6, 1, '3000mm', 1, 416, 416, 0, 1, NULL, '2021-08-17 13:02:57', '2021-08-20 23:46:58'),
('MM005', '2020-10-06', 4, 1, '3000mm', 1, 740, 740, 0, 1, NULL, '2021-08-17 13:03:32', '2021-08-20 23:46:49'),
('MM006', '2020-10-06', 2, 1, '3000mm', 1, 3158, 3158, 0, 1, NULL, '2021-08-17 13:04:13', '2021-08-20 23:46:35'),
('MM007', '2021-08-17', 7, 4, '3000mm', 0, 1375, 1300, 75, 1, NULL, '2021-08-17 14:43:37', '2021-08-20 23:45:06'),
('MM008', '2021-08-17', 8, 2, '3000mm', 1, 1200, 0, 0, 1, NULL, '2021-08-17 14:44:23', '2021-08-20 23:43:05'),
('MM009', '2021-09-17', 4, 2, '3000mm', 1, 600, 0, 0, 1, NULL, '2021-09-17 11:46:46', '2021-09-17 06:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE `t_product` (
  `t_product_id` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `product_id` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ok` int(11) DEFAULT NULL,
  `ng` int(11) DEFAULT NULL,
  `operator` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t_product`
--

INSERT INTO `t_product` (`t_product_id`, `date`, `product_id`, `customer_id`, `jumlah`, `ok`, `ng`, `operator`, `status`, `image`, `created`, `updated`) VALUES
('PRD00001', '2021-08-07', 'RJ001', 3, 1000, 990, 10, 'Dadang', 1, 't_product-210807-d5331a5b41.jpeg', '2021-08-03 22:46:03', '2021-08-07 10:50:15'),
('PRD00002', '2021-08-08', 'RJ003', 2, 600, 550, 50, 'Budi', 1, NULL, '2021-08-08 17:32:10', '2021-08-18 06:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL COMMENT '1:quality, 2:gudang, 3:produksi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'quality', '4ff18f00176f0f2b3ae5477d5c64490c7a748808', 'Ahmad', 'Tambun, Bekasi', 1),
(2, 'gudang', 'a80dd043eb5b682b4148b9fc2b0feabb2c606fff', 'Bambang', 'Tambun, Bekasi', 2),
(4, 'anni1', 'e4f390b9135d1a13193fa40c5ccdd3180a1fbb2b', 'anni', '\r\n', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `b_material`
--
ALTER TABLE `b_material`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `cacat_gudang`
--
ALTER TABLE `cacat_gudang`
  ADD PRIMARY KEY (`gudang_cacat_id`),
  ADD KEY `cacat_id` (`cacat_id`),
  ADD KEY `cacat_gudang_ibfk_1` (`t_gudang_id`);

--
-- Indexes for table `cacat_masuk`
--
ALTER TABLE `cacat_masuk`
  ADD PRIMARY KEY (`material_reject_id`),
  ADD KEY `t_material_id` (`t_material_id`),
  ADD KEY `cacat_id` (`cacat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `jenis_cacat`
--
ALTER TABLE `jenis_cacat`
  ADD PRIMARY KEY (`cacat_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `t_gudang`
--
ALTER TABLE `t_gudang`
  ADD PRIMARY KEY (`t_gudang_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `t_material`
--
ALTER TABLE `t_material`
  ADD PRIMARY KEY (`t_material_id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`t_product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `b_material`
--
ALTER TABLE `b_material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cacat_gudang`
--
ALTER TABLE `cacat_gudang`
  MODIFY `gudang_cacat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cacat_masuk`
--
ALTER TABLE `cacat_masuk`
  MODIFY `material_reject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `b_material`
--
ALTER TABLE `b_material`
  ADD CONSTRAINT `b_material_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Constraints for table `cacat_gudang`
--
ALTER TABLE `cacat_gudang`
  ADD CONSTRAINT `cacat_gudang_ibfk_1` FOREIGN KEY (`t_gudang_id`) REFERENCES `t_gudang` (`t_gudang_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cacat_gudang_ibfk_2` FOREIGN KEY (`cacat_id`) REFERENCES `jenis_cacat` (`cacat_id`);

--
-- Constraints for table `cacat_masuk`
--
ALTER TABLE `cacat_masuk`
  ADD CONSTRAINT `cacat_masuk_ibfk_1` FOREIGN KEY (`t_material_id`) REFERENCES `t_material` (`t_material_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cacat_masuk_ibfk_2` FOREIGN KEY (`cacat_id`) REFERENCES `jenis_cacat` (`cacat_id`);

--
-- Constraints for table `t_gudang`
--
ALTER TABLE `t_gudang`
  ADD CONSTRAINT `t_gudang_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `b_material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_material`
--
ALTER TABLE `t_material`
  ADD CONSTRAINT `t_material_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `b_material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_material_ibfk_3` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Constraints for table `t_product`
--
ALTER TABLE `t_product`
  ADD CONSTRAINT `t_product_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `t_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `jenis_cacat` (`cacat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
