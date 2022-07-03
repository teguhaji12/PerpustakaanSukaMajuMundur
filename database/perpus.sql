-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2022 at 05:01 AM
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
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `buku_judul` varchar(100) DEFAULT NULL,
  `buku_penerbit` varchar(50) DEFAULT NULL,
  `buku_pengarang` varchar(50) DEFAULT NULL,
  `buku_tahun_terbit` year(4) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `buku_stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `buku_judul`, `buku_penerbit`, `buku_pengarang`, `buku_tahun_terbit`, `id_kategori`, `buku_stok`) VALUES
(1, 'The Witcher 3', 'Graha Mulia', 'Adjie Susanto', 2019, 7, 2),
(3, 'The Witcher 2', 'Graha Mulia', 'Adjie Susanto', 2139, 7, 3),
(4, 'The Witcher', 'Graha Mulia', 'Adjie Susanto', 2011, 7, 4),
(5, 'Naruto', 'Shounen Jump', 'Masashi Kishimoto', 2000, 4, 5),
(6, 'Bleach', 'Shounen Jump', 'Tite Kubo', 2000, 4, 7),
(7, 'Matimatika Lanjut', 'Kemdikti', 'Ali Sarjo', 2015, 3, 50);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Sains'),
(3, 'Matematika'),
(4, 'Komik'),
(5, 'Sejarah'),
(6, 'Cerpen'),
(7, 'Novel'),
(8, 'Bahasa Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `kelas_nama` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `kelas_nama`) VALUES
(1, '1A'),
(3, '1B'),
(4, '2A'),
(5, '2B'),
(6, '3A'),
(7, '3B');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id` int(11) NOT NULL,
  `nama_aplikasi` varchar(50) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `waktu_denda` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id`, `nama_aplikasi`, `denda`, `waktu_denda`) VALUES
(1, 'Perpus-SMPN 1 Sarjo', 1000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `pinjam_id` int(11) NOT NULL,
  `pinjam_nama` varchar(50) DEFAULT NULL,
  `pinjam_status` enum('siswa','guru') DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `id_buku2` int(11) DEFAULT NULL,
  `pinjam_tanggal` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `pinjam_status_kembali` enum('sudah dikembalikan','belum dikembalikan') DEFAULT NULL,
  `pinjam_tanggal_kembali` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`pinjam_id`, `pinjam_nama`, `pinjam_status`, `id_buku`, `id_buku2`, `pinjam_tanggal`, `id_user`, `id_kelas`, `pinjam_status_kembali`, `pinjam_tanggal_kembali`, `denda`) VALUES
(3, 'Ahmat Arnal', 'siswa', 4, 0, '2019-12-16', 1, 1, 'belum dikembalikan', NULL, NULL),
(4, 'Andrian Maulana', 'siswa', 5, NULL, '2019-12-27', 1, 3, 'belum dikembalikan', NULL, NULL),
(5, 'Yudha', 'siswa', 3, 0, '2019-12-28', 1, 3, 'sudah dikembalikan', '2019-12-29', NULL),
(6, 'Himiko', 'siswa', 3, 1, '2019-12-28', 1, 3, 'belum dikembalikan', NULL, NULL),
(8, 'Merlin', 'guru', 5, 4, '2019-12-29', 1, NULL, 'sudah dikembalikan', '2020-03-26', 23000),
(11, 'aaaa', 'siswa', 3, 0, '2019-12-31', 1, 1, 'sudah dikembalikan', '2022-01-22', 19000);

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_kelas`
--

CREATE TABLE `pinjam_kelas` (
  `pinjam_id` int(11) NOT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `pinjam_penanggung_jawab` varchar(50) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `pinjam_jumlah_buku` int(5) DEFAULT NULL,
  `pinjam_tanggal` date DEFAULT NULL,
  `pinjam_status` enum('belum dikembalikan','sudah dikembalikan') DEFAULT NULL,
  `pinjam_tanggal_kembali` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pinjam_kelas`
--

INSERT INTO `pinjam_kelas` (`pinjam_id`, `id_kelas`, `pinjam_penanggung_jawab`, `id_buku`, `pinjam_jumlah_buku`, `pinjam_tanggal`, `pinjam_status`, `pinjam_tanggal_kembali`, `id_user`, `denda`) VALUES
(1, 6, 'Kartika', 7, 50, '2019-12-29', 'sudah dikembalikan', '2020-03-26', 1, 50000),
(4, 1, 'Samsir', 6, 2, '2020-03-26', 'belum dikembalikan', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('Admin','Petugas') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$lJmSnBtucoM/Q5p7mkB2OuV6KfxkjeOel3V3aUWKZGrdnMbzotwIO', 'Admin'),
(2, 'arnal', '$2y$10$WBQ6ZaAU4bi3yV/iN59RMOLvDzU0xhBMKxaa0e0GVIzxSohD7UtNu', 'Petugas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`pinjam_id`);

--
-- Indexes for table `pinjam_kelas`
--
ALTER TABLE `pinjam_kelas`
  ADD PRIMARY KEY (`pinjam_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `pinjam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pinjam_kelas`
--
ALTER TABLE `pinjam_kelas`
  MODIFY `pinjam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
