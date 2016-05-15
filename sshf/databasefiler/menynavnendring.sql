-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13. Mai, 2016 11:18 a.m.
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
-- Tabellstruktur for tabell `menufooter`
--

CREATE TABLE `menufooter` (
  `menufooterno` int(11) NOT NULL,
  `menufootertopic` varchar(200) NOT NULL,
  `menufooterplassering` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `menufooter`
--

INSERT INTO `menufooter` (`menufooterno`, `menufootertopic`, `menufooterplassering`) VALUES
(1, 'Hjem', 'Menu1'),
(2, 'Om SÃ¸rlandet Sykehus HF', 'Menu2'),
(3, 'Om MiljÃ¸sertifisering', 'Menu3'),
(4, 'Dokumenter', 'Menu4'),
(5, 'Kalkulator', 'Menu5'),
(6, 'Graf', 'Menu6'),
(7, 'Kontakt', 'Menu7'),
(8, 'SÃ¸rlandet Sykehus HF\r\nFor Teknologi og E-helse.', 'Footer1'),
(9, 'Kontakt Oss', 'Footer2'),
(10, 'Nyheter', 'Menu8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menufooter`
--
ALTER TABLE `menufooter`
  ADD PRIMARY KEY (`menufooterno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menufooter`
--
ALTER TABLE `menufooter`
  MODIFY `menufooterno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
