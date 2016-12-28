-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2016 at 04:36 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Category 1', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(3, 'Category 2', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(4, 'Category 3', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(5, 'Category 4', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(6, 'Category 5', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(7, 'Category 6', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(8, 'Category 7', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(9, 'Category 8', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(10, 'Category 9', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(11, 'An Awesome Blog 10', 'This is actually category 11.', '2016-10-26 22:53:41', '2016-10-26 22:53:41'),
(12, 'An Awesome Blog 11', 'This is actually category 12.', '2016-10-26 22:56:25', '2016-10-26 22:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `author` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `created`, `author`, `body`) VALUES
(6, 2, '2016-12-06 13:25:29', 'Admin', 'Be the first to leave a comment'),
(7, 3, '2016-12-06 13:25:38', 'Donald', 'I love these figurins'),
(15, 2, '2016-12-06 15:58:49', 'Donald', 'This is a message'),
(18, 5, '2016-12-06 16:15:54', 'Donald', 'Nice Picture'),
(21, 8, '2016-12-08 13:21:02', 'Donald', 'i LOVE THIS'),
(22, 8, '2016-12-08 13:21:09', 'Donald', 'i LOVE THIS'),
(23, 8, '2016-12-08 13:21:14', 'Donald', 'i LOVE THIS'),
(24, 8, '2016-12-08 13:21:20', 'Donald', 'i LOVE THIS'),
(25, 8, '2016-12-08 13:21:26', 'Donald', 'i LOVE THIS'),
(26, 8, '2016-12-08 13:21:32', 'Donald', 'i LOVE THIS'),
(27, 1, '2016-12-13 11:21:24', 'dddd', 'ddddd');

-- --------------------------------------------------------

--
-- Table structure for table `copy_categories`
--

CREATE TABLE `copy_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `copy_categories`
--

INSERT INTO `copy_categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Category 1', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(3, 'Category 2', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(4, 'Category 3', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(5, 'Category 4', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(6, 'Category 5', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(7, 'Category 6', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(8, 'Category 7', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(9, 'Category 8', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(10, 'Category 9', ' Suspendisse commodo nibh odio, vel elementum nulla luctus sit amet.', '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(11, 'An Awesome Blog 10', 'This is actually category 11.', '2016-10-26 22:53:41', '2016-10-26 22:53:41'),
(12, 'An Awesome Blog 11', 'This is actually category 12.', '2016-10-26 22:56:25', '2016-10-26 22:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `copy_migrations`
--

CREATE TABLE `copy_migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `copy_migrations`
--

INSERT INTO `copy_migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_10_18_194046_create_post_table', 1),
('2016_10_18_205724_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `copy_password_resets`
--

CREATE TABLE `copy_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `copy_posts`
--

CREATE TABLE `copy_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hits` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `published` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `copy_posts`
--

INSERT INTO `copy_posts` (`id`, `category`, `title`, `body`, `author`, `image`, `hits`, `added_on`, `published`, `created_at`, `updated_at`) VALUES
(1, 2, 'An awesome arsenal blog 0', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 0', 'image 0', '0', '2016-11-16 01:03:01', 1, '2016-10-22 22:28:54', '2016-11-16 01:03:01'),
(2, 1, 'An awesome arsenal blog 1', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 1', 'image 1', '1', '2016-10-22 22:28:54', 1, '2016-10-22 22:28:54', '2016-10-22 22:28:54'),
(3, 2, 'An awesome arsenal blog 2', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 2', 'image 2', '2', '2016-10-22 22:28:54', 2, '2016-10-22 22:28:54', '2016-10-22 22:28:54'),
(4, 3, 'An awesome arsenal blog 3', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 3', 'image 3', '3', '2016-10-22 22:28:54', 3, '2016-10-22 22:28:54', '2016-10-22 22:28:54'),
(5, 4, 'An awesome arsenal blog 4', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 4', 'image 4', '6', '2016-10-23 10:35:28', 4, '2016-10-22 22:28:55', '2016-10-23 10:35:28'),
(6, 5, 'An awesome arsenal blog 5', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 5', 'image 5', '5', '2016-10-22 22:28:55', 5, '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(7, 6, 'An awesome arsenal blog 6', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 6', 'image 6', '10', '2016-10-23 10:35:11', 6, '2016-10-22 22:28:55', '2016-10-23 10:35:11'),
(8, 7, 'An awesome arsenal blog 7', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 7', 'image 7', '19', '2016-10-23 10:31:42', 7, '2016-10-22 22:28:55', '2016-10-23 10:31:42'),
(11, 2, 'Champions League Hangover Costs Us Points', 'The beginning of something great always starts with a <a href="">few steps.</a>  ', 'Admin', 'Desert.jpg', '5', '2016-10-24 21:37:24', 1, '2016-10-24 21:25:59', '2016-10-24 21:37:24');

-- --------------------------------------------------------

--
-- Table structure for table `copy_users`
--

CREATE TABLE `copy_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `copy_users`
--

INSERT INTO `copy_users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nkem', 'kemtin2010@gmail.com', '$2y$10$/w127yZyk0nOMWvLgxPUbutjtmX8Jhhg3/1FVS7Ml27u8jTB2RIkm', 'sYtdJ1EW0loXXVPoG3duo6qnfqnQGj5EDyb93BTmweS9ebBiHUe2Us5ueTWg', '2016-10-23 21:09:04', '2016-11-16 15:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_10_18_194046_create_post_table', 1),
('2016_10_18_205724_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photographs`
--

CREATE TABLE `photographs` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographs`
--

INSERT INTO `photographs` (`id`, `filename`, `type`, `size`, `caption`) VALUES
(4, 'flowers.jpg', 'image/jpeg', 664947, 'Flowers'),
(5, 'wood.jpg', 'image/jpeg', 564389, 'Wood'),
(6, 'bamboo.jpg', 'image/jpeg', 455568, 'Bamboos'),
(7, 'buddhas.jpg', 'image/jpeg', 456234, 'Buddhas'),
(8, 'wall.jpg', 'image/jpeg', 607118, 'Wall'),
(9, 'roof.jpg', 'image/jpeg', 524574, 'Roof'),
(16, 'silkgirl.jpg', 'image/jpeg', 471346, ''),
(17, 'silkgirl.jpg', 'image/jpeg', 471346, ''),
(18, 'silkgirl.jpg', 'image/jpeg', 471346, ''),
(19, 'silkgirl.jpg', 'image/jpeg', 471346, ''),
(20, 'silkgirl.jpg', 'image/jpeg', 471346, ''),
(21, 'donaldJo.jpg', 'image/jpeg', 129841, '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `category` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hits` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `published` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `category`, `title`, `body`, `author`, `image`, `hits`, `added_on`, `published`, `created_at`, `updated_at`) VALUES
(1, 2, 'An awesome arsenal blog 0', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 0', 'redCannon.jpg', '0', '2016-11-19 03:49:28', 1, '2016-10-22 22:28:54', '2016-11-19 03:49:28'),
(2, 1, 'An awesome arsenal blog 1', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 1', 'redCannon.jpg', '1', '1980-01-01 00:21:07', 1, '2016-10-22 22:28:54', '2016-10-22 22:28:54'),
(3, 2, 'An awesome arsenal blog 2', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 2', 'redCannon.jpg', '2', '1980-01-01 00:21:07', 2, '2016-10-22 22:28:54', '2016-10-22 22:28:54'),
(4, 3, 'An awesome arsenal blog 3', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 3', 'redCannon.jpg', '3', '1980-01-01 00:21:07', 3, '2016-10-22 22:28:54', '2016-10-22 22:28:54'),
(5, 4, 'An awesome arsenal blog 4', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 4', 'redCannon.jpg', '6', '1980-01-01 00:21:07', 4, '2016-10-22 22:28:55', '2016-10-23 10:35:28'),
(6, 5, 'An awesome arsenal blog 5', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 5', 'redCannon.jpg', '5', '1980-01-01 00:21:07', 5, '2016-10-22 22:28:55', '2016-10-22 22:28:55'),
(7, 6, 'An awesome arsenal blog 6', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 6', 'redCannon.jpg', '10', '1980-01-01 00:21:07', 6, '2016-10-22 22:28:55', '2016-10-23 10:35:11'),
(8, 7, 'An awesome arsenal blog 7', 'Vivamus interdum diam diam, non faucibus tortor consequat vitae. Proin sit amet augue sed massa pellentesque viverra. Suspendisse iaculis purus eget est pretium aliquam ut sed diam. Nullam non magna lobortis, faucibus erat eu, consequat justo. Suspendisse', 'author 7', 'redCannon.jpg', '19', '1980-01-01 00:21:07', 7, '2016-10-22 22:28:55', '2016-10-23 10:31:42'),
(11, 2, 'Champions League Hangover Costs Us Points', 'The beginning of something great always starts with a <a href="">few steps.</a>  ', 'Admin', 'redCannon.jpg', '5', '1980-01-01 00:21:07', 1, '2016-10-24 21:25:59', '2016-10-24 21:37:24'),
(19, 2, 'donald', 'hits', 'Donald', 'silkgirl.jpg', '1', '2016-12-16 02:22:50', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 2, 'donald', 'HHH', 'Donald', 'donaldJo.jpg', '1', '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nkem', 'kemtin2010@gmail.com', '$2y$10$/w127yZyk0nOMWvLgxPUbutjtmX8Jhhg3/1FVS7Ml27u8jTB2RIkm', 'sYtdJ1EW0loXXVPoG3duo6qnfqnQGj5EDyb93BTmweS9ebBiHUe2Us5ueTWg', '2016-10-23 21:09:04', '2016-11-16 15:57:53');

--
-- Indexes for dumped tables
--

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
  ADD KEY `photograph_id` (`post_id`);

--
-- Indexes for table `copy_categories`
--
ALTER TABLE `copy_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copy_password_resets`
--
ALTER TABLE `copy_password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `copy_posts`
--
ALTER TABLE `copy_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `copy_users`
--
ALTER TABLE `copy_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `photographs`
--
ALTER TABLE `photographs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `copy_categories`
--
ALTER TABLE `copy_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `copy_posts`
--
ALTER TABLE `copy_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `copy_users`
--
ALTER TABLE `copy_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `photographs`
--
ALTER TABLE `photographs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
