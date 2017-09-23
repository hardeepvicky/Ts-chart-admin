-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2017 at 04:47 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ts_chart_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 120),
(2, 1, NULL, NULL, 'Base', 2, 3),
(3, 1, NULL, NULL, 'ChartMenus', 4, 13),
(4, 3, NULL, NULL, 'admin_index', 5, 6),
(5, 3, NULL, NULL, 'admin_add', 7, 8),
(6, 3, NULL, NULL, 'admin_edit', 9, 10),
(7, 3, NULL, NULL, 'admin_toggleStatus', 11, 12),
(8, 1, NULL, NULL, 'Errors', 14, 29),
(9, 8, NULL, NULL, 'error404', 15, 16),
(10, 8, NULL, NULL, 'methodNotAllowed', 17, 18),
(11, 8, NULL, NULL, 'error', 19, 20),
(12, 8, NULL, NULL, 'admin_error404', 21, 22),
(13, 8, NULL, NULL, 'admin_methodNotAllowed', 23, 24),
(14, 8, NULL, NULL, 'admin_error', 25, 26),
(15, 8, NULL, NULL, 'admin_toggleStatus', 27, 28),
(16, 1, NULL, NULL, 'Groups', 30, 39),
(17, 16, NULL, NULL, 'index', 31, 32),
(18, 16, NULL, NULL, 'add', 33, 34),
(19, 16, NULL, NULL, 'edit', 35, 36),
(20, 16, NULL, NULL, 'admin_toggleStatus', 37, 38),
(21, 1, NULL, NULL, 'Logs', 40, 49),
(22, 21, NULL, NULL, 'admin_web_service', 41, 42),
(23, 21, NULL, NULL, 'admin_cron', 43, 44),
(24, 21, NULL, NULL, 'admin_email', 45, 46),
(25, 21, NULL, NULL, 'admin_toggleStatus', 47, 48),
(26, 1, NULL, NULL, 'Settings', 50, 55),
(27, 26, NULL, NULL, 'admin_system_setting', 51, 52),
(28, 26, NULL, NULL, 'admin_toggleStatus', 53, 54),
(29, 1, NULL, NULL, 'Users', 56, 93),
(30, 29, NULL, NULL, 'admin_index', 57, 58),
(31, 29, NULL, NULL, 'admin_company_sub_manager_summary', 59, 60),
(32, 29, NULL, NULL, 'admin_company_members_summary', 61, 62),
(33, 29, NULL, NULL, 'admin_add', 63, 64),
(34, 29, NULL, NULL, 'admin_edit', 65, 66),
(35, 29, NULL, NULL, 'login', 67, 68),
(36, 29, NULL, NULL, 'signup', 69, 70),
(37, 29, NULL, NULL, 'signup_send_email', 71, 72),
(38, 29, NULL, NULL, 'account_created', 73, 74),
(39, 29, NULL, NULL, 'activate', 75, 76),
(40, 29, NULL, NULL, 'logout', 77, 78),
(41, 29, NULL, NULL, 'admin_change_password', 79, 80),
(42, 29, NULL, NULL, 'forgot_password', 81, 82),
(43, 29, NULL, NULL, 'initDB', 83, 84),
(44, 29, NULL, NULL, 'aclExtras', 85, 86),
(45, 29, NULL, NULL, 'clearCache', 87, 88),
(46, 29, NULL, NULL, 'acl', 89, 90),
(47, 29, NULL, NULL, 'admin_toggleStatus', 91, 92),
(48, 1, NULL, NULL, 'WebServices', 94, 97),
(49, 48, NULL, NULL, 'index', 95, 96),
(50, 1, NULL, NULL, 'AclExtras', 98, 99),
(51, 1, NULL, NULL, 'DebugKit', 100, 109),
(52, 51, NULL, NULL, 'ToolbarAccess', 101, 108),
(53, 52, NULL, NULL, 'history_state', 102, 103),
(54, 52, NULL, NULL, 'sql_explain', 104, 105),
(55, 52, NULL, NULL, 'admin_toggleStatus', 106, 107),
(56, 1, NULL, NULL, 'ChartReports', 110, 119),
(57, 56, NULL, NULL, 'admin_index', 111, 112),
(58, 56, NULL, NULL, 'admin_add', 113, 114),
(59, 56, NULL, NULL, 'admin_edit', 115, 116),
(60, 56, NULL, NULL, 'admin_toggleStatus', 117, 118);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) unsigned NOT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) unsigned NOT NULL,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

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
(17, 3, 56, '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `chart_menus`
--

CREATE TABLE IF NOT EXISTS `chart_menus` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `type` int(1) unsigned NOT NULL COMMENT '1=Menu, 2=Link',
  `name` varchar(45) NOT NULL,
  `fa_icon` varchar(45) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_menus`
--

INSERT INTO `chart_menus` (`id`, `company_id`, `parent_id`, `type`, `name`, `fa_icon`, `is_active`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 8, 0, 1, 'Attendance', '', 1, '2017-09-13 22:20:16', 8, '2017-09-13 22:20:16', 8),
(2, 8, 1, 2, 'Apr', '', 1, '2017-09-13 22:21:02', 8, '2017-09-13 22:21:02', 8),
(3, 8, 1, 2, 'May', '', 1, '2017-09-13 22:21:13', 8, '2017-09-22 22:11:00', 8),
(4, 8, 1, 2, 'July', '', 1, '2017-09-13 22:21:22', 8, '2017-09-22 22:10:53', 8),
(5, 8, 1, 2, 'June', '', 1, '2017-09-13 22:21:38', 8, '2017-09-22 22:10:46', 8),
(6, 8, 0, 1, 'Inventory', '', 1, '2017-09-22 20:42:13', 8, '2017-09-22 20:42:13', 8),
(7, 8, 1, 2, 'May', '', 1, '2017-09-22 22:10:13', 8, '2017-09-22 22:10:13', 8),
(8, 8, 1, 2, 'Aug', '', 1, '2017-09-22 22:11:23', 8, '2017-09-22 22:11:23', 8),
(9, 8, 1, 2, 'Sep', '', 1, '2017-09-22 22:11:33', 8, '2017-09-22 22:11:33', 8),
(10, 8, 1, 2, 'Jan', '', 1, '2017-09-22 22:12:13', 8, '2017-09-22 22:12:13', 8),
(11, 8, 1, 2, 'Feb', '', 1, '2017-09-22 22:12:28', 8, '2017-09-22 22:12:28', 8),
(12, 8, 1, 2, 'March', '', 1, '2017-09-22 22:12:40', 8, '2017-09-22 22:12:40', 8),
(13, 8, 1, 2, 'Oct', '', 1, '2017-09-22 22:12:52', 8, '2017-09-22 22:12:52', 8),
(14, 8, 1, 2, 'Nov', '', 1, '2017-09-22 22:13:08', 8, '2017-09-22 22:13:08', 8),
(15, 8, 1, 2, 'Dec', '', 1, '2017-09-22 22:13:19', 8, '2017-09-22 22:13:19', 8);

-- --------------------------------------------------------

--
-- Table structure for table `chart_reports`
--

CREATE TABLE IF NOT EXISTS `chart_reports` (
  `id` int(10) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `chart_menu_id` int(10) unsigned NOT NULL,
  `type` int(1) unsigned NOT NULL COMMENT '1=Internal, 2=External',
  `name` varchar(45) NOT NULL,
  `csv_file` text NOT NULL,
  `url` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chart_reports`
--

INSERT INTO `chart_reports` (`id`, `company_id`, `chart_menu_id`, `type`, `name`, `csv_file`, `url`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 8, 2, 2, 'April Attendance Report', '', 'http://dev.ts-chart-admin.com/', '2017-09-13 22:22:06', 8, '2017-09-13 22:22:06', 8);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `tag_line` varchar(255) NOT NULL,
  `logo` varchar(45) NOT NULL,
  `cover_image` varchar(45) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `code`, `name`, `tag_line`, `logo`, `cover_image`, `created`, `modified`) VALUES
