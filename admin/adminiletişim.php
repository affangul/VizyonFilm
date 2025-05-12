<?php
include("bağlan.php");


if ($_POST) {
        $iletişim_telefon = $_POST["iletişim_telefon"];
        $iletişim_mail= $_POST["iletişim_mail"];
        $iletişim_adres = $_POST["iletişim_adres"];
        $iletişim_harita = $_POST["iletişim_harita"];
        $sorgu = $baglan -> query("DELETE FROM iletişim_bilgiler");
        $sorgu = $baglan -> query("INSERT INTO iletişim_bilgiler (iletişim_telefon, iletişim_mail, iletişim_adres, iletişim_harita) VALUES ('$iletişim_telefon','$iletişim_mail','$iletişim_adres','$iletişim_harita')");
    
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
        $sorgu = $baglan->query("SELECT * FROM iletişim_bilgiler");
        $satir = $sorgu->fetch_object();
        ?>
    <h1>Hakkımızda</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <label for="iletişim_telefon">Telefon:</label>
        <textarea name="iletişim_telefon" id="iletişim_telefon"><?php echo $satir->iletişim_Telefon; ?></textarea><br>
       
        <label for="iletişim_mail">Mail:</label>
        <textarea name="iletişim_mail" id="iletişim_mail"><?php echo $satir->iletişim_Mail; ?></textarea><br>
       
        <label for="iletişim_adres">Adres:</label>
        <textarea name="iletişim_adres" id="iletişim_adres"><?php echo $satir->iletişim_Adres; ?></textarea><br>

        <label for="iletişim_harita">Harita:</label>
        <textarea name="iletişim_harita" id="iletişim_harita"><?php echo $satir->iletişim_Harita; ?></textarea><br>
       
        <input type="submit" name="iletişim_submit" value="Kaydet">
    </form>
    </div>
    </div>

    <script src="script.js"></script>
</body>
</html>