-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 01:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce2`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `addr_id` int(255) NOT NULL,
  `cust_id` varchar(250) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip` int(11) NOT NULL,
  `add1` varchar(250) NOT NULL,
  `add2` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`addr_id`, `cust_id`, `country`, `city`, `state`, `zip`, `add1`, `add2`) VALUES
(3, '1', 'Yemen', 'aden', 'alsheek othman', 0, 'alsudan st.', NULL),
(4, '1', 'Tajikistan', 'asdsd', 'asd', 35435, 'asdasdasd', NULL),
(5, '1', 'Yemen', 'shaikh outhman', 'aden', 24243, '290/34 EL SUDAN STREET', 'sfascasc'),
(6, '1', 'Yemen', 'shaikh outhman', 'aden', 234234, '290/34 EL SUDAN STREET', 'asdfsadfdsf'),
(7, '1', 'Yemen', 'shaikh outhman', 'aden', 2344, '290/34 EL SUDAN STREET', 'sdfsdf'),
(8, '1', 'Yemen', 'shaikh outhman', 'aden', 214213, '290/34 EL SUDAN STREET', 'asdasd'),
(9, '1', 'Yemen', 'shaikh outhman', 'aden', 23443, '290/34 EL SUDAN STREET', 'dasfsd');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` varchar(250) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_pass` varchar(250) NOT NULL,
  `admin_authority` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_authority`) VALUES
('', 'ramiz', 'ramiz@ramiz.ramiz', '123456789', ''),
('2', 'ramiz', 'ramiz@ramiz.com', '123', '1'),
('user1235464', 'ramiz', 'ramiz@gmail.com', '646846654', 'level1');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `brand_image` varchar(1000) NOT NULL,
  `brand_thumb` varchar(1000) NOT NULL,
  `brand_visible` tinyint(1) NOT NULL DEFAULT 1,
  `brand_order` int(11) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brand_image`, `brand_thumb`, `brand_visible`, `brand_order`, `timestamp`) VALUES
