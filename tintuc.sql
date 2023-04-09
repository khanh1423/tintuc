-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 09, 2023 lúc 02:30 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tintuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `status`, `parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Tin Hot', 'tin-hot', 1, 0, '2023-02-27 08:10:37', '2023-02-27 08:10:37'),
(3, 'Tin mới', 'tin-moi', 1, 0, '2023-02-28 08:48:10', '2023-02-28 08:48:10'),
(4, 'Tin chuẩn', 'tin-chuan', 0, 3, '2023-02-28 08:51:04', '2023-02-28 08:51:04'),
(5, 'Tin mới nhất', 'tin-moi-nhat', 1, 4, '2023-02-28 08:52:32', '2023-02-28 08:52:32'),
(6, 'Tin hot nhất', 'tin-hot-nhat', 1, 2, '2023-02-28 08:53:26', '2023-02-28 08:53:26'),
(7, 'Tin chưa chuẩn', 'tin-chua-chuan', 0, 4, '2023-02-28 08:56:41', '2023-02-28 08:56:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(22, '2014_10_12_000000_create_users_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(25, '2023_02_16_031701_create_category_table', 1),
(26, '2023_02_16_031709_create_new_table', 1),
(27, '2023_02_16_031717_create_feedback_table', 1),
(28, '2023_02_16_031725_create_role_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new`
--

