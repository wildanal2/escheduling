-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Jan 2019 pada 07.58
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `escheduling`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galery` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galery`, `nama`, `tag`, `source`, `tanggal`) VALUES
(30, 'Upacara Peringatan Hari Bela Negara ke-70 dan Hari Nusantara Tahun 2018', 'Bupati', 'gallery/2019-01-15-08-41-44.jpg', '2019-01-15 08:46:21'),
(31, ' Peringatan Hari Ibu ke-90 Tahun 2018', 'Hari Ibu', 'gallery/2019-01-15-08-42-39.jpg', '2019-01-15 08:42:39'),
(33, 'Peringatan Hari Ibu ke-90 Tahun 2018', 'Hari Ibu', 'gallery/2019-01-15-08-52-30.jpg', '2019-01-15 08:52:30'),
(34, 'Upacara Peringatan Hari Bela Negara ke-70 dan Hari Nusantara Tahun 2018', 'Hari Bela Negara', 'gallery/2019-01-15-08-53-31.jpg', '2019-01-15 08:53:31'),
(35, 'Kepala Dinas Kominfo Kota Mojokerto Segera Dilantik Jadi Sekda Jombang Definitif   Artikel ini telah', 'Pelantikan', 'gallery/2019-01-15-08-57-38.jpg', '2019-01-15 08:57:38'),
(36, 'Dinas Kominfo Kota Mojokerto Dengan Kominfo Bandung Mou Tentang Hibah Aplikasi', 'Aplikasi', 'gallery/2019-01-15-09-14-57.jpg', '2019-01-15 09:14:57'),
(37, 'Dishub Kominfo Kota Mojokerto Sosialisasi Tertib Lalin', 'Sosialisasi', 'gallery/2019-01-15-09-21-34.jpg', '2019-01-15 09:21:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_k` int(11) NOT NULL,
  `namaKegiatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_awal` datetime NOT NULL,
  `tanggal_akhir` datetime NOT NULL,
  `level` int(11) NOT NULL,
  `tanggal_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_k`, `namaKegiatan`, `keterangan`, `tanggal_awal`, `tanggal_akhir`, `level`, `tanggal_post`) VALUES
(10, 'februari bersih', ' kerja bakti bersama', '2019-02-01 00:00:00', '2019-02-02 00:00:00', 1, '2019-01-11 18:39:34'),
(11, 'Sambutan Tahun baru', ' Makan Besar ', '2019-01-02 00:00:00', '2019-01-02 00:00:00', 2, '2019-01-11 18:51:30'),
(12, 'Disiplin Sabtu', 'Check in Januari ', '2019-01-05 00:00:00', '2019-01-05 00:00:00', 1, '2019-01-11 18:55:39'),
(13, 'Kunjungan Kerja', 'Ke Jombang ', '2019-02-20 00:00:00', '2019-02-23 00:00:00', 2, '2019-01-11 20:27:23'),
(15, 'Istighosah', 'Kubrooooo mantap gannnnnnnnnnnn', '2019-01-20 00:00:00', '2019-01-20 00:00:00', 1, '2019-01-14 23:03:50'),
(17, 'aye aye', ' awaw', '2019-01-15 00:00:00', '2019-01-19 00:00:00', 2, '2019-01-14 23:04:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id`, `nama`) VALUES
(1, 'Bupati'),
(2, 'Kominfo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) CHARACTER SET utf8 NOT NULL,
  `isi` text CHARACTER SET utf8 NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi`, `tanggal`) VALUES
(1, 'pengumuman', 'Pengumuman \r\n\r\n1. abc\r\n2. def', '2019-01-10 04:45:54'),
(2, 'pengumuman 2', 'Pengumuman \r\n\r\n3. ghi\r\n4. jkl', '2019-01-10 04:49:58'),
(3, 'pengumuman 9', 'mencoba\r\n enter', '2019-01-10 06:13:58'),
(4, 'Pengumuman 5', 'Enter\r\nenter \r\nenter\r\n', '2019-01-10 06:14:22'),
(5, 'tes', 'function refresh() {\n                $(\".table\").DataTable().destroy();\n                $(\'tbody\').empty();\n                document.getElementById(\'form_update\').reset();\n                document.getElementById(\'tampil\').reset();\n            \n                show();\n        }', '2019-01-15 04:34:57'),
(6, 'pengumumn sng dowo', 'oioi', '2019-01-15 03:30:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galery`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_k`),
  ADD KEY `fk_kegiatan_level` (`level`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_kegiatan_level` FOREIGN KEY (`level`) REFERENCES `level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
