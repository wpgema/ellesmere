-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 31, 2025 at 12:56 PM
-- Server version: 8.0.42
-- PHP Version: 8.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbfinancialnote`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `kode_customer` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employes`
--

CREATE TABLE `employes` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` int NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenditures`
--

CREATE TABLE `expenditures` (
  `id` int NOT NULL,
  `type` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `amount` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expenditures`
--

INSERT INTO `expenditures` (`id`, `type`, `description`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(2, 'velit duis porro nis', 'irure ex dolor expli', '2016-02-01', 30000, '2025-10-31 11:59:57', '2025-10-31 11:59:57'),
(3, 'laborum recusandae ', 'ipsa ratione aliqua', '2000-08-25', 40, '2025-10-31 12:01:22', '2025-10-31 12:01:22'),
(4, 'cum sunt facere temp', 'quia voluptatem dis', '2017-04-30', 61, '2025-10-31 12:04:31', '2025-10-31 12:04:31'),
(5, 'velit ut quas est v', 'magna est voluptatem', '2013-01-06', 13, '2025-10-31 12:04:34', '2025-10-31 12:04:34'),
(6, 'atque minima incidid', 'in id nihil adipisc', '1978-02-12', 24, '2025-10-31 12:04:38', '2025-10-31 12:04:38'),
(7, 'incidunt consectetu', 'dolor in odio volupt', '2022-07-01', 51, '2025-10-31 12:04:42', '2025-10-31 12:04:42'),
(8, 'omnis anim voluptas ', 'voluptates assumenda', '1975-03-04', 77, '2025-10-31 12:04:47', '2025-10-31 12:04:47'),
(9, 'qui non nostrud dese', 'cum id in necessita', '2021-04-12', 64, '2025-10-31 12:05:04', '2025-10-31 12:05:04'),
(10, 'sunt nihil praesenti', 'laborum minus sed v', '1990-05-25', 62, '2025-10-31 12:05:07', '2025-10-31 12:05:07'),
(11, 'et nostrum ad facili', 'non ipsum reiciendis', '2023-08-27', 14, '2025-10-31 12:05:12', '2025-10-31 12:05:12'),
(12, 'debitis ut maiores q', 'dolor amet hic ut s', '1993-10-04', 16, '2025-10-31 12:05:17', '2025-10-31 12:05:17'),
(13, 'expedita ut est anim', 'omnis minim doloremq', '2021-07-08', 28000, '2025-10-31 12:09:20', '2025-10-31 12:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `kode_product` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `categori` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `qty` int NOT NULL,
  `price_buy` int NOT NULL,
  `price_sale` int NOT NULL,
  `price_service` int NOT NULL,
  `image` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `supplier` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kode_product`, `name`, `categori`, `qty`, `price_buy`, `price_sale`, `price_service`, `image`, `supplier`, `created_at`, `updated_at`) VALUES
(13, 215, 'print hitam putih', 'jasa atau layanan', 436, 0, 400, 0, '', '5', '2025-10-21 18:35:03', '2025-10-21 18:35:03'),
(14, 3153, 'print warna', 'jasa atau layanan', 9913, 0, 500, 0, '', '5', '2025-10-21 19:02:52', '2025-10-21 19:03:01');

-- --------------------------------------------------------

--
-- Table structure for table `qris`
--

CREATE TABLE `qris` (
  `id` int NOT NULL,
  `qris` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id` int NOT NULL,
  `kode_penjualan` int NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `customer_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `transaksi_date` date DEFAULT NULL,
  `total_product` int NOT NULL,
  `total_service` int NOT NULL,
  `total_price` int NOT NULL,
  `id_employe` int NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_pemesanan` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `status_pembayaran` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `note` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id`, `kode_penjualan`, `telp`, `customer_name`, `transaksi_date`, `total_product`, `total_service`, `total_price`, `id_employe`, `status`, `jenis_pemesanan`, `status_pembayaran`, `note`, `created_at`, `updated_at`) VALUES
