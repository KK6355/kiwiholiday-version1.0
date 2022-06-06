-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 12:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiwiholiday_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(90) NOT NULL,
  `guest_id` int(90) NOT NULL,
  `house_id` int(90) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `status_id` int(90) NOT NULL,
  `guest_num` int(90) NOT NULL,
  `pet` varchar(90) NOT NULL,
  `guest_name` varchar(90) NOT NULL,
  `credit_card_number` varchar(900) NOT NULL,
  `payment_id` varchar(90) NOT NULL,
  `house_status_id` int(90) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `guest_id`, `house_id`, `check_in`, `check_out`, `status_id`, `guest_num`, `pet`, `guest_name`, `credit_card_number`, `payment_id`, `house_status_id`, `created_at`) VALUES
(18, 17, 6, '2022-05-25', '2022-05-31', 3, 2, 'YES', 'VICKY KANG', '123456', '1', 2, '2022-05-28 04:03:18'),
(19, 17, 7, '2022-06-01', '2022-06-06', 5, 5, 'NO', 'Kang Kang', '123456', '3', 2, '2022-06-01 04:34:50'),
(30, 17, 8, '2022-06-01', '2022-06-02', 4, 0, '', '', '', '', 2, '2022-05-30 03:11:09'),
(31, 17, 6, '2022-06-02', '2022-06-03', 1, 2, 'YES', 'Kang Kang', '123456', '2', 2, '2022-06-01 05:01:38'),
(32, 17, 8, '2022-06-06', '2022-06-08', 1, 2, 'YES', 'KK', '123456', '1', 1, '2022-06-01 04:28:39'),
(35, 22, 7, '2022-06-09', '2022-06-10', 1, 3, 'NO', 'Dan Dan', '123456', '1', 1, '2022-06-01 06:01:07'),
(42, 22, 7, '2022-06-29', '2022-06-30', 1, 2, 'NO', 'Kang Kang', '123456', '1', 1, '2022-06-01 06:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--

CREATE TABLE `booking_status` (
  `status_id` int(90) NOT NULL,
  `status` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`status_id`, `status`) VALUES
(1, 'Confirmed'),
(2, 'Booked'),
(3, 'Completed'),
(4, 'Canceled'),
(5, 'Checked In'),
(6, 'Checked Out');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(90) NOT NULL,
  `email` varchar(900) NOT NULL,
  `message` varchar(900) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `email`, `message`, `time`) VALUES
(1, 'g3@gmail.com', 'AAA', '2022-06-02 05:01:47');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `favourite_id` int(90) NOT NULL,
  `house_id` int(90) NOT NULL,
  `guest_id` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`favourite_id`, `house_id`, `guest_id`) VALUES
(52, 6, 27),
(57, 8, 27),
(59, 7, 27),
(71, 6, 19),
(77, 6, 23),
(79, 7, 17),
(80, 8, 1),
(81, 6, 20),
(83, 6, 17);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `image_id` int(90) NOT NULL,
  `house_id` int(90) NOT NULL,
  `image` varchar(90) NOT NULL,
  `image_title` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`image_id`, `house_id`, `image`, `image_title`) VALUES
(1, 2, '4e1212ef37d7e862582656b15f6236da.jpg', 'cover'),
(3, 2, '1fd36db0d3939cd1be62cca5c546be4d.jpg', 'bedroom'),
(4, 2, 'acc471fa6ca72d360e529aefda8bbdca.jpg', 'bedroom'),
(7, 2, '958fb0d3444a553934ef8aa361eb5c5f.jpg', 'bathroom'),
(8, 1, 'badc820b6a3021a71bb14ca675fe22c4.jpg', 'cover'),
(10, 2, '68d25001fcccba09b498fadc1b0903c2.jpg', 'hallway'),
(11, 6, 'b934d94a0f4399602fc32aa8c9e50c21.jpg', 'bedroom'),
(12, 6, 'd2d6cf003b5317e6b5a270b444d463bb.jpg', 'yard'),
(13, 6, '4a8c632cf2a1a877fa32495e3e66f454.jpg', 'living room'),
(14, 6, '6f0d0f13a4fb25de12f4025d6a6ce25f.jpg', 'bathroom'),
(16, 7, '63fc80f46019c26b15e4d57c48b86a88.jpg', 'bedroom'),
(17, 7, 'a6ef64deefaa334ec3cf213706dff961.jpg', 'living room'),
(18, 7, 'fa41b293e3cd53a962618db2edd96a4f.jpg', 'bathroom'),
(19, 7, '6367da294bd72f353f1d55f9076f630d.jpg', 'kitchen'),
(22, 8, 'bb13fa95c166030e3b6ddf4c07217e36.jpg', 'bedroom'),
(23, 8, '2f26fd93566283cdcabfdcfc79700c49.jpg', 'bedroom'),
(26, 12, '800a55971ed948a3b672b3b732e78c1e.jpg', 'bedroom'),
(27, 12, '7c89600b2dbfa5394eb80a4b90befb5a.jpg', 'living room');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `house_id` int(90) NOT NULL,
  `title` varchar(90) NOT NULL,
  `image_main` varchar(90) NOT NULL,
  `host_id` int(90) NOT NULL,
  `location_id` int(90) NOT NULL,
  `address` varchar(900) NOT NULL,
  `guest_num` int(90) NOT NULL,
  `bedroom_num` int(90) NOT NULL,
  `livingroom_num` int(90) NOT NULL,
  `toilet_num` int(90) NOT NULL,
  `shower_num` int(90) NOT NULL,
  `parking_num` int(90) NOT NULL,
  `pet` varchar(90) NOT NULL,
  `wifi` varchar(90) NOT NULL,
  `kitchen` varchar(90) NOT NULL,
  `tv` varchar(90) NOT NULL,
  `price` int(90) NOT NULL,
  `status_id` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_id`, `title`, `image_main`, `host_id`, `location_id`, `address`, `guest_num`, `bedroom_num`, `livingroom_num`, `toilet_num`, `shower_num`, `parking_num`, `pet`, `wifi`, `kitchen`, `tv`, `price`, `status_id`) VALUES
(6, 'HAGLEY PARK HISTORIC STUDIO ', '6a89fec3dd35b94bafe26732abeff094.jpg', 19, 1, '1 ABC street, Christchurch', 2, 1, 1, 1, 1, 1, 'YES', 'YES', 'YES', 'YES', 66, 2),
(7, 'Reopen Special! Blue Star Inn Tekapo', 'c5c81a45ac0f7bdfa303c4068a20badc.jpg', 20, 3, '2 ABC street, Lake Tekapo', 6, 1, 1, 1, 1, 2, 'NO', 'YES', 'YES', 'YES', 120, 2),
(8, 'Stunning Lake View. Perfect Location!', '4e3fbf0dd5909ed22b22710a3c8f7f24.jpg', 19, 2, '3 ABC street, Queenstown', 2, 1, 1, 1, 1, 1, 'YES', 'YES', 'YES', 'YES', 129, 2);

-- --------------------------------------------------------

--
-- Table structure for table `house_status`
--

CREATE TABLE `house_status` (
  `status_id` int(90) NOT NULL,
  `status` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house_status`
