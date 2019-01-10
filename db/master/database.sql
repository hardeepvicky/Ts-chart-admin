-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2017 at 10:26 AM
-- Server version: 5.6.35-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
CREATE TABLE `acos` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 150),
(2, 1, NULL, NULL, 'Base', 2, 3),
(3, 1, NULL, NULL, 'ChartMenus', 4, 15),
(4, 3, NULL, NULL, 'admin_index', 5, 6),
(5, 3, NULL, NULL, 'admin_add', 7, 8),
(6, 3, NULL, NULL, 'admin_edit', 9, 10),
(8, 1, NULL, NULL, 'Errors', 16, 29),
(9, 8, NULL, NULL, 'error404', 17, 18),
(10, 8, NULL, NULL, 'methodNotAllowed', 19, 20),
(11, 8, NULL, NULL, 'error', 21, 22),
(12, 8, NULL, NULL, 'admin_error404', 23, 24),
(13, 8, NULL, NULL, 'admin_methodNotAllowed', 25, 26),
(14, 8, NULL, NULL, 'admin_error', 27, 28),
(16, 1, NULL, NULL, 'Groups', 30, 37),
(17, 16, NULL, NULL, 'index', 31, 32),
(18, 16, NULL, NULL, 'add', 33, 34),
(19, 16, NULL, NULL, 'edit', 35, 36),
(21, 1, NULL, NULL, 'Logs', 38, 45),
(22, 21, NULL, NULL, 'admin_web_service', 39, 40),
(23, 21, NULL, NULL, 'admin_cron', 41, 42),
(24, 21, NULL, NULL, 'admin_email', 43, 44),
(26, 1, NULL, NULL, 'Settings', 46, 49),
(27, 26, NULL, NULL, 'admin_system_setting', 47, 48),
(29, 1, NULL, NULL, 'Users', 50, 95),
(30, 29, NULL, NULL, 'admin_index', 51, 52),
(31, 29, NULL, NULL, 'admin_company_sub_manager_summary', 53, 54),
(32, 29, NULL, NULL, 'admin_company_members_summary', 55, 56),
(33, 29, NULL, NULL, 'admin_add', 57, 58),
(34, 29, NULL, NULL, 'admin_edit', 59, 60),
(35, 29, NULL, NULL, 'login', 61, 62),
(36, 29, NULL, NULL, 'signup', 63, 64),
(37, 29, NULL, NULL, 'signup_send_email', 65, 66),
(38, 29, NULL, NULL, 'account_created', 67, 68),
(39, 29, NULL, NULL, 'activate', 69, 70),
(40, 29, NULL, NULL, 'logout', 71, 72),
(41, 29, NULL, NULL, 'admin_change_password', 73, 74),
(42, 29, NULL, NULL, 'forgot_password', 75, 76),
(43, 29, NULL, NULL, 'initDB', 77, 78),
(44, 29, NULL, NULL, 'aclExtras', 79, 80),
(45, 29, NULL, NULL, 'clearCache', 81, 82),
(46, 29, NULL, NULL, 'acl', 83, 84),
(47, 29, NULL, NULL, 'admin_toggleStatus', 85, 86),
(48, 1, NULL, NULL, 'WebServices', 96, 99),
(49, 48, NULL, NULL, 'index', 97, 98),
(50, 1, NULL, NULL, 'AclExtras', 100, 101),
(51, 1, NULL, NULL, 'DebugKit', 102, 109),
(52, 51, NULL, NULL, 'ToolbarAccess', 103, 108),
(53, 52, NULL, NULL, 'history_state', 104, 105),
(54, 52, NULL, NULL, 'sql_explain', 106, 107),
(56, 1, NULL, NULL, 'ChartReports', 110, 123),
(57, 56, NULL, NULL, 'admin_index', 111, 112),
(58, 56, NULL, NULL, 'admin_add', 113, 114),
(59, 56, NULL, NULL, 'admin_edit', 115, 116),
(61, 56, NULL, NULL, 'admin_delete', 117, 118),
(62, 1, NULL, NULL, 'Companies', 124, 131),
(63, 62, NULL, NULL, 'admin_toggleStatus', 125, 126),
(64, 29, NULL, NULL, 'admin_add_company_sub_manager', 87, 88),
(65, 29, NULL, NULL, 'admin_add_company_member', 89, 90),
(66, 29, NULL, NULL, 'admin_edit_company_sub_manager', 91, 92),
(67, 29, NULL, NULL, 'admin_edit_company_member', 93, 94),
(68, 3, NULL, NULL, 'admin_delete', 11, 12),
(69, 3, NULL, NULL, 'admin_toggleStatus', 13, 14),
(70, 56, NULL, NULL, 'admin_toggleStatus', 119, 120),
(71, 56, NULL, NULL, 'draw_chart', 121, 122),
(72, 62, NULL, NULL, 'admin_block', 127, 128),
(73, 62, NULL, NULL, 'admin_unblock', 129, 130),
(74, 1, NULL, NULL, 'EmailPlaceholders', 132, 139),
(75, 74, NULL, NULL, 'admin_index', 133, 134),
(76, 74, NULL, NULL, 'admin_add', 135, 136),
(77, 74, NULL, NULL, 'admin_edit', 137, 138),
(78, 1, NULL, NULL, 'EmailTemplates', 140, 149),
(79, 78, NULL, NULL, 'admin_index', 141, 142),
(80, 78, NULL, NULL, 'admin_add', 143, 144),
(81, 78, NULL, NULL, 'admin_edit', 145, 146),
(82, 78, NULL, NULL, 'admin_delete', 147, 148);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
CREATE TABLE `aros` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 2),
(2, NULL, 'Group', 2, NULL, 3, 4),
(3, NULL, 'Group', 3, NULL, 5, 6),
(4, NULL, 'Group', 4, NULL, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE `aros_acos` (
  `id` int(10) UNSIGNED NOT NULL,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '-1', '-1', '-1', '-1'),
(2, 1, 30, '1', '1', '1', '1'),
(3, 1, 41, '1', '1', '1', '1'),
(4, 1, 22, '1', '1', '1', '1'),
(5, 1, 23, '1', '1', '1', '1'),
(6, 1, 24, '1', '1', '1', '1'),
(7, 2, 1, '-1', '-1', '-1', '-1'),
(8, 2, 3, '1', '1', '1', '1'),
(9, 2, 31, '1', '1', '1', '1'),
(10, 2, 32, '1', '1', '1', '1'),
(11, 2, 41, '1', '1', '1', '1'),
(12, 3, 1, '-1', '-1', '-1', '-1'),
(13, 3, 3, '1', '1', '1', '1'),
(14, 3, 32, '1', '1', '1', '1'),
(15, 3, 41, '1', '1', '1', '1'),
(16, 2, 56, '1', '1', '1', '1'),
(17, 3, 56, '1', '1', '1', '1'),
(18, 1, 63, '1', '1', '1', '1'),
(19, 2, 64, '1', '1', '1', '1'),
(20, 2, 66, '1', '1', '1', '1'),
(21, 2, 65, '1', '1', '1', '1'),
(22, 2, 67, '1', '1', '1', '1'),
(23, 2, 47, '1', '1', '1', '1'),
(24, 1, 72, '1', '1', '1', '1'),
(25, 1, 73, '1', '1', '1', '1'),
(26, 1, 74, '1', '1', '1', '1'),
(27, 1, 78, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `chart_menus`
--

DROP TABLE IF EXISTS `chart_menus`;
CREATE TABLE `chart_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `type` int(1) UNSIGNED NOT NULL COMMENT '1=Menu, 2=Link',
  `name` varchar(45) NOT NULL,
  `fa_icon` varchar(45) NOT NULL,
  `display_order` int(10) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_menus`
--

INSERT INTO `chart_menus` (`id`, `company_id`, `parent_id`, `type`, `name`, `fa_icon`, `display_order`, `is_active`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 8, 0, 1, 'Attendance', '', 0, 0, '2017-09-13 22:20:16', 8, '2017-10-01 00:40:22', 8),
(2, 8, 1, 2, '2017', '', 0, 1, '2017-09-13 22:21:02', 8, '2017-09-30 20:19:18', 8),
(16, 8, 0, 2, 'Dummy CSV Chart', '', 0, 1, '2017-09-30 20:20:51', 8, '2017-10-01 00:29:40', 8);

-- --------------------------------------------------------

--
-- Table structure for table `chart_reports`
--

DROP TABLE IF EXISTS `chart_reports`;
CREATE TABLE `chart_reports` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `chart_menu_id` int(10) UNSIGNED NOT NULL,
  `type` int(1) UNSIGNED NOT NULL COMMENT '1=Internal, 2=External',
  `chart_type` int(1) UNSIGNED DEFAULT NULL,
  `name` varchar(45) NOT NULL,
  `csv_file` text NOT NULL,
  `options` text,
  `url` text NOT NULL,
  `display_order` int(10) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_reports`
--

INSERT INTO `chart_reports` (`id`, `company_id`, `chart_menu_id`, `type`, `chart_type`, `name`, `csv_file`, `options`, `url`, `display_order`, `is_active`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(2, 8, 16, 1, 2, 'bar chart', 'bar-chart-data_5.csv', 'a:6:{s:6:\"common\";a:1:{s:6:\"legend\";a:2:{s:8:\"position\";s:0:\"\";s:8:\"maxLines\";s:0:\"\";}}s:3:\"pie\";a:2:{s:7:\"pieHole\";s:0:\"\";s:4:\"is3D\";s:1:\"0\";}s:3:\"bar\";a:2:{s:5:\"hAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:6:\"column\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:4:\"line\";a:1:{s:9:\"curveType\";s:1:\"0\";}s:4:\"area\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}}', '', 0, 1, '2017-09-30 20:50:00', 8, '2017-10-01 00:29:35', 8),
(5, 8, 16, 1, 1, 'Line', 'bar-chart-data_15.csv', 'a:6:{s:6:\"common\";a:1:{s:6:\"legend\";a:2:{s:8:\"position\";s:0:\"\";s:8:\"maxLines\";s:0:\"\";}}s:3:\"pie\";a:2:{s:7:\"pieHole\";s:0:\"\";s:4:\"is3D\";s:1:\"0\";}s:3:\"bar\";a:2:{s:5:\"hAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:6:\"column\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:4:\"line\";a:2:{s:9:\"pointSize\";s:1:\"5\";s:9:\"curveType\";s:1:\"0\";}s:4:\"area\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}}', '', 0, 1, '2017-09-30 21:02:58', 8, '2017-10-01 00:29:34', 8),
(6, 8, 16, 1, 4, 'Pie', 'pie-chart-data_8.csv', 'a:6:{s:6:\"common\";a:1:{s:6:\"legend\";a:2:{s:8:\"position\";s:6:\"bottom\";s:8:\"maxLines\";s:0:\"\";}}s:3:\"pie\";a:2:{s:7:\"pieHole\";s:3:\"0.6\";s:4:\"is3D\";s:1:\"0\";}s:3:\"bar\";a:2:{s:5:\"hAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:6:\"column\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:4:\"line\";a:1:{s:9:\"curveType\";s:1:\"0\";}s:4:\"area\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}}', '', 0, 1, '2017-09-30 21:59:56', 8, '2017-10-01 00:29:33', 8),
(7, 8, 16, 1, 3, 'Column', 'bar-chart-data_12.csv', 'a:6:{s:6:\"common\";a:1:{s:6:\"legend\";a:2:{s:8:\"position\";s:0:\"\";s:8:\"maxLines\";s:0:\"\";}}s:3:\"pie\";a:2:{s:7:\"pieHole\";s:0:\"\";s:4:\"is3D\";s:1:\"0\";}s:3:\"bar\";a:2:{s:5:\"hAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:6:\"column\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:4:\"line\";a:1:{s:9:\"curveType\";s:1:\"0\";}s:4:\"area\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}}', '', 0, 1, '2017-09-30 23:39:48', 8, '2017-10-01 00:29:32', 8),
(8, 8, 16, 1, 5, 'Area', 'bar-chart-data_13.csv', 'a:6:{s:6:\"common\";a:1:{s:6:\"legend\";a:2:{s:8:\"position\";s:0:\"\";s:8:\"maxLines\";s:0:\"\";}}s:3:\"pie\";a:2:{s:7:\"pieHole\";s:0:\"\";s:4:\"is3D\";s:1:\"0\";}s:3:\"bar\";a:2:{s:5:\"hAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:6:\"column\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:4:\"line\";a:1:{s:9:\"curveType\";s:1:\"0\";}s:4:\"area\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}}', '', 0, 1, '2017-09-30 23:40:30', 8, '2017-10-01 00:29:31', 8),
(9, 8, 16, 1, 1, 'Line', 'bar-chart-data_14.csv', 'a:6:{s:6:\"common\";a:1:{s:6:\"legend\";a:2:{s:8:\"position\";s:0:\"\";s:8:\"maxLines\";s:0:\"\";}}s:3:\"pie\";a:2:{s:7:\"pieHole\";s:0:\"\";s:4:\"is3D\";s:1:\"0\";}s:3:\"bar\";a:2:{s:5:\"hAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:6:\"column\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:4:\"line\";a:1:{s:9:\"curveType\";s:8:\"function\";}s:4:\"area\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}}', '', 0, 1, '2017-09-30 23:48:17', 8, '2017-10-01 00:29:29', 8),
(11, 8, 16, 1, 5, 'Area', 'bar-chart-data_13.csv', 'a:6:{s:6:\"common\";a:1:{s:6:\"legend\";a:2:{s:8:\"position\";s:0:\"\";s:8:\"maxLines\";s:0:\"\";}}s:3:\"pie\";a:2:{s:7:\"pieHole\";s:0:\"\";s:4:\"is3D\";s:1:\"0\";}s:3:\"bar\";a:2:{s:5:\"hAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:6:\"column\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"0\";}s:4:\"line\";a:1:{s:9:\"curveType\";s:1:\"0\";}s:4:\"area\";a:2:{s:5:\"vAxis\";a:1:{s:8:\"minValue\";s:0:\"\";}s:9:\"isStacked\";s:1:\"1\";}}', '', 0, 1, '2017-10-01 00:04:12', 8, '2017-10-01 00:29:28', 8);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `tag_line` varchar(255) NOT NULL,
  `logo` varchar(45) NOT NULL,
  `cover_image` varchar(45) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `code`, `name`, `tag_line`, `logo`, `cover_image`, `is_active`, `created`, `modified`) VALUES
(8, '1', 'Tech Formation', '', '', '', 1, '2017-09-13 20:16:31', '2017-10-02 13:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `cron_logs`
--

DROP TABLE IF EXISTS `cron_logs`;
CREATE TABLE `cron_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(3) NOT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

DROP TABLE IF EXISTS `email_logs`;
CREATE TABLE `email_logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `code` varchar(10) NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `to_email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_logs`
--

INSERT INTO `email_logs` (`id`, `code`, `from_email`, `to_email`, `subject`, `body`, `created`) VALUES
(1, '2', 'hardeep@techformation.co.in', 'tech@gmail.com', 'Your Company Tech Formation has blocked', '<p><p>Tech Formation has been blocked by Administrator due to 8</p><p><br></p><p>Please contact to Admin.<br></p></p>', '2017-10-02 12:57:24'),
(2, '3', 'hardeep@techformation.co.in', 'tech@gmail.com', 'Tech Formation has been unblocked.', '<p>Tech Formation has been unblocked.</p><p>asd<br></p>', '2017-10-02 12:58:09'),
(3, '2', 'hardeep@techformation.co.in', 'tech@gmail.com', 'Your Company Tech Formation has blocked', '<p><p>Tech Formation has been blocked by Administrator due to you are blocked\r\n</p><p><br></p><p>Please contact to Admin.<br></p></p>', '2017-10-02 13:19:00'),
(4, '3', 'hardeep@techformation.co.in', 'tech@gmail.com', 'Tech Formation has been unblocked.', '<p>Tech Formation has been unblocked.</p><p>hi you are now re actived<br></p>', '2017-10-02 13:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `email_placeholders`
--

DROP TABLE IF EXISTS `email_placeholders`;
CREATE TABLE `email_placeholders` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_placeholders`
--

INSERT INTO `email_placeholders` (`id`, `name`) VALUES
(8, 'Company.activation_link'),
(9, 'Company.block_reason'),
(2, 'Company.code'),
(1, 'Company.name'),
(10, 'Company.ublock_msg'),
(6, 'User.activation_token'),
(7, 'User.email'),
(3, 'User.firstname'),
(4, 'User.lastname'),
(11, 'User.password'),
(5, 'User.username');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE `email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `placeholder_ids` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `code`, `name`, `subject`, `body`, `placeholder_ids`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, '1', 'Company Account Activation', 'Welcome, {Company.name}', '<p>Hi</p><p>{User.firstname}</p><p><br></p><p>You have successfully created the account. Please activate your account @User<br></p>', '1,3', '2017-10-02 12:23:39', 1, '2017-10-02 12:40:55', 1),
(2, '2', 'Company Blocked', 'Your Company {Company.name} has blocked', '<p><p>{Company.name} has been blocked by Administrator due to {Company.block_reason}</p><p><br></p><p>Please contact to Admin.<br></p></p>', '9,1', '2017-10-02 12:27:29', 1, '2017-10-02 12:27:29', 1),
(3, '3', 'Company UnBlock', '{Company.name} has been unblocked.', '<p>{Company.name} has been unblocked.</p><p>{Company.ublock_msg}<br></p>', '1,10', '2017-10-02 12:29:08', 1, '2017-10-02 12:29:08', 1),
(4, '4', 'Forgot Password', 'Forogot Password', '<p>Hi</p><p>{User.firstname}</p><p>Your new password is <b>{User.password}</b><br></p>', '3,11', '2017-10-02 12:37:10', 1, '2017-10-02 12:37:10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(3) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admin', '2017-09-09 17:13:11', '2017-09-09 17:13:11'),
(2, 'Company Admin', '2017-09-09 17:13:24', '2017-09-09 17:13:24'),
(3, 'Company Sub Admin', '2017-09-09 17:13:36', '2017-09-09 17:13:36'),
(4, 'Company Members', '2017-09-09 17:13:57', '2017-09-09 17:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(2) UNSIGNED NOT NULL COMMENT '1=Admin, 2=Company Admin, 3=Company Sub Admin, 4=Company Member',
  `company_id` int(10) UNSIGNED DEFAULT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `activation_token` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `company_id`, `firstname`, `lastname`, `email`, `username`, `password`, `activation_token`, `is_active`, `is_deleted`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 1, NULL, 'Administrator', '', 'admin@gmail.com', 'admin', '252e767ea214be2a05fe31469e02243593337dca', NULL, 1, 0, '2017-09-10 10:36:24', NULL, '2017-09-10 10:36:24', NULL),
(8, 2, 8, 'gagan', 'deep', 'tech@gmail.com', 'tech.admin', '252e767ea214be2a05fe31469e02243593337dca', 'N61AM5ZGE9QBVZ8K1J4TDLY3Z99L358', 1, 0, '2017-09-13 20:16:31', NULL, '2017-09-13 20:16:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `web_service_logs`
--

DROP TABLE IF EXISTS `web_service_logs`;
CREATE TABLE `web_service_logs` (
  `id` int(11) UNSIGNED NOT NULL,
  `company_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` int(3) NOT NULL,
  `request` text NOT NULL,
  `response` mediumtext,
  `info` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `execution_time` float NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_service_logs`
--

INSERT INTO `web_service_logs` (`id`, `company_id`, `user_id`, `type`, `request`, `response`, `info`, `status`, `execution_time`, `created`) VALUES
(1, 0, NULL, 0, '{\n\"username\" : \"tech.admin\",\n\"password\" : \"admin\"\n}', NULL, '', 0, 0, '2017-09-14 20:35:02'),
(2, 0, NULL, 0, '{\n\"username\" : \"tech.admin\",\n\"password\" : \"admin\"\n}', '{\"msg\":\"Missing Service\",\"status\":0}', '', 0, 0.1, '2017-09-14 20:35:19'),
(3, 0, NULL, 0, '{\n  \"service_name\" : \"LOGIN\"\n\"username\" : \"tech.admin\",\n\"password\" : \"admin\"\n}', '{\"msg\":\"Failed\",\"status\":0,\"errors\":[\"Invalid JSON Request\"]}', '', 0, 0.12, '2017-09-14 20:35:58'),
(4, 0, NULL, 1, '{\n  \"service_name\" : \"LOGIN\",\n\"username\" : \"tech.admin\",\n\"password\" : \"admin\"\n}', '{\"msg\":\"Failed\",\"status\":0,\"errors\":[\"Invalid username or password\"]}', '', 0, 0.258, '2017-09-14 20:36:03'),
(5, 0, NULL, 1, '{\n  \"service_name\" : \"LOGIN\",\n\"username\" : \"tech.admin\",\n\"password\" : \"admin\"\n}', '{\"msg\":\"Failed\",\"status\":0,\"errors\":[\"Missing company_id\"]}', '', 0, 0.189, '2017-09-14 20:39:35'),
(6, 0, NULL, 1, '{\n  \"service_name\" : \"LOGIN\",\n\"username\" : \"tech.admin\",\n\"password\" : \"admin\",\n  \"company_id\" : \"1\"\n}', '{\"msg\":\"Failed\",\"status\":0,\"errors\":[\"Invalid username or password\"]}', '', 0, 0.142, '2017-09-14 20:39:52'),
(7, 8, NULL, 2, '{\n  \"service_name\" : \"GET_COMPANY_DETAILS\",\n  \"code\" : \"1\"\n}', '{\"id\":\"8\",\"code\":\"1\",\"name\":\"Tech Formation\",\"tag_line\":\"\",\"logo\":\"\",\"cover_image\":\"\",\"created\":\"2017-09-13 20:16:31\",\"modified\":\"2017-09-13 20:16:31\",\"status\":1}', '', 1, 0.151, '2017-09-14 20:41:22'),
(8, 0, NULL, 3, '{\n  \"service_name\" : \"GET_MENUS\",\n  \"company_id\" : \"1\"\n}', '{\"status\":1}', '', 1, 0.261, '2017-09-14 20:44:12'),
(9, 0, NULL, 3, '{\n  \"service_name\" : \"GET_MENUS\",\n  \"company_id\" : \"8\"\n}', '{\"0\":{\"ChartMenu\":{\"id\":\"1\",\"company_id\":\"8\",\"parent_id\":\"0\",\"type\":\"1\",\"name\":\"Attendance\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:20:16\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:20:16\",\"modified_by\":\"8\"},\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"Apr\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:02\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:02\",\"modified_by\":\"8\"}},{\"ChartMenu\":{\"id\":\"3\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"May\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:13\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:13\",\"modified_by\":\"8\"}},{\"ChartMenu\":{\"id\":\"4\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"July\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:22\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:22\",\"modified_by\":\"8\"}},{\"ChartMenu\":{\"id\":\"5\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"June\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:38\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:38\",\"modified_by\":\"8\"}}]},\"status\":1}', '', 1, 0.083, '2017-09-14 20:44:16'),
(10, 0, NULL, 3, '{\n  \"service_name\" : \"GET_MENUS\",\n  \"company_id\" : \"8\"\n}', '{\"0\":{\"ChartMenu\":{\"id\":\"1\",\"company_id\":\"8\",\"parent_id\":\"0\",\"type\":\"1\",\"name\":\"Attendance\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:20:16\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:20:16\",\"modified_by\":\"8\"},\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"Apr\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:02\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:02\",\"modified_by\":\"8\"}},{\"ChartMenu\":{\"id\":\"3\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"May\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:13\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:13\",\"modified_by\":\"8\"}},{\"ChartMenu\":{\"id\":\"4\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"July\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:22\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:22\",\"modified_by\":\"8\"}},{\"ChartMenu\":{\"id\":\"5\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"June\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:38\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:38\",\"modified_by\":\"8\"}}]},\"status\":1}', '', 1, 0.116, '2017-09-14 20:46:19'),
(11, 0, NULL, 3, '{\n  \"service_name\" : \"GET_MENUS\",\n  \"company_id\" : \"8\"\n}', '{\"msg\":\"\",\"status\":1,\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"company_id\":\"8\",\"parent_id\":\"0\",\"type\":\"1\",\"name\":\"Attendance\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:20:16\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:20:16\",\"modified_by\":\"8\"},\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"Apr\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:02\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:02\",\"modified_by\":\"8\"}},{\"ChartMenu\":{\"id\":\"3\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"May\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:13\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:13\",\"modified_by\":\"8\"}},{\"ChartMenu\":{\"id\":\"4\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"July\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:22\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:22\",\"modified_by\":\"8\"}},{\"ChartMenu\":{\"id\":\"5\",\"company_id\":\"8\",\"parent_id\":\"1\",\"type\":\"2\",\"name\":\"June\",\"fa_icon\":\"\",\"is_active\":true,\"created\":\"2017-09-13 22:21:38\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:21:38\",\"modified_by\":\"8\"}}]}]}', '', 1, 0.141, '2017-09-14 20:46:45'),
(12, 0, NULL, 3, '{\n  \"service_name\" : \"GET_MENUS\",\n  \"company_id\" : \"8\"\n}', '{\"msg\":\"\",\"status\":1,\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"}},{\"ChartMenu\":{\"id\":\"3\",\"parent_id\":\"1\",\"name\":\"May\",\"type\":\"2\",\"fa_icon\":\"\"}},{\"ChartMenu\":{\"id\":\"4\",\"parent_id\":\"1\",\"name\":\"July\",\"type\":\"2\",\"fa_icon\":\"\"}},{\"ChartMenu\":{\"id\":\"5\",\"parent_id\":\"1\",\"name\":\"June\",\"type\":\"2\",\"fa_icon\":\"\"}}]}]}', '', 1, 0.126, '2017-09-14 20:47:46'),
(13, 0, NULL, 3, '{\n  \"service_name\" : \"GET_MENUS\",\n  \"company_id\" : \"8\"\n}', '{\"msg\":\"\",\"status\":1,\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"id\":\"1\",\"company_id\":\"8\",\"chart_menu_id\":\"2\",\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":null,\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"created\":\"2017-09-13 22:22:06\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:22:06\",\"modified_by\":\"8\"}]},{\"ChartMenu\":{\"id\":\"3\",\"parent_id\":\"1\",\"name\":\"May\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"4\",\"parent_id\":\"1\",\"name\":\"July\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"5\",\"parent_id\":\"1\",\"name\":\"June\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.137, '2017-09-14 20:48:39'),
(14, 0, NULL, 3, '{\n  \"service_name\" : \"GET_MENUS\",\n  \"company_id\" : \"8\"\n}', '{\"msg\":\"\",\"status\":1,\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"}},{\"ChartMenu\":{\"id\":\"3\",\"parent_id\":\"1\",\"name\":\"May\",\"type\":\"2\",\"fa_icon\":\"\"}},{\"ChartMenu\":{\"id\":\"4\",\"parent_id\":\"1\",\"name\":\"July\",\"type\":\"2\",\"fa_icon\":\"\"}},{\"ChartMenu\":{\"id\":\"5\",\"parent_id\":\"1\",\"name\":\"June\",\"type\":\"2\",\"fa_icon\":\"\"}}]}]}', '', 1, 0.137, '2017-09-14 20:49:25'),
(15, 0, NULL, 3, '{\n  \"service_name\" : \"GET_MENUS\",\n  \"company_id\" : \"8\"\n}', '{\"msg\":\"\",\"status\":1,\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"id\":\"1\",\"company_id\":\"8\",\"chart_menu_id\":\"2\",\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":null,\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"created\":\"2017-09-13 22:22:06\",\"created_by\":\"8\",\"modified\":\"2017-09-13 22:22:06\",\"modified_by\":\"8\"}]},{\"ChartMenu\":{\"id\":\"3\",\"parent_id\":\"1\",\"name\":\"May\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"4\",\"parent_id\":\"1\",\"name\":\"July\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"5\",\"parent_id\":\"1\",\"name\":\"June\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}]}', '', 1, 0.21, '2017-09-14 20:50:44'),
(16, 0, NULL, 3, '{\n  \"service_name\" : \"GET_MENU_REPORTS\",\n  \"company_id\" : \"8\"\n}', '{\"msg\":\"\",\"status\":1,\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":null,\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]},{\"ChartMenu\":{\"id\":\"3\",\"parent_id\":\"1\",\"name\":\"May\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"4\",\"parent_id\":\"1\",\"name\":\"July\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"5\",\"parent_id\":\"1\",\"name\":\"June\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}]}', '', 1, 0.137, '2017-09-14 20:57:30'),
(17, 0, NULL, 3, '{\n  \"service_name\" : \"GET_MENU_REPORTS\",\n  \"company_id\" : \"8\"\n}', '{\"msg\":\"\",\"status\":1,\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.177, '2017-09-14 20:59:05'),
(18, 0, NULL, 0, '', '{\"msg\":\"Failed\",\"status\":0,\"errors\":[\"Invalid JSON Request\"]}', '', 0, 3.507, '2017-09-16 19:20:05'),
(19, 0, NULL, 2, '{\"service_name\":\"GET_COMPANY_DETAILS\",\"code\":\"12345\"}', '{\"msg\":\"Invalid Company Code\",\"status\":0}', '', 0, 0.765, '2017-09-16 19:43:14'),
(20, 8, NULL, 2, '{\"service_name\":\"GET_COMPANY_DETAILS\",\"code\":\"1\"}', '{\"msg\":\"\",\"status\":1,\"data\":{\"id\":\"8\",\"code\":\"1\",\"name\":\"Tech Formation\",\"tag_line\":\"\",\"logo\":\"\",\"cover_image\":\"\",\"created\":\"2017-09-13 20:16:31\",\"modified\":\"2017-09-13 20:16:31\"}}', '', 1, 0.347, '2017-09-16 19:43:35'),
(21, 8, NULL, 2, '{\"service_name\":\"GET_COMPANY_DETAILS\",\"code\":\"1\"}', '{\"msg\":\"Success\",\"status\":1,\"data\":{\"id\":\"8\",\"code\":\"1\",\"name\":\"Tech Formation\",\"tag_line\":\"\",\"logo\":\"\",\"cover_image\":\"\",\"created\":\"2017-09-13 20:16:31\",\"modified\":\"2017-09-13 20:16:31\"}}', '', 1, 0.878, '2017-09-16 19:45:32'),
(22, 8, NULL, 2, '{\"service_name\":\"GET_COMPANY_DETAILS\",\"code\":\"1\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_COMPANY_DETAILS\",\"data\":{\"id\":\"8\",\"code\":\"1\",\"name\":\"Tech Formation\",\"tag_line\":\"\",\"logo\":\"\",\"cover_image\":\"\",\"created\":\"2017-09-13 20:16:31\",\"modified\":\"2017-09-13 20:16:31\"}}', '', 1, 0.288, '2017-09-16 19:49:21'),
(23, 8, NULL, 2, '{\"service_name\":\"GET_COMPANY_DETAILS\",\"code\":\"1\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_COMPANY_DETAILS\",\"data\":{\"id\":\"8\",\"code\":\"1\",\"name\":\"Tech Formation\",\"tag_line\":\"\",\"logo\":\"\",\"cover_image\":\"\",\"created\":\"2017-09-13 20:16:31\",\"modified\":\"2017-09-13 20:16:31\"}}', '', 1, 3.543, '2017-09-16 20:42:11'),
(24, 8, NULL, 2, '{\"service_name\":\"GET_COMPANY_DETAILS\",\"code\":\"1\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_COMPANY_DETAILS\",\"data\":{\"id\":\"8\",\"code\":\"1\",\"name\":\"Tech Formation\",\"tag_line\":\"\",\"logo\":\"\",\"cover_image\":\"\",\"created\":\"2017-09-13 20:16:31\",\"modified\":\"2017-09-13 20:16:31\"}}', '', 1, 0.822, '2017-09-16 20:47:03'),
(25, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 1.284, '2017-09-16 20:48:20'),
(26, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.35, '2017-09-16 20:56:02'),
(27, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.307, '2017-09-16 21:39:23'),
(28, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.164, '2017-09-16 21:40:01'),
(29, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.685, '2017-09-16 21:43:35'),
(30, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.472, '2017-09-16 21:47:25'),
(31, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.172, '2017-09-16 22:40:17'),
(32, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.161, '2017-09-16 22:42:31'),
(33, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.137, '2017-09-16 22:43:26'),
(34, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.3, '2017-09-16 22:44:37'),
(35, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.199, '2017-09-16 22:44:46'),
(36, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 1.111, '2017-09-22 20:37:14'),
(37, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]}]}', '', 1, 0.082, '2017-09-22 20:37:22'),
(38, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.153, '2017-09-22 20:42:43'),
(39, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.454, '2017-09-22 20:51:32'),
(40, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.224, '2017-09-22 20:53:49'),
(41, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.313, '2017-09-22 20:59:48'),
(42, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.118, '2017-09-22 21:00:03'),
(43, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.226, '2017-09-22 21:02:42'),
(44, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.164, '2017-09-22 21:03:44'),
(45, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.135, '2017-09-22 21:04:37'),
(46, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.241, '2017-09-22 21:06:11'),
(47, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.165, '2017-09-22 21:07:18'),
(48, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.099, '2017-09-22 21:07:25'),
(49, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.138, '2017-09-22 21:08:35'),
(50, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.09, '2017-09-22 21:08:43'),
(51, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.351, '2017-09-22 21:11:58'),
(52, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.507, '2017-09-22 21:38:44'),
(53, 8, NULL, 2, '{\"service_name\":\"GET_COMPANY_DETAILS\",\"code\":\"1\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_COMPANY_DETAILS\",\"data\":{\"id\":\"8\",\"code\":\"1\",\"name\":\"Tech Formation\",\"tag_line\":\"\",\"logo\":\"\",\"cover_image\":\"\",\"created\":\"2017-09-13 20:16:31\",\"modified\":\"2017-09-13 20:16:31\"}}', '', 1, 1.224, '2017-09-22 21:50:26'),
(54, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 1.098, '2017-09-22 21:50:27'),
(55, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.191, '2017-09-22 21:52:08'),
(56, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.233, '2017-09-22 21:52:58'),
(57, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.158, '2017-09-22 21:53:42'),
(58, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.183, '2017-09-22 21:54:43'),
(59, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.122, '2017-09-22 21:54:54'),
(60, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.339, '2017-09-22 22:03:44'),
(61, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.496, '2017-09-22 22:07:45'),
(62, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]},{\"ChartMenu\":{\"id\":\"3\",\"parent_id\":\"1\",\"name\":\"May\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"4\",\"parent_id\":\"1\",\"name\":\"July\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"5\",\"parent_id\":\"1\",\"name\":\"June\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"7\",\"parent_id\":\"1\",\"name\":\"May\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"8\",\"parent_id\":\"1\",\"name\":\"Aug\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"9\",\"parent_id\":\"1\",\"name\":\"Sep\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.159, '2017-09-22 22:11:46'),
(63, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]},{\"ChartMenu\":{\"id\":\"3\",\"parent_id\":\"1\",\"name\":\"May\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"4\",\"parent_id\":\"1\",\"name\":\"July\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"5\",\"parent_id\":\"1\",\"name\":\"June\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"7\",\"parent_id\":\"1\",\"name\":\"May\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"8\",\"parent_id\":\"1\",\"name\":\"Aug\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"9\",\"parent_id\":\"1\",\"name\":\"Sep\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"10\",\"parent_id\":\"1\",\"name\":\"Jan\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"11\",\"parent_id\":\"1\",\"name\":\"Feb\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"12\",\"parent_id\":\"1\",\"name\":\"March\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"13\",\"parent_id\":\"1\",\"name\":\"Oct\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"14\",\"parent_id\":\"1\",\"name\":\"Nov\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"15\",\"parent_id\":\"1\",\"name\":\"Dec\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.096, '2017-09-22 22:13:22'),
(64, 8, NULL, 3, '{\"company_id\":\"8\",\"service_name\":\"GET_MENU_REPORTS\"}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"Apr\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"2\",\"name\":\"April Attendance Report\",\"csv_file\":\"\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/\",\"chart_menu_id\":\"2\"}]},{\"ChartMenu\":{\"id\":\"3\",\"parent_id\":\"1\",\"name\":\"May\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"4\",\"parent_id\":\"1\",\"name\":\"July\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"5\",\"parent_id\":\"1\",\"name\":\"June\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"7\",\"parent_id\":\"1\",\"name\":\"May\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"8\",\"parent_id\":\"1\",\"name\":\"Aug\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"9\",\"parent_id\":\"1\",\"name\":\"Sep\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"10\",\"parent_id\":\"1\",\"name\":\"Jan\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"11\",\"parent_id\":\"1\",\"name\":\"Feb\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"12\",\"parent_id\":\"1\",\"name\":\"March\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"13\",\"parent_id\":\"1\",\"name\":\"Oct\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"14\",\"parent_id\":\"1\",\"name\":\"Nov\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]},{\"ChartMenu\":{\"id\":\"15\",\"parent_id\":\"1\",\"name\":\"Dec\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]}]},{\"ChartMenu\":{\"id\":\"6\",\"parent_id\":\"0\",\"name\":\"Inventory\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[]}]}', '', 1, 0.113, '2017-09-22 22:17:40'),
(65, 0, NULL, 0, '{\n  \"service_name\": \"GET_MENU_REPORTS\",\n  \"company_id\" : \"8\"\n}', NULL, '', 0, 0, '2017-10-01 00:35:33'),
(66, 8, NULL, 3, '{\n  \"service_name\": \"GET_MENU_REPORTS\",\n  \"company_id\" : \"8\"\n}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"16\",\"parent_id\":\"0\",\"name\":\"Dummy CSV Chart\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"type\":\"1\",\"name\":\"bar chart\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/\",\"chart_menu_id\":\"16\"},{\"type\":\"1\",\"name\":\"Line\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/\",\"chart_menu_id\":\"16\"},{\"type\":\"1\",\"name\":\"Pie\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/\",\"chart_menu_id\":\"16\"},{\"type\":\"1\",\"name\":\"Column\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/\",\"chart_menu_id\":\"16\"},{\"type\":\"1\",\"name\":\"Area\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/\",\"chart_menu_id\":\"16\"},{\"type\":\"1\",\"name\":\"Line\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/\",\"chart_menu_id\":\"16\"},{\"type\":\"1\",\"name\":\"Area\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/\",\"chart_menu_id\":\"16\"}]}]}', '', 1, 0.109, '2017-10-01 00:38:01'),
(67, 8, NULL, 3, '{\n  \"service_name\": \"GET_MENU_REPORTS\",\n  \"company_id\" : \"8\"\n}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"16\",\"parent_id\":\"0\",\"name\":\"Dummy CSV Chart\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"id\":\"2\",\"type\":\"1\",\"name\":\"bar chart\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/2\",\"chart_menu_id\":\"16\"},{\"id\":\"5\",\"type\":\"1\",\"name\":\"Line\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/5\",\"chart_menu_id\":\"16\"},{\"id\":\"6\",\"type\":\"1\",\"name\":\"Pie\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/6\",\"chart_menu_id\":\"16\"},{\"id\":\"7\",\"type\":\"1\",\"name\":\"Column\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/7\",\"chart_menu_id\":\"16\"},{\"id\":\"8\",\"type\":\"1\",\"name\":\"Area\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/8\",\"chart_menu_id\":\"16\"},{\"id\":\"9\",\"type\":\"1\",\"name\":\"Line\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/9\",\"chart_menu_id\":\"16\"},{\"id\":\"11\",\"type\":\"1\",\"name\":\"Area\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/11\",\"chart_menu_id\":\"16\"}]}]}', '', 1, 0.162, '2017-10-01 00:38:32'),
(68, 8, NULL, 3, '{\n  \"service_name\": \"GET_MENU_REPORTS\",\n  \"company_id\" : \"8\"\n}', '{\"msg\":\"Success\",\"status\":1,\"service_name\":\"GET_MENU_REPORTS\",\"data\":[{\"ChartMenu\":{\"id\":\"1\",\"parent_id\":\"0\",\"name\":\"Attendance\",\"type\":\"1\",\"fa_icon\":\"\"},\"ChartReport\":[],\"children\":[{\"ChartMenu\":{\"id\":\"2\",\"parent_id\":\"1\",\"name\":\"2017\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[]}]},{\"ChartMenu\":{\"id\":\"16\",\"parent_id\":\"0\",\"name\":\"Dummy CSV Chart\",\"type\":\"2\",\"fa_icon\":\"\"},\"ChartReport\":[{\"id\":\"2\",\"type\":\"1\",\"name\":\"bar chart\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/2\",\"chart_menu_id\":\"16\"},{\"id\":\"5\",\"type\":\"1\",\"name\":\"Line\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/5\",\"chart_menu_id\":\"16\"},{\"id\":\"6\",\"type\":\"1\",\"name\":\"Pie\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/6\",\"chart_menu_id\":\"16\"},{\"id\":\"7\",\"type\":\"1\",\"name\":\"Column\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/7\",\"chart_menu_id\":\"16\"},{\"id\":\"8\",\"type\":\"1\",\"name\":\"Area\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/8\",\"chart_menu_id\":\"16\"},{\"id\":\"9\",\"type\":\"1\",\"name\":\"Line\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/9\",\"chart_menu_id\":\"16\"},{\"id\":\"11\",\"type\":\"1\",\"name\":\"Area\",\"url\":\"http:\\/\\/dev.ts-chart-admin.com\\/ChartReports\\/draw_chart\\/11\",\"chart_menu_id\":\"16\"}]}]}', '', 1, 0.077, '2017-10-01 00:39:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_acos_lft_rght` (`lft`,`rght`),
  ADD KEY `idx_acos_alias` (`alias`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_aros_lft_rght` (`lft`,`rght`),
  ADD KEY `idx_aros_alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`),
  ADD KEY `idx_aco_id` (`aco_id`);

--
-- Indexes for table `chart_menus`
--
ALTER TABLE `chart_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart_reports`
--
ALTER TABLE `chart_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cron_logs`
--
ALTER TABLE `cron_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_logs`
--
ALTER TABLE `email_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_placeholders`
--
ALTER TABLE `email_placeholders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web_service_logs`
--
ALTER TABLE `web_service_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acos`
--
ALTER TABLE `acos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `chart_menus`
--
ALTER TABLE `chart_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `chart_reports`
--
ALTER TABLE `chart_reports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cron_logs`
--
ALTER TABLE `cron_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `email_placeholders`
--
ALTER TABLE `email_placeholders`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `web_service_logs`
--
ALTER TABLE `web_service_logs`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
