-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 13, 2025 at 07:13 PM
-- Server version: 8.0.30
-- PHP Version: 8.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujikir_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `token`) VALUES
(1, 'admin', '69d72098eaf26d1d40ec96dd43a1733f', '39606b5cabefbde0f4a9a56fdf874791');

-- --------------------------------------------------------

--
-- Table structure for table `pengumpulan`
--

CREATE TABLE `pengumpulan` (
  `id` int NOT NULL,
  `nama_pic` varchar(255) NOT NULL,
  `akreditasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `visi_misi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `maklumat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sop` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `indeks_kepuasan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dokumentasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lokasi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tenaga_penguji` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fasilitas_pengujian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `akurasi_alat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bukti_lulus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kapasitas_uji` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pemeliharaan_fasilitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `akreditasi_lama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `date` date NOT NULL,
  `nilai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengumpulan`
--

INSERT INTO `pengumpulan` (`id`, `nama_pic`, `akreditasi`, `visi_misi`, `maklumat`, `sop`, `indeks_kepuasan`, `dokumentasi`, `lokasi`, `tenaga_penguji`, `fasilitas_pengujian`, `akurasi_alat`, `bukti_lulus`, `kapasitas_uji`, `pemeliharaan_fasilitas`, `akreditasi_lama`, `date`, `nilai`) VALUES
(18, '', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', 'KHS-20221-210511134.pdf', '2025-05-12', 'A'),
(19, 'sumber', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', 'Praktikum PBO2 Alima Aprili.pdf', '2025-05-03', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pic_uppkb` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `email`, `username`, `password`, `pic_uppkb`, `token`) VALUES
(13, 'ilman.nafis02@gmail.com', 'ilman', '81dc9bdb52d04dc20036dbd8313ed055', 'cirebon kota', '88f1c54374dc66a2b496bb3bd148bd92');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengumpulan`
--
ALTER TABLE `pengumpulan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
