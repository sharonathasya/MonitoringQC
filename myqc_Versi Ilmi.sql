-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Agu 2021 pada 06.54
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

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
-- Struktur dari tabel `b_material`
--

CREATE TABLE `b_material` (
  `material_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `b_material`
--

INSERT INTO `b_material` (`material_id`, `name`, `supplier_id`, `created`, `updated`) VALUES
(2, 'Material ASS Diameter 5mm', 1, '2021-07-31 22:29:15', '2021-07-31 17:41:07'),
(4, 'Besil L 1inch', 2, '2021-08-10 13:31:15', NULL),
(5, 'Plafon Asbes tebal 3mm', 1, '2021-08-10 13:31:51', NULL),
(6, 'Kayu Glugu 10m', 2, '2021-08-10 13:33:08', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `b_product`
--

CREATE TABLE `b_product` (
  `product_id` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `b_product`
--

INSERT INTO `b_product` (`product_id`, `name`, `customer_id`, `image`, `created`, `updated`) VALUES
('18302-HAJA-N000-H1', 'Guard Exh Pipe', 3, 'product-210801-da61d1f0e8.png', '2021-07-31 21:54:21', '2021-08-01 09:42:32'),
('5BP-F7246-00', 'Hook', 2, 'product-210801-e52c9ae28b.png', '2021-08-01 00:26:26', '2021-08-01 06:44:20'),
('5TP-F6131-00', 'Guide Wire 5TP', 2, 'product-210801-0e4ddde0ec.png', '2021-08-01 11:04:31', '2021-08-01 06:51:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
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
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'PT TS Tech Indonesia', '0264350560', 'Cikarang Selatan, Bekasi', '2021-07-14 16:38:05', '2021-07-28 18:11:05'),
(2, 'PT Metindo Era Sakti', '(021)8250418', 'Bantargebang, Bekasi', '2021-07-14 16:38:05', NULL),
(3, 'PT Rachmat Perdana Adhimetal', '(021)4603441', 'Cakung, Jakarta Timur', '2021-07-27 16:02:51', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
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
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'PT Mount Zugspitze', '(021)89117845', 'Cikarang Selatan, Bekasi', '2021-07-14 16:18:09', '2021-07-28 18:09:23'),
(2, 'PT Camellia Metal Indonesia', '(021)29612091', 'Cikarang Pusat, Bekasi', '2021-07-14 16:18:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_material`
--

CREATE TABLE `t_material` (
  `t_material_id` varchar(11) NOT NULL,
  `date` date NOT NULL,
  `material_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ok` int(11) DEFAULT NULL,
  `reject` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_material`
--

INSERT INTO `t_material` (`t_material_id`, `date`, `material_id`, `supplier_id`, `jumlah`, `ok`, `reject`, `status`, `image`, `created`, `updated`) VALUES
('MM001', '2021-08-08', 2, 2, 500, 0, 0, 0, NULL, '2021-08-02 15:35:11', '2021-08-08 11:34:22'),
('MM002', '2021-08-08', 2, 1, 901, 900, 1, 0, 't_material-210807-cb35859a0c.jpg', '2021-08-02 14:52:45', '2021-08-08 11:34:12'),
('MM003', '2021-08-08', 2, 1, 450, 400, 100, 1, 't_material-210808-a81f5fb6e8.jpeg', '2021-08-03 21:05:21', '2021-08-08 17:01:40'),
('MM004', '2021-08-03', 2, 1, 500, 0, 0, 1, NULL, '2021-08-08 22:01:57', '2021-08-08 17:04:31'),
('MM005', '2021-08-10', 4, 2, 250, 0, 0, 1, NULL, '2021-08-10 13:34:46', '2021-08-10 08:35:41'),
('MM006', '2021-08-10', 5, 2, 100, 0, 0, 1, NULL, '2021-08-10 13:35:19', '2021-08-10 08:35:49'),
('MM007', '2021-08-10', 6, 2, 100, 0, 0, 1, NULL, '2021-08-10 13:37:38', NULL),
('MM008', '2021-08-03', 4, 2, 500, 0, 0, 1, NULL, '2021-08-03 22:01:57', '2021-08-03 17:04:31'),
('MM009', '2021-08-08', 5, 2, 500, 0, 0, 0, NULL, '2021-08-02 15:35:11', '2021-08-08 11:34:22'),
('MM010', '2021-08-08', 4, 1, 901, 900, 1, 0, 't_material-210807-cb35859a0c.jpg', '2021-08-02 14:52:45', '2021-08-08 11:34:12'),
('MM011', '2021-08-08', 6, 1, 450, 400, 100, 1, 't_material-210808-a81f5fb6e8.jpeg', '2021-08-03 21:05:21', '2021-08-08 17:01:40'),
('MM012', '2021-07-10', 5, 2, 100, 0, 0, 1, NULL, '2021-08-10 13:35:19', '2021-08-10 08:35:49'),
('MM013', '2021-07-10', 6, 2, 100, 0, 0, 1, NULL, '2021-08-10 13:37:38', NULL),
('MM014', '2021-07-10', 4, 2, 250, 0, 0, 1, NULL, '2021-08-10 13:34:46', '2021-08-10 08:35:41'),
('MM015', '2021-07-08', 4, 1, 901, 900, 1, 0, 't_material-210807-cb35859a0c.jpg', '2021-08-02 14:52:45', '2021-08-08 11:34:12'),
('MM016', '2021-07-08', 5, 2, 500, 0, 0, 0, NULL, '2021-08-02 15:35:11', '2021-08-08 11:34:22'),
('MM017', '2021-07-08', 2, 2, 500, 0, 0, 0, NULL, '2021-08-02 15:35:11', '2021-08-08 11:34:22'),
('MM018', '2021-07-08', 2, 1, 450, 400, 100, 1, 't_material-210808-a81f5fb6e8.jpeg', '2021-08-03 21:05:21', '2021-08-08 17:01:40'),
('MM019', '2021-07-08', 2, 1, 901, 900, 1, 0, 't_material-210807-cb35859a0c.jpg', '2021-08-02 14:52:45', '2021-08-08 11:34:12'),
('MM020', '2021-07-08', 6, 1, 450, 400, 100, 1, 't_material-210808-a81f5fb6e8.jpeg', '2021-08-03 21:05:21', '2021-08-08 17:01:40'),
('MM021', '2021-07-03', 2, 1, 500, 0, 0, 1, NULL, '2021-08-08 22:01:57', '2021-08-08 17:04:31'),
('MM022', '2021-07-03', 4, 2, 500, 0, 0, 1, NULL, '2021-08-03 22:01:57', '2021-08-03 17:04:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_product`
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
-- Dumping data untuk tabel `t_product`
--

INSERT INTO `t_product` (`t_product_id`, `date`, `product_id`, `customer_id`, `jumlah`, `ok`, `ng`, `operator`, `status`, `image`, `created`, `updated`) VALUES
('PRD00001', '2021-08-07', '18302-HAJA-N000-H1', 3, 1000, 990, 10, 'Dadang', 1, 't_product-210807-d5331a5b41.jpeg', '2021-08-03 22:46:03', '2021-08-07 10:50:15'),
('PRD00002', '2021-08-08', '5BP-F7246-00', 2, 600, 0, 0, 'Budi', 1, NULL, '2021-08-08 17:32:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'quality', '4ff18f00176f0f2b3ae5477d5c64490c7a748808', 'Ahmad', 'Tambun, Bekasi', 1),
(2, 'gudang', 'a80dd043eb5b682b4148b9fc2b0feabb2c606fff', 'Bambang', 'Tambun, Bekasi', 2),
(3, 'produksi', '6e3bf9569d685dc740285417951b943b2452c2b5', 'Rohim', 'Bekasi', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `b_material`
--
ALTER TABLE `b_material`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indeks untuk tabel `b_product`
--
ALTER TABLE `b_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `t_material`
--
ALTER TABLE `t_material`
  ADD PRIMARY KEY (`t_material_id`),
  ADD KEY `material_id` (`material_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indeks untuk tabel `t_product`
--
ALTER TABLE `t_product`
  ADD PRIMARY KEY (`t_product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `b_material`
--
ALTER TABLE `b_material`
  MODIFY `material_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `b_material`
--
ALTER TABLE `b_material`
  ADD CONSTRAINT `b_material_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Ketidakleluasaan untuk tabel `b_product`
--
ALTER TABLE `b_product`
  ADD CONSTRAINT `b_product_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Ketidakleluasaan untuk tabel `t_material`
--
ALTER TABLE `t_material`
  ADD CONSTRAINT `t_material_ibfk_1` FOREIGN KEY (`material_id`) REFERENCES `b_material` (`material_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_material_ibfk_3` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`supplier_id`);

--
-- Ketidakleluasaan untuk tabel `t_product`
--
ALTER TABLE `t_product`
  ADD CONSTRAINT `t_product_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `t_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `b_product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
