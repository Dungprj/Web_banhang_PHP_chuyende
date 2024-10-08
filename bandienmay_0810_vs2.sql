-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2024 lúc 06:29 PM
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
-- Cơ sở dữ liệu: `bandienmay4`
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
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Hiếu Tấn'),
(2, 'tuan@gmail.com', '123', 'tuấn'),
(3, 'admin', '202cb962ac59075b964b07152d234b70', 'Dung');

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
  `voucher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`donhang_id`, `sanpham_id`, `soluong`, `mahang`, `khachhang_id`, `ngaythang`, `tinhtrang`, `huydon`, `voucher_id`) VALUES
(10, 17, 7, '3060', 12, '2019-10-01 04:11:55', 1, 0, 0),
(11, 21, 5, '8979', 14, '2019-10-04 02:29:52', 0, 0, 0),
(12, 26, 6, '8979', 14, '2019-10-04 02:29:52', 0, 0, 0),
(13, 20, 3, '4236', 15, '2019-10-04 02:33:55', 0, 0, 0),
(14, 21, 4, '4236', 15, '2019-10-04 02:33:56', 0, 0, 0),
(15, 20, 3, '6503', 16, '2019-10-04 02:34:56', 0, 0, 0),
(16, 21, 4, '6503', 16, '2019-10-04 02:34:56', 0, 0, 0),
(17, 21, 1, '2508', 17, '2019-10-04 02:35:19', 0, 0, 0),
(18, 26, 3, '4249', 18, '2019-10-04 02:45:46', 0, 0, 0),
(19, 26, 3, '8728', 19, '2019-10-04 02:46:40', 0, 0, 0),
(20, 21, 1, '5037', 20, '2019-10-04 02:48:16', 0, 0, 0),
(21, 20, 1, '5037', 20, '2019-10-04 02:48:17', 0, 0, 0),
(22, 21, 1, '1594', 21, '2019-10-04 02:51:05', 0, 0, 0),
(23, 20, 1, '1594', 21, '2019-10-04 02:51:05', 0, 0, 0),
(24, 20, 1, '2323', 22, '2019-10-04 02:54:27', 0, 0, 0),
(25, 21, 3, '2323', 22, '2019-10-04 02:54:27', 0, 0, 0),
(26, 21, 2, '5737', 23, '2019-10-04 02:57:00', 0, 0, 0),
(28, 25, 3, '7785', 25, '2019-10-04 03:11:51', 0, 0, 0),
(29, 22, 5, '7785', 25, '2019-10-04 03:11:52', 0, 0, 0),
(30, 27, 2, '7785', 25, '2019-10-04 03:11:52', 0, 0, 0),
(31, 21, 1, '5396', 26, '2019-10-04 03:49:08', 0, 0, 0),
(32, 20, 3, '5396', 26, '2019-10-04 03:49:08', 0, 0, 0),
(33, 20, 3, '7914', 28, '2019-10-05 05:38:42', 0, 0, 0),
(34, 26, 1, '7914', 28, '2019-10-05 05:38:42', 0, 0, 0),
(35, 25, 2, '6687', 27, '2019-10-09 09:48:42', 1, 2, 0),
(36, 26, 3, '6687', 27, '2019-10-09 09:48:42', 1, 2, 0),
(37, 27, 1, '6687', 27, '2019-10-09 09:48:42', 1, 2, 0),
(38, 22, 1, '1125', 27, '2019-10-09 09:47:17', 1, 2, 0),
(39, 24, 1, '1125', 27, '2019-10-09 09:47:17', 1, 2, 0),
(40, 20, 1, '555', 27, '2019-10-09 09:50:07', 0, 2, 0),
(41, 45, 5, '3605', 30, '2024-10-08 16:12:13', 0, 0, 43),
(42, 32, 1, '3605', 30, '2024-10-08 16:12:13', 0, 0, 43),
(43, 45, 1, '4953', 30, '2024-10-08 16:12:41', 0, 0, 43),
(48, 31, 1, '3233', 30, '2024-10-08 16:13:58', 0, 0, 35),
(51, 29, 1, '4527', 30, '2024-10-08 16:25:16', 0, 0, 35),
(52, 31, 1, '4527', 30, '2024-10-08 16:25:16', 0, 0, 35),
(53, 17, 1, '4527', 30, '2024-10-08 16:25:16', 0, 0, 35),
(54, 24, 3, '4440', 30, '2024-10-08 16:28:38', 0, 0, 35),
(55, 21, 1, '4440', 30, '2024-10-08 16:28:38', 0, 0, 35);

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
  `voucher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaodich`
--

INSERT INTO `tbl_giaodich` (`giaodich_id`, `sanpham_id`, `soluong`, `magiaodich`, `ngaythang`, `khachhang_id`, `tinhtrangdon`, `huydon`, `voucher_id`) VALUES
(3, 21, 2, '5737', '2019-10-04 02:57:00', 23, 0, 0, 0),
(4, 26, 1, '6219', '2019-10-04 02:58:34', 24, 0, 0, 0),
(5, 25, 3, '7785', '2019-10-04 03:11:52', 25, 0, 0, 0),
(6, 22, 5, '7785', '2019-10-04 03:11:52', 25, 0, 0, 0),
(7, 27, 2, '7785', '2019-10-04 03:11:52', 25, 0, 0, 0),
(8, 21, 1, '5396', '2019-10-04 03:49:08', 26, 0, 0, 0),
(9, 20, 3, '5396', '2019-10-04 03:49:08', 26, 0, 0, 0),
(10, 20, 3, '7914', '2019-10-05 05:38:42', 28, 0, 0, 0),
(11, 26, 1, '7914', '2019-10-05 05:38:42', 28, 0, 0, 0),
(12, 25, 2, '6687', '2019-10-09 09:48:42', 27, 1, 2, 0),
(13, 26, 3, '6687', '2019-10-09 09:48:42', 27, 1, 2, 0),
(14, 27, 1, '6687', '2019-10-09 09:48:42', 27, 1, 2, 0),
(15, 22, 1, '1125', '2019-10-09 09:47:17', 27, 1, 2, 0),
(16, 24, 1, '1125', '2019-10-09 09:47:17', 27, 1, 2, 0),
(17, 20, 1, '555', '2019-10-09 09:50:08', 27, 0, 2, 0),
(18, 45, 5, '3605', '2024-10-08 16:12:13', 30, 0, 0, 43),
(19, 32, 1, '3605', '2024-10-08 16:12:13', 30, 0, 0, 43),
(20, 45, 1, '4953', '2024-10-08 16:12:41', 30, 0, 0, 43),
(21, 45, 3, '8870', '2024-10-08 16:12:58', 30, 0, 0, 43),
(22, 32, 3, '8870', '2024-10-08 16:12:58', 30, 0, 0, 43),
(23, 45, 5, '7950', '2024-10-08 16:13:48', 30, 0, 0, 43),
(24, 32, 5, '7950', '2024-10-08 16:13:48', 30, 0, 0, 43),
(25, 31, 1, '3233', '2024-10-08 16:13:58', 30, 0, 0, 35),
(26, 45, 3, '8440', '2024-10-08 16:15:30', 30, 0, 0, 35),
(27, 31, 1, '8440', '2024-10-08 16:15:30', 30, 0, 0, 35),
(28, 29, 1, '4527', '2024-10-08 16:25:16', 30, 0, 0, 35),
(29, 31, 1, '4527', '2024-10-08 16:25:16', 30, 0, 0, 35),
(30, 17, 1, '4527', '2024-10-08 16:25:16', 30, 0, 0, 35),
(31, 24, 3, '4440', '2024-10-08 16:28:38', 30, 0, 0, 35),
(32, 21, 1, '4440', '2024-10-08 16:28:38', 30, 0, 0, 35);

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
(65, 'Tivi sony 40', 19, '5600000', 'm4.jpg', 1, 42),
(67, 'Tủ lạnh A10', 17, '6000000', 'k2.jpg', 1, 42),
(68, 'Máy giặc Shark', 27, '75000000', 'm8.jpg', 7, 42),
(69, 'Laptop A15', 25, '6600000', 'mk6.jpg', 1, 42),
(70, 'Máy giặc Shark', 27, '75000000', 'm8.jpg', 1, 43),
(71, 'Laptop A15', 25, '6600000', 'mk6.jpg', 5, 43);

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
(29, 'tuấn', '0973312095', 'Hà Nội', '', 'tuan@gmail.com', 'b47f366edb4b79de8038b4b9ce14b9c5', 0),
(30, 'dung', '', 'hp', 'ok boy', 'doibatcong2003@gmail.com', '202cb962ac59075b964b07152d234b70', 0),
(31, 'Nguyễn Tiến Dũng', '0962988318', 'hp', 'ok boy', 'doibatcong2003@gmail.com', '202cb962ac59075b964b07152d234b70', 1);

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
(17, 1, 'Laptop Asus Vivobook Go 15', 'asus', 'Laptop', '12590000', '5500000', 0, 0, 10, 'asus1.jpg'),
(18, 1, 'Laptop HP 15s', 'hp', 'Laptop', '9900000', '4500000', 0, 0, 1, 'hp15s1.png'),
(19, 1, 'Laptop MSI Gaming GF63 ', 'msi', 'Laptop', '17900000', '4800000', 0, 0, 1, 'MSI1.jpg'),
(20, 1, 'Laptop Dell Inspiron 15 3520 i5', 'dell', 'Laptop', '15000000', '14000000', 0, 0, 10, 'dell1.jpg'),
(21, 5, 'Smart Tivi 4K Sony KD-55X75K ', 'sony', 'TV', '14390000', '14000000', 0, 0, 10, 'sony1.jpg'),
(22, 5, 'Smart Tivi Samsung Neo QLED85 inch', 'samsung', 'TV', '130000000', '17000000', 0, 0, 5, 'tvsamsung1.1.jpg'),
(23, 5, 'OLED Tivi 4K LG 55 inch 55A2PSA ThinQ AI', 'lg', 'TV', '19000000', '25000000', 0, 0, 10, 'tvlg1.jpg'),
(24, 4, 'Điện thoại iPhone 15 Pro Max 512GB', 'apple', 'phone', '35000000', '5500000', 0, 0, 10, 'ip151.jpg'),
(25, 4, 'Điện thoại Samsung Galaxy Z Flip6', 'samsung', 'phone', '26990000', '5300000', 0, 0, 10, 'zlip1.jpg'),
(26, 4, 'Điện thoại Xiaomi Redmi Note 13 Pro', 'xiaomi', 'phone', '6190000', '99000000', 0, 0, 10, 'xiaomi1.jpg'),
(27, 3, 'Máy giặt Toshiba Inverter', 'toshiba', 'mg', '7500000', '63000000', 0, 0, 10, 'toshiba1.png'),
(28, 3, 'Máy giặt Aqua 8.5Kg AQW-FR85GT.S', 'aqua', 'mg', '4590000', '4580000', 0, 0, 11, 'aqua1.png'),
(29, 3, 'Máy giặt lồng ngang Panasonic Inverter 10,5Kg NA-V105FR1BV', 'panasonic', 'mg', '15900000', '14900000', 0, 0, 11, 'panasonic1.jpg'),
(30, 2, 'Tủ lạnh Toshiba Inverter 180L GR-RT234WE-PMV(52)', 'toshiba', 'tl', '5190000', '4190000', 0, 0, 11, 'tltoshiba1.png'),
(31, 2, 'Tủ lạnh Samsung Inverter 488L 4 cửa RF48A4000B4/SV', 'samsung', 'tl', '19900000', '18900000', 0, 0, 11, 'tlsamsung1.png'),
(32, 2, 'Tủ lạnh Panasonic Inverter 255L NR-BV281BVKV', 'panasonic', 'tl', '12390000', '10390000', 0, 0, 11, 'tlpanasonic1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham_chitietcauhinh`
--

