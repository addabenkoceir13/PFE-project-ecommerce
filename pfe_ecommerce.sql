-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 31 mai 2023 à 00:24
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pfe_ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
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
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `name_cate`, `description`, `image`, `mate_title`, `created_at`, `updated_at`) VALUES
(1, 'Phones', 'Smartphone technology continues to evolve rapidly, with manufacturers regularly introducing new features and improvements. The devices are becoming more powerful, offering faster processors, larger storage capacities, improved battery life, and enhanced displays.\r\nSmartphones typically feature a touchscreen interface that enables users to interact with the device using their fingers or a stylus. They also include a range of sensors such as accelerometers, gyroscopes, and proximity sensors, which provide additional functionality and user interactions.', '1684966585.jpg', 'SmartPhone', '2023-05-24 21:16:25', '2023-05-24 21:16:25'),
(2, 'Computeurs', 'Computers are electronic devices that are designed to process, store, and retrieve data. They are capable of performing a wide range of tasks, from simple calculations to complex computations and data analysis. Computers consist of both hardware and software components that work together to provide functionality and perform various operations.', '1684967064.jpg', 'Computeurs', '2023-05-24 21:24:24', '2023-05-24 21:24:24');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
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
-- Structure de la table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) NOT NULL,
  `id_prod` bigint(20) NOT NULL,
  `qty_prod` bigint(20) NOT NULL,
  `total_price` bigint(20) DEFAULT NULL,
  `num_invoice` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `invoices`
--

INSERT INTO `invoices` (`id`, `id_order`, `id_prod`, `qty_prod`, `total_price`, `num_invoice`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 438000, '#GTZOK', '2023-05-24 22:50:40', '2023-05-24 22:50:40'),
(2, 2, 2, 1, 449800, '#CMUI7', '2023-05-26 17:49:17', '2023-05-26 17:49:17'),
(3, 2, 4, 1, 449800, '#CMUI7', '2023-05-26 17:49:17', '2023-05-26 17:49:17'),
(4, 3, 13, 1, 967800, '#DO4IH', '2023-05-29 08:25:27', '2023-05-29 08:25:27'),
(5, 3, 3, 1, 967800, '#DO4IH', '2023-05-29 08:25:27', '2023-05-29 08:25:27'),
(6, 3, 1, 2, 967800, '#DO4IH', '2023-05-29 08:25:27', '2023-05-29 08:25:27'),
(7, 3, 5, 1, 967800, '#DO4IH', '2023-05-29 08:25:27', '2023-05-29 08:25:27'),
(8, 4, 6, 1, 341800, '#IZZGR', '2023-05-29 08:28:01', '2023-05-29 08:28:01'),
(9, 4, 4, 1, 341800, '#IZZGR', '2023-05-29 08:28:01', '2023-05-29 08:28:01'),
(10, 5, 9, 1, 889000, '#GCCXK', '2023-05-29 08:29:25', '2023-05-29 08:29:25'),
(11, 5, 7, 1, 889000, '#GCCXK', '2023-05-29 08:29:25', '2023-05-29 08:29:25'),
(12, 6, 1, 1, 388900, '#YFQIH', '2023-05-29 08:33:27', '2023-05-29 08:33:27'),
(13, 6, 13, 1, 388900, '#YFQIH', '2023-05-29 08:33:27', '2023-05-29 08:33:27'),
(14, 7, 1, 2, 607900, '#EHUXB', '2023-05-30 15:44:11', '2023-05-30 15:44:11'),
(15, 7, 13, 1, 607900, '#EHUXB', '2023-05-30 15:44:11', '2023-05-30 15:44:11');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
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
(28, '2023_05_06_145633_create_products_parts_table', 13),
(29, '2023_05_23_195402_create_ratings_table', 14);

-- --------------------------------------------------------

--
-- Structure de la table `notations`
--

CREATE TABLE `notations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_prod` bigint(20) NOT NULL,
  `stars_rated` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `notations`
--

INSERT INTO `notations` (`id`, `id_user`, `id_prod`, `stars_rated`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, '2023-05-24 23:47:59', '2023-05-30 15:32:21'),
(2, 1, 2, 4, '2023-05-24 23:47:59', '2023-05-24 23:47:59'),
(3, 1, 5, 4, '2023-05-29 08:26:02', '2023-05-29 08:26:02'),
(4, 1, 3, 5, '2023-05-29 08:27:17', '2023-05-29 08:27:17'),
(5, 1, 6, 3, '2023-05-29 08:28:16', '2023-05-29 08:28:16'),
(6, 1, 4, 4, '2023-05-29 08:28:32', '2023-05-29 08:28:32'),
(7, 1, 7, 3, '2023-05-29 08:29:42', '2023-05-29 08:29:42'),
(8, 1, 9, 4, '2023-05-29 08:29:59', '2023-05-29 08:29:59'),
(9, 2, 1, 5, '2023-05-29 08:33:43', '2023-05-29 08:33:43'),
(10, 2, 13, 5, '2023-05-29 08:34:17', '2023-05-29 08:34:17'),
(11, 1, 13, 5, '2023-05-29 08:34:55', '2023-05-29 08:34:55');

-- --------------------------------------------------------

--
-- Structure de la table `order`
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
-- Déchargement des données de la table `order`
--

