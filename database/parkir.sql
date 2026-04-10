-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2026 at 01:52 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_parkir`
--

CREATE TABLE `area_parkir` (
  `id_area` int NOT NULL,
  `nama_area` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `kapasitas` int NOT NULL,
  `terisi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `area_parkir`
--

INSERT INTO `area_parkir` (`id_area`, `nama_area`, `kapasitas`, `terisi`) VALUES
(13, 'Zona A', 10, 3),
(14, 'Zona B', 10, 0),
(15, 'Zona C', 20, 2),
(17, 'Zona D', 15, 7),
(18, 'Zona E', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int NOT NULL,
  `plat_nomor` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kendaraan` enum('mobil','motor','lainnya','') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `plat_nomor`, `jenis_kendaraan`) VALUES
(42, 'RI 7', 'mobil'),
(43, 'B 11', 'motor'),
(46, 'M 9000', 'mobil'),
(50, 'GO 1111', 'lainnya'),
(51, 'Z 800', 'motor'),
(52, 'z 899', 'motor'),
(53, 'z 222', 'motor'),
(54, 'k 99', 'motor'),
(68, 'A 9999', 'mobil'),
(69, 'a 7890', 'motor'),
(70, 'B 44', 'motor'),
(71, 'X 1', 'mobil'),
(72, 'M 90', 'motor'),
(73, 'N 9 GAS', 'mobil'),
(74, 'Z 99', 'motor'),
(75, 'Z 1', 'lainnya'),
(76, 'Z 9838 BVS', 'mobil'),
(77, 'A 678 ASE', 'mobil'),
(78, 'M 1836 CA', 'motor'),
(79, 'L 7899 HAS', 'motor'),
(80, 'L 8777 OKK', 'mobil'),
(81, 'D 9999 JAS', 'motor'),
(82, 'AD 8122 YAU', 'motor'),
(83, 'Z 87', 'mobil'),
(84, 'p 66', 'mobil'),
(85, 'z 2221', 'motor'),
(86, 'z 9281 laj', 'lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int NOT NULL,
  `id_user` int NOT NULL,
  `aktivitas` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `waktu_aktivitas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `id_user`, `aktivitas`, `waktu_aktivitas`) VALUES
