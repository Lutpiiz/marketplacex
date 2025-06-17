-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2025 pada 17.24
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplacex`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `password`, `no_telepon`, `alamat`) VALUES
(1, 'Luthfi', 'luthfi@gmail.com', '123', '085802705913', 'Bantul, Yogyakarta'),
(2, 'Lupyyy', 'zainiluthfi.lz@gmail.com', 'admin', '085802705913', 'Mbwantull');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `email_customer` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `email_customer`, `password`, `no_telepon`, `alamat`, `tanggal_daftar`) VALUES
(3, 'Uchiha Itachi', 'itachi@gmail.com', 'ee9e3307d98c01699b4aa24e429a3725d79e19e1', '089999999999', 'Konoha Kidul RT 05', '2024-11-30 11:22:26'),
(13, 'Paijo', 'paijo@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '081234567890', 'Condongcatur', '2024-12-09 22:51:14'),
(14, 'Lupi', 'lupi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '085802705913', 'Yogyakarta', '2024-12-13 16:48:54'),
(15, 'Lupi', 'zainiluthfi.lz@gmail.com', '056eafe7cf52220de2df36845b8ed170c67e23e3', '085802705913', 'Wakanda', '2024-12-14 08:13:56'),
(16, 'Arel', 'arel@gmail.com', 'b1c7123dbdf59c0145f7185a7fad16236193aad9', '081234567890', 'Klaten', '2024-12-26 09:55:56'),
(17, 'Dhila', 'dhila@gmail.com', '87fb7280378ff87cbc1b40698cd254fb3c5c0811', '080987654321', 'Gunung Kidul', '2024-12-26 09:56:25'),
(18, 'Asep', 'asep@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '0800000000', 'Yogyakarta', '2024-12-29 23:39:04'),
(19, 'Paijo', 'paijo99@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '01230123909', 'sleman', '2024-12-29 23:51:04'),
(21, 'qwerty', 'qwerty@gmail.com', 'b1b3773a05c0ed0176787a4f1574ff0075f7521e', '1234567890', 'qwerty', '2025-05-30 22:51:49'),
(22, 'Joko', 'joko@gmail.com', '97c358728f7f947c9a279ba9be88308395c7cc3a', '0812341234', 'wkwkland', '2025-05-30 23:41:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `brand` varchar(50) DEFAULT NULL,
  `processor` varchar(100) DEFAULT NULL,
  `ram` int(11) DEFAULT NULL,
  `storage` int(11) DEFAULT NULL,
  `baterai` int(11) DEFAULT NULL,
  `kamera_belakang` varchar(100) DEFAULT NULL,
  `kamera_depan` varchar(20) DEFAULT NULL,
  `ukuran_layar` float DEFAULT NULL,
  `resolusi_layar` varchar(20) DEFAULT NULL,
  `tipe_layar` varchar(30) DEFAULT NULL,
  `os` varchar(20) DEFAULT NULL,
  `jaringan` varchar(20) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `tahun_rilis` int(11) DEFAULT NULL,
  `foto_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `brand`, `processor`, `ram`, `storage`, `baterai`, `kamera_belakang`, `kamera_depan`, `ukuran_layar`, `resolusi_layar`, `tipe_layar`, `os`, `jaringan`, `harga`, `tahun_rilis`, `foto_produk`) VALUES
