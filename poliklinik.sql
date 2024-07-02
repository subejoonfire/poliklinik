-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 02:51 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `kandungan`
--

CREATE TABLE `kandungan` (
  `idkandungan` int(11) NOT NULL,
  `kandungan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kandungan`
--

INSERT INTO `kandungan` (`idkandungan`, `kandungan`) VALUES
(1, 'Dosa'),
(3, 'Pahalaaa');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `hari_mulai` varchar(20) NOT NULL,
  `jam_mulai` time NOT NULL,
  `hari_berakhir` varchar(20) NOT NULL,
  `jam_berakhir` time NOT NULL,
  `jenis_poli` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `hari_mulai`, `jam_mulai`, `hari_berakhir`, `jam_berakhir`, `jenis_poli`) VALUES
(5, 'Senin', '08:00:00', 'Jumat', '17:00:00', 'Poli Umum'),
(6, 'Senin', '08:00:00', 'Kamis', '17:00:00', 'Poli Gigi');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(100) NOT NULL,
  `idkandungan` int(11) NOT NULL,
  `namaobat` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `idkandungan`, `namaobat`, `satuan`) VALUES
('22KKII', 3, 'Bodrex', 'Keping'),
('92_kkKJDS', 3, 'Panadol', 'Tablet'),
('KJK090', 1, 'Zinettt', 'Keping');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `id_keuangan` int(11) DEFAULT NULL,
  `id_obat` int(11) NOT NULL,
  `tgl_pemasukan` date DEFAULT NULL,
  `jum_pemasukan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `id_keuangan`, `id_obat`, `tgl_pemasukan`, `jum_pemasukan`) VALUES
(9, 5, 1, '0232-03-12', 22),
(11, 6, 1, '2132-03-21', 21321);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `id_keuangan` int(11) DEFAULT NULL,
  `tgl_pengeluaran` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jum_pengeluaran` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `id_keuangan`, `tgl_pengeluaran`, `keterangan`, `jum_pengeluaran`) VALUES
(1, 6, '1223-03-21', 'Cabut Gigi', 213);

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `idriwayat` int(11) NOT NULL,
  `idstok` int(11) DEFAULT NULL,
  `kode_obat` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `suplier` varchar(50) DEFAULT NULL,
  `produsen` varchar(50) DEFAULT NULL,
  `klasifikasi` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`idriwayat`, `idstok`, `kode_obat`, `tanggal`, `keterangan`, `jumlah`, `suplier`, `produsen`, `klasifikasi`, `harga`, `total`) VALUES
(6, 6, 'KJK090', '2024-07-01', 'Masuk', 20, 'Hamim', 'Haji Isam', 'Obat', 10000, 200000),
(7, 6, 'KJK090', '2024-07-01', 'Keluar', 20, 'Hamim', 'Haji ', 'Obat', 20039, 400780),
(8, 6, 'KJK090', '2024-07-01', 'Masuk', 100, 'safd', 'asdf', 'asdf', 321, 32100),
(9, 6, 'KJK090', '2024-07-01', 'Keluar', 12, NULL, NULL, NULL, NULL, NULL),
(10, 6, 'KJK090', '2024-07-01', 'Keluar', 11, NULL, NULL, NULL, NULL, NULL),
(11, 6, 'KJK090', '2024-07-01', 'Keluar', 15, NULL, NULL, NULL, NULL, NULL),
(12, 6, 'KJK090', '2024-07-01', 'Masuk', 10, 'sdaf', 'asfd', 'adsf', 10000, 100000),
(14, 7, '22KKII', '2024-07-01', 'Masuk', 10, 'Hamim', 'Osyad', 'Dalam Negeri', 10000, 100000),
(15, 7, '22KKII', '2024-07-01', 'Masuk', 10, 'Hamim', 'Osyad', 'Dalam Negeri', 10000, 100000),
(18, 10, '92_kkKJDS', '2024-07-01', 'Masuk', 50, 'Angin', 'Kipas', 'Dalam Negeri', 10000, 500000),
(19, 10, '92_kkKJDS', '2024-07-01', 'Keluar', 40, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saldo`
--

CREATE TABLE `saldo` (
  `id_saldo` int(11) NOT NULL,
  `id_keuangan` int(11) DEFAULT NULL,
  `tgl_saldo` date DEFAULT NULL,
  `jum_saldo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `id_keuangan`, `tgl_saldo`, `jum_saldo`) VALUES
(1, 5, '2012-03-08', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `idstok` int(11) NOT NULL,
  `kode_obat` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`idstok`, `kode_obat`, `stok`) VALUES
(6, 'KJK090', 80),
(7, '22KKII', 20),
(9, 'PNDSAF9', 100),
(10, '92_kkKJDS', 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(80) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(225) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `no_telepon`, `role`) VALUES
(1, 'arip', 'admin', 'admin', '08343526', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kandungan`
--
ALTER TABLE `kandungan`
  ADD PRIMARY KEY (`idkandungan`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `id_jenis` (`idkandungan`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`),
  ADD KEY `id_keuangan` (`id_keuangan`),
  ADD KEY `pemasukan_ibfk_1` (`id_obat`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`),
  ADD KEY `id_keuangan` (`id_keuangan`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`idriwayat`),
  ADD KEY `idstok` (`idstok`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`id_saldo`),
  ADD KEY `id_keuangan` (`id_keuangan`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`idstok`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kandungan`
--
ALTER TABLE `kandungan`
  MODIFY `idkandungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `idriwayat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `id_saldo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `idstok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`idkandungan`) REFERENCES `kandungan` (`idkandungan`);

--
-- Constraints for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD CONSTRAINT `pemasukan_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `kandungan` (`idkandungan`);

--
-- Constraints for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`idstok`) REFERENCES `stok` (`idstok`),
  ADD CONSTRAINT `riwayat_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
