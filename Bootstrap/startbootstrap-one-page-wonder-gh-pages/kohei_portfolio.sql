-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 25, 2020 at 09:34 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `kohei_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `cc_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cc_number` varchar(16) DEFAULT NULL,
  `cc_name` varchar(50) DEFAULT NULL,
  `cc_month` int(2) DEFAULT NULL,
  `cc_year` int(4) DEFAULT NULL,
  `pincode` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`cc_id`, `user_id`, `cc_number`, `cc_name`, `cc_month`, `cc_year`, `pincode`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL),
(2, 2, '1111111111111111', 'Mike Lee', 1, 2021, '111'),
(3, 3, '3333333333333333', 'Matt Lee', 3, 2023, '333'),
(4, 4, NULL, NULL, NULL, NULL, NULL),
(5, 5, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `order_child` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `receiver_first_name` varchar(30) DEFAULT NULL,
  `receiver_last_name` varchar(30) DEFAULT NULL,
  `receiver_email` varchar(50) DEFAULT NULL,
  `receiver_contact` varchar(30) DEFAULT NULL,
  `cc_number` varchar(16) DEFAULT NULL,
  `cc_name` varchar(50) DEFAULT NULL,
  `cc_month` int(2) DEFAULT NULL,
  `cc_year` int(4) DEFAULT NULL,
  `pincode` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `ticket_id`, `order_quantity`, `order_child`, `total_price`, `receiver_first_name`, `receiver_last_name`, `receiver_email`, `receiver_contact`, `cc_number`, `cc_name`, `cc_month`, `cc_year`, `pincode`) VALUES
(1, 2, 1, 5, 3, 350, 'Mike', 'Lee', 'mike@gmail.com', '0123117117', '1111111111111111', 'Mike Lee', 1, 2021, '111'),
(2, 2, 2, 3, 1, 375, 'Mike', 'Lee', 'mike@gmail.com', '0123117117', '1212121212121212', 'Mike Lee', 1, 2021, '121'),
(3, 3, 3, 3, 1, 500, 'Matt', 'Lee', 'matt@gmail.com', '0123121212', '2222222222222222', 'John Smith', 2, 2022, '222'),
(4, 2, 1, 3, 1, 250, 'Mike', 'Lee', 'mike@gmail.com', '0123117117', '1111111111111111', 'Mike Lee', 1, 2021, '111'),
(5, 3, 1, 3, 1, 250, 'Matt', 'Lee', 'matt@gmail.com', '0123121212', '3333333333333333', 'Matt Lee', 3, 2023, '333'),
(6, 3, 2, 3, 1, 375, 'Matt', 'Lee', 'matt@gmail.com', '0123121212', '3333333333333333', 'Matt Lee', 3, 2023, '333');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `team_home` varchar(50) NOT NULL,
  `team_away` varchar(30) NOT NULL,
  `ticket_date` date NOT NULL,
  `ticket_venue` varchar(100) NOT NULL,
  `ticket_category` varchar(50) NOT NULL,
  `ticket_price` float NOT NULL,
  `ticket_quantity` int(11) NOT NULL,
  `ticket_img_home` varchar(100) DEFAULT NULL,
  `ticket_img_away` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `team_home`, `team_away`, `ticket_date`, `ticket_venue`, `ticket_category`, `ticket_price`, `ticket_quantity`, `ticket_img_home`, `ticket_img_away`) VALUES
(1, 'Liverpool', 'Arsenal', '2020-10-06', 'Anfield, Liverpool, Merseyside, England', 'soccer', 100, 89, 'liverpool.jpg', 'arsenal.jpg'),
(2, 'Yankees', 'Redsox', '2020-10-07', '1 East 161st Street, The Bronx,  New York', 'baseball', 150, 94, 'yankees.jpg', 'redsox.jpg'),
(3, 'Celtics', 'Lakers', '2020-10-08', '100 Legends Way , Boston,  Massachusetts', 'basketball', 200, 97, 'boston.jpg', 'lakers.jpg'),
(4, 'Chelsea', 'Tottenham', '2020-10-09', 'Fulham Rd, Fulham, London SW6 1HS', 'soccer', 100, 20, NULL, NULL),
(5, 'Heat', 'Suns', '2020-10-10', '601 Biscayne Boulevard Miami, 33132', 'basketball', 100, 0, NULL, NULL),
(6, 'Liverpool', 'Arsenal', '2020-09-30', 'Anfield, Liverpool, Merseyside, England', 'soccer', 20, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `role` varchar(1) NOT NULL DEFAULT 'U',
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `email`, `contact_number`, `address`, `role`, `password`) VALUES
(1, 'Mark', 'Lee', 'mark', 'mark@gmail.com', '0123123123', 'Japan', 'A', '6d295738eb6579053ac46a9ca1902583'),
(2, 'Mike', 'Lee', 'mike', 'mike@gmail.com', '0123117117', 'USA', 'U', '4c3e1ec04215f69d6a8e9c023c9e4572'),
(3, 'Matt', 'Lee', 'matt', 'matt@gmail.com', '0123121212', 'UK', 'U', '02223f4e1970e6d39ffb423c63d8202e'),
(4, 'John', 'Lee', 'john', 'john@gmail.com', '0123141414', 'China', 'U', '6e0b7076126a29d5dfcbd54835387b7b'),
(5, 'Kevin', 'Garnett', 'kevin', 'kevin@gmail.com', '0123111111', 'USA', 'U', 'd2e7a2105d0fb461fe6f2858cc33942f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`cc_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
