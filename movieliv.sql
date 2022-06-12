-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 03:35 PM
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
-- Database: `movieliv`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `c_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`c_id`, `c_title`) VALUES
(1, 'Action'),
(2, 'Sci-Fi'),
(3, 'Romantic'),
(4, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `p_id` int(11) NOT NULL,
  `p_title` varchar(100) NOT NULL,
  `p_desc` varchar(255) NOT NULL,
  `p_keywords` varchar(255) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`p_id`, `p_title`, `p_desc`, `p_keywords`, `c_id`, `p_image`, `date`, `status`) VALUES
(9, 'Kal Ho Na Ho', 'Naina, a girl living a dreary life, finds a new meaning to her life when she meets Aman. Even though she loves him, Aman claims to be a married man and convinces Rohit, her friend, to woo her.', 'kal,ho,na,ho', 3, 'kal.jpg', '2022-06-12 02:54:42', 'true'),
(10, 'The Royal Treatment', 'New York hairdresser Izzy seizes the chance to work at the wedding of a charming prince. When sparks start to fly between the two of them, love and duty are put to the test as the time of the wedding draws closer', 'the,royal,treatment', 3, 'royal.jpg', '2022-06-12 02:57:57', 'true'),
(11, 'Twilight', 'When Bella Swan relocates to Forks, Washington, to live with her father, she meets a mysterious boy, Edward Cullen, and gets drawn to him. Later, she discovers that he is a vampire.', 'twi,light,twilight', 4, 'twilight.jpg', '2022-06-12 02:59:34', 'true'),
(12, 'After We Collided', 'Tessa finds herself struggling with her complicated relationship with Hardin; she faces a dilemma that could change their lives forever.', 'after,we,collided', 3, 'after.jpg', '2022-06-12 03:01:03', 'true'),
(13, 'The Conjuring', 'The Perron family moves into a farmhouse where they experience paranormal phenomena. They consult demonologists, Ed and Lorraine Warren, to help them get rid of the evil entity haunting them.', 'the,conjuring', 4, 'conjuring.jpg', '2022-06-12 03:01:51', 'true'),
(14, 'Gone Girl', 'Nick Dunne discovers that the entire media focus has shifted on him when his wife, Amy Dunne, mysteriously disappears on the day of their fifth wedding anniversary.', 'gone,girl', 1, 'gone.jpg', '2022-06-12 03:02:51', 'true'),
(15, 'Bahubali', 'In the kingdom of Mahishmati, Shivudu falls in love with a young warrior woman. While trying to woo her, he learns about the conflict-ridden past of his family and his true legacy.', 'bahu,bali', 1, 'bahubali.jpg', '2022-06-12 03:03:30', 'true'),
(16, 'The Adam Project', 'After accidentally crash-landing in 2022, time-traveling fighter pilot Adam Reed teams up with his 12-year-old self for a mission to save the future.', 'the,adam,project', 2, 'adam.jpg', '2022-06-12 03:04:17', 'true'),
(18, 'Annabelle', 'Annabelle is a 2014 American supernatural horror film directed by John R. Leonetti, written by Gary Dauberman and produced by Peter Safran and James Wan.', 'anna,belle', 4, 'annabelle.jpg', '2022-06-12 03:09:56', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `p_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`p_id`, `ip_address`, `quantity`) VALUES
(9, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_ip`) VALUES
(1, 'muskang352', 'muskang352@gmail.com', 'muskan', '::1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