CREATE TABLE `new` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foot` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `hot` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `new`
--

INSERT INTO `new` (`id`, `title`, `author`, `intro`, `content`, `foot`, `image`, `slug`, `status`, `hot`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Baizhu là một nhân vật được các fan rất mong chờ bởi anh ta đã được hé lộ từ rất lâu trước đây.', 'Trần Luân', '<p>Trong Genshin Impact, khi một nh&acirc;n vật xuất hiện trong c&aacute;c nhiệm vụ Ma Thần hay nhiệm vụ Truyền Thuyết với thiết kế đặc biệt, người chơi sẽ ngay lập tức cho rằng đ&acirc;y sẽ l&agrave; nh&acirc;n vật chơi được xuất hiện trong tương lai. N&oacute; đ&atilde; l&agrave; một xu hướng xuất hiện trong v&agrave;i phi&ecirc;n bản trở lại đ&acirc;y của Genshin Impact v&agrave; được mọi người chơi ng&oacute;ng chờ.&nbsp;</p>', '<p>Tuy nhi&ecirc;n, nh&acirc;n vật Baizhu lại kh&ocirc;ng đi theo xu hướng n&agrave;y. Anh ta đ&atilde; xuất hiện rất l&acirc;u trước đ&acirc;y, từ tận nhiệm vụ Ma Thần Liyue. Thế nhưng, đ&atilde; hơn 2 năm nay, Baizhu chưa hề được đưa v&agrave;o game ch&iacute;nh thức. Phải đến tận thời điểm hiện tại, sau khi Genshin Impact ch&iacute;nh thức ra mắt nh&acirc;n vật hệ Thảo, Baizhu mới được c&ocirc;ng bố sẽ xuất hiện trong phi&ecirc;n bản 3.6 sắp tới.&nbsp;</p>\r\n\r\n<p><a href=\"https://gamek.mediacdn.vn/133514250583805952/2023/2/27/photo-1677469538039-1677469538541498584612-1677488074781-1677488074844122773363-1677491958010-1677491958537866065194.png\" target=\"_blank\"><img alt=\"photo-1677469538039\" src=\"https://gamek.mediacdn.vn/133514250583805952/2023/2/27/photo-1677469538039-1677469538541498584612-1677488074781-1677488074844122773363-1677491958010-1677491958537866065194.png\" /></a></p>\r\n\r\n<p>Mới đ&acirc;y, HoYoverse đ&atilde; ch&iacute;nh thức đăng tải những h&igrave;nh ảnh đầu ti&ecirc;n về Baizhu sau khi phi&ecirc;n bản Sumeru ra mắt. Theo c&aacute;c th&ocirc;ng tin r&ograve; rỉ cho biết, Baizhu sẽ l&agrave; nh&acirc;n vật 5 sao sử dụng ph&aacute;p kh&iacute; v&agrave; thuộc hệ Thảo.&nbsp;</p>', '<p>D&ugrave; vậy, c&aacute;c th&ocirc;ng tin c&ograve;n lại về Baizhu vẫn chưa được c&ocirc;ng bố ch&iacute;nh thức. Theo những g&igrave; được c&ocirc;ng bố, người chơi chỉ được biết rằng Baizhu l&agrave; vị chủ nh&acirc;n của nh&agrave; thuốc Bubu. Tất cả mọi thứ c&ograve;n lại cho tới thời điểm hiện tại, chẳng hạn như bộ kỹ năng, lai lịch cụ thể hay mối quan hệ của Baizhu với c&aacute;c nh&acirc;n vật kh&aacute;c tại Liyue, vẫn c&ograve;n l&agrave; một dấu hỏi.&nbsp;</p>', 'meme anya.jpg', 'baizhu-la-mot-nhan-vat-duoc-cac-fan-rat-mong-cho-boi-anh-ta-da-duoc-he-lo-tu-rat-lau-truoc-day', 1, 0, 2, '2023-03-01 11:09:46', '2023-03-01 11:09:46'),
(2, 'Có gì để game thủ ngóng chờ trong Genshin Impact phiên bản 3.5?', 'Luân Trần', '<p>1 Genshin Impact 3.5 sẽ giới thiệu lễ hội m&ugrave;a xu&acirc;n tại Mondstadt, ra mắt c&aacute;c nh&acirc;n vật mới Dehya v&agrave; Mika, đồng thời tiếp tục c&acirc;u chuyện về cặp song sinh của Nh&agrave; Lữ H&agrave;nh.</p>', '<p>1 V&agrave;o cuối tuần qua, HoYoverse đ&atilde; ch&iacute;nh thức giới thiệu những h&igrave;nh ảnh đầu ti&ecirc;n về Genshin Impact phi&ecirc;n bản 3.5&nbsp; c&oacute; t&ecirc;n gọi &#39;Hơi Thở Hoa Gi&oacute;&#39;. The đ&oacute;, phi&ecirc;n bản 3.5 sẽ giới thiệu tới người chơi về Lễ Hội Hoa Gi&oacute;, c&ugrave;ng với đ&oacute; l&agrave; mở ra h&agrave;nh tr&igrave;nh mạo hiểm mới tiến s&acirc;u v&agrave;o Gi&aacute;o Đo&agrave;n Vực S&acirc;u. B&ecirc;n cạnh đ&oacute;, hai nh&acirc;n vật l&agrave; Dehya v&agrave; Mika cũng đ&atilde; ch&iacute;nh thức được giới thiệu tới game thủ trong phi&ecirc;n bản lần n&agrave;y. Vẫn giữ nguy&ecirc;n truyền thống trước đ&acirc;y, cứ tới m&ugrave;a xu&acirc;n, th&agrave;nh Mondstadt lại tổ chức lễ hội. Tại sự kiện &#39;Lễ&nbsp;Hội Hoa Gi&oacute;&#39; lần n&agrave;y, ngươi chơi được giới thiệu l&agrave; sẽ c&oacute;&nbsp;nhiều thử&nbsp;th&aacute;ch, phần thưởng v&agrave;&nbsp;đo&agrave;n tụ&nbsp;li&ecirc;n quan tới chủ đề&nbsp;t&igrave;nh y&ecirc;u v&agrave; sự&nbsp;tự&nbsp;do.&nbsp;</p>', '<p>1 Một số&nbsp;tr&ograve; chơi như&nbsp;tr&ograve; chơi &acirc;m nhạc &#39;B&agrave;i Ca Của Gi&oacute;&#39; sẽ được mở lại. B&ecirc;n cạnh đ&oacute;, c&aacute;c thử th&aacute;ch mới như tr&ograve; chơi rượt&nbsp;đuổi trong m&ecirc; cung &#39;Mu&ocirc;n Gi&oacute; Ngh&ecirc;nh Hoa&#39;, v&agrave; c&aacute;ch chơi chụp&nbsp;ảnh &#39;Chụp&nbsp;Ảnh Trong Gi&oacute;&#39; cũng sẽ&nbsp;mở. Lễ&nbsp;hội cũng ch&agrave;o&nbsp;đ&oacute;n những vị&nbsp;kh&aacute;ch&nbsp;đến từ&nbsp;Sumeru xa x&ocirc;i. Khi Collei quay trở&nbsp;lại Mondstadt c&ugrave;ng với Tighnari v&agrave; Cyno, chuyến mạo hiểm bắt nguồn một lời ti&ecirc;n tri thần b&iacute; cũng sẽ&nbsp;bắt&nbsp;đầu.</p>', 'aa.jpeg', 'co-gi-de-game-thu-ngong-cho-trong-genshin-impact-phien-ban-35', 1, 1, 6, '2023-03-01 11:32:46', '2023-03-05 06:26:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `level` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `status`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Luân Trần', 'luantran04555@gmail.com', NULL, '$2y$10$Vdt7B6o20wzTVqZctTvaYumui0Kt.tLvfX3qXub1rR3whatW0vYtC', '0349394368', 1, 1, NULL, '2023-03-15 08:22:10', '2023-03-15 08:22:10'),
(3, 'Trần Luân', 'tranluan04555@gmail.com', NULL, '$2y$10$N.6pVyiOIM7s6DTkTXgvdOdY54.T9.UarsrigSm2h57DFYslf/xWu', '0987661703', 1, 1, NULL, '2023-03-15 09:46:52', '2023-03-15 09:46:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `new`
--
ALTER TABLE `new`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name_unique` (`name`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `new`
--
ALTER TABLE `new`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `new`
--
ALTER TABLE `new`
  ADD CONSTRAINT `new_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
