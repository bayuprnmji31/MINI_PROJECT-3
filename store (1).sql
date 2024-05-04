-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2024 pada 15.27
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
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `name`, `price`) VALUES
(1, 'DC original 19 Liter ', 28000),
(2, 'AQUA Original 19 Liter', 48000),
(3, 'Air G-24 19 Liter', 7000),
(4, 'Air Alkaline 19 Liter', 61000),
(5, 'Kangen Water 19 Liter', 80000),
(6, 'Lee Minerale 19 Liter', 20000),
(7, 'Air Galon CLUB 19 Liter', 20000),
(8, 'Air Galon VIT 19 Liter', 96000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`, `role`, `profile_picture`) VALUES
(9, 'Bayu Purnama Aji', 'bayupur31@gmail.com', 'cc7d93da02e71a4c3c616ca6e01b7cc2', '7188127398', 'Samarinda', 'Jl.Rotan Semambu No 24', 0, NULL),
(11, 'admin', 'admin31@gmail.com', 'f9446a8b1d2d4cd55a8abf740ca932ad', '1212121213', 'Samarinda', 'Jl.Rotan Semambu No 24', 1, NULL),
(12, 'super admin', 'superadmin31@gmail.com', 'f9446a8b1d2d4cd55a8abf740ca932ad', '99238248', 'Samarinda', 'Jl.Rotan Semambu No 24', 2, NULL),
(13, 'aa', 'aa@gmail.com', '$2y$10$dKwhV1XpXL7jwNKnzWb8puPBcUokg0sv70TMhbpVP27wZrEz9TrYu', '0812200095', 'tarakan', 'jln mangga 1', 0, NULL),
(14, 'pelanggan', 'pelanggan1@gmail.com', 'a60dc877bd618cdc38de26bd6cf1c7ca', '0827326372', 'Loa Janan', 'Jalan H. Susilo', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_item`
--

CREATE TABLE `user_item` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `status` enum('Added to cart','Confirmed','','') NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `jumlah_barang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user_item`
--

INSERT INTO `user_item` (`id`, `user_id`, `item_id`, `status`, `date_time`, `jumlah_barang`) VALUES
(51, 9, 1, 'Confirmed', '2024-04-03 13:04:44', 2),
(94, 10, 1, 'Confirmed', '2024-04-04 14:47:53', 1),
(95, 10, 6, 'Confirmed', '2024-04-04 14:48:04', 2),
(101, 14, 1, 'Confirmed', '2024-04-15 14:32:38', 1),
(102, 0, 0, '', '0000-00-00 00:00:00', 0),
(103, 0, 0, '', '0000-00-00 00:00:00', 0),
(104, 0, 0, '', '0000-00-00 00:00:00', 0),
(105, 0, 0, '', '0000-00-00 00:00:00', 0),
(106, 0, 0, '', '0000-00-00 00:00:00', 0),
(107, 13, 5, '', '2024-04-15 14:56:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_item`
--
ALTER TABLE `user_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_item`
--
ALTER TABLE `user_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
