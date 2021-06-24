-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2021 pada 13.07
-- Versi server: 10.4.14-MariaDB-log
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot_kriteria`
--

CREATE TABLE `bobot_kriteria` (
  `id_bobot` int(5) NOT NULL,
  `id_buku` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bobot_kriteria`
--

INSERT INTO `bobot_kriteria` (`id_bobot`, `id_buku`, `id_kriteria`, `bobot`) VALUES
(56, 7, 19, 0.15),
(57, 7, 20, 0.24),
(58, 7, 21, 0.1),
(59, 7, 22, 0.35),
(60, 7, 23, 0.1),
(61, 7, 24, 0.05),
(74, 10, 19, 0.2),
(75, 10, 20, 0.5),
(76, 10, 21, 0.7),
(77, 10, 22, 0.05),
(78, 10, 23, 0.5),
(79, 10, 24, 0.3),
(92, 13, 19, 0.15),
(93, 13, 20, 0.25),
(94, 13, 21, 0.1),
(95, 13, 22, 0.35),
(96, 13, 23, 0.1),
(97, 13, 24, 0.05),
(117, 15, 19, 0.3),
(118, 15, 20, 0.2),
(119, 15, 21, 0.2),
(120, 15, 22, 0.15),
(121, 15, 23, 0.15),
(122, 15, 24, 0.25),
(123, 15, 25, 0.2),
(124, 15, 26, 0.2),
(125, 15, 27, 0.15),
(126, 15, 28, 0.1),
(127, 15, 29, 0.1),
(128, 16, 30, 40),
(129, 16, 31, 30),
(132, 21, 32, 30),
(133, 21, 33, 20),
(134, 21, 34, 20),
(135, 21, 35, 15),
(136, 21, 36, 15),
(137, 21, 37, 25),
(138, 21, 38, 20),
(139, 21, 39, 20),
(140, 21, 40, 15),
(141, 21, 41, 10),
(142, 21, 42, 10),
(143, 21, 43, 0),
(144, 21, 44, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(5) NOT NULL,
  `tgl_buku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `tgl_buku`) VALUES
(19, '2021-04-15'),
(20, '2021-04-14'),
(21, '2021-05-19'),
(22, '2021-05-25'),
(23, '2021-06-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil`
--

CREATE TABLE `hasil` (
  `id_hasil` int(5) NOT NULL,
  `id_buku` int(5) NOT NULL,
  `id_karyawan` int(5) NOT NULL,
  `hasil` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil`
--

INSERT INTO `hasil` (`id_hasil`, `id_buku`, `id_karyawan`, `hasil`) VALUES
(109, 16, 91, 70),
(110, 16, 92, 55),
(111, 17, 93, 0),
(112, 20, 98, 0),
(113, 21, 99, 133.495),
(114, 21, 100, 147.33),
(115, 21, 101, 163.295),
(116, 21, 102, 135.82),
(117, 21, 103, 169.165),
(118, 21, 104, 154.51),
(119, 22, 105, 0),
(120, 21, 105, 154.515);

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(5) NOT NULL,
  `namakaryawan` varchar(250) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `pekerjaan` varchar(250) NOT NULL,
  `pinjaman` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `namakaryawan`, `nik`, `alamat`, `telp`, `tgl_lahir`, `pekerjaan`, `pinjaman`) VALUES
(99, 'Siti Aslimah Durga', 'CM171145', 'Dk Secekel Rt02/Rw02 Jatibarang, Mijen', '098793838383', '1999-02-01', '', '> 6 bulan'),
(100, 'Riska Agustina', 'CM180188', 'Ds. Kalijati Rt02/Rw04 Merbuh, Singorojo Kendal', '081293849495', '1999-05-03', '', '> 3 tahun'),
(101, 'Arif Chaerul Rahman', 'CM180313', 'Ds. Sambongsari Rt02/Rw02, Kendal', '082338890019', '1998-03-21', '', '3 tahun'),
(102, 'Fitra Rama Dhany', 'CM180406', 'Ngabean Rt01/Rw02 Boja, Kendal', '08367583799', '1998-10-11', '', '1 tahun'),
(103, 'Dian Ayu Wiasari', 'CM180167', 'Srinindito Raya Rt06/Rw01', '08953627890', '1999-03-16', '', '> 3 tahun'),
(104, 'Achmad Romadhon', 'CM180176', 'Ds. Gumenggeng, Salamsari Boja', '083459687953', '1997-01-11', '', '3 tahun'),
(105, 'Ariana Grande', 'CM17112', 'JL. Margosari Semarang tengah', '009', '2021-05-18', 'op', '2 tahun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(5) NOT NULL,
  `namakriteria` varchar(100) NOT NULL,
  `sifat` enum('benefit','cost') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `namakriteria`, `sifat`) VALUES
(32, 'Penguasaan Kerja', 'benefit'),
(33, 'Kualitas', 'benefit'),
(34, 'Kreatifitas', 'benefit'),
(35, 'Perencanaan', 'benefit'),
(36, 'Pemecahan Masalah', 'benefit'),
(37, 'Tanggung Jawab', 'benefit'),
(38, 'Disiplin', 'benefit'),
(39, 'Kerja Sama', 'benefit'),
(40, 'Inisiatif', 'benefit'),
(41, 'Kemandirian', 'benefit'),
(42, 'Komunikasi', 'benefit'),
(43, 'Absensi', 'cost'),
(44, 'Peringatan', 'cost');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_kriteria`
--

CREATE TABLE `nilai_kriteria` (
  `id_nilaikriteria` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `nilai` float NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `nilai_kriteria`
--

INSERT INTO `nilai_kriteria` (`id_nilaikriteria`, `id_kriteria`, `nilai`, `keterangan`) VALUES
(87, 30, 1, 'jelek'),
(88, 30, 2, 'baik'),
(89, 31, 1, 'jelek'),
(90, 31, 2, 'baik'),
(91, 32, 30, 'Sangat Baik'),
(92, 33, 30, 'Sangat Baik'),
(93, 34, 30, 'Sangat Baik'),
(94, 35, 30, 'Sangat Baik'),
(95, 36, 30, 'Sangat Baik'),
(96, 37, 30, 'Sangat Baik'),
(97, 38, 30, 'Sangat Baik'),
(98, 39, 30, 'Sangat Baik'),
(99, 40, 30, 'Sangat Baik'),
(100, 41, 30, 'Sangat Baik'),
(101, 42, 30, 'Sangat Baik'),
(102, 32, 25, 'Baik'),
(103, 33, 25, 'Baik'),
(104, 34, 25, 'Baik'),
(105, 35, 25, 'Baik'),
(106, 36, 25, 'Baik'),
(107, 37, 25, 'Baik'),
(108, 38, 25, 'Baik'),
(109, 39, 25, 'Baik'),
(110, 40, 25, 'Baik'),
(111, 41, 25, 'Baik'),
(112, 42, 25, 'Baik'),
(113, 32, 20, 'Cukup'),
(114, 33, 20, 'Cukup'),
(115, 34, 20, 'Cukup'),
(116, 35, 20, 'Cukup'),
(117, 36, 20, 'Cukup'),
(118, 37, 20, 'Cukup'),
(119, 38, 20, 'Cukup'),
(120, 39, 20, 'Cukup'),
(121, 40, 20, 'Cukup'),
(122, 41, 20, 'Cukup'),
(123, 42, 20, 'Cukup'),
(124, 32, 15, 'Kurang'),
(125, 33, 15, 'Kurang'),
(126, 34, 15, 'Kurang'),
(127, 35, 15, 'Kurang'),
(128, 36, 15, 'Kurang'),
(129, 37, 15, 'Kurang'),
(130, 38, 15, 'Kurang'),
(131, 39, 15, 'Kurang'),
(132, 40, 15, 'Kurang'),
(133, 41, 15, 'Kurang'),
(134, 42, 15, 'Kurang'),
(135, 32, 10, 'Sangat Kurang'),
(136, 33, 10, 'Sangat Kurang'),
(137, 34, 10, 'Sangat Kurang'),
(138, 35, 10, 'Sangat Kurang'),
(139, 36, 10, 'Sangat Kurang'),
(140, 37, 10, 'Sangat Kurang'),
(141, 38, 10, 'Sangat Kurang'),
(142, 39, 10, 'Sangat Kurang'),
(143, 40, 10, 'Sangat Kurang'),
(144, 41, 10, 'Sangat Kurang'),
(145, 42, 10, 'Sangat Kurang'),
(146, 43, 0, 'A'),
(147, 43, 6, 'I'),
(148, 43, 1, 'S'),
(149, 44, 5, 'ST'),
(150, 43, 4, 'CT'),
(151, 43, 5, 'CK'),
(152, 44, 0, 'SP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(5) NOT NULL,
  `id_karyawan` int(5) NOT NULL,
  `id_buku` int(5) NOT NULL,
  `id_kriteria` int(5) NOT NULL,
  `id_nilaikriteria` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_karyawan`, `id_buku`, `id_kriteria`, `id_nilaikriteria`) VALUES
(639, 91, 16, 30, 87),
(640, 91, 16, 31, 90),
(641, 92, 16, 30, 87),
(642, 92, 16, 31, 89),
(643, 93, 17, 30, 88),
(644, 93, 17, 31, 89),
(645, 98, 20, 30, 87),
(646, 98, 20, 31, 90),
(653, 99, 21, 32, 124),
(654, 99, 21, 33, 103),
(655, 99, 21, 34, 126),
(656, 99, 21, 35, 138),
(657, 99, 21, 36, 95),
(658, 99, 21, 37, 129),
(659, 99, 21, 38, 108),
(660, 99, 21, 39, 109),
(661, 99, 21, 40, 121),
(662, 99, 21, 41, 122),
(663, 99, 21, 42, 134),
(664, 100, 21, 32, 113),
(665, 100, 21, 33, 103),
(666, 100, 21, 34, 93),
(667, 100, 21, 35, 127),
(668, 100, 21, 36, 128),
(669, 100, 21, 37, 129),
(670, 100, 21, 38, 108),
(671, 100, 21, 39, 109),
(672, 100, 21, 40, 99),
(673, 100, 21, 41, 133),
(674, 100, 21, 42, 134),
(675, 101, 21, 32, 102),
(676, 101, 21, 33, 103),
(677, 101, 21, 34, 104),
(678, 101, 21, 35, 105),
(679, 101, 21, 36, 106),
(680, 101, 21, 37, 107),
(681, 101, 21, 38, 108),
(682, 101, 21, 39, 131),
(683, 101, 21, 40, 121),
(684, 101, 21, 41, 111),
(685, 101, 21, 42, 112),
(686, 102, 21, 32, 113),
(687, 102, 21, 33, 103),
(688, 102, 21, 34, 104),
(689, 102, 21, 35, 127),
(690, 102, 21, 36, 95),
(691, 102, 21, 37, 140),
(692, 102, 21, 38, 119),
(693, 102, 21, 39, 131),
(694, 102, 21, 40, 110),
(695, 102, 21, 41, 133),
(696, 102, 21, 42, 123),
(733, 103, 21, 32, 102),
(734, 103, 21, 33, 92),
(735, 103, 21, 34, 93),
(736, 103, 21, 35, 105),
(737, 103, 21, 36, 128),
(738, 103, 21, 37, 119),
(739, 103, 21, 38, 109),
(740, 103, 21, 39, 99),
(741, 103, 21, 40, 100),
(742, 103, 21, 41, 101),
(743, 104, 21, 32, 124),
(744, 104, 21, 33, 114),
(745, 104, 21, 34, 115),
(746, 104, 21, 35, 116),
(747, 104, 21, 36, 117),
(748, 104, 21, 37, 96),
(749, 104, 21, 38, 108),
(750, 104, 21, 39, 109),
(751, 104, 21, 40, 110),
(752, 104, 21, 41, 122),
(753, 104, 21, 42, 101),
(765, 105, 21, 32, 91),
(766, 105, 21, 33, 103),
(767, 105, 21, 34, 115),
(768, 105, 21, 35, 105),
(769, 105, 21, 36, 106),
(770, 105, 21, 37, 118),
(771, 105, 21, 38, 130),
(772, 105, 21, 39, 120),
(773, 105, 21, 40, 121),
(774, 105, 21, 41, 111),
(775, 105, 21, 42, 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Id_admin` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$N3h4DjTlI6kq6R0dPZtOF.pPCTuYJKpiFfwTXPxsznsKfUOr2dRfO');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  ADD PRIMARY KEY (`id_bobot`),
  ADD KEY `id_pinjaman` (`id_buku`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `hasil`
--
ALTER TABLE `hasil`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `id_pinjaman` (`id_buku`),
  ADD KEY `id_nasabah` (`id_karyawan`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  ADD PRIMARY KEY (`id_nilaikriteria`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `id_nasabah` (`id_karyawan`),
  ADD KEY `id_pinjaman` (`id_buku`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_nilaikriteria` (`id_nilaikriteria`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bobot_kriteria`
--
ALTER TABLE `bobot_kriteria`
  MODIFY `id_bobot` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `hasil`
--
ALTER TABLE `hasil`
  MODIFY `id_hasil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `nilai_kriteria`
--
ALTER TABLE `nilai_kriteria`
  MODIFY `id_nilaikriteria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=776;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `Id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
