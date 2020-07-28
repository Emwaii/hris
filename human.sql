-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2020 at 10:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `human`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `absensi_id` int(5) NOT NULL,
  `karyawan_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `absensi` enum('M','T') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`absensi_id`, `karyawan_id`, `tanggal`, `absensi`) VALUES
(20, '5ed226fcc6cfb', '25-06-2020', 'M'),
(21, '5ed229b4c8946', '25-06-2020', 'M'),
(24, '5ee1aec3a48c2', '25-06-2020', 'T'),
(25, '5ef306bda32bb', '25-06-2020', 'T'),
(26, '5ef306bda32bb', '26-06-2020', 'M'),
(28, '5ed226fcc6cfb', '29-06-2020', 'M'),
(29, '5ed229b4c8946', '29-06-2020', 'M'),
(32, '5ed226fcc6cfb', '29-07-2020', 'M'),
(33, '5ed229b4c8946', '29-07-2020', 'M'),
(36, '5ed2ff2dacdf7', '29-07-2020', 'M'),
(37, '5ef9a5f058aad', '29-07-2020', 'T'),
(38, '5ef9a4f66c325', '29-07-2020', 'T'),
(39, '5ef9a5f058aad', '30-06-2020', 'M'),
(40, '5ed226fcc6cfb', '01-07-2020', 'M'),
(41, '5ed229b4c8946', '02-07-2020', 'M'),
(44, '5ed2ff2dacdf7', '02-07-2020', 'T'),
(45, '5ee1aec3a48c2', '02-07-2020', 'T'),
(46, '5ef306bda32bb', '02-07-2020', 'M'),
(47, '5ef306bda32bb', '02-07-2020', 'M'),
(48, '5ef86e67979fe', '02-07-2020', 'T'),
(49, '5ef9a4f66c325', '02-07-2020', 'M'),
(50, '5ef9a5f058aad', '02-07-2020', 'M'),
(51, '5ef9ac95dc68c', '02-07-2020', 'M'),
(52, '5efaed996f7b3', '02-07-2020', 'M'),
(61, '5ed226fcc6cfb', '02-07-2020', 'M'),
(62, '5ed226fcc6cfb', '02-07-2020', 'M'),
(63, '5ed226fcc6cfb', '02-07-2020', 'M'),
(64, '5ed226fcc6cfb', '02-07-2020', 'M'),
(65, '5ed226fcc6cfb', '02-07-2020', 'M'),
(66, '5ed226fcc6cfb', '02-07-2020', 'M'),
(67, '5ef9ac95dc68c', '02-07-2020', 'T'),
(68, '5ef9ac95dc68c', '02-07-2020', 'T'),
(69, '5ef9ac95dc68c', '02-07-2020', 'T'),
(70, '5ed229b4c8946', '02-07-2020', 'T'),
(71, '5ed229b4c8946', '02-07-2020', 'T'),
(72, '5ed229b4c8946', '02-07-2020', 'T'),
(73, '5ed229b4c8946', '02-07-2020', 'T'),
(74, '5ef306bda32bb', '02-07-2020', 'T'),
(75, '5ef86e67979fe', '02-07-2020', 'T'),
(76, '5ef9a4f66c325', '02-07-2020', 'M'),
(77, '5ed2ff2dacdf7', '02-07-2020', 'M'),
(78, '5ed2ff2dacdf7', '02-07-2020', 'M'),
(79, '5ed2ff2dacdf7', '02-07-2020', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `client_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `id_card` varchar(64) CHARACTER SET latin1 NOT NULL,
  `nama` varchar(64) CHARACTER SET latin1 NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 NOT NULL,
  `email` varchar(64) CHARACTER SET latin1 NOT NULL,
  `perusahaan` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '-',
  `alamat` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `id_card`, `nama`, `no_telp`, `email`, `perusahaan`, `alamat`, `image`) VALUES
('5ec378c795275', '3332562291823', 'Emwai', '6285228939407', 'myemwaii@gmail.com', 'Emwai tech', 'Yogyakarta', '5ec378c795275.png'),
('5ec5490d98d9f', '3325081707990004', 'Muhammad yulianto', '085228939407', 'mr.yulianto17@gmail.com', 'Codenatic', 'Jombor City, Yogyakarta', '5ec5490d98d9f.png'),
('5efaecabc480c', '123', 'Saya', '08500000', 'saya@mail.com', 'PT. Bubar Ambyarrr', 'jogjakarta', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `karyawan_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `jenis_cuti` enum('tahunan','lembur','lainnya') NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `karyawan_id`, `tanggal`, `jenis_cuti`, `keterangan`) VALUES
(1, '5efaed996f7b3', '1-07-2020', 'lainnya', 'Karena kucing saya melahirkan yang pertama\r\n'),
(2, '5ef306bda32bb', '1-07-2020', 'lembur', 'Karena saya mengantuk'),
(5, '5ef9a5f058aad', '02-07-2020', 'lembur', 'Ngantuks\r\n'),
(6, '5ef9a5f058aad', '08-07-2020', 'lembur', 'Ngantuks'),
(7, '5f0573281b646', '13-07-2020', 'lembur', 'ngantuks');

-- --------------------------------------------------------

--
-- Table structure for table `email_company`
--

CREATE TABLE `email_company` (
  `email` int(11) NOT NULL,
  `protocol` varchar(255) CHARACTER SET latin1 NOT NULL,
  `smtp_host` varchar(255) CHARACTER SET latin1 NOT NULL,
  `smtp_user` varchar(255) CHARACTER SET latin1 NOT NULL,
  `smtp_pass` varchar(255) CHARACTER SET latin1 NOT NULL,
  `smtp_port` int(11) NOT NULL,
  `mailtype` varchar(255) CHARACTER SET latin1 NOT NULL,
  `charset` varchar(255) CHARACTER SET latin1 NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_company`
--

INSERT INTO `email_company` (`email`, `protocol`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `mailtype`, `charset`, `name`) VALUES
(2, 'smtp', 'ssl://smtp.googlemail.com', 'mr.yulianto17@gmail.com', 'masuli17', 465, 'html', 'utf-8', 'Emwai');

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id` int(2) NOT NULL,
  `jenis_gaji` varchar(30) NOT NULL,
  `jumlah` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id`, `jenis_gaji`, `jumlah`) VALUES
