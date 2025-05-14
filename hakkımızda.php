<?php
 include("admin/bağlan.php");

$sonuc = $baglan-> query ("SELECT * FROM hakkımızda");
$bilgi = $sonuc->fetch_object();
$hakkımızda_metin1 = $bilgi->hakkımızda_metin1;
$hakkımızda_metin2 = $bilgi->hakkımızda_metin2;
$hakkımızda_metin3 = $bilgi->hakkımızda_metin3;

 ?>

<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hakkımızda</title>

  <link rel="stylesheet" href="css/genelstyle.css">
  <link rel="stylesheet" href="css/hakkimizdastyle.css">
</head>
<body class="hak">
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
  <h1>Hakkımızda</h1>

  <p><?php echo $hakkımızda_metin1; ?></p>

  <p><?php echo $hakkımızda_metin2; ?></p>

  <p><?php echo $hakkımızda_metin3; ?></p>
<div class ="hakkımızdaResim">
<img src="img/logo3.png" >
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