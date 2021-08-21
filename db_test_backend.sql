-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Agu 2021 pada 11.30
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test_backend`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` varchar(12) NOT NULL,
  `ID_USER` varchar(12) NOT NULL,
  `NAMA_BARANG` varchar(100) NOT NULL,
  `KATEGORI_BARANG` varchar(100) NOT NULL,
  `FOTO_BARANG` varchar(255) NOT NULL,
  `HARGA_BARANG` int(11) NOT NULL,
  `DISKON_BARANG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `ID_USER`, `NAMA_BARANG`, `KATEGORI_BARANG`, `FOTO_BARANG`, `HARGA_BARANG`, `DISKON_BARANG`) VALUES
('BRG001', 'USR001', 'Headset QKZ', 'retail', '22fa19a3b83796f426645a941ad4d25e.jpg', 45000, 4500),
('BRG002', 'USR001', 'Spidol', 'wholesale', '9cf0a427dd963df16619059f27fe0fd2.jpg', 5000, 0),
('BRG003', 'USR001', 'Kertas A4', 'wholesale', '14aca8d2ab386ab0d332854c777065b3.jpg', 35000, 1750),
('BRG004', 'USR001', 'Kabel USB', 'retail', '92532aa00c77dd8c3bbd0b7f24af1627.jpg', 15000, 0);

--
-- Trigger `barang`
--
DELIMITER $$
CREATE TRIGGER `id_barang` BEFORE INSERT ON `barang` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT COUNT(*) INTO @id FROM barang;
set new.ID_BARANG=concat("BRG",LPAD(@id+1,3,'0'));
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_JABATAN` varchar(12) NOT NULL,
  `NAMA_JABATAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `NAMA_JABATAN`) VALUES
('JBT001', 'Super User'),
('JBT002', 'Basic User');

--
-- Trigger `jabatan`
--
DELIMITER $$
CREATE TRIGGER `id_jabatan` BEFORE INSERT ON `jabatan` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT COUNT(*) INTO @id FROM jabatan;
set new.ID_JABATAN=concat("JBT",LPAD(@id+1,3,'0'));
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` varchar(12) NOT NULL,
  `ID_JABATAN` varchar(12) NOT NULL,
  `NAMA_USER` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `ID_JABATAN`, `NAMA_USER`, `USERNAME`, `PASSWORD`) VALUES
('USR001', 'JBT001', 'Admin Super', 'admin001', 'admin001'),
('USR002', 'JBT002', 'Owner Toko', 'owner001', 'owner001');

--
-- Trigger `user`
--
DELIMITER $$
CREATE TRIGGER `id_user` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
DECLARE nr integer DEFAULT 0;

SELECT COUNT(*) INTO @id FROM user;
set new.ID_USER=concat("USR",LPAD(@id+1,3,'0'));
end
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `FK_MEMASUKKAN` (`ID_USER`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `FK_MEMILIKI` (`ID_JABATAN`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_MEMASUKKAN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`ID_JABATAN`) REFERENCES `jabatan` (`ID_JABATAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