(20, 6653, '', '', '2025-10-18', 4000, 0, 4000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:35:25', '2025-10-21 18:35:25'),
(21, 1722, '', '', '2025-10-18', 3200, 0, 3200, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:35:31', '2025-10-21 18:35:31'),
(22, 4481, '', '', '2025-10-18', 6000, 0, 6000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:36:00', '2025-10-21 18:36:00'),
(23, 5406, '', '', '2025-10-18', 3200, 0, 3200, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:36:07', '2025-10-21 18:36:07'),
(24, 666, '', '', '2025-10-18', 4800, 0, 4800, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:36:16', '2025-10-21 18:36:16'),
(25, 2723, '', '', '2025-10-18', 22000, 0, 22000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:36:24', '2025-10-21 18:36:24'),
(26, 4985, '', '', '2025-10-18', 8800, 0, 8800, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:36:33', '2025-10-21 18:36:33'),
(27, 7041, '', '', '2025-10-18', 8000, 0, 8000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:36:43', '2025-10-21 18:36:43'),
(28, 8617, '', '', '2025-10-19', 12000, 0, 12000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:36:53', '2025-10-21 18:36:53'),
(29, 5124, '', '', '2025-10-18', 2000, 0, 2000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:37:01', '2025-10-21 18:37:01'),
(30, 5102, '', '', '2025-10-19', 2000, 0, 2000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:37:19', '2025-10-21 18:37:19'),
(31, 9165, '', '', '2025-10-19', 2400, 0, 2400, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:37:37', '2025-10-21 18:37:37'),
(32, 124, '', '', '2025-10-19', 2800, 0, 2800, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:37:51', '2025-10-21 18:37:51'),
(33, 1800, '', '', '2025-10-19', 2000, 0, 2000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:37:59', '2025-10-21 18:37:59'),
(34, 1033, '', '', '2025-10-19', 4800, 0, 4800, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:38:06', '2025-10-21 18:38:06'),
(35, 5214, '', '', '2025-10-19', 21600, 0, 21600, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:38:12', '2025-10-21 18:38:12'),
(36, 312, '', '', '2025-10-19', 2000, 0, 2000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:38:18', '2025-10-21 18:38:18'),
(37, 5394, '', '', '2025-10-20', 6400, 0, 6400, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:38:28', '2025-10-21 18:38:28'),
(38, 2286, '', '', '2025-10-20', 8000, 0, 8000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:41:37', '2025-10-21 18:41:37'),
(39, 215, '', '', '2025-10-20', 20000, 0, 20000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 18:42:28', '2025-10-21 18:42:28'),
(41, 8786, '', '', '2025-10-20', 6000, 0, 6000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:03:12', '2025-10-21 19:03:12'),
(42, 6319, '', '', '2025-10-20', 4300, 0, 4300, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:03:51', '2025-10-21 19:03:51'),
(43, 1190, '', '', '2025-10-20', 7000, 0, 7000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:04:01', '2025-10-21 19:04:01'),
(44, 4330, '', '', '2025-10-20', 5000, 0, 5000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:04:12', '2025-10-21 19:04:12'),
(45, 9910, '', '', '2025-10-21', 8200, 0, 8200, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:04:24', '2025-10-21 19:04:24'),
(46, 4711, '', '', '2025-10-21', 4000, 0, 4000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:04:37', '2025-10-21 19:04:37'),
(47, 5402, '', '', '2025-10-21', 4000, 0, 4000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:04:46', '2025-10-21 19:04:46'),
(48, 8713, '', '', '2025-10-21', 5000, 0, 5000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:06:22', '2025-10-21 19:06:22'),
(49, 4143, '', '', '2025-10-21', 2000, 0, 2000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:06:28', '2025-10-21 19:06:28'),
(50, 9596, '', '', '2025-10-21', 5200, 0, 5200, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:06:36', '2025-10-21 19:06:36'),
(51, 2891, '', '', '2025-10-21', 6000, 0, 6000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:07:16', '2025-10-21 19:07:16'),
(52, 9808, '', '', '2025-10-21', 4500, 0, 4500, 0, 'selesai', 'booking offline', '', '', '2025-10-21 19:07:37', '2025-10-21 19:07:37'),
(53, 9441, '', '', '2025-10-21', 9000, 0, 9000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 20:28:04', '2025-10-21 20:28:04'),
(54, 4231, '', '', '2025-10-21', 8000, 0, 8000, 0, 'selesai', 'booking offline', '', '', '2025-10-21 20:28:11', '2025-10-21 20:28:11'),
(55, 3076, '', '', '2025-10-31', 88020, 0, 88020, 0, 'selesai', 'booking offline', '', '', '2025-10-31 12:54:22', '2025-10-31 12:54:22'),
(56, 1849, '', '', '2025-10-31', 7824, 0, 7824, 0, 'selesai', 'booking offline', '', '', '2025-10-31 12:54:28', '2025-10-31 12:54:28'),
(57, 4587, '', '', '2025-10-31', 19960, 0, 19960, 0, 'selesai', 'booking offline', '', '', '2025-10-31 12:54:34', '2025-10-31 12:54:34'),
(59, 551, 'Eligendi laboriosam', 'Adam Key', '2025-10-31', 500, 0, 500, 0, 'selesai', 'booking offline', '', '', '2025-10-31 12:57:42', '2025-10-31 12:57:42'),
(60, 4998, '', '', '2025-10-31', 800, 0, 800, 0, 'selesai', 'booking offline', '', '', '2025-10-31 19:22:15', '2025-10-31 19:22:15');

-- --------------------------------------------------------

--
-- Table structure for table `sale_detail`
--

CREATE TABLE `sale_detail` (
  `id` int NOT NULL,
  `kode_penjualan` int NOT NULL,
  `kode_product` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `product` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `product_price` int NOT NULL,
  `qty` int NOT NULL,
  `sub_total` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_detail`
--

INSERT INTO `sale_detail` (`id`, `kode_penjualan`, `kode_product`, `product`, `product_price`, `qty`, `sub_total`, `created_at`, `updated_at`) VALUES
(32, 6653, '215', 'print hitam putih', 400, 10, 4000, '2025-10-21 18:35:25', '2025-10-21 18:35:25'),
(33, 1722, '215', 'print hitam putih', 400, 8, 3200, '2025-10-21 18:35:31', '2025-10-21 18:35:31'),
(34, 4481, '215', 'print hitam putih', 400, 15, 6000, '2025-10-21 18:36:00', '2025-10-21 18:36:00'),
(35, 5406, '215', 'print hitam putih', 400, 8, 3200, '2025-10-21 18:36:07', '2025-10-21 18:36:07'),
(36, 666, '215', 'print hitam putih', 400, 12, 4800, '2025-10-21 18:36:16', '2025-10-21 18:36:16'),
(37, 2723, '215', 'print hitam putih', 400, 55, 22000, '2025-10-21 18:36:24', '2025-10-21 18:36:24'),
(38, 4985, '215', 'print hitam putih', 400, 22, 8800, '2025-10-21 18:36:33', '2025-10-21 18:36:33'),
(39, 7041, '215', 'print hitam putih', 400, 20, 8000, '2025-10-21 18:36:43', '2025-10-21 18:36:43'),
(40, 8617, '215', 'print hitam putih', 400, 30, 12000, '2025-10-21 18:36:53', '2025-10-21 18:36:53'),
(41, 5124, '215', 'print hitam putih', 400, 5, 2000, '2025-10-21 18:37:01', '2025-10-21 18:37:01'),
(42, 5102, '215', 'print hitam putih', 400, 5, 2000, '2025-10-21 18:37:19', '2025-10-21 18:37:19'),
(43, 9165, '215', 'print hitam putih', 400, 6, 2400, '2025-10-21 18:37:37', '2025-10-21 18:37:37'),
(44, 124, '215', 'print hitam putih', 400, 7, 2800, '2025-10-21 18:37:51', '2025-10-21 18:37:51'),
(45, 1800, '215', 'print hitam putih', 400, 5, 2000, '2025-10-21 18:37:59', '2025-10-21 18:37:59'),
(46, 1033, '215', 'print hitam putih', 400, 12, 4800, '2025-10-21 18:38:06', '2025-10-21 18:38:06'),
(47, 5214, '215', 'print hitam putih', 400, 54, 21600, '2025-10-21 18:38:12', '2025-10-21 18:38:12'),
(48, 312, '215', 'print hitam putih', 400, 5, 2000, '2025-10-21 18:38:18', '2025-10-21 18:38:18'),
(49, 5394, '215', 'print hitam putih', 400, 16, 6400, '2025-10-21 18:38:28', '2025-10-21 18:38:28'),
(50, 2286, '215', 'print hitam putih', 400, 20, 8000, '2025-10-21 18:41:37', '2025-10-21 18:41:37'),
(51, 215, '215', 'print hitam putih', 400, 50, 20000, '2025-10-21 18:42:28', '2025-10-21 18:42:28'),
(53, 8786, '3153', 'print warna', 500, 4, 2000, '2025-10-21 19:03:12', '2025-10-21 19:03:12'),
(54, 8786, '215', 'print hitam putih', 400, 10, 4000, '2025-10-21 19:03:19', '2025-10-21 19:03:19'),
(55, 6319, '215', 'print hitam putih', 400, 7, 2800, '2025-10-21 19:03:51', '2025-10-21 19:03:51'),
(56, 6319, '3153', 'print warna', 500, 3, 1500, '2025-10-21 19:03:55', '2025-10-21 19:03:55'),
(57, 1190, '215', 'print hitam putih', 400, 5, 2000, '2025-10-21 19:04:01', '2025-10-21 19:04:01'),
(58, 1190, '3153', 'print warna', 500, 10, 5000, '2025-10-21 19:04:05', '2025-10-21 19:04:05'),
(59, 4330, '3153', 'print warna', 500, 10, 5000, '2025-10-21 19:04:12', '2025-10-21 19:04:12'),
(60, 9910, '215', 'print hitam putih', 400, 8, 3200, '2025-10-21 19:04:24', '2025-10-21 19:04:24'),
(61, 9910, '3153', 'print warna', 500, 10, 5000, '2025-10-21 19:04:28', '2025-10-21 19:04:28'),
(62, 4711, '215', 'print hitam putih', 400, 10, 4000, '2025-10-21 19:04:37', '2025-10-21 19:04:37'),
(63, 5402, '3153', 'print warna', 500, 8, 4000, '2025-10-21 19:04:46', '2025-10-21 19:04:46'),
(64, 8713, '3153', 'print warna', 500, 10, 5000, '2025-10-21 19:06:22', '2025-10-21 19:06:22'),
(65, 4143, '215', 'print hitam putih', 400, 5, 2000, '2025-10-21 19:06:28', '2025-10-21 19:06:28'),
(66, 9596, '3153', 'print warna', 500, 4, 2000, '2025-10-21 19:06:36', '2025-10-21 19:06:36'),
(67, 9596, '215', 'print hitam putih', 400, 8, 3200, '2025-10-21 19:06:41', '2025-10-21 19:06:41'),
(68, 2891, '215', 'print hitam putih', 400, 15, 6000, '2025-10-21 19:07:16', '2025-10-21 19:07:16'),
(69, 9808, '3153', 'print warna', 500, 9, 4500, '2025-10-21 19:07:37', '2025-10-21 19:07:37'),
(70, 9441, '3153', 'print warna', 500, 18, 9000, '2025-10-21 20:28:04', '2025-10-21 20:28:04'),
(71, 4231, '215', 'print hitam putih', 400, 20, 8000, '2025-10-21 20:28:11', '2025-10-21 20:28:11'),
(72, 3076, '5241', 'kasper vazquez', 978, 90, 88020, '2025-10-31 12:54:22', '2025-10-31 12:54:22'),
(73, 1849, '5241', 'kasper vazquez', 978, 8, 7824, '2025-10-31 12:54:28', '2025-10-31 12:54:28'),
(74, 4587, '215', 'print hitam putih', 400, 1, 400, '2025-10-31 12:54:34', '2025-10-31 12:54:34'),
(75, 4587, '5241', 'kasper vazquez', 978, 20, 19560, '2025-10-31 12:54:38', '2025-10-31 12:54:38'),
(77, 551, '3153', 'print warna', 500, 1, 500, '2025-10-31 12:57:42', '2025-10-31 12:57:42'),
(78, 4998, '215', 'print hitam putih', 400, 2, 800, '2025-10-31 19:22:22', '2025-10-31 19:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telp` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `telp`, `email`, `address`, `created_at`, `updated_at`) VALUES
(5, 'suhaimi percetakan', '085272209948', 'suhaimi@gmail.com', 'jl provinsi parit 2', '2025-10-21 18:34:27', '2025-10-21 18:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `is_active` int NOT NULL,
  `is_admin` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `is_active`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin123', 1, 1, '2025-10-20 14:54:58', '2025-10-20 14:54:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditures`
--
ALTER TABLE `expenditures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qris`
--
ALTER TABLE `qris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_detail`
--
ALTER TABLE `sale_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `employes`
--
ALTER TABLE `employes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenditures`
--
ALTER TABLE `expenditures`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `qris`
--
ALTER TABLE `qris`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `sale_detail`
--
ALTER TABLE `sale_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
