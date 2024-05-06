-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 08:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- Database  : `btl`;


-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

USE `btl`;


CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `product_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_id`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `name`, `product_id`) VALUES
(1, 'summer_short', '{\r\n  \"ids\": [\r\n    1,2,3,4,5,6,7,8,9,10\r\n  ]\r\n}\r\n\r\n\r\n\r\n\r\n'),
(2, 'summer_pant', '{\r\n  \"ids\": [\r\n    11, 12, 13, 14, 15, 16, 17, 18, 19, 20\r\n  ]\r\n}\r\n\r\n\r\n\r\n\r\n'),
(3, 'summer_skirt', '{\r\n  \"ids\": [\r\n     21, 22, 23, 24, 25, 26, 27, 28, 29, 30\r\n  ]\r\n}\r\n\r\n\r\n\r\n\r\n'),
(4, 'summer_marimekko', '{\r\n  \"ids\": [\r\n    31, 32, 33, 34, 35, 36, 37, 38, 39, 40\r\n  ]\r\n}\r\n\r\n\r\n\r\n\r\n'),
(5, 'summer_minecraft', '{\r\n  \"ids\": [\r\n    41, 42, 43, 44, 45, 46, 47, 48, 49, 50\r\n  ]\r\n}\r\n\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `src_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`src_images`)),
  `src_colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`src_colors`)),
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `src_images`, `src_colors`, `id_product`) VALUES
(1, '{\r\n  \"primary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/item/vngoods_00_424873.jpg?width=750\",\r\n  \"secondary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/sub/vngoods_424873_sub7.jpg?width=750\",\r\n  \"img1\" : \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/424873/sub/goods_424873_sub13.jpg?width=750\",\r\n  \"img2\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/424873/sub/goods_424873_sub14.jpg?width=750\",\r\n  \"img3\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/424873/sub/goods_424873_sub17.jpg?width=750\",\r\n  \"img4\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/sub/vngoods_424873_sub28.jpg?width=750\",\r\n  \"img5\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/sub/vngoods_424873_sub29.jpg?width=750\"\r\n}', '{\r\n \"00 WHITE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/item/vngoods_00_424873.jpg?width=750\",\r\n  \"08 DARK GRAY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/item/vngoods_08_424873.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/item/vngoods_09_424873.jpg?width=750\",\r\n  \"12 PINK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/item/vngoods_12_424873.jpg?width=750\",\r\n  \"31 BEIGE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/item/vngoods_31_424873.jpg?width=750\",\r\n  \"34 BROWN\":\"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/item/vngoods_34_424873.jpg?width=750\",\r\n  \"43 YELLOW\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/item/vngoods_43_424873.jpg?width=750\",\r\n  \"52 GREEN\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/424873/item/vngoods_52_424873.jpg?width=750\"\r\n}', 2),
(3, '{\r\n  \"primary\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_69_468503.jpg?width=750\",\r\n  \"secondary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/sub/vngoods_468503_sub7.jpg?width=750\",\r\n  \"image1\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/468503/sub/goods_468503_sub13.jpg?width=750\",\r\n  \"image2\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/468503/sub/goods_468503_sub14.jpg?width=750\",\r\n  \"image3\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/468503/sub/goods_468503_sub17.jpg?width=750\",\r\n  \"image4\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/sub/vngoods_468503_sub28.jpg?width=750\",\r\n  \"image5\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/sub/vngoods_468503_sub29.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', '{\r\n  \"00 WHITE\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_00_468503.jpg?width=750\",\r\n  \"04 GRAY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_04_468503.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_09_468503.jpg?width=750\",\r\n  \"10 PINK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_10_468503.jpg?width=750\",\r\n  \"38 DARK BROWN\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/468503/sub/goods_468503_sub17.jpg?width=750\",\r\n  \"40 CREAM\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_40_468503.jpg?width=750\",\r\n  \"69 NAVY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_69_468503.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', 3),
(2, '{\r\n  \"primary\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_46_466969.jpg?width=750\",\r\n  \"secondary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/sub/vngoods_466969_sub1.jpg?width=750\",\r\n  \"image1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/sub/vngoods_466969_sub2.jpg?width=750\",\r\n  \"image2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/sub/vngoods_466969_sub7.jpg?width=750\",\r\n  \"image3\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub13.jpg?width=750\",\r\n  \"image4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub14.jpg?width=750\",\r\n  \"image5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub17.jpg?width=750\",\r\n  \"image6\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub18.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', '{\r\n  \"00 WHITE\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_00_466969.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_09_466969.jpg?width=750\",\r\n  \"46 YELLOW\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_46_466969.jpg?width=750\"\r\n}\r\n\r\n', 9),
(4, '{\r\n  \"primary\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_41_465484.jpg?width=750\",\r\n  \"secondary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/sub/vngoods_465484_sub7.jpg?width=750\",\r\n  \"image1\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/465484/sub/goods_465484_sub11.jpg?width=750\",\r\n  \"image2\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/465484/sub/goods_465484_sub13.jpg?width=750\",\r\n  \"image3\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/465484/sub/goods_465484_sub14.jpg?width=750\",\r\n  \"image4\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/sub/vngoods_465484_sub23.jpg?width=750\",\r\n  \"image5\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/sub/vngoods_465484_sub28.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', '{\r\n  \"01 OFF WHITE\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_01_465484.jpg?width=750\",\r\n  \"03 GRAY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_03_465484.jpg?width=750\",\r\n  \"09 BLACK\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_09_465484.jpg?width=750\",\r\n  \"10 PINK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_10_465484.jpg?width=750\",\r\n  \"12 PINK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_12_465484.jpg?width=750\",\r\n  \"41 YELLOW\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_41_465484.jpg?width=750\",\r\n  \"53 GREEN\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_53_465484.jpg?width=750\",\r\n  \"64 BLUE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_64_465484.jpg?width=750\"\r\n}\r\n\r\n', 10),
(5, '{\r\n  \"primary\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_32_464837.jpg?width=750\",\r\n  \"secondary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/sub/vngoods_464837_sub7.jpg?width=750\",\r\n  \"image1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/sub/vngoods_464837_sub9.jpg?width=750\",\r\n  \"image2\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub14.jpg?width=750\",\r\n  \"image3\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub15.jpg?width=750\",\r\n  \"image4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub17.jpg?width=750\",\r\n  \"image5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub23.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', '{\r\n  \"01 OFF WHITE\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_01_464837.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_09_464837.jpg?width=750\",\r\n  \"10 PINK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_10_464837.jpg?width=750\",\r\n  \"32 BEIGE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_32_464837.jpg?width=750\",\r\n  \"56 OLIVE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_56_464837.jpg?width=750\",\r\n  \"69 NAVY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_69_464837.jpg?width=750\"\r\n}\r\n\r\n', 11);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(11) NOT NULL,
  `percentdiscount` int(11) NOT NULL,
  `descriptiondiscount` text NOT NULL,
  `primary_image` text NOT NULL,
  `similar_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`similar_ids`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `percentdiscount`, `descriptiondiscount`, `primary_image`, `similar_ids`) VALUES
