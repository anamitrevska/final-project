-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.29-0ubuntu0.18.04.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for Final_Project_DB
CREATE DATABASE IF NOT EXISTS `Final_Project_DB` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `Final_Project_DB`;

-- Dumping structure for table Final_Project_DB.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.comments: ~17 rows (approximately)
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `comment_desc`, `task_id`) VALUES
	(1, '2020-11-24 21:01:11', '2020-11-24 21:01:11', NULL, '1', 'This is my first comment !!!', '6'),
	(2, '2020-11-24 21:21:39', '2020-11-24 21:21:39', NULL, '1', 'Hi all ,\r\nThis is an example of comment and enter\r\n!!!', '6'),
	(3, '2020-11-24 21:22:23', '2020-11-24 21:22:23', NULL, '1', 'test\r\ntest\r\ntest\r\netstetet\r\nteettetetette', '6'),
	(4, '2020-11-24 21:22:36', '2020-11-24 21:22:36', NULL, '1', ':*', '6'),
	(5, '2020-11-24 21:28:31', '2020-11-24 21:28:31', NULL, '1', 'bla vksf', '6'),
	(6, '2020-11-24 22:34:38', '2020-11-24 22:34:38', NULL, '1', 'hehhehhe', '8'),
	(7, '2021-01-02 17:40:58', '2021-01-02 17:40:58', NULL, '1', 'test ana', '7'),
	(8, '2021-01-02 19:30:54', '2021-01-02 21:43:59', NULL, '1', 'testana\r\nana\r\nmitrevska', '7'),
	(9, '2021-01-02 20:19:48', '2021-01-02 20:21:24', NULL, '1', 'test ana 1', '12'),
	(10, '2021-01-02 21:01:47', '2021-01-02 21:05:11', NULL, '1', 'ana\r\nana\r\nana\r\nana1', '7'),
	(11, '2021-01-04 21:57:28', '2021-01-04 21:57:28', NULL, '1', 'test za forward', '12'),
	(12, '2021-01-04 22:00:31', '2021-01-04 22:00:31', NULL, '1', 'test za forward', '12'),
	(13, '2021-01-04 22:13:26', '2021-01-04 22:13:26', NULL, '1', 'hjjjj', '12'),
	(14, '2021-01-07 13:30:13', '2021-01-07 13:30:13', NULL, '1', 'testttt', '20'),
	(15, '2021-01-07 18:29:18', '2021-01-07 18:29:18', NULL, '1', 'test ana', '21'),
	(16, '2021-01-07 19:33:37', '2021-01-07 19:35:50', NULL, '1', 'test 1', '22'),
	(17, '2021-01-07 19:56:53', '2021-01-07 19:56:53', NULL, '1', '.', '8'),
	(18, '2021-01-12 11:44:55', '2021-01-12 11:44:55', NULL, '1', 'wow test', '23'),
	(19, '2021-01-13 11:56:17', '2021-01-13 11:56:17', NULL, '1', 'test', '13'),
	(20, '2021-01-13 12:38:48', '2021-01-13 12:38:48', NULL, '1', 'test', '8');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table Final_Project_DB.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table Final_Project_DB.files
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `task_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.files: ~7 rows (approximately)
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` (`id`, `created_at`, `updated_at`, `name`, `file_path`, `task_id`, `user_id`) VALUES
	(1, '2021-01-07 13:26:29', '2021-01-07 13:26:29', '1610025989_hints.docx', '/storage/uploads/1610025989_hints.docx', '20', '1'),
	(2, '2021-01-07 15:48:41', '2021-01-07 15:48:41', '1610034521_CV_Ana_Mitrevska.pdf', '/storage/uploads/1610034521_CV_Ana_Mitrevska.pdf', '21', '1'),
	(3, '2021-01-07 16:45:09', '2021-01-07 16:45:09', '1610037909_1610025989_hints (4).docx', '/storage/uploads/1610037909_1610025989_hints (4).docx', '21', '1'),
	(4, '2021-01-07 16:45:33', '2021-01-07 16:45:33', '1610037933_1610025989_hints (1).docx', '/storage/uploads/1610037933_1610025989_hints (1).docx', '21', '1'),
	(5, '2021-01-07 16:52:43', '2021-01-07 16:52:43', '1610038363_default-avatar.jpg', '/storage/uploads/1610038363_default-avatar.jpg', '21', '1'),
	(6, '2021-01-07 18:24:43', '2021-01-07 18:24:43', '1610043883_default-avatar.jpg', '/storage/uploads/1610043883_default-avatar.jpg', '21', '1'),
	(7, '2021-01-07 19:32:09', '2021-01-07 19:32:09', '1610047929_1610034521_CV_Ana_Mitrevska.pdf', '/storage/uploads/1610047929_1610034521_CV_Ana_Mitrevska.pdf', '22', '1'),
	(8, '2021-01-12 11:44:43', '2021-01-12 11:44:43', '1610451882_1610025989_hints (4).docx', '/storage/uploads/1610451882_1610025989_hints (4).docx', '23', '1'),
	(9, '2021-01-13 12:05:50', '2021-01-13 12:05:50', '1610539550_1610025989_hints (4).docx', '/storage/uploads/1610539550_1610025989_hints (4).docx', '6', '1');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;

-- Dumping structure for table Final_Project_DB.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.migrations: ~9 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2019_08_19_000000_create_failed_jobs_table', 1),
	(3, '2020_09_09_132821_create_tasks_table', 1),
	(4, '2020_09_11_172007_create_teams_table', 1),
	(5, '2020_09_15_183721_create_taskstatus_table', 2),
	(10, '2020_11_11_215151_create_user_team_realtion_table', 3),
	(11, '2014_10_12_100000_create_password_resets_table', 4),
	(14, '2020_11_11_215151_create_user_team_relations_table', 5),
	(15, '2020_11_24_192419_create_comments_table', 5),
	(16, '2021_01_07_125247_create_files_table', 6);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table Final_Project_DB.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('a.mitrevska@hotmail.com', '$2y$10$qtA4yOR7jrucMAj3OMi0LedxERi88VhhgWjyJUGXp9Z8oWwyVckSG', '2020-12-29 23:37:46');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table Final_Project_DB.tasks
