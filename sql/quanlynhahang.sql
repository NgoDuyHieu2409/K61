-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 21, 2021 lúc 10:30 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhahang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banan`
--

CREATE TABLE `banan` (
  `id_banan` int(11) NOT NULL,
  `ten_banan` varchar(50) NOT NULL,
  `ghichu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banan`
--

INSERT INTO `banan` (`id_banan`, `ten_banan`, `ghichu`) VALUES
(1, 'Bàn 1', 0),
(2, 'Bàn 2', 0),
(3, 'Bàn 3', 0),
(4, 'Bàn 4', 0),
(5, 'Bàn 5', 0),
(6, 'Bàn 6', 0),
(7, 'Bàn 7', 0),
(8, 'Bàn 8', 0),
(9, 'Bàn 9', 0),
(10, 'Bàn 10', 0),
(11, 'Bàn 11', 0),
(12, 'Bàn 12', 0),
(13, 'Bàn 13', 0),
(14, 'Bàn 14', 0),
(15, 'Bàn 15', 0),
(16, 'Bàn 16', 0),
(17, 'Bàn 17', 0),
(18, 'Bàn 18', 0),
(19, 'Bàn 19', 0),
(20, 'Bàn 20', 0),


-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_danhmuc`, `ten_danhmuc`) VALUES
(1, 'Thực Đơn Món Gà'),
(2, 'Thực Đơn Món Vịt'),
(3, 'Thực Đơn Các Món Bò'),
(4, 'Thực Đơn Các Món Dê'),
(5, 'Thực Đơn Các Món Lẩu'),
(6, 'Thực Đơn Các Món Khai Vị'),
(7, 'Thực Đơn Đồ Uống'),
(8, 'Thực Đơn Các Món Hải Sản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder`
--

CREATE TABLE `oder` (
  `id_oder` int(11) NOT NULL,
  `id_banan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tongtien` float NOT NULL,
  `trangthai` int(11) NOT NULL,
  `time_start` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_end` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder`
--

INSERT INTO `oder` (`id_oder`, `id_banan`, `id_user`, `tongtien`, `trangthai`, `time_start`, `time_end`) VALUES
(120, 1, 14, 225000, 3, '2021-06-14 16:01:18', '2021-06-14 16:09:03'),
(121, 1, 14, 1530000, 3, '2021-06-14 16:37:42', '2021-06-14 16:38:06'),
(122, 2, 14, 450000, 3, '2021-06-14 17:45:53', '2021-06-14 17:56:39'),
(123, 2, 14, 450000, 3, '2021-06-14 17:46:46', '2021-06-14 17:56:39'),
(124, 3, 33, 450000, 2, '2021-06-14 17:58:21', '2021-06-14 18:36:37'),
(125, 6, 33, 1215000, 2, '2021-06-14 17:59:51', '2021-06-14 18:36:22'),
(126, 1, 33, 180000, 2, '2021-06-14 18:16:28', '2021-06-14 18:20:16'),
(127, 1, 33, 180000, 2, '2021-06-14 18:16:28', '2021-06-14 18:20:16'),
(128, 2, 33, 180000, 2, '2021-06-14 18:17:04', '2021-06-14 18:20:21'),
(129, 2, 33, 180000, 2, '2021-06-14 18:17:12', '2021-06-14 18:20:21'),
(130, 1, 33, 225000, 2, '2021-06-14 18:23:31', '2021-06-14 18:36:32'),
(131, 2, 33, 450000, 2, '2021-06-14 18:23:47', '2021-06-14 18:36:16'),
(132, 10, 33, 270000, 2, '2021-06-14 18:24:02', '2021-06-14 18:36:27'),
(133, 1, 33, 180000, 2, '2021-06-14 18:25:20', '2021-06-14 18:36:32'),
(134, 22, 14, 360000, 3, '2021-06-14 18:25:31', '2021-06-14 18:38:29'),
(135, 22, 14, 360000, 3, '2021-06-14 18:25:38', '2021-06-14 18:38:29'),
(136, 1, 33, 225000, 2, '2021-06-14 18:33:57', '2021-06-14 18:36:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oder_item`
--

CREATE TABLE `oder_item` (
  `id_oder_item` int(11) NOT NULL,
  `id_oder` int(11) NOT NULL,
  `soluong_sp` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `oder_item`
--

INSERT INTO `oder_item` (`id_oder_item`, `id_oder`, `soluong_sp`, `id_sp`, `create_date`) VALUES
(148, 120, 1, 16, '2021-06-14'),
(149, 121, 4, 18, '2021-06-14'),
(150, 121, 1, 7, '2021-06-14'),
(151, 121, 2, 9, '2021-06-14'),
(152, 121, 1, 5, '2021-06-14'),
(153, 122, 1, 16, '2021-06-15'),
(154, 123, 1, 10, '2021-06-15'),
(155, 124, 2, 16, '2021-06-15'),
(156, 125, 3, 16, '2021-06-15'),
(157, 125, 3, 17, '2021-06-15'),
(158, 126, 1, 17, '2021-06-15'),
(159, 128, 1, 17, '2021-06-15'),
(160, 129, 1, 17, '2021-06-15'),
(161, 130, 1, 16, '2021-06-15'),
(162, 131, 1, 6, '2021-06-15'),
(163, 131, 1, 17, '2021-06-15'),
(164, 132, 1, 6, '2021-06-15'),
(165, 133, 1, 17, '2021-06-15'),
(166, 134, 1, 9, '2021-06-15'),
(167, 135, 1, 17, '2021-06-15'),
(168, 136, 1, 16, '2021-06-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_table`
--

CREATE TABLE `order_table` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ban` int(11) NOT NULL,
  `crate_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_table`
--

INSERT INTO `order_table` (`id`, `id_user`, `id_ban`, `crate_at`) VALUES
(3, 33, 22, '2021-06-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sp`
--

CREATE TABLE `sp` (
  `id_sp` int(11) NOT NULL,
  `ten_sp` varchar(50) NOT NULL,
  `gia_sp` float NOT NULL,
  `khuyenmai_sp` float NOT NULL,
  `giakhuyenmai_sp` float NOT NULL,
  `img_sp` text NOT NULL,
  `loai_sp` varchar(50) NOT NULL,
  `trangthai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sp`
--

INSERT INTO `sp` (`id_sp`, `ten_sp`, `gia_sp`, `khuyenmai_sp`, `giakhuyenmai_sp`, `img_sp`, `loai_sp`, `trangthai`) VALUES
(1, 'Bò Nướng Cay', 300000, 10, 0, 'bo_nuongcay.jpg', '3', 1),
(2, 'Bò Bít Tết', 300000, 10, 0, '192189849_2881329275529893_8439416021389594071_n.png', '3', 1),
(3, 'Bò Hầm Tiêu Xanh', 300000, 10, 0, 'bo_hamtieuxanh.jpg', '3', 0),
(4, 'Bò Lúc Lắc', 300000, 10, 0, 'bo_luclac.jpg', '3', 0),
(5, 'Bò Tái Chanh', 300000, 10, 0, 'bo_taichanh.jpg', '3', 1),
(6, 'Vịt Chiên Cay', 300000, 10, 0, 'vit_chiencay.jpg', '2', 1),
(7, 'Vịt Hấp ', 200000, 10, 0, 'vit_hap.jpg', '2', 1),
(8, 'Vịt Nướng Chao', 200000, 10, 0, 'vit_nuongchao.jpg', '2', 1),
(9, 'Vịt Nướng Truyền Thống', 200000, 10, 0, 'vit_nuong.jpg', '2', 1),
(10, 'Vịt Tẩm Mật Ong', 250000, 10, 0, 'vit_tammatong.jpg', '2', 1),
(11, 'Dê Hấp Xả', 300000, 10, 0, 'de_hapxa.jpg', '4', 1),
(12, 'Dê Nướng Xả', 300000, 10, 0, 'de_nuongxa.jpg', '4', 1),
(13, 'Dê Sào Lăn', 300000, 10, 0, 'de_saolan.jpg', '4', 1),
(14, 'Dê Ủ Trấu', 300000, 10, 0, 'de_utrau.jpg', '4', 1),
(15, 'Gà Không Lối Thoát', 250000, 10, 0, 'ga_khongloithoat.jpg', '1', 0),
(16, 'Gà Quay Nước Dừa', 250000, 10, 0, 'ga_quaynuocdua.jpg', '1', 1),
(17, 'Gà Rang Muối', 200000, 10, 0, 'ga_rangmuoi.jpg', '1', 0),
(18, 'Gà Rút Xương Nướng Mật Ong', 200000, 10, 0, 'ga_rutxuongnuongmatong.jpg', '1', 1),
(19, 'Bạch Tuộc Sào Xa Tế', 150000, 10, 0, 'bachtuoc_xaosate.jpg', '8', 1),
(20, 'Bề Bề Rang Muối', 120000, 10, 0, 'bebe_rangmuoi.jpg', '8', 1),
(21, 'Cua Rang Mẻ', 150000, 10, 0, 'cua_rangme.jpg', '8', 1),
(22, 'Mực Chiên Nước Mắm', 150000, 10, 0, 'muc_chiennuocmam.jpg', '8', 1),
(23, 'Canh Bánh Ghẹ', 50000, 10, 0, 'canh_banhghe.jpg', '8', 1),
(24, 'Lẩu Êch', 250000, 10, 0, 'lau_ech.jpg', '5', 1),
(25, 'Lẩu Gà', 250000, 10, 0, 'lau_ga.jpg', '5', 1),
(26, 'Lẩu Hải Sản', 250000, 10, 0, 'lau_haisan.jpg', '5', 1),
(27, 'Lẩu Thập Cẩm', 250000, 10, 0, 'lau_thapcam.jpg', '5', 1),
(28, 'Lẩu Riêu Cua Bắp Bò', 250000, 10, 0, 'lau_rieucuabapbo.jpg', '5', 1),
(29, 'Rau Mùng Tơi Sào', 50000, 10, 0, 'rau_mungtoixaotoi.jpg', '6', 1),
(30, 'Rau Muống Sào Tỏi', 50000, 10, 0, 'rau_muongxaotoi.jpg', '6', 1),
(31, 'Rau Su Su Sào Tỏi', 50000, 10, 0, 'rau_susuxaotoi.jpg', '6', 1),
(32, 'Ngô Bao Tử Sào Mực', 70000, 10, 0, 'ngo_baotuxaomuc.jpg', '6', 1),
(33, 'Ngô Sào Thịt', 60000, 10, 0, 'ngo_xaothit.jpg', '6', 1),
(34, 'Khoai Lang Kén', 50000, 10, 0, 'khoailang_ken.jpg', '6', 1),
(35, 'Khoai Tây Chiên Giòn', 50000, 10, 0, 'khoaitay_chiendon.jpg', '6', 1),
(36, 'Nước Cam', 20000, 10, 0, 'nuoc_cam.jfif', '7', 1),
(37, 'CoCa CoLa', 20000, 10, 0, 'nuoc_coca.jfif', '7', 1),
(38, 'Red  Bull', 20000, 10, 0, 'nuoc_redbull.jfif', '7', 1),
(39, 'Bia Hà Nội', 15000, 3, 0, 'nuoc_bearhanoi.jfif', '7', 1),
(40, 'Bia Sài Gòn', 15000, 10, 0, 'nuoc_bearsaigon.jfif', '7', 1),
(41, 'Bia Tiger Bạc', 15000, 10, 0, 'nuoc_beartiger.jfif', '7', 1),
(42, 'Bia Tươi', 20000, 10, 0, 'nuoc_biatuoi.jfif', '7', 1),
(43, 'Rượu Dừa', 50000, 10, 0, 'nuoc_ruoudua.jfif', '7', 1),
(45, 'Rượu Nếp Cái Hoa Vàng', 40000, 10, 0, 'nuoc_ruounepcai.jfif', '7', 1),
(46, 'Rượu Táo Mèo', 40000, 10, 0, 'nuoc_ruoutaomeo.jfif', '7', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `ten_user` varchar(50) NOT NULL,
  `sdt_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `quyen_user` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `ten_user`, `sdt_user`, `email_user`, `matkhau`, `quyen_user`) VALUES
(14, 'Lê Văn Tình', '123', 'nga@gmail.com', '123', 0),
(15, 'ngô kim anh', '456', 'nka@gmail.com', '456', 0),
(25, 'Lê Hoàng Anh', '0987654777', 'lha@gmail.com', '124525', 0),
(26, '444', '444', 'admin@gmail.com', '444', 0),
(33, '333', '333', 'admin@gmail.com', '333', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banan`
--
ALTER TABLE `banan`
  ADD PRIMARY KEY (`id_banan`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `oder`
--
ALTER TABLE `oder`
  ADD PRIMARY KEY (`id_oder`),
  ADD KEY `id_banan` (`id_banan`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `oder_item`
--
ALTER TABLE `oder_item`
  ADD PRIMARY KEY (`id_oder_item`),
  ADD KEY `id_oder` (`id_oder`),
  ADD KEY `id_sp` (`id_sp`);

--
-- Chỉ mục cho bảng `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sp`
--
ALTER TABLE `sp`
  ADD PRIMARY KEY (`id_sp`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banan`
--
ALTER TABLE `banan`
  MODIFY `id_banan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `oder`
--
ALTER TABLE `oder`
  MODIFY `id_oder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT cho bảng `oder_item`
--
ALTER TABLE `oder_item`
  MODIFY `id_oder_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT cho bảng `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sp`
--
ALTER TABLE `sp`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `oder`
--
ALTER TABLE `oder`
  ADD CONSTRAINT `oder_ibfk_1` FOREIGN KEY (`id_banan`) REFERENCES `banan` (`id_banan`),
  ADD CONSTRAINT `oder_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Các ràng buộc cho bảng `oder_item`
--
ALTER TABLE `oder_item`
  ADD CONSTRAINT `oder_item_ibfk_1` FOREIGN KEY (`id_oder`) REFERENCES `oder` (`id_oder`),
  ADD CONSTRAINT `oder_item_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sp` (`id_sp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
