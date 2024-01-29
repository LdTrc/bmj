-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 29 Jan 2024 pada 12.36
-- Versi server: 10.6.16-MariaDB-cll-lve
-- Versi PHP: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pont5516_bmj`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datasupp`
--

CREATE TABLE `datasupp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namasupp` varchar(30) NOT NULL,
  `notelp` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(20) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `pengiriman` double(8,2) NOT NULL,
  `diskon` double(8,2) NOT NULL,
  `garansi` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `Class` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `datasupp`
--

INSERT INTO `datasupp` (`id`, `namasupp`, `notelp`, `alamat`, `kota`, `lokasi`, `pengiriman`, `diskon`, `garansi`, `created_at`, `updated_at`, `Class`) VALUES
(1, 'Mandiri', '083879796073', 'Jl. Kebumen', 'Jawa', '0', 1.00, 0.50, 0.50, '2024-01-19 22:06:45', '2024-01-26 01:29:22', 0),
(2, 'Bu Aji', '081390432068', 'Jl. Sukoharjo', 'Jawa', '0', 1.00, 0.50, 1.00, '2024-01-20 01:04:35', '2024-01-25 07:55:45', 0),
(3, 'Pak Jahari', '082154246085', 'Jl. Alianyang', 'Singkawang', '0.5', 1.00, 0.50, 0.50, '2024-01-20 01:10:42', '2024-01-25 08:09:55', 1),
(4, 'Gemilang Tani', '082167356321', 'Jl. Gajah Mada 1', 'Pontianak', '1', 1.00, 1.00, 1.00, '2024-01-20 01:11:20', '2024-01-26 01:30:06', 1),
(5, 'Tk. Sinar Rezeki', '082164683512', 'Jl. Sekadau', 'Pontianak', '1', 0.00, 1.00, 0.50, '2024-01-20 01:11:46', '2024-01-25 08:08:10', 1),
(6, 'Pt. Limekt Paper', '082145677466', 'Jl. Tanjung Pura', 'Pontianak', '1', 0.00, 1.00, 1.00, '2024-01-20 01:11:47', '2024-01-25 08:06:53', 0),
(7, 'Pak Ker', '082134456484', 'Jl. Padang Pasir', 'Singkawang', '0.5', 0.00, 1.00, 1.00, '2024-01-20 01:13:25', '2024-01-25 08:06:07', 1),
(8, 'Pak Ahau', '082233473787', 'Jl. Trenggalek', 'Jawa', '0', 0.50, 0.50, 0.50, '2024-01-20 01:14:11', '2024-01-25 07:57:13', 0),
(9, 'Punki', '081332805753', 'Jl. Karanganyar', 'Jawa', '0', 0.00, 0.50, 0.50, '2024-01-20 01:14:30', '2024-01-25 07:57:02', 1),
(10, 'CV. Cahaya Makmur', '082144752182', 'Jl. Gajah Mada 1', 'Pontianak', '1', 0.50, 1.00, 0.50, '2024-01-20 01:14:53', '2024-01-25 08:09:38', 1),
(11, 'Pak Goni', '087839553518', 'Jl. Klaten', 'Jawa', '0', 0.50, 1.00, 1.00, '2024-01-20 01:15:11', '2024-01-25 07:56:56', 1),
(12, 'Pak Rudi', '082186642148', 'Jl. Lintas Melawi', 'Sintang', '0.5', 0.50, 0.50, 1.00, '2024-01-20 01:15:31', '2024-01-25 08:03:55', 1),
(13, 'Pak Usman', '082152979986', 'Jl. Beringin', 'Sintang', '0.5', 1.00, 1.00, 1.00, '2024-01-20 01:15:48', '2024-01-26 01:20:27', 1),
(14, 'CV. Sinar Jaya', '081251892259', 'Jl. Teuku Umar', 'Pontianak', '1', 0.50, 0.50, 1.00, '2024-01-20 01:16:05', '2024-01-25 07:58:59', 0),
(23, 'Pd. Cipta Sari', '(0561) 721038', 'Jl. Adisucipto', 'Pontianak', '1', 1.00, 1.00, 1.00, '2024-01-26 01:17:37', '2024-01-26 01:17:37', 0),
(24, 'CV. Caping Aneka', '(0561) 36633', 'Jl. Imam Bonjol', 'Pontianak', '1', 0.50, 1.00, 1.00, '2024-01-26 01:18:37', '2024-01-26 01:18:37', 0),
(25, 'Karya Semesta', '085388998883', 'Jl. Abdul Rahman Saleh', 'Pontianak', '1', 1.00, 1.00, 1.00, '2024-01-26 01:19:28', '2024-01-26 01:19:28', 0),
(26, 'Mandiri Rotan', '082174863045', 'Jl. Tanjung Pura', 'Pontianak', '1', 0.00, 0.50, 1.00, '2024-01-26 01:21:51', '2024-01-26 01:21:51', 0),
(27, 'Anyaman Sahabat', '082154963116', 'Jl. Ampera', 'Pontianak', '1', 0.00, 1.00, 1.00, '2024-01-26 01:23:23', '2024-01-26 01:23:23', 0),
(28, 'Indah Citra', '081935003116', 'Jl. Perdamaian', 'Pontianak', '1', 0.00, 1.00, 1.00, '2024-01-26 01:25:47', '2024-01-26 01:25:47', 0),
(29, 'Bali Miho', '081251944259', 'Jl. Ahmad Yani', 'Pontianak', '1', 0.00, 1.00, 1.00, '2024-01-26 01:26:41', '2024-01-26 01:26:41', 0),
(30, 'Karya Iduk', '081288324657', 'Jl. Gajah Mada', 'Pontianak', '1', 0.00, 1.00, 1.00, '2024-01-26 01:32:15', '2024-01-26 01:32:15', 0),
(31, 'Tanah Liat Selalu', '081265494488', 'Jl. Gajah Mada', 'Pontianak', '1', 0.00, 1.00, 1.00, '2024-01-26 01:33:55', '2024-01-26 01:33:55', 0),
(32, 'Tampayan Adat', '081251534226', 'Jl. Gajah Mada', 'Pontianak', '1', 0.00, 1.00, 1.00, '2024-01-26 01:34:40', '2024-01-26 01:34:40', 0),
(33, 'Makmur Mandiri', '081218030184', 'Jl. Tanjung Pura', 'Pontianak', '1', 0.00, 1.00, 1.00, '2024-01-26 01:36:14', '2024-01-26 01:36:14', 0),
(34, 'Pt. Cendana', '0895324175242', 'Jl. Letjend', 'Pontianak', '1', 0.50, 1.00, 1.00, '2024-01-26 01:39:04', '2024-01-26 01:39:04', 0),
(35, 'jaya 88', '082156583450', 'Jl. Gajah Mada', 'Pontianak', '1', 1.00, 1.00, 1.00, '2024-01-26 02:30:11', '2024-01-26 02:30:11', 0);

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
-- Struktur dari tabel `inventory`
--

