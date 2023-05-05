-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 07:04 PM
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
(2, 'Computeurs', 'Computers can be used for a wide variety of tasks, from basic word processing and internet browsing to complex data analysis and gaming. They can run a wide range of software, from operating systems and productivity suites to video editing software and games.\r\n\r\nOverall, computers have become essential tools for many aspects of modern life, from business and education to entertainment and communication.', '1681578871.jpeg', 'Computeur', '2023-04-15 16:14:31', '2023-04-15 16:14:31');

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
(15, 11, 4, 1, 2000, '2023-04-30 14:43:33', '2023-04-30 14:43:33');

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
(27, '2023_04_30_112458_create_reviews_table', 12);

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
(1, 4, 1, '3', '2023-04-29 15:10:23', '2023-04-29 15:10:23'),
(2, 4, 5, '5', '2023-04-29 15:10:39', '2023-04-29 15:10:39'),
(3, 2, 1, '3', '2023-04-29 17:54:24', '2023-04-29 17:54:24'),
(4, 3, 1, '1', '2023-04-29 17:54:52', '2023-04-29 17:54:52'),
(5, 1, 1, '5', '2023-04-29 17:06:38', '2023-04-30 12:08:23'),
(6, 1, 4, '3', '2023-04-29 17:14:30', '2023-04-30 14:40:26'),
(7, 1, 7, '4', '2023-04-29 20:55:24', '2023-04-29 20:55:24'),
(8, 1, 11, '2', '2023-04-30 13:04:11', '2023-04-30 13:15:06'),
(9, 1, 3, '3', '2023-04-30 13:22:05', '2023-04-30 13:22:05'),
(10, 2, 4, '5', '2023-04-30 14:41:28', '2023-04-30 14:41:36'),
(11, 3, 4, '3', '2023-04-30 14:45:32', '2023-04-30 16:00:41');

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
  `message` varchar(191) DEFAULT NULL,
  `tracking_no` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `id_user`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `country`, `state`, `pincode`, `status`, `price_total`, `message`, `tracking_no`, `created_at`, `updated_at`) VALUES
