-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Mar 20, 2021 at 02:31 PM
-- Server version: 10.5.8-MariaDB-1:10.5.8+maria~focal
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agencyDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `img_flats`
--

CREATE TABLE `img_flats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flat` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_on_main` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `img_flats`
--

INSERT INTO `img_flats` (`id`, `flat`, `image`, `show_on_main`, `created_at`, `updated_at`) VALUES
(1, '56', 'images/hero_bg_1.jpg', 1, NULL, NULL),
(2, '33', 'images/hero_bg_2.jpg', 1, NULL, NULL),
(3, '63', 'https://i.ibb.co/0hqfgBX/img-1.jpg', 0, NULL, NULL),
(4, '65', 'https://i.ibb.co/ns1D8Jz/img-4.jpg', 0, NULL, NULL),
(5, '62', 'https://i.ibb.co/Krcvx3x/img-3.jpg', 0, NULL, NULL),
(6, '61', 'https://i.ibb.co/rMX601Q/img-5.jpg', 0, NULL, NULL),
(7, '50', 'https://i.ibb.co/WK6YhLR/img-2.jpg', 0, NULL, NULL),
(8, '49', 'https://i.ibb.co/vhtbcfs/img-8.jpg', 0, NULL, NULL),
(9, '48', 'https://i.ibb.co/rMX601Q/img-5.jpg', 0, NULL, NULL),
(10, '47', 'https://i.ibb.co/Krcvx3x/img-3.jpg', 0, NULL, NULL),
(11, '69', 'https://i.ibb.co/vhtbcfs/img-8.jpg', 0, NULL, NULL),
(12, '71', 'https://i.ibb.co/WK6YhLR/img-2.jpg', 0, NULL, NULL),
(13, '72', 'https://i.ibb.co/0hqfgBX/img-1.jpg', 0, NULL, NULL),
(14, '73', 'https://i.ibb.co/YNb755w/img-6.jpg', 0, NULL, NULL),
(16, '34', 'images/hero_bg_3.jpg', 1, NULL, NULL),
(17, '35', 'https://i.ibb.co/rMX601Q/img-5.jpg', 0, NULL, NULL),
(18, '33', 'https://i.ibb.co/YNb755w/img-6.jpg', 0, NULL, NULL),
(19, '40', 'https://i.ibb.co/vhtbcfs/img-8.jpg', 0, NULL, NULL),
(24, '79', 'images/hero_bg_3.jpg', 1, NULL, NULL),
(25, '80', 'images/hero_bg_1.jpg', 1, NULL, NULL),
(26, '81', 'https://i.ibb.co/YNb755w/img-6.jpg', 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `img_flats`
--
ALTER TABLE `img_flats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `img_flats`
--
ALTER TABLE `img_flats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
