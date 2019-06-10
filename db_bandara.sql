-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 22, 2018 at 12:59 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bandara`
--
CREATE DATABASE IF NOT EXISTS `db_bandara` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_bandara`;

-- --------------------------------------------------------

--
-- Table structure for table `catatan_mutu`
--

DROP TABLE IF EXISTS `catatan_mutu`;
CREATE TABLE `catatan_mutu` (
  `id_catatan` int(3) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `id_status_cm` int(3) DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `lokasi_simpan` varchar(50) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `entry_date` datetime DEFAULT NULL,
  `id_metode` int(3) DEFAULT NULL,
  `id_admin` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `internal`
--

DROP TABLE IF EXISTS `internal`;
CREATE TABLE `internal` (
  `id` int(3) NOT NULL,
  `id_dokumen` int(3) DEFAULT NULL,
  `id_catatan` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `metode`
--

DROP TABLE IF EXISTS `metode`;
CREATE TABLE `metode` (
  `id_metode` int(3) NOT NULL,
  `metode` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `metode`
--

INSERT INTO `metode` (`id_metode`, `metode`) VALUES
(1, 'Pengalihan '),
(2, 'Pemusnahan');

-- --------------------------------------------------------

--
-- Table structure for table `regulator`
--

DROP TABLE IF EXISTS `regulator`;
CREATE TABLE `regulator` (
  `id_regulator` int(3) NOT NULL,
  `regulator` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regulator`
--

INSERT INTO `regulator` (`id_regulator`, `regulator`) VALUES
(2, 'Angkasa Pura 1'),
(3, 'Pemerintah'),
(5, 'kemkominfo'),
(7, 'OTBAN');

-- --------------------------------------------------------

--
-- Table structure for table `revisi`
--

DROP TABLE IF EXISTS `revisi`;
CREATE TABLE `revisi` (
  `id_revisi` int(3) NOT NULL,
  `revisi` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revisi`
--

INSERT INTO `revisi` (`id_revisi`, `revisi`) VALUES
(0, '00'),
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04'),
(5, '05'),
(6, '06'),
(7, '07'),
(8, '08'),
(9, '09'),
(10, '10');

-- --------------------------------------------------------

--
-- Table structure for table `status_cm`
--

DROP TABLE IF EXISTS `status_cm`;
CREATE TABLE `status_cm` (
  `id_status_cm` int(3) NOT NULL,
  `status_cm` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_cm`
--

INSERT INTO `status_cm` (`id_status_cm`, `status_cm`) VALUES
(1, 'Aktif'),
(2, 'Pasif');

-- --------------------------------------------------------

--
-- Table structure for table `status_dokumen`
--

DROP TABLE IF EXISTS `status_dokumen`;
CREATE TABLE `status_dokumen` (
  `id_status_dokumen` int(3) NOT NULL,
  `status_dokumen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_dokumen`
--

INSERT INTO `status_dokumen` (`id_status_dokumen`, `status_dokumen`) VALUES
(0, 'Pengajuan GM'),
(1, 'Revisi'),
(2, 'Setuju'),
(3, 'Baru'),
(4, 'Di Unit Terkait');

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_unit` int(3) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_user` datetime DEFAULT NULL,
  `tipe` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `id_unit`, `username`, `password`, `date_user`, `tipe`) VALUES
(1, 'Admin', 1, 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0000-00-00 00:00:00', 0),
(9, 'Muhammad Ibnu Fahmi', 2, 'ibnu', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', '2018-04-16 00:00:00', 1),
(10, 'John', 4, 'john123', 'a51dda7c7ff50b61eaea0444371f4a6a9301e501', '2018-05-16 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokumen_baru`
--

DROP TABLE IF EXISTS `tb_dokumen_baru`;
CREATE TABLE `tb_dokumen_baru` (
  `id_dokumen` int(3) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `id_jenis_dokumen` int(10) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `id_revisi` int(3) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `id_status_dokumen` int(3) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `id_admin` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_instansi`
--

DROP TABLE IF EXISTS `tb_instansi`;
CREATE TABLE `tb_instansi` (
  `id_instansi` int(3) NOT NULL,
  `instansi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_instansi`
--

INSERT INTO `tb_instansi` (`id_instansi`, `instansi`) VALUES
(1, 'UU'),
(2, 'PP'),
(3, 'PM'),
(4, 'SKEP DJU'),
(5, 'SKEP AP'),
(6, 'SKEP-AP2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_dokumen`
--

DROP TABLE IF EXISTS `tb_jenis_dokumen`;
CREATE TABLE `tb_jenis_dokumen` (
  `id_jenis_dokumen` int(10) NOT NULL,
  `jenis_dokumen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_dokumen`
--

INSERT INTO `tb_jenis_dokumen` (`id_jenis_dokumen`, `jenis_dokumen`) VALUES
(1, 'Intruksi Kerja'),
(3, 'pedoman'),
(4, 'prosedur'),
(7, 'Manual');

-- --------------------------------------------------------

--
-- Table structure for table `tb_peraturan`
--

DROP TABLE IF EXISTS `tb_peraturan`;
CREATE TABLE `tb_peraturan` (
  `id_peraturan` int(3) NOT NULL,
  `id_instansi` int(3) DEFAULT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `tahun` int(10) DEFAULT NULL,
  `id_regulator` int(3) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `masa_berlaku` date DEFAULT NULL,
  `id_admin` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit` (
  `id_unit` int(3) NOT NULL,
  `unit` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `unit`) VALUES
(1, 'Quality Management Section '),
(2, 'Application Operation & Support Section'),
(3, 'Airport Technology , Network Operation'),
(4, 'Airport Readiness Section '),
(5, 'General Manager ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catatan_mutu`
--
ALTER TABLE `catatan_mutu`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `id_metode` (`id_metode`),
  ADD KEY `status_cm` (`id_status_cm`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `internal`
--
ALTER TABLE `internal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_catatan` (`id_catatan`),
  ADD KEY `id_dokumen` (`id_dokumen`);

--
-- Indexes for table `metode`
--
ALTER TABLE `metode`
  ADD PRIMARY KEY (`id_metode`);

--
-- Indexes for table `regulator`
--
ALTER TABLE `regulator`
  ADD PRIMARY KEY (`id_regulator`);

--
-- Indexes for table `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`id_revisi`);

--
-- Indexes for table `status_cm`
--
ALTER TABLE `status_cm`
  ADD PRIMARY KEY (`id_status_cm`);

--
-- Indexes for table `status_dokumen`
--
ALTER TABLE `status_dokumen`
  ADD PRIMARY KEY (`id_status_dokumen`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD KEY `tipe` (`tipe`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `tb_dokumen_baru`
--
ALTER TABLE `tb_dokumen_baru`
  ADD PRIMARY KEY (`id_dokumen`),
  ADD KEY `jenis_dokumen` (`id_jenis_dokumen`),
  ADD KEY `id_keterangan` (`keterangan`),
  ADD KEY `status` (`id_status_dokumen`),
  ADD KEY `revisi` (`id_revisi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `tb_jenis_dokumen`
--
ALTER TABLE `tb_jenis_dokumen`
  ADD PRIMARY KEY (`id_jenis_dokumen`);

--
-- Indexes for table `tb_peraturan`
--
ALTER TABLE `tb_peraturan`
  ADD PRIMARY KEY (`id_peraturan`),
  ADD KEY `regulator` (`id_regulator`),
  ADD KEY `nomer` (`id_instansi`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catatan_mutu`
--
ALTER TABLE `catatan_mutu`
  MODIFY `id_catatan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `internal`
--
ALTER TABLE `internal`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `regulator`
--
ALTER TABLE `regulator`
  MODIFY `id_regulator` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `revisi`
--
ALTER TABLE `revisi`
  MODIFY `id_revisi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_dokumen_baru`
--
ALTER TABLE `tb_dokumen_baru`
  MODIFY `id_dokumen` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_instansi`
--
ALTER TABLE `tb_instansi`
  MODIFY `id_instansi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_jenis_dokumen`
--
ALTER TABLE `tb_jenis_dokumen`
  MODIFY `id_jenis_dokumen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_peraturan`
--
ALTER TABLE `tb_peraturan`
  MODIFY `id_peraturan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `catatan_mutu`
--
ALTER TABLE `catatan_mutu`
  ADD CONSTRAINT `catatan_mutu_ibfk_2` FOREIGN KEY (`id_metode`) REFERENCES `metode` (`id_metode`),
  ADD CONSTRAINT `catatan_mutu_ibfk_3` FOREIGN KEY (`id_status_cm`) REFERENCES `status_cm` (`id_status_cm`),
  ADD CONSTRAINT `catatan_mutu_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`);

--
-- Constraints for table `internal`
--
ALTER TABLE `internal`
  ADD CONSTRAINT `internal_ibfk_1` FOREIGN KEY (`id_catatan`) REFERENCES `catatan_mutu` (`id_catatan`),
  ADD CONSTRAINT `internal_ibfk_2` FOREIGN KEY (`id_dokumen`) REFERENCES `tb_dokumen_baru` (`id_dokumen`);

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Constraints for table `tb_dokumen_baru`
--
ALTER TABLE `tb_dokumen_baru`
  ADD CONSTRAINT `tb_dokumen_baru_ibfk_5` FOREIGN KEY (`id_jenis_dokumen`) REFERENCES `tb_jenis_dokumen` (`id_jenis_dokumen`),
  ADD CONSTRAINT `tb_dokumen_baru_ibfk_7` FOREIGN KEY (`id_status_dokumen`) REFERENCES `status_dokumen` (`id_status_dokumen`),
  ADD CONSTRAINT `tb_dokumen_baru_ibfk_8` FOREIGN KEY (`id_revisi`) REFERENCES `revisi` (`id_revisi`),
  ADD CONSTRAINT `tb_dokumen_baru_ibfk_9` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`);

--
-- Constraints for table `tb_peraturan`
--
ALTER TABLE `tb_peraturan`
  ADD CONSTRAINT `tb_peraturan_ibfk_3` FOREIGN KEY (`id_instansi`) REFERENCES `tb_instansi` (`id_instansi`),
  ADD CONSTRAINT `tb_peraturan_ibfk_5` FOREIGN KEY (`id_regulator`) REFERENCES `regulator` (`id_regulator`),
  ADD CONSTRAINT `tb_peraturan_ibfk_6` FOREIGN KEY (`id_admin`) REFERENCES `tb_admin` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
