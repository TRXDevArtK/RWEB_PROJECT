-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 10:56 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `ktp` bigint(20) NOT NULL,
  `id` int(11) NOT NULL,
  `nama` varchar(75) NOT NULL,
  `jk` char(1) NOT NULL,
  `tgl` date NOT NULL,
  `tlp` bigint(12) NOT NULL,
  `email` varchar(254) NOT NULL,
  `verifikasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`ktp`, `id`, `nama`, `jk`, `tgl`, `tlp`, `email`, `verifikasi`) VALUES
(12323, 0, 'aaa', 'P', '1999-02-01', 12323, 'asdsd', 0),
(112233, 1122334455, 'Refaldi Ergian', 'L', '1999-06-07', 85268043434, 'refaldi1700018013@webmail.uad.ac.id', 1),
(123123, 0, 'aku adalah', 'P', '2000-03-02', 12314242, 'androrobot1234567890@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`ktp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
