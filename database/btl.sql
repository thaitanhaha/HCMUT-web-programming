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


-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userid`) VALUES
(2, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--


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

--
-- Dumping data for table `collection`
--

--------------------------------------------------------

--
-- Table structure for table `image`
--

-- Dumping data for table `image`
--


-- --------------------------------------------------------

--
-- Table structure for table `product`
--

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

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

-- Indexes for table `product`
--


--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--

--
-- AUTO_INCREMENT for table `product`
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
