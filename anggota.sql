-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2026 at 07:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ci3`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nomor_anggota` varchar(10) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `telp_anggota` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id`, `nomor_anggota`, `nama_anggota`, `alamat`, `telp_anggota`, `email`, `tanggal_daftar`) VALUES
(1, 'F001', 'Fitriana Hendayati', 'Perum Taman Walet', '085210494158', 'fhendayati@gmail.com', '2026-04-14'),
(2, 'J001', 'Je-hoon', 'Karawaci', '081227087071', 'jehoon@gmail.com', '2025-01-01'),
(3, 'A001', 'Aqeela Calista', 'Cibubur', '081317806569', 'aqeelacast@gmail.com', '2026-03-15'),
(4, 'F002', 'Fattah Syach', 'Jakarta Utara', '081219097611', 'fattahsyach@gmail.com', '2026-02-20'),
(5, 'H001', 'Harry Vaughan', 'Jakarta Barat', '081213141516', 'harryv@gmail.com', '2025-03-30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
