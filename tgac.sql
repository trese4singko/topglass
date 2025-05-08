-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 02:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgac`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `username` varchar(255) NOT NULL,
  `is_viewed` tinyint(1) DEFAULT 0,
  `branch` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `action`, `item_id`, `description`, `timestamp`, `username`, `is_viewed`, `branch`) VALUES
(62, 'Remove Item', 39, 'Removed item \'cxvxc\' (ID: 39) from Taguig Products', '2025-04-28 07:03:29', 'admin', 1, NULL),
(63, 'Login', NULL, '', '2025-04-28 07:12:36', 'admin', 1, NULL),
(64, 'Login', NULL, '', '2025-04-28 07:14:17', 'admin', 1, NULL),
(65, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 07:19:52', 'admin', 1, NULL),
(66, 'Add Item', 40, 'Added new product: bcvb (cvbcvb) from Add Products Section (Taguig)', '2025-04-28 08:02:56', 'admin', 1, NULL),
(67, 'Remove Item', 40, 'Removed item \'bcvb\' (ID: 40) from Taguig Products', '2025-04-28 08:12:16', 'admin', 1, NULL),
(68, 'Update Item', 31, 'Updated product \'Hand Grip\' (ID: 31) with new details: Size: medium, Price: 1, Quantity: 980, Category: metal, Status: in-stock', '2025-04-28 08:22:51', 'admin', 1, NULL),
(69, 'Update Item', 31, 'Updated product \'Metal Pipe\' (ID: 31) on Taguig Edit Product', '2025-04-28 08:24:48', 'admin', 1, NULL),
(70, 'View Item', 30, 'Viewed product \'Pull-Up Bar\' (ID: 30)', '2025-04-28 08:45:10', 'admin', 1, NULL),
(71, 'View Item', 30, 'Viewed product \'Pull-Up Bar\' (ID: 30)', '2025-04-28 08:45:22', 'admin', 1, NULL),
(72, 'View Item', 30, 'Viewed product \'Pull-Up Bar\' (ID: 30)', '2025-04-28 08:45:22', 'admin', 1, NULL),
(73, 'View Item', 30, 'Viewed product \'Pull-Up Bar\' (ID: 30)', '2025-04-28 08:45:23', 'admin', 1, NULL),
(74, 'View Item', 30, 'Viewed product \'Pull-Up Bar\' (ID: 30)', '2025-04-28 08:45:23', 'admin', 1, NULL),
(75, 'View Item', 30, 'Viewed product \'Pull-Up Bar\' (ID: 30)', '2025-04-28 08:45:32', 'admin', 1, NULL),
(76, 'View Item', 30, 'Viewed product \'Pull-Up Bar\' (ID: 30)', '2025-04-28 08:53:44', 'admin', 1, NULL),
(77, 'View Item on View (Product Table Taguig)', 31, 'Viewed product \'Metal Pipe\' (ID: 31)', '2025-04-28 08:56:22', 'admin', 1, NULL),
(78, 'View Item', 31, 'Viewed product \'Metal Pipe\' (ID: 31) on View Item (Product Table Taguig)', '2025-04-28 08:57:47', 'admin', 1, NULL),
(79, 'Release Item', NULL, 'Released product \'screw\' to customer \'louis\' (Quantity: 50, Total Price: ₱10000)', '2025-04-28 10:12:48', 'admin', 1, NULL),
(80, 'Release Item', NULL, 'Released product \'screw\' to customer \'rizzy\' (Quantity: 10, Total Price: ₱2000)', '2025-04-28 10:16:40', 'admin', 1, NULL),
(81, 'Add Item', 41, 'Added new product: cvbcvb (12312) from Add Products Section (Taguig)', '2025-04-28 10:36:37', 'admin', 1, NULL),
(82, 'Remove Item', 41, 'Removed item \'cvbcvb\' (ID: 41) from Taguig Products', '2025-04-28 10:37:01', 'admin', 1, NULL),
(83, 'Update Item', 35, 'Updated product \'Metal Pipe\' (ID: 35) on Taguig Edit Product', '2025-04-28 10:37:27', 'admin', 1, NULL),
(84, 'View Item', 35, 'Viewed product \'Metal Pipe\' (ID: 35) on View Item (Product Table Taguig)', '2025-04-28 10:39:30', 'admin', 1, NULL),
(85, 'View Item', 30, 'Viewed product \'Pull-Up Bar\' (ID: 30) on View Item (Product Table Taguig)', '2025-04-28 10:39:48', 'admin', 1, NULL),
(86, 'View Item', 30, 'Viewed product \'Pull-Up Bar\' (ID: 30) on View Item (Product Table Taguig)', '2025-04-28 10:39:49', 'admin', 1, NULL),
(87, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 19:58:23', 'admin', 1, NULL),
(88, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 20:02:40', 'admin', 1, NULL),
(89, 'Login', NULL, 'User  adminmheg logged in successfully.', '2025-04-28 20:02:58', 'adminmheg', 1, NULL),
(90, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 20:12:35', 'admin', 1, NULL),
(91, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 20:21:30', 'admin', 1, NULL),
(92, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 20:24:06', 'admin', 1, NULL),
(93, 'Login Attempt Failed', NULL, 'Invalid password for user tggjosh', '2025-04-28 20:27:35', 'tggjosh', 1, NULL),
(94, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 20:27:42', 'admin', 1, NULL),
(95, 'Login', NULL, 'User  tggjosh logged in successfully.', '2025-04-28 20:28:18', 'tggjosh', 1, NULL),
(96, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 20:28:40', 'admin', 1, NULL),
(97, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 20:30:41', 'joshtgg', 1, NULL),
(98, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-04-28 20:30:52', 'admin', 1, NULL),
(99, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 20:31:02', 'admin', 1, NULL),
(100, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 20:32:17', 'joshtgg', 1, NULL),
(101, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 20:32:37', 'admin', 1, NULL),
(102, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 20:35:05', 'joshtgg', 1, NULL),
(103, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 20:35:20', 'joshtgg', 1, NULL),
(104, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 20:35:31', 'joshtgg', 1, NULL),
(105, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 20:35:45', 'joshtgg', 1, NULL),
(106, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 20:36:55', 'joshtgg', 1, NULL),
(107, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 20:37:21', 'joshtgg', 1, NULL),
(108, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 20:37:36', 'admin', 1, NULL),
(109, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 20:37:37', 'joshtgg', 1, NULL),
(110, 'View Customer', NULL, 'Viewed customer: ', '2025-04-28 20:45:27', 'admin', 1, NULL),
(111, 'View Customer', NULL, 'Viewed customer: ', '2025-04-28 20:47:33', 'admin', 1, NULL),
(112, 'View Customer', NULL, 'Viewed customer: ', '2025-04-28 20:47:40', 'admin', 1, NULL),
(113, 'View Customer', NULL, 'Viewed customer: ', '2025-04-28 20:48:18', 'admin', 1, NULL),
(114, 'View Customer', NULL, 'Viewed customer: ', '2025-04-28 20:48:28', 'admin', 1, NULL),
(115, 'View Customer', 39, 'Viewed customer: screw', '2025-04-28 20:55:20', 'admin', 1, NULL),
(116, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 20:56:07', 'admin', 1, NULL),
(117, 'View Customer', 35, 'Viewed customer: a', '2025-04-28 21:09:12', 'admin', 1, NULL),
(118, 'View Customer', 35, 'Viewed customer: a', '2025-04-28 21:09:14', 'admin', 1, NULL),
(119, 'View Customer', 13, 'Viewed Release Item: pako', '2025-04-28 21:09:44', 'admin', 1, NULL),
(120, 'View Customer', 13, 'Viewed Release Item: pako', '2025-04-28 21:10:30', 'admin', 1, NULL),
(121, 'View Release Item', 12, 'Viewed Release Item: pako', '2025-04-28 21:11:53', 'admin', 1, NULL),
(122, 'View Release Item', 12, 'Viewed Release Item: pako', '2025-04-28 21:11:54', 'admin', 1, NULL),
(123, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 21:35:44', 'joshtgg', 1, NULL),
(124, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 21:36:07', 'joshtgg', 1, NULL),
(125, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 21:36:33', 'joshtgg', 1, NULL),
(126, 'View Customer', 58, 'Viewed Release Item: rizzy', '2025-04-28 21:38:37', 'admin', 1, NULL),
(127, 'View Customer', 58, 'Viewed Release Item: rizzy', '2025-04-28 21:38:38', 'admin', 1, NULL),
(128, 'View Customer', 57, 'Viewed Release Item: louis', '2025-04-28 21:38:50', 'admin', 1, NULL),
(129, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 21:40:01', 'joshtgg', 1, NULL),
(130, 'View Customer', 58, 'Viewed Release Item: rizzy', '2025-04-28 21:42:13', 'admin', 1, NULL),
(131, 'View Customer', 58, 'Viewed Release Item: rizzy', '2025-04-28 21:42:13', 'admin', 1, NULL),
(132, 'View Cusstomer', 58, 'Viewed Release Item: rizzy', '2025-04-28 21:43:29', 'admin', 1, NULL),
(133, 'View Customer', 58, 'Viewed Release Item: rizzy', '2025-04-28 21:44:39', 'admin', 1, NULL),
(134, 'View Customer', 12, 'juvers', '2025-04-28 21:45:40', 'admin', 1, NULL),
(135, 'View Customer', 57, 'louis', '2025-04-28 21:45:48', 'admin', 1, NULL),
(136, 'View Customer', 55, '', '2025-04-28 21:46:20', 'admin', 1, NULL),
(137, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 21:47:15', 'admin', 1, NULL),
(138, 'View Customer', 58, '', '2025-04-28 21:47:19', 'admin', 1, NULL),
(139, 'View Customer', 58, '', '2025-04-28 21:48:02', 'admin', 1, NULL),
(140, 'View Customer', 58, '', '2025-04-28 21:48:27', 'admin', 1, NULL),
(141, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 21:48:45', 'joshtgg', 1, NULL),
(142, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 21:48:55', 'joshtgg', 1, NULL),
(143, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-04-28 21:49:10', 'admin', 1, NULL),
(144, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 21:49:19', 'admin', 1, NULL),
(145, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 21:49:22', 'joshtgg', 1, NULL),
(146, 'Login', NULL, 'User  MKTDexter logged in successfully.', '2025-04-28 21:51:51', 'MKTDexter', 1, NULL),
(147, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 21:52:58', 'admin', 1, NULL),
(148, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 21:53:00', 'admin', 1, NULL),
(149, 'Login Attempt Failed', NULL, 'Invalid password for user joshtgg', '2025-04-28 21:53:57', 'joshtgg', 1, NULL),
(150, 'Login', NULL, 'User  joshtgg logged in successfully.', '2025-04-28 21:54:07', 'joshtgg', 1, NULL),
(151, 'Login', NULL, 'User  MKTDexter logged in successfully.', '2025-04-28 21:56:12', 'MKTDexter', 1, NULL),
(152, 'Login', NULL, 'User  MKTDexter logged in successfully.', '2025-04-28 21:57:30', 'MKTDexter', 1, NULL),
(153, 'Login', NULL, 'User  admin logged in successfully.', '2025-04-28 22:00:17', 'admin', 1, NULL),
(154, 'Login', NULL, 'User   MKTDexter logged in successfully.', '2025-04-28 22:08:31', 'MKTDexter', 1, NULL),
(155, 'Login', NULL, 'Makati user MKTDexter logged in.', '2025-04-28 22:08:31', 'MKTDexter', 1, NULL),
(156, 'Login', NULL, 'User   MKTDexter logged in successfully.', '2025-04-28 22:13:19', 'MKTDexter', 1, NULL),
(157, 'Login', NULL, 'MKTDexter Login as Employee at 2025-04-29 07:13:19', '2025-04-28 22:13:19', 'MKTDexter', 1, NULL),
(158, 'Login', NULL, 'User  MKTDexter logged in successfully.', '2025-04-28 22:16:24', 'MKTDexter', 1, NULL),
(159, 'Login', NULL, 'MKTDexter Login as Employee at 2025-04-29 07:16:24', '2025-04-28 22:16:24', 'MKTDexter', 1, NULL),
(160, 'Login', NULL, 'User  MKTDexter logged in successfully.', '2025-04-28 22:19:25', 'MKTDexter', 1, NULL),
(161, 'Login', NULL, 'MKTDexter logged in at 2025-04-29 07:19:25', '2025-04-28 22:19:25', 'MKTDexter', 1, NULL),
(162, 'Login', NULL, 'User   MKTDexter logged in successfully.', '2025-04-28 22:23:14', 'MKTDexter', 1, NULL),
(163, 'Login', NULL, 'MKTDexter logged in at 2025-04-29 07:23:14', '2025-04-28 22:23:14', 'MKTDexter', 1, NULL),
(164, 'Login', NULL, 'User   MKTDexter logged in successfully.', '2025-04-28 22:24:12', 'MKTDexter', 1, NULL),
(165, 'Login', NULL, 'MKTDexter logged in at 2025-04-29 07:24:12', '2025-04-28 22:24:12', 'MKTDexter', 1, NULL),
(166, 'Login', NULL, 'User   MKTDexter logged in successfully.', '2025-04-28 22:28:16', 'MKTDexter', 1, NULL),
(167, 'Login', NULL, 'MKTDexter logged in at 2025-04-29 07:28:16', '2025-04-28 22:28:16', 'MKTDexter', 1, NULL),
(168, 'Login', NULL, 'User  MKTDexter logged in successfully.', '2025-04-28 22:29:42', 'MKTDexter', 1, NULL),
(169, 'Login', NULL, 'MKTDexter logged in at 2025-04-29 07:29:42', '2025-04-28 22:29:42', 'MKTDexter', 1, NULL),
(170, 'Login', NULL, 'User  MKTDexter logged in successfully.', '2025-04-28 22:33:30', 'MKTDexter', 1, NULL),
(171, 'Login', NULL, 'MKTDexter Login as Employee at 2025-04-29 07:33:30', '2025-04-28 22:33:30', 'MKTDexter', 1, NULL),
(172, 'Login', NULL, 'User  MKTDexter logged in successfully.', '2025-04-28 22:36:05', 'MKTDexter', 1, NULL),
(173, 'Login', NULL, 'Makati user MKTDexter logged in.', '2025-04-28 22:36:05', 'MKTDexter', 1, NULL),
(174, 'Login', NULL, 'User  MKTDexter logged in successfully.', '2025-04-28 22:36:53', 'MKTDexter', 1, NULL),
(175, 'Login', NULL, 'Makati user MKTDexter logged in.', '2025-04-28 22:36:53', 'MKTDexter', 1, NULL),
(176, 'Login Attempt Failed', NULL, 'Invalid password for user MKTdexter', '2025-04-28 22:44:55', 'MKTdexter', 1, NULL),
(177, 'Login', NULL, 'Makati user MKTDexter logged in.', '2025-04-28 22:45:03', 'MKTDexter', 1, NULL),
(178, 'Login', NULL, 'Makati user MKTDexter logged in Makati Branch', '2025-04-28 22:45:44', 'MKTDexter', 1, NULL),
(179, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-04-28 22:48:59', 'admin', 1, NULL),
(180, 'Login', NULL, 'Makati user PPGDexter logged in Pampanga Branch', '2025-04-28 22:52:56', 'PPGDexter', 1, NULL),
(181, 'Login', NULL, 'Taguig user verstg logged in Taguig Branch', '2025-04-28 22:56:58', 'verstg', 1, NULL),
(182, 'Login', NULL, 'Taguig user admin logged in Taguig Branch', '2025-04-28 23:43:22', 'admin', 1, NULL),
(183, 'Login Attempt Failed', NULL, 'User  juversadmin not found', '2025-04-28 23:44:50', 'juversadmin', 1, NULL),
(184, 'Login', NULL, 'Taguig user admin logged in Taguig Branch', '2025-04-28 23:45:04', 'admin', 1, NULL),
(185, 'Login', NULL, 'Taguig user admin logged in Taguig Branch', '2025-04-28 23:45:42', 'admin', 1, NULL),
(186, 'Login', NULL, 'Makati user mktvers logged in Makati Branch', '2025-04-29 00:01:36', 'mktvers', 1, NULL),
(187, 'Login Attempt Failed', NULL, 'User  ppgadmin not found', '2025-04-29 00:26:23', 'ppgadmin', 1, NULL),
(188, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-04-29 00:26:27', 'admin', 1, NULL),
(189, 'Login', NULL, 'Makati user mktvers logged in Makati Branch', '2025-04-29 00:26:53', 'mktvers', 1, NULL),
(190, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-04-29 00:27:07', 'admin', 1, NULL),
(191, 'Login', NULL, 'Makati user mktvers logged in Makati Branch', '2025-04-29 00:31:46', 'mktvers', 1, NULL),
(192, 'Login', NULL, 'Makati user mktvers logged in Makati Branch', '2025-04-29 00:33:11', 'mktvers', 1, NULL),
(193, 'Login', NULL, 'Makati user mktvers logged in Makati Branch', '2025-04-29 00:44:26', 'mktvers', 1, NULL),
(194, 'Login', NULL, 'Makati user mktvers logged in Makati Branch', '2025-04-29 00:46:51', 'mktvers', 1, NULL),
(195, 'Login', NULL, 'Pampanga user ppgvers logged in Pampanga Branch', '2025-04-29 00:51:07', 'ppgvers', 1, NULL),
(196, 'Login', NULL, 'Pampanga user ppgvers logged in Pampanga Branch', '2025-04-29 01:16:12', 'ppgvers', 1, NULL),
(197, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-29 23:16:49', 'admin', 1, NULL),
(198, 'Login', NULL, 'Makati user MKTDexter logged in Makati Branch', '2025-04-29 23:18:35', 'MKTDexter', 1, NULL),
(199, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 00:20:35', 'MKTDexter', 1, NULL),
(200, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 00:20:44', 'MKTDexter', 1, NULL),
(201, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 00:22:21', 'MKTDexter', 1, NULL),
(202, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 00:47:47', 'MKTDexter', 1, NULL),
(203, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 00:51:40', 'MKTDexter', 1, NULL),
(204, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 00:52:46', 'MKTDexter', 1, NULL),
(205, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 00:54:34', 'MKTDexter', 1, NULL),
(206, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 00:55:12', 'MKTDexter', 1, NULL),
(207, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 00:56:15', 'MKTDexter', 1, NULL),
(208, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 00:59:36', 'MKTDexter', 1, NULL),
(209, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 01:07:07', 'MKTDexter', 1, NULL),
(210, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 01:11:15', 'MKTDexter', 1, NULL),
(211, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 01:27:25', 'MKTDexter', 1, NULL),
(212, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 01:28:28', 'MKTDexter', 1, NULL),
(213, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 01:31:50', 'MKTDexter', 1, NULL),
(214, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 01:33:55', 'MKTDexter', 1, NULL),
(215, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 01:38:20', 'MKTDexter', 1, NULL),
(216, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 01:39:14', 'MKTDexter', 1, NULL),
(217, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 01:51:24', 'MKTDexter', 1, NULL),
(218, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 01:54:01', 'MKTDexter', 1, NULL),
(219, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 02:12:50', 'MKTDexter', 1, NULL),
(220, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 02:23:12', 'MKTDexter', 1, NULL),
(221, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 02:23:19', 'MKTDexter', 1, NULL),
(222, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 02:23:59', 'MKTDexter', 1, NULL),
(223, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 02:24:16', 'MKTDexter', 1, NULL),
(224, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 02:45:37', 'MKTDexter', 1, NULL),
(225, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 02:50:18', 'MKTDexter', 1, NULL),
(226, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 02:51:12', 'MKTDexter', 1, NULL),
(227, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 02:53:09', 'MKTDexter', 1, NULL),
(228, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 02:56:50', 'MKTDexter', 1, NULL),
(229, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 03:00:42', 'MKTDexter', 1, NULL),
(230, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 03:01:23', 'MKTDexter', 1, NULL),
(231, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 03:06:04', 'MKTDexter', 1, NULL),
(232, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 03:08:14', 'MKTDexter', 1, NULL),
(233, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 03:57:26', 'MKTDexter', 1, NULL),
(234, 'Login Attempt Failed', NULL, 'User   MKTDexter not found', '2025-04-30 04:10:58', ' MKTDexter', 1, NULL),
(235, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 04:11:03', 'MKTDexter', 1, NULL),
(236, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 04:14:54', 'MKTDexter', 1, NULL),
(237, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 04:19:48', 'MKTDexter', 1, NULL),
(238, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 04:30:27', 'MKTDexter', 1, NULL),
(239, 'Login', NULL, 'Makati user MKTDexter has logged in Makati Branch', '2025-04-30 05:16:58', 'MKTDexter', 1, NULL),
(240, 'View Item', 2, 'Viewed product \'Ashape\' (ID: 2) on View Item (Product Table Makati)', '2025-04-30 06:02:21', 'MKTDexter', 1, NULL),
(241, 'View Item', 2, 'Viewed product \'Ashape\' (ID: 2) on View Item (Product Table Makati)', '2025-04-30 06:03:02', 'MKTDexter', 1, NULL),
(242, 'View Customer', 3, '', '2025-04-30 06:58:51', 'MKTDexter', 1, NULL),
(243, 'View Customer', 3, '', '2025-04-30 06:59:13', 'MKTDexter', 1, NULL),
(244, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 07:01:11', 'MKTDexter', 1, NULL),
(245, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 07:28:23', 'admin', 1, NULL),
(246, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-04-30 07:36:39', 'PPGDexter', 1, NULL),
(247, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-04-30 08:22:06', 'PPGDexter', 1, NULL),
(248, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-04-30 15:33:31', 'PPGDexter', 1, NULL),
(249, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 15:33:57', 'MKTDexter', 1, NULL),
(250, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 15:38:43', 'admin', 1, NULL),
(251, 'Login Attempt Failed', NULL, 'Invalid password for user verstg', '2025-04-30 15:39:09', 'verstg', 1, NULL),
(252, 'Login Attempt Failed', NULL, 'Invalid password for user verstg', '2025-04-30 15:39:42', 'verstg', 1, NULL),
(253, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-04-30 15:39:53', 'joshtgg', 1, NULL),
(254, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 15:58:18', 'admin', 1, NULL),
(255, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-04-30 16:04:52', 'admin', 1, NULL),
(256, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 16:04:55', 'admin', 1, NULL),
(257, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-04-30 16:05:27', 'joshtgg', 1, NULL),
(258, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 16:08:57', 'admin', 1, NULL),
(259, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 16:09:23', 'admin', 1, NULL),
(260, 'Login Attempt Failed', NULL, 'User  joshtg not found', '2025-04-30 16:09:38', 'joshtg', 1, NULL),
(261, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-04-30 16:09:45', 'joshtgg', 1, NULL),
(262, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-04-30 16:13:01', 'joshtgg', 1, NULL),
(263, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 16:22:08', 'admin', 1, NULL),
(264, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-04-30 16:22:42', 'joshtgg', 1, NULL),
(265, 'Login Attempt Failed', NULL, 'Invalid password for user verstg', '2025-04-30 16:22:42', 'verstg', 1, NULL),
(266, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-04-30 16:22:47', 'joshtgg', 1, NULL),
(267, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 16:22:59', 'admin', 1, NULL),
(268, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-04-30 16:40:45', 'joshtgg', 1, NULL),
(269, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 16:43:13', 'admin', 1, NULL),
(270, 'Login Attempt Failed', NULL, 'Invalid password for user joshtgg', '2025-04-30 16:51:49', 'joshtgg', 1, NULL),
(271, 'Login Attempt Failed', NULL, 'Invalid password for user joshtgg', '2025-04-30 16:51:57', 'joshtgg', 1, NULL),
(272, 'Login Attempt Failed', NULL, 'Invalid password for user joshtgg', '2025-04-30 16:52:36', 'joshtgg', 1, NULL),
(273, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-04-30 16:52:58', 'joshtgg', 1, NULL),
(274, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 17:11:51', 'admin', 1, NULL),
(275, 'Add Item', 44, 'Added new product: window (large) from Add Products Section (Taguig)', '2025-04-30 17:19:19', 'admin', 1, NULL),
(276, 'Release Item', NULL, 'Released product \'window\' to customer \'VERS\' (Quantity: 2, Total Price: ₱24624)', '2025-04-30 17:22:13', 'admin', 1, NULL),
(277, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 17:22:25', 'MKTDexter', 1, NULL),
(278, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-04-30 17:22:50', 'admin', 1, NULL),
(279, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 17:22:57', 'admin', 1, NULL),
(280, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 17:23:37', 'admin', 1, NULL),
(281, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 17:23:59', 'admin', 1, NULL),
(282, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-04-30 17:24:58', 'joshtgg', 1, NULL),
(283, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 17:25:10', 'admin', 1, NULL),
(284, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 17:25:54', 'admin', 1, NULL),
(285, 'Update Item', 30, 'Updated product \'Pull Bar\' (ID: 30) on Taguig Edit Product', '2025-04-30 17:29:35', 'admin', 1, NULL),
(286, 'Release Item', NULL, 'Released product \'Metal Pipe\' to customer \'123123\' (Quantity: 500, Total Price: ₱1606561500)', '2025-04-30 17:30:51', 'admin', 1, NULL),
(287, 'Update Item', 31, 'Updated product \'Metal Pipe\' (ID: 31) on Taguig Edit Product', '2025-04-30 17:31:05', 'admin', 1, NULL),
(288, 'Remove Item', 30, 'Removed item \'Pull Bar\' (ID: 30) from Taguig Products', '2025-04-30 17:43:46', 'admin', 1, NULL),
(289, 'Login', NULL, 'Pampanga user ppgvers has logged in Pampanga Branch', '2025-04-30 18:13:34', 'ppgvers', 1, NULL),
(290, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 18:17:43', 'admin', 1, NULL),
(291, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 18:18:02', 'MKTDexter', 1, NULL),
(292, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 18:22:42', 'admin', 1, NULL),
(293, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-04-30 18:24:51', 'MKTDexter', 1, NULL),
(294, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 18:28:32', 'admin', 1, NULL),
(295, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-04-30 19:45:34', 'admin', 1, NULL),
(296, 'Login', NULL, 'Super Admin user admin has logged in', '2025-04-30 19:45:37', 'admin', 1, NULL),
(297, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-04-30 21:18:03', 'joshtgg', 1, NULL),
(298, 'Update Item', 44, 'Updated product \'wind\' (ID: 44) on Taguig Edit Product', '2025-04-30 21:30:37', 'joshtgg', 1, NULL),
(299, 'Update Item', 44, 'Updated product \'window\' (ID: 44) on Taguig Edit Product', '2025-04-30 21:33:44', 'joshtgg', 1, NULL),
(300, 'View Item', 44, 'Viewed product \'window\' (ID: 44) on View Item (Product Table Taguig)', '2025-04-30 21:35:46', 'joshtgg', 1, NULL),
(301, 'View Item', 44, 'Viewed product \'window\' (ID: 44) on View Item (Product Table Taguig)', '2025-04-30 21:36:03', 'joshtgg', 1, NULL),
(302, 'Remove Item', 45, 'Removed item \'piopio\' (ID: 45) from Taguig Products', '2025-04-30 21:39:03', 'joshtgg', 1, NULL),
(303, 'Release Item', NULL, 'Released product \'e\' to customer \'lerio\' (Quantity: 20, Total Price: ₱20)', '2025-04-30 21:54:41', 'joshtgg', 1, NULL),
(304, 'Release Item', NULL, 'Released product \'vbnvbn\' to customer \'mheg\' (Quantity: 1231, Total Price: ₱15156072)', '2025-04-30 22:01:34', 'joshtgg', 1, NULL),
(305, 'Release Item', NULL, 'Released product \'screw\' to customer \'dexter\' (Quantity: 20, Total Price: ₱4000)', '2025-04-30 22:11:47', 'joshtgg', 1, NULL),
(306, 'View Customer', 63, '', '2025-04-30 22:28:33', 'joshtgg', 1, NULL),
(307, 'View Customer', 0, '', '2025-04-30 22:29:59', 'joshtgg', 1, NULL),
(308, 'View Customer', 0, '', '2025-04-30 22:31:41', 'joshtgg', 1, NULL),
(309, 'View Customer', 63, 'Viewed customer \'dexter\' (ID: 63) with order ID \'63\' at Release Records (Taguig)', '2025-04-30 22:35:26', 'joshtgg', 1, NULL),
(310, 'View Customer', 63, 'Viewed customer \'dexter\' (ID: 63) with order ID \'63\' at Release Records (Taguig)', '2025-04-30 22:36:27', 'joshtgg', 1, NULL),
(311, 'Delete Order Item', 10, 'Deleted order items for order ID \'10\'', '2025-04-30 22:55:28', 'joshtgg', 1, NULL),
(312, 'Delete Order Item', NULL, NULL, '2025-04-30 22:56:54', 'joshtgg', 1, NULL),
(313, 'Delete Order Item', NULL, 'Deleted order items for order ID \'15\'', '2025-04-30 22:58:34', 'joshtgg', 1, NULL),
(314, 'Delete Order Item', NULL, 'Deleted order items for order ID \'12\'', '2025-04-30 23:00:05', 'joshtgg', 1, NULL),
(315, 'Delete Order Item', NULL, 'Deleted order items for order ID \'\'', '2025-04-30 23:00:35', 'joshtgg', 1, NULL),
(316, 'Delete Order Item', 13, 'Deleted order items for order ID \'13\' (Customer: \'cherwin\', Product: \'pako\')', '2025-04-30 23:02:47', 'joshtgg', 1, NULL),
(317, 'Delete Order Item', 19, 'Deleted order items for order ID \'19\' (Customer: \'juvers\', Product: \'pako in Taguig Release Records\')', '2025-04-30 23:05:05', 'joshtgg', 1, NULL),
(318, 'Update Item', 44, 'Updated product \'wind\' (ID: 44) on Taguig Edit Product', '2025-04-30 23:34:05', 'joshtgg', 1, NULL),
(319, 'View Item', 31, 'Viewed product \'Metal Pipe\' (ID: 31) on View Item (Product Table Taguig)', '2025-04-30 23:36:09', 'joshtgg', 1, NULL),
(320, 'Remove Item', 43, 'Removed item \'xcvxc\' (ID: 43) from Taguig Products', '2025-04-30 23:36:36', 'joshtgg', 1, NULL),
(321, 'Add Item', 48, 'Added new product: bnmbnm (123), qty: 12312', '2025-04-30 23:43:25', 'joshtgg', 1, NULL),
(322, 'Add Item', 49, 'Added new product: hjkhjk (1231), qty: 123 on Taguig Add Products', '2025-04-30 23:45:38', 'joshtgg', 1, NULL),
(323, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 00:04:28', 'MKTDexter', 1, NULL),
(324, 'View Item', 26, 'Viewed product \'Aluminum Partition Frame\' (ID: 26) on View Item (Product Table Makati)', '2025-05-01 00:11:20', 'MKTDexter', 1, NULL),
(325, 'Update Item', 11, 'Updated product \'Bakal\' (ID: 11) on Makati Edit Product', '2025-05-01 00:14:43', 'MKTDexter', 1, NULL),
(326, 'Delete Item', 46, 'Deleted product \'xcv\' (ID: 46) from Makati Product Table', '2025-05-01 00:17:38', 'MKTDexter', 1, NULL),
(327, 'Add Item', 54, 'Added new product: yutyu (23123), qty: 123 on Taguig Add Products', '2025-05-01 00:22:31', 'MKTDexter', 1, NULL),
(328, 'Release Item', 4, 'Released 10 x Office Glass Partition Kit (300x250cm) to customer \'mheg\' [Order ID: 4]', '2025-05-01 00:27:34', 'MKTDexter', 1, NULL),
(329, 'View Customer', 4, 'Viewed order details for customer \'mheg\' (Order ID: 4) on Release records View Order Page (Makati)', '2025-05-01 00:32:24', 'MKTDexter', 1, NULL),
(330, 'Delete Order Item', 3, 'Deleted order items for order ID \'3\' (Customer: \'llorente\', Product: \'vcb in Makati Release Records\')', '2025-05-01 00:38:36', 'MKTDexter', 1, NULL),
(331, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-05-01 00:39:11', 'PPGDexter', 1, NULL),
(332, 'Update Item', 12, 'Updated product \'Wala\' (ID: 12) on Pampanga Edit Product', '2025-05-01 01:46:31', 'PPGDexter', 1, NULL),
(333, 'View Item', 46, 'Viewed product \'Office Glass Partition Kit\' (ID: 46) on View Item (Product Table Pampanga)', '2025-05-01 01:49:00', 'PPGDexter', 1, NULL),
(334, 'Remove Item', 47, 'Removed item \'cvbcv\' (ID: 47) from Pampanga Product Table', '2025-05-01 01:50:22', 'PPGDexter', 1, NULL),
(335, 'Add Item', 49, 'Added new product: bnmbn (12), qty: 121 on Pampanga Add Products', '2025-05-01 01:53:08', 'PPGDexter', 1, NULL),
(336, 'Add Item', 50, 'Added new product: vcxxc (xzx), qty: 3123 on Pampanga Add Products', '2025-05-01 01:53:34', 'PPGDexter', 1, NULL),
(337, 'Add Item', 51, 'Added new product: cbvcv (nbvn), qty: 12312 on Pampanga Add Products', '2025-05-01 01:53:34', 'PPGDexter', 1, NULL),
(338, 'View Item', 3, 'Viewed product \'Jack-5\' (ID: 3) on View Item (Product Table Pampanga)', '2025-05-01 02:18:58', 'PPGDexter', 1, NULL),
(339, 'Delete Order Item', 3, 'Deleted order items for order ID \'3\' (Customer: \'Llorente\', Product: \'screw in Pampanga Release Records\')', '2025-05-01 02:22:17', 'PPGDexter', 1, NULL),
(340, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 13:26:01', 'admin', 1, NULL),
(341, 'Login Attempt Failed', NULL, 'User  ppgadmin not found', '2025-05-01 13:26:48', 'ppgadmin', 1, NULL),
(342, 'Login', NULL, 'Pampanga user ppgvers has logged in Pampanga Branch', '2025-05-01 13:26:55', 'ppgvers', 1, NULL),
(343, 'Release Item', 19, 'Released 5 x asd (small) to customer \'23123\' [Order ID: 19]', '2025-05-01 13:34:10', 'ppgvers', 1, NULL),
(344, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 13:35:56', 'admin', 1, NULL),
(345, 'Release Item', NULL, 'Released product \'hjkhjk\' to customer \'vers\' (Quantity: 123, Total Price: ₱61500)', '2025-05-01 13:45:58', 'admin', 1, NULL),
(346, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 13:52:12', 'admin', 1, NULL),
(347, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 13:56:58', 'MKTDexter', 1, NULL),
(348, 'Login Attempt Failed', NULL, 'User  ppgadmin not found', '2025-05-01 14:00:00', 'ppgadmin', 1, NULL),
(349, 'Login', NULL, 'Pampanga user ppgvers has logged in Pampanga Branch', '2025-05-01 14:00:05', 'ppgvers', 1, NULL),
(350, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 14:02:24', 'admin', 1, NULL),
(351, 'Login', NULL, 'Taguig user adminjosh has logged in Taguig Branch', '2025-05-01 14:03:12', 'adminjosh', 1, NULL),
(352, 'Login', NULL, 'Taguig user verstg has logged in Taguig Branch', '2025-05-01 14:03:19', 'verstg', 1, NULL),
(353, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 14:04:27', 'admin', 1, NULL),
(354, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 14:08:02', 'joshtgg', 1, NULL),
(355, 'Login Attempt Failed', NULL, 'User  adminsjosh not found', '2025-05-01 14:10:13', 'adminsjosh', 1, NULL),
(356, 'Login', NULL, 'Taguig user adminjosh has logged in Taguig Branch', '2025-05-01 14:10:26', 'adminjosh', 1, NULL),
(357, 'Login', NULL, 'Taguig user verstg has logged in Taguig Branch', '2025-05-01 14:15:55', 'verstg', 1, NULL),
(358, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 14:16:25', 'admin', 1, NULL),
(359, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 14:16:39', 'joshtgg', 1, NULL),
(360, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 14:17:05', 'MKTDexter', 1, NULL),
(361, 'Login Attempt Failed', NULL, 'Invalid password for user mktdexter', '2025-05-01 14:18:23', 'mktdexter', 1, NULL),
(362, 'Login Attempt Failed', NULL, 'Invalid password for user mktdexter', '2025-05-01 14:18:25', 'mktdexter', 1, NULL),
(363, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 14:18:31', 'MKTDexter', 1, NULL),
(364, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 14:18:47', 'admin', 1, NULL),
(365, 'Login Attempt Failed', NULL, 'Invalid password for user ppgvers', '2025-05-01 14:18:58', 'ppgvers', 1, NULL),
(366, 'Login Attempt Failed', NULL, 'Invalid password for user ppgvers', '2025-05-01 14:19:01', 'ppgvers', 1, NULL),
(367, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 14:19:04', 'admin', 1, NULL),
(368, 'Login', NULL, 'Pampanga user ppgvers has logged in Pampanga Branch', '2025-05-01 14:19:24', 'ppgvers', 1, NULL),
(369, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 14:20:28', 'admin', 1, NULL),
(370, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 14:25:11', 'admin', 1, NULL),
(371, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 14:25:28', 'MKTDexter', 1, NULL),
(372, 'Login Attempt Failed', NULL, 'Invalid password for user ppgvers', '2025-05-01 14:26:30', 'ppgvers', 1, NULL),
(373, 'Login', NULL, 'Pampanga user ppgvers has logged in Pampanga Branch', '2025-05-01 14:26:32', 'ppgvers', 1, NULL),
(374, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 14:30:42', 'MKTDexter', 1, NULL),
(375, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-05-01 14:46:07', 'admin', 1, NULL),
(376, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 14:46:41', 'admin', 1, NULL),
(377, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 14:48:26', 'joshtgg', 1, NULL),
(378, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 14:51:05', 'joshtgg', 1, NULL),
(379, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 14:52:46', 'joshtgg', 1, NULL),
(380, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 14:53:21', 'joshtgg', 1, NULL),
(381, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 14:54:20', 'joshtgg', 1, NULL),
(382, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 14:54:47', 'joshtgg', 1, NULL),
(383, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-05-01 14:59:56', 'admin', 1, NULL),
(384, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 15:31:06', 'MKTDexter', 1, NULL),
(385, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 15:32:21', 'MKTDexter', 1, NULL),
(386, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-05-01 15:34:19', 'PPGDexter', 1, NULL),
(387, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 15:38:04', 'admin', 1, NULL),
(388, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-05-01 15:48:00', 'PPGDexter', 1, NULL),
(389, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 15:49:20', 'admin', 1, NULL),
(390, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 15:50:18', 'admin', 1, NULL),
(391, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 16:10:06', 'admin', 1, NULL),
(392, 'Login', NULL, 'Super Admin user adminmheg has logged in', '2025-05-01 16:13:09', 'adminmheg', 1, NULL),
(393, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 16:13:32', 'admin', 1, NULL),
(394, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-05-01 17:08:48', 'admin', 1, NULL),
(395, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-05-01 17:08:55', 'admin', 1, NULL),
(396, 'Login', NULL, 'Super Admin user admins has logged in', '2025-05-01 17:09:09', 'admins', 1, NULL),
(397, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-05-01 17:16:29', 'admin', 1, NULL),
(398, 'Login', NULL, 'Super Admin user admins has logged in', '2025-05-01 17:16:44', 'admins', 1, NULL),
(399, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 17:17:34', 'admin', 1, NULL),
(400, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-05-01 17:22:39', 'admin', 1, NULL),
(401, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 17:22:46', 'admin', 1, NULL),
(402, 'Update Item', 44, 'Updated product \'wind\' (ID: 44) on Taguig Edit Product', '2025-05-01 17:23:43', 'admin', 1, NULL),
(403, 'Update Item', 44, 'Updated product \'wind\' (ID: 44) on Taguig Edit Product', '2025-05-01 17:25:55', 'admin', 1, NULL),
(404, 'Update Item', 44, 'Updated product \'wind\' (ID: 44) on Taguig Edit Product', '2025-05-01 17:26:40', 'admin', 1, NULL),
(405, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 17:40:56', 'MKTDexter', 1, NULL),
(406, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-05-01 17:45:27', 'PPGDexter', 1, NULL),
(407, 'Login Attempt Failed', NULL, 'User  admins not found', '2025-05-01 17:46:59', 'admins', 1, NULL),
(408, 'Login Attempt Failed', NULL, 'User  admins not found', '2025-05-01 17:47:14', 'admins', 1, NULL),
(409, 'Login Attempt Failed', NULL, 'User  admins not found', '2025-05-01 17:47:22', 'admins', 1, NULL),
(410, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 17:47:33', 'admin', 1, NULL),
(411, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 18:19:43', 'admin', 1, NULL),
(412, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 18:43:25', 'admin', 1, NULL),
(413, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 18:45:50', 'MKTDexter', 1, NULL),
(414, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 18:46:27', 'admin', 1, NULL),
(415, 'Login', NULL, 'Pampanga user ppgvers has logged in Pampanga Branch', '2025-05-01 18:48:28', 'ppgvers', 1, NULL),
(416, 'Remove Item', 10, 'Removed item \'asd\' (ID: 10) from Pampanga Product Table', '2025-05-01 18:49:56', 'ppgvers', 1, NULL),
(417, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 18:53:14', 'MKTDexter', 1, NULL),
(418, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 18:53:37', 'admin', 1, NULL),
(419, 'Remove Item', 49, 'Removed item \'hjkhjk\' (ID: 49) from Taguig Products', '2025-05-01 19:19:24', 'admin', 1, NULL),
(420, 'Release Item', NULL, 'Released product \'Plastic Pipe\' to customer \'jayvee\' (Quantity: 10, Total Price: ₱10000)', '2025-05-01 19:20:23', 'admin', 1, NULL),
(421, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:28:18', 'joshtgg', 1, NULL),
(422, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:28:21', 'joshtgg', 1, NULL),
(423, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:28:49', 'joshtgg', 1, NULL),
(424, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 19:30:38', 'admin', 1, NULL),
(425, 'Login Attempt Failed', NULL, 'Invalid password for user joshtgg', '2025-05-01 19:32:29', 'joshtgg', 1, NULL),
(426, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:32:31', 'joshtgg', 1, NULL),
(427, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 19:33:16', 'admin', 1, NULL),
(428, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:33:20', 'joshtgg', 1, NULL),
(429, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:34:28', 'joshtgg', 1, NULL),
(430, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:34:38', 'joshtgg', 1, NULL),
(431, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:35:07', 'joshtgg', 1, NULL),
(432, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:35:23', 'joshtgg', 1, NULL),
(433, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 19:36:04', 'admin', 1, NULL),
(434, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:36:25', 'joshtgg', 1, NULL),
(435, 'View Customer', 65, '', '2025-05-01 19:38:39', 'admin', 1, NULL),
(436, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:38:45', 'joshtgg', 1, NULL),
(437, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:39:27', 'joshtgg', 1, NULL),
(438, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 19:39:50', 'admin', 1, NULL),
(439, 'View Customer', 65, '', '2025-05-01 19:42:50', 'admin', 1, NULL),
(440, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:48:23', 'joshtgg', 1, NULL),
(441, 'Login Attempt Failed', NULL, 'Invalid password for user MKTDexter', '2025-05-01 19:48:33', 'MKTDexter', 1, NULL),
(442, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 19:48:35', 'MKTDexter', 1, NULL),
(443, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 19:50:24', 'admin', 1, NULL),
(444, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-01 19:51:19', 'joshtgg', 1, NULL),
(445, 'Login Attempt Failed', NULL, 'User  ppgadmin not found', '2025-05-01 19:52:45', 'ppgadmin', 1, NULL),
(446, 'Login Attempt Failed', NULL, 'User  ppgadmin not found', '2025-05-01 19:52:47', 'ppgadmin', 1, NULL),
(447, 'Login Attempt Failed', NULL, 'User  ppgadmin not found', '2025-05-01 19:52:49', 'ppgadmin', 1, NULL),
(448, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 19:52:53', 'admin', 1, NULL),
(449, 'Login', NULL, 'Pampanga user ppgvers has logged in Pampanga Branch', '2025-05-01 19:52:59', 'ppgvers', 1, NULL),
(450, 'Delete Order Item', 19, 'Deleted order items for order ID \'19\' (Customer: \'23123\', Product: \'asd in Pampanga Release Records\')', '2025-05-01 19:53:13', 'ppgvers', 1, NULL),
(451, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 21:26:44', 'admin', 1, NULL),
(452, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 21:42:30', 'MKTDexter', 1, NULL),
(453, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-01 21:43:16', 'admin', 1, NULL),
(454, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-01 21:51:19', 'MKTDexter', 1, NULL),
(455, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-05-01 21:56:12', 'PPGDexter', 1, NULL),
(456, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 01:11:35', 'admin', 1, NULL),
(457, 'Login Attempt Failed', NULL, 'Invalid password for user MKTDexter', '2025-05-02 01:37:02', 'MKTDexter', 1, NULL),
(458, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-02 01:37:05', 'MKTDexter', 1, NULL),
(459, 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-02 01:56:49', 'MKTDexter', 1, NULL),
(460, 'View Customer', 2, 'Viewed order details for customer \'Louis\' (Order ID: 2) on Release records View Order Page (Makati Records Table)', '2025-05-02 01:56:56', 'MKTDexter', 1, NULL),
(461, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-05-02 01:57:25', 'PPGDexter', 1, NULL),
(462, 'View Item', 11, 'Viewed product \'asd\' (ID: 11) on View Item (Product Table Pampanga)', '2025-05-02 01:57:29', 'PPGDexter', 1, NULL),
(463, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-05-02 01:57:47', 'PPGDexter', 1, NULL),
(464, 'View Item', 1, 'Viewed product \'Palakol\' (ID: 1) on View Item (Product Table Pampanga)', '2025-05-02 01:57:51', 'PPGDexter', 1, NULL),
(465, 'View Item', 11, 'Viewed product \'asd\' (ID: 11) on View Item (Product Table Pampanga)', '2025-05-02 01:58:18', 'PPGDexter', 1, NULL),
(466, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-02 01:58:30', 'MKTDexter', 1, NULL),
(467, 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-02 01:58:36', 'MKTDexter', 1, NULL),
(468, 'View Customer', 2, 'Viewed order details for customer \'Louis\' (Order ID: 2) on Release records View Order Page (Makati Records Table)', '2025-05-02 01:58:42', 'MKTDexter', 1, NULL),
(469, 'Login Attempt Failed', NULL, 'Invalid password for user verstg', '2025-05-02 01:58:52', 'verstg', 1, NULL),
(470, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-02 01:58:57', 'joshtgg', 1, NULL),
(471, 'View Item', 44, 'Viewed product \'wind\' (ID: 44) on View Item (Product Table Taguig)', '2025-05-02 01:59:04', 'joshtgg', 1, NULL),
(472, 'View Customer', 65, 'Viewed customer \'jayvee\' (ID: 65) with order ID \'65\' at Release Records (Taguig)', '2025-05-02 01:59:11', 'joshtgg', 1, NULL),
(473, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 02:02:35', 'admin', 1, NULL),
(474, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-02 02:16:28', 'MKTDexter', 1, NULL),
(475, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-05-02 02:19:57', 'PPGDexter', 1, NULL),
(476, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-02 02:29:50', 'MKTDexter', 1, NULL),
(477, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 08:20:23', 'admin', 1, NULL),
(478, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-05-02 12:03:48', 'admin', 1, NULL),
(479, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-05-02 12:03:48', 'admin', 1, NULL),
(480, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 12:03:56', 'admin', 1, NULL),
(481, 'View Item', 44, 'Viewed product \'wind\' (ID: 44) on View Item (Product Table Taguig)', '2025-05-02 12:15:59', 'admin', 1, NULL),
(482, 'View Item', 44, 'Viewed product \'wind\' (ID: 44) on View Item (Product Table Taguig)', '2025-05-02 12:16:00', 'admin', 1, NULL),
(483, 'View Item', 44, 'Viewed product \'wind\' (ID: 44) on View Item (Product Table Taguig)', '2025-05-02 12:17:34', 'admin', 1, NULL),
(484, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-05-02 12:18:06', 'PPGDexter', 1, NULL),
(485, 'View Item', 11, 'Viewed product \'asd\' (ID: 11) on View Item (Product Table Pampanga)', '2025-05-02 12:18:25', 'PPGDexter', 1, NULL),
(486, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-02 12:18:40', 'joshtgg', 1, NULL),
(487, 'Login Attempt Failed', NULL, 'User   ppgvers not found', '2025-05-02 12:18:40', ' ppgvers', 1, NULL),
(488, 'Login Attempt Failed', NULL, 'User   ppgvers not found', '2025-05-02 12:18:42', ' ppgvers', 1, NULL),
(489, 'Login Attempt Failed', NULL, 'User   ppgvers ppgvers not found', '2025-05-02 12:18:44', ' ppgvers ppgvers', 1, NULL),
(490, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-02 12:18:47', 'MKTDexter', 1, NULL),
(491, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-05-02 12:18:47', 'admin', 1, NULL),
(492, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 12:18:51', 'admin', 1, NULL),
(493, 'Remove Item', 51, 'Removed item \'cbvcv\' (ID: 51) from Pampanga Product Table', '2025-05-02 12:18:52', 'PPGDexter', 1, NULL),
(494, 'Login', NULL, 'Pampanga user ppgvers has logged in Pampanga Branch', '2025-05-02 12:18:58', 'ppgvers', 1, NULL),
(495, 'Add Item', 52, 'Added new product: mbnbmnbmbn (12312), qty: 31231 on Pampanga Add Products', '2025-05-02 12:19:09', 'PPGDexter', 1, NULL),
(496, 'Release Item', 20, 'Released 20 x Clear Glass Panel (200x100cm) to customer \'lerio\' [Order ID: 20]', '2025-05-02 12:20:13', 'PPGDexter', 1, NULL);
INSERT INTO `activity_logs` (`id`, `action`, `item_id`, `description`, `timestamp`, `username`, `is_viewed`, `branch`) VALUES
(497, 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-02 12:20:35', 'MKTDexter', 1, NULL),
(498, 'View Item', 20, 'Viewed product \'Tempered Glass Panel\' (ID: 20) on View Item (Product Table Pampanga)', '2025-05-02 12:20:35', 'PPGDexter', 1, NULL),
(499, 'Delete Order Item', 20, 'Deleted order items for order ID \'20\' (Customer: \'lerio\', Product: \'Clear Glass Panel in Pampanga Release Records\')', '2025-05-02 12:20:45', 'PPGDexter', 1, NULL),
(500, 'Update Item', 11, 'Updated product \'asd\' (ID: 11) on Pampanga Edit Product', '2025-05-02 12:20:46', 'ppgvers', 1, NULL),
(501, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 12:21:06', 'admin', 1, NULL),
(502, 'Login Attempt Failed', NULL, 'Invalid password for user verstg', '2025-05-02 12:21:11', 'verstg', 1, NULL),
(503, 'Login Attempt Failed', NULL, 'Invalid password for user verstg', '2025-05-02 12:21:13', 'verstg', 1, NULL),
(504, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 12:21:16', 'admin', 1, NULL),
(505, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-02 12:21:33', 'joshtgg', 1, NULL),
(506, 'View Item', 44, 'Viewed product \'wind\' (ID: 44) on View Item (Product Table Taguig)', '2025-05-02 12:23:02', 'joshtgg', 1, NULL),
(507, 'View Item', 5, 'Viewed product \'ased\' (ID: 5) on View Item (Product Table Makati)', '2025-05-02 12:23:16', 'MKTDexter', 1, NULL),
(508, 'View Item', 44, 'Viewed product \'wind\' (ID: 44) on View Item (Product Table Taguig)', '2025-05-02 12:23:30', 'joshtgg', 1, NULL),
(509, 'View Item', 44, 'Viewed product \'wind\' (ID: 44) on View Item (Product Table Taguig)', '2025-05-02 12:23:30', 'joshtgg', 1, NULL),
(510, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-02 12:24:42', 'MKTDexter', 1, NULL),
(511, 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-02 12:24:48', 'MKTDexter', 1, NULL),
(512, 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-02 12:25:49', 'MKTDexter', 1, NULL),
(513, 'Delete Item', 9, 'Deleted product \'asd\' (ID: 9) from Makati Product Table', '2025-05-02 12:28:15', 'MKTDexter', 1, NULL),
(514, 'Remove Item', 34, 'Removed item \'e\' (ID: 34) from Taguig Products', '2025-05-02 12:28:19', 'joshtgg', 1, NULL),
(515, 'Remove Item', 32, 'Removed item \'c\' (ID: 32) from Taguig Products', '2025-05-02 12:28:33', 'joshtgg', 1, NULL),
(516, 'Delete Item', 10, 'Deleted product \'asd\' (ID: 10) from Makati Product Table', '2025-05-02 12:28:44', 'MKTDexter', 1, NULL),
(517, 'Remove Item', 33, 'Removed item \'d\' (ID: 33) from Taguig Products', '2025-05-02 12:28:49', 'joshtgg', 1, NULL),
(518, 'Remove Item', 42, 'Removed item \'vbnvbn\' (ID: 42) from Taguig Products', '2025-05-02 12:28:57', 'joshtgg', 1, NULL),
(519, 'Remove Item', 46, 'Removed item \'hfghf\' (ID: 46) from Taguig Products', '2025-05-02 12:29:02', 'joshtgg', 1, NULL),
(520, 'Remove Item', 47, 'Removed item \'bvnvbn\' (ID: 47) from Taguig Products', '2025-05-02 12:29:08', 'joshtgg', 1, NULL),
(521, 'Delete Item', 49, 'Deleted product \'rytert\' (ID: 49) from Makati Product Table', '2025-05-02 12:29:11', 'MKTDexter', 1, NULL),
(522, 'Remove Item', 48, 'Removed item \'bnmbnm\' (ID: 48) from Taguig Products', '2025-05-02 12:29:14', 'joshtgg', 1, NULL),
(523, 'Delete Item', 6, 'Deleted product \'asd\' (ID: 6) from Makati Product Table', '2025-05-02 12:29:54', 'MKTDexter', 1, NULL),
(524, 'Remove Item', 12, 'Removed item \'Wala\' (ID: 12) from Pampanga Product Table', '2025-05-02 12:29:58', 'PPGDexter', 1, NULL),
(525, 'Delete Item', 7, 'Deleted product \'asd\' (ID: 7) from Makati Product Table', '2025-05-02 12:30:06', 'MKTDexter', 1, NULL),
(526, 'Remove Item', 13, 'Removed item \'asd\' (ID: 13) from Pampanga Product Table', '2025-05-02 12:30:14', 'PPGDexter', 1, NULL),
(527, 'Delete Item', 5, 'Deleted product \'ased\' (ID: 5) from Makati Product Table', '2025-05-02 12:30:23', 'MKTDexter', 1, NULL),
(528, 'Remove Item', 9, 'Removed item \'ased\' (ID: 9) from Pampanga Product Table', '2025-05-02 12:30:25', 'PPGDexter', 1, NULL),
(529, 'Remove Item', 11, 'Removed item \'asd\' (ID: 11) from Pampanga Product Table', '2025-05-02 12:30:37', 'PPGDexter', 1, NULL),
(530, 'Delete Item', 54, 'Deleted product \'yutyu\' (ID: 54) from Makati Product Table', '2025-05-02 12:30:39', 'MKTDexter', 1, NULL),
(531, 'Remove Item', 14, 'Removed item \'asd\' (ID: 14) from Pampanga Product Table', '2025-05-02 12:30:58', 'PPGDexter', 1, NULL),
(532, 'Delete Item', 47, 'Deleted product \'vcb\' (ID: 47) from Makati Product Table', '2025-05-02 12:31:12', 'MKTDexter', 1, NULL),
(533, 'Remove Item', 49, 'Removed item \'bnmbn\' (ID: 49) from Pampanga Product Table', '2025-05-02 12:31:28', 'PPGDexter', 1, NULL),
(534, 'Delete Item', 2, 'Deleted product \'bshape\' (ID: 2) from Makati Product Table', '2025-05-02 12:31:39', 'MKTDexter', 1, NULL),
(535, 'Remove Item', 2, 'Removed item \'he\' (ID: 2) from Pampanga Product Table', '2025-05-02 12:31:58', 'PPGDexter', 1, NULL),
(536, 'Remove Item', 50, 'Removed item \'vcxxc\' (ID: 50) from Pampanga Product Table', '2025-05-02 12:32:32', 'PPGDexter', 1, NULL),
(537, 'Delete Item', 53, 'Deleted product \'iuoui\' (ID: 53) from Makati Product Table', '2025-05-02 12:32:46', 'MKTDexter', 1, NULL),
(538, 'Remove Item', 52, 'Removed item \'mbnbmnbmbn\' (ID: 52) from Pampanga Product Table', '2025-05-02 12:32:46', 'PPGDexter', 1, NULL),
(539, 'Delete Item', 51, 'Deleted product \'cvb\' (ID: 51) from Makati Product Table', '2025-05-02 12:32:53', 'MKTDexter', 1, NULL),
(540, 'Delete Item', 11, 'Deleted product \'Bakal\' (ID: 11) from Makati Product Table', '2025-05-02 12:33:02', 'MKTDexter', 1, NULL),
(541, 'Delete Item', 4, 'Deleted product \'pako\' (ID: 4) from Makati Product Table', '2025-05-02 12:33:15', 'MKTDexter', 1, NULL),
(542, 'Delete Item', 52, 'Deleted product \'rtyrt\' (ID: 52) from Makati Product Table', '2025-05-02 12:33:23', 'MKTDexter', 1, NULL),
(543, 'Delete Item', 48, 'Deleted product \'bcvb\' (ID: 48) from Makati Product Table', '2025-05-02 12:33:28', 'MKTDexter', 1, NULL),
(544, 'Remove Item', 1, 'Removed item \'Palakol\' (ID: 1) from Pampanga Product Table', '2025-05-02 12:33:39', 'PPGDexter', 1, NULL),
(545, 'Remove Item', 3, 'Removed item \'Jack-5\' (ID: 3) from Pampanga Product Table', '2025-05-02 12:34:11', 'PPGDexter', 1, NULL),
(546, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 12:37:06', 'admin', 1, NULL),
(547, 'Remove Item', 44, 'Removed item \'wind\' (ID: 44) from Taguig Products', '2025-05-02 12:38:43', 'admin', 1, NULL),
(548, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 12:39:05', 'admin', 1, NULL),
(549, 'Login', NULL, 'Pampanga user ppgvers has logged in Pampanga Branch', '2025-05-02 12:39:11', 'ppgvers', 1, NULL),
(550, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 12:45:15', 'admin', 1, NULL),
(551, 'Release Item', 21, 'Released 5 x Shower Glass Door (90x200cm) to customer \'josh\' [Order ID: 21]', '2025-05-02 12:51:35', 'PPGDexter', 1, NULL),
(552, 'Login', NULL, 'Super Admin user jayvee has logged in', '2025-05-02 12:52:23', 'jayvee', 1, NULL),
(553, 'Release Item', 22, 'Released 20 x Aluminum Railing Post (10x100cm) to customer \'john\' [Order ID: 22]', '2025-05-02 12:55:37', 'PPGDexter', 1, NULL),
(554, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-02 13:01:31', 'MKTDexter', 1, NULL),
(555, 'Login', NULL, 'Super Admin user jayvee has logged in', '2025-05-02 13:04:50', 'jayvee', 1, NULL),
(556, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 13:05:50', 'admin', 1, NULL),
(557, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-05-02 13:06:06', 'PPGDexter', 1, NULL),
(558, 'Login Attempt Failed', NULL, 'Invalid password for user MKTDexter', '2025-05-02 13:06:15', 'MKTDexter', 1, NULL),
(559, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-02 13:06:18', 'MKTDexter', 1, NULL),
(560, 'Release Item', 25, 'Released 20 x Aluminum Handrail (300cm) to customer \'dexter\' [Order ID: 25]', '2025-05-02 13:07:18', 'PPGDexter', 1, NULL),
(561, 'Release Item', 26, 'Released 6 x Aluminum Handrail (300cm) to customer \'Chris\' [Order ID: 26]', '2025-05-02 13:08:19', 'PPGDexter', 1, NULL),
(562, 'Release Item', 17, 'Released 11 x Pivot Hinge Set (Heavy Duty) to customer \'vers\' [Order ID: 17]', '2025-05-02 13:08:36', 'MKTDexter', 1, NULL),
(563, 'Release Item', 27, 'Released 10 x Pivot Hinge Set (Heavy Duty) to customer \'louis\' [Order ID: 27]', '2025-05-02 13:09:26', 'PPGDexter', 1, NULL),
(564, 'Release Item', 18, 'Released 20 x SEALANT BRONZE (pc(s)) to customer \'cherwin\' [Order ID: 18]', '2025-05-02 13:11:51', 'MKTDexter', 1, NULL),
(565, 'Login Attempt Failed', NULL, 'Invalid password for user ADMIN', '2025-05-02 13:19:54', 'ADMIN', 1, NULL),
(566, 'Login Attempt Failed', NULL, 'Invalid password for user admin', '2025-05-02 13:19:59', 'admin', 1, NULL),
(567, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 13:20:03', 'admin', 1, NULL),
(568, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 13:20:39', 'admin', 1, NULL),
(569, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-02 13:20:53', 'joshtgg', 1, NULL),
(570, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-02 13:23:14', 'joshtgg', 1, NULL),
(571, 'Login', NULL, 'Pampanga user PPGDexter has logged in Pampanga Branch', '2025-05-02 14:03:15', 'PPGDexter', 1, NULL),
(572, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 14:07:26', 'admin', 1, NULL),
(573, 'Add Item', 53, 'Added new product: donut (large), qty: 1 on Pampanga Add Products', '2025-05-02 14:12:57', 'PPGDexter', 1, NULL),
(574, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 14:14:09', 'admin', 1, NULL),
(575, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 14:18:54', 'admin', 1, NULL),
(576, 'Login', NULL, 'Super Admin user admin has logged in', '2025-05-02 14:21:00', 'admin', 1, NULL),
(577, 'Remove Item', 37, 'Removed item \'screw\' (ID: 37) from Taguig Products', '2025-05-02 14:21:51', 'admin', 1, NULL),
(578, 'Add Item', 289, 'Added new product: glass (10cm) from Add Products Section (Taguig)', '2025-05-02 14:22:37', 'admin', 1, NULL),
(579, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-02 14:48:09', 'joshtgg', 1, NULL),
(580, 'Login', NULL, 'Makati user MKTDexter  has logged in Makati Branch', '2025-05-02 14:48:13', 'MKTDexter', 1, NULL),
(581, 'Add Item', 290, 'Added new product: q (q) from Add Products Section (Taguig)', '2025-05-02 15:17:45', 'admin', 1, NULL),
(582, 'Update Item', 290, 'Updated product quantity for: q (q) in producttabletaguig', '2025-05-02 15:17:55', 'admin', 1, NULL),
(583, 'Update Item', 290, 'Updated product quantity for: q (q) in producttabletaguig', '2025-05-02 15:17:57', 'admin', 1, NULL),
(584, 'Update Item', 290, 'Updated product quantity for: q (q) in producttabletaguig', '2025-05-02 15:18:00', 'admin', 1, NULL),
(585, 'Update Item', 290, 'Updated product quantity for: q (q) in producttabletaguig', '2025-05-02 15:18:01', 'admin', 1, NULL),
(586, 'Update Item', 290, 'Updated product quantity for: q (q) in producttabletaguig', '2025-05-02 15:18:08', 'admin', 1, NULL),
(587, 'Login Attempt Failed', NULL, 'User  \\\'\\\" not found', '2025-05-02 15:23:17', '\\\'\\\"', 1, NULL),
(588, 'Login Attempt Failed', NULL, 'User  \\\'\\\"=1 not found', '2025-05-02 15:24:10', '\\\'\\\"=1', 1, NULL),
(589, 'Login Attempt Failed', NULL, 'User  \\\'\\\"=1 not found', '2025-05-02 15:25:14', '\\\'\\\"=1', 1, NULL),
(590, 'Login Attempt Failed', NULL, 'User   ` not found', '2025-05-02 15:26:09', ' `', 1, NULL),
(591, 'Login', NULL, 'Taguig Admin user joshtgg has logged in.', '2025-05-05 08:45:59', 'joshtgg', 1, NULL),
(592, 'Login', NULL, 'Taguig Admin user joshtgg has logged in.', '2025-05-05 08:46:41', 'joshtgg', 1, NULL),
(593, 'Login', NULL, 'Taguig Admin user joshtgg has logged in.', '2025-05-05 08:47:23', 'joshtgg', 1, NULL),
(594, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-05 08:48:06', 'joshtgg', 1, NULL),
(595, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-05 10:19:27', 'joshtgg', 1, NULL),
(596, 'Login Attempt Failed', NULL, 'Invalid password for user joshtgg', '2025-05-05 10:20:32', 'joshtgg', 1, NULL),
(597, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-05 10:20:47', 'joshtgg', 1, NULL),
(598, 'Login', NULL, 'Taguig user joshtgg has logged in Taguig Branch', '2025-05-05 10:22:02', 'joshtgg', 1, NULL),
(599, 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 10:47:41', 'joshtgg', 1, NULL),
(600, 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 10:49:17', 'joshtgg', 1, NULL),
(601, 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 10:50:14', 'joshtgg', 1, NULL),
(602, 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 11:00:03', 'joshtgg', 1, NULL),
(603, 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 11:02:21', 'joshtgg', 1, NULL),
(604, 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 11:07:45', 'joshtgg', 1, NULL),
(605, 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 11:09:38', 'joshtgg', 1, NULL),
(606, 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 11:11:23', 'joshtgg', 1, NULL),
(607, 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 11:17:40', 'joshtgg', 1, NULL),
(608, 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 11:27:36', 'joshtgg', 1, NULL),
(609, 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 11:28:28', 'joshtgg', 1, NULL),
(610, 'View Item', 115, 'Viewed product \'DOOR CLOSER ARM TYPE A\' (ID: 115) on View Item (Product Table Taguig)', '2025-05-05 11:32:55', 'joshtgg', 1, NULL),
(611, 'Remove Item', 131, 'Removed item \'FLUSH LOCK # 12 S/W\' (ID: 131) from Taguig Products', '2025-05-05 11:34:53', 'joshtgg', 1, NULL),
(612, 'Update Item', 140, 'Updated product \'GLASS LOCK\' (ID: 140) on Taguig Edit Product', '2025-05-05 11:41:07', 'joshtgg', 1, NULL),
(613, 'View Customer', 65, 'Viewed customer \'jayvee\' (ID: 65) with order ID \'65\' at Release Records (Taguig)', '2025-05-05 11:41:57', 'joshtgg', 1, NULL),
(614, 'View Customer', 73, 'Viewed customer \'louis\' (ID: 73) with order ID \'73\' at Release Records (Taguig)', '2025-05-05 11:57:19', 'joshtgg', 1, NULL),
(615, 'Delete Order Item', 73, 'Deleted order items for order ID \'73\' (Customer: \'louis\', Product: \'Silicone Sealant in Taguig Release Records\')', '2025-05-05 12:03:37', 'joshtgg', 1, NULL),
(616, 'View Item', 143, 'Viewed product \'HAN 125 BLACK #71\' (ID: 143) on View Item (Product Table Taguig)', '2025-05-05 14:21:20', 'joshtgg', 1, NULL),
(617, 'Update Item', 143, 'Updated product \'HAN 125 BLACK #7\' (ID: 143) on Taguig Edit Product', '2025-05-05 14:33:47', 'joshtgg', 1, NULL),
(618, 'View Customer', 74, 'Viewed customer \'louis\' (ID: 74) with order ID \'74\' at Release Records (Taguig)', '2025-05-05 14:37:49', 'joshtgg', 1, NULL),
(619, 'Update Item', 14, 'Updated product \'Aluminum bar\' (ID: 14) on Taguig Edit Product', '2025-05-05 15:21:33', 'MKTDexter', 1, NULL),
(620, 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-05 15:25:06', 'MKTDexter', 1, NULL),
(621, 'Remove Item', 261, 'Removed item \'MF-SF DOUBLE (L)\' (ID: 261) from Taguig Products', '2025-05-05 15:27:04', 'MKTDexter', 1, NULL),
(622, 'Add Item', 263, 'Added new product: bnmnmbnm (123123), qty: 1231 on Taguig Add Products', '2025-05-05 15:29:52', 'MKTDexter', 1, NULL),
(623, 'Update Item', 247, 'Updated product \'HA-38 PANEL FRAME \' (ID: 247) on Taguig Edit Product', '2025-05-05 15:46:54', 'MKTDexter', 1, NULL),
(624, 'View Item', 19, 'Viewed product \'Tempered Glass Panel\' (ID: 19) on View Item (Product Table Makati)', '2025-05-05 15:53:34', 'MKTDexter', 1, NULL),
(625, 'View Item', 19, 'Viewed product \'Tempered Glass Panel\' (ID: 19) on View Item (Product Table Makati)', '2025-05-05 15:54:09', 'MKTDexter', 1, NULL),
(626, 'Delete Order Item', 17, 'Deleted order items for order ID \'17\' (Customer: \'vers\', Product: \'Pivot Hinge Set in Makati Release Records\')', '2025-05-05 15:57:22', 'MKTDexter', 1, NULL),
(627, 'View Item', 15, 'Viewed product \'Aluminum bar\' (ID: 15) on View Item (Product Table Pampanga)', '2025-05-05 23:07:03', 'PPGDexter', 1, NULL),
(628, 'View Item', 27, 'Viewed product \'Aluminum Partition Frame\' (ID: 27) on View Item (Product Table Pampanga)', '2025-05-05 23:07:45', 'PPGDexter', 1, NULL),
(629, 'View Item', 27, 'Viewed product \'Aluminum Partition Frame\' (ID: 27) on View Item (Product Table Pampanga)', '2025-05-05 23:08:13', 'PPGDexter', 1, NULL),
(630, 'View Item', 27, 'Viewed product \'Aluminum Partition Frame\' (ID: 27) on View Item (Product Table Pampanga)', '2025-05-05 23:08:15', 'PPGDexter', 1, NULL),
(631, 'View Item', 27, ' \'Aluminum Partition Frame\' (ID: 27) on View Item (Product Table Pampanga)', '2025-05-05 23:10:52', 'PPGDexter', 1, NULL),
(632, 'View Item', 27, ' \'\' (ID: 27) on View Item (Product Table Pampanga)', '2025-05-05 23:11:35', 'PPGDexter', 1, NULL),
(633, 'View Item', 27, ' \'Aluminum Partition Frame\' (ID: 27) on View Item (Pampanga release Products)', '2025-05-05 23:12:05', 'PPGDexter', 1, NULL),
(634, 'View Item', 21, ' \'Tinted Glass Sheet\' (ID: 21) on View Item (Pampanga release Products)', '2025-05-05 23:12:42', 'PPGDexter', 1, NULL),
(635, 'View Item', 27, ' \'Aluminum Partition Frame\' (ID: 27) on View Item (Pampanga release Products)', '2025-05-05 23:12:46', 'PPGDexter', 1, NULL),
(636, 'View Item', 26, ' \'Aluminum Sliding Door Frame\' (ID: 26) on View Item (Pampanga release Products)', '2025-05-05 23:12:54', 'PPGDexter', 1, NULL),
(637, 'View Item', 22, ' \'Frosted Glass Sheet\' (ID: 22) on View Item (Pampanga release Products)', '2025-05-05 23:13:40', 'PPGDexter', 1, NULL),
(638, 'View Item', 22, ' \'Frosted Glass Sheet\' on View Item (Pampanga release Products)', '2025-05-05 23:14:28', 'PPGDexter', 1, NULL),
(639, 'Login Attempt Failed', NULL, 'User assdassdas not found', '2025-05-05 23:41:51', 'assdassdas', 1, NULL),
(640, 'Login Attempt Failed', NULL, 'User assdassdas not found', '2025-05-05 23:41:52', 'assdassdas', 1, NULL),
(641, 'Login Attempt Failed', NULL, 'User verstgg not found', '2025-05-05 23:59:04', 'verstgg', 1, NULL),
(642, 'Login', NULL, 'Admin user admin has logged in', '2025-05-05 23:59:39', 'admin', 1, NULL),
(643, 'Viewed Product Table', NULL, '', '2025-05-06 01:29:07', 'admin', 1, NULL),
(644, 'Viewed Product Table', NULL, '', '2025-05-06 01:34:16', 'admin', 1, NULL),
(645, 'Viewed Product Table', NULL, '', '2025-05-06 01:34:17', 'admin', 1, NULL),
(646, 'Viewed Product Table', NULL, '', '2025-05-06 01:34:17', 'admin', 1, NULL),
(647, 'Viewed Product Table', NULL, '', '2025-05-06 01:34:26', 'admin', 1, NULL),
(648, 'Viewed Product Table', NULL, '', '2025-05-06 01:34:27', 'admin', 1, NULL),
(649, 'Viewed Product Table', NULL, '', '2025-05-06 01:34:27', 'admin', 1, NULL),
(650, 'Viewed Product Table', NULL, '', '2025-05-06 01:34:28', 'admin', 1, NULL),
(651, 'Login', NULL, 'Admin user admin has logged in', '2025-05-06 01:46:09', 'admin', 1, NULL),
(652, 'Login', NULL, 'Admin user admin has logged in', '2025-05-06 01:53:05', 'admin', 1, NULL),
(653, 'Login', NULL, 'Admin user admin has logged in', '2025-05-06 09:45:38', 'admin', 1, NULL),
(654, 'Login Attempt Failed', NULL, 'Wrong password for PPGDexter', '2025-05-06 10:14:25', 'PPGDexter', 1, NULL),
(655, 'Login', NULL, 'Admin user admin has logged in', '2025-05-06 23:51:18', 'admin', 1, NULL),
(656, 'Login Attempt Failed', NULL, 'Wrong password for admin', '2025-05-07 00:02:08', 'admin', 1, NULL),
(657, 'Login Attempt Failed', NULL, 'Wrong password for admin', '2025-05-07 00:02:11', 'admin', 1, NULL),
(658, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 00:12:48', 'admin', 1, NULL),
(659, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 14:23:03', 'admin', 1, NULL),
(660, 'Login', NULL, 'Admin user joshtgg has logged in Taguig Branch', '2025-05-07 14:24:14', 'joshtgg', 1, NULL),
(661, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 14:29:28', 'admin', 1, NULL),
(662, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 14:32:21', 'admin', 1, NULL),
(663, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 14:41:02', 'admin', 1, NULL),
(664, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 14:46:41', 'admin', 1, NULL),
(665, 'Login', NULL, 'Admin user joshtgg has logged in Taguig Branch', '2025-05-07 14:50:20', 'joshtgg', 1, NULL),
(666, 'Login', NULL, 'Admin user MKTDexter has logged in Makati Branch', '2025-05-07 14:52:13', 'MKTDexter', 1, NULL),
(667, 'Login', NULL, 'Admin user PPGDexter has logged in Pampanga Branch', '2025-05-07 14:53:02', 'PPGDexter', 1, NULL),
(668, 'Login Attempt Failed', NULL, 'User asdasd not found', '2025-05-07 15:05:25', 'asdasd', 1, NULL),
(669, 'Login Attempt Failed', NULL, 'User asdasd not found', '2025-05-07 15:05:26', 'asdasd', 1, NULL),
(670, 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-07 16:10:51', 'MKTDexter', 1, NULL),
(671, 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-07 16:12:41', 'MKTDexter', 1, NULL),
(672, 'Login Attempt Failed', NULL, 'User asdasd not found', '2025-05-07 16:17:52', 'asdasd', 1, NULL),
(673, 'Login Attempt Failed', NULL, 'User asdasd not found', '2025-05-07 16:17:55', 'asdasd', 1, NULL),
(674, 'Login', NULL, 'Admin user admin has logged-in in Pampanga Branch', '2025-05-07 16:18:19', 'admin', 1, NULL),
(675, 'Login', NULL, 'Admin user PPGDexter has logged-in in Pampanga Branch', '2025-05-07 16:20:30', 'PPGDexter', 1, NULL),
(676, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 16:50:19', 'admin', 1, NULL),
(677, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:00:53', 'admin', 1, NULL),
(678, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:02:10', 'admin', 1, NULL),
(679, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:03:50', 'admin', 1, NULL),
(680, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:04:13', 'admin', 1, NULL),
(681, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:07:15', 'admin', 1, NULL),
(682, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:07:34', 'admin', 1, NULL),
(683, 'Login Attempt Failed', NULL, 'Wrong password for admin', '2025-05-07 17:10:09', 'admin', 1, NULL),
(684, 'Login Attempt Failed', NULL, 'Wrong password for admin', '2025-05-07 17:10:10', 'admin', 1, NULL),
(685, 'Login Attempt Failed', NULL, 'User dajknldsjknas not found', '2025-05-07 17:15:00', 'dajknldsjknas', 1, NULL),
(686, 'Login Attempt Failed', NULL, 'User dajknldsjknas not found', '2025-05-07 17:15:01', 'dajknldsjknas', 1, NULL),
(687, 'Login Attempt Failed', NULL, 'User dssad not found', '2025-05-07 17:15:43', 'dssad', 1, NULL),
(688, 'Login Attempt Failed', NULL, 'User dssad not found', '2025-05-07 17:15:45', 'dssad', 1, NULL),
(689, 'Login Attempt Failed', NULL, 'Wrong password for admin', '2025-05-07 17:22:51', 'admin', 1, NULL),
(690, 'Login Attempt Failed', NULL, 'Wrong password for admin', '2025-05-07 17:22:52', 'admin', 1, NULL),
(691, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:28:52', 'admin', 1, NULL),
(692, 'Login Attempt Failed', NULL, 'Wrong password for admin', '2025-05-07 17:28:57', 'admin', 1, NULL),
(693, 'Login Attempt Failed', NULL, 'Wrong password for admin', '2025-05-07 17:28:58', 'admin', 1, NULL),
(694, 'Login Attempt Failed', NULL, 'User dsad not found', '2025-05-07 17:30:18', 'dsad', 1, NULL),
(695, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:38:29', 'admin', 1, NULL),
(696, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:38:54', 'admin', 1, NULL),
(697, 'Login Attempt Failed', NULL, 'Wrong password for admin', '2025-05-07 17:40:01', 'admin', 1, NULL),
(698, 'Login Attempt Failed', NULL, 'Wrong password for admin', '2025-05-07 17:40:03', 'admin', 1, NULL),
(699, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:51:14', 'admin', 1, NULL),
(700, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:51:42', 'admin', 1, NULL),
(701, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:52:11', 'admin', 1, NULL),
(702, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:53:02', 'admin', 1, NULL),
(703, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:53:13', 'admin', 1, NULL),
(704, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:53:23', 'admin', 1, NULL),
(705, 'Login Attempt Failed', NULL, 'User dasdas not found', '2025-05-07 17:53:36', 'dasdas', 1, NULL),
(706, 'Login Attempt Failed', NULL, 'User dasdas not found', '2025-05-07 17:53:36', 'dasdas', 1, NULL),
(707, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:53:43', 'admin', 1, NULL),
(708, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:54:39', 'admin', 1, NULL),
(709, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:55:48', 'admin', 1, NULL),
(710, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:56:37', 'admin', 1, NULL),
(711, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 17:56:44', 'adminjosh', 1, NULL),
(712, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:57:26', 'admin', 1, NULL),
(713, 'Login Attempt Failed', NULL, 'Wrong password for adminjosh', '2025-05-07 17:58:02', 'adminjosh', 1, NULL),
(714, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 17:58:04', 'adminjosh', 1, NULL),
(715, 'Login Attempt Failed', NULL, 'Wrong password for adminjosh', '2025-05-07 17:58:55', 'adminjosh', 1, NULL),
(716, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 17:58:57', 'adminjosh', 1, NULL),
(717, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 17:59:46', 'adminjosh', 1, NULL),
(718, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 17:59:54', 'admin', 1, NULL),
(719, 'Login Attempt Failed', NULL, 'Wrong password for adminjosh', '2025-05-07 18:00:50', 'adminjosh', 1, NULL),
(720, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 18:00:53', 'admin', 1, NULL),
(721, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:00:59', 'adminjosh', 1, NULL),
(722, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 18:02:07', 'admin', 1, NULL),
(723, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:02:38', 'adminjosh', 1, NULL),
(724, 'Login', NULL, 'Admin user juversadmin has logged in', '2025-05-07 18:02:38', 'juversadmin', 1, NULL),
(725, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:04:08', 'adminjosh', 1, NULL),
(726, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:05:02', 'adminjosh', 1, NULL),
(727, 'Login', NULL, 'Admin user verstg has logged in', '2025-05-07 18:05:13', 'verstg', 1, NULL),
(728, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 18:06:20', 'admin', 1, NULL),
(729, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:07:21', 'adminjosh', 1, NULL),
(730, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 18:07:46', 'admin', 1, NULL),
(731, 'Login Attempt Failed', NULL, 'Wrong password for cheradmin', '2025-05-07 18:08:07', 'cheradmin', 1, NULL),
(732, 'Login', NULL, 'Admin user cheradmin has logged in', '2025-05-07 18:08:10', 'cheradmin', 1, NULL),
(733, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 18:08:54', 'admin', 1, NULL),
(734, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:09:12', 'adminjosh', 1, NULL),
(735, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 18:10:11', 'admin', 1, NULL),
(736, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:12:44', 'adminjosh', 1, NULL),
(737, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:13:29', 'adminjosh', 1, NULL),
(738, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 18:15:19', 'admin', 1, NULL),
(739, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 18:15:43', 'admin', 1, NULL),
(740, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 18:17:10', 'admin', 1, NULL),
(741, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 18:18:39', 'admin', 1, NULL),
(742, 'Login', NULL, 'Admin user admin has logged in', '2025-05-07 18:18:54', 'admin', 1, NULL),
(743, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:19:39', 'adminjosh', 1, NULL),
(744, 'Login', NULL, 'Admin user adminmheg has logged in', '2025-05-07 18:20:46', 'adminmheg', 1, NULL),
(745, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:21:03', 'adminjosh', 1, NULL),
(746, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:22:03', 'adminjosh', 1, NULL),
(747, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-07 18:35:36', 'adminjosh', 1, NULL),
(748, 'Login', NULL, 'Admin user admin has logged in', '2025-05-08 00:04:45', 'admin', 1, NULL),
(749, 'Login', NULL, 'Admin user admin has logged in', '2025-05-08 00:12:26', 'admin', 1, NULL),
(750, 'Login', NULL, 'Admin user admin has logged in', '2025-05-08 00:12:47', 'admin', 1, NULL),
(751, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 00:46:45', 'MKTDexter', 1, NULL),
(752, 'Login Attempt Failed', NULL, 'User asdas not found', '2025-05-08 00:51:33', 'asdas', 1, NULL),
(753, 'Login Attempt Failed', NULL, 'User asdas not found', '2025-05-08 00:51:34', 'asdas', 1, NULL),
(754, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 00:52:11', 'MKTDexter', 1, NULL),
(755, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 00:52:56', 'MKTDexter', 1, NULL),
(756, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:00:35', 'MKTDexter', 1, NULL),
(757, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:07:35', 'MKTDexter', 1, NULL),
(758, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:13:26', 'MKTDexter', 1, NULL),
(759, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:14:25', 'MKTDexter', 1, NULL),
(760, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:18:54', 'MKTDexter', 1, NULL),
(761, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:19:43', 'MKTDexter', 1, NULL),
(762, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:21:18', 'MKTDexter', 1, NULL),
(763, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:23:48', 'MKTDexter', 1, NULL),
(764, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:26:50', 'MKTDexter', 1, NULL),
(765, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:29:08', 'MKTDexter', 1, NULL),
(766, 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:31:47', 'MKTDexter', 1, NULL),
(767, 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:45:41', 'MKTDexter', 1, NULL),
(768, 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:52:00', 'MKTDexter', 1, NULL),
(769, 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:56:14', 'MKTDexter', 1, NULL),
(770, 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:57:02', 'MKTDexter', 1, NULL),
(771, 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:58:18', 'MKTDexter', 1, NULL),
(772, 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:59:57', 'MKTDexter', 1, NULL),
(773, 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 02:01:23', 'MKTDexter', 1, NULL),
(774, 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 02:06:00', 'MKTDexter', 1, NULL),
(775, 'Login', NULL, 'Admin user admin has logged in', '2025-05-08 07:56:13', 'admin', 1, NULL),
(776, 'Login', NULL, 'Admin user admin has logged in', '2025-05-08 07:56:25', 'admin', 1, NULL),
(777, 'Login', NULL, 'Admin user admin has logged in', '2025-05-08 07:56:38', 'admin', 1, NULL),
(778, 'Login', NULL, 'Admin user admin has logged in', '2025-05-08 07:58:13', 'admin', 1, NULL),
(779, 'Login', NULL, 'Admin user adminjosh has logged in', '2025-05-08 07:58:26', 'adminjosh', 1, NULL),
(780, 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 07:58:41', 'MKTDexter', 1, NULL),
(781, 'Login', NULL, 'Admin user admin has logged in', '2025-05-08 07:59:36', 'admin', 1, NULL),
(782, 'Login', NULL, 'Admin user admin has logged in', '2025-05-08 08:03:56', 'admin', 1, NULL),
(783, 'Login', NULL, 'Admin user cheradmin has logged in', '2025-05-08 08:04:30', 'cheradmin', 1, NULL),
(784, 'Login', NULL, 'Admin user cheradmin has logged in', '2025-05-08 08:15:19', 'cheradmin', 1, NULL),
(785, 'Login', NULL, 'Admin user cheradmin has logged in', '2025-05-08 08:19:11', 'cheradmin', 1, NULL),
(786, 'Login', NULL, 'Admin user cheradmin has logged in', '2025-05-08 08:31:29', 'cheradmin', 1, NULL),
(787, 'Login', NULL, 'Admin user admin has logged in', '2025-05-08 08:37:51', 'admin', 1, NULL),
(788, 'Login', NULL, 'Admin user cheradmin has logged in', '2025-05-08 08:38:10', 'cheradmin', 1, NULL),
(789, 'Login Attempt Failed', NULL, 'User c not found', '2025-05-08 08:40:43', 'c', 0, NULL),
(790, 'Login', NULL, 'Admin user admin has logged in', '2025-05-08 08:40:47', 'admin', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `backup_acc`
--

CREATE TABLE `backup_acc` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `p1` varchar(255) NOT NULL,
  `session_token` varchar(255) DEFAULT NULL,
  `last_active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `backup_acc`
