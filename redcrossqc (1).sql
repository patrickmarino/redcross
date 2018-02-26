-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2018 at 08:29 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `redcrossqc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE IF NOT EXISTS `volunteers` (
  `volunteer_id` int(11) NOT NULL,
  `volunteer_type` varchar(256) NOT NULL,
  `last_name` varchar(256) NOT NULL,
  `first_name` varchar(256) NOT NULL,
  `middle_name` varchar(256) NOT NULL,
  `full_name` varchar(256) NOT NULL,
  `blood_type` varchar(25) NOT NULL,
  `profession` varchar(256) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` varchar(256) NOT NULL,
  `birthdate` date NOT NULL,
  `maab` date NOT NULL,
  `street` varchar(256) NOT NULL,
  `barangay` varchar(256) NOT NULL,
  `district_name` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `latitude` varchar(256) NOT NULL,
  `longitude` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`volunteer_id`, `volunteer_type`, `last_name`, `first_name`, `middle_name`, `full_name`, `blood_type`, `profession`, `age`, `contact_number`, `birthdate`, `maab`, `street`, `barangay`, `district_name`, `city`, `latitude`, `longitude`, `status`) VALUES
(55, 'green army,red army', 'pineda', '21', '32', 'pineda', 'AB+', 'itada', 123456, 'contact123', '2018-02-01', '2018-02-28', 'tandang sora', 'tandang sora', 'tandang sora', 'quezon', '14.5644367', '121.060407', 'active'),
(58, '', 'rizal high school', '', '', 'rizal high school', 'A-', '', 0, '', '0000-00-00', '0000-00-00', 'delapaz', 'caniogan', 'pag-asa', 'pasig', '14.573222', '121.080886', 'active'),
(59, 'green army,red army', 'Bagong Ilog', '21', '32', 'Bagong Ilog', 'AB+', 'itada', 123456, 'contact123', '2018-02-01', '2018-02-28', 'tandang sora', 'tandang sora', 'tandang sora', 'quezon', '14.5652838', '121.0607421', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD PRIMARY KEY (`volunteer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `volunteers`
--
ALTER TABLE `volunteers`
  MODIFY `volunteer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
