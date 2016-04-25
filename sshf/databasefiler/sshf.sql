-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25. Apr, 2016 13:26 p.m.
-- Server-versjon: 10.1.9-MariaDB
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
-- Tabellstruktur for tabell `tekstbokser`
--

CREATE TABLE `tekstbokser` (
  `tekstno` int(11) NOT NULL,
  `teksttopic` varchar(200) NOT NULL,
  `tekstinfo` text NOT NULL,
  `plassering` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `tekstbokser`
--

INSERT INTO `tekstbokser` (`tekstno`, `teksttopic`, `tekstinfo`, `plassering`) VALUES
(2, 'Hejhej', 'asdasdasd', 'energiside');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tekstbokser`
--
ALTER TABLE `tekstbokser`
  ADD PRIMARY KEY (`tekstno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tekstbokser`
--
ALTER TABLE `tekstbokser`
  MODIFY `tekstno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