CREATE TABLE IF NOT EXISTS `tasks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tasks_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_team` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assigned_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.tasks: ~22 rows (approximately)
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`id`, `created_at`, `updated_at`, `deleted_at`, `created_by`, `tasks_name`, `assigned_team`, `assigned_user`, `status`, `description`) VALUES
	(1, '2020-09-12 16:26:01', '2020-09-12 16:27:46', '2020-09-12 16:27:46', '2', 'tasks', '1', '2', 'New', 'stg'),
	(2, '2020-09-12 16:30:19', '2020-11-14 17:59:59', '2020-11-14 17:59:59', '1', 'First task', '2', '1', 'New', 'ghdfghfgh'),
	(3, '2020-09-12 18:08:40', '2020-09-15 16:51:33', '2020-09-15 16:51:33', '1', 'First task', '2', '1', 'New', 'test'),
	(4, '2020-09-12 18:10:31', '2020-11-15 20:58:01', '2020-11-15 20:58:01', '1', 'First task', '3', '1', 'Closed', 'test'),
	(5, '2020-09-15 16:54:08', '2020-11-15 23:17:32', '2020-11-15 23:17:32', '1', 'TAsk for test', '4', '1', 'Closed', 'TEST'),
	(6, '2020-11-12 21:14:10', '2020-11-24 19:39:38', NULL, '1', 'First task', '2', '2', 'Closed', 'test'),
	(7, '2020-11-14 20:26:04', '2021-01-03 21:38:01', NULL, '1', 'test task created by', '4', '1', 'Closed', 'test test update  11112\r\nana \r\nana'),
	(8, '2020-11-20 19:06:03', '2021-01-13 12:38:48', NULL, '1', 'scaxc', '6', '49', 'Pending', 'test'),
	(9, '2020-11-20 19:10:59', '2020-11-20 19:10:59', NULL, '1', 'scaxc', '2', '1', 'New', 'test'),
	(10, '2020-11-20 19:11:20', '2020-11-20 19:11:20', NULL, '1', 'gfdfgdfgdfgh', '6', '3', 'New', 'dghdgh'),
	(11, '2020-11-20 19:11:38', '2020-11-20 19:11:38', NULL, '1', 'srgdfdfgdfg', '11', '1', 'New', 'dfgdgdf'),
	(12, '2020-11-20 19:11:55', '2021-01-04 22:14:18', NULL, '1', 'yyyyyyyy', '2', '5', 'Pending', 'yyyyyyy'),
	(13, '2020-11-20 19:11:55', '2021-01-13 11:56:17', NULL, '1', 'yyyyyyyy', '4', '5', 'In progress', 'yyyyyyy'),
	(14, '2020-11-20 19:11:55', '2021-01-13 12:45:29', NULL, '1', 'yyyyyyyy', '10', '1', 'In progress', 'yyyyyyy'),
	(15, '2020-11-20 19:11:55', '2020-11-20 19:11:55', NULL, '1', 'yyyyyyyy', '10', '1', 'New', 'yyyyyyy'),
	(16, '2020-11-20 19:11:55', '2020-11-20 19:11:55', NULL, '1', 'yyyyyyyy', '10', '1', 'New', 'yyyyyyy'),
	(17, '2020-11-20 19:11:55', '2020-11-20 19:11:55', NULL, '1', 'yyyyyyyy', '10', '1', 'New', 'yyyyyyy'),
	(18, '2021-01-07 13:19:37', '2021-01-07 13:19:37', NULL, '1', 'test with file', '2', 'default user', 'New', 'test 123'),
	(19, '2021-01-07 13:23:10', '2021-01-07 13:23:10', NULL, '1', 'sdfd', '2', 'default user', 'New', 'dfdf'),
	(20, '2021-01-07 13:26:29', '2021-01-07 13:30:13', NULL, '1', 'test upload file', '2', '4', 'New', 'dfdf111'),
	(21, '2021-01-07 15:48:41', '2021-01-12 11:47:41', '2021-01-12 11:47:41', '1', 'test razlichen file', '2', 'default user', 'In progress', 'test'),
	(22, '2021-01-07 19:32:09', '2021-01-07 19:32:09', NULL, '1', 'scaxc', '2', '1', 'New', 'rest'),
	(23, '2021-01-12 11:44:42', '2021-01-12 11:45:00', '2021-01-12 11:45:00', '1', 'First task', '2', '5', 'New', 'test'),
	(24, '2021-01-12 23:34:26', '2021-01-12 23:34:26', NULL, '1', 'First task', '2', '5', 'New', 'test'),
	(25, '2021-01-12 23:34:41', '2021-01-12 23:34:41', NULL, '1', 'First task', '4', '59', 'New', 'test'),
	(26, '2021-01-12 23:34:55', '2021-01-12 23:34:55', NULL, '1', 'First task', '11', '58', 'New', 'test'),
	(27, '2021-01-12 23:35:09', '2021-01-12 23:35:09', NULL, '1', 'tasks', '8', '55', 'New', 'sdfsdf'),
	(28, '2021-01-12 23:38:59', '2021-01-12 23:38:59', NULL, '1', 'First task', '6', '57', 'New', 'tests'),
	(29, '2021-01-12 23:39:11', '2021-01-12 23:39:11', NULL, '1', 'tasks', '6', '51', 'New', 'rfdfgdfg'),
	(30, '2021-01-12 23:39:22', '2021-01-12 23:39:22', NULL, '1', 'First task', '7', '48', 'New', 'dfsfg'),
	(31, '2021-01-12 23:39:33', '2021-01-12 23:39:33', NULL, '1', 'sdfgsdfgsdgfsd', '6', '57', 'New', 'sdfgsdfgsdgf');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;

