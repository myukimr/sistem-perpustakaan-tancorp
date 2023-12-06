-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2023 at 11:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_akt_ipp`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_unit`
--

CREATE TABLE `m_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(300) DEFAULT NULL,
  `flag` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_unit`
--

INSERT INTO `m_unit` (`unit_id`, `unit_name`, `flag`) VALUES
(1, 'Direktorat', '1'),
(2, 'Manager Utama', '1'),
(3, 'Satuan Pengawas Intern', '1'),
(4, 'Sekretaris Perusahaan', '1'),
(5, 'Divisi ASA I', '1'),
(6, 'Divisi ASA II', '1'),
(7, 'Divisi ASA III', '1'),
(8, 'Divisi ASA IV', '1'),
(9, 'Divisi ASA V', '1'),
(10, 'Div Air Bersih, Pengembangan & Jasa Lain', '1'),
(11, 'Divisi Perencanaan Korporat', '1'),
(12, 'Divisi Akuntansi dan Keuangan', '1'),
(13, 'Divisi Man. Risiko & Kinerja', '1'),
(14, 'Divisi SDM', '1'),
(15, 'Divisi Pengadaan, Kearsipan & Umum\r\n', '1'),
(16, 'Divisi Teknologi Informasi', '1'),
(17, 'Jasa Tirta Energi', '1'),
(18, 'Divisi Pengembangan Bisnis', '0'),
(19, 'Divisi Operasional Bisnis', '0'),
(20, 'Divisi Pengadaan, Kearsipan & Umum', '0'),
(21, 'KPRI Bhakti Adiguna', '1'),
(22, 'Alih Daya', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_auth`
--

CREATE TABLE `t_auth` (
  `auth_id` bigint(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `flag` varchar(10) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `level` varchar(10) NOT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `verify` varchar(100) DEFAULT NULL,
  `auth_uuid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_auth`
--

INSERT INTO `t_auth` (`auth_id`, `username`, `full_name`, `password`, `flag`, `last_login`, `level`, `photo`, `email`, `phone`, `gender`, `address`, `created_at`, `updated_at`, `unit_id`, `verify`, `auth_uuid`) VALUES
(1, '20000302447', 'Muhammad Yuki Miftakhurizqi', 'adcd7048512e64b48da55b027577886ee5a36350', '1', '2023-10-11 16:37:49', 'admin', 'bnUyMC9yb040SlAzaWdCZHRnVE1EYnRyQzhCRGhxeFNjM0l4eFYrYUN2cz0.jpg', 'myukimiftakhurrizqi21@gmail.com', '085331607260', 'L', 'Sidoarjo', NULL, '2023-10-11 16:36:26', 16, NULL, '10101');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_unit`
--
ALTER TABLE `m_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `t_auth`
--
ALTER TABLE `t_auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_unit`
--
ALTER TABLE `m_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `t_auth`
--
ALTER TABLE `t_auth`
  MODIFY `auth_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
