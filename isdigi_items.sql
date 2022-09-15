-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2022 at 06:28 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isdigi_items`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Smartphones'),
(2, 'Tablets'),
(3, 'Printers'),
(4, 'Accessories'),
(5, 'TVs'),
(6, 'Laptops');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `category_id`, `price`) VALUES
(1, 'Item 1', 0, 456),
(2, 'Item 2', 0, 631),
(3, 'Item 3', 0, 538),
(4, 'Item 4', 0, 273),
(5, 'Item 5', 0, 419),
(7, 'Item 7', 1, 164),
(8, 'Item 8', 1, 814),
(9, 'Item 9', 1, 255),
(10, 'Item 10', 1, 211),
(12, 'Item 12', 2, 453),
(13, 'Item 13', 2, 684),
(14, 'Item 14', 2, 485),
(15, 'Item 15', 2, 208),
(17, 'Item 17', 3, 437),
(18, 'Item 18', 3, 664),
(19, 'Item 19', 3, 625),
(20, 'Item 20', 3, 814),
(21, 'Item 21', 3, 382),
(22, 'Item 22', 3, 278),
(24, 'Item 24', 4, 576),
(25, 'Item 25', 4, 447),
(26, 'Item 26', 4, 444),
(28, 'Item 28', 5, 791),
(29, 'Item 29', 5, 565),
(30, 'Item 30', 5, 507),
(32, 'Item 32', 6, 574),
(33, 'Item 33', 6, 229),
(34, 'Item 34', 6, 670),
(35, 'Item 35', 6, 857),
(36, 'Item 36', 6, 703),
(37, 'Item 37', 6, 332);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