INSERT INTO `order` (`id`, `id_user`, `fname`, `lname`, `email`, `phone`, `address1`, `address2`, `city`, `country`, `state`, `pincode`, `status`, `price_total`, `image`, `message`, `tracking_no`, `created_at`, `updated_at`) VALUES
(1, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 213549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 438000, '1684972240.jpg', NULL, 'techshop 3127', '2023-05-24 22:50:40', '2023-05-29 08:30:33'),
(2, 2, 'Adda Benkosseir', 'Kossai', 'kosai@gmail.com', 2130549380267, 'La Grande Mosqué', 'La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 1, 449800, '1685126957.jpg', NULL, 'techshop 4602', '2023-05-26 17:49:17', '2023-05-26 17:51:34'),
(3, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 213549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 967800, '1685352327.jpg', NULL, 'techshop 5426', '2023-05-29 08:25:27', '2023-05-29 08:25:27'),
(4, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 213549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 341800, '1685352481.jpg', NULL, 'techshop 1485', '2023-05-29 08:28:01', '2023-05-29 08:28:01'),
(5, 1, 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', 213549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 889000, '1685352565.jpg', NULL, 'techshop 1468', '2023-05-29 08:29:25', '2023-05-29 08:29:25'),
(6, 2, 'Adda Benkosseir', 'Kossai', 'kosai@gmail.com', 2130549380267, 'La Grande Mosqué', 'La Grande Mosquée', 'Ain Merane', 'Algeria', 'Chlef', '02004', 0, 388900, '1685352807.jpg', NULL, 'techshop 1886', '2023-05-29 08:33:27', '2023-05-29 08:33:27'),
(7, 3, 'Hamamouche', 'Amine', 'amine@gmail.com', 2130547896521, 'La Grounde Poste', 'La Grounde Mosquee', 'Ain Merane', 'Algeria', 'Chlef', '02016', 1, 607900, '1685465051.jpg', NULL, 'techshop 4741', '2023-05-30 15:44:11', '2023-05-30 15:52:03');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
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

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `id_prod`, `id_user`, `qty_prod`, `status`, `created_at`, `updated_at`) VALUES
(17, 1, 1, 3, 0, '2023-05-30 15:32:53', '2023-05-30 15:32:53');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('addamohamed099@gmail.com', '$2y$10$E9s3si1lSKYh.03ag5VJSehhAHku0tiPMJPh2H5IIYopclbILTwYq', '2023-05-15 19:04:32');

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
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
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cate` bigint(20) NOT NULL,
  `id_supp` bigint(20) NOT NULL,
  `name_prod` varchar(191) NOT NULL,
  `mark_prod` varchar(191) NOT NULL,
  `original_price` double(15,2) NOT NULL,
  `selling_price` double(15,2) DEFAULT NULL,
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
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `id_cate`, `id_supp`, `name_prod`, `mark_prod`, `original_price`, `selling_price`, `qte_stock`, `colors`, `storages`, `status`, `image`, `description`, `small_descripton`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Iphone 14 Pro Max', 'Apple', 230000.00, 219000.00, 193, '[\"#5e5566\",\"#d4c9b1\",\"#e2e4e1\",\"#343b43\"]', '[\"128 GB\",\"256 GB\",\"512 GB\",\"1 TB\"]', 1, '1684969542.jpeg', 'The iPhone 14 Pro Max was released on September 16, 20221. It has a 6.7-inch Super Retina XDR OLED display with a resolution of 2796-by-1290 pixels at 460 ppi. The display has a typical maximum brightness of 1,000 nits but can go up to 1,600 nits while watching HDR videos and 2,000 nits outdoors3. It also features a refresh rate of 120 Hz and utilizes LTPO technology.\r\n\r\nIt runs on iOS 16 and is powered by the A16 Bionic chip. It comes with storage options of 128GB/256GB/1TB and has no card slot. The iPhone 14 Pro Max weighs 240g and is 7.9mm thick.', 'The iPhone 14 Pro Max was released on September 16, 20221. It has a 6.7-inch Super Retina XDR OLED display with a resolution of 2796-by-1290 pixels at 460 ppi. The display has a typical maximum brightness of 1,000 nits but can go up to 1,600 nits while watching HDR videos and 2,000 nits outdoors3. It also features a refresh rate of 120 Hz and utilizes LTPO technology.\r\n\r\nIt runs on iOS 16 and is powered by the A16 Bionic chip. It comes with storage options of 128GB/256GB/1TB and has no card slot. The iPhone 14 Pro Max weighs 240g and is 7.9mm thick.', '2023-05-24 22:05:42', '2023-05-30 15:44:11'),
(2, 1, 1, 'Iphone 14 Pro', 'Apple', 215000.00, 209900.00, 249, '[\"#5e5566\",\"#d4c9b1\",\"#e2e4e1\",\"#343b43\"]', '[\"128 GB\",\"256 GB\",\"1 TB\"]', 1, '1684972053.jpeg', 'The iPhone 14 Pro was released on September 16, 2022. It features a redesigned screen with a pill-shaped cutout called Dynamic Island, which is interactive and versatile. It also has a square camera bump with glass lenses and three lenses: wide-angle, telephoto, and ultra-wide angle2. The iPhone 14 Pro has an always-on display that is customizable with widgets and settings. It has a 6.1-inch Super Retina XDR OLED display with a resolution of 2796-by-1290 pixels at 460 ppi3. The display has a typical maximum brightness of 1,000 nits but can go up to 1,600 nits while watching HDR videos and 2,000 nits outdoors. It also features a refresh rate of 120 Hz and utilizes LTPO technology.', 'The iPhone 14 Pro was released on September 16, 2022. It features a redesigned screen with a pill-shaped cutout called Dynamic Island, which is interactive and versatile. It also has a square camera bump with glass lenses and three lenses: wide-angle, telephoto, and ultra-wide angle2. The iPhone 14 Pro has an always-on display that is customizable with widgets and settings. It has a 6.1-inch Super Retina XDR OLED display with a resolution of 2796-by-1290 pixels at 460 ppi3. The display has a typical maximum brightness of 1,000 nits but can go up to 1,600 nits while watching HDR videos and 2,000 nits outdoors. It also features a refresh rate of 120 Hz and utilizes LTPO technology.', '2023-05-24 22:47:33', '2023-05-26 17:49:17'),
(3, 2, 2, 'MacBook Pro', 'Apple', 250000.00, NULL, 144, '[\"#e2e4e1\",\"silver\"]', '[\"256 GB\",\"512 GB\",\"1 TB\",\"2 TB\"]', 1, '1684972553.jpeg', 'The MacBook Pro 13-inch 2022 model was released on October 18, 2022. It features a 13.3-inch (diagonal) LED-backlit display with IPS technology and a resolution of 2560-by-1600 pixels at 227 pixels per inch with support for millions of colors. It has a brightness of up to 500 nits and uses True Tone technology. It is powered by the M1 Pro chip with an 8-core CPU and an 8-core GPU. It comes with storage options of 512GB/1TB/2TB/4TB and has no card slot. It has a battery life of up to 17 hours of web browsing and up to 21 hours of Apple TV app movie playback.', 'The MacBook Pro 13-inch 2022 model was released on October 18, 2022. It features a 13.3-inch (diagonal) LED-backlit display with IPS technology and a resolution of 2560-by-1600 pixels at 227 pixels per inch with support for millions of colors. It has a brightness of up to 500 nits and uses True Tone technology. It is powered by the M1 Pro chip with an 8-core CPU and an 8-core GPU. It comes with storage options of 512GB/1TB/2TB/4TB and has no card slot. It has a battery life of up to 17 hours of web browsing and up to 21 hours of Apple TV app movie playback.', '2023-05-24 22:55:53', '2023-05-29 08:25:27'),
(4, 2, 2, 'MacBook Air', 'Apple', 259000.00, 239900.00, 54, '[\"#d4c9b1\",\"#e2e4e1\",\"silver\"]', '[\"256 GB\",\"512 GB\",\"1 TB\",\"2 TB\"]', 1, '1685018758.jpeg', 'The MacBook Air M1 was released in 2020 and is powered by Apple’s M1 chip. The M1 chip and macOS give MacBook Air advanced security and privacy features beyond anything in its class, helping to protect your system and data. Secure Enclave coprocessor provides a silicon-level foundation for critical security features like Touch ID and Apple Pay — and with M1, it’s superfast1. The MacBook Air (M2, 2022) model runs on Apple’s M2 processor. It is available with an 8-core GPU with 256GB SSD or a 10-core GPU with 512GB SSD. Both models can be upgraded to 2TB SSD - though at some cost - and the 8GB of RAM can also be upgraded to either 16GB or 24GB2.', 'The MacBook Air M1 was released in 2020 and is powered by Apple’s M1 chip. The M1 chip and macOS give MacBook Air advanced security and privacy features beyond anything in its class, helping to protect your system and data. Secure Enclave coprocessor provides a silicon-level foundation for critical security features like Touch ID and Apple Pay — and with M1, it’s superfast1. The MacBook Air (M2, 2022) model runs on Apple’s M2 processor. It is available with an 8-core GPU with 256GB SSD or a 10-core GPU with 512GB SSD. Both models can be upgraded to 2TB SSD - though at some cost - and the 8GB of RAM can also be upgraded to either 16GB or 24GB2.', '2023-05-25 11:45:58', '2023-05-29 08:28:01'),
(5, 1, 3, 'Galaxy S22 Ultra', 'Samsung', 119900.00, 109900.00, 208, '[\"#d4c9b1\",\"#e5ddea\",\"#343b43\",\"silver\"]', '[\"256 GB\",\"512 GB\",\"1 TB\"]', 1, '1685021632.jpg', 'The Samsung Galaxy S23 Ultra is the headliner of the S23 series. Specifications are top-notch including 6.8-inch Dynamic AMOLED display with 120Hz refresh rate, Snapdragon 8 Gen 2 processor, 5000mAh battery, up to 12gigs of RAM, and 1TB of storage. In the camera department, a quad-camera setup is presented with two telephoto sensors1. The Galaxy S23 Ultra has a modern look, with polished aluminum edges, a Corning Gorilla Glass Victus 2 display, and a glass back. Its 6.80-inch Super AMOLED display offers stunning colors, with a resolution of 1440x3088 (WQHD+), a refresh rate of 120 Hz, a maximum brightness of 1200 cd/m², and a contrast ratio of 3000000:1', 'The Samsung Galaxy S23 Ultra is the headliner of the S23 series. Specifications are top-notch including 6.8-inch Dynamic AMOLED display with 120Hz refresh rate, Snapdragon 8 Gen 2 processor, 5000mAh battery, up to 12gigs of RAM, and 1TB of storage. In the camera department, a quad-camera setup is presented with two telephoto sensors1. The Galaxy S23 Ultra has a modern look, with polished aluminum edges, a Corning Gorilla Glass Victus 2 display, and a glass back. Its 6.80-inch Super AMOLED display offers stunning colors, with a resolution of 1440x3088 (WQHD+), a refresh rate of 120 Hz, a maximum brightness of 1200 cd/m², and a contrast ratio of 3000000:1', '2023-05-25 12:33:52', '2023-05-29 08:25:27'),
(6, 1, 3, 'Galaxy S22 | S22+', 'Samsung', 111900.00, 101900.00, 47, '[\"#000\",\"#d4c9b1\",\"#4b4845\",\"#e5ddea\",\"#FFFF00\",\"gray\"]', '[\"128 GB\",\"256 GB\",\"512 GB\"]', 1, '1685022181.jpg', 'The Samsung Galaxy S22 and S22+ are the latest smartphones from Samsung. The Galaxy S22 features a 6.1-inch Dynamic AMOLED display with a resolution of 1080 x 2400 pixels and a refresh rate of 120Hz. It is powered by the Exynos 2200 processor and comes with up to 8GB of RAM and up to 256GB of internal storage. The phone has a triple camera setup on the back with a 50-megapixel primary sensor, a 12-megapixel ultra-wide sensor, and a 12-megapixel telephoto sensor. It also has a 10-megapixel front-facing camera.\r\nThe Galaxy S22+ features a larger 6.7-inch Dynamic AMOLED display with the same resolution and refresh rate as the Galaxy S22. It is also powered by the Exynos 2200 processor and comes with up to 8GB of RAM and up to 256GB of internal storage. The phone has a quad-camera setup on the back with a 50-megapixel primary sensor, a 12-megapixel ultra-wide sensor, a 12-megapixel telephoto sensor, and a 5-megapixel macro sensor. It also has a 10-megapixel front-facing camera.', 'The Samsung Galaxy S22 and S22+ are the latest smartphones from Samsung. The Galaxy S22 features a 6.1-inch Dynamic AMOLED display with a resolution of 1080 x 2400 pixels and a refresh rate of 120Hz. It is powered by the Exynos 2200 processor and comes with up to 8GB of RAM and up to 256GB of internal storage. The phone has a triple camera setup on the back with a 50-megapixel primary sensor, a 12-megapixel ultra-wide sensor, and a 12-megapixel telephoto sensor. It also has a 10-megapixel front-facing camera.\r\nThe Galaxy S22+ features a larger 6.7-inch Dynamic AMOLED display with the same resolution and refresh rate as the Galaxy S22. It is also powered by the Exynos 2200 processor and comes with up to 8GB of RAM and up to 256GB of internal storage. The phone has a quad-camera setup on the back with a 50-megapixel primary sensor, a 12-megapixel ultra-wide sensor, a 12-megapixel telephoto sensor, and a 5-megapixel macro sensor. It also has a 10-megapixel front-facing camera.', '2023-05-25 12:43:01', '2023-05-29 08:28:01'),
(7, 2, 3, 'Galaxy Book 3', 'Samsung', 799000.00, NULL, 153, '[\"#e2e4e1\"]', '[\"512 GB\"]', 1, '1685023099.jpg', 'The Samsung Galaxy Book 3 is a laptop that comes with a 13th Gen Intel Core processor for fast and reliable performance that allows you to multitask and improves productivity. It has a sleek and stylish design that enables the laptop to fit in your bag and makes it easy to carry. It also features different ports for quick data transfer, connectivity, and much more. The Galaxy Book 3 comes in different models including the Galaxy Book 3 Ultra, Galaxy Book 3 Pro 360, Galaxy Book 3 Pro, and Galaxy Book 3 360', 'The Samsung Galaxy Book 3 is a laptop that comes with a 13th Gen Intel Core processor for fast and reliable performance that allows you to multitask and improves productivity. It has a sleek and stylish design that enables the laptop to fit in your bag and makes it easy to carry. It also features different ports for quick data transfer, connectivity, and much more. The Galaxy Book 3 comes in different models including the Galaxy Book 3 Ultra, Galaxy Book 3 Pro 360, Galaxy Book 3 Pro, and Galaxy Book 3 360', '2023-05-25 12:58:19', '2023-05-29 08:29:25'),
(8, 2, 3, 'Galaxy Book 3 360', 'Samsung', 134900.00, 129990.00, 458, '[\"gray\"]', '[\"512 GB\"]', 1, '1685023553.jpg', 'The Samsung Galaxy Book 3 360 is a fast, 2-in-1, 360 laptop with a touch screen, full HD Super AMOLED display, and S Pen compatibility. It comes with an Intel Core i7 processor, 16GB RAM, and a 120hz refresh rate for faster performance. The laptop is lightweight and portable, making it easy to carry around. It also has an all-day battery life that can last up to 18 hours on a single charge\r\n.Some laptops that are similar to the Samsung Galaxy Book 3 360 include the Lenovo Yoga 9i and the HP Spectre x360. The Lenovo Yoga 9i is a 16-inch convertible laptop with a stunning AMOLED display and 13th-generation Intel Core processors. The HP Spectre x360 is also a 16-inch convertible laptop with an OLED display and 11th-generation Intel Core processors', 'The Samsung Galaxy Book 3 360 is a fast, 2-in-1, 360 laptop with a touch screen, full HD Super AMOLED display, and S Pen compatibility. It comes with an Intel Core i7 processor, 16GB RAM, and a 120hz refresh rate for faster performance. The laptop is lightweight and portable, making it easy to carry around. It also has an all-day battery life that can last up to 18 hours on a single charge', '2023-05-25 13:05:53', '2023-05-25 13:06:28'),
(9, 1, 1, 'Iphone 14 Plus', 'Apple', 90000.00, NULL, 145, '[\"#fb1230\",\"#faf7f2\",\"#e5ddea\",\"#a9bacc\",\"#343b43\",\"#FFFF00\"]', '[\"128 GB\",\"256 GB\",\"512 GB\"]', 1, '1685025405.jpeg', 'The current web page context is empty. However, I found some information on the iPhone 14 Plus from Apple’s website1. The iPhone 14 Plus is a 6.7-inch smartphone that has a lighter body than the iPhone 14 Pro Max, but the same basic features as the iPhone 14, such as two rear cameras, a front TrueDepth camera, and a 5-core GPU. It also has new safety capabilities like Crash Detection and Emergency SOS via satellite. It comes in five colors: midnight, blue, starlight, purple, and red. It starts at $929 for a model with 128GB of storage', 'The current web page context is empty. However, I found some information on the iPhone 14 Plus from Apple’s website1. The iPhone 14 Plus is a 6.7-inch smartphone that has a lighter body than the iPhone 14 Pro Max, but the same basic features as the iPhone 14, such as two rear cameras, a front TrueDepth camera, and a 5-core GPU. It also has new safety capabilities like Crash Detection and Emergency SOS via satellite. It comes in five colors: midnight, blue, starlight, purple, and red. It starts at $929 for a model with 128GB of storage', '2023-05-25 13:36:45', '2023-05-29 08:29:25'),
(10, 1, 1, 'Iphone 14', 'Apple', 79900.00, NULL, 258, '[\"#000\",\"#e2e4e1\",\"#e5ddea\",\"#a9bacc\",\"#343b43\",\"#FFFF00\"]', '[\"128 GB\",\"256 GB\",\"512 GB\"]', 1, '1685025611.jpeg', 'The iPhone 14 is Apple’s new “affordable” flagship phone with a 6.1-inch OLED display, a Bionic A15 processor, and a dual 12MP camera setup on the back. The iPhone 14 Plus is a larger version with a 6.7-inch OLED display and the same features as the iPhone 14. Both models have flat edges, an aluminum enclosure, a glass back, wireless charging, a notch, and a Lightning port. The iPhone 14 models are identical in design to the iPhone 13 models. Apple did not update the iPhone 13 mini in 2022.The iPhone 14 features a 6.1-inch (155 mm) display with Super Retina XDR OLED technology at a resolution of 2532 × 1170 pixels and a pixel density of about 460 PPI with a refresh rate of 60 Hz. The iPhone 14 Plus has a larger screen size of 6.7 inches (170 mm) with the same Super Retina XDR OLED technology at a resolution of 2778 × 1284 pixels and a pixel density of about 458 PPI with rounded corners that follow a beautiful curved design.The iPhone 14 comes in five colors: midnight, blue, starlight, purple, and red. It starts at $729 for a model with 128GB of storage', 'The iPhone 14 is Apple’s new “affordable” flagship phone with a 6.1-inch OLED display, a Bionic A15 processor, and a dual 12MP camera setup on the back. The iPhone 14 Plus is a larger version with a 6.7-inch OLED display and the same features as the iPhone 14. Both models have flat edges, an aluminum enclosure, a glass back, wireless charging, a notch, and a Lightning port. The iPhone 14 models are identical in design to the iPhone 13 models. Apple did not update the iPhone 13 mini in 2022.The iPhone 14 features a 6.1-inch (155 mm) display with Super Retina XDR OLED technology at a resolution of 2532 × 1170 pixels and a pixel density of about 460 PPI with a refresh rate of 60 Hz. The iPhone 14 Plus has a larger screen size of 6.7 inches (170 mm) with the same Super Retina XDR OLED technology at a resolution of 2778 × 1284 pixels and a pixel density of about 458 PPI with rounded corners that follow a beautiful curved design.The iPhone 14 comes in five colors: midnight, blue, starlight, purple, and red. It starts at $729 for a model with 128GB of storage', '2023-05-25 13:40:11', '2023-05-25 13:40:11'),
(11, 1, 3, 'Huwei P60 Pro', 'Huawei', 1390000.00, NULL, 65, '[\"#000\",\"#d4c9b1\",\"#e2e4e1\",\"#343b43\"]', '[\"256 GB\",\"512 GB\",\"1 TB\"]', 0, '1685026934.jpg', 'The ultra-bright telephoto lens lets you take pristine photos at any distance, any time. The ultra-bright main camera, featuring a self-adjusting F1.4-F4.0 physical aperture, helps produce wonderful images day or night with its unprecedented all-around light-catching capabilities. \'picture. XMAGE styles reproduce colors with distinctive styles that are simply outstanding.', 'The ultra-bright telephoto lens lets you take pristine photos at any distance, any time. The ultra-bright main camera, featuring a self-adjusting F1.4-F4.0 physical aperture, helps produce wonderful images day or night with its unprecedented all-around light-catching capabilities. \'picture. XMAGE styles reproduce colors with distinctive styles that are simply outstanding.', '2023-05-25 14:02:14', '2023-05-25 14:02:14'),
(12, 1, 3, 'One Plus 11 5G', 'OnePlus', 119900.00, NULL, 258, '[\"#000\",\"#343b43\"]', '[\"128 GB\",\"256 GB\"]', 0, '1685027443.jpg', 'Choose a conversation stylePreview\r\n\r\nMore\r\nCreative\r\n\r\nMore\r\nBalanced\r\n\r\nMore\r\nPrecise\r\nundefined\r\nWelcome back! What would you like to chat about?\r\nReceived message.\r\ndescription iphone 14 plus\r\nSent message. description iphone 14 plus\r\nSearching for: description iphone 14 plus\r\n\r\nSearching for: description iphone 14 plus\r\n\r\nGenerating answers for you…\r\n\r\nGenerating answers for you…\r\n\r\nThe current web page context is empty. However, I found some information on the iPhone 14 Plus from Apple’s website1. The iPhone 14 Plus is a 6.7-inch smartphone that has a lighter body than the iPhone 14 Pro Max, but the same basic features as the iPhone 14, such as two rear cameras, a front TrueDepth camera, and a 5-core GPU. It also has new safety capabilities like Crash Detection and Emergency SOS via satellite. It comes in five colors: midnight, blue, starlight, purple, and red. It starts at $929 for a model with 128GB of storage12.\r\n\r\nLet me know if you have any other questions.\r\n\r\nReceived message. The current web page context is empty. However, I found some information on the iPhone 14 Plus from Apple\'s website. The iPhone 14 Plus is a 6.7-inch smartphone that has a lighter body than the iPhone 14 Pro Max, but the same basic features as the iPhone 14, such as two rear cameras, a front TrueDepth camera, and a 5-core GPU. It also has new safety capabilities like Crash Detection and Emergency SOS via satellite. It comes in five colors: midnight, blue, starlight, purple, and red. It starts at $929 for a model with 128GB of storage . Let me know if you have any other questions.\r\nLearn more:\r\n1. apple.com\r\n2. apple.com\r\n3. phonearena.com\r\n4. en.wikipedia.org\r\n5. apple.com\r\n6. gsmarena.com\r\n+3 more\r\n1\r\nof\r\n20\r\ndescription iphone 14\r\nSent message.\r\nSearching for: description iphone 14\r\n\r\nSearching for: description iphone 14\r\n\r\nGenerating answers for you…\r\n\r\nGenerating answers for you…\r\n\r\nThe iPhone 14 is Apple’s new “affordable” flagship phone with a 6.1-inch OLED display, a Bionic A15 processor, and a dual 12MP camera setup on the back. The iPhone 14 Plus is a larger version with a 6.7-inch OLED display and the same features as the iPhone 14. Both models have flat edges, an aluminum enclosure, a glass back, wireless charging, a notch, and a Lightning port. The iPhone 14 models are identical in design to the iPhone 13 models. Apple did not update the iPhone 13 mini in 202212.\r\n\r\nThe iPhone 14 features a 6.1-inch (155 mm) display with Super Retina XDR OLED technology at a resolution of 2532 × 1170 pixels and a pixel density of about 460 PPI with a refresh rate of 60 Hz. The iPhone 14 Plus has a larger screen size of 6.7 inches (170 mm) with the same Super Retina XDR OLED technology at a resolution of 2778 × 1284 pixels and a pixel density of about 458 PPI with rounded corners that follow a beautiful curved design23.\r\n\r\nThe iPhone 14 comes in five colors: midnight, blue, starlight, purple, and red. It starts at $729 for a model with 128GB of storage14.\r\n\r\nLet me know if you have any other questions.\r\n\r\nReceived message. The iPhone 14 is Apple\'s new \"affordable\" flagship phone with a 6.1-inch OLED display, a Bionic A15 processor, and a dual 12MP camera setup on the back. The iPhone 14 Plus is a larger version with a 6.7-inch OLED display and the same features as the iPhone 14. Both models have flat edges, an aluminum enclosure, a glass back, wireless charging, a notch, and a Lightning port. The iPhone 14 models are identical in design to the iPhone 13 models. Apple did not update the iPhone 13 mini in 2022 . The iPhone 14 features a 6.1-inch (155 mm) display with Super Retina XDR OLED technology at a resolution of 2532 × 1170 pixels and a pixel density of about 460 PPI with a refresh rate of 60 Hz. The iPhone 14 Plus has a larger screen size of 6.7 inches (170 mm) with the same Super Retina XDR OLED technology at a resolution of 2778 × 1284 pixels and a pixel density of about 458 PPI with rounded corners that follow a beautiful curved design . The iPhone 14 comes in five colors: midnight, blue, starlight, purple, and red. It starts at $729 for a model with 128GB of storage . Let me know if you have any other questions.\r\nLearn more:\r\n1. phonearena.com\r\n2. en.wikipedia.org\r\n3. apple.com\r\n4. tomsguide.com\r\n5. gsmarena.com\r\n6. apple.com\r\n+4 more\r\n2\r\nof\r\n20\r\ndescription HUAWEI P60 Pro\r\nSent message. description HUAWEI P60 Pro\r\nI’m sorry but I couldn’t find any information about HUAWEI P60 Pro on the current web page context. Could you please provide more information or clarify which web page you are referring to?\r\n\r\nReceived message. I\'m sorry but I couldn\'t find any information about HUAWEI P60 Pro on the current web page context. Could you please provide more information or clarify which web page you are referring to?\r\n3\r\nof\r\n20\r\ndescription one plus 11 5g\r\nSent message. description one plus 11 5g\r\nSearching for: description one plus 11 5g\r\n\r\nSearching for: description one plus 11 5g\r\n\r\nGenerating answers for you…\r\n\r\nGenerating answers for you…\r\n\r\nThe OnePlus 11 5G is a smartphone that was launched on February 7th, 20231. It has a 6.7-inch touchscreen display with a resolution of 1440x3216 pixels (QHD+) at a pixel density of 525 pixels per inch (ppi) and a refresh rate of 120 Hz1. The phone is powered by the Qualcomm Snapdragon 8 Gen 2 SoC and comes with either 8GB of LPDDR5X RAM and 128GB of UFS 3.1 storage or 16GB of RAM and 256GB of UFS 4.0 storage2. The OnePlus 11 5G has a hardware-assisted third-generation Hasselblad Camera for Mobile3 and supports regular and performance modes2. It also has a battery capacity of 5000mAh and supports 100W SUPERVOOC charging3. The phone comes in Eternal Green and Titan Black colors1.', 'Choose a conversation stylePreview\r\n\r\nMore\r\nCreative\r\n\r\nMore\r\nBalanced\r\n\r\nMore\r\nPrecise\r\nundefined\r\nWelcome back! What would you like to chat about?\r\nReceived message.\r\ndescription iphone 14 plus\r\nSent message. description iphone 14 plus\r\nSearching for: description iphone 14 plus\r\n\r\nSearching for: description iphone 14 plus\r\n\r\nGenerating answers for you…\r\n\r\nGenerating answers for you…\r\n\r\nThe current web page context is empty. However, I found some information on the iPhone 14 Plus from Apple’s website1. The iPhone 14 Plus is a 6.7-inch smartphone that has a lighter body than the iPhone 14 Pro Max, but the same basic features as the iPhone 14, such as two rear cameras, a front TrueDepth camera, and a 5-core GPU. It also has new safety capabilities like Crash Detection and Emergency SOS via satellite. It comes in five colors: midnight, blue, starlight, purple, and red. It starts at $929 for a model with 128GB of storage12.\r\n\r\nLet me know if you have any other questions.\r\n\r\nReceived message. The current web page context is empty. However, I found some information on the iPhone 14 Plus from Apple\'s website. The iPhone 14 Plus is a 6.7-inch smartphone that has a lighter body than the iPhone 14 Pro Max, but the same basic features as the iPhone 14, such as two rear cameras, a front TrueDepth camera, and a 5-core GPU. It also has new safety capabilities like Crash Detection and Emergency SOS via satellite. It comes in five colors: midnight, blue, starlight, purple, and red. It starts at $929 for a model with 128GB of storage . Let me know if you have any other questions.\r\nLearn more:\r\n1. apple.com\r\n2. apple.com\r\n3. phonearena.com\r\n4. en.wikipedia.org\r\n5. apple.com\r\n6. gsmarena.com\r\n+3 more\r\n1\r\nof\r\n20\r\ndescription iphone 14\r\nSent message.\r\nSearching for: description iphone 14\r\n\r\nSearching for: description iphone 14\r\n\r\nGenerating answers for you…\r\n\r\nGenerating answers for you…\r\n\r\nThe iPhone 14 is Apple’s new “affordable” flagship phone with a 6.1-inch OLED display, a Bionic A15 processor, and a dual 12MP camera setup on the back. The iPhone 14 Plus is a larger version with a 6.7-inch OLED display and the same features as the iPhone 14. Both models have flat edges, an aluminum enclosure, a glass back, wireless charging, a notch, and a Lightning port. The iPhone 14 models are identical in design to the iPhone 13 models. Apple did not update the iPhone 13 mini in 202212.\r\n\r\nThe iPhone 14 features a 6.1-inch (155 mm) display with Super Retina XDR OLED technology at a resolution of 2532 × 1170 pixels and a pixel density of about 460 PPI with a refresh rate of 60 Hz. The iPhone 14 Plus has a larger screen size of 6.7 inches (170 mm) with the same Super Retina XDR OLED technology at a resolution of 2778 × 1284 pixels and a pixel density of about 458 PPI with rounded corners that follow a beautiful curved design23.\r\n\r\nThe iPhone 14 comes in five colors: midnight, blue, starlight, purple, and red. It starts at $729 for a model with 128GB of storage14.\r\n\r\nLet me know if you have any other questions.\r\n\r\nReceived message. The iPhone 14 is Apple\'s new \"affordable\" flagship phone with a 6.1-inch OLED display, a Bionic A15 processor, and a dual 12MP camera setup on the back. The iPhone 14 Plus is a larger version with a 6.7-inch OLED display and the same features as the iPhone 14. Both models have flat edges, an aluminum enclosure, a glass back, wireless charging, a notch, and a Lightning port. The iPhone 14 models are identical in design to the iPhone 13 models. Apple did not update the iPhone 13 mini in 2022 . The iPhone 14 features a 6.1-inch (155 mm) display with Super Retina XDR OLED technology at a resolution of 2532 × 1170 pixels and a pixel density of about 460 PPI with a refresh rate of 60 Hz. The iPhone 14 Plus has a larger screen size of 6.7 inches (170 mm) with the same Super Retina XDR OLED technology at a resolution of 2778 × 1284 pixels and a pixel density of about 458 PPI with rounded corners that follow a beautiful curved design . The iPhone 14 comes in five colors: midnight, blue, starlight, purple, and red. It starts at $729 for a model with 128GB of storage . Let me know if you have any other questions.\r\nLearn more:\r\n1. phonearena.com\r\n2. en.wikipedia.org\r\n3. apple.com\r\n4. tomsguide.com\r\n5. gsmarena.com\r\n6. apple.com\r\n+4 more\r\n2\r\nof\r\n20\r\ndescription HUAWEI P60 Pro\r\nSent message. description HUAWEI P60 Pro\r\nI’m sorry but I couldn’t find any information about HUAWEI P60 Pro on the current web page context. Could you please provide more information or clarify which web page you are referring to?\r\n\r\nReceived message. I\'m sorry but I couldn\'t find any information about HUAWEI P60 Pro on the current web page context. Could you please provide more information or clarify which web page you are referring to?\r\n3\r\nof\r\n20\r\ndescription one plus 11 5g\r\nSent message. description one plus 11 5g\r\nSearching for: description one plus 11 5g\r\n\r\nSearching for: description one plus 11 5g\r\n\r\nGenerating answers for you…\r\n\r\nGenerating answers for you…\r\n\r\nThe OnePlus 11 5G is a smartphone that was launched on February 7th, 20231. It has a 6.7-inch touchscreen display with a resolution of 1440x3216 pixels (QHD+) at a pixel density of 525 pixels per inch (ppi) and a refresh rate of 120 Hz1. The phone is powered by the Qualcomm Snapdragon 8 Gen 2 SoC and comes with either 8GB of LPDDR5X RAM and 128GB of UFS 3.1 storage or 16GB of RAM and 256GB of UFS 4.0 storage2. The OnePlus 11 5G has a hardware-assisted third-generation Hasselblad Camera for Mobile3 and supports regular and performance modes2. It also has a battery capacity of 5000mAh and supports 100W SUPERVOOC charging3. The phone comes in Eternal Green and Titan Black colors1.', '2023-05-25 14:10:43', '2023-05-25 14:10:43'),
(13, 2, 3, 'Dell XPS 15', 'Dell', 169900.00, NULL, 137, '[\"silver\"]', '[\"256 GB\",\"512 GB\",\"1 TB\",\"2 TB\"]', 0, '1685027632.jpeg', 'The current web page context is about Dell support. I performed a search for “dell xps 15 description” and found several web pages that describe the Dell XPS 15 laptop. The Dell XPS 15 is a high-performing laptop with a lovely display. It has a minimal port selection and a mediocre webcam. The 2022 version of the XPS 15 has improved internals like Intel Alder Lake processors and faster RAM, and outperforms just about every other laptop on the market in this range1. The XPS 15 OLED has a striking ultra-thin chassis with outstanding performance, powerful speakers, and a massive touchpad. It’s the ultimate 15-inch laptop for those willing to trade battery life for a mesmerizing 3.5K OLED display12. The Dell XPS 15 is priced at $1,199.99 on Dell’s website3.', 'The current web page context is about Dell support. I performed a search for “dell xps 15 description” and found several web pages that describe the Dell XPS 15 laptop. The Dell XPS 15 is a high-performing laptop with a lovely display. It has a minimal port selection and a mediocre webcam. The 2022 version of the XPS 15 has improved internals like Intel Alder Lake processors and faster RAM, and outperforms just about every other laptop on the market in this range1. The XPS 15 OLED has a striking ultra-thin chassis with outstanding performance, powerful speakers, and a massive touchpad. It’s the ultimate 15-inch laptop for those willing to trade battery life for a mesmerizing 3.5K OLED display12. The Dell XPS 15 is priced at $1,199.99 on Dell’s website3.', '2023-05-25 14:13:52', '2023-05-30 15:44:11'),
(14, 2, 3, 'ThinkPad T14s Gen 4', 'Lenovo', 160000.00, NULL, 155, '[\"#000\",\"silver\"]', '[\"512 GB\",\"1 TB\",\"2 TB\"]', 1, '1685027883.jpg', 'Generating answers for you…\r\n\r\nGenerating answers for you…\r\n\r\nThe current web page context is empty. However, I can tell you that the Lenovo ThinkPad T14s Gen 4 is a great workhorse laptop that was launched in March 20231. It has a screen-to-body ratio of ~78.9% and dimensions of 317.5 x 226.9 x 16.9 mm (12.5 x 8.93 x 0.67 inches)1. It is powered by 13th Gen Intel Core vPro processors which intelligently allocate workloads to the right thread, on the right core, at the right time2. It also has super-responsive always-on connectivity options, tons of storage, recycled components, & plastic-free packaging', 'Generating answers for you…\r\n\r\nGenerating answers for you…\r\n\r\nThe current web page context is empty. However, I can tell you that the Lenovo ThinkPad T14s Gen 4 is a great workhorse laptop that was launched in March 20231. It has a screen-to-body ratio of ~78.9% and dimensions of 317.5 x 226.9 x 16.9 mm (12.5 x 8.93 x 0.67 inches)1. It is powered by 13th Gen Intel Core vPro processors which intelligently allocate workloads to the right thread, on the right core, at the right time2. It also has super-responsive always-on connectivity options, tons of storage, recycled components, & plastic-free packaging', '2023-05-25 14:18:03', '2023-05-25 14:18:03');

-- --------------------------------------------------------

--
-- Structure de la table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_supp` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ratings`
--

INSERT INTO `ratings` (`id`, `id_admin`, `id_supp`, `rating`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, '2023-05-24 22:50:46', '2023-05-24 21:51:09'),
(2, 1, 2, 4, '2023-05-24 22:50:24', '2023-05-26 08:47:55'),
(3, 1, 3, 1, '2023-05-24 21:56:55', '2023-05-26 08:49:16'),
(4, 1, 4, 5, '2023-05-26 08:44:10', '2023-05-26 08:46:35'),
(5, 1, 5, 4, '2023-05-26 08:45:32', '2023-05-26 08:52:49'),
(6, 1, 6, 2, '2023-05-26 08:51:53', '2023-05-26 08:52:19');

-- --------------------------------------------------------

--
-- Structure de la table `reviews`
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
-- Déchargement des données de la table `reviews`
--

INSERT INTO `reviews` (`id`, `id_user`, `id_prod`, `user_review`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'This iphone 14 pro max is top', '2023-05-24 22:51:18', '2023-05-24 22:51:18'),
(2, 1, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-05-29 08:26:14', '2023-05-29 08:26:14'),
(3, 1, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-05-29 08:27:27', '2023-05-29 08:27:27'),
(4, 2, 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-05-29 08:33:57', '2023-05-29 08:33:57'),
(5, 2, 13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', '2023-05-29 08:34:30', '2023-05-29 08:34:30');

-- --------------------------------------------------------

--
-- Structure de la table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` bigint(191) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `let` float NOT NULL,
  `lng` float NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `suppliers`
--

INSERT INTO `suppliers` (`id`, `fname`, `lname`, `email`, `phone`, `image`, `address`, `description`, `let`, `lng`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Adda', 'Mohamed', 'addamohamed@gmail.com', 549380267, '1684968717.jpeg', 'RUE N°04 La Grande Mosquée', 'This suppliers phones', 36.1756, 0.972367, 'Ain Merane ⵄⵉⵏ ⵎⴻⵔⵔⴰⵏ عين مران, Daïra Aïn Merane, Chlef ⵛⵛⵍⴻⴼ الشلف, ⵍⵣⵣⴰⵢⴻⵔ / الجزائر', '2023-05-24 21:26:44', '2023-05-24 21:51:57'),
(2, 'Adda', 'Oussama', 'oussama@gmail.com', 654789652, '1685094463.jpg', 'RUE N°04 La Grande Mosquée', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', 36.2034, 1.26807, 'Chlef ⵛⵛⵍⴻⴼ الشلف, ⵍⵣⵣⴰⵢⴻⵔ / الجزائر', '2023-05-24 21:48:14', '2023-05-26 08:47:47'),
(3, 'Adda', 'Kossai', 'kossai@gmail.com', 549380267, '1685094545.jpg', 'La Grande Mosqué', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', 36.1263, 0.880193, 'Mazouna, Daïra Mazouna, Relizane ⵉⵖⵉⵍ ⵉⵣⴰⵏ غليزان, ⵍⵣⵣⴰⵢⴻⵔ / الجزائر', '2023-05-24 21:56:55', '2023-05-26 08:49:07'),
(4, 'Adda', 'Isahk', 'isahk@gmail.com', 663333313, '1685094424.jpeg', 'RUE N°04 La Grande Mosquée', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', 36.1929, 1.2491, 'Chettia ⵛⵛⴻⵟⵉⵢⴰ الشطية, دائرة أولاد فارس, Chlef ⵛⵛⵍⴻⴼ الشلف, ⵍⵣⵣⴰⵢⴻⵔ / الجزائر', '2023-05-26 08:44:10', '2023-05-26 08:47:04'),
(5, 'Adda', 'Djamila', 'djamila@gmail.com', 778954133, '1685094513.jpeg', 'Rue N04 El Mkhalfia', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', 36.0651, 1.12787, 'Boukadir ⴱⵓⵇⴰⴷⵉⵔ بوقادير, Daïra Boukadir, Chlef ⵛⵛⵍⴻⴼ الشلف, ⵍⵣⵣⴰⵢⴻⵔ / الجزائر', '2023-05-26 08:45:32', '2023-05-26 08:48:36'),
(6, 'Garzzo', 'Youcef', 'youcef@gmail.com', 645789512, '1685094747.jpg', 'Rue N15 Hopitale', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lorem massa, hendrerit at velit nec,', 15.0987, 43.5685, 'الصبحة, مديرية صعفان, محافظة صنعاء, اليمن', '2023-05-26 08:51:53', '2023-05-26 08:52:28');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `phone` bigint(255) DEFAULT NULL,
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
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `fname`, `lname`, `email`, `email_verified_at`, `password`, `phone`, `address1`, `address2`, `city`, `state`, `pincode`, `country`, `role_as`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Adda Benkosseir Mohamed', 'Adda Benkosseir', 'Mohamed', 'addamohamed099@gmail.com', NULL, '$2y$10$CFAghCDe7.jRNnIRzpzh9ux/lGe1hbgQPpNluLAQ7U3HiZmlRHdzO', 213549380267, 'RUE N°04 La Grande Mosquée', 'RUE N°04 La Grande Mosquée', 'Ain Merane', 'Chlef', '02004', 'Algeria', 1, '1684972182.jpg', 'AZ86GhtzLHJoKIKvAMmUzKhkQLjwvE8x2Ju55svSLVlvpxYbMJrSLDUKyRNm', '2023-05-24 19:11:22', '2023-05-24 22:49:42'),
(2, 'Adda Benkosseir Kossai', 'Adda Benkosseir', 'Kossai', 'kosai@gmail.com', NULL, '$2y$10$lBgzuFvmlxvubmCtNRIaCuIlbb4izuQGvIjtOY7IbRz5aTmanFzm6', 2130549380267, 'La Grande Mosqué', 'La Grande Mosquée', 'Ain Merane', 'Chlef', '02004', 'Algeria', 0, '1685352751.jpeg', 'BBCnDWwmswqGhICLj5EOMV11PK1NclcjDB1f0llNjAFEnCN5AXk6EDxVxooJ', '2023-05-26 17:48:26', '2023-05-29 08:32:31'),
(3, 'Hamamouche Amine', 'Hamamouche', 'Amine', 'amine@gmail.com', NULL, '$2y$10$JTnv7iV8tnGoEp237zoJbeglZSKFQh0C.vlns48S5pRS9a0fII/jW', 2130547896521, 'La Grounde Poste', 'La Grounde Mosquee', 'Ain Merane', 'Chlef', '02016', 'Algeria', 0, '1685464577.jpg', 'Qy86COTCKO0ZN4Dt62moLm3KHvMQXt0W88CDLPKbSRu79QCNadjp37zpLNCL', '2023-05-30 15:35:36', '2023-05-30 15:36:17');

-- --------------------------------------------------------

--
-- Structure de la table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_prod` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `wishlists`
--

INSERT INTO `wishlists` (`id`, `id_user`, `id_prod`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-24 22:51:37', '2023-05-24 22:51:37'),
(2, 1, 2, '2023-05-24 22:51:46', '2023-05-24 22:51:46'),
(3, 1, 10, '2023-05-29 08:24:31', '2023-05-29 08:24:31'),
(4, 1, 5, '2023-05-29 08:26:18', '2023-05-29 08:26:18'),
(5, 1, 5, '2023-05-29 08:26:20', '2023-05-29 08:26:20'),
(6, 1, 9, '2023-05-29 08:28:51', '2023-05-29 08:28:51'),
(7, 3, 13, '2023-05-30 15:41:56', '2023-05-30 15:41:56'),
(8, 3, 5, '2023-05-30 15:42:12', '2023-05-30 15:42:12'),
(9, 3, 3, '2023-05-30 15:42:29', '2023-05-30 15:42:29');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Index pour la table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `notations`
--
ALTER TABLE `notations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `notations`
--
ALTER TABLE `notations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
