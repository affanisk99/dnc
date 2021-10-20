-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 06 Jan 2020 pada 02.13
-- Versi Server: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dnc1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `aid` int(11) NOT NULL,
  `adate` datetime NOT NULL,
  `ajudul` varchar(255) NOT NULL,
  `aslug` varchar(255) NOT NULL,
  `akonten` longtext NOT NULL,
  `asampul` varchar(255) NOT NULL,
  `akategori` int(11) NOT NULL,
  `astatus` enum('publish','draft') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`aid`, `adate`, `ajudul`, `aslug`, `akonten`, `asampul`, `akategori`, `astatus`) VALUES
(1, '2020-01-03 18:09:59', 'artikel', 'artikel', '<p>testttt</p>\r\n', 'WhatsApp_Image_2019-12-27_at_15_38_09.jpeg', 3, 'publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kid` int(11) NOT NULL,
  `knama` varchar(65) NOT NULL,
  `kslug` varchar(65) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kid`, `knama`, `kslug`) VALUES
(3, 'Bahan Rasfur', 'bahan-rasfur'),
(4, 'Bahan Kasur', 'bahan-kasur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `pid` int(11) NOT NULL,
  `pdate` datetime NOT NULL,
  `pjudul` varchar(255) NOT NULL,
  `pslug` varchar(255) NOT NULL,
  `pkonten` longtext NOT NULL,
  `psampul` varchar(255) NOT NULL,
  `pkategori` int(11) NOT NULL,
  `pstatus` enum('publish','draft') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`pid`, `pdate`, `pjudul`, `pslug`, `pkonten`, `psampul`, `pkategori`, `pstatus`) VALUES
(1, '2020-01-03 18:11:20', 'Yatno', 'yatno', '<p>uadkagkjdagjksdgakjdg</p>\r\n', 'WhatsApp_Image_2019-12-27_at_15_38_06_(1).jpeg', 3, 'publish'),
(2, '2020-01-03 19:15:20', 'tayoo', 'tayoo', '<p>uagdusagd</p>\r\n', 'WhatsApp_Image_2019-12-27_at_15_38_09.jpeg', 4, 'publish'),
(3, '2020-01-06 07:39:33', 'Tora', 'tora', '<p>ajsgdkagdkjgdka</p>\r\n', 'WhatsApp_Image_2019-12-27_at_15_38_06_(2).jpeg', 3, 'publish'),
(4, '2020-01-06 07:39:50', 'ratoooo', 'ratoooo', '<p>akdshkahsdkahdkasj</p>\r\n', 'WhatsApp_Image_2019-12-27_at_15_38_10_(3).jpeg', 4, 'publish');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setweb`
--

CREATE TABLE `setweb` (
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `linkfb` varchar(255) NOT NULL,
  `linktwitter` varchar(255) NOT NULL,
  `linkig` varchar(255) NOT NULL,
  `nowa` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setweb`
--

INSERT INTO `setweb` (`nama`, `deskripsi`, `alamat`, `linkfb`, `linktwitter`, `linkig`, `nowa`, `email`) VALUES
('D&C Production', 'Bordir komputer di bekasi', '-', '-', '-', '-', '000000000', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `unama` varchar(50) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL,
  `ustatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`uid`, `unama`, `uemail`, `username`, `upassword`, `ustatus`) VALUES
(1, 'admin', 'affan.iskandarsyah@gmail.com', 'admin', '25d55ad283aa400af464c76d713c07ad', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kid`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
