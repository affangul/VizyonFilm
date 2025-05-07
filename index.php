<?php
 include("admin/bağlan.php");



?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ana Sayfa</title>
  <link rel="stylesheet" href="css/indexstyle.css">
  <link rel="stylesheet" href="css/genelstyle.css">
</head>
<body>
  <header>
  <a href="index.php" class="headLogo"><img src="img/logo1.png" ></a>
    <nav>
      
      <a href="index.php">Ana Sayfa</a>
      <a href="filmler.php">Filmler</a>
      <a href="hakkımızda.php">Hakkımızda</a>
      <a href="iletişim.php">İletişim</a>
    </nav>
  </header>

  <main>
  <?php
    $sql = "SELECT film_ID, film_isim, film_resim, film_VFpuan, film_IMDbpuan, film_Yönetmen, film_Senarist, film_Süre, film_Açıklama, film_aksiyon, film_aile, film_bilimKurgu, film_biyografi, film_komedi, film_dram, film_korku, film_romantik, film_macera, film_gerilim, film_animasyon, film_belgesel, film_suç, film_tarih, film_fantezi, film_müzikal FROM film WHERE film_ANASAYFA = 1;";
    $sonuc = $baglan->query($sql);

    if($sonuc->num_rows > 0) {
      while($satir = $sonuc->fetch_assoc()){
        echo "<article class='film'>";
        echo "<div class='film-icerik'>";
        echo "<div class='film-sol'>";
        echo "<h2>" .  $satir["film_isim"] . "</h2>";
        echo "<img src= " .  $satir["film_resim"] . ">";
        echo "</div>";
        echo " <div class='film-sag'>";
        echo "<div class='puanVizyon'><strong>Vizyon Film: " .  $satir["film_VFpuan"] . " / 10</strong></div>";
        echo "<div class='puanIMDb'><strong>IMDb:</strong> " .  $satir["film_IMDbpuan"] . "/ 10</div>";
        echo "<div class ='ekBilgi'><strong>Yönetmen: " .  $satir["film_Yönetmen"] . "</strong></div>";
        echo "<div class ='ekBilgi'><strong>Senarist: " .  $satir["film_Senarist"] . "</strong></div>";
        $turler = [];
        if ($satir['film_aksiyon']) $turler[] = "Aksiyon";
        if ($satir['film_aile']) $turler[] = "Aile";
        if ($satir['film_bilimKurgu']) $turler[] = "Bilim Kurgu";
        if ($satir['film_biyografi']) $turler[] = "Biyografi";
        if ($satir['film_komedi']) $turler[] = "Komedi";
        if ($satir['film_dram']) $turler[] = "Dram";
        if ($satir['film_korku']) $turler[] = "Korku";
        if ($satir['film_romantik']) $turler[] = "Romantik";
        if ($satir['film_macera']) $turler[] = "Macera";
        if ($satir['film_gerilim']) $turler[] = "Gerilim";
        if ($satir['film_animasyon']) $turler[] = "Animasyon";
        if ($satir['film_belgesel']) $turler[] = "Belgesel";
        if ($satir['film_suç']) $turler[] = "Suç";
        if ($satir['film_tarih']) $turler[] = "Tarih";
        if ($satir['film_fantezi']) $turler[] = "Fantezi";
        if ($satir['film_müzikal']) $turler[] = "Müzikal";
        $tur_metni = implode(", ", $turler);

        echo "<div class ='ekBilgi'><strong>Tür:  " .  $tur_metni . "</strong></div>";
        echo "<div class ='ekBilgi'><strong>Film Süresi: " .  $satir["film_Süre"] . "</strong></div>";
        echo "</div>";
        echo "</div>";
        echo "<p class='film-aciklama'>" .  $satir["film_Açıklama"] . "</p>";
        echo "<a href='film_detay.php?id=" . $satir["film_ID"] . "' class='incele-btn'>Daha fazlası...</a>";
        echo "</article>";
      }
    }
 $baglan->close();

    ?>

</main>
  <footer>
  <nav>
      <a href="index.php">Ana Sayfa</a>
      <a href="filmler.php">Filmler</a>
      <a href="hakkımızda.php">Hakkımızda</a>
      <a href="iletişim.php">İletişim</a>
    </nav>
    <p>&copy; 2025 Vizyon Film. Tüm hakları saklıdır.</p>
  </footer>
</body>
</html>
