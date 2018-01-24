-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2017 at 09:58 AM
-- Server version: 5.7.19-0ubuntu0.17.04.1
-- PHP Version: 7.0.22-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petizen`
--

-- --------------------------------------------------------

--
-- Table structure for table `backups`
--

CREATE TABLE `backups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `file_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `backup_size` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `breeds`
--

CREATE TABLE `breeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `species_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pets_count` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `breeds`
--

INSERT INTO `breeds` (`id`, `deleted_at`, `created_at`, `updated_at`, `species_id`, `name`, `pets_count`) VALUES
(1, NULL, '2017-07-28 05:02:58', '2017-07-28 05:02:58', 1, 'German Shepherd', 0),
(2, NULL, '2017-07-28 05:03:45', '2017-07-28 05:03:45', 1, 'Poodle', 0),
(3, NULL, '2017-07-28 05:04:14', '2017-07-28 05:04:14', 1, 'Labrador Retriever', 0),
(4, NULL, '2017-07-28 05:04:54', '2017-07-28 05:04:54', 1, 'Pug', 0),
(5, NULL, '2017-07-28 05:05:24', '2017-07-28 05:05:24', 1, 'Bulldog', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `deleted_at`, `created_at`, `updated_at`, `name`, `description`) VALUES
(1, NULL, '2017-07-28 06:37:27', '2017-07-28 06:39:35', 'Doctor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore'),
(2, NULL, '2017-07-28 06:39:06', '2017-07-28 06:39:06', 'Shop Keeper', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod'),
(3, '2017-07-30 23:56:23', '2017-07-28 07:45:05', '2017-07-30 23:56:23', 'Doctor1', 'asasasasas');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `post_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `deleted_at`, `created_at`, `updated_at`, `user_id`, `post_id`, `content`, `is_blocked`) VALUES
(1, NULL, '2017-08-29 06:37:34', '2017-08-29 06:37:34', 3, 1, 'com hii', 0),
(2, NULL, '2017-08-31 05:06:49', '2017-08-31 05:06:49', 3, 1, 'com hiiyg', 0),
(14, NULL, '2017-08-31 06:50:22', '2017-08-31 06:50:22', 3, 10, 'hello', 0),
(15, NULL, '2017-08-31 06:55:51', '2017-08-31 06:55:51', 3, 10, 'hii', 0),
(16, NULL, '2017-08-31 07:04:45', '2017-08-31 07:04:45', 3, 1, 'yggh', 0),
(17, NULL, '2017-08-31 07:41:28', '2017-08-31 07:41:28', 3, 11, 'hii', 0),
(26, NULL, '2017-09-04 06:59:21', '2017-09-04 06:59:21', 3, 11, 'hello', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `tags` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '[]',
  `color` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `tags`, `color`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administration', '[]', '#000', NULL, '2017-07-27 06:42:55', '2017-07-27 06:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `designation` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Male',
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mobile2` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dept` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_birth` date NOT NULL DEFAULT '1990-01-01',
  `date_hire` date NOT NULL,
  `date_left` date NOT NULL DEFAULT '1990-01-01',
  `salary_cur` decimal(15,3) NOT NULL DEFAULT '0.000',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designation`, `gender`, `mobile`, `mobile2`, `email`, `dept`, `city`, `address`, `about`, `date_birth`, `date_hire`, `date_left`, `salary_cur`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'Super Admin', 'Male', '8972925825', '', 'nits.ravis@gmail.com', 1, 'Kolkata', 'AE 106 Rabindra palli, Keshtopur', 'About user / biography', '1983-02-20', '2017-07-27', '2017-07-27', '0.000', NULL, '2017-07-27 06:43:19', '2017-07-27 06:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `description` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `start_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_full_day` tinyint(1) NOT NULL DEFAULT '0',
  `subscribers_count` int(10) UNSIGNED NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_blocked` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `deleted_at`, `created_at`, `updated_at`, `user_id`, `description`, `start_time`, `end_time`, `is_full_day`, `subscribers_count`, `is_deleted`, `is_blocked`, `title`) VALUES
