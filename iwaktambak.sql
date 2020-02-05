-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Feb 2020 pada 17.57
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwaktambak`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(12) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` varchar(250) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` int(2) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `id` int(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(250) NOT NULL,
  `status` int(2) NOT NULL,
  `deleted` int(2) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `kode_transaksi` int(10) NOT NULL,
  `item` int(5) NOT NULL,
  `qty` int(5) NOT NULL,
  `harga` int(10) NOT NULL,
  `satuan` varchar(30) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kategori` int(10) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` int(20) NOT NULL,
  `updated` int(20) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item`
--

INSERT INTO `item` (`id`, `nama`, `kategori`, `deskripsi`, `harga`, `satuan`, `gambar`, `status`, `created`, `updated`, `deleted`) VALUES
(13, 'oke', 3, '                    asdasd                  ', 10000, 'pcs', 'oke1580921309.jpg', 1, 1580892604, 1580921309, 0),
(11, 'warta', 3, '                                                                                                                                                                                                                                                update\r\n                                                                                                                                                                                                                                                                                                  ', 9999, 'KG', 'warta1580889912.png', 1, 1580888851, 1580892884, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `item_kategori`
--

CREATE TABLE `item_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` int(20) NOT NULL,
  `updated` int(11) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `item_kategori`
--

INSERT INTO `item_kategori` (`id`, `nama`, `gambar`, `status`, `created`, `updated`, `deleted`) VALUES
(3, 'update', 'update1580891261.png', 1, 1580891609, 1580891609, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kode_transaksi` int(10) NOT NULL,
  `user` varchar(30) NOT NULL,
  `waktu` datetime NOT NULL,
  `pembayaran` varchar(255) NOT NULL,
  `subtotal` int(10) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `harga` int(10) NOT NULL,
  `status` int(2) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL,
  `deleted` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `foto` varchar(250) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(14) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` int(2) NOT NULL,
  `updated` datetime NOT NULL,
  `created` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `jenis_kelamin`, `tanggal_lahir`, `foto`, `alamat`, `no_telp`, `password`, `deleted`, `updated`, `created`) VALUES
(1, 'admin', 'admin@gmail.com', 'L', '2020-02-05', '', '', '', 'OWM2OWMyZTI4NTU3YTczN2ZmYzJkM2FhZDkxNjBiNzY', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `item_kategori`
--
ALTER TABLE `item_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kode_transaksi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `item_kategori`
--
ALTER TABLE `item_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
