-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 08:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `contents` text NOT NULL,
  `admin` varchar(20) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'aktif'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `contents`, `admin`, `status`) VALUES
(22, 'ganti oli', 'Stock', 'aktif'),
(24, 'beli bahan benang', 'Admin', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `sbrg_keluar`
--

CREATE TABLE `sbrg_keluar` (
  `id` int(11) NOT NULL,
  `idx` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `penerima` varchar(35) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sbrg_keluar`
--

INSERT INTO `sbrg_keluar` (`id`, `idx`, `tgl`, `jumlah`, `penerima`, `keterangan`) VALUES
(15, 244, '2020-08-29', 1000, 'Kasmina', 'Laku'),
(16, 245, '2024-05-01', 5, 'Operator', 'Bahan'),
(17, 254, '2024-04-21', 1, 'Operator', 'peralatan'),
(18, 253, '2024-05-25', 1, 'Operator', 'peralatan'),
(19, 245, '2024-04-27', 10, 'Operator', 'peralatan'),
(20, 252, '2024-04-30', 1, 'Operator', 'peralatan'),
(21, 250, '2024-05-10', 1, 'Operator', 'peralatan');

-- --------------------------------------------------------

--
-- Table structure for table `sbrg_masuk`
--

CREATE TABLE `sbrg_masuk` (
  `id` int(11) NOT NULL,
  `idx` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sbrg_masuk`
--

INSERT INTO `sbrg_masuk` (`id`, `idx`, `tgl`, `jumlah`, `keterangan`) VALUES
(9, 244, '2020-08-07', 600, 'kk'),
(13, 245, '2024-05-01', 3, 'Bahan'),
(14, 246, '2024-01-02', 1, 'peralatan'),
(15, 247, '2024-05-09', 2, 'peralatan'),
(16, 254, '2024-04-20', 2, 'peralatan'),
(17, 245, '2024-04-22', 2, 'bahan'),
(18, 258, '2024-05-22', 1, 'peralatan'),
(19, 256, '2024-04-27', 1, 'peralatan'),
(20, 253, '2024-04-30', 1, 'peralatan'),
(21, 251, '2024-05-01', 2, 'peralatan'),
(22, 257, '2024-05-04', 2, 'peralatan'),
(23, 250, '2024-05-08', 1, 'peralatan'),
(24, 255, '2024-05-11', 10, 'peralatan'),
(25, 252, '2024-05-17', 1, 'peralatan');

-- --------------------------------------------------------

--
-- Table structure for table `slogin`
--

CREATE TABLE `slogin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `slogin`
--

INSERT INTO `slogin` (`id`, `username`, `password`, `nickname`, `role`) VALUES
(7, 'guest', '084e0343a0486ff05530df6c705c8bb4', 'Admin', 'stock');

-- --------------------------------------------------------

--
-- Table structure for table `sstock_brg`
--

CREATE TABLE `sstock_brg` (
  `idx` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `merk` varchar(40) NOT NULL,
  `ukuran` varchar(20) NOT NULL,
  `stock` int(12) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `lokasi` varchar(55) NOT NULL,
  `gambar` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sstock_brg`
--

INSERT INTO `sstock_brg` (`idx`, `nama`, `jenis`, `merk`, `ukuran`, `stock`, `satuan`, `harga`, `lokasi`, `gambar`) VALUES
(252, 'stabilizer', 'peralatan', 'matsunaga', '', 1, 'Buah', '5000000', 'ruang produksi', 0x494d475f32303234303531395f3138343135372e6a7067),
(253, 'mesin jahit manual', 'peralatan', '-', '1x1 meter', 6, 'Unit', '15000000', 'ruang produksi', 0x494d475f32303234303531395f3138333732302e6a7067),
(250, 'oven', 'peralatan', '-', '2x2 meter', 1, 'Buah', '10000000', 'ruang packing', 0x494d475f32303234303531395f3138323935372e6a7067),
(251, 'mesin jahit otomatis', 'peralatan', '-', '2x2 meter', 6, 'Unit', '99000000', 'ruang produksi', 0x494d475f32303234303531395f3138333730302e6a7067),
(254, 'alat pembalik kaos kaki', 'peralatan', '-', '-', 7, 'Buah', '150000', 'ruang produksi', 0x494d475f32303234303531395f3138333233362e6a7067),
(255, 'plat cetak kaos kaki', 'peralatan', '-', 'xl', 70, 'Buah', '50000', 'ruang packing', 0x494d475f32303234303531395f3138323930382e6a7067),
(256, 'kompressor', 'peralatan', 'shark', '-', 3, 'Buah', '5000000', 'ruang produksi', 0x494d475f32303234303531395f3138343031342e6a7067),
(257, 'mesin obras', 'peralatan', '-', '-', 3, 'Unit', '10000000', 'ruang produksi', 0x494d475f32303234303531395f3138323730372e6a7067),
(258, 'blower', 'peralatan', '-', '-', 3, 'Buah', '10000000', 'ruang produksi', 0x494d475f32303234303531395f3138343033332e6a7067),
(259, 'benangnylo', 'bahan', '-', '-', 3, 'Buah', '3000', 'laci meja', 0x62656e616e672e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbrg_keluar`
--
ALTER TABLE `sbrg_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sbrg_masuk`
--
ALTER TABLE `sbrg_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slogin`
--
ALTER TABLE `slogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sstock_brg`
--
ALTER TABLE `sstock_brg`
  ADD PRIMARY KEY (`idx`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sbrg_keluar`
--
ALTER TABLE `sbrg_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sbrg_masuk`
--
ALTER TABLE `sbrg_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `slogin`
--
ALTER TABLE `slogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sstock_brg`
--
ALTER TABLE `sstock_brg`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
