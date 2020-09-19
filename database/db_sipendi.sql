-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2020 at 09:07 AM
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
(3, 'good job', '2020-09-18', 9),
(4, 'test', '2020-09-18', 24),
(5, 'test1', '2020-09-18', 25),
(6, 'k', '2020-09-19', 27);

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
(28, '', '089677886644');

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
(29, '', '', ''),
(30, '', '', ''),
(31, '', '', ''),
(32, '', '', ''),
(33, '', '', ''),
(34, '', '', ''),
(35, '', '', ''),
(36, '', '', ''),
(37, '', '', ''),
(38, '', '', ''),
(39, '', '', ''),
(40, '', '', ''),
(41, '', '', ''),
(42, '', '', ''),
(43, '', '', ''),
(44, 'Puri Bintaro Indah RT 05 / RW 22, Jombang', 'Karyawan Swasta', '089505998520'),
(45, '', '', ''),
(46, '', '', ''),
(47, '', '', ''),
(48, '', '', ''),
(49, '', '', ''),
(50, '', '', ''),
(51, '', '', ''),
(52, '', '', ''),
(53, '', '', ''),
(54, '', '', ''),
(55, '', '', ''),
(56, '', '', ''),
(57, '', '', ''),
(58, '', '', '');

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
(6, '1. Nilai Agama dan Moral'),
(7, '2. Fisik Motorik'),
(8, '3. Kognitif'),
(9, '4. Sosial Emosional'),
(10, '5. Bahasa'),
(11, '6. Seni');

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
(5, 9, 'Tidak Pernah', 'Kadang', 'Kadang', 'Sering', 'Tidak Pernah', 'Sering', 1),
(6, 27, 'Kadang', 'Kadang', 'Kadang', 'Kadang', 'Tidak Pernah', 'Kadang', 1);

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
(5, 9, 8, ' Belum Berkembang', 'Berkembang Sesuai Harapan', '2020-09-18'),
(6, 24, 9, 'Mulai Berkembang', 'Mulai Berkembang', '2020-09-18'),
(7, 25, 12, 'Mulai Berkembang', 'Mulai Berkembang', '2020-09-18'),
(8, 28, 12, 'Mulai Berkembang', 'Mulai Berkembang', '2020-09-19'),
(9, 27, 10, 'Mulai Berkembang', 'Berkembang Sesuai Harapan', '2020-09-19');

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
(5, 9, 'Cukup', 'Cukup', 'Baik', 'Baik', 'Cukup', 'Cukup', 20, 80, 1),
(6, 27, 'Cukup', 'Cukup', 'Cukup', 'Baik', 'Cukup', 'Cukup', 25, 88, 1);

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
(9, 'B2/001/20.21', 'Ahmad Nuryana', 'Ahmad', 'L', 'Islam', 'Tangerang', '2014-07-04', 1, 29, '0000-00-00 00:00:00', 'Aktif', 3),
(10, 'B2/002/20.21', 'Alfia Rahma', 'Alfia', 'P', 'Islam', 'Tangerang Selatan', '2014-10-16', 1, 31, '0000-00-00 00:00:00', 'Aktif', 3),
(11, 'B2/003/20.21', 'Alia Nadhira Tafana', 'Alia', 'P', 'Islam', 'Tangerang Selatan', '2014-03-16', 1, 31, '0000-00-00 00:00:00', 'Aktif', 3),
(12, 'B2/004/20.21', 'Alisa Salsabila', 'Alisa', 'P', 'Islam', 'Tangerang Selatan', '2014-02-14', 1, 32, '0000-00-00 00:00:00', 'Aktif', 3),
(13, 'B2/005/20.21', 'Amara Monica', 'Amara', 'P', 'Islam', 'Tangerang Selatan', '2014-12-14', 1, 33, '0000-00-00 00:00:00', 'Aktif', 3),
(14, 'B2/006/20.21', 'Ardheasfa Raya Syakira', 'Dhea', 'P', 'Islam', 'Tangerang Selatan', '2014-05-19', 1, 34, '0000-00-00 00:00:00', 'Aktif', 3),
(15, 'B2/007/20.21', 'Arsyad Febriansyah', 'Arsyad', 'L', 'Islam', 'Tangerang Selatan', '2015-02-12', 1, 35, '0000-00-00 00:00:00', 'Aktif', 3),
(16, 'B2/008/20.21', 'Asyifa Hakiki', 'asyifa', 'P', 'Islam', 'Tangerang Selatan', '2014-07-10', 1, 36, '0000-00-00 00:00:00', 'Aktif', 3),
(17, 'B2/009/20.21', 'Darell Aditya Pratama', 'Darell', 'L', 'Islam', 'Tangerang Selatan', '2014-10-01', 1, 37, '0000-00-00 00:00:00', 'Aktif', 3),
(18, 'B2/0010/20.2', 'Dinar Rafif M', 'Dinar', 'P', 'Islam', 'Tangerang Selatan', '2014-06-07', 1, 38, '0000-00-00 00:00:00', 'Aktif', 3),
(19, 'B2/001/20.21', 'Fadly Arnando R', 'Fadly', 'L', 'Islam', 'Tangerang Selatan', '2014-06-30', 1, 39, '0000-00-00 00:00:00', 'Aktif', 3),
(20, 'B2/002/20.21', 'Hanafiyah', 'Fia', 'P', 'Islam', 'Tangerang Selatan', '2014-12-30', 1, 40, '0000-00-00 00:00:00', 'Aktif', 3),
(21, 'B2/003/20.21', 'Harizah Nur Azmi', 'Harizah', 'P', 'Islam', 'Tangerang', '2014-06-27', 1, 41, '0000-00-00 00:00:00', 'Aktif', 3),
(22, 'B2/004/20.21', 'Ilham Kholid', 'Ilham', 'L', 'Islam', 'Tangerang Selatan', '2014-01-25', 1, 42, '0000-00-00 00:00:00', 'Aktif', 3),
(23, 'B2/005/20.21', 'Javier Aurellio Khairul', 'Javier', 'L', 'Islam', 'Tangerang Selatan', '2014-11-26', 1, 43, '0000-00-00 00:00:00', 'Aktif', 3),
(24, 'B2/006/20.21', 'Kafka Arjuna Yogaswara', 'Kafka', 'L', 'Islam', 'Tangerang Selatan', '2014-06-17', 1, 44, '0000-00-00 00:00:00', 'Aktif', 3),
(25, 'B2/007/20.21', 'Kanaya Aqila Yogaswara', 'Kanaya', 'P', 'Islam', 'Tangerang Selatan', '2014-06-17', 2, 44, '0000-00-00 00:00:00', 'Aktif', 3),
(26, 'B2/008/20.21', 'Kayla Wulandari', 'Kayla', 'P', 'Islam', 'Tangerang Selatan', '2014-08-22', 1, 45, '0000-00-00 00:00:00', 'Aktif', 3),
(27, 'B2/009/20.21', 'Kiandra Aisha Yogaswara', 'Kiandra', 'P', 'Islam', 'Tangerang Selatan', '2014-06-17', 3, 44, '0000-00-00 00:00:00', 'Aktif', 3),
(28, 'B2/0010/20.2', 'Kirani Putri Itsnain', 'Kirani', 'P', 'Islam', 'Tangerang Selatan', '2014-01-18', 1, 46, '0000-00-00 00:00:00', 'Aktif', 3),
(29, 'B2/001/20.21', 'Muhammad Dzaky Safryan Giggs', 'Dzaky', 'L', 'Islam', 'Tangerang Selatan', '2014-11-18', 1, 47, '0000-00-00 00:00:00', 'Aktif', 3);

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
(1, 'PAUD MELATI JOMBANG', '0123456782', 'Jalan Sumatra RT 04 / RW 02 No. 4 Kel. Jombang, Kec. Ciputat - Kota Tangerang Selatan - Banten - 15414', '0813-9803-409', '-', 'paudmelati@paud.com', 'Hj. Sisnawaty');

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
(1, 1, '2020-07-06', '2020-12-19', 3);

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
(8, '1.1 Mempercayai adanya Tuhan melalui CiptaanNya', 6),
(9, '1.2 Menghargai diri sendiri, orang lain dan lingkungan sekitar sebagai rasa syukur kepada Tuhan', 6),
(10, '2.13 Memiliki perilaku yang mencerminkan sikap jujur', 6),
(11, '3.1 Mengenal kegiatan beribadah sehari-hari dengan tuntunan orang dewasa', 6),
(12, '4.1 Melakukan kegiatan beribadah sehari-hari dengan tuntunan orang dewasa', 6),
(13, '3.2 Mengenal perilaku baik sebagai cerminan akhlak mulia', 6),
(14, '4.2 Menunjukan perilaku santun sebagai cerminan akhlak mulia', 6),
(15, '2.1 Memiliki perilaku yang mencerminkan hidup sehat', 7),
(16, '3.3 Mengenal anggota tubuh, fungsi dan gerakannya untuk pengembangan motorik kasar dan halus', 7),
(17, '4.3 Menggunakan anggota tubuh untuk pengembangan motorik kasar dan halus', 7),
(18, '3.4 Mengetahui cara hidup sehat', 7),
(19, '4.4 Mampu menolong diri sendiri untuk hidup sehat', 7),
(20, '2.2 Memiliki perilaku yang mencerminkan sikap ingin tahu', 8),
(21, '2.3 Memiliki perilaku yang mencerminkan sikap kreatif', 8),
(22, '3.5 Mengetahui cara memecahkan masalah sehari-hari dan berperilaku kreatif', 8),
(23, '4.5 Menyelesaikan masalah sehari-hari secara kreatif', 8),
(24, '3.6 Mengenal benda-benda di sekitarnya (nama, warna, bentuk, ukuran pola, sifat, suara, tekstur, fungsi, dan ciri-ciri lainnya)', 8),
(25, '4.6 Menyampaikan tentang apa dan bagaimana benda-benda di sekitar yang dikenalnya (nama, warna, bentuk, ukuran, pola sifat, suara, tekstur, fungsi, dan ciri-ciri lainnya) melalui berbagai hasil karya', 8),
(26, '3.7 Mengenal lingkungan sosial (keluarga, teman, tempat tinggal, tempat ibadah, budaya, transportasi)', 8),
(27, '4.7 Menyajikan berbagai karya yang berhubungan dengan lingkungan sosial (keluarga, teman, tempat tinggal, tempat ibadah, budaya, transportasi) dalam bentuk gambar, bercerita, bernyanyi dan gerak tubuh', 8),
(28, '3.8 Mengenal lingkungan alam (hewan, tanaman, cuaca, tanah, air, batu-batuan, dll)', 8),
(29, '3.9 Mengenal teknologi sederhana (peralatan rumah tangga, peralatan bermain, peralatan pertukangan, dll)', 8),
(30, '4.9 Menggunakan teknologi sederhana untuk menyelesaikan tugas kegiatannya (peralatan rumah tangga, peralatan bermain, perlatan pertukangan, dll)', 8),
(31, '2.5 Memiliki perilaku yang mencerminkan sikap percaya diri', 9),
(32, '2.6 Memiliki perilaku yang mencerminkan sikap taat terhadap aturan sehari-hari untuk melatih kedisiplinan', 9),
(33, '2.7 Memiliki perilaku yang mencerminkan sikap sabar (mau menunggu giliran, mau mendengar ketika orang lain berbicara untuk melatih berdisiplin)', 9),
(34, '2.8 Memiliki perilaku yang mencerminkan kemandirian', 9),
(35, '2.9 Memiliki perilaku yang mencerminkan sikap peduli dan mau membantu jika diminta bantuannya', 9),
(36, '2.10 Memiliki perilaku yang mencerminkan sikap kerja sama', 9),
(37, '2.11 Memiliki perilaku yang dapat menyesuaikan diri', 9),
(38, '2.12 Memiliki perilaku yang mencerminkan sikap tanggung jawab', 9),
(39, '3.13 Mengenal emosi diri dan orang lain', 9),
(40, '4.13 Menunjukan reaksi emosi diri secara wajar', 9),
(41, '3.14 Mengenalin kebutuhan, keinginan, dan minat diri', 9),
(42, '4.14 Mengungkapkan kebutuhan, keinginan dan minat diri dengan cara yang tepat', 9),
(43, '2.14 Memiliki perilaku yang mencerminkan sikap rendah hati dan santun kepada orang tua, pendidik ,dan teman', 10),
(44, '3.10 Memahami bahasa reseptif (menyimak dan membaca)', 10),
(45, '4.10 Menunjukan kemampuan berbahasa reseptif (menyimak dan membaca)', 10),
(46, '3.11 Memahami bahasa ekspresif (mengungkapkan bahasa secara verbal dan non verbal)', 10),
(47, '4.11 Menunjukkan kemampuan berbahasa ekspresif (mengungkapkan bahasa secara verbal dan non verbal)', 10),
(48, '3.12 Mengenal keaksaraan awal melalui bermain', 10),
(49, '4.12 Menunjukkan kemampuan keaksaraan awal dalam berbagai bentuk karya', 10),
(50, '2.4 Memiliki perilaku yang mencerminkan sikap estetis', 10),
(51, '3.15 Mengenal berbagai karya dan aktivitas seni', 11),
(52, '4.15 Menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media', 11);

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
(3, '2020 / 2021');

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
(19, 'Putri Nadella', 'putri', '$2y$10$rU1ssxJUguQfdrCs75VKTOOv8SlgHPAs9VXSJqCuqFjzeQgn2kOZu', 1, '1faaced5ecfcc65ed508042f7930ff1a.PNG'),
(28, 'Sri Mulyanih', 'mulyanih', '$2y$10$T0c2nVWob0OiEZSRH1L6cegquPFfomfe5ItKQnTEA6NaMHIr5w8na', 2, '864d00ef30ed6cb1ea648ad27fee1c3a.png'),
(29, 'Ihah Solihah', 'ihah', '$2y$10$wNsFGRq6FGEa5iZZVocydefDUThbDgBtdfvIhBrMLu9/asYsfJVCq', 3, 'default.svg'),
(30, 'Sulastri', 'sulastri', '$2y$10$XM35852xKNBOft.jRyAL5.TApQwE0EY477eD08Qv8Gnagw8qcl9wu', 3, 'default.svg'),
(31, 'Apriyanah', 'apriyanah', '$2y$10$fGife4QfCSl0oZcIjuBlsOe7p/EyKVvlMSy6RBSYtZD4lEw1SD4TG', 3, 'default.svg'),
(32, 'Dewi Noviani', 'dewi', '$2y$10$qpYAZr9zetHfwa259aIRRu4FF29RHC9Wt0Mn01nRZiAe9IJ9AW9X.', 3, 'default.svg'),
(33, 'Iin Nur Anggrani', 'iin', '$2y$10$2H1OQdnCM6VqIAOJJat/fuxqNQFnmG9sCYR8LrKcpWhRE2vBuunc2', 3, 'default.svg'),
(34, 'Rina Marlina', 'rina', '$2y$10$1Vi8RFfV.gC8tF/nuu66AOt.KRWsddByT2Gq1sqfc.uTyeHz0LWBC', 3, 'default.svg'),
(35, 'Ati Limasani', 'ati', '$2y$10$Sg.vh44jGZ3.tBX.ZF3w6ePzxAYmg5TltNrOz1XKz6cLGqhKgApEW', 3, 'default.svg'),
(36, 'Afriyanih', 'afriyanih', '$2y$10$7XxRqsNcqbVL/DAG7wVGf.O0yF6l.3XDZu98spLPk1Z0x4XtL3ISm', 3, 'default.svg'),
(37, 'Fauziah Utami', 'fauziah', '$2y$10$dw0Sr9ultY1GwQaq0NaAvumkwASku9jtpFwxny7HI12E8Zsg/jeee', 3, 'default.svg'),
(38, 'Zurniawati', 'zurniawati', '$2y$10$Z182XMRHIB6biAFHvTOgmuQDuctFjVTIWmciEYADxkgQyKkvigRTm', 3, 'default.svg'),
(39, 'Yohana Feriyanti', 'yohana', '$2y$10$O8MKzz7OgMqPgefGbv7PS.UpmD0T.NSMJwJ12nWPu84RBBWddHrxO', 3, 'default.svg'),
(40, 'Muriyah', 'muriyah', '$2y$10$2zBChp/0M2uKxd91cl45l.F/JpyqBTx7EY9VhbcnhmPUjeV0EkC2W', 3, 'default.svg'),
(41, 'Upit Sarimanah', 'upit', '$2y$10$NelijMmf22qSljYGVxMhjOdx1lEbKtm7fMuGZWAoOcyG4aTR0I7rC', 3, 'default.svg'),
(42, 'Siti Romlah', 'siti', '$2y$10$bFzCF/rI4U264Q0Cv74HFuPl8BR0D8..N4vGjpBan75sZkgIQoIV6', 3, 'default.svg'),
(43, 'Rosiah', 'rosiah', '$2y$10$7GZARmfY6TmasOpoXimjAubYkD.t/L.sp6sxEXadcKONhkOO3STze', 3, 'default.svg'),
(44, 'Sumiyati', 'sumiyati', '$2y$10$/sukavsUzDHd6bvmTlguyO0NuYLQArl3MFa5esmf/n2oz1WtlVsim', 3, 'default.svg'),
(45, 'Bunga Lestari', 'bunga', '$2y$10$qiQv10E.bIOpx7A1zOrR3etE6v8jLx85xEe5x48bF9Znme4enQN3C', 3, 'default.svg'),
(46, 'Maryanih', 'maryanih', '$2y$10$fzv8M4sn35LLLiratHgdwOMB632IR5HA1IlYFOuofkU9eFoWvZKfq', 3, 'default.svg'),
(47, 'Nida Safira Barawas', 'nida', '$2y$10$gtl7I/VDjhRu6SUX8BB22.kpyhICnYjT4Pd9Z4dKqDyOD13WDHLIC', 3, 'default.svg'),
(48, 'Ambar Andayani', 'ambar', '$2y$10$G/mQ57eiOePYbTC8rjQBuuMabTPmotBup257bGJ/ZwGpRybFpCygm', 3, 'default.svg'),
(49, 'Dina Saputri', 'dina', '$2y$10$DeUZLqeFESyFuf0DxzE/a.70HdJCrUpf/g/g9N86r.3BgGpPuOefi', 3, 'default.svg'),
(50, 'Nani Nurhayati', 'nani', '$2y$10$xcNj1UWtqCOdLHuYuTOJ.O.mKuWIkVMleCBNGFqTk4ov6.KY4Dlmy', 3, 'default.svg'),
(51, 'Rini', 'rini', '$2y$10$rp3hIkIhbK14Igx2HjLOXuG46VHpfFgyKB894NhuMv08OBZ5QeO4u', 3, 'default.svg'),
(52, 'Yani', 'yani', '$2y$10$PukkgJdcT9HNW2GfdBKczuBfq4qBKiuq0m7F3kh83tObw8C4TixCC', 3, 'default.svg'),
(53, 'Rini Sumartini', 'rinis', '$2y$10$ZGHWBDv0W5Q.4aaZkjvF/.kI7.Rlfv9Qu8VdgRDNtxvEXu8ER5Vvi', 3, 'default.svg'),
(54, 'Leni Sari Fajarwati', 'leni', '$2y$10$qZOM6WSN7pHTnmRMka9r5udMbYTQQqOOR4GIu4Y/fHvqssTRl/mc2', 3, 'default.svg'),
(55, 'Alianah', 'alianah', '$2y$10$uQucOva1wmnUNfl0.RoQWuiaoIjudk8Ph3HjWAspNzkxkTd06bEcK', 3, 'default.svg'),
(56, 'Martina Fritami', 'martina', '$2y$10$xJlZPgd4YVXZBeANabJMR.I21gMHgWYIQ9GK63mlDS5YmnSAsTquu', 3, 'default.svg'),
(57, 'Lasmi Aprilia', 'lasmi', '$2y$10$H/dCQezd5m2xLC8j24R7uOndExf4Z/0pr4hjvpOTvDbA8UWQ2FHdi', 3, 'default.svg'),
(58, 'Niati', 'niati', '$2y$10$fEFKILVKoBQNx/uQ5xVBBeaZcvmP.voYBt6fx0ehkWrg3wQmOZQlq', 3, 'default.svg');

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
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kompetensi_dasar`
--
ALTER TABLE `tb_kompetensi_dasar`
  MODIFY `id_kd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_penilaian_emosi`
--
ALTER TABLE `tb_penilaian_emosi`
  MODIFY `id_penilaian_emosi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_penilaian_kd`
--
ALTER TABLE `tb_penilaian_kd`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_penilaian_kesehatan`
--
ALTER TABLE `tb_penilaian_kesehatan`
  MODIFY `id_penilaian_kesehatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_peserta_didik`