(8, '1', 'Tech Formation', '', '', '', '2017-09-13 20:16:31', '2017-09-13 20:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `cron_logs`
--

CREATE TABLE IF NOT EXISTS `cron_logs` (
  `id` int(10) unsigned NOT NULL,
  `type` int(3) NOT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_logs`
--

CREATE TABLE IF NOT EXISTS `email_logs` (
  `id` int(11) unsigned NOT NULL,
  `from_email` varchar(100) NOT NULL,
  `to_email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_placeholders`
--

CREATE TABLE IF NOT EXISTS `email_placeholders` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(10) unsigned NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(45) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `placeholder_ids` text NOT NULL,
  `created` datetime NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(3) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) unsigned NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `group_id` int(2) unsigned NOT NULL COMMENT '1=Admin, 2=Company Admin, 3=Company Sub Admin, 4=Company Member',
  `company_id` int(10) unsigned DEFAULT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `activation_token` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `created_by` int(10) unsigned DEFAULT NULL,
  `modified` datetime NOT NULL,
  `modified_by` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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

CREATE TABLE IF NOT EXISTS `web_service_logs` (
  `id` int(11) unsigned NOT NULL,
  `company_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `type` int(3) NOT NULL,
  `request` text NOT NULL,
  `response` mediumtext,
  `info` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `execution_time` float NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web_service_logs`
--

INSERT INTO `web_service_logs` (`id`, `company_id`, `user_id`, `type`, `request`, `response`, `info`, `status`, `execution_time`, `created`) VALUES
(1, 0, NULL, 0, '{\n"username" : "tech.admin",\n"password" : "admin"\n}', NULL, '', 0, 0, '2017-09-14 20:35:02'),
(2, 0, NULL, 0, '{\n"username" : "tech.admin",\n"password" : "admin"\n}', '{"msg":"Missing Service","status":0}', '', 0, 0.1, '2017-09-14 20:35:19'),
(3, 0, NULL, 0, '{\n  "service_name" : "LOGIN"\n"username" : "tech.admin",\n"password" : "admin"\n}', '{"msg":"Failed","status":0,"errors":["Invalid JSON Request"]}', '', 0, 0.12, '2017-09-14 20:35:58'),
(4, 0, NULL, 1, '{\n  "service_name" : "LOGIN",\n"username" : "tech.admin",\n"password" : "admin"\n}', '{"msg":"Failed","status":0,"errors":["Invalid username or password"]}', '', 0, 0.258, '2017-09-14 20:36:03'),
(5, 0, NULL, 1, '{\n  "service_name" : "LOGIN",\n"username" : "tech.admin",\n"password" : "admin"\n}', '{"msg":"Failed","status":0,"errors":["Missing company_id"]}', '', 0, 0.189, '2017-09-14 20:39:35'),
(6, 0, NULL, 1, '{\n  "service_name" : "LOGIN",\n"username" : "tech.admin",\n"password" : "admin",\n  "company_id" : "1"\n}', '{"msg":"Failed","status":0,"errors":["Invalid username or password"]}', '', 0, 0.142, '2017-09-14 20:39:52'),
(7, 8, NULL, 2, '{\n  "service_name" : "GET_COMPANY_DETAILS",\n  "code" : "1"\n}', '{"id":"8","code":"1","name":"Tech Formation","tag_line":"","logo":"","cover_image":"","created":"2017-09-13 20:16:31","modified":"2017-09-13 20:16:31","status":1}', '', 1, 0.151, '2017-09-14 20:41:22'),
(8, 0, NULL, 3, '{\n  "service_name" : "GET_MENUS",\n  "company_id" : "1"\n}', '{"status":1}', '', 1, 0.261, '2017-09-14 20:44:12'),
(9, 0, NULL, 3, '{\n  "service_name" : "GET_MENUS",\n  "company_id" : "8"\n}', '{"0":{"ChartMenu":{"id":"1","company_id":"8","parent_id":"0","type":"1","name":"Attendance","fa_icon":"","is_active":true,"created":"2017-09-13 22:20:16","created_by":"8","modified":"2017-09-13 22:20:16","modified_by":"8"},"children":[{"ChartMenu":{"id":"2","company_id":"8","parent_id":"1","type":"2","name":"Apr","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:02","created_by":"8","modified":"2017-09-13 22:21:02","modified_by":"8"}},{"ChartMenu":{"id":"3","company_id":"8","parent_id":"1","type":"2","name":"May","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:13","created_by":"8","modified":"2017-09-13 22:21:13","modified_by":"8"}},{"ChartMenu":{"id":"4","company_id":"8","parent_id":"1","type":"2","name":"July","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:22","created_by":"8","modified":"2017-09-13 22:21:22","modified_by":"8"}},{"ChartMenu":{"id":"5","company_id":"8","parent_id":"1","type":"2","name":"June","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:38","created_by":"8","modified":"2017-09-13 22:21:38","modified_by":"8"}}]},"status":1}', '', 1, 0.083, '2017-09-14 20:44:16'),
(10, 0, NULL, 3, '{\n  "service_name" : "GET_MENUS",\n  "company_id" : "8"\n}', '{"0":{"ChartMenu":{"id":"1","company_id":"8","parent_id":"0","type":"1","name":"Attendance","fa_icon":"","is_active":true,"created":"2017-09-13 22:20:16","created_by":"8","modified":"2017-09-13 22:20:16","modified_by":"8"},"children":[{"ChartMenu":{"id":"2","company_id":"8","parent_id":"1","type":"2","name":"Apr","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:02","created_by":"8","modified":"2017-09-13 22:21:02","modified_by":"8"}},{"ChartMenu":{"id":"3","company_id":"8","parent_id":"1","type":"2","name":"May","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:13","created_by":"8","modified":"2017-09-13 22:21:13","modified_by":"8"}},{"ChartMenu":{"id":"4","company_id":"8","parent_id":"1","type":"2","name":"July","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:22","created_by":"8","modified":"2017-09-13 22:21:22","modified_by":"8"}},{"ChartMenu":{"id":"5","company_id":"8","parent_id":"1","type":"2","name":"June","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:38","created_by":"8","modified":"2017-09-13 22:21:38","modified_by":"8"}}]},"status":1}', '', 1, 0.116, '2017-09-14 20:46:19'),
(11, 0, NULL, 3, '{\n  "service_name" : "GET_MENUS",\n  "company_id" : "8"\n}', '{"msg":"","status":1,"data":[{"ChartMenu":{"id":"1","company_id":"8","parent_id":"0","type":"1","name":"Attendance","fa_icon":"","is_active":true,"created":"2017-09-13 22:20:16","created_by":"8","modified":"2017-09-13 22:20:16","modified_by":"8"},"children":[{"ChartMenu":{"id":"2","company_id":"8","parent_id":"1","type":"2","name":"Apr","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:02","created_by":"8","modified":"2017-09-13 22:21:02","modified_by":"8"}},{"ChartMenu":{"id":"3","company_id":"8","parent_id":"1","type":"2","name":"May","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:13","created_by":"8","modified":"2017-09-13 22:21:13","modified_by":"8"}},{"ChartMenu":{"id":"4","company_id":"8","parent_id":"1","type":"2","name":"July","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:22","created_by":"8","modified":"2017-09-13 22:21:22","modified_by":"8"}},{"ChartMenu":{"id":"5","company_id":"8","parent_id":"1","type":"2","name":"June","fa_icon":"","is_active":true,"created":"2017-09-13 22:21:38","created_by":"8","modified":"2017-09-13 22:21:38","modified_by":"8"}}]}]}', '', 1, 0.141, '2017-09-14 20:46:45'),
(12, 0, NULL, 3, '{\n  "service_name" : "GET_MENUS",\n  "company_id" : "8"\n}', '{"msg":"","status":1,"data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""}},{"ChartMenu":{"id":"3","parent_id":"1","name":"May","type":"2","fa_icon":""}},{"ChartMenu":{"id":"4","parent_id":"1","name":"July","type":"2","fa_icon":""}},{"ChartMenu":{"id":"5","parent_id":"1","name":"June","type":"2","fa_icon":""}}]}]}', '', 1, 0.126, '2017-09-14 20:47:46'),
(13, 0, NULL, 3, '{\n  "service_name" : "GET_MENUS",\n  "company_id" : "8"\n}', '{"msg":"","status":1,"data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"id":"1","company_id":"8","chart_menu_id":"2","type":"2","name":"April Attendance Report","csv_file":null,"url":"http:\\/\\/dev.ts-chart-admin.com\\/","created":"2017-09-13 22:22:06","created_by":"8","modified":"2017-09-13 22:22:06","modified_by":"8"}]},{"ChartMenu":{"id":"3","parent_id":"1","name":"May","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"4","parent_id":"1","name":"July","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"5","parent_id":"1","name":"June","type":"2","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.137, '2017-09-14 20:48:39'),
(14, 0, NULL, 3, '{\n  "service_name" : "GET_MENUS",\n  "company_id" : "8"\n}', '{"msg":"","status":1,"data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""}},{"ChartMenu":{"id":"3","parent_id":"1","name":"May","type":"2","fa_icon":""}},{"ChartMenu":{"id":"4","parent_id":"1","name":"July","type":"2","fa_icon":""}},{"ChartMenu":{"id":"5","parent_id":"1","name":"June","type":"2","fa_icon":""}}]}]}', '', 1, 0.137, '2017-09-14 20:49:25'),
(15, 0, NULL, 3, '{\n  "service_name" : "GET_MENUS",\n  "company_id" : "8"\n}', '{"msg":"","status":1,"data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"id":"1","company_id":"8","chart_menu_id":"2","type":"2","name":"April Attendance Report","csv_file":null,"url":"http:\\/\\/dev.ts-chart-admin.com\\/","created":"2017-09-13 22:22:06","created_by":"8","modified":"2017-09-13 22:22:06","modified_by":"8"}]},{"ChartMenu":{"id":"3","parent_id":"1","name":"May","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"4","parent_id":"1","name":"July","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"5","parent_id":"1","name":"June","type":"2","fa_icon":""},"ChartReport":[]}]}]}', '', 1, 0.21, '2017-09-14 20:50:44'),
(16, 0, NULL, 3, '{\n  "service_name" : "GET_MENU_REPORTS",\n  "company_id" : "8"\n}', '{"msg":"","status":1,"data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":null,"url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]},{"ChartMenu":{"id":"3","parent_id":"1","name":"May","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"4","parent_id":"1","name":"July","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"5","parent_id":"1","name":"June","type":"2","fa_icon":""},"ChartReport":[]}]}]}', '', 1, 0.137, '2017-09-14 20:57:30'),
(17, 0, NULL, 3, '{\n  "service_name" : "GET_MENU_REPORTS",\n  "company_id" : "8"\n}', '{"msg":"","status":1,"data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.177, '2017-09-14 20:59:05'),
(18, 0, NULL, 0, '', '{"msg":"Failed","status":0,"errors":["Invalid JSON Request"]}', '', 0, 3.507, '2017-09-16 19:20:05'),
(19, 0, NULL, 2, '{"service_name":"GET_COMPANY_DETAILS","code":"12345"}', '{"msg":"Invalid Company Code","status":0}', '', 0, 0.765, '2017-09-16 19:43:14'),
(20, 8, NULL, 2, '{"service_name":"GET_COMPANY_DETAILS","code":"1"}', '{"msg":"","status":1,"data":{"id":"8","code":"1","name":"Tech Formation","tag_line":"","logo":"","cover_image":"","created":"2017-09-13 20:16:31","modified":"2017-09-13 20:16:31"}}', '', 1, 0.347, '2017-09-16 19:43:35'),
(21, 8, NULL, 2, '{"service_name":"GET_COMPANY_DETAILS","code":"1"}', '{"msg":"Success","status":1,"data":{"id":"8","code":"1","name":"Tech Formation","tag_line":"","logo":"","cover_image":"","created":"2017-09-13 20:16:31","modified":"2017-09-13 20:16:31"}}', '', 1, 0.878, '2017-09-16 19:45:32'),
(22, 8, NULL, 2, '{"service_name":"GET_COMPANY_DETAILS","code":"1"}', '{"msg":"Success","status":1,"service_name":"GET_COMPANY_DETAILS","data":{"id":"8","code":"1","name":"Tech Formation","tag_line":"","logo":"","cover_image":"","created":"2017-09-13 20:16:31","modified":"2017-09-13 20:16:31"}}', '', 1, 0.288, '2017-09-16 19:49:21'),
(23, 8, NULL, 2, '{"service_name":"GET_COMPANY_DETAILS","code":"1"}', '{"msg":"Success","status":1,"service_name":"GET_COMPANY_DETAILS","data":{"id":"8","code":"1","name":"Tech Formation","tag_line":"","logo":"","cover_image":"","created":"2017-09-13 20:16:31","modified":"2017-09-13 20:16:31"}}', '', 1, 3.543, '2017-09-16 20:42:11'),
(24, 8, NULL, 2, '{"service_name":"GET_COMPANY_DETAILS","code":"1"}', '{"msg":"Success","status":1,"service_name":"GET_COMPANY_DETAILS","data":{"id":"8","code":"1","name":"Tech Formation","tag_line":"","logo":"","cover_image":"","created":"2017-09-13 20:16:31","modified":"2017-09-13 20:16:31"}}', '', 1, 0.822, '2017-09-16 20:47:03'),
(25, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 1.284, '2017-09-16 20:48:20'),
(26, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.35, '2017-09-16 20:56:02'),
(27, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.307, '2017-09-16 21:39:23'),
(28, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.164, '2017-09-16 21:40:01'),
(29, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.685, '2017-09-16 21:43:35'),
(30, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.472, '2017-09-16 21:47:25'),
(31, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.172, '2017-09-16 22:40:17'),
(32, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.161, '2017-09-16 22:42:31'),
(33, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.137, '2017-09-16 22:43:26'),
(34, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.3, '2017-09-16 22:44:37'),
(35, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.199, '2017-09-16 22:44:46'),
(36, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 1.111, '2017-09-22 20:37:14'),
(37, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]}]}', '', 1, 0.082, '2017-09-22 20:37:22'),
(38, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.153, '2017-09-22 20:42:43'),
(39, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.454, '2017-09-22 20:51:32'),
(40, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.224, '2017-09-22 20:53:49'),
(41, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.313, '2017-09-22 20:59:48'),
(42, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.118, '2017-09-22 21:00:03'),
(43, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.226, '2017-09-22 21:02:42'),
(44, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.164, '2017-09-22 21:03:44'),
(45, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.135, '2017-09-22 21:04:37'),
(46, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.241, '2017-09-22 21:06:11'),
(47, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.165, '2017-09-22 21:07:18'),
(48, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.099, '2017-09-22 21:07:25'),
(49, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.138, '2017-09-22 21:08:35'),
(50, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.09, '2017-09-22 21:08:43'),
(51, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.351, '2017-09-22 21:11:58'),
(52, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.507, '2017-09-22 21:38:44'),
(53, 8, NULL, 2, '{"service_name":"GET_COMPANY_DETAILS","code":"1"}', '{"msg":"Success","status":1,"service_name":"GET_COMPANY_DETAILS","data":{"id":"8","code":"1","name":"Tech Formation","tag_line":"","logo":"","cover_image":"","created":"2017-09-13 20:16:31","modified":"2017-09-13 20:16:31"}}', '', 1, 1.224, '2017-09-22 21:50:26'),
(54, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 1.098, '2017-09-22 21:50:27'),
(55, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.191, '2017-09-22 21:52:08'),
(56, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.233, '2017-09-22 21:52:58'),
(57, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.158, '2017-09-22 21:53:42'),
(58, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.183, '2017-09-22 21:54:43'),
(59, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.122, '2017-09-22 21:54:54'),
(60, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.339, '2017-09-22 22:03:44'),
(61, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.496, '2017-09-22 22:07:45'),
(62, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]},{"ChartMenu":{"id":"3","parent_id":"1","name":"May","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"4","parent_id":"1","name":"July","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"5","parent_id":"1","name":"June","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"7","parent_id":"1","name":"May","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"8","parent_id":"1","name":"Aug","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"9","parent_id":"1","name":"Sep","type":"2","fa_icon":""},"ChartReport":[]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.159, '2017-09-22 22:11:46'),
(63, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]},{"ChartMenu":{"id":"3","parent_id":"1","name":"May","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"4","parent_id":"1","name":"July","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"5","parent_id":"1","name":"June","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"7","parent_id":"1","name":"May","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"8","parent_id":"1","name":"Aug","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"9","parent_id":"1","name":"Sep","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"10","parent_id":"1","name":"Jan","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"11","parent_id":"1","name":"Feb","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"12","parent_id":"1","name":"March","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"13","parent_id":"1","name":"Oct","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"14","parent_id":"1","name":"Nov","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"15","parent_id":"1","name":"Dec","type":"2","fa_icon":""},"ChartReport":[]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.096, '2017-09-22 22:13:22'),
(64, 8, NULL, 3, '{"company_id":"8","service_name":"GET_MENU_REPORTS"}', '{"msg":"Success","status":1,"service_name":"GET_MENU_REPORTS","data":[{"ChartMenu":{"id":"1","parent_id":"0","name":"Attendance","type":"1","fa_icon":""},"ChartReport":[],"children":[{"ChartMenu":{"id":"2","parent_id":"1","name":"Apr","type":"2","fa_icon":""},"ChartReport":[{"type":"2","name":"April Attendance Report","csv_file":"","url":"http:\\/\\/dev.ts-chart-admin.com\\/","chart_menu_id":"2"}]},{"ChartMenu":{"id":"3","parent_id":"1","name":"May","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"4","parent_id":"1","name":"July","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"5","parent_id":"1","name":"June","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"7","parent_id":"1","name":"May","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"8","parent_id":"1","name":"Aug","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"9","parent_id":"1","name":"Sep","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"10","parent_id":"1","name":"Jan","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"11","parent_id":"1","name":"Feb","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"12","parent_id":"1","name":"March","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"13","parent_id":"1","name":"Oct","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"14","parent_id":"1","name":"Nov","type":"2","fa_icon":""},"ChartReport":[]},{"ChartMenu":{"id":"15","parent_id":"1","name":"Dec","type":"2","fa_icon":""},"ChartReport":[]}]},{"ChartMenu":{"id":"6","parent_id":"0","name":"Inventory","type":"1","fa_icon":""},"ChartReport":[]}]}', '', 1, 0.113, '2017-09-22 22:17:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acos`
--
ALTER TABLE `acos`
  ADD PRIMARY KEY (`id`), ADD KEY `idx_acos_lft_rght` (`lft`,`rght`), ADD KEY `idx_acos_alias` (`alias`);

--
-- Indexes for table `aros`
--
ALTER TABLE `aros`
  ADD PRIMARY KEY (`id`), ADD KEY `idx_aros_lft_rght` (`lft`,`rght`), ADD KEY `idx_aros_alias` (`alias`);

--
-- Indexes for table `aros_acos`
--
ALTER TABLE `aros_acos`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`), ADD KEY `idx_aco_id` (`aco_id`);

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
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

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
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `aros`
--
ALTER TABLE `aros`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `aros_acos`
--
ALTER TABLE `aros_acos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `chart_menus`
--
ALTER TABLE `chart_menus`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `chart_reports`
--
ALTER TABLE `chart_reports`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cron_logs`
--
ALTER TABLE `cron_logs`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_logs`
--
ALTER TABLE `email_logs`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_placeholders`
--
ALTER TABLE `email_placeholders`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `web_service_logs`
--
ALTER TABLE `web_service_logs`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=65;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
