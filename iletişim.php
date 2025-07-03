<?php
include("admin/bağlan.php");

$sql = "SELECT * FROM iletişim_bilgiler";
$sonuc = $baglan->query($sql);
$satir = $sonuc->fetch_assoc();
$iletişimtelefon = $satir["iletişim_Telefon"];
$iletişimmail = $satir["iletişim_Mail"];
$iletişimadres = $satir["iletişim_Adres"];
$iletişimharita = $satir["iletişim_Harita"];

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
  $mesaj_isim = $_POST["mesaj_isim"];
  $mesaj_telefon = $_POST["mesaj_telefon"];
  $mesaj_mail = $_POST["mesaj_mail"];
  $mesaj_metin = $_POST["mesaj_metin"];

  $sorgu = $baglan->query("INSERT INTO iletişim_mesajlar (mesaj_isim, mesaj_telefon, mesaj_mail, mesaj_metin) VALUES ('$mesaj_isim', '$mesaj_telefon', '$mesaj_mail', '$mesaj_metin')");

  $mesaj_gonderildi = $sorgu ? true : false;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>İletişim</title>
  <link rel="stylesheet" href="css/genelstyle.css">
  <link rel="stylesheet" href="css/iletişimstyle.css">
</head>
<body>
  <header>
    <div class="headLogo">
      <a href="index.php"><img src="img/logo1.png"></a>
    </div>
    <nav class="headerMenu">
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
    <h1>Bizimle İletişime Geçin</h1>
    <p><strong>Telefon: +<?php echo $iletişimtelefon; ?></strong></p>
    <p><strong>Mail: <?php echo $iletişimmail; ?></strong></p>
    <p><strong>Adres: <?php echo $iletişimadres; ?></strong></p>
    <?php echo $iletişimharita; ?>

    <section class="belge">
      <div class="form-alani">
        <h3>Bizimle İletişime Geçin</h3>
        <form action="" method="post">
          <div class="input-grubu">
            <input type="text" name="mesaj_isim" placeholder="İsim">
            <input type="text" name="mesaj_telefon" placeholder="Telefon">
            <input type="text" name="mesaj_mail" placeholder="Mail">
          </div>
          <textarea name="mesaj_metin" placeholder="Mesajınız"></textarea><br><br>
          <button class="göndertuş" type="submit">Gönder</button>
        </form>
      </div>
    </section>

    <?php if (isset($mesaj_gonderildi) && $mesaj_gonderildi): ?>
      <script>alert("Mesajınız başarıyla gönderildi!");</script>
    <?php endif; ?>
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