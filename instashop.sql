-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2023 at 09:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'email', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` bigint(20) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_pin` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `user_pin`, `order_date`) VALUES
(1, '2000.00', 'on_hold', 4, 9532691867, 'Mumbai', 'Versova', 400073, '2023-04-02 23:15:31'),
(2, '800.00', 'on_hold', 1, 9532691867, 'Mumbai', 'RGIT Versova', 400073, '2023-04-02 21:13:43'),
(3, '2000.00', 'on_hold', 1, 95326969, 'Mumbai', 'RGIT Versova', 400073, '2023-04-20 07:18:39'),
(4, '1200.00', 'on_hold', 4, 95326969, 'Mumbai', 'RGIT Versova', 400073, '2023-04-27 16:33:25'),
(5, '1200.00', 'on_hold', 4, 95326969, 'Mumbai', 'RGIT Versova', 400073, '2023-04-27 19:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 1, 1, 'White Shoes', 'white-shoes-1.jpg', 1200, 1, 4, '2023-04-02 23:20:53'),
(2, 1, 3, 'Blue Tshirt', 'blue-tshirt-1.jpg', 800, 1, 4, '2023-04-02 23:20:53'),
(3, 2, 0, 'Blue Tshirt', 'blue-tshirt-1.jpg', 800, 1, 1, '2023-04-02 21:13:43'),
(4, 3, 0, 'Blue Tshirt', 'blue-tshirt-1.jpg', 800, 1, 1, '2023-04-20 07:18:39'),
(5, 3, 1, 'White Shoes', 'white-shoes-1.jpg', 1200, 1, 1, '2023-04-20 07:18:39'),
(6, 4, 1, 'White Shoes', 'white-shoes-1.jpg', 1200, 1, 4, '2023-04-27 16:33:25'),
(7, 5, 1, 'White Shoes', 'white-shoes-1.jpg', 1200, 1, 4, '2023-04-27 19:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_id` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_image4` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(11) NOT NULL,
  `product_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'White Shoes', 'Shoes', 'Shoes for men', 'white-shoes-1.jpg', 'white-shoes-2.jpg', 'white-shoes-3.jpg', 'white-shoes-4.jpg', '1200.00', 0, 'White'),
(3, 'Blue Tshirt', 'Tshirt', 'Programmer Tshirt for men', 'blue-tshirt-1.jpg', 'blue-tshirt-2.jpg', 'blue-tshirt-1.jpg', 'blue-tshirt-2.jpg', '800.00', 0, 'Blue'),
(4, 'Black Tshirt', 'Tshirt', 'Programmer Tshirt for men', 'tshirt-offline-black-1.jpg', 'tshirt-offline-black-2.jpg', 'tshirt-offline-black-1.jpg', 'tshirt-offline-black-2.jpg', '800.00', 0, 'Black'),
(5, 'Black Shoes', 'Shoes', 'Black Shoes for men', 'black-shoes-1.jpg', 'black-shoes-2.jpg', 'black-shoes-3.jpg', 'black-shoes-4.jpg', '1500.00', 0, 'Black'),
(6, 'Smart Watch', 'Watches', 'Fitness smart watch  ', 'black-watch-1.jpg', 'black-watch-2.jpg', 'black-watch-3.jpg', 'black-watch-4.jpg', '1115.00', 0, 'Blue'),
(8, 'Sun Glasses', 'Glasses', 'Sun Glasses for men', 'glasses-1.jpg', 'glasses-2.jpg', 'glasses-3.jpg', 'glasses-4.jpg', '800.00', 0, 'Blue'),
(10, 'White Shoes', 'Shoes', 'Shoes for men', 'white-shoes-1.jpg', 'white-shoes-2.jpg', 'white-shoes-3.jpg', 'white-shoes-4.jpg', '1200.00', 0, 'White'),
(11, 'Blue Tshirt', 'Tshirt', 'Programmer Tshirt for men', 'blue-tshirt-1.jpg', 'blue-tshirt-2.jpg', 'blue-tshirt-1.jpg', 'blue-tshirt-2.jpg', '800.00', 0, 'Blue'),
(12, 'Black Tshirt', 'Tshirt', 'Programmer Tshirt for men', 'tshirt-offline-black-1.jpg', 'tshirt-offline-black-2.jpg', 'tshirt-offline-black-1.jpg', 'tshirt-offline-black-2.jpg', '800.00', 0, 'Black'),
(13, 'Black Shoes', 'Shoes', 'Black Shoes for men', 'black-shoes-1.jpg', 'black-shoes-2.jpg', 'black-shoes-3.jpg', 'black-shoes-4.jpg', '1500.00', 0, 'Black'),
(14, 'Smart Watch', 'Watches', 'Fitness smart watch  ', 'black-watch-1.jpg', 'black-watch-2.jpg', 'black-watch-3.jpg', 'black-watch-4.jpg', '1115.00', 0, 'Blue'),
(15, 'Sun Glasses', 'Glasses', 'Sun Glasses for men', 'glasses-1.jpg', 'glasses-2.jpg', 'glasses-3.jpg', 'glasses-4.jpg', '800.00', 0, 'Blue'),
(16, 'White Shoes', 'Shoes', 'Shoes for men', 'white-shoes-1.jpg', 'white-shoes-2.jpg', 'white-shoes-3.jpg', 'white-shoes-4.jpg', '1200.00', 0, 'White'),
(17, 'Blue Tshirt', 'Tshirt', 'Programmer Tshirt for men', 'blue-tshirt-1.jpg', 'blue-tshirt-2.jpg', 'blue-tshirt-1.jpg', 'blue-tshirt-2.jpg', '800.00', 0, 'Blue'),
(18, 'Black Tshirt', 'Tshirt', 'Programmer Tshirt for men', 'tshirt-offline-black-1.jpg', 'tshirt-offline-black-2.jpg', 'tshirt-offline-black-1.jpg', 'tshirt-offline-black-2.jpg', '800.00', 0, 'Black'),
(19, 'Black Shoes', 'Shoes', 'Black Shoes for men', 'black-shoes-1.jpg', 'black-shoes-2.jpg', 'black-shoes-3.jpg', 'black-shoes-4.jpg', '1500.00', 0, 'Black'),
(20, 'Smart Watch', 'Watches', 'Fitness smart watch  ', 'black-watch-1.jpg', 'black-watch-2.jpg', 'black-watch-3.jpg', 'black-watch-4.jpg', '1115.00', 0, 'Blue'),
(21, 'Sun Glasses', 'Glasses', 'Sun Glasses for men', 'glasses-1.jpg', 'glasses-2.jpg', 'glasses-3.jpg', 'glasses-4.jpg', '800.00', 0, 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(4, 'username', 'email', '5f4dcc3b5aa765d61d8327deb882cf99'),
(5, 'username', 'email1', '5f4dcc3b5aa765d61d8327deb882cf99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