-- Dumping structure for table Final_Project_DB.taskstatus
CREATE TABLE IF NOT EXISTS `taskstatus` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.taskstatus: ~4 rows (approximately)
/*!40000 ALTER TABLE `taskstatus` DISABLE KEYS */;
INSERT INTO `taskstatus` (`id`, `created_at`, `updated_at`, `status_name`) VALUES
	(1, '2020-09-15 20:49:44', NULL, 'New'),
	(2, '2020-09-15 20:50:09', NULL, 'In progress'),
	(3, '2020-09-15 20:50:20', NULL, 'Pending'),
	(4, '2020-09-15 20:52:38', NULL, 'Closed');
/*!40000 ALTER TABLE `taskstatus` ENABLE KEYS */;

-- Dumping structure for table Final_Project_DB.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `teams_name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.teams: ~15 rows (approximately)
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` (`id`, `created_at`, `updated_at`, `deleted_at`, `teams_name`, `description`, `created_by`) VALUES
	(1, '2020-09-12 16:25:16', '2020-12-30 01:33:31', '2020-12-30 01:33:31', 'BSS Operations', 'test', '1'),
	(2, '2020-09-12 16:25:28', '2020-12-30 01:43:42', NULL, 'CRM', 'testFF', '1'),
	(3, '2020-09-12 18:09:17', '2020-11-14 18:46:02', '2020-11-14 18:46:02', 'Bussiness Marketing', 'test', '1'),
	(4, '2020-09-12 18:09:30', '2020-09-12 18:09:30', NULL, 'Bussiness Marketing', 'test', '1'),
	(5, '2020-10-28 21:10:49', '2020-11-14 19:46:13', '2020-11-14 19:46:13', 'ANA TEST', 'wow test test', '1'),
	(6, '2020-11-12 18:42:30', '2020-11-12 18:42:30', NULL, 'Test Team', 'this is a test team to see if the creation is successful', '2'),
	(7, '2020-11-12 20:56:28', '2020-11-12 20:56:28', NULL, 'Test Team', 'this is a test team to see if the creation is successful', '3'),
	(8, '2020-11-12 22:12:48', '2020-11-12 22:12:48', NULL, 'Test Team', 'this is a test team to see if the creation is successful', '4'),
	(9, '2020-11-12 22:30:25', '2020-11-12 22:30:25', NULL, 'Test Team', 'this is a test team to see if the creation is successful', '1'),
	(10, '2020-11-14 15:31:28', '2020-11-14 15:31:28', NULL, 'Ana 123', 'test', '1'),
	(11, '2020-11-14 15:33:35', '2021-01-12 23:47:40', '2021-01-12 23:47:40', 'TEST redirect team', 'test team', '1'),
	(12, '2020-11-14 15:33:50', '2021-01-13 15:28:46', '2021-01-13 15:28:46', 'TEST redirect team', 'test team', '1'),
	(13, '2020-11-14 15:33:55', '2020-11-14 15:33:55', NULL, 'TEST redirect team', 'test team', '1'),
	(14, '2020-11-14 15:34:44', '2020-11-14 15:34:44', NULL, 'test testaaaa', 'test redirect', '1'),
	(15, '2020-11-14 15:38:53', '2020-11-14 15:38:53', NULL, 'test test', 'test redirect', '1'),
	(16, '2020-11-14 20:27:32', '2020-11-14 20:27:32', NULL, 'Ana teams', 'test team created by', '1'),
	(17, '2021-01-12 23:46:49', '2021-01-12 23:47:01', '2021-01-12 23:47:01', 'test team 3', 'test test', '1');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

