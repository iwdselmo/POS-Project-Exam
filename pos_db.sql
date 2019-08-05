-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2019 at 03:16 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categs`
--

CREATE TABLE `categs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categs`
--

INSERT INTO `categs` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(7, 'Burgers', 'Burgers', '2019-08-03 12:29:45', '2019-08-03 12:29:45'),
(8, 'Beverages', 'Beverages', '2019-08-03 12:29:59', '2019-08-03 12:29:59'),
(9, 'Combo Meals', 'Combo-Meals', '2019-08-03 12:30:05', '2019-08-03 12:30:05');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `percentage`, `status`, `created_at`, `updated_at`) VALUES
(1, '20% OFF', '202020', 20, 1, '2019-08-03 12:09:49', '2019-08-03 12:09:49'),
(2, '36% Discount', '363636', 36, 1, '2019-08-03 23:54:18', '2019-08-03 23:54:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_03_105228_create_categs_table', 1),
(4, '2019_08_03_105249_create_products_table', 1),
(7, '2019_08_03_105311_create_coupons_table', 2),
(8, '2019_08_03_110420_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `item_ammount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_used` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `tax` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `item_ammount`, `code_used`, `total`, `tax`, `created_at`, `updated_at`) VALUES
(25, 1, '2,3,8,8,7,7,6,11,12,13', 'none', 464.00, 49.73, '2019-08-04 05:52:53', '2019-08-04 05:52:53'),
(26, 1, '3,3,8,9,7,11,10,13', 'none', 317.00, 33.98, '2019-08-04 05:54:12', '2019-08-04 05:54:12'),
(27, 1, '3,2,6,7,8', 'none', 216.00, 23.15, '2019-08-04 05:54:38', '2019-08-04 05:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `vat` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `price`, `vat`, `created_at`, `updated_at`) VALUES
(2, 7, 'Hotdog', 20.00, 2.14, '2019-08-03 12:40:28', '2019-08-03 12:40:28'),
(3, 7, 'Cheese Burger', 40.00, 4.29, '2019-08-03 12:40:51', '2019-08-03 12:40:51'),
(4, 7, 'BLT Sandwich', 65.00, 6.96, '2019-08-03 12:41:13', '2019-08-03 12:41:13'),
(5, 7, 'Aloha Burger', 99.00, 10.61, '2019-08-03 12:41:42', '2019-08-03 12:41:42'),
(6, 7, 'New York Sandwich', 126.00, 13.50, '2019-08-03 12:43:07', '2019-08-03 12:43:07'),
(7, 7, 'Angels Burger', 15.00, 1.61, '2019-08-03 12:43:30', '2019-08-03 12:43:30'),
(8, 8, 'Coke Mismo', 15.00, 1.61, '2019-08-03 12:43:49', '2019-08-03 12:43:49'),
(9, 8, 'Sprite Mismo', 15.00, 1.61, '2019-08-03 12:44:09', '2019-08-03 12:44:09'),
(10, 8, 'Ice Tea 200ml', 20.00, 2.14, '2019-08-03 12:44:24', '2019-08-03 12:44:24'),
(11, 8, 'Coke Litro', 36.00, 3.86, '2019-08-03 12:44:43', '2019-08-03 12:44:43'),
(12, 8, 'Mogu Mogu', 46.00, 4.93, '2019-08-03 12:45:06', '2019-08-03 12:45:06'),
(13, 9, 'Chicken and Spagetti', 136.00, 14.57, '2019-08-03 12:45:45', '2019-08-03 12:45:45'),
(14, 9, 'Chicken Combo Meal', 157.00, 16.82, '2019-08-03 12:46:13', '2019-08-03 12:46:13'),
(15, 9, 'Fish Combo Meal', 99.00, 10.61, '2019-08-03 12:46:39', '2019-08-03 12:46:39'),
(16, 9, 'Goldilocks Combo Meal', 200.00, 21.43, '2019-08-03 12:47:12', '2019-08-03 12:47:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cashier 1', 'cashier@gmail.com', NULL, '$2y$10$9LWzUAaZ5eY/vFC3lw.KXeUOWW5TjzpUOr037agzEx5YVRsvlhV2m', NULL, '2019-08-03 10:00:27', '2019-08-03 10:00:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categs`
--
ALTER TABLE `categs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categs`
--
ALTER TABLE `categs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
