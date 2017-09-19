-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2017 at 04:04 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `user_id` int(10) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_pass` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`user_id`, `user_email`, `user_pass`) VALUES
(1, 'sandeep96@gmail.com', 'sandeep96');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `i_id` int(10) NOT NULL,
  `ip_add` varchar(225) NOT NULL,
  `qty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`i_id`, `ip_add`, `qty`) VALUES
(8, '::1', 0),
(3, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'appetizers'),
(2, 'main course');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_ip` varchar(225) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(225) NOT NULL,
  `customer_pass` varchar(225) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(225) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(1, '::1', 'sandeep alla', 'sandeepalla96@gmail.com', 'sandeep', 'India', 'dekalb', '8143292542', '857 spiros ct unit 103', ''),
(2, '::1', 'sandeep alla', 'sandeeprockstar', 'sandeep', 'United States', 'dekalb', '8143292542', '857 spiros ct unit 103', '');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(100) NOT NULL,
  `item_cat` int(10) NOT NULL,
  `item_title` varchar(225) NOT NULL,
  `item_price` int(100) NOT NULL,
  `item_desc` text NOT NULL,
  `item_image` text NOT NULL,
  `item_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_cat`, `item_title`, `item_price`, `item_desc`, `item_image`, `item_keywords`) VALUES
(3, 1, ' Goat Cheese Trio', 10, '<p>Goat and Cheese</p>', 'image1.jpeg', 'Goat , cheese, trio, Cheese, Goat Cheese Trio'),
(5, 1, '  Cannellini Bruschetta', 10, '<p><span style=\"color: #1c1c1c; font-family: FranklinGothicURW-Boo, Helvetica, Arial, sans-serif; font-size: 15px;\">&nbsp;</span><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: FranklinGothicURW-Dem, Helvetica, Arial, sans-serif; vertical-align: baseline; color: #1c1c1c;\">Cannellini Bruschetta</span></p>', 'image2.jpeg', ' Cannellini Bruschetta, Cannellini ,Bruschetta'),
(6, 1, '  Spiced Olives', 10, '<p><span style=\"color: #1c1c1c; font-family: FranklinGothicURW-Boo, Helvetica, Arial, sans-serif; font-size: 15px;\">&nbsp;</span><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: FranklinGothicURW-Dem, Helvetica, Arial, sans-serif; vertical-align: baseline; color: #1c1c1c;\">Spiced Olives</span></p>', 'image3.jpeg', ' Spiced Olives, Spiced ,Olives'),
(7, 1, ' Radish-Anchovy Canapes', 10, '<p><span style=\"box-sizing: inherit; margin: 0px; padding: 0px; border: 0px; font-variant-numeric: inherit; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: FranklinGothicURW-Dem, Helvetica, Arial, sans-serif; vertical-align: baseline; color: #1c1c1c;\">Radish-Anchovy Canapes</span></p>', 'image4.jpeg', 'Radish-Anchovy Canapes,Radish-Anchovy ,Canapes'),
(8, 2, ' Apricot Mustard-Glazed Salmon', 15, '', 'main1.jpg', 'Apricot Mustard-Glazed Salmon,Apricot, Mustard-Glazed, Salmon'),
(9, 2, ' Gouda Stuffed Chicken', 15, '', 'main2.jpg', 'Gouda Stuffed Chicken,Gouda ,Stuffed Chicken'),
(10, 2, ' Sloppy Joes', 15, '', 'main3.jpg', 'Sloppy Joes,Sloppy, Joes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(100) NOT NULL,
  `i_id` int(100) NOT NULL,
  `c_id` int(100) NOT NULL,
  `qty` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `status` text NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
