-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 22, 2024 lúc 05:28 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `message`
--

CREATE TABLE `message` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image`) VALUES
(22, 'CHÚ THUẬT HỒI CHIẾN', 'Tác giả:Gege Akutami\r\nĐối tượng:Tuổi mới lớn (15 – 18)\r\nSố trang: 192\r\nTrọng lượng: 140 gram\r\nBộ sách:Chú thuật hồi chiến', 25000, 'jujustukaisen23.png'),
(23, 'BẠCH TUYẾT TÓC ĐỎ', 'Tác giả:Sorata Akiduki\r\nĐối tượng:Tuổi mới lớn (15 – 18)\r\nSố trang: 188\r\nTrọng lượng: 135 gram\r\nBộ sách:Bạch tuyết tóc đỏ', 30000, 'bachtuyettocdo.png'),
(24, 'LỜI CHÀO TỪ MOSKVA', 'Tác giả:Ian Fleming\r\nĐối tượng:Tuổi trưởng thành (trên 18 tuổi)\r\nSố trang: 320\r\nTrọng lượng: 410 gram\r\nBộ sách:Wings Classics', 50000, 'moskva.jpg'),
(25, 'THIÊN SỨ NHÀ BÊN', 'Tác giả:Saekisan - Hanekoto - Wan Shibata - Suzu Yuki\r\nĐối tượng:Tuổi trưởng thành (trên 18 tuổi)\r\nSố trang: 178\r\nBộ sách:Thiên sứ nhà bên (Manga)', 45000, 'thiesunhaben.png'),
(26, 'SỨ GIẢ BỐN MÙA', 'Tác giả:Kana Akatsuki - Suoh\r\nĐối tượng:Tuổi mới lớn (15 – 18) - Tuổi trưởng thành (trên 18 tuổi)\r\nSố trang: 572\r\nTrọng lượng: 550 gram\r\nBộ sách:Sứ giả bốn mùa', 45000, 'sugia4mua.png'),
(27, 'BẢN GIAO HƯỞNG CỦA NƯỚC', 'Tác giả:Thùy Trang - Lam Rosy - Lương Chi - Norah VO\r\nĐối tượng:Tuổi mới lớn (15 – 18) - Tuổi trưởng thành \r\nTrọng lượng: 265 gram', 30000, 'bangiaohuongcuanuoc.png'),
(28, 'DƯỢC SƯ TỰ SỰ - Tập 6', 'Tác giả:Natsu Hyuuga - Touco Shino - Itsuki Nanao - Nekokurage\r\nĐối tượng:Tuổi trưởng thành (trên 18 tuổi)\r\nSố trang: 178\r\nBộ sách:Dược sư tự sự', 80000, 'duocsutusu.png'),
(29, 'HÔN NHÂN HẠNH PHÚC CỦA TÔI', 'Tác giả:Akumi Agitogi\r\nĐối tượng:Tuổi trưởng thành (trên 18 tuổi)\r\nSố trang: 316\r\nTrọng lượng: 325 gram\r\nBộ sách:Hôn nhân hạnh phúc của tôi', 120000, 'honnhanhahphuc.png'),
(30, 'SƠN , GOAL ! - TẬP 3 (TẶNG KÈM STANDEE PVC)', 'Tác giả:Baba Tamio\r\nĐối tượng:Thiếu niên (11 – 15)\r\nKhuôn Khổ: 13x18 cm\r\nSố trang: 172\r\nĐịnh dạng: bìa mềm\r\nTrọng lượng: 200 gram\r\nBộ sách:Sơn, Goal!', 50000, 'SonGoal.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(16, 'Nguyễn Hoàng Hải', 'hoanghaimcpe@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin'),
(17, 'Nguyễn Hoàng Hải', '123@gmail.com', '202cb962ac59075b964b07152d234b70', 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT cho bảng `message`
--
ALTER TABLE `message`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
