-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 04:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment`
--
CREATE DATABASE IF NOT EXISTS `assignment` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `assignment`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `mail`, `phone`, `img`) VALUES
(1, 'admin', 'admin', 'team@gmail.com', 389760644, 'admin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(200) NOT NULL,
  `tendangnhap` varchar(2000) NOT NULL,
  `tensp` varchar(2000) NOT NULL,
  `msp` varchar(2000) NOT NULL,
  `gia` varchar(2000) NOT NULL,
  `soluong` varchar(2000) NOT NULL,
  `trangthai` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `tendangnhap`, `tensp`, `msp`, `gia`, `soluong`, `trangthai`) VALUES
(169, 'piquihac123', 'iPhone 12 256GB', 'ip12', '26990000', '3', 'done'),
(170, 'piquihac', 'iPhone 12 256GB', 'ip12', '26990000', '3', 'wait'),
(171, 'piquihac', 'iPhone 12 256GB', 'ip12', '26990000', '2', 'wait');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(200) NOT NULL,
  `tendangnhap` varchar(200) NOT NULL,
  `msp` varchar(200) NOT NULL,
  `soluong` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `tendangnhap` varchar(200) NOT NULL,
  `msp` varchar(200) NOT NULL,
  `cmt` varchar(1000) NOT NULL,
  `time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `tendangnhap`, `msp`, `cmt`, `time`) VALUES
(22, 'piquihac', 'ip12', 'Sản phẩm rất oke, mẫu mã đẹp, cấu hình cao, lại là dòng điện thoại mình yêu thích!', 'Time: 20:27:13 / Day: 26-11-2021'),
(29, 'piquihac', 'ip12mini', 'giao hàng tốt, sản phẩm đẹp, vote 5 sao', 'Time: 20:51:58 / Day: 26-11-2021'),
(30, 'piquihac', 'ip11', 'ip11 rất oke, nhưng k thích số 11 nên không mua', 'Time: 20:56:28 / Day: 26-11-2021'),
(31, 'piquihac', 'ip13pm', 'ip13 chuẩn lắm, mà nhàm', 'Time: 20:59:35 / Day: 26-11-2021'),
(32, 'piquihac', 'ss_note20', 'samsung tốt mà thích iphone hơn', 'Time: 21:3:10 / Day: 26-11-2021'),
(33, 'piquihac', 'ss_s20', 'fan edition là thấy không thích rồi', 'Time: 21:5:35 / Day: 26-11-2021'),
(34, 'piquihac', 'ss_s21', 's21, thích số 21 nên mua luôn', 'Time: 21:7:57 / Day: 26-11-2021'),
(35, 'piquihac', 'ss_Zflip', 'z flip3 thì có n flip3, x flip3 k shop', 'Time: 21:10:4 / Day: 26-11-2021'),
(36, 'piquihac', 'xm_10pro', 'Note 10 Pro cũng được thôi', 'Time: 21:12:5 / Day: 26-11-2021'),
(37, 'piquihac', 'xm_note10', 'redmi có bluemi k shop ơi', 'Time: 21:13:55 / Day: 26-11-2021'),
(38, 'piquihac', 'ipXR', 'XR XR XR cái gì', 'Time: 21:16:6 / Day: 26-11-2021'),
(39, 'piquihac', 'ss_a72', '72 phép thần thông k = A72', 'Time: 21:19:9 / Day: 26-11-2021'),
(40, 'piquihac', 'xm_10_128', 'redmi 10 128GB oke phết', 'Time: 21:21:20 / Day: 26-11-2021'),
(41, 'piquihac', 'xm_10_5g', 'note 10 5G nhái thôi', 'Time: 21:23:2 / Day: 26-11-2021'),
(42, 'piquihac', 'xm_10_64', 'tạm ổn, cái cuối làm mệt vcl', 'Time: 21:26:32 / Day: 26-11-2021'),
(59, 'piquihac123', 'ip12', 'sản phẩm tuyệt vời shop ơi', 'Time: 10:21:41 / Day: 1-12-2021');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(200) NOT NULL,
  `tendangnhap` varchar(200) NOT NULL,
  `matkhau` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `sdt` varchar(200) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `hinh` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `tendangnhap`, `matkhau`, `mail`, `sdt`, `diachi`, `hinh`) VALUES
(2, 'piquihac', 'a1234567', 'phamquochoa240401@gmail.com', '0582211900', 'VN', 'piquihac.jpg'),
(20, 'piquihac123', 'b1234567', 'pqhphamquoc@gmail.com', '0988138738', 'VN', 'piquihac123.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(200) NOT NULL,
  `msp` varchar(200) NOT NULL,
  `tensp` varchar(200) NOT NULL,
  `gia` varchar(200) NOT NULL,
  `hinh` varchar(500) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `msp`, `tensp`, `gia`, `hinh`, `link`) VALUES
(1, 'ip11', 'iPhone 11 128GB', '18500000', 'Apple/iP11/1.png', 'ip11.html'),
(2, 'ip12', 'iPhone 12 256GB', '26990000', 'Apple/iP12/3.png', 'ip12.html'),
(3, 'ip12mini', 'iPhone 12 Mini', '16300000', 'Apple/iP12/1.png', 'ip12mini.html'),
(4, 'ip13pm', 'iPhone 13 Pro Max', '37990000', 'Apple/iP13/1.png', 'ip13pm.html'),
(5, 'ipXR', 'iPhone XR 128GB', '16000000', 'Apple/ipX/1.png', 'ipXR.html'),
(6, 'ss_a72', 'Samsung Galaxy A72', '10100000', 'Samsung/Ss_a72.png', 'ss_a72.html'),
(7, 'ss_note20', 'Samsung Galaxy Note 20 Ultra 5G', '32990000', 'Samsung/Ss_note20.png', 'ss_note20.html'),
(8, 'ss_s20', 'Samsung Galaxy S20 FE 256GB', '15490000', 'Samsung/Ss_s20.png', 'ss_s20.html'),
(9, 'ss_s21', 'Samsung Galaxy S21 Ultra 5G', '30990000', 'Samsung/Ss_s21.png', 'ss_s21.html'),
(10, 'ss_Zflip', 'Samsung Galaxy Zflip3 5G', '23990000', 'Samsung/Ss_Zflip.png', 'ss_Zflip.html'),
(11, 'xm_10_5g', 'Xiaomi Redmi Note 10 5G', '5920000', 'Xiaomi/Xm_10_5g.png', 'xm_10_5g.html'),
(12, 'xm_10_64', 'Xiaomi Redmi 10 (4GB - 64GB)', '3990000', 'Xiaomi/Xm_10_64.png', 'xm_10_64.html'),
(13, 'xm_10_128', 'Xiaomi Redmi 10 128GB', '4950000', 'Xiaomi/Xm_10_128.png', 'xm_10_128.html'),
(14, 'xm_10pro', 'Xiaomi Redmi Note 10 Pro 8GB', '7300000', 'Xiaomi/Xm_10pro.png', 'xm_10pro.html'),
(15, 'xm_note10', 'Xiaomi Redmi Note 10', '5490000', 'Xiaomi/Xm_note10.png', 'xm_note10.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=585;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
