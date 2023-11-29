-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: 29 نوفمبر 2023 الساعة 23:47
-- إصدار الخادم: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product`
--

-- --------------------------------------------------------

--
-- بنية الجدول `admin`
--

CREATE TABLE `admin` (
  `id` int(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `pri` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `pri`) VALUES
(1, 'mahmoud ', 'b3ecad0cee5ebfb85f0a970610ce068a', 1),
(2, 'ahmed', '3386a93ffcb258847cac9994ff0f115f', 2),
(3, 'sayed  ', 'd2416ceccb13810d88204961485e6ac9', 3);

-- --------------------------------------------------------

--
-- بنية الجدول `brand`
--

CREATE TABLE `brand` (
  `id` int(1) NOT NULL,
  `brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `brand`
--

INSERT INTO `brand` (`id`, `brand`) VALUES
(1, ' Apple           '),
(4, ' Samsung '),
(7, 'Zara'),
(8, 'Amkette');

-- --------------------------------------------------------

--
-- بنية الجدول `cat`
--

CREATE TABLE `cat` (
  `id` int(1) NOT NULL,
  `cat` varchar(50) NOT NULL,
  `parent` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `cat`
--

INSERT INTO `cat` (`id`, `cat`, `parent`) VALUES
(2, 'Phones', 25),
(19, 'Clothes  ', 26),
(20, 'Electronic   ', 25),
(25, 'Devices', 0),
(26, 'Fashion    ', 0);

-- --------------------------------------------------------

--
-- بنية الجدول `chart`
--

CREATE TABLE `chart` (
  `id` int(1) NOT NULL,
  `id_user` int(1) NOT NULL,
  `id_pro` int(1) NOT NULL,
  `quantity` int(1) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `chart`
--

INSERT INTO `chart` (`id`, `id_user`, `id_pro`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(29, 46, 68, 1, '180.00', NULL, NULL),
(30, 48, 115, 10, '9999.90', NULL, NULL),
(31, 50, 68, 1, '180.00', NULL, NULL),
(110, 41, 67, 32, '2610.00', NULL, NULL),
(112, 42, 68, 1, '180.00', NULL, NULL),
(113, 41, 68, 7, '630.00', NULL, NULL),
(114, 209, 68, 1, '180.00', NULL, NULL),
(115, 41, 69, 6, '300.00', NULL, NULL),
(116, 41, 71, 3, '576.00', NULL, NULL),
(123, 52, 85, 12, '1319.40', NULL, NULL),
(124, 52, 84, 6, '95.94', NULL, NULL),
(125, 52, 86, 11, '626.89', NULL, NULL),
(126, 52, 195, 13, '233.35', NULL, NULL),
(127, 52, 91, 11, '263.89', NULL, NULL),
(128, 60, 68, 15, '2700.00', NULL, NULL),
(129, 60, 71, 9, '1728.00', NULL, NULL),
(130, 60, 86, 13, '740.87', NULL, NULL),
(131, 60, 85, 18, '1979.10', NULL, NULL),
(132, 60, 92, 15, '960.00', NULL, NULL),
(133, 60, 67, 10, '2610.00', NULL, NULL),
(180, 51, 114, 14, '8386.00', NULL, NULL),
(181, 51, 95, 65, '7410.00', NULL, NULL),
(182, 41, 95, 6, '684.00', NULL, NULL),
(183, 41, 86, 11, '626.89', NULL, NULL),
(185, 225, 67, 1, '2610.00', NULL, NULL),
(186, 225, 69, 6, '300.00', NULL, NULL),
(187, 226, 82, 45, '1003.50', NULL, NULL),
(188, 226, 88, 10, '399.90', NULL, NULL),
(189, 226, 86, 5, '284.95', NULL, NULL),
(190, 41, 115, 4, '3999.96', NULL, NULL),
(211, 230, 67, 4, '696.00', NULL, NULL),
(212, 230, 71, 1, '192.00', NULL, NULL),
(213, 230, 68, 6, '1080.00', NULL, NULL),
(214, 231, 69, 1, '100.00', NULL, NULL),
(215, 231, 68, 15, '2700.00', NULL, NULL),
(216, 232, 68, 1, '180.00', NULL, NULL),
(217, 232, 71, 1, '192.00', NULL, NULL),
(218, 232, 70, 1, '669.00', NULL, NULL),
(219, 232, 79, 1, '800.00', NULL, NULL),
(220, 233, 87, 28, '2571.80', NULL, NULL),
(221, 233, 68, 5, '900.00', NULL, NULL),
(222, 233, 69, 6, '600.00', NULL, NULL),
(223, 233, 83, 19, '1063.81', NULL, NULL),
(224, 233, 95, 19, '2166.00', NULL, NULL),
(233, 233, 67, 1, '87.00', NULL, NULL),
(394, 224, 69, 1, '100.00', NULL, NULL),
(395, 224, 68, 5, '900.00', NULL, NULL),
(396, 224, 71, 5, '960.00', NULL, NULL),
(406, 224, 194, 1, '19.85', NULL, NULL),
(407, 224, 114, 2, '1198.00', NULL, NULL);

-- --------------------------------------------------------

--
-- بنية الجدول `comment`
--

CREATE TABLE `comment` (
  `id` int(1) NOT NULL,
  `id_user` int(1) NOT NULL,
  `id_pro` int(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `comment`
--

INSERT INTO `comment` (`id`, `id_user`, `id_pro`, `name`, `comment`, `date`) VALUES
(22, 41, 70, 'mahmoudabdallatief', 'yahoda', '2023-05-07 14:43:22'),
(30, 41, 68, 'mahmoudabdallatief', 'qwertyuiiopp', '2023-05-07 15:50:02'),
(39, 41, 69, 'mahmoudabdallatief', 'i', '2023-06-21 23:25:57'),
(42, 41, 71, 'mahmoudabdallatief', '][][][;\'\'\'\'\'\'\'\'\'\'\'', '2023-05-07 16:32:57'),
(43, 41, 71, 'mahmoudabdallatief', 'mo salah', '2023-05-07 16:33:31'),
(44, 42, 68, 'abdalla abo rayya', 'ya hoda\n', '2023-05-07 16:36:02'),
(45, 42, 68, 'abdalla abo rayya', 'lokjhgfdas', '2023-05-07 16:36:21'),
(46, 42, 68, 'abdalla abo rayya', 'u', '2023-05-07 16:40:36'),
(47, 42, 68, 'abdalla abo rayya', 'iip[\';', '2023-05-07 16:38:50'),
(48, 42, 68, 'abdalla abo rayya', 'o', '2023-05-07 16:42:05'),
(49, 42, 68, 'abdalla abo rayya', 'qqwertyui', '2023-05-07 16:43:55'),
(50, 42, 68, 'abdalla abo rayya', 'qqqq', '2023-05-07 16:44:25'),
(51, 42, 68, 'abdalla abo rayya', 'eeeee', '2023-05-07 16:46:19'),
(54, 42, 68, 'abdalla abo rayya', 'abduallah\n', '2023-05-07 17:09:35'),
(166, 41, 68, 'mahmoudabdallatief', 'tttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', '2023-05-13 10:44:34'),
(167, 41, 68, 'mahmoudabdallatief', 'yahoda', '2023-05-12 02:46:17'),
(189, 41, 82, 'mahmoudabdallatief', 'ooooo', '2023-05-12 04:54:34'),
(190, 41, 82, 'mahmoudabdallatief', 'uyiuy', '2023-05-12 04:59:33'),
(191, 41, 82, 'mahmoudabdallatief', 'yyyyyyyyyyyyyyyyyyyyy', '2023-05-12 05:00:30'),
(207, 41, 85, 'mahmoudabdallatief', 'wow It is Impossible!!!!!!!', '2023-05-12 20:48:26'),
(209, 60, 68, 'ii', 'lmaza nahno hona soalon saabo yrawdony\n', '2023-05-13 12:02:36'),
(210, 60, 68, 'ii', 'yahoda', '2023-05-13 14:16:05'),
(211, 60, 68, 'ii', 'op[][[pppmahmoud', '2023-05-13 12:28:19'),
(217, 60, 68, 'ii', 'op[]ebrshimlmaza[[pppppppppppyyyyyyyyyyyyyyyyyyyyyytttttttttttttttttttttttttttttttttttttttttttttttttttt', '2023-05-13 12:33:22'),
(223, 60, 68, 'ii', 'loooooooooooo', '2023-05-13 14:12:20'),
(224, 60, 68, 'ii', 'looooooooooooqwertlmaza', '2023-05-13 14:12:32'),
(225, 60, 68, 'ii', 'hhhhhhhhhhh', '2023-05-13 14:17:11'),
(226, 60, 68, 'ii', 'jjjjjjjjjj', '2023-05-13 16:33:29'),
(227, 60, 68, 'ii', 'uiuiuiu', '2023-05-13 17:31:05'),
(243, 60, 80, 'ii', 'p', '2023-05-14 15:10:18'),
(245, 226, 84, 'mahmoudahmed', 'pppppppppp', '2023-05-17 23:08:33'),
(246, 226, 84, 'mahmoudahmed', 'uuuuuuuu', '2023-05-17 23:20:28'),
(247, 41, 67, 'mahmoudabdallatief', 'ooooooooooooooo', '2023-06-21 18:03:14'),
(248, 41, 67, 'mahmoudabdallatief', '[[[[[[[[[[[[[', '2023-06-21 18:05:33'),
(249, 41, 67, 'mahmoudabdallatief', 'qqq', '2023-06-21 18:06:39'),
(250, 41, 67, 'mahmoudabdallatief', 'yyyyyyyyyyyyyyyyy', '2023-06-21 18:19:52'),
(251, 41, 67, 'mahmoudabdallatief', 'bbbbbbbbbbbbbb', '2023-06-21 18:24:41'),
(252, 41, 67, 'mahmoudabdallatief', 'pppppppppppppppp', '2023-06-21 18:29:04'),
(253, 41, 67, 'mahmoudabdallatief', 'zzzzzzz', '2023-06-21 18:43:28'),
(254, 41, 67, 'mahmoudabdallatief', 'rrrrrrrrrrrr', '2023-06-21 18:57:01'),
(255, 41, 67, 'mahmoudabdallatief', 'ooooo', '2023-06-21 18:58:55'),
(256, 41, 67, 'mahmoudabdallatief', 'qqqqqq', '2023-06-21 19:02:19'),
(257, 41, 67, 'mahmoudabdallatief', 'aaaaaaaaaaaa', '2023-06-21 19:02:53'),
(258, 41, 67, 'mahmoudabdallatief', 'qq', '2023-06-21 19:18:41'),
(259, 41, 67, 'mahmoudabdallatief', 'ttttt', '2023-06-21 20:23:37'),
(260, 41, 67, 'mahmoudabdallatief', 'sssssssssssss', '2023-06-21 20:24:36'),
(261, 41, 67, 'mahmoudabdallatief', 'tttttttttttttttt', '2023-06-21 20:30:00'),
(262, 41, 67, 'mahmoudabdallatief', 'uuuuuuuuuuuu', '2023-06-21 20:32:04'),
(263, 41, 67, 'mahmoudabdallatief', 'yyyyyy', '2023-06-21 20:42:21'),
(264, 41, 67, 'mahmoudabdallatief', 'p', '2023-06-21 20:54:23'),
(265, 41, 67, 'mahmoudabdallatief', 'oi', '2023-06-21 21:06:35'),
(266, 41, 67, 'mahmoudabdallatief', 'yahhoda', '2023-06-21 21:26:05'),
(267, 41, 67, 'mahmoudabdallatief', 'oooooooo', '2023-06-21 21:27:44'),
(268, 41, 67, 'mahmoudabdallatief', 'qqqqqqq', '2023-06-21 21:28:46'),
(269, 41, 67, 'mahmoudabdallatief', 'monday', '2023-06-21 21:29:28'),
(270, 41, 67, 'mahmoudabdallatief', 'prrrrrrrr', '2023-06-21 21:33:19'),
(271, 41, 67, 'mahmoudabdallatief', 'ii', '2023-06-21 21:45:03'),
(272, 41, 67, 'mahmoudabdallatief', 'o', '2023-06-21 21:46:14'),
(275, 41, 67, 'mahmoudabdallatief', 'p', '2023-06-21 23:21:30'),
(276, 41, 67, 'mahmoudabdallatief', 'lmaza nahno hona soalon sabon soalon ', '2023-06-22 00:33:24'),
(277, 41, 67, 'mahmoudabdallatief', 'pppppppppppp', '2023-06-22 01:05:30'),
(278, 41, 67, 'mahmoudabdallatief', 'ya', '2023-06-22 01:10:20'),
(398, 238, 71, 'tageldin1yyyyyyyyyyy', 'yyyyyyyy', '2023-07-30 22:00:46');

-- --------------------------------------------------------

--
-- بنية الجدول `message`
--

CREATE TABLE `message` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number` varchar(11) NOT NULL,
  `message` text NOT NULL,
  `view` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `number`, `message`, `view`, `date`) VALUES
(260, 'محمود', 'mahmou\'d@elemento.com', '01227672362', 'ooooo\'', 1, '2023-07-29 05:24:08'),
(261, 'الواد بودي', 'mahmou\'d@elementor.com', '01280506474', 'حبيب الكل الكل حبيبه', 1, '2023-07-29 19:56:20'),
(262, 'موبينيل', 'mahmo\'ud@elementor.com', '01227672362', 'عشان لازم نكون مع بعض', 1, '2023-07-29 19:56:40'),
(263, 'حسن حسني', 'mahmo\'ud@elementor.com', '01227672362', 'المستحيل ليس نصراني', 1, '2023-07-29 19:57:10'),
(264, 'ماما', 'mahmo\'ud@elementor.com', '01227672362', 'وحشتني يا محمود', 1, '2023-07-29 19:58:48'),
(273, 'saaaaassaa', 'mahmoudel@mentor.com', '01280506474', 'lmaza', 1, '2023-08-16 00:55:12');

-- --------------------------------------------------------

--
-- بنية الجدول `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- بنية الجدول `orders`
--

CREATE TABLE `orders` (
  `id` int(1) NOT NULL,
  `user_id` int(1) NOT NULL,
  `billing_name` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `billing_city` varchar(255) NOT NULL,
  `billing_state` varchar(255) NOT NULL,
  `billing_zip` varchar(255) NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_city` varchar(255) NOT NULL,
  `shipping_state` varchar(255) NOT NULL,
  `shipping_zip` varchar(255) NOT NULL,
  `total` decimal(9,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- إرجاع أو استيراد بيانات الجدول `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `billing_name`, `billing_address`, `billing_city`, `billing_state`, `billing_zip`, `shipping_name`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_zip`, `total`, `created_at`) VALUES
(26, 224, 'mahmou\'d', 'tant\'a', 'zaya\'t', 'delt\'a', '123456789', 'ahm\'ed', 'bahir\'a', 'man\'soura', 'delt\'a', '123456789', '2700.00', '2023-08-17 03:12:54'),
(27, 229, 'abd\'alla', 'mounofi\'a', 'sheb\'in', 'elkou\'bry', '1234567894', 'Ism\'ail', 'alexa\'ndria', 'sydi-Ga\'ber', 'el-ba\'hr', '123451234567', '3132.00', '2023-08-17 00:22:44');

-- --------------------------------------------------------

--
-- بنية الجدول `priv`
--

CREATE TABLE `priv` (
  `id_priv` int(1) NOT NULL,
  `name` varchar(20) NOT NULL,
  `priv` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `priv`
--

INSERT INTO `priv` (`id_priv`, `name`, `priv`) VALUES
(1, 'owner', 300),
(2, 'admin', 200),
(3, 'supervisor', 100);

-- --------------------------------------------------------

--
-- بنية الجدول `prro`
--

CREATE TABLE `prro` (
  `id` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `count` int(1) NOT NULL,
  `brand` int(1) NOT NULL,
  `cat` int(1) NOT NULL,
  `des` text NOT NULL,
  `cover` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  `offer` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `prro`
--

INSERT INTO `prro` (`id`, `name`, `price`, `count`, `brand`, `cat`, `des`, `cover`, `date`, `offer`) VALUES
(67, 'Samsung Galaxy A12 (32GB, 3GB) 6.5\' HD+, Quad Camera, 5000mAh Battery, Global 4G Volte (AT&T Unlocked for T-Mobile, Verizon, Metro) A125U (Blue)', '174.00', 32, 4, 2, '6.5\" 720 x 1600 (HD+) PLS TFT LCD Infinity-V Display, 5000mAh Battery, Fingerprint (side-mounted)128GB ROM, 4GB RAM, Exynos 850 (8nm), Octa-core (4x2.0 GHz Cortex-A55 &amp; 4x2.0 GHz Cortex-A55), Mali-G52, Android 11, One UI 3.1Rear Camera: 48MP, F2.0 + 5MP, F2.2 + 2MP, F2.4 + 2MP, F2.4, Front Camera: 8MP, F2.2, Bluetooth 5.02G Bands: 850, 900, 1800, 1900MHz, 3G Bands: 850, 900, 1700, 1900, 4G LTE Bands: 1, 3, 5, 7, 8, 20, 28, 38, 40, 41 - Dual SIMInternational Model - No Warranty in US. Compatible with Most GSM Carriers like T-Mobile, AT&amp;T, MetroPCS, etc. Will NOT work with CDMA Carriers Such as Verizon, Cricket, Boost', '888af5988301ee411a7e55d092d12a231a.jpg,0ab1ccdeda8ad297d143b3b776fa24481b_.jpg,62dd7a4166b11fd54bb7441ed551cf1b1c_.jpg,e85f0c562ad93da2f3033f668a13d4631d.jpg', '2023-08-10 12:00:00', '87.00'),
(68, 'OnePlus Nord N20 5G |Android Smart Phone |6.43', '180.00', 15, 4, 2, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">5G Enabled - The OnePlus Nord N20 is the perfect entry-level 5G phone, featuring premium specs and an affordable price. *5G compatible with T-mobile, Google Fi, Mint Mobile, Metro by TMO, Simple Mobile. 5G available in selected areas, please check with your carrier.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">6.43” Display - Immerse yourself into your favorite content with a large FHDplus AMOLED Display, delivering sharp detail and deep colors.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Qualcomm Snapdragon 695 - With 6GB of powerful RAM and a 5G Snapdragon processor, the N20 5G can handle anything from your favorite content to streaming online games.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Large 4500mAh Battery - Spend less time plugged in with an extra large battery.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">33W Fast Charging - Get a day’s power in half an hour with 33W Fast Charging.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">6GB RAM - Download your favorite games and apps and switch seamlessly between them.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">128GB Storage - Store photos and videos without worry with large expandable storage, up to 512GB.</span></li></ul>', 'fb7c95931f2ba2386c13f2e69fbf02282a.jpg,23d96a4cb5020ccad6fbc5eaec7c98f82b.jpg,77b06789ca6e520f5a203ebce9628f142c.jpg,46925d3cff09bddae68a6533085e9a842d.jpg', '2023-06-01 17:34:00', '90.00'),
(69, 'SAMSUNG Galaxy Z Fold 4 Cell Phone, Factory Unlocked Android Smartphone, 256GB, Flex Mode, Hands Free Video, Multi Window View, Foldable Display, S Pen Compatible, US Version, Phantom Black     ', '100.00', 12, 4, 2, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">FLEX MODE: Free up your hands with Flex Mode on the Galaxy Z Fold4; This smartphone stands on its own so you can take notes during a conference call or follow along with instructional videos in real time.Form_factor : Fold</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">HANDS FREE VIDEO: Don’t stay stuck to your cellphone; Set up your phone in Flex Mode and check off your to-dos while catching up with friends; Hands-free video chat lets you multitask and move freely while staying in frame</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">MULTI-VIEW WINDOW: Easily attend a virtual work meeting and capture important notes at the same time, or catch up on your favorite shows as you answer texts; With multiple windows, doing different tasks is easy with Galaxy Z Fold4</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">S PEN READY: Transform your Galaxy Z Fold4 into a multifunctional device with S Pen; It gives you that pen-on-paper feeling and makes it easy to take notes while attending virtual meetings, drag and drop content, and get more done</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">YOUR APPS, YOUR WAY: App display optimization allows you to customize how you see apps on the edge-to-edge screen of Galaxy Z Fold4; Also, use multiple apps to their full potential by dragging and dropping content from one window to the other</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">YOUR PHONE &amp; WATCH WORK AS ONE: Unfold the possibilities of your Galaxy Z Fold4 connected to your Galaxy Watch; Use your Watch to snap hands-free selfies with Flex Mode; Plus, keep track of your day by easily switching between your Galaxy Watch and phone</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">BIG SCREEN, BIG SOUND: Need to head out while you’re in the middle of your favorite podcast, Slide Galaxy Z Fold4 into your pocket and keep listening with your Galaxy Buds; Unfold connectivity with your smart phone and Buds working together</span></li></ul>', 'b13c94bb8dd7ede77ba3a10b4dfc48f03a.jpg,43dfa4c13730b3e4490f2d190aff6b653b.jpg,8cc247820abe6ee58ea16491d9e40f163c.jpg,854eb7e582e26e0d853ab7a7cb2bb0283d.jpg', '2023-06-07 17:53:00', '50.00'),
(70, 'SAMSUNG Galaxy S20 FE 5G Cell Phone, Factory Unlocked Android Smartphone, 128GB, Pro Grade Camera, 30X Space Zoom, Night Mode, US Version, Cloud Navy', '669.00', 19, 4, 2, 'MORE FREEDOM: With unlocked by Samsung, you call the shots; Start with the Galaxy S20 FE 5G then choose your carrier, data plan, services, features, and apps, so you get the phone you want, set up exactly how you want.Form_factor : SmartphoneINFINITY-O DISPLAY: The 6.5” FHD Infinity-O Display has barely-there bezels surrounding the flat edges, and a super small punch hole for the camera*; Meaning a more immersive screen that makes your gaming, streaming, and video calling way more funPRO-GRADE CAMERA: The same pro-grade triple lens S20 camera, now available in FE; Three cameras on the rear let you snapshot moments in your own way30X SPACE ZOOM: Zoom in close from afar or magnify details of something nearby with the power of 30X Space ZoomNIGHT MODE: With bigger pixels and enhanced camera AI, the rear camera adjusts to pull in light even when it’s dark so your shots come out detailed and colorfulSINGLE-TAKE AI: One tap of the screen captures multiple images and videos all at once. the Super AMOLED display refreshes at a super smooth 120Hz to keep action clear and touch response fastGET THE MOST OUT OF 5G: Powered by Qualcomm Snapdragon 865 5G Mobile Platform, you can game on in real time with little lag, while your streams and video calls come through clear', 'a93ab88df0ced9687806ddb9eec3e6844a.jpg,9b12c062a336d22e2cf9db8c9c02c91a4b.jpg,04a3aa42bb6d0390558c5d5a9ab997c64c.jpg,914aba576d205b98d4d9b72163d1fbd24d.jpg', '2023-08-16 06:02:00', '334.50'),
(71, 'SAMSUNG Galaxy A23 (SM-A235M/DS) Dual SIM,64 GB 4GB RAM, Factory Unlocked GSM, International Version - No Warranty - (Blue) SAMSUNG Galaxy A23 (SM-A235M/DS) Dual SIM,64 GB 4GB RAM, Factory Unlocked GSM, International Version - No Warranty - (Blue)', '192.00', 9, 4, 2, 'Display: 6.6 inches, 104.9 cm2 (~83.0% screen-to-body ratio) | 1080 x 2408 pixels, 20:9 ratio | Corning Gorilla Glass 6Cameras: 50 MP, f/1.8, (wide), PDAF | 5 MP, f/2.2, (ultrawide), 1/5\", 1.12µm | 2 MP, f/2.4, (macro) | 2 MP, f/2.4, (depth) | 8 MP, f/2.2, (wide)Battery: Li-Po 5000 mAh, non-removable | Fast charging 25WMemory: 64GB ROM + 4GB RAMFactory Unlocked Cell Phones are compatible with most GSM carriers. This phone is not compatible with CDMA carriers like Verizon, Sprint, or Boost.', '899a1c0a6c18cf6642e1632d4f8aa3585a.jpg,661d39f6f8a85a72943e6cc70126fcb15b.jpg,0814810dc4c552c9056734c76c95a85f5c.jpg,0c8e0499ab2979fe5c678f41949df4c35d.jpg', '1972-06-10 02:24:00', '0.00'),
(72, 'Samsung Galaxy A13 (SM-A135M/DS) Dual SIM,32 GB 3GB RAM, Factory Unlocked GSM, International Version - No Warranty - (Black)', '143.00', 43, 4, 2, '4G LTE Bands: 1, 3, 5, 7, 8, 20, 28, 38, 40, 41Display: 6.6 inches, 104.9 cm2 (~83.2% screen-to-body ratio) | 1080 x 2408 pixels, 20:9 ratio (~400 ppi density) | Corning Gorilla Glass 5Cameras: 50 MP, f/1.8, (wide), PDAF | 5 MP, f/2.2, 123˚ (ultrawide), 1/5\", 1.12µm | 2 MP, f/2.4, (macro) | 2 MP, f/2.4, (depth) | 8 MP, f/2.2, (wide)Battery: Li-Po 5000 mAh, non-removable | Fast charging 15WFactory Unlocked Smartphones are compatible with most GSM carriers. This phone is not compatible with CDMA carriers like Verizon, Sprint, or Boost.', 'c761971a253f841ca0cc15d4654f1d5b6a.jpg,20dab60731c3d7ea846fe881c58c16986b.jpg,cadbef3eed6cffe670f6fc6f6f074a6e6c.jpg,f3f6d98e913d368bb9199888339fb3f96d.jpg', '1972-06-10 02:24:00', '0.00'),
(73, 'Simple Mobile Samsung Galaxy A03s, 32GB, Black - Prepaid Smartphone (Locked)', '49.00', 44, 4, 2, 'Capture life on the go in perfect detail with a 13MP main camera.6.5\" HD+ LCD display, and 32GB storage expandable all the way up to 1TB.Relive your memories all day long with a 5,000mAh battery.This phone is locked for use with Simple Mobile.Compatible with Simple Mobile Unlimited talk, text &amp; data plans starting at $25/mo.', '76fcae2265a20517d56bfa4e253405f97a.jpg,27ab216c9fec5ccdb15493b40bc2b97d7b.jpg,24c9eefddc483e94d51719470a9045f07c.jpg,19e476ed3e3ad7337377ab366966ba8f7d.jpg', '1972-06-10 02:24:00', '0.00'),
(74, 'Samsung Galaxy S20 FE 5G, 128GB, Cloud Navy - Unlocked (Renewed)', '234.00', 34, 4, 2, '6.5-inch FHD+ Dynamic AMOLED 2X Infinity-O Display, 120Hz, HDR10+, 1080 x 2400 pixels, IP68 for water and dust resistant128GB ROM, 6GB RAM, Qualcomm SM8250 Snapdragon 865 (7 nm+), Android 10, Octa-core, Adreno 650, One UI 2.5, 4500mAh BatteryRear Camera: 12MP Wide (F/1.8 aperture) + 12MP Ultrawide (F/2.2 aperture) + 8MP Telephoto (F/2.4 aperture), Front Camera: 32MP (F/2.2 aperture) , Under Display Fingerprint2G: GSM 850/900/1800/1900, CDMA 800/1900 &amp; TD-SCDMA, 3G: HSDPA 850/900/1700(AWS)/1900/2100, CDMA2000 1xEV-DO, 4G: LTE 1, 2, 3, 4, 5, 7, 8, 12, 13, 14, 20, 25, 26, 28, 29, 30, 38, 39, 40, 41, 46, 66, 71, 5G: SA/NSA/Sub6 (ensure to check compatibility with your carrier before purchase)American Model, Compatible with Most GSM and CDMA Carriers like Telus, Rogers, Freedom, etc. Will Also work with CDMA Carriers Such as Verizon, Sprint.', '906a2322021e02e2cb40c03cae4928848a.jpg,62e3ed1a83874e84918b025d6ffa8c008b.jpg,830facb63a0e3db02e838f677621db9f8c.jpg,fe2a0e99f62093d0cd0853e921b51f838d.jpg', '2023-08-16 06:01:00', '117.00'),
(75, 'Galaxy S8 Waterproof Case, YMCCOOL Full Protective Shock/Snow/Dirtproof with IP68 Certified Waterproof Case for Samsung Galaxy S8 5.8inch     ', '16.00', 27, 4, 2, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">【Extra Waterproof】 : Perfect waterproof case compatible with Samsung Galaxy S8 (ONLY), Safe in water even after 1000 times test of using for 1 hour underwater 6.6ft, much better than IP68 Rating, great protection for any underwater activities or outdoor/daily use.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">【Multi-Protection】 : Full body protection designed to exceed Military Standard 810G-516, guard your phone even after 1000 times drop from 6.6ft/2m height. The YMCCOOL case is also Snow/Dirt/Dustproof, rugged to adapt to all harsh environments.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">【Slim &amp; Sensitive Touch】: Slim body 0.55inch/13mm provides layers of protection and doesn\'t add much to the size of the Galaxy S8, Front cover with built-in screen protector of crystal clarity prevents scratches, the sensitivity won\'t be affected.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">【Easy Installation】: Fully sealed even after 1000 times open and close. Two covers (front/back) snap on design makes it fast and easy to install or take off in seconds.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">【Pefect Quality】All YMCCOOL Samsung Galaxy Waterproof Case are Easy access to all buttons, ports and jacks following your S8 precision lines .You will get IP68 Waterproof case for Samsung Galaxy S8,Professional Screen Cleaning Paper,Lanyard,Manual for Installation.</span></li></ul>', '51b0c5672ea06a7f861564701271c7d39a.jpg,7c316dfeb1c043673d0c17aa6d623cff9b.jpg,43c9a8db3d34b20dc159180718b6d4b19c.jpg,9a2fcc33f0ae70aea83895fa69a2e9e19d.jpg', '2023-06-07 15:59:00', '8.00'),
(76, 'Samsung Galaxy Note 10, 256GB, Aura Black - Fully Unlocked (Renewed)', '239.99', 32, 4, 2, '- This pre-owned product has been professionally inspected, tested and cleaned by Amazon qualified vendors.- This product is in \"Excellent condition\". The screen and body show no signs of cosmetic damage visible from 12 inches away.- This product will have a battery that exceeds 80% capacity relative to new.- Accessories may not be original, but will be compatible and fully functional. Product may come in generic box.- Product will come with a SIM removal tool, a charger and a charging cable. Headphone and SIM card are not included.- This product is eligible for a replacement or refund within 90-days of receipt if it does not work as expected.- Refurbished phones are not guaranteed to maintain their waterproof seal', '49f80baa7d3b44b9a17049c3e18e609b10a.jpg,9ee2b2bbdd1a7c6f93cd5b35f64ab18d10b.jpg,fa74d081ce34ba5a8dfec0294cdbbc1210c.jpg,9acb6dcfa2324fa2f2005d6a36af6b8a10d.jpg', '1972-06-10 02:24:00', '0.00'),
(77, 'Apple iPhone 11, 64GB, Green - Unlocked (Renewed)', '319.99', 33, 1, 2, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">This phone is unlocked and compatible with any carrier of choice on GSM and CDMA networks (e.g. AT&amp;T, T-Mobile, Sprint, Verizon, US Cellular, Cricket, Metro, Tracfone, Mint Mobile, etc.).</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Tested for battery health and guaranteed to have a minimum battery capacity of 80%.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Successfully passed a full diagnostic test which ensures like-new functionality and removal of any prior-user personal information.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">The device does not come with headphones or a SIM card. It does include a generic (Mfi certified) charger and charging cable.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Inspected and guaranteed to have minimal cosmetic damage, which is not noticeable when the device is held at arm\'s length.</span></li></ul>', '7698b61d26f037473a9a4b8e4553f73311a.jpg,df8ce42ad9e66126a75ff986be7a085611b.jpg,f520dfdeb1a15078e36f66085bcc30d811c.jpg,f7262f60330b7f0c93e3a5254770998b11d.jpg', '0000-00-00 00:00:00', '0.00'),
(78, 'Apple iPad Air 2, 16 GB, Space Gray (Renewed)', '155.00', 12, 1, 2, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Renewed products look and work like new. These pre-owned products have been inspected and tested by Amazon-qualified suppliers, which typically perform a full diagnostic test, replacement of any defective parts, and a thorough cleaning process. Packaging and accessories may be generic. All products on Amazon Renewed come with a minimum 90-day supplier-backed warranty.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">A8X Chip with 64-bit Architecture; M8 Motion Coprocessor</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Wi-Fi (802.11a/b/g/n/ac): 16 GB Capacity: 2GB RAM</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">8 MP iSight Camera; FaceTime HD Camera - Up to 10 Hours of Battery Life. Apple iOS 8; 9.7-Inch Retina Display; 2048x1536 Resolution</span></li></ul>', '5e240110d5bb00954a635f97c80e57ea12a.jpg,f6525e469305a4a21c35928eda73d94c12b.jpg,e11e365ccf2a6ac8c29f947e2e9e447712c.jpg,80c746ccb4eab1d99cd499dd9cd9944512d.jpg', '0000-00-00 00:00:00', '0.00'),
(79, '2021 Apple 10.2-inch iPad (Wi-Fi, 64GB) - Silver', '800.00', 22, 1, 2, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Gorgeous 10.2-inch Retina display with True Tone</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">A13 Bionic chip with Neural Engine</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">8MP Wide back camera, 12MP Ultra Wide front camera with Center Stage</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Up to 256GB storage</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Stereo speakers</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Touch ID for secure authentication and Apple Pay</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">802.11ac Wi-Fi</span></li></ul>', 'c077a2672831868f38f856d8399719d113a.jpg,c5386867514f950ba361ac45fc824e5413b.jpg,cad25305db68e65774431f5bec0a3e4d13c.jpg,ff3aa0b308f675e5a4fa517fa2c3136013d.jpg', '0000-00-00 00:00:00', '0.00'),
(80, 'ORIbox Case Compatible with iPhone 11 Case, Heavy Duty Shockproof Anti-Fall Clear case', '44.82', 12, 1, 2, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Display size: 6.1 inches.【Compatible Model 】Compatible with Apple iPhone 11, Crystal Grey</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">【Full Body Protection】3 in 1 Armor construction, inner shell &amp; Soft TPU outer cover shell, offer dual layer protecion, effectively prevents your iphone from impact and scraches.[NOTE: NO front cover/ NO 3rd part screen protector included]</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">【Crystal Design】This clear case shows the original color of your phone,keep your iPhone in natural look with raised lips around screen and camera, offer a better protection. (basic heavy duty case)</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">【Perfect Fit】Exact cutouts for all ports and buttons.Easy to access all original function with full cover protection,charging without removing case.There are dustproof flaps on USB and ring/vibrate switch, keep dust out of your phone.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">【Amazon After-Sales Service】Any defective for this transparent case, please feel free to message us, we will offer you the suitable solution within 1 business day</span></li></ul>', 'e9532190347ace083d473313f981382314a.jpg,27b2d1053f412e067a1c548c9fcafec214b.jpg,f0494f75f8fcc645eb780ee2301c2bfc14c.jpg,b859caefa3d8e2d431cd4fa948ae85d014d.jpg', '0000-00-00 00:00:00', '0.00'),
(81, 'WWW Samsung Galaxy Note 10 Case, Galaxy Note 10 Wallet Case,[Luxurious Romantic Carved Flower] Leather Wallet Case with [Makeup Mirror] [Kickstand Feature] for Samsung Galaxy Note 10 (2019) Black', '14.00', 34, 4, 2, '<ul class=\"a-unordered-list a-vertical a-spacing-mini\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 18px; color: rgb(15, 17, 17); padding: 0px; font-family: \" amazon=\"\" ember\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" background-color:=\"\" rgb(255,=\"\" 255,=\"\" 255);\"=\"\"><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Special design for Samsung Galaxy Note 10 6.3 inches (2019 Released) only. NOTE: This case is not compatible with Note 10 plus /note10 plus 5g /S10.Precise cutouts give access to all ports.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Unique Luxury Laser Carved Flower. Made with premium PU leather.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Inside Cosmetics Mirror Meets Daily Makeup need.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Built-in Card Pockets and Note Holder offer Store all Cards and some Cash.</span></li><li style=\"list-style: disc; overflow-wrap: break-word; margin: 0px;\"><span class=\"a-list-item\">Kickstand function is convenient for movie-watching or video-chatting. Bring more freedom for hands.</span></li></ul>', '77f0cbe4f5caca9013f7fa363f86481f15a.jpg,4b5ebf0fad3b7312b2960e39715e105415b.jpg,c1f712145c839e7db77edc7603929d5015c.jpg,575616536892a31a51ad1f0a5abcd6d415d.jpg', '2023-06-09 03:00:00', '10.00'),
(82, 'Men Casual Premium Slim Fit T-Shirts      ', '22.30', 45, 7, 19, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">Slim-fitting style, contrast raglan long sleeve, three-button henley placket, light weight &amp; soft fabric for breathable and comfortable wearing. And Solid stitched shirts with round neck made for durability and a great fit for casual fashion wear and diehard baseball fans. The Henley style round neckline includes a three-button placket.</span><br>', '6bddb58947e9111e048360b9b7279e8716a.jpg,e84752a06ebc7a18661ccf0944ed42c616b.jpg,c851d793b67cc65b0a56d5e7149ade6016c.jpg,a35ec42d29d3e2942466730edff08e6f16d.jpg', '2023-02-18 06:01:00', '11.15'),
(83, 'Mens Cotton Jacket', '55.99', 19, 7, 19, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">great outerwear jackets for Spring/Autumn/Winter, suitable for many occasions, such as working, hiking, camping, mountain/rock climbing, cycling, traveling or other outdoors. Good gift choice for you or your family member. A warm hearted love to Father, husband or son in this thanksgiving or Christmas Day.</span><br>', 'a3fe1da8c0a4505e1da811be2c6af55317a.jpg,023563f33ad2964859f3f9c9aa85892f17b.jpg,68ec897550575c4073d7eaef41096fd417c.jpg,8d1c993cbdd7a0320b681e3c66e9f3d617d.jpg', '0000-00-00 00:00:00', '0.00'),
(84, 'Mens Casual Slim Fit', '15.99', 13, 7, 19, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">The color could be slightly different between on the screen and in practice. / Please note that body builds vary by person, therefore, detailed size information should be reviewed below on the product description.</span><br>', '72213e875083f1b0d232c8867092214218a.jpg,c57ac2e47f011b7ed5838316194f350b18b.jpg,25a82dc6b7165e3cde5bbd5cecd5a48a18c.jpg,6649e6033e46bd6c80a865d8a477edef18d.jpg', '0000-00-00 00:00:00', '0.00'),
(85, 'Fjallraven - Foldsack No. 1 Backpack, Fits 15 Laptops      ', '109.95', 18, 7, 19, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">Your perfect pack for everyday use and walks in the forest. Stash your laptop (up to 15 inches) in the padded sleeve, your everyday</span><br>', '2a7d4006df2b29bd1dc23f306ef4348a19a.jpg,2cc641062c50f6e0f6ea54395072152719b.jpg,2630d42517c0f64462cf220c5663088119c.jpg,e8187e7ba031c58af832c1f389c9dd3119d.jpg', '2023-02-18 06:56:00', '54.98'),
(86, 'BIYLACLESEN Women\'s 3-in-1 Snowboard Jacket Winter Coats', '56.99', 25, 7, 19, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">Note:The Jackets is US standard size, Please choose size as your usual wear Material: 100% Polyester; Detachable Liner Fabric: Warm Fleece. Detachable Functional Liner: Skin Friendly, Lightweigt and Warm.Stand Collar Liner jacket, keep you warm in cold weather. Zippered Pockets: 2 Zippered Hand Pockets, 2 Zippered Pockets on Chest (enough to keep cards or keys)and 1 Hidden Pocket Inside.Zippered Hand Pockets and Hidden Pocket keep your things secure. Humanized Design: Adjustable and Detachable Hood and Adjustable cuff to prevent the wind and water,for a comfortable fit. 3 in 1 Detachable Design provide more convenience, you can separate the coat and inner as needed, or wear it together. It is suitable for different season and help you adapt to different climates</span><br>', '75d384b6d94da99243497293ac5df63120a.jpg,486b3c46cbb5661ae4014983e421707520b.jpg,038d63207b4d6b0d1a3fbccb2994da5920c.jpg,05b27f25322b8efde7f2abb1f2bdd31a20d.jpg', '0000-00-00 00:00:00', '0.00'),
(87, 'Lock and Love Women\'s Removable Hooded Faux Leather Moto Biker Jacket', '91.85', 28, 7, 19, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">100% POLYURETHANE(shell) 100% POLYESTER(lining) 75% POLYESTER 25% COTTON (SWEATER), Faux leather material for style and comfort / 2 pockets of front, 2-For-One Hooded denim style faux leather jacket, Button detail on waist / Detail stitching at sides, HAND WASH ONLY / DO NOT BLEACH / LINE DRY / DO NOT IRON</span><br>', '5a3d2b91142b52589d19bb38a8ad00c321a.jpg,ed2f47bb1d161588796560b3693d3caa21b.jpg,4063bc226568c23b0641ed07c441c00321c.jpg,301bcba08e655e9b2d00672b01e238e421d.jpg', '0000-00-00 00:00:00', '0.00'),
(88, 'Rain Jacket Women Windbreaker Striped Climbing Raincoats', '39.99', 31, 7, 19, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">Lightweight perfet for trip or casual wear---Long sleeve with hooded, adjustable drawstring waist design. Button and zipper front closure raincoat, fully stripes Lined and The Raincoat has 2 side pockets are a good size to hold all kinds of things, it covers the hips, and the hood is generous but doesn\'t overdo it.Attached Cotton Lined Hood with Adjustable Drawstrings give it a real styled look.</span><br>', 'bff093a3f513cd89c2294b63f6a1998b22a.jpg,0523d57bd9f3fed02132902519969ed122b.jpg,967231d1373483767f858fb2465a208e22c.jpg,17b71aa10133e24665d2d8913d9d1cc922d.jpg', '0000-00-00 00:00:00', '0.00'),
(91, 'DANVOUY Womens T Shirt Casual Cotton Short', '23.99', 43, 7, 19, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">95%Cotton,5%Spandex, Features: Casual, Short Sleeve, Letter Print,V-Neck,Fashion Tees, The fabric is soft and has some stretch., Occasion: Casual/Office/Beach/School/Home/Street. Season: Spring,Summer,Autumn,Winter.</span><br>', '4c4c8da4a5bcef5ccf8fb0842e02fab725a.jpg,47671e7e90bfedf6c49481e0b364479925b.jpg,429f60078ee1b589e9501ac50f96d47a25c.jpg,ed5b640169ddc3cb2df5a6e5e37dba9525d.jpg', '0000-00-00 00:00:00', '0.00'),
(92, 'WD 2TB Elements Portable External Hard Drive - USB 3.0   ', '64.00', 21, 8, 20, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">USB 3.0 and USB 2.0 Compatibility Fast data transfers Improve PC Performance High Capacity; Compatibility Formatted NTFS for Windows 10, Windows 8.1, Windows 7; Reformatting may be required for other operating systems; Compatibility may vary depending on user’s hardware configuration and operating system</span><br>', '41fc7aacbe897454ff76576b9ff720a726a.jpg,24ff1855488defc73a056a21f0946d6326b.jpg,66ea3f07a264abddbb24727e97995a0226c.jpg,17ae51653ee420362b4017c63c2a633626d.jpg', '2023-02-16 16:15:00', '32.00'),
(93, 'SanDisk SSD PLUS 1TB Internal SSD - SATA III 6 Gb/s          ', '109.00', 71, 8, 20, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">Easy upgrade for faster boot up, shutdown, application load and response (As compared to 5400 RPM SATA 2.5” hard drive; Based on published specifications and internal benchmarking tests using PCMark vantage scores) Boosts burst write performance, making it ideal for typical PC workloads The perfect balance of performance and reliability Read/write speeds of up to 535MB/s/450MB/s (Based on internal testing; Performance may vary depending upon drive capacity, host device, OS and application.)</span><br>', 'c9ad6a7114ec37921ec858416ae7c6c027a.jpg,c0878e335873d55e1509add70e5ade4927b.jpg,07147fdcf675848baa9d3d88ac70fcfd27c.jpg,86c6a1386c95bed58e90cacbd7a573c327d.jpg', '2023-02-16 15:01:00', '54.50'),
(94, 'Silicon Power 256GB SSD 3D NAND A55 SLC Cache Performance Boost SATA III 2.5               ', '121.00', 63, 8, 20, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">3D NAND flash are applied to deliver high transfer speeds Remarkable transfer speeds that enable faster bootup and improved overall system performance. The advanced SLC Cache Technology allows performance boost and longer lifespan 7mm slim design suitable for Ultrabooks and Ultra-slim notebooks. Supports TRIM command, Garbage Collection technology, RAID, and ECC (Error Checking &amp; Correction) to provide the optimized performance and enhanced reliability.</span><br>', '785eafa98c7f2de112ba5cf16030613728a.jpg,e78f6f2b8dd07550c908025393f8285428b.jpg,c7669ce708e91b0d589b33a6666575a528c.jpg,2da4d67e65c251a56347c633cf42887128d.jpg', '2023-02-16 15:22:00', '60.50'),
(95, 'WD 4TB Gaming Drive Works with Playstation 4 Portable External Hard Drive', '114.00', 65, 8, 20, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">Expand your PS4 gaming experience, Play anywhere Fast and easy, setup Sleek design with high capacity, 3-year manufacturer\'s limited warranty</span><br>', '8534b9c9ebdf3cc03347a61e825ff68429a.jpg,53a681da0a88d1595236b0954666aa0a29b.jpg,dba0cabd892c3fd97a582ecc2bcaf4dc29c.jpg,f45a8498419d0021daec30e81a65cd9929d.jpg', '0000-00-00 00:00:00', '0.00'),
(114, 'Acer SB220Q bi 21.5 inches Full HD (1920 x 1080) IPS Ultra-Thin', '599.00', 32, 8, 20, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">21. 5 inches Full HD (1920 x 1080) widescreen IPS display And Radeon free Sync technology. No compatibility for VESA Mount Refresh Rate: 75Hz - Using HDMI port Zero-frame design | ultra-thin | 4ms response time | IPS panel Aspect ratio - 16: 9. Color Supported - 16. 7 million colors. Brightness - 250 nit Tilt angle -5 degree to 15 degree. Horizontal viewing angle-178 degree. Vertical viewing angle-178 degree 75 hertz</span><br>', '165cbd9bce89773a90553907dd80bc2730a.jpg,cbe77922e68cf5047d90e15af0247f4830b.jpg,c0103d335da1d33c0405f951a3cd311430c.jpg,e10de36248dc6c561204c3b9fce4056130d.jpg', '0000-00-00 00:00:00', '0.00'),
(115, 'Samsung 49-Inch CHG90 144Hz Curved Gaming Monitor (LC49HG90DMNXZA) – Super Ultrawide Screen QLED         ', '999.99', 41, 4, 20, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">49 INCH SUPER ULTRAWIDE 32:9 CURVED GAMING MONITOR with dual 27 inch screen side by side QUANTUM DOT (QLED) TECHNOLOGY, HDR support and factory calibration provides stunningly realistic and accurate color and contrast 144HZ HIGH REFRESH RATE and 1ms ultra fast response time work to eliminate motion blur, ghosting, and reduce input lag</span><br>', 'ad5d38fd447e3727ab10d32b8a112e8f31a.jpg,8356014b9955951d2eb4fd4a8d40764131b.jpg,6cde78955a1e15c1ae67f627acbe04a531c.jpg,74e5aa8719467173b587391812449b5d31d.jpg', '0000-00-00 00:00:00', '0.00'),
(194, 'MBJ Women\'s Solid Short Sleeve Boat Neck V', '19.85', 31, 7, 19, '<span style=\"font-family: Arial, Helvetica, sans-serif; text-align: center; background-color: rgb(250, 185, 6);\">95% RAYON 5% SPANDEX, Made in USA or Imported, Do Not Bleach, Lightweight fabric with great stretch for comfort, Ribbed on sleeves and neckline / Double stitching on bottom hem.</span><br>', '7fd638d93a876a94871d9fe5f4eecdae23a.jpg,f12a2cd6318a2235c1abd30efcc9368623b.jpg,a3426f77821916caf8b6c5cfd30c487623c.jpg,019017cad6753b3e145c918971e96bfd23d.jpg', '0000-00-00 00:00:00', '0.00'),
(195, 'Opna Women\'s Short Sleeve Moisture', '17.95', 29, 7, 19, '100% Polyester, Machine wash, 100% cationic polyester interlock, Machine Wash &amp; Pre Shrunk for a Great Fit, Lightweight, roomy and highly breathable with moisture wicking fabric which helps to keep moisture away, Soft Lightweight Fabric with comfortable V-neck collar and a slimmer fit, delivers a sleek, more feminine silhouette and Added Comfort.', '98469bd5a733f355725129f3a6d3d08024a.jpg,6ae5992811af7dd55f879f5b1451dc1724b.jpg,64cda4081b9da4be2a85e900595a702324c.jpg,61024c05b6c54b3aeed6cb7b31cf622224d.jpg', '1972-06-10 02:24:00', '0.00');

-- --------------------------------------------------------

--
-- بنية الجدول `ratings`
--

CREATE TABLE `ratings` (
  `id` int(1) NOT NULL,
  `user_id` int(1) NOT NULL,
  `product_id` int(1) NOT NULL,
  `rating` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `rating`) VALUES
(2, 41, 67, 5),
(4, 42, 67, 5),
(5, 42, 68, 2),
(6, 42, 69, 5),
(7, 41, 68, 4),
(11, 41, 71, 3),
(15, 41, 70, 3),
(16, 41, 81, 2),
(17, 41, 75, 2),
(18, 41, 79, 5),
(19, 41, 77, 1),
(20, 41, 194, 3),
(21, 41, 195, 5),
(22, 41, 87, 4),
(23, 41, 82, 5),
(24, 41, 85, 5),
(25, 60, 68, 5),
(26, 60, 67, 5),
(27, 60, 80, 5),
(28, 51, 83, 1),
(29, 51, 84, 3),
(30, 51, 85, 5),
(31, 51, 86, 1),
(32, 51, 92, 5),
(33, 51, 194, 5),
(34, 51, 195, 3),
(35, 51, 69, 4),
(36, 51, 70, 5),
(37, 51, 71, 5),
(38, 51, 73, 5),
(39, 51, 78, 5),
(40, 51, 67, 5),
(41, 226, 82, 4),
(42, 226, 86, 5),
(43, 226, 67, 2),
(44, 41, 69, 1),
(45, 41, 86, 5),
(46, 229, 71, 2),
(47, 229, 67, 3),
(48, 229, 69, 5),
(49, 229, 81, 1),
(50, 229, 70, 1),
(51, 229, 115, 5),
(52, 229, 93, 5),
(53, 229, 114, 5),
(54, 238, 115, 2);

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id_user` int(1) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(41, 'mahmoudabdallatief', 'd40bca347dc4ba32e46e02e227ea5623'),
(42, 'abdalla abo rayya', 'b85a7e65f3f017236523356438dd6ba9'),
(43, 'abdo', '202cb962ac59075b964b07152d234b70'),
(46, 'sayed', 'd2416ceccb13810d88204961485e6ac9'),
(47, 'yassmeen', '2072cba598a3618357f9f081d866c4e8'),
(48, 'yassmeen mohamed', 'ecb388ae932dc5e4b16fcbb7a2498b7d'),
(49, 'hisham', '25d55ad283aa400af464c76d713c07ad'),
(50, 'sh', 'c20ad4d76fe97759aa27a0c99bff6710'),
(51, 'mos', '093f65e080a295f8076b1c5722a46aa2'),
(52, 'aa', '6512bd43d9caa6e02c990b0a82652dca'),
(53, 'tigo', '405e28906322882c5be9b4b27f4c35fd'),
(54, 'tgo', '85d8ce590ad8981ca2c8286f79f59954'),
(55, 'pp', '36347412c7d30ae6fde3742bbc4f21b9'),
(56, 'mahmoudp', '45dd6391bd03aca0e8952a4e2d1bec2e'),
(57, 'mahmoudpp', '9bfebc5bfc3a9fbadc8c24ea7de33654'),
(58, 'mahmoudppp', 'a82072ea51082a695b33aa8f7130e020'),
(59, 'mahmoud]]', 'db6402b2df631b6c6ece6cf47b191f98'),
(60, 'ii', 'd3d9446802a44259755d38e6d163e820'),
(208, 'htyle', '801539bd3705f30dd28c2325a27755ba'),
(209, 'abd', 'f213120b7bd2a53932e046e8151ab139'),
(222, 'script', '9b6ec3a2cbcd5dd2cba693035fa6d63f'),
(223, 'shafikelsayed', 'a24680ffdeba930c59d73ac1c70202be'),
(224, 'mahmoud', 'b3ecad0cee5ebfb85f0a970610ce068a'),
(225, 'mahmoudhoda', '930aedbd91ece2dc612be07ec6546641'),
(226, 'mahmoudahmed', 'b3ada748ba4670767978f30d29749167'),
(227, 'mahmouduuuuuu', 'b558aed36c00344ce0194e60d91da7bd'),
(228, 'tageldin', '018d0b62a196297d0fb8e50db88c43d1'),
(229, 'tageldin1', '2de5313a1fb57a516d79e456a07c139d'),
(230, 'tageldin12', '15f668f964104f566c542df68be8e588'),
(231, 'tageldin122', 'cae904ca03b0a2514155185c0eba641d'),
(232, 'Ebrahimy', '8c3e9a40b4629f193444a6a6e6d134d3'),
(233, 'Ebrahimy1', '09e7b48f5364dc37faad5b9a03f58019'),
(234, 'tageldin1t', '6827142df38cb1e7ef6268f163463ba9'),
(235, 'tageldins', '67e2a948c18d93f10c89a50d40a36ea5'),
(236, 'tageldin1q', '1533804fc6fc6c34b3b313bdafcbc712'),
(237, 'tageldin1w', '8cb7d327666381f9dc4cf0f4f843b0f2'),
(238, 'tageldin1yyyyyyyyyyy', 'e95097ed985a5689760bccadf8200038'),
(239, 'tageldin1l', '4f162560f3c33bdd1ced59b8a3592ca0'),
(240, 'tageldin1o', 'd3b69cf261fc4f5fa6e9ddd77cd273f3'),
(241, 'tageldin1ll', '1daa7af4c186e6688facda871f46d8ec'),
(242, 'tageldin1p', '77a717cd2ac386b5f09949a87dd8ec79'),
(243, 'tageldin1z', '46a6e4d0758fe9dbb284bcf123a0ae99'),
(244, 'tageldin1i', '23e62cb9495ffb510016fafb01656aa8'),
(245, 'tageldin1y', '9cc82dfc1a45b2dfd2ed9e5870053497'),
(246, 'tageldin5', 'c193ea5d7b67665b613b2775d3c83ab1'),
(247, 'tageldin9', 'd3193934a0b1b9b0b6f7c5d6da0c8ff1'),
(248, 'tageldin8', 'ae3f67392998edef89819035769f12a3'),
(249, 'tageldin67', '8a2d77bf42b64713046a11068da70033'),
(250, 'tageldin168', '6b6e6f9df26540096b7cd59e79e6295f'),
(251, 'tageldin189', '0603cbd2fa6bdd35999ad20375bb215b'),
(252, 'tageldin1p9', '0bf19a7e41bd7d1fd3e8150b89e4153d'),
(253, 'tageldin14t', 'e26123c0656c4c8211c0a2bea97bd329');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pre` (`pri`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `priv`
--
ALTER TABLE `priv`
  ADD PRIMARY KEY (`id_priv`);

--
-- Indexes for table `prro`
--
ALTER TABLE `prro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand` (`brand`),
  ADD KEY `cat` (`cat`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=408;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=434;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `priv`
--
ALTER TABLE `priv`
  MODIFY `id_priv` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prro`
--
ALTER TABLE `prro`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`pri`) REFERENCES `priv` (`id_priv`);

--
-- القيود للجدول `prro`
--
ALTER TABLE `prro`
  ADD CONSTRAINT `prro_ibfk_1` FOREIGN KEY (`brand`) REFERENCES `brand` (`id`),
  ADD CONSTRAINT `prro_ibfk_2` FOREIGN KEY (`cat`) REFERENCES `cat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
