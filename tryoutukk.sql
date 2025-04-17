-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2025 pada 10.32
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tryoutukk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `crudbarang`
--

CREATE TABLE `crudbarang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `kategori_barang` varchar(100) DEFAULT NULL,
  `jumlah_stok` int(11) DEFAULT NULL,
  `harga_barang` int(11) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `crudbarang`
--

INSERT INTO `crudbarang` (`id_barang`, `nama_barang`, `kategori_barang`, `jumlah_stok`, `harga_barang`, `tanggal_masuk`, `id_kategori`) VALUES
(1, 'pisau', 'benda tajam', 2, 100000, '2021-12-12', 1),
(2, 'pistol', NULL, 2, 200000, '2034-12-12', 1),
(3, 'pisau', NULL, 2, 200000, '2023-12-12', 1),
(4, 'ale-ale', NULL, 3, 100000, '2021-12-13', 2),
(5, 'sate', NULL, 2, 150000, '2021-12-03', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `crudweb`
--

CREATE TABLE `crudweb` (
  `id_barang` int(30) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `kategori_barang` varchar(255) NOT NULL,
  `jumlah_stok` int(255) NOT NULL,
  `harga_barang` int(255) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `crudweb`
--

INSERT INTO `crudweb` (`id_barang`, `nama_barang`, `kategori_barang`, `jumlah_stok`, `harga_barang`, `tanggal_masuk`) VALUES
(NULL, 'pena', '', 2, 20, '2025-04-06'),
(NULL, 'penasil', 'pen', 3, 10, '2025-04-04'),
(NULL, 'buku', 'alat tulis', 5, 50, '2025-04-01'),
(0, 'pena', 'alat tulis', 2, 10000, '2025-04-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
(1, 'senjata'),
(2, 'minuman'),
(3, 'makanan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `crudbarang`
--
ALTER TABLE `crudbarang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `crudbarang`
--
ALTER TABLE `crudbarang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
