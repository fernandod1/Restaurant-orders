-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2022 a las 15:55:27
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurant_orders`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Bebidas', 'Bebidas de todo tipo', '2021-10-26 16:01:24', '2021-10-29 14:16:40'),
(2, 'Primeros Platos', 'Platos entrantes y ensaladas', '2021-10-26 16:01:39', '2021-10-29 14:16:14'),
(3, 'Segundos Platos', 'Pescados y carnes', '2021-10-26 16:01:47', '2021-10-29 14:16:29'),
(5, 'Postres', 'Dulces y frutas frescas', '2021-10-27 07:15:28', '2021-10-27 07:15:28'),
(6, 'Combos', 'Combos', '2021-10-29 20:11:11', '2021-10-29 21:43:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`id`, `id_order`, `name`, `notes`, `created_at`, `updated_at`) VALUES
(1, 1, 'Javier', 'Ensalada sin cebolla.', NULL, NULL),
(2, 8, 'Federico', 'Hamburguesa poco hecha.', NULL, NULL),
(3, 12, 'Sergio', NULL, NULL, NULL),
(4, 12, 'Sergio', NULL, NULL, NULL),
(5, 18, 'Marta', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_26_164220_create_categories_table', 1),
(6, '2021_10_26_175345_create_products_table', 1),
(7, '2021_10_26_194055_create_clients_table', 1),
(8, '2021_10_27_000115_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `id_client` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL,
  `status` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `id_order`, `id_client`, `id_product`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 2, 0, '2021-11-26 20:18:02', '2021-11-26 20:18:02'),
(2, 1, 1, 5, 1, 0, '2021-11-26 20:18:02', '2021-11-26 20:18:02'),
(3, 1, 1, 9, 1, 0, '2021-11-26 20:18:02', '2021-11-26 20:18:02'),
(4, 1, 1, 10, 1, 0, '2021-11-26 20:18:02', '2021-11-26 20:18:02'),
(5, 1, 1, 11, 1, 0, '2021-11-26 20:18:02', '2021-11-26 20:18:02'),
(6, 1, 1, 12, 1, 0, '2021-11-26 20:18:02', '2021-11-26 20:18:02'),
(7, 1, 1, 4, 1, 0, '2021-11-26 20:18:02', '2021-11-26 20:18:02'),
(8, 8, 2, 6, 2, 2, '2021-11-26 20:19:30', '2021-11-26 20:19:30'),
(9, 8, 2, 10, 2, 2, '2021-11-26 20:19:30', '2021-11-26 20:19:30'),
(10, 8, 2, 11, 1, 2, '2021-11-26 20:19:30', '2021-11-26 20:19:30'),
(11, 8, 2, 13, 1, 2, '2021-11-26 20:19:30', '2021-11-26 20:19:30'),
(15, 12, 4, 9, 2, 0, '2021-11-26 23:41:31', '2021-11-26 23:41:31'),
(16, 12, 4, 12, 1, 0, '2021-11-26 23:41:31', '2021-11-26 23:41:31'),
(17, 12, 4, 4, 1, 0, '2021-11-26 23:41:31', '2021-11-26 23:41:31'),
(18, 18, 5, 5, 2, 0, '2021-11-26 23:46:09', '2021-11-26 23:46:09'),
(19, 18, 5, 11, 1, 0, '2021-11-26 23:46:09', '2021-11-26 23:46:09'),
(20, 18, 5, 14, 1, 0, '2021-11-26 23:46:10', '2021-11-26 23:46:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` decimal(15,2) NOT NULL,
  `stock` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `id_category`, `name`, `description`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(2, 1, 'Coca Cola', NULL, '2.00', 1, '2021-10-26 16:09:41', '2021-10-27 09:18:59'),
(4, 5, 'Flan', NULL, '5.00', 1, '2021-10-27 09:24:49', '2021-10-27 09:24:49'),
(5, 1, 'Agua', NULL, '1.00', 1, '2021-10-27 18:40:54', '2021-10-27 18:40:54'),
(6, 1, 'Cerveza', NULL, '2.00', 1, '2021-10-27 18:41:08', '2021-10-27 18:41:08'),
(7, 1, 'Vino', NULL, '2.00', 1, '2021-10-27 18:41:21', '2021-10-27 18:41:21'),
(8, 2, 'Filete y patatas', NULL, '15.00', 0, '2021-10-27 18:41:56', '2021-10-29 12:45:08'),
(9, 2, 'Ensalada y tomates', NULL, '10.00', 1, '2021-10-27 18:42:22', '2021-10-27 18:42:22'),
(10, 2, 'Patata asada', NULL, '5.00', 1, '2021-10-27 18:42:40', '2021-10-27 18:42:40'),
(11, 3, 'Hamburguesa', NULL, '8.00', 1, '2021-10-27 18:42:59', '2021-10-27 18:42:59'),
(12, 3, 'Pollo asado', NULL, '7.00', 1, '2021-10-27 18:43:17', '2021-10-27 18:43:17'),
(13, 5, 'Platano', NULL, '2.00', 1, '2021-10-27 18:43:36', '2021-10-27 18:43:36'),
(14, 6, 'Combo 1', NULL, '5.00', 1, '2021-10-29 20:12:00', '2021-10-29 20:12:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `role` int(11) NOT NULL DEFAULT '10',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `active`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'admin@admin.com', 1, 0, NULL, '$2y$10$qIB9496fj6yYqMs1xbkiKOXQyIRytoO9RhgmlqFw/lpBpJ24xJlwC', NULL, '2021-10-31 16:26:36', '2021-10-31 16:26:36'),
(2, 'Camarero José', 'c1@camarero.com', 1, 1, NULL, '$2y$10$Hfiy203.aBvcix6yk2T1Ue5fPD2JO2X63uaOSwn57ycOH2KJCD76q', NULL, '2021-11-26 19:37:30', '2021-11-26 19:49:01'),
(3, 'Camarero Toni', 'c2@camarero.com', 1, 1, NULL, '$2y$10$GJWCfWspM37Uti1Y.M6L3uYX0AsDX0nrU.RqZbWxnx.CcVDm4cViG', NULL, '2021-11-26 19:37:42', '2021-11-26 23:35:14'),
(4, 'Cocinero Iván', 'cocinero1@cocinero.com', 1, 2, NULL, '$2y$10$CZpdsN6/RcZyh2VVjfhlcOvCekyKvbGulKTJgyDpCmY/TKiu3LDE2', NULL, '2021-11-26 19:38:09', '2021-11-26 19:49:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_client_foreign` (`id_client`),
  ADD KEY `orders_id_product_foreign` (`id_product`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_id_client_foreign` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
