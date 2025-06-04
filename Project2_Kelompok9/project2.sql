-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2025 at 01:45 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_feedback`
--

CREATE TABLE `tb_feedback` (
  `Nama` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Feedback` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_feedback`
--

INSERT INTO `tb_feedback` (`Nama`, `Email`, `Feedback`) VALUES
('inul', 'inul@gmail.com', 'pengangkutan cepat'),
('Hana', 'hana@gmail.com', 'hh'),
('Nurul', 'nurul23@gmail.com', 'pelayanan nya sangat baik');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporanpetugas`
--

CREATE TABLE `tb_laporanpetugas` (
  `id_laporanpetugas` int NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi_tugas` varchar(255) DEFAULT NULL,
  `deskripsi_tugas` text,
  `upload_foto` varchar(255) DEFAULT NULL,
  `id_petugas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_laporanpetugas`
--

INSERT INTO `tb_laporanpetugas` (`id_laporanpetugas`, `nama`, `no_hp`, `tanggal`, `lokasi_tugas`, `deskripsi_tugas`, `upload_foto`, `id_petugas`) VALUES
(21, NULL, NULL, '2025-06-20', 'kalijati', 'sudah selesai', '1748874203_1744298332_1744131249.jpg', 22),
(22, NULL, NULL, '2025-06-22', 'kalijati', 'hh', '1748874253_1744301360.jpg', 24),
(23, NULL, NULL, '2025-07-26', 'cilengsing', 'Sudah Menyelesaikan Tugas di TPS 02 Kampung Cibogo Kec.Cibogo Kab.Subang', '1748875473_1744131249.jpg', 23),
(24, NULL, NULL, '2025-09-30', 'Citarum', 'Saya dan rekan tim saya sudah menyelesaikan tuga di kp.citarum Rt 02/01 di Kec.Citarum Kab.Subang. Semuanya  sudah bersih amann', '1748875565_1744176782.jpg', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengaduan`
--

CREATE TABLE `tb_pengaduan` (
  `id_pengaduan` int NOT NULL,
  `Nama` varchar(200) NOT NULL,
  `Alamat` varchar(200) NOT NULL,
  `Tanggal` date DEFAULT NULL,
  `No_HP` varchar(200) NOT NULL,
  `Pengaduan` varchar(1000) NOT NULL,
  `Foto_Pengaduan` varchar(200) NOT NULL,
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pengaduan`
--

INSERT INTO `tb_pengaduan` (`id_pengaduan`, `Nama`, `Alamat`, `Tanggal`, `No_HP`, `Pengaduan`, `Foto_Pengaduan`, `status`) VALUES
(30, 'sakeum', 'Subang', '2025-05-23', '082117929706', 'Sampah menumpuk dijalan cibogo yang mau polsub', '1747966296.jpg', 'Selesai'),
(35, 'jaim', 'Subang', '2025-07-04', '082117929706', 'hahahaha', '1748855488.jpg', 'Selesai'),
(36, 'helma', 'Kalimantan', '2025-06-28', '0984652717', 'Banyak sampah di  tps saya', '1748921677.jpg', 'Pengaduan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penugasan`
--

CREATE TABLE `tb_penugasan` (
  `id_penugasan` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `kelompok_petugas` varchar(100) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `id_pengaduan` int NOT NULL,
  `id_petugas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_penugasan`
--

INSERT INTO `tb_penugasan` (`id_penugasan`, `tanggal`, `lokasi`, `kelompok_petugas`, `status`, `id_pengaduan`, `id_petugas`) VALUES
(12, NULL, NULL, '23', NULL, 30, 18),
(14, NULL, NULL, '20', NULL, 36, 22);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `Nama` varchar(200) NOT NULL,
  `No_HP` varchar(200) NOT NULL,
  `Alamat` varchar(200) NOT NULL,
  `keterangan` text,
  `id_petugas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`Nama`, `No_HP`, `Alamat`, `keterangan`, `id_petugas`) VALUES
('hana', '082117929706', 'Pagaden', 'Tim A terdiri dari Hana, Nurul, Cherry', 18),
('Nurul', '02286518191', 'Kalijati', 'Tim B, terdiri dari Dini, Gita, Amirah', 19),
('Indah', '02286518191', 'Purwadadi', 'TIM C, terdiri dari Gita, Syifa, Cindy', 20),
('Sasa', '082117929706', 'Kasomalang', 'TIM A, Terdiri dari Sasi, Susi, Sisu', 21),
('Jihuy', '082117929706', 'Jalancagak', 'TIM C, Terdiri dari Jiay, jihiy, juh', 22),
('Ijal', '082117929700', 'Cibudug', 'TIM B, Terdiri dari ijul,ijel,ijal', 23),
('Samul', '098726437818', 'Ciborok', 'TIm A, Terdiri dari samel,samul,samsul', 24);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pj`
--

CREATE TABLE `tb_pj` (
  `id` int NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `No_HP` varchar(50) NOT NULL,
  `Alamat` varchar(50) NOT NULL,
  `TPS` varchar(50) NOT NULL,
  `Keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_pj`
--

INSERT INTO `tb_pj` (`id`, `Nama`, `No_HP`, `Alamat`, `TPS`, `Keterangan`) VALUES
(15, 'Sarnii', '0988266377', 'Subang', 'TPS 1', 'Mengelola TPS Subang Blok B'),
(16, 'Burhan', '082117929706', 'Kalijati', 'TPS 12', 'Mengelola TPS Kalijati B'),
(18, 'Hana', '082117929706', 'Pagaden', 'TPS 9', 'Mengelola TPS Pagaden Blok A'),
(19, 'Nurul', '082117929706', 'Sukamelang', 'TPS 7', 'Mengelola TPS Sukamelang Blok B'),
(20, 'Jai', '089827616161', 'Cinagsi', 'TPS 2', 'Mengelola TPS Cinangsi Blok J'),
(23, 'Hana', '089827616161', 'heh', 'TPS 1', 'Mengelola TPS Kalijati B');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `level` tinyint NOT NULL DEFAULT '3' COMMENT '1=Kepala Bidang, 2=Penanggung Jawab, 3=Petugas',
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `password`, `created_at`, `updated_at`, `level`, `remember_token`) VALUES
(10, 'Kabid', 'kabid@gmail.com', '$2y$10$918ICu2nHjiSALbMeatr..YrjwvLrQrgdqRj10mgI6lHglYKQfTSS', '2025-05-19 06:22:31', '2025-05-19 06:22:31', 1, NULL),
(13, 'pj', 'pj@gmail.com', '$2y$10$5OCK4Y3f.wc4D3gDrsM9DezrNyuIT/Ti7Ko0Q0o4T5yEyFSCmL4.m', '2025-05-19 06:45:11', '2025-05-19 06:45:11', 2, NULL),
(14, 'Petugas', 'petugas@gmail.com', '$2y$10$pvFuXGdHpHO9HMj7C2FPMOwoBYm2q1v06VCBTAK7KFNhoYlRdpkCO', '2025-05-19 06:48:11', '2025-05-19 06:48:11', 3, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_laporanpetugas`
--
ALTER TABLE `tb_laporanpetugas`
  ADD PRIMARY KEY (`id_laporanpetugas`),
  ADD KEY `fk_laporan_petugas` (`id_petugas`);

--
-- Indexes for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indexes for table `tb_penugasan`
--
ALTER TABLE `tb_penugasan`
  ADD PRIMARY KEY (`id_penugasan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`),
  ADD KEY `fk_penugasan_petugas` (`id_petugas`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_pj`
--
ALTER TABLE `tb_pj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_laporanpetugas`
--
ALTER TABLE `tb_laporanpetugas`
  MODIFY `id_laporanpetugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_pengaduan`
--
ALTER TABLE `tb_pengaduan`
  MODIFY `id_pengaduan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_penugasan`
--
ALTER TABLE `tb_penugasan`
  MODIFY `id_penugasan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_pj`
--
ALTER TABLE `tb_pj`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_laporanpetugas`
--
ALTER TABLE `tb_laporanpetugas`
  ADD CONSTRAINT `fk_laporan_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penugasan`
--
ALTER TABLE `tb_penugasan`
  ADD CONSTRAINT `fk_penugasan_petugas` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_penugasan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `tb_pengaduan` (`id_pengaduan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
