-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2015 at 03:57 PM
-- Server version: 5.5.44-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foodmaidan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '9gQh4G_WAJMTVLvs60CbdhmWTOqRKQUt', '$2y$13$ikC1YaLqohdiTOrSfPmArutPJHB4Epd.2/1UYiq4RMWLwCUe7U9Wq', NULL, 'admin@gmail.com', 10, 1437836932, 1437836932);

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE IF NOT EXISTS `meal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  `meal_price` double DEFAULT NULL,
  `deal_closing_time` int(11) NOT NULL,
  `deal_status` tinyint(10) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `name`, `day`, `meal_price`, `deal_closing_time`, `deal_status`, `created_at`, `last_updated`) VALUES
(1, 'Meal1', 1, 130, 1438685400, 1, 1438519188, '2015-08-02 12:39:48'),
(2, 'Meal2', 2, 500, 1438771200, 1, 1438519116, '2015-08-02 12:38:36'),
(3, 'Meal3', 3, 400, 1438858200, 1, 1438519164, '2015-08-02 12:39:24'),
(4, 'Deal2', 0, 240, 1438599000, 0, 1438522542, '2015-08-02 13:35:42'),
(6, 'Deal Monday 2', 0, 240, 1438599045, 1, 1438519403, '2015-08-02 12:43:23'),
(7, 'Deal Monday3', 0, 180, 1438599032, 1, 1438522509, '2015-08-02 13:35:09'),
(8, 'Deal Thursday2', 3, 230, 1438858201, 1, 1438522598, '2015-08-02 13:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `meal_image`
--

CREATE TABLE IF NOT EXISTS `meal_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `meal_id` bigint(20) DEFAULT NULL,
  `image_org_url` varchar(255) DEFAULT NULL,
  `image_new_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `meal_image`
--

INSERT INTO `meal_image` (`id`, `meal_id`, `image_org_url`, `image_new_url`, `created_at`, `last_updated`) VALUES
(1, 1, 'item2.jpg', 'TI_XihRB7zixDew6mbwfrevtPXQViYcR.jpg', NULL, '2015-08-02 12:39:48'),
(2, 2, 'banner2.jpg', 'eyVsBNDAvfInCTnxoqXFFjmZp-UL4FBu.jpg', NULL, '2015-08-02 12:38:36'),
(3, 3, 'item1.jpg', 'PoRx1ErRCL7aPWJt4LJ1B4ilbSgm8zJh.jpg', NULL, '2015-08-02 12:39:24'),
(4, 4, 'banner1.jpg', 'UWY9ZHKAr0JSCQiovNE8qGU-f96z7DeG.jpg', NULL, '2015-08-02 12:40:15'),
(6, 6, 'banner2.jpg', 'blrZ1niLBz0GSVa4HKHiRkKoS96EFoYt.jpg', NULL, '2015-08-02 12:43:23'),
(7, 7, 'banner3.jpg', 'D6yuV8ZU2aUtXZ5TGX8RsivDbycS4HG_.jpg', NULL, '2015-08-02 13:35:09'),
(8, 8, 'item1.jpg', 'JOH0LHHknIzWjy1okvuqOtABr7M_6bF7.jpg', NULL, '2015-08-02 13:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `meal_item`
--

CREATE TABLE IF NOT EXISTS `meal_item` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `meal_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `meal_item`
--

INSERT INTO `meal_item` (`id`, `meal_id`, `name`, `price`, `created_at`, `last_updated`) VALUES
(1, 0, 'Polao', 80, '2015-07-25 03:11:52', '0000-00-00 00:00:00'),
(2, 0, 'Biryani', 120, '2015-07-25 03:12:28', '0000-00-00 00:00:00'),
(3, 0, 'Chiken Tikka', 160, '2015-07-25 03:12:49', '0000-00-00 00:00:00'),
(4, 0, 'Daal', 70, '2015-07-25 03:13:15', '0000-00-00 00:00:00'),
(5, 0, 'Salad', 40, '2015-07-25 03:13:33', '0000-00-00 00:00:00'),
(6, 0, 'Raita', 30, '2015-07-25 03:13:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `meal_items_manage`
--

CREATE TABLE IF NOT EXISTS `meal_items_manage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meal_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `meal_items_manage`
--

INSERT INTO `meal_items_manage` (`id`, `meal_id`, `item_id`, `created_at`, `last_updated`) VALUES
(1, 1, 1, 1437837335, '2015-07-25 15:15:35'),
(2, 1, 4, 1437837335, '2015-07-25 15:15:35'),
(3, 1, 5, 1437837335, '2015-07-25 15:15:35'),
(4, 2, 2, 1437858559, '2015-07-25 21:09:19'),
(5, 2, 3, 1437858559, '2015-07-25 21:09:19'),
(6, 2, 6, 1437858559, '2015-07-25 21:09:19'),
(7, 3, 1, 1437889698, '2015-07-26 05:48:18'),
(8, 3, 5, 1437889698, '2015-07-26 05:48:18'),
(9, 3, 6, 1437889698, '2015-07-26 05:48:18'),
(10, 4, 2, 1438497984, '2015-08-02 06:46:24'),
(11, 4, 3, 1438497984, '2015-08-02 06:46:24'),
(12, 4, 5, 1438497984, '2015-08-02 06:46:24'),
(16, 6, 2, 1438519403, '2015-08-02 12:43:23'),
(17, 6, 3, 1438519403, '2015-08-02 12:43:23'),
(18, 6, 6, 1438519403, '2015-08-02 12:43:23'),
(19, 7, 1, 1438522509, '2015-08-02 13:35:09'),
(20, 7, 4, 1438522509, '2015-08-02 13:35:09'),
(21, 7, 6, 1438522509, '2015-08-02 13:35:10'),
(22, 8, 2, 1438522598, '2015-08-02 13:36:38'),
(23, 8, 3, 1438522598, '2015-08-02 13:36:38'),
(24, 8, 5, 1438522598, '2015-08-02 13:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `meal_item_image`
--

CREATE TABLE IF NOT EXISTS `meal_item_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `itemId` bigint(20) DEFAULT NULL,
  `image_org_url` varchar(255) DEFAULT NULL,
  `image_new_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `meal_item_image`
--

INSERT INTO `meal_item_image` (`id`, `itemId`, `image_org_url`, `image_new_url`, `created_at`, `last_updated`) VALUES
(1, 1, 'item3.jpg', 'ki7m_377Cd69gtKX-zOGUR4EhEDtn_ch.jpg', NULL, '2015-07-25 15:11:52'),
(2, 2, 'banner3.jpg', 'ocY5WnAfeEt0ks083InaerKw5J2yfOqG.jpg', NULL, '2015-07-25 15:12:28'),
(3, 3, 'banner1.jpg', '8ztBEZ8MRLPyL5KRorQCePhBanDN5fC8.jpg', NULL, '2015-07-25 15:12:49'),
(4, 4, 'banner2.jpg', 'au1g0_N3YnVSdI3BN247niv8deQSYxe5.jpg', NULL, '2015-07-25 15:13:15'),
(5, 5, 'item1.jpg', '1cpDRRJNdvTM-bpHlkIT3n0UXr5k5062.jpg', NULL, '2015-07-25 15:13:33'),
(6, 6, 'item3.jpg', 'Q0t5IAN5aP2IkC95BpuEmzc-sxl0o30e.jpg', NULL, '2015-07-25 15:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) DEFAULT NULL,
  `meal_id` bigint(20) DEFAULT NULL,
  `meal_quantity` int(11) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
