-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Nov 2024 pada 07.47
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sayker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar_banner` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banners`
--

INSERT INTO `banners` (`id`, `gambar_banner`, `created_at`, `updated_at`) VALUES
(1, 'banner1.png', NULL, NULL),
(2, 'banner2.png', NULL, NULL),
(3, 'banner3.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `gambar_kategori` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `gambar_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Sayur Original', 'Kategori1.jpg', '2024-10-12 12:23:21', '2024-10-12 12:23:21'),
(2, 'Sayur Pack Ori', 'Kategori2.jpg', '2024-10-12 12:53:50', '2024-10-12 12:53:50'),
(3, 'Sayur Mix', 'Kategori3.jpg', '2024-10-12 14:19:30', '2024-10-12 14:19:30'),
(4, 'Bahan Mentah', '1730698755.jpg', '2024-10-25 13:14:47', '2024-11-03 22:39:15'),
(5, 'Bahan Olahan', 'Kategori5.jpg', '2024-10-25 13:14:47', '2024-10-25 13:14:47'),
(6, 'Ikan Asin', 'Kategori6.jpg', '2024-10-25 13:14:47', '2024-10-25 13:14:47'),
(7, 'Bumbu Basah', 'Kategori7.jpg', '2024-10-25 13:14:47', '2024-10-25 13:14:47'),
(9, 'Bumbu dan Rempah', '1730700841.jpg', '2024-11-03 23:13:39', '2024-11-03 23:14:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pengguna_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `harga` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keranjangs`
--

INSERT INTO `keranjangs` (`id`, `pengguna_id`, `produk_id`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(4, 9, 1, 3, 12000.00, '2024-11-01 21:25:55', '2024-11-01 21:51:18'),
(5, 9, 3, 1, 10000.00, '2024-11-01 21:33:20', '2024-11-01 21:33:20'),
(7, 9, 5, 3, 8000.00, '2024-11-01 22:01:04', '2024-11-01 22:01:04'),
(9, 5, 3, 4, 10000.00, '2024-11-01 22:01:45', '2024-11-01 22:01:45'),
(10, 5, 4, 3, 9000.00, '2024-11-01 22:01:48', '2024-11-03 00:46:44'),
(12, 5, 6, 1, 7000.00, '2024-11-03 06:20:39', '2024-11-03 06:20:39'),
(13, 5, 9, 1, 6000.00, '2024-11-03 23:30:05', '2024-11-03 23:30:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_12_110103_create_produks_table', 1),
(5, '2024_10_12_111431_create_stoks_table', 2),
(6, '2024_10_12_111640_create_kategoris_table', 3),
(7, '2024_10_12_135943_add_keterangan_to_produks_table', 4),
(8, '2024_10_13_125610_create_penggunas_table', 5),
(9, '2024_10_22_071538_create_banners_table', 6),
(10, '2024_10_25_125840_add_gambar_kategori_to_kategoris_table', 7),
(11, '2024_11_01_013917_create_keranjangs_table', 8),
(12, '2024_11_02_033758_add_harga_to_keranjangs_table', 9),
(13, '2024_11_03_113412_add_tgl_kadaluarsa_to_stoks_table', 10),
(14, '2024_11_03_113620_add_masa_tahan_to_produks_table', 11),
(15, '2024_11_03_113743_drop_tanggal_kedaluwarsa_from_produks_table', 12),
(16, '2024_11_04_045314_add_foreign_key_to_stoks_table', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunas`
--

CREATE TABLE `penggunas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('pelanggan','admin','pengelola','pengantar') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penggunas`
--

INSERT INTO `penggunas` (`id`, `username`, `email`, `nohp`, `password`, `role`, `created_at`, `updated_at`) VALUES
(5, 'Mardhatillah', 'tila@gmail.com', '085360952818', '$2y$12$NGMPw1gIZiplMCw7zN8B4.gSkaQ85Ghz6P1arO0uNmXVSPX2FLcdO', 'pelanggan', '2024-10-14 02:52:27', '2024-11-03 00:41:42'),
(6, 'Kelompok B', 'kelompokb@gmail.com', '089300303', '$2y$12$6CUjNglCifkwnyO/dAYaF.21QNk.POu8uNdMU/pEt9mplNdHzAESO', 'pelanggan', '2024-10-14 03:56:16', '2024-10-14 03:56:16'),
(7, 'Liam', 'liam@gmail.com', '090203939', '$2y$12$GlZLXQQynlux35pZlgJP5O952q9mvq6iOqSAZkU6Pui0iP/rbY0BW', 'pelanggan', '2024-10-17 06:48:06', '2024-10-17 06:48:06'),
(9, 'Harry James Potter', 'harry@gmail.com', '11111111111', '$2y$12$me/HNDMkRnwWOnHQGnXzpe8AXoJWlCVAUkhM8p1nHTeEPNAmm6YCu', 'pelanggan', '2024-10-27 04:35:45', '2024-11-03 00:21:58'),
(10, 'Admin1', 'admin1@gmail.com', '081234567890', '$2y$12$VGeN5eE.axyBw8Hfx9GvROgt28c80e8MzZxdquLZ.qWDkOsEoS6CK', 'admin', NULL, NULL),
(11, 'Admin2', 'admin2@gmail.com', '081234567891', '$2y$12$x6wFGekEvbCwS0oDUcOMqO6vcNQxLWSTdPXlvFL2rYyZK/HiJTvqO', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `masa_tahan` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `nama`, `harga`, `masa_tahan`, `gambar`, `kategori_id`, `created_at`, `updated_at`, `keterangan`) VALUES
(1, 'Kentang', 12000.00, 7, 'K1_1.jpg', 1, '2024-10-12 12:24:32', '2024-11-03 21:40:45', 'Kentang 1/2 Kg'),
(2, 'Terong', 4000.00, 7, 'K1_2.jpg', 1, '2024-10-12 12:44:45', '2024-11-03 21:34:03', 'Isi: 2 buah'),
(3, 'Jagung Pack', 10000.00, 8, 'K2_1.jpg', 2, '2024-10-12 12:54:25', '2024-11-03 21:33:23', 'Isi: 2 buah'),
(4, 'Jamur Tiram', 9000.00, 5, 'K2_2.jpg', 2, '2024-10-12 12:56:29', '2024-11-03 21:33:42', 'Jamur Tiram'),
(5, 'Capcai', 8000.00, 3, 'K3_1.jpg', 3, '2024-10-12 14:20:07', '2024-11-03 21:33:33', 'Buncis, Wortel, Bunga Kol, D.Bawang, B.Merah, B.Putih'),
(6, 'Sawi Wortel', 7000.00, 3, 'K3_2.jpg', 3, '2024-10-12 14:21:52', '2024-11-03 21:30:19', 'Sawi, Wortel, D.Bawang, B.Merah'),
(9, 'Tomat', 6000.00, 7, '1730698417.jpg', 2, '2024-11-03 21:32:14', '2024-11-03 22:33:37', 'Isi: 3 buah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('FnhX2LkNXxpvCZiItdT5LFHx3OtHHKb1nOH63L0L', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36 Edg/130.0.0.0', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiNHBnVGRsZkxGRE9RZ0I5VzVDUDVDMnFuSUZldjhPdHRWQ3B1NFh1ZCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi1zdG9rIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7czo4OiJ1c2VybmFtZSI7czo2OiJBZG1pbjEiO3M6NToiZW1haWwiO3M6MTY6ImFkbWluMUBnbWFpbC5jb20iO3M6NDoibm9ocCI7czoxMjoiMDgxMjM0NTY3ODkwIjtzOjEwOiJrZXJhbmphbmdzIjtPOjM5OiJJbGx1bWluYXRlXERhdGFiYXNlXEVsb3F1ZW50XENvbGxlY3Rpb24iOjI6e3M6ODoiACoAaXRlbXMiO2E6MDp7fXM6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDt9fQ==', 1730702736);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stoks`
--

CREATE TABLE `stoks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tgl_kadaluarsa` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stoks`
--

INSERT INTO `stoks` (`id`, `produk_id`, `jumlah`, `tgl_kadaluarsa`, `created_at`, `updated_at`) VALUES
(1, 1, 15, '2024-11-03', '2024-10-12 12:30:02', '2024-11-03 05:25:38'),
(2, 2, 8, '2024-11-11', '2024-10-12 12:46:19', '2024-11-03 23:14:50'),
(3, 3, 9, '2024-11-12', '2024-10-12 12:55:54', '2024-11-03 23:14:45'),
(4, 4, 7, '2024-11-09', '2024-10-12 12:59:22', '2024-11-03 23:14:37'),
(5, 5, 10, '2024-11-07', '2024-10-12 14:21:26', '2024-11-03 21:41:23'),
(7, 6, 2, '2024-11-03', '2024-11-03 06:13:24', '2024-11-03 06:13:24'),
(9, 9, 20, '2024-11-11', '2024-11-03 21:32:14', '2024-11-03 21:34:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjangs_pengguna_id_foreign` (`pengguna_id`),
  ADD KEY `keranjangs_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `penggunas`
--
ALTER TABLE `penggunas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penggunas_email_unique` (`email`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `stoks`
--
ALTER TABLE `stoks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stoks_produk_id_foreign` (`produk_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `penggunas`
--
ALTER TABLE `penggunas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `stoks`
--
ALTER TABLE `stoks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD CONSTRAINT `keranjangs_pengguna_id_foreign` FOREIGN KEY (`pengguna_id`) REFERENCES `penggunas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjangs_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stoks`
--
ALTER TABLE `stoks`
  ADD CONSTRAINT `stoks_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produks` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
