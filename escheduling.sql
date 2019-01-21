-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2019 at 05:10 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

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
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galery` int(11) NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galeri`
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
-- Table structure for table `kegiatan`
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
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_k`, `namaKegiatan`, `keterangan`, `tanggal_awal`, `tanggal_akhir`, `level`, `tanggal_post`) VALUES
(20, 'mabar', ' mabar Pro PLAYER mobelegend', '2019-03-02 00:00:00', '2019-03-03 00:00:00', 2, '2019-01-15 17:33:36'),
(31, 'PEMBUKAAN FASILITASI ADD TAHUN 2019 (ANGKATAN II)', 'PUKUL 10:00 WIB, TEMPAT DI HOTEL VANDA TRAWAS', '2019-01-16 00:00:00', '2019-01-16 00:00:00', 1, '2019-01-18 09:38:47'),
(32, 'PENYERAHAN SK KEPALA SEKOLAH SDN SE KAB. MOJOKERTO', 'PUKUL 09:00 WIB, TEMPAT DI PENDOPO GRAHA MAJA TAMA', '2019-01-16 00:00:00', '2019-01-16 00:00:00', 1, '2019-01-18 09:40:49'),
(33, 'PERMOHONAN MEMBUKA FASILITASI ADD TAHUN 2019 (ANGKATAN I)', ' PUKUL 10:00 WIB, TEMPAT DI HOTEL VANDA TRAWAS', '2019-01-15 00:00:00', '2019-01-15 00:00:00', 1, '2019-01-18 09:42:07'),
(34, 'ACARA PENGANTAR TUGAS DAN PERKENALAN KEPALA KANTOR IMIGRASI KELAS I KHUSUS SURABAYA', ' PUKUL 18:30 WIB, TEMPAT DI GRAHA SATU PT ANGKASA PURA JUANDA\n\n', '2019-01-03 00:00:00', '2019-01-03 00:00:00', 1, '2019-01-18 09:44:22'),
(35, 'PEMBUKAAN KEJURDA INKANAS SE-JAWA TIMUR PIALA KAPOLDA JATIM KARATE KE IV 2019', ' PUKUL 07:00 WIB, TEMPAT DI GOR SENI MAJAPAHIT', '2019-01-22 00:00:00', '2019-01-22 00:00:00', 1, '2019-01-21 10:45:41'),
(36, 'GOWES BERSAMA', ' PUKUL 06:00 WIB, TEMPAT DI START PENDOPO RUMDIN DANREM', '2019-01-12 00:00:00', '2019-01-12 00:00:00', 1, '2019-01-18 09:45:44'),
(37, 'MEMBERI SAMBUTAN DAN MEMBUKA ACARA MUSDA VIII MUI KAB MOJOKERTO', ' PUKUL 08:30 WIB, TEMPAT DI GRAHA WIDYA NUSANTARA DSN. SELAWE DS. PADI GONDANG', '2019-01-12 00:00:00', '2019-01-12 00:00:00', 1, '2019-01-18 09:46:37'),
(38, 'SAMBUTAN DALAM RANGKA PERINGATAN MAULID NABI MUHAMMAD SAW DAN HAUL MBAH SAYYID MALIK IBRAHIM DAN MBA', ' PUKUL 21:00 WIB, TEMPAT DI HALAMAN PONPES BUMI DAMAI DARUTTAMAM MADURESO DAWARBLANDONG', '2019-01-12 00:00:00', '2019-01-12 00:00:00', 1, '2019-01-18 09:47:32'),
(39, 'REFLEKSI AKHIR TAHUN (PENYAMPAIAN CAPAIAN KINERJA)', ' PUKUL 08:00 WIB, TEMPAT DI RUANG SIDANG CAKRA PENGADILAN NEGERI MOJOKERTO', '2019-01-15 00:00:00', '2019-01-15 00:00:00', 1, '2019-01-18 09:48:29'),
(40, 'RAPAT PMI KAB MOJOKERTO', ' PUKUL 13:00 WIB, TEMPAT DI MARKAS PMI', '2019-01-15 00:00:00', '2019-01-15 00:00:00', 1, '2019-01-18 09:49:00'),
(41, 'kom1', ' aa', '2019-01-17 00:00:00', '2019-01-17 00:00:00', 2, '2019-01-18 10:12:43'),
(42, 'kom2', ' aaa', '2019-01-18 00:00:00', '2019-01-18 00:00:00', 2, '2019-01-18 10:13:03'),
(43, 'kom3', ' aaa', '2019-01-18 00:00:00', '2019-01-18 00:00:00', 2, '2019-01-18 10:13:41'),
(44, 'as', ' as', '2019-01-19 00:00:00', '2019-01-19 00:00:00', 1, '2019-01-18 11:19:53'),
(45, 'awaw', ' sasa', '2019-01-19 00:00:00', '2019-01-19 00:00:00', 2, '2019-01-18 11:20:07'),
(47, 'aa', ' aa', '2019-01-20 00:00:00', '2019-01-20 00:00:00', 2, '2019-01-20 19:10:23'),
(48, 'Kunjungan', ' berdua', '2019-01-23 00:00:00', '2019-01-24 00:00:00', 2, '2019-01-21 08:35:30'),
(49, 'asas', ' as', '2019-01-24 00:00:00', '2019-01-25 00:00:00', 1, '2019-01-21 08:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id` int(11) NOT NULL,
  `nama` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `nama`) VALUES
