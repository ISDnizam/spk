-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 06:11 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk3`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perhitungan_borda`
--

CREATE TABLE `tbl_perhitungan_borda` (
  `id_perhitungan_borda` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_groupaspek` int(11) NOT NULL,
  `poin_borda` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_perhitungan_borda`
--

INSERT INTO `tbl_perhitungan_borda` (`id_perhitungan_borda`, `id_karyawan`, `id_groupaspek`, `poin_borda`) VALUES
(1, 5, 1, 8.5315),
(2, 4, 1, 4.8664),
(3, 6, 1, 0.3921),
(4, 5, 2, 0),
(5, 6, 2, 0),
(6, 4, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_perhitungan_borda`
--
ALTER TABLE `tbl_perhitungan_borda`
  ADD PRIMARY KEY (`id_perhitungan_borda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_perhitungan_borda`
--
ALTER TABLE `tbl_perhitungan_borda`
  MODIFY `id_perhitungan_borda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
