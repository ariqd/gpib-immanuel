-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Feb 2023 pada 15.02
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gpibimmanuel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worship_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_seat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_church` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fixed` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `booking_id`, `worship_id`, `user_id`, `booking_seat`, `booking_name`, `booking_gender`, `booking_church`, `fixed`, `created_at`, `updated_at`) VALUES
(27, '7V3bHEFV7K', 3, 3, 'A1', 'Rini', 'Wanita', 'Gereja A', 1, '2022-11-07 06:55:58', '2022-11-07 07:57:17'),
(28, '7V3bHEFV7K', 3, 3, 'A2', 'Bio', 'Pria', 'Gereja B', 1, '2022-11-07 06:55:58', '2022-11-07 07:57:17'),
(29, 'JYkWcv46g0', 3, 2, 'E13', 'Sam', 'Pria', 'Sektor 4', 1, '2022-11-07 23:24:51', '2022-11-07 23:25:12'),
(30, 'JYkWcv46g0', 3, 2, 'E15', 'Nana', 'Wanita', 'Sektor 9', 1, '2022-11-07 23:24:51', '2022-11-07 23:25:12'),
(31, 'GAiw4zw7xt', 4, 2, 'D5', 'Andi', 'Pria', 'Sektor 2', 1, '2022-11-18 06:12:27', '2022-11-18 06:13:00'),
(32, 'GAiw4zw7xt', 4, 2, 'D6', 'Intan', 'Wanita', 'Sektor 4', 1, '2022-11-18 06:12:27', '2022-11-18 06:13:00'),
(33, 'iKC496xss9', 4, 3, 'B1', 'asdasd', 'Pria', 'abcd', 1, '2022-11-18 06:13:43', '2022-11-18 06:14:00'),
(34, 'iKC496xss9', 4, 3, 'B2', 'ewerwerwerqwe', 'Wanita', 'qwertty', 1, '2022-11-18 06:13:43', '2022-11-18 06:14:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `news_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `news_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `news_title`, `news_content`, `news_file`, `news_image`, `news_type`, `created_at`, `updated_at`) VALUES
(1, 'INI JUDUL', 'INI CONTENT YANG SANGAT BANYAK TULISANNYA', '1668180376_SURAT_KOPERWAN.pdf', '1668180376_SURAT_KOMITMEN_GOOGLE_ANDROID_KEJAR_-_ARIQ_DAFFA.jpg', 'Warta', '2022-11-10 08:29:55', '2022-11-11 08:26:16'),
(2, 'Ibadah ITHB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in nulla vulputate, facilisis purus a, semper enim. Suspendisse ac mauris enim. Vivamus lacinia sed sapien id congue. Morbi sed bibendum ante. Suspendisse finibus elit at facilisis maximus. Quisque consectetur ut ex sed porta. Quisque vel mi rhoncus, hendrerit leo eget, semper orci. Duis lobortis elit at arcu efficitur gravida. Nunc sed facilisis ligula. Nullam quis nisl vitae arcu malesuada dignissim. Cras varius non purus tincidunt tincidunt.', '1668432958_SCAN_ARIQ_DAFFA_ATHALLAH_P_HARAHAP.pdf', '1668432958_20171024221916.jpg', 'Tata Ibadah', '2022-11-14 06:35:59', '2022-11-14 06:35:59'),
(3, 'Berita Ibadah Warta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in nulla vulputate, facilisis purus a, semper enim. Suspendisse ac mauris enim. Vivamus lacinia sed sapien id congue. Morbi sed bibendum ante. Suspendisse finibus elit at facilisis maximus. Quisque consectetur ut ex sed porta. Quisque vel mi rhoncus, hendrerit leo eget, semper orci. Duis lobortis elit at arcu efficitur gravida. Nunc sed facilisis ligula. Nullam quis nisl vitae arcu malesuada dignissim. Cras varius non purus tincidunt tincidunt.', '1668433009_ARIQ_DAFFA_-_SERTIFIKAT_IAK_3.0.pdf', '1668433009_SURAT_KOMITMEN_GOOGLE_ANDROID_KEJAR_-_ARIQ_DAFFA.jpg', 'Warta', '2022-11-14 06:36:49', '2022-11-14 06:36:49'),
(4, 'Tata Ibadah Contoh', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in nulla vulputate, facilisis purus a, semper enim. Suspendisse ac mauris enim. Vivamus lacinia sed sapien id congue. Morbi sed bibendum ante. Suspendisse finibus elit at facilisis maximus. Quisque consectetur ut ex sed porta. Quisque vel mi rhoncus, hendrerit leo eget, semper orci. Duis lobortis elit at arcu efficitur gravida. Nunc sed facilisis ligula. Nullam quis nisl vitae arcu malesuada dignissim. Cras varius non purus tincidunt tincidunt.', '1668433033_SURAT_KOMITMEN_GDK_2019.pdf', '1668433033_KTP_ARIQ_DAFFA_ATHALLAH_P_HARAHAP_GRAYSCALE.png', 'Tata Ibadah', '2022-11-14 06:37:13', '2022-11-14 06:37:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Jemaat'),
(3, 'Simpatisan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_church` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_birthdate` date DEFAULT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_vaccine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `is_created_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `user_church`, `user_birthdate`, `user_phone`, `user_gender`, `user_vaccine`, `email_verified_at`, `password`, `is_approved`, `is_created_by_admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@gpibimmanuel.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$mM1zDnhl4R7tsDyrVdKZX.3C2DYFIpfr.b1nWoZ5ouN4ZNOXhYHCy', 1, 1, NULL, '2022-09-19 06:26:14', '2022-09-19 06:26:14'),
(2, 2, 'User', 'user@gpibimmanuel.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$mM1zDnhl4R7tsDyrVdKZX.3C2DYFIpfr.b1nWoZ5ouN4ZNOXhYHCy', 1, 1, NULL, '2022-09-19 06:26:14', '2022-09-19 06:26:14'),
(3, 3, 'simpatisan a', 'simpatisan1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/9fjzSScsH8ibrNqUpU/B.UpHEq8V.Lo62uUP8hxtUjGOCY8Jo102', 1, 0, NULL, '2022-10-10 06:57:11', '2022-10-11 06:14:14'),
(4, 2, 'Jemaat X', 'jemaat2@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$kEvuEvF8Lba4QUr5K51n3OD1coo6o0Nmv2O1D0vY8FA2gLR82wt8i', 1, 1, NULL, '2022-10-10 06:59:01', '2022-10-11 06:11:03'),
(5, 2, 'Jemaat Y', 'jemaat_y@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$OhMbSIr82wEv7E2ym.Lwcu9TjNip6mxvuewOcmULdLMprj.3ApReG', 1, 1, NULL, '2022-10-11 06:12:13', '2022-10-11 06:12:13'),
(6, 3, 'Ahmad', 'ahmad@simpatisan.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$vYLLd3YD4FMN3WdjmhInuOKbg8KRmtaKPdzkFqrHNG02JTLHKGfuC', 1, 0, NULL, '2022-10-11 06:21:09', '2022-10-31 06:42:21'),
(7, 3, 'Julius', 'julius@simpatisan.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$yDIbObxhjcjn8LWzvbu9dOMP8l6cc5Mp4lKJWdVLch0.SD0Y7PnZC', 0, 0, NULL, '2022-10-31 06:40:24', '2022-10-31 06:40:24'),
(8, 3, 'Kevin', 'kevin@gpibimmanuel.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$P0Pltoic8kZh2DtpKRH0sul4R902/VFqw.W9LOU/cR6Dhki6Gjtya', 0, 0, NULL, '2022-10-31 06:49:57', '2022-10-31 06:49:57'),
(9, 3, 'Indra', 'indra@gpibimmanuel.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/0ZNtrWjD8wCmDi/eoTnjOpdyB0mShkZO5mG.xB5kWG4V9FIkSEfy', 0, 0, NULL, '2022-11-08 20:23:08', '2022-11-08 20:23:08'),
(10, 3, 'Andi', 'andi@gpibimmanuel.com', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$maaqwCVWQFtkdaTqWDrbnOHjMn4vAA.nwfxMJLIAmaNqrhbNcYgla', 0, 0, NULL, '2022-11-08 20:31:35', '2022-11-08 20:31:35'),
(11, 3, 'Hendra', 'hendra@gpibimmanuel.com', NULL, '2022-11-09', '082911822293', 'Pria', 'Vaksin Booster', NULL, '$2y$10$8DJma1QRV6mFGbNoqzWPIeYnjseL6cckKXbck.Za2GZkD3dEPJZxG', 1, 0, NULL, '2022-11-08 20:33:39', '2022-11-08 21:10:23'),
(12, 2, 'Rini', 'rini@gpibimmanuel.com', NULL, '2022-11-01', '082911822238', 'Wanita', 'Vaksin Booster', NULL, '$2y$10$CNQtdLsXt5OavQG38RadC.yqS38zEqSPs.8jC4W8hzZUaB2uwFBYS', 1, 1, NULL, '2022-11-08 21:09:36', '2022-11-08 21:09:36'),
(13, 3, 'Hizkia', 'hizkia@gmail.com', NULL, '2022-11-18', '08129228222', 'Pria', 'Vaksin Booster', NULL, '$2y$10$CZoBm6uqUYoMna8UipBFsuDpWgD0XtdUIDmqEmfby6kSr7xhCS7OS', 1, 0, NULL, '2022-11-18 06:15:21', '2022-11-18 06:15:52'),
(14, 3, 'Fred', 'fred@gpibimmanuel.com', 'GPIB Immanuel', '2022-11-22', '087222733382', 'Pria', 'Vaksin 2', NULL, '$2y$10$pGzeNeKvfpcS8JWGs3O9HuR2SjOz2HxFgMX6a7ce3MZhJP75apgqG', 1, 0, NULL, '2022-11-22 07:01:17', '2022-11-22 07:07:16'),
(15, 2, 'Megan', 'megan@gpibimmanuel.com', 'GPIB Immanuel', '2022-11-08', '083922833392', 'Wanita', 'Vaksin Booster', NULL, '$2y$10$VGv9VyKsk1XNSkwHG6ieeeNWytB.4HnUZar9bkoIAU9QaBtUkQ6Pm', 1, 1, NULL, '2022-11-22 07:15:40', '2022-11-22 07:15:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `worships`
--

CREATE TABLE `worships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `worship_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `worship_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worship_date` date NOT NULL,
  `worship_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `worships`
--

INSERT INTO `worships` (`id`, `worship_name`, `worship_image`, `worship_date`, `worship_time`, `created_at`, `updated_at`) VALUES
(1, 'Ibadah Hari Sabtu', NULL, '2022-10-15', '21:30:00', '2022-10-13 06:22:16', '2022-10-13 06:32:09'),
(2, 'Ibadah Hari Minggu', NULL, '2022-11-06', '13:00:00', '2022-10-30 23:47:40', '2022-10-30 23:47:40'),
(3, 'Ibadah Minggu', NULL, '2022-11-13', '20:00:00', '2022-10-31 05:55:48', '2022-10-31 05:55:48'),
(4, 'Ibadah A', '1669129520_WHATSAPP_IMAGE_2022-09-15_AT_20.15.30.jpeg', '2022-11-26', '20:00:00', '2022-11-18 06:11:48', '2022-11-18 06:11:48'),
(6, 'Ibadah November', '1669130950_20171024221916.jpg', '2022-12-03', '15:00:00', '2022-11-22 08:05:20', '2022-11-22 08:29:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `worships`
--
ALTER TABLE `worships`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `worships`
--
ALTER TABLE `worships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