(1, 4, 'adda', 'isahk', 'isahk@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 13000, NULL, 'techshop 4907', '2023-04-29 15:07:42', '2023-04-29 16:33:21'),
(2, 4, 'adda', 'isahk', 'isahk@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 3000, NULL, 'techshop 9358', '2023-04-29 15:09:17', '2023-04-29 15:09:17'),
(3, 4, 'adda', 'isahk', 'isahk@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 4400, NULL, 'techshop 6578', '2023-04-29 15:09:50', '2023-04-29 15:09:50'),
(4, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 126500, NULL, 'techshop 4409', '2023-04-29 17:06:25', '2023-04-29 17:06:25'),
(5, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 4000, NULL, 'techshop 6943', '2023-04-29 17:14:15', '2023-04-29 17:14:15'),
(6, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 6000, NULL, 'techshop 5868', '2023-04-29 17:45:34', '2023-04-29 17:45:34'),
(7, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 245000, NULL, 'techshop 9727', '2023-04-29 20:55:15', '2023-04-29 20:55:15'),
(8, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 124500, NULL, 'techshop 2572', '2023-04-30 11:45:21', '2023-04-30 11:45:21'),
(9, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 126600, NULL, 'techshop 1370', '2023-04-30 13:21:56', '2023-04-30 13:21:56'),
(10, 2, 'Adda', 'Mohamed', 'addamohamed099@gmail.com', 549380267, 'La Grande Mosqué', 'La Grande Mosquée', 'Ain Merane', 'Algeria', 'ain merane', '02004', 0, 2000, NULL, 'techshop 2447', '2023-04-30 14:27:05', '2023-04-30 14:27:05'),
(11, 3, 'Adda Benkosseir', 'Kossai', 'addamohamed099@gmail.com', 549380267, 'El Hasni Chlef', 'univ', 'Ain Merane', 'Algeria', 'Mostaganm', '02004', 0, 2000, NULL, 'techshop 4226', '2023-04-30 14:43:33', '2023-04-30 14:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_prod` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `qty_prod` bigint(20) NOT NULL,
  `total_price` double(8,2) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `tracking_no` varchar(255) DEFAULT NULL,
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
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `color` varchar(255) NOT NULL,
  `storage` varchar(255) NOT NULL,
  `image` varchar(191) NOT NULL,
  `description` longtext NOT NULL,
  `small_descripton` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_cate`, `id_supp`, `name_prod`, `mark_prod`, `original_price`, `selling_price`, `qte_stock`, `status`, `color`, `storage`, `image`, `description`, `small_descripton`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'iphone 14 pro max', 'Apple', 1100.00, 1000.00, 176, 1, '#434343,#fff', '', '1681589167.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', '2023-04-15 19:06:07', '2023-04-29 17:45:34'),
(3, 1, 1, 'Galaxy S23 Ultra', 'Samsung', 2100.00, NULL, 28, 0, '#000', '64,256,1024', '1681634432.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', '2023-04-16 07:40:32', '2023-04-30 13:21:56'),
(4, 2, 1, 'Galaxy Book 3', 'Samsung', 2100.00, 2000.00, 139, 1, 'red', '', '1681634508.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', '2023-04-16 07:41:48', '2023-04-30 14:43:33'),
(5, 1, 2, 'iphone 14 Plus', 'Apple', 1100.00, NULL, 7, 1, '', '', '1681657773.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-16 14:09:33', '2023-04-29 15:09:50'),
(6, 1, 2, 'iphone 14', 'Apple', 109900.00, NULL, 100, 1, '', '', '1681658030.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies.', '2023-04-16 14:13:50', '2023-04-28 22:28:24'),
(7, 2, 2, 'MacBook Air', 'Apple', 245000.00, NULL, 18, 1, '', '', '1681658104.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-16 14:15:04', '2023-04-29 20:55:15'),
(8, 2, 2, 'MacBook pro', 'Apple', 3000.00, 2000.00, 305, 1, '', '', '1681658208.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-16 14:16:48', '2023-04-27 10:23:57'),
(9, 2, 1, 'Galaxy Book 3 Pro', 'Samsung', 154900.00, NULL, 21, 1, '', '', '1681658295.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-16 14:18:15', '2023-04-16 14:18:15'),
(10, 1, 1, 'Galaxy S23', 'Samsung', 1200.00, NULL, 232, 1, '', '', '1681658595.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-16 14:23:15', '2023-04-27 10:23:57'),
(11, 2, 2, 'Galaxy Book 3 360', 'Samsung', 124500.00, NULL, 118, 0, '', '', '1681739378.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-17 12:49:38', '2023-04-30 13:21:56'),
(12, 2, 2, 'Dell laptop', 'Dell', 124500.00, NULL, 227, 0, '', '', '1681742269.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-04-17 13:37:49', '2023-04-29 17:06:25'),
(13, 1, 2, 'iphon11', 'Apple', 799.00, 700.00, 9, 1, '', '', '1682447565.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-25 17:32:45', '2023-04-27 10:23:57'),
(14, 1, 1, 'iphone 8', 'Apple', 700.00, 650.00, 256, 0, '', '', '1682614764.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Integer interdum quam nec magna scelerisque ultricies. Curabitur ornare sit amet sapien eu luctus. Morbi egestas lectus rutrum luctus euismod. Integer lacinia auctor nulla non gravida. Fusce ut enim erat. Quisque nisi risus, facilisis a fermentum non, aliquam id ex. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Cras ac finibus nisi.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-27 15:59:24', '2023-04-27 15:59:24'),
(15, 1, 2, 'one plus 10 pro', 'Google', 2500.00, NULL, 200, 0, '#000', '64,256,1024', '1682617279.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-04-27 16:41:19', '2023-04-27 16:41:19');

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
(3, 2, 4, 'Mohame adda aya tchof Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec, eleifend auctor turpis. Mauris pellentesque lectus sed libero rhoncus, a consequat elit porta.', '2023-04-30 14:28:02', '2023-04-30 14:28:19'),
(4, 1, 4, 'aw chahow pc chabab bsah mackbook khire mno 9iwww', '2023-04-30 14:30:05', '2023-04-30 14:30:05'),
(5, 3, 4, 'pc 3ayan bzaff Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-04-30 14:43:53', '2023-04-30 14:45:47');

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
  `fax` int(11) NOT NULL,
  `address` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `fname`, `lname`, `email`, `phone`, `fax`, `address`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Adda', 'Kossai', 'addamohamed099@gmail.com', 549380267, 27429885, 'RUE N°04 La Grande Mosquée', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-04-29 08:26:43', '2023-04-29 08:26:43'),
(2, 'adda', 'isahk', 'addamohamed099@gmail.com', 549380267, 27454545, 'RUE N°04 La Grande Mosquée', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-04-29 15:17:28', '2023-04-29 15:17:28');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `phone`, `address1`, `address2`, `city`, `state`, `pincode`, `country`, `role_as`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adda Benkosseir Mohamed', 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', NULL, '$2y$10$RJXwmUx2RSx3TTsDCYGfAe.AVwSuu17dh/qEGsYaXhwcITJtBhOjO', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Chlef', '02004', 'Algeria', 1, 'XnwFP1YJ8aA7eEbPy0Z3nmhMa668oi2gteyAGeR3haZPkNKwLA0TcrY9zs1B', '2023-04-15 14:23:43', '2023-04-22 13:58:53'),
(2, 'Adda  Mohamed', 'Adda', 'Mohamed', 'addamohamed67@gmail.com', NULL, '$2y$10$h.ngU8G63wgFpEl1mtJqT.q.MIgffFlV8.t2GtNcAhip.RhuBTjxm', 549380267, 'La Grande Mosqué', 'La Grande Mosquée', 'Ain Merane', 'ain merane', '02004', 'Algeria', 0, 'Brve7pVMLen6hdJE692KtXjSliZZSx4d5x60daVA9BIXld9yINycowgoDZ6P', '2023-04-18 12:49:09', '2023-04-30 14:27:05'),
(3, 'Adda Benkosseir kossai', 'Adda Benkosseir', 'Kossai', 'kossai@gmail.com', NULL, '$2y$10$05XNfsNZUXQLkSKW4xCYPO5.9WIzCWDmKqsvT1X.7GcGYOWdwgZz6', 549380267, 'El Hasni Chlef', 'univ', 'Ain Merane', 'Mostaganm', '02004', 'Algeria', 0, NULL, '2023-04-21 15:28:59', '2023-04-30 14:43:33'),
(4, 'isahk', 'adda', 'isahk', 'isahk@gmail.com', NULL, '$2y$10$ePrYl639LXDaFmTKxcDyR./jx50sKngc9FpY6DTXo4fJkHI6zUMIq', 549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Chlef', '02004', 'Algeria', 0, NULL, '2023-04-29 14:22:14', '2023-04-29 14:25:06');

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
(1, 1, 12, '2023-04-29 16:38:41', '2023-04-29 16:38:41');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `notations`
--
ALTER TABLE `notations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
