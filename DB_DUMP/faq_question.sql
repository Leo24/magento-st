-- phpMyAdmin SQL Dump
-- version 4.6.4deb1+deb.cihar.com~xenial.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2016 at 11:38 AM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magento`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq_question`
--

CREATE TABLE `faq_question` (
  `id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `creation_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` smallint(6) NOT NULL,
  `frontend` smallint(6) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faq_question`
--

INSERT INTO `faq_question` (`id`, `theme`, `question`, `answer`, `creation_time`, `update_time`, `status`, `frontend`, `name`, `email`) VALUES
(2, 'title 256', 'question 1', '', '2016-11-15 18:25:36', '2016-11-11 13:08:12', 1, 1, 'surname', 'emai@test.com'),
(3, 'Dog', 'who is cat', '', '2016-11-15 16:31:08', '2016-11-11 13:09:56', 0, 0, 'nickname', 'mail@t.co'),
(4, 'Cat', 'who let the dog out', '', '2016-11-15 18:25:53', '2016-11-11 13:15:57', 0, 1, 'just nick', 'oneMoreMail@go.co'),
(5, 'Theme', 'Question', '', '2016-11-15 18:25:47', '2016-11-11 13:16:39', 1, 0, 'leo', 'leo2410@i.ua'),
(6, 'One more theme', 'Question 256', '', '2016-11-11 13:17:24', '2016-11-11 13:17:24', 0, 0, 'leo2410', 'leo2410ua@i.ua'),
(7, 'And more theme', 'Question 256', 'Answer', '2016-11-15 18:25:43', '2016-11-11 13:19:58', 1, 1, 'leo2410', 'leo2410ua@i.ua'),
(8, 'Name Theme', 'one more question', '', '2016-11-15 18:26:14', '2016-11-15 11:16:08', 1, 1, 'Name', 'name@mail.com'),
(9, 'Leo\'s question', 'Spring is in the air)', '', '2016-11-16 08:26:48', '2016-11-16 08:26:48', 0, 0, 'Leonid', 'leo2410ua@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq_question`
--
ALTER TABLE `faq_question`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq_question`
--
ALTER TABLE `faq_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
