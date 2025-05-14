<?php
 include("admin/bağlan.php");

 $sql = "SELECT * FROM iletişim_bilgiler";
 $sonuc = $baglan->query($sql);
 $satir = $sonuc->fetch_assoc();
 $iletişimtelefon = $satir["iletişim_Telefon"];
 $iletişimmail = $satir["iletişim_Mail"];
 $iletişimadres = $satir["iletişim_Adres"];
 $iletişimharita = $satir["iletişim_Harita"];


 if ($_POST) {
  $mesaj_isim = $_POST["mesaj_isim"];
  $mesaj_telefon = $_POST["mesaj_telefon"];
  $mesaj_mail = $_POST["mesaj_mail"];
  $mesaj_metin = $_POST["mesaj_metin"];

  $sorgu = $baglan->query("INSERT INTO iletişim_mesajlar (mesaj_isim, mesaj_telefon, mesaj_mail, mesaj_metin) VALUES ('$mesaj_isim', '$mesaj_telefon', '$mesaj_mail', '$mesaj_metin')");

  if ($sorgu) {
    $mesaj_gonderildi = true;
} else {
    $mesaj_gonderildi = false;
}

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
  <a href="index.php" class="headLogo"><img src="img/logo1.png" ></a>
    <nav>
      
      <a href="index.php">Ana Sayfa</a>
      <a href="filmler.php">Filmler</a>
      <a href="hakkımızda.php">Hakkımızda</a>
      <a href="iletişim.php">İletişim</a>
    </nav>
  </header>
  <main>
  <h1>Bizimle İletişime Geçin</h1>
  <p><strong>Telefon:+<?php echo $iletişimtelefon;  ?></strong></p>
  <p><strong>Mail: <?php echo $iletişimmail;  ?></strong></p>
  <p><strong>Adres: <?php echo $iletişimadres;  ?></strong></p>
  <?php echo $iletişimharita;  ?>
  
    <section class="belge">
    <div class="form-alani">
        <h3>Bizimle İletişime Geçin</h3>
        <form action="" method="post" onsubmit="return validateForm()">
            <div class="input-grubu">
                <input type="text" id="mesaj_isim" name="mesaj_isim" placeholder="İsim">
                <input type="text" id="mesaj_telefon" name="mesaj_telefon" placeholder="Telefon">
                <input type="text" id="mesaj_mail" name="mesaj_mail" placeholder="Mail">
            </div>
            <textarea id="mesaj_metin" name="mesaj_metin" placeholder="Mesajınız"></textarea><br><br>
            <button type="submit">Gönder</button>
        </form>
    </div>
</section> 

<?php if (isset($mesaj_gonderildi) && $mesaj_gonderildi): ?>
<script>
    alert("Mesajınız başarıyla gönderildi!");
</script>
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