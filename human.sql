-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2020 at 09:00 AM
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
('5ec378c795275', '333256229182', 'Emwai', '6285228939407', 'myemwaii@gmail.com', 'Emwai tech', 'Yogyakarta', '5ec378c795275.png'),
('5ec5490d98d9f', '3325081707990004', 'Muhammad yulianto', '085228939407', 'mr.yulianto17@gmail.com', 'CV. Codenatic', 'Jombor City, Yogyakarta', '5ec5490d98d9f.png');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(3) NOT NULL,
  `jabatan_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `jabatan_name`) VALUES
(1, 'Project Manager'),
(2, 'Karyawan'),
(3, 'Product Manager'),
(4, 'Sales Marketing'),
(5, 'Sales Executive'),
(6, 'Sales Admin'),
(7, 'Sales Manager'),
(8, 'Supervisory Development Program'),
(9, 'IT Support'),
(10, 'Senior In-House Linguist'),
(11, 'In-Host Linguist');

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
  `tgl_lahir` varchar(15) NOT NULL,
  `id_card` int(20) NOT NULL,
  `nama_ayah` varchar(40) NOT NULL,
  `nama_ibu` varchar(40) NOT NULL,
  `nama_ss` varchar(40) DEFAULT NULL,
  `no_pasport` varchar(25) DEFAULT NULL,
  `no_bpjs` varchar(25) DEFAULT NULL,
  `no_npwp` varchar(25) DEFAULT NULL,
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
  `jabatan_id` int(3) NOT NULL DEFAULT 2,
  `cv` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'default.docx',
  `kontrak_kerja` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'default.docx',
  `image` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `nama_lengkap`, `tanggal_masuk`, `pendidikan`, `universitas`, `ttl`, `tgl_lahir`, `id_card`, `nama_ayah`, `nama_ibu`, `nama_ss`, `no_pasport`, `no_bpjs`, `no_npwp`, `alamat`, `city`, `state`, `zip`, `alamat_now`, `city_now`, `state_now`, `zip_now`, `email_kantor`, `email_pribadi`, `jenis_kelamin`, `jabatan_id`, `cv`, `kontrak_kerja`, `image`) VALUES
('12dasdasdf123', 'Muhammad yulianto', '28-05-2020', 'S1 Informatika', 'Universitas Teknologi Yogyakarta', 'Batang', '17-07-1999', 123, 'B', 'S', NULL, NULL, NULL, NULL, 'B', 'Batang', 'Jawa tengah', 51271, 'L', 'Batang', 'Jawa tengah', 51271, 'e@mail.com', 'e@mail.com', NULL, 2, 'default.docx', 'default.docx', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `mulai` date NOT NULL,
  `selesai` date NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL,
  `client_id` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `mulai`, `selesai`, `image`, `description`, `client_id`) VALUES
('5ec4ceqwrer81', 'Aplikasi WEEBS', 1000000, '2020-05-05', '2020-06-05', 'default.jpg', 'aplikasi untuk weebs sharing', '5ec378c795275'),
('5ecde22a4e467', 'Manga WEEBS', 20000000, '2020-05-27', '2020-06-27', '5ecde22a4e467.jpg', 'Manga weebs', '5ec5490d98d9f'),
('5ecf4bf758f36', 'Jancukers', 2000, '2020-05-29', '2020-05-29', '5ecf4bf758f36.jpg', 'jancok lah', '5ec378c795275');

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
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `last_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `photo` varchar(64) NOT NULL DEFAULT 'user_no_image.jpg',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `created_at`, `is_active`) VALUES
(2, 'emwai', '$2y$12$4ClkuCjS9rFWywFdIF2O7.fdH4QwHNdHUP5xPL5Q2msYMYaA1oEU2', 'bodoamaat', 'Emwai', '00000000000', 'admin', '2020-05-28 06:52:07', 'user_no_image.jpg', '2020-04-29 23:59:05', 1),
(4, 'mimin', '$2y$12$FMrd3XqfkFwgDtJ.70BfpOSp99eBEoxa1TLzk6YoNgeunjpoDH8Bq', 'coklah@email.com', 'Mimin', '00000000000', 'admin', '2020-05-23 07:03:56', 'user_no_image.jpg', '2020-05-23 07:03:30', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_id`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `client_id` (`client_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
