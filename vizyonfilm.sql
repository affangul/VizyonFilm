-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 May 2025, 06:09:18
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `vizyonfilm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_isim` varchar(50) NOT NULL,
  `admin_şifre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `film`
--

CREATE TABLE `film` (
  `film_ID` int(11) NOT NULL,
  `film_isim` text NOT NULL,
  `film_resim` text NOT NULL,
  `film_VFpuan` text NOT NULL,
  `film_IMDbpuan` text NOT NULL,
  `film_Yönetmen` text NOT NULL,
  `film_Senarist` text NOT NULL,
  `film_Süre` text NOT NULL,
  `film_Açıklama` text NOT NULL,
  `film_Oyuncular` text NOT NULL,
  `film_çıkışTarihi` text NOT NULL,
  `film_Vizyonda` tinyint(1) NOT NULL,
  `film_ANASAYFA` tinyint(1) NOT NULL,
  `film_aksiyon` tinyint(1) NOT NULL,
  `film_aile` tinyint(1) NOT NULL,
  `film_bilimKurgu` tinyint(1) NOT NULL,
  `film_biyografi` tinyint(1) NOT NULL,
  `film_komedi` tinyint(1) NOT NULL,
  `film_dram` tinyint(1) NOT NULL,
  `film_korku` tinyint(1) NOT NULL,
  `film_romantik` tinyint(1) NOT NULL,
  `film_macera` tinyint(1) NOT NULL,
  `film_gerilim` tinyint(1) NOT NULL,
  `film_animasyon` tinyint(1) NOT NULL,
  `film_belgesel` tinyint(1) NOT NULL,
  `film_suç` tinyint(1) NOT NULL,
  `film_tarih` tinyint(1) NOT NULL,
  `film_fantezi` tinyint(1) NOT NULL,
  `film_müzikal` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `film`
--

INSERT INTO `film` (`film_ID`, `film_isim`, `film_resim`, `film_VFpuan`, `film_IMDbpuan`, `film_Yönetmen`, `film_Senarist`, `film_Süre`, `film_Açıklama`, `film_Oyuncular`, `film_çıkışTarihi`, `film_Vizyonda`, `film_ANASAYFA`, `film_aksiyon`, `film_aile`, `film_bilimKurgu`, `film_biyografi`, `film_komedi`, `film_dram`, `film_korku`, `film_romantik`, `film_macera`, `film_gerilim`, `film_animasyon`, `film_belgesel`, `film_suç`, `film_tarih`, `film_fantezi`, `film_müzikal`) VALUES
(1, 'Şahit (The Witness)', 'img/witness.png', '7.5', '7.2', 'Nader Saeivar', 'Nader Saeivar, Jafar Panahi', '1s 40dk', 'Şahit, arkadaşının kocası tarafından katledilmesine şahit olan bir kadının hikayesini konu ediyor. Tarlan, arkadaşı Rananın üst düzey bir devlet memuru olan kocası tarafından nasıl öldürüldüğüne istemeden de olsa tanık olur. Polis olayı ciddi bir şekilde soruşturmayı reddedince Tarlan riskli bir karar verir ve kamuoyunu bilgilendirmek ister. Ancak bu karar sadece ailesini değil aynı zamanda kendi hayatını da büyük tehlikeye atar.', 'Kelly McGillis, Harrison Ford, Lukas Haas, Viggo Mortensen, Danny Glover, Jan Rubeš', '', 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'Bataklık (The Bayou)', 'img/bataklık.jpg', '4.1', '4.3', 'Taneli Mustonen, Brad Watson, Brad Watson', 'Gavin Mehrtens', '1s 27dk', 'Bataklık, Louisiana Bayou\'da korkunç bir yırtıcı tarafından kovalanan bir grup arkadaşın hikayesini konu ediyor. Ölen ablasının küllerini götürmek için yola çıkan Kyle, talihsiz bir kazanın kurbanı olur. Kyle’ın bindiği uçak, Louisiana\'nın ünlü Bayou bataklığında ıssız bir noktaya düşer. Yolcular başlarına gelen bu olayın yaşayabilecekleri en büyük felaket olduğunu düşünürler. Ancak  Amerikan timsahlarının atası olan, doğal yaşam alanlarına mükemmel uyum sağlayan bir sürü peşlerine düştüğün kendilerini daha büyük bir felaketin içinde bulurlar.', 'Athena Strates, Elisha Applebaum, Madalena Arago, Isabelle Bonfrer, Sarah Priddy, David Newman, Mohammed Mansaray, Andonis Anthony', '6 Şubat 2025', 0, 1, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0),
(3, 'Minecraft', 'img/minecraft.jpg', '5.0', '6.0', 'Jared Hess', 'Peter Sollett, Allison Schroeder', '1s 41dk', 'Bir Minecraft Filmi, gizemli bir geçitten geçerek bilmedikleri bir dünyaya adım atan bir grup uyumsuzun hikayesini konu ediyor. Bambaşka karaktere sahip olan Garrett Garrison, Henry, Natalie ve Dawn, gizemli bir kapıdan tuhaf bir dünyaya çekildiklerinde günlük hayatlarından koparlar. Onlar artık neredeyse sınırsız hayal gücünün hakim olduğu garip, kübik bir ülke olan Overworld’dedir. Eve geri dönüş yolunu bulmak için bu alışılmadık dünyaya hakim olmaları ve kendilerini zombiler ve yaban domuzları gibi tehditlere karşı savunmaları gerekir. Bu süreçte dört maceracıya deneyimli bir zanaatkar olan Steve eşlik eder. Bu yolculuk, onlara cesaret ve yaratıcılıklarını keşfetme şansı verecektir.', 'Janson Momoa, Jack Black, Emma Myers, Jennifer Coolidge, Sebastian Eugene Hansen, Danielle Brooks, Pauline Chalamet, Matt Berry', '4 Nisan 2025', 1, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkımızda`
--

