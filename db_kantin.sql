-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2020 at 07:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kantin`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanans`
--

CREATE TABLE `detail_pesanans` (
  `id_detail_pesan` int(10) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `status_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pesanans`
--

INSERT INTO `detail_pesanans` (`id_detail_pesan`, `id_pesan`, `id_masakan`, `status_detail`) VALUES
(5, 56, 12, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `masakans`
--

CREATE TABLE `masakans` (
  `id_masakan` int(10) UNSIGNED NOT NULL,
  `nama_masakan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `masakans`
--

INSERT INTO `masakans` (`id_masakan`, `nama_masakan`, `harga`, `gambar`, `status`) VALUES
(11, 'ayam goreng', 16000, '', 'ada'),
(12, 'mie', 6000, '', 'ada\r\n'),
(13, 'bakso', 7000, '', 'ada\r\n'),
(14, 'nasi uduk', 8500, '', 'ada');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2020_09_18_023156_create_masakans_table', 1),
(3, '2020_09_18_113159_create_pesanans_table', 2),
(4, '2020_09_18_130525_create_detail_pesanans_table', 2),
(5, '2020_09_19_031332_create_transaksis_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id_pesan` int(10) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id_pesan`, `no_meja`, `tanggal_pesan`, `id_user`, `status`) VALUES
(55, 43, '2020-09-18', 12, 'belum'),
(56, 44, '2020-09-19', 15, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id_transaksi` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `total_bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD PRIMARY KEY (`id_detail_pesan`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- Indexes for table `masakans`
--
ALTER TABLE `masakans`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  MODIFY `id_detail_pesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `masakans`
--
ALTER TABLE `masakans`
  MODIFY `id_masakan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id_pesan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanans`
--
ALTER TABLE `detail_pesanans`
  ADD CONSTRAINT `detail_pesanans_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesanans` (`id_pesan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
