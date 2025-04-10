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
  <p><strong>Telefon:+90 123 456 78 90</strong></p>
  <p><strong>Mail: VizyonFilm@gmail.com</strong></p>
  <p><strong>Adres: Türkiye/Ankara</strong></p>
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d195884.3018212979!2d32.59761224121527!3d39.90352281167282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d347d520732db1%3A0xbdc57b0c0842b8d!2sAnkara!5e0!3m2!1str!2str!4v1744236202966!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  
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