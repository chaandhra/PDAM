-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2016 at 06:33 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis_map`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` char(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
('1', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE `blok` (
  `id` int(100) NOT NULL,
  `namablok` text NOT NULL,
  `id_kecamatan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`id`, `namablok`, `id_kecamatan`) VALUES
(10, 'babakan', 3),
(11, 'kaum', 3);

-- --------------------------------------------------------

--
-- Table structure for table `checker`
--

CREATE TABLE `checker` (
  `id` int(100) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checker`
--

INSERT INTO `checker` (`id`, `username`, `password`, `nama`) VALUES
(1, 'hanifa', '81dc9bdb52d04dc20036dbd8313ed055', 'Hanifa'),
(2, 'hani', '827ccb0eea8a706c4c34a16891f84e7b', 'hanifa deui');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(100) NOT NULL,
  `nama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama`) VALUES
(2, 'asem'),
(3, 'buahdua');

-- --------------------------------------------------------

--
-- Table structure for table `kordinat_gis`
--

CREATE TABLE `kordinat_gis` (
  `nomor` int(5) NOT NULL,
  `x` decimal(8,5) NOT NULL,
  `y` decimal(8,5) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `id_pelanggan` text NOT NULL,
  `alamat` text NOT NULL,
  `idblok` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kordinat_gis`
--

INSERT INTO `kordinat_gis` (`nomor`, `x`, `y`, `nama_tempat`, `id_pelanggan`, `alamat`, `idblok`) VALUES
(7, '-8.21961', '114.34965', 'Banyuwangi', '', '', ''),
(10, '-8.72490', '115.17981', 'Pantai Kuta', '', '', ''),
(15, '-8.43838', '115.62063', 'Karangasem', '', '', ''),
(16, '-8.55247', '115.03836', 'Kerambitan', '', '', ''),
(17, '-8.31202', '115.02188', 'Pupuan', '', '', ''),
(18, '-8.00072', '114.40390', 'Wongsorejo', '', '', ''),
(19, '-8.44109', '115.31714', 'Tampak Siring', '', '', ''),
(20, '-8.73440', '115.54648', 'Nusa Penida', '', '', ''),
(21, '-8.14756', '115.11389', 'Sukasada', '', '', ''),
(22, '-8.54296', '115.12350', 'Tabanan', '', '', ''),
(23, '-8.22810', '114.29627', 'Glagah', '', '', ''),
(24, '-8.27839', '114.29455', 'Macan Putih', '', '', ''),
(25, '-8.14756', '114.39549', 'Ketapang', '', '', ''),
(26, '-8.15674', '114.21009', 'Songgon', '', '', ''),
(28, '-6.73318', '107.98772', 'rumah agus', '', '', ''),
(29, '-6.73342', '107.98824', 'rumah agus deui', '', '', ''),
(30, '-6.82065', '107.94512', 'PDAM SUMEDANG', '', '', ''),
(13213, '-6.73229', '107.56929', 'ini', 'ad', 'as ', '10'),
(2131312213, '-6.81976', '107.94418', 'Hanifa Wulansari', '2131312213', ' cijeler', '11');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(100) NOT NULL,
  `namapelanggan` text NOT NULL,
  `alamat` text NOT NULL,
  `idblok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checker`
--
ALTER TABLE `checker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `kordinat_gis`
--
ALTER TABLE `kordinat_gis`
  ADD PRIMARY KEY (`nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `checker`
--
ALTER TABLE `checker`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kordinat_gis`
--
ALTER TABLE `kordinat_gis`
  MODIFY `nomor` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2131312214;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
