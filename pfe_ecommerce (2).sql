-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 04:43 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfe_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_cate` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(191) NOT NULL,
  `mate_title` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_cate`, `description`, `image`, `mate_title`, `created_at`, `updated_at`) VALUES
(1, 'Phones', 'A smartphone is a mobile device that combines the functions of a traditional cellular phone with advanced computing and communication capabilities. These devices typically feature touchscreens, powerful processors, high-quality cameras, and access to wireless data networks. Smartphones are capable of running a wide range of apps and software, allowing users to browse the internet, send and receive email and text messages, make phone calls, take photos and videos, play games, and much more.', '1681578797.jpeg', 'SmartPhone', '2023-04-15 16:13:17', '2023-04-15 16:13:17'),
(2, 'Computeurs', 'Computers can be used for a wide variety of tasks, from basic word processing and internet browsing to complex data analysis and gaming. They can run a wide range of software, from operating systems and productivity suites to video editing software and games.\r\n\r\nOverall, computers have become essential tools for many aspects of modern life, from business and education to entertainment and communication.', '1683404846.jpeg', 'Computeur', '2023-04-15 16:14:31', '2023-05-06 19:27:26');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) NOT NULL,
  `id_prod` bigint(20) NOT NULL,
  `qty_prod` bigint(20) NOT NULL,
  `total_price` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `id_order`, `id_prod`, `qty_prod`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 13000, '2023-04-29 15:07:42', '2023-04-29 15:07:43'),
