-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2016 at 05:02 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sshf`
--

-- --------------------------------------------------------

--
-- Table structure for table `funfacts`
--

CREATE TABLE `funfacts` (
  `tekstno` int(11) NOT NULL,
  `teksttopic` varchar(200) NOT NULL,
  `tekstinfo` text NOT NULL,
  `plassering` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `funfacts`
--

INSERT INTO `funfacts` (`tekstno`, `teksttopic`, `tekstinfo`, `plassering`) VALUES
(1, 'Funfact Pappkrus', 'Visste du at........               ', 'pappkrus'),
(2, 'Funfact kopipapir', 'Visste du at...  test   ', 'kopipapir'),
(3, 'Funfact transport', 'Visste du at... test2    ', 'transport'),
(4, 'Funfact ditt areal', 'Visste du at...tulletest       ', 'ditt_areal'),
(5, 'Funfact sykehusene', 'Visste du at...   test 5  ', 'sykehusene');

-- --------------------------------------------------------

--
-- Table structure for table `graphs`
--

CREATE TABLE `graphs` (
  `papercup_avrg` int(11) NOT NULL,
  `papercup_wish` int(11) NOT NULL,
  `paper_avrg` int(11) NOT NULL,
  `paper_wish` int(11) NOT NULL,
  `transport_avrg` decimal(10,1) NOT NULL,
  `transport_wish` decimal(10,1) NOT NULL,
  `energi_kristiansand` int(11) NOT NULL,
  `energi_flekkefjord` int(11) NOT NULL,
  `energi_arendal` int(11) NOT NULL,
  `energi_sshf_avrg` int(11) NOT NULL,
  `energi_normalforbruk` int(11) NOT NULL,
  `areal_kontor` int(11) NOT NULL,
  `areal_avdeling` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `graphs`
--

INSERT INTO `graphs` (`papercup_avrg`, `papercup_wish`, `paper_avrg`, `paper_wish`, `transport_avrg`, `transport_wish`, `energi_kristiansand`, `energi_flekkefjord`, `energi_arendal`, `energi_sshf_avrg`, `energi_normalforbruk`, `areal_kontor`, `areal_avdeling`) VALUES
(6, 4, 22, 18, '2.0', '1.6', 341, 301, 300, 322, 335, 10, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `funfacts`
--
ALTER TABLE `funfacts`
  ADD PRIMARY KEY (`tekstno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `funfacts`
--
ALTER TABLE `funfacts`
  MODIFY `tekstno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