CREATE TABLE `hakkımızda` (
  `hakkımızda_metin1` text NOT NULL,
  `hakkımızda_metin2` text NOT NULL,
  `hakkımızda_metin3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `hakkımızda`
--

INSERT INTO `hakkımızda` (`hakkımızda_metin1`, `hakkımızda_metin2`, `hakkımızda_metin3`) VALUES
('Sinema, sadece bir eğlence aracı değil; hayalleri, duyguları, hikâyeleri ve insan deneyimini beyaz perdeye taşıyan büyülü bir dünyadır. İşte biz de bu büyünün etkisine kapılan bir grup sinema tutkunu olarak, 2022 yılında Vizyon Film platformunu kurmaya karar verdik. Amacımız, sinema severlere yalnızca filmler hakkında bilgi sunmak değil, aynı zamanda film izleme deneyimini daha derin, keyifli ve anlamlı bir hale getirmekti.', 'Vizyon Film, her türden filme yer veren, tarafsız ve detaylı incelemeleriyle fark yaratan bir sinema platformudur. Ekibimiz; dramdan aksiyona, animasyondan belgesellere kadar geniş bir film yelpazesinde uzmanlaşmış yazar ve eleştirmenlerden oluşur. Her hafta vizyona giren yeni yapımları, sinema tarihinin unutulmaz eserlerini ve dijital platformlardaki dikkat çeken içerikleri sizin için analiz ediyor, güçlü yönlerini ve zayıflıklarını inceliyoruz.\r\n\r\nYalnızca film yorumlarıyla sınırlı kalmıyor, aynı zamanda oyuncular, yönetmenler, yapım süreçleri ve sinema dünyasındaki gelişmeler hakkında bilgilendirici yazılar da hazırlıyoruz. Festival filmlerinden ödül sezonlarına, kamera arkası hikâyelerden tematik listelere kadar sinemanın her yönüne dokunmaya çalışıyoruz.\r\n\r\nOkuyucularımızla güçlü bir bağ kurmak adına yorumlara açık, samimi ve anlaşılır bir dil kullanıyor; sinema kültürünü yaymak ve herkesin bu büyülü dünyanın bir parçası olmasını sağlamak için çalışıyoruz.', 'Vizyon Film olarak inandığımız şey şu: her filmin anlatacak bir hikâyesi, her izleyicinin o hikâyede bulacağı bir parça vardır. Biz de bu parçaları bir araya getirmeye çalışan, sinemayı yalnızca izlemekle kalmayıp onu anlamaya çalışan bir topluluğuz.\r\n\r\nEğer siz de film izlerken sahneleri durdurup \"Bu sahne neden bu şekilde çekildi?\" diye düşünenlerdenseniz, Vizyon Film\'de kendinizi evinizde hissedeceksiniz.\r\nBirlikte izleyelim, birlikte tartışalım, birlikte keşfedelim.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletişim_bilgiler`
--

CREATE TABLE `iletişim_bilgiler` (
  `iletişim_Telefon` text NOT NULL,
  `iletişim_Mail` text NOT NULL,
  `iletişim_Adres` text NOT NULL,
  `iletişim_Harita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `iletişim_bilgiler`
--

INSERT INTO `iletişim_bilgiler` (`iletişim_Telefon`, `iletişim_Mail`, `iletişim_Adres`, `iletişim_Harita`) VALUES
('90 123 456 78 90          ', 'VizyonFilm@gmail.com          ', 'Türkiye/Ankara          ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d195884.3018212979!2d32.59761224121527!3d39.90352281167282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d347d520732db1%3A0xbdc57b0c0842b8d!2sAnkara!5e0!3m2!1str!2str!4v1744236202966!5m2!1str!2str\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>          ');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `iletişim_mesajlar`
--

CREATE TABLE `iletişim_mesajlar` (
  `mesaj_ID` int(11) NOT NULL,
  `mesaj_isim` text NOT NULL,
  `mesaj_telefon` text NOT NULL,
  `mesaj_mail` text NOT NULL,
  `mesaj_metin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `iletişim_mesajlar`
--

INSERT INTO `iletişim_mesajlar` (`mesaj_ID`, `mesaj_isim`, `mesaj_telefon`, `mesaj_mail`, `mesaj_metin`) VALUES
(1, 'isim', '123456', 'mail@mail.com', 'merhaba dünya'),
(2, 'isima', '123456', 'mailfsa@mail.com', 'makinalaşmak istiyorum'),
(3, '1isim3', '123456', 'maasdil@mail.com', 'ah yalan dünyada');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Tablo için indeksler `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`film_ID`);

--
-- Tablo için indeksler `iletişim_mesajlar`
--
ALTER TABLE `iletişim_mesajlar`
  ADD PRIMARY KEY (`mesaj_ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `film`
--
ALTER TABLE `film`
  MODIFY `film_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `iletişim_mesajlar`
--
ALTER TABLE `iletişim_mesajlar`
  MODIFY `mesaj_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
