-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2019 at 02:41 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation_codes`
--

CREATE TABLE `activation_codes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `expire` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 'علمی', 'علمی', 0, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `collaborations`
--

CREATE TABLE `collaborations` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DegreeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `experience` int(11) NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_family` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `field_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

CREATE TABLE `flags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `alias`, `type`, `slug`, `flag`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 'ltr', 'English', '/images/flag1/us.svg', NULL, NULL),
(2, 'Persian', 'fa', 'rtl', 'Persian', '/images/flag1/ir.svg', NULL, NULL);

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
(1, '2014_01_07_073615_create_tagged_table', 1),
(2, '2014_01_07_073615_create_tags_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2016_06_29_073615_create_tag_groups_table', 1),
(5, '2016_06_29_073615_update_tags_table', 1),
(6, '2018_06_28_090259_create_users_table', 1),
(7, '2018_06_28_090526_create_roles_table', 1),
(8, '2018_06_28_090604_create_contacts_table', 1),
(9, '2018_06_28_090643_create_newsletters_table', 1),
(10, '2018_07_09_183750_create_fields_table', 1),
(11, '2018_07_12_131600_create_person_collaboration_table', 1),
(12, '2018_08_11_192138_create_videos_table', 1),
(13, '2018_11_17_154456_create_activation_codes_table', 1),
(14, '2019_01_28_153106_create_languages_table', 1),
(15, '2019_01_28_170239_create_flags_table', 2),
(16, '2019_01_28_171955_create_categories_table', 3),
(17, '2019_01_28_172143_create_collaborations_table', 3),
(18, '2019_01_28_172457_create_services_table', 3),
(19, '2019_04_19_125955_create_slogans_table', 3),
(20, '2019_04_19_143232_create_posts_table', 3),
(21, '2019_04_19_143731_create_comments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person_collaboration`
--