(11, 37, 'Petugas mengeluarkan kendaraan ID [40] dari parkir', '2026-03-25 19:21:50'),
(15, 37, 'Petugas mengeluarkan kendaraan ID [43] dari parkir', '2026-03-26 10:26:34'),
(25, 37, 'Petugas menambahkan kendaraan [z 111] ke area [10]', '2026-04-01 13:47:19'),
(33, 37, 'Petugas menambahkan kendaraan [M 90] ke area [15]', '2026-04-02 13:19:46'),
(35, 37, 'Petugas mengeluarkan kendaraan ID [55] dari parkir', '2026-04-07 20:27:49'),
(37, 37, 'Petugas menambahkan kendaraan [Z 1] ke area [13]', '2026-04-08 08:00:43'),
(43, 37, 'Petugas mengeluarkan kendaraan ID [59] dari parkir', '2026-04-08 09:38:19'),
(44, 37, 'Petugas menambahkan kendaraan [M 1836 CA] ke area [14]', '2026-04-08 10:02:21'),
(45, 37, 'Petugas mengeluarkan kendaraan ID [60] dari parkir', '2026-04-08 10:02:34'),
(46, 36, 'menambahkan user baru: Zav dengan role petugas', '2026-04-09 07:47:49'),
(47, 36, 'menghapus user dengan ID: 40', '2026-04-09 07:48:10'),
(48, 36, 'Admin mengubah user [Zav] menjadi role [owner]', '2026-04-09 07:57:00'),
(49, 36, 'menambahkan tarif baru untuk [lainnya] sebesar Rp1000', '2026-04-09 07:58:52'),
(50, 36, 'mengubah tarif [lainnya] menjadi Rp10', '2026-04-09 07:59:00'),
(51, 36, 'menghapus data tarif dengan ID [12]', '2026-04-09 07:59:00'),
(53, 36, 'mengubah data kendaraan dengan ID [80]', '2026-04-09 08:05:55'),
(54, 36, 'mengubah area ID [] menjadi [Zona D]', '2026-04-09 08:16:18'),
(58, 37, 'melakukan login ke dalam sistem', '2026-04-09 08:26:22'),
(59, 36, 'melakukan login ke dalam sistem', '2026-04-09 08:26:33'),
(60, 36, 'melakukan login ke dalam sistem', '2026-04-09 08:28:32'),
(61, 36, 'telah keluar dari sistem (logout)', '2026-04-09 08:31:04'),
(62, 36, 'melakukan login ke dalam sistem', '2026-04-09 08:31:12'),
(63, 36, 'Admin mengubah user [okok] menjadi role [admin]', '2026-04-09 08:31:59'),
(64, 36, 'telah keluar dari sistem (logout)', '2026-04-09 08:32:05'),
(65, 43, 'melakukan login ke dalam sistem', '2026-04-09 08:32:12'),
(66, 43, 'telah keluar dari sistem (logout)', '2026-04-09 08:33:47'),
(67, 36, 'melakukan login ke dalam sistem', '2026-04-09 08:36:00'),
(68, 36, 'telah keluar dari sistem (logout)', '2026-04-09 08:36:16'),
(69, 38, 'melakukan login ke dalam sistem', '2026-04-09 08:36:22'),
(70, 38, 'telah keluar dari sistem (logout)', '2026-04-09 08:40:18'),
(71, 37, 'melakukan login ke dalam sistem', '2026-04-09 08:40:26'),
(72, 37, 'Petugas menambahkan kendaraan [D 9999 JAS] ke area [15]', '2026-04-09 08:40:53'),
(73, 37, '[Petugas] Petugas menambahkan kendaraan [AD 8122 YAU] ke area [17]', '2026-04-09 08:45:36'),
(74, 37, '[Petugas] Petugas mengeluarkan kendaraan ID [62] dari parkir', '2026-04-09 08:45:43'),
(75, 37, '[Petugas] telah keluar dari sistem (logout)', '2026-04-09 08:45:48'),
(76, 38, '[Owner] melakukan login ke dalam sistem', '2026-04-09 08:45:55'),
(77, 38, '[Owner] telah keluar dari sistem (logout)', '2026-04-09 08:46:01'),
(78, 36, '[Admin] melakukan login ke dalam sistem', '2026-04-09 08:46:13'),
(79, 36, '[Admin] telah keluar dari sistem (logout)', '2026-04-09 09:18:10'),
(80, 36, '[Admin] melakukan login ke dalam sistem', '2026-04-09 09:34:52'),
(81, 36, '[Admin] telah keluar dari sistem (logout)', '2026-04-09 10:01:53'),
(82, 37, '[Petugas] melakukan login ke dalam sistem', '2026-04-09 10:02:05'),
(83, 37, '[Petugas] telah keluar dari sistem (logout)', '2026-04-09 10:02:25'),
(84, 38, '[Owner] melakukan login ke dalam sistem', '2026-04-09 10:02:32'),
(85, 38, '[Owner] telah keluar dari sistem (logout)', '2026-04-09 10:03:02'),
(86, 36, '[Admin] melakukan login ke dalam sistem', '2026-04-09 10:03:07'),
(87, 36, '[Admin] melakukan login ke dalam sistem', '2026-04-10 20:21:14'),
(88, 36, '[Admin] mengubah data kendaraan dengan ID [75]', '2026-04-10 20:21:51'),
(89, 36, '[Admin] telah keluar dari sistem (logout)', '2026-04-10 20:36:48'),
(90, 37, '[Petugas] melakukan login ke dalam sistem', '2026-04-10 20:36:58'),
(91, 37, '[Petugas] Petugas menambahkan kendaraan [Z 87] ke area [13]', '2026-04-10 20:37:11'),
(92, 37, '[Petugas] Petugas menambahkan kendaraan [p 66] ke area [13]', '2026-04-10 20:39:14'),
(93, 37, '[Petugas] Petugas menambahkan kendaraan [z 2221] ke area [17]', '2026-04-10 20:44:06'),
(94, 37, '[Petugas] Petugas menambahkan kendaraan [z 9281 laj] ke area [17]', '2026-04-10 20:44:21');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int NOT NULL,
  `jenis_kendaraan` enum('motor','mobil','lainnya') COLLATE utf8mb4_general_ci NOT NULL,
  `tarif_per_jam` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `jenis_kendaraan`, `tarif_per_jam`) VALUES