(1, 'Samsung Galaxy S23 Ultra', 'Samsung', 'Snapdragon 8 Gen 2', 12, 256, 5000, '200MP (Main) + 12MP (Ultrawide) + 10MP (Telephoto) + 10MP (Periscope Telephoto)', '12MP', 6.8, '1440x3088', 'Dynamic AMOLED', 'Android', '5G', 19999000, 2023, 'samsung-galaxy-s23-ultra-5g-1.jpg'),
(2, 'Samsung Galaxy S22', 'Samsung', 'Snapdragon 8 Gen 1', 8, 128, 3700, '50MP (Main) + 12MP (Ultrawide) + 10MP (Tele)', '10MP', 6.1, '1080x2340', 'Dynamic AMOLED', 'Android', '5G', 11999000, 2022, 'samsung-galaxy-s22-5g-2.jpg'),
(3, 'Samsung Galaxy A54', 'Samsung', 'Exynos 1380', 8, 128, 5000, '50MP (Main) + 12MP (Ultrawide) + 5MP (Macro)', '32MP', 6.4, '1080x2340', 'Super AMOLED', 'Android', '5G', 5999000, 2023, 'samsung-galaxy-a54-5.jpg'),
(4, 'Samsung Galaxy M14', 'Samsung', 'Exynos 1330', 6, 128, 6000, '50MP (Main) + 2MP (Depth) + 2MP (Macro)', '13MP', 6.6, '1080x2408', 'PLS LCD', 'Android', '5G', 2299000, 2023, 'samsung-galaxy-m14-5g-sm-m146-1.jpg'),
(5, 'Samsung Galaxy A14', 'Samsung', 'MediaTek Helio G80', 4, 64, 5000, '50MP (Main) + 5MP (Ultrawide) + 2MP (Macro)', '13MP', 6.6, '1080x2408', 'PLS LCD', 'Android', '4G', 1899000, 2023, 'samsung-galaxy-a14-4g-1.jpg'),
(6, 'Xiaomi 13 Pro', 'Xiaomi', 'Snapdragon 8 Gen 2', 12, 256, 4820, '50MP (Main) + 50MP (Ultrawide) + 50MP (Telephoto)', '32MP', 6.73, '1440x3200', 'LTPO AMOLED', 'Android', '5G', 13999000, 2023, 'xiaomi-13-pro-black-1.jpg'),
(7, 'Xiaomi 12', 'Xiaomi', 'Snapdragon 8 Gen 1', 8, 256, 4500, '50MP (Main) + 13MP (Ultrawide) + 5MP (Telemacro)', '32MP', 6.28, '1080x2400', 'AMOLED', 'Android', '5G', 8999000, 2022, 'xiaomi-12-1.jpg'),
(8, 'Redmi Note 12 Pro', 'Xiaomi', 'MediaTek Dimensity 1080', 8, 256, 5000, '50MP (Main) + 8MP (Ultrawide) + 2MP (Macro)', '16MP', 6.67, '1080x2400', 'OLED', '', '5G', 4499000, 2023, 'xiaomi-redmi-note-12-pro-1.jpg'),
(9, 'Redmi Note 11', 'Xiaomi', 'Snapdragon 680', 6, 128, 5000, '50MP (Main) + 8MP (Ultrawide) + 2MP (Macro) + 2MP (Depth)', '13MP', 6.43, '1080x2400', 'AMOLED', 'Android', '4G', 2799000, 2022, 'xiaomi-redmi-note-11-global-1.jpg'),
(10, 'Poco X5 Pro', 'Xiaomi', 'Snapdragon 778G', 8, 256, 5000, '108MP (Main) + 8MP (Ultrawide) + 2MP (Macro)', '16MP', 6.67, '1080x2400', 'AMOLED', 'Android', '5G', 4499000, 2023, 'xiaomi-poco-x5-pro-5g-1.jpg'),
(11, 'iPhone 14 Pro Max', 'Apple', 'Apple A16 Bionic', 6, 256, 4323, '48MP (Main) + 12MP (Ultrawide) + 12MP (Tele)', '12MP', 6.7, '1290x2796', 'Super Retina XDR OLE', 'iOS', '5G', 21999000, 2022, 'apple-iphone-14-pro-max-1.jpg'),
(12, 'iPhone 13', 'Apple', 'Apple A15 Bionic', 4, 128, 3240, '12MP (Main) + 12MP (Ultrawide)', '12MP', 6.1, '1170x2532', 'Super Retina XDR OLE', 'iOS', '5G', 13999000, 2021, 'apple-iphone-13-01.jpg'),
(13, 'iPhone 12', 'Apple', 'Apple A14 Bionic', 4, 128, 2815, '12MP (Main) + 12MP (Ultrawide)', '12MP', 6.1, '1170x2532', 'Super Retina XDR OLE', 'iOS', '5G', 9999000, 2020, 'apple-iphone-12-r1.jpg'),
(14, 'iPhone SE 2022', 'Apple', 'Apple A15 Bionic', 4, 64, 2018, '12MP (Main)', '7MP', 4.7, '750x1334', 'Retina IPS LCD', 'iOS', '5G', 6999000, 2022, 'apple-iphone-se-2022-0.jpg'),
(15, 'iPhone 11', 'Apple', 'Apple A13 Bionic', 4, 64, 3110, '12MP (Main) + 12MP (Ultrawide)', '12MP', 6.1, '828x1792', 'Liquid Retina IPS LC', 'iOS', '4G', 6999000, 2019, 'apple-iphone-11-1.jpg'),
(16, 'Vivo X80 Pro', 'Vivo', 'Snapdragon 8 Gen 1', 12, 256, 4700, '50MP (Main) + 48MP (Ultrawide) + 12MP (Portrait) + 8MP (Periscope)', '32MP', 6.78, '1440x3200', 'LTPO3 AMOLED', 'Android', '5G', 14999000, 2022, 'vivo-x80-pro-1.jpg'),
(17, 'Vivo V27 5G', 'Vivo', 'Dimensity 7200', 8, 256, 4600, '50MP (Main) + 8MP (Ultrawide) + 2MP (Macro)', '50MP', 6.78, '1080x2400', 'AMOLED', 'Android', '5G', 5999000, 2023, 'vivo-v27-1.jpg'),
(18, 'Vivo Y22', 'Vivo', 'MediaTek Helio G85', 4, 64, 5000, '50MP (Main) + 2MP (Macro)', '8MP', 6.55, '720x1612', 'IPS LCD', 'Android', '4G', 1999000, 2022, 'vivo-y22-2022-1.jpg'),
(19, 'Vivo Y17s', 'Vivo', 'MediaTek Helio G85', 4, 128, 5000, '50MP (Main) + 2MP (Depth)', '8MP', 6.56, '720x1612', 'IPS LCD', 'Android', '4G', 1799000, 2023, 'vivo-y17s-1.jpg'),
(20, 'Vivo V25e', 'Vivo', 'MediaTek Helio G99', 8, 128, 4500, '64MP (Main) + 2MP (Bokeh) + 2MP (Macro)', '32MP', 6.44, '1080x2400', 'AMOLED', 'Android', '4G', 3899000, 2022, 'vivo-v25e-1.jpg'),
(21, 'Oppo Find X5 Pro', 'Oppo', 'Snapdragon 8 Gen 1', 12, 256, 5000, '50MP (Main) + 50MP (Ultrawide) + 13MP (Tele)', '32MP', 6.7, '1440x3216', 'LTPO AMOLED', 'Android', '5G', 14999000, 2022, 'oppo-find-x5-pro-1.jpg'),
(22, 'Oppo Reno10 Pro', 'Oppo', 'Snapdragon 778G', 12, 256, 4600, '50MP (Main) + 32MP (Tele) + 8MP (Ultrawide)', '32MP', 6.74, '1240x2772', 'AMOLED', 'Android', '5G', 7499000, 2023, 'oppo-reno10-pro-international-1.jpg'),
(23, 'Oppo A78', 'Oppo', 'Dimensity 700', 8, 128, 5000, '50MP (Main) + 2MP (Depth)', '8MP', 6.56, '720x1612', 'IPS LCD', 'Android', '5G', 3199000, 2023, 'oppo-a78-1.jpg'),
(24, 'Oppo A17', 'Oppo', 'MediaTek Helio G35', 4, 64, 5000, '50MP (Main) + 2MP (Depth)', '5MP', 6.56, '720x1612', 'IPS LCD', 'Android', '4G', 1799000, 2022, 'oppo-a17-1.jpg'),
(25, 'Oppo Reno8 T', 'Oppo', 'Helio G99', 8, 256, 5000, '100MP (Main) + 2MP (Depth) + 2MP (Macro)', '32MP', 6.43, '1080x2400', 'AMOLED', 'Android', '4G', 4599000, 2023, 'oppo-reno8-t-4g-1.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nilai_rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `status_transaksi` enum('dipesan','dibayar','diproses','selesai','dibatalkan') DEFAULT 'dipesan',
  `total_transaksi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_customer`, `id_layanan`, `jumlah_pesan`, `tanggal_pesan`, `id_admin`, `status_transaksi`, `total_transaksi`) VALUES