CREATE TABLE `person_collaboration` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NationalCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DegreeName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UniversityName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workAddress` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `workPhone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ScientificRecords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `collaborationType` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Rezume` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `post_type` int(11) NOT NULL,
  `slideShow` tinyint(1) UNSIGNED NOT NULL,
  `viewCount` int(11) NOT NULL DEFAULT '0',
  `commentCount` int(11) NOT NULL DEFAULT '0',
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `slug`, `description`, `body`, `images`, `type`, `language_id`, `post_type`, `slideShow`, `viewCount`, `commentCount`, `category_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 'محل نصب برج خنک کننده', 'محل-نصب-برج-خنک-کننده', ' محلی نصب و جهت قرار گرفتن برجهای خنک کننده براساس نکات زیر ...', '<p dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:medium\"><span style=\"color:black; font-family:\'B Nazanin\'\">1) محلی نصب و جهت قرار گرفتن <strong>برجهای خنک کننده</strong> براساس نکات زیر انتخاب می شود: </span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:medium\"><span style=\"color:black; font-family:\'B Nazanin\'\">2)<strong> برج خنک کننده</strong> باید به گونهای نصب شود که هوا بتواند آزادانه در آن و اطرافش پخش شود.</span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:medium\"><span style=\"color:black; font-family:\'B Nazanin\'\">&nbsp;برج باید در فاصلهای دورتر از منابع حرارتی یا آلوده کننده نظیر دودکش ها قرار داشته باشد. حداقل این فاصله سه متر است.</span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:medium\"><span style=\"color:black; font-family:\'B Nazanin\'\">&nbsp;</span><span style=\"color:black; font-family:\'B Nazanin\'\">۳) </span><span style=\"color:black; font-family:\'B Nazanin\'\">بهترین محل نصب برج در پشت بام ساختمان یا بالای اتاق محل نصب سایر تجهیزات تأسیسات مکانیکی است.</span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:medium\"><span style=\"color:black; font-family:\'B Nazanin\'\">&nbsp;</span><span style=\"color:black; font-family:\'B Nazanin\'\">۴) </span><span style=\"color:black; font-family:\'B Nazanin\'\">اگر برج در بالای بام ساختمان نصب می شود باید استحکام بام برای تحمل وزن برج در حالی کار بررسی شود.</span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:medium\"><span style=\"color:black; font-family:\'B Nazanin\'\">5) </span><span style=\"color:black; font-family:\'B Nazanin\'\">نصب برج خنک کننده در ترازی پایین تر از کندانسور آبی یا هر دستگاه دیگری که آب خروجی از برج وارد آن میشود، باعث سرریز شدن برج در هنگام خاموش بودن کندانسور آبی میشود. بنابراین بهتر است حتی الامکان برج بالاتر از کندانسور آبی چیلر نصب شود.</span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:medium\"><span style=\"color:black; font-family:\'B Nazanin\'\">&nbsp;</span><span style=\"color:black; font-family:\'B Nazanin\'\">۶) </span><span style=\"color:black; font-family:\'B Nazanin\'\">مسیر سرریز برج باید به مسیر تخلیه آن متصل شده و هیچ شیری نباید در سر راه آن قرار داده شود.</span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:medium\"><span style=\"color:black; font-family:\'B Nazanin\'\">&nbsp;</span><span style=\"color:black; font-family:\'B Nazanin\'\">7) </span><span style=\"color:black; font-family:\'B Nazanin\'\">در<strong> برج خنک کننده</strong> باید علاوه بر خط پرکن آب جبرانی (</span><span dir=\"LTR\" style=\"color:black\">Make up</span><span style=\"color:black; font-family:\'B Nazanin\'\">) از یک پرکن آب شهری نیز استفاده نمود.</span></span></p>', '{\"original\":\"\\/photos\\/34.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/34.jpg\"}', 2, 2, 2, 0, 1, 0, 1, '2019-04-21 13:32:40', '2019-04-24 13:24:49', NULL),
(4, 1, 'چگونه یک برج خنک کننده بخریم؟', 'چگونه-یک-برج-خنک-کننده-بخریم', 'اولین قدم در خرید یک برج خنک کننده جدید برای یک سیستم تهویه مطبوع ...', '<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">اولین قدم در خرید یک <strong>برج خنک کننده</strong> جدید برای یک سیستم تهویه مطبوع تعیین یا برآورد قابلیت ها و ظرفیت آن است. برای انجام این کار 4 پارامتر زیر باید تعیین گردند.</span></span></span></span></p>\r\n\r\n<ol>\r\n	<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">نرخ جریان آب در کنداسور</span></span></span></span></li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">دمای ورود آب به کندانسور(برگشت)</span></span></span></span></li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">دمای آب خروجی از کندانسور </span></span></span></span></li>\r\n	<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">دمای حباب خیس ورودی</span></span></span></span></li>\r\n</ol>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">تفاوت بین دمای آب ورودی و خروجی کندانسور بازه مورد نیاز را تعیین می کند. در حالی که اختلاف بین دمای آب خروجی از کندانسور و دمای حباب خیس ورودی رویکرد را تعیین می کند. با داشتن بازه و نرخ جریان، نرخ خروج گرمای کل یا ظرفیت برج خنک کننده بدست می آید. با این اطلاعات یک تولید کننده یا سازنده سیستم تهویه مطبوع برج خنک کننده ایده آل را انتخاب می نماید. </span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">قدم بعدی تعیین یک یا چند وضعیت در<strong> برج خنک کننده</strong> است که می تواند مطابق جدول زیر مورد قبول باشد.</span></span></span></span></p>\r\n\r\n<table align=\"right\" cellspacing=\"0\" class=\"Table\" dir=\"rtl\" style=\"border-collapse:collapse; border:undefined\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:239.4pt\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">نوع جریان / نوع فن</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:239.4pt\">\r\n			<ol>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">اجباری / فن محوری</span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">اجباری / فن سانتریفوژ</span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">القایی / فن محوری</span></span></span></span></li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:239.4pt\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">جهت جریان</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:239.4pt\">\r\n			<ol>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">جریان متقاطع</span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">جریان مخالف</span></span></span></span></li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:239.4pt\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">نحوه منتاژ</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:239.4pt\">\r\n			<ol>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">منتاژ در کارخانه</span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">منتاژ در محل</span></span></span></span></li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:239.4pt\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">سازه</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:239.4pt\">\r\n			<ol>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">چوب</span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">فایبرگلاس</span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">آهن گالوانیزه</span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">آهن گالوانیزه با تشتک ضد زنگ </span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">کاملا ضد زنگ </span></span></span></span></li>\r\n				<li dir=\"RTL\" style=\"text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">بتون</span></span></span></span></li>\r\n			</ol>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">جدول زیر انواع سازه های معقول برای نوع و جهت جریان را نشان می دهد. برج های چوبی و بتونی به ندرت در سیستم های تهویه مطبوع کاربر دارند مگر این که ظرفیت برج مورد نیاز بسیار بسیار بزرگ باشد( بزرگتر از دو هزار تن) یا در مواردی که ترکیب معماری ساختمان ما را مجبور به این انتخاب کند.</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">وقتی یکی از گزینه های مناسب <strong>برج خنک کننده گالوانیزه</strong> است توصیه میشود که تشتک در همه موارد و قسمت های دیگر خیس در<strong> برج های خنک کننده متقاطع</strong> از فولاد ضد زنگ ساخته شود.این گزینه توسط تمامی سازندگان <strong>برج خنک کننده</strong> توصیه می شود و قیمت برج را ش20 تا 40 درصد افزایش می دهد. ولی همانطور که در جدول نمایش داده شده است عمر برج خنک کننده حداقل 33 درصد افزایش می یابد. بنابراین این سرمایه گذاری بسیار مطلوب خواهد بود.</span></span></span></span></p>\r\n\r\n<table align=\"right\" cellspacing=\"0\" class=\"Table\" dir=\"rtl\" style=\"border-collapse:collapse; border:undefined\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:4.95in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">تجهیز</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1.7in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">عمر</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:4.95in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">پمپ نصب شده روی پایه</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1.7in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">20</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:4.95in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">پمپ نصب شده روی خط لوله</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1.7in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">10</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:4.95in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">برج خنک کننده ، گالوانیزه </span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1.7in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">15</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:4.95in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">برج خنک کننده فایبرگلاس</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1.7in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">20</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:4.95in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">برج خنک کننده گالوانیزه ، تشتک و عرشه ضد زنگ</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1.7in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">22</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:4.95in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">برج خنک کننده چوب</span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1.7in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">25</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"vertical-align:top; width:4.95in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">برج خنک کننده تمام ضد زنگ یا تمام بتنی </span></span></span></span></p>\r\n			</td>\r\n			<td style=\"vertical-align:top; width:1.7in\">\r\n			<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">35</span></span></span></span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\">&nbsp;</p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">برج های خنک کننده ای که در کارخانه منتاژ میشوند بسیار آسان تر و سریعتر نصب میشوند. این امر موجب می شود که این نوع کولینگ تاور بسیار ارزان تر باشد. بنابراین برج های ساخته شده در محل به ندرت برای سیستم های تهویه مطبوع کاربرد دارد. </span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">تضمین عملکرد توسط انجمن تکنولوژی سرمایش</span></span></strong></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">به جز در شرایط خیلی خاص یا برای کولینگ تاور های ساخته شده در محل قابلیت های برج خنک کننده های سیستم های تهویه مطبوع باید توسط انجمن تکنولوژی سرمایش مطابق با استاندار شماره 201 این انجمن تعیین شود. </span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">این تاییدیه تضمین می کند که قابلیت هایی که توسط شرکت سازنده تعیین می شوند واقعی بوده همچنین برج خنک کننده قابلیت نصب سریع و ساده دارد و همچنین ضمانت می کند آبی که به کندانسور می رسید تمیز است.</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">تاییدیه این انجمن نیاز به تست های میدانی یک <strong>برج خنک کننده</strong> در محل را برای اطمینان صحت از عملکرد از بین می برد . </span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">ارزیابی اقتصادی سیستم های جایگذین برج خنک کن</span></span></strong></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">ارزیابی هزینه عمر مفید، بهترین روش برای انتخاب بین انواع <strong>برج خنک کننده</strong> است . در واقع این کار &nbsp;روش صحیح آنالیز اقتصادی جنبه های مختلف عملکردی برج ها است و اجازه قیاس واقع بینانه بین انواع برج ها از لحاظ هزینه و بازده را به ما می دهد . به عنوان مثال حداقل هزینه به ازای طول عمر می تواند یکی از این معیار ها باشد .اصولا این رویه ساده است و نیاز دارد&nbsp; با یک معیار مشخص انواع برج ها سنجیده شود.خروجی این مقایسه باید هر قسمت مشخص از برج های خنک کننده را مقایسه کند. هزینه مالکیت و عمکرد یک برج خنک کننده به راحتی محاسبه میشود . در ادامه هزینه های مالکیت و عملکرد کولینگ تاور توضیح داده شده است.</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">هزینه های اولیه:</span></span></strong></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">هزینه سرمایه اولیه هر برج خنک کننده ای شامل طراحی ، ساخت و نصب پمپ کندانسور میشود. سایر هزنیه های تجهیزات به راحتی به کمک تامین کنندگان بدست می آید . هزینه نصب به صورت تخمینی توسط نصابان سیستم های تهویه مطبوع بدست می آید . هزنیه ساخت شامل موارد زیر می شود:</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">اسپلش ها و نازل ها</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">بدنه</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">تجهیزات الکتریکی </span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">کنترل کننده ها</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">و...</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">هزینه بازسازی سالیانه</span></span></strong></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">یکبار که یک برج در یک عملیات قرار میگیرد دو هزینه سالانه باید برای افزایش عمر اقتصادی آن انجام شود. این هزینه ها هزینه انرژی و هزینه نگهداری هستند. عمر اقتصادی مطلوب بازه ای از زمان است که باعث میشود مصرف کننده هزینه معقولی انجام دهد.بنابراین وقتی که یک برج خنک کننده هزنیه بالاتری برای عمل کردن و نگهداری داشته باشد باید تعویض شد در واقع عمر مطلوب اقتصادی آن به پایان رسیده است. در جدول عمر مفید برج ها ارائه شده بود .</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">برای دانستن هزینه انرژی باید میزان برق مصرفی برج شامل پمپ آب کندانسور ، الکتروموتور فن و سایز تجهیزات الکتریکی بررسی شوند. </span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">یکی از مواردی که باعث اختلاف بین برج های خنک کننده میشود افت فشار در لوله هاست که باعث افزایش انرژی مصرفی در پمپ می شود.در مورد برج هایی که فن آن ها تک دور است هزینه انرژی مصرفی فن همواره معادل با توان موتور آن است. در مورد فن های دو دور توان مصرفی در حالت فول لود 100 درصد و حالت عملکرد کم بار برج خنک کننده این مقدار 30 درصد توان اسمی موتور است. بنابراین نوع فن و موتور آن بر هزینه انرژی برج خنک کن بسیار موئثر است. </span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">هزنیه نگهداری سالانه به سختی قابل محاسبه است ولی میبایست هزینه نگهداری روتین برای پمپ ها و قطعات داخلی برج خنک کننده به صورت تخمینی و آماری محاسبه شود.</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">برج های خنک کننده چوبی گالوانیزه 3 درصد </span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">برج خنک کننده گالوانیزه با تشتک استیل یا فایبرگلاس 2 درصد</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">برج خنک کننده فولاد ضد زنگ 1 درصد</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">این هزنیه ها شامل هزینه تعویض آب نمی شود . هزینه آب و تعویض آن بستگی به شراط کاری برج ، شرایط آب و هوا ، نرخ جریان آب و برنامه تعویض دارد .</span></span></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><strong><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">هزینه تعمیر و تعویض قطعات :</span></span></strong></span></span></p>\r\n\r\n<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:justify\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Arial&quot;,sans-serif\">این هزنیه ها در دوره گارانتی معمولا بر عهده سازنده برج است.به عنوان مثال یک برج خنک کننده متقاطع القایی ممکن است نیاز به تعمیرات اساسی بعد از 10 سال داشته باشد. این هزینه ها و زمان رخداد آنها به صورت تخمینی و با آمار بدست می آید. </span></span></span></span></p>\r\n\r\n<p style=\"margin-left:0in; margin-right:0in\">&nbsp;</p>', '{\"original\":\"\\/photos\\/32.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/32.jpg\"}', 2, 2, 2, 0, 4, 0, 1, '2019-04-21 13:59:34', '2019-04-25 10:52:39', NULL),
(6, 1, 'اقدامات ایمنی در برج خنک کننده', 'اقدامات-ایمنی-در-برج-خنک-کننده', 'اقدامات ایمنی در برج خنک کننده جهت جلوگیری از بروز حادثه و مخاطرات برای حفظ سلامتی افراد ...', '<p style=\"text-align:justify\">اقدامات ایمنی در برج خنک کننده جهت جلوگیری از بروز حادثه و مخاطرات برای حفظ سلامتی افراد در نظر گرفته می شود. برج های خنک کننده سازه های بلند مرتبه با تجهیزات سنگین و ادوات در حال حرکت هستند که در صورت عدم رعایت موارد ایمنی ممکن است حوادث خطرناکی برای افراد و سایر تجهیزات به وجود آورند. پیشگیری و رعایت نکات ایمنی قبل از رخ دادن حادثه همیشه بهتر از راه حل جویی های پس از بروز حادثه می باشد. در این مطلب به بررسی اقدامات ایمنی در برج خنک کننده می پردازیم تا بتوان از بروز حوادث احتمالی جلوگیری نمود.</p>\r\n\r\n<p>&ndash;</p>\r\n\r\n<h2>مجموعه اقدامات ایمنی در برج خنک کننده:</h2>\r\n\r\n<p style=\"text-align:justify\">برج های خنک کننده معمولا سازه هایی بزرگ و دارای تجهیزات مکانیکی سنگین می باشند. زمانی که افراد در بخش برج های خنک کننده کار می کنند، در درجه اول اهمیت قرار دارد که ملاحظات ایمنی در نظر گرفته شده و آموزشهای لازم به افراد داده شود. در <a href=\"http://badrantahvie.com/wooden-cooling-tower/\">برج خنک کننده چوبی</a>، افرادی که برای بازرسی های معمول از تجهیزات مکانیکی موجود در بخش بالایی برج، بروی سطح فن دک حرکت می کنند باید اقدامات ایمنی در برج خنک کننده را کاملا رعایت کنند زیرا ممکن است در اثر پوسیدگی، تخریب و یا شکستگی بخشی از چوبها به داخل برج خنک کننده سقوط می کنند پس همواره بایستی در انجام این امر دقت لازم را به عمل آورد و از سالم بودن چوب های این بخش اطمینان حاصل نمود.</p>\r\n\r\n<p>&ndash;</p>\r\n\r\n<p style=\"text-align:justify\">زمانی که در قسمت هایی از برج خنک کننده که فشار هوا زیاد است کار می کنید، بایستی اقدامات ایمنی در برج خنک کننده را رعایت کرده و از یک داربست مناسب که به سازه برج متصل شده باشد استفاده نمایید، به طورییکه مطمئن باشید داربست محکم است و احتمال سقوط وجود ندارد. از محکم بودن جای پای خود، اطمینان حاصل نمایید. همواره برای بازرسی لوورها و یا پرکن ها از بالابر های مکانیکی استفاده نمایید و هیپگاه بر روی این صفحات حرکت نکنید زیرا صفحات لوور، در اثر اعمال نیروی وزن یک نفر، ممکن است شکسته شود.</p>\r\n\r\n<p>&ndash;</p>\r\n\r\n<p style=\"text-align:justify\">برای بازرسی از قسمت های داخل تنوره فن، رعایت اقدامات ایمنی در برج خنک کننده الزامی است هیچگاه بر روی پره های فن حرکت ننمایید اگر چه بعضی از انواع فن ها دارای پره هایی از جنس فایبرگلاس می باشد و به راحتی وزن سه تا چهار نفر را تحمل می کند ولی حرکت بروی پره های فن از لحاظ مسائل ایمنی صحیح نمی باشد و خطرات ناشی از آن متوجه خود فرد خواهد بود. در فصل زمستان باید اقدامات ایمنی در برج خنک کننده را در نظر گرفت زیرا هنگامی که هوا سرد می باشد امکان یخ زدگی در تمامی قسمت های برج وجود دارد در زمان بالا رفتن و یا پایین آمدن از پله ها به دقت مواظب سر خوردن باشید. در هنگام شب جهت بازرسی برج به خصوص قسمت های بالایی و سطح <a href=\"http://badrantahvie.com/cooling-tower-fan-stack/\">فن استک برج خنک کننده</a>، حتما دو یا سه نفر این کار را انجام دهند تا در صورت بروز حادثه برای یک فرد همراهان او، ایجاد حادثه را گزارش دهند. رعایت مسائل کوچک ایمنی مانع از ایجاد صدمات جانی و یا تخریب تجهیزات خواهد شد.</p>\r\n\r\n<h3><strong>خطرات ناشی از کار با تجهیزات مکانیکی:</strong></h3>\r\n\r\n<p style=\"text-align:justify\">زمانی که جهت انجام تعمیرات فن و تجهیزات مربوط به آن، در قسمت تنوره فن قرار دارید حتما اپراتور ها را از این مسئله آگاه نمایید. اپراتور ها بایستی مطمئن شوند که فن از قسمت اصلی خاموش است و یک برچسب جهت اطلاع افراد بر روی کلید مربوط به آن نصب شده است. برای رعایت ایمنی بیشتر، بایستی کلید مربوط به حرکت فن قبل از ورود به تنوره فن در حالت خاموش قرار بگیرد.</p>\r\n\r\n<p>&ndash;</p>\r\n\r\n<h3><strong>خطرات ناشی از تماس با آب داغ:</strong></h3>\r\n\r\n<p style=\"text-align:justify\">اگر برای انجام کارهای تعمیرات و بازرسی، بایستی وارد <a href=\"http://badrantahvie.com/cooling-tower-water-distribution/\">سیستم توزیع آب در برج خنک کننده</a> و لوله های توزیع کننده آب گرم یا هدر ها که دارای قطر زیاد می باشد شوید، از خاموش بودن پمپ های آب گردشی، اطمینان حاصل کنید. بایستی در این مواقع، هرگونه تمهیدات لازم برای جلوگیری از ورود آب به سیستم توزیع آب گرم و ریختن آب داغ بروی افراد، در نظر گرفته شود.</p>\r\n\r\n<p>&ndash;</p>\r\n\r\n<h3><strong>خطر برق گرفتگی:</strong></h3>\r\n\r\n<p style=\"text-align:justify\">برج های خنک کننده، مجموعه ای از آب و الکتریسیته را در خود جای داده اند، پس احتمال برق گرفتگی برای افرادی که در این سیستم ها مشغول به کار هستند وجود دارد. بایستی همواره تجهیزات الکتریکی و سیم کشی های مربوطه به دقت مورد بازرسی قرار بگیرند. در هنگام رعد و برق و باد و طوفان شدید هیچگاه از <a href=\"http://badrantahvie.com\">برج خنک کننده</a> بالا نروید زیرا امکان برق گرفتگی وجود دارد. بایستی جهت رعایت اقدامات ایمنی در برج خنک کننده تجهیزات ایمنی لازم در بالای برج های خنک کننده برای مقابله با این پدیده در نظر گرفته شود.</p>\r\n\r\n<p>&ndash;</p>\r\n\r\n<h3><strong>خطر آتش سوزی:</strong></h3>\r\n\r\n<p style=\"text-align:justify\">در برج های چوبی و برج هایی که دارای پرکن های پلاستیکی می باشد، علیرغم وجود مقادیر بسیار زیاد آب درون این برج ها، احتمال آتش سوزی وجود دارد. غیر قابل باور است که یک برج خنک کننده قابلیت احتراق و آتش سوزی داشته باشد. ولی بسیاری از این قبیل برج ها وجود داشته که در اثر بی مبادلاتی افراد و کشیدن سیگار، دچار حریق شده است. به همین دلیل کشیدن سیگار برای افراد اپراتور، در این قبیل برج ها ممنوع می باشد. در صورتی که برج های چوبی مدت رمان زیادی خارج از سرویس باشد چوبها خشک شده و احتمال آتش سوزی وجود دارد.</p>\r\n\r\n<p style=\"text-align:justify\">افرادی که با حلال ها و رزین ها سر و کار دارند بایستی از خطرات مربوط به آن، آگاه شوند. رزین های پلی استری در هنگام مخلوط شدن، واکنش های گرمازا ایجاد می کنند. همچنین پارچه های آغشته به روغن و یا تجهیزات مربوط به روغن کاری، احتمال آتش سوزی را افزایش می دهند. بنابراین جهت رعایت اقدامات ایمنی در برج خنک کننده هر گونه کار گرم نظیر جوشکاری و یا برشکاری بایستی با صدور مجوز از واحد ایمنی صورت پذیرد.</p>\r\n\r\n<p>&ndash;</p>\r\n\r\n<h3><strong>خطرات تنفسی و کار با مواد شیمیایی:</strong></h3>\r\n\r\n<p style=\"text-align:justify\">برج خنک کننده یک محیط گرم و مرطوب می باشد که علیرغم وجود تجهیزات لازم برای تصفیه شیمیایی آب محل مناسبی برای رشد انواع باکتری ها و میکروارگانیسم ها می باشد. بنابراین با رعایت اقدامات ایمنی در برج خنک کننده هیچگاه مدت زمانی طولانی در بخش حوضچه قرار نگیرد و هیچ گاه هوای خروجی از بخش فن در برج هایی که دارای فن می باشد را تنفس ننمایید. در برج خنک کننده جهت تصفیه شیمیایی آب از اسید ها برای <a href=\"http://badrantahvie.com/cooling-tower-water-ph-control/\">کنترل PH آب برج خنک کننده</a>، از کلر برای گند زدایی و از یک سری بازدارنده ها استفاده می شود که هر کدام خطرات مربوط به خود را دارد. بنابراین افرادی که با این مواد سر و کار دارند حتما بایستی از خطرات احتمالی این مواد و نحوه کار با آن آشنایی پیدا کنند. یکی دیگر از اقدامات ایمنی در برج خنک کننده این است که در هنگام تزریق مواد شیمیایی به صورت دستی مواظب چشم ها بوده و حتما از دستکش استفاده کنید. حتی الامکان از تماس مستقیم دست با آب کولینگ به علت مواد شیمیایی خودداری نمایید.</p>\r\n\r\n<p>&nbsp;</p>', '{\"original\":\"\\/photos\\/29.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/29.jpg\"}', 2, 2, 2, 0, 3, 0, 1, '2019-04-21 14:11:03', '2019-04-25 11:02:28', NULL),
(7, 1, 'ساخت انواع دستگاه فایبرگلاس', 'ساخت-انواع-دستگاه-فایبرگلاس', 'ساخت انواع دستگاه فایبرگلاس ...', '<p>ع</p>', '{\"original\":\"\\/photos\\/product.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/product.jpg\"}', 2, 2, 3, 0, 0, 0, 1, '2019-04-24 12:23:53', '2019-04-24 12:23:53', NULL),
(8, 1, 'ساخت انواع دستگاه فایبرگلاس', 'ساخت-انواع-دستگاه-فایبرگلاس-1', 'ساخت انواع دستگاه فایبرگلاس ...', '<p>ب</p>', '{\"original\":\"\\/photos\\/product.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/product.jpg\"}', 2, 2, 3, 0, 0, 0, 1, '2019-04-24 12:26:05', '2019-04-24 12:26:05', NULL),
(9, 1, 'برج خنک کننده فایبرگلاس', 'برج-خنک-کننده-فایبرگلاس', 'برج خنک کننده فایبرگلاس', '<p>برج خنک کننده فایبرگلاس مکعبی رایجترین نوع برج خنک کننده جهت استفاده می باشد . و در اندازه های کوچک و یا خیلی بزرگ جهت مصارف صنعتی به کار برده می شوند این برج همانطور که از نامش پیداست مکعبی شکل است و به دلیل اینکه در مقابل خوردگی و زنگ زدگی و اکسید شدن مقاومت زیادی داشته باشند&nbsp; از جنس فایبر گلاس ساخته شده است و به دو صورت جریان مخالف و جریان متقاطع&nbsp; می تواند باشد .می توان همه قسمت های بدنه برج خنک کننده مانند فن استک، تشت و بدنه اصلی را از جنس فایبرگلاس ساخت.</p>\r\n\r\n<div class=\"the_content_wrapper\">\r\n<h2><a href=\"http://partotahvie.ir/برج-خنک-کننده-فایبرگلاس-مکعبی\">برج خنک کننده فایبرگلاس مکعبی</a></h2>\r\n\r\n<p>برج خنک کننده فایبرگلاس مکعبی رایجترین نوع برج خنک کننده جهت استفاده می باشد . و در اندازه های کوچک و یا خیلی بزرگ جهت مصارف صنعتی به کار برده می شوند این برج همانطور که از نامش پیداست مکعبی شکل است و به دلیل اینکه در مقابل خوردگی و زنگ زدگی و اکسید شدن مقاومت زیادی داشته باشند&nbsp; از جنس فایبر گلاس ساخته شده است و به دو صورت جریان مخالف و جریان متقاطع&nbsp; می تواند باشد .می توان همه قسمت های بدنه برج خنک کننده مانند فن استک، تشت و بدنه اصلی را از جنس فایبرگلاس ساخت.</p>\r\n\r\n<p>برج خنک کننده مکعبی را مطالعه کنید.</p>\r\n\r\n<div class=\"content\">\r\n<p>&nbsp;</p>\r\n\r\n<h2>برتری های برج خنک کننده فایبرگلاس مکعبی</h2>\r\n\r\n<p>۱- شکل هندسی و طراحی ساده و ساختار مناسب</p>\r\n\r\n<p>۲- به دلیل ساختار مکعبی فضای کمتری را اشغال می کنند</p>\r\n\r\n<p>۳- لولی کشی آسان</p>\r\n\r\n<p>۴ &ndash; به دلیل نوع ساختار مکعبی دارای کمترین میزان لرزش در بین برج های خنک کننده</p>\r\n\r\n<p>۵-سادگی در اجرای فوندانسیون</p>\r\n\r\n<p>۶- در برج خنک کننده فایبرگلاس مکعبی امکان قرار گیری فلنج های ورود و خروج در تمام وجوه امکان پذیر است</p>\r\n\r\n<p>۷- به دلیل جنس فایبر گلاس این برج های خنک کننده مقاومت زیادی در براربر خوردگی و پوسیدگی دارند و عمر بیشتری می کنند</p>\r\n\r\n<p>۸- نسبت به دیگر برج های خنک کننده خیلی سبکتر می باشند</p>\r\n\r\n<p>۹- به دلیل شکل هندسی حالت ایستا دارند و لرزش را منتقل نمی کنند</p>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"the_content_wrapper\">\r\n<h2><a href=\"http://partotahvie.ir/برج-خنک-کننده-فایبرگلاس-مکعبی\">برج خنک کننده فایبرگلاس مکعبی</a></h2>\r\n\r\n<p>برج خنک کننده فایبرگلاس مکعبی رایجترین نوع برج خنک کننده جهت استفاده می باشد . و در اندازه های کوچک و یا خیلی بزرگ جهت مصارف صنعتی به کار برده می شوند این برج همانطور که از نامش پیداست مکعبی شکل است و به دلیل اینکه در مقابل خوردگی و زنگ زدگی و اکسید شدن مقاومت زیادی داشته باشند&nbsp; از جنس فایبر گلاس ساخته شده است و به دو صورت جریان مخالف و جریان متقاطع&nbsp; می تواند باشد .می توان همه قسمت های بدنه برج خنک کننده مانند فن استک، تشت و بدنه اصلی را از جنس فایبرگلاس ساخت.</p>\r\n\r\n<p>برج خنک کننده مکعبی را مطالعه کنید.</p>\r\n\r\n<div class=\"content\">\r\n<p>&nbsp;</p>\r\n\r\n<h2>برتری های برج خنک کننده فایبرگلاس مکعبی</h2>\r\n\r\n<p>۱- شکل هندسی و طراحی ساده و ساختار مناسب</p>\r\n\r\n<p>۲- به دلیل ساختار مکعبی فضای کمتری را اشغال می کنند</p>\r\n\r\n<p>۳- لولی کشی آسان</p>\r\n\r\n<p>۴ &ndash; به دلیل نوع ساختار مکعبی دارای کمترین میزان لرزش در بین برج های خنک کننده</p>\r\n\r\n<p>۵-سادگی در اجرای فوندانسیون</p>\r\n\r\n<p>۶- در برج خنک کننده فایبرگلاس مکعبی امکان قرار گیری فلنج های ورود و خروج در تمام وجوه امکان پذیر است</p>\r\n\r\n<p>۷- به دلیل جنس فایبر گلاس این برج های خنک کننده مقاومت زیادی در براربر خوردگی و پوسیدگی دارند و عمر بیشتری می کنند</p>\r\n\r\n<p>۸- نسبت به دیگر برج های خنک کننده خیلی سبکتر می باشند</p>\r\n\r\n<p>۹- به دلیل شکل هندسی حالت ایستا دارند و لرزش را منتقل نمی کنند</p>\r\n</div>\r\n</div>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/photos/29.jpg\" style=\"height:363px; width:446px\" /></p>\r\n\r\n<p>راحی ساده و ساختار مناسب <a href=\"http://partotahvie.ir/برج-خنک-کننده-فایبرگلاس-مکعبی\">برج خنک کننده فایبرگلاس مکعبی</a> باعث ایستایی و کمترین لرزش در دستگاه می شود. به دلیل همین ویژگی هایی که در بالا بیان کردیم استفاده از برج خنک کننده مکعبی فایبرگلاس طرفدار بسیار زیادی در صنعت نسبت به بقیه کولینگ تاور ها داراست.</p>\r\n\r\n<p>شرکت پرتو تهویه با بیش از ۲۰ سال تجربه در تولید برج های خنک کننده در خدمت شماست.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"http://localhost:8000/photos/34.jpg\" style=\"height:400px; width:600px\" /></p>\r\n\r\n<p>grgfg</p>', '{\"original\":null,\"thumb\":\"\\/thumbs\\/\"}', 2, 2, 2, 0, 1, 0, 1, '2019-04-24 14:23:08', '2019-04-24 14:23:24', NULL),
(10, 1, 'الکتروموتور برج خنک کننده', 'الکتروموتور-برج-خنک-کننده', 'الکتروموتور انرژی الکتریکی را به انرژی دورانی تبدیل می کند و ...', '<p><span dir=\"RTL\" lang=\"AR-SA\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">الکتروموتور انرژی الکتریکی را به انرژی دورانی تبدیل می کند و موجب به چرخش درآمدن پروانه می شود. الکتروموتور یکی از مهمترین قطعات برج خنک کننده است که باید کاملا عایق باشد و در مقابل نور خورشید و شرایط آب و هوایی نامناسب مقاوم باشد. در موارد استفاده معمولی از الکتروموتور کلاس</span></span><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\"> F با درجه حفاظتی IP55 استفاده می شود و در موارد خاص IP66 مورد استفاده قرار می گیرد. در هنگام وصل کابل حتما باید از گلند کابل استفاده کرد تا آب به موازات کابل وارد جعبه تقسیم الکتروموتور نشود که موجب سوختن الکتروموتور برج خنک کننده می گردد.</span></span></p>', '{\"original\":\"\\/photos\\/61.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/61.jpg\"}', 2, 2, 1, 0, 1, 0, 1, '2019-04-24 15:09:03', '2019-04-24 15:11:36', NULL),
(11, 1, 'فن برج خنک کننده', 'فن-برج-خنک-کننده', 'قطعه ای است که با دوران موجب به جریان انداختن هوا درون برج خنک کننده می شود و ...', '<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">قطعه ای است که با دوران موجب به جریان انداختن هوا درون برج خنک کننده می شود ، پروانه می تواند به صورت محوری و یا سانتریفیوژ باشد. این قطعه برای ایجاد جریان هوا با دبی و فشار استاتیکی مشخص در درون دستگاه برج خنک کننده به کار می رود. فن یکی از مهمترین و اصلی ترین قطعات برج خنک کننده می باشد که عملکرد دستگاه به شدت به آن وابسته می باشد. فن برج خنک کننده باید سبک باشد تا نیروی محرکه کمتری برای به دوران درآوردن آن لازم باشد و همچنین مقاومت کافی در برابر تنش و خستگی داشته باشد به صورت متداول از استیل ، آلومینیوم ، فایبرگلاس و یا پلاستیک می سازند</span></span><span dir=\"LTR\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">.&nbsp; </span></span></span></span></p>', '{\"original\":\"\\/photos\\/partotahvie-30.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/partotahvie-30.jpg\"}', 2, 2, 1, 0, 0, 0, 1, '2019-04-24 15:13:10', '2019-04-24 15:13:10', NULL),
(12, 1, 'سیستم کاهش دور تسمه ای برج خنک کننده', 'سیستم-کاهش-دور-تسمه-ای-برج-خنک-کننده', 'به دلیل سرعت بالای دوران شفت الکتروموتور و عدم امکان انتقال آن به پروانه ...', '<p dir=\"RTL\" style=\"margin-left:0in; margin-right:0in; text-align:right\"><span style=\"font-size:11pt\"><span style=\"font-family:&quot;Calibri&quot;,sans-serif\"><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">به دلیل سرعت بالای دوران شفت الکتروموتور و عدم امکان انتقال آن به پروانه باید با مکانیزمی دور الکتروموتور را کاهش و به پروانه منتقل نمود</span></span><span dir=\"LTR\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">. </span></span><span style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">این عمل به وسیله گیربکس که شامل چرخدنده های بزرگ و کوچک می باشد و یا سیستم کاهش دور که شامل پولی های بزرگ و کوچک می باشد تأمین می گردد. این هم یکی دیگر از قطعات برج خنک کننده می باشد</span></span><span dir=\"LTR\" style=\"font-size:12.0pt\"><span style=\"font-family:&quot;Times New Roman&quot;,serif\">.</span></span></span></span></p>', '{\"original\":\"\\/photos\\/69.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/69.jpg\"}', 2, 2, 1, 0, 0, 0, 1, '2019-04-24 15:15:25', '2019-04-24 15:15:25', NULL),
(13, 1, 'فن استک برج خنک کننده', 'فن-استک-برج-خنک-کننده', 'فن استک برج خنک کننده به قطعه ای می گویند که مانند دودکش در بالای برج خنک کننده قرار میگیرد ...', '<p style=\"text-align:justify\">فن استک برج خنک کننده به قطعه ای می گویند که مانند دودکش در بالای برج خنک کننده قرار میگیرد و به جریان هوای خروجی نظم بخشیده و از عملکرد فن محافظت می کند. فن استک برج خنک کننده با نام های تنوره فن و یا فن رینگ نیز نامیده می شود. طراحی فن استک باید به نحوی باشد که اصطحکاک و اتلاف انرژی را به حداقل برساند و سرعت و فشار هوا را کنترل نماید. معمولا فن استک یا فن رینگ از جنس فایبرگلاس ساخته می شود که با ابعاد دقیق قابل ساخت است و بسیار سبک می باشد.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>ویژگی فن استک برج خنک کننده</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">در سیستم فن و فن استک، برخلاف <a href=\"http://badrantahvie.com/cooling-tower-fan/\">فن برج خنک کننده</a> که دارای حرکت دورانی است فن استک برج خنک کننده معمولا فاقد حرکت و تاثیرات مستقیم می باشد. تغییرات در فن استک بدان جهت حائز اهمیت می باشد که نتایج آن بروی بازده سیستم و کارایی فن قابل مشاهده است.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>\r\n<p><em>محاسبات و طراحی و ساخت مناسب تنوره فن مستقیما بر جریان مناسب هوا در داخل <a href=\"http://badrantahvie.com\">برج خنک کننده</a> تاثیر می گذارد و در صورتی که طراحی تنوره فن مناسب نباشد باعث عملکرد ضعیف فن می گردد.</em></p>\r\n</blockquote>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:justify\">از نظر کارکرد، فن استک ها جهت بیشینه کردن راندمان فن، جلوگیری از چرخش برعکس فن و کمینه کردن چرخش مجدد هوای خروجی مورد استفاده قرار می گیرند.&nbsp; به طور کلی فن استک از سه ناحیه ناحیه تشکیل شده است: ناحیه ورودی، ناحیه صاف و ناحیه بازیابی سرعت.</p>\r\n\r\n<p style=\"text-align:justify\">سیال از ناحیه پایین <a href=\"http://badrantahvie.com/cooling-tower-fan-stack/\">فن استک برج خنک کننده</a> وارد و به سمت فوقانی حرکت می نماید. ناحیه ورودی فن استک باید طوری طراحی شود که سیال به آرامی و با کمترین اغتشاش وارد و جریان یابد.</p>\r\n\r\n<p>&nbsp;</p>', '{\"original\":\"\\/photos\\/70.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/70.jpg\"}', 2, 2, 1, 0, 0, 0, 1, '2019-04-24 15:18:15', '2019-04-24 15:18:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagetype` int(11) NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `user_id`, `title`, `slug`, `description`, `body`, `images`, `imagetype`, `language_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ساخت انواع دستگاه فایبرگلاس', 'ساخت-انواع-دستگاه-فایبرگلاس', 'ساخت انواع دستگاه فایبرگلاس ...', '<p>ساخت انواع دستگاه فایبرگلاس</p>', '{\"original\":\"\\/photos\\/product.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/product.jpg\"}', 2, 2, '2019-04-24 12:46:11', '2019-04-24 12:46:11', NULL),
(2, 1, 'تجهیز قطعات مکانیکی برج', 'تجهیز-قطعات-مکانیکی-برج', 'تجهیز قطعات مکانیکی برج ...', '<p>تجهیز قطعات مکانیکی برج</p>', '{\"original\":\"\\/photos\\/34.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/34.jpg\"}', 2, 2, '2019-04-24 12:47:54', '2019-04-24 12:47:54', NULL),
(3, 1, 'سرویس و تعمیرات برج خنک کننده', 'سرویس-و-تعمیرات-برج-خنک-کننده', 'سرویس و تعمیرات برج خنک کننده ...', '<p>سرویس و تعمیرات برج خنک کننده</p>', '{\"original\":\"\\/photos\\/service.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/service.jpg\"}', 2, 2, '2019-04-24 12:49:24', '2019-04-24 12:49:24', NULL),
(4, 1, 'مشاوره در زمینه انتخاب برج', 'مشاوره-در-زمینه-انتخاب-برج', 'مشاوره در زمینه انتخاب برج ...', '<p>مشاوره در زمینه انتخاب برج</p>', '{\"original\":\"\\/photos\\/help.jpg\",\"thumb\":\"\\/photos\\/thumbs\\/help.jpg\"}', 2, 2, '2019-04-24 12:50:19', '2019-04-24 12:50:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `slogans`
--

CREATE TABLE `slogans` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` int(10) UNSIGNED NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tagged`
--

CREATE TABLE `tagging_tagged` (
  `id` int(10) UNSIGNED NOT NULL,
  `taggable_id` int(10) UNSIGNED NOT NULL,
  `taggable_type` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagging_tagged`
--

INSERT INTO `tagging_tagged` (`id`, `taggable_id`, `taggable_type`, `tag_name`, `tag_slug`) VALUES
(3, 3, 'App\\Post', 'امنیت', 'امنیت'),
(4, 4, 'App\\Post', 'امنیت', 'امنیت'),
(6, 6, 'App\\Post', 'امنیت', 'امنیت'),
(7, 7, 'App\\Post', '', ''),
(8, 8, 'App\\Post', 'خدمات', 'خدمات'),
(9, 9, 'App\\Post', 'خدمات', 'خدمات'),
(10, 10, 'App\\Post', 'محصولات', 'محصولات'),
(11, 11, 'App\\Post', 'محصولات', 'محصولات'),
(12, 12, 'App\\Post', 'محصولات', 'محصولات'),
(13, 13, 'App\\Post', 'محصولات', 'محصولات');

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tags`
--

CREATE TABLE `tagging_tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_group_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suggest` tinyint(1) NOT NULL DEFAULT '0',
  `count` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tagging_tags`
--

INSERT INTO `tagging_tags` (`id`, `tag_group_id`, `slug`, `name`, `suggest`, `count`) VALUES
(1, NULL, 'امنیت', 'امنیت', 0, 3),
(2, NULL, 'خدمات', 'خدمات', 0, 2),
(3, NULL, 'محصولات', 'محصولات', 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tagging_tag_groups`
--

CREATE TABLE `tagging_tag_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `family` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `family`, `email`, `phoneNumber`, `username`, `password`, `images`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ma', 'kh', 'kh@gmail.com', '878877878', 'kh', '$2y$10$iYzly9r3vFC/2OcdJawROuj2RZxYjX7qneazkDz0XlrW.HQSBr7Ui', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `videoPath` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `viewCount` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation_codes`
--
ALTER TABLE `activation_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activation_codes_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_language_id_foreign` (`language_id`);

--
-- Indexes for table `collaborations`
--
ALTER TABLE `collaborations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `collaborations_field_id_foreign` (`field_id`),
  ADD KEY `collaborations_language_id_foreign` (`language_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_language_id_foreign` (`language_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flags`
--
ALTER TABLE `flags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`role_id`,`permission_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `person_collaboration`
--
ALTER TABLE `person_collaboration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `person_collaboration_email_unique` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_language_id_foreign` (`language_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_user_id_foreign` (`user_id`),
  ADD KEY `services_language_id_foreign` (`language_id`);

--
-- Indexes for table `slogans`
--
ALTER TABLE `slogans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slogans_language_id_foreign` (`language_id`);

--
-- Indexes for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tagged_taggable_id_index` (`taggable_id`),
  ADD KEY `tagging_tagged_taggable_type_index` (`taggable_type`),
  ADD KEY `tagging_tagged_tag_slug_index` (`tag_slug`);

--
-- Indexes for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tags_slug_index` (`slug`),
  ADD KEY `tagging_tags_tag_group_id_foreign` (`tag_group_id`);

--
-- Indexes for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tagging_tag_groups_slug_index` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activation_codes`
--
ALTER TABLE `activation_codes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `collaborations`
--
ALTER TABLE `collaborations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `flags`
--
ALTER TABLE `flags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person_collaboration`
--
ALTER TABLE `person_collaboration`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slogans`
--
ALTER TABLE `slogans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tagging_tagged`
--
ALTER TABLE `tagging_tagged`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tagging_tag_groups`
--
ALTER TABLE `tagging_tag_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activation_codes`
--
ALTER TABLE `activation_codes`
  ADD CONSTRAINT `activation_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `collaborations`
--
ALTER TABLE `collaborations`
  ADD CONSTRAINT `collaborations_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `collaborations_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `slogans`
--
ALTER TABLE `slogans`
  ADD CONSTRAINT `slogans_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tagging_tags`
--
ALTER TABLE `tagging_tags`
  ADD CONSTRAINT `tagging_tags_tag_group_id_foreign` FOREIGN KEY (`tag_group_id`) REFERENCES `tagging_tag_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
