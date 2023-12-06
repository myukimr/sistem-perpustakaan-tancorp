-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2023 pada 10.51
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

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
-- Struktur dari tabel `m_anggota`
--

CREATE TABLE `m_anggota` (
  `id` int(11) NOT NULL,
  `nama` varchar(110) DEFAULT NULL,
  `nim` varchar(110) DEFAULT NULL,
  `alamat` varchar(110) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_anggota`
--

INSERT INTO `m_anggota` (`id`, `nama`, `nim`, `alamat`) VALUES
(1, 'Rudi', '1931710093', 'Sidoarjo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_buku`
--

CREATE TABLE `m_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `penerbit` varchar(110) DEFAULT NULL,
  `pengarang` varchar(110) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_buku`
--

INSERT INTO `m_buku` (`id`, `judul`, `penerbit`, `pengarang`, `kategori_id`) VALUES
(1, 'Peran Sudirman Dalam Kemerdekaan', 'Erlangga', 'Yuki', 2),
(2, 'Surga yang tak dirindukan', 'Erlangga', 'Yadi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kategori`
--

CREATE TABLE `m_kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_kategori`
--

INSERT INTO `m_kategori` (`id`, `nama`) VALUES
(1, 'Novel'),
(2, 'Sejarah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pengunjung`
--

CREATE TABLE `m_pengunjung` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nim` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pengunjung`
--

INSERT INTO `m_pengunjung` (`id`, `nama`, `nim`, `alamat`) VALUES
(1, 'Neni', '2141727012', 'Sidoarjo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_perpustakaan`
--

CREATE TABLE `m_perpustakaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_perpustakaan`
--

INSERT INTO `m_perpustakaan` (`id`, `nama`, `deskripsi`) VALUES
(1, 'Perpustakaan Sidoarjo', 'Dalam arti tradisional, perpustakaan ataupun rumah buku, adalah sebuah koleksi buku dan majalah. Walaupun dapat diartikan sebagai koleksi pribadi perseorangan, namun perpustakaan lebih umum dikenal sebagai sebuah koleksi besar yang dibiayai dan dioperasikan oleh sebuah kota atau institusi, serta dimanfaatkan oleh masyarakat yang rata-rata tidak mampu membeli sekian banyak buku dengan biaya sendiri'),
(2, 'Perpustakaan Tugu Pahlawan', 'Tugu Pahlawan adalah sebuah monumen yang menjadi markah tanah Kota Surabaya. Tinggi monumen ini adalah 41,15 meter dan berbentuk lingga atau paku terbalik. Tubuh monumen berbentuk lengkungan-lengkungan sebanyak 10 lengkungan, dan terbagi atas 11 ruas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_unit`
--

CREATE TABLE `m_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(300) DEFAULT NULL,
  `flag` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_unit`
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
-- Struktur dari tabel `t_auth`
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
-- Dumping data untuk tabel `t_auth`
--

INSERT INTO `t_auth` (`auth_id`, `username`, `full_name`, `password`, `flag`, `last_login`, `level`, `photo`, `email`, `phone`, `gender`, `address`, `created_at`, `updated_at`, `unit_id`, `verify`, `auth_uuid`) VALUES
(1, '20000302447', 'Muhammad Yuki Miftakhurizqi', 'adcd7048512e64b48da55b027577886ee5a36350', '1', '2023-12-06 16:41:35', 'admin', 'bnUyMC9yb040SlAzaWdCZHRnVE1EYnRyQzhCRGhxeFNjM0l4eFYrYUN2cz0.jpg', 'myukimiftakhurrizqi21@gmail.com', '085331607260', 'L', 'Sidoarjo', NULL, '2023-10-11 16:36:26', 16, NULL, '10101');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `id` int(11) NOT NULL,
  `anggota_id` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `buku_id` int(11) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `perpustakaan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_unit`
--
ALTER TABLE `m_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `t_auth`
--
ALTER TABLE `t_auth`
  ADD PRIMARY KEY (`auth_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_unit`
--
ALTER TABLE `m_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `t_auth`
--
ALTER TABLE `t_auth`
  MODIFY `auth_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
