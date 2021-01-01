-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2021 at 11:47 AM
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
-- Database: `pabw_sports`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `failed_jobs`:
--

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` int(11) NOT NULL,
  `mulaiJadwal` datetime NOT NULL,
  `selesaiJadwal` datetime NOT NULL,
  `idLapangan` int(11) NOT NULL,
  `idTransaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `jadwal`:
--   `idTransaksi`
--       `transaksi` -> `idTransaksi`
--   `idLapangan`
--       `lapangan` -> `idLapangan`
--

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idJadwal`, `mulaiJadwal`, `selesaiJadwal`, `idLapangan`, `idTransaksi`) VALUES
(3, '2021-01-02 15:30:00', '2021-01-02 17:30:00', 17, 3),
(4, '2021-01-02 13:00:00', '2021-01-02 15:00:00', 17, 5),
(5, '2020-12-31 18:40:00', '2020-12-31 19:40:00', 17, 6),
(6, '2021-01-02 16:00:00', '2021-01-02 17:00:00', 17, 7);

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `idLapangan` int(11) NOT NULL,
  `idVenue` int(11) NOT NULL,
  `namaLapangan` varchar(50) NOT NULL,
  `jenisLapangan` varchar(25) NOT NULL,
  `hargaLapangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `lapangan`:
--   `idVenue`
--       `venue` -> `idVenue`
--

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`idLapangan`, `idVenue`, `namaLapangan`, `jenisLapangan`, `hargaLapangan`) VALUES
(3, 3, 'Lapangan A', 'Futsal', 150000),
(5, 3, 'Lapangan B', 'Futsal', 250000),
(8, 6, 'Lapangan 1', 'Futsal', 150000),
(9, 6, 'Lapangan 2', 'Futsal', 150000),
(10, 5, 'Lapangan W', 'Lapangan Basket', 20000),
(14, 5, 'Lapangan V', 'Lapangan Basket', 80000),
(15, 5, 'Lapangan U', 'Lapangan Basket', 404040),
(16, 5, 'Lapangan T', 'Lapangan Basket', 150000),
(17, 9, 'Lapangan Utama', 'Lapangan Sepak Bola', 5000000);

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
-- RELATIONSHIPS FOR TABLE `migrations`:
--

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `password_resets`:
--

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `idMember` int(11) NOT NULL,
  `totalTransaksi` int(11) NOT NULL,
  `buktiTransaksi` text DEFAULT NULL,
  `lunasTransaksi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `transaksi`:
--   `idMember`
--       `user` -> `idUser`
--

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `idMember`, `totalTransaksi`, `buktiTransaksi`, `lunasTransaksi`) VALUES
(3, 3, 10000000, '1609497172.jpg', 'lunas'),
(4, 3, 10000000, NULL, 'belum'),
(5, 3, 10000000, '1609497551.jpg', 'lunas'),
(6, 3, 5000000, '1609497661.jpg', 'lunas'),
(7, 3, 5000000, '1609497705.png', 'batal');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `namaUser` text NOT NULL,
  `telpUser` varchar(15) DEFAULT NULL,
  `emailUser` varchar(25) DEFAULT NULL,
  `aksesUser` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `user`:
--

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `namaUser`, `telpUser`, `emailUser`, `aksesUser`) VALUES
(1, 'admin', '$2y$10$Ee2j9FchHkPUKGuNSKSa9OSa0YR6uMbT38uZP5D9vHRIXVryT8Mnm', 'admin jago', '0815', 'email.admin@gmail.com', 'admin'),
(2, 'owner', '$2y$10$h09Dcn9ZEkEEeBZ4cRCD.eUgwUKBfP0Pel6NWySsNX7gepmoaFUci', 'nama owner', '0815', 'email.owner@gmail.com', 'owner'),
(3, 'member', '$2y$10$KIe4.GOyvUw3NX80hYF2ue7LaacqkcITZY4ShOd2X7GeqfczR5di.', 'nama member', '0815', 'email.member@gmail.com', 'member'),
(4, 'admin2', '$2y$10$2ak52P1fX.5yUkX3PSx1zO0XIcoU81zETej6R2uJkF/hhz8RYhH0O', 'nama admin2', '0852', 'email.admin2@gmail.com', 'admin'),
(5, 'owner2', '$2y$10$QQuZoN6pcAlKEGcKMspr5uXqUYSn.OF1m0Sj34PgRZUEiJNFMIAS2', 'nama owner2', '0852', 'email.owner2@gmail.com', 'owner'),
(7, 'aldy', '$2y$10$q3omEIpWHqEupFXeI0jL7eFtJWz78hPovNScgxz18XmBAjnVsTEvy', 'Muhammad Reinaldy Hermawan', '081549019726', 'aldyjonkunimen@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `idVenue` int(11) NOT NULL,
  `namaVenue` varchar(50) NOT NULL,
  `alamatVenue` text NOT NULL,
  `telpVenue` varchar(15) DEFAULT NULL,
  `emailVenue` varchar(50) DEFAULT NULL,
  `bukaVenue` text NOT NULL,
  `tutupVenue` text NOT NULL,
  `gambarVenue` text DEFAULT NULL,
  `idPemilik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `venue`:
--   `idPemilik`
--       `user` -> `idUser`
--

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`idVenue`, `namaVenue`, `alamatVenue`, `telpVenue`, `emailVenue`, `bukaVenue`, `tutupVenue`, `gambarVenue`, `idPemilik`) VALUES
(3, 'Venue 1', 'Sejahtera 1', '0852', 'venue1@gmail.com', '08:00', '23:30', 'EqEyxndW8AEDaK9.jpeg', 2),
(5, 'Venue 2', 'Sejahtera 2', '0815', 'venue2@gmail.com', '00:00', '23:59', 'lis2.jpg', 2),
(6, 'TQ One', 'Kilo 6', '2834289', 'jdkgs', '08:00', '00:00', 'tq.jpg', 2),
(9, 'Santiago Bernabeu', 'madrid', '34913984300', 'madrid.com', '05:00', '23:30', 'Santiagobernabeupanoramav2.jpg', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`),
  ADD KEY `idLapangan` (`idLapangan`),
  ADD KEY `idMember` (`idTransaksi`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`idLapangan`),
  ADD KEY `idVenue` (`idVenue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`),
  ADD KEY `idMember` (`idMember`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`idVenue`),
  ADD KEY `idPemilik` (`idPemilik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idJadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `idLapangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `idVenue` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`idTransaksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`idLapangan`) REFERENCES `lapangan` (`idLapangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD CONSTRAINT `lapangan_ibfk_1` FOREIGN KEY (`idVenue`) REFERENCES `venue` (`idVenue`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`idMember`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`idPemilik`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
