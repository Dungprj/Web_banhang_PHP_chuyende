-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 14, 2024 lúc 10:11 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bandienmay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Hiếu Tấn'),
(2, 'admin', '202cb962ac59075b964b07152d234b70', 'Dung'),
(3, 'abc123@gmail.com', '93f7a4cd6a567b8302795dbfd4617a05', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_baiviet`
--

CREATE TABLE `tbl_baiviet` (
  `baiviet_id` int(11) NOT NULL,
  `tenbaiviet` varchar(100) NOT NULL,
  `tomtat` text NOT NULL,
  `noidung` text NOT NULL,
  `danhmuctin_id` int(11) NOT NULL,
  `baiviet_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_baiviet`
--

INSERT INTO `tbl_baiviet` (`baiviet_id`, `tenbaiviet`, `tomtat`, `noidung`, `danhmuctin_id`, `baiviet_image`) VALUES
(1, 'Bài 1 : Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 'a4.jpg'),
(2, 'Bài 2: Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 2, 'm3.jpg'),
(3, 'Bài 3: Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 3, 'k2.jpg'),
(4, 'Bài 4 :Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 4, 'b4.jpg'),
(5, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Bài 5 : Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 4, 'm8.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Laptop'),
(2, 'Tủ lạnh'),
(3, 'Máy giặc'),
(4, 'Điện thoại'),
(5, 'Tivi ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc_tin`
--

CREATE TABLE `tbl_danhmuc_tin` (
  `danhmuctin_id` int(11) NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc_tin`
--

INSERT INTO `tbl_danhmuc_tin` (`danhmuctin_id`, `tendanhmuc`) VALUES
(1, 'Kiến thức máy lạnh'),
(2, 'Kiến thức máy giặc'),
(3, 'Kiến thức laptop'),
(4, 'Kiến thức Tivi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mahang` varchar(50) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tinhtrang` int(11) NOT NULL,
  `huydon` int(11) NOT NULL DEFAULT 0,
  `voucher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`donhang_id`, `sanpham_id`, `soluong`, `mahang`, `khachhang_id`, `ngaythang`, `tinhtrang`, `huydon`, `voucher_id`) VALUES
(10, 17, 7, '3060', 12, '2019-10-01 04:11:55', 1, 0, NULL),
(11, 21, 5, '8979', 14, '2019-10-04 02:29:52', 0, 0, NULL),
(12, 26, 6, '8979', 14, '2019-10-04 02:29:52', 0, 0, NULL),
(13, 20, 3, '4236', 15, '2019-10-04 02:33:55', 0, 0, NULL),
(14, 21, 4, '4236', 15, '2019-10-04 02:33:56', 0, 0, NULL),
(15, 20, 3, '6503', 16, '2019-10-04 02:34:56', 0, 0, NULL),
(16, 21, 4, '6503', 16, '2019-10-04 02:34:56', 0, 0, NULL),
(17, 21, 1, '2508', 17, '2019-10-04 02:35:19', 0, 0, NULL),
(18, 26, 3, '4249', 18, '2019-10-04 02:45:46', 0, 0, NULL),
(19, 26, 3, '8728', 19, '2019-10-04 02:46:40', 0, 0, NULL),
(20, 21, 1, '5037', 20, '2019-10-04 02:48:16', 0, 0, NULL),
(21, 20, 1, '5037', 20, '2019-10-04 02:48:17', 0, 0, NULL),
(22, 21, 1, '1594', 21, '2019-10-04 02:51:05', 0, 0, NULL),
(23, 20, 1, '1594', 21, '2019-10-04 02:51:05', 0, 0, NULL),
(24, 20, 1, '2323', 22, '2019-10-04 02:54:27', 0, 0, NULL),
(25, 21, 3, '2323', 22, '2019-10-04 02:54:27', 0, 0, NULL),
(26, 21, 2, '5737', 23, '2019-10-04 02:57:00', 0, 0, NULL),
(28, 25, 3, '7785', 25, '2019-10-04 03:11:51', 0, 0, NULL),
(29, 22, 5, '7785', 25, '2019-10-04 03:11:52', 0, 0, NULL),
(30, 27, 2, '7785', 25, '2019-10-04 03:11:52', 0, 0, NULL),
(31, 21, 1, '5396', 26, '2019-10-04 03:49:08', 0, 0, NULL),
(32, 20, 3, '5396', 26, '2019-10-04 03:49:08', 0, 0, NULL),
(33, 20, 3, '7914', 28, '2019-10-05 05:38:42', 0, 0, NULL),
(34, 26, 1, '7914', 28, '2019-10-05 05:38:42', 0, 0, NULL),
(35, 25, 2, '6687', 27, '2019-10-09 09:48:42', 1, 2, NULL),
(36, 26, 3, '6687', 27, '2019-10-09 09:48:42', 1, 2, NULL),
(37, 27, 1, '6687', 27, '2019-10-09 09:48:42', 1, 2, NULL),
(38, 22, 1, '1125', 27, '2019-10-09 09:47:17', 1, 2, NULL),
(39, 24, 1, '1125', 27, '2019-10-09 09:47:17', 1, 2, NULL),
(40, 20, 1, '555', 27, '2019-10-09 09:50:07', 0, 2, NULL),
(41, 21, 9, '8370', 29, '2024-08-22 07:52:38', 0, 1, NULL),
(42, 20, 8, '8370', 29, '2024-08-22 07:52:38', 0, 1, NULL),
(44, 20, 2, '8620', 32, '2024-08-22 08:57:32', 0, 0, NULL),
(45, 20, 1, '1861', 34, '2024-08-22 09:05:46', 0, 0, NULL),
(46, 22, 10, '3939', 35, '2024-08-23 10:25:56', 0, 0, NULL),
(47, 20, 2, '3939', 35, '2024-08-23 10:25:56', 0, 0, NULL),
(48, 19, 3, '3939', 35, '2024-08-23 10:25:56', 0, 0, NULL),
(49, 18, 1, '3939', 35, '2024-08-23 10:25:56', 0, 0, NULL),
(50, 18, 1, '1309', 35, '2024-08-23 10:26:42', 0, 0, NULL),
(51, 20, 4, '6332', 35, '2024-08-23 10:30:13', 0, 0, NULL),
(52, 18, 1, '8728', 35, '2024-08-23 13:15:55', 0, 0, NULL),
(53, 20, 1, '4836', 35, '2024-08-23 13:19:06', 0, 0, NULL),
(54, 18, 1, '9648', 35, '2024-08-23 13:22:26', 0, 0, NULL),
(55, 18, 1, '6404', 35, '2024-08-23 13:22:57', 0, 0, NULL),
(56, 18, 1, '3588', 35, '2024-08-23 13:23:05', 0, 0, NULL),
(57, 18, 90, '3273', 35, '2024-08-23 13:24:28', 0, 0, NULL),
(58, 24, 8, '9062', 35, '2024-08-23 13:30:28', 0, 0, NULL),
(59, 24, 8, '8040', 35, '2024-08-23 13:30:42', 0, 0, NULL),
(60, 21, 1, '9821', 35, '2024-08-23 13:32:21', 0, 0, NULL),
(61, 26, 1, '9821', 35, '2024-08-23 13:32:21', 0, 0, NULL),
(62, 20, 1, '1222', 35, '2024-08-23 13:32:56', 0, 0, NULL),
(63, 19, 1, '7363', 35, '2024-08-23 13:33:18', 0, 0, NULL),
(64, 20, 1, '2234', 37, '2024-08-23 13:34:29', 0, 0, NULL),
(65, 18, 1, '2234', 37, '2024-08-23 13:34:29', 0, 0, NULL),
(66, 20, 1, '7638', 29, '2024-08-23 14:30:39', 0, 0, NULL),
(67, 18, 1, '2831', 29, '2024-08-23 14:33:31', 0, 0, NULL),
(68, 20, 1, '813', 29, '2024-08-23 14:35:54', 0, 0, NULL),
(69, 26, 1, '7200', 29, '2024-08-23 14:36:59', 0, 0, NULL),
(70, 26, 1, '6164', 29, '2024-08-23 14:38:13', 0, 0, NULL),
(71, 17, 5, '7044', 29, '2024-08-23 14:38:27', 0, 0, NULL),
(72, 20, 1, '4062', 29, '2024-08-23 14:39:55', 0, 0, NULL),
(73, 20, 1, '2544', 29, '2024-08-23 14:40:13', 0, 0, NULL),
(74, 21, 1, '2393', 29, '2024-08-24 05:36:29', 0, 0, NULL),
(75, 18, 5, '700', 29, '2024-08-25 16:11:07', 0, 0, 35),
(76, 26, 1, '700', 29, '2024-08-25 16:11:07', 0, 0, 35),
(77, 20, 1, '700', 29, '2024-08-25 16:11:07', 0, 0, 35),
(78, 20, 1, '8951', 29, '2024-08-25 16:27:19', 0, 0, 35),
(79, 17, 1, '8951', 29, '2024-08-25 16:27:19', 0, 0, 35),
(80, 22, 10, '5236', 29, '2024-08-25 16:28:38', 0, 0, 36),
(81, 26, 8, '7096', 29, '2024-08-26 06:06:30', 0, 0, 38),
(82, 20, 9, '5799', 29, '2024-08-26 06:31:37', 0, 0, 39),
(83, 18, 1, '5799', 29, '2024-08-26 06:31:37', 0, 0, 39),
(84, 20, 1, '5812', 29, '2024-08-26 06:33:12', 0, 0, 39),
(85, 21, 5, '4312', 29, '2024-08-29 08:32:41', 0, 0, 37),
(86, 18, 2, '1442', 29, '2024-09-14 07:45:00', 0, 0, 37),
(87, 21, 3, '1442', 29, '2024-09-14 07:45:00', 0, 0, 37),
(88, 19, 10, '1442', 29, '2024-09-14 07:45:00', 0, 0, 37),
(89, 19, 3, '7163', 29, '2024-09-14 07:46:55', 0, 0, 35),
(90, 21, 3, '7163', 29, '2024-09-14 07:46:55', 0, 0, 35),
(91, 19, 5, '6357', 29, '2024-09-14 07:48:07', 0, 0, 35),
(92, 20, 3, '6357', 29, '2024-09-14 07:48:07', 0, 0, 35),
(93, 26, 9, '6357', 29, '2024-09-14 07:48:07', 0, 0, 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaodich`
--

CREATE TABLE `tbl_giaodich` (
  `giaodich_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `magiaodich` varchar(50) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `khachhang_id` int(11) NOT NULL,
  `tinhtrangdon` int(11) NOT NULL DEFAULT 0,
  `huydon` int(11) NOT NULL DEFAULT 0,
  `voucher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaodich`
--

INSERT INTO `tbl_giaodich` (`giaodich_id`, `sanpham_id`, `soluong`, `magiaodich`, `ngaythang`, `khachhang_id`, `tinhtrangdon`, `huydon`, `voucher_id`) VALUES
(3, 21, 2, '5737', '2019-10-04 02:57:00', 23, 0, 0, NULL),
(4, 26, 1, '6219', '2019-10-04 02:58:34', 24, 0, 0, NULL),
(5, 25, 3, '7785', '2019-10-04 03:11:52', 25, 0, 0, NULL),
(6, 22, 5, '7785', '2019-10-04 03:11:52', 25, 0, 0, NULL),
(7, 27, 2, '7785', '2019-10-04 03:11:52', 25, 0, 0, NULL),
(8, 21, 1, '5396', '2019-10-04 03:49:08', 26, 0, 0, NULL),
(9, 20, 3, '5396', '2019-10-04 03:49:08', 26, 0, 0, NULL),
(10, 20, 3, '7914', '2019-10-05 05:38:42', 28, 0, 0, NULL),
(11, 26, 1, '7914', '2019-10-05 05:38:42', 28, 0, 0, NULL),
(12, 25, 2, '6687', '2019-10-09 09:48:42', 27, 1, 2, NULL),
(13, 26, 3, '6687', '2019-10-09 09:48:42', 27, 1, 2, NULL),
(14, 27, 1, '6687', '2019-10-09 09:48:42', 27, 1, 2, NULL),
(15, 22, 1, '1125', '2019-10-09 09:47:17', 27, 1, 2, NULL),
(16, 24, 1, '1125', '2019-10-09 09:47:17', 27, 1, 2, NULL),
(17, 20, 1, '555', '2019-10-09 09:50:08', 27, 0, 2, NULL),
(18, 21, 9, '8370', '2024-08-22 07:52:38', 29, 0, 1, NULL),
(19, 20, 8, '8370', '2024-08-22 07:52:38', 29, 0, 1, NULL),
(20, 21, 1, '8409', '2024-08-23 14:10:50', 29, 0, 1, NULL),
(21, 20, 2, '8620', '2024-08-22 08:57:32', 32, 0, 0, NULL),
(22, 20, 1, '1861', '2024-08-22 09:05:46', 34, 0, 0, NULL),
(23, 22, 10, '3939', '2024-08-23 10:25:56', 35, 0, 0, NULL),
(24, 20, 2, '3939', '2024-08-23 10:25:56', 35, 0, 0, NULL),
(25, 19, 3, '3939', '2024-08-23 10:25:56', 35, 0, 0, NULL),
(26, 18, 1, '3939', '2024-08-23 10:25:56', 35, 0, 0, NULL),
(27, 18, 1, '1309', '2024-08-23 10:26:42', 35, 0, 0, NULL),
(28, 20, 4, '6332', '2024-08-23 10:30:13', 35, 0, 0, NULL),
(29, 18, 1, '8728', '2024-08-23 13:15:55', 35, 0, 0, NULL),
(30, 20, 1, '4836', '2024-08-23 13:19:06', 35, 0, 0, NULL),
(31, 18, 1, '9648', '2024-08-23 13:22:26', 35, 0, 0, NULL),
(32, 18, 1, '6404', '2024-08-23 13:22:57', 35, 0, 0, NULL),
(33, 18, 1, '3588', '2024-08-23 13:23:05', 35, 0, 0, NULL),
(34, 18, 90, '3273', '2024-08-23 13:24:28', 35, 0, 0, NULL),
(35, 24, 8, '9062', '2024-08-23 13:30:28', 35, 0, 0, NULL),
(36, 24, 8, '8040', '2024-08-23 13:30:42', 35, 0, 0, NULL),
(37, 21, 1, '9821', '2024-08-23 13:32:21', 35, 0, 0, NULL),
(38, 26, 1, '9821', '2024-08-23 13:32:21', 35, 0, 0, NULL),
(39, 20, 1, '1222', '2024-08-23 13:32:56', 35, 0, 0, NULL),
(40, 19, 1, '7363', '2024-08-23 13:33:18', 35, 0, 0, NULL),
(41, 20, 1, '2234', '2024-08-23 13:34:29', 37, 0, 0, NULL),
(42, 18, 1, '2234', '2024-08-23 13:34:29', 37, 0, 0, NULL),
(43, 20, 1, '7638', '2024-08-23 14:30:39', 29, 0, 0, NULL),
(44, 18, 1, '2831', '2024-08-23 14:33:31', 29, 0, 0, NULL),
(45, 20, 1, '813', '2024-08-23 14:35:54', 29, 0, 0, NULL),
(46, 26, 1, '7200', '2024-08-23 14:36:59', 29, 0, 0, NULL),
(47, 26, 1, '6164', '2024-08-23 14:38:13', 29, 0, 0, NULL),
(48, 17, 5, '7044', '2024-08-23 14:38:27', 29, 0, 0, NULL),
(49, 20, 1, '4062', '2024-08-23 14:39:55', 29, 0, 0, NULL),
(50, 20, 1, '2544', '2024-08-23 14:40:13', 29, 0, 0, NULL),
(51, 21, 1, '2393', '2024-08-24 05:36:29', 29, 0, 0, NULL),
(52, 18, 5, '700', '2024-08-25 16:11:07', 29, 0, 0, 35),
(53, 26, 1, '700', '2024-08-25 16:11:07', 29, 0, 0, 35),
(54, 20, 1, '700', '2024-08-25 16:11:07', 29, 0, 0, 35),
(55, 20, 1, '8951', '2024-08-25 16:27:19', 29, 0, 0, 35),
(56, 17, 1, '8951', '2024-08-25 16:27:19', 29, 0, 0, 35),
(57, 22, 10, '5236', '2024-08-25 16:28:38', 29, 0, 0, 36),
(58, 26, 8, '7096', '2024-08-26 06:06:30', 29, 0, 0, 38),
(59, 20, 9, '5799', '2024-08-26 06:31:37', 29, 0, 0, 39),
(60, 18, 1, '5799', '2024-08-26 06:31:37', 29, 0, 0, 39),
(61, 20, 1, '5812', '2024-08-26 06:33:12', 29, 0, 0, 39),
(62, 21, 5, '4312', '2024-08-29 08:32:41', 29, 0, 0, 37),
(63, 18, 2, '1442', '2024-09-14 07:45:00', 29, 0, 0, 37),
(64, 21, 3, '1442', '2024-09-14 07:45:00', 29, 0, 0, 37),
(65, 19, 10, '1442', '2024-09-14 07:45:00', 29, 0, 0, 37),
(66, 19, 3, '7163', '2024-09-14 07:46:55', 29, 0, 0, 35),
(67, 21, 3, '7163', '2024-09-14 07:46:55', 29, 0, 0, 35),
(68, 19, 5, '6357', '2024-09-14 07:48:07', 29, 0, 0, 35),
(69, 20, 3, '6357', '2024-09-14 07:48:07', 29, 0, 0, 35),
(70, 26, 9, '6357', '2024-09-14 07:48:07', 29, 0, 0, 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `giohang_id` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `giasanpham` varchar(50) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`giohang_id`, `tensanpham`, `sanpham_id`, `giasanpham`, `hinhanh`, `soluong`, `khachhang_id`) VALUES
(44, 'Tivi sony 40', 19, '5600000', 'm4.jpg', 1, 0),
(64, 'Tivi sony 29', 18, '5000000', 'm4.jpg', 4, 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `giaohang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`khachhang_id`, `name`, `phone`, `address`, `note`, `email`, `password`, `giaohang`) VALUES
(12, 'Hiếu', '0932023992', '123/123', 'dasdasdas', 'hieu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(13, 'Long Hoàng', '01694494813', '123/123', 'dasdasdas', 'long@gmail.com', '0192023a7bbd73250516f069df18b500', 0),
(14, 'Hoàng Long', '0932023992', '123/123', 'dsadas', 'hoanglong@gmail.com', '', 1),
(22, 'Nam', '0932023992', '123/123', 'dasdas', 'name123@gmail.com', '', 1),
(23, 'Nam', '0932023992', '123/123', 'dasdasd', 'name456@gmail.com', '', 1),
(24, 'Hoa', '0932023992', '123/123', 'dasdas', 'hoa@gmail.com', '', 0),
(25, 'Hoàng Kha', '0932023992', '123/123', 'dasdasdas', 'hoangkha@gmail.com', '', 1),
(26, 'Trương Lưu', '0932023992', '123/123', 'dasdasdas', 'truongluu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(27, 'Trương Huệ Mẫn', '0932023992', '123', 'dasdasdasd', 'hueman@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(28, 'Hoa', '0932023992', '123/123', 'dasdasdads', 'hoa@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(29, 'Nguyen Tien Dung 123', '0962988318', 'hai phong', 'okbaby', 'doibatcong2003@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(30, 'abc', '0962988318', 'hp', '', 'doibatcong2003@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(31, 'abc', '0962988318', 'hp', 'gg', 'doibatcong2003@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(32, 'Nguyen Tien Dung', '0962988318', 'hp', 'hh', 'doibatcong2003@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(33, 'Nguyen Tien Dung', '0962988318', 'hp', 'ádfdsf', 'doibatcong2003@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(34, 'Nguyen Tien Dung', '0962988318', 'hp', '123', 'doibatcong2003@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(35, 'dungok', '1234565', 'hp', 'sfd', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(36, 'dungkk', '2345566777', 'hp', 'sdfdsf', 'abc123@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(37, 'Nguyen Tien Dung', '0962988318', 'hp', '12313', 'doibatcong2003@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sanpham_name` varchar(255) NOT NULL,
  `sanpham_chitiet` text NOT NULL,
  `sanpham_mota` text NOT NULL,
  `sanpham_gia` varchar(100) NOT NULL,
  `sanpham_giakhuyenmai` varchar(100) NOT NULL,
  `sanpham_active` int(11) NOT NULL,
  `sanpham_hot` int(11) NOT NULL,
  `sanpham_soluong` int(11) NOT NULL,
  `sanpham_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `category_id`, `sanpham_name`, `sanpham_chitiet`, `sanpham_mota`, `sanpham_gia`, `sanpham_giakhuyenmai`, `sanpham_active`, `sanpham_hot`, `sanpham_soluong`, `sanpham_image`) VALUES
(1, 4, 'iPhone 15 Pro Max 256GB VN/A', '', '', '28390000', '28390000', 0, 0, 15, 'iphone_15prm.jpg'),
(2, 4, 'Samsung Galaxy S24 Ultra', '', '', '24290000', '24290000', 0, 0, 20, 'samsung_s24_ultra.jpg'),
(30, 4, 'iPhone 16 (256GB) - Chính hãng VN/A', '', '', '25990000', '25990000', 0, 0, 30, 'ip16-xanh-mong-ket.png');



-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_caption` text NOT NULL,
  `slider_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `slider_caption`, `slider_active`) VALUES
(1, 'b2.jpg', 'Slider khuyến mãi ', 1),
(2, 'b3.jpg', 'Slider 50%', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tiketdiscount`
--

CREATE TABLE `tbl_tiketdiscount` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phanTramGiam` double(10,2) DEFAULT NULL,
  `ngayBatDau` datetime DEFAULT NULL,
  `ngayKetThuc` datetime DEFAULT NULL,
  `soLuong` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tiketdiscount`
--

INSERT INTO `tbl_tiketdiscount` (`id`, `name`, `phanTramGiam`, `ngayBatDau`, `ngayKetThuc`, `soLuong`) VALUES
(35, 'mùa thu', 10.00, '2024-09-13 22:49:00', '2024-09-30 22:49:00', 86),
(36, 'kkk', 99.00, '2024-08-15 23:27:00', '2024-08-31 23:28:00', 0),
(37, 'kkl', 50.00, '2024-08-22 12:49:00', '2024-08-31 12:49:00', 0),
(38, 'uuu', 100.00, '2024-08-23 12:50:00', '2024-08-31 12:50:00', 0),
(39, 'ii', 200.00, '2024-08-17 13:12:00', '2024-08-31 13:12:00', 0),
(40, 'lkkkk', 90.00, '2024-08-24 13:34:00', '2024-08-31 13:35:00', 5),
(41, 'longk', 77.00, '2024-08-24 13:47:00', '2024-08-31 13:47:00', 50);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_usevoucher`
--

CREATE TABLE `tbl_usevoucher` (
  `id` int(11) NOT NULL,
  `khachhang_id` int(11) DEFAULT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `ngaySudung` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_usevoucher`
--

INSERT INTO `tbl_usevoucher` (`id`, `khachhang_id`, `voucher_id`, `ngaySudung`) VALUES
(53, 29, 0, '2024-08-29 15:32:41'),
(54, 29, 0, '2024-09-14 14:45:00'),
(55, 29, 0, '2024-09-14 14:46:55'),
(56, 29, 0, '2024-09-14 14:48:07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  ADD PRIMARY KEY (`baiviet_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  ADD PRIMARY KEY (`danhmuctin_id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`donhang_id`);

--
-- Chỉ mục cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  ADD PRIMARY KEY (`giaodich_id`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`giohang_id`),
  ADD UNIQUE KEY `user_id` (`giohang_id`,`tensanpham`,`sanpham_id`,`giasanpham`,`hinhanh`,`soluong`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `tbl_tiketdiscount`
--
ALTER TABLE `tbl_tiketdiscount`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_usevoucher`
--
ALTER TABLE `tbl_usevoucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_baiviet`
--
ALTER TABLE `tbl_baiviet`
  MODIFY `baiviet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  MODIFY `danhmuctin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  MODIFY `giaodich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_tiketdiscount`
--
ALTER TABLE `tbl_tiketdiscount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_usevoucher`
--
ALTER TABLE `tbl_usevoucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
