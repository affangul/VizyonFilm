<?php
 include("admin/bağlan.php");

if (isset($_GET['id'])) {
    $film_id = intval($_GET['id']);
    $sql = "SELECT * FROM film WHERE film_ID = $film_id";
    $sonuc = $baglan->query($sql);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ana Sayfa</title>
  <link rel="stylesheet" href="css/filmdetaystyle.css">
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
    if ($sonuc->num_rows > 0) {
        $satir = $sonuc->fetch_assoc();

        echo "<h1>" . $satir["film_isim"] . "</h1>";
        echo "<img src='" . $satir["film_resim"] . "' alt='Film Resmi'><br>";
        echo "<strong>Vizyon Film Puanı:</strong> " . $satir["film_VFpuan"] . " / 10<br>";
        echo "<strong>IMDb Puanı:</strong> " . $satir["film_IMDbpuan"] . " / 10<br>";
        echo "<strong>Çıkış Tarihi:</strong> " . $satir["film_çıkışTarihi"] . "<br>";
        echo "<strong>Yönetmen:</strong> " . $satir["film_Yönetmen"] . "<br>";
        echo "<strong>Senarist:</strong> " . $satir["film_Senarist"] . "<br>";
        echo "<strong>Süre:</strong> " . $satir["film_Süre"] . "<br>";
        echo "<strong>Oyuncular:</strong> ". $satir["film_Oyuncular"] . "<br>";
        

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

        echo "<strong>Türler:</strong> " . implode(", ", $turler) . "<br><br>";
        echo "<p>" . $satir["film_Açıklama"] . "</p>";
    } else {
        echo "Film bulunamadı.";
    }
} else {
    echo "Geçersiz istek.";
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