-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Mar 2021 pada 04.23
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payment_app`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_activation_attempts`
--

INSERT INTO `auth_activation_attempts` (`id`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', NULL, '2021-03-13 01:16:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'administrator'),
(2, 'user', 'regular user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_permissions`
--

INSERT INTO `auth_groups_permissions` (`group_id`, `permission_id`) VALUES
(1, 1),
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_groups_users`
--

INSERT INTO `auth_groups_users` (`group_id`, `user_id`) VALUES
(1, 5),
(2, 4),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(1, '::1', 'Login', NULL, '2021-03-12 21:34:54', 0),
(2, '::1', 'Login', NULL, '2021-03-12 21:34:54', 0),
(3, '::1', 'Login', NULL, '2021-03-12 21:34:59', 0),
(4, '::1', 'Login', NULL, '2021-03-12 21:35:23', 0),
(5, '::1', 'Login', NULL, '2021-03-12 22:11:07', 0),
(6, '::1', 'Login', NULL, '2021-03-12 23:31:12', 0),
(7, '::1', 'Login', NULL, '2021-03-12 23:41:13', 0),
(8, '::1', 'Login', NULL, '2021-03-12 23:41:58', 0),
(9, '::1', 'Login', NULL, '2021-03-12 23:45:37', 0),
(10, '::1', 'Login', NULL, '2021-03-12 23:50:28', 0),
(11, '::1', 'Login', NULL, '2021-03-12 23:57:57', 0),
(12, '::1', 'Login', NULL, '2021-03-12 23:58:46', 0),
(13, '::1', 'Login', NULL, '2021-03-13 00:06:00', 0),
(14, '::1', 'Login', NULL, '2021-03-13 00:09:25', 0),
(15, '::1', 'Login', NULL, '2021-03-13 00:10:56', 0),
(16, '::1', 'Login', NULL, '2021-03-13 00:14:07', 0),
(17, '::1', 'Login', NULL, '2021-03-13 00:14:15', 0),
(18, '::1', 'Login', NULL, '2021-03-13 00:23:10', 0),
(19, '::1', 'Login', NULL, '2021-03-13 00:23:52', 0),
(20, '::1', 'Login', NULL, '2021-03-13 00:27:02', 0),
(21, '::1', 'Login', NULL, '2021-03-13 00:32:12', 0),
(22, '::1', 'Login', NULL, '2021-03-13 00:32:26', 0),
(23, '::1', 'Login', NULL, '2021-03-13 00:38:55', 0),
(24, '::1', 'Login', NULL, '2021-03-13 00:39:12', 0),
(25, '::1', 'Login', NULL, '2021-03-13 00:39:24', 0),
(26, '::1', 'Login', NULL, '2021-03-13 00:39:49', 0),
(27, '::1', 'Login', NULL, '2021-03-13 00:47:35', 0),
(28, '::1', 'zuni@gmail.com', 6, '2021-03-13 00:48:08', 1),
(29, '::1', 'Login', NULL, '2021-03-13 00:48:58', 0),
(30, '::1', 'zuni@gmail.com', 6, '2021-03-13 00:54:22', 1),
(31, '::1', 'eyeround', 7, '2021-03-13 01:04:34', 0),
(32, '::1', 'eyeround.muscle@gmail.com', 7, '2021-03-13 01:06:04', 0),
(33, '::1', 'eyeround', 7, '2021-03-13 01:14:13', 0),
(34, '::1', 'dzulfikar.sauki@gmail.com', 4, '2021-03-13 01:16:24', 1),
(35, '::1', 'admin@gmail.com', NULL, '2021-03-13 04:00:26', 0),
(36, '::1', 'zuni@gmail.com', 6, '2021-03-13 04:01:15', 1),
(37, '::1', 'zuni@gmail.com', 6, '2021-03-13 04:51:42', 1),
(38, '::1', 'zuni@gmail.com', 6, '2021-03-13 04:52:06', 1),
(39, '::1', 'admin@gmail.com', NULL, '2021-03-13 05:24:45', 0),
(40, '::1', 'admin@gmail.com', NULL, '2021-03-13 05:24:46', 0),
(41, '::1', 'admin@admin.com', 5, '2021-03-13 05:24:52', 1),
(42, '::1', 'zuni@gmail.com', 6, '2021-03-13 05:57:24', 1),
(43, '::1', 'admin@admin.com', 5, '2021-03-13 07:19:02', 1),
(44, '::1', 'admin@admin.com', 5, '2021-03-13 08:15:25', 1),
(45, '::1', 'zuni@gmail.com', 6, '2021-03-13 08:16:34', 1),
(46, '::1', 'admin@admin.com', 5, '2021-03-13 08:23:02', 1),
(47, '::1', 'zuni@gmail.com', 6, '2021-03-13 08:28:53', 1),
(48, '::1', 'admin@admin.com', 5, '2021-03-13 08:46:42', 1),
(49, '::1', 'admin@admin.com', 5, '2021-03-13 21:06:43', 1),
(50, '::1', 'zuni@gmail.com', 6, '2021-03-13 21:22:24', 1),
(51, '::1', 'admin@admin.com', 5, '2021-03-13 21:31:21', 1),
(52, '::1', 'zuni@gmail.com', 6, '2021-03-13 21:36:40', 1),
(53, '::1', 'dzulfikar', NULL, '2021-03-13 23:16:53', 0),
(54, '::1', 'dzulfikar.sauki@gmail.com', 4, '2021-03-13 23:17:03', 1),
(55, '::1', 'dzulfikar.sauki@gmail.com', 4, '2021-03-13 23:17:04', 1),
(56, '::1', 'dzulfikar.sauki@gmail.com', 4, '2021-03-13 23:20:34', 1),
(57, '::1', 'admin@admin.com', 5, '2021-03-13 23:30:04', 1),
(58, '::1', 'dzulfikar.sauki@gmail.com', 4, '2021-03-13 23:31:40', 1),
(59, '::1', 'zuni@gmail.com', 6, '2021-03-13 23:32:33', 1),
(60, '::1', 'zuni@gmail.com', 6, '2021-03-14 00:36:37', 1),
(61, '::1', 'admin@admin.com', 5, '2021-03-14 00:42:03', 1),
(62, '::1', 'zuni@gmail.com', 6, '2021-03-14 04:22:24', 1),
(63, '::1', 'admin@admin.com', 5, '2021-03-14 04:37:39', 1),
(64, '::1', 'zuni@gmail.com', 6, '2021-03-14 04:38:11', 1),
(65, '::1', 'admin@admin.com', 5, '2021-03-14 04:45:31', 1),
(66, '::1', 'zuni@gmail.com', 6, '2021-03-14 04:46:16', 1),
(67, '::1', 'admin@admin.com', 5, '2021-03-14 04:57:54', 1),
(68, '::1', 'zuni@gmail.com', 6, '2021-03-14 05:11:27', 1),
(69, '::1', 'admin@admin.com', 5, '2021-03-14 08:14:02', 1),
(70, '::1', 'zuni@gmail.com', 6, '2021-03-14 08:20:29', 1),
(71, '::1', 'admin@admin.com', 5, '2021-03-14 18:56:48', 1),
(72, '::1', 'admin@admin.com', 5, '2021-03-14 19:52:52', 1),
(73, '::1', 'dzulfikar', NULL, '2021-03-14 19:53:06', 0),
(74, '::1', 'dzulfikar.sauki@gmail.com', 4, '2021-03-14 19:53:13', 1),
(75, '::1', 'admin@admin.com', 5, '2021-03-14 19:56:12', 1),
(76, '::1', 'dzulfikar.sauki@gmail.com', 4, '2021-03-14 20:03:31', 1),
(77, '::1', 'admin@admin.com', 5, '2021-03-14 20:08:09', 1),
(78, '::1', 'admin@admin.com', 5, '2021-03-15 02:09:35', 1),
(79, '::1', 'zuni@gmail.com', 6, '2021-03-15 04:28:03', 1),
(80, '::1', 'dzulfikar', NULL, '2021-03-15 04:28:34', 0),
(81, '::1', 'dzulfikar.sauki@gmail.com', 4, '2021-03-15 04:28:42', 1),
(82, '::1', 'dzulfikar.sauki@gmail.com', 4, '2021-03-15 04:28:42', 1),
(83, '::1', 'zuni@gmail.com', 6, '2021-03-15 18:49:22', 1),
(84, '::1', 'zuni', NULL, '2021-03-16 03:51:01', 0),
(85, '::1', 'zuni', NULL, '2021-03-16 03:51:07', 0),
(86, '::1', 'zuni', NULL, '2021-03-16 03:51:14', 0),
(87, '::1', 'zuni', NULL, '2021-03-16 03:51:22', 0),
(88, '::1', 'zuni2', NULL, '2021-03-16 03:51:38', 0),
(89, '::1', 'zuni2', NULL, '2021-03-16 03:51:44', 0),
(90, '::1', 'zuni2', NULL, '2021-03-16 03:52:19', 0),
(91, '::1', 'zuni2', NULL, '2021-03-16 03:52:28', 0),
(92, '::1', 'zuni2', NULL, '2021-03-16 03:52:37', 0),
(93, '::1', 'dzulfikar', NULL, '2021-03-16 04:00:03', 0),
(94, '::1', 'dzulfikar', NULL, '2021-03-16 04:00:39', 0),
(95, '::1', 'admin@admin.com', 5, '2021-03-16 04:00:44', 1),
(96, '::1', 'dzulfikar.sauki@gmail.com', NULL, '2021-03-16 04:01:10', 0),
(97, '::1', 'dzulfikar.sauki@gmail.com', 4, '2021-03-16 04:01:18', 1),
(98, '::1', 'zuni', NULL, '2021-03-16 04:01:32', 0),
(99, '::1', 'zuni@gmail.com', NULL, '2021-03-16 04:01:49', 0),
(100, '::1', 'zuni', NULL, '2021-03-16 04:01:55', 0),
(101, '::1', 'zuni', NULL, '2021-03-16 04:01:59', 0),
(102, '::1', 'dzulfikar.sauki@gmail.com', 4, '2021-03-16 04:05:04', 1),
(103, '::1', 'dzulfikar', NULL, '2021-03-16 04:09:56', 0),
(104, '::1', 'dzulfikar', NULL, '2021-03-16 04:11:24', 0),
(105, '::1', 'dzulfikar', NULL, '2021-03-16 04:11:32', 0),
(106, '::1', 'dzulfikar', NULL, '2021-03-16 04:11:43', 0),
(107, '::1', 'zuni2', NULL, '2021-03-16 05:10:25', 0),
(108, '::1', 'zuni2', NULL, '2021-03-16 05:10:48', 0),
(109, '::1', 'zuni2', NULL, '2021-03-16 05:12:25', 0),
(110, '::1', 'dzulfikar', NULL, '2021-03-16 05:13:07', 0),
(111, '::1', 'dzulfikar', NULL, '2021-03-16 05:13:15', 0),
(112, '::1', 'dzulfikar', NULL, '2021-03-16 05:13:22', 0),
(113, '::1', 'admin@admin.com', 5, '2021-03-16 05:16:00', 1),
(114, '::1', 'zuni2', NULL, '2021-03-16 05:18:36', 0),
(115, '::1', 'zuni', NULL, '2021-03-16 05:20:04', 0),
(116, '::1', 'dzulfikar', NULL, '2021-03-16 05:20:15', 0),
(117, '::1', 'admin@admin.com', 5, '2021-03-16 05:23:17', 1),
(118, '::1', 'zuni', NULL, '2021-03-16 05:23:56', 0),
(119, '::1', 'zuni', NULL, '2021-03-16 05:24:02', 0),
(120, '::1', 'zuni2', NULL, '2021-03-16 05:24:11', 0),
(121, '::1', 'eyeround.muscle@gmail.com', 7, '2021-03-16 05:45:14', 1),
(122, '::1', 'eyeround.muscle@gmail.com', 7, '2021-03-16 07:54:03', 1),
(123, '::1', 'eyeround.muscle@gmail.com', 7, '2021-03-16 08:05:59', 1),
(124, '::1', 'user3@gmail.com', 10, '2021-03-16 08:25:53', 1),
(125, '::1', 'admin@admin.com', 5, '2021-03-16 08:36:23', 1),
(126, '::1', 'user1@gmail.com', 8, '2021-03-16 19:50:07', 1),
(127, '::1', 'user1@gmail.com', 8, '2021-03-16 19:55:43', 1),
(128, '::1', 'admin@admin.com', 5, '2021-03-16 19:58:35', 1),
(129, '::1', 'test@gmail.com', 11, '2021-03-16 20:23:07', 1),
(130, '::1', 'test', NULL, '2021-03-16 20:31:18', 0),
(131, '::1', 'test', NULL, '2021-03-16 20:31:24', 0),
(132, '::1', 'test', NULL, '2021-03-16 20:31:30', 0),
(133, '::1', 'test', NULL, '2021-03-16 20:31:47', 0),
(134, '::1', 'test', NULL, '2021-03-16 20:32:02', 0),
(135, '::1', 'test', NULL, '2021-03-16 20:32:54', 0),
(136, '::1', 'test', NULL, '2021-03-16 20:32:58', 0),
(137, '::1', 'admin@admin.com', 5, '2021-03-16 21:06:01', 1),
(138, '::1', 'eyeround.muscle@gmail.com', 7, '2021-03-16 21:09:16', 1),
(139, '::1', 'admin@admin.com', 5, '2021-03-16 21:15:35', 1),
(140, '::1', 'eyeround.muscle@gmail.com', 7, '2021-03-17 02:22:45', 1),
(141, '::1', 'user1@gmail.com', 8, '2021-03-17 02:28:00', 1),
(142, '::1', 'user2@gmail.com', 9, '2021-03-17 02:29:06', 1),
(143, '::1', 'user3@gmail.com', 10, '2021-03-17 02:29:18', 1),
(144, '::1', 'test', NULL, '2021-03-17 02:29:49', 0),
(145, '::1', 'test@gmail.com', NULL, '2021-03-17 02:30:06', 0),
(146, '::1', 'test', NULL, '2021-03-17 02:30:13', 0),
(147, '::1', 'admin@admin.com', 5, '2021-03-17 02:32:12', 1),
(148, '::1', 'test@gmail.com', 12, '2021-03-17 02:36:11', 1),
(149, '::1', 'test', NULL, '2021-03-17 02:37:07', 0),
(150, '::1', 'test@gmail.com', 13, '2021-03-17 02:38:21', 1),
(151, '::1', 'test', NULL, '2021-03-17 02:58:23', 0),
(152, '::1', 'test', NULL, '2021-03-17 02:58:30', 0),
(153, '::1', 'test@gmail.com', 14, '2021-03-17 03:01:45', 1),
(154, '::1', 'test', NULL, '2021-03-17 03:02:14', 0),
(155, '::1', 'eyeround.muscle@gmail.com', 7, '2021-03-17 03:37:57', 1),
(156, '::1', 'admin@admin.com', 5, '2021-03-17 05:25:05', 1),
(157, '::1', 'user1@gmail.com', 8, '2021-03-17 05:34:46', 1),
(158, '::1', 'admin@admin.com', 5, '2021-03-17 07:59:50', 1),
(159, '::1', 'user1@gmail.com', 8, '2021-03-17 21:21:46', 1),
(160, '::1', 'user2@gmail.com', 9, '2021-03-17 21:24:06', 1),
(161, '::1', 'admin@admin.com', 5, '2021-03-17 21:28:56', 1),
(162, '::1', 'admin@admin.com', 5, '2021-03-17 21:29:45', 1),
(163, '::1', 'user', NULL, '2021-03-17 21:49:38', 0),
(164, '::1', 'user@gmail.com', 11, '2021-03-17 21:50:58', 1),
(165, '::1', 'user1@gmail.com', 8, '2021-03-17 21:54:15', 1),
(166, '::1', 'admin@admin.com', 5, '2021-03-17 21:56:36', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_permissions`
--

INSERT INTO `auth_permissions` (`id`, `name`, `description`) VALUES
(1, 'admin_permission', ''),
(2, 'user_permission', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `auth_reset_attempts`
--

INSERT INTO `auth_reset_attempts` (`id`, `email`, `ip_address`, `user_agent`, `token`, `created_at`) VALUES
(1, 'eyeround.muscle@gmail.com', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.82 Safari/537.36', '878e601d44be1823ce7ecf770867e943', '2021-03-17 03:37:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1615600604, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(111) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `transaction_time` date NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `bank` varchar(255) NOT NULL,
  `va_number` varchar(255) NOT NULL,
  `pdf_url` text NOT NULL,
  `status_code` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `first_name`, `last_name`, `gross_amount`, `payment_type`, `transaction_time`, `time_stamp`, `bank`, `va_number`, `pdf_url`, `status_code`) VALUES
(1615946968, 7, 'test', 'user', 400000, 'bank transfer', '2021-03-16', '2021-03-16 02:33:45', 'bca', '19037353550', 'https://app.sandbox.midtrans.com/snap/v1/transactions/b81b9de0-7ca3-4070-8507-d4a60058724b/pdf', '201'),
(1615947264, 7, 'test', 'user', 400000, 'credit card', '2021-03-17', '2021-03-16 21:43:44', 'bni', 'N/A', 'https://api.sandbox.veritrans.co.id/v2/token/rba/redirect/481111-1114-668bcf83-04f0-4855-8198-744d7ef7ad4b', '200'),
(1615977304, 8, '', '', 400000, 'bank transfer', '2021-03-17', '2021-03-16 22:35:15', 'bca', '19037381871', 'https://app.sandbox.midtrans.com/snap/v1/transactions/4a9d67a6-c17c-4e78-9dee-7bbd1e110192/pdf', '201'),
(1615977693, 8, '', '', 400000, 'bank transfer', '2021-03-17', '2021-03-16 22:41:43', 'bni', '9881903771801372', 'https://app.sandbox.midtrans.com/snap/v1/transactions/db94fc3e-7680-437f-a73a-869615f9602f/pdf', '201'),
(1616034449, 9, 'zuni', 'anifah', 400000, 'bank transfer', '2021-03-18', '2021-03-18 02:27:55', 'permata', '190002894439191', 'https://app.sandbox.midtrans.com/snap/v1/transactions/f97c59ee-5987-42d8-83c5-e1b9e4c2722d/pdf', '201'),
(1616034490, 9, 'zuni', 'anifah', 400000, 'credit card', '2021-03-18', '2021-03-18 02:28:34', 'bni', 'N/A', 'https://api.sandbox.veritrans.co.id/v2/token/rba/redirect/481111-1114-b8ed9835-7723-4624-a0d6-fedafbd8aba6', '200'),
(1616036100, 8, 'User', 'dzulfikar', 400000, 'credit card', '2021-03-18', '2021-03-18 02:55:23', 'bni', 'N/A', 'https://api.sandbox.veritrans.co.id/v2/token/rba/redirect/481111-1114-53900ae6-81f3-4b76-8412-f0f10d0916a2', '200');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `address` varchar(222) NOT NULL,
  `image` varchar(100) DEFAULT 'default.jpg',
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
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `first_name`, `last_name`, `phone`, `address`, `image`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'dzulfikar.sauki@gmail.com', 'dzulfikar', 'dzulfikar', 'sauki', '123', '', 'default.jpg', '$2y$10$9gabzcSqRfFNW50wh/DFOOW8y116GGhz5vj4qHYIYipryiP3zOrhm', NULL, NULL, NULL, 'e7f3bf11d7ecaf22d5e91e417940e94e', NULL, NULL, 1, 0, '2021-03-12 22:27:37', '2021-03-12 22:27:37', NULL),
(5, 'admin@admin.com', 'admin', 'admin', 'dzulfikar', '', '', 'default.jpg', '$2y$10$Ix/eyAQoO20QO024g53AZO3UYR70pC9Jg.ygMJmZboNhRrlHlyDMe', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-12 23:50:20', '2021-03-12 23:50:20', NULL),
(6, 'zuni@gmail.com', 'zuni', 'zuni', 'anifah', '08880199932', 'Dk. Bambankerep no.202 ', 'default.jpg', '$2y$10$DsHKjAp4yvdASd.xLm0woujefFIg9h/0iWDM0NxqKX9wnF9DlyWu.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-13 00:13:58', '2021-03-13 00:13:58', NULL),
(7, 'eyeround.muscle@gmail.com', 'eyeround', 'test', 'userr', '08912321312', 'Jl. Suratmo no. 223 Semarang Barat, Semarang', 'default.jpg', '$2y$10$KLCMXTSvgVpp2VPRd6jIVu3V9TWi4Gc8UtHq.ipwPfr07yK4a4hrS', NULL, '2021-03-17 03:37:50', NULL, '325d0d08d27c9eddf1aaaede95dd507b', NULL, NULL, 1, 0, '2021-03-13 01:02:18', '2021-03-17 03:37:50', NULL),
(8, 'user1@gmail.com', 'user1', 'User', 'dzulfikar', '088801995989', 'Jl. Borobudur Selatan 1 no. 13', 'default.jpg', '$2y$10$43Rs1xmA/y4J6aVhOXrFN.1C/6JPmgbPDEPLVaUQnrfxfZ046I9k2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-16 08:04:14', '2021-03-16 08:04:14', NULL),
(9, 'user2@gmail.com', 'user2', 'zuni', 'anifah', '231231312321', 'Jl. Suratmo no. 223 Semarang Barat, Semarang', 'default.jpg', '$2y$10$GhIAIHhbp5VElZTB.ZNNQOM9wpR9fwWwynuv0WFYMEo92OSIJuLKS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-16 08:16:48', '2021-03-16 08:16:48', NULL),
(10, 'user3@gmail.com', 'user3', '', '', '', '', 'default.jpg', '$2y$10$SJ9QdBrLjt.V2ivzzOQxgO5871CtHm0CU9RmJ1xxvpghBZ7GpKw9y', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-16 08:18:35', '2021-03-16 08:18:35', NULL),
(11, 'user@gmail.com', 'user', '', '', '', '', 'default.jpg', '$2y$10$7AZso2f86JmSdLJWvvVkuOjoDvNX85KictlI3ign0.5y3eeVLcBIK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2021-03-17 21:50:48', '2021-03-17 21:50:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indeks untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indeks untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indeks untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT untuk tabel `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
