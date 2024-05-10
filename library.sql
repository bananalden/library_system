-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2024 at 01:51 AM
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
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` varchar(255) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `username`, `password`) VALUES
('21001396500', 'Admin', 'admin', '$2y$10$6cItoy2hra.jhePQ1VcZMOYQHQ4va7W2X1BG/o6tCM9iuTYIOTLZW');

-- --------------------------------------------------------

--
-- Table structure for table `booklist`
--

CREATE TABLE `booklist` (
  `isbn` varchar(255) NOT NULL,
  `bookname` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `yearpublished` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `booklist`
--

INSERT INTO `booklist` (`isbn`, `bookname`, `author`, `category`, `yearpublished`, `status`) VALUES
('9780747548478', 'Holes', 'Louis Sachar', 'Fiction', 2000, 'ONSITE'),
('9781847496447', 'Moby Dick (Evergreens)', 'Herman Melville', 'Fiction', 2018, 'ONSITE'),
('9786214171217', 'Kronika Ekonomiks Grade 9', 'Alfredo A. Lozanta, JR.', 'Non-Fiction', 2018, 'ONSITE'),
('9789719807698', 'Practical Research For Senior High School 2', 'Amadeo Pangilinan Cristobal', 'Non-Fiction', 2017, 'ONSITE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `booklist`
--
ALTER TABLE `booklist`
  ADD PRIMARY KEY (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