--
ALTER TABLE `tb_peserta_didik`
  MODIFY `id_peserta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

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
  MODIFY `id_sub_kd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_tahun_ajaran`
--
ALTER TABLE `tb_tahun_ajaran`
  MODIFY `id_tahun_ajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
  ADD CONSTRAINT `tb_detail_admin_guru_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_detail_orang_tua`
--
ALTER TABLE `tb_detail_orang_tua`
  ADD CONSTRAINT `tb_detail_orang_tua_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penilaian_emosi`
--
ALTER TABLE `tb_penilaian_emosi`
  ADD CONSTRAINT `tb_penilaian_emosi_ibfk_2` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta_didik` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penilaian_emosi_ibfk_3` FOREIGN KEY (`id_semester`) REFERENCES `tb_semester` (`id_semester`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penilaian_kd`
--
ALTER TABLE `tb_penilaian_kd`
  ADD CONSTRAINT `tb_penilaian_kd_ibfk_5` FOREIGN KEY (`id_peserta`) REFERENCES `tb_peserta_didik` (`id_peserta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penilaian_kd_ibfk_6` FOREIGN KEY (`id_sub_kd`) REFERENCES `tb_sub_kompetensi_dasar` (`id_sub_kd`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tb_peserta_didik_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_peserta_didik_ibfk_5` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tb_tahun_ajaran` (`id_tahun_ajaran`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `tb_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
