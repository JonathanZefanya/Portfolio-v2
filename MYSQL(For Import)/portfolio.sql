-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Nov 2024 pada 06.28
-- Versi server: 8.2.0
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `slug`, `name`, `created_at`, `updated_at`) VALUES
(1, 'website', 'Application Mobile', '2024-10-28 03:55:19', '2024-10-29 06:18:07'),
(2, 'website', 'Website', '2024-10-29 06:18:43', '2024-10-29 06:18:43'),
(3, 'game', 'Game', '2024-11-07 11:13:31', '2024-11-07 11:13:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_03_15_051113_create_categories_table', 1),
(5, '2024_03_15_051134_create_posts_table', 1),
(6, '2024_03_18_021027_create_projects_table', 1),
(7, '2024_03_18_021212_create_project_categories_table', 1),
(8, '2024_03_20_073939_add_image_to_projects_table', 1),
(9, '2024_03_20_144009_add_link_to_projects_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `slug`, `title`, `description`, `body`, `body_image`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(4, 'perkembangan-android', 'Perkembangan Android', 'Smartphone berbasis Android mungkin sudah bukan kata asing pada era sekarang.\r\n\r\nNamun, tidak banyak yang tahu maksud dari kata Android dan sejarah Android itu sendiri.\r\n\r\nBaca lebih lanjut untuk mengetahui tentang Android sampai sejarah Android lengkap serta perkembangan versinya.', '<p>Di awal pembuatannya, Android ditargetkan bagi penggunaan perangkat kamera digital. Akan tetapi, para pencipta Android, yaitu Andy Rubin, Chris White, dan Nick Sears berpendapat bahwa pasar untuk kamera digital tidak terlalu besar.</p><p>Maka dari itu, sistem operasi ini kemudian dialihkan penggunaannya pada ponsel pintar.</p><p>Pada tahun 2004, Android mulai dipasarkan dan berhadapan dengan saingan <i>smartphone</i> berbasis sistem operasi Symbian dan Windows Mobile. Di awal pemasarannya ini, Andy Rubin dan <i>partner</i>-nya sulit mendapatkan investor.</p><p>Hingga akhirnya, Android berhasil mendapatkan suntikan dana sebesar 10.000 dolar Amerika dari Steve Perlman, seseorang yang kala itu ingin membantu Andy Rubin. Di bulan Juli 2005, Google mengakuisisi Android Inc. dengan uang sebesar 50 juta dolar.</p><p>Para pendiri Android kemudian bergabung dengan Google dan memimpin proyek ini. Setelah Google akhirnya berkompetisi juga dalam perangkat ponsel pintar yang dibelinya, yaitu Android, Google akhirnya membuat prototipe.</p>', 'public/post-images/3PDNwVAwEwCZHiI27jiJT3La9wjyjAkfsTdIURoa.png', 1, 1, '2024-10-29 06:31:44', '2024-11-07 11:51:17'),
(9, 'story-teaser-flowers-and-dreams-genshin-impact', 'Story Teaser: Flowers and Dreams | Genshin Impact', 'Happy Birthday Nahida', '<p>Ever beheld blossoms more dazzling than fireworks, or cherished memories more tender than the sweetest dreams?</p><p>&nbsp;</p><p>As the sun and moon rise in turn, the trees and grasses shall forever remember this moment.</p><p>&nbsp;</p><figure class=\"media\"><div data-oembed-url=\"https://youtu.be/yX9vAY8eV_0?si=DKqNekTTQaF4KM2m\"><div style=\"position: relative; padding-bottom: 100%; height: 0; padding-bottom: 56.2493%;\"><iframe src=\"https://www.youtube.com/embed/yX9vAY8eV_0\" style=\"position: absolute; width: 100%; height: 100%; top: 0; left: 0;\" frameborder=\"0\" allow=\"autoplay; encrypted-media\" allowfullscreen=\"\"></iframe></div></div></figure><p>&nbsp;</p><p>Due to recording arrangements, this video will be shown with Japanese audio. We apologize for any inconvenience caused.</p><p>Traveler, you can enable subtitles while watching!</p><p>&nbsp;</p><p>Chinese&nbsp;Voice-Over&nbsp;Video:&nbsp;<a href=\"https://youtu.be/VrBbOi6cJWs\">https://youtu.be/VrBbOi6cJWs</a></p><p>Korean&nbsp;Voice-Over&nbsp;Video:&nbsp;<a href=\"https://youtu.be/uSrPcfCU-mc\">https://youtu.be/uSrPcfCU-mc</a></p>', 'public/post-images/YH12b03Ob4b0k0dEdQlrB42CfCCKHu38sZlnQtBc.png', 1, 3, '2024-11-07 11:55:44', '2024-11-07 12:07:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `projects`
--

INSERT INTO `projects` (`id`, `slug`, `title`, `description`, `image`, `link`, `created_at`, `updated_at`) VALUES
(9, 'skkm-iti', 'SKKM - ITI', 'Sistem ini masih dalam status uji coba dan pengembangan. Belum siap untuk produksi. Satuan Kredit Kegiatan Mahasiswa (SKKM) merupakan kredit poin yang harus dipenuhi oleh mahasiswa ketika menempuh pendidikan di kampus Institut Teknologi Indonesia. Sistem ini ditujukan kepada mahasiswa untuk mengelola SKKM yang dimiliki dan PKA untuk memvalidasi SKKM.', 'public/project_images/j6UWvx5ZNiDF8o4FXkcl3pRGNrSQQUBZbfy4XlIw.png', 'https://jojo.tirtagt.xyz/skkm', '2024-10-29 06:35:58', '2024-11-07 11:09:26'),
(11, 'the-hash-man-2d-game-rpg', 'The Hash Man (2D Game RPG)', 'Game 2D RPG di build dengan Unity guna untuk kebutuhan Tugas Akhir Pemrograman Game. Jika anda berminat bisa memainkan link (web) dibawah ini', 'public/project_images/HUldWWqy8blfWDLcWAxSNbqXZXkpfrIeucoiPDOe.png', 'https://xeadesta.itch.io/the-hash-man', '2024-11-07 11:15:01', '2024-11-07 11:15:01'),
(12, 'ormawa-owltaku-iti', 'Ormawa Owltaku ITI', 'Owltaku sendiri adalah website sistem informasi untuk pendukung keaktifan organisasi owltaku dan juga sebagai pembantu pengelolaan keanggotaan, event, dan rekrut anggota baru owltaku.', 'public/project_images/nhLXgQW80nDrQtsznmScnaYUUOxGQGJ6pdNoJmAA.png', 'https://jojo.tirtagt.xyz/owl/', '2024-11-07 11:16:36', '2024-11-07 11:16:36'),
(13, 'top-up-gaming', 'Top Up Gaming', 'Website top up prototype untuk top up/isi saldo digital dalam games dan sebagai, pemenuhan untuk produk tugas akhir kewirausahaan', 'public/project_images/lLLrp8PJcGjQUxw51x70uZetYJb4R9I9TOk36B6D.png', 'https://jojo.tirtagt.xyz/topup', '2024-11-07 11:19:09', '2024-11-07 11:19:09'),
(14, 'tangan-catatan-keuangan', 'TANGAN - Catatan Keuangan', 'plikasi Tangan adalah aplikasi untuk mencatat keuangan sehari-hari dan bisa di rekap dalam bentuk .xlx', 'public/project_images/BqC20VkJXGCskXtbl6wmJTRLScSlPLjKpiZLaIjl.png', 'https://drive.google.com/file/d/13LwKtfNFYyhyD2kqLxMWqQx-Jw7pJ5uy/view', '2024-11-07 11:20:47', '2024-11-07 11:21:20'),
(15, 'gis-taman-terbuka', 'GIS TAMAN TERBUKA', 'ruang terbuka hijau (RTH) adalah area memanjang/jalur dan/atau mengelompok, yang penggunaannya lebih bersifat terbuka, tempat tumbuh tanaman, baik yang tumbuh alamiah maupun sengaja ditanam.', 'public/project_images/u4yb7AY0OsZkmLZtBo7nkwFMTOwtFltjKqf1nzpG.png', 'https://rth.ttgifiti.biz.id', '2024-11-07 11:37:53', '2024-11-07 11:37:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project_categories`
--

CREATE TABLE `project_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `project_categories`
--

INSERT INTO `project_categories` (`id`, `project_id`, `category_id`, `created_at`, `updated_at`) VALUES
(9, 9, 2, '2024-10-29 13:35:58', NULL),
(11, 11, 2, '2024-11-07 18:15:01', NULL),
(12, 11, 3, '2024-11-07 18:15:01', NULL),
(13, 12, 2, '2024-11-07 18:16:36', NULL),
(14, 13, 2, '2024-11-07 18:19:09', NULL),
(15, 14, 1, '2024-11-07 18:20:47', NULL),
(16, 15, 2, '2024-11-07 18:37:53', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MmE0VU0buZce0bx6g5IJW5nIvBa2vlqqAykT3CDV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaklkb1RWc0haYmN6UGV1aFlEb0NqTUVWWFdDVTdrWTBncVM3ZVBHcSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wb3N0L3Rlc3QiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1730116739);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jonathan Zefanya', 'jonathan.zefanya16@gmail.com', '2024-10-28 03:52:31', '$2y$12$9pAHHPD5GuqPXq8PzrSHxOIF7iBvPOFN0gSZ2pRScAuZw/UEKyrMi', 'aVAH0VaAZu5VsEcPgW6we6d5l9unKiCpYGoG32YleE4bIdfVd00CpzaYi3z5', '2024-10-28 03:52:31', '2024-10-28 03:52:31');

--
-- Indexes for dumped tables
--

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
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

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
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
