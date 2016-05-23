-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23. Mai, 2016 11:54 a.m.
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
-- Tabellstruktur for tabell `legend`
--

CREATE TABLE `legend` (
  `tabell` varchar(100) NOT NULL,
  `legend1` text NOT NULL,
  `legend2` text NOT NULL,
  `legend3` text NOT NULL,
  `legend4` text NOT NULL,
  `legend5` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `legend`
--

INSERT INTO `legend` (`tabell`, `legend1`, `legend2`, `legend3`, `legend4`, `legend5`) VALUES
('Forbruk Engangsartikler - Pappkrus', 'Ditt forbruk', 'Gjennomsnittet', 'MÃ¥let vÃ¥rt', '', ''),
('Forbruk Engangsartikler - Kopipapir', 'Ditt forbruk', 'Gjennomsnittet', 'MÃ¥let vÃ¥rt', '', ''),
('Transport - Kilometer reist i tjenestetid', 'Ditt forbruk', 'Gjennomsnittet', 'MÃ¥let vÃ¥rt', '', ''),
('Energi - Energiforbruk ditt areal - Kristiansand', 'Ditt forbruk', 'Gjennomsnittet for SSHF', 'Etter standard/normalforbruk', '', ''),
('Energi - Energiforbruk ditt areal - Flekkefjord', 'Ditt forbruk', 'Gjennomsnittet for SSHF', 'Etter standard/normalforbruk', '', ''),
('Energi - Energiforbruk ditt areal - Arendal', 'Ditt forbruk', 'Gjennomsnittet for SSHF', 'Etter standard/normalforbruk', '', ''),
('Energi - Energiforbruk per lokasjon - kontor', 'Flekkefjord Sykehus', 'Kristiansand Sykehus', 'Arendal Sykehus', 'SSHF gjennomsnitt', 'Antatt normalforbruk sykehus'),
('Energi - Energiforbruk per lokasjon - Avdeling', 'Flekkefjord Sykehus', 'Kristiansand Sykehus', 'Arendal Sykehus', 'SSHF gjennomsnitt', 'Antatt normalforbruk sykehus');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