(2, 1, 4, 5, NULL, '2023-04-29 15:07:42', '2023-04-29 15:07:42'),
(3, 2, 1, 3, 3000, '2023-04-29 15:09:17', '2023-04-29 15:09:17'),
(4, 3, 5, 4, 4400, '2023-04-29 15:09:50', '2023-04-29 15:09:50'),
(5, 4, 12, 1, 126500, '2023-04-29 17:06:25', '2023-04-29 17:06:25'),
(6, 4, 1, 2, NULL, '2023-04-29 17:06:25', '2023-04-29 17:06:25'),
(7, 5, 4, 2, 4000, '2023-04-29 17:14:15', '2023-04-29 17:14:15'),
(8, 6, 1, 2, 6000, '2023-04-29 17:45:34', '2023-04-29 17:45:34'),
(9, 6, 4, 2, NULL, '2023-04-29 17:45:34', '2023-04-29 17:45:34'),
(10, 7, 7, 1, 245000, '2023-04-29 20:55:15', '2023-04-29 20:55:15'),
(11, 8, 11, 1, 124500, '2023-04-30 11:45:21', '2023-04-30 11:45:21'),
(12, 9, 11, 1, 126600, '2023-04-30 13:21:56', '2023-04-30 13:21:56'),
(13, 9, 3, 1, NULL, '2023-04-30 13:21:56', '2023-04-30 13:21:56'),
(14, 10, 4, 1, 2000, '2023-04-30 14:27:05', '2023-04-30 14:27:05'),
(15, 11, 4, 1, 2000, '2023-04-30 14:43:33', '2023-04-30 14:43:33'),
(16, 12, 10, 1, 1200, '2023-05-02 07:57:09', '2023-05-02 07:57:09'),
(17, 13, 10, 1, 491200, '2023-05-02 08:08:28', '2023-05-02 08:08:28'),
(18, 13, 7, 2, NULL, '2023-05-02 08:08:28', '2023-05-02 08:08:28'),
(19, 14, 1, 1, 1000, '2023-05-03 11:48:01', '2023-05-03 11:48:01'),
(20, 15, 1, 1, 155900, '2023-05-03 14:18:26', '2023-05-03 14:18:26'),
(21, 15, 9, 1, NULL, '2023-05-03 14:18:26', '2023-05-03 14:18:26'),
(22, 16, 8, 1, 2000, '2023-05-03 14:33:21', '2023-05-03 14:33:21'),
(23, 17, 7, 1, 245000, '2023-05-04 21:59:45', '2023-05-04 21:59:45'),
(26, 20, 15, 3, 7500, '2023-05-06 19:20:55', '2023-05-06 19:20:55'),
(27, 21, 15, 1, 2500, '2023-05-07 21:31:16', '2023-05-07 21:31:16'),
(28, 22, 15, 1, 2500, '2023-05-07 21:32:48', '2023-05-07 21:32:48'),
(29, 23, 15, 1, 2500, '2023-05-07 21:34:40', '2023-05-07 21:34:40'),
(30, 24, 15, 1, 2500, '2023-05-07 21:42:13', '2023-05-07 21:42:13'),
(31, 25, 12, 2, 252254, '2023-05-10 13:44:16', '2023-05-10 13:44:17'),
(32, 25, 8, 1, NULL, '2023-05-10 13:44:16', '2023-05-10 13:44:16'),
(33, 25, 18, 1, NULL, '2023-05-10 13:44:17', '2023-05-10 13:44:17'),
(34, 26, 1, 1, 3700, '2023-05-12 18:44:18', '2023-05-12 18:44:18'),
(35, 26, 13, 1, NULL, '2023-05-12 18:44:18', '2023-05-12 18:44:18'),
(36, 26, 8, 1, NULL, '2023-05-12 18:44:18', '2023-05-12 18:44:18'),
(38, 27, 8, 2, NULL, '2023-05-14 21:01:03', '2023-05-14 21:01:03'),
(40, 28, 8, 1, NULL, '2023-05-15 10:39:51', '2023-05-15 10:39:51'),
(41, 28, 11, 1, NULL, '2023-05-15 10:39:51', '2023-05-15 10:39:51'),
(50, 32, 12, 1, 124500, '2023-05-16 17:23:24', '2023-05-16 17:23:24'),
(51, 33, 18, 1, 1254, '2023-05-16 17:24:33', '2023-05-16 17:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_04_15_095710_create_categories_table', 1),
(12, '2023_04_15_145127_create_products_table', 1),
(13, '2023_04_17_234329_create_commende_table', 2),
(14, '2023_04_18_001041_create_commande_table', 3),
(15, '2023_04_18_005354_add_gte_to_commande_table', 4),
(16, '2023_04_20_165039_create_facture_table', 5),
(17, '2023_04_20_170653_create_order_table', 6),
(18, '2023_04_20_170743_create_facture__table', 6),
(19, '2023_04_26_145821_create_wishlists_table', 7),
(20, '2023_04_27_140732_create_fournisseurs_table', 8),
(21, '2023_04_28_114242_create_notations_table', 9),
(22, '2023_04_28_140455_create_evaluations_table', 9),
(23, '2023_04_29_091540_create_orders_table', 10),
(24, '2023_04_29_092136_create_suppliers_table', 10),
(25, '2023_04_29_115701_create_invoices_table', 11),
(27, '2023_04_30_112458_create_reviews_table', 12),
(28, '2023_05_06_145633_create_products_parts_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `notations`
--

CREATE TABLE `notations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_prod` bigint(20) NOT NULL,
  `stars_rated` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notations`
--

INSERT INTO `notations` (`id`, `id_user`, `id_prod`, `stars_rated`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '4', '2023-04-29 15:10:23', '2023-05-04 21:58:28'),
(2, 4, 5, '5', '2023-04-29 15:10:39', '2023-04-29 15:10:39'),
(3, 2, 1, '3', '2023-04-29 17:54:24', '2023-04-29 17:54:24'),
(4, 3, 1, '1', '2023-04-29 17:54:52', '2023-05-03 12:42:26'),
(5, 1, 1, '3', '2023-04-29 17:06:38', '2023-05-10 13:27:53'),
(6, 1, 4, '3', '2023-04-29 17:14:30', '2023-04-30 14:40:26'),
(7, 1, 7, '3', '2023-04-29 20:55:24', '2023-05-03 11:34:33'),
(8, 1, 11, '2', '2023-04-30 13:04:11', '2023-04-30 13:15:06'),
(9, 1, 3, '3', '2023-04-30 13:22:05', '2023-04-30 13:22:05'),
(10, 2, 4, '5', '2023-04-30 14:41:28', '2023-04-30 14:41:36'),
(11, 3, 4, '3', '2023-04-30 14:45:32', '2023-04-30 16:00:41'),
(12, 3, 10, '4', '2023-05-02 07:57:24', '2023-05-02 07:57:24'),
(13, 3, 9, '3', '2023-05-03 14:20:18', '2023-05-03 14:23:42'),
(14, 4, 7, '1', '2023-05-04 22:00:05', '2023-05-04 22:00:05'),
(15, 1, 15, '5', '2023-05-06 21:02:53', '2023-05-07 21:30:03'),
(16, 2, 15, '4', '2023-05-07 21:31:30', '2023-05-07 21:31:30'),
(17, 4, 15, '4', '2023-05-07 21:33:06', '2023-05-07 21:33:06'),
(18, 3, 15, '5', '2023-05-07 21:34:57', '2023-05-07 21:34:57'),
(19, 5, 15, '5', '2023-05-07 21:42:28', '2023-05-07 21:42:28'),
(20, 1, 8, '4', '2023-05-11 22:09:22', '2023-05-11 22:09:22'),
(21, 1, 12, '5', '2023-05-16 17:22:50', '2023-05-16 17:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` bigint(191) NOT NULL,
  `address1` varchar(191) NOT NULL,
  `address2` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `country` varchar(191) DEFAULT NULL,
  `state` varchar(191) NOT NULL,
  `pincode` varchar(191) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `price_total` bigint(20) NOT NULL,
  `image` varchar(255) NOT NULL,
  `message` varchar(191) DEFAULT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_user`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `country`, `state`, `pincode`, `status`, `price_total`, `image`, `message`, `tracking_no`, `created_at`, `updated_at`) VALUES
(1, 4, 'adda', 'isahk', 'isahk@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 13000, '1683402375.jpg', NULL, 'techshop 4907', '2023-04-29 15:07:42', '2023-04-29 16:33:21'),
(2, 4, 'adda', 'isahk', 'isahk@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 3000, '1683402375.jpg', NULL, 'techshop 9358', '2023-04-29 15:09:17', '2023-05-02 08:38:13'),
(3, 4, 'adda', 'isahk', 'isahk@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 4400, '1683402375.jpg', NULL, 'techshop 6578', '2023-04-29 15:09:50', '2023-05-03 22:05:18'),
(4, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 126500, '1683402375.jpg', NULL, 'techshop 4409', '2023-04-29 17:06:25', '2023-05-03 22:05:24'),
(5, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 4000, '1683402375.jpg', NULL, 'techshop 6943', '2023-04-29 17:14:15', '2023-05-03 22:05:29'),
(6, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 6000, '1683402375.jpg', NULL, 'techshop 5868', '2023-04-29 17:45:34', '2023-05-03 22:05:34'),
(7, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 245000, '1683402375.jpg', NULL, 'techshop 9727', '2023-04-29 20:55:15', '2023-05-03 22:05:38'),
(8, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 124500, '1683402375.jpg', NULL, 'techshop 2572', '2023-04-30 11:45:21', '2023-05-04 09:08:14'),
(9, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 126600, '1683402375.jpg', NULL, 'techshop 1370', '2023-04-30 13:21:56', '2023-05-04 22:07:33'),
(13, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 491200, '1683402375.jpg', NULL, 'techshop 5039', '2023-05-02 08:08:28', '2023-05-14 20:40:12'),
(15, 3, 'Adda Benkosseir', 'Kossai', 'kossai@gmail.com', 549380267, 'El Hasni Chlef', 'univ', 'Ain Merane', 'Algeria', 'Mostaganm', '02004', 0, 155900, '1683402375.jpg', NULL, 'techshop 4900', '2023-05-03 14:18:26', '2023-05-03 14:18:26'),
(16, 3, 'Adda Benkosseir', 'Kossai', 'kossai@gmail.com', 549380267, 'El Hasni Chlef', 'univ', 'Ain Merane', 'Algeria', 'Mostaganm', '02004', 0, 2000, '1683402375.jpg', NULL, 'techshop 1636', '2023-05-03 14:33:21', '2023-05-03 14:33:21'),
(17, 4, 'adda', 'isahk', 'isahk@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 245000, '1683402375.jpg', NULL, 'techshop 3095', '2023-05-04 21:59:45', '2023-05-04 21:59:45'),
(20, 1, 'Adda Benkosseir', 'Moh', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 7500, '1683404455.jpg', NULL, 'techshop 5486', '2023-05-06 19:20:55', '2023-05-06 19:24:09'),
(21, 2, 'Adda', 'Mohamed', 'addamohamed67@gmail.com', 549380267, 'La Grande Mosqué', 'La Grande Mosquée', 'Ain Merane', 'Algeria', 'ain merane', '02004', 0, 2500, '1683498676.jpg', NULL, 'techshop 4140', '2023-05-07 21:31:16', '2023-05-07 21:31:16'),
(22, 4, 'adda', 'isahk', 'isahk@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 2500, '1683498768.jpg', NULL, 'techshop 1111', '2023-05-07 21:32:48', '2023-05-07 21:32:48'),
(23, 3, 'Adda Benkosseir', 'kossai', 'kossai@gmail.com', 667280564, 'El Hasni Chlef', 'univ', 'Ain Merane', 'Algeria', 'Mostaganm', '02004', 0, 2500, '1683498880.jpg', NULL, 'techshop 1812', '2023-05-07 21:34:40', '2023-05-07 21:34:40'),
(24, 5, 'Adda', 'Oussama', 'oussama@gmail.com', 547896521, 'la grounde poste', 'la grounde mosquee', 'babe zower', 'Algeria', 'algeria', '02016', 1, 2500, '1683499333.jpg', NULL, 'techshop 6196', '2023-05-07 21:42:13', '2023-05-12 18:24:39'),
(32, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380255, 'Rue Chlef', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02044', 0, 124500, '1684261404.jpg', NULL, 'techshop 8606', '2023-05-16 17:23:24', '2023-05-16 17:23:24'),
(33, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380255, 'Rue Chlef', 'RUE Ain Merane', 'Ain Merane', 'Algeria', 'Chlef', '02044', 0, 1254, '1684261473.jpg', NULL, 'techshop 4990', '2023-05-16 17:24:33', '2023-05-16 17:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_prod` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `qty_prod` bigint(20) NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('addamohamed099@gmail.com', '$2y$10$E9s3si1lSKYh.03ag5VJSehhAHku0tiPMJPh2H5IIYopclbILTwYq', '2023-05-15 19:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cate` bigint(20) NOT NULL,
  `id_supp` bigint(20) NOT NULL,
  `name_prod` varchar(191) NOT NULL,
  `mark_prod` varchar(191) NOT NULL,
  `original_price` double(8,2) NOT NULL,
  `selling_price` double(8,2) DEFAULT NULL,
  `qte_stock` bigint(20) NOT NULL,
  `colors` text NOT NULL,
  `storages` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `small_descripton` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_cate`, `id_supp`, `name_prod`, `mark_prod`, `original_price`, `selling_price`, `qte_stock`, `colors`, `storages`, `status`, `image`, `description`, `small_descripton`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 'iphone 14 pro max', 'Apple', 1100.00, 1000.00, 172, '[\"#000\",\"#fff\",\"#5e5566\"]', '[\"64 GB\",\"128 GB\",\"256 GB\"]', 1, '1683736439.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', '2023-04-15 19:06:07', '2023-05-13 21:31:42'),
(3, 1, 7, 'Galaxy S23 Ultra', 'Samsung', 2100.00, NULL, 26, '[\"#fff\",\"#5e5566\",\"#fb1230\"]', '[\"128 GB\",\"256 GB\",\"512 GB\"]', 0, '1681634432.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', '2023-04-16 07:40:32', '2023-05-15 10:52:09'),
(4, 2, 7, 'Galaxy Book 3', 'Samsung', 2100.00, 2000.00, 139, '[\"#5e5566\",\"#fb1230\",\"#e2e4e1\",\"#4b4845\",\"#FFFF00\"]', '[\"256 GB\",\"512 GB\",\"2 TB\"]', 1, '1681634508.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', '2023-04-16 07:41:48', '2023-05-13 21:33:33'),
(5, 1, 7, 'iphone 14 Plus', 'Apple', 1100.00, NULL, 6, '[\"#fff\",\"#fb1230\",\"#faf7f2\",\"#e5ddea\",\"#a9bacc\",\"#343b43\",\"#FFFF00\"]', '[\"128 GB\",\"256 GB\",\"512 GB\"]', 1, '1681657773.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-16 14:09:33', '2023-05-15 15:24:15'),
(6, 1, 8, 'iphone 14', 'Apple', 109900.00, NULL, 100, '[\"#fb1230\"]', '[\"128 GB\",\"256 GB\",\"512 GB\"]', 1, '1681658030.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies.', '2023-04-16 14:13:50', '2023-05-13 21:36:32'),
(7, 2, 8, 'MacBook Air', 'Apple', 245000.00, NULL, 14, '[\"#fff\",\"#e2e4e1\",\"#e5ddea\"]', '[\"256 GB\",\"512 GB\",\"1 TB\",\"2 TB\"]', 1, '1681658104.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-16 14:15:04', '2023-05-13 21:36:52'),
(8, 2, 8, 'MacBook pro', 'Apple', 3000.00, 2000.00, 297, '[\"silver\",\"gray\"]', '[\"256 GB\",\"512 GB\",\"1 TB\",\"2 TB\"]', 1, '1681658208.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-16 14:16:48', '2023-05-15 15:24:15'),
(9, 2, 8, 'Galaxy Book 3 Pro', 'Samsung', 154900.00, NULL, 20, '[\"#4b4845\",\"#e5ddea\",\"#a9bacc\"]', '[\"256 GB\",\"512 GB\"]', 1, '1681658295.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-16 14:18:15', '2023-05-14 16:47:10'),
(10, 1, 8, 'Galaxy S23', 'Samsung', 1200.00, NULL, 230, '[\"#000\",\"#fff\",\"#5e5566\"]', '[\"64 GB\",\"128 GB\",\"256 GB\"]', 1, '1681658595.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-16 14:23:15', '2023-05-14 16:37:02'),
(11, 2, 8, 'Galaxy Book 3 360', 'Samsung', 124500.00, NULL, 117, '[\"#000\"]', '[\"256 GB\"]', 0, '1681739378.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-17 12:49:38', '2023-05-15 10:39:51'),
(12, 2, 8, 'Dell laptop', 'Dell', 124500.00, NULL, 223, '[\"#000\",\"#fff\",\"silver\",\"gray\"]', '[\"256 GB\",\"512 GB\",\"1 TB\",\"2 TB\"]', 0, '1681742269.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-04-17 13:37:49', '2023-05-16 17:23:24'),
(13, 1, 8, 'iphon11', 'Apple', 799.00, 700.00, 7, '[\"#000\",\"#fff\",\"#fb1230\"]', '[\"64 GB\",\"128 GB\",\"512 GB\"]', 1, '1682447565.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-25 17:32:45', '2023-05-15 15:24:15'),
(15, 1, 9, 'one plus 10 pro', 'Google', 2500.00, NULL, 192, '[\"#000\",\"gray\"]', '[\"256 GB\",\"512 GB\",\"1 TB\"]', 0, '1682617279.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-04-27 16:41:19', '2023-05-15 10:52:09'),
(18, 1, 8, 'iPhone 12 pro', 'Apple', 1254.00, NULL, 120, '[\"#4b4845\",\"#e5ddea\",\"#a9bacc\",\"silver\"]', '[\"256 GB\",\"512 GB\"]', 0, '1683584841.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-05-08 21:27:21', '2023-05-16 17:24:33'),
(19, 2, 8, 'Lenove ThinkPad', 'Lenove', 1560.00, NULL, 153, '[\"silver\",\"gray\"]', '[\"512 GB\",\"1 TB\",\"2 TB\"]', 1, '1684001303.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-05-13 17:08:23', '2023-05-15 15:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `products_parts`
--

CREATE TABLE `products_parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_prod` bigint(20) NOT NULL,
  `colors` text NOT NULL,
  `storage` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_parts`
--

INSERT INTO `products_parts` (`id`, `id_prod`, `colors`, `storage`, `created_at`, `updated_at`) VALUES
(18, 16, '[\"#000\",\"#5e5566\",\"#d4c9b1\",\"#4b4845\"]', '[\"128 GB\",\"256 GB\",\"512 GB\"]', '2023-05-08 21:27:21', '2023-05-08 21:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_prod` bigint(20) NOT NULL,
  `user_review` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `id_user`, `id_prod`, `user_review`, `created_at`, `updated_at`) VALUES
(3, 8, 4, 'Mohame adda aya tchof Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-30 14:28:02', '2023-04-30 14:28:19'),
(4, 1, 4, 'aw chahow pc chabab bsah mackbook khire mno 9iwww', '2023-04-30 14:30:05', '2023-04-30 14:30:05'),
(5, 1, 4, 'pc 3ayan bzaff Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-04-30 14:43:53', '2023-04-30 14:45:47'),
(6, 8, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-05-02 07:57:51', '2023-05-02 07:57:51'),
(7, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-05-02 10:21:31', '2023-05-02 10:21:31'),
(8, 1, 7, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-05-03 11:26:27', '2023-05-03 11:26:27'),
(9, 8, 7, 'makac mnha', '2023-05-03 11:31:33', '2023-05-03 11:31:33'),
(10, 8, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-05-03 11:48:39', '2023-05-03 11:48:39'),
(11, 8, 9, 'îp$^p$p', '2023-05-03 14:24:03', '2023-05-03 14:24:03'),
(12, 8, 9, 'window.location.reload();', '2023-05-03 14:25:12', '2023-05-03 14:25:12'),
(13, 1, 9, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-05-03 14:29:24', '2023-05-03 14:29:24'),
(14, 1, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-05-03 14:29:52', '2023-05-03 14:29:52'),
(15, 1, 8, 'ha allah ghalb makch kifah', '2023-05-03 14:39:29', '2023-05-03 14:48:42'),
(16, 1, 8, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-05-03 14:42:00', '2023-05-03 14:42:00'),
(17, 1, 1, 'photo chaba yah', '2023-05-03 21:16:01', '2023-05-03 21:16:01'),
(18, 1, 1, 'iphone chabab yah', '2023-05-04 09:15:25', '2023-05-04 09:15:25'),
(19, 8, 1, 'wah chabab bzaf', '2023-05-04 21:58:47', '2023-05-04 21:58:47'),
(20, 8, 7, 'oipiopop', '2023-05-04 22:00:13', '2023-05-04 22:00:13'),
(21, 8, 15, '3ajbni choya barek', '2023-05-06 21:03:05', '2023-05-06 21:03:05'),
(22, 8, 15, 'good phone', '2023-05-07 21:31:40', '2023-05-07 21:31:40'),
(23, 8, 15, 'haadja maliha', '2023-05-07 21:33:21', '2023-05-07 21:33:21'),
(24, 8, 15, 'good', '2023-05-07 21:35:08', '2023-05-07 21:35:08'),
(25, 8, 15, 'allah yaberk', '2023-05-07 21:42:39', '2023-05-07 21:42:39'),
(26, 1, 10, 'tggjhjhjkj', '2023-05-09 09:09:02', '2023-05-09 09:09:02'),
(27, 1, 1, 'Now I want input. When entering a location, for example, the state of California, it gives the coordinates of the state, lat and lng, and saves them in the database', '2023-05-10 13:27:19', '2023-05-10 13:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `let` float NOT NULL,
  `lng` float NOT NULL,
  `location` varchar(255) NOT NULL,
  `rating` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `fname`, `lname`, `email`, `phone`, `image`, `address`, `description`, `let`, `lng`, `location`, `rating`, `created_at`, `updated_at`) VALUES
(7, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, '1683903920.jpg', 'RUE N°04 La Grande Mosquée', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', 36.1929, 1.2491, 'Chettia ⵛⵛⴻⵟⵉⵢⴰ الشطية, دائرة أولاد فارس, Chlef ⵛⵛⵍⴻⴼ الشلف, Algérie / ⵍⵣⵣⴰⵢⴻⵔ / الجزائر', 3, '2023-05-11 21:44:09', '2023-05-12 14:11:13'),
(8, 'Adda', 'Oussama', 'oussama@gmail.com', 547896521, '1683905623.jpg', 'la grounde poste', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', 36.2034, 1.26807, 'Chlef ⵛⵛⵍⴻⴼ الشلف, Algérie / ⵍⵣⵣⴰⵢⴻⵔ / الجزائر', 5, '2023-05-11 21:52:56', '2023-05-13 21:43:19'),
(9, 'Adda Benkosseir', 'Mohamed', 'addamohamed67@gmail.com', 654789652, '1683903758.jpeg', 'La Grande Mosqué', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', 36.1263, 0.880193, 'Mazouna, Daïra Mazouna, Relizane ⵉⵖⵉⵍ ⵉⵣⴰⵏ غليزان, Algérie / ⵍⵣⵣⴰⵢⴻⵔ / الجزائر', 4, '2023-05-12 10:39:22', '2023-05-13 10:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `phone` int(191) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(191) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `phone`, `address1`, `address2`, `city`, `state`, `pincode`, `country`, `role_as`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adda Benkosseir Mohamed', 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', NULL, '$2y$10$RJXwmUx2RSx3TTsDCYGfAe.AVwSuu17dh/qEGsYaXhwcITJtBhOjO', 549380255, 'Rue Chlef', 'RUE Ain Merane', 'Ain Merane', 'Chlef', '02044', 'Algeria', 1, '1683914475.jpg', '2hrKHi3IFeJfTQ1X6KJdkq0AJiJ1GZ4xrFMitkUonPYlRdgvoXkri6vgb3wa', '2023-04-15 14:23:43', '2023-05-16 17:24:33'),
(8, 'Adda Kossai', 'Adda', 'Kossai', 'kossai@gmail.com', NULL, '$2y$10$3H7ZJJxyUuS550dGeUS5JujmmxtgSB4Dy4Kc6BtQARqSB3o2x9RI6', 645879652, 'RUe 04 la grande mosquee', 'RUe 05 la grande mosquee', 'Ain merane', 'Chlef', '02004', 'Algeria', 0, '1684067916.jpeg', 'uD7KuAWnGArfgAGiKNI5CJcewElTBMXKBd9dMTWSr3VEjw9nNhShxwCmHVFx', '2023-05-14 11:38:12', '2023-05-14 11:38:36'),
(9, 'Adda Benkosseir Oussama', 'Adda Benkosseir', 'Oussama', 'oussama@gmail.com', NULL, '$2y$10$SEbIxDKZFsZ4FQ2v8IyQOucNWRhjemabTv5R1w8QeJ2EmG371UJEa', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Chlef', '02004', 'Algeria', 0, '1684243753.jpg', NULL, '2023-05-16 12:27:27', '2023-05-16 12:29:13'),
(10, 'Adda Benkosseir Isahk', 'Adda Benkosseir', 'Isahk', 'isahk@gmail.com', NULL, '$2y$10$gL4j9lphq9wsUJnctfJebeaQ04NMR4b1q6DkNQC37KFmN4GIfpxBO', 654789652, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Chlef', '02004', 'Algeria', 0, '1684256757.jpg', NULL, '2023-05-16 16:05:27', '2023-05-16 16:05:57'),
(13, 'Garzzo Youcef', 'Garzzo', 'Youcef', 'youcef@gmail.com', NULL, '$2y$10$KQ2ykhrmn.JUyf0g3ABBAeOjFinrJWMcElKitghSLTHxERaMZEYWe', 645789512, 'Rue N15 Hopitale', 'Rue N15 Hopitale', 'Babe Zower', 'Algeria', '02016', 'Algeria', 1, '1684274662.jpeg', NULL, '2023-05-16 21:04:22', '2023-05-16 21:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_prod` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `id_user`, `id_prod`, `created_at`, `updated_at`) VALUES
(1, 1, 12, '2023-04-29 16:38:41', '2023-04-29 16:38:41'),
(2, 3, 10, '2023-05-02 07:58:06', '2023-05-02 07:58:06'),
(3, 1, 10, '2023-05-02 08:07:26', '2023-05-02 08:07:26'),
(4, 1, 7, '2023-05-02 14:01:29', '2023-05-02 14:01:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notations`
--
ALTER TABLE `notations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_parts`
--
ALTER TABLE `products_parts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `notations`
--
ALTER TABLE `notations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products_parts`
--
ALTER TABLE `products_parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