(33, 'apple', '1642988941O6DLStlCaq.png', '1642988941O6DLStlCaq.png', 0, 1, '2022-01-24 01:49:01'),
(34, 'asus', '16429889989o1vFTQLSA.png', '16429889989o1vFTQLSA.png', 1, 1, '2022-01-24 01:49:58'),
(35, 'blackberry', '1642989106ufzwLDgYAq.png', '1642989106ufzwLDgYAq.png', 1, 1, '2022-01-24 01:50:11'),
(37, 'HTC', '1643151400wizeUX4xMX.png', '1643151400wizeUX4xMX.png', 1, 1, '2022-01-25 22:56:40'),
(38, 'Huawei', '1643151412GaiKLoKuu4.png', '1643151412GaiKLoKuu4.png', 1, 1, '2022-01-25 22:56:52'),
(39, 'LG', '1643151422J4Pnn0DYMY.png', '1643151422J4Pnn0DYMY.png', 1, 1, '2022-01-25 22:57:02'),
(40, 'Nokia', '1643151442wWHpGM5r30.png', '1643151442wWHpGM5r30.png', 1, 1, '2022-01-25 22:57:22'),
(41, 'Sony', '1643151452cPDe0Q4mCf.png', '1643151452cPDe0Q4mCf.png', 1, 1, '2022-01-25 22:57:32'),
(42, 'Toshiba', '1643151466iR5ipejp4c.png', '1643151466iR5ipejp4c.png', 1, 1, '2022-01-25 22:57:46'),
(43, 'Samsung', '1643151486jGHMfd9TKl.png', '1643151486jGHMfd9TKl.png', 1, 1, '2022-01-25 22:58:06'),
(44, 'Lenovo', '1643151497eEPQSlOWD7.png', '1643151497eEPQSlOWD7.png', 1, 1, '2022-01-25 22:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `cust_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cart_id`, `cust_id`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`cart_id`, `prod_id`, `quantity`, `description`, `state`) VALUES
(2, 50, NULL, NULL, 1),
(2, 57, NULL, NULL, 0),
(2, 56, NULL, NULL, 0),
(2, 66, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cate_id` int(11) NOT NULL,
  `sect_id` int(11) NOT NULL,
  `cate_name` varchar(250) NOT NULL,
  `cate_description` longtext DEFAULT NULL,
  `cate_image` varchar(1000) NOT NULL,
  `cate_thumb` varchar(1000) NOT NULL,
  `cate_visible` tinyint(1) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `cate_order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cate_id`, `sect_id`, `cate_name`, `cate_description`, `cate_image`, `cate_thumb`, `cate_visible`, `timestamp`, `cate_order`) VALUES
(14, 15, 'Accessories & Supplies', 'memory cards ,Headphones and printer ink and more.', '1643149711aO6DUBgexy.jpg', '1643149711aO6DUBgexy.jpg', 1, '2022-01-25 22:28:31', 1),
(15, 15, 'Video Projectors', 'Video Projectors', '1643150187KINwMRTkjH.jpg', '1643150187KINwMRTkjH.jpg', 1, '2022-01-25 22:36:27', 1),
(16, 15, 'Office Electronics', 'all of office needs', '1643150274AK91yiT1YE.jpg', '1643150274AK91yiT1YE.jpg', 1, '2022-01-25 22:37:54', 1),
(17, 15, 'Cell Phones', 'mobiles', '1643150473kOMd4HAj7W.jpg', '1643150473kOMd4HAj7W.jpg', 1, '2022-01-25 22:41:13', 1),
(18, 15, 'Cell Phones Accessories', 'Cell Phones Accessories', '1643150564qagpuw8jge.jpg', '1643150564qagpuw8jge.jpg', 1, '2022-01-25 22:42:44', 1),
(19, 16, 'Computer Accessories & Peripherals', 'Computer Accessories & Peripherals', '1643150691lq8MtUtSqZ.jpg', '1643150691lq8MtUtSqZ.jpg', 1, '2022-01-25 22:44:51', 1),
(20, 16, 'Computers & Tablets', 'Computers & Tablets', '1643150735oodL5U39DQ.jpg', '1643150735oodL5U39DQ.jpg', 1, '2022-01-25 22:45:35', 1),
(21, 16, 'Data Storage', 'Data Storage', '1643150838kmyqcbVMny.jpg', '1643150838kmyqcbVMny.jpg', 1, '2022-01-25 22:47:18', 1),
(22, 16, 'Monitors', 'Monitors', '1643150892CAOzdhhxDE.jpg', '1643150892CAOzdhhxDE.jpg', 1, '2022-01-25 22:48:12', 1),
(23, 16, 'Printers', 'Printers', '1643150917viQRqEUrCn.jpg', '1643150917viQRqEUrCn.jpg', 1, '2022-01-25 22:48:37', 1),
(24, 18, 'asdasd', NULL, '1643152122rYweRRYBYX.png', '1643152122rYweRRYBYX.png', 1, '2022-01-25 23:08:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comm_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `cust_id` varchar(250) NOT NULL,
  `comment` longtext NOT NULL,
  `likes_no` int(11) DEFAULT 0,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `prod_id` int(11) NOT NULL,
  `open_no` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `cart_no` int(11) NOT NULL,
  `wish_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(250) NOT NULL,
  `cust_fname` varchar(250) NOT NULL,
  `cust_lname` varchar(250) NOT NULL,
  `cust_phone` varchar(20) NOT NULL,
  `cust_email` varchar(250) NOT NULL,
  `cust_password` int(250) NOT NULL,
  `cust_state` varchar(20) NOT NULL,
  `cust_class` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `cust_fname`, `cust_lname`, `cust_phone`, `cust_email`, `cust_password`, `cust_state`, `cust_class`) VALUES
(1, 'habib', 'abdualrahman', '736582685', 'habib@gmail.com', 6546896, 'vip', 'A'),
(2, 'name10', 'last10', '17464666646', 'user10@gamail.com', 654654, 'vip', 'A'),
(3, 'name3', 'last3', '17464666646', 'user3@gamail.com', 654654, 'vip', 'A'),
(4, 'habib', 'abdualrahman', '736582685', 'habib@gmail.com', 6546896, 'vip', 'A'),
(5, 'name4', 'last4', '17464666646', 'user3@gamail.com', 654654, 'vip', 'A'),
(6, 'name5', 'last5', '17464666646', 'user5@gamail.com', 654654, 'vip', 'A'),
(7, 'name6', 'last6', '17464666646', 'user6@gamail.com', 654654, 'vip', 'A'),
(8, 'name7', 'last7', '17464666646', 'user7@gamail.com', 654654, 'vip', 'A'),
(9, 'name8', 'last8', '17464666646', 'user8@gamail.com', 654654, 'vip', 'A'),
(10, 'name9', 'last9', '17464666646', 'user9@gamail.com', 654654, 'vip', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imag_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `thumb` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imag_id`, `prod_id`, `image`, `thumb`) VALUES
(22, 64, '1643159099Z9Dt8SiWU0.jpg', '1643159099Z9Dt8SiWU0.jpg'),
(23, 64, '1643159100VwI0Ot42z6.jpg', '1643159100VwI0Ot42z6.jpg'),
(24, 64, '1643159100K1avJ0ulvQ.jpg', '1643159100K1avJ0ulvQ.jpg'),
(25, 64, '1643159100qkn0hPHIz3.jpg', '1643159100qkn0hPHIz3.jpg'),
(26, 49, '1643676553SKAzpWUgwz.jpg', '1643676553SKAzpWUgwz.jpg'),
(27, 49, '1643676553vuZhfPmv53.jpg', '1643676553vuZhfPmv53.jpg'),
(28, 49, '1643676553kNfb5Hjv3x.jpg', '1643676553kNfb5Hjv3x.jpg'),
(29, 49, '1643677032dphrCl7ceB.jpg', '1643677032dphrCl7ceB.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `new_products`
-- (See below for the actual view)
--
CREATE TABLE `new_products` (
`prod_id` int(11)
,`sect_id` int(11)
,`brand_id` int(11)
,`prod_name` varchar(250)
,`prod_description` varchar(1000)
,`prod_price` double
,`prod_image` varchar(1000)
,`prod_thumb` varchar(1000)
,`prod_max_no` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `offer_image` varchar(1000) NOT NULL,
  `offer_thumb` varchar(1000) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `offer_class` varchar(20) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `percentage`, `offer_image`, `offer_thumb`, `start_date`, `end_date`, `offer_class`, `timestamp`) VALUES
(1, 20, 'assets/images/ps4_console_white_1.png', 'assets/images/ps4_console_white_1.png', '2021-11-03', '2022-02-16', 'A', '2021-11-19 04:50:56'),
(2, 10, 'assets/images/ps4_console_white_1.png', 'assets/images/ps4_console_white_1.png', '2021-11-02', '2021-11-03', 'A', '2021-11-19 04:50:56'),
(3, 15, 'assets/images/Image Popular Product 2.png', 'assets/images/Image Popular Product 2.png', '2021-11-02', '2021-11-03', 'A', '2021-11-19 09:44:34'),
(4, 2, 'assets/images/ps4_console_white_1.png', 'assets/images/ps4_console_white_1.png', '2021-11-01', '2021-11-30', 'B', '2021-11-19 04:50:56'),
(5, 4, 'assets/images/ps4_console_white_1.png', 'assets/images/ps4_console_white_1.png', '2021-11-01', '2021-11-30', 'B', '2021-11-19 04:50:56'),
(6, 5, 'assets/images/ps4_console_white_1.png', 'assets/images/ps4_console_white_1.png', '2021-11-01', '2021-11-30', 'B', '2021-11-19 04:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `offer_items`
--

CREATE TABLE `offer_items` (
  `offer_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cust_id` varchar(250) NOT NULL,
  `transaction_id` int(255) NOT NULL,
  `shipp_id` int(255) DEFAULT NULL,
  `addr_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` double NOT NULL,
  `order_state` varchar(20) NOT NULL DEFAULT '1',
  `order_note` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cust_id`, `transaction_id`, `shipp_id`, `addr_id`, `timestamp`, `total_price`, `order_state`, `order_note`) VALUES
(1, '1', 3, NULL, 7, '2022-02-09 02:25:01', 2770, '1', NULL),
(2, '1', 3, NULL, 7, '2022-02-09 02:25:50', 2770, '1', NULL),
(3, '1', 9, NULL, 7, '2022-02-09 02:29:01', 2020, '1', NULL),
(4, '1', 10, NULL, 6, '2022-02-09 03:23:11', 1000, '1', NULL),
(5, '1', 11, NULL, 3, '2022-02-09 03:25:52', 450, '1', NULL),
(6, '1', 12, NULL, 3, '2022-02-09 03:27:24', 150, '1', NULL),
(7, '1', 13, NULL, 3, '2022-02-09 03:30:33', 400, '1', NULL),
(8, '1', 14, NULL, 3, '2022-02-09 03:33:05', 250, '1', NULL),
(9, '1', 15, NULL, 3, '2022-02-09 03:33:54', 250, '1', NULL),
(10, '1', 16, NULL, 3, '2022-02-09 04:02:05', 250, '1', NULL),
(11, '1', 17, NULL, 3, '2022-02-09 04:09:08', 800, '1', NULL),
(12, '1', 18, NULL, 3, '2022-02-09 04:10:46', 250, '1', NULL),
(13, '1', 19, NULL, 3, '2022-02-10 02:36:41', 150, '1', NULL),
(14, '1', 20, NULL, 3, '2022-02-10 02:38:36', 150, '1', NULL),
(15, '1', 21, NULL, 3, '2022-02-10 03:14:10', 150, '1', NULL),
(16, '1', 22, NULL, 5, '2022-02-10 03:34:29', 3935, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `prod_id`, `quantity`, `description`) VALUES
(2, 67, 3, NULL),
(2, 56, 4, NULL),
(2, 65, 5, NULL),
(3, 49, 4, NULL),
(3, 66, 3, NULL),
(3, 65, 5, NULL),
(4, 68, 4, NULL),
(5, 66, 3, NULL),
(6, 66, 1, NULL),
(7, 67, 1, NULL),
(8, 65, 1, NULL),
(9, 65, 1, NULL),
(10, 65, 1, NULL),
(11, 64, 1, NULL),
(12, 65, 1, NULL),
(13, 66, 1, NULL),
(14, 66, 1, NULL),
(15, 66, 1, NULL),
(16, 66, 3, NULL),
(16, 65, 5, NULL),
(16, 56, 2, NULL),
(16, 51, 3, NULL),
(16, 55, 2, NULL),
(16, 64, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paym_id` int(11) NOT NULL,
  `cust_id` varchar(250) NOT NULL,
  `paym_type` varchar(50) NOT NULL,
  `token_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `popular_brands`
-- (See below for the actual view)
--
CREATE TABLE `popular_brands` (
`brand_id` int(11)
,`brand_name` varchar(250)
,`brand_image` varchar(1000)
,`brand_thumb` varchar(1000)
,`openNO` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `popular_products`
-- (See below for the actual view)
--
CREATE TABLE `popular_products` (
`prod_id` int(11)
,`sect_id` int(11)
,`brand_id` int(11)
,`prod_name` varchar(250)
,`prod_description` varchar(1000)
,`prod_price` double
,`prod_image` varchar(1000)
,`prod_thumb` varchar(1000)
,`prod_max_no` int(11)
,`open_no` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `popular_sections`
-- (See below for the actual view)
--
CREATE TABLE `popular_sections` (
`sect_id` int(11)
,`sect_name` varchar(250)
,`sect_image` varchar(1000)
,`sect_thumb` varchar(1000)
,`openNO` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `sect_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `prod_name` varchar(250) NOT NULL,
  `prod_description` varchar(1000) NOT NULL,
  `prod_price` double NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `prod_visible` tinyint(1) NOT NULL DEFAULT 1,
  `prod_max_no` int(11) NOT NULL,
  `prod_order` int(11) NOT NULL DEFAULT 1,
  `prod_image` varchar(1000) NOT NULL,
  `prod_thumb` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prod_id`, `sect_id`, `brand_id`, `prod_name`, `prod_description`, `prod_price`, `timestamp`, `prod_visible`, `prod_max_no`, `prod_order`, `prod_image`, `prod_thumb`) VALUES
(49, 15, NULL, 'usb ports', 'any Desctiption here', 80, '2022-01-26 00:53:59', 1, 0, 1, '1643158439uddClcrrTv.jpg', '1643158439uddClcrrTv.jpg'),
(50, 15, NULL, 'computer magic case', 'any Description', 200, '2022-01-26 00:54:34', 1, 0, 1, '1643158474JuTf2IDnIw.jpg', '1643158474JuTf2IDnIw.jpg'),
(51, 15, NULL, 'wireless mouse and keyboard', 'any Description', 25, '2022-01-26 00:55:13', 1, 200, 1, '1643158513jFIMJgI0GJ.jpg', '1643158513jFIMJgI0GJ.jpg'),
(52, 15, NULL, 'wireless mouse', 'any Description', 15, '2022-01-26 00:55:40', 1, 20, 1, '16431585408Q5pPenIEW.jpg', '16431585408Q5pPenIEW.jpg'),
(53, 15, NULL, 'computer speakers', 'any Description', 50, '2022-01-26 00:56:56', 1, 20, 1, '1643158616tk88XxfzKo.jpg', '1643158616tk88XxfzKo.jpg'),
(54, 15, 41, 'video projector', 'sdfsdfsdfsdfsdfsdf', 150, '2022-01-26 00:58:55', 1, 200, 1, '1643158735NBOtMXKRQu.jpg', '1643158735NBOtMXKRQu.jpg'),
(55, 15, NULL, 'projector', 'sdfsdfsdf', 200, '2022-01-26 00:59:41', 1, 20, 1, '1643158781NPqx0sAthZ.jpg', '1643158781NPqx0sAthZ.jpg'),
(56, 15, NULL, 'dell projector', 'asdasd', 80, '2022-01-26 01:00:03', 1, 0, 1, '1643158803IfE1DTb0h1.jpg', '1643158803IfE1DTb0h1.jpg'),
(57, 15, NULL, 'magic projector', 'asdasd', 20, '2022-01-26 01:00:25', 1, 0, 1, '1643158825oFrlhl3swX.jpg', '1643158825oFrlhl3swX.jpg'),
(58, 15, NULL, 'calculator', 'asdasdasd', 5, '2022-01-26 01:01:04', 1, 0, 1, '1643158864v4PBhSPH8e.jpg', '1643158864v4PBhSPH8e.jpg'),
(59, 15, NULL, 'desk phone', 'desk phonedesk phonedesk phonedesk phonedesk phone', 30, '2022-01-26 01:01:41', 1, 1000, 1, '1643158901YOfDcJC9np.jpg', '1643158901YOfDcJC9np.jpg'),
(60, 15, NULL, 'bill printer', 'bill printerbill printerbill printerbill printerbill printer', 65, '2022-01-26 01:02:10', 1, 0, 1, '16431589301agSptIFl9.jpg', '16431589301agSptIFl9.jpg'),
(61, 15, NULL, 'SCANNER', 'ASDASD', 30, '2022-01-26 01:02:38', 1, 0, 1, '1643158957qeRD0lAxMB.jpg', '1643158957qeRD0lAxMB.jpg'),
(62, 15, NULL, 'phone essentials', 'asdasdsadsd', 25, '2022-01-26 01:03:09', 1, 500, 1, '16431589883Ta6KkAqaQ.jpg', '16431589883Ta6KkAqaQ.jpg'),
(64, 15, 33, 'iphone 11', 'essentials\r\nessentialsessentials\r\nessentials\r\nessentialsessentials', 800, '2022-01-26 01:04:59', 1, 200, 1, '1643159099NYUIEBN3fN.jpg', '1643159099NYUIEBN3fN.jpg'),
(65, 15, 38, 'HuaweiMate10Lite', 'HuaweiMate10Lite\r\nHuaweiMate10Lite\r\nHuaweiMate10Lite\r\nHuaweiMate10Lite\r\nHuaweiMate10Lite', 250, '2022-01-26 01:05:30', 1, 0, 1, '1643159130aEqTEosWQY.jpg', '1643159130aEqTEosWQY.jpg'),
(66, 15, 39, 'lg', 'HuaweiMate10LiteHuaweiMate10LiteHuaweiMate10LiteHuaweiMate10Lite', 150, '2022-01-26 01:05:56', 1, 0, 1, '1643159156hWGmbPHQWH.jpg', '1643159156hWGmbPHQWH.jpg'),
(67, 15, 43, 'samsung galaxy a51 5g', 'samsung-galaxy-a51-5g-samsung-galaxy-a51-5g-samsung-galaxy-a51-5g-samsung-galaxy-a51-5g-samsung-galaxy-a51-5g-samsung-galaxy-a51-5g-', 400, '2022-01-26 01:06:30', 1, 0, 1, '16431591908y8b4BMT3l.jpg', '16431591908y8b4BMT3l.jpg'),
(68, 15, NULL, 'Xiaomi Redmi Note 10 Pro', 'Xiaomi-Redmi-Note-10-ProXiaomi-Redmi-Note-10-ProXiaomi-Redmi-Note-10-ProXiaomi-Redmi-Note-10-Pro', 250, '2022-01-26 01:07:49', 1, 10, 1, '1643159269oDvUKEjvez.png', '1643159269oDvUKEjvez.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `prod_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `prod_cat_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`prod_id`, `cate_id`, `prod_cat_id`) VALUES
(49, 14, 22),
(50, 14, 23),
(51, 14, 24),
(52, 14, 25),
(53, 14, 26),
(54, 14, 27),
(55, 15, 28),
(56, 15, 29),
(57, 15, 30),
(58, 16, 31),
(59, 16, 32),
(60, 16, 33),
(61, 16, 34),
(62, 16, 35),
(64, 17, 37),
(65, 17, 38),
(66, 17, 39),
(67, 17, 40),
(68, 17, 41);

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `rate_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `cust_id` varchar(250) NOT NULL,
  `rate_no` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `return_products`
--

CREATE TABLE `return_products` (
  `retu_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `cust_id` varchar(250) NOT NULL,
  `retu_note` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `sect_id` int(11) NOT NULL,
  `sect_name` varchar(250) NOT NULL,
  `sect_description` varchar(1000) DEFAULT NULL,
  `sect_image` varchar(1000) NOT NULL,
  `sect_thumb` varchar(1000) NOT NULL,
  `sect_visible` tinyint(1) NOT NULL DEFAULT 1,
  `sect_order` int(11) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`sect_id`, `sect_name`, `sect_description`, `sect_image`, `sect_thumb`, `sect_visible`, `sect_order`, `timestamp`) VALUES
(15, 'Electronics', 'Shop home entertainment, TVs, home audio, headphones, cameras, accessories and more.', '1643148371EIN5OR68vj.jpg', '1643148371EIN5OR68vj.jpg', 1, 1, '2022-01-25 22:06:11'),
(16, 'Computers', 'Shop laptops, desktops, monitors, tablets, PC gaming, hard drives and storage, accessories and more.', '1643148511mNxaKa8nUD.jpg', '1643148511mNxaKa8nUD.jpg', 1, 1, '2022-01-25 22:08:31'),
(17, 'Smart Home', 'Smart Home Lighting ,Devices ,Heating and Cooling , Detectors and Sensors and more.', '1643148862NoOox4ftTl.jpg', '1643148862NoOox4ftTl.jpg', 1, 1, '2022-01-25 22:14:23'),
(18, 'Men\'s Fashion', 'All a man needs.', '1643149111rkHMDNBa6O.jpg', '1643149111rkHMDNBa6O.jpg', 1, 1, '2022-01-25 22:18:31'),
(19, 'Girls\' Fashion', 'All a girl needs', '1643149175yV361CRugd.jpg', '1643149175yV361CRugd.jpg', 1, 1, '2022-01-25 22:19:35'),
(20, 'Video Games', 'Shop video games for Nintendo, PlayStation, Xbox and more.', '1643149286kdjjqsOHn8.jpg', '1643149286kdjjqsOHn8.jpg', 1, 1, '2022-01-25 22:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `shippers`
--

CREATE TABLE `shippers` (
  `shipp_id` int(11) NOT NULL,
  `shipp_name` varchar(250) NOT NULL,
  `shipp_phone` varchar(20) NOT NULL,
  `shipp_method` varchar(50) NOT NULL,
  `shipp_charge` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(255) NOT NULL,
  `invoiceId` int(255) NOT NULL,
  `cust_id` int(255) NOT NULL,
  `addr_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `invoiceId`, `cust_id`, `addr_id`) VALUES
(2, 1243039, 1, 3),
(3, 1243044, 1, 7),
(4, 1243062, 1, 3),
(5, 1243063, 1, 3),
(6, 1243064, 1, 3),
(7, 1243065, 1, 3),
(8, 1243066, 1, 3),
(9, 1243067, 1, 7),
(10, 1243091, 1, 6),
(11, 1243092, 1, 3),
(12, 1243095, 1, 3),
(13, 1243098, 1, 3),
(14, 1243100, 1, 3),
(15, 1243101, 1, 3),
(16, 1243110, 1, 3),
(17, 1243113, 1, 3),
(18, 1243114, 1, 3),
(19, 1244336, 1, 3),
(20, 1244338, 1, 3),
(21, 1244347, 1, 3),
(22, 1244354, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wish_id` int(11) NOT NULL,
  `cust_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`wish_id`, `cust_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_items`
--

CREATE TABLE `wishlist_items` (
  `wish_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist_items`
--

INSERT INTO `wishlist_items` (`wish_id`, `prod_id`) VALUES
(1, 64),
(1, 66);

-- --------------------------------------------------------

--
-- Structure for view `new_products`
--
DROP TABLE IF EXISTS `new_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `new_products`  AS SELECT `products`.`prod_id` AS `prod_id`, `products`.`sect_id` AS `sect_id`, `products`.`brand_id` AS `brand_id`, `products`.`prod_name` AS `prod_name`, `products`.`prod_description` AS `prod_description`, `products`.`prod_price` AS `prod_price`, `products`.`prod_image` AS `prod_image`, `products`.`prod_thumb` AS `prod_thumb`, `products`.`prod_max_no` AS `prod_max_no` FROM `products` ORDER BY `products`.`timestamp` DESC LIMIT 0, 5 ;

-- --------------------------------------------------------

--
-- Structure for view `popular_brands`
--
DROP TABLE IF EXISTS `popular_brands`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `popular_brands`  AS SELECT `brands`.`brand_id` AS `brand_id`, `brands`.`brand_name` AS `brand_name`, `brands`.`brand_image` AS `brand_image`, `brands`.`brand_thumb` AS `brand_thumb`, sum(`counters`.`open_no`) AS `openNO` FROM ((`products` join `counters` on(`products`.`prod_id` = `counters`.`prod_id`)) join `brands` on(`products`.`brand_id` = `brands`.`brand_id`)) GROUP BY `brands`.`brand_id` ORDER BY sum(`counters`.`open_no`) DESC LIMIT 0, 3 ;

-- --------------------------------------------------------

--
-- Structure for view `popular_products`
--
DROP TABLE IF EXISTS `popular_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `popular_products`  AS SELECT `products`.`prod_id` AS `prod_id`, `products`.`sect_id` AS `sect_id`, `products`.`brand_id` AS `brand_id`, `products`.`prod_name` AS `prod_name`, `products`.`prod_description` AS `prod_description`, `products`.`prod_price` AS `prod_price`, `products`.`prod_image` AS `prod_image`, `products`.`prod_thumb` AS `prod_thumb`, `products`.`prod_max_no` AS `prod_max_no`, `counters`.`open_no` AS `open_no` FROM (`products` join `counters`) WHERE `products`.`prod_id` = `counters`.`prod_id` ORDER BY `counters`.`open_no` DESC LIMIT 0, 5 ;

-- --------------------------------------------------------

--
-- Structure for view `popular_sections`
--
DROP TABLE IF EXISTS `popular_sections`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `popular_sections`  AS SELECT `sections`.`sect_id` AS `sect_id`, `sections`.`sect_name` AS `sect_name`, `sections`.`sect_image` AS `sect_image`, `sections`.`sect_thumb` AS `sect_thumb`, sum(`counters`.`open_no`) AS `openNO` FROM ((`products` join `counters` on(`products`.`prod_id` = `counters`.`prod_id`)) join `sections` on(`products`.`sect_id` = `sections`.`sect_id`)) GROUP BY `sections`.`sect_id` ORDER BY sum(`counters`.`open_no`) DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`addr_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cate_id`),
  ADD KEY `sect_id` (`sect_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imag_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `offer_items`
--
ALTER TABLE `offer_items`
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `paym_id` (`transaction_id`),
  ADD KEY `shipp_id` (`shipp_id`),
  ADD KEY `addr_id` (`addr_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paym_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `sect_id` (`sect_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`prod_cat_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`rate_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `return_products`
--
ALTER TABLE `return_products`
  ADD PRIMARY KEY (`retu_id`),
  ADD KEY `prod_id` (`prod_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`sect_id`);

--
-- Indexes for table `shippers`
--
ALTER TABLE `shippers`
  ADD PRIMARY KEY (`shipp_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `addr_id` (`addr_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wish_id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD KEY `wish_id` (`wish_id`),
  ADD KEY `prod_id` (`prod_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `addr_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paym_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `prod_cat_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `return_products`
--
ALTER TABLE `return_products`
  MODIFY `retu_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `sect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `shippers`
--
ALTER TABLE `shippers`
  MODIFY `shipp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`cart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`sect_id`) REFERENCES `sections` (`sect_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `counters`
--
ALTER TABLE `counters`
  ADD CONSTRAINT `counters_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offer_items`
--
ALTER TABLE `offer_items`
  ADD CONSTRAINT `offer_items_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offer_items_ibfk_2` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`offer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction` (`transaction_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`addr_id`) REFERENCES `addresses` (`addr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`sect_id`) REFERENCES `sections` (`sect_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_categories_ibfk_2` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`cate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rates`
--
ALTER TABLE `rates`
  ADD CONSTRAINT `rates_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `return_products`
--
ALTER TABLE `return_products`
  ADD CONSTRAINT `return_products_ibfk_1` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`addr_id`) REFERENCES `addresses` (`addr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `wishlist_items`
--
ALTER TABLE `wishlist_items`
  ADD CONSTRAINT `wishlist_items_ibfk_1` FOREIGN KEY (`wish_id`) REFERENCES `wishlists` (`wish_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlist_items_ibfk_2` FOREIGN KEY (`prod_id`) REFERENCES `products` (`prod_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
