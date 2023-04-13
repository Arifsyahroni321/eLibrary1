-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Des 2022 pada 14.31
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kode` char(8) CHARACTER SET utf8mb4 NOT NULL,
  `judul` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `tahun` char(5) CHARACTER SET utf8mb4 NOT NULL,
  `penerbit_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `pengarang_id` int(11) NOT NULL,
  `sinopsis` text NOT NULL,
  `stok` int(11) NOT NULL,
  `cover` varchar(120) NOT NULL DEFAULT 'img/cover/default.jpg',
  `harga` decimal(10,0) NOT NULL,
  `like` int(11) NOT NULL DEFAULT 0,
  `dislike` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `kode`, `judul`, `tahun`, `penerbit_id`, `kategori_id`, `pengarang_id`, `sinopsis`, `stok`, `cover`, `harga`, `like`, `dislike`, `created_at`, `updated_at`) VALUES
(35, 'SCN-7488', 'Fisika Quantum', '2013', 9, 12, 8, 'Ini buku bagus', 342, 'img/cover/default.jpg', '200000', 1, 0, '2022-11-30 14:57:50', '2022-12-14 13:42:30'),
(36, 'LAN-9702', 'Bahasa Inggris', '2013', 9, 11, 8, 'buku gacor berbahasa inggris', 115, 'img/cover/qqeWygxm2xUKWTh5wP69XRdjZHbjEdFef9Mj1870.jpg', '250000', 0, 1, '2022-12-04 00:31:30', '2022-12-14 13:43:15'),
(38, 'SCN-1c8c', 'Tutorial Ganteng', '2011', 9, 12, 9, 'Cara ganteng pada era industri 4.0', 47, 'img/cover/rLRAznJFrLU8jax5a6cv73WOrrHu0ODtIEyjILih.png', '150000', 2, 0, '2022-12-14 13:44:53', '2022-12-14 13:44:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `denda`
--

CREATE TABLE `denda` (
  `id` int(11) NOT NULL,
  `jenis` varchar(55) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `tarif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `denda`
--

INSERT INTO `denda` (`id`, `jenis`, `keterangan`, `tarif`) VALUES
(1, 'Tidak Ada Denda', 'Buku dikembalikan dengan semestinya.', '0'),
(2, 'Keterlambatan', 'Terlambat Mengembalikan Buku', '5000/hari'),
(3, 'Kerusakan', 'Mengembalikan buku dalam keadaan rusak atau cacat', 'Harga buku + 5000'),
(4, 'Kehilangan', 'Menghilangkan Buku', 'Harga buku + 10000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kode` char(7) CHARACTER SET utf8mb4 NOT NULL,
  `nm_kategori` varchar(45) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `kode`, `nm_kategori`) VALUES
(10, 'REG', 'Religion'),
(11, 'LAN', 'Language'),
(12, 'SCN', 'Science'),
(13, 'NOV', 'Novel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `tgl_notif` datetime NOT NULL,
  `users_id` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `redirect` varchar(255) NOT NULL DEFAULT '#',
  `status` enum('read','unread') NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `tgl_notif`, `users_id`, `pesan`, `redirect`, `status`) VALUES
(3, '2022-12-15 20:27:40', 22, 'Pengembalian Buku Fisika Quantum Anda Sukses!. Dengan Denda \"Kehilangan\" dengan biaya Rp.210.000', '#', 'read');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('pending','accepted','rejected','finish') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `buku_id`, `anggota_id`, `tgl_pinjam`, `tgl_kembali`, `status`) VALUES
(8, 35, 22, '2022-12-15', '2022-12-22', 'finish'),
(9, 36, 22, '2022-12-15', '2022-12-22', 'finish'),
(11, 38, 22, '2022-12-15', '2022-12-22', 'finish'),
(12, 38, 26, '2022-12-15', '2022-12-22', 'finish');

--
-- Trigger `peminjaman`
--
DELIMITER $$
CREATE TRIGGER `stokBuku` AFTER UPDATE ON `peminjaman` FOR EACH ROW BEGIN
      IF (NEW.status = 'accepted') THEN
            UPDATE buku SET stok = stok - 1 WHERE id = NEW.buku_id;
      END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `nm_penerbit` varchar(55) CHARACTER SET utf8mb4 NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 NOT NULL,
  `tlp` varchar(15) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id`, `nm_penerbit`, `alamat`, `tlp`) VALUES
(8, 'CV. Garuda Jaya', 'Jl. Garuda Jaya No. 03', '02165987949'),
(9, 'CV. Erlangga', 'Jl. Erlangga No. 03', '02112387949'),
(10, 'CV. Yudhistira', 'Jl. Yudhistira No. 2', '02152732764');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengarang`
--

