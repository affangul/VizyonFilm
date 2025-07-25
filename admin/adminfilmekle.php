<?php
session_start();
include("bağlan.php");
if ($_SESSION["giris"] != sha1(md5("var")) || $_COOKIE["kullanici"] != "msb"){
    header("Location: cikis.php");
    exit();
}


 if (isset($_POST['filmekle_submit'])) {
    $film_isim = $_POST['film_isim'];
    $film_fragman = $_POST['film_fragman'];
    $film_resim = "";
    $film_VFpuan = $_POST['film_VFpuan'];
    $film_IMBDbpuan = $_POST['film_IMBDbpuan'];
    $film_Yönetmen = $_POST['film_Yönetmen'];
    $film_Senarist = $_POST['film_Senarist'];
    $film_Süre = $_POST['film_Süre'];
    $film_Açıklama = $_POST['film_Açıklama'];
    $film_Oyuncular = $_POST['film_Oyuncular'];
    $film_çıkışTarihi = $_POST['film_çıkışTarihi'];
    $film_Vizyonda = isset($_POST['film_Vizyonda'])? 1 : 0;
    $film_ANASAYFA = isset($_POST['film_ANASAYFA'])? 1 : 0; 
    $film_görüntülenme = '0';
    $film_aksiyon = isset($_POST['film_aksiyon'])? 1 : 0;
    $film_aile = isset($_POST['film_aile'])? 1 : 0;
    $film_bilimKurgu = isset($_POST['film_bilimKurgu'])? 1 : 0;
    $film_biyografi = isset($_POST['film_biyografi'])? 1 : 0;
    $film_komedi = isset($_POST['film_komedi'])? 1 : 0;
    $film_dram = isset($_POST['film_dram'])? 1 : 0;
    $film_korku = isset($_POST['film_korku'])? 1 : 0;
    $film_romantik = isset($_POST['film_romantik'])? 1 : 0;
    $film_macera = isset($_POST['film_macera'])? 1 : 0;
    $film_gerilim = isset($_POST['film_gerilim'])? 1 : 0;
    $film_animasyon = isset($_POST['film_animasyon'])? 1 : 0;
    $film_belgesel = isset($_POST['film_belgesel'])? 1 : 0;
    $film_suç = isset($_POST['film_suç'])? 1 : 0;
    $film_tarih = isset($_POST['film_tarih'])? 1 : 0;
    $film_fantezi = isset($_POST['film_fantezi'])? 1 : 0;
    $film_müzikal = isset($_POST['film_müzikal'])? 1 : 0;

    if ($_FILES['resimDosyası']['error'] == 0) {
        $dosyaAdi = $_FILES['resimDosyası']['name'];
        $dosyaTmpYolu = $_FILES['resimDosyası']['tmp_name'];
        $dosyaYolu = 'C:/xampp/htdocs/img/' . $dosyaAdi;

        if (move_uploaded_file($dosyaTmpYolu, $dosyaYolu)) {
            $film_resim = 'img/' . $dosyaAdi;
        } else {
            echo "Dosya yükleme hatası.";
        }
    }
 
$sorgu = $baglan -> query("INSERT INTO film (film_isim, film_fragman, film_resim, film_VFpuan, film_IMDbpuan, film_Yönetmen, film_Senarist, film_Süre, film_Açıklama, film_Oyuncular, film_çıkışTarihi, film_Vizyonda, film_ANASAYFA, film_görüntülenme, film_aksiyon, film_aile, film_bilimKurgu, film_komedi, film_dram, film_korku, film_romantik, film_macera, film_gerilim, film_animasyon, film_belgesel, film_suç, film_tarih, film_fantezi, film_müzikal) VALUES ('$film_isim', '$film_fragman', '$film_resim', '$film_VFpuan', '$film_IMDbpuan', '$film_Yönetmen', '$film_Senarist', '$film_Süre', '$film_Açıklama', '$film_Oyuncular', '$film_çıkışTarihi', '$film_Vizyonda', '$film_ANASAYFA', '$film_görüntülenme', $film_aksiyon', '$film_aile', '$film_bilimKurgu', '$film_komedi', '$film_dram', '$film_korku', '$film_romantik', '$film_macera', '$film_gerilim', '$film_animasyon', '$film_belgesel', '$film_suç', '$film_tarih', '$film_fantezi', '$film_müzikal')");

if ($sorgu) {
    echo "<script>alert('Film başarıyla eklendi!');</script>";
    echo "<script> window.location.href='adminfilmler.php';</script>";
} else {
    echo "<script>alert('Film eklenemedi. Hata oluştu.');</script>";
    echo "<script> window.location.href='adminfilmler.php';</script>";
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

   
    <form action="adminfilmekle.php" method="post" enctype="multipart/form-data">
    <div id="ortala">
    <h1>Film Ekle</h1>
    <div class="yazıbilgileri">
        <label for="film_isim">İsim:</label>
        <input type="text" name="film_isim" id="film_isim">
        
        <label for="film_fragman">Fragman URL:</label>
        <input type="text" name="film_fragman" id="film_fragman">

        <label for="resimDosyası">Resim Yükle:</label>
        <input type="file" name="resimDosyası" id="resimDosyası"> <br> <br>

        <label for="film_VFpuan">Vizyon Film puanı:</label>
        <input type="text" name="film_VFpuan" id="film_VFpuan">
        
        <label for="film_IMDbpuan">IMDb puanı:</label>
        <input type="text" name="film_IMDbpuan" id="film_IMDbpuan">

        <label for="">Yönetmen</label>
        <input type="text" name="film_Yönetmen" id="film_Yönetmen">

        <label for="film_Senarist">Senarist</label>
        <input type="text" name="film_Senarist" id="film_Senarist">

        <label for="film_çıkışTarihi">Çıkış Tarihi:</label>
        <input type="date" name="film_çıkışTarihi" id="film_çıkışTarihi">


        <label for="film_Süre">Süre</label>
        <input type="text" name="film_Süre" id="film_Süre">

        <label for="film_Açıklama">Açıklama</label>
        <input type="text" name="film_Açıklama" id="film_Açıklama">

        <label for="film_Oyuncular">Oyuncular</label>
        <input type="text" name="film_Oyuncular" id="film_Oyuncular">
        </div>

        <div class = "ikibilgi">

        <div class="sol">
        <label for="film_Vizyonda">Vizyonda mı?</label>
        <input type="checkbox" id="film_Vizyonda" name="film_Vizyonda" value="1">
        </div>
        <div class="sağ">
        <label for="film_ANASAYFA">Ana ekranda gösterilsin mi ?</label>
        <input type="checkbox" id="film_ANASAYFA" name="film_ANASAYFA" value="1">
        </div>
        </div>

        <div class = "türlerkutusu">
            <span class="türBaşlık">Türler</span>

        <div class="tür-grubu">
        <input type="checkbox" id="film_aksiyon" name="film_aksiyon" value="1">
        <label for="film_aksiyon">Aksiyon</label>
        
        <input type="checkbox" id="film_aile" name="film_aile" value="1">
        <label for="film_aile">Aile</label>
       
        <input type="checkbox" id="film_bilimKurgu" name="film_bilimKurgu" value="1">
        <label for="film_bilimKurgu">Bilim Kurgu</label>
        
        <input type="checkbox" id="film_biyografi" name="film_biyografi" value="1">
        <label for="film_biyografi">Biyografi</label>
        
        </div>

        <div class="tür-grubu">
        <input type="checkbox" id="film_komedi" name="film_komedi" value="1">
        <label for="film_komedi">Komedi</label>
        
        <input type="checkbox" id="film_dram" name="film_dram" value="1">
        <label for="film_dram">Dram</label>
        
        <input type="checkbox" id="film_korku" name="film_korku" value="1">
        <label for="film_korku">Korku</label>
        
        <input type="checkbox" id="film_romantik" name="film_romantik" value="1">
        <label for="film_romantik">Romantik</label>
        
        </div>

        <div class="tür-grubu">
        <input type="checkbox" id="film_macera" name="film_macera" value="1">
        <label for="film_macera">Macera</label>
        
        <input type="checkbox" id="film_gerilim" name="film_gerilim" value="1">
        <label for="film_gerilim">Gerilim</label>
        
        <input type="checkbox" id="film_animasyon" name="film_animasyon" value="1">
        <label for="film_animasyon">Animasyon</label>
        
        <input type="checkbox" id="film_belgesel" name="film_belgesel" value="1">
        <label for="film_belgesel">Belgesel</label>
        
        </div>

        <div class="tür-grubu">
        <input type="checkbox" id="film_suç" name="film_suç" value="1">
        <label for="film_suç">Suç</label>
        
        <input type="checkbox" id="film_tarih" name="film_tarih" value="1">
        <label for="film_tarih">Tarih</label>
        
        <input type="checkbox" id="film_fantezi" name="film_fantezi" value="1">
        <label for="film_fantezi">Fantezi</label>
        
        <input type="checkbox" id="film_müzikal" name="film_müzikal" value="1">
        <label for="film_müzikal">Müzikal</label>
        
        </div>

        </div>
        <br> <br>
        <input type="submit" name="filmekle_submit" value="Kaydet">
        
    </form>

    </div>

    <script src="script.js"></script>
</body>
</html>