-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 03:50 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `randevu`
--

-- --------------------------------------------------------

--
-- Table structure for table `doktorlar`
--

CREATE TABLE `doktorlar` (
  `doktor_id` int(10) UNSIGNED NOT NULL,
  `tam_ad` varchar(100) NOT NULL DEFAULT '',
  `cinsiyet` text NOT NULL,
  `tecrube` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doktorlar`
--

INSERT INTO `doktorlar` (`doktor_id`, `tam_ad`, `cinsiyet`, `tecrube`) VALUES
(1, 'Dt.Ahmet Çelik', 'Erkek', 24),
(2, 'Dt.Ali Yıldırım', 'Erkek', 8),
(3, 'Dt.Ayşe Yılmaz', 'Kadın', 7),
(4, 'Dt.Elif Özdemir', 'Kadın', 12),
(5, 'Dt.Emine Kaya', 'Kadın', 14),
(6, 'Dt.Fatma Demir', 'Kadın', 9),
(7, 'Dt.Mustafa Şahin', 'Erkek', 18),
(8, 'Dt.Ömer Öztürk', 'Erkek', 5),
(9, 'Dt.Yusuf Yıldız', 'Erkek', 22),
(10, 'Dt.Zeynep Aydın', 'Kadın', 4);

-- --------------------------------------------------------

--
-- Table structure for table `randevular`
--

CREATE TABLE `randevular` (
  `randevu_id` int(11) UNSIGNED NOT NULL,
  `tc` varchar(11) NOT NULL,
  `tam_ad` varchar(100) NOT NULL DEFAULT '',
  `tarih` date NOT NULL,
  `saat` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `randevular`
--

INSERT INTO `randevular` (`randevu_id`, `tc`, `tam_ad`, `tarih`, `saat`) VALUES
(1, '28737871996', 'Dt.Yusuf Yıldız', '2023-06-06', '13:00:00'),
(24, '12345678910', 'Dt.Yusuf Yıldız', '2023-05-29', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `uyeler`
--

CREATE TABLE `uyeler` (
  `tc` varchar(11) NOT NULL,
  `sifre` varchar(64) NOT NULL,
  `ad` varchar(50) NOT NULL DEFAULT '',
  `soyad` varchar(50) NOT NULL DEFAULT '',
  `yas` tinyint(4) NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uyeler`
--

INSERT INTO `uyeler` (`tc`, `sifre`, `ad`, `soyad`, `yas`, `email`) VALUES
('28737871996', '4d2de9cda82a8fa82810b362ac3453e11e1e167da4051b55103afab4232aaccb', 'Emirhan', 'Sesigür', 23, 'emir@gmail.com'),
('28839861916', '4d2de9cda82a8fa82810b362ac3453e11e1e167da4051b55103afab4232aaccb', 'Esranur', 'Sevilmiş', 22, 'esra@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doktorlar`
--
ALTER TABLE `doktorlar`
  ADD PRIMARY KEY (`doktor_id`);

--
-- Indexes for table `randevular`
--
ALTER TABLE `randevular`
  ADD PRIMARY KEY (`randevu_id`),
  ADD UNIQUE KEY `tc` (`tc`);

--
-- Indexes for table `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`tc`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doktorlar`
--
ALTER TABLE `doktorlar`
  MODIFY `doktor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `randevular`
--
ALTER TABLE `randevular`
  MODIFY `randevu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
