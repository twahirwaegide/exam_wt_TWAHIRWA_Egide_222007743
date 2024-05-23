-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 10:25 AM
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
-- Database: `virtual_personal_finance_management_workshops_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendees`
--

CREATE TABLE `attendees` (
  `attendee id` int(100) NOT NULL,
  `user id` int(100) NOT NULL,
  `workshop id` int(100) NOT NULL,
  `feedback` text NOT NULL,
  `attendee status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendees`
--

INSERT INTO `attendees` (`attendee id`, `user id`, `workshop id`, `feedback`, `attendee status`) VALUES
(2345, 123456, 23456, '12cvfbgd', 'Not Attended'),
(987654, 0, 45678, 'sdkjdchsduk', 'Attended'),
(2147483647, 2147483647, 2147483647, 'drsedfbgfnth', 'Attended');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `workshop id` int(100) NOT NULL,
  `user id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `submitted date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`workshop id`, `user id`, `name`, `email`, `feedback`, `submitted date`) VALUES
(12345, 4321, 'fg', 'twahirwaegide@gmail.com', 'ertygfds', '2024-05-22'),
(23456, 123456, 'twahirwaegide', 'twahirwaegide@gmail.com', 'luasfhbvisdukj', '2024-05-20'),
(123456, 65678, 'cgvhbjk', 'twahi@gmail.com', 'gfdgfyubygvvi', '2024-05-22'),
(23456789, 123456, 'twahirwaegide', 'twahirwaegide@gmail.com', 'gkyuikhbvhj hj', '2024-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor id` int(100) NOT NULL,
  `user id` int(100) NOT NULL,
  `expertise` varchar(100) NOT NULL,
  `bio` text NOT NULL,
  `rating` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor id`, `user id`, `expertise`, `bio`, `rating`) VALUES
(1, 123456, 'egide', 'jsjh', 3),
(2, 123456, 'egideghjkl;\'\'', 'sdfjdkznc', 1),
(3, 123456, 'egide', 'ewrdfg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `user id` int(100) NOT NULL,
  `workshop id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment date` int(100) NOT NULL,
  `payment status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `user id`, `workshop id`, `amount`, `payment date`, `payment status`) VALUES
(1, 2345, 1234, 2500, 2024, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `personal_finance_resources`
--

CREATE TABLE `personal_finance_resources` (
  `resource_id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_finance_resources`
--

INSERT INTO `personal_finance_resources` (`resource_id`, `title`, `description`, `link`) VALUES
(1, 'qwert', 'sdfghfd', 'http://localhost/Exam2/personal_finance_resources.php'),
(2, 'qwertyu', 'sadfgdvcx', 'http://localhost/Exam2/personal_finance_resources.php'),
(3, 'ytuik', 'kljh', 'http://localhost/Exam2/personal_finance_resources.php');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session id` int(100) NOT NULL,
  `workshop id` int(100) NOT NULL,
  `session title` varchar(100) NOT NULL,
  `session description` varchar(100) NOT NULL,
  `start date` date NOT NULL,
  `end date` date NOT NULL,
  `session status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session id`, `workshop id`, `session title`, `session description`, `start date`, `end date`, `session status`) VALUES
(1, 23456789, 'iuyutghbh', 'luyjgbvjh,', '2024-05-20', '2024-05-29', 'Ongoing'),
(2, 234567, 'kjhgfd', 'rtjykugkb', '2024-05-21', '2024-05-30', 'Scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction id` int(100) NOT NULL,
  `user id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `transaction type` varchar(100) NOT NULL,
  `transaction date` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction id`, `user id`, `amount`, `transaction type`, `transaction date`) VALUES
(1, 23456789, 2500, 'Debit', 2024),
(2, 123456, 2500, 'Debit', 2024),
(3, 12, 2345, 'Debit', 2024),
(4, 12, 700, 'Credit', 2024);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user id` int(100) NOT NULL,
  `user name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first name` varchar(100) NOT NULL,
  `last name` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user id`, `user name`, `email`, `password`, `first name`, `last name`, `role`) VALUES
(6, 'rurinda', 'twahirwaegide@gmail.com', 'iugjiuk', 'Twahirwa', 'Egide', 'User'),
(7, 'rurinda', 'twahirwaegide@gmail.com', 'nhjgvb', 'Twahirwa', 'Egide', 'User'),
(8, 'rurinda', 'twahirwaegide@gmail.com', 'jh', 'Twahirwa', 'Egide', 'User'),
(9, 'twahirwaegide', 'twahirwaegide@gmail.com', 'kkmmt411', 'Twahirwa', 'Egide', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `workshop`
--

CREATE TABLE `workshop` (
  `workshop id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `instructor id` int(100) NOT NULL,
  `start date` int(100) NOT NULL,
  `end date` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop`
--

INSERT INTO `workshop` (`workshop id`, `title`, `description`, `instructor id`, `start date`, `end date`, `status`) VALUES
(1, 'etryuik', 'kjhnvcb', 456789, 2024, 2024, 'Cancelled'),
(2, 'q', 'were', 456789, 2024, 2024, 'Completed'),
(3, '2345', 'edfg', 456789, 2024, 2024, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `workshop attendance`
--

CREATE TABLE `workshop attendance` (
  `attendance id` int(100) NOT NULL,
  `workshop id` int(100) NOT NULL,
  `user id` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop attendance`
--

INSERT INTO `workshop attendance` (`attendance id`, `workshop id`, `user id`, `status`) VALUES
(1, 23456, 123456, 'Present'),
(2, 23456, 123456, 'Present'),
(3, 23456, 123456, 'Absent'),
(4, 23456, 12, 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `workshop_materials`
--

CREATE TABLE `workshop_materials` (
  `material id` int(100) NOT NULL,
  `workshop id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file path` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created date` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workshop_materials`
--

INSERT INTO `workshop_materials` (`material id`, `workshop id`, `title`, `file path`, `description`, `created date`) VALUES
(1, 23456, 'tyuijkn', 'mnbv', 'uyjhvkgh ', 2024),
(2, 23456789, 'kjhg', 'jhgf', 'jkdsxzc', 2024);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendees`
--
ALTER TABLE `attendees`
  ADD PRIMARY KEY (`attendee id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`workshop id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `personal_finance_resources`
--
ALTER TABLE `personal_finance_resources`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user id`);

--
-- Indexes for table `workshop`
--
ALTER TABLE `workshop`
  ADD PRIMARY KEY (`workshop id`);

--
-- Indexes for table `workshop attendance`
--
ALTER TABLE `workshop attendance`
  ADD PRIMARY KEY (`attendance id`);

--
-- Indexes for table `workshop_materials`
--
ALTER TABLE `workshop_materials`
  ADD PRIMARY KEY (`material id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendees`
--
ALTER TABLE `attendees`
  MODIFY `attendee id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `workshop id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23456790;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `instructor id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_finance_resources`
--
ALTER TABLE `personal_finance_resources`
  MODIFY `resource_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `workshop`
--
ALTER TABLE `workshop`
  MODIFY `workshop id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `workshop attendance`
--
ALTER TABLE `workshop attendance`
  MODIFY `attendance id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workshop_materials`
--
ALTER TABLE `workshop_materials`
  MODIFY `material id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