(1, '', 2, 10, 3, '2024-12-13 10:45:13', NULL, 'dipesan', NULL),
(2, '', 2, 6, 4, '2024-12-13 11:18:21', NULL, 'dipesan', 160000),
(3, '', 2, 7, 2, '2024-12-13 11:19:10', NULL, 'dipesan', 50000),
(6, '', 15, 7, 4, '2024-12-14 14:53:34', NULL, 'dibayar', 100000),
(7, '', 15, 10, 6, '2024-12-14 14:53:50', NULL, 'dibayar', 330000),
(9, '', 15, 7, 5, '2024-12-16 19:02:17', NULL, 'dibayar', 125000),
(10, '', 15, 6, 1, '2024-12-17 14:11:14', NULL, 'dibatalkan', 40000),
(11, '', 15, 10, 3, '2024-12-18 07:24:36', NULL, 'dibayar', 165000),
(12, '', 15, 7, 4, '2024-12-18 07:31:53', NULL, 'selesai', 100000),
(13, '', 15, 6, 2, '2024-12-18 07:33:27', NULL, 'dibatalkan', 80000),
(14, '', 15, 10, 1, '2024-12-18 07:34:35', NULL, 'dibayar', 55000),
(15, '', 15, 10, 1, '2024-12-18 08:18:37', NULL, 'selesai', 55000),
(16, '', 15, 7, 2, '2024-12-18 08:21:38', NULL, 'dibatalkan', 50000),
(17, '', 15, 7, 3, '2024-12-18 19:20:29', NULL, 'dibatalkan', 75000),
(18, '', 15, 10, 3, '2024-12-23 20:01:10', NULL, 'dibatalkan', 165000),
(19, '', 15, 6, 2, '2024-12-24 23:15:54', NULL, 'selesai', 80000),
(20, '', 15, 22, 2, '2024-12-26 15:52:06', NULL, 'selesai', 70000),
(21, '', 15, 18, 1, '2024-12-26 15:52:59', NULL, 'dibatalkan', 20000),
(22, '', 16, 20, 4, '2024-12-27 13:36:29', NULL, 'selesai', 100000),
(23, '', 16, 16, 3, '2024-12-27 16:52:29', NULL, 'selesai', 180000),
(24, '', 16, 7, 1, '2024-12-27 16:54:13', NULL, 'dibatalkan', 25000),
(25, '', 16, 17, 1, '2024-12-27 17:33:45', NULL, 'dibayar', 90000),
(26, '', 15, 7, 2, '2024-12-29 22:51:27', NULL, 'dibayar', 50000),
(27, '', 15, 10, 1, '2024-12-29 23:35:01', NULL, 'dibayar', 55000),
(28, '', 18, 7, 2, '2024-12-29 23:42:51', NULL, 'dibatalkan', 50000),
(29, '', 18, 7, 1, '2024-12-29 23:43:24', NULL, 'selesai', 25000),
(30, '', 19, 7, 2, '2024-12-29 23:52:43', NULL, 'dibatalkan', 50000),
(31, '', 19, 7, 1, '2024-12-29 23:53:01', NULL, 'selesai', 25000),
(32, '', 15, 6, 5, '2024-12-30 20:21:20', NULL, 'selesai', 200000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
