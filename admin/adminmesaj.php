<?php
session_start();
include("bağlan.php");
if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb"){
    header("Location: cikis.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['islem']) && $_GET['islem'] == 'sil' && isset($_GET['mesaj_ID'])) {
    $mesaj_ID = $_GET['mesaj_ID'];

    $sil_sorgu = $baglan->query("DELETE FROM film WHERE film_ID='$film_ID'");

}



?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/admingenelstyle.css">
    <link rel="stylesheet" href="../css/adminmesajstyle.css">

    <title>Mesaj Kontrol</title>

</head>
<body>
    <button id="menuButton" onclick="toggleMenu()">☰ Menü</button>
    <div id="menu" class="menu">
        <ul>
            <li><a href="adminfilmler.php">Filmler</a></li>
            <li><a href="adminhakkımızda.php">Hakkımızda</a></li>
            <li><a href="adminiletişim.php">İletişim</a></li>
            <li><a href="adminmesaj.php">Mesajlar</a></li>
            <li><a href="adminyorumlar.php">Yorumlar</a></li>
            <li><a id="cıkıs" href="cikis.php" onclick="return confirm('Çıkış yapmak istediğinize emin misiniz?');">ÇIKIŞ</a></li>
        </ul>
    </div>

    <div id="content">
        <br> <br> <br> <br> <br>
            <h1 class ="başlık"> Mesajlar </h1>
            <table>
                <tr>
                    <th>Mesaj ID</th>
                    <th>İsim</th>
                    <th>Telefon</th>
                    <th>Mail</th>
                    <th>Metin</th>
                    <th>Sil</th>
                </tr>
                <?php
            $sorgu = $baglan->query("SELECT * FROM iletişim_mesajlar");
            while ($satir = $sorgu->fetch_object()) {
                echo "<tr align='center'>
                    <td>$satir->mesaj_ID</td>
                    <td>$satir->mesaj_isim</td>
                    <td>$satir->mesaj_telefon</td>
                    <td>$satir->mesaj_mail</td>
                    <td>$satir->mesaj_metin</td>
                    <td><a class='sil' href='adminmesaj.php?islem=sil&mesaj_ID=$satir->mesaj_ID' onclick='return confirm(\"Bu mesajı silmek istediğinize emin misiniz?\");'>Sil</a></td>
                </tr>";
            }
            ?>
            </table>
        
    </div>

    <script src="script.js"></script>
</body>
</html>
