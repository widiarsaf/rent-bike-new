-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 06:07 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rent_bike2`
--

-- --------------------------------------------------------

--
-- Table structure for table `detailpenyewaan`
--

CREATE TABLE `detailpenyewaan` (
  `id_detailPenyewaan` bigint(20) UNSIGNED NOT NULL,
  `nota_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sepeda_id` bigint(20) UNSIGNED DEFAULT NULL,
  `paket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_penyewaan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detailpenyewaan`
--

INSERT INTO `detailpenyewaan` (`id_detailPenyewaan`, `nota_no`, `sepeda_id`, `paket_id`, `tanggal`, `created_at`, `updated_at`, `status_penyewaan`) VALUES
(1, 'GM-147', 5, 1, '2021-06-10', '2021-06-09 08:21:05', '2021-06-09 08:27:35', 1),
(2, 'GM-147', 18, 1, '2021-06-10', '2021-06-09 08:21:05', '2021-06-09 08:27:35', 1),
(3, 'GM-147', 6, 2, '2021-06-10', '2021-06-09 08:21:05', '2021-06-09 08:27:35', 1),
(4, 'GM-147', 19, 2, '2021-06-10', '2021-06-09 08:21:05', '2021-06-09 08:27:35', 1),
(5, 'GM-924', 17, 1, '2021-06-11', '2021-06-09 08:39:48', '2021-06-09 08:39:48', 0),
(6, 'GM-924', 18, 1, '2021-06-11', '2021-06-09 08:39:48', '2021-06-09 08:39:48', 0),
(7, 'GM-924', 19, 1, '2021-06-11', '2021-06-09 08:39:48', '2021-06-09 08:39:48', 0),
(8, 'GM-924', 20, 1, '2021-06-11', '2021-06-09 08:39:48', '2021-06-09 08:39:48', 0),
(9, 'GM-924', 21, 1, '2021-06-11', '2021-06-09 08:39:48', '2021-06-09 08:39:48', 0),
(10, 'GM-173', 18, 1, '2021-06-17', '2021-06-09 08:43:27', '2021-06-09 08:43:27', 0),
(11, 'GM-173', 19, 1, '2021-06-17', '2021-06-09 08:43:27', '2021-06-09 08:43:27', 0),
(12, 'GM-173', 9, 2, '2021-06-17', '2021-06-09 08:43:27', '2021-06-09 08:43:27', 0),
(13, 'GM-170', 4, 2, '2021-06-16', '2021-06-09 08:48:33', '2021-06-09 08:48:33', 0),
(14, 'GM-170', 5, 2, '2021-06-16', '2021-06-09 08:48:33', '2021-06-09 08:48:33', 0),
(15, 'GM-170', 27, 3, '2021-06-16', '2021-06-09 08:48:33', '2021-06-09 08:48:33', 0),
(16, 'GM-170', 28, 3, '2021-06-16', '2021-06-09 08:48:33', '2021-06-09 08:48:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/userDefault.png',
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` bigint(20) UNSIGNED NOT NULL,
  `nama_katalog` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_katalog` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama_katalog`, `deskripsi_katalog`, `created_at`, `updated_at`) VALUES
