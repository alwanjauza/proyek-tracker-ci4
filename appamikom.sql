-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 16, 2024 at 11:37 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appamikom`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Reguler User');

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 26),
(1, 35),
(2, 34),
(2, 36),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76);

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'newyvy@logsmarter.net', 1, '2024-10-08 10:01:25', 1),
(2, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 10:02:08', 1),
(3, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 10:06:08', 1),
(4, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 10:06:26', 1),
(5, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 10:12:53', 1),
(6, '::1', 'taebes@kiluch.com', 3, '2024-10-08 10:32:21', 1),
(7, '::1', 'taebes@kiluch.com', 3, '2024-10-08 10:37:42', 1),
(8, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 10:42:57', 1),
(9, '::1', 'damee', NULL, '2024-10-08 10:43:05', 0),
(10, '::1', 'damee', NULL, '2024-10-08 10:43:15', 0),
(11, '::1', 'taebes@kiluch.com', 3, '2024-10-08 10:43:21', 1),
(12, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 11:01:16', 1),
(13, '::1', 'taebes@kiluch.com', 3, '2024-10-08 11:09:21', 1),
(14, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 11:18:43', 1),
(15, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 11:18:59', 1),
(16, '::1', 'usersejati', NULL, '2024-10-08 15:25:14', 0),
(17, '::1', 'usersejati', NULL, '2024-10-08 15:25:19', 0),
(18, '::1', 'usersejati', NULL, '2024-10-08 15:25:37', 0),
(19, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 15:25:43', 1),
(20, '::1', 'qerycu', NULL, '2024-10-08 15:26:22', 0),
(21, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 15:26:57', 1),
(22, '::1', 'lyraho@mailinator.com', NULL, '2024-10-08 15:27:49', 0),
(23, '::1', 'nezolytuv', NULL, '2024-10-08 15:27:57', 0),
(24, '::1', 'cecozi@mailinator.com', 13, '2024-10-08 15:28:20', 1),
(25, '::1', 'asdasd', NULL, '2024-10-08 15:29:45', 0),
(26, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 15:32:52', 1),
(27, '::1', 'bulogopyg', NULL, '2024-10-08 15:36:04', 0),
(28, '::1', 'nomerizequ@mailinator.com', NULL, '2024-10-08 15:36:21', 0),
(29, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 15:36:31', 1),
(30, '::1', 'resifaran', NULL, '2024-10-08 15:39:27', 0),
(31, '::1', 'alwanjauza', NULL, '2024-10-08 15:42:42', 0),
(32, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-08 15:42:47', 1),
(33, '::1', 'nexakuluh', NULL, '2024-10-08 15:43:18', 0),
(34, '::1', 'wyhi@mailinator.com', 17, '2024-10-08 15:46:21', 1),
(35, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-09 05:50:45', 1),
(36, '::1', 'wyhi@mailinator.com', 17, '2024-10-09 05:50:55', 1),
(37, '::1', 'alwanjauza', NULL, '2024-10-09 11:27:08', 0),
(38, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-09 11:27:13', 1),
(39, '::1', 'wyhi@mailinator.com', 17, '2024-10-09 11:27:22', 1),
(40, '::1', 'wyhi@mailinator.com', 17, '2024-10-10 02:28:35', 1),
(41, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-10 02:28:45', 1),
(42, '::1', 'wyhi@mailinator.com', 17, '2024-10-10 04:52:48', 1),
(43, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-10 07:30:43', 1),
(44, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-10 10:29:14', 1),
(45, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-10 10:33:04', 1),
(46, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-10 10:36:23', 1),
(47, '::1', 'wyhi@mailinator.com', 17, '2024-10-10 10:38:25', 1),
(48, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-10 12:38:20', 1),
(49, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-10 13:24:18', 1),
(50, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-10 22:25:32', 1),
(51, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-11 02:50:58', 1),
(52, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-11 09:04:42', 1),
(53, '::1', 'wyhi@mailinator.com', 17, '2024-10-12 06:36:16', 1),
(54, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-12 06:47:40', 1),
(55, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-12 11:23:08', 1),
(56, '::1', 'wyhi@mailinator.com', 17, '2024-10-12 13:29:40', 1),
(57, '::1', 'tester@gmail.com', 24, '2024-10-12 13:34:55', 1),
(58, '::1', 'wyhi@mailinator.com', 17, '2024-10-12 13:59:04', 1),
(59, '::1', 'wyhi@mailinator.com', 17, '2024-10-12 14:23:53', 1),
(60, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-12 14:27:11', 1),
(61, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-12 14:27:45', 1),
(62, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-12 14:28:05', 1),
(63, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-12 14:31:32', 1),
(64, '::1', 'wyhi@mailinator.com', 17, '2024-10-12 14:31:46', 1),
(65, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-12 14:32:32', 1),
(66, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-12 14:41:24', 1),
(67, '::1', 'wyhi@mailinator.com', 17, '2024-10-12 14:46:35', 1),
(68, '::1', 'wyhi@mailinator.com', 17, '2024-10-12 14:58:14', 1),
(69, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-14 11:57:45', 1),
(70, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-14 22:40:11', 1),
(71, '::1', 'wyhi@mailinator.com', 17, '2024-10-14 22:43:16', 1),
(72, '::1', 'wyhi@mailinator.com', 17, '2024-10-14 22:44:14', 1),
(73, '::1', 'wyhi@mailinator.com', 17, '2024-10-14 22:50:48', 1),
(74, '::1', 'wyhi@mailinator.com', 17, '2024-10-14 22:57:48', 1),
(75, '::1', 'fubehh', NULL, '2024-10-14 22:58:24', 0),
(76, '::1', 'fubehh', NULL, '2024-10-14 22:58:29', 0),
(77, '::1', 'zinego@azuretechtalk.net', 2, '2024-10-14 23:04:47', 1),
(78, '::1', 'alwanjauza', NULL, '2024-10-14 23:05:47', 0),
(79, '::1', 'rixubabud@mailinator.com', 25, '2024-10-14 23:06:40', 1),
(80, '::1', 'wicu@mailinator.com', 26, '2024-10-14 23:11:48', 1),
(81, '::1', 'nuxunucyla', NULL, '2024-10-14 23:27:14', 0),
(82, '::1', 'nuxunucyla', NULL, '2024-10-14 23:27:20', 0),
(83, '::1', 'wefysifaq', NULL, '2024-10-14 23:30:04', 0),
(84, '::1', 'hapurev', 32, '2024-10-14 23:47:34', 0),
(85, '::1', 'cywolylymo@mailinator.com', 33, '2024-10-14 23:51:05', 1),
(86, '::1', 'cywolylymo@mailinator.com', 33, '2024-10-14 23:57:51', 1),
(87, '::1', 'cywolylymo@mailinator.com', 33, '2024-10-14 23:58:43', 1),
(88, '::1', 'cywolylymo@mailinator.com', 33, '2024-10-14 23:59:06', 1),
(89, '::1', 'ryxodabyv@mailinator.com', 34, '2024-10-14 23:59:43', 1),
(90, '::1', 'ryxodabyv@mailinator.com', 34, '2024-10-15 00:09:56', 1),
(91, '::1', 'ryxodabyv1@mailinator.com', 34, '2024-10-15 00:29:00', 1),
(92, '::1', 'ryxodabyv1@mailinator.com', 34, '2024-10-15 00:29:26', 1),
(93, '::1', 'wicu@mailinator.com', 26, '2024-10-15 03:54:34', 1),
(94, '::1', 'wicu@mailinator.com', 26, '2024-10-15 17:01:40', 1),
(95, '::1', 'wicu@mailinator.com', 26, '2024-10-16 01:57:35', 1),
(96, '::1', 'hali@mailinator.com', 35, '2024-10-16 05:04:40', 1),
(97, '::1', 'hali@mailinator.com', 35, '2024-10-16 05:35:37', 1),
(98, '::1', 'byoncombat@mail.com', 36, '2024-10-16 05:59:39', 1),
(99, '::1', 'wicu@mailinator.com', 26, '2024-10-16 09:32:58', 1),
(100, '::1', 'alwanjauza', NULL, '2024-10-16 14:57:03', 0),
(101, '::1', 'wicu@mailinator.com', 26, '2024-10-16 14:57:09', 1),
(102, '::1', 'alwanjauza', NULL, '2024-10-16 21:27:19', 0),
(103, '::1', 'alwanjauza', NULL, '2024-10-16 21:27:25', 0),
(104, '::1', 'alwanjauza', NULL, '2024-10-16 21:27:34', 0),
(105, '::1', 'sifezecufa@mailinator.com', 26, '2024-10-16 21:28:21', 1),
(106, '::1', 'byoncombat@mail.com', 36, '2024-10-16 22:34:40', 1),
(107, '::1', 'sifezecufa@mailinator.com', 26, '2024-10-16 22:47:28', 1),
(108, '::1', 'Pia', 39, '2024-10-16 23:16:39', 0),
(109, '::1', 'tmulyani@yahoo.com', 58, '2024-10-16 23:18:01', 1),
(110, '::1', 'sifezecufa@mailinator.com', 26, '2024-10-16 23:18:13', 1),
(111, '::1', 'sifezecufa@mailinator.com', 26, '2024-10-16 23:33:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'manage_user', 'Manage all users'),
(2, 'manage_profile', 'Manage user\'s profile');

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `id` int NOT NULL,
  `nama_fakultas` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id`, `nama_fakultas`, `created_at`, `updated_at`) VALUES
