-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 10:27 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wtprojectdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `ID` int(11) NOT NULL,
  `USERNAME` text NOT NULL,
  `PASSWORD` text NOT NULL,
  `FIRSTNAME` text NOT NULL,
  `LASTNAME` text NOT NULL,
  `EMAIL` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`ID`, `USERNAME`, `PASSWORD`, `FIRSTNAME`, `LASTNAME`, `EMAIL`) VALUES
(1, 'admin', 'admin', 'Samin', 'Yaser', 'saminyaserwork@gmail.com'),
(2, 'test', '1', 'ftest', 'ltest', 'test@email');

-- --------------------------------------------------------

--
-- Table structure for table `misc`
--

CREATE TABLE `misc` (
  `ID` int(11) NOT NULL,
  `USERNAME` text NOT NULL,
  `HOUSE` int(11) NOT NULL,
  `STREET` text NOT NULL,
  `CITY` text NOT NULL,
  `HASCARD` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `misc`
--

INSERT INTO `misc` (`ID`, `USERNAME`, `HOUSE`, `STREET`, `CITY`, `HASCARD`) VALUES
(15, 'admin', 11, 'abc', 'Dhaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user-crypto`
--

CREATE TABLE `user-crypto` (
  `ID` int(11) NOT NULL,
  `USERNAME` text NOT NULL,
  `BALANCE` double NOT NULL,
  `BTC` double NOT NULL,
  `ETH` double NOT NULL,
  `XRP` double NOT NULL,
  `LTC` double NOT NULL,
  `BCH` double NOT NULL,
  `DOGE` double NOT NULL,
  `XMR` double NOT NULL,
  `ADA` double NOT NULL,
  `DOT` double NOT NULL,
  `USDT` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user-crypto`
--

INSERT INTO `user-crypto` (`ID`, `USERNAME`, `BALANCE`, `BTC`, `ETH`, `XRP`, `LTC`, `BCH`, `DOGE`, `XMR`, `ADA`, `DOT`, `USDT`) VALUES
(1, 'admin', 26644.060943338, 0.003, 0, 0, 0, 0, 0.008, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `misc`
--
ALTER TABLE `misc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user-crypto`
--
ALTER TABLE `user-crypto`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `misc`
--
ALTER TABLE `misc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user-crypto`
--
ALTER TABLE `user-crypto`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