(3, 'Katalog 1', 'Hampir semua diisi dengan sepeda berkategori MTB', '2021-06-09 07:43:49', '2021-06-09 07:43:49'),
(4, 'Katalog 2', 'Ada bermacam-macam kategori sepeda pada katalog 2', '2021-06-09 07:44:06', '2021-06-09 07:44:06');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(3, 'MTB', '2021-06-09 07:42:51', '2021-06-09 07:42:51'),
(4, 'FIXIE', '2021-06-09 07:42:55', '2021-06-09 07:42:55'),
(5, 'SELI', '2021-06-09 07:43:00', '2021-06-09 07:43:00'),
(6, 'ROAD BIKE', '2021-06-09 07:43:05', '2021-06-09 07:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_05_09_084153_create_kategori_table', 1),
(5, '2021_05_09_084236_create_paket_table', 1),
(6, '2021_05_31_131750_create_katalog_table', 1),
(7, '2021_05_31_131820_create_sepeda_table', 1),
(8, '2021_05_31_132316_create_pesan_table', 1),
(9, '2021_05_31_132513_create_galeri_table', 1),
(10, '2021_05_31_132534_create_penyewaan_table', 1),
(11, '2021_05_31_132621_create_detail_penyewaan_table', 1),
(12, '2021_05_31_132730_create_pembayaran_table', 1),
(13, '2021_06_01_051928_add_column_at_user_table', 1),
(14, '2021_06_03_040043_add_column_to_detail_penyewaan_table', 1),
(15, '2021_06_07_112734_add_columns_galeri', 1);

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` bigint(20) UNSIGNED NOT NULL,
  `nama_paket` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `nama_paket`, `jam`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Paket 1', 1, 10000, '2021-06-08 05:31:58', '2021-06-08 05:35:54'),
(2, 'Paket 2', 3, 20000, '2021-06-08 05:35:47', '2021-06-08 05:35:47'),
(3, 'Paket 3', 5, 30000, '2021-06-08 05:36:05', '2021-06-08 05:36:05'),
(5, 'Paket Sehari', 24, 100000, '2021-06-09 07:42:38', '2021-06-09 07:42:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `nama_pengirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `foto_bukti` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode` tinyint(1) NOT NULL DEFAULT 0,
  `nota_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama_pengirim`, `tanggal_bayar`, `foto_bukti`, `keterangan`, `nominal`, `metode`, `nota_no`, `created_at`, `updated_at`) VALUES
(7, 'Daffa Usman', '2021-06-09', NULL, 'Lunas', '70000', 1, 'GM-147', '2021-06-09 08:28:34', '2021-06-09 08:28:34'),
(8, 'Hanum Aisyah', '2021-06-09', NULL, 'DP', '25000', 1, 'GM-924', '2021-06-09 08:40:42', '2021-06-09 08:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `penyewaan`
--

CREATE TABLE `penyewaan` (
  `id_penyewaan` bigint(20) UNSIGNED NOT NULL,
  `no_nota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pembayaran` int(11) NOT NULL DEFAULT 0,
  `status_pengembalian` int(11) NOT NULL DEFAULT 0,
  `status_jaminan` int(11) NOT NULL DEFAULT 0,
  `total_biaya` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `denda` int(11) NOT NULL,
  `pengguna_id` bigint(20) UNSIGNED DEFAULT NULL,
  `paket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penyewaan`
--

INSERT INTO `penyewaan` (`id_penyewaan`, `no_nota`, `status_pembayaran`, `status_pengembalian`, `status_jaminan`, `total_biaya`, `tanggal`, `jam`, `denda`, `pengguna_id`, `paket_id`, `created_at`, `updated_at`) VALUES
(15, 'GM-147', 2, 1, 1, 60000, '2021-06-10', '09:20:00', 0, 18, NULL, '2021-06-09 08:21:05', '2021-06-09 08:27:47'),
(16, 'GM-924', 1, 0, 0, 50000, '2021-06-11', '14:00:00', 0, 19, NULL, '2021-06-09 08:39:48', '2021-06-09 08:39:54'),
(17, 'GM-173', 0, 0, 0, 40000, '2021-06-17', '10:30:00', 0, 20, NULL, '2021-06-09 08:43:27', '2021-06-09 08:43:27'),
(18, 'GM-170', 0, 0, 0, 100000, '2021-06-16', '10:00:00', 0, 21, NULL, '2021-06-09 08:48:33', '2021-06-09 08:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` bigint(20) UNSIGNED NOT NULL,
  `judul_pesan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/bannerDefault.jpg',
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `judul_pesan`, `foto_pesan`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Promo Akhir Pekan', 'images/bannerDefault.jpg', 'sdsds', '2021-06-09 02:40:41', '2021-06-09 02:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `sepeda`
--

CREATE TABLE `sepeda` (
  `id_sepeda` bigint(20) UNSIGNED NOT NULL,
  `unit_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `katalog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kategori_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto_unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/sepedaDefault.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sepeda`
