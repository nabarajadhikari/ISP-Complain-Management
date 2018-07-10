-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 06:29 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comments1`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('6e8fd33316e64fc2669405a9eab3b3a5', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', 1531155958, 'a:16:{s:8:"identity";s:15:"admin@admin.com";s:8:"username";s:13:"administrator";s:5:"email";s:15:"admin@admin.com";s:7:"user_id";s:1:"1";s:14:"old_last_login";s:10:"1401362621";s:10:"user_group";s:10:"superadmin";s:19:"assigned_technecian";s:2:"13";s:14:"created_date_l";s:0:"";s:14:"created_date_u";s:0:"";s:15:"finished_date_l";s:0:"";s:15:"finished_date_u";s:0:"";s:15:"assigned_date_l";s:0:"";s:15:"assigned_date_u";s:0:"";s:7:"statuss";s:0:"";s:14:"complain_title";s:0:"";s:4:"name";s:0:"";}'),
('edd5b04d1d84a196eadeff841a33b6b3', '::1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64; rv:61.0) Gecko/20100101 Firefox/61.0', 1531163539, 'a:8:{s:9:"user_data";s:0:"";s:8:"identity";s:15:"admin@admin.com";s:8:"username";s:13:"administrator";s:5:"email";s:15:"admin@admin.com";s:7:"user_id";s:1:"1";s:14:"old_last_login";s:10:"1531155501";s:10:"user_group";s:10:"superadmin";s:17:"flash:old:message";s:29:"<p>Logged In Successfully</p>";}');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `ashwin` int(11) NOT NULL,
  `bandwidth` int(11) NOT NULL,
  `expiry_date` datetime NOT NULL,
  `ip_address` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `renew_by` int(11) NOT NULL,
  `renew_date` datetime NOT NULL,
  `rn` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `address`, `ashwin`, `bandwidth`, `expiry_date`, `ip_address`, `name`, `phone`, `remark`, `renew_by`, `renew_date`, `rn`) VALUES
(1, 'test', 0, 0, '0000-00-00 00:00:00', '192.168.1.1', 'test ', '9876543210', 'ok', 0, '2018-07-09 22:45:44', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE IF NOT EXISTS `complains` (
  `id` int(11) NOT NULL,
  `assigned_date` datetime NOT NULL,
  `assigned_technecian` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `complain_message` tinytext NOT NULL,
  `complain_title` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `finish_date` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `orders` varchar(255) NOT NULL,
  `processing_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `status_id` int(11) NOT NULL,
  `technecian_comments` tinytext NOT NULL,
  `updated_by` int(11) NOT NULL,
  `urgent` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `assigned_date`, `assigned_technecian`, `client_id`, `complain_message`, `complain_title`, `created_date`, `finish_date`, `last_update`, `orders`, `processing_date`, `status`, `status_id`, `technecian_comments`, `updated_by`, `urgent`, `user_id`) VALUES
(1, '2018-07-09 10:07:14', 13, 1, 'Internet is too slow', 'Slow', '2018-07-09 22:49:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', 'Assigned', 2, '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `complain_type`
--

CREATE TABLE IF NOT EXISTS `complain_type` (
  `id` int(11) NOT NULL,
  `desc` tinytext NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain_type`
--

INSERT INTO `complain_type` (`id`, `desc`, `name`) VALUES
(1, 'Network slow', 'Slow'),
(2, 'Not working', 'Not Working'),
(3, 'Device not working', 'device not working');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` mediumint(8) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'Super Administrator'),
(2, 'admin', 'Admin/Employee'),
(3, 'technician', 'Technician'),
(4, 'user', 'Front user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` mediumint(8) unsigned NOT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `email_activation` int(11) DEFAULT '0',
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `res_address` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `email_activation`, `active`, `first_name`, `last_name`, `res_address`, `phone`) VALUES
(1, 0x7f000001, 'administrator', '77dd9864091edc75e8294f0c3c8018815172bc4d', '', 'admin@admin.com', '', '', 0, 'cdf55854df701ae5cd55046fdd9c4c532c3efc8a', 1268889823, 1531163665, 0, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(11, 0x00000000000000000000000000000001, 'babin babin', 'c99156ab058bcdf990178cc6325d44e95eaf47fe', '', 'babin@admin.com', '', '', 0, '', 1383062432, 1395568403, 0, 1, 'Babin', 'babin', '', '9898989898'),
(12, 0x00000000000000000000000000000001, 'mukunda mukunda', '3893556444d1a04d06b25db294977b1f76343860', '', 'mukunda@admin.com', '', '', 0, '', 1383062463, 1395567052, 0, 1, 'Mukunda', 'Mukunda', '', '9898989898'),
(19, 0x6e2204f3, 'ranjit ranjit', '4dfa78933d63012c720cabd0381c45af50748d59', '', 'ranjit@hotmail.com', '', '', 0, '', 1387773876, 1387773876, 0, 1, 'Ranjit', 'Ranjit', '', '9898989898'),
(10, 0x00000000000000000000000000000001, 'ananda dhami', 'e7112c803a0a421fdf99c828d7be2e0d25c8cb4d', '', 'ananda@admin.com', '', '', 0, '', 1383061903, 1383061903, 0, 1, 'Ananda', 'Dhami', '', '9898989898'),
(13, 0x00000000000000000000000000000001, 'ajit ajit', '79e2bec7b2bb1fc36a1c3c4c5ef3f3db67dce4a9', '', 'ajit@admin.com', '', '', 0, '', 1383062489, 1392649937, 0, 1, 'Ajit', 'Ajit', '', '9898989898'),
(14, 0x00000000000000000000000000000001, 'bagwir bagwir', '303c60db50a18a754ee7cd01f38eabacdce34540', '', 'bagwir@admin.com', '', '', 0, '', 1383062560, 1383062560, 0, 1, 'Bagwir', 'Bagwir', '', '9898989898'),
(20, 0x6e2204f3, 'arjun arjun', '1c60368f8b72dd1ba8e235a6cad215f32048122b', '', 'arjun@hotmail.com', '', '', 0, '', 1387773914, 1395568738, 0, 1, 'Arjun', 'Arjun', '', '9898989898'),
(16, 0x00000000000000000000000000000001, 'santosh santosh', '8745cea6811390e31dc45cd3329247284acc8e19', '', 'santosh@admin.com', '', '', 0, '', 1383062623, 1383062623, 0, 1, 'Santosh', 'santosh', '', '9898989898'),
(17, 0x00000000000000000000000000000001, 'deepa deepa', 'c383ad6268a159d35c65af9052a9db3cc568f965', '', 'deepa@admin.com', '', '', 0, '', 1383097699, 1394079921, 0, 1, 'Deepa', 'deepa', '', '9898989898'),
(18, 0x00000000000000000000000000000001, 'sita sita', 'f108deb79765ca92d2e23ebd0d8eb54f1f180ec1', '', 'sita@admin.com', '', '', 0, '', 1383097721, 1395301001, 0, 1, 'Sita', 'sita', '', '9898989898');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` mediumint(8) unsigned NOT NULL,
  `user_id` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=91 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(81, 11, 3),
(82, 12, 3),
(77, 7, 1),
(80, 10, 3),
(83, 13, 3),
(84, 14, 3),
(85, 15, 3),
(86, 16, 3),
(87, 17, 4),
(88, 18, 4),
(89, 19, 3),
(90, 20, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain_type`
--
ALTER TABLE `complain_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `complain_type`
--
ALTER TABLE `complain_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
