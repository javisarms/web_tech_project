-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 26, 2018 at 02:09 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `webtech`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double DEFAULT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `type`, `status`, `amount`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'ORDER', 'BILLED', 34, 3, 4, '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(7, 1, 'CART', 'CART', 17, NULL, NULL, '2018-10-14 18:22:05', '2018-10-14 18:22:05'),
(8, 2, 'CART', 'CART', 43, NULL, NULL, '2018-10-14 18:25:24', '2018-10-14 18:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `order_addresses`
--

CREATE TABLE `order_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_addresses`
--

INSERT INTO `order_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Fred Eric', '2 Impasse Duvet', '3ieme étage', '59000', 'Lille', 'France', '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(2, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'France', '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(3, 'Fred Eric', '2 Impasse Duvet', '3ieme étage', '59000', 'Lille', 'France', '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(4, 'Fred Eric', '120 Boulevard Vaubant', 'B506', '59000', 'Lille', 'France', '2018-10-05 15:05:54', '2018-10-05 15:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(3) UNSIGNED NOT NULL,
  `unit_price` double DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 8, '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(2, 1, 2, 3, 8.5, '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(15, 7, 2, 2, 8.5, '2018-10-14 18:22:05', '2018-10-14 18:22:05'),
(16, 8, 3, 3, 9, '2018-10-14 18:25:24', '2018-10-14 18:25:24'),
(17, 8, 1, 1, 8, '2018-10-14 18:25:29', '2018-10-14 18:25:29'),
(18, 8, 6, 1, 8, '2018-10-26 14:16:23', '2018-10-26 14:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `unit_price` double DEFAULT NULL,
  `image_url` longtext COLLATE utf8_unicode_ci,
  `range_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `unit_price`, `image_url`, `range_id`, `created_at`, `updated_at`) VALUES
(1, 'Culture (2017)', 'Migos', 8, 'Albums/culture.png', 2, '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(2, 'What\'s Going On? (1971)', 'Marvin Gaye', 8.5, 'Albums/marv.jpg', 3, '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(3, 'Nevermind (1994)', 'Nirvana', 9, 'Albums/nevermind.jpg', 2, '2018-10-07 16:52:14', '2018-10-07 16:52:14'),
(6, 'blonde (2016)', 'Frank Ocean', 8, 'Albums/blond.jpg', 2, '2018-10-10 17:37:01', '2018-10-10 17:37:01');

-- --------------------------------------------------------

--
-- Table structure for table `ranges`
--

CREATE TABLE `ranges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ranges`
--

INSERT INTO `ranges` (`id`, `name`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Main range', NULL, '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(2, 'Second range', 1, '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(3, 'Third range', 1, '2018-10-05 15:05:54', '2018-10-05 15:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `billing_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `delivery_adress_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `billing_adress_id`, `delivery_adress_id`, `created_at`, `updated_at`) VALUES
(0, 'admin', 'admin@example.com', 'password', NULL, NULL, '2018-10-10 12:01:38', '2018-10-10 12:01:38'),
(1, 'javi', 'javi@gmail.com', 'javier', 1, 2, '2018-10-09 00:22:12', '2018-10-09 00:22:12'),
(2, 'Fred eric', 'frederic@example.com', 'password', 5, 6, '2018-10-09 10:31:28', '2018-10-09 10:31:28'),
(3, 'john', 'john@gmail.com', 'javier', NULL, NULL, '2018-10-09 18:29:50', '2018-10-09 18:29:50'),
(4, 'THOR', 'thor@gmail.com', 'password', NULL, NULL, '2018-10-12 15:30:03', '2018-10-12 15:30:03'),
(5, 'Jeric', 'jeric@gmail.com', 'password', NULL, NULL, '2018-10-12 15:30:35', '2018-10-12 15:30:35'),
(6, 'mike', 'micke@gmail.com', 'password', NULL, NULL, '2018-10-26 14:24:32', '2018-10-26 14:24:32');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `id` int(10) UNSIGNED NOT NULL,
  `human_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_one` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`id`, `human_name`, `address_one`, `address_two`, `postal_code`, `city`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Fred Eric', '2 Impasse Duvet', '3ieme étage', '59000', 'Lille', 'France', '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(2, 'Eric Fred', '12 Route Pleine', 'Chez mon Oncle', '59000', 'Lille', 'France', '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(3, 'Frederic', '239 Rue de Douai', NULL, '59000', 'Lille', 'France', '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(4, 'Epicfred', '3 Sans Idée', 'Oui Oui', '59000', 'Lille', 'France', '2018-10-05 15:05:54', '2018-10-05 15:05:54'),
(5, 'Javi Sarm', '#3 Firefly St', '', '1600', 'Pasig', 'Philippines', '2018-10-26 14:06:56', '2018-10-26 14:06:56'),
(6, 'John Cena', '25 Rue Nationale', NULL, '59800', 'Lille', 'France', '2018-10-26 14:12:01', '2018-10-26 14:12:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_user_billing_adress` (`billing_adress_id`),
  ADD KEY `IDX_user_delivery_adress` (`delivery_adress_id`),
  ADD KEY `IDX_user` (`user_id`);

--
-- Indexes for table `order_addresses`
--
ALTER TABLE `order_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_order_product` (`order_id`),
  ADD KEY `IDX_product_order` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_product_range` (`range_id`);

--
-- Indexes for table `ranges`
--
ALTER TABLE `ranges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_range_parent` (`parent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_user_billing_adress` (`billing_adress_id`),
  ADD KEY `IDX_user_delivery_adress` (`delivery_adress_id`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_addresses`
--
ALTER TABLE `order_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ranges`
--
ALTER TABLE `ranges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
