-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2022 at 03:37 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `br_id` int(11) NOT NULL,
  `branch_id` varchar(30) NOT NULL,
  `branch_name` varchar(300) NOT NULL,
  `branch_address` varchar(300) NOT NULL,
  `branch_image` varchar(300) DEFAULT NULL,
  `no_of_halls` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `screening_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`br_id`, `branch_id`, `branch_name`, `branch_address`, `branch_image`, `no_of_halls`, `hall_id`, `screening_id`) VALUES
(39, 'B001', 'CFTv KLCC', 'KLCC, Kuala Lumpur', 'branch2.png', 5, 1, NULL),
(40, 'B001', 'CFTv KLCC', 'KLCC, Kuala Lumpur', 'branch2.png', 5, 2, NULL),
(41, 'B001', 'CFTv KLCC', 'KLCC, Kuala Lumpur', 'branch2.png', 5, 3, NULL),
(42, 'B001', 'CFTv KLCC', 'KLCC, Kuala Lumpur', 'branch2.png', 5, 4, NULL),
(43, 'B001', 'CFTv KLCC', 'KLCC, Kuala Lumpur', 'branch2.png', 5, 5, NULL),
(44, 'B002', 'CFTv Butterworth', 'Butterworth Penang', 'branch.png', 5, 32, NULL),
(45, 'B002', 'CFTv Butterworth', 'Butterworth Penang', 'branch.png', 5, 33, NULL),
(46, 'B002', 'CFTv Butterworth', 'Butterworth Penang', 'branch.png', 5, 34, NULL),
(47, 'B002', 'CFTv Butterworth', 'Butterworth Penang', 'branch.png', 5, 35, NULL),
(48, 'B002', 'CFTv Butterworth', 'Butterworth Penang', 'branch.png', 5, 36, NULL),
(49, 'B003', 'CFTv Kuching', 'Kuching, Sarawak', 'branch3.png', 5, 37, NULL),
(50, 'B003', 'CFTv Kuching', 'Kuching, Sarawak', 'branch3.png', 5, 38, NULL),
(51, 'B003', 'CFTv Kuching', 'Kuching, Sarawak', 'branch3.png', 5, 39, NULL),
(52, 'B003', 'CFTv Kuching', 'Kuching, Sarawak', 'branch3.png', 5, 40, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hall`
--

CREATE TABLE `hall` (
  `h_id` int(11) NOT NULL,
  `hall_id` varchar(30) NOT NULL,
  `seat_id` int(11) DEFAULT NULL,
  `hall_no` int(11) NOT NULL,
  `hall_type` varchar(30) NOT NULL,
  `hall_capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hall`
--

INSERT INTO `hall` (`h_id`, `hall_id`, `seat_id`, `hall_no`, `hall_type`, `hall_capacity`) VALUES
(27, '1', NULL, 1, 'Standard', 69),
(28, '2', NULL, 2, 'Standard', 69),
(29, '3', NULL, 3, 'Standard', 69),
(30, '4', NULL, 4, 'Standard', 69),
(31, '5', NULL, 5, 'Standard', 69),
(32, '32', NULL, 1, 'Standard', 69),
(33, '33', NULL, 2, 'Standard', 69),
(34, '34', NULL, 3, 'Standard', 69),
(35, '35', NULL, 4, 'Standard', 69),
(36, '36', NULL, 5, 'Standard', 69),
(37, '37', NULL, 1, 'Standard', 69),
(38, '38', NULL, 2, 'Standard', 69),
(39, '39', NULL, 3, 'Standard', 69),
(40, '40', NULL, 4, 'Standard', 69),
(41, '41', NULL, 5, 'Standard', 69),
(42, '42', NULL, 1, 'Standard', 69),
(43, '43', NULL, 2, 'Standard', 69),
(44, '44', NULL, 3, 'Standard', 69),
(45, '45', NULL, 4, 'Standard', 69),
(46, '46', NULL, 5, 'Standard', 69),
(47, '47', NULL, 1, 'Standard', 69),
(48, '48', NULL, 2, 'Standard', 69),
(49, '49', NULL, 3, 'Standard', 69),
(50, '50', NULL, 4, 'Standard', 69),
(51, '51', NULL, 5, 'Standard', 69),
(52, '52', NULL, 1, 'Standard', 69),
(53, '53', NULL, 2, 'Standard', 69),
(54, '54', NULL, 3, 'Standard', 69),
(55, '55', NULL, 4, 'Standard', 69),
(56, '56', NULL, 5, 'Standard', 69);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `m_card` varchar(35) DEFAULT NULL,
  `m_rewards` varchar(35) DEFAULT NULL,
  `m_name` varchar(35) NOT NULL,
  `m_email` varchar(35) NOT NULL,
  `m_password` varchar(35) NOT NULL,
  `m_dob` varchar(35) NOT NULL,
  `m_gender` varchar(35) NOT NULL,
  `m_number` varchar(35) NOT NULL,
  `m_address` varchar(300) NOT NULL,
  `m_picture` varchar(300) DEFAULT NULL,
  `m_points` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `m_card`, `m_rewards`, `m_name`, `m_email`, `m_password`, `m_dob`, `m_gender`, `m_number`, `m_address`, `m_picture`, `m_points`) VALUES