CREATE TABLE `pengarang` (
  `id` int(11) NOT NULL,
  `nm_pengarang` varchar(55) CHARACTER SET utf8mb4 NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `alamat` text CHARACTER SET utf8mb4 NOT NULL,
  `tlp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengarang`
--

INSERT INTO `pengarang` (`id`, `nm_pengarang`, `gender`, `alamat`, `tlp`) VALUES
(8, 'Suparman', 'L', 'Jl. Mawar No. 10', '081311193704'),
(9, 'Tukiyem', 'P', 'Jl. Melati No. 34', '083646527835');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `pustakawan_id` int(11) NOT NULL,
  `peminjaman_id` int(11) NOT NULL,
  `denda_id` int(11) NOT NULL,
  `tarif` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `tgl_kembali`, `pustakawan_id`, `peminjaman_id`, `denda_id`, `tarif`) VALUES
(4, '2022-12-15', 21, 9, 3, '255000'),
(5, '2022-12-15', 21, 12, 4, '160000'),
(6, '2022-12-15', 21, 11, 3, '155000'),
(7, '2022-12-15', 21, 8, 4, '210000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `action` enum('like','dislike') NOT NULL,
  `anggota_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `tgl_rate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id`, `action`, `anggota_id`, `buku_id`, `tgl_rate`) VALUES
(154, 'dislike', 22, 36, '2022-12-07 19:34:18'),
(156, 'like', 22, 35, '2022-12-07 19:42:41'),
(158, 'like', 22, 38, '2022-12-14 20:50:11'),
(159, 'like', 26, 38, '2022-12-14 23:01:59');

--
-- Trigger `rating`
--
DELIMITER $$
CREATE TRIGGER `rating_buku_delete` BEFORE DELETE ON `rating` FOR EACH ROW BEGIN
      IF (OLD.action = 'dislike') THEN
            UPDATE buku SET `dislike` = `dislike` - 1 WHERE id = OLD.buku_id;
      ELSEIF (OLD.action = 'like') THEN
            UPDATE buku SET `like` = `like` - 1 WHERE id = OLD.buku_id;
      END IF;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `rating_buku_insert` AFTER INSERT ON `rating` FOR EACH ROW BEGIN
      IF (NEW.action = 'like') THEN
            UPDATE buku SET `like` = `like` + 1 WHERE id = NEW.buku_id;
      ELSEIF (NEW.action = 'dislike') THEN
            UPDATE buku SET `dislike` = `dislike` + 1 WHERE id = NEW.buku_id;
      END IF;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `rating_buku_update` AFTER UPDATE ON `rating` FOR EACH ROW BEGIN
      IF (NEW.action = 'like' AND OLD.action = 'dislike') THEN
            UPDATE buku SET `like` = `like` + 1, `dislike` = `dislike` - 1 WHERE id = NEW.buku_id;
      ELSEIF (NEW.action = 'dislike' AND OLD.action = 'like') THEN
            UPDATE buku SET `dislike` = `dislike` + 1, `like` = `like` - 1 WHERE id = NEW.buku_id;
      END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `email` varchar(120) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` enum('anggota','pustakawan','admin') NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` enum('Islam','Kristen','Hindu','Budha','Kong Hu Chu') NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `foto` varchar(100) DEFAULT 'img/avatar/default.jpg',
  `is_active` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `no_anggota` varchar(45) DEFAULT NULL,
  `nip` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`, `role`, `gender`, `tgl_lahir`, `agama`, `alamat`, `tlp`, `foto`, `is_active`, `created_at`, `updated_at`, `remember_token`, `email_verified_at`, `no_anggota`, `nip`) VALUES
