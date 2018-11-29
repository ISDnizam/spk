-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 01:44 PM
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
-- Database: `spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_decision_maker`
--

CREATE TABLE `tbl_decision_maker` (
  `id_decision_maker` int(11) NOT NULL,
  `penilai` varchar(110) NOT NULL,
  `bagian` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_decision_maker`
--

INSERT INTO `tbl_decision_maker` (`id_decision_maker`, `penilai`, `bagian`) VALUES
(1, 'PDM', 'Pimpinan harian muhammadiyah'),
(2, 'Direksi', 'Kepala Divisi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_golongan`
--

CREATE TABLE `tbl_golongan` (
  `id_golongan` int(11) NOT NULL,
  `pendidikan` varchar(120) NOT NULL,
  `golongan_awal` varchar(120) NOT NULL,
  `golongan_akhir` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_golongan`
--

INSERT INTO `tbl_golongan` (`id_golongan`, `pendidikan`, `golongan_awal`, `golongan_akhir`) VALUES
(1, 'SD', '1A', '1D'),
(2, 'SLTP', 'IB', 'IIB'),
(3, 'SLTA', 'IIA', 'IID'),
(4, 'D1', 'IIA', 'IIIA'),
(5, 'D3', 'IIB', 'IIIC'),
(6, 'S1', 'IIIA', 'IIID'),
(7, 'DOKTER/APOTEKER/NERS', 'IIIB', 'IVA'),
(8, 'S2', 'IIIB', 'IVB');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `id_group` int(11) NOT NULL,
  `nama_group` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`id_group`, `nama_group`) VALUES
(1, 'Medis'),
(2, 'Non  Medis');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group_karyawan`
--

CREATE TABLE `tbl_group_karyawan` (
  `id_group_karyawan` int(11) NOT NULL,
  `nama_group_karyawan` varchar(120) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_group_karyawan`
--

INSERT INTO `tbl_group_karyawan` (`id_group_karyawan`, `nama_group_karyawan`, `id_group`) VALUES
(1, 'Perawat', 1),
(2, 'Bidan', 1),
(3, 'Farmasi', 1),
(6, 'Rekam medis', 2),
(7, 'Keuangan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_karyawan` varchar(120) NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `id_golongan` int(11) NOT NULL,
  `tahun_masuk` int(11) NOT NULL,
  `masa_kerja` varchar(120) NOT NULL,
  `id_group_karyawan` int(11) NOT NULL,
  `status_karyawan` enum('aktif','non aktif') NOT NULL DEFAULT 'aktif',
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `nik`, `nama_karyawan`, `jenis_kelamin`, `id_golongan`, `tahun_masuk`, `masa_kerja`, `id_group_karyawan`, `status_karyawan`, `id_user`) VALUES
(4, 200120091, 'Nisa Khoirun', 'Perempuan', 8, 2016, '2 tahun', 7, 'aktif', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `kode_kriteria` varchar(10) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `prioritas` int(11) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `kode_kriteria`, `nama_kriteria`, `prioritas`, `id_group`) VALUES
(1, 'K-1', 'Aspek Kemuhammadiyahan', 4, 1),
(2, 'K-2', 'ASPEK UMUM', 2, 1),
(3, 'K-3', 'ASPEK MUTU PELAYANAN', 1, 1),
(4, 'K-4', 'ASPEK KEHADIRAN', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_sub_kriteria` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`id_penilaian`, `id_karyawan`, `id_sub_kriteria`, `nilai`, `id_user`) VALUES
(3, 4, 2, 60, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_kriteria`
--

CREATE TABLE `tbl_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `kode_sub_kriteria` varchar(10) NOT NULL,
  `nama_sub_kriteria` varchar(120) NOT NULL,
  `prioritas` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_kriteria`
--

INSERT INTO `tbl_sub_kriteria` (`id_sub_kriteria`, `kode_sub_kriteria`, `nama_sub_kriteria`, `prioritas`, `id_kriteria`) VALUES
(1, 'K-1.1', 'Tes Tertulis', 4, 1),
(2, 'K-1.2', 'Tes Baca Al-Qur\'an', 3, 1),
(3, 'K-1.3', 'Tes Hafalan', 2, 1),
(4, 'K-1.4', 'Praktek Sholat', 1, 1),
(5, 'K-2.1', 'Etika', 1, 2),
(6, 'K-2.2', 'Ketelitian', 2, 2),
(7, 'K-2.2', 'Kerjasama', 3, 2),
(8, 'K-2.3', 'Taat', 4, 2),
(9, 'k-2.9', 'tekanan', 7, 2),
(10, 'K-2.7', 'penyelesaian', 8, 2),
(11, 'K-2.8', 'mandiri', 9, 2),
(12, 'K-2.9', 'kreatifitas', 10, 2),
(13, 'K-2.10', 'jujur', 6, 2),
(14, 'K-2.11', 'komunikasi', 11, 2),
(15, 'K-2.12', 'APD', 12, 2),
(16, 'K-2.13', 'Hand Hyegiene', 13, 2),
(17, 'k-3.1', 'pengkajian', 1, 3),
(18, 'k-3.2', 'rumusan', 2, 3),
(19, 'k-3.3', 'tindakan', 3, 3),
(20, 'k-3.4', 'asuhan', 4, 3),
(21, 'k-3.5', 'sapa', 5, 3),
(22, 'k-3.6', 'evaluasi', 6, 3),
(23, 'k-3.7', 'komunikasi', 7, 3),
(24, 'k-3.8', 'subjek', 8, 3),
(25, 'k-3.9', 'objek', 9, 3),
(26, 'k-3.10', 'dokumentasi tindakan', 10, 3),
(27, 'k-11', 'dokumen tindakan perawat', 11, 3),
(28, 'k-3.12', 'soap', 12, 3),
(29, 'k-4.1', 'ketepatan', 1, 4),
(30, 'k-4.2', 'lembur', 3, 4),
(31, 'k-4.3', 'izin', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(220) NOT NULL,
  `password` text NOT NULL,
  `status` enum('aktif','non aktif') NOT NULL,
  `level` enum('admin','user','direksi','pdm') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_user`, `username`, `email`, `password`, `status`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', 'admin'),
(4, '200120091', 'nis@gmail.com', 'f26d48217b8d17dbdbb1d1b760fcc43f', 'aktif', 'user'),
(5, '20001929', 'pdm@gmail.com', '0eb910c6957ed1a3eaec041211193c6f', 'aktif', 'pdm'),
(6, '2200120037', 'dir@gmail.com', 'd734cb33810bfcbcb31628823f76dc91', 'aktif', 'direksi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_decision_maker`
--
ALTER TABLE `tbl_decision_maker`
  ADD PRIMARY KEY (`id_decision_maker`);

--
-- Indexes for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `tbl_group_karyawan`
--
ALTER TABLE `tbl_group_karyawan`
  ADD PRIMARY KEY (`id_group_karyawan`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_decision_maker`
--
ALTER TABLE `tbl_decision_maker`
  MODIFY `id_decision_maker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_golongan`
--
ALTER TABLE `tbl_golongan`
  MODIFY `id_golongan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_group_karyawan`
--
ALTER TABLE `tbl_group_karyawan`
  MODIFY `id_group_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
