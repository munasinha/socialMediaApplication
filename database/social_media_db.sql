-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 21, 2019 at 09:55 AM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_media_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `follower_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `follower_id`, `created_at`, `updated_at`) VALUES
(33, 1, 2, NULL, NULL),
(34, 1, 3, NULL, NULL),
(35, 1, 4, NULL, NULL),
(36, 1, 5, NULL, NULL),
(37, 2, 1, NULL, NULL),
(44, 2, 3, NULL, NULL),
(45, 2, 4, NULL, NULL),
(46, 6, 1, NULL, NULL),
(47, 6, 3, NULL, NULL),
(48, 6, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_10_20_050829_create_posts_table', 1),
(4, '2019_10_20_080034_create_followers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 1, 'First Status ..', '2019-10-20 14:42:59', '2019-10-20 14:42:59'),
(3, 3, 'hello I am sawinda', '2019-10-20 15:28:10', '2019-10-20 15:28:10'),
(4, 4, 'Hii I am danial', '2019-10-20 15:29:15', '2019-10-20 15:29:15'),
(5, 5, 'HII I am kamal Sundar', '2019-10-20 17:05:38', '2019-10-20 17:05:50'),
(6, 2, 'hello ... I am Yoshitha', '2019-10-20 22:32:21', '2019-10-20 22:32:21'),
(7, 6, 'Hii I am nimal', '2019-10-20 22:36:02', '2019-10-20 22:36:02'),
(8, 6, 'This is my second post', '2019-10-20 22:38:33', '2019-10-20 22:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `date_of_birth`, `gender`, `phone_number`, `discription`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'navod', '2019-10-10', 'male', '23567588678', 'kjghjdghjdgjtjty rt rutytrutyuty trutrututrut5  u5u754uy45u5', 'navod@gmail.com', NULL, '$2y$10$D4gA7FYgFh3BMrMQOeUcAORpnI7cQAVmFNZFOyryOXHz7pH0niH6q', NULL, '2019-10-20 14:42:37', '2019-10-20 14:42:37'),
(2, 'yoshitha', '2019-10-11', 'male', '57667657576357', 'hgrjhg  jteyjt teyuetyue  uyeruryuery', 'yo@gmail.com', NULL, '$2y$10$yBFK4yOmmJ91pvsqtevWweACNL8Tu.qIhninA.1XDHN0JphRuFWn.', NULL, '2019-10-20 14:44:04', '2019-10-20 14:44:04'),
(3, 'sawinda', '2019-10-11', 'male', '23453653747', 'gegwete  te yewywtete ytytrwywt  tytyteytew', 'sawinda@gmail.com', NULL, '$2y$10$JhvpMGiBvcs2HpGnOozTku3QSIy6HJEIE9nj2TemmULlOb9NGty/e', NULL, '2019-10-20 15:27:51', '2019-10-20 15:27:51'),
(4, 'danian', '2019-10-18', 'male', '567487699654', 'csdfsfs gsgedhtyk hrururw3', 'danian@gmail.com', NULL, '$2y$10$o2QmWLysRikocnptnPSuZehCOQqmUWS3qi9AHrPKkG1D0tGrqjS1S', NULL, '2019-10-20 15:28:59', '2019-10-20 15:28:59'),
(5, 'kamal', '2019-10-17', 'male', '464756785858', 'vbdsbd hrtyhrt hruryu jrurtuy', 'kamal@g.com', NULL, '$2y$10$AjxpasXp0uNU4G9p3MA0a.3tqLtcVoCFd66/gRSZtPUNgKrgsqZz6', NULL, '2019-10-20 16:57:27', '2019-10-20 16:57:27'),
(6, 'Nimal', '2019-10-04', 'male', '34369090957', 'egewwte hgjrj uyukuyryu ykyirkry', 'nimal@gmail.com', NULL, '$2y$10$4y3F4OaoDeKE28F1jO7af.7tm/Zg3IHO9OeskOnczwySJKx9R47GS', NULL, '2019-10-20 22:35:16', '2019-10-20 22:35:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followers_user_id_foreign` (`user_id`),
  ADD KEY `followers_follower_id_foreign` (`follower_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_follower_id_foreign` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `followers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
