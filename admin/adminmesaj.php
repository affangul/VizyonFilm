<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/admingenelstyle.css">

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
            <li><a id="cıkıs" href="cikis.php" onclick="return confirm('Çıkış yapmak istediğinize emin misiniz?');">ÇIKIŞ</a></li>
        </ul>
    </div>

    <div id="content">
        <br> <br> <br> <br> <br>
        <div id="mesajlar">
            <h1> Mesajlar </h1>
        </div>
        <div id="ortala5">
            <table>
                <tr>
                    <th>Mesaj ID</th>
                    <th>İsim</th>
                    <th>Telefon</th>
                    <th>Mail</th>
                    <th>Metin</th>
                    <th>Sil</th>
                </tr>
                <tr align="center">
                    <td>1</td>
                    <td>isim</td>
                    <td>123456</td>
                    <td>mail@mail.com</td>
                    <td>merhaba dünya</td>
                    <td><a class="sil" href="">SİL</a></td>
                </tr>
                <tr align="center">
                    <td>2</td>
                    <td>isima</td>
                    <td>123456</td>
                    <td>mailfsa@mail.com</td>
                    <td>makinalaşmak istiyorum</td>
                    <td><a class="sil" href="">SİL</a></td>
                </tr>
                <tr align="center">
                    <td>3</td>
                    <td>1isim3</td>
                    <td>123456</td>
                    <td>maasdil@mail.com</td>
                    <td>ah yalan dünyada</td>
                    <td><a class="sil" href="">SİL</a></td>
                </tr>
            </table>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