CREATE TABLE `tbl_sanpham_chitietcauhinh` (
  `cauhinh_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `cauhinh_tieude` varchar(255) NOT NULL,
  `cauhinh_noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham_chitietcauhinh`
--

INSERT INTO `tbl_sanpham_chitietcauhinh` (`cauhinh_id`, `sanpham_id`, `cauhinh_tieude`, `cauhinh_noidung`) VALUES
(1, 17, 'Model', 'Asus Vivobook Go 15 E1504FA'),
(2, 17, 'Chipset', 'AMD Ryzen 5 7520U'),
(3, 17, 'RAM', '16GB'),
(4, 17, 'Ổ cứng', '512GB SSD'),
(5, 17, 'Chuột', 'Có'),
(6, 17, 'Hệ điều hành', 'Windows 11'),
(7, 17, 'Màn hình', '15.6 inch Full HD'),
(8, 17, 'Trọng lượng', '1.8 kg'),
(9, 17, 'Pin', '3 cell, 42 Wh'),
(10, 18, 'Model', 'Hp 15s'),
(11, 19, 'Model', 'Laptop MSI Gaming GF63 '),
(12, 20, 'Model', 'Laptop Dell Inspiron 15 3520 i5'),
(13, 21, 'Model', 'Smart Tivi 4K Sony KD-55X75K '),
(14, 22, 'Model', 'Smart Tivi Samsung Neo QLED85 inch'),
(15, 23, 'Model', 'OLED Tivi 4K LG 55 inch 55A2PSA ThinQ AI'),
(16, 24, 'Model', 'Điện thoại iPhone 15 Pro Max 512GB'),
(17, 25, 'Model', 'Điện thoại Samsung Galaxy Z Flip6'),
(18, 26, 'Model', 'Điện thoại Xiaomi Redmi Note 13 Pro'),
(19, 27, 'Model', 'Máy giặt Toshiba Inverter'),
(20, 18, 'Chipset', 'Intel Core i3 Alder Lake - 1215U'),
(21, 18, 'RAM', '8 GB'),
(22, 18, 'Ổ cứng', '512 GB SSD NVMe PCIe'),
(23, 18, 'Chuột', 'có'),
(24, 18, 'Hệ Điều Hành', 'Win11'),
(25, 18, 'Màn Hình', '15.6\" FHD'),
(26, 18, 'Trọng Lượng', '1.3kg'),
(27, 18, 'Pin', '3-cell, 41Wh'),
(29, 19, 'Chipset', 'Intel Core i7 Alder Lake - 12650H'),
(30, 19, 'VGA', 'Card rời - NVIDIA GeForce RTX 3050, 4 GB'),
(31, 19, 'RAM', '8GB'),
(32, 19, 'Ổ cứng', '512GB'),
(33, 19, 'Chuột', 'Có'),
(34, 19, 'Hệ điều hành', 'Win 11'),
(35, 19, 'Màn hình', '15.6\" FHD 144hz'),
(36, 19, 'Trọng lượng', '1.86 kg'),
(37, 19, 'Pin', '3-cell Li-ion, 52.4 Wh'),
(38, 20, 'Chipset', 'Intel Core i5 Alder Lake - 1235U'),
(39, 20, 'Card màn hình', 'Card tích hợp - Intel Iris Xe Graphics'),
(40, 20, 'RAM', '16GB'),
(41, 20, 'Ổ cứng', 'SSD 512GB'),
(42, 20, 'Chuột', 'Có'),
(43, 20, 'Hệ điều hành', 'Win 11'),
(44, 20, 'Màn hình', '15.6\" FHD'),
(45, 20, 'Trọng lượng', '1.66 kg'),
(46, 20, 'Pin', '3-cell, 41Wh'),
(47, 21, 'Loại TV', 'Smart TV'),
(48, 21, 'kích thước màn hình', '55 inch'),
(49, 21, 'độ phân giải', '4K UltraHD (3840x2160px)'),
(50, 21, 'Tích hợp đầu thu kỹ thuật số', 'DVB-T2'),
(51, 21, 'Công nghệ hình ảnh', 'Motionflow™ XR 200\n4K HDR processor X1™'),
(52, 21, 'Công nghệ âm thanh', 'DTS Surround\nX-Balanced Speaker\nDolby Atmos\nS-Master Digital Amplifier'),
(53, 21, 'Xuất xứ', 'Việt Nam'),
(54, 22, 'Loại TV', 'Smart TV'),
(55, 22, 'kích thước màn hình', '85 inch'),
(56, 22, 'độ phân giải', '8K'),
(57, 22, 'Tích hợp đầu thu kỹ thuật số', 'DVB-T2'),
(58, 22, 'Công nghệ hình ảnh', 'AI HDR Remastering'),
(59, 22, 'Công nghệ âm thanh', 'Adaptive Sound Pro\nDual Buds'),
(60, 22, 'Xuất xứ', 'Việt Nam'),
(61, 23, 'Loại TV', 'Smart TV'),
(62, 23, 'kích thước màn hình', '55 inch'),
(63, 23, 'độ phân giải', '4K UltraHD (3840x2160px)'),
(64, 23, 'Tích hợp đầu thu kỹ thuật số', 'DVB-T2'),
(65, 23, 'Công nghệ hình ảnh', 'AI Picture Pro\nAI Upscaling\nHDR 10 PRO\nHLG\nDolby Vision IQ\nCông nghệ chiếu phim Filmmaker Mode'),
(66, 23, 'Công nghệ âm thanh', 'Clear Voice Pro\n2.0 CH\nLG Sound Sync\nAI Sound Pro\nDolby Atmos'),
(67, 23, 'Xuất xứ', 'Việt Nam'),
(68, 24, 'Công nghệ màn hình', 'OLED'),
(69, 24, 'Độ phân giải', 'Super Retina XDR (1290 x 2796 Pixels)'),
(70, 24, 'độ phân giải camera sau', 'Chính 48 MP & Phụ 12 MP, 12 MP'),
(71, 24, 'độ phân giải camera trước', '12 MP'),
(72, 24, 'hệ điều hành', 'iOS 17'),
(73, 24, 'Chip xử lý (CPU)', 'Apple A17 Pro 6 nhân'),
(74, 24, 'Chip đồ hoạ (GPU)', 'Apple GPU 6 nhân'),
(75, 24, 'RAM', '8GB'),
(76, 24, 'Dung lượng lưu trữ', '512GB'),
(77, 24, 'chất liệu', 'Khung Titan & Mặt lưng kính cường lực'),
(78, 24, 'Kích thước, khối lượng', 'Dài 159.9 mm - Ngang 76.7 mm - Dày 8.25 mm - Nặng 221 g'),
(79, 28, 'Model', 'Máy giặt Aqua 8.5Kg AQW-FR85GT.S'),
(80, 29, 'Model', 'Máy giặt lồng ngang Panasonic Inverter 10,5Kg NA-V105FR1BV'),
(81, 30, 'Model\r\n', 'Tủ lạnh Toshiba Inverter 180L GR-RT234WE-PMV(52)'),
(82, 31, 'Model', 'Tủ lạnh Samsung Inverter 488L 4 cửa RF48A4000B4/SV'),
(83, 32, 'Model', 'Tủ lạnh Panasonic Inverter 255L NR-BV281BVKV');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham_danhgia`
--

CREATE TABLE `tbl_sanpham_danhgia` (
  `danhgia_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `danhgia_noidung` text NOT NULL,
  `danhgia_diem` int(11) NOT NULL,
  `danhgia_ten` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham_danhgia`
--

INSERT INTO `tbl_sanpham_danhgia` (`danhgia_id`, `sanpham_id`, `danhgia_noidung`, `danhgia_diem`, `danhgia_ten`) VALUES
(1, 17, 'Sản phẩm rất tốt, sử dụng mượt mà.', 5, 'Nguyễn Văn A'),
(2, 18, 'Hình ảnh rõ nét, âm thanh hay.', 4, 'Trần Thị B'),
(3, 19, 'Thiết kế đẹp, sử dụng dễ dàng.', 5, 'Lê Văn C'),
(4, 20, 'Hiệu năng tốt, camera đẹp.', 4, 'Phạm Thị D'),
(5, 21, 'Sản phẩm chất lượng, đáng tiền.', 5, 'Ngô Văn E'),
(6, 22, 'Thiết kế sang trọng, tiết kiệm điện.', 4, 'Đặng Thị F'),
(7, 23, 'Sản phẩm chất lượng, hoạt động tốt.', 5, 'Hoàng Văn G'),
(8, 24, 'Laptop nhẹ, dễ mang theo.', 4, 'Nguyễn Thị H'),
(9, 25, 'Hiệu suất mạnh mẽ, pin lâu.', 5, 'Lê Văn I'),
(10, 26, 'Giặt sạch, tiết kiệm nước.', 4, 'Trần Văn J'),
(11, 27, 'Máy giặt hoạt động êm ái, tốt.', 5, 'Đỗ Văn K'),
(18, 17, '1234', 3, 'tuấn'),
(19, 31, 'máy giặt đểu', 1, 'tuấn'),
(20, 31, '123', 5, 'tuấn'),
(21, 31, '123', 5, 'tuấn'),
(22, 31, '123', 5, 'tuấn'),
(23, 31, '123', 5, 'tuấn'),
(24, 31, '123', 5, 'tuấn'),
(25, 31, '123', 5, 'tuấn'),
(26, 31, '123', 5, 'tuấn'),
(27, 31, '123', 5, 'tuấn'),
(28, 31, '123', 5, 'tuấn'),
(29, 31, '123', 5, 'tuấn'),
(30, 31, '123', 5, 'tuấn'),
(31, 31, '123', 5, 'tuấn'),
(32, 31, '123', 5, 'tuấn'),
(33, 31, '123', 5, 'tuấn'),
(34, 31, 'tuấn', 5, '1'),
(35, 17, '123', 3, 'tuấn'),
(36, 17, '123', 4, 'tuấn'),
(37, 17, '12', 1, 'tuấn'),
(38, 17, '123', 3, 'tuấn'),
(39, 17, '123455556666666', 1, 'tuấn'),
(40, 17, 'eijahrgdhjskldamskd', 3, 'tuấn'),
(45, 19, 'như cứt', 5, 'tuấn'),
(46, 19, '1', 1, 'tuấn'),
(47, 25, '1231', 4, 'tuấn'),
(48, 17, '12312', 3, 'tuấn'),
(49, 17, '0973312095', 3, 'tuấn'),
(50, 17, '0973312095', 3, 'tuấn'),
(51, 17, 'chó', 1, 'tuấn'),
(52, 17, 'chó', 1, 'tuấn'),
(53, 17, 'chó', 1, 'tuấn'),
(54, 17, 'chó', 1, 'tuấn'),
(55, 17, 'chó', 1, 'tuấn'),
(56, 17, 'chó', 1, 'tuấn'),
(57, 17, 'chó', 1, 'tuấn'),
(58, 17, '123', 4, '1'),
(59, 17, '123', 4, '1'),
(107, 18, '123', 3, 'tuấn'),
(108, 18, '123', 1, 'tuấn'),
(109, 18, '123', 2, 'tuấn'),
(110, 18, '123', 2, 'tuấn'),
(111, 18, '123', 2, 'tuấn'),
(112, 18, '1234', 5, 'tuấn'),
(113, 18, 'aezsrxdtfyguhijokploijuhygtfrdetgfhjjouytufrydhgjkj', 3, 'tuấn'),
(114, 18, 'cám', 1, 'ehee'),
(115, 18, 'tấm', 1, 'ehee'),
(116, 18, '1234', 4, 'tuấn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham_gioithieu`
--

CREATE TABLE `tbl_sanpham_gioithieu` (
  `gioithieu_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `gioithieu_noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham_gioithieu`
--

INSERT INTO `tbl_sanpham_gioithieu` (`gioithieu_id`, `sanpham_id`, `gioithieu_noidung`) VALUES
(1, 17, 'Laptop Asus Vivobook Go 15 E1504FA R5 7520U (NJ776W) mang phong cách thiết kế sang trọng, hiệu năng mạnh mẽ cùng tính đa năng sử dụng, chắc chắn sẽ giúp bạn đáp ứng mọi tác vụ công việc và học tập hàng ngày một cách hiệu quả và chuyên nghiệp nhất.\n\nThiết kế quen thuộc, kiểu cách sang trọng \n\nKiểu dáng đã quá quen thuộc đến từ các dòng Vivobook nhà Asus, tuy vậy nhưng với thiết kế ngoại hình tối giản hiện đại như vậy, cá nhân mình lại nhận thấy cực kì phù hợp với xu hướng thời trang hiện nay. Laptop Asus vẫn giữ được nét thuần tuý với gam màu bạc sáng khá thu hút, vỏ được chế tác bằng nhựa nhưng lại rất cứng cáp, độ bền lại còn được đảm bảo chuẩn quân đội MIL STD 810H và các bề mặt được gia công ghép nối rất kĩ, nên mình chỉ việc trang bị thêm một chiếc túi chống sốc là có thể an tâm mang theo mọi nơi rồi.\nBản lề có độ chắc chắn cao, giữ cho màn hình không bị rung lắc quá nhiều kể cả khi mình ngồi trước đầu gió hoặc có tác động lực lên máy, hơn nữa bản lề cũng cho phép mở gập được đến 180 độ để tiện chia sẻ thông tin với người xung quanh khi làm việc nhóm.\nMột điểm mình thấy khá thích đó là với việc được chế tác chất liệu nhựa nên máy sở hữu cân nặng tương đối phù hợp 1.63 kg, không nặng và cũng tiết kiệm diện tích hơn khi bỏ vào trong balo, thoải mái để mình mang theo đến bất cứ đâu.\nVới kích thước tiêu chuẩn 15.6 inch nên tất nhiên phần bàn phím máy cũng có luôn hẳn cụm phím số ở bên tay phải, thuận tiện hơn nhiều khi mình nhập liệu hoặc xử lý Excel. Hơi tiếc một chút, khi bàn phím lại không được hỗ trợ đèn nền nhưng bù lại thì phím có hành trình sâu, độ nảy cao nên tính nhận diện khá tốt, mình cũng chỉ mất đâu đó vài ngày để quen tay và gõ tốt ngay cả trong bóng tối.\nTouchPad có kích thước thoải mái, mình là người khá thích cảm giác sử dụng chuột nhưng với độ mượt và nhạy của bàn di chuột trên chiếc laptop này, mình hoàn toàn có thể thực hiện tốt mọi việc mà không cần phải kết nối thêm rườm rà. Thêm vào đó, tính năng bảo mật vân tay được tích hợp sẵn luôn trên TouchPad, mở khoá nhanh gọn lại còn an toàn.\nVới mẫu thiết kế thuộc phân khúc học tập, làm việc thì đâu đó máy vẫn cho đầy đủ các cổng giao tiếp thông dụng như: HDMI, USB 2.0, Jack tai nghe 3.5 mm, USB 3.2 và USB Type-C để mình thuận tiện kết nối với máy chiếu khi thuyết trình, các thiết bị như bàn phím, chuột rời và kể cả là kết nối làm việc với một chiếc màn hình rời.\n\n\n'),
(2, 18, 'Tivi Sony 29\' mang lại trải nghiệm xem tuyệt vời với độ phân giải cao và thiết kế tinh tế.'),
(3, 19, 'Tivi Sony 40\' với màn hình lớn, mang lại hình ảnh sắc nét và sống động.'),
(4, 20, 'Galaxy A10 là điện thoại thông minh với cấu hình ổn định và hiệu năng tốt.'),
(5, 21, 'Galaxy A15 là phiên bản nâng cấp của Galaxy A10 với nhiều tính năng mới.'),
(6, 22, 'Tủ lạnh Sony với thiết kế hiện đại và khả năng tiết kiệm điện năng.'),
(7, 23, 'Tủ lạnh Samsung là sản phẩm chất lượng với nhiều chức năng tiên tiến.'),
(8, 24, 'Laptop Sony với thiết kế sang trọng và cấu hình mạnh mẽ.'),
(9, 25, 'Laptop A15 là lựa chọn hợp lý cho những người yêu thích sự mới mẻ và công nghệ.'),
(10, 26, 'Máy giặc Samsung với công nghệ giặt hiện đại và tiết kiệm nước.'),
(11, 27, 'Máy giặc Shark với nhiều chức năng giặt khác nhau cho hiệu quả cao.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham_images`
--

CREATE TABLE `tbl_sanpham_images` (
  `image_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `thutu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham_images`
--

INSERT INTO `tbl_sanpham_images` (`image_id`, `sanpham_id`, `image_url`, `thutu`) VALUES
(1, 17, 'asus1.jpg', NULL),
(2, 17, 'asus2.jpg', NULL),
(3, 17, 'asus3.jpg', NULL),
(4, 17, 'asus4.jpg', NULL),
(5, 18, 'hp15s1.png', NULL),
(6, 18, 'hp15s2.jpg', NULL),
(7, 18, 'hp15s3.jpg', NULL),
(8, 18, 'hp15s4.jpg', NULL),
(10, 26, 'xiaomi2.jpg', NULL),
(12, 26, 'xiaomi4.jpg', NULL),
(13, 25, 'zlip1.jpg', NULL),
(14, 25, 'zlip2.jpg', NULL),
(15, 25, 'zlip3.jpg', NULL),
(16, 25, 'zlip4.jpg', NULL),
(17, 24, 'ip151.jpg', NULL),
(18, 24, 'ip152.jpg', NULL),
(19, 24, 'ip153.jpg', NULL),
(20, 24, 'ip154.jpg', NULL),
(21, 20, 'dell1.jpg', NULL),
(22, 20, 'dell2.jpg', NULL),
(23, 20, 'dell3.jpg', NULL),
(24, 20, 'dell4.jpg', NULL),
(25, 19, 'MSI1.jpg', NULL),
(26, 19, 'MSI2.jpg', NULL),
(27, 19, 'MSI3.jpg', NULL),
(28, 19, 'MSI4.jpg', NULL),
(29, 26, 'xiaomi1.jpg', NULL),
(31, 26, 'xiaomi3.jpg', NULL),
(32, 28, 'aqua1.png', NULL),
(33, 28, 'aqua2.png', NULL),
(34, 28, 'aqua3.png', NULL),
(35, 28, 'aqua4.png', NULL),
(36, 32, 'tlpanasonic1.jpg', NULL),
(37, 32, 'tlpanasonic2.jpg', NULL),
(38, 32, 'tlpanasonic3.jpg', NULL),
(39, 32, 'tlpanasonic4.jpg', NULL),
(40, 31, 'tlsamsung1.png', NULL),
(41, 31, 'tlsamsung2.png', NULL),
(42, 31, 'tlsamsung3.png', NULL),
(43, 31, 'tlsamsung4.png', NULL),
(44, 21, 'sony1.jpg', NULL),
(46, 21, 'sony3.jpg', NULL),
(47, 21, 'sony4.jpg', NULL),
(55, 23, 'tvlg1.jpg\r\n', NULL),
(56, 23, 'tvlg2.jpg', NULL),
(57, 23, 'tvlg3.jpg', NULL),
(58, 23, 'tvlg4.jpg', NULL),
(59, 27, 'toshiba1.png', NULL),
(60, 27, 'toshiba2.jpg', NULL),
(61, 27, 'toshiba3.jpg', NULL),
(62, 27, 'toshiba4.jpg', NULL),
(63, 29, 'panasonic1.jpg', NULL),
(64, 29, 'panasonic2.jpg', NULL),
(65, 29, 'panasonic3.jpg', NULL),
(66, 29, 'panasonic4.jpg', NULL),
(67, 30, 'tltoshiba1.png', NULL),
(68, 30, 'tltoshiba2.jpg', NULL),
(69, 30, 'tltoshiba3.jpg', NULL),
(70, 30, 'tltoshiba4.jpg', NULL),
(71, 22, 'tvsamsung1.1.jpg', NULL),
(72, 22, 'tvsamsung1.2.jpg', NULL),
(73, 22, 'tvsamsung1.3.jpg', NULL),
(74, 22, 'tvsamsung1.4.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham_thongtinkhac`
--

CREATE TABLE `tbl_sanpham_thongtinkhac` (
  `thongtin_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `bao_hanh` varchar(255) NOT NULL,
  `thong_tin_khac` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham_thongtinkhac`
--

INSERT INTO `tbl_sanpham_thongtinkhac` (`thongtin_id`, `sanpham_id`, `bao_hanh`, `thong_tin_khac`) VALUES
(1, 17, 'Bảo hành 24 tháng', 'Sản phẩm chỉ được bảo hành trong trường hợp có lỗi từ nhà sản xuất.'),
(3, 18, 'Bảo hành 12 tháng', 'Bảo hành cho lỗi kỹ thuật.'),
(4, 19, 'Bảo hành 18 tháng', 'Không bảo hành cho sản phẩm đã qua sửa chữa.'),
(5, 20, 'Bảo hành 24 tháng', 'Bảo hành theo quy định của nhà sản xuất.'),
(6, 21, 'Bảo hành 12 tháng', 'Bảo hành cho sản phẩm bị lỗi do nhà sản xuất.'),
(7, 22, 'Bảo hành 36 tháng', 'Khách hàng cần lưu giữ hóa đơn để được bảo hành.');

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
(35, 'mùa thu', 10.00, '2024-09-13 22:49:00', '2024-09-30 22:49:00', 81),
(36, 'kkk', 99.00, '2024-08-15 23:27:00', '2024-08-31 23:28:00', 0),
(37, 'kkl', 50.00, '2024-08-22 12:49:00', '2024-08-31 12:49:00', 0),
(38, 'uuu', 100.00, '2024-08-23 12:50:00', '2024-08-31 12:50:00', 0),
(39, 'ii', 200.00, '2024-08-17 13:12:00', '2024-08-31 13:12:00', 0),
(40, 'lkkkk', 90.00, '2024-08-24 13:34:00', '2024-08-31 13:35:00', 5),
(41, 'longk', 77.00, '2024-08-24 13:47:00', '2024-08-31 13:47:00', 50),
(42, 'mùa thu 2024', 50.00, '2024-09-28 14:00:00', '2024-09-30 14:00:00', 2000),
(43, 'mùa thu 2024', 50.00, '2024-09-28 14:00:00', '2024-09-30 14:00:00', 1996);

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
(56, 29, 0, '2024-09-14 14:48:07'),
(57, 29, 0, '2024-09-28 14:03:04'),
(58, 30, 0, '2024-10-08 23:12:13'),
(59, 30, 0, '2024-10-08 23:12:41'),
(60, 30, 0, '2024-10-08 23:12:58'),
(61, 30, 0, '2024-10-08 23:13:48'),
(62, 30, 0, '2024-10-08 23:13:58'),
(63, 30, 0, '2024-10-08 23:15:30'),
(64, 30, 0, '2024-10-08 23:25:16'),
(65, 30, 0, '2024-10-08 23:28:38');

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
-- Chỉ mục cho bảng `tbl_sanpham_chitietcauhinh`
--
ALTER TABLE `tbl_sanpham_chitietcauhinh`
  ADD PRIMARY KEY (`cauhinh_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham_danhgia`
--
ALTER TABLE `tbl_sanpham_danhgia`
  ADD PRIMARY KEY (`danhgia_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham_gioithieu`
--
ALTER TABLE `tbl_sanpham_gioithieu`
  ADD PRIMARY KEY (`gioithieu_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham_images`
--
ALTER TABLE `tbl_sanpham_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Chỉ mục cho bảng `tbl_sanpham_thongtinkhac`
--
ALTER TABLE `tbl_sanpham_thongtinkhac`
  ADD PRIMARY KEY (`thongtin_id`);

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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc_tin`
--
ALTER TABLE `tbl_danhmuc_tin`
  MODIFY `danhmuctin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  MODIFY `giaodich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham_chitietcauhinh`
--
ALTER TABLE `tbl_sanpham_chitietcauhinh`
  MODIFY `cauhinh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham_danhgia`
--
ALTER TABLE `tbl_sanpham_danhgia`
  MODIFY `danhgia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham_gioithieu`
--
ALTER TABLE `tbl_sanpham_gioithieu`
  MODIFY `gioithieu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham_images`
--
ALTER TABLE `tbl_sanpham_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_tiketdiscount`
--
ALTER TABLE `tbl_tiketdiscount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `tbl_usevoucher`
--
ALTER TABLE `tbl_usevoucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_sanpham_chitietcauhinh`
--
ALTER TABLE `tbl_sanpham_chitietcauhinh`
  ADD CONSTRAINT `tbl_sanpham_chitietcauhinh_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`sanpham_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_sanpham_danhgia`
--
ALTER TABLE `tbl_sanpham_danhgia`
  ADD CONSTRAINT `tbl_sanpham_danhgia_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`sanpham_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_sanpham_gioithieu`
--
ALTER TABLE `tbl_sanpham_gioithieu`
  ADD CONSTRAINT `tbl_sanpham_gioithieu_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`sanpham_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tbl_sanpham_images`
--
ALTER TABLE `tbl_sanpham_images`
  ADD CONSTRAINT `tbl_sanpham_images_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `tbl_sanpham` (`sanpham_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
