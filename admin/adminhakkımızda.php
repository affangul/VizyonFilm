<?php
session_start();
include("bağlan.php");
if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb"){
    header("Location: cikis.php");
    exit();
}

if ($_POST) {
    if (isset($_POST['hakkımızda_submit'])) {
        $hakkımızda_metin1 = $_POST["hakkımızda_metin1"];
        $hakkımızda_metin2 = $_POST["hakkımızda_metin2"];
        $hakkımızda_metin3 = $_POST["hakkımızda_metin3"];

        $sorgu = $baglan->query("DELETE FROM hakkımızda");
        $sorgu = $baglan->query("INSERT INTO hakkımızda (hakkımızda_metin1, hakkımızda_metin2, hakkımızda_metin3) VALUES ('$hakkımızda_metin1', '$hakkımızda_metin2', '$hakkımızda_metin3')");
    }
}

?>


<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/admingenelstyle.css">
    <link rel="stylesheet" href="../css/adminfilmlerstyle.css">

    <title>Admin Paneli</title>
    <style>


    </style>
</head>
<body>
<button id="menuButton" onclick="toggleMenu()">☰ Menü</button>
    <div id="menu" class="menu">
        <ul>
            <li><a href="adminfilmler.php">Filmler</a></li>
            <li><a href="adminhakkımızda.php">Hakkımızda</a></li>
            <li><a href="adminiletişim.php">İletişim</a></li>
            <li><a href="adminmesaj.php">Mesajlar</a></li>
            <li><a id="cıkıs" href="cikis.php" onclick="return confirm('Çıkış yapmak istediğinize emin misiniz?');">ÇIKIŞ</a></li>
        </ul>
    </div>
    <div id="content">
    <div id="ortala">

    <?php
    $sorgu = $baglan->query("SELECT * FROM hakkımızda");
    $satir = $sorgu->fetch_object();
    ?>

    <h1>Hakkımızda</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <label for="hakkımızda_metin1">Üst Paragraf:</label>
        <textarea name="hakkımızda_metin1" id="hakkımızda_metin1"><?php echo $satir->hakkımızda_metin1; ?> </textarea><br>
       
        <label for="hakkımızda_metin2">Orta Paragraf:</label>
        <textarea name="hakkımızda_metin2" id="hakkımızda_metin2"><?php echo $satir->hakkımızda_metin2; ?></textarea><br>
       
        <label for="hakkımızda_metin3">Alt Paragraf:</label>
        <textarea name="hakkımızda_metin3" id="hakkımızda_metin3"><?php echo $satir->hakkımızda_metin3; ?></textarea><br>
       
        <input type="submit" name="hakkımızda_submit" value="Kaydet">
    </form>
    </div>
    </div>
    <script src="script.js"></script>
</body>
</html>