-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2020 at 03:12 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tabungan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `user`, `password`) VALUES
(6, 'user1', 'sitasis'),
(7, 'admin', 'sitasis');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `tingkat` enum('10','11','12') NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tingkat`, `nama_jurusan`) VALUES
(1, '10', 'RPL'),
(2, '10', 'TKJ'),
(3, '10', 'TAV'),
(4, '10', 'ATPH');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jenis_kelamin` enum('l','p') NOT NULL,
  `status` enum('y','t') NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `saldo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `ttl`, `kelas`, `jenis_kelamin`, `status`, `no_hp`, `saldo`) VALUES
(3, '001', 'Ade Trimuyani', '-', '1', 'p', 'y', '-', '121000'),
(4, '002', 'Agus Supriyadi Rohman', 'Ciledug, 11-10-1999', '1', 'l', '', '-', '10000'),
(6, '003', 'Akbar Fauzi', '-', '1', 'l', 'y', '-', '0'),
(7, '004', 'Alfi Lusiana Rahmawati', '-', '1', 'p', 'y', '-', '2000'),
(8, '005', 'Annisa Sopia Nurdianti', '-', '1', 'p', 'y', '-', '0'),
(9, '006', 'Appriliya Afni', '-', '1', 'p', 'y', '-', '0'),
(10, '007', 'Dea Indriani', '-', '1', 'p', 'y', '-', '0'),
(11, '008', 'Dede Kurnia', '-', '1', 'p', 'y', '-', '0'),
(12, '009', 'Deri Permana', '-', '1', 'l', 'y', '-', '0'),
(13, '010', 'Dhea Tri Astuti', '-', '1', 'p', 'y', '-', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_menabung` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `proses` enum('masuk','keluar') NOT NULL,
  `nilai` varchar(50) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_menabung`, `nis`, `proses`, `nilai`, `tanggal`) VALUES
(1, '01', 'masuk', '10000', '2018-03-23'),
(2, '004', 'masuk', '2000', '2018-03-23'),
(3, '010', 'masuk', '10000', '2018-04-13'),
(4, '002', 'masuk', '10000', '2018-04-29'),
(5, '', 'masuk', '', '2018-05-31'),
(6, '001', 'masuk', '1000', '2018-05-31'),
(7, '010', 'masuk', '5000', '2018-06-02'),
(8, '001', 'masuk', '10000', '2018-09-25'),
(9, '001', 'masuk', '10000', '2018-09-29'),
(10, '001', 'masuk', '5000', '2018-10-13'),
(11, '001', 'masuk', '10000', '2018-10-26'),
(12, '001', 'masuk', '5000', '2019-04-09'),
(13, '001', 'masuk', '5000', '2019-04-09'),
(14, '001', 'masuk', '5000', '2019-06-30'),
(15, '001', 'keluar', '5000', '2019-06-30'),
(16, '001', 'masuk', '5000', '2019-12-10'),
(17, '001', 'masuk', '10000', '2019-12-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_menabung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_menabung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
