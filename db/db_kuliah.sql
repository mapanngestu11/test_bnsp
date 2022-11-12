-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2022 at 01:04 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `kehadiran` int(1) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_absen`
--

INSERT INTO `tbl_absen` (`id`, `nim`, `kode_mk`, `kehadiran`, `tanggal`) VALUES
(1, '1631395512', 'TIK001', 1, '2022-11-10'),
(3, '1631395512', 'TIK001', 1, '2022-11-09'),
(4, '1631395512', 'TIK001', 1, '2022-11-08'),
(5, '1631395512', 'TIK001', 0, '2022-11-07'),
(6, '1631395512', 'TIK001', 0, '2022-11-04'),
(7, '1631395587', 'TIK001', 1, '2022-11-10'),
(8, '1631395512', 'TIK001', 1, '2022-11-03'),
(9, '1631395512', 'TIK001', 1, '2022-11-02'),
(10, '1631395512', 'TIK001', 1, '2022-11-01'),
(11, '1631395512', 'TIK001', 1, '2022-10-31'),
(12, '1631395512', 'TIK001', 1, '2022-10-28'),
(13, '1631395587', 'TIK001', 1, '2022-11-09'),
(14, '1631395587', 'TIK001', 1, '2022-11-08'),
(15, '1631395587', 'TIK001', 1, '2022-11-07'),
(16, '1631395587', 'TIK001', 1, '2022-11-04'),
(17, '1631395587', 'TIK001', 1, '2022-11-03'),
(18, '1631395587', 'TIK001', 1, '2022-11-02'),
(19, '1631395587', 'TIK001', 1, '2022-11-01'),
(20, '1631395587', 'TIK001', 1, '2022-10-31'),
(21, '1631395587', 'TIK001', 1, '2022-10-28'),
(22, '1631395444', 'TIK001', 1, '2022-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `no_hp` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id`, `nama`, `nim`, `jurusan`, `no_hp`) VALUES
(5, 'Budi', '1631395512', 'Teknik Informatika', '08588824117'),
(7, 'Rendi', '1631395587', 'Sistem Informasi', '08588824122'),
(8, 'Tasya', '1631395444', 'Teknik Informatika', '08588824334');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_matakuliah`
--

CREATE TABLE `tbl_matakuliah` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `matakuliah` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_matakuliah`
--

INSERT INTO `tbl_matakuliah` (`id`, `kode_mk`, `matakuliah`) VALUES
(1, 'TIK001', 'Teknologi Informasi'),
(2, 'TIK002', 'Rekayasa Perangkat Lunak'),
(3, 'TIK003', 'Pemograman Java');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_ujian`
--

CREATE TABLE `tbl_nilai_ujian` (
  `id` int(11) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `uts` int(10) NOT NULL,
  `uas` int(10) NOT NULL,
  `tugas` int(10) NOT NULL,
  `total_nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai_ujian`
--

INSERT INTO `tbl_nilai_ujian` (`id`, `kode_mk`, `nim`, `uts`, `uas`, `tugas`, `total_nilai`) VALUES
(5, 'TIK001', '1631395512', 80, 92, 78, 76),
(6, 'TIK001', '1631395587', 90, 90, 90, 81),
(18, 'TIK001', '1631395444', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_matakuliah`
--
ALTER TABLE `tbl_matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_nilai_ujian`
--
ALTER TABLE `tbl_nilai_ujian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
