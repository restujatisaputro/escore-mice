-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 07, 2026 at 03:11 PM
-- Server version: 10.11.14-MariaDB-cll-lve
-- PHP Version: 8.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest6794_imam`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(100) NOT NULL,
  `icon_fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama_pemilik` varchar(100) NOT NULL,
  `judul_website` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `twitter_widget` text NOT NULL,
  `google_map` text NOT NULL,
  `favicon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `judul_informasi` varchar(100) NOT NULL,
  `judul_seo` varchar(100) NOT NULL,
  `isi_informasi` text NOT NULL,
  `tanggal` date NOT NULL,
  `hari` varchar(25) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `kategori_seo` varchar(100) NOT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `main_menu` varchar(11) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `link`, `icon`, `main_menu`, `level`) VALUES
(0, 'Menu Utama', '', '', '0', 'admin'),
(1, 'BERANDA', 'admin', 'fa fa-home', '0', 'admin'),
(2, 'MASTER DATA', '#', 'fa fa-database', '0', 'admin'),
(3, 'Indikator', 'indikator', 'fa fa-check', '2', 'admin'),
(5, 'AUTOMATED CHECKLIST', '#', 'fa fa-dashboard', '0', 'admin'),
(6, 'Website', 'website', 'fa fa-check', '5', 'admin'),
(7, 'Analisa', 'analisa', 'fa fa-check', '5', 'admin'),
(8, 'Laporan', 'laporan', 'fa fa-check', '5', 'admin'),
(10, 'USERS', '#', 'fa fa-users', '0', 'admin'),
(11, 'Users', 'users', 'fa fa-check', '10', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_account`
--

CREATE TABLE `tb_account` (
  `kode_account` varchar(20) NOT NULL,
  `nama_account` varchar(150) NOT NULL,
  `kelompok` varchar(100) NOT NULL,
  `posisi` varchar(1) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_account`
--

INSERT INTO `tb_account` (`kode_account`, `nama_account`, `kelompok`, `posisi`, `photo`) VALUES
('11.01.01', 'Kas', 'Kas', 'D', ''),
('11.01.02', 'Rekening Bank', 'Kas', 'D', ''),
('11.01.03', 'Kas Kecil', 'Kas', 'D', ''),
('11.01.04', 'Panjar', 'Kas', 'D', ''),
('11.02.01', 'Piutang Lancar', 'Piutang', 'D', ''),
('11.02.02', 'Piutang Jangka Panjang', 'Piutang', 'D', ''),
('11.02.03', 'Piutang Lainnya', 'Piutang', 'D', ''),
('11.03.02', 'Persediaan Bahan Habis Pakai', 'Persediaan', 'D', ''),
('11.03.04', 'Persediaan Alat Tulis dan Cetakan', 'Persediaan', 'D', ''),
('11.03.05', 'Persediaan Lainnya', 'Persediaan', 'D', ''),
('11.04.01', 'Sewa Dibayar Dimuka-Rumah', 'Biaya Dibayar Dimuka', 'D', ''),
('11.04.02', 'Sewa Dibayar Dimuka-Kantor', 'Biaya Dibayar Dimuka', 'D', ''),
('11.04.03', 'Rupa-rupa Biaya Dibayar Dimuka', 'Biaya Dibayar Dimuka', 'D', ''),
('11.05.01', 'Uang Muka Operasional', 'Biaya Dibayar Dimuka', 'D', ''),
('11.05.02', 'Uang Muka Perjalanan Dinas', 'Biaya Dibayar Dimuka', 'D', ''),
('11.05.03', 'Uang Muka Pembelian', 'Biaya Dibayar Dimuka', 'D', ''),
('11.05.05', 'Rupa-rupa Pembayaran Dimuka Lainnya', 'Biaya Dibayar Dimuka', 'D', ''),
('11.05.06', 'Perlengkapan', 'Perlengkapan', 'D', ''),
('12.01.01', 'Tanah dan hak Atas Tanah', 'Tanah', 'D', ''),
('12.01.02', 'Penyempurnaan Tanah', 'Tanah', 'D', ''),
('12.01.03', 'Bangunan dan Perbaikannya ', 'Bangunan', 'D', ''),
('12.01.04', 'Bangunan Kantor ', 'Bangunan', 'D', ''),
('12.01.06', 'Bangunan Gedung Peralatan ', 'Bangunan', 'D', ''),
('12.01.07', 'Bangunan Rumah Dinas ', 'Bangunan', 'D', ''),
('13.02.01', 'Alat-alat Pergudangan ', 'Peralatan', 'D', ''),
('13.02.03', 'Alat-alat Perhubungan/Telekomunikasi ', 'Peralatan', 'D', ''),
('13.02.04', 'Alat-alat Berat ', 'Peralatan', 'D', ''),
('13.02.05', 'Rupa-rupa Alat-alat dan Perlengkapan Lainnya ', 'Peralatan', 'D', ''),
('13.03.06', 'Kendaraan', 'Kendaraan', 'D', ''),
('13.04.01', 'Akum Peny Alat Pergudangan', 'Peralatan', 'K', ''),
('13.04.03', 'Akum Peny Alat Perhubungan/Telekomunikasi', 'Peralatan', 'K', ''),
('13.04.04', 'Akum Peny Alat-alat Berat', 'Peralatan', 'K', ''),
('13.04.05', 'Akum Peny Rupa-rupa Peralatan Lainnya', 'Peralatan', 'K', ''),
('13.04.06', 'Akum Peny Kendaraan', 'Kendaraan', 'K', ''),
('14.01.01', 'Hutang Lancar', 'Hutang Lancar', 'K', ''),
('14.01.02', 'Hutang Jangka Panjang', 'Hutang Jangka Panjang', 'K', ''),
('14.01.03', 'Hutang Lainnya', 'Hutang Lancar', 'K', ''),
('15.01.04', 'Modal', 'Modal', 'K', ''),
('16.01.01', 'Laba (Rugi) Tahun Lalu ', 'Laba Rugi', 'K', ''),
('16.01.02', 'Laba(Rugi) Tahun Berjalan ', 'Laba Rugi', 'K', ''),
('17.01.01', 'Pendapatan Jasa', 'Pendapatan', 'K', ''),
('17.01.02', 'Pendapatan', 'Pendapatan', 'K', ''),
('17.01.03', 'Pendapatan Lainnya', 'Pendapatan', 'K', ''),
('18.01.01', 'Biaya Bahan Bakar', 'Biaya Operasional', 'D', ''),
('18.01.02', 'Biaya Listrik PLN ', 'Biaya Operasional', 'D', ''),
('18.01.03', 'Biaya Telekomunikasi', 'Biaya Operasional', 'D', ''),
('18.01.04', 'Biaya Internet', 'Biaya Operasional', 'D', ''),
('18.01.05', 'Biaya Alat Tulis Kantor', 'Biaya Operasional', 'D', ''),
('18.01.06', 'Biaya Pemeliharaan Kendaraan', 'Biaya Operasional', 'D', ''),
('18.01.07', 'Biaya Pegawai', 'Biaya Operasional', 'D', ''),
('18.01.08', 'Biaya Operasional Lainnya', 'Biaya Operasional', 'D', ''),
('19.01.09', 'Biaya Non Operasional', 'Biaya Non Operasional', 'D', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_analisakeyword`
--

CREATE TABLE `tb_analisakeyword` (
  `id_analisa` int(11) NOT NULL,
  `id_website` varchar(150) NOT NULL,
  `alamat_website` text NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `indikator` text NOT NULL,
  `nilai_indikator` varchar(20) NOT NULL,
  `kelompok` varchar(100) NOT NULL,
  `inputer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_analisakeyword`
--

INSERT INTO `tb_analisakeyword` (`id_analisa`, `id_website`, `alamat_website`, `id_indikator`, `indikator`, `nilai_indikator`, `kelompok`, `inputer`) VALUES
(63, '1', 'www.japan.travel/en/', 1, '1', '0', 'GREEN D WEB VARIABLES', 'admin'),
(64, '1', 'www.japan.travel/en/', 2, '2', '1', 'GREEN D WEB VARIABLES', 'admin'),
(65, '1', 'www.japan.travel/en/', 3, '3', '0', 'GREEN D WEB VARIABLES', 'admin'),
(66, '1', 'www.japan.travel/en/', 4, '4', '0', 'GREEN D WEB VARIABLES', 'admin'),
(67, '1', 'www.japan.travel/en/', 5, '5', '0', 'GREEN D WEB VARIABLES', 'admin'),
(68, '1', 'www.japan.travel/en/', 6, '6', '0', 'GREEN D WEB VARIABLES', 'admin'),
(69, '1', 'www.japan.travel/en/', 7, '7', '0', 'GREEN D WEB VARIABLES', 'admin'),
(70, '1', 'www.japan.travel/en/', 8, '8', '0', 'GREEN D WEB VARIABLES', 'admin'),
(71, '1', 'www.japan.travel/en/', 9, '9', '0', 'GREEN D WEB VARIABLES', 'admin'),
(72, '1', 'www.japan.travel/en/', 10, '10', '0', 'GREEN D WEB VARIABLES', 'admin'),
(73, '1', 'www.japan.travel/en/', 11, '11', '0', 'GREEN D WEB VARIABLES', 'admin'),
(74, '1', 'www.japan.travel/en/', 12, '12', '0', 'GREEN D WEB VARIABLES', 'admin'),
(75, '1', 'www.japan.travel/en/', 13, '13', '0', 'GREEN D WEB VARIABLES', 'admin'),
(76, '1', 'www.japan.travel/en/', 14, '14', '0', 'GREEN D WEB VARIABLES', 'admin'),
(77, '1', 'www.japan.travel/en/', 15, '15', '1', 'GREEN D WEB VARIABLES', 'admin'),
(78, '1', 'www.japan.travel/en/', 16, '16', '0', 'GREEN D WEB VARIABLES', 'admin'),
(79, '1', 'www.japan.travel/en/', 17, '17', '0', 'GREEN D WEB VARIABLES', 'admin'),
(80, '1', 'www.japan.travel/en/', 18, '18', '0', 'GREEN D WEB VARIABLES', 'admin'),
(81, '1', 'www.japan.travel/en/', 19, '19', '0', 'GREEN D WEB VARIABLES', 'admin'),
(82, '1', 'www.japan.travel/en/', 20, '20', '0', 'GREEN D WEB VARIABLES', 'admin'),
(83, '1', 'www.japan.travel/en/', 21, '21', '0', 'GREEN D WEB VARIABLES', 'admin'),
(84, '1', 'www.japan.travel/en/', 22, '22', '1', 'GREEN D WEB VARIABLES', 'admin'),
(85, '1', 'www.japan.travel/en/', 23, '23', '0', 'GREEN D WEB VARIABLES', 'admin'),
(86, '1', 'www.japan.travel/en/', 24, '24', '0', 'GREEN D WEB VARIABLES', 'admin'),
(87, '1', 'www.japan.travel/en/', 25, '25', '1', 'GREEN D WEB VARIABLES', 'admin'),
(88, '1', 'www.japan.travel/en/', 26, '26', '0', 'GREEN D WEB VARIABLES', 'admin'),
(89, '1', 'www.japan.travel/en/', 27, '27', '1', 'GREEN D WEB VARIABLES', 'admin'),
(90, '1', 'www.japan.travel/en/', 28, '28', '1', 'GREEN D WEB VARIABLES', 'admin'),
(91, '1', 'www.japan.travel/en/', 29, '29', '1', 'GREEN D WEB VARIABLES', 'admin'),
(92, '1', 'www.japan.travel/en/', 30, '30', '1', 'GREEN D WEB VARIABLES', 'admin'),
(93, '1', 'www.japan.travel/en/', 31, '31', '0', 'GREEN D WEB VARIABLES', 'admin'),
(94, '1', 'www.japan.travel/en/', 32, '32', '0', 'GREEN D WEB VARIABLES', 'admin'),
(95, '1', 'www.japan.travel/en/', 33, '33', '0', 'GREEN D WEB VARIABLES', 'admin'),
(96, '1', 'www.japan.travel/en/', 34, '34', '0', 'GREEN D WEB VARIABLES', 'admin'),
(97, '1', 'www.japan.travel/en/', 35, '1', '0', 'MICE or CVB', 'admin'),
(98, '1', 'www.japan.travel/en/', 36, '2', '0', 'MICE or CVB', 'admin'),
(99, '1', 'www.japan.travel/en/', 37, '3', '0', 'MICE or CVB', 'admin'),
(100, '1', 'www.japan.travel/en/', 38, '4', '1', 'MICE or CVB', 'admin'),
(101, '1', 'www.japan.travel/en/', 39, '5', '0', 'MICE or CVB', 'admin'),
(102, '1', 'www.japan.travel/en/', 40, '6', '1', 'MICE or CVB', 'admin'),
(103, '1', 'www.japan.travel/en/', 41, '7', '1', 'MICE or CVB', 'admin'),
(104, '1', 'www.japan.travel/en/', 42, '8', '0', 'MICE or CVB', 'admin'),
(105, '1', 'www.japan.travel/en/', 43, '9', '0', 'MICE or CVB', 'admin'),
(106, '1', 'www.japan.travel/en/', 44, '10', '0', 'MICE or CVB', 'admin'),
(107, '1', 'www.japan.travel/en/', 45, '11', '0', 'MICE or CVB', 'admin'),
(108, '1', 'www.japan.travel/en/', 46, '12', '0', 'MICE or CVB', 'admin'),
(109, '1', 'www.japan.travel/en/', 47, '13', '1', 'MICE or CVB', 'admin'),
(110, '1', 'www.japan.travel/en/', 48, '14', '1', 'MICE or CVB', 'admin'),
(111, '1', 'www.japan.travel/en/', 49, '15', '0', 'MICE or CVB', 'admin'),
(112, '1', 'www.japan.travel/en/', 50, '16', '0', 'MICE or CVB', 'admin'),
(113, '1', 'www.japan.travel/en/', 51, '17', '0', 'MICE or CVB', 'admin'),
(114, '1', 'www.japan.travel/en/', 52, '18', '0', 'MICE or CVB', 'admin'),
(115, '1', 'www.japan.travel/en/', 53, '19', '1', 'MICE or CVB', 'admin'),
(116, '1', 'www.japan.travel/en/', 54, '20', '0', 'MICE or CVB', 'admin'),
(117, '1', 'www.japan.travel/en/', 55, '21', '0', 'MICE or CVB', 'admin'),
(118, '1', 'www.japan.travel/en/', 56, '22', '0', 'MICE or CVB', 'admin'),
(119, '1', 'www.japan.travel/en/', 57, '23', '0', 'MICE or CVB', 'admin'),
(120, '1', 'www.japan.travel/en/', 58, '24', '0', 'MICE or CVB', 'admin'),
(121, '1', 'www.japan.travel/en/', 59, '25', '0', 'MICE or CVB', 'admin'),
(122, '1', 'www.japan.travel/en/', 60, '26', '1', 'MICE or CVB', 'admin'),
(123, '1', 'www.japan.travel/en/', 61, '27', '0', 'MICE or CVB', 'admin'),
(124, '1', 'www.japan.travel/en/', 62, '28', '0', 'MICE or CVB', 'admin'),
(125, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 1, '1', '0', 'GREEN D WEB VARIABLES', 'admin'),
(126, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 2, '2', '1', 'GREEN D WEB VARIABLES', 'admin'),
(127, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 3, '3', '0', 'GREEN D WEB VARIABLES', 'admin'),
(128, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 4, '4', '0', 'GREEN D WEB VARIABLES', 'admin'),
(129, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 5, '5', '0', 'GREEN D WEB VARIABLES', 'admin'),
(130, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 6, '6', '1', 'GREEN D WEB VARIABLES', 'admin'),
(131, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 7, '7', '0', 'GREEN D WEB VARIABLES', 'admin'),
(132, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 8, '8', '1', 'GREEN D WEB VARIABLES', 'admin'),
(133, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 9, '9', '0', 'GREEN D WEB VARIABLES', 'admin'),
(134, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 10, '10', '0', 'GREEN D WEB VARIABLES', 'admin'),
(135, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 11, '11', '0', 'GREEN D WEB VARIABLES', 'admin'),
(136, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 12, '12', '0', 'GREEN D WEB VARIABLES', 'admin'),
(137, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 13, '13', '0', 'GREEN D WEB VARIABLES', 'admin'),
(138, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 14, '14', '1', 'GREEN D WEB VARIABLES', 'admin'),
(139, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 15, '15', '1', 'GREEN D WEB VARIABLES', 'admin'),
(140, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 16, '16', '0', 'GREEN D WEB VARIABLES', 'admin'),
(141, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 17, '17', '0', 'GREEN D WEB VARIABLES', 'admin'),
(142, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 18, '18', '0', 'GREEN D WEB VARIABLES', 'admin'),
(143, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 19, '19', '0', 'GREEN D WEB VARIABLES', 'admin'),
(144, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 20, '20', '0', 'GREEN D WEB VARIABLES', 'admin'),
(145, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 21, '21', '0', 'GREEN D WEB VARIABLES', 'admin'),
(146, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 22, '22', '1', 'GREEN D WEB VARIABLES', 'admin'),
(147, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 23, '23', '0', 'GREEN D WEB VARIABLES', 'admin'),
(148, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 24, '24', '0', 'GREEN D WEB VARIABLES', 'admin'),
(149, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 25, '25', '1', 'GREEN D WEB VARIABLES', 'admin'),
(150, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 26, '26', '0', 'GREEN D WEB VARIABLES', 'admin'),
(151, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 27, '27', '0', 'GREEN D WEB VARIABLES', 'admin'),
(152, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 28, '28', '0', 'GREEN D WEB VARIABLES', 'admin'),
(153, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 29, '29', '0', 'GREEN D WEB VARIABLES', 'admin'),
(154, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 30, '30', '0', 'GREEN D WEB VARIABLES', 'admin'),
(155, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 31, '31', '0', 'GREEN D WEB VARIABLES', 'admin'),
(156, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 32, '32', '0', 'GREEN D WEB VARIABLES', 'admin'),
(157, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 33, '33', '0', 'GREEN D WEB VARIABLES', 'admin'),
(158, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 34, '34', '0', 'GREEN D WEB VARIABLES', 'admin'),
(159, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 35, '1', '0', 'MICE or CVB', 'admin'),
(160, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 36, '2', '0', 'MICE or CVB', 'admin'),
(161, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 37, '3', '0', 'MICE or CVB', 'admin'),
(162, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 38, '4', '1', 'MICE or CVB', 'admin'),
(163, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 39, '5', '1', 'MICE or CVB', 'admin'),
(164, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 40, '6', '1', 'MICE or CVB', 'admin'),
(165, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 41, '7', '0', 'MICE or CVB', 'admin'),
(166, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 42, '8', '1', 'MICE or CVB', 'admin'),
(167, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 43, '9', '0', 'MICE or CVB', 'admin'),
(168, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 44, '10', '0', 'MICE or CVB', 'admin'),
(169, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 45, '11', '1', 'MICE or CVB', 'admin'),
(170, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 46, '12', '0', 'MICE or CVB', 'admin'),
(171, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 47, '13', '1', 'MICE or CVB', 'admin'),
(172, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 48, '14', '0', 'MICE or CVB', 'admin'),
(173, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 49, '15', '1', 'MICE or CVB', 'admin'),
(174, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 50, '16', '1', 'MICE or CVB', 'admin'),
(175, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 51, '17', '0', 'MICE or CVB', 'admin'),
(176, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 52, '18', '0', 'MICE or CVB', 'admin'),
(177, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 53, '19', '1', 'MICE or CVB', 'admin'),
(178, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 54, '20', '0', 'MICE or CVB', 'admin'),
(179, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 55, '21', '0', 'MICE or CVB', 'admin'),
(180, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 56, '22', '1', 'MICE or CVB', 'admin'),
(181, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 57, '23', '0', 'MICE or CVB', 'admin'),
(182, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 58, '24', '0', 'MICE or CVB', 'admin'),
(183, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 59, '25', '0', 'MICE or CVB', 'admin'),
(184, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 60, '26', '1', 'MICE or CVB', 'admin'),
(185, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 61, '27', '0', 'MICE or CVB', 'admin'),
(186, '4', 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 62, '28', '0', 'MICE or CVB', 'admin'),
(187, '3', 'https://www.visitbritain.com/', 1, '1', '0', 'GREEN D WEB VARIABLES', 'admin'),
(188, '3', 'https://www.visitbritain.com/', 2, '2', '0', 'GREEN D WEB VARIABLES', 'admin'),
(189, '3', 'https://www.visitbritain.com/', 3, '3', '0', 'GREEN D WEB VARIABLES', 'admin'),
(190, '3', 'https://www.visitbritain.com/', 4, '4', '0', 'GREEN D WEB VARIABLES', 'admin'),
(191, '3', 'https://www.visitbritain.com/', 5, '5', '0', 'GREEN D WEB VARIABLES', 'admin'),
(192, '3', 'https://www.visitbritain.com/', 6, '6', '0', 'GREEN D WEB VARIABLES', 'admin'),
(193, '3', 'https://www.visitbritain.com/', 7, '7', '0', 'GREEN D WEB VARIABLES', 'admin'),
(194, '3', 'https://www.visitbritain.com/', 8, '8', '0', 'GREEN D WEB VARIABLES', 'admin'),
(195, '3', 'https://www.visitbritain.com/', 9, '9', '0', 'GREEN D WEB VARIABLES', 'admin'),
(196, '3', 'https://www.visitbritain.com/', 10, '10', '0', 'GREEN D WEB VARIABLES', 'admin'),
(197, '3', 'https://www.visitbritain.com/', 11, '11', '0', 'GREEN D WEB VARIABLES', 'admin'),
(198, '3', 'https://www.visitbritain.com/', 12, '12', '1', 'GREEN D WEB VARIABLES', 'admin'),
(199, '3', 'https://www.visitbritain.com/', 13, '13', '0', 'GREEN D WEB VARIABLES', 'admin'),
(200, '3', 'https://www.visitbritain.com/', 14, '14', '1', 'GREEN D WEB VARIABLES', 'admin'),
(201, '3', 'https://www.visitbritain.com/', 15, '15', '1', 'GREEN D WEB VARIABLES', 'admin'),
(202, '3', 'https://www.visitbritain.com/', 16, '16', '0', 'GREEN D WEB VARIABLES', 'admin'),
(203, '3', 'https://www.visitbritain.com/', 17, '17', '0', 'GREEN D WEB VARIABLES', 'admin'),
(204, '3', 'https://www.visitbritain.com/', 18, '18', '0', 'GREEN D WEB VARIABLES', 'admin'),
(205, '3', 'https://www.visitbritain.com/', 19, '19', '0', 'GREEN D WEB VARIABLES', 'admin'),
(206, '3', 'https://www.visitbritain.com/', 20, '20', '0', 'GREEN D WEB VARIABLES', 'admin'),
(207, '3', 'https://www.visitbritain.com/', 21, '21', '0', 'GREEN D WEB VARIABLES', 'admin'),
(208, '3', 'https://www.visitbritain.com/', 22, '22', '1', 'GREEN D WEB VARIABLES', 'admin'),
(209, '3', 'https://www.visitbritain.com/', 23, '23', '0', 'GREEN D WEB VARIABLES', 'admin'),
(210, '3', 'https://www.visitbritain.com/', 24, '24', '0', 'GREEN D WEB VARIABLES', 'admin'),
(211, '3', 'https://www.visitbritain.com/', 25, '25', '0', 'GREEN D WEB VARIABLES', 'admin'),
(212, '3', 'https://www.visitbritain.com/', 26, '26', '0', 'GREEN D WEB VARIABLES', 'admin'),
(213, '3', 'https://www.visitbritain.com/', 27, '27', '0', 'GREEN D WEB VARIABLES', 'admin'),
(214, '3', 'https://www.visitbritain.com/', 28, '28', '0', 'GREEN D WEB VARIABLES', 'admin'),
(215, '3', 'https://www.visitbritain.com/', 29, '29', '0', 'GREEN D WEB VARIABLES', 'admin'),
(216, '3', 'https://www.visitbritain.com/', 30, '30', '0', 'GREEN D WEB VARIABLES', 'admin'),
(217, '3', 'https://www.visitbritain.com/', 31, '31', '0', 'GREEN D WEB VARIABLES', 'admin'),
(218, '3', 'https://www.visitbritain.com/', 32, '32', '0', 'GREEN D WEB VARIABLES', 'admin'),
(219, '3', 'https://www.visitbritain.com/', 33, '33', '0', 'GREEN D WEB VARIABLES', 'admin'),
(220, '3', 'https://www.visitbritain.com/', 34, '34', '0', 'GREEN D WEB VARIABLES', 'admin'),
(221, '3', 'https://www.visitbritain.com/', 35, '1', '0', 'MICE or CVB', 'admin'),
(222, '3', 'https://www.visitbritain.com/', 36, '2', '0', 'MICE or CVB', 'admin'),
(223, '3', 'https://www.visitbritain.com/', 37, '3', '0', 'MICE or CVB', 'admin'),
(224, '3', 'https://www.visitbritain.com/', 38, '4', '0', 'MICE or CVB', 'admin'),
(225, '3', 'https://www.visitbritain.com/', 39, '5', '0', 'MICE or CVB', 'admin'),
(226, '3', 'https://www.visitbritain.com/', 40, '6', '0', 'MICE or CVB', 'admin'),
(227, '3', 'https://www.visitbritain.com/', 41, '7', '0', 'MICE or CVB', 'admin'),
(228, '3', 'https://www.visitbritain.com/', 42, '8', '0', 'MICE or CVB', 'admin'),
(229, '3', 'https://www.visitbritain.com/', 43, '9', '0', 'MICE or CVB', 'admin'),
(230, '3', 'https://www.visitbritain.com/', 44, '10', '0', 'MICE or CVB', 'admin'),
(231, '3', 'https://www.visitbritain.com/', 45, '11', '0', 'MICE or CVB', 'admin'),
(232, '3', 'https://www.visitbritain.com/', 46, '12', '0', 'MICE or CVB', 'admin'),
(233, '3', 'https://www.visitbritain.com/', 47, '13', '0', 'MICE or CVB', 'admin'),
(234, '3', 'https://www.visitbritain.com/', 48, '14', '1', 'MICE or CVB', 'admin'),
(235, '3', 'https://www.visitbritain.com/', 49, '15', '0', 'MICE or CVB', 'admin'),
(236, '3', 'https://www.visitbritain.com/', 50, '16', '0', 'MICE or CVB', 'admin'),
(237, '3', 'https://www.visitbritain.com/', 51, '17', '0', 'MICE or CVB', 'admin'),
(238, '3', 'https://www.visitbritain.com/', 52, '18', '0', 'MICE or CVB', 'admin'),
(239, '3', 'https://www.visitbritain.com/', 53, '19', '1', 'MICE or CVB', 'admin'),
(240, '3', 'https://www.visitbritain.com/', 54, '20', '0', 'MICE or CVB', 'admin'),
(241, '3', 'https://www.visitbritain.com/', 55, '21', '0', 'MICE or CVB', 'admin'),
(242, '3', 'https://www.visitbritain.com/', 56, '22', '0', 'MICE or CVB', 'admin'),
(243, '3', 'https://www.visitbritain.com/', 57, '23', '0', 'MICE or CVB', 'admin'),
(244, '3', 'https://www.visitbritain.com/', 58, '24', '0', 'MICE or CVB', 'admin'),
(245, '3', 'https://www.visitbritain.com/', 59, '25', '0', 'MICE or CVB', 'admin'),
(246, '3', 'https://www.visitbritain.com/', 60, '26', '1', 'MICE or CVB', 'admin'),
(247, '3', 'https://www.visitbritain.com/', 61, '27', '0', 'MICE or CVB', 'admin'),
(248, '3', 'https://www.visitbritain.com/', 62, '28', '0', 'MICE or CVB', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_indikator`
--

CREATE TABLE `tb_indikator` (
  `id_indikator` int(11) NOT NULL,
  `no_indikator` int(11) NOT NULL,
  `indikator` text NOT NULL,
  `kelompok` varchar(100) NOT NULL,
  `inputer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_indikator`
--

INSERT INTO `tb_indikator` (`id_indikator`, `no_indikator`, `indikator`, `kelompok`, `inputer`) VALUES
(1, 1, 'green travel, sustainable travel, responsible travel', 'GREEN D WEB VARIABLES', 'Admin'),
(2, 2, 'green tour, footprint travel, sustainable, eco tourism', 'GREEN D WEB VARIABLES', 'Admin'),
(3, 3, 'green segment, green travel segment', 'GREEN D WEB VARIABLES', 'Admin'),
(4, 4, 'green tips, green travel tips', 'GREEN D WEB VARIABLES', 'Admin'),
(5, 5, 'carbon offset, carbon calculator, carbon payment, carbon emission, carbon pricing', 'GREEN D WEB VARIABLES', 'Admin'),
(6, 6, 'green accreditation, clean energy, energy', 'GREEN D WEB VARIABLES', 'Admin'),
(7, 7, 'environmental friendly attractions, eco-friendly activities', 'GREEN D WEB VARIABLES', 'Admin'),
(8, 8, 'green transport, public transport, electric vehicle', 'GREEN D WEB VARIABLES', 'Admin'),
(9, 9, 'climate change, global warming', 'GREEN D WEB VARIABLES', 'Admin'),
(10, 10, 'farming holidays, agriculture, farm tour', 'GREEN D WEB VARIABLES', 'Admin'),
(11, 11, 'volunteer travel, public service, community service', 'GREEN D WEB VARIABLES', 'Admin'),
(12, 12, 'walking tours, walking holidays, walk, trekking, hiking, kayaking', 'GREEN D WEB VARIABLES', 'Admin'),
(13, 13, 'cycling, mount bike tours, mount bike holidays, bike tours, bike tourism, bicycle tour', 'GREEN D WEB VARIABLES', 'Admin'),
(14, 14, 'preserving, environment', 'GREEN D WEB VARIABLES', 'Admin'),
(15, 15, 'wilderness tours, wilderness exploration, wild, nature expedition, nature', 'GREEN D WEB VARIABLES', 'Admin'),
(16, 16, 'local transport, shuttle', 'GREEN D WEB VARIABLES', 'Admin'),
(17, 17, 'bird, bird-watching tours, birding, conservation, conserve, biodiversity', 'GREEN D WEB VARIABLES', 'admin'),
(18, 18, 'botany tours, botanical tours, planting', 'GREEN D WEB VARIABLES', 'Admin'),
(19, 19, 'cooking activities', 'GREEN D WEB VARIABLES', 'Admin'),
(20, 20, 'food travel, food tour', 'GREEN D WEB VARIABLES', 'Admin'),
(21, 21, 'wine tasting tours', 'GREEN D WEB VARIABLES', 'Admin'),
(22, 22, 'spa, wellbeing, yoga, meditation, wellness', 'GREEN D WEB VARIABLES', 'Admin'),
(23, 23, 'photography tours, nature photography', 'GREEN D WEB VARIABLES', 'Admin'),
(24, 24, 'low carbon travel, low carbon', 'GREEN D WEB VARIABLES', 'Admin'),
(25, 25, 'vegetarian, vegan', 'GREEN D WEB VARIABLES', 'Admin'),
(26, 26, 'organic shopping', 'GREEN D WEB VARIABLES', 'Admin'),
(27, 27, 'ethical shops, ecofriendly shops, ecofriendly', 'GREEN D WEB VARIABLES', 'Admin'),
(28, 28, 'accessible areas, wheelchair, disability', 'GREEN D WEB VARIABLES', 'Admin'),
(29, 29, 'B & B, guest house, homestay, lodge', 'GREEN D WEB VARIABLES', 'Admin'),
(30, 30, 'campsites, camping, camp, caravan parks, rainforest', 'GREEN D WEB VARIABLES', 'Admin'),
(31, 31, 'eco lodge, ecofriendly accommodation, ecofriendly lodge, nature-conscious inn', 'GREEN D WEB VARIABLES', 'Admin'),
(32, 32, 'farm stay accommodation', 'GREEN D WEB VARIABLES', 'Admin'),
(33, 33, 'accessible hotels, walking distance hotels, nearby hotels', 'GREEN D WEB VARIABLES', 'Admin'),
(34, 34, 'eco labels lodge, green certifications lodge', 'GREEN D WEB VARIABLES', 'Admin'),
(35, 1, 'green policy, conserve, conservation', 'MICE or CVB', 'Admin'),
(36, 2, 'green communication, green announcement, green MICE, sustainable MICE', 'MICE or CVB', 'Admin'),
(37, 3, 'green training, environment responsibility training', 'MICE or CVB', 'Admin'),
(38, 4, 'sustainable, green certification, environmental management system', 'MICE or CVB', 'Admin'),
(39, 5, 'local vendor, eco procurement, green procurement, eco-friendly procurement, green sourcing', 'MICE or CVB', 'Admin'),
(40, 6, 'public transport, green transport, electric vehicle, bicycle', 'MICE or CVB', 'Admin'),
(41, 7, 'green hotel, green accommodation, accessible hotels, homestay', 'MICE or CVB', 'Admin'),
(42, 8, 'special needs facilities, disability facilities, wheel chair, inclusion, disabled', 'MICE or CVB', 'Admin'),
(43, 9, 'local ingredients, organic farming, organic garden', 'MICE or CVB', 'Admin'),
(44, 10, 'water jar, water bottle, dispenser', 'MICE or CVB', 'Admin'),
(45, 11, 'local supplier, local vendor, farmer', 'MICE or CVB', 'Admin'),
(46, 12, 'food donation, food security, donate food', 'MICE or CVB', 'Admin'),
(47, 13, 'veggie menu, vegetarian, vegetables', 'MICE or CVB', 'Admin'),
(48, 14, 'eco friendly training, eco friendly, planting, garden', 'MICE or CVB', 'Admin'),
(49, 15, 'biodegradable, recycling, decomposable, reusable, reduce', 'MICE or CVB', 'Admin'),
(50, 16, 'energy saving equipment, energy-saving device, clean energy, energy', 'MICE or CVB', 'Admin'),
(51, 17, 'natural light, daylight, sunshine', 'MICE or CVB', 'Admin'),
(52, 18, 'renewable energy, alternative energy, renewable sources, biomass', 'MICE or CVB', 'Admin'),
(53, 19, 'eco friendly toiletry, health, wellness, well being', 'MICE or CVB', 'Admin'),
(54, 20, 'waste classification, waste collection, waste sorting, collect trash', 'MICE or CVB', 'Admin'),
(55, 21, 'labelled rubbish bin, labelled basket, less waste', 'MICE or CVB', 'Admin'),
(56, 22, 'food waste management, waste management, food waste', 'MICE or CVB', 'Admin'),
(57, 23, 'eco tourism, jungle, hiking, trekking', 'MICE or CVB', 'Admin'),
(58, 24, 'ecosystem, biodiversity, mangrove', 'MICE or CVB', 'Admin'),
(59, 25, 'sanctuary, breeding, natural habitat', 'MICE or CVB', 'Admin'),
(60, 26, 'lagoon, tree, natural', 'MICE or CVB', 'Admin'),
(61, 27, 'green mice, sustainable mice, community engagement, stakeholder engagement', 'MICE or CVB', 'Admin'),
(62, 28, 'green meeting, green event, environmentally friendly meeting', 'MICE or CVB', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `no_handphone` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`no_handphone`, `nama`, `email`, `password`) VALUES
('082385655974', 'Andri Nawawi', 'andrinawawi80@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_website`
--

CREATE TABLE `tb_website` (
  `id_website` int(11) NOT NULL,
  `alamat_website` text NOT NULL,
  `negara` varchar(100) NOT NULL,
  `inputer` varchar(150) NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_website`
--

INSERT INTO `tb_website` (`id_website`, `alamat_website`, `negara`, `inputer`, `photo`) VALUES
(1, 'www.japan.travel/en/', 'Jepang', 'admin', ''),
(2, 'https://www.italia.it/en', 'Italia', 'admin', ''),
(3, 'https://www.visitbritain.com/', 'United Kingdom ', 'admin', ''),
(4, 'https://businessevents.destinationcanada.com/en-ca/why-canada/sustainability-commitment', 'Canada', 'admin', ''),
(5, 'https://www.visitbritain.com/', 'United Kingdom ', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` enum('admin','user') NOT NULL DEFAULT 'user',
  `blokir` enum('N','Y') NOT NULL DEFAULT 'N',
  `id_sessions` varchar(50) NOT NULL,
  `jabatan` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `nama_user`, `password`, `email`, `level`, `blokir`, `id_sessions`, `jabatan`) VALUES
('admin', 'Imam Syafganti', '7ad80ecfa6489139244eb7475c341adc', 'imsyaf@gmail.com', 'admin', 'N', 'd41d8cd98f00b204e9800998ecf8427e', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_account`
--
ALTER TABLE `tb_account`
  ADD PRIMARY KEY (`kode_account`);

--
-- Indexes for table `tb_analisakeyword`
--
ALTER TABLE `tb_analisakeyword`
  ADD PRIMARY KEY (`id_analisa`);

--
-- Indexes for table `tb_indikator`
--
ALTER TABLE `tb_indikator`
  ADD PRIMARY KEY (`id_indikator`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`no_handphone`);

--
-- Indexes for table `tb_website`
--
ALTER TABLE `tb_website`
  ADD PRIMARY KEY (`id_website`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_analisakeyword`
--
ALTER TABLE `tb_analisakeyword`
  MODIFY `id_analisa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `tb_indikator`
--
ALTER TABLE `tb_indikator`
  MODIFY `id_indikator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tb_website`
--
ALTER TABLE `tb_website`
  MODIFY `id_website` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
