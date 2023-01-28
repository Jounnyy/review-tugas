-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 07:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendaces`
--

CREATE TABLE `attendaces` (
  `id` int(11) NOT NULL,
  `employee_id` int(8) NOT NULL,
  `tgl` varchar(255) DEFAULT NULL,
  `clock_in` varchar(255) DEFAULT NULL,
  `clock_out` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendaces`
--

INSERT INTO `attendaces` (`id`, `employee_id`, `tgl`, `clock_in`, `clock_out`) VALUES
(22, 101, '2023-01-17', '15:48:43', '17:25:00'),
(25, 102, '2023-01-12', '19:42:26', '19:42:32'),
(27, 101, '2023-01-16', '06:20:16', '06:20:48'),
(28, 102, '2023-01-09', '01:12:57', '01:31:40'),
(29, 103, '2023-01-16', '00:54:35', '02:07:05'),
(30, 103, '2023-01-17', '02:07:57', '02:08:06'),
(31, 102, '2023-01-17', '02:29:17', '02:29:20'),
(32, 105, '2023-01-14', '02:57:36', '02:57:41'),
(33, 105, '2023-01-17', '10:32:17', '10:32:26'),
(34, 104, '2023-01-17', '14:20:23', '14:20:31'),
(35, 1, '2023-01-19', '21:14:24', '21:14:27'),
(36, 102, '2023-01-20', '00:18:43', '01:38:28'),
(37, 105, '2023-01-20', '01:28:22', '01:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `employee_id` int(8) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `employee_id`, `fullname`, `role`, `password`) VALUES
(17, 232, 'Arif', 'admin', '202cb962ac59075b964b07152d234b70'),
(18, 201, 'Hulk', 'admin', '202cb962ac59075b964b07152d234b70'),
(19, 101, 'mekal', 'programmer', '202cb962ac59075b964b07152d234b70'),
(20, 102, 'Heri', 'IT Ops', '202cb962ac59075b964b07152d234b70'),
(21, 103, 'Herman', 'karyawan magang', '202cb962ac59075b964b07152d234b70'),
(22, 104, 'Hulk', 'Manager', '202cb962ac59075b964b07152d234b70'),
(23, 105, 'Samsul', 'karyawan magang', '202cb962ac59075b964b07152d234b70'),
(24, 666, 'kuyang', 'admin', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendaces`
--
ALTER TABLE `attendaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendaces`
--
ALTER TABLE `attendaces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendaces`
--
ALTER TABLE `attendaces`
  ADD CONSTRAINT `attendaces_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`employee_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
