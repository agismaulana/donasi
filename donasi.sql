-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 04:12 AM
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
-- Database: `donasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id_catalog` int(11) NOT NULL,
  `nama_catalog` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `slug_catalog` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id_catalog`, `nama_catalog`, `icon`, `slug_catalog`) VALUES
(1, 'Pembangunan Masjid', 'fa fa-mosque', 'Pembangunan-Masjid'),
(2, 'Kegiatan Sosial', 'fas fa-users', 'Kegiatan-Sosial'),
(3, 'Wakaf', 'fas fa-coins', 'Wakaf'),
(4, 'Bantuan Medis Dan Kesehatan', 'fas fa-medkit', 'Bantuan-Medis-Dan-Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `id_detail` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `bank` varchar(20) NOT NULL,
  `va_number` varchar(255) NOT NULL,
  `pdf_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id_detail`, `payment_type`, `transaction_time`, `bank`, `va_number`, `pdf_url`) VALUES
('3fbdaa32-2a31-4fc8-a674-32e7e59ff7c0', 'bank_transfer', '2021-01-30 07:07:47', 'bca', '70470632999', 'https://app.sandbox.midtrans.com/snap/v1/transactions/041d0ad3-b37a-4ec9-ad72-5d25682f9f79/pdf'),
('6cfe5815-dc2a-4056-a430-42cdd2f2e8fc', 'bank_transfer', '2021-01-30 10:05:39', 'bca', '70470421102', 'https://app.sandbox.midtrans.com/snap/v1/transactions/8777da80-6223-4162-a4ee-d9e647805674/pdf');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id_program` int(11) NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `slug_program` varchar(255) NOT NULL,
  `image_program` varchar(255) NOT NULL,
  `slug_catalog` varchar(255) NOT NULL,
  `waktu_berakhir` date NOT NULL,
  `target` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id_program`, `nama_program`, `slug_program`, `image_program`, `slug_catalog`, `waktu_berakhir`, `target`, `user_id`, `deskripsi`) VALUES
(1, 'Pembangunan Masjid Sukarame', 'Pembangunan-Masjid-Sukarame', '202101286012ba3ea61b0.jpg', 'Pembangunan-Masjid', '2021-03-05', 10000000, 2, 'askomclmqiomflkwmfiskdlmqidmskamimskamxmckmcmksa'),
(2, 'Santunan Anak Yatim', 'Santunan-Anak-Yatim', '202101286012bc207de41.png', 'Kegiatan-Sosial', '2021-02-25', 20000000, 2, 'asdzxdwdzxddwe'),
(3, 'bantuan Medis', 'bantuan-Medis', '202101296014489b586ed.png', 'Bantuan-Medis-Dan-Kesehatan', '2021-01-29', 20000000, 2, 'asadwswasdwdasdw'),
(4, 'Wakaf Tanah Untuk Pembuatan Masjid Tahfidz', 'Wakaf-Tanah-Untuk-Pembuatan-Masjid-Tahfidz', '20210129601448e3ebff2.png', 'Wakaf', '2021-03-19', 20000000, 2, 'SdadDdwasdswwasddwasw');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(255) NOT NULL,
  `program_id` int(11) NOT NULL,
  `nominal` double NOT NULL,
  `nama_donatur` varchar(255) NOT NULL,
  `email_donatur` varchar(255) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `detail_id` varchar(255) NOT NULL,
  `catatan_donatur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `program_id`, `nominal`, `nama_donatur`, `email_donatur`, `no_telepon`, `detail_id`, `catatan_donatur`) VALUES
('202101300107381484970962', 1, 100000, 'Hamba Allah', 'agismaulana112@gmail.com', '085220893828', '3fbdaa32-2a31-4fc8-a674-32e7e59ff7c0', 'Semoga Terlaksanakan'),
('202101300126361189810276', 2, 50000, 'Hamba Allah', 'agismaulana112@gmail.com', '085320344197', '6cfe5815-dc2a-4056-a430-42cdd2f2e8fc', 'Semoga Terlaksanakan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `no_telepon`, `password`, `image`, `role_id`, `is_active`, `is_online`) VALUES
(1, 'Agis Maulana', 'agismaulana112@gmail.com', '085320344197', '$2y$10$FLf/K0zL1p8KFvSF7.A.0eE.zjVNDQAJuehn/Si07WVBoOil9qFFe', 'default.jpg', 2, 1, 0),
(2, 'Admin', 'admin@gmail.com', '0', '$2y$10$nd3DbLL8XA0PtZeGIQS18e04Q8DxG1Od18y8JiX8fFxu5Hm6BCosS', 'default.jpg', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id_catalog`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id_program`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id_catalog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id_program` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
