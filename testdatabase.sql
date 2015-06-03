-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2015 at 08:41 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `dept`
--

CREATE TABLE IF NOT EXISTS `dept` (
  `depno` int(10) NOT NULL,
  `dname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dept`
--

INSERT INTO `dept` (`depno`, `dname`) VALUES
(1, 'cs'),
(2, 'ee'),
(3, 'me');

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE IF NOT EXISTS `emp` (
  `id` int(3) NOT NULL,
  `name` varchar(10) NOT NULL,
  `designation` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `name`, `designation`) VALUES
(101, 'aravind', 'tester'),
(102, 'baradwaj', 'tester'),
(103, 'charan', 'manager'),
(104, 'nandan', 'tester'),
(105, 'gautham', 'tester');

-- --------------------------------------------------------

--
-- Table structure for table `functional`
--

CREATE TABLE IF NOT EXISTS `functional` (
  `id` int(2) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `functional`
--

INSERT INTO `functional` (`id`, `name`) VALUES
(1, 'SIT'),
(2, 'UAT');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(10) NOT NULL,
  `first` varchar(10) NOT NULL,
  `last` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `depno` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `first`, `last`, `email`, `depno`) VALUES
(1, 'aravind', 'swarna', 'aravind.swarna143@gmail.com', 1),
(2, 'prakash', 'madhav', 'prakash@gmail.com', 1),
(3, 'bindhu', 'swarna', 'bindhu@gmail.com', 2),
(4, 'rama', 'swarna', 'ramachandraiah@gmail.com', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pgms`
--

CREATE TABLE IF NOT EXISTS `pgms` (
  `id` int(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `release` int(10) NOT NULL,
  `version` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pgms`
--

INSERT INTO `pgms` (`id`, `name`, `release`, `version`) VALUES
(1, 'java', 1, 11),
(2, 'java', 2, 21),
(3, 'perl', 1, 51),
(4, 'perl', 2, 41),
(5, 'python', 1, 31),
(6, 'python', 3, 61),
(7, 'java', 1, 12),
(8, 'java', 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE IF NOT EXISTS `userlist` (
  `user` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`user`, `password`, `role`) VALUES
('test', 'test', 'Tester');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dept`
--
ALTER TABLE `dept`
  ADD PRIMARY KEY (`depno`), ADD UNIQUE KEY `depno` (`depno`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `functional`
--
ALTER TABLE `functional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`), ADD KEY `depno` (`depno`);

--
-- Indexes for table `pgms`
--
ALTER TABLE `pgms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `functional`
--
ALTER TABLE `functional`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pgms`
--
ALTER TABLE `pgms`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `members`
--
ALTER TABLE `members`
ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`depno`) REFERENCES `dept` (`depno`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
