-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 05:08 PM
-- Server version: 10.3.16-MariaDB
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
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `adsettings`
--

CREATE TABLE `adsettings` (
  `id` int(10) UNSIGNED NOT NULL,
  `Embedd_code` varchar(191) NOT NULL,
  `image_flag` tinyint(1) NOT NULL,
  `catagory_flag` tinyint(1) NOT NULL,
  `home_flag` tinyint(1) NOT NULL,
  `search_flag` tinyint(1) NOT NULL,
  `issearch` tinyint(1) NOT NULL,
  `iscat` tinyint(1) NOT NULL,
  `ishome` tinyint(1) NOT NULL,
  `isimage` tinyint(1) NOT NULL,
  `adhomecode` mediumtext NOT NULL,
  `adimage` mediumtext NOT NULL,
  `createdAt` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_At` timestamp NOT NULL DEFAULT current_timestamp(),
  `image` varchar(500) NOT NULL,
  `video` varchar(500) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `stick` tinyint(1) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `details` mediumtext NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `image`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(5, 'Sea Creatures', '1620064632hiro-kit-LRCSwnqkC6M-unsplash.jpg', 'sea-creatures', 1, '2021-05-03 12:57:12', '2021-05-03 12:57:12'),
(6, 'coral reaf', '1620064680dustin-humes-QndtVf9NBd0-unsplash.jpg', 'coral-reaf', 1, '2021-05-03 12:58:00', '2021-05-03 12:58:00'),
(7, 'Diving Locations', '1620064739dan-gold-1XkHWekZE_M-unsplash.jpg', 'diving-locations', 1, '2021-05-03 12:58:59', '2021-05-03 12:58:59');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `work_id`, `created_at`, `updated_at`) VALUES
(0, 9, 0, '2021-05-03 01:44:31', '2021-05-03 01:44:31');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(10) UNSIGNED NOT NULL,
  `follower_id` int(10) UNSIGNED NOT NULL,
  `leader_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `follower_id`, `leader_id`, `created_at`, `updated_at`) VALUES
(0, 9, 3, '2021-05-03 04:06:52', '2021-05-03 04:06:52');

-- --------------------------------------------------------

--
-- Table structure for table `f_a_qs`
--

