-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2026 at 06:32 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasarraya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userid` int(1) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1:Admin, 2:Driver'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`userid`, `username`, `password`, `nama`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin Pasar Raya', 1),
(2, 'driver', '8b6a9be0146b82a99ef402167e3e865c89bf2f9b', 'Driver Pasar Raya', 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `promo` varchar(5) NOT NULL,
  `qty_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_transaksi`, `id_produk`, `nama_produk`, `harga_produk`, `promo`, `qty_produk`) VALUES
(15, 101, 'Kacang Buncis', 100000, '10', 2),
(15, 103, 'Cabai Merah', 20000, '45', 4),
(15, 105, 'Bayam', 10000, '30', 3),
(15, 106, 'Paprika', 30000, '50', 7),
(16, 106, 'Paprika', 30000, '50', 6),
(17, 101, 'Kacang Buncis', 10000, 'ya', 5),
(17, 103, 'Cabai Merah', 15000, 'ya', 4),
(17, 106, 'Paprika', 30000, 'tidak', 3);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `qty_produk` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `qty_produk`, `id_produk`, `id_pelanggan`) VALUES
(5, 7, 72, 6),
(9, 3, 71, 6),
(13, 2, 70, 6),
(14, 1, 68, 6),
(15, 1, 72, 7);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `nomor_telp` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama_pelanggan`, `nomor_telp`, `password`) VALUES
(103, 'Pelanggan Lama', '081368667104', 'pelangganlama'),
(106, 'Pelanggan Baru', '081277889910', 'pelangganbaru'),
(112, 'R.Valentino', '081368667104', 'ramayandra12');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `berat_stok_produk` varchar(5) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `satuan_harga_produk` varchar(5) NOT NULL,
  `tentang_produk` text NOT NULL,
  `img` text NOT NULL,
  `promo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `stok_produk`, `berat_stok_produk`, `harga_produk`, `satuan_harga_produk`, `tentang_produk`, `img`, `promo`) VALUES
(101, 'Kacang Buncis', 9, 'Kg', 10000, 'Kg', 'Kacang buncis segar', 'kacang.png', '10'),
(102, 'Bawang Bombay', 30, 'Kg', 35000, 'gram', '                                                Bawang Bombay segar                                                                                                                                                                                                                         ', 'bawang_merah.png', '40'),
(103, 'Cabai Merah', 25, 'Kg', 15000, 'Gram', '                                                Cabai Merah murah mantap                                            ', 'cabai.png', '30'),
(104, 'Bawang Merah', 50, 'Kg', 14000, 'Ons', 'Deskripsi \r\nBawang Merah 250 gr (25-30 pcs) \r\nProduk bervariasi di 225-275 gr (tergantung hasil panen) \r\nBawang merah merupakan alah satu bahan utama dalam membuat bumbu masak. Bawang merah memberikan wangi serta rasa yang kaya dalam sebuah makanan. Bawang merah juga memiliki kandungan vitamin C, serat, dan kalium. \r\n\r\nKemasan \r\nBawang merah dikemas dalam polynet', 'bawang_merah.png', '50'),
(105, 'Bayam', 50, 'Ons', 10000, 'Gram', 'Bayam 250 gr (25-30 pcs) \r\nProduk bervariasi di 225-275 gr (tergantung hasil panen) \r\nBayam merupakan alah satu bahan utama dalam membuat bumbu masak. Bawang merah memberikan wangi serta rasa yang kaya dalam sebuah makanan. Bayam juga memiliki kandungan vitamin C, serat, dan kalium.                                           ', 'kacang.png', '30'),
(106, 'Paprika', 14, 'Kg', 30000, 'Kg', 'Paprika pedas mantap', 'bawang_putih.png', '50'),
(109, 'Bawang Putih', 30, 'kg', 19000, 'Ons', 'Bawang putih murah banyak khasiat', 'bawang_putih.png', '60'),
(111, 'Bansai', 50, 'Ons', 22000, 'ons', 'bansai mantap', 'SKCK_Digital.jpg', '30');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `nama_penerima` varchar(30) NOT NULL,
  `nomor_wa` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'Di proses, Di antarkan, Selesai',
  `tgl_transaksi` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id`, `nama_pelanggan`, `nama_penerima`, `nomor_wa`, `alamat`, `status`, `tgl_transaksi`) VALUES
(15, 103, 'Pelanggan Lama', 'Defrianda', '081278902256', 'gang jaya wijaya parit padang', 'Selesai', '2022-04-16'),
(16, 106, 'Pelanggan Baru', 'Siska', '085896869306', 'pangkal pinang', 'Selesai', '2022-03-15'),
(17, 112, 'R.Valentino', 'Backen', '0877827892', 'Bauer', 'Di Proses', '2026-07-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_transaksi`,`id_produk`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `userid` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
