-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21 Feb 2017 pada 14.42
-- Versi Server: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_koperasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama_admin`, `status`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `alamat`, `no_hp`, `password`) VALUES
('11161343', 'AMIN NUR RAIS', 'TEGAL', '08999199451', 'e10adc3949ba59abbe56e057f20f883e'),
('11161344', 'EKA NOVIATUN K', 'TEGAL', '088888888', 'e10adc3949ba59abbe56e057f20f883e'),
('11161345', 'DEWI WULANDARI', 'ALAMAT', '08999199451', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Struktur dari tabel `angsuran`
--

CREATE TABLE IF NOT EXISTS `angsuran` (
  `id_angsuran` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_angsuran` date NOT NULL,
  `id_peminjaman` varchar(30) NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `perbulan` float NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  PRIMARY KEY (`id_angsuran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data untuk tabel `angsuran`
--

INSERT INTO `angsuran` (`id_angsuran`, `tgl_angsuran`, `id_peminjaman`, `id_anggota`, `username`, `perbulan`, `angsuran_ke`) VALUES
(1, '2017-02-14', '11161343-1', '11161343', 'admin', 1000, 1),
(7, '2017-02-14', '11161343-2', '11161343', 'admin', 750, 1),
(8, '2017-02-14', '11161344-1', '11161344', 'admin', 1000, 1),
(9, '2017-02-14', '11161344-1', '11161344', 'admin', 1000, 2),
(10, '2017-02-14', '11161344-1', '11161344', 'admin', 1000, 3),
(11, '2017-02-14', '11161344-1', '11161344', 'admin', 1000, 4),
(12, '2017-02-14', '11161344-1', '11161344', 'admin', 1000, 5),
(15, '2017-02-14', '11161343-2', '11161343', 'admin', 750, 2),
(16, '2017-02-14', '11161343-2', '11161343', 'admin', 750, 3),
(17, '2017-02-14', '11161343-1', '11161343', 'admin', 1500, 2),
(18, '2017-02-14', '11161343-1', '11161343', 'admin', 1500, 3),
(19, '2017-02-14', '11161343-1', '11161343', 'admin', 1500, 4),
(20, '2017-02-14', '11161343-1', '11161343', 'admin', 1500, 5),
(21, '2017-02-14', '11161343-1', '11161343', 'admin', 1500, 6),
(22, '2017-02-14', '11161343-1', '11161343', 'admin', 1500, 7),
(23, '2017-02-14', '11161343-1', '11161343', 'admin', 1500, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cicilan`
--

CREATE TABLE IF NOT EXISTS `cicilan` (
  `id_cicilan` int(11) NOT NULL AUTO_INCREMENT,
  `peminjaman` float NOT NULL,
  `cicilan` enum('12','24','36') NOT NULL,
  `perbulan` float NOT NULL,
  PRIMARY KEY (`id_cicilan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `cicilan`
--

INSERT INTO `cicilan` (`id_cicilan`, `peminjaman`, `cicilan`, `perbulan`) VALUES
(1, 15000, '12', 1500),
(2, 15000, '24', 750),
(3, 15000, '36', 500),
(4, 20000, '12', 2000),
(5, 20000, '24', 1000),
(6, 20000, '36', 700),
(7, 30000, '12', 3000),
(8, 30000, '24', 1500),
(9, 30000, '36', 1000),
(13, 40000, '12', 4000),
(14, 40000, '24', 2000),
(15, 40000, '36', 1300);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongan`
--

CREATE TABLE IF NOT EXISTS `lowongan` (
  `id_lowongan` int(11) NOT NULL AUTO_INCREMENT,
  `lowongan` varchar(100) NOT NULL,
  `status` enum('enable','disable') NOT NULL,
  PRIMARY KEY (`id_lowongan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data untuk tabel `lowongan`
--

INSERT INTO `lowongan` (`id_lowongan`, `lowongan`, `status`) VALUES
(1, 'Markom', 'disable'),
(2, 'BCC', 'disable'),
(3, 'BEC', 'disable'),
(4, 'LPPM', 'enable'),
(5, 'ADM', 'disable'),
(16, 'Marketing', 'enable'),
(17, 'Admin', 'enable');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
  `id_peminjaman` varchar(30) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `username` varchar(25) NOT NULL,
  `peminjaman` float NOT NULL,
  `cicilan` enum('12','24','36') NOT NULL,
  `perbulan` float NOT NULL,
  `ket` enum('LUNAS','BELUM') NOT NULL,
  PRIMARY KEY (`id_peminjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_peminjaman`, `id_anggota`, `username`, `peminjaman`, `cicilan`, `perbulan`, `ket`) VALUES
('11161343-1', '2017-02-13', '11161343', 'admin', 15000, '12', 1500, 'BELUM'),
('11161343-2', '2017-02-13', '11161343', 'admin', 15000, '24', 750, 'BELUM'),
('11161344-1', '2017-02-13', '11161344', 'admin', 30000, '36', 1000, 'BELUM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE IF NOT EXISTS `saldo` (
  `id_saldo` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` enum('simpan','pinjam') NOT NULL,
  `username` varchar(25) NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `tgl_saldo` datetime NOT NULL,
  `debet_perusahaan` float NOT NULL,
  `kridit_perusahaan` float NOT NULL,
  `saldo_perusahaan` float NOT NULL,
  `ket_saldo` text NOT NULL,
  PRIMARY KEY (`id_saldo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`id_saldo`, `jenis`, `username`, `id_anggota`, `tgl_saldo`, `debet_perusahaan`, `kridit_perusahaan`, `saldo_perusahaan`, `ket_saldo`) VALUES
(1, 'simpan', 'admin', '11161343', '2017-02-08 05:15:22', 0, 5000, 5000, 'Kridit 5000 Dari Akun 11161343'),
(5, 'simpan', 'admin', '11161343', '2017-02-09 04:33:31', 0, 10000, 15000, 'DEBET DARI AKUN 11161343'),
(6, 'simpan', 'admin', '11161343', '2017-02-09 04:34:00', 5000, 0, 10000, 'KRIDIT DARI AKUN 11161343'),
(9, 'simpan', 'admin', '11161344', '2017-02-09 04:38:53', 0, 5000, 15000, 'DEBET DARI AKUN 11161344'),
(10, 'simpan', 'admin', '11161345', '2017-02-09 04:39:03', 0, 10000, 25000, 'DEBET DARI AKUN 11161345'),
(11, 'simpan', 'admin', '11161343', '2017-02-09 04:39:21', 10000, 0, 15000, 'KRIDIT DARI AKUN 11161343'),
(12, 'simpan', 'admin', '11161344', '2017-02-13 13:28:44', 0, 10000, 25000, 'DEBET DARI AKUN 11161344'),
(13, 'pinjam', 'admin', '11161343', '2017-02-13 00:00:00', 15000, 0, 10000, 'PINJAM'),
(14, 'simpan', 'admin', '11161343', '2017-02-13 13:45:00', 0, 50000, 60000, 'DEBET DARI AKUN 11161343'),
(15, 'pinjam', 'admin', '11161344', '2017-02-13 13:45:48', 30000, 0, 30000, 'PINJAM'),
(16, 'pinjam', 'admin', '11161343', '2017-02-14 08:20:59', 0, 1000, 31000, 'ANGSURAN KE 1 DARI ID PEMINJAMAN 11161343-1'),
(17, 'pinjam', 'admin', '11161343', '2017-02-14 04:49:47', 0, 750, 31750, 'ANGSURAN KE 1 DARI ID PEMINJAMAN 11161343-2'),
(18, 'pinjam', 'admin', '11161344', '2017-02-14 04:52:27', 0, 1000, 32750, 'ANGSURAN KE 1 DARI ID PEMINJAMAN 11161344-1'),
(19, 'pinjam', 'admin', '11161344', '2017-02-14 04:52:31', 0, 1000, 33750, 'ANGSURAN KE 2 DARI ID PEMINJAMAN 11161344-1'),
(20, 'pinjam', 'admin', '11161344', '2017-02-14 04:52:37', 0, 1000, 34750, 'ANGSURAN KE 3 DARI ID PEMINJAMAN 11161344-1'),
(21, 'pinjam', 'admin', '11161344', '2017-02-14 04:52:42', 0, 1000, 35750, 'ANGSURAN KE 4 DARI ID PEMINJAMAN 11161344-1'),
(22, 'pinjam', 'admin', '11161344', '2017-02-14 04:53:07', 0, 1000, 36750, 'ANGSURAN KE 5 DARI ID PEMINJAMAN 11161344-1'),
(25, 'pinjam', 'admin', '11161343', '2017-02-14 04:57:03', 0, 750, 37500, 'ANGSURAN KE 2 DARI ID PEMINJAMAN 11161343-2'),
(26, 'pinjam', 'admin', '11161343', '2017-02-14 04:57:08', 0, 750, 38250, 'ANGSURAN KE 3 DARI ID PEMINJAMAN 11161343-2'),
(27, 'pinjam', 'admin', '11161343', '2017-02-14 04:57:12', 0, 1500, 39750, 'ANGSURAN KE 2 DARI ID PEMINJAMAN 11161343-1'),
(28, 'simpan', 'admin', '11161344', '2017-02-14 04:58:01', 0, 10000, 49750, 'DEBET DARI AKUN 11161344'),
(29, 'simpan', 'admin', '11161343', '2017-02-14 04:58:16', 5000, 0, 44750, 'KRIDIT DARI AKUN 11161343'),
(30, 'simpan', 'admin', '11161343', '2017-02-14 05:04:34', 40000, 0, 4750, 'KRIDIT DARI AKUN 11161343'),
(31, 'simpan', 'admin', '11161343', '2017-02-14 05:04:52', 0, 10000, 14750, 'DEBET DARI AKUN 11161343'),
(32, 'simpan', 'admin', '11161343', '2017-02-14 05:05:15', 0, 10000, 24750, 'DEBET DARI AKUN 11161343'),
(33, 'simpan', 'admin', '11161345', '2017-02-14 05:05:23', 0, 5000, 29750, 'DEBET DARI AKUN 11161345'),
(34, 'simpan', 'admin', '11161344', '2017-02-14 05:05:31', 0, 10000, 39750, 'DEBET DARI AKUN 11161344'),
(35, 'pinjam', 'admin', '11161343', '2017-02-14 06:11:39', 0, 1500, 41250, 'ANGSURAN KE 3 DARI ID PEMINJAMAN 11161343-1'),
(36, 'pinjam', 'admin', '11161343', '2017-02-14 06:11:44', 0, 1500, 42750, 'ANGSURAN KE 4 DARI ID PEMINJAMAN 11161343-1'),
(37, 'pinjam', 'admin', '11161343', '2017-02-14 06:11:49', 0, 1500, 44250, 'ANGSURAN KE 5 DARI ID PEMINJAMAN 11161343-1'),
(38, 'pinjam', 'admin', '11161343', '2017-02-14 06:11:54', 0, 1500, 45750, 'ANGSURAN KE 6 DARI ID PEMINJAMAN 11161343-1'),
(39, 'pinjam', 'admin', '11161343', '2017-02-14 06:11:59', 0, 1500, 47250, 'ANGSURAN KE 7 DARI ID PEMINJAMAN 11161343-1'),
(40, 'pinjam', 'admin', '11161343', '2017-02-14 06:12:05', 0, 1500, 48750, 'ANGSURAN KE 8 DARI ID PEMINJAMAN 11161343-1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `simpan`
--

CREATE TABLE IF NOT EXISTS `simpan` (
  `id_simpan` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `tgl_simpan` datetime NOT NULL,
  `debet_anggota` float NOT NULL,
  `kridit_anggota` float NOT NULL,
  `saldo_anggota` float NOT NULL,
  `ket_simpan` text NOT NULL,
  PRIMARY KEY (`id_simpan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `simpan`
--

INSERT INTO `simpan` (`id_simpan`, `username`, `id_anggota`, `tgl_simpan`, `debet_anggota`, `kridit_anggota`, `saldo_anggota`, `ket_simpan`) VALUES
(1, 'admin', '11161343', '2017-02-08 05:12:16', 5000, 0, 5000, 'DEBET'),
(10, 'admin', '11161343', '2017-02-09 04:33:31', 10000, 0, 15000, 'DEBET'),
(11, 'admin', '11161343', '2017-02-09 04:34:00', 0, 5000, 10000, 'KRIDIT'),
(14, 'admin', '11161344', '2017-02-09 04:38:53', 5000, 0, 5000, 'DEBET'),
(15, 'admin', '11161345', '2017-02-09 04:39:03', 10000, 0, 10000, 'DEBET'),
(16, 'admin', '11161343', '2017-02-09 04:39:21', 0, 10000, 0, 'KRIDIT'),
(17, 'admin', '11161344', '2017-02-13 13:28:44', 10000, 0, 15000, 'DEBET'),
(18, 'admin', '11161343', '2017-02-13 13:45:00', 50000, 0, 50000, 'DEBET'),
(19, 'admin', '11161344', '2017-02-14 04:58:01', 10000, 0, 25000, 'DEBET'),
(20, 'admin', '11161343', '2017-02-14 04:58:16', 0, 5000, 45000, 'KRIDIT'),
(21, 'admin', '11161343', '2017-02-14 05:04:34', 0, 40000, 5000, 'KRIDIT'),
(22, 'admin', '11161343', '2017-02-14 05:04:52', 10000, 0, 15000, 'DEBET'),
(23, 'admin', '11161343', '2017-02-14 05:05:15', 10000, 0, 25000, 'DEBET'),
(24, 'admin', '11161345', '2017-02-14 05:05:23', 5000, 0, 15000, 'DEBET'),
(25, 'admin', '11161344', '2017-02-14 05:05:31', 10000, 0, 35000, 'DEBET');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
