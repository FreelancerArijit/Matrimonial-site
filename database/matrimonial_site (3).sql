-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 07:00 AM
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
-- Database: `matrimonial_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'PRADIP MONDAL', 'Pradip@gmail.com', '123456', '2025-05-23 10:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `ref_no` int(11) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email_id` varchar(60) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ref_no`, `full_name`, `email_id`, `message`, `submitted_at`, `status`) VALUES
(14, 'PRADIP MONDAL', 'Pradip@gmail.com', 'TESTING THE CONTACT US PAGE ', '2025-05-31 13:50:05', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_created` tinyint(1) NOT NULL DEFAULT 0,
  `preference_created` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('active','blocked') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile`, `email`, `password`, `created_at`, `profile_created`, `preference_created`, `status`) VALUES
(9, 'PRADIP MONDAL', '8172000984', 'Pradip1@gmail.com', '$2y$10$seShfVM4Dva4fvn9wd2t.eVo2XIiDxYNc52h6ESeMygCguTQMHRpm', '2025-05-24 04:22:44', 1, 1, 'active'),
(22, 'Arijit Chattapadhyay', '7865095895', 'Arijit@gmail.com', '$2y$10$WKjuBdnz8uCnMhm4PDNjNeXXbBnUpk6U8sYM2vBFpgxmFLAlF5z6y', '2025-05-27 15:31:55', 1, 1, 'active'),
(25, 'AKANSHA MONDAL', '5436789020', 'Akansha@gmail.com', '$2y$10$5sKobVHTC6gtqpA5Ol1Do.33sKlueWsz88tNP6EkkxhhV1RuSlooa', '2025-05-28 02:20:39', 1, 1, 'active'),
(26, 'Trisha Pal', '5665784580', 'Trisha@gmail.com', '$2y$10$TLbL2eqdYFK9hBtVEqbYrOxTkbM4eg4wrGzzvjRywnm75A30JYlsC', '2025-05-28 02:38:23', 1, 1, 'active'),
(27, 'Mitali Majhi', '7444458888', 'Mitali@gmail.com', '$2y$10$61ebcjaQrx8GiAcshQM09uwMVZ7hYTK0M5UI/hlvIB6P6jSLT7gg.', '2025-05-28 02:46:01', 1, 1, 'active'),
(28, 'Sneha Roy', '4589632546', 'Sneha@gmail.com', '$2y$10$BDLcuT5pYv5F.NOE8inEce.bFODSDkJYURVaIHGFZiIyaS0aOvFly', '2025-05-28 03:58:49', 1, 1, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

CREATE TABLE `preferences` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `preferred_profile_for` enum('Bride','Groom') NOT NULL,
  `preferred_age_min` int(11) NOT NULL,
  `preferred_age_max` int(11) NOT NULL,
  `preferred_height` float NOT NULL,
  `preferred_weight` float NOT NULL,
  `preferred_skin_tone` enum('Fair','Black','Brown') NOT NULL,
  `preferred_religion` varchar(50) NOT NULL,
  `preferred_mother_tongue` varchar(50) NOT NULL,
  `preferred_education_level` varchar(100) DEFAULT NULL,
  `preferred_occupation` varchar(100) DEFAULT NULL,
  `preferred_lives_in` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`id`, `cust_id`, `preferred_profile_for`, `preferred_age_min`, `preferred_age_max`, `preferred_height`, `preferred_weight`, `preferred_skin_tone`, `preferred_religion`, `preferred_mother_tongue`, `preferred_education_level`, `preferred_occupation`, `preferred_lives_in`, `created_at`) VALUES
(2, 22, 'Bride', 21, 25, 5.8, 61, 'Fair', 'hindu', 'Bangla', 'GRADUATION', 'WEB DEVELOPER', 'KOLKATA', '2025-05-27 15:39:56'),
(3, 9, 'Bride', 20, 25, 5.8, 61, 'Fair', 'hindu', 'Bangla', 'GRADUATION', 'WEB DEVELOPER', 'KOLKATA', '2025-05-27 15:52:13'),
(5, 25, 'Bride', 20, 30, 5.8, 62, 'Fair', 'hindu', 'Bengali', 'GRADUATION', 'WEB DEVELOPER', 'KOLKATA', '2025-05-28 02:31:41'),
(6, 26, 'Groom', 20, 30, 5.8, 63, 'Fair', 'hindu', 'BENGALI', 'NA', 'PHOTO EDITOR', 'Kolkata', '2025-05-28 02:43:36'),
(7, 27, 'Groom', 22, 30, 5.8, 63, 'Fair', 'hindu', 'Bengali', 'POST GRADUATION', 'PHOTO EDITOR', 'Kolkata', '2025-05-28 03:09:33'),
(8, 28, 'Groom', 20, 30, 5.2, 64, 'Fair', 'hindu', 'Bengali', 'B.TECH', 'SOFTWARE ENGINEER', 'KOLKATA', '2025-05-28 04:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Customer_Name` varchar(100) NOT NULL,
  `story_image` varchar(255) DEFAULT NULL,
  `story_title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `creation_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `published` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `user_id`, `Customer_Name`, `story_image`, `story_title`, `description`, `creation_at`, `published`) VALUES
