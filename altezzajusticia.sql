-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2024 pada 07.52
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `altezzajusticia`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` int(50) NOT NULL,
  `email` int(50) NOT NULL,
  `password` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `appoitment`
--

CREATE TABLE `appoitment` (
  `id_appoitment` int(11) NOT NULL,
  `kasus` varchar(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_lawyer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id_client`, `username`, `email`, `password`) VALUES
(1, 'kuroko', 'kuroko@gmail.com', 'araara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lawyer`
--

CREATE TABLE `lawyer` (
  `id_lawyer` int(11) NOT NULL,
  `username` int(50) NOT NULL,
  `password` int(11) NOT NULL,
  `biaya` int(50) NOT NULL,
  `S1` varchar(100) NOT NULL,
  `S2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id_payment` int(11) NOT NULL,
  `total` varchar(50) NOT NULL,
  `VA` int(12) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_lawyer` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `appoitment`
--
ALTER TABLE `appoitment`
  ADD PRIMARY KEY (`id_appoitment`),
  ADD KEY `fk_client_appoitment` (`id_client`),
  ADD KEY `fk_lawyer_appoitment` (`id_lawyer`);

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indeks untuk tabel `lawyer`
--
ALTER TABLE `lawyer`
  ADD PRIMARY KEY (`id_lawyer`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id_payment`),
  ADD KEY `fk_client_payment` (`id_client`),
  ADD KEY `fk_lawyer_payment` (`id_lawyer`),
  ADD KEY `fk_admin_payment` (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `appoitment`
--
ALTER TABLE `appoitment`
  MODIFY `id_appoitment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `lawyer`
--
ALTER TABLE `lawyer`
  MODIFY `id_lawyer` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `payment`
--
ALTER TABLE `payment`
  MODIFY `id_payment` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `appoitment`
--
ALTER TABLE `appoitment`
  ADD CONSTRAINT `fk_client_appoitment` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `fk_lawyer_appoitment` FOREIGN KEY (`id_lawyer`) REFERENCES `lawyer` (`id_lawyer`);

--
-- Ketidakleluasaan untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_admin_payment` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `fk_client_payment` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `fk_lawyer_payment` FOREIGN KEY (`id_lawyer`) REFERENCES `lawyer` (`id_lawyer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
