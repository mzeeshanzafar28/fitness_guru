-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 11:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `update_fitness_guru`
--

-- --------------------------------------------------------

--
-- Table structure for table `excercises`
--

CREATE TABLE `excercises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `week` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_excercise` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `repeats` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time` time DEFAULT NULL,
  `goal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sedentry` tinyint(4) NOT NULL DEFAULT 0,
  `Extra_Active` tinyint(4) NOT NULL DEFAULT 0,
  `Very_Active` tinyint(4) NOT NULL DEFAULT 0,
  `Moderately_Active` tinyint(4) NOT NULL DEFAULT 0,
  `Lightly_Active` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `excercises`
--

INSERT INTO `excercises` (`id`, `month`, `year`, `week`, `day`, `name`, `type_of_excercise`, `repeats`, `time`, `goal`, `Sedentry`, `Extra_Active`, `Very_Active`, `Moderately_Active`, `Lightly_Active`, `image`, `video`, `created_at`, `updated_at`) VALUES
(1, 'February', '2023', '3', '4', 'multiple', 'minutes', NULL, '45:33:00', 'Keep Fit', 0, 1, 0, 1, 1, '1676039074a16.jpg', '1676039074Watch_-_Facebook.mp4', '2023-02-10 09:24:34', '2023-02-10 09:24:34'),
(2, 'February', '2023', '2', '5', 'excercise test', 'repeats', '45', NULL, 'Keep Fit', 0, 1, 0, 0, 1, '1676094993b18.jpg', '1676094993ہم_نے_ایسے_ہی_نہیں_تیری_طرف_داری_کی_تو_علامت_ہے_میرے_دیس_میں_خودداری_کی.mp4', '2023-02-11 00:56:33', '2023-02-11 00:56:33'),
(11, 'February', '2023', '1', '2', 'test', '2', NULL, NULL, 'Keep Fit', 0, 0, 0, 1, 1, '1676632442a16.jpg', '1676632442ہم_نے_ایسے_ہی_نہیں_تیری_طرف_داری_کی_تو_علامت_ہے_میرے_دیس_میں_خودداری_کی.mp4', '2023-02-17 06:14:02', '2023-02-17 06:14:02'),
(12, 'February', '2023', '3', '1', 'test', '1', NULL, NULL, 'Keep Fit', 0, 0, 0, 1, 1, '1676632442a16.jpg', '1676632442ہم_نے_ایسے_ہی_نہیں_تیری_طرف_داری_کی_تو_علامت_ہے_میرے_دیس_میں_خودداری_کی.mp4', '2023-02-17 06:14:02', '2023-02-17 06:14:02'),
(13, 'February', '2023', '3', '2', 'test', '2', NULL, NULL, 'Keep Fit', 0, 0, 0, 1, 1, '1676632442a16.jpg', '1676632442ہم_نے_ایسے_ہی_نہیں_تیری_طرف_داری_کی_تو_علامت_ہے_میرے_دیس_میں_خودداری_کی.mp4', '2023-02-17 06:14:02', '2023-02-17 06:14:02'),
(14, 'February', '2023', '4', '3', 'test', '3', NULL, NULL, 'Keep Fit', 0, 0, 0, 1, 1, '1676632442a16.jpg', '1676632442ہم_نے_ایسے_ہی_نہیں_تیری_طرف_داری_کی_تو_علامت_ہے_میرے_دیس_میں_خودداری_کی.mp4', '2023-02-17 06:14:02', '2023-02-17 06:14:02'),
(15, 'February', '2023', '1', '2', 'multiple', 'minutes', NULL, NULL, 'Keep Fit', 0, 0, 1, 1, 0, '1676633761a16.jpg', '1676633761ہم_نے_ایسے_ہی_نہیں_تیری_طرف_داری_کی_تو_علامت_ہے_میرے_دیس_میں_خودداری_کی.mp4', '2023-02-17 06:36:01', '2023-02-17 06:36:01'),
(16, 'February', '2023', '3', '2', 'multiple', 'repeats', NULL, NULL, 'Keep Fit', 0, 0, 1, 1, 0, '1676633761a16.jpg', '1676633761ہم_نے_ایسے_ہی_نہیں_تیری_طرف_داری_کی_تو_علامت_ہے_میرے_دیس_میں_خودداری_کی.mp4', '2023-02-17 06:36:01', '2023-02-17 06:36:01'),
(17, 'February', '2023', '3', '3', 'multiple', 'minutes', NULL, NULL, 'Keep Fit', 0, 0, 1, 1, 0, '1676633761a16.jpg', '1676633761ہم_نے_ایسے_ہی_نہیں_تیری_طرف_داری_کی_تو_علامت_ہے_میرے_دیس_میں_خودداری_کی.mp4', '2023-02-17 06:36:01', '2023-02-17 06:36:01'),
(18, 'February', '2023', '1', '2', 'final test', 'repeats', '4', NULL, 'Keep Fit', 1, 0, 0, 1, 1, '1676637154a16.jpg', '1676637154Watch_-_Facebook.mp4', '2023-02-17 07:32:34', '2023-02-17 07:32:34'),
(19, 'February', '2023', '1', '3', 'final test', 'minutes', NULL, '00:00:56', 'Keep Fit', 1, 0, 0, 1, 1, '1676637154a16.jpg', '1676637154Watch_-_Facebook.mp4', '2023-02-17 07:32:34', '2023-02-17 07:32:34'),
(20, 'February', '2023', '3', '3', 'final test', 'repeats', '7', NULL, 'Keep Fit', 1, 0, 0, 1, 1, '1676637154a16.jpg', '1676637154Watch_-_Facebook.mp4', '2023-02-17 07:32:34', '2023-02-17 07:32:34'),
(21, 'February', '2023', '3', '4', 'final test', 'minutes', NULL, '00:00:45', 'Keep Fit', 1, 0, 0, 1, 1, '1676637154a16.jpg', '1676637154Watch_-_Facebook.mp4', '2023-02-17 07:32:34', '2023-02-17 07:32:34'),
(22, 'February', '2023', '3', '5', 'final test', 'repeats', '457', NULL, 'Keep Fit', 1, 0, 0, 1, 1, '1676637154a16.jpg', '1676637154Watch_-_Facebook.mp4', '2023-02-17 07:32:34', '2023-02-17 07:32:34'),
(23, 'February', '2023', '4', '1', 'final test', 'minutes', NULL, '00:00:54', 'Keep Fit', 1, 0, 0, 1, 1, '1676637154a16.jpg', '1676637154Watch_-_Facebook.mp4', '2023-02-17 07:32:34', '2023-02-17 07:32:34'),
(24, 'February', '2023', '4', '2', 'final test update', 'minutes', NULL, '12:03:00', 'Keep Fit', 1, 0, 0, 1, 1, '1676637154a16.jpg', '1676637154Watch_-_Facebook.mp4', '2023-02-17 07:32:34', '2023-02-17 08:17:10'),
(25, 'February', '2023', '4', '3', 'final test', 'minutes', NULL, '00:00:56', 'Keep Fit', 1, 0, 0, 1, 1, '1676637154a16.jpg', '1676637154Watch_-_Facebook.mp4', '2023-02-17 07:32:34', '2023-02-17 07:32:34'),
(26, 'February', '2023', '1', '2', 'Test template', 'repeats', '23', NULL, 'Get Stronger', 0, 0, 0, 1, 1, '16766420731676637154a16.jpg', '16766420731675839298Watch_-_Facebook.mp4', '2023-02-17 08:54:33', '2023-02-17 08:54:33'),
(27, 'February', '2023', '1', '4', 'Test template', 'minutes', NULL, '12:04:00', 'Get Stronger', 0, 0, 0, 1, 1, '16766420731676637154a16.jpg', '16766420731675839298Watch_-_Facebook.mp4', '2023-02-17 08:54:33', '2023-02-17 08:54:33'),
(28, 'February', '2023', '3', '1', 'Test template', 'repeats', '455', NULL, 'Get Stronger', 0, 0, 0, 1, 1, '16766420731676637154a16.jpg', '16766420731675839298Watch_-_Facebook.mp4', '2023-02-17 08:54:33', '2023-02-17 08:54:33'),
(29, 'February', '2023', '3', '3', 'Test template', 'minutes', NULL, '06:08:00', 'Get Stronger', 0, 0, 0, 1, 1, '16766420731676637154a16.jpg', '16766420731675839298Watch_-_Facebook.mp4', '2023-02-17 08:54:33', '2023-02-17 08:54:33'),
(30, 'February', '2023', '3', '5', 'Test template', 'minutes', NULL, '04:05:00', 'Get Stronger', 0, 0, 0, 1, 1, '16766420731676637154a16.jpg', '16766420731675839298Watch_-_Facebook.mp4', '2023-02-17 08:54:33', '2023-02-17 08:54:33'),
(31, 'February', '2023', '4', '2', 'Test template', 'minutes', NULL, '23:55:00', 'Get Stronger', 0, 0, 0, 1, 1, '16766420731676637154a16.jpg', '16766420731675839298Watch_-_Facebook.mp4', '2023-02-17 08:54:33', '2023-02-17 08:54:33'),
(32, 'February', '2023', '1', '1', 'multiple', 'repeats', '34', NULL, 'Keep Fit', 1, 1, 0, 1, 1, '16768735041676631929a16.jpg', '16768735041675839298Watch_-_Facebook.mp4', '2023-02-20 01:11:44', '2023-02-20 01:11:44'),
(33, 'February', '2023', '1', '2', 'multiple', 'minutes', NULL, '03:04:00', 'Keep Fit', 1, 1, 0, 1, 1, '16768735041676631929a16.jpg', '16768735041675839298Watch_-_Facebook.mp4', '2023-02-20 01:11:44', '2023-02-20 01:11:44'),
(34, 'February', '2023', '1', '3', 'multiple', 'repeats', '34', NULL, 'Keep Fit', 1, 1, 0, 1, 1, '16768735041676631929a16.jpg', '16768735041675839298Watch_-_Facebook.mp4', '2023-02-20 01:11:44', '2023-02-20 01:11:44'),
(35, 'February', '2023', '1', '4', 'multiple', 'minutes', NULL, '12:40:00', 'Keep Fit', 1, 1, 0, 1, 1, '16768735041676631929a16.jpg', '16768735041675839298Watch_-_Facebook.mp4', '2023-02-20 01:11:44', '2023-02-20 01:11:44'),
(36, 'February', '2023', '1', '5', 'multiple', 'repeats', '34', NULL, 'Keep Fit', 1, 1, 0, 1, 1, '16768735041676631929a16.jpg', '16768735041675839298Watch_-_Facebook.mp4', '2023-02-20 01:11:44', '2023-02-20 01:11:44'),
(37, 'June', '2025', '1', '2', 'Test with new requriements', 'repeats', '12', NULL, 'Keep Fit', 0, 0, 0, 0, 0, '1677579884b30.jpg', '1677579884Watch_-_Facebook.mp4', '2023-02-28 05:24:44', '2023-02-28 05:24:44'),
(38, 'June', '2025', '3', '1', 'Test with new requriements', 'minutes', NULL, '04:33:00', 'Keep Fit', 0, 0, 0, 0, 0, '1677579884b30.jpg', '1677579884Watch_-_Facebook.mp4', '2023-02-28 05:24:44', '2023-02-28 05:24:44'),
(39, 'June', '2025', '3', '4', 'Test with new requriements with edit excercise', 'minutes', NULL, '12:45:00', 'Keep Fit', 0, 0, 0, 0, 0, '1677579884b30.jpg', '1677579884Watch_-_Facebook.mp4', '2023-02-28 05:24:44', '2023-02-28 05:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_31_074242_add_code_field_in_users_table', 2),
(6, '2023_01_31_075623_add_user_type_column_in_users_table', 3),
(21, '2023_02_03_092434_create_user_profiles_table', 4),
(22, '2023_02_07_114004_create_nutrition_table', 4),
(23, '2023_02_08_062808_create_excercises_table', 4),
(24, '2023_02_08_065032_drop_table_excercises', 4),
(25, '2023_02_10_100804_create_table_update_nutrion', 4),
(26, '2023_02_10_103455_create_user_excercises_table', 4),
(29, '2023_02_10_103520_create_user_nutritions_table', 5),
(31, '2023_02_20_064428_create_water_tracks_table', 6),
(35, '2023_02_20_080423_create_nutrition_tracks_table', 7),
(36, '2023_02_21_105708_create_weight_trackers_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `nutrition`
--

CREATE TABLE `nutrition` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipe_no` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about_recipee` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `serving` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_carbs` bigint(20) NOT NULL,
  `protien` bigint(20) NOT NULL,
  `fat` bigint(20) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sedentry` tinyint(4) NOT NULL DEFAULT 0,
  `Extra_Active` tinyint(4) NOT NULL DEFAULT 0,
  `Very_Active` tinyint(4) NOT NULL DEFAULT 0,
  `Moderately_Active` tinyint(4) NOT NULL DEFAULT 0,
  `Lightly_Active` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nutrition`
