-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2019 at 08:34 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agri`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phoneNumber` bigint(10) NOT NULL,
  `occu` int(1) NOT NULL,
  `dist` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`fname`, `mname`, `lname`, `email`, `phoneNumber`, `occu`, `dist`, `state`, `password`) VALUES
('Aan', 'N', 'Patel', 'aan@gmail.com', 3725582629, 2, 'Vellore', 'Tamil Nadu', '123'),
('Deval', 'N', 'Modi', 'deval@gmail.com', 9277938292, 1, 'Surat', 'Gujarat', '123'),
('Devam', 'Sanjay', 'Sheth', 'devamsheth0806@gmail.com', 7016636683, 4, 'Vellore', 'Tamil Nadu', '12345'),
('Vishva', 'P', 'Patel', 'vishva@gmail.com', 3346236791, 3, 'New Delhi', 'Delhi', '123');

-- --------------------------------------------------------

--
-- Table structure for table `occu`
--

CREATE TABLE `occu` (
  `id` int(1) NOT NULL,
  `occu` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occu`
--

INSERT INTO `occu` (`id`, `occu`) VALUES
(1, 'Farmer'),
(2, 'Govt. Officials'),
(3, 'Agriculture Scientists'),
(4, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `shc`
--

CREATE TABLE `shc` (
  `email` varchar(50) NOT NULL,
  `loc` varchar(50) NOT NULL,
  `sample` int(5) NOT NULL,
  `size` int(10) NOT NULL,
  `date` date NOT NULL,
  `N` decimal(5,0) NOT NULL,
  `P` decimal(5,0) NOT NULL,
  `K` decimal(5,0) NOT NULL,
  `Fe` decimal(5,0) NOT NULL,
  `Cu` decimal(5,0) NOT NULL,
  `B` decimal(5,0) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shc`
--

INSERT INTO `shc` (`email`, `loc`, `sample`, `size`, `date`, `N`, `P`, `K`, `Fe`, `Cu`, `B`, `status`) VALUES
('deval@gmail.com', 'Surat', 12345, 500, '2013-03-03', '12', '12', '29', '18', '17', '20', 'accept');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `phoneNumber` (`phoneNumber`),
  ADD KEY `fk_occu` (`occu`);

--
-- Indexes for table `occu`
--
ALTER TABLE `occu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shc`
--
ALTER TABLE `shc`
  ADD PRIMARY KEY (`sample`),
  ADD KEY `fk_email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_occu` FOREIGN KEY (`occu`) REFERENCES `occu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shc`
--
ALTER TABLE `shc`
  ADD CONSTRAINT `fk_email` FOREIGN KEY (`email`) REFERENCES `account` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