(6, 'Bisnis dan Ilmu Sosial', '2024-10-15 17:09:25', '2024-10-15 17:09:45'),
(8, 'Ilmu Komputer', '2024-10-16 03:20:48', '2024-10-16 03:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `master_ajuan`
--

CREATE TABLE `master_ajuan` (
  `id_jenis` int NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_bagian`
--

CREATE TABLE `master_bagian` (
  `id_bagian` int NOT NULL,
  `nama_bagian` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_bagian`
--

INSERT INTO `master_bagian` (`id_bagian`, `nama_bagian`, `created_at`, `updated_at`) VALUES
(1, 'Rektor', '2024-10-16 05:26:29', '2024-10-16 05:26:29'),
(2, 'Dekan', '2024-10-16 05:26:36', '2024-10-16 05:26:36'),
(3, 'Ketua Jurusan', '2024-10-16 05:26:44', '2024-10-16 05:26:44'),
(4, 'Ketua Program Studi', '2024-10-16 05:26:53', '2024-10-16 05:26:53'),
(5, 'Dosen Pembimbing Akademik', '2024-10-16 05:27:04', '2024-10-16 05:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `master_jenis_app`
--

CREATE TABLE `master_jenis_app` (
  `id_jenis_app` int NOT NULL,
  `nama` varchar(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `master_jenis_app`
--

INSERT INTO `master_jenis_app` (`id_jenis_app`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Website', '2024-10-16 05:24:41', '2024-10-16 05:24:41'),
(2, 'Desktop', '2024-10-16 05:24:47', '2024-10-16 05:24:47'),
(3, 'Smartphone', '2024-10-16 05:24:58', '2024-10-16 05:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `master_tim`
--

CREATE TABLE `master_tim` (
  `id_master_tim` int NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1728377532, 1),
(2, '2024-10-12-031846', 'App\\Database\\Migrations\\CreateLogProgressTable', 'default', 'App', 1728703219, 2);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int NOT NULL,
  `nama_prodi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_fakultas` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama_prodi`, `id_fakultas`, `created_at`, `updated_at`) VALUES
(4, 'Ilmu Komunikasi (S1)', 6, '2024-10-16 03:18:30', '2024-10-16 03:18:30'),
(5, 'Bisnis Digital (S1)', 6, '2024-10-16 03:18:43', '2024-10-16 03:18:43'),
(6, 'Informatika (S1)', 8, '2024-10-16 03:21:00', '2024-10-16 03:38:44'),
(7, 'Sistem Informasi (S1)', 8, '2024-10-16 03:21:07', '2024-10-16 03:21:07'),
(9, 'Teknologi Informasi (S1)', 8, '2024-10-16 03:22:24', '2024-10-16 03:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `psdm_karyawan`
--

CREATE TABLE `psdm_karyawan` (
  `NIK` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_karyawan` int NOT NULL,
  `id_bagian` int NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tabel_ajuan`
--

CREATE TABLE `tabel_ajuan` (
  `id_ajuan` int NOT NULL,
  `id_user` int NOT NULL,
  `id_bagian` int NOT NULL,
  `id_jenis_app` int NOT NULL,
  `jenis_ajuan` enum('Pengembangan Aplikasi','Pembuatan Aplikasi') DEFAULT NULL,
  `waktu_kerja` int DEFAULT NULL,
  `fungsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nama_aplikasi` varchar(100) NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `tahap_saat_ini` enum('Pengajuan','Validasi Tim IT','Perencanaan','Analisa','Pembuatan','Review Implementasi','Done') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Pengajuan',
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'on_review',
  `percentage` int NOT NULL DEFAULT '0',
  `id_tim` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_ajuan`
--

INSERT INTO `tabel_ajuan` (`id_ajuan`, `id_user`, `id_bagian`, `id_jenis_app`, `jenis_ajuan`, `waktu_kerja`, `fungsi`, `nama_aplikasi`, `deskripsi`, `tahap_saat_ini`, `status`, `percentage`, `id_tim`, `created_at`, `updated_at`) VALUES
(18, 26, 2, 2, 'Pengembangan Aplikasi', 10, 'Esse nihil aliquip ', 'Omnis consequat MinA', 'Voluptates autem cum', 'Validasi Tim IT', 'on_review', 10, 1, '2024-10-16 15:44:40', '2024-10-16 22:31:11'),
(19, 26, 5, 1, 'Pembuatan Aplikasi', 15, 'Untuk monitoring progress pembelajaran', '', 'Saepe est quibusdam', 'Perencanaan', 'rejected', 20, 1, '2024-10-16 21:52:59', '2024-10-16 22:35:20'),
(20, 36, 5, 3, 'Pembuatan Aplikasi', 30, 'Berfungsi dengan baik dan benar sih', '', 'Buat baru', 'Perencanaan', 'on_review', 20, 2, '2024-10-16 22:35:50', '2024-10-16 22:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_log_progress`
--

CREATE TABLE `tabel_log_progress` (
  `id_log` int NOT NULL,
  `id_ajuan` int DEFAULT NULL,
  `tahap` varchar(50) DEFAULT NULL,
  `tanggal_mulai` datetime DEFAULT NULL,
  `tanggal_selesai` datetime DEFAULT NULL,
  `keterangan` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_log_progress`
--

INSERT INTO `tabel_log_progress` (`id_log`, `id_ajuan`, `tahap`, `tanggal_mulai`, `tanggal_selesai`, `keterangan`, `created_at`, `updated_at`) VALUES
(27, 18, 'Validasi Tim IT', '2024-10-16 22:31:11', NULL, 'Tahap Validasi Tim IT dimulai', '2024-10-16 22:31:11', '2024-10-16 22:31:11'),
(28, 19, 'Validasi Tim IT', '2024-10-16 22:31:17', '2024-10-16 22:32:46', 'Tahap Validasi Tim IT dimulai', '2024-10-16 22:31:17', '2024-10-16 22:32:46'),
(29, 19, 'Perencanaan', '2024-10-16 22:32:46', NULL, 'Tahap Perencanaan dimulai', '2024-10-16 22:32:46', '2024-10-16 22:32:46'),
(30, 19, 'Perencanaan', '2024-10-16 22:35:20', NULL, 'Pengajuan ditolak pada tahap Perencanaan', '2024-10-16 22:35:20', '2024-10-16 22:35:20'),
(31, 20, 'Validasi Tim IT', '2024-10-16 22:36:31', '2024-10-16 22:37:04', 'Tahap Validasi Tim IT dimulai', '2024-10-16 22:36:31', '2024-10-16 22:37:04'),
(32, 20, 'Validasi Tim IT', '2024-10-16 22:36:42', '2024-10-16 22:37:04', 'Pengajuan ditolak pada tahap Validasi Tim IT', '2024-10-16 22:36:42', '2024-10-16 22:37:04'),
(33, 20, 'Perencanaan', '2024-10-16 22:37:04', NULL, 'Tahap Perencanaan dimulai', '2024-10-16 22:37:04', '2024-10-16 22:37:04');

-- --------------------------------------------------------

--
-- Table structure for table `tim_it`
--

CREATE TABLE `tim_it` (
  `id_tim` int NOT NULL,
  `nama_tim` varchar(100) NOT NULL,
  `anggota_tim` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tim_it`
--

INSERT INTO `tim_it` (`id_tim`, `nama_tim`, `anggota_tim`, `created_at`, `updated_at`) VALUES
(1, 'Astrada', '[\"34\",\"35\",\"36\"]', '2024-10-16 09:33:30', '2024-10-16 09:33:30'),
(2, 'Matim', '[\"26\",\"34\",\"35\",\"36\"]', '2024-10-16 22:36:14', '2024-10-16 22:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `no_identitas` varchar(20) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `id_fakultas` int DEFAULT NULL,
  `id_prodi` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `no_identitas`, `fullname`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`, `id_fakultas`, `id_prodi`) VALUES
(26, 'sifezecufa@mailinator.com', 'alwanjauza', '4002489531998521', 'Julie Sweeney', '$2y$10$aXDdkaJiiSx6tpN1BEkgfu4A0pTi54J83l0nIej3qmv91JplTx0BK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-10-14 23:11:37', '2024-10-16 21:28:32', NULL, 8, 6),
(34, 'ryxodabyv1@mailinator.com', 'kubazacog', NULL, 'Colleen Ware', '$2y$10$ZpfXUPDZ0K9X/ja1hizs0.DvjvwTTuSbccL3mXs84bLsTG7U/Pghe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-10-14 23:59:36', '2024-10-15 00:29:11', NULL, NULL, NULL),
(35, 'hali@mailinator.com', 'navakuha', '3321116502910000', 'Hamilton Mccall', '$2y$10$GgEk3qoQGVdumJHlpWfmReHBKAKvPBHbOU.vNluE7/E0McCBm1AhO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-10-16 05:04:30', '2024-10-16 05:07:37', NULL, 8, 6),
(36, 'byoncombat@mail.com', 'byoncat', '3522055431889087', 'Sumanto', '$2y$10$fXAd.c4IxNw6Qui6Pwu.K.JDLCPqSCwk58ajiRK1WjemFgF4VX67u', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-10-16 05:59:34', '2024-10-16 06:13:32', NULL, 8, 6),
(57, 'cahyadi.yuliarti@gmail.com', 'Clara', NULL, NULL, '$2y$10$BQ/CwqPWU8lFpMfpnyyx9.OvZvgJ02E.ktZDuOwC4ZMplvLQiZjte', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1975-09-30 19:11:06', '1995-12-04 06:20:40', NULL, NULL, NULL),
(58, 'tmulyani@yahoo.com', 'Vinsen', NULL, NULL, '$2y$10$a7Uh7mROZgXxwhTDOKxdSuAS0aAv21vCHL4D6v4aCgBqWNJHmHyyO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1990-12-01 16:51:54', '1970-04-25 13:47:05', NULL, NULL, NULL),
(59, 'hutapea.cinta@gmail.co.id', 'Usyi', NULL, NULL, '$2y$10$600PJRzb4dXwvsY1n.xuaOs6woCtmMuGdIGLIxHJs//x04OBT0x.O', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2005-02-08 01:59:41', '2000-06-06 13:09:55', NULL, NULL, NULL),
(60, 'wardaya55@puspita.desa.id', 'Asmuni', NULL, NULL, '$2y$10$MHsqrRugLtJlIl0S3NNtt.R4EaVxI/nCQ0TYAVzgS7Yb/qdLcHMN.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2009-12-03 03:36:09', '2012-08-22 12:28:46', NULL, NULL, NULL),
(61, 'jono39@tamba.id', 'Luis', NULL, NULL, '$2y$10$BqhTtvBHftxhhLc1MsCTluT7yCSuRtEUZYNU7NiAGSrPemJi4BaL6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1990-07-15 17:32:37', '2002-09-30 18:32:13', NULL, NULL, NULL),
(62, 'rpurnawati@gmail.com', 'Fitria', NULL, NULL, '$2y$10$2qAr6LrSuYWCrh197F7/iOtXEQwfWQKfx9.eyYs48u8n17M8uzwAG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1975-03-07 12:29:49', '1973-11-07 23:23:43', NULL, NULL, NULL),
(63, 'wanggriawan@setiawan.ac.id', 'Samiah', NULL, NULL, '$2y$10$EsPitYafduZgeRrr/2ye8ezVqJxJDc8r.x9H46WWGa0LfjlYNi3ZS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2002-02-18 10:08:05', '1991-08-07 01:18:43', NULL, NULL, NULL),
(64, 'hassanah.ilsa@purwanti.co.id', 'Hafshah', NULL, NULL, '$2y$10$nz7EqpOXK15WwA9sZeinFebRmq8glMpoAuv/MDMr8BspomR9xQT32', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2015-03-01 11:48:08', '2003-10-05 09:22:14', NULL, NULL, NULL),
(65, 'elailasari@gmail.com', 'Ellis', NULL, NULL, '$2y$10$P9HoX9qr8B1TaRRsW29uFes2yTB41ne0omvtXHyPQZo5aCrbDcfc6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1998-12-24 21:17:59', '1982-07-30 08:48:08', NULL, NULL, NULL),
(66, 'rajata.kayun@marpaung.desa.id', 'Mulya', NULL, NULL, '$2y$10$IpYF8l4J7VvzACMa8y9Gp./so8T4ZOQMY5fCkz1AdaTK7Uc.fuhdy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1975-03-30 05:24:37', '2006-07-21 21:51:53', NULL, NULL, NULL),
(67, 'upuspita@saragih.in', 'Wage', NULL, NULL, '$2y$10$gVM8XsmvmQdDVRryYkWwx.XCA0XDDxD9826MkiTtZRsFTzg3AYwMG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2022-11-04 18:28:01', '2000-02-15 09:19:03', NULL, NULL, NULL),
(68, 'dinda.rajasa@gmail.com', 'Alambana', NULL, NULL, '$2y$10$x8IhG1Us9T9gaRlPr9/jBeNjD2CrrXJZUDH4a2ffc/YjFGSpykOwm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1991-01-29 23:35:20', '1973-03-06 11:06:54', NULL, NULL, NULL),
(69, 'hassanah.gabriella@nasyidah.go.id', 'Victoria', NULL, NULL, '$2y$10$4bYXLZeT7XVF.cMu6TWRtuURKiRIk.0MMVeYhKTSJ9bCgoXDlkkke', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2019-06-04 00:07:49', '1981-11-20 04:49:32', NULL, NULL, NULL),
(70, 'susanti.restu@haryanti.com', 'Jumari', NULL, NULL, '$2y$10$GIn87C4YKVWqL9E5ME79nerWFgD9tCE5tl6qRcg65tc7erEYicL4q', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1978-05-02 21:19:48', '1972-05-05 12:05:41', NULL, NULL, NULL),
(71, 'pwulandari@yahoo.co.id', 'Amalia', NULL, NULL, '$2y$10$04wZWPkHq2pDK3iXWMYWo.CnDZersWHanigW5zgp1NQjXfqhz/uIO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2005-06-28 18:13:06', '2016-02-19 18:13:50', NULL, NULL, NULL),
(72, 'laksita.dadi@gmail.co.id', 'Pandu', NULL, NULL, '$2y$10$ql1BUGrt/oTPzrIcmJeTs.TFJp1bIR2Bg4.r3k0lHNT.NoNa51C7O', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1999-10-24 10:22:52', '1976-07-23 12:58:49', NULL, NULL, NULL),
(73, 'andriani.zahra@gmail.com', 'Paris', NULL, NULL, '$2y$10$xyQyOlTGkJZ1eMSNj4n2V.tvdFHzjfOTJH7pCxCuiuEB2H4GL1vJe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1980-11-07 22:58:00', '2023-05-04 23:54:02', NULL, NULL, NULL),
(74, 'irma19@yahoo.com', 'Ira', NULL, NULL, '$2y$10$dPYOx2E3vSjTox0LJAMxYu.zjCuFuDwc51KC6fx658hg.c.lhVdLC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2005-08-19 08:37:20', '2017-05-08 08:59:33', NULL, NULL, NULL),
(75, 'hhalimah@gmail.co.id', 'Darijan', NULL, NULL, '$2y$10$EUjpaR2IUlJa6xP/V2VqAutMIlI.BbtJOLYmZwBkvI6VVN5/dXDl6', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1995-09-20 11:08:50', '1974-08-04 00:10:03', NULL, NULL, NULL),
(76, 'kusmawati.raihan@mahendra.biz.id', 'Heryanto', NULL, NULL, '$2y$10$COI3hZd5h.LSwtDngxUJeeD/Az6sEt9DOmd48k6s6wekdoz.ZOrBy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '1998-07-01 08:18:52', '1978-07-06 09:42:21', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_ajuan`
--
ALTER TABLE `master_ajuan`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `master_bagian`
--
ALTER TABLE `master_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `master_jenis_app`
--
ALTER TABLE `master_jenis_app`
  ADD PRIMARY KEY (`id_jenis_app`);

--
-- Indexes for table `master_tim`
--
ALTER TABLE `master_tim`
  ADD PRIMARY KEY (`id_master_tim`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `psdm_karyawan`
--
ALTER TABLE `psdm_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tabel_ajuan`
--
ALTER TABLE `tabel_ajuan`
  ADD PRIMARY KEY (`id_ajuan`);

--
-- Indexes for table `tabel_log_progress`
--
ALTER TABLE `tabel_log_progress`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_ajuan` (`id_ajuan`);

--
-- Indexes for table `tim_it`
--
ALTER TABLE `tim_it`
  ADD PRIMARY KEY (`id_tim`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_users_fakultas` (`id_fakultas`),
  ADD KEY `fk_users_prodi` (`id_prodi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `master_bagian`
--
ALTER TABLE `master_bagian`
  MODIFY `id_bagian` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `master_jenis_app`
--
ALTER TABLE `master_jenis_app`
  MODIFY `id_jenis_app` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `master_tim`
--
ALTER TABLE `master_tim`
  MODIFY `id_master_tim` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `psdm_karyawan`
--
ALTER TABLE `psdm_karyawan`
  MODIFY `id_karyawan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tabel_ajuan`
--
ALTER TABLE `tabel_ajuan`
  MODIFY `id_ajuan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tabel_log_progress`
--
ALTER TABLE `tabel_log_progress`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tim_it`
--
ALTER TABLE `tim_it`
  MODIFY `id_tim` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabel_log_progress`
--
ALTER TABLE `tabel_log_progress`
  ADD CONSTRAINT `tabel_log_progress_ibfk_1` FOREIGN KEY (`id_ajuan`) REFERENCES `tabel_ajuan` (`id_ajuan`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_fakultas` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_prodi` FOREIGN KEY (`id_prodi`) REFERENCES `prodi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