(6, 'M001', NULL, 'Claire Chong', 'Clairechong998@gmail.com', 'abcd1234', '2000-10-07', 'Select Gender', '018-2017978', 'Seremban', NULL, '1300'),
(7, 'M002', NULL, 'Neesha A/P Jothi', 'neesha@utar.edu.my', '1234', '1988-01-01', 'Select Gender', '012-3456789', 'Penang', NULL, '20000'),
(8, 'M003', NULL, 'Khor Kok Chin', 'kckhor@utar.edu.my', '1234', '1983-03-01', 'Select Gender', '010-454545500', 'Selangor', NULL, '20000'),
(17, NULL, NULL, 'Siow', 'Clairechong998@gmail.com', 'Abcd123!@#', '2000-01-01', 'Female', '019-3095980', 'Sban', NULL, ''),
(18, NULL, NULL, 'CHONG', 'yen@gmail.com', 'abcd1234', '1999-01-01', 'Female', '+10182017978', 'hello', NULL, ''),
(19, NULL, NULL, 'Tan', 'gg@gmail.com', 'Abc1234!@#$', '1999-01-01', 'Male', '0126118372', 'Sban', NULL, '100');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `movie_id` int(11) NOT NULL,
  `movie_poster` varchar(300) NOT NULL,
  `movie_name` varchar(300) NOT NULL,
  `movie_duration` varchar(20) NOT NULL,
  `movie_date` date NOT NULL,
  `movie_rating` int(11) NOT NULL,
  `movie_trailer` varchar(300) NOT NULL,
  `movie_desc` varchar(3000) NOT NULL,
  `movie_case` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `movie_poster`, `movie_name`, `movie_duration`, `movie_date`, `movie_rating`, `movie_trailer`, `movie_desc`, `movie_case`) VALUES
(7, 'drStrange.jpg', 'Doctor Strange in the Multiverse of Madness', '130', '2022-05-04', 9, 'https://www.youtube.com/embed/aWzlQ2N6qqg', '																																																																																Dr Stephen Strange casts a forbidden spell that opens a portal to the multiverse. However, a threat emerges that may be too big for his team to handle.																																																																					', 'coming soon'),
(8, 'jujutsuKaisen.jpg', 'Jujutsu Kaisen 0', '105', '2021-12-24', 8, 'https://www.youtube.com/embed/UPRqnFnnrr8', '																Yuta Okkotsu gains control of an extremely powerful, cursed spirit and gets enrolled in the Tokyo Prefectural Jujutsu High School by sorcerers to help him control his power and keep an eye on him.														', 'now showing'),
(9, 'Batman.jpg', 'The Batman', '176', '2022-03-04', 8, 'https://www.youtube.com/embed/mqqft2x_Aa4', 'Batman ventures into Gotham City\'s underworld when a sadistic killer leaves behind a trail of cryptic clues. As the evidence begins to lead closer to home and the scale of the perpetrator\'s plans become clear, he must forge new relationships, unmask the culprit and bring justice to the abuse of power and corruption that has long plagued the metropolis.							', 'now showing'),
(10, 'minions.jpg', 'Minions: The Rise of Gru', '90', '2022-06-01', 8, 'https://www.youtube.com/embed/pN1HNkoL2QA', 'In the 1970s, young Gru tries to join a group of supervillains called the Vicious 6 after they oust their leader -- the legendary fighter Wild Knuckles. When the interview turns disastrous, Gru and his Minions go on the run with the Vicious 6 hot on their tails. Luckily, he finds an unlikely source for guidance -- Wild Knuckles himself -- and soon discovers that even bad guys need a little help from their friends.', 'coming soon'),
(14, 'morbius.jpg', 'Morbius', '110', '2022-04-01', 5, 'https://www.youtube.com/embed/oZ6iiRrz1SY', 'Dangerously ill with a rare blood disorder and determined to save others from the same fate, Dr. Morbius attempts a desperate gamble. While at first it seems to be a radical success, a darkness inside of him is soon unleashed.', 'now showing'),
(15, 'fantasticbeast.jpg', 'Fantastic Beasts: The Secrets of Dumbledore', '143', '2022-04-13', 9, 'https://www.youtube.com/embed/Y9dr2zw-TXQ', '								Professor Albus Dumbledore knows the powerful, dark wizard Gellert Grindelwald is moving to seize control of the wizarding world. Unable to stop him alone, he entrusts magizoologist Newt Scamander to lead an intrepid team of wizards and witches. They soon encounter an array of old and new beasts as they clash with Grindelwald\'s growing legion of followers.							', 'coming soon');

