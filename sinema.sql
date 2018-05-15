-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 Mar 2018, 16:18:58
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `sinema`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `filmler`
--

CREATE TABLE IF NOT EXISTS `filmler` (
  `kategori_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL AUTO_INCREMENT,
  `filmAd` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `filmSuresi` time NOT NULL,
  `yonetmen_id` int(11) NOT NULL,
  `filmFormat_id` int(11) NOT NULL,
  `filmOzet` text COLLATE utf8_turkish_ci NOT NULL,
  `vizyonTarihi` date NOT NULL,
  `filmTuru_id` int(11) NOT NULL,
  `filmFiyat` int(11) NOT NULL,
  PRIMARY KEY (`film_id`,`filmAd`),
  UNIQUE KEY `film_id_2` (`film_id`),
  KEY `kategori_id` (`kategori_id`),
  KEY `yonetmen_id` (`yonetmen_id`),
  KEY `filmFormat_id` (`filmFormat_id`),
  KEY `yonetmen_id_2` (`yonetmen_id`),
  KEY `filmTuru_id` (`filmTuru_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_formatlari`
--

CREATE TABLE IF NOT EXISTS `film_formatlari` (
  `filmFormat_id` int(11) NOT NULL AUTO_INCREMENT,
  `formatAd` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`filmFormat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_oyucular`
--

CREATE TABLE IF NOT EXISTS `film_oyucular` (
  `film_id` int(11) NOT NULL,
  `oyuncu_id` int(11) NOT NULL,
  KEY `oyuncu_id` (`oyuncu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_turleri`
--

CREATE TABLE IF NOT EXISTS `film_turleri` (
  `tur_id` int(11) NOT NULL AUTO_INCREMENT,
  `filmTurAd` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`tur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_vizyondakiler`
--

CREATE TABLE IF NOT EXISTS `film_vizyondakiler` (
  `film_id` int(11) NOT NULL,
  `filmAd` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_yakinda`
--

CREATE TABLE IF NOT EXISTS `film_yakinda` (
  `film_id` int(11) NOT NULL,
  `filmAd` varchar(100) COLLATE utf32_turkish_ci NOT NULL,
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE IF NOT EXISTS `kategoriler` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE IF NOT EXISTS `kullanici` (
  `ad` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` varchar(5) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `cepTelefonu` int(20) NOT NULL,
  `sifre` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `yas` int(11) NOT NULL,
  PRIMARY KEY (`kullanici_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oyuncular`
--

CREATE TABLE IF NOT EXISTS `oyuncular` (
  `oyuncu_id` int(11) NOT NULL AUTO_INCREMENT,
  `oyuncuAd` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`oyuncu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pnr`
--

CREATE TABLE IF NOT EXISTS `pnr` (
  `pnrKod` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `indirimMiktari` int(11) NOT NULL,
  PRIMARY KEY (`pnrKod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinema_film_salon`
--

CREATE TABLE IF NOT EXISTS `sinema_film_salon` (
  `salon_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `filmZamani` time NOT NULL,
  KEY `film_id` (`film_id`),
  KEY `salon_id` (`salon_id`),
  KEY `salon_id_2` (`salon_id`),
  KEY `salon_id_3` (`salon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinema_film_salonlari`
--

CREATE TABLE IF NOT EXISTS `sinema_film_salonlari` (
  `salon_id` int(11) NOT NULL AUTO_INCREMENT,
  `salonAdi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `koltukSayisi` int(11) NOT NULL,
  PRIMARY KEY (`salon_id`),
  KEY `salon_id` (`salon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinema_film_satin_alinan_biletler`
--

CREATE TABLE IF NOT EXISTS `sinema_film_satin_alinan_biletler` (
  `salon_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `koltuk_numarasi` int(11) NOT NULL,
  KEY `salon_id` (`salon_id`),
  KEY `kullanici_id` (`kullanici_id`),
  KEY `salon_id_2` (`salon_id`),
  KEY `salon_id_3` (`salon_id`),
  KEY `salon_id_4` (`salon_id`),
  KEY `kullanici_id_2` (`kullanici_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetmenler`
--

CREATE TABLE IF NOT EXISTS `yonetmenler` (
  `yonetmen_id` int(11) NOT NULL AUTO_INCREMENT,
  `yonetmenAd` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`yonetmen_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=1 ;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `filmler`
--
ALTER TABLE `filmler`
  ADD CONSTRAINT `filmler_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriler` (`kategori_id`),
  ADD CONSTRAINT `filmler_ibfk_2` FOREIGN KEY (`yonetmen_id`) REFERENCES `yonetmenler` (`yonetmen_id`),
  ADD CONSTRAINT `filmler_ibfk_3` FOREIGN KEY (`filmFormat_id`) REFERENCES `film_formatlari` (`filmFormat_id`),
  ADD CONSTRAINT `filmler_ibfk_4` FOREIGN KEY (`filmTuru_id`) REFERENCES `film_turleri` (`tur_id`);

--
-- Tablo kısıtlamaları `film_oyucular`
--
ALTER TABLE `film_oyucular`
  ADD CONSTRAINT `film_oyucular_ibfk_1` FOREIGN KEY (`oyuncu_id`) REFERENCES `oyuncular` (`oyuncu_id`);

--
-- Tablo kısıtlamaları `film_vizyondakiler`
--
ALTER TABLE `film_vizyondakiler`
  ADD CONSTRAINT `film_vizyondakiler_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `filmler` (`film_id`);

--
-- Tablo kısıtlamaları `film_yakinda`
--
ALTER TABLE `film_yakinda`
  ADD CONSTRAINT `film_yakinda_ibfk_1` FOREIGN KEY (`film_id`) REFERENCES `filmler` (`film_id`);

--
-- Tablo kısıtlamaları `sinema_film_salon`
--
ALTER TABLE `sinema_film_salon`
  ADD CONSTRAINT `sinema_film_salon_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `filmler` (`film_id`),
  ADD CONSTRAINT `sinema_film_salon_ibfk_1` FOREIGN KEY (`salon_id`) REFERENCES `sinema_film_salonlari` (`salon_id`);

--
-- Tablo kısıtlamaları `sinema_film_satin_alinan_biletler`
--
ALTER TABLE `sinema_film_satin_alinan_biletler`
  ADD CONSTRAINT `sinema_film_satin_alinan_biletler_ibfk_2` FOREIGN KEY (`salon_id`) REFERENCES `sinema_film_salonlari` (`salon_id`),
  ADD CONSTRAINT `sinema_film_satin_alinan_biletler_ibfk_1` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`kullanici_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