(1, 'pendidikan', 1000000),
(2, 'makan', 500000),
(3, 'kesehatan', 500000),
(4, 'transport', 700000);

-- --------------------------------------------------------

--
-- Table structure for table `ilowongan`
--

CREATE TABLE `ilowongan` (
  `id_ilowongan` int(2) NOT NULL,
  `ilowongan_name` varchar(50) NOT NULL,
  `ilowongan_alias` varchar(50) NOT NULL,
  `is_active` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ilowongan`
--

INSERT INTO `ilowongan` (`id_ilowongan`, `ilowongan_name`, `ilowongan_alias`, `is_active`) VALUES
(1, 'English - Indonesian Translator', 'EN - IND Translator', '1'),
(2, 'German - Indonesian Translator', 'German - IND Translator', '1'),
(3, 'Translation Project Management Trainee', 'Translation Project MT', '1'),
(4, 'German Project Manager', 'German Project Manager', '1'),
(5, 'Admin Assistant', 'Admin Assistant', '1'),
(6, 'Sales Executive', 'Sales Executive', '1'),
(7, 'Desktop Publishing', 'Desktop Publishing', '1'),
(8, 'IT Support', 'IT Support', '0'),
(9, 'Web Developer', 'Web Developer', '1');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(3) NOT NULL,
  `jabatan_name` varchar(35) NOT NULL,
  `gajipokok` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `jabatan_name`, `gajipokok`) VALUES
(1, 'Project Manager', 3000000),
(2, 'Karyawan', 1500000),
(3, 'Product Manager', 3000000),
(4, 'Sales Marketing', 2500000),
(5, 'Sales Executive', 2200000),
(7, 'Sales Manager', 2500000),
(8, 'Supervisory Development Program', 2500000),
(9, 'IT Support', 2000000),
(10, 'Senior In-House Linguist', 2500000),
(11, 'In-Host Linguist', 2000000),
(12, 'Programmer', 5000000),
(13, 'Sales Admin', 2500000);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(2) NOT NULL,
  `jobs_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id_job`, `jobs_name`) VALUES
(1, 'translator'),
(2, 'interpreter'),
(3, 'desktop publishing'),
(4, 'graphic designer'),
(5, 'subtitler'),
(6, 'transcriber');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawan_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `nama_lengkap` varchar(255) CHARACTER SET latin1 NOT NULL,
  `tanggal_masuk` varchar(20) NOT NULL,
  `pendidikan` varchar(30) NOT NULL,
  `universitas` varchar(40) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `tgl_lahir` varchar(15) DEFAULT NULL,
  `id_card` int(20) NOT NULL,
  `nama_ayah` varchar(40) NOT NULL,
  `nama_ibu` varchar(40) NOT NULL,
  `nama_ss` varchar(40) DEFAULT NULL,
  `no_pasport` varchar(25) NOT NULL,
  `no_bpjs` varchar(25) NOT NULL,
  `no_npwp` varchar(25) NOT NULL,
  `alamat` varchar(500) CHARACTER SET latin1 NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(40) NOT NULL,
  `zip` int(6) NOT NULL,
  `alamat_now` varchar(500) NOT NULL,
  `city_now` varchar(35) NOT NULL,
  `state_now` varchar(35) NOT NULL,
  `zip_now` int(6) NOT NULL,
  `email_kantor` varchar(50) NOT NULL,
  `email_pribadi` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `jabatan_id` int(3) DEFAULT 2,
  `cv` varchar(255) NOT NULL DEFAULT 'default.docx',
  `kontrak_kerja` varchar(255) NOT NULL DEFAULT 'default.docx',
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `jenis_karyawan` varchar(20) NOT NULL,
  `tgl_habis` varchar(30) DEFAULT NULL,
  `fktp` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `nama_lengkap`, `tanggal_masuk`, `pendidikan`, `universitas`, `ttl`, `tgl_lahir`, `id_card`, `nama_ayah`, `nama_ibu`, `nama_ss`, `no_pasport`, `no_bpjs`, `no_npwp`, `alamat`, `city`, `state`, `zip`, `alamat_now`, `city_now`, `state_now`, `zip_now`, `email_kantor`, `email_pribadi`, `jenis_kelamin`, `jabatan_id`, `cv`, `kontrak_kerja`, `image`, `jenis_karyawan`, `tgl_habis`, `fktp`) VALUES
('5ed226fcc6cfb', 'Muhammad yulianto', '28-05-2020', 'S1 Informatika', 'Universitas Teknologi Yogyakarta', 'Batang', '17-07-1999', 123, 'Baryanto', 'Saroyah', 'Not yet', '', '', '', '  B', 'Batang', 'Jawa tengah', 51271, 'A', 'Batang', 'Jawa tengah', 51271, 'emwai@codenatic.com', 'mr.yulianto17@gmail.com', 'Laki - laki', 1, 'default.docx', 'default.docx', '5d0a92ebdac44d130345da42ef43099d.jpg', 'kontrak', '07-07-2021', 'default.jpg'),
('5ed229b4c8946', 'Kuproy', '27-06-2020', 'S1 Informatika', 'Universitas Teknologi Yogyakarta', 'Jakarta', '26-11-1999', 123, 'Junaedy', 'Yeti', '', 'F000000123', '123', '123', 'j', 'Jakarta', 'Jakarta', 55, 'y', 'Yogyakarta', 'DI. Yogyakarta', 55, 'kuproy@mail.com', 'kuproy@email.com', 'Laki - laki', 2, 'default.docx', 'default.docx', '63e35c7bc3a1e9677c483265a0b5c2f5.jpg', 'probation', '07-07-2021', 'default.jpg'),
('5ed2ff2dacdf7', 'Kuproy', '11-05-2020', 'D3 Sastra Inggris', 'Universitas Teknologi Yogyakarta', 'Jakarta', '22-05-1999', 123, 'Junaedy', 'Yeti', '', '', '', '', 'd', 'Jakarta', 'Jakarta', 55000, 'x', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'kuproy@mail.com', 'kuproy@email.com', 'Perempuan', 5, '43-131-1-PB.pdf', '43-43-1-PB.pdf', '3fa3fba36c590c7311c13c4828414994.jpg', '', '', 'default.jpg'),
('5ee1aec3a48c2', 'Muhammad yulianto', '11-06-2020', 'S1 Informatika', 'Universitas Teknologi Yogyakarta', 'Batang', '17-07-1999', 2147483647, 'ab', 's', '', '', '', '', 'limpung', 'Batang', 'Jawa tengah', 51271, 'yogya', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'mr.yulianto17@gmail.com', 'mr.yulianto17@gmail.com', 'Laki - laki', 9, '1178-2606-1-PB.pdf', '20-24_Nency_SISTEM_PENDUKUNG_KEPUTUSAN_PEMBELIAN.pdf', 'mimin.jpg', '', '', 'default.jpg'),
('5ef306bda32bb', 'Lala', '24-06-2020', 'D3 Sastra Inggris', 'Universitas Teknologi Yogyakarta', 'Batang', '17-07-1999', 123, 'Junaedy', 'Yeti', '', '', '', '', 'Limpung', 'Batang', 'Jawa tengah', 51271, 'Yogyakarta', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'lala@mail.com', 'lalacyank@email.com', '-', 2, 'default.docx', 'default.docx', 'default.jpg', '', '', 'default.jpg'),
('5ef86e67979fe', 'Mas uli', '28-06-2020', 'S1 Informatika', 'Universitas Teknologi Yogyakarta', 'Batang', '17-07-1999', 123, 'ab', 'cd', '', '', '', '', 'Batang', 'Batang', 'Jawa tengah', 51271, 'Yogyakarta', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'emwai@codenatic.com', 'emwai@email.com', '-', 2, 'default.docx', 'default.docx', 'default.jpg', '', '', 'default.jpg'),
('5ef9a4f66c325', 'Bejo bintang 7', '29-06-2020', 'S1 Sastra Jepang', 'Universitas Gajah Madha', 'Jakarta', '29-06-1997', 1234, 'A', 'B', '', '', '', '', 'Jakarta', 'Jakarta', 'DKI Jakarta', 5, 'Yogjakarta', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'bejobintangseven@email.com', 'bejoganteng@email.com', '-', 2, 'default.docx', 'default.docx', 'yato.jpg', '', '', 'default.jpg'),
('5ef9a5f058aad', 'Babang Tamvan', '29-06-2020', 'S1 Informatika', 'Universitas Gajah Madha', 'Jakarta', '15-09-1999', 12345, 'Junaedy', 'Yeti', '', '', '', '', 'Jakarta', 'Jakarta', 'DKI Jakarta', 5, 'Jombor City', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'babangtamvan@email.com', 'babangtamvandanberani@email.com', '-', 2, 'default.docx', 'default.docx', '3894442623.jpg', '', '', 'default.jpg'),
('5ef9ac95dc68c', 'Charlie Uchiha', '29-06-2020', 'D3 Sastra Inggris', 'Universitas Teknologi Yogyakarta', 'Jakarta', '22-05-1999', 12345, 'B', 'C', '', '', '', '', 'Yogyakarta', 'yogyakarta', 'DIY', 55285, 'Yogyakarta', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'charlieuchiha@email.com', 'charliesharinggan@mail.com', '-', 2, 'default.docx', 'default.docx', 'Charly-ST12(1).jpg', '', '', 'default.jpg'),
('5efaed996f7b3', 'Andika', '30-06-2020', 'S1 Sastra Inggris', 'Universitas Gajah Madha', 'Batang', '17-07-1999', 123, 'Junaedhi', 'Yeti', '', '', '', '', 'Batang', 'Batang', 'Jawa tengah', 51271, 'Yogyakarta', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'andhika@bubar.com', 'andhika@email.com', '-', 2, '1178-2606-1-PB.pdf', 'articleA-10-50-2.pdf', '3894442623.jpg', '', '', 'default.jpg'),
('5f05551090b4d', 'Noval Akbar', '08-07-2020', 'S1 Informatika', 'Universitas Bisa Aja', 'Batang', '17-11-2010', 33250, 'a', 'b', '1', '', '', '', 'Batang', 'Batang', 'Jawa tengah', 51271, 'Yogyakarta', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'noval@email.com', 'novalakbar@mail.com', 'Pilih...', 2, 'Kumpul_Tugas_Online-06.pdf', '5170411218_Muhamamd_yulianto_TugasAkhir.pdf', 'mimin.jpg', 'kontrak', '', '817452.png'),
('5f0573281b646', 'Muhmmad yulianto', '08-07-2020', 'S1 Informatika', 'UTY', 'Batang', '17-07-1999', 123, 'a', 'b', '', '', '', '', 'Limpung', 'Batang', 'Jawa tengah', 51271, 'Yogyakarta', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'yulianto@email.com', 'mr.yulianto17@gmail.com', '-', 2, '5170411218_Muhamamd_yulianto_TugasAkhir.pdf', 'Kumpul_Tugas_Online-06.pdf', '3894442623.jpg', 'probation', '08-07-2021', '817452.png'),
('5f0c4fc6390f8', 'Ilhman Junaedy', '13-07-2020', 'S1 Sastra Inggris', 'Universitas Sana Sini', 'Brebes', '18-05-1999', 2147483647, 'Edy', 'Yeti', '', '', '', '', 'Batang', 'Batang', 'Jawa tengah', 51271, 'Yogyakarta', 'Yogyakarta', 'DI.Yogyakarta', 55285, 'ilham@email.com', 'ilham@gmail.com', '-', 2, '5170411218_Muhamamd_yulianto_TugasAkhir.pdf', 'Kumpul_Tugas_Online-06.pdf', 'Charly-ST12(1).jpg', 'kontrak', '13-07-2021', '817452.png'),
('5f0c5204dbab0', 'Agung Ramadhan', '13-07-2020', 'S1 Informatika', 'Universitas Teknologi Yogyakarta', 'Ngawi', '23-12-1998', 2147483647, 'Edy', 'Yeti', '', '', '', '', 'Ngawi', 'Ngawi', 'Jawa timur', 55000, 'Yogyakarta', 'Yogyakarta', 'DI.Yogyakarta', 55285, 'agung@mail.com', 'agung@email.com', '-', 2, 'e33753eeb987a8a6c5c0613d95717777.pdf', '9e1fba6e5ac165d4b3267ad1ef1bcdd0.pdf', '8fc6042dae9d13613b3f7a65b601dc54.jpg', 'probation', '13-06-2021', 'c71bc443dceeede2814db858392900d7.png'),
('5f0c53ad25368', 'Allan Marzuki', '13-07-2020', 'S1 Informatika', 'UTEYE', 'Lombok', '13-02-1999', 2147483647, 'Marzuki', 'Mamah Yeti', '', '', '', '', 'Lombok', 'Lombok', 'NTB', 0, 'Yogyakarta', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'allan@mail.com', 'allan@email.com', '-', 2, 'a866ada2d0b79c49f6ad99212fbc983f.pdf', 'a71dc206537592a5c31a31d422b22569.pdf', 'cc7c1ba9a4105c8f80cbe82d333f518e.jpg', 'tetap', NULL, '8d9e5f44262278fea03d426ae959dfe9.png'),
('5f0d6d1fdd589', 'Muhammad yulianto', '14-07-2020', 'S1 Informatika', 'UTEYUE', 'Batang', '17-07-1999', 33250, 'a', 'b', 'c', '1', '1', '1', 'Batang', 'Batang', 'Jawa tengah', 51271, 'Yogyakarta', 'Yogyakarta', 'DI. Yogyakarta', 552855, 'emwai@mail.com', 'mr.yulianto17@gmail.com', 'Laki - laki', 2, '9386e265fb8a448723c238de638fd83c.pdf', 'default.docx', '61c86fd44db58810ae4f340960449ce4.jpg', 'Pilih...', '', '42ea5fcb3cd548ff4129f81dd3de3351.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `language_pair`
--

CREATE TABLE `language_pair` (
  `id_lang` int(2) NOT NULL,
  `language` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `language_pair`
--

INSERT INTO `language_pair` (`id_lang`, `language`) VALUES
(1, 'English-Indonesian'),
(2, 'English-Javanese'),
(3, 'English-Sundanese'),
(4, 'German-Indonesian'),
(5, 'Japanese-Indonesian'),
(6, 'Korean-Indonesian'),
(7, 'Chinese-Indonesian'),
(8, 'Spanish-Indonesian'),
(9, 'French-Indonesian'),
(10, 'Arabic-Indonesian'),
(11, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `id` int(2) NOT NULL,
  `nama_lowongan` varchar(40) NOT NULL,
  `header` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `is_active` enum('1','0') NOT NULL,
  `text_color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`id`, `nama_lowongan`, `header`, `keterangan`, `is_active`, `text_color`) VALUES
