<?php
 include("admin/bağlan.php");

 
 $tum_turler = [
  "aksiyon", "aile", "bilimKurgu", "biyografi", "komedi", "dram",
  "korku", "romantik", "macera", "gerilim", "animasyon", "belgesel",
  "suç", "tarih", "fantezi", "müzikal"
];

$filtreli_tur = isset($_GET["tur"]) && in_array($_GET["tur"], $tum_turler) ? $_GET["tur"] : "";
$sql = $filtreli_tur ? "SELECT * FROM film WHERE film_$filtreli_tur = 1" : "SELECT * FROM film";
$sonuc = $baglan->query($sql);



?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filmler</title>
  <link rel="stylesheet" href="css/filmlerstyle.css">
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
    
  
  <div class="filmler">
  <h1>
    <?php
      if ($filtreli_tur != "") {
        echo strtoupper($filtreli_tur) . " Filmleri";
      } else {
        echo "Tüm Filmler";
      }
    ?>
  </h1>
    <?php  
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
</div>
<div class="kategori">
  <h2>Kategoriler</h2>
<a href="filmler.php?tur=aksiyon" class="<?php echo ($_GET['tur'] ?? '') == 'aksiyon' ? 'aktif' : ''; ?>">Aksiyon</a>
<a href="filmler.php?tur=aile" class="<?php echo ($_GET['tur'] ?? '') == 'aile' ? 'aktif' : ''; ?>">Aile</a>
<a href="filmler.php?tur=bilimKurgu" class="<?php echo ($_GET['tur'] ?? '') == 'bilimKurgu' ? 'aktif' : ''; ?>">Bilim Kurgu</a>
<a href="filmler.php?tur=biyografi" class="<?php echo ($_GET['tur'] ?? '') == 'biyografi' ? 'aktif' : ''; ?>">Biyografi</a>
<a href="filmler.php?tur=komedi" class="<?php echo ($_GET['tur'] ?? '') == 'komedi' ? 'aktif' : ''; ?>">Komedi</a>
<a href="filmler.php?tur=dram" class="<?php echo ($_GET['tur'] ?? '') == 'dram' ? 'aktif' : ''; ?>">Dram</a>
<a href="filmler.php?tur=korku" class="<?php echo ($_GET['tur'] ?? '') == 'korku' ? 'aktif' : ''; ?>">Korku</a>
<a href="filmler.php?tur=romantik" class="<?php echo ($_GET['tur'] ?? '') == 'romantik' ? 'aktif' : ''; ?>">Romantik</a>
<a href="filmler.php?tur=macera" class="<?php echo ($_GET['tur'] ?? '') == 'macera' ? 'aktif' : ''; ?>">Macera</a>
<a href="filmler.php?tur=gerilim" class="<?php echo ($_GET['tur'] ?? '') == 'gerilim' ? 'aktif' : ''; ?>">Gerilim</a>
<a href="filmler.php?tur=animasyon" class="<?php echo ($_GET['tur'] ?? '') == 'animasyon' ? 'aktif' : ''; ?>">Animasyon</a>
<a href="filmler.php?tur=belgesel" class="<?php echo ($_GET['tur'] ?? '') == 'belgesel' ? 'aktif' : ''; ?>">Belgesel</a>
<a href="filmler.php?tur=suç" class="<?php echo ($_GET['tur'] ?? '') == 'suç' ? 'aktif' : ''; ?>">Suç</a>
<a href="filmler.php?tur=tarih" class="<?php echo ($_GET['tur'] ?? '') == 'tarih' ? 'aktif' : ''; ?>">Tarih</a>
<a href="filmler.php?tur=fantezi" class="<?php echo ($_GET['tur'] ?? '') == 'fantezi' ? 'aktif' : ''; ?>">Fantezi</a>
<a href="filmler.php?tur=müzikal" class="<?php echo ($_GET['tur'] ?? '') == 'müzikal' ? 'aktif' : ''; ?>">Müzikal</a>

</div>

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