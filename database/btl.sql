-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 07:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btl`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`) VALUES
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cartid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cartid`, `productid`, `quantity`) VALUES
(1, 1, 3),
(1, 2, 3),
(1, 5, 3),
(1, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `product_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`product_id`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`id`, `name`, `product_id`) VALUES
(1, 'summer_short', '{\r\n  \"ids\": [\r\n    1,2,4,8,6,10,8,12,22,14\r\n  ]\r\n}'),
(2, 'summer_pant', '{\r\n  \"ids\": [\r\n    1,2,4,9,21,11,22,13,14,5,6,7,8,10\r\n  ]\r\n}'),
(3, 'summer_skirt', '{\r\n  \"ids\": [\r\n    1,2,3,4,10,5,12,6,14\r\n  ]\r\n}'),
(4, 'summer_marimekko', '{\r\n  \"ids\": [\r\n    22,21,14,6,10,8,11\r\n  ]\r\n}'),
(5, 'summer_minecraft', '{\r\n  \"ids\": [\r\n    5,2,4,10,11,12,13,14,21,21\r\n  ]\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `src_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`src_images`)),
  `src_colors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`src_colors`)),
  `id_product` int(11) NOT NULL,
  `src_styles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `src_images`, `src_colors`, `id_product`, `src_styles`) VALUES
