-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jul 2024 pada 10.29
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wahana_air`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_costumers`
--

CREATE TABLE `tbl_costumers` (
  `id` int(11) NOT NULL,
  `pemilik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `create at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_costumers`
--

INSERT INTO `tbl_costumers` (`id`, `pemilik`, `nama`, `email`, `subject`, `message`, `create at`, `update_at`) VALUES
(5, 'testing sukses', 'Admin', 'admin@gmail.com', 'All in one', 'wbdkq', '2024-06-28 17:59:31', '2024-06-28 17:59:31'),
(6, 'muhammad sumbul', 'tes', 'tes@gmail.com', 'Menus', '123231    askbd', '2024-06-28 18:00:27', '2024-06-28 18:00:27'),
(7, 'muhammad sumbul', 'DZAKWAN MARSANDI PRATAMA HASIBUAN', 'dzakwan.m29@gmail.com', 'ytdfyfgg', 'hfuyfgughlkb', '2024-06-29 15:04:10', '2024-06-29 15:04:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_informasi`
--

CREATE TABLE `tbl_informasi` (
  `id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_informasi`
--

INSERT INTO `tbl_informasi` (`id`, `alamat`, `no_hp`, `email`) VALUES
(1, 'XJC7+3HR, Kisaran Naga, Kec. Kota Kisaran Timur, Kabupaten Asahan, Sumatera Utara 21211', '0812345678990', 'danau.kelapa@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id` int(11) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `nama_jadwal` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id`, `jam_mulai`, `jam_selesai`, `nama_jadwal`, `keterangan`) VALUES
(1, '09:00:00', '11:00:00', 'Permainan 1 - (Pagi)', 'Memiliki waktu permainan 3x. Waktu bermain selama 1 jam, bebas berkeliling di danau.1 sepeda air max 2 orang.'),
(2, '12:00:00', '13:00:00', 'Break', 'Istirahat operator dan maintenance wahana.'),
(4, '13:00:00', '17:00:00', 'Permainan 2 (Siang - Sore)', 'Memiliki waktu permainan 5x. Waktu bermain selama 1 jam, bebas berkeliling di danau. 1 sepeda air max 2 orang.'),
(5, '18:00:00', '19:00:00', 'Break', 'Istirahat operator dan maintenance wahana.'),
(6, '20:00:00', '22:00:00', 'Permainan 3 (MALAM)', 'Memiliki waktu permainan 3x. Waktu bermain selama 1 jam, bebas berkeliling di danau. 1 sepeda air max 2 orang.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_konten`
--

CREATE TABLE `tbl_konten` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_konten`
--

INSERT INTO `tbl_konten` (`id`, `judul`, `deskripsi`, `foto`) VALUES
(6, 'Dapur Danau Kelapa Gading', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempor augue sit amet placerat vulputate. Nunc venenatis neque ut metus pellentesque, cursus malesuada massa aliquet.', '6678340a204b4.jpeg'),
(7, 'Cafe', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempor augue sit amet placerat vulputate. Nunc venenatis neque ut metus pellentesque, cursus malesuada massa aliquet.', '667834261a5d6.jpeg'),
(8, 'Resto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempor augue sit amet placerat vulputate. Nunc venenatis neque ut metus pellentesque, cursus malesuada massa aliquet.', '6678343dcaf43.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id` int(11) NOT NULL,
  `kp` varchar(50) NOT NULL,
  `pemesan` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tiket` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id`, `kp`, `pemesan`, `nama`, `email`, `tiket`, `harga`, `jumlah`, `create_at`, `update_at`) VALUES
(12, 'WAKP667eb246b9380', 'muhammad sumbul', 'reza', 'tes@gmail.com', 'Ticket Wahana Pagi', 20000, 2, '2024-06-28 19:53:26', '2024-06-28 19:53:26'),
(14, 'WAKP667fd2d5e26c9', 'DZAKWAN MARSANDI PRATAMA HASIBUAN', 'dzakwan', 'dzakwan.m29@gmail.com', 'Ticket Wahana Malam', 25000, 4, '2024-06-29 16:24:37', '2024-06-29 16:24:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tiket`
--

CREATE TABLE `tbl_tiket` (
  `id` int(11) NOT NULL,
  `nama_tiket` varchar(100) NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `durasi` int(2) NOT NULL,
  `bonus` varchar(100) NOT NULL,
  `peraturan` varchar(100) NOT NULL,
  `lainnya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_tiket`
--

INSERT INTO `tbl_tiket` (`id`, `nama_tiket`, `harga`, `durasi`, `bonus`, `peraturan`, `lainnya`) VALUES
(2, 'Tiket Wahana Pagi', '20000', 1, 'Bebas berkeliling danau', 'Dilarang membawa makanan', 'Bebas pilih sepeda air'),
(4, 'Tiket Wahana Siang', '20000', 1, 'Bebas berkeliling danau', 'Dilarang membawa makanan', 'Bebas pilih sepeda air'),
(5, 'Tiket Wahana Malam', '25000', 1, 'Bebas berkeliling danau', 'Dilarang membawa makanan', 'Bebas pilih sepeda air');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lvl`
--

CREATE TABLE `tb_lvl` (
  `id` int(11) NOT NULL,
  `akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_lvl`
--

INSERT INTO `tb_lvl` (`id`, `akses`) VALUES
(1, 'Admin'),
(2, 'Pelanggan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_akses` int(1) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_akses`, `nama_lengkap`, `no_hp`, `email`, `username`, `password`) VALUES
(6, 1, 'muhammad sumbul', '3534435325', 'a@a.a', 'sumbul', '123'),
(8, 1, 'testing sukses', '098124323387', 'tes@gmail.com', 'tes', '123'),
(16, 2, 'DZAKWAN MARSANDI PRATAMA HASIBUAN', '081339717670', 'dzakwan.m29@gmail.com', 'wawan', 'wawanq123'),
(17, 2, 'DZAKWAN MARSANDI PRATAMA HASIBUAN', '081339717670', 'dzakwan.m29@gmail.com', 'rifani', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_costumers`
--
ALTER TABLE `tbl_costumers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_konten`
--
ALTER TABLE `tbl_konten`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_lvl`
--
ALTER TABLE `tb_lvl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_akses` (`id_akses`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_costumers`
--
ALTER TABLE `tbl_costumers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_informasi`
--
ALTER TABLE `tbl_informasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_konten`
--
ALTER TABLE `tbl_konten`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_tiket`
--
ALTER TABLE `tbl_tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_lvl`
--
ALTER TABLE `tb_lvl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `tb_lvl` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
