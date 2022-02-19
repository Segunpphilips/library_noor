-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 10:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_noor`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_department` int(11) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `book_slug` varchar(100) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_description` mediumtext NOT NULL,
  `personel_email` varchar(100) NOT NULL,
  `book_pdf` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_department`, `book_name`, `book_slug`, `book_title`, `book_description`, `personel_email`, `book_pdf`, `created_at`, `updated_at`) VALUES
(1, 2, 'Noor Takaful Guideline', 'noor-takaful-guideline', 'Noor Takaful Guideline', 'This is our guideline.', 'toheeb.olawale.to23@gmail.com', 'noor-takaful-guideline.pdf', '2022-02-14 13:15:44', '2022-02-14 17:07:26'),
(2, 2, 'Noor Takaful Insurance', 'noor-takaful-insurance', 'Noor Takaful Insurance', 'General Takaful', 'toheeb.olawale.to23@gmail.com', 'noor-takaful-insurance.pdf', '2022-02-14 17:16:16', '2022-02-14 17:16:36'),
(3, 5, 'Noor Takaful Business', 'noor-takaful-business', 'Noor Takaful Business', 'This is the business side of Noor Takaful', 'toheeb.olawale.to23@gmail.com', 'noor-takaful-business.pdf', '2022-02-14 17:19:22', '2022-02-14 18:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `book_upload`
--

CREATE TABLE `book_upload` (
  `book_id` int(11) NOT NULL,
  `book_pdf` varchar(100) NOT NULL,
  `book_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(1, 'Legal'),
(2, 'General Takaful'),
(3, 'Family Takaful'),
(4, 'Marketing'),
(5, 'Finance/Account'),
(6, 'Administrative'),
(7, 'Information Technology'),
(8, 'General Knowledge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_slug` (`book_slug`),
  ADD UNIQUE KEY `book_title` (`book_title`),
  ADD KEY `fk1` (`book_department`);

--
-- Indexes for table `book_upload`
--
ALTER TABLE `book_upload`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `book_name` (`book_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_upload`
--
ALTER TABLE `book_upload`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`book_department`) REFERENCES `departments` (`department_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