CREATE TABLE `inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `inventory`
--

INSERT INTO `inventory` (`id`, `quantity`, `sell_price`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 10000, 1, '2024-01-21 01:12:45', '2024-01-25 16:42:34'),
(2, 7, 13000, 2, '2024-01-21 01:24:03', '2024-01-25 10:22:12'),
(3, 8, 13000, 5, '2024-01-22 07:27:17', '2024-01-25 10:18:54'),
(4, 13, 14000, 6, '2024-01-22 07:27:32', '2024-01-25 10:20:26'),
(5, 4, 20000, 10, '2024-01-22 07:29:49', '2024-01-25 10:16:21'),
(6, 8, 15000, 13, '2024-01-25 02:28:26', '2024-01-25 02:29:23'),
(7, 12, 11000, 21, '2024-01-25 02:35:23', '2024-01-25 10:16:42'),
(8, 2337, 12000, 22, '2024-01-25 02:42:27', '2024-01-25 10:17:07'),
(9, 2, 14000, 19, '2024-01-25 02:46:48', '2024-01-25 10:17:21'),
(10, 3, 2200, 16, '2024-01-25 02:47:57', '2024-01-25 10:18:21'),
(11, 33, 333, 14, '2024-01-25 02:59:32', '2024-01-25 02:59:32');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_21_082247_create_supplier_table', 1),
(6, '2023_10_21_082304_create_product_table', 1),
(7, '2024_01_14_071206_create_inventory_table', 1),
(8, '2024_01_14_071538_create_warranty_table', 1),
(9, '2024_01_15_115252_create_units_table', 1),
(10, '2024_01_16_134255_create_category_table', 1),
(11, '2024_01_16_134352_update_product_table', 1),
(12, '2024_01_19_142731_create_datasupp_table', 1),
(13, '2024_01_20_081833_update_datasupp_table', 1);

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
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplierid` bigint(20) UNSIGNED NOT NULL,
  `satuanid` bigint(20) UNSIGNED NOT NULL,
  `namabarang` varchar(30) NOT NULL,
  `discount` int(11) NOT NULL,
  `kualitas` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `supplierid`, `satuanid`, `namabarang`, `discount`, `kualitas`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'tempat tisu', 12, 5, 20000, '2024-01-21 01:06:56', '2024-01-24 08:54:19'),
