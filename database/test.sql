-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2020 at 10:09 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@awok.com', '$2y$10$KjWdK2KlxMDOKGfAiaoSbOQ5t6x2A4T1ZA7PbgCdzWWBB4gA.aDci', 'l8JXseKDYninHvINwEZU9WBOKaVDqSmTpKtYRhW4NFxkTm7JvGbb6WtPykiE', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `field_id` int(10) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_of_crops` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`field_id`, `name`, `type_of_crops`, `area`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Test2', 'Wheat', 11, '2020-01-17 12:13:34', '2020-01-17 12:13:34', 1, 1),
(2, 'test new', 'Broccoli', 25, '2020-01-18 01:28:07', '2020-01-18 01:28:07', 1, 1),
(3, 'test new Strawberries', 'Strawberries', 25, '2020-01-18 01:30:23', '2020-01-18 01:30:23', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `field_processings`
--

CREATE TABLE `field_processings` (
  `processing_id` int(10) UNSIGNED NOT NULL,
  `tractor_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `area` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `field_processings`
--

INSERT INTO `field_processings` (`processing_id`, `tractor_id`, `field_id`, `date`, `area`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 1, 1, '2020-01-17 12:13:34', 10, '2020-01-17 12:19:22', '2020-01-17 12:19:22', 1, 1, 1),
(2, 1, 1, '2020-01-17 12:13:34', 10, '2020-01-17 23:23:23', '2020-01-17 23:23:23', 1, 1, 1),
(3, 2, 2, '2020-01-18 12:13:34', 25, '2020-01-18 01:30:56', '2020-01-18 01:30:56', 1, 1, 1),
(4, 3, 3, '2020-01-18 12:13:34', 20, '2020-01-18 01:31:22', '2020-01-18 01:31:22', 1, 1, 1),
(5, 3, 3, '2020-01-18 12:13:34', 25, '2020-01-18 01:34:47', '2020-01-18 01:34:47', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('26951063a615e34e1f62402520c909f82aba936bf1215ecc74b9cf197d1de4b318c3e0f42a484cf3', 1, 2, NULL, '[]', 0, '2020-01-17 10:51:44', '2020-01-17 10:51:44', '2021-01-17 16:21:44'),
('64f03117a5fb058bf535a9cb8cc922f04a14f2ea83c77a82f2d51e669a4950ed1065fef54a5c106c', 1, 2, NULL, '[]', 0, '2020-01-17 05:11:30', '2020-01-17 05:11:30', '2021-01-17 10:41:30'),
('6959e01594641a893f2b3eee09cdef8e03232efacfa35283f019dfdbab3b1531ec85755b544e3045', 1, 2, NULL, '[]', 0, '2019-06-30 10:27:31', '2019-06-30 10:27:31', '2020-06-30 15:57:31'),
('8a041ca4a4c6a1a0de36855834d0d761dfc6dbedcd9fb60f8850e7bf3489081b6e83fda831f4ac0f', 1, 2, NULL, '[]', 0, '2019-06-26 05:23:30', '2019-06-26 05:23:30', '2020-06-26 10:53:30'),
('9fe9594fd4e3a18c5424389433a649874e0449fc05fff1078c555477682485247fd09975985e0177', 1, 2, NULL, '[]', 0, '2019-06-26 05:23:57', '2019-06-26 05:23:57', '2020-06-26 10:53:57'),
('a25cfcf61437eaacff1d16ea6352ae463bbd171f08c75094f2a8eadfcce12ebc8bd7a35827f2bace', 1, 2, NULL, '[]', 0, '2020-01-17 05:03:38', '2020-01-17 05:03:38', '2021-01-17 10:33:38'),
('bf3908e7f0463984eedd2df0334fb88e78fa0981c900142f1c264a3acf565a0ec04a1fa219c51351', 1, 2, NULL, '[]', 0, '2020-01-17 11:42:25', '2020-01-17 11:42:25', '2021-01-17 17:12:25'),
('c8821842828de729079c9a920b010e64138fecfda898b9aead5a8d11dd3a096dcc4416083088aab8', 1, 2, NULL, '[]', 0, '2019-06-26 05:35:14', '2019-06-26 05:35:14', '2020-06-26 11:05:14'),
('fb5425abd798aaf0d9da79c561a4db4971ef83f96d46ad5a06f5e0d93717f58af8701887431f0da5', 1, 2, NULL, '[]', 0, '2019-06-30 10:25:37', '2019-06-30 10:25:37', '2020-06-30 15:55:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_token_providers`
--

CREATE TABLE `oauth_access_token_providers` (
  `oauth_access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_token_providers`
--

INSERT INTO `oauth_access_token_providers` (`oauth_access_token_id`, `provider`, `created_at`, `updated_at`) VALUES
('26951063a615e34e1f62402520c909f82aba936bf1215ecc74b9cf197d1de4b318c3e0f42a484cf3', 'users', '2020-01-17 10:51:44', '2020-01-17 10:51:44'),
('64f03117a5fb058bf535a9cb8cc922f04a14f2ea83c77a82f2d51e669a4950ed1065fef54a5c106c', 'doctors', '2020-01-17 05:11:30', '2020-01-17 05:11:30'),
('6959e01594641a893f2b3eee09cdef8e03232efacfa35283f019dfdbab3b1531ec85755b544e3045', 'doctors', '2019-06-30 10:27:31', '2019-06-30 10:27:31'),
('8a041ca4a4c6a1a0de36855834d0d761dfc6dbedcd9fb60f8850e7bf3489081b6e83fda831f4ac0f', 'users', '2019-06-26 05:23:30', '2019-06-26 05:23:30'),
('9fe9594fd4e3a18c5424389433a649874e0449fc05fff1078c555477682485247fd09975985e0177', 'users', '2019-06-26 05:23:57', '2019-06-26 05:23:57'),
('a25cfcf61437eaacff1d16ea6352ae463bbd171f08c75094f2a8eadfcce12ebc8bd7a35827f2bace', 'doctors', '2020-01-17 05:03:38', '2020-01-17 05:03:38'),
('bf3908e7f0463984eedd2df0334fb88e78fa0981c900142f1c264a3acf565a0ec04a1fa219c51351', 'users', '2020-01-17 11:42:25', '2020-01-17 11:42:25'),
('c8821842828de729079c9a920b010e64138fecfda898b9aead5a8d11dd3a096dcc4416083088aab8', 'doctors', '2019-06-26 05:35:14', '2019-06-26 05:35:14'),
('fb5425abd798aaf0d9da79c561a4db4971ef83f96d46ad5a06f5e0d93717f58af8701887431f0da5', 'users', '2019-06-30 10:25:37', '2019-06-30 10:25:37');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'OkJLKNrj8jswvPvDEOCrrPczL4T1sPqyAfG1ACg5', 'http://localhost', 1, 0, 0, '2019-06-26 05:03:30', '2019-06-26 05:03:30'),
(2, NULL, 'Laravel Password Grant Client', 'H4yNbyuHRq2A9GxxfsRnaPlSB8vHjONtPtJBqRo0', 'http://localhost', 0, 1, 0, '2019-06-26 05:03:30', '2019-06-26 05:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-06-26 05:03:30', '2019-06-26 05:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('1037b1a468530ab645dfba3dc7b498f721adf265b52446fde54f31b7c6cb4719997fe17f59700004', '9fe9594fd4e3a18c5424389433a649874e0449fc05fff1078c555477682485247fd09975985e0177', 0, '2020-06-26 10:53:57'),
('1e551e7d877ec6e7fd44e67b5f504e5e69e0058bbc2ccca376cfbf82be7fc3750fc3d0557662a94b', '8a041ca4a4c6a1a0de36855834d0d761dfc6dbedcd9fb60f8850e7bf3489081b6e83fda831f4ac0f', 0, '2020-06-26 10:53:30'),
('3e6eb840a9d70c81ef495446f1a35724c87ec846619af05c540896622719214cbe0180cdf0dad413', 'fb5425abd798aaf0d9da79c561a4db4971ef83f96d46ad5a06f5e0d93717f58af8701887431f0da5', 0, '2020-06-30 15:55:37'),
('4dbf29c9eb00eee63930c95bbee8bf8058a72c79807db56ebca9db641a98aa88e6ee764fe270d2f9', '6959e01594641a893f2b3eee09cdef8e03232efacfa35283f019dfdbab3b1531ec85755b544e3045', 0, '2020-06-30 15:57:31'),
('76504f072d2b288d9ad14935b7157fb4f6dc03e76b28c28af04ed425d55af981e61388a2c12c32c3', 'bf3908e7f0463984eedd2df0334fb88e78fa0981c900142f1c264a3acf565a0ec04a1fa219c51351', 0, '2021-01-17 17:12:26'),
('7a8254907a8a57f3335d85af7107aef5b55fd255209ed6a135be1d906927e03db8b3450b31b7c304', '26951063a615e34e1f62402520c909f82aba936bf1215ecc74b9cf197d1de4b318c3e0f42a484cf3', 0, '2021-01-17 16:21:44'),
('86d2e4acee7e7d11cee6951578ab979ca309bdd9fde09502b4399d49a016933c58d57d3a04b3130b', 'c8821842828de729079c9a920b010e64138fecfda898b9aead5a8d11dd3a096dcc4416083088aab8', 0, '2020-06-26 11:05:14'),
('89ca9c16bfafc8a3f16778e21651aee726bf863222e9e6c800200021a5444902916cb7a50163fa8b', '64f03117a5fb058bf535a9cb8cc922f04a14f2ea83c77a82f2d51e669a4950ed1065fef54a5c106c', 0, '2021-01-17 10:41:30'),
('f6f1dfd39f4b031881eb86909501b33f60ed41d21030692bf00a10cbcec6aeae1db45c1bc762ad43', 'a25cfcf61437eaacff1d16ea6352ae463bbd171f08c75094f2a8eadfcce12ebc8bd7a35827f2bace', 0, '2021-01-17 10:33:39');

-- --------------------------------------------------------

--
-- Table structure for table `tractors`
--

CREATE TABLE `tractors` (
  `tractor_id` int(10) NOT NULL,
  `tractor_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `updated_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tractors`
--

INSERT INTO `tractors` (`tractor_id`, `tractor_name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Mahindra', '2020-01-17 12:13:39', '2020-01-17 12:13:39', 1, 1),
(2, 'TAFE', '2020-01-18 01:28:55', '2020-01-18 01:28:55', 1, 1),
(3, 'Swaraj Tractors', '2020-01-18 01:29:06', '2020-01-18 01:29:06', 1, 1),
(4, 'Sonalika Tractors', '2020-01-18 01:29:15', '2020-01-18 01:29:15', 1, 1),
(5, 'New Holland', '2020-01-18 01:29:25', '2020-01-18 01:29:25', 1, 1),
(6, 'Escorts Agri Machinery', '2020-01-18 01:29:36', '2020-01-18 01:29:36', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_elixir_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Not Verified 1: Verified',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_elixir_id`, `name`, `mobile`, `email`, `is_verified`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mpUYAn5Z', 'Selvam Ravichandran', '9791239324', 'sanguineselvam@gmail.com', 1, '$2y$10$YYmYuvsRBWyeZCXnrb/Ymu1PJjZNWRT.7LCrgto.VvWGS29EmzARW', NULL, '2019-06-26 05:14:19', '2020-01-17 11:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `dob` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 Male, 2:Female, 3:others',
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `dob`, `gender`, `profile`, `created_at`, `updated_at`) VALUES
(1, 1, '1990-05-10', 1, NULL, '2019-06-26 05:24:54', '2020-01-17 11:43:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD KEY `admin_password_resets_email_index` (`email`),
  ADD KEY `admin_password_resets_token_index` (`token`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`field_id`);

--
-- Indexes for table `field_processings`
--
ALTER TABLE `field_processings`
  ADD PRIMARY KEY (`processing_id`),
  ADD KEY `processing_id` (`processing_id`),
  ADD KEY `tractor_id` (`tractor_id`),
  ADD KEY `field_id` (`field_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_access_token_providers`
--
ALTER TABLE `oauth_access_token_providers`
  ADD PRIMARY KEY (`oauth_access_token_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `tractors`
--
ALTER TABLE `tractors`
  ADD PRIMARY KEY (`tractor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_user_elixir_id_unique` (`user_elixir_id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `field_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `field_processings`
--
ALTER TABLE `field_processings`
  MODIFY `processing_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tractors`
--
ALTER TABLE `tractors`
  MODIFY `tractor_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `field_processings`
--
ALTER TABLE `field_processings`
  ADD CONSTRAINT `FK_Processing_Tractor_id` FOREIGN KEY (`tractor_id`) REFERENCES `tractors` (`tractor_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_field_id` FOREIGN KEY (`field_id`) REFERENCES `fields` (`field_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `oauth_access_token_providers`
--
ALTER TABLE `oauth_access_token_providers`
  ADD CONSTRAINT `oauth_access_token_providers_oauth_access_token_id_foreign` FOREIGN KEY (`oauth_access_token_id`) REFERENCES `oauth_access_tokens` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