(9, 9, 'PRADIP MONDAL', 'uploads/Stories/img_68383a4a10eb04.93560015.jpg', 'A Journey of Love', 'We met through the platform, connected instantly, and after several heartfelt conversations, we knew we were meant for each other. Thank you', '2025-05-29 10:43:22', 1),
(10, 9, 'PRADIP MONDAL', 'uploads/Stories/img_68383b63138351.12136104.jpg', 'Found My Best Friend', 'It wasn\'t just finding a life partner, it was finding a friend for life. We clicked over similar dreams and values. Forever grateful for this match!', '2025-05-29 10:48:03', 1),
(11, 9, 'PRADIP MONDAL', 'uploads/Stories/img_68383bbf598b15.57463271.jpg', 'Two Souls, One Destiny', 'Despite living miles apart, destiny brought us together through this wonderful site. Now, every moment feels magical being with my soulmate!', '2025-05-29 10:49:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `profile_for` enum('Bride','Groom') NOT NULL,
  `full_name` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `has_siblings` enum('Yes','No') NOT NULL,
  `lives_in` varchar(50) NOT NULL,
  `hometown` varchar(50) NOT NULL,
  `district` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `mother_tongue` varchar(50) DEFAULT NULL,
  `height` float DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `skin_tone` enum('Fair','Black','Brown') DEFAULT NULL,
  `education_level` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `other_picture1` varchar(255) DEFAULT NULL,
  `other_picture2` varchar(255) DEFAULT NULL,
  `other_picture3` varchar(255) DEFAULT NULL,
  `other_picture4` varchar(255) DEFAULT NULL,
  `father_name` varchar(50) NOT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `mother_name` varchar(50) NOT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `cust_id`, `profile_for`, `full_name`, `age`, `dob`, `mobile`, `email`, `gender`, `has_siblings`, `lives_in`, `hometown`, `district`, `state`, `religion`, `mother_tongue`, `height`, `weight`, `skin_tone`, `education_level`, `occupation`, `about_me`, `profile_picture`, `other_picture1`, `other_picture2`, `other_picture3`, `other_picture4`, `father_name`, `father_occupation`, `mother_name`, `mother_occupation`, `created_at`) VALUES