(1, 'mobil', 5000),
(2, 'motor', 3000),
(13, 'lainnya', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_parkir` int NOT NULL,
  `id_kendaraan` int NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `id_tarif` int NOT NULL,
  `durasi_jam` int DEFAULT NULL,
  `biaya_total` decimal(10,0) DEFAULT NULL,
  `status` enum('masuk','keluar') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_area` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_parkir`, `id_kendaraan`, `waktu_masuk`, `waktu_keluar`, `id_tarif`, `durasi_jam`, `biaya_total`, `status`, `id_area`) VALUES
(50, 68, '2026-04-02 07:45:59', '2026-04-02 07:46:53', 1, NULL, 3000, 'keluar', 13),
(51, 69, '2026-04-02 07:46:48', NULL, 2, NULL, NULL, 'masuk', 15),
(52, 42, '2026-04-02 08:08:46', '2026-04-02 08:09:02', 1, NULL, 3000, 'keluar', 14),
(53, 71, '2026-04-02 13:19:02', '2026-04-02 13:19:10', 1, NULL, 6000, 'keluar', 13),
(54, 72, '2026-04-02 13:19:46', '2026-04-07 20:27:55', 2, NULL, 363000, 'keluar', 15),
(55, 74, '2026-04-07 20:27:36', '2026-04-07 20:27:49', 2, NULL, 3000, 'keluar', 15),
(56, 75, '2026-04-08 08:00:43', '2026-04-08 08:19:10', 2, NULL, 3000, 'keluar', 13),
(57, 76, '2026-04-08 08:01:00', '2026-04-08 08:01:27', 1, NULL, 5000, 'keluar', 15),
(58, 71, '2026-04-08 08:01:21', NULL, 1, NULL, NULL, 'masuk', 13),
(59, 77, '2026-04-08 09:37:44', '2026-04-08 09:38:19', 1, NULL, 5000, 'keluar', 15),
(60, 78, '2026-04-08 10:02:21', '2026-04-08 10:02:34', 2, NULL, 3000, 'keluar', 14),
(61, 81, '2026-04-09 08:40:53', NULL, 2, NULL, NULL, 'masuk', 15),
(62, 82, '2026-04-09 08:45:36', '2026-04-09 08:45:43', 2, NULL, 3000, 'keluar', 17),
(63, 83, '2026-04-10 20:37:11', NULL, 1, NULL, NULL, 'masuk', 13),
(64, 84, '2026-04-10 20:39:14', NULL, 1, NULL, NULL, 'masuk', 13),
(65, 85, '2026-04-10 20:44:06', NULL, 2, NULL, NULL, 'masuk', 17),
(66, 86, '2026-04-10 20:44:21', NULL, 13, NULL, NULL, 'masuk', 17);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `nama_lengkap` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `role` enum('admin','petugas','owner','') COLLATE utf8mb4_general_ci NOT NULL,
  `status_aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `username`, `password`, `role`, `status_aktif`) VALUES
(36, 'admin', 'admin', '$2y$10$K325RsdXZsA9yqC8eW1sHuIg/kK3u26MaXhda5TqDVTmk.ESi1wxu', 'admin', 1),
(37, 'petugas', 'petugas', '$2y$10$nZU8EW5Ck8jtsH9sdag/lu7CAhFD2fC09dubb.cB8cN1.BvslDwd6', 'petugas', 1),
(38, 'owner', 'owner', '$2y$10$dnF4Ac45NB0tDFiAUYZinu7f7bw8LT4rQ5ekbsRE4sPsVSaia6/M6', 'owner', 1),
(42, 'Zav', 'Zav', '$2y$10$c2kVJtXvc0DZmrz55dF03ePcTyjHSpptUcMDRFP45i068Me6O9yyK', 'owner', 1),
(43, 'okok', 'okok', '$2y$10$XWQRpfJEvu9lhSBzgb3NNuGn0piwFHTivEDsvX/tj1KjEQ7n1seom', 'admin', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `area_parkir`
--
ALTER TABLE `area_parkir`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_parkir`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `id_tarif` (`id_tarif`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `area_parkir`
--
ALTER TABLE `area_parkir`
  MODIFY `id_area` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_parkir` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD CONSTRAINT `log_aktivitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `area_parkir` (`id_area`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_tarif`) REFERENCES `tarif` (`id_tarif`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
