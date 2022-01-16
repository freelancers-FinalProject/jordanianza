-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 04:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'designers'),
(4, 'makeup artists'),
(1, 'photographers');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `images` varchar(250) DEFAULT NULL,
  `video` varchar(250) DEFAULT NULL,
  `rating` int(50) NOT NULL,
  `subCate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `images`, `video`, `rating`, `subCate_id`) VALUES
(93, 'NULL', 'Sail-Away.mp4', 0, 884),
(94, 'pexels-stephane-hurbe-4198029.jpg', 'NULL', 1, 884),
(96, 'jordanianza (4).png', 'NULL', 47, 884),
(98, 'WhatsApp Image 2021-10-18 at 10.38.47 AM.jpeg', 'NULL', 1, 884),
(99, 'White Christmas (12).png', 'NULL', 0, 887),
(100, 'White Christmas (11).png', 'NULL', 0, 887),
(101, 'White Christmas (10).png', 'NULL', 0, 887),
(104, 'White Christmas (10).png', 'NULL', 0, 888),
(105, 'NULL', 'production ID_4110292.mp4', 0, 888);

-- --------------------------------------------------------

--
-- Table structure for table `sub_admin`
--

CREATE TABLE `sub_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` varchar(250) DEFAULT NULL,
  `facebook` varchar(250) NOT NULL,
  `instagram` varchar(250) NOT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_admin`
--

INSERT INTO `sub_admin` (`id`, `username`, `email`, `address`, `phone`, `password`, `profile_pic`, `facebook`, `instagram`, `cate_id`, `type`) VALUES
(1, 'enas', 'enas@gmail.com', 'asdfghj', 777222189, '123enas', 'pexels-stephane-hurbe-4198029.jpg', '', '', 2, 0),
(3, 'yazan', 'yazan@gmail.com', NULL, NULL, '251298', NULL, '', '', 2, 1),
(4, 'soundos', 'soundos@gmail.com', 'Amman', 234568, '4a6b7da7c706f1d88d7f3eeb4bd6dcdffac00df2', NULL, '', '', 1, 0),
(5, 'soundos', 'soundos@gmail.com', 'Amman', 234568, '4a6b7da7c706f1d88d7f3eeb4bd6dcdffac00df2', NULL, '', '', 2, 0),
(6, 'omer', 'omer@gmail.com', 'Amman', 234568, '335a4663764e471034712f5eb779af43ac7df317', NULL, '', '', 2, 0),
(7, 'ansaf', 'ansaf@gmail.com', 'Amman', 234568, 'ansaf1234', NULL, '', '', 1, 0),
(8, 'yazan', 'yazan@gmail.com', 'Amman', 234568, '8cb2237d0679ca88db6464eac60da96345513964', NULL, '', '', 2, 0),
(9, 'balqes', 'balqes@gmail.com', 'Amman', 234568, '8cb2237d0679ca88db6464eac60da96345513964', NULL, '', '', 2, 0),
(11, 'mahmoud', 'mahmoud.abualia2@gmail.com', NULL, NULL, 'be09bbdaee0a2f5c5bb75b929227179f3e1dfaf1', NULL, '', '', 1, 0),
(12, 'asya', 'asya@gmail.com', NULL, NULL, 'bc2d9a2ff2e732bacaa6abae515b68503a1599af', NULL, '', '', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subAdmin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `name`, `subAdmin_id`) VALUES
(884, 'makup', 1),
(887, 'photo1', 1),
(888, 'photo', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `profile_pic`) VALUES
(1, 'enaselazzeh', 'Enas.Elazzeh.EE@gmail.com', '99aa16c93115bdad4c4f01ce3f8ea7910d24915f', 'pexels-miguel-á-padriñán-255379.jpg'),
(3, 'Mohammadshdooh', 'mohd.shdooh@gmail.com', 'fb16eb4c82927f215df42cc1b3336f538b91d722', 'White Christmas (5).png'),
(4, 'enaselazzeh223', 'enas1gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(5, 'hamzeh', 'hamzeh@gmail.com', '5788c14935f587be4bae02db15b93c23f1d90cd3', NULL),
(6, 'mahmoud', 'mahmoud.abualia2@gmail.com', 'be09bbdaee0a2f5c5bb75b929227179f3e1dfaf1', NULL),
(7, 'enaselazzeh', 'enas1@gmail.com', 'b44af1c9d88c68f2bf391a4cad680524afbcadb3', NULL),
(8, 'omer ', 'omer@gmail.com', 'a81330c6f7fef8eb1aaf1ffc523515a6527983c3', NULL),
(9, 'asya', 'asya@gmail.com', '3f5bf68db5e9d445ca1513abeb845cc08618a5c5', NULL),
(10, 'asya1', 'asya1@gmail.com', '14d6e5c4a49b9502ea48f18c52756917652cb1bf', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subCate-id` (`subCate_id`);

--
-- Indexes for table `sub_admin`
--
ALTER TABLE `sub_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subAdmin_id` (`subAdmin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `sub_admin`
--
ALTER TABLE `sub_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=889;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `subCate-id` FOREIGN KEY (`subCate_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_admin`
--
ALTER TABLE `sub_admin`
  ADD CONSTRAINT `cate_id` FOREIGN KEY (`cate_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `subAdmin_id` FOREIGN KEY (`subAdmin_id`) REFERENCES `sub_admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
