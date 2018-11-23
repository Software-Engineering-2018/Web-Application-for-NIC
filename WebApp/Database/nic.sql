-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2018 at 12:09 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nic`
--

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `sno` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `device_name` varchar(20) NOT NULL,
  `mac_address` varchar(20) NOT NULL,
  `os` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `from_duration` datetime NOT NULL,
  `to_duration` datetime NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`sno`, `username`, `device_name`, `mac_address`, `os`, `status`, `from_duration`, `to_duration`, `password`) VALUES
(14, 'ronnie', 'MI 5', '1E:1E:1E:1E:1E:1E', 'android', 'pending', '2018-11-04 18:19:08', '0000-00-00 00:00:00', ''),
(15, 'ronnie', 'MI 5', '12346', 'android', 'pending', '2018-11-04 18:20:54', '0000-00-00 00:00:00', ''),
(17, 'rich', 'Redmi Note 3', '7C:EF:5D:11:4E:3C', 'Android 7.0', 'approved', '2018-11-05 21:34:42', '2018-11-10 18:30:00', '.mnt$pass'),
(18, 'rich', 'IPhone 6', 'A8:66:7F:7D:2A:9F', 'ios 12.1', 'declined', '2018-11-05 21:36:02', '0000-00-00 00:00:00', 'I hate IPhone'),
(19, 'sourav1', 'MI 5', '1E:2E:CF:3E:3D:4C', 'Android', 'approved', '2018-11-23 11:12:25', '2019-12-10 18:30:00', '<salt>pass#123');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `name` varchar(50) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `empcode` varchar(15) NOT NULL,
  `mobileno` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `division` varchar(30) NOT NULL,
  `location` varchar(20) NOT NULL,
  `ministry` varchar(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_category` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`name`, `designation`, `empcode`, `mobileno`, `email`, `division`, `location`, `ministry`, `username`, `password`, `user_category`) VALUES
('Richard Tony', 'Designer', '12345', 8290847009, 'richardtony54@gmail.com', '-', '-', '-', 'rich', '$6phNlvUY0j5c', 'Student'),
('Ronald', 'programmer', '123', 8290847009, 'ronaldtony007@gmail.com', '', '', '', 'ronnie', '9d4e1e23bd5b727046a9e3b4b7db57bd8d6ee684', 'Student'),
('Sourav upadhya', 'Student', '123', 8056167138, 'sourav@gmail.com', '-', 'delhi', '-', 'sourav1', '$2y$10$itfaip8ZNdH5Ltfh70XFP.2NYqoDmKZ.IAUjG8H8yWdFKPUkw9fS6', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
