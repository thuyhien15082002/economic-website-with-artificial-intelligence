-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2023 lúc 12:48 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopping`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 HIỂN THỊ, 0 ẨN',
  `prioty` tinyint(4) DEFAULT 0,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `prioty`, `created_at`, `updated_at`) VALUES
(1, 'Áo Khoác', 1, 1, '2021-11-09', '2021-11-09'),
(2, 'Áo Polo', 1, 1, '2021-11-29', '2021-11-29'),
(3, 'Áo Phông', 1, 1, '2021-11-29', '2021-11-29'),
(4, 'Áo Sơ mi', 1, 1, '2021-11-29', '2021-11-29'),
(5, 'Quần Jean', 1, 1, '2021-11-29', '2021-11-29'),
(6, 'Quần Tây', 1, 1, '2021-11-29', '2021-11-29'),
(7, 'Quần Short', 1, 1, '2021-11-29', '2021-11-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `reply_id` int(11) NOT NULL DEFAULT 0,
  `content` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 hiển thị, 0 ẩn',
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `users_id`, `name`, `email`, `phone`, `address`, `note`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Hiền', 'ltthien.20it4@vku.udn.vn', '0828388158', 'Đà Nẵng', NULL, 1, '2023-05-10', '2023-05-10'),
(2, 1, 'Hiền', 'ltthien.20it4@vku.udn.vn', '0828388158', 'Đà Nẵng', NULL, 1, '2023-05-10', '2023-05-10'),
(3, 7, 'linh 123', 'linh@gmail.com', '0123456789', 'QN', NULL, 1, '2023-12-08', '2023-12-08'),
(4, 8, 'lam', 'lam@gmail.com', '0147852369', 'QN', NULL, 1, '2023-12-08', '2023-12-08'),
(5, 9, 'Trang hồng', 'trang123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-12-08', '2023-12-08'),
(6, 10, 'nam', 'nam@gmail.com', '0123457896', 'QT', NULL, 1, '2023-12-08', '2023-12-08'),
(7, 7, 'linh123', 'linh@gmail.com', '0123456789', 'QN', NULL, 1, '2023-12-08', '2023-12-08'),
(8, 1, 'Hine', 'ltthien.20it4@vku.udn.vn', '0828388158', '?à N?ng', NULL, 1, '2023-11-10', '2023-11-10'),
(9, 11, 'Hoa', 'hoa123@gmail.com', '0828388658', '?à N?ng', NULL, 1, '2023-08-10', '2023-08-10'),
(10, 12, 'hue', 'hue123@gmail.com', '0123458889', 'QN', NULL, 1, '2023-12-08', '2023-12-08'),
(11, 13, 'lan', 'lan@gmail.com', '0147852489', 'QN', NULL, 1, '2023-12-08', '2023-12-08'),
(12, 14, 'huong', 'huong@gmail.com', '0123456789', 'QN', NULL, 1, '2023-09-08', '2023-12-08'),
(13, 15, 'truc', 'truc@gmail.com', '0123457896', 'QT', NULL, 1, '2023-07-08', '2023-10-08'),
(14, 16, 'mai', 'mai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-06-08', '2023-11-08'),
(15, 14, 'huong', 'huong@gmail.com', '0123456789', 'QN', NULL, 1, '2023-12-08', '2023-12-08'),
(16, 15, 'truc', 'truc@gmail.com', '0123457896', 'QT', NULL, 1, '2023-10-08', '2023-10-08'),
(17, 16, 'mai', 'mai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(18, 17, 'Hoang', 'hoang123@gmail.com', '0828388158', 'Đà Nẵng', NULL, 1, '2023-11-10', '2023-11-10'),
(19, 18, 'hung', 'hung@gmail.com', '0828388658', 'Đà Nẵng', NULL, 1, '2023-08-10', '2023-08-10'),
(20, 19, 'loan', 'loan@gmail.com', '0123458889', 'QN', NULL, 1, '2023-12-08', '2023-12-08'),
(21, 20, 'huong', 'huong123@gmail.com', '0147852489', 'QN', NULL, 1, '2023-12-08', '2023-12-08'),
(22, 21, 'truc', 'truc123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-09-08', '2023-12-08'),
(23, 22, 'mai', 'mai123@gmail.com', '0123457896', 'QT', NULL, 1, '2023-07-08', '2023-10-08'),
(24, 23, 'tam', 'tam@gmail.com', '0123456789', 'QN', NULL, 1, '2023-06-08', '2023-11-08'),
(25, 24, 'cam', 'cam@gmail.com', '0123456789', 'QN', NULL, 1, '2023-12-08', '2023-12-08'),
(26, 25, 'hai', 'hai@gmail.com', '0123457896', 'QT', NULL, 1, '2023-10-08', '2023-10-08'),
(27, 26, 'minh', 'minh@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(28, 27, 'ly', 'ly@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(29, 28, 'chieu', 'chieu@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(30, 29, 'anh', 'anh@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(31, 30, 'khoi', 'khoi@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(32, 31, 'khoa', 'khoa@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(33, 32, 'khanh', 'khanh@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(34, 33, 'ngan', 'ngan@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(35, 34, 'vuong', 'vuong@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(36, 35, 'nhien', 'nhien@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(37, 36, 'thu', 'thu@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(38, 37, 'giang', 'giang@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(39, 38, 'truong', 'truong@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(40, 39, 'tran', 'tran@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(41, 40, 'han', 'han@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(42, 16, 'mai', 'mai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(43, 25, 'hai', 'hai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(44, 16, 'mai', 'mai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(45, 17, 'Hoang', 'hoang123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(46, 18, 'hung', 'hung@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(47, 19, 'loan', 'loan@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(48, 19, 'loan', 'loan@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(49, 20, 'huong', 'huong123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(50, 20, 'huong', 'huong123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(51, 21, 'truc', 'truc123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(52, 22, 'mai', 'mai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(53, 23, 'tam', 'tam@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(54, 23, 'tam', 'tam@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(55, 23, 'tam', 'tam@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(56, 24, 'cam', 'cam@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(57, 24, 'cam', 'cam@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(58, 24, 'cam', 'cam@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(59, 25, 'hai', 'hai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(60, 25, 'hai', 'hai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(61, 16, 'mai', 'mai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(62, 16, 'mai', 'mai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(63, 18, 'hung', 'hung@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(64, 18, 'hung', 'hung@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(65, 19, 'loan', 'loan@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(66, 30, 'khoi', 'khoi@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(67, 30, 'khoi', 'khoi@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(68, 31, 'khoa', 'khoa@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(69, 32, 'khanh', 'khanh@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(70, 33, 'ngan', 'ngan@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(71, 34, 'vuong', 'vuong@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(72, 34, 'vuong', 'vuong@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(73, 35, 'nhien', 'nhien@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(74, 35, 'nhien', 'nhien@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(75, 39, 'tran', 'tran@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(76, 39, 'tran', 'tran@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(77, 19, 'loan', 'loan@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(78, 19, 'loan', 'loan@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(79, 20, 'huong', 'huong123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(80, 20, 'huong', 'huong123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(81, 21, 'truc', 'truc123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(82, 23, 'tam', 'tam@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(83, 23, 'tam', 'tam@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(84, 25, 'hai', 'hai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(85, 25, 'hai', 'hai@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(86, 21, 'truc', 'truc123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(87, 37, 'giang', 'giang@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(88, 37, 'giang', 'giang@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(89, 26, 'minh', 'minh@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(90, 28, 'chieu', 'chieu@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(91, 29, 'anh', 'anh@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(92, 30, 'khoi', 'khoi@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(93, 30, 'khoi', 'khoi@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(94, 31, 'khoa', 'khoa@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(95, 32, 'khanh', 'khanh@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(96, 17, 'Hoang', 'hoang123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(97, 17, 'Hoang', 'hoang123@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(98, 19, 'loan', 'loan@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(99, 32, 'khanh', 'khanh@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08'),
(100, 31, 'khoa', 'khoa@gmail.com', '0123456789', 'QN', NULL, 1, '2023-11-08', '2023-11-08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(10) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `add_to_cart_order` int(11) NOT NULL,
  `reordered` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float(9,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `orders_id`, `product_id`, `add_to_cart_order`, `reordered`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 72, 1, 0, 1, 120.000, '2023-05-10 08:08:49', '2023-05-10 08:08:49'),
(2, 2, 65, 3, 0, 1, 130.000, '2023-05-10 08:08:49', '2023-05-10 08:08:49'),
(3, 3, 47, 1, 0, 1, 200.000, NULL, NULL),
(4, 3, 62, 2, 1, 1, 250.000, NULL, NULL),
(5, 6, 47, 2, 1, 1, 200.000, NULL, NULL),
(6, 6, 71, 3, 1, 1, 120.000, NULL, NULL),
(7, 8, 60, 1, 0, 1, 200.000, NULL, NULL),
(8, 8, 51, 2, 0, 1, 200.000, NULL, NULL),
(9, 8, 63, 3, 0, 1, 150.000, NULL, NULL),
(10, 9, 25, 1, 0, 1, 200.000, NULL, NULL),
(11, 10, 47, 1, 1, 1, 200.000, NULL, NULL),
(12, 10, 35, 2, 0, 1, 150.000, NULL, NULL),
(13, 11, 63, 1, 1, 1, 150.000, NULL, NULL),
(14, 11, 47, 2, 1, 1, 150.000, NULL, NULL),
(15, 11, 28, 3, 0, 1, 250.000, NULL, NULL),
(16, 12, 63, 1, 1, 2, 300.000, NULL, NULL),
(17, 12, 25, 2, 1, 1, 200.000, NULL, NULL),
(18, 12, 51, 3, 1, 1, 200.000, NULL, NULL),
(19, 13, 41, 1, 0, 1, 150.000, NULL, NULL),
(20, 14, 63, 3, 0, 1, 150.000, NULL, NULL),
(21, 14, 63, 3, 0, 1, 150.000, NULL, NULL),
(22, 15, 11, 1, 0, 1, 180.000, NULL, NULL),
(23, 15, 51, 2, 1, 1, 200.000, NULL, NULL),
(24, 15, 8, 3, 0, 1, 150.000, NULL, NULL),
(25, 16, 22, 1, 0, 1, 120.000, NULL, NULL),
(26, 16, 25, 2, 1, 1, 200.000, NULL, NULL),
(27, 16, 37, 3, 0, 1, 200.000, NULL, NULL),
(28, 16, 51, 4, 1, 1, 200.000, NULL, NULL),
(29, 18, 37, 1, 0, 1, 200.000, NULL, NULL),
(30, 18, 1, 2, 0, 1, 120.000, NULL, NULL),
(31, 18, 7, 3, 0, 1, 200.000, NULL, NULL),
(32, 18, 10, 4, 0, 1, 200.000, NULL, NULL),
(33, 18, 22, 5, 0, 1, 120.000, NULL, NULL),
(34, 18, 35, 6, 1, 1, 150.000, NULL, NULL),
(35, 19, 2, 1, 0, 1, 120.000, NULL, NULL),
(36, 19, 7, 2, 1, 1, 200.000, NULL, NULL),
(37, 19, 30, 3, 0, 1, 250.000, NULL, NULL),
(38, 19, 11, 4, 0, 1, 180.000, NULL, NULL),
(39, 19, 17, 5, 0, 1, 120.000, NULL, NULL),
(40, 20, 37, 1, 1, 1, 200.000, NULL, NULL),
(41, 20, 38, 2, 0, 1, 130.000, NULL, NULL),
(42, 20, 30, 3, 1, 1, 150.000, NULL, NULL),
(43, 20, 1, 4, 1, 1, 120.000, NULL, NULL),
(44, 20, 11, 5, 1, 1, 180.000, NULL, NULL),
(45, 21, 60, 1, 0, 1, 200.000, NULL, NULL),
(46, 21, 67, 2, 0, 1, 170.000, NULL, NULL),
(47, 21, 35, 3, 1, 1, 150.000, NULL, NULL),
(48, 21, 60, 4, 0, 1, 200.000, NULL, NULL),
(49, 22, 71, 1, 1, 1, 120.000, NULL, NULL),
(50, 22, 25, 2, 0, 1, 200.000, NULL, NULL),
(51, 22, 31, 3, 0, 1, 200.000, NULL, NULL),
(52, 22, 24, 4, 0, 1, 120.000, NULL, NULL),
(53, 23, 37, 1, 1, 1, 200.000, NULL, NULL),
(54, 23, 38, 2, 1, 1, 130.000, NULL, NULL),
(55, 23, 16, 3, 0, 1, 120.000, NULL, NULL),
(56, 23, 60, 4, 0, 1, 200.000, NULL, NULL),
(57, 24, 23, 1, 0, 1, 150.000, NULL, NULL),
(58, 24, 28, 2, 1, 1, 250.000, NULL, NULL),
(59, 24, 1, 3, 1, 1, 120.000, NULL, NULL),
(60, 24, 35, 4, 1, 1, 150.000, NULL, NULL),
(61, 25, 37, 1, 1, 1, 200.000, NULL, NULL),
(62, 25, 71, 2, 1, 1, 120.000, NULL, NULL),
(63, 25, 3, 3, 0, 1, 100.000, NULL, NULL),
(64, 25, 10, 4, 1, 1, 200.000, NULL, NULL),
(65, 26, 7, 1, 1, 1, 200.000, NULL, NULL),
(66, 26, 3, 2, 0, 1, 100.000, NULL, NULL),
(67, 26, 72, 3, 1, 1, 120.000, NULL, NULL),
(68, 27, 9, 1, 0, 1, 120.000, NULL, NULL),
(69, 27, 42, 2, 0, 1, 250.000, NULL, NULL),
(70, 27, 65, 3, 1, 1, 130.000, NULL, NULL),
(71, 27, 71, 4, 0, 1, 120.000, NULL, NULL),
(72, 28, 26, 1, 0, 1, 120.000, NULL, NULL),
(73, 28, 7, 2, 1, 1, 200.000, NULL, NULL),
(75, 29, 2, 1, 1, 1, 120.000, NULL, NULL),
(76, 29, 22, 2, 0, 1, 120.000, NULL, NULL),
(77, 29, 30, 3, 1, 1, 250.000, NULL, NULL),
(78, 30, 37, 1, 1, 1, 200.000, NULL, NULL),
(79, 30, 28, 2, 1, 1, 250.000, NULL, NULL),
(80, 30, 8, 3, 0, 1, 150.000, NULL, NULL),
(81, 30, 7, 4, 1, 1, 200.000, NULL, NULL),
(82, 31, 58, 1, 0, 1, 250.000, NULL, NULL),
(83, 31, 60, 2, 1, 1, 200.000, NULL, NULL),
(84, 31, 12, 3, 0, 1, 150.000, NULL, NULL),
(85, 31, 17, 4, 0, 1, 120.000, NULL, NULL),
(86, 32, 30, 1, 1, 1, 250.000, NULL, NULL),
(87, 32, 26, 2, 1, 1, 120.000, NULL, NULL),
(88, 32, 60, 4, 1, 1, 200.000, NULL, NULL),
(89, 33, 8, 1, 1, 1, 150.000, NULL, NULL),
(90, 33, 23, 2, 0, 1, 150.000, NULL, NULL),
(91, 33, 20, 3, 0, 1, 200.000, NULL, NULL),
(92, 33, 27, 4, 0, 1, 150.000, NULL, NULL),
(93, 34, 37, 1, 0, 1, 200.000, NULL, NULL),
(94, 34, 67, 2, 0, 1, 200.000, NULL, NULL),
(95, 34, 57, 3, 0, 1, 200.000, NULL, NULL),
(96, 34, 47, 4, 0, 1, 200.000, NULL, NULL),
(97, 34, 7, 5, 1, 1, 200.000, NULL, NULL),
(98, 35, 23, 1, 1, 1, 150.000, NULL, NULL),
(99, 35, 32, 2, 0, 1, 120.000, NULL, NULL),
(100, 35, 31, 3, 0, 1, 200.000, NULL, NULL),
(101, 35, 28, 4, 1, 1, 250.000, NULL, NULL),
(102, 36, 7, 1, 1, 1, 200.000, NULL, NULL),
(103, 36, 14, 3, 0, 1, 350.000, NULL, NULL),
(104, 37, 27, 1, 1, 1, 150.000, NULL, NULL),
(105, 37, 37, 2, 1, 1, 200.000, NULL, NULL),
(106, 37, 17, 3, 0, 1, 200.000, NULL, NULL),
(107, 37, 25, 4, 0, 1, 200.000, NULL, NULL),
(108, 37, 31, 5, 1, 1, 200.000, NULL, NULL),
(109, 38, 37, 1, 1, 1, 200.000, NULL, NULL),
(110, 38, 28, 2, 1, 1, 250.000, NULL, NULL),
(111, 38, 7, 3, 1, 1, 200.000, NULL, NULL),
(112, 38, 27, 4, 1, 1, 150.000, NULL, NULL),
(113, 38, 56, 5, 0, 1, 200.000, NULL, NULL),
(114, 39, 22, 2, 1, 1, 120.000, NULL, NULL),
(115, 39, 45, 3, 0, 1, 200.000, NULL, NULL),
(116, 39, 51, 4, 1, 1, 200.000, NULL, NULL),
(117, 40, 62, 1, 0, 1, 250.000, NULL, NULL),
(118, 40, 55, 2, 0, 1, 150.000, NULL, NULL),
(119, 40, 59, 3, 0, 1, 200.000, NULL, NULL),
(120, 40, 19, 4, 0, 1, 200.000, NULL, NULL),
(121, 40, 22, 5, 1, 1, 120.000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `price` float(9,3) NOT NULL,
  `sale_price` float(9,3) DEFAULT 0.000,
  `description` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1 HIỂN THỊ, 0 ẨN',
  `category_id` int(11) NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `price`, `sale_price`, `description`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Áo thun Polo nửa khóa kéo', 'polo_nuaKhoakeotrang.png', 120.000, 0.000, NULL, 1, 2, '2023-05-10', '2023-05-10'),
(2, 'Áo thun Polo kẻ sọc', 'aothunpolokesocpng.png', 120.000, 0.000, NULL, 1, 2, '2023-05-10', '2023-05-10'),
(3, 'Áo thun Polo Hole chất cotton', 'aothunpolo_hole.png', 100.000, 0.000, NULL, 1, 2, '2023-05-10', '2023-05-10'),
(4, 'Áo polo bagic', 'aopolonamphoico_bagic.png', 130.000, 5.000, NULL, 1, 2, '2023-05-10', '2023-05-10'),
(5, 'Áo khoác Unisex cổ trụ\'', 'unisex_jacket.png', 200.000, 0.000, NULL, 1, 1, '2023-05-10', '2023-05-10'),
(6, 'Áo khoác Teelab', 'teelab_jacket.png', 200.000, 0.000, NULL, 1, 1, '2023-05-10', '2023-05-10'),
(7, 'Áo khoác Young Vintage\'', 'youngVintage_jacket.png', 200.000, 0.000, NULL, 1, 1, '2023-05-10', '2023-05-10'),
(8, 'Áo khoác OnTop', 'ontop_jacket.png', 150.000, 0.000, NULL, 1, 1, '2023-05-10', '2023-05-10'),
(9, 'Áo khoác Dragon 2 lớp mềm mịn', 'dragon_jacket.png', 120.000, 0.000, NULL, 1, 1, '2023-05-10', '2023-05-10'),
(10, 'Áo khoác dù LOUIS Unisex', 'louisunisex_jacket.png', 200.000, 0.000, NULL, 1, 1, '2023-05-10', '2023-05-10'),
(11, 'Áo khoác JOGGER Unisex', 'louisunisex_jacket.png', 180.000, 0.000, NULL, 1, 1, '2023-05-10', '2023-05-10'),
(12, 'Áo khoác đen 2 lớp', 'black_jacket.png', 150.000, 0.000, NULL, 1, 1, '2023-05-10', '2023-05-10'),
(13, 'Áo khoác Vest cổ đứng', 'vest_jacket.png', 250.000, 0.000, NULL, 1, 1, '2023-05-10', '2023-05-10'),
(14, 'Áo khoác da cao cấp', 'da_jacket.png', 350.000, 0.000, NULL, 1, 1, '2023-05-10', '2023-05-10'),
(16, 'Áo thun Polo Oversize Wonder', 'polo_oversize.png', 120.000, 0.000, NULL, 1, 2, '2023-05-10', '2023-05-10'),
(17, 'Áo thun Polo Haze Unisex', 'polo_haze.png', 120.000, 0.000, NULL, 1, 2, '2023-05-10', '2023-05-10'),
(18, 'Áo thun Polo Local Brand NEWSEVEN', 'polo_newseven.png', 250.000, 0.000, NULL, 1, 2, '2023-05-10', '2023-05-10'),
(19, 'Áo thun Polo Unisex Karants Special', 'polo_karants.png', 200.000, 0.000, NULL, 1, 2, '2023-05-10', '2023-05-10'),
(20, 'Áo thun polo unisex Outerity ', 'polo_outerity.png', 250.000, 0.000, NULL, 1, 2, '2023-05-10', '2023-05-10'),
(22, 'Áo Phông Nam Loang Xám', 'xam_phong.png', 120.000, 0.000, NULL, 1, 3, '2023-05-10', '2023-05-10'),
(23, 'Áo phông Premium Cotton ', 'prenium_phong.png', 150.000, 0.000, NULL, 1, 3, '2023-05-10', '2023-05-10'),
(24, 'Áo phông  vải len dệt GG tia sét', 'len_phong.png', 120.000, 0.000, NULL, 1, 3, '2023-05-10', '2023-05-10'),
(25, 'Áo phông Premium Cotton Saint ', 'sant_phong.png', 200.000, 0.000, NULL, 1, 3, '2023-05-10', '2023-05-10'),
(26, 'Áo phông LOUBOUTIN cao cấp', 'loubotin_phong.png', 120.000, 0.000, NULL, 1, 3, '2023-05-10', '2023-05-10'),
(27, 'Áo phông tay lỡ The Bad God', 'bad_phong.png', 150.000, 0.000, NULL, 1, 3, '2023-05-10', '2023-05-10'),
(28, 'Áo wash xám Alandor form rộng', 'alandor_phong.png', 250.000, 0.000, NULL, 1, 3, '2023-05-10', '2023-05-10'),
(29, 'Áo phông Teelab Local Brand', 'teelab_phong.png', 200.000, 0.000, NULL, 1, 3, '2023-05-10', '2023-05-10'),
(30, 'Áo phông wash basic ATHANOR', 'athanor_phong.png', 250.000, 0.000, NULL, 1, 3, '2023-05-10', '2023-05-10'),
(31, 'Áo phông wash unisex ATHANOR', 'air_phong.png', 200.000, 0.000, NULL, 1, 3, '2023-05-10', '2023-05-10'),
(32, 'Áo sơ mi đường phố', 'duongpho_somi.png', 120.000, 0.000, NULL, 1, 4, '2023-05-10', '2023-05-10'),
(33, 'Áo sơ mi giấy báo', 'somi_giaybao.png', 150.000, 0.000, NULL, 1, 4, '2023-05-10', '2023-05-10'),
(34, 'Áo sơ mi mùa hè', 'somi_autumn.png', 120.000, 0.000, NULL, 1, 4, '2023-05-10', '2023-05-10'),
(35, 'Áo sơ mi kaki', 'somi_kaki.png', 150.000, 0.000, NULL, 1, 4, '2023-05-10', '2023-05-10'),
(36, 'Áo sơ mi nhung cao cấp', 'somi_nhung.png', 130.000, 0.000, NULL, 1, 4, '2023-05-10', '2023-05-10'),
(37, 'Áo sơ mi cao cấp VICENZO', 'somi_vicenzo.png', 200.000, 0.000, NULL, 1, 4, '2023-05-10', '2023-05-10'),
(38, 'Áo sơ mi trơn basic', 'tron_somi.png', 130.000, 0.000, NULL, 1, 4, '2023-05-10', '2023-05-10'),
(39, 'Áo sơ mi kaki basic', 'basickaki_somi.png', 160.000, 0.000, NULL, 1, 4, '2023-05-10', '2023-05-10'),
(40, 'Áo sơ mi tay ngắn OLDMAN', 'somi_oldman.png', 120.000, 0.000, NULL, 1, 4, '2023-05-10', '2023-05-10'),
(41, 'Áo sơ mi Simple Fashion bigsize', 'somi_simple.png', 150.000, 0.000, NULL, 1, 4, '2023-05-10', '2023-05-10'),
(42, 'Quần Jean rách gối', 'jean_rach.png', 250.000, 0.000, NULL, 1, 5, '2023-05-10', '2023-05-10'),
(43, 'Quần Jean trơn basic', 'jean_basic.png', 200.000, 0.000, NULL, 1, 5, '2023-05-10', '2023-05-10'),
(44, 'Quần Jean bò cao cấp', 'jean_bo.png', 250.000, 0.000, NULL, 1, 5, '2023-05-10', '2023-05-10'),
(45, 'Quần Jean Amiri rách lót da', 'jean_amiri.png', 200.000, 0.000, NULL, 1, 5, '2023-05-10', '2023-05-10'),
(46, 'Quần jean skinny Amiri wash xanh', 'jean_skini.png', 250.000, 0.000, NULL, 1, 5, '2023-05-10', '2023-05-10'),
(47, 'Quần Jean nam Skinny Amiri Slimfit', 'jean_slimfit.png', 200.000, 0.000, NULL, 1, 5, '2023-05-10', '2023-05-10'),
(48, 'Quần jeans rách gối màu đen ', 'jean_rachgoi.png', 250.000, 0.000, NULL, 1, 5, '2023-05-10', '2023-05-10'),
(49, 'Quần Jean xám khói nhạt', 'jean_nhat.png', 200.000, 0.000, NULL, 1, 5, '2023-05-10', '2023-05-10'),
(50, 'Quần Jean màu xanh nhạt', 'jean_xanh.png', 180.000, 0.000, NULL, 1, 5, '2023-05-10', '2023-05-10'),
(51, 'Quần Jean Style Phong Cách', 'jean_style.png', 200.000, 0.000, NULL, 1, 5, '2023-05-10', '2023-05-10'),
(52, 'Quần Tây Cạp Cao', 'tay_au.png', 250.000, 0.000, NULL, 1, 6, '2023-05-10', '2023-05-10'),
(53, 'Quần Tây Âu Hàn Quốc', 'au_han.png', 350.000, 0.000, NULL, 1, 6, '2023-05-10', '2023-05-10'),
(54, 'Quần tây ống côn Hàn Quốc', 'tay_con.png', 250.000, 0.000, NULL, 1, 6, '2023-05-10', '2023-05-10'),
(55, 'Quần tây Hàn Quốc cạp chun', 'tay_chun.png', 150.000, 0.000, NULL, 1, 6, '2023-05-10', '2023-05-10'),
(56, 'Quần Tây Hàn Quốc SideTab', 'tay_sidetab.png', 200.000, 0.000, NULL, 1, 6, '2023-05-10', '2023-05-10'),
(57, 'Quần tây ống xuông cạp cao', 'tay_xuuong.png', 300.000, 0.000, NULL, 1, 6, '2023-05-10', '2023-05-10'),
(58, 'Quần tây basic PATTERN', 'tay_pattern.png', 250.000, 0.000, NULL, 1, 6, '2023-05-10', '2023-05-10'),
(59, 'Quần tây baggy SMART PANT', 'tay_pant.png', 200.000, 0.000, NULL, 1, 6, '2023-05-10', '2023-05-10'),
(60, 'Quần tây ống rộng INVENNUS', 'tay_invennus.png', 200.000, 0.000, NULL, 1, 6, '2023-05-10', '2023-05-10'),
(61, 'Quần tây âu nam Akuba', 'tay_abuka.png', 200.000, 0.000, NULL, 1, 6, '2023-05-10', '2023-05-10'),
(62, 'Quần short jean AOKANG', 'short_jean.png', 250.000, 0.000, NULL, 1, 7, '2023-05-10', '2023-05-10'),
(63, 'Quần short thun WIND unisex', 'short_unisex.png', 150.000, 0.000, NULL, 1, 7, '2023-05-10', '2023-05-10'),
(64, 'Quần short kaki túi hộp bigsize', 'short_kaki.png', 180.000, 0.000, NULL, 1, 7, '2023-05-10', '2023-05-10'),
(65, 'Quần short unisex màu đen vải thun ', 'short_unisex1.png', 130.000, 0.000, NULL, 1, 7, '2023-05-10', '2023-05-10'),
(66, ' Quần short bò unisex', 'short_bo.png', 170.000, 0.000, NULL, 1, 7, '2023-05-10', '2023-05-10'),
(67, 'Quần short Qthouse', 'short_Qthouse.png', 170.000, 0.000, NULL, 1, 7, '2023-05-10', '2023-05-10'),
(68, 'Quần Short Nỉ ODIN Essentials', 'short_ni.png', 190.000, 0.000, NULL, 1, 7, '2023-05-10', '2023-05-10'),
(69, 'Quần Short Peter ODIN CLUB', 'short_odin.png', 190.000, 0.000, NULL, 1, 7, '2023-05-10', '2023-05-10'),
(70, 'Quần Short Unisex HADES ', 'short_hade.png', 180.000, 0.000, NULL, 1, 7, '2023-05-10', '2023-05-10'),
(71, 'Quần Short Kaki Unisex PACI', 'short_paci.png', 120.000, 0.000, NULL, 1, 7, '2023-05-10', '2023-05-10'),
(72, 'QUẦN SHORT KAKI DESSUU', 'short_desu.png', 120.000, 0.000, NULL, 1, 7, '2023-05-10', '2023-05-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hiền', 'ltthien.20it4@vku.udn.vn', NULL, '$2y$10$JPBTuvLARdRSIjce/aJQAeByC60CUP7zrdvkZue2riDGaIeIosKUK', '0', NULL, '2023-05-10 08:02:33', '2023-05-10 08:02:33'),
(2, 'admin', 'admin123@gmail.com', NULL, '$2y$10$zfCmMhBigy3gmJGjaIapVO5QQz2N69i1kDjUHAIOT8UQRPWSdOYRu', '1', NULL, '2023-05-10 09:29:22', '2023-05-10 09:29:22'),
(7, 'linh', 'linh@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(8, 'lam', 'lam@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(9, 'trang', 'trang@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(10, 'nam', 'nam@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(11, 'Hoa', 'hoa123@gmail.com', NULL, '123', '0', NULL, '2023-07-10 01:02:33', '2023-07-10 01:02:33'),
(12, 'hue', 'hue123@gmail.com', NULL, '123', '0', NULL, '2023-06-10 02:29:22', '2023-06-10 02:29:22'),
(13, 'lan', 'lan@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(14, 'huong', 'huong@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(15, 'truc', 'truc@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(16, 'mai', 'mai@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(17, 'Hoang', 'hoang123@gmail.com', NULL, '123', '0', NULL, NULL, NULL),
(18, 'hung', 'hung@gmail.com', NULL, '123', '0', NULL, NULL, NULL),
(19, 'loan', 'loan@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(20, 'huong', 'huong123@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(21, 'truc', 'truc123@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(22, 'mai', 'mai123@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(23, 'tam', 'tam@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(24, 'cam', 'cam@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(25, 'hai', 'hai@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(26, 'minh', 'minh@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(27, 'ly', 'ly@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(28, 'chieu', 'chieu@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(29, 'anh', 'anh@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(30, 'khoi', 'khoi@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(31, 'khoa', 'khoa@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(32, 'khanh', 'khanh@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(33, 'ngan', 'ngan@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(34, 'vuong', 'vuong@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(35, 'nhien', 'nhien@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(36, 'thu', 'thu@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(37, 'giang', 'giang@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(38, 'truong', 'truong@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(39, 'tran', 'tran@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(40, 'han', 'han@gmail.com', '0000-00-00 00:00:00', '123', '0', NULL, NULL, NULL),
(41, 'tung', 'tung123456@gmail.com', NULL, '$2y$10$/HRM1AqagVmNT3ks6NATsuacTmzx7zHkLngr9nU0mykmhPrfAxAFO', '0', NULL, '2023-12-09 08:01:19', '2023-12-09 08:01:19'),
(42, 'thuy', 'thuy@gmail.com', NULL, '$2y$10$K1lmGJF/grdIeJvbJf/WIeWoiHHObwQIpkfOiIb.C8RTUbTjHjkVG', '0', NULL, '2023-12-09 10:14:38', '2023-12-09 10:14:38');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_ibfk_1` (`users_id`),
  ADD KEY `comment_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`users_id`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_detail_ibfk_1` (`orders_id`),
  ADD KEY `orders_detail_ibfk_2` (`product_id`);

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
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_ibfk_1` (`category_id`);

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
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `fk_orders` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