--

INSERT INTO `sepeda` (`id_sepeda`, `unit_code`, `katalog_id`, `kategori_id`, `deskripsi`, `foto_unit`, `created_at`, `updated_at`) VALUES
(4, 'MTB101', 3, 3, 'ALLOY / 27.5\" / 3X7S', 'images/9QpWBRVE5Ssu7YKdbqzgxIgIF5eRlbRgtlmgqDRO.jpg', '2021-06-09 07:49:39', '2021-06-09 07:49:39'),
(5, 'MTB102', 3, 3, 'STEEL / 27,5\" / 3X7S', 'images/PMsiIg0ePLFATbVf1gZ0jbcEiGom8H9giuyZM7lR.jpg', '2021-06-09 07:54:10', '2021-06-09 07:54:10'),
(6, 'MTB103', 3, 3, 'STEEL / 27,5\" / 3X8S', 'images/7LvnnaBva1tWdL8e5PEG9ShgtkZTYkchehswIXRA.jpg', '2021-06-09 07:56:58', '2021-06-09 07:56:58'),
(7, 'MTB104', 3, 3, 'ALLOY / 27,5\" / 2X8S', 'images/ljsSnUuAzVY3GgmwRDqmHCtLUPIYUyBRBeHAzCsu.jpg', '2021-06-09 07:57:47', '2021-06-09 07:57:47'),
(8, 'MTB105', 3, 3, 'STEEL / 27,5\" / 3X7S', 'images/OXKsd1LeyaBNhe4fk5xnZESmYdorO0RV1QsGfrGa.jpg', '2021-06-09 07:58:23', '2021-06-09 07:58:23'),
(9, 'MTB106', 3, 3, 'ALLOY / 27,5\" / 3X9S', 'images/b9No94kKrFJTuKsIb8fS7KqWyjzAHxbDc0ybxgW4.jpg', '2021-06-09 07:59:19', '2021-06-09 07:59:19'),
(10, 'MTB107', 3, 3, 'STEEL / 27,5\" / 3X8S', 'images/YmHKVighxXJJVHeMUPnp3PNi0HvBx5Jo9bleTdtj.jpg', '2021-06-09 07:59:52', '2021-06-09 07:59:52'),
(11, 'MTB108', 3, 3, 'STEEL / 27,5\" / 3X7S', 'images/yaqMmsiGdxiP27l9RGhbCpcSaZ3Sbu5YKklVHwxl.jpg', '2021-06-09 08:00:33', '2021-06-09 08:00:33'),
(12, 'MTB201', 3, 3, 'STEEL / 26\" / 3X7S', 'images/tFqbfqzIYEnSvTuaFOUnSv0FPFdl13kY7jBDuC1N.jpg', '2021-06-09 08:01:52', '2021-06-09 08:01:52'),
(13, 'MTB202', 3, 3, 'ALLOY / 26\" / 3X7S', 'images/pyNzdRsRIElMkjSsVzHmxvA5KqbFHCohWyAMOTFu.jpg', '2021-06-09 08:02:54', '2021-06-09 08:02:54'),
(14, 'MTB203', 3, 3, 'STEEL / 26\" / 3X5S', 'images/O1OFrjHtmyf0RYSBJ5QLBk3bRYutJ2qUiacEtdXd.jpg', '2021-06-09 08:03:47', '2021-06-09 08:03:47'),
(15, 'MTB204', 3, 3, 'STEEL / 26\" / 3X7S', 'images/lLjse6x4h95YH9GJZ99dCHGLqxwpVNSsTQFm4b9T.jpg', '2021-06-09 08:04:55', '2021-06-09 08:04:55'),
(16, 'MTB205', 4, 3, 'STEEL / 26\" / 3X6S', 'images/CVDhxxFJ3HCIdOBvBJz4NjN6StTFTNBvQ63c69gt.jpg', '2021-06-09 08:06:51', '2021-06-09 08:06:51'),
(17, 'MTB206', 4, 3, 'STEEL / 26\" / 3X7S', 'images/SWYMBp3EujLjpe974HxT7CYKpqiTfDUANW6CfiQd.jpg', '2021-06-09 08:07:48', '2021-06-09 08:07:48'),
(18, 'MTB207', 4, 3, 'STEEL / 26\" / 3X8S', 'images/s0BswWsqggeQJbdEDO5gURhNlWHvLH6BAisQbtGn.jpg', '2021-06-09 08:09:09', '2021-06-09 08:09:09'),
(19, 'MTB301', 4, 3, 'STEEL / 24\" / 3X8S', 'images/7HUFCd6LRiHaTSkicfioZgKwQAxF6LUnC7IqFC48.jpg', '2021-06-09 08:09:50', '2021-06-09 08:09:50'),
(20, 'MTB302', 4, 3, 'STEEL / 24\" / 3X5S', 'images/j390ceET3u6WSwNY4y0RU3Dup3RgiusxRO05PC5J.jpg', '2021-06-09 08:10:56', '2021-06-09 08:10:56'),
(21, 'RBK001', 4, 6, 'STEEL / 28\" / 2X7S', 'images/zHrp2pTzvv2AkXH0NMGMVou1Jgmu4HAh61bpBy5m.jpg', '2021-06-09 08:11:41', '2021-06-09 08:11:41'),
(22, 'SLI001', 4, 5, 'STEEL / 20\" / 1X6S', 'images/4ViKkZLg3R07GjKfoC94YiRqvgdtPBrUq4xbjd25.jpg', '2021-06-09 08:12:18', '2021-06-09 08:12:18'),
(23, 'SLI002', 4, 5, 'STEEL / 20\" / 1X5S', 'images/WPfDiF9eEwpOyKIdiKZw3jmZCkcxyW6XXT6np0jx.jpg', '2021-06-09 08:13:14', '2021-06-09 08:13:14'),
(24, 'SLI003', 4, 5, 'STEEL / 20\" / 1X6S', 'images/DdhZPVdTxcQR2prB9EbdvZ4yZileUMkBkd7XIkH4.jpg', '2021-06-09 08:13:55', '2021-06-09 08:13:55'),
(25, 'FXI001', 4, 4, 'STEEL / TORPEDO', 'images/0LTPnL0zU75jqV9W9fYdXdB0SbWFjeIYTFuDQzIZ.jpg', '2021-06-09 08:14:24', '2021-06-09 08:14:24'),
(27, 'FXI002', 4, 4, 'STEEL / TORPEDO', 'images/mTJDC0FCdLxhMjvrUkWPvCbelukqp3ga80eUaDEU.jpg', '2021-06-09 08:15:05', '2021-06-09 08:15:05'),
(28, 'FXI103', 4, 4, 'STEEL / DOLTRAP', 'images/ew7qmhHsiaN4GAOi6zBIMlTROxjbQDWTraytlzkV.jpg', '2021-06-09 08:15:37', '2021-06-09 08:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_pengguna` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_profil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'images/userDefault.png',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_pengguna`, `username`, `email`, `no_telp`, `password`, `foto_profil`, `is_admin`, `remember_token`, `created_at`, `updated_at`, `nama`) VALUES
(16, 'admin1', 'admin1@gmail.com', '', '$2y$10$N9Qh63D65OowLJUsJWffmuGDbtR233Iwbej5Az4.VKuiMv20pSawG', 'images/userDefault.png', 1, NULL, NULL, NULL, 'Yusuf Pandhu Wijaya'),
(17, 'admin2', 'admin2@gmail.com', '+62 812-3323-57', '$2y$10$imQ419Kz0Cg8doro77eTNectynbnLruq1miO7nbpC86tcbCAI8qWG', 'images/userDefault.png', 1, NULL, NULL, NULL, 'Tunas Timur'),
(18, 'daffausman', 'customer1@gmail.com', '0897463528211', '$2y$10$U.w/oLFd7AGdxFFE31Oo9.gUHKftQ6ErPWEBci.g5TYfyiFsB8T8m', 'images/userDefault.png', 0, NULL, NULL, NULL, 'Daffa Usman'),
(19, 'hanumaisyah', 'customer2@gmail.com', '0897463528211', '$2y$10$/9AAKloSjFunspW82fGknOrHk7LTPJzHNP6Vj/Mf9nYLzmsKcS2IG', 'images/userDefault.png', 0, NULL, NULL, NULL, 'Hanum Aisyahqilla A.'),
(20, 'widiareta', 'customer3@gmail.com', '0897463528211', '$2y$10$9BuEQLbV8ymszCGm55q0u.1id/eYlQGIhufGiMveqnoMxEYt4UHo2', 'images/userDefault.png', 0, NULL, NULL, NULL, 'Widiareta Safitri'),
(21, 'meliska', 'customer4@gmail.com', '0897463528211', '$2y$10$v.ewKvlMG5.K0N03jB1b2eGPI7/1LhDDjeiCe8cEdjhgXPJYpJ07O', 'images/userDefault.png', 0, NULL, NULL, NULL, 'Meliska Yava Ivana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detailpenyewaan`
--
ALTER TABLE `detailpenyewaan`
  ADD PRIMARY KEY (`id_detailPenyewaan`),
  ADD KEY `detailpenyewaan_nota_no_foreign` (`nota_no`),
  ADD KEY `detailpenyewaan_sepeda_id_foreign` (`sepeda_id`),
  ADD KEY `detailpenyewaan_paket_id_foreign` (`paket_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran_nota_no_foreign` (`nota_no`);

--
-- Indexes for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD PRIMARY KEY (`id_penyewaan`),
  ADD KEY `penyewaan_pengguna_id_foreign` (`pengguna_id`),
  ADD KEY `penyewaan_paket_id_foreign` (`paket_id`),
  ADD KEY `penyewaan_no_nota_index` (`no_nota`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `sepeda`
--
ALTER TABLE `sepeda`
  ADD PRIMARY KEY (`id_sepeda`),
  ADD UNIQUE KEY `sepeda_unit_code_unique` (`unit_code`),
  ADD KEY `sepeda_kategori_id_foreign` (`kategori_id`),
  ADD KEY `sepeda_katalog_id_foreign` (`katalog_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detailpenyewaan`
--
ALTER TABLE `detailpenyewaan`
  MODIFY `id_detailPenyewaan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penyewaan`
--
ALTER TABLE `penyewaan`
  MODIFY `id_penyewaan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sepeda`
--
ALTER TABLE `sepeda`
  MODIFY `id_sepeda` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_pengguna` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detailpenyewaan`
--
ALTER TABLE `detailpenyewaan`
  ADD CONSTRAINT `detailpenyewaan_nota_no_foreign` FOREIGN KEY (`nota_no`) REFERENCES `penyewaan` (`no_nota`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `detailpenyewaan_paket_id_foreign` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id_paket`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `detailpenyewaan_sepeda_id_foreign` FOREIGN KEY (`sepeda_id`) REFERENCES `sepeda` (`id_sepeda`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_nota_no_foreign` FOREIGN KEY (`nota_no`) REFERENCES `penyewaan` (`no_nota`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `penyewaan`
--
ALTER TABLE `penyewaan`
  ADD CONSTRAINT `penyewaan_paket_id_foreign` FOREIGN KEY (`paket_id`) REFERENCES `paket` (`id_paket`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `penyewaan_pengguna_id_foreign` FOREIGN KEY (`pengguna_id`) REFERENCES `users` (`id_pengguna`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `sepeda`
--
ALTER TABLE `sepeda`
  ADD CONSTRAINT `sepeda_katalog_id_foreign` FOREIGN KEY (`katalog_id`) REFERENCES `katalog` (`id_katalog`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sepeda_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