(2, 10, 1, 'parcel', 10, 2, 10, '2024-01-21 01:23:45', '2024-01-21 01:23:45'),
(3, 7, 1, 'parcel', 10, 3, 11000, '2024-01-21 01:26:48', '2024-01-24 08:43:55'),
(4, 10, 1, 'parcel', 10, 2, 11000, '2024-01-22 03:24:44', '2024-01-24 08:43:46'),
(5, 13, 1, 'parcel', 10, 2, 13000, '2024-01-22 03:24:50', '2024-01-24 08:43:41'),
(6, 6, 1, 'parcel', 10, 2, 20000, '2024-01-22 03:24:57', '2024-01-24 08:43:31'),
(10, 1, 1, 'parcel', 2, 4, 10000, '2024-01-22 03:25:58', '2024-01-24 08:43:19'),
(12, 1, 1, 'talenan', 2, 4, 38000, '2024-01-24 08:55:40', '2024-01-24 08:55:48'),
(13, 3, 1, 'talenan', 1, 3, 45000, '2024-01-24 08:56:14', '2024-01-24 08:56:25'),
(14, 11, 1, 'talenan', 3, 4, 49000, '2024-01-24 08:56:45', '2024-01-24 08:56:45'),
(15, 11, 1, 'piring bambu', 5, 4, 19900, '2024-01-24 08:57:14', '2024-01-24 08:57:14'),
(16, 6, 1, 'piring bambu', 3, 3, 15900, '2024-01-24 08:57:27', '2024-01-24 08:57:27'),
(17, 13, 1, 'piring bambu', 2, 2, 17900, '2024-01-24 08:57:41', '2024-01-24 08:57:41'),
(18, 8, 1, 'Bakul nasi', 4, 1, 65000, '2024-01-24 08:58:30', '2024-01-24 08:58:30'),
(19, 6, 1, 'Bakul nasi', 5, 3, 69000, '2024-01-24 08:58:53', '2024-01-24 08:58:53'),
(21, 8, 1, 'topi', 1, 3, 15000, '2024-01-25 02:10:57', '2024-01-25 10:17:42'),
(22, 14, 1, 'topi', 3, 5, 13000, '2024-01-25 02:11:17', '2024-01-25 10:17:36'),
(26, 10, 1, 'Tampah', 1, 3, 19000, '2024-01-26 01:40:31', '2024-01-26 01:40:31'),
(27, 33, 1, 'koi putih 14 cm', 2, 3, 125000, '2024-01-26 01:52:31', '2024-01-26 01:52:31'),
(28, 33, 1, 'koi putih 16 cm', 2, 3, 210000, '2024-01-26 01:53:01', '2024-01-26 01:53:01'),
(29, 14, 1, 'capit api hk', 1, 3, 130000, '2024-01-26 01:53:45', '2024-01-26 01:53:45'),
(30, 25, 1, 'laken kecil', 2, 3, 20000, '2024-01-26 01:54:46', '2024-01-26 01:54:46'),
(31, 8, 1, 'tangki biru besar', 2, 2, 120000, '2024-01-26 01:55:39', '2024-01-26 01:55:39'),
(32, 7, 1, 'karung Jne besar', 2, 3, 1300, '2024-01-26 01:57:07', '2024-01-26 01:57:07'),
(33, 11, 38, 'jerigen 25 ltr', 2, 2, 12000, '2024-01-26 01:58:31', '2024-01-26 01:58:31'),
(34, 29, 38, 'steroform', 3, 4, 20000, '2024-01-26 01:59:43', '2024-01-26 01:59:43'),
(35, 33, 37, 'payung lipat', 2, 3, 250000, '2024-01-26 02:01:23', '2024-01-26 02:01:23'),
(36, 29, 19, 'paranet marlin 50% x 1,8 x 50', 4, 4, 500000, '2024-01-26 02:02:25', '2024-01-26 02:02:25'),
(37, 29, 39, 'kaporite tepung 15 kg tjuiwi', 3, 3, 715000, '2024-01-26 02:03:02', '2024-01-26 02:03:02'),
(38, 26, 22, 'gun killer', 4, 4, 40000, '2024-01-26 02:03:31', '2024-01-26 02:03:31'),
(39, 13, 15, 'rp egypt (pupuk rock pospat)', 4, 4, 250000, '2024-01-26 02:04:31', '2024-01-26 02:04:31'),
(40, 23, 24, 'spirtus b', 2, 4, 12500, '2024-01-26 02:04:57', '2024-01-26 02:04:57'),
(41, 23, 24, 'spirtus k', 2, 4, 6875, '2024-01-26 02:05:32', '2024-01-26 02:05:32'),
(42, 2, 15, 'pasir kerang', 1, 4, 14000, '2024-01-26 02:06:11', '2024-01-26 02:06:11'),
(43, 1, 17, 'tepung cucian biru', 2, 4, 57000, '2024-01-26 02:06:48', '2024-01-26 02:06:48'),
(44, 29, 41, 'sumbu 22', 1, 5, 35000, '2024-01-26 02:07:32', '2024-01-26 02:07:32'),
(45, 25, 37, 'Serbet Gunting', 4, 5, 50000, '2024-01-26 02:09:07', '2024-01-26 02:09:07'),
(46, 1, 40, 'Karet Grondong', 4, 4, 3500, '2024-01-26 02:10:10', '2024-01-26 02:10:10'),
(47, 13, 13, 'Ayakan kalo bambu', 3, 5, 30000, '2024-01-26 02:12:13', '2024-01-26 02:12:13'),
(48, 13, 1, 'Bakul Bambu kecil', 5, 5, 17000, '2024-01-26 02:14:43', '2024-01-26 02:14:43'),
(49, 13, 1, 'Bakul Bambu Besar', 5, 5, 25000, '2024-01-26 02:15:14', '2024-01-26 02:15:14'),
(50, 13, 1, 'Besek Bambu Besar', 5, 5, 22000, '2024-01-26 02:15:47', '2024-01-26 02:15:47'),
(51, 13, 1, 'Sapu lidi Gagang', 5, 5, 60000, '2024-01-26 02:17:13', '2024-01-26 02:17:13'),
(52, 13, 1, 'Sapu lidi kasur kepala', 5, 5, 4500, '2024-01-26 02:17:59', '2024-01-26 02:17:59'),
(53, 13, 1, 'Sapu lidi Oval', 5, 5, 7000, '2024-01-26 02:18:41', '2024-01-26 02:18:41'),
(54, 13, 1, 'Sapu Bambu', 5, 5, 6000, '2024-01-26 02:19:06', '2024-01-26 02:19:06'),
(55, 28, 1, 'Ember tutup 3 gl', 3, 5, 11250, '2024-01-26 02:19:45', '2024-01-26 02:19:45'),
(56, 28, 1, 'Ember tutup 4 gl', 4, 4, 15500, '2024-01-26 02:20:05', '2024-01-26 02:20:05'),
(57, 30, 1, 'Sikat dorong NAGOYA', 5, 5, 17100, '2024-01-26 02:22:01', '2024-01-26 02:22:01'),
(58, 28, 1, 'Sapu ijuk NAGOYA', 4, 4, 25840, '2024-01-26 02:24:00', '2024-01-26 02:24:00'),
(59, 28, 1, 'Pel NAGOYA', 5, 5, 19200, '2024-01-26 02:24:27', '2024-01-26 02:24:27'),
(60, 23, 1, 'Bangku segi', 4, 4, 24170, '2024-01-26 02:24:59', '2024-01-26 02:24:59'),
(61, 3, 1, 'Bangku bulat', 5, 5, 24170, '2024-01-26 02:25:24', '2024-01-26 02:25:24'),
(62, 28, 1, 'Keranjang Malaysia', 4, 4, 17500, '2024-01-26 02:26:55', '2024-01-26 02:26:55'),
(63, 26, 1, 'pinguin 1,5 cm', 5, 5, 350000, '2024-01-26 02:28:09', '2024-01-26 02:28:09'),
(64, 8, 1, 'Mug enamel tutup \"12\"', 4, 4, 20840, '2024-01-26 02:29:06', '2024-01-26 02:29:06'),
(65, 35, 1, 'Kasur kabu - kabu', 3, 3, 300000, '2024-01-26 02:31:29', '2024-01-26 02:31:29'),
(66, 35, 1, 'Sikat ijuk 38s', 5, 5, 10000, '2024-01-26 02:32:07', '2024-01-26 02:32:07'),
(67, 35, 1, 'Mug enamel polos \"6\"', 4, 4, 9950, '2024-01-26 02:32:35', '2024-01-26 02:32:35'),
(68, 35, 1, 'Mug enamel polos \"7\"', 5, 5, 6250, '2024-01-26 02:32:52', '2024-01-26 02:32:52'),
(69, 1, 1, 'Sapu family besar', 4, 4, 35000, '2024-01-26 02:33:57', '2024-01-26 02:33:57'),
(70, 35, 1, 'Sapu kipas 2 macan', 1, 5, 32000, '2024-01-26 02:34:16', '2024-01-26 02:34:16'),
(71, 1, 43, 'Reng R28 0.40x5.8 X', 1, 5, 29000, '2024-01-26 02:36:01', '2024-01-26 02:36:01'),
(72, 7, 1, 'GECO Truss 0.75x5.8M Zinc X', 1, 5, 72000, '2024-01-26 02:36:24', '2024-01-26 02:36:24'),
(73, 1, 25, 'GNET Screw Roofing 5.5x50 Y', 1, 4, 84000, '2024-01-26 02:36:47', '2024-01-26 02:36:47'),
(74, 25, 1, 'Rebusan Obat Kecil', 1, 3, 40000, '2024-01-26 02:37:31', '2024-01-26 02:37:31'),
(75, 1, 1, 'Rebusan Obat Besar', 1, 4, 45000, '2024-01-26 02:37:51', '2024-01-26 02:37:51'),
(76, 29, 1, 'Asahan Besar', 1, 3, 17000, '2024-01-26 02:39:59', '2024-01-26 02:39:59'),
(77, 12, 1, 'Tempat Sampah', 4, 4, 130000, '2024-01-26 02:40:23', '2024-01-26 02:40:23'),
(78, 1, 1, 'Kuali Cap 3 Berlian no.26', 1, 4, 149350, '2024-01-26 02:41:43', '2024-01-26 02:41:43'),
(79, 1, 1, 'Gayung Buah Callista', 3, 3, 4725, '2024-01-26 02:42:38', '2024-01-26 02:42:38'),
(80, 1, 1, 'Saringan Kanaya', 1, 4, 6400, '2024-01-26 02:43:00', '2024-01-26 02:43:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(30) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kecpengiriman` double(8,2) NOT NULL,
  `tdiskon` double(8,2) NOT NULL,
  `pelayanan` double(8,2) NOT NULL,
  `garansi` double(8,2) NOT NULL,
  `tpembayaran` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`id`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 'pcs', '2024-01-21 01:06:49', '2024-01-21 01:06:49'),
