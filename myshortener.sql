-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2022 at 06:57 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshortener`
--

-- --------------------------------------------------------

--
-- Table structure for table `mysh_categories`
--

CREATE TABLE `mysh_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mysh_failed_jobs`
--

CREATE TABLE `mysh_failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mysh_links`
--

CREATE TABLE `mysh_links` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `destination` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED DEFAULT NULL,
  `code` enum('301','302','303','307','308') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '301',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mysh_migrations`
--

CREATE TABLE `mysh_migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mysh_password_resets`
--

CREATE TABLE `mysh_password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mysh_permissions`
--

CREATE TABLE `mysh_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mysh_permissions`
--

INSERT INTO `mysh_permissions` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'show-categories', 'مشاهده دسته‌بندی‌ها', NULL, NULL),
(2, 'create-categories', 'افزودن دسته‌بندی', NULL, NULL),
(3, 'update-categories', 'ویرایش دسته‌بندی‌ها', NULL, NULL),
(4, 'delete-categories', 'حذف دسته‌بندی‌ها', NULL, NULL),
(5, 'show-links', 'مشاهده لینک‌ها', NULL, NULL),
(6, 'create-links', 'افزودن لینک', NULL, NULL),
(7, 'update-links', 'ویرایش لینک‌ها', NULL, NULL),
(8, 'delete-links', 'حذف لینک‌ها', NULL, NULL),
(9, 'statistics-links', 'مشاهده آمار لینک‌ها', NULL, NULL),
(10, 'qrcode-links', 'مشاهده بارکد لینک‌ها', NULL, NULL),
(11, 'show-roles', 'مشاهده نقش‌ها', NULL, NULL),
(12, 'create-roles', 'افزودن نقش', NULL, NULL),
(13, 'update-roles', 'ویرایش نقش‌ها', NULL, NULL),
(14, 'delete-roles', 'حذف نقش‌ها', NULL, NULL),
(15, 'show-users', 'مشاهده کاربران', NULL, NULL),
(16, 'create-users', 'افزودن کاربر', NULL, NULL),
(17, 'update-users', 'ویرایش کاربران', NULL, NULL),
(18, 'delete-users', 'حذف کاربران', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mysh_permission_role`
--

CREATE TABLE `mysh_permission_role` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mysh_permission_role`
--

INSERT INTO `mysh_permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(9, 2),
(10, 2),
(15, 2),
(16, 2),
(1, 3),
(5, 3),
(9, 3),
(10, 3),
(11, 3),
(15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mysh_personal_access_tokens`
--

CREATE TABLE `mysh_personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mysh_roles`
--

CREATE TABLE `mysh_roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mysh_roles`
--

INSERT INTO `mysh_roles` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'مدیر', 'دسترسی به تمامی بخش‌ها و فعالیت‌ها', '2022-08-25 19:00:37', '2022-08-25 19:08:02'),
(2, 'کارمند', 'دسترسی به بخش لینک‌ها، دسته‌بندی و امکان مشاهده وایجاد کاربر', '2022-08-25 19:08:29', '2022-08-25 19:08:29'),
(3, 'کاربر نمایشی', 'دسترسی به نمایش بخش‌های مختلف', '2022-08-25 19:09:39', '2022-08-25 19:09:39');

-- --------------------------------------------------------

--
-- Table structure for table `mysh_role_user`
--

CREATE TABLE `mysh_role_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mysh_role_user`
--

INSERT INTO `mysh_role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mysh_statistics`
--