CREATE TABLE `f_a_qs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `licenses`
--

CREATE TABLE `licenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `work_id`, `created_at`, `updated_at`) VALUES
(1, 11, 1, '2021-05-04 06:54:58', '2021-05-04 06:54:58'),
(2, 11, 4, '2021-05-04 06:55:02', '2021-05-04 06:55:02'),
(3, 10, 1, '2021-05-04 06:55:46', '2021-05-04 06:55:46'),
(4, 10, 4, '2021-05-04 06:55:50', '2021-05-04 06:55:50'),
(5, 12, 9, '2021-05-04 13:29:40', '2021-05-04 13:29:40'),
(8, 12, 14, '2021-05-08 14:53:56', '2021-05-08 14:53:56'),
(9, 3, 30, '2021-05-08 16:54:16', '2021-05-08 16:54:16');

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
(3, '2018_04_13_040842_create_categories_table', 1),
(4, '2018_04_13_045340_create_galleries_table', 1),
(5, '2018_04_13_045400_create_videos_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widget` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `report_images`
--

CREATE TABLE `report_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `w_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_title2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_title3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `f_title4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_layout` tinyint(1) NOT NULL DEFAULT 0,
  `footer_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watermark_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preloader` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_preloader` tinyint(1) NOT NULL DEFAULT 1,
  `is_gotop` tinyint(1) NOT NULL DEFAULT 1,
  `is_blog` tinyint(1) NOT NULL,
  `right_click` tinyint(1) NOT NULL DEFAULT 0,
  `inspect` tinyint(1) NOT NULL DEFAULT 0,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_mailchimp` tinyint(1) NOT NULL DEFAULT 1,
  `is_playstore` tinyint(1) NOT NULL DEFAULT 1,
  `is_app_icon` tinyint(1) NOT NULL DEFAULT 1,
  `is_category` tinyint(1) NOT NULL DEFAULT 1,
  `sidebar_left` tinyint(1) NOT NULL DEFAULT 1,
  `app_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `playstore_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_pixel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_login` tinyint(4) NOT NULL,
  `fb_login` tinyint(4) NOT NULL,
  `gitlab_login` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `logo`, `favicon`, `w_title`, `w_name`, `w_email`, `w_address`, `w_phone`, `w_time`, `keywords`, `desc`, `footer_text`, `copyright`, `f_title2`, `f_title3`, `f_title4`, `footer_layout`, `footer_logo`, `watermark_img`, `preloader`, `is_preloader`, `is_gotop`, `is_blog`, `right_click`, `inspect`, `google_id`, `is_mailchimp`, `is_playstore`, `is_app_icon`, `is_category`, `sidebar_left`, `app_link`, `playstore_link`, `fb_pixel`, `google_login`, `fb_login`, `gitlab_login`, `created_at`, `updated_at`) VALUES
(1, 'logo_1620076459—Pngtree—fishing_263967 (2).png', 'favicon.ico', 'Sealife - Collection of Images', 'Sealife', 'info@example.com', '121, King Street, Bangalore, India - 302002', '+91 123-456-7890', '10 AM - 8 PM', 'Click Stocks, free stock photos script, php script, laravel photo script,', 'Click Stocks - Free Stock Photos Laravel Script', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tortor lorem, luctus non dui ut, imperdiet sollicitudin mauris. Phasellus commodo bibendum arcu ut bibendum.', 'All Rights Reserved.', 'Useful Links', 'Help', 'Contact Us', 0, 'logo-white.png', 'watermark_img_1561610666logo_1550834774logo.png', '—Pngtree—fishing_263967 (2).png', 0, 0, 0, 0, 0, NULL, 1, 1, 1, 1, 0, '#', '#', NULL, 0, 0, 0, '2018-04-15 14:17:15', '2021-05-03 16:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `title`, `icon`, `url`, `created_at`, `updated_at`) VALUES
(2, 'Twitter', 'fa fa-twitter', 'https://www.twitter.com', '2018-10-05 06:16:31', '2019-02-19 00:07:38'),
(3, 'Google', 'fa fa-google', 'https://www.google.com', '2018-10-05 06:16:59', '2019-02-19 00:07:50'),
(4, 'Facebook', 'fa fa-facebook', 'https://facebook.com', '2019-02-18 20:57:35', '2019-02-19 00:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(0, 'Sea Creatures', 'diving-locations', '2021-05-04 11:52:38', '2021-05-04 11:52:51'),
(0, 'coral reaf', 'diving-locations', '2021-05-04 11:52:46', '2021-05-04 11:52:51'),
(0, 'Diving Locations', 'diving-locations', '2021-05-04 11:52:51', '2021-05-04 11:52:51'),
(0, 'angel fish', NULL, '2021-05-04 13:07:23', '2021-05-04 13:07:23'),
(0, 'blue', 'blue', '2021-05-04 13:34:13', '2021-05-04 13:34:13'),
(0, 'whale', 'whale', '2021-05-04 13:34:13', '2021-05-04 13:34:13'),
(0, 'bull', 'bull', '2021-05-04 13:37:20', '2021-05-04 13:37:20'),
(0, 'shark', 'shark', '2021-05-04 13:37:20', '2021-05-04 13:37:20'),
(0, 'crab', 'crab', '2021-05-04 13:39:45', '2021-05-04 13:39:45'),
(0, 'cuttle', 'cuttle', '2021-05-04 13:43:19', '2021-05-04 13:43:19'),
(0, 'fish', 'fish', '2021-05-04 13:43:19', '2021-05-04 13:43:19'),
(0, 'barracuda point', NULL, '2021-05-08 15:02:00', '2021-05-08 15:02:00'),
(0, 'sipadan island', NULL, '2021-05-08 15:02:00', '2021-05-08 15:02:00'),
(0, 'malaysia', NULL, '2021-05-08 15:02:00', '2021-05-08 15:02:00'),
(0, 'blue corner wall', NULL, '2021-05-08 15:06:46', '2021-05-08 15:06:46'),
(0, 'palau', NULL, '2021-05-08 15:06:46', '2021-05-08 15:06:46'),
(0, 'micronesia', NULL, '2021-05-08 15:06:46', '2021-05-08 15:06:46'),
(0, 'Barracuda Point', NULL, '2021-05-08 15:55:30', '2021-05-08 15:55:30'),
(0, 'Sipadan Island', NULL, '2021-05-08 15:55:30', '2021-05-08 15:55:30'),
(0, 'The Yongala', NULL, '2021-05-08 15:58:24', '2021-05-08 15:58:24'),
(0, 'australia', NULL, '2021-05-08 15:58:24', '2021-05-08 15:58:24'),
(0, 'Thistlegorm', NULL, '2021-05-08 16:03:23', '2021-05-08 16:03:23'),
(0, 'egyptian red sea', NULL, '2021-05-08 16:03:23', '2021-05-08 16:03:23'),
(0, 'Shark and Yolanda Reef', NULL, '2021-05-08 16:08:04', '2021-05-08 16:08:04'),
(0, ' Egyptian Red Sea', NULL, '2021-05-08 16:08:04', '2021-05-08 16:08:04'),
(0, 'Manta Ray Night Dive', NULL, '2021-05-08 16:10:04', '2021-05-08 16:10:04'),
(0, ' Kailua Kona', NULL, '2021-05-08 16:10:04', '2021-05-08 16:10:04'),
(0, 'hawaii', NULL, '2021-05-08 16:10:04', '2021-05-08 16:10:04'),
(0, 'Great Blue Hole', NULL, '2021-05-08 16:11:48', '2021-05-08 16:11:48'),
(0, ' Belize', NULL, '2021-05-08 16:11:48', '2021-05-08 16:11:48'),
(0, 'USAT Liberty', NULL, '2021-05-08 16:13:11', '2021-05-08 16:13:11'),
(0, ' Bali', NULL, '2021-05-08 16:13:11', '2021-05-08 16:13:11'),
(0, ' Indonesia', NULL, '2021-05-08 16:13:11', '2021-05-08 16:13:11'),
(0, 'Maldives', NULL, '2021-05-08 16:18:32', '2021-05-08 16:18:32'),
(0, 'Great Barrier Reef Australia', NULL, '2021-05-08 16:20:39', '2021-05-08 16:20:39'),
(0, 'New Caledonia Barrier Reef – New Caledonia', NULL, '2021-05-08 16:21:55', '2021-05-08 16:21:55'),
(0, 'Red Sea Coral Reef – Red Sea', NULL, '2021-05-08 16:25:32', '2021-05-08 16:25:32'),
(0, 'Rainbow Reef – Fiji', NULL, '2021-05-08 16:33:49', '2021-05-08 16:33:49'),
(0, 'Angelfish', NULL, '2021-05-08 16:37:40', '2021-05-08 16:37:40'),
(0, 'Blue Whale', NULL, '2021-05-08 16:39:23', '2021-05-08 16:39:23'),
(0, 'Cuttlefish', NULL, '2021-05-08 16:41:05', '2021-05-08 16:41:05'),
(0, 'Dolphin', NULL, '2021-05-08 16:42:32', '2021-05-08 16:42:32');

-- --------------------------------------------------------

--
-- Table structure for table `tag_work`
--

CREATE TABLE `tag_work` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_work`
--

INSERT INTO `tag_work` (`id`, `work_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(0, 0, 0, NULL, NULL),
(0, 1, 0, NULL, NULL),
(0, 2, 0, NULL, NULL),
(0, 3, 0, NULL, NULL),
(0, 4, 0, NULL, NULL),
(0, 5, 0, NULL, NULL),
(0, 6, 0, NULL, NULL),
(0, 7, 0, NULL, NULL),
(0, 8, 0, NULL, NULL),
(0, 9, 0, NULL, NULL),
(0, 10, 0, NULL, NULL),
(0, 11, 0, NULL, NULL),
(0, 12, 0, NULL, NULL),
(0, 13, 0, NULL, NULL),
(0, 14, 0, NULL, NULL),
(0, 15, 0, NULL, NULL),
(0, 16, 0, NULL, NULL),
(0, 18, 0, NULL, NULL),
(0, 17, 0, NULL, NULL),
(0, 20, 0, NULL, NULL),
(0, 19, 0, NULL, NULL),
(0, 24, 0, NULL, NULL),
(0, 23, 0, NULL, NULL),
(0, 22, 0, NULL, NULL),
(0, 21, 0, NULL, NULL),
(0, 27, 0, NULL, NULL),
(0, 26, 0, NULL, NULL),
(0, 25, 0, NULL, NULL),
(0, 28, 0, NULL, NULL),
(0, 29, 0, NULL, NULL),
(0, 33, 0, NULL, NULL),
(0, 32, 0, NULL, NULL),
(0, 31, 0, NULL, NULL),
(0, 30, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uni_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` char(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `confirmed` tinyint(1) NOT NULL DEFAULT 0,
  `confirmation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `verifyToken` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `uni_id`, `password`, `google_id`, `facebook_id`, `mobile`, `gender`, `dob`, `address`, `city`, `state`, `country`, `website`, `brief`, `image`, `is_admin`, `is_active`, `confirmed`, `confirmation_code`, `remember_token`, `created_at`, `updated_at`, `verifyToken`) VALUES
(3, 'admin', 'admin@admin.com', '9UW6z', '$2y$10$rXIXL.CTYvj3UW.rh0snWu4kHcvKz/lvPvPNbP1n3N3PfH0TTs.QS', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'defaultuser.png', 1, 1, 1, NULL, 'UO1JzVyRSG1w2O68dnajsHc1Ofy594A5SmnUKWCEppW9Yh9ixpbLHb9vwZym', '2021-05-02 11:54:04', '2021-05-02 11:54:04', '5glMdGk2X7A3fEuCcvWc197X9zflVNiTrCmlEVLh'),
(12, 'user1', 'user1@gmail.com', 'FOlX4', '$2y$10$2KiX9wDPcbuiMkAwsBIRLuAoKbNXRLk8FbGpB4wRgrXCuWm2HOK7y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'defaultuser.png', 0, 1, 1, NULL, 'vKmiDE0FceGqWHSeO69GeoAPoed3zn2Qr12CWfijxH4ucwaPIGZ9Vh37V1rj', '2021-05-04 11:54:29', '2021-05-04 11:54:29', 'yJxWx9IFq4Q0A3gsdh5voOfoNZJjY4mrgMwNzmPO'),
(13, 'user2', 'user2@gmail.com', 'rBYA9', '$2y$10$Pc3cnJbOLiE7c2EF035.4ujs9w7prO4xaPEzxC1DThIh9cBWHMWoW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'defaultuser.png', 0, 1, 1, NULL, 'NGdsViFXAWjXgD8vgQL2L8mT9x2I4E98nn7xVtfVYn4tFyok5ooxYv3FJw96', '2021-05-08 16:05:57', '2021-05-08 16:05:57', 'mMWEPDl2nem7SXIOQsmlhSDmBjqkM2EeKI1Nlw01');

-- --------------------------------------------------------

--
-- Table structure for table `user_socials`
--

CREATE TABLE `user_socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `fb_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twi_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `g_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insta_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_url` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_socials`
--

INSERT INTO `user_socials` (`id`, `user_id`, `fb_url`, `twi_url`, `g_url`, `link_url`, `insta_url`, `pin_url`, `paypal_url`, `paypal_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', '2019-09-21 05:59:22', '2019-09-21 05:59:22'),
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', '2019-09-21 05:59:22', '2019-09-21 05:59:22'),
(0, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', '2021-05-02 12:05:53', '2021-05-02 12:05:53'),
(0, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', '2021-05-03 01:44:06', '2021-05-03 01:44:06'),
(0, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', '2021-05-04 05:51:01', '2021-05-04 05:51:01'),
(0, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', '2021-05-04 06:20:54', '2021-05-04 06:20:54'),
(0, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 11:54:29', '2021-05-04 11:54:29'),
(0, 13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ' ', '2021-05-08 16:05:58', '2021-05-08 16:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` int(10) UNSIGNED NOT NULL,
  `viewable_id` int(10) UNSIGNED NOT NULL,
  `viewable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `viewable_id`, `viewable_type`, `visitor`, `viewed_at`) VALUES
(0, 19, 'App\\Work', '127.0.0.1', '2021-05-08 16:04:46'),
(0, 22, 'App\\Work', '127.0.0.1', '2021-05-08 16:14:39'),
(0, 26, 'App\\Work', '127.0.0.1', '2021-05-08 16:23:57'),
(0, 17, 'App\\Work', '127.0.0.1', '2021-05-08 16:35:10'),
(0, 18, 'App\\Work', '127.0.0.1', '2021-05-08 16:53:45'),
(0, 30, 'App\\Work', '127.0.0.1', '2021-05-08 16:55:12'),
(0, 25, 'App\\Work', '127.0.0.1', '2021-05-08 17:10:55'),
(0, 25, 'App\\Work', '127.0.0.1', '2021-05-08 17:14:05'),
(0, 25, 'App\\Work', '127.0.0.1', '2021-05-08 17:14:18'),
(0, 25, 'App\\Work', '127.0.0.1', '2021-05-08 17:15:56'),
(0, 25, 'App\\Work', '127.0.0.1', '2021-05-08 17:17:14'),
(0, 25, 'App\\Work', '127.0.0.1', '2021-05-08 17:22:22'),
(0, 25, 'App\\Work', '127.0.0.1', '2021-05-08 17:23:19'),
(0, 25, 'App\\Work', '127.0.0.1', '2021-05-08 17:23:54'),
(0, 25, 'App\\Work', '127.0.0.1', '2021-05-08 17:24:22');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_tag` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lic_id` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uni_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aperture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `focal_len` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shutter_speed` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dimension` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `taken_date` date DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `download` int(11) DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 2,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_psd` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `user_id`, `category_id`, `title`, `meta_tag`, `meta_desc`, `desc`, `lic_id`, `slug`, `uni_id`, `width`, `height`, `type`, `model`, `aperture`, `iso`, `focal_len`, `shutter_speed`, `dimension`, `taken_date`, `is_featured`, `download`, `status`, `is_active`, `created_at`, `updated_at`, `is_psd`) VALUES
(17, 12, 7, 'Blue Corner Wall, Palau, Micronesia', NULL, NULL, 'Blue Corner is a section of Palau\'s barrier reef in the south-east of Koror, close to Ngerukewid and German Channel. Its triangular shape, with step walls on the Pacific Ocean sides, resembles a submerged peninsula. In the north part of the Blue Corner, there is a large underwater cavern called Blue Holes. Due to a high variety of corals and wildlife in the area, the Blue Corner is a popular recreational dive site. It is various called \"the most requested dive in Palau\" and \"one of the most action-packed scuba dive sites in the world.\"', NULL, 'blue-corner-wall-palau-micronesia', 'vm6dY', 2737, 1827, 'jpeg', 'NIKON D800', 'f/9.0', '200', '16', '7.32', NULL, '2014-09-05', 0, 1, 1, 1, '2021-05-08 15:54:08', '2021-05-08 16:35:25', NULL),
(18, 12, 7, 'Barracuda Point, Sipadan Island, Malaysia', NULL, NULL, 'Certainly one of the most impressive scuba diving sites in the world, Barracuda Point attracts thousands of divers every year to see the amazing underwater life that is located in this region of the world. For many, Barracuda Point represents one of the best experiences that scuba divers can have in this region of the world.\r\nBarracuda Point is located on Sipadan Island, the only oceanic island that is part of Malaysia. Located in the Celebes Sea, the island is just off the east coast of Sabah in East Malaysia or Borneo and consists of living corals that formed over an ancient, extinct volcano.\r\nThe diverse sea life around Sipadan Island has been well known since Jacques Cousteau publicized his dives in the region. For many, Barracuda point is the best spot on the island to dive thanks to its clear waters and unique location. Although to be fair there are other spots around the island that also features much of the diverse ocean life in this region.', NULL, 'barracuda-point-sipadan-island-malaysia', 'xF21f', 1500, 1000, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 15:55:30', '2021-05-08 15:55:57', NULL),
(19, 12, 7, 'The Yongala, Australia', NULL, NULL, 'The Yongala is a shipwreck off the coast of Queensland. Full of marine life you may see manta rays, sea snakes, octopuses, turtles, bull sharks, tiger sharks, clouds of fish and spectacular coral.\r\nThe Yongala sank during a cyclone in 1911 killing 122 people, a racehorse called Moonshine and a red Lincolnshire bull. She had no telegraph facilities and so could not be warned of the weather ahead. In 1981 the Yongala was given official protection under the Historic Shipwrecks Act. The ship is 90 km southeast of Townsville, 10 km away form Cape Bowling Green. 109 meters long, the bow points north and the ship lists to starboard', NULL, 'the-yongala-australia', '64Th6', 1280, 853, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 15:58:24', '2021-05-08 16:04:01', NULL),
(20, 12, 7, 'Thistlegorm, Egyptian Red Sea', NULL, NULL, 'A large wreck which needs several dives to do it justice. A British vessel, the Thistlegorm (Blue Thistle) was attacked from the air and sunk in 1941 whilst carrying a cargo of war supplies: rifles, motor bikes, train carriages, trucks. Currents can be strong, and in different directions at the surface and at the wreck.', NULL, 'thistlegorm-egyptian-red-sea', 'G18ni', 1280, 720, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:03:23', '2021-05-08 16:03:42', NULL),
(21, 13, 7, 'Shark and Yolanda Reef, Egyptian Red Sea', NULL, NULL, 'Three dives in one: anemone city, shark reef with its spectacular drop off and the wreck of the Yolanda. Currents make this good for drift dives and for pelagic fish. A popular dive starts at Anemone City before drifting to Shark Reef and its drop off. Finish up on the wreck of the Yolanda with its cargo of toilets.', NULL, 'shark-and-yolanda-reef-egyptian-red-sea', 'aMWpr', 1280, 720, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:08:04', '2021-05-08 16:14:19', NULL),
(22, 13, 7, 'Manta Ray Night Dive, Kailua Kona, Hawaii', NULL, NULL, 'Underwater lights placed on the ocean floor attract infinite amounts of plankton, which in turn attract the huge, yet beautiful manta rays of Kona Hawaii. The rays get so close to you, that you often have to move to avoid them accidentally hitting you. An amazingly wonderful and unforgettable time with one of the most beautiful animals in the world.', NULL, 'manta-ray-night-dive-kailua-kona-hawaii', '9gDmI', 1280, 960, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:10:04', '2021-05-08 16:14:04', NULL),
(23, 13, 7, 'Great Blue Hole, Belize', NULL, NULL, 'Very deep, wide, hole outlined by coral reef and inhabited by sharks. Is there another sight like it? 30 m visibility coming over the bathwater warm reef of vibrant colors, descending into a cool, deep blue hole where the water begins to waver and shimmer as you enter the transition from salt to fresh water at about 15 m. Watching the enormous tuna and other pelagics dive into the hole to clean themselves as you briefly remove your octopus to taste the fresh water. Then descending another 25 m to explore the stalagtites and stalagmites of ancient caverns.', NULL, 'great-blue-hole-belize', '6AWf6', 1772, 1181, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:11:48', '2021-05-08 16:13:47', NULL),
(24, 13, 7, 'USAT Liberty, Bali, Indonesia', NULL, NULL, 'This wreck is very popular with photographers as it is totally encrusted in anemone, gorgonians and corals. Look for the hawksbill turtle which practically lives on the Liberty and interesting small stuff like the beautiful purple Scorpion Leaf Fish and Ornate Ghost Pipefish. Larger fish you might see there include Great Barracuda and Flapnose Ray. The wreck is quite broken up but you can go in the cargo hold. You dive it not so much for the experience of wreck diving but for the fabulous sealife.', NULL, 'usat-liberty-bali-indonesia', 'UfkwJ', 1280, 720, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:13:11', '2021-05-08 16:13:31', NULL),
(25, 13, 6, 'Maldives', NULL, NULL, 'The Maldives are made up of 1,200 islands and 26 atolls; the waters feature a beautiful landscape of corals and vibrant array of marine life. Unfortunately, with the warming of the ocean waters, particularly the El Niño weather event of 1998, a majority of coral suffered from heavy bleaching, dying off; however, over the past few years, there have been encouraging signs of recovery.', NULL, 'maldives', 'kNLXB', 1024, 640, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:18:32', '2021-05-08 16:22:46', NULL),
(26, 13, 6, 'Great Barrier Reef – Australia', NULL, NULL, 'Not only is Australia’s Great Barrier Reef one of the most beautiful reefs in the world, but it’s also the largest one on Earth. The reef comprises over 3,000 individual reef systems, complete with abundant colorful marine life and 400 types of coral. Situated off the coast of Queensland, the reef also features hundreds of islands, many of which have pristine beaches that locals and tourists alike flock to every year. One of the Seven Natural Wonders of World, the Great Barrier Reef is also a UNESCO World Heritage Site.', NULL, 'great-barrier-reef-australia', 'BIS1v', 1920, 1080, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:20:39', '2021-05-08 16:22:30', NULL),
(27, 13, 6, 'New Caledonia Barrier Reef – New Caledonia', NULL, NULL, 'The second-largest double barrier reef in the world, the UNESCO World Heritage Site New Caledonia Barrier Reef is an example of Mother Nature at her finest, complete with incredible blue waters in varying shades. Located in the South Pacific off the northeast coast of Australia, this double-barrier reef is home to a variety of marine life, many of which are still in the process of being discovered and classified, with the Green turtle and 1,000 fish species already documented. As with most of the stunning habitats, this one is constantly under threat due to man-made causes.', NULL, 'new-caledonia-barrier-reef-new-caledonia', 'YjoNX', 1245, 700, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:21:55', '2021-05-08 16:22:14', NULL),
(28, 13, 6, 'Red Sea Coral Reef – Red Sea', NULL, NULL, 'The Red Sea Coral Reef is an amazing undersea world located in between two of the hottest and most arid deserts in the world: the Sahara and the Arabian. Approximately 1,200 miles long, this reef, which is over 5,000 years old, is home to 300 hard coral species and about 1,200 fish, of which 10 percent are found only in this area. One thing to note about this coral reef is that it is strong, able to withstand a variety of elements including extreme temperature changes.', NULL, 'red-sea-coral-reef-red-sea', '8AD7f', 2560, 1770, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:25:32', '2021-05-08 16:26:32', NULL),
(29, 13, 6, 'Rainbow Reef – Fiji', NULL, NULL, 'Located between the second and third largest islands of Fiji, Vanua Levu and Taveuni, Rainbow Reef is the perfect name for this locale, as it features a kaleidoscope of vibrant colors under the water, provided by the hard and soft corals and marine life that call the area home. Indeed, there are 230 hard and soft corals and close to 1,200 fish species, creating a feast for the eyes. With the fantastical beauty, it’s no wonder that this is one of the top diving destinations in the world.', NULL, 'rainbow-reef-fiji', 'D3Qd3', 1280, 720, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:33:49', '2021-05-08 16:34:12', NULL),
(30, 13, 5, 'Angelfish', NULL, NULL, 'Marine angelfish are perciform fish of the family Pomacanthidae. They are found on shallow reefs in the tropical Atlantic, Indian, and mostly western Pacific Oceans. The family contains seven genera and about 86 species. They should not be confused with the freshwater angelfish, tropical cichlids of the Amazon Basin.', NULL, 'angelfish', '1MBbc', 1920, 1440, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:37:40', '2021-05-08 16:43:43', NULL),
(31, 13, 5, 'Blue Whale', NULL, NULL, 'The blue whale (Balaenoptera musculus) is a marine mammal belonging to the baleen whale suborder Mysticeti. Reaching a maximum confirmed length of 29.9 metres (98 ft) and a weighing up to 199 tonnes (196 long tons; 219 short tons), it is the largest animal known to have existed. The blue whale\'s long and slender body can be various shades of grayish-blue dorsally and somewhat lighter underneath.\r\n\r\nThe Society for Marine Mammalogy\'s Committee on Taxonomy currently recognizes four subspecies: B. m. musculus in the North Atlantic and North Pacific, B. m. intermedia in the Southern Ocean, B. m. brevicauda (the pygmy blue whale) in the Indian Ocean and South Pacific Ocean, B. m. indica in the Northern Indian Ocean. There is also a population in the waters off Chile that may constitute a fifth subspecies.', NULL, 'blue-whale', 'FW9Q6', 2880, 1880, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:39:23', '2021-05-08 16:43:25', NULL),
(32, 13, 5, 'Cuttlefish', NULL, NULL, 'Cuttlefish or cuttles are marine molluscs of the order Sepiida. They belong to the class Cephalopoda, which also includes squid, octopuses, and nautiluses. Cuttlefish have a unique internal shell, the cuttlebone, which is used for control of buoyancy.\r\n\r\nCuttlefish have large, W-shaped pupils, eight arms, and two tentacles furnished with denticulated suckers, with which they secure their prey. They generally range in size from 15 to 25 cm (6 to 10 in), with the largest species, Sepia apama, reaching 50 cm (20 in) in mantle length and over 10.5 kg (23 lb) in mass.', NULL, 'cuttlefish', 'yGfgV', 1920, 1080, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 1, '2021-05-08 16:41:05', '2021-05-08 16:43:09', NULL),
(33, 13, 5, 'Dolphin', NULL, NULL, 'Dolphin is the common name of aquatic mammals within the infraorder Cetacea. The term dolphin usually refers to the extant families Delphinidae (the oceanic dolphins), Platanistidae (the Indian river dolphins), named Iniidae (the New World river dolphins), and Pontoporiidae (the brackish dolphins), and the extinct Lipotidae (baiji or Chinese river dolphin). There are 40 extant species named as dolphins.', NULL, 'dolphin', '2jrbo', 1920, 1080, 'jpeg', NULL, NULL, NULL, NULL, NULL, NULL, '2016-07-08', 0, 0, 1, 1, '2021-05-08 16:42:32', '2021-05-08 16:42:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `work_photos`
--

CREATE TABLE `work_photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `work_id` int(10) UNSIGNED NOT NULL,
  `images` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `watermark_img` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_photos`
--

INSERT INTO `work_photos` (`id`, `work_id`, `images`, `watermark_img`, `created_at`, `updated_at`) VALUES
(0, 17, '1620507248Blue Corner Wall, Palau, Micronesia.jpg', NULL, '2021-05-08 15:54:09', '2021-05-08 15:54:09'),
(0, 18, '1620507331Barracuda Point, Sipadan Island, Malaysia.jpg', NULL, '2021-05-08 15:55:31', '2021-05-08 15:55:31'),
(0, 19, '1620507504The Yongala, Australia.jpg', NULL, '2021-05-08 15:58:24', '2021-05-08 15:58:24'),
(0, 20, '1620507803Thistlegorm, Egyptian Red Sea 4.jpg', NULL, '2021-05-08 16:03:23', '2021-05-08 16:03:23'),
(0, 21, '1620508084Shark and Yolanda Reef, Egyptian Red Sea.jpg', NULL, '2021-05-08 16:08:04', '2021-05-08 16:08:04'),
(0, 22, '1620508204Manta Ray Night Dive, Kailua Kona, Hawaii.jpeg', NULL, '2021-05-08 16:10:04', '2021-05-08 16:10:04'),
(0, 23, '1620508308Great Blue Hole, Belize.jpg', NULL, '2021-05-08 16:11:49', '2021-05-08 16:11:49'),
(0, 24, '1620508391USAT Liberty, Bali, Indonesia.jpg', NULL, '2021-05-08 16:13:11', '2021-05-08 16:13:11'),
(0, 25, '1620508712Maldives.jpg', NULL, '2021-05-08 16:18:32', '2021-05-08 16:18:32'),
(0, 26, '1620508839Great Barrier Reef – Australia 1.jpg', NULL, '2021-05-08 16:20:39', '2021-05-08 16:20:39'),
(0, 27, '1620508915New Caledonia Barrier Reef – New Caledonia.jpg', NULL, '2021-05-08 16:21:55', '2021-05-08 16:21:55'),
(0, 28, '1620509132Red Sea Coral Reef – Red Sea.jpg', NULL, '2021-05-08 16:25:33', '2021-05-08 16:25:33'),
(0, 29, '1620509629Rainbow Reef – Fiji.jpg', NULL, '2021-05-08 16:33:49', '2021-05-08 16:33:49'),
(0, 30, '1620509860Angelfish.jpg', NULL, '2021-05-08 16:37:40', '2021-05-08 16:37:40'),
(0, 31, '1620509964Blue Whale.jpg', NULL, '2021-05-08 16:39:24', '2021-05-08 16:39:24'),
(0, 32, '1620510065Cuttlefish.jpg', NULL, '2021-05-08 16:41:05', '2021-05-08 16:41:05'),
(0, 33, '1620510153Dolphin.jpg', NULL, '2021-05-08 16:42:33', '2021-05-08 16:42:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adsettings`
--
ALTER TABLE `adsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_work_id_foreign` (`work_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorites_user_id_foreign` (`user_id`),
  ADD KEY `favorites_work_id_foreign` (`work_id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `followers_follower_id_foreign` (`follower_id`),
  ADD KEY `followers_leader_id_foreign` (`leader_id`);

--
-- Indexes for table `f_a_qs`
--
ALTER TABLE `f_a_qs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_category_id_foreign` (`category_id`);

--
-- Indexes for table `licenses`
--
ALTER TABLE `licenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_work_id_foreign` (`work_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `report_images`
--
ALTER TABLE `report_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_facebook_id_unique` (`facebook_id`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`),
  ADD UNIQUE KEY `users_uni_id_unique` (`uni_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_category_id_foreign` (`category_id`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
