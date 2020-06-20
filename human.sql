-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2020 at 04:59 PM
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
  `absensi` enum('M','S','I','A') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`absensi_id`, `karyawan_id`, `tanggal`, `absensi`) VALUES
(2, '5ed222662576e', '10-06-2020', 'M'),
(3, '5ed222662576e', '10-06-2020', 'M'),
(4, '5ed229b4c8946', '10-06-2020', 'S'),
(5, '5ed2390205f6a', '10-06-2020', 'I'),
(6, '5ed23897c1d5b', '11-06-2020', 'M'),
(7, '5ed226fcc6cfb', '11-06-2020', 'M'),
(8, '5ed2390205f6a', '11-06-2020', 'M'),
(10, '5ed222662576e', '19-06-2020', 'M'),
(11, '5ed226fcc6cfb', '19-06-2020', 'I'),
(12, '5ed229b4c8946', '19-06-2020', 'S'),
(13, '5ed23897c1d5b', '19-06-2020', 'M'),
(14, '5ee1aec3a48c2', '19-06-2020', 'I'),
(15, '5ed2ff2dacdf7', '19-06-2020', 'M');

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
('5ec5490d98d9f', '3325081707990004', 'Muhammad yulianto', '085228939407', 'mr.yulianto17@gmail.com', 'Codenatic', 'Jombor City, Yogyakarta', '5ec5490d98d9f.png');

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
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `nama_lengkap`, `tanggal_masuk`, `pendidikan`, `universitas`, `ttl`, `tgl_lahir`, `id_card`, `nama_ayah`, `nama_ibu`, `nama_ss`, `no_pasport`, `no_bpjs`, `no_npwp`, `alamat`, `city`, `state`, `zip`, `alamat_now`, `city_now`, `state_now`, `zip_now`, `email_kantor`, `email_pribadi`, `jenis_kelamin`, `jabatan_id`, `cv`, `kontrak_kerja`, `image`) VALUES
('5ed222662576e', 'Muhammad yulianto', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '', '', '', 0, '', '', '-', 2, '7-13_Hansi_Efendi.pdf', 'default.docx', '6e0fdcec06cc86193b6a233d84e4bfe4.jpg'),
('5ed226fcc6cfb', 'Muhammad yulianto', '28-05-2020', 'S1 Informatika', 'Universitas Teknologi Yogyakarta', 'Batang', '17-07-1999', 123, 'Baryanto', 'Saroyah', 'Not yet', '', '', '', '  B', 'Batang', 'Jawa tengah', 51271, 'A', 'Batang', 'Jawa tengah', 51271, 'emwai@codenatic.com', 'mr.yulianto17@gmail.com', 'Laki - laki', 1, '', '', '5d0a92ebdac44d130345da42ef43099d.jpg'),
('5ed229b4c8946', 'Kuproy', '27-06-2020', 'S1 Informatika', 'Universitas Teknologi Yogyakarta', 'Jakarta', '26-11-1999', 123, 'Junaedy', 'Yeti', '', 'F000000123', '123', '123', '        j', 'Jakarta', 'Jakarta', 55, 'y', 'Yogyakarta', 'DI. Yogyakarta', 55, 'kuproy@mail.com', 'kuproy@email.com', 'Laki - laki', 2, 'default.docx', 'default.docx', '63e35c7bc3a1e9677c483265a0b5c2f5.jpg'),
('5ed23897c1d5b', 'Jamet', '27-05-2020', 'S1 Informatika', 'Universitas Teknologi Yogyakarta', 'Batang', '26-11-1999', 123, 'Junaedy', 'Yeti', '', 'F000000123', '', '', ' x', 'Batang', 'Jawa tengah', 51271, 'z', 'Batang', 'Jawa tengah', 51271, 'jancok@mail.com', 'jancok@email.com', 'Laki - laki', 7, 'default.docx', 'default.docx', '3fa3fba36c590c7311c13c4828414994.jpg'),
('5ed2390205f6a', 'Fizi', '27-05-2020', 'S1 Informatika', 'Universitas Teknologi Yogyakarta', 'Batang', '26-11-1999', 123, 'Junaedy', 'Yeti', '', 'F000000123', '', '', 'x', 'Batang', 'Jawa tengah', 51271, 'z', 'Batang', 'Jawa tengah', 51271, 'jancok@mail.com', 'jancok@email.com', 'Perempuan', 6, '43-131-1-PB.pdf', '43-43-1-PB.pdf', '4e11816364fbc0c67366707ddd8e0b76.jpg'),
('5ed2ff2dacdf7', 'Kuproy', '11-05-2020', 'D3 Sastra Inggris', 'Universitas Teknologi Yogyakarta', 'Jakarta', '22-05-1999', 123, 'Junaedy', 'Yeti', '', '', '', '', 'd', 'Jakarta', 'Jakarta', 55000, 'x', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'kuproy@mail.com', 'kuproy@email.com', 'Perempuan', 5, '43-131-1-PB.pdf', '43-43-1-PB.pdf', '3fa3fba36c590c7311c13c4828414994.jpg'),
('5ee1aec3a48c2', 'Muhammad yulianto', '11-06-2020', 'S1 Informatika', 'Universitas Teknologi Yogyakarta', 'Batang', '17-07-1999', 0, 'ab', 's', '', '', '', '', 'limpung', 'Batang', 'Jawa tengah', 51271, 'yogya', 'Yogyakarta', 'DI. Yogyakarta', 55285, 'mr.yulianto17@gmail.com', 'mr.yulianto17@gmail.com', '-', 2, '1178-2606-1-PB.pdf', '20-24_Nency_SISTEM_PENDUKUNG_KEPUTUSAN_PEMBELIAN.pdf', 'mimin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `payroll_id` varchar(64) NOT NULL,
  `karyawan_id` varchar(64) CHARACTER SET latin1 NOT NULL,
  `tanggal` varchar(12) NOT NULL,
  `status` enum('belum','terbayar') NOT NULL,
  `jumlah` int(10) NOT NULL,
  `pembayaran` enum('transfer','cash') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`payroll_id`, `karyawan_id`, `tanggal`, `status`, `jumlah`, `pembayaran`) VALUES
('PY18042020001', '5ed2390205f6a', '18-06-2020', 'terbayar', 5000000, 'transfer');

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
('5ee9972c69797', 'Human resource management system', 10000000, '17-06-2020', '17-09-2020', '5ee9972c69797.jpg', 'Project manjemen karyawan PT. Apalah dayaku', '5ec378c795275');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabel untuk menyimpan data user';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `phone`, `role`, `last_login`, `photo`, `created_at`) VALUES
(2, 'emwai', '$2y$12$4ClkuCjS9rFWywFdIF2O7.fdH4QwHNdHUP5xPL5Q2msYMYaA1oEU2', 'bodoamaat', 'Emwai', '00000000000', 'admin', '2020-06-05 02:38:32', '3fa3fba36c590c7311c13c4828414994.jpg', '2020-04-29 23:59:05'),
(4, 'mimin', '$2y$12$FMrd3XqfkFwgDtJ.70BfpOSp99eBEoxa1TLzk6YoNgeunjpoDH8Bq', 'coklah@email.com', 'Mimin', '00000000000', 'admin', '2020-05-23 07:03:56', '3fa3fba36c590c7311c13c4828414994.jpg', '2020-05-23 07:03:30'),
(5, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'bodoamat@email.com', 'Mimin', '', 'admin', '2020-06-05 03:50:47', 'mimin.jpg', '2020-06-05 03:50:47');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `absensi_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`karyawan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