--

INSERT INTO `nutrition` (`id`, `month`, `year`, `goal`, `recipe_type`, `recipe_no`, `title`, `about_recipee`, `ingredients`, `serving`, `net_carbs`, `protien`, `fat`, `image`, `Sedentry`, `Extra_Active`, `Very_Active`, `Moderately_Active`, `Lightly_Active`, `created_at`, `updated_at`) VALUES
(1, 'February', '2023', 'Keep Fit', 'lunch', '4', '15 minute keto garlic chicken with broccoli and spinach', '“After looking into a variety of texting services we chose TextMagic because of the variety of features it offers along with the price.', '“After looking into a variety of texting services we chose TextMagic because of the variety of features it offers along with the price.', '1', 4, 4, 6, '1676039155a16.jpg', 0, 1, 0, 1, 1, '2023-02-10 09:25:55', '2023-02-10 09:25:55'),
(2, 'February', '2023', 'Keep Fit', 'lunch', '6', '15 minute keto garlic chicken with broccoli and spinach', 'This text contains nouns (banana, vanilla, milk, eggs), verbs (cream, sift, beat, mix, add) and factual adjectives which describe the preparation of the cake, e.g. cream butter and sugar until light and fluffy.   The recipe also contains two headings, \'Method\' and \'Ingredients\', which make it clear to the reader what is involved in making the cake', 'This text contains nouns (banana, vanilla, milk, eggs), verbs (cream, sift, beat, mix, add) and factual adjectives which describe the preparation of the cake, e.g. cream butter and sugar until light and fluffy.   The recipe also contains two headings, \'Method\' and \'Ingredients\', which make it clear to the reader what is involved in making the cake', '2', 20, 30, 30, '16768789581675839298a18.jpg', 0, 1, 0, 1, 1, '2023-02-20 02:42:38', '2023-02-20 02:42:38'),
(3, 'June', '2025', 'Keep Fit', 'lunch', '1', 'with check new requirements in nutritions update or edit', 'with check new requirements in nutritions', 'with check new requirements in nutritions', '2', 1, 1, 3, '1677580354a13.jpg', 0, 0, 0, 0, 0, '2023-02-28 05:32:34', '2023-02-28 05:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `nutrition_tracks`
--

CREATE TABLE `nutrition_tracks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_nutrition_id` bigint(20) NOT NULL,
  `serving_no` bigint(20) NOT NULL,
  `net_carbs` bigint(20) NOT NULL,
  `fat` bigint(20) NOT NULL,
  `protien` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nutrition_tracks`
--

INSERT INTO `nutrition_tracks` (`id`, `user_id`, `user_nutrition_id`, `serving_no`, `net_carbs`, `fat`, `protien`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 3, 60, 90, 90, '2023-02-20', '2023-02-20 03:30:14', '2023-02-20 03:30:14'),
(3, 3, 1, 4, 16, 24, 16, '2023-02-20', '2023-02-20 03:36:56', '2023-02-20 03:36:56');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(4, 'App\\Models\\User', 3, 'user_token', '876ee0fa0b5e793d94b13f07e463b995978c52d25915862047325c509ab00a9a', '[\"*\"]', NULL, '2023-01-31 02:51:07', '2023-01-31 02:51:07'),
(5, 'App\\Models\\User', 3, 'user_token', '2d3b182540dc2a741e7ab9cbbaaaf4cf0af36a652838ece0a0d5f99a582466ae', '[\"*\"]', '2023-02-11 00:58:10', '2023-02-10 09:31:03', '2023-02-11 00:58:10'),
(6, 'App\\Models\\User', 3, 'user_token', '36af9bdba6e4dce3bc089b4249c0991e83dfe87c1216a8d73d5104ee7bf70e01', '[\"*\"]', '2023-02-15 07:19:21', '2023-02-15 07:10:27', '2023-02-15 07:19:21'),
(7, 'App\\Models\\User', 3, 'user_token', '92a6b6bb4a8b7185d980cdecd1c19eeaa293ae5783433abcdcc4a43285272002', '[\"*\"]', '2023-02-22 07:35:34', '2023-02-18 02:31:39', '2023-02-22 07:35:34'),
(8, 'App\\Models\\User', 3, 'user_token', '524aa50b6cf0225612fe20c1f1d91522f7f051ea1f31a0fd95dcbba60a43afe9', '[\"*\"]', '2023-02-28 05:39:05', '2023-02-28 05:37:25', '2023-02-28 05:39:05'),
(9, 'App\\Models\\User', 3, 'user_token', '4ef7e28db7ec80fbcaf4587b881dcd4c3bb6d57ef55aafe6aa0e84a9632dee97', '[\"*\"]', '2023-03-01 08:02:03', '2023-03-01 07:57:46', '2023-03-01 08:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `table_update_nutrion`
--

CREATE TABLE `table_update_nutrion` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `code`, `user_type`) VALUES
(3, 'Zubair Khan', 'mzubairkhan.official@gmail.com', '+923126962389', '2023-01-30 19:00:00', '$2y$10$iMzF4k4ejWYJPnH2QykTRezuTYv3B29xKRKcNpYPOVaj1wB6ADzHm', NULL, '2023-01-31 02:43:22', '2023-01-31 02:50:38', NULL, 0),
(4, 'FitnessGuru Admin', 'admin@fitnessguru.pk', '+923011234567', '2023-01-31 09:37:58', '$2y$10$5jhX1PYKivythmljQ9ghYu7824WiSAlj1fAOHh07V0wPY6dXN0zb.', NULL, '2023-01-31 09:37:58', '2023-01-31 05:36:13', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_excercises`
--

CREATE TABLE `user_excercises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `excercise_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `week` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_excercises`
--

INSERT INTO `user_excercises` (`id`, `excercise_id`, `user_id`, `month`, `year`, `week`, `day`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'February', '2023', '3', '4', 1, '2023-02-10 09:35:14', '2023-02-18 02:37:09'),
(2, 2, 3, 'February', '2023', '2', '5', 0, '2023-02-11 00:58:10', '2023-02-11 00:58:10'),
(3, 32, 3, 'February', '2023', '1', '1', 1, '2023-02-20 01:16:46', '2023-02-20 01:16:46'),
(4, 33, 3, 'February', '2023', '1', '2', 0, '2023-02-20 01:16:46', '2023-02-20 02:42:53'),
(5, 34, 3, 'February', '2023', '1', '3', 0, '2023-02-20 01:16:46', '2023-02-20 01:16:46'),
(6, 35, 3, 'February', '2023', '1', '4', 0, '2023-02-20 01:16:46', '2023-02-20 01:16:46'),
(7, 36, 3, 'February', '2023', '1', '5', 0, '2023-02-20 01:16:46', '2023-02-20 01:16:46'),
(8, 11, 3, 'February', '2023', '1', '2', 0, '2023-02-28 05:39:05', '2023-02-28 05:39:05'),
(9, 12, 3, 'February', '2023', '3', '1', 0, '2023-02-28 05:39:05', '2023-02-28 05:39:05'),
(10, 13, 3, 'February', '2023', '3', '2', 0, '2023-02-28 05:39:05', '2023-02-28 05:39:05'),
(11, 14, 3, 'February', '2023', '4', '3', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(12, 15, 3, 'February', '2023', '1', '2', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(13, 16, 3, 'February', '2023', '3', '2', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(14, 17, 3, 'February', '2023', '3', '3', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(15, 18, 3, 'February', '2023', '1', '2', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(16, 19, 3, 'February', '2023', '1', '3', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(17, 20, 3, 'February', '2023', '3', '3', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(18, 21, 3, 'February', '2023', '3', '4', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(19, 22, 3, 'February', '2023', '3', '5', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(20, 23, 3, 'February', '2023', '4', '1', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(21, 24, 3, 'February', '2023', '4', '2', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(22, 25, 3, 'February', '2023', '4', '3', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(23, 37, 3, 'June', '2025', '1', '2', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(24, 38, 3, 'June', '2025', '3', '1', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06'),
(25, 39, 3, 'June', '2025', '3', '4', 0, '2023-02-28 05:39:06', '2023-02-28 05:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_nutritions`
--

CREATE TABLE `user_nutritions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nutrition_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `goal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipee_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serving` bigint(20) NOT NULL DEFAULT 0,
  `limit` bigint(20) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_nutritions`
--

INSERT INTO `user_nutritions` (`id`, `nutrition_id`, `user_id`, `goal`, `recipee_type`, `month`, `year`, `serving`, `limit`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Keep Fit', 'lunch', 'February', '2023', 1, 0, 0, '2023-02-20 02:42:53', '2023-02-20 03:36:56'),
(2, 2, 3, 'Keep Fit', 'lunch', 'February', '2023', 2, 0, 0, '2023-02-20 02:42:53', '2023-02-20 03:23:58'),
(3, 3, 3, 'Keep Fit', 'lunch', 'June', '2025', 2, 0, 0, '2023-02-28 05:39:05', '2023-02-28 05:39:05');

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `goal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `gender`, `profile_pic`, `goal`, `activity`, `date_of_birth`, `height`, `weight`, `created_at`, `updated_at`) VALUES
(1, 3, 'Female', 'a9.1.jpg', 'Keep Fit', 'Extra_Active', '2013-02-07', '5 \' 10', '30.71 kg', '2023-02-10 14:33:28', '2023-02-21 06:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `water_tracks`
--

CREATE TABLE `water_tracks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `drink_water` tinyint(4) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `water_tracks`
--

INSERT INTO `water_tracks` (`id`, `user_id`, `drink_water`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '2023-02-20', '2023-02-20 02:33:17', '2023-02-20 02:40:18'),
(3, 3, 2, '2023-02-21', '2023-02-21 06:41:42', '2023-02-21 06:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `weight_trackers`
--

CREATE TABLE `weight_trackers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weight_trackers`
--

INSERT INTO `weight_trackers` (`id`, `user_id`, `weight`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, '70', '2023-02-21', '2023-02-21 06:12:17', '2023-02-21 06:12:17'),
(2, 3, '65', '2023-02-21', '2023-02-21 06:13:51', '2023-02-21 06:13:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `excercises`
--
ALTER TABLE `excercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrition`
--
ALTER TABLE `nutrition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutrition_tracks`
--
ALTER TABLE `nutrition_tracks`
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
-- Indexes for table `table_update_nutrion`
--
ALTER TABLE `table_update_nutrion`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `user_excercises`
--
ALTER TABLE `user_excercises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_nutritions`
--
ALTER TABLE `user_nutritions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `water_tracks`
--
ALTER TABLE `water_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weight_trackers`
--
ALTER TABLE `weight_trackers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `excercises`
--
ALTER TABLE `excercises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `nutrition`
--
ALTER TABLE `nutrition`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nutrition_tracks`
--
ALTER TABLE `nutrition_tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `table_update_nutrion`
--
ALTER TABLE `table_update_nutrion`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_excercises`
--
ALTER TABLE `user_excercises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_nutritions`
--
ALTER TABLE `user_nutritions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `water_tracks`
--
ALTER TABLE `water_tracks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `weight_trackers`
--
ALTER TABLE `weight_trackers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
