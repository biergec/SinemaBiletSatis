-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 21 May 2018, 03:59:25
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
  `kategori_id` int(11) DEFAULT NULL,
  `film_id` int(11) NOT NULL AUTO_INCREMENT,
  `filmAd` varchar(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT '',
  `filmSuresi` int(11) DEFAULT NULL,
  `yonetmen_id` int(11) DEFAULT NULL,
  `filmOzet` varchar(2550) COLLATE utf8_turkish_ci DEFAULT NULL,
  `vizyonTarihi` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `filmTuru_id` int(11) DEFAULT NULL,
  `filmFiyat` int(11) DEFAULT NULL,
  `yol` varchar(250) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`film_id`,`filmAd`),
  UNIQUE KEY `film_id_2` (`film_id`),
  UNIQUE KEY `filmAd` (`filmAd`),
  KEY `kategori_id` (`kategori_id`),
  KEY `yonetmen_id` (`yonetmen_id`),
  KEY `yonetmen_id_2` (`yonetmen_id`),
  KEY `filmTuru_id` (`filmTuru_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=21 ;

--
-- Tablo döküm verisi `filmler`
--

INSERT INTO `filmler` (`kategori_id`, `film_id`, `filmAd`, `filmSuresi`, `yonetmen_id`, `filmOzet`, `vizyonTarihi`, `filmTuru_id`, `filmFiyat`, `yol`) VALUES
(2, 17, 'Vell', 100, 5, 'Lorem Ipsum pasajlarÄ±nÄ±n birÃ§ok Ã§eÅŸitlemesi vardÄ±r. Ancak bunlarÄ±n bÃ¼yÃ¼k bir Ã§oÄŸunluÄŸu mizah katÄ±larak veya rastgele sÃ¶zcÃ¼kler eklenerek deÄŸiÅŸtirilmiÅŸlerdir. EÄŸer bir Lorem Ipsum pasajÄ± kullanacaksanÄ±z, metin aralarÄ±na utandÄ±rÄ±cÄ± sÃ¶zcÃ¼kler gizlenmediÄŸinden emin olmanÄ±z gerekir.', '2018-09-01', 13, 18, 'h6.jpg'),
(2, 18, 'Bana GÃ¼ven', 100, 6, 'Bu gÃ¼zel animasyon filminde isminden de anlayacaÄŸÄ±nÄ±z gibi insanlarÄ±n beslediÄŸi evcil hayvanlarÄ±n sahipleri evde yokken iÅŸlerine gittiklerinde gezmeye Ã§Ä±ktÄ±klarÄ±nda onlarÄ±n neler yaptÄ±ÄŸÄ±nÄ± bizlere gÃ¶steren bir animasyon filmi', '2018', 11, 20, 'c8.jpg'),
(5, 19, 'Gemide', 20, 6, 'Bu gÃ¼zel animasyon filminde isminden de anlayacaÄŸÄ±nÄ±z gibi insanlarÄ±n beslediÄŸi evcil hayvanlarÄ±n sahipleri evde yokken iÅŸlerine gittiklerinde gezmeye Ã§Ä±ktÄ±klarÄ±nda onlarÄ±n neler yaptÄ±ÄŸÄ±nÄ± bizlere gÃ¶steren bir animasyon filmi', '2018-05-21', 11, 20, 'c1.jpg'),
(5, 20, 'Evcil HayvanÄ±m', 60, 3, 'Bu gÃ¼zel animasyon filminde isminden de anlayacaÄŸÄ±nÄ±z gibi insanlarÄ±n beslediÄŸi evcil hayvanlarÄ±n sahipleri evde yokken iÅŸlerine gittiklerinde gezmeye Ã§Ä±ktÄ±klarÄ±nda onlarÄ±n neler yaptÄ±ÄŸÄ±nÄ± bizlere gÃ¶steren bir animasyon filmi', '2018-06-21', 14, 20, 'Null');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_oyuncular`
--

CREATE TABLE IF NOT EXISTS `film_oyuncular` (
  `film_id` int(11) NOT NULL,
  `oyuncu_id` int(11) NOT NULL,
  KEY `oyuncu_id` (`oyuncu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `film_oyuncular`
--

INSERT INTO `film_oyuncular` (`film_id`, `oyuncu_id`) VALUES
(13, 21),
(13, 23),
(13, 20),
(0, 23),
(0, 20),
(0, 22),
(0, 23),
(0, 20),
(0, 22),
(14, 25),
(14, 21),
(14, 23),
(0, 24),
(0, 19),
(0, 25),
(0, 21),
(0, 23),
(0, 20),
(0, 22),
(0, 24),
(0, 19),
(0, 25),
(0, 21),
(0, 23),
(0, 20),
(0, 22),
(0, 25),
(0, 21),
(0, 23),
(0, 20),
(0, 22),
(0, 24),
(0, 19),
(0, 25),
(0, 21),
(0, 23),
(0, 20),
(0, 22),
(0, 24),
(0, 19),
(0, 25),
(0, 25),
(0, 21),
(0, 22),
(0, 22),
(0, 22),
(15, 21),
(16, 21),
(16, 23),
(16, 20),
(16, 22),
(17, 24),
(17, 19),
(17, 25),
(18, 23),
(18, 20),
(19, 19),
(19, 25),
(20, 19),
(20, 25);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_turleri`
--

CREATE TABLE IF NOT EXISTS `film_turleri` (
  `tur_id` int(11) NOT NULL AUTO_INCREMENT,
  `filmTurAd` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`tur_id`),
  UNIQUE KEY `filmTurAd` (`filmTurAd`),
  UNIQUE KEY `filmTurAd_2` (`filmTurAd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=15 ;

--
-- Tablo döküm verisi `film_turleri`
--

INSERT INTO `film_turleri` (`tur_id`, `filmTurAd`) VALUES
(11, '3D'),
(13, '4K'),
(14, 'IMAX'),
(12, 'Normal');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_vizyondakiler`
--

CREATE TABLE IF NOT EXISTS `film_vizyondakiler` (
  `vizyondakiler_id` int(11) NOT NULL AUTO_INCREMENT,
  `film_id` int(11) NOT NULL,
  PRIMARY KEY (`vizyondakiler_id`),
  UNIQUE KEY `film_id_2` (`film_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=4 ;

--
-- Tablo döküm verisi `film_vizyondakiler`
--

INSERT INTO `film_vizyondakiler` (`vizyondakiler_id`, `film_id`) VALUES
(2, 17),
(3, 19);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film_yakinda`
--

CREATE TABLE IF NOT EXISTS `film_yakinda` (
  `yakinda_id` int(11) NOT NULL AUTO_INCREMENT,
  `film_id` int(11) NOT NULL,
  PRIMARY KEY (`yakinda_id`),
  UNIQUE KEY `film_id_2` (`film_id`),
  KEY `film_id` (`film_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `film_yakinda`
--

INSERT INTO `film_yakinda` (`yakinda_id`, `film_id`) VALUES
(6, 20);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE IF NOT EXISTS `kategoriler` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategoriAd` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`kategori_id`),
  UNIQUE KEY `kategoriAd` (`kategoriAd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=6 ;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategoriAd`) VALUES
(2, 'Aksiyon'),
(4, 'Gizem'),
(5, 'Korku'),
(3, 'Macera');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE IF NOT EXISTS `kullanici` (
  `yetki` varchar(5) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ad` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(30) COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` varchar(5) COLLATE utf8_turkish_ci NOT NULL,
  `kullanici_id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `cepTelefonu` int(20) NOT NULL,
  `sifre` varchar(64) COLLATE utf8_turkish_ci NOT NULL,
  `yas` int(11) NOT NULL,
  PRIMARY KEY (`kullanici_id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=16 ;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`yetki`, `ad`, `soyad`, `cinsiyet`, `kullanici_id`, `mail`, `cepTelefonu`, `sifre`, `yas`) VALUES
('Admin', 'Mustafa', 'Ergec', 'Erkek', 3, 'mustafaergec225@outlook.com', 555, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 15),
(NULL, 'Yunus', 'YÄ±ÄŸci', 'Erkek', 15, 'yunus@gmail.com', 2555555, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 22);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oyuncular`
--

CREATE TABLE IF NOT EXISTS `oyuncular` (
  `oyuncu_id` int(11) NOT NULL AUTO_INCREMENT,
  `oyuncuAd` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`oyuncu_id`),
  UNIQUE KEY `oyuncuAd` (`oyuncuAd`),
  UNIQUE KEY `oyuncuAd_2` (`oyuncuAd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=26 ;

--
-- Tablo döküm verisi `oyuncular`
--

INSERT INTO `oyuncular` (`oyuncu_id`, `oyuncuAd`) VALUES
(24, 'Ayse Koc'),
(19, 'Emre Erdinc'),
(25, 'Fatma Buyuk'),
(21, 'Mustafa Ergec'),
(23, 'Nazli Koc'),
(20, 'Ozan Uygun'),
(22, 'Yunus Yigci');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `pnr`
--

CREATE TABLE IF NOT EXISTS `pnr` (
  `pnrKod` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `indirimMiktari` int(11) NOT NULL,
  PRIMARY KEY (`pnrKod`),
  UNIQUE KEY `pnrKod` (`pnrKod`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `pnr`
--

INSERT INTO `pnr` (`pnrKod`, `stok`, `indirimMiktari`) VALUES
(123456, 10, 15),
(123456789, 50, 10);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinema_film_salon`
--

CREATE TABLE IF NOT EXISTS `sinema_film_salon` (
  `salon_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `baslama_zamani` varchar(20) NOT NULL,
  `bitis_zamani` varchar(20) NOT NULL,
  `sinema_film_salon_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`sinema_film_salon_id`),
  KEY `film_id` (`film_id`),
  KEY `salon_id` (`salon_id`),
  KEY `salon_id_2` (`salon_id`),
  KEY `salon_id_3` (`salon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Tablo döküm verisi `sinema_film_salon`
--

INSERT INTO `sinema_film_salon` (`salon_id`, `film_id`, `baslama_zamani`, `bitis_zamani`, `sinema_film_salon_id`) VALUES
(6, 17, '22', '24', 7),
(7, 20, '22', '24', 10),
(5, 18, '20', '24', 11),
(5, 19, '15', '16', 12);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinema_film_salonlari`
--

CREATE TABLE IF NOT EXISTS `sinema_film_salonlari` (
  `salon_id` int(11) NOT NULL AUTO_INCREMENT,
  `salonAdi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `koltukSayisi` int(11) NOT NULL,
  PRIMARY KEY (`salon_id`),
  UNIQUE KEY `salonAdi` (`salonAdi`),
  UNIQUE KEY `salonAdi_2` (`salonAdi`),
  KEY `salon_id` (`salon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `sinema_film_salonlari`
--

INSERT INTO `sinema_film_salonlari` (`salon_id`, `salonAdi`, `koltukSayisi`) VALUES
(5, 'Salon 1', 42),
(6, 'Salon 2', 50),
(7, 'Salon 3', 60);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinema_film_satin_alinan_biletler`
--

CREATE TABLE IF NOT EXISTS `sinema_film_satin_alinan_biletler` (
  `salon_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `koltuk_numarasi` int(11) NOT NULL,
  `filmBaslangicSaati` varchar(6) NOT NULL,
  `tarih` datetime DEFAULT NULL,
  KEY `salon_id` (`salon_id`),
  KEY `kullanici_id` (`kullanici_id`),
  KEY `salon_id_2` (`salon_id`),
  KEY `salon_id_3` (`salon_id`),
  KEY `salon_id_4` (`salon_id`),
  KEY `kullanici_id_2` (`kullanici_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `sinema_film_satin_alinan_biletler`
--

INSERT INTO `sinema_film_satin_alinan_biletler` (`salon_id`, `kullanici_id`, `koltuk_numarasi`, `filmBaslangicSaati`, `tarih`) VALUES
(5, 3, 2, '22', '2018-05-20 22:58:53'),
(5, 3, 3, '22', '2018-05-20 22:58:53'),
(5, 3, 4, '22', '2018-05-20 22:58:53'),
(5, 3, 5, '22', '2018-05-20 22:58:54'),
(5, 3, 6, '22', '2018-05-20 22:58:54'),
(5, 3, 7, '22', '2018-05-20 22:58:54'),
(5, 3, 8, '22', '2018-05-20 22:58:54'),
(5, 3, 9, '22', '2018-05-20 22:58:54'),
(6, 3, 3, '22', '2018-05-20 23:28:48'),
(6, 3, 4, '22', '2018-05-20 23:28:48'),
(6, 3, 5, '22', '2018-05-20 23:28:48'),
(6, 3, 6, '22', '2018-05-20 23:28:48'),
(6, 3, 44, '22', '2018-05-20 23:50:10'),
(6, 3, 45, '22', '2018-05-20 23:50:10'),
(5, 3, 31, '15', '2018-05-21 00:04:30'),
(5, 3, 32, '15', '2018-05-21 00:04:30'),
(5, 3, 33, '15', '2018-05-21 00:04:30'),
(5, 3, 34, '15', '2018-05-21 00:04:30'),
(5, 3, 35, '15', '2018-05-21 00:04:30'),
(5, 3, 36, '15', '2018-05-21 00:04:30'),
(5, 3, 37, '15', '2018-05-21 00:04:30'),
(5, 3, 38, '15', '2018-05-21 00:04:30'),
(5, 3, 39, '15', '2018-05-21 00:04:30'),
(5, 3, 40, '15', '2018-05-21 00:04:30'),
(5, 3, 41, '15', '2018-05-21 00:04:30'),
(5, 3, 24, '15', '2018-05-21 00:24:54'),
(5, 3, 25, '15', '2018-05-21 00:24:54'),
(5, 3, 26, '15', '2018-05-21 00:24:54'),
(6, 15, 14, '22', '2018-05-21 03:14:07'),
(6, 15, 15, '22', '2018-05-21 03:14:07'),
(6, 15, 16, '22', '2018-05-21 03:14:07');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetmenler`
--

CREATE TABLE IF NOT EXISTS `yonetmenler` (
  `yonetmen_id` int(11) NOT NULL AUTO_INCREMENT,
  `yonetmenAd` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`yonetmen_id`),
  UNIQUE KEY `yonetmenAd` (`yonetmenAd`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci AUTO_INCREMENT=7 ;

--
-- Tablo döküm verisi `yonetmenler`
--

INSERT INTO `yonetmenler` (`yonetmen_id`, `yonetmenAd`) VALUES
(6, 'Ahmet Okumus'),
(5, 'Ali Bulbul'),
(2, 'Mustafa Ergec'),
(4, 'Nazan Diper'),
(3, 'Yunus Yigci');

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `filmler`
--
ALTER TABLE `filmler`
  ADD CONSTRAINT `filmler_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoriler` (`kategori_id`),
  ADD CONSTRAINT `filmler_ibfk_2` FOREIGN KEY (`yonetmen_id`) REFERENCES `yonetmenler` (`yonetmen_id`),
  ADD CONSTRAINT `filmler_ibfk_4` FOREIGN KEY (`filmTuru_id`) REFERENCES `film_turleri` (`tur_id`);

--
-- Tablo kısıtlamaları `film_oyuncular`
--
ALTER TABLE `film_oyuncular`
  ADD CONSTRAINT `film_oyuncular_ibfk_1` FOREIGN KEY (`oyuncu_id`) REFERENCES `oyuncular` (`oyuncu_id`);

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
  ADD CONSTRAINT `sinema_film_salon_ibfk_1` FOREIGN KEY (`salon_id`) REFERENCES `sinema_film_salonlari` (`salon_id`),
  ADD CONSTRAINT `sinema_film_salon_ibfk_2` FOREIGN KEY (`film_id`) REFERENCES `filmler` (`film_id`);

--
-- Tablo kısıtlamaları `sinema_film_satin_alinan_biletler`
--
ALTER TABLE `sinema_film_satin_alinan_biletler`
  ADD CONSTRAINT `sinema_film_satin_alinan_biletler_ibfk_1` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`kullanici_id`),
  ADD CONSTRAINT `sinema_film_satin_alinan_biletler_ibfk_2` FOREIGN KEY (`salon_id`) REFERENCES `sinema_film_salonlari` (`salon_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