(1, '{\r\n  \"img1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467363/item/vngoods_69_467363.jpg?width=750\",\r\n  \"img2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467363/sub/vngoods_467363_sub7.jpg?width=750\",\r\n  \"img3\" : \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/467363/sub/goods_467363_sub13.jpg?width=750\",\r\n  \"img4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/467363/sub/goods_467363_sub14.jpg?width=750\",\r\n  \"img5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/467363/sub/goods_467363_sub23.jpg?width=750\",\r\n  \"img6\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467363/sub/vngoods_467363_sub28.jpg?width=750\"\r\n}', '{\r\n  \"01 OFF WHITE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467363/item/vngoods_01_467363.jpg?width=750\",\r\n  \"69 NAVY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467363/item/vngoods_69_467363.jpg?width=750\"\r\n}', 4, '{\r\n  \"img1\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240411083051_official_styling_120019118\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24031403111_official_styling_120018826\",\r\n  \"img3\" : \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24031403111_official_styling_120018827\",\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24031403114_official_styling_120018852\"\r\n}'),
(2, '{\r\n  \"primary\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_46_466969.jpg?width=750\",\r\n  \"secondary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/sub/vngoods_466969_sub1.jpg?width=750\",\r\n  \"image1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/sub/vngoods_466969_sub2.jpg?width=750\",\r\n  \"image2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/sub/vngoods_466969_sub7.jpg?width=750\",\r\n  \"image3\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub13.jpg?width=750\",\r\n  \"image4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub14.jpg?width=750\",\r\n  \"image5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub17.jpg?width=750\",\r\n  \"image6\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub18.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', '{\r\n  \"00 WHITE\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_00_466969.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_09_466969.jpg?width=750\",\r\n  \"46 YELLOW\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_46_466969.jpg?width=750\"\r\n}\r\n\r\n', 9, ''),
(3, '{\r\n  \"primary\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_69_468503.jpg?width=750\",\r\n  \"secondary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/sub/vngoods_468503_sub7.jpg?width=750\",\r\n  \"image1\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/468503/sub/goods_468503_sub13.jpg?width=750\",\r\n  \"image2\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/468503/sub/goods_468503_sub14.jpg?width=750\",\r\n  \"image3\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/468503/sub/goods_468503_sub17.jpg?width=750\",\r\n  \"image4\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/sub/vngoods_468503_sub28.jpg?width=750\",\r\n  \"image5\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/sub/vngoods_468503_sub29.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', '{\r\n  \"00 WHITE\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_00_468503.jpg?width=750\",\r\n  \"04 GRAY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_04_468503.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_09_468503.jpg?width=750\",\r\n  \"10 PINK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_10_468503.jpg?width=750\",\r\n  \"38 DARK BROWN\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/468503/sub/goods_468503_sub17.jpg?width=750\",\r\n  \"40 CREAM\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_40_468503.jpg?width=750\",\r\n  \"69 NAVY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468503/item/vngoods_69_468503.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', 3, '{\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24041006462_official_styling_120019087_c-600-800\",\r\n  \"img3\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24041006462_official_styling_120019088_c-600-800\",\r\n  \"img1\" : \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240411083052_official_styling_120019126_c-600-800\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240403083046_official_styling_120019003_c-600-800\"\r\n}'),
(4, '{\r\n  \"primary\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_41_465484.jpg?width=750\",\r\n  \"secondary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/sub/vngoods_465484_sub7.jpg?width=750\",\r\n  \"image1\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/465484/sub/goods_465484_sub11.jpg?width=750\",\r\n  \"image2\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/465484/sub/goods_465484_sub13.jpg?width=750\",\r\n  \"image3\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/465484/sub/goods_465484_sub14.jpg?width=750\",\r\n  \"image4\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/sub/vngoods_465484_sub23.jpg?width=750\",\r\n  \"image5\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/sub/vngoods_465484_sub28.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', '{\r\n  \"01 OFF WHITE\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_01_465484.jpg?width=750\",\r\n  \"03 GRAY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_03_465484.jpg?width=750\",\r\n  \"09 BLACK\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_09_465484.jpg?width=750\",\r\n  \"10 PINK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_10_465484.jpg?width=750\",\r\n  \"12 PINK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_12_465484.jpg?width=750\",\r\n  \"41 YELLOW\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_41_465484.jpg?width=750\",\r\n  \"53 GREEN\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_53_465484.jpg?width=750\",\r\n  \"64 BLUE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465484/item/vngoods_64_465484.jpg?width=750\"\r\n}\r\n\r\n', 10, ''),
(5, '{\r\n  \"primary\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_32_464837.jpg?width=750\",\r\n  \"secondary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/sub/vngoods_464837_sub7.jpg?width=750\",\r\n  \"image1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/sub/vngoods_464837_sub9.jpg?width=750\",\r\n  \"image2\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub14.jpg?width=750\",\r\n  \"image3\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub15.jpg?width=750\",\r\n  \"image4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub17.jpg?width=750\",\r\n  \"image5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub23.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', '{\r\n  \"01 OFF WHITE\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_01_464837.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_09_464837.jpg?width=750\",\r\n  \"10 PINK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_10_464837.jpg?width=750\",\r\n  \"32 BEIGE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_32_464837.jpg?width=750\",\r\n  \"56 OLIVE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_56_464837.jpg?width=750\",\r\n  \"69 NAVY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_69_464837.jpg?width=750\"\r\n}\r\n\r\n', 11, ''),
(6, '{\r\n  \"img1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465185/item/vngoods_52_465185.jpg?width=750\",\r\n  \"img2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465185/sub/vngoods_465185_sub1.jpg?width=750\",\r\n  \"img3\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465185/sub/vngoods_465185_sub2.jpg?width=750\",\r\n  \"img4\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465185/sub/vngoods_465185_sub3.jpg?width=750\",\r\n  \"img5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/465185/sub/goods_465185_sub12.jpg?width=750\",\r\n  \"img6\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/465185/sub/goods_465185_sub14.jpg?width=750\"\r\n}', '{\r\n  \"00 WHITE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465185/item/vngoods_00_465185.jpg?width=750\",\r\n  \"02 LIGHT GRAY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465185/item/vngoods_02_465185.jpg?width=750\",\r\n  \"07 GRAY\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465185/item/vngoods_07_465185.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465185/item/vngoods_09_465185.jpg?width=750\",\r\n  \"52 GREEN\": \r\n  \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465185/item/vngoods_52_465185.jpg?width=750\"\r\n}', 12, '{\r\n  \"img1\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24051003058_official_styling_130015319_c-600-800\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24050202050_official_styling_130015277_c-600-800\",\r\n  \"img3\" : \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24050202050_official_styling_130015278_c-600-800\",\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24050202053_official_styling_130015296_c-600-800\"\r\n}'),
(7, '{\r\n  \"img1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/461914/item/vngoods_67_461914.jpg?width=750\",\r\n  \"img2\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/461914/sub/goods_461914_sub1.jpg?width=750\",\r\n  \"img3\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/461914/sub/vngoods_461914_sub2.jpg?width=750\",\r\n  \"img4\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/461914/sub/vngoods_461914_sub3.jpg?width=750\",\r\n  \"img5\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/461914/sub/vngoods_461914_sub7.jpg?width=750\",\r\n  \"img6\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/461914/sub/goods_461914_sub14.jpg?width=750\"\r\n}', '{\r\n  \"00 WHITE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/461914/item/vngoods_00_461914.jpg?width=750\",\r\n  \"02 LIGHT GRAY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/461914/item/vngoods_09_461914.jpg?width=750\",\r\n  \"31 BEIGE\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/461914/item/vngoods_31_461914.jpg?width=750\",\r\n  \"67 BLUE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/461914/item/vngoods_67_461914.jpg?width=750\"\r\n}', 13, '{\r\n  \"img1\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24050202050_official_styling_130015279\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240326011539_official_styling_120018911\",\r\n  \"img3\" : \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240326011539_official_styling_120018912\",\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240326053033_official_styling_130015159\"\r\n}'),
(8, '{\r\n  \"img1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467134/item/vngoods_36_467134.jpg?width=750\",\r\n  \"img2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467134/sub/vngoods_467134_sub9.jpg?width=750\",\r\n  \"img3\" : \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/467134/sub/goods_467134_sub14.jpg?width=750\",\r\n  \"img4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/467134/sub/goods_467134_sub17.jpg?width=750\",\r\n  \"img5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/467134/sub/goods_467134_sub18.jpg?width=750\",\r\n  \"img6\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/467134/sub/goods_467134_sub23.jpg?width=750\"\r\n}', '{\r\n  \"00 WHITE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467134/item/vngoods_00_467134.jpg?width=750\",\r\n  \"01 OFF WHITE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467134/item/vngoods_01_467134.jpg?width=750\",\r\n  \"08 DARK GRAY\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467134/item/vngoods_08_467134.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467134/item/vngoods_09_467134.jpg?width=750\",\r\n  \"36 BROWN\":\r\n\"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467134/item/vngoods_36_467134.jpg?width=750\"\r\n}', 14, '{\r\n  \"img1\": \"https://api.fastretailing.com/ugc/v1/uq/vn/SR_IMAGES/ugc_stylehint_uq_vn_photo_240420_1321040_c-600-800\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/vn/SR_IMAGES/ugc_stylehint_uq_vn_photo_240427_1326779_c-600-800\",\r\n  \"img3\" : \"https://api.fastretailing.com/ugc/v1/uq/sg/SR_IMAGES/ugc_stylehint_uq_sg_photo_240320_1296532_c-600-800\",\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/jp/SR_IMAGES/ugc_stylehint_uq_jp_photo_240320_1296311_c-600-800\"\r\n}'),
(9, '{\r\n  \"img1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/456261/item/vngoods_10_456261.jpg?width=750\",\r\n  \"img2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/456261/sub/vngoods_456261_sub7.jpg?width=750\",\r\n  \"img3\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/456261/sub/vngoods_456261_sub9.jpg?width=750\",\r\n  \"img4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/456261/sub/goods_456261_sub11.jpg?width=750\",\r\n  \"img5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/456261/sub/goods_456261_sub13.jpg?width=750\",\r\n  \"img6\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/456261/sub/goods_456261_sub14.jpg?width=750\"\r\n}', '{\r\n  \"00 WHITE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/456261/item/vngoods_00_456261.jpg?width=750\",\r\n  \"03 GRAY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/456261/item/vngoods_03_456261.jpg?width=750\",\r\n  \"07 GRAY\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/456261/item/vngoods_07_456261.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/456261/item/vngoods_09_456261.jpg?width=750\",\r\n  \"10 PINK\":\r\n\"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/456261/item/vngoods_10_456261.jpg?width=750\"\r\n}', 21, '{\r\n  \"img1\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24041006460_official_styling_120019065\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24041006460_official_styling_120019066\",\r\n  \"img3\" : \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24041006460_official_styling_120019067\",\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240404043036_official_styling_120019020\"\r\n}'),
(10, '{\r\n  \"img1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468788/item/vngoods_27_468788.jpg?width=750\",\r\n  \"img2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468788/sub/vngoods_468788_sub1.jpg?width=750\",\r\n  \"img3\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468788/sub/vngoods_468788_sub7.jpg?width=750\",\r\n  \"img4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/468788/sub/goods_468788_sub13.jpg?width=750\",\r\n  \"img5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/468788/sub/goods_468788_sub14.jpg?width=750\",\r\n  \"img6\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/468788/sub/goods_468788_sub17.jpg?width=750\"\r\n}', '{\r\n  \"01 OFF WHITE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468788/item/vngoods_01_468788.jpg?width=750\",\r\n  \"02 LIGHT GRAY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468788/item/vngoods_02_468788.jpg?width=750\",\r\n  \"09 BLACK\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468788/item/vngoods_09_468788.jpg?width=750\",\r\n  \"27 ORANGE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468788/item/vngoods_27_468788.jpg?width=750\",\r\n  \"68 BLUE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/468788/item/vngoods_68_468788.jpg?width=750\"\r\n}', 1, '{\r\n  \"img1\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24041006463_official_styling_120019093\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240411083051_official_styling_120019116\",\r\n  \"img3\" : \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240411083051_official_styling_120019122\",\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240411083051_official_styling_120019123\"\r\n}'),
(11, '{\r\n  \"img1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/422992/item/vngoods_11_422992.jpg?width=750\",\r\n  \"img2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/422992/sub/vngoods_422992_sub1.jpg?width=750\",\r\n  \"img3\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/422992/sub/vngoods_422992_sub2.jpg?width=750\",\r\n  \"img4\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/422992/sub/vngoods_422992_sub3.jpg?width=750\",\r\n  \"img5\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/422992/sub/vngoods_422992_sub7.jpg?width=750\",\r\n  \"img6\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/422992/sub/goods_422992_sub13.jpg?width=750\"\r\n}', '{\r\n  \"01 OFF WHITE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/422992/item/vngoods_00_422992.jpg?width=750\",\r\n  \"07 GRAY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/422992/item/vngoods_07_422992.jpg?width=750\",\r\n  \"09 BLACK\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/422992/item/vngoods_09_422992.jpg?width=750\",\r\n  \"11 PINK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/422992/item/vngoods_11_422992.jpg?width=750\"\r\n}', 2, '{\r\n  \"img1\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24051003058_official_styling_130015317\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24051003058_official_styling_130015318\",\r\n  \"img3\" : \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24050202054_official_styling_130015304\",\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24050202054_official_styling_130015310\"\r\n}'),
(12, '{\r\n  \"primary\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_46_466969.jpg?width=750\",\r\n  \"secondary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/sub/vngoods_466969_sub1.jpg?width=750\",\r\n  \"image1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/sub/vngoods_466969_sub2.jpg?width=750\",\r\n  \"image2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/sub/vngoods_466969_sub7.jpg?width=750\",\r\n  \"image3\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub13.jpg?width=750\",\r\n  \"image4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub14.jpg?width=750\",\r\n  \"image5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub17.jpg?width=750\",\r\n  \"image6\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466969/sub/goods_466969_sub18.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', '{\r\n  \"00 WHITE\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_00_466969.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_09_466969.jpg?width=750\",\r\n  \"46 YELLOW\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466969/item/vngoods_46_466969.jpg?width=750\"\r\n}\r\n\r\n', 5, '{\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24041006462_official_styling_120019087_c-600-800\",\r\n  \"img3\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24041006462_official_styling_120019088_c-600-800\",\r\n  \"img1\" : \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240411083052_official_styling_120019126_c-600-800\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240403083046_official_styling_120019003_c-600-800\"\r\n}'),
(13, '{\r\n  \"img1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467393/item/vngoods_61_467393.jpg?width=750\",\r\n  \"img2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467393/sub/vngoods_467393_sub7.jpg?width=750\",\r\n  \"img3\" : \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/467393/sub/goods_467393_sub14.jpg?width=750\",\r\n  \"img4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/467393/sub/goods_467393_sub17.jpg?width=750\",\r\n  \"img5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/467393/sub/goods_467393_sub18.jpg?width=750\",\r\n  \"img6\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467393/sub/vngoods_467393_sub29.jpg?width=750\"\r\n}', '{\r\n  \"30 NATURAL\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467393/item/vngoods_30_467393.jpg?width=750\",\r\n  \"61 BLUE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467393/item/vngoods_61_467393.jpg?width=750\",\r\n  \"69 NAVY\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467393/item/vngoods_69_467393.jpg?width=750\"\r\n}', 6, '{\r\n  \"img1\": \"https://api.fastretailing.com/ugc/v1/uq/vn/SR_IMAGES/ugc_stylehint_uq_vn_photo_240422_1322034_c-600-800\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/jp/SR_IMAGES/ugc_stylehint_uq_jp_photo_240403_1308060_c-600-800\",\r\n  \"img3\" : \"https://api.fastretailing.com/ugc/v1/uq/th/SR_IMAGES/ugc_stylehint_uq_th_photo_240413_1315196_c-600-800\",\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/jp/SR_IMAGES/ugc_stylehint_uq_jp_photo_240403_1308060_c-600-800\"\r\n}'),
(14, '{\r\n  \"primary\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_32_464837.jpg?width=750\",\r\n  \"secondary\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/sub/vngoods_464837_sub7.jpg?width=750\",\r\n  \"image1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/sub/vngoods_464837_sub9.jpg?width=750\",\r\n  \"image2\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub14.jpg?width=750\",\r\n  \"image3\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub15.jpg?width=750\",\r\n  \"image4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub17.jpg?width=750\",\r\n  \"image5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/464837/sub/goods_464837_sub23.jpg?width=750\"\r\n}\r\n\r\n\r\n\r\n\r\n', '{\r\n  \"01 OFF WHITE\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_01_464837.jpg?width=750\",\r\n  \"09 BLACK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_09_464837.jpg?width=750\",\r\n  \"10 PINK\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_10_464837.jpg?width=750\",\r\n  \"32 BEIGE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_32_464837.jpg?width=750\",\r\n  \"56 OLIVE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_56_464837.jpg?width=750\",\r\n  \"69 NAVY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_69_464837.jpg?width=750\"\r\n}\r\n\r\n', 7, '{\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24041006462_official_styling_120019087_c-600-800\",\r\n  \"img3\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24041006462_official_styling_120019088_c-600-800\",\r\n  \"img1\" : \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240411083052_official_styling_120019126_c-600-800\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240403083046_official_styling_120019003_c-600-800\"\r\n}'),
(15, '{\r\n  \"img1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466846/item/vngoods_56_466846.jpg?width=750\",\r\n  \"img2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466846/sub/vngoods_466846_sub7.jpg?width=750\",\r\n  \"img3\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466846/sub/vngoods_466846_sub9.jpg?width=750\",\r\n  \"img4\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466846/sub/goods_466846_sub14.jpg?width=750\",\r\n  \"img5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/466846/sub/goods_466846_sub23.jpg?width=750\",\r\n  \"img6\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466846/sub/vngoods_466846_sub28.jpg?width=750\"\r\n}', '{\r\n  \"01 OFF WHITE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466846/item/vngoods_01_466846.jpg?width=750\",\r\n  \"56 OLIVE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466846/item/vngoods_56_466846.jpg?width=750\",\r\n  \"69 NAVY\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/466846/item/vngoods_69_466846.jpg?width=750\"\r\n}', 8, '{\r\n  \"img1\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240307063125_official_styling_120018801\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240307063125_official_styling_120018802\",\r\n  \"img3\" : \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24022007464_official_styling_120018681\",\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24012308166_official_styling_120018531\"\r\n}'),
(16, '{\r\n  \"img1\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465203/item/vngoods_01_465203.jpg?width=750\",\r\n  \"img2\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465203/item/vngoods_08_465203.jpg?width=750\",\r\n  \"img3\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465203/sub/vngoods_465203_sub2.jpg?width=750\",\r\n  \"img4\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465203/sub/vngoods_465203_sub7.jpg?width=750\",\r\n  \"img5\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/465203/sub/goods_465203_sub12.jpg?width=750\",\r\n  \"img6\": \"https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/465203/sub/goods_465203_sub13.jpg?width=750\"\r\n}', '{\r\n  \"01 OFF WHITE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465203/item/vngoods_01_465203.jpg?width=750\",\r\n  \"08 DARK GRAY\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465203/item/vngoods_08_465203.jpg?width=750\",\r\n  \"09 BLACK\" : \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465203/item/vngoods_09_465203.jpg?width=750\",\r\n  \"54 GREEN\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465203/item/vngoods_54_465203.jpg?width=750\",\r\n  \"62 BLUE\": \"https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465203/item/vngoods_62_465203.jpg?width=750\"\r\n}', 22, '{\r\n  \"img1\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24050202050_official_styling_130015277\",\r\n  \"img2\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/24050202053_official_styling_130015301\",\r\n  \"img3\" : \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/240326053035_official_styling_130015176\",\r\n  \"img4\": \"https://api.fastretailing.com/ugc/v1/uq/gl/OFFICIAL_IMAGES/2403150716_official_styling_130015097\"\r\n}');

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
(11, 'Quần Short Vải Linen Cotton', 588000, 20, 'Limited Offer Từ 26 Apr 2024 - 02 May 2024', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/464837/item/vngoods_32_464837.jpg?width=750', '{\r\n  \"ids\": [\r\n    12,14,16,18\r\n  ]\r\n}\r\n\r\n\r\n\r\n\r\n'),
(12, 'AIRism Cotton Áo Thun Dáng Rộng Tay Lỡ', 391000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465185/item/vngoods_52_465185.jpg?width=750', '{\r\n  \"ids\": [\r\n    1, 2, 4, 5\r\n  ]\r\n}'),
(13, 'AIRism Cotton Áo Thun Kẻ Sọc Cổ Tròn Dáng Rộng', 391000, 10, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/461914/item/vngoods_00_461914.jpg?width=750', '{\r\n  \"ids\": [\r\n    11, 12, 7, 6\r\n  ]\r\n}'),
(14, 'AIRism Cotton Áo Thun Dáng Relax Ôm Tay Lỡ', 400000, 10, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/467134/item/vngoods_36_467134.jpg?width=750', '{\r\n  \"ids\": [\r\n    11, 12, 13, 5\r\n  ]\r\n}'),
(21, 'AIRism Áo Khoác Khóa Kéo Chống UV Vải Mắt Lưới (Chống Nắng)', 686000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/456261/item/vngoods_61_456261.jpg?width=750', '{\r\n  \"ids\": [\r\n    11, 12, 1, 2\r\n  ]\r\n}'),
(22, 'DRY-EX Áo Hoodie Kéo Khóa Siêu Co Giãn (Chống Nắng)', 686000, 0, '', 'https://image.uniqlo.com/UQ/ST3/vn/imagesgoods/465203/item/vngoods_01_465203.jpg?width=750', '{\r\n  \"ids\": [\r\n    12, 11, 14, 5\r\n  ]\r\n}');

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

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `news` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `detail` TEXT,
  `date` DATE NOT NULL,
  `primary_image` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert mock data into `news`
INSERT INTO `news` (`title`, `detail`, `date`, `primary_image`) VALUES
('Giảm giá Hè', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.', '2024-05-09', 'https://t3.ftcdn.net/jpg/03/54/26/10/360_F_354261018_RD5YEbufu7Yjck3SNiRC6yfJLZoxIegZ.jpg'),
('Tạm ngưng hoạt động', 'Praesent vel tortor vitae risus pulvinar eleifend. Praesent vel tortor vitae risus pulvinar eleifend. Praesent vel tortor vitae risus pulvinar eleifend.', '2024-03-03', 'https://cdn-icons-png.flaticon.com/512/66/66832.png'),
('Giảm giá Tết', 'Fusce sollicitudin, elit sed ornare feugiat, mauris turpis. Fusce sollicitudin, elit sed ornare feugiat, mauris turpis. Fusce sollicitudin, elit sed ornare feugiat, mauris turpis.', '2024-01-01', 'https://t3.ftcdn.net/jpg/03/54/26/10/360_F_354261018_RD5YEbufu7Yjck3SNiRC6yfJLZoxIegZ.jpg');


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `usrname` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_joined` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `usrname`, `passwd`, `fullname`, `email`, `gender`, `date_joined`) VALUES
(1, 'test', '$2y$10$qiHcOR.B886I6lBDTfSrd.mRW.DsfF7f3072Bks2duWiOcbA7lToG', 'PHP user', 'test@gmail.com', 'F', '2024-05-07 10:10:17'),
(2, 'jhin', '$2y$10$cP4zv3DuKbzeKUZ3u9TXpe3XDLA2gO/KykXkmEwcxzEEUKQnBTzKu', 'jhin', 'jhin@riot.com', 'M', '2024-05-07 10:10:39'),
(3, 'haha', '$2y$10$LTxXssdv5Vt38LB3Momq8OGdzok4W.nacihzBUV62j4LQa9/X94Xy', 'haha', 'haha@gmail.com', 'M', '2024-05-07 10:16:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cartid`,`productid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`id`);

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cartid`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
