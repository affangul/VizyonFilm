<?php
session_start();
include("bağlan.php");
if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb"){
    header("Location: cikis.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['islem']) && $_GET['islem'] == 'sil' && isset($_GET['yorum_ID'])) {
    $yorum_ID = $_GET['yorum_ID'];


    $sil_sorgu = $baglan->query("DELETE FROM yorum WHERE yorum_ID='$yorum_ID'");

}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['islem']) && $_GET['islem'] == 'düzenle' && isset($_GET['yorum_ID'])) {
    $yorum_ID = intval($_GET["yorum_ID"]);
    $mevcut = $baglan->query("SELECT yorum_görünürlük FROM yorum WHERE yorum_ID = $yorum_ID")->fetch_object()->yorum_görünürlük;
    $yeni = $mevcut == 1 ? 0 : 1;
    $baglan->query("UPDATE yorum SET yorum_görünürlük = $yeni WHERE yorum_ID = $yorum_ID");
}


?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="stylesheet" href="../css/admingenelstyle.css">
    <link rel="stylesheet" href="../css/adminmesajstyle.css">

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
            <li><a href="adminyorumlar.php">Yorumlar</a></li>
            <li><a id="cıkıs" href="cikis.php" onclick="return confirm('Çıkış yapmak istediğinize emin misiniz?');">ÇIKIŞ</a></li>
        </ul>
    </div>

    <div id="content">
        <br> <br> <br> <br> <br>
            <h1 class ="başlık"> Yorumlar </h1>
        
            <table>
                <tr>
                    <th>Yorum ID</th>
                    <th>Kullanıcı Adı</th>
                    <th>Yorum</th>
                    <th>Film İsim</th>
                    <th>Yorum görünürlük</th>
                    <th>Görünürlük Değiştir</th>
                    <th>Sil</th>
                </tr>
                <?php
            $sorgu = $baglan->query("SELECT * FROM yorum");
            while ($satir = $sorgu->fetch_object()) {
                $deger = $satir->yorum_görünürlük;
                if($deger == 1){
                    $görünürlük = "görünür durumda";
                }
                else{
                    $görünürlük = "gizli durumda";
                }

                $sorgu2 = $baglan->query("SELECT * FROM film WHERE $satir->yorum_film_ID = film_ID");
                $satir2 = $sorgu2->fetch_object();
                $filmisim = $satir2->film_isim;

                echo "<tr align='center'>
                    <td>$satir->yorum_ID </td>
                    <td>$satir->yorum_kullanıcı</td>
                    <td>$satir->yorum_metin</td>
                    <td>$filmisim</td>
                    <td>$görünürlük</td>
                    <td><a class='guncelle' href='adminyorumlar.php?islem=düzenle&yorum_ID=$satir->yorum_ID' onclick='return confirm(\"Bu yorumun görünürlüğünü değiştirmek istediğinize emin misiniz?\");'>Görünürlük değiştir</a></td>
                    <td><a class='sil' href='adminyorumlar.php?islem=sil&yorum_ID=$satir->yorum_ID' onclick='return confirm(\"Bu yorumu silmek istediğinize emin misiniz?\");'>Sil</a></td>
                </tr>";
            }
            ?>
            </table>
    </div>

    <script src="script.js"></script>
</body>
</html>