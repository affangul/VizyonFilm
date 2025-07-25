<?php
session_start();
include("bağlan.php");
if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb"){
    header("Location: cikis.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['islem']) && $_GET['islem'] == 'sil' && isset($_GET['film_ID'])) {
    $film_ID = $_GET['film_ID'];

    $sil_sorgu = $baglan->query("DELETE FROM film WHERE film_ID='$film_ID'");

}



?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/admingenelstyle.css">
    <link rel="stylesheet" href="../css/adminfilmlerstyle.css">

    <title>Filmler</title>
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
            <li><a href="adminyorumlar.php">Yorumlar</a></li>
            <li><a id="cıkıs" href="cikis.php" onclick="return confirm('Çıkış yapmak istediğinize emin misiniz?');">ÇIKIŞ</a></li>
        </ul>
    </div>
    <div id="content">
    <div class="filmekle"><a  href="adminfilmekle.php"><div>Film Ekle</div></a></div>


        <br> <br> <br> <br> <br>
        
        
            <h1 class="başlık"> Filmler </h1>
        
        
            <table>
                <tr>
                    <th>Film ID</th>
                    <th>İsim</th>
                    <th>Fragman url</th>
                    <th>Görüntülenme</th>
                    <th>Sil</th>
                    <th>Düzenle</th>
                </tr>
                <?php
            $sorgu = $baglan->query("SELECT * FROM film");
            while ($satir = $sorgu->fetch_object()) {
                echo "<tr align='center'>
                    <td>$satir->film_ID</td>
                    <td>$satir->film_isim</td>
                    <td>$satir->film_fragman</td>
                    <td>$satir->film_görüntülenme</td>
                    <td><a class='sil' href='adminfilmler.php?islem=sil&film_ID=$satir->film_ID' onclick='return confirm(\"Bu filmi silmek istediğinize emin misiniz?\");'>Sil</a></td>
                    <td><a class='guncelle' href='adminfilmdüzenle.php?id= $satir->film_ID'>Güncelle</a></td>
                </tr>";
            }
            ?>
        </table>

        
    </div>
    <script src="script.js"></script>
</body>
</html>