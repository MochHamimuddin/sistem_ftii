-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2024 at 05:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_ftii`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas_adm`
--

CREATE TABLE `berkas_adm` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `kategori_adm_id` int(11) NOT NULL,
  `tanggal_pengumpulan` datetime NOT NULL,
  `berkas` varchar(255) DEFAULT NULL,
  `keterangan` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `berkas_adm`
--

INSERT INTO `berkas_adm` (`id`, `mahasiswa_id`, `kategori_adm_id`, `tanggal_pengumpulan`, `berkas`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-03-12 04:30:22', 'berkas_adm/1710196726_Tutorial cara mengisi KRS.pdf', 2, '2024-03-11 14:30:22', '2024-03-11 15:38:46');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `kode_dosen` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `kode_dosen`, `nama`, `jenis_kelamin`, `alamat`, `email`, `telpon`, `password`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1002, 'Mia Kamayani', 'P', 'ps rebo', 'miakamayani@gmail.com', '08123123123', '$2y$12$eHrEx3kwx6juPi2zmrVvI.qHZgBrWdHuBeEm.l1.BJv2.BO95sal6', '1.png', '2024-03-11 11:55:08', '2024-03-11 11:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `final_project`
--

CREATE TABLE `final_project` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `deskripsi` varchar(45) NOT NULL,
  `berkas_final` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `mahasiswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_adm`
--

CREATE TABLE `kategori_adm` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kategori_adm`
--

INSERT INTO `kategori_adm` (`id`, `nama`, `tanggal_mulai`, `tanggal_akhir`, `status`) VALUES
(1, 'SPTJM', '2024-03-09', '2024-03-16', 1),
(2, 'Surat Rekomendasi', '2024-03-09', '2024-03-16', 1),
(3, 'Surat Letter Of Acceptment(LOA)', '2024-03-09', '2024-03-16', 1),
(4, 'Kartu Rancangan Konversi SKS', '2024-03-09', '2024-03-16', 1),
(5, 'Transkip Nilai', '2024-03-09', '2024-03-16', 1),
(6, 'Logbook', '2024-03-09', '2024-03-16', 1),
(7, 'Final Project', '2024-03-09', '2024-03-16', 1),
(8, 'Kartu Nilai Konversi SKS', '2024-03-09', '2024-03-16', 1),
(9, 'Dokumentasi Kegiatan', '2024-03-09', '2024-03-16', 1),
(10, 'Bukti Hadir Seminar Kegiatan', '2024-03-09', '2024-03-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_konversi`
--

CREATE TABLE `kategori_konversi` (
  `id` int(11) NOT NULL,
  `kode_mk` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `jumlah_sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `status` enum('Lolos','Tidak Lolos') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `berkas_kegiatan` varchar(255) NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `program_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama`, `status`, `foto`, `berkas_kegiatan`, `mitra_id`, `program_id`, `mahasiswa_id`) VALUES
(1, 'Fullstack Web Developer', 'Lolos', '1710182080_WhatsApp Image 2024-03-07 at 05.57.04.jpeg', '', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `konversi`
--

CREATE TABLE `konversi` (
  `id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `mahasiswa_program_id` int(11) NOT NULL,
  `kategori_konversi_id` int(11) NOT NULL,
  `nilai_mbkm` int(11) NOT NULL,
  `nilai_konversi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(11) NOT NULL,
  `deskripsi` varchar(500) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_akhir` date NOT NULL,
  `status` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id`, `deskripsi`, `tanggal_mulai`, `tanggal_akhir`, `status`, `kegiatan_id`, `mahasiswa_id`, `dosen_id`) VALUES
(1, 'apa saja', '2024-03-01', '2024-04-30', 0000000001, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `semester` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telpon` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `program_id` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `name`, `jenis_kelamin`, `semester`, `alamat`, `email`, `telpon`, `password`, `role`, `foto`, `program_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 2003015150, 'Hamimuddin', 'L', '8(Genap)', 'Kp.Kapuk I No.49 RT.005/RW.006', 'mochhamimuddin@gmail.com', '081233838624', '$2y$12$MuV.rzEtFM/CBEj41L9c7ui47S.f18e8.RGwu7yWjeQDlu4bRUuni', 'peserta', '1.png', 2, NULL, '2024-03-10 08:00:41', '2024-03-10 08:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_07_132957_add_multiple_columns_to_mahasiswa', 1),
(6, '2023_12_10_011124_add_nim_dosen_to_users_table', 1),
(7, '2023_12_25_013310_add_multiple_columns_to_dosen', 1),
(8, '2023_12_25_024500_add_multiple_columns_to_mitra', 1),
(9, '2023_12_26_050118_add_multiple_columns_to_berkas_adm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mitra`
--

CREATE TABLE `mitra` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `mitra`
--

INSERT INTO `mitra` (`id`, `nama`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'MBKM', 'client-1.png', NULL, NULL),
(2, 'MAGENTA', 'client-2.png', NULL, NULL),
(3, 'DICODING', 'client-4.jpg', NULL, NULL),
(4, 'INTERNAL FTII', 'client-3.png', NULL, '2024-03-08 10:51:16');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `mitra_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`id`, `nama`, `foto`, `mitra_id`) VALUES
(1, 'Kampus Mengajar', 'km-1.png', 1),
(2, 'Magang dan Studi Independen', 'km-2.png', 1),
(3, 'Pertukaran Mahasiswa ', 'km-3.png', 1),
(4, 'Wirausaha Merdeka', 'km-4.png', 1),
(5, 'Indonesian International Student Mobility Awa', 'km-5.png', 1),
(6, 'Praktisi Mengajar ', 'km-6.png', 1),
(7, 'Magang Khusus', NULL, 2),
(8, 'Magang Umum', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1001, 'admin', 'admin@gmail.com', NULL, '$2y$12$P86SRIhwUdYH4yQB0zjwaO2XIC87bImByJiMalYeV7pGzWj6bcfRO', 'admin', 'dUBBWWgNgebaVPs0PaeLEZzGtxnTn5qxWELVejTGL3gBDCAlOngss3m6J06L', '2024-03-08 10:33:29', '2024-03-08 10:33:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas_adm`
--
ALTER TABLE `berkas_adm`
  ADD PRIMARY KEY (`id`,`mahasiswa_id`,`kategori_adm_id`),
  ADD KEY `fk_berkas_adm_kategori_adm1_idx` (`kategori_adm_id`),
  ADD KEY `fk_berkas_adm_mahasiswa1_idx` (`mahasiswa_id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_dosen_UNIQUE` (`kode_dosen`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `final_project`
--
ALTER TABLE `final_project`
  ADD PRIMARY KEY (`id`,`mahasiswa_id`),
  ADD KEY `fk_final_project_mahasiswa1_idx` (`mahasiswa_id`);

--
-- Indexes for table `kategori_adm`
--
ALTER TABLE `kategori_adm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_konversi`
--
ALTER TABLE `kategori_konversi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`,`mitra_id`,`program_id`,`mahasiswa_id`),
  ADD KEY `fk_kegiatan_mitra1_idx` (`mitra_id`),
  ADD KEY `fk_kegiatan_program1_idx` (`program_id`),
  ADD KEY `fk_kegiatan_mahasiswa1_idx` (`mahasiswa_id`);

--
-- Indexes for table `konversi`
--
ALTER TABLE `konversi`
  ADD PRIMARY KEY (`id`,`dosen_id`,`mahasiswa_id`,`mahasiswa_program_id`,`kategori_konversi_id`),
  ADD KEY `fk_dosen_has_mahasiswa_mahasiswa1_idx` (`mahasiswa_id`,`mahasiswa_program_id`),
  ADD KEY `fk_dosen_has_mahasiswa_dosen1_idx` (`dosen_id`),
  ADD KEY `fk_konversi_kategori_konversi1_idx` (`kategori_konversi_id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`,`kegiatan_id`,`mahasiswa_id`,`dosen_id`),
  ADD KEY `fk_logbook_kegiatan1_idx` (`kegiatan_id`),
  ADD KEY `fk_logbook_mahasiswa1_idx` (`mahasiswa_id`),
  ADD KEY `fk_logbook_dosen1_idx` (`dosen_id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`,`program_id`),
  ADD KEY `fk_mahasiswa_program1_idx` (`program_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mitra`
--
ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`id`,`mitra_id`),
  ADD KEY `fk_program_mitra1_idx` (`mitra_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas_adm`
--
ALTER TABLE `berkas_adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `final_project`
--
ALTER TABLE `final_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_adm`
--
ALTER TABLE `kategori_adm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori_konversi`
--
ALTER TABLE `kategori_konversi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konversi`
--
ALTER TABLE `konversi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mitra`
--
ALTER TABLE `mitra`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berkas_adm`
--
ALTER TABLE `berkas_adm`
  ADD CONSTRAINT `fk_berkas_adm_kategori_adm1` FOREIGN KEY (`kategori_adm_id`) REFERENCES `kategori_adm` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_berkas_adm_mahasiswa1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `final_project`
--
ALTER TABLE `final_project`
  ADD CONSTRAINT `fk_final_project_mahasiswa1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_kegiatan_mahasiswa1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kegiatan_mitra1` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kegiatan_program1` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `konversi`
--
ALTER TABLE `konversi`
  ADD CONSTRAINT `fk_dosen_has_mahasiswa_dosen1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dosen_has_mahasiswa_mahasiswa1` FOREIGN KEY (`mahasiswa_id`,`mahasiswa_program_id`) REFERENCES `mahasiswa` (`id`, `program_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_konversi_kategori_konversi1` FOREIGN KEY (`kategori_konversi_id`) REFERENCES `kategori_konversi` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `logbook`
--
ALTER TABLE `logbook`
  ADD CONSTRAINT `fk_logbook_dosen1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_logbook_kegiatan1` FOREIGN KEY (`kegiatan_id`) REFERENCES `kegiatan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_logbook_mahasiswa1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_mahasiswa_program1` FOREIGN KEY (`program_id`) REFERENCES `program` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `fk_program_mitra1` FOREIGN KEY (`mitra_id`) REFERENCES `mitra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