--

INSERT INTO `house_status` (`status_id`, `status`) VALUES
(1, 'Booked'),
(2, 'Listed'),
(3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(90) NOT NULL,
  `location` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location`) VALUES
(1, 'Christchurch'),
(2, 'Queenstown'),
(3, 'Lake Tekapo');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(90) NOT NULL,
  `payment` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment`) VALUES
(1, 'Credit Card'),
(2, 'Debit Card'),
(3, 'EFTPOS At Location');

-- --------------------------------------------------------

--
-- Table structure for table `requested_service`
--

CREATE TABLE `requested_service` (
  `id` int(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `message` varchar(900) NOT NULL,
  `guest_id` int(90) NOT NULL,
  `booking_id` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requested_service`
--

INSERT INTO `requested_service` (`id`, `email`, `message`, `guest_id`, `booking_id`) VALUES
(1, 'g3@gmail.com', 'Any discount for long rental?', 17, 8);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_id` int(90) NOT NULL,
  `booking_id` int(90) NOT NULL,
  `house_id` int(90) NOT NULL,
  `guest_id` int(90) NOT NULL,
  `comment` varchar(900) NOT NULL,
  `star` int(90) NOT NULL,
  `review_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_id`, `booking_id`, `house_id`, `guest_id`, `comment`, `star`, `review_date`) VALUES
(5, 18, 6, 17, 'Amazing house!', 5, '2022-05-30 05:46:30'),
(6, 31, 6, 17, 'Great exprience!', 4, '2022-05-30 05:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(90) NOT NULL,
  `name` varchar(90) NOT NULL,
  `email` varchar(90) NOT NULL,
  `password_hash` varchar(90) NOT NULL,
  `role_id` int(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password_hash`, `role_id`) VALUES
(1, 'Vicky Kang', 'kang@gmail.com', '$2y$10$eCwuDmXT.Kx0sYxWeithpeRwDz/bg7rHxQe6/6xM2LFinCXNpfgI2', 3),
(17, 'g3', 'g3@gmail.com', '$2y$10$BpI1meey6X5mkyg4weAPveqNhYSKP2bPsF5PbfWNMr.gSz6PUmsca', 1),
(19, 'h1', 'h1@gmail.com', '$2y$10$c/qAK8b8acN/G5c3H4IF5epdOGktQ9dXe0PeeIeizdS1qtL6QropG', 2),
(20, 'h2', 'h2@gmail.com', '$2y$10$AWxkt2t4eMCLOEUPEf06cOOUNHb6GiUl9LD3IJWCOmBa7FRY2xo7O', 2),
(22, 'g4', 'g4@gmail.com', '$2y$10$HjtHBCSFhudsEDaElSm7UuSTSIFnnoQXhx.GUEOC10vuvzn/gVolO', 1),
(24, 'h3', 'h3@gmail.com', '$2y$10$dLJELOdLRYssy1.XYJx/Su8MxedDa60/UBxjXA5hnLzcHMjtcwSAC', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(90) NOT NULL,
  `role` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role`) VALUES
(1, 'Guest'),
(2, 'Host'),
(3, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `booking_status`
--
ALTER TABLE `booking_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`favourite_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `house_status`
--
ALTER TABLE `house_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `requested_service`
--
ALTER TABLE `requested_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `booking_status`
--
ALTER TABLE `booking_status`
  MODIFY `status_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `favourite_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `image_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `house_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `house_status`
--
ALTER TABLE `house_status`
  MODIFY `status_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requested_service`
--
ALTER TABLE `requested_service`
  MODIFY `id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `review_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(90) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
