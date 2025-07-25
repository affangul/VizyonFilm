<?php
 include("admin/bağlan.php");

 $arama_kelime = isset($_GET["arama"]) ? trim($_GET["arama"]) : "";

if ($arama_kelime != "") {
    $sql = "
  SELECT * FROM film 
  WHERE film_isim LIKE '%" . $baglan->real_escape_string($arama_kelime) . "%'
  ORDER BY 
    CASE 
      WHEN film_isim LIKE '" . $baglan->real_escape_string($arama_kelime) . "%' THEN 1 
      ELSE 2 
    END,
    film_isim ASC
";

} else {
    $sql = "SELECT * FROM film";
}
 
 if ($_POST) {
  $yorum_kullanıcı = $_POST["yorum_kullanıcı"];
  $yorum_metin = $_POST["yorum_metin"];
  $yorum_görünürlük = "0";
  $yorum_film_ID = intval($_GET['id']);

  $sorgu = $baglan->query("INSERT INTO yorum (yorum_kullanıcı, yorum_metin, yorum_görünürlük, yorum_film_ID) VALUES ('$yorum_kullanıcı', '$yorum_metin', '$yorum_görünürlük', '$yorum_film_ID')");

  if ($sorgu) {
    $yorum_durum = true;
} else {
    $yorum_durum = false;
}

 }


if (isset($_GET['id'])) {
    $film_id = intval($_GET['id']);

    $sql = "UPDATE film SET film_görüntülenme = film_görüntülenme + 1 WHERE film_ID = $film_id";
    $baglan->query($sql);

    $sql = "SELECT * FROM film WHERE film_ID = $film_id";
    $sonuc = $baglan->query($sql);

    $sql2 = "SELECT * FROM yorum WHERE yorum_film_ID = $film_id AND yorum_görünürlük = '1'";

    $sonuc2 = $baglan->query($sql2);

?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detay</title>
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
    <form action="filmler.php" method="get" class="arama-formu">
  <input type="text" name="arama" placeholder="Film ara..." required>
  <button type="submit">Ara</button>
</form>
  </header>

  <main>
  <?php
    if ($sonuc->num_rows > 0) {
        $satir = $sonuc->fetch_assoc();
  ?>

  <h1 class="film-baslik"><?php echo $satir['film_isim']; ?></h1>

  <div class="film-detay-kapsayici">
    <div class="film-resim">
      <img src="<?php echo $satir['film_resim']; ?>" alt="Film Resmi">
    </div>
    <div class="film-video">
      <iframe width="100%" height="315" src="https://www.youtube.com/embed/<?php echo $satir['film_fragman']; ?>" 
      title="Film Fragmanı" frameborder="0" allowfullscreen></iframe>

    </div>
  </div>

  <div class="film-detay-bilgi">
    <strong>Vizyon Film Puanı:</strong> <?php echo $satir['film_VFpuan']; ?> / 10<br>
    <strong>IMDb Puanı:</strong> <?php echo $satir['film_IMDbpuan']; ?> / 10<br>
    <strong>Çıkış Tarihi:</strong> <?php echo $satir['film_çıkışTarihi']; ?><br>
    <strong>Yönetmen:</strong> <?php echo $satir['film_Yönetmen']; ?><br>
    <strong>Senarist:</strong> <?php echo $satir['film_Senarist']; ?><br>
    <strong>Süre:</strong> <?php echo $satir['film_Süre']; ?><br>
    <strong>Oyuncular:</strong> <?php echo $satir['film_Oyuncular']; ?><br>
    <?php 
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
        ?>
    <strong>Türler:</strong> <?php echo implode(", ", $turler); ?><br><br>
    <p><?php echo $satir["film_Açıklama"]; ?></p>
  </div>

  <?php
    } else {
        echo "Film bulunamadı.";
    }
    

$baglan->close();
  ?>
 



<section class="yorum-gonder">
  <div class="form-alani">
    <h3>Film hakkında görüşlerinizi bizimle paylaşın</h3>
    <form action="" method="post" onsubmit="return validateForm()">
      <div class="input-grubu">
        <input type="text" id="yorum_kullanıcı" name="yorum_kullanıcı" placeholder="İsminiz" required>
      </div>
      <div class="input-grubu">
        <textarea id="yorum_metin" name="yorum_metin" placeholder="Yorumunuz" required></textarea>
      </div>
      <button type="submit">Gönder</button>
    </form>
  </div>
</section>


<section class="yorumlar">
  <h3>Yorumlar</h3>
  <div class="yorum-listesi">
    <?php
    if ($sonuc2->num_rows > 0) {
        while ($satir2 = $sonuc2->fetch_assoc()) {
            echo "<div class='yorum'>";
            echo "<strong>" . $satir2['yorum_kullanıcı'] . "</strong><br>";
            echo "<p>" . ($satir2['yorum_metin']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Henüz yorum yapılmamış.</p>";
    }
  }
    ?>
  </div>
</section>


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