(1, 'Bupati'),
(2, 'Kominfo');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) CHARACTER SET utf8 NOT NULL,
  `isi` text CHARACTER SET utf8 NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `isi`, `tanggal`) VALUES
(1, 'UNDANGAN ACARA PENGANTAR', 'UNDANGAN ACARA PENGANTAR TUGAS DAN PERKENALAN KEPALA KANTOR IMIGRASI KELAS I KHUSUS SURABAYA\r\n\r\nHARI KAMIS 3 JANUARI 2019, PUKUL 18:30 WIB, TEMPAT DI GRAHA SATU PT ANGKASA PURA JUANDA', '2019-01-18 02:44:55'),
(2, 'UNDANGAN PEMBUKAAN KEJURDA', 'UNDANGAN PEMBUKAAN KEJURDA INKANAS SE-JAWA TIMUR PIALA KAPOLDA JATIM KARATE KE IV 2019\r\n\r\nHARI JUMAT 4 JANUARI 2019, PUKUL 07:00 WIB, TEMPAT DI GOR SENI MAJAPAHIT', '2019-01-18 02:45:30'),
(3, 'UNDANGAN GOWES BERSAMA', 'UNDANGAN GOWES BERSAMA\r\n\r\nHARI SABTU 12 JANUARI 2019, PUKUL 06:00 WIB, TEMPAT DI START PENDOPO RUMDIN DANREM', '2019-01-18 02:46:04'),
(4, 'UNDANGAN PERMOHONAN', 'UNDANGAN PERMOHONAN MEMBERI SAMBUTAN DAN MEMBUKA ACARA MUSDA VIII MUI KAB MOJOKERTO\r\n\r\nHARI SABTU 12 JANUARI 2019, PUKUL 08:30 WIB, TEMPAT DI GRAHA WIDYA NUSANTARA DSN. SELAWE DS. PADI GONDANG', '2019-01-18 02:46:31'),
(7, 'UNDANGAN PERMOHONAN MEMBERIKAN SAMBUTAN', 'UNDANGAN PERMOHONAN MEMBERIKAN SAMBUTAN DALAM RANGKA PERINGATAN MAULID NABI MUHAMMAD SAW DAN HAUL MBAH SAYYID MALIK IBRAHIM DAN MBAH ILYAS\r\n\r\nHARI SABTU 12 JANUARI 2019, PUKUL 21:00 WIB, TEMPAT DI HALAMAN PONPES BUMI DAMAI DARUTTAMAM MADURESO DAWARBLANDONG', '2019-01-18 03:10:40'),
(8, 'UNDANGAN RAPAT PMI', 'UNDANGAN RAPAT PMI KAB MOJOKERTO\r\n\r\nHARI SELASA 15 JANUARI 2019, PUKUL 13:00 WIB, TEMPAT DI MARKAS PMI', '2019-01-18 03:11:25'),
(9, 'UNDANGAN REFLEKSI AKHIR TAHUN', 'UNDANGAN REFLEKSI AKHIR TAHUN (PENYAMPAIAN CAPAIAN KINERJA)\r\n\r\nHARI SELASA 15 JANUARI 2019, PUKUL 08:00 WIB, TEMPAT DI RUANG SIDANG CAKRA PENGADILAN NEGERI MOJOKERTO', '2019-01-18 03:11:50'),
(10, 'UNDANGAN PERMOHONAN MEMBUKA FASILITASI ADD', 'UNDANGAN PERMOHONAN MEMBUKA FASILITASI ADD TAHUN 2019 (ANGKATAN I)\r\n\r\nHARI SELASA 15 JANUARI 2019, PUKUL 10:00 WIB, TEMPAT DI HOTEL VANDA TRAWAS', '2019-01-18 03:12:09'),
(11, 'PENYERAHAN SK KEPALA SEKOLAH SDN SE KAB. MOJOKERTO', 'PENYERAHAN SK KEPALA SEKOLAH SDN SE KAB. MOJOKERTO\r\n\r\nHARI RABU 16 JANUARI 2019, PUKUL 09:00 WIB, TEMPAT DI PENDOPO GRAHA MAJA TAMA', '2019-01-18 03:12:42'),
(12, 'UNDANGAN PERMOHONAN MEMBUKA FASILITASI ADD', 'UNDANGAN PERMOHONAN MEMBUKA FASILITASI ADD TAHUN 2019 (ANGKATAN II)\r\n\r\nHARI RABU 16 JANUARI 2019, PUKUL 10:00 WIB, TEMPAT DI HOTEL VANDA TRAWAS', '2019-01-18 03:13:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `level`) VALUES
(1, 'admin', 'admin', 1);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
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
  MODIFY `id_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `fk_kegiatan_level` FOREIGN KEY (`level`) REFERENCES `level` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
