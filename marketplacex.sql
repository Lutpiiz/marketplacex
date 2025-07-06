-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2025 at 04:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

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
-- Table structure for table `admin`
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
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `email_admin`, `password`, `no_telepon`, `alamat`) VALUES
(1, 'Luthfi', 'luthfi@gmail.com', '123', '085802705913', 'Bantul, Yogyakarta'),
(2, 'Lupyyy', 'zainiluthfi.lz@gmail.com', 'admin', '085802705913', 'Mbwantull');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
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
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `email_customer`, `password`, `no_telepon`, `alamat`, `tanggal_daftar`) VALUES
(3, 'Uchiha Itachi', 'itachi@gmail.com', '1e149821c39f2731ce3e0dc3674b3ba8f832dfaf', '089999999999', 'Konoha Kidul RT 05', '2024-11-30 11:22:26'),
(13, 'Paijo', 'paijo@gmail.com', '33ca1335e7e0d3fdf92194e62d232b8a8236eb50', '081234567890', 'Condongcatur', '2024-12-09 22:51:14'),
(14, 'Lupi', 'lupi@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '085802705913', 'Yogyakarta', '2024-12-13 16:48:54'),
(18, 'Asep', 'asep@gmail.com', '549e6da6a3f49abd9369f06d222f1d323e127643', '0800000000', 'Yogyakarta', '2024-12-29 23:39:04'),
(22, 'Joko', 'joko@gmail.com', '97c358728f7f947c9a279ba9be88308395c7cc3a', '0812341234', 'wkwkland', '2025-05-30 23:41:41'),
(23, 'Bambang Herex', 'bambang@gmail.com', '8d915418744c262d862505a7747465e62d918c29', '081212121212', 'Bantul Selatan', '2025-06-30 22:10:43'),
(24, 'Yanto', 'yanto@gmail.com', '87c8a128091054f836a14b544959d7f5df651b09', '084646464646', 'Prambanan', '2025-07-03 15:08:51');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
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
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `brand`, `processor`, `ram`, `storage`, `baterai`, `kamera_belakang`, `kamera_depan`, `ukuran_layar`, `resolusi_layar`, `tipe_layar`, `os`, `jaringan`, `harga`, `tahun_rilis`, `foto_produk`) VALUES
(1, 'Samsung Galaxy S23 Ultra', 'Samsung', 'Snapdragon 8 Gen 2', 12, 256, 5000, '200MP (Main) + 12MP (Ultrawide) + 10MP (Telephoto) + 10MP (Periscope Telephoto)', '12MP', 6.8, '1440x3088', 'Dynamic AMOLED', 'Android', '5G', 19999000, 2023, 'samsung-galaxy-s23-ultra-5g-1.jpg'),
(2, 'Samsung Galaxy S22', 'Samsung', 'Snapdragon 8 Gen 1', 8, 128, 3700, '50MP (Main) + 12MP (Ultrawide) + 10MP (Tele)', '10MP', 6.1, '1080x2340', 'Dynamic AMOLED', 'Android', '5G', 11999000, 2022, 'samsung-galaxy-s22-5g-2.jpg'),
(3, 'Samsung Galaxy A54', 'Samsung', 'Exynos 1380', 8, 128, 5000, '50MP (Main) + 12MP (Ultrawide) + 5MP (Macro)', '32MP', 6.4, '1080x2340', 'Super AMOLED', 'Android', '5G', 5999000, 2023, 'samsung-galaxy-a54-5.jpg'),
(4, 'Samsung Galaxy M14', 'Samsung', 'Exynos 1330', 6, 128, 6000, '50MP (Main) + 2MP (Depth) + 2MP (Macro)', '13MP', 6.6, '1080x2408', 'PLS LCD', 'Android', '5G', 2299000, 2023, 'samsung-galaxy-m14-5g-sm-m146-1.jpg'),
(5, 'Samsung Galaxy A14', 'Samsung', 'MediaTek Helio G80', 4, 64, 5000, '50MP (Main) + 5MP (Ultrawide) + 2MP (Macro)', '13MP', 6.6, '1080x2408', 'PLS LCD', 'Android', '4G', 1899000, 2023, 'samsung-galaxy-a14-4g-1.jpg'),
(6, 'Xiaomi 13 Pro', 'Xiaomi', 'Snapdragon 8 Gen 2', 12, 256, 4820, '50MP (Main) + 50MP (Ultrawide) + 50MP (Telephoto)', '32MP', 6.73, '1440x3200', 'LTPO AMOLED', 'Android', '5G', 13999000, 2023, 'xiaomi-13-pro-black-1.jpg'),
(7, 'Xiaomi 12', 'Xiaomi', 'Snapdragon 8 Gen 1', 8, 256, 4500, '50MP (Main) + 13MP (Ultrawide) + 5MP (Telemacro)', '32MP', 6.28, '1080x2400', 'AMOLED', 'Android', '5G', 8999000, 2022, 'xiaomi-12-1.jpg'),
(8, 'Redmi Note 12 Pro', 'Xiaomi', 'MediaTek Dimensity 1080', 8, 256, 5000, '50MP (Main) + 8MP (Ultrawide) + 2MP (Macro)', '16MP', 6.67, '1080x2400', 'OLED', 'Android', '5G', 4499000, 2023, 'xiaomi-redmi-note-12-pro-1.jpg'),
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
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `nilai_rating` int(11) NOT NULL,
  `isi_rating` text NOT NULL,
  `waktu_rating` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rating`, `id_customer`, `id_produk`, `id_transaksi`, `nilai_rating`, `isi_rating`, `waktu_rating`) VALUES
(1, 14, 21, 38, 5, 'cihuyy', '2025-06-30 00:36:38'),
(2, 14, 3, 33, 5, 'hpnya bagus', '2025-06-30 00:40:18'),
(3, 14, 10, 36, 5, 'hp geyming!!', '2025-06-30 00:44:57'),
(5, 14, 1, 39, 5, 'zoomnya gacor kang!!', '2025-06-30 15:55:24'),
(6, 14, 15, 37, 4, 'kameranya bagus tapi batrenya boros', '2025-06-30 15:58:36'),
(7, 14, 15, 34, 5, 'mantapp', '2025-06-30 21:29:40'),
(8, 14, 24, 40, 3, 'kualitas standar', '2025-06-30 22:02:20'),
(9, 14, 16, 35, 5, 'hp cina gacorrr', '2025-06-30 22:03:02'),
(10, 14, 14, 41, 3, 'batre boros!!', '2025-06-30 22:03:49'),
(11, 14, 20, 42, 4, 'overall bagus', '2025-06-30 22:04:44'),
(12, 23, 2, 43, 1, 'layarnya muncul garis setelah update', '2025-06-30 22:12:09'),
(13, 23, 4, 44, 4, 'batrenya badag', '2025-06-30 22:12:49'),
(14, 23, 6, 45, 5, 'flagship china boss! iphone minggir dulu', '2025-06-30 22:13:48'),
(15, 23, 25, 46, 3, 'chipset ampas', '2025-06-30 22:14:26'),
(16, 23, 5, 47, 5, 'istri saya suka', '2025-06-30 22:14:58'),
(17, 23, 1, 48, 5, 'cocok buat saya', '2025-06-30 22:16:08'),
(18, 23, 13, 49, 5, 'ukurannya pas di tangan, kamera cakep', '2025-06-30 22:17:02'),
(19, 23, 23, 50, 4, 'buat main papji ngelag2', '2025-06-30 22:17:53'),
(20, 23, 9, 51, 5, 'terbaik di harganya', '2025-06-30 22:18:36'),
(21, 23, 7, 52, 5, 'desainnya cantik banget', '2025-06-30 22:20:36'),
(22, 24, 11, 53, 5, 'hp terbaik!!!', '2025-07-03 16:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  `status_transaksi` enum('dipesan','diproses','dikirim','selesai','dibatalkan') DEFAULT 'dipesan',
  `total_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_customer`, `id_produk`, `tanggal_pesan`, `status_transaksi`, `total_transaksi`) VALUES
(33, '20250605231050173', 14, 3, '2025-06-05 23:10:50', 'selesai', 5999000),
(34, '20250605232503213', 14, 15, '2025-06-05 23:25:03', 'selesai', 6999000),
(35, '20250605234535246', 14, 16, '2025-06-05 23:45:35', 'selesai', 14999000),
(36, '20250620230506929', 14, 10, '2025-06-20 23:05:06', 'selesai', 4499000),
(37, '20250629171125490', 14, 15, '2025-06-29 17:11:25', 'selesai', 6999000),
(38, '20250629172144121', 14, 21, '2025-06-29 17:21:44', 'selesai', 14999000),
(39, '20250630153555914', 14, 1, '2025-06-30 15:35:55', 'selesai', 19999000),
(40, '20250630220148543', 14, 24, '2025-06-30 22:01:48', 'selesai', 1799000),
(41, '20250630220327814', 14, 14, '2025-06-30 22:03:27', 'selesai', 6999000),
(42, '20250630220359246', 14, 20, '2025-06-30 22:03:59', 'selesai', 3899000),
(43, '20250630221118530', 23, 2, '2025-06-30 22:11:18', 'selesai', 11999000),
(44, '20250630221222878', 23, 4, '2025-06-30 22:12:22', 'selesai', 2299000),
(45, '20250630221303993', 23, 6, '2025-06-30 22:13:03', 'selesai', 13999000),
(46, '20250630221403582', 23, 25, '2025-06-30 22:14:03', 'selesai', 4599000),
(47, '20250630221443944', 23, 5, '2025-06-30 22:14:43', 'selesai', 1899000),
(48, '20250630221519619', 23, 1, '2025-06-30 22:15:19', 'selesai', 19999000),
(49, '20250630221631846', 23, 13, '2025-06-30 22:16:31', 'selesai', 9999000),
(50, '20250630221716651', 23, 23, '2025-06-30 22:17:16', 'selesai', 3199000),
(51, '20250630221823996', 23, 9, '2025-06-30 22:18:23', 'selesai', 2799000),
(52, '20250630222012406', 23, 7, '2025-06-30 22:20:12', 'selesai', 8999000),
(53, '20250703162215844', 24, 11, '2025-07-03 16:22:15', 'selesai', 21999000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
