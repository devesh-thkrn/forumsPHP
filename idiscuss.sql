-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2024 at 10:07 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idiscuss`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `created`) VALUES
(1, 'Python', 'Python is a high-level language notable for it\'s use of whitespace.', '2024-02-17 03:10:54'),
(2, 'JavaScript', 'JavaScript, often abbreviated as JS, is a programming language and core technology of the World Wide Web, alongside HTML and CSS.', '2024-02-17 03:12:38'),
(3, 'Django', 'This is a popular Python framework.', '2024-02-18 03:27:42'),
(4, 'Flask', 'This is another very popular Python Framework.', '2024-02-18 03:28:01');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(8) NOT NULL,
  `comment_content` text NOT NULL,
  `thread_id` int(8) NOT NULL,
  `comment_by` int(8) NOT NULL,
  `comment_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES
(1, 'unsaid', 1, 1, '2024-03-18 04:26:17'),
(2, 'dasdasdsadasd', 40, 2, '2024-03-18 19:22:42'),
(3, 'this is another comment', 40, 2, '2024-03-18 19:22:54'),
(4, 'this is another comment', 40, 3, '2024-03-18 19:23:37'),
(5, 'works really well!\r\n', 40, 3, '2024-03-18 19:23:46'),
(6, ';', 41, 3, '2024-03-20 16:28:26'),
(7, ';', 41, 3, '2024-03-20 16:29:12'),
(8, ';', 41, 3, '2024-03-20 16:31:00'),
(9, '&gt;', 41, 3, '2024-03-20 16:31:21'),
(10, '&gt;', 41, 3, '2024-03-20 16:33:56'),
(11, '&gt;', 41, 3, '2024-03-20 16:34:29'),
(12, '&lt;&gt;', 41, 3, '2024-03-20 16:37:54');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES
(41, 'this is another problem', 'lets test it out', 1, 3, '2024-03-18 13:55:05'),
(42, 'this is another problem', 'lets test it out', 1, 3, '2024-03-18 13:56:03'),
(43, 'this is another problem', 'lets test it out', 1, 3, '2024-03-18 13:56:40'),
(44, 'is python an easy language to being learning coding with?', '', 1, 4, '2024-03-20 10:43:34'),
(45, '<u><b>hUe hiefihbsdfb</b>', '', 1, 3, '2024-03-20 10:55:59'),
(46, '&lt;b&gt; trying a xss attack &lt;/b&gt;', '&lt;b&gt;A&lt;/b&gt;', 1, 3, '2024-03-20 11:12:26'),
(47, '&lt;b&gt; trying a xss attack &lt;/b&gt;', '&lt;b&gt;A&lt;/b&gt;', 1, 3, '2024-03-20 12:18:46'),
(48, 'unable to open flask in python', 'im unable to install flask in python', 4, 3, '2024-03-20 20:44:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(8) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `timestamp`) VALUES
(2, '2@2.com', '$2y$10$uyCz6gHZOVMG0HkGq0PlqOBNW1.RuocRVZmPYiF.Qt2eLoxMRnSOy', '2024-03-18 19:08:20'),
(3, '1@1.com', '$2y$10$leewz2UfiTIXHMDYQZltaO3N76uyXDiLuKSxCn117tJtS1.ggPGS.', '2024-03-18 19:23:09'),
(4, 'dev@dev.com', '$2y$10$Ql5kThk9/CurVgakd578v.RNhWAnEt27RhSrl2TanSa63otEJFOL6', '2024-03-20 16:13:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