--

INSERT INTO `backup_acc` (`userid`, `username`, `password`, `usertype`, `nickname`, `fullname`, `email`, `phone`, `address`, `p1`, `session_token`, `last_active`) VALUES
(108, 'verstg', '$2y$10$75oHxK57NBN1gJydPCoVp.r0CSpwKv3Dtngbsz9TgeOcqD2GgnyxW', 'admin', 'verstg', 'verstg', 'verstg', 31312312, '', 'verstgverstg', NULL, NULL),
(300, 'jayvee', '$2y$10$zCW9CZAswKnoo96ga1nfi.BZbAe8PeezBwKUeVuD0HvVHCiePJmTC', 'admin', 'jayvee', 'jayvee', 'jayvee@gmail.com', 2312, 'jayvee', 'jayveejayvee', NULL, NULL),
(302, 'cheradmin', '$2y$10$HCGpi73z17aArC0oiAtCwO7/JN6Yd6W6F8YB9rQ6bB6beYuG/2m9e', 'admin', 'pogi', 'cheradmin', 'cheradmin@gmai.com', 12312312, '132312312', 'cheradmin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch_performance`
--

CREATE TABLE `branch_performance` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `inventory` int(11) NOT NULL,
  `total_sales` decimal(10,2) NOT NULL,
  `activities` int(11) NOT NULL,
  `product_performance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branch_performance`
--

INSERT INTO `branch_performance` (`id`, `branch_name`, `inventory`, `total_sales`, `activities`, `product_performance`) VALUES
(1, 'Taguig', 120, 200.00, 30, 90),
(2, 'Makati', 150, 250.00, 40, 110),
(3, 'Pampanga', 100, 180.00, 20, 80);

-- --------------------------------------------------------

--
-- Table structure for table `makati_activity_logs`
--

CREATE TABLE `makati_activity_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `action` varchar(50) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `is_viewed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makati_activity_logs`
--

INSERT INTO `makati_activity_logs` (`id`, `username`, `action`, `item_id`, `description`, `timestamp`, `is_viewed`) VALUES
(1, 'MKTDexter', 'ADD', 49, 'Added new product: \'rytert\' (qweqw), qty: 123', '2025-04-30 05:34:23', 0),
(2, 'MKTDexter', 'ADD', 50, 'Added new product: \'thrftfh\' (123123), qty: 12312 on Taguig Add Products', '2025-04-30 05:35:48', 0),
(3, 'MKTDexter', 'Update Item', 2, 'Updated product \'Ashape\' (ID: 2) on Makati Edit Product', '2025-04-30 05:58:03', 0),
(4, 'MKTDexter', 'View Item', 2, 'Viewed product \'Ashape\' (ID: 2) on View Item (Product Table Makati)', '2025-04-30 06:05:35', 0),
(5, 'MKTDexter', 'View Item', 2, 'Viewed product \'Ashape\' (ID: 2) on View Item (Product Table Makati)', '2025-04-30 06:06:25', 0),
(6, 'MKTDexter', 'View Item', 5, 'Viewed product \'ased\' (ID: 5) on View Item (Product Table Makati)', '2025-04-30 06:26:47', 0),
(7, 'MKTDexter', 'View Item', 5, 'Viewed product \'ased\' (ID: 5) on View Item (Product Table Makati)', '2025-04-30 06:26:48', 0),
(8, 'MKTDexter', 'View Item', 9, 'Viewed product \'asd\' (ID: 9) on View Item (Product Table Makati)', '2025-04-30 06:26:57', 0),
(9, 'MKTDexter', 'View Item', 11, 'Viewed product \'asd\' (ID: 11) on View Item (Product Table Makati)', '2025-04-30 06:27:08', 0),
(10, 'MKTDexter', 'Delete Item', 50, 'Deleted product \'thrftfh\' (ID: 50) from Makati Product Table', '2025-04-30 06:27:32', 0),
(11, 'MKTDexter', 'Release Item', 3, 'Released 10 x vcb (1231) to customer \'llorente\' [Order ID: 3]', '2025-04-30 06:58:18', 0),
(12, 'MKTDexter', 'View Customer', 3, '', '2025-04-30 07:01:01', 0),
(13, 'MKTDexter', 'View Customer', 3, 'Viewed order details for customer \'llorente\' (Order ID: 3) on View Order Page (Makati)', '2025-04-30 07:02:48', 0),
(14, 'MKTDexter', 'View Customer', 1, 'Viewed order details for customer \'Dexter\' (Order ID: 1) on Release records View Order Page (Makati)', '2025-04-30 07:17:19', 0),
(15, 'MKTDexter', 'View Item', 2, 'Viewed product \'Ashape\' (ID: 2) on View Item (Product Table Makati)', '2025-04-30 17:23:09', 0),
(16, 'MKTDexter', 'View Item', 2, 'Viewed product \'Ashape\' (ID: 2) on View Item (Product Table Makati)', '2025-04-30 17:23:46', 0),
(17, 'MKTDexter', 'Update Item', 2, 'Updated product \'bshape\' (ID: 2) on Makati Edit Product', '2025-04-30 17:25:35', 0),
(18, 'MKTDexter', 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-01 00:06:10', 0),
(19, 'MKTDexter', 'View Item', 26, 'Viewed product \'Aluminum Partition Frame\' (ID: 26) on View Item (Product Table Makati)', '2025-05-01 00:11:20', 0),
(20, 'MKTDexter', 'Update Item', 11, 'Updated product \'Bakal\' (ID: 11) on Makati Edit Product', '2025-05-01 00:14:43', 0),
(21, 'MKTDexter', 'Delete Item', 46, 'Deleted product \'xcv\' (ID: 46) from Makati Product Table', '2025-05-01 00:17:38', 0),
(22, 'MKTDexter', 'ADD', 51, 'Added new product: \'cvb\' (123), qty: 312 on Makati Add Products', '2025-05-01 00:18:44', 0),
(23, 'MKTDexter', 'ADD', 53, 'Added new product: \'iuoui\' (123), qty: 12312 on Taguig Add Products', '2025-05-01 00:22:07', 0),
(24, 'MKTDexter', 'ADD', 54, 'Added new product: \'yutyu\' (23123), qty: 123 on Taguig Add Products', '2025-05-01 00:22:31', 0),
(25, 'MKTDexter', 'Release Item', 4, 'Released 10 x Office Glass Partition Kit (300x250cm) to customer \'mheg\' [Order ID: 4]', '2025-05-01 00:27:34', 0),
(26, 'MKTDexter', 'View Customer', 4, 'Viewed order details for customer \'mheg\' (Order ID: 4) on Release records View Order Page (Makati)', '2025-05-01 00:31:03', 0),
(27, 'MKTDexter', 'View Customer', 4, 'Viewed order details for customer \'mheg\' (Order ID: 4) on Release records View Order Page (Makati)', '2025-05-01 00:32:24', 0),
(28, 'MKTDexter', 'Delete Order Item', 3, 'Deleted order items for order ID \'3\' (Customer: \'llorente\', Product: \'vcb in Makati Release Records\')', '2025-05-01 00:38:36', 0),
(29, 'MKTDexter', 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-02 01:56:49', 0),
(30, 'MKTDexter', 'View Customer', 2, 'Viewed order details for customer \'Louis\' (Order ID: 2) on Release records View Order Page (Makati Records Table)', '2025-05-02 01:56:56', 0),
(31, 'MKTDexter', 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-02 01:58:36', 0),
(32, 'MKTDexter', 'View Customer', 2, 'Viewed order details for customer \'Louis\' (Order ID: 2) on Release records View Order Page (Makati Records Table)', '2025-05-02 01:58:42', 0),
(33, 'MKTDexter', 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-02 12:20:35', 0),
(34, 'MKTDexter', 'View Item', 5, 'Viewed product \'ased\' (ID: 5) on View Item (Product Table Makati)', '2025-05-02 12:23:16', 0),
(35, 'MKTDexter', 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-02 12:24:48', 0),
(36, 'MKTDexter', 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-02 12:25:49', 0),
(37, 'MKTDexter', 'Delete Item', 9, 'Deleted product \'asd\' (ID: 9) from Makati Product Table', '2025-05-02 12:28:15', 0),
(38, 'MKTDexter', 'Delete Item', 10, 'Deleted product \'asd\' (ID: 10) from Makati Product Table', '2025-05-02 12:28:44', 0),
(39, 'MKTDexter', 'Delete Item', 49, 'Deleted product \'rytert\' (ID: 49) from Makati Product Table', '2025-05-02 12:29:11', 0),
(40, 'MKTDexter', 'Delete Item', 6, 'Deleted product \'asd\' (ID: 6) from Makati Product Table', '2025-05-02 12:29:54', 0),
(41, 'MKTDexter', 'Delete Item', 7, 'Deleted product \'asd\' (ID: 7) from Makati Product Table', '2025-05-02 12:30:06', 0),
(42, 'MKTDexter', 'Delete Item', 5, 'Deleted product \'ased\' (ID: 5) from Makati Product Table', '2025-05-02 12:30:23', 0),
(43, 'MKTDexter', 'Delete Item', 54, 'Deleted product \'yutyu\' (ID: 54) from Makati Product Table', '2025-05-02 12:30:39', 0),
(44, 'MKTDexter', 'Delete Item', 47, 'Deleted product \'vcb\' (ID: 47) from Makati Product Table', '2025-05-02 12:31:12', 0),
(45, 'MKTDexter', 'Delete Item', 2, 'Deleted product \'bshape\' (ID: 2) from Makati Product Table', '2025-05-02 12:31:39', 0),
(46, 'MKTDexter', 'Delete Item', 53, 'Deleted product \'iuoui\' (ID: 53) from Makati Product Table', '2025-05-02 12:32:46', 0),
(47, 'MKTDexter', 'Delete Item', 51, 'Deleted product \'cvb\' (ID: 51) from Makati Product Table', '2025-05-02 12:32:53', 0),
(48, 'MKTDexter', 'Delete Item', 11, 'Deleted product \'Bakal\' (ID: 11) from Makati Product Table', '2025-05-02 12:33:02', 0),
(49, 'MKTDexter', 'Delete Item', 4, 'Deleted product \'pako\' (ID: 4) from Makati Product Table', '2025-05-02 12:33:15', 0),
(50, 'MKTDexter', 'Delete Item', 52, 'Deleted product \'rtyrt\' (ID: 52) from Makati Product Table', '2025-05-02 12:33:23', 0),
(51, 'MKTDexter', 'Delete Item', 48, 'Deleted product \'bcvb\' (ID: 48) from Makati Product Table', '2025-05-02 12:33:28', 0),
(52, 'MKTDexter', 'Release Item', 17, 'Released 11 x Pivot Hinge Set (Heavy Duty) to customer \'vers\' [Order ID: 17]', '2025-05-02 13:08:36', 0),
(53, 'MKTDexter', 'Release Item', 18, 'Released 20 x SEALANT BRONZE (pc(s)) to customer \'cherwin\' [Order ID: 18]', '2025-05-02 13:11:51', 0),
(54, 'MKTDexter', 'Login', NULL, 'Taguig user MKTDexter has logged in', '2025-05-05 14:11:32', 0),
(55, 'MKTDexter', 'Login', NULL, 'Taguig user MKTDexter has logged in', '2025-05-05 14:16:26', 0),
(56, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 14:49:22', 0),
(57, 'MKTDexter', 'Update Item', 14, 'Updated product \'Aluminum bar\' (ID: 14) on Taguig Edit Product', '2025-05-05 15:21:33', 0),
(58, 'MKTDexter', 'View Item', 14, 'Viewed product \'Aluminum bar\' (ID: 14) on View Item (Product Table Makati)', '2025-05-05 15:25:06', 0),
(59, 'MKTDexter', 'Remove Item', 261, 'Removed item \'MF-SF DOUBLE (L)\' (ID: 261) from Taguig Products', '2025-05-05 15:27:04', 0),
(60, 'MKTDexter', 'ADD', 263, 'Added new product: \'bnmnmbnm\' (123123), qty: 1231 on Makati Add Products', '2025-05-05 15:29:52', 0),
(61, 'MKTDexter', 'Release Item', NULL, 'Released product \'HA-38 PERIMETER FRAME\' (Size: pc(s)) to customer \'llorente\' (Quantity: 10, Total Price: ₱4580)', '2025-05-05 15:38:46', 0),
(62, 'MKTDexter', 'Release Item', NULL, 'Released product \'HA-38 PANEL FRAME\' (Size: pc(s)) to customer \'mheg\' (Quantity: 10, Total Price: ₱6000)', '2025-05-05 15:40:18', 0),
(63, 'MKTDexter', 'Update Item', 247, 'Updated product \'HA-38 PANEL FRAME \' (ID: 247) on Taguig Edit Product', '2025-05-05 15:46:54', 0),
(64, 'MKTDexter', 'View Item', 19, 'Viewed product \'Tempered Glass Panel\' (ID: 19) on View Item (Product Table Makati)', '2025-05-05 15:53:34', 0),
(65, 'MKTDexter', 'View Item', 19, 'Viewed product \'Tempered Glass Panel\' (ID: 19) on View Item (Product Table Makati)', '2025-05-05 15:54:09', 0),
(66, 'MKTDexter', 'Delete Order Item', 17, 'Deleted order items for order ID \'17\' (Customer: \'vers\', Product: \'Pivot Hinge Set in Makati Release Records\')', '2025-05-05 15:57:22', 0),
(67, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 16:12:11', 0),
(68, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 16:13:58', 0),
(69, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 16:15:53', 0),
(70, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 16:19:59', 0),
(71, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 16:23:30', 0),
(72, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 16:33:12', 0),
(73, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 16:33:41', 0),
(74, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 16:34:09', 0),
(75, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 16:37:39', 0),
(76, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 16:41:42', 0),
(77, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 16:43:15', 0),
(78, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 21:18:33', 0),
(79, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-05 21:41:25', 0),
(80, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-06 01:20:41', 0),
(81, 'admin', 'Viewed Product Table', NULL, '', '2025-05-06 01:47:02', 0),
(82, 'admin', 'Viewed Product Table', NULL, '', '2025-05-06 01:47:02', 0),
(83, 'admin', 'Viewed Product Table', NULL, '', '2025-05-06 01:48:49', 0),
(84, 'admin', 'Viewed Product Table', NULL, '', '2025-05-06 01:48:55', 0),
(85, 'admin', 'Viewed on Makati Products', NULL, '', '2025-05-06 01:49:21', 0),
(86, 'MKTDexter', 'Login', NULL, 'Makati user MKTDexter has logged in', '2025-05-06 01:54:05', 0),
(87, 'admin', 'Viewed on Makati Products', NULL, '', '2025-05-06 01:54:24', 0),
(88, 'admin', 'Viewed on Makati Records', NULL, '', '2025-05-06 09:49:13', 0),
(89, 'admin', 'Super Admin Viewed on Makati Dashboard', NULL, '', '2025-05-06 09:51:01', 0),
(90, 'admin', 'Super Admin viewed on Makati Products', NULL, '', '2025-05-06 09:51:13', 0),
(91, 'admin', 'Super Admin viewed on Makati Records', NULL, '', '2025-05-06 09:51:18', 0),
(92, 'MKTDexter', 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-06 10:18:36', 0),
(93, 'admin', 'Super Admin viewed on Makati Dashboard', NULL, '', '2025-05-06 23:51:27', 0),
(94, 'admin', 'Super Admin viewed on Makati Dashboard', NULL, '', '2025-05-07 14:34:46', 0),
(95, 'admin', 'Super Admin viewed on Makati Dashboard', NULL, '', '2025-05-07 14:37:55', 0),
(96, 'admin', 'Super Admin viewed on Makati Dashboard', NULL, '', '2025-05-07 14:40:44', 0),
(97, 'admin', 'Super Admin viewed on Makati Dashboard', NULL, '', '2025-05-07 14:46:50', 0),
(98, 'admin', 'Super Admin viewed on Makati Dashboard', NULL, '', '2025-05-07 14:49:46', 0),
(99, 'MKTDexter', 'Login', NULL, 'Admin user MKTDexter has logged in Makati Branch', '2025-05-07 14:52:13', 0),
(100, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 00:46:45', 0),
(101, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 00:52:11', 0),
(102, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 00:52:56', 0),
(103, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:00:35', 0),
(104, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:07:35', 0),
(105, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:13:26', 0),
(106, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:14:25', 0),
(107, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:18:54', 0),
(108, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:19:43', 0),
(109, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:21:18', 0),
(110, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:23:48', 0),
(111, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:26:50', 0),
(112, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:29:08', 0),
(113, 'MKTDexter', 'Login', NULL, 'Makati Admin user MKTDexter has logged-in, in Makati Branch', '2025-05-08 01:31:47', 0),
(114, 'MKTDexter', 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:45:41', 0),
(115, 'MKTDexter', 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:52:00', 0),
(116, 'MKTDexter', 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:56:14', 0),
(117, 'MKTDexter', 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:57:02', 0),
(118, 'MKTDexter', 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:58:18', 0),
(119, 'MKTDexter', 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 01:59:57', 0),
(120, 'MKTDexter', 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 02:01:23', 0),
(121, 'MKTDexter', 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 02:06:00', 0),
(122, 'MKTDexter', 'Login', NULL, 'Admin user MKTDexter has logged in', '2025-05-08 07:58:41', 0),
(123, 'cheradmin', 'Super Admin viewed on Makati Products', NULL, '', '2025-05-08 08:13:24', 0),
(124, 'cheradmin', 'Super Admin viewed on Makati Records', NULL, '', '2025-05-08 08:14:56', 0),
(125, 'cheradmin', 'Super Admin viewed on Makati Products', NULL, '', '2025-05-08 08:14:59', 0),
(126, 'cheradmin', 'Super Admin viewed on Makati Dashboard', NULL, '', '2025-05-08 08:15:01', 0),
(127, 'cheradmin', 'Super Admin viewed on Makati Dashboard', NULL, '', '2025-05-08 08:38:46', 0);

-- --------------------------------------------------------

--
-- Table structure for table `makati_customers`
--

CREATE TABLE `makati_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makati_customers`
--

INSERT INTO `makati_customers` (`id`, `name`, `contact`, `address`) VALUES
(1, 'Dexter', 2147483647, 'Lanzones'),
(2, 'Louis', 9123456, 'Lanzones'),
(3, 'llorente', 12312, '12333'),
(4, 'mheg', 12312, 'atis'),
(5, 'llorente', 13123, '123123'),
(6, 'llorente', 13123, '123123'),
(7, 'llorente', 13123, '123123'),
(8, 'llorente', 13123, '123123'),
(9, 'llorente', 13123, '123123'),
(10, 'dexter', 123123, 'atis'),
(11, 'dexter', 123123, 'atis'),
(12, 'dexter', 12312312, '123123'),
(13, 'vers', 123, 'qc'),
(14, 'vers', 123, 'qc'),
(15, 'vers', 123, 'qc'),
(16, 'vers', 123, 'qc'),
(17, 'vers', 123, 'qc'),
(18, 'cherwin', 22, 'wewew'),
(19, 'dexter', 123123, '123123'),
(20, 'llorente', 123123, '123123'),
(21, 'llorente', 123123, '12312312'),
(22, 'mheg', 123123, 'atis');

-- --------------------------------------------------------

--
-- Table structure for table `makati_orders`
--

CREATE TABLE `makati_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makati_orders`
--

INSERT INTO `makati_orders` (`id`, `customer_id`, `order_date`) VALUES
(1, 1, '2025-03-23 13:28:52'),
(2, 2, '2025-04-15 13:37:41'),
(3, 3, '2025-04-29 22:58:18'),
(4, 4, '2025-04-30 16:27:34'),
(5, 5, '2025-05-02 04:51:14'),
(6, 6, '2025-05-02 04:51:52'),
(7, 7, '2025-05-02 04:52:01'),
(8, 8, '2025-05-02 04:53:46'),
(9, 9, '2025-05-02 05:01:20'),
(10, 10, '2025-05-02 05:02:33'),
(11, 11, '2025-05-02 05:02:37'),
(12, 12, '2025-05-02 05:04:02'),
(13, 13, '2025-05-02 05:06:47'),
(14, 14, '2025-05-02 05:06:49'),
(15, 15, '2025-05-02 05:06:54'),
(16, 16, '2025-05-02 05:07:35'),
(17, 17, '2025-05-02 05:08:36'),
(18, 18, '2025-05-02 05:11:51'),
(19, 19, '2025-05-05 07:32:08'),
(20, 20, '2025-05-05 07:36:56'),
(21, 21, '2025-05-05 07:38:46'),
(22, 22, '2025-05-05 07:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `makati_order_items`
--

CREATE TABLE `makati_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `total_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makati_order_items`
--

INSERT INTO `makati_order_items` (`id`, `order_id`, `product_name`, `size`, `quantity`, `price`, `total_price`) VALUES
(1, 1, 'Pako', 'Small', 2, 5, 10),
(2, 2, 'Aluminum bar', 'Large', 1, 250, 250),
(15, 18, 'SEALANT BRONZE', 'pc(s)', 20, 115, 2300),
(16, 19, 'SD ROLLER SINGLE BRASS', 'pc(s)', 5, 37, 185);

-- --------------------------------------------------------

--
-- Table structure for table `makati_released_products`
--

CREATE TABLE `makati_released_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `release_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `group` tinyint(1) DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `file_path` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `message_type` enum('text','image') DEFAULT 'text',
  `created_at` datetime DEFAULT current_timestamp(),
  `sender_deleted` tinyint(1) DEFAULT 0,
  `receiver_deleted` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `is_read`, `group`, `timestamp`, `file_path`, `image`, `message_type`, `created_at`, `sender_deleted`, `receiver_deleted`) VALUES
