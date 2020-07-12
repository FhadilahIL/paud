-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 02:31 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `tb_catatan_peserta`
--

CREATE TABLE `tb_catatan_peserta` (
  `id_catatan` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `tanggal_catatan` date NOT NULL,
  `id_peserta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_catatan_peserta`
--

INSERT INTO `tb_catatan_peserta` (`id_catatan`, `catatan`, `tanggal_catatan`, `id_peserta`) VALUES
(1, 'Lebih Banyak Belajar Lagi', '2020-07-05', 7),
(2, 'Lebih Banyak Belajar Lagi', '2020-07-07', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_admin_guru`
--

CREATE TABLE `tb_detail_admin_guru` (
  `id_user` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detail_admin_guru`
--

INSERT INTO `tb_detail_admin_guru` (`id_user`, `alamat`, `no_hp`) VALUES
(19, 'MM', '089877225511'),
(28, '', '');

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

--
-- Dumping data for table `tb_detail_orang_tua`
--

INSERT INTO `tb_detail_orang_tua` (`id_user`, `alamat`, `pekerjaan`, `no_hp`) VALUES
(27, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kompetensi_dasar`
--

CREATE TABLE `tb_kompetensi_dasar` (
  `id_kd` int(11) NOT NULL,
  `judul_kd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kompetensi_dasar`
--

INSERT INTO `tb_kompetensi_dasar` (`id_kd`, `judul_kd`) VALUES
(1, 'AA'),
(2, 'B'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_emosi`
--

CREATE TABLE `tb_penilaian_emosi` (
  `id_penilaian_emosi` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `menangis` varchar(15) NOT NULL,
  `memukul` varchar(15) NOT NULL,
  `marah` varchar(15) NOT NULL,
  `diam` varchar(15) NOT NULL,
  `melamun` varchar(15) NOT NULL,
  `gembira` varchar(15) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penilaian_emosi`
--

INSERT INTO `tb_penilaian_emosi` (`id_penilaian_emosi`, `id_peserta`, `menangis`, `memukul`, `marah`, `diam`, `melamun`, `gembira`, `id_semester`) VALUES
(1, 7, 'Tidak Pernah', 'Tidak Pernah', 'Kadang', 'Kadang', 'Tidak Pernah', 'Sering', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_kd`
--

CREATE TABLE `tb_penilaian_kd` (
  `id_nilai` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `id_sub_kd` int(11) NOT NULL,
  `nilai_checklist` varchar(50) NOT NULL,
  `nilai_karya` varchar(50) NOT NULL,
  `tanggal_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penilaian_kd`
--

INSERT INTO `tb_penilaian_kd` (`id_nilai`, `id_peserta`, `id_sub_kd`, `nilai_checklist`, `nilai_karya`, `tanggal_penilaian`) VALUES
(1, 7, 1, 'Belum Berkembang', 'Berkembang Sesuai Harapan', '2020-07-05'),
(2, 8, 1, 'Belum Berkembang', 'Berkembang Sesuai Harapan', '2020-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penilaian_kesehatan`
--

CREATE TABLE `tb_penilaian_kesehatan` (
  `id_penilaian_kesehatan` int(11) NOT NULL,
  `id_peserta` int(11) NOT NULL,
  `mata` varchar(7) NOT NULL,
  `mulut` varchar(7) NOT NULL,
  `gigi` varchar(7) NOT NULL,
  `telinga` varchar(7) NOT NULL,
  `hidung` varchar(7) NOT NULL,
  `anggota_badan` varchar(7) NOT NULL,
  `berat_badan` int(4) NOT NULL,
  `tinggi_badan` int(4) NOT NULL,
  `id_semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penilaian_kesehatan`
--

INSERT INTO `tb_penilaian_kesehatan` (`id_penilaian_kesehatan`, `id_peserta`, `mata`, `mulut`, `gigi`, `telinga`, `hidung`, `anggota_badan`, `berat_badan`, `tinggi_badan`, `id_semester`) VALUES
(1, 7, 'Kurang', 'Baik', 'Cukup', 'Baik', 'Baik', 'Baik', 43, 170, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_peserta_didik`
--

CREATE TABLE `tb_peserta_didik` (
  `id_peserta` int(11) NOT NULL,
  `no_induk` varchar(12) NOT NULL,
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

--
-- Dumping data for table `tb_peserta_didik`
--

INSERT INTO `tb_peserta_didik` (`id_peserta`, `no_induk`, `nama_lengkap`, `nama_panggilan`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `anak_ke`, `id_user`, `tanggal_masuk`, `status`, `id_tahun_ajaran`) VALUES
(7, 'B1/001/20.21', 'Muhammad Ilham Fhadilah', 'Fhadilah', 'L', 'Islam', 'Tangerang Selatan', '2010-08-01', 1, 27, '0000-00-00 00:00:00', 'Aktif', 3),
(8, 'B1/002/20.21', 'Muhammad Ilham', 'Ilham', 'L', 'Islam', 'Tangerang Selatan', '2010-08-01', 1, 27, '2020-07-11 09:17:06', 'Aktif', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_profile_sekolah`
--

CREATE TABLE `tb_profile_sekolah` (
  `id_sekolah` int(11) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `npsn` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `fax` varchar(10) NOT NULL,
  `email_sekolah` varchar(35) NOT NULL,
  `kepala_sekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profile_sekolah`
--

INSERT INTO `tb_profile_sekolah` (`id_sekolah`, `nama_sekolah`, `npsn`, `alamat`, `no_telp`, `fax`, `email_sekolah`, `kepala_sekolah`) VALUES
(1, 'PAUD MELATI JOMBANG', '0123456782', 'Jombang, Tangsel', '021-7563467', '-', 'paudmelati@paud.com', 'Nadella');

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
-- Table structure for table `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `id_tahun_ajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`, `mulai`, `selesai`, `id_tahun_ajaran`) VALUES
(1, 1, '2020-07-06', '2020-12-19', 3),
(2, 2, '2021-01-04', '2021-06-19', 3),
(4, 1, '2021-07-04', '2021-12-18', 4),
(6, 2, '2022-01-04', '2022-06-18', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sub_kompetensi_dasar`
--

CREATE TABLE `tb_sub_kompetensi_dasar` (
  `id_sub_kd` int(11) NOT NULL,
  `judul_sub_kd` text NOT NULL,
  `id_kd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_sub_kompetensi_dasar`
--

INSERT INTO `tb_sub_kompetensi_dasar` (`id_sub_kd`, `judul_sub_kd`, `id_kd`) VALUES
(1, 'BA', 2),
(3, 'ABC', 1),
(5, 'DA', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahun_ajaran`
--

CREATE TABLE `tb_tahun_ajaran` (
  `id_tahun_ajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tahun_ajaran`
--

INSERT INTO `tb_tahun_ajaran` (`id_tahun_ajaran`, `tahun_ajaran`) VALUES
(3, '2020 / 2021'),
(4, '2021 / 2022');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` text NOT NULL,
  `id_role` int(11) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `id_role`, `foto`) VALUES
(19, 'Putri Nadella Junialdi', 'putri', '$2y$10$rU1ssxJUguQfdrCs75VKTOOv8SlgHPAs9VXSJqCuqFjzeQgn2kOZu', 1, '1faaced5ecfcc65ed508042f7930ff1a.PNG'),
(27, 'Hanifa Nurnisa', 'nisa', '$2y$10$.VI9Kq/YBil7iR5t5VOrp.qHfm.5vtyzqP3XcaIGvOkoGpxQmb7M2', 3, 'fa7f28c54060a0eb622f706c2cc63f5a.png'),
(28, 'Aris Indrawan', 'aris', '$2y$10$iEpslmK7UFm.P2ntJuR5VeBP4CkB0LJ3FqR3cNZ9g40insz7se4ua', 2, '4a80e70d0e22674684c4aca0ec99e5b5.PNG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_catatan_peserta`
--
ALTER TABLE `tb_catatan_peserta`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `id_peserta` (`id_peserta`);

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
-- Indexes for table `tb_kompetensi_dasar`
--
ALTER TABLE `tb_kompetensi_dasar`
  ADD PRIMARY KEY (`id_kd`);

--
-- Indexes for table `tb_penilaian_emosi`
--
ALTER TABLE `tb_penilaian_emosi`
  ADD PRIMARY KEY (`id_penilaian_emosi`),
  ADD KEY `id_semester` (`id_semester`),
  ADD KEY `id_peserta` (`id_peserta`);

--
-- Indexes for table `tb_penilaian_kd`
--
ALTER TABLE `tb_penilaian_kd`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_sub_bab` (`id_sub_kd`);

--
-- Indexes for table `tb_penilaian_kesehatan`
--
ALTER TABLE `tb_penilaian_kesehatan`
  ADD PRIMARY KEY (`id_penilaian_kesehatan`),
  ADD KEY `id_peserta` (`id_peserta`),
  ADD KEY `id_semester` (`id_semester`);

--
-- Indexes for table `tb_peserta_didik`
--
ALTER TABLE `tb_peserta_didik`
  ADD PRIMARY KEY (`id_peserta`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tahun_ajaran` (`id_tahun_ajaran`);

--
-- Indexes for table `tb_profile_sekolah`
--
ALTER TABLE `tb_profile_sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`),
  ADD KEY `id_tahun_ajaran` (`id_tahun_ajaran`);

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
-- AUTO_INCREMENT for table `tb_catatan_peserta`
--
ALTER TABLE `tb_catatan_peserta`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kompetensi_dasar`
--
ALTER TABLE `tb_kompetensi_dasar`
  MODIFY `id_kd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_penilaian_emosi`
--
ALTER TABLE `tb_penilaian_emosi`
  MODIFY `id_penilaian_emosi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_penilaian_kd`
--
ALTER TABLE `tb_penilaian_kd`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_penilaian_kesehatan`
--
ALTER TABLE `tb_penilaian_kesehatan`
  MODIFY `id_penilaian_kesehatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_peserta_didik`
--
ALTER TABLE `tb_peserta_didik`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_profile_sekolah`
--
ALTER TABLE `tb_profile_sekolah`
  MODIFY `id_sekolah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_sub_kompetensi_dasar`
--
ALTER TABLE `tb_sub_kompetensi_dasar`
  MODIFY `id_sub_kd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_catatan_peserta`
--
ALTER TABLE `tb_catatan_peserta`
  ADD CONSTRAINT `tb_catatan_peserta_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta_didik` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_admin_guru`
--
ALTER TABLE `tb_detail_admin_guru`
  ADD CONSTRAINT `tb_detail_admin_guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_detail_orang_tua`
--
ALTER TABLE `tb_detail_orang_tua`
  ADD CONSTRAINT `tb_detail_orang_tua_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_penilaian_emosi`
--
ALTER TABLE `tb_penilaian_emosi`
  ADD CONSTRAINT `tb_penilaian_emosi_ibfk_1` FOREIGN KEY (`id_semester`) REFERENCES `tb_semester` (`id_semester`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penilaian_emosi_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta_didik` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penilaian_kd`
--
ALTER TABLE `tb_penilaian_kd`
  ADD CONSTRAINT `tb_penilaian_kd_ibfk_3` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta_didik` (`id_peserta`),
  ADD CONSTRAINT `tb_penilaian_kd_ibfk_4` FOREIGN KEY (`id_sub_kd`) REFERENCES `tb_sub_kompetensi_dasar` (`id_sub_kd`);

--
-- Constraints for table `tb_penilaian_kesehatan`
--
ALTER TABLE `tb_penilaian_kesehatan`
  ADD CONSTRAINT `tb_penilaian_kesehatan_ibfk_1` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta_didik` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penilaian_kesehatan_ibfk_2` FOREIGN KEY (`id_semester`) REFERENCES `tb_semester` (`id_semester`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_peserta_didik`
--
ALTER TABLE `tb_peserta_didik`
  ADD CONSTRAINT `tb_peserta_didik_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_peserta_didik_ibfk_3` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tb_tahun_ajaran` (`id_tahun_ajaran`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD CONSTRAINT `tb_semester_ibfk_1` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tb_tahun_ajaran` (`id_tahun_ajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sub_kompetensi_dasar`
--
ALTER TABLE `tb_sub_kompetensi_dasar`
  ADD CONSTRAINT `tb_sub_kompetensi_dasar_ibfk_1` FOREIGN KEY (`id_kd`) REFERENCES `tb_kompetensi_dasar` (`id_kd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
