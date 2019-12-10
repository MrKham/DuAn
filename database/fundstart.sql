-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2018 at 08:45 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id7923446_fundstart`
--

-- --------------------------------------------------------

--
-- Table structure for table `backers`
--

CREATE TABLE `backers` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount` double(30,4) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `backers`
--

INSERT INTO `backers` (`id`, `project_id`, `name`, `email`, `amount`, `address`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('59e1715cfd154e26b72160f5c25a4105', '49a8124d936c4a17b14f41fab164ba40', 'Phạm Thu Hằng', 'quepaf06@gmail.com', 500000.0000, '34/19/9 Kim Dong', '2018-11-30 19:11:21', '2018-11-30 19:11:21', NULL, NULL),
('afc32e9939b346ca85fd597e4d1c31e6', 'ca0e12f8df1242cbb6232452e7b22d49', 'Tạ Anh', 'aaa@gmail.com', 1400000.0000, 'cau giay', '2018-11-25 22:34:37', '2018-11-25 22:34:37', NULL, NULL),
('db9e6f2b6df44f1f862c8bb827ae398d', 'ca0e12f8df1242cbb6232452e7b22d49', 'Việt Anh', 'anh@gmail.com', 400000.0000, 'cau giay', '2018-11-25 22:17:29', '2018-11-25 22:17:29', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `black_lists`
--

CREATE TABLE `black_lists` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `name` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `image_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `description`, `name`, `image_id`, `updated_by`, `created_by`, `created_at`, `updated_at`) VALUES
('ba3cbead42e54e3f8ace9fdac2816ddb', NULL, 'aaaaaaa', 'Cuộc sống', NULL, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-19 02:38:36', '2018-11-19 02:38:36'),
('e270f1a5204645d7b1f66d2cecfbcc4f', 'ba3cbead42e54e3f8ace9fdac2816ddb', '', 'Công nghệ', NULL, 'daa219be89424aceb7a04a531f793954', 'daa219be89424aceb7a04a531f793954', '2018-11-19 02:39:09', '2018-11-22 16:10:58'),
('02676f0321f44181a1536dd76dcad8fa', NULL, '', 'Giải trí', NULL, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:11:22', '2018-11-22 16:11:22'),
('a1c4e9faf7a04d30984f6f788dde59b9', NULL, '', 'Nông nghiệp', NULL, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:11:44', '2018-11-22 16:11:44'),
('17b611132b104f2596dfb4412e614c9a', NULL, '', 'Phần mềm', NULL, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:11:54', '2018-11-22 16:11:54'),
('4948f994990d4c49808f42d71dc3d505', '02676f0321f44181a1536dd76dcad8fa', '', 'Âm nhạc', NULL, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:13:16', '2018-11-22 16:13:16'),
('6e3490bc80224054b118ebe9d698968b', '02676f0321f44181a1536dd76dcad8fa', '', 'Phim ảnh', NULL, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:13:32', '2018-11-22 16:13:32'),
('cee621dac1dc49b8b82c9ac1d5a8c9c7', '02676f0321f44181a1536dd76dcad8fa', '', 'Sách truyện', NULL, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:13:47', '2018-11-22 16:13:47'),
('d3d727829d6347d6a7948179f1a8bf9b', 'd3d727829d6347d6a7948179f1a8bf9b', 'Các dự án sáng tạo về âm nhạc, âm thanh, thử nghiệm luôn hấp dẫn cộng đồng.', 'Âm nhạc', '7d246b7bff52404bbafcddd58b1f62a4', 'daa219be89424aceb7a04a531f793954', 'daa219be89424aceb7a04a531f793954', '2018-11-30 18:38:07', '2018-12-03 20:45:07'),
('b825fc99add145ef960c7dbbd39f835f', NULL, 'Những sáng tạo về âm nhạc, thể nghiệm luôn hấp dẫn công chúng.', 'Âm nhạc', '63a63d5bd93c4db4ab208a09c0eb85e5', NULL, 'daa219be89424aceb7a04a531f793954', '2018-12-04 18:51:09', '2018-12-04 18:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menu_code` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `type` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar_id` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `target_id` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content`, `target_id`, `target_type`, `updated_by`, `created_by`, `created_at`, `updated_at`) VALUES
('00a016bff9fc49bea2c4e554ea4a4107', 'aaa', 'd87fea5dc10d401fa6e2612a1e59a026', 'App\\Models\\Post', NULL, '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 07:27:39', '2018-03-15 07:27:39'),
('071f6b38c1eb449da674e31bf5278a55', 'eee', 'ab28d4c22cc7495e95526aeab8d88b19', 'App\\Models\\Post', NULL, '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 07:31:05', '2018-03-15 07:31:05'),
('0947275adddd4cc4946860579bc043f9', '323234', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 10:15:46', '2017-01-06 00:12:19'),
('0b37cd6d5a964a74a90c5546ae38cd12', '2', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 10:24:57', '2016-11-15 10:24:57'),
('0c1b84aae237418d8aa459622938b574', 'kkk', '6e3d6c6e40de4e69a9929d4db18f330a', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-23 03:10:59', '2017-03-23 03:10:59'),
('0c8be3d433504adcabcea2bf99d25fd6', 'WOOOOOWWWW', '2e490e987bbe4c9db7fe05f8b6b1c494', 'App\\Models\\Post', NULL, 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:11:21', '2018-03-15 14:11:21'),
('106ec7a8a87b42d2a623b5b052446256', 'والنعم', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '018d7caaaf51453384cc795b6b04769f', '018d7caaaf51453384cc795b6b04769f', '2017-01-09 05:51:37', '2017-01-09 05:51:37'),
('12425ab4f5c843aa84ed1309f3846620', '', '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', '9e16b4f7a0eb4c3bb0410e829c7b42d0', '9e16b4f7a0eb4c3bb0410e829c7b42d0', '2017-01-11 01:35:01', '2017-01-11 01:35:01'),
('12be0ec1f4064fd1a3b5675f9c7dd9c9', 'عفي', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '018d7caaaf51453384cc795b6b04769f', '018d7caaaf51453384cc795b6b04769f', '2017-01-10 04:11:16', '2017-01-10 04:11:16'),
('133c217ba76941a1a885cd772eccbe1e', '', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2017-01-10 02:34:49', '2017-01-10 02:34:50'),
('1489a72a6b184a00b69c4f5c4350e557', 'hi', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'e867ad85b7ec4867b9a62394975fc100', 'e867ad85b7ec4867b9a62394975fc100', '2017-01-04 08:22:02', '2017-01-04 08:22:02'),
('1574cd51ee9849f886f7f58b3f32b637', 'vvvv', '2cc17dc5372c47e0a1185cb7f9e4bca3', 'App\\Models\\Post', NULL, '40468d031e064cc0a34280dcf830bee7', '2017-03-21 05:08:15', '2017-03-21 05:08:15'),
('17eb60938fe44a97b0b840bfcdb04469', '', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-25 00:24:12', '2017-03-25 00:24:12'),
('1ed6b2462f3e4ea2b9873db4af811322', 'kkkkkkk', '986f74a97f544c7f9e8d71976058710b', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-25 00:11:15', '2017-03-25 00:11:15'),
('2055d2f284aa41398331a9dc34cbe20b', 'hhh', '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 01:37:25', '2016-11-17 01:37:25'),
('228003b11af34ef6b1720047dd228aa0', 'Beautiful', '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', NULL, '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 14:02:40', '2018-03-15 14:02:40'),
('231a45aee3254ad18d8cc699a3f6a25c', 'هلا', '6e3d6c6e40de4e69a9929d4db18f330a', 'App\\Models\\Post', '018d7caaaf51453384cc795b6b04769f', '018d7caaaf51453384cc795b6b04769f', '2017-01-06 02:20:47', '2017-01-06 02:20:47'),
('28bdd61f260b46b7ab5d694e7945890a', 'fcc', 'bd4e972c35d4419fb99d8bb816f57042', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-23 22:22:30', '2017-03-23 22:22:30'),
('2eb26bcdb9754fdfb2cabe2bb1d12413', '1', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 10:07:20', '2016-11-15 10:07:20'),
('2f48f9de66694673bba9b795c1a8eaff', '', '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', '9e16b4f7a0eb4c3bb0410e829c7b42d0', '9e16b4f7a0eb4c3bb0410e829c7b42d0', '2017-01-11 01:35:03', '2017-01-11 01:35:03'),
('2f9a0ef013a24879bb60fb51160739ab', 'gggg', 'bd4e972c35d4419fb99d8bb816f57042', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-23 22:22:58', '2017-03-23 22:22:58'),
('316034f9ab2742bf9d1527b8c80fb54a', 'huhihihhhju', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-15 10:10:50', '2016-11-15 10:10:50'),
('37788efb8b1146a198fdd5f9c4ca803d', 'ping', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2017-01-03 00:01:39', '2017-01-03 00:01:39'),
('3829b238514544d98792387ae8f69f48', 'nhjdnsndnd dnd dnd dnd dnd dnd nđ d. dnđ d d ndx. đ dnd. đ d nd d dnd djd d d dbd bđ h n n n.  n h h k k. j h h', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'a157064befe8409d95fcd5e5ece34cd0', 'a157064befe8409d95fcd5e5ece34cd0', '2017-01-11 03:21:52', '2017-01-11 03:21:52'),
('3c2f9759b2174fab91cd8da1050c5666', 'OK', '2e490e987bbe4c9db7fe05f8b6b1c494', 'App\\Models\\Post', NULL, '65bdfe72645a45b4a126e2d3399b4d6b', '2018-03-15 14:15:57', '2018-03-15 14:15:57'),
('3d5ed04ea88c4c71bf488217fbd710d6', 'gghhhhhhh', 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 02:44:26', '2016-11-17 02:44:26'),
('407b85b04a9046bfb3afefde83a40e2f', '', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-12-13 00:55:23', '2016-12-13 00:55:23'),
('40a25a6873a944b8affe3517c9a6fb7a', 'check DB', 'bd4e972c35d4419fb99d8bb816f57042', 'App\\Models\\Post', NULL, '40468d031e064cc0a34280dcf830bee7', '2017-03-22 00:15:45', '2017-03-22 00:15:45'),
('4362b28c68874218af9178ed99121261', 'test commenthf d d d d xhd djd xhd hx xjd dbx xnx xnx xjx xnx xnx xjd djd jd x d xj ', '6e3d6c6e40de4e69a9929d4db18f330a', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 01:34:32', '2016-11-17 01:34:32'),
('43d4861ba26441e88a6c08f65af33363', '', '986f74a97f544c7f9e8d71976058710b', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-25 01:01:57', '2017-03-25 01:01:57'),
('44b096e3a54048a2a39d6b7db01a67e9', 'nhjdnsndnd dnd dnd dnd dnd dnd nđ d. dnđ d d ndx. đ dnd. đ d nd d dnd djd d d dbd bđ h n n n.  n h h k k. j h h', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'a157064befe8409d95fcd5e5ece34cd0', 'a157064befe8409d95fcd5e5ece34cd0', '2017-01-11 03:21:35', '2017-01-11 03:21:35'),
('47f21e3b2a0d4b61be7195c51b8a5cca', '', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '5b5f4b8925b245f99a3e4d17939d6611', '5b5f4b8925b245f99a3e4d17939d6611', '2017-01-11 00:19:35', '2017-01-11 00:19:35'),
('48538a7b85504cb4876cc096f495920d', '', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-19 11:01:11', '2016-11-19 11:01:11'),
('4a9640aa6c8d4203b94acc2554b0ae9f', 'gghhhhhhh', 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 02:44:18', '2016-11-17 02:44:18'),
('5164b5903f6849fdb7c5a24666361db7', 'the game has a great idea to check on my new iphone but if i can tell if he is my father and stepmother are there i is an old lord that can tell that it can only make', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2017-01-10 01:47:43', '2017-01-10 01:47:43'),
('55f1f23e9d4a43ae94bac06e2b218682', 'عاشوا', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '018d7caaaf51453384cc795b6b04769f', '018d7caaaf51453384cc795b6b04769f', '2017-01-06 01:02:58', '2017-01-06 01:02:58'),
('5675ab22afb644998cdc92d41ef16b08', 'nhjdnsndnd dnd dnd dnd dnd dnd nđ d. dnđ d d ndx. đ dnd. đ d nd d dnd djd d d dbd bđ', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'a157064befe8409d95fcd5e5ece34cd0', 'a157064befe8409d95fcd5e5ece34cd0', '2017-01-11 03:21:22', '2017-01-11 03:21:22'),
('57a00e09268c49f5bffa51823fc9cf4f', 'jjjjj', '986f74a97f544c7f9e8d71976058710b', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-25 00:13:08', '2017-03-25 00:13:08'),
('57a4c7a8abcd42a8bfcddff996b27112', 'dhdhdbdb', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-15 10:41:14', '2016-11-15 10:41:14'),
('5a19c38ce82c419495160c6ea539c6f5', '', '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 03:09:23', '2016-11-17 03:09:23'),
('5b746edc8b864dcfbcd313a7962466ba', 'gghhhhhhh', 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 02:44:27', '2016-11-17 02:44:27'),
('5ba1eb79a81e4af185bdc0ecd1c82bf4', 'هلا', '6e3d6c6e40de4e69a9929d4db18f330a', 'App\\Models\\Post', '018d7caaaf51453384cc795b6b04769f', '018d7caaaf51453384cc795b6b04769f', '2017-01-06 02:20:46', '2017-01-06 02:20:46'),
('5e96bc7e7bf04b938248629e2ef0c501', 'Amazing', '2e490e987bbe4c9db7fe05f8b6b1c494', 'App\\Models\\Post', NULL, '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 14:03:11', '2018-03-15 14:03:11'),
('5f98d381f4ee48fab396a8066404fae6', 'OK', 'd1613f7ba177493f88048617b1f2a356', 'App\\Models\\Post', NULL, '65bdfe72645a45b4a126e2d3399b4d6b', '2018-03-15 14:16:19', '2018-03-15 14:16:19'),
('60d276a3236442a98115b728cb9b5f82', '32', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 09:52:59', '2016-11-15 09:52:59'),
('60e60fcb456a425faba38b0eb294b50a', 'test double', '986f74a97f544c7f9e8d71976058710b', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-25 00:10:53', '2017-03-25 00:10:53'),
('61db71593e194f4e9853d9c70c913c67', '1', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 10:06:22', '2016-11-15 10:06:22'),
('623259da093a45febeecee7a28c20f54', 'هلو', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'e867ad85b7ec4867b9a62394975fc100', 'e867ad85b7ec4867b9a62394975fc100', '2017-01-04 08:22:23', '2017-01-04 08:22:23'),
('644df0241b4046febe020965c37003df', 'vvvv', '2cc17dc5372c47e0a1185cb7f9e4bca3', 'App\\Models\\Post', NULL, '40468d031e064cc0a34280dcf830bee7', '2017-03-21 05:08:15', '2017-03-21 05:08:15'),
('67067fc644a940ff838fea7d8518ccaf', 'test dữ liệu cuối cùng', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2017-01-06 00:24:52', '2017-01-06 00:24:52'),
('699d248a4e7b4eb997efbd981f490eb2', '', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 20:03:31', '2016-11-17 20:03:31'),
('69d0f173cf4e4e37b2343d210373bfba', '231', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2016-11-15 08:04:24', '2016-11-15 08:04:24'),
('6a35634cd1c34e3080432f0a7737f561', 'ahihi', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-12-20 20:52:28', '2016-12-20 20:52:28'),
('6caeb43866ec4c46af4e72b0e995df37', 'gghhhhhhhj', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-16 02:54:38', '2016-11-16 02:54:39'),
('6fdc4650a0cd4145b1d6c28c68e84a1e', 'hhh', '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 01:37:13', '2016-11-17 01:37:13'),
('6ffd0e8b2d6143408e8738bd305b980c', 'vd', 'ab28d4c22cc7495e95526aeab8d88b19', 'App\\Models\\Post', NULL, '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 07:31:13', '2018-03-15 07:31:13'),
('718ab56f3fd8449aa93bb3cb007bcfb4', '', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-19 11:01:24', '2016-11-19 11:01:24'),
('71fa031ac43246fca84f67daa1b5e5be', 'Good', '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', NULL, '65bdfe72645a45b4a126e2d3399b4d6b', '2018-03-15 14:13:49', '2018-03-15 14:13:49'),
('740cff3d6825473d8d3c097975826c4e', 'test comment', '6e3d6c6e40de4e69a9929d4db18f330a', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 01:32:24', '2016-11-17 01:32:24'),
('74c0ad762b9a44a6bc5c6879aee35a23', '\r\n', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', NULL, '40468d031e064cc0a34280dcf830bee7', '2017-03-21 04:40:53', '2017-03-21 04:40:53'),
('7840a9fa1b194c4da230bdc4e3d1d106', '32', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 10:25:03', '2016-11-15 10:25:03'),
('79d54f8bf6214783b1b641b5a93cb215', '32', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 09:54:09', '2016-11-15 09:54:09'),
('7a5279f1eda746e4bad8915f08d1c5f3', 'gghhhhhhh', 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 02:44:27', '2016-11-17 02:44:27'),
('7d1e924144274a96bf30967d4c7a6beb', 'Hi', '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-02-20 00:11:43', '2017-02-20 00:11:43'),
('802c6135b84d47a3a3dbcd272e055ad3', '', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-29 23:56:39', '2016-11-29 23:56:39'),
('82c02d6ba123449dab144598ca84e351', 'hhh', '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 01:37:19', '2016-11-17 01:37:19'),
('8380d0ecb26849659e65e61bde2c2e17', 'huhihihhhjuhjjbvfghhgvfdthhhvf', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-15 10:11:24', '2016-11-15 10:11:24'),
('84bf71b7d87647ffbeea1766214bbde7', 'gghhhhhhh', 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 02:44:23', '2016-11-17 02:44:24'),
('87d49346e5c140f4af134d5e331de3c6', 'ffff', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-03-21 21:41:12', '2017-03-21 21:41:12'),
('87e3ac2940dd43f2a6c6e42344ac93d6', 'bjbjx k dk bi don\'t let it move the world and let the new year come and go and check the new', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2017-01-10 01:47:05', '2017-01-10 01:47:05'),
('87e5c5ec57664abb86f891ec1979969e', '', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2017-01-10 02:34:42', '2017-01-10 02:34:42'),
('89c1c18c639748c588cc4fc58f00d85a', NULL, '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2016-11-15 08:03:15', '2016-11-15 08:03:15'),
('8bd899d0e4df481791f71bb0176e03d7', '32', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 09:54:06', '2016-11-15 09:54:06'),
('911269a447ca4e748dafb11caf23da5c', '', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-03-21 21:41:27', '2017-03-21 21:41:27'),
('92b99cd5af90491db7862682348a4117', 'vvvv', '2cc17dc5372c47e0a1185cb7f9e4bca3', 'App\\Models\\Post', NULL, '40468d031e064cc0a34280dcf830bee7', '2017-03-21 05:08:14', '2017-03-21 05:08:14'),
('94f8564ed2b944c4a4dd3a180b840a02', 'basd231', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 10:25:19', '2016-11-15 10:25:19'),
('968b74c5874244978eb89ca2587cd566', NULL, '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-15 07:25:07', '2016-11-15 07:25:08'),
('9875d7b3489b42cca0231d83b25ed772', 'I\'m just going back home for the weekend to go back', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '5b5f4b8925b245f99a3e4d17939d6611', '5b5f4b8925b245f99a3e4d17939d6611', '2017-01-11 03:29:54', '2017-01-11 03:29:54'),
('995f1a7f12534c15904cca68fb0658ff', '32', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 09:53:02', '2016-11-15 09:53:02'),
('99aaca888a1a42d096102c37845d2037', 'test commenthf d d d d xhd djd xhd hx xjd dbx xnx xnx xjx xnx xnx xjd djd jd x d xj ', '6e3d6c6e40de4e69a9929d4db18f330a', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 01:34:32', '2016-11-17 01:34:32'),
('9aba477b553c4ed58fc3ea3aaa341c21', 'fhfhfhfjfjffbfjdjdjdjfjfjfhfhfj', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-12-20 20:52:04', '2016-12-20 20:52:04'),
('9ae39e594cb0476e87c3a4064af52ac9', 'ddd', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '5b5f4b8925b245f99a3e4d17939d6611', '5b5f4b8925b245f99a3e4d17939d6611', '2017-01-11 00:19:34', '2017-01-11 00:19:34'),
('9f6841edd94b4c668a2a9023bbf7de21', 'ok', 'bd4e972c35d4419fb99d8bb816f57042', 'App\\Models\\Post', NULL, '40468d031e064cc0a34280dcf830bee7', '2017-03-21 06:05:45', '2017-03-21 06:05:45'),
('a3a0ebd961ce469c81b9b755ac774cc8', 'WOW', '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', NULL, '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 14:02:13', '2018-03-15 14:02:13'),
('a41ae9ac6de84edfb80cd5e7fb2864c8', '4234234235', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 10:25:27', '2016-11-15 10:25:27'),
('a8af00422d18449eb79ed9b242b0b8dd', 'fffff', '2cc17dc5372c47e0a1185cb7f9e4bca3', 'App\\Models\\Post', NULL, '40468d031e064cc0a34280dcf830bee7', '2017-03-21 05:04:05', '2017-03-21 05:04:05'),
('aa407025f4494ea9afd636e3a18e9d84', 'uuh asdf asdfasd', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '5b5f4b8925b245f99a3e4d17939d6611', '5b5f4b8925b245f99a3e4d17939d6611', '2017-01-11 00:19:29', '2017-01-11 00:19:29'),
('b18f4a5b257e4fa28bbe18318ab77969', 'typical night at work and I\'m just going out with you guys and I\'m just gonna go back home for the next few days lol I\'m so excited to be the first one I know it\'s not a bad idea but I\'m just not going back home tomorrow night and I\'m just gonna go back home to my mom to be home with my sister on my birthday today so I\'m not gonna be home yet again she just got home and I\'m just going back home for the weekend to get home and get a job and go back home and get my life together for a week now I\'m so proud I got my new iPhone app to work on it all together for a long life to get the hang out there are the ones I love the best of all I know that the game will play with you on my own when you\'re', '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', '9e16b4f7a0eb4c3bb0410e829c7b42d0', '9e16b4f7a0eb4c3bb0410e829c7b42d0', '2017-01-11 01:33:57', '2017-01-11 01:33:57'),
('b434e791412b42b581b2bc668cb4fc5c', NULL, '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-15 07:25:28', '2016-11-15 07:25:28'),
('b8eaff9f3ee541ffb10ea449e7fcecc2', 'hhh', '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 01:37:02', '2016-11-17 01:37:02'),
('b8f04e044fad4e5499d7b3a6f14ed60c', 'aaa', 'cc2c3c9f8f1a4cc9bb0dfaabe795e20b', 'App\\Models\\Post', NULL, 'a1faca7fbf5c4a918d1c4ca8fc444c69', '2017-03-23 06:22:25', '2017-03-23 06:22:25'),
('ba5efee3923841d2ada4e8a54503a7fb', 'hello', 'd87fea5dc10d401fa6e2612a1e59a026', 'App\\Models\\Post', NULL, '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 07:30:38', '2018-03-15 07:30:38'),
('c0d2d41f39cc4ee1b73e62508fddb69b', '', 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-12-20 20:49:35', '2016-12-20 20:49:35'),
('c1afa098f4b7468492fde27f5b889a2a', 'aaaa', 'cc2c3c9f8f1a4cc9bb0dfaabe795e20b', 'App\\Models\\Post', NULL, 'a1faca7fbf5c4a918d1c4ca8fc444c69', '2017-03-23 06:22:17', '2017-03-23 06:22:17'),
('c48d10f1a1c34381b99a36845d05800f', 'gghhhhhhh', 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 02:44:26', '2016-11-17 02:44:26'),
('cabca48eb4484a67a04d384e849e5cc8', 'gghhhhhhh', 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 02:44:21', '2016-11-17 02:44:21'),
('cb9c3ab3084e429fbb25620d7ae85ae3', 'OK OK', '45c0c912a94b40ebb34c1d29773cfca4', 'App\\Models\\Post', NULL, 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:11:43', '2018-03-15 14:11:43'),
('d0f181a55cad4c74809460115b13581c', '', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2017-01-10 02:34:42', '2017-01-10 02:34:43'),
('da1c1c61990040c28d4a62bc4ad0f885', '32', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 09:52:58', '2016-11-15 09:52:58'),
('ddc0c124299942f7af13740cb30362b7', 'hege', 'ab28d4c22cc7495e95526aeab8d88b19', 'App\\Models\\Post', NULL, '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 07:30:59', '2018-03-15 07:30:59'),
('de621d877aac4c7880cdb0d6986ef9ff', 'vvvv', '2cc17dc5372c47e0a1185cb7f9e4bca3', 'App\\Models\\Post', NULL, '40468d031e064cc0a34280dcf830bee7', '2017-03-21 05:08:14', '2017-03-21 05:08:14'),
('df336c39a1f24a3ba69b1c2c0b63cff4', '', 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-17 03:25:14', '2016-11-17 03:25:14'),
('e4776920ba934f8a9834a456e5b5b18b', '1', '2cc17dc5372c47e0a1185cb7f9e4bca3', 'App\\Models\\Post', NULL, '40468d031e064cc0a34280dcf830bee7', '2017-03-21 04:54:41', '2017-03-21 04:54:41'),
('e50e0ba7a8554e009d4d90aa5fb29661', '32', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 09:54:20', '2016-11-15 09:54:20'),
('eb031131d4a6419ea123ebbd7d25bbc0', '', '986f74a97f544c7f9e8d71976058710b', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-25 01:01:21', '2017-03-25 01:01:21'),
('ebb85798c3624c63867cb30d2ea7182b', 'Test 21/3\r\n', '2cc17dc5372c47e0a1185cb7f9e4bca3', 'App\\Models\\Post', NULL, '40468d031e064cc0a34280dcf830bee7', '2017-03-21 04:59:09', '2017-03-21 04:59:09'),
('efc97f834b8548c08f349eb6ee532a28', 'âsass', '474d396db73c4e68aa3941c09509c13f', 'App\\Models\\Post', NULL, '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 07:31:33', '2018-03-15 07:31:33'),
('f0dcac284b7b40c8a3ac11d2d8625ca2', 'Yep', '3f1e4124ac2b4adf93b9ea6bf0eed5dc', 'App\\Models\\Post', NULL, 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:10:56', '2018-03-15 14:10:56'),
('f4d2ff2c536b4f818363c1fbfbbf5c6d', 'vdsbvbsdajkfvdsjbvjksdvjkbvsk', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-11-15 07:27:48', '2016-11-15 07:27:48'),
('f4e002a754314cf5b2387550098297e4', 'I like it', '3f1e4124ac2b4adf93b9ea6bf0eed5dc', 'App\\Models\\Post', NULL, '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 14:03:38', '2018-03-15 14:03:38'),
('f51eea465bd44c279a94ed19aa8b818e', '32', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-15 09:54:09', '2016-11-15 09:54:09'),
('f5d72886e03a4fceab25fd5df191b5db', 'hh', '986f74a97f544c7f9e8d71976058710b', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-25 00:12:23', '2017-03-25 00:12:23'),
('f6af10724a99469bacfaf22202a2701e', 'v1', 'cc2c3c9f8f1a4cc9bb0dfaabe795e20b', 'App\\Models\\Post', NULL, 'a1faca7fbf5c4a918d1c4ca8fc444c69', '2017-03-23 06:22:30', '2017-03-23 06:22:30'),
('f78173aaa2164b0f8948b99ebe66df0b', 'Woowwwwww', '3f1e4124ac2b4adf93b9ea6bf0eed5dc', 'App\\Models\\Post', NULL, 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:10:25', '2018-03-15 14:10:25'),
('fb98c83991514f1b8ccebb7a2837fa90', '', '6e3d6c6e40de4e69a9929d4db18f330a', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-25 00:24:47', '2017-03-25 00:24:47'),
('fcb7a0daa5fa4e109d742fcf1ee06559', '', 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-12-20 20:49:15', '2016-12-20 20:49:15'),
('fd52191e0ab94d1f84a4d3d26b06cada', '231', '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2016-11-15 08:04:32', '2016-11-15 08:04:32'),
('fec02b3f6adb493da847f8b78a16a11a', 'ttt', 'bd4e972c35d4419fb99d8bb816f57042', 'App\\Models\\Post', NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-24 04:15:07', '2017-03-24 04:15:07'),
('826bf88b02be4e7bb3e27d6ea98644ed', 'hay', '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', 'fbd229ca07914bfe906107652a543c1f', 'fbd229ca07914bfe906107652a543c1f', '2018-03-28 19:01:51', '2018-03-28 19:01:51'),
('148fe386d00b486e821aaa04341be024', 'ok', '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', 'fbd229ca07914bfe906107652a543c1f', 'fbd229ca07914bfe906107652a543c1f', '2018-03-28 19:02:05', '2018-03-28 19:02:05'),
('8f8c65f45a074517bff3c796621ff003', 'ok', '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', 'fbd229ca07914bfe906107652a543c1f', 'fbd229ca07914bfe906107652a543c1f', '2018-05-06 20:02:31', '2018-05-06 20:02:31'),
('a3b570a1e0d24763988b050124ced651', 'gggg', '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', 'cf5700ae4de04f7ca978754201e9cefe', 'cf5700ae4de04f7ca978754201e9cefe', '2018-05-25 11:26:31', '2018-05-25 11:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `target_id` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `target_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `content`, `target_id`, `target_type`, `updated_by`, `created_by`, `created_at`, `updated_at`) VALUES
('04e79510ee37472fb7b5e7d649390448', NULL, '474d396db73c4e68aa3941c09509c13f', 'App\\Models\\Post', '23ac268bfcfd49e486ed02d34646ff8f', '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 07:27:14', '2018-03-15 07:27:14'),
('0922d556b33b49fdb7613f856972d84d', NULL, '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', '65bdfe72645a45b4a126e2d3399b4d6b', '65bdfe72645a45b4a126e2d3399b4d6b', '2018-03-15 14:13:25', '2018-03-15 14:13:26'),
('118354f1012841edaef39a56daeddf22', NULL, '3f1e4124ac2b4adf93b9ea6bf0eed5dc', 'App\\Models\\Post', '65bdfe72645a45b4a126e2d3399b4d6b', '65bdfe72645a45b4a126e2d3399b4d6b', '2018-03-15 14:13:29', '2018-03-15 14:13:29'),
('1a416d8bb0154927979f8fbde0d024e8', NULL, 'cc2c3c9f8f1a4cc9bb0dfaabe795e20b', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2017-03-22 00:14:27', '2017-03-22 00:14:27'),
('1c777a84aacd407a81b017423b6d5e4b', NULL, '2cc17dc5372c47e0a1185cb7f9e4bca3', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2017-03-21 04:44:53', '2017-03-21 04:44:53'),
('21f1cc66bc4b4b55b27b40b8d6472e41', NULL, '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'de00d6c8ba924c49a37ac4e35c8307c0', 'de00d6c8ba924c49a37ac4e35c8307c0', '2016-12-13 07:32:37', '2016-12-13 07:32:38'),
('301c39e9ab244d1486537ebefe7145e7', NULL, '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '079376bef12c4d8f975bdeded7b98332', '079376bef12c4d8f975bdeded7b98332', '2016-11-27 06:07:51', '2016-11-27 06:07:51'),
('374516437ee1450ab94042b4b556984d', NULL, 'd1613f7ba177493f88048617b1f2a356', 'App\\Models\\Post', '65bdfe72645a45b4a126e2d3399b4d6b', '65bdfe72645a45b4a126e2d3399b4d6b', '2018-03-15 14:13:32', '2018-03-15 14:13:32'),
('3d5f3a564d1e489fb0975bdc2152ebb8', NULL, '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'adfcafb5d2424bfd84b1ce47e96c0dcc', 'adfcafb5d2424bfd84b1ce47e96c0dcc', '2016-12-26 03:20:16', '2016-12-26 03:20:16'),
('478b2a697c124e3a808504ba55375c37', NULL, '2e490e987bbe4c9db7fe05f8b6b1c494', 'App\\Models\\Post', 'd8869b9d12f94609a8e5fc9e47c9c883', 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:09:42', '2018-03-15 14:09:42'),
('4d059b98533943819f7e58aad3f07227', NULL, '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '386813bc4f4f4adf897c65c8c72ab78c', '386813bc4f4f4adf897c65c8c72ab78c', '2016-12-22 01:30:36', '2016-12-22 01:30:36'),
('4e05a7c1cc0a461aa963ef3ba3646492', NULL, '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', 'de00d6c8ba924c49a37ac4e35c8307c0', 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 10:37:45', '2018-03-15 10:37:45'),
('52c82fb05c0b47dda9599bf5f5455993', NULL, '26e2f66bda254568a4fb9a3c969d39ef', 'App\\Models\\Post', '65bdfe72645a45b4a126e2d3399b4d6b', '65bdfe72645a45b4a126e2d3399b4d6b', '2018-03-15 14:13:34', '2018-03-15 14:13:34'),
('678fad57363e4b449509ccc64b5657e1', NULL, '1d1c49884c0c4907b99f9deb093ceb5a', 'App\\Models\\Post', 'd8869b9d12f94609a8e5fc9e47c9c883', 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:09:52', '2018-03-15 14:09:52'),
('6c9762d9134e4668b8e58686df3ac9a0', NULL, 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', '018d7caaaf51453384cc795b6b04769f', '018d7caaaf51453384cc795b6b04769f', '2017-01-07 11:50:50', '2017-01-07 11:50:50'),
('6d49c826b7fc4823865fc5176e6bf974', NULL, '3f1e4124ac2b4adf93b9ea6bf0eed5dc', 'App\\Models\\Post', '23ac268bfcfd49e486ed02d34646ff8f', '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 14:03:30', '2018-03-15 14:03:30'),
('6f4df485347a4fa896be3e0f12f127a7', NULL, '6e3d6c6e40de4e69a9929d4db18f330a', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2017-01-09 00:57:22', '2017-01-09 00:57:22'),
('756aed653b084efb88fc384bae748087', NULL, '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', 'e867ad85b7ec4867b9a62394975fc100', 'e867ad85b7ec4867b9a62394975fc100', '2016-12-26 09:13:24', '2016-12-26 09:13:24'),
('78bdbbb18501439987a3f789210f7629', NULL, '6e3d6c6e40de4e69a9929d4db18f330a', 'App\\Models\\Post', '018d7caaaf51453384cc795b6b04769f', '018d7caaaf51453384cc795b6b04769f', '2016-11-25 01:18:27', '2016-11-25 01:18:27'),
('958b51c998504547b4c0327e1fceb03d', NULL, '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', '018d7caaaf51453384cc795b6b04769f', '018d7caaaf51453384cc795b6b04769f', '2016-11-25 00:34:41', '2016-11-25 00:34:41'),
('98d337ec99884dc087aa5595054f3911', NULL, 'bd4e972c35d4419fb99d8bb816f57042', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2017-03-21 06:05:30', '2017-03-21 06:05:31'),
('9e343ca8d62b4aa6807b2070bee5f852', NULL, '2e490e987bbe4c9db7fe05f8b6b1c494', 'App\\Models\\Post', '65bdfe72645a45b4a126e2d3399b4d6b', '65bdfe72645a45b4a126e2d3399b4d6b', '2018-03-15 14:13:26', '2018-03-15 14:13:27'),
('9eae379cf92d4778bdfa10e33ca1a2aa', NULL, '1d1c49884c0c4907b99f9deb093ceb5a', 'App\\Models\\Post', '23ac268bfcfd49e486ed02d34646ff8f', '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 14:01:29', '2018-03-15 14:01:30'),
('a290c98c66444a5185ec3e07da36c4a0', NULL, 'ab28d4c22cc7495e95526aeab8d88b19', 'App\\Models\\Post', '23ac268bfcfd49e486ed02d34646ff8f', '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 07:30:49', '2018-03-15 07:30:49'),
('a5d1945b26df4e36938112ec98143b5e', NULL, '6e3d6c6e40de4e69a9929d4db18f330a', 'App\\Models\\Post', '079376bef12c4d8f975bdeded7b98332', '079376bef12c4d8f975bdeded7b98332', '2016-11-30 03:49:27', '2016-11-30 03:49:27'),
('ab9934824afa4cdb90efad159a42a617', NULL, '986f74a97f544c7f9e8d71976058710b', 'App\\Models\\Post', 'd207d47f235e4edd9169db025931acce', 'd207d47f235e4edd9169db025931acce', '2017-04-08 03:31:49', '2017-04-08 03:31:49'),
('abe681a121ea4d47bf76fd7117d227f9', NULL, '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', '386813bc4f4f4adf897c65c8c72ab78c', '386813bc4f4f4adf897c65c8c72ab78c', '2016-12-22 01:30:52', '2016-12-22 01:30:52'),
('af1679f5e37748e382d20c53d92e7239', NULL, '59f376e524fb4337a4e4329256ba55c6', 'App\\Models\\Post', 'e867ad85b7ec4867b9a62394975fc100', 'e867ad85b7ec4867b9a62394975fc100', '2016-12-25 23:28:16', '2016-12-25 23:28:16'),
('bb6095d49bbb4ec3ac564cc2d3368c69', NULL, '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', 'd8869b9d12f94609a8e5fc9e47c9c883', 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:09:43', '2018-03-15 14:09:43'),
('bbf52e2755434a448444959b12acdedc', NULL, '26e2f66bda254568a4fb9a3c969d39ef', 'App\\Models\\Post', 'd8869b9d12f94609a8e5fc9e47c9c883', 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:09:50', '2018-03-15 14:09:50'),
('cc0a731ed05a429cb278b929977004db', NULL, '6e3d6c6e40de4e69a9929d4db18f330a', 'App\\Models\\Post', '386813bc4f4f4adf897c65c8c72ab78c', '386813bc4f4f4adf897c65c8c72ab78c', '2016-12-22 01:30:41', '2016-12-22 01:30:41'),
('d24724318a38425185d373dbf4c43804', NULL, '48f7c4bc73e24dfcb71c39feb5b02822', 'App\\Models\\Post', '9fa59eaa6b994005a637a30608cf5f24', '9fa59eaa6b994005a637a30608cf5f24', '2016-11-16 02:23:59', '2016-11-16 02:23:59'),
('d87edd031f284ff8b1cd42b7ecac27a5', NULL, '45c0c912a94b40ebb34c1d29773cfca4', 'App\\Models\\Post', '23ac268bfcfd49e486ed02d34646ff8f', '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 14:01:25', '2018-03-15 14:01:25'),
('e169ecf78e50478bb6e9f99f2b9457b5', NULL, '45c0c912a94b40ebb34c1d29773cfca4', 'App\\Models\\Post', 'd8869b9d12f94609a8e5fc9e47c9c883', 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:09:45', '2018-03-15 14:09:45'),
('e854e0f7f29a463ca99040bac613b8b9', NULL, '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', '23ac268bfcfd49e486ed02d34646ff8f', '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 14:01:19', '2018-03-15 14:01:19'),
('e8786f3c675c43138ceee8b755f225e8', NULL, '3f1e4124ac2b4adf93b9ea6bf0eed5dc', 'App\\Models\\Post', 'd8869b9d12f94609a8e5fc9e47c9c883', 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:09:46', '2018-03-15 14:09:46'),
('ee62abdfd7be4c04b6eba477ec8b6c27', NULL, 'f0c13dcc63194ac8a8430e68c33b01fe', 'App\\Models\\Post', '40468d031e064cc0a34280dcf830bee7', '40468d031e064cc0a34280dcf830bee7', '2016-12-02 01:47:15', '2016-12-02 01:47:15'),
('f07a08620aba46f98b97480e330a3d04', NULL, 'bdc2729176f54d3e9eadb370200461a4', 'App\\Models\\Post', '23ac268bfcfd49e486ed02d34646ff8f', '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 14:01:28', '2018-03-15 14:01:28'),
('f37c365a1eae465ca47060194f96d53f', NULL, 'd87fea5dc10d401fa6e2612a1e59a026', 'App\\Models\\Post', '23ac268bfcfd49e486ed02d34646ff8f', '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 07:27:11', '2018-03-15 07:27:11'),
('fec1a2863f704af0b6c82d01b2f13fd6', NULL, 'd1613f7ba177493f88048617b1f2a356', 'App\\Models\\Post', 'd8869b9d12f94609a8e5fc9e47c9c883', 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:09:48', '2018-03-15 14:09:48'),
('fd9274f4cec44d4fa08977193ff8f6e2', NULL, '0cf16c66bc014ad9b2253f2a0a5b7eef', 'App\\Models\\Post', 'fbd229ca07914bfe906107652a543c1f', 'fbd229ca07914bfe906107652a543c1f', '2018-03-28 19:02:12', '2018-03-28 19:02:12'),
('0cd3410a09a04385b5c176001e686ad7', NULL, '2e490e987bbe4c9db7fe05f8b6b1c494', 'App\\Models\\Post', 'de00d6c8ba924c49a37ac4e35c8307c0', 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:26:02', '2018-04-03 16:26:02'),
('f2e0b0d45fae4fd8a51840193c4d805d', NULL, '1d1c49884c0c4907b99f9deb093ceb5a', 'App\\Models\\Post', 'de00d6c8ba924c49a37ac4e35c8307c0', 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:26:14', '2018-04-03 16:26:14'),
('08835e0763a04f63bd73b2433bdefd45', NULL, '26e2f66bda254568a4fb9a3c969d39ef', 'App\\Models\\Post', 'de00d6c8ba924c49a37ac4e35c8307c0', 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:26:14', '2018-04-03 16:26:14');

-- --------------------------------------------------------

--
-- Table structure for table `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ltm_translations`
--

INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 0, 'ar', 'auth', 'login.needanaccount', NULL, '2017-02-13 23:38:18', '2017-02-13 23:38:18'),
(2, 0, 'en', 'auth', 'login.info.tis_info.name', NULL, '2017-02-13 23:38:18', '2017-02-13 23:38:18'),
(3, 0, 'en', 'auth', 'login.info.tis_info.description', NULL, '2017-02-13 23:38:18', '2017-02-13 23:38:18'),
(4, 0, 'en', 'auth', 'login.info.tis_info.link1', NULL, '2017-02-13 23:38:18', '2017-02-13 23:38:18'),
(5, 0, 'en', 'auth', 'login.info.tis_info.link2', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(6, 0, 'en', 'auth', 'login.info.tis_info.info1.text', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(7, 0, 'en', 'auth', 'login.info.tis_info.info1.description', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(8, 0, 'en', 'auth', 'login.info.tis_info.info2.text', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(9, 0, 'en', 'auth', 'login.info.tis_info.info2.description', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(10, 0, 'en', 'auth', 'login.login_box.title', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(11, 0, 'en', 'auth', 'login.login_box.email', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(12, 0, 'en', 'auth', 'login.login_box.email_hint', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(13, 0, 'en', 'auth', 'login.login_box.password', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(14, 0, 'en', 'auth', 'login.login_box.password_hint', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(15, 0, 'en', 'auth', 'login.login_box.forgot_password', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(16, 0, 'en', 'auth', 'login.login_box.remember_me', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(17, 0, 'en', 'auth', 'login.login_box.login_button', NULL, '2017-02-13 23:38:19', '2017-02-13 23:38:19'),
(18, 0, 'en', 'header', 'signout', NULL, '2017-02-13 23:38:28', '2017-02-13 23:38:28'),
(19, 0, 'en', 'header', 'signout_text', NULL, '2017-02-13 23:38:28', '2017-02-13 23:38:28'),
(20, 0, 'en', 'footer', 'system', NULL, '2017-02-13 23:38:28', '2017-02-13 23:38:28'),
(21, 0, 'en', 'validation', 'custom.password.required', NULL, '2017-02-14 05:19:38', '2017-02-14 05:19:38'),
(22, 0, 'en', 'validation', 'attributes', NULL, '2017-02-14 05:19:38', '2017-02-14 05:19:38'),
(23, 0, 'en', 'validation', 'custom.username.unique', NULL, '2017-02-15 05:12:08', '2017-02-15 05:12:08'),
(24, 0, 'en', 'validation', 'custom.facebook_id.unique', NULL, '2017-02-15 20:30:21', '2017-02-15 20:30:21'),
(25, 0, 'en', 'company', 'create.basicinfo.title', NULL, '2017-02-17 09:42:21', '2017-02-17 09:42:21'),
(26, 0, 'en', 'lbpushcenter', 'notification.list.title', NULL, '2017-02-17 09:44:52', '2017-02-17 09:44:52'),
(27, 0, 'en', 'lbpushcenter', 'notification.list.subtitle', NULL, '2017-02-17 09:44:52', '2017-02-17 09:44:52'),
(28, 0, 'en', 'lbpushcenter', 'notification.id.title', NULL, '2017-02-17 09:44:52', '2017-02-17 09:44:52'),
(29, 0, 'en', 'lbpushcenter', 'notification.device.title', NULL, '2017-02-17 09:44:52', '2017-02-17 09:44:52'),
(30, 0, 'en', 'lbpushcenter', 'notification.title.title', NULL, '2017-02-17 09:44:52', '2017-02-17 09:44:52'),
(31, 0, 'en', 'lbpushcenter', 'notification.message.title', NULL, '2017-02-17 09:44:52', '2017-02-17 09:44:52'),
(32, 0, 'en', 'lbpushcenter', 'notification.status.title', NULL, '2017-02-17 09:44:52', '2017-02-17 09:44:52'),
(33, 0, 'en', 'lbpushcenter', 'notification.device_type.title', NULL, '2017-02-17 09:44:52', '2017-02-17 09:44:52'),
(34, 0, 'en', 'general', 'created_at', NULL, '2017-02-17 09:44:52', '2017-02-17 09:44:52'),
(35, 0, 'en', 'general', 'action', NULL, '2017-02-17 09:44:52', '2017-02-17 09:44:52'),
(36, 0, 'en', 'lbpushcenter', 'device.list.title', NULL, '2017-02-17 09:44:56', '2017-02-17 09:44:56'),
(37, 0, 'en', 'lbpushcenter', 'device.list.subtitle', NULL, '2017-02-17 09:44:56', '2017-02-17 09:44:56'),
(38, 0, 'en', 'lbpushcenter', 'device.id.title', NULL, '2017-02-17 09:44:56', '2017-02-17 09:44:56'),
(39, 0, 'en', 'lbpushcenter', 'device.token.title', NULL, '2017-02-17 09:44:56', '2017-02-17 09:44:56'),
(40, 0, 'en', 'lbpushcenter', 'device.application.title', NULL, '2017-02-17 09:44:56', '2017-02-17 09:44:56'),
(41, 0, 'en', 'lbpushcenter', 'device.type.title', NULL, '2017-02-17 09:44:56', '2017-02-17 09:44:56'),
(42, 0, 'en', 'lbpushcenter', 'device.unread.title', NULL, '2017-02-17 09:44:56', '2017-02-17 09:44:56'),
(43, 0, 'en', 'lbpushcenter', 'device.users.title', NULL, '2017-02-17 09:44:56', '2017-02-17 09:44:56'),
(44, 0, 'en', 'lbpushcenter', 'application_type.list.title', NULL, '2017-02-17 09:45:02', '2017-02-17 09:45:02'),
(45, 0, 'en', 'lbpushcenter', 'application_type.list.subtitle', NULL, '2017-02-17 09:45:02', '2017-02-17 09:45:02'),
(46, 0, 'en', 'lbpushcenter', 'application_type.name.title', NULL, '2017-02-17 09:45:02', '2017-02-17 09:45:02'),
(47, 0, 'en', 'lbpushcenter', 'application_type.description.title', NULL, '2017-02-17 09:45:02', '2017-02-17 09:45:02'),
(48, 0, 'en', 'lbpushcenter', 'application_type.color_class.title', NULL, '2017-02-17 09:45:02', '2017-02-17 09:45:02'),
(49, 0, 'en', 'general', 'add', NULL, '2017-02-17 09:45:02', '2017-02-17 09:45:02'),
(50, 0, 'en', 'lbpushcenter', 'application.list.title', NULL, '2017-02-17 09:45:08', '2017-02-17 09:45:08'),
(51, 0, 'en', 'lbpushcenter', 'application.list.subtitle', NULL, '2017-02-17 09:45:08', '2017-02-17 09:45:08'),
(52, 0, 'en', 'lbpushcenter', 'application.name.title', NULL, '2017-02-17 09:45:08', '2017-02-17 09:45:08'),
(53, 0, 'en', 'lbpushcenter', 'application.description.title', NULL, '2017-02-17 09:45:08', '2017-02-17 09:45:08'),
(54, 0, 'en', 'lbpushcenter', 'application.type.title', NULL, '2017-02-17 09:45:08', '2017-02-17 09:45:08'),
(55, 0, 'en', 'lbpushcenter', 'application.production_mode.title', NULL, '2017-02-17 09:45:08', '2017-02-17 09:45:08'),
(56, 0, 'en', 'general', 'edit', NULL, '2017-02-17 09:45:08', '2017-02-17 09:45:08'),
(57, 0, 'en', 'validation', 'custom.title.required', NULL, '2017-02-20 06:03:56', '2017-02-20 06:03:56'),
(58, 0, 'en', 'validation', 'custom.description.required', NULL, '2017-02-20 06:03:56', '2017-02-20 06:03:56'),
(59, 0, 'en', 'validation', 'custom.price.required', NULL, '2017-02-20 06:03:56', '2017-02-20 06:03:56'),
(60, 0, 'en', 'validation', 'custom.currency.required', NULL, '2017-02-20 06:03:57', '2017-02-20 06:03:57'),
(61, 0, 'en', 'lbpushcenter', 'application_type.create.title', NULL, '2017-02-26 20:57:48', '2017-02-26 20:57:48'),
(62, 0, 'en', 'lbpushcenter', 'application_type.create.subtitle', NULL, '2017-02-26 20:57:48', '2017-02-26 20:57:48'),
(63, 0, 'en', 'lbpushcenter/application_type', 'create.title', NULL, '2017-02-26 20:57:48', '2017-02-26 20:57:48'),
(64, 0, 'en', 'general', 'submit', NULL, '2017-02-26 20:57:48', '2017-02-26 20:57:48'),
(65, 0, 'en', 'general', 'back', NULL, '2017-02-26 20:57:49', '2017-02-26 20:57:49'),
(66, 0, 'en', 'frontend', 'Products', 'Products', '2017-03-16 05:47:37', '2017-03-16 05:47:37'),
(67, 0, 'en', 'frontend', 'Categories', 'Categories', '2017-03-16 05:47:37', '2017-03-16 05:47:37'),
(68, 0, 'en', 'frontend', 'Sale product', 'Sale product', '2017-03-16 05:47:37', '2017-03-16 05:47:37'),
(69, 0, 'en', 'frontend', 'Login', 'Login', '2017-03-16 05:47:37', '2017-03-16 05:47:37'),
(70, 0, 'en', 'frontend', 'Contact us', 'Contact us', '2017-03-16 05:47:38', '2017-03-16 05:47:38'),
(71, 0, 'en', 'frontend', 'Contact information', 'Contact information', '2017-03-16 05:47:38', '2017-03-16 05:47:38'),
(72, 0, 'en', 'frontend', 'Men\'s Watch', 'Men\'s Watch', '2017-03-16 05:47:38', '2017-03-16 05:47:38'),
(73, 0, 'en', 'frontend', 'dfvdf', 'dfvdf', '2017-03-16 05:47:38', '2017-03-16 05:47:38'),
(74, 0, 'en', 'frontend', 'Leather Band Watch', '	\nLeather Band Watch', '2017-03-16 05:47:38', '2017-03-16 05:47:38'),
(75, 0, 'en', 'frontend', 'Loading', 'Loading', '2017-03-16 05:47:38', '2017-03-16 05:47:38'),
(76, 0, 'en', 'frontend', 'All entries loaded', 'All entries loaded', '2017-03-16 05:47:38', '2017-03-16 05:47:38'),
(77, 0, 'en', 'frontend', 'No have post', 'No have post', '2017-03-16 05:47:52', '2017-03-16 05:47:52'),
(78, 0, 'en', 'frontend', 'My profile', 'My profile', '2017-03-16 05:50:25', '2017-03-16 05:50:25'),
(79, 0, 'en', 'frontend', 'My shopping cart', 'My shopping cart', '2017-03-16 05:50:25', '2017-03-16 05:50:25'),
(80, 0, 'en', 'frontend', 'My favorite', 'My favorite', '2017-03-16 05:50:25', '2017-03-16 05:50:25'),
(81, 0, 'en', 'frontend', 'Logout', 'Logout', '2017-03-16 05:50:25', '2017-03-16 05:50:25'),
(82, 0, 'en', 'frontend', 'Email', 'Email', '2017-03-16 05:50:49', '2017-03-16 05:50:49'),
(83, 0, 'en', 'frontend', 'Name', 'Name', '2017-03-16 05:50:49', '2017-03-16 05:50:49'),
(84, 0, 'en', 'frontend', 'Message', 'Message', '2017-03-16 05:50:49', '2017-03-16 05:50:49'),
(85, 0, 'en', 'frontend', 'Send', 'Send', '2017-03-16 05:50:50', '2017-03-16 05:50:50'),
(86, 0, 'en', 'frontend', 'frontend.Send', NULL, '2017-03-16 05:50:50', '2017-03-16 05:50:50'),
(87, 0, 'en', 'frontend', 'My information', 'My information', '2017-03-16 05:51:14', '2017-03-16 05:51:14'),
(88, 0, 'en', 'frontend', 'Change password', 'Change password', '2017-03-16 05:51:14', '2017-03-16 05:51:14'),
(89, 0, 'en', 'frontend', 'Password', 'Password', '2017-03-16 05:51:14', '2017-03-16 05:51:14'),
(90, 0, 'en', 'frontend', 'New Password', 'New Password', '2017-03-16 05:51:14', '2017-03-16 05:51:14'),
(91, 0, 'en', 'frontend', 'Confirm Password', 'Confirm Password', '2017-03-16 05:51:14', '2017-03-16 05:51:14'),
(92, 0, 'en', 'frontend', 'Change', 'Change', '2017-03-16 05:51:14', '2017-03-16 05:51:14'),
(93, 0, 'en', 'frontend', 'Edit avatar', 'Edit avatar', '2017-03-16 05:51:14', '2017-03-16 05:51:14'),
(94, 0, 'en', 'auth', 'failed', NULL, '2017-03-16 06:14:39', '2017-03-16 06:14:39'),
(96, 0, '', '', '', '', NULL, NULL),
(98, 0, '', '', '', '', NULL, NULL),
(99, 0, 'en', 'frontend', 'Description', NULL, '2017-03-16 12:44:38', '2017-03-16 12:44:38'),
(100, 0, 'en', 'frontend', 'Comments', NULL, '2017-03-20 07:46:17', '2017-03-20 07:46:17'),
(101, 0, 'en', 'frontend', 'Comment', NULL, '2017-03-20 07:57:16', '2017-03-20 07:57:16'),
(102, 0, 'en', 'frontend', 'Post your comment', NULL, '2017-03-20 07:57:16', '2017-03-20 07:57:16'),
(103, 0, 'en', 'frontend', 'Your Comment', NULL, '2017-03-20 07:57:16', '2017-03-20 07:57:16'),
(104, 0, 'en', 'frontend', 'Submit', NULL, '2017-03-20 07:57:16', '2017-03-20 07:57:16'),
(105, 0, 'en', 'frontend', 'Shopping cart', NULL, '2017-03-20 07:57:16', '2017-03-20 07:57:16'),
(106, 0, 'en', 'frontend', 'Address', NULL, '2017-03-20 07:57:16', '2017-03-20 07:57:16'),
(107, 0, 'en', 'frontend', 'Add to cart', NULL, '2017-03-20 07:57:16', '2017-03-20 07:57:16'),
(108, 0, 'en', 'frontend', 'Delete', NULL, '2017-03-20 07:57:32', '2017-03-20 07:57:32'),
(109, 0, 'ả', 'frontend', 'Comments', NULL, '2017-03-21 00:38:19', '2017-03-21 00:38:19'),
(110, 0, 'ả', 'frontend', 'Products', NULL, '2017-03-21 00:38:19', '2017-03-21 00:38:19'),
(111, 0, 'ả', 'frontend', 'Categories', NULL, '2017-03-21 00:38:19', '2017-03-21 00:38:19'),
(112, 0, 'ả', 'frontend', 'Sale product', NULL, '2017-03-21 00:38:19', '2017-03-21 00:38:19'),
(113, 0, 'ả', 'frontend', 'Login', NULL, '2017-03-21 00:38:19', '2017-03-21 00:38:19'),
(114, 0, 'ả', 'frontend', 'Contact us', NULL, '2017-03-21 00:38:19', '2017-03-21 00:38:19'),
(115, 0, 'ả', 'frontend', 'Contact information', NULL, '2017-03-21 00:38:19', '2017-03-21 00:38:19'),
(116, 0, 'ả', 'frontend', 'Men\'s Watch', NULL, '2017-03-21 00:38:20', '2017-03-21 00:38:20'),
(117, 0, 'ả', 'frontend', 'dfvdf', NULL, '2017-03-21 00:38:20', '2017-03-21 00:38:20'),
(118, 0, 'ả', 'frontend', 'Leather Band Watch', NULL, '2017-03-21 00:38:20', '2017-03-21 00:38:20'),
(119, 0, 'ả', 'frontend', 'Loading', NULL, '2017-03-21 00:38:20', '2017-03-21 00:38:20'),
(120, 0, 'ả', 'frontend', 'All entries loaded', NULL, '2017-03-21 00:38:20', '2017-03-21 00:38:20'),
(121, 0, 'ar', 'frontend', 'Comments', NULL, '2017-03-21 00:38:28', '2017-03-21 00:38:28'),
(122, 0, 'ar', 'frontend', 'Products', NULL, '2017-03-21 00:38:28', '2017-03-21 00:38:28'),
(123, 0, 'ar', 'frontend', 'Categories', NULL, '2017-03-21 00:38:28', '2017-03-21 00:38:28'),
(124, 0, 'ar', 'frontend', 'Sale product', NULL, '2017-03-21 00:38:28', '2017-03-21 00:38:28'),
(125, 0, 'ar', 'frontend', 'Login', NULL, '2017-03-21 00:38:28', '2017-03-21 00:38:28'),
(126, 0, 'ar', 'frontend', 'Contact us', NULL, '2017-03-21 00:38:28', '2017-03-21 00:38:28'),
(127, 0, 'ar', 'frontend', 'Contact information', NULL, '2017-03-21 00:38:28', '2017-03-21 00:38:28'),
(128, 0, 'ar', 'frontend', 'Men\'s Watch', NULL, '2017-03-21 00:38:28', '2017-03-21 00:38:28'),
(129, 0, 'ar', 'frontend', 'dfvdf', NULL, '2017-03-21 00:38:28', '2017-03-21 00:38:28'),
(130, 0, 'ar', 'frontend', 'Leather Band Watch', NULL, '2017-03-21 00:38:28', '2017-03-21 00:38:28'),
(131, 0, 'ar', 'frontend', 'Loading', NULL, '2017-03-21 00:38:28', '2017-03-21 00:38:28'),
(132, 0, 'ar', 'frontend', 'All entries loaded', NULL, '2017-03-21 00:38:29', '2017-03-21 00:38:29'),
(133, 0, 'ar', 'auth', 'login.needanaccount', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(134, 0, 'ar', 'auth', 'login.createaccount', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(135, 0, 'ar', 'auth', 'login.info.tis_info.name', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(136, 0, 'ar', 'auth', 'login.info.tis_info.description', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(137, 0, 'ar', 'auth', 'login.info.tis_info.link1', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(138, 0, 'ar', 'auth', 'login.info.tis_info.link2', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(139, 0, 'ar', 'auth', 'login.info.tis_info.info1.text', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(140, 0, 'ar', 'auth', 'login.info.tis_info.info1.description', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(141, 0, 'ar', 'auth', 'login.info.tis_info.info2.text', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(142, 0, 'ar', 'auth', 'login.info.tis_info.info2.description', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(143, 0, 'ar', 'auth', 'login.login_box.title', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(144, 0, 'ar', 'auth', 'login.login_box.email', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(145, 0, 'ar', 'auth', 'login.login_box.email_hint', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(146, 0, 'ar', 'auth', 'login.login_box.password', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(147, 0, 'ar', 'auth', 'login.login_box.password_hint', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(148, 0, 'ar', 'auth', 'login.login_box.forgot_password', NULL, '2017-03-21 00:39:04', '2017-03-21 00:39:04'),
(149, 0, 'ar', 'auth', 'login.login_box.remember_me', NULL, '2017-03-21 00:39:05', '2017-03-21 00:39:05'),
(150, 0, 'ar', 'auth', 'login.login_box.login_button', NULL, '2017-03-21 00:39:05', '2017-03-21 00:39:05'),
(151, 0, 'ar', 'auth', 'failed', NULL, '2017-03-21 00:39:12', '2017-03-21 00:39:12'),
(152, 0, 'ar', 'frontend', 'My profile', NULL, '2017-03-21 00:42:38', '2017-03-21 00:42:38'),
(153, 0, 'ar', 'frontend', 'My shopping cart', NULL, '2017-03-21 00:42:38', '2017-03-21 00:42:38'),
(154, 0, 'ar', 'frontend', 'My favorite', NULL, '2017-03-21 00:42:38', '2017-03-21 00:42:38'),
(155, 0, 'ar', 'frontend', 'Logout', NULL, '2017-03-21 00:42:38', '2017-03-21 00:42:38'),
(156, 0, 'ar', 'header', 'signout', NULL, '2017-03-21 01:03:44', '2017-03-21 01:03:44'),
(157, 0, 'ar', 'header', 'signout_text', NULL, '2017-03-21 01:03:44', '2017-03-21 01:03:44'),
(158, 0, 'ar', 'footer', 'organization', NULL, '2017-03-21 01:03:44', '2017-03-21 01:03:44'),
(159, 0, 'ar', 'footer', 'system', NULL, '2017-03-21 01:03:44', '2017-03-21 01:03:44'),
(160, 0, 'ar', 'frontend', 'My information', NULL, '2017-03-21 01:04:54', '2017-03-21 01:04:54'),
(161, 0, 'ar', 'frontend', 'Change password', NULL, '2017-03-21 01:04:54', '2017-03-21 01:04:54'),
(162, 0, 'ar', 'frontend', 'Password', NULL, '2017-03-21 01:04:54', '2017-03-21 01:04:54'),
(163, 0, 'ar', 'frontend', 'New Password', NULL, '2017-03-21 01:04:54', '2017-03-21 01:04:54'),
(164, 0, 'ar', 'frontend', 'Confirm Password', NULL, '2017-03-21 01:04:55', '2017-03-21 01:04:55'),
(165, 0, 'ar', 'frontend', 'Change', NULL, '2017-03-21 01:04:55', '2017-03-21 01:04:55'),
(166, 0, 'ar', 'frontend', 'Edit avatar', NULL, '2017-03-21 01:04:55', '2017-03-21 01:04:55'),
(167, 0, 'ar', 'frontend', 'Email', NULL, '2017-03-21 01:06:02', '2017-03-21 01:06:02'),
(168, 0, 'ar', 'frontend', 'Name', NULL, '2017-03-21 01:06:02', '2017-03-21 01:06:02'),
(169, 0, 'ar', 'frontend', 'Message', NULL, '2017-03-21 01:06:02', '2017-03-21 01:06:02'),
(170, 0, 'ar', 'frontend', 'Send', NULL, '2017-03-21 01:06:03', '2017-03-21 01:06:03'),
(171, 0, 'ar', 'validation', 'custom.name.required', NULL, '2017-03-21 01:06:17', '2017-03-21 01:06:17'),
(172, 0, 'ar', 'validation', 'custom', NULL, '2017-03-21 01:06:17', '2017-03-21 01:06:17'),
(173, 0, 'ar', 'validation', 'required', NULL, '2017-03-21 01:06:17', '2017-03-21 01:06:17'),
(174, 0, 'ar', 'validation', 'attributes', NULL, '2017-03-21 01:06:17', '2017-03-21 01:06:17'),
(175, 0, 'ar', 'validation', 'custom.message.required', NULL, '2017-03-21 01:06:17', '2017-03-21 01:06:17'),
(176, 0, 'ar', 'frontend', 'Comment', NULL, '2017-03-21 01:06:55', '2017-03-21 01:06:55'),
(177, 0, 'ar', 'frontend', 'Post your comment', NULL, '2017-03-21 01:06:55', '2017-03-21 01:06:55'),
(178, 0, 'ar', 'frontend', 'Your Comment', NULL, '2017-03-21 01:06:55', '2017-03-21 01:06:55'),
(179, 0, 'ar', 'frontend', 'Submit', NULL, '2017-03-21 01:06:55', '2017-03-21 01:06:55'),
(180, 0, 'ar', 'frontend', 'Description', NULL, '2017-03-21 01:06:55', '2017-03-21 01:06:55'),
(181, 0, 'ar', 'frontend', 'Shopping cart', NULL, '2017-03-21 01:06:55', '2017-03-21 01:06:55'),
(182, 0, 'ar', 'frontend', 'Address', NULL, '2017-03-21 01:06:55', '2017-03-21 01:06:55'),
(183, 0, 'ar', 'frontend', 'Add to cart', NULL, '2017-03-21 01:06:55', '2017-03-21 01:06:55'),
(184, 0, 'ar', 'auth', 'register.alreadyregistered', NULL, '2017-03-21 02:26:50', '2017-03-21 02:26:50'),
(185, 0, 'ar', 'auth', 'register.signin', NULL, '2017-03-21 02:26:50', '2017-03-21 02:26:50'),
(186, 0, 'ar', 'auth', 'register.register_box.title', NULL, '2017-03-21 02:26:50', '2017-03-21 02:26:50'),
(187, 0, 'ar', 'validation', 'custom.old_password.required', NULL, '2017-03-21 02:42:08', '2017-03-21 02:42:08'),
(188, 0, 'ar', 'validation', 'custom.password.required', NULL, '2017-03-21 02:42:09', '2017-03-21 02:42:09'),
(189, 0, 'ar', 'frontend', 'Go shopping', NULL, '2017-03-21 02:42:25', '2017-03-21 02:42:25'),
(190, 0, 'ar', 'validation', 'custom.title.required', NULL, '2017-03-21 02:44:02', '2017-03-21 02:44:02'),
(191, 0, 'ar', 'validation', 'custom.description.required', NULL, '2017-03-21 02:44:02', '2017-03-21 02:44:02'),
(192, 0, 'ar', 'deeppermission', 'user.role', NULL, '2017-03-21 02:44:51', '2017-03-21 02:44:51'),
(193, 0, 'ar', 'deeppermission', 'user.username', NULL, '2017-03-21 02:44:51', '2017-03-21 02:44:51'),
(194, 0, 'ar', 'deeppermission', 'user.email', NULL, '2017-03-21 02:44:52', '2017-03-21 02:44:52'),
(195, 0, 'ar', 'deeppermission', 'general.action', NULL, '2017-03-21 02:44:52', '2017-03-21 02:44:52'),
(196, 0, 'ar', 'general', 'submit', NULL, '2017-03-21 02:44:52', '2017-03-21 02:44:52'),
(197, 0, 'ar', 'deeppermission', 'header.title', NULL, '2017-03-21 02:44:54', '2017-03-21 02:44:54'),
(198, 0, 'ar', 'general', 'list', NULL, '2017-03-21 02:44:54', '2017-03-21 02:44:54'),
(199, 0, 'ar', 'deeppermission', 'role.title', NULL, '2017-03-21 02:44:54', '2017-03-21 02:44:54'),
(200, 0, 'ar', 'deeppermission', 'role.name', NULL, '2017-03-21 02:44:54', '2017-03-21 02:44:54'),
(201, 0, 'ar', 'deeppermission', 'role.code', NULL, '2017-03-21 02:44:54', '2017-03-21 02:44:54'),
(202, 0, 'ar', 'deeppermission', 'general.are_you_sure', NULL, '2017-03-21 02:44:54', '2017-03-21 02:44:54'),
(203, 0, 'ar', 'deeppermission', 'permission.title', NULL, '2017-03-21 02:45:02', '2017-03-21 02:45:02'),
(204, 0, 'ar', 'deeppermission', 'permission.name', NULL, '2017-03-21 02:45:02', '2017-03-21 02:45:02'),
(205, 0, 'ar', 'deeppermission', 'permission.code', NULL, '2017-03-21 02:45:02', '2017-03-21 02:45:02'),
(206, 0, 'ar', 'deeppermission', 'permission.group_permission', NULL, '2017-03-21 02:45:02', '2017-03-21 02:45:02'),
(207, 0, 'ar', 'deeppermission', 'group.title', NULL, '2017-03-21 02:45:04', '2017-03-21 02:45:04'),
(208, 0, 'ar', 'deeppermission', 'group.name', NULL, '2017-03-21 02:45:04', '2017-03-21 02:45:04'),
(209, 0, 'ar', 'deeppermission', 'group.code', NULL, '2017-03-21 02:45:04', '2017-03-21 02:45:04'),
(210, 0, 'ar', 'deeppermission', 'group.permission', NULL, '2017-03-21 02:45:04', '2017-03-21 02:45:04'),
(211, 0, 'ar', 'deeppermission', 'setting.title', NULL, '2017-03-21 02:45:06', '2017-03-21 02:45:06'),
(212, 0, 'ar', 'deeppermission', 'setting.initial_text', NULL, '2017-03-21 02:45:06', '2017-03-21 02:45:06'),
(213, 0, 'ar', 'deeppermission', 'setting.initial', NULL, '2017-03-21 02:45:06', '2017-03-21 02:45:06'),
(214, 0, 'ar', 'deeppermission', 'setting.export', NULL, '2017-03-21 02:45:06', '2017-03-21 02:45:06'),
(215, 0, 'ar', 'deeppermission', 'setting.import', NULL, '2017-03-21 02:45:07', '2017-03-21 02:45:07'),
(216, 0, 'ar', 'lbpushcenter', 'application.list.title', NULL, '2017-03-21 02:45:37', '2017-03-21 02:45:37'),
(217, 0, 'ar', 'lbpushcenter', 'application.list.subtitle', NULL, '2017-03-21 02:45:37', '2017-03-21 02:45:37'),
(218, 0, 'ar', 'lbpushcenter', 'application.name.title', NULL, '2017-03-21 02:45:38', '2017-03-21 02:45:38'),
(219, 0, 'ar', 'lbpushcenter', 'application.description.title', NULL, '2017-03-21 02:45:38', '2017-03-21 02:45:38'),
(220, 0, 'ar', 'lbpushcenter', 'application.type.title', NULL, '2017-03-21 02:45:38', '2017-03-21 02:45:38'),
(221, 0, 'ar', 'lbpushcenter', 'application.production_mode.title', NULL, '2017-03-21 02:45:38', '2017-03-21 02:45:38'),
(222, 0, 'ar', 'general', 'action', NULL, '2017-03-21 02:45:38', '2017-03-21 02:45:38'),
(223, 0, 'ar', 'general', 'edit', NULL, '2017-03-21 02:45:38', '2017-03-21 02:45:38'),
(224, 0, 'ar', 'general', 'add', NULL, '2017-03-21 02:45:38', '2017-03-21 02:45:38'),
(225, 0, 'ar', 'lbpushcenter', 'application_type.list.title', NULL, '2017-03-21 02:45:42', '2017-03-21 02:45:42'),
(226, 0, 'ar', 'lbpushcenter', 'application_type.list.subtitle', NULL, '2017-03-21 02:45:42', '2017-03-21 02:45:42'),
(227, 0, 'ar', 'lbpushcenter', 'application_type.name.title', NULL, '2017-03-21 02:45:43', '2017-03-21 02:45:43'),
(228, 0, 'ar', 'lbpushcenter', 'application_type.description.title', NULL, '2017-03-21 02:45:43', '2017-03-21 02:45:43'),
(229, 0, 'ar', 'lbpushcenter', 'application_type.color_class.title', NULL, '2017-03-21 02:45:43', '2017-03-21 02:45:43'),
(230, 0, 'ar', 'lbpushcenter', 'device.list.title', NULL, '2017-03-21 02:45:45', '2017-03-21 02:45:45'),
(231, 0, 'ar', 'lbpushcenter', 'device.list.subtitle', NULL, '2017-03-21 02:45:45', '2017-03-21 02:45:45'),
(232, 0, 'ar', 'lbpushcenter', 'device.id.title', NULL, '2017-03-21 02:45:45', '2017-03-21 02:45:45'),
(233, 0, 'ar', 'lbpushcenter', 'device.token.title', NULL, '2017-03-21 02:45:45', '2017-03-21 02:45:45'),
(234, 0, 'ar', 'lbpushcenter', 'device.application.title', NULL, '2017-03-21 02:45:45', '2017-03-21 02:45:45'),
(235, 0, 'ar', 'lbpushcenter', 'device.type.title', NULL, '2017-03-21 02:45:45', '2017-03-21 02:45:45'),
(236, 0, 'ar', 'lbpushcenter', 'device.unread.title', NULL, '2017-03-21 02:45:45', '2017-03-21 02:45:45'),
(237, 0, 'ar', 'lbpushcenter', 'device.users.title', NULL, '2017-03-21 02:45:45', '2017-03-21 02:45:45'),
(238, 0, 'ar', 'lbpushcenter', 'device.notification.title', NULL, '2017-03-21 02:45:45', '2017-03-21 02:45:45'),
(239, 0, 'ar', 'lbpushcenter', 'device.notification.sendtoall.title', NULL, '2017-03-21 02:45:45', '2017-03-21 02:45:45'),
(240, 0, 'ar', 'lbpushcenter', 'notification.list.title', NULL, '2017-03-21 02:45:51', '2017-03-21 02:45:51'),
(241, 0, 'ar', 'lbpushcenter', 'notification.list.subtitle', NULL, '2017-03-21 02:45:51', '2017-03-21 02:45:51'),
(242, 0, 'ar', 'lbpushcenter', 'notification.id.title', NULL, '2017-03-21 02:45:51', '2017-03-21 02:45:51'),
(243, 0, 'ar', 'lbpushcenter', 'notification.device.title', NULL, '2017-03-21 02:45:51', '2017-03-21 02:45:51'),
(244, 0, 'ar', 'lbpushcenter', 'notification.title.title', NULL, '2017-03-21 02:45:51', '2017-03-21 02:45:51'),
(245, 0, 'ar', 'lbpushcenter', 'notification.message.title', NULL, '2017-03-21 02:45:51', '2017-03-21 02:45:51'),
(246, 0, 'ar', 'lbpushcenter', 'notification.status.title', NULL, '2017-03-21 02:45:51', '2017-03-21 02:45:51'),
(247, 0, 'ar', 'lbpushcenter', 'notification.device_type.title', NULL, '2017-03-21 02:45:51', '2017-03-21 02:45:51'),
(248, 0, 'ar', 'general', 'created_at', NULL, '2017-03-21 02:45:51', '2017-03-21 02:45:51'),
(249, 0, 'ar', 'validation', 'custom.price.required', NULL, '2017-03-21 02:46:12', '2017-03-21 02:46:12'),
(250, 0, 'ar', 'validation', 'custom.currency.required', NULL, '2017-03-21 02:46:12', '2017-03-21 02:46:12'),
(251, 0, 'ar', 'frontend', '   Category_1      ', NULL, '2017-03-21 02:49:25', '2017-03-21 02:49:25'),
(252, 0, 'ar', 'frontend', 'category2', NULL, '2017-03-21 02:49:25', '2017-03-21 02:49:25'),
(253, 0, 'ar', 'validation', 'custom.email.email', NULL, '2017-03-21 02:52:09', '2017-03-21 02:52:09'),
(254, 0, 'ar', 'validation', 'email', NULL, '2017-03-21 02:52:09', '2017-03-21 02:52:09'),
(255, 0, 'ar', 'validation', 'custom.name.min', NULL, '2017-03-21 02:52:09', '2017-03-21 02:52:09'),
(256, 0, 'ar', 'validation', 'min.string', NULL, '2017-03-21 02:52:09', '2017-03-21 02:52:09'),
(257, 0, 'ar', 'validation', 'custom.message.min', NULL, '2017-03-21 02:52:09', '2017-03-21 02:52:09'),
(258, 0, 'ar', 'validation', 'custom.password.min', NULL, '2017-03-21 02:56:14', '2017-03-21 02:56:14'),
(259, 0, 'ar', 'validation', 'custom.password.confirmed', NULL, '2017-03-21 03:13:30', '2017-03-21 03:13:30'),
(260, 0, 'ar', 'validation', 'confirmed', NULL, '2017-03-21 03:13:30', '2017-03-21 03:13:30'),
(261, 0, 'en', 'frontend', '   Category_1      ', NULL, '2017-03-21 03:17:52', '2017-03-21 03:17:52'),
(262, 0, 'en', 'frontend', 'category2', NULL, '2017-03-21 03:17:52', '2017-03-21 03:17:52'),
(263, 0, 'ar', 'validation', 'custom.email.required', NULL, '2017-03-21 04:32:01', '2017-03-21 04:32:01'),
(264, 0, 'ar', 'frontend', 'Delete', NULL, '2017-03-21 04:51:17', '2017-03-21 04:51:17'),
(265, 0, 'ar', 'frontend', 'Checkout', NULL, '2017-03-21 04:51:17', '2017-03-21 04:51:17'),
(266, 0, 'ar', 'validation', 'custom.password.regex', NULL, '2017-03-21 05:42:06', '2017-03-21 05:42:06'),
(267, 0, 'ar', 'validation', 'regex', NULL, '2017-03-21 05:42:06', '2017-03-21 05:42:06'),
(268, 0, 'en', 'frontend', 'Category 3', NULL, '2017-03-21 23:34:40', '2017-03-21 23:34:40'),
(269, 0, 'en', 'validation', 'custom.name.required', NULL, '2017-03-21 23:37:59', '2017-03-21 23:37:59'),
(270, 0, 'en', 'validation', 'custom.message.required', NULL, '2017-03-21 23:37:59', '2017-03-21 23:37:59'),
(271, 0, 'en', 'validation', 'custom.message.min', NULL, '2017-03-21 23:38:07', '2017-03-21 23:38:07'),
(272, 0, 'en', 'validation', 'custom.code.required', NULL, '2017-03-21 23:42:36', '2017-03-21 23:42:36'),
(273, 0, 'en', 'frontend', 'Go shopping', NULL, '2017-03-21 23:45:11', '2017-03-21 23:45:11'),
(274, 0, 'en', 'frontend', 'Checkout', NULL, '2017-03-21 23:58:21', '2017-03-21 23:58:21'),
(275, 0, 'en', 'validation', 'custom.email.email', NULL, '2017-03-22 00:19:47', '2017-03-22 00:19:47'),
(276, 0, 'en', 'backend', 'user.list.title', NULL, '2017-03-22 00:37:00', '2017-03-22 00:37:00'),
(277, 0, 'en', 'validation', 'custom.permission_group_id.required', NULL, '2017-03-22 00:37:45', '2017-03-22 00:37:45'),
(278, 0, 'en', 'validation', 'custom.import.required', NULL, '2017-03-22 00:37:55', '2017-03-22 00:37:55'),
(279, 0, 'en', 'validation', 'custom.import.mimetypes', NULL, '2017-03-22 00:38:47', '2017-03-22 00:38:47'),
(280, 0, 'en', 'frontend', 'Category new 1', NULL, '2017-03-22 02:35:44', '2017-03-22 02:35:44'),
(281, 0, 'ar', 'frontend', 'Category new 1', NULL, '2017-03-23 02:26:53', '2017-03-23 02:26:53'),
(282, 0, 'en', 'validation', 'custom.name.min', NULL, '2017-03-23 05:51:30', '2017-03-23 05:51:30'),
(283, 0, 'en', 'validation', 'custom.image.image', NULL, '2017-03-23 06:25:25', '2017-03-23 06:25:25'),
(284, 0, 'en', 'validation', 'custom.old_password.required', NULL, '2017-03-23 22:06:23', '2017-03-23 22:06:23'),
(285, 0, 'en', 'validation', 'custom.email.required', NULL, '2017-03-23 22:21:20', '2017-03-23 22:21:20'),
(286, 0, 'en', 'frontend', 'aa', NULL, '2017-03-25 00:02:49', '2017-03-25 00:02:49'),
(287, 0, 'en', 'frontend', 'sss', NULL, '2017-03-25 00:09:32', '2017-03-25 00:09:32'),
(288, 0, 'en', 'validation', 'custom.content.required', NULL, '2017-03-25 00:36:22', '2017-03-25 00:36:22'),
(289, 0, 'en', 'validation', 'custom.password.min', NULL, '2017-03-25 00:40:58', '2017-03-25 00:40:58'),
(290, 0, 'en', 'validation', 'custom.title.unique', NULL, '2017-03-25 00:43:48', '2017-03-25 00:43:48'),
(291, 0, 'en', 'frontend', 'link', NULL, '2017-03-25 00:46:32', '2017-03-25 00:46:32'),
(292, 0, 'en', 'frontend', 'link1', NULL, '2017-03-25 00:46:32', '2017-03-25 00:46:32'),
(293, 0, 'en', 'lbpushcenter/application', 'create.title', NULL, '2017-04-11 22:36:53', '2017-04-11 22:36:53'),
(294, 0, 'en', 'lbpushcenter', 'application_type.init.title', NULL, '2017-04-11 23:50:12', '2017-04-11 23:50:12'),
(295, 0, 'en', 'lbpushcenter', 'device.notification.title.title', NULL, '2017-04-12 04:09:35', '2017-04-12 04:09:35'),
(296, 0, 'en', 'lbpushcenter', 'dashboard.title', NULL, '2017-04-13 13:01:42', '2017-04-13 13:01:42'),
(297, 0, 'en', 'lbpushcenter', 'dashboard.subtitle', NULL, '2017-04-13 13:01:42', '2017-04-13 13:01:42'),
(298, 0, 'en', 'auth', 'throttle', NULL, '2017-04-14 03:39:26', '2017-04-14 03:39:26'),
(299, 0, 'en', 'frontend', 'Phone', NULL, '2018-03-15 07:19:13', '2018-03-15 07:19:13'),
(300, 0, 'en', 'frontend', 'Omega', NULL, '2018-03-15 08:58:17', '2018-03-15 08:58:17'),
(301, 0, 'en', 'frontend', 'Hublot', NULL, '2018-03-15 08:58:17', '2018-03-15 08:58:17'),
(302, 0, 'en', 'frontend', 'Rolex', NULL, '2018-03-15 08:58:17', '2018-03-15 08:58:17'),
(303, 0, 'en', 'frontend', 'Casio', NULL, '2018-03-15 08:58:17', '2018-03-15 08:58:17'),
(304, 0, 'en', 'frontend', 'Vacheron Constantin', NULL, '2018-03-15 08:58:17', '2018-03-15 08:58:17'),
(305, 0, 'en', 'frontend', 'Tissot', NULL, '2018-03-15 09:15:28', '2018-03-15 09:15:28'),
(306, 0, 'en', 'frontend', 'Citizen', NULL, '2018-03-15 09:32:57', '2018-03-15 09:32:57'),
(307, 0, 'vi', 'header', 'signout', NULL, '2018-03-15 12:50:03', '2018-03-15 12:50:03'),
(308, 0, 'vi', 'header', 'signout_text', NULL, '2018-03-15 12:50:03', '2018-03-15 12:50:03'),
(309, 0, 'vi', 'footer', 'organization', NULL, '2018-03-15 12:50:04', '2018-03-15 12:50:04'),
(310, 0, 'en', 'validation', 'custom.facebook_id.required', NULL, '2018-03-27 06:14:15', '2018-03-27 06:14:15'),
(311, 0, 'en', 'validation', 'custom.email.unique', NULL, '2018-03-27 06:22:39', '2018-03-27 06:22:39'),
(312, 0, 'vi', 'deeppermission', 'header.title', NULL, '2018-09-15 14:32:13', '2018-09-15 14:32:13'),
(313, 0, 'vi', 'general', 'list', NULL, '2018-09-15 14:32:13', '2018-09-15 14:32:13'),
(314, 0, 'vi', 'deeppermission', 'role.title', NULL, '2018-09-15 14:32:13', '2018-09-15 14:32:13'),
(315, 0, 'vi', 'deeppermission', 'role.name', NULL, '2018-09-15 14:32:13', '2018-09-15 14:32:13'),
(316, 0, 'vi', 'deeppermission', 'role.code', NULL, '2018-09-15 14:32:13', '2018-09-15 14:32:13'),
(317, 0, 'vi', 'deeppermission', 'general.action', NULL, '2018-09-15 14:32:13', '2018-09-15 14:32:13'),
(318, 0, 'vi', 'deeppermission', 'general.are_you_sure', NULL, '2018-09-15 14:32:13', '2018-09-15 14:32:13'),
(319, 0, 'vi', 'menu', 'migrate_pc', NULL, '2018-09-15 14:56:10', '2018-09-15 14:56:10'),
(320, 0, 'vi', 'back_end', 'list_pc_processing', NULL, '2018-09-15 14:56:10', '2018-09-15 14:56:10'),
(321, 0, 'en', 'menu', 'migrate_pc', NULL, '2018-09-17 14:23:58', '2018-09-17 14:23:58'),
(322, 0, 'en', 'back_end', 'list_pc_processing', NULL, '2018-09-17 14:23:58', '2018-09-17 14:23:58'),
(323, 0, 'en', 'back_end', 'edit', NULL, '2018-09-17 14:51:30', '2018-09-17 14:51:30'),
(324, 0, 'en', 'back_end', 'change_password', NULL, '2018-09-17 14:51:31', '2018-09-17 14:51:31'),
(325, 0, 'en', 'back_end', 'delete', NULL, '2018-09-17 14:51:31', '2018-09-17 14:51:31'),
(326, 0, 'vi', 'back_end', 'edit', NULL, '2018-09-17 15:02:20', '2018-09-17 15:02:20'),
(327, 0, 'vi', 'back_end', 'change_password', NULL, '2018-09-17 15:02:20', '2018-09-17 15:02:20'),
(328, 0, 'vi', 'back_end', 'delete', NULL, '2018-09-17 15:02:20', '2018-09-17 15:02:20'),
(329, 0, 'vi', 'auth', 'login.needanaccount', NULL, '2018-09-17 15:17:50', '2018-09-17 15:17:50'),
(330, 0, 'vi', 'auth', 'login.createaccount', NULL, '2018-09-17 15:17:50', '2018-09-17 15:17:50'),
(331, 0, 'vi', 'auth', 'login.login_box.title', NULL, '2018-09-17 15:17:50', '2018-09-17 15:17:50'),
(332, 0, 'vi', 'auth', 'login.login_box.email', NULL, '2018-09-17 15:17:50', '2018-09-17 15:17:50'),
(333, 0, 'vi', 'auth', 'login.login_box.email_hint', NULL, '2018-09-17 15:17:50', '2018-09-17 15:17:50'),
(334, 0, 'vi', 'auth', 'login.login_box.password', NULL, '2018-09-17 15:17:50', '2018-09-17 15:17:50'),
(335, 0, 'vi', 'auth', 'login.login_box.password_hint', NULL, '2018-09-17 15:17:50', '2018-09-17 15:17:50'),
(336, 0, 'vi', 'auth', 'login.login_box.remember_me', NULL, '2018-09-17 15:17:50', '2018-09-17 15:17:50'),
(337, 0, 'vi', 'auth', 'login.login_box.login_button', NULL, '2018-09-17 15:17:50', '2018-09-17 15:17:50'),
(338, 0, 'en', 'validation', 'custom.username.required', NULL, '2018-10-08 13:54:49', '2018-10-08 13:54:49'),
(339, 0, 'en', 'back_end', 'name_en', NULL, '2018-10-16 17:00:30', '2018-10-16 17:00:30'),
(340, 0, 'en', 'back_end', 'name_vn', NULL, '2018-10-16 17:00:30', '2018-10-16 17:00:30'),
(341, 0, 'en', 'back_end', 'code', NULL, '2018-10-16 17:00:30', '2018-10-16 17:00:30'),
(342, 0, 'en', 'back_end', 'submit', NULL, '2018-10-16 17:00:54', '2018-10-16 17:00:54'),
(343, 0, 'en', 'validation', 'custom.r_name.required', NULL, '2018-11-05 07:04:12', '2018-11-05 07:04:12'),
(344, 0, 'en', 'validation', 'custom.category_id.required', NULL, '2018-11-06 04:38:46', '2018-11-06 04:38:46'),
(345, 0, 'en', 'validation', 'custom.g-recaptcha-response.required', NULL, '2018-11-19 02:06:02', '2018-11-19 02:06:02');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `mime_type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `original_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `original_extension` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `updated_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `width` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `height` varchar(225) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `mime_type`, `original_name`, `original_extension`, `size`, `updated_by`, `created_by`, `created_at`, `updated_at`, `width`, `height`) VALUES
('002724ecdad24c999e2a5aa707e11c83', 'image/png', 'B0.4.png', 'png', 21651, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 23:29:16', '2017-05-09 23:29:16', '', ''),
('034c38dc01fc49a8ae5f87142bd0228d', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '28e59539463f48f58dbb470acd6c0ba2', '2017-04-07 04:14:58', '2017-04-07 04:14:58', '', ''),
('0bfe1ac2ee62454086e3af3166d531e2', 'image/jpeg', 'watch4.jpg', 'jpg', 6447, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-03-21 21:29:06', '2017-03-21 21:29:06', '', ''),
('10fcb8e3974b4044abcaee4414ee8044', 'image/jpeg', 'dong_ho_Hublot_HL_033A_4x800x800x4.jpg', 'jpg', 59467, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-16 03:52:14', '2018-03-16 03:52:14', '', ''),
('112f80872ae14f028330e18ece044157', 'image/jpeg', 'co-viet-nam-2.jpg', 'jpg', 33115, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:49:32', '2018-03-15 09:49:32', '', ''),
('14b6627612914eafadbef2266bc08880', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-11 22:33:39', '2017-04-11 22:33:39', '', ''),
('1968aabb7c5a41adaf9c904095583ae6', 'text/plain', 'development_com.msab.handmadewatch.pem', 'pem', 3671, NULL, NULL, '2017-01-13 20:17:01', '2017-01-13 20:17:01', '', ''),
('1b278afe1aa649eeb748ad0728dcfeb3', 'image/jpeg', '13838090_1143271059062945_1283331454_o.jpg', 'jpg', 348885, NULL, '40468d031e064cc0a34280dcf830bee7', '2016-12-20 04:19:56', '2016-12-20 04:19:56', '', ''),
('1cd9a3d084a94ebfb76034397b0e8f20', 'image/jpeg', 'image.jpg', 'jpg', 96676, NULL, 'a52de95b9eb8474ea4cf52a5fca832de', '2017-04-07 23:54:35', '2017-04-07 23:54:35', '', ''),
('1f0a8189198b416c8686f8b5ec7dc071', 'image/jpeg', 'watch1.jpg', 'jpg', 223664, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-03-21 03:23:28', '2017-03-21 03:23:28', '', ''),
('279e3d91ecd24b22ba982d91a4f23d0b', 'image/jpeg', 'tory-burch-reva-ivory-dial-ladies-gold-tone-watch-trb4011_2.jpg', 'jpg', 88648, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:14:38', '2018-03-15 09:14:38', '', ''),
('2a54af56c6bb430783ab4802e641986c', 'image/jpeg', 'image.jpg', 'jpg', 7299, NULL, 'd207d47f235e4edd9169db025931acce', '2017-04-08 03:25:31', '2017-04-08 03:25:31', '', ''),
('2b1f5030055d458c85c2841e9839a701', 'image/jpeg', 'c044b53c646143b086970746c84621b7.jpg', 'jpg', 50585, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:29:19', '2018-03-15 09:29:19', '', ''),
('2b8d73b639164bf29891635f31bc5455', 'image/jpeg', 'image.jpg', 'jpg', 93387, NULL, '03eda67c149d4dd892f699baf8915d76', '2017-04-07 22:59:28', '2017-04-07 22:59:28', '', ''),
('316294e18ea145598ac0ee4ad3c2853f', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-17 08:07:40', '2017-04-17 08:07:40', '', ''),
('31f9028f5ed4402dbf09795679511ab1', 'image/png', '3123.png', 'png', 475955, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 04:17:43', '2017-05-09 04:17:43', '', ''),
('32613a25b2d44134b3dcba5ee7e6176f', 'image/jpeg', 'image.jpg', 'jpg', 7299, NULL, 'de00d6c8ba924c49a37ac4e35c8307c1', '2017-04-08 03:49:53', '2017-04-08 03:49:53', '', ''),
('332b6f6f9e5c4dd2a0c9ce5f0256518f', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '03eda67c149d4dd892f699baf8915d76', '2017-04-07 22:52:42', '2017-04-07 22:52:42', '', ''),
('33551bf6407a49f3af74037bd24e0c32', 'image/jpeg', 'picture989573363jpg', '', 11200, NULL, '08f9b32d9725427eac6c194ef5777af3', '2017-04-17 08:20:08', '2017-04-17 08:20:08', '', ''),
('35097b8ce1514bd0aa164928a71e3a24', 'image/jpeg', 'raymond-weil-tradition-white-dial-stainless-steel-men_s-watch-5576-st-00300.jpg', 'jpg', 78160, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:18:57', '2018-03-15 09:18:57', '', ''),
('36911a214e8a4310a3cbc1260b1db942', 'image/png', '3312321.png', 'png', 53776, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 04:14:17', '2017-05-09 04:14:17', '', ''),
('38e281147f234e9cbdb27d9e40bc4885', 'image/png', 'logo_1.png', 'png', 4126, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-03-21 02:47:03', '2017-03-21 02:47:03', '', ''),
('39bc44dd2eea4f869421961eb1ed6403', 'image/jpeg', 'Vacheron_Constantin_V_C247x800x800x4.jpg', 'jpg', 63301, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-16 03:54:00', '2018-03-16 03:54:00', '', ''),
('3a5abac9c7df4213a910b57446aff0a8', 'image/jpeg', '', 'jpg', 69810, NULL, '40468d031e064cc0a34280dcf830bee7', '2016-11-13 23:49:30', '2016-11-13 23:49:30', '', ''),
('3b1e4bec6e2a4dd39a71e283884d8d10', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-08 05:23:15', '2017-04-08 05:23:15', '', ''),
('3b31193cd3194acfba9720886a3f9695', 'image/png', 'splash.png', 'png', 75655, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-02-20 04:23:19', '2017-02-20 04:23:19', '', ''),
('3b353718e4754275be4bf0da5410fb12', 'image/jpeg', 'batman-arkham-knight-gamescom-5-jpg.jpg', 'jpg', 362314, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 23:33:06', '2017-05-09 23:33:06', '', ''),
('3e92d544a9c44ea5a980817a60311f6b', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '03eda67c149d4dd892f699baf8915d76', '2017-04-07 22:55:54', '2017-04-07 22:55:54', '', ''),
('3eeb21a96d0040b49ad7fcc83f61b609', 'image/jpeg', 'Hinh-nen-conan-6.jpg', 'jpg', 153698, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 23:34:56', '2017-05-09 23:34:56', '', ''),
('3f3bdbf39a6b4b0f803f1182d3230064', 'image/jpeg', 'f36c273487e4b610c12be1549aec14df.jpg', 'jpg', 55908, NULL, '40468d031e064cc0a34280dcf830bee7', '2017-02-13 23:42:40', '2017-02-13 23:42:40', '', ''),
('3fad6e9e67e94b76a50e00e2892796d3', 'image/jpeg', 'Hinh-nen-conan-6.jpg', 'jpg', 153698, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 23:42:53', '2017-05-09 23:42:53', '', ''),
('415d70bfcf8f43d085ec6b234530d3a1', 'image/jpeg', 'IMG_2518.JPG', 'JPG', 1535159, NULL, '40468d031e064cc0a34280dcf830bee7', '2016-12-20 05:30:43', '2016-12-20 05:30:43', '', ''),
('43031b23e2ae418d879739f480e806fb', 'image/png', '3123.png', 'png', 475955, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 04:19:56', '2017-05-09 04:19:56', '', ''),
('440ab97a293342d598efd39f7f5e13e0', 'image/jpeg', 'picture235326333jpg', '', 14295, NULL, '89f3083a29b64dfc85b889187e7c0efd', '2017-05-12 22:36:29', '2017-05-12 22:36:29', '', ''),
('461892047a9148628dbe588f2e53fc1c', 'image/jpeg', 'tissot-t-navigator-automatic-black-dial-men_s-watch-t0624301105700.jpg', 'jpg', 122533, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:08:25', '2018-03-15 09:08:25', '', ''),
('486807c879d14127b7ee0b36b82abf86', 'image/jpeg', 'hoi-dap-cach-kiem-tra-dong-ho-citizen-automatic-chinh-hang-2.jpg', 'jpg', 47548, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-16 03:50:32', '2018-03-16 03:50:32', '', ''),
('4a77da93f6c643dea22c1a085d066e6c', 'image/jpeg', '', 'jpg', 348885, NULL, '40468d031e064cc0a34280dcf830bee7', '2016-11-13 23:42:05', '2016-11-13 23:42:05', '', ''),
('4c8676dfffa94991ab5a22274a07e821', 'image/jpeg', 'picture-856308833jpg', '', 8164, NULL, 'ef6f0d6b352441d9b8a19096c37f8f9c', '2017-04-17 07:33:19', '2017-04-17 07:33:19', '', ''),
('5336d437383b482ab98122ea5451d861', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-11 23:57:30', '2017-04-11 23:57:30', '', ''),
('5363e1ad68024c5ebe5e239e155c8a65', 'image/jpeg', 'image.jpg', 'jpg', 586893, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-08 05:54:03', '2017-04-08 05:54:03', '', ''),
('57eff4cd16a94d98be6a108a5c3f737f', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-08 05:19:38', '2017-04-08 05:19:38', '', ''),
('5a3c0890c59c4154baa4b9cd553be2aa', 'image/jpeg', '13838090_1143271059062945_1283331454_o.jpg', 'jpg', 348885, NULL, '40468d031e064cc0a34280dcf830bee7', '2016-12-20 04:20:53', '2016-12-20 04:20:53', '', ''),
('5b067f1d91464987a028a0f42fce16a9', 'image/jpeg', 'watch4.jpg', 'jpg', 6447, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-03-23 22:16:59', '2017-03-23 22:16:59', '', ''),
('5b1ea83c28de4a238266bcbfe9ed42d7', 'image/jpeg', '', 'jpg', 88242, NULL, '40468d031e064cc0a34280dcf830bee7', '2016-11-13 23:55:07', '2016-11-13 23:55:07', '', ''),
('5c817571fbbf49db8f434dd1a4bc1dab', 'text/plain', 'development_com.hw.handmadewatch.pem', 'pem', 3663, NULL, NULL, '2017-04-12 00:19:59', '2017-04-12 00:19:59', '', ''),
('5e91f08487f3472da626aa974f7da513', 'image/jpeg', '1451991858689614604.jpg', 'jpg', 49941, NULL, '40468d031e064cc0a34280dcf830bee7', '2016-12-15 05:09:50', '2016-12-15 05:09:50', '', ''),
('600de5951fb14c4a8a4e07e965ed72e4', 'image/jpeg', 'watch6.jpg', 'jpg', 81193, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-03-21 21:28:48', '2017-03-21 21:28:48', '', ''),
('6058eecfa2fb484d9919a9972cb263ae', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-11 22:38:31', '2017-04-11 22:38:31', '', ''),
('61233d760ae440f582626e53e945fd6c', 'image/jpeg', 'co-viet-nam-2.jpg', 'jpg', 33115, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:49:32', '2018-03-15 09:49:32', '', ''),
('6137b85b573e4906a8d89ec5d1ea48d2', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-11 22:31:07', '2017-04-11 22:31:07', '', ''),
('6380d45ee5c2466d9a1d0cc4be4f27f4', 'image/jpeg', 'watch2.jpg', 'jpg', 182652, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-03-21 04:16:11', '2017-03-21 04:16:11', '', ''),
('6595b66cd23545e486f319fdd073930c', 'image/jpeg', '77198a9f5a744e518beb40dca21743fc.jpg', 'jpg', 76454, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:32:45', '2018-03-15 09:32:45', '', ''),
('66f53f94144242afbd53fd5f25d1795c', 'image/jpeg', 'watch2.jpg', 'jpg', 182652, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-03-21 21:28:32', '2017-03-21 21:28:32', '', ''),
('67a5dff881ac401e8c9bceaaa05403f8', 'image/jpeg', 'f36c273487e4b610c12be1549aec14df.jpg', 'jpg', 55908, NULL, '40468d031e064cc0a34280dcf830bee7', '2017-02-13 23:40:21', '2017-02-13 23:40:21', '', ''),
('6bbf8aa0d4eb4d92a0d6be32eedf4fc6', 'image/jpeg', '4632292-2736548823-Batma.jpg', 'jpg', 283079, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 23:42:38', '2017-05-09 23:42:38', '', ''),
('6bcc4142067b4510883fd482727d4ed8', 'image/jpeg', 'b.jpg', 'jpg', 32693, NULL, 'fe74752979e84ba6acdf43be6bd9de15', '2017-03-21 05:29:57', '2017-03-21 05:29:57', '', ''),
('6bd09e4a0aee48548f15710f03643313', 'image/jpeg', '', 'jpg', 85419, NULL, '40468d031e064cc0a34280dcf830bee7', '2016-11-13 23:56:03', '2016-11-13 23:56:03', '', ''),
('6c618d9fd8594ee3bb6b2a09ec243d43', 'image/png', 'IMG_04052017_005145_0.png', 'png', 168425, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-08 21:43:20', '2017-05-08 21:43:20', '', ''),
('6e55f5116cfe4fab8fb8116488354a71', 'text/plain', 'account_tis.txt', 'txt', 143, NULL, 'fe74752979e84ba6acdf43be6bd9de15', '2017-03-21 05:35:50', '2017-03-21 05:35:50', '', ''),
('6ed54a9856444474b38014a197738578', 'image/jpeg', 'tissot-t-navigator-automatic-black-dial-men_s-watch-t0624301105700_3.jpg', 'jpg', 94169, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:09:00', '2018-03-15 09:09:00', '', ''),
('72615cfff3794b348fa43458e066244c', 'image/png', '3123.png', 'png', 475955, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 05:28:55', '2017-05-09 05:28:55', '', ''),
('73a2b82c731d46f4a66f12cdd83e6c9b', 'image/jpeg', 'image.jpg', 'jpg', 115697, NULL, 'd207d47f235e4edd9169db025931acce', '2017-04-08 03:28:05', '2017-04-08 03:28:05', '', ''),
('73eb4e4ab7814f1b8d0cc1041ae1f7a0', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-11 22:35:08', '2017-04-11 22:35:08', '', ''),
('751439dab0584f87a819217986968b9f', 'application/octet-stream', 'development_com.hw.handmadewatch.p12', 'p12', 3104, NULL, NULL, '2017-04-12 00:19:43', '2017-04-12 00:19:43', '', ''),
('77bbaa1a56ce43318bb43f68b9fa7529', 'image/jpeg', 'image.jpg', 'jpg', 115697, NULL, 'd207d47f235e4edd9169db025931acce', '2017-04-08 03:28:22', '2017-04-08 03:28:22', '', ''),
('85add5a959f0426892cd3e38fe677c6f', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-12 07:14:56', '2017-04-12 07:14:56', '', ''),
('867117f1b6a644afb5223cac11d2b339', 'image/jpeg', 'dong-ho-thuy-sy-tissot-chinh-hang.jpg', 'jpg', 44707, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-16 03:49:25', '2018-03-16 03:49:25', '', ''),
('88b473f75ae347a68bc6511fcc6407b3', 'text/plain', 'development_com.hw.handmadewatch.pem', 'pem', 3663, NULL, NULL, '2017-04-11 23:59:54', '2017-04-11 23:59:54', '', ''),
('89214ceeef184eb6a7bda880d7c7d2c7', 'image/jpeg', 'b4.jpg', 'jpg', 28317, NULL, 'fe74752979e84ba6acdf43be6bd9de15', '2017-03-21 05:41:51', '2017-03-21 05:41:51', '', ''),
('8c28850d48664d48ac564c03dea01f62', 'image/jpeg', 'picture1688271406jpg', '', 14295, NULL, '89f3083a29b64dfc85b889187e7c0efd', '2017-05-12 22:41:08', '2017-05-12 22:41:08', '', ''),
('8fcffe2979354e20bc3e68efb50c31cd', 'image/jpeg', 'b.jpg', 'jpg', 32693, NULL, 'fe74752979e84ba6acdf43be6bd9de15', '2017-03-21 05:29:58', '2017-03-21 05:29:58', '', ''),
('90f5df0f388c41eaa83da6fba38aa53c', 'image/jpeg', 'tory-burch-reva-ivory-dial-ladies-gold-tone-watch-trb4011.jpg', 'jpg', 82008, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:14:18', '2018-03-15 09:14:18', '', ''),
('931d434a98c74e1696825b3fa92527a6', 'image/jpeg', 'image.jpg', 'jpg', 7299, NULL, 'de00d6c8ba924c49a37ac4e35c8307c1', '2017-04-08 03:40:09', '2017-04-08 03:40:09', '', ''),
('9aaf07e7697b414aa3dc0309c164de07', 'image/jpeg', 'AE-1200WHD-1AVDF.jpg', 'jpg', 159790, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-16 03:53:11', '2018-03-16 03:53:11', '', ''),
('9e1d3c7669a54cddbfcf47d81cb02fb7', 'image/jpeg', 'image.jpg', 'jpg', 86199, NULL, '03eda67c149d4dd892f699baf8915d76', '2017-04-07 23:21:32', '2017-04-07 23:21:32', '', ''),
('9f9d1e0fdcb7474181259583a015e21c', 'image/jpeg', '14438801_588015274719460_1957169940_o.jpg', 'jpg', 355167, NULL, '40468d031e064cc0a34280dcf830bee7', '2016-12-21 05:27:11', '2016-12-21 05:27:11', '', ''),
('a0a01d96aa0349afaaabb3dc54df76e6', 'image/jpeg', 'image.jpg', 'jpg', 7299, NULL, 'de00d6c8ba924c49a37ac4e35c8307c1', '2017-04-08 03:50:44', '2017-04-08 03:50:44', '', ''),
('a1d694378525477cbc7162233a53d6fd', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-11 22:33:07', '2017-04-11 22:33:07', '', ''),
('a2c1e871ba0a42e28ecf0a223a93f802', 'image/jpeg', 'b.jpg', 'jpg', 32693, NULL, 'fe74752979e84ba6acdf43be6bd9de15', '2017-03-21 05:29:57', '2017-03-21 05:29:57', '', ''),
('a532d388c4324f84acfc255e42b44e9d', 'image/jpeg', 'raymond-weil-tradition-white-dial-stainless-steel-men_s-watch-5576-st-00300_3.jpg', 'jpg', 99377, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:19:15', '2018-03-15 09:19:15', '', ''),
('a8eb20c19a2a49bbaad417391ec125f6', 'image/png', 'anaqa.png', 'png', 496413, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 04:17:26', '2017-05-09 04:17:26', '', ''),
('a93c1e861e934bfcba2342a06994acdd', 'image/jpeg', '13301319_898902193568680_8780259034427414960_o-390x520.jpg', 'jpg', 24172, NULL, '23ac268bfcfd49e486ed02d34646ff8f', '2018-03-15 07:30:14', '2018-03-15 07:30:14', '', ''),
('aafa5dd4eb5645f58c21cbc419e48346', 'image/jpeg', 'batman-arkham-knight-gamescom-5-jpg.jpg', 'jpg', 362314, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 23:42:19', '2017-05-09 23:42:19', '', ''),
('af89805638c84a75a447bb6dfc41905f', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-18 01:20:40', '2017-04-18 01:20:40', '', ''),
('b2f7af8622964312978001cb136e8c3e', 'image/png', '3123.png', 'png', 475955, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 04:16:45', '2017-05-09 04:16:45', '', ''),
('b30660c76cf84441af511c3d153d7677', 'image/jpeg', 'e655e091d52742c992fa704247523e29.jpg', 'jpg', 77385, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:35:00', '2018-03-15 09:35:00', '', ''),
('b30866cae05d40b4be19c8d478cd1041', 'image/jpeg', '51Gn21tFnRL._AC_UL260_SR200,260_.jpg', 'jpg', 16735, NULL, '40468d031e064cc0a34280dcf830bee7', '2017-02-13 23:42:12', '2017-02-13 23:42:12', '', ''),
('b5882d516a70409eb57356d043f3cf68', 'image/jpeg', 'nhung-thuong-hieu-dong-ho-noi-tieng-the-gioi.jpg', 'jpg', 703575, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 08:51:18', '2018-03-15 08:51:18', '', ''),
('b7775abe80b44182b49cca5692700f03', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-18 21:24:01', '2017-04-18 21:24:01', '', ''),
('b8ee0c9a0dcc4b129709d708ec081168', 'image/jpeg', 'image.jpg', 'jpg', 7299, NULL, '2fff16b71bc044f18d87d3dab9873df5', '2017-04-07 06:59:47', '2017-04-07 06:59:47', '', ''),
('b910e4da97624d1cbc4173b7ed190c96', 'image/png', 'B0.6.png', 'png', 26064, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 23:29:40', '2017-05-09 23:29:40', '', ''),
('b9a30150b4a14f0fa117933339e2a1eb', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, 'c0e59669f7144892b03b5ddbfda296f2', '2017-04-07 04:02:24', '2017-04-07 04:02:24', '', ''),
('bf0c4f7a3f63479190be2c061948c730', 'image/jpeg', '1815a86e6cfe80171c56f641694bf1e1.jpg', 'jpg', 74069, NULL, '40468d031e064cc0a34280dcf830bee7', '2016-12-15 05:10:24', '2016-12-15 05:10:24', '', ''),
('c2cd37fb39794f61adcf226549a47d46', 'image/jpeg', 'image.jpg', 'jpg', 7299, NULL, 'de00d6c8ba924c49a37ac4e35c8307c1', '2017-04-08 03:50:20', '2017-04-08 03:50:20', '', ''),
('c36898d9dc4b45f19cf81fbb5d982be2', 'image/jpeg', 'citizen-eco-drive-perpetual-calendar-chronograph-mens-watch-bl5250-02l.jpg', 'jpg', 28821, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-02-17 08:15:24', '2017-02-17 08:15:24', '', ''),
('c58bdcddfc64435b8a96284d2405b514', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-13 13:01:52', '2017-04-13 13:01:52', '', ''),
('c623b4b6c26344bc9d93ae135f576442', 'image/jpeg', 'image.jpg', 'jpg', 415689, NULL, '03eda67c149d4dd892f699baf8915d76', '2017-04-07 23:22:13', '2017-04-07 23:22:13', '', ''),
('c9b499e9cd1b4ddba274ffb8eb80e2b8', 'image/jpeg', 'tory-burch-reva-ivory-dial-ladies-gold-tone-watch-trb4011_3.jpg', 'jpg', 98007, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:14:53', '2018-03-15 09:14:53', '', ''),
('caf95f70798146e58d6cc9956b98d813', 'image/jpeg', 'rw-5576-st-00300_2_4.jpg', 'jpg', 68726, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:19:31', '2018-03-15 09:19:31', '', ''),
('cb0ff3b2ce8f4420a6e9af91df8ea007', 'image/jpeg', 'b4.jpg', 'jpg', 28317, NULL, 'fe74752979e84ba6acdf43be6bd9de15', '2017-03-21 05:30:07', '2017-03-21 05:30:07', '', ''),
('cc5294971a154be8baed6e971b0ddfe9', 'image/png', 'IMG_04052017_005207_0.png', 'png', 90801, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-08 21:43:32', '2017-05-08 21:43:32', '', ''),
('ccb4e03cf01a488fa2b16428b4a319c8', 'image/jpeg', 'e949b07395e14127bd21fef168d495e4.jpg', 'jpg', 72198, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:26:18', '2018-03-15 09:26:18', '', ''),
('d05b4738fc644729aa09dca360f1575d', 'image/jpeg', 'watch4.jpg', 'jpg', 6447, NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-23 22:35:51', '2017-03-23 22:35:51', '', ''),
('d117be6bb17d44fcbf91d1b98823d55b', 'image/jpeg', 'g.jpg', 'jpg', 7871, NULL, 'f4cdd0b73a6f4bdc86893c255128b202', '2017-03-24 04:13:04', '2017-03-24 04:13:04', '', ''),
('d155c701d37643e5a03c13ee776aeccf', 'image/jpeg', 'image.jpg', 'jpg', 532223, NULL, '0073197fdfb0441ea6b6c93f6ad690cf', '2017-04-08 05:19:52', '2017-04-08 05:19:52', '', ''),
('d5312f00e5104d74a9fd96d32e0e222a', 'application/vnd.openxmlformats-o', 'Study_EN.xlsx', 'xlsx', 16487, NULL, 'fe74752979e84ba6acdf43be6bd9de15', '2017-03-21 05:36:03', '2017-03-21 05:36:03', '', ''),
('d93de83b00f9405b8f6c52d35fd4acc3', 'image/jpeg', 'picture548679671jpg', '', 14295, NULL, '89f3083a29b64dfc85b889187e7c0efd', '2017-05-12 22:37:58', '2017-05-12 22:37:58', '', ''),
('da7cbea955084afd9f008144bf300f01', 'image/jpeg', 'dongho_omega_OM_235_QI_1x800x800x4.jpg', 'jpg', 39381, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-16 03:51:26', '2018-03-16 03:51:26', '', ''),
('db7a386603574fb4b323fb712affab5c', 'image/jpeg', 'watch6.jpg', 'jpg', 81193, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-03-23 22:16:24', '2017-03-23 22:16:24', '', ''),
('e1feb3c433614b718d08a33688696241', 'image/jpeg', 'images.jpg', 'jpg', 17314, NULL, '65bdfe72645a45b4a126e2d3399b4d6b', '2018-03-15 14:15:34', '2018-03-15 14:15:34', '', ''),
('e97ff5d56426440aa28dfecc870048d4', 'text/plain', 'development_com.hw.handmadewatch.pem', 'pem', 3663, NULL, NULL, '2017-04-11 23:41:12', '2017-04-11 23:41:12', '', ''),
('ec08923142ca48238594979f499e73ae', 'image/jpeg', 'rw-5576-st-00300_2_4.jpg', 'jpg', 68726, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:26:42', '2018-03-15 09:26:42', '', ''),
('ed84ebd01408467d9ab3e77e4384f6db', 'image/jpeg', '929390ff37e0213ff37e2ad46290cd0c--anime-characters-video-game.jpg', 'jpg', 83726, NULL, 'd8869b9d12f94609a8e5fc9e47c9c883', '2018-03-15 14:09:28', '2018-03-15 14:09:28', '', ''),
('ee5cc777117049e886c3e3574167c6b5', 'image/jpeg', 'Nhung-mau-dong-ho-nam-dep-duoi-2-trieu (1).jpg', 'jpg', 186349, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:23:19', '2018-03-15 09:23:19', '', ''),
('f0aeefbfa335473285c2584d31df6b1d', 'image/jpeg', 'tissot-t-navigator-automatic-black-dial-men_s-watch-t0624301105700_2.jpg', 'jpg', 91052, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-15 09:08:43', '2018-03-15 09:08:43', '', ''),
('f2f5cf8ac35041d6a4cf8c1e30039db5', 'image/jpeg', 'image.jpg', 'jpg', 5654, NULL, '03eda67c149d4dd892f699baf8915d76', '2017-04-07 23:21:55', '2017-04-07 23:21:55', '', ''),
('f3c03b7399a44cf3a1b540d582231a85', 'image/jpeg', '11058410_1374803886178522_3013968916252837593_n.jpg', 'jpg', 64330, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 05:29:17', '2017-05-09 05:29:17', '', ''),
('f4f7731bffef49fd81123af4bf20c291', 'image/png', '3312321.png', 'png', 53776, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 04:17:13', '2017-05-09 04:17:13', '', ''),
('f8ac0039985b49aeb13d9ee5501b0d3f', 'image/jpeg', 'b4.jpg', 'jpg', 28317, NULL, 'fe74752979e84ba6acdf43be6bd9de15', '2017-03-21 05:23:26', '2017-03-21 05:23:26', '', ''),
('f9517285a4e545d2961c1bf0e9093975', 'image/png', '3312321.png', 'png', 53776, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2017-05-09 05:29:07', '2017-05-09 05:29:07', '', ''),
('fe1d750be07d41388f3ad2e98e971585', 'image/jpeg', '', 'jpg', 93353, NULL, '40468d031e064cc0a34280dcf830bee7', '2016-11-13 23:47:32', '2016-11-13 23:47:32', '', ''),
('34be07876a584cd18293205854b84db2', 'image/png', 'Untitled.png', 'png', 237222, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-03-28 18:59:26', '2018-03-28 18:59:26', '', ''),
('90a896e9901447109638ce960ab5a86d', 'image/jpeg', 'wGbkADw.jpg', 'jpg', 168158, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:02:04', '2018-04-03 16:02:04', '', ''),
('06520aeaa23242398fb3fd82eeae1fe2', 'image/jpeg', 'BU0003-02P.jpg', 'jpg', 403727, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:06:54', '2018-04-03 16:06:54', '', ''),
('676b37cfe3574851878b8452a2c1a578', 'image/jpeg', 'Longines l2_518-5.jpg', 'jpg', 83197, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:09:18', '2018-04-03 16:09:18', '', ''),
('e5966448b551420aa04c4584b3919536', 'image/jpeg', 'tải xuống.jpg', 'jpg', 8764, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:09:36', '2018-04-03 16:09:36', '', ''),
('e5a75f16468642908f7f57dc8f1b54ba', 'image/jpeg', 'dong-ho-camera-quay-phim-hd-va-nut-ao-camera-b3dfda-1383315845.jpg', 'jpg', 168726, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:11:38', '2018-04-03 16:11:38', '', ''),
('368d71db8d4c41ee9ff80cc868019672', 'image/jpeg', 'as4.jpg', 'jpg', 76010, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:11:57', '2018-04-03 16:11:57', '', ''),
('92d2bbb6a4a741cb865d22135f09be65', 'image/jpeg', '126116_a_500.jpg', 'jpg', 159906, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:13:19', '2018-04-03 16:13:19', '', ''),
('4dc689cfb55f427a9045bbb552521d45', 'image/jpeg', 'donghocamerafull-hdd50708_orig.jpg', 'jpg', 88744, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:14:08', '2018-04-03 16:14:08', '', ''),
('a416f62ac2344f2fa7eb04005d190ccc', 'image/jpeg', 'donghocamerafull-hdd50708_orig.jpg', 'jpg', 88744, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:14:11', '2018-04-03 16:14:11', '', ''),
('42e730f1b64142d3b4ba669aed6349d8', 'image/jpeg', 'content_1.jpg', 'jpg', 377065, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:15:27', '2018-04-03 16:15:27', '', ''),
('75ddd4e819b74619aa53e2b5bdaab236', 'image/jpeg', 'NH8335-52EB1(1).jpg', 'jpg', 149434, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:16:29', '2018-04-03 16:16:29', '', ''),
('300a8e392c6c4bb9b10de0f3fbe2e4b3', 'image/jpeg', 'AT0796-54E_L.jpg', 'jpg', 109381, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:18:09', '2018-04-03 16:18:09', '', ''),
('6276e60478564db3933fe7328a2f76cf', 'image/jpeg', 'dong-ho-nam-citizen-at2360-59a-day-deo-kim-loai-mat-thuy-tinh-sapphire4.jpg', 'jpg', 50740, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:18:24', '2018-04-03 16:18:24', '', ''),
('2a18bba06196413f9454b596c10a0686', 'image/jpeg', 'RGA1951 PWB1.jpg', 'jpg', 917617, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:18:35', '2018-04-03 16:18:35', '', ''),
('0ed3f81d5e8342adb09759e29b9d0dfe', 'image/jpeg', 'T006_407_22_033_00(3).jpg', 'jpg', 244439, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:21:31', '2018-04-03 16:21:31', '', ''),
('bf4bf4797b324d71be394d8e6fb28e52', 'image/jpeg', '450__dong-ho-Citizen-AN3560-51E_1.jpg', 'jpg', 36543, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:22:09', '2018-04-03 16:22:09', '', ''),
('c431849098d74e1aaebff5a079feb94c', 'image/jpeg', '1453358766_news.jpg', 'jpg', 231135, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:22:40', '2018-04-03 16:22:40', '', ''),
('7c4465bb0f014cb19ee8e9213e027eca', 'image/jpeg', 'Hublot3.jpg', 'jpg', 89409, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:23:06', '2018-04-03 16:23:06', '', ''),
('0f2c7e769ad0404b9e5c4916b287299a', 'image/jpeg', 'aa.jpg', 'jpg', 10851, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:23:42', '2018-04-03 16:23:42', '', ''),
('097c69c408e44b6bb7d566ac889858c8', 'image/jpeg', 'ca.jpg', 'jpg', 43350, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:24:17', '2018-04-03 16:24:17', '', ''),
('20c8f3ec46da4d16b55ae700474ff2f4', 'image/jpeg', 'gia-bao-luxury-alange-01-1455.jpg', 'jpg', 64701, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-04-03 16:24:43', '2018-04-03 16:24:43', '', ''),
('92e0d05283934970bd6319374dfb1dec', 'image/jpeg', 'picture.jpg', 'jpg', 47234, NULL, '51063a8f859f42b78e1a28b19f5d21ce', '2018-05-01 08:53:52', '2018-05-01 08:53:52', '', ''),
('bc2f603633ea4277bfba28e66df99400', 'image/jpeg', 'picture.jpg', 'jpg', 47234, NULL, '51063a8f859f42b78e1a28b19f5d21ce', '2018-05-01 08:54:19', '2018-05-01 08:54:19', '', ''),
('4a4789556d45429087af5e9bb9dce9cf', 'image/jpeg', 'picture.jpg', 'jpg', 61189, NULL, 'fbd229ca07914bfe906107652a543c1f', '2018-05-06 19:57:46', '2018-05-06 19:57:46', '', ''),
('35b177f054a549c89b83bd82e3d9b99f', 'image/jpeg', 'picture.jpg', 'jpg', 61189, NULL, 'fbd229ca07914bfe906107652a543c1f', '2018-05-06 19:57:51', '2018-05-06 19:57:51', '', ''),
('0e65af306862499f8fb50bddd7026806', 'image/jpeg', 'picture.jpg', 'jpg', 61189, NULL, 'fbd229ca07914bfe906107652a543c1f', '2018-05-06 19:57:54', '2018-05-06 19:57:54', '', ''),
('3098c7032e3a4ab3bb464b7cac6a7fc8', 'image/jpeg', 'picture.jpg', 'jpg', 55297, NULL, '76aa05a1ec764a90904fc09925ef9bb8', '2018-05-12 17:32:53', '2018-05-12 17:32:53', '', ''),
('4d4bdf710a78442db430aceffeed995b', 'image/jpeg', 'picture1179124063jpg', '', 9236, NULL, '43ed304db70d403a8877bfa756919d5d', '2018-05-12 18:32:44', '2018-05-12 18:32:44', '', ''),
('42aa478a5ee144cabde9a8283c28ab3a', 'image/jpeg', 'picture.jpg', 'jpg', 59550, NULL, '43ed304db70d403a8877bfa756919d5d', '2018-05-12 19:00:25', '2018-05-12 19:00:25', '', ''),
('dba28a8c584e47a3a820d7b7f2837230', 'image/jpeg', 'picture1027584359jpg', '', 9236, NULL, '08c1ec9fa3744558acabca76a8a7955c', '2018-05-24 17:24:42', '2018-05-24 17:24:42', '', ''),
('72a0cb9ed30e4a478f02789818966bb6', 'image/jpeg', 'picture653026196jpg', '', 9236, NULL, '121ad9e587294a8389b19adc29157ab1', '2018-05-24 17:28:18', '2018-05-24 17:28:18', '', ''),
('63b24afa89eb46668073ba941d332dab', 'image/jpeg', 'picture1074459119jpg', '', 9236, NULL, '2ddf3edb0dff4d91aa1a6f746452c23b', '2018-05-24 17:29:17', '2018-05-24 17:29:17', '', ''),
('44267be8d47947329e3237dfbd0009af', 'image/jpeg', 'picture.jpg', 'jpg', 37832, NULL, 'cf5700ae4de04f7ca978754201e9cefe', '2018-05-24 17:39:31', '2018-05-24 17:39:31', '', ''),
('3359b033426f4f3c82068aa5371aeebd', 'image/jpeg', 'picture1677367247jpg', '', 9236, NULL, '4fff2eb8a47a4722a1b4a8b5c24aa9f0', '2018-05-24 17:44:36', '2018-05-24 17:44:36', '', ''),
('d9e85293c61548c88befbdcb11e578b0', 'image/png', 'Untitled.png', 'png', 1683893, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-10-18 17:10:26', '2018-10-18 17:10:26', '', ''),
('d16308c0ac324d6d9f25743545b46cbf', 'image/png', 'Untitled.png', 'png', 1683893, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-10-18 17:11:29', '2018-10-18 17:11:29', '', ''),
('7741163ddefb4ac4beb24a5aff2bc5f8', 'image/png', 'Untitled.png', 'png', 1683893, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-10-18 17:11:41', '2018-10-18 17:11:41', '', ''),
('7113ee3a99354bada4c9c201435731ac', 'image/png', 'Untitled.png', 'png', 1683893, NULL, 'de00d6c8ba924c49a37ac4e35c8307c0', '2018-10-18 17:47:21', '2018-10-18 17:47:21', '', ''),
('2fafd6c4472d420ab95aeee9e0cac8ab', 'image/png', 'Untitled.png', 'png', 190552, NULL, '49837bda85bc4745a23f76602145b8c7', '2018-10-25 06:20:07', '2018-10-25 06:20:07', '', ''),
('5f35516908844f90a9cb9b82274c88f2', 'image/png', 'logo1.png', 'png', 8026, NULL, NULL, '2018-11-10 08:32:18', '2018-11-10 08:32:18', '', ''),
('bb924327a61342acab7d3073264494e1', 'image/png', 'qr.png', 'png', 272525, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-13 09:07:25', '2018-11-13 09:07:25', '', ''),
('0b6be890d5784b43a1778a6eac5afbd0', 'image/png', 'qr.png', 'png', 272525, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-13 09:07:35', '2018-11-13 09:07:35', '', ''),
('e1f7a78eff9d424fb5111ec4926c660b', 'image/png', 'qr.png', 'png', 272525, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-13 09:07:46', '2018-11-13 09:07:46', '', ''),
('181307118b1742bf8c451e3789bc8da1', 'image/png', 'qr.png', 'png', 272525, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-13 09:08:26', '2018-11-13 09:08:26', '', ''),
('f62cd972f2ba401abd78492de7c65da2', 'image/png', 'qr.png', 'png', 272525, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-13 09:08:39', '2018-11-13 09:08:39', '', ''),
('4ebed40898584cf3a0910572d6368b7c', 'image/png', 'qr.png', 'png', 272525, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-14 01:31:59', '2018-11-14 01:31:59', '', ''),
('bf8c4cd92631440598605a9a1958ff92', 'image/png', 'qr.png', 'png', 272525, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-19 03:03:53', '2018-11-19 03:03:53', '', ''),
('bfff26c5160848e797d51f5e8a5fa338', 'image/jpeg', 'slide1.jpeg', 'jpeg', 181983, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-19 06:10:49', '2018-11-19 06:10:49', '', ''),
('55ef3196a9e744be97e69a538af12ffb', 'image/png', 'logo1.png', 'png', 8026, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 14:43:38', '2018-11-22 14:43:38', '', ''),
('75ee67f84a914fd7bb7766d6baed50f3', 'image/png', 'Untitled.png', 'png', 234732, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 14:46:14', '2018-11-22 14:46:14', '', ''),
('d3398c869a54463d94086573680765df', 'image/png', 'right-head.png', 'png', 325141, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:17:01', '2018-11-22 16:17:01', '', ''),
('0ec9635f528a4e3286c5d3781da9c3ff', 'image/png', 'logo1.png', 'png', 8026, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:18:06', '2018-11-22 16:18:06', '', ''),
('3bbe7220c1ba47d09baaf4788a1159f4', 'image/jpeg', 'a74ad333d883d58ca2e85c57e83f37bc.jpg', 'jpg', 33174, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:20:17', '2018-11-22 16:20:17', '', ''),
('c6a42fea13a54dd2a02c1a384a6e8dbb', 'image/jpeg', 'Huong_goexplore_vi2.jpg', 'jpg', 72401, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:21:26', '2018-11-22 16:21:26', '', ''),
('ecdcc695a79c41bcbf8aa3d7be6477ed', 'image/jpeg', 'Huong_goexplore_vi2.jpg', 'jpg', 72401, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:28:21', '2018-11-22 16:28:21', '', ''),
('07522f81fa4945c68e335a90d961fa96', 'image/png', 'logo1.png', 'png', 8026, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-23 11:17:32', '2018-11-23 11:17:32', '', ''),
('b709f95a07b14e4680ac2e59b5cdaaae', 'image/png', '3-02.png', 'png', 1963469, NULL, 'daa219be89424aceb7a04a531f793954', '2018-11-27 10:00:12', '2018-11-27 10:00:12', '', ''),
('4f165e3d6e7240309e38f73616f86f49', 'image/jpeg', '', '', 66057, NULL, NULL, '2018-11-28 16:17:43', '2018-11-28 16:17:43', '1086', '1086'),
('04066a9dbf1b49ec8ce46ac401ba989d', 'image/png', '', '', 6820, NULL, NULL, '2018-11-29 10:49:38', '2018-11-29 10:49:38', '512', '512'),
('d027fc453c9f41a291a015828085a878', 'image/png', '', '', 6820, NULL, NULL, '2018-11-29 11:26:55', '2018-11-29 11:26:55', '512', '512'),
('7d246b7bff52404bbafcddd58b1f62a4', 'image/jpeg', 'music3.jpg', 'jpg', 107226, NULL, 'daa219be89424aceb7a04a531f793954', '2018-12-03 20:45:07', '2018-12-03 20:45:07', '', ''),
('63a63d5bd93c4db4ab208a09c0eb85e5', 'image/jpeg', 'music3.jpg', 'jpg', 107226, NULL, 'daa219be89424aceb7a04a531f793954', '2018-12-04 18:51:09', '2018-12-04 18:51:09', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(122, '2014_10_12_000000_create_users_table', 1),
(123, '2014_10_12_100000_create_password_resets_table', 1),
(134, '2018_11_06_100452_create_projects_table', 2),
(136, '2018_11_14_215642_create_categories_table', 3),
(140, '2018_11_19_092019_edit_project_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission_group_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `seo_title` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `seo_description` varchar(225) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `expiration_date` datetime DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_id` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_slide` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `description`, `content`, `seo_title`, `seo_description`, `publish_date`, `expiration_date`, `tags`, `image_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `is_slide`) VALUES
('c1e62741789e41adb8454eef1c5c08c6', 'bài báo 1', 'ĐOạn này được viết để mô tả sapo. \r\n', '<div class=\"youtube-embed-wrapper\" style=\"position:relative;padding-bottom:56.25%;padding-top:30px;height:0;overflow:hidden\"><iframe allow=\";\" allowfullscreen=\"\" frameborder=\"0\" height=\"360\" src=\"https://www.youtube.com/embed/YIJjrSD3uXM\" style=\"position:absolute;top:0;left:0;width:100%;height:100%\" width=\"640\"></iframe></div>\r\n\r\n<p>hello</p>\r\n', '', '', NULL, NULL, '', '07522f81fa4945c68e335a90d961fa96', '2018-10-18 16:28:04', '2018-12-03 17:14:40', 'de00d6c8ba924c49a37ac4e35c8307c0', 'daa219be89424aceb7a04a531f793954', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

CREATE TABLE `post_categories` (
  `post_id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`post_id`, `category_id`, `created_at`, `updated_at`) VALUES
('48f7c4bc73e24dfcb71c39feb5b02822', '19dbda3b07634ff7b3e6d58307926d70', NULL, NULL),
('59f376e524fb4337a4e4329256ba55c6', '19dbda3b07634ff7b3e6d58307926d70', NULL, NULL),
('6e3d6c6e40de4e69a9929d4db18f330a', '19dbda3b07634ff7b3e6d58307926d70', NULL, NULL),
('f0c13dcc63194ac8a8430e68c33b01fe', '19dbda3b07634ff7b3e6d58307926d70', NULL, NULL),
('2cc17dc5372c47e0a1185cb7f9e4bca3', 'c3fbf898a7c3478582bd46706de83453', NULL, NULL),
('283f78b9bf44483e8d0901ef275452a0', 'c3fbf898a7c3478582bd46706de83453', NULL, NULL),
('de0e66f130844427a033feb0dd5bde6c', '19dbda3b07634ff7b3e6d58307926d70', NULL, NULL),
('d61c5b70b68d4de18bc72b3cf806a6a6', '19dbda3b07634ff7b3e6d58307926d70', NULL, NULL),
('cc2c3c9f8f1a4cc9bb0dfaabe795e20b', '19dbda3b07634ff7b3e6d58307926d70', NULL, NULL),
('bd4e972c35d4419fb99d8bb816f57042', '19dbda3b07634ff7b3e6d58307926d70', NULL, NULL),
('5d96fbb8bb0c4400b18522f54c401a7b', 'c3fbf898a7c3478582bd46706de83453', NULL, NULL),
('986f74a97f544c7f9e8d71976058710b', 'c3fbf898a7c3478582bd46706de83453', NULL, NULL),
('959baaa9d1ec455489412437615c5b33', '0a88b7c134a14a0c82fb1b89cbc9afc9', NULL, NULL),
('ee280a92a3fe459cb47ce5af78b03919', '0a88b7c134a14a0c82fb1b89cbc9afc9', NULL, NULL),
('d87fea5dc10d401fa6e2612a1e59a026', '0a88b7c134a14a0c82fb1b89cbc9afc9', NULL, NULL),
('1ca4060a1669413f8e15c47770d9bcbb', '0a88b7c134a14a0c82fb1b89cbc9afc9', NULL, NULL),
('0aa3ffa4d4974294a71e619c859e5925', '0a88b7c134a14a0c82fb1b89cbc9afc9', NULL, NULL),
('a0cd242801aa47b7a3238f73ab8f38a6', '0a88b7c134a14a0c82fb1b89cbc9afc9', NULL, NULL),
('435d0479b63a471193a239b23b1b09dd', '0a88b7c134a14a0c82fb1b89cbc9afc9', NULL, NULL),
('49c614dc037e47a09c9de2b8792b5fc4', '0a88b7c134a14a0c82fb1b89cbc9afc9', NULL, NULL),
('474d396db73c4e68aa3941c09509c13f', '0a88b7c134a14a0c82fb1b89cbc9afc9', NULL, NULL),
('ab28d4c22cc7495e95526aeab8d88b19', '0a88b7c134a14a0c82fb1b89cbc9afc9', NULL, NULL),
('bdc2729176f54d3e9eadb370200461a4', '5161996a37a74500ac0d76600f2546e9', NULL, NULL),
('26e2f66bda254568a4fb9a3c969d39ef', '5161996a37a74500ac0d76600f2546e9', NULL, NULL),
('d1613f7ba177493f88048617b1f2a356', '6f7ad9ce0ab744409c1df98df80d61ea', NULL, NULL),
('1d1c49884c0c4907b99f9deb093ceb5a', 'cb97c2c004a94fe8905f125f8a47fa9f', NULL, NULL),
('3f1e4124ac2b4adf93b9ea6bf0eed5dc', '5161996a37a74500ac0d76600f2546e9', NULL, NULL),
('45c0c912a94b40ebb34c1d29773cfca4', 'cb97c2c004a94fe8905f125f8a47fa9f', NULL, NULL),
('2e490e987bbe4c9db7fe05f8b6b1c494', '1da21f0c6e8f47bc8393adf767bb46a6', NULL, NULL),
('0cf16c66bc014ad9b2253f2a0a5b7eef', 'cbec539eda9942e092947ffdfa943381', NULL, NULL),
('05ddb84ad8994fb68e655556749b7755', '1da21f0c6e8f47bc8393adf767bb46a6', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_media`
--

CREATE TABLE `post_media` (
  `post_id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `media_id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_media`
--

INSERT INTO `post_media` (`post_id`, `media_id`, `created_at`, `updated_at`) VALUES
('3ad6428a048544afae8fd8dd91edee33', '4a77da93f6c643dea22c1a085d066e6c', NULL, NULL),
('59f376e524fb4337a4e4329256ba55c6', 'fe1d750be07d41388f3ad2e98e971585', NULL, NULL),
('6e3d6c6e40de4e69a9929d4db18f330a', '3a5abac9c7df4213a910b57446aff0a8', NULL, NULL),
('f0c13dcc63194ac8a8430e68c33b01fe', '5b1ea83c28de4a238266bcbfe9ed42d7', NULL, NULL),
('48f7c4bc73e24dfcb71c39feb5b02822', 'b30866cae05d40b4be19c8d478cd1041', NULL, NULL),
('48f7c4bc73e24dfcb71c39feb5b02822', '3f3bdbf39a6b4b0f803f1182d3230064', NULL, NULL),
('48f7c4bc73e24dfcb71c39feb5b02822', 'c36898d9dc4b45f19cf81fbb5d982be2', NULL, NULL),
('bd4e972c35d4419fb99d8bb816f57042', '1f0a8189198b416c8686f8b5ec7dc071', NULL, NULL),
('2cc17dc5372c47e0a1185cb7f9e4bca3', '6380d45ee5c2466d9a1d0cc4be4f27f4', NULL, NULL),
('cc2c3c9f8f1a4cc9bb0dfaabe795e20b', '66f53f94144242afbd53fd5f25d1795c', NULL, NULL),
('cc2c3c9f8f1a4cc9bb0dfaabe795e20b', '600de5951fb14c4a8a4e07e965ed72e4', NULL, NULL),
('cc2c3c9f8f1a4cc9bb0dfaabe795e20b', '0bfe1ac2ee62454086e3af3166d531e2', NULL, NULL),
('5d96fbb8bb0c4400b18522f54c401a7b', 'db7a386603574fb4b323fb712affab5c', NULL, NULL),
('986f74a97f544c7f9e8d71976058710b', '5b067f1d91464987a028a0f42fce16a9', NULL, NULL),
('2cc17dc5372c47e0a1185cb7f9e4bca3', '6c618d9fd8594ee3bb6b2a09ec243d43', NULL, NULL),
('2cc17dc5372c47e0a1185cb7f9e4bca3', 'cc5294971a154be8baed6e971b0ddfe9', NULL, NULL),
('48f7c4bc73e24dfcb71c39feb5b02822', '36911a214e8a4310a3cbc1260b1db942', NULL, NULL),
('ee280a92a3fe459cb47ce5af78b03919', 'b2f7af8622964312978001cb136e8c3e', NULL, NULL),
('ee280a92a3fe459cb47ce5af78b03919', 'f4f7731bffef49fd81123af4bf20c291', NULL, NULL),
('ee280a92a3fe459cb47ce5af78b03919', 'a8eb20c19a2a49bbaad417391ec125f6', NULL, NULL),
('ee280a92a3fe459cb47ce5af78b03919', '31f9028f5ed4402dbf09795679511ab1', NULL, NULL),
('d87fea5dc10d401fa6e2612a1e59a026', '43031b23e2ae418d879739f480e806fb', NULL, NULL),
('0aa3ffa4d4974294a71e619c859e5925', '72615cfff3794b348fa43458e066244c', NULL, NULL),
('0aa3ffa4d4974294a71e619c859e5925', 'f9517285a4e545d2961c1bf0e9093975', NULL, NULL),
('0aa3ffa4d4974294a71e619c859e5925', 'f3c03b7399a44cf3a1b540d582231a85', NULL, NULL),
('a0cd242801aa47b7a3238f73ab8f38a6', '002724ecdad24c999e2a5aa707e11c83', NULL, NULL),
('435d0479b63a471193a239b23b1b09dd', 'b910e4da97624d1cbc4173b7ed190c96', NULL, NULL),
('49c614dc037e47a09c9de2b8792b5fc4', '3b353718e4754275be4bf0da5410fb12', NULL, NULL),
('474d396db73c4e68aa3941c09509c13f', '3eeb21a96d0040b49ad7fcc83f61b609', NULL, NULL),
('ab28d4c22cc7495e95526aeab8d88b19', 'aafa5dd4eb5645f58c21cbc419e48346', NULL, NULL),
('ab28d4c22cc7495e95526aeab8d88b19', '6bbf8aa0d4eb4d92a0d6be32eedf4fc6', NULL, NULL),
('ab28d4c22cc7495e95526aeab8d88b19', '3fad6e9e67e94b76a50e00e2892796d3', NULL, NULL),
('bdc2729176f54d3e9eadb370200461a4', '2a18bba06196413f9454b596c10a0686', NULL, NULL),
('bdc2729176f54d3e9eadb370200461a4', '6276e60478564db3933fe7328a2f76cf', NULL, NULL),
('bdc2729176f54d3e9eadb370200461a4', '300a8e392c6c4bb9b10de0f3fbe2e4b3', NULL, NULL),
('26e2f66bda254568a4fb9a3c969d39ef', '368d71db8d4c41ee9ff80cc868019672', NULL, NULL),
('26e2f66bda254568a4fb9a3c969d39ef', 'e5a75f16468642908f7f57dc8f1b54ba', NULL, NULL),
('d1613f7ba177493f88048617b1f2a356', 'a416f62ac2344f2fa7eb04005d190ccc', NULL, NULL),
('d1613f7ba177493f88048617b1f2a356', '4dc689cfb55f427a9045bbb552521d45', NULL, NULL),
('d1613f7ba177493f88048617b1f2a356', '92d2bbb6a4a741cb865d22135f09be65', NULL, NULL),
('1d1c49884c0c4907b99f9deb093ceb5a', '42e730f1b64142d3b4ba669aed6349d8', NULL, NULL),
('3f1e4124ac2b4adf93b9ea6bf0eed5dc', 'e5966448b551420aa04c4584b3919536', NULL, NULL),
('3f1e4124ac2b4adf93b9ea6bf0eed5dc', '676b37cfe3574851878b8452a2c1a578', NULL, NULL),
('45c0c912a94b40ebb34c1d29773cfca4', '06520aeaa23242398fb3fd82eeae1fe2', NULL, NULL),
('0cf16c66bc014ad9b2253f2a0a5b7eef', '75ddd4e819b74619aa53e2b5bdaab236', NULL, NULL),
('05ddb84ad8994fb68e655556749b7755', '34be07876a584cd18293205854b84db2', NULL, NULL),
('2e490e987bbe4c9db7fe05f8b6b1c494', '90a896e9901447109638ce960ab5a86d', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expense` double(30,4) DEFAULT NULL,
  `plan_days` int(11) DEFAULT NULL,
  `open_port_date` datetime DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_phone_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_bank_owner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_bank_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_bank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_bank_branch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_tax_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_introduce_member` longtext COLLATE utf8_unicode_ci,
  `avatar_id` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `headline` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `video_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_project` longtext COLLATE utf8_unicode_ci,
  `project_plan` longtext COLLATE utf8_unicode_ci,
  `project_use` longtext COLLATE utf8_unicode_ci,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_slide` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `category_id`, `category_name`, `expense`, `plan_days`, `open_port_date`, `user_type`, `user_company_name`, `user_position`, `user_address`, `user_phone_number`, `user_email`, `user_bank_owner`, `user_bank_number`, `user_bank_name`, `user_bank_branch`, `user_tax_number`, `user_introduce_member`, `avatar_id`, `headline`, `video_url`, `about_project`, `project_plan`, `project_use`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `is_slide`) VALUES
('0f5d7768d6e14b739bf543bb11ae9ce4', 'ac', '4948f994990d4c49808f42d71dc3d505', NULL, 60000.0000, 100, '2017-08-07 00:00:00', NULL, '', '', '', '', '', '', '', '', '', '', '', NULL, '', '', '', '', '', 'draft', 'daa219be89424aceb7a04a531f793954', 'daa219be89424aceb7a04a531f793954', '2018-11-24 11:44:01', '2018-11-24 11:44:28', NULL),
('3993fdcc0c4d43d198513e73790f7a6f', 'dự án của á', '17b611132b104f2596dfb4412e614c9a', NULL, 20000.0000, 44444444, '2017-01-01 14:05:00', NULL, '', '', '', '', '', '', '', '', '', '', '', 'b709f95a07b14e4680ac2e59b5cdaaae', '', '', '', '', '', 'draft', 'daa219be89424aceb7a04a531f793954', 'daa219be89424aceb7a04a531f793954', '2018-11-27 09:59:25', '2018-11-27 10:00:12', NULL),
('49a8124d936c4a17b14f41fab164ba40', 'Lò hầm than đôi đa năng sử dụng phương pháp nhiệt phân kết hợp', 'a1c4e9faf7a04d30984f6f788dde59b9', NULL, 15000000.0000, 30, '2018-12-17 18:00:00', NULL, '', '', '', '', '', '', '', '', '', '', '', 'ecdcc695a79c41bcbf8aa3d7be6477ed', 'Lò hầm than đôi đa năng sử dụng phương pháp nhiệt phân kết hợp', '', '<p>giới thiệu</p>\r\n', '<p>nội dung</p>\r\n', '<p>kế hoạch</p>\r\n', 'online', 'daa219be89424aceb7a04a531f793954', 'daa219be89424aceb7a04a531f793954', '2018-11-22 16:27:16', '2018-11-22 16:30:15', NULL),
('6f5ab3e190dc4b7a9966365b24d6c7ff', '123', NULL, 'vật lý', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'draft', 'daa219be89424aceb7a04a531f793954', NULL, '2018-11-30 18:30:20', '2018-11-30 18:30:20', NULL),
('967c4c2ba65b468cae763be3bc79edd3', 'dự án đầu tiên', 'e270f1a5204645d7b1f66d2cecfbcc4f', NULL, 5000000.0000, 40, '2018-12-06 07:00:00', NULL, '', '', '', '', '', '', '', '', '', '', '', 'c6a42fea13a54dd2a02c1a384a6e8dbb', 'Nguyễn Tú Tuấn đã ra mắt quyển sách Origami Thế giới Đại dương, là quyển sách hướng dẫn Origami đầu tiên hoàn toàn do Việt Nam thực hiện từ ý tưởng', '', '<p>English below]</p>\r\n\r\n<p>Bạn ch&aacute;n ngấy cuộc sống văn ph&ograve;ng tẻ nhạt k&eacute;o d&agrave;i mỗi ng&agrave;y từ 8 giờ s&aacute;ng đến 6 giờ chiều? Bạn ng&aacute;n ngẩm khi tới giảng đường nghe c&aacute;c b&agrave;i giảng l&iacute; thuyết kh&ocirc; cứng về những bộ m&ocirc;n m&igrave;nh kh&ocirc;ng hề đam m&ecirc;? Hay mệt mỏi v&igrave; phải v&ugrave;i đầu v&agrave;o đống s&aacute;ch vở để c&oacute; được tấm bằng trong lĩnh vực m&igrave;nh kh&ocirc;ng hề y&ecirc;u th&iacute;ch?</p>\r\n\r\n<p><strong>H&atilde;y bước ra khỏi &lsquo;v&ugrave;ng an to&agrave;n&rsquo;!</strong>&nbsp;C&ugrave;ng ch&uacute;ng t&ocirc;i kh&aacute;m ph&aacute; những ch&acirc;n trời mới, gặp gỡ bạn b&egrave; năm ch&acirc;u v&agrave; tạo ra những trải nghiệm đầy &yacute; nghĩa.</p>\r\n\r\n<p>Go Explore l&agrave; dự &aacute;n du lịch cộng đồng nhằm quảng b&aacute; văn h&oacute;a nghệ thuật v&agrave; du lịch Vi&ecirc;t Nam bằng viết blog v&agrave; quay video. Dự &aacute;n được khởi tạo bởi những travel blogger, videographer, v&agrave; c&aacute;c bạn trẻ y&ecirc;u x&ecirc; dịch tr&ecirc;n khắp Việt Nam.</p>\r\n\r\n<p><strong>C&aacute;c hoạt động của Go Explore team:</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Travel:</strong>&nbsp;Phượt xuy&ecirc;n Việt trong 30 ng&agrave;y để s&aacute;ng tạo 10 thước phim ngắn, h&igrave;nh ảnh v&agrave; b&agrave;i viết về 10 địa danh du lịch để quảng b&aacute; văn ho&aacute; nghệ thuật Việt Nam theo một c&aacute;ch ho&agrave;n to&agrave;n mới.</li>\r\n	<li><strong>Work:</strong>&nbsp;Tổ chức chuỗi sự kiện mang chủ đề x&ecirc; dịch ở Hồ Ch&iacute; Minh, Đ&agrave; Nẵng, H&agrave; Nội (talkshow, triển l&atilde;m tranh ảnh, workshop) - gặp gỡ những kh&aacute;ch mời chia sẻ về c&aacute;ch thức &lsquo;l&agrave;m việc trong khi du lịch&rsquo;.</li>\r\n	<li><strong>Play:&nbsp;</strong>Kh&aacute;m ph&aacute; v&ocirc; số n&eacute;t đẹp văn ho&aacute; nghệ thuật ẩn giấu trong từng địa phương trải d&agrave;i khắp Việt Nam qua H<strong>ồ Ch&iacute; Minh &ndash; Mũi N&eacute; &ndash; Nha Trang &ndash; Quy Nhơn &ndash; Đ&agrave; Lạt &ndash; Hội An &ndash; Đ&agrave; Nẵng &ndash; Quảng B&igrave;nh &ndash; H&agrave; Nội.</strong></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"http://www.fundstart.vn/uploads/redactor_rails/picture/data/1049/Huong_goexplore_vi2.jpg\" /></p>\r\n\r\n<p><strong>Bạn tham gia Go Explore bằng c&aacute;ch n&agrave;o?</strong></p>\r\n\r\n<p>Ch&uacute;ng t&ocirc;i k&ecirc;u gọi những c&ocirc;ng ty du lịch, cộng đồng phượt v&agrave; bạn b&egrave; đam m&ecirc; x&ecirc; dịch c&ugrave;ng kết nối để x&acirc;y dựng một h&igrave;nh ảnh Việt Nam mới mẻ v&agrave; đa dạng trong mắt bạn b&egrave; quốc tế.</p>\r\n\r\n<p><strong>C&aacute;ch 1: Ủng hộ dự &aacute;n tr&ecirc;n Fundstart:</strong></p>\r\n\r\n<p>Trực tiếp t&agrave;i trợ kinh ph&iacute; cho dự &aacute;n theo c&aacute;c g&oacute;i tr&ecirc;n Fundstart để nhận được những qu&agrave; tặng hấp dẫn</p>\r\n\r\n<ul>\r\n	<li><strong>G&oacute;i 100k:</strong>&nbsp;Voucher đặt v&eacute; điện tử tr&ecirc;n baolau.vn (d&agrave;nh cho v&eacute; m&aacute;y bay, t&agrave;u hoả, xe kh&aacute;ch, t&agrave;u thuỷ ở Đ&ocirc;ng Nam &Aacute;</li>\r\n	<li><strong>G&oacute;i 300k</strong>: postcard v&agrave; qu&agrave; lưu niệm ở một trong 10 điểm thuộc h&agrave;nh tr&igrave;nh</li>\r\n	<li><strong>G&oacute;i 1 triệu:</strong>&nbsp;video v&agrave; b&agrave;i viết review cho c&aacute;c doanh nghiệp du lịch</li>\r\n	<li><strong>G&oacute;i 2 triệu:</strong>&nbsp;nhiều lợi &iacute;ch đặc biệt đối với nh&agrave; t&agrave;i trợ ch&iacute;nh thức của chương tr&igrave;nh</li>\r\n	<li><strong>G&oacute;i 3 triệu:</strong>&nbsp;tham gia Go Explore team trực tiếp tổ chức dự &aacute;n v&agrave; được miễn chi ph&iacute; đi lại</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://lh5.googleusercontent.com/2Mws_YmPFdEJCpgfnQEN8eDcakEaEPpx5oUCBvK68L2fA1MMMAlK9eZh2G6P1P67NR2qAv5LT1iNAsCbEDT8D3jX_EqP3-mu1Qgni3eohOjQV8SOZbC8spGkZnZ0danKumhnhylO\" /></p>\r\n\r\n<p><strong>C&aacute;ch 2: T&agrave;i trợ</strong></p>\r\n\r\n<p>Dự &aacute;n c&oacute; sự tham gia t&agrave;i trợ v&agrave; hợp t&aacute;c c&ugrave;ng c&aacute;c doanh nghiệp:</p>\r\n\r\n<ul>\r\n	<li>C&ocirc;ng ty du lịch</li>\r\n	<li>Tech start-up trong lĩnh vực du lịch</li>\r\n	<li>Kh&aacute;ch sạn, hostel, homestay, guesthouse</li>\r\n	<li>Co-working space, địa điểm tổ chức sự kiện/biểu diễn nghệ thuật</li>\r\n	<li>Nh&agrave; h&agrave;ng, cafe, ...</li>\r\n</ul>\r\n\r\n<p>H&igrave;nh thức t&agrave;i trợ: trải nghiệm dịch vụ du lịch miễn ph&iacute; (tour, kh&aacute;ch sạn, ...) hoặc chi ph&iacute; dự &aacute;n tr&ecirc;n Fundstart.vn</p>\r\n\r\n<p>Đừng bỏ lỡ cơ hội xuất hiện trong 1 trong 10 video của dự &aacute;n!&nbsp;<br />\r\nVui l&ograve;ng gửi y&ecirc;u cầu t&agrave;i trợ về goexplore.vn@gmail.com hoặc hotline 01642461480<br />\r\nĐăng k&yacute; t&agrave;i trợ:&nbsp;<a href=\"https://goo.gl/forms/lIwaSJHXf7FBWWXi1\">https://goo.gl/forms/lIwaSJHXf7FBWWXi1</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"http://www.fundstart.vn/uploads/redactor_rails/picture/data/1047/IMG_9744.jpg\" /></p>\r\n\r\n<p><strong>C&aacute;ch 3 : Tham gia Go Explore Team</strong></p>\r\n\r\n<p><strong>Bạn sẽ được g&igrave; khi tham gia Go Explore team:</strong></p>\r\n\r\n<p>✓ Miễn ph&iacute; to&agrave;n bộ chi ph&iacute; đi lại theo h&agrave;nh tr&igrave;nh của Go Explore<br />\r\n✓ 30 ng&agrave;y phượt xuy&ecirc;n Việt: 9.5 &ndash; 9.6<br />\r\n✓ Đi qua 10 điểm đến hấp dẫn xuy&ecirc;n suốt Việt Nam trong h&agrave;nh tr&igrave;nh<br />\r\n✓ Sản xuất 10 video quảng b&aacute; du lịch Việt Nam&nbsp;<br />\r\n✓ Tham gia tổ chức 3 sự kiện x&ecirc; dịch ở Hồ Ch&iacute; Minh (6.5), Đ&agrave; Nẵng (28.5), H&agrave; Nội (7.6)<br />\r\n✓ Du lịch &amp; l&agrave;m việc c&ugrave;ng 5 phượt thủ trong team #goexplore<br />\r\n✓ C&aacute;c kĩ năng blogging &amp; vlogging, sales &amp; marketing, tổ chức sự kiện, chụp ảnh &amp; quay phim<br />\r\n✓ Tiếp cận với những h&igrave;nh thức văn ho&aacute; nghệ thuật Việt khắp 3 miền</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Đăng k&yacute; v&agrave;o Go Explore team ngay để được t&agrave;i trợ to&agrave;n bộ chi ph&iacute; đi lại trong chương tr&igrave;nh nếu:</p>\r\n\r\n<ul>\r\n	<li>Bạn c&oacute; kinh nghiệm hoặc đam m&ecirc; đối với quay phim, chụp ảnh, viết b&agrave;i</li>\r\n	<li>Bạn l&agrave; người địa phương c&oacute; am hiểu s&acirc;u sắc về văn ho&aacute; nghệ thuật của một hoặc nhiều v&ugrave;ng trong số c&aacute;c điểm thuộc h&agrave;nh tr&igrave;nh</li>\r\n	<li>Bạn l&agrave;m việc trong lĩnh vực du lịch &amp; kh&aacute;ch sạn hoặc nghệ thuật</li>\r\n	<li>Bạn l&agrave; t&aacute;c giả, diễn giả, blogger, vlogger hoặc c&oacute; tầm ảnh hưởng nhất định trong cộng đồng x&atilde; hội</li>\r\n</ul>\r\n\r\n<p>Đăng k&yacute;:&nbsp;<a href=\"https://goo.gl/forms/LmkbtrJ4ctcSWcfy1\">https://goo.gl/forms/LmkbtrJ4ctcSWcfy1</a></p>\r\n\r\n<p><strong>Khung kế hoạch thời gian:</strong></p>\r\n\r\n<p>H&agrave;nh tr&igrave;nh xuy&ecirc;n Việt 30 ng&agrave;y từ&nbsp;<strong>9.5 (Hồ Ch&iacute; Minh)</strong>&nbsp;đến&nbsp;<strong>9.6 (H&agrave; Nội)</strong><br />\r\nNg&agrave;y dự kiến tổ chức chuỗi sự kiện của Go Explore:&nbsp;<strong>6.5 (Hồ Ch&iacute; Minh)</strong>,<strong>&nbsp;28.5 (Đ&agrave; Nẵng)</strong>,<strong>&nbsp;7.6 (H&agrave; Nội).</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"http://www.fundstart.vn/uploads/redactor_rails/picture/data/1068/17546781_1597285010312200_1072118055309113839_o.jpg\" /></p>\r\n\r\n<p>(Sự kiện&nbsp;<a href=\"https://www.facebook.com/events/441729556174371/\">&lsquo;Nữ giới - Theo đuổi chủ nghĩa tự do v&agrave; đam m&ecirc; x&ecirc; dịch&rsquo;</a>&nbsp;được tổ chức ở H&agrave; Nội ng&agrave;y 1.4.2017 ở Bụi Xuy&ecirc;n Việt Cafe (c&oacute; sự tham dự của c&aacute;c kh&aacute;ch mời đặc biệt như Linh Lam Tống - t&aacute;c giả cuốn G&aacute;i Phượt, Sonia Jaeger, H&acirc;n L&ecirc;, ...)</p>\r\n\r\n<p><strong>Với dự &aacute;n n&agrave;y, ch&uacute;ng t&ocirc;i mong muốn:</strong></p>\r\n\r\n<ul>\r\n	<li>Kh&aacute;m ph&aacute; những điểm đến mới lạ (thay v&igrave; chỉ đi check-in), c&aacute;c n&eacute;t văn ho&aacute; nghệ thuật ẩn giấu ở những điểm du lịch quen thuộc</li>\r\n	<li>Kết nối cộng đồng du lịch online v&agrave; offline ở Việt Nam th&ocirc;ng qua chuỗi sự kiện v&agrave; chiến dịch truyền th&ocirc;ng #goexplorevietnam</li>\r\n	<li>Đưa h&igrave;nh ảnh du lịch Việt Nam độc đ&aacute;o thể hiện qua c&aacute;c n&eacute;t đẹp văn ho&aacute; nghệ thuật đến gần với bạn b&egrave; thế giới hơn</li>\r\n	<li>Gi&uacute;p c&aacute;c bạn trẻ đam m&ecirc; x&ecirc; dịch c&oacute; được những trải nghiệm hoạt động c&oacute; &iacute;ch cho cộng đồng, c&oacute; th&ecirc;m những định hướng mới trong c&ocirc;ng việc v&agrave; cuộc sống</li>\r\n	<li>Định hướng cho cộng đồng c&aacute;c bạn trẻ m&ecirc; x&ecirc; dịch về c&aacute;ch &#39;l&agrave;m việc trong khi du lịch&#39; v&agrave; &#39;phượt c&oacute; mục đ&iacute;ch&#39;</li>\r\n</ul>\r\n\r\n<p>Website:&nbsp;<a href=\"http://dulichcham.com/goexplore\">http://dulichcham.com/goexplore</a><br />\r\nFacebook group:&nbsp;<a href=\"https://www.facebook.com/groups/goexplorevietnam\">https://www.facebook.com/groups/goexplorevietnam</a><br />\r\nLi&ecirc;n hệ: goexplore.vn@gmail.com&nbsp;<br />\r\nHotline 01642461480 (gặp Hương)</p>\r\n\r\n<hr />\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"http://www.fundstart.vn/uploads/redactor_rails/picture/data/1072/Huong_goexplore_en.jpg\" /></p>\r\n\r\n<p>Are you sick of living the 9-5 life? Or studying not knowing whether your degree will land you a job?</p>\r\n\r\n<p>Step out of your comfort zone. Go out into the real world and explore yourself. Meeting new people who are doing extraordinary things.</p>\r\n\r\n<p>Go Explore is a community travel project ran by digital nomads, local companies and organizers across Vietnam. In this project, we are going to</p>\r\n\r\n<ul>\r\n	<li><strong>Travel:</strong>&nbsp;around the country to produce content including videos (10 short videos promoting 10 destinations), photos and articlaes to market Vietnam tourism in a fun and creative way.</li>\r\n	<li><strong>Play:</strong>&nbsp;Explore the hidden arts and culture of each city revealing the underground world that many people miss out on throughout Ho Chi Minh, Mui Ne, Da Lat, Nha Trang, Quy Nhon, Hoi An, Da Nang, Hue, Quang Binh, and Hanoi.</li>\r\n	<li><strong>Work:</strong>&nbsp;Organize events (workshops, photo exhibitions, meet-ups) in different cities to empower Vietnamese people to travel more, and guide like minded travelers on how to combine their passion for travelling and working remotely.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"http://www.fundstart.vn/uploads/redactor_rails/picture/data/1077/2017.jpg\" /></p>\r\n\r\n<p><strong>How to join this project:</strong></p>\r\n\r\n<p><strong>How-to #1: Back us on Fundstart by donating to one of our packages:</strong></p>\r\n\r\n<ul>\r\n	<li>5USD: 1 voucher worth 100.000 VND to book flights, trains, buses and ferries on&nbsp;<a href=\"http://baolau.com/\">baolau.com</a>&nbsp;in South East Asia</li>\r\n	<li>10 USD (for international backers): 2 postcards bought in 2 of the 10 destinations in our itinerary.</li>\r\n	<li>15 USD (for national backers): 1 postcard and local souvenir bought in 1 of the 10 destinations in our itinerary.</li>\r\n	<li>50 USD (for companies): marketing video and review article</li>\r\n	<li>100 USD (for companies): become the official sponsor of Go Explore project</li>\r\n	<li>150 USD (for both international and national backers): become a member of Go Explore team</li>\r\n</ul>\r\n\r\n<p><strong>How-to #2: Sponsor us</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>We are reaching out to travel companies, tech start-ups, accommodations, travel communities and friends in Vietnam to connect, and together build a creative image of Vietnam tourism.</p>\r\n\r\n<p>Sign up:&nbsp;<a href=\"https://goo.gl/forms/lIwaSJHXf7FBWWXi1\">https://goo.gl/forms/lIwaSJHXf7FBWWXi1</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"http://www.fundstart.vn/uploads/redactor_rails/picture/data/1076/photo.jpg\" /></p>\r\n\r\n<p><strong>How-to #3: Join Go Explore team</strong></p>\r\n\r\n<p>We are also calling for digital nomads, travel and tourism tech experts to come to Vietnam to join this project.<br />\r\nSign up to become a member of this project if you</p>\r\n\r\n<ul>\r\n	<li>Are experienced or passionate with filming, photography, content writing</li>\r\n	<li>Are a local with deep understanding of your art and culture of a region included in our itinerary</li>\r\n	<li>Work in tourism in Vietnam or abroad</li>\r\n	<li>Are an digital nomad, author, speaker, blogger/vlogger or influencer based in Vietnam (preferred) or anywhere in the world</li>\r\n</ul>\r\n\r\n<p>Sign up:&nbsp;<a href=\"https://goo.gl/forms/LmkbtrJ4ctcSWcfy1\">https://goo.gl/forms/LmkbtrJ4ctcSWcfy1</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><img src=\"http://www.fundstart.vn/uploads/redactor_rails/picture/data/1075/17492607_1597284666978901_6831180188810945441_o.jpg\" /></strong></p>\r\n\r\n<p>After successfully organising an event in Hanoi (Females - The passion to pursue freedom and adventure) there has been many requests from Ho Chi Minh to bring it down South.</p>\r\n\r\n<p><strong>Timeline:</strong></p>\r\n\r\n<p>Itinerary: 9th May - 9th June<br />\r\nEvent dates: 6th May (Ho Chi Minh), 28th May (Da Nang), 7th June (Hanoi)</p>\r\n\r\n<p><strong>With this project, we want to:</strong></p>\r\n\r\n<ul>\r\n	<li>Connect travel communities online and offline via events in Vietnam and marketing campaigns</li>\r\n	<li>Market Vietnam tourism by embracing the Vietnamese hidden art and culture</li>\r\n	<li>Guide and educate young people in Vietnam as well as like-minded travelers on how to travel and work at the same time</li>\r\n</ul>\r\n\r\n<p>Website:&nbsp;<a href=\"http://asiasnomad.com/goexplore\">asiasnomad.com/goexplore</a><br />\r\nFacebook group:&nbsp;<a href=\"https://www.facebook.com/groups/goexplorevietnam\">https://www.facebook.com/groups/goexplorevietnam</a><br />\r\nContact: goexplore.vn@gmail.com&nbsp;<br />\r\nHotline 01642461480 (Ms.Huong)</p>\r\n', '<p><strong>C&aacute;c giai đoạn đ&atilde; thực hiện th&agrave;nh c&ocirc;ng</strong></p>\r\n\r\n<ul>\r\n	<li>L&ecirc;n kế hoạch dự &aacute;n</li>\r\n	<li>T&igrave;m t&agrave;i trợ cho kinh ph&iacute; đi lại (c&ocirc;ng ty&nbsp;<a href=\"http://www.baolau.com/\">TNHH Baolau</a>&nbsp;t&agrave;i trợ 100% chi ph&iacute; đi lại theo h&agrave;nh tr&igrave;nh của Go Explore)</li>\r\n</ul>\r\n\r\n<p><strong>C&aacute;c giai đoạn đang v&agrave; sẽ triển khai trong thời gian tới:</strong></p>\r\n\r\n<ul>\r\n	<li>Tuyển 3 th&agrave;nh vi&ecirc;n ch&iacute;nh trong Go Explore team (đăng k&yacute; tại&nbsp;<a href=\"http://www.fundstart.vn/du-an/https\" target=\"_blank\">đ&acirc;y</a>)</li>\r\n	<li>T&igrave;m c&aacute;c nh&agrave; t&agrave;i trợ kh&aacute;c tham gia v&agrave;o dự &aacute;n (đăng k&yacute; tại&nbsp;<a href=\"https://goo.gl/forms/lIwaSJHXf7FBWWXi1\">đ&acirc;y</a>)</li>\r\n	<li>Tổ chức 3 sự kiện mang chủ đề x&ecirc; dịch ở 3 miền Bắc, Trung, Nam (H&agrave; Nội, Đ&agrave; Nẵng, Hồ Ch&iacute; Minh)</li>\r\n	<li>Kế hoạch truyền th&ocirc;ng chạy xuy&ecirc;n suốt th&aacute;ng 4-5-6</li>\r\n	<li>Tổng kết dự &aacute;n v&agrave; ho&agrave;n th&agrave;nh mục ti&ecirc;u k&yacute; kết với nh&agrave; t&agrave;i trợ</li>\r\n</ul>\r\n', '<p><strong>Vốn huy động sẽ được sử dụng cho mục đ&iacute;ch:</strong></p>\r\n\r\n<ul>\r\n	<li>C&aacute;c hoạt động sản xuất phim, tranh ảnh, nội dung trong suốt h&agrave;nh tr&igrave;nh 1 th&aacute;ng</li>\r\n	<li>Tổ chức chuỗi sự kiện cộng đồng nằm trong dự &aacute;n</li>\r\n	<li>Thiết lập website goexplorevietnam.com</li>\r\n</ul>\r\n', 'online', 'daa219be89424aceb7a04a531f793954', 'daa219be89424aceb7a04a531f793954', '2018-11-19 02:39:23', '2018-11-22 16:30:30', 1),
('a03c7b4604804ab890b87ce6477328bf', 'dự án của á', '02676f0321f44181a1536dd76dcad8fa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'draft', 'daa219be89424aceb7a04a531f793954', NULL, '2018-11-27 09:57:12', '2018-11-27 09:57:12', NULL),
('ca0e12f8df1242cbb6232452e7b22d49', 'dự án đầu tiên thứ 2', 'ba3cbead42e54e3f8ace9fdac2816ddb', NULL, 15000000.0000, 30, '2017-01-01 00:00:00', NULL, '', '', '', '', '', '', '', '', '', '', '', 'd3398c869a54463d94086573680765df', 'Nguyễn Tú Tuấn đã ra mắt quyển sách Origami Thế giới Đại dương, là quyển sách hướng dẫn Origami đầu tiên hoàn toàn do Việt Nam thực hiện từ ý tưởng', '', '<p><img alt=\"\" src=\"/upload/images/right-head.png\" style=\"height:317px; width:564px\" /></p>\r\n', '', '', 'approved', 'daa219be89424aceb7a04a531f793954', 'daa219be89424aceb7a04a531f793954', '2018-11-19 06:10:25', '2018-11-30 18:53:11', 1),
('f0c011d6599c41f7943c6299fe97cefa', 'dự án đầu tiên test', NULL, 'Nhạc nhẽo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'delete', 'daa219be89424aceb7a04a531f793954', 'daa219be89424aceb7a04a531f793954', '2018-11-30 11:22:14', '2018-12-01 11:56:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `p_rewards`
--

CREATE TABLE `p_rewards` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(30) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `is_limited` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `p_rewards`
--

INSERT INTO `p_rewards` (`id`, `project_id`, `cost`, `description`, `delivery_date`, `is_limited`, `created_at`, `updated_at`) VALUES
('04a30921f4bf439b8b73a830f5cf2113', 'ca0e12f8df1242cbb6232452e7b22d49', 1400000, 'phần thưởng', '2018-12-19', NULL, '2018-11-22 16:26:08', '2018-11-22 16:26:08'),
('1c105d84086d44f0a62714a9e66ced0f', '967c4c2ba65b468cae763be3bc79edd3', 500000, 'giá trị về mặ tinh thần', '2018-11-21', NULL, '2018-11-22 16:23:50', '2018-11-22 16:23:50'),
('45c4466fb0944a469d1db9f0199ea7af', 'd514bdae1b8842f48ba8f952c3afe9a8', 1000000, 'đasad', '2018-01-21', 1, '2018-11-14 01:33:33', '2018-11-14 01:33:33'),
('a163ccbce86d419ea2d50521b56f61e3', 'd514bdae1b8842f48ba8f952c3afe9a8', 2000000, 'ddddđ', '2018-01-20', 1, '2018-11-14 01:34:22', '2018-11-14 01:41:16'),
('a420228ab7fc45c38758d8b344ec61b6', '49a8124d936c4a17b14f41fab164ba40', 500000, 'mô tả', '2018-12-06', NULL, '2018-11-22 16:29:33', '2018-11-22 16:29:33'),
('a5fa073883424e9b9685169a28a0fb03', 'ca0e12f8df1242cbb6232452e7b22d49', 400000, 'phần thưởng', '2018-11-20', 1, '2018-11-22 16:25:48', '2018-11-22 16:25:48'),
('a6fdc149c66e4424997338fe098e588b', 'd514bdae1b8842f48ba8f952c3afe9a8', 500000, 'saaaaaaaaa', '2018-12-30', NULL, '2018-11-14 01:33:14', '2018-11-14 01:33:14'),
('ec7b948026c94ba4bed265606d7b2207', '967c4c2ba65b468cae763be3bc79edd3', 1000000, 'giá trị về mặ tinh thần', '2018-11-23', NULL, '2018-11-22 16:24:02', '2018-11-22 16:24:02'),
('ed1b12b53a83478ba049e705c58a493a', '967c4c2ba65b468cae763be3bc79edd3', 1500000, 'giá trị về mặ tinh thần', '2018-12-19', NULL, '2018-11-22 16:24:20', '2018-11-22 16:24:20');

-- --------------------------------------------------------

--
-- Table structure for table `p_updates`
--

CREATE TABLE `p_updates` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `project_id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `p_updates`
--

INSERT INTO `p_updates` (`id`, `project_id`, `title`, `content`, `created_at`, `updated_at`) VALUES
('1c6d1839277a4af785f04d4ad34ffc65', '967c4c2ba65b468cae763be3bc79edd3', 'Cập nhật lần 1', 'hello', '2018-11-22 16:23:14', '2018-11-22 16:23:14'),
('333c0fb5b61b4abfae77273794feaff9', 'd514bdae1b8842f48ba8f952c3afe9a8', '2312', '321', '2018-11-14 03:54:26', '2018-11-14 03:54:26'),
('6f3b9cea8ae043e1bf80906484f81cb9', 'ca0e12f8df1242cbb6232452e7b22d49', 'cập nhật 1', 'demo', '2018-11-22 16:26:29', '2018-11-22 16:26:29'),
('7d898adc715445bb8844e584d7146e9c', '49a8124d936c4a17b14f41fab164ba40', 'cập nhật 1', 'nội dung', '2018-11-22 16:29:51', '2018-11-22 16:29:51'),
('995d02bc665f45ac818dd0ad33f435cc', '967c4c2ba65b468cae763be3bc79edd3', 'Cập nhật lần 2', 'hello', '2018-11-22 16:23:23', '2018-11-22 16:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `code`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
('f70a71131b9b4a47ba3ebb19f7692a41', 'Admin', 'admin', '2018-12-05 15:10:31', '2018-12-05 15:10:31', NULL, NULL),
('3e5abd3209274d4f94326d5ea6cce60a', 'Mod dự án', 'project_mod', '2018-12-05 15:10:31', '2018-12-05 15:10:31', NULL, NULL),
('2f98853b207c4688a1aa9b1a19c28cc8', 'Mod bài viết', 'post_mod', '2018-12-05 15:10:31', '2018-12-05 15:10:31', NULL, NULL),
('c974f65b70644ba8be7aa757f36f33ad', 'Người dùng', 'user', '2018-12-05 15:10:31', '2018-12-05 15:10:31', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcribers`
--

CREATE TABLE `subcribers` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subcribers`
--

INSERT INTO `subcribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
('50d44e2ff3934168a45c9a6baefb1dd5', 'aa@gmail.com', '2018-11-19 10:34:20', '2018-11-19 10:34:20'),
('ec5f35e98c8f473d95d0cfe7d5143100', 's@gmail.com', '2018-11-19 10:35:02', '2018-11-19 10:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birth_day` datetime DEFAULT NULL,
  `id_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar_id` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `information` longtext COLLATE utf8_unicode_ci,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `home_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_owner` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bank_branch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tax_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `social_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','delete','freeze') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'freeze',
  `created_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_by` char(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `full_name`, `nickname`, `birth_day`, `id_number`, `id_date`, `email`, `avatar_id`, `password`, `telephone`, `website`, `company`, `information`, `address`, `other_address`, `street`, `city`, `state`, `zip_code`, `home_number`, `lat`, `lng`, `bank_name`, `bank_owner`, `bank_number`, `bank_branch`, `tax_number`, `social_id`, `social_type`, `facebook_id`, `google_id`, `twitter_id`, `status`, `created_by`, `updated_by`, `remember_token`, `created_at`, `updated_at`) VALUES
('daa219be89424aceb7a04a531f793954', 'admin', 'Việt Anh', NULL, NULL, NULL, NULL, 'admin@admin.com', '3bbe7220c1ba47d09baaf4788a1159f4', '$2y$10$rKTtepGOPis9iyDwhJB8t.pBwnFAG7Y66xOHAIBauqTuqDuNNXsiO', '0963332221', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, 'WGak40qOq9ZNeZDT9bitB2jWUifWV2Ywual1pNVDK7i6jZ44s9uyCCpQ5Yni', '2018-11-06 03:08:44', '2018-11-22 16:20:17'),
('a89e4a26e09a4a999441595bd19eb203', 'Anh Tạ Việt', NULL, NULL, NULL, NULL, NULL, 'anhtv@efy.com.vn', 'd027fc453c9f41a291a015828085a878', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '115489787820343220894', 'google', NULL, NULL, NULL, 'freeze', NULL, NULL, 'ZEcuosE2nt3FY4aYbuoJVVaL952w3WcnXJ2LE1uraqyOXYAY7qQDtCahK6GI', '2018-11-29 11:26:55', '2018-11-29 11:26:55'),
('11229c1911b74ed09769805b59414390', 'trnga', NULL, NULL, NULL, NULL, NULL, 'trunga.115@gmail.com', NULL, '$2y$10$rshq3af53YY1hiErH38L9e7YFonN1dkw0/W8QHJ6xCK2dqZ5Aos/u', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'freeze', NULL, NULL, NULL, '2018-11-27 10:04:55', '2018-11-27 10:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `user_permissions`
--

CREATE TABLE `user_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'daa219be89424aceb7a04a531f793954', 'f70a71131b9b4a47ba3ebb19f7692a41', NULL, NULL),
(2, 'daa219be89424aceb7a04a531f793954', '3e5abd3209274d4f94326d5ea6cce60a', NULL, NULL),
(3, 'daa219be89424aceb7a04a531f793954', '2f98853b207c4688a1aa9b1a19c28cc8', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backers`
--
ALTER TABLE `backers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `black_lists`
--
ALTER TABLE `black_lists`
  ADD UNIQUE KEY `black_lists_email_unique` (`email`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_permission_group_id_foreign` (`permission_group_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_rewards`
--
ALTER TABLE `p_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `p_updates`
--
ALTER TABLE `p_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcribers`
--
ALTER TABLE `subcribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_permissions`
--
ALTER TABLE `user_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_permissions`
--
ALTER TABLE `user_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