(5, 9, 'Groom', 'PRADIP MONDAL', 21, '2004-02-09', '8172000984', 'Pradip1@gmail.com', 'Male', 'No', 'KOLKATA', 'BURDWAN', 'PURBA BARDHAMAN', 'WEST BENGAL', 'hindu', 'Bangla', 5.2, 68, 'Fair', 'GRADUATION', 'ANDROID DEVELOPER', 'I’m a passionate and detail-oriented Android Developer with hands-on experience in building scalable, user-friendly, and high-performance mobile applications using Java and Kotlin.', 'uploads/img_683a87cb7c5a43.02904734.png', 'uploads/img_683a8274dad961.74080970.jpg', 'uploads/img_683a8274db1ed6.23027377.jpg', 'uploads/img_683a8274db5ed6.67498860.jpg', 'uploads/img_683a87cb7cc890.07401727.png', 'PARESH CHANDRA MONDAL', 'GOVT.', 'T..... MONDAL', 'HOUSEWIFE', '2025-05-24 04:27:00'),
(13, 22, 'Groom', 'Arijit Chattapadhyay', 21, '2004-01-09', '+917865095895', 'Arijit@gmail.com', 'Male', 'No', 'KOLKATA', 'ARAMBAGH', 'HOOGHLY', 'WEST BENGAL', 'hindu', 'BENGALI', 5.2, 61, 'Fair', 'GRADUATION', 'WEB DEVELOPER', 'Hi! I\'m a passionate and detail-oriented Front-End Web Developer with a strong foundation in HTML, CSS, JavaScript, and modern frameworks like React. I specialize in building responsive, user-friendly websites that deliver seamless user experiences across all devices.', 'uploads/img_68399d62f3aa02.68197296.jpg', 'uploads/img_68399d62f3fd29.04781873.jpg', 'uploads/img_68399d63001627.51508196.jpg', 'uploads/img_68399d630062d6.44804086.jpg', 'uploads/img_68399d6300a770.48525859.jpg', 'PRANAB', 'GOVT.', 'ABC', 'HOUSEWIFE', '2025-05-27 15:33:53'),
(15, 25, 'Bride', 'AKANSHA', 25, '2000-02-02', '5487596322', 'Akansha@gmail.com', 'Female', 'Yes', 'KOLKATA', 'HOWRAH', 'KOLKATA', 'WEST BENGAL', 'hindu', 'BENGALI', 5.2, 61, 'Fair', 'GRADUATION', 'PHOTO EDITOR ', 'I\'m a passionate photo editor with a keen eye for detail and color. I love transforming ordinary images into stunning visual stories. With experience in retouching, color correction, and creative editing, I bring out the best in every photo. Creativity and precision are at the heart of everything I do.', 'uploads/img_68399eee3cb9a3.88458031.jpg', 'uploads/img_68399eee3d0fa4.52284086.jpg', 'uploads/img_68399eee3d4d12.56203333.jpg', 'uploads/img_68399eee3d85a2.65114426.jpg', 'uploads/img_68399eee3dc116.44466999.jpg', 'JAYANTA MONDAL', 'GOVT.', 'PALLABI MONDAL', 'HOUSEWIFE', '2025-05-28 02:30:51'),
(16, 26, 'Bride', 'Trish pal', 24, '2001-04-02', '5454884478', 'Trisha@gmail.com', 'Female', 'Yes', 'KOLKATA', 'BURDWAN', 'PURBA BARDHAMAN', 'WEST BENGAL', 'hindu', 'BENGALI', 5.2, 61, 'Fair', 'POST GRADUATION', 'TECHNICIAN', 'I’m someone who finds joy in life’s little moments — whether it’s capturing a sunset on my phone, experimenting with a new recipe in the kitchen, or losing myself in a good book. One of my biggest passions is traveling and exploring new cultures — I believe each journey teaches something new. I also love creative writing and listening to music during quiet evenings. Staying connected to family and roots is very important to me, and I’m always looking for ways to grow — emotionally and spiritually.', 'uploads/img_68399d1935a315.82672678.jpg', 'uploads/img_68399d1935e4a1.54299756.jpg', 'uploads/img_68399d19361ca4.17074047.jpg', 'uploads/img_68399d19365012.61076984.jpg', 'uploads/img_68399d19368423.43152694.jpg', 'Deepak Pal', 'GOVT.', 'Rekha Pal', 'HOUSEWIFE', '2025-05-28 02:42:53'),
(17, 27, 'Bride', 'Mitali Majhi', 22, '2003-04-04', '+917444458888', 'Mitali@gmail.com', 'Female', 'No', 'KOLKATA', 'ARAMBAGH', 'HOOGHLY', 'WEST BENGAL', 'hindu', 'BENGALI', 5.2, 68, 'Fair', 'POST GRADUATION', 'VIDEO EDITOR', 'I am a kind, responsible, and family-oriented girl who values relationships and emotional bonds.', 'uploads/img_68399da51af6e2.34758348.png', 'uploads/img_68399da51b6fa8.07700477.png', 'uploads/img_68399da51bc5e4.50484863.png', 'uploads/img_68399da51c1837.46838048.png', 'uploads/img_68399da51c72d3.32642420.png', 'Mahesh Majhi', 'FARMER', 'Anjali Majhi', 'HOUSEWIFE', '2025-05-28 02:49:31'),
(18, 28, 'Bride', 'Sneha Roy', 25, '2000-05-04', '4865945210', 'Sneha@gmail.com', 'Female', 'No', 'KOLKATA', 'BURDWAN', 'PURBA BARDHAMAN', 'WEST BENGAL', 'hindu', 'Bengali', 5.2, 54, 'Fair', 'ITI', 'SURVEYOR', 'I believe that honesty, communication, and mutual respect form the foundation of any relationship.', 'uploads/img_68399e18768810.77902622.jpg', 'uploads/img_68399e1876c419.32513630.jpg', 'uploads/img_68399e1876f5e1.54620576.jpg', 'uploads/img_68399e187738f0.63013506.jpg', 'uploads/img_68399e18776f65.39836065.jpg', 'Bidyut Malik', 'Self Employed', 'Monika Malik', 'HOUSEWIFE', '2025-05-28 04:11:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`ref_no`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `preferences`
--
ALTER TABLE `preferences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cust_id` (`cust_id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `ref_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `preferences`
--
ALTER TABLE `preferences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_profiles`
--
ALTER TABLE `user_profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `preferences`
--
ALTER TABLE `preferences`
  ADD CONSTRAINT `preferences_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