-- --------------------------------------------------------

--
-- Table structure for table `screening`
--

CREATE TABLE `screening` (
  `screening_id` int(11) NOT NULL,
  `screen_id` varchar(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `hall_id` int(11) NOT NULL,
  `screening_date` date NOT NULL,
  `screening_time` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `screening`
--

INSERT INTO `screening` (`screening_id`, `screen_id`, `movie_id`, `branch_id`, `hall_id`, `screening_date`, `screening_time`) VALUES
(12, '1', 8, 39, 1, '2022-06-10', '14:00'),
(13, '2', 9, 49, 37, '2022-06-10', '09:00'),
(15, '3', 9, 44, 32, '2022-05-08', '12:00'),
(16, '4', 9, 49, 37, '2022-06-09', '00:00'),
(17, '5', 8, 49, 37, '2022-05-22', '13:00'),
(18, '6', 14, 44, 34, '2022-04-13', '23:00');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_id` int(11) NOT NULL,
  `screening_id` int(11) NOT NULL,
  `seat_code` varchar(4) NOT NULL,
  `member_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`seat_id`, `screening_id`, `seat_code`, `member_id`) VALUES
(123521, 13, 'D4', 6),
(123522, 13, 'D5', 6),
(123523, 17, 'E6', 6),
(123524, 17, 'E7', 6),
(123525, 17, 'E4', 6),
(123526, 17, 'E5', 6),
(123527, 17, 'F5', 6),
(123528, 17, 'F6', 6),
(123529, 17, 'F7', 6),
(123530, 17, 'F8', 6),
(123531, 17, 'G5', 19),
(123532, 17, 'G6', 19);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `screening_id` int(11) DEFAULT NULL,
  `member_id` int(11) NOT NULL,
  `transactionDateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `total_price` varchar(35) NOT NULL,
  `payment_type` varchar(35) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'Successful',
  `points_earned` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `screening_id`, `member_id`, `transactionDateTime`, `total_price`, `payment_type`, `status`, `points_earned`) VALUES
(51, 13, 6, '2022-04-08 03:44:09', '62', 'Touch n Go eWallet', 'Successful', 100),
(52, 17, 16, '2022-04-10 15:11:48', '70', 'VISA Card', 'Successful', 100),
(53, 17, 16, '2022-04-10 15:11:59', '70', 'Mastercard', 'Successful', 100),
(54, 17, 6, '2022-04-10 15:14:06', '51', 'Mastercard', 'Successful', 100),
(55, 17, 6, '2022-04-10 15:16:10', '40', 'Touch n Go eWallet', 'Successful', 100),
(56, 12, 17, '2022-04-10 15:48:34', '62', 'Touch n Go eWallet', 'Successful', 100),
(57, 12, 18, '2022-04-10 16:08:18', '40', 'Touch n Go eWallet', 'Successful', 100),
(58, 13, 18, '2022-04-10 16:09:45', '30', 'Bank Transfer', 'Successful', 100),
(59, 12, 18, '2022-04-10 16:18:04', '31', 'Mastercard', 'Successful', 100),
(60, 17, 6, '2022-04-11 09:30:09', '70', 'Mastercard', 'Successful', 100),
(61, 17, 19, '2022-04-12 19:52:29', '40', 'Touch n Go eWallet', 'Successful', 100);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `gender`, `dob`) VALUES
(1, 'Assignment', 'Assignment', 'test', 'test@test.com', '1234', 'male', '1997-05-06'),
(2, 'claire', 'C', 'Claire', 'clair@gmail.com', '123', 'female', '2000-03-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`br_id`),
  ADD KEY `Hall Foreign Key` (`hall_id`),
  ADD KEY `Screening Foreign Key` (`screening_id`);

--
-- Indexes for table `hall`
--
ALTER TABLE `hall`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `Foreign Key` (`seat_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `screening`
--
ALTER TABLE `screening`
  ADD PRIMARY KEY (`screening_id`),
  ADD KEY `Movie Foreign Key` (`movie_id`),
  ADD KEY `Branch Foreign Key` (`branch_id`),
  ADD KEY `Halll Foreign Key` (`hall_id`);

--
-- Indexes for table `seat`
--
ALTER TABLE `seat`
  ADD PRIMARY KEY (`seat_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `hall`
--
ALTER TABLE `hall`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `screening`
--
ALTER TABLE `screening`
  MODIFY `screening_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `seat`
--
ALTER TABLE `seat`
  MODIFY `seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123533;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hall`
--
ALTER TABLE `hall`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`seat_id`) REFERENCES `seat` (`seat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