(342, 127, 117, 'kantutan', 1, 0, '2025-05-02 04:39:35', NULL, NULL, 'text', '2025-05-02 12:39:35', 0, 0),
(344, 127, 117, 'KASALANAN NG MGA BADING YAN', 1, 0, '2025-05-02 04:39:42', NULL, NULL, 'text', '2025-05-02 12:39:42', 0, 0),
(345, 118, 117, 'hi', 1, 0, '2025-05-02 04:39:52', NULL, NULL, 'text', '2025-05-02 12:39:52', 0, 0),
(346, 118, 117, 'test', 1, 0, '2025-05-02 04:40:04', NULL, NULL, 'text', '2025-05-02 12:40:04', 0, 0),
(347, 117, 118, 'hehehehehe', 1, 0, '2025-05-02 04:40:18', NULL, NULL, 'text', '2025-05-02 12:40:18', 0, 0),
(348, 117, 127, 'jhgyujhwewew', 1, 0, '2025-05-02 04:40:24', NULL, NULL, 'text', '2025-05-02 12:40:24', 0, 0),
(350, 117, 127, 'skgeeee', 1, 0, '2025-05-02 04:40:34', NULL, NULL, 'text', '2025-05-02 12:40:34', 0, 0),
(353, 117, 127, '', 1, 0, '2025-05-02 04:41:08', 'uploads/1746160868_img.png', NULL, 'text', '2025-05-02 12:41:08', 0, 0),
(354, 117, 116, '', 1, 0, '2025-05-02 04:41:28', 'uploads/1746160888_nigs.png', NULL, 'text', '2025-05-02 12:41:28', 1, 0),
(356, 118, 117, 'hi', 1, 0, '2025-05-02 04:41:53', NULL, NULL, 'text', '2025-05-02 12:41:53', 0, 0),
(357, 117, 118, '', 1, 0, '2025-05-02 04:41:59', 'uploads/1746160919_nigs.png', NULL, 'text', '2025-05-02 12:41:59', 0, 0),
(360, 127, 117, 'HELLO', 1, 0, '2025-05-02 04:42:36', NULL, NULL, 'text', '2025-05-02 12:42:36', 0, 0),
(361, 127, 118, 'HI PO', 1, 0, '2025-05-02 04:42:45', NULL, NULL, 'text', '2025-05-02 12:42:45', 1, 0),
(362, 116, 126, 'cher', 0, 0, '2025-05-02 04:43:20', NULL, NULL, 'text', '2025-05-02 12:43:20', 0, 0),
(363, 127, 116, 'HI', 0, 0, '2025-05-02 04:43:26', NULL, NULL, 'text', '2025-05-02 12:43:26', 0, 0),
(364, 127, 116, 'SIR', 0, 0, '2025-05-02 04:43:36', NULL, NULL, 'text', '2025-05-02 12:43:36', 0, 0),
(365, 116, 117, 'cher', 1, 0, '2025-05-02 04:44:02', NULL, NULL, 'text', '2025-05-02 12:44:02', 0, 0),
(366, 127, 118, 'SIR', 1, 0, '2025-05-02 04:44:08', NULL, NULL, 'text', '2025-05-02 12:44:08', 1, 0),
(367, 116, 117, 'alam moba?', 1, 0, '2025-05-02 04:44:17', NULL, NULL, 'text', '2025-05-02 12:44:17', 0, 0),
(368, 127, 118, '', 1, 0, '2025-05-02 04:44:24', 'uploads/1746161064_Bye_Bye_base.png', NULL, 'text', '2025-05-02 12:44:24', 1, 0),
(369, 116, 117, 'mahal mona', 1, 0, '2025-05-02 04:44:25', NULL, NULL, 'text', '2025-05-02 12:44:25', 0, 0),
(370, 116, 117, 'wala tayo magagawa', 1, 0, '2025-05-02 04:44:35', NULL, NULL, 'text', '2025-05-02 12:44:35', 0, 0),
(371, 116, 117, 'mahal mona e', 1, 0, '2025-05-02 04:44:43', NULL, NULL, 'text', '2025-05-02 12:44:43', 0, 0),
(372, 116, 117, 'ebat adan', 1, 0, '2025-05-02 04:44:47', NULL, NULL, 'text', '2025-05-02 12:44:47', 0, 0),
(373, 116, 117, 'ebat adan', 1, 0, '2025-05-02 04:44:53', NULL, NULL, 'text', '2025-05-02 12:44:53', 0, 0),
(374, 116, 112, 'testing', 1, 0, '2025-05-02 06:48:23', NULL, NULL, 'text', '2025-05-02 14:48:23', 0, 0),
(375, 117, 112, 'hi', 1, 0, '2025-05-02 06:48:29', NULL, NULL, 'text', '2025-05-02 14:48:29', 0, 0),
(376, 118, 112, 'hi love kumain kana?', 1, 0, '2025-05-02 06:48:42', NULL, NULL, 'text', '2025-05-02 14:48:42', 0, 0),
(377, 116, 112, 'keri pa today?', 1, 0, '2025-05-02 06:48:49', NULL, NULL, 'text', '2025-05-02 14:48:49', 0, 0),
(378, 117, 112, 'hm po hallowblocks?', 1, 0, '2025-05-02 06:48:53', NULL, NULL, 'text', '2025-05-02 14:48:53', 0, 0),
(379, 112, 116, 'oo', 1, 0, '2025-05-02 06:49:45', NULL, NULL, 'text', '2025-05-02 14:49:45', 0, 0),
(380, 116, 112, '', 1, 0, '2025-05-02 06:50:07', 'uploads/1746168607_img.png', NULL, 'text', '2025-05-02 14:50:07', 0, 0),
(381, 116, 112, 'hello po', 1, 0, '2025-05-02 06:50:26', NULL, NULL, 'text', '2025-05-02 14:50:26', 0, 0),
(382, 117, 112, '', 1, 0, '2025-05-02 06:50:30', 'uploads/1746168630_523.jpg', NULL, 'text', '2025-05-02 14:50:30', 0, 0),
(383, 116, 112, 'pabili longganisa', 1, 0, '2025-05-02 06:50:46', NULL, NULL, 'text', '2025-05-02 14:50:46', 0, 0),
(384, 117, 112, 'https://meet.google.com/yct-sayy-hzs', 1, 0, '2025-05-02 06:52:07', NULL, NULL, 'text', '2025-05-02 14:52:07', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mkt_add_prod_data`
--

CREATE TABLE `mkt_add_prod_data` (
  `product_id` int(11) NOT NULL,
  `name` varchar(400) NOT NULL,
  `size` varchar(400) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity_on_hand` int(11) NOT NULL,
  `category` varchar(400) NOT NULL,
  `status` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mkt_add_prod_data`
--

INSERT INTO `mkt_add_prod_data` (`product_id`, `name`, `size`, `price`, `quantity_on_hand`, `category`, `status`) VALUES
(14, 'Aluminum bar', 'Large', 250, 500, 'metal', 'in-stock'),
(16, 'Aluminum Window Frame Small', '100x120cm', 140, 120, 'Window Frames', 'Active'),
(17, 'Aluminum Window Frame Large', '150x180cm', 170, 105, 'Window Frames', 'Active'),
(18, 'Clear Glass Panel', '200x100cm', 90, 360, 'Glass Panels', 'Active'),
(19, 'Tempered Glass Panel', '220x110cm', 130, 240, 'Glass Panels', 'Active'),
(20, 'Tinted Glass Sheet', '200x90cm', 110, 300, 'Glass Panels', 'Active'),
(21, 'Frosted Glass Sheet', '180x80cm', 115, 210, 'Glass Panels', 'Active'),
(22, 'Sliding Door Kit', '180x210cm', 310, 75, 'Doors', 'Active'),
(23, 'Frameless Glass Door', '90x210cm', 400, 45, 'Doors', 'Active'),
(24, 'Shower Glass Door', '90x200cm', 230, 26, 'Bathroom', 'Active'),
(25, 'Aluminum Sliding Door Frame', '180x200cm', 320, 50, 'Doors', 'Active'),
(26, 'Aluminum Partition Frame', '100x250cm', 190, 150, 'Partitions', 'Active'),
(27, 'Glass Partition Panel', '100x240cm', 150, 180, 'Partitions', 'Active'),
(28, 'Glass Railing Panel', '120x90cm', 140, 120, 'Railings', 'Active'),
(29, 'Aluminum Railing Post', '10x100cm', 70, 270, 'Railings', 'Active'),
(30, 'Aluminum Handrail', '300cm', 85, 300, 'Railings', 'Active'),
(31, 'Glass Balustrade', '90x100cm', 250, 90, 'Railings', 'Active'),
(32, 'Sliding Window Roller', 'Standard', 8, 900, 'Accessories', 'Active'),
(33, 'Window Lock Handle', 'Universal', 12, 750, 'Accessories', 'Active'),
(34, 'Door Lockset', 'Standard', 25, 450, 'Accessories', 'Active'),
(35, 'Silicone Sealant', '300ml', 6, 1200, 'Accessories', 'Active'),
(36, 'Glass Connector Clamp', 'Stainless', 20, 540, 'Accessories', 'Active'),
(37, 'Rubber Gasket for Glass', '10m Roll', 15, 600, 'Accessories', 'Active'),
(38, 'Sliding Door Handle', 'Aluminum', 35, 270, 'Accessories', 'Active'),
(39, 'Pivot Hinge Set', 'Heavy Duty', 60, 98, 'Accessories', 'Active'),
(40, 'Aluminum Angle Bar', '2\"x2\" 6m', 55, 300, 'Materials', 'Active'),
(41, 'Flat Bar Aluminum', '1\"x6m', 45, 330, 'Materials', 'Active'),
(42, 'U-Channel Aluminum', '1\"x6m', 48, 285, 'Materials', 'Active'),
(43, 'Tempered Glass Shelf', '60x30cm', 50, 210, 'Glass Accessories', 'Active'),
(44, 'Frameless Shower Enclosure', '100x200cm', 700, 30, 'Bathroom', 'Active'),
(45, 'Office Glass Partition Kit', '300x250cm', 850, 14, 'Partitions', 'Active'),
(55, '798 PANEL ROLLER DOUBLE', 'pc(s)', 38, 20, '', 'in stocks'),
(56, '798 PANEL ROLLER SINGLE', 'pc(s)', 14, 30, '', 'in stocks'),
(57, '900 PANEL  ROLLER DOUBLE', 'pc(s)', 40, 20, '', 'in stocks'),
(58, '900 PANEL  ROLLER SINGLE ', 'pc(s)', 30, 30, '', 'in stocks'),
(59, 'ALCO CROSS BAR H/A', 'length(s) 21\'', 990, 10, '', 'in stocks'),
(60, 'ALCO FRAME PCW', 'length(s) 21\'', 845, 8, '', 'in stocks'),
(61, 'ALFA LOCK ANALOC', 'pc(s)', 220, 20, '', 'in stocks'),
(62, 'ALFA LOCK ANODIZE', 'pc(s)', 230, 20, '', 'in stocks'),
(63, 'ANGULAR  3/4\" x 3/4\" A', 'length(s) 21\'', 167, 10, '', 'in stocks'),
(64, 'ANGULAR  3/4\" x 3/4\" H/A', 'length(s) 21\'', 188, 10, '', 'in stocks'),
(65, 'ANGULAR 1/2\" x 1/2\" A', 'length(s) 12\'', 65, 10, '', 'in stocks'),
(66, 'ANGULAR 1/2\" x 1/2\" H/A', 'length(s) 12\'', 73, 7, '', 'in stocks'),
(67, 'ANGULAR 1/2\" x 1/2\" PCW', 'length(s) 12\'', 59, 7, '', 'in stocks'),
(68, 'BARREL BOLT A', 'pc(s)', 16, 41, '', 'in stocks'),
(69, 'BARREL BOLT HA', 'pc(s)', 16, 22, '', 'in stocks'),
(70, 'BENDED HANDLE ALUM  A', 'pc(s)', 27, 14, '', 'in stocks'),
(71, 'BENDED HANDLE ALUM H/A', 'pc(s)', 29, 16, '', 'in stocks'),
(72, 'BENDED HANDLE ALUM SW', 'pc(s)', 39, 5, '', 'in stocks'),
(73, 'BENDED HANDLE PLASTIC LD A', 'pc(s)', 27, 20, '', 'in stocks'),
(74, 'BENDED HANDLE PLASTIC LD H/A ', 'pc(s)', 29, 70, '', 'in stocks'),
(75, 'BUS  BALANCER A', 'pc(s)', 80, 18, '', 'in stocks'),
(76, 'BUS  BALANCER H/A', 'pc(s)', 80, 21, '', 'in stocks'),
(77, 'BUS BODY H/A', 'length(s) 21\'', 485, 2, '', 'in stocks'),
(78, 'CABINET HANDLE SS', 'pc(s)', 35, 20, '', 'in stocks'),
(79, 'CAHA 1/4\" UPPER / LOWER H/A', 'length(s) 12\'', 226, 3, '', 'in stocks'),
(80, 'CAHA UPPER/LOWER 1/4\"  A', 'length(s) 12\'', 201, 5, '', 'in stocks'),
(81, 'CAM HANDLE 38 H/A', 'pc(s)', 93, 12, '', 'in stocks'),
(82, 'CAM HANDLE YC H/A', 'pc(s)', 52, 3, '', 'in stocks'),
(83, 'CAM HANDLE YC S/W', 'pc(s)', 57, 9, '', 'in stocks'),
(84, 'CENTER LOCK BLACK BIG', 'pc(s)', 250, 18, '', 'in stocks'),
(85, 'CLIP TYPE #969B SINGLE SMALL', 'pc(s)', 48, 6, '', 'in stocks'),
(86, 'CONCEALED SS HINGES', 'set(s)', 55, 3, '', 'in stocks'),
(87, 'CORNER BRACKET 798 YS221', 'pc(s)', 9, 4, '', 'in stocks'),
(88, 'CORNER BRACKET SD YS221', 'pc(s)', 9, 137, '', 'in stocks'),
(89, 'DOOR CLOSER ARM TYPE A', 'pc(s)', 650, 1, '', 'in stocks'),
(90, 'DOOR CLOSER TUBE TYPE A', 'pc(s)', 155, 15, '', 'in stocks'),
(91, 'DOOR CLOSER TUBE TYPE H/A', 'pc(s)', 160, 11, '', 'in stocks'),
(92, 'DRAWER KNOB ORDINARY', 'pc(s)', 25, 10, '', 'in stocks'),
(93, 'DRAWER KNOB WOOD FINISH', 'pc(s)', 25, 15, '', 'in stocks'),
(94, 'FD C-TYPE HANDLE 10 x 25 x 300', 'set(s)', 440, 2, '', 'in stocks'),
(95, 'FLUSH LOCK # 10 ANALOC (W/O HOLE)', 'pc(s)', 27, 16, '', 'in stocks'),
(96, 'FLUSH LOCK # 10 ANODIZE (W/O HOLE)', 'pc(s)', 27, 87, '', 'in stocks'),
(97, 'FLUSH LOCK # 10 WHITE (W/O HOLE)', 'pc(s)', 27, 2, '', 'in stocks'),
(98, 'FLUSH LOCK # 11 ANALOC', 'pc(s)', 27, 16, '', 'in stocks'),
(99, 'FLUSH LOCK # 11 ANODIZE ', 'pc(s)', 27, 141, '', 'in stocks'),
(100, 'FLUSH LOCK # 12 -13 WITH KEY H/A', 'pc(s)', 105, 12, '', 'in stocks'),
(101, 'FLUSH LOCK # 12 -13 WITH KEY A', 'pc(s)', 105, 2, '', 'in stocks'),
(102, 'FLUSH LOCK # 12 -13 WITH KEY S/W', 'set(s)', 105, 4, '', 'in stocks'),
(103, 'FLUSH LOCK # 12 H/A', 'pc(s)', 38, 24, '', 'in stocks'),
(104, 'FLUSH LOCK # 12 A', 'pc(s)', 38, 39, '', 'in stocks'),
(105, 'FLUSH LOCK # 12 S/W', 'pc(s)', 38, 1, '', 'in stocks'),
(106, 'FLUSH LOCK 900 DURABLE', 'pc(s)', 190, 2, '', 'in stocks'),
(107, 'FLUSH LOCK AUTO #12 A', 'pc(s)', 27, 5, '', 'in stocks'),
(108, 'FLUSH LOCK AUTO #12 H/A', 'pc(s)', 27, 4, '', 'in stocks'),
(109, 'FLUSH LOCK AUTO #12 S/W', 'pc(s)', 27, 52, '', 'in stocks'),
(110, 'FOUR BAR HINGES # 8 S/S', 'pc(s)', 65, 6, '', 'in stocks'),
(111, 'GLASS CLIP 1/4\"  A', 'length(s) 12\'', 60, 3, '', 'in stocks'),
(112, 'GLASS CLIP 1/4\"  H/A', 'length(s) 12\'', 67, 3, '', 'in stocks'),
(113, 'GLASS CLIP 1/4\"  PCW', 'length(s) 12\'', 74, 3, '', 'in stocks'),
(114, 'GLASS LOCK ANODIZE', 'pc(s)', 53, 1, '', 'in stocks'),
(115, 'HALF MOON LOCK  BLACK SMALL', 'pc(s)', 48, 7, '', 'in stocks'),
(116, 'HALFMOON LOCK RIGHT 900 BLACK ', 'pc(s)', 80, 6, '', 'in stocks'),
(117, 'HAN 125 BLACK #71', 'pc(s)', 70, 1, '', 'in stocks'),
(118, 'HAN 126 B WHITE #64', 'pc(s)', 58, 1, '', 'in stocks'),
(119, 'HAN 126 C WHITE #80', 'pc(s)', 126, 1, '', 'in stocks'),
(120, 'HINGES  1\" x 3\" A', 'pc(s)', 7, 15, '', 'in stocks'),
(121, 'HINGES  1\" x 3\" H/A', 'pc(s)', 8, 28, '', 'in stocks'),
(122, 'HINGES  1\" x 3\" S/S', 'pc(s)', 14, 15, '', 'in stocks'),
(123, 'JALOUSIE FRAME IRON  6 BLADES H/A ', 'set(s)', 198, 2, '', 'in stocks'),
(124, 'JALOUSIE FRAME IRON  7 BLADES H/A ', 'set(s)', 231, 4, '', 'in stocks'),
(125, 'JALOUSIE FRAME IRON  8 BLADES H/A ', 'set(s)', 264, 1, '', 'in stocks'),
(126, 'JALOUSIE FRAME IRON  9 BLADES H/A ', 'set(s)', 297, 2, '', 'in stocks'),
(127, 'JALOUSIE FRAME IRON  11 BLADES H/A ', 'set(s)', 363, 2, '', 'in stocks'),
(128, 'JALOUSIE FRAME IRON  12 BLADES H/A ', 'set(s)', 396, 4, '', 'in stocks'),
(129, 'JALOUSIE FRAME IRON  13 BLADES H/A ', 'set(s)', 429, 4, '', 'in stocks'),
(130, 'MAGNETIC HINGE DOUBLE', 'set(s)', 100, 8, '', 'in stocks'),
(131, 'MAGNETIC HINGE SINGLE', 'set(s)', 58, 6, '', 'in stocks'),
(132, 'MIRROR MASTIC (GUNTHER)', 'pc(s)', 350, 1, '', 'in stocks'),
(133, 'PATCH BOTTOM S/S #4', 'pc(s)', 210, 1, '', 'in stocks'),
(134, 'PATCH LOCK S/S #5', 'pc(s)', 480, 2, '', 'in stocks'),
(135, 'PATCH TOP S/S #2', 'pc(s)', 210, 1, '', 'in stocks'),
(136, 'PIANO HINGES 6 FEET', 'pc(s)', 189, 1, '', 'in stocks'),
(137, 'PLASTIC ROLLER (1/4 CAHA) ', 'length(s) 12\'', 169, 3, '', 'in stocks'),
(138, 'REVITS 1/8\" x 1/2\" A', 'box(es)', 230, 7, '', 'in stocks'),
(139, 'REVITS 1/8\" x 1/2\" A', 'pc(s)', 0, 708, '', 'in stocks'),
(140, 'REVITS 1/8\" x 1/2\" H/A', 'box(es)', 280, 7, '', 'in stocks'),
(141, 'RUBBER BUMPER BIG', 'pc(s)', 1, 15, '', 'in stocks'),
(142, 'RUBBER PLUG WHITE', 'pc(s)', 1, 19, '', 'in stocks'),
(143, 'SAMSON HANDLE  H/A', 'set(s)', 265, 1, '', 'in stocks'),
(144, 'SCREEN FRAME 798 4-KINDS', 'pc(s)', 5, 97, '', 'in stocks'),
(145, 'SCREEN FRAME 798 LOWER GUIDE', 'pc(s)', 5, 71, '', 'in stocks'),
(146, 'SCREEN FRAME 798 TOP GUIDE', 'pc(s)', 5, 73, '', 'in stocks'),
(147, 'SCREEN FRAME SD LOWER GUIDE', 'pc(s)', 5, 1, '', 'in stocks'),
(148, 'SCREEN FRAME SD TOP GUIDE', 'pc(s)', 5, 1, '', 'in stocks'),
(149, 'SCREEN HANDLE BLACK', 'pc(s)', 6, 13, '', 'in stocks'),
(150, 'SCREEN HANDLE WHITE', 'pc(s)', 6, 11, '', 'in stocks'),
(151, 'SCREEN HOOK A', 'pc(s)', 5, 216, '', 'in stocks'),
(152, 'SCREEN HOOK H/A', 'pc(s)', 5, 314, '', 'in stocks'),
(153, 'SCREEN MESH  36\" H/A', 'roll(s)', 3, 1, '', 'in stocks'),
(154, 'SCREEN MESH  48\" H/A', 'roll(s)', 4, 1, '', 'in stocks'),
(155, 'SCREW, METAL 12 x 3\" A', 'pc(s)', 2, 84, '', 'in stocks'),
(156, 'SCREW, METAL 12 x 3\" H/A', 'pc(s)', 3, 61, '', 'in stocks'),
(157, 'SCREW, METAL 6 3/8\" A', 'pc(s)', 0, 4220, '', 'in stocks'),
(158, 'SCREW, METAL 6 x 1\" A', 'pc(s)', 0, 173, '', 'in stocks'),
(159, 'SCREW, METAL 6 x 1\" H/A', 'pc(s)', 1, 1288, '', 'in stocks'),
(160, 'SCREW, METAL 6 x 1/2\" A', 'pc(s)', 0, 138, '', 'in stocks'),
(161, 'SCREW, METAL 6 x 1/2\" H/A', 'pc(s)', 0, 44, '', 'in stocks'),
(162, 'SCREW, METAL 6 x 1/4\" A', 'pc(s)', 0, 276, '', 'in stocks'),
(163, 'SCREW, METAL 6 x 1/4\" H/A', 'pc(s)', 0, 1670, '', 'in stocks'),
(164, 'SCREW, METAL 6 x 3/4\" A', 'pc(s)', 0, 276, '', 'in stocks'),
(165, 'SCREW, METAL 8 x 1 1/2\" A', 'pc(s)', 1, 484, '', 'in stocks'),
(166, 'SCREW, METAL 8 x 1 1/2\" H/A', 'pc(s)', 1, 103, '', 'in stocks'),
(167, 'SCREW, METAL 8 x 1\" H/A', 'pc(s)', 1, 248, '', 'in stocks'),
(168, 'SCREW, METAL 8 x 1/2\" A', 'pc(s)', 0, 81, '', 'in stocks'),
(169, 'SCREW, METAL 8 x 1/2\" H/A', 'pc(s)', 1, 114, '', 'in stocks'),
(170, 'SCREW, METAL 8 x 2\" A', 'pc(s)', 1, 77, '', 'in stocks'),
(171, 'SCREW, METAL 8 x 2\" H/A', 'pc(s)', 2, 340, '', 'in stocks'),
(172, 'SCREW, WOOD 8 x 1 1/2\" H/A', 'pc(s)', 1, 54, '', 'in stocks'),
(173, 'SD BOTTOM RAIL H/A', 'length(s) 21\'', 676, 1, '', 'in stocks'),
(174, 'SD BOTTOM RAIL PCW', 'length(s) 21\'', 701, 1, '', 'in stocks'),
(175, 'SD DOUBLE HEAD H/A', 'length(s) 21\'', 632, 1, '', 'in stocks'),
(176, 'SD DOUBLE HEAD PCW', 'length(s) 21\'', 656, 1, '', 'in stocks'),
(177, 'SD DOUBLE JAMB H/A', 'length(s) 21\'', 605, 1, '', 'in stocks'),
(178, 'SD DOUBLE JAMB PCW', 'length(s) 21\'', 579, 1, '', 'in stocks'),
(179, 'SD DOUBLE SILL H/A', 'length(s) 21\'', 586, 1, '', 'in stocks'),
(180, 'SD DOUBLE SILL PCW', 'length(s) 21\'', 607, 1, '', 'in stocks'),
(181, 'SD INTERLOCKER H/A', 'length(s) 21\'', 646, 1, '', 'in stocks'),
(182, 'SD INTERLOCKER PCW', 'length(s) 21\'', 670, 2, '', 'in stocks'),
(183, 'SD LOCKSTILE H/A', 'length(s) 21\'', 586, 1, '', 'in stocks'),
(184, 'SD LOCKSTILE PCW', 'length(s) 21\'', 607, 2, '', 'in stocks'),
(185, 'SD ROLLER DOUBLE UNICORN', 'pc(s)', 44, 5, '', 'in stocks'),
(186, 'SD ROLLER SINGLE ', 'pc(s)', 14, 15, '', 'in stocks'),
(187, 'SD ROLLER SINGLE BRASS', 'pc(s)', 37, 6, '', 'in stocks'),
(188, 'SD SCREEN ASTRAGAL H/A', 'length(s) 21\'', 205, 1, '', 'in stocks'),
(189, 'SD SCREEN ASTRAGAL PCW', 'length(s) 21\'', 212, 1, '', 'in stocks'),
(190, 'SD TOP RAIL H/A', 'length(s) 21\'', 382, 2, '', 'in stocks'),
(191, 'SD TOP RAIL PCW', 'length(s) 21\'', 396, 1, '', 'in stocks'),
(192, 'SD YS221 H/A', 'length(s) 21\'', 359, 2, '', 'in stocks'),
(193, 'SD YS221PCW', 'length(s) 21\'', 373, 2, '', 'in stocks'),
(194, 'SEALANT BLACK', 'pc(s)', 120, 60, '', 'in stocks'),
(195, 'SEALANT BRONZE', 'pc(s)', 115, 20, '', 'in stocks'),
(196, 'SEALANT CLEAR', 'pc(s)', 110, 40, '', 'in stocks'),
(197, 'SEALANT WHITE', 'pc(s)', 120, 20, '', 'in stocks'),
(198, 'SF DOUBLE CANAL A', 'length(s) 21\'', 123, 40, '', 'in stocks'),
(199, 'SF DOUBLE CANAL H/A', 'length(s) 21\'', 124, 30, '', 'in stocks'),
(200, 'SF101-102 A', 'length(s) 21\'', 666, 20, '', 'in stocks'),
(201, 'SF101-102 H/A', 'length(s) 21\'', 677, 30, '', 'in stocks'),
(202, 'SF106-102 H/A', 'length(s) 21\'', 834, 20, '', 'in stocks'),
(203, 'SNAP ON BASE WITH COVER PCW', 'length(s) 21\'', 450, 10, '', 'in stocks'),
(204, 'STILE WITH GROOVE H/A', 'length(s) 21\'', 846, 10, '', 'in stocks'),
(205, 'STILE WITH GROOVE PCW', 'length(s) 21\'', 882, 10, '', 'in stocks'),
(206, 'TOX #8', 'box(es)', 55, 20, '', 'in stocks'),
(207, 'TUBULAR 1 1/2\" x 1 1/2\" PCW', 'length(s) 21\'', 565, 10, '', 'in stocks'),
(208, 'TUBULAR 1 3/4\" x 1 3/4\" PCW', 'length(s) 21\'', 689, 10, '', 'in stocks'),
(209, 'TUBULAR 1\" x 1 1/2\" A', 'length(s) 21\'', 381, 20, '', 'in stocks'),
(210, 'TUBULAR 1\" x 1 1/2\" H/A', 'length(s) 21\'', 680, 20, '', 'in stocks'),
(211, 'TUBULAR 1\" x 1\" H/A', 'length(s) 21\'', 349, 20, '', 'in stocks'),
(212, 'TUBULAR 1\" x 2\" A', 'length(s) 21\'', 537, 10, '', 'in stocks'),
(213, 'TUBULAR 1\" x 2\" H/A', 'length(s) 21\'', 547, 30, '', 'in stocks'),
(214, 'TUBULAR 1\" x 2\" PCW', 'length(s) 21\'', 566, 10, '', 'in stocks'),
(215, 'WF LOCKSET H/A', 'pc(s)', 370, 10, '', 'in stocks'),
(216, 'BIG MULLION SET 2.5mm', 'pc(s)', 5, 10, '', 'in stocks'),
(217, 'BIG MULLION SET 2mm', 'pc(s)', 5, 10, '', 'in stocks'),
(218, 'MINI MULLION SET', 'pc(s)', 3, 10, '', 'in stocks'),
(219, 'TUBULAR 3X3X2.5MM', 'pc(s)', 3, 10, '', 'in stocks'),
(220, 'TUBULAR 3X6X2.5MM', 'pc(s)', 5, 10, '', 'in stocks'),
(221, 'BIG MULLION BASE', 'pc(s)', 3, 15, '', 'in stocks'),
(222, 'BIG MULLION  COVER', 'pc(s)', 915, 15, '', 'in stocks'),
(223, 'BIG MULLION ADAPTER', 'pc(s)', 976, 15, '', 'in stocks'),
(224, 'MINI MULLION BASE', 'pc(s)', 2, 8, '', 'in stocks'),
(225, 'MINI MULLION COVER', 'pc(s)', 640, 8, '', 'in stocks'),
(226, 'MINI MULLION ADAPTER', 'pc(s)', 589, 8, '', 'in stocks'),
(227, 'TUBULAR 1 3/4 X 3 (1.3MM)', 'pc(s)', 1, 15, '', 'in stocks'),
(228, 'TUBULAR 1 3/4 X 3 (1MM)', 'pc(s)', 1, 15, '', 'in stocks'),
(229, 'TUBULAR 1 3/4 X 4 (1.2MM)', 'pc(s)', 2, 15, '', 'in stocks'),
(230, 'TUBULAR 1 3/4 X 4 (.8MM)', 'pc(s)', 1, 15, '', 'in stocks'),
(231, '1/4 BRONZE 3X7', 'pc(s)', 1, 10, '', 'in stocks'),
(232, '1/4 BRONZE 4X6', 'pc(s)', 1, 15, '', 'in stocks'),
(233, '1/4 BRONZE 4X7', 'pc(s)', 1, 15, '', 'in stocks'),
(234, '1/4 BRONZE 4X8', 'pc(s)', 1, 15, '', 'in stocks'),
(235, '1/4 BRONZE 5X7', 'pc(s)', 1, 10, '', 'in stocks'),
(236, '1/4 CLEAR 3X7', 'pc(s)', 924, 4, '', 'in stocks'),
(237, '1/4 CLEAR 4X6', 'pc(s)', 1, 10, '', 'in stocks'),
(238, '1/4 CLEAR 4X7', 'pc(s)', 1, 8, '', 'in stocks'),
(239, '1/4 CLEAR 4X8', 'pc(s)', 1, 5, '', 'in stocks'),
(240, '1/4 CLEAR 5X7', 'pc(s)', 1, 6, '', 'in stocks'),
(241, '1/4 MIRROR 4X6', 'pc(s)', 1, 5, '', 'in stocks'),
(242, '1/4 REF DARK BRONZE 4X7', 'pc(s)', 1, 3, '', 'in stocks'),
(243, '1/8 CLEAR 4X6', 'pc(s)', 720, 5, '', 'in stocks'),
(244, '1/8 SMOKE 4X6', 'pc(s)', 720, 5, '', 'in stocks'),
(245, '7/32 SMOKE 4X6', 'pc(s)', 1, 5, '', 'in stocks'),
(246, 'HA-38 CENTER FRAME ', 'pc(s)', 800, 10, '', 'in stocks'),
(247, 'HA-38 PANEL FRAME ', 'pc(s)', 600, 1000, 'adhesives', 'in-stock'),
(248, 'HA-38 PERIMETER FRAME ', 'pc(s)', 458, 10, '', 'in stocks'),
(249, 'HA-38 SMALL MOULDING SQ ', 'pc(s)', 206, 20, '', 'in stocks'),
(250, 'HA-798 DHEADW/SCREEN', 'pc(s)', 635, 13, '', 'in stocks'),
(251, 'HA-798 DJAMBW/SCREEN', 'pc(s)', 456, 13, '', 'in stocks'),
(252, 'HA-798 DSILLW/SCREEN', 'pc(s)', 790, 13, '', 'in stocks'),
(253, 'HA-798 INTERLOCKER', 'pc(s)', 525, 10, '', 'in stocks'),
(254, 'HA-798 LOCKSTILE', 'pc(s)', 493, 10, '', 'in stocks'),
(255, 'HA-798 SCREEN FRAME', 'pc(s)', 377, 8, '', 'in stocks'),
(256, 'HA-798 TOP/BOTTOM', 'pc(s)', 455, 10, '', 'in stocks'),
(257, 'MF-ANGULAR 1-1/2X1-1/2X1/8 (L)', 'pc(s)', 990, 20, '', 'in stocks'),
(258, 'MF-ANGULAR 1X1X1/8 (L)', 'pc(s)', 651, 15, '', 'in stocks'),
(259, 'MF-CORNERSTAKE 2X2 (L)', 'pc(s)', 1, 5, '', 'in stocks'),
(260, 'MF-CORNERSTAKE 3X3 (L)', 'pc(s)', 3, 5, '', 'in stocks'),
(262, 'MF-U CHANNEL 3/4X3/4 21\'', 'pc(s)', 650, 3, '', 'in stocks'),
(263, 'bnmnmbnm', '123123', 23123, 1231, 'metal', 'in-stock');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pmpng_add_prod_data`
--

CREATE TABLE `pmpng_add_prod_data` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `quantity_on_hand` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pmpng_add_prod_data`
--

INSERT INTO `pmpng_add_prod_data` (`product_id`, `name`, `size`, `price`, `quantity_on_hand`, `category`, `status`) VALUES
(4, 'screw', 'medium', 3213, 800, 'metal', 'in-stock'),
(6, 'Lshape bar', '2', 150, 1000, 'small-metal', 'in-stock'),
(7, 'Vshape', 'large', 2, 1593, 'metal', 'in-stock'),
(8, 'pako', 'small', 1, 1593, 'metal', 'in-stock'),
(15, 'Aluminum bar', 'Large', 250, 0, 'metal', 'in-stock'),
(17, 'Aluminum Window Frame Small', '100x120cm', 140, 40, 'Window Frames', 'Active'),
(18, 'Aluminum Window Frame Large', '150x180cm', 170, 35, 'Window Frames', 'Active'),
(19, 'Clear Glass Panel', '200x100cm', 90, 100, 'Glass Panels', 'Active'),
(20, 'Tempered Glass Panel', '220x110cm', 130, 80, 'Glass Panels', 'Active'),
(21, 'Tinted Glass Sheet', '200x90cm', 110, 100, 'Glass Panels', 'Active'),
(22, 'Frosted Glass Sheet', '180x80cm', 115, 70, 'Glass Panels', 'Active'),
(23, 'Sliding Door Kit', '180x210cm', 310, 25, 'Doors', 'Active'),
(24, 'Frameless Glass Door', '90x210cm', 400, 15, 'Doors', 'Active'),
(25, 'Shower Glass Door', '90x200cm', 230, 17, 'Bathroom', 'Active'),
(26, 'Aluminum Sliding Door Frame', '180x200cm', 320, 20, 'Doors', 'Active'),
(27, 'Aluminum Partition Frame', '100x250cm', 190, 50, 'Partitions', 'Active'),
(28, 'Glass Partition Panel', '100x240cm', 150, 60, 'Partitions', 'Active'),
(29, 'Glass Railing Panel', '120x90cm', 140, 40, 'Railings', 'Active'),
(30, 'Aluminum Railing Post', '10x100cm', 70, 70, 'Railings', 'Active'),
(31, 'Aluminum Handrail', '300cm', 85, 74, 'Railings', 'Active'),
(32, 'Glass Balustrade', '90x100cm', 250, 30, 'Railings', 'Active'),
(33, 'Sliding Window Roller', 'Standard', 8, 300, 'Accessories', 'Active'),
(34, 'Window Lock Handle', 'Universal', 12, 250, 'Accessories', 'Active'),
(35, 'Door Lockset', 'Standard', 25, 150, 'Accessories', 'Active'),
(36, 'Silicone Sealant', '300ml', 6, 400, 'Accessories', 'Active'),
(37, 'Glass Connector Clamp', 'Stainless', 20, 180, 'Accessories', 'Active'),
(38, 'Rubber Gasket for Glass', '10m Roll', 15, 200, 'Accessories', 'Active'),
(39, 'Sliding Door Handle', 'Aluminum', 35, 90, 'Accessories', 'Active'),
(40, 'Pivot Hinge Set', 'Heavy Duty', 60, 30, 'Accessories', 'Active'),
(41, 'Aluminum Angle Bar', '2\"x2\" 6m', 55, 100, 'Materials', 'Active'),
(42, 'Flat Bar Aluminum', '1\"x6m', 45, 110, 'Materials', 'Active'),
(43, 'U-Channel Aluminum', '1\"x6m', 48, 95, 'Materials', 'Active'),
(44, 'Tempered Glass Shelf', '60x30cm', 50, 70, 'Glass Accessories', 'Active'),
(45, 'Frameless Shower Enclosure', '100x200cm', 700, 10, 'Bathroom', 'Active'),
(46, 'Office Glass Partition Kit', '300x250cm', 850, 0, 'Partitions', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `pmpng_customer`
--

CREATE TABLE `pmpng_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pmpng_customer`
--

INSERT INTO `pmpng_customer` (`id`, `name`, `contact`, `address`) VALUES
(1, 'Dexter', 9123456, 'Lanzones1'),
(2, 'Louis', 1234, 'Atis'),
(3, 'Llorente', 1235467, 'Lazones'),
(4, 'Lerio', 123123, 'Atis'),
(5, 'Lerio', 123123, 'Atis'),
(6, 'Lerio', 123123, 'Atis'),
(7, 'Lerio', 123123, 'Atis'),
(8, 'Lerio', 1231, '3123'),
(9, 'Lerio', 1231, '3123'),
(10, 'Lerio', 12312, 'Atis'),
(11, 'Lerio', 123123, 'atis'),
(12, 'Lerio', 123123, 'atis'),
(13, 'Lerio', 123123, 'atis'),
(14, 'mheg', 12312, '1233'),
(15, 'asd', 123, '12312'),
(16, 'mheg', 12312, '12312'),
(17, 'qweqweqw', 21312312, 'e123123'),
(18, 'eeqweqw', 213123, '41234323'),
(19, '23123', 312312, '312312'),
(20, 'lerio', 123131, 'atis'),
(21, 'josh', 2147483647, 'quezon city'),
(22, 'john', 2147483647, 'pampanga'),
(23, 'Hans', 2147483647, 'fairview'),
(24, 'Hans', 2147483647, 'fairview'),
(25, 'dexter', 1231231, 'kflsdfj'),
(26, 'Chris', 2147483647, 'taguig'),
(27, 'louis', 123123, 'paodpasod'),
(28, 'Joshua', 2147483647, 'payatas');

-- --------------------------------------------------------

--
-- Table structure for table `pmpng_orders`
--

CREATE TABLE `pmpng_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pmpng_orders`
--

INSERT INTO `pmpng_orders` (`id`, `customer_id`, `order_date`) VALUES
(1, 1, '2025-04-16 11:33:45'),
(2, 2, '2025-04-20 13:39:29'),
(3, 3, '2025-04-20 13:40:51'),
(4, 4, '2025-04-30 00:36:46'),
(5, 5, '2025-04-30 00:36:56'),
(6, 6, '2025-04-30 00:38:31'),
(7, 7, '2025-04-30 00:38:58'),
(8, 8, '2025-04-30 00:43:11'),
(9, 9, '2025-04-30 00:43:37'),
(10, 10, '2025-04-30 00:47:23'),
(11, 11, '2025-04-30 00:55:55'),
(12, 12, '2025-04-30 00:57:02'),
(13, 13, '2025-04-30 00:57:05'),
(14, 14, '2025-04-30 18:00:07'),
(15, 15, '2025-04-30 18:00:51'),
(16, 16, '2025-04-30 18:17:20'),
(17, 17, '2025-05-01 05:27:36'),
(18, 18, '2025-05-01 05:28:40'),
(19, 19, '2025-05-01 05:34:10'),
(20, 20, '2025-05-02 04:20:13'),
(21, 21, '2025-05-02 04:51:35'),
(22, 22, '2025-05-02 04:55:37'),
(23, 23, '2025-05-02 04:57:39'),
(24, 24, '2025-05-02 04:57:46'),
(25, 25, '2025-05-02 05:07:18'),
(26, 26, '2025-05-02 05:08:19'),
(27, 27, '2025-05-02 05:09:26'),
(28, 28, '2025-05-02 05:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `pmpng_order_items`
--

CREATE TABLE `pmpng_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `total_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pmpng_order_items`
--

INSERT INTO `pmpng_order_items` (`id`, `order_id`, `product_name`, `size`, `quantity`, `price`, `total_price`) VALUES
(1, 1, 'Jack-5', 'large', 2, 300, 600),
(2, 2, 'he', 'small', 20, 213, 4260),
(20, 21, 'Shower Glass Door', '90x200cm', 5, 230, 1150),
(21, 22, 'Aluminum Railing Post', '10x100cm', 20, 70, 1400),
(22, 25, 'Aluminum Handrail', '300cm', 20, 85, 1700),
(23, 26, 'Aluminum Handrail', '300cm', 6, 85, 510),
(24, 27, 'Pivot Hinge Set', 'Heavy Duty', 10, 60, 600);

-- --------------------------------------------------------

--
-- Table structure for table `pmpng_relase_prod`
--

CREATE TABLE `pmpng_relase_prod` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `release_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ppg_activity_logs`
--

CREATE TABLE `ppg_activity_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `action` varchar(50) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `is_viewed` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ppg_activity_logs`
--

INSERT INTO `ppg_activity_logs` (`id`, `username`, `action`, `item_id`, `description`, `timestamp`, `is_viewed`) VALUES
(0, 'PPGDexter', 'ADD', 48, 'Added new product: \'vbnvb\' (12312), qty: 3123 on Taguig Add Products', '2025-04-30 08:13:11', 0),
(0, 'PPGDexter', 'Update Item', 1, 'Updated product \'Palakol\' (ID: 1) on Pampanga Edit Product', '2025-04-30 08:18:27', 0),
(0, 'PPGDexter', 'View Item', 1, 'Viewed product \'Palakol\' (ID: 1) on View Item (Product Table Pampanga)', '2025-04-30 08:23:11', 0),
(0, 'PPGDexter', 'View Item', 1, 'Viewed product \'Palakol\' (ID: 1) on View Item (Product Table Pampanga)', '2025-04-30 08:23:53', 0),
(0, 'PPGDexter', 'Remove Item', 48, 'Removed item \'vbnvb\' (ID: 48) from Pampanga Product Table', '2025-04-30 08:31:17', 0),
(0, 'PPGDexter', 'View Item', 3, 'Viewed product \'Jack-5\' (ID: 3) on View Item (Product Table Pampanga)', '2025-04-30 08:59:57', 0),
(0, 'PPGDexter', 'View Item', 3, 'Viewed product \'Jack-5\' (ID: 3) on View Item (Product Table Pampanga)', '2025-04-30 09:00:35', 0),
(0, 'PPGDexter', 'View Item', 3, 'Viewed product \'Jack-5\' (ID: 3) on View Item (Product Table Pampanga)', '2025-04-30 12:55:21', 0),
(0, 'PPGDexter', 'Update Item', 12, 'Updated product \'Wala\' (ID: 12) on Pampanga Edit Product', '2025-05-01 01:46:31', 0),
(0, 'PPGDexter', 'View Item', 46, 'Viewed product \'Office Glass Partition Kit\' (ID: 46) on View Item (Product Table Pampanga)', '2025-05-01 01:47:20', 0),
(0, 'PPGDexter', 'View Item', 46, 'Viewed product \'Office Glass Partition Kit\' (ID: 46) on View Item (Product Table Pampanga)', '2025-05-01 01:49:00', 0),
(0, 'PPGDexter', 'Remove Item', 47, 'Removed item \'cvbcv\' (ID: 47) from Pampanga Product Table', '2025-05-01 01:50:22', 0),
(0, 'PPGDexter', 'ADD', 49, 'Added new product: \'bnmbn\' (12), qty: 121 on Pampanga Add Products', '2025-05-01 01:53:08', 0),
(0, 'PPGDexter', 'ADD', 50, 'Added new product: \'vcxxc\' (xzx), qty: 3123 on Pampanga Add Products', '2025-05-01 01:53:34', 0),
(0, 'PPGDexter', 'ADD', 51, 'Added new product: \'cbvcv\' (nbvn), qty: 12312 on Pampanga Add Products', '2025-05-01 01:53:34', 0),
(0, 'PPGDexter', 'View Item', 3, 'Viewed product \'Jack-5\' (ID: 3) on View Item (Product Table Pampanga)', '2025-05-01 02:18:00', 0),
(0, 'PPGDexter', 'View Item', 3, 'Viewed product \'Jack-5\' (ID: 3) on View Item (Product Table Pampanga)', '2025-05-01 02:18:58', 0),
(0, 'PPGDexter', 'Delete Order Item', 3, 'Deleted order items for order ID \'3\' (Customer: \'Llorente\', Product: \'screw in Pampanga Release Records\')', '2025-05-01 02:22:17', 0),
(0, 'ppgvers', 'Release Item', 19, 'Released 5 x asd (small) to customer \'23123\' [Order ID: 19]', '2025-05-01 13:34:10', 0),
(0, 'ppgvers', 'Remove Item', 10, 'Removed item \'asd\' (ID: 10) from Pampanga Product Table', '2025-05-01 18:49:56', 0),
(0, 'ppgvers', 'Delete Order Item', 19, 'Deleted order items for order ID \'19\' (Customer: \'23123\', Product: \'asd in Pampanga Release Records\')', '2025-05-01 19:53:13', 0),
(0, 'PPGDexter', 'View Item', 11, 'Viewed product \'asd\' (ID: 11) on View Item (Product Table Pampanga)', '2025-05-02 01:57:29', 0),
(0, 'PPGDexter', 'View Item', 1, 'Viewed product \'Palakol\' (ID: 1) on View Item (Product Table Pampanga)', '2025-05-02 01:57:51', 0),
(0, 'PPGDexter', 'View Item', 11, 'Viewed product \'asd\' (ID: 11) on View Item (Product Table Pampanga)', '2025-05-02 01:58:18', 0),
(0, 'PPGDexter', 'View Item', 11, 'Viewed product \'asd\' (ID: 11) on View Item (Product Table Pampanga)', '2025-05-02 12:18:25', 0),
(0, 'PPGDexter', 'Remove Item', 51, 'Removed item \'cbvcv\' (ID: 51) from Pampanga Product Table', '2025-05-02 12:18:52', 0),
(0, 'PPGDexter', 'ADD', 52, 'Added new product: \'mbnbmnbmbn\' (12312), qty: 31231 on Pampanga Add Products', '2025-05-02 12:19:09', 0),
(0, 'PPGDexter', 'Release Item', 20, 'Released 20 x Clear Glass Panel (200x100cm) to customer \'lerio\' [Order ID: 20]', '2025-05-02 12:20:13', 0),
(0, 'PPGDexter', 'View Item', 20, 'Viewed product \'Tempered Glass Panel\' (ID: 20) on View Item (Product Table Pampanga)', '2025-05-02 12:20:35', 0),
(0, 'PPGDexter', 'Delete Order Item', 20, 'Deleted order items for order ID \'20\' (Customer: \'lerio\', Product: \'Clear Glass Panel in Pampanga Release Records\')', '2025-05-02 12:20:45', 0),
(0, 'ppgvers', 'Update Item', 11, 'Updated product \'asd\' (ID: 11) on Pampanga Edit Product', '2025-05-02 12:20:46', 0),
(0, 'PPGDexter', 'Remove Item', 12, 'Removed item \'Wala\' (ID: 12) from Pampanga Product Table', '2025-05-02 12:29:58', 0),
(0, 'PPGDexter', 'Remove Item', 13, 'Removed item \'asd\' (ID: 13) from Pampanga Product Table', '2025-05-02 12:30:14', 0),
(0, 'PPGDexter', 'Remove Item', 9, 'Removed item \'ased\' (ID: 9) from Pampanga Product Table', '2025-05-02 12:30:25', 0),
(0, 'PPGDexter', 'Remove Item', 11, 'Removed item \'asd\' (ID: 11) from Pampanga Product Table', '2025-05-02 12:30:37', 0),
(0, 'PPGDexter', 'Remove Item', 14, 'Removed item \'asd\' (ID: 14) from Pampanga Product Table', '2025-05-02 12:30:58', 0),
(0, 'PPGDexter', 'Remove Item', 49, 'Removed item \'bnmbn\' (ID: 49) from Pampanga Product Table', '2025-05-02 12:31:28', 0),
(0, 'PPGDexter', 'Remove Item', 2, 'Removed item \'he\' (ID: 2) from Pampanga Product Table', '2025-05-02 12:31:58', 0),
(0, 'PPGDexter', 'Remove Item', 50, 'Removed item \'vcxxc\' (ID: 50) from Pampanga Product Table', '2025-05-02 12:32:32', 0),
(0, 'PPGDexter', 'Remove Item', 52, 'Removed item \'mbnbmnbmbn\' (ID: 52) from Pampanga Product Table', '2025-05-02 12:32:46', 0),
(0, 'PPGDexter', 'Remove Item', 1, 'Removed item \'Palakol\' (ID: 1) from Pampanga Product Table', '2025-05-02 12:33:39', 0),
(0, 'PPGDexter', 'Remove Item', 3, 'Removed item \'Jack-5\' (ID: 3) from Pampanga Product Table', '2025-05-02 12:34:11', 0),
(0, 'PPGDexter', 'Release Item', 21, 'Released 5 x Shower Glass Door (90x200cm) to customer \'josh\' [Order ID: 21]', '2025-05-02 12:51:35', 0),
(0, 'PPGDexter', 'Release Item', 22, 'Released 20 x Aluminum Railing Post (10x100cm) to customer \'john\' [Order ID: 22]', '2025-05-02 12:55:37', 0),
(0, 'PPGDexter', 'Release Item', 25, 'Released 20 x Aluminum Handrail (300cm) to customer \'dexter\' [Order ID: 25]', '2025-05-02 13:07:18', 0),
(0, 'PPGDexter', 'Release Item', 26, 'Released 6 x Aluminum Handrail (300cm) to customer \'Chris\' [Order ID: 26]', '2025-05-02 13:08:19', 0),
(0, 'PPGDexter', 'Release Item', 27, 'Released 10 x Pivot Hinge Set (Heavy Duty) to customer \'louis\' [Order ID: 27]', '2025-05-02 13:09:26', 0),
(0, 'PPGDexter', 'ADD', 53, 'Added new product: \'donut\' (large), qty: 1 on Pampanga Add Products', '2025-05-02 14:12:57', 0),
(0, 'PPGDexter', 'Login', NULL, 'Pampanga user PPGDexter has logged in', '2025-05-05 17:16:59', 0),
(0, 'PPGDexter', 'Login', NULL, 'Pampanga user PPGDexter has logged in', '2025-05-05 17:17:09', 0),
(0, 'PPGDexter', 'Login', NULL, 'Taguig user PPGDexter has logged in', '2025-05-05 22:23:33', 0),
(0, 'PPGDexter', 'Login', NULL, 'Taguig user PPGDexter has logged in', '2025-05-05 22:25:13', 0),
(0, 'PPGDexter', 'View Item', 15, 'Viewed product \'Aluminum bar\' (ID: 15) on View Item (Product Table Pampanga)', '2025-05-05 23:07:03', 0),
(0, 'PPGDexter', 'View Item', 27, 'Viewed product \'Aluminum Partition Frame\' (ID: 27) on View Item (Product Table Pampanga)', '2025-05-05 23:07:45', 0),
(0, 'PPGDexter', 'View Item', 27, 'Viewed product \'Aluminum Partition Frame\' (ID: 27) on View Item (Product Table Pampanga)', '2025-05-05 23:08:13', 0),
(0, 'PPGDexter', 'View Item', 27, 'Viewed product \'Aluminum Partition Frame\' (ID: 27) on View Item (Product Table Pampanga)', '2025-05-05 23:08:15', 0),
(0, 'PPGDexter', 'View Item', 27, ' \'Aluminum Partition Frame\' (ID: 27) on View Item (Product Table Pampanga)', '2025-05-05 23:10:52', 0),
(0, 'PPGDexter', 'View Item', 27, ' \'\' (ID: 27) on View Item (Product Table Pampanga)', '2025-05-05 23:11:35', 0),
(0, 'PPGDexter', 'View Item', 27, ' \'Aluminum Partition Frame\' (ID: 27) on View Item (Pampanga release Products)', '2025-05-05 23:12:05', 0),
(0, 'PPGDexter', 'View Item', 21, ' \'Tinted Glass Sheet\' (ID: 21) on View Item (Pampanga release Products)', '2025-05-05 23:12:42', 0),
(0, 'PPGDexter', 'View Item', 27, ' \'Aluminum Partition Frame\' (ID: 27) on View Item (Pampanga release Products)', '2025-05-05 23:12:46', 0),
(0, 'PPGDexter', 'View Item', 26, ' \'Aluminum Sliding Door Frame\' (ID: 26) on View Item (Pampanga release Products)', '2025-05-05 23:12:54', 0),
(0, 'PPGDexter', 'View Item', 22, ' \'Frosted Glass Sheet\' (ID: 22) on View Item (Pampanga release Products)', '2025-05-05 23:13:40', 0),
(0, 'PPGDexter', 'View Item', 22, ' \'Frosted Glass Sheet\' on View Item (Pampanga release Products)', '2025-05-05 23:14:28', 0),
(0, 'PPGDexter', 'Login', NULL, 'Pampanga user PPGDexter has logged in', '2025-05-05 23:22:50', 0),
(0, 'admin', 'Super Admin viewed on Pampanga Dashboard', NULL, '', '2025-05-06 10:09:22', 0),
(0, 'admin', 'Super Admin viewed on Pampanga Products', NULL, '', '2025-05-06 10:09:22', 0),
(0, 'admin', 'Super Admin viewed on Pampanga Records', NULL, '', '2025-05-06 10:09:24', 0),
(0, 'PPGDexter', 'Login', NULL, 'Pampanga user PPGDexter has logged in', '2025-05-06 10:09:48', 0),
(0, 'PPGDexter', 'Login', NULL, 'Admin user PPGDexter has logged in', '2025-05-06 10:15:05', 0),
(0, 'admin', 'Super Admin viewed on Pampanga Dashboard', NULL, '', '2025-05-07 00:12:54', 0),
(0, 'admin', 'Super Admin viewed on Pampanga Dashboard', NULL, '', '2025-05-07 14:40:53', 0),
(0, 'admin', 'Super Admin viewed on Pampanga Dashboard', NULL, '', '2025-05-07 14:47:02', 0),
(0, 'admin', 'Super Admin viewed on Pampanga Dashboard', NULL, '', '2025-05-07 14:49:49', 0),
(0, 'PPGDexter', 'Login', NULL, 'Admin user PPGDexter has logged in Pampanga Branch', '2025-05-07 14:53:02', 0),
(0, 'admin', 'Login', NULL, 'Admin user admin has logged-in in Pampanga Branch', '2025-05-07 16:18:19', 0),
(0, 'PPGDexter', 'Login', NULL, 'Admin user PPGDexter has logged-in in Pampanga Branch', '2025-05-07 16:20:30', 0),
(0, 'cheradmin', 'Super Admin viewed on Pampanga Products', NULL, '', '2025-05-08 08:20:07', 0),
(0, 'cheradmin', 'Super Admin viewed on Pampanga Dashboard', NULL, '', '2025-05-08 08:21:12', 0),
(0, 'cheradmin', 'Super Admin viewed on Pampanga Products', NULL, '', '2025-05-08 08:21:13', 0),
(0, 'cheradmin', 'Super Admin viewed on Pampanga Records', NULL, '', '2025-05-08 08:21:14', 0),
(0, 'cheradmin', 'Super Admin viewed on Pampanga Records', NULL, '', '2025-05-08 08:21:15', 0),
(0, 'cheradmin', 'Super Admin viewed on Pampanga Products', NULL, '', '2025-05-08 08:21:16', 0),
(0, 'cheradmin', 'Super Admin viewed on Pampanga Dashboard', NULL, '', '2025-05-08 08:21:17', 0),
(0, 'cheradmin', 'Super Admin viewed on Pampanga Products', NULL, '', '2025-05-08 08:21:17', 0),
(0, 'cheradmin', 'Super Admin viewed on Pampanga Records', NULL, '', '2025-05-08 08:21:18', 0),
(0, 'cheradmin', 'Super Admin viewed on Pampanga Dashboard', NULL, '', '2025-05-08 08:38:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `producttabletaguig`
--

CREATE TABLE `producttabletaguig` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL DEFAULT 'N/A',
  `price` int(11) NOT NULL,
  `quantity_on_hand` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `producttabletaguig`
--

INSERT INTO `producttabletaguig` (`product_id`, `name`, `size`, `price`, `quantity_on_hand`, `category`, `status`) VALUES
(31, 'Metal Pipe', 'medium', 1, 38, 'metal', 'in-stock'),
(35, 'Metal Pipe', 'Large', 300, 1900, 'metal', 'in-stock'),
(36, 'Plastic Pipe', 'Large', 200, 1940, 'others', 'in-stock'),
(50, 'Aluminum bar', 'Large', 250, 6, 'metal', 'in-stock'),
(51, 'Aluminum Window Frame Small', '100x120cm', 140, 240, 'Window Frames', 'Active'),
(52, 'Aluminum Window Frame Large', '150x180cm', 170, 210, 'Window Frames', 'Active'),
(53, 'Clear Glass Panel', '200x100cm', 90, 720, 'Glass Panels', 'Active'),
(54, 'Tempered Glass Panel', '220x110cm', 130, 480, 'Glass Panels', 'Active'),
(55, 'Tinted Glass Sheet', '200x90cm', 110, 600, 'Glass Panels', 'Active'),
(56, 'Frosted Glass Sheet', '180x80cm', 115, 420, 'Glass Panels', 'Active'),
(57, 'Sliding Door Kit', '180x210cm', 310, 150, 'Doors', 'Active'),
(58, 'Frameless Glass Door', '90x210cm', 400, 90, 'Doors', 'Active'),
(59, 'Shower Glass Door', '90x200cm', 230, 132, 'Bathroom', 'Active'),
(60, 'Aluminum Sliding Door Frame', '180x200cm', 320, 120, 'Doors', 'Active'),
(61, 'Aluminum Partition Frame', '100x250cm', 190, 300, 'Partitions', 'Active'),
(62, 'Glass Partition Panel', '100x240cm', 150, 360, 'Partitions', 'Active'),
(63, 'Glass Railing Panel', '120x90cm', 140, 240, 'Railings', 'Active'),
(64, 'Aluminum Railing Post', '10x100cm', 70, 540, 'Railings', 'Active'),
(65, 'Aluminum Handrail', '300cm', 85, 600, 'Railings', 'Active'),
(66, 'Glass Balustrade', '90x100cm', 250, 180, 'Railings', 'Active'),
(67, 'Sliding Window Roller', 'Standard', 8, 1800, 'Accessories', 'Active'),
(68, 'Window Lock Handle', 'Universal', 12, 1500, 'Accessories', 'Active'),
(69, 'Door Lockset', 'Standard', 25, 900, 'Accessories', 'Active'),
(70, 'Silicone Sealant', '300ml', 6, 2330, 'Accessories', 'Active'),
(71, 'Glass Connector Clamp', 'Stainless', 20, 1080, 'Accessories', 'Active'),
(72, 'Rubber Gasket for Glass', '10m Roll', 15, 1200, 'Accessories', 'Active'),
(73, 'Sliding Door Handle', 'Aluminum', 35, 540, 'Accessories', 'Active'),
(74, 'Pivot Hinge Set', 'Heavy Duty', 60, 240, 'Accessories', 'Active'),
(75, 'Aluminum Angle Bar', '2\"x2\" 6m', 55, 600, 'Materials', 'Active'),
(76, 'Flat Bar Aluminum', '1\"x6m', 45, 660, 'Materials', 'Active'),
(77, 'U-Channel Aluminum', '1\"x6m', 48, 570, 'Materials', 'Active'),
(78, 'Tempered Glass Shelf', '60x30cm', 50, 420, 'Glass Accessories', 'Active'),
(79, 'Frameless Shower Enclosure', '100x200cm', 700, 60, 'Bathroom', 'Active'),
(80, 'Office Glass Partition Kit', '300x250cm', 850, 3, 'Partitions', 'Active'),
(81, '798 PANEL ROLLER DOUBLE', 'pc(s)', 38, 40, '', 'in stocks'),
(82, '798 PANEL ROLLER SINGLE', 'pc(s)', 14, 60, '', 'in stocks'),
(83, '900 PANEL  ROLLER DOUBLE', 'pc(s)', 40, 40, '', 'in stocks'),
(84, '900 PANEL  ROLLER SINGLE ', 'pc(s)', 30, 60, '', 'in stocks'),
(85, 'ALCO CROSS BAR H/A', 'length(s) 21\'', 990, 20, '', 'in stocks'),
(86, 'ALCO FRAME PCW', 'length(s) 21\'', 845, 16, '', 'in stocks'),
(87, 'ALFA LOCK ANALOC', 'pc(s)', 220, 40, '', 'in stocks'),
(88, 'ALFA LOCK ANODIZE', 'pc(s)', 230, 40, '', 'in stocks'),
(89, 'ANGULAR  3/4\" x 3/4\" A', 'length(s) 21\'', 167, 20, '', 'in stocks'),
(90, 'ANGULAR  3/4\" x 3/4\" H/A', 'length(s) 21\'', 188, 20, '', 'in stocks'),
(91, 'ANGULAR 1/2\" x 1/2\" A', 'length(s) 12\'', 65, 20, '', 'in stocks'),
(92, 'ANGULAR 1/2\" x 1/2\" H/A', 'length(s) 12\'', 73, 14, '', 'in stocks'),
(93, 'ANGULAR 1/2\" x 1/2\" PCW', 'length(s) 12\'', 59, 14, '', 'in stocks'),
(94, 'BARREL BOLT A', 'pc(s)', 16, 82, '', 'in stocks'),
(95, 'BARREL BOLT HA', 'pc(s)', 16, 44, '', 'in stocks'),
(96, 'BENDED HANDLE ALUM  A', 'pc(s)', 27, 28, '', 'in stocks'),
(97, 'BENDED HANDLE ALUM H/A', 'pc(s)', 29, 32, '', 'in stocks'),
(98, 'BENDED HANDLE ALUM SW', 'pc(s)', 39, 10, '', 'in stocks'),
(99, 'BENDED HANDLE PLASTIC LD A', 'pc(s)', 27, 40, '', 'in stocks'),
(100, 'BENDED HANDLE PLASTIC LD H/A ', 'pc(s)', 29, 140, '', 'in stocks'),
(101, 'BUS  BALANCER A', 'pc(s)', 80, 36, '', 'in stocks'),
(102, 'BUS  BALANCER H/A', 'pc(s)', 80, 42, '', 'in stocks'),
(103, 'BUS BODY H/A', 'length(s) 21\'', 485, 4, '', 'in stocks'),
(104, 'CABINET HANDLE SS', 'pc(s)', 35, 40, '', 'in stocks'),
(105, 'CAHA 1/4\" UPPER / LOWER H/A', 'length(s) 12\'', 226, 6, '', 'in stocks'),
(106, 'CAHA UPPER/LOWER 1/4\"  A', 'length(s) 12\'', 201, 10, '', 'in stocks'),
(107, 'CAM HANDLE 38 H/A', 'pc(s)', 93, 24, '', 'in stocks'),
(108, 'CAM HANDLE YC H/A', 'pc(s)', 52, 6, '', 'in stocks'),
(109, 'CAM HANDLE YC S/W', 'pc(s)', 57, 18, '', 'in stocks'),
(110, 'CENTER LOCK BLACK BIG', 'pc(s)', 250, 36, '', 'in stocks'),
(111, 'CLIP TYPE #969B SINGLE SMALL', 'pc(s)', 48, 12, '', 'in stocks'),
(112, 'CONCEALED SS HINGES', 'set(s)', 55, 6, '', 'in stocks'),
(113, 'CORNER BRACKET 798 YS221', 'pc(s)', 9, 8, '', 'in stocks'),
(114, 'CORNER BRACKET SD YS221', 'pc(s)', 9, 274, '', 'in stocks'),
(116, 'DOOR CLOSER TUBE TYPE A', 'pc(s)', 155, 30, '', 'in stocks'),
(117, 'DOOR CLOSER TUBE TYPE H/A', 'pc(s)', 160, 22, '', 'in stocks'),
(118, 'DRAWER KNOB ORDINARY', 'pc(s)', 25, 20, '', 'in stocks'),
(119, 'DRAWER KNOB WOOD FINISH', 'pc(s)', 25, 30, '', 'in stocks'),
(120, 'FD C-TYPE HANDLE 10 x 25 x 300', 'set(s)', 440, 4, '', 'in stocks'),
(121, 'FLUSH LOCK # 10 ANALOC (W/O HOLE)', 'pc(s)', 27, 32, '', 'in stocks'),
(122, 'FLUSH LOCK # 10 ANODIZE (W/O HOLE)', 'pc(s)', 27, 174, '', 'in stocks'),
(123, 'FLUSH LOCK # 10 WHITE (W/O HOLE)', 'pc(s)', 27, 4, '', 'in stocks'),
(124, 'FLUSH LOCK # 11 ANALOC', 'pc(s)', 27, 32, '', 'in stocks'),
(125, 'FLUSH LOCK # 11 ANODIZE ', 'pc(s)', 27, 282, '', 'in stocks'),
(126, 'FLUSH LOCK # 12 -13 WITH KEY H/A', 'pc(s)', 105, 24, '', 'in stocks'),
(127, 'FLUSH LOCK # 12 -13 WITH KEY A', 'pc(s)', 105, 4, '', 'in stocks'),
(128, 'FLUSH LOCK # 12 -13 WITH KEY S/W', 'set(s)', 105, 8, '', 'in stocks'),
(129, 'FLUSH LOCK # 12 H/A', 'pc(s)', 38, 48, '', 'in stocks'),
(130, 'FLUSH LOCK # 12 A', 'pc(s)', 38, 78, '', 'in stocks'),
(132, 'FLUSH LOCK 900 DURABLE', 'pc(s)', 190, 4, '', 'in stocks'),
(133, 'FLUSH LOCK AUTO #12 A', 'pc(s)', 27, 10, '', 'in stocks'),
(134, 'FLUSH LOCK AUTO #12 H/A', 'pc(s)', 27, 8, '', 'in stocks'),
(135, 'FLUSH LOCK AUTO #12 S/W', 'pc(s)', 27, 104, '', 'in stocks'),
(136, 'FOUR BAR HINGES # 8 S/S', 'pc(s)', 65, 12, '', 'in stocks'),
(137, 'GLASS CLIP 1/4\"  A', 'length(s) 12\'', 60, 6, '', 'in stocks'),
(138, 'GLASS CLIP 1/4\"  H/A', 'length(s) 12\'', 67, 6, '', 'in stocks'),
(139, 'GLASS CLIP 1/4\"  PCW', 'length(s) 12\'', 74, 6, '', 'in stocks'),
(140, 'GLASS LOCK', 'pc(s)', 53, 50, 'adhesives', 'in-stock'),
(141, 'HALF MOON LOCK  BLACK SMALL', 'pc(s)', 48, 14, '', 'in stocks'),
(142, 'HALFMOON LOCK RIGHT 900 BLACK ', 'pc(s)', 80, 12, '', 'in stocks'),
(143, 'HAN 125 BLACK #7', 'pc(s)', 70, 21, 'woods', 'in-stock'),
(144, 'HAN 126 B WHITE #64', 'pc(s)', 58, 2, '', 'in stocks'),
(145, 'HAN 126 C WHITE #80', 'pc(s)', 126, 2, '', 'in stocks'),
(146, 'HINGES  1\" x 3\" A', 'pc(s)', 7, 30, '', 'in stocks'),
(147, 'HINGES  1\" x 3\" H/A', 'pc(s)', 8, 56, '', 'in stocks'),
(148, 'HINGES  1\" x 3\" S/S', 'pc(s)', 14, 30, '', 'in stocks'),
(149, 'JALOUSIE FRAME IRON  6 BLADES H/A ', 'set(s)', 198, 4, '', 'in stocks'),
(150, 'JALOUSIE FRAME IRON  7 BLADES H/A ', 'set(s)', 231, 8, '', 'in stocks'),
(151, 'JALOUSIE FRAME IRON  8 BLADES H/A ', 'set(s)', 264, 2, '', 'in stocks'),
(152, 'JALOUSIE FRAME IRON  9 BLADES H/A ', 'set(s)', 297, 4, '', 'in stocks'),
(153, 'JALOUSIE FRAME IRON  11 BLADES H/A ', 'set(s)', 363, 4, '', 'in stocks'),
(154, 'JALOUSIE FRAME IRON  12 BLADES H/A ', 'set(s)', 396, 8, '', 'in stocks'),
(155, 'JALOUSIE FRAME IRON  13 BLADES H/A ', 'set(s)', 429, 8, '', 'in stocks'),
(156, 'MAGNETIC HINGE DOUBLE', 'set(s)', 100, 16, '', 'in stocks'),
(157, 'MAGNETIC HINGE SINGLE', 'set(s)', 58, 12, '', 'in stocks'),
(158, 'MIRROR MASTIC (GUNTHER)', 'pc(s)', 350, 2, '', 'in stocks'),
(159, 'PATCH BOTTOM S/S #4', 'pc(s)', 210, 2, '', 'in stocks'),
(160, 'PATCH LOCK S/S #5', 'pc(s)', 480, 4, '', 'in stocks'),
(161, 'PATCH TOP S/S #2', 'pc(s)', 210, 2, '', 'in stocks'),
(162, 'PIANO HINGES 6 FEET', 'pc(s)', 189, 2, '', 'in stocks'),
(163, 'PLASTIC ROLLER (1/4 CAHA) ', 'length(s) 12\'', 169, 6, '', 'in stocks'),
(164, 'REVITS 1/8\" x 1/2\" A', 'box(es)', 230, 14, '', 'in stocks'),
(165, 'REVITS 1/8\" x 1/2\" A', 'pc(s)', 0, 1416, '', 'in stocks'),
(166, 'REVITS 1/8\" x 1/2\" H/A', 'box(es)', 280, 14, '', 'in stocks'),
(167, 'RUBBER BUMPER BIG', 'pc(s)', 1, 30, '', 'in stocks'),
(168, 'RUBBER PLUG WHITE', 'pc(s)', 1, 38, '', 'in stocks'),
(169, 'SAMSON HANDLE  H/A', 'set(s)', 265, 2, '', 'in stocks'),
(170, 'SCREEN FRAME 798 4-KINDS', 'pc(s)', 5, 194, '', 'in stocks'),
(171, 'SCREEN FRAME 798 LOWER GUIDE', 'pc(s)', 5, 142, '', 'in stocks'),
(172, 'SCREEN FRAME 798 TOP GUIDE', 'pc(s)', 5, 146, '', 'in stocks'),
(173, 'SCREEN FRAME SD LOWER GUIDE', 'pc(s)', 5, 2, '', 'in stocks'),
(174, 'SCREEN FRAME SD TOP GUIDE', 'pc(s)', 5, 2, '', 'in stocks'),
(175, 'SCREEN HANDLE BLACK', 'pc(s)', 6, 26, '', 'in stocks'),
(176, 'SCREEN HANDLE WHITE', 'pc(s)', 6, 22, '', 'in stocks'),
(177, 'SCREEN HOOK A', 'pc(s)', 5, 432, '', 'in stocks'),
(178, 'SCREEN HOOK H/A', 'pc(s)', 5, 628, '', 'in stocks'),
(179, 'SCREEN MESH  36\" H/A', 'roll(s)', 3, 2, '', 'in stocks'),
(180, 'SCREEN MESH  48\" H/A', 'roll(s)', 4, 2, '', 'in stocks'),
(181, 'SCREW, METAL 12 x 3\" A', 'pc(s)', 2, 168, '', 'in stocks'),
(182, 'SCREW, METAL 12 x 3\" H/A', 'pc(s)', 3, 82, '', 'in stocks'),
(183, 'SCREW, METAL 6 3/8\" A', 'pc(s)', 0, 8440, '', 'in stocks'),
(184, 'SCREW, METAL 6 x 1\" A', 'pc(s)', 0, 346, '', 'in stocks'),
(185, 'SCREW, METAL 6 x 1\" H/A', 'pc(s)', 1, 2576, '', 'in stocks'),
(186, 'SCREW, METAL 6 x 1/2\" A', 'pc(s)', 0, 276, '', 'in stocks'),
(187, 'SCREW, METAL 6 x 1/2\" H/A', 'pc(s)', 0, 88, '', 'in stocks'),
(188, 'SCREW, METAL 6 x 1/4\" A', 'pc(s)', 0, 552, '', 'in stocks'),
(189, 'SCREW, METAL 6 x 1/4\" H/A', 'pc(s)', 0, 3340, '', 'in stocks'),
(190, 'SCREW, METAL 6 x 3/4\" A', 'pc(s)', 0, 552, '', 'in stocks'),
(191, 'SCREW, METAL 8 x 1 1/2\" A', 'pc(s)', 1, 968, '', 'in stocks'),
(192, 'SCREW, METAL 8 x 1 1/2\" H/A', 'pc(s)', 1, 206, '', 'in stocks'),
(193, 'SCREW, METAL 8 x 1\" H/A', 'pc(s)', 1, 496, '', 'in stocks'),
(194, 'SCREW, METAL 8 x 1/2\" A', 'pc(s)', 0, 162, '', 'in stocks'),
(195, 'SCREW, METAL 8 x 1/2\" H/A', 'pc(s)', 1, 228, '', 'in stocks'),
(196, 'SCREW, METAL 8 x 2\" A', 'pc(s)', 1, 154, '', 'in stocks'),
(197, 'SCREW, METAL 8 x 2\" H/A', 'pc(s)', 2, 680, '', 'in stocks'),
(198, 'SCREW, WOOD 8 x 1 1/2\" H/A', 'pc(s)', 1, 108, '', 'in stocks'),
(199, 'SD BOTTOM RAIL H/A', 'length(s) 21\'', 676, 2, '', 'in stocks'),
(200, 'SD BOTTOM RAIL PCW', 'length(s) 21\'', 701, 2, '', 'in stocks'),
(201, 'SD DOUBLE HEAD H/A', 'length(s) 21\'', 632, 2, '', 'in stocks'),
(202, 'SD DOUBLE HEAD PCW', 'length(s) 21\'', 656, 2, '', 'in stocks'),
(203, 'SD DOUBLE JAMB H/A', 'length(s) 21\'', 605, 2, '', 'in stocks'),
(204, 'SD DOUBLE JAMB PCW', 'length(s) 21\'', 579, 2, '', 'in stocks'),
(205, 'SD DOUBLE SILL H/A', 'length(s) 21\'', 586, 2, '', 'in stocks'),
(206, 'SD DOUBLE SILL PCW', 'length(s) 21\'', 607, 2, '', 'in stocks'),
(207, 'SD INTERLOCKER H/A', 'length(s) 21\'', 646, 2, '', 'in stocks'),
(208, 'SD INTERLOCKER PCW', 'length(s) 21\'', 670, 4, '', 'in stocks'),
(209, 'SD LOCKSTILE H/A', 'length(s) 21\'', 586, 2, '', 'in stocks'),
(210, 'SD LOCKSTILE PCW', 'length(s) 21\'', 607, 4, '', 'in stocks'),
(211, 'SD ROLLER DOUBLE UNICORN', 'pc(s)', 44, 10, '', 'in stocks'),
(212, 'SD ROLLER SINGLE ', 'pc(s)', 14, 30, '', 'in stocks'),
(213, 'SD ROLLER SINGLE BRASS', 'pc(s)', 37, 22, '', 'in stocks'),
(214, 'SD SCREEN ASTRAGAL H/A', 'length(s) 21\'', 205, 2, '', 'in stocks'),
(215, 'SD SCREEN ASTRAGAL PCW', 'length(s) 21\'', 212, 2, '', 'in stocks'),
(216, 'SD TOP RAIL H/A', 'length(s) 21\'', 382, 4, '', 'in stocks'),
(217, 'SD TOP RAIL PCW', 'length(s) 21\'', 396, 2, '', 'in stocks'),
(218, 'SD YS221 H/A', 'length(s) 21\'', 359, 4, '', 'in stocks'),
(219, 'SD YS221PCW', 'length(s) 21\'', 373, 4, '', 'in stocks'),
(220, 'SEALANT BLACK', 'pc(s)', 120, 120, '', 'in stocks'),
(221, 'SEALANT BRONZE', 'pc(s)', 115, 80, '', 'in stocks'),
(222, 'SEALANT CLEAR', 'pc(s)', 110, 80, '', 'in stocks'),
(223, 'SEALANT WHITE', 'pc(s)', 120, 40, '', 'in stocks'),
(224, 'SF DOUBLE CANAL A', 'length(s) 21\'', 123, 80, '', 'in stocks'),
(225, 'SF DOUBLE CANAL H/A', 'length(s) 21\'', 124, 60, '', 'in stocks'),
(226, 'SF101-102 A', 'length(s) 21\'', 666, 40, '', 'in stocks'),
(227, 'SF101-102 H/A', 'length(s) 21\'', 677, 60, '', 'in stocks'),
(228, 'SF106-102 H/A', 'length(s) 21\'', 834, 40, '', 'in stocks'),
(229, 'SNAP ON BASE WITH COVER PCW', 'length(s) 21\'', 450, 20, '', 'in stocks'),
(230, 'STILE WITH GROOVE H/A', 'length(s) 21\'', 846, 20, '', 'in stocks'),
(231, 'STILE WITH GROOVE PCW', 'length(s) 21\'', 882, 20, '', 'in stocks'),
(232, 'TOX #8', 'box(es)', 55, 40, '', 'in stocks'),
(233, 'TUBULAR 1 1/2\" x 1 1/2\" PCW', 'length(s) 21\'', 565, 20, '', 'in stocks'),
(234, 'TUBULAR 1 3/4\" x 1 3/4\" PCW', 'length(s) 21\'', 689, 20, '', 'in stocks'),
(235, 'TUBULAR 1\" x 1 1/2\" A', 'length(s) 21\'', 381, 40, '', 'in stocks'),
(236, 'TUBULAR 1\" x 1 1/2\" H/A', 'length(s) 21\'', 680, 40, '', 'in stocks'),
(237, 'TUBULAR 1\" x 1\" H/A', 'length(s) 21\'', 349, 40, '', 'in stocks'),
(238, 'TUBULAR 1\" x 2\" A', 'length(s) 21\'', 537, 20, '', 'in stocks'),
(239, 'TUBULAR 1\" x 2\" H/A', 'length(s) 21\'', 547, 100, '', 'in stocks'),
(240, 'TUBULAR 1\" x 2\" PCW', 'length(s) 21\'', 566, 20, '', 'in stocks'),
(241, 'WF LOCKSET H/A', 'pc(s)', 370, 20, '', 'in stocks'),
(242, 'BIG MULLION SET 2.5mm', 'pc(s)', 5, 20, '', 'in stocks'),
(243, 'BIG MULLION SET 2mm', 'pc(s)', 5, 20, '', 'in stocks'),
(244, 'MINI MULLION SET', 'pc(s)', 3, 20, '', 'in stocks'),
(245, 'TUBULAR 3X3X2.5MM', 'pc(s)', 3, 20, '', 'in stocks'),
(246, 'TUBULAR 3X6X2.5MM', 'pc(s)', 5, 20, '', 'in stocks'),
(247, 'BIG MULLION BASE', 'pc(s)', 3, 30, '', 'in stocks'),
(248, 'BIG MULLION  COVER', 'pc(s)', 915, 30, '', 'in stocks'),
(249, 'BIG MULLION ADAPTER', 'pc(s)', 976, 30, '', 'in stocks'),
(250, 'MINI MULLION BASE', 'pc(s)', 2, 16, '', 'in stocks'),
(251, 'MINI MULLION COVER', 'pc(s)', 640, 16, '', 'in stocks'),
(252, 'MINI MULLION ADAPTER', 'pc(s)', 589, 16, '', 'in stocks'),
(253, 'TUBULAR 1 3/4 X 3 (1.3MM)', 'pc(s)', 1, 30, '', 'in stocks'),
(254, 'TUBULAR 1 3/4 X 3 (1MM)', 'pc(s)', 1, 30, '', 'in stocks'),
(255, 'TUBULAR 1 3/4 X 4 (1.2MM)', 'pc(s)', 2, 30, '', 'in stocks'),
(256, 'TUBULAR 1 3/4 X 4 (.8MM)', 'pc(s)', 1, 30, '', 'in stocks'),
(257, '1/4 BRONZE 3X7', 'pc(s)', 1, 20, '', 'in stocks'),
(258, '1/4 BRONZE 4X6', 'pc(s)', 1, 30, '', 'in stocks'),
(259, '1/4 BRONZE 4X7', 'pc(s)', 1, 30, '', 'in stocks'),
(260, '1/4 BRONZE 4X8', 'pc(s)', 1, 30, '', 'in stocks'),
(261, '1/4 BRONZE 5X7', 'pc(s)', 1, 20, '', 'in stocks'),
(262, '1/4 CLEAR 3X7', 'pc(s)', 924, 8, '', 'in stocks'),
(263, '1/4 CLEAR 4X6', 'pc(s)', 1, 20, '', 'in stocks'),
(264, '1/4 CLEAR 4X7', 'pc(s)', 1, 16, '', 'in stocks'),
(265, '1/4 CLEAR 4X8', 'pc(s)', 1, 10, '', 'in stocks'),
(266, '1/4 CLEAR 5X7', 'pc(s)', 1, 12, '', 'in stocks'),
(267, '1/4 MIRROR 4X6', 'pc(s)', 1, 10, '', 'in stocks'),
(268, '1/4 REF DARK BRONZE 4X7', 'pc(s)', 1, 6, '', 'in stocks'),
(269, '1/8 CLEAR 4X6', 'pc(s)', 720, 10, '', 'in stocks'),
(270, '1/8 SMOKE 4X6', 'pc(s)', 720, 10, '', 'in stocks'),
(271, '7/32 SMOKE 4X6', 'pc(s)', 1, 10, '', 'in stocks'),
(272, 'HA-38 CENTER FRAME ', 'pc(s)', 800, 20, '', 'in stocks'),
(273, 'HA-38 PANEL FRAME ', 'pc(s)', 600, 40, '', 'in stocks'),
(274, 'HA-38 PERIMETER FRAME ', 'pc(s)', 458, 40, '', 'in stocks'),
(275, 'HA-38 SMALL MOULDING SQ ', 'pc(s)', 206, 40, '', 'in stocks'),
(276, 'HA-798 DHEADW/SCREEN', 'pc(s)', 635, 26, '', 'in stocks'),
(277, 'HA-798 DJAMBW/SCREEN', 'pc(s)', 456, 26, '', 'in stocks'),
(278, 'HA-798 DSILLW/SCREEN', 'pc(s)', 790, 26, '', 'in stocks'),
(279, 'HA-798 INTERLOCKER', 'pc(s)', 525, 20, '', 'in stocks'),
(280, 'HA-798 LOCKSTILE', 'pc(s)', 493, 20, '', 'in stocks'),
(281, 'HA-798 SCREEN FRAME', 'pc(s)', 377, 16, '', 'in stocks'),
(282, 'HA-798 TOP/BOTTOM', 'pc(s)', 455, 20, '', 'in stocks'),
(283, 'MF-ANGULAR 1-1/2X1-1/2X1/8 (L)', 'pc(s)', 990, 40, '', 'in stocks'),
(284, 'MF-ANGULAR 1X1X1/8 (L)', 'pc(s)', 651, 30, '', 'in stocks'),
(285, 'MF-CORNERSTAKE 2X2 (L)', 'pc(s)', 1, 10, '', 'in stocks'),
(286, 'MF-CORNERSTAKE 3X3 (L)', 'pc(s)', 3, 10, '', 'in stocks'),
(287, 'MF-SF DOUBLE (L)', 'pc(s)', 85, 10, '', 'in stocks'),
(288, 'MF-U CHANNEL 3/4X3/4 21\'', 'pc(s)', 650, 6, '', 'in stocks'),
(289, 'glass', '10cm', 200, 4, 'glass', 'in-stock'),
(290, 'q', 'q', 1, 6, 'jkhgk', 'in-stock'),
(291, 'vbnvb', 'bvnbv', 1231, 12312, 'metal', 'in-stock');

-- --------------------------------------------------------

--
-- Table structure for table `taguig_activity_logs`
--

CREATE TABLE `taguig_activity_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `action` varchar(50) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `timestamp` datetime DEFAULT current_timestamp(),
  `is_viewed` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taguig_activity_logs`
--

INSERT INTO `taguig_activity_logs` (`id`, `username`, `action`, `item_id`, `description`, `timestamp`, `is_viewed`) VALUES
(0, 'joshtgg', 'ADD', 43, 'Added new product: \'xcvxc\' (12312), qty: 123123 on Makati Add Products', '2025-04-30 17:11:04', 0),
(0, 'joshtgg', 'ADD', 45, 'Added new product: \'piopio\' (123), qty: 123123 on Makati Add Products', '2025-04-30 21:19:57', 0),
(0, 'joshtgg', 'ADD', 46, 'Added new product: \'hfghf\' (12321), qty: 12312 on Makati Add Products', '2025-04-30 21:21:53', 0),
(0, 'joshtgg', 'Update Item', 44, 'Updated product \'window\' (ID: 44) on Taguig Edit Product', '2025-04-30 21:33:44', 0),
(0, 'joshtgg', 'View Item', 44, 'Viewed product \'window\' (ID: 44) on View Item (Product Table Taguig)', '2025-04-30 21:35:46', 0),
(0, 'joshtgg', 'View Item', 44, 'Viewed product \'window\' (ID: 44) on View Item (Product Table Taguig)', '2025-04-30 21:36:03', 0),
(0, 'joshtgg', 'Remove Item', 45, 'Removed item \'piopio\' (ID: 45) from Taguig Products', '2025-04-30 21:39:03', 0),
(0, 'Unknown User', 'Release Item', NULL, 'Released product \'screw\' (Size: 7) to customer \'dexter\' (Quantity: 20, Total Price: ₱4000)', '2025-04-30 22:11:47', 0),
(0, 'joshtgg', 'View Customer', 63, 'Viewed customer \'dexter\' (ID: 63) with order ID \'63\' at Release Records (Taguig)', '2025-04-30 22:36:27', 0),
(0, 'joshtgg', 'Delete Order Item', 10, 'Deleted order items for order ID \'10\'', '2025-04-30 22:55:28', 0),
(0, 'joshtgg', 'Delete Order Item', 14, 'Deleted order items for order ID \'14\'', '2025-04-30 22:56:54', 0),
(0, 'joshtgg', 'Delete Order Item', 15, 'Deleted order items for order ID \'15\'', '2025-04-30 22:58:34', 0),
(0, 'joshtgg', 'Delete Order Item', 12, 'Deleted order items for order ID \'12\'', '2025-04-30 23:00:05', 0),
(0, 'joshtgg', 'Delete Order Item', 16, 'Deleted order items for order ID \'\'', '2025-04-30 23:00:35', 0),
(0, 'joshtgg', 'Delete Order Item', 13, 'Deleted order items for order ID \'13\' (Customer: \'cherwin\', Product: \'pako\')', '2025-04-30 23:02:47', 0),
(0, 'joshtgg', 'Delete Order Item', 19, 'Deleted order items for order ID \'19\' (Customer: \'juvers\', Product: \'pako in Taguig Release Records\')', '2025-04-30 23:05:05', 0),
(0, 'joshtgg', 'Update Item', 44, 'Updated product \'wind\' (ID: 44) on Taguig Edit Product', '2025-04-30 23:34:05', 0),
(0, 'joshtgg', 'View Item', 31, 'Viewed product \'Metal Pipe\' (ID: 31) on View Item (Product Table Taguig)', '2025-04-30 23:36:09', 0),
(0, 'joshtgg', 'Remove Item', 43, 'Removed item \'xcvxc\' (ID: 43) from Taguig Products', '2025-04-30 23:36:36', 0),
(0, 'joshtgg', 'ADD', 47, 'Added new product: \'bvnvbn\' (123), qty: 12312 on Makati Add Products', '2025-04-30 23:37:53', 0),
(0, 'joshtgg', 'ADD', 48, 'Added new product: \'bnmbnm\' (123), qty: 12312 on Taguig Add Products', '2025-04-30 23:43:25', 0),
(0, 'joshtgg', 'ADD', 49, 'Added new product: \'hjkhjk\' (1231), qty: 123 on Taguig Add Products', '2025-04-30 23:45:38', 0),
(0, 'joshtgg', 'View Item', 44, 'Viewed product \'wind\' (ID: 44) on View Item (Product Table Taguig)', '2025-05-02 01:59:04', 0),
(0, 'joshtgg', 'View Customer', 65, 'Viewed customer \'jayvee\' (ID: 65) with order ID \'65\' at Release Records (Taguig)', '2025-05-02 01:59:11', 0),
(0, 'joshtgg', 'View Item', 44, 'Viewed product \'wind\' (ID: 44) on View Item (Product Table Taguig)', '2025-05-02 12:23:02', 0),
(0, 'joshtgg', 'View Item', 44, 'Viewed product \'wind\' (ID: 44) on View Item (Product Table Taguig)', '2025-05-02 12:23:30', 0),
(0, 'joshtgg', 'View Item', 44, 'Viewed product \'wind\' (ID: 44) on View Item (Product Table Taguig)', '2025-05-02 12:23:30', 0),
(0, 'joshtgg', 'Remove Item', 34, 'Removed item \'e\' (ID: 34) from Taguig Products', '2025-05-02 12:28:19', 0),
(0, 'joshtgg', 'Remove Item', 32, 'Removed item \'c\' (ID: 32) from Taguig Products', '2025-05-02 12:28:33', 0),
(0, 'joshtgg', 'Remove Item', 33, 'Removed item \'d\' (ID: 33) from Taguig Products', '2025-05-02 12:28:49', 0),
(0, 'joshtgg', 'Remove Item', 42, 'Removed item \'vbnvbn\' (ID: 42) from Taguig Products', '2025-05-02 12:28:57', 0),
(0, 'joshtgg', 'Remove Item', 46, 'Removed item \'hfghf\' (ID: 46) from Taguig Products', '2025-05-02 12:29:02', 0),
(0, 'joshtgg', 'Remove Item', 47, 'Removed item \'bvnvbn\' (ID: 47) from Taguig Products', '2025-05-02 12:29:08', 0),
(0, 'joshtgg', 'Remove Item', 48, 'Removed item \'bnmbnm\' (ID: 48) from Taguig Products', '2025-05-02 12:29:14', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 11:29:52', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 11:31:10', 0),
(0, 'joshtgg', 'View Item', 115, 'Viewed product \'DOOR CLOSER ARM TYPE A\' (ID: 115) on View Item (Product Table Taguig)', '2025-05-05 11:32:55', 0),
(0, 'joshtgg', 'Remove Item', 131, 'Removed item \'FLUSH LOCK # 12 S/W\' (ID: 131) from Taguig Products', '2025-05-05 11:34:53', 0),
(0, 'joshtgg', 'Update Item', 140, 'Updated product \'GLASS LOCK\' (ID: 140) on Taguig Edit Product', '2025-05-05 11:41:07', 0),
(0, 'joshtgg', 'View Customer', 65, 'Viewed customer \'jayvee\' (ID: 65) with order ID \'65\' at Release Records (Taguig)', '2025-05-05 11:41:57', 0),
(0, 'Unknown User', 'Release Item', NULL, 'Released product \'Office Glass Partition Kit\' (Size: 300x250cm) to customer \'dexter\' (Quantity: 10, Total Price: ₱8500)', '2025-05-05 11:44:01', 0),
(0, 'Unknown User', 'Release Item', NULL, 'Released product \'Office Glass Partition Kit\' (Size: 300x250cm) to customer \'dexter\' (Quantity: 10, Total Price: ₱8500)', '2025-05-05 11:44:30', 0),
(0, 'Unknown User', 'Release Item', NULL, 'Released product \'Office Glass Partition Kit\' (Size: 300x250cm) to customer \'dexter\' (Quantity: 5, Total Price: ₱4250)', '2025-05-05 11:50:42', 0),
(0, 'Unknown User', 'Release Item', NULL, 'Released product \'Silicone Sealant\' (Size: 300ml) to customer \'louis\' (Quantity: 50, Total Price: ₱300)', '2025-05-05 11:54:33', 0),
(0, 'joshtgg', 'Release Item', NULL, 'Released product \'Silicone Sealant\' (Size: 300ml) to customer \'louis\' (Quantity: 20, Total Price: ₱120)', '2025-05-05 11:56:56', 0),
(0, 'joshtgg', 'View Customer', 73, 'Viewed customer \'louis\' (ID: 73) with order ID \'73\' at Release Records (Taguig)', '2025-05-05 11:57:19', 0),
(0, 'joshtgg', 'Delete Order Item', 73, 'Deleted order items for order ID \'73\' (Customer: \'louis\', Product: \'Silicone Sealant in Taguig Release Records\')', '2025-05-05 12:03:37', 0),
(0, 'MKTDexter', 'Login', NULL, 'Taguig user MKTDexter has logged in', '2025-05-05 13:01:48', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 13:24:00', 0),
(0, 'MKTDexter', 'Login', NULL, 'Taguig user MKTDexter has logged in', '2025-05-05 13:36:06', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 13:36:26', 0),
(0, 'MKTDexter', 'Login', NULL, 'Taguig user MKTDexter has logged in', '2025-05-05 13:59:58', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:00:15', 0),
(0, 'MKTDexter', 'Login', NULL, 'Taguig user MKTDexter has logged in', '2025-05-05 14:02:17', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:02:41', 0),
(0, 'MKTDexter', 'Login', NULL, 'Taguig user MKTDexter has logged in', '2025-05-05 14:05:36', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:05:51', 0),
(0, 'MKTDexter', 'Login', NULL, 'Taguig user MKTDexter has logged in', '2025-05-05 14:07:11', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:07:21', 0),
(0, 'MKTDexter', 'Login', NULL, 'Taguig user MKTDexter has logged in', '2025-05-05 14:09:17', 0),
(0, 'MKTDexter', 'Login', NULL, 'Taguig user MKTDexter has logged in', '2025-05-05 14:10:21', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:16:40', 0),
(0, 'joshtgg', 'View Item', 158, 'Viewed product \'MIRROR MASTIC (GUNTHER)\' (ID: 158) on View Item (Product Table Taguig)', '2025-05-05 14:18:36', 0),
(0, 'joshtgg', 'View Item', 158, 'Viewed product \'MIRROR MASTIC (GUNTHER)\' (ID: 158) on View Item (Product Table Taguig)', '2025-05-05 14:18:36', 0),
(0, 'joshtgg', 'View Item', 143, 'Viewed product \'HAN 125 BLACK #71\' (ID: 143) on View Item (Product Table Taguig)', '2025-05-05 14:21:20', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:29:25', 0),
(0, 'joshtgg', 'ADD', 291, 'Added new product: \'vbnvb\' (bvnbv), qty: 12312 on Taguig Add Products', '2025-05-05 14:32:58', 0),
(0, 'joshtgg', 'Update Item', 143, 'Updated product \'HAN 125 BLACK #7\' (ID: 143) on Taguig Edit Product', '2025-05-05 14:33:47', 0),
(0, 'joshtgg', 'Release Item', NULL, 'Released product \'SCREW, METAL 12 x 3\" H/A\' (Size: pc(s)) to customer \'louis\' (Quantity: 40, Total Price: ₱120)', '2025-05-05 14:36:55', 0),
(0, 'joshtgg', 'View Customer', 74, 'Viewed customer \'louis\' (ID: 74) with order ID \'74\' at Release Records (Taguig)', '2025-05-05 14:37:49', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:38:45', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:39:22', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:40:00', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:40:31', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:40:56', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 14:41:11', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 21:03:03', 0),
(0, 'joshtgg', 'Login', NULL, 'Taguig user joshtgg has logged in', '2025-05-05 21:18:57', 0),
(0, 'joshtgg', 'Login', NULL, 'Admin user joshtgg has logged in', '2025-05-05 23:45:22', 0),
(0, 'joshtgg', 'Login', NULL, 'Admin user joshtgg has logged in', '2025-05-05 23:46:12', 0),
(0, 'joshtgg', 'Login', NULL, 'Admin user joshtgg has logged in', '2025-05-05 23:47:25', 0),
(0, 'joshtgg', 'Login', NULL, 'Admin user joshtgg has logged in Taguig Branch', '2025-05-07 14:24:14', 0),
(0, 'admin', 'Super Admin viewed on Taguig Dashboard', NULL, '', '2025-05-07 14:37:23', 0),
(0, 'admin', 'Super Admin viewed on Taguig Products', NULL, '', '2025-05-07 14:37:26', 0),
(0, 'admin', 'Super Admin viewed on Taguig Add Products', NULL, '', '2025-05-07 14:37:31', 0),
(0, 'admin', 'Super Admin viewed on Taguig Dashboard', NULL, '', '2025-05-07 14:46:43', 0),
(0, 'admin', 'Super Admin viewed on Taguig Dashboard', NULL, '', '2025-05-07 14:49:43', 0),
(0, 'joshtgg', 'Login', NULL, 'Admin user joshtgg has logged in Taguig Branch', '2025-05-07 14:50:20', 0),
(0, 'cheradmin', 'Super Admin viewed on Taguig Products', NULL, '', '2025-05-08 08:35:27', 0),
(0, 'cheradmin', 'Super Admin viewed on Taguig Add Products', NULL, '', '2025-05-08 08:35:28', 0),
(0, 'cheradmin', 'Super Admin on releasing a product from Taguig Rel', NULL, '', '2025-05-08 08:35:29', 0),
(0, 'cheradmin', 'Super Admin on releasing a product from Taguig Rel', NULL, '', '2025-05-08 08:35:29', 0),
(0, 'cheradmin', 'Super Admin viewed on Taguig Products', NULL, '', '2025-05-08 08:37:18', 0),
(0, 'cheradmin', 'Super Admin viewed on Taguig Add Products', NULL, '', '2025-05-08 08:37:18', 0),
(0, 'cheradmin', 'Super Admin on releasing a product from Taguig Rel', NULL, '', '2025-05-08 08:37:21', 0),
(0, 'cheradmin', 'Super Admin on releasing a product from Taguig Rel', NULL, '', '2025-05-08 08:37:21', 0),
(0, 'cheradmin', 'Super Admin viewed on Taguig Add Products', NULL, '', '2025-05-08 08:38:43', 0);

-- --------------------------------------------------------

--
-- Table structure for table `taguig_customers`
--

CREATE TABLE `taguig_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taguig_customers`
--

INSERT INTO `taguig_customers` (`id`, `name`, `contact`, `address`) VALUES
(10, 'juvers', '2', 'qc'),
(11, 'juvers', '1', 'qc'),
(12, 'juvers', '1', 'qc'),
(13, 'juvers', '1', 'qc'),
(14, 'cherwin', '345', 'qc'),
(15, 'juvahb', '13984732', 'jasd'),
(16, 'juvers', '2167', 'qc'),
(17, 'juvers', '1', '231'),
(20, 'juvers', '312', 'qc'),
(21, 'juvers', '312', 'qc'),
(22, 'juvers', '312', 'qc'),
(23, 'juvers', '312', 'qc'),
(24, 'juvers', '312', 'qc'),
(25, 'juvers', '312', 'qc'),
(26, 'juvers', '312', 'qc'),
(27, 'juvers', '312', 'qc'),
(28, 'juvers', '312', 'qc'),
(29, 'juvers', '312', 'qc'),
(30, 'juvers', '312', 'qc'),
(31, 'juvers', '312', 'qc'),
(32, 'cherwinn', '24', 'qc'),
(33, 'ahsb', '1321', 'jsandjkas'),
(38, 'dexter', '1234567890', 'lanzones'),
(39, 'dexter', '1234567890', 'lanzones'),
(40, 'Dexer', '09123456', 'Lanzones'),
(41, 'Louis', '123', 'wala'),
(42, 'asd', '23123', 'asd'),
(43, 'Llorente', '09123456', 'Lanzones'),
(44, 'Mark', '123456', '12'),
(45, 'Loay', '0912345', 'Ilocos'),
(46, 'Loay', '0912345', 'Ilocos Street'),
(47, 'Mheg', '01234', 'atis'),
(48, 'Juvs', '123456', 'Fairview'),
(49, 'Juvs', '123456', 'Fairview'),
(50, 'Juvs', '123456', 'Fairview'),
(51, 'Juvs', '12345', 'Fairview'),
(52, 'kyle', '12345', 'wala'),
(53, 'kyle', '1234', 'wala'),
(54, 'Juvs', '123123', 'Atis'),
(55, 'cher', '12312', 'ilocos'),
(56, 'lloremte', '231231', '123123'),
(57, 'vers', '98789', 'qc'),
(58, 'louis', '12312', 'Atis'),
(59, 'rizzy', '12312', 'Atis'),
(60, 'VERS', 'VERS', 'VERS'),
(61, '123123', '3213123', '12312312'),
(62, 'lerio', '12312', '312312'),
(63, 'mheg', '1231', 'atis'),
(64, 'dexter', '12312', 'atis'),
(65, 'vers', '312', '312'),
(66, 'jayvee', '09123456789', 'taguig'),
(67, 'dexter', '123123', 'atis'),
(68, 'dexter', '123123', 'atis'),
(69, 'dexter', '123123', 'atis'),
(70, 'dexter', '123123', 'atis'),
(71, 'dexter', '01923', 'atis'),
(72, 'dexter', '01923', 'atis'),
(73, 'louis', '123123', 'lanzones'),
(74, 'louis', '123123', 'lanzones'),
(75, 'louis', '12312', 'atis');

-- --------------------------------------------------------

--
-- Table structure for table `taguig_orders`
--

CREATE TABLE `taguig_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taguig_orders`
--

INSERT INTO `taguig_orders` (`id`, `customer_id`, `order_date`) VALUES
(9, 10, '2025-02-20 10:53:54'),
(10, 11, '2025-02-20 11:11:11'),
(11, 12, '2025-02-20 11:11:11'),
(12, 13, '2025-02-20 11:25:02'),
(13, 14, '2025-02-20 11:27:37'),
(14, 15, '2025-02-20 11:29:53'),
(15, 16, '2025-02-20 11:31:39'),
(16, 17, '2025-02-20 11:33:09'),
(19, 20, '2025-02-20 11:46:37'),
(20, 21, '2025-02-20 11:47:05'),
(21, 22, '2025-02-20 11:47:12'),
(22, 23, '2025-02-20 11:47:28'),
(23, 24, '2025-02-20 11:47:31'),
(24, 25, '2025-02-20 11:47:41'),
(25, 26, '2025-02-20 11:47:43'),
(26, 27, '2025-02-20 11:47:54'),
(27, 28, '2025-02-20 11:47:57'),
(28, 29, '2025-02-20 11:48:07'),
(29, 30, '2025-02-20 11:48:10'),
(30, 31, '2025-02-20 11:48:12'),
(31, 32, '2025-02-22 02:17:53'),
(32, 33, '2025-02-22 02:18:44'),
(37, 38, '2025-03-29 04:56:08'),
(38, 39, '2025-03-29 04:56:19'),
(39, 40, '2025-04-14 11:42:27'),
(40, 41, '2025-04-15 08:49:31'),
(41, 42, '2025-04-15 10:48:52'),
(42, 43, '2025-04-15 10:49:37'),
(43, 44, '2025-04-15 10:50:12'),
(44, 45, '2025-04-19 09:30:54'),
(45, 46, '2025-04-19 10:37:08'),
(46, 47, '2025-04-19 11:19:28'),
(47, 48, '2025-04-20 05:34:29'),
(48, 49, '2025-04-20 05:34:55'),
(49, 50, '2025-04-20 05:35:19'),
(50, 51, '2025-04-20 06:43:36'),
(51, 52, '2025-04-20 08:20:09'),
(52, 53, '2025-04-20 08:25:06'),
(53, 54, '2025-04-25 02:27:46'),
(54, 55, '2025-04-25 02:33:54'),
(55, 56, '2025-04-28 03:40:06'),
(56, 57, '2025-04-28 03:50:13'),
(57, 58, '2025-04-28 17:12:48'),
(58, 59, '2025-04-28 17:16:40'),
(59, 60, '2025-04-30 09:22:13'),
(60, 61, '2025-04-30 09:30:51'),
(61, 62, '2025-04-30 13:54:41'),
(62, 63, '2025-04-30 14:01:34'),
(63, 64, '2025-04-30 14:11:47'),
(64, 65, '2025-05-01 05:45:58'),
(65, 66, '2025-05-01 11:20:23'),
(66, 67, '2025-05-05 03:44:01'),
(67, 68, '2025-05-05 03:44:30'),
(68, 69, '2025-05-05 03:44:32'),
(69, 70, '2025-05-05 03:44:33'),
(70, 71, '2025-05-05 03:50:19'),
(71, 72, '2025-05-05 03:50:42'),
(72, 73, '2025-05-05 03:54:33'),
(73, 74, '2025-05-05 03:56:56'),
(74, 75, '2025-05-05 06:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `taguig_order_items`
--

CREATE TABLE `taguig_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taguig_order_items`
--

INSERT INTO `taguig_order_items` (`id`, `order_id`, `product_name`, `size`, `quantity`, `price`, `total_price`) VALUES
(46, 65, 'Plastic Pipe', 'large', 10, 1000.00, 10000.00),
(47, 66, 'Office Glass Partition Kit', '300x250cm', 10, 850.00, 8500.00),
(48, 67, 'Office Glass Partition Kit', '300x250cm', 10, 850.00, 8500.00),
(50, 72, 'Silicone Sealant', '300ml', 50, 6.00, 300.00),
(52, 74, 'SCREW, METAL 12 x 3\" H/A', 'pc(s)', 40, 3.00, 120.00),
(53, 21, 'HA-38 PERIMETER FRAME', 'pc(s)', 10, 458.00, 4580.00),
(54, 22, 'HA-38 PANEL FRAME', 'pc(s)', 10, 600.00, 6000.00);

-- --------------------------------------------------------

--
-- Table structure for table `usertb`
--

CREATE TABLE `usertb` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `p1` varchar(255) NOT NULL,
  `session_token` varchar(255) DEFAULT NULL,
  `logged_in` tinyint(1) DEFAULT 0,
  `last_active` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usertb`
--

INSERT INTO `usertb` (`userid`, `username`, `password`, `usertype`, `nickname`, `fullname`, `email`, `phone`, `address`, `p1`, `session_token`, `logged_in`, `last_active`) VALUES
(112, 'admin', '$2y$10$JgJnwBxv82xBePBfIcxdv.KuKPhJ0qpjSR0qzkf2tCAiUvNQD8clW', 'admin', 'cherwin', 'admin', 'admin', 31231, 'admin', 'adminadmin', NULL, 0, '2025-05-08 00:12:53'),
(116, 'joshtgg', '$2y$10$Bkk./kRNEBC/0Pq88V8u7eSYSBMsXCFfES/GbgKTan1zq0V5B/Azu', 'Taguig Admin', 'admin', 'admin', 'admin', 123123, '', 'joshtggjoshtgg', '', 0, NULL),
(117, 'MKTDexter', '$2y$10$8F4KXkXHjaP92cYBE3VxN.cQXOhk1kMUQSxepO4RKTzCJhGkTJjvO', 'Makati Admin', 'Dexter', 'MKTDexter', 'dexterlouis14@gmail.com', 912345679, 'Lanzones', 'MKTDexter', '92b1cdf700152209431cc7918022b01c', 0, '2025-05-08 07:58:42'),
(118, 'PPGDexter', '$2y$10$WmbH2oVfcuXjKgwjGvsc9.dE2E6iQuB5QIpfGCKgwtJ6eXFYqJeb2', 'Pampanga Admin', 'Dexter', 'PPGDexter', 'dexterlouis14@gmail.com', 12312312, 'Lanzones', 'PPGDexter', NULL, 0, NULL),
(124, '32131231', '$2y$10$98JZ2w3J0ar0NQBKZKw/OutryTrp.TPhvs0JbLArH..n/os//wMGq', 'Makati Admin', '32131231', '32131231', '32131231', 23132123, '32131231', '3213123132131231', NULL, 0, NULL),
(125, '3123123123', '$2y$10$AXAfRKvpL/Pq0oo1J1zPi.4CqwOerdMwDBPK8cuqbaKeorS6yBjRa', 'admin', '3123123123', '3123123123', 'juvers@gmail.com', 2147483647, '3123123123', '3123123123', NULL, 0, NULL),
(126, 'mktvers', '$2y$10$MiPwYjG76W4il02GPZqkd.iVS2Adt8bzjjeOgj7i7lR8t.lcbIHdO', 'Makati Admin', 'mktvers', 'mktvers', 'mktvers@gmail.com', 2313123, 'mktvers', 'mktversmktvers', NULL, 0, NULL),
(127, 'ppgvers', '$2y$10$2.p2K.mHMVuSAXe8EUDWsOWdMcdJidM7kem46EaWiwnlT5mZSgpHa', 'Pampanga Admin', 'ppgvers', 'ppgvers', 'ppgvers@gmail.com', 31231231, 'ppgvers', 'ppgversppgvers', NULL, 0, NULL),
(10002, 'adminmheg', '$2y$10$ffsIgdNcsJCwWNbcbNVntev3NrLtCwXzsGW5CgpISLzDGQfk/aOj.', 'admin', '2131231', 'adminmheg', 'adminmheg', 232131, 'adminmheg', 'adminmheg', NULL, 0, '2025-05-07 18:20:47'),
(10004, 'adminjosh', '$2y$10$X7GhvAKiUpX.P0PDGIVeheO8kmokKSy1WO1YORNTiBOwTb2nfK5PK', 'admin', 'pogi', 'adminjosh', 'adminjosh@gmail.com', 21312312, 'adminjosh', 'adminjosh', NULL, 0, '2025-05-07 18:36:12'),
(10005, 'juversadmin', '$2y$10$9PmUoldaEi4WaOmREMKSzOw//a5bF2ZQy/9oBemLST0dkcKORk5xS', 'admin', 'juvers', 'juversadmin', 'juversadmin@gmail.com', 23123, 'juversadmin', 'juversadmin', NULL, 0, '2025-05-07 18:02:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backup_acc`
--
ALTER TABLE `backup_acc`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `branch_performance`
--
ALTER TABLE `branch_performance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makati_activity_logs`
--
ALTER TABLE `makati_activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makati_customers`
--
ALTER TABLE `makati_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makati_orders`
--
ALTER TABLE `makati_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `makati_orders` (`customer_id`);

--
-- Indexes for table `makati_order_items`
--
ALTER TABLE `makati_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `makati_order_items` (`order_id`);

--
-- Indexes for table `makati_released_products`
--
ALTER TABLE `makati_released_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `makati_released_products` (`order_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Indexes for table `mkt_add_prod_data`
--
ALTER TABLE `mkt_add_prod_data`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pmpng_add_prod_data`
--
ALTER TABLE `pmpng_add_prod_data`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `pmpng_customer`
--
ALTER TABLE `pmpng_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pmpng_orders`
--
ALTER TABLE `pmpng_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pmpng_orders` (`customer_id`);

--
-- Indexes for table `pmpng_order_items`
--
ALTER TABLE `pmpng_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pmpng_order_items` (`order_id`);

--
-- Indexes for table `pmpng_relase_prod`
--
ALTER TABLE `pmpng_relase_prod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pmpng_release_prod` (`order_id`);

--
-- Indexes for table `producttabletaguig`
--
ALTER TABLE `producttabletaguig`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `taguig_customers`
--
ALTER TABLE `taguig_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taguig_orders`
--
ALTER TABLE `taguig_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `taguig_order_items`
--
ALTER TABLE `taguig_order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `usertb`
--
ALTER TABLE `usertb`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=791;

--
-- AUTO_INCREMENT for table `backup_acc`
--
ALTER TABLE `backup_acc`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `branch_performance`
--
ALTER TABLE `branch_performance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `makati_activity_logs`
--
ALTER TABLE `makati_activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `makati_customers`
--
ALTER TABLE `makati_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `makati_orders`
--
ALTER TABLE `makati_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `makati_order_items`
--
ALTER TABLE `makati_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `makati_released_products`
--
ALTER TABLE `makati_released_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=385;

--
-- AUTO_INCREMENT for table `mkt_add_prod_data`
--
ALTER TABLE `mkt_add_prod_data`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pmpng_add_prod_data`
--
ALTER TABLE `pmpng_add_prod_data`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `pmpng_customer`
--
ALTER TABLE `pmpng_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pmpng_orders`
--
ALTER TABLE `pmpng_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pmpng_order_items`
--
ALTER TABLE `pmpng_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `pmpng_relase_prod`
--
ALTER TABLE `pmpng_relase_prod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `producttabletaguig`
--
ALTER TABLE `producttabletaguig`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `taguig_customers`
--
ALTER TABLE `taguig_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `taguig_orders`
--
ALTER TABLE `taguig_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `taguig_order_items`
--
ALTER TABLE `taguig_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `usertb`
--
ALTER TABLE `usertb`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10006;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `makati_orders`
--
ALTER TABLE `makati_orders`
  ADD CONSTRAINT `makati_orders` FOREIGN KEY (`customer_id`) REFERENCES `makati_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `makati_order_items`
--
ALTER TABLE `makati_order_items`
  ADD CONSTRAINT `fk_order_items_order` FOREIGN KEY (`order_id`) REFERENCES `makati_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `makati_released_products`
--
ALTER TABLE `makati_released_products`
  ADD CONSTRAINT `makati_released_products` FOREIGN KEY (`order_id`) REFERENCES `makati_released_products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `usertb` (`userid`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `usertb` (`userid`) ON DELETE CASCADE;

--
-- Constraints for table `pmpng_orders`
--
ALTER TABLE `pmpng_orders`
  ADD CONSTRAINT `pmpng_orders` FOREIGN KEY (`customer_id`) REFERENCES `pmpng_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pmpng_order_items`
--
ALTER TABLE `pmpng_order_items`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `pmpng_orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pmpng_relase_prod`
--
ALTER TABLE `pmpng_relase_prod`
  ADD CONSTRAINT `pmpng_release_prod` FOREIGN KEY (`order_id`) REFERENCES `pmpng_relase_prod` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taguig_orders`
--
ALTER TABLE `taguig_orders`
  ADD CONSTRAINT `taguig_orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `taguig_customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taguig_order_items`
--
ALTER TABLE `taguig_order_items`
  ADD CONSTRAINT `taguig_order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `taguig_orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
