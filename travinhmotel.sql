-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 14, 2019 lúc 10:40 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `travinhmotel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `motel_id` int(10) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` int(11) NOT NULL DEFAULT '2',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `slug`, `kind`, `created_at`, `updated_at`) VALUES
(1, 'Nhà trọ sinh viên', 'nha-tro-sinh-vien', 2, '2018-10-27 17:00:00', NULL),
(2, 'Nhà cho thuê', 'nha-cho-thue-DeDTNUx9wL', 12, '2018-10-28 02:11:21', '2019-04-14 01:39:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `convenients`
--

CREATE TABLE `convenients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `convenients`
--

INSERT INTO `convenients` (`id`, `name`, `slug`, `kind`, `created_at`, `updated_at`) VALUES
(1, 'Gần trường đại học', 'gan-truong-dai-hoc-lAEiu1rwg9', 1, '2018-10-28 02:03:14', '2018-10-28 02:03:14'),
(2, 'Gần bệnh viện', 'gan-benh-vien-NeGHHZ6m1D', 1, '2018-10-28 02:03:24', '2018-10-28 02:03:24'),
(3, 'Wifi miễn phí', 'wifi-mien-phi-XVpCd6v7MS', 1, '2018-10-28 02:03:34', '2018-10-28 02:03:34'),
(4, 'Bao điện nước', 'bao-dien-nuoc-5X6dzUqkZL', 1, '2018-10-28 02:03:47', '2018-10-28 02:03:47'),
(5, 'Có gác lững', 'co-gac-lung-vaisUd45jo', 2, '2018-10-28 02:04:10', '2018-10-28 02:04:10'),
(6, 'Có bếp rộng', 'co-bep-rong-GOsFD3WbJd', 2, '2018-10-28 02:04:22', '2018-10-28 02:04:22'),
(7, 'Có thang cho người khuyết tật', 'co-thang-cho-nguoi-khuyet-tat-9SxO9YXkIx', 2, '2018-10-28 02:04:41', '2018-10-28 02:04:41'),
(8, 'Có camera an ninh', 'co-camera-an-ninh-LFZDTSGC9j', 1, '2018-10-28 02:05:09', '2018-10-28 02:05:09'),
(9, 'Khóa cổng lúc khuya', 'khoa-cong-luc-khuya-ccCexkAO1h', 1, '2018-10-28 02:05:19', '2018-10-28 02:05:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `province_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `districts`
--

INSERT INTO `districts` (`id`, `name`, `slug`, `province_id`, `created_at`, `updated_at`) VALUES
(10, 'Phường 1', 'phuong-1', 1, '2019-04-13 17:00:00', '2019-04-13 17:00:00'),
(11, 'Phường 2', 'phuong-2', 1, '2019-04-13 17:00:00', '2019-04-13 17:00:00'),
(12, 'Phường 3', 'phuong-3', 1, '2019-04-13 17:00:00', '2019-04-13 17:00:00'),
(13, 'Phường 4', 'phuong-4', 1, '2019-04-13 17:00:00', '2019-04-13 17:00:00'),
(14, 'Phường 6', 'phuong-6', 1, '2019-04-13 17:00:00', '2019-04-13 17:00:00'),
(15, 'Phường 5', 'phuong-5', 1, '2019-04-13 17:00:00', '2019-04-13 17:00:00'),
(16, 'Phường 7', 'phuong-7', 1, '2019-04-13 17:00:00', '2019-04-13 17:00:00'),
(17, 'Phường 8', 'phuong-8', 1, '2019-04-13 17:00:00', '2019-04-13 17:00:00'),
(18, 'Phường 9', 'phuong-9', 1, '2019-04-13 17:00:00', '2019-04-13 17:00:00'),
(19, 'Phường 10', 'phuong-10', 1, '2019-04-13 17:00:00', '2019-04-13 17:00:00'),
(20, 'Xã Tập Sơn', 'xa-tap-son', 2, '2019-04-13 17:00:00', '2019-04-13 17:00:00'),
(21, 'Xã Tân Sơn', 'xa-tan-son', 2, '2019-04-13 17:00:00', '2019-04-13 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(81, '2014_10_12_000000_create_users_table', 1),
(82, '2018_07_04_015654_create_categorys_table', 1),
(83, '2018_07_04_015923_create_provinces_table', 1),
(84, '2018_07_04_020008_create_districts_table', 1),
(85, '2018_07_04_020229_create_convenients_table', 1),
(86, '2018_07_04_020427_create_motels_table', 1),
(87, '2018_07_04_020455_create_posts_table', 1),
(88, '2018_07_04_020652_create_rooms_table', 1),
(89, '2018_07_04_020724_create_books_table', 1),
(90, '2018_07_04_020926_create_motel_convenients_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `motels`
--

CREATE TABLE `motels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `sale` double UNSIGNED NOT NULL DEFAULT '0',
  `room_total` int(10) UNSIGNED NOT NULL,
  `room_available` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `acreage` double UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '2',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `owner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `motel_convenients`
--

CREATE TABLE `motel_convenients` (
  `id` int(10) UNSIGNED NOT NULL,
  `motel_id` int(10) UNSIGNED NOT NULL,
  `convenient_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_image.png',
  `level` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `motel_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'TP. Trà Vinh', 'tp-tra-vinh-TiiEE5LSzL', '2018-10-27 19:07:55', '2018-10-27 19:07:55'),
(2, 'H. Trà Cú', 'h-tra-cu-BhQ12ro6CL', '2018-10-27 19:08:07', '2018-10-27 19:08:07'),
(3, 'H. Châu Thành', 'h-chau-thanh-JvIQnZQ3DJ', '2018-10-27 19:08:17', '2018-10-27 19:08:17'),
(4, 'H. Càng Long', 'h-cang-long-6zGc7zizqS', '2018-10-27 19:08:29', '2018-10-27 19:08:29'),
(5, 'H. Duyên Hải', 'h-duyen-hai-EBML9OnNr4', '2018-10-27 19:08:38', '2018-10-27 19:08:38'),
(6, 'H. Cầu Ngang', 'h-cau-ngang-HC1iVtrfRr', '2018-10-27 19:08:49', '2018-10-27 19:08:49'),
(7, 'H. Tiểu Cần', 'h-tieu-can-YYRCdsrdKG', '2018-10-27 19:08:58', '2018-10-27 19:08:58'),
(8, 'H. Cầu Kè', 'h-cau-ke-IUBsu3Q2Af', '2018-10-27 19:09:07', '2018-10-27 19:09:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `acreage` double UNSIGNED NOT NULL,
  `motel_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` int(11) NOT NULL DEFAULT '1',
  `birthday` date NOT NULL DEFAULT '1997-02-01',
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(10) UNSIGNED NOT NULL DEFAULT '2',
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `image`, `email`, `phone`, `sex`, `birthday`, `address`, `level`, `provider`, `provider_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Xuân Hồng Kim', 'https://lh5.googleusercontent.com/-pGOpLnTm4ls/AAAAAAAAAAI/AAAAAAAAAFo/fQ4RB5dkjH0/photo.jpg?sz=50', '110115021@sv.tvu.edu.vn', '', 1, '1997-02-01', '', 2, 'google', '110493206421175956440', 'Y5ZXfzrSdiEUIDO3rskn9HUhi5M5ctiBrWQlUztEdMbZSSn5qjAGGiOaeBr0', '2018-10-29 20:17:11', '2018-10-29 20:17:11'),
(6, 'Xuân Hồng Kim', 'https://lh5.googleusercontent.com/-OftzxxmBpq8/AAAAAAAAAAI/AAAAAAAAAG8/nTck7pazgHE/photo.jpg?sz=50', 'xuanhongkim@gmail.com', '', 1, '1997-02-01', '', 1, 'google', '103070866235294463845', 'GWdlSs0me6amJ0ZKXG6y4I4Jixd4alxvjqdsLtAGkeWCO3ZzKNC25acCT4i1', '2018-10-30 23:25:45', '2018-10-30 23:25:45');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_user_id_foreign` (`user_id`),
  ADD KEY `books_motel_id_foreign` (`motel_id`);

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `convenients`
--
ALTER TABLE `convenients`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_province_id_foreign` (`province_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `motels`
--
ALTER TABLE `motels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `motels_district_id_foreign` (`district_id`),
  ADD KEY `motels_category_id_foreign` (`category_id`),
  ADD KEY `motels_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `motel_convenients`
--
ALTER TABLE `motel_convenients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `motel_convenients_motel_id_foreign` (`motel_id`),
  ADD KEY `motel_convenients_convenient_id_foreign` (`convenient_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_motel_id_foreign` (`motel_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_motel_id_foreign` (`motel_id`),
  ADD KEY `rooms_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `convenients`
--
ALTER TABLE `convenients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT cho bảng `motels`
--
ALTER TABLE `motels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `motel_convenients`
--
ALTER TABLE `motel_convenients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_motel_id_foreign` FOREIGN KEY (`motel_id`) REFERENCES `motels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`);

--
-- Các ràng buộc cho bảng `motels`
--
ALTER TABLE `motels`
  ADD CONSTRAINT `motels_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`),
  ADD CONSTRAINT `motels_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `motels_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `motel_convenients`
--
ALTER TABLE `motel_convenients`
  ADD CONSTRAINT `motel_convenients_convenient_id_foreign` FOREIGN KEY (`convenient_id`) REFERENCES `convenients` (`id`),
  ADD CONSTRAINT `motel_convenients_motel_id_foreign` FOREIGN KEY (`motel_id`) REFERENCES `motels` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_motel_id_foreign` FOREIGN KEY (`motel_id`) REFERENCES `motels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`),
  ADD CONSTRAINT `rooms_motel_id_foreign` FOREIGN KEY (`motel_id`) REFERENCES `motels` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
