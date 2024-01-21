-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 05:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `namabarang` varchar(255) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `idsuplier` int(11) DEFAULT NULL,
  `idpengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `namabarang`, `satuan`, `idsuplier`, `idpengguna`) VALUES
(3, 'Barang1', 'KG', 6011, 1),
(4, 'Barang2', 'gr', 6014, 1),
(5, 'Barang3', 'L', 6014, 1),
(6, 'Barang4', 'KG', 6011, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `idakses` int(11) NOT NULL,
  `namaakses` varchar(255) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`idakses`, `namaakses`, `keterangan`) VALUES
(1, 'Admin', 'Hak akses admin'),
(6, 'User', 'Hak user');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `namapelanggan` varchar(255) NOT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `tanggalpesan` date DEFAULT NULL,
  `idpengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `namapelanggan`, `idbarang`, `qty`, `tanggalpesan`, `idpengguna`) VALUES
(1, 'Udin', 3, 2, '0000-00-00', 1),
(2, 'Asep', 5, 1, '0000-00-00', 1),
(3, 'ituss', 4, 1, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idpembelian` int(11) NOT NULL,
  `jumlahpembelian` int(11) DEFAULT NULL,
  `hargabeli` decimal(10,2) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `idpengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idpembelian`, `jumlahpembelian`, `hargabeli`, `idbarang`, `idpengguna`) VALUES
(2, 2, '4000.00', 3, NULL),
(3, 25, '50000.00', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `namapengguna` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namadepan` varchar(255) NOT NULL,
  `namabelakang` varchar(255) NOT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `idakses` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `namapengguna`, `password`, `namadepan`, `namabelakang`, `nohp`, `alamat`, `idakses`) VALUES
(1, 'test', 'test', 'asfa', 'fasf', '5353', 'asfasfas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `idpenjualan` int(11) NOT NULL,
  `jumlahpenjualan` int(11) DEFAULT NULL,
  `hargajual` decimal(10,2) DEFAULT NULL,
  `idpelanggan` int(11) DEFAULT NULL,
  `idpengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`idpenjualan`, `jumlahpenjualan`, `hargajual`, `idpelanggan`, `idpengguna`) VALUES
(1, 10000, '5000.00', 1, 1),
(2, 70000, '70000.00', 2, 1),
(3, 5000, '5000.00', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `idsuplier` int(11) NOT NULL,
  `namasuplier` varchar(255) NOT NULL,
  `alamatsuplier` varchar(255) DEFAULT NULL,
  `idpengguna` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`idsuplier`, `namasuplier`, `alamatsuplier`, `idpengguna`) VALUES
(6011, 'Supplier1', 'Jl. Sudirman No.1', 1),
(6012, 'Supplier2', 'Jl. Merdeka No.2 ', 1),
(6013, 'Supplier3', 'Jl. Pahlawan No.3', 1),
(6014, 'Supplier4', 'Jl. Asia Afrika No.4', 1),
(6015, 'Supplier5', 'Jl. Gatot Subroto No.5', 1),
(6016, 'Supplier6', 'Jl. Thamrin No.6', 1),
(6017, 'Supplier7', 'Jl. Senayan No.7', 1),
(6018, 'Supplier8', 'Jl. Ahmad Yani No.8', 1),
(6019, 'Supplier9', 'Jl. Diponegoro No.9', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `idsuplier` (`idsuplier`),
  ADD KEY `idpengguna` (`idpengguna`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`idakses`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`),
  ADD KEY `idbarang` (`idbarang`),
  ADD KEY `idpengguna` (`idpengguna`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idpembelian`),
  ADD KEY `idbarang` (`idbarang`),
  ADD KEY `idpengguna` (`idpengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`),
  ADD KEY `idakses` (`idakses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idpenjualan`),
  ADD KEY `idpelanggan` (`idpelanggan`),
  ADD KEY `idpengguna` (`idpengguna`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`idsuplier`),
  ADD KEY `idpengguna` (`idpengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `idakses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `idpenjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `idsuplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6020;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`idsuplier`) REFERENCES `suplier` (`idsuplier`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`),
  ADD CONSTRAINT `pelanggan_ibfk_2` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idbarang`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`idakses`) REFERENCES `hakakses` (`idakses`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`idpelanggan`) REFERENCES `pelanggan` (`idpelanggan`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`);

--
-- Constraints for table `suplier`
--
ALTER TABLE `suplier`
  ADD CONSTRAINT `suplier_ibfk_1` FOREIGN KEY (`idpengguna`) REFERENCES `pengguna` (`idpengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