CREATE TABLE `mysh_statistics` (
  `id` bigint UNSIGNED NOT NULL,
  `link_id` bigint UNSIGNED NOT NULL,
  `ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` json NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mysh_users`
--

CREATE TABLE `mysh_users` (
  `id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mysh_users`
--

INSERT INTO `mysh_users` (`id`, `first_name`, `last_name`, `phone_number`, `email`, `password`, `remember_token`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'علی', 'مانیان', '09123456789', NULL, '$2y$10$OjTwAJ8sav6xaweVAf2qT.Ji/D/rfiFeDIYnvZelDpaWwxZ4ON.xy', NULL, 1, '2022-08-27 06:56:39', '2022-08-27 06:56:39');

-- --------------------------------------------------------

--
-- Table structure for table `mysh_verify_codes`
--

CREATE TABLE `mysh_verify_codes` (
  `id` bigint UNSIGNED NOT NULL,
  `phone_number` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `verify_code` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mysh_verify_codes`
--

INSERT INTO `mysh_verify_codes` (`id`, `phone_number`, `verify_code`, `created_at`, `updated_at`) VALUES
(1, '09123456789', '671749', '2022-08-27 06:56:21', '2022-08-27 06:56:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mysh_categories`
--
ALTER TABLE `mysh_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mysh_categories_slug_unique` (`slug`);

--
-- Indexes for table `mysh_failed_jobs`
--
ALTER TABLE `mysh_failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mysh_failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `mysh_links`
--
ALTER TABLE `mysh_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mysh_links_slug_unique` (`slug`),
  ADD KEY `mysh_links_category_id_foreign` (`category_id`);

--
-- Indexes for table `mysh_migrations`
--
ALTER TABLE `mysh_migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mysh_password_resets`
--
ALTER TABLE `mysh_password_resets`
  ADD KEY `mysh_password_resets_email_index` (`email`);

--
-- Indexes for table `mysh_permissions`
--
ALTER TABLE `mysh_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mysh_permissions_name_unique` (`name`);

--
-- Indexes for table `mysh_permission_role`
--
ALTER TABLE `mysh_permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `mysh_permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `mysh_personal_access_tokens`
--
ALTER TABLE `mysh_personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mysh_personal_access_tokens_token_unique` (`token`),
  ADD KEY `mysh_personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `mysh_roles`
--
ALTER TABLE `mysh_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mysh_role_user`
--
ALTER TABLE `mysh_role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `mysh_role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `mysh_statistics`
--
ALTER TABLE `mysh_statistics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mysh_statistics_link_id_foreign` (`link_id`);

--
-- Indexes for table `mysh_users`
--
ALTER TABLE `mysh_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mysh_users_phone_number_unique` (`phone_number`),
  ADD UNIQUE KEY `mysh_users_email_unique` (`email`);

--
-- Indexes for table `mysh_verify_codes`
--
ALTER TABLE `mysh_verify_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mysh_verify_codes_phone_number_unique` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mysh_categories`
--
ALTER TABLE `mysh_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mysh_failed_jobs`
--
ALTER TABLE `mysh_failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mysh_links`
--
ALTER TABLE `mysh_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mysh_migrations`
--
ALTER TABLE `mysh_migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mysh_permissions`
--
ALTER TABLE `mysh_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mysh_personal_access_tokens`
--
ALTER TABLE `mysh_personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mysh_roles`
--
ALTER TABLE `mysh_roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mysh_statistics`
--
ALTER TABLE `mysh_statistics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mysh_users`
--
ALTER TABLE `mysh_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mysh_verify_codes`
--
ALTER TABLE `mysh_verify_codes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mysh_links`
--
ALTER TABLE `mysh_links`
  ADD CONSTRAINT `mysh_links_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `mysh_categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `mysh_permission_role`
--
ALTER TABLE `mysh_permission_role`
  ADD CONSTRAINT `mysh_permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `mysh_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mysh_permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `mysh_roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mysh_role_user`
--
ALTER TABLE `mysh_role_user`
  ADD CONSTRAINT `mysh_role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `mysh_roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mysh_role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `mysh_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mysh_statistics`
--
ALTER TABLE `mysh_statistics`
  ADD CONSTRAINT `mysh_statistics_link_id_foreign` FOREIGN KEY (`link_id`) REFERENCES `mysh_links` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
