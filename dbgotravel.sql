-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2021 at 05:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbgotravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kota_tujuan`
--

CREATE TABLE `kota_tujuan` (
  `id` int(11) NOT NULL,
  `name_kota` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `deskripsi` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota_tujuan`
--

INSERT INTO `kota_tujuan` (`id`, `name_kota`, `image`, `deskripsi`, `harga`) VALUES
(1, 'Yogjakarta', 'jogja.jpg', 'Yogjakarta merupakan salah satu kota yang memiliki banyak destinasi wisata yang sangat banyak sepererti pantai, bukit dan yang paling terkenal adalah destinasi wisata malioboro.', 145000),
(2, 'Malang', 'malang.jpg', 'Malang merupakan salah satu kota yang memiliki banyak destinasi wisata yang sangat banyak sepererti pantai, bukit, Gunung dan yang paling terkenal adalah destinasi wisata Gunung Bromo.', 150000),
(3, 'Bali', 'bali.jpg', 'Balimerupakan salah satu kota yang memiliki banyak destinasi wisata yang sangat banyak sepererti pantai, bukit, dan yang paling terkenal adalah destinasi wisata pantai pandhawa.', 750000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `id_reservasi` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kota_tujuan` int(11) NOT NULL,
  `jumlah_orang` int(11) NOT NULL,
  `alamat_penjemputan` varchar(128) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `uang_muka` int(11) NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `date_order` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `id_user`, `nama`, `id_kota_tujuan`, `jumlah_orang`, `alamat_penjemputan`, `tgl_berangkat`, `total_bayar`, `uang_muka`, `status_pembayaran`, `date_order`) VALUES
(15, 1, 'Nur Rohmad', 1, 20, 'Bintoyo Padas Ngawi', '2021-06-22', 2900000, 290000, 1, '2028-06-21'),
(16, 1, 'Nur Rohmad', 1, 15, 'Pangkur Pangkur Ngawi', '2021-06-23', 2175000, 217500, 0, '2021-06-28'),
(17, 1, 'Nur Rohmad', 1, 10, 'Padas', '2021-06-16', 1450000, 145000, 2, '2021-06-28'),
(18, 1, 'Nur Rohmad', 2, 35, 'Kota Madiun', '2021-06-09', 5250000, 525000, 0, '2021-06-29'),
(19, 3, 'edy', 2, 50, 'bojonegoro', '2021-07-12', 7500000, 750000, 0, '2021-07-04'),
(20, 3, 'edy', 2, 19, 'Ngawi Kota', '2021-07-30', 2850000, 285000, 0, '2021-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `status_pembayaran`
--

CREATE TABLE `status_pembayaran` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pembayaran`
--

INSERT INTO `status_pembayaran` (`id_status`, `status`) VALUES
(0, 'belum bayar'),
(1, 'tahap verivikasi'),
(3, 'pembayaran gagal'),
(4, 'lunas');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `alamat`, `image`, `password`, `email`, `role_id`, `date_created`) VALUES
(1, 'Nur Rohmad', 'Bintoyo , Padas , Ngawi', 'default.jpg', 'rohmad123', 'nurrohmad@gmail.com', 1, 25062021),
(2, 'Bagus Edy S', 'Sukowiyono, Padas, Ngawi', 'default.jpg', 'bagus123', 'bagusedy@gmail.com', 2, 26062021),
(3, 'edy', 'Dimong, Dimong, Madiun', 'default.jpg', 'edy123', 'edy@gmail.com', 1, 27062021);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'penumpang'),
(2, 'admin kantor ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kota_tujuan`
--
ALTER TABLE `kota_tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kota_tujuan`
--
ALTER TABLE `kota_tujuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
