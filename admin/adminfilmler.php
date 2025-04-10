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
    <div class="filmekle"><a  href="adminfilmekle.php"><div>Film Ekle</div></a></div>


    
        <br> <br> <br> <br> <br>
        <div id="mesajlar">
            <h1> Filmler </h1>
        </div>
        <div id="ortala5">
            <table>
                <tr>
                    <th>Film ID</th>
                    <th>İsim</th>
                    <th>Düzenle</th>
                    <th>Sil</th>
                </tr>
                <tr align="center">
                    <td>1</td>
                    <td>Şahit</td>
                    <td><a class="düzenle" href="">Düzenle</a></td>
                    <td><a class="sil" href="">SİL</a></td>
                </tr>
                <tr align="center">
                    <td>2</td>
                    <td>Bataklık</td>
                    <td><a class="düzenle" href="">Düzenle</a></td>
                    <td><a class="sil" href="">SİL</a></td>
                </tr>
                <tr align="center">
                    <td>3</td>
                    <td>Minecraft</td>
                    <td><a class="düzenle" href="">Düzenle</a></td>
                    <td><a class="sil" href="">SİL</a></td>
                </tr>
            </table>
        </div>
    </div>
<!-- burda düzenleye tıklayınca altta film ile alakalı tüm bilgiler çıkacak ve orada düzenlenecek-->
    <script src="script.js"></script>
</body>
</html>