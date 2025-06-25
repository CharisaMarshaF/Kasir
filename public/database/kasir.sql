-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2025 at 12:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_pembelian` int UNSIGNED NOT NULL,
  `id_pembelian` int NOT NULL,
  `id_produk` int NOT NULL,
  `harga_beli` int NOT NULL,
  `jumlah` int NOT NULL,
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`id_detail_pembelian`, `id_pembelian`, `id_produk`, `harga_beli`, `jumlah`, `subtotal`, `created_at`, `updated_at`) VALUES
(7, 7, 10, 900, 1, 900, '2025-01-19 08:38:34', '2025-01-19 08:38:34'),
(11, 10, 7, 6000, 9, 54000, '2025-01-19 08:45:13', '2025-01-19 08:45:27'),
(12, 11, 7, 6000, 1, 6000, '2025-01-19 09:33:07', '2025-01-19 09:33:07'),
(13, 11, 10, 900, 1, 900, '2025-01-19 09:33:09', '2025-01-19 09:33:09'),
(14, 11, 8, 6000, 1, 6000, '2025-01-19 09:33:34', '2025-01-19 09:33:34'),
(15, 12, 10, 900, 1, 900, '2025-01-19 09:34:04', '2025-01-19 09:34:04'),
(16, 12, 7, 6000, 1, 6000, '2025-01-19 09:34:19', '2025-01-19 09:34:19'),
(17, 13, 10, 900, 6, 5400, '2025-01-19 18:36:14', '2025-01-19 18:44:44'),
(18, 14, 7, 6000, 1, 6000, '2025-01-19 18:56:01', '2025-01-19 18:56:01'),
(19, 15, 10, 900, 1, 900, '2025-01-19 18:56:42', '2025-01-19 18:56:42'),
(20, 16, 8, 6000, 1, 6000, '2025-01-19 18:57:05', '2025-01-19 18:57:05'),
(21, 16, 10, 900, 1, 900, '2025-01-19 18:57:06', '2025-01-19 18:57:06'),
(22, 17, 8, 6000, 2, 12000, '2025-01-19 18:57:23', '2025-01-19 18:57:35'),
(23, 17, 10, 900, 5, 4500, '2025-01-19 18:57:26', '2025-01-19 18:58:17'),
(24, 18, 8, 6000, 8, 48000, '2025-01-19 20:29:02', '2025-01-19 20:32:19'),
(25, 18, 10, 900, 9, 8100, '2025-01-19 20:29:06', '2025-01-19 20:32:11'),
(26, 20, 11, 13500, 13, 175500, '2025-01-19 20:34:55', '2025-01-19 20:35:02'),
(27, 21, 10, 900, 9, 8100, '2025-01-20 00:21:01', '2025-01-20 00:21:23'),
(28, 22, 8, 6000, 9, 54000, '2025-01-20 05:24:51', '2025-01-20 05:25:05'),
(29, 22, 7, 6000, 3, 18000, '2025-01-20 05:24:55', '2025-01-20 05:24:59'),
(30, 23, 8, 6000, 1, 6000, '2025-01-24 20:25:17', '2025-01-24 20:25:17'),
(31, 23, 10, 900, 1, 900, '2025-01-24 20:25:23', '2025-01-24 20:25:23'),
(32, 24, 15, 3000, 18, 54000, '2025-01-24 20:27:56', '2025-01-24 20:28:03'),
(33, 25, 8, 6000, 1, 6000, '2025-01-25 21:52:08', '2025-01-25 21:52:08'),
(34, 25, 8, 6000, 1, 6000, '2025-01-25 21:53:07', '2025-01-25 21:53:07'),
(35, 26, 10, 900, 9, 8100, '2025-02-02 19:27:35', '2025-02-02 19:27:39');

-- --------------------------------------------------------

--
-- Table structure for table `detail_sale`
--

CREATE TABLE `detail_sale` (
  `id_detail_sale` int UNSIGNED NOT NULL,
  `id_sale` int NOT NULL,
  `id_produk` int NOT NULL,
  `harga_jual` int NOT NULL,
  `jumlah` int NOT NULL,
  `diskon` tinyint NOT NULL DEFAULT '0',
  `subtotal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_sale`
--

INSERT INTO `detail_sale` (`id_detail_sale`, `id_sale`, `id_produk`, `harga_jual`, `jumlah`, `diskon`, `subtotal`, `created_at`, `updated_at`) VALUES
(3, 14, 8, 7000, 1, 10, 6300, '2025-01-25 06:29:25', '2025-01-25 06:29:25'),
(4, 15, 10, 9000, 1, 5, 8100, '2025-01-25 06:40:37', '2025-01-25 06:40:48'),
(5, 22, 8, 7000, 1, 5, 6300, '2025-01-25 06:45:00', '2025-01-25 06:45:12'),
(6, 31, 8, 7000, 10, 0, 63000, '2025-01-26 18:55:11', '2025-01-26 18:55:55'),
(7, 31, 10, 9000, 10, 0, 81000, '2025-01-26 18:55:14', '2025-01-26 18:55:55'),
(8, 31, 7, 10000, 60, 0, 540000, '2025-01-26 18:55:18', '2025-01-26 18:55:55'),
(9, 31, 11, 15000, 1, 0, 15000, '2025-01-26 18:55:20', '2025-01-26 18:55:20'),
(10, 33, 8, 7000, 10, 10, 63000, '2025-02-02 19:21:25', '2025-02-02 19:21:31'),
(11, 34, 8, 7000, 2, 0, 12600, '2025-02-23 06:12:24', '2025-02-23 06:21:40'),
(12, 34, 10, 9000, 1, 0, 8100, '2025-02-23 06:12:54', '2025-02-23 06:21:40'),
(13, 34, 11, 15000, 1, 0, 15000, '2025-02-23 06:21:21', '2025-02-23 06:21:21'),
(14, 38, 8, 7000, 1, 0, 6300, '2025-02-23 18:45:51', '2025-02-23 18:46:04'),
(15, 40, 11, 15000, 1, 0, 15000, '2025-02-23 18:47:21', '2025-02-23 18:47:21'),
(16, 41, 10, 9000, 1, 10, 8100, '2025-02-23 18:47:37', '2025-02-23 18:47:37'),
(17, 43, 8, 7000, 2, 0, 12600, '2025-03-02 21:09:49', '2025-03-02 21:10:28'),
(18, 43, 10, 9000, 3, 0, 24300, '2025-03-02 21:09:51', '2025-03-02 21:10:28'),
(19, 43, 11, 15000, 1, 0, 15000, '2025-03-02 21:10:00', '2025-03-02 21:10:00'),
(20, 44, 8, 7000, 1, 10, 6300, '2025-03-02 21:32:09', '2025-03-02 21:32:09'),
(21, 46, 8, 7000, 1, 5, 6300, '2025-06-11 20:56:13', '2025-06-11 20:56:45'),
(22, 46, 10, 9000, 1, 5, 8100, '2025-06-11 20:56:17', '2025-06-11 20:56:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(21, 'makanan', '2025-01-18 06:14:51', '2025-01-18 06:14:51'),
(22, 'minuman', '2025-01-18 06:14:59', '2025-01-18 06:14:59');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int UNSIGNED NOT NULL,
  `kode_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `kode_member`, `nama`, `telepon`, `created_at`, `updated_at`) VALUES
