-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2024 at 07:49 PM
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
-- Database: `games`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_email_address` varchar(200) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `collage_name` varchar(200) NOT NULL,
  `collage_address` mediumtext NOT NULL,
  `Collage_contact_no` varchar(30) NOT NULL,
  `collage_logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_email_address`, `admin_password`, `admin_name`, `collage_name`, `collage_address`, `Collage_contact_no`, `collage_logo`) VALUES
(1, 'admin@gmail.com', 'admin123', 'Developers', 'Darshan University', 'Rajkot - Morbi Highway,\nGujarat-363650, INDIA', '9874563215', 'logo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_table`
--

CREATE TABLE `feedback_table` (
  `id` int(11) NOT NULL,
  `player_name` varchar(50) NOT NULL,
  `category` varchar(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback_table`
--

INSERT INTO `feedback_table` (`id`, `player_name`, `category`, `comment`) VALUES
(6, 'smit patel', 'hello', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `games_table`
--

CREATE TABLE `games_table` (
  `game_id` int(11) NOT NULL,
  `gamedev_id` int(11) NOT NULL,
  `game_name` varchar(50) NOT NULL,
  `game_img` text NOT NULL,
  `play_url` text NOT NULL,
  `platform` enum('desktop','mobile','','') NOT NULL,
  `verification_status` enum('pending','verify') NOT NULL,
  `game_status` enum('inactive','active','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games_table`
--

INSERT INTO `games_table` (`game_id`, `gamedev_id`, `game_name`, `game_img`, `play_url`, `platform`, `verification_status`, `game_status`) VALUES
(1, 9, '2048', '2048.png', '2048/index.html', 'desktop', 'verify', 'active'),
(2, 5, 'Car Chase', 'CRicon.png', 'Car Game/indexCarGame.html', 'desktop', 'verify', 'inactive'),
(3, 8, 'Flappy Bird', 'FlappyBird2.webp', 'Flappy-Bird/index.html', 'desktop', 'verify', 'active'),
(4, 1, 'Match Numbers', 'MNicon.jpeg', 'Match Box/indexMB.html', 'mobile', 'verify', 'active'),
(5, 3, 'Break Bricks', 'BBicon.png', 'Bricks Breaker/indexBBGame.html', 'desktop', 'verify', 'active'),
(8, 2, 'S.P.S', 'SPSicon.png', 'Stone Paper Scissors/indexSPSGame.html', 'desktop', 'verify', 'active'),
(9, 3, 'Alphabet Game', 'abc.jpg', 'Alphabet Game/level0.html', 'mobile', 'verify', 'active'),
(10, 4, 'Thief Shooter', 'theifGame.jpg', 'ThiefShootGame/start.html', 'desktop', 'verify', 'active'),
(11, 2, 'Snake Game', 'snak.jpeg', 'Snake Game/Snake.html', 'desktop', 'verify', 'active'),
(12, 7, 'Memory Game', 'Memory Game.png', 'Memory game/index.html', 'desktop', 'verify', 'active'),
(14, 6, 'Word Scramble', 'Word scramble.jpeg', 'Word Scramble Game/index.html', 'desktop', 'verify', 'active'),
(15, 10, 'Ping Pong', 'Ping-pong.jpg', 'Ping Pong/index.html', 'desktop', 'verify', 'active'),
(44, 30, 'Flip Game', 'DCFLIPS1.jpg', 'Flip-Game-main/index.html', 'mobile', 'verify', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `game_developer_table`
--

CREATE TABLE `game_developer_table` (
  `gamedev_id` int(11) NOT NULL,
  `dev_name` varchar(50) NOT NULL,
  `dev_photo` text NOT NULL,
  `linkdin_url` text NOT NULL,
  `degree` enum('BTech','Bca','BscIt','BscIt Hons','Mca','Diploma') NOT NULL,
  `branch` enum('cse','civil','electrical','mechanical') NOT NULL,
  `sem` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `status` enum('inactive','active') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_developer_table`
--

INSERT INTO `game_developer_table` (`gamedev_id`, `dev_name`, `dev_photo`, `linkdin_url`, `degree`, `branch`, `sem`, `email_address`, `phone_no`, `status`) VALUES
(1, 'Devika Khunt', 'Image(D).jpg', 'https://www.linkedin.com/in/devika-khunt-44787a222/', 'BTech', 'cse', '7', '21010101107@darshan.ac.in', '0', 'active'),
(2, 'Harshil Savjadiya', 'Image(H).jpg', 'https://www.linkedin.com/in/harshil-savajadiya-668039223/', 'BTech', 'cse', '7', '21010101177@darshan.ac.in', '0', 'active'),
(3, 'Rhydham Gundigara', 'Image(R).jpg', 'https://www.linkedin.com/in/rhydham-gundigara-81b62621b/', 'BTech', 'cse', '7', '21010101073@darshan.ac.in', '0', 'active'),
(4, 'Smit Bhut', 'Image2(S).jpg', 'https://www.linkedin.com/in/smit-bhut-533865223/', 'BTech', 'cse', '7', '21010101024@darshan.ac.in', '0', 'active'),
(5, 'Maulik Bhatt', 'Image(M).jpg', 'https://www.linkedin.com/in/maulikbhatt07/', 'BTech', 'cse', '7', '21010101014@darshan.ac.in', '0', 'active'),
(6, 'Ghanshyamsinh Zala', 'Image(G).jpg', 'https://www.linkedin.com/in/ghanshyamsinh-zala-1a1b9924b', 'BTech', 'cse', '5', '22010101210@darshan.ac.in', '0', 'active'),
(7, 'Krisha Kalola', 'Image(K).jpg', 'https://www.linkedin.com/in/krisha-kalola-803953252', 'BTech', 'cse', '5', '22010101081@darshan.ac.in', '0', 'active'),
(8, 'Nirav Kagathara', 'Image(N).JPG', 'https://www.linkedin.com/in/nirav-kagathara-80978124b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app', 'BTech', 'cse', '5', '22010101443@darshan.ac.in', '0', 'active'),
(9, 'Het Bhalani', 'Image(H).jpeg', 'https://www.linkedin.com/in/het-bhalani-20403b2a8/', 'BTech', 'cse', '3', 'bhalanihet2006@gmail.com', '0', 'active'),
(10, 'Ayushi Patel', 'Image(A).jpg', 'https://www.linkedin.com/in/ayushi-patel-00ab382a9?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app', 'BTech', 'cse', '3', '23010101199@darshan.ac.in', '0', 'active'),
(30, 'Dhruv Chotai', 'My_Img.jpg', 'https://www.linkedin.com/in/dhruv-chotai-179a502aa/', 'BTech', 'cse', '3', '23010101051@darshan.ac.in', '8320663837', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `web_developer_table`
--

CREATE TABLE `web_developer_table` (
  `webdev_id` int(11) NOT NULL,
  `webdev_name` varchar(50) NOT NULL,
  `webdev_photo` text NOT NULL,
  `linkdin_url` text NOT NULL,
  `webdev_role` varchar(50) NOT NULL,
  `degree` enum('BTech','Bca','Bscit','Bscit Hons','Mca','Diploma') NOT NULL,
  `branch` enum('cse','civil','electrical','mechanical') NOT NULL,
  `sem` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `web_developer_table`
--

INSERT INTO `web_developer_table` (`webdev_id`, `webdev_name`, `webdev_photo`, `linkdin_url`, `webdev_role`, `degree`, `branch`, `sem`, `email_address`, `phone_no`, `status`) VALUES
(1, 'Vijay Shekhat', 'Image(V).jpg', 'https://www.linkedin.com/in/vijayshekhat/', 'Mentor', '', '', '', 'vijay.shekhat@darshan.ac.in', '', 'active'),
(2, 'Nirav Kagathara', 'RKN_6223.jpg', 'https://www.linkedin.com/in/nirav-kagathara-80978124b/', 'Flappy Bird', 'BTech', 'cse', '5', '22010101443@darshan.ac.in', '9313442489', 'active'),
(3, 'Maulik Bhatt', 'Image(M).jpg', 'https://www.linkedin.com/in/maulikbhatt07/', 'Car Chase', 'BTech', 'cse', '1', '	21010101014@darshan.ac.in', '0', 'active'),
(4, 'Rhydham Gundigara', 'Image(R).jpg', 'https://www.linkedin.com/in/rhydham-gundigara-81b62621b/', 'B.B. & Alphabet', 'BTech', 'cse', '1', '	21010101073@darshan.ac.in', '0', 'active'),
(5, 'Smit Bhut', 'Image2(S).jpg', 'Thief Shoohttps://www.linkedin.com/in/smit-bhut-533865223/ter', 'Thief Shooter', 'BTech', 'cse', '1', '	21010101024@darshan.ac.in', '0', 'active'),
(6, 'Harshil Savjadiya', 'Image(H).jpg', 'https://www.linkedin.com/in/harshil-savajadiya-668039223/', 'S.P.S & Snake Game', 'BTech', 'cse', '1', '21010101177@darshan.ac.in', '0', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `feedback_table`
--
ALTER TABLE `feedback_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games_table`
--
ALTER TABLE `games_table`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `id` (`gamedev_id`);

--
-- Indexes for table `game_developer_table`
--
ALTER TABLE `game_developer_table`
  ADD PRIMARY KEY (`gamedev_id`);

--
-- Indexes for table `web_developer_table`
--
ALTER TABLE `web_developer_table`
  ADD PRIMARY KEY (`webdev_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback_table`
--
ALTER TABLE `feedback_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `games_table`
--
ALTER TABLE `games_table`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `game_developer_table`
--
ALTER TABLE `game_developer_table`
  MODIFY `gamedev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `web_developer_table`
--
ALTER TABLE `web_developer_table`
  MODIFY `webdev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games_table`
--
ALTER TABLE `games_table`
  ADD CONSTRAINT `id` FOREIGN KEY (`gamedev_id`) REFERENCES `game_developer_table` (`gamedev_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
