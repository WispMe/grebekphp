-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 03, 2018 at 02:13 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grebekilmu`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(255) NOT NULL,
  `nama_buku` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `nama_buku`, `penerbit`, `tahun_terbit`, `jenis`, `quantity`) VALUES
(1, 'Kumpulan Soal SBMPTN 500 Miliar', 'The Jukutz', '2077', 'SBMPTN', 3),
(2, 'THE KING SBMPTN SAINTEK', 'Forum Tentor Indonesia', '2018', 'SBMPTN', 2),
(3, 'Uzumaki vs Boruto', 'Shonen Jump', '1998', 'Wew', 5),
(4, 'lkweflwek', 'lwkefnoewf', '012380', 'osiehgowie', 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `ID` int(20) NOT NULL,
  `level` int(255) DEFAULT NULL,
  `namabelakang` varchar(255) DEFAULT NULL,
  `namadepan` varchar(255) DEFAULT NULL,
  `peminatan` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nohp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID`, `level`, `namabelakang`, `namadepan`, `peminatan`, `password`, `email`, `nohp`) VALUES
(22, 1, NULL, NULL, '', '$2y$10$prmzIYYo7Aw6m66eidFaYOw0tazA9eEKivbDz/Kwznvqlh7FLRyXi', 'admin', ''),
(27, 0, 'Faiz', 'Khatami', 'Saintek', '$2y$10$a0KXUugIbavhV7IXo79m7uLCtFOZ1g7nCgcudLVzJjCwl6KI5nv4O', 'faizfak@gmail.com', '08992233101'),
(28, 0, 'Faiz', 'Azhari', 'Saintek', '$2y$10$Rp.CpozbZtngmpkSvqGF8ur9KxZTELUatN.1VGFudX.ITpBY5yTbi', 'ea@gmail.com', '00000'),
(29, 0, 'adil', 'ea', 'Saintek', '$2y$10$3Vm8LZBZlehYB0ynB5OykuEQS7NI9mOQa6QdFV12fzD.E.SXegT4m', 'adil@gmail.com', '345345');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `order_nama` varchar(255) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `order_nama`, `id_buku`, `tanggal`, `status`) VALUES
(1, 'adil ea', 3, '2018-12-03', 0),
(2, 'adil ea', 1, '2018-12-03', 0),
(3, 'adil ea', 2, '2018-12-03', 0),
(4, 'adil ea', 4, '2018-12-03', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `INDEX` (`email`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
