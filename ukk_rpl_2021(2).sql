-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Mar 2021 pada 17.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_rpl_2021`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`nik`, `nama`, `username`, `password`, `telp`) VALUES
('12345678', 'dini', 'dini', '64a85f8bb9a26e829563023f25175b879ec3c0cada5b9c09549421ef2c502fe2', '082286411'),
('25364783324', 'Ilham', 'Ilham', 'e467a85cdae98a0cb4edb5570aad4bd093dc2b652b6677a5949bd4ae36922bb4', '0867234432'),
('32656767787', 'erpan', 'erpan', '26df56986d590f015bcbcd022829321734d90c5486cdc4ef100163917d39d1f5', '0826424682'),
('3523451121', 'duta', 'dutamakkata', 'f4769539220c11a2a968b831708d3a5c962cd03004ffe03f7d4b942036911106', '0932324'),
('35236565', 'nungki', 'nungki', '058723ae8e8e08e635b970d96b601231d07175d106f6a925bdc8259c544f8fd9', '08453225'),
('37808372542', 'user', 'user', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', '0856121212'),
('37823547812442', 'abdul', 'abdul', '27652cad4994c0cc628413940eeb56600c86cfc35447c3c775d67610bb27aa61', '083857692818'),
('42354532132', 'imam', 'imam', 'dbf5584beb6deac6a248b11a97b4043906882f30b66a0327a1b75123e7da6676', '0826424682'),
('5326546', 'oke', 'oke', 'b13c0ea15587743a7971f9266557adce3406f98ddaf51d03c29de255eae16606', '08954345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` char(16) NOT NULL,
  `judul_laporan` varchar(255) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `judul_laporan`, `isi_laporan`, `foto`, `status`) VALUES