(1, 'Áo Len Mắt Lưới Cổ Tròn Dài Tay', 588000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468788/item/vngoods_68_468788.jpg?width=750', '{\r\n  \"ids\": [\r\n    2,\r\n    3,\r\n    4,\r\n    5\r\n  ]\r\n}'),
(2, 'Áo Thun Cổ Tròn Ngắn Tay', 293000, 40, 'Limited Offer Từ 26 Apr 2024 - 02 May 2024', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/422992/item/vngoods_11_422992.jpg?width=750', '{\r\n  \"ids\": [\r\n    1,\r\n    3,\r\n    4,\r\n    5\r\n  ]\r\n}'),
(3, 'Áo Thun SUPIMA COTTON Cổ Tròn Ngắn Tay', 293000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_04_468503.jpg?width=750', '{\r\n  \"ids\": [\r\n    1,\r\n    2,\r\n    4,\r\n    5\r\n  ]\r\n}'),
(4, 'Áo Thun Vải Gân Mềm Cổ Tròn Ngắn Tay (Họa Tiết Kẻ Sọc)', 293000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467363/item/vngoods_69_467363.jpg?width=750', '{\r\n  \"ids\": [\r\n    3,\r\n    2,\r\n    6,\r\n    5\r\n  ]\r\n}'),
(5, 'Áo Thun Cổ Tròn Vải Gân Mềm Ngắn Tay', 293000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465756/item/vngoods_24_465756.jpg?width=750', '{\r\n  \"ids\": [\r\n    3,\r\n    2,\r\n    6,\r\n    1\r\n  ]\r\n}'),
(6, 'Áo Len Dệt 3D Gân Cổ Tròn Dài Tay', 784000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467393/item/vngoods_61_467393.jpg?width=750', '{\r\n  \"ids\": [\r\n    3,\r\n    2,\r\n    5,\r\n    1\r\n  ]\r\n}'),
(7, 'Áo Len Dệt 3D Cổ Tròn Tay Lỡ Có Thể Giặt Máy (Họa Tiết Kẻ Sọc)', 686000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467407/item/vngoods_09_467407.jpg?width=750', '{\r\n  \"ids\": [\r\n    3,\r\n    2,\r\n    6,\r\n    1\r\n  ]\r\n}'),
(8, 'Áo Len Dệt 3D Vải Cotton Dài Tay', 686000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466846/item/vngoods_56_466846.jpg?width=750', '{\r\n  \"ids\": [\r\n    3,\r\n    2,\r\n    6,\r\n    7\r\n  ]\r\n}'),
(9, 'Áo Len Cổ Tròn Ngắn Tay', 489000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_46_466969.jpg?width=750', '{\r\n  \"ids\": [\r\n    2, 4, 6, 8\r\n  ]\r\n}\r\n\r\n\r\n\r\n\r\n'),
(10, 'Áo Cardigan Chống UV Cổ Tròn (Chống Nắng)', 489000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_41_465484.jpg?width=750', '{\r\n  \"ids\": [\r\n    6,7,8,9\r\n  ]\r\n}\r\n\r\n\r\n\r\n\r\n'),
(11, 'Quần Short Vải Linen Cotton', 588000, 20, 'Limited Offer Từ 26 Apr 2024 - 02 May 2024', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_32_464837.jpg?width=750', '{\r\n  \"ids\": [\r\n    12,14,16,18\r\n  ]\r\n}\r\n\r\n\r\n\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `size_xs` int(11) NOT NULL,
  `size_s` int(11) NOT NULL,
  `size_m` int(11) NOT NULL,
  `size_l` int(11) NOT NULL,
  `size_xl` int(11) NOT NULL,
  `size_xxl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `id_product`, `size_xs`, `size_s`, `size_m`, `size_l`, `size_xl`, `size_xxl`) VALUES
(1, 1, 100, 100, 100, 100, 100, 100),
(1, 1, 100, 100, 100, 100, 100, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `user` (
  `id` INT NOT NULL AUTO_INCREMENT , 
  `usrname` VARCHAR(255) NOT NULL , 
  `passwd` VARCHAR(255) NOT NULL , 
  `date_joined` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  PRIMARY KEY (`id`));

CREATE TABLE `cart` (
  `id` INT NOT NULL AUTO_INCREMENT , 
  `userid` INT NOT NULL , 
  PRIMARY KEY (`id`),
  FOREIGN KEY (`userid`) REFERENCES `user`(`id`)
);

CREATE TABLE `cart_item` ( 
  `cartid` INT NOT NULL , 
  `productid` INT NOT NULL , 
  `quantity` INT NOT NULL , 
  FOREIGN KEY (`cartid`) REFERENCES `cart`(`id`),
  FOREIGN KEY (`productid`) REFERENCES `product`(`id`),
  PRIMARY KEY (`cartid`, `productid`)
);