(2, 'kardus', '2024-01-24 08:36:35', '2024-01-24 08:36:35'),
(3, 'lusin', '2024-01-24 08:37:40', '2024-01-24 08:37:40'),
(4, 'kilo', '2024-01-24 08:38:09', '2024-01-24 08:38:09'),
(5, 'paket', '2024-01-24 08:38:44', '2024-01-24 08:38:44'),
(6, 'kg', '2024-01-24 08:38:53', '2024-01-24 08:38:53'),
(12, 'kodi', '2024-01-25 08:34:23', '2024-01-25 08:38:08'),
(13, 'set', '2024-01-25 13:10:15', '2024-01-26 01:40:57'),
(14, 'ball', '2024-01-26 01:41:04', '2024-01-26 01:41:04'),
(15, 'krg', '2024-01-26 01:41:33', '2024-01-26 01:41:33'),
(16, 'ikat', '2024-01-26 01:41:53', '2024-01-26 01:41:53'),
(17, 'pack', '2024-01-26 01:42:09', '2024-01-26 01:42:09'),
(18, 'bks', '2024-01-26 01:42:17', '2024-01-26 01:42:17'),
(19, 'roll', '2024-01-26 01:42:25', '2024-01-26 01:42:25'),
(20, 'ktk', '2024-01-26 01:42:36', '2024-01-26 01:42:36'),
(21, 'glg', '2024-01-26 01:42:59', '2024-01-26 01:42:59'),
(22, 'bh', '2024-01-26 01:43:14', '2024-01-26 01:43:14'),
(23, 'gl', '2024-01-26 01:43:19', '2024-01-26 01:43:19'),
(24, 'btl', '2024-01-26 01:43:36', '2024-01-26 01:43:36'),
(25, 'box', '2024-01-26 01:43:45', '2024-01-26 01:43:45'),
(26, 'buku', '2024-01-26 01:43:59', '2024-01-26 01:43:59'),
(27, 'ikat', '2024-01-26 01:44:21', '2024-01-26 01:44:21'),
(28, 'dus', '2024-01-26 01:44:25', '2024-01-26 01:44:25'),
(29, 'rim', '2024-01-26 01:44:34', '2024-01-26 01:44:34'),
(30, 'buah', '2024-01-26 01:44:43', '2024-01-26 01:44:43'),
(31, 'lbr', '2024-01-26 01:44:48', '2024-01-26 01:44:48'),
(32, 'unit', '2024-01-26 01:44:58', '2024-01-26 01:44:58'),
(33, 'mtr', '2024-01-26 01:45:12', '2024-01-26 01:45:12'),
(34, 'drum', '2024-01-26 01:45:23', '2024-01-26 01:45:23'),
(35, 'blk', '2024-01-26 01:45:31', '2024-01-26 01:45:31'),
(36, 'ons', '2024-01-26 01:45:40', '2024-01-26 01:45:40'),
(37, 'lsn', '2024-01-26 01:45:52', '2024-01-26 01:45:52'),
(38, 'lmbr', '2024-01-26 01:46:05', '2024-01-26 01:46:05'),
(39, 'pail', '2024-01-26 01:46:40', '2024-01-26 01:46:40'),
(40, 'm', '2024-01-26 01:46:55', '2024-01-26 01:46:55'),
(41, 'pos', '2024-01-26 01:47:17', '2024-01-26 01:47:17'),
(42, 'ppn', '2024-01-26 01:47:31', '2024-01-26 01:47:31'),
(43, 'btg', '2024-01-26 02:35:07', '2024-01-26 02:35:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$JEt3qvC22hMQy2dhQeOmUeFtrmAi3kO40giYhRfJArKviFbIKWdWa', NULL, '2024-01-21 01:06:09', '2024-01-21 01:06:09'),
(2, 'lidia', 'lidia@gmail.com', NULL, '$2y$10$vMFdqnLh.nmlq4ARonDDVORXI5mpyJYgmXus4CRM7w1Zk.M2BANU6', NULL, '2024-01-25 13:05:43', '2024-01-25 13:05:43'),
(3, 'bmj', 'bmj@gmail.com', NULL, '$2y$10$X/h28Xb3pjtT.oVs6cR0K.wbCLOxNhViYQzSTS3PPFPlota6MyDHm', NULL, '2024-01-25 19:01:03', '2024-01-25 19:01:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `warranty`
--

CREATE TABLE `warranty` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `warranty` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `buy_price` int(11) NOT NULL,
  `inventory_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `warranty`
--

INSERT INTO `warranty` (`id`, `quantity`, `warranty`, `order_date`, `buy_price`, `inventory_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-12-28 00:00:00', 20000, 1, '2024-01-21 01:12:45', '2024-01-25 16:42:34'),
(2, 2, 1, '2024-01-21 00:00:00', 1, 1, '2024-01-21 01:13:16', '2024-01-21 01:13:16'),
(3, 5, 1, '2024-01-17 00:00:00', 10, 2, '2024-01-21 01:24:03', '2024-01-25 10:15:53'),
(4, 4, 2, '2024-01-22 00:00:00', 1, 1, '2024-01-22 07:18:19', '2024-01-22 07:18:19'),
(5, 2, 12, '2024-01-22 00:00:00', 1, 1, '2024-01-22 07:18:55', '2024-01-22 07:18:55'),
(6, 2, 12, '2024-01-22 00:00:00', 1, 1, '2024-01-22 07:20:31', '2024-01-22 07:20:31'),
(7, 2, 12, '2024-01-22 00:00:00', 1, 1, '2024-01-22 07:21:50', '2024-01-22 07:21:50'),
(8, 3, 2, '1111-11-11 00:00:00', 1, 1, '2024-01-22 07:22:14', '2024-01-22 07:22:14'),
(9, 3, 2, '1111-11-11 00:00:00', 1, 1, '2024-01-22 07:23:55', '2024-01-22 07:23:55'),
(10, 3, 2, '1111-11-11 00:00:00', 1, 1, '2024-01-22 07:24:06', '2024-01-22 07:24:06'),
(11, 2, 2, '2222-02-22 00:00:00', 1, 1, '2024-01-22 07:24:17', '2024-01-22 07:24:17'),
(12, 2, 2, '0022-02-22 00:00:00', 1, 1, '2024-01-22 07:24:58', '2024-01-22 07:24:58'),
(13, 2, 2, '0022-02-22 00:00:00', 1, 1, '2024-01-22 07:26:58', '2024-01-22 07:26:58'),
(14, 8, 1, '2023-11-30 00:00:00', 13000, 3, '2024-01-22 07:27:17', '2024-01-25 10:18:54'),
(15, 1, 1, '2024-01-09 00:00:00', 20000, 4, '2024-01-22 07:27:32', '2024-01-25 10:16:07'),
(16, 1, 1, '2024-01-22 00:00:00', 1, 1, '2024-01-22 07:28:56', '2024-01-22 07:28:56'),
(17, 4, 1, '2024-01-03 00:00:00', 10000, 5, '2024-01-22 07:29:49', '2024-01-25 10:16:21'),
(18, 2, 1, '2024-01-22 00:00:00', 123, 5, '2024-01-22 07:30:49', '2024-01-22 07:30:49'),
(19, 4, 1, '2024-01-01 00:00:00', 45000, 6, '2024-01-25 02:28:26', '2024-01-25 02:28:26'),
(20, 4, 1, '2024-01-01 00:00:00', 45000, 6, '2024-01-25 02:29:23', '2024-01-25 02:29:23'),
(21, 12, 5, '2024-01-04 00:00:00', 15000, 7, '2024-01-25 02:35:23', '2024-01-25 10:16:42'),
(22, 2, 1, '2023-12-27 00:00:00', 15000, 7, '2024-01-25 02:36:09', '2024-01-25 02:36:09'),
(23, 2, 1, '2023-12-27 00:00:00', 15000, 7, '2024-01-25 02:38:13', '2024-01-25 02:38:13'),
(24, 2, 1, '2023-12-27 00:00:00', 15000, 7, '2024-01-25 02:41:45', '2024-01-25 02:41:45'),
(25, 2337, 1, '2023-11-02 00:00:00', 13000, 8, '2024-01-25 02:42:27', '2024-01-25 10:17:07'),
(26, 2333, 1, '2024-01-25 00:00:00', 13000, 8, '2024-01-25 02:45:06', '2024-01-25 02:45:06'),
(27, 2, 1, '2024-01-09 00:00:00', 69000, 9, '2024-01-25 02:46:48', '2024-01-25 10:17:21'),
(28, 1, 1, '1111-11-11 00:00:00', 69000, 9, '2024-01-25 02:46:54', '2024-01-25 02:46:54'),
(29, 3, 1, '2023-11-30 00:00:00', 15900, 10, '2024-01-25 02:47:57', '2024-01-25 10:18:21'),
(30, 1, 1, '2023-12-31 00:00:00', 15900, 10, '2024-01-25 02:49:30', '2024-01-25 02:49:30'),
(31, 1, 1, '2023-12-31 00:00:00', 15900, 10, '2024-01-25 02:49:59', '2024-01-25 02:49:59'),
(32, 3, 1, '2024-01-04 00:00:00', 13000, 8, '2024-01-25 02:58:00', '2024-01-25 02:58:00'),
(33, 4, 1, '2024-01-11 00:00:00', 15000, 7, '2024-01-25 02:58:26', '2024-01-25 02:58:26'),
(34, 33, 1, '2024-01-03 00:00:00', 49000, 11, '2024-01-25 02:59:32', '2024-01-25 02:59:32'),
(35, 5, 1, '2024-01-14 00:00:00', 13000, 3, '2024-01-25 03:01:04', '2024-01-25 03:01:04'),
(36, 12, 1, '2024-01-22 00:00:00', 20000, 4, '2024-01-25 10:20:26', '2024-01-25 10:20:26'),
(37, 1, 1, '2024-01-20 00:00:00', 10, 2, '2024-01-25 10:21:09', '2024-01-25 10:21:09'),
(38, 1, 1, '2024-01-20 00:00:00', 10, 2, '2024-01-25 10:22:12', '2024-01-25 10:22:12'),
(39, 2, 1, '2023-12-28 00:00:00', 20000, 1, '2024-01-25 13:14:03', '2024-01-25 13:14:03');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datasupp`
--
ALTER TABLE `datasupp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_product_id_foreign` (`product_id`);

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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `supplier_nama_unique` (`nama`);

--
-- Indeks untuk tabel `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `warranty`
--
ALTER TABLE `warranty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `warranty_inventory_id_foreign` (`inventory_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `datasupp`
--
ALTER TABLE `datasupp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `warranty`
--
ALTER TABLE `warranty`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Ketidakleluasaan untuk tabel `warranty`
--
ALTER TABLE `warranty`
  ADD CONSTRAINT `warranty_inventory_id_foreign` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
