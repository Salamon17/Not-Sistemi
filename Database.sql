-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 13 Mar 2024, 23:56:56
-- Sunucu sürümü: 10.6.16-MariaDB-cll-lve
-- PHP Sürümü: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `temascriptcom_test`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrencinot`
--

CREATE TABLE `ogrencinot` (
  `Id` int(11) NOT NULL,
  `ogrencino` int(11) NOT NULL,
  `dersadi` text NOT NULL,
  `donem` varchar(255) NOT NULL,
  `dersnot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ogrencinot`
--

INSERT INTO `ogrencinot` (`Id`, `ogrencino`, `dersadi`, `donem`, `dersnot`) VALUES
(4, 65, 'test', '1', 70),
(5, 65, 'test', '2', 50);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Users`
--

CREATE TABLE `Users` (
  `Id` int(11) NOT NULL COMMENT 'Kullanıcı Id''si',
  `Ad` varchar(255) NOT NULL,
  `Soyad` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `ogrencino` int(11) NOT NULL,
  `sifre` text NOT NULL,
  `yetki` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `Users`
--

INSERT INTO `Users` (`Id`, `Ad`, `Soyad`, `Email`, `ogrencino`, `sifre`, `yetki`) VALUES
(2, 'İsmail', 'Şahin', 'ismail@sahin.com', 0, '5a3601a4a4d7a5e79e2d5a3346cd217d91f99112', 1),
(11, 'İsmail2', 'Şahin2', 'ismail@sahin.com', 65, '5a3601a4a4d7a5e79e2d5a3346cd217d91f99112', 2);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ogrencinot`
--
ALTER TABLE `ogrencinot`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ogrencinot`
--
ALTER TABLE `ogrencinot`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Kullanıcı Id''si', AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
