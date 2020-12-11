-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 12:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shop`;
-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `uid`, `pid`, `quantity`) VALUES
(40, 2, 5, 5),
(47, 2, 6, 1),
(49, 2, 4, 12),
(50, 2, 10, 1),
(51, 2, 7, 4),
(52, 6, 4, 1),
(53, 6, 3, 1),
(54, 6, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category`, `price`, `description`, `image`) VALUES
(3, 'Laptop Apple MacBook Air 2020 i3 1.1GHz/8GB/256GB (MWTL2SA/A)', 'apple', 28990000, '- CPU: Intel Core i3 Thế hệ 10, 1.10 GHz\r\n- RAM: 8 GB, LPDDR4X (On board), 3733 MHz\r\n- Ổ cứng: SSD 256 GB\r\n- Màn hình: 13.3 inch, Retina (2560 x 1600)\r\n- Card màn hình: Card đồ họa tích hợp, Intel Iris Plus Graphics', 'uploads/apple-macbook-air-2020-i3-220174-1-600x600.jpg'),
(4, 'Laptop Apple MacBook Air 2017 i5 1.8GHz/8GB/128GB (MQD32SA/A)', 'apple', 20990000, '- CPU: Intel Core i5 Broadwell, 1.80 GHz\r\n- RAM: 8 GB, DDR3L(On board), 1600 MHz\r\n- Ổ cứng: SSD 128 GB\r\n- Màn hình: 13.3 inch, WXGA+(1440 x 900)\r\n- Card màn hình: Card đồ họa tích hợp, Intel HD Graphics 6000', 'uploads/apple-macbook-air-mqd32sa-a-i5-5350u-600x600.jpg'),
(5, 'Laptop Asus VivoBook A515EA i3 1115G4/8GB/512GB/Win10 (BQ497T)', 'asus', 14690000, '- CPU: Intel Core i3 Tiger Lake, 1115G4, 3.00 GHz\r\n- RAM: 8 GB, DDR4 (On board +1 khe), 3200 MHz\r\n- Ổ cứng:	SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA\r\n- Màn hình: 15.6 inch, Full HD (1920 x 1080)\r\n- Card màn hình: Card đồ họa tích hợp, Intel UHD Graphi', 'uploads/asus-vivobook-a515ea-i3-bq497t-062220-092221-600x600.jpg'),
(6, 'Laptop Asus VivoBook A412FA i3 10110U/4GB/32GB+512GB/Win10 (EK1179T)', 'asus', 13090000, '- CPU: Intel Core i3 Comet Lake, 10110U, 2.10 GHz\r\n- RAM: 4 GB, DDR4 (On board +1 khe), 2666 MHz\r\n- Ổ cứng: Intel Optane 32GB (H10), SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA\r\n- Màn hình: 14 inch, Full HD (1920 x 1080)\r\n- Card màn hình: Card đồ họa tíc', 'uploads/asus-vivobook-a412fa-i3-ek1179t-223980-1-600x600.jpg'),
(7, 'Laptop Asus Gaming Rog Strix G512 i7 10750H/8GB/512GB/144Hz/4GB GTX1650Ti/Win10 (IAL001T)', 'asus', 28990000, '- CPU: Intel Core i7 Comet Lake, 10750H, 2.60 GHz\r\n- RAM: 8 GB, DDR4 (2 khe), 2933 MHz\r\n- Ổ cứng: Hỗ trợ thêm 2 khe cắm SSD M.2 PCIe, SSD 512 GB M.2 PCIe\r\n- Màn hình: 15.6 inch, Full HD (1920 x 1080), 144Hz\r\n- Card màn hình: Card đồ họa rời, NVIDIA GeForc', 'uploads/asus-gaming-rog-strix-g512-i7-ial001t-272120-022128-225687-600x600.jpg'),
(8, 'Laptop Asus VivoBook Gaming F571GT i7 9750H/8GB/512GB/120Hz/4GB GTX1650/Win10 (AL858T)', 'asus', 24490000, '- CPU: Intel Core i7 Coffee Lake, 9750H, 2.60 GHz\r\n- RAM: 8 GB, DDR4 (On board 4GB +1 khe 4GB), 2666 MHz\r\n- Ổ cứng: SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA\r\n- Màn hình: 15.6 inch, Full HD (1920 x 1080), 120Hz\r\n- Card màn hình: Card đồ họa rời, NVIDIA', 'uploads/asus-vivobook-gaming-f571gt-i7-al858t-226256-600x600.jpg'),
(10, 'Laptop Acer Aspire 3 A315 54K 37B0 i3 8130U/4GB/256GB/Win10 (NX.HEESV.00D)', 'acer', 9990000, '- CPU: Intel Core i3 Coffee Lake, 8130U, 2.20 GHz\r\n- RAM: 4 GB, DDR4 (On board +1 khe), 2400 MHz\r\n- Ổ cứng:	SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA\r\n- Màn hình: 15.6 inch, Full HD (1920 x 1080)\r\n- Card màn hình: Card đồ họa tích hợp, Intel® HD Graphi', 'uploads/acer-aspire-3-a315-nx-heesv-00d-221251-1-600x600.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `username`, `password`, `phone`, `address`) VALUES
(2, 'vuong.giahao@yahoo.com', 'VGHao', 'e3e7f312a36e128c29a42352bb4ff8d7', '0932052137', '45/4 Đường Tạ Uyên P.15 Q.5'),
(3, 'vghao@yahoo.com', 'Hao', '202cb962ac59075b964b07152d234b70', '123', 'akfa'),
(6, 'admin@yahoo.com', 'admin', '202cb962ac59075b964b07152d234b70', '0932052137', '45/4 Đường Tạ Uyên P.15 Q.5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