(1, 'Lowongan Translator', 'header9.jpg', 'Dibutuhkan Translator Bahasa Suriname - indonesia langsung aja kemenu recruitmen\r\nterimakasih ', '0', 'text-dark'),
(4, 'Lowongan Interpreter', 'header4.jpg', 'Segera\r\nterimakasih  ', '1', 'text-light'),
(5, 'Lowongan Transcriber', 'header8.jpg', 'Dibutuhkan Translator Bahasa Suriname - indonesia langsung aja kemenu recruitmen\r\nterimakasih', '0', 'text-light'),
(6, 'Lowongan Desktop', 'header6.jpg', 'Dibutuhkan Translator Bahasa Suriname - indonesia langsung aja kemenu recruitmen\r\nterimakasih  ', '0', 'text-light'),
(18, 'Lowongan Developer Mobile', 'header7.png', 'Dibutuhkan segera   ', '0', 'text-danger');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(2) NOT NULL,
  `menu_name` varchar(20) NOT NULL,
  `is_active` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `is_active`) VALUES
(1, 'menu_project', '0'),
(2, 'menu_karyawan', '1'),
(3, 'menu_client', '0');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `payroll_id` varchar(64) NOT NULL,
  `karyawan_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `status` enum('belum','terbayar') NOT NULL,
  `jumlah` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`payroll_id`, `karyawan_id`, `tanggal`, `status`, `jumlah`) VALUES
('PY-01072020e758', '5ef9a5f058aad', '01-07-2020', 'terbayar', '2700000'),
('PY-130720202a0b', '5ed229b4c8946', '13-07-2020', 'terbayar', '2700000'),
('PY-130720208a34', '5ed226fcc6cfb', '13-07-2020', 'terbayar', '4200000');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `mulai` varchar(15) NOT NULL,
  `selesai` varchar(15) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL,
  `client_id` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `mulai`, `selesai`, `image`, `description`, `client_id`) VALUES
('5ed71358d8fab', 'Pesend', 5000000, '03-06-2020', '03-07-2020', '5ed71358d8fab.png', 'Aplikasi untuk memesan apapun dati tiket pesawat, kereta bahkan tiket ke surga :v', '5ec5490d98d9f'),
('5ede510c9fb43', 'Orpheus Manga Reader', 1999998, '08-06-2020', '08-07-2020', '5ede510c9fb43.png', 'Aplikasi manga reader termantap', '5ec378c795275'),
('5ee4c1a1c6e0c', 'Dinamo', 10000000, '13-06-2020', '13-07-2020', '5ee4c1a1c6e0c.jpg', 'Apliaksi trading ter ntap', '5ec5490d98d9f'),
('5ee9972c69797', 'Human resource management system', 10000000, '17-06-2020', '17-09-2020', '5ee9972c69797.jpg', 'Project manjemen karyawan PT. Apalah dayaku', '5ec378c795275'),
('5ef9a2e56c9c4', 'Website Sekolah', 10000000, '29-06-2020', '30-06-2020', 'default.jpg', 'Website sekolah SD N Mlati jaya \r\nDengan elearning dan rapot online', '5ec5490d98d9f'),
('5efaece081712', 'Website Sekolah', 10000000, '30-06-2020', '30-08-2020', 'default.jpg', 'website sekolah', '5efaecabc480c'),
('5f214b5215767', 'Aplikasi android kasir', 5000000, '31-07-2020', '31-10-2020', 'default.jpg', 'aplikasi kasir PT.Bubar Ambyar', '5ec378c795275');

-- --------------------------------------------------------

--
-- Table structure for table `rfreelance`
--

CREATE TABLE `rfreelance` (
  `id_freelance` int(11) NOT NULL,
  `nama_freelance` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_wa` varchar(12) NOT NULL,
  `umur` tinyint(2) NOT NULL,
  `cv_freelance` varchar(255) NOT NULL DEFAULT 'default.pdf',
  `portofolio_freelance` varchar(255) NOT NULL DEFAULT 'default.pdf',
  `alasan` text NOT NULL,
  `others` varchar(30) DEFAULT NULL,
  `id_job` int(2) DEFAULT NULL,
  `id_lang` int(2) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp(),
  `approve` enum('1','0') DEFAULT '0',
  `deleted` enum('1','0') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rfreelance`
--

INSERT INTO `rfreelance` (`id_freelance`, `nama_freelance`, `email`, `no_wa`, `umur`, `cv_freelance`, `portofolio_freelance`, `alasan`, `others`, `id_job`, `id_lang`, `tanggal`, `approve`, `deleted`) VALUES
(76, 'yulianto', 'mr.yulianto17@gmail.com', '085228939407', 21, 'default.pdf', 'default.pdf', 'hello', NULL, 1, 1, '2020-07-20 15:11:32', '0', '0'),
(77, 'yulianto', 'mr.yulianto17@gmail.com', '085228939407', 21, 'default.pdf', 'default.pdf', 'hello', NULL, 3, NULL, '2020-07-20 15:11:32', '0', '0'),
(78, 'yulianto', 'mr.yulianto17@gmail.com', '085228939407', 21, 'default.pdf', 'default.pdf', 'hello', NULL, 3, NULL, '2020-07-20 15:11:32', '0', '1'),
(79, 'yulianto', 'mr.yulianto17@gmail.com', '085228939407', 21, 'default.pdf', 'default.pdf', 'hello', NULL, 4, NULL, '2020-07-20 15:11:32', '0', '1'),
(80, 'yulianto', 'mr.yulianto17@gmail.com', '085228939407', 21, 'default.pdf', 'default.pdf', 'hello', NULL, 4, NULL, '2020-07-20 15:11:32', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `rinhouse`
--

CREATE TABLE `rinhouse` (
  `id_inhouse` int(2) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `ttl` varchar(30) NOT NULL,
  `umur` tinyint(2) NOT NULL,
  `domisili` varchar(30) NOT NULL,
  `nowa` varchar(13) NOT NULL,
  `image_inhouse` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `cv_inhouse` varchar(255) NOT NULL DEFAULT 'default.pdf',
  `porto_inhouse` varchar(255) NOT NULL DEFAULT 'default.pdf',
  `alasan` text NOT NULL,
  `gaji` int(15) NOT NULL,
  `id_ilowongan` int(2) DEFAULT NULL,
  `tanggal_submit` datetime NOT NULL DEFAULT current_timestamp(),
  `approve` enum('1','0') NOT NULL DEFAULT '0',
  `deleted` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rinhouse`
