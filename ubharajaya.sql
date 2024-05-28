-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 09:06 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubharajaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daftar`
--

CREATE TABLE `tbl_daftar` (
  `id_daftar` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlp` varchar(30) NOT NULL,
  `semester` int(30) NOT NULL,
  `ipk_akhir` double NOT NULL,
  `nama_beasiswa` varchar(30) NOT NULL,
  `berkas` varchar(30) NOT NULL,
  `hasil` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_daftar`
--

INSERT INTO `tbl_daftar` (`id_daftar`, `nama`, `email`, `no_tlp`, `semester`, `ipk_akhir`, `nama_beasiswa`, `berkas`, `hasil`) VALUES
('BEA001', 'vera', 'vera@gmail.com', '1234567', 5, 3.36, 'Beasiswa Akademik', 'BEA001.pdf', 0),
('BEA002', 'vera', 'vera@gmail.com', '089637445787', 3, 3.42, 'Beasiswa Non-Akademik', '-', 0),
('BEA003', 'vera', 'vera@gmail.com', '089637445787', 3, 3.67, 'Beasiswa Akademik', 'BEA003.pdf', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_daftar`
--
ALTER TABLE `tbl_daftar`
  ADD PRIMARY KEY (`id_daftar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