(20, 'Akhmad Lylana', 'admin@gmail.com', 'admin123', '$2y$10$mEsQoKuWDFE0RMti6OhmKe1rEGqRfNU0oJrjACG5hodA/VCZ797Zq', 'admin', 'L', '2000-09-19', 'Islam', 'Jl. Pangeran Cakrabuana No. 17', '083121085114', 'img/avatar/O1g3e7hQY1IieA46TtgzfFgXE0saVuY7xHB8F9nx.jpg', 'aktif', '2022-11-30 14:44:51', '2022-12-07 13:08:25', 'JJm8iYnD2zZC8wXybkn3oIbDhiZEb9sjOOaFhmVsYpl5ImMZb0FyZySOkpsl', '2022-11-30 14:44:50', NULL, NULL),
(21, 'Udin Petot', 'pustakawan@gmail.com', 'pustakawan123', '$2y$10$VHj/.Y8L13hzT32NuH/iT.WbxvZMMwo3VGijSNPw.ZmkLnBqStpZq', 'pustakawan', 'L', '2000-09-19', 'Islam', 'Jl. Pangeran Cakrabuana No. 17', '083121085114', 'img/avatar/default.jpg', 'aktif', '2022-11-30 14:44:51', '2022-11-30 14:44:51', 'KPAuHwPEZF5RTMlnitAzOg6GqaVCZ2RMHUvGPA2zh64RXNb4lgYPCMspcZaa', '2022-11-30 14:44:51', NULL, NULL),
(22, 'Sugiono', 'anggota@gmail.com', 'anggota123', '$2y$10$ys..M1I1LJnHjDeR8L3DzeVDoV7CqHUAqxD.PxY02tEKqW8LjfxtW', 'anggota', 'L', '2000-09-19', 'Islam', 'Jl. Pangeran Cakrabuana No. 17', '083121085114', 'img/avatar/default.jpg', 'aktif', '2022-11-30 14:44:51', '2022-11-30 14:44:51', 'MUjUwlpfEbXyZpIbvwObIgLIJ9YgQqzlJxnC78U1tR07zr4xKY332NTyeAbx', '2022-11-30 14:44:51', NULL, NULL),
(24, 'Suparman', 'suparman@gmail.com', 'suparman123', '$2y$10$iErAZheOHJWTQe01gL3vR.taUUvT/y7mz1G6KrfJYJ.FVLXZrCWm.', 'anggota', 'L', '2022-12-22', 'Islam', 'gatau', '083646527835', 'img/avatar/default.jpg', 'aktif', '2022-11-30 15:16:33', '2022-11-30 15:16:33', NULL, NULL, NULL, NULL),
(25, 'istiqomah', 'istiqomah@gmail.com', 'istiqomah123', '$2y$10$UEc5cHod7EU/5Q5E0sKQxuR/V06wsnw2ulGVcXPB9Ql3X2ExU1bVS', 'anggota', 'P', '2022-12-29', 'Islam', 'gatau2', '02150832768', 'img/avatar/default.jpg', 'nonaktif', '2022-12-01 07:43:22', '2022-12-01 08:02:04', 'EShKqeAOEGh99MxvEtDfqFUw3CnPPnS7Ft9LVYYXNzf8Hll6M69XtdA8r46C', NULL, '12-22-8fc3', NULL),
(26, 'Jono', 'jono@gmail.com', 'jono1234', '$2y$10$J4O9RxB1egxs2ajzyEEHgeanwUKYkdDu2hK1AysL4oCntxthKj69m', 'anggota', 'L', '2022-12-13', 'Islam', 'gatau', '083646527835', 'img/avatar/default.jpg', 'aktif', '2022-12-01 08:08:29', '2022-12-01 08:11:17', 'gfLYVgee2YKgxXySfxBoFYHTv0GmnpGQte9ODzMqz4ZhWyc5HGs4NEYgam62', NULL, '12-22-14d1', NULL);

--
-- Trigger `users`
--
DELIMITER $$
CREATE TRIGGER `drp_user` BEFORE DELETE ON `users` FOR EACH ROW BEGIN
      IF (OLD.role = 'anggota') THEN
            DELETE FROM anggota WHERE users_id = OLD.id;
      ELSEIF (OLD.role = 'pustakawan') THEN
            DELETE FROM petugas WHERE users_id = OLD.id;
      END IF;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `anggota_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`id`, `buku_id`, `anggota_id`) VALUES
(14, 35, 22),
(15, 36, 22),
(16, 38, 26);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`),
  ADD KEY `fk_buku_penerbit_idx` (`penerbit_id`),
  ADD KEY `fk_buku_kategori1_idx` (`kategori_id`),
  ADD KEY `fk_buku_pengarang1_idx` (`pengarang_id`);

--
-- Indeks untuk tabel `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_UNIQUE` (`kode`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_notifikasi_users1_idx` (`users_id`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_anggota_has_buku_buku1_idx` (`buku_id`),
  ADD KEY `fk_peminjaman_users1_idx` (`anggota_id`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengembalian_denda1_idx` (`denda_id`),
  ADD KEY `fk_pengembalian_users1_idx` (`pustakawan_id`),
  ADD KEY `fk_pengembalian_peminjaman1_idx` (`peminjaman_id`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_rating_users1_idx` (`anggota_id`),
  ADD KEY `fk_rating_buku1_idx` (`buku_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_wishlist_buku1_idx` (`buku_id`),
  ADD KEY `fk_wishlist_users1_idx` (`anggota_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `denda`
--
ALTER TABLE `denda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengarang`
--
ALTER TABLE `pengarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_buku_kategori1` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buku_penerbit` FOREIGN KEY (`penerbit_id`) REFERENCES `penerbit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_buku_pengarang1` FOREIGN KEY (`pengarang_id`) REFERENCES `pengarang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `fk_notifikasi_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_anggota_has_buku_buku1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_users1` FOREIGN KEY (`anggota_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `fk_pengembalian_denda1` FOREIGN KEY (`denda_id`) REFERENCES `denda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengembalian_peminjaman1` FOREIGN KEY (`peminjaman_id`) REFERENCES `peminjaman` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pengembalian_users1` FOREIGN KEY (`pustakawan_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_rating_buku1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_rating_users1` FOREIGN KEY (`anggota_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `fk_wishlist_buku1` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_wishlist_users1` FOREIGN KEY (`anggota_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;