(10, '2021-03-04', '3523451121', 'Kecelakaan ', 'Kecelakaan Di tambak boyo', 'Money-Heist.png', '0'),
(11, '2021-03-05', '37823547812442', 'Koruptor Harus Dihukum Mati', 'halo admin. saya mempunyai pendapat bahwa koruptor harus dihukum mati', 'maxresdefault.jpg', 'selesai'),
(12, '2021-03-05', '37823547812442', 'Jalan masih banyak bergelombang', 'Halo admin, tolong sampaikan masih banyak jalan bergelombang di tuban', 'unnamed.jpg', '0'),
(13, '2021-03-05', '37823547812442', 'Covid makin melunjak', 'Halo admin, jumlah pasien positif covid di tuban makin melunjak, tolong bisa di adukan', 'rapid-tes-di-terminal_169.jpeg', 'selesai'),
(14, '2021-03-05', '32656767787', 'Internet Mahal', 'Halo admin, mohon diadukan masalah internet mahal dan terkadang lemot', 'maxresdefault.jpg', 'selesai'),
(15, '2021-03-06', '35236565', 'Kecelakaan Merakurak', 'halo admin, mohon bantuanya. ada kecelakaan parah', 'rapid-tes-di-terminal_169.jpeg', 'selesai'),
(16, '2021-03-06', '12345678', 'banjir', 'banjir bandang dan sumbangan belum sampai,di tangan masyarakat\r\nkenapa??\r\nada apa??\r\ndi korupsikah???', 'unnamed.jpg', 'selesai'),
(27, '2021-03-11', '25364783324', 'ISP makin mahal', 'halo admin, ', 'premanpensiunsangjuara_landscape.jpg', 'proses'),
(28, '2021-03-16', '12345678', 'Banjir bandang di jakarta barat ', 'halo mohon untuk pemerintah supaya menanggulangi dengan sigap', '064242000_1577883977-IMG-20200101-0053.jpg', 'selesai'),
(29, '2021-03-17', '42354532132', 'Pemerintah kurang peka dalam menangani narkoba', 'menurut saya pemerintah masih belum bisa menangani masalah narkoba, karena setiap tahun nya masih banyak kasus', 'obat-ilegal_ratio-16x9.jpg', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(13, 'admin', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '085676767', 'admin'),
(15, 'imam', 'petugas', '60415ee3422f216c66d7e38ae80f9896bb8f967abd0316e5b43c35e1672c8f7a', '083857692818', 'petugas'),
(16, 'khoiri', 'petugas', '0408a868203860f2b59764d5370efc0f8dab88d556b91325792c630a19fc64c6', '07854354', 'petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(11, 15, '2021-03-11', 'terimakasih telah melapor, aduan kamu akan kami lanjutkan ke lembaga terkait', 13),
(12, 14, '2021-03-11', 'terimakasih telah melapor, aduan kamu akan kami lanjutkan ke lembaga terkait', 13),
(13, 11, '2021-03-11', 'terimakasih telah melapor, aduan kamu akan kami lanjutkan ke lembaga terkait', 13),
(14, 16, '2021-03-11', 'terimakasih telah melapor, aduan kamu akan kami lanjutkan ke lembaga terkait', 13),
(16, 13, '2021-03-11', 'laporan kami terima, pengaduan akan kami proses secepatnya ^IL\r\n', 13),
(17, 28, '2021-03-16', 'pengaduan kami terima, aduan kamu akan kami teruskan ke lembaga terkait', 13),
(18, 29, '2021-03-17', 'Pengaduan kami terima, pengaduan akan di teruskan ke lembaga terkait', 13);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vcetaklaporan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vcetaklaporan` (
`id_pengaduan` int(11)
,`tgl_pengaduan` date
,`nik` char(16)
,`judul_laporan` varchar(255)
,`isi_laporan` text
,`foto` varchar(255)
,`status` enum('0','proses','selesai')
,`nama` varchar(35)
,`username` varchar(25)
,`telp` varchar(13)
,`id_tanggapan` int(11)
,`tgl_tanggapan` date
,`tanggapan` text
,`id_petugas` int(11)
,`nama_petugas` varchar(35)
,`level` enum('admin','petugas')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vpengaduan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vpengaduan` (
`id_pengaduan` int(11)
,`tgl_pengaduan` date
,`nik` char(16)
,`judul_laporan` varchar(255)
,`isi_laporan` text
,`foto` varchar(255)
,`status` enum('0','proses','selesai')
,`nama` varchar(35)
,`username` varchar(25)
,`password` varchar(255)
,`telp` varchar(13)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vtanggapan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vtanggapan` (
`id_pengaduan` int(11)
,`tgl_pengaduan` date
,`nik` char(16)
,`judul_laporan` varchar(255)
,`isi_laporan` text
,`foto` varchar(255)
,`status` enum('0','proses','selesai')
,`nama` varchar(35)
,`username` varchar(25)
,`telp` varchar(13)
,`id_tanggapan` int(11)
,`tgl_tanggapan` date
,`tanggapan` text
,`id_petugas` int(11)
,`nama_petugas` varchar(35)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vcetaklaporan`
--
DROP TABLE IF EXISTS `vcetaklaporan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vcetaklaporan`  AS  select `pengaduan`.`id_pengaduan` AS `id_pengaduan`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`pengaduan`.`nik` AS `nik`,`pengaduan`.`judul_laporan` AS `judul_laporan`,`pengaduan`.`isi_laporan` AS `isi_laporan`,`pengaduan`.`foto` AS `foto`,`pengaduan`.`status` AS `status`,`masyarakat`.`nama` AS `nama`,`masyarakat`.`username` AS `username`,`masyarakat`.`telp` AS `telp`,`tanggapan`.`id_tanggapan` AS `id_tanggapan`,`tanggapan`.`tgl_tanggapan` AS `tgl_tanggapan`,`tanggapan`.`tanggapan` AS `tanggapan`,`tanggapan`.`id_petugas` AS `id_petugas`,`petugas`.`nama_petugas` AS `nama_petugas`,`petugas`.`level` AS `level` from (`petugas` join ((`masyarakat` join `pengaduan` on(`masyarakat`.`nik` = `pengaduan`.`nik`)) join `tanggapan` on(`pengaduan`.`id_pengaduan` = `tanggapan`.`id_pengaduan`)) on(`petugas`.`id_petugas` = `tanggapan`.`id_petugas`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vpengaduan`
--
DROP TABLE IF EXISTS `vpengaduan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpengaduan`  AS  select `pengaduan`.`id_pengaduan` AS `id_pengaduan`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`pengaduan`.`nik` AS `nik`,`pengaduan`.`judul_laporan` AS `judul_laporan`,`pengaduan`.`isi_laporan` AS `isi_laporan`,`pengaduan`.`foto` AS `foto`,`pengaduan`.`status` AS `status`,`masyarakat`.`nama` AS `nama`,`masyarakat`.`username` AS `username`,`masyarakat`.`password` AS `password`,`masyarakat`.`telp` AS `telp` from (`masyarakat` join `pengaduan` on(`masyarakat`.`nik` = `pengaduan`.`nik`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vtanggapan`
--
DROP TABLE IF EXISTS `vtanggapan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vtanggapan`  AS  select `pengaduan`.`id_pengaduan` AS `id_pengaduan`,`pengaduan`.`tgl_pengaduan` AS `tgl_pengaduan`,`pengaduan`.`nik` AS `nik`,`pengaduan`.`judul_laporan` AS `judul_laporan`,`pengaduan`.`isi_laporan` AS `isi_laporan`,`pengaduan`.`foto` AS `foto`,`pengaduan`.`status` AS `status`,`masyarakat`.`nama` AS `nama`,`masyarakat`.`username` AS `username`,`masyarakat`.`telp` AS `telp`,`tanggapan`.`id_tanggapan` AS `id_tanggapan`,`tanggapan`.`tgl_tanggapan` AS `tgl_tanggapan`,`tanggapan`.`tanggapan` AS `tanggapan`,`tanggapan`.`id_petugas` AS `id_petugas`,`petugas`.`nama_petugas` AS `nama_petugas` from (`petugas` join ((`masyarakat` join `pengaduan` on(`masyarakat`.`nik` = `pengaduan`.`nik`)) join `tanggapan` on(`pengaduan`.`id_pengaduan` = `tanggapan`.`id_pengaduan`)) on(`petugas`.`id_petugas` = `tanggapan`.`id_petugas`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD KEY `id_pengaduan` (`id_pengaduan`,`id_petugas`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `masyarakat` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD CONSTRAINT `tanggapan_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tanggapan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