(1, '00001', 'rara', '12232444', '2025-01-18 20:53:54', '2025-01-18 21:12:27'),
(4, '00002', 'saya', '09880', '2025-01-18 21:40:11', '2025-01-18 21:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_13_151211_tambah_kolom_baru_to_users_table', 1),
(6, '2025_01_13_151919_buat_kategori_table', 2),
(7, '2025_01_13_152417_buat_produk_table', 2),
(8, '2025_01_13_153124_buat_member_table', 2),
(9, '2025_01_15_125005_create_supplier_table', 2),
(10, '2025_01_15_125243_create_setting_table', 2),
(11, '2025_01_15_130711_create_pembelian_table', 2),
(12, '2025_01_15_130722_create_detail_pembelian_table', 2),
(13, '2025_01_15_131109_create_detail_sale_table', 2),
(14, '2025_01_15_131116_create_sale_table', 3),
(15, '2025_01_15_131355_create_pengeluaran_table', 3),
(18, '2014_10_12_200000_add_two_factor_columns_to_users_table', 4),
(19, '2020_05_21_100000_create_teams_table', 4),
(20, '2020_05_21_200000_create_team_user_table', 4),
(21, '2020_05_21_300000_create_team_invitations_table', 4),
(22, '2025_01_15_154059_create_sessions_table', 4),
(23, '2025_01_16_134235_update_users_table', 5),
(24, '2025_01_16_134558_update_users_table', 6),
(25, '2025_01_17_163630_tambah_foreign_key_to_produk_table', 7),
(26, '2025_01_18_141859_tambah_kode_produk_to_produk_table', 8),
(27, '2025_01_19_162546_tambah_diskon_to_setting_table', 9),
(28, '2025_01_20_125932_edit_id_member_to_penjualan_table', 10),
(29, '2025_01_21_073907_create_detail_sale_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int UNSIGNED NOT NULL,
  `id_supplier` int NOT NULL,
  `total_item` int NOT NULL,
  `total_harga` int NOT NULL,
  `diskon` tinyint NOT NULL DEFAULT '0',
  `bayar` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_supplier`, `total_item`, `total_harga`, `diskon`, `bayar`, `created_at`, `updated_at`) VALUES
(10, 2, 9, 54000, 0, 54000, '2025-01-19 08:45:09', '2025-01-19 08:45:31'),
(11, 2, 3, 12900, 0, 12900, '2025-01-19 09:32:58', '2025-01-19 09:33:36'),
(12, 2, 2, 6900, 5, 6555, '2025-01-19 09:33:59', '2025-01-19 09:34:21'),
(13, 4, 6, 5400, 50, 2700, '2025-01-19 18:36:09', '2025-01-19 18:44:57'),
(14, 4, 1, 6000, 0, 6000, '2025-01-19 18:55:57', '2025-01-19 18:56:04'),
(15, 2, 1, 900, 0, 900, '2025-01-19 18:56:19', '2025-01-19 18:56:48'),
(16, 4, 2, 6900, 0, 6900, '2025-01-19 18:56:59', '2025-01-19 18:57:12'),
(17, 4, 0, 0, 0, 0, '2025-01-19 18:57:20', '2025-01-19 18:57:20'),
(18, 4, 0, 0, 0, 0, '2025-01-19 20:28:56', '2025-01-19 20:28:56'),
(19, 2, 0, 0, 0, 0, '2025-01-19 20:34:44', '2025-01-19 20:34:44'),
(20, 5, 13, 175500, 50, 87750, '2025-01-19 20:34:49', '2025-01-19 20:35:16'),
(21, 4, 9, 8100, 3, 7857, '2025-01-20 00:20:55', '2025-01-20 00:21:34'),
(22, 2, 12, 72000, 12, 63360, '2025-01-20 05:24:47', '2025-01-20 05:25:19'),
(23, 4, 0, 0, 0, 0, '2025-01-24 20:25:12', '2025-01-24 20:25:12'),
(24, 6, 18, 54000, 45, 29700, '2025-01-24 20:27:50', '2025-01-24 20:28:18'),
(25, 4, 0, 0, 0, 0, '2025-01-25 21:51:56', '2025-01-25 21:51:56'),
(26, 6, 9, 8100, 0, 8100, '2025-02-02 19:27:30', '2025-02-02 19:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `deskripsi`, `nominal`, `created_at`, `updated_at`) VALUES
(2, 'ayam bakaer mbk siti', 50000, '2025-01-19 01:40:46', '2025-01-19 01:42:59'),
(3, 'as', 233, '2025-01-25 20:34:40', '2025-01-25 20:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int UNSIGNED NOT NULL,
  `id_kategori` int UNSIGNED NOT NULL,
  `kode_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_beli` int NOT NULL,
  `diskon` tinyint NOT NULL DEFAULT '0',
  `harga_jual` int NOT NULL,
  `stok` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `kode_produk`, `nama_produk`, `merk`, `harga_beli`, `diskon`, `harga_jual`, `stok`, `created_at`, `updated_at`) VALUES
(8, 22, 'P000008', 'aqua', 'hosino', 6000, 10, 7000, 1, '2025-01-18 08:36:58', '2025-06-11 20:56:45'),
(10, 22, 'P000009', 'ayammm GORENG', 'merel', 900, 10, 9000, 27, '2025-01-18 08:37:37', '2025-06-11 20:56:45'),
(11, 22, 'P000011', 'milktea', NULL, 13500, 0, 15000, 29, '2025-01-19 20:34:13', '2025-03-02 21:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `id_sale` int UNSIGNED NOT NULL,
  `id_member` int DEFAULT NULL,
  `total_item` int NOT NULL,
  `total_harga` int NOT NULL,
  `diskon` tinyint NOT NULL DEFAULT '0',
  `bayar` int NOT NULL DEFAULT '0',
  `diterima` int NOT NULL DEFAULT '0',
  `id_user` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`id_sale`, `id_member`, `total_item`, `total_harga`, `diskon`, `bayar`, `diterima`, `id_user`, `created_at`, `updated_at`) VALUES
(15, 4, 1, 8100, 5, 7695, 8000, 3, '2025-01-25 06:40:33', '2025-01-25 06:40:48'),
(16, NULL, 0, 0, 0, 0, 0, 3, '2025-01-25 06:41:04', '2025-01-25 06:41:04'),
(17, NULL, 0, 0, 0, 0, 0, 3, '2025-01-25 06:41:04', '2025-01-25 06:41:04'),
(18, NULL, 0, 0, 0, 0, 0, 3, '2025-01-25 06:41:23', '2025-01-25 06:41:23'),
(19, NULL, 0, 0, 0, 0, 0, 3, '2025-01-25 06:43:20', '2025-01-25 06:43:20'),
(22, 1, 1, 6300, 5, 5985, 10000, 3, '2025-01-25 06:44:57', '2025-01-25 06:45:12'),
(23, NULL, 0, 0, 0, 0, 0, 3, '2025-01-25 07:20:57', '2025-01-25 07:20:57'),
(24, NULL, 0, 0, 0, 0, 0, 3, '2025-01-25 07:21:56', '2025-01-25 07:21:56'),
(25, NULL, 0, 0, 0, 0, 0, 3, '2025-01-25 07:23:28', '2025-01-25 07:23:28'),
(31, NULL, 81, 699000, 0, 699000, 1000000, 3, '2025-01-26 18:50:09', '2025-01-26 18:55:55'),
(32, NULL, 0, 0, 0, 0, 0, 3, '2025-01-26 18:56:21', '2025-01-26 18:56:21'),
(33, NULL, 0, 0, 0, 0, 0, 3, '2025-02-02 19:21:20', '2025-02-02 19:21:20'),
(34, NULL, 4, 35700, 0, 35700, 40000, 3, '2025-02-23 05:58:03', '2025-02-23 06:21:40'),
(35, NULL, 0, 0, 0, 0, 0, 3, '2025-02-23 06:48:26', '2025-02-23 06:48:26'),
(36, NULL, 0, 0, 0, 0, 0, 3, '2025-02-23 06:48:34', '2025-02-23 06:48:34'),
(37, NULL, 0, 0, 0, 0, 0, 3, '2025-02-23 18:45:34', '2025-02-23 18:45:34'),
(38, NULL, 1, 6300, 0, 6300, 10000, 3, '2025-02-23 18:45:46', '2025-02-23 18:46:04'),
(39, NULL, 0, 0, 0, 0, 0, 3, '2025-02-23 18:46:55', '2025-02-23 18:46:55'),
(40, NULL, 0, 0, 0, 0, 0, 3, '2025-02-23 18:47:04', '2025-02-23 18:47:04'),
(41, NULL, 0, 0, 0, 0, 0, 3, '2025-02-23 18:47:31', '2025-02-23 18:47:31'),
(42, NULL, 0, 0, 0, 0, 0, 3, '2025-02-24 01:13:46', '2025-02-24 01:13:46'),
(43, NULL, 6, 51900, 0, 51900, 52000, 3, '2025-03-02 21:09:44', '2025-03-02 21:10:28'),
(44, NULL, 0, 0, 0, 0, 0, 3, '2025-03-02 21:31:59', '2025-03-02 21:31:59'),
(45, NULL, 0, 0, 0, 0, 0, 3, '2025-06-11 20:56:07', '2025-06-11 20:56:07'),
(46, 1, 2, 14400, 5, 13680, 15000, 3, '2025-06-11 20:56:07', '2025-06-11 20:56:45'),
(47, NULL, 0, 0, 0, 0, 0, 8, '2025-06-11 23:23:56', '2025-06-11 23:23:56'),
(48, NULL, 0, 0, 0, 0, 0, 8, '2025-06-11 23:23:59', '2025-06-11 23:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('22hHxyoFhjRhjRf8JW8hu4tiGnRFd74j7aM2KHEZ', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoickVSNVdSTUJZMHR5OERrdWtxVFdNMGdxRzhQcmUxamY5VlVQMFFvZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1749711148),
('BLsJjVpMVTVXN514ogxupftI3Ok3cInPwtyx1Qq8', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYjRCYlU4RVJ0QVVWY3NYYjJhT3JKbG9xaWhrNWYzQU5RbnFNd3VFMCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1750855470);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int UNSIGNED NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_nota` tinyint NOT NULL,
  `diskon` smallint NOT NULL DEFAULT '0',
  `path_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_kartu_member` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_perusahaan`, `alamat`, `telepon`, `tipe_nota`, `diskon`, `path_logo`, `path_kartu_member`, `created_at`, `updated_at`) VALUES
(1, 'Toko Charisasa marsha faradilla', 'Duwetan Ngunut Jumantono', '081391861862', 1, 5, '/img/logo-20250127042556.png', '/img/logo-2025-01-26150427.png', NULL, '2025-01-26 21:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(2, 'sasaaaaaaaa', 'duwetan', '088656', '2025-01-19 00:38:48', '2025-01-19 00:39:34'),
(4, 'desi purwanti', 'karangpandan', '083897237', '2025-01-19 18:00:48', '2025-01-19 18:00:58'),
(5, 'tiara', 'kayangan', '088232332636', '2025-01-19 20:32:41', '2025-01-19 20:32:41'),
(6, 'thohiiii', 'plosorejo', '083726437', '2025-01-24 20:26:41', '2025-01-24 20:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint UNSIGNED NOT NULL,
  `team_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`, `foto`, `level`) VALUES
(3, 'adminsa', 'admin1@gmail.com', '$2y$10$4XkVay9I3iF2V2sUDIO4Du7uBcz5tJ0pp5Dft7M9cF0BcafTHj3ym', NULL, NULL, NULL, NULL, '2025-01-16 07:18:44', '2025-01-26 09:11:53', '/img/logo-20250126161153.jpg', 'admin'),
(6, 'dsd', 'dsa@gmail.com', '$2y$10$WsAqFpUD4mVdJnUP0qaM0ONwsGxAcBiu140DpeqnY6gECT4kGWnL2', NULL, NULL, NULL, NULL, '2025-01-26 07:11:59', '2025-01-26 07:11:59', '/img/user.jpg', 'kasir'),
(7, 'sasa', 'sasa@gmail.com', '$2y$10$MZu/nM5Pkah0c.RTx.Sw/.02CZdSJ25ku.TvyfDRzV2J/MX8Lk2Py', NULL, NULL, NULL, NULL, '2025-01-26 19:40:46', '2025-01-26 20:18:28', '/img/logo-20250127031828.jpg', 'kasir'),
(8, 'kasir', 'kasir@gmail.com', '$2y$10$.lwQkIMDfg8f2Bq.SwfkNOVwV4cZq6J2PmkZU0U7xL6tFQo10OhbC', NULL, NULL, NULL, NULL, '2025-06-11 23:23:31', '2025-06-11 23:23:31', '/img/user.jpg', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_pembelian`);

--
-- Indexes for table `detail_sale`
--
ALTER TABLE `detail_sale`
  ADD PRIMARY KEY (`id_detail_sale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `kategori_nama_kategori_unique` (`nama_kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`),
  ADD UNIQUE KEY `member_kode_member_unique` (`kode_member`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `produk_nama_produk_unique` (`nama_produk`),
  ADD UNIQUE KEY `produk_kode_produk_unique` (`kode_produk`),
  ADD KEY `produk_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`id_sale`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_pembelian` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `detail_sale`
--
ALTER TABLE `detail_sale`
  MODIFY `id_detail_sale` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `id_sale` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id_setting` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
