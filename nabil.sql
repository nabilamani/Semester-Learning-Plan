-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 10:11 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nabil`
--

-- --------------------------------------------------------

--
-- Table structure for table `capaian_pembelajaran`
--

CREATE TABLE `capaian_pembelajaran` (
  `id_cp` int(11) NOT NULL,
  `content_capaian` varchar(512) NOT NULL,
  `rps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nik` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `ttd` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `jabatan` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nik`, `name`, `password`, `photo`, `ttd`, `email`, `jabatan`) VALUES
(1234512345, 'Muhammad Nabil Amani', '123', 'nabil-photo.jpg', 'nabil-ttd.png', 'nabil@gmail.com', 'pengampu'),
(1671671677, 'Firman Asharudin', '123', 'firman-photo.jpg', 'firman-ttd.png', 'firman@gmail.com', 'pengampu'),
(234562345, 'Ria Andriani', '123', 'ria-photo.jpg', 'ria-ttd.png', 'ria@gmail.com', 'pengampu'),
(678906789, 'Barka Satya', '123', 'barka-photo.jpg', 'barka-ttd.png', 'barka@gmail.com', 'pengampu');

-- --------------------------------------------------------

--
-- Table structure for table `gambaran_umum`
--

CREATE TABLE `gambaran_umum` (
  `id_gu` int(11) NOT NULL,
  `content_gambaran` varchar(512) NOT NULL,
  `rps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prasyarat`
--

CREATE TABLE `prasyarat` (
  `id_p` int(11) NOT NULL,
  `content_prasyarat` varchar(512) NOT NULL,
  `rps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `referensi`
--

CREATE TABLE `referensi` (
  `id_r` int(11) NOT NULL,
  `content_referensi` varchar(512) NOT NULL,
  `rps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rencana_pembelajaran`
--

CREATE TABLE `rencana_pembelajaran` (
  `id_rp` int(11) NOT NULL,
  `minggu` int(2) NOT NULL,
  `rencana_kemampuan` varchar(256) NOT NULL,
  `rencana_indikator` varchar(256) NOT NULL,
  `topik` varchar(128) NOT NULL,
  `aktivitas` varchar(64) NOT NULL,
  `rencana_waktu` varchar(16) NOT NULL,
  `penilaian` varchar(128) NOT NULL,
  `rps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rps`
--

CREATE TABLE `rps` (
  `id_rps` int(11) NOT NULL,
  `nama_mata_kuliah` varchar(128) NOT NULL,
  `kode` varchar(16) NOT NULL,
  `program_studi` varchar(64) NOT NULL,
  `semester` int(1) NOT NULL,
  `bobot_sks` varchar(32) NOT NULL,
  `tanggal_berlaku` date NOT NULL,
  `tanggal_susun` date NOT NULL,
  `nomor` varchar(64) NOT NULL,
  `revisi` varchar(8) NOT NULL,
  `nilai_presensi` int(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `nilai_tugas` int(3) NOT NULL,
  `dosen_pengampu` int(11) NOT NULL,
  `dosen_kaprodi` int(11) NOT NULL,
  `dosen_sekretaris` int(11) NOT NULL,
  `dosen_dekan` int(11) NOT NULL,
  `dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rps`
--

INSERT INTO `rps` (`id_rps`, `nama_mata_kuliah`, `kode`, `program_studi`, `semester`, `bobot_sks`, `tanggal_berlaku`, `tanggal_susun`, `nomor`, `revisi`, `nilai_presensi`, `nilai_uts`, `nilai_uas`, `nilai_tugas`, `dosen_pengampu`, `dosen_kaprodi`, `dosen_sekretaris`, `dosen_dekan`, `dosen`) VALUES
(2, 'Perancangan Web 2', 'DT020', 'D3 Teknik Informatika', 3, '2 Teori', '2024-01-10', '2023-12-31', '00/RPS/2023/DT020', '', 10, 20, 30, 40, 1616161616, 1616161616, 1616161616, 1616161616, 1616161616),
(4, 'Fotografi', 'DT090', 'S1 Teknologi Informasi', 5, '2 Teori', '2024-01-02', '2024-01-01', '00/RPS/2023/TI090', '0', 10, 20, 30, 30, 234562345, 678906789, 1234512345, 1671671677, 1234512345);

-- --------------------------------------------------------

--
-- Table structure for table `tugas_penilaian`
--

CREATE TABLE `tugas_penilaian` (
  `id_tp` int(11) NOT NULL,
  `tugas` varchar(64) NOT NULL,
  `tugas_kemampuan` varchar(256) NOT NULL,
  `tugas_waktu` varchar(32) NOT NULL,
  `bobot` varchar(8) NOT NULL,
  `kriteria_penilaian` varchar(128) NOT NULL,
  `tugas_indikator` varchar(256) NOT NULL,
  `rps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `unit_pembelajaran`
--

CREATE TABLE `unit_pembelajaran` (
  `id_up` int(11) NOT NULL,
  `unit_kemampuan` varchar(256) NOT NULL,
  `unit_indikator` varchar(256) NOT NULL,
  `bahan_kajian` varchar(128) NOT NULL,
  `metode_pembelajaran` varchar(64) NOT NULL,
  `unit_waktu` varchar(32) NOT NULL,
  `metode_penilaian` varchar(64) NOT NULL,
  `bahan_ajar` varchar(128) NOT NULL,
  `rps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capaian_pembelajaran`
--
ALTER TABLE `capaian_pembelajaran`
  ADD PRIMARY KEY (`id_cp`),
  ADD KEY `fk_capaian_pembelajaran` (`rps`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `gambaran_umum`
--
ALTER TABLE `gambaran_umum`
  ADD PRIMARY KEY (`id_gu`),
  ADD KEY `fk_gambaran_umum` (`rps`);

--
-- Indexes for table `prasyarat`
--
ALTER TABLE `prasyarat`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `fk_prasyarat` (`rps`);

--
-- Indexes for table `referensi`
--
ALTER TABLE `referensi`
  ADD PRIMARY KEY (`id_r`),
  ADD KEY `fk_referensi` (`rps`);

--
-- Indexes for table `rencana_pembelajaran`
--
ALTER TABLE `rencana_pembelajaran`
  ADD PRIMARY KEY (`id_rp`),
  ADD KEY `fk_rencana_pembelajaran` (`rps`);

--
-- Indexes for table `rps`
--
ALTER TABLE `rps`
  ADD PRIMARY KEY (`id_rps`),
  ADD KEY `fk_dosen_dekan` (`dosen_dekan`),
  ADD KEY `fk_dosen_kaprodi` (`dosen_kaprodi`),
  ADD KEY `fk_dosen_pengampu` (`dosen_pengampu`),
  ADD KEY `fk_dosen_sekretaris` (`dosen_sekretaris`);

--
-- Indexes for table `tugas_penilaian`
--
ALTER TABLE `tugas_penilaian`
  ADD PRIMARY KEY (`id_tp`),
  ADD KEY `fk_tugas_penilaian` (`rps`);

--
-- Indexes for table `unit_pembelajaran`
--
ALTER TABLE `unit_pembelajaran`
  ADD PRIMARY KEY (`id_up`),
  ADD KEY `fk_unit_pembelajaran` (`rps`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `capaian_pembelajaran`
--
ALTER TABLE `capaian_pembelajaran`
  MODIFY `id_cp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gambaran_umum`
--
ALTER TABLE `gambaran_umum`
  MODIFY `id_gu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prasyarat`
--
ALTER TABLE `prasyarat`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `referensi`
--
ALTER TABLE `referensi`
  MODIFY `id_r` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rencana_pembelajaran`
--
ALTER TABLE `rencana_pembelajaran`
  MODIFY `id_rp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rps`
--
ALTER TABLE `rps`
  MODIFY `id_rps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tugas_penilaian`
--
ALTER TABLE `tugas_penilaian`
  MODIFY `id_tp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unit_pembelajaran`
--
ALTER TABLE `unit_pembelajaran`
  MODIFY `id_up` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capaian_pembelajaran`
--
ALTER TABLE `capaian_pembelajaran`
  ADD CONSTRAINT `fk_capaian_pembelajaran` FOREIGN KEY (`rps`) REFERENCES `rps` (`id_rps`);

--
-- Constraints for table `gambaran_umum`
--
ALTER TABLE `gambaran_umum`
  ADD CONSTRAINT `fk_gambaran_umum` FOREIGN KEY (`rps`) REFERENCES `rps` (`id_rps`);

--
-- Constraints for table `prasyarat`
--
ALTER TABLE `prasyarat`
  ADD CONSTRAINT `fk_prasyarat` FOREIGN KEY (`rps`) REFERENCES `rps` (`id_rps`);

--
-- Constraints for table `referensi`
--
ALTER TABLE `referensi`
  ADD CONSTRAINT `fk_referensi` FOREIGN KEY (`rps`) REFERENCES `rps` (`id_rps`);

--
-- Constraints for table `rencana_pembelajaran`
--
ALTER TABLE `rencana_pembelajaran`
  ADD CONSTRAINT `fk_rencana_pembelajaran` FOREIGN KEY (`rps`) REFERENCES `rps` (`id_rps`);

--
-- Constraints for table `rps`
--
ALTER TABLE `rps`
  ADD CONSTRAINT `fk_dosen_dekan` FOREIGN KEY (`dosen_dekan`) REFERENCES `dosen` (`nik`),
  ADD CONSTRAINT `fk_dosen_kaprodi` FOREIGN KEY (`dosen_kaprodi`) REFERENCES `dosen` (`nik`),
  ADD CONSTRAINT `fk_dosen_pengampu` FOREIGN KEY (`dosen_pengampu`) REFERENCES `dosen` (`nik`),
  ADD CONSTRAINT `fk_dosen_sekretaris` FOREIGN KEY (`dosen_sekretaris`) REFERENCES `dosen` (`nik`);

--
-- Constraints for table `tugas_penilaian`
--
ALTER TABLE `tugas_penilaian`
  ADD CONSTRAINT `fk_tugas_penilaian` FOREIGN KEY (`rps`) REFERENCES `rps` (`id_rps`);

--
-- Constraints for table `unit_pembelajaran`
--
ALTER TABLE `unit_pembelajaran`
  ADD CONSTRAINT `fk_unit_pembelajaran` FOREIGN KEY (`rps`) REFERENCES `rps` (`id_rps`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
