-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2025 at 06:52 AM
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
-- Database: `health_tracker`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL,
  `appointment_time` datetime NOT NULL,
  `status` enum('Pending','Confirmed','Completed') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `provider_id`, `appointment_time`, `status`) VALUES
(15, 2, 1, '2025-01-18 02:16:00', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emergency_contacts`
--

CREATE TABLE `emergency_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('hospital','pharmacy') NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_contacts`
--

INSERT INTO `emergency_contacts` (`id`, `name`, `type`, `address`, `phone`, `latitude`, `longitude`) VALUES
(1, 'City Hospital', 'hospital', '123 Main St, Kathmandu', '9801234567', 27.7172, 85.324),
(2, 'Healthy Pharmacy', 'pharmacy', '456 Market Rd, Kathmandu', '9807654321', 27.7156, 85.3188),
(3, 'City Hospital', 'hospital', '123 Main St, Kathmandu', '9801234567', 27.7172, 85.324),
(4, 'Healthy Pharmacy', 'pharmacy', '456 Market Rd, Kathmandu', '9807654321', 27.7156, 85.3188),
(5, 'City Hospital', 'hospital', '123 Main St, Kathmandu', '9801234567', 27.7172, 85.324),
(6, 'Healthy Pharmacy', 'pharmacy', '456 Market Rd, Kathmandu', '9807654321', 27.7156, 85.3188),
(7, 'Bir Hospital', 'hospital', 'Mahaboudha, Kathmandu', '9801122334', 27.7043, 85.3157),
(8, 'MediCare Pharmacy', 'pharmacy', 'Lalitpur, Kathmandu Valley', '9809988776', NULL, NULL),
(9, 'Pokhara Regional Hospital', 'hospital', 'Prithvi Chowk, Pokhara', '9802244668', NULL, NULL),
(10, 'Pokhara Pharma', 'pharmacy', 'Lakeside, Pokhara', '9805566778', NULL, NULL),
(11, 'Bharatpur Hospital', 'hospital', 'Bharatpur, Chitwan', '9806677885', NULL, NULL),
(12, 'Chitwan Pharmacy', 'pharmacy', 'Narayan Ghat, Chitwan', '9807788991', NULL, NULL),
(13, 'Koshi Zonal Hospital', 'hospital', 'Biratnagar, Province 1', '9808877665', NULL, NULL),
(14, 'Birat Pharma', 'pharmacy', 'Biratnagar, Province 1', '9804455663', NULL, NULL),
(15, 'Lumbini Zonal Hospital', 'hospital', 'Butwal, Lumbini', '9809988774', NULL, NULL),
(16, 'Lumbini Pharmacy', 'pharmacy', 'Devdaha, Lumbini', '9803322115', NULL, NULL),
(17, 'Janakpur Regional Hospital', 'hospital', 'Janakpur, Province 2', '9806677554', NULL, NULL),
(18, 'Janakpur Pharma', 'pharmacy', 'Janakpur Dham', '9804411226', NULL, NULL),
(19, 'Surkhet Regional Hospital', 'hospital', 'Surkhet, Karnali Province', '9805566447', NULL, NULL),
(20, 'Karnali Pharmacy', 'pharmacy', 'Surkhet City', '9806655443', NULL, NULL),
(21, 'Seti Zonal Hospital', 'hospital', 'Dhangadhi, Far-Western', '9805544332', NULL, NULL),
(22, 'Dhangadhi Pharma', 'pharmacy', 'Main Bazaar, Dhangadhi', '9803322554', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `health_logs`
--

CREATE TABLE `health_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `weight` float NOT NULL,
  `height` float NOT NULL,
  `calories` int(11) NOT NULL,
  `water_ml` int(11) NOT NULL,
  `workout_minutes` int(11) NOT NULL,
  `sleep_hours` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `health_logs`
--

INSERT INTO `health_logs` (`id`, `user_id`, `date`, `weight`, `height`, `calories`, `water_ml`, `workout_minutes`, `sleep_hours`) VALUES
(1, 2, '2025-01-08', 0, 0, 2000, 5000, 30, 8),
(2, 2, '2025-01-08', 0, 0, 2000, 2000, 30, 8),
(3, 3, '2025-01-08', 0, 0, 2550, 200, 45, 30),
(4, 4, '2025-01-08', 0, 0, 5555, 500, 60, 9),
(5, 5, '2025-01-08', 0, 0, 1500, 1000, 30, 7),
(6, 5, '2025-01-08', 0, 0, 5000, 300, 10, 6),
(7, 6, '2025-01-09', 0, 0, 2000, 1000, 30, 8);

-- --------------------------------------------------------

--
-- Table structure for table `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `availability` text DEFAULT NULL,
  `meeting_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `providers`
--

INSERT INTO `providers` (`id`, `name`, `specialization`, `contact`, `email`, `availability`, `meeting_link`) VALUES
(1, 'Dr. Aayush Karki', 'General Physician', '9801234567', 'aayush@hospital.com', 'Monday-Friday: 10 AM - 3 PM', 'https://zoom.us/example1'),
(2, 'Dr. Sandhya Shrestha', 'Pediatrician', '9807654321', 'sandhya@hospital.com', 'Monday-Saturday: 11 AM - 4 PM', 'https://meet.google.com/example2'),
(3, 'Dr. Alice Brown', 'Cardiology', NULL, NULL, NULL, 'https://zoom.us/j/123456789'),
(4, 'Dr. Bob Green', 'Neurology', NULL, NULL, NULL, 'https://zoom.us/j/987654321'),
(5, 'Dr. Alice Brown', 'Cardiology', NULL, NULL, NULL, 'https://zoom.us/j/123456789'),
(6, 'Dr. Bob Green', 'Neurology', NULL, NULL, NULL, 'https://zoom.us/j/987654321');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(2, 'Diwash', 'diwashrajnepal@gmail.com', '$2y$10$7cHheY8QVtbjCGkTs5/IlONtQUYGyj.0AdkEpAciCR.poypjs.g.S'),
(3, 'Rikisha', 'rikishadash@gmail.com', '$2y$10$cg.iGcf/ZeoPNs4qMIRWv.z3We6pYU6q/vlfUhMdhaZ7YRGYyWWGO'),
(4, 'Bhunti', 'bhunti@gmail.com', '$2y$10$dPa6.eJcL7pL/sQuwuXBb.sPWcUhFIwEyW7fcVJ3TZcYiQxl7AK2a'),
(5, 'megina', 'megina@gmail.com', '$2y$10$h3t7EVGoF8uSUbsMh/In5Ox0V3MyZDhnoBEo2NzMJ6w8Kcxo68g3u'),
(6, 'Bibash', 'bibash@gmail.com', '$2y$10$vkE.pEN009cErI2MF.GB/eHVX0qagqBpSyW0pRVbrzs3ff/6PMkL.'),
(7, 'John Doe', 'johndoe@example.com', 'password123'),
(8, 'Jane Smith', 'janesmith@example.com', 'password456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `provider_id` (`provider_id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_id` (`appointment_id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Indexes for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_logs`
--
ALTER TABLE `health_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `emergency_contacts`
--
ALTER TABLE `emergency_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `health_logs`
--
ALTER TABLE `health_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);

--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `chats_ibfk_1` FOREIGN KEY (`appointment_id`) REFERENCES `appointments` (`id`),
  ADD CONSTRAINT `chats_ibfk_2` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `health_logs`
--
ALTER TABLE `health_logs`
  ADD CONSTRAINT `health_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
