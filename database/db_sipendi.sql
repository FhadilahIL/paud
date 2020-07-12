-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 10:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sipendi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_admin_guru`
--

CREATE TABLE `tb_detail_admin_guru` (
  `id_user` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_orang_tua`
--

CREATE TABLE `tb_detail_orang_tua` (
  `id_user` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `pekerjaan` varchar(35) NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kompentensi_dasar`
--

CREATE TABLE `tb_kompentensi_dasar` (
  `id_kd` int(11) NOT NULL,
  `judul_kd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_kd`
--

CREATE TABLE `tb_penilaian_kd` (
  `id_nilai` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `id_sub_kd` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tanggal_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta_didik`
--

CREATE TABLE `tb_peserta_didik` (
  `id_peserta` int(11) NOT NULL,
  `no_induk` varchar(10) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `nama_panggilan` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `status` varchar(11) NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `keterangan`) VALUES
(1, 'Admin'),
(2, 'Guru'),
(3, 'Orang Tua');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kompetensi_dasar`
--

CREATE TABLE `tb_sub_kompetensi_dasar` (
  `id_sub_kd` int(11) NOT NULL,
  `judul_sub_bab` text NOT NULL,
  `id_kd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tanggal awal` date NOT NULL,
  `tanggal akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `id_role` int(11) NOT NULL,
  `foto` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `id_role`, `foto`) VALUES
(1, 'Putri Nadella', 'putri', '$2y$10$k.6L6bLSgJMqHLFVk24fm.DfXpQiKiQy6uoOpY4XGRQWIA40cWYzS', 1, 'default.jpg'),
(2, 'Sri Mulyanih', 'srimulyanih', '$2y$10$oaiZfIgGy.m9hQVdvpPUwukspRmj4/fMRZty//M9S8/78r1bMRz8W', 2, 'default.jpg'),
(3, 'nadia', 'nadia', '$2y$10$IfJSTWjMZRIczs4EsiBll.Qfb2ZRUytUehSAWnOYWEwPwYdbKEaWC', 3, 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_admin_guru`
--
ALTER TABLE `tb_detail_admin_guru`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_detail_orang_tua`
--
ALTER TABLE `tb_detail_orang_tua`
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_kompentensi_dasar`
--
ALTER TABLE `tb_kompentensi_dasar`
  ADD PRIMARY KEY (`id_kd`);

--
-- Indexes for table `tb_penilaian_kd`
--
ALTER TABLE `tb_penilaian_kd`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_sub_bab` (`id_sub_kd`);

--
-- Indexes for table `tb_peserta_didik`
--
ALTER TABLE `tb_peserta_didik`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tahun_ajaran` (`id_tahun_ajaran`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_sub_kompetensi_dasar`
--
ALTER TABLE `tb_sub_kompetensi_dasar`
  ADD PRIMARY KEY (`id_sub_kd`),
  ADD KEY `id_kd` (`id_kd`);

--
-- Indexes for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  ADD PRIMARY KEY (`id_tahun_ajaran`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kompentensi_dasar`
--
ALTER TABLE `tb_kompentensi_dasar`
  MODIFY `id_kd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_penilaian_kd`
--
ALTER TABLE `tb_penilaian_kd`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_peserta_didik`
--
ALTER TABLE `tb_peserta_didik`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_sub_kompetensi_dasar`
--
ALTER TABLE `tb_sub_kompetensi_dasar`
  MODIFY `id_sub_kd` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_admin_guru`
--
ALTER TABLE `tb_detail_admin_guru`
  ADD CONSTRAINT `tb_detail_admin_guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_orang_tua`
--
ALTER TABLE `tb_detail_orang_tua`
  ADD CONSTRAINT `tb_detail_orang_tua_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penilaian_kd`
--
ALTER TABLE `tb_penilaian_kd`
  ADD CONSTRAINT `tb_penilaian_kd_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta_didik` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penilaian_kd_ibfk_2` FOREIGN KEY (`id_sub_kd`) REFERENCES `tb_sub_kompetensi_dasar` (`id_sub_kd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_peserta_didik`
--
ALTER TABLE `tb_peserta_didik`
  ADD CONSTRAINT `tb_peserta_didik_ibfk_1` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tb_tahun_ajaran` (`id_tahun_ajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sub_kompetensi_dasar`
--
ALTER TABLE `tb_sub_kompetensi_dasar`
  ADD CONSTRAINT `tb_sub_kompetensi_dasar_ibfk_1` FOREIGN KEY (`id_kd`) REFERENCES `tb_kompentensi_dasar` (`id_kd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