(1, NULL, '2017-09-06 01:47:09', '2017-09-06 05:11:06', 3, 'test description updated_new', '2017-09-05 18:30:00', '2017-09-05 18:30:00', 0, 0, 0, 0, 'abc'),
(2, NULL, '2017-09-06 03:54:46', '2017-09-06 04:58:01', 3, 'test description updated', '2017-09-05 18:30:00', '2017-09-05 18:30:00', 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `la_configs`
--

CREATE TABLE `la_configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `la_configs`
--

INSERT INTO `la_configs` (`id`, `key`, `section`, `value`, `created_at`, `updated_at`) VALUES
(1, 'sitename', '', 'Petizen Admin', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(2, 'sitename_part1', '', 'Petizen', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(3, 'sitename_part2', '', 'Admin', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(4, 'sitename_short', '', 'PA', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(5, 'site_description', '', '', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(6, 'sidebar_search', '', '0', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(7, 'show_messages', '', '0', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(8, 'show_notifications', '', '1', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(9, 'show_tasks', '', '0', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(10, 'show_rightsidebar', '', '0', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(11, 'skin', '', 'skin-white', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(12, 'layout', '', 'fixed', '2017-07-27 06:42:57', '2017-07-28 04:51:00'),
(13, 'default_email', '', 'test@example.com', '2017-07-27 06:42:57', '2017-07-28 04:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `la_menus`
--

CREATE TABLE `la_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-cube',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'module',
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `hierarchy` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `la_menus`
--

INSERT INTO `la_menus` (`id`, `name`, `url`, `icon`, `type`, `parent`, `hierarchy`, `created_at`, `updated_at`) VALUES
(1, 'Team', '#', 'fa-group', 'custom', 0, 12, '2017-07-27 06:42:54', '2017-09-04 04:23:07'),
(2, 'Users', 'users', 'fa-group', 'module', 1, 1, '2017-07-27 06:42:54', '2017-08-08 04:16:36'),
(3, 'Uploads', 'uploads', 'fa-files-o', 'module', 0, 6, '2017-07-27 06:42:54', '2017-09-04 04:23:06'),
(4, 'Departments', 'departments', 'fa-tags', 'module', 1, 2, '2017-07-27 06:42:55', '2017-08-08 04:16:36'),
(5, 'Employees', 'employees', 'fa-group', 'module', 1, 3, '2017-07-27 06:42:55', '2017-08-08 04:16:36'),
(6, 'Roles', 'roles', 'fa-user-plus', 'module', 1, 4, '2017-07-27 06:42:55', '2017-08-08 04:16:36'),
(8, 'Permissions', 'permissions', 'fa-magic', 'module', 1, 5, '2017-07-27 06:42:55', '2017-08-08 04:16:36'),
(9, 'Species', 'species', 'fa fa-cube', 'module', 0, 7, '2017-07-28 04:54:58', '2017-09-04 04:23:06'),
(10, 'Breeds', 'breeds', 'fa fa-cube', 'module', 0, 8, '2017-07-28 05:00:08', '2017-09-04 04:23:06'),
(11, 'Pets', 'pets', 'fa fa-cube', 'module', 0, 9, '2017-07-28 05:23:52', '2017-09-04 04:23:06'),
(12, 'Categories', 'categories', 'fa fa-cube', 'module', 0, 10, '2017-07-28 06:35:14', '2017-09-04 04:23:06'),
(13, 'Organizations', 'organizations', 'fa fa-cube', 'module', 0, 11, '2017-07-28 07:06:25', '2017-09-04 04:23:06'),
(14, 'Posts', 'posts', 'fa fa-cube', 'module', 0, 2, '2017-08-24 07:18:24', '2017-09-04 04:23:06'),
(15, 'Likes', 'likes', 'fa fa-cube', 'module', 0, 3, '2017-08-25 06:41:12', '2017-09-04 04:23:06'),
(16, 'Comments', 'comments', 'fa fa-cube', 'module', 0, 4, '2017-08-29 03:33:32', '2017-09-04 04:23:06'),
(17, 'Reports', 'reports', 'fa fa-cube', 'module', 0, 5, '2017-08-29 07:31:34', '2017-09-04 04:23:06'),
(20, 'Users', 'users', 'fa-group', 'module', 0, 1, '2017-09-04 04:22:12', '2017-09-04 04:23:06'),
(21, 'Events', 'events', 'fa fa-cube', 'module', 0, 0, '2017-09-06 01:43:25', '2017-09-06 01:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `post_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `deleted_at`, `created_at`, `updated_at`, `user_id`, `post_id`, `is_deleted`) VALUES
(61, NULL, '2017-08-31 02:22:10', '2017-08-31 02:22:10', 3, 11, 0),
(65, NULL, '2017-08-31 05:02:51', '2017-08-31 05:02:51', 3, 1, 0),
(67, NULL, '2017-09-04 07:00:30', '2017-09-04 07:00:30', 3, 10, 0),
(68, NULL, '2017-09-04 09:38:11', '2017-09-04 09:38:11', 48, 11, 0);

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
('2014_05_26_050000_create_modules_table', 1),
('2014_05_26_055000_create_module_field_types_table', 1),
('2014_05_26_060000_create_module_fields_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_12_01_000000_create_uploads_table', 1),
('2016_05_26_064006_create_departments_table', 1),
('2016_05_26_064007_create_employees_table', 1),
('2016_05_26_064446_create_roles_table', 1),
('2016_07_05_115343_create_role_user_table', 1),
('2016_07_06_140637_create_organizations_table', 1),
('2016_07_07_134058_create_backups_table', 1),
('2016_07_07_134058_create_menus_table', 1),
('2016_09_10_163337_create_permissions_table', 1),
('2016_09_10_163520_create_permission_role_table', 1),
('2016_09_22_105958_role_module_fields_table', 1),
('2016_09_22_110008_role_module_table', 1),
('2016_10_06_115413_create_la_configs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_db` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `view_col` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fa_icon` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-cube',
  `is_gen` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `label`, `name_db`, `view_col`, `model`, `controller`, `fa_icon`, `is_gen`, `created_at`, `updated_at`) VALUES
(1, 'Users', 'Users', 'users', 'name', 'User', 'UsersController', 'fa-group', 1, '2017-07-27 06:42:38', '2017-07-27 06:42:57'),
(2, 'Uploads', 'Uploads', 'uploads', 'name', 'Upload', 'UploadsController', 'fa-files-o', 1, '2017-07-27 06:42:39', '2017-07-27 06:42:57'),
(3, 'Departments', 'Departments', 'departments', 'name', 'Department', 'DepartmentsController', 'fa-tags', 1, '2017-07-27 06:42:40', '2017-07-27 06:42:57'),
(4, 'Employees', 'Employees', 'employees', 'name', 'Employee', 'EmployeesController', 'fa-group', 1, '2017-07-27 06:42:40', '2017-07-27 06:42:57'),
(5, 'Roles', 'Roles', 'roles', 'name', 'Role', 'RolesController', 'fa-user-plus', 1, '2017-07-27 06:42:42', '2017-07-27 06:42:57'),
(7, 'Backups', 'Backups', 'backups', 'name', 'Backup', 'BackupsController', 'fa-hdd-o', 1, '2017-07-27 06:42:48', '2017-07-27 06:42:57'),
(8, 'Permissions', 'Permissions', 'permissions', 'name', 'Permission', 'PermissionsController', 'fa-magic', 1, '2017-07-27 06:42:48', '2017-07-27 06:42:57'),
(9, 'Species', 'Species', 'species', 'name', 'Species', 'SpeciesController', 'fa-cube', 1, '2017-07-28 04:53:08', '2017-07-28 04:54:59'),
(10, 'Breeds', 'Breeds', 'breeds', 'name', 'Breed', 'BreedsController', 'fa-cube', 1, '2017-07-28 04:57:28', '2017-09-01 04:07:48'),
(11, 'Pets', 'Pets', 'pets', 'breed_id', 'Pet', 'PetsController', 'fa-cube', 1, '2017-07-28 05:12:47', '2017-07-28 05:23:52'),
(12, 'Categories', 'Categories', 'categories', 'name', 'Category', 'CategoriesController', 'fa-cube', 1, '2017-07-28 06:33:14', '2017-07-28 06:35:14'),
(13, 'Organizations', 'Organizations', 'organizations', 'user_id', 'Organization', 'OrganizationsController', 'fa-cube', 1, '2017-07-28 06:56:23', '2017-07-28 07:06:25'),
(15, 'Posts', 'Posts', 'posts', 'content', 'Post', 'PostsController', 'fa-cube', 1, '2017-08-24 04:58:01', '2017-09-01 04:07:24'),
(16, 'Likes', 'Likes', 'likes', 'post_id', 'Like', 'LikesController', 'fa-cube', 1, '2017-08-25 06:39:11', '2017-08-25 06:41:12'),
(17, 'Comments', 'Comments', 'comments', 'is_blocked', 'Comment', 'CommentsController', 'fa-cube', 1, '2017-08-29 03:27:31', '2017-08-29 03:33:32'),
(18, 'Reports', 'Reports', 'reports', 'user_id', 'Report', 'ReportsController', 'fa-cube', 1, '2017-08-29 07:29:58', '2017-08-29 07:31:34'),
(19, 'Events', 'Events', 'events', 'title', 'Event', 'EventsController', 'fa-cube', 1, '2017-09-06 01:23:44', '2017-09-06 05:27:11');

-- --------------------------------------------------------

--
-- Table structure for table `module_fields`
--

CREATE TABLE `module_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `colname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `module` int(10) UNSIGNED NOT NULL,
  `field_type` int(10) UNSIGNED NOT NULL,
  `unique` tinyint(1) NOT NULL DEFAULT '0',
  `defaultvalue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `minlength` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `maxlength` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `popup_vals` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_fields`
--

INSERT INTO `module_fields` (`id`, `colname`, `label`, `module`, `field_type`, `unique`, `defaultvalue`, `minlength`, `maxlength`, `required`, `popup_vals`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'name', 'Name', 1, 16, 0, '', 5, 250, 1, '', 0, '2017-07-27 06:42:38', '2017-07-27 06:42:38'),
(2, 'context_id', 'Context', 1, 13, 0, '0', 0, 0, 0, '', 0, '2017-07-27 06:42:38', '2017-07-27 06:42:38'),
(3, 'email', 'Email', 1, 8, 1, '', 0, 250, 0, '', 0, '2017-07-27 06:42:38', '2017-07-27 06:42:38'),
(4, 'password', 'Password', 1, 17, 0, '', 6, 250, 1, '', 0, '2017-07-27 06:42:38', '2017-07-27 06:42:38'),
(5, 'type', 'User Type', 1, 7, 0, 'Employee', 0, 0, 0, '[\"Employee\",\"Client\"]', 0, '2017-07-27 06:42:38', '2017-07-27 06:42:38'),
(6, 'name', 'Name', 2, 16, 0, '', 5, 250, 1, '', 0, '2017-07-27 06:42:39', '2017-07-27 06:42:39'),
(7, 'path', 'Path', 2, 19, 0, '', 0, 250, 0, '', 0, '2017-07-27 06:42:39', '2017-07-27 06:42:39'),
(8, 'extension', 'Extension', 2, 19, 0, '', 0, 20, 0, '', 0, '2017-07-27 06:42:39', '2017-07-27 06:42:39'),
(9, 'caption', 'Caption', 2, 19, 0, '', 0, 250, 0, '', 0, '2017-07-27 06:42:39', '2017-07-27 06:42:39'),
(10, 'user_id', 'Owner', 2, 7, 0, '1', 0, 0, 0, '@users', 0, '2017-07-27 06:42:39', '2017-07-27 06:42:39'),
(11, 'hash', 'Hash', 2, 19, 0, '', 0, 250, 0, '', 0, '2017-07-27 06:42:39', '2017-07-27 06:42:39'),
(12, 'public', 'Is Public', 2, 2, 0, '0', 0, 0, 0, '', 0, '2017-07-27 06:42:39', '2017-07-27 06:42:39'),
(13, 'name', 'Name', 3, 16, 1, '', 1, 250, 1, '', 0, '2017-07-27 06:42:40', '2017-07-27 06:42:40'),
(14, 'tags', 'Tags', 3, 20, 0, '[]', 0, 0, 0, '', 0, '2017-07-27 06:42:40', '2017-07-27 06:42:40'),
(15, 'color', 'Color', 3, 19, 0, '', 0, 50, 1, '', 0, '2017-07-27 06:42:40', '2017-07-27 06:42:40'),
(16, 'name', 'Name', 4, 16, 0, '', 5, 250, 1, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(17, 'designation', 'Designation', 4, 19, 0, '', 0, 50, 1, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(18, 'gender', 'Gender', 4, 18, 0, 'Male', 0, 0, 1, '[\"Male\",\"Female\"]', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(19, 'mobile', 'Mobile', 4, 14, 0, '', 10, 20, 1, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(20, 'mobile2', 'Alternative Mobile', 4, 14, 0, '', 10, 20, 0, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(21, 'email', 'Email', 4, 8, 1, '', 5, 250, 1, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(22, 'dept', 'Department', 4, 7, 0, '0', 0, 0, 1, '@departments', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(23, 'city', 'City', 4, 19, 0, '', 0, 50, 0, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(24, 'address', 'Address', 4, 1, 0, '', 0, 1000, 0, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(25, 'about', 'About', 4, 19, 0, '', 0, 0, 0, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(26, 'date_birth', 'Date of Birth', 4, 4, 0, '1990-01-01', 0, 0, 0, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(27, 'date_hire', 'Hiring Date', 4, 4, 0, 'date(\'Y-m-d\')', 0, 0, 0, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(28, 'date_left', 'Resignation Date', 4, 4, 0, '1990-01-01', 0, 0, 0, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(29, 'salary_cur', 'Current Salary', 4, 6, 0, '0.0', 0, 2, 0, '', 0, '2017-07-27 06:42:41', '2017-07-27 06:42:41'),
(30, 'name', 'Name', 5, 16, 1, '', 1, 250, 1, '', 0, '2017-07-27 06:42:42', '2017-07-27 06:42:42'),
(31, 'display_name', 'Display Name', 5, 19, 0, '', 0, 250, 1, '', 0, '2017-07-27 06:42:42', '2017-07-27 06:42:42'),
(32, 'description', 'Description', 5, 21, 0, '', 0, 1000, 0, '', 0, '2017-07-27 06:42:42', '2017-07-27 06:42:42'),
(33, 'parent', 'Parent Role', 5, 7, 0, '1', 0, 0, 0, '@roles', 0, '2017-07-27 06:42:42', '2017-07-27 06:42:42'),
(34, 'dept', 'Department', 5, 7, 0, '1', 0, 0, 0, '@departments', 0, '2017-07-27 06:42:42', '2017-07-27 06:42:42'),
(46, 'name', 'Name', 7, 16, 1, '', 0, 250, 1, '', 0, '2017-07-27 06:42:48', '2017-07-27 06:42:48'),
(47, 'file_name', 'File Name', 7, 19, 1, '', 0, 250, 1, '', 0, '2017-07-27 06:42:48', '2017-07-27 06:42:48'),
(48, 'backup_size', 'File Size', 7, 19, 0, '0', 0, 10, 1, '', 0, '2017-07-27 06:42:48', '2017-07-27 06:42:48'),
(49, 'name', 'Name', 8, 16, 1, '', 1, 250, 1, '', 0, '2017-07-27 06:42:49', '2017-07-27 06:42:49'),
(50, 'display_name', 'Display Name', 8, 19, 0, '', 0, 250, 1, '', 0, '2017-07-27 06:42:49', '2017-07-27 06:42:49'),
(51, 'description', 'Description', 8, 21, 0, '', 0, 1000, 0, '', 0, '2017-07-27 06:42:49', '2017-07-27 06:42:49'),
(52, 'name', 'Name', 9, 22, 1, '', 0, 256, 1, '', 0, '2017-07-28 04:54:08', '2017-07-28 04:54:08'),
(53, 'pets_count', 'Pets Count', 9, 13, 0, '', 0, 11, 0, '', 0, '2017-07-28 04:54:38', '2017-07-28 04:54:38'),
(54, 'species_id', 'Species', 10, 7, 0, '', 0, 0, 1, '@species', 0, '2017-07-28 04:58:59', '2017-07-28 04:59:18'),
(55, 'name', 'Name', 10, 22, 1, '', 0, 256, 1, '', 0, '2017-07-28 04:59:48', '2017-07-28 04:59:48'),
(56, 'pets_count', 'Pets Count', 10, 13, 0, '0', 0, 11, 0, '', 0, '2017-07-28 05:01:20', '2017-07-28 05:01:20'),
(57, 'user_id', 'User', 11, 7, 0, '', 0, 0, 1, '@users', 0, '2017-07-28 05:13:47', '2017-07-28 05:13:47'),
(58, 'species_id', 'Species', 11, 7, 0, '', 0, 0, 1, '@species', 0, '2017-07-28 05:14:56', '2017-07-28 05:16:33'),
(59, 'breed_id', 'Breed', 11, 7, 0, '', 0, 0, 1, '@breeds', 0, '2017-07-28 05:16:20', '2017-07-28 06:12:19'),
(60, 'name', 'Name', 11, 22, 0, '', 0, 256, 1, '', 0, '2017-07-28 05:17:09', '2017-07-28 05:17:09'),
(61, 'profile_pic', 'Profile Image', 11, 9, 0, '', 0, 0, 0, '', 0, '2017-07-28 05:18:08', '2017-07-28 05:18:08'),
(62, 'date_of_birth', 'DOB', 11, 4, 0, '', 0, 0, 0, '', 0, '2017-07-28 05:20:05', '2017-07-28 05:20:05'),
(63, 'gender', 'Gender', 11, 18, 0, '', 0, 0, 1, '[\"Male\",\"Female\"]', 0, '2017-07-28 05:23:25', '2017-07-28 05:23:37'),
(64, 'name', 'Name', 12, 22, 1, '', 0, 256, 1, '', 0, '2017-07-28 06:33:51', '2017-07-28 06:33:51'),
(65, 'description', 'Description', 12, 21, 0, '', 0, 0, 1, '', 0, '2017-07-28 06:34:22', '2017-07-28 06:34:22'),
(67, 'user_id', 'User', 13, 7, 0, '', 0, 0, 1, '@users', 0, '2017-07-28 06:57:03', '2017-07-28 06:58:57'),
(68, 'category_id', 'Category', 13, 7, 0, '', 0, 0, 1, '@categories', 0, '2017-07-28 06:57:51', '2017-07-28 06:57:51'),
(69, 'name', 'Name', 13, 22, 1, '', 0, 256, 1, '', 0, '2017-07-28 06:58:46', '2017-07-28 06:58:46'),
(70, 'description', 'Description', 13, 21, 0, '', 0, 0, 1, '', 0, '2017-07-28 06:59:49', '2017-07-28 06:59:49'),
(71, 'phone_no', 'Contact No', 13, 22, 0, '', 10, 256, 1, '', 0, '2017-07-28 07:00:45', '2017-07-28 07:00:45'),
(72, 'email', 'Email', 13, 8, 1, '', 0, 256, 1, '', 0, '2017-07-28 07:01:14', '2017-07-28 07:01:14'),
(73, 'website', 'Website', 13, 23, 0, '', 0, 256, 0, '', 0, '2017-07-28 07:01:43', '2017-07-28 07:01:43'),
(74, 'address', 'Address', 13, 1, 0, '', 0, 256, 1, '', 0, '2017-07-28 07:03:01', '2017-07-28 07:08:15'),
(76, 'user_id', 'User', 15, 7, 0, '0', 0, 0, 1, '@users', 0, '2017-08-24 07:15:22', '2017-08-24 07:15:22'),
(77, 'content', 'Content', 15, 21, 0, '', 0, 0, 0, '', 0, '2017-08-24 07:16:04', '2017-08-24 07:16:04'),
(78, 'comments_count', 'Comment Count', 15, 13, 0, '0', 0, 11, 0, '', 0, '2017-08-24 07:16:49', '2017-08-24 07:16:49'),
(79, 'likes_count', 'Likes Count', 15, 13, 0, '0', 0, 11, 0, '', 0, '2017-08-24 07:17:28', '2017-08-24 07:17:28'),
(80, 'shares_count', 'Shares Count', 15, 13, 0, '0', 0, 11, 0, '', 0, '2017-08-24 07:18:08', '2017-08-24 07:19:26'),
(81, 'user_id', 'User Id', 16, 7, 0, '0', 0, 0, 0, '@users', 0, '2017-08-25 06:40:08', '2017-08-25 06:40:08'),
(82, 'post_id', 'Post Id', 16, 7, 0, '0', 0, 0, 0, '@posts', 0, '2017-08-25 06:40:51', '2017-08-25 06:40:51'),
(83, 'is_deleted', 'Is Deleted', 16, 2, 0, '0', 0, 0, 0, '', 0, '2017-08-25 06:48:09', '2017-08-25 06:48:09'),
(84, 'user_id', 'User', 17, 7, 0, '0', 0, 0, 0, '@users', 0, '2017-08-29 03:29:20', '2017-08-29 03:29:20'),
(85, 'post_id', 'Post', 17, 7, 0, '0', 0, 0, 0, '@posts', 0, '2017-08-29 03:29:55', '2017-08-29 03:35:59'),
(86, 'content', 'Content', 17, 21, 0, '', 0, 0, 0, '', 0, '2017-08-29 03:32:05', '2017-08-29 03:32:05'),
(87, 'is_blocked', 'Is Blocked', 17, 2, 0, '0', 0, 0, 0, '', 0, '2017-08-29 03:33:18', '2017-08-29 03:33:18'),
(88, 'post_id', 'Post', 18, 7, 0, '0', 0, 0, 0, '@posts', 0, '2017-08-29 07:31:02', '2017-09-01 01:26:45'),
(89, 'user_id', 'User', 18, 7, 0, '', 0, 0, 0, '@users', 0, '2017-08-29 07:31:23', '2017-08-29 07:31:23'),
(90, 'status', 'Status', 15, 18, 0, 'Active', 0, 0, 0, '[\"Active\",\"Inactive\"]', 0, '2017-09-01 05:55:42', '2017-09-01 05:55:42'),
(91, 'user_id', 'User', 19, 7, 0, '', 0, 0, 1, '@users', 0, '2017-09-06 01:28:26', '2017-09-06 01:28:26'),
(92, 'description', 'Description', 19, 21, 0, '', 0, 256, 0, '', 0, '2017-09-06 01:35:17', '2017-09-06 01:42:19'),
(93, 'start_time', 'Start Time', 19, 5, 0, '', 0, 0, 0, '', 0, '2017-09-06 01:35:54', '2017-09-06 01:35:54'),
(94, 'end_time', 'End Time', 19, 5, 0, '', 0, 0, 0, '', 0, '2017-09-06 01:36:35', '2017-09-06 01:36:35'),
(95, 'is_full_day', 'Is Full Day', 19, 2, 0, '', 0, 0, 0, '', 0, '2017-09-06 01:37:46', '2017-09-06 01:37:46'),
(96, 'subscribers_count', 'Subscribers Count', 19, 13, 0, '', 0, 256, 0, '', 0, '2017-09-06 01:40:00', '2017-09-06 01:40:00'),
(97, 'is_deleted', 'Is Deleted', 19, 2, 0, '', 0, 0, 0, '', 0, '2017-09-06 01:40:46', '2017-09-06 01:40:46'),
(98, 'is_blocked', 'Is Blocked', 19, 2, 0, '', 0, 256, 0, '', 0, '2017-09-06 01:41:06', '2017-09-06 01:41:24'),
(99, 'title', 'Title', 19, 22, 0, '', 0, 255, 0, '', 0, '2017-09-06 05:27:05', '2017-09-06 05:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `module_field_types`
--

CREATE TABLE `module_field_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_field_types`
--

INSERT INTO `module_field_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Address', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(2, 'Checkbox', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(3, 'Currency', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(4, 'Date', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(5, 'Datetime', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(6, 'Decimal', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(7, 'Dropdown', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(8, 'Email', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(9, 'File', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(10, 'Float', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(11, 'HTML', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(12, 'Image', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(13, 'Integer', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(14, 'Mobile', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(15, 'Multiselect', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(16, 'Name', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(17, 'Password', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(18, 'Radio', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(19, 'String', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(20, 'Taginput', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(21, 'Textarea', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(22, 'TextField', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(23, 'URL', '2017-07-27 06:42:36', '2017-07-27 06:42:36'),
(24, 'Files', '2017-07-27 06:42:36', '2017-07-27 06:42:36');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `category_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `website` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `lat` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `deleted_at`, `created_at`, `updated_at`, `user_id`, `category_id`, `name`, `description`, `phone_no`, `email`, `website`, `address`, `lat`, `lang`) VALUES
(1, NULL, '2017-07-28 07:10:30', '2017-07-28 07:10:30', 1, 1, 'test organization', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,', '54545454545454545', 'test@test.com', '', 'Sodepur Kolkata-110', '', ''),
(3, NULL, '2017-08-21 01:38:44', '2017-08-21 01:38:44', 3, 2, 'ttg', 'fghh', '45555', 'vvgg', 'hgg.com', 'kolkata', '', ''),
(4, NULL, '2017-08-28 10:37:55', '2017-08-28 10:37:55', 48, 1, 'Zamer', 'samurai dog parties', '00962787980824', 'zamernas@hotmail.com', 'khalidzamer.com', 'Amman', '', ''),
(6, NULL, '2017-09-06 00:24:01', '2017-09-06 00:24:01', 1, 1, 'abc', 'hello', '1234567890', 'abc@gmail.com', 'www.info.com', 'Sodepur Kolkata-110', '', ''),
(7, NULL, '2017-09-06 00:50:47', '2017-09-06 00:50:47', 1, 1, 'abc', 'hello', '1234567890', 'abc@gmail.com', 'www.info.com', 'Sodepur Kolkata-110', '22.7038233', '88.382927');

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
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `display_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN_PANEL', 'Admin Panel', 'Admin Panel Permission', NULL, '2017-07-27 06:42:57', '2017-07-27 06:42:57');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `species_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `breed_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `profile_pic` int(11) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `deleted_at`, `created_at`, `updated_at`, `user_id`, `species_id`, `breed_id`, `name`, `profile_pic`, `date_of_birth`, `gender`) VALUES
(1, NULL, '2017-08-18 07:13:05', '2017-08-18 07:13:05', 3, 1, 1, 'aa', 0, '2017-02-15', 'male'),
(6, NULL, '2017-08-19 02:52:27', '2017-08-19 02:52:27', 3, 1, 4, 'test', 0, '2012-08-31', 'male'),
(7, NULL, '2017-09-04 02:16:06', '2017-09-04 02:16:06', 54, 1, 1, 'new prt', 0, '2017-08-16', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `comments_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `likes_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `shares_count` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `deleted_at`, `created_at`, `updated_at`, `user_id`, `content`, `comments_count`, `likes_count`, `shares_count`, `parent_id`, `status`) VALUES
(1, NULL, '2017-08-24 07:18:51', '2017-08-24 07:18:51', 3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 3, 1, 0, 0, 'Inactive'),
(10, NULL, '2017-08-25 06:01:08', '2017-08-25 06:01:08', 3, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', 2, 1, 0, 0, 'Active'),
(11, NULL, '2017-08-25 06:09:50', '2017-08-25 06:09:50', 3, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable', 2, 2, 0, 0, 'Active'),
(36, NULL, '2017-09-04 09:39:38', '2017-09-04 09:39:38', 48, 'go to market evening', 0, 0, 0, 0, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `deleted_at`, `created_at`, `updated_at`, `post_id`, `user_id`) VALUES
(1, NULL, '2017-08-31 07:18:41', '2017-08-31 07:18:41', 1, 3),
(2, NULL, '2017-08-31 07:25:52', '2017-08-31 07:25:52', 11, 3),
(3, NULL, '2017-08-31 07:26:03', '2017-08-31 07:26:03', 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `display_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `dept` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `parent`, `dept`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SUPER_ADMIN', 'Super Admin', 'Full Access Role', 1, 1, NULL, '2017-07-27 06:42:55', '2017-07-27 06:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `role_module`
--

CREATE TABLE `role_module` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `acc_view` tinyint(1) NOT NULL,
  `acc_create` tinyint(1) NOT NULL,
  `acc_edit` tinyint(1) NOT NULL,
  `acc_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_module`
--

INSERT INTO `role_module` (`id`, `role_id`, `module_id`, `acc_view`, `acc_create`, `acc_edit`, `acc_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, '2017-07-27 06:42:55', '2017-07-27 06:42:55'),
(2, 1, 2, 1, 1, 1, 1, '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(3, 1, 3, 1, 1, 1, 1, '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(4, 1, 4, 1, 1, 1, 1, '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(5, 1, 5, 1, 1, 1, 1, '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(7, 1, 7, 1, 1, 1, 1, '2017-07-27 06:42:57', '2017-07-27 06:42:57'),
(8, 1, 8, 1, 1, 1, 1, '2017-07-27 06:42:57', '2017-07-27 06:42:57'),
(9, 1, 9, 1, 1, 1, 1, '2017-07-28 04:54:59', '2017-07-28 04:54:59'),
(10, 1, 10, 1, 1, 1, 1, '2017-07-28 05:00:08', '2017-07-28 05:00:08'),
(11, 1, 11, 1, 1, 1, 1, '2017-07-28 05:23:52', '2017-07-28 05:23:52'),
(12, 1, 12, 1, 1, 1, 1, '2017-07-28 06:35:14', '2017-07-28 06:35:14'),
(13, 1, 13, 1, 1, 1, 1, '2017-07-28 07:06:25', '2017-07-28 07:06:25'),
(14, 1, 15, 1, 1, 1, 1, '2017-08-24 07:18:24', '2017-08-24 07:18:24'),
(15, 1, 16, 1, 1, 1, 1, '2017-08-25 06:41:12', '2017-08-25 06:41:12'),
(16, 1, 17, 1, 1, 1, 1, '2017-08-29 03:33:32', '2017-08-29 03:33:32'),
(17, 1, 18, 1, 1, 1, 1, '2017-08-29 07:31:34', '2017-08-29 07:31:34'),
(18, 1, 19, 1, 1, 1, 1, '2017-09-04 01:15:55', '2017-09-04 01:15:55'),
(19, 1, 20, 1, 1, 1, 1, '2017-09-04 02:10:26', '2017-09-04 02:10:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_module_fields`
--

CREATE TABLE `role_module_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `access` enum('invisible','readonly','write') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_module_fields`
--

INSERT INTO `role_module_fields` (`id`, `role_id`, `field_id`, `access`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'write', '2017-07-27 06:42:55', '2017-07-27 06:42:55'),
(2, 1, 2, 'write', '2017-07-27 06:42:55', '2017-07-27 06:42:55'),
(3, 1, 3, 'write', '2017-07-27 06:42:55', '2017-07-27 06:42:55'),
(4, 1, 4, 'write', '2017-07-27 06:42:55', '2017-07-27 06:42:55'),
(5, 1, 5, 'write', '2017-07-27 06:42:55', '2017-07-27 06:42:55'),
(6, 1, 6, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(7, 1, 7, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(8, 1, 8, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(9, 1, 9, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(10, 1, 10, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(11, 1, 11, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(12, 1, 12, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(13, 1, 13, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(14, 1, 14, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(15, 1, 15, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(16, 1, 16, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(17, 1, 17, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(18, 1, 18, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(19, 1, 19, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(20, 1, 20, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(21, 1, 21, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(22, 1, 22, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(23, 1, 23, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(24, 1, 24, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(25, 1, 25, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(26, 1, 26, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(27, 1, 27, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(28, 1, 28, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(29, 1, 29, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(30, 1, 30, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(31, 1, 31, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(32, 1, 32, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(33, 1, 33, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(34, 1, 34, 'write', '2017-07-27 06:42:56', '2017-07-27 06:42:56'),
(46, 1, 46, 'write', '2017-07-27 06:42:57', '2017-07-27 06:42:57'),
(47, 1, 47, 'write', '2017-07-27 06:42:57', '2017-07-27 06:42:57'),
(48, 1, 48, 'write', '2017-07-27 06:42:57', '2017-07-27 06:42:57'),
(49, 1, 49, 'write', '2017-07-27 06:42:57', '2017-07-27 06:42:57'),
(50, 1, 50, 'write', '2017-07-27 06:42:57', '2017-07-27 06:42:57'),
(51, 1, 51, 'write', '2017-07-27 06:42:57', '2017-07-27 06:42:57'),
(52, 1, 52, 'write', '2017-07-28 04:54:09', '2017-07-28 04:54:09'),
(53, 1, 53, 'write', '2017-07-28 04:54:39', '2017-07-28 04:54:39'),
(54, 1, 54, 'write', '2017-07-28 04:59:01', '2017-07-28 04:59:01'),
(55, 1, 55, 'write', '2017-07-28 04:59:48', '2017-07-28 04:59:48'),
(56, 1, 56, 'write', '2017-07-28 05:01:21', '2017-07-28 05:01:21'),
(57, 1, 57, 'write', '2017-07-28 05:13:49', '2017-07-28 05:13:49'),
(58, 1, 58, 'write', '2017-07-28 05:14:58', '2017-07-28 05:14:58'),
(59, 1, 59, 'write', '2017-07-28 05:16:22', '2017-07-28 05:16:22'),
(60, 1, 60, 'write', '2017-07-28 05:17:10', '2017-07-28 05:17:10'),
(61, 1, 61, 'write', '2017-07-28 05:18:09', '2017-07-28 05:18:09'),
(62, 1, 62, 'write', '2017-07-28 05:20:06', '2017-07-28 05:20:06'),
(63, 1, 63, 'write', '2017-07-28 05:23:26', '2017-07-28 05:23:26'),
(64, 1, 64, 'write', '2017-07-28 06:33:52', '2017-07-28 06:33:52'),
(65, 1, 65, 'write', '2017-07-28 06:34:23', '2017-07-28 06:34:23'),
(67, 1, 67, 'write', '2017-07-28 06:57:05', '2017-07-28 06:57:05'),
(68, 1, 68, 'write', '2017-07-28 06:57:53', '2017-07-28 06:57:53'),
(69, 1, 69, 'write', '2017-07-28 06:58:47', '2017-07-28 06:58:47'),
(70, 1, 70, 'write', '2017-07-28 06:59:50', '2017-07-28 06:59:50'),
(71, 1, 71, 'write', '2017-07-28 07:00:46', '2017-07-28 07:00:46'),
(72, 1, 72, 'write', '2017-07-28 07:01:15', '2017-07-28 07:01:15'),
(73, 1, 73, 'write', '2017-07-28 07:01:44', '2017-07-28 07:01:44'),
(74, 1, 74, 'write', '2017-07-28 07:03:02', '2017-07-28 07:03:02'),
(75, 1, 76, 'write', '2017-08-24 07:15:23', '2017-08-24 07:15:23'),
(76, 1, 77, 'write', '2017-08-24 07:16:04', '2017-08-24 07:16:04'),
(77, 1, 78, 'write', '2017-08-24 07:16:50', '2017-08-24 07:16:50'),
(78, 1, 79, 'write', '2017-08-24 07:17:29', '2017-08-24 07:17:29'),
(79, 1, 80, 'write', '2017-08-24 07:18:09', '2017-08-24 07:18:09'),
(80, 1, 81, 'write', '2017-08-25 06:40:10', '2017-08-25 06:40:10'),
(81, 1, 82, 'write', '2017-08-25 06:40:52', '2017-08-25 06:40:52'),
(82, 1, 83, 'write', '2017-08-25 06:48:10', '2017-08-25 06:48:10'),
(83, 1, 84, 'write', '2017-08-29 03:29:21', '2017-08-29 03:29:21'),
(84, 1, 85, 'write', '2017-08-29 03:29:55', '2017-08-29 03:29:55'),
(85, 1, 86, 'write', '2017-08-29 03:32:06', '2017-08-29 03:32:06'),
(86, 1, 87, 'write', '2017-08-29 03:33:19', '2017-08-29 03:33:19'),
(87, 1, 88, 'write', '2017-08-29 07:31:03', '2017-08-29 07:31:03'),
(88, 1, 89, 'write', '2017-08-29 07:31:24', '2017-08-29 07:31:24'),
(89, 1, 90, 'write', '2017-09-01 05:55:43', '2017-09-01 05:55:43'),
(90, 1, 91, 'write', '2017-09-04 01:14:54', '2017-09-04 01:14:54'),
(91, 1, 92, 'write', '2017-09-04 01:15:32', '2017-09-04 01:15:32'),
(92, 1, 93, 'write', '2017-09-04 02:06:26', '2017-09-04 02:06:26'),
(93, 1, 94, 'write', '2017-09-04 03:47:10', '2017-09-04 03:47:10'),
(94, 1, 95, 'write', '2017-09-06 01:37:47', '2017-09-06 01:37:47'),
(95, 1, 96, 'write', '2017-09-06 01:40:01', '2017-09-06 01:40:01'),
(96, 1, 97, 'write', '2017-09-06 01:40:47', '2017-09-06 01:40:47'),
(97, 1, 98, 'write', '2017-09-06 01:41:07', '2017-09-06 01:41:07'),
(98, 1, 99, 'write', '2017-09-06 05:27:06', '2017-09-06 05:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `species`
--

CREATE TABLE `species` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `pets_count` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `species`
--

INSERT INTO `species` (`id`, `deleted_at`, `created_at`, `updated_at`, `name`, `pets_count`) VALUES
(1, NULL, '2017-07-28 04:55:17', '2017-07-28 04:55:17', 'Dog', 0),
(2, NULL, '2017-07-28 04:55:49', '2017-07-28 04:55:49', 'Cat', 0),
(3, NULL, '2017-09-03 01:41:47', '2017-09-03 01:41:47', 'Bird', 0),
(4, NULL, '2017-09-03 01:42:01', '2017-09-03 01:42:01', 'Fish', 0),
(5, NULL, '2017-09-03 01:42:13', '2017-09-03 01:42:13', 'Reptile', 0),
(6, NULL, '2017-09-03 01:42:33', '2017-09-03 01:42:33', 'Equine', 0),
(7, NULL, '2017-09-03 01:42:48', '2017-09-03 01:42:48', 'Rodent', 0),
(8, NULL, '2017-09-03 01:45:16', '2017-09-03 01:45:16', 'Arthropod', 0),
(9, NULL, '2017-09-03 01:45:53', '2017-09-03 01:45:53', 'Exotic', 0),
(10, NULL, '2017-09-03 01:46:20', '2017-09-03 01:46:20', 'Other Species', 0);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hash` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `path`, `extension`, `caption`, `user_id`, `hash`, `public`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'data model diagram - Relations v1.jpg', '/opt/lampp/htdocs/la1/storage/uploads/2017-07-27-121529-data model diagram - Relations v1.jpg', 'jpg', '', 1, 'ktyo6bhdwwfjfch2zdyk', 0, '2017-07-31 03:22:44', '2017-07-27 06:45:29', '2017-07-31 03:22:44'),
(2, 'data model diagram - Relations v1.jpg', '/var/www/html/team3/petiZen/storage/uploads/2017-07-31-085305-data model diagram - Relations v1.jpg', 'jpg', '', 1, '2t3ozrwiwphrqfnse7un', 0, NULL, '2017-07-31 03:23:05', '2017-07-31 03:23:05'),
(3, 'data model diagram - Hierarchic v1.jpg', '/var/www/html/team3/petiZen/storage/uploads/2017-07-31-085315-data model diagram - Hierarchic v1.jpg', 'jpg', '', 1, 'hetymglxcco8rozg2hbf', 0, NULL, '2017-07-31 03:23:15', '2017-07-31 03:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `context_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Employee',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `api_token` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `context_id`, `email`, `password`, `type`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `api_token`, `dob`, `gender`) VALUES
(1, 'Super Admin', 1, 'nits.ravis@gmail.com', '$2y$10$lc275VjjcmyPeYe.i0t1fO/bJreBagJdoyqCcbgzBAmyrO/YMg9c.', 'Employee', 'QfubOCAxy0RZqFIua2IAZndzFNbtFry1weTprWH1Iwe20OZmyKhMBKhEWOJo', NULL, '2017-07-27 06:43:19', '2017-09-06 06:11:53', 'CUzYGbGiXe5yFJBXox3UVyflz0pOVpdLws4SzbM8k1R0ak6MRQMyEJ5LPrGD', NULL, NULL),
(3, 'anup chakraborty', 2, 'nits.anup@gmail.com', '$2y$10$Y7H23T.K50/NxaO9hKHUrOr6VDR0SHZjg/JQvcBTwJM0V2Q2u2E6u', 'pet_owner', NULL, NULL, '2017-08-14 03:59:48', '2017-08-14 03:59:48', 'tdsiUzrbkMWy3HcVoB4UPaTxgDdxTpXeJduwkWKpiOX6XtZKYPBvJAsTXv9M', '2000-01-14', 'male'),
(12, 'suman samanta', 2, 'nits.suman@gmail.com', '$2y$10$weINYmcyUGJedYU53PqfFu5ZHuT3Dx6/19l1yy.yx5v9arkmyCAQ.', 'pet_owner', NULL, NULL, '2017-08-18 08:12:24', '2017-08-18 08:12:24', 'vEMUrwlkejDRJ2h8up2UeVjepX7qp4GIm5yrJfaM6y4b0Gerv8208aSzR3X9', '2017-08-09', 'male'),
(27, 'ravi', 2, 'nits.rav3is@gmail.com', '$2y$10$VTlrusqrvemHCA4busl/V.DI35SKIGuxMCYH5fiBfvEyEsWwXGW/q', 'service_provider', NULL, NULL, '2017-08-21 06:01:09', '2017-08-21 06:01:09', 'wjKYRKTj4rb9FM7NdPZS5g9OlPGtauqCUyEhV7IiRcrZ2O7qP3w8jxhplsTK', '2005-08-08', 'male'),
(30, 'redux', 2, 'nitttyy@yopmail.com', '$2y$10$SmUG1fAX0qUNaYuRY2DS1ewEkpgcO7lj0rC3f/ZRB2O6KYgqoxLZW', 'pet_owner', NULL, NULL, '2017-08-21 08:26:02', '2017-08-21 08:26:02', 'jUSOP6DRBpQvlZa4lZc1FNXyqgFLi8EdFPC9b1NKyIrna1UzZkZ8HgKpp1OZ', '2017-08-02', 'male'),
(44, 'hello', 2, 'nits.anc@gmail.com', '$2y$10$5N2Dbrs27rWnbV6K3UCo6O/zGjDN0SNbkExhU4IqtRIuAZNi//NZO', 'service_provider', NULL, NULL, '2017-08-22 08:01:36', '2017-08-22 08:01:36', '8XF4NuEnGMzVZFE57u1Uf1VKY1uosSC1wviL9m2yPzaIrvg3ft6SFTjemy5r', '2017-08-03', 'male'),
(46, 'KZ', 2, 'Kzamer88@gmail.com', '$2y$10$w6o39J1Piffqr2YxHVy84OX234zxTC4H4fc9.3MqIiNICEcq5zM.S', 'pet_owner', NULL, NULL, '2017-08-23 16:46:51', '2017-08-23 16:46:51', 'NelCR1tqsLkCNIbBFfvRfojJGFiiv6Oj6Jj2dACsXDgMItaITkv7mzOtmorF', '1988-08-29', 'male'),
(48, 'kz', 2, 'petizenapp@gmail.com', '$2y$10$oaVR0kiqts63p9xnvC3ZEudY1KEkbasVJhlfo.i1SIandIDe.ar.K', 'service_provider', NULL, NULL, '2017-08-28 10:34:53', '2017-08-28 10:34:53', 'zBeUb03arKH4FHH92vzM6gaJi1RbVF5mICRkYU5OS6A4BuD3VU9l8dpKx825', '1988-08-30', 'male'),
(52, 'abc', 2, 'abc@gmail.com', '$2y$10$1jWI4kULLv5drkyV8Rm5FeFjLcJh.5MDpAaGL56HwRAgBChvI5jOa', 'pet_owner', NULL, NULL, '2017-09-04 01:57:03', '2017-09-04 01:57:03', 'GikyvcjYD4OpJqMKN6Y5jq7idFxUgvj4Uq51huqfRnx8ITwjR36ioSkwxL7T', '2016-09-01', 'male'),
(53, 'aa', 2, 'aa@gmail.com', '$2y$10$4qqbKXAwIRk/G.fIr70IRe.oXioonSbUGD5f.leoXWqzwrTG3VScW', 'service_provider', NULL, NULL, '2017-09-04 02:01:32', '2017-09-04 02:01:32', 'LfGULGOVsKPduwKs0sTx4j1ZZkYIT6XX10O4RTxQJcx5B0ygzlfOM9JNK47x', '2016-08-29', 'male'),
(54, 'abc', 2, 'ab@gmail.vom', '$2y$10$haYMkRjIj4RDV9sKZT4mPehm.y4ULfLs.7J/ycl7KK1UP2874.6rO', 'pet_owner', NULL, NULL, '2017-09-04 02:09:02', '2017-09-04 02:09:02', 'Fd94M0rchFESj0TpU4UafQHckOxMTeMujPnTUelZiDFDCJV2QvKr44A1oW1H', '2015-09-01', 'male'),
(55, 'dfg', 2, 'ff@gmail.com', '$2y$10$nmV2qgnhIUCVKIt8DwgHQuFmEUZDtc1nIbmX/VUK7.8/r.Fq8wZGi', 'service_provider', NULL, NULL, '2017-09-04 02:18:20', '2017-09-04 02:18:20', 'LCtKkmXAOQtrO1TwqT9AlSdnsiYEb5oRKPNl0KraOISPMDu0KOWAPupTrQmI', '2012-09-01', 'male'),
(56, 'dgg', 2, 'ads@gmail.com', '$2y$10$raZx7ohcYRbUu7uA0Ip0n.dDEsDovzMJXjPpPQK1N2rMfq6go2vse', 'service_provider', NULL, NULL, '2017-09-04 02:28:38', '2017-09-04 02:28:38', 'lQHx7wkUu3KN5SftFgQPtMeORmsSER2T1psb9TKZlBzILsfKyLWuagx0FTdP', '2013-09-01', 'female'),
(58, 'hgty', 2, 'a@gmail.com', '$2y$10$sbsqisCNVBKVoqDmUj8fw.p.EbszaDkEZOVECDJPXP7OsQ5NdPOWi', 'service_provider', NULL, NULL, '2017-09-04 03:18:53', '2017-09-04 03:18:53', 'gcIDkrKLiD5Jy6c5VcocIOOhXO1ThAnOFLX7G2DLVB7HfGWw1wdo499dSy5F', '2010-09-01', 'male'),
(59, 'fgg', 2, 'avc@gmail.com', '$2y$10$O4lrbZOxg6XTLE4CJoaZleXGNFoKdx3BBADznJ23kvXDcAjCOXZUG', 'service_provider', NULL, NULL, '2017-09-04 03:34:47', '2017-09-04 03:34:47', 'XB2nxHX7Y3DIVgAicLBcaPML0D9Fb4xmEfqdtGFnLTefeO14y3O6WkuZm9dZ', '2013-09-01', 'male'),
(60, 'hghh', 2, 'adf@gmail.com', '$2y$10$yHNE7vGsnyvXtCX3ygkAv.2S2A7lN9bN7QNYkeVJc.ba9jJuJmDGe', 'service_provider', NULL, NULL, '2017-09-04 03:37:32', '2017-09-04 03:37:32', 'bL1TPmsQlDr9cGWmbpKH55svzxgaBfQ9fBnYmEfCmVfnP2RycmQ8srjYVqU0', '2012-09-01', 'male'),
(61, 'gfgg', 2, 'asd@gmail.com', '$2y$10$81UXGAzuAvkgbh1SnHwFE.kbCr9sNROkKF7LXlvfkZiVzYyKruINK', 'service_provider', NULL, NULL, '2017-09-04 04:08:24', '2017-09-04 04:08:24', 'LGhOlLkAkFYm5RlU6jY1xZevAZk7GCMCbh8zRy5Ul7JMxCaz2lObaGQiVWL9', '2009-09-01', 'male'),
(62, 'chandralina paul', 2, 'nits.chandralina@gmail.com', '$2y$10$lfbczW/Lt1QiN7.FRL.8Xeas7cvJlHSdBOozMvAeAf7m4vL.iyRP6', 'pet_owner', NULL, NULL, '2017-09-04 04:46:04', '2017-09-04 04:46:04', 'Gltx9lUS4YeV9N3P84njN4g4ycRoxF19MhJSEzh6Nemlxea2NY8BYykteIj6', '1992-07-20', 'female'),
(69, 'fgh', 2, 'b@gmail.com', '$2y$10$MJmWZ3rSEbRJoCmh.H3QzeD1o.55CTGFB7wGeXb1kQJvuPfRfFD86', 'service_provider', NULL, NULL, '2017-09-04 05:05:05', '2017-09-04 05:05:05', 'wINLYMdWQkul1Icuve9rjsfCcW5vbXPIn2LS6uhmxmLYtGv6y3Sph7NDXmmr', '2013-09-01', 'male'),
(71, 'hgfg', 2, 'ahh@gmail.com', '$2y$10$nBLvztFjG8HE9MxGZjJIlubPSREN6d9yrpfvscCrhbvEA7CPZSnwS', 'service_provider', NULL, NULL, '2017-09-04 05:15:12', '2017-09-04 05:15:12', 'PJGzX3lfmx1Rc0t9bc2zw7HADbdBx29ofJ7IUZH3EIdOMKYnNmDL9QZ7GiLH', '2014-09-01', 'male'),
(74, 'hgg', 2, 'fg@g.com', '$2y$10$zW48zKM2jfxHZU65UXosXOD7i5oj9Bz2fampE0Ldp96dSr7B/2tTe', 'pet_owner', NULL, NULL, '2017-09-04 05:23:30', '2017-09-04 05:23:30', '89dtwQRAs5wN29VqEbiclNzXTRkpHudEZMY3nrMRjVcJAzObRfrgtm2aiXDC', '2010-09-01', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backups`
--
ALTER TABLE `backups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `backups_name_unique` (`name`),
  ADD UNIQUE KEY `backups_file_name_unique` (`file_name`);

--
-- Indexes for table `breeds`
--
ALTER TABLE `breeds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `breeds_species_id_foreign` (`species_id`);

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
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_dept_foreign` (`dept`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `la_configs`
--
ALTER TABLE `la_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_menus`
--
ALTER TABLE `la_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_fields_module_foreign` (`module`),
  ADD KEY `module_fields_field_type_foreign` (`field_type`);

--
-- Indexes for table `module_field_types`
--
ALTER TABLE `module_field_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organizations_category_id_foreign` (`category_id`),
  ADD KEY `organizations_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pets_user_id_foreign` (`user_id`),
  ADD KEY `pets_species_id_foreign` (`species_id`),
  ADD KEY `pets_breed_id_foreign` (`breed_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`),
  ADD KEY `reports_post_id_foreign` (`post_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD KEY `roles_parent_foreign` (`parent`),
  ADD KEY `roles_dept_foreign` (`dept`);

--
-- Indexes for table `role_module`
--
ALTER TABLE `role_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_module_role_id_foreign` (`role_id`),
  ADD KEY `role_module_module_id_foreign` (`module_id`);

--
-- Indexes for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_module_fields_role_id_foreign` (`role_id`),
  ADD KEY `role_module_fields_field_id_foreign` (`field_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `species`
--
ALTER TABLE `species`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `backups`
--
ALTER TABLE `backups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `breeds`
--
ALTER TABLE `breeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `la_configs`
--
ALTER TABLE `la_configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `la_menus`
--
ALTER TABLE `la_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `module_fields`
--
ALTER TABLE `module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `module_field_types`
--
ALTER TABLE `module_field_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role_module`
--
ALTER TABLE `role_module`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `species`
--
ALTER TABLE `species`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `breeds`
--
ALTER TABLE `breeds`
  ADD CONSTRAINT `breeds_species_id_foreign` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_dept_foreign` FOREIGN KEY (`dept`) REFERENCES `departments` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD CONSTRAINT `module_fields_field_type_foreign` FOREIGN KEY (`field_type`) REFERENCES `module_field_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_fields_module_foreign` FOREIGN KEY (`module`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `organizations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `organizations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_breed_id_foreign` FOREIGN KEY (`breed_id`) REFERENCES `breeds` (`id`),
  ADD CONSTRAINT `pets_species_id_foreign` FOREIGN KEY (`species_id`) REFERENCES `species` (`id`),
  ADD CONSTRAINT `pets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_dept_foreign` FOREIGN KEY (`dept`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `roles_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