--

INSERT INTO `rinhouse` (`id_inhouse`, `fullname`, `ttl`, `umur`, `domisili`, `nowa`, `image_inhouse`, `cv_inhouse`, `porto_inhouse`, `alasan`, `gaji`, `id_ilowongan`, `tanggal_submit`, `approve`, `deleted`) VALUES
(1, 'Yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'default.jpg', 'default.pdf', 'default.pdf', 'Cuz i want', 5000000, 9, '2020-07-07 00:00:00', '1', '0'),
(2, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'ad2c6961a38d1337d194c4a43d1160ae.jpg', '71eef60068217723ffb8b56dceaaefa7.pdf', '3f62df1d44dedd80ad3424977a9b8867.pdf', 'Cuz i want to test my self', 3000000, 8, '2020-07-07 00:00:00', '1', '1'),
(3, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', '42a180de885eec4bf384a5e5ec974055.jpg', '33609fd152eae8e8ce2237bdc09a14eb.pdf', '124147526036de02ef56a83f5b2519f4.pdf', 'Cuz i want to test my self', 3000000, 8, '2020-07-07 00:00:00', '1', '1'),
(4, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', '51a0c9d04c603120fb80124f0a2c5718.jpg', 'a0650474c804e25539abf5c50ef73659.pdf', 'b7194678c98927613b92ed32abd89a8d.pdf', 'Cuz i want to test my self', 3000000, 5, '2020-07-07 00:00:00', '1', '0'),
(5, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', '6ff120ff3f8d6d578aaedf941d1ae27c.jpg', '1d06ed53ca8458cb5789cf111435a81b.pdf', '5150778fce7779afbcd2fc836a3554dd.pdf', 'Cuz i want to test my self', 3000000, 5, '2020-07-07 00:00:00', '1', '0'),
(6, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'dfc880b85192598e2d35845de44dc1d1.jpg', '05af5191b2fb41fc2dce5a593f629146.pdf', 'b0add99bc04dbc5cf8a215fbb7cd6b37.pdf', 'hey', 5000000, 4, '2020-07-07 00:00:00', '1', '0'),
(7, 'Agung', 'Ngawi, 23 Desember 19988', 21, 'Yogyakarta', '088088088', 'e6530e87310b466ed0f8dc8b04b83106.jpg', '237de78a4243a96dbd267bb245ac3ee1.pdf', '9fed0fda86dbdcc681b56dd7c1d9c6ab.pdf', 'lala', 5000000, 3, '2020-07-07 00:00:00', '1', '0'),
(8, 'Emwai', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 9, '2020-07-07 00:00:00', '1', '0'),
(9, 'Emwai', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 1, '2020-07-07 00:00:00', '1', ''),
(10, 'Emwai', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'default.jpg', 'default.pdf', 'default.pdf', 'qwe', 3000000, 3, '2020-07-07 00:00:00', '1', '0'),
(11, 'Agung', 'Ngawi, 23 Desember 19988', 21, 'Yogyakarta', '123', 'default.jpg', 'default.pdf', 'default.pdf', '', 3000000, 8, '2020-07-07 00:00:00', '1', '1'),
(12, 'Agung', 'Ngawi, 23 Desember 19988', 21, 'Yogyakarta', '123', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 8, '2020-07-07 00:00:00', '1', '1'),
(13, 'Agung', 'Ngawi, 23 Desember 19988', 21, 'Yogyakarta', '123', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 8, '2020-07-07 00:00:00', '0', '1'),
(14, 'Agung', 'Ngawi, 23 Desember 19988', 21, 'Yogyakarta', '123', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 8, '2020-07-07 00:00:00', '0', '1'),
(15, 'Agung', 'Ngawi, 23 Desember 19988', 21, 'Yogyakarta', '123', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 8, '2020-07-07 00:00:00', '0', '1'),
(16, 'Agung', 'Ngawi, 23 Desember 19988', 21, 'Yogyakarta', '123', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 8, '2020-07-07 00:00:00', '0', '1'),
(17, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 5, '2020-07-07 00:00:00', '1', '0'),
(18, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 5, '2020-07-07 00:00:00', '1', '0'),
(19, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 5, '2020-07-07 00:00:00', '1', '0'),
(20, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 5, '2020-07-07 00:00:00', '1', '0'),
(21, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'default.jpg', 'default.pdf', 'default.pdf', '', 5000000, 5, '2020-07-07 00:00:00', '1', '0'),
(22, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', '956a83b7319ece39ca520b838c32fb12.jpg', 'ab2305f4fdc254b3eafee0bef92af3c5.pdf', 'fda956f2fe98e08bc08350412f93c6dc.pdf', 'hey kamu', 5000000, 8, '2020-07-07 00:00:00', '0', '1'),
(23, 'Emwai', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', '47dae7c806870e0b531f9888cc93415c.jpg', '315e66fbc0014c3669f7aaf903d5588c.pdf', '286e029a551488583c0712de856836e1.pdf', 'I want test my skill', 3000000, 1, '2020-07-07 00:00:00', '0', ''),
(24, 'Agung', 'Ngawi, 23 Desember 19988', 21, 'Yogyakarta', '085228939407', '2c3b36c965bd578c7710c8c3a67b775a.jpg', '9da600562c338a3915d2939643992feb.pdf', 'a0808cd56f2a84e48db28dcc518948e5.pdf', '.', 5000000, 1, '2020-07-07 00:00:00', '0', ''),
(25, 'Emwai', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'f2655f126710e348180e6364c72ac1d7.jpg', '6c2d7d96e3d64c5baf1ce3d7c8cfd907.pdf', 'b579846c779595c01e5c06ffca282105.pdf', 'i want test myself', 5000000, 2, '2020-07-07 00:00:00', '0', '1'),
(26, 'Noval', 'Batang, 17 November 2010', 10, 'Batang', '000000000', 'a2f782b8b0210772a49eb4a1efa78a66.jpg', '9b90acacb76c43a8f264768e3a665ef6.pdf', '241998ac3dc26ce5cb9eba2ff755d725.pdf', 'lalala', 3000000, 9, '2020-07-07 21:58:09', '1', '0'),
(27, 'Emwai', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', '8f12cf922ae28f6176fc1bfe9e05fd3f.jpg', 'bed31da7330044f8f5d6816c1190c678.pdf', 'b291fd80c9b653149897c0eba7868e6f.pdf', 'bla bla bla', 5000000, 7, '2020-07-08 07:41:19', '1', '0'),
(28, 'Yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', 'b426e8786d7c489322a6ce7bec6b9358.jpg', '5636a08ab88869d781b23955f23f75fe.pdf', 'a4e331fcd358f75f3e5cd481b828b388.pdf', 'test', 5000000, 4, '2020-07-08 07:45:59', '1', '0'),
(29, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', '2549a3de83bf1df7cc33d70d6011fd9f.jpg', '9c208ce82f574f211656899e46a78cb5.pdf', '43101f0b421cdd5c0bc49e7e8fe66ebc.pdf', 'bla bla bla bla', 5000000, 6, '2020-07-08 07:51:11', '1', '0'),
(33, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', '49c504f37bd1554037afd06523025d8a.jpg', 'b65113178c1a807e6eb1a921352f90cc.pdf', '7652d14eb164d33f8dffb0ca4bf4de68.pdf', 'Hallo', 5000000, 8, '2020-07-13 22:51:56', '0', '0'),
(36, 'Muhammad yulianto', 'Batang, 17 juli 1999', 21, 'Yogyakarta', '085228939407', '063cae7604718b95cb3f834acaba3bfe.jpg', '08b0e20c726620c5729edf906f9f2d48.pdf', 'b0fc4476a5db5ea4f08d3c3a1cfaffa7.pdf', 'haii', 5000000, 1, '2020-07-14 10:22:47', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `role` enum('admin','superadmin') NOT NULL DEFAULT 'admin',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `created_at`) VALUES
(6, 'mimin1', 'e1c1eff797379c0b13604e864d6940f0fd4ca634', 'myemwaii@gmail.com', 'Mimin Baik', '0808080808080', 'admin', '2020-07-13 17:10:07', 'mimin.jpg', '2020-07-13 17:10:07'),
(7, 'superadmin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'miminganteng@email.com', 'Superadmin', '085228939407', 'superadmin', '2020-07-09 06:12:30', 'mimin.jpg', '2020-07-09 06:12:30'),
(13, 'emwai', '01b307acba4f54f55aafc33bb06bbbf6ca803e9a', 'm.yulianto17@gmail.com', 'Muhammad yulianto', '085228939407', 'admin', '2020-07-13 16:58:44', 'Muhammad_yulianto.jpg', '2020-07-13 16:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(15, 'agungramadhan80@yahoo.com', 'Ais7ayII0TbYA5i4qbBx3LDkUt014lHvtOHkdDP+GeI=', 1593490296),
(16, 'magungramadhan3@gmail.com', 'yEMxh/Q4lTkHif04zvB/2yqdC3/TBsjQgFPe/KZHUc4=', 1593500961),
(17, 'myemwaii@gmail.com', '4bclLLvLNkmwfHtxePZ9hqC2rMJnp5JkGLv8HxZBIBI=', 1594453374),
(18, 'myemwaii@gmail.com', '4i1Ey+CKptHscqJMv4bORTogi2W4yHqSebgw/DXQJrQ=', 1594453542),
(19, 'myemwaii@gmail.com', '3fvXzr7dnmCIKpOUwaPCbADF+c65CXnfkg/a1rBsnXs=', 1594453707),
(20, 'myemwaii@gmail.com', 'QH34hCuo8Hq0/rapjJVFc/Xug7sX+RLcyujmIVHKyPI=', 1594454239),
(21, 'myemwaii@gmail.com', 'f05uIPnsxi7HFBA1vJ+GzLJ9mjjrV/vpW8r5yDU1XHY=', 1594454489),
(22, 'myemwaii@gmail.com', 'th3wzUkz0XxbkW1nJTlgSQ79OVWIokPy6ixY1RLBb1E=', 1594454621),
(23, 'myemwaii@gmail.com', 'dgY1a+hqTSAAg8p6hBc+XHHo/Dpvj5xp/SHUpyVb7YI=', 1594454768),
(24, 'myemwaii@gmail.com', 'sUplEpvYTpfDzvWkKzMFIQ95VhJjEziBy9MgTkMIODs=', 1594454953),
(25, 'myemwaii@gmail.com', 'sh2UnzlUQb5pOUiAqg/Lj1/IhOMtVpx882TEEGB0eO0=', 1594455076),
(26, 'myemwaii@gmail.com', 'Q3+S4HBbjnZDzhDZfU7lQ2T9W5V+qkPgbrqZtnj19jY=', 1594455125),
(27, 'myemwaii@gmail.com', 'SN8+dcH0HvxWaF1Di1AI12qpITjdDpGYPFmQskQeUt8=', 1594455166),
(28, 'myemwaii@gmail.com', '4iIz4SM2tBf07HXk+DlqShgMnxZasjUABXiCskHUTMk=', 1594455333),
(29, 'myemwaii@gmail.com', 'pYtina+VH9CkBhM2R1rOgT8eN1RtSkc7T//4o09hGgI=', 1594455340),
(30, 'myemwaii@gmail.com', 'p1dtHa1k4QadCHpSur2MjwHJqpbMnky/FE/a+0GNFiM=', 1594455964),
(31, 'myemwaii@gmail.com', 'QKGSHT1ekkuPJBRxyHn8GkbhiiBRyXgPjV0VPT2jxG0=', 1594455974),
(32, 'myemwaii@gmail.com', 'hCidBACCu3W+35bM3+rhUXtmGM8MW6mAFL0/Otufz6U=', 1594456049),
(33, 'myemwaii@gmail.com', 'W67woMG1FFEZPjxeAYeLEumGWQzndBklpjd2C/OTALE=', 1594456969),
(34, 'myemwaii@gmail.com', 'ss3dHThmyHWRy/yqdujaOjhLjQfHJQN/PBO+cEEmsFk=', 1594457620),
(35, 'myemwaii@gmail.com', 'W+y+tRlIbRynqi901AmRCP92YK60vlCDldT+CBMkIW4=', 1594457787),
(36, 'myemwaii@gmail.com', '1w+5ALRxPvpQ6ZRtCOdeBqinwxs4magmIMb9B4vQp2c=', 1594458134),
(37, 'myemwaii@gmail.com', '1/KzmTjZ+j0ICogR9oeakYQ/icMYb00rUdrqEfb7+74=', 1594458510),
(38, 'myemwaii@gmail.com', '8bdxFrSQE+Gk5AZIAvvT4CaL8TACg37jhfDgVk464Jg=', 1594458522),
(39, 'myemwaii@gmail.com', 'hHB3m0JMhk77o+J8UIQRfg0sT5mhHcZsWeVSBXc6a5Y=', 1594458610),
(40, 'myemwaii@gmail.com', 'bBrALUCgcbMFYLlnbTtJe9efKndFZNZ8gAxN7V0EOZk=', 1594458617),
(41, 'myemwaii@gmail.com', 'Bq+ob3Yr9hh1aXUCxSXvq/m1rMTpYPSKTu5V4p6+oCw=', 1594458749),
(42, 'myemwaii@gmail.com', 'mTc1qCabZU9aoJicNPDCc9Gyr3EWQp5KuoGNzV8sBDs=', 1594459130),
(43, 'myemwaii@gmail.com', 'pOvAml9tqoCF9ew7SklxTjVZ9d2SNk17uM7LyuASTnE=', 1594459373),
(44, 'myemwaii@gmail.com', 'jMZ/w9+v4o1VBMMs1nRSGpD7kqMiYzAXaILtwOWNwpY=', 1594459681),
(45, 'myemwaii@gmail.com', 'xLiPmwy2muTDGTEAmtjXcBbtWw90cBFmqP21MJKrNRY=', 1594460190),
(46, 'myemwaii@gmail.com', 'StcBSuMrLziloNqQ4jWssm04VUHf1CvyK8+2OzjC1Aw=', 1594460892),
(47, 'myemwaii@gmail.com', 'lDNufhTie/9ytsCkf88ZTm2TRt2Ri0Nm8fW8nL5j4zk=', 1594467027),
(48, 'myemwaii@gmail.com', 'la9KlZTzBGi+FMDGNcCLr6Q9Zfx5GfCRa2HouoQU6uk=', 1594467849),
(49, 'myemwaii@gmail.com', '26oJIybrMfUlt2udmqU+SWx5d+VELUCKBq1T7XsH3nQ=', 1594522849);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`absensi_id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indexes for table `email_company`
--
ALTER TABLE `email_company`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ilowongan`
--
ALTER TABLE `ilowongan`
  ADD PRIMARY KEY (`id_ilowongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_id`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- Indexes for table `language_pair`
--
ALTER TABLE `language_pair`
  ADD PRIMARY KEY (`id_lang`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`payroll_id`),
  ADD KEY `karyawan_id` (`karyawan_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `rfreelance`
--
ALTER TABLE `rfreelance`
  ADD PRIMARY KEY (`id_freelance`),
  ADD KEY `id_job` (`id_job`),
  ADD KEY `id_lang` (`id_lang`);

--
-- Indexes for table `rinhouse`
--
ALTER TABLE `rinhouse`
  ADD PRIMARY KEY (`id_inhouse`),
  ADD KEY `id_ilowongan` (`id_ilowongan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `absensi_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_company`
--
ALTER TABLE `email_company`
  MODIFY `email` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ilowongan`
--
ALTER TABLE `ilowongan`
  MODIFY `id_ilowongan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `language_pair`
--
ALTER TABLE `language_pair`
  MODIFY `id_lang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rfreelance`
--
ALTER TABLE `rfreelance`
  MODIFY `id_freelance` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `rinhouse`
--
ALTER TABLE `rinhouse`
  MODIFY `id_inhouse` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`karyawan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cuti`
--
ALTER TABLE `cuti`
  ADD CONSTRAINT `cuti_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`karyawan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `payroll`
--
ALTER TABLE `payroll`
  ADD CONSTRAINT `payroll_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`karyawan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rfreelance`
--
ALTER TABLE `rfreelance`
  ADD CONSTRAINT `rfreelance_ibfk_1` FOREIGN KEY (`id_lang`) REFERENCES `language_pair` (`id_lang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rfreelance_ibfk_2` FOREIGN KEY (`id_job`) REFERENCES `jobs` (`id_job`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rinhouse`
--
ALTER TABLE `rinhouse`
  ADD CONSTRAINT `rinhouse_ibfk_1` FOREIGN KEY (`id_ilowongan`) REFERENCES `ilowongan` (`id_ilowongan`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