-- Dumping structure for table Final_Project_DB.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.users: ~44 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `deleted_at`, `email`, `email_verified_at`, `password`, `isAdmin`, `remember_token`, `created_at`, `updated_at`, `created_by`, `avatar`, `status`) VALUES
	(1, 'Ana Mitrevska', NULL, 'a.mitrevska@hotmail.com', NULL, '$2y$10$ayAZPOMam48nWko.jc95iehqvo40l3rv2bEmS6OurqC.zYp/lObBy', 'on', 'wzGWdRa0T4qyrJEp5h5tFajFtDZdbAwFFGMu15aYI9zMhDR1X56QHOFDD8pM', '2020-10-27 21:41:28', '2021-01-13 16:24:40', '1', '1610540228.jpg', '1'),
	(2, 'Oli', '2020-11-14 18:15:53', 'oli91@hotmail.com', NULL, '$2y$10$K9HtNbBlVja5c8v4oQz2ZeON6dk50wIWOZtvPRJIqBIWXJ.kZH3vO', '0', NULL, '2020-11-08 20:57:35', '2020-11-14 18:15:53', '1', 'default-avatar.jpg', '1'),
	(4, 'Ana Mitrevska', NULL, 'test@hotmail.com', NULL, '$2y$10$Yy4gRzk0LMXViw.rlH8UJe.q56JNo7JQb9PpRo7fd/InW3WbK9YKC', 'on', NULL, '2020-11-08 23:33:40', '2021-01-13 17:23:10', '2', 'default-avatar.jpg', '1'),
	(5, 'test', NULL, 'bla@dksjd.com', NULL, '$2y$10$r4haFD.9JBAF0pRTbVG6vuyWn2RD.znWXfz2vQ89gRmne3uEPA4za', 'on', NULL, '2020-11-08 23:36:54', '2020-11-08 23:36:54', '1', 'default-avatar.jpg', '1'),
	(6, 'test broj 1', NULL, 'hdsgjashd@test.com', NULL, '$2y$10$Qh1kIo1RxcUtpoydqhsnletlzsh7zdNE5gRovx/l2szw3yWsoYQai', 'on', NULL, '2020-11-09 00:14:27', '2020-11-09 00:14:27', '1', 'default-avatar.jpg', '1'),
	(7, 'test2', NULL, 'test2@test.cim', NULL, '$2y$10$9c3jnSeGLFjmR5yo0MqVt.V0bx7V38g5aDvEMDzI3z5LyzqmS.7pC', 'on', NULL, '2020-11-11 18:23:29', '2020-11-11 18:23:29', '1', 'default-avatar.jpg', '1'),
	(8, 'ana1', NULL, 'a1.mitrevska@hotmail.com', NULL, '$2y$10$Fw0XQ6obEsXT/10nFMfcRexMFUmaDW629BV.0vhhHyinSCLWml00K', 'on', NULL, '2020-11-11 19:05:32', '2020-11-11 19:05:32', '2', 'default-avatar.jpg', '1'),
	(9, 'ana1', NULL, 'a2.mitrevska@hotmail.com', NULL, '$2y$10$16rwLjdgDsmfb.3qs13.X.IpoigxOlCaH91m2fDSJmjBylPgruxWm', 'on', NULL, '2020-11-11 19:07:21', '2020-11-11 19:07:21', '2', 'default-avatar.jpg', '1'),
	(10, 'Ana Mitrevska', NULL, 'a3.mitrevska@hotmail.com', NULL, '$2y$10$edcfWjmp.5XZQKerRnzMyeb.ew.wkl0ziXYXFnfDvyFIIETaavTpy', 'on', NULL, '2020-11-11 19:08:15', '2020-11-11 19:08:15', '2', 'default-avatar.jpg', '1'),
	(11, 'Ana Mitrevska', NULL, 'a4.mitrevska@hotmail.com', NULL, '$2y$10$6cPd12xnyRvB0QVsPScv.OKPlvasc4Ck7P3vycdTVvchYS96qJkKi', 'on', NULL, '2020-11-11 19:12:52', '2020-11-11 19:12:52', '2', 'default-avatar.jpg', '1'),
	(12, 'TETETE', NULL, 'a5.mitrevska@hotmail.com', NULL, '$2y$10$o5XEwxnt4NFfNM7hvSOBWuP8Ac4WiFYY.WCHeZWIUqTR0balmk7r.', 'on', NULL, '2020-11-11 19:17:44', '2020-11-11 19:17:44', '2', 'default-avatar.jpg', '1'),
	(13, 'test', NULL, 'oli92@hotmail.com', NULL, '$2y$10$S7bkmSdEnd2cL9AYP6K/eeyewvTcctkbEQqJVKNRCDFT7JNSpH0bm', 'off', NULL, '2020-11-11 19:36:32', '2020-11-11 19:36:32', '2', 'default-avatar.jpg', '1'),
	(14, 'testetstet', NULL, 'oli88@hotmail.com', NULL, '$2y$10$qC3T/L8.SttkVmiaRJKth.NoDTXUrLeI8.TMtwpiKvJVfjx29kVKu', 'off', NULL, '2020-11-11 19:53:35', '2020-12-30 00:15:33', '2', '1609286466.jpg', '1'),
	(15, 'Ana test relation', NULL, 'relation@test.com', NULL, '$2y$10$7a.kLXhIKJ8RqQVLGXfrFOLTxarhLwf4QLLvzLDs/j/KRfbY75C9u', 'on', NULL, '2020-11-11 22:20:13', '2021-01-07 21:49:22', '2', 'default-avatar.jpg', '0'),
	(16, 'Ana test relation', NULL, 'hehe@test.com', NULL, '$2y$10$nSnjKiPQJA/ve5.k/7LeWuCEvkYiBJX0vsjDzpwK3EG0rmD3lXO5K', 'on', NULL, '2020-11-11 22:31:40', '2020-11-11 22:31:40', '2', 'default-avatar.jpg', '1'),
	(17, 'Ana test relation', NULL, 'hehe1@test.com', NULL, '$2y$10$4SCb9CXkxKvN/L9izsa3GONydHyh8qBEu94iRQVIc90W/4pIAWxky', 'on', NULL, '2020-11-11 22:33:26', '2020-11-11 22:33:26', '2', 'default-avatar.jpg', '1'),
	(18, 'ANa', '2020-11-14 20:05:41', 'oli90@hotmail.com', NULL, '$2y$10$2lS90Q0Poiytr/OGRhBNzO6hebXqwQkwawcsfeFjnYD4sEGVAlMHu', 'on', NULL, '2020-11-11 22:35:07', '2020-11-14 20:05:41', '1', 'default-avatar.jpg', '1'),
	(19, 'ANa', '2020-11-14 19:27:10', 'oli94@hotmail.com', NULL, '$2y$10$uYttsRZ94IGbchLM0knvHOcCB744cRkT/WSKaoC5yvwHJ0p4.8E2u', 'on', NULL, '2020-11-11 22:39:09', '2020-11-14 19:27:10', '1', 'default-avatar.jpg', '1'),
	(20, 'ANa', '2020-11-14 19:26:03', 'oli95@hotmail.com', NULL, '$2y$10$XQzkZ926EqIL6Gq97/fHLukMSJ6nEliXy1d468hC2hUqXt5d95z6.', 'on', NULL, '2020-11-11 22:39:47', '2020-11-14 19:26:03', '1', 'default-avatar.jpg', '1'),
	(21, 'Oliver', NULL, 'olivce@test.com', NULL, '$2y$10$.JGYCoQaUN/nK1Us1WP3BepAeoZBmRJI84eETrmbb/Jrlu8/sFmJC', 'off', NULL, '2020-11-11 22:54:24', '2020-12-29 22:20:58', '1', 'default-avatar.jpg', '1'),
	(22, 'dijana', NULL, 'diki@test.com', NULL, '$2y$10$BpLTasnGSER7BopMg15FLumEmmwNmYKKvg5HoNDB/3vQTeYlUmAUG', 'on', NULL, '2020-11-11 22:54:49', '2020-11-11 22:54:49', '1', 'default-avatar.jpg', '1'),
	(23, 'dijana', NULL, 'test@diki.com', NULL, '$2y$10$UWrwayvt1VVOH8PpFSsgTOoVTNaQh0/8RpD9QUdRf0dVSDlz7czO.', 'on', NULL, '2020-11-11 22:58:28', '2020-11-11 22:58:28', '1', 'default-avatar.jpg', '1'),
	(24, 'test1234', NULL, 'a.1mitrevska@hotmail.com', NULL, '$2y$10$/jur9I.ULzP0Hq7XX4b0rebwDldg6ZjNP46nzBjnkls0aFUnAsJWq', 'off', NULL, '2020-11-12 20:21:02', '2020-11-12 20:21:02', '1', 'default-avatar.jpg', '1'),
	(25, 'test12343', NULL, 'a.13mitrevska@hotmail.com', NULL, '$2y$10$QUfJ7jl11GoY/LQ0SXuVruEDCW/LjkNToN9x3WdRvxvlqv6TclmV.', 'off', NULL, '2020-11-12 20:21:39', '2020-11-12 20:21:39', '1', 'default-avatar.jpg', '1'),
	(26, 'fddf', NULL, 'dfdf@sdf.com', NULL, '$2y$10$iJiljhNWczjgsl8UbVMPjOcyV4gIJDvyXlnz4Rq.f0w3D.dPfr9BK', 'on', NULL, '2020-11-12 20:33:31', '2020-11-12 20:33:31', '1', 'default-avatar.jpg', '1'),
	(27, 'xvc', NULL, 'a1.1mitrevska@hotmail.com', NULL, '$2y$10$ZjAu2M7GETJkxlQrfSszg.9iMyF6v9q4clMB1jkjYbF43Wh3Q4HM2', 'off', NULL, '2020-11-12 20:35:06', '2020-11-12 20:35:06', '1', 'default-avatar.jpg', '1'),
	(28, 'Ana Mitrevska', NULL, 'a99.mitrevska@hotmail.com', NULL, '$2y$10$U6X/WpvFrmW2HdMEaPUHGuf.XwIx5bVecoaV.FntgAl3WKQUalS7K', 'off', NULL, '2020-11-12 22:31:38', '2020-11-12 22:31:38', '1', 'default-avatar.jpg', NULL),
	(29, 'Ana', NULL, 'atest.mitrevska@hotmail.com', NULL, '$2y$10$MBuyMrK07qnrEWr4HeOPSOAyhYMw6RwSI6UIuztwNOSdpdkqs0Fsq', 'on', NULL, '2020-11-14 20:47:29', '2020-11-14 20:47:29', '1', 'default-avatar.jpg', NULL),
	(30, 'Bile', NULL, 'bile@hotmail.com', NULL, '$2y$10$jayS8OFtb17CPGrjosAbIO7zCh8umSPrQwAnMDXZHcHiw2GdAqKbm', 'on', NULL, '2020-11-18 10:02:35', '2020-11-18 10:02:35', '1', 'default-avatar.jpg', NULL),
	(31, 'test1234', NULL, 'trtrt1w3@hotmail.com', NULL, '$2y$10$qyHyr7XOszmN0JhmydxqNOftZl28kjizSjuBcjdB.yRB0dzOhgsEm', 'on', NULL, '2020-11-18 10:11:05', '2020-11-18 10:11:05', '1', 'default-avatar.jpg', NULL),
	(32, 'wa wa', NULL, 'trtrt1ww3@hotmail.com', NULL, '$2y$10$DLRIqqru4cMIBSQTQqMYgeNb55Sckt32pQFGrdNIck1I9/XsWJKn.', 'on', NULL, '2020-11-18 10:13:27', '2020-11-18 10:13:27', '1', 'default-avatar.jpg', NULL),
	(33, 'Ana Mitrevska', NULL, 'a22.mitrevska@hotmail.com', NULL, '$2y$10$73JRIqTBGguVIamLWwaMQOTCoTFMdxyCdYOE3kq6e9m3.9PERtfvC', 'on', NULL, '2020-11-18 10:14:23', '2020-11-18 10:14:23', '1', 'default-avatar.jpg', NULL),
	(34, 'Test slika', NULL, 'test.1@hotmail.com', NULL, '$2y$10$KBerZnpwbGYLp6wjpPwyF.Ghd3yvJCb0DTZTuD00hwfkxZ3k11efW', 'on', NULL, '2020-12-26 20:16:52', '2020-12-26 20:16:52', '1', 'default-avatar.jpg', NULL),
	(35, 'Ana', NULL, 'trtrt11@hotmail.com', NULL, '$2y$10$ra3snHYS03rN.n.niNXLjOxeAgvGTi0w9HyGG0y9K.ET81hAhX.ha', 'on', NULL, '2020-12-26 20:17:23', '2020-12-26 20:17:23', '1', 'default-avatar.jpg', NULL),
	(36, 'Ana', NULL, 'a.mitrevskahhhhh@hotmail.com', NULL, '$2y$10$bEqzJHXb4awLz91KNUK.UOjg2qZAPYRA3TlxOidF/LEIevh57m01W', 'on', NULL, '2020-12-26 20:19:45', '2020-12-26 20:19:45', '1', 'default-avatar.jpg', NULL),
	(37, 'Ana', NULL, 'a.mitrevskahhhhhh@hotmail.com', NULL, '$2y$10$2VdXkwiW0kM/uUfBDt58neF6ohFk3p2taGRHOLDrcfE5Cr9Ko9g2e', 'on', NULL, '2020-12-26 20:22:57', '2020-12-26 20:22:57', '1', 'default-avatar.jpg', NULL),
	(38, 'Ana Test Slika', NULL, 'a.slika@hotmail.com', NULL, '$2y$10$YKvcLIUogwbxJwVWiAcGYuRH9qRA7s7zatH8hl7owqIuzTo.y.8ce', 'off', NULL, '2020-12-26 20:45:47', '2020-12-26 20:45:47', '1', 'default-avatar.jpg', NULL),
	(39, 'Ana Test Slika', NULL, 'a.slika1@hotmail.com', NULL, '$2y$10$Z5PoOpJDf/XiarSlFg1nOuWfg9A0QLymLKqSH9CbnAEnj681PFUlC', 'off', NULL, '2020-12-26 20:47:03', '2020-12-26 20:47:03', '1', 'default-avatar.jpg', NULL),
	(40, 'Ana', NULL, 'a1.mitrevska.slika@hotmail.com', NULL, '$2y$10$ntbFJr5eej1yIFdwCttD..VqWoB/.NC7jQjpQ4lQetnrkZnanPw/i', 'off', NULL, '2020-12-26 20:51:00', '2021-01-02 16:33:29', '1', '1609015860.jpg', '1'),
	(42, 'Ana', NULL, 'a1.slika@hotmail.com', NULL, '$2y$10$pVCKAZZWSdOajy.WDVKMuu.CVvW4YtL9oBhGSz9d3I6esHNH9q1DK', 'off', NULL, '2020-12-26 20:51:52', '2020-12-26 20:51:52', '1', '1609015912.jpg', NULL),
	(44, 'Ana', NULL, 'a1.slika5@hotmail.com', NULL, '$2y$10$4IHkz3OwqmJzWC6hQN8OY.M5igQBUu5ZVUlc2Z0A/DJBvQ8invm0e', 'off', NULL, '2020-12-26 20:59:52', '2020-12-26 20:59:52', '1', '1609016392.jpg', NULL),
	(45, 'Ana test promena', NULL, 'anapromena@hotmail.com', NULL, '$2y$10$FIV/lNRvT772ExJ.NvHiXu7bZup17.K315LOc62nMtxStR6rjXqky', 'on', NULL, '2021-01-02 23:39:24', '2021-01-02 23:39:24', '1', '1609630764.jpg', 'Active'),
	(46, 'test redirect', NULL, 'fr@tets.com', NULL, '$2y$10$T5ZiOB0GOareIuatodkRmeRsefw2H9MCg5rPEZ2S4fN3JuJaSgtCq', 'on', NULL, '2021-01-12 12:32:56', '2021-01-12 12:32:56', '1', 'default-avatar.jpg', '1'),
	(47, 'Ana Mitrevska', NULL, 'a.mitrevskaggg@hotmail.com', NULL, '$2y$10$vp4ndIuNizVrHHb1lVDvmOUQFPzH8IRfM54fjepnqKMfiaTC6TjNK', 'on', NULL, '2021-01-12 12:38:22', '2021-01-12 12:38:22', '1', 'default-avatar.jpg', '1'),
	(48, 'Ana test redirect', NULL, 'a.redirect@hotmail.com', NULL, '$2y$10$qYgeoiGuDUwHrlUtuGK4d.SkjkUWA7GNNdVPGf/WLe/t/584f8RR2', 'on', NULL, '2021-01-12 20:38:15', '2021-01-12 20:38:15', '1', 'default-avatar.jpg', '1'),
	(49, 'ANa2', NULL, 'a.555mitrevska@hotmail.com', NULL, '$2y$10$Jm3M8yl64tD7sHiTGAAMeuf6AHYnStJtR.Nfn.GcPDJ0dzbWNrlCC', 'on', NULL, '2021-01-12 20:39:48', '2021-01-12 20:39:48', '1', 'default-avatar.jpg', '1'),
	(50, 'Ana Mitrevska', NULL, 'a.gggmitrevska@hotmail.com', NULL, '$2y$10$Xs6V7PlkjjjSC5B1YB5dyO4qmapep7GQWQ5zfPTqK2Sg9wTpezeIu', 'on', NULL, '2021-01-12 21:02:50', '2021-01-12 21:02:50', '1', 'default-avatar.jpg', '1'),
	(51, 'Ana Mitrevska redirect', NULL, 'a.rrrmitrevska@hotmail.com', NULL, '$2y$10$2Lk/VvBeTkR0rH2RyRhjvOLsV7s89DRjI9dhSHBwgfjQ34ppEoLWa', 'on', NULL, '2021-01-12 21:30:49', '2021-01-12 21:30:49', '1', 'default-avatar.jpg', '1'),
	(52, 'Ana', NULL, 'test.redirect@test.com', NULL, '$2y$10$kj8xTKQwB5f5HBkzEqWerOyenxH7mIqJvnZWuu0YdZiNPox.Cl8TC', 'on', NULL, '2021-01-12 21:39:08', '2021-01-12 21:39:08', '1', 'default-avatar.jpg', '1'),
	(53, 'Ana', NULL, 'test.redirect1@hotmail.com', NULL, '$2y$10$yllhbnraIrzXz8ZhJRudR.zOQTo9POT.Mgse2EAD5.aAkE6Zt2S.e', 'on', NULL, '2021-01-12 21:40:58', '2021-01-12 21:40:58', '1', 'default-avatar.jpg', '1'),
	(54, 'Ana', NULL, 'test.redirect11@hotmail.com', NULL, '$2y$10$NDWRuooeP2OLIgVSezaCrOeMrcEd7WzMfw3TrRQAGiZcxp6c0q2BG', 'on', NULL, '2021-01-12 21:42:04', '2021-01-12 21:42:04', '1', 'default-avatar.jpg', '1'),
	(55, 'Ana', NULL, 'test.redirect21@hotmail.com', NULL, '$2y$10$gAOfnq5RlxmDkxPg4FO1/.41kSkj/w2Nnxcp1YaQzcWcOtA6mQyly', 'on', NULL, '2021-01-12 21:42:39', '2021-01-12 21:42:39', '1', 'default-avatar.jpg', '1'),
	(56, 'Ana', NULL, 'a44.mitrevska@hotmail.com', NULL, '$2y$10$7ci3.FdDWJmwawhQulV9n.aROyQGt9iZ5DxlhkwosUaLYz4Y2VhUS', 'on', NULL, '2021-01-12 21:44:28', '2021-01-12 21:44:28', '1', 'default-avatar.jpg', '1'),
	(57, 'Ana', NULL, 'a.mitrevska23@hotmail.com', NULL, '$2y$10$3o/YQOYGPUwUM9huvVE3kecdVVL8i9jW7m7Cr56L/POzGhuF08O6y', 'on', NULL, '2021-01-12 21:45:56', '2021-01-12 21:45:56', '1', '1610487955.jpg', '1'),
	(58, 'Ana', NULL, 'anatest@test.com', NULL, '$2y$10$Wvkrrkq.mIG9jQynJiaXe./RZLENDO3K0EA2bD1nquD.Hr5nFk006', 'on', NULL, '2021-01-12 21:55:04', '2021-01-12 21:55:04', '1', 'default-avatar.jpg', '1'),
	(59, 'Ana', NULL, 'a.mitrevskayyyyy@hotmail.com', NULL, '$2y$10$uNhO09DpvfD0iFhH1SSeSu2H2ne46z4aDosH5B7TQS1EhxC3vPOcK', 'on', NULL, '2021-01-12 21:57:30', '2021-01-12 21:57:30', '1', 'default-avatar.jpg', '1'),
	(60, 'Ana', NULL, 'a.mitrevskawaaa@hotmail.com', NULL, '$2y$10$4qg67yA16aOjQJGDW3D07.VbqcUSEjz7cD9WHEkNPXw1OYe9NvVV.', 'on', NULL, '2021-01-12 22:00:23', '2021-01-12 22:00:23', '1', 'default-avatar.jpg', '1'),
	(61, 'Ana', NULL, 'a.mitrevskatwsdc@hotmail.com', NULL, '$2y$10$ECbow4BYT6SPBzjYqOC0uO.npJpPgDsU1iW2a1pY7g04Ic./hHZtG', 'on', NULL, '2021-01-12 22:03:07', '2021-01-12 22:03:07', '1', 'default-avatar.jpg', '1'),
	(62, 'Ana Mitrevska', NULL, 'a1.mitrevskagh@hotmail.com', NULL, '$2y$10$euohp.c3cahaV3166PrtP.fL2hup6x5CNbP.Z9UOHuHKiqqWMNxzO', 'on', NULL, '2021-01-12 23:46:18', '2021-01-12 23:46:18', '1', 'default-avatar.jpg', '1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table Final_Project_DB.user_team_relations
CREATE TABLE IF NOT EXISTS `user_team_relations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `userId` bigint(20) NOT NULL,
  `teamId` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.user_team_relations: ~29 rows (approximately)
/*!40000 ALTER TABLE `user_team_relations` DISABLE KEYS */;
INSERT INTO `user_team_relations` (`id`, `created_at`, `updated_at`, `deleted_at`, `userId`, `teamId`) VALUES
	(1, '2020-12-26 14:22:16', '2021-01-13 16:24:40', '2021-01-13 16:24:40', 1, 1),
	(2, '2020-12-26 14:22:27', '2020-12-30 01:33:31', '2020-12-30 01:33:31', 4, 1),
	(3, '2020-12-26 20:16:52', '2020-12-26 20:16:52', NULL, 34, 15),
	(4, '2020-12-26 20:17:23', '2020-12-30 01:33:31', '2020-12-30 01:33:31', 35, 1),
	(5, '2020-12-26 20:19:45', '2020-12-30 01:33:31', '2020-12-30 01:33:31', 36, 1),
	(6, '2020-12-26 20:22:57', '2020-12-30 01:33:31', '2020-12-30 01:33:31', 37, 1),
	(7, '2020-12-26 20:45:47', '2020-12-30 01:33:31', '2020-12-30 01:33:31', 38, 1),
	(8, '2020-12-26 20:47:03', '2020-12-30 01:33:31', '2020-12-30 01:33:31', 39, 1),
	(9, '2020-12-26 20:59:52', '2020-12-30 01:33:31', '2020-12-30 01:33:31', 44, 1),
	(11, '2020-12-30 00:23:32', '2020-12-30 01:33:31', '2020-12-30 01:33:31', 4, 1),
	(12, '2021-01-02 11:21:16', '2021-01-02 11:21:16', NULL, 4, 2),
	(13, '2021-01-02 11:21:22', '2021-01-13 16:24:40', '2021-01-13 16:24:40', 1, 2),
	(16, '2021-01-02 15:25:04', '2021-01-02 15:25:04', NULL, 4, 2),
	(17, '2021-01-02 16:23:30', '2021-01-02 16:23:30', NULL, 2, 2),
	(18, '2021-01-02 16:24:01', '2021-01-02 16:24:01', NULL, 6, 2),
	(19, '2021-01-02 16:24:18', '2021-01-02 16:24:18', NULL, 2, 2),
	(20, '2021-01-02 16:24:50', '2021-01-02 16:24:50', NULL, 2, 2),
	(21, '2021-01-02 16:25:13', '2021-01-02 16:25:13', NULL, 2, 2),
	(23, '2021-01-02 16:29:17', '2021-01-02 16:29:17', NULL, 7, 2),
	(24, '2021-01-02 16:29:27', '2021-01-02 16:29:27', NULL, 8, 2),
	(25, '2021-01-02 23:39:24', '2021-01-02 23:39:24', NULL, 45, 6),
	(28, '2021-01-07 20:10:39', '2021-01-07 20:10:39', NULL, 44, 4),
	(29, '2021-01-12 12:32:56', '2021-01-12 12:32:56', NULL, 46, 7),
	(30, '2021-01-12 12:38:22', '2021-01-12 23:47:40', '2021-01-12 23:47:40', 47, 11),
	(31, '2021-01-12 20:38:15', '2021-01-12 20:38:15', NULL, 48, 7),
	(32, '2021-01-12 20:39:48', '2021-01-12 20:39:48', NULL, 49, 6),
	(33, '2021-01-12 21:02:50', '2021-01-12 21:02:50', NULL, 50, 10),
	(34, '2021-01-12 21:30:49', '2021-01-12 21:30:49', NULL, 51, 6),
	(35, '2021-01-12 21:39:08', '2021-01-12 23:47:40', '2021-01-12 23:47:40', 52, 11),
	(36, '2021-01-12 21:40:58', '2021-01-12 21:40:58', NULL, 53, 10),
	(37, '2021-01-12 21:42:04', '2021-01-12 21:42:04', NULL, 54, 9),
	(38, '2021-01-12 21:42:39', '2021-01-12 21:42:39', NULL, 55, 8),
	(39, '2021-01-12 21:44:28', '2021-01-12 23:47:40', '2021-01-12 23:47:40', 56, 11),
	(40, '2021-01-12 21:45:56', '2021-01-12 21:45:56', NULL, 57, 6),
	(41, '2021-01-12 21:55:04', '2021-01-12 23:47:40', '2021-01-12 23:47:40', 58, 11),
	(42, '2021-01-12 21:57:30', '2021-01-12 21:57:30', NULL, 59, 4),
	(43, '2021-01-12 22:00:23', '2021-01-12 22:00:23', NULL, 60, 4),
	(44, '2021-01-12 22:03:07', '2021-01-12 22:03:07', NULL, 61, 14),
	(45, '2021-01-12 23:46:18', '2021-01-12 23:46:18', NULL, 62, 10),
	(46, '2021-01-13 11:48:36', '2021-01-13 11:48:36', NULL, 9, 2);
/*!40000 ALTER TABLE `user_team_relations` ENABLE KEYS */;

-- Dumping structure for table Final_Project_DB.user_team_relations1
CREATE TABLE IF NOT EXISTS `user_team_relations1` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `userId` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `teamId` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.user_team_relations1: ~14 rows (approximately)
/*!40000 ALTER TABLE `user_team_relations1` DISABLE KEYS */;
INSERT INTO `user_team_relations1` (`id`, `created_at`, `updated_at`, `deleted_at`, `userId`, `teamId`) VALUES
	(2, '2020-11-11 22:39:47', '2020-11-11 22:39:47', NULL, '20', '3'),
	(12, '2020-11-12 22:31:38', '2020-11-12 22:31:38', NULL, '28', '1'),
	(13, '2020-11-12 23:12:35', '2020-11-12 23:12:35', NULL, '2', '1'),
	(19, '2020-11-14 19:23:57', '2020-11-14 20:05:41', '2020-11-14 20:05:41', '18', '2'),
	(20, '2020-11-14 19:24:32', '2020-11-14 19:24:32', NULL, '19', '2'),
	(21, '2020-11-14 19:42:15', '2020-11-14 19:46:13', '2020-11-14 19:46:13', '4', '5'),
	(22, '2020-11-14 19:42:20', '2020-11-14 19:46:13', '2020-11-14 19:46:13', '23', '5'),
	(23, '2020-11-14 20:47:29', '2020-11-14 20:47:29', NULL, '29', '2'),
	(24, '2020-11-18 10:02:35', '2020-11-18 10:02:35', NULL, '30', '1'),
	(25, '2020-11-18 10:11:05', '2020-11-18 10:11:05', NULL, '31', '1'),
	(26, '2020-11-18 10:13:27', '2020-11-18 10:13:27', NULL, '32', '1'),
	(27, '2020-11-18 10:14:23', '2020-11-18 10:14:23', NULL, '33', '1'),
	(28, '2020-11-18 20:38:27', '2020-11-18 20:38:27', NULL, '4', '2'),
	(29, '2020-11-18 20:38:31', '2020-11-18 20:38:31', NULL, '5', '2'),
	(30, '2020-11-18 20:38:37', '2020-11-18 20:38:37', NULL, '25', '2');
/*!40000 ALTER TABLE `user_team_relations1` ENABLE KEYS */;

-- Dumping structure for table Final_Project_DB.user_team_relations2
CREATE TABLE IF NOT EXISTS `user_team_relations2` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `userId` bigint(20) NOT NULL,
  `teamId` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table Final_Project_DB.user_team_relations2: ~15 rows (approximately)
/*!40000 ALTER TABLE `user_team_relations2` DISABLE KEYS */;
INSERT INTO `user_team_relations2` (`id`, `created_at`, `updated_at`, `deleted_at`, `userId`, `teamId`) VALUES
	(2, '2020-11-11 22:39:47', '2020-11-11 22:39:47', NULL, 20, 3),
	(12, '2020-11-12 22:31:38', '2020-11-12 22:31:38', NULL, 28, 1),
	(13, '2020-11-12 23:12:35', '2020-11-12 23:12:35', NULL, 2, 1),
	(19, '2020-11-14 19:23:57', '2020-11-14 20:05:41', '2020-11-14 20:05:41', 18, 2),
	(20, '2020-11-14 19:24:32', '2020-11-14 19:24:32', NULL, 19, 2),
	(21, '2020-11-14 19:42:15', '2020-11-14 19:46:13', '2020-11-14 19:46:13', 4, 5),
	(22, '2020-11-14 19:42:20', '2020-11-14 19:46:13', '2020-11-14 19:46:13', 23, 5),
	(23, '2020-11-14 20:47:29', '2020-11-14 20:47:29', NULL, 29, 2),
	(24, '2020-11-18 10:02:35', '2020-11-18 10:02:35', NULL, 30, 1),
	(25, '2020-11-18 10:11:05', '2020-11-18 10:11:05', NULL, 31, 1),
	(26, '2020-11-18 10:13:27', '2020-11-18 10:13:27', NULL, 32, 1),
	(27, '2020-11-18 10:14:23', '2020-11-18 10:14:23', NULL, 33, 1),
	(28, '2020-11-18 20:38:27', '2020-11-18 20:38:27', NULL, 4, 2),
	(29, '2020-11-18 20:38:31', '2020-11-18 20:38:31', NULL, 5, 2),
	(30, '2020-11-18 20:38:37', '2020-11-18 20:38:37', NULL, 25, 2),
	(31, '2020-11-24 19:38:07', '2020-11-24 19:38:07', NULL, 13, 2),
	(32, '2020-11-24 19:38:13', '2020-11-24 19:38:13', NULL, 1, 2);
/*!40000 ALTER TABLE `user_team_relations2` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
