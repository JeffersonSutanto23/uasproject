-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2024 at 09:06 AM
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
-- Database: `databaseprojectdes`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id_administrator` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `katasandi` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id_administrator`, `username`, `katasandi`, `nama_lengkap`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Jefferson Sutanto');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(10, 'Meteran'),
(11, 'Keran Air'),
(12, 'Bola Lampu'),
(14, 'Sambungan Pipa'),
(15, 'cutter'),
(16, 'Kuas'),
(17, 'Peralatan Dapur & Kamar Mandi');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(11) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  `password_pelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `email_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`, `password_pelanggan`) VALUES
(4, 'budi', 'budi77@gmail.com', '08120933903', 'jalan damai no 20, Medan Denai', 'budiganteng'),
(5, 'Adit', 'adit5@gmail.com', '08127374993', 'jalan aman no 30, Medan Kota', 'aditkeren'),
(7, 'Calvin', 'calvin88@gmail.com', '08136722087', 'Jalan Pahlawan No 77, Medan Barat', 'calvin5'),
(8, 'Andi', 'andi9@gmail.com', '08136655789', 'Jalan Bahagia No 88 , Medan Area', 'andi10'),
(9, 'Kevin', 'kevin9@gmail.com', '08123344667', 'jalan amplop no 5, Medan Amplas', 'kevin77'),
(10, 'Hansen', 'hansencnm40@gmail.com', '08134455667', 'jalan garuda no 3,medan area', 'hansen40'),
(11, 'Afung', 'afung71@gmail.com', '08126998880', 'Jl. Apel, Pontianak', 'afunghensem'),
(12, 'Daniel Alvin', 'danielalvinn@gmail.com', '08134455673', 'Jalan Angkasa no 99, Jakarta', 'daniel4');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`) VALUES
(7, 20, 'Afung', 'bca', 316000, '2024-04-19'),
(8, 21, 'Afung', 'bca', 54000, '2024-04-19'),
(9, 22, 'Afung', 'bca', 87000, '2024-04-21'),
(13, 23, 'Afung', 'bca', 68000, '2024-04-21'),
(14, 24, 'Afung', 'mandiri', 51000, '2024-04-21'),
(15, 22, 'Afung', 'mandiri', 87000, '2024-04-21'),
(16, 22, 'Afung', 'bca', 87000, '2024-04-21'),
(17, 25, 'Hansen', 'bca', 79000, '2024-04-24'),
(18, 26, 'Hansen', 'bca', 219000, '2024-04-24'),
(19, 26, 'Hansen', 'bca', 219000, '2024-04-24'),
(20, 27, 'Daniel Alvin', 'bni', 76000, '2024-04-24'),
(21, 27, 'Daniel Alvin', 'bri', 76000, '2024-04-24');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `total_berat` int(11) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `distrik` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `ekspedisi` varchar(255) NOT NULL,
  `paket` varchar(255) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `estimasi` varchar(255) NOT NULL,
  `status_pembelian` varchar(255) NOT NULL DEFAULT 'Pending',
  `resi_pengiriman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `alamat`, `total_berat`, `provinsi`, `distrik`, `tipe`, `kode_pos`, `ekspedisi`, `paket`, `ongkir`, `estimasi`, `status_pembelian`, `resi_pengiriman`) VALUES
(20, 11, '2024-04-19', 316000, 'Jl. Apel, Pontianak', 200, 'Kalimantan Barat', 'Pontianak', 'Kota', '78112', 'tiki', 'ECO', 36000, '4', 'pembayaran dikonfirmasi', 'PPP888'),
(21, 11, '2024-04-19', 54000, 'Jl. Apel, Pontianak', 1000, 'Kalimantan Barat', 'Pontianak', 'Kota', '78112', 'tiki', 'ECO', 36000, '4', 'barang dikirim', 'RRQ444'),
(22, 11, '2024-04-21', 87000, 'Jl. Apel, Pontianak', 200, 'Kalimantan Barat', 'Pontianak', 'Kota', '78112', 'jne', 'OKE', 42000, '4-5', 'pembayaran dikonfirmasi', 'AAA666'),
(23, 11, '2024-04-21', 68000, 'Jl. Apel, Pontianak', 50, 'Kalimantan Barat', 'Pontianak', 'Kota', '78112', 'tiki', 'REG', 38000, '2', 'pembayaran dikonfirmasi', 'PPP444'),
(24, 11, '2024-04-21', 51000, 'Jl. Apel,Pontianak', 100, 'Kalimantan Barat', 'Pontianak', 'Kota', '78112', 'tiki', 'ECO', 36000, '4', 'barang dikirim', 'JS7799'),
(26, 10, '2024-04-24', 219000, 'jalan garuda no 3,medan area', 900, 'Sumatera Utara', 'Medan', 'Kota', '20228', 'jne', 'OKE', 49000, '4-5', 'pembayaran dikonfirmasi', 'OOP889'),
(27, 12, '2024-04-24', 76000, 'Jalan Angkasa no 99, Jakarta', 400, 'DKI Jakarta', 'Jakarta Timur', 'Kota', '13330', 'jne', 'REG', 16000, '2-3', 'pembayaran dikonfirmasi', 'YYR776');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(15, 14, 41, 1, 'cutter jetco', 20000, 50, 50, 20000),
(16, 14, 46, 1, 'Shower Mandi', 50000, 300, 300, 50000),
(17, 14, 36, 2, 'Bola Lampu 10W', 15000, 100, 200, 30000),
(18, 15, 41, 1, 'cutter jetco', 20000, 50, 50, 20000),
(19, 16, 41, 1, 'cutter jetco', 20000, 50, 50, 20000),
(20, 17, 41, 1, 'cutter jetco', 20000, 50, 50, 20000),
(21, 18, 45, 1, 'Keran Cuci Piring', 30000, 50, 50, 30000),
(22, 18, 42, 1, 'Keran Air Plastik 1/2 inch', 6000, 20, 20, 6000),
(23, 19, 45, 1, 'Keran Cuci Piring', 30000, 50, 50, 30000),
(24, 20, 46, 4, 'Shower Mandi', 50000, 300, 1200, 200000),
(25, 20, 41, 4, 'cutter jetco', 20000, 50, 200, 80000),
(26, 21, 42, 1, 'Keran Air Plastik 1/2 inch', 6000, 20, 20, 6000),
(27, 21, 40, 1, 'long elbow 1 1/2 inch', 12000, 1000, 1000, 12000),
(28, 22, 43, 1, 'meteran 5 m', 15000, 100, 100, 15000),
(29, 22, 36, 2, 'Bola Lampu 10W', 15000, 100, 200, 30000),
(30, 23, 45, 1, 'Keran Cuci Piring', 30000, 50, 50, 30000),
(31, 24, 43, 1, 'meteran 5 m', 15000, 100, 100, 15000),
(32, 25, 36, 1, 'Bola Lampu 10W', 15000, 100, 100, 15000),
(33, 25, 43, 1, 'meteran 5 m', 15000, 100, 100, 15000),
(34, 26, 36, 1, 'Bola Lampu 10W', 15000, 100, 100, 15000),
(35, 26, 48, 1, 'cutter arcylic', 5000, 60, 60, 5000),
(36, 26, 46, 3, 'Shower Mandi', 50000, 300, 900, 150000),
(37, 27, 43, 4, 'meteran 5 m', 15000, 100, 400, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `stok_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `gambar_produk`, `stok_produk`, `deskripsi_produk`) VALUES
(36, 12, 'Bola Lampu 10W', 15000, 100, 'bola lampu.jpg', 88, 'bola lampu terang menyala'),
(41, 15, 'cutter jetco', 20000, 50, 'cutter.jpg', 91, 'cutter tajam'),
(43, 10, 'meteran 5 m', 15000, 100, 'meteran.jpg', 85, 'meteran tahan banting'),
(44, 16, 'kuas komodo 4 inch', 27000, 20, 'kuas1.jpg', 100, 'kuas bagus'),
(45, 17, 'Keran Cuci Piring', 30000, 50, 'kerancucipiring.jpg', 97, 'keran kencang'),
(46, 17, 'Shower Mandi', 50000, 300, 'showermandi.jpg', 92, 'shower mandi cocok untuk harga pelajar'),
(48, 15, 'cutter arcylic', 5000, 60, 'cutterarcylic.jpg', 99, 'cutter potong'),
(49, 11, 'Keran Air Plastik 1/2 inch', 6000, 120, 'keran.jpg', 100, 'keran air lancar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_administrator`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_administrator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
