-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2018 lúc 10:35 AM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltietcuoi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_08_31_030500_tb_chucvu', 1),
(2, '2014_10_12_000000_create_users_table', 2),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2018_08_31_031640_tb_theloai', 3),
(5, '2018_08_31_031821_tb_baiviet', 4),
(6, '2018_09_01_070028_tb_goi', 4),
(7, '2018_09_03_094717_tb_phanloai_dv', 5),
(8, '2018_09_03_095212_tb_dichvu', 6),
(9, '2018_09_01_071648_tb_hoadon', 7),
(10, '2018_09_01_073553_tb_infosystem', 7),
(11, '2018_09_01_071839_tb_cthoadon', 8),
(13, '2018_09_03_095515_tb_goi_dichvu', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_baiviet`
--

CREATE TABLE `tb_baiviet` (
  `id_baiviet` int(10) UNSIGNED NOT NULL,
  `tieude` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_theloai` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_baiviet`
--

INSERT INTO `tb_baiviet` (`id_baiviet`, `tieude`, `noidung`, `id_user`, `id_theloai`, `created_at`, `updated_at`) VALUES
(3, 'Tiêu đề bài viế thư 2', '<p>Ph&iacute;a tr&ecirc;n l&agrave; c&aacute;c h&agrave;m kiểm tra dữ liệu th&ocirc;ng dụng. Trong b&agrave;i viết n&agrave;y chưa c&oacute; nhiều nhưng t&ocirc;i nghĩ bấy nhi&ecirc;u cũng đủ cho c&aacute;c bạn mới học nắm bắt v&agrave; sử dụng, c&aacute;c bạn chỉ cần biết đến b&agrave;i n&agrave;y v&agrave; sau n&agrave;y c&aacute;c bạn l&agrave;m nếu t&ocirc;i c&oacute; sử dụng một h&agrave;m n&agrave;o đ&oacute; th&igrave; biết đường t&igrave;m đến b&agrave;i n&agrave;y m&agrave; đọc lại nh&eacute;. B&agrave;i tiếp theo ch&uacute;ng ta sẽ t&igrave;m hiểu Session v&agrave; Cookie trong php.</p>\r\n\r\n<p>lol</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>asdasd</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>asdasd</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&aacute;dasd</td>\r\n			<td>asd</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 4, 15, '2018-09-09 22:08:57', '2018-09-10 19:17:48'),
(4, 'Tiêu đề bài viế thư 3', '<p>Ph&iacute;a tr&ecirc;n l&agrave; c&aacute;c h&agrave;m kiểm tra dữ liệu th&ocirc;ng dụng. Trong b&agrave;i viết n&agrave;y chưa c&oacute; nhiều nhưng t&ocirc;i nghĩ bấy nhi&ecirc;u cũng đủ cho c&aacute;c bạn mới học nắm bắt v&agrave; sử dụng, c&aacute;c bạn chỉ cần biết đến b&agrave;i n&agrave;y v&agrave; sau n&agrave;y c&aacute;c bạn l&agrave;m nếu t&ocirc;i c&oacute; sử dụng một h&agrave;m n&agrave;o đ&oacute; th&igrave; biết đường t&igrave;m đến b&agrave;i n&agrave;y m&agrave; đọc lại nh&eacute;. B&agrave;i tiếp theo ch&uacute;ng ta sẽ t&igrave;m hiểu Session v&agrave; Cookie trong php.</p>\r\n\r\n<p>lol</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>asdasd</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>asdasd</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&aacute;dasd</td>\r\n			<td>asd</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 4, 15, '2018-09-09 22:08:57', '2018-09-10 19:17:48'),
(5, 'Tiêu đề bài viế thư 4', '<p>Ph&iacute;a tr&ecirc;n l&agrave; c&aacute;c h&agrave;m kiểm tra dữ liệu th&ocirc;ng dụng. Trong b&agrave;i viết n&agrave;y chưa c&oacute; nhiều nhưng t&ocirc;i nghĩ bấy nhi&ecirc;u cũng đủ cho c&aacute;c bạn mới học nắm bắt v&agrave; sử dụng, c&aacute;c bạn chỉ cần biết đến b&agrave;i n&agrave;y v&agrave; sau n&agrave;y c&aacute;c bạn l&agrave;m nếu t&ocirc;i c&oacute; sử dụng một h&agrave;m n&agrave;o đ&oacute; th&igrave; biết đường t&igrave;m đến b&agrave;i n&agrave;y m&agrave; đọc lại nh&eacute;. B&agrave;i tiếp theo ch&uacute;ng ta sẽ t&igrave;m hiểu Session v&agrave; Cookie trong php.</p>\r\n\r\n<p>lol</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>asdasd</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>asdasd</td>\r\n		</tr>\r\n		<tr>\r\n			<td>&aacute;dasd</td>\r\n			<td>asd</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', 4, 15, '2018-09-09 22:08:57', '2018-09-10 19:17:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_chucvu`
--

CREATE TABLE `tb_chucvu` (
  `id_chucvu` int(10) UNSIGNED NOT NULL,
  `tenchucvu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_chucvu`
--

INSERT INTO `tb_chucvu` (`id_chucvu`, `tenchucvu`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2018-09-04 17:00:00', '2018-09-04 17:00:00'),
(2, 'Mod', '2018-09-04 17:00:00', '2018-09-04 17:00:00'),
(3, 'Thành viên', '2018-09-04 17:00:00', '2018-09-04 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_cthoadon`
--

CREATE TABLE `tb_cthoadon` (
  `id_cthd` int(10) UNSIGNED NOT NULL,
  `sobantiet` int(11) NOT NULL,
  `id_hoadon` int(10) UNSIGNED NOT NULL,
  `ngaytochuc` datetime NOT NULL,
  `diadiemtochuc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_cthoadon`
--

INSERT INTO `tb_cthoadon` (`id_cthd`, `sobantiet`, `id_hoadon`, `ngaytochuc`, `diadiemtochuc`, `mota`, `created_at`, `updated_at`) VALUES
(1, 51, 1, '2018-10-21 07:50:16', 'fdgdf gdfg', 'sdf sdf sdf', '2018-10-18 01:37:32', '2018-10-18 01:37:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_dichvu`
--

CREATE TABLE `tb_dichvu` (
  `id_dichvu` int(10) UNSIGNED NOT NULL,
  `tendichvu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `demo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `giatien` double(8,2) NOT NULL,
  `id_loaidv` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_dichvu`
--

INSERT INTO `tb_dichvu` (`id_dichvu`, `tendichvu`, `mota`, `demo`, `giatien`, `id_loaidv`, `created_at`, `updated_at`) VALUES
(1, 'Cơm chiên', 'Phía trên là các hàm kiểm tra dữ liệu thông dụng. Trong bài viết này chưa có nhiều nhưng tôi nghĩ bấy nhiêu cũng đủ cho các bạn mới học nắm bắt và sử dụng, các bạn chỉ cần biết đến bài này và sau này các bạn làm nếu tôi có sử dụng một hàm nào đó thì biết ', 'upload/Screenshot from 2018-09-08 18-51-05.png', 50000.00, 1, '2018-09-09 09:57:50', '2018-09-09 10:08:38'),
(5, 'Bánh canh chả cá', 'Bánh canh chả cá đặt sản bình định', 'upload/43604449_271276053511545_6892720553510043648_n.jpg', 10000.00, 1, '2018-10-16 05:18:14', '2018-10-16 05:18:14'),
(6, 'Bánh mì ốp la', 'Bánh mì ốp la', 'upload/3b5f547ace08f71078b2591890b84e7a0acf12e2b23ae76109c134cdb6feb6bb.jpg', 15000.00, 1, '2018-10-16 05:19:13', '2018-10-16 05:19:13'),
(7, 'Hủ tiếu bò viên', 'Hủ tiếu bò viên', 'upload/242ef74d51c5a08f25b250a9ed1bb194141734d18e69e9ff88e2a123e99e2b17.jpg', 20000.00, 1, '2018-10-16 05:19:52', '2018-10-16 05:19:52'),
(8, 'Hột vịt lộn', 'Hột vịt lộn', 'upload/ccfbd85496c5fda2307e60eb9617a22d5918509e2e34aa976db39f643fb35513.jpg', 50000.00, 1, '2018-10-16 05:20:30', '2018-10-16 05:20:30'),
(9, 'Bia tiger', 'Bia tiger', 'upload/4437b5a41207a8792a0b995b6db02ed2e85c6b64928d0488cf62ae1917ccace8.jpg', 200000.00, 2, '2018-10-16 05:21:26', '2018-10-16 05:21:26'),
(10, 'Bia sài gòn', 'Bia sài gòn', 'upload/3115fa704830a61c136787e74da31935d3897d30109e3d317447a7561ca409e4.jpg', 220000.00, 2, '2018-10-16 05:21:50', '2018-10-16 05:21:50'),
(11, 'Rượu đế', 'Rượu đế', 'upload/3115fa704830a61c136787e74da31935d3897d30109e3d317447a7561ca409e4.jpg', 12000.00, 2, '2018-10-16 05:22:23', '2018-10-16 05:22:23'),
(12, 'Cave cao cấp', 'Miễn phí', 'upload/57a90f997358c94205e7f41b139bfe4011ea6dd47b22a190ae65f48eed7a9ef2.jpg', 100000.00, 3, '2018-10-16 05:23:19', '2018-10-16 05:23:19'),
(13, 'ádasdasdasd', 'asd asd asd asd ád', 'upload/Capture.PNG', 12000.00, 1, '2018-10-17 16:57:55', '2018-10-17 16:57:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_goi`
--

CREATE TABLE `tb_goi` (
  `id_goi` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_goi`
--

INSERT INTO `tb_goi` (`id_goi`, `id_user`, `created_at`, `updated_at`) VALUES
(15, 4, '2018-10-17 16:40:39', '2018-10-17 16:40:39'),
(16, 4, '2018-10-18 00:55:58', '2018-10-18 00:55:58'),
(17, 4, '2018-10-18 00:56:46', '2018-10-18 00:56:46'),
(18, 4, '2018-10-18 01:00:44', '2018-10-18 01:00:44'),
(19, 4, '2018-10-18 01:01:30', '2018-10-18 01:01:30'),
(20, 4, '2018-10-18 01:03:59', '2018-10-18 01:03:59'),
(21, 4, '2018-10-18 01:04:37', '2018-10-18 01:04:37'),
(22, 4, '2018-10-18 01:05:33', '2018-10-18 01:05:33'),
(23, 4, '2018-10-18 01:14:27', '2018-10-18 01:14:27'),
(24, 4, '2018-10-18 01:15:19', '2018-10-18 01:15:19'),
(25, 4, '2018-10-18 01:15:56', '2018-10-18 01:15:56'),
(26, 4, '2018-10-18 01:18:43', '2018-10-18 01:18:43'),
(27, 4, '2018-10-18 01:19:35', '2018-10-18 01:19:35'),
(28, 4, '2018-10-18 01:20:16', '2018-10-18 01:20:16'),
(29, 4, '2018-10-18 01:26:34', '2018-10-18 01:26:34'),
(30, 4, '2018-10-18 01:27:12', '2018-10-18 01:27:12'),
(31, 4, '2018-10-18 01:29:32', '2018-10-18 01:29:32'),
(32, 4, '2018-10-18 01:30:14', '2018-10-18 01:30:14'),
(33, 4, '2018-10-18 01:31:26', '2018-10-18 01:31:26'),
(34, 4, '2018-10-18 01:32:00', '2018-10-18 01:32:00'),
(35, 4, '2018-10-18 01:32:29', '2018-10-18 01:32:29'),
(36, 4, '2018-10-18 01:33:45', '2018-10-18 01:33:45'),
(37, 4, '2018-10-18 01:35:20', '2018-10-18 01:35:20'),
(38, 4, '2018-10-18 01:36:06', '2018-10-18 01:36:06'),
(39, 4, '2018-10-18 01:37:31', '2018-10-18 01:37:31'),
(40, 4, '2018-10-18 16:44:52', '2018-10-18 16:44:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_goi_dichvu`
--

CREATE TABLE `tb_goi_dichvu` (
  `id_goi` int(10) UNSIGNED NOT NULL,
  `id_dichvu` int(10) UNSIGNED NOT NULL,
  `soluong` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_goi_dichvu`
--

INSERT INTO `tb_goi_dichvu` (`id_goi`, `id_dichvu`, `soluong`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2018-10-16 05:23:50', '2018-10-16 05:23:50'),
(1, 6, 1, '2018-10-16 05:23:51', '2018-10-16 05:23:51'),
(1, 1, 1, '2018-10-16 05:23:51', '2018-10-16 05:23:51'),
(1, 8, 1, '2018-10-16 05:23:51', '2018-10-16 05:23:51'),
(1, 11, 1, '2018-10-16 05:23:51', '2018-10-16 05:23:51'),
(1, 9, 1, '2018-10-16 05:23:51', '2018-10-16 05:23:51'),
(1, 12, 1, '2018-10-16 05:23:51', '2018-10-16 05:23:51'),
(2, 1, 1, '2018-10-16 05:50:00', '2018-10-16 05:50:00'),
(2, 5, 1, '2018-10-16 05:50:00', '2018-10-16 05:50:00'),
(2, 6, 1, '2018-10-16 05:50:00', '2018-10-16 05:50:00'),
(2, 7, 1, '2018-10-16 05:50:01', '2018-10-16 05:50:01'),
(2, 12, 1, '2018-10-16 05:50:01', '2018-10-16 05:50:01'),
(3, 1, 1, '2018-10-16 05:50:53', '2018-10-16 05:50:53'),
(3, 5, 1, '2018-10-16 05:50:53', '2018-10-16 05:50:53'),
(3, 6, 1, '2018-10-16 05:50:53', '2018-10-16 05:50:53'),
(3, 8, 1, '2018-10-16 05:50:53', '2018-10-16 05:50:53'),
(4, 8, 1, '2018-10-16 06:53:12', '2018-10-16 06:53:12'),
(4, 7, 1, '2018-10-16 06:53:12', '2018-10-16 06:53:12'),
(4, 5, 1, '2018-10-16 06:53:13', '2018-10-16 06:53:13'),
(4, 1, 1, '2018-10-16 06:53:13', '2018-10-16 06:53:13'),
(4, 6, 1, '2018-10-16 06:53:13', '2018-10-16 06:53:13'),
(4, 9, 100, '2018-10-16 06:53:13', '2018-10-16 06:53:13'),
(4, 11, 100, '2018-10-16 06:53:13', '2018-10-16 06:53:13'),
(4, 10, 100, '2018-10-16 06:53:13', '2018-10-16 06:53:13'),
(4, 12, 1, '2018-10-16 06:53:13', '2018-10-16 06:53:13'),
(5, 1, 1, '2018-10-16 07:02:26', '2018-10-16 07:02:26'),
(5, 5, 1, '2018-10-16 07:02:26', '2018-10-16 07:02:26'),
(5, 6, 1, '2018-10-16 07:02:26', '2018-10-16 07:02:26'),
(5, 9, 100, '2018-10-16 07:02:26', '2018-10-16 07:02:26'),
(6, 1, 1, '2018-10-16 07:12:17', '2018-10-16 07:12:17'),
(6, 5, 1, '2018-10-16 07:12:17', '2018-10-16 07:12:17'),
(6, 6, 1, '2018-10-16 07:12:17', '2018-10-16 07:12:17'),
(6, 7, 1, '2018-10-16 07:12:17', '2018-10-16 07:12:17'),
(6, 9, 10, '2018-10-16 07:12:17', '2018-10-16 07:12:17'),
(6, 10, 1, '2018-10-16 07:12:17', '2018-10-16 07:12:17'),
(7, 1, 1, '2018-10-16 07:20:56', '2018-10-16 07:20:56'),
(7, 5, 1, '2018-10-16 07:20:56', '2018-10-16 07:20:56'),
(7, 6, 1, '2018-10-16 07:20:56', '2018-10-16 07:20:56'),
(7, 10, 10, '2018-10-16 07:20:56', '2018-10-16 07:20:56'),
(7, 11, 1, '2018-10-16 07:20:56', '2018-10-16 07:20:56'),
(7, 12, 1, '2018-10-16 07:20:56', '2018-10-16 07:20:56'),
(8, 6, 1, '2018-10-17 07:49:05', '2018-10-17 07:49:05'),
(8, 1, 1, '2018-10-17 07:49:05', '2018-10-17 07:49:05'),
(8, 8, 1, '2018-10-17 07:49:05', '2018-10-17 07:49:05'),
(8, 7, 1, '2018-10-17 07:49:05', '2018-10-17 07:49:05'),
(8, 11, 100, '2018-10-17 07:49:05', '2018-10-17 07:49:05'),
(8, 9, 10, '2018-10-17 07:49:05', '2018-10-17 07:49:05'),
(8, 12, 1, '2018-10-17 07:49:05', '2018-10-17 07:49:05'),
(9, 1, 1, '2018-10-17 08:14:41', '2018-10-17 08:14:41'),
(9, 5, 1, '2018-10-17 08:14:41', '2018-10-17 08:14:41'),
(9, 6, 1, '2018-10-17 08:14:41', '2018-10-17 08:14:41'),
(9, 9, 1, '2018-10-17 08:14:41', '2018-10-17 08:14:41'),
(9, 10, 1, '2018-10-17 08:14:41', '2018-10-17 08:14:41'),
(9, 12, 1, '2018-10-17 08:14:42', '2018-10-17 08:14:42'),
(10, 1, 1, '2018-10-17 08:35:14', '2018-10-17 08:35:14'),
(10, 5, 1, '2018-10-17 08:35:14', '2018-10-17 08:35:14'),
(10, 6, 1, '2018-10-17 08:35:15', '2018-10-17 08:35:15'),
(10, 9, 1, '2018-10-17 08:35:15', '2018-10-17 08:35:15'),
(10, 10, 1, '2018-10-17 08:35:15', '2018-10-17 08:35:15'),
(10, 12, 1, '2018-10-17 08:35:15', '2018-10-17 08:35:15'),
(11, 1, 1, '2018-10-17 08:35:56', '2018-10-17 08:35:56'),
(11, 5, 1, '2018-10-17 08:35:56', '2018-10-17 08:35:56'),
(11, 6, 1, '2018-10-17 08:35:57', '2018-10-17 08:35:57'),
(11, 9, 1, '2018-10-17 08:35:57', '2018-10-17 08:35:57'),
(11, 10, 1, '2018-10-17 08:35:57', '2018-10-17 08:35:57'),
(11, 12, 1, '2018-10-17 08:35:57', '2018-10-17 08:35:57'),
(12, 1, 1, '2018-10-17 08:36:44', '2018-10-17 08:36:44'),
(12, 5, 1, '2018-10-17 08:36:44', '2018-10-17 08:36:44'),
(12, 6, 1, '2018-10-17 08:36:44', '2018-10-17 08:36:44'),
(12, 9, 1, '2018-10-17 08:36:44', '2018-10-17 08:36:44'),
(12, 10, 1, '2018-10-17 08:36:44', '2018-10-17 08:36:44'),
(12, 12, 1, '2018-10-17 08:36:44', '2018-10-17 08:36:44'),
(13, 8, 1, '2018-10-17 16:25:41', '2018-10-17 16:25:41'),
(13, 7, 1, '2018-10-17 16:25:41', '2018-10-17 16:25:41'),
(13, 5, 1, '2018-10-17 16:25:41', '2018-10-17 16:25:41'),
(13, 1, 1, '2018-10-17 16:25:41', '2018-10-17 16:25:41'),
(13, 6, 1, '2018-10-17 16:25:41', '2018-10-17 16:25:41'),
(13, 9, 100, '2018-10-17 16:25:41', '2018-10-17 16:25:41'),
(13, 11, 20, '2018-10-17 16:25:41', '2018-10-17 16:25:41'),
(13, 10, 100, '2018-10-17 16:25:41', '2018-10-17 16:25:41'),
(13, 12, 1, '2018-10-17 16:25:41', '2018-10-17 16:25:41'),
(14, 1, 1, '2018-10-17 16:38:51', '2018-10-17 16:38:51'),
(14, 5, 1, '2018-10-17 16:38:51', '2018-10-17 16:38:51'),
(14, 6, 1, '2018-10-17 16:38:51', '2018-10-17 16:38:51'),
(14, 7, 1, '2018-10-17 16:38:51', '2018-10-17 16:38:51'),
(14, 8, 1, '2018-10-17 16:38:51', '2018-10-17 16:38:51'),
(14, 9, 22, '2018-10-17 16:38:51', '2018-10-17 16:38:51'),
(14, 12, 1, '2018-10-17 16:38:51', '2018-10-17 16:38:51'),
(15, 1, 1, '2018-10-17 16:40:40', '2018-10-17 16:40:40'),
(15, 5, 1, '2018-10-17 16:40:40', '2018-10-17 16:40:40'),
(15, 7, 1, '2018-10-17 16:40:40', '2018-10-17 16:40:40'),
(15, 8, 1, '2018-10-17 16:40:40', '2018-10-17 16:40:40'),
(15, 6, 1, '2018-10-17 16:40:40', '2018-10-17 16:40:40'),
(15, 10, 30, '2018-10-17 16:40:40', '2018-10-17 16:40:40'),
(15, 12, 1, '2018-10-17 16:40:40', '2018-10-17 16:40:40'),
(16, 1, 1, '2018-10-18 00:55:59', '2018-10-18 00:55:59'),
(16, 5, 1, '2018-10-18 00:55:59', '2018-10-18 00:55:59'),
(16, 7, 1, '2018-10-18 00:55:59', '2018-10-18 00:55:59'),
(16, 8, 1, '2018-10-18 00:55:59', '2018-10-18 00:55:59'),
(16, 6, 1, '2018-10-18 00:55:59', '2018-10-18 00:55:59'),
(16, 10, 30, '2018-10-18 00:55:59', '2018-10-18 00:55:59'),
(16, 12, 1, '2018-10-18 00:55:59', '2018-10-18 00:55:59'),
(17, 1, 1, '2018-10-18 00:56:46', '2018-10-18 00:56:46'),
(17, 5, 1, '2018-10-18 00:56:48', '2018-10-18 00:56:48'),
(17, 7, 1, '2018-10-18 00:56:48', '2018-10-18 00:56:48'),
(17, 8, 1, '2018-10-18 00:56:48', '2018-10-18 00:56:48'),
(17, 6, 1, '2018-10-18 00:56:49', '2018-10-18 00:56:49'),
(17, 10, 30, '2018-10-18 00:56:49', '2018-10-18 00:56:49'),
(17, 12, 1, '2018-10-18 00:56:49', '2018-10-18 00:56:49'),
(18, 1, 1, '2018-10-18 01:00:44', '2018-10-18 01:00:44'),
(18, 5, 1, '2018-10-18 01:00:44', '2018-10-18 01:00:44'),
(18, 7, 1, '2018-10-18 01:00:44', '2018-10-18 01:00:44'),
(18, 8, 1, '2018-10-18 01:00:44', '2018-10-18 01:00:44'),
(18, 6, 1, '2018-10-18 01:00:44', '2018-10-18 01:00:44'),
(18, 10, 30, '2018-10-18 01:00:44', '2018-10-18 01:00:44'),
(18, 12, 1, '2018-10-18 01:00:44', '2018-10-18 01:00:44'),
(19, 1, 1, '2018-10-18 01:01:30', '2018-10-18 01:01:30'),
(19, 5, 1, '2018-10-18 01:01:30', '2018-10-18 01:01:30'),
(19, 7, 1, '2018-10-18 01:01:30', '2018-10-18 01:01:30'),
(19, 8, 1, '2018-10-18 01:01:30', '2018-10-18 01:01:30'),
(19, 6, 1, '2018-10-18 01:01:31', '2018-10-18 01:01:31'),
(19, 10, 30, '2018-10-18 01:01:31', '2018-10-18 01:01:31'),
(19, 12, 1, '2018-10-18 01:01:31', '2018-10-18 01:01:31'),
(20, 1, 1, '2018-10-18 01:03:59', '2018-10-18 01:03:59'),
(20, 5, 1, '2018-10-18 01:03:59', '2018-10-18 01:03:59'),
(20, 7, 1, '2018-10-18 01:03:59', '2018-10-18 01:03:59'),
(20, 8, 1, '2018-10-18 01:03:59', '2018-10-18 01:03:59'),
(20, 6, 1, '2018-10-18 01:03:59', '2018-10-18 01:03:59'),
(20, 10, 30, '2018-10-18 01:03:59', '2018-10-18 01:03:59'),
(20, 12, 1, '2018-10-18 01:03:59', '2018-10-18 01:03:59'),
(21, 1, 1, '2018-10-18 01:04:37', '2018-10-18 01:04:37'),
(21, 5, 1, '2018-10-18 01:04:38', '2018-10-18 01:04:38'),
(21, 7, 1, '2018-10-18 01:04:38', '2018-10-18 01:04:38'),
(21, 8, 1, '2018-10-18 01:04:38', '2018-10-18 01:04:38'),
(21, 6, 1, '2018-10-18 01:04:38', '2018-10-18 01:04:38'),
(21, 10, 30, '2018-10-18 01:04:38', '2018-10-18 01:04:38'),
(21, 12, 1, '2018-10-18 01:04:38', '2018-10-18 01:04:38'),
(22, 1, 1, '2018-10-18 01:05:33', '2018-10-18 01:05:33'),
(22, 5, 1, '2018-10-18 01:05:33', '2018-10-18 01:05:33'),
(22, 7, 1, '2018-10-18 01:05:33', '2018-10-18 01:05:33'),
(22, 8, 1, '2018-10-18 01:05:33', '2018-10-18 01:05:33'),
(22, 6, 1, '2018-10-18 01:05:33', '2018-10-18 01:05:33'),
(22, 10, 30, '2018-10-18 01:05:33', '2018-10-18 01:05:33'),
(22, 12, 1, '2018-10-18 01:05:33', '2018-10-18 01:05:33'),
(23, 1, 1, '2018-10-18 01:14:27', '2018-10-18 01:14:27'),
(23, 5, 1, '2018-10-18 01:14:28', '2018-10-18 01:14:28'),
(23, 7, 1, '2018-10-18 01:14:28', '2018-10-18 01:14:28'),
(23, 8, 1, '2018-10-18 01:14:28', '2018-10-18 01:14:28'),
(23, 6, 1, '2018-10-18 01:14:28', '2018-10-18 01:14:28'),
(23, 10, 30, '2018-10-18 01:14:28', '2018-10-18 01:14:28'),
(23, 12, 1, '2018-10-18 01:14:28', '2018-10-18 01:14:28'),
(24, 1, 1, '2018-10-18 01:15:19', '2018-10-18 01:15:19'),
(24, 5, 1, '2018-10-18 01:15:19', '2018-10-18 01:15:19'),
(24, 7, 1, '2018-10-18 01:15:19', '2018-10-18 01:15:19'),
(24, 8, 1, '2018-10-18 01:15:19', '2018-10-18 01:15:19'),
(24, 6, 1, '2018-10-18 01:15:19', '2018-10-18 01:15:19'),
(24, 10, 30, '2018-10-18 01:15:19', '2018-10-18 01:15:19'),
(24, 12, 1, '2018-10-18 01:15:19', '2018-10-18 01:15:19'),
(25, 1, 1, '2018-10-18 01:15:56', '2018-10-18 01:15:56'),
(25, 5, 1, '2018-10-18 01:15:57', '2018-10-18 01:15:57'),
(25, 7, 1, '2018-10-18 01:15:57', '2018-10-18 01:15:57'),
(25, 8, 1, '2018-10-18 01:15:57', '2018-10-18 01:15:57'),
(25, 6, 1, '2018-10-18 01:15:57', '2018-10-18 01:15:57'),
(25, 10, 30, '2018-10-18 01:15:57', '2018-10-18 01:15:57'),
(25, 12, 1, '2018-10-18 01:15:57', '2018-10-18 01:15:57'),
(26, 1, 1, '2018-10-18 01:18:43', '2018-10-18 01:18:43'),
(26, 5, 1, '2018-10-18 01:18:44', '2018-10-18 01:18:44'),
(26, 7, 1, '2018-10-18 01:18:44', '2018-10-18 01:18:44'),
(26, 8, 1, '2018-10-18 01:18:44', '2018-10-18 01:18:44'),
(26, 6, 1, '2018-10-18 01:18:44', '2018-10-18 01:18:44'),
(26, 10, 30, '2018-10-18 01:18:44', '2018-10-18 01:18:44'),
(26, 12, 1, '2018-10-18 01:18:44', '2018-10-18 01:18:44'),
(27, 1, 1, '2018-10-18 01:19:35', '2018-10-18 01:19:35'),
(27, 5, 1, '2018-10-18 01:19:35', '2018-10-18 01:19:35'),
(27, 7, 1, '2018-10-18 01:19:35', '2018-10-18 01:19:35'),
(27, 8, 1, '2018-10-18 01:19:35', '2018-10-18 01:19:35'),
(27, 6, 1, '2018-10-18 01:19:35', '2018-10-18 01:19:35'),
(27, 10, 30, '2018-10-18 01:19:35', '2018-10-18 01:19:35'),
(27, 12, 1, '2018-10-18 01:19:35', '2018-10-18 01:19:35'),
(28, 1, 1, '2018-10-18 01:20:16', '2018-10-18 01:20:16'),
(28, 5, 1, '2018-10-18 01:20:16', '2018-10-18 01:20:16'),
(28, 7, 1, '2018-10-18 01:20:16', '2018-10-18 01:20:16'),
(28, 8, 1, '2018-10-18 01:20:16', '2018-10-18 01:20:16'),
(28, 6, 1, '2018-10-18 01:20:16', '2018-10-18 01:20:16'),
(28, 10, 30, '2018-10-18 01:20:16', '2018-10-18 01:20:16'),
(28, 12, 1, '2018-10-18 01:20:16', '2018-10-18 01:20:16'),
(29, 1, 1, '2018-10-18 01:26:34', '2018-10-18 01:26:34'),
(29, 5, 1, '2018-10-18 01:26:34', '2018-10-18 01:26:34'),
(29, 7, 1, '2018-10-18 01:26:34', '2018-10-18 01:26:34'),
(29, 8, 1, '2018-10-18 01:26:34', '2018-10-18 01:26:34'),
(29, 6, 1, '2018-10-18 01:26:34', '2018-10-18 01:26:34'),
(29, 10, 30, '2018-10-18 01:26:34', '2018-10-18 01:26:34'),
(29, 12, 1, '2018-10-18 01:26:34', '2018-10-18 01:26:34'),
(30, 1, 1, '2018-10-18 01:27:12', '2018-10-18 01:27:12'),
(30, 5, 1, '2018-10-18 01:27:12', '2018-10-18 01:27:12'),
(30, 7, 1, '2018-10-18 01:27:12', '2018-10-18 01:27:12'),
(30, 8, 1, '2018-10-18 01:27:12', '2018-10-18 01:27:12'),
(30, 6, 1, '2018-10-18 01:27:12', '2018-10-18 01:27:12'),
(30, 10, 30, '2018-10-18 01:27:12', '2018-10-18 01:27:12'),
(30, 12, 1, '2018-10-18 01:27:12', '2018-10-18 01:27:12'),
(31, 1, 1, '2018-10-18 01:29:32', '2018-10-18 01:29:32'),
(31, 5, 1, '2018-10-18 01:29:32', '2018-10-18 01:29:32'),
(31, 7, 1, '2018-10-18 01:29:32', '2018-10-18 01:29:32'),
(31, 8, 1, '2018-10-18 01:29:32', '2018-10-18 01:29:32'),
(31, 6, 1, '2018-10-18 01:29:32', '2018-10-18 01:29:32'),
(31, 10, 30, '2018-10-18 01:29:32', '2018-10-18 01:29:32'),
(31, 12, 1, '2018-10-18 01:29:32', '2018-10-18 01:29:32'),
(32, 1, 1, '2018-10-18 01:30:14', '2018-10-18 01:30:14'),
(32, 5, 1, '2018-10-18 01:30:14', '2018-10-18 01:30:14'),
(32, 7, 1, '2018-10-18 01:30:14', '2018-10-18 01:30:14'),
(32, 8, 1, '2018-10-18 01:30:14', '2018-10-18 01:30:14'),
(32, 6, 1, '2018-10-18 01:30:15', '2018-10-18 01:30:15'),
(32, 10, 30, '2018-10-18 01:30:15', '2018-10-18 01:30:15'),
(32, 12, 1, '2018-10-18 01:30:15', '2018-10-18 01:30:15'),
(33, 1, 1, '2018-10-18 01:31:26', '2018-10-18 01:31:26'),
(33, 5, 1, '2018-10-18 01:31:26', '2018-10-18 01:31:26'),
(33, 7, 1, '2018-10-18 01:31:26', '2018-10-18 01:31:26'),
(33, 8, 1, '2018-10-18 01:31:26', '2018-10-18 01:31:26'),
(33, 6, 1, '2018-10-18 01:31:26', '2018-10-18 01:31:26'),
(33, 10, 30, '2018-10-18 01:31:26', '2018-10-18 01:31:26'),
(33, 12, 1, '2018-10-18 01:31:26', '2018-10-18 01:31:26'),
(34, 1, 1, '2018-10-18 01:32:00', '2018-10-18 01:32:00'),
(34, 5, 1, '2018-10-18 01:32:00', '2018-10-18 01:32:00'),
(34, 7, 1, '2018-10-18 01:32:00', '2018-10-18 01:32:00'),
(34, 8, 1, '2018-10-18 01:32:01', '2018-10-18 01:32:01'),
(34, 6, 1, '2018-10-18 01:32:01', '2018-10-18 01:32:01'),
(34, 10, 30, '2018-10-18 01:32:01', '2018-10-18 01:32:01'),
(34, 12, 1, '2018-10-18 01:32:01', '2018-10-18 01:32:01'),
(35, 1, 1, '2018-10-18 01:32:29', '2018-10-18 01:32:29'),
(35, 5, 1, '2018-10-18 01:32:30', '2018-10-18 01:32:30'),
(35, 7, 1, '2018-10-18 01:32:30', '2018-10-18 01:32:30'),
(35, 8, 1, '2018-10-18 01:32:30', '2018-10-18 01:32:30'),
(35, 6, 1, '2018-10-18 01:32:31', '2018-10-18 01:32:31'),
(35, 10, 30, '2018-10-18 01:32:31', '2018-10-18 01:32:31'),
(35, 12, 1, '2018-10-18 01:32:31', '2018-10-18 01:32:31'),
(36, 1, 1, '2018-10-18 01:33:45', '2018-10-18 01:33:45'),
(36, 5, 1, '2018-10-18 01:33:45', '2018-10-18 01:33:45'),
(36, 7, 1, '2018-10-18 01:33:45', '2018-10-18 01:33:45'),
(36, 8, 1, '2018-10-18 01:33:45', '2018-10-18 01:33:45'),
(36, 6, 1, '2018-10-18 01:33:45', '2018-10-18 01:33:45'),
(36, 10, 30, '2018-10-18 01:33:45', '2018-10-18 01:33:45'),
(36, 12, 1, '2018-10-18 01:33:45', '2018-10-18 01:33:45'),
(37, 1, 1, '2018-10-18 01:35:20', '2018-10-18 01:35:20'),
(37, 5, 1, '2018-10-18 01:35:20', '2018-10-18 01:35:20'),
(37, 7, 1, '2018-10-18 01:35:20', '2018-10-18 01:35:20'),
(37, 8, 1, '2018-10-18 01:35:20', '2018-10-18 01:35:20'),
(37, 6, 1, '2018-10-18 01:35:20', '2018-10-18 01:35:20'),
(37, 10, 30, '2018-10-18 01:35:21', '2018-10-18 01:35:21'),
(37, 12, 1, '2018-10-18 01:35:21', '2018-10-18 01:35:21'),
(38, 1, 1, '2018-10-18 01:36:06', '2018-10-18 01:36:06'),
(38, 5, 1, '2018-10-18 01:36:06', '2018-10-18 01:36:06'),
(38, 7, 1, '2018-10-18 01:36:06', '2018-10-18 01:36:06'),
(38, 8, 1, '2018-10-18 01:36:06', '2018-10-18 01:36:06'),
(38, 6, 1, '2018-10-18 01:36:06', '2018-10-18 01:36:06'),
(38, 10, 30, '2018-10-18 01:36:06', '2018-10-18 01:36:06'),
(38, 12, 1, '2018-10-18 01:36:06', '2018-10-18 01:36:06'),
(39, 1, 1, '2018-10-18 01:37:31', '2018-10-18 01:37:31'),
(39, 5, 1, '2018-10-18 01:37:31', '2018-10-18 01:37:31'),
(39, 7, 1, '2018-10-18 01:37:31', '2018-10-18 01:37:31'),
(39, 8, 1, '2018-10-18 01:37:31', '2018-10-18 01:37:31'),
(39, 6, 1, '2018-10-18 01:37:31', '2018-10-18 01:37:31'),
(39, 10, 30, '2018-10-18 01:37:31', '2018-10-18 01:37:31'),
(39, 12, 1, '2018-10-18 01:37:31', '2018-10-18 01:37:31'),
(40, 1, 1, '2018-10-18 16:44:52', '2018-10-18 16:44:52'),
(40, 5, 1, '2018-10-18 16:44:52', '2018-10-18 16:44:52'),
(40, 6, 1, '2018-10-18 16:44:52', '2018-10-18 16:44:52'),
(40, 7, 1, '2018-10-18 16:44:52', '2018-10-18 16:44:52'),
(40, 8, 1, '2018-10-18 16:44:52', '2018-10-18 16:44:52'),
(40, 13, 1, '2018-10-18 16:44:52', '2018-10-18 16:44:52'),
(40, 9, 1, '2018-10-18 16:44:52', '2018-10-18 16:44:52'),
(40, 10, 1, '2018-10-18 16:44:52', '2018-10-18 16:44:52'),
(40, 11, 1, '2018-10-18 16:44:52', '2018-10-18 16:44:52'),
(40, 12, 1, '2018-10-18 16:44:52', '2018-10-18 16:44:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_hoadon`
--

CREATE TABLE `tb_hoadon` (
  `id_hoadon` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_goi` int(10) UNSIGNED NOT NULL,
  `tinhtrang` blob NOT NULL,
  `tongtien` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_hoadon`
--

INSERT INTO `tb_hoadon` (`id_hoadon`, `id_user`, `id_goi`, `tinhtrang`, `tongtien`, `created_at`, `updated_at`) VALUES
(1, 4, 39, 0x30, 1200000, '2018-10-18 01:37:32', '2018-10-18 01:37:32'),
(2, 4, 39, '', 121122, '2018-10-18 01:37:32', '2018-10-18 01:37:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_infosystem`
--

CREATE TABLE `tb_infosystem` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_phanloai_dichvu`
--

CREATE TABLE `tb_phanloai_dichvu` (
  `id_loaidv` int(10) UNSIGNED NOT NULL,
  `tenloaidv` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_phanloai_dichvu`
--

INSERT INTO `tb_phanloai_dichvu` (`id_loaidv`, `tenloaidv`, `mota`, `created_at`, `updated_at`) VALUES
(1, 'Dich Vụ Đồ Ăn', 'Món ăn, danh sách các món cung cấp', NULL, NULL),
(2, 'Dịch Vụ Đồ Uống', 'Cung cấp bia, nước ngọt các loại ', NULL, NULL),
(3, 'Dịch vụ khác', 'Dịch vụ khác ', '2018-10-15 17:00:00', '2018-10-15 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_theloai`
--

CREATE TABLE `tb_theloai` (
  `id_theloai` int(10) UNSIGNED NOT NULL,
  `tentheloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_theloai`
--

INSERT INTO `tb_theloai` (`id_theloai`, `tentheloai`, `mota`, `created_at`, `updated_at`) VALUES
(15, 'Giới thiệu', 'Giới thiệu về website', '2018-09-09 08:37:05', '2018-09-09 23:21:06'),
(17, 'Chủ đề 1', 'Chủ đề 1', '2018-09-09 08:47:42', '2018-09-09 08:47:42'),
(18, 'Chủ đề 2', 'Chủ đề 2', '2018-09-09 08:47:42', '2018-09-09 08:47:42'),
(19, 'Chủ đề 3', 'Chủ đề 3', '2018-09-09 08:47:42', '2018-09-09 08:47:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `sodienthoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` tinyint(4) DEFAULT NULL,
  `id_chucvu` int(10) UNSIGNED NOT NULL,
  `avatar` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `sodienthoai`, `hoten`, `diachi`, `password`, `gioitinh`, `id_chucvu`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, '01225478839', 'Cường Phương', 'Dlieyang, Eahleo, DakLak', '$2y$10$urQTjK6Ip5CS4R2hscY0euvikzBhqS7.i5S/WeiRmHjLu1uXd8C3q', NULL, 1, 0, NULL, '2018-09-05 08:41:23', '2018-09-06 09:28:02'),
(13, '0906404321', 'Phương Văn Cường', 'DakLak', '$2y$10$urQTjK6Ip5CS4R2hscY0euvikzBhqS7.i5S/WeiRmHjLu1uXd8C3q', NULL, 2, 0, NULL, '2018-09-05 17:00:00', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `tb_baiviet`
--
ALTER TABLE `tb_baiviet`
  ADD PRIMARY KEY (`id_baiviet`),
  ADD KEY `tb_baiviet_id_user_foreign` (`id_user`),
  ADD KEY `tb_baiviet_id_theloai_foreign` (`id_theloai`);

--
-- Chỉ mục cho bảng `tb_chucvu`
--
ALTER TABLE `tb_chucvu`
  ADD PRIMARY KEY (`id_chucvu`);

--
-- Chỉ mục cho bảng `tb_cthoadon`
--
ALTER TABLE `tb_cthoadon`
  ADD PRIMARY KEY (`id_cthd`),
  ADD UNIQUE KEY `tb_cthoadon_id_hoadon_unique` (`id_hoadon`);

--
-- Chỉ mục cho bảng `tb_dichvu`
--
ALTER TABLE `tb_dichvu`
  ADD PRIMARY KEY (`id_dichvu`),
  ADD KEY `tb_dichvu_id_loaidv_foreign` (`id_loaidv`);

--
-- Chỉ mục cho bảng `tb_goi`
--
ALTER TABLE `tb_goi`
  ADD PRIMARY KEY (`id_goi`),
  ADD KEY `tb_goi_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `tb_goi_dichvu`
--
ALTER TABLE `tb_goi_dichvu`
  ADD KEY `tb_goi_dichvu_id_goi_foreign` (`id_goi`),
  ADD KEY `tb_goi_dichvu_id_dichvu_foreign` (`id_dichvu`);

--
-- Chỉ mục cho bảng `tb_hoadon`
--
ALTER TABLE `tb_hoadon`
  ADD PRIMARY KEY (`id_hoadon`),
  ADD KEY `tb_hoadon_id_user_foreign` (`id_user`),
  ADD KEY `tb_hoadon_id_goi_foreign` (`id_goi`);

--
-- Chỉ mục cho bảng `tb_infosystem`
--
ALTER TABLE `tb_infosystem`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_phanloai_dichvu`
--
ALTER TABLE `tb_phanloai_dichvu`
  ADD PRIMARY KEY (`id_loaidv`);

--
-- Chỉ mục cho bảng `tb_theloai`
--
ALTER TABLE `tb_theloai`
  ADD PRIMARY KEY (`id_theloai`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sodienthoai` (`sodienthoai`),
  ADD KEY `users_id_chucvu_foreign` (`id_chucvu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tb_baiviet`
--
ALTER TABLE `tb_baiviet`
  MODIFY `id_baiviet` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tb_chucvu`
--
ALTER TABLE `tb_chucvu`
  MODIFY `id_chucvu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_cthoadon`
--
ALTER TABLE `tb_cthoadon`
  MODIFY `id_cthd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tb_dichvu`
--
ALTER TABLE `tb_dichvu`
  MODIFY `id_dichvu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tb_goi`
--
ALTER TABLE `tb_goi`
  MODIFY `id_goi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `tb_hoadon`
--
ALTER TABLE `tb_hoadon`
  MODIFY `id_hoadon` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tb_infosystem`
--
ALTER TABLE `tb_infosystem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_phanloai_dichvu`
--
ALTER TABLE `tb_phanloai_dichvu`
  MODIFY `id_loaidv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tb_theloai`
--
ALTER TABLE `tb_theloai`
  MODIFY `id_theloai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tb_baiviet`
--
ALTER TABLE `tb_baiviet`
  ADD CONSTRAINT `tb_baiviet_id_theloai_foreign` FOREIGN KEY (`id_theloai`) REFERENCES `tb_theloai` (`id_theloai`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_baiviet_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tb_cthoadon`
--
ALTER TABLE `tb_cthoadon`
  ADD CONSTRAINT `tb_cthoadon_id_hoadon_foreign` FOREIGN KEY (`id_hoadon`) REFERENCES `tb_hoadon` (`id_hoadon`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tb_dichvu`
--
ALTER TABLE `tb_dichvu`
  ADD CONSTRAINT `tb_dichvu_id_loaidv_foreign` FOREIGN KEY (`id_loaidv`) REFERENCES `tb_phanloai_dichvu` (`id_loaidv`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tb_goi`
--
ALTER TABLE `tb_goi`
  ADD CONSTRAINT `tb_goi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
